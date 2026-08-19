<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ResikoLingkungan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library(['session']);
        $this->load->helper(['url','security']);
        $this->load->model('M_Staff','mstaff');   // ambil staff & nama staff
        $this->load->model('M_mcu','mmcu');       // data MCU & quiz RLP
    }

    /* =========================
     * UTIL
     * ========================= */
    private function _current_staff_id()
    {
        $auth = $this->session->userdata('data_auth');
        $username = is_array($auth) ? ($auth['username'] ?? null)
                  : (is_object($auth) ? ($auth->username ?? null) : null);
        if (!$username) return null;

        $rows = $this->mstaff->get_staffByUsername($username);
        return ($rows && isset($rows[0]->id_staff)) ? (string)$rows[0]->id_staff : null;
    }

    private function _indo_datetime($datetime_str)
    {
        if (!$datetime_str) return '-';
        $ts = strtotime($datetime_str);
        if ($ts === false) return $datetime_str;
        $hari  = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
        $bulan = [1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $h = $hari[(int)date('w',$ts)];
        $d = (int)date('j',$ts);
        $m = $bulan[(int)date('n',$ts)];
        $y = date('Y',$ts);
        $t = date('H:i',$ts);
        return "$h, $d $m $y $t";
    }

    private function _load_quiz_augmented($id_mcu)
    {
        $quiz = $this->mmcu->checkData($id_mcu, 'quiz_resiko_lingkungan_pekerjaan');
        if (is_array($quiz) && !empty($quiz)) {
            // --- ambil NAMA STAFF dari M_Staff (bukan id)
            $quiz['nama_staff'] = $this->mstaff->getStaffNameById($quiz['id_staff'] ?? '') ?: ($quiz['id_staff'] ?? '');
            // --- format tanggal untuk tampilan
            $quiz['tanggal_input_fmt'] = $this->_indo_datetime($quiz['tanggal_input'] ?? '');
        } else {
            $quiz = [];
        }
        return $quiz;
    }

    /* =========================
     * TAMPIL (pakai Main + page_content)
     * ========================= */
    public function tampil($id_mcu = null)
    {
        if ($id_mcu) $this->session->set_userdata('current_id_mcu', (string)$id_mcu);
        else $id_mcu = (string)$this->session->userdata('current_id_mcu');

        $this->load->view('assets/_header');

        $page_data['data_mcu'] = $this->mmcu->getMCUById($id_mcu);
        if (empty($page_data['data_mcu'])) { show_404(); return; }

        $page_data['quiz']         = $this->_load_quiz_augmented($id_mcu);
        $page_data['page_content'] = 'page_content/resiko_lingkungan_pekerjaan';
        $page_data['id_mcu']       = $id_mcu;

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    /* =========================
     * SIMPAN (UPSERT)
     * ========================= */
    public function simpan()
    {
        $id_mcu = trim((string)$this->input->post('id_mcu', true));
        if ($id_mcu === '') $id_mcu = (string)$this->session->userdata('current_id_mcu');
        $id_staff = $this->_current_staff_id();

        if (empty($id_mcu) || empty($id_staff)) {
            echo json_encode(['status'=>'error','message'=>'id_mcu dan id_staff wajib diisi']); return;
        }
        if (strlen($id_mcu) > 50 || strlen($id_staff) > 50) {
            echo json_encode(['status'=>'error','message'=>'Panjang id_mcu/id_staff melebihi 50']); return;
        }
        if (empty($this->mmcu->getMCUById($id_mcu))) {
            echo json_encode(['status'=>'error','message'=>'id_mcu tidak ditemukan']); return;
        }

        $fields = [
            // Fisik
            'r_kebisingan','r_suhu_panas','r_suhu_dingin','r_radiasi_non_pengion','r_radiasi_pengion',
            'r_getaran_lokal','r_getaran_seluruh_tubuh','r_tekanan_udara_tinggi','r_tekanan_udara_rendah',
            // Kimia
            'r_debu_anorganik','r_debu_organik','r_pelarut_organik','r_logam_berat','r_bahan_iritan','r_pestisida','r_uap_logam',
            // Biologi
            'r_bakteri_virus_jamur_parasit','r_darah_cairan_tubuh','r_kotoran_hewan_manusia','r_serangga',
            // Ergonomi
            'r_angkat_angkut_berat','r_gerakan_berulang_tangan','r_duduk_lama','r_berdiri_lama','r_posisi_tidak_ergonomis',
            'r_pencahayaan_tidak_sesuai','r_monitor_4jam','r_bekerja_ketinggian',
            // Psikososial
            'r_kerja_gilir','r_beban_kerja_berlebihan','r_waktu_kerja_panjang','r_konflik_rekan_kerja',
            'r_hambatan_jenjang_karir','r_ketidakjelasan_tugas'
        ];
        $allowed = ['ya','tidak','tidak_tahu'];

        $payload = [];
        foreach ($fields as $f) {
            $v = (string)$this->input->post($f, true);
            if ($v === '' || !in_array($v, $allowed, true)) {
                echo json_encode(['status'=>'error','message'=>"Nilai $f wajib & harus ya/tidak/tidak_tahu"]); return;
            }
            $payload[$f] = $v;
        }

        $table = 'quiz_resiko_lingkungan_pekerjaan';
        $data = array_merge([
            'id_mcu'        => $id_mcu,
            'id_staff'      => $id_staff,
            'tanggal_input' => date('Y-m-d H:i:s'), // simpan standar; tampilan pakai formatter
        ], $payload);

        $exists = $this->mmcu->checkData($id_mcu, $table);
        $this->db->trans_start();
        if ($exists) $this->mmcu->update($data, ['id_mcu'=>$id_mcu], $table);
        else         $this->mmcu->insert_mcu($data, $table);
        $ok = $this->db->trans_status();
        $this->db->trans_complete();

        if (!$ok) {
            $db_err = $this->db->error();
            echo json_encode([
                'status'=>'error',
                'message'=>$db_err['code'] ? ('DB Error '.$db_err['code'].': '.$db_err['message']) : 'Gagal menyimpan data'
            ]);
            return;
        }

        // kembalikan info siap pakai (untuk munculkan tombol cetak & info nama staff)
        echo json_encode([
            'status'            => 'success',
            'tanggal_input'     => $data['tanggal_input'],
            'tanggal_input_fmt' => $this->_indo_datetime($data['tanggal_input']),
            'nama_staff'        => $this->mstaff->getStaffNameById($id_staff) ?: $id_staff
        ]);
    }

    /* =========================
     * CETAK
     * ========================= */
    public function cetak($id_mcu = null)
    {
        if ($id_mcu) $this->session->set_userdata('current_id_mcu', (string)$id_mcu);
        else $id_mcu = (string)$this->session->userdata('current_id_mcu');

        $data['data_mcu'] = $this->mmcu->getMCUById($id_mcu);
        if (empty($data['data_mcu'])) { show_404(); return; }

        $data['quiz']   = $this->_load_quiz_augmented($id_mcu);
        $data['id_mcu'] = $id_mcu; // tidak ditampilkan di view cetak

        $this->load->view('print/rlp_cetak', $data);
    }
}