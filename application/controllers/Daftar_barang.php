<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_barang extends CI_Controller
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
        $page_data['page_content'] = 'page_content/Daftar_barang';
        $page_data['satuan'] = $this->M_Daftar_barang->getSatuan();
        $page_data['tipe'] = $this->M_Daftar_barang->getTipe();
        $page_data['jenis_beban'] = $this->M_Daftar_barang->getJenisBeban();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_master_barang()
    {
        $page_data = $this->M_Daftar_barang->selectDataMasterBarang();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $edit ="<button class='btn btn-success btn-icon-anim btn-square' onclick='tampilEditBarang(\"" . $page_data[$i]->id_list ."\")'  ><i class='icon-pencil'></i></button>";
            $mutasi ="<button class='btn btn-warning btn-icon-anim btn-square' onclick='tampilKunjungan(\"" . $page_data[$i]->id_list ."\")'  ><i class='icon-arrow-up-circle'></i></button>";   
            $pembelian = "<button class='btn btn-danger btn-icon-anim btn-square' onclick='tampilKunjunganPembelian(\"" . $page_data[$i]->id_list ."\")'  ><i class='icon-basket-loaded'></i></button>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $satuan = $page_data[$i]->satuan;
            $tipe = $page_data[$i]->tipe;
            $harga ="Rp. ". number_format($page_data[$i]->harga);
            $jenis_beban = $page_data[$i]->jenis_beban;
            $status = $page_data[$i]->status;

            $out[$i] = array($edit, $mutasi, $pembelian, $no, $nama, $satuan, $tipe, $harga, $jenis_beban, $status);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }
    public function tambah_barang(){
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $golongan = $this->input->post('golongan');
        $tipe = $this->input->post('tipe');
        $harga = $this->input->post('harga');
        $jenis = $this->input->post('jenis');

        $data = array(
            'id_list' => $id,
            'nama' => $nama,
            'satuan' => $tipe,
            'harga' => $harga,
            'tipe' => $golongan,
            'jenis_beban' => $jenis,
            'status' => 'AKTIF',
        );
        $out['status']="success";
        $this->M_Daftar_barang->insert_barang($data);
        echo json_encode($out);
    }
    public function getDataBarang()
    {
        $id_list = $this->input->post('id_list');
        $db = $this->M_Daftar_barang->selectDataById($id_list);
     
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    public function edit_barang(){
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $golongan = $this->input->post('golongan');
        $tipe = $this->input->post('tipe');
        $harga = $this->input->post('harga');
        $jenis = $this->input->post('jenis');

        $data = array(
            'nama' => $nama,
            'satuan' => $tipe,
            'harga' => $harga,
            'tipe' => $golongan,
            'jenis_beban' => $jenis,
            'status' => 'AKTIF',
        );
        $out['status']="success";
        $this->M_Daftar_barang->update_barang($id, $data);
        echo json_encode($out);
    }
    public function tampil_mutasi()
    {
        $id_list = $this->input->post('id_list');
        $page_data = $this->M_Daftar_barang->getMutasi($id_list);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $ket ="MUTASI";
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $frek = $page_data[$i]->frek;
            $satuan = $page_data[$i]->satuan;
            $jenis_beban = $page_data[$i]->jenis_beban;
            $harga = $page_data[$i]->harga;
            $abs = $harga * $frek;
            $time = strtotime($page_data[$i]->tgl);
            $date = strftime("%A, %d %B %Y ", $time);
           
            $tgl = $date;

            $out[$i] = array($no, $ket, $nama,  $tipe,  $frek,  $satuan,  $jenis_beban, $harga, $abs, $tgl);
        }

        if ($out == null || $out == "") {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function tampil_pembelian()
    {
        $id_list = $this->input->post('id_list');
        $page_data = $this->M_Daftar_barang->getPembelian($id_list);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $no_dok =$page_data[$i]->no_dokumen;
            $no_fak = $page_data[$i]->no_faktur;
            $vendor = $page_data[$i]->vendor;
            $nama = $page_data[$i]->nama;
            $satuan = $page_data[$i]->satuan;
            $jumlah = $page_data[$i]->jumlah;
            $sisa ='';
            $harga = $page_data[$i]->harga;
            $diskon = $page_data[$i]->diskon;
            $ppn = $page_data[$i]->ppn;
            $total = $page_data[$i]->total;
            $time = strtotime($page_data[$i]->tgl_faktur);
            $date = strftime("%A, %d %B %Y ", $time);
           
            $tgl = $date;

            $out[$i] = array($no, $no_dok, $no_fak,  $vendor,  $nama,  $satuan,  $jumlah, $jumlah, $sisa, $harga, $diskon, $ppn, $total, $tgl);
        }

        if ($out == null || $out == "") {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
}
