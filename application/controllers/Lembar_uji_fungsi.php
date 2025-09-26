<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lembar_uji_fungsi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->database();
        $this->load->model('M_Lembar_uji_fungsi');
        $this->load->helper(['url','security']);
        $this->load->library(['session']);
    }

    /* ===== Util ===== */
    private function b64_unwrap($s) {
        if ($s === null) return null;
        $try = @base64_decode(urldecode($s), true);
        return ($try !== false && $try !== '') ? $try : $s;
    }

    /** Ambil id_history AKTIF/terbaru untuk id_pelayanan */
    private function resolve_id_history_by_pelayanan($id_pelayanan)
    {
        $this->db->from('history_pelayanan')
                 ->where('id_pelayanan', $id_pelayanan)
                 ->where('status', 1)
                 ->order_by('tgl_masuk','DESC');
        $row = $this->db->get()->row();
        if ($row) return $row->id_history;

        // fallback: kalau tidak ada status=1, ambil terbaru apa adanya
        $this->db->from('history_pelayanan')
                 ->where('id_pelayanan', $id_pelayanan)
                 ->order_by('tgl_masuk','DESC');
        $row = $this->db->get()->row();
        return $row ? $row->id_history : null;
    }

    /* =======================
     * VIEW FORM
     * Route tombol: Lembar_uji_fungsi/form/{id_pelayanan}/{no_rm}
     * ======================= */
    public function form($id_pelayanan_raw = null, $no_rm = null)
    {
        $id_pelayanan = $this->b64_unwrap($id_pelayanan_raw);

        if (empty($id_pelayanan) || empty($no_rm)) {
            show_error('Parameter tidak lengkap.', 400);
        }

        // resolve id_history aktif/terbaru
        $id_history = $this->resolve_id_history_by_pelayanan($id_pelayanan);

        // data pasien + dpjp (nama dokter dari tabel dokter)
        $pasien = $this->M_Lembar_uji_fungsi->get_pasien_pelayanan_dpjp($no_rm, $id_pelayanan, $id_history);
        if (!$pasien) {
            show_error('Data pasien/pelayanan tidak ditemukan.', 404);
        }

        // diagnosa per visit
        $diag_fungsi = $this->M_Lembar_uji_fungsi->get_diagnosa_fungsi($id_pelayanan, $id_history);
        $diag_medis  = $this->M_Lembar_uji_fungsi->get_diagnosa_medis($id_pelayanan, $id_history);

        // lembar uji fungsi existing (by composite key)
        $lembar = $this->M_Lembar_uji_fungsi->get_lembar($id_pelayanan, $id_history);

        // flag untuk view (sudah pernah isi atau belum)
        $sudah_isi = !empty($lembar);

        $page_data = [
            'no_rm'                => $pasien->no_rm,
            'nama'                 => $pasien->nama,
            'tgl_lahir'            => $pasien->tgl_lahir,
            'alamat'               => $pasien->alamat,
            'telepon'              => $pasien->no_hp,
            'jenis_kelamin'        => $pasien->jenis_kelamin,
            'tgl_pemeriksaan'      => $pasien->tgl_pemeriksaan,
            'dpjp_nama'            => $pasien->dpjp_nama,
            'diagnosis_fungsional' => $diag_fungsi,
            'diagnosis_medis'      => $diag_medis,
            'id_pelayanan'         => $id_pelayanan,
            'id_history'           => $id_history,
            'lembar'               => $lembar,
            'sudah_isi'            => $sudah_isi, // 🔴 tambahan untuk cek tombol
        ];

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/view_lembar_uji_fungsi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    

    /* =======================
     * SAVE / UPSERT (AJAX)
     * ======================= */
    public function simpan()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
        $this->output->set_content_type('application/json');

        // Auth mengikuti contohmu: ambil dari data_auth
        $staff = $this->session->userdata('data_auth');
        $id_staff = $staff ? $staff->id_staff : null;

        if (empty($id_staff)) {
            echo json_encode(['status'=>'error','message'=>'Sesi login berakhir. Silakan login ulang.']);
            return;
        }

        $id_pelayanan = $this->b64_unwrap($this->input->post('id_pelayanan', true));
        $id_history   = $this->b64_unwrap($this->input->post('id_history', true));

        if (empty($id_pelayanan)) {
            echo json_encode(['status'=>'error','message'=>'id_pelayanan wajib.']);
            return;
        }
        if (empty($id_history)) {
            // jika tak dikirim dari form, resolve otomatis
            $id_history = $this->resolve_id_history_by_pelayanan($id_pelayanan);
        }
        if (empty($id_history)) {
            echo json_encode(['status'=>'error','message'=>'id_history tidak ditemukan untuk kunjungan ini.']);
            return;
        }

        $data = [
            'id_pelayanan' => $id_pelayanan,
            'id_history'   => $id_history,
            'id_staff'     => $id_staff, // staff yang sedang login
            'instrumen'    => $this->security->xss_clean($this->input->post('instrumen')),
            'hasil'        => $this->security->xss_clean($this->input->post('hasil')),
            'kesimpulan'   => $this->security->xss_clean($this->input->post('kesimpulan')),
            'rekomendasi'  => $this->security->xss_clean($this->input->post('rekomendasi')),
        ];

        $result = $this->M_Lembar_uji_fungsi->simpan_update($data);

        if (!$result['ok']) {
            log_message('error', 'lembar_uji_fungsi SAVE ERROR: '.print_r($result['error'], true));
        }

        echo json_encode([
            'status'  => $result['ok'] ? 'success' : 'error',
            'message' => $result['ok']
                ? ($result['action']==='insert' ? 'Berhasil menambahkan data.' : 'Berhasil memperbarui data.')
                : ('Gagal menyimpan data. ['.($result['error']['code'] ?? 'NA').'] '.($result['error']['message'] ?? 'Unknown DB error'))
        ]);
    }
    
}