<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Billing_ListingObat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Laporan_farmasi');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        $page_data['page_content'] = 'page_content/Billing_ListingObat';
        $page_data['url'] = 'Billing_ListingObat/Tampil_laporan_material';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_material()
    {
        $data_staff = $this->session->userdata('data_auth');

        $periode = $this->input->post('periode');

        $page_data = $this->M_Laporan_farmasi->selectLaporan_BillingListingObat($periode);


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $id_logistik = $page_data[$i]->kode_sibatik;
            $nama = $page_data[$i]->nama;
            $hna = number_format($page_data[$i]->hna, 2, ',', '.');
            $diskon = number_format($page_data[$i]->diskon, 2, ',', '.');
            $frek = round($page_data[$i]->frek, 2);
            $harga_jual = number_format($page_data[$i]->harga_jual, 2, ',', '.');

            $produsen = $page_data[$i]->produsen;
            $penjamin = $page_data[$i]->penjamin;
            $kode = $page_data[$i]->kode;

            $out[$i] = array($no,$id_logistik, $kode,$nama, $produsen,$penjamin,$hna,$diskon,$frek,$harga_jual);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
        }
    }
}
