<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medikasi_pasien_icu extends CI_Controller
{
    private $user;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('M_Erm');
        $this->load->model('M_Medikasi_pasien_icu');
        $this->load->model('M_Pencarian_Pasien');

        // Guard login, hentikan eksekusi sebelum ada output apa pun
        $u = $this->session->userdata('data_auth');
        if (!$u) {
            redirect('auth/login', 'refresh');
            exit;
        }
        // Pastikan bentuknya object
        $this->user = is_array($u) ? (object)$u : $u;
    }

    // Form utama
    public function formMedikasi($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm->selectDataPasienbyid($id_pelayanan, $id_history);
        if (!$selectPasien) {
            show_error('Data pasien tidak ditemukan.', 404);
            return;
        }

        $page_data = [
            'nama'          => $selectPasien->nama ?? '',
            'tgl_lahir'     => $selectPasien->tgl_lahir ?? '',
            'jenis_kelamin' => $selectPasien->jenis_kelamin ?? '',
            'cara_bayar'    => $selectPasien->cara_bayar ?? '',
            'tgl_masuk'     => $selectPasien->tgl_masuk ?? '',
            'no_rm'         => $selectPasien->no_rm ?? '',
            'id_pelayanan'  => $id_pelayanan,
            'id_history'    => $id_history,
            'staff'         => $this->user->username ?? '',
            // data medikasi
            'data_medikasi' => $this->M_Medikasi_pasien_icu->getByPelayanan($id_pelayanan, $id_history),
            // view content
            'page_content'  => 'erm_form/Ranap/view_medikasi_pasien_icu',
        ];

        $this->load->view('assets/_header');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    // Simpan ke database
    public function simpan()
    {
        // Guard minimal
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history   = $this->input->post('id_history');
        if (!$id_pelayanan || !$id_history) {
            show_error('Parameter tidak lengkap.', 400);
            return;
        }

        $data = [
            'id_pelayanan' => $id_pelayanan,
            'id_history'   => $id_history,
            'no_rm'        => $this->input->post('no_rm'),
            'jenis_obat'   => $this->input->post('jenis_obat'),
            'frekuensi'    => $this->input->post('frekuensi'),
            'tanggal'      => $this->input->post('tanggal'),
            'jam'          => $this->input->post('jam'),
            'staff'        => $this->user->username ?? $this->input->post('staff'),
        ];

        $this->M_Medikasi_pasien_icu->insert($data);
        redirect('Medikasi_pasien_icu/formMedikasi/' . $id_pelayanan . '/' . $id_history);
        exit;
    }

    // Hapus data
    public function hapus($id, $id_pelayanan, $id_history)
    {
        $this->M_Medikasi_pasien_icu->delete($id);
        redirect('Medikasi_pasien_icu/formMedikasi/' . $id_pelayanan . '/' . $id_history);
        exit;
    }

    // Ambil data medikasi berdasarkan id, untuk AJAX
    public function get_medikasi_by_id()
    {
        $id = $this->input->post('id');
        $data = $this->M_Medikasi_pasien_icu->getById($id);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data ?: []));
    }

    // Update data
    public function update()
    {
        $id           = $this->input->post('id_medikasi');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history   = $this->input->post('id_history');

        if (!$id || !$id_pelayanan || !$id_history) {
            show_error('Parameter tidak lengkap.', 400);
            return;
        }

        $data = [
            'jenis_obat' => $this->input->post('jenis_obat'),
            'frekuensi'  => $this->input->post('frekuensi'),
            'tanggal'    => $this->input->post('tanggal'),
            'jam'        => $this->input->post('jam'),
        ];

        $this->M_Medikasi_pasien_icu->update($id, $data);
        redirect('Medikasi_pasien_icu/formMedikasi/' . $id_pelayanan . '/' . $id_history);
        exit;
    }
}
