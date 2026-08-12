<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kasir_poli extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'IND');
        $this->load->model('M_Kasir');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Pasien');
        $this->load->model('M_Apotik');
    }

    public function internis()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'INTERNIS';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function obgyne()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'OBGYNE';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tht()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'THT';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function mata()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'MATA';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function kulit()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'KULIT DAN KELAMIN';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function umum()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'UMUM';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function anak()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'ANAK';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function gigi()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'GIGI';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function jantung()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'JANTUNG';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function bedah()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'BEDAH';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function fisio()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'FISIO';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function akupuntur()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'AKUPUNTUR MEDIK';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function bedahmulut()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'GIGI BEDAH MULUT';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function kesjiwa()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'JIWA';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function orthopedi()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'ORTHOPEDI';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function paru()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'PARU';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function saraf()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'SARAF';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function urologi()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'UROLOGI';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function rehab()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'CONTROL REHABILITAS MEDIC';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function labor()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'LABOR';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function radiologi()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'RADIOLOGI';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function anastesi()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'ANASTESI';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function ginjal()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'GINJAL';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function penyakitmulut()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'PENYAKIT MULUT';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function hd()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'HEMODIALISA';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function gizi()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'POLI GIZI';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function terapi_wicara()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'TERAPI WICARA';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function psikolog()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'POLI PSIKOLOG';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function kemoterapi()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'POLI KEMOTERAPI';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function stifin()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'POLI STIFIN';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function konservasi_gigi()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'POLI KONSERVASI GIGI';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function okupasi()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['poli'] = 'OKUPASI';
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_rajal()
    {
        $poli = $this->input->post('poli');
        $page_data = $this->M_Kasir->selectPasienRajal1($poli);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $ranap = $this->M_Kasir->selectPasienRanapById($page_data[$i]->id_pelayanan);
            //$total = $this->M_Kasir->getTotal($page_data[$i]->id_pelayanan);

            if (count($ranap) > 0) {
                $status_ranap = '<span class="label label-warning">Masuk Rawat Inap</span>';
            } else {
                $status_ranap = '-';
            }
            $no = $i + 1;
            $cetak = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url() . "Kasir/print_dp/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "/" . $page_data[$i]->id_cara_bayar . "' ><i class='icon-printer'></i></a>";
            $checkout = "<button class='btn btn-danger btn-icon-anim btn-square' onclick='check_out(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-logout'></i></button>";

            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->id_cara_bayar . "\",\"" . $page_data[$i]->cara_bayar . "\")' '><i class='fa fa-rocket '></i></button>";
            // $tombol1 =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilEditKonsul(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;

            //Tanggal lahir
            $time1 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl1 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur
            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";
            //$total = $page_data[$i]->total_harga;
            //$alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $tombol1 =   "<button class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick=' tampil_luar_tanggungan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";

            $out[$i] = array($no, $tombol, $tombol1, $checkout, $tgl, $waktu, $no_rm, $pasien, $jk, $tgl1, $umur, $jenis_pelayanan, $poli, $status_ranap, $caraBayar, $diagnosa, $dokter);
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

    public function print_kasir_rajal()
    {
        $staff = $this->session->userdata('data_auth');
        $action = $this->input->post('action');

        $id_pelayanan = $this->input->post('inPel');
        $id_history = $this->input->post('inHis');
        $pasien = $this->M_Kasir->getDataPasienRajal($id_pelayanan, $id_history);
        if (!empty($pasien['tgl_masuk']) && $action != 'cetak_ulang'  && $pasien['id_cara_bayar'] != '42') {
            $tgl_keluar = date('Y-m-d', strtotime($pasien['tgl_masuk'])) . " 20:00:00";
        } else {
            $tgl_keluar = $this->input->post('inTglKeluar');
        }
        $pendapatan = get_list_pendapatan($id_pelayanan);
        $data = $pendapatan;

        $data['pasien'] = $this->M_Kasir->getDataPasienRajal($id_pelayanan, $id_history);

        $diskon_konsul = $this->input->post('inDiskonKonsul');
        $diskon_tindakan = $this->input->post('inDiskonTindakan');
        $diskon_labor = $this->input->post('inDiskonLabor');
        $diskon_radio = $this->input->post('inDiskonRadio');

        $data['diskon'] = $diskon_konsul + $diskon_tindakan + $diskon_labor + $diskon_radio;
        $data['diskon_konsul'] = $diskon_konsul;
        $data['diskon_tindakan'] = $diskon_tindakan;
        $data['diskon_labor'] = $diskon_labor;
        $data['diskon_radio'] = $diskon_radio;

        $data['tgl_keluar_rajal'] = $tgl_keluar;
        $data['dp'] = $this->input->post('inDp');
        $kasir = $this->M_Kasir->getDetailKasir($id_pelayanan);
        $data['selisih'] = isset($kasir->selisih) ? $kasir->selisih : $this->input->post('inSelisih');
        $data['note'] = $this->input->post('inNote');
        $data['tgl'] = $this->input->post('tgl');
        $data['inPel'] = $id_pelayanan;
        $data['inHis'] = $id_history;

        // $data['tgl_keluar'] = $this->input->post('inTglKeluar');
        $data['tgl_keluar'] = $tgl_keluar;

        $data['tgl_keluar_rajal'] = $tgl_keluar;
        $data['opsi'] = $this->input->post('opsi_bayar');
        // $data['totalbayarkasir'] = $this->input->post('totalbayar');
        // $data['totalkeseluruhan'] = $this->input->post('totalkeseluruhan');
        // $data['jenis_bank'] = $this->input->post('jenis_bank');
        // $sudah_bayar = $this->db->query("SELECT sum(total_bayar) sudah_dibayar from pendapatan_kasir where id_pelayanan='$id_pelayanan'")->row()->sudah_dibayar;
        // $data['sudah_bayar'] = (isset($sudah_bayar)) ? $sudah_bayar : 0;
        $ranap = $this->db->get_where('history_pelayanan_ranap', ['id_pelayanan' => $id_pelayanan, 'status' => 0])->row();
        if (!empty($ranap)) {
            $this->M_Kasir->delete_tindakan(['id_pelayanan' => $id_pelayanan], 'tindakan_apelkes');
        }

        if ($action == 'cetak') {

            $data['action'] = $action;
            // if ($staff->tipe == 'laboratorium') {
            //     $this->load->view('print/cetak_pembayaran_labor', $data);
            // } else {
            $this->load->view('print/cetak_pembayaran_poli', $data);
            // }
        } else if ($action == 'cetak_ulang') {
            $sum = array_sum(array_column($pendapatan, 'total'));
            // echo $sum;

            $pasien_pulang = $this->M_Kasir->getDataPasienPulangPoli($id_pelayanan, $id_history);
            $data['pasien'] = $pasien_pulang;
            $data['tgl_keluar_rajal'] = $pasien_pulang['tgl_keluar'];
            $data['opsi'] =  ($pasien_pulang['id_cara_bayar'] != '42') ? 'asuransi' : $this->input->post('opsi_bayar');
            $data['action'] = $action;

            $this->M_Kasir->delete_tindakan(['id_pelayanan' => $id_pelayanan, 'status' => 0], 'akun_tindakan');

            jurnal($id_pelayanan, $staff->id_staff);
            $this->load->view('print/cetak_pembayaran_poli', $data);
        } else if ($action == 'cetak_selisih') {
            $data['opsi_selisih'] = $this->input->post('opsi_bayar_selisih');
            $data['bank_selisih'] = $this->input->post('jenis_bank_selisih');
            $selisih = $this->input->post('inSelisih');
            $this->insert_selisih($id_pelayanan, $selisih, $data);
            $pagedata = $this->M_Kasir->getCetakDp($id_pelayanan, $id_history);

            $data['data'] = $pagedata;
            $data['kasir'] = $this->M_Kasir->getDetailKasir($id_pelayanan);
            $data['ket'] = 'Pembayaran Selisih ' . $pagedata['cara_bayar'] . ' Senilai';
            $this->load->view('print/cetak_dp_kasir', $data);
        } else if ($action == 'pulang') {
            if (($this->input->post('inTglKeluar')) == NULL) {
                echo "<script type='text/javascript'>alert('Tanggal Pulang Belum Diisi');window.close();</script>";
            } else {
                // if ($pasien['id_cara_bayar'] == '42') {
                //     $sudah_bayar = $this->db->query("SELECT sum(total_bayar) sudah_dibayar from pendapatan_kasir where id_pelayanan='$id_pelayanan'")->row()->sudah_dibayar;
                //     $total_pendapatan = getPendapatan($id_pelayanan, $id_history);
                // } else {
                //     $total_pendapatan = 0;
                //     $sudah_bayar = 0;
                // }
                // $total = $total_pendapatan - $sudah_bayar;
                // if($total != 0){
                //     echo "<script type='text/javascript'>alert('Biaya yang masih har');window.close();</script>";

                // }
                $where = array('id_pelayanan' => $id_pelayanan);
                $datapel = array(
                    'tgl_keluar' => $tgl_keluar,
                    'staff_checkout' => $staff->id_staff,
                    'status_rawat' => 'selesai'
                );
                $this->M_Kasir->update_tindakan($datapel, $where, 'pelayanan');

                $tgl_checkout = date('Y-m-d H:i:s');
                $this->M_Kasir->update_tindakan(['tgl_checkout' => $tgl_checkout], $where, 'deatail_kasir');

                if ($pasien['id_cara_bayar'] == '42') {
                    jurnal($id_pelayanan, $staff->id_staff);
                    // jurnal_ijd($id_pelayanan, $staff->id_staff);
                    updateTglPulang_pendapatan($id_pelayanan);
                }

                $data['action'] = $action;

                $this->load->view('print/cetak_pembayaran_poli', $data);
            }
        }
    }
    public function print_riwayat_dp($encript)
    {
        $staff = $this->session->userdata('data_auth');
        $descript = explode('|', base64_decode(urldecode($encript)));


        $id_pelayanan = $descript[0];
        $id_history = $descript[1];
        $id_pendapatan = $descript[2];
        $pasien = $this->M_Kasir->getDataPasienRajal($id_pelayanan, $id_history);
        if (!empty($pasien['tgl_masuk'])) {
            $tgl_keluar = date('Y-m-d', strtotime($pasien['tgl_masuk'])) . " 16:00:00";
        } else {
            $tgl_keluar = "";
        }

        $data = get_list_pendapatan($id_pelayanan);

        $db_pendapatan = $this->db->query("SELECT * FROM(SELECT id_pendapatan,diskon,selisih,SUM(total_bayar) OVER ( PARTITION BY id_pelayanan ORDER BY tgl_input ) total
        FROM `pendapatan_kasir` 
        WHERE id_pelayanan = '$id_pelayanan'
        ) as a where id_pendapatan = '$id_pendapatan'
        
         ")->row();

        $data['pasien'] = $pasien;

        // $db_diskon = $this->db->get_where('detail_kasir_diskon',['id_pelayanan'=>$id_pelayanan,'id_history'=>$id_history])->row();

        $data['diskon'] = $db_pendapatan->diskon;

        $data['dp'] = $db_pendapatan->total;
        $data['selisih'] = $db_pendapatan->selisih;
        $data['note'] = '';
        $data['inPel'] = $id_pelayanan;

        // $data['tgl_keluar'] = $this->input->post('inTglKeluar');
        $data['tgl_keluar'] = $tgl_keluar;

        $data['tgl_keluar_rajal'] = $tgl_keluar;
        $data['opsi'] = 'cetak_riwayat_dp';

        $data['action'] = 'cetak_riwayat_dp';
        $this->load->view('print/cetak_pembayaran_poli', $data);
    }
    public function insertCheckOutKasir()
    {
        $data_staff = $this->session->userdata("data_auth");
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $jenis = $this->input->post('pelayanan');
        $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
        if (!empty($pasien['tgl_masuk'])  && $pelayanan['cara_bayar'] != '42') {
            $tgl_keluar = date('Y-m-d', strtotime($pasien['tgl_masuk'])) . " 16:00:00";
        } else {
            $tgl_keluar = date('Y-m-d H:i:s');
        }

        // jurnal($id_pelayanan);

        // $total_pendapatan = getPendapatan($id_pelayanan, $id_history);
        // $sudah_bayar = $this->db->query("SELECT sum(total_bayar) sudah_dibayar from pendapatan_kasir where id_pelayanan='$id_pelayanan'")->row()->sudah_dibayar;
        // // var_dump($total);

        // $page_data = $this->M_Kasir->getDetailKasir($id_pelayanan);


        // if (!empty($page_data)) {
        //     $total_bayar = $total_pendapatan - $sudah_bayar - $page_data->diskon - $page_data->selisih;

        //     $data = array(
        //         'total_harga' => $total_pendapatan,
        //         'total_bayar' => ($total_bayar < 0) ? 0 : $total_bayar,
        //         'tanggal' => date("Y-m-d H:i:s"),
        //         'tanggal_keluar' => $tgl_keluar,
        //         'id_staff' => $data_staff->id_staff,
        //         'status' => 1,
        //     );
        //     $where = array('id_pelayanan' => $id_pelayanan);
        //     $this->M_Kasir->update_tindakan($data, $where, 'deatail_kasir');
        //     $out['status'] = "success";
        // } else {
        //     $total_bayar = $total_pendapatan - $sudah_bayar;
        //     $data = array(
        //         'id_pelayanan' => $id_pelayanan,
        //         'diskon' => 0,
        //         'dp' => 0,
        //         'selisih' => 0,
        //         'total_harga' => $total_pendapatan,
        //         'total_bayar' => $total_bayar,
        //         'tanggal' => date("Y-m-d H:i:s"),
        //         'tanggal_keluar' => $tgl_keluar,
        //         'id_staff' => $data_staff->id_staff,
        //         'status' => 1,
        //     );
        //     $this->M_Kasir->insert_tindakan($data, 'deatail_kasir');
        // }

        $datapel = array(
            'tgl_keluar' =>  $tgl_keluar,
            'status_rawat' => 'selesai',
            'staff_checkout' => $data_staff->id_staff,
        );
        $wherepel = array('id_pelayanan' => $id_pelayanan);

        $this->M_Kasir->update_tindakan($datapel, $wherepel, 'pelayanan');
        $tgl_checkout = date('Y-m-d H:i:s');
        $this->M_Kasir->update_tindakan(['tgl_checkout' => $tgl_checkout], $wherepel, 'deatail_kasir');

        // jurnal_ijd($id_pelayanan);

        $page_data = $this->M_Kasir->getDetailKasir($id_pelayanan);

        // if ($total_bayar > 0) {
        //     if ($pelayanan->cara_bayar == '42') {
        //         $keterangan = 'cash';
        //     } else {
        //         $keterangan = 'asuransi';
        //     }
        //     $id_pendapatan = uniqid();
        //     $db_asuransi = $this->db->get_where('pendapatan_kasir', ['id_pelayanan' => $id_pelayanan, 'keterangan' => $keterangan])->result();
        //     $pendapatan = array(
        //         'id_pendapatan' => $id_pendapatan,
        //         'id_pelayanan' => $id_pelayanan,
        //         'total_pendapatan' => $total_pendapatan,
        //         'total_bayar' => $total_bayar,
        //         'tgl_input' => date("Y-m-d H:i:s"),
        //         'diskon' => $page_data->diskon,
        //         'dp' => $page_data->dp,
        //         'selisih' => $page_data->selisih,
        //         'keterangan' => $keterangan,
        //         'id_staff' => $data_staff->id_staff,
        //         'tipe' => "PEL"
        //     );
        //     if (count($db_asuransi) > 0) {
        //         $pendapatan1 = array(
        //             'total_pendapatan' => $total_pendapatan,
        //             'total_bayar' => $total_bayar,
        //             'diskon' => $page_data->diskon,
        //             'dp' => $page_data->dp,
        //             'selisih' => $page_data->selisih,
        //             'id_staff' => $data_staff->id_staff,
        //         );
        //         $this->M_Kasir->update_tindakan($pendapatan1, ['id_pelayanan' => $id_pelayanan], 'pendapatan_kasir');
        //     } else {
        //         $this->M_Kasir->insert_tindakan($pendapatan, 'pendapatan_kasir');
        //     }
        // }
        // //////////////  antrol ///////////////////////
        // $antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $id_pelayanan]);
        // if (count($antrian->result()) > 0) {
        //     $data_antrol = [
        //         'kodebooking' => $antrian->row()->id_antrian,
        //         'taskid' => 5,
        //         'waktu' => strtotime('now') * 1000
        //     ];
        //     update_antrian($data_antrol);
        // }

        // updateTglPulang_pendapatan($id_pelayanan);

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function print_pasien_pulang()
    {
        $action = $this->input->post('action');
        $id_pelayanan = $this->input->post('inPel');
        $id_history = $this->input->post('inHis');
        $pasien = $this->M_Kasir->getDataPasienPulangPoli($id_pelayanan, $id_history);
        $data['pasien'] = $this->M_Kasir->getDataPasienPulangPoli($id_pelayanan, $id_history);
        $data['diskon'] = $this->input->post('inDiskon');
        $data['dp'] = $this->input->post('inDp');
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
        $data['data_konservasi'] = $this->M_Kasir->list_konservasi_pasien($id_pelayanan);
        $data['data_jantung'] = $this->M_Kasir->list_jantung_pasien($id_pelayanan);
        $data['data_kulit'] = $this->M_Kasir->list_kulit_pasien($id_pelayanan);
        $data['data_mata'] = $this->M_Kasir->list_mata_pasien($id_pelayanan);
        $data['data_obgyne'] = $this->M_Kasir->list_obgyne_pasien($id_pelayanan);
        $data['data_ok'] = $this->M_Kasir->list_ok_pasien($id_pelayanan);
        $data['data_tht'] = $this->M_Kasir->list_tht_pasien($id_pelayanan);
        $data['data_umum'] = $this->M_Kasir->list_umum_pasien($id_pelayanan);
        $data['data_akp'] = $this->M_Kasir->list_akupuntur_pasien($id_pelayanan);
        $data['data_bdm'] = $this->M_Kasir->list_bedah_mulut_pasien($id_pelayanan);
        $data['data_jiwa'] = $this->M_Kasir->list_kesjiwa_pasien($id_pelayanan);
        $data['data_ort'] = $this->M_Kasir->list_orthopedi_pasien($id_pelayanan);
        $data['data_paru'] = $this->M_Kasir->list_paru_pasien($id_pelayanan);
        $data['data_hd'] = $this->M_Kasir->list_hemodialisa_pasien($id_pelayanan);
        $data['data_saraf'] = $this->M_Kasir->list_saraf_pasien($id_pelayanan);
        $data['data_uro'] = $this->M_Kasir->list_urologi_pasien($id_pelayanan);
        $data['data_ginjal'] = $this->M_Kasir->list_ginjal_pasien($id_pelayanan);
        $data['data_pnm'] = $this->M_Kasir->list_penyakit_mulut_pasien($id_pelayanan);
        $data['data_rehab'] = $this->M_Kasir->list_rehab_pasien($id_pelayanan);
        $data['data_gizi'] = $this->M_Kasir->list_gizi($id_pelayanan);
        $data['data_psikolog'] = $this->M_Kasir->list_psikolog($id_pelayanan);
        $data['data_kemo'] = $this->M_Kasir->list_kemo_pasien($id_pelayanan);
        $data['data_stifin'] = $this->M_Kasir->list_stifin_pasien($id_pelayanan);
        $data['data_okupasi'] = $this->M_Kasir->list_okupasi_pasien($id_pelayanan);
        $data['data_terapi_wicara'] = $this->M_Kasir->list_terapi_bicara($id_pelayanan);
        $data['data_kia'] = $this->M_Kasir->list_kia_pasien($id_pelayanan);


        $data['tgl_keluar_rajal'] = $pasien['tgl_keluar'];

        $db = $this->M_Kasir->getDpDisc($id_pelayanan);
        // $db = $this->M_Kasir->getDpDisc($id_pelayanan);

        $data['selisih'] = isset($db[0]->selisih) ? $db[0]->selisih : 0;
        $data['note'] = isset($db[0]->note) ? $db[0]->note : '';


        $this->load->view('print/cetak_pembayaran_pulang_poli', $data);
    }
    public function obat_bebas()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();

        $page_data['page_content'] = 'page_content/Obat_bebas_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_obat_bebas()
    {

        if ($this->input->post('mulai') != '' && $this->input->post('akhir') != '') {
            $page_data = $this->M_Apotik->selectObatBebas($this->input->post('mulai'), $this->input->post('akhir'));
        } else {
            $page_data = $this->M_Apotik->selectObatBebas('', '');
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;

            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_obat_bebas .  "\",\"" . $page_data[$i]->cara_bayar . "\")' '><i class='fa fa-rocket '></i></button>";
            // $tombol = "<a class='btn btn-info btn-icon-anim btn-square' href='" . base_url() . "Kasir_poli/print_obat_bebas/" . $page_data[$i]->id_obat_bebas  . "' ><i class='icon-printer'></i></a>";
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $nama = $page_data[$i]->nama;
            $carabayar = $page_data[$i]->carabayar;
            $dpjp = $page_data[$i]->dpjp;
            $keterangan = $page_data[$i]->keterangan;
            $unit = $page_data[$i]->unit;
            $id_nota = $page_data[$i]->id_nota;
            $nota = $this->db->get_where('nota_resep', ['id_nota_resep' => $id_nota])->row();
            $no_nota = isset($nota->no_nota) ? $nota->no_nota : "";
            $out[$i] = array($no, $tombol, $tgl, $waktu, $nama, $carabayar, $dpjp, $unit, $no_nota, $keterangan);
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
    function getTotalObatBebas()
    {
        $id_pelayanan = $this->input->post('id');
        $db = $this->db->query("SELECT IFNULL(SUM(total),0) total, depo from tindakan_farmasi where id_pelayanan = '$id_pelayanan'")->result();

        $sudah_bayar = $this->db->query("SELECT IFNULL(sum(total_bayar),0) sudah_dibayar from pendapatan_kasir where id_pelayanan='$id_pelayanan'")->row()->sudah_dibayar;

        if (count($db) > 0) {
            if ($db[0]->depo == 'APOTIK') {
                $total = round($db[0]->total * 1.11);
            } else {
                $total = $db[0]->total;
            }
            $sub = $total - $sudah_bayar;
            $db = $sub;
            // $db = $db;
        } else {
            $db = 0;
        }
        // print_arr($db) ;

        echo json_encode($db);
        exit;
    }
    public function print_obat_bebas()
    {
        $data_staff = $this->session->userdata('data_auth');

        $id_resep = $this->input->post('inPel');
        $action = $this->input->post('action');


        $data['data_labor'] = $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama,Date(t.tanggal) tanggal
        from tindakan_labor t, list_tindakan_labor l, pelayanan p , form_labor f
        WHERE t.id_list_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$id_resep'
        and t.id_form_labor = f.id_form_labor and f.status_pembayaran ='tidak'
        ")->result_array();

        $data['data_radio'] = $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama ,DATE(t.tanggal) tanggal
        from tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p 
        WHERE t.id_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$id_resep'
        and t.status_pembayaran ='tidak'
        ")->result_array();
        $data['data_transportasi'] = $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama ,DATE(t.tanggal) tanggal
        from tindakan_pelayanan_tambahan t, list_tindakan_apelkes l, pelayanan p 
        WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$id_resep'
        and t.status_pembayaran ='tidak'
        ")->result_array();
        $data['penunjang_lain'] = $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama ,DATE(t.tanggal) tanggal
        from tindakan_penunjang_lain t, list_tindakan_apelkes l, pelayanan p
        WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$id_resep' 
        and t.status_pembayaran ='tidak'
        ")->result_array();
        $data['data_apelkes'] = $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama ,DATE(t.tanggal) tanggal
       from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p 
       WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$id_resep'
       and t.status_pembayaran ='tidak'
      ")->result_array();
        $data['tindakan_poli'] = $this->db->query("SELECT sum(total) total, sum(frek) frek, nama_tindakan nama, if((nama_dokter!='-'),nama_dokter,'') dokter , nama_poli
        from tindakan_poli
        WHERE id_pelayanan='$id_resep' and status_pembayaran ='tidak'
        group by id_list_tindakan,id_poli
        order by nama_poli
       ")->result_array();

        $data['data_obat'] = $this->M_Apotik->getObatBebasById($id_resep);
        $pasien = $this->M_Apotik->getDataObatBebas($id_resep);
        $data['pasien']['dokter'] = $pasien['dpjp'];
        $data['pasien']['asal'] = 'DATANG SENDIRI';
        $data['pasien']['nama'] = $pasien['nama'];
        $data['pasien']['cara_bayar'] = $pasien['cara_bayar'];
        $data['pasien']['no_rm'] = 'BEBAS';
        $data['inPel'] = $id_resep;

        $page_data = $this->M_Kasir->getDetailKasir($id_resep);
        $total = $this->db->query("SELECT SUM(total) total from tindakan_farmasi where id_pelayanan = '$id_resep'")->row()->total;

        $id_pendapatan = uniqid();
        $totalbayarkasir = ($this->input->post('opsi_bayar') != 'asuransi') ? $this->input->post('totalbayar') : $this->input->post('totalkeseluruhan');
        $totalkeseluruhan = $this->input->post('totalkeseluruhan');
        $pendapatan = array(
            'id_pendapatan' => $id_pendapatan,
            'id_pelayanan' => $id_resep,
            'total_pendapatan' => $totalkeseluruhan,
            'total_bayar' => $totalbayarkasir,
            'tgl_input' => date("Y-m-d H:i:s"),
            'diskon' => 0,
            'dp' => 0,
            'selisih' => 0,
            'keterangan' => $this->input->post('opsi_bayar'),
            'tgl_pulang' => date("Y-m-d H:i:s"),
            'id_staff' => $data_staff->id_staff,
            'tipe' => "OBAT BEBAS"
        );
        $data2 = array(
            'id_pendapatan_bank' => uniqid(),
            'id_pendapatan' => $id_pendapatan,
            'id_pelayanan' => $id_resep,
            'total_pendapatan' => $totalbayarkasir,
            'jenis_pembayaran' => $this->input->post('opsi_bayar'),
            'cara_bayar' => $this->input->post('jenis_bank'),
            'tgl_input' => date("Y-m-d H:i:s"),
            'diskon' => 0,
            'dp' => 0,
            'keterangan' => "non-tunai",
            'tgl_pulang' => date("Y-m-d H:i:s"),
            'id_staff' => $data_staff->id_staff,
            'status' => ""
        );


        if ($this->input->post('opsi_bayar') != 'asuransi') {
            $kasir_nol = $this->db->get_where('pendapatan_kasir', ['id_pelayanan' => $id_resep])->result();

            if ($totalkeseluruhan > 0) { //jika total keseluruhan besar dari 0

                // $this->M_Kasir->delete_tindakan(['id_pelayanan' => $id_resep], 'pendapatan_kasir');
                // $this->M_Kasir->delete_tindakan(['id_pelayanan' => $id_resep], 'pendapatan_bank');

                $this->M_Kasir->insert_tindakan($pendapatan, 'pendapatan_kasir');
                if ($this->input->post('opsi_bayar') == 'cash') {
                } else {
                    $this->M_Kasir->insert_tindakan($data2, 'pendapatan_bank');
                }
            }
            // }
        }

        jurnal_obat_bebas($id_resep);
        $this->load->view('print/cetak_ptt_kasir', $data);
    }
    public function insert_selisih($id_pelayanan, $selisih, $data_bayar)
    {
        $data_staff = $this->session->userdata('data_auth');
        $page_data = $this->M_Kasir->getDetailKasir($id_pelayanan);
        if (!empty($page_data)) {
            $data = array(

                'selisih' => $page_data->selisih + $selisih,
            );
            $where = array(
                'id_pelayanan' => $id_pelayanan,
            );
            $this->M_Kasir->update_tindakan($data, $where, 'deatail_kasir');
            // $out['status'] = "success";
        } else {

            $data = array(
                'id_pelayanan' => $id_pelayanan,
                'diskon' => 0,
                'dp' => 0,
                'selisih' => $selisih,
                'note' => '',
                'total_harga' => 0,
                'total_bayar' => 0,
                'tanggal' => date("Y-m-d H:i:s"),
                'tanggal_keluar' => date("Y-m-d H:i:s"),
                'id_staff' => $data_staff->id_staff,
                'status' => 1,
            );
            $this->M_Kasir->insert_tindakan($data, 'deatail_kasir');
            $out['status'] = "success";
        }
        $id_pendapatan = uniqid();

        $pendapatan = array(
            'id_pendapatan' => $id_pendapatan,
            'id_pelayanan' => $id_pelayanan,
            'total_pendapatan' => 0,
            'total_bayar' => 0,
            'tgl_input' => date("Y-m-d H:i:s"),
            'diskon' => 0,
            'dp' => 0,
            'selisih' => $selisih,
            'keterangan' => $data_bayar['opsi_selisih'],
            'tgl_pulang' => date("Y-m-d H:i:s"),
            'id_staff' => $data_staff->id_staff,
            'tipe' => 'SELISIH'
        );
        $data2 = array(
            'id_pendapatan_bank' => uniqid(),
            'id_pendapatan' => $id_pendapatan,
            'id_pelayanan' => $id_pelayanan,
            'total_pendapatan' => 0,
            'jenis_pembayaran' => $data_bayar['opsi_selisih'],
            'cara_bayar' => $data_bayar['bank_selisih'],
            'tgl_input' => date("Y-m-d H:i:s"),
            'diskon' => 0,
            'dp' => 0,
            'keterangan' => "SELISIH",
            'tgl_pulang' => date("Y-m-d H:i:s"),
            'id_staff' => $data_staff->id_staff,
            'status' => ""
        );


        if ($selisih > 0) {
            // $this->M_Kasir->delete_tindakan(['id_pelayanan' => $id_pelayanan, 'tipe' => 'SELISIH'], 'pendapatan_kasir');
            // $this->M_Kasir->delete_tindakan(['id_pelayanan' => $id_pelayanan, 'keterangan' => 'SELISIH'], 'pendapatan_bank');

            $this->M_Kasir->insert_tindakan($pendapatan, 'pendapatan_kasir');
            if ($data_bayar['opsi_selisih'] != 'cash') {
                $this->M_Kasir->insert_tindakan($data2, 'pendapatan_bank');
            }
        }
    }
    function getTotalMCU()
    {
        $id_pelayanan = $this->input->post('id');
        $tindakan = array_sum(array_column($this->M_Kasir->getTindakanMcuById($id_pelayanan), 'total'));
        $obat = array_sum(array_column($this->M_Kasir->getObatMcuById($id_pelayanan), 'total'));
        $labor = array_sum(array_column($this->M_Kasir->list_labor_mcu($id_pelayanan), 'total'));
        $radio = array_sum(array_column($this->M_Kasir->list_radio_mcu($id_pelayanan), 'total'));
        $total = $tindakan + $obat + $labor + $radio;

        $sudah_bayar = $this->db->query("SELECT IFNULL(sum(total_bayar),0) sudah_dibayar from pendapatan_kasir 
        where id_pelayanan='$id_pelayanan' and tipe ='MCU'")->row()->sudah_dibayar;


        $sub = $total - $sudah_bayar;
        $db = $sub;
        // $db = $db;

        // print_arr($db) ;

        echo json_encode($db);
        exit;
    }
    public function print_kasir_tes($id_pelayanan, $id_history)
    {
        $staff = $this->session->userdata('data_auth');
        $action = $this->input->post('action');

        // $id_pelayanan = $this->input->post('inPel');
        // $id_history = $this->input->post('inHis');
        $pasien = $this->M_Kasir->getDataPasienRajal($id_pelayanan, $id_history);
        if (!empty($pasien['tgl_masuk'])) {
            $tgl_keluar = date('Y-m-d', strtotime($pasien['tgl_masuk'])) . " 16:00:00";
        } else {
            $tgl_keluar = $this->input->post('inTglKeluar');
        }
        // $data = get_list_pendapatan($id_pelayanan);

        $data['pasien'] = $this->M_Kasir->getDataPasienRajal($id_pelayanan, $id_history);
        $data['diskon'] = $this->input->post('inDiskon');
        $data['tgl_keluar_rajal'] = $tgl_keluar;
        $data['dp'] = $this->input->post('inDp');
        $data['selisih'] = $this->input->post('inSelisih');
        $data['note'] = $this->input->post('inNote');
        $data['tgl'] = $this->input->post('tgl');
        $data['inPel'] = $id_pelayanan;
        $data['data_poli'] = $this->db->query("SELECT sum(total) total, sum(frek) frek, nama_tindakan nama, if((nama_dokter!='-'),nama_dokter,'') dokter , nama_poli
        from tindakan_poli_tes
        WHERE id_pelayanan='$id_pelayanan'
        group by id_list_tindakan,id_poli")->result_array();;
        $data['data_pelayanan'] = $this->M_Kasir->list_pelayanan_pasien($id_pelayanan);

        // $data['tgl_keluar'] = $this->input->post('inTglKeluar');
        $data['tgl_keluar'] = $tgl_keluar;

        $data['tgl_keluar_rajal'] = $tgl_keluar;

        // if ($staff->tipe == 'laboratorium') {
        //     $this->load->view('print/cetak_pembayaran_labor', $data);
        // } else {
        $this->load->view('print/cetak_pembayaran_rajal_poli', $data);
        // }

    }
}
