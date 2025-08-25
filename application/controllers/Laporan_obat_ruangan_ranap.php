<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_obat_ruangan_ranap extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Laporan_obat_ruangan_ranap');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_obat_ruangan_ranap';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_laporan_obat_ruangan_ranap()
    {
        $staff = $this->session->userdata('data_auth');

        $out = array();
        $tanggal = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');

        $tipe = $this->input->post('tipe') ?? null;

        if ($first_date != '' && $second_date != '') {
            $page_data = $this->M_Laporan_obat_ruangan_ranap->selectLaporanObatRuanganRanapRange($first_date, $second_date);
        } else {
            $page_data = $this->M_Laporan_obat_ruangan_ranap->selectLaporanObatRuanganRanap($tanggal);
        }

        if (!empty($page_data)) {
            for ($i = 0; $i < count($page_data); $i++) {
                $tanggal = ($page_data[$i]->tanggal);
                // $tanggal = indo_date2($page_data[$i]->tanggal);
                $nama_obat = $page_data[$i]->nama_obat;
                $kode_obat = $page_data[$i]->kode_obat;
                $jumlah = $page_data[$i]->jumlah;
                $hna_ppn = $page_data[$i]->hna_ppn;
                $hna = $page_data[$i]->hna;
                $staff_req = $page_data[$i]->staff_req;
                $ruangan = $page_data[$i]->ruangan;
                $unit = $page_data[$i]->unit;
                $staff_acc = $page_data[$i]->staff_acc;
                $no = $i + 1;

                $out[$i] = array($no, $tanggal, $nama_obat, $kode_obat, $jumlah, $hna, $hna_ppn, $staff_req, $ruangan, $unit, $staff_acc);
            }
            $page_data['data'] = $out;
            echo json_encode($page_data);
        } else {
            echo '{"data":""}';
        }
        exit;
    }
}
