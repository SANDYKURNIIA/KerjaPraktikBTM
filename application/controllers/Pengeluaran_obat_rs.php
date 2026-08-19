<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran_obat_rs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Pengeluaran_obat_rs');
        $this->load->model('M_Pembelian_obat');
        $this->load->model('M_Logistik_farmasi');
    }


    public function index()
    {

        $this->load->view('assets/_header');
        $max = $this->M_Pengeluaran_obat_rs->selectNoDokumenRetur();
        $i = 0;
        $page_data = array('max' =>  $max[$i]->max + 1,);
        $page_data['vendor'] = $this->db->get('produsen')->result_array();
        $page_data['obat'] = $this->M_Pengeluaran_obat_rs->selectObatRetur();
        $page_data['page_content'] = 'page_content/pengeluaran_obat_rs';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function tampil_list_faktur()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Pengeluaran_obat_rs->getListRetur($idFaktur);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail .  "\")'><i class='icon-trash'></i></a>";

            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $ket = $page_data[$i]->ket;
            $frek = $page_data[$i]->frek;
            $harga = $page_data[$i]->harga;
            $total = $page_data[$i]->total;

            $out[$i] = array($no, $nama_obat, $frek,$harga, $total, $ket, $hapus);
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

    public function getObatById()
    {
      
        $id_logistik = $this->input->post('id_logistik');
        $db = $this->M_Pengeluaran_obat_rs->selectDataObatById($id_logistik);
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
    public function insertFaktur()
    {
        $id_faktur = uniqid();
        $no_dokumen  = $this->input->post('no_dokumen');
        $no_index = $this->input->post('no_index');
        // $no_faktur = $this->input->post('no_faktur');
        $tgl_faktur = $this->input->post('tgl_faktur');
        $id_vendor = $this->input->post('id_vendor');
        $tgl_input = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');


        $data = array(
            'id_faktur' => $id_faktur,
            'no_dokumen' => $no_dokumen,
            'index_dok' => $no_index,
            'jenis' => 'logistik farmasi',
            'tgl_faktur' => $tgl_faktur,
            'id_vendor' => $id_vendor,
            'tgl_input' => $tgl_input,
            'id_staff' => $data_staff->id_staff
        );

       
        $this->M_Pengeluaran_obat_rs->insertObat($data, 'pengeluaran_obat_rs');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function insertObatFaktur()
    {
        $id = $this->input->post('id');
        $idFaktur = $this->input->post('idFaktur');
        $ket = $this->input->post('ket');
        $frek = $this->input->post('frek');
        $idLogistik = $this->input->post('idLogistik');
        $harga = $this->input->post('harga');
        $tgl = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');

        $exp = $this->db->query("SELECT kadaluarsa FROM stok_logistik 
        WHERE id_logistik = '$idLogistik' 
        ORDER BY ABS(DATEDIFF(tgl, NOW())) ASC limit 1")->row()->kadaluarsa;

        $data = array(
            'id_detail' => $id,
            'id_faktur' => $idFaktur,
            'id_list' => $idLogistik,
            'ket' => $ket,
            'frek' => $frek,
            'harga' => $harga,
            'total' => $harga * $frek,
            'tgl' => $tgl,
            'id_staff' => $data_staff->id_staff,

        );


        $this->M_Pengeluaran_obat_rs->insertObat($data, 'detail_pengeluaran_obat');

        $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaan($idLogistik)->stok;

        $stok_logistik = array(
            'id_stok' => uniqid(),
            'id_logistik' => $idLogistik,
            'tgl' => $tgl,
            'keterangan' => 'RETUR',
            'frek' => $frek * -1,
            'saldo' => $getStok + ($frek * -1),
            'kadaluarsa' => $exp,
            'asal_tujuan' => 'Logistik',
            'id_struk' => $id,
            'id_staff' => $data_staff->id_staff,
        );
        $this->M_Pengeluaran_obat_rs->insertObat($stok_logistik, 'stok_logistik');

        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_list_faktur()
    {
        $id_detail = $this->input->post('id_detail');
        $this->M_Pengeluaran_obat_rs->delete($id_detail, 'detail_pengeluaran_obat', 'id_detail');
        $this->M_Pengeluaran_obat_rs->delete($id_detail, 'stok_logistik', 'id_struk');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_data()
    {
        $page_data = $this->M_Pengeluaran_obat_rs->selectDataRetur();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $label =     "<a class='btn btn-danger btn-icon-anim btn-square' href='".base_url()."pengeluaran_obat_rs/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";
            $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur .  "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-note'></i></a>";


            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $id_vendor = $page_data[$i]->id_vendor;

            $out[$i] = array($no, $label, $pilih, $hapus, $edit,$id_vendor, $no_dokumen, $tgl_input);
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
    public function tampil_range()
    {



        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Pengeluaran_obat_rs->selectRangeRetur($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $label =     "<a class='btn btn-danger btn-icon-anim btn-square' href='".base_url()."Pengeluaran_obat_rs/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";
            $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur .  "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-note'></i></a>";

            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $id_vendor = $page_data[$i]->id_vendor;

            $out[$i] = array($no, $label, $pilih, $hapus, $edit,$id_vendor, $no_dokumen, $tgl_input);
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
    function hapus_faktur_po()
    {
        $id_faktur = $this->input->post('id_faktur');
        $this->M_Pengeluaran_obat_rs->delete($id_faktur, 'pengeluaran_obat_rs','id_faktur');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function print_out($id_faktur)
    {
        $data['data'] = $this->M_Pengeluaran_obat_rs->getRetur($id_faktur);
        $data['list'] = $this->M_Pengeluaran_obat_rs->getListRetur($id_faktur);
        $this->load->view('print/cetak_obat_keluar', $data);
    }
    
    public function Laporan()
    {

        $this->load->view('assets/_header');
        
        $page_data['page_content'] = 'page_content/Laporan_retur_logfar';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan()
    {
        $staff = $this->session->userdata('data_auth');

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Pengeluaran_obat_rs->selectLaporanRetur($mulai, $akhir);
        } else {
            $page_data = $this->M_Pengeluaran_obat_rs->selectLaporanRetur('', '');
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $id_logistik = $page_data[$i]->id_logistik;

            $satuan_terkecil = $page_data[$i]->satuan_terkecil;
            $vendor = $page_data[$i]->id_vendor;
            $jenis = $page_data[$i]->ket;
            $nama = $page_data[$i]->nama;
            $standar = $page_data[$i]->standar;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $jml_terima = abs($page_data[$i]->jml_terima);
            $zat_adiktif = $page_data[$i]->zat_adiktif;
            $high_alert = $page_data[$i]->high_alert;
            $produsen = $page_data[$i]->produsen;
            $harga_cost = $page_data[$i]->harga_cost;
            $hargappn = $page_data[$i]->harga_cost * 1.11;
            $hargappn = round($hargappn);
            $total = $hargappn * $jml_terima;

            $time = strtotime($page_data[$i]->tgl_res);
            $tgl = strftime("%d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);



            $diskon = $this->db->query("SELECT diskon_rs from detail_struk 
                 where id_logistik ='$id_logistik' ORDER BY ABS(DATEDIFF(tgl_input, NOW())) ASC limit 1");

            $nilaidiskon = (count($diskon->result()) > 0) ? round(($diskon->row()->diskon_rs / 100), 2) : 0;
            $hnadiskon = round($harga_cost * (1 - $nilaidiskon));
            $out[$i] = array($no, $id_logistik, $jenis, $nama, $produsen, $zat_adiktif, $high_alert, $golongan_obat, $standar, $kode, $satuan_terkecil, $harga_cost, $hargappn, $nilaidiskon, $hnadiskon,$vendor,$jml_terima, $total, $tgl, $waktu);
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
