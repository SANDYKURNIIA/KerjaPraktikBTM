<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan_obat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Penerimaan_obat');
        $this->load->model('M_Po_obat');
        $this->load->model('M_Logistik_farmasi');
    }

    public function index()
    {

        $this->load->view('assets/_header');
        $max = $this->M_Penerimaan_obat->selectNoDokumenRetur();
        $i = 0;
        $page_data = array('max' =>  $max[$i]->max + 1,);
        $page_data['vendor'] = $this->db->get('produsen')->result_array();
        $page_data['obat'] = $this->M_Penerimaan_obat->selectObatRetur();
        $page_data['page_content'] = 'page_content/Penerimaan_obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function tampil_list_faktur()
    {
        $idPenerimaanObat = $this->input->post('idPenerimaanobat');
        // $page_data = $this->M_Penerimaan_obat->getListRetur($idPenerimaanObat);
        $page_data = $this->M_Penerimaan_obat->getListRetur($idPenerimaanObat);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail .  "\")'><i class='icon-trash'></i></a>";

            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $ket = $page_data[$i]->ket;
            $frek = $page_data[$i]->frek;
            $harga = $page_data[$i]->harga;
            $total = $page_data[$i]->total;

            $out[$i] = array($no,$nama_obat, $frek, $harga, $total, $ket, $hapus);
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
        $db = $this->M_Penerimaan_obat->selectDataObatById($id_logistik);
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
        $id_penerimaan_obat = uniqid();
        $no_dokumen  = $this->input->post('no_dokumen');
        $no_index = $this->input->post('no_index');
        $tgl_faktur_raw = $this->input->post('tgl_faktur'); // Ambil tanggal mentah dari input
        $tgl_faktur = date('Y-m-d', strtotime($tgl_faktur_raw)); // Format tanggal ke YYYY-mm-dd
        $unit = $this->input->post('unit');
        $tgl_input = date("Y-m-d H:i:s"); // Format waktu saat ini

        $data_staff = $this->session->userdata('data_auth');

        $data = array(
            'id_penerimaan_obat' => $id_penerimaan_obat,
            'no_dokumen' => $no_dokumen,
            'index_dok' => $no_index,
            'tgl_faktur' => $tgl_faktur,
            'unit' => $unit,
            'tgl_input' => $tgl_input,
            'id_staff' => $data_staff->id_staff
        );

        $this->M_Penerimaan_obat->insertFaktur($data, 'Penerimaan_obat');
        $out['status'] = "success";
        echo json_encode($out);
    }


    public function insertObatFaktur()
    {
        // Load model yang diperlukan
        $this->load->model('M_Penerimaan_obat');
        $this->load->model('M_Logistik_farmasi');

        // Ambil data input
        $id_detail = uniqid();
        $id_penerimaan_obat = $this->input->post('idPenerimaanobat');
        $harga = $this->input->post('harga');
        $idLogistik = $this->input->post('idLogistik');
        $frek = $this->input->post('frek');
        $ket = $this->input->post('ket');
        $tgl = date("Y-m-d H:i:s");

        // Ambil data staff dari session
        $data_staff = $this->session->userdata('data_auth');

        // Validasi ID Penerimaan Obat
        $penerimaanObat = $this->db->get_where('Penerimaan_obat', array('id_penerimaan_obat' => $id_penerimaan_obat))->row();
        if (!$penerimaanObat) {
            $out['status'] = "failed";
            $out['message'] = "ID Penerimaan Obat tidak valid";
            echo json_encode($out);
            return;
        }

        // Validasi ID Logistik
        $logistik = $this->db->get_where('stok_logistik', array('id_logistik' => $idLogistik))->row();
        if (!$logistik) {
            $out['status'] = "failed";
            $out['message'] = "ID Logistik tidak valid";
            echo json_encode($out);
            return;
        }

        // Ambil tanggal kadaluarsa dari stok_logistik
        $exp = $this->db->query("SELECT kadaluarsa FROM stok_logistik 
        WHERE id_logistik = '$idLogistik' 
        ORDER BY ABS(DATEDIFF(tgl, NOW())) ASC limit 1")->row()->kadaluarsa;

        // Data yang akan dimasukkan ke tabel detail_pengeluaran_obat
        $data = array(
            'id_detail' => $id_detail, // Ubah ke id_detail
            'id_faktur' => $id_penerimaan_obat, // Ubah ke id_faktur
            'id_list' => $idLogistik, // Ubah ke id_list
            'harga' => $harga,
            'frek' => $frek,
            'tgl' => $tgl,
            'total'=> $frek * $harga,
            'id_staff' => $data_staff->id_staff,
            'ket'=>$ket
        );

        // Insert data ke tabel detail_pengeluaran_obat
        $this->M_Penerimaan_obat->insertObat($data, 'detail_pengeluaran_obat');

        // Ambil stok logistik yang terkait
        $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaan($idLogistik)->stok;

        // Data yang akan dimasukkan ke tabel stok_logistik
        $stok_logistik = array(
            'id_stok' => uniqid(),
            'id_logistik' => $idLogistik,
            'tgl' => $tgl,
            'keterangan' => 'RETUR',
            'frek' => $frek * -1,
            'saldo' => $getStok + ($frek * -1),
            'kadaluarsa' => $exp,
            'asal_tujuan' => 'Logistik',
            'id_struk' => $id_detail,
            'id_staff' => $data_staff->id_staff,
        );

        // Insert data ke tabel stok_logistik
        $this->M_Penerimaan_obat->insertObat($stok_logistik, 'stok_logistik');

        // Berikan respon sukses
        $out['status'] = "success";
        echo json_encode($out);
    }

    function hapus_list_faktur()
    {
        $id_detail = $this->input->post('id_detail');
        $this->M_Penerimaan_obat->delete($id_detail, 'detail_pengeluaran_obat', 'id_detail');
        $this->M_Penerimaan_obat->delete($id_detail, 'stok_logistik', 'id_struk');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_data()
    {
        $page_data = $this->M_Penerimaan_obat->selectDataRetur();
        $out = null;

        foreach ($page_data as $i => $data) {
            $label = "<a class='btn btn-danger btn-icon-anim btn-square' href='" . base_url() . "Penerimaan_obat/print_out/" . $data->id_penerimaan_obat . "' ><i class='icon-printer'></i></a>";
            $edit = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $data->id_penerimaan_obat . "\",\"" . $data->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
            $hapus = "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $data->id_penerimaan_obat . "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $data->id_penerimaan_obat . "\",\"" . $data->no_dokumen . "\")'><i class='icon-note'></i></a>";

            $no = $i + 1;

            // Format tanggal tgl_faktur ke format yang diinginkan (tanggal-bulan-tahun)
            $tgl_faktur = date('d-m-Y', strtotime($data->tgl_faktur));

            // Format tanggal tgl_input ke format jam:menit:detik
            $tgl_input = date('H:i:s', strtotime($data->tgl_input));

            $out[$i] = array($no, $label, $pilih, $hapus, $edit, $tgl_faktur, $tgl_input, $data->unit, $data->no_dokumen);
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

        $page_data = $this->M_Penerimaan_obat->selectRangeRetur($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $label =     "<a class='btn btn-danger btn-icon-anim btn-square' href='" . base_url() . "Penerimaan_obat/print_out/" . $page_data[$i]->id_penerimaan_obat . "' ><i class='icon-printer'></i></a>";
            $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_penerimaan_obat . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_penerimaan_obat .  "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_penerimaan_obat . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-note'></i></a>";

            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $unit = $page_data[$i]->unit;

            $out[$i] = array($no, $label, $pilih, $hapus, $edit,$tgl_faktur,  $tgl_input,$unit, $no_dokumen);
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
        $id_penerimaan_obat = $this->input->post('id_penerimaan_obat');
        $this->M_Penerimaan_obat->delete($id_penerimaan_obat, 'Penerimaan_obat', 'id_penerimaan_obat');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function print_out($id_penerimaan_obat)
    {
        $data['data'] = $this->M_Penerimaan_obat->getRetur($id_penerimaan_obat);
        $data['list'] = $this->M_Penerimaan_obat->getListRetur($id_penerimaan_obat);
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
            $page_data = $this->M_Penerimaan_obat->selectLaporanRetur($mulai, $akhir);
        } else {
            $page_data = $this->M_Penerimaan_obat->selectLaporanRetur('', '');
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $id_logistik = $page_data[$i]->id_logistik;

            $satuan_terkecil = $page_data[$i]->satuan_terkecil;
            $vendor = $page_data[$i]->unit;
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
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan_obat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Penerimaan_obat');
        $this->load->model('M_Po_obat');
        $this->load->model('M_Logistik_farmasi');
    }

    public function index()
    {

        $this->load->view('assets/_header');
        $max = $this->M_Penerimaan_obat->selectNoDokumenRetur();
        $i = 0;
        $page_data = array('max' =>  $max[$i]->max + 1,);
        $page_data['vendor'] = $this->db->get('produsen')->result_array();
        $page_data['obat'] = $this->M_Penerimaan_obat->selectObatRetur();
        $page_data['page_content'] = 'page_content/Penerimaan_obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function tampil_list_faktur()
    {
        $idPenerimaanObat = $this->input->post('idPenerimaanobat');
        // $page_data = $this->M_Penerimaan_obat->getListRetur($idPenerimaanObat);
        $page_data = $this->M_Penerimaan_obat->getListRetur($idPenerimaanObat);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail .  "\")'><i class='icon-trash'></i></a>";

            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $ket = $page_data[$i]->ket;
            $frek = $page_data[$i]->frek;
            $harga = $page_data[$i]->harga;
            $total = $page_data[$i]->total;

            $out[$i] = array($no,$nama_obat, $frek, $harga, $total, $ket, $hapus);
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
        $db = $this->M_Penerimaan_obat->selectDataObatById($id_logistik);
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
        $id_penerimaan_obat = uniqid();
        $no_dokumen  = $this->input->post('no_dokumen');
        $no_index = $this->input->post('no_index');
        $tgl_faktur_raw = $this->input->post('tgl_faktur'); // Ambil tanggal mentah dari input
        $tgl_faktur = date('Y-m-d', strtotime($tgl_faktur_raw)); // Format tanggal ke YYYY-mm-dd
        $unit = $this->input->post('unit');
        $tgl_input = date("Y-m-d H:i:s"); // Format waktu saat ini

        $data_staff = $this->session->userdata('data_auth');

        $data = array(
            'id_penerimaan_obat' => $id_penerimaan_obat,
            'no_dokumen' => $no_dokumen,
            'index_dok' => $no_index,
            'tgl_faktur' => $tgl_faktur,
            'unit' => $unit,
            'tgl_input' => $tgl_input,
            'id_staff' => $data_staff->id_staff
        );

        $this->M_Penerimaan_obat->insertFaktur($data, 'Penerimaan_obat');
        $out['status'] = "success";
        echo json_encode($out);
    }


    public function insertObatFaktur()
    {
        // Load model yang diperlukan
        $this->load->model('M_Penerimaan_obat');
        $this->load->model('M_Logistik_farmasi');

        // Ambil data input
        $id_detail = uniqid();
        $id_penerimaan_obat = $this->input->post('idPenerimaanobat');
        $harga = $this->input->post('harga');
        $idLogistik = $this->input->post('idLogistik');
        $frek = $this->input->post('frek');
        $ket = $this->input->post('ket');
        $tgl = date("Y-m-d H:i:s");

        // Ambil data staff dari session
        $data_staff = $this->session->userdata('data_auth');

        // Validasi ID Penerimaan Obat
        $penerimaanObat = $this->db->get_where('Penerimaan_obat', array('id_penerimaan_obat' => $id_penerimaan_obat))->row();
        if (!$penerimaanObat) {
            $out['status'] = "failed";
            $out['message'] = "ID Penerimaan Obat tidak valid";
            echo json_encode($out);
            return;
        }

        // Validasi ID Logistik
        $logistik = $this->db->get_where('stok_logistik', array('id_logistik' => $idLogistik))->row();
        if (!$logistik) {
            $out['status'] = "failed";
            $out['message'] = "ID Logistik tidak valid";
            echo json_encode($out);
            return;
        }

        // Ambil tanggal kadaluarsa dari stok_logistik
        $exp = $this->db->query("SELECT kadaluarsa FROM stok_logistik 
        WHERE id_logistik = '$idLogistik' 
        ORDER BY ABS(DATEDIFF(tgl, NOW())) ASC limit 1")->row()->kadaluarsa;

        // Data yang akan dimasukkan ke tabel detail_pengeluaran_obat
        $data = array(
            'id_detail' => $id_detail, // Ubah ke id_detail
            'id_faktur' => $id_penerimaan_obat, // Ubah ke id_faktur
            'id_list' => $idLogistik, // Ubah ke id_list
            'harga' => $harga,
            'frek' => $frek,
            'tgl' => $tgl,
            'total'=> $frek * $harga,
            'id_staff' => $data_staff->id_staff,
            'ket'=>$ket
        );

        // Insert data ke tabel detail_pengeluaran_obat
        $this->M_Penerimaan_obat->insertObat($data, 'detail_pengeluaran_obat');

        // Ambil stok logistik yang terkait
        $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaan($idLogistik)->stok;

        // Data yang akan dimasukkan ke tabel stok_logistik
        $stok_logistik = array(
            'id_stok' => uniqid(),
            'id_logistik' => $idLogistik,
            'tgl' => $tgl,
            'keterangan' => 'RETUR',
            'frek' => $frek * -1,
            'saldo' => $getStok + ($frek * -1),
            'kadaluarsa' => $exp,
            'asal_tujuan' => 'Logistik',
            'id_struk' => $id_detail,
            'id_staff' => $data_staff->id_staff,
        );

        // Insert data ke tabel stok_logistik
        $this->M_Penerimaan_obat->insertObat($stok_logistik, 'stok_logistik');

        // Berikan respon sukses
        $out['status'] = "success";
        echo json_encode($out);
    }

    function hapus_list_faktur()
    {
        $id_detail = $this->input->post('id_detail');
        $this->M_Penerimaan_obat->delete($id_detail, 'detail_pengeluaran_obat', 'id_detail');
        $this->M_Penerimaan_obat->delete($id_detail, 'stok_logistik', 'id_struk');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_data()
    {
        $page_data = $this->M_Penerimaan_obat->selectDataRetur();
        $out = null;

        foreach ($page_data as $i => $data) {
            $label = "<a class='btn btn-danger btn-icon-anim btn-square' href='" . base_url() . "Penerimaan_obat/print_out/" . $data->id_penerimaan_obat . "' ><i class='icon-printer'></i></a>";
            $edit = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $data->id_penerimaan_obat . "\",\"" . $data->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
            $hapus = "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $data->id_penerimaan_obat . "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $data->id_penerimaan_obat . "\",\"" . $data->no_dokumen . "\")'><i class='icon-note'></i></a>";

            $no = $i + 1;

            // Format tanggal tgl_faktur ke format yang diinginkan (tanggal-bulan-tahun)
            $tgl_faktur = date('d-m-Y', strtotime($data->tgl_faktur));

            // Format tanggal tgl_input ke format jam:menit:detik
            $tgl_input = date('H:i:s', strtotime($data->tgl_input));

            $out[$i] = array($no, $label, $pilih, $hapus, $edit, $tgl_faktur, $tgl_input, $data->unit, $data->no_dokumen);
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

        $page_data = $this->M_Penerimaan_obat->selectRangeRetur($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $label =     "<a class='btn btn-danger btn-icon-anim btn-square' href='" . base_url() . "Penerimaan_obat/print_out/" . $page_data[$i]->id_penerimaan_obat . "' ><i class='icon-printer'></i></a>";
            $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_penerimaan_obat . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_penerimaan_obat .  "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_penerimaan_obat . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-note'></i></a>";

            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $unit = $page_data[$i]->unit;

            $out[$i] = array($no, $label, $pilih, $hapus, $edit,$tgl_faktur,  $tgl_input,$unit, $no_dokumen);
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
        $id_penerimaan_obat = $this->input->post('id_penerimaan_obat');
        $this->M_Penerimaan_obat->delete($id_penerimaan_obat, 'Penerimaan_obat', 'id_penerimaan_obat');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function print_out($id_penerimaan_obat)
    {
        $data['data'] = $this->M_Penerimaan_obat->getRetur($id_penerimaan_obat);
        $data['list'] = $this->M_Penerimaan_obat->getListRetur($id_penerimaan_obat);
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
            $page_data = $this->M_Penerimaan_obat->selectLaporanRetur($mulai, $akhir);
        } else {
            $page_data = $this->M_Penerimaan_obat->selectLaporanRetur('', '');
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $id_logistik = $page_data[$i]->id_logistik;

            $satuan_terkecil = $page_data[$i]->satuan_terkecil;
            $vendor = $page_data[$i]->unit;
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
