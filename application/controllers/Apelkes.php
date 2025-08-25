<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Apelkes extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Apelkes');
        $this->load->model('M_Kasir');
        $this->load->model('M_Kasir_ranap');
        $this->load->model('M_Pasien');
        $this->api = "http://192.168.87.2:8181/";
        //$this->api = "http://36.92.141.4/rest_ci/index.php";
        $this->load->library('curl');
    }

    //Function view
    public function index() //Apelkes
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Apelkes';
        $page_data['data_dokter'] = $this->M_Apelkes->selectDokter();
        $page_data['data_tipe_kamar'] = $this->M_Apelkes->selectTipeKamar();
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();

        $page_data['action'] = site_url("Pasien/edit_rawat_jalan");
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    // APELKES RANAP ////
    public function ranap() //Apelkes
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Apelkes_ranap';
        $page_data['data_dokter'] = $this->M_Apelkes->selectDokter();
        $page_data['data_tipe_kamar'] = $this->M_Apelkes->selectTipeKamar();
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();

        $page_data['action'] = site_url("Pasien/edit_rawat_jalan");
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function tampil_data_apelkes_ranap() //Apelkes
    {
        $page_data = $this->M_Apelkes->selectDataPasienRawatJalan();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $edit =
                "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tindakan_apelkes(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket '></i></button>";

            $delete =
                "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal'  onclick='total_biaya(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-note'></i></button>";
            $igd = "<button class='btn btn-info btn-icon-anim btn-square' onclick='print_apelkes(\"igd\",\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-printer'></i></button>";
            $ranap = "<button class='btn btn-danger btn-icon-anim btn-square' onclick='print_apelkes(\"ranap\",\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-printer'></i></button>";
            $obatigd = "<button class='btn btn-success btn-icon-anim btn-square' onclick='print_apelkes(\"obatigd\",\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-printer'></i></button>";
            $obatranap = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='print_apelkes(\"obatranap\",\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-printer'></i></button>";
            $farmasi = "<button style='background-color: #A569BD' class='btn btn-icon-anim btn-square' onclick='print_apelkes(\"farmasi\",\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-printer'></i></button>";
            $tombol1 = "<a title='Billing Diluar Tanggungan' style='background-color: #886451'  class='btn btn-icon-anim btn-square' href='" . base_url() . "Kasir/print_ptt/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history  . "' target='_blank'><i class='icon-printer'></i></a>";

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
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;


            $out[$i] = array($no, $delete, $tombol1, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang,  $cara_bayar, $diagnosa, $dokter);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }

    public function detail_tindakan() //Detail Tindakan
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/detail_tindakanOK';
        $page_data['data_dokter'] = $this->M_Apelkes->selectDokter();
        $page_data['data_tipe_kamar'] = $this->M_Apelkes->selectTipeKamar();
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();

        $page_data['action'] = site_url("Pasien/edit_rawat_jalan");
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_apelkes() //Apelkes
    {
        $page_data = $this->M_Apelkes->selectDataPasienRawatJalan();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $edit =
                "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tindakan_apelkes(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket '></i></button>";

            $delete = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal'  onclick='total_biaya(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-note'></i></button>";
            $igd = "<button class='btn btn-info btn-icon-anim btn-square' onclick='print_apelkes(\"igd\",\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-printer'></i></button>";
            $ranap = "<button class='btn btn-danger btn-icon-anim btn-square' onclick='print_apelkes(\"ranap\",\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-printer'></i></button>";
            $obatigd = "<button class='btn btn-success btn-icon-anim btn-square' onclick='print_apelkes(\"obatigd\",\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-printer'></i></button>";
            $obatranap = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='print_apelkes(\"obatranap\",\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-printer'></i></button>";
            $farmasi = "<button style='background-color: #A569BD' class='btn btn-icon-anim btn-square' onclick='print_apelkes(\"farmasi\",\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-printer'></i></button>";
            $tombol1 = "<a title='Billing Diluar Tanggungan' style='background-color: #886451'  class='btn btn-icon-anim btn-square' href='" . base_url() . "Kasir/print_ptt/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history  . "' target='_blank'><i class='icon-printer'></i></a>";

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
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;


            $out[$i] = array($no, $delete, $tombol1, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang,  $cara_bayar, $diagnosa, $dokter);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }

    public function getApelkesByIdPelayanan() // Apelkes
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Apelkes->selectDataApelkesJalanby_id($id_pelayanan, $id_history);
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

    public function getTindakanByTipeKamar() // Apelkes
    {
        $tipe_kamar = $this->input->post('tipe_kamar');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $dbpel = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
        if (
            $dbpel->cara_bayar == '333' || $dbpel->cara_bayar == 'a74' || $dbpel->cara_bayar == 'b4' || $dbpel->cara_bayar == 'b5' || $dbpel->cara_bayar == 'b1'
        ) {
            $data = $this->M_Apelkes->getTipeKamar_lama($tipe_kamar);
        } else {
            $data = $this->M_Apelkes->getTipeKamar($tipe_kamar);
        }
        echo json_encode($data);
    }
    public function getVisite() // Apelkes
    {
        $tipe_kamar = $this->input->post('tipe_kamar');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $dpjp = $this->input->post('dpjp');
        $data = $this->M_Apelkes->getVisite($tipe_kamar, $id_pelayanan, $dpjp);
        echo json_encode($data);
    }
    public function getVisite_diskon() // Apelkes
    {
        $tipe_kamar = $this->input->post('tipe_kamar');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $dpjp = $this->input->post('dpjp');
        $data = $this->M_Apelkes->getVisite_diskon($tipe_kamar, $id_pelayanan, $dpjp);
        echo json_encode($data);
    }
    public function getTindakanByTipeKamarLabor() // Labor
    {
        $tipe_kamar = $this->input->post('tipe_kamar');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $dbpel = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
        if (
            $dbpel->cara_bayar == '333' || $dbpel->cara_bayar == 'a74' || $dbpel->cara_bayar == 'b1' || $dbpel->cara_bayar == 'b4' || $dbpel->cara_bayar == 'b5'
        ) {
            $data = $this->M_Apelkes->getTipeKamarLabor_lama($tipe_kamar);
        } else {
            $data = $this->M_Apelkes->getTipeKamarLabor($tipe_kamar);
        }
        echo json_encode($data);
    }
    public function getTindakanByTipeKamarRadiologi() // Radiologi
    {
        $tipe_kamar = $this->input->post('tipe_kamar');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $dbpel = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
        if (
            $dbpel->cara_bayar == '333' || $dbpel->cara_bayar == 'a74' || $dbpel->cara_bayar == 'b4' || $dbpel->cara_bayar == 'b5' || $dbpel->cara_bayar == 'b1'
        ) {
            $data = $this->M_Apelkes->getTipeKamarRadiologi_lama($tipe_kamar);
        } else {
            $data = $this->M_Apelkes->getTipeKamarRadiologi($tipe_kamar);
        }
        echo json_encode($data);
    }

    public function tampil_list_tindakan() // Apelkes
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Apelkes->selectDataTindakanByIdPel($id_pelayanan);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='delete_data_tindakan(\"" . $page_data[$i]->id_tindakan_apelkes . "\",\"" . $id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            $no = $i + 1;
            $nama_tindakan = $page_data[$i]->nama;
            $tanggal = $page_data[$i]->tanggal;
            $tipe_kamar = $page_data[$i]->tipe_kamar;
            $harga = "Rp " . number_format($page_data[$i]->harga, 0, ',', '.');
            $frek = $page_data[$i]->frek;
            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $nama_dokter = $page_data[$i]->dokter;
            $nama_staff = $page_data[$i]->staff;
            $status_pembayaran = $page_data[$i]->status_pembayaran;
            $tombol = $tombol;

            $out[$i] = array($no, $nama_tindakan,  $tipe_kamar, $harga, $frek, $total, $tanggal, $nama_dokter, $nama_staff, $status_pembayaran, $tombol);
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
    public function tampil_list_tindakan_visite() // Apelkes
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Apelkes->selectDataTindakanByIdPelVisite($id_pelayanan);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='delete_data_tindakan(\"" . $page_data[$i]->id_tindakan_apelkes . "\",\"" . $id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            $no = $i + 1;
            $nama_tindakan = $page_data[$i]->nama;
            $tipe_kamar = $page_data[$i]->tipe_kamar;
            $tanggal = $page_data[$i]->tanggal;
            $harga = "Rp " . number_format($page_data[$i]->harga, 0, ',', '.');
            $frek = $page_data[$i]->frek;
            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $nama_dokter = $page_data[$i]->dokter;
            $nama_staff = $page_data[$i]->staff;
            $tombol = $tombol;

            $out[$i] = array($no, $nama_tindakan,  $tipe_kamar, $harga, $frek, $total, $tanggal, $nama_dokter, $nama_staff, $tombol);
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
    public function tampil_list_kamar() //Apelkes
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Apelkes->selectDataKamarByIdPel($id_pelayanan);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $kelas_ruangan = $page_data[$i]->kelas_ruangan;
            $tipe = $page_data[$i]->tipe;
            $tanggal_masuk = $page_data[$i]->tanggal_masuk;
            $tanggal_keluar = $page_data[$i]->tanggal_keluar;
            $status = $page_data[$i]->status;

            $out[$i] = array($no, $kelas_ruangan,  $tipe, $tanggal_masuk, $tanggal_keluar, $status);
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

    public function tampil_total_harga() //Apelkes
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Apelkes->Total_Harga_Byid($id_pelayanan);
        $out = null;


        for ($i = 0; $i < count($page_data); $i++) {
            $total  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $out[$i] = array($total);
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
    public function tampil_total_harga_visite() //Apelkes
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Apelkes->Total_Harga_Byid_visite($id_pelayanan);
        $out = null;


        for ($i = 0; $i < count($page_data); $i++) {
            $total  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $out[$i] = array($total);
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

    function hapus_data_tindakan() //Apelkes
    {
        $id_tindakan_apelkes = $this->input->post('id_tindakan_apelkes');

        $this->M_Apelkes->delete_tindakan($id_tindakan_apelkes);
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function insert_tindakan() // apelkes
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_tindakan_poli_mata = uniqid();
        $id_list_tindakan = $this->input->post('id_list_tindakan');
        $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
        if ($pelayanan->status_rawat == 'selesai') {
            $out['status'] = "Pasien sudah dicheckout";
        } else {



            $data = $this->session->userdata('data_auth');
            $datatipe = $data->id_staff;
            $id_staff = $datatipe;
            $db_kamar = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $this->input->post('id_history')]);
            $frek = $this->input->post('frek');
            $id_dokter = $this->input->post('dokter');
            if ($this->input->post('tgl_visite')) {
                $tgl = $this->input->post('tgl_visite');
            } else {
                if ($db_kamar->row()->tgl_keluar != NULL) {
                    $tgl =  $db_kamar->row()->tgl_keluar;
                } else {
                    $tgl =  date("Y-m-d H:i:s");
                }
            }
            // if(count($db_kamar->result())>0){
            $tipe = $db_kamar->row()->id_kamar;
            // }else{
            //     $tipe = "NON";
            // }
            $list_apelkes = $this->db->get_where('list_tindakan_apelkes', ['id_list_tindakan_apelkes' => $id_list_tindakan])->row();
            $sewa_kamar = $this->M_Apelkes->cekSewaKamar($id_pelayanan, date('Y-m-d'));

            $visite = $this->M_Apelkes->countVisiteBpjs($id_pelayanan, $id_dokter);
            $visite_icu = $this->M_Apelkes->countVisiteBpjsICU($id_pelayanan, $id_dokter);
            // echo $visite_icu;

            if (preg_match('/visite rutin/i', $list_apelkes->nama)) {
                if ($list_apelkes->tipe_kamar != 'ICU' && $list_apelkes->tipe_kamar != 'HCU') {
                    if ($pelayanan->cara_bayar == '30' && $visite->count >= 7) {
                        $harga = 0;
                        $total = 0;
                    } else {
                        $harga = $this->input->post('harga');
                        $total = $this->input->post('total');
                    }
                } else {
                    if ($pelayanan->cara_bayar == '30' && $visite_icu->count >= 10) {
                        $harga = 0;
                        $total = 0;
                    } else {
                        $harga = $this->input->post('harga');
                        $total = $this->input->post('total');
                    }
                }
                $status_pembayaran = 'ditanggung';
            } else {
                $harga = $this->input->post('harga');
                $total = $this->input->post('total');
                $status_pembayaran = $this->input->post('status_pembayaran');
            }


            if (preg_match('/sewa ruang/i', $list_apelkes->nama) && count($sewa_kamar) > 0) {
                $out['status'] = "Biaya Sewa Kamar Hari Ini Sudah Diinputkan";
            } else {
                $page_data = array(
                    'id_tindakan_apelkes' => $id_tindakan_poli_mata,
                    'id_pelayanan' => $id_pelayanan,
                    'tipe' => $tipe,
                    'id_list_tindakan' => $id_list_tindakan,
                    'harga' => $harga,
                    'frek' => $frek,
                    'tanggal' => $tgl,
                    'total' => $total,
                    'id_dokter' => $id_dokter,
                    'id_staff' => $id_staff,
                    'status_pembayaran' => $status_pembayaran,
                );


                $this->M_Apelkes->insert_tindakan($page_data, 'tindakan_apelkes');
                $this->M_Apelkes->insert_tindakan($page_data, 'tindakan_apelkes_backup');
                $out['status'] = "success";
            }
        }

        echo json_encode($out);
    }

    public function print_kasir()
    {
        $action = $this->input->post('action');
        $id_pelayanan = $this->input->post('inPel');
        $id_history = $this->input->post('inHis');
        $data['pasien'] = $this->M_Kasir->getDataPasienRanap($id_pelayanan, $id_history);
        $data['diskon'] = 0;
        $data['dp'] = 0;
        $data['tgl'] = $this->input->post('tgl');
        $data['inPel'] = $id_pelayanan;
        $data['data_pelayanan'] = $this->M_Kasir->list_pelayanan_pasien($id_pelayanan);
        $data['data_apotik'] = $this->M_Kasir->list_apotik_pasien($id_pelayanan);
        $data['data_operasi'] = $this->M_Kasir->list_operasi_pasien($id_pelayanan);
        $data['data_igd'] = $this->M_Kasir->list_igd_pasien($id_pelayanan);
        $data['data_labor'] = $this->M_Kasir->list_labor_pasien($id_pelayanan);
        $data['data_radio'] = $this->M_Kasir->list_radio_pasien($id_pelayanan);
        $data['data_anak'] = $this->M_Kasir->list_anak_pasien($id_pelayanan);
        $data['data_apelkes'] = $this->M_Kasir->list_apelkes_pasien($id_pelayanan);
        $data['data_internis'] = $this->M_Kasir->list_internis_pasien($id_pelayanan);
        $data['data_bedah'] = $this->M_Kasir->list_bedah_pasien($id_pelayanan);
        $data['data_fisio'] = $this->M_Kasir->list_fisio_pasien($id_pelayanan);
        $data['data_gigi'] = $this->M_Kasir->list_gigi_pasien($id_pelayanan);
        $data['data_jantung'] = $this->M_Kasir->list_jantung_pasien($id_pelayanan);
        $data['data_kulit'] = $this->M_Kasir->list_kulit_pasien($id_pelayanan);
        $data['data_mata'] = $this->M_Kasir->list_mata_pasien($id_pelayanan);
        $data['data_obgyne'] = $this->M_Kasir->list_obgyne_pasien($id_pelayanan);
        $data['data_ok'] = $this->M_Kasir->list_ok_pasien($id_pelayanan);
        $data['data_tht'] = $this->M_Kasir->list_tht_pasien($id_pelayanan);
        $data['data_umum'] = $this->M_Kasir->list_umum_pasien($id_pelayanan);
        $data['apotik'] = $this->M_Kasir->total_apotik($id_pelayanan);
        $data['obatok'] = $this->M_Kasir->total_operasi($id_pelayanan);
        $data['igd'] = $this->M_Kasir->total_igd($id_pelayanan);
        $data['labor'] = $this->M_Kasir->total_labor($id_pelayanan);
        $data['radio'] = $this->M_Kasir->total_radio($id_pelayanan);
        $data['anak'] = $this->M_Kasir->total_anak($id_pelayanan);
        $data['apelkes'] = $this->M_Kasir->total_apelkes($id_pelayanan);
        $data['internis'] = $this->M_Kasir->total_internis($id_pelayanan);
        $data['bedah'] = $this->M_Kasir->total_bedah($id_pelayanan);
        $data['fisio'] = $this->M_Kasir->total_fisio($id_pelayanan);
        $data['gigi'] = $this->M_Kasir->total_gigi($id_pelayanan);
        $data['jantung'] = $this->M_Kasir->total_jantung($id_pelayanan);
        $data['kulit'] = $this->M_Kasir->total_kulit($id_pelayanan);
        $data['mata'] = $this->M_Kasir->total_mata($id_pelayanan);
        $data['obgyne'] = $this->M_Kasir->total_obgyne($id_pelayanan);
        $data['ok'] = $this->M_Kasir->total_ok($id_pelayanan);
        $data['tht'] = $this->M_Kasir->total_tht($id_pelayanan);
        $data['umum'] = $this->M_Kasir->total_umum($id_pelayanan);
        if ($action == 'cetak') {
            $this->load->view('print/cetak_apelkes', $data);
        } else {
            $data['tgl_keluar'] = $this->input->post('inTglKeluar');
            $this->load->view('print/cetak_pembayaran_rajal', $data);
        }
    }
    public function Riwayat_pasien() //Apelkes
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Riwayat_pasien_apelkes';
        $page_data['data_dokter'] = $this->M_Apelkes->selectDokter();
        $page_data['data_tipe_kamar'] = $this->M_Apelkes->selectTipeKamar();
        $page_data['action'] = site_url("Pasien/edit_rawat_jalan");
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_riwayat_pasien() //Apelkes
    {
        $page_data = $this->M_Apelkes->selectRiwayatPasien();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $tindakan =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";
            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $time1 = strtotime($page_data[$i]->tgl_keluar);
            $tgl_keluar = strftime("%A, %d %B %Y ", $time1);

            $jam_keluar = strftime("%H:%M WIB", $time1);

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
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;

            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;


            $out[$i] = array($no,  $tgl_masuk, $jam_masuk, $tgl_keluar, $jam_keluar, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang,  $cara_bayar, $diagnosa, $dokter, $tindakan);
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
    public function TampilRange_riwayatPasien() //Apelkes
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apelkes->selectRangeRiwayatPasien($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $tindakan =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $time1 = strtotime($page_data[$i]->tgl_keluar);
            $tgl_keluar = strftime("%A, %d %B %Y ", $time1);

            $jam_keluar = strftime("%H:%M WIB", $time1);

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
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;


            $out[$i] = array($no,  $tgl_masuk, $jam_masuk, $tgl_keluar, $jam_keluar, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang,  $cara_bayar, $diagnosa, $dokter, $tindakan);
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
    public function getDataPasienById() // Apelkes
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Apelkes->getDataPasienById($id_pelayanan, $id_history);
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
    public function tampil_kamar() //Apelkes
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Apelkes->selectKamarById($id_pelayanan);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $kelas_ruangan = $page_data[$i]->kelas_ruangan;
            $tipe = $page_data[$i]->tipe;
            $tanggal_masuk = $page_data[$i]->tanggal_masuk;
            $tanggal_keluar = $page_data[$i]->tanggal_keluar;
            $status = $page_data[$i]->status;



            $out[$i] = array($no,  $kelas_ruangan, $tipe, $tanggal_masuk, $tanggal_keluar, $status);
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
    public function tampil_tindakan() //Apelkes
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Apelkes->selectTindakan($id_pelayanan);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $id = $page_data[$i]->id_tindakan_apelkes;
            $nama = $page_data[$i]->nama;
            $tipe_kamar = $page_data[$i]->tipe_kamar;
            $biaya_tindakan = "Rp " . number_format($page_data[$i]->harga, 0, ',', '.');
            $jumlah_tindakan = $page_data[$i]->frek;
            $total_biaya = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $dokter = $page_data[$i]->dokter;
            $nama_staff = $page_data[$i]->staff;


            $out[$i] = array($id,  $nama, $tipe_kamar, $biaya_tindakan, $jumlah_tindakan, $total_biaya, $dokter, $nama_staff);
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
    public function tampil_harga_riwayat()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Apelkes->getTotalTindakanById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $total  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $out[$i] = array($total);
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
    public function Labor()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Labor_apelkes';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_dataranap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $page_data = $this->M_Apelkes->selectPasienLabor();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');

            $tindakan = '<a class="btn btn-success btn-xs" href="' . base_url('Apelkes/print_labor/' . $page_data[$i]->id_form_labor) . '"><i class="icon-printer"></i></a></div>';

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $keterangan = $page_data[$i]->keterangan;
            $no_sep = $page_data[$i]->no_sep;
            $no_hp = $page_data[$i]->no_hp;
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;
            $alamat = $page_data[$i]->alamat . ',' . $page_data[$i]->kelurahan . ',' . $page_data[$i]->kecamatan . ',' . $page_data[$i]->kota . ',' . $page_data[$i]->provinsi;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $alamat, $tgl_masuk, $jam_masuk, $no_hp, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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
    public function tampil_form_labor()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $page_data = $this->db->get_where('form_labor', array('id_pelayanan' => $id_pelayanan))->result();

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_labor(\"" . $page_data[$i]->id_form_labor . "\")' '><i class='fa fa-rocket '></i></button>";
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_form_labor(\"" . $page_data[$i]->id_form_labor .  "\")' '><i class='fa fa-trash '></i></button>";
            if ($page_data[$i]->status == 0) {
                $request =   "";
            } elseif ($page_data[$i]->status == 1) {
                $request = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
            } else {
                $request = '<a class="btn btn-success btn-xs" href="' . base_url('Poli/download_file/' . $page_data[$i]->file) . '"><span class="fas fa-pencil-alt"></span> Download</a></div>';
            }

            $no = $i + 1;
            $diagnosa = $page_data[$i]->diagnosa;
            $ringkasan = $page_data[$i]->ringkasan;
            $keterangan = $page_data[$i]->keterangan;
            $time = strtotime($page_data[$i]->tgl);
            $tgl = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $out[$i] = array($no, $request, $tgl, $waktu, $diagnosa, $ringkasan, $keterangan);
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
    public function Labor_pulang()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Labor_pulang_apelkes';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_dataranap_pulang()
    {
        if ($this->input->post('tipe') == 'range') {
            $page_data = $this->M_Apelkes->selectPasienLaborPulangRange($this->input->post('mulai'), $this->input->post('akhir'));
        } else {
            $page_data = $this->M_Apelkes->selectPasienLaborPulang();
        }
        date_default_timezone_set('Asia/Jakarta');

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');

            $tindakan = '<a class="btn btn-success btn-xs" href="' . base_url('Apelkes/print_labor/' . $page_data[$i]->id_form_labor) . '"><i class="icon-printer"></i></a></div>';

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tgl);
            $tgl_keluar = strftime('%A, %d %B %Y ', $time1);

            $jam_keluar = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $keterangan = $page_data[$i]->keterangan;
            $no_sep = $page_data[$i]->no_sep;
            $no_hp = $page_data[$i]->no_hp;
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;
            $alamat = $page_data[$i]->alamat . ',' . $page_data[$i]->kelurahan . ',' . $page_data[$i]->kecamatan . ',' . $page_data[$i]->kota . ',' . $page_data[$i]->provinsi;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $alamat, $tgl_masuk, $jam_masuk, $tgl_keluar, $jam_keluar, $no_hp, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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
    public function Labor_ugd_pulang()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Labor_pulang_apelkes_ugd';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_ugd_pulang()
    {
        if ($this->input->post('tipe') == 'range') {
            $page_data = $this->M_Apelkes->selectPasienLaborPulangUGDRange($this->input->post('mulai'), $this->input->post('akhir'));
        } else {
            $page_data = $this->M_Apelkes->selectPasienLaborPulangUGD();
        }
        date_default_timezone_set('Asia/Jakarta');
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');

            $tindakan = '<a class="btn btn-success btn-xs" href="' . base_url('Apelkes/print_labor/' . $page_data[$i]->id_form_labor) . '"><i class="icon-printer"></i></a></div>';

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tgl);
            $tgl_keluar = strftime('%A, %d %B %Y ', $time1);

            $jam_keluar = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            // $ruang = $page_data[$i]->poli;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $keterangan = $page_data[$i]->keterangan;
            $no_sep = $page_data[$i]->no_sep;
            $no_hp = $page_data[$i]->no_hp;
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;
            $alamat = $page_data[$i]->alamat;

            $db_kamar = $this->M_Apelkes->getKamarById($page_data[$i]->id_pelayanan);
            $kamar = !empty($db_kamar) ? $db_kamar->tipe : '-';

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $alamat, $tgl_masuk, $jam_masuk, $tgl_keluar, $jam_keluar, $no_hp, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $kamar, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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
    public function Labor_poli_pulang()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Labor_pulang_apelkes_poli';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_poli_pulang()
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($this->input->post('tipe') == 'range') {
            $page_data = $this->M_Apelkes->selectPasienLaborPulangPoliRange($this->input->post('mulai'), $this->input->post('akhir'));
        } else {
            $page_data = $this->M_Apelkes->selectPasienLaborPulangPoli();
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');

            $tindakan = '<a class="btn btn-success btn-xs" href="' . base_url('Apelkes/print_labor/' . $page_data[$i]->id_form_labor) . '"><i class="icon-printer"></i></a></div>';

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tgl);
            $tgl_keluar = strftime('%A, %d %B %Y ', $time1);

            $jam_keluar = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $keterangan = $page_data[$i]->keterangan;
            $no_sep = $page_data[$i]->no_sep;
            $no_hp = $page_data[$i]->no_hp;
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;
            $alamat = $page_data[$i]->alamat . ',' . $page_data[$i]->kelurahan . ',' . $page_data[$i]->kecamatan . ',' . $page_data[$i]->kota . ',' . $page_data[$i]->provinsi;

            $db_kamar = $this->M_Apelkes->getKamarById($page_data[$i]->id_pelayanan);
            $kamar = !empty($db_kamar) ? $db_kamar->tipe : '-';
            $kembali = "<button title='Kembalikan Labor' class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'  onclick='kembalikan(\"" . $page_data[$i]->id_form_labor  . "\",\"" .  $nama . "\")' '><i class='icon-action-undo'></i></button>";


            $out[$i] = array($no, $tindakan, $kembali, $no_rm, $nama, $alamat, $tgl_masuk, $jam_masuk, $tgl_keluar, $jam_keluar, $no_hp, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $kamar,  $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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
    function kembalikan_labor()
    {
        $no = $this->input->post('no');
        $this->M_Kasir->update_tindakan(['file' => '', 'status' => 1], ['id_form_labor' => $no], 'form_labor');


        $out['status'] = "success";
        echo json_encode($out);
    }
    public function Radio_poli_pulang()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_riwayat_poli';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_Radio_pulang()
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($this->input->post('tipe') == 'range') {
            $page_data = $this->M_Apelkes->selectDataRiwayatRadiologiRange($this->input->post('mulai'), $this->input->post('akhir'));
        } else {
            $page_data = $this->M_Apelkes->selectDataRiwayatRadiologi();
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->jenis_pelayanan . "\",\"" . $page_data[$i]->poli .  "\",\"" . $page_data[$i]->nama . "\",\"" . $umr . "\",\"" . $umur . "\",\"" . $page_data[$i]->jenis_kelamin . "\",\"" . $page_data[$i]->poli . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tgl_keluar);
            $tgl_keluar = strftime('%A, %d %B %Y ', $time1);

            $jam_keluar = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            // $ruang = $page_data[$i]->poli;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $keterangan = $page_data[$i]->keterangan;
            $no_sep = $page_data[$i]->no_sep;
            $poli = $page_data[$i]->poli;
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;
            $alamat = $page_data[$i]->alamat . ',' . $page_data[$i]->kelurahan . ',' . $page_data[$i]->kecamatan . ',' . $page_data[$i]->kota . ',' . $page_data[$i]->provinsi;

            $out[$i] = array($no, $tindakan, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $poli, $cara_bayar, $diagnosa,  $dokter);
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
    public function getdata_radiologiALL()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Apelkes->getDataRiwayatRadiologi($id_pelayanan, $id_history);
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
    public function print_labor($id)
    {

        $param = array('ono' => 'A' . $id);
        $labor = json_decode($this->curl->simple_get($this->api . 'RESULTS', $param));

        if ($labor != "") {
            $data['labor'] = $labor;
            $this->load->view('print/cetak_hasil_labor', $data);
        } else {
            echo "<script type='text/javascript'>alert('Tidak ada data');window.history.go(-1);</script>";
        }
    }
    public function print_labor_mcu($id)
    {


        $param = array('ono' => 'A' . $id);
        $labor = json_decode($this->curl->simple_get($this->api . 'RESULTS', $param));
        // print_arr($labor);
        if ($labor != "") {
            $data['labor'] = $labor;
            $this->load->view('print/cetak_hasil_labor', $data);
        } else {
            echo "<script type='text/javascript'>alert('Tidak ada data');window.history.go(-1);</script>";
        }
    }
    public function print_apelkes()

    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $jenis = $this->input->post('jenis');

        $staff = $this->session->userdata('data_auth');

        $data['pasien'] = $this->M_Kasir->getDataPasienRanap($id_pelayanan, $id_history);


        $igd = $this->M_Kasir->getDataPasienRanapIGD($id_pelayanan)->result();
        $dataigd = $this->M_Kasir->getDataPasienRanapIGD($id_pelayanan)->row();
        if (count($igd) > 0) {
            $data['dokterIGD'] = $dataigd->nama_dokter;
        } else {
            $data['dokterIGD'] = '-';
        }
        $poli = $this->M_Kasir->getDataPasienRanapPoli($id_pelayanan)->result();
        $datapoli = $this->M_Kasir->getDataPasienRanapPoli($id_pelayanan)->row();
        if (count($poli) > 0) {
            $data['dokterPoli'] = $datapoli->dokter;
        } else {
            $data['dokterPoli'] = '-';
        }
        $data['data_apotik_ranap'] = $this->M_Kasir_ranap->list_apotik_ranap($id_pelayanan);
        $data['data_apotik_igd'] = $this->M_Kasir_ranap->list_apotik_igd($id_pelayanan);
        $data['data_igd'] = $this->M_Kasir_ranap->list_igd_pasien($id_pelayanan);
        $data['data_apelkes'] = $this->M_Kasir_ranap->list_apelkes_pasien_penata($id_pelayanan);
        $data['data_apotik'] = $this->M_Kasir_ranap->list_apotik_pasien($id_pelayanan);
        $data['jenis'] = $jenis;
        // $data['biaya_ranap'] = $biaya_ranap['biaya_ruangan'];
        // $this->load->view('print/cetak_apelkes', $data);
        $response = $this->load->view('print/cetak_apelkes', $data, TRUE);
        echo $response;
    }
}
