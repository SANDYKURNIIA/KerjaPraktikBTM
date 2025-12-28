<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Apotik extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Apotik');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Layar_farmasi2');
    }
    //Pasien Rajal
    public function pasien_rajal() //poli
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_rajal_apotik';
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $page_data['obat'] = $this->M_Apotik->getNamaObat();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
  public function tampil_pasien_rajal()
{
    $staff = $this->session->userdata('data_auth');
    if ($this->input->post('mulai') != null && $this->input->post('akhir') != null || $this->input->post('mulai') != '' && $this->input->post('akhir') != '') {
        $page_data = $this->M_Apotik->selectRangePasienRajal($this->input->post('mulai'), $this->input->post('akhir'));
    } else {
        $page_data = $this->M_Apotik->selectRangePasienRajal("", "");
    }

    $out = null;
    for ($i = 0; $i < count($page_data); $i++) {
        // Tombol resep
        $tombol_obat = "<button class='btn btn-success btn-icon-anim btn-square' 
                        data-toggle='modal' 
                        onclick='tampil_resep(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'>
                        <i class='fa fa-rocket'></i></button>";

        // Tombol edukasi pendaftaran rajal (pakai no_rm)
    $tombol_edukasi = "<a href='" . base_url(
    'Apotik/edukasi_pendaftaran_ugd/' .
    $page_data[$i]->no_rm . '/' .
    $page_data[$i]->id_pelayanan . '/' .
    $page_data[$i]->id_history
) . "' 
class='btn btn-info btn-icon-anim btn-square'>
<i class='fa fa-book'></i></a>";


        $no = $i + 1;
        $time = strtotime($page_data[$i]->tanggal);
        $tgl = strftime("%d %B %Y %H:%M WIB", $time);
        $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
        $pasien = $page_data[$i]->nama;
        $jk = $page_data[$i]->jenis_kelamin;
        $time1 = strtotime($page_data[$i]->tgl_lahir);
        $tgl1 = strftime("%A, %d %B %Y", $time1);
        $birthDate = $page_data[$i]->tgl_lahir;
        $date = new DateTime($birthDate);
        $now = new DateTime();
        $interval = $now->diff($date);
        $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";
        $alamat = $page_data[$i]->alamat;
        $caraBayar = $page_data[$i]->cara_bayar;
        $diagnosa = $page_data[$i]->diagnosa;
        $dokter = $page_data[$i]->nama_dokter;

        $out[$i] = array(
            $no,
            $tombol_obat,
            $tombol_edukasi,
            $tgl,
            $no_rm,
            $pasien,
            $jk,
            $tgl1,
            $umur,
            $alamat,
            $caraBayar,
            $diagnosa,
            $dokter
        );
    }

    if ($out == null) {
        echo '{"data":""}';
        exit;
    } else {
        $page_data['data'] = $out;
        echo json_encode($page_data);
        exit;
    }
}
public function edukasi_pendaftaran_rajal($no_rm)
{
    $data_staff = $this->session->userdata('data_auth');
    $page_data['sso_user_data'] = $data_staff;
    $page_data['page_content'] = 'form_form/edukasi_pendaftaran_ugd';

    // ambil data pasien berdasarkan no_rm
    $pasien = $this->db->get_where('pasien', ['no_rm' => $no_rm])->row_array();
    if (!$pasien) show_404();

    $page_data['pasien'] = $pasien;
    $page_data['no_rm']  = $pasien['no_rm'];

    // ambil data edukasi pasien (kalau ada)
    $page_data['edukasi'] = $this->M_Apotik->getEdukasiByNoRM($pasien['no_rm']);

    $this->load->view('assets/_header');
    $this->load->view('Main', $page_data);
    $this->load->view('assets/_footer');
}

public function simpan_edukasi_rajal()
{
    $no_rm = $this->input->post('no_rm');

    // validasi pasien
    $pasien = $this->db->get_where('pasien', ['no_rm' => $no_rm])->row_array();
    if (!$pasien) {
        echo json_encode(['status' => 'error', 'message' => 'Pasien tidak ditemukan.']);
        return;
    }

    // ambil pelayanan terbaru
    $pelayanan = $this->db->order_by('tanggal', 'DESC')
                          ->get_where('pelayanan', ['id_pasien' => $pasien['kode']])
                          ->row();
    if ($pelayanan) {
        $id_pelayanan = $pelayanan->id_pelayanan;
        $id_staff     = $pelayanan->id_staff;
    } else {
        $id_pelayanan = null;
        $id_staff     = $this->session->userdata('data_auth')['id_staff'];
    }

    // ambil data dari form
    $data = [
        'no_rm'        => $no_rm,
        'id_staff'     => $id_staff,
        'id_pelayanan' => $id_pelayanan,
        'tanggal_input'=> date('Y-m-d H:i:s')
    ];

    for ($i=1; $i<=4; $i++) {
        $data["topik$i"]              = $this->input->post("topik$i");
        $materi = $this->input->post("materi_penyampaian$i");
        $data["materi_penyampaian$i"] = !empty($materi) && is_array($materi) ? implode(', ', $materi) : null;
        $data["durasi$i"]             = $this->input->post("durasi$i");
        $data["pasien_keluarga$i"]    = $this->input->post("pasien_keluarga$i");
        $data["edukator$i"]           = $this->input->post("edukator$i");
        $data["evaluasi$i"]           = $this->input->post("evaluasi$i");
    }

    $this->M_Apotik->saveOrUpdateEdukasi($data);

    echo json_encode(['status' => 'success', 'message' => 'Data edukasi Rajal berhasil disimpan.']);
}

public function print_edukasi_rajal($no_rm)
{
    $pasien  = $this->db->get_where('pasien', ['no_rm' => $no_rm])->row_array();
    $edukasi = $this->M_Apotik->getEdukasiByNoRM($no_rm);
    $staff   = $this->session->userdata('data_auth');

    if (!$pasien || !$edukasi) show_404();

    $page_data['pasien'] = $pasien;
    $page_data['edukasi'] = $edukasi;
    $page_data['sso_user_data'] = $staff;

    $this->load->view('print/print_edukasi_rajal', $page_data);
}

    public function pasien_Igd() //Igd
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_Igd_apotik';
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $page_data['obat'] = $this->M_Apotik->getNamaObatUnit('stok_depo');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
public function tampil_pasien_Igd()
{
    $page_data = $this->M_Apotik->selectPasienIgd();

    $out = null;
    for ($i = 0; $i < count($page_data); $i++) {
   // Tombol tindakan obat (pakai modal resep)
$tombol_obat = "<button class='btn btn-success btn-icon-anim btn-square' 
                data-toggle='modal' 
                onclick='tampil_resep(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'>
                <i class='fa fa-rocket'></i></button>";

$tombol_edukasi = "<a href='" . base_url(
    'Apotik/edukasi_pendaftaran_ugd/' .
    $page_data[$i]->no_rm . '/' .
    $page_data[$i]->id_pelayanan . '/' .
    $page_data[$i]->id_history
) . "' 
class='btn btn-info btn-icon-anim btn-square'>
<i class='fa fa-book'></i></a>";





        $no = $i + 1;
        $time = strtotime($page_data[$i]->tanggal);
        $waktu = strftime("%H:%M WIB", $time);
        $time2 = strtotime($page_data[$i]->tgl_masuk);
        $tgl2 = strftime("%A, %d %B %Y", $time2);
        $no_rm = " " . sprintf('%06d', $page_data[$i]->no_rm);
        $pasien = $page_data[$i]->nama;
        $jk = $page_data[$i]->jenis_kelamin;

        $time1 = strtotime($page_data[$i]->tgl_lahir);
        $tgl1 = strftime("%A, %d %B %Y", $time1);
        $birthDate = $page_data[$i]->tgl_lahir;
        $date = new DateTime($birthDate);
        $now = new DateTime();
        $interval = $now->diff($date);
        $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

        $alamat = $page_data[$i]->alamat;
        $caraBayar = $page_data[$i]->cara_bayar;
        $diagnosa = $page_data[$i]->diagnosa;
        $dokter = $page_data[$i]->nama_dokter;

        // isi array untuk DataTable
        $out[$i] = array(
            $no,
            $tombol_obat,
            $tombol_edukasi,
            $tgl2,
            $waktu,
            $no_rm,
            $pasien,
            $jk,
            $tgl1,
            $umur,
            $alamat,
            $caraBayar,
            $diagnosa,
            $dokter
        );
    }

    if ($out == null) {
        echo '{"data":""}';
        exit;
    } else {
        $page_data['data'] = $out;
        echo json_encode($page_data);
        exit;
    }
}

// tampilkan form edukasi UGD
public function edukasi_pendaftaran_ugd($no_rm, $id_pelayanan, $id_history)
{
    $data_staff = $this->session->userdata('data_auth');
    $page_data['sso_user_data'] = $data_staff;
    $page_data['page_content'] = 'form_form/edukasi_pendaftaran_ugd';

    // data pasien
    $pasien = $this->db->get_where('pasien', ['no_rm' => $no_rm])->row_array();
    if (!$pasien) show_404();

    $page_data['pasien'] = $pasien;
    $page_data['no_rm'] = $no_rm;
    $page_data['id_pelayanan'] = $id_pelayanan;
    $page_data['id_history'] = $id_history;

    // ambil edukasi berdasarkan no_rm + id_history (BIAR TEPAT)
    $page_data['edukasi'] = $this->M_Apotik
        ->getEdukasiByNoRMHistory($no_rm, $id_history);

    $this->load->view('assets/_header');
    $this->load->view('Main', $page_data);
    $this->load->view('assets/_footer');
}


public function simpan_edukasi_ugd()
{
    $no_rm        = $this->input->post('no_rm');
    $id_pelayanan = $this->input->post('id_pelayanan');
    $id_history   = $this->input->post('id_history');

    $pasien = $this->db->get_where('pasien', ['no_rm' => $no_rm])->row_array();
    if (!$pasien) {
        echo json_encode(['status'=>'error','message'=>'Pasien tidak ditemukan']);
        return;
    }

    $id_staff = $this->session->userdata('data_auth')->id_staff;

    $data = [
        'no_rm'        => $no_rm,
        'id_staff'     => $id_staff,
        'id_pelayanan' => $id_pelayanan,
        'id_history'   => $id_history,
        'tanggal_input'=> date('Y-m-d H:i:s')
    ];

    for ($i=1; $i<=4; $i++) {
        $data["topik$i"] = $this->input->post("topik$i");
        $materi = $this->input->post("materi_penyampaian$i");
        $data["materi_penyampaian$i"] = is_array($materi) ? implode(', ', $materi) : null;
        $data["durasi$i"] = $this->input->post("durasi$i");
        $data["pasien_keluarga$i"] = $this->input->post("pasien_keluarga$i");
        $data["edukator$i"] = $this->input->post("edukator$i");
        $data["evaluasi$i"] = $this->input->post("evaluasi$i");
    }

    $this->M_Apotik->saveOrUpdateEdukasiByHistory($data);

    echo json_encode(['status'=>'success','message'=>'Data edukasi berhasil disimpan']);
}




// ambil riwayat edukasi pasien berdasarkan no_rm
public function get_riwayat_edukasi($no_rm, $id_history)
{
    $data = $this->M_Apotik->getEdukasiByNoRMHistory($no_rm, $id_history);
    echo json_encode($data);
}

public function print_edukasi_ugd($no_rm, $id_history)
{
    $pasien = $this->db->get_where('pasien', ['no_rm' => $no_rm])->row_array();
    $edukasi = $this->M_Apotik->getEdukasiByNoRMHistory($no_rm, $id_history);
    $staff = $this->session->userdata('data_auth');

    if (!$pasien || !$edukasi) show_404();

    $page_data['pasien'] = $pasien;
    $page_data['edukasi'] = $edukasi;
    $page_data['sso_user_data'] = $staff;

    $this->load->view('print/print_edukasi_ugd', $page_data);
}











    public function tampil_resep()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $page_data = $this->M_Apotik->selectResepById($id_pelayanan, $id_history);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 
            if ($page_data[$i]->status == 2) {
                $tombol =   "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
            } else {
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_resep . "\",\"" . $page_data[$i]->cara_bayar . "\")' '><i class='fa fa-rocket '></i></button>";
            }
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_resep(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->nama_resep .  "\")' '><i class='fa fa-trash '></i></button>";
            // if($page_data[$i]->status == 1){
            //     $request =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='request(\"" . $page_data[$i]->id_resep ."\",\"" .$page_data[$i]->nama_resep. "\")' '><i class='fa fa-thumbs-up '></i></button>";
            // }elseif($page_data[$i]->status == 2){
            //     $request = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
            // }

            $no = $i + 1;
            $nama_resep = $page_data[$i]->nama_resep;
            $peresep = $page_data[$i]->nama;
            $jenis_resep = $page_data[$i]->jenis_resep;
            $depo = $page_data[$i]->depo;
            if ($depo == "APOTIK") {
                $depo = "RAJAL";
            }
            $tgl = $page_data[$i]->tanggal;
            if ($jenis_resep == 1 || $jenis_resep == 0) {
                $jenis_resep = 'Non Racikan';
            } else if ($jenis_resep == 2) {
                $jenis_resep = 'Racikan';
            } else if ($jenis_resep == 3) {
                $jenis_resep = 'OTT';
            } else if ($jenis_resep == 5) {
                $jenis_resep = 'OBAT KRONIS';
            } else {
                $jenis_resep = 'RETURN';
                $tombol = "";
            }

            $out[$i] = array($no, $tombol, $hapus, $nama_resep, $jenis_resep, $depo, $peresep, $tgl);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function tampil_obat()
    {
        // $id_resep = 159;
        $id_resep = $this->input->post('id_resep');
        $dbresep = $this->db->get_where('resep_obat', ['id_resep' => $id_resep])->row_array();
        $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $dbresep['id_pelayanan']])->row_array();
        // if ($tipe['jenis_resep'] == 5) {
        //     $page_data = $this->M_Apotik->selectObatByResep_kronis($id_resep);
        // } else {
        $page_data = $this->M_Apotik->selectObatByResep($id_resep);
        // }

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 
            // $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat(\"" . $page_data[$i]->id_resep ."\",\"" .$page_data[$i]->jenis_resep.  "\")' '><i class='fa fa-rocket '></i></button>";
            $signa =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetakSigna(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->id_resep . "\")' '><i class='icon-printer'></i></button>";
            //$edit =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->id_resep . "\")' '><i class='fa fa-rocket'></i></button>";
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->depo . "\")' '><i class='fa fa-trash'></i></button>";

            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $time = strtotime($page_data[$i]->kadaluarsa);
            $kadaluarsa = strftime("%A, %d %B %Y ", $time);
            $harga = ($page_data[$i]->frek == 0) ? $page_data[$i]->total / $page_data[$i]->frek_req : $page_data[$i]->total / $page_data[$i]->frek;


            $harga_obat = "Rp " . number_format($harga, 0, ',', '.');
            $jumlah_obat = $page_data[$i]->frek;
            $obat_req = $page_data[$i]->frek_req;
            $depo = $page_data[$i]->depo;
            // if ($obat_req == 30 && $pelayanan['cara_bayar'] == '30') {
            //     $obat_req = 7;
            //     $total_harga = $harga * $obat_req;
            // } else {
            $obat_req = $obat_req;
            $total_harga = $page_data[$i]->total;
            // }
            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $ket = $page_data[$i]->keterangan;
            $staff = $page_data[$i]->staff;
            $signa_obat = $page_data[$i]->tindakan;
            $id_logistik = $page_data[$i]->id_list_tindakan;



            if ($depo == 'APOTIK') {
                $db_stok = 'stok_apotik';
            } else if ($depo == 'RANAP') {
                $db_stok = 'stok_depo';
            }

            $getStok = $this->db->query("SELECT SUM(frek) stok from " . $db_stok . " where id_logistik ='$id_logistik'")->row();
            $stok = number_format($getStok->stok);

            $tipe = $page_data[$i]->jenis_resep;
            // if ($tipe == 5) {
            //     $tom1 = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url('Apotik/acc/') . $page_data[$i]->id_tindakan_farmasi . "'><i class='fa fa-thumbs-up'></i></a>";
            //     $edit = $tom2;
            // }
            if ($page_data[$i]->tgl_acc == null) {
                $terima = "<button class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='terima_langsung(\"" . $page_data[$i]->id_tindakan_farmasi .  "\",\"" . $page_data[$i]->id_resep . "\",\"" . $getStok->stok . "\",\"" . $obat_req . "\",\"" . $depo . "\",\"" . $total_harga . "\",\"" . $page_data[$i]->id_signa . "\",\"" . $page_data[$i]->id_list_tindakan . "\",\"" . $page_data[$i]->kadaluarsa . "\")' '><i class='fa fa-thumbs-up'></i></button>";
                $edit = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat(\""  . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->id_resep . "\",\"" . $getStok->stok . "\")'><i class='fa fa-rocket'></i></a>";
            } else {
                $terima = "";
                $edit = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat1(\""  . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->id_resep . "\",\"" . $getStok->stok . "\")'><i class='fa fa-rocket'></i></a>";
            }



            $out[$i] = array($no, $terima, $edit, $hapus, $nama_obat, $stok,  $jumlah_obat, $obat_req, $harga_obat, $total, $ket, $signa_obat, $staff, $depo, $kadaluarsa, $signa);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function cetak_signa($id_resep, $id_history)
    {

        // $page_data = array(
        //     'status' => 2
        // );
        // $where = array(
        //     'id_resep' => $id_resep
        // );
        // $this->M_Apotik->update($page_data, $where, 'resep_obat');

        // $page_data = array(
        //     'status' => 1,
        //     'tgl_proses' => date('Y-m-d H:i:s')
        // );
        // $where = array(
        //     'id_resep' => $id_resep
        // );
        // $this->M_Apotik->update($page_data, $where, 'antrian_farmasi');

        // $data1 = array(
        //     'tgl_acc' => date('Y-m-d H:i:s')
        // );

        // $this->M_Apotik->update($data1, $where, 'tindakan_farmasi');

        ////////////  antrol ///////////////////////
        $id_pelayanan = $this->db->get_where('resep_obat', ['id_resep' => $id_resep])->row()->id_pelayanan;
        $antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $id_pelayanan]);
        if (count($antrian->result()) > 0) {
            $data_antrol = [
                'kodebooking' => $antrian->row()->id_antrian,
                'taskid' => 7,
                'waktu' => strtotime('now') * 1000
            ];
            update_antrian($data_antrol);
        }

        //////////////////////end///////////////////////////////////////////

        $data['pasien'] = $this->M_Apotik->getDataByIdResep($id_resep, $id_history);
        $data['signa'] = $this->M_Apotik->getSignaByResep($id_resep);
        $this->load->view('print/cetak_all_signa', $data);
    }

    public function print_signa($id_tindakan)
    {
        $data['signa'] = $this->M_Apotik->getSignaById($id_tindakan);
        $this->load->view('print/cetak_signa', $data);
    }
    public function cetak_resep()
    {
        $data = array(
            'status' => 2
        );
        $where = array(
            'id_resep' => $this->input->post('id_resep')
        );
        $this->M_Apotik->update($data, $where, 'resep_obat');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function print_struk($id_resep, $id_history)
    {
        $staff = $this->session->userdata('data_auth');


        $id = uniqid();
        $tgl = date("Y-m-d H:i:s");
        $nota = $this->M_Apotik->getNota($id_resep);
        $max = $this->M_Apotik->getMax()->indeks;

        $max = ($max == 0) ? 1 : $max + 1;
        $kode = ($staff->tipe == "apotik") ? "FRJ" : "FRI";
        $no_nota = "NB." . $kode . "." . date("Ydm") . "." . sprintf('%04d', $max);

        if (count($nota) > 0) {
            // do nothing
        } else {
            $data_nota = [
                'id_nota_resep' => $id,
                'indeks' => $max,
                'no_nota' => $no_nota,
                'tanggal' => date("Y-m-d H:i:s"),
                'tipe' => 'resep',
                'staff' => $staff->id_staff
            ];
            $this->M_Apotik->insert_tindakan($data_nota, 'nota_resep');


            $resep = array(
                'id_nota' => $id,
                'status' => 2
            );
            $where = array(
                'id_resep' => $id_resep
            );
            $this->M_Apotik->update($resep, $where, 'resep_obat');
        }

        date_default_timezone_set('Asia/Jakarta');

        $page_data = array(
            'status' => 1,
            'tgl_proses' => date('Y-m-d H:i:s')
        );
        $where = array(
            'id_resep' => $id_resep
        );
        $this->M_Apotik->update($page_data, $where, 'antrian_farmasi');

        $data['resep'] = $this->M_Apotik->getResepById($id_resep);
        $data['nota'] = $this->M_Apotik->getNota($id_resep)[0]->no_nota;
        $data['pasien'] = $this->M_Apotik->getDataByIdResep($id_resep, $id_history);
        $this->load->view('print/cetak_struk_resep', $data);
    }
    public function print_struk1($id_resep, $id_history)
    {

        $data['resep'] = $this->M_Apotik->getResepById($id_resep);
        $data['nota'] = $this->M_Apotik->getNota($id_resep)[0];
        $data['pasien'] = $this->M_Apotik->getDataByIdResep($id_resep, $id_history);
        $this->load->view('print/cetak_struk_resep1', $data);
    }
    public function print_retur($id_resep, $id_history)
    {
        $staff = $this->session->userdata('data_auth');


        $id = uniqid();
        $tgl = date("Y-m-d H:i:s");
        $nota = $this->M_Apotik->getNotaRetur($id_resep);
        $max = $this->M_Apotik->getMax()->indeks;

        $max = ($max == 0) ? 1 : $max + 1;
        $kode = ($staff->tipe == "apotik") ? "FRJ" : "FRI";
        $no_nota = "NR." . $kode . "." . date("Ydm") . "." . sprintf('%04d', $max);

        if (count($nota) > 0) {
            // do nothing
        } else {
            $data_nota = [
                'id_nota_resep' => $id,
                'indeks' => $max,
                'no_nota' => $no_nota,
                'tanggal' => date("Y-m-d H:i:s"),
                'tipe' => 'retur resep',
                'staff' => $staff->id_staff
            ];
            $this->M_Apotik->insert_tindakan($data_nota, 'nota_resep');


            $resep = array(
                'id_nota_retur' => $id
            );
            $where = array(
                'id_resep' => $id_resep
            );
            $this->M_Apotik->update($resep, $where, 'resep_obat');
        }

        $data['resep'] = $this->M_Apotik->getResepReturById($id_resep);
        $data['nota'] = $this->M_Apotik->getNotaRetur($id_resep)[0]->no_nota;
        $data['pasien'] = $this->M_Apotik->getDataByIdResep($id_resep, $id_history);
        $this->load->view('print/cetak_struk_resep_retur', $data);
    }
    public function print_resep($id_resep, $id_history)
    {
        $data['resep'] = $this->M_Apotik->getResepDokterById($id_resep);
        $data['pasien'] = $this->M_Apotik->getDataByIdResep($id_resep, $id_history);
        $this->load->view('print/cetak_resep', $data);
    }
    public function cetakRacikan($id_resep, $id_history)
    {
        $asesmen_igd = $this->db->get_where('form_ass_per_igd', ['id_history' => $id_history]);
        $asesmen_poli = $this->db->get_where('form_assesmen_awal_rajal', ['id_history' => $id_history]);
        $diagnosa = $this->db->get_where('diagnosa_utama', ['id_history' => $id_history]);
        if (count($asesmen_igd->result()) > 0) {
            $data['berat_badan'] = $asesmen_igd->row()->berat_badan;
            $data['tinggi_badan'] = $asesmen_igd->row()->tinggi_badan;
        } else if (count($asesmen_poli->result()) > 0) {
            $data['berat_badan'] = $asesmen_poli->row()->berat_badan;
            $data['tinggi_badan'] = $asesmen_poli->row()->tinggi_badan;
        } else {
            $data['berat_badan'] = "";
            $data['tinggi_badan'] = "";
        }

        if (count($diagnosa->result()) > 0) {
            $data['diagnosa'] = $diagnosa->row()->kode . " - " . $diagnosa->row()->nama_diagnosa;
        } else {
            $data['diagnosa'] = "";
        }

        $data['resep'] = $this->M_Apotik->selectRacikanByResep($id_resep);
        $data['pasien'] = $this->M_Apotik->getDataByIdResep($id_resep, $id_history);

        $this->load->view('print/cetak_racikan', $data);
    }
    public function print_copy_resep($id_resep, $id_history)
    {
        $asesmen_igd = $this->db->get_where('form_ass_per_igd', ['id_history' => $id_history]);
        $asesmen_poli = $this->db->get_where('form_assesmen_awal_rajal', ['id_history' => $id_history]);
        $diagnosa = $this->db->get_where('diagnosa_utama', ['id_history' => $id_history]);
        if (count($asesmen_igd->result()) > 0) {
            $data['berat_badan'] = $asesmen_igd->row()->berat_badan;
            $data['tinggi_badan'] = $asesmen_igd->row()->tinggi_badan;
        } else if (count($asesmen_poli->result()) > 0) {
            $data['berat_badan'] = $asesmen_poli->row()->berat_badan;
            $data['tinggi_badan'] = $asesmen_poli->row()->tinggi_badan;
        } else {
            $data['berat_badan'] = "";
            $data['tinggi_badan'] = "";
        }

        if (count($diagnosa->result()) > 0) {
            $data['diagnosa'] = $diagnosa->row()->kode . " - " . $diagnosa->row()->nama_diagnosa;
        } else {
            $data['diagnosa'] = "";
        }

        $data['resep'] = $this->M_Apotik->getResepById_copy($id_resep);
        $data['pasien'] = $this->M_Apotik->getDataByIdResep($id_resep, $id_history);
        $this->load->view('print/copy_resep', $data);
    }

    public function print_cetak_sampel($id_resep, $id_history)
    {
        $asesmen_igd = $this->db->get_where('form_ass_per_igd', ['id_history' => $id_history]);
        $asesmen_poli = $this->db->get_where('form_assesmen_awal_rajal', ['id_history' => $id_history]);
        $diagnosa = $this->db->get_where('diagnosa_utama', ['id_history' => $id_history]);
        if (count($asesmen_igd->result()) > 0) {
            $data['berat_badan'] = $asesmen_igd->row()->berat_badan;
            $data['tinggi_badan'] = $asesmen_igd->row()->tinggi_badan;
        } else if (count($asesmen_poli->result()) > 0) {
            $data['berat_badan'] = $asesmen_poli->row()->berat_badan;
            $data['tinggi_badan'] = $asesmen_poli->row()->tinggi_badan;
        } else {
            $data['berat_badan'] = "";
            $data['tinggi_badan'] = "";
        }

        if (count($diagnosa->result()) > 0) {
            $data['diagnosa'] = $diagnosa->row()->kode . " - " . $diagnosa->row()->nama_diagnosa;
        } else {
            $data['diagnosa'] = "";
        }

        $data['resep'] = $this->M_Apotik->getData_copyresep($id_resep);
        $data['pasien'] = $this->M_Apotik->getDataByIdResep($id_resep, $id_history);

        $this->load->view('print/cetak_sampel', $data);
    }
    public function print_layout($id_resep, $id_history)
    {
        $asesmen_igd = $this->db->get_where('form_ass_per_igd', ['id_history' => $id_history]);
        $asesmen_poli = $this->db->get_where('form_assesmen_awal_rajal', ['id_history' => $id_history]);
        $diagnosa = $this->db->get_where('diagnosa_utama', ['id_history' => $id_history]);
        if (count($asesmen_igd->result()) > 0) {
            $data['berat_badan'] = $asesmen_igd->row()->berat_badan;
            $data['tinggi_badan'] = $asesmen_igd->row()->tinggi_badan;
        } else if (count($asesmen_poli->result()) > 0) {
            $data['berat_badan'] = $asesmen_poli->row()->berat_badan;
            $data['tinggi_badan'] = $asesmen_poli->row()->tinggi_badan;
        } else {
            $data['berat_badan'] = "";
            $data['tinggi_badan'] = "";
        }

        if (count($diagnosa->result()) > 0) {
            $data['diagnosa'] = $diagnosa->row()->kode . " - " . $diagnosa->row()->nama_diagnosa;
        } else {
            $data['diagnosa'] = "";
        }
        $data['antri'] = $this->M_Layar_farmasi2->getSelesai();
        $data['pasien'] = $this->M_Apotik->getDataByIdResep($id_resep, $id_history);
        $resep = $this->db->get_where('resep_obat', ['id_resep' => $id_resep, 'status' => '2'])->row();
        if (isset($resep) && $resep->jenis_resep == '2') {
            $data['resep'] = $this->M_Apotik->selectRacikanByResep($id_resep);
            $this->load->view('print/cetak_racikan', $data);
        } else {
            $data['resep'] = $this->M_Apotik->getResepDokterById($id_resep);
            $this->load->view('print/Cetak_telaah', $data);
        }
    }
    public function print_resep_kronis($id_resep, $id_history)
    {
        $data['resep'] = $this->M_Apotik->getResepDokterById($id_resep);
        $data['pasien'] = $this->M_Apotik->getDataByIdResep($id_resep, $id_history);
        $this->load->view('print/cetak_resep_kronis', $data);
    }
    public function tampil_racikan()
    {
        $id_resep = $this->input->post('id_resep');
        $page_data = $this->M_Apotik->selectRacikanByResep($id_resep);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 

            $tombol =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='tindakan_racikan()' '><i class='fa fa-plus-circle '></i></button>";
            $tombol1 =   "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tabel_obat(\"" . $page_data[$i]->id_resep .  "\")' '><i class='fa fa-table '></i></button>";
            $cetak =   "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url('Apotik/cetakRacikan/') . $page_data[$i]->id_resep . '/' . $page_data[$i]->id_history . '/' . $page_data[$i]->id_racikan . "'><i class='icon-printer'></i></a>";

            $no = $i + 1;
            $resep = $page_data[$i]->resep;
            $signa_obat = $page_data[$i]->tindakan;
            $cara_pemakaian = $page_data[$i]->cara_pemakaian;

            $out[$i] = array($no, $tombol, $tombol1, $resep, $signa_obat, $cara_pemakaian);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function getNamaObat()
    {
        $depo = $this->input->post('depo');
        $data = $this->M_Apotik->getNamaObatByDepo($depo);

        echo json_encode($data);
    }
    public function insert_obat()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;

        $tgl =  date("Y-m-d H:i:s");
        $depo = $this->input->post('depo');
        $depostaff = ($depo == 'APOTIK') ? 'apotik' : 'deporanap';

        $id_tindakan = uniqid();
        $id_logistik = $this->input->post('id_list_tindakan');

        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $id_history = $this->input->post('id_history');
        if ($jenis_pelayanan == "RAWAT INAP" ||  $jenis_pelayanan == "RANAP") {
            $kamar = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->id_kamar;
            $tipe = $kamar;
        } else {
            $tipe = "NON";
        }
        $db_list = $this->db->get_where('list_logistik', ['id_logistik' => $id_logistik])->row();

        $page_data = array(
            'id_tindakan_farmasi' =>  $id_tindakan,
            'harga' => $this->input->post('harga'),
            'harga_persediaan' => $db_list->harga_persediaan,

            'frek' => $this->input->post('frek'),
            'frek_req' => $this->input->post('frek'),
            'id_pelayanan' => $this->input->post('id_pelayanan'),
            'poli' => $this->input->post('id_history'),
            'jenis_pelayanan' => $this->input->post('jenis_pelayanan'),
            'id_resep' => $this->input->post('id_resep'),
            'id_list_tindakan' => $this->input->post('id_list_tindakan'),
            'total' => $this->input->post('total'),
            'tipe' => $tipe,
            'jumlah_racikan' => 0,
            'kadaluarsa' => $this->input->post('expire'),
            'tanggal' => $tgl,
            'id_staff' => $data->id_staff,
            'id_signa' => $this->input->post('signa'),
            'id_cara_pakai' => $this->input->post('cara_pakai'),
            'depo' => $depo,
            'hna' => $this->input->post('harga'),
            'margin' => $this->input->post('margin'),
            'disc' => $this->input->post('disc'),
            'keterangan' => $this->input->post('ket'),
            'tgl_acc' => $tgl,
        );
        if ($perequest != $depostaff) {
            $out['status'] = "Akun anda tidak punya akses untuk resep depo ini";
        } else {
            if ($depo == 'APOTIK') {
                $obat = $this->M_Apotik->getSumObatApotik($this->input->post('id_list_tindakan'));
                if ($obat['stok'] < $this->input->post('frek')) {
                    $out['status'] = "error";
                } else {

                    $stok = array(
                        'id_stok' => uniqid(),
                        'id_logistik' => $this->input->post('id_list_tindakan'),
                        'tgl' => $tgl,
                        'keterangan' => "KELUAR",
                        'frek' => $this->input->post('jumlahKurang'),
                        'saldo' => $obat['stok'] + ($this->input->post('jumlahKurang')),
                        'kadaluarsa' => $this->input->post('expire'),
                        'asal_tujuan' => "PENJUALAN",
                        'id_req' =>  $id_tindakan,
                        'id_staff' => $data->id_staff,
                    );

                    $this->M_Apotik->insert_tindakan($page_data, 'tindakan_farmasi');
                    $this->M_Apotik->insert_tindakan($stok, 'stok_apotik');

                    $this->M_Apotik->update_perencanaan($id_logistik, 'stok_apotik', 'pr_apotik');

                    $out['status'] = "success";
                }
            } else {
                $obat = $this->M_Apotik->getSumObatRanap($this->input->post('id_list_tindakan'));
                if ($obat['stok'] < $this->input->post('frek')) {
                    $out['status'] = "error";
                } else {

                    $stok = array(
                        'id_stok' => uniqid(),
                        'id_logistik' => $this->input->post('id_list_tindakan'),
                        'tgl' => $tgl,
                        'keterangan' => "KELUAR",
                        'frek' => $this->input->post('jumlahKurang'),
                        'saldo' => $obat['stok'] + ($this->input->post('jumlahKurang')),
                        'kadaluarsa' => $this->input->post('expire'),
                        'asal_tujuan' => "PENJUALAN",
                        'id_req' =>  $id_tindakan,
                        'id_staff' => $data->id_staff,
                    );

                    $this->M_Apotik->insert_tindakan($page_data, 'tindakan_farmasi');
                    $this->M_Apotik->insert_tindakan($stok, 'stok_depo');
                    $this->M_Apotik->update_perencanaan($id_logistik, 'stok_depo', 'pr_depo');
                    $out['status'] = "success";
                }
            }
            $out['status'] = "success";
        }
        echo json_encode($out);
    }
    function hapus_obat()
    {
        $data_staff = $this->session->userdata('data_auth');

        $id_tindakan = $this->input->post('id');
        $depo = $this->input->post('depo');
        if ($depo == 'APOTIK') {
            $stok = "stok_apotik";
        } else if ($depo == 'IGD') {
            $stok = "stok_igd";
        } else {
            $stok = "stok_depo";
        }

        $this->M_Apotik->delete_obat($id_tindakan, $stok);
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function getDataObat()
    {
        $id_tindakan = $this->input->post('id_tindakan');
        $db = $this->M_Apotik->getDataObat($id_tindakan);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    public function getDataObatKronis()
    {
        $id_tindakan = $this->input->post('id_tindakan');
        $db = $this->M_Apotik->getDataObatKronis($id_tindakan);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    public function update_obat()
    {
        $staff = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        $depo = $this->input->post('depo');
        $stok = $this->input->post('stok');
        $data = array(
            'frek' => $this->input->post('jumlah'),
            'total' => $this->input->post('total'),
            'id_signa' => $this->input->post('signa'),
        );
        $where = array(
            'id_tindakan_farmasi' => $this->input->post('id')
        );
        $this->M_Apotik->update($data, $where, 'tindakan_farmasi');

        $datastok = array(
            'frek' => $this->input->post('jumlah') * -1,
            'saldo' => $stok + ($this->input->post('jumlah') * -1),
        );
       
        $farmasi = $this->db->get_where('tindakan_farmasi', $where)->row();


        if ($depo == 'APOTIK') {
            $where_stok = array(
                'id_req' => $this->input->post('id'),
                'asal_tujuan' => 'PENJUALAN'
            );
            $dbstok = $this->db->get_where('stok_apotik', $where_stok)->result();
            if (count($dbstok) > 0) {
                $this->M_Apotik->update($datastok, $where_stok, 'stok_apotik');
            } else {
                $exp = $this->M_Apotik->getExpByObat($farmasi->id_list_tindakan, 'stok_apotik');
                $insertstok = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $farmasi->id_list_tindakan,
                    'tgl' => $tgl,
                    'keterangan' => "KELUAR",
                    'frek' => $this->input->post('jumlah') * -1,
                    'saldo' => $stok + ($this->input->post('jumlah') * -1),
                    'kadaluarsa' => $exp->kadaluarsa,
                    'asal_tujuan' => "PENJUALAN",
                    'id_req' =>  $this->input->post('id'),
                    'id_staff' => $staff->id_staff,
                );
                $this->M_Apotik->insert_tindakan($insertstok, 'stok_apotik');
            }
            $this->M_Apotik->update_perencanaan($farmasi->id_list_tindakan, 'stok_apotik', 'pr_apotik');
        } else {
            $where_stok = array(
                'id_req' => $this->input->post('id'),
                'asal_tujuan' => 'PENJUALAN'
            );
            $dbstok = $this->db->get_where('stok_depo', $where_stok)->result();
            if (count($dbstok) > 0) {
                $this->M_Apotik->update($datastok, $where_stok, 'stok_depo');
            } else {
                $exp = $this->M_Apotik->getExpByObat($farmasi->id_list_tindakan, 'stok_depo');
                $insertstok = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $farmasi->id_list_tindakan,
                    'tgl' => $tgl,
                    'keterangan' => "KELUAR",
                    'frek' => $this->input->post('jumlah') * -1,
                    'saldo' => $stok + ($this->input->post('jumlah') * -1),
                    'kadaluarsa' => $exp->kadaluarsa,
                    'asal_tujuan' => "PENJUALAN",
                    'id_req' =>  $this->input->post('id'),
                    'id_staff' => $staff->id_staff,
                );
                $this->M_Apotik->insert_tindakan($insertstok, 'stok_depo');
            }
            $this->M_Apotik->update_perencanaan($farmasi->id_list_tindakan, 'stok_depo', 'pr_depo');
        }
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function updateTerima()
    {
        $staff = $this->session->userdata('data_auth');
        $perequest = $staff->tipe;
        $tgl =  date("Y-m-d H:i:s");

        $depo = $this->input->post('depo');
        $id_resep = $this->input->post('id_resep');
        $stok = $this->input->post('stok');
        $frek = $this->input->post('jumlah');
        $id_logistik = $this->input->post('id_list_tindakan');
        $db_list = $this->db->get_where('list_logistik', ['id_logistik' => $id_logistik])->row();

        $data = array(
            'id_list_tindakan' => $this->input->post('id_list_tindakan'),
            'harga_persediaan' => $db_list->harga_persediaan,
            'frek' => $frek,
            'total' => $this->input->post('total'),
            'kadaluarsa' => $this->input->post('expire'),
            'id_signa' => $this->input->post('signa'),
            'tgl_acc' => $tgl
        );
        $where = array(
            'id_tindakan_farmasi' => $this->input->post('id')
        );


        $data1 = array(
            'tgl_acc' => $tgl
        );


        $out['status'] = "success";

        $datastok = array(
            'id_stok' => uniqid(),
            'id_logistik' => $this->input->post('id_list_tindakan'),
            'tgl' => $tgl,
            'keterangan' => "KELUAR",
            'frek' => $frek * -1,
            'saldo' => $stok + ($frek * -1),
            'kadaluarsa' => $this->input->post('expire'),
            'asal_tujuan' => "PENJUALAN",
            'id_req' =>  $this->input->post('id'),
            'id_staff' => $staff->id_staff,
            'id_resep' =>  $this->input->post('id_resep'),
        );
        $depostaff = ($depo == 'APOTIK') ? 'apotik' : 'deporanap';
        if ($perequest != $depostaff) {
            $out['status'] = "Akun anda tidak punya akses untuk resep depo ini";
        } else {
            if ($this->input->post('jumlah') <= $stok) {
                $this->M_Apotik->update($data, $where, 'tindakan_farmasi');
                $this->M_Apotik->update($data1, $where, 'tindakan_farmasi_kronis');

                if ($depo == 'APOTIK') {
                    $where_stok = array(
                        'id_req' => $this->input->post('id'),
                        'asal_tujuan' => 'PENJUALAN'
                    );
                    $db_stok = $this->db->get_where('stok_apotik', $where_stok)->result();
                    if (count($db_stok) > 0) {
                        $this->M_Apotik->update(['frek' => $frek * -1, 'saldo' => $stok + ($frek * -1)], $where_stok, 'stok_apotik');
                    } else {
                        $this->M_Apotik->insert_tindakan($datastok, 'stok_apotik');
                    }
                    $this->M_Apotik->update_perencanaan($id_logistik, 'stok_apotik', 'pr_apotik');
                } else {
                    $where_stok = array(
                        'id_req' => $this->input->post('id'),
                        'asal_tujuan' => 'PENJUALAN'
                    );
                    $db_stok = $this->db->get_where('stok_depo', $where_stok)->result();
                    if (count($db_stok) > 0) {
                        $this->M_Apotik->update(['frek' => $frek * -1,  'saldo' => $stok + ($frek * -1)], $where_stok, 'stok_depo');
                    } else {
                        $this->M_Apotik->insert_tindakan($datastok, 'stok_depo');
                    }
                    $this->M_Apotik->update_perencanaan($id_logistik, 'stok_depo', 'pr_depo');
                }


                $out['status'] = "success";
            } else {
                $out['status'] = "error";
            }
        }






        echo json_encode($out);
    }

    //Tindakan Signa Obat
    public function tindakan_signaobat()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/signa_obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function hapus_signa_obat()
    {
        $id = $this->input->post('id_signa');
        $this->M_Apotik->delete_tindakan($id, 'signa_obat', 'id_signa');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_tindakan_signaobat()
    {
        $page_data = $this->M_Apotik->selectTindakansignaobat();
        $id = $this->input->post('id');
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_tindakan_signaobat(\"" . $page_data[$i]->id_signa .  "\")'><i class='icon-pencil'></i></a>";
            $no = $i + 1;
            $nama = $page_data[$i]->tindakan;
            $hapus = "<button class='btn btn-danger btn-icon-anim btn-square' onclick='hapus_form_signa(\"" . $page_data[$i]->id_signa . "\")'><i class='fa fa-trash '></i></button>";
            // $biaya = $page_data[$i]->biaya_sarana;
            // $jasa = $page_data[$i]->jasa_transport;
            // $total = $jasa + $biaya;
            // $status = $page_data[$i]->status;

            $out[$i] = array($no, $edit, $hapus,  $nama);
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    public function getDataTindakansignaobat()
    {
        $id_list_tindakan = $this->input->post('id_list_tindakan');
        $db = $this->M_Apotik->selectDataTindakansignaobat($id_list_tindakan);

        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    public function edit_tindakan_signaobat()
    {
        $tindakan = $this->input->post('nama');
        $id = $this->input->post('id');
        $data = array(
            'tindakan' => $tindakan,
        );
        $where = array(
            'id_signa' => $id,
        );
        $out['status'] = "success";
        $this->M_Apotik->update($data, $where, 'signa_obat');
        echo json_encode($out);
    }
    public function insert_tindakan_signaobat()
    {
        $data = $this->session->userdata('data_auth');
        $tindakan = $this->input->post('nama');
        // $biaya = $this->input->post('biaya_sarana');
        // $jasa = $this->input->post('jasa');


        $data = array(
            'id_signa' => uniqid(),
            'tindakan' => $tindakan,
            // 'biaya_sarana' => $biaya,
            // 'jasa_transport' => $jasa,
            // 'unit_cost' => $jasa,
            // 'status' => 'AKTIF',
        );
        $this->M_Apotik->insert_tindakan_signaobat($data, 'signa_obat');
        $out['status'] = "success";
        echo json_encode($out);
    }

    //Pasien Ranap
    public function pasien_ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_ranap_apotik';
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $page_data['obat'] = $this->M_Apotik->getNamaObatUnit('stok_depo');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
public function tampil_pasien_ranap()
{
    $page_data = $this->M_Apotik->selectPasienRanap();

    $out = null;
    for ($i = 0; $i < count($page_data); $i++) {

        // Tombol Non Racikan (resep)
        $tombol_nonracikan = "<button class='btn btn-success btn-icon-anim btn-square' 
                                data-toggle='modal' 
                                onclick='tampil_resep(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'>
                                <i class='fa fa-rocket'></i>
                              </button>";
$tombol_edukasi = "<a href='" . base_url(
    'Apotik/edukasi_pendaftaran_ugd/' .
    $page_data[$i]->no_rm . '/' .
    $page_data[$i]->id_pelayanan . '/' .
    $page_data[$i]->id_history
) . "' 
class='btn btn-info btn-icon-anim btn-square'>
<i class='fa fa-book'></i></a>";


        $no     = $i + 1;
        $time   = strtotime($page_data[$i]->tgl_req);
        $tgl    = strftime("%A, %d %B %Y", $time);
        $waktu  = strftime("%H:%M WIB", $time);

        $time2  = strtotime($page_data[$i]->tgl_masuk);
        $tgl2   = strftime("%A, %d %B %Y", $time2);

        $no_rm  = " " . sprintf('%06d', $page_data[$i]->no_rm);
        $pasien = $page_data[$i]->nama;
        $jk     = $page_data[$i]->jenis_kelamin;

        $time1  = strtotime($page_data[$i]->tgl_lahir);
        $tgl1   = strftime("%A, %d %B %Y", $time1);
        $birthDate = $page_data[$i]->tgl_lahir;
        $date   = new DateTime($birthDate);
        $now    = new DateTime();
        $interval = $now->diff($date);

        $umur   = $interval->y . " Tahun, " . $interval->m . " Bulan";
        $alamat = $page_data[$i]->alamat;
        $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
        $poli   = $page_data[$i]->poli;

        $countPoli = $this->M_Apotik->countPoliRajal($page_data[$i]->id_history);
        $totalPoli = $countPoli->total;
        if ($totalPoli > 1) {
            $jumPoli = '<span class="label label-warning">2 POLI</span>';
        } elseif ($totalPoli == 1) {
            $jumPoli = '<span class="label label-success">1 POLI</span>';
        } else {
            $jumPoli = '-';
        }

        $caraBayar = $page_data[$i]->cara_bayar;
        $diagnosa  = $page_data[$i]->diagnosa;
        $dokter    = $page_data[$i]->nama_dokter;

        // Sesuai urutan tabel: NON RACIKAN -> EDUKASI PENDAFTARAN -> lainnya
        $out[$i] = array(
            $no,
            $tombol_nonracikan,
            $tombol_edukasi,
            $tgl2,
            $tgl,
            $waktu,
            $no_rm,
            $pasien,
            $jk,
            $tgl1,
            $umur,
            $alamat,
            $jenis_pelayanan,
            $poli,
            $caraBayar,
            $diagnosa,
            $dokter
        );
    }

    if ($out == null) {
        echo '{"data":""}';
        exit;
    } else {
        $page_data['data'] = $out;
        echo json_encode($page_data);
        exit;
    }
}


    //Riwayat Pasien
    public function Riwayat_pasien()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_pasien_apotik';
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $page_data['obat'] = $this->M_Apotik->getNamaObat();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_riwayat_pasien()
    {
        $page_data = $this->M_Apotik->selectRiwayatPasien();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->jenis_pelayanan . "\",\"" . $page_data[$i]->id_resep . "\")' '><i class='fa fa-rocket '></i></button>";
            $edit = "<button class='btn btn-success btn-icon-anim btn-square'  onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->jenis_pelayanan . "\",\"" . $page_data[$i]->id_resep . "\")'><i class='icon-rocket'></i></button>";

            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $time2 = strtotime($page_data[$i]->tanggal);
            $tgl2 = strftime("%A, %d %B %Y", $time2);
            $waktu2 = strftime("%H:%M WIB", $time2);
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;
            $time1 = strtotime($page_data[$i]->tgl_lahir);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);

            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";
            $alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;
            $no_nota = $page_data[$i]->no_nota;

            $out[$i] = array($no, $tombol, $edit, $tgl, $waktu, $tgl2, $waktu2, $no_rm, $nama, $no_nota, $jk, $tgl1, $umur, $alamat, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function Tampil_RangeRiwayat_pasien()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik->selectRangeRiwayatPasien($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->jenis_pelayanan . "\",\"" . $page_data[$i]->id_resep . "\")' '><i class='fa fa-rocket '></i></button>";
            $edit = "<button class='btn btn-success btn-icon-anim btn-square'  onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->jenis_pelayanan . "\",\"" . $page_data[$i]->id_resep . "\")'><i class='icon-rocket'></i></button>";

            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $time2 = strtotime($page_data[$i]->tanggal);
            $tgl2 = strftime("%A, %d %B %Y", $time2);
            $waktu2 = strftime("%H:%M WIB", $time2);
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;
            $time1 = strtotime($page_data[$i]->tgl_lahir);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);

            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";
            $alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;
            $no_nota = $page_data[$i]->no_nota;

            $out[$i] = array($no, $tombol, $edit, $tgl, $waktu, $tgl2, $waktu2, $no_rm, $nama, $no_nota, $jk, $tgl1, $umur, $alamat, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }

    public function tampil_tindakan_riwayat_pasien()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Apotik->selectRiwayatPasienById($id_pelayanan);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $depo = $page_data[$i]->depo;

            if ($depo == 'APOTIK') {
                $db_stok = 'stok_apotik';
            } else if ($depo == 'RANAP') {
                $db_stok = 'stok_depo';
            }
            $id_logistik = $page_data[$i]->id_list_tindakan;

            $getStok = $this->db->query("SELECT SUM(frek) stok from " . $db_stok . " where id_logistik ='$id_logistik'")->row();
            $stok = number_format($getStok->stok);
            $edit =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->id_resep . "\",\"" . $getStok->stok . "\")' '><i class='fa fa-rocket'></i></button>";
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->depo . "\")' '><i class='fa fa-trash'></i></button>";
            $nama = $page_data[$i]->nama;
            $kadaluarsa = $page_data[$i]->kadaluarsa;
            $harga = "Rp " . number_format($page_data[$i]->harga * $page_data[$i]->margin, 0, ',', '.');
            $frek = $page_data[$i]->frek;
            $tipe = $page_data[$i]->tipe;
            $frek_req = $page_data[$i]->frek_req;
            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $staff = $page_data[$i]->staff;

            $out[$i] = array($edit, $hapus, $nama, $kadaluarsa, $harga, $frek, $frek_req, $tipe, $total, $staff);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }

    public function tampil_tindakan_obat_retur()
    {
        $id = $this->input->post('id');
        $page_data = $this->M_Apotik->selectRiwayatPasienReturById($id);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 
            // $tombol =   "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat(\"" . $page_data[$i]->id_resep ."\",\"" .$page_data[$i]->jenis_resep.  "\")' '><i class='fa fa-rocket '></i></button>";
            $signa =   "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('Apotik_poli/print_signa_obat_bebas/') . $page_data[$i]->id_tindakan_farmasi  . "' '><i class='icon-printer'></i></a>";
            $edit =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-rocket'></i></a>";
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->depo . "\")' '><i class='fa fa-trash'></i></button>";

            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $time = strtotime($page_data[$i]->kadaluarsa);
            $kadaluarsa = strftime("%A, %d %B %Y ", $time);
            $harga_obat = "Rp " . number_format($page_data[$i]->total / $page_data[$i]->frek, 0, ',', '.');
            $jumlah_obat = abs($page_data[$i]->frek);
            $depo = $page_data[$i]->depo;
            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $ket = $page_data[$i]->keterangan;
            $staff = $page_data[$i]->staff;


            $out[$i] = array($no, $nama_obat, $kadaluarsa, $harga_obat, $jumlah_obat, $depo, $total, $ket, $staff, $hapus);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function tampil_tindakan_riwayat_pulang()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Apotik->selectRiwayatPasienById($id_pelayanan);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->id_resep . "\")' '><i class='fa fa-rocket'></i></button>";
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->depo . "\")' '><i class='fa fa-trash'></i></button>";
            $nama = $page_data[$i]->nama;
            $kadaluarsa = $page_data[$i]->kadaluarsa;
            $harga = "Rp " . number_format($page_data[$i]->harga * $page_data[$i]->margin, 0, ',', '.');
            $frek = $page_data[$i]->frek;
            $tipe = $page_data[$i]->tipe;
            $frek_req = $page_data[$i]->frek_req;
            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $staff = $page_data[$i]->staff;

            $out[$i] = array($nama, $kadaluarsa, $harga, $frek, $frek_req, $tipe, $total, $staff);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function tampil_harga_riwayat()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Apotik->getTotalTindakanById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $total  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $out[$i] = array($total);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function print_riwayat($id_pelayanan, $id_history)
    {
        $data['pasien'] = $this->M_Apotik->getDataRiwayatById($id_pelayanan, $id_history);
        $data['riwayat'] = $this->M_Apotik->getRiwayatById($id_pelayanan);
        $this->load->view('print/cetak_riwayat', $data);
    }
    public function print_resep_riwayat($id_pelayanan, $id_history)
    {
        $data['pasien'] = $this->M_Apotik->getDataRiwayatById($id_pelayanan, $id_history);
        $data['riwayat'] = $this->M_Apotik->getRiwayatById($id_pelayanan);
        $this->load->view('print/cetak_resep_riwayat', $data);
    }
    //riwayat pasien sudah pulang
    public function Riwayat_pasien_pulang()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_pasien_pulang';
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_riwayat_pasien_pulang() //resep
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Apotik->selectRiwayatPasienPulang($mulai, $akhir);
        } else {
            $page_data = $this->M_Apotik->selectRiwayatPasienPulang('', '');
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;
            $time1 = strtotime($page_data[$i]->tgl_lahir);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);

            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";
            $alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;
            $no_nota = $page_data[$i]->no_nota;


            $out[$i] = array($no, $tombol, $tgl, $waktu, $no_rm, $nama, $no_nota, $jk, $tgl1, $umur, $alamat, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }

    public function print_riwayat_pulang($id_pelayanan, $id_history)
    {
        $data['pasien'] = $this->M_Apotik->getDataRiwayatPulangById($id_pelayanan, $id_history);
        $data['riwayat'] = $this->M_Apotik->getRiwayatById($id_pelayanan);
        $this->load->view('print/cetak_riwayat', $data);
    }
    public function print_resep_riwayat_pulang($id_pelayanan, $id_history)
    {
        $data['pasien'] = $this->M_Apotik->getDataRiwayatPulangById($id_pelayanan, $id_history);
        $data['riwayat'] = $this->M_Apotik->getRiwayatById($id_pelayanan);
        $this->load->view('print/cetak_resep_riwayat', $data);
    }
    //Obat bebas
    public function Obat_bebas()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Obat_bebas_apotik';
        $page_data['cara_bayar'] = $this->M_Pencarian_Pasien->getCaraBayar();
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $page_data['obat'] = $this->M_Apotik->getNamaObat();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function insert_obat_bebas()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data_staff = $this->session->userdata('data_auth');
        $perequest = $data_staff->tipe;
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;
       
        $data = array(
            'nama' => $this->input->post('nama'),
            'tanggal' => date("Y-m-d H:i:s"),
            'cara_bayar' => $this->input->post('cara_bayar'),
            'keterangan' => $this->input->post('keterangan'),
            'id_staff' => $data_staff->id_staff,
            'unit' => $stok
        );
        $this->M_Apotik->insert_tindakan($data, 'obat_bebas');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function insert_tindakan_obat_bebas()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        $depo = $this->input->post('depo');
        $id_tindakan = uniqid();
        $id_logistik = $this->input->post('id_list_tindakan');
        $db_list = $this->db->get_where('list_logistik', ['id_logistik' => $id_logistik])->row();

        $page_data = array(
            'id_tindakan_farmasi' =>  $id_tindakan,
            'harga' => $this->input->post('harga'),
            'harga_persediaan' => $db_list->harga_persediaan,

            'frek' => $this->input->post('frek'),
            'id_pelayanan' => $this->input->post('id_pelayanan'),
            'jenis_pelayanan' => 'BEBAS',
            'id_resep' => 'obat_bebas',
            'id_list_tindakan' => $this->input->post('id_list_tindakan'),
            'total' => $this->input->post('total'),
            'tipe' => "NON",
            'jumlah_racikan' => 0,
            'kadaluarsa' => $this->input->post('expire'),
            'tanggal' => $tgl,
            'id_staff' => $data->id_staff,
            'id_signa' => $this->input->post('signa'),
            'id_cara_pakai' =>  $this->input->post('cara_pakai'),
            'depo' => $depo,
            'hna' => $this->input->post('harga'),
            'margin' => $this->input->post('margin'),
            'disc' => $this->input->post('disc'),
            'keterangan' => $this->input->post('ket'),
        );
        $this->M_Apotik->insert_tindakan($page_data, 'tindakan_farmasi');
        if ($depo == 'APOTIK') {
            $obat = $this->M_Apotik->getSumObatApotik($this->input->post('id_list_tindakan'));

            $stok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $this->input->post('id_list_tindakan'),
                'tgl' => $tgl,
                'keterangan' => "KELUAR",
                'frek' => $this->input->post('jumlahKurang'),
                'saldo' => $obat['stok'] + ($this->input->post('jumlahKurang')),
                'kadaluarsa' => $this->input->post('expire'),
                'asal_tujuan' => "PENJUALAN",
                'id_req' =>  $id_tindakan,
                'id_staff' => $data->id_staff,
            );
            $this->M_Apotik->insert_tindakan($stok, 'stok_apotik');
            $this->M_Apotik->update_perencanaan($id_logistik, 'stok_apotik', 'pr_apotik');
        } else if ($depo == 'IGD') {
            $stok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $this->input->post('id_list_tindakan'),
                'tgl' => $tgl,
                'keterangan' => "KELUAR",
                'frek' => $this->input->post('jumlahKurang'),
                'kadaluarsa' => $this->input->post('expire'),
                'asal_tujuan' => "PENJUALAN",
                'id_req' =>  $id_tindakan,
                'id_staff' => $data->id_staff,
            );
            $this->M_Apotik->insert_tindakan($stok, 'stok_igd');

            $this->M_Apotik->update_perencanaan($id_logistik, 'stok_igd', 'pr_igd');
        } else {
            $obat = $this->M_Apotik->getSumObatRanap($this->input->post('id_list_tindakan'));
            $stok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $this->input->post('id_list_tindakan'),
                'tgl' => $tgl,
                'keterangan' => "KELUAR",
                'frek' => $this->input->post('jumlahKurang'),
                'saldo' => $obat['stok'] + ($this->input->post('jumlahKurang')),
                'kadaluarsa' => $this->input->post('expire'),
                'asal_tujuan' => "PENJUALAN",
                'id_req' =>  $id_tindakan,
                'id_staff' => $data->id_staff,
            );
            $this->M_Apotik->insert_tindakan($stok, 'stok_depo');

            $this->M_Apotik->update_perencanaan($id_logistik, 'stok_depo', 'pr_depo');
        }

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function Tampil_obat_bebas()
    {
        $page_data = $this->M_Apotik->selectObatBebas();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_obat_bebas .  "\",\"" . $page_data[$i]->cara_bayar . "\")' '><i class='fa fa-rocket '></i></button>";
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $nama = $page_data[$i]->nama;
            $carabayar = $page_data[$i]->carabayar;
            $keterangan = $page_data[$i]->keterangan;
            $out[$i] = array($no, $tombol, $tgl, $waktu, $nama, $carabayar, $keterangan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function tampil_tindakan_obat_bebas()
    {
        $id = $this->input->post('id');
        $page_data = $this->M_Apotik->selectObatBebasById($id);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 
            // $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat(\"" . $page_data[$i]->id_resep ."\",\"" .$page_data[$i]->jenis_resep.  "\")' '><i class='fa fa-rocket '></i></button>";
            $signa =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetakSigna(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='icon-printer'></i></button>";
            $edit =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-rocket'></i></button>";
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->depo . "\")' '><i class='fa fa-trash'></i></button>";

            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $time = strtotime($page_data[$i]->kadaluarsa);
            $kadaluarsa = strftime("%A, %d %B %Y ", $time);
            $harga_obat = "Rp " . number_format($page_data[$i]->total / $page_data[$i]->frek, 0, ',', '.');
            $jumlah_obat = $page_data[$i]->frek;
            $depo = $page_data[$i]->depo;
            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $ket = $page_data[$i]->keterangan;
            $staff = $page_data[$i]->staff;


            $out[$i] = array($no, $edit, $hapus, $nama_obat, $kadaluarsa, $harga_obat, $jumlah_obat, $depo, $total, $ket, $staff, $signa);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function print_obat_bebas($id)
    {
        $data['resep'] = $this->M_Apotik->getObatBebasById($id);
        $data['pasien'] = $this->M_Apotik->getDataObatBebas($id);
        $this->load->view('print/cetak_obat_bebas', $data);
    }
    public function print_signa_obat_bebas($id_tindakan)
    {
        $data['signa'] = $this->M_Apotik->getSignaObatBebasById($id_tindakan);
        $this->load->view('print/cetak_signa_obat_bebas', $data);
    }
    public function cetak_signa_bebas($id)
    {
        $data['pasien'] = $this->M_Apotik->getDataObatBebas($id);
        $data['signa'] = $this->M_Apotik->getSignaObatBebasByPasien($id);
        $this->load->view('print/cetak_signa_bebas', $data);
    }

    //Stok Obat Apotik
    public function Stok_apotik()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Stok_obat_apotik';
        $page_data['status_so'] = $this->M_Apotik->getKonfigurasiSibatik();
        $page_data['obat'] = $this->M_Apotik->getObatApotik();
        $page_data['obat_stok'] = $this->M_Apotik->getEditObatApotik();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_stok_obat_apotik()
    {
        $page_data = $this->M_Apotik->selectStokApotik();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='detailStokObat(\"" . $page_data[$i]->id_logistik . "\",\"" . $page_data[$i]->tipe . "\")' '><i class='fa fa-rocket '></i></button>";
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $produsen = $page_data[$i]->produsen;
            $stok  = number_format($page_data[$i]->stok);
            $tipe = $page_data[$i]->tipe;
            $out[$i] = array($no, $tombol, $nama, $golongan_obat, $produsen, $stok, $tipe);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function tampil_detail_stok()
    {
        $id_logistik = $this->input->post('id_logistik');
        $page_data = $this->M_Apotik->selectDetailStok($id_logistik);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tampilKurang(\"" . $page_data[$i]->id_logistik . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->stok . "\",\"" . $page_data[$i]->kadaluarsa . "\")' '><i class='fa fa-rocket '></i></button>";
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $kadaluarsa = $page_data[$i]->kadaluarsa;
            $frek = $page_data[$i]->stok;

            $out[$i] = array($no, $tombol, $nama, $kadaluarsa, $frek);
        }

        $page_data['data'] = $out;
        echo json_encode($page_data);
    }
    public function update_stok_apotik()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        $id_logistik = $this->input->post('id_logistik');
        $stok = array(
            'id_stok' => uniqid(),
            'id_logistik' => $this->input->post('id_logistik'),
            'tgl' => $tgl,
            'keterangan' => "MASUK",
            'frek' => $this->input->post('frek'),
            'kadaluarsa' => $this->input->post('tglExp'),
            'asal_tujuan' => "BASE",
            'id_req' =>  '-',
            'id_staff' => $data->id_staff,
        );
        $this->M_Apotik->insert_tindakan($stok, 'stok_apotik');

        $this->M_Apotik->update_perencanaan($id_logistik, 'stok_apotik', 'pr_apotik');

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tambah_stok_apotik()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        $id_logistik = $this->input->post('id_logistik');
        $stok = array(
            'id_stok' => uniqid(),
            'id_logistik' => $this->input->post('id_logistik'),
            'tgl' => $tgl,
            'keterangan' => "MASUK",
            'frek' => $this->input->post('frek'),
            'kadaluarsa' => $this->input->post('tglExp'),
            'asal_tujuan' => "BASE",
            'id_req' =>  '-',
            'id_staff' => $data->id_staff,
        );
        $this->M_Apotik->insert_tindakan($stok, 'stok_apotik');

        $this->M_Apotik->update_perencanaan($id_logistik, 'stok_apotik', 'pr_apotik');

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function getExpStokApotik()
    {
        $obat = $this->input->post('obat');
        $data = $this->M_Apotik->getExpByObatApotik($obat);

        echo json_encode($data);
    }
    //Stok Obat IGD
    public function Stok_Igd()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Stok_igd_apotik';
        $page_data['status_so'] = $this->M_Apotik->getKonfigurasiSibatik();
        $page_data['obat'] = $this->M_Apotik->getObatApotik();
        $page_data['obat_stok'] = $this->M_Apotik->getEditObatIgd();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_stok_obat_igd()
    {
        $page_data = $this->M_Apotik->selectStokIgd();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='detailStokObat(\"" . $page_data[$i]->id_logistik . "\",\"" . $page_data[$i]->tipe . "\")' '><i class='fa fa-rocket '></i></button>";
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $produsen = $page_data[$i]->produsen;
            $stok  = number_format($page_data[$i]->stok);
            $tipe = $page_data[$i]->tipe;
            $out[$i] = array($no, $tombol, $nama, $golongan_obat, $produsen, $stok, $tipe);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function tampil_detail_stok_igd()
    {
        $id_logistik = $this->input->post('id_logistik');
        $page_data = $this->M_Apotik->selectDetailStokIgd($id_logistik);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tampilKurang(\"" . $page_data[$i]->id_logistik . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->stok . "\",\"" . $page_data[$i]->kadaluarsa . "\")' '><i class='fa fa-rocket '></i></button>";
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $kadaluarsa = $page_data[$i]->kadaluarsa;
            $frek = $page_data[$i]->stok;

            $out[$i] = array($no, $tombol, $nama, $kadaluarsa, $frek);
        }

        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    public function tambah_stok_igd()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        $id_logistik = $this->input->post('id_logistik');
        $stok = array(
            'id_stok' => uniqid(),
            'id_logistik' => $this->input->post('id_logistik'),
            'tgl' => $tgl,
            'keterangan' => "MASUK",
            'frek' => $this->input->post('frek'),
            'kadaluarsa' => $this->input->post('tglExp'),
            'asal_tujuan' => "BASE",
            'id_req' =>  '-',
            'id_staff' => $data->id_staff,
        );
        $this->M_Apotik->insert_tindakan($stok, 'stok_igd');

        $this->M_Apotik->update_perencanaan($id_logistik, 'stok_igd', 'pr_igd');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function getExpStokIgd()
    {
        $obat = $this->input->post('obat');
        $data = $this->M_Apotik->getExpByObatIGD($obat);

        echo json_encode($data);
    }
    //Tambah Stok Apotik
    public function Tambah_stok_admin()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Tambah_stok_apotik';
        $page_data['status_so'] = $this->M_Apotik->getKonfigurasiSibatik();
        $page_data['obat'] = $this->M_Apotik->getObatApotik();
        $page_data['obat_stok'] = $this->M_Apotik->getEditObatApotik();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    //Laporan Paien Rajal
    public function Laporan_pasien_rajal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pasien_rajal_apotik';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
        
    }
    public function Tampil_laporan_pasien_rajal()
    {
        $page_data = $this->M_Apotik->selectLaporanPasienObatApotik();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $dokter, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor,  $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function Tampil_Rangelaporan_pasienRajal()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik->selectRangeLaporanPasienObatApotik($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $dokter, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor,  $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function Laporan_pasien_Igd()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pasien_Igd_apotik';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_pasien_Igd()
    {
        $page_data = $this->M_Apotik->selectLaporanPasienObatRanap();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $ruangan = $page_data[$i]->ruangan;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $no_nota = $page_data[$i]->no_nota;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $ruangan, $dokter, $nama, $no_nota, $kode, $golongan_obat, $tipe, $produsen, $distributor,  $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function Tampil_Rangelaporan_pasienIgd()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik->selectRangeLaporanPasienObatRanap($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $ruangan = $page_data[$i]->ruangan;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $hna = $page_data[$i]->hna;
            $no_nota = $page_data[$i]->no_nota;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $ruangan, $dokter, $nama, $no_nota, $kode, $golongan_obat, $tipe, $produsen, $distributor,  $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function Laporan_pasien_ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pasien_ranap_apotik';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_pasien_ranap()
    {
        $page_data = $this->M_Apotik->selectLaporanPasienRanap();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $dokter, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor, $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function Tampil_Rangelaporan_pasienRanap()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik->selectRangeLaporanPasienRanap($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $dokter, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor, $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function Laporan_obat_rajal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_penjualan_obat_rajal_apotik';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_obat_rajal()
    {
        $page_data = $this->M_Apotik->selectLaporanObatRajal();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            // $time = strtotime($page_data[$i]->tgl_masuk);
            // $tgl = strftime("%A, %d %B %Y", $time);
            // $waktu = strftime("%H:%M WIB", $time);
            // $tglMasuk = $tgl.",".$waktu;
            // $time1 = strtotime($page_data[$i]->tanggal);
            // $tgl1 = strftime("%A, %d %B %Y", $time1);
            // $waktu1 = strftime("%H:%M WIB", $time1);
            // $tglInput = $tgl1.",".$waktu1;
            // $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            // $pasien = $page_data[$i]->pasien;
            // $jk = $page_data[$i]->jenis_kelamin;
            // $caraBayar = $page_data[$i]->caraBayar;
            // $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan = $page_data[$i]->golongan;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $harga_cost = $page_data[$i]->harga_cost;
            $margin = $page_data[$i]->margin;
            // $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            //$keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor, $standar, $golongan, $harga_cost, $margin, $total, $total_jual);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            $page_data['total'] = $this->M_Apotik->TotalKeuanganApotik();
            echo json_encode($page_data);
            exit;
        }
    }

    // LAPORAN PENJUALAN ITEM OBAT
    public function Laporan_item_obat()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_penjualan_item_obat';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_item_obat()
    {


        $q1 = $this->M_Apotik->selectLaporanItemObat();
        $q2 = $this->M_Apotik->selectLaporanItemObat2();
        $q3 = $this->M_Apotik->selectLaporanItemObat3();
        $q4 = $this->M_Apotik->selectLaporanItemObat4();
        $q5 = $this->M_Apotik->selectLaporanItemObat5();
        $q6 = $this->M_Apotik->selectLaporanItemObat6();
        $q7 = $this->M_Apotik->selectLaporanItemObat7();
        // $q8 = $this->M_Apotik->selectLaporanItemObat8();
        $q9 = $this->M_Apotik->selectLaporanItemObat9();
        $q10 = $this->M_Apotik->selectLaporanItemObat10();
        $q11 = $this->M_Apotik->selectLaporanItemObat11();
        $q12 = $this->M_Apotik->selectLaporanItemObat12();
        $q13 = $this->M_Apotik->selectLaporanItemObat13();
        // $q14 = $this->M_Apotik->selectLaporanItemObat14();
        $q15 = $this->M_Apotik->selectLaporanItemObat15();

        $page_data = [
            ['TOTAL ITEM OBAT', $q1->jumlah],
            ['TOTAL ITEM OBAT FOPI', $q2->fopi],
            ['TOTAL ITEM OBAT NON FOPI', $q3->nonfopi],
            ['TOTAL ITEM OBAT GENERIK', $q4->generik],
            ['TOTAL ITEM OBAT PATENT', $q5->patent],
            ['TOTAL ITEM OBAT NARKOTIKA', $q6->NARKOTIKA],
            ['TOTAL ITEM OBAT PSIKOTROPIKA', $q7->PSIKOTROPIKA],
            // ['TOTAL ITEM OBAT ANTIBIOTIK', $q8->jumlah],
            ['TOTAL PASIEN BPJS', $q9->bpjs],
            ['TOTAL PASIEN TIMAH', $q10->timah],
            ['TOTAL PASIEN INTERNAL', $q11->internal],
            ['TOTAL PASIEN MITRA/ASURANSI', $q12->mitra],
            ['TOTAL PASIEN UMUM/BAYAR SENDIRI', $q13->umum],
            // ['TOTAL PASIEN COVID', $q14->jumlah],
            ['TOTAL LEMBAR RESEP', $q15->resep],
        ];

        //print_r($page_data);

        $out = null;
        $no = 1;
        for ($i = 0; $i < count($page_data); $i++) {
            for ($j = 0; $j < count($page_data); $j++) {
                $no = $i + 1;

                $nama = $page_data[$i][0];
                $nilai = $page_data[$i][1];
            }

            //$nilai = $v;

            //$keterangan = $page_data[$i]->keterangan;

            $out[] = array($no, $nama, $nilai);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }


    public function Tampil_laporan_item_obat_range()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $q1 = $this->M_Apotik->selectLaporanItemObatRange($mulai, $akhir);
        $q2 = $this->M_Apotik->selectLaporanItemObatRange2($mulai, $akhir);
        $q3 = $this->M_Apotik->selectLaporanItemObatRange3($mulai, $akhir);
        $q4 = $this->M_Apotik->selectLaporanItemObatRange4($mulai, $akhir);
        $q5 = $this->M_Apotik->selectLaporanItemObatRange5($mulai, $akhir);
        $q6 = $this->M_Apotik->selectLaporanItemObatRange6($mulai, $akhir);
        $q7 = $this->M_Apotik->selectLaporanItemObatRange7($mulai, $akhir);
        // $q8 = $this->M_Apotik->selectLaporanItemObatRange8($mulai, $akhir);
        $q9 = $this->M_Apotik->selectLaporanItemObatRange9($mulai, $akhir);
        $q10 = $this->M_Apotik->selectLaporanItemObatRange10($mulai, $akhir);
        $q11 = $this->M_Apotik->selectLaporanItemObatRange11($mulai, $akhir);
        $q12 = $this->M_Apotik->selectLaporanItemObatRange12($mulai, $akhir);
        $q13 = $this->M_Apotik->selectLaporanItemObatRange13($mulai, $akhir);
        // $q14 = $this->M_Apotik->selectLaporanItemObatRange14($mulai, $akhir);
        $q15 = $this->M_Apotik->selectLaporanItemObatRange15($mulai, $akhir);

        $page_data = [
            ['TOTAL ITEM OBAT', $q1->jumlah],
            ['TOTAL ITEM OBAT FOPI', $q2->fopi],
            ['TOTAL ITEM OBAT NON FOPI', $q3->nonfopi],
            ['TOTAL ITEM OBAT GENERIK', $q4->generik],
            ['TOTAL ITEM OBAT PATENT', $q5->patent],
            ['TOTAL ITEM OBAT NARKOTIKA', $q6->NARKOTIKA],
            ['TOTAL ITEM OBAT PSIKOTROPIKA', $q7->PSIKOTROPIKA],
            // ['TOTAL ITEM OBAT ANTIBIOTIK', $q8->jumlah],
            ['TOTAL PASIEN BPJS', $q9->bpjs],
            ['TOTAL PASIEN TIMAH', $q10->timah],
            ['TOTAL PASIEN INTERNAL', $q11->internal],
            ['TOTAL PASIEN MITRA/ASURANSI', $q12->mitra],
            ['TOTAL PASIEN UMUM/BAYAR SENDIRI', $q13->umum],
            // ['TOTAL PASIEN COVID', $q14->jumlah],
            ['TOTAL LEMBAR RESEP', $q15->resep],
        ];

        //print_r($page_data);

        $out = null;
        $no = 1;
        for ($i = 0; $i < count($page_data); $i++) {
            for ($j = 0; $j < count($page_data); $j++) {
                $no = $i + 1;

                $nama = $page_data[$i][0];
                $nilai = $page_data[$i][1];
            }

            //$nilai = $v;

            //$keterangan = $page_data[$i]->keterangan;

            $out[] = array($no, $nama, $nilai);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }


    public function Tampil_Rangelaporan_obatRajal()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik->selectRangeLaporanObatRajal($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $harga_cost = $page_data[$i]->harga_cost;
            $margin = $page_data[$i]->margin;
            $golongan = $page_data[$i]->golongan;
            // $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;

            $out[$i] = array($no, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor, $standar, $golongan, $harga_cost, $margin, $total, $total_jual);
            // $out[$i] = array($no, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor, $standar, $harga_cost, $margin, $total, $total_jual);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function Laporan_obat_igd()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_penjualan_obat_igd_apotik';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_obat_igd()
    {
        $page_data = $this->M_Apotik->selectLaporanObatIgd();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            // $time = strtotime($page_data[$i]->tgl_masuk);
            // $tgl = strftime("%A, %d %B %Y", $time);
            // $waktu = strftime("%H:%M WIB", $time);
            // $tglMasuk = $tgl.",".$waktu;
            // $time1 = strtotime($page_data[$i]->tanggal);
            // $tgl1 = strftime("%A, %d %B %Y", $time1);
            // $waktu1 = strftime("%H:%M WIB", $time1);
            // $tglInput = $tgl1.",".$waktu1;
            // $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            // $pasien = $page_data[$i]->pasien;
            // $jk = $page_data[$i]->jenis_kelamin;
            // $caraBayar = $page_data[$i]->caraBayar;
            // $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $harga_cost = $page_data[$i]->harga_cost;
            $margin = $page_data[$i]->margin;
            // $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            //$keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor, $standar, $harga_cost, $margin, $total, $total_jual);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;

            echo json_encode($page_data);
            exit;
        }
    }
    public function Tampil_Rangelaporan_obatIgd()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik->selectRangeLaporanObatIgd($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $harga_cost = $page_data[$i]->harga_cost;
            $margin = $page_data[$i]->margin;
            // $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;

            $out[$i] = array($no, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor, $standar, $harga_cost, $margin, $total, $total_jual);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }

    public function Laporan_obat_ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_penjualan_obat_ranap_apotik';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_obat_ranap()
    {
        $page_data = $this->M_Apotik->selectLaporanObatRanap();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            // $time = strtotime($page_data[$i]->tgl_masuk);
            // $tgl = strftime("%A, %d %B %Y", $time);
            // $waktu = strftime("%H:%M WIB", $time);
            // $tglMasuk = $tgl.",".$waktu;
            // $time1 = strtotime($page_data[$i]->tanggal);
            // $tgl1 = strftime("%A, %d %B %Y", $time1);
            // $waktu1 = strftime("%H:%M WIB", $time1);
            // $tglInput = $tgl1.",".$waktu1;
            // $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            // $pasien = $page_data[$i]->pasien;
            // $jk = $page_data[$i]->jenis_kelamin;
            // $caraBayar = $page_data[$i]->caraBayar;
            // $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan = $page_data[$i]->golongan;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $no_nota = $page_data[$i]->no_nota;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $harga_cost = $page_data[$i]->harga_cost;
            $margin = $page_data[$i]->margin;
            // $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            //$keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor, $standar, $golongan, $harga_cost, $no_nota, $margin, $total, $total_jual);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;

            echo json_encode($page_data);
            exit;
        }
    }
    public function Tampil_Rangelaporan_obatRanap()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik->selectRangeLaporanObatRanap($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            // $time = strtotime($page_data[$i]->tgl_masuk);
            // $tgl = strftime("%A, %d %B %Y", $time);
            // $waktu = strftime("%H:%M WIB", $time);
            // $tglMasuk = $tgl . "," . $waktu;
            // $time1 = strtotime($page_data[$i]->tanggal);
            // $tgl1 = strftime("%A, %d %B %Y", $time1);
            // $waktu1 = strftime("%H:%M WIB", $time1);
            // $tglInput = $tgl1 . "," . $waktu1;
            // $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            // $pasien = $page_data[$i]->pasien;
            // $jk = $page_data[$i]->jenis_kelamin;
            // $caraBayar = $page_data[$i]->caraBayar;
            // $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan = $page_data[$i]->golongan;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $no_nota = $page_data[$i]->no_nota;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $harga_cost = $page_data[$i]->harga_cost;
            $margin = $page_data[$i]->margin;
            // $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            //$keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor, $standar, $golongan, $harga_cost, $no_nota, $margin, $total, $total_jual);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }

    public function Laporan_obat_ed()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_obat_ed';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_obat_ed()
    {
        $page_data = $this->M_Apotik->selectLaporanObatEd();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $harga_obat = "Rp " . number_format($page_data[$i]->harga_cost, 0, ',', '.');
            $time = strtotime($page_data[$i]->kadaluarsa);
            $kadaluarsa = strftime("%A, %d %B %Y ", $time);
            $golongan_obat = $page_data[$i]->golongan_obat;
            $produsen = $page_data[$i]->produsen;
            $stok = $page_data[$i]->stok;
            $tipe = $page_data[$i]->tipe;

            $out[$i] = array($no, $nama, $harga_obat, $kadaluarsa, $golongan_obat, $produsen, $stok, $tipe);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    //Cetak SO Apotik
    public function Cetak_so_apotik()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Cetak_so_apotik';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_cetak_so_apotik()
    {
        $page_data = $this->M_Apotik->selectCetakSoApotik();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $id_logistik = $page_data[$i]->id_logistik;
            $nama = $page_data[$i]->nama;

            // $kadaluarsa = $page_data[$i]->kadaluarsa;
            $kadaluarsa = $this->db->query("SELECT (kadaluarsa) exp,tgl_input from detail_struk 
            where id_logistik ='$id_logistik' and kadaluarsa >= NOW() 
            UNION ALL 
            SELECT (kadaluarsa) exp,tgl_input from detail_struk_bebas
            where id_logistik ='$id_logistik' and kadaluarsa >= NOW() 
            order by tgl_input desc
            ")->row();

            $kadaluarsa_past = $this->db->query("SELECT max(kadaluarsa) exp from detail_struk 
            where id_logistik ='$id_logistik' and kadaluarsa < NOW()")->row();
            $exp = isset($kadaluarsa->exp) ? date('d-m-Y', strtotime($kadaluarsa->exp)) : (isset($kadaluarsa_past->exp) ? date('d-m-Y', strtotime($kadaluarsa_past->exp)) : '-');

            // $kadaluarsa = $this->db->query("SELECT kadaluarsa FROM stok_apotik 
            // WHERE id_logistik = '$id_logistik' and asal_tujuan ='BASE' 
            // ORDER BY ABS(DATEDIFF(tgl, NOW())) ASC limit 1")->row()->kadaluarsa;

            $produsen = $page_data[$i]->produsen;
            $stok = number_format($page_data[$i]->stok);
            $tipe = $page_data[$i]->tipe;
            $harga_cost = $page_data[$i]->harga_cost;
            $hargappn = $page_data[$i]->harga_cost * (1 + ($page_data[$i]->ppn / 100));
            $harga = round($hargappn);

            $diskon = $this->db->query("SELECT diskon_rs from detail_struk 
                 where id_logistik ='$id_logistik' ORDER BY ABS(DATEDIFF(tgl_input, NOW())) ASC limit 1");

            $nilaidiskon = (count($diskon->result()) > 0) ? round(($diskon->row()->diskon_rs / 100), 2) : 0;
            $hnadiskon = round($harga_cost * (1 - $nilaidiskon));

            $out[$i] = array($no, $id_logistik, $nama, $tipe, $stok, '', $harga_cost, $nilaidiskon, $harga, $hnadiskon, $produsen, $exp);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function Cetak_so_depo()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Cetak_so_depo';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_cetak_so_igd_apotik()
    {
        $page_data = $this->M_Apotik->selectCetakSoDepo();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $id_logistik = $page_data[$i]->id_logistik;
            //$harga_obat = "Rp ".number_format($page_data[$i]->harga_cost,0,',','.');
            //$golongan_obat = $page_data[$i]->golongan_obat;
            $produsen = $page_data[$i]->produsen;
            // $kadaluarsa = $page_data[$i]->kadaluarsa;

            // $kadaluarsa = $this->db->query("SELECT kadaluarsa FROM stok_depo
            // WHERE id_logistik = '$id_logistik' and asal_tujuan ='BASE' 
            // ORDER BY ABS(DATEDIFF(tgl, NOW())) ASC limit 1")->row()->kadaluarsa;

            $kadaluarsa = $this->db->query("SELECT (kadaluarsa) exp,tgl_input from detail_struk 
            where id_logistik ='$id_logistik' and kadaluarsa >= NOW() 
            UNION ALL 
            SELECT (kadaluarsa) exp,tgl_input from detail_struk_bebas
            where id_logistik ='$id_logistik' and kadaluarsa >= NOW() 
            order by tgl_input desc
            ")->row();

            $kadaluarsa_past = $this->db->query("SELECT max(kadaluarsa) exp from detail_struk 
            where id_logistik ='$id_logistik' and kadaluarsa < NOW()")->row();
            $exp = isset($kadaluarsa->exp) ? date('d-m-Y', strtotime($kadaluarsa->exp)) : (isset($kadaluarsa_past->exp) ? date('d-m-Y', strtotime($kadaluarsa_past->exp)) : '-');


            $stok_sibatik = number_format($page_data[$i]->stok);
            $stok_fisik = '';
            $tipe = $page_data[$i]->tipe;
            $harga_cost = $page_data[$i]->harga_cost;
            $hargappn = $page_data[$i]->harga_cost * (1 + ($page_data[$i]->ppn / 100));
            $harga = round($hargappn);
            $diskon = $this->db->query("SELECT diskon_rs from detail_struk 
                 where id_logistik ='$id_logistik' ORDER BY ABS(DATEDIFF(tgl_input, NOW())) ASC limit 1");

            $nilaidiskon = (count($diskon->result()) > 0) ? round(($diskon->row()->diskon_rs / 100), 2) : 0;
            $hnadiskon = round($harga_cost * (1 - $nilaidiskon));

            $out[$i] = array($no, $id_logistik, $nama, $tipe, $stok_sibatik, '', $harga_cost, $nilaidiskon, $harga, $hnadiskon, $produsen, $exp);
            // $out[$i] = array($no, $id_logistik, $nama, $tipe, $stok_sibatik, $stok_fisik, $harga, $produsen, $kadaluarsa);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    //Laporan rajal sanbe
    public function Laporan_pasien_rajal_sanbe()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_rajal_sanbe_apotik';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_pasien_rajal_sanbe()
    {
        $page_data = $this->M_Apotik->selectLaporanPasienRajalSanbe();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $no_timah = $page_data[$i]->no_id_lain;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $no_timah, $pasien, $jk, $caraBayar, $dokter, $nama, $golongan_obat, $tipe, $produsen, $hna, $margin, $disc, $total, $total_jual, $keterangan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function Tampil_Rangelaporan_pasienRajalSanbe()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik->selectRangeLaporanPasienRajalSanbe($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $no_timah = $page_data[$i]->no_id_lain;
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $no_timah, $pasien, $jk, $caraBayar, $dokter, $nama, $golongan_obat, $tipe, $produsen, $hna, $margin, $disc, $total, $total_jual, $keterangan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    //End
    //laporan ranap sanbe
    public function Laporan_pasien_ranap_sanbe()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_ranap_sanbe_apotik';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_pasien_ranap_sanbe()
    {
        $page_data = $this->M_Apotik->selectLaporanPasienRanapSanbe();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $no_timah = $page_data[$i]->no_id_lain;
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $no_timah, $pasien, $jk, $caraBayar, $dokter, $nama, $golongan_obat, $tipe, $produsen, $hna, $margin, $disc, $total, $total_jual, $keterangan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function Tampil_Rangelaporan_pasienRanapSanbe()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik->selectRangeLaporanPasienRanapSanbe($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $no_timah = $page_data[$i]->no_id_lain;
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $no_timah, $pasien, $jk, $caraBayar, $dokter, $nama, $golongan_obat, $tipe, $produsen, $hna, $margin, $disc, $total, $total_jual, $keterangan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    //laporan obat bebas timah
    public function Laporan_pasien_obat_bebas()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_obat_bebas_timah';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_pasien_obat_bebas()
    {
        $page_data = $this->M_Apotik->selectLaporanObatBebas();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $pasien = $page_data[$i]->pasien;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dpjp;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $hna = $page_data[$i]->harga;
            $margin = $page_data[$i]->margin;
            $standar = $page_data[$i]->standar;
            $jumlah = $page_data[$i]->frek;
            $total_jual = $page_data[$i]->total_jual;
            $depo = $page_data[$i]->unit;

            $out[$i] = array($no, $tglMasuk, $pasien, $caraBayar, $dokter, $nama, $golongan_obat, $tipe, $standar, $produsen, $hna, $margin, $jumlah, $total_jual, $depo);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function Tampil_Rangelaporan_ObatBebas()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik->selectRangeLaporanObatBebas($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $pasien = $page_data[$i]->pasien;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dpjp;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $hna = $page_data[$i]->harga;
            $margin = $page_data[$i]->margin;
            $jumlah = $page_data[$i]->frek;
            $standar = $page_data[$i]->standar;
            $total_jual = $page_data[$i]->total_jual;
            $depo = $page_data[$i]->unit;

            $out[$i] = array($no, $tglMasuk, $pasien, $caraBayar, $dokter, $nama, $golongan_obat, $tipe, $standar, $produsen, $hna, $margin, $jumlah, $total_jual, $depo);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    //laporan obat bpjs
    public function Laporan_obat_bpjs()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_obat_bpjs_apotik';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_obat_bpjs()
    {
        $page_data = $this->M_Apotik->selectLaporanObatBpjs();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $harga_cost = $page_data[$i]->harga_cost;
            $margin = $page_data[$i]->margin;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;

            $out[$i] = array($no, $nama, $golongan_obat, $tipe, $produsen, $harga_cost, $margin, $total, $total_jual);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function Tampil_Rangelaporan_obatBpjs()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik->selectRangeLaporanObatBpjs($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $harga_cost = $page_data[$i]->harga_cost;
            $margin = $page_data[$i]->margin;
            // $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;

            $out[$i] = array($no, $nama, $golongan_obat, $tipe, $produsen, $harga_cost, $margin, $total, $total_jual);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    //laporan obat asuransi
    public function Laporan_obat_asuransi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_obat_asuransi_apotik';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_obat_asuransi()
    {
        $page_data = $this->M_Apotik->selectLaporanObatBpjs();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $harga_cost = $page_data[$i]->harga_cost;
            $margin = $page_data[$i]->margin;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;

            $out[$i] = array($no, $nama, $golongan_obat, $tipe, $produsen, $harga_cost, $margin, $total, $total_jual);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function Tampil_Rangelaporan_obatAsuransi()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik->selectRangeLaporanObatAsuransi($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $harga_cost = $page_data[$i]->harga_cost;
            $margin = $page_data[$i]->margin;
            // $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;

            $out[$i] = array($no, $nama, $golongan_obat, $tipe, $produsen, $harga_cost, $margin, $total, $total_jual);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    //laporan obat pribadi
    public function Laporan_obat_pribadi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_obat_pribadi_apotik';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_obat_pribadi()
    {
        $page_data = $this->M_Apotik->selectLaporanObatPribadi();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $harga_cost = $page_data[$i]->harga_cost;
            $margin = $page_data[$i]->margin;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;

            $out[$i] = array($no, $nama, $golongan_obat, $tipe, $produsen, $harga_cost, $margin, $total, $total_jual);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function Tampil_Rangelaporan_obatPribadi()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik->selectRangeLaporanObatPribadi($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $harga_cost = $page_data[$i]->harga_cost;
            $margin = $page_data[$i]->margin;
            // $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;

            $out[$i] = array($no, $nama, $golongan_obat, $tipe, $produsen, $harga_cost, $margin, $total, $total_jual);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    //End
    public function Antrian()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Antrian_pasien_apotik.php';
        $page_data['count_data'] = $this->M_Apotik->selectCountData();
        $page_data['antrian_data'] = $this->M_Apotik->getAntrian();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampilAntrian()
    {

        $staff = $this->session->userdata('data_auth');
        $id_resep = $this->input->post('id_resep');
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Apotik->selectAntrian($id_pelayanan, $mulai, $akhir);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // if ($page_data[$i]->status == 0) {
            //     $status =
            //         "<span class='label label-success capitalize-font inline-block'>ANTRI</span>";
            //     // $request =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='request(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_resep . "\",\"" . $page_data[$i]->id_pelayanan . "\",\"" . $staff->tipe . "\")' '><i class='fa fa-thumbs-up '></i></button>";
            //     $skip = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='skip_data(\"" . $page_data[$i]->id_resep . "\")' '><i class='icon-close'></i></button>";
            // } else {
            //     $status =
            //         "<span class='label label-danger capitalize-font inline-block'>SKIP</span>";
            //     // $request =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='request(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_resep . "\",\"" . $page_data[$i]->id_pelayanan . "\",\"" . $staff->tipe . "\")' '><i class='fa fa-thumbs-up '></i></button>";
            //     $skip = "";
            // }


            $time = strtotime($page_data[$i]->tgl_proses);
            $waktu = strftime("%H:%M WIB", $time);
            $tanggal = indo_date2($page_data[$i]->tanggal_resep);

            $no_rm = $page_data[$i]->no_rm;
            $nama = $page_data[$i]->nama;
            $cara_bayar = $page_data[$i]->nm_cara_bayar;
            $no_antri = strtoupper($page_data[$i]->inisial) . $page_data[$i]->no_antri;

            if ($page_data[$i]->stat_antrian == '0') {
                $status = $page_data[$i]->stat_antrian = 'Menunggu';
                $request = "-";
                $panggil = "-";
                $finish = "-";
            } else if ($page_data[$i]->stat_antrian == '1') {
                $status = $page_data[$i]->stat_antrian = 'Diproses';
                $request = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='req(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->id_pelayanan . "\",\"" . $staff->tipe . "\")' '><i class='fa fa-thumbs-up '></i></button>";
                $panggil = "-";
                $finish = "-";
            } else if ($page_data[$i]->stat_antrian == '2') {
                $status = $page_data[$i]->stat_antrian = 'Selesai';
                $request = "-";
                $panggil = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal'  onclick='playTableSuara(\""  . $page_data[$i]->no_antri . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->jenis . "\",\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->inisial . "\")' '><i class='icon-control-play'></i></button>";
                $finish = "-";
            } else if ($page_data[$i]->stat_antrian == '3') {
                $status = $page_data[$i]->stat_antrian = 'Terlewati';
                $request = "-";
                $panggil = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal'  onclick='playTableSuara(\""  . $page_data[$i]->no_antri . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->jenis . "\",\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->inisial . "\")' '><i class='icon-control-play'></i></button>";
                $finish = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal'  onclick='done(\""  . $page_data[$i]->id_resep . "\")' '><i class='fa fa-check'></i></button>";
            } else {
                $status = '-';
                $request = "-";
                $panggil = "-";
                $finish = "-";
            }

            $jam_masuk = $waktu;
            $request = $request;
            $panggil = $panggil;
            $finish = $finish;

            $out[$i] = array($no_antri, $tanggal, $jam_masuk, $no_rm, $nama,  $cara_bayar, $status, $request, $panggil, $finish);
        }
        if ($out == null) {
            echo '{"data":""}';
            // var_dump($page_data);
            // exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            // exit;
        }



        // var_dump($page_data);
    }

    public function request_selesai()
    {
        $id_resep = $this->input->post('id_resep');
        $page_data = array(
            'status' => 2,
            'tgl_selesai' => date('Y-m-d H:i:s')
        );
        $where = array(
            'id_resep' => $id_resep
        );
        $this->M_Apotik->update_selesai($page_data, $where, 'antrian_farmasi');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function updateskip()
    {
        $id_antrian = $this->input->post('id_antrian');
        $status = '1';

        $data = array(
            'status' => $status
        );

        $where = array(
            'id_antrian' => $id_antrian
        );

        $this->M_Apotik->updateskip($where, $data, 'antrian_farmasi');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function updatenext()
    {
        $id_antrian = $this->input->post('id_antrian');

        $status = '2';

        $data = array(
            'status' => $status
        );

        $where = array(
            'id_antrian' => $id_antrian
        );

        $this->M_Apotik->updatenext($where, $data, 'antrian_farmasi');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function playSuara()
    {
        $inisial = $this->input->post("inisial");
        $no_antri = $this->input->post("no_antri");
        $nama = $this->input->post("nama");
        $jenis = $this->input->post("jenis");

        // $tipe = 'apotik'; 

        $page_data = array(
            'inisial' => $inisial,
            'no' => $no_antri,
            'jenis' => $jenis,
            'nama' => $nama,
        );

        $this->M_Apotik->insertplaySuara($page_data, 'temp_antrian_farmasi');

        $id_resep = $this->input->post('id_resep');
        $page_data = array(
            'status' => 3,
            'tgl_diberikan' => date('Y-m-d H:i:s')
        );
        $where = array(
            'id_resep' => $id_resep
        );
        $this->M_Apotik->update_selesai_sgt($page_data, $where, 'antrian_farmasi');

        $data['resep'] = $this->M_Apotik->getAntrian($id_resep);
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function done()
    {
        $id_resep = $this->input->post('id_resep');
        $page_data = array(
            'status' => 4,
        );
        $where = array(
            'id_resep' => $id_resep
        );
        $this->M_Apotik->update_done($page_data, $where, 'antrian_farmasi');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function LayarFarmasi()
    {
        $this->load->view('dashboard/_header');
        $data['umum'] = $this->M_PlayRM->umum();
        $data['jaminan'] = $this->M_PlayRM->jaminan();
        $data['lansia'] = $this->M_PlayRM->lansia();
        $data['data'] = $this->M_PlayRM->selectPlay();
        $this->load->view('playRM', $data);
        $this->load->view('dashboard/_footer');
    }

    public function deleteSuara()
    {
        $this->M_PlayRM->deleteplaySuara('temp_antrian_farmasi  ');
        $out['status'] = "ok";
        echo json_encode($out);
    }
    //Laporan Permintaan Obat unit
    public function Laporan_permintaan_obat_unit()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_permintaan_obat_unit';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_Laporan_permintaan_obat_unit()
    {
        $page_data = $this->M_Apotik->selectLaporanPermintaanObatUnit();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            //sesuai kan dengan select di model
            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama_obat;
            $jumlah_request = $page_data[$i]->jumlah_request;
            $jumlah_terima = $page_data[$i]->jumlah_terima;
            $satuan = $page_data[$i]->satuan;
            $harga = $page_data[$i]->harga;
            $nilai_total = $page_data[$i]->nilai_total;
            $tujuan = $page_data[$i]->tujuan;


            $time = strtotime($page_data[$i]->tgl_req);
            $tgl = strftime("%d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $out[$i] = array($no, $nama_obat, $jumlah_request, $jumlah_terima, $satuan, $harga, $nilai_total, $tujuan, $tgl, $waktu);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }

    public function Tampil_RangeLaporan_permintaan_obat_unit()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik->selectRangeLaporanPermintaanObatUnit($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama_obat;
            $jumlah_request = $page_data[$i]->jumlah_request;
            $jumlah_terima = $page_data[$i]->jumlah_terima;
            $satuan = $page_data[$i]->satuan;
            $harga = $page_data[$i]->harga;
            $nilai_total = $page_data[$i]->nilai_total;
            $tujuan = $page_data[$i]->tujuan;


            $time = strtotime($page_data[$i]->tgl_req);
            $tgl = strftime("%d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $out[$i] = array($no, $nama_obat, $jumlah_request, $jumlah_terima, $satuan, $harga, $nilai_total, $tujuan, $time, $tgl, $waktu);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function getNamaObatReturn()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Apotik->getNamaObatReturn($id_pelayanan);

        echo json_encode($data);
    }

    public function Laporan_kunjungan_apotik()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan_apotik';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_kunjungan_apotik()
    {
        $page_data = $this->M_Apotik->selectLaporanKunjunganApotik();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $dokter = $page_data[$i]->dokter;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $no_rm, $pasien, $tglMasuk, $jenis_kelamin, $dokter, $cara_bayar,  $keterangan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function Tampil_Rangelaporan_kunjungan_apotik()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik->selectRangeLaporanKunjunganApotik($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $dokter = $page_data[$i]->dokter;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $no_rm, $pasien, $tglMasuk, $jenis_kelamin, $dokter, $cara_bayar,  $keterangan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }

    public function Laporan_fastmoving()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        if ($perequest == "apotik") {
            $stok = "stok_apotik";
        } else if ($perequest == "logistik farmasi") {
            $stok = "stok_logistik";
        } else if ($perequest == "deporanap") {
            $stok = "stok_depo";
        }
        $this->load->view('assets/_header');
        // $page_data['obat'] = $this->M_Logistik_farmasi->selectStok($stok);
        $page_data['page_content'] = 'page_content/Laporan_obat_fastmoving';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function Tampil_laporan_fastmoving()
    {
        $bulan1 = $this->input->post('bulan1');
        $bulan2 = $this->input->post('bulan2');
        $page_data = $this->M_Apotik->selectLaporanFastmoving($bulan1, $bulan2);


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $id_logistik = $page_data[$i]->id_logistik;
            $transaksi_per_bulan = $page_data[$i]->transaksi_per_bulan;
            $keterangan = $page_data[$i]->keterangan;
            $produsen = $page_data[$i]->produsen;
            $satuan_terkecil = $page_data[$i]->satuan_terkecil;
            $satuan_terbesar = $page_data[$i]->satuan_terbesar;
            $tgl_exp = $page_data[$i]->kadaluarsa;
            $hargappn =  "Rp " . number_format($page_data[$i]->harga_cost * (1 + ($page_data[$i]->ppn / 100)), 0, ',', '.');


            $out[$i] = array($no, $id_logistik, $nama, $produsen, $hargappn, $satuan_terkecil, $satuan_terbesar,  $tgl_exp);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }

    public function Laporan_slowmoving()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        if ($perequest == "apotik") {
            $stok = "stok_apotik";
        } else if ($perequest == "logistik farmasi") {
            $stok = "stok_logistik";
        } else if ($perequest == "deporanap") {
            $stok = "stok_depo";
        }
        $this->load->view('assets/_header');
        // $page_data['obat'] = $this->M_Logistik_farmasi->selectStok($stok);
        $page_data['page_content'] = 'page_content/Laporan_obat_slowmoving';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function Tampil_laporan_slowmoving()
    {
        $bulan1 = $this->input->post('bulan1');
        $bulan2 = $this->input->post('bulan2');
        $page_data = $this->M_Apotik->selectLaporanSlowmoving($bulan1, $bulan2);


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $id_logistik = $page_data[$i]->id_logistik;
            $transaksi_per_bulan = $page_data[$i]->transaksi_per_bulan;
            $keterangan = $page_data[$i]->keterangan;
            $produsen = $page_data[$i]->produsen;
            $satuan_terkecil = $page_data[$i]->satuan_terkecil;
            $satuan_terbesar = $page_data[$i]->satuan_terbesar;
            $tgl_exp = $page_data[$i]->kadaluarsa;
            $hargappn =  "Rp " . number_format($page_data[$i]->harga_cost * (1 + ($page_data[$i]->ppn / 100)), 0, ',', '.');

            $out[$i] = array($no, $id_logistik, $nama, $produsen, $hargappn, $satuan_terkecil, $satuan_terbesar,  $tgl_exp);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }

    public function Laporan_deadstok()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        if ($perequest == "apotik") {
            $stok = "stok_apotik";
        } else if ($perequest == "logistik farmasi") {
            $stok = "stok_logistik";
        } else if ($perequest == "deporanap") {
            $stok = "stok_depo";
        }
        $this->load->view('assets/_header');
        // $page_data['obat'] = $this->M_Logistik_farmasi->selectStok($stok);
        $page_data['page_content'] = 'page_content/Laporan_obat_deadstock';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function Tampil_laporan_deadstok()
    {
        $bulan1 = $this->input->post('bulan1');
        $bulan2 = $this->input->post('bulan2');
        $page_data = $this->M_Apotik->selectLaporanDeadStock($bulan1, $bulan2);


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $id_logistik = $page_data[$i]->id_logistik;
            $transaksi_per_bulan = $page_data[$i]->transaksi_per_bulan;
            $keterangan = $page_data[$i]->keterangan;
            $produsen = $page_data[$i]->produsen;
            $satuan_terkecil = $page_data[$i]->satuan_terkecil;
            $satuan_terbesar = $page_data[$i]->satuan_terbesar;
            $tgl_exp = $page_data[$i]->kadaluarsa;
            $hargappn =  "Rp " . number_format($page_data[$i]->harga_cost * (1 + ($page_data[$i]->ppn / 100)), 0, ',', '.');

            $out[$i] = array($no, $id_logistik, $nama, $produsen, $hargappn, $satuan_terkecil, $satuan_terbesar,  $tgl_exp);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function getDataResepAcc()
    {
        $id_resep = $this->input->post('id_resep');
        $farmasi = $this->db->get_where('tindakan_farmasi', ['id_resep' => $id_resep, 'frek' => 0])->result();
        echo json_encode(count($farmasi));
    }
}
