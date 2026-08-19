<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Poli extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Poli');
        $this->load->model('M_Rawatinap');
        $this->load->model('M_Labor');
        $this->load->model('M_Pasien');
        $this->load->model('M_Apotik');
        $this->load->helper('text');
        $this->api = "http://36.92.141.4/rest_ci/index.php";
        // $this->api = "http://103.154.93.45/rest_ci/index.php";
        $this->load->library('curl');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Poli';
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        if ($tipe == 'poliinternis') {
            $page_data['nama_poli'] = "INTERNIS";
            $tbTindakan = 'list_tindakan_poli_internis';
            $spes = 'internis';
        } elseif ($tipe == 'poliobgyne') {
            $page_data['nama_poli'] = "OBGYN";
            $tbTindakan = 'list_tindakan_poli_obgyne';
            $spes = 'obgyn';
        } elseif ($tipe == 'politht') {
            $page_data['nama_poli'] = "THT";
            $tbTindakan = 'list_tindakan_poli_tht';
            $spes = 'tht';
        } elseif ($tipe == 'polimata') {
            $page_data['nama_poli'] = "MATA";
            $tbTindakan = 'list_tindakan_poli_mata';
            $spes = 'mata';
        } elseif ($tipe == 'polikulit') {
            $page_data['nama_poli'] = "KULIT";
            $tbTindakan = 'list_tindakan_poli_kulit';
            $spes = 'kulit';
        } elseif ($tipe == 'poliumum') {
            $page_data['nama_poli'] = "UMUM";
            $tbTindakan = 'list_tindakan_poli_umum';
            $spes = 'umum';
        } elseif ($tipe == 'polianak') {
            $page_data['nama_poli'] = "ANAK";
            $tbTindakan = 'list_tindakan_poli_anak';
            $spes = 'anak';
        } elseif ($tipe == 'poligigi') {
            $page_data['nama_poli'] = "GIGI";
            $tbTindakan = 'list_tindakan_poli_gigi';
            $spes = 'gigi';
        } elseif ($tipe == 'polijantung') {
            $page_data['nama_poli'] = "JANTUNG";
            $tbTindakan = 'list_tindakan_poli_jantung';
            $spes = 'jantung';
        } elseif ($tipe == 'polibedah') {
            $page_data['nama_poli'] = "BEDAH";
            $tbTindakan = 'list_tindakan_poli_bedah_umum';
            $spes = 'bedah';
        } elseif ($tipe == 'polifisio') {
            $page_data['nama_poli'] = "FISIO";
            $tbTindakan = 'list_tindakan_poli_fisio';
            $spes = 'rehabilitasi';
        } elseif ($tipe == 'rehab') {
            $page_data['nama_poli'] = "CONTROL_REHABILITAS MEDIC";
            $tbTindakan = 'list_tindakan_poli_fisio';
            $spes = 'rehabilitasi';
        } elseif ($tipe == 'polihemodialisa') {
            $page_data['nama_poli'] = "HEMODIALISA";
            $tbTindakan = 'list_tindakan_poli_hemodialisa';
            $spes = 'hemodialisa';
        } elseif ($tipe == 'poliakupuntur') {
            $page_data['nama_poli'] = "AKUPUNTUR MEDIK";
            $tbTindakan = 'list_tindakan_poli_akupuntur';
            $spes = 'rehabilitasi';
        } elseif ($tipe == 'polibedahmulut') {
            $page_data['nama_poli'] = "BEDAH MULUT";
            $tbTindakan = 'list_tindakan_poli_bedah_mulut';
            $spes = 'bedahmulut';
        } elseif ($tipe == 'polikesjiwa') {
            $page_data['nama_poli'] = "KESEHATAN JIWA";
            $tbTindakan = 'list_tindakan_poli_kes_jiwa';
            $spes = 'kesjiwa';
        } elseif ($tipe == 'poliorthopedi') {
            $page_data['nama_poli'] = "ORTHOPEDI";
            $tbTindakan = 'list_tindakan_poli_orthopedi';
            $spes = 'orthopedi';
        } elseif ($tipe == 'poliparu') {
            $page_data['nama_poli'] = "PARU";
            $tbTindakan = 'list_tindakan_poli_paru';
            $spes = 'paru';
        } elseif ($tipe == 'polisaraf') {
            $page_data['nama_poli'] = "SARAF";
            $tbTindakan = 'list_tindakan_poli_saraf';
            $spes = 'saraf';
        } elseif ($tipe == 'poliurologi') {
            $page_data['nama_poli'] = "UROLOGI";
            $tbTindakan = 'list_tindakan_poli_urologi';
            $spes = 'urologi';
        } elseif ($tipe == 'polipenyakitmulut') {
            $page_data['nama_poli'] = "PENYAKIT MULUT";
            $tbTindakan = 'list_tindakan_poli_penyakit_mulut';
            $spes = 'penyakitmulut';
        } elseif ($tipe == 'poliginjal') {
            $page_data['nama_poli'] = "GINJAL";
            $tbTindakan = 'list_tindakan_poli_ginjal';
            $spes = 'ginjal';
        } elseif ($tipe == 'polipsikolog') {
            $page_data['nama_poli'] = "PSIKOLOG";
            $tbTindakan = 'list_tindakan_poli_psikolog';
            $spes = 'psikolog';
        } elseif ($tipe == 'poligizi') {
            $page_data['nama_poli'] = "GIZI";
            $tbTindakan = 'list_tindakan_poli_gizi';
            $spes = 'giz';
        } elseif ($tipe == 'terapiwicara') {
            $page_data['nama_poli'] = "TERAPI WICARA";
            $tbTindakan = 'list_tindakan_poli_terapi_bicara';
            $spes = 'twc';
        } elseif ($tipe == 'kemoterapi') {
            $page_data['nama_poli'] = "POLI KEMOTERAPI";
            $tbTindakan = 'list_tindakan_poli_kemoterapi';
            $spes = 'kem';
        } elseif ($tipe == 'polistifin') {
            $page_data['nama_poli'] = "POLI STIFIN";
            $tbTindakan = 'list_tindakan_poli_stifin';
            $spes = 'kem';
        } elseif ($tipe == 'poliorthodonti') {
            $page_data['nama_poli'] = "POLI ORTHODONTI";
            $tbTindakan = 'list_tindakan_poli_gigi';
            $spes = 'gor';
        } elseif ($tipe == 'konservasigigi') {
            $page_data['nama_poli'] = "POLI KONSERVASI GIGI";
            $tbTindakan = 'list_tindakan_poli_gigi';
            $spes = 'ksg';
        } elseif ($tipe == 'okupasi') {
            $page_data['nama_poli'] = "POLI OKUPASI";
            $tbTindakan = 'list_tindakan_okupasi';
            $spes = 'KDO';
        }

        // $page_data['tindakan_poli'] = $this->M_Poli->selectNamaTindakan($tbTindakan);
        //$page_data['tindakan_radiologi'] = $this->M_Poli->selectNamaRadiologi();
        // $page_data['tindakan_radiologi_prioritas'] = $this->M_Poli->selectNamaRadiologiPrioritas();
        //$page_data['tindakan_labor'] = $this->M_Poli->selectNamaLabor();
        // $page_data['tindakan_labor_prioritas'] = $this->M_Poli->selectNamaLaborPrioritas();
        // $page_data['dokter'] = $this->M_Poli->selectDokter($spes);
        // $page_data['obat'] = $this->M_Poli->getNamaObat();
        //$page_data['signa'] = $this->M_Apotik->getSigna();
        //$page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    // PASIEN POLI



    // Print BAYI HARI*-
    public function Labor_BAYIHARI_Print($id_pelayanan)
    {
        $data['print_labor'] = $this->M_Labor->Labor_PrintById_Rajal($id_pelayanan);
        $this->load->view('print/labor_bayihari_print', $data);
    }

    // Print BAYI BULAN
    public function Labor_BAYIBULAN_Print($id_pelayanan)
    {
        $data['print_labor'] = $this->M_Labor->Labor_PrintById_Rajal($id_pelayanan);
        $this->load->view('print/labor_bayibulan_print', $data);
    }

    // Print ANAK
    public function Labor_ANAK_Print($id_pelayanan)
    {
        $data['print_labor'] = $this->M_Labor->Labor_PrintById_Rajal($id_pelayanan);
        $this->load->view('print/labor_anak_print', $data);
    }

    // Print DEWASA
    public function Labor_DEWASA_Print($id_pelayanan)
    {
        $data['print_labor'] = $this->M_Labor->Labor_PrintById_Rajal($id_pelayanan);
        $this->load->view('print/labor_dewasa_print', $data);
    }

    //   print semua

    // Print All DEWASA
    public function Labor_DEWASA_All_Print($id_pelayanan)
    {
        $data['print_labor'] = $this->M_Labor->Labor_PrintById_All($id_pelayanan);
        $data['print_labor2'] = $this->M_Labor->Labor_PrintById_All3($id_pelayanan);
        $this->load->view('print/labor_dewasa_print_all', $data);
    }

    // Print All ANAK
    public function Labor_ANAK_All_Print($id_pelayanan)
    {
        $data['print_labor'] = $this->M_Labor->Labor_PrintById_All($id_pelayanan);
        $data['print_labor2'] = $this->M_Labor->Labor_PrintById_All3($id_pelayanan);
        $this->load->view('print/labor_anak_print_all', $data);
    }

    // Print All BAYI BULAN
    public function Labor_BULAN_All_Print($id_pelayanan)
    {
        $data['print_labor'] = $this->M_Labor->Labor_PrintById_All($id_pelayanan);
        $data['print_labor2'] = $this->M_Labor->Labor_PrintById_All3($id_pelayanan);
        $this->load->view('print/labor_bayibulan_print_all', $data);
    }

    // Print All BAYI HARI
    public function Labor_HARI_All_Print($id_pelayanan)
    {
        $data['print_labor'] = $this->M_Labor->Labor_PrintById_All($id_pelayanan);
        $data['print_labor2'] = $this->M_Labor->Labor_PrintById_All3($id_pelayanan);
        $this->load->view('print/labor_bayihari_print_all', $data);
    }

    public function tampil_harga()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        if ($tipe == 'poliinternis') {
            $table = 'tindakan_poli_internis';
        } elseif ($tipe == 'poliobgyne') {
            $table = 'tindakan_poli_obgyne';
        } elseif ($tipe == 'politht') {
            $table = 'tindakan_poli_tht';
        } elseif ($tipe == 'polimata') {
            $table = 'tindakan_poli_mata';
        } elseif ($tipe == 'polikulit') {
            $table = 'tindakan_poli_kulit';
        } elseif ($tipe == 'poliumum') {
            $table = 'tindakan_poli_umum';
        } elseif ($tipe == 'polianak') {
            $table = 'tindakan_poli_anak';
        } elseif ($tipe == 'poligigi' || $tipe == 'poliorthodonti' || $tipe == 'konservasigigi') {
            $table = 'tindakan_poli_gigi';
        } elseif ($tipe == 'polijantung') {
            $table = 'tindakan_poli_jantung';
        } elseif ($tipe == 'polibedah') {
            $table = 'tindakan_poli_bedah';
        } elseif ($tipe == 'polifisio') {
            $table = 'tindakan_poli_fisio';
        } elseif ($tipe == 'rehab') {
            $table = 'tindakan_poli_fisio';
        } elseif ($tipe == 'poliakupuntur') {
            $table = 'tindakan_poli_akupuntur';
        } elseif ($tipe == 'polibedahmulut') {
            $table = 'tindakan_poli_bedah_mulut';
        } elseif ($tipe == 'polikesjiwa') {
            $table = 'tindakan_poli_kes_jiwa';
        } elseif ($tipe == 'poliorthopedi') {
            $table = 'tindakan_poli_orthopedi';
        } elseif ($tipe == 'poliparu') {
            $table = 'tindakan_poli_paru';
        } elseif ($tipe == 'polisaraf') {
            $table = 'tindakan_poli_saraf';
        } elseif ($tipe == 'poliurologi') {
            $table = 'tindakan_poli_urologi';
        } elseif ($tipe == 'polipenyakitmulut') {
            $table = 'tindakan_poli_penyakit_mulut';
        } elseif ($tipe == 'poliginjal') {
            $table = 'tindakan_poli_ginjal';
        } elseif ($tipe == 'polipsikolog') {
            $table = 'tindakan_poli_psikolog';
        } elseif ($tipe == 'poligizi') {
            $table = 'tindakan_poli_gizi';
        } elseif ($tipe == 'terapiwicara') {
            $table = 'tindakan_poli_terapi_bicara';
        } elseif ($tipe == 'kemoterapi') {
            $table = 'tindakan_poli_kemoterapi';
        } elseif ($tipe == 'polistifin') {
            $table = 'tindakan_poli_stifin';
        } elseif ($tipe == 'okupasi') {
            $table = 'tindakan_okupasi';
        }

        $id_pelayanan = $this->input->post('id_pelayanan');
        $db = $this->M_Poli->harga_total($id_pelayanan, $table);
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

    public function tampil_pasien_rajal()
    {
        $poli = $this->input->post('poli');
        $page_data = $this->M_Poli->selectPasienRajal1($poli);


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $ranap = $this->M_Poli->selectPasienRanapById($page_data[$i]->id_pelayanan);
            //$total = $this->M_Kasir->getTotal($page_data[$i]->id_pelayanan);
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            if ($jenis_pelayanan == "POLI PRIORITAS") {
                $jp = "PRIORITAS";
            } else {
                $jp = "POLI";
            }
            if (count($ranap) > 0) {
                $status_ranap = '<span class="label label-warning">Masuk Rawat Inap</span>';
            } else {
                $status_ranap = '-';
            }
            $no = $i + 1;
            // $cetak ="<a class='btn btn-primary btn-icon-anim btn-square' href='Kasir/print_dp/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "/" . $page_data[$i]->id_cara_bayar . "' ><i class='icon-printer'></i></a>";

            // $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->id_cara_bayar . "\",\"" . $page_data[$i]->cara_bayar . "\")' '><i class='fa fa-rocket '></i></button>";
            // $tombol1 =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilEditKonsul(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
            //$erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('erm_poli/form/' . $page_data[$i]->id_pelayanan . '/' . $page_data[$i]->id_history) . "><i class='icon-note'></i></a>";
            $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('erm_poli/form/' . urlencode(base64_encode($page_data[$i]->id_pelayanan)) . '/' . urlencode(base64_encode($page_data[$i]->id_history)) . '/' . $jp) . "><i class='icon-note'></i></a>";

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

            $out[$i] = array($no, $erm, $tgl, $waktu, $no_rm, $pasien, $jk, $tgl1, $umur, $jenis_pelayanan, $poli, $status_ranap, $caraBayar, $diagnosa, $dokter);
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

    public function tampil_pasien()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;

        $page_data = $this->M_Poli->selectDataPasien($tipe);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%d %B %Y ", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);
            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            if ($jenis_pelayanan == "POLI PRIORITAS") {
                $jp = "PRIORITAS";
            } else {
                $jp = "POLI";
            }
            // $edit = "<button class='btn btn-success btn-icon-anim btn-square'  onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";
            // $obat = "<button class='btn btn-warning btn-icon-anim btn-square'  onclick='edit_obat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-pencil'></i></button>";
            // $radiologi = "<center><button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_radiologi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-disc'></i></button></center>";
            // $labor = "<button class='btn btn-info btn-icon-anim btn-square' onclick='edit_labor(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $umr . "\")'><i class='icon-chemistry'></i></button>";
            if ($page_data[$i]->status_kasir == 1) {
                $kasir = "<span class='label label-success capitalize-font inline-block'>REQUESTED<span>";
            } else {
                $kasir = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='edit_kasir(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-dollar'></i></button>";
            }
            // $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('erm_poli/form/' . $page_data[$i]->id_pelayanan . '/' . $page_data[$i]->id_history) . "><i class='icon-note'></i></a>";
            $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('erm_poli/form/' . urlencode(base64_encode($page_data[$i]->id_pelayanan)) . '/' . urlencode(base64_encode($page_data[$i]->id_history)) . '/' . $jp) . "><i class='icon-note'></i></a>";
            // $checkout = "<button class='btn btn-danger btn-icon-anim btn-square' onclick='check_out(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-logout'></i></button>";
            //$batal = "<button class='btn btn-info btn-icon-anim btn-square' data-toggle='modal'  onclick='batal_berobat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->nama . "\")' '><i class='fa fa-times'></i></button>";
            $batal = "<button class='btn btn-info btn-icon-anim btn-square' data-toggle='modal'  onclick='batal_berobat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->no_rm . "\",\"" . $page_data[$i]->tgl_masuk . "\",\"" . $tipe . "\",\"" . $page_data[$i]->nama_dokter . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-times'></i></button>";
            $no = $i + 1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;

            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;
            $poli = $page_data[$i]->poli;


            if ($data->tipe == "polihemodialisa") {
                if (preg_match('/BPJS/i', $cara_bayar) && $cara_bayar != 'BPJSTK') {
                    $tombol = "<a class='btn btn-warning btn-icon-anim btn-square' href='" . base_url('SEP/form/') . $page_data[$i]->no_bpjs . "/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "'><i class='fa fa-pencil'></i></a>";
                    $soap = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('Form_soap_rehab/formsoap/') . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "'><i class='icon-pencil'></i></a>";
                } else {
                    $tombol = '';
                    $soap = '';
                }
                $out[$i] = array($no, $erm, $batal, $tombol, $soap, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $poli, $cara_bayar, $diagnosa, $dokter, $jenis_pelayanan);
            } else {
                $out[$i] = array($no, $erm, $batal, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $poli, $cara_bayar, $diagnosa, $dokter, $jenis_pelayanan);
            }
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
    private function getnmPoli()
    {
        $this->db->select("nama_panjang");
        $this->db->like("nama_panjang", "poli");
        $this->db->from("list_poli");
        $query =  $this->db->get()->result_array();
        return $query;
    }
    private function nmPoli($nama)
    {
        $newNama = "";
        $nmPanjang = $this->getnmPoli();
        for ($i = 0; $i < count($nmPanjang); $i++) {
            if (strlen($nama) == similar_text(strtoupper($nama), strtoupper(implode($nmPanjang[$i])))) {
                $newNama = implode($nmPanjang[$i]);
            }
        }
        return $newNama;
    }
    public function konfirmasi_hapus_pasien()
    {
        $staff = $this->session->userdata('data_auth');
        $idPelayanan = $this->input->post('idPelayanan');
        $id_history = $this->input->post('id_history');
        $norm = $this->input->post('noRM');
        $tglMasuk = $this->input->post('tgl_masuk');
        $tipee = $this->input->post('tipepoli');
        $nmpasien = $this->input->post('nmPasien');
        $keterangan = $this->input->post('keteranganBatal');
        $dpjp = $this->input->post('dpjp');
        $tipepoli = $this->nmPoli($tipee);

        $data = [
            'no_rm' => $norm,
            'id_pelayanan' => $idPelayanan,
            'id_history' => $id_history,
            'nama' => $nmpasien,
            'poli' => $tipepoli,
            'tgl_masuk' => $tglMasuk,
            'dpjp' => $dpjp,
            'keterangan' => $keterangan,
            'staff' => $staff->id_staff
        ];

        $this->M_Poli->insert_tindakan($data, 'konfirmasi_batal');
        $page_data = array(
            'tgl_hapus' => date('Y-m-d H:i:s', time()),
        );
        $where = array(
            'id_pelayanan' => $idPelayanan
        );
        $this->M_Pasien->delete_data_rajal($where, $page_data, 'pelayanan');
        $out['status'] = "sukses";
        echo json_encode($out);
    }

    public function getdata_gigi()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;

        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Poli->selectDataPasienby_id($id_pelayanan, $id_history);
        if ($db[0]->id_cara_bayar == '333' || $db[0]->id_cara_bayar == 'b1' || $db[0]->id_cara_bayar == 'b4') {
            $tindakan_fisio = $this->M_Rawatinap->getTipeKamarFisio_lama('KELAS III');
        } else {
            $tindakan_fisio = $this->M_Rawatinap->getTipeKamarFisio('KELAS III');
        }
        // $db1 = $this->M_Poli->cekJumTindakan($id_pelayanan, $tbTindakan);
        // $count = count($db1);
        if (count($db) > 0) {
            $data = $db[0];
            $db = array(
                'status_dt' => 'found',
                'data' => $data,
                'fisio' => $tindakan_fisio,
            );
            // $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        // print_arr($db) ;
        echo json_encode($db);
        exit;
    }

    public function insert_tindakan()
    {
        $data = $this->session->userdata('data_auth');
        $tipe_staff = $data->tipe;

        if ($tipe_staff == 'rekam medis' || $tipe_staff == 'rawatinap' || $tipe_staff == 'icu') {
            $list_poli = $this->db->get_where('list_poli', ['tipe' => 'polifisio'])->row();
            $table = 'tindakan_poli_fisio';
        } else {
            $list_poli = $this->db->get_where('list_poli', ['tipe_staff' => $tipe_staff])->row();
            $table = $list_poli->tindakan;
        }

        $id_pelayanan = $this->input->post('idPelayanan');
        $id_history = $this->input->post('id_history');

        $id_tindakan = uniqid();
        $id_list_tindakan = $this->input->post('id_list_tindakan');

        $harga = $this->input->post('harga');
        $frek = $this->input->post('frek');
        $total = $this->input->post('total');
        $id_dokter = $this->input->post('dokter');
        $tgl =  date("Y-m-d H:i:s");
        $staff = $data->id_staff;
        $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
        if ($pelayanan->status_rawat == 'selesai') {
            $out['status'] = "Pasien sudah dicheckout";
        } else if ($tipe_staff == 'polihemodialisa' && $id_dokter == null) {
            $out['status'] = "Dokter dipilih terlebih dahulu";
        } else if ($tipe_staff == 'kemoterapi' && $id_dokter == null) {
            $out['status'] = "Dokter dipilih terlebih dahulu";
        } else {

            if ($frek == 0) {
                $out['status'] = "error";
            } else {
                $split = explode('_', $id_history);
                if ($split[0] == "ranap") {
                    $tipe = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->id_kamar;
                    $jenis_pelayanan = 'RAWAT INAP';
                } else {
                    $tipe = "NON";
                    $jenis_pelayanan = 'POLI';
                }
                if ($tipe_staff == 'polihemodialisa' || $tipe_staff == 'kemoterapi') {


                    $page_data = array(
                        'id_tindakan' => $id_tindakan,
                        'id_pelayanan' => $id_pelayanan,
                        'poli' => $id_history,
                        'tipe' => $tipe,
                        'jenis_pelayanan' => $jenis_pelayanan,
                        'id_list_tindakan' => $id_list_tindakan,
                        'harga' => $harga,
                        'frek' => $frek,
                        'tanggal' => $tgl,
                        'total' => $total,
                        'id_dokter' => $id_dokter,
                        'id_staff' => $staff,
                    );
                } else {
                    $page_data = array(
                        'id_tindakan' => $id_tindakan,
                        'id_pelayanan' => $id_pelayanan,
                        'id_list_tindakan' => $id_list_tindakan,
                        'harga' => $harga,
                        'frek' => $frek,
                        'tanggal' => $tgl,
                        'total' => $total,
                        'id_dokter' => $id_dokter,
                        'id_staff' => $staff,
                    );
                }

                $status_pembayaran = $this->input->post('status_pembayaran');
                $eklaim = $this->input->post('eklaim');
                $data_tindakan = array(
                    'id_list_tindakan' => $id_list_tindakan,
                    'harga' => $harga,
                    'frek' => $frek,
                    'id_pelayanan' => $id_pelayanan,
                    'id_history' => $id_history,
                    'id_kamar' => $tipe,
                    'id_dokter' => $id_dokter,
                    'total' => $total,
                    'tanggal' => $tgl,
                    'id_staff' => $staff,
                    'nama_tindakan' =>  $this->input->post('nama_tindakan'),
                    'kelompok_eklaim' => isset($eklaim) ? $eklaim : '-',
                    'nama_poli' =>  $list_poli->nama_panjang,
                    'nama_dokter' =>  $this->input->post('nama_dokter'),
                    'status_pembayaran' =>  isset($status_pembayaran) ? $status_pembayaran : 'ditanggung',
                    'id_poli' =>  $list_poli->id_list_poli,
                    'jenis_pelayanan' => $jenis_pelayanan,
                    'id_tindakan_lama' => $id_tindakan,
                );

                $this->db->trans_start();
                $this->M_Poli->insert_tindakan($page_data, $table);
                $this->M_Poli->insert_tindakan($data_tindakan, 'tindakan_poli');
                $this->db->trans_complete();

                $out['status'] = "success";
            }
        }

        echo json_encode($out);
    }

    //fisio
    public function getdata_fisio()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_IGD->selectDataPasienIGDby_id($id_pelayanan, $id_history);
        $tbTindakan = 'tindakan_igd';
        $db1 = $this->M_IGD->cekJumTindakan($id_pelayanan, $tbTindakan);
        $count = count($db1);
        if (count($db) > 0) {
            $data = $db[0];
            $db = array(
                'status_dt' => 'found',
                'data' => $data,
                'countTin' => $count
            );
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    // insert fisio
    //Fisio
    public function insert_fisio()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        if ($tipe == 'rekam medis' || $tipe == 'rawatinap' || $tipe == 'icu') {
            $list_poli = $this->db->get_where('list_poli', ['tipe_staff' => 'polifisio'])->row();
        } else {
            $list_poli = $this->db->get_where('list_poli', ['tipe_staff' => $tipe])->row();
        }
        $id_pelayanan = $this->input->post('id_pelayanan');
        $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
        if ($pelayanan->status_rawat == 'selesai') {
            $out['status'] = "Pasien sudah dicheckout";
        } else {

            $id_tindakan = $this->input->post('id_tindakan');
            $id_list_tindakan = $this->input->post('id_list_tindakan');
            $frek = $this->input->post('frek');
            $id_dokter = $this->input->post('dokter');
            $status = $this->input->post('status');
            $total = $this->input->post('total');
            $tipeKamar = $this->input->post('tipeKamar');
            // $pesan = $this->input->post('pesan');
            $tgl = date("Y-m-d H:i:s");
            $staff = $data->id_staff;
            $id_history = $this->input->post('id_history');
            $jenis_pelayanan = $this->input->post('jenis_pelayanan');
            if ($jenis_pelayanan == "RAWAT INAP" ||  $jenis_pelayanan == "RANAP") {
                $kamar = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->id_kamar;
                $tipe = $kamar;
            } else {
                $tipe = "NON";
            }
            $harga = $total / $frek;

            // $id_pelayanan = $this->input->post('id_pelayanan');
            // $id_history = $this->input->post('id_his');
            if ($frek == 0) {
                $out['status'] = "error";
            } else {
                $id_tindakan = uniqid();
                $data = array(
                    'id_tindakan' => $id_tindakan,
                    'id_list_tindakan' => $id_list_tindakan,
                    //'harga' => $harga,
                    'frek' => $frek,
                    'id_pelayanan' => $id_pelayanan,
                    'poli' => $id_history,
                    'tipe' => $tipe,
                    'total' => $total,
                    'tanggal' => $tgl,
                    'id_staff' => $staff,
                    'id_dokter' => $id_dokter,
                    'jenis_pelayanan' => $this->input->post('jenis_pelayanan'),
                    // 'status' => 0,
                    // 'jam_periksa' => '',
                    // 'jam_selesai' => '',
                );

                $data_tindakan = array(
                    'id_list_tindakan' => $id_list_tindakan,
                    'harga' => $harga,
                    'frek' => $frek,
                    'id_pelayanan' => $id_pelayanan,
                    'id_history' => $id_history,
                    'id_kamar' => $tipe,
                    'id_dokter' => $id_dokter,
                    'total' => $total,
                    'tanggal' => $tgl,
                    'id_staff' => $staff,
                    'nama_tindakan' =>  $this->input->post('nama_tindakan'),
                    'nama_poli' =>  $list_poli->nama_panjang,
                    'nama_dokter' =>  $this->input->post('nama_dokter'),
                    'id_poli' =>  $list_poli->id_list_poli,
                    'jenis_pelayanan' => $jenis_pelayanan,
                    'id_tindakan_lama' => $id_tindakan,
                );

                $this->db->trans_start();
                $this->M_Poli->insert_tindakan($data, 'tindakan_poli_fisio');
                $this->M_Poli->insert_tindakan($data_tindakan, 'tindakan_poli');
                $this->db->trans_complete();

                $out['status'] = "success";
            }
        }
        echo json_encode($out);
    }

    //Fisio
    public function getdataFisio()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_IGD->selectDataPasienFisioby_id($id_pelayanan, $id_history);
        $tbTindakan = 'tindakan_poli_fisio';
        $db1 = $this->M_Poli->cekJumTindakan($id_pelayanan, $tbTindakan);
        $count = count($db1);
        if (count($db) > 0) {
            $data = $db[0];
            $db = array(
                'status_dt' => 'found',
                'data' => $data,
                'countTin' => $count
            );
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    public function tampil_total_fisio()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Poli->Total_Fisio_Byid($id_pelayanan);
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




    public function tampil_list_tindakan()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        if ($tipe == 'poliinternis' || $tipe == 'poli') {
            $table = 'v_tindakan_poli_internis';
        } elseif ($tipe == 'poliobgyne' || $tipe == 'poli') {
            $table = 'v_tindakan_poli_obgyne';
        } elseif ($tipe == 'politht') {
            $table = 'v_tindakan_poli_tht';
        } elseif ($tipe == 'polimata') {
            $table = 'v_tindakan_poli_mata';
        } elseif ($tipe == 'polikulit') {
            $table = 'v_tindakan_poli_kulit';
        } elseif ($tipe == 'poliumum') {
            $table = 'v_tindakan_poli_umum';
        } elseif ($tipe == 'polianak') {
            $table = 'v_tindakan_poli_anak';
        } elseif ($tipe == 'poligigi' || $tipe == 'poliorthodonti') {
            $table = 'v_tindakan_poli_gigi';
        } elseif ($tipe == 'polijantung') {
            $table = 'v_tindakan_poli_jantung';
        } elseif ($tipe == 'polibedah') {
            $table = 'v_tindakan_poli_bedah';
        } elseif ($tipe == 'polifisio' || $tipe == 'rekam medis' || $tipe == 'rawatinap' || $tipe == 'icu' || $tipe == 'rehab') {
            $table = 'v_tindakan_poli_fisio';
        } elseif ($tipe == 'poliakupuntur') {
            $table = 'v_tindakan_poli_akupuntur';
        } elseif ($tipe == 'polibedahmulut') {
            $table = 'v_tindakan_poli_bedah_mulut';
        } elseif ($tipe == 'polikesjiwa') {
            $table = 'v_tindakan_poli_kes_jiwa';
        } elseif ($tipe == 'poliorthopedi') {
            $table = 'v_tindakan_poli_orthopedi';
        } elseif ($tipe == 'poliparu') {
            $table = 'v_tindakan_poli_paru';
        } elseif ($tipe == 'polisaraf') {
            $table = 'v_tindakan_poli_saraf';
        } elseif ($tipe == 'poliurologi') {
            $table = 'v_tindakan_poli_urologi';
        } elseif ($tipe == 'polipenyakitmulut') {
            $table = 'v_tindakan_poli_penyakit_mulut';
        } elseif ($tipe == 'poliginjal') {
            $table = 'v_tindakan_poli_ginjal';
        } elseif ($tipe == 'polipsikolog') {
            $table = 'v_tindakan_poli_psikolog';
        } elseif ($tipe == 'poligizi') {
            $table = 'v_tindakan_poli_gizi';
        } elseif ($tipe == 'terapiwicara') {
            $table = 'v_tindakan_poli_terapi_wicara';
        } elseif ($tipe == 'polihemodialisa') {
            $table = 'v_tindakan_poli_hd';
        } elseif ($tipe == 'kemoterapi') {
            $table = 'v_tindakan_poli_kemo';
        } elseif ($tipe == 'polistifin') {
            $table = 'v_tindakan_poli_stifin';
        } elseif ($tipe == 'poliorthodonti') {
            $table = 'v_tindakan_orthodenti';
        } elseif ($tipe == 'konservasigigi') {
            $table = 'v_tindakan_konservasi_gigi';
        } elseif ($tipe == 'okupasi') {
            $table = 'v_tindakan_okupasi';
        }
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Poli->selectDataTindakanByIdPel($id_pelayanan, $table);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {

            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_tindakan(\"" . $page_data[$i]->id_tindakan . "\",\"" . $id_pelayanan . "\",\"" . $page_data[$i]->nama_tindakan .  "\")' '><i class='fa fa-trash '></i></button>";

            $no = $i + 1;
            $nama_tindakan = $page_data[$i]->nama_tindakan;
            //$harga = "Rp " . number_format($page_data[$i]->harga, 0, ',', '.');
            $frek = $page_data[$i]->frek;
            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $nama_dokter = $page_data[$i]->nama_dokter;
            $nama_staff = $page_data[$i]->nama_staff;
            $tanggal_pel = $page_data[$i]->tanggal;
            $tombol = $tombol;

            $out[$i] = array($no, $nama_tindakan, $tanggal_pel, $frek, $total, $nama_dokter, $nama_staff, $tombol);
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


    public function tampil_total_harga()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        if ($tipe == 'poliinternis' || $tipe == 'poli') {
            $table = 'v_tindakan_poli_internis';
        } elseif ($tipe == 'poliobgyne' || $tipe == 'poli') {
            $table = 'v_tindakan_poli_obgyne';
        } elseif ($tipe == 'politht') {
            $table = 'v_tindakan_poli_tht';
        } elseif ($tipe == 'polimata') {
            $table = 'v_tindakan_poli_mata';
        } elseif ($tipe == 'polikulit') {
            $table = 'v_tindakan_poli_kulit';
        } elseif ($tipe == 'poliumum') {
            $table = 'v_tindakan_poli_umum';
        } elseif ($tipe == 'polianak') {
            $table = 'v_tindakan_poli_anak';
        } elseif ($tipe == 'poligigi') {
            $table = 'v_tindakan_poli_gigi';
        } elseif ($tipe == 'polijantung') {
            $table = 'v_tindakan_poli_jantung';
        } elseif ($tipe == 'polibedah') {
            $table = 'v_tindakan_poli_bedah';
        } elseif ($tipe == 'polifisio' || $tipe == 'rekam medis' || $tipe == 'rawatinap' || $tipe == 'icu' || $tipe == 'rehab') {
            $table = 'v_tindakan_poli_fisio';
        } elseif ($tipe == 'poliakupuntur') {
            $table = 'v_tindakan_poli_akupuntur';
        } elseif ($tipe == 'polibedahmulut') {
            $table = 'v_tindakan_poli_bedah_mulut';
        } elseif ($tipe == 'polikesjiwa') {
            $table = 'v_tindakan_poli_kes_jiwa';
        } elseif ($tipe == 'poliorthopedi') {
            $table = 'v_tindakan_poli_orthopedi';
        } elseif ($tipe == 'poliparu') {
            $table = 'v_tindakan_poli_paru';
        } elseif ($tipe == 'polisaraf') {
            $table = 'v_tindakan_poli_saraf';
        } elseif ($tipe == 'poliurologi') {
            $table = 'v_tindakan_poli_urologi';
        } elseif ($tipe == 'polipenyakitmulut') {
            $table = 'v_tindakan_poli_penyakit_mulut';
        } elseif ($tipe == 'poliginjal') {
            $table = 'v_tindakan_poli_ginjal';
        } elseif ($tipe == 'polipsikolog') {
            $table = 'v_tindakan_poli_psikolog';
        } elseif ($tipe == 'poligizi') {
            $table = 'v_tindakan_poli_gizi';
        } elseif ($tipe == 'terapiwicara') {
            $table = 'v_tindakan_poli_terapi_wicara';
        } elseif ($tipe == 'polihemodialisa') {
            $table = 'v_tindakan_poli_hd';
        } elseif ($tipe == 'kemoterapi') {
            $table = 'v_tindakan_poli_kemo';
        } elseif ($tipe == 'polistifin') {
            $table = 'v_tindakan_poli_stifin';
        } elseif ($tipe == 'poliorthodonti') {
            $table = 'v_tindakan_orthodenti';
        } elseif ($tipe == 'konservasigigi') {
            $table = 'v_tindakan_konservasi_gigi';
        } elseif ($tipe == 'okupasi') {
            $table = 'v_tindakan_okupasi';
        }
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Poli->Total_Harga_Byid($id_pelayanan, $table);
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


    function hapus_data_tindakan()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;

        if ($tipe == 'rekam medis' || $tipe == 'rawatinap' || $tipe == 'icu') {
            $list_poli = $this->db->get_where('list_poli', ['tipe_staff' => 'polifisio'])->row();
            $table = 'tindakan_poli_fisio';
        } else {
            $list_poli = $this->db->get_where('list_poli', ['tipe_staff' => $tipe])->row();
            $table = $list_poli->tindakan;
        }

        $id_tindakan = $this->input->post('id_tindakan');
        $this->db->trans_start();
        $this->M_Poli->delete_tindakan($id_tindakan, $table, 'id_tindakan');
        $this->M_Poli->delete('tindakan_poli', ['id_tindakan_lama' => $id_tindakan, 'id_poli' => $list_poli->id_list_poli]);
        $this->db->trans_complete();
        $out['status'] = "success";
        echo json_encode($out);
    }

    // Radiologi 
    public function tampil_total_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Poli->Total_Radiologi_Byid($id_pelayanan);
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

    public function insert_radiologi()
    {
        $data = $this->session->userdata('data_auth');

        $id_pel_rad = $this->input->post('id_pel_rad');
        $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pel_rad])->row();
        if ($pelayanan->status_rawat == 'selesai') {
            $out['status'] = "Pasien sudah dicheckout";
        } else {
            $id_tindakan_radiologi = $this->input->post('id');
            $harga = $this->input->post('harga');
            $id_list_tindakan = $this->input->post('id_list_tindakan');
            $frek = $this->input->post('frek');
            $total = $this->input->post('total');
            $pesan = $this->input->post('pesan');
            $diagnosa = $this->input->post('diagnosa');
            $tgl = date("Y-m-d H:i:s");
            $staff = $data->id_staff;

            $id_pelayanan = $this->input->post('id_pel_rad');
            $id_history = $this->input->post('id_his_rad');

            $poli = $this->db->query("SELECT l.nama_panjang from history_pelayanan h, list_poli l where h.nama_poli = l.id_list_poli and h.nama_poli ='$id_history'")->row();

            $jenis_pelayanan = $this->input->post('jenis_pelayanan');

            if ($jenis_pelayanan == "RAWAT INAP" ||  $jenis_pelayanan == "RANAP") {
                $kamar = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->id_kamar;
                $tipe = $kamar;
            } else {
                $tipe = "NON";
            }


            if ($frek == 0) {
                $out['status'] = "Isi Jumlah Tindakannya Terlebih Dahulu";
            } else if ($diagnosa == "") {
                $out['status'] = "Isi Diagnosa Terlebih Dahulu";
            } else {
                $data = array(
                    'id_tindakan_radiologi' => $id_tindakan_radiologi,
                    'harga' => $harga,
                    'frek' => $frek,
                    'id_pelayanan' => $id_pel_rad,
                    'poli' => $id_history,
                    'jenis_pelayanan' => $this->input->post('jenis_pelayanan'),
                    'tipe' => $tipe,
                    'id_tindakan' => $id_list_tindakan,
                    'total' => $total,
                    'tanggal' => $tgl,
                    'diagnosa' => $diagnosa,
                    'id_staff' => $staff,
                    'pesan' => $pesan,
                    'status_radiologi' => 1,
                    'status_pembayaran' => $this->input->post('status_pembayaran'),
                );

                $this->M_Poli->insert_tindakan($data, 'tindakan_radiologi');
                $out['status'] = "success";
            }
        }

        echo json_encode($out);
    }

    public function hapus_data_radiologi()
    {
        $id_tindakan_radiologi = $this->input->post('id_tindakan_radiologi');
        $this->M_Poli->delete_tindakan($id_tindakan_radiologi, 'tindakan_radiologi', 'id_tindakan_radiologi');
        $out['status'] = "success";
        echo json_encode($out);
    }

    //Tampil FISIO

    public function tampil_list_fisio()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Poli->selectDataFisioById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            // if ($data[$i]->ket == 1) {
            //     $btn_detail = "<button class='btn btn-default btn-icon-anim btn square' onclick='detail_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'><i class='fa fa-search-plus'></i></button>";
            //     $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'>Selengkapnya</a>";
            //     $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            //     $status = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
            // } else {

            //     $btn_detail = "";
            //     $detail = "";
            //     $status = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
            //     $tombol = "";
            // }
            // if ($data[$i]->keterangan == null || $data[$i]->keterangan == '') {
            //     $download = "";
            //     $tombol = "";
            // } else {
            //     $download = '<a class="btn btn-success btn-xs" href="' . base_url('Poli/download_expertise/' . $data[$i]->id_tindakan_radiologi) . '"><span class="fas fa-pencil-alt"></span> Download</a></div>';
            //     $tombol = "";
            // }
            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_tindakan(\"" . $data[$i]->id_tindakan . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama_tindakan .  "\")' '><i class='fa fa-trash '></i></button>";
            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->total, 0, ',', '.');
            $frek = $data[$i]->frek;
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;
            $ket = $data[$i]->keterangan;

            // $pesan = $data[$i]->pesan;
            // $sub_ket = word_limiter($ket, 3);
            // $hasil_ket = $sub_ket . " &nbsp;" . $detail;
            // $a = $tombol;
            // $b = $status;

            $out[$i] = array($no, $nama, $tanggal, $harga, $frek, $id_staff, $staff_konf, $tombol);
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



    public function tampil_list_radiologi()
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
                $download = '<a class="btn btn-success btn-xs" href="' . base_url('Poli/download_expertise/' . $data[$i]->id_tindakan_radiologi) . '"><span class="fas fa-pencil-alt"></span> Download </a></div>';
                $tombol = "";
            }
            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $diagnosa = $data[$i]->diagnosa;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;
            $gambar = null;
            foreach (explode(',', $data[$i]->gambar) as $image) { // 1, 2, 3
                $gambar .= "<img src='" . base_url() . "assets/images/" . $image . "' class='img-responsive zoom'><br>";
            }
            $ket = $data[$i]->keterangan;

            $pesan = $data[$i]->pesan;
            $sub_ket = word_limiter($ket, 3);
            $hasil_ket = $sub_ket . " &nbsp;" . $detail;
            $a = $tombol;
            $b = $status;

            $out[$i] = array($no, $a, $download, $nama, $tanggal, $harga, $frek, $id_staff, $staff_konf, $diagnosa, $gambar, $b);
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


    public function getdata_formById()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_tindakan = $this->input->post('tindakan');

        $db = $this->M_Poli->selectDataFormById($id_pelayanan, $id_tindakan);

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

    public function getdata_formById_Labor()
    {
        $id_tindakan = $this->input->post('tindakan');
        $db = $this->M_Poli->selectDataFormById_Labor($id_tindakan);

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


    public function get_radiologi()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        if ($tipe == 'poliinternis') {
            $table = 'v_pasien_internis';
        } elseif ($tipe == 'poliobgyne') {
            $table = 'v_pasien_obgyne';
        } elseif ($tipe == 'politht') {
            $table = 'v_pasien_tht';
        } elseif ($tipe == 'polimata') {
            $table = 'v_pasien_mata';
        } elseif ($tipe == 'polikulit') {
            $table = 'v_pasien_kulit';
        } elseif ($tipe == 'poliumum') {
            $table = 'v_pasien_umum';
        } elseif ($tipe == 'polianak') {
            $table = 'v_pasien_anak';
        } elseif ($tipe == 'poligigi') {
            $table = 'v_pasien_gigi';
        } elseif ($tipe == 'polijantung') {
            $table = 'v_pasien_jantung';
        } elseif ($tipe == 'polibedah') {
            $table = 'v_pasien_bedah';
        } elseif ($tipe == 'polifisio') {
            $table = 'v_pasien_fisio';
        } elseif ($tipe == 'rehab') {
            $table = 'v_pasien_rehab_medik';
        } elseif ($tipe == 'polihemodialisa') {
            $table = 'v_pasien_hemodialisa';
        } elseif ($tipe == 'poliakupuntur') {
            $table = 'v_pasien_poli_akupuntur';
        } elseif ($tipe == 'polibedahmulut') {
            $table = 'v_pasien_poli_bedah_mulut';
        } elseif ($tipe == 'polikesjiwa') {
            $table = 'v_pasien_poli_kes_jiwa';
        } elseif ($tipe == 'poliorthopedi') {
            $table = 'v_pasien_poli_orthopedi';
        } elseif ($tipe == 'poliparu') {
            $table = 'v_pasien_paru';
        } elseif ($tipe == 'polisaraf') {
            $table = 'v_pasien_poli_saraf';
        } elseif ($tipe == 'poliurologi') {
            $table = 'v_pasien_urologi';
        } elseif ($tipe == 'polipenyakitmulut') {
            $table = 'v_pasien_penyakit_mulut';
        } elseif ($tipe == 'poliginjal') {
            $table = 'v_pasien_ginjal';
        } elseif ($tipe == 'polipsikolog') {
            $table = 'v_pasien_psikolog';
        } elseif ($tipe == 'poligizi') {
            $table = 'v_pasien_gizi';
        } elseif ($tipe == 'terapiwicara') {
            $table = 'v_pasien_terapi_bicara';
        } elseif ($tipe == 'kemoterapi') {
            $table = 'v_pasien_kemo';
        } elseif ($tipe == 'polistifin') {
            $table = 'v_pasien_stifin';
        } elseif ($tipe == 'konservasigigi') {
            $table = 'v_pasien_konservasi_gigi';
        } elseif ($tipe == 'okupasi') {
            $table = 'v_pasien_okupasi';
        }
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Poli->selectDataPasienby_id($id_pelayanan, $id_history, $table);
        $db1 = $this->M_Poli->cekJumTindakanRad($id_pelayanan, $tipe);
        $count = count($db1);
        if (count($db) > 0) {
            $data = $db[0];
            $db = array(
                'status_dt' => 'found',
                'data' => $data,
                'countTin' => $count
            );
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    // End



    // Radiologi Prioritas
    public function tampil_list_radiologi_prioritas()
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
                $download = '<a class="btn btn-success btn-xs" href="' . base_url('Poli/download_expertise/' . $data[$i]->id_tindakan_radiologi) . '"><span class="fas fa-pencil-alt"></span> Download </a></div>';
                $tombol = "";
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
                $gambar .= "<img src='assets/images/" . $image . "' class='img-responsive zoom'><br>";
            }
            $ket = $data[$i]->keterangan;
            $diagnosa = $data[$i]->diagnosa;

            $pesan = $data[$i]->pesan;
            $sub_ket = word_limiter($ket, 3);
            $hasil_ket = $sub_ket . " &nbsp;" . $detail;
            $a = $tombol;
            $b = $status;

            $out[$i] = array($no, $a, $download, $nama, $tanggal, $harga, $frek, $id_staff, $staff_konf, $diagnosa, $gambar, $b);
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

    public function tampil_total_radiologi_prioritas()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Poli->Total_Radiologi_Prioritas_Byid($id_pelayanan);
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
    // End Radiologi Prioritas



    // Labor
    public function tampil_total_labor()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Poli->Total_Labor_Byid($id_pelayanan);
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
    public function insert_form_labor()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        $id_pelayanan = $this->input->post('id_pelayanan');
        $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
        if ($pelayanan->status_rawat == 'selesai') {
            $out['status'] = "Pasien sudah dicheckout";
        } else {

            $page_data = array(
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                'diagnosa' => $this->input->post('diagnosa'),
                'ringkasan' => $this->input->post('ringkasan'),
                'keterangan' => $this->input->post('keterangan'),
                'tgl' => $tgl,
                'status' => 0,
                'id_staff' => $data->id_staff,
                'status_pembayaran' => $this->input->post('status_pembayaran'),
            );
            $this->M_Poli->insert_tindakan($page_data, 'form_labor');
            $out['status'] = "success";
        }
        echo json_encode($out);
    }
    public function req_form_labor()
    {
        $id = $this->input->post('id');
        $query = $this->db->query("SELECT * from tindakan_labor where id_form_labor='$id'")->result();
        if (count($query) > 0) {
            $page_data = array(
                'tgl_request' =>  date("Y-m-d H:i:s"),
                'status' => 1
            );
            $where = array(
                'id_form_labor' => $id
            );

            $id_pel = $query[0]->id_pelayanan;

            $this->M_Poli->update_tindakan($page_data, $where, 'form_labor');

            $v_rawat_jalan = $this->db->query("SELECT no_rm,nama,alamat,tgl_lahir,jenis_kelamin,nama_poli,poli,username,nama_dokter,cara_bayar FROM v_kunjungan  WHERE id_pelayanan ='$id_pel'")->row_array();
            $form_labor = $this->db->query("SELECT diagnosa,tgl FROM form_labor  WHERE id_form_labor ='$id'")->row_array();

            if ($v_rawat_jalan['cara_bayar'] == 'BPJS') {
                $cara_bayar = '0';
            } else {
                $cara_bayar = '1';
            }

            if ($v_rawat_jalan['jenis_kelamin'] == 'Laki-laki' || $v_rawat_jalan['jenis_kelamin'] == 'LAKI-LAKI') {
                $jenis_kelamin = '1';
            } else {
                $jenis_kelamin = '2';
            }

            $kode_lis = $this->db->query("SELECT kode_lis from tindakan_labor where id_form_labor = '$id'")->result_array();
            $k = array();
            //print_arr($kode_lis);
            foreach ($kode_lis as $row) {
                $k[] = $row['kode_lis'];
            }

            $date  = $v_rawat_jalan['tgl_lahir'];
            $date1 = substr($date, 0, 10);
            $time2 = substr($date, 11, 20);
            $date2 = str_replace("-", "", $date1);
            $time2 = str_replace(":", "", $time2);

            $tgl_lahir = $date2 . $time2;

            $tgl  = $form_labor['tgl'];
            $tgl1 = substr($tgl, 0, 10);
            $jam1 = substr($tgl, 11, 20);
            $tgl2 = str_replace("-", "", $tgl1);
            $jam2 = str_replace(":", "", $jam1);

            $tgl_req = $tgl2 . $jam2;

            $data = array(
                'ID'            =>  $id,
                'MESSAGE_DT'    =>  date('Ymdhis'),
                'ORDER_CONTROL' =>  'NW',
                // 'VERSION'       =>   '2.3',
                'PID'           =>  $v_rawat_jalan['no_rm'],
                'PNAME'         =>  $v_rawat_jalan['nama'],
                // 'ADDRESS1'       =>  $add,
                'ADDRESS1'      =>  $v_rawat_jalan['alamat'],
                'ADDRESS2'      =>  '-',
                'ADDRESS3'      =>  '-',
                'ADDRESS4'      =>  '-',
                'PTYPE'         =>  'OP',
                'BIRTH_DT'      =>  $tgl_lahir,
                'SEX'           =>  $jenis_kelamin,
                'ONO'           =>  'A' . $id,
                'REQUEST_DT'    =>  $tgl_req,
                'SOURCE'        =>  $v_rawat_jalan['nama_poli'] . '^' . $v_rawat_jalan['poli'],
                'CLINICIAN'     =>  $v_rawat_jalan['username'] . '^' . $v_rawat_jalan['nama_dokter'],
                'ROOM_NO'       =>  '-',
                'PRIORITY'      =>  'R',
                'CMT'           =>  $form_labor['diagnosa'],
                'VISITNO'       =>  'A' . $id,

                'ORDER_TESTID'  =>  implode('~', $k),

                'STATUS'        =>  'N',
                'POST_DT'       =>  date('Ymdhis'),
                'GET_DT'        =>  date('Ymdhis'),
            );
            // echo print_r($data);
            $insert = $this->curl->simple_post($this->api . '/kontak', $data, array(CURLOPT_BUFFERSIZE => 50));



            $out['status'] = "success";
        } else {
            $out['status'] = "error";
        }

        echo json_encode($out);
    }

    public function req_form_labor_ranap()
    {
        $id = $this->input->post('id');
        $query = $this->db->query("SELECT * from tindakan_labor where id_form_labor='$id'")->result();
        if (count($query) > 0) {
            $page_data = array(
                'tgl_request' =>  date("Y-m-d H:i:s"),
                'status' => 1
            );
            $where = array(
                'id_form_labor' => $id
            );

            $id_pel = $query[0]->id_pelayanan;

            $this->M_Poli->update_tindakan($page_data, $where, 'form_labor');

            $v_rawat_inap = $this->db->query("SELECT no_rm,nama,alamat,tgl_lahir,jenis_kelamin,nama_poli as id_kamar,poli as tipe,username,nama_dokter,cara_bayar,nama_ruangan FROM v_kunjungan  WHERE id_pelayanan ='$id_pel' and nama_ruangan != '-'")->row_array();
            //$v_rawat_inap = $this->db->query("SELECT no_rm,nama,alamat,tgl_lahir,jenis_kelamin,id_kamar,nama_ruangan,dpjp,nama_dokter,cara_bayar,tipe FROM v_rawatinap_labor  WHERE id_pelayanan ='$id_pel'")->row_array();
            $form_labor = $this->db->query("SELECT diagnosa,tgl FROM form_labor  WHERE id_form_labor ='$id'")->row_array();

            if ($v_rawat_inap['cara_bayar'] == 'BPJS') {
                $cara_bayar = '0';
            } else {
                $cara_bayar = '1';
            }

            if ($v_rawat_inap['jenis_kelamin'] == 'Laki-laki' || $v_rawat_inap['jenis_kelamin'] == 'LAKI-LAKI') {
                $jenis_kelamin = '1';
            } else {
                $jenis_kelamin = '2';
            }

            $kode_lis = $this->db->query("SELECT kode_lis from tindakan_labor where id_form_labor = '$id'")->result_array();
            $k = array();
            //print_arr($kode_lis);
            foreach ($kode_lis as $row) {
                $k[] = $row['kode_lis'];
            }

            $date  = $v_rawat_inap['tgl_lahir'];
            $date1 = substr($date, 0, 10);
            $time2 = substr($date, 11, 20);
            $date2 = str_replace("-", "", $date1);
            $time2 = str_replace(":", "", $time2);

            $tgl_lahir = $date2 . $time2;

            $tgl  = $form_labor['tgl'];
            $tgl1 = substr($tgl, 0, 10);
            $jam1 = substr($tgl, 11, 20);
            $tgl2 = str_replace("-", "", $tgl1);
            $jam2 = str_replace(":", "", $jam1);

            $tgl_req = $tgl2 . $jam2;

            $data = array(
                'ID'            =>  $id,
                'MESSAGE_DT'    =>  date('YmdHis'),
                'ORDER_CONTROL' =>  'NW',
                // 'VERSION'       =>   '2.3',
                'PID'           =>  $v_rawat_inap['no_rm'],
                'PNAME'         =>  $v_rawat_inap['nama'],
                // 'ADDRESS1'       =>  $add,
                'ADDRESS1'      =>  $v_rawat_inap['alamat'],
                'ADDRESS2'      =>  '-',
                'ADDRESS3'      =>  '-',
                'ADDRESS4'      =>  '-',
                'PTYPE'         =>  'IP',
                'BIRTH_DT'      =>  $tgl_lahir,
                'SEX'           =>  $jenis_kelamin,
                'ONO'           =>  'A' . $id,
                'REQUEST_DT'    =>  $tgl_req,
                'SOURCE'        =>  $v_rawat_inap['id_kamar'] . '^' . $v_rawat_inap['nama_ruangan'],
                'CLINICIAN'     =>  $v_rawat_inap['username'] . '^' . $v_rawat_inap['nama_dokter'],
                'ROOM_NO'       =>  $v_rawat_inap['tipe'],
                'PRIORITY'      =>  'R',
                'CMT'           =>  $form_labor['diagnosa'],
                'VISITNO'       =>  'A' . $id,

                'ORDER_TESTID'  =>  implode('~', $k),

                'STATUS'        =>  'N',
                'POST_DT'       =>  date('YmdHis'),
                'GET_DT'        =>  date('YmdHis'),
            );
            // echo print_r($data);
            $insert = $this->curl->simple_post($this->api . '/kontak', $data, array(CURLOPT_BUFFERSIZE => 50));



            $out['status'] = "success";
        } else {
            $out['status'] = "error";
        }

        echo json_encode($out);
    }
    public function req_form_labor_prioritas()
    {
        $id = $this->input->post('id');
        $query = $this->db->query("SELECT * from tindakan_labor_pp where id_form_labor='$id'")->result();
        if (count($query) > 0) {
            $page_data = array(
                'tgl_request' =>  date("Y-m-d H:i:s"),
                'status' => 1
            );
            $where = array(
                'id_form_labor' => $id
            );
            $id_pel = $query[0]->id_pelayanan;
            $this->M_Poli->update_tindakan($page_data, $where, 'form_labor');

            $v_rawat_jalan = $this->db->query("SELECT no_rm,nama,alamat,tgl_lahir,jenis_kelamin,nama_poli,poli,username,nama_dokter,cara_bayar FROM v_rawat_jalan  WHERE id_pelayanan ='$id_pel'")->row_array();
            $form_labor = $this->db->query("SELECT diagnosa,tgl FROM form_labor  WHERE id_pelayanan ='$id_pel'")->row_array();

            if ($v_rawat_jalan['cara_bayar'] == 'BPJS') {
                $cara_bayar = '0';
            } else {
                $cara_bayar = '1';
            }

            if ($v_rawat_jalan['jenis_kelamin'] == 'Laki-laki' || $v_rawat_jalan['jenis_kelamin'] == 'LAKI-LAKI') {
                $jenis_kelamin = '1';
            } else {
                $jenis_kelamin = '2';
            }

            $kode_lis = $this->db->query("SELECT kode_lis from tindakan_labor_pp where id_form_labor = '$id'")->result_array();
            $k = array();
            //print_arr($kode_lis);
            foreach ($kode_lis as $row) {
                $k[] = $row['kode_lis'];
            }

            $date  = $v_rawat_jalan['tgl_lahir'];
            $date1 = substr($date, 0, 10);
            $time2 = substr($date, 11, 20);
            $date2 = str_replace("-", "", $date1);
            $time2 = str_replace(":", "", $time2);

            $tgl_lahir = $date2 . $time2;

            $tgl  = $form_labor['tgl'];
            $tgl1 = substr($tgl, 0, 10);
            $jam1 = substr($tgl, 11, 20);
            $tgl2 = str_replace("-", "", $tgl1);
            $jam2 = str_replace(":", "", $jam1);

            $tgl_req = $tgl2 . $jam2;

            $data = array(
                'ID'            =>  $id,
                'MESSAGE_DT'    =>  date('Ymdhis'),
                'ORDER_CONTROL' =>  'NW',
                // 'VERSION'       =>   '2.3',
                'PID'           =>  $v_rawat_jalan['no_rm'],
                'PNAME'         =>  $v_rawat_jalan['nama'],
                // 'ADDRESS1'       =>  $add,
                'ADDRESS1'      =>  $v_rawat_jalan['alamat'],
                'ADDRESS2'      =>  '-',
                'ADDRESS3'      =>  '-',
                'ADDRESS4'      =>  '-',
                'PTYPE'         =>  'OP',
                'BIRTH_DT'      =>  $tgl_lahir,
                'SEX'           =>  $jenis_kelamin,
                'ONO'           =>  'A' . $id,
                'REQUEST_DT'    =>  $tgl_req,
                'SOURCE'        =>  $v_rawat_jalan['nama_poli'] . '^' . $v_rawat_jalan['poli'],
                'CLINICIAN'     =>  $v_rawat_jalan['username'] . '^' . $v_rawat_jalan['nama_dokter'],
                'ROOM_NO'       =>  '-',
                'PRIORITY'      =>  'R',
                'CMT'           =>  $form_labor['diagnosa'],
                'VISITNO'       =>  'A' . $id,

                'ORDER_TESTID'  =>  implode('~', $k),

                'STATUS'        =>  'N',
                'POST_DT'       =>  date('Ymdhis'),
                'GET_DT'        =>  date('Ymdhis'),
            );
            // echo print_r($data);
            $insert = $this->curl->simple_post($this->api . '/kontak', $data, array(CURLOPT_BUFFERSIZE => 50));





            $out['status'] = "success";
        } else {
            $out['status'] = "error";
        }

        echo json_encode($out);
    }
    public function hapus_form_labor()
    {
        $id = $this->input->post('id');
        $this->M_Poli->delete_tindakan($id, 'form_labor', 'id_form_labor');
        $this->M_Poli->delete_tindakan($id, 'tindakan_labor', 'id_form_labor');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_form_labor()
    {
        $staff = $this->session->userdata('data_auth');

        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $page_data = $this->db->get_where('form_labor', array('id_pelayanan' => $id_pelayanan, 'status !=' => 99))->result();

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_form_labor(\"" . $page_data[$i]->id_form_labor .  "\")' '><i class='fa fa-trash '></i></button>";

            $param = array('ID' => $page_data[$i]->id_form_labor);
            $labor = json_decode($this->curl->simple_get($this->api . '/kontak', $param));
            if (empty($labor)) {
                $labor = '0';
            } else {
                $labor = '1';
            }

            if (($page_data[$i]->status == 0 && $labor == '0') || ($page_data[$i]->status == 1 && $labor == '0') || ($page_data[$i]->status == 0 && $labor == '1')) {
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_labor(\"" . $page_data[$i]->id_form_labor . "\")' '><i class='fa fa-rocket '></i></button>";

                $request =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='request_labor(\"" . $page_data[$i]->id_form_labor . "\")' '><i class='fa fa-thumbs-up '></i></button>";
            } elseif ($page_data[$i]->status == 1 && $labor == '1') {
                if ($staff->tipe == "laboratorium") {
                    $request = '<a class="btn btn-success btn-xs" href="' . base_url('Apelkes/print_labor/' . $page_data[$i]->id_form_labor) . '"><span class="fas fa-pencil-alt"></span> Download</a></div>';
                } else {
                    $request = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                }
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_labor1(\"" . $page_data[$i]->id_form_labor . "\")' '><i class='fa fa-rocket '></i></button>";
                $hapus = "";
            } else {
                $request = '<a class="btn btn-success btn-xs" href="' . base_url('Apelkes/print_labor/' . $page_data[$i]->id_form_labor) . '"><span class="fas fa-pencil-alt"></span> Download</a></div>';
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_labor1(\"" . $page_data[$i]->id_form_labor . "\")' '><i class='fa fa-rocket '></i></button>";
                $hapus = "";
            }

            $no = $i + 1;
            $diagnosa = $page_data[$i]->diagnosa;
            $ringkasan = $page_data[$i]->ringkasan;
            $keterangan = $page_data[$i]->keterangan;
            $time = strtotime($page_data[$i]->tgl);
            $tgl = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $out[$i] = array($no, $request, $tombol, $hapus, $tgl, $waktu, $diagnosa, $ringkasan, $keterangan);
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


    public function insert_labor()
    {
        $data = $this->session->userdata('data_auth');
        $id_pel_lab = $this->input->post('id_pel_lab');
        $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pel_lab])->row();
        if ($pelayanan->status_rawat == 'selesai') {
            $out['status'] = "Pasien sudah dicheckout";
        } else {
            $id_his_lab = $this->input->post('id_his_lab');
            $id_form_lab = $this->input->post('id_form_lab');
            $id_tindakan_labor = $this->input->post('id');
            $harga = $this->input->post('harga');
            $nama_tindakan = $this->input->post('nama_tindakan');
            $kode_lis = $this->input->post('kode_lis');
            $id_list_tindakan = $this->input->post('id_list_tindakan');
            $frek = $this->input->post('frek');
            $total = $this->input->post('total');
            $ring = $this->input->post('ring');
            $keta = $this->input->post('keta');
            $cara_masuk = $this->input->post('cara_masuk');
            $tgl_req = date("Y-m-d H:i:s");
            $tgl = date("Y-m-d H:i:s");
            $staff = $data->id_staff;


            if ($cara_masuk == "RAWAT INAP" ||  $cara_masuk == "RANAP") {
                $kamar = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_his_lab])->row()->id_kamar;
                $tipe = $kamar;
            } else {
                $tipe = "NON";
            }

            if ($frek == 0) {
                $out['status'] = "error";
            } else {
                $data = array(
                    // 'id_form_labor'=>uniqid(),
                    'id_tindakan_labor' => $id_tindakan_labor,
                    'harga' => $harga,
                    'nama_tindakan' => $nama_tindakan,
                    'kode_lis' => $kode_lis,
                    'frek' => $frek,
                    'id_pelayanan' => $id_pel_lab,
                    'poli' => $id_his_lab,
                    'tipe' => $tipe,
                    'id_form_labor' => $id_form_lab,
                    'id_list_tindakan' => $id_list_tindakan,
                    'total' => $total,
                    'tanggal_req' => $tgl_req,
                    'tanggal' => $tgl,
                    'id_staff' => $staff,
                    'keterangan' => $keta,
                    'ringkasan' => $ring,
                    'status_labor' => 1,
                    'cara_masuk' => $cara_masuk,

                );

                $this->M_Poli->insert_tindakan($data, 'tindakan_labor');
                $out['status'] = "success";
                $id_pelayanan = $this->input->post('id_pel_lab');
                $id_history = $this->input->post('id_his_lab');
                $count = array(
                    'tindakan_labor' => 1,
                );
                $this->M_Poli->insert_req_kasir($id_pelayanan, $id_history, $count);
                $out['status'] = "success";
            }
        }
        echo json_encode($out);
    }
    public function hapus_data_labor()
    {
        $id_tindakan_labor = $this->input->post('id_tindakan_labor');
        $this->M_Poli->delete_tindakan($id_tindakan_labor, 'tindakan_labor', 'id_tindakan_labor');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_list_labor()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Poli->selectDataLaborById($id_pelayanan);
        $staff = $this->session->userdata('data_auth');
        $izinAkses = $staff->izin_akses;
        $out = null;

        for ($i = 0; $i < count($data); $i++) {

            $birthDate = $data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');


            // if ($izinAkses == "admin") {
            $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_tindakan_labor(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_labor . "\")'>Selengkapnya</a>";
            // } else {
            //     if ($data[$i]->status == 1) {
            //         $tombol = "";
            //         $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_tindakan_labor(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_labor . "\")'>Selengkapnya</a>";
            //     } else {
            //         $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            //         $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_tindakan_labor(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_labor . "\")'>Selengkapnya</a>";
            //     }
            // }

            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;

            $keta = $data[$i]->keterangan;
            $sub_ket = word_limiter($keta, 3);
            $hasil_keta = $sub_ket . " &nbsp;" . $detail;

            $ring = $data[$i]->ringkasan;
            $sub_ring = word_limiter($ring, 3);
            $hasil_ring = $sub_ring . " &nbsp;" . $detail;

            $out[$i] = array($no, $tombol, $nama, $tanggal, $harga, $frek, $id_staff, $staff_konf, $hasil_ring, $hasil_keta);
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
    public function download_file($file)
    {
        force_download('assets/file-upload/' . $file, NULL);
    }
    public function download_expertise($id)
    {
        $radio =  $this->db->query("SELECT * FROM table_expertise where id_tindakan_radiologi= '$id' ")->row_array();
        $data['radio'] = $radio;
        $no_rm = $radio["no_rm"];
        $tindakan_radiologi = $radio["id_tindakan_radiologi"];
        $data['pasien'] = $this->db->query("SELECT * FROM pasien where no_rm= '$no_rm' ")->row_array();
        $data['tindakan_radiologi'] = $this->db->query("SELECT * FROM tindakan_radiologi where id_tindakan_radiologi= '$tindakan_radiologi' ")->row_array();
        $data['pelayanan'] = $this->db->query("SELECT p.no_sep FROM pelayanan p, tindakan_radiologi t, table_expertise e where p.id_pelayanan=t.id_pelayanan and e.id_tindakan_radiologi=t.id_tindakan_radiologi and e.id_tindakan_radiologi='$tindakan_radiologi' ")->row_array();


        $this->load->view('print/expertise', $data);
    }
    public function get_labor()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        if ($tipe == 'poliinternis') {
            $table = 'v_pasien_internis';
        } elseif ($tipe == 'poliobgyne') {
            $table = 'v_pasien_obgyne';
        } elseif ($tipe == 'politht') {
            $table = 'v_pasien_tht';
        } elseif ($tipe == 'polimata') {
            $table = 'v_pasien_mata';
        } elseif ($tipe == 'polikulit') {
            $table = 'v_pasien_kulit';
        } elseif ($tipe == 'poliumum') {
            $table = 'v_pasien_umum';
        } elseif ($tipe == 'polianak') {
            $table = 'v_pasien_anak';
        } elseif ($tipe == 'poligigi') {
            $table = 'v_pasien_gigi';
        } elseif ($tipe == 'polijantung') {
            $table = 'v_pasien_jantung';
        } elseif ($tipe == 'polibedah') {
            $table = 'v_pasien_bedah';
        } elseif ($tipe == 'polifisio') {
            $table = 'v_pasien_fisio';
        } elseif ($tipe == 'poliakupuntur') {
            $table = 'v_pasien_poli_akupuntur';
        } elseif ($tipe == 'polibedahmulut') {
            $table = 'v_pasien_poli_bedah_mulut';
        } elseif ($tipe == 'polikesjiwa') {
            $table = 'v_pasien_poli_kes_jiwa';
        } elseif ($tipe == 'poliorthopedi') {
            $table = 'v_pasien_poli_orthopedi';
        } elseif ($tipe == 'poliparu') {
            $table = 'v_pasien_paru';
        } elseif ($tipe == 'polisaraf') {
            $table = 'v_pasien_poli_saraf';
        } elseif ($tipe == 'poliurologi') {
            $table = 'v_pasien_poli_urologi';
        } elseif ($tipe == 'polipenyakitmulut') {
            $table = 'v_pasien_penyakit_mulut';
        } elseif ($tipe == 'poliginjal') {
            $table = 'v_pasien_ginjal';
        } elseif ($tipe == 'polipsikolog') {
            $table = 'v_pasien_psikolog';
        } elseif ($tipe == 'poligizi') {
            $table = 'v_pasien_gizi';
        } elseif ($tipe == 'terapiwicara') {
            $table = 'v_pasien_terapi_bicara';
        } elseif ($tipe == 'kemoterapi') {
            $table = 'v_pasien_kemo';
        } elseif ($tipe == 'polistifin') {
            $table = 'v_pasien_stifin';
        } elseif ($tipe == 'poliorthodonti') {
            $table = 'v_pasien_orthodenti';
        } elseif ($tipe == 'konservasigigi') {
            $table = 'v_pasien_konservasi_gigi';
        } elseif ($tipe == 'okupasi') {
            $table = 'v_pasien_okupasi';
        }
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Poli->selectDataPasienby_id($id_pelayanan, $id_history, $table);
        $db1 = $this->M_Poli->cekJumTindakanLab($id_pelayanan, $tipe);
        $count = count($db1);
        if (count($db) > 0) {
            $data = $db[0];
            $db = array(
                'status_dt' => 'found',
                'data' => $data,
                'countTin' => $count
            );
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }


    public function hapus_data_labor_prioritas()
    {
        $id_tindakan_labor = $this->input->post('id_tindakan_labor');
        $this->M_Poli->delete_tindakan($id_tindakan_labor, 'tindakan_labor', 'id_tindakan_labor');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_list_labor_prioritas()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Poli->selectDataLaborById($id_pelayanan);
        $staff = $this->session->userdata('data_auth');
        $izinAkses = $staff->izin_akses;
        $out = null;

        for ($i = 0; $i < count($data); $i++) {

            $birthDate = $data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');


            // if ($izinAkses == "admin") {
            $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor_prioritas(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_tindakan_labor(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_labor . "\")'>Selengkapnya</a>";
            // } else {
            //     if ($data[$i]->status == 1) {
            //         $tombol = "";
            //         $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_tindakan_labor(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_labor . "\")'>Selengkapnya</a>";
            //     } else {
            //         $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor_prioritas(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            //         $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_tindakan_labor(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_labor . "\")'>Selengkapnya</a>";
            //     }
            // }

            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;

            $keta = $data[$i]->keterangan;
            $sub_ket = word_limiter($keta, 3);
            $hasil_keta = $sub_ket . " &nbsp;" . $detail;

            $ring = $data[$i]->ringkasan;
            $sub_ring = word_limiter($ring, 3);
            $hasil_ring = $sub_ring . " &nbsp;" . $detail;

            $out[$i] = array($no, $tombol, $nama, $tanggal, $harga, $frek, $id_staff, $staff_konf, $hasil_ring, $hasil_keta);
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
    public function tampil_total_labor_prioritas()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Poli->Total_Labor_Byid($id_pelayanan);
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
    public function tampil_form_labor_prioritas()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $page_data = $this->db->get_where('form_labor', array('id_pelayanan' => $id_pelayanan))->result();

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_labor_prioritas(\"" . $page_data[$i]->id_form_labor . "\")' '><i class='fa fa-rocket '></i></button>";
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_form_labor_prioritas(\"" . $page_data[$i]->id_form_labor .  "\")' '><i class='fa fa-trash '></i></button>";
            if ($page_data[$i]->status == 0) {
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_labor_prioritas(\"" . $page_data[$i]->id_form_labor . "\")' '><i class='fa fa-rocket '></i></button>";
                $request =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='request_labor1(\"" . $page_data[$i]->id_form_labor . "\")' '><i class='fa fa-thumbs-up '></i></button>";
            } elseif ($page_data[$i]->status == 1) {
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_labor_prioritas1(\"" . $page_data[$i]->id_form_labor . "\")' '><i class='fa fa-rocket '></i></button>";
                $hapus = "";
                $request = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
            } else {
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_labor_prioritas1(\"" . $page_data[$i]->id_form_labor . "\")' '><i class='fa fa-rocket '></i></button>";
                $request = '<a class="btn btn-success btn-xs" href="' . base_url('Apelkes/print_labor/' . $page_data[$i]->id_form_labor) . '"><span class="fas fa-pencil-alt"></span> Download</a></div>';
                $hapus = "";
            }

            $no = $i + 1;
            $diagnosa = $page_data[$i]->diagnosa;
            $ringkasan = $page_data[$i]->ringkasan;
            $keterangan = $page_data[$i]->keterangan;
            $time = strtotime($page_data[$i]->tgl);
            $tgl = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $out[$i] = array($no, $request, $tombol, $hapus, $tgl, $waktu, $diagnosa, $ringkasan, $keterangan);
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

    public function hapus_form_labor_prioritas()
    {
        $id = $this->input->post('id');
        $this->M_Poli->delete_tindakan($id, 'form_labor', 'id_form_labor');
        $this->M_Poli->delete_tindakan($id, 'tindakan_labor_pp', 'id_form_labor');
        $out['status'] = "success";
        echo json_encode($out);
    }
    //End Labor Prioritas

    // Antrian
    public function Antrian_Poli()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        if ($tipe == 'poliinternis') {
            $poli = '24QRNLX29R';
            $page_data['nama_poli'] = "INTERNIS";
            $page_data['inisial'] = "p";
        } elseif ($tipe == 'poliobgyne') {
            $poli = 'HLGI4176K8';
            $page_data['nama_poli'] = "OBGYN";
            $page_data['inisial'] = "o";
        } elseif ($tipe == 'politht') {
            $poli = 'O782EGU4PR';
            $page_data['nama_poli'] = "THT";
            $page_data['inisial'] = "l";
        } elseif ($tipe == 'polimata') {
            $poli = 'UQ81K76373';
            $page_data['nama_poli'] = "MATA";
            $page_data['inisial'] = "m";
        } elseif ($tipe == 'polikulit') {
            $poli = '2JZ09X4K22';
            $page_data['nama_poli'] = "KULIT";
            $page_data['inisial'] = "k";
        } elseif ($tipe == 'poliumum') {
            $poli = 'RZE28J1098';
            $page_data['nama_poli'] = "UMUM";
            $page_data['inisial'] = "u";
        } elseif ($tipe == 'polianak') {
            $poli = 'E00RX703';
            $page_data['nama_poli'] = "ANAK";
            $page_data['inisial'] = "f";
        } elseif ($tipe == 'poligigi') {
            $poli = 'ODI8643C27';
            $page_data['nama_poli'] = "GIGI";
            $page_data['inisial'] = "g";
        } elseif ($tipe == 'polijantung') {
            $poli = 'I9NXY5VNQG';
            $page_data['nama_poli'] = "JANTUNG";
            $page_data['inisial'] = "j";
        } elseif ($tipe == 'polibedah') {
            $poli = 'MWK205D30K';
            $page_data['nama_poli'] = "BEDAH";
            $page_data['inisial'] = "d";
        } elseif ($tipe == 'polifisio') {
            $poli = '6E975PL694';
            $page_data['nama_poli'] = "FISIO";
            $page_data['inisial'] = "r";
        } elseif ($tipe == 'poliakupuntur') {
            $poli = 'SC3120P87';
            $page_data['nama_poli'] = "AKUPUNTUR MEDIK";
            $page_data['inisial'] = "AKP";
        } elseif ($tipe == 'polibedahmulut') {
            $poli = 'JG6142E66';
            $page_data['nama_poli'] = "BEDAH MULUT";
            $page_data['inisial'] = "BDM";
        } elseif ($tipe == 'polikesjiwa') {
            $poli = 'WT5092N25';
            $page_data['nama_poli'] = "KESEHATAN JIWA";
            $page_data['inisial'] = "JIW";
        } elseif ($tipe == 'poliorthopedi') {
            $poli = 'YR6435H21';
            $page_data['nama_poli'] = "ORTHOPEDI";
            $page_data['inisial'] = "ORT";
        } elseif ($tipe == 'poliparu') {
            $poli = 'ZX2016T39';
            $page_data['nama_poli'] = "PARU";
            $page_data['inisial'] = "PAR";
        } elseif ($tipe == 'polisaraf') {
            $poli = 'XN5395D61';
            $page_data['nama_poli'] = "SARAF";
            $page_data['inisial'] = "SAR";
        } elseif ($tipe == 'poliurologi') {
            $poli = 'EV7719I53';
            $page_data['nama_poli'] = "UROLOGI";
            $page_data['inisial'] = "URO";
        } elseif ($tipe == 'polipenyakitmulut') {
            $poli = 'FE1400Y26';
            $page_data['nama_poli'] = "PENYAKIT MULUT";
            $page_data['inisial'] = "PNM";
        } elseif ($tipe == 'poliginjal') {
            $poli = 'UG4424O51';
            $page_data['nama_poli'] = "GINJAL";
            $page_data['inisial'] = "GH";
        } elseif ($tipe == 'polipsikolog') {
            $poli = 'HK81U92373';
            $page_data['nama_poli'] = "PSIKOLOG";
            $page_data['inisial'] = "p";
        } elseif ($tipe == 'poligizi') {
            $poli = 'CV3RN1X29R';
            $page_data['nama_poli'] = "GIZI";
            $page_data['inisial'] = "giz";
        } elseif ($tipe == 'terapiwicara') {
            $poli = '6E9TWC694';
            $page_data['nama_poli'] = "TERAPI WICARA";
            $page_data['inisial'] = "twc";
        } elseif ($tipe == 'kemoterapi') {
            $poli = 'EM4488C53';
            $page_data['nama_poli'] = "POLI KEMOTERAPI";
            $page_data['inisial'] = "KEM";
        } elseif ($tipe == 'polistifin') {
            $poli = 'STF56NI';
            $page_data['nama_poli'] = "POLI STIFIN";
            $page_data['inisial'] = "STF";
        } elseif ($tipe == 'poliorthodonti') {
            $poli = 'CY2295T91';
            $page_data['nama_poli'] = "POLI ORTHODENTI";
            $page_data['inisial'] = "GOR";
        } elseif ($tipe == 'rehab') {
            $poli = '111111';
            $page_data['nama_poli'] = "CONTROL REHAB MEDIK";
            $page_data['inisial'] = "IRM";
        } elseif ($tipe == 'konservasigigi') {
            $poli = 'KSGI1244';
            $page_data['nama_poli'] = "POLI KONSERVASI GIGI";
            $page_data['inisial'] = "KSG";
        } elseif ($tipe == 'okupasi') {
            $poli = 'VF6675O81';
            $page_data['nama_poli'] = "POLI OKUPASI";
            $page_data['inisial'] = "KDO";
        }
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Antrian_pasien_poli.php';
        $page_data['count_data'] = $this->M_Poli->selectCountData($poli);
        $play = $this->M_Poli->selectAntrian($poli);
        if (count($play) > 0) {
            $page_data['antrian_data'] = $this->M_Poli->getAntrianPoli($poli);
        } else {
            $page_data['antrian_data'] = [
                'no_antri' => '',
                'id_antrian' => '',
                'nama' => ''
            ];
        }

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampilAntrian()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        if ($tipe == 'poliinternis') {
            $poli = '24QRNLX29R';
            $ins = 'p';
        } elseif ($tipe == 'poliobgyne') {
            $poli = 'HLGI4176K8';
            $ins = 'o';
        } elseif ($tipe == 'politht') {
            $poli = 'O782EGU4PR';
            $ins = 'l';
        } elseif ($tipe == 'polimata') {
            $poli = 'UQ81K76373';
            $ins = 'm';
        } elseif ($tipe == 'polikulit') {
            $poli = '2JZ09X4K22';
            $ins = 'k';
        } elseif ($tipe == 'poliumum') {
            $poli = 'RZE28J1098';
            $ins = 'u';
        } elseif ($tipe == 'polianak') {
            $poli = 'E00RX703';
            $ins = 'f';
        } elseif ($tipe == 'poligigi') {
            $poli = 'ODI8643C27';
            $ins = 'g';
        } elseif ($tipe == 'polijantung') {
            $poli = 'I9NXY5VNQG';
            $ins = 'j';
        } elseif ($tipe == 'polibedah') {
            $poli = 'MWK205D30K';
            $ins = 'd';
        } elseif ($tipe == 'polifisio') {
            $poli = '6E975PL694';
            $ins = 'r';
        } elseif ($tipe == 'poliakupuntur') {
            $poli = 'SC3120P87';
            $ins = 'AKP';
        } elseif ($tipe == 'polibedahmulut') {
            $poli = 'JG6142E66';
            $ins = 'BDM';
        } elseif ($tipe == 'polikesjiwa') {
            $poli = 'WT5092N25';
            $ins = 'JIW';
        } elseif ($tipe == 'poliorthopedi') {
            $poli = 'YR6435H21';
            $ins = 'ORT';
        } elseif ($tipe == 'poliparu') {
            $poli = 'ZX2016T39';
            $ins = 'PAR';
        } elseif ($tipe == 'polisaraf') {
            $poli = 'XN5395D61';
            $ins = 'SAR';
        } elseif ($tipe == 'poliurologi') {
            $poli = 'EV7719I53';
            $ins = 'URO';
        } elseif ($tipe == 'polipenyakitmulut') {
            $poli = 'FE1400Y26';
            $ins = 'PNM';
        } elseif ($tipe == 'poliginjal') {
            $poli = 'UG4424O51';
            $ins = 'GH';
        } elseif ($tipe == 'polipsikolog') {
            $poli = 'HK81U92373';
            $ins = 'p';
        } elseif ($tipe == 'poligizi') {
            $poli = 'CV3RN1X29R';
            $ins = 'gz';
        } elseif ($tipe == 'terapiwicara') {
            $poli = '6E9TWC694';
            $ins = 'tw';
        } elseif ($tipe == 'kemoterapi') {
            $poli = 'EM4488C53';
            $ins = 'KEM';
        } elseif ($tipe == 'polistifin') {
            $poli = 'STF56NI';
            $ins = 'STF';
        } elseif ($tipe == 'poliorthodonti') {
            $poli = 'CY2295T91';
            $ins = 'GOR';
        } elseif ($tipe == 'rehab') {
            $poli = '111111';
            $ins = 'IRM';
        } elseif ($tipe == 'konservasigigi') {
            $poli = 'KSGI1244';
            $ins = 'KSG';
        } elseif ($tipe == 'okupasi') {
            $poli = 'VF6675O81';
            $ins = 'KDO';
        }
        $data = $this->M_Poli->selectAntrian($poli);
        $out = null;
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->status == 0) {
                $status =
                    "<span class='label label-success capitalize-font inline-block'>ANTRI</span>";
                $skip = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='skip_data(\"" . $data[$i]->id_antrian . "\")' '><i class='icon-close'></i></button>";
            } else {
                $status =
                    "<span class='label label-danger capitalize-font inline-block'>SKIP</span>";
                $skip = "";
            }

            $panggil = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal'  onclick='playTableSuara(\"" . $data[$i]->no_antri . "\",\"" . $ins . "\",\"" . $data[$i]->poli . "\",\"" . $data[$i]->nama . "\")' '><i class='icon-control-play'></i></button>";

            $time = strtotime($data[$i]->jam);
            $waktu = strftime("%H:%M WIB", $time);

            $no_rm = $data[$i]->no_rm;
            $nama = $data[$i]->nama;
            $cara_bayar = $data[$i]->cara_bayar;
            $no_antri = $data[$i]->no_antri;
            $status = $status;
            $jam_masuk = $waktu;
            $skip = $skip;
            $panggil = $panggil;

            $out[$i] = array($no_antri, $jam_masuk, $no_rm, $nama, $cara_bayar, $status, $skip, $panggil);
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


    public function updateskip()
    {
        $id_antrian = $this->input->post('id_antrian');
        $status = '1';

        $data = array(
            'status' => $status
        );

        $where = array(
            'id_antrian' => $id_antrian
        );

        $this->M_Poli->updateskip($where, $data, 'antrian_poli');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function updatenext()
    {
        $id_antrian = $this->input->post('id_antrian');

        $status = '2';

        $data = array(
            'status' => $status
        );

        $where = array(
            'id_antrian' => $id_antrian
        );

        $this->M_Poli->updatenext($where, $data, 'antrian_poli');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function playSuara()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        if ($tipe == 'poliinternis') {
            $spes = 'PENYAKIT DALAM';
        } elseif ($tipe == 'poliobgyne') {
            $spes = 'KEBIDANAN DAN KANDUNGAN';
        } elseif ($tipe == 'politht') {
            $spes = 'THT';
        } elseif ($tipe == 'polimata') {
            $spes = 'MATA';
        } elseif ($tipe == 'polikulit') {
            $spes = 'KULIT DAN KELAMIN';
        } elseif ($tipe == 'poliumum') {
            $spes = 'UMUM';
        } elseif ($tipe == 'polianak') {
            $spes = 'ANAK';
        } elseif ($tipe == 'poligigi') {
            $spes = 'GIGI';
        } elseif ($tipe == 'polijantung') {
            $spes = 'JANTUNG';
        } elseif ($tipe == 'polibedah') {
            $spes = 'BEDAH';
        } elseif ($tipe == 'polifisio') {
            $spes = 'FISIOTERAPI';
        } else {
            $db_poli = $this->db->get_where('list_poli', ['tipe_staff' => $tipe])->row();
            $spes =  $db_poli->nama;
        }
        $nomor = $this->input->post("nomor");
        $kode = $this->input->post("kode");
        $nama = $this->input->post("nama");

        $tipe = 'POLI';
        $poli = $spes;

        $data = array(
            'no' => $nomor,
            'kode' => $kode,
            'tipe' => $tipe,
            'poli' => $spes,
            'nama' => $nama,
        );

        $this->M_Poli->insertplaySuara($data, 'temp_panggil_antrian');
        $data = array(
            // 'status' => 1,
            'waktu_play' => date('Y-m-d H:i:s')
        );

        $where = array(
            'no_antri' => $nomor,
            'inisial' => $kode,
            'tanggal' => date('Y-m-d'),
        );

        $this->M_Poli->updatenext($where, $data, 'antrian_poli');
        $out['status'] = "success";
        echo json_encode($out);
    }
    //obat
    public function insert_resep()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        $jenis = $this->input->post('jenis_resep');
        // if ($jenis == 1 || $jenis == 5) {
        $depo = $this->input->post('depo');
        // } else {
        //     $depo = "";
        // }
        $id_pelayanan = $this->input->post('id_pelayanan');
        $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
        if ($pelayanan->status_rawat == 'selesai') {
            $out['status'] = "Pasien sudah dicheckout";
        } else {
            $page_data = array(
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                'jenis_resep' => $jenis,
                'iterasi' => $this->input->post('iterasi'),
                'nama_resep' => $this->input->post('nama_resep'),
                'depo' => $depo,
                'tanggal' => $tgl,
                'status' => 0,
                'id_staff' => $data->id_staff,
            );
            $resep = $this->db->get_where('resep_obat', ['id_pelayanan' => $id_pelayanan, 'status' => 0, 'depo' => 'APOTIK'])->result();
            if (count($resep) > 0) {
                $out['status'] = "Resep sebelumnya belum di request, Silahkan direquest terlebih dahulu";
            } else {
                $this->M_Poli->insert_tindakan($page_data, 'resep_obat');

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
                // ///end

                $out['status'] = "success";
            }
        }
        echo json_encode($out);
    }
    public function insert_resep_racikan()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");

        $page_data = array(
            'id_racikan' => uniqid(),
            'id_resep' => $this->input->post('id_resep'),
            'id_signa' => $this->input->post('signa'),
            'id_cara_pakai' => $this->input->post('cara_pakai'),
            'resep' => $this->input->post('resep'),
            'tanggal' => $tgl,
            'id_staff' => $data->id_staff,


        );
        $this->M_Poli->insert_tindakan($page_data, 'resep_racikan');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function insert_obat()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        $id_pelayanan = $this->input->post('id_pelayanan');
        $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
        if ($pelayanan->status_rawat == 'selesai') {
            $out['status'] = "Pasien sudah dicheckout";
        } else {
            $depo = $this->input->post('depo');
            $id_tindakan = uniqid();
            $id_logistik = $this->input->post('id_list_tindakan');
            $jenis_pelayanan = $this->input->post('jenis_pelayanan');
            $id_history = $this->input->post('id_history');
            if ($jenis_pelayanan == "RAWAT INAP" ||  $jenis_pelayanan == "RANAP") {
                $kamar = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->id_kamar;
                $tipe = $kamar;
            } else {
                $tipe = "NON";
            }

            $db_list = $this->db->get_where('list_logistik', ['id_logistik' => $id_logistik])->row();
            $page_data = array(
                'id_tindakan_farmasi' =>  $id_tindakan,
                'harga' => $this->input->post('harga'),
                'harga_persediaan' => $db_list->harga_persediaan,
                'frek' => 0,
                'frek_req' => $this->input->post('frek'),
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'poli' => $this->input->post('id_history'),
                'jenis_pelayanan' => $this->input->post('jenis_pelayanan'),
                'id_resep' => $this->input->post('id_resep'),
                'id_list_tindakan' => $this->input->post('id_list_tindakan'),
                'total' => $this->input->post('total'),
                'tipe' => $tipe,
                'jumlah_racikan' => 0,
                'kadaluarsa' => $this->input->post('expire'),
                'tanggal' => $tgl,
                'id_staff' => $data->id_staff,
                'id_signa' => $this->input->post('signa'),
                'id_cara_pakai' => $this->input->post('cara_pakai'),
                'depo' => $depo,
                'hna' => $this->input->post('harga'),
                'margin' => $this->input->post('margin'),
                'disc' => $this->input->post('disc'),
                'keterangan' => $this->input->post('ket'),
            );

            $page_data1 = array(
                'id_tindakan_farmasi' =>  $id_tindakan,
                'harga' => $this->input->post('harga'),
                'frek' => $this->input->post('frek'),
                'frek_req' => $this->input->post('frek'),
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'jenis_pelayanan' => $this->input->post('jenis_pelayanan'),
                'id_resep' => $this->input->post('id_resep'),
                'id_list_tindakan' => $this->input->post('id_list_tindakan'),
                'total' => $this->input->post('total'),
                'tipe' => $tipe,
                'jumlah_racikan' => 0,
                'kadaluarsa' => $this->input->post('expire'),
                'tanggal' => $tgl,
                'id_staff' => $data->id_staff,
                'id_signa' => $this->input->post('signa'),
                'id_cara_pakai' => $this->input->post('cara_pakai'),
                'depo' => $depo,
                'hna' => $this->input->post('harga'),
                'margin' => $this->input->post('margin'),
                'disc' => $this->input->post('disc'),
                'keterangan' => $this->input->post('ket'),
            );


            if ($this->input->post('frek') <= 0) {
                $out['status'] = "Jumlah Obat Tidak Valid";
            } else {
                $this->M_Poli->insert_tindakan($page_data1, 'tindakan_farmasi_kronis');
                $this->M_Poli->insert_tindakan($page_data, 'tindakan_farmasi');
                $out['status'] = "success";
            }



            // $out['status'] = "success";
            // $id_pelayanan = $this->input->post('id_pelayanan');
            // $id_history = $this->input->post('id_history');
            // $count = array(
            //     'tindakan_farmasi' => 1,
            // );
            // $this->M_Poli->insert_req_kasir($id_pelayanan, $id_history,$count);
            // $out['status'] = "success";
        }
        echo json_encode($out);
    }
    public function insert_Return()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        $depo = $this->input->post('depo');
        $id_tindakan = uniqid();
        $id_logistik = $this->input->post('id_list_tindakan');
        $id_history = $this->input->post('id_history');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        if ($jenis_pelayanan == 'BEBAS') {
            $tipe = "NON";
            $pel = 'OBAT BEBAS';
        } else {
            $jenis_pelayanan = explode('_', $id_history);
            if ($jenis_pelayanan[0] == "ranap") {
                $kamar = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->id_kamar;
                $tipe = $kamar;
                $pel = 'RAWAT INAP';
            } else if ($jenis_pelayanan[0] == "his") {
                $tipe = "NON";
                $pel = 'POLI';
            } else {
                $tipe = "NON";
                $pel = 'IGD';
            }
        }
        $db_list = $this->db->get_where('list_logistik', ['id_logistik' => $id_logistik])->row();

        $page_data = array(
            'id_tindakan_farmasi' =>  $id_tindakan,
            'harga' => $this->input->post('harga'),
            'harga_persediaan' => $db_list->harga_persediaan,
            'frek' => $this->input->post('jumlahKurang'),
            'id_pelayanan' => $this->input->post('id_pelayanan'),
            'poli' => $this->input->post('id_history'),
            'jenis_pelayanan' => $pel,
            'id_resep' => $this->input->post('id_resep'),
            'id_list_tindakan' => $this->input->post('id_list_tindakan'),
            'total' => $this->input->post('total'),
            'tipe' => $tipe,
            'jumlah_racikan' => 0,
            'kadaluarsa' => $this->input->post('expire'),
            'tanggal' => $tgl,
            'id_staff' => $data->id_staff,
            'id_signa' => '-',
            'id_cara_pakai' => 0,
            'depo' => $depo,
            'hna' => $this->input->post('harga'),
            'margin' => $this->input->post('margin'),
            'disc' => 0,
            'keterangan' => '',
        );

        if ($depo == 'APOTIK') {
            $obat = $this->db->query("SELECT SUM(frek) stok from tindakan_farmasi where depo ='APOTIK' and id_list_tindakan = '$id_logistik'")->row_array();
            if ($obat['stok'] < $this->input->post('frek')) {
                $out['status'] = "error";
            } else {
                $obat1 = $this->M_Apotik->getSumObatApotik($this->input->post('id_list_tindakan'));

                $stok = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $this->input->post('id_list_tindakan'),
                    'tgl' => $tgl,
                    'keterangan' => "MASUK",
                    'frek' => $this->input->post('frek'),
                    'saldo' => $obat1['stok'] + ($this->input->post('frek')),
                    'kadaluarsa' => $this->input->post('expire'),
                    'asal_tujuan' => "RETUR",
                    'id_req' =>  $id_tindakan,
                    'id_staff' => $data->id_staff,
                );
                $this->M_Poli->insert_tindakan($page_data, 'tindakan_farmasi');
                $this->M_Apotik->insert_tindakan($stok, 'stok_apotik');

                $this->M_Apotik->update_perencanaan($id_logistik, 'stok_apotik', 'pr_apotik');
                $out['status'] = "success";
            }
        } else if ($depo == 'IGD') {
            $obat = $this->db->query("SELECT SUM(frek) stok from tindakan_farmasi where depo ='IGD' and id_list_tindakan = '$id_logistik'")->row_array();
            if ($obat['stok'] < $this->input->post('frek')) {
                $out['status'] = "error";
            } else {
                $stok = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $this->input->post('id_list_tindakan'),
                    'tgl' => $tgl,
                    'keterangan' => "MASUK",
                    'frek' => $this->input->post('frek'),
                    'kadaluarsa' => $this->input->post('expire'),
                    'asal_tujuan' => "RETUR",
                    'id_req' =>  $id_tindakan,
                    'id_staff' => $data->id_staff,
                );
                $this->M_Poli->insert_tindakan($page_data, 'tindakan_farmasi');
                $this->M_Apotik->insert_tindakan($stok, 'stok_igd');

                $this->M_Apotik->update_perencanaan($id_logistik, 'stok_igd', 'pr_igd');
                $out['status'] = "success";
            }
        } else {
            $obat = $this->db->query("SELECT SUM(frek) stok from tindakan_farmasi where depo ='RANAP' and id_list_tindakan = '$id_logistik'")->row_array();
            if ($obat['stok'] < $this->input->post('frek')) {
                $out['status'] = "error";
            } else {
                $obat1 = $this->M_Apotik->getSumObatRanap($this->input->post('id_list_tindakan'));

                $stok = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $this->input->post('id_list_tindakan'),
                    'tgl' => $tgl,
                    'keterangan' => "MASUK",
                    'frek' => $this->input->post('frek'),
                    'saldo' => $obat1['stok'] + ($this->input->post('frek')),
                    'kadaluarsa' => $this->input->post('expire'),
                    'asal_tujuan' => "RETUR",
                    'id_req' =>  $id_tindakan,
                    'id_staff' => $data->id_staff,
                );
                $this->M_Poli->insert_tindakan($page_data, 'tindakan_farmasi');
                $this->M_Apotik->insert_tindakan($stok, 'stok_depo');

                $this->M_Apotik->update_perencanaan($id_logistik, 'stok_depo', 'pr_depo');
                $out['status'] = "success";
            }
        }

        echo json_encode($out);
    }
    function hapus_resep()
    {
        $id_resep = $this->input->post('id_resep');

        $this->M_Poli->delete_resep($id_resep);
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_racikan()
    {
        $id_racikan = $this->input->post('id_racikan');

        $this->M_Poli->delete_racikan($id_racikan);
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_obat()
    {
        $id_tindakan = $this->input->post('id');
        $depo = $this->input->post('depo');

        $this->M_Poli->delete_obat($id_tindakan, $depo);
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_total_obat()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Poli->Total_Obat_Byid($id_pelayanan);
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

    public function tampil_resep()
    {
        $staff = $this->session->userdata('data_auth');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $page_data = $this->M_Poli->selectResepById($id_pelayanan, $id_history);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 


            if ($page_data[$i]->status == 0) {
                $request =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='request(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_resep . "\",\"" . $page_data[$i]->id_pelayanan . "\",\"" . $staff->tipe . "\")' '><i class='fa fa-thumbs-up '></i></button>";
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_resep . "\",\"" . $page_data[$i]->cara_bayar .  "\",\"" . $page_data[$i]->depo .  "\",\"" . $id_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
                $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_resep(\"" . $page_data[$i]->id_resep .  "\")' '><i class='fa fa-trash '></i></button>";
                $next = "";
            } elseif ($page_data[$i]->status == 1) {
                $request = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat1(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_resep . "\",\"" . $page_data[$i]->cara_bayar  .  "\",\"" . $page_data[$i]->depo .  "\",\"" . $id_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
                if ($staff->username == "20181004") {
                    $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_resep(\"" . $page_data[$i]->id_resep .  "\")' '><i class='fa fa-trash '></i></button>";
                } else {
                    $hapus = "";
                }
                $next =   "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='next_resep(\"" . $page_data[$i]->id_resep . "\",\"" . $id_history .  "\",\"" . $id_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
            } elseif ($page_data[$i]->status == 2) {
                $request = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat1(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_resep . "\",\"" . $page_data[$i]->cara_bayar  .  "\",\"" . $page_data[$i]->depo .  "\",\"" . $id_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
                if ($staff->username == "20181004") {
                    $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_resep(\"" . $page_data[$i]->id_resep .  "\")' '><i class='fa fa-trash '></i></button>";
                } else {
                    $hapus = "";
                }
                $next =   "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='next_resep(\"" . $page_data[$i]->id_resep . "\",\"" . $id_history .  "\",\"" . $id_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
            } else {
                $request = "<span class='label label-danger capitalize-font inline-block'>BATAL</span>";
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat1(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_resep . "\",\"" . $page_data[$i]->cara_bayar  .  "\",\"" . $page_data[$i]->depo .  "\",\"" . $id_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
                if ($staff->username == "20181004") {
                    $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_resep(\"" . $page_data[$i]->id_resep .  "\")' '><i class='fa fa-trash '></i></button>";
                } else {
                    $hapus = "";
                }
                $next = "";
            }


            $no = $i + 1;
            $nama_resep = $page_data[$i]->nama_resep;
            $jenis_resep = $page_data[$i]->jenis_resep;
            $iterasi = $page_data[$i]->iterasi;

            $depo = $page_data[$i]->depo;
            if ($depo == "APOTIK") {
                $depo = "RAJAL";
            }
            $tgl = $page_data[$i]->tanggal;
            if ($jenis_resep == 1) {
                $jenis_resep = 'Non Racikan';
            } else if ($jenis_resep == 2) {
                $jenis_resep = 'Racikan';
            } else if ($jenis_resep == 3) {
                $jenis_resep = 'OTT';
            } else if ($jenis_resep == 5) {
                $jenis_resep = 'OBAT KRONIS';
            } else if ($jenis_resep == 4) {
                $jenis_resep = 'RETURN';
                $request = "";
            }

            if ($this->input->post('akun') == 'ranap') {
                $out[$i] = array($no, $request, $tombol, $hapus, $next, $nama_resep, $jenis_resep, $depo,$iterasi, $tgl);
            } else {
                $out[$i] = array($no, $request, $tombol, $hapus, $nama_resep, $jenis_resep, $depo, $iterasi, $tgl);
            }
            // }else{
            //     $out[$i] = array($no, $request, $tombol, $nama_resep, $jenis_resep,$tgl);
            // }


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

    public function request_resep()
    {
        $staff = $this->session->userdata('data_auth');
        $id_resep = $this->input->post('id_resep');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $tipe = $staff->tipe;
        $tgl =  date("Y-m-d H:i:s");
        $jenis_resep = $this->input->post('jenis_resep');
        if ($jenis_resep == 2) {
            $query = $this->db->query("SELECT * from resep_racikan where id_resep='$id_resep'")->result();
            if (count($query) > 0) {
                $data = array(
                    'status' => 1,
                    'tgl_req' => $tgl,
                );
                $resep_obat = $this->db->get_where('resep_obat', ['id_resep' => $id_resep])->row();
                $depo = $resep_obat->depo;
                $this->M_Poli->request_resep($id_resep, $data);
                if ($tipe != 'igd' && $tipe != 'igdponek' && $depo == 'APOTIK') {
                    $antrian_poli = $this->db->get_where('antrian_poli', ['id_pelayanan' => $id_pelayanan])->row();
                    $id_pelayananx = $antrian_poli->id_pelayanan;
                    $inisial = $antrian_poli->inisial;
                    $no_antri = $antrian_poli->no_antri;
                    if ($inisial != '-') {
                        $this->M_Poli->request_antrian_farmasi($id_pelayananx, $inisial, $no_antri, $tipe, $id_resep);
                    }
                }
                $out['status'] = "success";
            } else {
                $out['status'] = "error";
            }
        } else {
            $query = $this->db->query("SELECT * from tindakan_farmasi where id_resep='$id_resep'")->result();
            if (count($query) > 0) {
                $data = array(
                    'status' => 1,
                    'tgl_req' => $tgl,
                );
                $resep_obat = $this->db->get_where('resep_obat', ['id_resep' => $id_resep])->row();
                $depo = $resep_obat->depo;
                $this->M_Poli->request_resep($id_resep, $data);

                if ($tipe != 'igd' && $tipe != 'igdponek' && $depo == 'APOTIK') {
                    $antrian_poli = $this->db->get_where('antrian_poli', ['id_pelayanan' => $id_pelayanan])->row();
                    $id_pelayananx = $antrian_poli->id_pelayanan;
                    $inisial = $antrian_poli->inisial;
                    $no_antri = $antrian_poli->no_antri;
                    if ($inisial != '-') {
                        $this->M_Poli->request_antrian_farmasi($id_pelayananx, $inisial, $no_antri, $tipe, $id_resep);
                    }
                }

                $out['status'] = "success";
            } else {
                $out['status'] = "error";
            }
        }
        //////////////  antrol ///////////////////////
        $id_pelayanan = $this->db->get_where('resep_obat', ['id_resep' => $id_resep])->row()->id_pelayanan;
        $antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $id_pelayanan]);
        if (count($antrian->result()) > 0) {
            $data_antrol = [
                'kodebooking' => $antrian->row()->id_antrian,
                'taskid' => 6,
                'waktu' => strtotime('now') * 1000
            ];
            update_antrian($data_antrol);
        }

        ///////////end

        echo json_encode($out);
    }
    public function tampil_racikan()
    {
        $id_resep = $this->input->post('id_resep');
        $page_data = $this->M_Poli->selectRacikanByResep($id_resep);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 
            if ($page_data[$i]->status == 0) {
                $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_racikan(\"" . $page_data[$i]->id_racikan .  "\")' '><i class='fa fa-trash '></i></button>";
            } else {
                $hapus = "";
            }
            $no = $i + 1;
            $resep = $page_data[$i]->resep;

            $signa_obat = $page_data[$i]->tindakan;
            $id_cara_pemakaian = $page_data[$i]->cara_pemakaian;

            if ($this->input->post('tipe') == 'next') {
                $out[$i] = array($no, $resep, $signa_obat, $id_cara_pemakaian);
            } else {
                $out[$i] = array($no, $resep, $signa_obat, $id_cara_pemakaian, $hapus);
            }
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
    public function tampil_obat()
    {
        $data_staff = $this->session->userdata('data_auth');
        $id_resep = $this->input->post('id_resep');
        $tipe = $this->db->get_where('resep_obat', ['id_resep' => $id_resep])->row_array();
        // if ($tipe['jenis_resep'] == 5) {
        $page_data = $this->M_Poli->selectObatByResep_kronis($id_resep);
        // } else {
        //     $page_data = $this->M_Poli->selectObatByResep($id_resep);
        // }

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 
            if ($page_data[$i]->jenis_resep == 4) {
                if ($page_data[$i]->status == 0) {
                    $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat1(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->depo . "\")' '><i class='fa fa-trash '></i></button>";
                } else {
                    $hapus = "";
                }
            } else {
                if ($page_data[$i]->status == 0) {
                    $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->depo . "\")' '><i class='fa fa-trash '></i></button>";
                } else {
                    if ($data_staff->username == "20181004") {
                        $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->depo . "\")' '><i class='fa fa-trash '></i></button>";
                    } else {
                        $hapus = "";
                    }
                }
            }


            // $signa =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetakSigna(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->id_resep . "\")' '><i class='icon-printer'></i></button>";
            $no = $i + 1;

            $time = strtotime($page_data[$i]->kadaluarsa);
            $kadaluarsa = strftime("%A, %d %B %Y ", $time);
            $harga_obat = "Rp " . number_format($page_data[$i]->total / $page_data[$i]->frek_req, 0, ',', '.');
            $jumlah_obat = $page_data[$i]->frek_req;
            $depo = $page_data[$i]->depo;
            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $ket = $page_data[$i]->keterangan;
            $staff = $page_data[$i]->staff;
            $signa_obat = $page_data[$i]->tindakan;
            $cara_pakai = $page_data[$i]->cara_pemakaian;


            if ($this->input->post('tipe') == 'next') {
                $nama_obat = $page_data[$i]->nama;

                $out[$i] = array($no, $nama_obat, $jumlah_obat, $signa_obat, $cara_pakai);
            } else {
                if ($page_data[$i]->tgl_hapus != null) {
                    $nama_obat = '<span class="label label-danger capitalize-font inline-block" style="font-size:13px">' . $page_data[$i]->nama . ' (DIHAPUS)</span>';
                    $staff_hapus = $this->db->get_where('staff', ['id_staff' => $page_data[$i]->staff_hapus])->row()->nama;
                } else {
                    $db_obat = $this->M_Poli->selectObatById_layout($page_data[$i]->id_tindakan_farmasi);
                    if (isset($db_obat->obat_dokter) && ($db_obat->obat_dokter != $db_obat->obat_farmasi)) {
                        $nama_obat = '<span class="label label-primary capitalize-font inline-block" style="font-size:13px">' . $page_data[$i]->nama . ' (DIGANTI)</span><br>'
                            . $db_obat->obat_farmasi;
                    } else {
                        $nama_obat = $page_data[$i]->nama;
                    }
                    $staff_hapus = '';
                }
                $out[$i] = array($no, $hapus, $nama_obat, $harga_obat, $jumlah_obat, $depo, $total, $ket, $signa_obat, $cara_pakai, $staff,  $staff_hapus);
            }
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
    public function getNamaObat()
    {
        $depo = $this->input->post('depo');
        // $data = $this->M_Poli->getNamaObatByDepo($depo);

        $query =  $this->input->post('query');
        $cari = $query['term'];
        $db = $this->M_Poli->getNamaObatByDepo($depo, $cari);
        foreach ($db as $row) {
            $stok = $row['stok'] == null ? 0 : $row['stok'];
            $data[] = array(
                'id' => "" . $row['nama'] . "",
                'value' => "" . $row['nama'] . " (" . $stok . ")",
                // 'value' => "" . $row['nama'],
                'id_logistik' => $row['id_logistik'],
                'harga_cost' => $row['harga_cost'],
                'margin' => $row['margin'],
                'kadaluarsa' => "",
                'ppn' => $row['ppn'],
                'stok' => $stok,
                // 'stok' => 0,
            );
        }
        echo json_encode($data);
    }
    public function getSigna()
    {

        $query =  $this->input->post('query');
        $cari = $query['term'];
        $db =  $this->M_Poli->getSignaObat($cari);
        foreach ($db as $row) {
            $data[] = array(
                'value' => "" . $row['tindakan'] . "",
                'id_signa' => $row['id_signa'],
            );
        }
        echo json_encode($data);
    }

    public function getCaraPakai()
    {

        $query =  $this->input->post('query');
        $cari = $query['term'];
        $db =  $this->M_Poli->getCaraPemakaianObat($cari);
        foreach ($db as $row) {
            $data[] = array(
                'value' => "" . $row['cara_pemakaian'] . "",
                'id_cara_pemakaian' => $row['id_cara_pemakaian'],
            );
        }
        echo json_encode($data);
    }
    public function getNamaObatByGol()
    {
        $depo = $this->input->post('depo');
        $gol = $this->input->post('gol');
        $data = $this->M_Poli->getNamaObatByGol($gol, $depo);

        echo json_encode($data);
    }
    public function getNamaObatReturn()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Poli->getNamaObatReturn($id_pelayanan);

        echo json_encode($data);
    }

    public function getExp()
    {
        $obat = $this->input->post('obat');
        $depo = $this->input->post('depo');
        if ($depo == 'APOTIK') {
            $data = $this->M_Poli->getExpByObatApotik($obat);
        } else {
            $data = $this->M_Poli->getExpByObatIGD($obat);
        }

        echo json_encode($data);
    }
    public function insertAntrian()
    {
        $tgl =  date("Y-m-d H:i:s");
        $data = $this->session->userdata('data_auth');
        $jenis = $data->tipe;
        $id_pelayanan = $this->input->post('id_pelayanan');
        $out = null;
        $id_antrian = uniqid();
        $i = 0;
        $no_antri = $this->M_Poli->getAntrian();
        if (count($no_antri) > 0) {
            $page_data = array(
                'inisial' => 't',
                'no_antri' =>    $no_antri[$i]->no_antri + 1,
                'jenis' => $jenis,
                'id_pelayanan' => $id_pelayanan,
                'tanggal' => $tgl,
                'status' => 0,
            );
            $this->M_Poli->insert_tindakan($page_data, 'antrian_farmasi');
        } else {
            $page_data = array(
                'inisial' => 't',
                'no_antri' => 1,
                'jenis' => $jenis,
                'id_pelayanan' => $id_pelayanan,
                'tanggal' => $tgl,
                'status' => 0,
            );
            $this->M_Poli->insert_tindakan($page_data, 'antrian_farmasi');
        }
    }
    public function print_antrian_apotik()
    {
        $datatipe = $this->session->userdata('data_auth');
        $tipe = $datatipe->tipe;
        if ($tipe == 'poliinternis') {
            $data['nama'] = "POLI INTERNIS";
        } elseif ($tipe == 'poliobgyne') {
            $data['nama'] = "POLI OBGYN";
        } elseif ($tipe == 'politht') {
            $data['nama'] = "POLI THT";
        } elseif ($tipe == 'polimata') {
            $data['nama'] = "POLI MATA";
        } elseif ($tipe == 'polikulit') {
            $data['nama'] = "POLI KULIT";
        } elseif ($tipe == 'poliumum') {
            $data['nama'] = "POLI UMUM";
        } elseif ($tipe == 'polianak') {
            $data['nama'] = "POLI ANAK";
        } elseif ($tipe == 'poligigi') {
            $data['nama'] = "POLI GIGI";
        } elseif ($tipe == 'polijantung') {
            $data['nama'] = "POLI JANTUNG";
        } elseif ($tipe == 'polibedah') {
            $data['nama'] = "POLI BEDAH";
        } elseif ($tipe == 'polifisio') {
            $data['nama'] = "POLI FISIO";
        } elseif ($tipe == 'poliakupuntur') {
            $data['nama'] = "POLI AKUPUNTUR";
        } elseif ($tipe == 'polibedahmulut') {
            $data['nama'] = "POLI BEDAH MULUT";
        } elseif ($tipe == 'polikesjiwa') {
            $data['nama'] = "POLI KESEHATAN JIWA";
        } elseif ($tipe == 'poliorthopedi') {
            $data['nama'] = "POLI ORTHOPEDI";
        } elseif ($tipe == 'poliparu') {
            $data['nama'] = "POLI PARU";
        } elseif ($tipe == 'polisaraf') {
            $data['nama'] = "POLI SARAF";
        } elseif ($tipe == 'poliurologi') {
            $data['nama'] = "POLI UROLOGI";
        } elseif ($tipe == 'polipenyakitmulut') {
            $data['nama'] = "POLI PENYAKIT MULUT";
        } elseif ($tipe == 'poliginjal') {
            $data['nama'] = "POLI GINJAL";
        } elseif ($tipe == 'polipsikolog') {
            $data['nama'] = "POLI PSIKOLOG";
        } elseif ($tipe == 'poligizi') {
            $data['nama'] = "POLI GIZI";
        } elseif ($tipe == 'terapiwicara') {
            $data['nama'] = "TERAPI WICARA";
        } elseif ($tipe == 'kemoterapi') {
            $data['nama'] = "POLI KEMOTERAPI";
        } elseif ($tipe == 'polistifin') {
            $data['nama'] = "POLI STIFIN";
        } elseif ($tipe == 'poliorthodonti') {
            $data['nama'] = "POLI ORTHODENTI";
        } elseif ($tipe == 'konservasigigi') {
            $data['nama'] = "POLI KONSERVASI GIGI";
        } elseif ($tipe == 'okupasi') {
            $data['nama'] = "POLI OKUPASI";
        }
        $i = 0;
        $antrian = $this->M_Poli->getAntrian();
        $data['inisial'] = 't';
        $data['no_antri'] = $antrian[$i]->no_antri;

        $this->load->view('print/cetak_antrian_apotik', $data);
    }

    public function cekTindakanObat()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        $id_pelayanan = $this->input->post('id_pelayanan');
        $db1 = $this->M_Poli->cekJumTindakanObat($id_pelayanan, $tipe);
        $count = count($db1);

        // print_arr($db1) ;
        echo json_encode($count);
        exit;
    }
    function insert_na_tindakan()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $count = array(
            'tindakan' => 1,
        );
        $this->M_Poli->insert_req_kasir($id_pelayanan, $id_history, $count);
        $out['status'] = "success";
        echo json_encode($out);
    }
    function insert_na_obat()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $count = array(
            'tindakan_farmasi' => 1,
        );
        $this->M_Poli->insert_req_kasir($id_pelayanan, $id_history, $count);
        $out['status'] = "success";
        echo json_encode($out);
    }
    function insert_na_lab()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $count = array(
            'tindakan_labor' => 1,
        );
        $this->M_Poli->insert_req_kasir($id_pelayanan, $id_history, $count);
        $out['status'] = "success";
        echo json_encode($out);
    }
    function insert_na_radio()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $count = array(
            'tindakan_radiologi' => 1,
        );
        $this->M_Poli->insert_req_kasir($id_pelayanan, $id_history, $count);
        $out['status'] = "success";
        echo json_encode($out);
    }
    function insert_req_kasir()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $count = array(
            'status' => 1,
        );
        $this->M_Poli->insert_req_kasir($id_pelayanan, $id_history, $count);
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function erm_igd()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_erm';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_igd()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        // $dbpoli = $this->db->get_where('list_poli', ['tipe_staff' => $tipe])->row();
        // $poli = $dbpoli->id_list_poli;

        if ($this->input->post('tipe') == 'range') {
            if ($tipe == 'rekam medis' || $tipe == 'laporan') {
                $page_data = $this->M_Poli->selectErmPoliRange($this->input->post('mulai'), $this->input->post('akhir'));
            } else {
                // $page_data = $this->M_Poli->selectErmPoliRange($this->input->post('mulai'), $this->input->post('akhir'));
                $page_data = $this->M_Poli->selectDataPasienIGDRange($this->input->post('mulai'), $this->input->post('akhir'), $tipe);
            }
        } else {
            if ($tipe == 'rekam medis' || $tipe == 'laporan') {
                $page_data = $this->M_Poli->selectErmPoli();
            } else {
                // $page_data = $this->M_Poli->selectErmPoli();
                $page_data = $this->M_Poli->selectDataPasienIGD($tipe);
            }
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('erm_poli/form_riwayat/' . $page_data[$i]->id_pelayanan . '/' . $page_data[$i]->id_history . '/' . $page_data[$i]->jenis_pelayanan) . "><i class='icon-note'></i></a>";
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
            $kode = $page_data[$i]->kode;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->nama_diagnosa;
            $poli = $page_data[$i]->poli;

            $out[$i] = array($no, $erm, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $kode, $diagnosa, $cara_masuk, $poli, $cara_bayar,  $dokter);
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

    public function tampil_erm_igd()
    {
        $data = $this->session->userdata('data_auth');

        if ($this->input->post('tipe') == 'range') {
            $page_data = $this->M_IGD->selectERMRange($this->input->post('mulai'), $this->input->post('akhir'));
        } else {
            $page_data = $this->M_IGD->selectERM();
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('Erm_poli/form_riwayat/' . $page_data[$i]->id_pelayanan . '/' . $page_data[$i]->id_history) . "><i class='icon-note'></i></a>";
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
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $erm, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $cara_bayar, $diagnosa, $dokter);
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
    public function getdata()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;

        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->result();
        // $db1 = $this->M_Poli->cekJumTindakan($id_pelayanan, $tbTindakan);
        // $count = count($db1);
        if (count($db) > 0) {
            $data = $db[0];
            $db = array(
                'status_dt' => 'found',
                'data' => $data,
            );
            // $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        // print_arr($db) ;
        echo json_encode($db);
        exit;
    }
    public function next_resep()
    {
        $staff = $this->session->userdata('data_auth');
        $id_resep = $this->input->post('id_resep');
        $id_history = $this->input->post('id_history');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
        if ($pelayanan->status_rawat == 'selesai') {
            $out['status'] = "Pasien sudah dicheckout";
        } else {
            $resep = $this->db->get_where('resep_obat', ['id_resep' => $id_resep])->row();
            if ($resep->jenis_resep != 2) {
                // $page_data = $this->M_Poli->selectObatByResep($id_resep);
                $page_data = $this->M_Poli->selectObatByResep_kronis($id_resep);
                $data_resep = array(
                    'id_pelayanan' => $id_pelayanan,
                    'id_history' => $id_history,
                    'jenis_resep' => $resep->jenis_resep,
                    'nama_resep' => $resep->nama_resep,
                    'depo' => $resep->depo,
                    'tanggal' => date("Y-m-d H:i:s"),
                    'status' => 0,
                    'id_staff' => $staff->id_staff,
                    'id_paket' => $id_resep,
                );
                $id = $this->M_Poli->insert_tindakan($data_resep, 'resep_obat');
                foreach ($page_data as $row) {
                    $jenis_pelayanan = explode('_', $id_history);
                    // $ppn = $row->harga_cost * ($row->ppn / 100);
                    $harga = $row->harga_cost * 1.11;
                    $hargaMargin = $harga * $row->margin;
                    if ($jenis_pelayanan[0] == "ranap") {
                        $kamar = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->id_kamar;
                        $tipe = $kamar;
                        $pel = 'RANAP';
                        // $depo=''
                    } else if ($jenis_pelayanan[0] == "his") {
                        $tipe = "NON";
                        $pel = 'POLI';
                    } else {
                        $tipe = "NON";
                        $pel = 'IGD';
                    }
                    $id_tindakan = uniqid();
                    $tgl =  date("Y-m-d H:i:s");
                    $db_list = $this->db->get_where('list_logistik', ['id_logistik' => $row->id_list_tindakan])->row();

                    $data_obat = array(
                        'id_tindakan_farmasi' => $id_tindakan,
                        'harga' => $harga,
                        'harga_persediaan' => $db_list->harga_persediaan,
                        'frek' => 0,
                        'frek_req' => $row->frek_req,
                        'id_pelayanan' => $id_pelayanan,
                        'jenis_pelayanan' => $pel,
                        'poli' => $id_history,
                        'id_resep' => $id,
                        'id_list_tindakan' => $row->id_list_tindakan,
                        'total' => $hargaMargin * $row->frek_req,
                        'tipe' => $tipe,
                        'jumlah_racikan' => 0,
                        'kadaluarsa' => '0000-00-00',
                        'tanggal' => $tgl,
                        'id_staff' => $staff->id_staff,
                        'id_signa' => $row->id_signa,
                        'id_cara_pakai' => $row->id_cara_pakai,
                        'depo' => $resep->depo,
                        'hna' => $harga,
                        'margin' => $row->margin,
                        'disc' => $row->disc,
                        'keterangan' => $row->keterangan,
                    );

                    $data_obat1 = array(
                        'id_tindakan_farmasi' =>  $id_tindakan,
                        'harga' => $harga,
                        'frek' => $row->frek_req,
                        'frek_req' => $row->frek_req,
                        'id_pelayanan' => $id_pelayanan,
                        'jenis_pelayanan' => $pel,
                        'id_resep' => $id,
                        'id_list_tindakan' => $row->id_list_tindakan,
                        'total' => $hargaMargin * $row->frek_req,
                        'tipe' => $tipe,
                        'jumlah_racikan' => 0,
                        'kadaluarsa' => '0000-00-00',
                        'tanggal' => $tgl,
                        'id_staff' => $staff->id_staff,
                        'id_signa' => $row->id_signa,
                        'id_cara_pakai' => $row->id_cara_pakai,
                        'depo' => $resep->depo,
                        'hna' => $harga,
                        'margin' => $row->margin,
                        'disc' => $row->disc,
                        'keterangan' => $row->keterangan,
                    );


                    $this->M_Poli->insert_tindakan($data_obat1, 'tindakan_farmasi_kronis');
                    $this->M_Poli->insert_tindakan($data_obat, 'tindakan_farmasi');
                }
            } else if ($resep->jenis_resep == 2) {
                $page_data = $this->M_Poli->selectRacikanByResep($id_resep);
                $data_resep = array(
                    'id_pelayanan' => $id_pelayanan,
                    'id_history' => $id_history,
                    'jenis_resep' => $resep->jenis_resep,
                    'nama_resep' => $resep->nama_resep,
                    'depo' => $resep->depo,
                    'tanggal' => date("Y-m-d H:i:s"),
                    'status' => 0,
                    'id_staff' => $staff->id_staff,
                    'id_paket' => $id_resep,
                );
                $id = $this->M_Poli->insert_tindakan($data_resep, 'resep_obat');
                foreach ($page_data as $row) {
                    $data_racikan = array(
                        'id_racikan' => uniqid(),
                        'id_resep' => $id,
                        'id_signa' => $row->id_signa,
                        'id_cara_pakai' => $row->id_cara_pakai,
                        'resep' => $row->resep,
                        'tanggal' => date("Y-m-d H:i:s"),
                        'id_staff' => $staff->id_staff,
                    );
                    $this->M_Poli->insert_tindakan($data_racikan, 'resep_racikan');
                }
            }


            $out['status'] = "success";
        }
        echo json_encode($out);
    }
    public function getResepBefore()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        // $id_pel = 
        $no_rm = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row()->id_pasien;
        // echo $no_rm .'</br>';
        // $max_pel = $this->db->query("SELECT r.id_pelayanan id_pelayanan
        // from resep_obat r, pelayanan p 
        // where r.id_pelayanan = p.id_pelayanan and p.id_pasien = '$no_rm' and r.id_pelayanan != '$id_pelayanan'

        // ORDER BY SUBSTRING_INDEX(r.id_pelayanan, '_', -1) desc limit 1")->row();
        // echo $max_pel;
        // if (!empty($max_pel->id_pelayanan)) {
        $resep = $this->db->query("SELECT r.*,s.nama staff from resep_obat r, staff s ,pelayanan b
            where r.id_staff = s.id_staff and r.id_pelayanan = b.id_pelayanan and b.id_pasien = '$no_rm' 
            order by r.tanggal desc
            limit 50")->result();
        // $out['data'] = $resep;
        echo json_encode($resep);

        // } else {
        //     echo '[]';

        // }
    }
    public function get_resep()
    {
        $id_resep = $this->input->post('id_resep');
        $resep = $this->db->get_where('resep_obat', ['id_resep' => $id_resep])->row();
        echo json_encode($resep);
    }
    public function update_data()
    {

        $page_data = $this->db->query("SELECT t.*
        from tindakan_farmasi t, pelayanan p 
        where t.id_pelayanan = p.id_pelayanan and p.cara_bayar ='31'
        and t.tanggal >= '2022-11-01' and t.id_resep like '%ruang%'
        ")->result();
        // $page_data = $this->db->get('v_pasien_pulang_ugd')->result();
        // $page_data = $this->db->get('v_pasien_pulang_rawat_inap')->result();

        for ($i = 0; $i < count($page_data); $i++) {
            $data = array(
                'total' =>  $page_data[$i]->frek * $page_data[$i]->harga * 1.3,
                'margin' => 1.3,
            );

            $this->M_Poli->update_tindakan($data, ['id_tindakan_farmasi' => $page_data[$i]->id_tindakan_farmasi], 'tindakan_farmasi');
        }
        echo "selesai";
    }
}
