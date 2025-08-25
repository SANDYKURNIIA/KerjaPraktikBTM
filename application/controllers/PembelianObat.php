<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PembelianObat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_PembelianObat');
    }

    public function Riwayat()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/RiwayatOne';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_Riwayat()
    {
        $page_data = $this->M_PembelianObat->selectRiwayat();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $harga_cost = $page_data[$i]->harga_cost;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $produsen = $page_data[$i]->produsen;
            $frek = $page_data[$i]->frek;
            $tipe = $page_data[$i]->tipe;

            $out[$i] = array( $no,  $nama, $harga_cost, $golongan_obat, $produsen, $frek, $tipe);
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

}
