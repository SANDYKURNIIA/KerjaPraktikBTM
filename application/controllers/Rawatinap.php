<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rawatinap extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Rawatinap');
        $this->load->model('M_Apotik');
        $this->load->model('M_Poli');
        $this->load->model('M_Kasir');
        $this->load->model('M_Casemix');
        $this->load->model('M_Erm');
        $this->load->helper('text');
    }


    //Function view

    public function pasien_ranap() // Ranap
    {
        $this->load->view('assets/_header');

        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;

        // Mendapatkan data dokter dengan id_dokter 64fd62cb0c037
        $dokter =  $this->db->get_where('dokter', array('status' => 'AKTIF'))->result_array();
        $page_data['dokter'] = $dokter; // Menggunakan array untuk satu dokter


        $page_data['page_content'] = 'page_content/Rawatinap';
        // $page_data['data_kamar'] = $this->M_Rawatinap->selectKamar();
        $page_data['action'] = site_url("Pasien/edit_rawat_jalan");
        // $page_data['obat'] = $this->M_Rawatinap->getNamaObat();
        // $page_data['signa'] = $this->M_Apotik->getSigna();
        // $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        // $page_data['tindakan_radiologi'] = $this->M_Rawatinap->selectNamaRadiologi();
        // $page_data['tindakan_labor'] = $this->M_Rawatinap->selectNamaLabor();
        $page_data['tindakan_hd'] = $this->M_Rawatinap->selectNamaTindakan('list_tindakan_poli_hemodialisa');
        $page_data['tindakan_kemo'] = $this->M_Rawatinap->selectNamaTindakan('list_tindakan_poli_kemoterapi');
        //$page_data['dokter'] = $this->M_Rawatinap->selectNamaDPJP();
        $page_data['poli'] = $this->db->get_where('list_poli', array('status_dokter' => 'ADA'))->result_array();
        if ($sso_user_data->tipe == "kemoterapi") {
            $stok = "stok_kemo";
            $page_data['obat_ruang'] = $this->M_Rawatinap->getNamaObatRuang($stok);
        } else if ($sso_user_data->tipe == "polihemodialisa") {
            $page_data['data_tipe_kamar'] = $this->M_Rawatinap->selectTipeKamarHd();
        }
        $page_data['tipe'] = 'ranap';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function pasien_odc() // Ranap
    {
        $this->load->view('assets/_header');

        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;

        // Mendapatkan data dokter dengan id_dokter 64fd62cb0c037
        $dokter =  $this->db->get_where('dokter', array('status' => 'AKTIF'))->result_array();
        $page_data['dokter'] = $dokter; // Menggunakan array untuk satu dokter


        $page_data['page_content'] = 'page_content/Rawatinap';
        // $page_data['data_kamar'] = $this->M_Rawatinap->selectKamar();
        $page_data['action'] = site_url("Pasien/edit_rawat_jalan");
        // $page_data['obat'] = $this->M_Rawatinap->getNamaObat();
        // $page_data['signa'] = $this->M_Apotik->getSigna();
        // $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        // $page_data['tindakan_radiologi'] = $this->M_Rawatinap->selectNamaRadiologi();
        // $page_data['tindakan_labor'] = $this->M_Rawatinap->selectNamaLabor();
        $page_data['tindakan_hd'] = $this->M_Rawatinap->selectNamaTindakan('list_tindakan_poli_hemodialisa');
        $page_data['tindakan_kemo'] = $this->M_Rawatinap->selectNamaTindakan('list_tindakan_poli_kemoterapi');
        //$page_data['dokter'] = $this->M_Rawatinap->selectNamaDPJP();
        $page_data['poli'] = $this->db->get_where('list_poli', array('status_dokter' => 'ADA'))->result_array();
        if ($sso_user_data->tipe == "kemoterapi") {
            $stok = "stok_kemo";
            $page_data['obat_ruang'] = $this->M_Rawatinap->getNamaObatRuang($stok);
        } else if ($sso_user_data->tipe == "polihemodialisa") {
            $page_data['data_tipe_kamar'] = $this->M_Rawatinap->selectTipeKamarHd();
        }
        $page_data['tipe'] = 'odc';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function pasien_riwayat() // Ranap
    {
        $this->load->view('assets/_header');

        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Rawatinap_riwayat';
        $page_data['data_kamar'] = $this->M_Rawatinap->selectKamar();
        $page_data['action'] = site_url("Pasien/edit_rawat_jalan");
        $page_data['obat'] = $this->M_Rawatinap->getNamaObat();
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $page_data['tindakan_radiologi'] = $this->M_Rawatinap->selectNamaRadiologi();
        $page_data['tindakan_labor'] = $this->M_Rawatinap->selectNamaLabor();
        $page_data['tindakan_hd'] = $this->M_Rawatinap->selectNamaTindakan('list_tindakan_poli_hemodialisa');
        $page_data['tindakan_kemo'] = $this->M_Rawatinap->selectNamaTindakan('list_tindakan_poli_kemoterapi');
        $page_data['dokter'] = $this->M_Rawatinap->selectNamaDPJP();
        $page_data['poli'] = $this->db->get_where('list_poli', array('status_dokter' => 'ADA'))->result_array();
        if ($sso_user_data->tipe == "kemoterapi") {
            $stok = "stok_kemo";
            $page_data['obat_ruang'] = $this->M_Rawatinap->getNamaObatRuang($stok);
        } else if ($sso_user_data->tipe == "polihemodialisa") {
            $page_data['data_tipe_kamar'] = $this->M_Rawatinap->selectTipeKamarHd();
        }
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function pasien_ranap_dokter() // Ranap
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Rawatinap_dokter';
        $page_data['data_kamar'] = $this->M_Rawatinap->selectKamar();
        $page_data['action'] = site_url("Pasien/edit_rawat_jalan");
        $page_data['obat'] = $this->M_Rawatinap->getNamaObat();
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $page_data['tindakan_radiologi'] = $this->M_Rawatinap->selectNamaRadiologi();
        $page_data['tindakan_labor'] = $this->M_Rawatinap->selectNamaLabor();
        $page_data['tindakan_hd'] = $this->M_Rawatinap->selectNamaTindakan('list_tindakan_poli_hemodialisa');
        $page_data['tindakan_kemo'] = $this->M_Rawatinap->selectNamaTindakan('list_tindakan_poli_kemoterapi');
        $page_data['dokter'] = $this->M_Rawatinap->selectNamaDPJP();
        $page_data['poli'] = $this->db->get_where('list_poli', array('status_dokter' => 'ADA'))->result_array();

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function getdKamarById() // Ranap
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Rawatinap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
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

    public function tampil_data_ranap() // Ranap
    {
        $jenis = $this->input->post('tipe');
        $page_data = $this->M_Rawatinap->selectDataPasienRanap($jenis);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {


            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $no = $i + 1;
            $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            // $titip = $this->db->get_where('riwayat_kamar', ['status' => 'TITIP', 'id_pelayanan' => $page_data[$i]->id_pelayanan, 'tanggal_keluar' => NULL])->result();
            // $aktif = $this->db->get_where('riwayat_kamar', ['status' => 'AKTIF', 'id_pelayanan' => $page_data[$i]->id_pelayanan, 'tanggal_keluar' => NULL])->result();
            // if (count($titip) > 0 &&  count($aktif) == 0) {
            //     $nama = "<span class='label label-danger capitalize-font inline-block' style='font-size:13px'>" . $page_data[$i]->nama . " (TITIP)</span>";
            // } else {
            $nama = $page_data[$i]->nama;
            // }
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;
            // $bentuk_makanan = $page_data[$i]->bentuk_makanan;

            // if ($bentuk_makanan  == null) {
            //     $hasiltoi =  "<span class='badge  badge-warning' style='background-color: darkyellow'>Belum Diinput</span>";
            // } else {
            //     $hasiltoi =  $bentuk_makanan;
            // }

            // $edit1 = "<button class='btn btn-warning btn-icon-anim btn-square'  data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-note'></i></button>";
            // $edit = "<button class='btn btn-success btn-icon-anim btn-square'  data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-note'></i></button>";
            // $obat = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_obat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-medkit'></i></button>";
            // $pindah = "<button class='btn btn-default btn-icon-anim btn-square' data-toggle='modal'  onclick='pindah_kamar(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-bed'></i></button>";
            // $radiologi = "<center><button class='btn btn-success btn-icon-anim btn-square'  onclick='edit_radiologi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-disc'></i></button></center>";
            // $labor = "<button class='btn btn-info btn-icon-anim btn-square' onclick='edit_labor(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-chemistry'></i></button>";
            $kemo = "<button class='btn btn-success btn-icon-anim btn-square' onclick='tindakan_kemo(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-note'></i></button>";
            $hemodialisa = "<button class='btn btn-success btn-icon-anim btn-square' onclick='tindakan_hd(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-note'></i></button>";


            $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('erm_ranap/form/' . urlencode(base64_encode($page_data[$i]->id_pelayanan)) . '/' . urlencode(base64_encode($page_data[$i]->id_history))) . "><i class='icon-note'></i></a>";
            $checkout = "<button class='btn btn-danger btn-icon-anim btn-square' onclick='check_out(\""  . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-logout'></i></button>";


            // if ($bentuk_makanan  == null) {
            //     $button =  $edit1;
            // } else {
            //     $button =  $edit;
            // }

            $antrian_operasi = $this->db->get_where('antrian_operasi', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            if (!empty($antrian_operasi)) {
                $antrian = "<span class='label label-success capitalize-font inline-block'>Sudah Input Antrian</span>";
            } else {
                $antrian = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='antrian(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";
            }

            $diagnosa = $page_data[$i]->diagnosa;
            $keterangan = $page_data[$i]->keterangan;
            $dokter = $page_data[$i]->nama_dokter;
            $staff = $this->session->userdata('data_auth');
            if ($staff->tipe == 'polihemodialisa') {
                $out[$i] = array($no, $hemodialisa, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang,  $cara_bayar, $diagnosa, $keterangan, $dokter);
            } else if ($staff->tipe == 'kemoterapi') {
                $obat_kemo = "<button class='btn btn-info btn-icon-anim btn-square' onclick='obat_ruang(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-note'></i></button>";
                if ($jenis == 'odc') {
                    $out[$i] = array($no, $kemo, $obat_kemo,$checkout, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang,  $cara_bayar, $diagnosa, $keterangan, $dokter);
                } else {
                    $out[$i] = array($no, $kemo, $obat_kemo, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang,  $cara_bayar, $diagnosa, $keterangan, $dokter);
                }
            } else {
                $out[$i] = array($no, $erm, $checkout, $antrian, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang,  $cara_bayar, $diagnosa, $keterangan, $dokter);
            }
        }
        $print['data'] = $out;
        echo json_encode($print);
    }
    public function tampil_data_ranap_riwayat() // Ranap
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Rawatinap->selectDataPasienRanap_riwayat($mulai, $akhir);
        } else {
            $tgl = date('Y-m-d');
            $page_data = $this->M_Rawatinap->selectDataPasienRanap_riwayat($tgl, $tgl);
        }
        $out = null;
        $staff = $this->session->userdata('data_auth');

        for ($i = 0; $i < count($page_data); $i++) {
            if ($staff->izin_akses == 'admin') {
                $id_history = "<button title='Kembalikan pasien ini ke menu Pasien Rawat Inap' class='btn btn-warning btn-icon-anim btn-square' onclick='kembalikankeruangan(\""  . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-action-undo text-danger'></i></button>";
            } else {
                $id_history = "<button title='Kembalikan pasien ini ke menu Pasien Rawat Inap silahkan hubungi admin ruangan' onclick='kembalikankeruangan_input(\""  . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")' class='btn btn-danger btn-icon-anim btn-square'><i class='icon-action-undo text-warning'></i></button>";
            }
            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $no = $i + 1;
            $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            $titip = $this->db->get_where('riwayat_kamar', ['status' => 'TITIP', 'id_pelayanan' => $page_data[$i]->id_pelayanan, 'tanggal_keluar' => NULL])->result();
            $aktif = $this->db->get_where('riwayat_kamar', ['status' => 'AKTIF', 'id_pelayanan' => $page_data[$i]->id_pelayanan, 'tanggal_keluar' => NULL])->result();
            if (count($titip) > 0 &&  count($aktif) == 0) {
                $nama = "<span class='label label-danger capitalize-font inline-block' style='font-size:13px'>" . $page_data[$i]->nama . " (TITIP)</span>";
            } else {
                $nama = $page_data[$i]->nama;
            }
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;
            // $bentuk_makanan = $page_data[$i]->bentuk_makanan;

            // if ($bentuk_makanan  == null) {
            //     $hasiltoi =  "<span class='badge  badge-warning' style='background-color: darkyellow'>Belum Diinput</span>";
            // } else {
            //     $hasiltoi =  $bentuk_makanan;
            // }

            $edit1 = "<button class='btn btn-warning btn-icon-anim btn-square'  data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-note'></i></button>";
            $edit = "<button class='btn btn-success btn-icon-anim btn-square'  data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-note'></i></button>";
            $obat = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_obat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-medkit'></i></button>";
            $pindah = "<button class='btn btn-default btn-icon-anim btn-square' data-toggle='modal'  onclick='pindah_kamar(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-bed'></i></button>";
            $radiologi = "<center><button class='btn btn-success btn-icon-anim btn-square'  onclick='edit_radiologi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-disc'></i></button></center>";
            $labor = "<button class='btn btn-info btn-icon-anim btn-square' onclick='edit_labor(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-chemistry'></i></button>";
            $kemo = "<button class='btn btn-success btn-icon-anim btn-square' onclick='tindakan_kemo(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-note'></i></button>";
            $hemodialisa = "<button class='btn btn-success btn-icon-anim btn-square' onclick='tindakan_hd(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-note'></i></button>";


            $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('erm_ranap/form/' . urlencode(base64_encode($page_data[$i]->id_pelayanan)) . '/' . urlencode(base64_encode($page_data[$i]->id_history))) . "><i class='icon-note'></i></a>";
            $checkout = "<button class='btn btn-danger btn-icon-anim btn-square' onclick='check_out(\""  . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-logout'></i></button>";


            // if ($bentuk_makanan  == null) {
            //     $button =  $edit1;
            // } else {
            //     $button =  $edit;
            // }

            $antrian_operasi = $this->db->get_where('antrian_operasi', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            if (!empty($antrian_operasi)) {
                $antrian = "<span class='label label-success capitalize-font inline-block'>Sudah Input Antrian</span>";
            } else {
                $antrian = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='antrian(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";
            }

            $diagnosa = $page_data[$i]->diagnosa;
            $keterangan = $page_data[$i]->keterangan;
            $dokter = $page_data[$i]->nama_dokter;
            $staff = $this->session->userdata('data_auth');
            if ($staff->tipe == 'polihemodialisa') {
                $out[$i] = array($no, $id_history, $hemodialisa, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang,  $cara_bayar, $diagnosa, $keterangan, $dokter);
            } else if ($staff->tipe == 'kemoterapi') {
                $obat_kemo = "<button class='btn btn-info btn-icon-anim btn-square' onclick='obat_ruang(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-note'></i></button>";
                $out[$i] = array($no, $id_history, $kemo, $obat_kemo, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang,  $cara_bayar, $diagnosa, $keterangan, $dokter);
            } else {
                $out[$i] = array($no, $id_history, $erm, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang,  $cara_bayar, $diagnosa, $keterangan, $dokter);
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
    public function tampil_data_ranap_dokter() // Ranap
    {
        $page_data = $this->M_Rawatinap->selectDataPasienRanapDokter();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {


            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $no = $i + 1;
            $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;
            // $bentuk_makanan = $page_data[$i]->bentuk_makanan;

            // if ($bentuk_makanan  == null) {
            //     $hasiltoi =  "<span class='badge  badge-warning' style='background-color: darkyellow'>Belum Diinput</span>";
            // } else {
            //     $hasiltoi =  $bentuk_makanan;
            // }

            $edit1 = "<button class='btn btn-warning btn-icon-anim btn-square'  data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-note'></i></button>";
            $edit = "<button class='btn btn-success btn-icon-anim btn-square'  data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-note'></i></button>";
            $obat = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_obat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-medkit'></i></button>";
            $pindah = "<button class='btn btn-default btn-icon-anim btn-square' data-toggle='modal'  onclick='pindah_kamar(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-bed'></i></button>";
            $radiologi = "<center><button class='btn btn-success btn-icon-anim btn-square'  onclick='edit_radiologi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-disc'></i></button></center>";
            $labor = "<button class='btn btn-info btn-icon-anim btn-square' onclick='edit_labor(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-chemistry'></i></button>";

            $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('erm_ranap/form/' . urlencode(base64_encode($page_data[$i]->id_pelayanan)) . '/' . urlencode(base64_encode($page_data[$i]->id_history))) . "><i class='icon-note'></i></a>";
            $checkout = "<button class='btn btn-danger btn-icon-anim btn-square' onclick='check_out(\""  . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-logout'></i></button>";

            // if ($bentuk_makanan  == null) {
            //     $button =  $edit1;
            // } else {
            //     $button =  $edit;
            // }

            $antrian_operasi = $this->db->get_where('antrian_operasi', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            if (!empty($antrian_operasi)) {
                $antrian = "<span class='label label-success capitalize-font inline-block'>Sudah Input Antrian</span>";
            } else {
                $antrian = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='antrian(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";
            }

            $diagnosa = $page_data[$i]->diagnosa;
            $keterangan = $page_data[$i]->keterangan;
            $dokter = $page_data[$i]->nama_dokter;

            $out[$i] = array($no, $erm, $checkout, $antrian, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang,  $cara_bayar, $diagnosa, $keterangan, $dokter);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }
    public function checkout()
    {
        $id_history = $this->input->post('id_history');

        //getSUM
        $id_pelayanan = $this->db->get_where('history_pelayanan_ranap', array('id_history' => $id_history))->row()->id_pelayanan;
        //$id_history = $this->input->post('idHis');
        $data_staff = $this->session->userdata("data_auth");

        $tanggal_keluar = date("Y-m-d H:i:s");

        //endnew

        $page_data1 = array(
            'tgl_keluar' => $tanggal_keluar,
            'ket' => $data_staff->id_staff,
            'ket_keluar' => $this->input->post('ketKeluar')
        );
        $where1 = array(
            'id_history' =>  $id_history
        );
        $this->M_Rawatinap->update_history($where1, $page_data1, 'history_pelayanan_ranap');

        //update kamar tersedia
        $id_kamar = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->id_kamar;
        $page_data2 = array(
            'status' => 'tersedia',
        );
        $where2 = array(
            'id_ruangan' =>   $id_kamar
        );
        $this->M_Rawatinap->update_kamar_sekarang($where2, $page_data2, 'ruangan');

        //update riwayat kamar
        //  $kamar = array(
        //     'status' => 'KELUAR',
        //     'tanggal_keluar' => $tanggal_keluar,
        // );
        // $where3 = array(
        //     'id_pelayanan' => $id_pelayanan,
        //     'status' => 'AKTIF',
        // );
        // $this->M_Kasir->update_tindakan($kamar, $where3, 'riwayat_kamar');

        $out['status'] = "success";
        // print_r($page_data);
        echo json_encode($out);
    }
    // Radiologi

    public function hapus_data_radiologi()
    {
        $id_tindakan_radiologi = $this->input->post('id_tindakan_radiologi');
        $this->M_Rawatinap->delete_radiologi($id_tindakan_radiologi);
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function get_radiologi()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Rawatinap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
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


    // public function insert_radiologi()
    // {
    //     $data = $this->session->userdata('data_auth');

    //     $id_pel_rad = $this->input->post('id_pel_rad');

    //     $id_tindakan_radiologi = $this->input->post('id');
    //     $harga = $this->input->post('harga');
    //     $id_list_tindakan = $this->input->post('id_list_tindakan');
    //     $frek = $this->input->post('frek');
    //     $diagnosa = $this->input->post('diagnosa');
    //     $total = $this->input->post('total');
    //     $tgl = date("Y-m-d H:i:s");
    //     $staff = $data->id_staff;
    //     if ($frek == 0) {
    //         $out['status'] = "error";
    //     } else {
    //         $data = array(
    //             'id_tindakan_radiologi' => $id_tindakan_radiologi,
    //             'harga' => $harga,
    //             'frek' => $frek,
    //             'id_pelayanan' => $id_pel_rad,
    //             'jenis_pelayanan' => 'RAWAT INAP',
    //             'id_tindakan' => $id_list_tindakan,
    //             'total' => $total,
    //             'diagnosa' => $diagnosa,
    //             'tanggal' => $tgl,
    //             'id_staff' => $staff,
    //             'status_radiologi' => 1,
    //         );

    //         $this->M_Rawatinap->insert_radiologi($data, 'tindakan_radiologi');
    //         $out['status'] = "success";
    //     }


    //     echo json_encode($out);
    // }

    public function tampil_list_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Rawatinap->selectDataRadiologiById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 1) {
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
                $status = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
                $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
            } else {

                $btn_detail = "";
                $detail = "";
                $status = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            }
            if ($data[$i]->keterangan == null || $data[$i]->keterangan == '') {
                $download = "";
            } else {
                $download = '<a class="btn btn-success btn-xs" href="' . base_url('Poli/download_expertise/' . $data[$i]->id_tindakan_radiologi) . '"><span class="fas fa-pencil-alt"></span> Download </a></div>';
            }

            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;
            $gambar = null;
            foreach (explode(',', $data[$i]->gambar) as $image) { // 1, 2, 3
                $gambar .= "<img src='" . base_url() . "/assets/images/" . $image . "' class='img-responsive zoom'><br>";
            }
            $ket = $data[$i]->keterangan;
            $pesan = $data[$i]->pesan;
            $diagnosa = $data[$i]->diagnosa;
            $sub_ket = word_limiter($ket, 3);
            $hasil_ket = $sub_ket . " &nbsp;" . $detail;
            $a = $tombol;
            $b = $status;

            $out[$i] = array($no, $a, $btn_detail, $download, $nama, $tanggal, $harga, $frek, $id_staff, $staff_konf, $diagnosa, $gambar, $hasil_ket, $b);
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

    public function tampil_total_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Rawatinap->Total_Radiologi_Byid($id_pelayanan);
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

    public function getdata_formById()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_tindakan = $this->input->post('tindakan');

        $db = $this->M_Rawatinap->selectDataFormById($id_pelayanan, $id_tindakan);
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



    // End


    // Labor
    public function tampil_total_labor()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Rawatinap->Total_Labor_Byid($id_pelayanan);
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

    // public function insert_labor()
    // {
    //     $data = $this->session->userdata('data_auth');

    //     $id_pel_lab = $this->input->post('id_pel_lab');
    //     $id_form_lab = $this->input->post('id_form_lab');
    //     $id_tindakan_labor = $this->input->post('id');
    //     $harga = $this->input->post('harga');
    //     $id_list_tindakan = $this->input->post('id_list_tindakan');
    //     $frek = $this->input->post('frek');
    //     $total = $this->input->post('total');
    //     $tgl_req = date("Y-m-d H:i:s");
    //     $tgl = date("Y-m-d H:i:s");
    //     $staff = $data->id_staff;

    //     if ($frek == 0) {
    //         $out['status'] = "error";
    //     } else {
    //         $data = array(
    //             'id_tindakan_labor' => $id_tindakan_labor,
    //             'harga' => $harga,
    //             'frek' => $frek,
    //             'id_pelayanan' => $id_pel_lab,
    //             'id_form_labor' => $id_form_lab,
    //             'id_list_tindakan' => $id_list_tindakan,
    //             'total' => $total,
    //             'tanggal_req' => $tgl_req,
    //             'tanggal' => $tgl,
    //             'id_staff' => $staff,
    //             'status_labor' => 1,
    //             'cara_masuk' => "RAWAT INAP",
    //         );
    //         $this->M_Rawatinap->insert_labor($data, 'tindakan_labor');
    //         $out['status'] = "success";
    //     }


    //     echo json_encode($out);
    // }

    public function hapus_data_labor()
    {
        $id_tindakan_labor = $this->input->post('id_tindakan_labor');
        $this->M_Rawatinap->delete_labor($id_tindakan_labor);
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_list_labor()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Rawatinap->selectDataLaborById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 1) {
                $status = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            } else {
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
                $status = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
            }

            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;
            $tombol = $tombol;

            $out[$i] = array($no, $tombol, $status, $nama, $tanggal, $harga, $frek, $id_staff, $staff_konf);
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

    public function get_labor()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Rawatinap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
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
    // End


    public function getTempatTidur() //Ranap
    {
        $kelas_ruangan = $this->input->post('kelas_ruangan');
        $data = $this->M_Rawatinap->getTempatTidur($kelas_ruangan);
        echo json_encode($data);
    }

    public function tampil_list_kamar() // Ranap
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Rawatinap->selectDataKamarByIdPel($id_pelayanan);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
                        //jika page_data lebih dari 1 maka tombol batal aktif
            if (count($page_data) > 1) {
                $batal ="<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='batal_pindah(\"" . $page_data[$i]->id_riwayat . "\",\"" . $page_data[$i]->tipe . "\")' '><i class='fa fa-undo'></i></button>";
            }else{
                $batal ="<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='batal_pindah(\"" . $page_data[$i]->id_riwayat . "\",\"" . $page_data[$i]->tipe . "\")' ' disabled><i class='fa fa-undo'></i></button>";
            }

            $no = $i + 1;
            $kelas_ruangan = $page_data[$i]->kelas_ruangan;
            $tipe = $page_data[$i]->tipe;
            $tanggal_masuk = $page_data[$i]->tanggal_masuk;
            $tanggal_keluar = $page_data[$i]->tanggal_keluar;
            $status = $page_data[$i]->status;

            $out[$i] = array($no,$batal, $kelas_ruangan,  $tipe, $tanggal_masuk, $tanggal_keluar, $status);
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

    //fitur soon

    // public function tampil_list_tindakan()
    // {
    //     $id_pelayanan = $this->input->post('id_pelayanan');
    //     $page_data = $this->M_Rawatinap->selectDataTindakanByIdPel($id_pelayanan);

    //     $out = null;
    //     for ($i = 0; $i < count($page_data); $i++) {
    //         $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' onclick='hapus_data_tindakan(\"" . $page_data[$i]->id_tindakan_rawatinap . "\",\"" . $id_pelayanan . "\",\"" . $page_data[$i]->nama_tindakan. "\")' '><i class='fa fa-trash '></i></button>";

    //         $no = $i+1;
    //         $nama_tindakan = $page_data[$i]->nama_tindakan;
    //         $harga = "Rp. " . number_format($page_data[$i]->harga, 0, ',', '.');
    //         $frek = $page_data[$i]->frek;
    //         $total = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
    //         $nama_dokter = $page_data[$i]->nama_dokter;
    //         $nama_staff = $page_data[$i]->nama_staff;
    //         $tombol = $tombol;

    //         $out[$i] = array($no, $nama_tindakan, $harga, $frek, $total, $nama_dokter, $nama_staff, $tombol);
    //     }
    //     if ($out == null) {
    //         echo '{"data":""}';
    //         exit;
    //     } else {
    //         $page_data['data'] = $out;
    //         echo json_encode($page_data);
    //         exit;
    //     }
    // }

    // public function tampil_total_harga()
    // {
    //     $id_pelayanan = $this->input->post('id_pelayanan');
    //     $page_data = $this->M_Rawatinap->Total_Harga_Byid($id_pelayanan);
    //     $out = null;

    //     for ($i = 0; $i < count($page_data); $i++) {
    //         $id_tindakan_tht  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
    //         $out[$i] = array($id_tindakan_tht);
    //     }
    //     if ($out == null) {
    //         echo '{"data":""}';
    //         exit;
    //     } else {
    //         $page_data['data'] = $out;
    //         echo json_encode($page_data);
    //         exit;
    //     }
    // }
    // End

    public function getdata_ranap()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Rawatinap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
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

    public function updatePindahKamar() // Ranap
    {
        $id_pelayanan = $this->input->post('idPelayanan');
        $id_tindakan_poli_mata = $this->M_Rawatinap->get_ai_tbl_riwayat();
        $kamarSekarang = $this->input->post('kamarSekarang');
        $kamarBaru = $this->input->post('kamarBaru');
        $idHis = $this->input->post('idHis');
        $tgl =  date("Y-m-d H:i:s");

        $data = $this->session->userdata('data_auth');
        $datatipe = $data->id_staff;
        $id_staff = $datatipe;

        $try =  $this->M_Rawatinap->getMaxKamar($id_pelayanan);
        // $cc = '';
        $i = 0;
        $try = array(
            $hasil = $try[$i]->max

        );
        $wow =  $this->M_Rawatinap->getMaxId($id_pelayanan, $hasil);
        $wow = array(
            $id_riwayat_max = $wow[$i]->id_riwayat,
            $id_kamar_max = $wow[$i]->id_kamar
        );


        //update history
        $page_data1 = array(
            'id_kamar' => $kamarBaru,
        );
        $where1 = array(
            'id_history' =>  $idHis
        );
        $this->M_Rawatinap->update_history($where1, $page_data1, 'history_pelayanan_ranap');

        //update kamar tersedia
        $page_data2 = array(
            'status' => 'tersedia',
        );
        $where2 = array(
            'id_ruangan' =>   $kamarSekarang
        );
        $this->M_Rawatinap->update_kamar_sekarang($where2, $page_data2, 'ruangan');

        //update kamar dipakai
        $page_data3 = array(
            'status' => 'dipakai',
        );
        $where3 = array(
            'id_ruangan' =>    $kamarBaru
        );
        $this->M_Rawatinap->update_kamar_baru($where3, $page_data3, 'ruangan');

        //update riwayat kamar
        $page_data4 = array(
            'status' => 'PINDAH',
            'tanggal_keluar' => $tgl,
        );
        $where4 = array(
            'id_pelayanan' => $id_pelayanan,
            'id_kamar' =>    $kamarSekarang,
            'tanggal_keluar' => null,
        );
        $this->M_Rawatinap->update_riwayat_kamar($where4, $page_data4, 'riwayat_kamar');

        //insert
        $page_data5 = array(
            'id_riwayat' => $id_tindakan_poli_mata,
            'id_pelayanan' => $id_pelayanan,
            'id_kamar' => $kamarBaru,
            'tanggal_masuk' => $tgl,
            'tanggal_keluar' => null,
            'status' => 'AKTIF',
            'id_staff' => $id_staff,
            'ket' => '0',
        );
        $this->M_Rawatinap->insert_kamar($page_data5, 'riwayat_kamar');
        $out['status'] = "success";
        // print_r($page_data);
        echo json_encode($out);
    }

    public function deletePindahKamar() // Ranap
    {
        $id_pelayanan = $this->input->post('idPelayanan');
        $id_tindakan_poli_mata = uniqid();
        $kamarSekarang = $this->input->post('kamarSekarang');
        // $kamarBaru = $this->input->post('kamarBaru');
        $idHis = $this->input->post('idHis');
        $tgl =  date("Y-m-d H:i:s");

        $data = $this->session->userdata('data_auth');
        $datatipe = $data->id_staff;
        $id_staff = $datatipe;
        $try =  $this->M_Rawatinap->getMaxKamar($id_pelayanan);
        // $cc = '';
        $i = 0;
        $try = array(
            $hasil = $try[$i]->max

        );
        $wow =  $this->M_Rawatinap->getMaxId($id_pelayanan, $hasil);
        $wow = array(
            $id_riwayat_max = $wow[$i]->id_riwayat,
            $id_kamar_max = $wow[$i]->id_kamar
        );

        //update riwayat kamar
        $page_data = array(
            'status' => 'AKTIF',
            // 'tanggal_masuk' => $tgl,
            'tanggal_keluar' => null,

        );
        $where = array(
            'id_pelayanan' => $id_pelayanan,
            'id_riwayat' =>    $id_riwayat_max
        );
        $this->M_Rawatinap->update_riwayat_kamar_prev($where, $page_data, 'riwayat_kamar');

        //update riwayat kamar
        $page_data1 = array(
            'ket' => '1',
            'staff_delete' => $id_staff,
            'tanggal_delete' =>    $tgl,
        );
        $where1 = array(
            'id_pelayanan' => $id_pelayanan,
            'id_kamar' =>    $kamarSekarang,
            'tanggal_keluar' =>    null,
            'ket' =>    '0',
        );
        $this->M_Rawatinap->update_riwayat_kamar_now($where1, $page_data1, 'riwayat_kamar');

        $page_data3 = array(
            'status' => 'dipakai',
        );
        $where3 = array(
            'id_ruangan' =>    $id_kamar_max
        );
        $this->M_Rawatinap->update_kamar_baru($where3, $page_data3, 'ruangan');

        $page_data4 = array(
            'status' => 'tersedia',
        );
        $where4 = array(
            'id_ruangan' =>    $kamarSekarang
        );
        $this->M_Rawatinap->update_kamar_baru($where4, $page_data4, 'ruangan');

        //update history
        $page_data5 = array(
            'id_kamar' => $id_kamar_max,
        );
        $where5 = array(
            'id_history' =>  $idHis
        );
        $this->M_Rawatinap->update_history($where5, $page_data5, 'history_pelayanan_ranap');
        // var_dump($where);
        // die;
        $out['status'] = "success";
        // print_r($page_data);
        echo json_encode($out);
    }

    public function batal_kamar() // Ranap
    {
        $this->db->trans_begin();

        $id_riwayat = $this->input->post('id_riwayat');
        $idHis = $this->input->post('idHis');

        $tgl =  date("Y-m-d H:i:s");

        $data = $this->session->userdata('data_auth');
        $datatipe = $data->id_staff;
        $id_staff = $datatipe;
        $kamar_sekarang = $this->M_Rawatinap->get_riwayat_kamar_by_id($id_riwayat);
        $kamar_terakhir = $this->M_Rawatinap->get_kamar_terakhir_by_id_pel($kamar_sekarang->id_pelayanan);

        //update riwayat kamar
            $page_data = array(
                'status' => 'BATAL',
                'staff_delete' => $id_staff,
                'tanggal_delete' =>    $tgl,
                'ket' => '1',
    
            );
            $where = array(
                'id_riwayat' =>    $id_riwayat
            );
            $this->M_Rawatinap->update_riwayat_kamar_prev($where, $page_data, 'riwayat_kamar');

        if($kamar_sekarang->status == 'AKTIF'){
            //update ruangan yang dibatalkan jadi tersedia
            $page_data3 = array(
                'status' => 'tersedia',
            );
            $where3 = array(
                'id_ruangan' => $kamar_sekarang->id_kamar
            );
            $this->M_Rawatinap->update_kamar_baru($where3, $page_data3, 'ruangan');
    
            //update ruangan kamar terakhir jadi dipakai
            $page_data4 = array(
                'status' => 'dipakai',
            );
            $where4 = array(
                'id_ruangan' => $kamar_terakhir->id_kamar
            );
            $this->M_Rawatinap->update_kamar_baru($where4, $page_data4, 'ruangan');
    
            //update history pelayanan ranap
            $page_data5 = array(
                'id_kamar' => $kamar_terakhir->id_kamar,
            );
            $where5 = array(
                'id_history' =>  $idHis
            );
            $this->M_Rawatinap->update_history($where5, $page_data5, 'history_pelayanan_ranap');

            //update riwayat kamar terakhir jadi aktif
            $page_data = array(
                'status' => 'AKTIF',
                'tanggal_keluar' => null,
    
            );
            $where = array(
                'id_riwayat' =>$kamar_terakhir->id_riwayat
            );
            $this->M_Rawatinap->update_riwayat_kamar_now($where, $page_data, 'riwayat_kamar');
        }

        if ($this->db->trans_status() === FALSE) {
            $db_error = $this->db->error();

            $this->db->trans_rollback();
            echo json_encode([
                'status'  => 'error',
                'message' => 'Terjadi kesalahan database',
                'db_code' => $db_error['code'],
                'db_msg'  => $db_error['message']
            ]);
            return;
        }

        $this->db->trans_commit();

        $out['status'] = "success";
        // print_r($page_data);
        echo json_encode($out);
    }
    
    // public function batal_kamar() // Ranap
    // {
    //     $id_riwayat = $this->input->post('id_riwayat');
    //     $idHis = $this->input->post('idHis');
    //     $tgl =  date("Y-m-d H:i:s");

    //     $data = $this->session->userdata('data_auth');
    //     $datatipe = $data->id_staff;
    //     $id_staff = $datatipe;

    //     //update riwayat kamar
    //     $page_data = array(
    //         'status' => 'BATAL',
    //         'staff_delete' => $id_staff,
    //         'tanggal_delete' =>    $tgl,

    //     );
    //     $where = array(
    //         'id_riwayat' =>    $id_riwayat
    //     );
    //     $this->M_Rawatinap->update_riwayat_kamar_prev($where, $page_data, 'riwayat_kamar');

    //     $page_data3 = array(
    //         'status' => 'dipakai',
    //     );
    //     $where3 = array(
    //         'id_ruangan' =>    $id_kamar_max
    //     );
    //     $this->M_Rawatinap->update_kamar_baru($where3, $page_data3, 'ruangan');

    //     $page_data4 = array(
    //         'status' => 'tersedia',
    //     );
    //     $where4 = array(
    //         'id_ruangan' =>    $kamarSekarang
    //     );
    //     $this->M_Rawatinap->update_kamar_baru($where4, $page_data4, 'ruangan');

    //     //update history
    //     $page_data5 = array(
    //         'id_kamar' => $id_kamar_max,
    //     );
    //     $where5 = array(
    //         'id_history' =>  $idHis
    //     );
    //     $this->M_Rawatinap->update_history($where5, $page_data5, 'history_pelayanan_ranap');
    //     // var_dump($where);
    //     // die;
    //     $out['status'] = "success";
    //     // print_r($page_data);
    //     echo json_encode($out);
    // }
    //obat
    // public function insert_resep()
    // {
    //     $data = $this->session->userdata('data_auth');
    //     $tgl =  date("Y-m-d H:i:s");

    //     $page_data = array(
    //         'id_pelayanan' => $this->input->post('id_pelayanan'),
    //         'id_history' => $this->input->post('id_history'),
    //         'jenis_resep' => $this->input->post('jenis_resep'),
    //         'nama_resep' => $this->input->post('nama_resep'),
    //         'tanggal' => $tgl,
    //         'status' => 0,
    //         'id_staff' => $data->id_staff,
    //     );
    //     $this->M_Rawatinap->insert_tindakan($page_data, 'resep_obat');
    //     $out['status'] = "success";
    //     echo json_encode($out);
    // }
    // public function insert_resep_racikan()
    // {
    //     $data = $this->session->userdata('data_auth');
    //     $tgl =  date("Y-m-d H:i:s");

    //     $page_data = array(
    //         'id_racikan' => uniqid(),
    //         'id_resep' => $this->input->post('id_resep'),
    //         'resep' => $this->input->post('resep'),
    //         'tanggal' => $tgl,
    //         'id_staff' => $data->id_staff,
    //     );
    //     $this->M_Rawatinap->insert_tindakan($page_data, 'resep_racikan');
    //     $out['status'] = "success";
    //     echo json_encode($out);
    // }
    // public function insert_obat()
    // {
    //     $data = $this->session->userdata('data_auth');
    //     $tgl =  date("Y-m-d H:i:s");
    //     $depo = $this->input->post('depo');
    //     $id_tindakan = uniqid();
    //     $id_logistik = $this->input->post('id_list_tindakan');

    //     $page_data = array(
    //         'id_tindakan_farmasi' =>  $id_tindakan,
    //         'harga' => $this->input->post('harga'),
    //         'frek' => $this->input->post('frek'),
    //         'frek_req' => $this->input->post('frek'),
    //         'id_pelayanan' => $this->input->post('id_pelayanan'),
    //         'jenis_pelayanan' => 'RAWAT INAP',
    //         //'poli' => '-',
    //         'id_resep' => $this->input->post('id_resep'),
    //         'id_list_tindakan' => $this->input->post('id_list_tindakan'),
    //         'total' => $this->input->post('total'),
    //         'tipe' => "NON",
    //         'jumlah_racikan' => 0,
    //         'kadaluarsa' => $this->input->post('expire'),
    //         'tanggal' => $tgl,
    //         'id_staff' => $data->id_staff,
    //         'id_signa' => $this->input->post('signa'),
    //         'id_cara_pakai' => $this->input->post('cara_pakai'),
    //         'depo' => $depo,
    //         'hna' => $this->input->post('harga'),
    //         'margin' => $this->input->post('margin'),
    //         'disc' => $this->input->post('disc'),
    //         'keterangan' => $this->input->post('ket'),
    //     );

    //     if ($depo == 'APOTIK') {
    //         $obat = $this->M_Apotik->getSumObatApotik($this->input->post('id_list_tindakan'));
    //         if ($obat['stok'] < $this->input->post('frek')) {
    //             $out['status'] = "error";
    //         } else {
    //             $stok = array(
    //                 'id_stok' => uniqid(),
    //                 'id_logistik' => $this->input->post('id_list_tindakan'),
    //                 'tgl' => $tgl,
    //                 'keterangan' => "KELUAR",
    //                 'frek' => $this->input->post('jumlahKurang'),
    //                 'kadaluarsa' => $this->input->post('expire'),
    //                 'asal_tujuan' => "PENJUALAN",
    //                 'id_req' =>  $id_tindakan,
    //                 'id_staff' => $data->id_staff,
    //                 'id_resep' => $this->input->post('id_resep'),
    //             );
    //             $this->M_Poli->insert_tindakan($page_data, 'tindakan_farmasi');
    //             $this->M_Apotik->insert_tindakan($stok, 'stok_apotik');

    //             $this->M_Apotik->update_perencanaan($id_logistik, 'stok_apotik', 'pr_apotik');
    //             $out['status'] = "success";
    //         }
    //     } else if ($depo == 'IGD') {
    //         $obat = $this->M_Apotik->getSumObatIgd($this->input->post('id_list_tindakan'));
    //         if ($obat['stok'] < $this->input->post('frek')) {
    //             $out['status'] = "error";
    //         } else {
    //             $stok = array(
    //                 'id_stok' => uniqid(),
    //                 'id_logistik' => $this->input->post('id_list_tindakan'),
    //                 'tgl' => $tgl,
    //                 'keterangan' => "KELUAR",
    //                 'frek' => $this->input->post('jumlahKurang'),
    //                 'kadaluarsa' => $this->input->post('expire'),
    //                 'asal_tujuan' => "PENJUALAN",
    //                 'id_req' =>  $id_tindakan,
    //                 'id_staff' => $data->id_staff,
    //                 'id_resep' => $this->input->post('id_resep'),
    //             );
    //             $this->M_Poli->insert_tindakan($page_data, 'tindakan_farmasi');
    //             $this->M_Apotik->insert_tindakan($stok, 'stok_igd');

    //             $this->M_Apotik->update_perencanaan($id_logistik, 'stok_igd', 'pr_igd');
    //             $out['status'] = "success";
    //         }
    //     } else {
    //         $obat = $this->M_Apotik->getSumObatRanap($this->input->post('id_list_tindakan'));
    //         if ($obat['stok'] < $this->input->post('frek')) {
    //             $out['status'] = "error";
    //         } else {
    //             $stok = array(
    //                 'id_stok' => uniqid(),
    //                 'id_logistik' => $this->input->post('id_list_tindakan'),
    //                 'tgl' => $tgl,
    //                 'keterangan' => "KELUAR",
    //                 'frek' => $this->input->post('jumlahKurang'),
    //                 'kadaluarsa' => $this->input->post('expire'),
    //                 'asal_tujuan' => "PENJUALAN",
    //                 'id_req' =>  $id_tindakan,
    //                 'id_staff' => $data->id_staff,
    //                 'id_resep' => $this->input->post('id_resep'),
    //             );
    //             $this->M_Poli->insert_tindakan($page_data, 'tindakan_farmasi');
    //             $this->M_Apotik->insert_tindakan($stok, 'stok_depo');

    //             $this->M_Apotik->update_perencanaan($id_logistik, 'stok_depo', 'pr_depo');
    //             $out['status'] = "success";
    //         }
    //     }
    //     // $out['status'] = "success";
    //     // $id_pelayanan = $this->input->post('id_pelayanan');
    //     // $id_history = $this->input->post('id_history');
    //     // $count = array(
    //     //     'tindakan_farmasi' => 1,
    //     // );
    //     // $this->M_Poli->insert_req_kasir($id_pelayanan, $id_history,$count);
    //     // $out['status'] = "success";
    //     echo json_encode($out);
    // }

    public function insert_obatR()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        $tgl =  date("Y-m-d H:i:s");
        $id_pelayanan = $this->input->post('id_pelayanan');
        $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
        if ($pelayanan->status_rawat == 'selesai') {
            $out['status'] = "Pasien sudah dicheckout";
        } else {
            //$depo = $this->input->post('depo');
            $id_tindakan = uniqid();
            $id_logistik = $this->input->post('id_list_tindakan');
            $id_history = $this->input->post('id_history');
            $jenis_pelayanan = explode('_', $id_history);
            if ($jenis_pelayanan[0] == "ranap") {
                $kamar = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->id_kamar;
                $tipe = $kamar;
                $jenpel = 'RANAP';
            } else if ($jenis_pelayanan[0] == "his") {
                $tipe = "NON";
                $jenpel = 'POLI';
            } else {
                $tipe = "NON";
                $jenpel = 'IGD';
            }
            $db_list = $this->db->get_where('list_logistik', ['id_logistik' => $id_logistik])->row();

            $page_data = array(
                'id_tindakan_farmasi' =>  $id_tindakan,
                'harga_persediaan' => $db_list->harga_persediaan,
                'harga' => $this->input->post('harga'),
                'frek' => $this->input->post('frek'),
                'frek_req' => $this->input->post('frek'),
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'poli' => $this->input->post('id_history'),
                'jenis_pelayanan' => $jenpel,
                //'poli' => '-',
                'id_resep' => 'OBAT RUANG',
                'id_list_tindakan' => $this->input->post('id_list_tindakan'),
                'total' => $this->input->post('total'),
                'tipe' => $tipe,
                'jumlah_racikan' => 0,
                'kadaluarsa' => $this->input->post('expire'),
                'tanggal' => $tgl,
                'id_staff' => $data->id_staff,
                'id_signa' => $this->input->post('signa'),
                'id_cara_pakai' => $this->input->post('cara_pakai'),
                'depo' => '',
                'hna' => $this->input->post('harga'),
                'margin' => $this->input->post('margin'),
                'disc' => $this->input->post('disc'),
                'keterangan' => $this->input->post('ket'),
            );

            if ($perequest == "isolasi") {
                $stok = "stok_isolasi";
            } else if ($perequest == "icu") {
                $stok = "stok_icu";
            } else if ($perequest == "vip") {
                $stok = "stok_vip";
            } else if ($perequest == "ipcn") {
                $stok = "stok_ipcn";
            } else if ($perequest == "kebidanan") {
                $stok = "stok_kebidanan";
            } else if ($perequest == "mcu") {
                $stok = "stok_mcu";
            } else if ($perequest == "nicu") {
                $stok = "stok_nicu";
            } else if (
                $perequest == "rawatinap" || $perequest == 'poliinternis' || $perequest == 'poliobgyne' || $perequest == 'politht' || $perequest === 'polimata'
                || $perequest == 'polikulit' || $perequest == 'poliumum' || $perequest == 'polianak' || $perequest == 'poligigi' || $perequest == 'polijantung' || $perequest == 'polibedah' || $perequest == 'rehab' || $perequest == 'polihemodialisa' || $perequest == 'poliakupuntur' || $perequest == 'polibedahmulut' || $perequest == 'polikesjiwa' || $perequest == 'poliorthopedi' || $perequest == 'poliparu' || $perequest == 'polisaraf' || $perequest == 'poliurologi'
                || $perequest == 'polipenyakitmulut' || $perequest == 'poliginjal'
            ) {
                $stok = "stok_ranap";
            } else if ($perequest == "igdponek") {
                $stok = "stok_igd_ponek";
            } else if ($perequest == "gizi") {
                $stok = "stok_ranap";
            } else if ($perequest == "kemoterapi") {
                $stok = "stok_kemo";
            }

            $db_farmasi = $this->db->get_where('list_logistik', ['id_logistik' => $this->input->post('id_list_tindakan')])->row();

            $obat = $this->M_Rawatinap->getSumObat($this->input->post('id_list_tindakan'), $stok);
            if (($obat['stok'] * $db_farmasi->satuan_ok) < $this->input->post('frek')) {
                $out['status'] = "Stok tidak mencukupi";
            } else {
                $ruangan = $this->db->get_where('ruangan', ['id_ruangan' => $tipe])->row();
                if ($stok == 'stok_ranap') {
                    $datastok = array(
                        'id_stok' => uniqid(),
                        'id_logistik' => $this->input->post('id_list_tindakan'),
                        'tgl' => $tgl,
                        'keterangan' => "KELUAR",
                        'frek' => ($this->input->post('jumlahKurang') / $db_farmasi->satuan_ok),
                        'kadaluarsa' => $this->input->post('expire'),
                        'asal_tujuan' => "PENJUALAN",
                        'id_req' =>  $id_tindakan,
                        'id_staff' => $data->id_staff,
                        'id_resep' => ($data->ruangan != '') ? $data->ruangan : $ruangan->nama_ruangan,
                    );
                } else {
                    $datastok = array(
                        'id_stok' => uniqid(),
                        'id_logistik' => $this->input->post('id_list_tindakan'),
                        'tgl' => $tgl,
                        'keterangan' => "KELUAR",
                        'frek' => ($this->input->post('jumlahKurang') / $db_farmasi->satuan_ok),
                        'kadaluarsa' => $this->input->post('expire'),
                        'asal_tujuan' => "PENJUALAN",
                        'id_req' =>  $id_tindakan,
                        'id_staff' => $data->id_staff,
                    );
                }
                $this->M_Poli->insert_tindakan($page_data, 'tindakan_farmasi');
                $this->M_Apotik->insert_tindakan($datastok, $stok);

                $this->M_Apotik->update_perencanaan($id_logistik, $stok, 'pr_igd');
                $out['status'] = "success";
            }
        }
        echo json_encode($out);
    }
    function hapus_resep()
    {
        $id_resep = $this->input->post('id_resep');

        $this->M_Rawatinap->delete_resep($id_resep);
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_racikan()
    {
        $id_racikan = $this->input->post('id_racikan');

        $this->M_Rawatinap->delete_racikan($id_racikan);
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_obat()
    {
        $id_tindakan = $this->input->post('id');
        $depo = $this->input->post('depo');

        $this->M_Rawatinap->delete_obat($id_tindakan, $depo);
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_resep()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $page_data = $this->M_Rawatinap->selectResepById($id_pelayanan, $id_history);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_resep . "\",\"" . $page_data[$i]->cara_bayar . "\")' '><i class='fa fa-rocket '></i></button>";
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_resep(\"" . $page_data[$i]->id_resep .  "\")' '><i class='fa fa-trash '></i></button>";
            if ($page_data[$i]->status == 0) {
                $request =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='request(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->nama_resep . "\")' '><i class='fa fa-thumbs-up '></i></button>";
            } elseif ($page_data[$i]->status == 1) {
                $request = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
            } else {
                $request = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
            }

            $no = $i + 1;
            $nama_resep = $page_data[$i]->nama_resep;
            $jenis_resep = $page_data[$i]->jenis_resep;
            if ($jenis_resep == 1) {
                $jenis_resep = 'Non Racikan';
            } else if ($jenis_resep == 2) {
                $jenis_resep = 'Racikan';
            } else {
                $jenis_resep = 'OTT';
            }

            $out[$i] = array($no, $request, $tombol, $hapus, $nama_resep, $jenis_resep);
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
    public function request_resep()
    {
        $id_resep = $this->input->post('id_resep');
        $data = array(
            'status' => 1,
        );
        $this->M_Rawatinap->request_resep($id_resep, $data);

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_racikan()
    {
        $id_resep = $this->input->post('id_resep');
        $page_data = $this->M_Rawatinap->selectRacikanByResep($id_resep);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 

            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_racikan(\"" . $page_data[$i]->id_racikan .  "\")' '><i class='fa fa-trash '></i></button>";

            $no = $i + 1;
            $resep = $page_data[$i]->resep;

            $out[$i] = array($no, $resep, $hapus);
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
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Rawatinap->selectObatById($id_pelayanan);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 

            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat1(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->nama .  "\")' '><i class='fa fa-trash '></i></button>";

            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $tanggal = $page_data[$i]->tanggal;
            $time = strtotime($page_data[$i]->kadaluarsa);
            $kadaluarsa = strftime("%A, %d %B %Y ", $time);
            $harga_obat = "Rp " . number_format($page_data[$i]->total / $page_data[$i]->frek, 0, ',', '.');
            $jumlah_obat = $page_data[$i]->frek;

            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $staff = $page_data[$i]->staff;


            $out[$i] = array($no, $nama_obat, $kadaluarsa, $harga_obat, $jumlah_obat, $total, $tanggal, $staff, $hapus);
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
    public function tampil_list_total_obat()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Rawatinap->getTotalObat($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $id_tindakan_igd  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $out[$i] = array($id_tindakan_igd);
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
    public function print_resep($id_pelayanan, $id_history)
    {
        $data['resep'] = $this->M_Rawatinap->getResepById($id_pelayanan);
        $data['pasien'] = $this->M_Rawatinap->getDataByIdResep($id_pelayanan, $id_history);
        $this->load->view('print/cetak_resep', $data);
    }
    public function getNamaObat()
    {
        $depo = $this->input->post('depo');
        $data = $this->M_Rawatinap->getNamaObatByDepo($depo);

        echo json_encode($data);
    }

    public function getExp()
    {
        $obat = $this->input->post('obat');
        $depo = $this->input->post('depo');
        if ($depo == 'APOTIK') {
            $data = $this->M_Rawatinap->getExpByObatApotik($obat);
        } else {
            $data = $this->M_Rawatinap->getExpByObatIGD($obat);
        }

        echo json_encode($data);
    }
    public function insertAntrian()
    {
        $tgl =  date("Y-m-d H:i:s");
        $data = $this->session->userdata('data_auth');
        $jenis = $data->tipe;
        $id_pelayanan = $this->input->post('id_pelayanan');
        $out = null;
        $id_antrian = uniqid();
        $i = 0;
        $no_antri = $this->M_Rawatinap->getAntrian();
        if (count($no_antri) > 0) {
            $page_data = array(
                'inisial' => 't',
                'no_antri' =>    $no_antri[$i]->no_antri + 1,
                'jenis' => $jenis,
                'id_pelayanan' => $id_pelayanan,
                'tanggal' => $tgl,
                'status' => 0,
            );
            $this->M_Rawatinap->insert_tindakan($page_data, 'antrian_farmasi');
        } else {
            $page_data = array(
                'inisial' => 't',
                'no_antri' => 1,
                'jenis' => $jenis,
                'id_pelayanan' => $id_pelayanan,
                'tanggal' => $tgl,
                'status' => 0,
            );
            $this->M_Rawatinap->insert_tindakan($page_data, 'antrian_farmasi');
        }
    }
    public function print_antrian_apotik()
    {
        $data_staff = $this->session->userdata('data_auth');
        $jenis = $data_staff->tipe;
        $data['nama'] = "RAWAT INAP";

        $i = 0;
        $antrian = $this->M_Rawatinap->getAntrian();
        $data['inisial'] = 't';
        $data['no_antri'] = $antrian[$i]->no_antri;

        $this->load->view('print/cetak_antrian_apotik', $data);
    }
    public function Erm()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Erm_ranap';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_erm()
    {
        date_default_timezone_set('Asia/Jakarta');
        $page_data = $this->M_Rawatinap->selectDataPasienIGD();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');

            $tindakan = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('Rawatinap/print_resume_medis/') . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "'><i class='icon-printer'></i></a>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $no = $i + 1;
            $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            // $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            // $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $tgl_masuk, $jam_masuk, $no_rm, $nama,  $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $cara_bayar);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $print['data'] = $out;
            echo json_encode($print);
            exit;
        }
    }
    public function tampil_erm_range()
    {
        date_default_timezone_set('Asia/Jakarta');
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $page_data = $this->M_Rawatinap->selectDataPasienIGDRange($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');

            $tindakan = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('Rawatinap/print_resume_medis/') . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "'><i class='icon-printer'></i></a>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $no = $i + 1;
            $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            // $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            // $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $tgl_masuk, $jam_masuk, $no_rm, $nama,  $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $cara_bayar);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $print['data'] = $out;
            echo json_encode($print);
            exit;
        }
    }
    public function print_resume_medis($id, $id_history)
    {
        $staff = $this->session->userdata('data_auth');
        $data['data'] = $this->M_Erm->cetakResumeMed($id);
        $data['terapi'] = $this->M_Casemix->selectTerapiByIdPel($id);
        $data['penunjang'] = $this->M_Casemix->cetakPenunjang($id);

        $data['labor1'] = $this->db->query("SELECT * FROM form_labor where id_pelayanan= '$id' and file != ''")->result_array();
        $data['radio1'] = $this->db->query("SELECT * FROM tindakan_radiologi where id_pelayanan= '$id' and keterangan != ''")->result_array();

        $this->load->view('assets/_header');
        $data['page_content'] = 'erm_edit/view_anamnesis_ranap';
        $this->load->view('Main', $data);
        $this->load->view('assets/_footer');
    }
    public function get_ass_dok()
    {
        $id = $this->input->post('id');
        $db = $this->db->get_where('form_ass_dokter_igd', ['id_history' => $id])->row_array();
        if ($db == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data = $db;
            echo json_encode($page_data);
            exit;
        }
    }
    public function print_anamnesis($id)
    {
        $data['data'] = $this->M_Erm->cetakResumeMed($id);
        $data['terapi'] = $this->M_Casemix->selectTerapiByIdPel($id);
        $data['penunjang'] = $this->M_Casemix->cetakPenunjang($id);

        $data['labor1'] = $this->db->query("SELECT * FROM form_labor where id_pelayanan= '$id' and file != ''")->result_array();
        $data['radio1'] = $this->db->query("SELECT * FROM tindakan_radiologi where id_pelayanan= '$id' and keterangan != ''")->result_array();
        $this->load->view('erm_print/anamnesis_ranap', $data);
    }
    public function erm_igd()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_erm_igd_ranap';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_igd()
    {

        if ($this->input->post('tipe') == 'range') {
            $page_data = $this->M_Rawatinap->selectRiwayatIGDRange($this->input->post('mulai'), $this->input->post('akhir'));
        } else {
            $page_data = $this->M_Rawatinap->selectRiwayatIGD();
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('erm_igd/form_riwayat/' . $page_data[$i]->id_pelayanan . '/' . $page_data[$i]->id_history) . "><i class='icon-note'></i></a>";
            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $no = $i + 1;
            $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $erm, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $cara_bayar, $diagnosa, $dokter);
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
    function hapus_obat1()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        $id_tindakan = $this->input->post('id');
        $depo = $this->input->post('depo');

        if ($perequest == "isolasi") {
            $stok = "stok_isolasi";
        } else if ($perequest == "icu") {
            $stok = "stok_icu";
        } else if ($perequest == "vip") {
            $stok = "stok_vip";
        } else if ($perequest == "ipcn") {
            $stok = "stok_ipcn";
        } else if ($perequest == "kebidanan") {
            $stok = "stok_kebidanan";
        } else if ($perequest == "mcu") {
            $stok = "stok_mcu";
        } else if ($perequest == "nicu") {
            $stok = "stok_nicu";
        } else if (
            $perequest == "rawatinap" || $perequest == 'poliinternis' || $perequest == 'poliobgyne' || $perequest == 'politht' || $perequest === 'polimata' || $perequest == 'polikulit' || $perequest == 'poliumum' || $perequest == 'polianak' || $perequest == 'poligigi' || $perequest == 'polijantung'
            || $perequest == 'polibedah' || $perequest == 'rehab' || $perequest == 'polihemodialisa' || $perequest == 'poliakupuntur' || $perequest == 'polibedahmulut' || $perequest == 'polikesjiwa' || $perequest == 'poliorthopedi' || $perequest == 'poliparu' || $perequest == 'polisaraf'
            || $perequest == 'poliurologi' || $perequest == 'polipenyakitmulut' || $perequest == 'poliginjal'
        ) {
            $stok = "stok_ranap";
        } else if ($perequest == "igdponek") {
            $stok = "stok_igd_ponek";
        } else if ($perequest == "gizi") {
            $stok = "stok_ranap";
        } else if ($perequest == "kemoterapi") {
            $stok = "stok_kemo";
        }

        $this->db->delete('tindakan_farmasi', ['id_tindakan_farmasi' => $id_tindakan]);
        $this->db->delete($stok, ['id_req' => $id_tindakan]);
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function getListTransport()
    {
        $data = $this->db->get_where('list_tindakan_apelkes', ['tipe_kamar' => 'TRANSPORTASI'])->result();

        echo json_encode($data);
    }
    public function getTindakanByTipeKamarFisio() // Fisio
    {
        $tipe_kamar = $this->input->post('tipe_kamar');
        $data = $this->M_Rawatinap->getTipeKamarFisio($tipe_kamar);
        echo json_encode($data);
    }

    public function getTindakanByTipeKamarHD() // Fisio
    {
        $tipe_kamar = $this->input->post('tipe_kamar');
        $data = $this->M_Rawatinap->getTipeKamarHD($tipe_kamar);
        echo json_encode($data);
    }

    public function pasien_gizi() // Gizi
    {
        $this->load->view('assets/_header');

        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Pasien_gizi';
        $page_data['data_kamar'] = $this->M_Rawatinap->selectKamar();
        $page_data['action'] = site_url("Pasien/edit_rawat_jalan");
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function riwayat_pasien_gizi() // Gizi
    {
        $this->load->view('assets/_header');

        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Riwayat_pasien_gizi';
        $page_data['data_kamar'] = $this->M_Rawatinap->selectKamar();
        $page_data['action'] = site_url("Pasien/edit_rawat_jalan");
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_gizi() // Gizi
    {
        $page_data = $this->M_Rawatinap->selectDataPasienGizi();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {


            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $no = $i + 1;
            $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;


            $antrian = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='data_gizi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";


            $diagnosa = $page_data[$i]->diagnosa;
            $keterangan = $page_data[$i]->keterangan;
            $dokter = $page_data[$i]->nama_dokter;
            $staff = $this->session->userdata('data_auth');
            $out[$i] = array($no, $antrian, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang,  $cara_bayar, $diagnosa, $keterangan, $dokter);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }
    public function tampil_data_riwayat_gizi() // Gizi
    {
        $page_data = $this->M_Rawatinap->selectRiwayatDataPasienGizi();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {


            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $no = $i + 1;
            $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;


            $antrian = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='data_gizi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";


            $diagnosa = $page_data[$i]->diagnosa;
            $keterangan = $page_data[$i]->keterangan;
            $dokter = $page_data[$i]->nama_dokter;
            $staff = $this->session->userdata('data_auth');
            $out[$i] = array($no, $antrian, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang,  $cara_bayar, $diagnosa, $keterangan, $dokter);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }

    public function formgizi($id_pelayanan, $id_history)
    {
        // $selectPasien = $this->M_Rawatinap->selectDataGiziby_id($id_pelayanan, $id_history);
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        // $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
        $staff = $this->session->userdata('data_auth');

        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['nama'] = $selectPasien->nama;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['dpjp'] = $selectPasien->nama_dokter;
        $page_data['cara_bayar'] = $selectPasien->cara_bayar;
        $page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
        $page_data['tgl_masuk'] = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->tgl_masuk;
        $page_data['staff'] = $staff->id_staff;
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_history;
        $page_data['agama'] = $selectPasien->agama;
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap/view_asses_perawat_ranap';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    // public function tampil_pasien_gizi()
    // {
    //     $out = null;
    //     $tgl = date("Y-m-d");
    //     $first_date = $this->input->post('mulai');
    //     $second_date = $this->input->post('akhir');
    //     if ($first_date != '' || $second_date != '') {
    //         $page_data = $this->M_Laporan->selectRangeLaporanPasienIgdRanap($first_date, $second_date);
    //     } else {
    //         $page_data = $this->M_Laporan->selectLaporanPasienIgdRanap();
    //     }


    //     for ($i = 0; $i < count($page_data); $i++) {
    //         $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);

    //         $no = $i + 1;
    //         $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
    //         $pasien = $page_data[$i]->pasien;
    //         $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);
    //         $klaim = $page_data[$i]->klaim;
    //         $dokter = $page_data[$i]->dokter;

    //         $out[$i] = array($no,  $no_rm, $pasien, $tgl_masuk, $klaim,  $dokter);
    //     }
    //     if ($out == null) {
    //         echo '{"data":""}';
    //         exit;
    //     } else {
    //         $page_data['data'] = $out;
    //         echo json_encode($page_data);
    //         exit;
    //     }
    // }

    public function insert_gizi()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");

        $insertData = array(
            'id_pelayanan' => $this->input->post('id_pelayanan'),
            'diet' => $this->input->post('diet'),
            'waktu' => $this->input->post('waktu'),
            'tgl_input' => date("Y-m-d H:i:s"),
            'id_staff' => $data->id_staff,
        );
        $this->M_Rawatinap->insert_tindakan($insertData, 'pasien_gizi');
        $out['status'] = "success";
        // $page_data[] = null;
        echo json_encode($out);


        // $id = $insertData['id_pelayanan'];
        // $page_data = $this->db->query("SELECT ps.nama pasien, ps.no_rm,r.tipe kamar, p.diet , p.keterangan, date(ps.tgl_lahir) tgl_lahir
        // FROM pasien_gizi p, pelayanan pl, pasien ps, history_pelayanan_ranap h, ruangan r
        // WHERE p.id_pelayanan=pl.id_pelayanan and h.id_pelayanan=pl.id_pelayanan and h.id_kamar=r.id_ruangan and ps.no_rm=pl.id_pasien and pl.id_pelayanan = '$id'
        // GROUP by p.id_pelayanan")->row();
        // $response = $this->load->view('print/cetak_gizi', $page_data,TRUE);
        // echo $response;
    }

    public function tampil_data_diet() // Data Diet
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Rawatinap->selectDataDietGizi($id_pelayanan);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {


            // $tgl = strtotime($page_data[$i]->tgl_lahir);
            // $date3 = strftime("%A, %d %B %Y ", $tgl);

            $time = strtotime($page_data[$i]->tgl_input);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            // $birthDate = $page_data[$i]->tgl_lahir;
            // $date = new DateTime($birthDate);
            // $now = new DateTime();
            // $interval = $now->diff($date);
            // $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $no = $i + 1;
            $diet = $page_data[$i]->diet;
            $waktu = $page_data[$i]->waktu;
            $staff = $page_data[$i]->nama;

            $antrian = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_form . "\")'><i class='icon-pencil'></i></a>";
            $cetak = "<a class='btn btn-primary btn-icon-anim btn-square'href='" . base_url('Rawatinap/print_diet/') . $page_data[$i]->id_form . "' ><i class='icon-printer'></i></a>";
            $delete = "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diet(\"" . $page_data[$i]->id_form . "\")' '><i class='icon-trash'></i></a>";



            // $staff = $this->session->userdata('data_auth');
            $out[$i] = array($no, $cetak, $antrian, $delete, $diet, $waktu, $date2, $staff);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }

    public function tampil_data_riwayat() // Data Diet
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Rawatinap->selectDataDietGizi($id_pelayanan);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {


            // $tgl = strtotime($page_data[$i]->tgl_lahir);
            // $date3 = strftime("%A, %d %B %Y ", $tgl);

            $time = strtotime($page_data[$i]->tgl_input);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            // $birthDate = $page_data[$i]->tgl_lahir;
            // $date = new DateTime($birthDate);
            // $now = new DateTime();
            // $interval = $now->diff($date);
            // $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $no = $i + 1;
            $diet = $page_data[$i]->diet;
            $waktu = $page_data[$i]->waktu;
            $staff = $page_data[$i]->nama;

            $antrian = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_form . "\")'><i class='icon-pencil'></i></a>";
            $cetak = "<a class='btn btn-primary btn-icon-anim btn-square'href='" . base_url('Rawatinap/print_diet/') . $page_data[$i]->id_form . "' ><i class='icon-printer'></i></a>";
            $delete = "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diet(\"" . $page_data[$i]->id_form . "\")' style='display: none;'><i class='icon-trash'></i></a>";



            // $staff = $this->session->userdata('data_auth');
            $out[$i] = array($no, $cetak, $antrian, $delete, $diet, $waktu, $date2, $staff);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }

    public function print_diet($id_form)

    {

        $page_data = $this->db->query("SELECT ps.nama pasien, ps.no_rm,r.tipe kamar, p.diet , p.waktu, date(ps.tgl_lahir) tgl_lahir
        FROM pasien_gizi p, pelayanan pl, pasien ps, history_pelayanan_ranap h, ruangan r
        WHERE p.id_pelayanan=pl.id_pelayanan and h.id_pelayanan=pl.id_pelayanan and h.id_kamar=r.id_ruangan and ps.no_rm=pl.id_pasien and p.id_form = '$id_form'")->row();
        // $page_data['datagizi'] = $this->M_Rawatinap->getDataGizi($id_form);

        $this->load->view('print/cetak_gizi', $page_data);
    }

    // public function getData_gizi()
    // {
    //     $id_form = $this->input->post('id_form');
    //     $db = $this->M_Rawatinap->getDataGizi($id_form);
    //     if (count($db) > 0) {
    //         $db = $db[0];
    //         $db->status_dt = 'found';
    //     } else {
    //         $db = null;
    //         $db['status_dt'] = 'not found';
    //     }
    //     echo json_encode($db);
    //     exit;
    // }
    public function getData_gizi()
    {
        $id_form = $this->input->post('id_form');
        $db = $this->M_Rawatinap->getDataGizi($id_form);
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

    public function getData_riwayat()
    {
        $id_form = $this->input->post('id_history');
        $db = $this->M_Rawatinap->getRiwayat($id_form);
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


    public function update_gizi()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        $id_form = $this->input->post('id_form');

        $editData = array(
            'diet' => $this->input->post('diet'),
            'waktu' => $this->input->post('waktu'),
        );
        $where = array(
            'id_form' => $id_form
        );
        $this->M_Rawatinap->update_gizi($where, $editData, 'pasien_gizi');
        $out['status'] = "success";
        // $page_data[] = null;
        echo json_encode($out);
    }

    public function hapus_data_diett()
    {
        $id_form = $this->input->post('id_form');
        $this->M_Rawatinap->delete_gizi($id_form);
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function perawat_inap() // Ranap
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Perawat_inap';
        $page_data['dataPerawat'] = $this->M_Rawatinap->selectDataPerawatRanap();
        $page_data['dataRuangan'] = $this->M_Rawatinap->selectRuangan();
        // var_dump( $page_data['dataPerawat']);
        $page_data['action'] = site_url("Pasien/edit_rawat_jalan");
        $page_data['obat'] = $this->M_Rawatinap->getNamaObat();
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $page_data['tindakan_radiologi'] = $this->M_Rawatinap->selectNamaRadiologi();
        $page_data['tindakan_labor'] = $this->M_Rawatinap->selectNamaLabor();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_perawat() // Ranap
    {
        $page_data = $this->M_Rawatinap->selectDataPerawatRanap();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $ruangan = $page_data[$i]->ruangan;

            $edit = "<button class='btn btn-success btn-icon-anim btn-square'  data-toggle='modal' onclick='edit_data_kunjungan(\"" . $page_data[$i]->id_staff . "\")'><i class='icon-note'></i></button>";


            $out[$i] = array($no, $edit, $nama, $tipe, $ruangan);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }

    public function getdata_Perawat()
    {
        $id_staff = $this->input->post('id_staff');
        $db = $this->M_Rawatinap->getDataPerawat($id_staff);
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

    public function edit_ruangan()
    {
        $id_staff = $this->input->post('id_staff');
        $data = array(
            'ruangan' => $this->input->post('ruangan'),
        );
        $where = array(
            'id_staff' =>  $id_staff
        );

        $this->M_Rawatinap->update_history($where, $data, 'staff');
        $out['status'] = 'success';
        echo json_encode($out);
    }

    public function kembalikankeruangan()
    {
        $id_history = $this->input->post('id_history');

        $data = [
            'tgl_keluar' => NULL,
        ];
        $this->db->where('id_history', $id_history);
        $this->db->update('history_pelayanan_ranap', $data);


        $out['status'] = "success";
        echo json_encode($out);
    }
}
