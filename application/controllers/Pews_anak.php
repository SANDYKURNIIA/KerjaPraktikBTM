<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pews_anak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_IGD');
        $this->load->model('M_Erm');
        $this->load->model('M_Assembling');
        $this->load->model('M_Poli');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Erm_ranap');
        $this->load->model('M_Erm_masalah_kep');
        $this->load->model('M_Pasien');
        $this->load->library('session');
        $this->load->model('M_Pews_Anak');
    }
    public function pewsAnak($id_pelayanan = null, $id_history)
    {
        $data_pasien = $this->M_Pews_Anak->selectDataPasien($id_pelayanan);
        $staff = $this->session->userdata('data_auth');

        $page_data['staff'] = $staff->id_staff;


        $page_data['gambar']       = base_url("assets/dist/img/orang1.png");
        $page_data['page_content'] = 'page_content/pews_anak.php';
        $page_data['data']         = $data_pasien;

        // $page_data['no_rm']        = $data_pasien->no_rm;

        $page_data['riwayat'] = $this->M_Pews_Anak->getRiwayatPews($id_pelayanan);

        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history']   = $id_history;

        $this->load->view('assets/_header');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function get_data_pws()
    {
        $id = $this->input->post('id', true);

        $data = $this->M_Pews_Anak->get_data_pws($id);

        if ($data) {
            echo json_encode([
                'status' => 'found',
                'data' => $data
            ]);
        } else {
            echo json_encode([
                'status' => 'not found'
            ]);
        }
    }
    public function simpan()
    {
        $tgl = date("Y-m-d H:i:s"); // gunakan H (24 jam)

        // Ambil data staff dari session
        $staff = $this->session->userdata('data_auth')->id_staff;

        // Ambil nilai skor (misal dari perhitungan JS atau backend)
        $skor = $this->input->post('skor');
        $tipe_resiko = $this->input->post('tipe_resiko');

        $data = [
            'id_pelayanan'   => $this->input->post('id_pelayanan'),
            'id_history'     => $this->input->post('id_history'),
            'no_rm'          => $this->input->post('no_rm'),
            'perilaku'       => $this->input->post('perilaku'),
            'kardiovaskular' => $this->input->post('kardiovaskular'),
            'respirasi'      => $this->input->post('respirasi'),
            'skor'           => $skor,
            'tanggal'        => $tgl,
            'jam'            => $this->input->post('jam'),
            'id_staff'       => $staff
        ];

        // Simpan data via model
        $this->M_Pews_Anak->simpanData($data);

        // Response ke AJAX
        $this->session->set_flashdata('success', 'Data Pengisian Awal MCU berhasil disimpan.');
        echo json_encode(['status' => 'success']);
    }
    public function update()
    {
        $tgl = date("Y-m-d H:i:s"); // format 24 jam

        // Ambil data staff dari session
        $staff = $this->session->userdata('data_auth')->id_staff;

        // Ambil nilai skor dan tipe resiko dari POST
        $skor = $this->input->post('skor');
        $tipe_resiko = $this->input->post('tipe_resiko');

        // ID data PEWS yang mau diupdate
        $id_pws = $this->input->post('id_pws');

        if (!$id_pws) {
            echo json_encode([
                'status' => 'error',
                'message' => 'ID data PEWS tidak ditemukan.'
            ]);
            return;
        }

        $data = [
            'perilaku'       => $this->input->post('perilaku'),
            'kardiovaskular' => $this->input->post('kardiovaskular'),
            'respirasi'      => $this->input->post('respirasi'),
            'skor'           => $skor,
            'jam'            => $this->input->post('jam'),
            'tanggal'        => $tgl,
            'id_staff'       => $staff
        ];

        // Panggil model untuk update
        $update = $this->M_Pews_Anak->update($id_pws, $data);

        if ($update) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data berhasil diperbarui.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal memperbarui data.'
            ]);
        }
    }
    public function hapus()
    {
        $id_pws = $this->input->post('id_pws', true);

        if (!$id_pws) {
            echo json_encode([
                'status' => 'error',
                'message' => 'ID data PEWS tidak ditemukan.'
            ]);
            return;
        }

        // eksekusi hapus via model
        $hapus = $this->M_Pews_Anak->hapus($id_pws);

        if ($hapus) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data berhasil dihapus.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menghapus data.'
            ]);
        }
    }
}
