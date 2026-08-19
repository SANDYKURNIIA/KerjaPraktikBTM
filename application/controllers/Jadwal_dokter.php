<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Jadwal_dokter');
    }

    //INI KODE LAMA/FUNCTIONNN
    // public function jadwal_dokter()
    // {
    //     $this->load->view('assets/_header');
    //     $page_data['spes'] = $this->db->get('list_poli')->result_array();
    //     $page_data['page_content'] = 'page_content/Jadwal_dokter';
    //     $this->load->view('Main', $page_data);
    //     $this->load->view('assets/_footer');
    // }
        
    public function jadwal_dokter()
    {
        $this->load->view('assets/_header');

        // ambil hanya poli dengan status_dokter = ADA
        $this->db->select('id_list_poli,kdpoli_bpjs, nama_panjang');
        $this->db->from('list_poli');
        $this->db->where('status_dokter', 'ADA');
        $this->db->order_by('nama_panjang', 'ASC');
        $page_data['spes'] = $this->db->get()->result_array();

        $page_data['page_content'] = 'page_content/Jadwal_dokter';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function tampil_jadwal_dokter()
    {
        $page_data = $this->M_Jadwal_dokter->selectJadwalDokter();
        $out = [];

        for ($i = 0; $i < count($page_data); $i++) {
            $edit = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_jadwal_dokter(\"" . $page_data[$i]->id_dokter . "\")'><i class='icon-pencil'></i></a>";

            $no = $i + 1;
            $out[$i] = [
                $no,
                $edit,
                $page_data[$i]->nama,
                $page_data[$i]->dokter_spes,
                $page_data[$i]->nama_panjang,
                $page_data[$i]->kode_dokter,
                $page_data[$i]->status,
            ];
        }

        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    // Jadwal Per Dokter (percobaan)
    public function tampil_jadwal_perdokter()
    {
        $id_dokter = $this->input->post('id_dokter');
        $page_data = $this->M_Jadwal_dokter->selectJadwalPerdokter($id_dokter);
        $out = [];

        for ($i = 0; $i < count($page_data); $i++) {
            $edit = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_jadwalPerDokter(\"" . $page_data[$i]->id_jadwal . "\")'><i class='fa fa-pencil'></i></button>";
            $delete = "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='delete_jadwal_dokter(\"" . $page_data[$i]->id_jadwal . "\")'><i class='fa fa-trash'></i></a>";

            $no = $i + 1;
            $out[$i] = [
                $no,
                $delete,
                $edit,
                $page_data[$i]->hari,
                $page_data[$i]->jam_mulai,
                $page_data[$i]->jam_selesai,
                $page_data[$i]->status,
                $page_data[$i]->id_staff,
            ];
        }

        if (empty($out)) {
            echo '{"data":""}';
            exit;
        }

        $data['data'] = $out;
        echo json_encode($data);
        exit;
    }

    public function getDataJadwalPerDokter()
    {
        $id_jadwal = $this->input->post('id_jadwal');
        $db = $this->M_Jadwal_dokter->selectDataJadwalPerDokter($id_jadwal);

        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = ['status_dt' => 'not found'];
        }

        echo json_encode($db);
        exit;
    }

    public function update_jadwal_perdokter()
    {
        $data = [
            'hari' => $this->input->post('hari'),
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_selesai' => $this->input->post('jam_selesai'),
            'status' => $this->input->post('status'),
        ];

        $where = ['id_jadwal' => $this->input->post('id_jadwal')];

        $this->M_Jadwal_dokter->update($data, $where, 'jadwal_dokter_lokal');

        echo json_encode(['status' => 'success']);
    }

    public function delete_jadwal_perdokter()
    {
        $id_jadwal = $this->input->post('id_jadwal');
        $this->M_Jadwal_dokter->delete_jadwal_perdokter($id_jadwal, 'id_jadwal', 'jadwal_dokter_lokal');

        echo json_encode(['status' => 'success']);
    }

    public function insert_jadwal_perdokter()
    {
        $data_staff = $this->session->userdata('data_auth');

        $jadwal = [
            'id_dokter' => $this->input->post('id_dokter'),
            'id_jadwal' => $this->input->post('id_jadwal'),
            'hari' => $this->input->post('hari'),
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_selesai' => $this->input->post('jam_selesai'),
            'status' => $this->input->post('status'),
            'id_staff' => $data_staff->id_staff,
        ];

        $this->M_Jadwal_dokter->insert_jadwal_perdokter($jadwal, 'jadwal_dokter_lokal');

        echo json_encode(['status' => 'success']);
    }

    public function insert_dokter()
    {
        $data_staff = $this->session->userdata('data_auth');

        $this->form_validation->set_rules('nama', 'Dokter', 'required');

        if ($this->form_validation->run()) {
            $id_dokter = uniqid();
            $nama = $this->input->post('nama');
            $dokter_spes = $this->input->post('dokter_spes');
            $kode_dokter = $this->input->post('kode_dokter');

            $nip = $this->input->post('username');
            $nik = $this->input->post('nik');

            $dokter = [
                'id_dokter' => $id_dokter,
                'nama' => $nama,
                'kode_dokter' => $kode_dokter,
                'dokter_spes' => $dokter_spes,
                'status' => 'AKTIF',
                'username' => $nip,
                'nik' => $nik,
            ];

            // insert data dokter baru
            $insert_result = $this->M_Jadwal_dokter->insert_jadwal_dokter($dokter, 'dokter');

            if ($insert_result) {
                // cari 1 dokter lain dengan spesialis sama
                $this->db->where('dokter_spes', $dokter_spes);
                $this->db->where('id_dokter !=', $id_dokter);
                $this->db->limit(1);
                $query = $this->db->get('dokter');

                if ($query->num_rows() > 0) {
                    $row = $query->row();

                    // copy 15 kolom jasmed & rs
                    $update_data = [
                        'jasmed_pp_pagi' => $row->jasmed_pp_pagi,
                        'jasmed_pp_sore' => $row->jasmed_pp_sore,
                        'jasmed_asuransi_pagi' => $row->jasmed_asuransi_pagi,
                        'jasmed_asuransi_sore' => $row->jasmed_asuransi_sore,
                        'jasmed_bpjs_pagi' => $row->jasmed_bpjs_pagi,
                        'jasmed_bpjs_sore' => $row->jasmed_bpjs_sore,
                        'jasmed_timah_pagi' => $row->jasmed_timah_pagi,
                        'jasmed_timah_sore' => $row->jasmed_timah_sore,
                        'rs_pp_pagi' => $row->rs_pp_pagi,
                        'rs_pp_sore' => $row->rs_pp_sore,
                        'rs_asuransi_pagi' => $row->rs_asuransi_pagi,
                        'rs_asuransi_sore' => $row->rs_asuransi_sore,
                        'rs_timah_pagi' => $row->rs_timah_pagi,
                        'rs_timah_sore' => $row->rs_timah_sore,
                        'rs_bpjs' => $row->rs_bpjs,
                    ];

                    // update dokter baru
                    $this->db->where('id_dokter', $id_dokter);
                    $this->db->update('dokter', $update_data);
                }

                $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
                $out = ['status' => 'success', 'message' => 'Data berhasil disimpan!'];
            } else {
                $out = ['status' => 'error', 'message' => 'Gagal menyimpan data ke database. Cek model dan koneksi database.'];
            }
        } else {
            $out = ['status' => 'error', 'message' => validation_errors()];
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
            $db = ['status_dt' => 'not found'];
        }

        echo json_encode($db);
        exit;
    }

    public function edit_jadwal_dokter()
    {
        $data_staff = $this->session->userdata('data_auth');
        $id_dokter = uniqid();
        $nama = $this->input->post('nama');
        $dokter_spes = $this->input->post('dokter_spes');

        $dokter = [
            'id_dokter' => $id_dokter,
            'nama' => $nama,
            'dokter_spes' => $dokter_spes,
            'status' => 'AKTIF',
        ];

        $this->M_Jadwal_dokter->update_jadwal_dokter($dokter, 'dokter');

        $data = [
            'id_dokter' => $id_dokter,
            'id_staff' => $data_staff->id_staff,
            'status' => 'AKTIF',
        ];

        $this->M_Jadwal_dokter->update_jadwal_dokter($id_dokter, $data);

        echo json_encode(['status' => 'success']);
    }
}