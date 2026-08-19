<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Afkir_logfar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Perencanaan');
        $this->load->model('M_Pembelian_obat');
        $this->load->model('M_Logistik_farmasi');
    }


    public function index()
    {

        $this->load->view('assets/_header');
        $max = $this->M_Perencanaan->selectNoDokumenAfkir();
        $i = 0;
        $page_data = array('max' =>  $max[$i]->max + 1,);
        $page_data['vendor'] = $this->db->get('produsen')->result_array();
        $page_data['obat'] = $this->M_Perencanaan->selectObatAfkir();
        $page_data['page_content'] = 'page_content/Afkir_logfar';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function tampil_list_faktur()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Perencanaan->getListAfkir($idFaktur);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail .  "\")'><i class='icon-trash'></i></a>";

            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $ket = $page_data[$i]->ket;
            $frek = $page_data[$i]->frek;
            $harga = $page_data[$i]->harga;
            $total = $page_data[$i]->total;

            $out[$i] = array($no, $nama_obat, $frek, $harga, $total, $ket, $hapus);
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
        $db = $this->M_Perencanaan->selectDataObatById($id_logistik);
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
        $tgl_faktur = $this->input->post('tgl_faktur');
        $tgl_input = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');


        $data = array(
            'id_faktur' => $id_faktur,
            'no_dokumen' => $no_dokumen,
            'index_dok' => $no_index,
            'jenis' => $data_staff->tipe,
            'tgl_faktur' => $tgl_faktur,
            'tgl_input' => $tgl_input,
            'id_staff' => $data_staff->id_staff
        );


        $this->M_Perencanaan->insertObat($data, 'faktur_afkir_logfar');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function updateFaktur()
    {

        $id_faktur = $this->input->post('id_faktur');
        $tgl_faktur = $this->input->post('tgl_faktur');
        $id_vendor = $this->input->post('id_vendor');
        $data = array(
            'tgl_faktur' => $tgl_faktur,
            'id_vendor' => $id_vendor,
        );

        $this->M_Perencanaan->update(['id_faktur' => $id_faktur], $data, 'faktur_afkir_logfar');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function insertObatFaktur()
    {
        $id = uniqid();
        $idFaktur = $this->input->post('idFaktur');
        $ket = $this->input->post('ket');
        $frek = $this->input->post('frek');
        $idLogistik = $this->input->post('idLogistik');
        $harga = $this->input->post('harga');
        $exp = $this->input->post('tglExp');
        $tgl = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');


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


        $this->M_Perencanaan->insertObat($data, 'detail_afkir_logfar');

        $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaan($idLogistik)->stok;

        $faktur = $this->db->get_where('faktur_afkir_logfar', ['id_faktur' => $idFaktur])->row();
        if ($faktur->jenis == 'logistik farmasi') {
            $stok_logistik = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $tgl,
                'keterangan' => 'AFKIR',
                'frek' => $frek * -1,
                'saldo' => $getStok + ($frek * -1),
                'kadaluarsa' => $exp,
                'asal_tujuan' => 'Logistik',
                'id_struk' => $id,
                'id_staff' => $data_staff->id_staff,
            );
            $this->M_Perencanaan->insertObat($stok_logistik, 'stok_logistik');
        } else {
            $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $faktur->jenis])->row();
            $stok_logistik = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $tgl,
                'keterangan' => 'AFKIR',
                'frek' => $frek * -1,
                'saldo' => $getStok + ($frek * -1),
                'kadaluarsa' => $exp,
                'asal_tujuan' => $faktur->jenis,
                'id_req' => $id,
                'id_staff' => $data_staff->id_staff,
            );
            $this->M_Perencanaan->insertObat($stok_logistik, $data_adm->stok);
        }


        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_list_faktur()
    {
        $staff = $this->session->userdata('data_auth');

        $id_detail = $this->input->post('id_detail');
        $faktur = $this->M_Perencanaan->getAfkirByIdDetail($id_detail);

        if ($faktur->jenis == 'logistik farmasi') {
            $this->M_Perencanaan->delete($id_detail, 'stok_logistik', 'id_struk');
        } else if ($faktur->jenis == 'apotik') {
            $this->M_Perencanaan->delete($id_detail, 'stok_apotik', 'id_req');
        } else if ($faktur->jenis == 'depo') {
            $this->M_Perencanaan->delete($id_detail, 'stok_depo', 'id_req');
        }

        $this->M_Perencanaan->delete($id_detail, 'detail_afkir_logfar', 'id_detail');

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_data()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai && $akhir) {
            $page_data = $this->M_Perencanaan->selectDataAfkir($mulai, $akhir);
        } else {
            $page_data = $this->M_Perencanaan->selectDataAfkir('', '');
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $label =     "<a class='btn btn-danger btn-icon-anim btn-square' href='" . base_url() . "Afkir_logfar/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";
            $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->tgl_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur .  "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-note'></i></a>";


            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;


            $out[$i] = array($no, $label, $pilih, $hapus, $edit, $no_dokumen, $tgl_input);
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
        $this->M_Perencanaan->delete($id_faktur, 'faktur_afkir_logfar', 'id_faktur');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function print_out($id_faktur)

    {
        $data['data'] = $this->M_Perencanaan->getAfkir($id_faktur);
        $data['list'] = $this->M_Perencanaan->getListAfkir($id_faktur);
        $this->load->view('print/cetak_retur', $data);
    }
    public function Laporan_afkir()
    {

        $this->load->view('assets/_header');

        $page_data['page_content'] = 'page_content/Laporan_afkir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan()
    {
        $staff = $this->session->userdata('data_auth');

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Perencanaan->selectLaporanAfkir($mulai, $akhir);
        } else {
            $page_data = $this->M_Perencanaan->selectLaporanAfkir('', '');
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
            $out[$i] = array($no, $id_logistik, $jenis, $nama, $produsen, $zat_adiktif, $high_alert, $golongan_obat, $standar, $kode, $satuan_terkecil, $harga_cost, $hargappn, $nilaidiskon, $hnadiskon, $vendor, $jml_terima, $total, $tgl, $waktu);
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
