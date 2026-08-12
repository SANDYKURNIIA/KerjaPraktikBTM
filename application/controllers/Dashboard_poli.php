<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_poli extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        // $this->load->model('M_Apotik');
        // $this->load->model('M_Logistik_farmasi');
        // $this->load->model('M_Laporan_farmasi');
    }

    public function dashboard_pp(){
        $this->load->view('assets/_header');
        $this->load->view('page_content/IsiDashboard');
        $this->load->view('assets/_footer');
    }

    public function index(){
        $this->load->view('page_content/Portal_dashboard');
    }


}