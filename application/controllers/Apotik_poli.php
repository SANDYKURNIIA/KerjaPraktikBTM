<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Apotik_poli extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'IND');
        $this->load->model('M_Poli');
        $this->load->model('M_Apotik');
        $this->load->model('M_Pasien');
    }


    public function poli()
    {
        $this->load->view('assets/_header');
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;

        if ($perequest == "apotik") {
            $stok = "stok_apotik";
        } else if ($perequest == "deporanap") {
            $stok = "stok_depo";
        }
        $page_data['obat'] = $this->M_Apotik->getNamaObatUnit($stok);
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $page_data['page_content'] = 'page_content/Farmasi_poli';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function igd()
    {
        $this->load->view('assets/_header');
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;

        if ($perequest == "apotik") {
            $stok = "stok_apotik";
        } else if ($perequest == "deporanap") {
            $stok = "stok_depo";
        }
        $page_data['obat'] = $this->M_Apotik->getNamaObatUnit($stok);
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $page_data['page_content'] = 'page_content/Farmasi_igd';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function ranap()
    {
        $this->load->view('assets/_header');
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;

        if ($perequest == "apotik") {
            $stok = "stok_apotik";
        } else if ($perequest == "deporanap") {
            $stok = "stok_depo";
        }
        $page_data['obat'] = $this->M_Apotik->getNamaObatUnit($stok);
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $page_data['page_content'] = 'page_content/Farmasi_ranap';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_dataIgd()
    {
        $staff = $this->session->userdata('data_auth');
        $page_data = $this->M_Pasien->selectDataPasienIgd();
        $out = null;
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Pasien->selectRangeDataPasienIgd($first_date, $second_date);
        } else {
            $page_data = $this->M_Pasien->selectDataPasienIgd();
        }
        for ($i = 0; $i < count($page_data); $i++) {

            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan .  "\",\"" . $page_data[$i]->id_history .  "\")' '><i class='fa fa-rocket '></i></button>";
            $edit = "<button class='btn btn-success btn-icon-anim btn-square'  onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $keterangan = $page_data[$i]->keterangan;
            $no_sep = $page_data[$i]->no_sep;
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;

            $out[$i] = array($no, $tombol, $edit,  $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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
    public function tampil_dataranap()
    {
        $staff = $this->session->userdata('data_auth');
        $out = null;
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Pasien->selectRangeDataPasienRawatInap($first_date, $second_date);
        } else {
            $page_data = $this->M_Pasien->selectDataPasienRawatInap();
        }
        for (
            $i = 0;
            $i < count($page_data);
            $i++
        ) {

            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan .  "\",\"" . $page_data[$i]->id_history .  "\")' '><i class='fa fa-rocket '></i></button>";
            $edit = "<button class='btn btn-success btn-icon-anim btn-square'  onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $keterangan = $page_data[$i]->keterangan;
            $no_sep = $page_data[$i]->no_sep;
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;


            $out[$i] = array($no, $tombol, $edit, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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
    public function tampil_datarajal()
    {
        $staff = $this->session->userdata('data_auth');
        $out = null;
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Pasien->selectRangeDataPasienRawatJalan($first_date, $second_date);
        } else {
            $page_data = $this->M_Pasien->selectDataPasienRawatJalan();
        }
        for (
            $i = 0;
            $i < count($page_data);
            $i++
        ) {

            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan .  "\",\"" . $page_data[$i]->id_history .  "\",\"" . $page_data[$i]->id_cara_bayar .  "\")' '><i class='fa fa-rocket '></i></button>";
            $edit = "<button class='btn btn-success btn-icon-anim btn-square'  onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $keterangan = $page_data[$i]->keterangan;
            $no_sep = $page_data[$i]->no_sep;
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;
            // $no_antri = $page_data[$i]->no_antri;


            $out[$i] = array($no, $tombol, $edit, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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


    public function insert_tindakan_obat()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        //$depo = $this->input->post('depo');
        $id_tindakan = uniqid();

        $perequest = $data->tipe;

        if ($perequest == "apotik") {
            $obat = $this->M_Apotik->getSumObatApotik($this->input->post('id_list_tindakan'));

            $stok = "stok_apotik";
            $depo = "APOTIK";
        } else if ($perequest == "deporanap") {
            $obat = $this->M_Apotik->getSumObatRanap($this->input->post('id_list_tindakan'));
            $stok = "stok_depo";
            $depo = "RANAP";
        }

        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $id_history = $this->input->post('id_history');
        if ($jenis_pelayanan == "RAWAT INAP" ||  $jenis_pelayanan == "RANAP") {
            $kamar = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->id_kamar;
            $tipe = $kamar;
        } else {
            $tipe = "NON";
        }
        $page_data = array(
            'id_tindakan_farmasi' =>  $id_tindakan,
            'harga' => $this->input->post('harga'),
            'frek' => $this->input->post('frek'),
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
            'id_cara_pakai' =>  $this->input->post('cara_pakai'),
            'depo' => $depo,
            'hna' => $this->input->post('harga'),
            'margin' => $this->input->post('margin'),
            'disc' => $this->input->post('disc'),
            'keterangan' => $this->input->post('ket'),
        );
        $this->M_Apotik->insert_tindakan($page_data, 'tindakan_farmasi');

        $datastok = array(
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
            'id_resep' => $this->input->post('id_resep'),
        );
        $this->M_Apotik->insert_tindakan($datastok, $stok);


        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_tindakan_obat_bebas()
    {
        $id = $this->input->post('id');
        $page_data = $this->M_Apotik->selectObatById($id);

        $pasien = $this->db->get_where('pelayanan', ['id_pelayanan' => $id])->row();

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
            $jumlah_obat = $page_data[$i]->frek;
            $depo = $page_data[$i]->depo;
            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $ket = $page_data[$i]->keterangan;
            $staff = $page_data[$i]->staff;


            if ($pasien->status_rawat == 'selesai') {
                $out[$i] = array($no,$nama_obat, $kadaluarsa, $harga_obat, $jumlah_obat, $depo, $total, $ket, $staff, $signa);
            } else {
                $out[$i] = array($no, $edit, $hapus, $nama_obat, $kadaluarsa, $harga_obat, $jumlah_obat, $depo, $total, $ket, $staff, $signa);
            }
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
        $page_data = $this->M_Apotik->selectObatReturById($id);

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
    public function tampil_total_obat()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Apotik->getTotalObat($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            $id_tindakan = "Rp. " . number_format($data[$i]->total, 0, ',', '.');
            $out[$i] = array($id_tindakan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }
    public function print_obat_bebas($id_resep, $id_his)
    {
        $staff = $this->session->userdata('data_auth');
        $id = uniqid();

        $nota = $this->db->get_where('nota_resep', ['id_pelayanan' => $id_resep, 'tipe' => 'bebas'])->result();


        if (count($nota) > 0) {
            // do nothing
        } else {
            $max = $this->M_Apotik->getMax()->indeks;

            $max = ($max == 0) ? 1 : $max + 1;
            $kode = ($staff->tipe == "apotik") ? "FRJ" : "FRI";
            $no_nota = "NB." . $kode . "." . date("Ydm") . "." . sprintf('%04d', $max);
            $data_nota = [
                'id_nota_resep' => $id,
                'indeks' => $max,
                'no_nota' => $no_nota,
                'tanggal' => date("Y-m-d H:i:s"),
                'tipe' => 'bebas',
                'staff' => $staff->id_staff,
                'id_pelayanan' => $id_resep
            ];
            $this->M_Apotik->insert_tindakan($data_nota, 'nota_resep');
        }


        $data['nota'] = $this->db->get_where('nota_resep', ['id_pelayanan' => $id_resep, 'tipe' => 'bebas'])->result()[0]->no_nota;
        $data['resep'] = $this->M_Apotik->getObatById($id_resep);
        $data['pasien'] = $this->M_Apotik->getDataById($id_his);
        $this->load->view('print/cetak_struk_resep', $data);
    }
    public function print_obat_bebas1($id_resep, $id_his)
    {
        $staff = $this->session->userdata('data_auth');
        $id = uniqid();


        $data['nota'] = $this->db->get_where('nota_resep', ['id_pelayanan' => $id_resep, 'tipe' => 'bebas'])->row();
        $data['resep'] = $this->M_Apotik->getObatById($id_resep);
        $data['pasien'] = $this->M_Apotik->getDataById($id_his);
        $this->load->view('print/cetak_struk_resep1', $data);
    }
    public function print_retur_obat_bebas($id_resep, $id_his)
    {
        $staff = $this->session->userdata('data_auth');
        $id = uniqid();

        $nota = $this->db->get_where('nota_resep', ['id_pelayanan' => $id_resep, 'tipe' => 'retur bebas'])->result();
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
                'tipe' => 'retur bebas',
                'staff' => $staff->id_staff,
                'id_pelayanan' => $id_resep
            ];
            $this->M_Apotik->insert_tindakan($data_nota, 'nota_resep');
        }


        $data['nota'] = $this->db->get_where('nota_resep', ['id_pelayanan' => $id_resep, 'tipe' => 'retur bebas'])->result()[0]->no_nota;
        $data['resep'] = $this->M_Apotik->getObatReturById($id_resep);
        $data['pasien'] = $this->M_Apotik->getDataById($id_his);
        $this->load->view('print/cetak_struk_resep_retur', $data);
    }
    public function print_signa_obat_bebas($id_tindakan)
    {
        $data['signa'] = $this->M_Apotik->getSignaObatById($id_tindakan);
        $this->load->view('print/cetak_signa', $data);
    }
    public function cetak_signa_bebas($id, $id_his)
    {
        $data['pasien'] = $this->M_Apotik->getDataById($id_his);
        $data['signa'] = $this->M_Apotik->getSignaObatByPasien($id);
        $this->load->view('print/cetak_all_signa', $data);
    }
    public function print_resep($id_resep, $id_his)
    {
        $data['resep'] = $this->M_Apotik->selectObatResepById($id_resep);
        $db = $this->M_Apotik->getDataById($id_his);
        $data['dokter'] = $db['foto'];
        $data['pasien'] = $db;
        $this->load->view('print/cetak_resep', $data);
    }
    //Homecare
    public function Homecare() //homecare
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Farmasi_homecare';
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $page_data['obat'] = $this->M_Apotik->getNamaObat();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_homecare()
    {
        $staff = $this->session->userdata('data_auth');
        // if ($this->input->post('mulai') != null && $this->input->post('akhir') != null || $this->input->post('mulai') != '' && $this->input->post('akhir') != '') {
        //     $page_data = $this->M_Apotik->selectRangePasienRajal($this->input->post('mulai'), $this->input->post('akhir'));
        // } else {
        //     $page_data = $this->M_Apotik->selectPasienRajal("", "");
        // }
        $page_data = $this->M_Apotik->selectPasienHomecare();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tampil_resep(\"" . $page_data[$i]->id_pasien . "\",\"" . $page_data[$i]->id_pasien . "\")' '><i class='fa fa-rocket '></i></button>";

            $no = $i + 1;
            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jk;
            $caraBayar = $page_data[$i]->caraBayar;

            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%d %B %Y %H:%M WIB", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $time1 = strtotime($page_data[$i]->tgl_lahir);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);

            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";
            $alamat = $page_data[$i]->alamat;

            $out[$i] = array($no, $tombol, $tgl, $pasien, $jk, $tgl1, $umur, $alamat, $caraBayar);
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
    public function Riwayat_resep_manual()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_resep_manual';
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_Riwayat_resep_manual()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Apotik->selectRiwayatResepManual($mulai, $akhir);
        } else {
            $page_data = $this->M_Apotik->selectRiwayatResepManual('', '');
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan .  "\",\"" . $page_data[$i]->id_history .  "\")' '><i class='fa fa-rocket '></i></button>";
            $edit = "<button class='btn btn-success btn-icon-anim btn-square'  onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;

            $out[$i] = array($no, $tombol, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $dokter, $cara_bayar,);
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
}
