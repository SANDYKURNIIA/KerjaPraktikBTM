<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Erm_robson extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_robson');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
    }

    public function form($id_pelayanan, $id_histori)
    {
        $this->load->model('M_Erm_ranap');
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_histori);

        $data['id_pelayanan'] = $id_pelayanan;
        $data['id_histori'] = $id_histori;
        $data['no_rm'] = $selectPasien->no_rm;
        $data['nama'] = $selectPasien->nama;
        $data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $data['tgl_masuk'] = $selectPasien->tgl_masuk;
        $data['nama_dokter'] = $selectPasien->nama_dokter;

        $existing = $this->M_robson->get_data($id_pelayanan, $id_histori);
        $data['robson'] = !empty($existing) ? $existing : [];

        // Ambil daftar dokter yang BUKAN spesialis UMU dan berstatus AKTIF
        $data['list_dpjp'] = $this->M_robson->get_list_dpjp();

        $data['url_kembali'] = base_url('Erm_ranap/form/' . urlencode(base64_encode($id_pelayanan)) . '/' . urlencode(base64_encode($id_histori)));

        $this->load->view('assets/_header');
        $data['page_content'] = 'erm_form/Ranap/view_robson';
        $this->load->view('Main', $data);
        $this->load->view('assets/_footer');
    }

    public function save()
    {
        // Set header HTTP response sebagai JSON
        header('Content-Type: application/json');

        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_histori = $this->input->post('id_histori');

        // Ambil data staff yang sedang login
        $staff = $this->session->userdata('data_auth');
        $id_staff = $staff->id_staff;

        // Validasi input
        $this->form_validation->set_rules('gravida', 'Gravida', 'required|numeric');
        $this->form_validation->set_rules('paritas', 'Paritas', 'required|numeric');
        $this->form_validation->set_rules('abortus', 'Abortus', 'required|numeric');
        $this->form_validation->set_rules('usia_kehamilan', 'Usia Kehamilan', 'required|numeric');
        $this->form_validation->set_rules('letak_janin', 'Letak Janin', 'required');
        $this->form_validation->set_rules('riwayat_sc_sebelumnya', 'Riwayat SC Sebelumnya', 'required');
        $this->form_validation->set_rules('indikasi_medis_sc', 'Indikasi Medis SC', 'required');
        $this->form_validation->set_rules('tanggal_tindakan', 'Tanggal Tindakan', 'required');
        $this->form_validation->set_rules('dpjp_operator', 'DPJP Operator', 'required');

        // Jika Validasi Gagal
        if ($this->form_validation->run() == FALSE) {
            echo json_encode([
                'status' => false,
                'message' => validation_errors('<div class="alert alert-danger">', '</div>')
            ]);
            return;
        }

        // Jika Validasi Berhasil, Susun Data
        $save_data = [
            'id_pelayanan' => $id_pelayanan,
            'id_histori' => $id_histori,
            'id_staff' => $id_staff,
        ];

        // A. Identitas Pasien
        $fields_a = [
            'gravida',
            'paritas',
            'abortus',
            'usia_kehamilan',
            'letak_janin',
            'riwayat_sc_sebelumnya',
            'indikasi_medis_sc',
            'tanggal_tindakan',
            'dpjp_operator'
        ];
        foreach ($fields_a as $f) {
            $save_data[$f] = $this->input->post($f);
        }

        // B. Robson Group (1 - 10)
        for ($i = 1; $i <= 10; $i++) {
            $save_data['b' . $i . '_ya'] = $this->input->post('b' . $i . '_ya');
            $save_data['b' . $i . '_keterangan'] = $this->input->post('b' . $i . '_keterangan');
        }

        // C. Indikasi SC (1 - 10)
        for ($i = 1; $i <= 10; $i++) {
            $save_data['c' . $i . '_ya'] = $this->input->post('c' . $i . '_ya');
            $save_data['c' . $i . '_keterangan'] = $this->input->post('c' . $i . '_keterangan');
        }

        // D. Kesimpulan
        $save_data['indikasi_sc'] = $this->input->post('indikasi_sc');
        $save_data['kelompok_robson'] = $this->input->post('kelompok_robson');
        $save_data['catatan_tambahan'] = $this->input->post('catatan_tambahan');

        // Simpan ke Database via Model
        $insert = $this->M_robson->save($save_data);

        if ($insert) {
            echo json_encode(['status' => true, 'message' => 'Data Robson berhasil disimpan!']);
        } else {
            echo json_encode(['status' => false, 'message' => '<div class="alert alert-danger">Gagal menyimpan data ke database.</div>']);
        }
    }
    public function cetak($id_pelayanan, $id_histori)
    {
        $robson = $this->M_robson->get_data($id_pelayanan, $id_histori);
        if (empty($robson)) {
            show_404();
        }
        $this->load->model('M_Erm_ranap');
        $pasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_histori);
        $this->load->view('erm_ranap_print/cetak_robson', [
            'robson' => $robson,
            'pasien' => $pasien,
        ]);
    }
}