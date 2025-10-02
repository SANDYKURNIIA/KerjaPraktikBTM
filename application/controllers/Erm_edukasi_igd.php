<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_edukasi_igd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Erm', 'erm');
        $this->load->model('M_Edukasi_igd', 'edukasi');
        $this->load->model('M_Staff', 'mstaff');
        $this->load->helper(['url']); // pastikan helper url aktif
    }

    /* ========== Helpers ========== */

    /**
     * Ambil data pasien berbasis no_rm saja.
     * (Optional fallback by kode jika masih ada relasi lama — boleh dihapus kalau DB sudah bersih 100% no_rm)
     */
    private function _getPasienByNoRM($no_rm)
    {
        if (!$no_rm) return null;

        // Utama: by no_rm
        $p = $this->db->get_where('pasien', ['no_rm' => $no_rm])->row_array();
        if ($p) return $p;

        // Fallback (opsional): jika masih ada method lama di model yang bisa menerima no_rm/kode
        if (method_exists($this->erm, 'getPasienByKode')) {
            $x = $this->erm->getPasienByKode($no_rm);
            if ($x) return is_array($x) ? $x : (array)$x;
        }

        // Fallback (opsional): jika ada kolom 'kode' dan no_rm yang diberikan kebetulan adalah 'kode'
        $p2 = $this->db->get_where('pasien', ['kode' => $no_rm])->row_array();
        return $p2 ?: null;
    }

    private function _current_staff_id()
    {
        $auth = $this->session->userdata('data_auth');
        $username = is_array($auth) ? ($auth['username'] ?? null)
                  : (is_object($auth) ? ($auth->username ?? null) : null);
        if (!$username) return null;

        $rows = $this->mstaff->get_staffByUsername($username);
        if ($rows && isset($rows[0]->id_staff)) {
            return (string)$rows[0]->id_staff;
        }
        return null;
    }

    /**
     * Resolve id_pelayanan terbaru berbasis no_rm saja.
     * - Jika tabel pelayanan sudah punya kolom no_rm -> gunakan langsung.
     * - Jika belum, kita ambil 'kode' pasien dari no_rm lalu cari pelayanan via id_pasien (kompat lama).
     */
    private function _resolve_id_pelayanan($no_rm)
    {
        if (!$no_rm) return null;

        // 1) Coba langsung via pelayanan.no_rm (jika kolom tersedia)
        $has_no_rm_in_pelayanan = $this->db->field_exists('no_rm', 'pelayanan');
        if ($has_no_rm_in_pelayanan) {
            $this->db->select('id_pelayanan')
                     ->from('pelayanan')
                     ->where('no_rm', $no_rm)
                     ->order_by('tgl_masuk', 'DESC')
                     ->limit(1);
            $row = $this->db->get()->row();
            if ($row && isset($row->id_pelayanan)) {
                return (string)$row->id_pelayanan;
            }
        }

        // 2) Kompat lama: temukan 'kode' pasien dari no_rm, lalu pakai pelayanan.id_pasien = kode
        $pasien = $this->db->select('kode')->get_where('pasien', ['no_rm' => $no_rm])->row();
        if ($pasien && isset($pasien->kode)) {
            $this->db->select('id_pelayanan')
                     ->from('pelayanan')
                     ->where('id_pasien', $pasien->kode)
                     ->order_by('tgl_masuk', 'DESC')
                     ->limit(1);
            $row2 = $this->db->get()->row();
            return $row2 ? (string)$row2->id_pelayanan : null;
        }

        return null;
    }

    /* ========== VIEW (FORM) ========== */

    // Ganti signature: param sekarang no_rm (bukan kode_pasien)
    public function edukasi_pendaftaran_igd($no_rm)
    {
        $page_data['sso_user_data'] = $this->session->userdata('data_auth');

        $pasien = $this->_getPasienByNoRM($no_rm);
        if (!$pasien) show_404();

        // Hapus total jejak 'kode_pasien' dari view-data
        $page_data['no_rm']       = $pasien['no_rm'] ?? $no_rm;
        $page_data['nama']        = $pasien['nama'] ?? '';
        $page_data['tgl_lahir']   = $pasien['tgl_lahir'] ?? '';
        $page_data['alamat']      = $pasien['alamat'] ?? '';

        $id_pelayanan_qs = $this->input->get('id_pelayanan');
        $page_data['id_pelayanan'] = $id_pelayanan_qs ?: $this->_resolve_id_pelayanan($page_data['no_rm']);
        $page_data['id_staff']     = $this->_current_staff_id();

        // Ambil entri edukasi terbaru berdasarkan no_rm (+ optional id_pelayanan)
        $page_data['edukasi'] = $this->edukasi->getEdukasiByNoRM($page_data['no_rm'], $page_data['id_pelayanan']);

        // URL cetak terbaru cukup pakai no_rm
        $page_data['print_url'] = site_url('Erm_edukasi_igd/cetak_terbaru/' .
            rawurlencode($page_data['no_rm']) . '/' .
            rawurlencode($page_data['id_pelayanan'] ?? ''));

        log_message('debug', '[EDUKASI_IGD] prefill no_rm='.$page_data['no_rm'].' id_pelayanan='.$page_data['id_pelayanan'].' id_staff='.$page_data['id_staff']);

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/IGD/view_erm_edukasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    /* ========== AJAX SAVE ========== */

    public function simpan_edukasi_igd()
    {
        $this->db->db_debug = FALSE;
        $this->output->set_content_type('application/json');

        $no_rm        = $this->input->post('no_rm');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_staff     = $this->input->post('id_staff');

        if ($no_rm && ($id_pelayanan === null || $id_pelayanan === '')) {
            $id_pelayanan = $this->_resolve_id_pelayanan($no_rm);
        }
        if ($id_staff === null || $id_staff === '') {
            $id_staff = $this->_current_staff_id();
        }

        if ($no_rm === null || $no_rm === '' || $id_pelayanan === null || $id_pelayanan === '' || $id_staff === null || $id_staff === '') {
            return $this->output->set_status_header(400)
                ->set_output(json_encode([
                    'status'  => 'error',
                    'message' => 'no_rm, id_pelayanan, dan id_staff wajib diisi',
                    'debug'   => compact('no_rm','id_pelayanan','id_staff')
                ]));
        }

        $tbl = 'topik_edukasi_igd';
        foreach (['no_rm','id_pelayanan','id_staff','tanggal_input','updated_at'] as $col) {
            if (!$this->db->field_exists($col, $tbl)) {
                return $this->output->set_status_header(500)
                    ->set_output(json_encode(['status'=>'error', 'message'=>"Kolom `$col` belum ada pada `$tbl`."]));
            }
        }

        $post = $this->input->post();
        for ($i=1; $i<=6; $i++) {
            $k = "s{$i}_durasi";
            if (array_key_exists($k,$post)) {
                $v = trim((string)$post[$k]);
                $post[$k] = ($v === '') ? null : (int)$v;
            }
        }

        log_message('debug', '[EDUKASI_IGD] SAVE payload='.json_encode([
            'no_rm'=>$no_rm,'id_pelayanan'=>$id_pelayanan,'id_staff'=>$id_staff
        ]));

        if ($this->db->field_exists('topik1', $tbl) && method_exists($this->edukasi, 'saveOrUpdate6Topik')) {
            $result = $this->edukasi->saveOrUpdate6Topik($no_rm, $id_pelayanan, $id_staff, $post);
        } else {
            $result = $this->edukasi->saveOrUpdateFromPostByNoRM($no_rm, $post, $id_staff, $id_pelayanan);
        }

        if (is_array($result) && isset($result['transaction_status']) && !$result['transaction_status']) {
            return $this->output->set_status_header(500)
                ->set_output(json_encode(['status'=>'error','message'=>'Transaksi DB gagal','result'=>$result]));
        }

        return $this->output->set_status_header(200)
            ->set_output(json_encode(['status'=>'success','message'=>'Data edukasi berhasil disimpan','result'=>$result]));
    }

    /* ========== CETAK ========== */

    // A. Cetak by id_edukasi (paling presisi)
    public function cetak($id_edukasi)
    {
        $row = $this->db->get_where('topik_edukasi_igd', ['id_edukasi' => $id_edukasi])->row_array();
        if (!$row) show_404();

        $pasien = $this->db
            ->select('no_rm, nama, tgl_lahir, alamat')
            ->get_where('pasien', ['no_rm' => $row['no_rm']])
            ->row_array();

        $this->load->view('erm_print/print_edukasi_igd', [
            'pasien'  => $pasien ?: [],
            'edukasi' => $row
        ]);
    }

    // B. Cetak entri terbaru berdasarkan no_rm + id_pelayanan
    public function cetak_terbaru($no_rm, $id_pelayanan = '')
    {
        if ($id_pelayanan === '' || $id_pelayanan === null) {
            $id_pelayanan = $this->_resolve_id_pelayanan($no_rm);
        }

        $this->db->order_by('updated_at','DESC')->limit(1);
        $row = $this->db->get_where('topik_edukasi_igd', [
            'no_rm' => $no_rm,
            'id_pelayanan' => $id_pelayanan
        ])->row_array();
        if (!$row) show_404();

        $pasien = $this->db
            ->select('no_rm, nama, tgl_lahir, alamat')
            ->get_where('pasien', ['no_rm' => $no_rm])
            ->row_array();

        $this->load->view('erm_print/print_edukasi_igd', [
            'pasien'  => $pasien ?: [],
            'edukasi' => $row
        ]);
    }
}