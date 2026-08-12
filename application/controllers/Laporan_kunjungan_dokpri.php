<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_kunjungan_dokpri extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        // $this->load->model('M_Laporan');
        // $this->load->model('M_Kunjungan_ranap');
        $this->load->model('M_Kunjungan_dokpri');
    }
    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan_dokpri';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_kunjungan_dokpri()
    {
        $staff = $this->session->userdata('data_auth');

        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');

        if ($first_date != '' && $second_date != '') {
            $page_data = $this->M_Kunjungan_dokpri->selectLaporanRangeKunjunganDokpri($first_date, $second_date);
        } else {
            $page_data = $this->M_Kunjungan_dokpri->selectLaporanKunjunganDokpri($tgl);
        }

        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $nama_dokter = $page_data[$i]->dokter;
            $jumlah_kunjungan = $page_data[$i]->jumlah;
        

            $out[$i] = array($no, $nama_dokter, $jumlah_kunjungan);
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
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_kunjungan_dokpri extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        // $this->load->model('M_Laporan');
        // $this->load->model('M_Kunjungan_ranap');
        $this->load->model('M_Kunjungan_dokpri');
    }
    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan_dokpri';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_kunjungan_dokpri()
    {
        $staff = $this->session->userdata('data_auth');

        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');

        if ($first_date != '' && $second_date != '') {
            $page_data = $this->M_Kunjungan_dokpri->selectLaporanRangeKunjunganDokpri($first_date, $second_date);
        } else {
            $page_data = $this->M_Kunjungan_dokpri->selectLaporanKunjunganDokpri($tgl);
        }

        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $nama_dokter = $page_data[$i]->dokter;
            $jumlah_kunjungan = $page_data[$i]->jumlah;
        

            $out[$i] = array($no, $nama_dokter, $jumlah_kunjungan);
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
}