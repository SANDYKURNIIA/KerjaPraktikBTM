<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ApotekLuar_ObatScm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Laporan_farmasi');
    }

    public function Menu($tipe)
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Apotek_LuarScm';
        $page_data['tipe'] = $tipe;
        $page_data['url'] = 'ApotekLuar_ObatScm/Tampil_laporan_apotik_luar';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_apotik_luar()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");

        $periode = $this->input->post('periode');
        $tipe = $this->input->post('tipe');


        $page_data = $this->M_Laporan_farmasi->select_laporan_apotik_luar($periode, $tipe);


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i+1;

            $apotek = $page_data[$i]->id_produsen;
            $tgl = indo_date2($page_data[$i]->tgl_input);
            $nama = $page_data[$i]->nama;
            $zat_aktif = $page_data[$i]->zat_aktif;
            $zat_lain = $page_data[$i]->zat_lain;
            $kelas="";
            $subkelas="";
            $produsen = $page_data[$i]->produsen;
            $satuan_terkecil = $page_data[$i]->satuan_terkecil;

            $frek = $page_data[$i]->frek;
            $harga_beli = "Rp " . number_format($page_data[$i]->harga_beli, 0, ',', '.');
            $justif="";

            $out[$i] = array($no, $apotek, $tgl, $nama,$zat_aktif,$zat_lain,$kelas,$subkelas,$produsen, $satuan_terkecil,$frek,$harga_beli,$justif);
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
