<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catatan_keperawatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Keperawatan');
        $this->load->model('M_Pasien');
        $this->load->library('form_validation');
    }

    public function form($id_pelayanan, $id_history)
    {
        $pasien = $this->M_Pasien->getByPelayanan($id_pelayanan);
        $staff = $this->session->userdata('data_auth');

        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_history;
        $page_data['nama'] = $pasien->nama;
        $page_data['no_rm'] = $pasien->no_rm;
        $page_data['tgl_lahir'] = $pasien->tgl_lahir;
        $page_data['jenis_kelamin'] = $pasien->jenis_kelamin;
        $page_data['staff'] = isset($staff->id_staff) ? $staff->id_staff : null;

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap/view_catatan_keperawatan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function list($id_pelayanan)
    {
        $data = $this->M_Keperawatan->getByPelayanan($id_pelayanan);

        $out = [];
        foreach ($data as $index => $row) {
            $out[] = [
                'no' => $index + 1,
                'id' => $row->id,
                'jam' => $row->jam,
                'masalah' => $row->masalah,
                'instruksi' => $row->instruksi,
                'tindakan' => $row->tindakan,
                'staff' => $row->nama_staff,
                'tanggal' => $row->tanggal
            ];
        }
        echo json_encode(['data' => $out]);
    }

    public function simpan()
    {
        $auth = $this->session->userdata('data_auth');
        $tgl = date('Y-m-d H:i:s'); 
        $staff_name = null;

        if ($auth) {
            if (isset($auth->nama)) {
                $staff_name = $auth->nama;
            } elseif (isset($auth->id_staff)) {
                $this->load->model('M_Staff');
                $staff = $this->M_Staff->getById($auth->id_staff);
                $staff_name = $staff ? $staff->nama : null;
            }
        }


        $this->form_validation->set_rules('masalah', 'Masalah', 'required');
        $this->form_validation->set_rules('instruksi', 'Instruksi', 'required');
        $this->form_validation->set_rules('tindakan', 'Tindakan', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');

        if ($this->form_validation->run()) {
            $data = [
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                'no_rm' => $this->input->post('no_rm'),
                'jam' => $this->input->post('jam'),
                'masalah' => $this->input->post('masalah'),
                'instruksi' => $this->input->post('instruksi'),
                'tindakan' => $this->input->post('tindakan'),
                'tanggal' => $tgl, // ✅ tanggal MySQL
                'staff' => $staff_name
            ];

            $this->M_Keperawatan->insert($data);
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode([
                'error' => true,
                'masalah' => form_error('masalah'),
                'instruksi' => form_error('instruksi'),
                'tindakan' => form_error('tindakan'),
                'jam' => form_error('jam')
            ]);
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        if (!$id) {
            echo json_encode(['status' => 'error', 'message' => 'ID tidak ditemukan']);
            return;
        }

        $hapus = $this->M_Keperawatan->delete($id);
        echo json_encode(['status' => $hapus ? 'success' : 'error']);
    }
}
