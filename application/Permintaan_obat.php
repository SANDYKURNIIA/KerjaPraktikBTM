<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan_obat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Permintaan_obat');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        $page_data['page_content'] = 'page_content/Permintaan_obat';
        //$page_data['obat'] = $this->M_Permintaan_obat->getNamaObat();
        $page_data['obat'] = $this->db->get('list_logistik')->result_array();
        $page_data['status'] = $this->M_Permintaan_obat->selectStatus($tipe);
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_permintaan_obat()
    {
        $data = $this->session->userdata('data_auth');
        $unit = $data->tipe;
        $page_data = $this->M_Permintaan_obat->selectPermintaanObat($unit);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $button = "<div class='btn btn-success btn-icon-anim btn-square' onclick='tampilPermintaanObat(\"" . $page_data[$i]->id_req . "\")'><i class='icon-pencil'></i></div>";
            $button2 = "<div class='btn btn-danger btn-icon-anim btn-square' onclick='hapusPermintaan(\"" . $page_data[$i]->id_req . "\")'><i class='icon-trash'></i></div>";
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);

            if ($page_data[$i]->tipe == 'depo') {
                $tujuan = "LOGISTIK FARMASI";
            }else if($page_data[$i]->tipe == 'depo ranap'){
                $tujuan = "FARMASI RANAP";
            }else if($page_data[$i]->tipe == 'unit'){
                $tujuan = "FARMASI RAJAL";
            }else{
                $tujuan =$page_data[$i]->tipe;
            }

            $out[$i] = array($no, $button, $button2, $tgl, $waktu, $nama, $tujuan);
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

    public function Tampil_Range_Permintaan_obat()
    {
        $data = $this->session->userdata('data_auth');
        $unit = $data->tipe;
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Permintaan_obat->selectRangePermintaanObat($mulai, $akhir, $unit);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $button = "<div class='btn btn-success btn-icon-anim btn-square' onclick='tampilPermintaanObat(\"" . $page_data[$i]->id_req . "\")'><i class='icon-pencil'></i></div>";
            $button2 = "<div class='btn btn-danger btn-icon-anim btn-square' onclick='hapusPermintaan(\"" . $page_data[$i]->id_req . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-trash'></i></div>";
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);

            if ($page_data[$i]->tipe == 'depo') {
                $tujuan = "LOGISTIK FARMASI";
            }else if($page_data[$i]->tipe == 'depo ranap'){
                $tujuan = "FARMASI RANAP";
            }else if($page_data[$i]->tipe == 'unit'){
                $tujuan = "FARMASI RAJAL";
            }else{
                $tujuan ="";
            }

            $out[$i] = array($no, $button, $button2, $tgl, $waktu, $nama, $tujuan);
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
    public function insertFormPermintaanObatBaru()
    {

        $id_req = uniqid();
        $data_staff = $this->session->userdata('data_auth');
        $now = new DateTime();
        $tipe = $this->input->post('inTuj');
        if($tipe=="depo"){
            $max = $this->db->query("SELECT max(indeks) max from request_obat where tipe = 'depo'")->row()->max;
            $index = $max +1;
        }else if($tipe=="depo ranap"){
            $max = $this->db->query("SELECT max(indeks) max from request_obat where tipe = 'depo ranap'")->row()->max;
            $index = $max +1;
        }else if($tipe=="unit"){
            $max = $this->db->query("SELECT max(indeks) max from request_obat where tipe = 'unit'")->row()->max;
            $index = $max +1;
        }
        $data = array(
            'id_req' => $id_req,
            'indeks' => $index,
            'id_staff' => $data_staff->id_staff,
            'tanggal' => $now->format('Y-m-d H:i:s'),
            'tanggal_respon' => NULL,
            'status' => 'diajukan',
            'tipe' => $tipe
        );
        $this->M_Permintaan_obat->insertRequest($data, 'request_obat');
        redirect('Permintaan_obat');
    }
    public function getExp()
    {
        $obat = $this->input->post('obat');
        $data = $this->M_Permintaan_obat->getExpByObat($obat);
        echo json_encode($data);
    }
    public function insertPermintaanObatFarmasi()
    {

        $id_req = uniqid();
        $data_staff = $this->session->userdata('data_auth');
        $now = new DateTime();
        $obat = $this->M_Permintaan_obat->getSumObat($this->input->post('idObat'));
        // if ($obat['stok'] < $this->input->post('frek')) {
        //     $out['status'] = "error";
        // } else {
            $data = array(
                'id_req' => $id_req,
                'id_form' => $this->input->post('idReq'),
                'id_staff' => $data_staff->id_staff,
                'id_logistik' => $this->input->post('idObat'),
                'tgl_exp' => '',
                'status' => 'DIAJUKAN',
                'jml_req' => $this->input->post('jml'),
                'jml_terima' => 0,
                'tgl_res' => NULL,
                'tgl_req' => $now->format('Y-m-d H:i:s'),
                'keterangan' => '-',
            );
            $this->M_Permintaan_obat->insertDetailRequest($data, 'detail_request');
            $out['status'] = "success";
        // }
        echo json_encode($out);
    }
    public function tampil_list_tindakan()
    {
        $id_req = $this->input->post('id_req');
        $page_data = $this->M_Permintaan_obat->selectDataTindakanById($id_req);
        $jam = date('H');
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $produsen = $page_data[$i]->produsen;
            $jml_req = $page_data[$i]->jml_req;
            $jml_terima = $page_data[$i]->jml_terima;
            $status = $page_data[$i]->status;
            $keterangan = $page_data[$i]->keterangan;
            if ($jam < 25) {
                if ($page_data[$i]->status != "DIAJUKAN") {
                    $hapus = "-";
                } else {
                    $hapus = "<div class='btn btn-info btn-icon-anim btn-square' onclick='hapusRequest(\"" . $page_data[$i]->id_req . "\",\"" . $nama .  "\")'><i class='icon-trash'></i></div>";
                }
            } else {
                $hapus = "-";
            }

            $out[$i] = array($no, $nama,$produsen, $jml_req, $jml_terima, $status, $keterangan, $hapus);
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
    function hapus_request()
    {
        $id_req = $this->input->post('id_req');

        $this->M_Permintaan_obat->delete_tindakan($id_req, 'detail_request');
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_permintaan()
    {
        $id_req = $this->input->post('id_req');

        $this->M_Permintaan_obat->delete_permintaan($id_req);
        $out['status'] = "success";
        echo json_encode($out);
    }

    //  
}
