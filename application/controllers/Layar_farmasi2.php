<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layar_farmasi2 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Layar_farmasi2');
    }

    public function testProses()
    {
        $data =  $this->M_Layar_farmasi2->getAntrianFarmasi();
        $data =  $this->M_Layar_farmasi2->getProses();
        $data =  $this->M_Layar_farmasi2->getSelesai();
        echo json_encode($data);
    }

    public function index()
    {
        $this->load->view('assets/_header');

        $data['farmasi'] = $this->M_Layar_farmasi2->getAntrianFarmasi();
        $data['proses'] = $this->M_Layar_farmasi2->getProses();
        $data['selesai'] = $this->M_Layar_farmasi2->getSelesai();
        $data['skip'] = $this->M_Layar_farmasi2->getSkip();
        // $play = $this->M_Layar_farmasi2->selectPlay();


        // if (isset($play)) {
        //     $data['data'] = $play;
        // } else {
        //     $data['data'] = [
        //         'no' => '',
        //         'nama' => '',
        //     ];
        // }

        $this->load->view('Layar_farmasi2', $data);
        $this->load->view('assets/_footer');
    }

    public function deleteSuara()
    {
        $this->M_Layar_farmasi2->deleteplaySuara('temp_antrian_rm');
        $out['status'] = "ok";
        echo json_encode($out);
    }

    public function Get_antrian_Suara()
    {
        $play = $this->M_Layar_farmasi2->selectPlay();


        if (isset($play)) {
            $data['data'] = $play;
        } else {
            $data['data'] = [
                'no' => '',
                'inisial' => '',
                'nama' => '',
            ];
        }
        $data['status'] = "ok";
        echo json_encode($data);
    }

    public function Get_Menunggu()
    {
        $list = $this->M_Layar_farmasi2->getAntrianFarmasi();
        $data = array();
        foreach ($list as $data_temp) {
            if (($data_temp['status'] == 0)) {
                $row = array();
                $row['status'] = $data_temp['status'];
                $row['inisial'] = $data_temp['inisial'];
                $row['nomor'] = $data_temp['no_antri'];
                $row['nama'] = $data_temp['nama'];
                $data[] = $row;
            } 
        }
        $output = array(
            "data"  => $data,
        );
        echo json_encode($output);
    }

    public function Get_Diproses()
    {
        $list = $this->M_Layar_farmasi2->getProses();
        $data = array();
        foreach ($list as $data_temp) {
            if (($data_temp['status'] == 1)) {
                $row = array();
                $row['status'] = $data_temp['status'];
                $row['inisial'] = $data_temp['inisial'];
                $row['nomor'] = $data_temp['no_antri'];
                $row['nama'] = $data_temp['nama'];
                $data[] = $row;
            }
        }
        $output = array(
            "data"  => $data,
        );
        echo json_encode($output);
    }

    public function Get_Selesai()
    {
        $list = $this->M_Layar_farmasi2->getSelesai();
        $data = array();
        foreach ($list as $data_temp) {
            if (($data_temp['status'] == 2)) {
                $row = array();
                $row['status'] = $data_temp['status'];
                $row['inisial'] = $data_temp['inisial'];
                $row['nomor'] = $data_temp['no_antri'];
                $row['nama'] = $data_temp['nama'];
                $data[] = $row;
            }
        }
        $output = array(
            "data"  => $data,
        );
        echo json_encode($output);
    }

    public function Get_Lewat()
    {
        $list = $this->M_Layar_farmasi2->getSkip();
        $data = array();
        foreach ($list as $data_temp) {
            if (($data_temp['status'] == 3)) {
                $row = array();
                $row['status'] = $data_temp['status'];
                $row['inisial'] = $data_temp['inisial'];
                $row['nomor'] = $data_temp['no_antri'];
                $row['nama'] = $data_temp['nama'];
                $data[] = $row;
            }
        }
        $output = array(
            "data"  => $data,
        );
        echo json_encode($output);
    }
}
