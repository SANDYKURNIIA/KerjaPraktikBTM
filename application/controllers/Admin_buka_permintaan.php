<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_buka_permintaan extends CI_Controller
{

    function __construct() 
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Admin_buka_permintaan');
        $this->load->model('M_Logistik_farmasi');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Admin_buka_permintaan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function buka_unit()
    {
        $unit = $this->input->post('unit');
        $status = 'BUKA';

        $page_data = array(
            'status' => $status
        );

        $where = array(
            'unit' => $unit
        );
        $this->M_Admin_buka_permintaan->update_unit($where, $page_data, 'admin_logistik_farmasi');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tutup_unit()
    {

        $unit = $this->input->post('unit');
        $status = 'TUTUP';

        $page_data = array(
            'status' => $status
        );

        $where = array(
            'unit' => $unit
        );

        $this->M_Admin_buka_permintaan->update_unit($where, $page_data, 'admin_logistik_farmasi');
        $out['status'] = "success";
        echo json_encode($out);
    }
   

    public function tampil_unit()
    {
        $page_data = $this->M_Admin_buka_permintaan->selectUnit();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            if ($page_data[$i]->status == "BUKA") {
                $status =
                    "<span class='label label-success capitalize-font inline-block'>BUKA</span>";
                $tombol =
                    "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='edit_tutup(\"" . $page_data[$i]->unit . "\")' '><i class='icon-lock '></i></button>";
            } else {
                $status =
                    "<span class='label label-danger capitalize-font inline-block'>TUTUP</span>";
                $tombol =
                    "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_buka(\"" . $page_data[$i]->unit . "\")' '><i class='icon-lock '></i></button>";
            }

            $no = $i + 1;
            $tombol = $tombol;
            $unit = $page_data[$i]->unit;
            $status = $status;

            $out[$i] = array($no, $tombol, $unit, $status);
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
