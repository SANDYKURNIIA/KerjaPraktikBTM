<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_kasir extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Laporan_pendapatan');
    }
    public function Cetak_pendapatan_harian()

    {
        
        $staff = $this->input->post('staff');
        $tgl = date('Y-m-d', strtotime($this->input->post('tgl')));
        $data['data'] = $this->M_Laporan_pendapatan->getPendapatanByStaffTgl($staff, $tgl);
        $response = $this->load->view('print/cetak_pendapatan_kasir', $data, TRUE);
        echo $response;
    }

    public function Cetak_pendapatan_harian_tes()

    {
        
        $staff = 'STF21888';
        $tgl = '2024-04-25';
        $data['data'] = $this->M_Laporan_pendapatan->getPendapatanByStaffTgl($staff, $tgl);
        $response = $this->load->view('print/cetak_pendapatan_kasir_tes', $data, TRUE);
        echo $response;
    }
}
