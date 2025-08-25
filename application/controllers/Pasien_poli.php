<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien_poli extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Pasien');
        $this->load->model('M_Pencarian_Pasien');
    }

    //Function view

    public function Pasien_rajal()
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Pasien_poli';
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
        $data = array(
            'no_sep' => $this->input->post('NoSEP'),
            'diagnosa' => $this->input->post('Diagnosa'),
            // 'asal_pasien' => $this->input->post('AsalPasien'),
            'cara_bayar' => $Carabayar,
        );

        $this->M_Pasien->edit_pasien_rawat_jalan($idp, $data);
        $idh = $this->input->post('idHis');
        $np = $this->input->post('NamaPoli');
        $tipe_masuk = $this->input->post('tipe_masuk');

        $data2 = array(
            'dpjp' => $this->input->post('namaDPJP'),
            'nama_poli' => $np,
        );
        $this->M_Pasien->edit_pasien_rajal($idh, $data2, 'history_pelayanan');

        $out['status'] = 'success';

        echo json_encode($out);
    }
 

    public function tampil_datarajal()
    {
        if ($this->input->post('tipe') == 'range') {
            $page_data = $this->M_Pasien->selectDataPoliRange($this->input->post('mulai'), $this->input->post('akhir'));
        } else {
            $page_data = $this->M_Pasien->selectDataPoli();
        }
        $out = null;
        for (
            $i = 0;
            $i < count($page_data);
            $i++
        ) {

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
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $keterangan = $page_data[$i]->keterangan;
            $no_sep = $page_data[$i]->no_sep;
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;
            $no_antri = $page_data[$i]->no_antri;
            $out[$i] = array($no, $delete, $edit, $no_rm,  $no_antri, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
        }
        $print['data'] = $out;
        echo json_encode($print);
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

    public function  delete_pasien_rajal()
    {
        $id_history = $this->input->post('id_history');
        $id_pelayanan = $this->input->post('id_pelayanan');

        $page_data = array(
            'status' => 0
        );
        $where = array(
            'id_history' => $id_history
        );
        $this->M_Pasien->delete_data_rajal($where, $page_data, 'history_pelayanan');
        $this->M_Pasien->delete_antrianpoli($id_pelayanan);
        $out['status'] = 'success';
        echo json_encode($out);
    }
 
    public function getDokter()
    {
        $poli = $this->input->post('poli');
        if ($poli == '111111') {
            $spes = 'rehabilitasi';
            $data = $this->M_Pasien->getDokter($spes);
        } elseif ($poli == 'ODI8643C27') {
            $spes = 'gigi';
            $data = $this->M_Pasien->getDokter($spes);
        } elseif ($poli == 'AX1520L18') {
            $spes = 'anestesi';
            $data = $this->M_Pasien->getDokter($spes);
        } elseif ($poli == '146582') {
            $spes = 'labor';
            $data = $this->M_Pasien->getDokter($spes);
        } elseif ($poli == '15487956') {
            $spes = 'radiologi';
            $data = $this->M_Pasien->getDokter($spes);
        } elseif ($poli == '24QRNLX29R') {
            $spes = 'internis';
            $data = $this->M_Pasien->getDokter($spes);
        } elseif ($poli == '2JZ09X4K22') {
            $spes = 'kulit';
            $data = $this->M_Pasien->getDokter($spes);
        } elseif ($poli == '6E975PL694') {
            $spes = 'rehabilitasi';
            $data = $this->M_Pasien->getDokter($spes);
        } elseif ($poli == 'E00RX703') {
            $spes = 'anak';
            $data = $this->M_Pasien->getDokter($spes);
        } elseif ($poli == 'HLGI4176K8') {
            $spes = 'obgyn';
            $data = $this->M_Pasien->getDokter($spes);
        } elseif ($poli == 'I9NXY5VNQG') {
            $spes = 'jantung';
            $data = $this->M_Pasien->getDokter($spes);
        } elseif ($poli == 'MWK205D30K') {
            $spes = 'bedah';
            $data = $this->M_Pasien->getDokter($spes);
        } elseif ($poli == 'RZE28J1098') {
            $spes = 'umum';
            $data = $this->M_Pasien->getDokter($spes);
        } elseif ($poli == 'UQ81K76373') {
            $spes = 'mata';
            $data = $this->M_Pasien->getDokter($spes);
        } elseif ($poli == 'O782EGU4PR') {
            $spes = 'tht';
            $data = $this->M_Pasien->getDokter($spes);
        }

        echo json_encode($data);
    }

}
