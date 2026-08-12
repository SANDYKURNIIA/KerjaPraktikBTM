<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_diagnosa_diare extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_diagnosa_diare');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_diagnosa_diare';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    

    public function tampil_data_diagnosa_diare()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($mulai != '' || $akhir != '') {
            $page_data = $this->M_diagnosa_diare->selectRangeDiagnosaDiare($mulai, $akhir);
        } else {
            $page_data = $this->M_diagnosa_diare->selectDiagnosaDiare();
        }

        $out = null;
        if(!empty($page_data)){
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $no_rm = "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $nama_poli = $page_data[$i]->poli;
            $jenis = $page_data[$i]->jenis_pelayanan;
            $diagnosa = $page_data[$i]->nama_diagnosa;
            $kode = $page_data[$i]->kode;
            $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);

            $out[$i] = array($no, $pasien, $no_rm, $tgl_masuk, $jenis, $nama_poli,$kode,$diagnosa);
    }
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
