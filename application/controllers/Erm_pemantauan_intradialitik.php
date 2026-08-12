<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_pemantauan_intradialitik extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Erm');
        $this->load->model('M_Erm_poli');
    }

    public function form($id_pelayanan = null, $id_history = null)
    {
        // Jika parameter kosong, coba dari GET
        if (empty($id_pelayanan)) {
            $id_pelayanan = $this->input->get('id_pelayanan');
        }
        if (empty($id_history)) {
            $id_history = $this->input->get('id_history');
        }
        
        // Jika masih kosong, coba dari URL segment (backward compatibility)
        if (empty($id_pelayanan)) {
            $id_pelayanan = $this->uri->segment(3);
        }
        if (empty($id_history)) {
            $id_history = $this->uri->segment(4);
        }
        
        // Validasi akhir
        if (empty($id_pelayanan) || empty($id_history)) {
            show_error('Parameter id_pelayanan dan id_history diperlukan.', 400);
            return;
        }
        
        $selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);

        if (!$selectPasien) {
            show_error('Data pasien tidak ditemukan.', 404);
            return;
        }

        $page_data['list_perawat'] = $this->M_Erm_poli->getListPerawat();

        $auth = $this->session->userdata('data_auth');
        $id_staff_login = null;

        if (!empty($auth)) {
            if (is_array($auth) && isset($auth['id_staff'])) {
                $id_staff_login = $auth['id_staff'];
            } elseif (is_object($auth) && isset($auth->id_staff)) {
                $id_staff_login = $auth->id_staff;
            }
        }

        if (empty($id_staff_login)) {
            $id_staff_login = $this->session->userdata('id_staff');
        }

        $page_data['nama']          = $selectPasien->nama;
        $page_data['no_hp']         = $selectPasien->no_hp;
        $page_data['alamat']        = $selectPasien->alamat . ', ' .
            $selectPasien->kelurahan . ', ' .
            $selectPasien->kecamatan . ', ' .
            $selectPasien->provinsi;
        $page_data['tgl_lahir']     = $selectPasien->tgl_lahir;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['cara_bayar']    = $selectPasien->cara_bayar;
        $page_data['tgl_masuk']     = $selectPasien->tgl_masuk;

        $page_data['staff']         = $id_staff_login;

        $page_data['no_rm']         = $selectPasien->no_rm;
        $page_data['id_pelayanan']  = $selectPasien->id_pelayanan;
        $page_data['id_history']    = $selectPasien->id_history;
        $page_data['data']          = $selectPasien;

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/view_pemantauan_intradialitik';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

public function save()
{
    if ($this->input->method() !== 'post') {
        show_404();
    }

    $id_pelayanan = trim($this->input->post('id_pelayanan', true));
    $id_history   = trim($this->input->post('id_history', true));
    $tanggal      = trim($this->input->post('tanggal', true));

    if (empty($id_pelayanan) || empty($tanggal)) {
        $this->output
            ->set_status_header(400)
            ->set_content_type('application/json')
            ->set_output(json_encode(['status' => false, 'message' => 'ID Pelayanan atau Tanggal tidak boleh kosong!']));
        return;
    }

    $id_staff = $this->input->post('id_staff', true);
    if (empty($id_staff)) {
        $auth = $this->session->userdata('data_auth');
        if (!empty($auth)) {
            if (is_array($auth) && !empty($auth['id_staff'])) {
                $id_staff = $auth['id_staff'];
            } elseif (is_object($auth) && !empty($auth->id_staff)) {
                $id_staff = $auth->id_staff;
            }
        }
    }

    if (empty($id_staff)) {
        $id_staff = $this->session->userdata('id_staff');
    }

    if (empty($id_staff)) {
        $id_staff = 'staff_default';
    }

    // Ambil data pemantauan dari form
    $times = ['pre', 'jam1', 'jam2', 'jam3', 'jam4', 'jam5', 'jam6', 'jam7', 'jam8', 'post'];
    $params = [
        'jam_wib', 'keluhan', 'bb_kg', 'kesadaran', 'tekanan_darah_mmhg',
        'nadi_x_menit', 'suhu_c', 'qd_ml_menit', 'qb_ml_menit',
        'tekanan_vena_mmhg', 'tmp_mmhg', 'volume_yang_ditarik_ml',
        'asesmen_intervensi_keterangan', 'nama_dan_paraf_perawat'
    ];

    $allow_text = [
        'jam_wib', 'keluhan', 'kesadaran', 'tekanan_darah_mmhg',
        'asesmen_intervensi_keterangan', 'nama_dan_paraf_perawat'
    ];

    $data_pemantauan = [];
    foreach ($params as $p) {
        foreach ($times as $t) {
            $input_name = "{$t}_{$p}";
            $raw_val = $this->input->post($input_name, true);
            if (in_array($p, $allow_text)) {
                $clean_val = trim($raw_val ?? '');
            } else {
                $clean_val = $this->_san_num($raw_val ?? '');
            }
            $data_pemantauan[$p][$t] = $clean_val;
        }
    }

    // Discharge Planning
    $discharge_planning = [];
    for ($i = 1; $i <= 5; $i++) {
        $discharge_planning['point_' . $i] = trim($this->input->post("dp_text_{$i}", true) ?? '');
    }

    $data = [
        'id_pelayanan'  => $id_pelayanan,
        'id_history'    => $id_history,
        'id_staff'      => $id_staff,
        'tanggal'       => $tanggal,
        'json_data'     => json_encode($data_pemantauan),
        'tindakan_next' => $discharge_planning['point_1'],
        'edukasi'       => $discharge_planning['point_2'],
        'konsultasi'    => $discharge_planning['point_3'],
        'penunjang'     => $discharge_planning['point_4'],
        'lain_lain'     => $discharge_planning['point_5']
    ];

    // INSERT data baru (TIDAK CEK EXISTING)
    $result = $this->M_Erm_poli->insert_pemantauan_intradialitik($data);

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));
}

    public function get_data_pemantauan()
    {
        $id_pelayanan = $this->input->post('id_pelayanan', true);
        $id_history   = $this->input->post('id_history', true);

        if (empty($id_pelayanan) || empty($id_history)) {
            echo json_encode(['status' => false, 'data' => null]);
            return;
        }

        $data = $this->M_Erm_poli->get_pemantauan_by_history($id_pelayanan, $id_history);

        echo json_encode([
            'status' => true,
            'data'   => $data
        ]);
    }

    public function cetak($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
        if (!$selectPasien) {
            show_error('Data tidak ditemukan', 404);
            return;
        }

        $auth = $this->session->userdata('data_auth');

        $data_ttd = $this->M_Erm_poli->get_ttd_dokter_staff($selectPasien->dpjp, $auth->id_staff);

        $data_db = $this->M_Erm_poli->get_pemantauan_by_history($id_pelayanan, $id_history);

        $grid_data = [];
        if ($data_db && !empty($data_db['json_data'])) {
            $grid_data = is_array($data_db['data_pemantauan']) ? $data_db['data_pemantauan'] : json_decode($data_db['json_data'], true);
        }

        $data['pasien'] = $selectPasien;
        $data['db']     = $data_db;
        $data['grid']   = $grid_data;

        $data['nama_dokter'] = $data_ttd['nama_dokter'];
        $data['ttd_dokter'] = $data_ttd['ttd_dokter'];

        $data['nama_perawat'] = $data_ttd['nama_perawat'];
        $data['ttd_perawat'] =  $data_ttd['ttd_perawat'];

        $lahir = new DateTime($selectPasien->tgl_lahir);
        
        $data['umur'] = (new DateTime('today'))->diff($lahir)->y;

        $this->load->view('erm_print/view_cetak_pemantauan_intradialitik', $data);
    }

    private function _san_num($val)
    {
        if ($val === '' || $val === null) return '';
        $val = str_replace(',', '.', $val);
        return preg_replace('/[^0-9\.-]/', '', $val);
    }

/**
 * GET DATA SBAR UNTUK TABEL
 */
public function get_data_sbar()
{
    $id_pelayanan = $this->input->post('id_pelayanan');
    $id_history = $this->input->post('id_history');

    if (empty($id_pelayanan) || empty($id_history)) {
        echo json_encode(['status' => 'not found', 'data' => []]);
        return;
    }

    // PERBAIKAN: Pastikan updated_at dan created_at diambil
    $this->db->select('
        p.*,
        pasien.nama as nama_pasien,
        pasien.no_rm,
        pelayanan.tgl_masuk,
        p.created_at,
        p.updated_at
    ');
    $this->db->from('pemantauan_intradialitik p');
    $this->db->join('pelayanan', 'pelayanan.id_pelayanan = p.id_pelayanan', 'left');
    $this->db->join('pasien', 'pasien.no_rm = pelayanan.id_pasien', 'left');
    $this->db->where('p.id_pelayanan', $id_pelayanan);
    $this->db->where('p.id_history', $id_history);
    $this->db->order_by('p.id', 'DESC');
    
    $query = $this->db->get();
    
    if ($query->num_rows() > 0) {
        echo json_encode([
            'status' => 'found',
            'data' => $query->result()
        ]);
    } else {
        echo json_encode([
            'status' => 'not found',
            'data' => []
        ]);
    }
}

    /**
     * GET DATA SBAR BY ID
     */
public function get_sbar_by_id()
{
    $id = $this->input->post('id', true);
    
    if (empty($id)) {
        echo json_encode(['status' => 'not found']);
        return;
    }

    $data = $this->M_Erm_poli->get_pemantauan_intradialitik_by_id($id);
    
    if ($data) {
        echo json_encode([
            'status' => 'found',
            'data' => $data
        ]);
    } else {
        echo json_encode(['status' => 'not found']);
    }
}

/**
 * UPDATE DATA SBAR
 */
public function update_sbar()
{
    $id = $this->input->post('id', true);
    
    if (empty($id)) {
        $this->output
            ->set_status_header(400)
            ->set_content_type('application/json')
            ->set_output(json_encode(['status' => false, 'message' => 'ID tidak ditemukan']));
        return;
    }

    $id_pelayanan = trim($this->input->post('id_pelayanan', true));
    $id_history   = trim($this->input->post('id_history', true));
    $tanggal      = trim($this->input->post('tanggal', true));

    $id_staff = $this->input->post('id_staff', true);
    if (empty($id_staff)) {
        $auth = $this->session->userdata('data_auth');
        if (!empty($auth)) {
            if (is_array($auth) && !empty($auth['id_staff'])) {
                $id_staff = $auth['id_staff'];
            } elseif (is_object($auth) && !empty($auth->id_staff)) {
                $id_staff = $auth->id_staff;
            }
        }
    }

    $times = ['pre', 'jam1', 'jam2', 'jam3', 'jam4', 'jam5', 'jam6', 'jam7', 'jam8', 'post'];
    $params = [
        'jam_wib', 'keluhan', 'bb_kg', 'kesadaran', 'tekanan_darah_mmhg',
        'nadi_x_menit', 'suhu_c', 'qd_ml_menit', 'qb_ml_menit',
        'tekanan_vena_mmhg', 'tmp_mmhg', 'volume_yang_ditarik_ml',
        'asesmen_intervensi_keterangan', 'nama_dan_paraf_perawat'
    ];

    $allow_text = [
        'jam_wib', 'keluhan', 'kesadaran', 'tekanan_darah_mmhg',
        'asesmen_intervensi_keterangan', 'nama_dan_paraf_perawat'
    ];

    $data_pemantauan = [];
    foreach ($params as $p) {
        foreach ($times as $t) {
            $input_name = "{$t}_{$p}";
            $raw_val = $this->input->post($input_name, true);
            if (in_array($p, $allow_text)) {
                $clean_val = trim($raw_val ?? '');
            } else {
                $clean_val = $this->_san_num($raw_val ?? '');
            }
            $data_pemantauan[$p][$t] = $clean_val;
        }
    }

    $discharge_planning = [];
    for ($i = 1; $i <= 5; $i++) {
        $discharge_planning['point_' . $i] = trim($this->input->post("dp_text_{$i}", true) ?? '');
    }

    $data = [
        'id_pelayanan'  => $id_pelayanan,
        'id_history'    => $id_history,
        'id_staff'      => $id_staff,
        'tanggal'       => $tanggal,
        'json_data'     => json_encode($data_pemantauan),
        'tindakan_next' => $discharge_planning['point_1'],
        'edukasi'       => $discharge_planning['point_2'],
        'konsultasi'    => $discharge_planning['point_3'],
        'penunjang'     => $discharge_planning['point_4'],
        'lain_lain'     => $discharge_planning['point_5']
    ];

    // UPDATE data berdasarkan ID
    $result = $this->M_Erm_poli->update_pemantauan_intradialitik($id, $data);

    // Ambil data terbaru
    $updated_data = $this->M_Erm_poli->get_pemantauan_intradialitik_by_id($id);
    if ($updated_data) {
        $result['data'] = $updated_data;
    }

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));
}

public function delete_sbar()
{
    $id = $this->input->post('id', true);
    
    if (empty($id)) {
        echo json_encode(['status' => false, 'message' => 'ID tidak ditemukan']);
        return;
    }

    $result = $this->M_Erm_poli->delete_pemantauan_intradialitik($id);
    
    echo json_encode([
        'status' => $result,
        'message' => $result ? 'Data berhasil dihapus' : 'Gagal menghapus data'
    ]);
}

public function cetak_sbar($id)
{
    // Ambil data pemantauan berdasarkan ID
    $this->db->select('
        p.*,
        pasien.nama as nama_pasien,
        pasien.no_rm,
        pasien.tgl_lahir,
        pasien.jenis_kelamin,
        pelayanan.tgl_masuk,
        pelayanan.cara_bayar,
        pelayanan.id_pasien
    ');
    $this->db->from('pemantauan_intradialitik p');
    $this->db->join('pelayanan', 'pelayanan.id_pelayanan = p.id_pelayanan', 'left');
    $this->db->join('pasien', 'pasien.no_rm = pelayanan.id_pasien', 'left');
    $this->db->where('p.id', $id);
    $query = $this->db->get();
    
    if ($query->num_rows() == 0) {
        show_error('Data tidak ditemukan', 404);
        return;
    }
    
    $selectPasien = $query->row();
    
    // Ambil dpjp dari history_pelayanan (bukan dari pelayanan)
    $this->db->select('dpjp');
    $this->db->from('history_pelayanan');
    $this->db->where('id_pelayanan', $selectPasien->id_pelayanan);
    $this->db->where('id_history', $selectPasien->id_history);
    $history = $this->db->get()->row();
    
    $dpjp = isset($history->dpjp) ? $history->dpjp : null;
    
    // Ambil TTD (sama seperti di cetak())
    $auth = $this->session->userdata('data_auth');
    $data_ttd = $this->M_Erm_poli->get_ttd_dokter_staff($dpjp, $auth->id_staff);
    
    // Ambil data pemantauan (sama seperti get_pemantauan_by_history)
    $data_db = [
        'tindakan_next' => $selectPasien->tindakan_next ?? null,
        'edukasi' => $selectPasien->edukasi ?? null,
        'konsultasi' => $selectPasien->konsultasi ?? null,
        'penunjang' => $selectPasien->penunjang ?? null,
        'lain_lain' => $selectPasien->lain_lain ?? null,
        'json_data' => $selectPasien->json_data ?? null
    ];
    
    // Parse grid data (sama seperti di cetak())
    $grid_data = [];
    if ($data_db && !empty($data_db['json_data'])) {
        $grid_data = json_decode($data_db['json_data'], true);
    }
    
    // Siapkan data untuk view (SAMA PERSIS dengan cetak())
    $data['pasien'] = $selectPasien;
    $data['db']     = $data_db;
    $data['grid']   = $grid_data;
    
    $data['nama_dokter'] = $data_ttd['nama_dokter'] ?? '-';
    $data['ttd_dokter'] = $data_ttd['ttd_dokter'] ?? null;
    
    $data['nama_perawat'] = $data_ttd['nama_perawat'] ?? '-';
    $data['ttd_perawat'] =  $data_ttd['ttd_perawat'] ?? null;
    
    // Hitung umur (sama seperti di cetak())
    if (!empty($selectPasien->tgl_lahir)) {
        $lahir = new DateTime($selectPasien->tgl_lahir);
        $data['umur'] = (new DateTime('today'))->diff($lahir)->y;
    } else {
        $data['umur'] = '-';
    }
    
    // Tambahkan tanggal cetak
    $data['tanggal_cetak'] = date('d-m-Y H:i:s');
    
    $this->load->view('erm_print/view_cetak_sbar_intradialitik', $data);
}
}