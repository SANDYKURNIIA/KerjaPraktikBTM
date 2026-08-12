<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class OK_Pasien extends CI_Controller
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
        $page_data['page_content'] = 'page_content/OK_Pasien';
        $page_data['operasi'] = $this->M_OK_pasien->getOperasi();
        $page_data['tipe'] = $this->M_OK_pasien->getTipe();

        $page_data['kamar'] = $this->M_OK_pasien->getKamar();
        $page_data['data_dokter'] = $this->M_OK_pasien->selectNamaDPJP();
        $page_data['obat'] = $this->M_OK_pasien->getNamaObat();
        $page_data['poli'] = $this->db->get_where('list_poli', array('status_dokter' => 'ADA'))->result_array();

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function form($id_pel, $id_his)
    {
        $this->load->view('assets/_header');
        $staff = $this->session->userdata('data_auth');

        $id_pelayanan = base64_decode(urldecode($id_pel));
        $id_history = base64_decode(urldecode($id_his));
        $selectPasien = $this->M_OK_pasien->selectDataPasienby_id_row($id_pelayanan, $id_history);
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_histori'] = $id_history;
        $page_data['nama'] = $selectPasien->nama;
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['nama_dokter'] = $selectPasien->nama_dokter;

        $this->load->model('M_Erm_ranap');
        $asses_per_ranap_exists = $this->M_Erm_ranap->checkAsesmenPerawatRanap($id_pelayanan, $id_history);
        $page_data['btn_asesmen_perawat'] = $asses_per_ranap_exists ? 'btn-danger' : 'btn-success';

        $page_data['page_content'] = 'erm_form/OK/view_erm';

        $page_data['operasi'] = $this->M_OK_pasien->getOperasi();
        $page_data['tipe'] = $this->M_OK_pasien->getTipe();

        $page_data['kamar'] = $this->M_OK_pasien->getKamar();
        $page_data['data_dokter'] = $this->M_OK_pasien->selectNamaDPJP();
        if ($staff->ruangan == 'Cendrawasih') {
            $this->load->model('M_Rawatinap');
            $this->load->model('M_Apotik');
            $page_data['obat_ruang'] = $this->M_Rawatinap->getNamaObatRuang('stok_ranap');
            $page_data['signa'] = $this->M_Apotik->getSigna();
            $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
            // print_r($this->M_Rawatinap->getNamaObatRuang('stok_ranap'));
        }
        $page_data['obat'] = $this->M_OK_pasien->getNamaObat();

        $page_data['poli'] = $this->db->get_where('list_poli', array('status_dokter' => 'ADA'))->result_array();

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Poli()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/OK_Pasien_poli';
        $page_data['operasi'] = $this->M_OK_pasien->getOperasi();
        $page_data['tipe'] = $this->M_OK_pasien->getTipe();

        $page_data['kamar'] = $this->M_OK_pasien->getKamar();
        $page_data['data_dokter'] = $this->M_OK_pasien->selectNamaDPJP();
        $page_data['obat'] = $this->M_OK_pasien->getNamaObat();
        $page_data['poli'] = $this->db->get_where('list_poli', array('status_dokter' => 'ADA'))->result_array();

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien()
    {
        $auth = $this->session->userdata('data_auth');
        $page_data = $this->M_OK_pasien->selectPasien();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan =     "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' ><i class='icon-rocket'></i></a>";
            $list_dokter =     "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanDokter(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' ><i class='icon-rocket'></i></a>";
            $obat = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanObat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";
            $alkes = "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='listAlkes(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";

            $antrian_operasi = $this->db->get_where('antrian_operasi', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            if (!empty($antrian_operasi)) {
                $antrian = "<span class='label label-success capitalize-font inline-block'>Sudah Input Antrian</span>";
            } else {
                $antrian = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='antrian(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";
            }

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;
            $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('OK_Pasien/form/' . urlencode(base64_encode($page_data[$i]->id_pelayanan)) . '/' . urlencode(base64_encode($page_data[$i]->id_history))) . "><i class='icon-note'></i></a>";
            if ($auth->tipe == "cssd") {
                $out[$i] = array($no, $obat, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $jenis_pelayanan, $poli, $cara_bayar, $diagnosa, $dokter);
            } else {
                $out[$i] = array($no, $erm, $antrian, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $jenis_pelayanan, $poli, $cara_bayar, $diagnosa, $dokter);
            }
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }
    public function tampil_pasien_poli()
    {
        $auth = $this->session->userdata('data_auth');
        $page_data = $this->M_OK_pasien->selectPasien_poli();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan =     "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' ><i class='icon-rocket'></i></a>";
            $list_dokter =     "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanDokter(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' ><i class='icon-rocket'></i></a>";
            $obat = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanObat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";
            $alkes = "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='listAlkes(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";

            $antrian_operasi = $this->db->get_where('antrian_operasi', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            if (!empty($antrian_operasi)) {
                $antrian = "<span class='label label-success capitalize-font inline-block'>Sudah Input Antrian</span>";
            } else {
                $antrian = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='antrian(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";
            }

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('OK_Pasien/form/' . urlencode(base64_encode($page_data[$i]->id_pelayanan)) . '/' . urlencode(base64_encode($page_data[$i]->id_history))) . "><i class='icon-note'></i></a>";
            if ($auth->tipe == "cssd") {
                $out[$i] = array($no, $obat, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $jenis_pelayanan, $poli, $cara_bayar, $diagnosa, $dokter);
            } else {
                $out[$i] = array($no, $erm, $antrian, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $jenis_pelayanan, $poli, $cara_bayar, $diagnosa, $dokter);
            }
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }
    //Alkes
    public function viewDataAlkes()
    {
        $id_Pel = $this->input->post("idPelayanan");
        $query = $this->db->get_where("tindakan_ok", array('id_pelayanan' => $id_Pel))->result();
        $no = 0;
        $out = null;
        for ($i = 0; $i < count($query); $i++) {
            $hapus = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_alkes(\"" . $query[$i]->id_tindakan . "\",\"" . $query[$i]->id_tindakan_ok . "\")'><i class='icon-trash'></i></a>";
            $nmTindakan = $query[$i]->id_tindakan;
            $harga = "Rp " . number_format($query[$i]->harga, 0, ',', '.');
            $tipe = $query[$i]->tipe_tindakan;
            $quantity = $query[$i]->frek;
            $total = "Rp " . number_format($query[$i]->total, 0, ',', '.');
            $ket = $query[$i]->keterangan;
            $id_staff = $this->db->get_where('staff', ['id_staff' => $query[$i]->id_staff])->row()->nama;
            $no++;
            $out[$i] = array($no, $hapus, $nmTindakan, $tipe, $harga, $quantity, $total, $ket, $id_staff);
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

    public function insertDataAlkes()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 13; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        $data_staff = $this->session->userdata('data_auth');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $nmTindakanAlkes = $this->input->post('nmTindakanAlkes');
        $tipeTindakan = $this->input->post('tipeTindakanAlkes');
        $hargaTindakan = $this->input->post('hargaTindakanAlkes');
        $jmlTindakanAlkes = $this->input->post('jmlTindakanAlkes');
        $totalHargaAlkes = $this->input->post('totalHargaAlkes');
        $keteranganAlkes = $this->input->post('keteranganAlkes');
        $id_staff = $data_staff->id_staff;
        $tanggal = date("Y-m-d H:i:s");
        $data = array(
            "id_tindakan_ok" => $randomString,
            "harga" => $hargaTindakan,
            "frek" => $jmlTindakanAlkes,
            "id_pelayanan" => $id_pelayanan,
            "id_tindakan" => $nmTindakanAlkes,
            "tipe_tindakan" => $tipeTindakan,
            "total" => $totalHargaAlkes,
            "tanggal" => $tanggal,
            "keterangan" => $keteranganAlkes,
            "id_staff" => $id_staff
        );
        $this->M_OK_pasien->insert_tindakan_dokter($data, 'tindakan_ok');
        $res["status"] = "mantab";
        echo json_encode($res);
    }

    public function hapusAlkes()
    {
        $idTindakan = $this->input->post("idTindakanAlkes");
        $this->M_OK_pasien->delete_tindakan($idTindakan, "tindakan_ok", "id_tindakan_ok");
        $out['status'] = "mantab";
        echo json_encode($out);
    }



    //end allkes

    public function getDataPasien()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_OK_pasien->selectDataPasienby_id($id_pelayanan, $id_history);
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
    public function cariTindakan()
    {
        $cara_bayar = $this->input->post('cara_bayar');
        $tipe = $this->input->post('tipe');
        $tipeKamar = $this->input->post('tipeKamar');
        $keterangan = $this->input->post('keterangan');
        $data = $this->M_OK_pasien->getTindakan($tipe, $tipeKamar, $keterangan, $cara_bayar);
        echo json_encode($data);
    }
    public function getAllTIndakan()
    {
        $data = $this->M_OK_pasien->getTindakanAll();
        echo json_encode($data);
    }
    public function getHarga()
    {
        $tindakan = $this->input->post('tindakan');
        $data = $this->M_OK_pasien->getHarga($tindakan);
        echo json_encode($data);
    }
    public function insertTindakanOk()
    {
        $data_staff = $this->session->userdata('data_auth');
        $id_staff = $data_staff->id_staff;
        $id_list_tindakan = $this->input->post('id_list_tindakan');
        $harga = $this->input->post('harga');
        $frek = $this->input->post('frek');
        $total = $this->input->post('total');
        $keterangan = $this->input->post('keterangan');
        $id_tindakan_labor = $this->input->post('id_tindakan_labor');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $dokter = $this->input->post('id_dokter');
        $jenis = $this->input->post('jenis');

        $data = array(
            'id_tindakan_ok' => $id_tindakan_labor,
            'harga' => $harga,
            'frek' => $frek,
            'id_pelayanan' => $id_pelayanan,
            'id_tindakan' => $id_list_tindakan,
            'total' => $total,
            'tanggal' => date("Y-m-d H:i:s"),
            'id_staff' => $id_staff,
            'id_dokter' => $dokter,
            'jenis' => isset($jenis) ? $jenis : 1,
        );
        $this->M_OK_pasien->tambah_tindakan_ok($data);
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_list_tindakan()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_OK_pasien->selectDataTindakanByIdPel($id_pelayanan, 1);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            // 
            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapusTindakan(\"" . $page_data[$i]->id_tindakan_ok . "\",\"" . $page_data[$i]->nama . "\",\"" . $id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $operasi = $page_data[$i]->tipe;
            $tipe = $page_data[$i]->keterangan;
            $jenis = $page_data[$i]->jenis;
            $kamar = $page_data[$i]->tipe_kamar;
            $biaya_tindakan = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $harga = "Rp " . number_format($page_data[$i]->harga, 0, ',', '.');
            $frek = $page_data[$i]->frek;
            $staff = $page_data[$i]->staff;
            $dokter2 = $page_data[$i]->nama_dokter;
            $tombol = $tombol;

            $out[$i] = array($no, $tombol, $nama, $operasi, $tipe, $jenis, $kamar, $harga, $frek, $biaya_tindakan, $staff, $dokter2);
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
    function hapus_data_tindakan()
    {
        $id_tindakan_ok = $this->input->post('id_tindakan_ok');

        $this->M_OK_pasien->hapus_tindakan($id_tindakan_ok);
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_total_harga()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_OK_pasien->Total_Harga_Byid($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $harga  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $out[$i] = array($harga);
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
    public function getDataDokter()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $jenis = explode('_', $id_history);
        if ($jenis[0] == 'ranap') {
            $db = $this->M_OK_pasien->selectDataDokterby_id($id_pelayanan, $id_history);
            if (count($db) > 0) {
                $db = $db[0];
                $db->status_dt = 'found';
            } else {
                $db = null;
                $db['status_dt'] = 'not found';
            }
        } else {
            $db = null;
            $db['status_dt'] = 'found';
        }
        echo json_encode($db);
        exit;
    }
    public function insert_tindakan()
    {
        $id_pelayanan = $this->input->post('idPelayanan');
        $id_tindakan = uniqid();
        $id_dokter = $this->input->post('dokter');
        $tgl =  date("Y-m-d H:i:s");
        $tipe = $this->input->post('tipe');
        $id_staff = '4RJ5004ML5';
        $unit = 'OK';

        $page_data = array(
            'id_list_dokter' => $id_tindakan,
            'id_dokter' => $id_dokter,
            'id_pelayanan' => $id_pelayanan,
            'tipe' => $tipe,
            'unit' => $unit,
            'tanggal' => $tgl,
            'id_staff' => $id_staff,
        );
        $this->M_OK_pasien->insert_tindakan_dokter($page_data, 'list_dokter');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_list_tindakan_dokter()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_OK_pasien->selectDataDokterByIdPel($id_pelayanan);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            // 
            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_tindakan_dokter(\"" . $page_data[$i]->id_list_dokter . "\")' '><i class='fa fa-trash '></i></button>";

            $no = $i + 1;
            $nama_dokter = $page_data[$i]->nama_dokter;
            $tipe = $page_data[$i]->tipe;
            $out[$i] = array($no, $nama_dokter, $tipe, $tombol);
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
    function hapus_data_tindakan_dokter()
    {
        $id_list_dokter = $this->input->post('id_list_dokter');

        $this->M_OK_pasien->delete_tindakan_dokter($id_list_dokter);
        $out['status'] = "success";
        echo json_encode($out);
    }
    ////////////////////////////////Riwayat Pasien ////////////////////////////////////////////////////
    public function riwayat()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/OK_RiwayatPasien';
        $page_data['operasi'] = $this->M_OK_pasien->getOperasi();
        $page_data['tipe'] = $this->M_OK_pasien->getTipe();
        $page_data['jenis'] = $this->M_OK_pasien->getJenis();
        $page_data['kamar'] = $this->M_OK_pasien->getKamar();
        $page_data['data_dokter'] = $this->M_OK_pasien->selectNamaDPJP();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_riwayat_pasien()
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($this->input->post('tipe') == 'range') {
            $page_data = $this->M_OK_pasien->selectRiwayatRange($this->input->post('mulai'), $this->input->post('akhir'));
        } else {
            $page_data = $this->M_OK_pasien->selectRiwayat();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan =     "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' ><i class='icon-rocket'></i></a>";
            $list_dokter =     "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanDokter(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' ><i class='icon-rocket'></i></a>";
            $obat = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanObat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $out[$i] = array($no, $tindakan, $list_dokter, $obat, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $jenis_pelayanan, $poli, $cara_bayar, $diagnosa, $dokter);
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
    public function getDataRiwayat()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_OK_pasien->selectRiwayatby_id($id_pelayanan, $id_history);
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
    public function insert_obat()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        $id_tindakan = uniqid();
        $id_history = $this->input->post('id_history');
        $split = explode('_', $id_history);
        if ($split[0] == "ranap") {
            $tipe = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->id_kamar;
            $jenis_pelayanan = 'RAWAT INAP';
        } else {
            $tipe = "NON";
            $jenis_pelayanan = 'POLI';
        }
        // $kamar = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->id_kamar;
        // $tipe = (!empty($kamar))?$kamar:'NON';
        $page_data = array(
            'id_tindakan_obat_ok' =>  $id_tindakan,
            'harga' => $this->input->post('harga'),
            'frek' => $this->input->post('frek'),
            'id_pelayanan' => $this->input->post('id_pelayanan'),
            'tipe' => $tipe,
            'id_list_tindakan' => $this->input->post('id_list_tindakan'),
            'total' => $this->input->post('total'),
            'kadaluarsa' => $this->input->post('expire'),
            'tanggal' => $tgl,
            'id_staff' => $data->id_staff,
            'tipe_staff' => $data->tipe,
        );


        $obat = $this->M_OK_pasien->getSumObat($this->input->post('id_list_tindakan'));
        $db_farmasi = $this->db->get_where('list_logistik', ['id_logistik' => $this->input->post('id_list_tindakan')])->row();
        // var_dump(($this->input->post('jumlahKurang')/$db_farmasi->satuan_ok));
        if (($obat['stok'] * $db_farmasi->satuan_ok) < $this->input->post('frek')) {
            $out['status'] = "Stok tidak mencukupi permintaan";
        } else {
            $stok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $this->input->post('id_list_tindakan'),
                'tgl' => $tgl,
                'keterangan' => "KELUAR",
                'frek' => ($this->input->post('jumlahKurang') / $db_farmasi->satuan_ok),
                'kadaluarsa' => $this->input->post('expire'),
                'asal_tujuan' => "PENJUALAN",
                'id_req' =>  $id_tindakan,
                'id_staff' => $data->id_staff,
            );
            $this->M_OK_pasien->insert_tindakan($page_data, 'tindakan_obat_ok');
            if ($data->tipe == 'cssd') {
                $this->M_OK_pasien->insert_tindakan($stok, 'stok_cssd');
            } else {
                $this->M_OK_pasien->insert_tindakan($stok, 'stok_ok');
            }
            $out['status'] = "success";
        }


        echo json_encode($out);
    }
    function hapus_obat()
    {
        $data = $this->session->userdata('data_auth');
        $id_tindakan = $this->input->post('id');

        $this->M_OK_pasien->delete_tindakan($id_tindakan, 'tindakan_obat_ok', 'id_tindakan_obat_ok');
        if ($data->tipe == 'cssd') {
            $this->M_OK_pasien->delete_tindakan($id_tindakan, 'stok_cssd', 'id_req');
        } else {
            $this->M_OK_pasien->delete_tindakan($id_tindakan, 'stok_ok', 'id_req');
        }
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_obat()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_OK_pasien->selectObatById($id_pelayanan);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 

            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat(\"" . $page_data[$i]->id_tindakan_obat_ok . "\",\"" . $page_data[$i]->nama .  "\")' '><i class='fa fa-trash '></i></button>";



            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $time = strtotime($page_data[$i]->kadaluarsa);
            $kadaluarsa = strftime("%A, %d %B %Y ", $time);
            $harga_obat = "Rp " . number_format($page_data[$i]->total / $page_data[$i]->frek, 0, ',', '.');
            $jumlah_obat = $page_data[$i]->frek;

            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $staff = $page_data[$i]->staff;


            $out[$i] = array($no, $nama_obat, $kadaluarsa, $harga_obat, $jumlah_obat, $total, $staff, $hapus);
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
    public function print_resep($id_pelayanan, $id_history)
    {
        $data['resep'] = $this->M_OK_pasien->getResepById($id_pelayanan);
        $data['pasien'] = $this->M_OK_pasien->getDataByIdResep($id_pelayanan, $id_history);
        $this->load->view('print/cetak_resep', $data);
    }
    public function tampil_list_total()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_OK_pasien->selectDataTotalByIdPel($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $id_tindakan_igd  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $out[$i] = array($id_tindakan_igd);
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
    // //////ANTRIAN OK

    public function antrian_operasi()
    {
        $data['staff'] = $this->session->userdata('username');
        $data['page_content'] = 'page_content/Antrian_operasi';
        // $data['poli'] = $this->lp->get_poli();
        $this->load->view('assets/_header');
        $this->load->view('Main', $data);
        $this->load->view('assets/_footer');
    }
    public function new_queueok()
    {

        $tanggal = date("Y-m-d");
        $jam = date("H:i:s");

        // $data_output["response"]['status']='Welcome and insert Queue';
        $id_pelayanan = $this->input->post('id_pelayanan');
        $nomorkartu = $this->input->post('nomorkartu');
        $kodepoli = $this->input->post('kodepoli');
        $jenis_tindakan = $this->input->post('jenis_tindakan');
        $tanggal_op = $this->input->post('tanggal_op');
        $db_poli = $this->db->get_where('list_poli', array('kdpoli_bpjs' => $kodepoli))->result();
        // print_arr($db_poli);
        $db_poli = $db_poli[0];
        $id_poli = $db_poli->kdpoli_bpjs;
        $namapoli = $db_poli->nama_panjang;

        $queue_number = $this->M_OK_pasien->next_queue_poli($id_poli, $tanggal_op);
        $id = uniqid();
        // $id = substr(($tanggal . $jam), 2, 16);
        $dataQ['no_kartu'] = sprintf('%013d', $nomorkartu); //null
        $dataQ['id_antrian'] = $id;
        $dataQ['id_pelayanan'] = $id_pelayanan;
        $dataQ['kodepoli'] = $id_poli;
        $dataQ['namapoli'] = $namapoli;
        $dataQ['jenis_tindakan'] = $jenis_tindakan;
        $dataQ['terlaksana'] = '0';
        $dataQ['no_antri'] = $queue_number;
        $dataQ['tanggal'] = $tanggal_op;

        //insertr queue
        $this->M_OK_pasien->insert_tindakan($dataQ, 'antrian_operasi');


        // echo json_encode($cetakoutput);

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function list_jadwal_operasi()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_OK_pasien->getAllRange($mulai, $akhir);
        } else {
            $page_data = $this->M_OK_pasien->getAll();
        }


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tanggal_input);
            $lastupdate = indo_date2($page_data[$i]->tanggal_input);

            $kodebooking = $page_data[$i]->id_antrian;
            $tanggaloperasi = indo_date2($page_data[$i]->tanggal);
            $jenistindakan = $page_data[$i]->jenis_tindakan;
            $kodepoli = $page_data[$i]->kodepoli;
            $no_antri = $page_data[$i]->no_antri;
            $namapoli = $page_data[$i]->namapoli;
            $nopeserta = $page_data[$i]->no_kartu;
            $no_rm = $page_data[$i]->no_rm;
            $nama = $page_data[$i]->nama;
            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapusTindakan(\"" . $kodebooking . "\",\"" . $nama . "\")' '><i class='fa fa-trash '></i></button>";



            $out[$i] = array($no, $tombol, $nama, $no_rm, $nopeserta, $no_antri, $tanggaloperasi, $namapoli, $jenistindakan,  $lastupdate);
            // $cetakoutput = set_api_response($out[$i]);
        }

        // print_arr($cetakoutput);
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            // $page_data['output'] = $cetakoutput;
            echo json_encode($page_data);
            exit;
        }
    }
    public function list_jadwal_operasi_byId()
    {
        $id = $this->input->post('id_pelayanan');

        $page_data = $this->db->get_where('antrian_operasi',['id_pelayanan'=>$id])->result();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;

            $kodebooking = $page_data[$i]->id_antrian;
            $tanggaloperasi = indo_date2($page_data[$i]->tanggal);
            $jenistindakan = $page_data[$i]->jenis_tindakan;
            $namapoli = $page_data[$i]->namapoli;
            $tombol =   "
            <button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_antrian(\"" . $kodebooking . "\")' '><i class='fa fa-trash '></i></button>";
// <button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_antrian(\"" . $kodebooking . "\")' '><i class='fa fa-pencil '></i></button>


            $out[$i] = array($no, $tombol, $namapoli, $tanggaloperasi,$jenistindakan);
            // $cetakoutput = set_api_response($out[$i]);
        }

        // print_arr($cetakoutput);
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            // $page_data['output'] = $cetakoutput;
            echo json_encode($page_data);
            exit;
        }
    }

    function hapus_data_antrian()
    {
        $id_tindakan_ok = $this->input->post('id_tindakan_ok');
        $this->db->delete('antrian_operasi', array('id_antrian' => $id_tindakan_ok));

        // $this->ao->hapus_tindakan(['id_antrian' => $id_tindakan_ok], 'antrian_operasi');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function Laporan_Cetak_so()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Cetak_so_ok';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_cetak_so()
    {
        $page_data = $this->M_OK_pasien->selectCetakSo();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $id_logistik = $page_data[$i]->id_logistik;
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $stok = $page_data[$i]->stok;
            $harga_cost = $page_data[$i]->harga_cost;
            $hargappn = $page_data[$i]->harga_cost * (1 + ($page_data[$i]->ppn / 100));
            $hargappn = intval($hargappn);
            $golongan_obat = $page_data[$i]->golongan_obat;
            $produsen = $page_data[$i]->produsen;
            $diskon = $this->db->query("SELECT diskon_rs from detail_struk 
                 where id_logistik ='$id_logistik' ORDER BY ABS(DATEDIFF(tgl_input, NOW())) ASC limit 1");

            $nilaidiskon = (count($diskon->result()) > 0) ? round(($diskon->row()->diskon_rs / 100), 2) : 0;
            $hnadiskon = round($harga_cost * (1 - $nilaidiskon));

            $out[$i] = array($no, $id_logistik, $nama, $tipe, $stok, $harga_cost, $nilaidiskon, $hargappn, $hnadiskon, '', $golongan_obat, $produsen);
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


    //DuaTindakan
    public function viewDataDuaTindakan()
    {
        $id_Pel = $this->input->post("idPelayanan");
        $query = $this->M_OK_pasien->selectDataTindakanByIdPel($id_Pel, 2);
        $no = 0;
        $out = null;
        for ($i = 0; $i < count($query); $i++) {
            $hapus = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_dua_tindakan(\"" . $query[$i]->nama . "\",\"" . $query[$i]->id_tindakan_ok . "\")'><i class='icon-trash'></i></a>";
            $nmTindakan = $query[$i]->nama;
            $harga = "Rp " . number_format($query[$i]->harga, 0, ',', '.');
            $tipe = $query[$i]->tipe;
            $quantity = $query[$i]->frek;
            $total = "Rp " . number_format($query[$i]->total, 0, ',', '.');
            $id_staff = $query[$i]->staff;
            $dokter = $query[$i]->nama_dokter;
            $no++;
            $out[$i] = array($no, $hapus, $nmTindakan, $harga, $quantity, $total, $id_staff, $dokter);
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
    public function hapus_dua_tindakan()
    {
        $idTindakan = $this->input->post("idTindakanDuaTindakan");
        $this->M_OK_pasien->delete_tindakan($idTindakan, "dua_tindakan_ok", "id_dua_tindakan");
        $out['status'] = "mantab";
        echo json_encode($out);
    }

    public function insertDataDuaTindakan()
    {
        $tgl = date("Y-m-d h:i:s");
        $staff = $this->session->userdata('data_auth');

        // if ($this->form_validation->run()) {
        $db = array(
            'nm_tindakan' => $this->input->post('nm_tindakan'),
            'id_pelayanan' => $this->input->post('id_pelayanan'),
            'tipe' => $this->input->post('tipe'),
            'harga' => $this->input->post('harga'),
            'jumlah' => $this->input->post('jumlah'),
            'total' => $this->input->post('total'),
            'tgl_input' => $tgl,
            'id_staff' => $staff->id_staff,
            'id_dokter' => $this->input->post('dokter')

        );
        $this->M_OK_pasien->insert_tindakan_dokter($db, 'dua_tindakan_ok');
        $out['status'] = "success";
        echo json_encode($out);
        // } else {
        //     $out['status'] = "error";
        //     echo json_encode($out);
        // }
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class OK_Pasien extends CI_Controller
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
        $page_data['page_content'] = 'page_content/OK_Pasien';
        $page_data['operasi'] = $this->M_OK_pasien->getOperasi();
        $page_data['tipe'] = $this->M_OK_pasien->getTipe();

        $page_data['kamar'] = $this->M_OK_pasien->getKamar();
        $page_data['data_dokter'] = $this->M_OK_pasien->selectNamaDPJP();
        $page_data['obat'] = $this->M_OK_pasien->getNamaObat();
        $page_data['poli'] = $this->db->get_where('list_poli', array('status_dokter' => 'ADA'))->result_array();

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function form($id_pel, $id_his)
    {
        $this->load->view('assets/_header');
        $staff = $this->session->userdata('data_auth');

        $id_pelayanan = base64_decode(urldecode($id_pel));
        $id_history = base64_decode(urldecode($id_his));
        $selectPasien = $this->M_OK_pasien->selectDataPasienby_id_row($id_pelayanan, $id_history);
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_histori'] = $id_history;
        $page_data['nama'] = $selectPasien->nama;
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['nama_dokter'] = $selectPasien->nama_dokter;

        $page_data['page_content'] = 'erm_form/OK/view_erm';

        $page_data['operasi'] = $this->M_OK_pasien->getOperasi();
        $page_data['tipe'] = $this->M_OK_pasien->getTipe();

        $page_data['kamar'] = $this->M_OK_pasien->getKamar();
        $page_data['data_dokter'] = $this->M_OK_pasien->selectNamaDPJP();
        if ($staff->ruangan == 'Cendrawasih') {
            $this->load->model('M_Rawatinap');
            $this->load->model('M_Apotik');
            $page_data['obat_ruang'] = $this->M_Rawatinap->getNamaObatRuang('stok_ranap');
            $page_data['signa'] = $this->M_Apotik->getSigna();
            $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
            // print_r($this->M_Rawatinap->getNamaObatRuang('stok_ranap'));
        }
        $page_data['obat'] = $this->M_OK_pasien->getNamaObat();

        $page_data['poli'] = $this->db->get_where('list_poli', array('status_dokter' => 'ADA'))->result_array();

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Poli()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/OK_Pasien_poli';
        $page_data['operasi'] = $this->M_OK_pasien->getOperasi();
        $page_data['tipe'] = $this->M_OK_pasien->getTipe();

        $page_data['kamar'] = $this->M_OK_pasien->getKamar();
        $page_data['data_dokter'] = $this->M_OK_pasien->selectNamaDPJP();
        $page_data['obat'] = $this->M_OK_pasien->getNamaObat();
        $page_data['poli'] = $this->db->get_where('list_poli', array('status_dokter' => 'ADA'))->result_array();

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien()
    {
        $auth = $this->session->userdata('data_auth');
        $page_data = $this->M_OK_pasien->selectPasien();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan =     "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' ><i class='icon-rocket'></i></a>";
            $list_dokter =     "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanDokter(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' ><i class='icon-rocket'></i></a>";
            $obat = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanObat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";
            $alkes = "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='listAlkes(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";

            $antrian_operasi = $this->db->get_where('antrian_operasi', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            if (!empty($antrian_operasi)) {
                $antrian = "<span class='label label-success capitalize-font inline-block'>Sudah Input Antrian</span>";
            } else {
                $antrian = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='antrian(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";
            }

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;
            $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('OK_Pasien/form/' . urlencode(base64_encode($page_data[$i]->id_pelayanan)) . '/' . urlencode(base64_encode($page_data[$i]->id_history))) . "><i class='icon-note'></i></a>";
            if ($auth->tipe == "cssd") {
                $out[$i] = array($no, $obat, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $jenis_pelayanan, $poli, $cara_bayar, $diagnosa, $dokter);
            } else {
                $out[$i] = array($no, $erm, $antrian, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $jenis_pelayanan, $poli, $cara_bayar, $diagnosa, $dokter);
            }
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }
    public function tampil_pasien_poli()
    {
        $auth = $this->session->userdata('data_auth');
        $page_data = $this->M_OK_pasien->selectPasien_poli();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan =     "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' ><i class='icon-rocket'></i></a>";
            $list_dokter =     "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanDokter(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' ><i class='icon-rocket'></i></a>";
            $obat = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanObat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";
            $alkes = "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='listAlkes(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";

            $antrian_operasi = $this->db->get_where('antrian_operasi', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            if (!empty($antrian_operasi)) {
                $antrian = "<span class='label label-success capitalize-font inline-block'>Sudah Input Antrian</span>";
            } else {
                $antrian = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='antrian(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";
            }

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('OK_Pasien/form/' . urlencode(base64_encode($page_data[$i]->id_pelayanan)) . '/' . urlencode(base64_encode($page_data[$i]->id_history))) . "><i class='icon-note'></i></a>";
            if ($auth->tipe == "cssd") {
                $out[$i] = array($no, $obat, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $jenis_pelayanan, $poli, $cara_bayar, $diagnosa, $dokter);
            } else {
                $out[$i] = array($no, $erm, $antrian, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $jenis_pelayanan, $poli, $cara_bayar, $diagnosa, $dokter);
            }
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }
    //Alkes
    public function viewDataAlkes()
    {
        $id_Pel = $this->input->post("idPelayanan");
        $query = $this->db->get_where("tindakan_ok", array('id_pelayanan' => $id_Pel))->result();
        $no = 0;
        $out = null;
        for ($i = 0; $i < count($query); $i++) {
            $hapus = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_alkes(\"" . $query[$i]->id_tindakan . "\",\"" . $query[$i]->id_tindakan_ok . "\")'><i class='icon-trash'></i></a>";
            $nmTindakan = $query[$i]->id_tindakan;
            $harga = "Rp " . number_format($query[$i]->harga, 0, ',', '.');
            $tipe = $query[$i]->tipe_tindakan;
            $quantity = $query[$i]->frek;
            $total = "Rp " . number_format($query[$i]->total, 0, ',', '.');
            $ket = $query[$i]->keterangan;
            $id_staff = $this->db->get_where('staff', ['id_staff' => $query[$i]->id_staff])->row()->nama;
            $no++;
            $out[$i] = array($no, $hapus, $nmTindakan, $tipe, $harga, $quantity, $total, $ket, $id_staff);
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

    public function insertDataAlkes()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 13; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        $data_staff = $this->session->userdata('data_auth');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $nmTindakanAlkes = $this->input->post('nmTindakanAlkes');
        $tipeTindakan = $this->input->post('tipeTindakanAlkes');
        $hargaTindakan = $this->input->post('hargaTindakanAlkes');
        $jmlTindakanAlkes = $this->input->post('jmlTindakanAlkes');
        $totalHargaAlkes = $this->input->post('totalHargaAlkes');
        $keteranganAlkes = $this->input->post('keteranganAlkes');
        $id_staff = $data_staff->id_staff;
        $tanggal = date("Y-m-d H:i:s");
        $data = array(
            "id_tindakan_ok" => $randomString,
            "harga" => $hargaTindakan,
            "frek" => $jmlTindakanAlkes,
            "id_pelayanan" => $id_pelayanan,
            "id_tindakan" => $nmTindakanAlkes,
            "tipe_tindakan" => $tipeTindakan,
            "total" => $totalHargaAlkes,
            "tanggal" => $tanggal,
            "keterangan" => $keteranganAlkes,
            "id_staff" => $id_staff
        );
        $this->M_OK_pasien->insert_tindakan_dokter($data, 'tindakan_ok');
        $res["status"] = "mantab";
        echo json_encode($res);
    }

    public function hapusAlkes()
    {
        $idTindakan = $this->input->post("idTindakanAlkes");
        $this->M_OK_pasien->delete_tindakan($idTindakan, "tindakan_ok", "id_tindakan_ok");
        $out['status'] = "mantab";
        echo json_encode($out);
    }



    //end allkes

    public function getDataPasien()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_OK_pasien->selectDataPasienby_id($id_pelayanan, $id_history);
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
    public function cariTindakan()
    {
        $cara_bayar = $this->input->post('cara_bayar');
        $tipe = $this->input->post('tipe');
        $tipeKamar = $this->input->post('tipeKamar');
        $keterangan = $this->input->post('keterangan');
        $data = $this->M_OK_pasien->getTindakan($tipe, $tipeKamar, $keterangan, $cara_bayar);
        echo json_encode($data);
    }
    public function getAllTIndakan()
    {
        $data = $this->M_OK_pasien->getTindakanAll();
        echo json_encode($data);
    }
    public function getHarga()
    {
        $tindakan = $this->input->post('tindakan');
        $data = $this->M_OK_pasien->getHarga($tindakan);
        echo json_encode($data);
    }
    public function insertTindakanOk()
    {
        $data_staff = $this->session->userdata('data_auth');
        $id_staff = $data_staff->id_staff;
        $id_list_tindakan = $this->input->post('id_list_tindakan');
        $harga = $this->input->post('harga');
        $frek = $this->input->post('frek');
        $total = $this->input->post('total');
        $keterangan = $this->input->post('keterangan');
        $id_tindakan_labor = $this->input->post('id_tindakan_labor');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $dokter = $this->input->post('id_dokter');
        $jenis = $this->input->post('jenis');

        $data = array(
            'id_tindakan_ok' => $id_tindakan_labor,
            'harga' => $harga,
            'frek' => $frek,
            'id_pelayanan' => $id_pelayanan,
            'id_tindakan' => $id_list_tindakan,
            'total' => $total,
            'tanggal' => date("Y-m-d H:i:s"),
            'id_staff' => $id_staff,
            'id_dokter' => $dokter,
            'jenis' => isset($jenis) ? $jenis : 1,
        );
        $this->M_OK_pasien->tambah_tindakan_ok($data);
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_list_tindakan()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_OK_pasien->selectDataTindakanByIdPel($id_pelayanan, 1);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            // 
            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapusTindakan(\"" . $page_data[$i]->id_tindakan_ok . "\",\"" . $page_data[$i]->nama . "\",\"" . $id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $operasi = $page_data[$i]->tipe;
            $tipe = $page_data[$i]->keterangan;
            $jenis = $page_data[$i]->jenis;
            $kamar = $page_data[$i]->tipe_kamar;
            $biaya_tindakan = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $harga = "Rp " . number_format($page_data[$i]->harga, 0, ',', '.');
            $frek = $page_data[$i]->frek;
            $staff = $page_data[$i]->staff;
            $dokter2 = $page_data[$i]->nama_dokter;
            $tombol = $tombol;

            $out[$i] = array($no, $tombol, $nama, $operasi, $tipe, $jenis, $kamar, $harga, $frek, $biaya_tindakan, $staff, $dokter2);
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
    function hapus_data_tindakan()
    {
        $id_tindakan_ok = $this->input->post('id_tindakan_ok');

        $this->M_OK_pasien->hapus_tindakan($id_tindakan_ok);
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_total_harga()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_OK_pasien->Total_Harga_Byid($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $harga  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $out[$i] = array($harga);
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
    public function getDataDokter()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $jenis = explode('_', $id_history);
        if ($jenis[0] == 'ranap') {
            $db = $this->M_OK_pasien->selectDataDokterby_id($id_pelayanan, $id_history);
            if (count($db) > 0) {
                $db = $db[0];
                $db->status_dt = 'found';
            } else {
                $db = null;
                $db['status_dt'] = 'not found';
            }
        } else {
            $db = null;
            $db['status_dt'] = 'found';
        }
        echo json_encode($db);
        exit;
    }
    public function insert_tindakan()
    {
        $id_pelayanan = $this->input->post('idPelayanan');
        $id_tindakan = uniqid();
        $id_dokter = $this->input->post('dokter');
        $tgl =  date("Y-m-d H:i:s");
        $tipe = $this->input->post('tipe');
        $id_staff = '4RJ5004ML5';
        $unit = 'OK';

        $page_data = array(
            'id_list_dokter' => $id_tindakan,
            'id_dokter' => $id_dokter,
            'id_pelayanan' => $id_pelayanan,
            'tipe' => $tipe,
            'unit' => $unit,
            'tanggal' => $tgl,
            'id_staff' => $id_staff,
        );
        $this->M_OK_pasien->insert_tindakan_dokter($page_data, 'list_dokter');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_list_tindakan_dokter()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_OK_pasien->selectDataDokterByIdPel($id_pelayanan);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            // 
            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_tindakan_dokter(\"" . $page_data[$i]->id_list_dokter . "\")' '><i class='fa fa-trash '></i></button>";

            $no = $i + 1;
            $nama_dokter = $page_data[$i]->nama_dokter;
            $tipe = $page_data[$i]->tipe;
            $out[$i] = array($no, $nama_dokter, $tipe, $tombol);
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
    function hapus_data_tindakan_dokter()
    {
        $id_list_dokter = $this->input->post('id_list_dokter');

        $this->M_OK_pasien->delete_tindakan_dokter($id_list_dokter);
        $out['status'] = "success";
        echo json_encode($out);
    }
    ////////////////////////////////Riwayat Pasien ////////////////////////////////////////////////////
    public function riwayat()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/OK_RiwayatPasien';
        $page_data['operasi'] = $this->M_OK_pasien->getOperasi();
        $page_data['tipe'] = $this->M_OK_pasien->getTipe();
        $page_data['jenis'] = $this->M_OK_pasien->getJenis();
        $page_data['kamar'] = $this->M_OK_pasien->getKamar();
        $page_data['data_dokter'] = $this->M_OK_pasien->selectNamaDPJP();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_riwayat_pasien()
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($this->input->post('tipe') == 'range') {
            $page_data = $this->M_OK_pasien->selectRiwayatRange($this->input->post('mulai'), $this->input->post('akhir'));
        } else {
            $page_data = $this->M_OK_pasien->selectRiwayat();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan =     "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' ><i class='icon-rocket'></i></a>";
            $list_dokter =     "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanDokter(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' ><i class='icon-rocket'></i></a>";
            $obat = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanObat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></a>";

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $out[$i] = array($no, $tindakan, $list_dokter, $obat, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $jenis_pelayanan, $poli, $cara_bayar, $diagnosa, $dokter);
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
    public function getDataRiwayat()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_OK_pasien->selectRiwayatby_id($id_pelayanan, $id_history);
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
    public function insert_obat()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        $id_tindakan = uniqid();
        $id_history = $this->input->post('id_history');
        $split = explode('_', $id_history);
        if ($split[0] == "ranap") {
            $tipe = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->id_kamar;
            $jenis_pelayanan = 'RAWAT INAP';
        } else {
            $tipe = "NON";
            $jenis_pelayanan = 'POLI';
        }
        // $kamar = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->id_kamar;
        // $tipe = (!empty($kamar))?$kamar:'NON';
        $page_data = array(
            'id_tindakan_obat_ok' =>  $id_tindakan,
            'harga' => $this->input->post('harga'),
            'frek' => $this->input->post('frek'),
            'id_pelayanan' => $this->input->post('id_pelayanan'),
            'tipe' => $tipe,
            'id_list_tindakan' => $this->input->post('id_list_tindakan'),
            'total' => $this->input->post('total'),
            'kadaluarsa' => $this->input->post('expire'),
            'tanggal' => $tgl,
            'id_staff' => $data->id_staff,
            'tipe_staff' => $data->tipe,
        );


        $obat = $this->M_OK_pasien->getSumObat($this->input->post('id_list_tindakan'));
        $db_farmasi = $this->db->get_where('list_logistik', ['id_logistik' => $this->input->post('id_list_tindakan')])->row();
        // var_dump(($this->input->post('jumlahKurang')/$db_farmasi->satuan_ok));
        if (($obat['stok'] * $db_farmasi->satuan_ok) < $this->input->post('frek')) {
            $out['status'] = "Stok tidak mencukupi permintaan";
        } else {
            $stok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $this->input->post('id_list_tindakan'),
                'tgl' => $tgl,
                'keterangan' => "KELUAR",
                'frek' => ($this->input->post('jumlahKurang') / $db_farmasi->satuan_ok),
                'kadaluarsa' => $this->input->post('expire'),
                'asal_tujuan' => "PENJUALAN",
                'id_req' =>  $id_tindakan,
                'id_staff' => $data->id_staff,
            );
            $this->M_OK_pasien->insert_tindakan($page_data, 'tindakan_obat_ok');
            if ($data->tipe == 'cssd') {
                $this->M_OK_pasien->insert_tindakan($stok, 'stok_cssd');
            } else {
                $this->M_OK_pasien->insert_tindakan($stok, 'stok_ok');
            }
            $out['status'] = "success";
        }


        echo json_encode($out);
    }
    function hapus_obat()
    {
        $data = $this->session->userdata('data_auth');
        $id_tindakan = $this->input->post('id');

        $this->M_OK_pasien->delete_tindakan($id_tindakan, 'tindakan_obat_ok', 'id_tindakan_obat_ok');
        if ($data->tipe == 'cssd') {
            $this->M_OK_pasien->delete_tindakan($id_tindakan, 'stok_cssd', 'id_req');
        } else {
            $this->M_OK_pasien->delete_tindakan($id_tindakan, 'stok_ok', 'id_req');
        }
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_obat()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_OK_pasien->selectObatById($id_pelayanan);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 

            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat(\"" . $page_data[$i]->id_tindakan_obat_ok . "\",\"" . $page_data[$i]->nama .  "\")' '><i class='fa fa-trash '></i></button>";



            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $time = strtotime($page_data[$i]->kadaluarsa);
            $kadaluarsa = strftime("%A, %d %B %Y ", $time);
            $harga_obat = "Rp " . number_format($page_data[$i]->total / $page_data[$i]->frek, 0, ',', '.');
            $jumlah_obat = $page_data[$i]->frek;

            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $staff = $page_data[$i]->staff;


            $out[$i] = array($no, $nama_obat, $kadaluarsa, $harga_obat, $jumlah_obat, $total, $staff, $hapus);
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
    public function print_resep($id_pelayanan, $id_history)
    {
        $data['resep'] = $this->M_OK_pasien->getResepById($id_pelayanan);
        $data['pasien'] = $this->M_OK_pasien->getDataByIdResep($id_pelayanan, $id_history);
        $this->load->view('print/cetak_resep', $data);
    }
    public function tampil_list_total()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_OK_pasien->selectDataTotalByIdPel($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $id_tindakan_igd  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $out[$i] = array($id_tindakan_igd);
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
    // //////ANTRIAN OK

    public function antrian_operasi()
    {
        $data['staff'] = $this->session->userdata('username');
        $data['page_content'] = 'page_content/Antrian_operasi';
        // $data['poli'] = $this->lp->get_poli();
        $this->load->view('assets/_header');
        $this->load->view('Main', $data);
        $this->load->view('assets/_footer');
    }
    public function new_queueok()
    {

        $tanggal = date("Y-m-d");
        $jam = date("H:i:s");

        // $data_output["response"]['status']='Welcome and insert Queue';
        $id_pelayanan = $this->input->post('id_pelayanan');
        $nomorkartu = $this->input->post('nomorkartu');
        $kodepoli = $this->input->post('kodepoli');
        $jenis_tindakan = $this->input->post('jenis_tindakan');
        $tanggal_op = $this->input->post('tanggal_op');
        $db_poli = $this->db->get_where('list_poli', array('kdpoli_bpjs' => $kodepoli))->result();
        // print_arr($db_poli);
        $db_poli = $db_poli[0];
        $id_poli = $db_poli->kdpoli_bpjs;
        $namapoli = $db_poli->nama_panjang;

        $queue_number = $this->M_OK_pasien->next_queue_poli($id_poli, $tanggal_op);
        $id = uniqid();
        // $id = substr(($tanggal . $jam), 2, 16);
        $dataQ['no_kartu'] = sprintf('%013d', $nomorkartu); //null
        $dataQ['id_antrian'] = $id;
        $dataQ['id_pelayanan'] = $id_pelayanan;
        $dataQ['kodepoli'] = $id_poli;
        $dataQ['namapoli'] = $namapoli;
        $dataQ['jenis_tindakan'] = $jenis_tindakan;
        $dataQ['terlaksana'] = '0';
        $dataQ['no_antri'] = $queue_number;
        $dataQ['tanggal'] = $tanggal_op;

        //insertr queue
        $this->M_OK_pasien->insert_tindakan($dataQ, 'antrian_operasi');


        // echo json_encode($cetakoutput);

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function list_jadwal_operasi()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_OK_pasien->getAllRange($mulai, $akhir);
        } else {
            $page_data = $this->M_OK_pasien->getAll();
        }


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tanggal_input);
            $lastupdate = indo_date2($page_data[$i]->tanggal_input);

            $kodebooking = $page_data[$i]->id_antrian;
            $tanggaloperasi = indo_date2($page_data[$i]->tanggal);
            $jenistindakan = $page_data[$i]->jenis_tindakan;
            $kodepoli = $page_data[$i]->kodepoli;
            $no_antri = $page_data[$i]->no_antri;
            $namapoli = $page_data[$i]->namapoli;
            $nopeserta = $page_data[$i]->no_kartu;
            $no_rm = $page_data[$i]->no_rm;
            $nama = $page_data[$i]->nama;
            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapusTindakan(\"" . $kodebooking . "\",\"" . $nama . "\")' '><i class='fa fa-trash '></i></button>";



            $out[$i] = array($no, $tombol, $nama, $no_rm, $nopeserta, $no_antri, $tanggaloperasi, $namapoli, $jenistindakan,  $lastupdate);
            // $cetakoutput = set_api_response($out[$i]);
        }

        // print_arr($cetakoutput);
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            // $page_data['output'] = $cetakoutput;
            echo json_encode($page_data);
            exit;
        }
    }
    public function list_jadwal_operasi_byId()
    {
        $id = $this->input->post('id_pelayanan');

        $page_data = $this->db->get_where('antrian_operasi',['id_pelayanan'=>$id])->result();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;

            $kodebooking = $page_data[$i]->id_antrian;
            $tanggaloperasi = indo_date2($page_data[$i]->tanggal);
            $jenistindakan = $page_data[$i]->jenis_tindakan;
            $namapoli = $page_data[$i]->namapoli;
            $tombol =   "
            <button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_antrian(\"" . $kodebooking . "\")' '><i class='fa fa-trash '></i></button>";
// <button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_antrian(\"" . $kodebooking . "\")' '><i class='fa fa-pencil '></i></button>


            $out[$i] = array($no, $tombol, $namapoli, $tanggaloperasi,$jenistindakan);
            // $cetakoutput = set_api_response($out[$i]);
        }

        // print_arr($cetakoutput);
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            // $page_data['output'] = $cetakoutput;
            echo json_encode($page_data);
            exit;
        }
    }

    function hapus_data_antrian()
    {
        $id_tindakan_ok = $this->input->post('id_tindakan_ok');
        $this->db->delete('antrian_operasi', array('id_antrian' => $id_tindakan_ok));

        // $this->ao->hapus_tindakan(['id_antrian' => $id_tindakan_ok], 'antrian_operasi');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function Laporan_Cetak_so()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Cetak_so_ok';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_cetak_so()
    {
        $page_data = $this->M_OK_pasien->selectCetakSo();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $id_logistik = $page_data[$i]->id_logistik;
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $stok = $page_data[$i]->stok;
            $harga_cost = $page_data[$i]->harga_cost;
            $hargappn = $page_data[$i]->harga_cost * (1 + ($page_data[$i]->ppn / 100));
            $hargappn = intval($hargappn);
            $golongan_obat = $page_data[$i]->golongan_obat;
            $produsen = $page_data[$i]->produsen;
            $diskon = $this->db->query("SELECT diskon_rs from detail_struk 
                 where id_logistik ='$id_logistik' ORDER BY ABS(DATEDIFF(tgl_input, NOW())) ASC limit 1");

            $nilaidiskon = (count($diskon->result()) > 0) ? round(($diskon->row()->diskon_rs / 100), 2) : 0;
            $hnadiskon = round($harga_cost * (1 - $nilaidiskon));

            $out[$i] = array($no, $id_logistik, $nama, $tipe, $stok, $harga_cost, $nilaidiskon, $hargappn, $hnadiskon, '', $golongan_obat, $produsen);
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


    //DuaTindakan
    public function viewDataDuaTindakan()
    {
        $id_Pel = $this->input->post("idPelayanan");
        $query = $this->M_OK_pasien->selectDataTindakanByIdPel($id_Pel, 2);
        $no = 0;
        $out = null;
        for ($i = 0; $i < count($query); $i++) {
            $hapus = "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_dua_tindakan(\"" . $query[$i]->nama . "\",\"" . $query[$i]->id_tindakan_ok . "\")'><i class='icon-trash'></i></a>";
            $nmTindakan = $query[$i]->nama;
            $harga = "Rp " . number_format($query[$i]->harga, 0, ',', '.');
            $tipe = $query[$i]->tipe;
            $quantity = $query[$i]->frek;
            $total = "Rp " . number_format($query[$i]->total, 0, ',', '.');
            $id_staff = $query[$i]->staff;
            $dokter = $query[$i]->nama_dokter;
            $no++;
            $out[$i] = array($no, $hapus, $nmTindakan, $harga, $quantity, $total, $id_staff, $dokter);
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
    public function hapus_dua_tindakan()
    {
        $idTindakan = $this->input->post("idTindakanDuaTindakan");
        $this->M_OK_pasien->delete_tindakan($idTindakan, "dua_tindakan_ok", "id_dua_tindakan");
        $out['status'] = "mantab";
        echo json_encode($out);
    }

    public function insertDataDuaTindakan()
    {
        $tgl = date("Y-m-d h:i:s");
        $staff = $this->session->userdata('data_auth');

        // if ($this->form_validation->run()) {
        $db = array(
            'nm_tindakan' => $this->input->post('nm_tindakan'),
            'id_pelayanan' => $this->input->post('id_pelayanan'),
            'tipe' => $this->input->post('tipe'),
            'harga' => $this->input->post('harga'),
            'jumlah' => $this->input->post('jumlah'),
            'total' => $this->input->post('total'),
            'tgl_input' => $tgl,
            'id_staff' => $staff->id_staff,
            'id_dokter' => $this->input->post('dokter')

        );
        $this->M_OK_pasien->insert_tindakan_dokter($db, 'dua_tindakan_ok');
        $out['status'] = "success";
        echo json_encode($out);
        // } else {
        //     $out['status'] = "error";
        //     echo json_encode($out);
        // }
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
