<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layar_farmasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Layar_farmasi');
    }

    public function index()
    {
        $this->load->view('assets/_header');
       
        $data['farmasi'] = $this->M_Layar_farmasi->getAntrianFarmasi();
        $play = $this->M_Layar_farmasi->selectPlay();
        

        if (isset($play)) {
            $data['data'] = $play;
        } else {
            $data['data'] = [
                'no' => '',
                'nama' => '',
            ];
        }
        $this->load->view('Layar_farmasi', $data);
        $this->load->view('assets/_footer');
    }

    public function deleteSuara()
    {
        $this->M_Layar_farmasi->deleteplaySuara('temp_antrian_rm');
        $out['status'] = "ok";
        echo json_encode($out);
    }
}
