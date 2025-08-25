<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_dokter extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Jadwal_dokter');
    }



    public function jadwal_dokter()
    {

        $this->load->view('assets/_header');
        $page_data['spes']=$this->db->get('list_poli')->result_array();
        $page_data['page_content'] = 'page_content/Jadwal_dokter';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_jadwal_dokter()
    {
        $page_data = $this->M_Jadwal_dokter->selectJadwalDokter();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_jadwal_dokter(\"" . $page_data[$i]->id_dokter .  "\")'><i class='icon-pencil'></i></a>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $dokter_spes = $page_data[$i]->dokter_spes;
            $nama_panjang = $page_data[$i]->nama_panjang;
            $kode_dokter = $page_data[$i]->kode_dokter;
            $status = $page_data[$i]->status;

            $out[$i] = array($no, $edit,  $nama, $dokter_spes, $nama_panjang, $kode_dokter, $status);
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    //Jadwal Per dokter ( percobaan )

    public function tampil_jadwal_Perdokter()
    {
        $id_dokter = $this->input->post('id_dokter');
        $page_data = $this->M_Jadwal_dokter->selectJadwalPerdokter($id_dokter);
        $out = null;
        for (
            $i = 0;
            $i < count($page_data);
            $i++
        ) {
            $edit = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_jadwalPerDokter(\"" . $page_data[$i]->id_jadwal . "\")'><i class='fa fa-pencil'></i></button>";

            $delete =  "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='delete_jadwal_dokter(\"" . $page_data[$i]->id_jadwal .  "\")'><i class='fa fa-trash'></i></a>";

            $no = $i + 1;
            // $id_dokter = $page_data[ $i ]->id_dokter;
            $id_jadwal = $page_data[ $i ]->id_jadwal;
            $hari = $page_data[$i]->hari;
            $jam_mulai = $page_data[$i]->jam_mulai;
            $jam_selesai = $page_data[$i]->jam_selesai;
            $status = $page_data[$i]->status;
            $id_staff = $page_data[$i]->id_staff;

            $out[$i] = array($no, $delete,  $edit, $hari, $jam_mulai, $jam_selesai, $status, $id_staff);
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

    public function getDataJadwalPerDokter()
    {
        $id_jadwal = $this->input->post('id_jadwal');
        $db = $this->M_Jadwal_dokter->selectDataJadwalPerDokter($id_jadwal);

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

    public function update_jadwal_perdokter()
    {
        $data = array(
            'hari' => $this->input->post('hari'),
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_selesai' => $this->input->post('jam_selesai'),
            'status' => $this->input->post('status'),
        );
        $where = array(
            'id_jadwal' => $this->input->post('id_jadwal')
        );
        $this->M_Jadwal_dokter->update($data, $where, 'jadwal_dokter_lokal');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function delete_jadwal_perdokter()
    {
        $id_jadwal = $this->input->post('id_jadwal');
        $this->M_Jadwal_dokter->delete_jadwal_perdokter($id_jadwal, 'id_jadwal', 'jadwal_dokter_lokal');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function insert_jadwal_perdokter()
    {
        $data_staff = $this->session->userdata('data_auth');
        $id_jadwal = $this->input->post('id_jadwal');
        $id_dokter = $this->input->post('id_dokter');
        $hari = $this->input->post('hari');
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_selesai = $this->input->post('jam_selesai');
        $status = $this->input->post('status');
        //$id_jadwal =  uniqid();

        $jadwal = array(
            'id_dokter' => $id_dokter,
            'id_jadwal' => $id_jadwal,
            'hari' => $hari,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
            'status' => $status,
            'id_staff' => $data_staff->id_staff,
        );
        $this->M_Jadwal_dokter->insert_jadwal_perdokter($jadwal, 'jadwal_dokter_lokal');
        // $this->session->set_flashdata( 'pesan', 'Data berhasil disimpan' );
        $out['status'] = 'success';
        // // } else {
        //     $out = array(
        //         'status'   => 'error',
        // );
        // }

        echo json_encode($out);
    }

    public function insert_dokter()
    {
        $data_staff = $this->session->userdata('data_auth');
        $this->form_validation->set_rules('nama', 'Dokter', 'required');
        if ($this->form_validation->run()) {
            $nama = $this->input->post('nama');
            $dokter_spes = $this->input->post('dokter_spes');
            $kode_dokter = $this->input->post('kode_dokter');
            $id_dokter =  uniqid();

            $dokter = array(
                'id_dokter' => $id_dokter,
                'nama' => $nama,
                'kode_dokter' => $kode_dokter,
                'dokter_spes' => $dokter_spes,
                'status' => 'AKTIF',
            );
            $this->M_Jadwal_dokter->insert_jadwal_dokter($dokter, 'dokter');
            $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
            $out['status'] = 'success';
        } else {
            $out = array(
                'status'   => 'error',
            );
        }

        echo json_encode($out);
    }

    public function getDataJadwalDokter()
    {
        $id_dokter = $this->input->post('id_dokter');
        $db = $this->M_Jadwal_dokter->selectDataJadwalDokter($id_dokter);

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

    public function edit_jadwal_dokter()
    {
        $data_staff = $this->session->userdata('data_auth');
        $nama = $this->input->post('nama');
        $dokter_spes = $this->input->post('dokter_spes');
        $kode_dokter = $this->input->post('kode_dokter');
        $id_dokter =  uniqid();

        $dokter = array(
            'id_dokter' => $id_dokter,
            'nama' => $nama,
            'dokter_spes' => $dokter_spes,
            'status' => 'AKTIF',
        );
        $this->M_Jadwal_dokter->update_jadwal_dokter($dokter, 'dokter');

        $data = array(
            'id_dokter' => $id_dokter,
            'id_staff' => $data_staff->id_staff,
            'status' => 'AKTIF',
        );
        $this->M_Jadwal_dokter->update_jadwal_dokter($id_dokter, $data);
        $out['status'] = 'success';
        echo json_encode($out);
    }
}
