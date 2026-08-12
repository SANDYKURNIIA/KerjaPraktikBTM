<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanMaterial_Scm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Laporan_farmasi');
    }

    public function Laporan_scm($tipe)
    {
        $this->load->view('assets/_header');
        // $data = $this->session->userdata('data_auth');
        // $tipe = $data->tipe;
        $page_data['page_content'] = 'page_content/Material_scm';
        $page_data['tipe'] = $tipe;
        $page_data['url'] = 'LaporanMaterial_Scm/Tampil_laporan_material';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_material()
    {
        $data_staff = $this->session->userdata('data_auth');

        $periode = $this->input->post('periode');
        $tipe = $this->input->post('tipe');
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $data_staff->tipe])->row();
        $stok = $data_adm->stok;
        // $stok = 'stok_logistik';
        if ($tipe == 'material') {
            $page_data = $this->M_Laporan_farmasi->selectLaporan_Material($periode, $stok);
        } else {
            $page_data = $this->M_Laporan_farmasi->selectLaporan_Obat($periode, $stok);
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $id_logistik = $page_data[$i]->id_logistik;
            $nama = $page_data[$i]->nama;
            $satuan_terkecil = $page_data[$i]->satuan_terkecil;

            $standar = $page_data[$i]->standar;
            $kode = $page_data[$i]->kode;

            $stok_awal =  $page_data[$i]->awal;
            $penerimaan =  $page_data[$i]->masuk;
            $pengeluaran =  abs($page_data[$i]->keluar);
            $stok_akhir =  $page_data[$i]->akhir;



            // $tgl_faktur = $tgl_faktur;

            $out[$i] = array($id_logistik, $kode, $standar, $nama, $satuan_terkecil, $stok_awal, $penerimaan, $pengeluaran, $stok_akhir);
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
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanMaterial_Scm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Laporan_farmasi');
    }

    public function Laporan_scm($tipe)
    {
        $this->load->view('assets/_header');
        // $data = $this->session->userdata('data_auth');
        // $tipe = $data->tipe;
        $page_data['page_content'] = 'page_content/Material_scm';
        $page_data['tipe'] = $tipe;
        $page_data['url'] = 'LaporanMaterial_Scm/Tampil_laporan_material';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_material()
    {
        $data_staff = $this->session->userdata('data_auth');

        $periode = $this->input->post('periode');
        $tipe = $this->input->post('tipe');
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $data_staff->tipe])->row();
        $stok = $data_adm->stok;
        // $stok = 'stok_logistik';
        if ($tipe == 'material') {
            $page_data = $this->M_Laporan_farmasi->selectLaporan_Material($periode, $stok);
        } else {
            $page_data = $this->M_Laporan_farmasi->selectLaporan_Obat($periode, $stok);
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $id_logistik = $page_data[$i]->id_logistik;
            $nama = $page_data[$i]->nama;
            $satuan_terkecil = $page_data[$i]->satuan_terkecil;

            $standar = $page_data[$i]->standar;
            $kode = $page_data[$i]->kode;

            $stok_awal =  $page_data[$i]->awal;
            $penerimaan =  $page_data[$i]->masuk;
            $pengeluaran =  abs($page_data[$i]->keluar);
            $stok_akhir =  $page_data[$i]->akhir;



            // $tgl_faktur = $tgl_faktur;

            $out[$i] = array($id_logistik, $kode, $standar, $nama, $satuan_terkecil, $stok_awal, $penerimaan, $pengeluaran, $stok_akhir);
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
