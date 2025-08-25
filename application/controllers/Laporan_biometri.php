<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_biometri extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        // $this->load->model('M_Laporan');
        // $this->load->model('M_Biometri');
        // $this->load->model('M_Rawatinap');
        $this->load->model('M_Biometri');
    }
    public function index()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_biometri';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_laporan_biometri()
    {
        $staff = $this->session->userdata('data_auth');

        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');

        if ($first_date != '' && $second_date != '') {
            $page_data = $this->M_Biometri->selectLaporanBiometriRange($first_date, $second_date);
        } else {
            $page_data = $this->M_Biometri->selectLaporanBiometri($tgl);
        }

        for ($i = 0; $i < count($page_data); $i++) {

            $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk) . ', ' . date('H:i:s',strtotime($page_data[$i]->tgl_masuk));
            $no = $i + 1;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $nama_tindakan = $page_data[$i]->tindakan;
            $dokter = $page_data[$i]->dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;

            $out[$i] = array($no, $pasien,$no_rm,$tgl_masuk, $nama_tindakan, $dokter, $cara_bayar);
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