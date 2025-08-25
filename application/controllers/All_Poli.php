<?php
defined('BASEPATH') or exit('No direct script access allowed');
class All_Poli extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'IND');
        $this->load->model('M_Erm_poli');
        $this->load->model('M_SEP');
        $this->load->model('M_Kasir');
        $this->load->model('M_Kasir_ranap');
        $this->api = "http://192.168.13.181:8181/";
        //$this->api = "http://36.92.141.4/rest_ci/index.php";
        $this->load->library('curl');
    }

    public function Poli($id)
    {
        $this->load->view('assets/_header');
        $dbpoli = $this->db->get_where('list_poli', ['id_list_poli' => $id])->row();
        $page_data['poli'] = $dbpoli->nama_panjang;
        $page_data['id_poli'] = $id;
        $page_data['page_content'] = 'page_content/All_Poli';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function TagihanPoli($id)
    {
        $this->load->view('assets/_header');
        $dbpoli = $this->db->get_where('list_poli', ['id_list_poli' => $id])->row();
        $page_data['poli'] = $dbpoli->nama_panjang;
        $page_data['id_poli'] = $id;
        $page_data['page_content'] = 'page_content/tagihan_All_Poli';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function tampil_pasien_rajal()
    {
        $poli = $this->input->post('poli');
        $page_data = $this->db->query("SELECT v.*, d.nama_diagnosa
        from v_rawat_jalan v
        left join diagnosa_utama d on d.id_history = v.id_history
        where v.nama_poli = '$poli' and v.status_erm = 0
        and v.id_pelayanan not in(SELECT id_pelayanan from history_pelayanan_ranap where status = 1)
        and v.id_pelayanan not in(SELECT id_pelayanan from konfirmasi_batal)

        order by v.tgl_masuk desc")->result();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            // $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('erm_poli/form_all/' . $page_data[$i]->id_pelayanan . '/' . $page_data[$i]->id_history . '/' . $jp . '/' . $page_data[$i]->nama_poli) . "><i class='icon-note'></i></a>";
            $id_pel = urlencode(base64_encode($page_data[$i]->id_pelayanan));
            $id_his = urlencode(base64_encode($page_data[$i]->id_history));
            $asses_per_igd = $this->M_Erm_poli->checkData($page_data[$i]->id_history, 'form_assesmen_awal_rajal');
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            if ($jenis_pelayanan == "POLI PRIORITAS") {
                $jp = "PRIORITAS";
            } else {
                $jp = "POLI";
            }
            // $erm = empty($asses_per_igd) ? "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('Erm_asesmen_awal/form/' .  $id_pel .  '/' . $id_his .  '/' . $poli) . "><i class='icon-note'></i></a>" :
            //     "<a class='btn btn-danger btn-icon-anim btn-square' href=" . base_url('Erm_asesmen_awal/edit_asses_perawat_igd/' .  $id_pel .  '/' . $id_his .  '/' . $poli) . "><i class='icon-note'></i></a>";
            $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('erm_poli/form/' . urlencode(base64_encode($page_data[$i]->id_pelayanan)) . '/' . urlencode(base64_encode($page_data[$i]->id_history)) . '/' . $jp) . "><i class='icon-note'></i></a>";
            $batal = "<button class='btn btn-info btn-icon-anim btn-square' data-toggle='modal'  onclick='batal_berobat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->no_rm . "\",\"" . $page_data[$i]->tgl_masuk . "\",\"" . $page_data[$i]->nama_dokter . "\")' '><i class='fa fa-times'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);

            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;

            //Tanggal lahir
            $time1 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl1 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur
            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";
            //$total = $page_data[$i]->total_harga;
            //$alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $namapoli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = isset($page_data[$i]->nama_diagnosa) ? $page_data[$i]->nama_diagnosa : $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $out[$i] = array($no, $erm, $batal, $tgl, $waktu, $no_rm, $pasien, $jk, $tgl1, $umur, $jenis_pelayanan, $namapoli, $caraBayar, $diagnosa, $dokter);
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

    public function tampil_pasien_rajalTagihan()
    {
        $poli = $this->input->post('poli');
        $page_data = $this->db->query("SELECT v.*, d.nama_diagnosa
        from v_rawat_jalan v
        left join diagnosa_utama d on d.id_history = v.id_history
        where v.nama_poli = '$poli' 
        and v.id_pelayanan not in(SELECT id_pelayanan from history_pelayanan_ranap where status = 1)
        and v.id_pelayanan not in(SELECT id_pelayanan from konfirmasi_batal)

        order by v.tgl_masuk desc")->result();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            // $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('erm_poli/form_all/' . $page_data[$i]->id_pelayanan . '/' . $page_data[$i]->id_history . '/' . $jp . '/' . $page_data[$i]->nama_poli) . "><i class='icon-note'></i></a>";
            $id_pel = urlencode(base64_encode($page_data[$i]->id_pelayanan));
            $id_his = urlencode(base64_encode($page_data[$i]->id_history));
            $asses_per_igd = $this->M_Erm_poli->checkData($page_data[$i]->id_history, 'form_assesmen_awal_rajal');
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            if ($jenis_pelayanan == "POLI PRIORITAS") {
                $jp = "PRIORITAS";
            } else {
                $jp = "POLI";
            }
            // $erm = empty($asses_per_igd) ? "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('Erm_asesmen_awal/form/' .  $id_pel .  '/' . $id_his .  '/' . $poli) . "><i class='icon-note'></i></a>" :
            //     "<a class='btn btn-danger btn-icon-anim btn-square' href=" . base_url('Erm_asesmen_awal/edit_asses_perawat_igd/' .  $id_pel .  '/' . $id_his .  '/' . $poli) . "><i class='icon-note'></i></a>";
            $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('erm_poli/form/' . urlencode(base64_encode($page_data[$i]->id_pelayanan)) . '/' . urlencode(base64_encode($page_data[$i]->id_history)) . '/' . $jp) . "><i class='icon-note'></i></a>";
            $tombol1 = "<a title='Billing Diluar Tanggungan' style='background-color: #886451'  class='btn btn-icon-anim btn-square' href='" . base_url() . "Kasir/print_ptt/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history  . "' target='_blank'><i class='icon-printer'></i></a>";
            // $print = "<button class='btn btn-info btn-icon-anim btn-square' data-toggle='modal'  onclick='batal_berobat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->no_rm . "\",\"" . $page_data[$i]->tgl_masuk . "\",\"" . $page_data[$i]->nama_dokter . "\")' '><i class='icon-printer'></i></button>";
            $biaya = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal'  onclick='total_biaya_poli(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-note'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);

            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;

            //Tanggal lahir
            $time1 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl1 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur
            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";
            //$total = $page_data[$i]->total_harga;
            //$alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $namapoli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = isset($page_data[$i]->nama_diagnosa) ? $page_data[$i]->nama_diagnosa : $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $out[$i] = array($no, $biaya ,$tombol1, $tgl, $waktu, $no_rm, $pasien, $jk, $tgl1, $umur, $jenis_pelayanan, $namapoli, $caraBayar, $diagnosa, $dokter);
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


    public function konfirmasi_hapus_pasien()
    {
        $staff = $this->session->userdata('data_auth');
        $idPelayanan = $this->input->post('idPelayanan');
        $norm = $this->input->post('noRM');
        $tglMasuk = $this->input->post('tgl_masuk');
        $tipee = $this->input->post('tipepoli');
        $nmpasien = $this->input->post('nmPasien');
        $keterangan = $this->input->post('keteranganBatal');
        $dpjp = $this->input->post('dpjp');
        $tipepoli = $this->db->get_where('list_poli', ['id_list_poli' => $tipee])->row()->nama_panjang;

        $data = [
            'no_rm' => $norm,
            'id_pelayanan' => $idPelayanan,
            'nama' => $nmpasien,
            'poli' => $tipepoli,
            'tgl_masuk' => $tglMasuk,
            'dpjp' => $dpjp,
            'keterangan' => $keterangan,
            'staff' => $staff->id_staff
        ];

        $this->M_Erm_poli->insert($data, 'konfirmasi_batal');
        $page_data = array(
            'tgl_hapus' => date('Y-m-d H:i:s', time()),
        );
        $where = array(
            'id_pelayanan' => $idPelayanan
        );
        $this->M_Erm_poli->update($page_data,$where,  'pelayanan');
        $out['status'] = "sukses";
        echo json_encode($out);
    }
    public function Rencana_kontrol($id_history, $id_pelayanan)
    {
        // $kartu = base64_decode(urldecode($id));
        $id_pel = base64_decode(urldecode($id_pelayanan));
        $id_his = base64_decode(urldecode($id_history));

        $this->load->view('assets/_header');
        $db = $this->db->get_where('v_kunjungan', ['id_pelayanan' => $id_pel, 'id_history' => $id_his])->row();
        $page_data['kartu'] = $db->no_bpjs;
        $sep = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pel])->row();
        if($db->jenis_pelayanan != 'RAWAT INAP'){
            $poli = $this->db->get_where('list_poli', ['id_list_poli' => $db->nama_poli])->row();
        }else{
            $dokter = $this->db->get_where('dokter', ['id_dokter' => $db->dpjp])->row();
            $poli = $this->db->get_where('list_poli', ['kdpoli_bpjs' => $dokter->dokter_spes])->row();
        }
        if ($sep->no_sep == '' || $sep->no_sep == null) {
            $page_data['sep'] = "";
        } else {
            $page_data['sep'] = $sep->no_sep;
        }
        $page_data['id_his'] = $id_his;
        $page_data['history'] = $id_his;
        $page_data['id_pel'] = $id_pel;
        $page_data['dpjp'] = $db->dpjp;
        $page_data['pasien'] = $db->nama;
        $page_data['no_rm'] = $db->no_rm;
        $page_data['poli'] = $poli;
        $page_data['dokter'] = $this->M_SEP->getNamaDPJP();
        $page_data['action'] = base_url('Vclaim_bpjs/insert_kontrol');
        $page_data['action1'] = base_url('Vclaim_bpjs/update_kontrol');
        $page_data['judul'] = "RENCANA KONTROL";



        $page_data['page_content'] = 'form_vclaim/Modal_spri';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Spri($id_history, $id_pelayanan)
    {
        // $kartu = base64_decode(urldecode($id));
        $id_pel = base64_decode(urldecode($id_pelayanan));
        $id_his = base64_decode(urldecode($id_history));

        $this->load->view('assets/_header');
        $db = $this->db->get_where('v_kunjungan', ['id_pelayanan' => $id_pel, 'id_history' => $id_his])->row();
        print_r($db);
        $page_data['kartu'] = $db->no_bpjs;
        $sep = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pel])->row();
        $poli = $this->db->get_where('list_poli', ['id_list_poli' => $db->nama_poli])->row();

        $page_data['sep'] = "";
        $page_data['id_his'] = $id_his;
        $page_data['history'] = $id_his;
        $page_data['id_pel'] = $id_pel;
        $page_data['dpjp'] = $db->dpjp;
        $page_data['poli'] = $poli;
        $page_data['dokter'] = $this->M_SEP->getNamaDPJP();
        $page_data['action'] = base_url('Vclaim_bpjs/insert_spri');
        $page_data['action1'] = base_url('Vclaim_bpjs/update_spri');
        $page_data['judul'] = "SPRI";

        $page_data['page_content'] = 'form_vclaim/Modal_spri';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
}
