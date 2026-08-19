<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OneDayCare extends CI_Controller
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
        $this->load->model('OneDayCare_model');
        $this->load->model('M_Pasien');
    }

    /**
     * Halaman form utama OneDayCare
     */
    public function decer($id_pelayanan = null, $id_history = null)
    {
        if ($id_pelayanan === null) {
            show_error("ID Pelayanan tidak ditemukan.", 404);
        }

        $data_pasien    = $this->OneDayCare_model->selectDataPasien($id_pelayanan);
        if (!$data_pasien) {
            show_error("Data pasien dengan ID Pelayanan $id_pelayanan tidak ditemukan.", 404);
        }

        $data_oneday = $this->OneDayCare_model->get_onedaycare_by_rm($data_pasien->no_rm);

        $data_pemeriksaan = $this->OneDayCare_model->get_pemeriksaan_fisik_by_rm($data_pasien->no_rm);

        $page_data['gambar']       = base_url("assets/dist/img/orang1.png");
        $page_data['page_content'] = 'page_content/OneDayCare';
        $page_data['data']         = $data_pasien;
        $page_data['data_oneday']  = $data_oneday;
        $page_data['pemeriksaan_fisik'] = $data_pemeriksaan;
        $page_data['no_rm'] = $data_pasien->no_rm;

        // ✅ pastikan id ikut dikirim
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history']   = $id_history;

        $this->load->view('assets/_header');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    /**
     * Halaman index by No RM (opsional)
     */
    public function index($no_rm = null)
    {
        if ($no_rm === null) {
            show_error("Nomor Rekam Medis tidak ditemukan.", 404);
        }

        $pasien_data = $this->M_Pasien->get_pasien_by_rm($no_rm);
        if (!$pasien_data) {
            show_404();
        }

        $merged_data   = $this->OneDayCare_model->get_pasien_with_onedaycare($no_rm);
        $data['data']  = $merged_data;

        $this->load->view('OneDayCare', $data);
    }

    /**
     * Simpan data dari form
     */
    public function simpan()
    {
        $input = $this->input->post(NULL, TRUE);

        if (empty($input['no_rm'])) {
            echo json_encode([
                'status'  => 'error',
                'message' => 'No. RM wajib diisi!',
            ]);
            return;
        }

        $data_onedaycare = [
            'no_rm'                       => $input['no_rm'],
            'anamnesa'                    => $input['anamnesa'] ?? NULL,
            'riwayat_penyakit_sebelumnya' => $input['riwayat_penyakit_sebelumnya'] ?? NULL,
            'pengobatan_sebelumnya'       => $input['pengobatan_sebelumnya'] ?? NULL,
            'pemeriksaan_fisik'           => $input['pemeriksaan_fisik'] ?? NULL,
            'hasil_labor'                 => $input['hasil_labor'] ?? NULL,
            'therapi'                     => $input['therapi'] ?? NULL,
            'pemantauan'                  => $input['pemantauan'] ?? NULL,
            'anjuran'                     => $input['anjuran'] ?? NULL,
        ];

        $data_pemeriksaan = [
            'no_rm'                       => $input['no_rm'],
            'tekanan_darah'               => $input['tekanan_darah'] ?? NULL,
            'suhu'                        => $input['suhu'] ?? NULL,
            'nadi'                        => $input['nadi'] ?? NULL,
            'berat_badan'                 => $input['berat_badan'] ?? NULL,
            'pernapasan'                  => $input['pernapasan'] ?? NULL,
            'tinggi_badan'                => $input['tinggi_badan'] ?? NULL,
        ];

        $success_oneday = $this->OneDayCare_model->simpan_onedaycare($data_onedaycare);
        $success_fisik  = $this->OneDayCare_model->simpan_pemeriksaan_fisik($data_pemeriksaan);

        // Cek hasil
        if ($success_oneday && $success_fisik) {
            echo json_encode([
                'status'  => 'success',
                'message' => 'Data One Day Care & Pemeriksaan Fisik berhasil disimpan!',
                'redirect_url' => base_url('erm_ranap/form/'
                    . urlencode(base64_encode($input['id_pelayanan']))
                    . '/'
                    . urlencode(base64_encode($input['id_history'])))
            ]);
        } else {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Gagal menyimpan data! Periksa koneksi database atau log server.'
            ]);
        }
    }


    /**
     * Cetak data OneDayCare
     */
    public function cetak($id_pelayanan = null, $id_history = null)
    {
        if (!$id_pelayanan) {
            show_error("ID Pelayanan tidak ditemukan", 404);
        }

        $data_pasien = $this->OneDayCare_model->selectDataPasien($id_pelayanan);
        $dokter = $this->OneDayCare_model->get_dokter_by_pelayanan_pasien($id_pelayanan);
        $data_oneday = $this->OneDayCare_model->get_onedaycare_by_rm($data_pasien->no_rm);
        $data_fisik  = $this->OneDayCare_model->get_pemeriksaan_fisik_by_rm($data_pasien->no_rm);

        $data = [
            'data'              => $data_pasien,
            'data_oneday'       => $data_oneday,
            'pemeriksaan_fisik' => $data_fisik,
            'nama_dokter' => $dokter['nama_dokter']
        ];

        $this->load->view('page_content/Cetak', $data);
    }
}
