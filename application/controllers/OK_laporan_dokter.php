<?php
defined('BASEPATH') or exit('No direct script access allowed');
class OK_laporan_dokter extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_OK_pasien');
    }

    public function index()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_dokter_ok';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data()
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($this->input->post('tipe') == 'range') {
            $page_data = $this->M_OK_pasien->selectLaporanDokRange($this->input->post('mulai'), $this->input->post('akhir'));
        } else {
            $page_data = $this->M_OK_pasien->selectLaporanDok();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
           
            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            // $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->pasien;
            $tgl_masuk = $date2;
           
            $tipe = $page_data[$i]->tipep;
            $kelas_ruangan = $page_data[$i]->kelas_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $tindakan = $page_data[$i]->namat;
            $diagnosa = $page_data[$i]->diagnosa;
            $jenis = $page_data[$i]->jenis;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no,$nama, $tipe, $dokter, $diagnosa,   $kelas_ruangan, $tindakan, $jenis, $keterangan, $tgl_masuk);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $print['data'] = $out;
            echo json_encode($print);
            exit;
        }
    }
    public function kunjungan()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan_ok';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_kunjungan()
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($this->input->post('tipe') == 'range') {
            $page_data = $this->M_OK_pasien->selectLaporanKunjunganRange($this->input->post('mulai'), $this->input->post('akhir'));
        } else {
            $page_data = $this->M_OK_pasien->selectLaporanKunjungan();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
           
            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            // $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->pasien;
            $tgl_masuk = $date2;
           
           
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no,$nama, $diagnosa, $tgl_masuk);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $print['data'] = $out;
            echo json_encode($print);
            exit;
        }
    }
    
}
