<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lembar_Monitoring extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->database();
        $this->load->library('session'); // 🔥 WAJIB
        $this->load->model('M_Lembar_uji_fungsi');
        $this->load->model('M_Lembar_Monitoring');
        $this->load->helper(['url', 'security']);
    }

    public function index($no_rm = null, $id_pelayanan = null, $id_history = null)
    {

        // =========================
        // 🔹 DATA PASIEN
        // =========================
        $pasien = $this->M_Lembar_uji_fungsi
            ->get_pasien_pelayanan_dpjp($no_rm, $id_pelayanan);

        if (!$pasien) {
            show_error('Data pasien tidak ditemukan');
        }

        // =========================
        // 🔹 DATA ASSESSMENT   
        // =========================
        $ass = $this->db->get_where('form_ass_per_ranap', [
            'no_rm'         => $no_rm,
            'id_pelayanan' => $id_pelayanan,
            'id_history'   => $id_history
        ])->row();

        // =========================
        // 🔹 DATA MONITORING
        // =========================
        $monitoring = $this->M_Lembar_Monitoring->get_by_history($id_history);
        $sudah_ada_monitoring = !empty($monitoring);


        // =========================
        // 🔹 DATA KE VIEW
        // =========================
        $page_data = [
            'no_rm'         => $pasien->no_rm,
            'nama_pasien'   => $pasien->nama,
            'tgl_lahir'     => $pasien->tgl_lahir,
            'alamat'        => $pasien->alamat,
            'jenis_kelamin' => $pasien->jenis_kelamin,
            'id_pelayanan'  => $id_pelayanan,
            'id_history'    => $id_history,
            'ass'           => $ass,
            'monitoring'    => $monitoring,

            // 🔥 INI KUNCINYA
            'sudah_ada_monitoring' => $sudah_ada_monitoring
        ];


        // =========================
        // 🔹 LOAD VIEW
        // =========================
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Lembar_monitoring';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    // =========================
    // 🔹 AMBIL DATA MONITORING PER ID
    // =========================
    public function get_monitoring($id)
    {
        $data = $this->M_Lembar_Monitoring->get_by_id($id);
        if ($data) {
            echo json_encode(['success' => true, 'data' => $data]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Data tidak ditemukan']);
        }
    }


    // =========================
    // 🔹 SIMPAN / UPDATE DATA
    // =========================
    public function save()
    {
        $post = $this->input->post(null, true);
        $staff = $this->session->userdata('data_auth');

        if (!$staff->id_staff) {
            echo json_encode(['success' => false, 'message' => 'Staff belum login']);
            return;
        }

        if (empty($post['id_pelayanan']) || empty($post['id_history']) || empty($post['tgl_monitoring']) || empty($post['jam_monitoring'])) {
            echo json_encode(['success' => false, 'message' => 'Data wajib belum lengkap']);
            return;
        }

        $data = [
            'id_staff'           => $staff->id_staff,
            'id_pelayanan'       => $post['id_pelayanan'],
            'id_history'         => $post['id_history'],
            'td'                 => $post['td'] ?? null,
            'rr'                 => $post['rr'] ?? null,
            'hr'                 => $post['hr'] ?? null,
            'saturasi'           => $post['saturasi'] ?? null,
            'temp'               => $post['temp'] ?? null,
            'tanggal_monitoring' => $post['tgl_monitoring'],
            'jam_monitoring'     => $post['jam_monitoring'],
            'keadaan_umum'       => $post['keadaan_umum'] ?? null,
            'tindakan_terapi'    => $post['tindakan_terapi'] ?? null,
            'keterangan'         => $post['keterangan'] ?? null,
            'tgl_input'          => date('Y-m-d H:i:s')
        ];

        // Jika form ada ID → update, kalau tidak → insert
        if (!empty($post['id'])) {
            $ok = $this->M_Lembar_Monitoring->update_by_id($post['id'], $data);
        } else {
            $ok = $this->M_Lembar_Monitoring->insert($data);
        }

        if (!$ok) {
            echo json_encode(['success' => false, 'message' => 'Gagal menyimpan data']);
            return;
        }

        echo json_encode(['success' => true]);
    }




    // Hapus data
    public function delete($id)
    {
        $success = $this->M_Lembar_Monitoring->delete_by_id($id);
        echo json_encode(['success' => $success]);
    }


    // =========================
    // 🔹 AMBIL DATA MONITORING PER HISTORY (AJAX)
    // =========================
    public function get_by_history($id_history)
    {
        header('Content-Type: application/json');
        $data = $this->M_Lembar_Monitoring->get_by_history($id_history);
        echo json_encode($data);
    }
}