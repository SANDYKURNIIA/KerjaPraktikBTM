<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Implementasi_Perawatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->database();
        $this->load->model('M_Implementasi_perawatan');       
        $this->load->model('M_Lembar_uji_fungsi'); // ambil data pasien
        $this->load->helper(['url', 'security']);
    }

    /** 🔹 Dekode base64 jika ada */
    private function b64_unwrap($s)
    {
        if ($s === null) return null;
        $try = @base64_decode(urldecode($s), true);
        return ($try !== false && $try !== '') ? $try : $s;
    }

    /** 🔹 Ambil id_history terakhir berdasarka n id_pelayanan */
    private function resolve_id_history_by_pelayanan($id_pelayanan)
    {
        $row = $this->db->from('history_pelayanan')
            ->where('id_pelayanan', $id_pelayanan)
            ->where('status', 1)
            ->order_by('tgl_masuk', 'DESC')
            ->get()->row();

        if ($row) return $row->id_history;

        $row = $this->db->from('history_pelayanan')
            ->where('id_pelayanan', $id_pelayanan)
            ->order_by('tgl_masuk', 'DESC')
            ->get()->row();

        return $row ? $row->id_history : null;
    }

    /** 🔹 Tampilkan form implementasi perawatan */
    public function form($no_rm, $id_pelayanan, $id_history)
    {

        // $id_history = $this->resolve_id_history_by_pelayanan($id_pelayanan);

        $pasien = $this->M_Lembar_uji_fungsi->get_pasien_pelayanan_dpjp($no_rm, $id_pelayanan);

        var_dump($pasien);

        $page_data = [
            'no_rm'           => $pasien->no_rm,
            'nama'            => $pasien->nama,
            'tgl_lahir'       => $pasien->tgl_lahir,
            'alamat'          => $pasien->alamat,
            'jenis_kelamin'   => $pasien->jenis_kelamin,
            'tgl_pemeriksaan' => $pasien->tgl_pemeriksaan,
            'id_pelayanan'    => $id_pelayanan,
            'id_history'      => $id_history,
        ];

        // 🔹 Ambil data tersimpan sebelumnya (kalau ada)
        $saved = $this->M_Implementasi_perawatan->get_by_pelayanan_history($id_pelayanan, $id_history);

        $page_data['saved'] = $saved ?: [];

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Implementasi_perawatan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    /** 🔹 Simpan / Update via AJAX */
    public function simpan_ajax()
    {
        $this->output->set_content_type('application/json');

        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            echo json_encode(['status' => 'error', 'message' => 'Method harus POST']);
            return;
        }

        // Ambil session staff
        $data_staff = $this->session->userdata('data_auth') ?? $this->session->userdata('id_staff');
        if (!$data_staff) {
            echo json_encode(['status' => 'error', 'message' => '❌ Staff belum login']);
            return;
        }

        $id_staff = is_array($data_staff) ? ($data_staff['id_staff'] ?? null) : (is_object($data_staff) ? $data_staff->id_staff : $data_staff);
        $nama_staff = is_array($data_staff) ? ($data_staff['nama'] ?? '') : (is_object($data_staff) ? $data_staff->nama : 'Staff');

        if (!$id_staff) {
            echo json_encode(['status' => 'error', 'message' => '❌ ID Staff tidak ditemukan']);
            return;
        }

        $id_pelayanan = $this->input->post('id_pelayanan', true);
        $id_history   = $this->input->post('id_history', true);

        if (empty($id_pelayanan) || empty($id_history)) {
            echo json_encode(['status' => 'error', 'message' => 'Parameter pelayanan atau history tidak ditemukan.']);
            return;
        }

        // Pastikan staff valid di database
        $staff = $this->db->where('id_staff', $id_staff)->get('staff')->row();
        if (!$staff) {
            echo json_encode(['status' => 'error', 'message' => '❌ Staff tidak ditemukan di database.']);
            return;
        }

        // Daftar kolom tindakan (checkbox)
        $tindakan = [
            "memandikan_pasien",
            "mencuci_rambut",
            "perawatan_genitalia_eks",
            "perawatan_mulut",
            "fisioterapi_dada",
            "penghisapan_sekret",
            "terapi_inhalasi",
            "kompres",
            "perawatan_luka_operasi",
            "perawatan_luka_dekubitus",
            "perawatan_ett",
            "perawatan_cvp",
            "perawatan_drain",
            "memasang_jalur_iv",
            "perawatan_jalur_iv",
            "mencabut_jalur_iv",
            "pasang_ngt",
            "memberikan_makanan",
            "mobilisasi_ubah_posisi",
            "latihan_gerak_ringan",
            "gosok_minyak"
        ];

        // Payload utama
        $payload = [
            'id_staff'      => $id_staff,
            'id_pelayanan'  => $id_pelayanan,
            'id_history'    => $id_history,
            'laporan_pagi'  => $this->input->post('laporan_pagi', true),
            'laporan_siang' => $this->input->post('laporan_siang', true),
            'laporan_malam' => $this->input->post('laporan_malam', true),
            'tgl_input'     => date('Y-m-d H:i:s')
        ];

        // Gabungkan nilai jam dari tiap checkbox
        foreach ($tindakan as $kolom) {
            $nilai = $this->input->post($kolom);
            if (is_array($nilai)) {
                $filtered = array_filter($nilai, fn($v) => preg_match('/^\d+$/', $v));
                $payload[$kolom] = json_encode(array_values($filtered));
            } else {
                $payload[$kolom] = json_encode([]);
            }
        }

        // Cek apakah data sudah ada (update jika ada)
        $existing = $this->db->get_where('implementasi_perawatan', [
            'id_pelayanan' => $id_pelayanan,
            'id_history'   => $id_history
        ])->row();

        if ($existing) {
            $this->db->where('id', $existing->id);
            $ok = $this->db->update('implementasi_perawatan', $payload);
        } else {
            $ok = $this->db->insert('implementasi_perawatan', $payload);
        }

        echo json_encode(
            $ok
                ? ['status' => 'success', 'message' => '✅ Data berhasil disimpan oleh ' . $nama_staff]
                : ['status' => 'error', 'message' => '❌ Gagal menyimpan ke database.']
        );
    }
}