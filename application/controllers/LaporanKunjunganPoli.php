<?php
defined('BASEPATH') or exit('No direct script access allowed');
class LaporanKunjunganPoli extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Laporan');
        $this->load->model('M_KunjunganPoli');
    }
    public function index()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/LaporanKunjunganPoli';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_kunjungan_poli()
    {

        $out = null;
        $tgl = date("Y-m-d");


        
        $page_data = $this->M_KunjunganPoli->selectDataKunjunganPoli($tgl);
    
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
            if($page_data[$i]->tgl_keluar == null){
                $tgl_keluar = '-';
            }else{
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
            $diagnosa = $page_data[$i]->diagnosa;

            $nama_diagnosa = $this->M_Laporan->cek_id($page_data[$i]->id_pelayanan);
            // $diagnosa = $nama_diagnosa['nama_diagnosa'];
            $status_rawat = strtoupper($page_data[$i]->status_rawat);

            $out[$i] = array($no, $tgl_masuk, $tgl_keluar, $durasi, $no_rm, $nama,  $jenis_kelamin, $tgl_lahir, $usia, $hasil, $alamat, $kecamatan,  $jenis_pelayanan, $poli,  $nama_dokter,  $asal, $no_sep, $cara_bayar,   $diagnosa,$status_rawat);
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
    public function tampil_data_kunjungan_poliRange()
    {



        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');

        $page_data = $this->M_KunjunganPoli->selectDataKunjunganPoliRange($first_date, $second_date);
        $out = null;


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
            if($page_data[$i]->tgl_keluar == null){
                $tgl_keluar = '-';
            }else{
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
            $diagnosa = $page_data[$i]->diagnosa;
            $kode = $page_data[$i]->id_pelayanan;

            // $nama_diagnosa = $this->M_Laporan->cek_id($page_data[$i]->id_pelayanan);
            // $diagnosa = $nama_diagnosa['nama_diagnosa'];
            $status_rawat = strtoupper($page_data[$i]->status_rawat);
            
            $out[$i] = array($no, $tgl_masuk, $tgl_keluar, $durasi, $no_rm, $nama,  $jenis_kelamin, $tgl_lahir, $usia, $hasil, $alamat, $kecamatan,  $jenis_pelayanan, $poli,  $nama_dokter,  $asal, $no_sep, $cara_bayar,   $diagnosa,$status_rawat);
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

    public function Laporan_waktu_tunggu_poli()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_waktu_tunggu_poli';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_waktu_tunggu_poli()
    {
        $staff = $this->session->userdata('data_auth');

        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');

        if ($first_date != '' && $second_date != '') {
            $page_data = $this->M_KunjunganPoli->selectRangeWaktuTunggu($first_date, $second_date);
        } else {
            $page_data = $this->M_KunjunganPoli->selectDataWaktuTunggu($tgl);
        }

        for ($i = 0; $i < count($page_data); $i++) {

            $tanggalperiksa = indo_date2($page_data[$i]->tanggalperiksa);
            $no = $i + 1;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $no_bpjs = $page_data[$i]->no_bpjs;
            $no_ktp = $page_data[$i]->no_ktp;
            $no_hp = $page_data[$i]->no_hp;
            $poli = $page_data[$i]->poli;
            $namadokter = $page_data[$i]->namadokter;
            $waktu_rs_task3 = $page_data[$i]->waktu_rs_task3;
            $waktu_rs_task4 = $page_data[$i]->waktu_rs_task4;
            $waktu_rs_task5 = $page_data[$i]->waktu_rs_task5;


            $out[$i] = array($no, $tanggalperiksa, $no_rm, $pasien, $no_bpjs,$no_ktp,$no_hp,$poli, $namadokter, $waktu_rs_task3,$waktu_rs_task4,$waktu_rs_task5);
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
