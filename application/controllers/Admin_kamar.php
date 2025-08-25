<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_kamar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Admin_kamar');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Admin_kamar';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function buka_poli()
    {
        $id = $this->input->post('id');
        $status = 'tersedia';

        $page_data = array(
            'status' => $status
        );

        $where = array(
            'id_ruangan' => $id
        );
        $this->M_Admin_kamar->update($where, $page_data, 'ruangan');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tutup_poli()
    {

        $id = $this->input->post('id');
        $status = 'dipakai';

        $page_data = array(
            'status' => $status
        );

        $where = array(
            'id_ruangan' => $id
        );
        $this->M_Admin_kamar->update($where, $page_data, 'ruangan');
        $out['status'] = "success";
        echo json_encode($out);
    }


    public function tampil_admin_kamar()
    {
        $page_data = $this->M_Admin_kamar->selectKamar();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            if ($page_data[$i]->status == "tersedia") {
                $status =
                    "<span class='label label-success capitalize-font inline-block'>TERSEDIA</span>";
                $tombol =
                    "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_tutup(\"" . $page_data[$i]->id_ruangan . "\",\"" . $page_data[$i]->tipe . "\")' '><i class='fa fa-unlock '></i></button>";
            } else {
                $status =
                    "<span class='label label-danger capitalize-font inline-block'>DIPAKAI</span>";
                $tombol =
                    "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='edit_buka(\"" . $page_data[$i]->id_ruangan . "\",\"" . $page_data[$i]->tipe . "\")' '><i class='icon-lock '></i></button>";
            }

            $no = $i + 1;
            $tombol = $tombol;
            $kelas = $page_data[$i]->kelas_ruangan;
            $nama = $page_data[$i]->tipe;
            $status = $status;

            $out[$i] = array($no, $tombol, $status, $kelas, $nama);
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
    public function informasi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Informasi_kamar';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_ruangan()
    {
        $page_data = $this->M_Admin_kamar->selectRuang();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
           
            $no = $i + 1;
            $ruang = $page_data[$i]->namaruang;
            $lantai = $page_data[$i]->lantai;
            $kapasitas = $page_data[$i]->kapasitas;
            $tersedia = $page_data[$i]->tersedia;
            $pria = $page_data[$i]->pria;
            $wanita = $page_data[$i]->wanita;
            

            $out[$i] = array($no, $ruang, $lantai, $kapasitas, $tersedia,$pria,$wanita);
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
