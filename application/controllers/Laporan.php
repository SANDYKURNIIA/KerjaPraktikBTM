<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Laporan');
        $this->load->model('M_Kasir');
        $this->load->model('M_IGD');
    }

    public function index()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_rajal';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function kunjungan()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function pt() //ranap
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_penyakit_tertinggi';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function pt_poli()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_penyakit_tertinggi_poli';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function pt_igd()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_penyakit_tertinggi_igd';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function bor()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_bor';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function bor_new()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_bor_new';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function lap_kunjungan()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_lap_kunjungan()
    {

        $out = null;
        $tgl = date("Y");


        if ($this->input->post('tahun')) {
            $tahun = $this->input->post('tahun');

            if ($tahun != '') {
                $page_data = $this->M_Laporan->selectData_lap_kunjungan($tahun);
            } else if ($tahun = '') {
                $page_data = $this->M_Laporan->selectData_lap_kunjungan($tgl);
            }
        } else {
            $page_data = $this->M_Laporan->selectData_lap_kunjungan($tgl);
        }

        for ($i = 0; $i < count($page_data); $i++) {

            $bln = $page_data[$i]->bulan;



            $thn = $page_data[$i]->thn;
            $bulan = bulan($bln);
            $ruangan = $page_data[$i]->ruangan;
            $nama_kelas = $page_data[$i]->nama_kelas;
            $hp = $page_data[$i]->hp;
            $lamarawat = $page_data[$i]->lamarawat;
            $periode = $page_data[$i]->periode;
            $tt = $page_data[$i]->tt;
            // $o =  $page_data[$i]->hp / $periode;

            // $oo = number_format($o, 2, ',', '.');
            // $lebih =  '-';
            // $kurang =  '-';

            $pasienkeluar = $page_data[$i]->pasienkeluar;
            $kurang48 = $page_data[$i]->Kurang48Jam;
            $lebih48 = $page_data[$i]->Lebih48Jam;
            $hplusm = $page_data[$i]->HPlusM;
            $avloss = $page_data[$i]->avlos;
            $br = $page_data[$i]->bor;

            // $avlos = ($o * $periode) /  $jlh_hidup;
            // $avloss = number_format($avlos, 2, ',', '.');
            if ($avloss < 3) {
                $los =  "<span class='badge  badge-warning' style='background-color: red'>$avloss</span>";
            } else if ($avloss >= 3 && $avloss <=  12) {
                $los =  "<span class='badge  badge-warning' style='background-color: green'>$avloss</span>";
            } else if ($avloss > 12) {
                $los =  "<span class='badge  badge-warning' style='background-color: blue'>$avloss</span>";
            } else {
                $los =  $avloss;
            }


            // $br =  ($o * 100) / $page_data[$i]->jlh_kamar;
            // $bor = number_format($br, 2, ',', '.');


            if ($br < 75) {
                $bor =  "<span class='badge  badge-warning' style='background-color: red'>$br</span>";
            } else if ($br > 74 && $br <  86) {
                $bor =  "<span class='badge  badge-warning' style='background-color: green'>$br</span>";
            } else if ($br > 84) {
                $bor =  "<span class='badge  badge-warning' style='background-color: blue'>$br</span>";
            } else {
                $bor =  $br;
            }
            // return $hasilbor;

            // var_dump($hasilbor);
            // die;
            $toii = $page_data[$i]->toi;
            // $toi = ($jlh_kamar - $o) * $periode /  $jlh_hidup;
            // $toii = number_format($toi, 2, ',', '.');
            if ($toii < 1) {
                $toi =  "<span class='badge  badge-warning' style='background-color: red'>$toii</span>";
            } else if ($br >= 1 && $br <=  3) {
                $toi =  "<span class='badge  badge-warning' style='background-color: green'>$toii</span>";
            } else if ($br > 3) {
                $toi =  "<span class='badge  badge-warning' style='background-color: blue'>$toii</span>";
            } else {
                $toi =  $toii;
            }

            $btoo = $page_data[$i]->bto; 

            // $bto = $jlh_hidup / $jlh_kamar;
            // $btoo = number_format($bto, 2, ',', '.');

            if ($btoo  <  30) {
                $bto =  "<span class='badge  badge-warning' style='background-color: red'>$btoo</span>";
            } else if ($btoo >= 30) {
                $bto =  "<span class='badge  badge-warning' style='background-color: blue'>$btoo</span>";
            } else {
                $bto =  $btoo;
            }
            $ndr = $page_data[$i]->ndr;
            $gdr = $page_data[$i]->gdr;


            $out[$i] = array(
                $thn, $bulan, $nama_kelas, $ruangan, $hp, $lamarawat, $pasienkeluar, $kurang48, $lebih48,  $hplusm,  $periode, $tt, $bor, $los, $toi, $bto, $ndr, $gdr
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

    //Select

    public function tampil_data_pasien_rajal()
    {
        $tgl = date("Y-m-d");
        $out = null;

        if ($this->input->post('tanggal_masuk') && $this->input->post('tanggal_keluar') && $this->input->post('jenis_pelayanan')) {
            $first_date = $this->input->post('tanggal_masuk');
            $second_date = $this->input->post('tanggal_keluar');
            $jenis_pelayanan = $this->input->post('jenis_pelayanan');

            if ($first_date != '' || $second_date != '') {
                $page_data = $this->M_Laporan->selectDataPasienRajal($first_date, $second_date, $jenis_pelayanan);
            } else if ($first_date = '' || $second_date = '') {
                $page_data = $this->M_Laporan->selectDataPasienRajal($tgl, $tgl, '');
            }
        } else {
            $page_data = $this->M_Laporan->selectDataPasienRajal($tgl, $tgl, '');
        }

        for ($i = 0; $i < count($page_data); $i++) {

            $tgl_masuk = strtotime($page_data[$i]->tgl_masuk);
            $tgl_keluar = strtotime($page_data[$i]->tgl_keluar);

            $tglkeluar = $page_data[$i]->tgl_masuk;
            $tglmasuk = $page_data[$i]->tgl_keluar;
            $datek = new DateTime($tglkeluar);
            $datem = new DateTime($tglmasuk);
            if ($tglkeluar == "") {

                $datek = new DateTime();
            }
            $interval = $datek->diff($datem);
            $drs = $interval->d  . " Hari";
            $nol = "1 Hari";

            $tgl_lahir = strtotime($page_data[$i]->tgl_lahir);

            $birthDate = $page_data[$i]->tgl_lahir;

            $no = $i + 1;
            $tgl_masuk =  strftime("%A, %d %B %Y ", $tgl_masuk);
            $tgl_keluar =  strftime("%A, %d %B %Y ", $tgl_keluar);
            if ($drs > 0) {
                $durasi = $drs;
            } else {
                $durasi = $nol;
            }

            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = strftime(" %d %B %Y ", $tgl_lahir);
            $usia =  counting_age1($birthDate);
            $hasil =  counting_age2($birthDate);
            $alamat = $page_data[$i]->alamat;
            $kecamatan = $page_data[$i]->kecamatan;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $nama_dokter = $page_data[$i]->nama_dokter;
            $asal = $page_data[$i]->asal;
            $no_hp = $page_data[$i]->no_hp;
            $no_sep = $page_data[$i]->no_sep;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $kode_diagnosa = $page_data[$i]->kode_diagnosa;
            $diagnosa = $page_data[$i]->diagnosa;
            $kode = $page_data[$i]->id_pelayanan;
            $status_rawat = strtoupper($page_data[$i]->status_rawat);

            // $diagnosa = json_encode($this->M_Laporan->cek_id($page_data[$i]->id_pelayanan));

            $out[$i] = array($no, $tgl_masuk, $tgl_keluar, $durasi, $no_rm, $nama,  $jenis_kelamin, $tgl_lahir, $usia, $hasil, $alamat, $kecamatan,  $jenis_pelayanan, $poli,  $nama_dokter, $no_hp,  $asal, $no_sep, $cara_bayar, $kode_diagnosa, $diagnosa, $status_rawat);
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

    //Kunjungan IGD Umum
    public function tampil_data_pasien_kunjungan()
    {
        $out = null;
        $tgl = date("Y-m-d");

        if ($this->input->post('tanggal_masuk') && $this->input->post('tanggal_keluar') && $this->input->post('jenis_pelayanan')) {
            $first_date = $this->input->post('tanggal_masuk');
            $second_date = $this->input->post('tanggal_keluar');
            $jenis_pelayanan = $this->input->post('jenis_pelayanan');
            if ($first_date != '' || $second_date != '') {
                $page_data = $this->M_Laporan->selectDataPasienKunjungan($first_date, $second_date, $jenis_pelayanan);
            } else if ($first_date = '' || $second_date = '') {
                $page_data = $this->M_Laporan->selectDataPasienKunjungan($tgl, $tgl, '');
            }
        } else {
            $page_data = $this->M_Laporan->selectDataPasienKunjungan($tgl, $tgl, '');
        }


        for ($i = 0; $i < count($page_data); $i++) {

            $cek = $this->M_Laporan->selectDataPasienKunjunganById($page_data[$i]->id_pelayanan);
            if (count($cek) > 0) {
                $ket = '<span class="label label-warning">Masuk Rawat Inap</span>';
            } else {
                $ket = '';
            }

            $tindakan = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('Erm_igd_edit/print_resume_medis/') . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "'><i class='icon-printer'></i></a>";
            $tgl_masuk = strtotime($page_data[$i]->tgl_masuk);
            $tgl_keluar = strtotime($page_data[$i]->tgl_keluar);

            $no = $i + 1;
            $nama = $page_data[$i]->nama_pasien;
            $no_rm =  "" . $page_data[$i]->no_rm;
            $alamat = $page_data[$i]->alamat;
            $no_hp = $page_data[$i]->no_hp;
            $kamar = $page_data[$i]->kamar;
            // $triase = $page_data[$i]->triase;
            $cara_bayar = $page_data[$i]->bayar;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $diagnosa = $page_data[$i]->diagnosa;
            $kode = $page_data[$i]->kode;
            $poli = $page_data[$i]->nama_dokter;
            $no_ktp = $page_data[$i]->no_ktp;
            $tgl_masuk =  strftime("%A, %d %B %Y ", $tgl_masuk);
            $status_rawat = strtoupper($page_data[$i]->status_rawat);
            $tgl_lahir = strtotime($page_data[$i]->tgl_lahir);

            // $birthDate = $page_data[$i]->tgl_lahir;
            $tgl_lahir = strftime(" %d %B %Y ", $tgl_lahir);

            if ($page_data[$i]->tgl_keluar == null) {
                $tgl_keluar = "-";
            } else {
                $tgl_keluar =  strftime("%A, %d %B %Y ", $tgl_keluar);
            }

            $staff = $this->session->userdata('data_auth');
            if ($staff->tipe == 'igd') {
                if ($page_data[$i]->triase == 'Merah') {
                    $triase = '<span class="label label-danger">Merah</span>';
                } else if ($page_data[$i]->triase == 'Kuning') {
                    $triase = '<span class="label label-warning">Kuning</span>';
                } else if ($page_data[$i]->triase == 'Hijau') {
                    $triase = '<span class="label label-success">Hijau</span>';
                } else if ($page_data[$i]->triase == '' || $page_data[$i]->triase == '-') {
                    $triase = '-';
                } else {
                    $triase = '<span class="badge badge-dark">Hitam</span>';
                }
                $out[$i] = array($no, $nama, $no_rm,  $tgl_lahir, $alamat, $no_hp, $kode, $diagnosa,  $cara_bayar,  $jenis_pelayanan, $kamar,  $poli, $triase, $tgl_masuk,   $status_rawat, $tgl_keluar, $ket);
            } else {
                $out[$i] = array($no, $nama, $no_rm, $tgl_lahir,  $alamat, $no_hp, $no_ktp, $kode, $diagnosa,  $cara_bayar,  $jenis_pelayanan, $kamar,  $poli,  '-', $tgl_masuk, $status_rawat,  $tgl_keluar, $ket);
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

    //Kunjungan IGD Ponek
    public function Laporan_igd_ponek()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_igd_ponek';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_pasien_igd_ponek()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        if ($mulai != '' || $akhir != '') {
            $page_data = $this->M_Laporan->selectDataKunjunganRangeIgdPonek($mulai, $akhir);
        } else {
            $page_data = $this->M_Laporan->selectDataKunjunganIgdPonek();
        }

        for ($i = 0; $i < count($page_data); $i++) {


            $cek = $this->M_Laporan->selectDataPasienKunjunganById($page_data[$i]->id_pelayanan);
            if (count($cek) > 0) {
                $ket = '<span class="label label-warning">Masuk Rawat Inap</span>';
            } else {
                $ket = '';
            }

            if ($page_data[$i]->triase == 'Merah') {
                $triase = '<span class="label label-danger">Merah</span>';
            } else if ($page_data[$i]->triase == 'Kuning') {
                $triase = '<span class="label label-warning">Kuning</span>';
            } else {
                $triase = '<span class="label label-success">Hijau</span>';
            }

            $tindakan = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('Erm_igd_edit/print_resume_medis/') . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "'><i class='icon-printer'></i></a>";
            $tgl_masuk = strtotime($page_data[$i]->tgl_masuk);
            $tgl_keluar = strtotime($page_data[$i]->tgl_keluar);

            $no = $i + 1;
            $nama = $page_data[$i]->nama_pasien;
            $no_rm =  "" . $page_data[$i]->no_rm;
            $alamat = $page_data[$i]->alamat;
            $no_hp = $page_data[$i]->no_hp;
            // $triase = $page_data[$i]->triase;
            $cara_bayar = $page_data[$i]->bayar;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->nama_dokter;
            $tgl_masuk =  strftime("%A, %d %B %Y ", $tgl_masuk);
            $status_rawat = strtoupper($page_data[$i]->status_rawat);

            if ($page_data[$i]->tgl_keluar == null) {
                $tgl_keluar = "-";
            } else {
                $tgl_keluar =  strftime("%A, %d %B %Y ", $tgl_keluar);
            }


            $out[$i] = array($no, $nama, $no_rm,  $alamat, $no_hp,  $cara_bayar,  $jenis_pelayanan,  $poli, $triase, $tgl_masuk,  $tgl_keluar, $ket,  $status_rawat);
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
    public function tampil_data_pasien_pt()
    {

        $out = null;
        $tgl = date("Y-m-d");

        if ($this->input->post('tanggal_masuk') && $this->input->post('tanggal_keluar')) {
            $first_date = $this->input->post('tanggal_masuk');
            $second_date = $this->input->post('tanggal_keluar');
            if ($first_date != '' || $second_date != '') {
                $page_data = $this->M_Laporan->selectDataPasienPt($first_date, $second_date);
            } else if ($first_date = '' || $second_date = '') {
                $page_data = $this->M_Laporan->selectDataPasienPt($tgl, $tgl);
            }
        } else {
            $page_data = $this->M_Laporan->selectDataPasienPt($tgl, $tgl);
        }

        for ($i = 0; $i < count($page_data); $i++) {



            $satu_lk = '0-28 hr lk';
            $satu_pr = '0-28 hr pr';

            $dua_lk = '28<1 th lk';
            $dua_pr = '28<1 th pr';

            $tiga_lk = '1-4 th lk';
            $tiga_pr = '1-4 th pr';

            $empat_lk = '5-14 th lk';
            $empat_pr = '5-14 th pr';

            $lima_lk = '15-24 th lk';
            $lima_pr = '15-24 th pr';

            $enam_lk = '25-44 th lk';
            $enam_pr = '25-44 th pr';

            $tujuh_lk = '45-64 th lk';
            $tujuh_pr = '45-64 th pr';

            $delapan_lk = '65+ lk';
            $delapan_pr = '65+ pr';



            $no = $i + 1;
            $kode = $page_data[$i]->kode;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;
            $id_dtd = $page_data[$i]->id_dtd;
            $satu_lk_ = $page_data[$i]->$satu_lk;
            $satu_pr_ = $page_data[$i]->$satu_pr;

            $dua_lk_ = $page_data[$i]->$dua_lk;
            $dua_pr_ = $page_data[$i]->$dua_pr;

            $tiga_lk_ = $page_data[$i]->$tiga_lk;
            $tiga_pr_ = $page_data[$i]->$tiga_pr;

            $empat_lk_ = $page_data[$i]->$empat_lk;
            $empat_pr_ = $page_data[$i]->$empat_pr;

            $lima_lk_ = $page_data[$i]->$lima_lk;
            $lima_pr_ = $page_data[$i]->$lima_pr;

            $enam_lk_ = $page_data[$i]->$enam_lk;
            $enam_pr_ = $page_data[$i]->$enam_pr;

            $tujuh_lk_ = $page_data[$i]->$tujuh_lk;
            $tujuh_pr_ = $page_data[$i]->$tujuh_pr;

            $delapan_lk_ = $page_data[$i]->$delapan_lk;
            $delapan_pr_ = $page_data[$i]->$delapan_pr;

            $total = $page_data[$i]->total;



            $out[$i] = array(
                $no, $kode, $nama_diagnosa, $id_dtd, $satu_lk_,
                $satu_pr_, $dua_lk_, $dua_pr_, $tiga_lk_, $tiga_pr_, $empat_lk_, $empat_pr_, $lima_lk_, $lima_pr_, $enam_lk_, $enam_pr_, $tujuh_lk_,
                $tujuh_pr_, $delapan_lk_, $delapan_pr_, $total
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
    public function tampil_data_pasien_pt_poli()
    {

        $out = null;
        $tgl = date("Y-m-d");

        if ($this->input->post('tanggal_masuk') && $this->input->post('tanggal_keluar')) {
            $first_date = $this->input->post('tanggal_masuk');
            $second_date = $this->input->post('tanggal_keluar');
            if ($first_date != '' || $second_date != '') {
                $page_data = $this->M_Laporan->selectDataPasienPt_poli($first_date, $second_date);
            } else if ($first_date = '' || $second_date = '') {
                $page_data = $this->M_Laporan->selectDataPasienPt_poli($tgl, $tgl);
            }
        } else {
            $page_data = $this->M_Laporan->selectDataPasienPt_poli($tgl, $tgl);
        }

        for ($i = 0; $i < count($page_data); $i++) {



            $satu_lk = '0-28 hr lk';
            $satu_pr = '0-28 hr pr';

            $dua_lk = '28<1 th lk';
            $dua_pr = '28<1 th pr';

            $tiga_lk = '1-4 th lk';
            $tiga_pr = '1-4 th pr';

            $empat_lk = '5-14 th lk';
            $empat_pr = '5-14 th pr';

            $lima_lk = '15-24 th lk';
            $lima_pr = '15-24 th pr';

            $enam_lk = '25-44 th lk';
            $enam_pr = '25-44 th pr';

            $tujuh_lk = '45-64 th lk';
            $tujuh_pr = '45-64 th pr';

            $delapan_lk = '65+ lk';
            $delapan_pr = '65+ pr';



            $no = $i + 1;
            $kode = $page_data[$i]->kode;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;
            $id_dtd = $page_data[$i]->id_dtd;
            $satu_lk_ = $page_data[$i]->$satu_lk;
            $satu_pr_ = $page_data[$i]->$satu_pr;

            $dua_lk_ = $page_data[$i]->$dua_lk;
            $dua_pr_ = $page_data[$i]->$dua_pr;

            $tiga_lk_ = $page_data[$i]->$tiga_lk;
            $tiga_pr_ = $page_data[$i]->$tiga_pr;

            $empat_lk_ = $page_data[$i]->$empat_lk;
            $empat_pr_ = $page_data[$i]->$empat_pr;

            $lima_lk_ = $page_data[$i]->$lima_lk;
            $lima_pr_ = $page_data[$i]->$lima_pr;

            $enam_lk_ = $page_data[$i]->$enam_lk;
            $enam_pr_ = $page_data[$i]->$enam_pr;

            $tujuh_lk_ = $page_data[$i]->$tujuh_lk;
            $tujuh_pr_ = $page_data[$i]->$tujuh_pr;

            $delapan_lk_ = $page_data[$i]->$delapan_lk;
            $delapan_pr_ = $page_data[$i]->$delapan_pr;

            $total = $page_data[$i]->total;



            $out[$i] = array(
                $no, $kode, $nama_diagnosa, $id_dtd, $satu_lk_,
                $satu_pr_, $dua_lk_, $dua_pr_, $tiga_lk_, $tiga_pr_, $empat_lk_, $empat_pr_, $lima_lk_, $lima_pr_, $enam_lk_, $enam_pr_, $tujuh_lk_,
                $tujuh_pr_, $delapan_lk_, $delapan_pr_, $total
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
    public function tampil_data_pasien_pt_igd()
    {

        $out = null;
        $tgl = date("Y-m-d");

        if ($this->input->post('tanggal_masuk') && $this->input->post('tanggal_keluar')) {
            $first_date = $this->input->post('tanggal_masuk');
            $second_date = $this->input->post('tanggal_keluar');
            if ($first_date != '' || $second_date != '') {
                $page_data = $this->M_Laporan->selectDataPasienPt_igd($first_date, $second_date);
            } else if ($first_date = '' || $second_date = '') {
                $page_data = $this->M_Laporan->selectDataPasienPt_igd($tgl, $tgl);
            }
        } else {
            $page_data = $this->M_Laporan->selectDataPasienPt_igd($tgl, $tgl);
        }

        for ($i = 0; $i < count($page_data); $i++) {



            $satu_lk = '0-28 hr lk';
            $satu_pr = '0-28 hr pr';

            $dua_lk = '28<1 th lk';
            $dua_pr = '28<1 th pr';

            $tiga_lk = '1-4 th lk';
            $tiga_pr = '1-4 th pr';

            $empat_lk = '5-14 th lk';
            $empat_pr = '5-14 th pr';

            $lima_lk = '15-24 th lk';
            $lima_pr = '15-24 th pr';

            $enam_lk = '25-44 th lk';
            $enam_pr = '25-44 th pr';

            $tujuh_lk = '45-64 th lk';
            $tujuh_pr = '45-64 th pr';

            $delapan_lk = '65+ lk';
            $delapan_pr = '65+ pr';



            $no = $i + 1;
            $kode = $page_data[$i]->kode;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;
            $id_dtd = $page_data[$i]->id_dtd;
            $satu_lk_ = $page_data[$i]->$satu_lk;
            $satu_pr_ = $page_data[$i]->$satu_pr;

            $dua_lk_ = $page_data[$i]->$dua_lk;
            $dua_pr_ = $page_data[$i]->$dua_pr;

            $tiga_lk_ = $page_data[$i]->$tiga_lk;
            $tiga_pr_ = $page_data[$i]->$tiga_pr;

            $empat_lk_ = $page_data[$i]->$empat_lk;
            $empat_pr_ = $page_data[$i]->$empat_pr;

            $lima_lk_ = $page_data[$i]->$lima_lk;
            $lima_pr_ = $page_data[$i]->$lima_pr;

            $enam_lk_ = $page_data[$i]->$enam_lk;
            $enam_pr_ = $page_data[$i]->$enam_pr;

            $tujuh_lk_ = $page_data[$i]->$tujuh_lk;
            $tujuh_pr_ = $page_data[$i]->$tujuh_pr;

            $delapan_lk_ = $page_data[$i]->$delapan_lk;
            $delapan_pr_ = $page_data[$i]->$delapan_pr;

            $total = $page_data[$i]->total;



            $out[$i] = array(
                $no, $kode, $nama_diagnosa, $id_dtd, $satu_lk_,
                $satu_pr_, $dua_lk_, $dua_pr_, $tiga_lk_, $tiga_pr_, $empat_lk_, $empat_pr_, $lima_lk_, $lima_pr_, $enam_lk_, $enam_pr_, $tujuh_lk_,
                $tujuh_pr_, $delapan_lk_, $delapan_pr_, $total
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

    public function tampil_data_pasien_bor()
    {

        $out = null;
        $tgl = date("Y");


        if ($this->input->post('tahun')) {
            $tahun = $this->input->post('tahun');

            if ($tahun != '') {
                $page_data = $this->M_Laporan->selectDataPasienBor($tahun);
            } else if ($tahun = '') {
                $page_data = $this->M_Laporan->selectDataPasienBor($tgl);
            }
        } else {
            $page_data = $this->M_Laporan->selectDataPasienBor($tgl);
        }

        for ($i = 0; $i < count($page_data); $i++) {

            $bln = $page_data[$i]->bulan;



            $thn = $page_data[$i]->thn;
            $bulan = bulan($bln);
            $ruangan = $page_data[$i]->ruangan;
            $nama_kelas = $page_data[$i]->nama_kelas;
            $hp = $page_data[$i]->hp;
            $lamarawat = $page_data[$i]->lamarawat;
            $periode = $page_data[$i]->periode;
            $tt = $page_data[$i]->tt;
            // $o =  $page_data[$i]->hp / $periode;

            // $oo = number_format($o, 2, ',', '.');
            // $lebih =  '-';
            // $kurang =  '-';

            $pasienkeluar = $page_data[$i]->pasienkeluar;
            $kurang48 = $page_data[$i]->Kurang48Jam;
            $lebih48 = $page_data[$i]->Lebih48Jam;
            $hplusm = $page_data[$i]->HPlusM;
            $avloss = $page_data[$i]->avlos;
            $br = $page_data[$i]->bor;

            // $avlos = ($o * $periode) /  $jlh_hidup;
            // $avloss = number_format($avlos, 2, ',', '.');
            if ($avloss < 3) {
                $los =  "<span class='badge  badge-warning' style='background-color: red'>$avloss</span>";
            } else if ($avloss >= 3 && $avloss <=  12) {
                $los =  "<span class='badge  badge-warning' style='background-color: green'>$avloss</span>";
            } else if ($avloss > 12) {
                $los =  "<span class='badge  badge-warning' style='background-color: blue'>$avloss</span>";
            } else {
                $los =  $avloss;
            }


            // $br =  ($o * 100) / $page_data[$i]->jlh_kamar;
            // $bor = number_format($br, 2, ',', '.');


            if ($br < 75) {
                $bor =  "<span class='badge  badge-warning' style='background-color: red'>$br</span>";
            } else if ($br > 74 && $br <  86) {
                $bor =  "<span class='badge  badge-warning' style='background-color: green'>$br</span>";
            } else if ($br > 84) {
                $bor =  "<span class='badge  badge-warning' style='background-color: blue'>$br</span>";
            } else {
                $bor =  $br;
            }
            // return $hasilbor;

            // var_dump($hasilbor);
            // die;
            $toii = $page_data[$i]->toi;
            // $toi = ($jlh_kamar - $o) * $periode /  $jlh_hidup;
            // $toii = number_format($toi, 2, ',', '.');
            if ($toii < 1) {
                $toi =  "<span class='badge  badge-warning' style='background-color: red'>$toii</span>";
            } else if ($br >= 1 && $br <=  3) {
                $toi =  "<span class='badge  badge-warning' style='background-color: green'>$toii</span>";
            } else if ($br > 3) {
                $toi =  "<span class='badge  badge-warning' style='background-color: blue'>$toii</span>";
            } else {
                $toi =  $toii;
            }

            $btoo = $page_data[$i]->bto; 

            // $bto = $jlh_hidup / $jlh_kamar;
            // $btoo = number_format($bto, 2, ',', '.');

            if ($btoo  <  30) {
                $bto =  "<span class='badge  badge-warning' style='background-color: red'>$btoo</span>";
            } else if ($btoo >= 30) {
                $bto =  "<span class='badge  badge-warning' style='background-color: blue'>$btoo</span>";
            } else {
                $bto =  $btoo;
            }
            $ndr = $page_data[$i]->ndr;
            $gdr = $page_data[$i]->gdr;


            $out[$i] = array(
                $thn, $bulan, $nama_kelas, $ruangan, $hp, $lamarawat, $pasienkeluar, $kurang48, $lebih48,  $hplusm,  $periode, $tt, $bor, $los, $toi, $bto, $ndr, $gdr
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

    public function tampil_data_pasien_bor_new()
    {

        $out = null;
        $tgl = date("Y");


        if ($this->input->post('tahun')) {
            $tahun = $this->input->post('tahun');

            if ($tahun != '') {
                $page_data = $this->M_Laporan->selectDataPasienBor_new($tahun);
            } else if ($tahun = '') {
                $page_data = $this->M_Laporan->selectDataPasienBor_new($tgl);
            }
        } else {
            $page_data = $this->M_Laporan->selectDataPasienBor_new($tgl);
        }

        for ($i = 0; $i < count($page_data); $i++) {

            $bln = $page_data[$i]->bulan;



            $thn = $page_data[$i]->thn;
            $bulan = bulan($bln);
            $ruangan = $page_data[$i]->ruangan;
            $nama_kelas = $page_data[$i]->nama_kelas;
            $hp = $page_data[$i]->hp;
            $lamarawat = $page_data[$i]->lamarawat;
            $periode = $page_data[$i]->periode;
            $tt = $page_data[$i]->tt;
            // $o =  $page_data[$i]->hp / $periode;

            // $oo = number_format($o, 2, ',', '.');
            // $lebih =  '-';
            // $kurang =  '-';

            $pasienkeluar = $page_data[$i]->pasienkeluar;
            $kurang48 = $page_data[$i]->Kurang48Jam;
            $lebih48 = $page_data[$i]->Lebih48Jam;
            $hplusm = $page_data[$i]->HPlusM;
            $avloss = $page_data[$i]->avlos;
            $br = $page_data[$i]->bor;

            // $avlos = ($o * $periode) /  $jlh_hidup;
            // $avloss = number_format($avlos, 2, ',', '.');
            if ($avloss < 3) {
                $los =  "<span class='badge  badge-warning' style='background-color: red'>$avloss</span>";
            } else if ($avloss >= 3 && $avloss <=  12) {
                $los =  "<span class='badge  badge-warning' style='background-color: green'>$avloss</span>";
            } else if ($avloss > 12) {
                $los =  "<span class='badge  badge-warning' style='background-color: blue'>$avloss</span>";
            } else {
                $los =  $avloss;
            }


            // $br =  ($o * 100) / $page_data[$i]->jlh_kamar;
            // $bor = number_format($br, 2, ',', '.');


            if ($br < 75) {
                $bor =  "<span class='badge  badge-warning' style='background-color: red'>$br</span>";
            } else if ($br > 74 && $br <  86) {
                $bor =  "<span class='badge  badge-warning' style='background-color: green'>$br</span>";
            } else if ($br > 84) {
                $bor =  "<span class='badge  badge-warning' style='background-color: blue'>$br</span>";
            } else {
                $bor =  $br;
            }
            // return $hasilbor;

            // var_dump($hasilbor);
            // die;
            $toii = $page_data[$i]->toi;
            // $toi = ($jlh_kamar - $o) * $periode /  $jlh_hidup;
            // $toii = number_format($toi, 2, ',', '.');
            if ($toii < 1) {
                $toi =  "<span class='badge  badge-warning' style='background-color: red'>$toii</span>";
            } else if ($br >= 1 && $br <=  3) {
                $toi =  "<span class='badge  badge-warning' style='background-color: green'>$toii</span>";
            } else if ($br > 3) {
                $toi =  "<span class='badge  badge-warning' style='background-color: blue'>$toii</span>";
            } else {
                $toi =  $toii;
            }

            $btoo = $page_data[$i]->bto; 

            // $bto = $jlh_hidup / $jlh_kamar;
            // $btoo = number_format($bto, 2, ',', '.');

            if ($btoo  <  30) {
                $bto =  "<span class='badge  badge-warning' style='background-color: red'>$btoo</span>";
            } else if ($btoo >= 30) {
                $bto =  "<span class='badge  badge-warning' style='background-color: blue'>$btoo</span>";
            } else {
                $bto =  $btoo;
            }
            $ndr = $page_data[$i]->ndr;
            $gdr = $page_data[$i]->gdr;


            $out[$i] = array(
                $thn, $bulan, $nama_kelas, $ruangan, $hp, $lamarawat, $pasienkeluar, $kurang48, $lebih48,  $hplusm,  $periode, $tt, $bor, $los, $toi, $bto, $ndr, $gdr
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


    public function Laporan_jasa_poli()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_jasa_poli';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Laporan_jasa_ugd()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_jasa_ugd';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Laporan_cara_bayar()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_cara_bayar';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_cara_bayar()
    {
        $page_data = $this->M_Laporan->selectLaporanCaraBayar();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $id_dokter = $page_data[$i]->id_dokter;
            $id_poli = $page_data[$i]->id_poli;

            //var_dump($id_dokter);
            $bpjs = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'BPJS', $id_poli);
            $umum = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'UMUM', $id_poli);
            $timah = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'TIMAH', $id_poli);
            $mitra = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'MITRA', $id_poli);
            $internal = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'INTERNAL', $id_poli);
            $lainnya = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'LAINNYA', $id_poli);


            $dokter = $page_data[$i]->nama;
            $poli = $page_data[$i]->poli;
            $bpjs = $bpjs->total;
            $umum = $umum->total;
            $timah = $timah->total;
            $mitra = $mitra->total;
            $internal = $internal->total;
            $lainnya = $lainnya->total;


            $out[$i] = array($no, $dokter, $poli, $bpjs, $umum, $timah, $mitra, $internal, $lainnya);
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

    public function Tampil_Range_cara_bayar()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Laporan->selectLaporanCaraBayar();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $id_poli = $page_data[$i]->id_poli;
            if ($page_data[$i]->dokter_spes == 'FIS' && $akhir < '2022-12-01') {
                if ($page_data[$i]->id_dokter == 'V3176LNEKF') {
                    $id_dokter = 'V3176LNEKI';
                } elseif ($page_data[$i]->id_dokter == 'VUQ6LNEKIF') {
                    $id_dokter = 'VUQ6LNEKI';
                }
                $bpjs = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'BPJS', $mulai, $akhir, $id_poli);
                $umum = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'UMUM', $mulai, $akhir, $id_poli);
                $timah = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'TIMAH', $mulai, $akhir, $id_poli);
                $mitra = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'MITRA', $mulai, $akhir, $id_poli);
                $internal = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'INTERNAL', $mulai, $akhir, $id_poli);
                $lainnya = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'LAINNYA', $mulai, $akhir, $id_poli);
            } else {
                $id_dokter = $page_data[$i]->id_dokter;

                $bpjs = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'BPJS', $mulai, $akhir, $id_poli);
                $umum = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'UMUM', $mulai, $akhir, $id_poli);
                $timah = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'TIMAH', $mulai, $akhir, $id_poli);
                $mitra = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'MITRA', $mulai, $akhir, $id_poli);
                $internal = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'INTERNAL', $mulai, $akhir, $id_poli);
                $lainnya = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'LAINNYA', $mulai, $akhir, $id_poli);
            }
            //var_dump($id_dokter);



            $dokter = $page_data[$i]->nama;
            $poli = $page_data[$i]->poli;
            $bpjs = $bpjs->total;
            $umum = $umum->total;
            $timah = $timah->total;
            $mitra = $mitra->total;
            $internal = $internal->total;
            $lainnya = $lainnya->total;


            $out[$i] = array($no, $dokter, $poli, $bpjs, $umum, $timah, $mitra, $internal, $lainnya);
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

    public function Tampil_laporan_jasa_poli()
    {
        $page_data = $this->M_Laporan->selectLaporanJasaPoli();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $id_dokter = $page_data[$i]->id_dokter;
            //var_dump($id_dokter);
            // $bpjs = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'BPJS');
            // $umum = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'UMUM');
            // $timah = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'TIMAH');
            // $mitra = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'MITRA');
            // $internal = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'INTERNAL');
            // $lainnya = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'LAINNYA');


            $dokter = $page_data[$i]->nama;
            $poli = $page_data[$i]->poli;
            $total = $page_data[$i]->total;
            // $bpjs = $bpjs->total;
            // $umum = $umum->total;
            // $timah = $timah->total;
            // $mitra = $mitra->total;
            // $internal = $internal->total;
            // $lainnya = $lainnya->total;


            $out[$i] = array($no, $dokter, $poli, $total);
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
    public function Tampil_Range_jasa_poli()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Laporan->selectLaporanJasaPoli();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $id_dokter = $page_data[$i]->id_dokter;
            //var_dump($id_dokter);
            // $bpjs = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'BPJS',$mulai,$akhir);
            // $umum = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'UMUM', $mulai, $akhir);
            // $timah = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'TIMAH',$mulai, $akhir);
            // $mitra = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'MITRA', $mulai, $akhir);
            // $internal = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'INTERNAL', $mulai, $akhir);
            // $lainnya = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'LAINNYA',$mulai, $akhir);


            $dokter = $page_data[$i]->nama;
            $poli = $page_data[$i]->poli;
            $total = $page_data[$i]->total;
            // $bpjs = $bpjs->total;
            // $umum = $umum->total;
            // $timah = $timah->total;
            // $mitra = $mitra->total;
            // $internal = $internal->total;
            // $lainnya = $lainnya->total;


            $out[$i] = array($no, $dokter, $poli, $total);
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
    public function Tampil_laporan_jasa_ugd()
    {
        $page_data = $this->M_Laporan->selectLaporanJasaUgd();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $id_dokter = $page_data[$i]->id_dokter;
            //var_dump($id_dokter);
            // $bpjs = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'BPJS');
            // $umum = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'UMUM');
            // $timah = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'TIMAH');
            // $mitra = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'MITRA');
            // $internal = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'INTERNAL');
            // $lainnya = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'LAINNYA');


            $dokter = $page_data[$i]->dokter;
            // $poli = $page_data[$i]->poli;
            $total = $page_data[$i]->total;
            // $bpjs = $bpjs->total;
            // $umum = $umum->total;
            // $timah = $timah->total;
            // $mitra = $mitra->total;
            // $internal = $internal->total;
            // $lainnya = $lainnya->total;


            $out[$i] = array($no, $dokter, $total);
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
    public function Tampil_Range_jasa_ugd()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Laporan->selectLaporanJasaUgd();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $id_dokter = $page_data[$i]->id_dokter;
            //var_dump($id_dokter);
            // $bpjs = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'BPJS',$mulai,$akhir);
            // $umum = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'UMUM', $mulai, $akhir);
            // $timah = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'TIMAH',$mulai, $akhir);
            // $mitra = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'MITRA', $mulai, $akhir);
            // $internal = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'INTERNAL', $mulai, $akhir);
            // $lainnya = $this->M_Laporan->getJumlahPasienByCBRange($id_dokter, 'LAINNYA',$mulai, $akhir);


            $dokter = $page_data[$i]->dokter;
            // $poli = $page_data[$i]->poli;
            $total = $page_data[$i]->total;
            // $bpjs = $bpjs->total;
            // $umum = $umum->total;
            // $timah = $timah->total;
            // $mitra = $mitra->total;
            // $internal = $internal->total;
            // $lainnya = $lainnya->total;


            $out[$i] = array($no, $dokter, $total);
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

    // Laporan pasient ke poli
    public function Laporan_mutu_poli()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_mutu_poli';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_mutu_poli()
    {
        $page_data = $this->M_Laporan->selectLaporanMutuPoli();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $nama = $page_data[$i]->nama;
            $no_rm = $page_data[$i]->no_rm;
            $tgl_masuk = $page_data[$i]->tgl_masuk;
            $tgl_keluar = $page_data[$i]->tgl_keluar;
            $lama_berobat = $page_data[$i]->lama_berobat;
            $cara_bayar = $page_data[$i]->cara_bayar;


            $out[$i] = array($no, $nama, $no_rm, $tgl_masuk, $tgl_keluar, $lama_berobat, $cara_bayar);
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

    public function Tampil_Range_mutu_poli()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Laporan->selectLaporanMutuPoliRange($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $nama = $page_data[$i]->nama;
            $no_rm = $page_data[$i]->no_rm;
            $tgl_masuk = $page_data[$i]->tgl_masuk;
            $tgl_keluar = $page_data[$i]->tgl_keluar;
            $lama_berobat = $page_data[$i]->lama_berobat;
            $cara_bayar = $page_data[$i]->cara_bayar;


            $out[$i] = array($no, $nama, $no_rm, $tgl_masuk, $tgl_keluar, $lama_berobat, $cara_bayar);
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

    // Laporan pasient ke poli
    public function Laporan_berobat_pasien_baru()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_berobat_pasien_baru';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_berobat_pasien_baru()
    {
        $page_data = $this->M_Laporan->selectLaporanBerobatPasienBaru();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $nama = $page_data[$i]->nama;
            $no_rm = $page_data[$i]->no_rm;
            $tgl_masuk = $page_data[$i]->tgl_masuk;
            $tgl_keluar = $page_data[$i]->tgl_keluar;
            $lama_berobat = $page_data[$i]->lama_berobat;
            $cara_bayar = $page_data[$i]->cara_bayar;


            $out[$i] = array($no, $nama, $no_rm, $tgl_masuk, $tgl_keluar, $lama_berobat, $cara_bayar);
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

    public function Tampil_Range_laporan_berobat_pasien_baru()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Laporan->selectLaporanBerobatPasienBaruRange($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $nama = $page_data[$i]->nama;
            $no_rm = $page_data[$i]->no_rm;
            $tgl_masuk = $page_data[$i]->tgl_masuk;
            $tgl_keluar = $page_data[$i]->tgl_keluar;
            $lama_berobat = $page_data[$i]->lama_berobat;
            $cara_bayar = $page_data[$i]->cara_bayar;


            $out[$i] = array($no, $nama, $no_rm, $tgl_masuk, $tgl_keluar, $lama_berobat, $cara_bayar);
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

    //Laporan Penyakit Tertinggi Rajal
    public function Laporan_penyakit_tertinggi_rajal()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_penyakit_tertinggi_rajal';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_penyakit_tertinggi_rajal()
    {
        $page_data = $this->M_Laporan->SelectLaporanPenyakitTertinggiRajal();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $kode = $page_data[$i]->kode;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;
            $jenis_klaim = $page_data[$i]->jenis_klaim;
            $jumlah = $page_data[$i]->jumlah;


            $out[$i] = array($no, $kode, $nama_diagnosa, $jumlah, $jenis_klaim);
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

    public function Tampil_range_laporan_penyakit_tertinggi_rajal()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $jenis_klaim = $this->input->post('jenis_klaim');

        $page_data = $this->M_Laporan->SelectLaporanRangePenyakitTertinggiRajal($mulai, $akhir, $jenis_klaim);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $kode = $page_data[$i]->kode;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;
            $jenis_klaim = $page_data[$i]->jenis_klaim;
            $jumlah = $page_data[$i]->jumlah;


            $out[$i] = array($no, $kode, $nama_diagnosa, $jumlah, $jenis_klaim);
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

    //Laporan Jumlah Pasien Poli
    public function Laporan_poli_ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/LaporanJumlahPasienPoli';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_jumlah_pasien_poli()
    {
        $out = null;
        $tgl = date("Y-m-d");

        $page_data = $this->M_Laporan->selectDataJumlahPasienPoli($tgl);

        for ($i = 0; $i < count($page_data); $i++) {
            $tgl_masuk = strtotime($page_data[$i]->tgl_masuk);
            $tgl_keluar = strtotime($page_data[$i]->tgl_keluar);

            $tgl_lahir = strtotime($page_data[$i]->tgl_lahir);

            $no = $i + 1;
            $tgl_masuk =  strftime("%A, %d %B %Y ", $tgl_masuk);
            if ($page_data[$i]->tgl_keluar == null) {
                $tgl_keluar = '-';
            } else {
                $tgl_keluar =  strftime("%A, %d %B %Y ", $tgl_keluar);
            }

            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = strftime(" %d %B %Y ", $tgl_lahir);
            $poli = $page_data[$i]->poli;
            $nama_dokter = $page_data[$i]->nama_dokter;

            $out[$i] = array($no, $tgl_masuk, $no_rm, $nama, $poli, $tgl_lahir, $jenis_kelamin, $nama_dokter);
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

    public function tampil_data_jumlah_pasien_poliRange()
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');

        $page_data = $this->M_Laporan->selectDataJumlahPasienPoliRange($first_date, $second_date);
        $out = null;


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl_masuk = strtotime($page_data[$i]->tgl_masuk);
            $tgl_keluar = strtotime($page_data[$i]->tgl_keluar);

            $tgl_lahir = strtotime($page_data[$i]->tgl_lahir);

            $no = $i + 1;
            $tgl_masuk =  strftime("%A, %d %B %Y ", $tgl_masuk);
            if ($page_data[$i]->tgl_keluar == null) {
                $tgl_keluar = '-';
            } else {
                $tgl_keluar =  strftime("%A, %d %B %Y ", $tgl_keluar);
            }

            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = strftime(" %d %B %Y ", $tgl_lahir);
            $poli = $page_data[$i]->poli;
            $nama_dokter = $page_data[$i]->nama_dokter;


            $out[$i] = array($no, $tgl_masuk, $no_rm, $nama, $poli, $tgl_lahir, $jenis_kelamin, $nama_dokter);
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

    //laporan kesehatan gigi mulut
    public function laporan_kesehatan_gigi_mulut()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kesehatan_gigi_mulut';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_kesehatan_gigi_mulut()
    {
        $page_data = $this->M_Laporan->selectLaporanKesehatanGigiMulut();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tindakan = $page_data[$i]->tindakan;
            $jumlah = $page_data[$i]->jml;

            $out[$i] = array($no, $tindakan, $jumlah);
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

    public function Tampil_Range_kesehatan_gigi_mulut()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $poli = $this->input->post('poli');

        $page_data = $this->M_Laporan->selectRangeLaporanKesehatanGigiMulut($mulai, $akhir, $poli);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tindakan = $page_data[$i]->tindakan;
            $jumlah = $page_data[$i]->jml;

            $out[$i] = array($no, $tindakan, $jumlah);
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

    //laporan rehab dan kesjiwa
    public function laporan_kesehatan_rehab_medik()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_rehab_medik';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_rehab_medik()
    {
        $page_data = $this->M_Laporan->selectLaporanRehabMedik();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tindakan = $page_data[$i]->tindakan;
            $jumlah = $page_data[$i]->jml;

            $out[$i] = array($no, $tindakan, $jumlah);
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

    public function Tampil_Range_rehab_medik()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $poli = $this->input->post('poli');

        $page_data = $this->M_Laporan->selectRangeLaporanRehabMedik($mulai, $akhir, $poli);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tindakan = $page_data[$i]->tindakan;
            $jumlah = $page_data[$i]->jml;

            $out[$i] = array($no, $tindakan, $jumlah);
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

    public function Laporan_kunjungan_rajal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan_rajal';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_kunjungan_rajal()
    {
        $page_data = $this->M_Laporan->selectPoli();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $jumlah = $this->M_Laporan->selectKunjunganRajal($page_data[$i]->id_list_poli);
            $jumlah = intval($jumlah->jumlah);
            $poli = $page_data[$i]->nmpoli_bpjs;

            $out[$i] = array($no, $poli, $jumlah);
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

    public function Tampil_Range_kunjungan_rajal()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Laporan->selectPoli();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $jumlah = $this->M_Laporan->selectRangeKunjunganRajal($mulai, $akhir, $page_data[$i]->id_list_poli);
            $jumlah = intval($jumlah->jumlah);
            $poli = $page_data[$i]->nmpoli_bpjs;

            $out[$i] = array($no, $poli, $jumlah);
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

    public function Laporan_kunjungan_rs()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan_rs';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_kunjungan_rs()
    {
        $page_data = $this->M_Laporan->selectKunjunganRs();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;

            $jumlah = $page_data[$i]->jumlah;
            $jenis = $page_data[$i]->jenis;

            $out[$i] = array($no, $jenis, $jumlah);
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

    public function Tampil_Range_kunjungan_rs()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Laporan->selectRangeKunjunganRs($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;

            $jumlah = $page_data[$i]->jumlah;
            $jenis = $page_data[$i]->jenis;

            $out[$i] = array($no, $jenis, $jumlah);
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

    public function Laporan_kunjunganbyCB()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan_cara_bayar';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_kunjungan_cb()
    {

        $page_data = $this->M_Laporan->selectLaporanKunjunganCaraBayar();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $id_cara_bayar = $page_data[$i]->id_cara_bayar;
            // //var_dump($id_dokter);
            $mulai = $this->input->post('mulai');
            $akhir = $this->input->post('akhir');
            if ($mulai != '' || $akhir != '') {
                $poli = $this->M_Laporan->getJumlahKunjunganByCBRange($id_cara_bayar, 'history_pelayanan', $mulai, $akhir);
                $igd = $this->M_Laporan->getJumlahKunjunganByCBRange($id_cara_bayar, 'history_pelayanan_ugd', $mulai, $akhir);
                $ranap = $this->M_Laporan->getJumlahKunjunganByCBRange($id_cara_bayar, 'history_pelayanan_ranap', $mulai, $akhir);
            } else {
                $poli = $this->M_Laporan->getJumlahKunjunganbyCB($id_cara_bayar, 'history_pelayanan');
                $igd = $this->M_Laporan->getJumlahKunjunganbyCB($id_cara_bayar, 'history_pelayanan_ugd');
                $ranap = $this->M_Laporan->getJumlahKunjunganbyCB($id_cara_bayar, 'history_pelayanan_ranap');
            }
            $cara_bayar = $page_data[$i]->nama;
            $poli = $poli->total;
            $igd = $igd->total;
            $ranap = $ranap->total;



            $out[$i] = array($no, $cara_bayar, $poli, $igd, $ranap);
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

    public function Laporan_pengadaan_obat()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pengadaan_obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pengadaan_obat()
    {
        $page_data = ['Obat Generik (Formularium + Non Formularium)', 'Obat Non Generik Formularium', 'Obat Non Generik Non Formularium'];

        $out = null;
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
        } else {

            for ($i = 0; $i < count($page_data); $i++) {
                $no = $i + 1;
                $nama = $page_data[$i];
                if ($i == 0) {
                    $jumlah_obat = 0;
                    $obat_tersedia = 0;
                    $obat_formularium = 0;
                } else if ($i == 1) {
                    $jumlah_obat = 1;
                    $obat_tersedia = 0;
                    $obat_formularium = 0;
                } else if ($i == 2) {
                    $jumlah_obat = 2;
                    $obat_tersedia = 0;
                    $obat_formularium = 0;
                }


                $out[$i] = array($no, $nama, $jumlah_obat, $obat_tersedia, $obat_formularium);
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
    public function Laporan_ketenagaan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Ketenagaan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Laporan_morbiditas_ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/morbiditas_ranap';
        $page_data['judul'] = 'Data Keadaan Morbiditas Pasien Rawat Inap';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Laporan_morbiditas_ranap_kecelakaan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/morbiditas_ranap';
        $page_data['judul'] = 'Data Keadaan Morbiditas Pasien Rawat Inap Penyebab Kecelakaan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Laporan_morbiditas_rajal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/morbiditas_ranap';
        $page_data['judul'] = 'Data Keadaan Morbiditas Pasien Rawat Jalan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Laporan_morbiditas_rajal_kecelakaan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/morbiditas_ranap';
        $page_data['judul'] = 'Data Keadaan Morbiditas Pasien Rawat Jalan Penyebab Kecelakaan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Laporan_data_rs()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Data_rs';
        $page_data['judul'] = 'Data Dasar Rumah Sakit';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Laporan_kunjungan_rawat_darurat()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/kunjungan_rawat_darurat';
        $page_data['judul'] = 'Kunjungan Rawat Darurat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function kebidanan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/kegiatan_kebidanan';
        $page_data['judul'] = 'Kegiatan Kebidanan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function perinatologi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/perinatologi';
        $page_data['judul'] = 'Kegiatan Perinatologi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function pembedahan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/pembedahan';
        $page_data['judul'] = 'Kegiatan Perinatologi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function kb()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/keluarga_berencana';
        $page_data['judul'] = 'Kegiatan Perinatologi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function rujukan_rl()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/rujukan_rl';
        $page_data['judul'] = 'Kegiatan Perinatologi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Laporan_pasien_batal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_batal_pasien';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_pasien_batal()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Laporan->selectLaporanRangePasienBatal($first_date, $second_date);
        } else {
            $page_data = $this->M_Laporan->selectLaporanPasienBatal();
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);

            $no = $i + 1;


            $no_rm = $page_data[$i]->no_rm;
            $poli = $page_data[$i]->poli;
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $dokter = $page_data[$i]->dokter;

            $out[$i] = array($no, $tgl_masuk, $no_rm, $pasien, $jk,  $poli, $dokter);
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

    //total poli
    public function Laporan_pendapatan_rajal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_total_rajal';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pendapatan_rajal()
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Laporan->selectRangeLaporanPendapatanRajal($first_date, $second_date);
        } else {
            $page_data = $this->M_Laporan->selectLaporanPendapatanRajal();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);

            $id_pelayanan = $page_data[$i]->id_pelayanan;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $poli = $page_data[$i]->poli;
            $total = $page_data[$i]->total;

            $konsul = $this->M_Laporan->getKonsulRajal($id_pelayanan)->total;

            // $apotik = $this->M_Kasir->total_apotik($id_pelayanan);
            // $igd = $this->M_Kasir->total_igd($id_pelayanan);
            // $labor = $this->M_Kasir->total_labor($id_pelayanan);
            // $radio = $this->M_Kasir->total_radio($id_pelayanan);
            // $anak = $this->M_Kasir->total_anak($id_pelayanan);
            // $internis = $this->M_Kasir->total_internis($id_pelayanan);
            // $bedah = $this->M_Kasir->total_bedah($id_pelayanan);
            // $fisio = $this->M_Kasir->total_fisio($id_pelayanan);
            // $gigi = $this->M_Kasir->total_gigi($id_pelayanan);
            // $jantung = $this->M_Kasir->total_jantung($id_pelayanan);
            // $kulit = $this->M_Kasir->total_kulit($id_pelayanan);
            // $mata = $this->M_Kasir->total_mata($id_pelayanan);
            // $obgyne = $this->M_Kasir->total_obgyne($id_pelayanan);
            // $tht = $this->M_Kasir->total_tht($id_pelayanan);
            // $umum = $this->M_Kasir->total_umum($id_pelayanan);
            // $akp = $this->M_Kasir->total_akupuntur($id_pelayanan);
            // $bdm = $this->M_Kasir->total_bedah_mulut($id_pelayanan);
            // $jiwa = $this->M_Kasir->total_kesjiwa($id_pelayanan);
            // $ort = $this->M_Kasir->total_orthopedi($id_pelayanan);
            // $paru = $this->M_Kasir->total_paru($id_pelayanan);
            // $hd = $this->M_Kasir->total_hemodialisa($id_pelayanan);
            // $saraf = $this->M_Kasir->total_saraf($id_pelayanan);
            // $uro = $this->M_Kasir->total_urologi($id_pelayanan);
            // $ginjal = $this->M_Kasir->total_ginjal($id_pelayanan);
            // $pnm = $this->M_Kasir->total_penyakit_mulut($id_pelayanan);
            // $rehab = $this->M_Kasir->total_rehab($id_pelayanan);
            // $total_tindakan = $anak['total'] + $internis['total'] + $bedah['total'] + $fisio['total'] + $gigi['total']
            //     + $jantung['total'] + $kulit['total'] + $mata['total'] + $obgyne['total'] +  $tht['total'] + $umum['total'] +
            //     $akp['total'] + $bdm['total'] + $jiwa['total'] + $ort['total'] + $paru['total'] + $hd['total'] + $saraf['total'] 
            //     + $uro['total'] + $ginjal['total'] + $pnm['total'] + $rehab['total'] + $konsul + $igd ['total'] 
            //     + $apotik['total'] + $labor['total'] + $radio['total'];

            $out[$i] = array($no, $tgl_masuk, $pasien, $no_rm, $poli, $cara_bayar, $total);
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

    //total igd
    public function Laporan_pendapatan_igd()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_total_igd';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pendapatan_igd()
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Laporan->selectRangeLaporanTotalIgd($first_date, $second_date);
        } else {
            $page_data = $this->M_Laporan->selectLaporanTotalIgd();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);

            $id_pelayanan = $page_data[$i]->id_pelayanan;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $poli = $page_data[$i]->poli;

            $konsul = $this->M_Laporan->getKonsulIgd($id_pelayanan)->total;

            // 
            $apotik = $this->M_Kasir->total_apotik($id_pelayanan);
            $igd = $this->M_Kasir->total_igd($id_pelayanan);
            $labor = $this->M_Kasir->total_labor($id_pelayanan);
            $radio = $this->M_Kasir->total_radio($id_pelayanan);
            $anak = $this->M_Kasir->total_anak($id_pelayanan);
            $internis = $this->M_Kasir->total_internis($id_pelayanan);
            $bedah = $this->M_Kasir->total_bedah($id_pelayanan);
            $fisio = $this->M_Kasir->total_fisio($id_pelayanan);
            $gigi = $this->M_Kasir->total_gigi($id_pelayanan);
            $jantung = $this->M_Kasir->total_jantung($id_pelayanan);
            $kulit = $this->M_Kasir->total_kulit($id_pelayanan);
            $mata = $this->M_Kasir->total_mata($id_pelayanan);
            $obgyne = $this->M_Kasir->total_obgyne($id_pelayanan);
            $tht = $this->M_Kasir->total_tht($id_pelayanan);
            $umum = $this->M_Kasir->total_umum($id_pelayanan);
            $akp = $this->M_Kasir->total_akupuntur($id_pelayanan);
            $bdm = $this->M_Kasir->total_bedah_mulut($id_pelayanan);
            $jiwa = $this->M_Kasir->total_kesjiwa($id_pelayanan);
            $ort = $this->M_Kasir->total_orthopedi($id_pelayanan);
            $paru = $this->M_Kasir->total_paru($id_pelayanan);
            $hd = $this->M_Kasir->total_hemodialisa($id_pelayanan);
            $saraf = $this->M_Kasir->total_saraf($id_pelayanan);
            $uro = $this->M_Kasir->total_urologi($id_pelayanan);
            $ginjal = $this->M_Kasir->total_ginjal($id_pelayanan);
            $pnm = $this->M_Kasir->total_penyakit_mulut($id_pelayanan);
            $rehab = $this->M_Kasir->total_rehab($id_pelayanan);
            $total_tindakan = $anak['total'] + $internis['total'] + $bedah['total'] + $fisio['total'] + $gigi['total']
                + $jantung['total'] + $kulit['total'] + $mata['total'] + $obgyne['total'] +  $tht['total'] + $umum['total'] +
                $akp['total'] + $bdm['total'] + $jiwa['total'] + $ort['total'] + $paru['total'] + $hd['total'] + $saraf['total']
                + $uro['total'] + $ginjal['total'] + $pnm['total'] + $rehab['total'] + $konsul + $igd['total']
                + $apotik['total'] + $labor['total'] + $radio['total'];

            $out[$i] = array($no, $tgl_masuk, $pasien, $no_rm, $poli, $cara_bayar, $total_tindakan);
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

    //total ranap
    public function Laporan_pendapatan_ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_total_ranap';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pendapatan_ranap()
    {

        $page_data = $this->M_Laporan->selectLaporanTotalRanap();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);

            $id_pelayanan = $page_data[$i]->id_pelayanan;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $poli = $page_data[$i]->poli;

            $konsul = $this->M_Laporan->getVisiteRanap($id_pelayanan)->total;

            // 
            $apotik = $this->M_Kasir->total_apotik($id_pelayanan);
            $igd = $this->M_Kasir->total_igd($id_pelayanan);
            $labor = $this->M_Kasir->total_labor($id_pelayanan);
            $radio = $this->M_Kasir->total_radio($id_pelayanan);
            $anak = $this->M_Kasir->total_anak($id_pelayanan);
            $anak = $this->M_Kasir->total_anak($id_pelayanan);
            $internis = $this->M_Kasir->total_internis($id_pelayanan);
            $bedah = $this->M_Kasir->total_bedah($id_pelayanan);
            $fisio = $this->M_Kasir->total_fisio($id_pelayanan);
            $gigi = $this->M_Kasir->total_gigi($id_pelayanan);
            $jantung = $this->M_Kasir->total_jantung($id_pelayanan);
            $kulit = $this->M_Kasir->total_kulit($id_pelayanan);
            $mata = $this->M_Kasir->total_mata($id_pelayanan);
            $obgyne = $this->M_Kasir->total_obgyne($id_pelayanan);
            $tht = $this->M_Kasir->total_tht($id_pelayanan);
            $umum = $this->M_Kasir->total_umum($id_pelayanan);
            $akp = $this->M_Kasir->total_akupuntur($id_pelayanan);
            $bdm = $this->M_Kasir->total_bedah_mulut($id_pelayanan);
            $jiwa = $this->M_Kasir->total_kesjiwa($id_pelayanan);
            $ort = $this->M_Kasir->total_orthopedi($id_pelayanan);
            $paru = $this->M_Kasir->total_paru($id_pelayanan);
            $hd = $this->M_Kasir->total_hemodialisa($id_pelayanan);
            $saraf = $this->M_Kasir->total_saraf($id_pelayanan);
            $uro = $this->M_Kasir->total_urologi($id_pelayanan);
            $ginjal = $this->M_Kasir->total_ginjal($id_pelayanan);
            $pnm = $this->M_Kasir->total_penyakit_mulut($id_pelayanan);
            $rehab = $this->M_Kasir->total_rehab($id_pelayanan);
            $total_tindakan = $anak['total'] + $internis['total'] + $bedah['total'] + $fisio['total'] + $gigi['total']
                + $jantung['total'] + $kulit['total'] + $mata['total'] + $obgyne['total'] +  $tht['total'] + $umum['total'] +
                $akp['total'] + $bdm['total'] + $jiwa['total'] + $ort['total'] + $paru['total'] + $hd['total'] + $saraf['total']
                + $uro['total'] + $ginjal['total'] + $pnm['total'] + $rehab['total'] + $konsul + $igd['total']
                + $apotik['total'] + $labor['total'] + $radio['total'];

            $out[$i] = array($no, $tgl_masuk, $pasien, $no_rm, $poli, $cara_bayar, $total_tindakan);
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

    public function Laporan_total_kasir()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_total_kasir';
        $page_data['data_staff'] = $this->M_Laporan->selectStaff();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_total_kasir()
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $data_staff = $this->input->post('staff');

        $out = null;
        if ($this->input->post('mulai') && $this->input->post('akhir') && $this->input->post('staff')) {
            $page_data = $this->M_Laporan->selectRangeLaporanTotalKasir($first_date, $second_date, $data_staff);
            for ($i = 0; $i < count($page_data); $i++) {

                $no = $i + 1;

                $tgl_masuk = indo_date2($page_data[$i]->tgl_input);

                // $id_pelayanan = $page_data[$i]->id_pelayanan;
                $cara_bayar = $page_data[$i]->nama_bank;
                $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
                $pasien = $page_data[$i]->pasien;
                $poli = $page_data[$i]->poli;
                $total =  number_format($page_data[$i]->total, 0, ',', ',');
                // $total = $page_data[$i]->total;
                $staff = $page_data[$i]->staff;
                $keterangan = strtoupper($page_data[$i]->keterangan);

                $out[$i] = array($no, $tgl_masuk, $pasien, $no_rm, $poli, $total,  $keterangan, $cara_bayar, $staff);
            }
        } else {
            $out = null;
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
    // public function Tampil_laporan_total_kasir()
    // {
    //     $first_date = $this->input->post('mulai');
    //     $second_date = $this->input->post('akhir');
    //     $data_staff = $this->input->post('staff');
    //     if ($this->input->post('mulai') && $this->input->post('akhir') && $this->input->post('staff')) {
    //         $page_data = $this->M_Laporan->selectRangeLaporanTotalKasir($first_date, $second_date, $data_staff);
    //     } else {
    //         $page_data = $this->M_Laporan->selectRangeLaporanTotalKasir('', '', '');
    //     }

    //     $out = null;
    //     for ($i = 0; $i < count($page_data); $i++) {
    //         $no = $i + 1;

    //         $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);
    //         if ($page_data[$i]->tgl_keluar == NULL || $page_data[$i]->tgl_keluar == '0000-00-00 00:00:00') {
    //             $tgl_keluar = "-";
    //         } else {
    //             $tgl_keluar =  indo_date2($page_data[$i]->tgl_keluar);
    //         }
    //         // $id_pelayanan = $page_data[$i]->id_pelayanan;
    //         $cara_bayar = $page_data[$i]->cara_bayar;
    //         $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
    //         $pasien = $page_data[$i]->pasien;
    //         $poli = $page_data[$i]->poli;
    //         $total =  number_format($page_data[$i]->total, 0, ',', ',');
    //         // $total = $page_data[$i]->total;
    //         $staff = $page_data[$i]->staff;
    //         $keterangan = strtoupper($page_data[$i]->keterangan);



    //         $out[$i] = array($no, $tgl_masuk, $tgl_keluar, $pasien, $no_rm, $poli, $cara_bayar,$keterangan, $total, $staff);
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

    public function Laporan_pt_igd()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_penyakit_tertinggi_igd';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_pt_igd()
    {
        $page_data = $this->M_Laporan->SelectLaporanPenyakitTertinggiIgd();

        $out = null;
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Laporan->SelectLaporanRangePtIgd($first_date, $second_date);
        } else {
            $page_data = $this->M_Laporan->SelectLaporanPenyakitTertinggiIgd();
        }
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $kode = $page_data[$i]->kode;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;
            // $jenis_klaim = $page_data[$i]->jenis_klaim;
            $jumlah = $page_data[$i]->jumlah;


            $out[$i] = array($no, $kode, $nama_diagnosa, $jumlah);
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

    public function Laporan_pt_igd_ranap()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pt_igd_ranap';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_pt_igd_ranap()
    {
        $page_data = $this->M_Laporan->SelectLaporanPenyakitTertinggiIgd();

        $out = null;
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Laporan->SelectLaporanRangePtIgdRanap($first_date, $second_date);
        } else {
            $page_data = $this->M_Laporan->SelectLaporanPenyakitTertinggiIgdRanap();
        }
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $kode = $page_data[$i]->kode;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;
            // $jenis_klaim = $page_data[$i]->jenis_klaim;
            $jumlah = $page_data[$i]->jumlah;


            $out[$i] = array($no, $kode, $nama_diagnosa, $jumlah);
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

    public function Laporan_kunjungan_igd()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan_igd';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_kunjungan_igd()
    {

        $page_data = $this->M_Laporan->selectLaporanIgd();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            // $id_cara_bayar = $page_data[$i]->id_cara_bayar;
            // //var_dump($id_dokter);
            $mulai = $this->input->post('mulai');
            $akhir = $this->input->post('akhir');
            if ($mulai != '' || $akhir != '') {
                $page_data = $this->M_Laporan->selectRangeLaporanIgd($mulai, $akhir);
            } else {
                $page_data = $this->M_Laporan->selectLaporanIgd();
            }
            $cara_bayar = $page_data[$i]->jenis;
            $total = $page_data[$i]->total;



            $out[$i] = array($no, $cara_bayar, $total);
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

    public function Laporan_jasmed()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_jasmed_dokter';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_jasmed()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $page_data = $this->M_Laporan->selectLaporanRangeJasmed($first_date, $second_date, $jenis_pelayanan);

        for ($i = 0; $i < count($page_data); $i++) {
            $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);
            $tgl_keluar = indo_date2($page_data[$i]->tgl_keluar);

            $no = $i + 1;

            $no_rm = $page_data[$i]->no_rm;
            // $poli = $page_data[$i]->poli;
            $pasien = $page_data[$i]->pasien;
            $tindakan = $page_data[$i]->tindakan;
            $jasa_dokter = $page_data[$i]->jasa_dokter;
            $biaya_rs = $page_data[$i]->biaya_rs;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $dokter = $page_data[$i]->dokter;
            $total = $page_data[$i]->total;

            $out[$i] = array($no, $tgl_masuk, $tgl_keluar, $no_rm, $pasien, $tindakan,  $jasa_dokter, $biaya_rs, $total, $cara_bayar, $dokter);
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

    public function Laporan_staff_kasir()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_staff_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_staff_kasir()
    {

        $page_data = $this->M_Laporan->selectLaporanStaffKasir();

        // $page_data = $this->M_Laporan->selectLaporanStaffKasir();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $id_staff = $page_data[$i]->id_staff;
            $bpjs = $this->M_Laporan->getJumlahApotikByKasir($id_staff);
            $labor = $this->M_Laporan->getJumlahLabor($id_staff);
            $radiologi = $this->M_Laporan->getJumlahRad($id_staff);
            $jd = $this->M_Laporan->getJumlahJasdok($id_staff);
            $rs = $this->M_Laporan->getJumlahPendaftaran($id_staff);
            $ekg = $this->M_Laporan->getJumlahEkgUsg($id_staff);
            $bpjs = (!empty($bpjs)) ? $bpjs->total : 0;
            $labor = (!empty($labor)) ? $labor->total : 0;
            $radiologi = (!empty($radiologi)) ? $radiologi->total : 0;
            $jd = (!empty($jd)) ? $jd->total : 0;
            $rs = (!empty($rs)) ? $rs->total : 0;
            $ekg = (!empty($ekg)) ? $ekg->total : 0;

            // var_dump($bpjs);
            // $umum = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'UMUM');
            // $timah = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'TIMAH');
            // $mitra = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'MITRA');
            // $internal = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'INTERNAL');
            // $lainnya = $this->M_Laporan->getJumlahPasienByCB($id_dokter, 'LAINNYA');


            $dokter = $page_data[$i]->nama;
            // $bpjs = $bpjs->total;
            // $umum = $umum->total;
            // $timah = $timah->total;
            // $mitra = $mitra->total;
            // $internal = $internal->total;
            // $lainnya = $lainnya->total;

            $totalSemua = $bpjs + $labor + $radiologi + $jd + $rs + $ekg;
            $out[$i] = array($no, $dokter, $bpjs, $labor, $radiologi, $jd, $rs, $ekg, $totalSemua);
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

    public function Laporan_total_pasien()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_total_pasien';
        $page_data['data_staff'] = $this->M_Laporan->selectStaff();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_total_pasien()
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $data_staff = $this->input->post('staff');
        if ($this->input->post('mulai') && $this->input->post('akhir') && $this->input->post('staff')) {
            $page_data = $this->M_Laporan->selectRangePasienTotal($first_date, $second_date, $data_staff);
        } else {
            $page_data = $this->M_Laporan->selectRangePasienTotal('', '', '');
        }

        // $page_data = $this->M_Laporan->selectLaporanStaffKasir();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $id_pelayanan = $page_data[$i]->id_pelayanan;
            // $ranap = $this->db->query("SELECT * from pelayanan where id_pelayanan ='$id_pelayanan' and status_rawat = ''")->result();
            if ($page_data[$i]->status_rawat == 'selesai') {
                $status_rawat = '<span class="label label-danger">Check Out</span>';
            } else {
                $status_rawat = '<span class="label label-success">Dirawat</span>';
            }

            $no = $i + 1;
            $id_pelayanan = $page_data[$i]->id_pelayanan;
            $apotik = $this->M_Laporan->getJumlahApotikByPasien($id_pelayanan);
            $labor = $this->M_Laporan->total_labor($id_pelayanan);
            $radiologi = $this->M_Laporan->total_radio($id_pelayanan);
            $jd = $this->M_Laporan->getKonsul($id_pelayanan);
            $rs = $this->M_Laporan->getSaranaPasien($id_pelayanan);
            // $ekg = $this->M_Laporan->getJumlahEkgUsg($id_staff);
            $apotik = (!empty($apotik->total)) ? $apotik->total : 0;
            $labor = (!empty($labor->total)) ? $labor->total : 0;
            $radiologi = (!empty($radiologi->total)) ? $radiologi->total : 0;
            $jd = (!empty($jd->total)) ? $jd->total : 0;
            $rs = (!empty($rs->total)) ? $rs->total : 0;
            // $ekg = (!empty($ekg))?$ekg->total:0;

            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);

            if ($page_data[$i]->tgl_keluar == NULL || $page_data[$i]->tgl_keluar == '0000-00-00 00:00:00') {
                $tgl_keluar = "-";
            } else {
                $tgl_keluar =  indo_date2($page_data[$i]->tgl_keluar);
            }
            $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);
            $pasien = $page_data[$i]->pasien;
            $staff = $page_data[$i]->staff;
            $poli = $page_data[$i]->poli;

            $out[$i] = array($no, $tgl_masuk, $tgl_keluar, $pasien, $no_rm, $poli, $apotik, $labor, $radiologi, $jd, $rs, $status_rawat, $staff);
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

    public function Laporan_kunjungan_fisio()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan_fisio';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_kunjungan_fisio()
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Laporan->selectRangeLaporanFisio($first_date, $second_date);
        } else {
            $page_data = $this->M_Laporan->selectLaporanFisio();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;

            $cara_bayar = $page_data[$i]->jenis;
            $total = $page_data[$i]->total;



            $out[$i] = array($no, $cara_bayar, $total);
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

    public function Laporan_tindakan_fisio()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_tindakan_fisio';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_laporan_fisio()
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Laporan->selectDataRangeLaporanTindakanFisio($first_date, $second_date);
        } else {
            $page_data = $this->M_Laporan->selectDataLaporanTindakanFisio();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $tindakan = $page_data[$i]->tindakan;
            $total = $page_data[$i]->total;
            // $total = $data[$i]->total;
            $out[$i] = array($no, $tindakan, $total);
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

    public function Laporan_pasien_ritl()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_ritl';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_pasien_ritl()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Laporan->selectLaporanRangePasienRitl($first_date, $second_date);
        } else {
            $page_data = $this->M_Laporan->selectLaporanPasienRitl();
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);

            $no = $i + 1;


            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $ruangan = $page_data[$i]->ruangan;
            $pasien = $page_data[$i]->pasien;
            $no_bpjs = $page_data[$i]->no_bpjs;
            $no_hp = $page_data[$i]->no_hp;

            $out[$i] = array($no, $tgl_masuk, $no_rm, $pasien, $no_hp,  $no_bpjs, $ruangan);
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

    public function Laporan_pasien_rjtl()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_rjtl';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_pasien_rjtl()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Laporan->selectLaporanRangePasienRjtl($first_date, $second_date);
        } else {
            $page_data = $this->M_Laporan->selectLaporanPasienRjtl();
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);

            $no = $i + 1;


            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $ruangan = $page_data[$i]->ruangan;
            $pasien = $page_data[$i]->pasien;
            $no_bpjs = $page_data[$i]->no_bpjs;
            $no_hp = $page_data[$i]->no_hp;

            $out[$i] = array($no, $tgl_masuk, $no_rm, $pasien, $no_hp,  $no_bpjs, $ruangan);
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

    public function Laporan_triase()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_triase';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_triase()
    {
        // $page_data = $this->M_Laporan->selectKunjunganRs();

        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_IGD->selectRangeTriase($first_date, $second_date);
        } else {
            $page_data = $this->M_IGD->selectTriase();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            if ($page_data[$i]->jenis == 'Merah') {
                $jenis = '<span class="badge badge-danger">Merah</span>';
            } else if ($page_data[$i]->jenis == 'Kuning') {
                $jenis = '<span class="badge badge-warning">Kuning</span>';
            } else if ($page_data[$i]->jenis == 'Hijau') {
                $jenis = '<span class="badge badge-success">Hijau</span>';
            } else {
                $jenis = '<span class="badge badge-dark">Hitam</span>';
            }
            $jumlah = $page_data[$i]->jumlah;
            // $jenis = $page_data[$i]->jenis;
            // $jenis = (!empty($bpjs)) ? $jenis->total : 0;

            $out[$i] = array($no, $jenis, $jumlah);
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

    public function Laporan_obat_fopi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_obat_fopi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_obat_fopi()
    {
        $data = $this->session->userdata('data_auth');

        $id_pelayanan = $this->input->post('id');
        $page_data = $this->db->query("SELECT * FROM list_obat_fopi")->result();

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $nama_tindakan = $page_data[$i]->nama_obat;
            $kode_oss = $page_data[$i]->kode_oss;
            $pabrik = $page_data[$i]->pabrik;
            $zat_utama = $page_data[$i]->zat_utama;
            $zat_lain = $page_data[$i]->zat_lain;
            $sediaan = $page_data[$i]->sediaan;
            $dosis = $page_data[$i]->dosis;
            $golongan = $page_data[$i]->golongan;
            // $status = $page_data[$i]->status_pembayaran=='tidak'?'TIDAK DITANGGUNG':strtoupper($page_data[$i]->status_pembayaran);

            $out[$i] = array($no, $kode_oss, $nama_tindakan, $pabrik, $zat_utama, $zat_lain, $sediaan, $dosis, $golongan);
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
    public function dashboard()
    {
        // $this->load->view('assets/_header');
        // $page_data['page_content'] = 'page_content/IsiDashboard';
        // $this->load->view('preloader');
        $this->load->view('page_content/IsiDashboard');
        // $this->load->view('assets/_footer');
    }

    public function kunjunganPoli()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/GrafikKunjunganPoli';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function kunjunganBPJS()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/GrafikKunjunganBPJS';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function kunjunganCByr()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/GrafikCaraBayar';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function kunjunganIGD()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/GrafikKunjunganIGD';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function kunjunganRSBT()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/GrafikKununganRSBT';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function penTer()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/PenyakitTeratas';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function laporan_penunjang()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_penunjang';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_Range_penunjang()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $poli = $this->input->post('poli');

        $page_data = $this->M_Laporan->selectRangePenunjang($mulai, $akhir, $poli);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $dokter = $page_data[$i]->dokter;
            $nama_poli = $page_data[$i]->poli;
            $tindakan = $page_data[$i]->tindakan;
            $sarana = $page_data[$i]->sarana;
            $jasa = $page_data[$i]->jasa;
            $pasien = $page_data[$i]->nama;
            $tanggal = indo_date2($page_data[$i]->tanggal);

            $out[$i] = array($no, $pasien, $no_rm, $cara_bayar, $dokter, $nama_poli, $tindakan, $sarana, $jasa, $tanggal);
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

    public function laporan_operasional_penunjang()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_unit_penunjang';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_Range_penunjangOp()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $poli = $this->input->post('poli');

        $page_data = $this->M_Laporan->selectRangeOprasional($mulai, $akhir, $poli);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $dokter = $page_data[$i]->dokter;
            $nama_poli = $page_data[$i]->poli;
            $tindakan = $page_data[$i]->tindakan;
            $pasien = $page_data[$i]->pasien;
            $tanggal = indo_date2($page_data[$i]->tgl_periksa);
            $tgl_lahir = indo_date2($page_data[$i]->tgl_lahir);
            $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);

            $out[$i] = array($no, $pasien, $no_rm, $tgl_lahir, $tgl_masuk, $tindakan, $tanggal, $dokter, $cara_bayar,  $nama_poli);
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
    public function laporan_belum_checkout()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_belum_co';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_Range_belum_checkout()
    {

        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        // $poli = $this->input->post('poli');

        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Laporan->selectLaporanRangePasienBelumCO($first_date, $second_date);
        } else {
            $page_data = $this->M_Laporan->selectLaporanPasienBelumCO();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $cara_bayar = $page_data[$i]->cara_bayar;
            // $dokter = $page_data[$i]->dokter;
            $nama_poli = $page_data[$i]->poli;
            $jenis = $page_data[$i]->jenis_pelayanan;
            // $tindakan = $page_data[$i]->tindakan;
            // $pasien = $page_data[$i]->pasien;
            // $tanggal = indo_date2($page_data[$i]->tgl_periksa);
            // $tgl_lahir = indo_date2($page_data[$i]->tgl_lahir);
            $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);

            $out[$i] = array($no, $pasien, $no_rm, $tgl_masuk,$cara_bayar, $jenis,  $nama_poli);
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
