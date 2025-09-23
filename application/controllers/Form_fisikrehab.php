<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_fisikrehab extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Erm_poli');
        $this->load->model('M_Pencarian_Pasien'); // master diagnosa
        $this->load->model('M_FisikRehab');       // form FR RJ
        $this->load->model('M_FR_Diagnosa');      // diagnosa
        $this->load->helper(['url','form','security']);
        $this->load->library(['session','form_validation','user_agent']);
    }

    /* ===== Utils ===== */
    private function b64_unwrap($s) {
        if ($s === null) return null;
        $try = @base64_decode(urldecode($s), true);
        return ($try !== false && $try !== '') ? $try : $s;
    }

    /** Ambil id_pelayanan terbaru by no_rm (id_pasien) */
    private function resolve_id_pelayanan_by_norm($no_rm)
    {
        $this->db->from('pelayanan')
                 ->where('id_pasien', $no_rm)
                 ->where('status', '1')
                 ->order_by('tgl_masuk','DESC');
        $row = $this->db->get()->row();
        return $row ? $row->id_pelayanan : null;
    }

    /** Ambil id_history terbaru by id_pelayanan */
    private function resolve_id_history_by_pelayanan($id_pelayanan)
    {
        $this->db->from('history_pelayanan')
                 ->where('id_pelayanan', $id_pelayanan)
                 ->where('status', 1)
                 ->order_by('tgl_masuk','DESC');
        $row = $this->db->get()->row();
        return $row ? $row->id_history : null;
    }

    /* =======================
     * FORM (VIEW)
     * route: Form_fisikrehab/form/{b64_id_pel}/{b64_id_his}/{jenis_pelayanan}
     * ======================= */
    public function form($id_pel, $id_his, $jenis_pelayanan)
    {
        $id_pelayanan = $this->b64_unwrap($id_pel);
        $id_history   = $this->b64_unwrap($id_his);
        $staff        = $this->session->userdata('data_auth');

        // Jika id tidak valid, biar nanti saat save() direfresh via resolver
        $pasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);

        $page_data = [
            'no_rm'           => $pasien->no_rm ?? '',
            'nama'            => $pasien->nama ?? '',
            'alamat'          => isset($pasien->alamat) ? ($pasien->alamat . ', ' . $pasien->kelurahan . ', ' . $pasien->kecamatan . ', ' . $pasien->provinsi) : '',
            'no_hp'           => $pasien->no_hp ?? '',
            'tgl_lahir'       => $pasien->tgl_lahir ?? '',
            'tgl_masuk'       => $pasien->tgl_masuk ?? '',
            'id_pelayanan'    => $id_pelayanan,
            'id_history'      => $id_history,
            'jenis_pelayanan' => $jenis_pelayanan,
            'id_staff'        => $staff ? $staff->id_staff : null,
            'id_pel_b64'      => $id_pel,
            'id_his_b64'      => $id_his,
            'form'            => ($id_pelayanan && $id_history) ? $this->M_FisikRehab->get_by_visit($id_pelayanan, $id_history) : null,
            'master_diagnosa' => $this->M_Pencarian_Pasien->getDiagnosa(),
        ];

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/view_fisikrehab';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    /* =======================
     * SAVE (upsert) — resolve id otomatis kalau hilang
     * ======================= */
    public function save()
    {
        $this->output->set_content_type('application/json');

        $staff = $this->session->userdata('data_auth');
        $now   = date('Y-m-d H:i:s');

        $no_rm      = $this->input->post('no_rm', true);
        $in_pel     = $this->input->post('id_pelayanan'); // boleh raw/b64
        $in_his     = $this->input->post('id_history');   // boleh raw/b64

        $id_pel     = $this->b64_unwrap($in_pel);
        $id_his     = $this->b64_unwrap($in_his);

        // Resolver otomatis sesuai permintaan:
        if (empty($id_pel)) {
            $id_pel = $this->resolve_id_pelayanan_by_norm($no_rm);
        }
        if (empty($id_his) && !empty($id_pel)) {
            $id_his = $this->resolve_id_history_by_pelayanan($id_pel);
        }

        if (empty($id_pel) || empty($id_his)) {
            echo json_encode(['status' => 'failed', 'msg' => 'Kunjungan tidak ditemukan untuk no_rm ini.']);
            return;
        }

        $id_staff   = $staff ? $staff->id_staff : null;

        $payload = [
            'no_rm'                        => $no_rm,
            'id_pelayanan'                 => $id_pel,
            'id_history'                   => $id_his,
            'id_staff'                     => $id_staff,
            'hubungan_tertanggung'         => $this->input->post('hubungan', true),
            'anamnesa'                     => $this->input->post('anamnesa', false),
            'pemeriksaan_fisik_uji_fungsi' => $this->input->post('pf_uf', false),
            'pemeriksaan_penunjang'        => $this->input->post('penunjang', false),
        
            'anjuran'                      => $this->input->post('anjuran', false),
            'evaluasi'                     => $this->input->post('evaluasi', false),
            'laksana_kfr_icd9cm'           => $this->input->post('icd9_kfr', true),
            'suspek_pak'                   => ($this->input->post('suspek_pak', true) === 'YA') ? 1 : 0,
            'suspek_pak_ket'               => $this->input->post('suspek_pak_ket', true),
            'tgl_update'                   => $now,
        ];

        $exists = $this->M_FisikRehab->get_by_visit($id_pel, $id_his);
        if ($exists) {
            $ok = $this->M_FisikRehab->update_by_visit($payload);
        } else {
            $payload['tgl_input'] = $now;
            $ok = $this->M_FisikRehab->insert($payload);
        }

        echo json_encode(['status' => $ok ? 'success' : 'failed']);
    }

    /* ===== Master diagnosa utk DataTables (atas) ===== */
    public function tampil_list_diagnosa_master()
    {
        $rows = $this->M_Pencarian_Pasien->getDiagnosa(); // harapannya: id_diagnosa, nama_diagnosa, id_dtd
        $this->output->set_content_type('application/json')
            ->set_output(json_encode(['data' => $rows]));
    }

    /* ===== List per kunjungan (terima raw/b64) ===== */
    public function tampil_list_diagnosa_medis()
    {
        $id_pel = $this->b64_unwrap($this->input->post('id_pelayanan'));
        $id_his = $this->b64_unwrap($this->input->post('id_history'));
        $rows   = $this->M_FR_Diagnosa->list_medis($id_pel, $id_his);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode(['data' => $rows]));
    }

    public function tampil_list_diagnosa_fungsi()
    {
        $id_pel = $this->b64_unwrap($this->input->post('id_pelayanan'));
        $id_his = $this->b64_unwrap($this->input->post('id_history'));
        $rows   = $this->M_FR_Diagnosa->list_fungsi($id_pel, $id_his);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode(['data' => $rows]));
    }

  /* ===== Tambah diagnosa (nama_diagnosa ikut tersimpan) ===== */
public function tambah_diagnosa_medis()
{
    $this->output->set_content_type('application/json');

    $staff    = $this->session->userdata('data_auth');
    $kode     = $this->input->post('kode', true);
    $nama     = $this->input->post('nama', true);
    $id_pel   = $this->b64_unwrap($this->input->post('id_pelayanan'));
    $id_his   = $this->b64_unwrap($this->input->post('id_history'));
    $id_staff = $staff ? $staff->id_staff : null;

    $ok = $this->M_FR_Diagnosa->add_medis([
        'id_pelayanan'  => $id_pel,
        'id_history'    => $id_his,
        'kode'          => $kode,
        'nama_diagnosa' => $nama,
        'id_staff'      => $id_staff,
    ]);

    echo json_encode(['status' => $ok ? 'success' : 'failed']);
}

public function tambah_diagnosa_fungsi()
{
    $this->output->set_content_type('application/json');

    $staff    = $this->session->userdata('data_auth');
    $kode     = $this->input->post('kode', true);
    $nama     = $this->input->post('nama', true);
    $id_pel   = $this->b64_unwrap($this->input->post('id_pelayanan'));
    $id_his   = $this->b64_unwrap($this->input->post('id_history'));
    $id_staff = $staff ? $staff->id_staff : null;

    $ok = $this->M_FR_Diagnosa->add_fungsi([
        'id_pelayanan'  => $id_pel,
        'id_history'    => $id_his,
        'kode'          => $kode,
        'nama_diagnosa' => $nama,
        'id_staff'      => $id_staff,
    ]);

    echo json_encode(['status' => $ok ? 'success' : 'failed']);
}


    /* ===== Hapus diagnosa ===== */
    public function hapus_diagnosa_medis()
    {
        $no_diagnosa = (int)$this->input->post('no_diagnosa');
        $ok = $this->M_FR_Diagnosa->delete_medis($no_diagnosa);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode(['status' => $ok ? 'success' : 'failed']));
    }

    public function hapus_diagnosa_fungsi()
    {
        $no_diagnosa = (int)$this->input->post('no_diagnosa');
        $ok = $this->M_FR_Diagnosa->delete_fungsi($no_diagnosa);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode(['status' => $ok ? 'success' : 'failed']));
    }
    public function is_form_complete($id_pelayanan, $id_history)
{
    $this->db->where('id_pelayanan', $id_pelayanan);
    $this->db->where('id_history', $id_history);
    $row = $this->db->get('fr_rj_form')->row();

    if (!$row) return false;

    // daftar kolom wajib diisi
    $fields = [
        'hubungan_tertanggung',
        'anamnesa',
        'pemeriksaan_fisik_uji_fungsi',
        'pemeriksaan_penunjang',
        'anjuran',
        'evaluasi',
        'laksana_kfr_icd9cm',
    ];

    foreach ($fields as $f) {
        if (empty($row->$f)) {
            return false;
        }
    }
    return true;
}

}