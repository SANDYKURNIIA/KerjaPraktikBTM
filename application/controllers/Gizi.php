<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Gizi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Gizi');
        $this->load->model('M_Poli_bedah');
    }


    //Function view

    public function data_gizi()
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Gizi';
        $page_data['data_bentuk_makanan'] = $this->M_Gizi->selectBentukMakanan();
        $page_data['data_bentuk_tindakan'] = $this->M_Gizi->selectBentukTindakan();
        $page_data['data_diet_makanan'] = $this->M_Gizi->selectDietMakanan();
        $page_data['action'] = site_url("Pasien/edit_rawat_jalan");
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function data_gizi_sarapan()
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Gizi_sarapan';
        $page_data['data_bentuk_sarapan'] = $this->M_Gizi->selectBentukSarapan();
        $page_data['data_diet_makanan'] = $this->M_Gizi->selectDietMakanan();
        $page_data['action'] = site_url("Pasien/edit_rawat_jalan");
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_gizi()
    {
        $page_data = $this->M_Gizi->selectDataPasienGiziDiet();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {


            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $no = $i + 1;
            $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $button =
                "<button class='btn btn-primary btn-icon-anim btn-square'  data-toggle='modal' onclick='tambah_makanan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\", \"" . $page_data[$i]->no_rm . "\")'><i class='icon-size-actual'></i></button>";

            $button2 =
                "<button class='btn btn-info btn-icon-anim btn-square'  data-toggle='modal' onclick='tambah_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\", \"" . $page_data[$i]->no_rm . "\")'><i class='icon-frame'></i></button>";


            $out[$i] = array($no, $button, $button2, $no_rm,  $nama, $jenis_kelamin,  $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar,  $tgl_masuk, $jam_masuk,  $diagnosa, $dokter);
        }
        if($out == null){
            echo '{"data":""}';
            exit;
        }else{
            $print['data'] = $out;
            echo json_encode($print);
            exit;
        }
    }
    public function tampil_data_gizi_sarapan()
    {
        $page_data = $this->M_Gizi->selectDataPasienGizi();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {


            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $no = $i + 1;
            $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $menu_sarapan = $page_data[$i]->menu_sarapan;
            $keterangan_gizi = $page_data[$i]->keterangan_gizi;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;
            $print_sarapan = $page_data[$i]->is_print_sarapan;

            if ($menu_sarapan  == null) {
                $menusarapan =  "<span class='badge  badge-warning' style='background-color: darkyellow'>Belum Diinput</span>";
            } else {
                $menusarapan =  $menu_sarapan;
            }


            if ($keterangan_gizi  == null) {
                $ketgizi =  "<span class='badge  badge-warning' style='background-color: darkyellow'>Belum Diinput</span>";
            } else {
                $ketgizi =  $keterangan_gizi;
            }


            $button =
                "<button class='btn btn-primary btn-icon-anim btn-square'  data-toggle='modal' onclick='tambah_sarapan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\", \"" . $page_data[$i]->no_rm . "\", \"" . $page_data[$i]->id_tindakan_gizi . "\")'><i class='icon-cursor-move'></i></button>";
            if ($print_sarapan  == 0 || $print_sarapan  == '') {
                $cetak =
                    "<button class='btn btn-warning btn-icon-anim btn-square'  data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->id_tindakan_gizi . "\")'><i class='icon-printer'></i></button>";
            } else {
                $cetak =
                    "<button class='btn btn-success btn-icon-anim btn-square'  data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->id_tindakan_gizi . "\")'><i class='icon-printer'></i></button>";
            }

            $out[$i] = array($no, $button, $cetak, $no_rm,  $nama,  $tgl_masuk, $jam_masuk, $jenis_kelamin,  $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar,  $menusarapan, $diagnosa,  $ketgizi,  $dokter);
        }
        if($out == null){
            echo '{"data":""}';
            exit;
        }else{
            $print['data'] = $out;
            echo json_encode($print);
            exit;
        }
    }

    public function getMenu()
    {
        $menu = $this->input->post('menu');
        $id_tindakan_gizi = $this->input->post('id_gizi');

        $data = array(
            'id_gizi' =>    $id_tindakan_gizi,

        );
        $this->session->set_userdata('userId', $id_tindakan_gizi);
        $data  = $this->M_Gizi->selectBentukMenuSarapan($menu);

        echo json_encode($data);
       
    }


    public function insert_sarapan()
    {
        $sarapan = $this->input->post('menu');
        $id_tindakan_gizi = $this->input->post('id_tindakan_gizi');
        $data = $this->session->userdata('userId');

        $page_data1 = array(
            'menu_sarapan' => $sarapan,
        );

        $where = array(

            'id_tindakan' => $data,
        );

        $this->M_Gizi->update_print_diet($where, $page_data1, 'tindakan_gizi');

        $out['status'] = "success";

        echo json_encode($out);
    }

    public function getMakanByNoRm()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $no_rm = $this->input->post('no_rm');
        $db = $this->M_Gizi->selectDataMakanByNoRm($id_pelayanan, $id_history, $no_rm);
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
    public function getTindakannByNoRm()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $no_rm = $this->input->post('no_rm');
        $db = $this->M_Gizi->selectDataMakanByNoRm($id_pelayanan, $id_history, $no_rm);
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

    public function print_radiologi()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_tindakan_radiologi = $this->input->post('tindakan');
        $nama_pasien = $this->input->post('a');
        $tgl_lahir = $this->input->post('b');
        $no_rm = $this->input->post('c');
        $cara_bayar = $this->input->post('d');
        $ruang = $this->input->post('e');



        $data = $this->M_Radiologi->getRadiologiById($id_pelayanan, $id_tindakan_radiologi);
        $i = 0;
        if (count($data) > 0) {
            $data = array(

                'nama' =>    $data[$i]->nama,
                'keterangan' =>    $data[$i]->keterangan,
                'tanggal' =>    $data[$i]->tanggal,


            );
        }
        echo json_encode($data);
    }


    public function tampil_list_tindakan()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $no_rm = $this->input->post('no_rm');
        $page_data = $this->M_Gizi->selectDataTindakanByNoRmPel($no_rm);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;
            $print =
                "<button class='btn btn-warning btn-icon-anim btn-square'  data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->bentuk_makanan . "\",\"" . $page_data[$i]->diet_makan . "\", \"" . $page_data[$i]->keterangan_gizi . "\")'><i class='icon-printer'></i></button>";
            $bentuk_makanan = $page_data[$i]->bentuk_makanan;
            $diet_makan = $page_data[$i]->diet_makan;
            $keterangan_gizi = $page_data[$i]->keterangan_gizi;
            $is_print_diet = $page_data[$i]->is_print_diet;
            $tgl_masuk = $date2;

            if ($bentuk_makanan  == null) {
                $bentukmakan =  "<span class='badge  badge-warning' style='background-color: darkyellow'>Belum Diinput</span>";
            } else {
                $bentukmakan =  $bentuk_makanan;
            }

            if ($is_print_diet  == 0 || $is_print_diet  == '') {
                $print =
                    "<button class='btn btn-warning btn-icon-anim btn-square'  data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->bentuk_makanan . "\",\"" . $page_data[$i]->diet_makan . "\", \"" . $page_data[$i]->keterangan_gizi . "\", \"" . $page_data[$i]->id_tindakan_gizi . "\")'><i class='icon-printer'></i></button>";
            } else {
                $print =
                    "<button class='btn btn-success btn-icon-anim btn-square'  data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->bentuk_makanan . "\",\"" . $page_data[$i]->diet_makan . "\", \"" . $page_data[$i]->keterangan_gizi . "\", \"" . $page_data[$i]->id_tindakan_gizi . "\")'><i class='icon-printer'></i></button>";
            }



            if ($diet_makan  == null) {
                $dietmakan =  "<span class='badge  badge-warning' style='background-color: darkyellow'>Belum Diinput</span>";
            } else {
                $dietmakan =  $diet_makan;
            }

            if ($keterangan_gizi  == null) {
                $ketgizi =  "<span class='badge  badge-warning' style='background-color: darkyellow'>Belum Diinput</span>";
            } else {
                $ketgizi =  $keterangan_gizi;
            }
            $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_tindakan(\""  . $page_data[$i]->id_tindakan_gizi . "\",\""  . $page_data[$i]->bentuk_makanan . "\")' '><i class='fa fa-trash'></i></button>";

            $out[$i] = array($no, $print, $bentukmakan,  $dietmakan, $ketgizi, $tgl_masuk, $hapus);
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

    public function tampil_list_makanan()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $no_rm = $this->input->post('no_rm');
        $page_data = $this->M_Gizi->selectDataMakanByNoRmPel($no_rm);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;

            $bentuk_makanan = $page_data[$i]->bentuk_makanan;
            $harga = "Rp " . number_format($page_data[$i]->harga, 0, ',', '.');
            $frek = $page_data[$i]->frek;
            $is_print_tindakan = $page_data[$i]->is_print_tindakan;
            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $tgl_masuk = $date2;

            if ($bentuk_makanan  == null) {
                $bentukmakan =  "<span class='badge  badge-warning' style='background-color: darkyellow'>Belum Diinput</span>";
            } else {
                $bentukmakan =  $bentuk_makanan;
            }


            if ($harga  == null) {
                $hrg =  "<span class='badge  badge-warning' style='background-color: darkyellow'>Belum Diinput</span>";
            } else {
                $hrg =  $harga;
            }

            if ($frek  == null) {
                $frk =  "<span class='badge  badge-warning' style='background-color: darkyellow'>Belum Diinput</span>";
            } else {
                $frk =  $frek;
            }


            if ($total  == null) {
                $ttl =  "<span class='badge  badge-warning' style='background-color: darkyellow'>Belum Diinput</span>";
            } else {
                $ttl =  $total;
            }

            if ($is_print_tindakan  == 0 || $is_print_tindakan  == '') {
                $print =
                    "<button class='btn btn-warning btn-icon-anim btn-square'  data-toggle='modal' onclick='cetak1(\"" . $page_data[$i]->bentuk_makanan . "\",\"" . $page_data[$i]->harga . "\", \"" . $page_data[$i]->frek . "\", \"" . $page_data[$i]->total . "\", \"" . $page_data[$i]->id_tindakan . "\")'><i class='icon-printer'></i></button>";
            } else {
                $print =
                    "<button class='btn btn-success btn-icon-anim btn-square'  data-toggle='modal' onclick='cetak1(\"" . $page_data[$i]->bentuk_makanan . "\",\"" . $page_data[$i]->harga . "\", \"" . $page_data[$i]->frek . "\", \"" . $page_data[$i]->total . "\", \"" . $page_data[$i]->id_tindakan . "\")'><i class='icon-printer'></i></button>";
            }


            $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_tindakan1(\""  . $page_data[$i]->id_tindakan . "\",\""  . $page_data[$i]->bentuk_makanan . "\")' '><i class='fa fa-trash'></i></button>";
            $out[$i] = array($no, $print, $bentukmakan,  $hrg, $frk, $ttl, $tgl_masuk, $hapus);
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

    public function insertTindakanMakanan()
    {
        $id_pelayanan = $this->input->post('idPelayanan');
        $id_tindakan_gizi = uniqid();
        $bentuk_makanan = $this->input->post('bentuk_makanan');

        $idHis = $this->input->post('idHis');
        $tgl =  date("Y-m-d H:i:sa");

        $harga = $this->input->post('harga');
        $frek = $this->input->post('frek');
        $total = $this->input->post('total');

        $data = $this->session->userdata('data_auth');
        $datatipe = $data->id_staff;
        $id_staff = $datatipe;


        $page_data = array(
            'id_tindakan' => $id_tindakan_gizi,
            'bentuk_makanan' => $bentuk_makanan,
            'id_pelayanan' => $id_pelayanan,
            'tanggal' => $tgl,
            'id_staff' => $id_staff,
            'is_print_tindakan' => '0',
            'tgl_print_tindakan' => $tgl,
            'harga' => $harga,
            'frek' => $frek,
            'total' => $total

        );

        $this->M_Gizi->insert_tindakan_gizi($page_data, 'tindakan_makanan');


        $out['status'] = "success";

        echo json_encode($out);
    }

    public function insertTindakanGiziMakanan()
    {
        $id_pelayanan = $this->input->post('idPelayanan');
        $id_tindakan_gizi = uniqid();
        $bentuk_makanan = $this->input->post('bentuk_makanan');
        $diet_makanan = $this->input->post('diet_makanan');
        $keterangan_gizi = $this->input->post('keterangan_gizi');
        $idHis = $this->input->post('idHis');
        $tgl =  date("Y-m-d H:i:sa");



        $data = $this->session->userdata('data_auth');
        $datatipe = $data->id_staff;
        $id_staff = $datatipe;

        $page_data = array(
            'id_tindakan' => $id_tindakan_gizi,
            'bentuk_makanan' => $bentuk_makanan,
            'diet_makan' => $diet_makanan,
            'keterangan' => $keterangan_gizi,
            'menu_sarapan' => '-',
            'is_print_sarapan' => '0',
            'is_print_diet' => '0',
            'id_pelayanan' => $id_pelayanan,
            'tanggal' => $tgl,
            'id_staff' => $id_staff,

        );

        $this->M_Gizi->insert_tindakan_gizi($page_data, 'tindakan_gizi');
    }

    public function print_gizi()
    {
        $id_pelayanan = $this->input->post('idPelayanan');
        $diet_makanan = $this->input->post('diet_makanan');
        $bentuk_makanan = $this->input->post('bentuk_makanan');
        $id_tindakan_gizi = $this->input->post('id_tindakan_gizi');
        $keterangan_gizi = $this->input->post('keterangan_gizi');
        $idHis = $this->input->post('idHis');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $nama = $this->input->post('nama');
        $ruang = $this->input->post('ruang');
        $no_rm = $this->input->post('no_rm');


        $page_data = array(
            'id_pelayanan' => $id_pelayanan,
            'dietmakanan' => $diet_makanan,
            'keterangan_gizi' => $keterangan_gizi,
            'idHis' => $idHis,
            'bentuk_makanan' => $bentuk_makanan,
            'tgl_lahir' => $tgl_lahir,
            'nama' => $nama,
            'ruang' => $ruang,
            'no_rm' => $no_rm,
        );
        $page_data1 = array(
            'is_print_diet' => '1',
        );

        $where = array(

            'id_tindakan' => $id_tindakan_gizi,
        );

        $this->M_Gizi->update_print_diet($where, $page_data1, 'tindakan_gizi');

        echo json_encode($page_data);
    }
    public function print_gizi1()
    {
        $id_pelayanan = $this->input->post('idPelayanan');
        $harga = $this->input->post('harga');
        $bentuk_makanan = $this->input->post('bentuk_makanan');
        $frek = $this->input->post('frek');
        $total = $this->input->post('total');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $nama = $this->input->post('nama');
        $ruang = $this->input->post('ruang');
        $no_rm = $this->input->post('no_rm');
        $id_tindakan = $this->input->post('id_tindakan');



        $page_data = array(
            'id_pelayanan' => $id_pelayanan,
            'harga' => $harga,
            'frek' => $frek,
            'total' => $total,
            'bentuk_makanan' => $bentuk_makanan,
            'tgl_lahir' => $tgl_lahir,
            'nama' => $nama,
            'ruang' => $ruang,
            'no_rm' => $no_rm,
        );
        // var_dump($page_data);
        // die;
        $page_data1 = array(
            'is_print_tindakan' => '1',
        );

        $where = array(

            'id_tindakan' => $id_tindakan,
        );

        $this->M_Gizi->update_print_tindakan($where, $page_data1, 'tindakan_makanan');
        echo json_encode($page_data);
    }
    public function print_sarapan()
    {
        $id_pelayanan = $this->input->post('idPelayanan');
        $diet_makanan = $this->input->post('diet_makanan');
        $bentuk_makanan = $this->input->post('bentuk_makanan');
        $id_tindakan_gizi = $this->input->post('id_tindakan_gizi');
        $keterangan_gizi = $this->input->post('keterangan_gizi');
        $idHis = $this->input->post('idHis');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $nama = $this->input->post('nama');
        $ruang = $this->input->post('ruang');
        $no_rm = $this->input->post('no_rm');

        $page_data = $this->M_Gizi->getMenuSarapan($id_tindakan_gizi);
        $i = 0;
        $page_data = array(
            'nama' => $page_data[$i]->nama,
            'tgl_lahir' => $page_data[$i]->tgl_lahir,
            'no_rm' => $page_data[$i]->no_rm,
            'poli' => $page_data[$i]->poli,
            'menu_sarapan' => $page_data[$i]->menu_sarapan,

        );

        $page_data1 = array(
            'is_print_sarapan' => '1',
        );

        $where = array(

            'id_tindakan' => $id_tindakan_gizi,
        );

        $this->M_Gizi->update_print_diet($where, $page_data1, 'tindakan_gizi');

        echo json_encode($page_data);
    }
    public function hapus_data_tindakan()
    {
        $id_tindakan_gizi = $this->input->post('id_tindakan_gizi');
        $data = $this->session->userdata('data_auth');
        $id_staff = $data->id_staff;
        $where1 = array(
            'id_tindakan' => $id_tindakan_gizi
        );
        $page_data1 = array(
            'ket' => '1',
            'staff_delete' => $id_staff,

        );
        $this->M_Gizi->delete_tindakan($where1, $page_data1, 'tindakan_gizi');


        $out['status'] = "success";
        echo json_encode($out);
    }
    public function hapus_data_tindakan1()
    {
        $id_tindakan_gizi = $this->input->post('id_tindakan_gizi');
        $data = $this->session->userdata('data_auth');
        $id_staff = $data->id_staff;
        $where1 = array(
            'id_tindakan' => $id_tindakan_gizi
        );
        $page_data1 = array(
            'ket' => '1',
            'staff_delete' => $id_staff,

        );
        $this->M_Gizi->delete_tindakan($where1, $page_data1, 'tindakan_makanan');


        $out['status'] = "success";
        echo json_encode($out);
    }
}
