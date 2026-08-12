<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfirmasi_permintaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Daftar_barang');
    }

    public function index()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Konfirmasi_permintaan';
        // $page_data['satuan'] = $this->M_Daftar_barang->getSatuan();
        // $page_data['tipe'] = $this->M_Daftar_barang->getTipe();
        // $page_data['jenis_beban'] = $this->M_Daftar_barang->getJenisBeban();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_konfirmasi_permintaan()
    {
        // $page_data = $this->M_Laporan->selectDataPasienKunjungan();
        $out = null;
        $tgl = date("Y-m-d");
        $data = $this->input->post('tanggal_masuk');

        if ($this->input->post('tanggal_masuk') && $this->input->post('tanggal_keluar') && $this->input->post('jenis_pelayanan')) {
            $first_date = $this->input->post('tanggal_masuk');
            $second_date = $this->input->post('tanggal_keluar');
            
            if ($first_date != '' || $second_date != '') {
                $page_data = $this->M_Laporan->selectDataPasienKunjungan($first_date, $second_date, $jenis_pelayanan);
            } else if ($first_date = '' || $second_date = '') {
                $page_data = $this->M_Laporan->selectDataPasienKunjungan($tgl, $tgl, '');
            }
        } else {
            $page_data = $this->M_Laporan->selectDataPasienKunjungan($tgl, $tgl, '');
        }


        for ($i = 0; $i < count($page_data); $i++) {


            $tgl_masuk = strtotime($page_data[$i]->tgl_masuk);
            $tgl_keluar = strtotime($page_data[$i]->tgl_keluar);

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $alamat = $page_data[$i]->alamat;
            $no_hp = $page_data[$i]->no_hp;
            $cara_bayar = $page_data[$i]->bayar;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $tgl_masuk =  strftime("%A, %d %B %Y ", $tgl_masuk);
            $tgl_keluar =  strftime("%A, %d %B %Y ", $tgl_keluar);


            $out[$i] = array($no, $nama, $no_rm,  $alamat, $no_hp,  $cara_bayar,  $jenis_pelayanan,  $poli, $tgl_masuk,  $tgl_keluar);
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
