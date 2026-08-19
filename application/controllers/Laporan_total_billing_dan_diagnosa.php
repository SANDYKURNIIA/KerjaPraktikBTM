<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_total_billing_dan_diagnosa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        // $this->load->model('M_Laporan');
        // $this->load->model('M_Biometri');
        // $this->load->model('M_Rawatinap');
        $this->load->model('M_Laporan_total_billing_dan_diagnosa');
    }
    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_total_billing_dan_diagnosa';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_Laporan_total_billing_dan_diagnosa()
    {
        $staff = $this->session->userdata('data_auth');

        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');

        if ($first_date != '' && $second_date != '') {
            $page_data = $this->M_Laporan_total_billing_dan_diagnosa->selectLaporanTotalBillingDanDiagnosaRange($first_date, $second_date);
        } else {
            $page_data = $this->M_Laporan_total_billing_dan_diagnosa->selectLaporanTotalBillingDanDiagnosa($tgl);
        }

        for ($i = 0; $i < count($page_data); $i++) {

            $nama_pasien= ($page_data[$i]->pasien);
            $no = $i + 1;

            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $tgl_masuk = $page_data[$i]->tgl_masuk;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $kode = $page_data[$i]->kode;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;
            $poli= $page_data[$i]->poli;
            $total_biaya = $page_data[$i]->total_bill;

            $out[$i] = array($no, $nama_pasien, $no_rm, $tgl_masuk, $cara_bayar, $kode, $nama_diagnosa, $poli, $total_biaya);
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