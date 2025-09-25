<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quitioners extends CI_Controller
{
    function __construct()
    {
        parent::__construct();    
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_mcu');
        $this->load->model('Penyakit_Model');
        $this->load->model('M_Staff');
        $this->load->model('M_Hoby_Kebiasaan');
        $this->load->model('M_Staff', 'mstaff');
        $this->load->library('session');
    }

    // ✅ Halaman utama MCU


    private function _current_staff_id()
    {
        $auth = $this->session->userdata('data_auth');
        $username = is_array($auth) ? ($auth['username'] ?? null)
                  : (is_object($auth) ? ($auth->username ?? null) : null);
        if (!$username) return null;

        $rows = $this->M_Staff->get_staffByUsername($username);
        if ($rows && isset($rows[0]->id_staff)) {
            return (string)$rows[0]->id_staff;
        }
        return null;
    }

    public function tampil($id_mcu)
    {
        $this->load->view('assets/_header');

        $page_data['data_mcu'] = $this->M_mcu->getMCUById($id_mcu);
        $page_data['page_content'] = 'page_content/Quitioners';

        // simpan utk fallback fragment
        $this->session->set_userdata('current_id_mcu', $id_mcu);

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    // ✅ Load form pemeriksaan
    public function form_pemeriksaan($form, $id_mcu = null)
    {
        $page_data['gambar'] = base_url("assets/dist/img/gambar.png");
         $page_data['id_mcu'] = $this->input->get_post('id_mcu') ?: $this->session->userdata('current_id_mcu');

        $view_path = 'kuisioner_mcu/' . $form;
        $response = $this->load->view($view_path, $page_data, true);
        echo $response;
    }

    // ✅ Simpan Pemeriksaan Pribadi
    public function simpan_pemeriksaan_pribadi()
    {
        $id_mcu = $this->input->post('id_mcu');
        $data = [
            'id_mcu' => $id_mcu,
            'P11a' => $this->input->post('P11a'),
            'P11b' => $this->input->post('P11b'),
            'P12a' => $this->input->post('P12a'),
            'P12b' => $this->input->post('P12b'),
            'P12c' => $this->input->post('P12c'),
            'P12d' => $this->input->post('P12d'),
            'P12e' => $this->input->post('P12e'),
            'P12f' => $this->input->post('P12f'),
            'P12g' => $this->input->post('P12g'),
            'P12h' => $this->input->post('P12h'),
            'P13a' => $this->input->post('P13a'),
            'P13b' => $this->input->post('P13b'),
            'P14a' => $this->input->post('P14'),
            'P15a' => $this->input->post('P15'),
            'P16a' => $this->input->post('P16'),
            'P17a' => $this->input->post('P17a'),
            'smoker' => $this->input->post('smoker'),
            'number_smoker' => $this->input->post('numbersmoked'),
            'concumption_alcohol' => $this->input->post('concumption_alcohol'),
            'terhambat_belanjaan' => $this->input->post('terhambat_belanjaan'),
        ];

        $db = $this->db->get_where('quiz_pemeriksaan_pribadi', ['id_mcu' => $id_mcu])->row();
        if (empty($db)) {
            $this->M_mcu->insert_mcu($data, 'quiz_pemeriksaan_pribadi');
        } else {
            $this->M_mcu->update($data, ['id_mcu' => $id_mcu], 'quiz_pemeriksaan_pribadi');
        }

        echo json_encode(['status' => 'success']);
    }

    // ✅ Simpan Penyakit (Insert Banyak)
    public function simpan_penyakit_pasien($id_mcu)
    {
        $staff = $this->session->userdata['data_auth'];

        $data = [
            'id_mcu' => $id_mcu,
            'id_staff' => $staff->id_staff,
            'asma_checked' => $this->input->post('asma_checked'),
            'asma_tahun' => $this->input->post('asma_tahun'),
            'asma_status' => $this->input->post('asma_status'),

            'kanker_checked' => $this->input->post('kanker_checked'),
            'kanker_tahun' => $this->input->post('kanker_tahun'),
            'kanker_status' => $this->input->post('kanker_status'),

            'kencing_manis_checked' => $this->input->post('kencing_manis_checked'),
            'kencing_manis_tahun' => $this->input->post('kencing_manis_tahun'),
            'kencing_manis_status' => $this->input->post('kencing_manis_status'),

            'radang_otak_checked' => $this->input->post('radang_otak_checked'),
            'radang_otak_tahun' => $this->input->post('radang_otak_tahun'),
            'radang_otak_status' => $this->input->post('radang_otak_status'),

            'jantung_checked' => $this->input->post('jantung_checked'),
            'jantung_tahun' => $this->input->post('jantung_tahun'),
            'jantung_status' => $this->input->post('jantung_status'),

            'batu_ginjal_checked' => $this->input->post('batu_ginjal_checked'),
            'batu_ginjal_tahun' => $this->input->post('batu_ginjal_tahun'),
            'batu_ginjal_status' => $this->input->post('batu_ginjal_status'),

            'gangguan_fungsi_ginjal_checked' => $this->input->post('gangguan_fungsi_ginjal_checked'),
            'gangguan_fungsi_ginjal_tahun' => $this->input->post('gangguan_fungsi_ginjal_tahun'),
            'gangguan_fungsi_ginjal_status' => $this->input->post('gangguan_fungsi_ginjal_status'),

            'malaria_checked' => $this->input->post('malaria_checked'),
            'malaria_tahun' => $this->input->post('malaria_tahun'),
            'malaria_status' => $this->input->post('malaria_status'),

            'ayan_epilepsi_checked' => $this->input->post('ayan_epilepsi_checked'),
            'ayan_epilepsi_tahun' => $this->input->post('ayan_epilepsi_tahun'),
            'ayan_epilepsi_status' => $this->input->post('ayan_epilepsi_status'),

            'gondong_parotitis_checked' => $this->input->post('gondong_parotitis_checked'),
            'gondong_parotitis_tahun' => $this->input->post('gondong_parotitis_tahun'),
            'gondong_parotitis_status' => $this->input->post('gondong_parotitis_status'),
            'tgl_input' => date('Y-m-d H:i:s')
        ];

        // VALIDASI: Cek minimal satu input terisi
        $all_empty = true;
        foreach ($data as $key => $value) {
            // abaikan field id_mcu dan tgl_input
            if (!in_array($key, ['id_mcu', 'tgl_input']) && !empty($value)) {
                $all_empty = false;
                break;
            }
        }

        if ($all_empty) {
            echo json_encode(['status' => 'error', 'message' => 'Silakan isi minimal satu data penyakit!']);
            return;
        }

        // Cek data di DB
        $db = $this->db->get_where('penyakit_pasien', ['id_mcu' => $id_mcu])->row();
        if (empty($db)) {
            $this->M_mcu->insert_mcu($data, 'penyakit_pasien');
        } else {
            $this->M_mcu->update($data, ['id_mcu' => $id_mcu], 'penyakit_pasien');
        }

        echo json_encode(['status' => 'success']);
    }

    public function getPenyakitPasien($id_mcu)
    {
        $db = $this->db->get_where('penyakit_pasien', ['id_mcu' => $id_mcu])->row();

        echo json_encode(['data' => $db]);
    }

      

    // ✅ Simpan Hoby Dan Penyakit
    public function simpan_hoby_kebiasaan($id_mcu)
    {
        $staff = $this->session->userdata['data_auth'];

        $hobi           = $this->input->post('hobi');         // array
        $hobi_lain      = $this->input->post('hobi_lain');    // string
        $kebiasaan      = $this->input->post('kebiasaan');    // array
        $kebiasaan_lain = $this->input->post('kebiasaan_lain'); // string

        // --- Filter jika "lainnya" tidak dicentang ---
        if (!empty($hobi) && !in_array("lainnya", $hobi)) {
            $hobi_lain = null; // kosongkan
        }

        if (!empty($kebiasaan) && !in_array("lainnya", $kebiasaan)) {
            $kebiasaan_lain = null; // kosongkan
        }

        $data = [
            'id_mcu'          => $id_mcu,
            'id_staff'        => $staff->id_staff,
            'hobi'            => !empty($hobi) ? implode(",", $hobi) : null,
            'hobi_lain'       => !empty($hobi_lain) ? $hobi_lain : null,
            'kebiasaan'       => !empty($kebiasaan) ? implode(",", $kebiasaan) : null,
            'kebiasaan_lain'  => !empty($kebiasaan_lain) ? $kebiasaan_lain : null
        ];

        $db = $this->M_Hoby_Kebiasaan->getById($id_mcu);
        if (empty($db)) {
            $this->M_Hoby_Kebiasaan->insert($data);
        } else {
            $this->M_Hoby_Kebiasaan->update($id_mcu, $data);
        }

        echo json_encode(['status' => 'success']);
    }
    

    public function get_hoby_kebiasaan($id_mcu)
    {
        $data = $this->M_Hoby_Kebiasaan->getById($id_mcu);

        if ($data) {
            // ubah string "musik_keras,headset" jadi array ["musik_keras","headset"]
            $data['hobi']       = !empty($data['hobi']) ? explode(",", $data['hobi']) : [];
            $data['kebiasaan']  = !empty($data['kebiasaan']) ? explode(",", $data['kebiasaan']) : [];

            echo json_encode(['status' => 'success', 'data' => $data]);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Data tidak ditemukan']);
        }
    }

     public function simpan_survey_diagnosis_stres()
    {
        // Ambil id_mcu dari POST → fallback session
        $id_mcu = trim((string)$this->input->post('id_mcu', true));
        if ($id_mcu === '' || $id_mcu === null) {
            $id_mcu = (string)$this->session->userdata('current_id_mcu');
        }

        // Ambil id_staff via helper
        $id_staff = $this->_current_staff_id();

        // Validasi dasar
        if (empty($id_mcu) || empty($id_staff)) {
            echo json_encode(['status' => 'error', 'message' => 'id_mcu dan id_staff wajib diisi']);
            return;
        }
        if (strlen($id_mcu) > 50 || strlen($id_staff) > 50) {
            echo json_encode(['status' => 'error', 'message' => 'Panjang id_mcu/id_staff melebihi 50 karakter']);
            return;
        }

        // Pastikan id_mcu valid
        if ($this->db->where('id_mcu', $id_mcu)->limit(1)->get('mcu')->num_rows() === 0) {
            echo json_encode(['status' => 'error', 'message' => 'id_mcu tidak ditemukan']);
            return;
        }

        // Ambil jawaban survey q1 - q18
        $data = [];
        for ($i = 1; $i <= 18; $i++) {
            $jawaban = $this->input->post('q' . $i, true);
            if ($jawaban === null || $jawaban === '') {
                echo json_encode(['status' => 'error', 'message' => "Jawaban pertanyaan $i wajib diisi"]);
                return;
            }
            if (!is_numeric($jawaban)) {
                echo json_encode(['status' => 'error', 'message' => "Jawaban pertanyaan $i harus berupa angka"]);
                return;
            }
            $data['q' . $i] = (int)$jawaban;
        }

        // Siapkan data insert
        $insert_data = array_merge([
            'id_mcu'        => $id_mcu,
            'id_staff'      => $id_staff,
            'tanggal_input' => date('Y-m-d H:i:s')
        ], $data);

        // Simpan ke tabel quiz_diagnosis_stres dengan transaksi
        $this->db->trans_start();
        $this->db->insert('quiz_diagnosis_stres', $insert_data);
        $insert_ok = ($this->db->affected_rows() > 0);
        $this->db->trans_complete();

        // Cek hasil insert
        if (!$insert_ok || $this->db->trans_status() === false) {
            $db_err = $this->db->error();
            echo json_encode([
                'status'  => 'error',
                'message' => $db_err['code'] ? ('DB Error ' . $db_err['code'] . ': ' . $db_err['message'])
                    : 'Gagal menyimpan data survey'
            ]);
            return;
        }

        echo json_encode(['status' => 'success']);
    }

 public function simpan_riwayat_keluarga()
    {
        $staff = $this->session->userdata['data_auth'];
        $id_mcu = trim((string)$this->input->post('id_mcu', true));
        if($id_mcu === '' || $id_mcu === null){
            $id_mcu = (string)$this->session->userdata('current_id_mcu');
        }
         if (empty($id_mcu)) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => 'ID MCU tidak ditemukan'
                ]));
            return;
        }
        $data = [
            'id_mcu'        => $id_mcu,
            'id_staff'      => $staff->id_staff,
            'stroke'        => $this->input->post('stroke'),
            'hipertensi'    => $this->input->post('hipertensi'),
            'jantung'       => $this->input->post('jantung'),
            'asma'          => $this->input->post('asma'),
            'kanker'        => $this->input->post('kanker'),
            'kanker_pd'     => $this->input->post('kanker_pd'),
            'kanker_it'     => $this->input->post('kanker_it'),
            'kanker_ub'     => $this->input->post('kanker_ub'),
            'kencing_manis' => $this->input->post('kencing_manis'),
            'kolesterol'    => $this->input->post('kolesterol'),
            'asam_urat'     => $this->input->post('asam_urat'),
            'obesitas'      => $this->input->post('obesitas'),
            'tbc'           => $this->input->post('tbc'),
            'katarak'       => $this->input->post('katarak'),
            'tekanan'       => $this->input->post('tekanan'),
            'osteoporosis'  => $this->input->post('osteoporosis'),
            'alergi'        => $this->input->post('alergi'),
            'epilepsi'      => $this->input->post('epilepsi'),
            'alkoholisme'   => $this->input->post('alkoholisme'),
            'pendarahan'    => $this->input->post('pendarahan'),
            'tgl_input'     => date('Y-m-d H:i:s')
        ];

        $db = $this->db->get_where('quiz_riwayat_kesehatan', ['id_mcu' => $id_mcu])->row();
        if (empty($db)) {
            $this->M_mcu->insert_mcu($data, 'quiz_riwayat_kesehatan');
        } else {
            $this->M_mcu->update($data, ['id_mcu' => $id_mcu], 'quiz_riwayat_kesehatan');
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['status' => 'success']));
    }

     public function get_riwayat_keluarga($id_mcu)
    {
    $data = $this->db->get_where('quiz_riwayat_kesehatan', ['id_mcu' => $id_mcu])->row_array();

    if ($data) {
        echo json_encode([
            'status' => 'success',
            'data'   => $data
        ]);
    } else {
        echo json_encode([
            'status'  => 'not_found',
            'message' => 'Data riwayat keluarga tidak ditemukan'
        ]);
    }
    }

     public function simpan_riwayat_pekerjaan_kini()
    {
        $this->output->set_content_type('application/json');

        if ($this->input->method() !== 'post') {
            echo json_encode(['status' => 'error', 'message' => 'Metode permintaan tidak valid.']);
            return;
        }

        $id_mcu = trim((string)$this->input->post('id_mcu', true));
        if ($id_mcu === '' || $id_mcu === null) {
            $id_mcu = (string)$this->session->userdata('current_id_mcu');
        }

        // Ambil id_staff menggunakan fungsi helper yang baru ditambahkan
        $id_staff = $this->_current_staff_id();

        if (empty($id_mcu) || empty($id_staff)) {
            echo json_encode(['status' => 'error', 'message' => 'id_mcu dan id_staff wajib diisi']);
            return;
        }

        if (strlen($id_mcu) > 50 || strlen($id_staff) > 50) {
            echo json_encode(['status'=>'error','message'=>'Panjang id_mcu/id_staff melebihi 50 karakter']);
            return;
        }

        if ($this->db->where('id_mcu', $id_mcu)->limit(1)->get('mcu')->num_rows() === 0) {
            echo json_encode(['status'=>'error','message'=>'id_mcu tidak ditemukan']);
            return;
        }

        $data_simpan = [
            'id_mcu'         => $id_mcu,
            'perusahaan'     => $this->input->post('perusahaan', true),
            'tahun_dari'     => $this->input->post('tahun_dari', true),
            'tahun_sampai'   => $this->input->post('tahun_sampai', true),
            'sebagai'        => $this->input->post('sebagai', true),
            'divisi'         => $this->input->post('divisi', true),
            'programK3'      => $this->input->post('programK3', true),
            'berdebu'        => $this->input->post('berdebu', true),
            'ket_berdebu'    => $this->input->post('ket_berdebu', true),
            'bahanKimia'     => $this->input->post('bahanKimia', true),
            'ket_bahanKimia' => $this->input->post('ket_bahanKimia', true),
            'radiasi'        => $this->input->post('radiasi', true),
            'ket_radiasi'    => $this->input->post('ket_radiasi', true),
            'asap'           => $this->input->post('asap', true),
            'ket_asap'       => $this->input->post('ket_asap', true),
            'fume'           => $this->input->post('fume', true),
            'ket_fume'       => $this->input->post('ket_fume', true),
            'makanan'        => $this->input->post('makanan', true),
            'ket_makanan'    => $this->input->post('ket_makanan', true),
            'alatBerat'      => $this->input->post('alatBerat', true),
            'ket_alatBerat'  => $this->input->post('ket_alatBerat', true),
            'getaran'        => $this->input->post('getaran', true),
            'ket_getaran'    => $this->input->post('ket_getaran', true),
            'panas'          => $this->input->post('panas', true),
            'ket_panas'      => $this->input->post('ket_panas', true),
            'dingin'         => $this->input->post('dingin', true),
            'ket_dingin'     => $this->input->post('ket_dingin', true),
            'ketinggian'     => $this->input->post('ketinggian', true),
            'ket_ketinggian' => $this->input->post('ket_ketinggian', true),
            'bising'         => $this->input->post('bising', true),
            'ket_bising'     => $this->input->post('ket_bising', true),
            'penglihatan'    => $this->input->post('penglihatan', true),
            'ket_penglihatan'=> $this->input->post('ket_penglihatan', true),
            'kantoran'       => $this->input->post('kantoran', true),
            'ket_kantoran'   => $this->input->post('ket_kantoran', true),
            'id_staff'       => $id_staff,
            'tanggal_input'  => date('Y-m-d H:i:s')
        ];

        $this->db->trans_start();
        $this->M_mcu->simpan_riwayat_pekerjaan_kini($data_simpan);
        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            $db_err = $this->db->error();
            echo json_encode([
                'status'  => 'error',
                'message' => $db_err['code'] ? ('DB Error ' . $db_err['code'] . ': ' . $db_err['message']) : 'Gagal menyimpan data riwayat pekerjaan'
            ]);
            return;
        }

        echo json_encode(['status' => 'success', 'message' => 'Data berhasil disimpan']);
    }

}
