<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanObat_Scm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

    }

    public function index()
    {
        $this->load->view('assets/_header');
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        $page_data['page_content'] = 'page_content/Obat_scm';
    
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
}