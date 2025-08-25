<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Pasien');
        $this->load->model('M_Rawatinap');
        $this->load->model('M_Poli');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Riwayat_Pasienfisio');
        $this->load->library('zend');
    }

    //Function view

    public function Pasien_rajal()
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Pasien_rajal';
        $page_data['tipe_masuk'] = $this->M_Pencarian_Pasien->getTipeMasuk();
        $page_data['data_pasien_rawat_jalan'] = $this->M_Pasien->selectDataPasienRawatJalan();
        $page_data['data_dokter'] = $this->M_Pasien->selectNamaDPJP();
        $page_data['data_asal_pasien'] = $this->M_Pasien->selectAsalPasien();
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_nama_poli'] = $this->M_Pasien->selectNamaPoli();
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['action'] = site_url('Pasien/edit_rawat_jalan');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Pasien_rajal1()
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Pasien_rajal1';
        $page_data['tipe_masuk'] = $this->M_Pencarian_Pasien->getTipeMasuk();
        $page_data['data_pasien_rawat_jalan'] = $this->M_Pasien->selectDataPasienRawatJalan();
        $page_data['data_dokter'] = $this->M_Pasien->selectNamaDPJP();
        $page_data['data_asal_pasien'] = $this->M_Pasien->selectAsalPasien();
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_nama_poli'] = $this->M_Pasien->selectNamaPoli();
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['action'] = site_url('Pasien/edit_rawat_jalan');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function polifisio()
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Pasien_Poliifisio';
        $page_data['tipe_masuk'] = $this->M_Pencarian_Pasien->getTipeMasuk();
        $page_data['tindakan_fisio'] = $this->M_Poli->selectNamaTindakan('list_tindakan_poli_fisio');
        $page_data['list_obat'] = $this->M_Poli->getNamaObat();
        $page_data['signa_obat'] = $this->M_Poli->getSignaObat('signa_obat');
        $page_data['cara_pemakaian'] = $this->M_Poli->getCaraPemakaianObat('cara_pemakaian_obat');
        $page_data['tindakan_radiologi'] = $this->M_Poli->selectNamaRadiologi();
        $page_data['tindakan_labor'] = $this->M_Poli->selectNamaLabor();
        $page_data['jenis_pelayanan'] = 'POLI';
        $page_data['dokter'] = $this->M_Pasien->selectNamaDPJP();
        $page_data['action'] = site_url('Pasien/edit_rawat_jalan');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    //pasien fisio
    public function Pasien_Polifisio()
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Pasien_Fisio';
        $page_data['tipe_masuk'] = $this->M_Pencarian_Pasien->getTipeMasuk();
        $page_data['tindakan_fisio'] = $this->M_Poli->selectNamaTindakan('list_tindakan_poli_fisio');
        $page_data['list_obat'] = $this->M_Poli->getNamaObat();
        $page_data['signa_obat'] = $this->M_Poli->getSignaObat('signa_obat');
        $page_data['cara_pemakaian'] = $this->M_Poli->getCaraPemakaianObat('cara_pemakaian_obat');
        $page_data['tindakan_radiologi'] = $this->M_Poli->selectNamaRadiologi();
        $page_data['tindakan_labor'] = $this->M_Poli->selectNamaLabor();
        $page_data['dokter'] = $this->M_Pasien->selectNamaDPJP();
        $page_data['action'] = site_url('Pasien/edit_rawat_jalan');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function Pasien_FisioRanap()
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/fisio_ranap';
        $page_data['data_tipe_kamar'] = $this->M_Rawatinap->selectTipeKamarFisio();
        $page_data['tipe_masuk'] = $this->M_Pencarian_Pasien->getTipeMasuk();
        $page_data['tindakan_fisio'] = $this->M_Poli->selectNamaTindakan('list_tindakan_poli_fisio');
        $page_data['list_obat'] = $this->M_Poli->getNamaObat();
        $page_data['signa_obat'] = $this->M_Poli->getSignaObat('signa_obat');
        $page_data['cara_pemakaian'] = $this->M_Poli->getCaraPemakaianObat('cara_pemakaian_obat');
        $page_data['tindakan_radiologi'] = $this->M_Poli->selectNamaRadiologi();
        $page_data['tindakan_labor'] = $this->M_Poli->selectNamaLabor();
        $page_data['dokter'] = $this->M_Pasien->selectNamaDPJP();
        $page_data['action'] = site_url('Pasien/edit_rawat_jalan');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function polirehab()
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Pasien_polirehab';
        $page_data['tipe_masuk'] = $this->M_Pencarian_Pasien->getTipeMasuk();
        $page_data['data_pasien_rawat_jalan'] = $this->M_Pasien->selectDataPasienRawatJalan();
        $page_data['data_dokter'] = $this->M_Pasien->selectNamaDPJP();
        $page_data['data_asal_pasien'] = $this->M_Pasien->selectAsalPasien();
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_nama_poli'] = $this->M_Pasien->selectNamaPoli();
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['action'] = site_url('Pasien/edit_rawat_jalan');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function edit_rawat_jalan()
    {
        $idp = $this->input->post('idPelayanan');
        $Carabayar = $this->input->post('CaraBayar');
        $dpjp = $this->input->post('namaDPJP');
        $idh = $this->input->post('idHis');
        $np = $this->input->post('NamaPoli');
        $tipe_masuk = $this->input->post('tipe_masuk');

        if ($dpjp == '') {
            $out['status'] = 'Dokter Tidak Boleh Kosong';
        } else {

            $igd = $this->db->get_where('history_pelayanan_ugd', ['id_pelayanan' => $idp, 'status' => 1])->result();
            $no_rm = $this->db->get_where('pelayanan', ['id_pelayanan' => $idp, 'status' => 1])->row()->id_pasien;

            $biaya = update_biaya($no_rm, $Carabayar, $dpjp, $tipe_masuk, $np);

            if (count($igd) > 0) {
                $data = array(
                    'no_sep' => $this->input->post('NoSEP'),
                    'diagnosa' => $this->input->post('Diagnosa'),
                    // 'asal_pasien' => $this->input->post('AsalPasien'),
                    'cara_bayar' => $Carabayar,
                );
            } else {
                $data = array(
                    'no_sep' => $this->input->post('NoSEP'),
                    'diagnosa' => $this->input->post('Diagnosa'),
                    'biaya_jasa' =>  $biaya['biaya_jasa'],
                    'biaya_rs' =>  $biaya['biaya_rs'],
                    // 'asal_pasien' => $this->input->post('AsalPasien'),
                    'cara_bayar' => $Carabayar,
                );
            }


            $this->M_Pasien->edit_pasien_rawat_jalan($idp, $data);


            $data2 = array(
                'biaya_jasa' =>  $biaya['biaya_jasa'],
                'dpjp' => $this->input->post('namaDPJP'),
                'nama_poli' => $np,
            );
            $this->M_Pasien->edit_pasien_rajal($idh, $data2, 'history_pelayanan');

            $antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $idp])->result();
            if (count($antrian) > 0) {
                $data3 = array(
                    'dpjp' => $this->input->post('namaDPJP'),
                    'poli' => $np,
                );
                $this->M_Poli->update_tindakan($data3, ['id_pelayanan' => $idp], 'antrian_poli');
            }

            $out['status'] = 'success';
        }

        echo json_encode($out);
    }

    public function Riwayat_Pasien_Fisio()
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Riwayat_Pasien_Fisio';
        $page_data['tipe_masuk'] = $this->M_Pencarian_Pasien->getTipeMasuk();
        $page_data['tindakan_fisio'] = $this->M_Poli->selectNamaTindakan('list_tindakan_poli_fisio');
        $page_data['list_obat'] = $this->M_Poli->getNamaObat();
        $page_data['signa_obat'] = $this->M_Poli->getSignaObat('signa_obat');
        $page_data['cara_pemakaian'] = $this->M_Poli->getCaraPemakaianObat('cara_pemakaian_obat');
        $page_data['tindakan_radiologi'] = $this->M_Poli->selectNamaRadiologi();
        $page_data['tindakan_labor'] = $this->M_Poli->selectNamaLabor();
        $page_data['dokter'] = $this->M_Pasien->selectNamaDPJP();
        $page_data['action'] = site_url('Pasien/edit_rawat_jalan');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function update_pasien_balik()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');

        // Update total_bayar menjadi 0 di database
        $this->load->model('M_Riwayat_Pasienfisio');
        $update_status = $this->M_Riwayat_Pasienfisio->update_pasien_balik($id_pelayanan);

        if ($update_status) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal mengembalikan Pasien.']);
        }
    }

    public function tampil_data_riwayat_polifisio()
    {
        $data = $this->session->userdata('data_auth');
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Riwayat_Pasienfisio->selectRangeDataRiwayatPolifisio($mulai, $akhir);
        } else {
            $page_data = $this->M_Riwayat_Pasienfisio->selectDataRiwayatPolifisio();
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            // base_url('erm_igd/form/' . $page_data[$i]->id_pelayanan . '/' . $page_data[$i]->id_history) . "><i class='icon-note'></i></a>";
            // $tombol = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tampildatariwayatpolifisio(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-rocket'></i></button>";

            if ($data->izin_akses == 'admin') {
                $tombol = "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='kembali(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->no_rm . "\")'><i class='icon-action-undo'></i></button>";
            } else {
                $tombol = "";
            }
            $soap = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('Form_soap_rehab/formsoap/') . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "'><i class='icon-pencil'></i></a>";


            $time = strtotime($page_data[$i]->tgl_pelayanan);
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
            $no_rm = "" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->pasien;
            $tgl_pelayanan = $date2;
            $jam_pelayanan = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->cara_masuk;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $polituj = $page_data[$i]->poli;

            // if (preg_match('/BPJS/i', $cara_bayar) && $cara_bayar != 'BPJSTK') {
            //     $tombol = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url('SEP/form/') . $page_data[$i]->no_bpjs . "/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "'><i class='fa fa-pencil'></i></a>";
            // } else {
            //     $tombol = '';
            // }

            $out[$i] = array($no, $tombol, $soap, $tgl_pelayanan, $jam_pelayanan, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $polituj, $cara_bayar, $diagnosa, $dokter);
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

    public function Pasien_Igd()
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Pasien_IGD';
        $page_data['tipe_masuk'] = $this->M_Pencarian_Pasien->getTipeMasuk();
        $page_data['data_pasien_rawat_jalan'] = $this->M_Pasien->selectDataPasienIgd();
        $page_data['data_dokter'] = $this->M_Pasien->selectDokterIgd();
        $page_data['data_asal_pasien'] = $this->M_Pasien->selectAsalPasien();
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_nama_poli'] = $this->M_Pasien->selectNamaPoli();
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['action'] = site_url('Pasien/edit_rawat_jalan');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Pasien_Igd1()
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Pasien_IGD1';
        $page_data['tipe_masuk'] = $this->M_Pencarian_Pasien->getTipeMasuk();
        $page_data['data_pasien_rawat_jalan'] = $this->M_Pasien->selectDataPasienIgd();
        $page_data['data_dokter'] = $this->M_Pasien->selectDokterIgd();
        $page_data['data_asal_pasien'] = $this->M_Pasien->selectAsalPasien();
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_nama_poli'] = $this->M_Pasien->selectNamaPoli();
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['action'] = site_url('Pasien/edit_rawat_jalan');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function edit_Igd()
    {
        $idp = $this->input->post('idPelayanan');
        $Carabayar = $this->input->post('CaraBayar');
        $dpjp = $this->input->post('namaDPJP');
        $poli = $this->db->get_where('history_pelayanan', ['id_pelayanan' => $idp, 'status' => 1])->result();
        $no_rm = $this->db->get_where('pelayanan', ['id_pelayanan' => $idp, 'status' => 1])->row()->id_pasien;
        $biaya = update_biaya($no_rm, $Carabayar, $dpjp, '1', '-');

        if (count($poli) > 0) {
            $data = array(
                'no_sep' => $this->input->post('NoSEP'),
                'diagnosa' => $this->input->post('Diagnosa'),
                // 'asal_pasien' => $this->input->post('AsalPasien'),
                'cara_bayar' => $Carabayar,
            );
        } else {

            $data = array(
                'no_sep' => $this->input->post('NoSEP'),
                'diagnosa' => $this->input->post('Diagnosa'),
                'biaya_jasa' =>  $biaya['biaya_jasa'],
                'biaya_rs' =>  $biaya['biaya_rs'],
                // 'asal_pasien' => $this->input->post('AsalPasien'),
                'cara_bayar' => $Carabayar,
            );
        }


        $this->M_Pasien->edit_pasien_rawat_jalan($idp, $data);
        $idh = $this->input->post('idHis');

        $data2 = array(
            'dpjp' => $this->input->post('namaDPJP'),
            'biaya_jasa' =>  $biaya['biaya_jasa'],
        );
        $this->M_Pasien->edit_pasien_rajal($idh, $data2, 'history_pelayanan_ugd');
        $out['status'] = 'success';

        echo json_encode($out);
    }

    public function Pasien_ranap()
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Pasien_ranap';
        $page_data['data_pasien_rawat_inap'] = $this->M_Pasien->selectDataPasienRawatInap();
        $page_data['data_dokter'] = $this->M_Pasien->selectNamaDPJP();
        $page_data['data_asal_pasien'] = $this->M_Pasien->selectAsalPasien();
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_nama_ruangan'] = $this->M_Pasien->selectNamaRuangan();
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['data_kamar'] = $this->M_Rawatinap->selectKamar();
        $page_data['action'] = site_url('Pasien/edit_rawat_inap');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    //pasien polifisio
    public function tampil_data_polifisio()
    {
        $page_data = $this->M_Pasien->selectDataPasienPolifisio();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            //$ranap = $this->M_Rawatinap->selectDataPasienRanapById($page_data[$i]->id_pelayanan);
            // if (count($ranap) > 0) {
            //     $status_ranap = '<span class="label label-warning">Masuk Rawat Inap</span>';
            // } else {
            //     $status_ranap = '-';
            // }
            // if ($page_data[$i]->status_rawat == 'selesai') {
            //     $edit = "-";
            //     $radiologi = "-";
            //     $labor = "-";
            //     $obat = "-";
            // } else {
            //     $edit = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_igd(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";
            //     $radiologi = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_radiologi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-disc'></i></button>";
            //     $labor = "<button class='btn btn-info btn-icon-anim btn-square' onclick='edit_labor(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-chemistry'></i></button>";
            //     $obat = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_obat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-pencil'></i></button>";
            // }

            // if ($page_data[$i]->status == 1) {
            //     $kasir = "<span class='label label-success capitalize-font inline-block'>REQUESTED<span>";
            // } else {
            //     $kasir = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='edit_kasir(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-dollar'></i></button>";
            // }
            $edit = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tindakan_fisio(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";
            $radiologi = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_radiologi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-disc'></i></button>";
            $labor = "<button class='btn btn-info btn-icon-anim btn-square' onclick='edit_labor(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-chemistry'></i></button>";
            $obat = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_obat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-pencil'></i></button>";
            $erm = "<a class='btn btn-warning btn-icon-anim btn-square' href=" . base_url('erm_igd/form/' . $page_data[$i]->id_pelayanan . '/' . $page_data[$i]->id_history) . "><i class='icon-note'></i></a>";
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
            $polituj = $page_data[$i]->poli;

            if (preg_match('/BPJS/i', $cara_bayar) && $cara_bayar != 'BPJSTK') {
                $tombol = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url('SEP/form/') . $page_data[$i]->no_bpjs . "/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "'><i class='fa fa-pencil'></i></a>";
            } else {
                $tombol = '';
            }

            $out[$i] = array($no, $edit, $obat, $radiologi, $labor, $tombol, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $polituj, $cara_bayar, $diagnosa, $dokter);
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



    //tampil data pasien fisio
    public function tampil_data_PasienPolifisio()
    {
        $page_data = $this->M_Pasien->selectDataPasien_Polifisio();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tindakan_fisio(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";
            $soap = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('Form_soap_rehab/formsoap/') . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "'><i class='icon-pencil'></i></a>";
            $checkout = "<button class='btn btn-danger btn-icon-anim btn-square' onclick='check_out(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-logout'></i></button>";
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
            $polituj = $page_data[$i]->poli;

            $out[$i] = array($no, $edit, $soap, $checkout, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $polituj, $cara_bayar, $diagnosa, $dokter);
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

    // pasien ranap
    public function tampil_data_fisioranap()
    {
        $page_data = $this->M_Pasien->selectDataPasien_ranapfisio();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            //$coba = $page_data[$i]->showCancelButton;

            // $status = "";
            // if ($status == "") {
            //     $status =
            //         "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_tutup(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-unlock '></i></button>";
            // } else {
            //     $status =
            //         "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='edit_buka(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-lock '></i></button>";
            // }
            $edit = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tindakan_fisio(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";
            // $checkout = "<button class='btn btn-danger btn-icon-anim btn-square' onclick='check_out(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-logout'></i></button>";
            // $radiologi = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_radiologi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-disc'></i></button>";
            // $labor = "<button class='btn btn-info btn-icon-anim btn-square' onclick='edit_labor(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-chemistry'></i></button>";
            // $obat = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_obat(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-pencil'></i></button>";
            //$erm = "<a class='btn btn-warning btn-icon-anim btn-square' href=" . base_url('erm_igd/form/' . $page_data[$i]->id_pelayanan . '/' . $page_data[$i]->id_history) . "><i class='icon-note'></i></a>";
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
            $ruangan = $page_data[$i]->ruangan;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            // $polituj = $page_data[$i]->poli;

            $out[$i] = array($no, $edit, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruangan, $cara_bayar, $diagnosa, $dokter);
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

    public function edit_rawat_inap()
    {
        $idp = $this->input->post('idPelayanan');
        $Carabayar = $this->input->post('CaraBayar');
        $this->update_biaya($idp, $Carabayar);
        $data = array(
            'no_sep' => $this->input->post('NoSEP'),
            'diagnosa' => $this->input->post('Diagnosa'),
            'cara_bayar' => $Carabayar,
        );
        $this->M_Pasien->edit_pasien_rawat_inap($idp, $data, 'pelayanan');
        $idh = $this->input->post('idHis');
        $np = $this->input->post('NamaPoli');
        $data2 = array(
            'dpjp' => $this->input->post('namaDPJP'),
            'id_kamar' => $np,
        );
        $this->M_Pasien->edit_pasien_rajal($idh, $data2, 'history_pelayanan_ranap');

        $data3 = array(
            'id_kamar' => $np,
        );
        $where = array(
            'id_pelayanan' => $idp,
            'status!=' => 'PINDAH',
            'status!=' => 'BATAL',
        );
        $this->M_Pasien->Update_ruangan($where, $data3, 'riwayat_kamar');

        $out['status'] = 'success';
        echo json_encode($out);
    }

    public function tampil_datarajal()
    {
        $staff = $this->session->userdata('data_auth');
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Pasien->selectRangeDataPasienRawatJalan($mulai, $akhir);
        } else {
            $page_data = $this->M_Pasien->selectDataPasienRawatJalan();
        }

        $out = null;
        for (
            $i = 0;
            $i < count($page_data);
            $i++
        ) {
            $cara_masuk = $page_data[$i]->jenis_pelayanan;

            // $db_antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $page_data[$i]->id_pelayanan, 'poli' => $page_data[$i]->nama_poli])->result();
            if ($cara_masuk == 'POLI' && $page_data[$i]->id_antrian != NULL) {
                // $no_antri = $db_antrian[0]->no_antri;
                // $id_antrian = $db_antrian[0]->id_antrian;
                $no_antri = $page_data[$i]->no_antri;
                $id_antrian = $page_data[$i]->id_antrian;
                $cetak = "<a class='btn btn-primary btn-icon-anim btn-square' href='../Pencarian_pasien/cetak_antrian_pasien/" . $id_antrian .  "/poli' ><i class='icon-printer'></i></a>";
            } else {
                $no_antri = "";
                $id_antrian = "";
                $cetak = "<a class='btn btn-primary btn-icon-anim btn-square' href='../Pencarian_pasien/cetak_antrian_pasien/" . $page_data[$i]->id_history .  "/prioritas' ><i class='icon-printer'></i></a>";
            }

            $edit =
                "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_kunjungan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-pencil'></i></button>";
            if ($staff->ruangan == "SRO") {
                $delete =
                    "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='delete_rajal(\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            } else if ($cara_masuk == 'POLI PRIORITAS' && $staff->ruangan == 'prioritas') {
                $delete =
                    "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='delete_rajal(\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            } else {
                $delete = "";
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
            $ruang = $page_data[$i]->poli;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $keterangan = $page_data[$i]->keterangan;
            $no_sep = $page_data[$i]->no_sep;
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;
            $id_dokter = $page_data[$i]->dpjp;
            // $no_antri = $page_data[$i]->no_antri;

            if (preg_match('/BPJS/i', $cara_bayar) && $cara_bayar != 'BPJSTK') {
                $hari = hari_ini($tgl_masuk);
                // echo $hari;
                $dokter_1 = $this->db->query("SELECT * from jadwal_dokter_lokal where id_dokter ='$id_dokter' and hari like '%$hari%'")->row();
                if (isset($dokter_1)) {
                    $jam_praktek = $dokter_1->jam_mulai;
                    $jam_praktek = date('H:i:s', strtotime('-1 hour', strtotime($jam_praktek)));
                    // echo $jam_praktek;
                    $jam_tutup = $dokter_1->jam_selesai;
                    $hourMin = date('H:i:s');
                    if ($hourMin >= $jam_praktek) {
                        // if ($hourMin >= $jam_praktek && $hourMin <= $jam_tutup) {
                        $tombol = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url('SEP/form/') . $page_data[$i]->no_bpjs . "/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "'><i class='fa fa-pencil'></i></a>";
                    } else {
                        $tombol = '<span class="label label-danger">Pembuatan SEP hanya bisa mulai pada Jam' . $jam_praktek . '</span>';
                    }
                } else {
                    $tombol = '<span class="label label-danger">Jadwal Dokter Tidak Ada</span>';
                }
            } else {
                $tombol = '';
            }



            if ($staff->izin_akses == "admin") {
                $out[$i] = array($no, $cetak, $delete, $edit, $tombol, $no_rm,  $no_antri, $nama, $tgl_masuk, $jam_masuk, $no_sep, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $diagnosa, $agama);
            } else {
                $out[$i] = array($no, $cetak, $edit, $tombol, $no_rm,  $no_antri, $nama, $tgl_masuk, $jam_masuk, $no_sep, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $diagnosa, $agama);
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

    public function Pasien_rajal_all()
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Pasien_rajal_all';
        $page_data['tipe_masuk'] = $this->M_Pencarian_Pasien->getTipeMasuk();
        $page_data['data_pasien_rawat_jalan'] = $this->M_Pasien->selectDataPasienRawatJalanAll();
        $page_data['data_dokter'] = $this->M_Pasien->selectNamaDPJP();
        $page_data['data_asal_pasien'] = $this->M_Pasien->selectAsalPasien();
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_nama_poli'] = $this->M_Pasien->selectNamaPoli();
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['action'] = site_url('Pasien/edit_rawat_jalan');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_datarajal_all()
    {
        $staff = $this->session->userdata('data_auth');
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Pasien->selectRangeDataPasienRawatJalanAll($mulai, $akhir);
        } else {
            $page_data = $this->M_Pasien->selectDataPasienRawatJalanAll();
        }

        $out = null;
        for (
            $i = 0;
            $i < count($page_data);
            $i++
        ) {
            $cara_masuk = $page_data[$i]->jenis_pelayanan;

            // $db_antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $page_data[$i]->id_pelayanan, 'poli' => $page_data[$i]->nama_poli])->result();
            if ($cara_masuk == 'POLI' && $page_data[$i]->id_antrian != NULL) {
                // $no_antri = $db_antrian[0]->no_antri;
                // $id_antrian = $db_antrian[0]->id_antrian;
                $no_antri = $page_data[$i]->no_antri;
                $id_antrian = $page_data[$i]->id_antrian;
                $cetak = "<a class='btn btn-primary btn-icon-anim btn-square' href='../Pencarian_pasien/cetak_antrian_pasien/" . $id_antrian .  "/poli' ><i class='icon-printer'></i></a>";
            } else {
                $no_antri = "";
                $id_antrian = "";
                $cetak = "<a class='btn btn-primary btn-icon-anim btn-square' href='../Pencarian_pasien/cetak_antrian_pasien/" . $page_data[$i]->id_pelayanan .  "/prioritas' ><i class='icon-printer'></i></a>";
            }

            $edit =
                "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_kunjungan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-pencil'></i></button>";

            $delete =
                "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='delete_rajal(\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";

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
            $ruang = $page_data[$i]->poli;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $keterangan = $page_data[$i]->keterangan;
            $no_sep = $page_data[$i]->no_sep;
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;
            // $no_antri = $page_data[$i]->no_antri;

            if (preg_match('/BPJS/i', $cara_bayar) && $cara_bayar != 'BPJSTK') {
                $tombol = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url('SEP/form/') . $page_data[$i]->no_bpjs . "/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "'><i class='fa fa-pencil'></i></a>";
            } else {
                $tombol = '';
            }


            if ($staff->izin_akses == "admin") {
                $out[$i] = array($no, $cetak,  $no_rm,  $no_antri, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
            } else {
                $out[$i] = array($no, $cetak,  $no_rm,  $no_antri, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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

    public function tampil_datarajal1()
    {
        $staff = $this->session->userdata('data_auth');
        $page_data = $this->M_Pasien->selectDataPasienRawatJalan1();
        $out = null;
        for (
            $i = 0;
            $i < count($page_data);
            $i++
        ) {
            $cetak = "<a class='btn btn-primary btn-icon-anim btn-square' href='../Pasien/print_pasien/" . $page_data[$i]->no_rm . "' ><i class='icon-printer'></i></a>";

            // $edit =
            //     "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_kunjungan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-pencil'></i></button>";

            // $delete ="<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='delete_rajal(\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";

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
            $no_antri = $page_data[$i]->no_antri;

            if ($staff->izin_akses == "admin") {
                $out[$i] = array($no, $cetak,  $no_rm,  $no_antri, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
            } else {
                $out[$i] = array($no, $cetak,  $no_rm,  $no_antri, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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
    public function tampil_DataPasienfisio()
    {
        $staff = $this->session->userdata('data_auth');
        $page_data = $this->M_Pasien->selectDataPasienfisio();
        $out = null;
        for (
            $i = 0;
            $i < count($page_data);
            $i++
        ) {

            $edit =
                "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_kunjungan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-pencil'></i></button>";
            if ($staff->ruangan == "SRO") {
                $delete =
                    "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='delete_rajal(\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            } else {
                $delete = "";
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
            // $no_antri = $page_data[$i]->no_antri;

            if ($staff->izin_akses == "admin") {
                $out[$i] = array($no, $delete, $edit, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
            } else {
                $out[$i] = array($no, $edit, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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

    public function tampil_DataPasienrehab()
    {
        $staff = $this->session->userdata('data_auth');
        $page_data = $this->M_Pasien->selectDataPasienrehab();
        $out = null;
        for (
            $i = 0;
            $i < count($page_data);
            $i++
        ) {

            $edit =
                "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_kunjungan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-pencil'></i></button>";
            if ($staff->ruangan == "SRO") {
                $delete =
                    "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='delete_rajal(\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            } else {
                $delete = "";
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
            // $keterangan = $page_data[$i]->keterangan;
            $no_sep = $page_data[$i]->no_sep;
            $diagnosa = $page_data[$i]->diagnosa;
            // $agama = $page_data[$i]->agama;
            // $no_antri = $page_data[$i]->no_antri;

            if ($staff->izin_akses == "admin") {
                $out[$i] = array($no, $delete, $edit, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $no_sep, $diagnosa);
            } else {
                $out[$i] = array($no, $edit, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $no_sep, $diagnosa);
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



    public function tampil_dataIgd()
    {
        $staff = $this->session->userdata('data_auth');
        $page_data = $this->M_Pasien->selectDataPasienIgd();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $cetak = "<a class='btn btn-primary btn-icon-anim btn-square' href='../Pencarian_pasien/cetak_antrian_pasienIGD/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history .  "' ><i class='icon-printer'></i></a>";

            $edit =
                "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_kunjungan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-pencil'></i></button>";
            if ($staff->ruangan == "SRO") {
                $delete =
                    "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='delete_rajal(\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->tipe . "\")' '><i class='fa fa-trash '></i></button>";
            } else {
                $delete = "";
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
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $keterangan = $page_data[$i]->keterangan;
            $no_sep = $page_data[$i]->no_sep;
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;

            if (preg_match('/BPJS/i', $cara_bayar) && $cara_bayar != 'BPJSTK') {
                $tombol = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url('SEP/form/') . $page_data[$i]->no_bpjs . "/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "'><i class='fa fa-pencil'></i></a>";
            } else {
                $tombol = '';
            }

            if ($staff->izin_akses == "admin") {

                $out[$i] = array($no, $cetak, $delete, $edit, $tombol, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
            } else {
                $out[$i] = array($no, $cetak, $edit, $tombol, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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

    public function tampil_dataIgd1()
    {
        $staff = $this->session->userdata('data_auth');
        $page_data = $this->M_Pasien->selectDataPasienIgd();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $cetak = "<a class='btn btn-primary btn-icon-anim btn-square' href='../Pasien/print_pasien/" . $page_data[$i]->no_rm . "' ><i class='icon-printer'></i></a>";

            // $edit =
            //     "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_kunjungan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-pencil'></i></button>";

            // $delete =
            //     "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='delete_rajal(\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->tipe . "\")' '><i class='fa fa-trash '></i></button>";

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
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $keterangan = $page_data[$i]->keterangan;
            $no_sep = $page_data[$i]->no_sep;
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;
            if ($staff->izin_akses == "admin") {

                $out[$i] = array($no, $cetak, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
            } else {
                $out[$i] = array($no, $cetak, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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

    // edited by yan
    public function print_gelang($id)
    {
        $data['cetak_gelang'] = $this->M_Pasien->getGelangById($id);
        $this->load->library('mypdf');
        $this->mypdf->generate('print/cetak_gelang1', $data, true);
        // $this->load->view('print/cetak_gelang1', $data);
    }

    // edited by yan
    public function print_label($id)
    {
        $data['cetak_label'] = $this->M_Pasien->getLabelById($id);
        $this->load->library('mypdf');
        $this->mypdf->generate('print/cetak_label1', $data, true);
        // $this->load->view('print/cetak_label1', $data);
    }

    // edited by yan
    // note yang asli
    public function print_gelang1($id)
    {
        $data['cetak_gelang'] = $this->M_Pasien->getGelangById($id);
        $this->load->view('print/cetak_gelang', $data);
    }

    // edited by yan
    public function print_label1($id)
    {
        $data['cetak_label'] = $this->M_Pasien->getLabelById($id);
        $this->load->library('mypdf');
        $this->mypdf->generate('print/cetak_label1', $data, true);
        // $this->load->view('print/cetak_label', $data);
    }

    //KAMAR KARTU TRACER AUTO
    public function print_pasien($id)
    {
        $data['cetak_pasien'] = $this->M_Pasien->getPasienById($id);
        $this->load->view('print/cetak_pasien', $data);
    }

    //KAMAR KARTU TRACER AUTO
    public function print_tracer_auto()
    {
        $data['jp']                         = $this->M_Pasien->getJenisPelayanan();
        foreach ($data['jp'] as $jp) {
            $jpl = $jp->jenis_pelayanan;
            if ($jpl == 'UGD') {
                $data['cetak_tracer_ugd']  = $this->M_Pasien->getTracerUgd();
                $data['namanya']            = 'UGD';
                # ugd...
            } elseif ($jpl == 'RAWAT INAP') {
                $data['cetak_tracer_ranap'] = $this->M_Pasien->getTracerRanap();
                $data['namanya']            = 'RAWAT INAP';
                # ranap...
            } elseif ($jpl == 'POLI') {
                $data['cetak_tracer_poli']  = $this->M_Pasien->getTracerPoli();
                $data['namanya']            = 'POLI';
                # poli...
            }
        }
        $data['status']             = $this->M_Pasien->getStatusTracer();
        $this->load->view('print/cetak_tracer', $data);
    }

    //KAMAR KARTU TRACER AUTO
    public function update_tracer_auto()
    {

        $update_rows = array(
            'status' => '1',

        );
        $this->db->where('status', 0);
        $result = $this->db->update('tracer_kamar_kartu', $update_rows);
        if ($result) {
            return redirect(base_url('Pasien/print_tracer_auto'));
        };
    }


    public function tampil_dataranap()
    {
        $staff = $this->session->userdata('data_auth');
        $page_data = $this->M_Pasien->selectDataPasienRawatInap();
        $out = null;
        for (
            $i = 0;
            $i < count($page_data);
            $i++
        ) {

            $edit =
                "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_kunjungan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-pencil'></i></button>";
            if ($staff->ruangan == "SRO") {
                $delete =
                    "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='delete_ranap(\"" . $page_data[$i]->id_kamar . "\",\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-trash'></i></button>";
            } else {
                $delete = "";
            }
            $gelang =     "<a class='btn btn-info btn-icon-anim btn-square' href='" . base_url() . "Pasien/print_gelang/" . $page_data[$i]->id_pelayanan . "' ><i class='icon-printer'></i></a>";
            $label =     "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url() . "Pasien/print_label/" . $page_data[$i]->id_pelayanan . "' ><i class='icon-printer'></i></a>";
            $kamar = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pindah_kamar(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-pencil'></i></button>";

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
            $titip = $this->db->get_where('riwayat_kamar', ['status' => 'TITIP', 'id_pelayanan' => $page_data[$i]->id_pelayanan, 'tanggal_keluar' => NULL])->result();
            $aktif = $this->db->get_where('riwayat_kamar', ['status' => 'AKTIF', 'id_pelayanan' => $page_data[$i]->id_pelayanan, 'tanggal_keluar' => NULL])->result();
            if (count($titip) > 0 &&  count($aktif) == 0) {
                $nama = "<span class='label label-danger capitalize-font inline-block' style='font-size:13px'>" . $page_data[$i]->nama . " (TITIP)</span>";
            } else {
                $nama = $page_data[$i]->nama;
            }
            // $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->ruangan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $keterangan = $page_data[$i]->keterangan;
            $no_sep = $page_data[$i]->no_sep;
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;

            if (preg_match('/BPJS/i', $cara_bayar) && $cara_bayar != 'BPJSTK') {
                $tombol = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url('SEP/form/') . $page_data[$i]->no_bpjs . "/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "'><i class='fa fa-pencil'></i></a>";
            } else {
                $tombol = '';
            }

            // if ($staff->izin_akses == "admin") {
            $out[$i] = array($no, $delete, $edit, $tombol, $gelang, $label, $kamar, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
            // } else {
            //     $out[$i] = array($no, $edit, $gelang, $label, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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

    // Get select di modal

    public function getddata_ranap()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Pasien->selectDataPasienRawatInapby_id($id_pelayanan, $id_history);
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

    public function getddata_rajal()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Pasien->selectDataPasienRawatJalanby_id($id_pelayanan, $id_history);
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
    public function getddata_Igd()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Pasien->selectDataPasienIgdby_id($id_pelayanan, $id_history);
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

    public function  delete_pasien_rajal()
    {
        $data_staff = $this->session->userdata("data_auth");
        $id_history = $this->input->post('id_history');
        $id_pelayanan = $this->input->post('id_pelayanan');

        $db = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
        if ($db->cara_bayar == '30' && date('Y-m-d', strtotime($db->tgl_masuk)) != date('Y-m-d')) {
            $out['status'] = 'Pasien BPJS hanya bisa dibatalkan di tgl yang sama dengan tgl pelayanan';
        } else {

            $page_data = array(
                'status' => 0,
                'tgl_keluar' => date('Y-m-d H:i:s'),
                'ket' => $data_staff->id_staff,
            );
            $where = array(
                'id_history' => $id_history
            );
            $this->M_Pasien->delete_data_rajal($where, $page_data, 'history_pelayanan');
            $this->M_Pasien->delete_antrianpoli($id_pelayanan);

            //////////////  antrol ///////////////////////
            date_default_timezone_set('Asia/Jakarta');

            $antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $id_pelayanan]);
            if (count($antrian->result()) > 0) {
                $data_antrol = [
                    'kodebooking' => $antrian->row()->id_antrian,
                    'taskid' => 99,
                    'waktu' => strtotime('now') * 1000
                ];
                update_antrian($data_antrol);
            }
            //end

            $out['status'] = 'success';
        }

        echo json_encode($out);
    }
    public function  delete_pasien_Igd()
    {
        $data_staff = $this->session->userdata("data_auth");

        $id_history = $this->input->post('id_history');

        $page_data = array(
            'status' => 0,
            'tgl_keluar' => date('Y-m-d H:i:s'),
            'ket' => $data_staff->id_staff,
        );
        $where = array(
            'id_history' => $id_history
        );
        $this->M_Pasien->delete_data_rajal($where, $page_data, 'history_pelayanan_ugd');
        $out['status'] = 'success';
        echo json_encode($out);
    }

    public function delete_ranap()
    {
        $data_staff = $this->session->userdata("data_auth");

        $id_kamar = $this->input->post('kamar');

        $id_history = $this->input->post('id_history');
        $ID_pelayanan = $this->input->post('ID_pelayanan');
        //     $tipe = $this->input->post( 'tipe' );
        //   if($tipe == 'APM'){
        //     $status = '2';
        //   }else{
        //     $status = '0';
        //   }


        $page_data = array(
            'status' => 0,
            'tgl_hapus' => date('Y-m-d H:i:s'),
            'ket' => $data_staff->id_staff,
        );
        $where = array(
            'id_history' => $id_history
        );
        $this->M_Pasien->delete_data_rajal($where, $page_data, 'history_pelayanan_ranap');



        $page_data1 = array(
            'status' => 'tersedia'
        );
        $where1 = array(
            'id_ruangan' => $id_kamar
        );
        $this->M_Pasien->Update_ruangan($where1, $page_data1, 'ruangan');

        $page_data2 = array(
            'status' => 'BATAL'
        );
        $where2 = array(
            'id_pelayanan' => $ID_pelayanan,
            'id_kamar' => $id_kamar
        );
        $this->M_Pasien->delete_data_rajal($where2, $page_data2, 'riwayat_kamar');
        $out['status'] = 'success';
        echo json_encode($out);
    }

    public function getDokter()
    {
        $poli = $this->input->post('poli');
        $db = $this->db->get_where('list_poli', ['id_list_poli' => $poli])->row();

        $spes = $db->kdpoli_bpjs;

        $data = $this->M_Pasien->getDokter($spes);

        echo json_encode($data);
    }
    public function Pasien_apm()
    {
        $this->load->view('assets/_header');
        //$sso_user_data = $this->session->userdata( 'sso_user_data' );
        // $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Pasien_apm';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_dataapm()
    {
        $staff = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d");

        if ($staff->tipe != 'kasir') {
            $page_data = $this->M_Pasien->selectDataPasienApm();
        } else {
            $page_data = $this->db->get_where('v_pasien_apm', ['id_cara_bayar' => '42', 'DATE(tgl_masuk)' => $tgl])->result();
        }
        // $page_data = $this->M_Pasien->selectDataPasienApm();

        $out = null;
        for (
            $i = 0;
            $i < count($page_data);
            $i++
        ) {
            if ($page_data[$i]->status == 1) {
                $edit =
                    "<span class='label label-success capitalize-font inline-block'>Sudah dikonfirmasi</span>";
            } else {
                $edit = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_kunjungan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-thumbs-up'></i></button>";
            }



            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = indo_date2($page_data[$i]->tgl_masuk);

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
            $no_antri = $page_data[$i]->no_antri;

            $out[$i] = array($no, $edit, $no_rm, $no_antri, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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
    public function konfirmasiPasienAPM()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $db = $this->M_Pasien->getDataPasienApm($id_pelayanan);
        if (preg_match('/TIMAH/', $db->cara_bayar) && ($db->nama_ibu == '' || $db->nama_ibu == '-' || $db->nama_ayah  === '' || $db->nama_ayah  === '-' || $db->no_id_lain  === '')) {
            $out['status'] = ($db->nama_ibu == '' || $db->nama_ibu == '-') ? "Penanggung Jawabnya Tidak Boleh Kosong, Ubah Data pasien terlebih dahulu" : (($db->nama_ayah == '' || $db->nama_ayah  === '-') ? "Status Tanggungan Belum Dipilih, Ubah Data pasien terlebih dahulu" : "No Kartu Asuransi Lain Tidak Boleh Kosong, Ubah Data pasien terlebih dahulu");
        } else {
            $data = array(
                'status' => 1,
            );
            $this->M_Pasien->konfirmasiPasienAPM($id_pelayanan, $data);

            $out['status'] = "success";
        }
        echo json_encode($out);
    }
    public function get_dokter()
    {
        $id_dokter = $this->input->post('id_dokter');
        $db = $this->M_Pasien->selectNamaDPJPById($id_dokter);

        echo json_encode($db);
    }


    public function Pasien_Jkn()
    {
        $this->load->view('assets/_header');
        //$sso_user_data = $this->session->userdata( 'sso_user_data' );
        // $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Pasien_antroljkn';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_antrolJkn()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Pasien->selectAntrolJKN_range($mulai, $akhir);
        } else {
            $page_data = $this->M_Pasien->selectAntrolJKN();
        }
        $out = null;
        for (
            $i = 0;
            $i < count($page_data);
            $i++
        ) {
            if ($page_data[$i]->ket == 0) {
                $konf = "<span class='label label-warning capitalize-font inline-block'>Belum Chek-In</span>";
                $batal = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='batal(\"" . $page_data[$i]->id_antrian . "\")'><i class='fa fa-trash'></i></button>";
            } else if ($page_data[$i]->id_pelayanan != "") {
                $konf = "<span class='label label-success capitalize-font inline-block'>Sudah Diproses</span>";
                $batal = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='batal(\"" . $page_data[$i]->id_antrian . "\")'><i class='fa fa-trash'></i></button>";
            } else if ($page_data[$i]->ket == 1) {
                $konf = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='konfirmasi(\"" . $page_data[$i]->id_antrian . "\",\"" . $page_data[$i]->no_rm . "\")'><i class='fa fa-thumbs-up'></i></button>";
                $batal = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='batal(\"" . $page_data[$i]->id_antrian . "\")'><i class='fa fa-trash'></i></button>";
            } else {
                $konf = "<span class='label label-danger capitalize-font inline-block'>Batal Chek-In</span>";
                $batal = "";
            }

            $time = strtotime($page_data[$i]->tanggal);
            $date2 = strftime('%d %B %Y ', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime(' %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = "POLI";
            $ruang = $page_data[$i]->poli;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = "BPJS";
            $no_antri = strtoupper($page_data[$i]->inisial) . $page_data[$i]->no_antri;

            $out[$i] = array($no, $konf, $batal, $no_rm, $no_antri, $nama, $tgl_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar);
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
    public function konfirmasiAntrolJkn()
    {
        $staff = $this->session->userdata('data_auth');
        $id_pelayanan = $this->M_Pencarian_Pasien->get_ai_tbl_pelayanan();

        $id = $this->input->post('id');
        $no_rm = $this->input->post('no_rm');
        $antrian = $this->db->get_where('antrian_poli', ['id_antrian' => $id])->row();
        $biaya = update_biaya($no_rm, '30', $antrian->dpjp, '2', $antrian->poli);
        $data_pelayanan = array(
            'id_pelayanan' => $id_pelayanan,
            'id_pasien' =>  $no_rm,
            'asal_pasien' => 'BEKUFG24er',
            'no_sep' => '',
            'status_rawat' => "dirawat",
            'total_bayar' => 0,
            'tgl_masuk' =>  date("Y-m-d H:i:s"),
            'tgl_keluar' => NULL,
            'cara_bayar' => '30',
            'diagnosa' => "",
            'cara_keluar' => "-",
            'keadaan_keluar' => "-",
            'keterangan' => $antrian->rujukan,
            'no_jaminan' => "-",
            'tipe' => "LANGSUNG",
            'status' => "1",
            // 'biaya_jasa' => ($antrian->poli == "ODI8643C27" || $antrian->poli == "RZE28J1098") ? 90000 : (($antrian->poli == "NM3075J78" || $antrian->poli == "6E975PL694") ? 0 : 150000),
            'biaya_jasa' =>  $biaya['biaya_jasa'],
            'biaya_rs' =>  $biaya['biaya_rs'],
            'biaya_admin' =>  $biaya['biaya_admin'],
            'id_staff' => $staff->id_staff,
        );
        $data_history = array(
            'id_history' => $this->M_Pencarian_Pasien->get_ai_tbl_history_poli(),
            'jenis_pelayanan' => 'POLI',
            'tgl_masuk' => date("Y-m-d H:i:s"),
            'tgl_keluar' => NULL,
            'dpjp' => $antrian->dpjp,
            'nama_poli' => $antrian->poli,
            'id_pelayanan' => $id_pelayanan,
            'id_staff' => $staff->id_staff,
            // 'biaya_jasa' => ($antrian->poli == "ODI8643C27" || $antrian->poli == "RZE28J1098") ? 90000 : (($antrian->poli == "NM3075J78" || $antrian->poli == "6E975PL694") ? 0 : 150000),
            'biaya_jasa' =>  $biaya['biaya_jasa'],

        );
        $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);
        $this->M_Pencarian_Pasien->tambah_history_poli($data_history);

        $data = array(
            'id_pelayanan' => $id_pelayanan,
        );
        $this->M_Pasien->update(['id_antrian' => $id], $data, 'antrian_poli');

        $antrian = $this->db->get_where('antrian_poli', ['id_antrian' => $id])->row();
        $pasien = $this->M_Pasien->get_pasien_baru($antrian->id_akun)->result();
        if (count($pasien) > 0) {
            $data_antrol1 = [
                'kodebooking' => $id,
                'taskid' => 1,
                'waktu' => strtotime($pasien[0]->tgl_daftar) * 1000
            ];
            update_antrian($data_antrol1);

            $data_antrol2 = [
                'kodebooking' => $id,
                'taskid' => 2,
                'waktu' => strtotime('-3 minute') * 1000
            ];
            update_antrian($data_antrol2);

            $data_antrol = [
                'kodebooking' => $id,
                'taskid' => 3,
                'waktu' => strtotime('now') * 1000
            ];
            update_antrian($data_antrol);
        } else {
            $data_antrol = [
                'kodebooking' => $id,
                'taskid' => 3,
                'waktu' => strtotime('now') * 1000
            ];
            update_antrian($data_antrol);
        }

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function  delete_pasien_jkn()
    {
        $data_staff = $this->session->userdata("data_auth");
        $id_akun = $this->input->post('id');
        $keterangan = $this->input->post('keterangan');

        $page_data = array(
            'keterangan' => $keterangan . '. Dibatalkan oleh ' . $data_staff->nama,
            'ket' => 2,
        );
        $where = array(
            'id_antrian' => $id_akun
        );
        $this->M_Pasien->delete_data_rajal($where, $page_data, 'antrian_poli');

        $data_antrol = [
            'kodebooking' => $id_akun,
            'keterangan' => $keterangan . '. Dibatalkan oleh ' . $data_staff->nama
        ];
        batal_antrian($data_antrol);
        $out['status'] = 'success';
        echo json_encode($out);
    }
    public function getDataPasien()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->db->get_where('v_kunjungan', ['id_pelayanan' => $id_pelayanan])->row();
        echo json_encode($data);
    }
    public function update_biaya($idp, $Carabayar)
    {
        $igd = $this->db->get_where('history_pelayanan_ugd', ['id_pelayanan' => $idp, 'status' => 1])->result();
        if (count($igd) > 0) {
            $idh1 = $igd[0]->id_history;

            $biaya = update_biaya('', $Carabayar, $igd[0]->dpjp, '1', '-');

            $data2 = array(
                'biaya_jasa' =>  $biaya['biaya_jasa'],
            );
            $this->M_Pasien->edit_pasien_rajal($idh1, $data2, 'history_pelayanan_ugd');
            $data3 = array(
                'biaya_rs' => $biaya['biaya_rs'],
            );
            $this->M_Pasien->edit_pasien_rawat_inap($idp, $data3, 'pelayanan');
        } else {

            $poli = $this->db->get_where('history_pelayanan', ['id_pelayanan' => $idp, 'status' => 1])->result();
            if (count($poli) > 0) {
                $dokter = $this->db->get_where('dokter', ['id_dokter' => $poli[0]->dpjp])->row();
                if ($poli[0]->jenis_pelayanan == 'POLI') {
                    $jenis_pelayanan = '3';
                } else {
                    $jenis_pelayanan = '4';
                }

                $biaya = update_biaya('', $Carabayar, $poli[0]->dpjp, $jenis_pelayanan, $poli[0]->nama_poli);

                $data3 = array(
                    // 'biaya_jasa' => $biaya_jasa,
                    'biaya_rs' => $biaya['biaya_rs'],
                );
                $this->M_Pasien->edit_pasien_rawat_inap($idp, $data3, 'pelayanan');

                foreach ($poli as $row) {
                    if ($poli[0]->jenis_pelayanan == 'POLI') {
                        $jenis_pelayanan = '3';
                    } else {
                        $jenis_pelayanan = '4';
                    }

                    $biaya = update_biaya('', $Carabayar, $row->dpjp, $jenis_pelayanan, $row->nama_poli);

                    $data2 = array(
                        'biaya_jasa' =>  $biaya['biaya_jasa'],
                    );
                    $this->M_Pasien->edit_pasien_rajal($row->id_history, $data2, 'history_pelayanan');
                }
            }
        }
    }
    public function update()
    {
        // $data = $this->db->query("SELECT *  FROM history_pelayanan h, pelayanan p 
        // WHERE h.id_pelayanan = p.id_pelayanan and h.biaya_jasa = 0  and h.nama_poli !='146582' and h.nama_poli != '15487956' 
        // and h.nama_poli !='6E975PL694' and h.nama_poli !='NM3075J78'  and h.status =1
        // and h.jenis_pelayanan = 'POLI' and p.status = 1
        // ORDER BY h.tgl_masuk DESC")->result();

        $data = $this->db->query("SELECT * FROM history_pelayanan h, pelayanan b WHERE b.id_pelayanan = h.id_pelayanan and
        h.jenis_pelayanan = 'POLI PRIORITAS' AND h.biaya_jasa = 30000 and b.biaya_rs = 200000
        ORDER BY h.tgl_masuk DESC")->result();
        foreach ($data as $row) {

            $id_pelayanan = $row->id_pelayanan;
            $cara_bayar = $row->cara_bayar;
            echo $id_pelayanan . '<br>';
            $data3 = array(
                // 'biaya_jasa' => $biaya_jasa,
                'biaya_rs' => 30000,
            );
            $this->M_Pasien->edit_pasien_rawat_inap($id_pelayanan, $data3, 'pelayanan');
            $data2 = array(
                'biaya_jasa' =>  200000,
            );
            $this->M_Pasien->edit_pasien_rajal($row->id_history, $data2, 'history_pelayanan');
            // $this->update_biaya($id_pelayanan, $cara_bayar);
        }
        echo count($data);
    }
}
