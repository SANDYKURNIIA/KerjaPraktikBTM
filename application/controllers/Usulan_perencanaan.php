<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usulan_perencanaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Perencanaan');
        $this->load->model('M_Pembelian_obat');
    }


    public function index()
    {

        $this->load->view('assets/_header');
        $max = $this->M_Perencanaan->selectNoDokumenUsulan();
        $i = 0;
        $page_data = array('max' =>  $max[$i]->max + 1,);
        $page_data['vendor'] = $this->db->query('SELECT DISTINCT(produsen) produsen from list_logistik')->result_array();
        $page_data['obat'] = $this->M_Pembelian_obat->getNamaObat();
        $page_data['page_content'] = 'page_content/Usulan_perencanaan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function tampil_obat()
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Perencanaan->selectObat($first_date, $second_date);
        } else {
            $page_data = $this->M_Perencanaan->selectObat('', '');
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $id_logistik = $page_data[$i]->id_logistik;

            if ($first_date != '' || $second_date != '') {
                $penggunaan = $this->db->query("SELECT sum(frek) frek from stok_logistik where (keterangan='MUTASI' or keterangan = 'PENGELUARAN') and id_logistik ='$id_logistik' and tgl >= '$first_date' and tgl <= '$second_date'")->row()->frek;
                $stok_tersedia = $this->db->query("SELECT saldo
                FROM stok_logistik 
                WHERE id_logistik = '$id_logistik' and tgl >= '$first_date' and tgl <= '$second_date'
                order by tgl desc limit 1 ")->row()->saldo;
            } else {
                $tgl = date('Y-m-d');
                $penggunaan = $this->db->query("SELECT sum(frek) frek from stok_logistik where (keterangan='MUTASI' or keterangan = 'PENGELUARAN') and id_logistik ='$id_logistik' and tgl like '%$tgl%'")->row()->frek;
                $stok_tersedia = $this->db->query("SELECT saldo
                FROM stok_logistik 
                WHERE id_logistik = '$id_logistik' and tgl like '%$tgl%'
                order by tgl desc limit 1 ")->row()->saldo;
            }

            $no = $i + 1;
            $kode_sibatik = $page_data[$i]->id_logistik;
            $nama = $page_data[$i]->nama;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            //$penggunaan = $page_data[$i]->penggunaan;
            $penggunaan = abs($penggunaan);
            // $stok_tersedia = $page_data[$i]->stok_tersedia;
            // $stok_tersedia = abs($stok);
            $min_stok = $page_data[$i]->min_stok;
            $stok_dipenuhi = $penggunaan + $min_stok;
            $rekom = $stok_dipenuhi - $stok_tersedia;

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat(\"" . $page_data[$i]->id_logistik . "\",\"" . $page_data[$i]->nama  . "\",\"" . $page_data[$i]->harga_cost . "\",\"" . $rekom .  "\")'><i class='icon-pencil'></i></a>";

            $out[$i] = array($no, $kode_sibatik,  $nama, $produsen, $distributor, $penggunaan, $stok_tersedia, $min_stok, $rekom, $edit);
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
    public function tampil_list_faktur()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Perencanaan->getListUsulan($idFaktur);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail .  "\")'><i class='icon-trash'></i></a>";

            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $produsen = $page_data[$i]->produsen;
            $jml_obat = $page_data[$i]->jumlah;
            $frek = $page_data[$i]->frek;
            $id_logistik = $page_data[$i]->id_logistik;

            $out[$i] = array($no, $id_logistik, $nama_obat, $produsen, $jml_obat, $frek, $hapus);
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
        $id_vendor = $this->input->post('id_vendor');
        $tgl_input = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');


        $data = array(
            'id_faktur' => $id_faktur,
            'no_dokumen' => $no_dokumen,
            'index_dok' => $no_index,
            'tgl_faktur' => $tgl_faktur,
            // 'id_vendor' => $id_vendor,
            'tgl_input' => $tgl_input,
            'id_staff' => $data_staff->id_staff
        );

        $data2 = array(
            'id_faktur' => $id_faktur,
            'tipe_faktur' => '-',
            'no_dokumen' => $no_dokumen,
            'index_dok' => $no_index,
            'tgl_faktur' => $tgl_faktur,
            'tgl_tempo' => '-',
            'no_faktur' => '-',
            'id_vendor' => '-',
            'tgl_input' => $tgl_input,
            'id_staff' => $data_staff->id_staff,
            'ket' => '-',
            'jenis' => 'Usulan Perencanaan'
        );


        $this->M_Perencanaan->insertObat($data2, 'faktur');

        $this->M_Perencanaan->insertObat($data, 'faktur_usulan_logfar');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function insertObatFaktur()
    {
        $id = $this->input->post('id');
        $idFaktur = $this->input->post('idFaktur');
        $jumlah = $this->input->post('jumlah');
        $frek = $this->input->post('frek');
        $idLogistik = $this->input->post('idLogistik');
        $harga = $this->input->post('harga');
        $tgl = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');

        $dt = $this->db->get_where('detail_usulan_logfar', ['id_faktur' => $idFaktur, 'id_list' => $idLogistik])->result();
        if (count($dt) > 0) {
            $out['status'] = "Obat ini sudah diinputkan";
        } else {
            $data = array(
                'id_detail' => $id,
                'id_faktur' => $idFaktur,
                'id_list' => $idLogistik,
                'jumlah' => $jumlah,
                'frek' => $frek,
                'harga' => $harga,
                'total' => $harga * $frek * $jumlah,
                'tgl' => $tgl,
                'id_staff' => $data_staff->id_staff,
                'status' => '0',

            );

            $this->M_Perencanaan->insertObat($data, 'detail_usulan_logfar');
            $out['status'] = "success";
        }

        echo json_encode($out);
    }
    function hapus_list_faktur()
    {
        $id_detail = $this->input->post('id_detail');
        $this->M_Perencanaan->delete($id_detail, 'detail_usulan_logfar', 'id_detail');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_data()
    {
        $page_data = $this->M_Perencanaan->selectDataUsulan();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $label =     "<a class='btn btn-danger btn-icon-anim btn-square' href='Usulan_perencanaan/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";
            $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur .  "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-note'></i></a>";


            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $id_vendor = $page_data[$i]->id_vendor;

            $out[$i] = array($no, $label, $pilih, $hapus, $edit, $no_dokumen, $tgl_input, $tgl_faktur);
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

        $page_data = $this->M_Perencanaan->selectRangeUsulan($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $label =     "<a class='btn btn-danger btn-icon-anim btn-square' href='Usulan_perencanaan/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";
            $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur .  "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-note'></i></a>";

            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $id_vendor = $page_data[$i]->id_vendor;

            $out[$i] = array($no, $label, $pilih, $hapus, $edit, $no_dokumen, $tgl_input, $tgl_faktur, $id_vendor,);
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
    public function print_out($id_faktur)

    {
        $data['judul'] = "USULAN PERENCANAAN";
        $data['usulan'] = $this->db->get_where('faktur_usulan_logfar', ['id_faktur' => $id_faktur])->row();
        $data['data'] = $this->M_Perencanaan->getListUsulan($id_faktur);
        $this->load->view('print/cetak_usulan', $data);
    }

    function hapus_faktur_po()
    {
        $id_faktur = $this->input->post('id_faktur');
        $this->M_Perencanaan->delete($id_faktur, 'faktur_usulan_logfar', 'id_faktur');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function Rekomendasi()
    {

        $this->load->view('assets/_header');

        $page_data['page_content'] = 'page_content/Rekomendasi_perencanaan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
}
