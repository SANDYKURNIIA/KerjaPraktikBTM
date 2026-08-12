<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat_racikan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Obat_racikan');
        $this->load->model('M_Apotik');
        $this->load->model('M_Stok_obat');
    }
    function index()
    {
        $this->load->view('assets/_header');
        $page_data['racikan'] = $this->M_Obat_racikan->getNamaRacikan();
        $page_data['obat'] = $this->M_Obat_racikan->getNamaObat();
        $page_data['sk'] = $this->db->query('SELECT DISTINCT(satuan_terkecil) from list_logistik')->result_array();
        $page_data['sb'] = $this->db->query('SELECT DISTINCT(satuan_terbesar) from list_logistik')->result_array();
        $page_data['gol_obat'] = $this->db->query('SELECT DISTINCT(golongan_obat) from list_logistik')->result_array();
        $page_data['page_content'] = 'page_content/Obat_racikan';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_stok_obat()
    {
        $data_staff = $this->session->userdata('data_auth');
        if ($data_staff->tipe == "apotik") {
            $stok = "stok_apotik";
        } else if ($data_staff->tipe == "deporanap") {
            $stok = "stok_depo";
        } else if ($data_staff->tipe == "logistik farmasi") {
            $stok = "stok_logistik";
        }
        $page_data = $this->M_Obat_racikan->getNamaObatUnit($stok);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tombol = "<button class='btn btn-primary btn-icon-anim btn-square' onclick='edit_detail(\"" . $page_data[$i]->id_logistik . "\" )'><i class='fa fa-pencil'></i></button>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $harga_cost = $page_data[$i]->harga_cost;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $produsen = $page_data[$i]->produsen;
            $frek = $page_data[$i]->stok;
            $tipe = $page_data[$i]->satuan_terkecil;

            $out[$i] = array($no, $nama, $harga_cost, $golongan_obat, $produsen, $frek, $tipe, $tombol,);
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

    public function tampil_stok_depo()
    {
        $depo = $this->input->post('jenis');
        if ($depo == "1") {
            $stok = 'stok_apotik';
        } else  if ($depo == "2") {
            $stok = 'stok_depo';
        } else  if ($depo == "3") {
            $stok = 'stok_igd';
        } else  if ($depo == "0") {
            $stok = 'stok_logistik';
        }
        $page_data = $this->M_Obat_racikan->getNamaObatUnit($stok);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tombol = "<button class='btn btn-primary btn-icon-anim btn-square' onclick='edit_detail(\"" . $page_data[$i]->id_logistik . "\" )'><i class='fa fa-pencil'></i></button>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $harga_cost = $page_data[$i]->harga_cost;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $produsen = $page_data[$i]->produsen;
            $frek = $page_data[$i]->stok;
            $tipe = $page_data[$i]->satuan_terkecil;

            $out[$i] = array($no, $nama, $harga_cost, $golongan_obat, $produsen, $frek, $tipe, $tombol,);
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
    public function tampil_detail()
    {
        $id_logistik = $this->input->post('id_logistik');


        $page_data = $this->M_Stok_obat->selectDetailStok($id_logistik);



        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $kadaluarsa = $page_data[$i]->kadaluarsa;
            $frek = $page_data[$i]->stok;

            $out[$i] = array($no, $nama, $kadaluarsa, $frek);
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
    public function insertObat()
    {
        $data_staff = $this->session->userdata('data_auth');
        if ($data_staff->tipe == 'logistik farmasi') {
            $prod = 'GUDANG FARMASI RSBT';
        } else {
            $prod = 'FARMASI RSBT';
        }

        $nama  = $this->input->post('nama');
        $tipe = $this->input->post('tipe');
        $tipe1 = $this->input->post('tipe1');
        $harga_cost = $this->input->post('harga_cost');
        $golongan_obat  = $this->input->post('golongan_obat');
        $margin = $this->input->post('margin');
        $produsen = $this->input->post('produsen');
        $standar = $this->input->post('standar');
        $distributor = $this->input->post('distributor');
        $kode = $this->input->post('kode');

        $data = array(
            // 'id_logistik' => uniqid(),
            'nama' => $nama,
            'satuan_terkecil' => $tipe,
            'satuan_terbesar' => $tipe1,
            'harga_cost' => $harga_cost,
            'golongan_obat' => $golongan_obat,
            'golongan_sediaan' => 'OBAT RACIKAN',
            'margin' => $margin,
            'produsen' => $prod,
            'standar' => $standar,
            'distributor' => $distributor,
            'status' => 'AKTIF',
            'kode' => $kode,
            'tgl_input' => date("Y-m-d H:i:s")
        );



        $this->M_Obat_racikan->insert($data, 'list_logistik');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function insertUpdateStok()
    {
        $data_staff = $this->session->userdata('data_auth');
        $frek = $this->input->post('frek');
        $idLogistik = $this->input->post('id_logistik');
        $tglExp = $this->input->post('tglExp');
        $id = $this->input->post('id');

        $tgl =  date("Y-m-d H:i:s");
        $depo = $this->input->post('depo');

        if ($depo == 'APOTIK') {
            $obat = $this->M_Apotik->getSumObatApotik($idLogistik);
            if ($obat['stok'] < $this->input->post('frek')) {
                $out['status'] = "error";
            } else {
                $stok = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $idLogistik,
                    'tgl' => $tgl,
                    'keterangan' => "KELUAR",
                    'frek' => $frek * -1,
                    'saldo' => $obat['stok'] + ($frek * -1),
                    'kadaluarsa' => $tglExp,
                    'asal_tujuan' => "RACIKAN",
                    'id_req' =>  $id,
                    'id_staff' => $data_staff->id_staff,
                    'id_resep' => '-',
                );
                $this->M_Obat_racikan->insert($stok, 'stok_apotik');
                $this->M_Apotik->update_perencanaan($idLogistik, 'stok_apotik', 'pr_apotik');
                $out['status'] = "success";
            }
        } else if ($depo == 'RANAP') {
            $obat = $this->M_Apotik->getSumObatRanap($idLogistik);
            if ($obat['stok'] < $this->input->post('frek')) {
                $out['status'] = "error";
            } else {
                $stok = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $idLogistik,
                    'tgl' => $tgl,
                    'keterangan' => "KELUAR",
                    'frek' => $frek * -1,
                    'saldo' => $obat['stok'] + ($frek * -1),
                    'kadaluarsa' => $tglExp,
                    'asal_tujuan' => "RACIKAN",
                    'id_req' =>  $id,
                    'id_staff' => $data_staff->id_staff,
                    'id_resep' => '-',
                );
                $this->M_Obat_racikan->insert($stok, 'stok_depo');
                $this->M_Apotik->update_perencanaan($idLogistik, 'stok_depo', 'pr_depo');

                $out['status'] = "success";
            }
        }else  if ($depo == 'GUDANG') {
            $obat = $this->M_Apotik->getSumObatGudang($idLogistik);
            if ($obat['stok'] < $this->input->post('frek')) {
                $out['status'] = "error";
            } else {
                $stok = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $idLogistik,
                    'tgl' => $tgl,
                    'keterangan' => "KELUAR",
                    'frek' => $frek * -1,
                    'saldo' => $obat['stok'] + ($frek * -1),
                    'kadaluarsa' => $tglExp,
                    'asal_tujuan' => "RACIKAN",
                    'id_struk' =>  $id,
                    'id_staff' => $data_staff->id_staff,
                );
                $this->M_Obat_racikan->insert($stok, 'stok_logistik');

                $out['status'] = "success";
            }
        }




        // $out['status'] = "success";
        echo json_encode($out);
    }
    public function insertStok()
    {
        $data_staff = $this->session->userdata('data_auth');
        $frek = $this->input->post('stok');
        $idLogistik = $this->input->post('id_logistik');
        $tglExp = $this->input->post('expire');
        $id = $this->input->post('id');
        $harga = $this->input->post('harga');

        $tgl =  date("Y-m-d H:i:s");
        $depo = $this->input->post('depo');

        if ($depo == 'APOTIK') {
            $obat = $this->M_Apotik->getSumObatApotik($idLogistik);

            $stok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $tgl,
                'keterangan' => "MASUK",
                'frek' => $frek,
                'saldo' => $obat['stok'] + ($frek),
                'kadaluarsa' => $tglExp,
                'asal_tujuan' => "FARMASI RSBT",
                'id_req' =>  $id,
                'id_staff' => $data_staff->id_staff,
                'id_resep' => '-',
            );
            $this->M_Obat_racikan->insert($stok, 'stok_apotik');
            $this->M_Apotik->update_perencanaan($idLogistik, 'stok_apotik', 'pr_apotik');

            $out['status'] = "success";
        } else if ($depo == 'IGD') {

            $stok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $tgl,
                'keterangan' => "MASUK",
                'frek' => $frek,
                'kadaluarsa' => $tglExp,
                'asal_tujuan' => "FARMASI RSBT",
                'id_req' =>  $id,
                'id_staff' => $data_staff->id_staff,
                'id_resep' => '-',
            );
            $this->M_Obat_racikan->insert($stok, 'stok_igd');
            $out['status'] = "success";
        } else if ($depo == 'RANAP') {
            $obat = $this->M_Apotik->getSumObatApotik($idLogistik);

            $stok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $tgl,
                'keterangan' => "MASUK",
                'frek' => $frek,
                'saldo' => $obat['stok'] + ($frek),
                'kadaluarsa' => $tglExp,
                'asal_tujuan' => "FARMASI RSBT",
                'id_req' =>  $id,
                'id_staff' => $data_staff->id_staff,
                'id_resep' => '-',
            );
            $this->M_Obat_racikan->insert($stok, 'stok_depo');
            $this->M_Apotik->update_perencanaan($idLogistik, 'stok_depo', 'pr_depo');

            $out['status'] = "success";
        } else if ($depo == 'GUDANG') {
            $obat = $this->M_Apotik->getSumObatGudang($idLogistik);

            $stok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $tgl,
                'keterangan' => "MASUK",
                'frek' => $frek,
                'saldo' => $obat['stok'] + ($frek),
                'kadaluarsa' => $tglExp,
                'asal_tujuan' => "GUDANG FARMASI RSBT",
                'id_struk' =>  $id,
                'id_staff' => $data_staff->id_staff,
            );
            $this->M_Obat_racikan->insert($stok, 'stok_logistik');

            $out['status'] = "success";
        }


        $this->M_Obat_racikan->update(['id_logistik' => $idLogistik], ['harga_cost' => $harga], 'list_logistik');


        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_list_racikan()
    {
        $id = $this->input->post('id');


        $page_data = $this->M_Obat_racikan->selectDataJoin($id);
        echo json_encode($page_data);
    }
    public function hapus_obat()
    {
        $id = $this->input->post('id');
        $this->M_Apotik->delete_tindakan($id, 'stok_apotik', 'id_stok');
        $this->M_Apotik->delete_tindakan($id, 'stok_depo', 'id_stok');
        $this->M_Apotik->delete_tindakan($id, 'stok_logistik', 'id_stok');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function hapus_racikan()
    {
        $id = $this->input->post('id');
        $this->M_Apotik->delete_tindakan($id, 'stok_apotik', 'id_req');
        $this->M_Apotik->delete_tindakan($id, 'stok_depo', 'id_req');
        $this->M_Apotik->delete_tindakan($id, 'stok_logistik', 'id_struk');
        $out['status'] = "success";
        echo json_encode($out);
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat_racikan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Obat_racikan');
        $this->load->model('M_Apotik');
        $this->load->model('M_Stok_obat');
    }
    function index()
    {
        $this->load->view('assets/_header');
        $page_data['racikan'] = $this->M_Obat_racikan->getNamaRacikan();
        $page_data['obat'] = $this->M_Obat_racikan->getNamaObat();
        $page_data['sk'] = $this->db->query('SELECT DISTINCT(satuan_terkecil) from list_logistik')->result_array();
        $page_data['sb'] = $this->db->query('SELECT DISTINCT(satuan_terbesar) from list_logistik')->result_array();
        $page_data['gol_obat'] = $this->db->query('SELECT DISTINCT(golongan_obat) from list_logistik')->result_array();
        $page_data['page_content'] = 'page_content/Obat_racikan';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_stok_obat()
    {
        $data_staff = $this->session->userdata('data_auth');
        if ($data_staff->tipe == "apotik") {
            $stok = "stok_apotik";
        } else if ($data_staff->tipe == "deporanap") {
            $stok = "stok_depo";
        } else if ($data_staff->tipe == "logistik farmasi") {
            $stok = "stok_logistik";
        }
        $page_data = $this->M_Obat_racikan->getNamaObatUnit($stok);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tombol = "<button class='btn btn-primary btn-icon-anim btn-square' onclick='edit_detail(\"" . $page_data[$i]->id_logistik . "\" )'><i class='fa fa-pencil'></i></button>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $harga_cost = $page_data[$i]->harga_cost;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $produsen = $page_data[$i]->produsen;
            $frek = $page_data[$i]->stok;
            $tipe = $page_data[$i]->satuan_terkecil;

            $out[$i] = array($no, $nama, $harga_cost, $golongan_obat, $produsen, $frek, $tipe, $tombol,);
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

    public function tampil_stok_depo()
    {
        $depo = $this->input->post('jenis');
        if ($depo == "1") {
            $stok = 'stok_apotik';
        } else  if ($depo == "2") {
            $stok = 'stok_depo';
        } else  if ($depo == "3") {
            $stok = 'stok_igd';
        } else  if ($depo == "0") {
            $stok = 'stok_logistik';
        }
        $page_data = $this->M_Obat_racikan->getNamaObatUnit($stok);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tombol = "<button class='btn btn-primary btn-icon-anim btn-square' onclick='edit_detail(\"" . $page_data[$i]->id_logistik . "\" )'><i class='fa fa-pencil'></i></button>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $harga_cost = $page_data[$i]->harga_cost;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $produsen = $page_data[$i]->produsen;
            $frek = $page_data[$i]->stok;
            $tipe = $page_data[$i]->satuan_terkecil;

            $out[$i] = array($no, $nama, $harga_cost, $golongan_obat, $produsen, $frek, $tipe, $tombol,);
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
    public function tampil_detail()
    {
        $id_logistik = $this->input->post('id_logistik');


        $page_data = $this->M_Stok_obat->selectDetailStok($id_logistik);



        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $kadaluarsa = $page_data[$i]->kadaluarsa;
            $frek = $page_data[$i]->stok;

            $out[$i] = array($no, $nama, $kadaluarsa, $frek);
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
    public function insertObat()
    {
        $data_staff = $this->session->userdata('data_auth');
        if ($data_staff->tipe == 'logistik farmasi') {
            $prod = 'GUDANG FARMASI RSBT';
        } else {
            $prod = 'FARMASI RSBT';
        }

        $nama  = $this->input->post('nama');
        $tipe = $this->input->post('tipe');
        $tipe1 = $this->input->post('tipe1');
        $harga_cost = $this->input->post('harga_cost');
        $golongan_obat  = $this->input->post('golongan_obat');
        $margin = $this->input->post('margin');
        $produsen = $this->input->post('produsen');
        $standar = $this->input->post('standar');
        $distributor = $this->input->post('distributor');
        $kode = $this->input->post('kode');

        $data = array(
            // 'id_logistik' => uniqid(),
            'nama' => $nama,
            'satuan_terkecil' => $tipe,
            'satuan_terbesar' => $tipe1,
            'harga_cost' => $harga_cost,
            'golongan_obat' => $golongan_obat,
            'golongan_sediaan' => 'OBAT RACIKAN',
            'margin' => $margin,
            'produsen' => $prod,
            'standar' => $standar,
            'distributor' => $distributor,
            'status' => 'AKTIF',
            'kode' => $kode,
            'tgl_input' => date("Y-m-d H:i:s")
        );



        $this->M_Obat_racikan->insert($data, 'list_logistik');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function insertUpdateStok()
    {
        $data_staff = $this->session->userdata('data_auth');
        $frek = $this->input->post('frek');
        $idLogistik = $this->input->post('id_logistik');
        $tglExp = $this->input->post('tglExp');
        $id = $this->input->post('id');

        $tgl =  date("Y-m-d H:i:s");
        $depo = $this->input->post('depo');

        if ($depo == 'APOTIK') {
            $obat = $this->M_Apotik->getSumObatApotik($idLogistik);
            if ($obat['stok'] < $this->input->post('frek')) {
                $out['status'] = "error";
            } else {
                $stok = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $idLogistik,
                    'tgl' => $tgl,
                    'keterangan' => "KELUAR",
                    'frek' => $frek * -1,
                    'saldo' => $obat['stok'] + ($frek * -1),
                    'kadaluarsa' => $tglExp,
                    'asal_tujuan' => "RACIKAN",
                    'id_req' =>  $id,
                    'id_staff' => $data_staff->id_staff,
                    'id_resep' => '-',
                );
                $this->M_Obat_racikan->insert($stok, 'stok_apotik');
                $this->M_Apotik->update_perencanaan($idLogistik, 'stok_apotik', 'pr_apotik');
                $out['status'] = "success";
            }
        } else if ($depo == 'RANAP') {
            $obat = $this->M_Apotik->getSumObatRanap($idLogistik);
            if ($obat['stok'] < $this->input->post('frek')) {
                $out['status'] = "error";
            } else {
                $stok = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $idLogistik,
                    'tgl' => $tgl,
                    'keterangan' => "KELUAR",
                    'frek' => $frek * -1,
                    'saldo' => $obat['stok'] + ($frek * -1),
                    'kadaluarsa' => $tglExp,
                    'asal_tujuan' => "RACIKAN",
                    'id_req' =>  $id,
                    'id_staff' => $data_staff->id_staff,
                    'id_resep' => '-',
                );
                $this->M_Obat_racikan->insert($stok, 'stok_depo');
                $this->M_Apotik->update_perencanaan($idLogistik, 'stok_depo', 'pr_depo');

                $out['status'] = "success";
            }
        }else  if ($depo == 'GUDANG') {
            $obat = $this->M_Apotik->getSumObatGudang($idLogistik);
            if ($obat['stok'] < $this->input->post('frek')) {
                $out['status'] = "error";
            } else {
                $stok = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $idLogistik,
                    'tgl' => $tgl,
                    'keterangan' => "KELUAR",
                    'frek' => $frek * -1,
                    'saldo' => $obat['stok'] + ($frek * -1),
                    'kadaluarsa' => $tglExp,
                    'asal_tujuan' => "RACIKAN",
                    'id_struk' =>  $id,
                    'id_staff' => $data_staff->id_staff,
                );
                $this->M_Obat_racikan->insert($stok, 'stok_logistik');

                $out['status'] = "success";
            }
        }




        // $out['status'] = "success";
        echo json_encode($out);
    }
    public function insertStok()
    {
        $data_staff = $this->session->userdata('data_auth');
        $frek = $this->input->post('stok');
        $idLogistik = $this->input->post('id_logistik');
        $tglExp = $this->input->post('expire');
        $id = $this->input->post('id');
        $harga = $this->input->post('harga');

        $tgl =  date("Y-m-d H:i:s");
        $depo = $this->input->post('depo');

        if ($depo == 'APOTIK') {
            $obat = $this->M_Apotik->getSumObatApotik($idLogistik);

            $stok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $tgl,
                'keterangan' => "MASUK",
                'frek' => $frek,
                'saldo' => $obat['stok'] + ($frek),
                'kadaluarsa' => $tglExp,
                'asal_tujuan' => "FARMASI RSBT",
                'id_req' =>  $id,
                'id_staff' => $data_staff->id_staff,
                'id_resep' => '-',
            );
            $this->M_Obat_racikan->insert($stok, 'stok_apotik');
            $this->M_Apotik->update_perencanaan($idLogistik, 'stok_apotik', 'pr_apotik');

            $out['status'] = "success";
        } else if ($depo == 'IGD') {

            $stok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $tgl,
                'keterangan' => "MASUK",
                'frek' => $frek,
                'kadaluarsa' => $tglExp,
                'asal_tujuan' => "FARMASI RSBT",
                'id_req' =>  $id,
                'id_staff' => $data_staff->id_staff,
                'id_resep' => '-',
            );
            $this->M_Obat_racikan->insert($stok, 'stok_igd');
            $out['status'] = "success";
        } else if ($depo == 'RANAP') {
            $obat = $this->M_Apotik->getSumObatApotik($idLogistik);

            $stok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $tgl,
                'keterangan' => "MASUK",
                'frek' => $frek,
                'saldo' => $obat['stok'] + ($frek),
                'kadaluarsa' => $tglExp,
                'asal_tujuan' => "FARMASI RSBT",
                'id_req' =>  $id,
                'id_staff' => $data_staff->id_staff,
                'id_resep' => '-',
            );
            $this->M_Obat_racikan->insert($stok, 'stok_depo');
            $this->M_Apotik->update_perencanaan($idLogistik, 'stok_depo', 'pr_depo');

            $out['status'] = "success";
        } else if ($depo == 'GUDANG') {
            $obat = $this->M_Apotik->getSumObatGudang($idLogistik);

            $stok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $tgl,
                'keterangan' => "MASUK",
                'frek' => $frek,
                'saldo' => $obat['stok'] + ($frek),
                'kadaluarsa' => $tglExp,
                'asal_tujuan' => "GUDANG FARMASI RSBT",
                'id_struk' =>  $id,
                'id_staff' => $data_staff->id_staff,
            );
            $this->M_Obat_racikan->insert($stok, 'stok_logistik');

            $out['status'] = "success";
        }


        $this->M_Obat_racikan->update(['id_logistik' => $idLogistik], ['harga_cost' => $harga], 'list_logistik');


        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_list_racikan()
    {
        $id = $this->input->post('id');


        $page_data = $this->M_Obat_racikan->selectDataJoin($id);
        echo json_encode($page_data);
    }
    public function hapus_obat()
    {
        $id = $this->input->post('id');
        $this->M_Apotik->delete_tindakan($id, 'stok_apotik', 'id_stok');
        $this->M_Apotik->delete_tindakan($id, 'stok_depo', 'id_stok');
        $this->M_Apotik->delete_tindakan($id, 'stok_logistik', 'id_stok');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function hapus_racikan()
    {
        $id = $this->input->post('id');
        $this->M_Apotik->delete_tindakan($id, 'stok_apotik', 'id_req');
        $this->M_Apotik->delete_tindakan($id, 'stok_depo', 'id_req');
        $this->M_Apotik->delete_tindakan($id, 'stok_logistik', 'id_struk');
        $out['status'] = "success";
        echo json_encode($out);
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
