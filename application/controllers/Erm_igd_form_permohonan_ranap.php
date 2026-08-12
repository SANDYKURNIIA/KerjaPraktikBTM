<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property M_Erm $M_Erm
 * @property M_Permohonan_Ranap $M_Permohonan_Ranap
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Insert $insert
 * @property CI_db $db
 */
class Erm_igd_form_permohonan_ranap extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->database();
        $this->load->model('M_Permohonan_Ranap');
        $this->load->model('M_IGD');
        $this->load->model('M_Apotik');
        $this->load->model('M_Erm');
        $this->load->model('M_Erm_poli');
        $this->load->model('M_Assembling');
        $this->load->model('M_Poli');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_TransferPasien');
        $this->load->library('session');
    }

    public function index($id_pelayanan)
    {
        $page_data['page_content'] = 'page_content/Erm';
        $data['permohonan'] = $this->M_Permohonan_Ranap
            ->get_by_pelayanan($id_pelayanan);

        $this->load->view('assets/_header');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
        $this->load->view('form_permohonan_ranap', $data);
    }

    public function form($id_pelayanan, $id_history)
    {

        $data['selectPasien'] = $this->M_Erm->selectDataPasienIGDby_id($id_pelayanan, $id_history);
        $data['staff'] = $this->session->userdata('data_auth');
        $data['id_pelayanan'] = $id_pelayanan;
        $data['id_history'] = $id_history;
        $data['ruangan'] = $this->M_Permohonan_Ranap->get_ruangan();
        $data['ruangan_pasien'] = $this->M_Permohonan_Ranap->get_ruangan_pasien($id_pelayanan);
        $data['list_poli'] = $this->M_Permohonan_Ranap->get_list_poli();
        $data['dokter'] = $this->M_Permohonan_Ranap->get_dokter();
        $data['cara_bayar'] = $this->M_Permohonan_Ranap->get_cara_bayar_pasien($id_pelayanan);
        $data['url_back'] = $_SERVER['HTTP_REFERER'] ?? '';
        $data['page_content'] = 'erm_form/view_igd_form_permohonan_ranap';
        $data['sudah_simpan'] = $this->M_Permohonan_Ranap
            ->get_by_pelayanan($id_pelayanan);

        $this->load->model('M_Permohonan_Ranap');
        $this->load->view('assets/_header');
        $this->load->view('Main', $data);
        $this->load->view('assets/_footer');
    }

    public function get_data()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Permohonan_Ranap->get_by_pelayanan($id_pelayanan);
        echo json_encode($data);
    }

    public function simpan()
    {
        $hubungan = $this->input->post('hubungan');

        if ($hubungan == 'Lainnya') {
            $hubungan = $this->input->post('hubungan_lainnya');
        }
        $staff = $this->session->userdata('data_auth');
        $id_staff = isset($staff->id_staff) ? $staff->id_staff : null;
        $id_poli   = $this->input->post('id_list_poli');
        $id_dokter = $this->input->post('id_dokter');

        // ambil nama poli (PERHATIKAN: pakai nama_panjang)
        $poli = $this->db->get_where('list_poli', ['id_list_poli' => $id_poli])->row();
        $nama_poli = $poli ? $poli->nama_panjang : null;

        // ambil nama dokter (PERHATIKAN: pakai nama)
        $dokter = $this->db->get_where('dokter', ['id_dokter' => $id_dokter])->row();
        $nama_dokter = $dokter ? $dokter->nama : null;

        $data = [
            'id_pelayanan' => $this->input->post('id_pelayanan'),
            'id_history'   => $this->input->post('id_history'),
            'id_staff' => $id_staff,

            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'tgl_lahir_pemohon' => $this->input->post('tgl_lahir_pemohon'),
            'jenkel_pemohon' => $this->input->post('jenkel_pemohon'),
            'alamat_pemohon' => $this->input->post('alamat_pemohon'),
            'hubungan' => $hubungan,
            'id_list_poli' => $id_poli,
            'nama_spesialis' => $nama_poli,

            'id_dokter' => $id_dokter,
            'nama_dokter' => $nama_dokter,

            'id_ruangan' => $this->input->post('id_ruangan'),
            'diagnosa' => $this->input->post('diagnosa'),
            'ttd_digital' => $this->input->post('ttd_digital'),
            'tanggal_input' => date('Y-m-d H:i:s')
        ];

        $cek = $this->M_Permohonan_Ranap->get_by_pelayanan(
            $this->input->post('id_pelayanan')
        );

        if ($cek) {
            $proses = $this->M_Permohonan_Ranap->update_by_pelayanan(
                $this->input->post('id_pelayanan'),
                $data
            );
        } else {
            $proses = $this->M_Permohonan_Ranap->insert($data);
        }

        if ($proses) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data berhasil disimpan'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menyimpan data'
            ]);
        }
    }

    public function cek_permohonan()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $cek = $this->M_Permohonan_Ranap->get_by_pelayanan($id_pelayanan);
        $this->load->model('M_Permohonan_Ranap');

        if ($cek) {
            echo json_encode(['permohonan' => 'found']);
        } else {
            echo json_encode(['permohonan' => 'empty']);
        }
    }

    public function cetak($id_pelayanan)
    {
        $data = $this->M_Permohonan_Ranap->get_by_pelayanan($id_pelayanan);

        if (!$data) {
            show_404();
        }

        $pasien = $this->M_Erm->selectDataPasienIGDby_id(
            $data->id_pelayanan,
            $data->id_history
        );

        if (is_array($pasien)) {
            $pasien = count($pasien) > 0 ? $pasien[0] : null;
        }

        $poli = $this->db->get_where('list_poli', [
            'id_list_poli' => $data->id_list_poli
        ])->row();

        $dokter = $this->db->get_where('dokter', [
            'id_dokter' => $data->id_dokter
        ])->row();

        $staff = $this->db->get_where('staff', [
            'id_staff' => $data->id_staff
        ])->row();

        $ruangan = $this->db->get_where('ruangan', [
            'id_ruangan' => $data->id_ruangan
        ])->row();

        $this->load->view('print/cetak_permohonan_ranap', [
            'data' => $data,
            'pasien' => $pasien,
            'poli' => $poli,
            'dokter' => $dokter,
            'staff' => $staff,
            'ruangan' => $ruangan
        ]);
    }
}
