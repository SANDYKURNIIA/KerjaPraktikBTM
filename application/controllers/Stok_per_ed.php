<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_per_ed extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Stok_per_ed');
       
    }

    public function index()
    {
        
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Stok_per_ed';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');

    }

    public function tampil_stok_obat(){
        $page_data = $this->M_Stok_per_ed->selectStokpered();
        $out=null;
        for ($i=0; $i < count($page_data); $i++) { 

        $no=$i+1;
        $nama=$page_data[$i]->nama;
        $harga_cost = "Rp. " . number_format($page_data[$i]->harga_cost, 0, ',', '.');
        $time = $page_data[$i]->kadaluarsa;
        $golongan_obat=$page_data[$i]->golongan_obat;
        $produsen=$page_data[$i]->produsen;
        $frek=number_format($page_data[$i]->stok);
        $tipe=$page_data[$i]->tipe;

            $out[$i]=array($no,$nama,$harga_cost,$time,$golongan_obat,$produsen,$frek,$tipe,);
        }
                $page_data['data']=$out;
                echo json_encode($page_data);
    }

}
?>