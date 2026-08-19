<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Penunjang_RM extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Radiologi');
        $this->load->model('M_Poli');
        $this->load->model('M_Labor');
        $this->load->helper('text');
        
    }
    //////////PASIEN RADIOLOGI
    public function PasienRadiologi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_pasien_rm';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_pasien_radiologi()
    {
        $page_data = $this->M_Radiologi->selectDataPasienRadiologiRM();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";
            $obat = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_obat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-medkit'></i></button>";
            if ($page_data[$i]->status_kasir == 1) {
                $kasir = "<span class='label label-success capitalize-font inline-block'>REQUESTED<span>";
            } else {
                $kasir = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='edit_kasir(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-dollar'></i></button>";
            }
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
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;

            $out[$i] = array($no,$tindakan,$obat,$kasir, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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
    //    Tampilin data list radiologi
public function getdata_radiologiALL()
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
    public function tampil_rajal_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Poli->selectDataRadiologiById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 1) {
                $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
                $status = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
            } else {

                $btn_detail = "";
                $detail = "";
                $status = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            }
            if ($data[$i]->keterangan == null || $data[$i]->keterangan == '') {
                $download = "";
               $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            } else {
                $download = '<a class="btn btn-success btn-xs" href="' . base_url('Penunjang_RM/download_expertise/' . $data[$i]->id_tindakan_radiologi) . '"><span class="fas fa-pencil-alt"></span> Download</a></div>';
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            }
            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;
            $gambar = null;
            foreach (explode(',', $data[$i]->gambar) as $image) { // 1, 2, 3
                $gambar .= "<img src='".base_url()."assets/images/" . $image . "' class='img-responsive zoom'><br>";
            }
            $ket = $data[$i]->keterangan;

            $pesan = $data[$i]->pesan;
            $diagnosa = $data[$i]->diagnosa;
            $sub_ket = word_limiter($ket, 3);
            $hasil_ket = $sub_ket . " &nbsp;" . $detail;
            $a = $tombol;
            $b = $status;

            $out[$i] = array($no, $download, $nama, $tanggal, $harga, $frek, $id_staff, $staff_konf,$diagnosa,$gambar, $b, $a);
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
    public function tampil_rajal_RM()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->selectRadiologiById1($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 1) {
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
               
                $status = "<button style='font-size:10px;color:'white';' onclick='verifikasi(\"" . $data[$i]->id_tindakan_radiologi .  "\")' class='badge bg-green'>SELESAI</button>";
            } else {
                $detail = "";
                $status = "<span class='label label-warning capitalize-font inline-block'>MENUNGGU DIPROSES</span>";
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

            $out[$i] = array($no, $status, $nama, $frek, $harga, $dokter,  $gambar, $id_staff, $staff_konf, $hasil_ket, $pesan);
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
    public function download_expertise($id)
    {
        $radio =  $this->db->query("SELECT * FROM table_expertise where id_tindakan_radiologi= '$id' ")->row_array();                       
        $data['radio'] =$radio;
        $no_rm = $radio["no_rm"];
        $tindakan_radiologi = $radio["id_tindakan_radiologi"];
        $data['pasien'] = $this->db->query("SELECT * FROM pasien where no_rm= '$no_rm' ")->row_array();
        $data['tindakan_radiologi'] = $this->db->query("SELECT * FROM tindakan_radiologi where id_tindakan_radiologi= '$tindakan_radiologi' ")->row_array();


        
        $this->load->view('print/expertise', $data);
    }
    public function Pasien_Labor()
    {
        $this->load->view('assets/_header');
        //$sso_user_data = $this->session->userdata( 'sso_user_data' );
        // $page_data['sso_user_data'] = $sso_user_data;
        $page_data['tindakan_labor'] = $this->M_Poli->selectNamaLabor();
        //$page_data['tindakan_labor'] = $this->M_Labor->selectNamaLabor();
        $page_data['page_content'] = 'page_content/Pasien_labor.php';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }



    public function tampil_datalabor()
    {
        $page_data = $this->M_Labor->selectDataPasienLabor();
        $out = null;
        for (
            $i = 0;
            $i < count($page_data);
            $i++
        ) {
            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');

            $labor = "<button class='btn btn-success btn-icon-anim btn-square' onclick='aksi_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\",\"" . $umr . "\",\"" . $umur . "\",\"" . $page_data[$i]->jenis_kelamin . "\")'><i class='icon-rocket'></i></button>";
          
            $l = $page_data[$i]->tindakan_labor;
            if ($l == 0) {
                $kasir = "<span class='label label-danger capitalize-font inline-block'>Klik tombol N/A terlebih dahulu<span>";
            } else if ($page_data[$i]->status == 1) {
                $kasir = "<span class='label label-success capitalize-font inline-block'>REQUESTED<span>";
            } else {
                $kasir = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='edit_kasir(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-dollar'></i></button>";
            }

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
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $out[$i] = array($no, $labor, $kasir, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $diagnosa, $dokter);
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