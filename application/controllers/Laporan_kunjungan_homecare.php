<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_kunjungan_homecare extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Kunjungan_homecare');
        // $this->load->model('M_KunjunganPoli');
    }
    public function index()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan_homecare';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_kunjungan_homecare()
    {

        $out = null;
        $tgl = date("Y-m-d");


        
        $page_data = $this->M_Kunjungan_homecare->selectDataKunjunganHomecare($tgl);
    
        for ($i = 0; $i < count($page_data); $i++) {
            if ($page_data[$i]->status_bayar == 1) {
                $bayar = "<span class='label label-success capitalize-font inline-block'>SUDAH BAYAR<i class=''></i><span>";
            } else {
                $bayar = "<span class='label label-warning capitalize-font inline-block'>BELUM BAYAR<i class=''></i><span>";
            }

            $tgl_masuk = strtotime($page_data[$i]->tanggal);
            $tanggal = strftime(" %d %B %Y ",$tgl_masuk);
            // $tgl_keluar = strtotime($page_data[$i]->tgl_keluar);

            $tgl_lahir = strtotime($page_data[$i]->tgl_lahir);
            $no = $i + 1;
            // $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tempat_lahir = $page_data[$i]->tempat_lahir;
            $tgl_lahir = strftime(" %d %B %Y ", $tgl_lahir);
            $jk = $page_data[$i]->jk;
            $no_hp = $page_data[$i]->no_hp;
            $alamat = $page_data[$i]->alamat;
            // $kecamatan = $page_data[$i]->kecamatan;
            // $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            // $poli = $page_data[$i]->poli;
            // $nama_dokter = $page_data[$i]->nama_dokter;
            // $asal = $page_data[$i]->asal;
            // $no_sep = $page_data[$i]->no_sep;
            // $cara_bayar = $page_data[$i]->cara_bayar;
            // $kode = $page_data[$i]->id_pelayanan;

            // $status_rawat = strtoupper($page_data[$i]->status_rawat);

            $out[$i] = array($no, $tanggal, $nama, $tempat_lahir,$tgl_lahir,  $jk, $no_hp,$alamat,$bayar);
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
    public function tampil_kunjungan_homecare_range()
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');

        $page_data = $this->M_Kunjungan_homecare->selectKunjunganHomecareRange($first_date, $second_date);
        $out = null;


        for ($i = 0; $i < count($page_data); $i++) {
            if ($page_data[$i]->status_bayar == 1) {
                $bayar = "<span class='label label-success capitalize-font inline-block'>SUDAH BAYAR<i class=''></i><span>";
            } else {
                $bayar = "<span class='label label-warning capitalize-font inline-block'>BELUM BAYAR<i class=''></i><span>";
            }

            $tanggal = strtotime($page_data[$i]->tanggal);
            $tanggal = strftime(" %d %B %Y ",$tanggal);
            
            // $tgl_keluar = strtotime($page_data[$i]->tgl_keluar);

            $tgl_lahir = strtotime($page_data[$i]->tgl_lahir);
            $no = $i + 1;
            // $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tempat_lahir = $page_data[$i]->tempat_lahir;
            $tgl_lahir = strftime(" %d %B %Y ", $tgl_lahir);
            $jk = $page_data[$i]->jk;
            $no_hp = $page_data[$i]->no_hp;
            $alamat = $page_data[$i]->alamat;
            // $kecamatan = $page_data[$i]->kecamatan;
            // $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            // $poli = $page_data[$i]->poli;
            // $nama_dokter = $page_data[$i]->nama_dokter;
            // $asal = $page_data[$i]->asal;
            // $no_sep = $page_data[$i]->no_sep;
            // $cara_bayar = $page_data[$i]->cara_bayar;
            // $kode = $page_data[$i]->id_pelayanan;

            // $status_rawat = strtoupper($page_data[$i]->status_rawat);

            $out[$i] = array($no, $tanggal, $nama, $tempat_lahir,$tgl_lahir,  $jk, $no_hp,$alamat, $bayar);
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
