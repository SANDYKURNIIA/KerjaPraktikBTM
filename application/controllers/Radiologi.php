<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Radiologi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->library('upload');
        $this->load->model('M_Radiologi');
        $this->load->helper('text');
    }
    // USG
    public function PasienUSG()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_Pasien_USG';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_usg()
    {
        $page_data = $this->M_Radiologi->selectDataPasienUsg();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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
    //END USG

    // Amirul USG21
    public function PasienUSG2()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_Pasien_USG2';
        $page_data['dokter'] = $this->M_Radiologi->getDokter2();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi2();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_usg2()
    {
        $page_data = $this->M_Radiologi->selectDataPasienUsg2();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan2(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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

    // public function getdata_radiologi2()
    // {
    //     $id_pelayanan = $this->input->post('pelayanan');
    //     $id_history = $this->input->post('history');
    //     $db = $this->M_Radiologi->selectDataRadiologiALLbyid12($id_pelayanan, $id_history);
    //     if (count($db) > 0) {
    //         $db = $db[0];
    //         $db->status_dt = 'found';
    //     } else {
    //         $db = null;
    //         $db['status_dt'] = 'not found';
    //     }
    //     echo json_encode($db);
    //     exit;
    // }

    public function getdata_radiologi2()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        // $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataRadiologiALLbyid12($id_pelayanan);
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





    public function tampil_ranap_radiologi2()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->selectRadiologiById2($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {

            // if ($data[$i]->dokter == "" || $data[$i]->dokter == NULL || $data[$i]->ket == 0) {
            //     $status = "<span class='label label-warning capitalize-font inline-block'>MENUNGGU DIPROSES</span>";
            //     $edit =  "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_tindakan_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
            //     $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
            //     $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
            //     $print =  "<a class='btn btn-success btn-icon-anim btn square'  onclick='aksi_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='icon-rocket'></i></a>";
            //     $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\""  . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
            // } else {
            //     $status = "<button style='font-size:10px;color:'white';' onclick='verifikasi(\"" . $data[$i]->id_tindakan_radiologi .  "\")' class='badge bg-green'>SELESAI</button>";
            //     $print =  "<a class='btn btn-primary btn-icon-anim btn square'  onclick='print_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")' '><i class='fa fa-upload'></i></a>";
            //     $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
            //     $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
            //     $edit =  "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_gambar_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
            //     $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\""  . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
            // }

            if ($data[$i]->dokter == "" || $data[$i]->dokter == NULL || $data[$i]->ket == 0) {
                // $status = "<span class='label label-warning capitalize-font inline-block'>MENUNGGU DIPROSES</span>";
                $status = "<button style='font-size:10px;color:'white';' onclick='verifikasi(\"" . $data[$i]->id_tindakan_radiologi . "\")' class='badge bg-green'>SELESAI</button>";
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_tindakan_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                // $print =  "<a class='btn btn-success btn-icon-anim btn square'  onclick='aksi_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='icon-rocket'></i></a>";
                $print = "<a class='btn btn-primary btn-icon-anim btn square'  onclick='print_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")' '><i class='fa fa-upload'></i></a>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
            } else {
                if ($data[$i]->keterangan == 1) {
                    $status = "<button style='font-size:10px;color:'white';' onclick='verifikasi(\"" . $data[$i]->id_tindakan_radiologi . "\")' class='badge bg-green'>SELESAI</button>";
                    $print = "<a class='btn btn-success btn-icon-anim btn square' (\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")' '>Selesai</a>";
                    $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                    $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                    $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_gambar_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                    $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
                } else {
                    $status = "<button style='font-size:10px;color:'white';' onclick='verifikasi(\"" . $data[$i]->id_tindakan_radiologi . "\")' class='badge bg-green'>SELESAI</button>";
                    $print = "<a class='btn btn-primary btn-icon-anim btn square'  onclick='print_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")' '><i class='fa fa-upload'></i></a>";
                    $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                    $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                    $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_gambar_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                    $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
                }
            }

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $dokter = $data[$i]->dokter;
            $id_staff = $data[$i]->staff;
            $diagnosa = $data[$i]->diagnosa;
            $staff_konf = $data[$i]->staff_konf;
            $gambar = null;
            foreach (explode(',', $data[$i]->gambar) as $image) { // 1, 2, 3
                $gambar .= "<img src='../assets/images/" . $image . "' class='img-responsive zoom'><br>";
            }

            $ket = $data[$i]->keterangan;
            $pesan = $data[$i]->pesan;
            $sub_ket = word_limiter($ket, 3);
            $hasil_ket = $sub_ket . " &nbsp;" . $detail;

            $out[$i] = array($no, $print, $btn_detail, $edit, $status, $nama, $frek, $harga, $diagnosa, $dokter, $id_staff, $gambar, $hasil_ket, $hapus);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }
    // End Amirul USG21

    // CT22
    public function PasienCT2()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_Pasien_CT2';
        $page_data['dokter'] = $this->M_Radiologi->getDokter2();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi2();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_ct2()
    {
        $page_data = $this->M_Radiologi->selectDataPasienCT2();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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
    // End CT22

    // Rontgen2
    public function PasienRontgen2()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_Pasien_Rontgen2';
        $page_data['dokter'] = $this->M_Radiologi->getDokter2();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi2();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_rontgen2()
    {
        $page_data = $this->M_Radiologi->selectDataPasienRontgen2();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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
    // End Rontgen2

    // CT scan
    public function PasienCT()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_Pasien_CT';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_ct()
    {
        $page_data = $this->M_Radiologi->selectDataPasienCT();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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
    //END USG
    // CT scan
    public function PasienRontgen()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_Pasien_Rontgen';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_rontgen()
    {
        $out = null;

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' || $akhir != '') {
            $page_data = $this->M_Radiologi->selectRangeDataPasienRontgen($mulai, $akhir);
        } else {
            $tgl = date("Y-m-d");
            $page_data = $this->M_Radiologi->selectRangeDataPasienRontgen($tgl,$tgl);
        }
        for ($i = 0; $i < count($page_data); $i++) {
            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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
    //END USG

    // riwayat radiologi

    public function Riwayat_radiologi_USG()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_radiologi_USG';
        $page_data['dokter'] = $this->M_Radiologi->getDokter2();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi2();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_Riwayat_radiologi_USG()
    {
        $page_data = $this->M_Radiologi->selectRiwayatRadiologiUSG();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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
    // End riwayat ridiologi
    
    // Riwayat radiologi CT
    public function Riwayat_radiologi_CT()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_radiologi_CT';
        $page_data['dokter'] = $this->M_Radiologi->getDokter2();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi2();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_Riwayat_radiologi_CT()
    {
        $page_data = $this->M_Radiologi->selectRiwayatRadiologiCT();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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

    // END Riwayat radiologi CT

    // Riwayat Radiologi Rontgen
    public function Riwayat_radiologi_Rontgen()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_radiologi_Rontgen';
        $page_data['dokter'] = $this->M_Radiologi->getDokter2();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi2();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_Riwayat_radiologi_Rontgen()
    {
        $page_data = $this->M_Radiologi->selectRiwayatRadiologirontgen();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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

    // Rajal
    public function Rajal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_rajal';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_datarajal()
    {
        $page_data = $this->M_Radiologi->selectDataPasienRawatJalan();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
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
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $jam_masuk, $tgl_req, $waktu1, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $agama);
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

    public function print_radiologi()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_tindakan_radiologi = $this->input->post('tindakan');

        $data = $this->M_Radiologi->getRadiologiById($id_pelayanan, $id_tindakan_radiologi);
        $i = 0;
        if (count($data) > 0) {

            $time = strtotime($data[$i]->tanggal);
            $tgl = strftime('%A, %d %B %Y ', $time);

            $data = array(
                'nama' => $data[$i]->nama,
                'keterangan' => $data[$i]->keterangan,
                'tanggal' => $tgl,
            );
        }
        echo json_encode($data);
    }


    public function getdata_radiologiAnak()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataAnakby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiBedah()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataBedahby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiFisio()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataFisioby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiGigi()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataGigiby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiIntern()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataInternby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiJantung()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataJantungby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiKulit()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataKulitby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiMata()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataMataby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiObg()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataObgby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiUmum()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataUmumby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiALL()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataRadiologiALLbyid($id_pelayanan, $id_history);
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
    public function getdata_radiologi()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataRadiologiALLbyid1($id_pelayanan, $id_history);
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

    public function getdata_formById()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_tindakan = $this->input->post('tindakan');

        $db = $this->M_Radiologi->selectDataFormById($id_pelayanan, $id_tindakan);
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

    public function postPindahData()
    {
        header('Content-Type: application/json');

        // Mendapatkan data mentah dari body permintaan
        $raw_data = $this->input->raw_input_stream;

        // Merubah data mentah menjadi array
        $json_data = json_decode($raw_data, true);


        $data = [

            'ket' => 1,
        ];
        $where = array(
            'id_tindakan_radiologi' => isset($json_data['id_tindakan_radiologi']) ? $json_data['id_tindakan_radiologi'] : '',
        );
        $this->M_Radiologi->update($data, $where, 'tindakan_radiologi');
        $this->M_Radiologi->update($data, $where, 'tindakan_radiologi_mcu');
        $out['status'] = "success";
        echo json_encode($out);
    }


    //MCU
    public function getdatamcu_formById()
    {
        $id_mcu = $this->input->post('pelayanan');
        $id_tindakan = $this->input->post('tindakan');

        $db = $this->M_Radiologi->selectDataMcuFormById($id_mcu, $id_tindakan);
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

    public function insert_radiologimcu()
    {
        $data = $this->session->userdata('data_auth');

        $id_expertise = $this->input->post('id_expertise');
        $no_rm = $this->input->post('no_rm');
        $id_tindakan_radiologi = $this->input->post('id_tindakan_radiologi');
        $dokter_pengirim = $this->input->post('dokter_pengirim');
        $nama_poli = $this->input->post('nama_poli');
        // $ruang_poliklinik = $this->input->post('ruang_poliklinik');
        $no_sep = $this->input->post('no_sep');
        $hasil_pemeriksaan = $this->input->post('hasil_pemeriksaan');
        $kesimpulan = $this->input->post('kesimpulan');
        $staff = $data->id_staff;


        $data = array(

            'id_expertise' => $id_expertise,
            'id_tindakan_radiologi' => $id_tindakan_radiologi,
            'dokter_pengirim' => $dokter_pengirim,
            'nama_poli' => $nama_poli,
            // 'ruang_poliklinik' => $ruang_poliklinik,
            'no_sep' => $no_sep,
            'hasil_pemeriksaan' => $hasil_pemeriksaan,
            'kesimpulan' => $kesimpulan,
            'no_rm' => $no_rm,
            'id_staff' => $staff,
        );

        $this->M_Radiologi->insert_tindakan($data, 'table_expertise');

        $alldata = [

            'keterangan' => 1,
        ];
        $where = [

            'id_tindakan_radiologi' => $id_tindakan_radiologi,
        ];
        $this->M_Radiologi->update($alldata, $where, 'tindakan_radiologi_mcu');
        $out['status'] = "success";

        echo json_encode($out);
    }


    public function getdata_radiologiMcuALL()
    {
        $id_mcu = $this->input->post('pelayanan');
        //$id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataLaborMcuById($id_mcu);
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

    // tampil data radiologi
    public function tampil_mcu_radiologi()
    {
        $id_mcu = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->selectRadiologiMcuById($id_mcu);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 0) {
                //$status = "<span class='label label-warning capitalize-font inline-block'>MENUNGGU DIPROSES</span>";
                $status = "<a class='btn btn-danger btn-icon-anim btn square' onclick='pindah_data(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selesai</a>";
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_tindakan_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                $print = "<a class='btn btn-success btn-icon-anim btn square'  onclick='aksi_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='icon-rocket'></i></a>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_mcu . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
            } else {
                $status = "<button style='font-size:10px;color:'white';' onclick='verifikasi(\"" . $data[$i]->id_tindakan_radiologi . "\")' class='badge bg-green'>SELESAI</button>";
                $print = "<a class='btn btn-primary btn-icon-anim btn square'  onclick='print_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")' '><i class='fa fa-upload'></i></a>";
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_gambar_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_mcu . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
            }
            // if ($data[$i]->ket == 1) {
            //     $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_gambar_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
            //     $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
            //     $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
            //     $tombol = "<a class='btn btn-primary btn-icon-anim btn square'   onclick='print_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-upload'></i></a>";
            //     $status = "<span class='label label-primary capitalize-font inline-block'>SELESAI INPUT GAMBAR</span>";
            // } else {
            //     $detail = "";
            //     $btn_detail = "";
            //     $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_tindakan_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
            //     $status = "<span class='label label-warning capitalize-font inline-block'>MENUNGGU DIPROSES</span>";
            //     $tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='aksi_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='icon-rocket'></i></button>";
            // }

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $dokter = $data[$i]->dokter;
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;
            $gambar = null;
            foreach (explode(',', $data[$i]->gambar) as $image) { // 1, 2, 3
                $gambar .= "<img src='../assets/images/" . $image . "' class='img-responsive zoom'><br>";
            }
            $ket = $data[$i]->keterangan;
            $pesan = $data[$i]->pesan;
            $sub_ket = word_limiter($ket, 3);
            $hasil_ket = $sub_ket . " &nbsp;" . $detail;

            $out[$i] = array($no, $print, $btn_detail, $edit, $status, $nama, $frek, $harga, $dokter, $gambar, $id_staff, $staff_konf, $hasil_ket, $pesan);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }
    public function tampil_total_radiologi_mcu()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->Total_RadiologiMcu_Byid($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            $id_tindakan = "Rp. " . number_format($data[$i]->total, 0, ',', '.');
            $out[$i] = array($id_tindakan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }



    public function update_tindakan_radiologi()
    {
        $id_pel_rad = $this->input->post('id_pel_rad');
        $id_tindakan_radiologi = $this->input->post('id_tin_rad');
        $harga = $this->input->post('harga');
        $id_list_tindakan = $this->input->post('id_list_tindakan');
        $frek = $this->input->post('frek');
        $total = $this->input->post('total');
        $ket = $this->input->post('ket');

        $alldata = array(
            'harga' => $harga,
            'frek' => $frek,
            'id_tindakan' => $id_list_tindakan,
            'total' => $total,
            'keterangan' => $ket,
            'ket' => 0,
        );
        $this->M_Radiologi->update_tindakan_radiologi($id_pel_rad, $id_tindakan_radiologi, $alldata);
        $out['status'] = "success";
        echo json_encode($out);
    }

    //    Tampilin data list radiologi

    public function tampil_rajal_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->selectRadiologiById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 1) {
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_gambar_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                $tombol = "<a class='btn btn-primary btn-icon-anim btn square'   onclick='print_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-upload'></i></a>";
                $status = "<span class='label label-primary capitalize-font inline-block'>SELESAI INPUT GAMBAR</span>";
            } else {
                $detail = "";
                $btn_detail = "";
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_tindakan_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $status = "<span class='label label-warning capitalize-font inline-block'>MENUNGGU DIPROSES</span>";
                $tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='aksi_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='icon-rocket'></i></button>";
            }

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $dokter = $data[$i]->dokter;
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;
            $gambar = null;
            foreach (explode(',', $data[$i]->gambar) as $image) { // 1, 2, 3
                $gambar .= "<img src='../assets/images/" . $image . "' class='img-responsive zoom'><br>";
            }
            $ket = $data[$i]->keterangan;
            $diagnosa = $data[$i]->diagnosa;
            $pesan = $data[$i]->pesan;
            $sub_ket = word_limiter($ket, 3);
            $hasil_ket = $sub_ket . " &nbsp;" . $detail;

            $out[$i] = array($no, $tombol, $btn_detail, $edit, $status, $nama, $frek, $diagnosa, $harga, $dokter, $gambar, $id_staff, $staff_konf, $hasil_ket);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    public function tampil_total_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->Total_Radiologi_Byid($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            $id_tindakan = "Rp. " . number_format($data[$i]->total, 0, ',', '.');
            $out[$i] = array($id_tindakan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    //    Tampilin data total nya

    public function hapus_data_radiologi()
    {
        $id_tindakan_radiologi = $this->input->post('id_tindakan_radiologi');
        $this->M_Radiologi->delete_radiologi($id_tindakan_radiologi);
        $out['status'] = "success";
        echo json_encode($out);
    }


    public function post_radiologi_ranap()
    {
        $inPelayanan = $this->input->post('inPelayanan');
        $auth = $this->session->userdata('data_auth');
        $inTindakan = $this->input->post('id_tindakan_radiologi');
        $Ket = '1';

        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['files']['name']);
        $getDataImages = [
            'success' => [],
            'error' => []
        ];
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['file']['name'] = $files['files']['name'][$i];
            $_FILES['file']['type'] = $files['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $files['files']['error'][$i];
            $_FILES['file']['size'] = $files['files']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
                $getDataImages['success'][] = [
                    'response' => ['status' => 'success'],
                    'data' => $data['upload_data']['file_name'],
                ];
            } else {
                $getDataImages['error'][] = [
                    'response' => ['status' => 'failed'],
                    'data' => $_FILES['file']['name'],
                ];
            }
        }

        $success = $getDataImages['success'];
        $error = $getDataImages['error'];
        foreach ($success as $successData) {
            $alldata = [
                'id_pelayanan' => $inPelayanan,
                'frek' => $inJumlah = $this->input->post('inJumlah'),
                'gambar' => implode(',', array_map(function ($val) {
                    return $val['data'];
                }, $success)),
                'id_tindakan_radiologi' => $inTindakan,
                'dokter' => $inDPJP = $this->input->post('inDPJP'),
                'total' => $inJumlah = $this->input->post('inBiaya'),
                'staff_konf' => $staff = $auth->nama,
                'keterangan' => $inKet = $this->input->post('inKet'),
                'ket' => $Ket,
            ];
            $this->M_Radiologi->update_radiologi($inPelayanan, $inTindakan, $alldata);
        }

        echo json_encode(['status' => ['success' => count($success), 'error' => count($error)]]);
    }

    // Ranap

    public function Ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_ranap';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_dataranap()
    {
        $page_data = $this->M_Radiologi->selectDataPasienRanap();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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

    public function get_radiologi()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataby_id($id_pelayanan, $id_history);
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

    public function tampil_ranap_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->selectRadiologiById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {

            if ($data[$i]->dokter == "" || $data[$i]->dokter == NULL || $data[$i]->ket == 0) {
                //$status = "<span class='label label-warning capitalize-font inline-block'>MENUNGGU DIPROSES</span>";
                $status = "<a class='btn btn-danger btn-icon-anim btn square' onclick='pindah_data(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selesai</a>";
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_tindakan_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                $print = "<a class='btn btn-success btn-icon-anim btn square'  onclick='aksi_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='icon-rocket'></i></a>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
            } else {
                $status = "<button style='font-size:10px;color:'white';' onclick='verifikasi(\"" . $data[$i]->id_tindakan_radiologi . "\")' class='badge bg-green'>SELESAI</button>";
                $print = "<a class='btn btn-primary btn-icon-anim btn square'  onclick='print_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")' '><i class='fa fa-upload'></i></a>";
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_gambar_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
            }

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $dokter = $data[$i]->dokter;
            $id_staff = $data[$i]->staff;
            $diagnosa = $data[$i]->diagnosa;
            $staff_konf = $data[$i]->staff_konf;
            $gambar = null;
            foreach (explode(',', $data[$i]->gambar) as $image) { // 1, 2, 3
                $gambar .= "<img src='../assets/images/" . $image . "' class='img-responsive zoom'><br>";
            }

            $ket = $data[$i]->keterangan;
            $pesan = $data[$i]->pesan;
            $sub_ket = word_limiter($ket, 3);
            $hasil_ket = $sub_ket . " &nbsp;" . $detail;

            $out[$i] = array($no, $print, $btn_detail, $edit, $status, $nama, $frek, $harga, $diagnosa, $dokter, $id_staff, $gambar, $hasil_ket, $hapus);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    public function tampil_total_ranap()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->Total_Radiologi_Byid($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            $id_tindakan = "Rp. " . number_format($data[$i]->total, 0, ',', '.');
            $out[$i] = array($id_tindakan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }


    public function post_radiologi_rajal()
    {
        $inPelayanan = $this->input->post('inPelayanan');
        $auth = $this->session->userdata('data_auth');
        $inTindakan = $this->input->post('id_tindakan_radiologi');
        $Ket = '1';

        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['files']['name']);
        $getDataImages = [
            'success' => [],
            'error' => []
        ];
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['file']['name'] = $files['files']['name'][$i];
            $_FILES['file']['type'] = $files['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $files['files']['error'][$i];
            $_FILES['file']['size'] = $files['files']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
                $getDataImages['success'][] = [
                    'response' => ['status' => 'success'],
                    'data' => $data['upload_data']['file_name'],
                ];
            } else {
                $getDataImages['error'][] = [
                    'response' => ['status' => 'failed'],
                    'data' => $_FILES['file']['name'],
                ];
            }
        }

        $success = $getDataImages['success'];
        $error = $getDataImages['error'];
        foreach ($success as $successData) {
            $alldata = [
                'id_pelayanan' => $inPelayanan,
                'frek' => $inJumlah = $this->input->post('inJumlah'),
                'gambar' => implode(',', array_map(function ($val) {
                    return $val['data'];
                }, $success)),
                'id_tindakan_radiologi' => $inTindakan,
                'dokter' => $inDPJP = $this->input->post('inDPJP'),
                'total' => $inJumlah = $this->input->post('inBiaya'),
                'staff_konf' => $staff = $auth->nama,
                // 'keterangan'  => $inKet = $this->input->post('inKet'),
                'ket' => $Ket,
            ];
            $this->M_Radiologi->update_radiologi($inPelayanan, $inTindakan, $alldata);
        }

        echo json_encode(['status' => ['success' => count($success), 'error' => count($error), 'teks' => print_r($this->upload->display_errors())]]);
    }

    public function post_radiologi_mcu()
    {
        $inPelayanan = $this->input->post('inPelayanan');
        $auth = $this->session->userdata('data_auth');
        $inTindakan = $this->input->post('id_tindakan_radiologi');
        $Ket = '1';

        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['files']['name']);
        $getDataImages = [
            'success' => [],
            'error' => []
        ];
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['file']['name'] = $files['files']['name'][$i];
            $_FILES['file']['type'] = $files['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $files['files']['error'][$i];
            $_FILES['file']['size'] = $files['files']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
                $getDataImages['success'][] = [
                    'response' => ['status' => 'success'],
                    'data' => $data['upload_data']['file_name'],
                ];
            } else {
                $getDataImages['error'][] = [
                    'response' => ['status' => 'failed'],
                    'data' => $_FILES['file']['name'],
                ];
            }
        }

        $success = $getDataImages['success'];
        $error = $getDataImages['error'];
        foreach ($success as $successData) {
            $alldata = [
                'id_mcu' => $inPelayanan,
                'frek' => $inJumlah = $this->input->post('inJumlah'),
                'gambar' => implode(',', array_map(function ($val) {
                    return $val['data'];
                }, $success)),
                'id_tindakan_radiologi' => $inTindakan,
                'dokter' => $inDPJP = $this->input->post('inDPJP'),
                'total' => $inJumlah = $this->input->post('inBiaya'),
                'staff_konf' => $staff = $auth->nama,
                // 'keterangan'  => $inKet = $this->input->post('inKet'),
                'ket' => $Ket,
            ];
            $this->M_Radiologi->update_radiologi_mcu($inPelayanan, $inTindakan, $alldata);
        }

        echo json_encode(['status' => ['success' => count($success), 'error' => count($error), 'teks' => print_r($this->upload->display_errors())]]);
    }

    public function update_foto()
    {
        $inPelayanan = $this->input->post('inPelayanan');
        $auth = $this->session->userdata('data_auth');
        $inTindakan = $this->input->post('id_tindakan_radiologi');
        $Ket = '1';

        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['files1']['name']);
        $getDataImages = [
            'success' => [],
            'error' => []
        ];
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['file']['name'] = $files['files1']['name'][$i];
            $_FILES['file']['type'] = $files['files1']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['files1']['tmp_name'][$i];
            $_FILES['file']['error'] = $files['files1']['error'][$i];
            $_FILES['file']['size'] = $files['files1']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
                $getDataImages['success'][] = [
                    'response' => ['status' => 'success'],
                    'data' => $data['upload_data']['file_name'],
                ];
            } else {
                $getDataImages['error'][] = [
                    'response' => ['status' => 'failed'],
                    'data' => $_FILES['file']['name'],
                ];
            }
        }

        $success = $getDataImages['success'];
        $error = $getDataImages['error'];
        foreach ($success as $successData) {
            $data = [
                'gambar' => implode(',', array_map(function ($val) {
                    return $val['data'];
                }, $success)),
                'tgl_respon' => date("Y-m-d H:i:s"),
            ];
            $where = array(
                'id_tindakan_radiologi' => $inTindakan,
                'id_pelayanan' => $inPelayanan
            );
            $this->M_Radiologi->update($data, $where, 'tindakan_radiologi');
        }

        echo json_encode(['status' => ['success' => count($success), 'error' => count($error)]]);
    }

    // INSERT KE TABLE EXPERTISE

    public function insert_radiologi2()
    {
        $staff = $this->session->userdata('data_auth');

        $id_expertise = $this->input->post('id_expertise');
        $no_rm = $this->input->post('no_rm');
        $id_tindakan_radiologi = $this->input->post('id_tindakan_radiologi');
        $dokter_pengirim = $this->input->post('dokter_pengirim');
        $nama_poli = $this->input->post('nama_poli');
        // $ruang_poliklinik = $this->input->post('ruang_poliklinik');
        $no_sep = $this->input->post('no_sep');
        $hasil_pemeriksaan = $this->input->post('hasil_pemeriksaan');
        $kesimpulan = $this->input->post('kesimpulan');
        // $staff = $staff->id_staff;


        $data = array(

            'id_expertise' => $id_expertise,
            'id_tindakan_radiologi' => $id_tindakan_radiologi,
            'dokter_pengirim' => $dokter_pengirim,
            'nama_poli' => $nama_poli,
            // 'ruang_poliklinik' => $ruang_poliklinik,
            'no_sep' => $no_sep,
            'hasil_pemeriksaan' => $hasil_pemeriksaan,
            'kesimpulan' => $kesimpulan,
            'no_rm' => $no_rm,
            'id_staff' => $staff->id_staff,
            'tgl' => date("Y-m-d H:i:s"),
        );

        $this->M_Radiologi->insert_tindakan($data, 'table_expertise');

        $alldata = [
            'keterangan' => 1,
            'dokter' => $staff->nama,
        ];
        $where = [

            'id_tindakan_radiologi' => $id_tindakan_radiologi,
        ];
        $this->M_Radiologi->update($alldata, $where, 'tindakan_radiologi');
        $this->M_Radiologi->update($alldata, $where, 'tindakan_radiologi_mcu');
        $out['status'] = "success";

        echo json_encode($out);
    }









    // // CETAK PRINT EXPERTISE RADIOLOGI

    //     public function cetak_expertise($id)
    //     {
    //         $data['cetak_expertise'] = $this->M_Pasien->getExpertiseById($id);;
    //         $this->load->view('print/cetak_expertise', $data);
    //     }


    public function verifikasi()
    {

        $inTindakan = $this->input->post('id');

        $data = [

            'status_radiologi' => 0
        ];
        $where = array(
            'id_tindakan_radiologi' => $inTindakan,
        );
        $this->M_Radiologi->update($data, $where, 'tindakan_radiologi');
        $out['status'] = "success";
        echo json_encode($out);
    }

    private function set_upload_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = "./assets/images";
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 5048000; //5 mb
        $config['overwrite'] = FALSE;

        return $config;
    }



    // Riwayat Pasien
    public function Riwayat_pasien()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_riwayat_pasien';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_riwayat_pasien()
    {
        $data = $this->M_Radiologi->selectDataRiwayatRadiologi();
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $data[$i]->id_pelayanan . "\",\"" . $data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($data[$i]->tgl_masuk);
            $tgl_masuk = strftime('%A, %d %B %Y ', $time);

            $jam_masuk = strftime('%H:%M WIB', $time);

            $tgl = strtotime($data[$i]->tgl_lahir);
            $tgl_lahir = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $data[$i]->no_rm);
            $nama = $data[$i]->nama;
            $jenis_kelamin = $data[$i]->jenis_kelamin;
            $umur = $umur;
            $cara_masuk = $data[$i]->jenis_pelayanan;
            $ruang = $data[$i]->poli;
            $dokter = $data[$i]->nama_dokter;
            $cara_bayar = $data[$i]->cara_bayar;
            $diagnosa = $data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $diagnosa, $dokter);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    public function tampil_range_riwayat_pasien()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $data = $this->M_Radiologi->selectDataRiwayatRadiologiRange($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $data[$i]->id_pelayanan . "\",\"" . $data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($data[$i]->tgl_masuk);
            $tgl_masuk = strftime('%A, %d %B %Y ', $time);

            $jam_masuk = strftime('%H:%M WIB', $time);

            $tgl = strtotime($data[$i]->tgl_lahir);
            $tgl_lahir = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $data[$i]->no_rm);
            $nama = $data[$i]->nama;
            $jenis_kelamin = $data[$i]->jenis_kelamin;
            $umur = $umur;
            $cara_masuk = $data[$i]->jenis_pelayanan;
            $ruang = $data[$i]->poli;
            $dokter = $data[$i]->nama_dokter;
            $cara_bayar = $data[$i]->cara_bayar;
            $diagnosa = $data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $diagnosa, $dokter);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }
    // End

    // Laporan  Radiologi
    public function Laporan_radiologi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_laporan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_laporan()
    {
        $data = $this->M_Radiologi->selectDataLaporanRadiologi();
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $time = strtotime($data[$i]->tanggal);
            $tgl = strftime('%d' . '-' . '%m' . '-' . '%Y ', $time);

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $data[$i]->no_rm);
            $nama = $data[$i]->nama;
            $no_foto = $data[$i]->no_foto;
            $umur = $data[$i]->umur;
            $jam_daftar = $data[$i]->jam_daftar;
            $unit_kirim = $data[$i]->unit_kirim;
            $status = $data[$i]->status;
            $tgl_lahir = $data[$i]->tgl_lahir;
            $cara_bayar = $data[$i]->caraBayar;
            $tindakan = $data[$i]->tindakan;
            $harga = $data[$i]->harga;
            // $harga_cost = $data[$i]->harga_cost;
            // $frek = $data[$i]->frek;
            $staff = $data[$i]->staff;
            // $total = $data[$i]->total;
            $dokter = $data[$i]->dokter;
            $out[$i] = array($no, $tgl, $no_foto, $no_rm, $nama, $tgl_lahir, $umur, $status, $cara_bayar, $tindakan, $harga, $jam_daftar, $unit_kirim, $dokter, $staff);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }


    public function tampil_range_laporan()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $data = $this->M_Radiologi->selectDataRangeLaporanRadiologi($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $time = strtotime($data[$i]->tanggal);
            $tgl = strftime('%d' . '-' . '%m' . '-' . '%Y ', $time);

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $data[$i]->no_rm);
            $nama = $data[$i]->nama;
            $no_foto = $data[$i]->no_foto;
            $umur = $data[$i]->umur;
            $jam_daftar = $data[$i]->jam_daftar;
            $unit_kirim = $data[$i]->unit_kirim;
            $status = $data[$i]->status;
            $tgl_lahir = $data[$i]->tgl_lahir;
            $cara_bayar = $data[$i]->caraBayar;
            $tindakan = $data[$i]->tindakan;
            $harga = $data[$i]->harga;
            // $harga_cost = $data[$i]->harga_cost;
            // $frek = $data[$i]->frek;
            $staff = $data[$i]->staff;
            // $total = $data[$i]->total;
            $dokter = $data[$i]->dokter;
            $out[$i] = array($no, $tgl, $no_foto, $no_rm, $nama, $tgl_lahir, $umur, $status, $cara_bayar, $tindakan, $harga, $jam_daftar, $unit_kirim, $dokter, $staff);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }
    // End

    // Laporan Tindakan Radiologi
    public function Laporan_tindakan_radiologi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_laporan_tindakan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_laporan_tindakan()
    {
        $data = $this->M_Radiologi->selectDataLaporanTindakanRadiologi();
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $no = $i + 1;
            $tindakan = $data[$i]->tindakan;
            $jml = $data[$i]->jml;
            $total = $data[$i]->total;
            $out[$i] = array($no, $tindakan, $jml, $total);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }


    public function tampil_range_tindakan_laporan()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $data = $this->M_Radiologi->selectDataRangeLaporanTindakanRadiologi($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $no = $i + 1;
            $tindakan = $data[$i]->tindakan;
            $jml = $data[$i]->jml;
            $total = $data[$i]->total;
            $out[$i] = array($no, $tindakan, $jml, $total);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }
    public function Rajal_rw()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_rajal';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_datarajal_rw()
    {
        $page_data = $this->M_Radiologi->selectDataPasienRajalPulang();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
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
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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
    //////////PASIEN RADIOLOGI
    public function PasienRadiologi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_pasien_radiologi';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_pasien_radiologi()
    {
        $page_data = $this->M_Radiologi->selectDataPasienRadiologi();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";

            $obat = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_obat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-medkit'></i></button>";
            // if ($page_data[$i]->status_kasir == 1) {
            //     $kasir = "<span class='label label-success capitalize-font inline-block'>REQUESTED<span>";
            // } else {
            //     $kasir = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='edit_kasir(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-dollar'></i></button>";
            // }
            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);


            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
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
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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

    // End

    //pasien radiologi mcu
    public function PasienMcu()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_pasien_mcu';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologiMcu();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_pasien_mcu()
    {
        $page_data = $this->M_Radiologi->selectDataPasienMcu();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_mcu . "\")'><i class='icon-rocket'></i></button>";

            //$obat = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_obat(\"" . $page_data[$i]->id_mcu . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-medkit'></i></button>";
            // if ($page_data[$i]->status_kasir == 1) {
            //     $kasir = "<span class='label label-success capitalize-font inline-block'>REQUESTED<span>";
            // } else {
            //     $kasir = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='edit_kasir(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-dollar'></i></button>";
            // }
            $time = strtotime($page_data[$i]->tanggal);
            $date2 = strftime(' %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime(' %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama_pasien;

            $jk = $page_data[$i]->sex;
            $occupation = $page_data[$i]->occupation;
            $badgeno = $page_data[$i]->badge_no;
            $blood_group = $page_data[$i]->blood_group;
            $out[$i] = array($no, $tindakan, $no_rm, $nama, $date2, $waktu, $jk, $date3, $umur, $occupation, $badgeno, $blood_group);
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

    //////////POLI PRIORITAS
    public function Poli_prioritas()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_poli_prioritas';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_poli_prioritas()
    {
        $page_data = $this->M_Radiologi->selectDataPoliPrioritas();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";
            // $obat = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_obat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-medkit'></i></button>";
            // if ($page_data[$i]->status_kasir == 1) {
            //     $kasir = "<span class='label label-success capitalize-font inline-block'>REQUESTED<span>";
            // } else {
            //     $kasir = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='edit_kasir(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-dollar'></i></button>";
            // }
            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
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
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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

    public function tampil_poli_prioritas_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->selectPoliPrioritasById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 1) {
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_gambar_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                $tombol = "<a class='btn btn-primary btn-icon-anim btn square'   onclick='print_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-upload'></i></a>";
                $status = "<button style='font-size:10px;color:'white';' onclick='verifikasi(\"" . $data[$i]->id_tindakan_radiologi . "\")' class='badge bg-green'>SELESAI</button>";
            } else {
                $detail = "";
                $btn_detail = "";
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_tindakan_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $status = "<span class='label label-warning capitalize-font inline-block'>MENUNGGU DIPROSES</span>";
                $tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='aksi_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='icon-rocket'></i></button>";
            }

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $dokter = $data[$i]->dokter;
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;
            $gambar = null;
            foreach (explode(',', $data[$i]->gambar) as $image) { // 1, 2, 3
                $gambar .= "<img src='../assets/images/" . $image . "' class='img-responsive zoom'><br>";
            }
            $ket = $data[$i]->keterangan;
            $pesan = $data[$i]->pesan;
            $sub_ket = word_limiter($ket, 3);
            $hasil_ket = $sub_ket . " &nbsp;" . $detail;

            $out[$i] = array($no, $tombol, $btn_detail, $edit, $status, $nama, $frek, $harga, $dokter, $gambar, $id_staff, $staff_konf, $hasil_ket, $pesan);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }


    public function getdata_PoliPrioritasALL()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataPoliPrioritasALLbyid($id_pelayanan, $id_history);
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


    public function tampil_total_poliprioritas_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->Total_Radiologi_PoliPrioritas_Byid($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            $id_tindakan = "Rp. " . number_format($data[$i]->total, 0, ',', '.');
            $out[$i] = array($id_tindakan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    public function getdata_prioritas_formById()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_tindakan = $this->input->post('tindakan');

        $db = $this->M_Radiologi->selectDataPrioritasFormById($id_pelayanan, $id_tindakan);
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


    public function post_radiologi_prioritas()
    {
        $inPelayanan = $this->input->post('inPelayanan');
        $auth = $this->session->userdata('data_auth');
        $inTindakan = $this->input->post('id_tindakan_radiologi');
        $Ket = '1';

        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['files']['name']);
        $getDataImages = [
            'success' => [],
            'error' => []
        ];
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['file']['name'] = $files['files']['name'][$i];
            $_FILES['file']['type'] = $files['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $files['files']['error'][$i];
            $_FILES['file']['size'] = $files['files']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
                $getDataImages['success'][] = [
                    'response' => ['status' => 'success'],
                    'data' => $data['upload_data']['file_name'],
                ];
            } else {
                $getDataImages['error'][] = [
                    'response' => ['status' => 'failed'],
                    'data' => $_FILES['file']['name'],
                ];
            }
        }

        $success = $getDataImages['success'];
        $error = $getDataImages['error'];
        foreach ($success as $successData) {
            $alldata = [
                'id_pelayanan' => $inPelayanan,
                'frek' => $inJumlah = $this->input->post('inJumlah'),
                'gambar' => implode(',', array_map(function ($val) {
                    return $val['data'];
                }, $success)),
                'id_tindakan_radiologi' => $inTindakan,
                'dokter' => $inDPJP = $this->input->post('inDPJP'),
                'total' => $inJumlah = $this->input->post('inBiaya'),
                'staff_konf' => $staff = $auth->nama,
                'keterangan' => $inKet = $this->input->post('inKet'),
                'ket' => $Ket,
            ];
            $this->M_Radiologi->update_radiologi_prioritas($inPelayanan, $inTindakan, $alldata);
        }

        echo json_encode(['status' => ['success' => count($success), 'error' => count($error), 'teks' => print_r($this->upload->display_errors())]]);
    }


    // End


    // INSERT KE TABLE EXPERTISE

    public function insert_radiologi_prioritas()
    {
        $data = $this->session->userdata('data_auth');

        $id_expertise = $this->input->post('id_expertise');
        $no_rm = $this->input->post('no_rm');
        $id_tindakan_radiologi = $this->input->post('id_tindakan_radiologi');
        $dokter_pengirim = $this->input->post('dokter_pengirim');
        $nama_poli = $this->input->post('nama_poli');
        // $ruang_poliklinik = $this->input->post('ruang_poliklinik');
        $no_sep = $this->input->post('no_sep');
        $hasil_pemeriksaan = $this->input->post('hasil_pemeriksaan');
        $kesimpulan = $this->input->post('kesimpulan');
        $staff = $data->id_staff;


        $data = array(

            'id_expertise' => $id_expertise,
            'id_tindakan_radiologi' => $id_tindakan_radiologi,
            'dokter_pengirim' => $dokter_pengirim,
            'nama_poli' => $nama_poli,
            // 'ruang_poliklinik' => $ruang_poliklinik,
            'no_sep' => $no_sep,
            'hasil_pemeriksaan' => $hasil_pemeriksaan,
            'kesimpulan' => $kesimpulan,
            'no_rm' => $no_rm,
            'id_staff' => $staff,
        );

        $this->M_Radiologi->insert_tindakan($data, 'table_expertise');

        $alldata = [

            'keterangan' => 1,
        ];
        $where = [

            'id_tindakan_radiologi' => $id_tindakan_radiologi,
        ];
        $this->M_Radiologi->update($alldata, $where, 'tindakan_radiologi');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function Laporan_biaya_radiologi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_biaya_radiologi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    // public function Tampil_laporan_biaya_radiologi()
    // {
    //     $page_data = $this->M_Radiologi->selectJmlRadiologi();

    //     $out = null;
    //     for ($i = 0; $i < count($page_data); $i++) {
    //         $no = $i + 1;


    //         $id_dokter = $page_data[$i]->id_dokter;
    //         //var_dump($id_dokter);
    //         $bpjs = $this->M_Radiologi->getJumlahTindakanByCB($id_dokter, 'BPJS');
    //         $umum = $this->M_Radiologi->getJumlahTindakanByCB($id_dokter, 'UMUM');
    //         $timah = $this->M_Radiologi->getJumlahTindakanByCB($id_dokter, 'TIMAH');
    //         $mitra = $this->M_Radiologi->getJumlahTindakanByCB($id_dokter, 'MITRA');
    //         $internal = $this->M_Radiologi->getJumlahTindakanByCB($id_dokter, 'INTERNAL');
    //         $lainnya = $this->M_Radiologi->getJumlahTindakanByCB($id_dokter, 'LAINNYA');


    //         $dokter = $page_data[$i]->nama;
    //         $poli = $page_data[$i]->poli;
    //         $bpjs = $bpjs->total;
    //         $umum = $umum->total;
    //         $timah = $timah->total;
    //         $mitra = $mitra->total;
    //         $internal = $internal->total;
    //         $lainnya = $lainnya->total;


    //         $out[$i] = array($no, $dokter, $poli, $bpjs, $umum, $timah, $mitra, $internal, $lainnya);
    //     }

    //     if ($out == null) {
    //         echo '{"data":""}';
    //         exit;
    //     } else {
    //         $page_data['data'] = $out;
    //         echo json_encode($page_data);
    //         exit;
    //     }
    // }

    public function Tampil_Range_cara_bayar()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $tindakan = $this->input->post('poli');

        $page_data = $this->M_Radiologi->selectRangeJmlRadiologi($tindakan, $mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $nama_tindakan = $page_data[$i]->tindakan;
            //var_dump($id_dokter);
            $bpjs = $this->M_Radiologi->getJumlahPasienByCBRange($nama_tindakan, 'BPJS', $mulai, $akhir);
            $umum = $this->M_Radiologi->getJumlahPasienByCBRange($nama_tindakan, 'UMUM', $mulai, $akhir);
            $timah = $this->M_Radiologi->getJumlahPasienByCBRange($nama_tindakan, 'TIMAH', $mulai, $akhir);
            $mitra = $this->M_Radiologi->getJumlahPasienByCBRange($nama_tindakan, 'MITRA', $mulai, $akhir);
            $internal = $this->M_Radiologi->getJumlahPasienByCBRange($nama_tindakan, 'INTERNAL', $mulai, $akhir);
            $lainnya = $this->M_Radiologi->getJumlahPasienByCBRange($nama_tindakan, 'LAINNYA', $mulai, $akhir);

            $bpjs = intval($bpjs->total);
            $umum = intval($umum->total);
            $timah = intval($timah->total);
            $mitra = intval($mitra->total);
            $internal = intval($internal->total);
            $lainnya = intval($lainnya->total);


            $out[$i] = array($no, $nama_tindakan, $bpjs, $umum, $timah, $mitra, $internal, $lainnya);
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
class Radiologi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->library('upload');
        $this->load->model('M_Radiologi');
        $this->load->helper('text');
    }
    // USG
    public function PasienUSG()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_Pasien_USG';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_usg()
    {
        $page_data = $this->M_Radiologi->selectDataPasienUsg();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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
    //END USG

    // Amirul USG21
    public function PasienUSG2()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_Pasien_USG2';
        $page_data['dokter'] = $this->M_Radiologi->getDokter2();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi2();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_usg2()
    {
        $page_data = $this->M_Radiologi->selectDataPasienUsg2();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan2(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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

    // public function getdata_radiologi2()
    // {
    //     $id_pelayanan = $this->input->post('pelayanan');
    //     $id_history = $this->input->post('history');
    //     $db = $this->M_Radiologi->selectDataRadiologiALLbyid12($id_pelayanan, $id_history);
    //     if (count($db) > 0) {
    //         $db = $db[0];
    //         $db->status_dt = 'found';
    //     } else {
    //         $db = null;
    //         $db['status_dt'] = 'not found';
    //     }
    //     echo json_encode($db);
    //     exit;
    // }

    public function getdata_radiologi2()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        // $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataRadiologiALLbyid12($id_pelayanan);
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





    public function tampil_ranap_radiologi2()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->selectRadiologiById2($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {

            // if ($data[$i]->dokter == "" || $data[$i]->dokter == NULL || $data[$i]->ket == 0) {
            //     $status = "<span class='label label-warning capitalize-font inline-block'>MENUNGGU DIPROSES</span>";
            //     $edit =  "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_tindakan_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
            //     $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
            //     $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
            //     $print =  "<a class='btn btn-success btn-icon-anim btn square'  onclick='aksi_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='icon-rocket'></i></a>";
            //     $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\""  . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
            // } else {
            //     $status = "<button style='font-size:10px;color:'white';' onclick='verifikasi(\"" . $data[$i]->id_tindakan_radiologi .  "\")' class='badge bg-green'>SELESAI</button>";
            //     $print =  "<a class='btn btn-primary btn-icon-anim btn square'  onclick='print_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")' '><i class='fa fa-upload'></i></a>";
            //     $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
            //     $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
            //     $edit =  "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_gambar_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
            //     $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\""  . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
            // }

            if ($data[$i]->dokter == "" || $data[$i]->dokter == NULL || $data[$i]->ket == 0) {
                // $status = "<span class='label label-warning capitalize-font inline-block'>MENUNGGU DIPROSES</span>";
                $status = "<button style='font-size:10px;color:'white';' onclick='verifikasi(\"" . $data[$i]->id_tindakan_radiologi . "\")' class='badge bg-green'>SELESAI</button>";
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_tindakan_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                // $print =  "<a class='btn btn-success btn-icon-anim btn square'  onclick='aksi_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='icon-rocket'></i></a>";
                $print = "<a class='btn btn-primary btn-icon-anim btn square'  onclick='print_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")' '><i class='fa fa-upload'></i></a>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
            } else {
                if ($data[$i]->keterangan == 1) {
                    $status = "<button style='font-size:10px;color:'white';' onclick='verifikasi(\"" . $data[$i]->id_tindakan_radiologi . "\")' class='badge bg-green'>SELESAI</button>";
                    $print = "<a class='btn btn-success btn-icon-anim btn square' (\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")' '>Selesai</a>";
                    $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                    $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                    $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_gambar_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                    $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
                } else {
                    $status = "<button style='font-size:10px;color:'white';' onclick='verifikasi(\"" . $data[$i]->id_tindakan_radiologi . "\")' class='badge bg-green'>SELESAI</button>";
                    $print = "<a class='btn btn-primary btn-icon-anim btn square'  onclick='print_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")' '><i class='fa fa-upload'></i></a>";
                    $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                    $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                    $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_gambar_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                    $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
                }
            }

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $dokter = $data[$i]->dokter;
            $id_staff = $data[$i]->staff;
            $diagnosa = $data[$i]->diagnosa;
            $staff_konf = $data[$i]->staff_konf;
            $gambar = null;
            foreach (explode(',', $data[$i]->gambar) as $image) { // 1, 2, 3
                $gambar .= "<img src='../assets/images/" . $image . "' class='img-responsive zoom'><br>";
            }

            $ket = $data[$i]->keterangan;
            $pesan = $data[$i]->pesan;
            $sub_ket = word_limiter($ket, 3);
            $hasil_ket = $sub_ket . " &nbsp;" . $detail;

            $out[$i] = array($no, $print, $btn_detail, $edit, $status, $nama, $frek, $harga, $diagnosa, $dokter, $id_staff, $gambar, $hasil_ket, $hapus);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }
    // End Amirul USG21

    // CT22
    public function PasienCT2()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_Pasien_CT2';
        $page_data['dokter'] = $this->M_Radiologi->getDokter2();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi2();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_ct2()
    {
        $page_data = $this->M_Radiologi->selectDataPasienCT2();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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
    // End CT22

    // Rontgen2
    public function PasienRontgen2()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_Pasien_Rontgen2';
        $page_data['dokter'] = $this->M_Radiologi->getDokter2();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi2();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_rontgen2()
    {
        $page_data = $this->M_Radiologi->selectDataPasienRontgen2();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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
    // End Rontgen2

    // CT scan
    public function PasienCT()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_Pasien_CT';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_ct()
    {
        $page_data = $this->M_Radiologi->selectDataPasienCT();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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
    //END USG
    // CT scan
    public function PasienRontgen()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_Pasien_Rontgen';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_rontgen()
    {
        $out = null;

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' || $akhir != '') {
            $page_data = $this->M_Radiologi->selectRangeDataPasienRontgen($mulai, $akhir);
        } else {
            $tgl = date("Y-m-d");
            $page_data = $this->M_Radiologi->selectRangeDataPasienRontgen($tgl,$tgl);
        }
        for ($i = 0; $i < count($page_data); $i++) {
            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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
    //END USG

    // riwayat radiologi

    public function Riwayat_radiologi_USG()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_radiologi_USG';
        $page_data['dokter'] = $this->M_Radiologi->getDokter2();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi2();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_Riwayat_radiologi_USG()
    {
        $page_data = $this->M_Radiologi->selectRiwayatRadiologiUSG();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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
    // End riwayat ridiologi
    
    // Riwayat radiologi CT
    public function Riwayat_radiologi_CT()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_radiologi_CT';
        $page_data['dokter'] = $this->M_Radiologi->getDokter2();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi2();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_Riwayat_radiologi_CT()
    {
        $page_data = $this->M_Radiologi->selectRiwayatRadiologiCT();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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

    // END Riwayat radiologi CT

    // Riwayat Radiologi Rontgen
    public function Riwayat_radiologi_Rontgen()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_radiologi_Rontgen';
        $page_data['dokter'] = $this->M_Radiologi->getDokter2();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi2();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_Riwayat_radiologi_Rontgen()
    {
        $page_data = $this->M_Radiologi->selectRiwayatRadiologirontgen();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            // $ruang = $page_data[$i]->nama_ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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

    // Rajal
    public function Rajal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_rajal';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_datarajal()
    {
        $page_data = $this->M_Radiologi->selectDataPasienRawatJalan();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
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
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $jam_masuk, $tgl_req, $waktu1, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $agama);
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

    public function print_radiologi()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_tindakan_radiologi = $this->input->post('tindakan');

        $data = $this->M_Radiologi->getRadiologiById($id_pelayanan, $id_tindakan_radiologi);
        $i = 0;
        if (count($data) > 0) {

            $time = strtotime($data[$i]->tanggal);
            $tgl = strftime('%A, %d %B %Y ', $time);

            $data = array(
                'nama' => $data[$i]->nama,
                'keterangan' => $data[$i]->keterangan,
                'tanggal' => $tgl,
            );
        }
        echo json_encode($data);
    }


    public function getdata_radiologiAnak()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataAnakby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiBedah()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataBedahby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiFisio()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataFisioby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiGigi()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataGigiby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiIntern()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataInternby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiJantung()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataJantungby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiKulit()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataKulitby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiMata()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataMataby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiObg()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataObgby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiUmum()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataUmumby_id($id_pelayanan, $id_history);
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

    public function getdata_radiologiALL()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataRadiologiALLbyid($id_pelayanan, $id_history);
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
    public function getdata_radiologi()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataRadiologiALLbyid1($id_pelayanan, $id_history);
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

    public function getdata_formById()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_tindakan = $this->input->post('tindakan');

        $db = $this->M_Radiologi->selectDataFormById($id_pelayanan, $id_tindakan);
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

    public function postPindahData()
    {
        header('Content-Type: application/json');

        // Mendapatkan data mentah dari body permintaan
        $raw_data = $this->input->raw_input_stream;

        // Merubah data mentah menjadi array
        $json_data = json_decode($raw_data, true);


        $data = [

            'ket' => 1,
        ];
        $where = array(
            'id_tindakan_radiologi' => isset($json_data['id_tindakan_radiologi']) ? $json_data['id_tindakan_radiologi'] : '',
        );
        $this->M_Radiologi->update($data, $where, 'tindakan_radiologi');
        $this->M_Radiologi->update($data, $where, 'tindakan_radiologi_mcu');
        $out['status'] = "success";
        echo json_encode($out);
    }


    //MCU
    public function getdatamcu_formById()
    {
        $id_mcu = $this->input->post('pelayanan');
        $id_tindakan = $this->input->post('tindakan');

        $db = $this->M_Radiologi->selectDataMcuFormById($id_mcu, $id_tindakan);
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

    public function insert_radiologimcu()
    {
        $data = $this->session->userdata('data_auth');

        $id_expertise = $this->input->post('id_expertise');
        $no_rm = $this->input->post('no_rm');
        $id_tindakan_radiologi = $this->input->post('id_tindakan_radiologi');
        $dokter_pengirim = $this->input->post('dokter_pengirim');
        $nama_poli = $this->input->post('nama_poli');
        // $ruang_poliklinik = $this->input->post('ruang_poliklinik');
        $no_sep = $this->input->post('no_sep');
        $hasil_pemeriksaan = $this->input->post('hasil_pemeriksaan');
        $kesimpulan = $this->input->post('kesimpulan');
        $staff = $data->id_staff;


        $data = array(

            'id_expertise' => $id_expertise,
            'id_tindakan_radiologi' => $id_tindakan_radiologi,
            'dokter_pengirim' => $dokter_pengirim,
            'nama_poli' => $nama_poli,
            // 'ruang_poliklinik' => $ruang_poliklinik,
            'no_sep' => $no_sep,
            'hasil_pemeriksaan' => $hasil_pemeriksaan,
            'kesimpulan' => $kesimpulan,
            'no_rm' => $no_rm,
            'id_staff' => $staff,
        );

        $this->M_Radiologi->insert_tindakan($data, 'table_expertise');

        $alldata = [

            'keterangan' => 1,
        ];
        $where = [

            'id_tindakan_radiologi' => $id_tindakan_radiologi,
        ];
        $this->M_Radiologi->update($alldata, $where, 'tindakan_radiologi_mcu');
        $out['status'] = "success";

        echo json_encode($out);
    }


    public function getdata_radiologiMcuALL()
    {
        $id_mcu = $this->input->post('pelayanan');
        //$id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataLaborMcuById($id_mcu);
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

    // tampil data radiologi
    public function tampil_mcu_radiologi()
    {
        $id_mcu = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->selectRadiologiMcuById($id_mcu);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 0) {
                //$status = "<span class='label label-warning capitalize-font inline-block'>MENUNGGU DIPROSES</span>";
                $status = "<a class='btn btn-danger btn-icon-anim btn square' onclick='pindah_data(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selesai</a>";
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_tindakan_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                $print = "<a class='btn btn-success btn-icon-anim btn square'  onclick='aksi_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='icon-rocket'></i></a>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_mcu . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
            } else {
                $status = "<button style='font-size:10px;color:'white';' onclick='verifikasi(\"" . $data[$i]->id_tindakan_radiologi . "\")' class='badge bg-green'>SELESAI</button>";
                $print = "<a class='btn btn-primary btn-icon-anim btn square'  onclick='print_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")' '><i class='fa fa-upload'></i></a>";
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_gambar_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_mcu . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
            }
            // if ($data[$i]->ket == 1) {
            //     $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_gambar_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
            //     $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
            //     $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
            //     $tombol = "<a class='btn btn-primary btn-icon-anim btn square'   onclick='print_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-upload'></i></a>";
            //     $status = "<span class='label label-primary capitalize-font inline-block'>SELESAI INPUT GAMBAR</span>";
            // } else {
            //     $detail = "";
            //     $btn_detail = "";
            //     $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_tindakan_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
            //     $status = "<span class='label label-warning capitalize-font inline-block'>MENUNGGU DIPROSES</span>";
            //     $tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='aksi_radiologi(\"" . $id_mcu . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='icon-rocket'></i></button>";
            // }

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $dokter = $data[$i]->dokter;
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;
            $gambar = null;
            foreach (explode(',', $data[$i]->gambar) as $image) { // 1, 2, 3
                $gambar .= "<img src='../assets/images/" . $image . "' class='img-responsive zoom'><br>";
            }
            $ket = $data[$i]->keterangan;
            $pesan = $data[$i]->pesan;
            $sub_ket = word_limiter($ket, 3);
            $hasil_ket = $sub_ket . " &nbsp;" . $detail;

            $out[$i] = array($no, $print, $btn_detail, $edit, $status, $nama, $frek, $harga, $dokter, $gambar, $id_staff, $staff_konf, $hasil_ket, $pesan);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }
    public function tampil_total_radiologi_mcu()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->Total_RadiologiMcu_Byid($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            $id_tindakan = "Rp. " . number_format($data[$i]->total, 0, ',', '.');
            $out[$i] = array($id_tindakan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }



    public function update_tindakan_radiologi()
    {
        $id_pel_rad = $this->input->post('id_pel_rad');
        $id_tindakan_radiologi = $this->input->post('id_tin_rad');
        $harga = $this->input->post('harga');
        $id_list_tindakan = $this->input->post('id_list_tindakan');
        $frek = $this->input->post('frek');
        $total = $this->input->post('total');
        $ket = $this->input->post('ket');

        $alldata = array(
            'harga' => $harga,
            'frek' => $frek,
            'id_tindakan' => $id_list_tindakan,
            'total' => $total,
            'keterangan' => $ket,
            'ket' => 0,
        );
        $this->M_Radiologi->update_tindakan_radiologi($id_pel_rad, $id_tindakan_radiologi, $alldata);
        $out['status'] = "success";
        echo json_encode($out);
    }

    //    Tampilin data list radiologi

    public function tampil_rajal_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->selectRadiologiById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 1) {
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_gambar_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                $tombol = "<a class='btn btn-primary btn-icon-anim btn square'   onclick='print_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-upload'></i></a>";
                $status = "<span class='label label-primary capitalize-font inline-block'>SELESAI INPUT GAMBAR</span>";
            } else {
                $detail = "";
                $btn_detail = "";
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_tindakan_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $status = "<span class='label label-warning capitalize-font inline-block'>MENUNGGU DIPROSES</span>";
                $tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='aksi_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='icon-rocket'></i></button>";
            }

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $dokter = $data[$i]->dokter;
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;
            $gambar = null;
            foreach (explode(',', $data[$i]->gambar) as $image) { // 1, 2, 3
                $gambar .= "<img src='../assets/images/" . $image . "' class='img-responsive zoom'><br>";
            }
            $ket = $data[$i]->keterangan;
            $diagnosa = $data[$i]->diagnosa;
            $pesan = $data[$i]->pesan;
            $sub_ket = word_limiter($ket, 3);
            $hasil_ket = $sub_ket . " &nbsp;" . $detail;

            $out[$i] = array($no, $tombol, $btn_detail, $edit, $status, $nama, $frek, $diagnosa, $harga, $dokter, $gambar, $id_staff, $staff_konf, $hasil_ket);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    public function tampil_total_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->Total_Radiologi_Byid($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            $id_tindakan = "Rp. " . number_format($data[$i]->total, 0, ',', '.');
            $out[$i] = array($id_tindakan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    //    Tampilin data total nya

    public function hapus_data_radiologi()
    {
        $id_tindakan_radiologi = $this->input->post('id_tindakan_radiologi');
        $this->M_Radiologi->delete_radiologi($id_tindakan_radiologi);
        $out['status'] = "success";
        echo json_encode($out);
    }


    public function post_radiologi_ranap()
    {
        $inPelayanan = $this->input->post('inPelayanan');
        $auth = $this->session->userdata('data_auth');
        $inTindakan = $this->input->post('id_tindakan_radiologi');
        $Ket = '1';

        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['files']['name']);
        $getDataImages = [
            'success' => [],
            'error' => []
        ];
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['file']['name'] = $files['files']['name'][$i];
            $_FILES['file']['type'] = $files['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $files['files']['error'][$i];
            $_FILES['file']['size'] = $files['files']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
                $getDataImages['success'][] = [
                    'response' => ['status' => 'success'],
                    'data' => $data['upload_data']['file_name'],
                ];
            } else {
                $getDataImages['error'][] = [
                    'response' => ['status' => 'failed'],
                    'data' => $_FILES['file']['name'],
                ];
            }
        }

        $success = $getDataImages['success'];
        $error = $getDataImages['error'];
        foreach ($success as $successData) {
            $alldata = [
                'id_pelayanan' => $inPelayanan,
                'frek' => $inJumlah = $this->input->post('inJumlah'),
                'gambar' => implode(',', array_map(function ($val) {
                    return $val['data'];
                }, $success)),
                'id_tindakan_radiologi' => $inTindakan,
                'dokter' => $inDPJP = $this->input->post('inDPJP'),
                'total' => $inJumlah = $this->input->post('inBiaya'),
                'staff_konf' => $staff = $auth->nama,
                'keterangan' => $inKet = $this->input->post('inKet'),
                'ket' => $Ket,
            ];
            $this->M_Radiologi->update_radiologi($inPelayanan, $inTindakan, $alldata);
        }

        echo json_encode(['status' => ['success' => count($success), 'error' => count($error)]]);
    }

    // Ranap

    public function Ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_ranap';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_dataranap()
    {
        $page_data = $this->M_Radiologi->selectDataPasienRanap();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);
            $waktu = strftime('%H:%M WIB', $time);

            $time1 = strtotime($page_data[$i]->tanggal);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_req = $date1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $tgl_req, $waktu1, $jam_masuk, $diagnosa, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $dokter);
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

    public function get_radiologi()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataby_id($id_pelayanan, $id_history);
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

    public function tampil_ranap_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->selectRadiologiById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {

            if ($data[$i]->dokter == "" || $data[$i]->dokter == NULL || $data[$i]->ket == 0) {
                //$status = "<span class='label label-warning capitalize-font inline-block'>MENUNGGU DIPROSES</span>";
                $status = "<a class='btn btn-danger btn-icon-anim btn square' onclick='pindah_data(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selesai</a>";
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_tindakan_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                $print = "<a class='btn btn-success btn-icon-anim btn square'  onclick='aksi_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='icon-rocket'></i></a>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
            } else {
                $status = "<button style='font-size:10px;color:'white';' onclick='verifikasi(\"" . $data[$i]->id_tindakan_radiologi . "\")' class='badge bg-green'>SELESAI</button>";
                $print = "<a class='btn btn-primary btn-icon-anim btn square'  onclick='print_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")' '><i class='fa fa-upload'></i></a>";
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_gambar_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $nama = $data[$i]->nama . "\")'><i class='fa fa-trash'></i></button>";
            }

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $dokter = $data[$i]->dokter;
            $id_staff = $data[$i]->staff;
            $diagnosa = $data[$i]->diagnosa;
            $staff_konf = $data[$i]->staff_konf;
            $gambar = null;
            foreach (explode(',', $data[$i]->gambar) as $image) { // 1, 2, 3
                $gambar .= "<img src='../assets/images/" . $image . "' class='img-responsive zoom'><br>";
            }

            $ket = $data[$i]->keterangan;
            $pesan = $data[$i]->pesan;
            $sub_ket = word_limiter($ket, 3);
            $hasil_ket = $sub_ket . " &nbsp;" . $detail;

            $out[$i] = array($no, $print, $btn_detail, $edit, $status, $nama, $frek, $harga, $diagnosa, $dokter, $id_staff, $gambar, $hasil_ket, $hapus);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    public function tampil_total_ranap()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->Total_Radiologi_Byid($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            $id_tindakan = "Rp. " . number_format($data[$i]->total, 0, ',', '.');
            $out[$i] = array($id_tindakan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }


    public function post_radiologi_rajal()
    {
        $inPelayanan = $this->input->post('inPelayanan');
        $auth = $this->session->userdata('data_auth');
        $inTindakan = $this->input->post('id_tindakan_radiologi');
        $Ket = '1';

        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['files']['name']);
        $getDataImages = [
            'success' => [],
            'error' => []
        ];
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['file']['name'] = $files['files']['name'][$i];
            $_FILES['file']['type'] = $files['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $files['files']['error'][$i];
            $_FILES['file']['size'] = $files['files']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
                $getDataImages['success'][] = [
                    'response' => ['status' => 'success'],
                    'data' => $data['upload_data']['file_name'],
                ];
            } else {
                $getDataImages['error'][] = [
                    'response' => ['status' => 'failed'],
                    'data' => $_FILES['file']['name'],
                ];
            }
        }

        $success = $getDataImages['success'];
        $error = $getDataImages['error'];
        foreach ($success as $successData) {
            $alldata = [
                'id_pelayanan' => $inPelayanan,
                'frek' => $inJumlah = $this->input->post('inJumlah'),
                'gambar' => implode(',', array_map(function ($val) {
                    return $val['data'];
                }, $success)),
                'id_tindakan_radiologi' => $inTindakan,
                'dokter' => $inDPJP = $this->input->post('inDPJP'),
                'total' => $inJumlah = $this->input->post('inBiaya'),
                'staff_konf' => $staff = $auth->nama,
                // 'keterangan'  => $inKet = $this->input->post('inKet'),
                'ket' => $Ket,
            ];
            $this->M_Radiologi->update_radiologi($inPelayanan, $inTindakan, $alldata);
        }

        echo json_encode(['status' => ['success' => count($success), 'error' => count($error), 'teks' => print_r($this->upload->display_errors())]]);
    }

    public function post_radiologi_mcu()
    {
        $inPelayanan = $this->input->post('inPelayanan');
        $auth = $this->session->userdata('data_auth');
        $inTindakan = $this->input->post('id_tindakan_radiologi');
        $Ket = '1';

        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['files']['name']);
        $getDataImages = [
            'success' => [],
            'error' => []
        ];
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['file']['name'] = $files['files']['name'][$i];
            $_FILES['file']['type'] = $files['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $files['files']['error'][$i];
            $_FILES['file']['size'] = $files['files']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
                $getDataImages['success'][] = [
                    'response' => ['status' => 'success'],
                    'data' => $data['upload_data']['file_name'],
                ];
            } else {
                $getDataImages['error'][] = [
                    'response' => ['status' => 'failed'],
                    'data' => $_FILES['file']['name'],
                ];
            }
        }

        $success = $getDataImages['success'];
        $error = $getDataImages['error'];
        foreach ($success as $successData) {
            $alldata = [
                'id_mcu' => $inPelayanan,
                'frek' => $inJumlah = $this->input->post('inJumlah'),
                'gambar' => implode(',', array_map(function ($val) {
                    return $val['data'];
                }, $success)),
                'id_tindakan_radiologi' => $inTindakan,
                'dokter' => $inDPJP = $this->input->post('inDPJP'),
                'total' => $inJumlah = $this->input->post('inBiaya'),
                'staff_konf' => $staff = $auth->nama,
                // 'keterangan'  => $inKet = $this->input->post('inKet'),
                'ket' => $Ket,
            ];
            $this->M_Radiologi->update_radiologi_mcu($inPelayanan, $inTindakan, $alldata);
        }

        echo json_encode(['status' => ['success' => count($success), 'error' => count($error), 'teks' => print_r($this->upload->display_errors())]]);
    }

    public function update_foto()
    {
        $inPelayanan = $this->input->post('inPelayanan');
        $auth = $this->session->userdata('data_auth');
        $inTindakan = $this->input->post('id_tindakan_radiologi');
        $Ket = '1';

        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['files1']['name']);
        $getDataImages = [
            'success' => [],
            'error' => []
        ];
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['file']['name'] = $files['files1']['name'][$i];
            $_FILES['file']['type'] = $files['files1']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['files1']['tmp_name'][$i];
            $_FILES['file']['error'] = $files['files1']['error'][$i];
            $_FILES['file']['size'] = $files['files1']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
                $getDataImages['success'][] = [
                    'response' => ['status' => 'success'],
                    'data' => $data['upload_data']['file_name'],
                ];
            } else {
                $getDataImages['error'][] = [
                    'response' => ['status' => 'failed'],
                    'data' => $_FILES['file']['name'],
                ];
            }
        }

        $success = $getDataImages['success'];
        $error = $getDataImages['error'];
        foreach ($success as $successData) {
            $data = [
                'gambar' => implode(',', array_map(function ($val) {
                    return $val['data'];
                }, $success)),
                'tgl_respon' => date("Y-m-d H:i:s"),
            ];
            $where = array(
                'id_tindakan_radiologi' => $inTindakan,
                'id_pelayanan' => $inPelayanan
            );
            $this->M_Radiologi->update($data, $where, 'tindakan_radiologi');
        }

        echo json_encode(['status' => ['success' => count($success), 'error' => count($error)]]);
    }

    // INSERT KE TABLE EXPERTISE

    public function insert_radiologi2()
    {
        $staff = $this->session->userdata('data_auth');

        $id_expertise = $this->input->post('id_expertise');
        $no_rm = $this->input->post('no_rm');
        $id_tindakan_radiologi = $this->input->post('id_tindakan_radiologi');
        $dokter_pengirim = $this->input->post('dokter_pengirim');
        $nama_poli = $this->input->post('nama_poli');
        // $ruang_poliklinik = $this->input->post('ruang_poliklinik');
        $no_sep = $this->input->post('no_sep');
        $hasil_pemeriksaan = $this->input->post('hasil_pemeriksaan');
        $kesimpulan = $this->input->post('kesimpulan');
        // $staff = $staff->id_staff;


        $data = array(

            'id_expertise' => $id_expertise,
            'id_tindakan_radiologi' => $id_tindakan_radiologi,
            'dokter_pengirim' => $dokter_pengirim,
            'nama_poli' => $nama_poli,
            // 'ruang_poliklinik' => $ruang_poliklinik,
            'no_sep' => $no_sep,
            'hasil_pemeriksaan' => $hasil_pemeriksaan,
            'kesimpulan' => $kesimpulan,
            'no_rm' => $no_rm,
            'id_staff' => $staff->id_staff,
            'tgl' => date("Y-m-d H:i:s"),
        );

        $this->M_Radiologi->insert_tindakan($data, 'table_expertise');

        $alldata = [
            'keterangan' => 1,
            'dokter' => $staff->nama,
        ];
        $where = [

            'id_tindakan_radiologi' => $id_tindakan_radiologi,
        ];
        $this->M_Radiologi->update($alldata, $where, 'tindakan_radiologi');
        $this->M_Radiologi->update($alldata, $where, 'tindakan_radiologi_mcu');
        $out['status'] = "success";

        echo json_encode($out);
    }









    // // CETAK PRINT EXPERTISE RADIOLOGI

    //     public function cetak_expertise($id)
    //     {
    //         $data['cetak_expertise'] = $this->M_Pasien->getExpertiseById($id);;
    //         $this->load->view('print/cetak_expertise', $data);
    //     }


    public function verifikasi()
    {

        $inTindakan = $this->input->post('id');

        $data = [

            'status_radiologi' => 0
        ];
        $where = array(
            'id_tindakan_radiologi' => $inTindakan,
        );
        $this->M_Radiologi->update($data, $where, 'tindakan_radiologi');
        $out['status'] = "success";
        echo json_encode($out);
    }

    private function set_upload_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = "./assets/images";
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 5048000; //5 mb
        $config['overwrite'] = FALSE;

        return $config;
    }



    // Riwayat Pasien
    public function Riwayat_pasien()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_riwayat_pasien';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_riwayat_pasien()
    {
        $data = $this->M_Radiologi->selectDataRiwayatRadiologi();
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $data[$i]->id_pelayanan . "\",\"" . $data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($data[$i]->tgl_masuk);
            $tgl_masuk = strftime('%A, %d %B %Y ', $time);

            $jam_masuk = strftime('%H:%M WIB', $time);

            $tgl = strtotime($data[$i]->tgl_lahir);
            $tgl_lahir = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $data[$i]->no_rm);
            $nama = $data[$i]->nama;
            $jenis_kelamin = $data[$i]->jenis_kelamin;
            $umur = $umur;
            $cara_masuk = $data[$i]->jenis_pelayanan;
            $ruang = $data[$i]->poli;
            $dokter = $data[$i]->nama_dokter;
            $cara_bayar = $data[$i]->cara_bayar;
            $diagnosa = $data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $diagnosa, $dokter);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    public function tampil_range_riwayat_pasien()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $data = $this->M_Radiologi->selectDataRiwayatRadiologiRange($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $data[$i]->id_pelayanan . "\",\"" . $data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($data[$i]->tgl_masuk);
            $tgl_masuk = strftime('%A, %d %B %Y ', $time);

            $jam_masuk = strftime('%H:%M WIB', $time);

            $tgl = strtotime($data[$i]->tgl_lahir);
            $tgl_lahir = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $data[$i]->no_rm);
            $nama = $data[$i]->nama;
            $jenis_kelamin = $data[$i]->jenis_kelamin;
            $umur = $umur;
            $cara_masuk = $data[$i]->jenis_pelayanan;
            $ruang = $data[$i]->poli;
            $dokter = $data[$i]->nama_dokter;
            $cara_bayar = $data[$i]->cara_bayar;
            $diagnosa = $data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $diagnosa, $dokter);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }
    // End

    // Laporan  Radiologi
    public function Laporan_radiologi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_laporan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_laporan()
    {
        $data = $this->M_Radiologi->selectDataLaporanRadiologi();
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $time = strtotime($data[$i]->tanggal);
            $tgl = strftime('%d' . '-' . '%m' . '-' . '%Y ', $time);

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $data[$i]->no_rm);
            $nama = $data[$i]->nama;
            $no_foto = $data[$i]->no_foto;
            $umur = $data[$i]->umur;
            $jam_daftar = $data[$i]->jam_daftar;
            $unit_kirim = $data[$i]->unit_kirim;
            $status = $data[$i]->status;
            $tgl_lahir = $data[$i]->tgl_lahir;
            $cara_bayar = $data[$i]->caraBayar;
            $tindakan = $data[$i]->tindakan;
            $harga = $data[$i]->harga;
            // $harga_cost = $data[$i]->harga_cost;
            // $frek = $data[$i]->frek;
            $staff = $data[$i]->staff;
            // $total = $data[$i]->total;
            $dokter = $data[$i]->dokter;
            $out[$i] = array($no, $tgl, $no_foto, $no_rm, $nama, $tgl_lahir, $umur, $status, $cara_bayar, $tindakan, $harga, $jam_daftar, $unit_kirim, $dokter, $staff);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }


    public function tampil_range_laporan()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $data = $this->M_Radiologi->selectDataRangeLaporanRadiologi($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $time = strtotime($data[$i]->tanggal);
            $tgl = strftime('%d' . '-' . '%m' . '-' . '%Y ', $time);

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $data[$i]->no_rm);
            $nama = $data[$i]->nama;
            $no_foto = $data[$i]->no_foto;
            $umur = $data[$i]->umur;
            $jam_daftar = $data[$i]->jam_daftar;
            $unit_kirim = $data[$i]->unit_kirim;
            $status = $data[$i]->status;
            $tgl_lahir = $data[$i]->tgl_lahir;
            $cara_bayar = $data[$i]->caraBayar;
            $tindakan = $data[$i]->tindakan;
            $harga = $data[$i]->harga;
            // $harga_cost = $data[$i]->harga_cost;
            // $frek = $data[$i]->frek;
            $staff = $data[$i]->staff;
            // $total = $data[$i]->total;
            $dokter = $data[$i]->dokter;
            $out[$i] = array($no, $tgl, $no_foto, $no_rm, $nama, $tgl_lahir, $umur, $status, $cara_bayar, $tindakan, $harga, $jam_daftar, $unit_kirim, $dokter, $staff);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }
    // End

    // Laporan Tindakan Radiologi
    public function Laporan_tindakan_radiologi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_laporan_tindakan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_laporan_tindakan()
    {
        $data = $this->M_Radiologi->selectDataLaporanTindakanRadiologi();
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $no = $i + 1;
            $tindakan = $data[$i]->tindakan;
            $jml = $data[$i]->jml;
            $total = $data[$i]->total;
            $out[$i] = array($no, $tindakan, $jml, $total);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }


    public function tampil_range_tindakan_laporan()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $data = $this->M_Radiologi->selectDataRangeLaporanTindakanRadiologi($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $no = $i + 1;
            $tindakan = $data[$i]->tindakan;
            $jml = $data[$i]->jml;
            $total = $data[$i]->total;
            $out[$i] = array($no, $tindakan, $jml, $total);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }
    public function Rajal_rw()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_rajal';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_datarajal_rw()
    {
        $page_data = $this->M_Radiologi->selectDataPasienRajalPulang();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
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
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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
    //////////PASIEN RADIOLOGI
    public function PasienRadiologi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_pasien_radiologi';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_pasien_radiologi()
    {
        $page_data = $this->M_Radiologi->selectDataPasienRadiologi();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";

            $obat = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_obat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-medkit'></i></button>";
            // if ($page_data[$i]->status_kasir == 1) {
            //     $kasir = "<span class='label label-success capitalize-font inline-block'>REQUESTED<span>";
            // } else {
            //     $kasir = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='edit_kasir(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-dollar'></i></button>";
            // }
            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);


            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
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
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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

    // End

    //pasien radiologi mcu
    public function PasienMcu()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_pasien_mcu';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologiMcu();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_pasien_mcu()
    {
        $page_data = $this->M_Radiologi->selectDataPasienMcu();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_mcu . "\")'><i class='icon-rocket'></i></button>";

            //$obat = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_obat(\"" . $page_data[$i]->id_mcu . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-medkit'></i></button>";
            // if ($page_data[$i]->status_kasir == 1) {
            //     $kasir = "<span class='label label-success capitalize-font inline-block'>REQUESTED<span>";
            // } else {
            //     $kasir = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='edit_kasir(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-dollar'></i></button>";
            // }
            $time = strtotime($page_data[$i]->tanggal);
            $date2 = strftime(' %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime(' %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama_pasien;

            $jk = $page_data[$i]->sex;
            $occupation = $page_data[$i]->occupation;
            $badgeno = $page_data[$i]->badge_no;
            $blood_group = $page_data[$i]->blood_group;
            $out[$i] = array($no, $tindakan, $no_rm, $nama, $date2, $waktu, $jk, $date3, $umur, $occupation, $badgeno, $blood_group);
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

    //////////POLI PRIORITAS
    public function Poli_prioritas()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_poli_prioritas';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_poli_prioritas()
    {
        $page_data = $this->M_Radiologi->selectDataPoliPrioritas();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";
            // $obat = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_obat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-medkit'></i></button>";
            // if ($page_data[$i]->status_kasir == 1) {
            //     $kasir = "<span class='label label-success capitalize-font inline-block'>REQUESTED<span>";
            // } else {
            //     $kasir = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='edit_kasir(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-dollar'></i></button>";
            // }
            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm = '' . sprintf('%06d', $page_data[$i]->no_rm);
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
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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

    public function tampil_poli_prioritas_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->selectPoliPrioritasById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 1) {
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_gambar_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                $tombol = "<a class='btn btn-primary btn-icon-anim btn square'   onclick='print_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-upload'></i></a>";
                $status = "<button style='font-size:10px;color:'white';' onclick='verifikasi(\"" . $data[$i]->id_tindakan_radiologi . "\")' class='badge bg-green'>SELESAI</button>";
            } else {
                $detail = "";
                $btn_detail = "";
                $edit = "<button class='btn btn-default btn-icon-anim btn square'  onclick='edit_tindakan_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-pencil-square-o'></i></button>";
                $status = "<span class='label label-warning capitalize-font inline-block'>MENUNGGU DIPROSES</span>";
                $tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='aksi_radiologi(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='icon-rocket'></i></button>";
            }

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $dokter = $data[$i]->dokter;
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;
            $gambar = null;
            foreach (explode(',', $data[$i]->gambar) as $image) { // 1, 2, 3
                $gambar .= "<img src='../assets/images/" . $image . "' class='img-responsive zoom'><br>";
            }
            $ket = $data[$i]->keterangan;
            $pesan = $data[$i]->pesan;
            $sub_ket = word_limiter($ket, 3);
            $hasil_ket = $sub_ket . " &nbsp;" . $detail;

            $out[$i] = array($no, $tombol, $btn_detail, $edit, $status, $nama, $frek, $harga, $dokter, $gambar, $id_staff, $staff_konf, $hasil_ket, $pesan);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }


    public function getdata_PoliPrioritasALL()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataPoliPrioritasALLbyid($id_pelayanan, $id_history);
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


    public function tampil_total_poliprioritas_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->Total_Radiologi_PoliPrioritas_Byid($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            $id_tindakan = "Rp. " . number_format($data[$i]->total, 0, ',', '.');
            $out[$i] = array($id_tindakan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    public function getdata_prioritas_formById()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_tindakan = $this->input->post('tindakan');

        $db = $this->M_Radiologi->selectDataPrioritasFormById($id_pelayanan, $id_tindakan);
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


    public function post_radiologi_prioritas()
    {
        $inPelayanan = $this->input->post('inPelayanan');
        $auth = $this->session->userdata('data_auth');
        $inTindakan = $this->input->post('id_tindakan_radiologi');
        $Ket = '1';

        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['files']['name']);
        $getDataImages = [
            'success' => [],
            'error' => []
        ];
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['file']['name'] = $files['files']['name'][$i];
            $_FILES['file']['type'] = $files['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $files['files']['error'][$i];
            $_FILES['file']['size'] = $files['files']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
                $getDataImages['success'][] = [
                    'response' => ['status' => 'success'],
                    'data' => $data['upload_data']['file_name'],
                ];
            } else {
                $getDataImages['error'][] = [
                    'response' => ['status' => 'failed'],
                    'data' => $_FILES['file']['name'],
                ];
            }
        }

        $success = $getDataImages['success'];
        $error = $getDataImages['error'];
        foreach ($success as $successData) {
            $alldata = [
                'id_pelayanan' => $inPelayanan,
                'frek' => $inJumlah = $this->input->post('inJumlah'),
                'gambar' => implode(',', array_map(function ($val) {
                    return $val['data'];
                }, $success)),
                'id_tindakan_radiologi' => $inTindakan,
                'dokter' => $inDPJP = $this->input->post('inDPJP'),
                'total' => $inJumlah = $this->input->post('inBiaya'),
                'staff_konf' => $staff = $auth->nama,
                'keterangan' => $inKet = $this->input->post('inKet'),
                'ket' => $Ket,
            ];
            $this->M_Radiologi->update_radiologi_prioritas($inPelayanan, $inTindakan, $alldata);
        }

        echo json_encode(['status' => ['success' => count($success), 'error' => count($error), 'teks' => print_r($this->upload->display_errors())]]);
    }


    // End


    // INSERT KE TABLE EXPERTISE

    public function insert_radiologi_prioritas()
    {
        $data = $this->session->userdata('data_auth');

        $id_expertise = $this->input->post('id_expertise');
        $no_rm = $this->input->post('no_rm');
        $id_tindakan_radiologi = $this->input->post('id_tindakan_radiologi');
        $dokter_pengirim = $this->input->post('dokter_pengirim');
        $nama_poli = $this->input->post('nama_poli');
        // $ruang_poliklinik = $this->input->post('ruang_poliklinik');
        $no_sep = $this->input->post('no_sep');
        $hasil_pemeriksaan = $this->input->post('hasil_pemeriksaan');
        $kesimpulan = $this->input->post('kesimpulan');
        $staff = $data->id_staff;


        $data = array(

            'id_expertise' => $id_expertise,
            'id_tindakan_radiologi' => $id_tindakan_radiologi,
            'dokter_pengirim' => $dokter_pengirim,
            'nama_poli' => $nama_poli,
            // 'ruang_poliklinik' => $ruang_poliklinik,
            'no_sep' => $no_sep,
            'hasil_pemeriksaan' => $hasil_pemeriksaan,
            'kesimpulan' => $kesimpulan,
            'no_rm' => $no_rm,
            'id_staff' => $staff,
        );

        $this->M_Radiologi->insert_tindakan($data, 'table_expertise');

        $alldata = [

            'keterangan' => 1,
        ];
        $where = [

            'id_tindakan_radiologi' => $id_tindakan_radiologi,
        ];
        $this->M_Radiologi->update($alldata, $where, 'tindakan_radiologi');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function Laporan_biaya_radiologi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_biaya_radiologi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    // public function Tampil_laporan_biaya_radiologi()
    // {
    //     $page_data = $this->M_Radiologi->selectJmlRadiologi();

    //     $out = null;
    //     for ($i = 0; $i < count($page_data); $i++) {
    //         $no = $i + 1;


    //         $id_dokter = $page_data[$i]->id_dokter;
    //         //var_dump($id_dokter);
    //         $bpjs = $this->M_Radiologi->getJumlahTindakanByCB($id_dokter, 'BPJS');
    //         $umum = $this->M_Radiologi->getJumlahTindakanByCB($id_dokter, 'UMUM');
    //         $timah = $this->M_Radiologi->getJumlahTindakanByCB($id_dokter, 'TIMAH');
    //         $mitra = $this->M_Radiologi->getJumlahTindakanByCB($id_dokter, 'MITRA');
    //         $internal = $this->M_Radiologi->getJumlahTindakanByCB($id_dokter, 'INTERNAL');
    //         $lainnya = $this->M_Radiologi->getJumlahTindakanByCB($id_dokter, 'LAINNYA');


    //         $dokter = $page_data[$i]->nama;
    //         $poli = $page_data[$i]->poli;
    //         $bpjs = $bpjs->total;
    //         $umum = $umum->total;
    //         $timah = $timah->total;
    //         $mitra = $mitra->total;
    //         $internal = $internal->total;
    //         $lainnya = $lainnya->total;


    //         $out[$i] = array($no, $dokter, $poli, $bpjs, $umum, $timah, $mitra, $internal, $lainnya);
    //     }

    //     if ($out == null) {
    //         echo '{"data":""}';
    //         exit;
    //     } else {
    //         $page_data['data'] = $out;
    //         echo json_encode($page_data);
    //         exit;
    //     }
    // }

    public function Tampil_Range_cara_bayar()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $tindakan = $this->input->post('poli');

        $page_data = $this->M_Radiologi->selectRangeJmlRadiologi($tindakan, $mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $nama_tindakan = $page_data[$i]->tindakan;
            //var_dump($id_dokter);
            $bpjs = $this->M_Radiologi->getJumlahPasienByCBRange($nama_tindakan, 'BPJS', $mulai, $akhir);
            $umum = $this->M_Radiologi->getJumlahPasienByCBRange($nama_tindakan, 'UMUM', $mulai, $akhir);
            $timah = $this->M_Radiologi->getJumlahPasienByCBRange($nama_tindakan, 'TIMAH', $mulai, $akhir);
            $mitra = $this->M_Radiologi->getJumlahPasienByCBRange($nama_tindakan, 'MITRA', $mulai, $akhir);
            $internal = $this->M_Radiologi->getJumlahPasienByCBRange($nama_tindakan, 'INTERNAL', $mulai, $akhir);
            $lainnya = $this->M_Radiologi->getJumlahPasienByCBRange($nama_tindakan, 'LAINNYA', $mulai, $akhir);

            $bpjs = intval($bpjs->total);
            $umum = intval($umum->total);
            $timah = intval($timah->total);
            $mitra = intval($mitra->total);
            $internal = intval($internal->total);
            $lainnya = intval($lainnya->total);


            $out[$i] = array($no, $nama_tindakan, $bpjs, $umum, $timah, $mitra, $internal, $lainnya);
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
