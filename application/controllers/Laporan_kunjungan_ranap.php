<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_kunjungan_ranap extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Laporan');
        $this->load->model('M_Kunjungan_ranap');
        $this->load->model('M_Rawatinap');
    }
    public function index()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan_ranap';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_kunjungan_ranap()
    {
        $staff = $this->session->userdata('data_auth');

        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');

        if($staff->tipe =='rawatjalan'){
            $tipe='POLI';
        }else if($staff->tipe =='igd'){
            $tipe='IGD';
        }else if($staff->tipe =='rawatinap' && $staff->username =='20061021'){
            $tipe='IGD';
        }else{
            $tipe='';
        }

        if ($first_date != '' && $second_date != '') {
            $page_data = $this->M_Kunjungan_ranap->selectDataKunjunganRanapRange($first_date, $second_date,$tipe);
        } else {
            $page_data = $this->M_Kunjungan_ranap->selectDataKunjunganRanap($tgl,$tipe);
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
            if ($page_data[$i]->tgl_keluar == null) {
                $tgl_keluar = '-';
            } else {
                $tgl_keluar =  strftime("%A, %d %B %Y ", $tgl_keluar);
            }


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
            $no_sep = $page_data[$i]->no_sep;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $kode = $page_data[$i]->id_pelayanan;

            $nama_diagnosa = $this->M_Laporan->cek_id($page_data[$i]->id_pelayanan);
            //$diagnosa = ($nama_diagnosa['nama_diagnosa'] != null || $nama_diagnosa['nama_diagnosa'] !="")?$nama_diagnosa['nama_diagnosa']:'-' ;

            $diagnosa = $page_data[$i]->diagnosa;
            $status_rawat = strtoupper($page_data[$i]->status_rawat);

            $out[$i] = array($no, $tgl_masuk, $tgl_keluar, $durasi, $no_rm, $nama,  $jenis_kelamin, $tgl_lahir, $usia, $hasil, $alamat, $kecamatan,  $jenis_pelayanan, $poli,  $nama_dokter,  $asal, $no_sep, $cara_bayar,   $diagnosa, $status_rawat);
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

    public function Laporan_pengisian_ranap()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pengisian_ranap';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_pengisian_ranap()
    {

        $out = null;
        $tgl = date("Y-m-d");

        $page_data = $this->M_Rawatinap->selectDataPasienRanap();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {


            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%d %B %Y ", $time);

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
            $tgl_masuk = $date2 . ' ' . $waktu;

            $ruang = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;

            $dokter = $page_data[$i]->nama_dokter;

            $total_visit = number_format($this->M_Kunjungan_ranap->total_visit($page_data[$i]->id_pelayanan)->total, 0, ',', '.');
            $total_tindakan = number_format($this->M_Kunjungan_ranap->total_apelkes($page_data[$i]->id_pelayanan)->total, 0, ',', '.');
            $total_apotik = number_format($this->M_Kunjungan_ranap->total_apotik($page_data[$i]->id_history)->total, 0, ',', '.');


            $out[$i] = array($no, $no_rm, $nama, $tgl_masuk, $dokter,  $ruang,  $cara_bayar, $total_visit, $total_tindakan, $total_apotik);
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
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_kunjungan_ranap extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Laporan');
        $this->load->model('M_Kunjungan_ranap');
        $this->load->model('M_Rawatinap');
    }
    public function index()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan_ranap';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_kunjungan_ranap()
    {
        $staff = $this->session->userdata('data_auth');

        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');

        if($staff->tipe =='rawatjalan'){
            $tipe='POLI';
        }else if($staff->tipe =='igd'){
            $tipe='IGD';
        }else if($staff->tipe =='rawatinap' && $staff->username =='20061021'){
            $tipe='IGD';
        }else{
            $tipe='';
        }

        if ($first_date != '' && $second_date != '') {
            $page_data = $this->M_Kunjungan_ranap->selectDataKunjunganRanapRange($first_date, $second_date,$tipe);
        } else {
            $page_data = $this->M_Kunjungan_ranap->selectDataKunjunganRanap($tgl,$tipe);
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
            if ($page_data[$i]->tgl_keluar == null) {
                $tgl_keluar = '-';
            } else {
                $tgl_keluar =  strftime("%A, %d %B %Y ", $tgl_keluar);
            }


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
            $no_sep = $page_data[$i]->no_sep;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $kode = $page_data[$i]->id_pelayanan;

            $nama_diagnosa = $this->M_Laporan->cek_id($page_data[$i]->id_pelayanan);
            //$diagnosa = ($nama_diagnosa['nama_diagnosa'] != null || $nama_diagnosa['nama_diagnosa'] !="")?$nama_diagnosa['nama_diagnosa']:'-' ;

            $diagnosa = $page_data[$i]->diagnosa;
            $status_rawat = strtoupper($page_data[$i]->status_rawat);

            $out[$i] = array($no, $tgl_masuk, $tgl_keluar, $durasi, $no_rm, $nama,  $jenis_kelamin, $tgl_lahir, $usia, $hasil, $alamat, $kecamatan,  $jenis_pelayanan, $poli,  $nama_dokter,  $asal, $no_sep, $cara_bayar,   $diagnosa, $status_rawat);
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

    public function Laporan_pengisian_ranap()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pengisian_ranap';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_pengisian_ranap()
    {

        $out = null;
        $tgl = date("Y-m-d");

        $page_data = $this->M_Rawatinap->selectDataPasienRanap();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {


            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%d %B %Y ", $time);

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
            $tgl_masuk = $date2 . ' ' . $waktu;

            $ruang = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;

            $dokter = $page_data[$i]->nama_dokter;

            $total_visit = number_format($this->M_Kunjungan_ranap->total_visit($page_data[$i]->id_pelayanan)->total, 0, ',', '.');
            $total_tindakan = number_format($this->M_Kunjungan_ranap->total_apelkes($page_data[$i]->id_pelayanan)->total, 0, ',', '.');
            $total_apotik = number_format($this->M_Kunjungan_ranap->total_apotik($page_data[$i]->id_history)->total, 0, ',', '.');


            $out[$i] = array($no, $no_rm, $nama, $tgl_masuk, $dokter,  $ruang,  $cara_bayar, $total_visit, $total_tindakan, $total_apotik);
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
