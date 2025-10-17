<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assesmen_Rehab extends CI_Controller
{
    private $DEBUG_MODE = true;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');

        $this->load->database();
        $this->load->helper(['url', 'form']);
        $this->load->library('session');

        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_assesmen_rehab');
        $this->load->model('M_Pasien');
    }

    private function maybe_decode($s)
    {
        if ($s === null) return null;
        $raw = urldecode($s);
        $d = @base64_decode($raw, true);
        if ($d !== false && $d !== '' && $d !== $raw) {
            return $d;
        }
        return $s;
    }

    private function extract_numeric_id($s)
    {
        if ($s === null) return 0;
        return (int) filter_var($s, FILTER_SANITIZE_NUMBER_INT);
    }

    private function normalize_pelayanan_id($id)
    {
        if (strpos($id, 'pl_') === 0) return $id;
        if (is_numeric($id)) return 'pl_' . $id;
        return $id;
    }

    private function normalize_history_id($id)
    {
        if (empty($id)) return null;
        if (strpos($id, 'his_') === 0) return $id;
        if (is_numeric($id)) return 'his_' . $id;
        return $id;
    }

    private function debug_and_exit($msg, $data = [])
    {
        log_message('error', $msg . ' | ' . json_encode($data));
        if ($this->DEBUG_MODE) {
            echo '<div style="font-family:Arial,Helvetica,sans-serif;padding:20px;">';
            echo '<h2 style="color: #c00;">DEBUG: ' . htmlentities($msg) . '</h2>';
            echo '<pre style="background:#f5f5f5;border:1px solid #ddd;padding:10px;">';
            print_r($data);
            echo '</pre>';
            echo '<p style="color: #666;">(Set $this->DEBUG_MODE = false setelah perbaikan)</p>';
            echo '</div>';
            exit;
        } else {
            show_error($msg, 404);
        }
    }

    public function form($id_pelayanan_raw = null, $id_histori_raw = null, $jenis_pelayanan = null)
    {
        if (!$id_pelayanan_raw) show_error('ID Pelayanan tidak ditemukan.', 400);

        $id_pelayanan_decoded = $this->maybe_decode($id_pelayanan_raw);
        $id_histori_decoded   = $this->maybe_decode($id_histori_raw);

        $id_pelayanan_key = $this->normalize_pelayanan_id($id_pelayanan_decoded);
        $id_histori_key   = $this->normalize_history_id($id_histori_decoded);

        $pelayanan = $this->db
            ->where('id_pelayanan', $id_pelayanan_key)
            ->get('pelayanan')
            ->row_array();

        if (empty($pelayanan)) {
            $this->debug_and_exit('Data pelayanan tidak ditemukan.', [
                'id_pelayanan_raw' => $id_pelayanan_raw,
                'id_pelayanan_key' => $id_pelayanan_key,
                'id_histori_key'   => $id_histori_key
            ]);
        }

        $id_pasien = $pelayanan['id_pasien'] ?? null;
        $no_rm = $pelayanan['no_rm'] ?? null;
        $pasien = null;

        if (!empty($id_pasien)) {
            $pasien = $this->M_Pencarian_Pasien->getDataPasienById($id_pasien);
            if (is_object($pasien)) $pasien = (array) $pasien;
        }

        if (empty($pasien) && !empty($no_rm)) {
            $pasien = $this->M_pasien->getPasienById($no_rm);
        }

        if (empty($pasien)) {
            $this->debug_and_exit('Data pasien tidak ditemukan.', [
                'pelayanan' => $pelayanan
            ]);
        }

        // --- ambil nama dokter DPJP ---
        $nama_dokter = '';
        if (!empty($id_histori_key)) {
            $dok = $this->M_Pencarian_Pasien->getNamaDokter($id_histori_key);
            if (!empty($dok->nama_dokter)) {
                $nama_dokter = $dok->nama_dokter;
            }
        } elseif (!empty($pelayanan['id_dokter'])) {
            $dok2 = $this->db
                ->select('nama AS nama_dokter')
                ->from('dokter')
                ->where('id_dokter', $pelayanan['id_dokter'])
                ->get()
                ->row();
            if (!empty($dok2->nama_dokter)) {
                $nama_dokter = $dok2->nama_dokter;
            }
        }

        // --- ambil data assesmen ---
        $assesmen = $this->M_assesmen_rehab->getAssesmenByPelayanan($id_pelayanan_key, $id_histori_key);

        // --- kirim ke view ---
        $data = [
            'pasien'          => $pasien,
            'id_pelayanan'    => $id_pelayanan_key,
            'id_histori'      => $id_histori_key,
            'jenis_pelayanan' => $jenis_pelayanan,
            'poli'            => '',
            'nama_dokter'     => $nama_dokter,
            'assesmen'        => $assesmen,
            'no_rm'           => $pelayanan['no_rm'] ?? ($pasien['no_rm'] ?? $no_rm)
        ];  

        $this->load->view('erm_form/view_assesmen_rehab', $data);
    }

    public function print_assesmen($id_pelayanan_raw = null)
    {
        if (!$id_pelayanan_raw) {
            show_error('ID pelayanan tidak ditemukan.', 400);
        }

        $id_pelayanan_decoded = $this->maybe_decode($id_pelayanan_raw);
        $id_pelayanan_key = $this->normalize_pelayanan_id($id_pelayanan_decoded);

        $assesmen = $this->M_assesmen_rehab->getAssesmenByPelayanan($id_pelayanan_key);

        if (!$assesmen) {
            show_error('Data assesmen tidak ditemukan.', 404);
        }

        $pasien = $this->db->get_where('pasien', ['no_rm' => $assesmen->no_rm])->row_array();
        $nama_dokter = '';

        if (!empty($assesmen->id_histori)) {
            $id_histori_key = $this->normalize_history_id($assesmen->id_histori);
            $dok = $this->M_Pencarian_Pasien->getNamaDokter($id_histori_key);
            if (!empty($dok->nama_dokter)) {
                $nama_dokter = $dok->nama_dokter;
            }
        }

        $data = [
            'assesmen'       => $assesmen,
            'no_rm'          => $pasien['no_rm'] ?? '',
            'nama'           => $pasien['nama'] ?? '',
            'jenis_kelamin'  => $pasien['jenis_kelamin'] ?? '',
            'tgl_lahir'      => $pasien['tgl_lahir'] ?? '',
            'alamat'         => $pasien['alamat'] ?? '',
            'nama_dokter'    => $nama_dokter,
            'id_histori'     => $assesmen->id_histori ?? '',
        ];

        $this->load->view('erm_print/assesmen_rehab', $data);
    }

    public function simpan_form()
    {
        if ($this->input->method() !== 'post') {
            show_error('Metode tidak diizinkan.', 405);
            return;
        }

        $data = [
            'id_pelayanan'          => $this->input->post('id_pelayanan'),
            'id_histori'            => $this->input->post('id_histori'),
            'no_rm'                 => $this->input->post('no_rm'),
            'tanggal'               => $this->input->post('tanggal'),
            'subjective'            => $this->input->post('subjective'),
            'objective'             => $this->input->post('objective'),
            'assessment'            => $this->input->post('assessment'),
            'goal_treatment'        => $this->input->post('goal_treatment'),
            'tindakan_rehab'        => $this->input->post('tindakan_rehab'),
            'edukasi'               => $this->input->post('edukasi'),
            'frekuensi_kunjungan'   => $this->input->post('frekuensi_kunjungan'),
            'rencana_tindak_lanjut' => $this->input->post('rencana_tindak_lanjut'),
            'created_at'            => date('Y-m-d H:i:s'),
            'updated_at'            => date('Y-m-d H:i:s')
        ];

        $cek = $this->M_assesmen_rehab->getAssesmenByPelayanan($data['id_pelayanan'], $data['id_histori']);

        if ($cek) {
            $this->M_assesmen_rehab->updateAssesmen($cek->id_assesmen, $data);
        } else {
            $this->M_assesmen_rehab->insertAssesmen($data);
        }

        // ✅ Tambahan kecil agar setelah simpan bisa reload form edit
        $redirect_url = site_url('Assesmen_Rehab/form/' . $data['id_pelayanan'] . '/' . $data['id_histori'] . '/POLI');
        echo json_encode([
            'status' => 'success',
            'redirect' => $redirect_url
        ]);
    }

public function form_edit($id_pelayanan = null, $id_histori = null, $jenis_pelayanan = null)
{
    // Ambil data assesmen berdasarkan id_histori
    $assesmen = $this->M_assesmen_rehab->get_by_histori($id_histori);

    if (!$assesmen) {
        show_error("Data assesmen tidak ditemukan untuk ID histori: {$id_histori}");
        return;
    }

    // Redirect ke form utama
    redirect("Assesmen_Rehab/form/{$id_pelayanan}/{$id_histori}/{$jenis_pelayanan}");
}


}

