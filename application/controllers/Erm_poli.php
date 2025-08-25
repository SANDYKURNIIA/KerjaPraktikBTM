<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_poli extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Poli');
        $this->load->model('M_Apotik');
        $this->load->model('M_Erm');
        $this->load->model('M_Erm_poli');
        $this->load->model('M_Rawatinap');
        $this->load->helper('satusehat');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Erm';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function form($id_pel, $id_his, $jenis_pelayanan)
    {
        $id_pelayanan = base64_decode(urldecode($id_pel));
        $id_histori = base64_decode(urldecode($id_his));



        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        $selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_histori);

        $page_data['nama_poli'] = 'GIZI';
        // $db = $this->db->get_where('list_poli', ['id_list_poli' => $selectPasien->nama_poli])->row();

        // $spes = $db->kdpoli_bpjs;


        // $page_data['dokter'] = $this->M_Poli->selectDokter($spes);
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_histori'] = $id_histori;
        $page_data['jenis_pelayanan'] = $jenis_pelayanan;
        $page_data['nama'] = $selectPasien->nama;
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['tipe'] = $tipe;
        $page_data['cara_bayar'] = $selectPasien->cara_bayar;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['nama_dokter'] = $selectPasien->nama_dokter;
        // $page_data[ 'agama' ] = $selectPasien->agama;
        $page_data['simpan'] = 0;
        // $page_data[ 'pasien' ] = $this->M_Erm->selectDataPasien( $db[ 0 ]->no_rm );

        if ($tipe == "kemoterapi") {
            $stok = "stok_kemo";
            $page_data['obat_ruang'] = $this->M_Rawatinap->getNamaObatRuang($stok);
        }
        // load page view
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Poli/view_erm';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function form_riwayat($id_pelayanan, $id_history, $jenis_pelayanan)
    {
        // $id_pelayanan = base64_decode( urldecode( $id_pel ) );
        // $id_histori = base64_decode( urldecode( $id_his ) );
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        if ($tipe == 'poliinternis') {
            $page_data['nama_poli'] = 'INTERNIS';
            $tbTindakan = 'list_tindakan_poli_internis';
            $spes = 'INT';
        } elseif ($tipe == 'poliobgyne') {
            $page_data['nama_poli'] = 'OBGYN';
            $tbTindakan = 'list_tindakan_poli_obgyne';
            $spes = 'OBG';
        } elseif ($tipe == 'politht') {
            $page_data['nama_poli'] = 'THT';
            $tbTindakan = 'list_tindakan_poli_tht';
            $spes = 'THT';
        } elseif ($tipe == 'polimata') {
            $page_data['nama_poli'] = 'MATA';
            $tbTindakan = 'list_tindakan_poli_mata';
            $spes = 'MAT';
        } elseif ($tipe == 'polikulit') {
            $page_data['nama_poli'] = 'KULIT';
            $tbTindakan = 'list_tindakan_poli_kulit';
            $spes = 'KLT';
        } elseif ($tipe == 'poliumum') {
            $page_data['nama_poli'] = 'UMUM';
            $tbTindakan = 'list_tindakan_poli_umum';
            $spes = 'UMU';
        } elseif ($tipe == 'polianak') {
            $page_data['nama_poli'] = 'ANAK';
            $tbTindakan = 'list_tindakan_poli_anak';
            $spes = 'ANA';
        } elseif ($tipe == 'poligigi') {
            $page_data['nama_poli'] = 'GIGI';
            $tbTindakan = 'list_tindakan_poli_gigi';
            $spes = 'GIG';
        } elseif ($tipe == 'polijantung') {
            $page_data['nama_poli'] = 'JANTUNG';
            $tbTindakan = 'list_tindakan_poli_jantung';
            $spes = 'JAN';
        } elseif ($tipe == 'polibedah') {
            $page_data['nama_poli'] = 'BEDAH';
            $tbTindakan = 'list_tindakan_poli_bedah_umum';
            $spes = 'BED';
        } elseif ($tipe == 'polifisio') {
            $page_data['nama_poli'] = 'FISIO';
            $tbTindakan = 'list_tindakan_poli_fisio';
            $spes = 'IRM';
        } elseif ($tipe == 'rehab') {
            $page_data['nama_poli'] = "CONTROL REHABILITAS MEDIC";
            $tbTindakan = 'list_tindakan_poli_fisio';
            $spes = 'IRM';
        } elseif ($tipe == 'polihemodialisa') {
            $page_data['nama_poli'] = 'hemodialisa';
            $tbTindakan = 'list_tindakan_poli_hemodialisa';
            $spes = 'HDL';
        } elseif ($tipe == 'polipenyakitmulut') {
            $page_data['nama_poli'] = 'PENYAKIT MULUT';
            $tbTindakan = 'list_tindakan_poli_penyakit_mulut';
            $spes = 'PNM';
        } elseif ($tipe == 'poliginjal') {
            $page_data['nama_poli'] = 'GINJAL';
            $tbTindakan = 'list_tindakan_poli_ginjal';
            $spes = '7';
        } elseif ($tipe == 'poliakupuntur') {
            $page_data['nama_poli'] = "AKUPUNTUR";
            $tbTindakan = 'list_tindakan_poli_akupuntur';
            $spes = 'AKP';
        } elseif ($tipe == 'polibedahmulut') {
            $page_data['nama_poli'] = "BEDAH MULUT";
            $tbTindakan = 'list_tindakan_poli_bedah_mulut';
            $spes = 'BDM';
        } elseif ($tipe == 'polikesjiwa') {
            $page_data['nama_poli'] = "KESEHATAN JIWA";
            $tbTindakan = 'list_tindakan_poli_kes_jiwa';
            $spes = 'JIW';
        } elseif ($tipe == 'poliorthopedi') {
            $page_data['nama_poli'] = "ORTHOPEDI";
            $tbTindakan = 'list_tindakan_poli_orthopedi';
            $spes = 'ORT';
        } elseif ($tipe == 'poliparu') {
            $page_data['nama_poli'] = "PARU";
            $tbTindakan = 'list_tindakan_poli_paru';
            $spes = 'PAR';
        } elseif ($tipe == 'polisaraf') {
            $page_data['nama_poli'] = "SARAF";
            $tbTindakan = 'list_tindakan_poli_saraf';
            $spes = 'SAR';
        } elseif ($tipe == 'poliurologi') {
            $page_data['nama_poli'] = "UROLOGI";
            $tbTindakan = 'list_tindakan_poli_urologi';
            $spes = 'URO';
        } elseif ($tipe == 'polipsikolog') {
            $page_data['nama_poli'] = "PSIKOLOG";
            $tbTindakan = 'list_tindakan_poli_psikolog';
            $spes = 'p';
        } elseif ($tipe == 'poligizi') {
            $page_data['nama_poli'] = "GIZI";
            $tbTindakan = 'list_tindakan_poli_gizi';
            $spes = 'giz';
        } elseif ($tipe == 'terapiwicara') {
            $page_data['nama_poli'] = "TERAPI WICARA";
            $tbTindakan = 'list_tindakan_poli_terapi_bicara';
            $spes = 'twc';
        } elseif ($tipe == 'kemo') {
            $page_data['nama_poli'] = "POLI KEMOTERAPI";
            $tbTindakan = 'list_tindakan_poli_kemoterapi';
            $spes = 'KEM';
        } elseif ($tipe == 'polistifin') {
            $page_data['nama_poli'] = "POLI STIFIN";
            $tbTindakan = 'list_tindakan_poli_stifin';
            $spes = 'KEM';
        } elseif ($tipe == 'poliorthodonti') {
            $page_data['nama_poli'] = "POLI ORTHODONTI";
            $tbTindakan = 'list_tindakan_poli_gigi';
            $spes = 'GOR';
        } elseif ($tipe == 'konservasigigi') {
            $page_data['nama_poli'] = "POLI KONSERVASI GIGI";
            $tbTindakan = 'list_tindakan_poli_gigi';
            $spes = 'GND';
        } elseif ($tipe == 'okupasi') {
            $page_data['nama_poli'] = "OKUPASI";
            $tbTindakan = 'list_tindakan_okupasi';
            $spes = 'KDO';
        }

        $selectPasien = $this->M_Erm_poli->selectDataPasienIGDbyid($id_pelayanan, $id_history);

        $dbpel = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
        if ($dbpel->cara_bayar == '333' || $dbpel->cara_bayar == '3331' || $dbpel->cara_bayar == 'b1' || $dbpel->cara_bayar == 'b4') {
            $page_data['tindakan_poli'] = $this->M_Poli->selectNamaTindakan_lama($tbTindakan);
            $page_data['tindakan_radiologi'] = $this->M_Poli->selectNamaRadiologi_lama();
            $page_data['tindakan_radiologi_prio'] = $this->M_Poli->selectNamaRadiologiPrioritas_lama();
            $page_data['tindakan_labor'] = $this->M_Poli->selectNamaLabor_lama();
            $page_data['tindakan_labor_prio'] = $this->M_Poli->selectNamaLaborPrioritas_lama();
        } else {
            $page_data['tindakan_poli'] = $this->M_Poli->selectNamaTindakan($tbTindakan);
            $page_data['tindakan_radiologi'] = $this->M_Poli->selectNamaRadiologi();
            $page_data['tindakan_radiologi_prio'] = $this->M_Poli->selectNamaRadiologiPrioritas();
            $page_data['tindakan_labor'] = $this->M_Poli->selectNamaLabor();
            $page_data['tindakan_labor_prio'] = $this->M_Poli->selectNamaLaborPrioritas();
        }

        $page_data['golongan'] = $this->db->query("SELECT DISTINCT(golongan_farmakologi) golongan_farmakologi from list_logistik")->result_array();


        // $db = $this->db->get_where('list_poli', ['id_list_poli' => $poli])->row();

        // $spes = $db->kdpoli_bpjs;
        $page_data['dokter'] = $this->M_Poli->selectDokter($spes);
        $page_data['obat'] = $this->M_Poli->getNamaObat();
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();

        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_histori'] = $id_history;
        $page_data['jenis_pelayanan'] = $jenis_pelayanan;
        $page_data['nama'] = $selectPasien->nama;
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['cara_bayar'] = $selectPasien->cara_bayar;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['nama_dokter'] = $selectPasien->nama_dokter;
        // $page_data[ 'agama' ] = $selectPasien->agama;
        $page_data['simpan'] = 1;
        // $page_data[ 'pasien' ] = $this->M_Erm->selectDataPasien( $db[ 0 ]->no_rm );


        if ($tipe == "kemoterapi") {
            $stok = "stok_kemo";
            $page_data['obat_ruang'] = $this->M_Rawatinap->getNamaObatRuang($stok);
        }

        // load page view
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Poli/view_erm';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function print_tin_opr($id)
    {
        $data['data'] = $this->M_Erm_poli->cetakTindakanOpr($id);
        $this->load->view('erm_print/tindakan_operasi', $data);
    }


    public function checkData()
    {
        $id_histori = $this->input->post('id');
        // $super_ranap = $this->M_Erm_poli->checkData($id_histori, 'form_perintah_ranap');
        $asses_per_igd = $this->M_Erm_poli->checkData($id_histori, 'form_assesmen_awal_rajal');
        // $observasi = $this->M_Erm_poli->checkData($id_histori, 'form_observasi');
        // $sebab_kematian = $this->M_Erm_poli->checkData($id_histori, 'form_sebab_kematian');
        // $lembar_rujukan = $this->M_Erm_poli->checkData($id_histori, 'form_lembar_rujukan');
        $asses_dokter_igd = $this->M_Erm_poli->checkData($id_histori, 'form_assesmen_dokter');
        // // $peng_khusus = $this->M_Erm->checkData( $id_pelayanan, 'form_peng_khusus' );
        // $penundaan = $this->M_Erm_poli->checkData($id_histori, 'form_penundaan_pelayanan_obat');
        // $intra = $this->M_Erm_poli->checkData($id_histori, 'form_transfer_intra_rs');
        // $antar = $this->M_Erm_poli->checkData($id_histori, 'form_transfer_antar_rs');
        // $laporan_tin_operasi = $this->M_Erm_poli->checkData($id_histori, 'form_tindakan_operasi');
        $skrining_tbc = $this->M_Erm_poli->checkData($id_histori, 'pasien_TBC');
        $eval = $this->M_Erm_poli->checkData($id_histori, 'form_lembar_evaluasi');

        // $db['super_ranap'] = empty($super_ranap) ? 'not-found' : 'found';
        $db['asses_per_igd'] = empty($asses_per_igd) ? 'not-found' : 'found';
        $db['asses_dokter_igd'] = empty($asses_dokter_igd) ? 'not-found' : 'found';
        // $db['observasi'] = empty($observasi) ? 'not-found' : 'found';
        // $db['sebab_kematian'] = empty($sebab_kematian) ? 'not-found' : 'found';
        // $db['lembar_rujukan'] = empty($lembar_rujukan) ? 'not-found' : 'found';
        // $db['penundaan'] = empty($penundaan) ? 'not-found' : 'found';
        // $db['intra'] = empty($intra) ? 'not-found' : 'found';
        // $db['antar'] = empty($antar) ? 'not-found' : 'found';
        // $db['laporan_tin_operasi'] = empty($laporan_tin_operasi) ? 'not-found' : 'found';
        $db['skrining_tbc'] = empty($skrining_tbc) ? 'not-found' : 'found';
        $db['eval'] = empty($eval) ? 'not-found' : 'found';
        echo json_encode($db);
        exit;
    }

    public function getRiwayat()
    {
        $id = $this->input->post('id');
        $db = $this->M_Erm_poli->selectDataPasien($id);
        if ($db == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data = $db;
            echo json_encode($page_data);
            exit;
        }
    }

    public function getErm()
    {
        $id = $this->input->post('id');
        $db = $this->M_Erm_poli->getErm($id);
        if ($db == null) {
            echo '{"data":"",
				"status":"not_found"}';
            exit;
        } else {
            $page_data['erm'] = $db;
            $page_data['status'] = 'found';
            echo json_encode($page_data);
            exit;
        }
    }

    public function checkKasir()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $db = $this->db->get_where('req_kasir', array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history))->result_array();
        if (count($db) > 0) {
            if ($db[0]['status'] == 0) {
                $page_data['status'] = 'found';
                //tampil
            } else {
                $page_data['status'] = 'not_found';
                //tidak tampil
            }
        } else {
            $page_data['status'] = 'found';
            //tampil
        }
        echo json_encode($page_data);
    }

    public function input_resume_medis_raj($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm->selectDataPasienIGDby_id($id_pelayanan, $id_history);
        // $selectPasien2 = $this->M_Erm->selectPasienIGDById( $id_rm );
        $staff = $this->session->userdata('data_auth');

        $page_data['nama'] = $selectPasien->nama;
        $page_data['no_hp'] = $selectPasien->no_hp;
        $page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['cara_bayar'] = $selectPasien->cara_bayar;
        $page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
        $page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
        $page_data['staff'] = $staff->id_staff;
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
        $page_data['id_history'] = $selectPasien->id_history;
        $page_data['pasien'] = $selectPasien;

        $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
        $page_data['per'] = empty($asses_per_igd) ? null : $asses_per_igd;
        $asses_dokter_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_dokter_igd');
        $page_data['dok'] = empty($asses_dokter_igd) ? null : $asses_dokter_igd;

        $diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_pelayanan='$id_pelayanan'")->row_array();

        $page_data['diagnosa_utama'] = empty($asses_dokter_igd) ? null : $diagnosa1;

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/view_resume_medis_raj';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function simpan_erm()
    {
        $db   =   array(
            'status_erm' => 1,
        );
        $where = array(
            'id_history' => $this->input->post('id_history')
        );
        $this->M_Erm->update($db, $where, 'history_pelayanan');
        // create_encounter();

        $out['status'] = 'success';
        echo json_encode($out);
    }
    // // Tampil Data

    function tambah_data_diagnosa()
    {
        $no_diagnosa = uniqid();
        $tgl = date('Y-m-d H:i:s');
        $id_staff = '0';
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_diagnosa = $this->input->post('id_diagnosa');
        $nama_diagnosa = $this->input->post('nama_diagnosa');

        $page_data = array(
            'no_diagnosa' => $no_diagnosa,
            'id_pelayanan' => $id_pelayanan,
            'kode' => $id_diagnosa,
            'nama_diagnosa' => $nama_diagnosa,
            'tanggal' => $tgl,
            'id_staff' => $id_staff,
        );
        $diagnosa = $this->M_Erm->checkData($id_pelayanan, 'diagnosa_utama');
        if (!empty($diagnosa)) {
            $this->M_Erm->insert($page_data, 'erm_diagnosa_dokter');
        } else {
            $this->M_Erm->insert($page_data, 'diagnosa_utama');
        }

        $out['status'] = 'success';
        echo json_encode($out);
    }

    public function tampil_listdata_diagnosa()
    {
        $page_data = $this->db->get('list_diagnosa')->result();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $id_pelayanan = base64_decode(urldecode($this->input->post('id')));
            $id_history = base64_decode(urldecode($this->input->post('his')));
            // $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_data_diagnosa(\"" . $id_pelayanan . "\",\"" . $page_data[$i]->id_diagnosa . "\",\"" . $page_data[$i]->nama_diagnosa . "\",\"" . $id_history  . "\")' '><i class='icon-plus'></i></button>";


            $id_diagnosa = $page_data[$i]->id_diagnosa;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;
            $tombol = $tombol;



            $out[$i] = array($id_diagnosa, $nama_diagnosa, $tombol);
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

    public function tampil_list_diagnosa()
    {
        // $id_akun = 'dgok8itaesm';
        $id_pelayanan = base64_decode(urldecode($this->input->post('id')));
        $page_data = $this->M_Erm->selectDataDiagnosaByIdPel($id_pelayanan);

        // $page_data = null;
        $out = null;
        for (
            $i = 0;
            $i < count($page_data);
            $i++
        ) {

            // $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa1(\"" . $page_data[$i]->no_diagnosa . "\")' '><i class='fa fa-trash '></i></button>";

            $nama_dokter = $page_data[$i]->no_diagnosa;
            $kode = $page_data[$i]->kode;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;
            $tombol = $tombol;

            $out[$i] = array($nama_dokter, $kode, $nama_diagnosa, $tombol);
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

    public function tampil_list_diagnosa1()
    {
        // $id_akun = 'dgok8itaesm';
        $id_pelayanan = base64_decode(urldecode($this->input->post('id')));
        $page_data = $this->db->query("SELECT * from diagnosa_utama where id_history='$id_pelayanan'")->result();

        // $page_data = null;
        $out = null;
        for (
            $i = 0;
            $i < count($page_data);
            $i++
        ) {

            // $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\""  . $page_data[$i]->no_diagnosa . "\")' '><i class='fa fa-trash '></i></button>";

            $nama_dokter = $page_data[$i]->no_diagnosa;
            $kode = $page_data[$i]->kode;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;
            $tombol = $tombol;

            $out[$i] = array($nama_dokter, $kode, $nama_diagnosa, $tombol);
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

    public function tampil_list_terapi()
    {
        // $id_akun = 'dgok8itaesm';
        $id_pelayanan = base64_decode(urldecode($this->input->post('id')));
        $page_data = $this->M_Erm->selectTerapiByIdPel($id_pelayanan);

        // $page_data = null;
        $out = null;
        for (
            $i = 0;
            $i < count($page_data);
            $i++
        ) {

            $nama = $page_data[$i]->nama;
            $frek = $page_data[$i]->frek;
            $signa = $page_data[$i]->tindakan;
            $cara = $page_data[$i]->cara_pemakaian;

            $out[$i] = array($nama, $signa, $frek, $cara);
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

    public function tampil_list_terapi1()
    {
        // $id_akun = 'dgok8itaesm';
        $id_history = $this->input->post('id_history');
        $page_data = $this->M_Erm->selectTerapiByIdPel($id_history);

        // $page_data = null;
        $out = null;
        for (
            $i = 0;
            $i < count($page_data);
            $i++
        ) {

            $nama = $page_data[$i]->nama;
            $frek = $page_data[$i]->frek;
            $signa = $page_data[$i]->tindakan;
            $cara = $page_data[$i]->cara_pemakaian;

            $out[$i] = array($nama, $signa, $cara);
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
    public function getdata_tindakan()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;

        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db_pasien = $this->M_Poli->selectDataPasienby_id($id_pelayanan, $id_history);
        $datapoli = $this->db->get_where('list_poli', ['id_list_poli' => $db_pasien[0]->nama_poli])->row();
        $tbTindakan = $datapoli->list_tindakan;

        if ($db_pasien[0]->id_cara_bayar  == '333' || $db_pasien[0]->id_cara_bayar  == '3331' || $db_pasien[0]->id_cara_bayar  == 'b1' || $db_pasien[0]->id_cara_bayar  == 'b4') {
            $tindakan_poli = $this->M_Poli->selectNamaTindakan_lama($tbTindakan);
        } else {
            $tindakan_poli = $this->M_Poli->selectNamaTindakan($tbTindakan);
        }

        $spes = $datapoli->kdpoli_bpjs;
        $dokter = $this->M_Poli->selectDokter($spes);
        if (count($db_pasien) > 0) {
            $data = $db_pasien[0];
            $db = array(
                'status_dt' => 'found',
                'data' => $data,
                'tindakan_poli' => $tindakan_poli,
                'dokter' => $dokter,
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
    public function getdata_radio()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;

        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db_pasien = $this->M_Poli->selectDataPasienby_id($id_pelayanan, $id_history);
        $datapoli = $this->db->get_where('list_poli', ['id_list_poli' => $db_pasien[0]->nama_poli])->row();
        $tbTindakan = $datapoli->list_tindakan;

        if ($db_pasien[0]->id_cara_bayar  == '333' || $db_pasien[0]->id_cara_bayar  == '3331' || $db_pasien[0]->id_cara_bayar  == 'b1' || $db_pasien[0]->id_cara_bayar  == 'b4') {
            if ($db_pasien[0]->jenis_pelayanan == 'POLI') {
                $tindakan_radiologi = $this->M_Poli->selectNamaRadiologi_lama();
            } else {
                $tindakan_radiologi = $this->M_Poli->selectNamaRadiologiPrioritas_lama();
            }
            // $tindakan_labor = $this->M_Poli->selectNamaLabor_lama();
            // $tindakan_labor_prio = $this->M_Poli->selectNamaLaborPrioritas_lama();
        } else {
            if ($db_pasien[0]->jenis_pelayanan == 'POLI') {
                $tindakan_radiologi = $this->M_Poli->selectNamaRadiologi();
            } else {
                $tindakan_radiologi = $this->M_Poli->selectNamaRadiologiPrioritas_lama();
            }
            // $tindakan_radiologi_prio = $this->M_Poli->selectNamaRadiologiPrioritas();
            // $tindakan_labor = $this->M_Poli->selectNamaLabor();
            // $tindakan_labor_prio = $this->M_Poli->selectNamaLaborPrioritas();
        }
        // $db1 = $this->M_Poli->cekJumTindakan($id_pelayanan, $tbTindakan);
        // $count = count($db1);
        if (count($db_pasien) > 0) {
            $data = $db_pasien[0];
            $db = array(
                'status_dt' => 'found',
                'data' => $data,
                'tindakan_radiologi' => $tindakan_radiologi,
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
    public function getdata_labor()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;

        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db_pasien = $this->M_Poli->selectDataPasienby_id($id_pelayanan, $id_history);
        $datapoli = $this->db->get_where('list_poli', ['id_list_poli' => $db_pasien[0]->nama_poli])->row();
        $tbTindakan = $datapoli->list_tindakan;

        if ($db_pasien[0]->id_cara_bayar  == '333' || $db_pasien[0]->id_cara_bayar  == '3331' || $db_pasien[0]->id_cara_bayar  == 'b1' || $db_pasien[0]->id_cara_bayar  == 'b4') {
            if ($db_pasien[0]->jenis_pelayanan == 'POLI') {
                $tindakan_labor = $this->M_Poli->selectNamaLabor_lama();
            } else {
                $tindakan_labor = $this->M_Poli->selectNamaLaborPrioritas_lama();
            }
        } else {
            if ($db_pasien[0]->jenis_pelayanan == 'POLI') {
                $tindakan_labor = $this->M_Poli->selectNamaLabor();
            } else {
                $tindakan_labor = $this->M_Poli->selectNamaLaborPrioritas();
            }
        }
        // $db1 = $this->M_Poli->cekJumTindakan($id_pelayanan, $tbTindakan);
        // $count = count($db1);
        if (count($db_pasien) > 0) {
            $data = $db_pasien[0];
            $db = array(
                'status_dt' => 'found',
                'data' => $data,
                'tindakan_labor' => $tindakan_labor,
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
    public function getSigna()
    {
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();

        echo json_encode($page_data);
        exit;
    }
}
