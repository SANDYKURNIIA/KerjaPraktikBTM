<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_status_kesadaran_icu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
         // ✅ Pastikan timezone Indonesia (WIB)
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Erm_status_kesadaran_icu_model', 'status_icu');
        $this->load->helper('url');
    }

    // === FORM UTAMA ===   
    public function formstatus($id_pelayanan, $id_history)
    {
        $data['id_pelayanan'] = $id_pelayanan;
        $data['id_histori']   = $id_history;

        // Ambil data pasien
        $data['pasien'] = $this->status_icu->get_data_pasien($id_pelayanan);

        // Ambil data status ICU jika sudah ada
        $data['status_icu'] = $this->status_icu->get_status_by_history($id_pelayanan, $id_history);

        $this->load->view('assets/_header');
        $data['page_content'] = 'erm_form/Ranap/view_form_status_kesadaran_icu';
        $this->load->view('Main', $data);
        $this->load->view('assets/_footer');
    }

    // === SIMPAN DATA ===
    public function simpan()
    {
        // Ambil ID staff dari session
        $id_staff = null;
        if (!empty($this->session->userdata('data_auth')->id_staff)) {
            $id_staff = $this->session->userdata('data_auth')->id_staff;
        } elseif (!empty($this->session->userdata('sso_user_data')->id_staff)) {
            $id_staff = $this->session->userdata('sso_user_data')->id_staff;
        }

        // Data yang akan disimpan
        $data = [
            'id_pelayanan'   => $this->input->post('id_pelayanan'),
            'id_history'     => $this->input->post('id_history'),
            'no_rm'          => $this->input->post('no_rm'),
            'tanggal'        => $this->input->post('tanggal'),
            'gcs_e'          => $this->input->post('gcs_e'),
            'gcs_v'          => $this->input->post('gcs_v'),
            'gcs_m'          => $this->input->post('gcs_m'),
            'total_gcs'      => $this->input->post('total_gcs'),
            'pupil_kanan'    => $this->input->post('pupil_kanan'),
            'pupil_kiri'     => $this->input->post('pupil_kiri'),
            'refleks_cahaya' => $this->input->post('refleks_cahaya'),
            'keterangan'     => $this->input->post('keterangan'),
            'id_staff'       => $id_staff,
            'tgl_input'      => date('Y-m-d H:i:s'),
        ];

        $result = $this->status_icu->simpan_status($data);

        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'failed']);
        }
    }



    // === LOAD DATA UNTUK DATATABLES ===
    public function tampil_list_per_id()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $list = $this->status_icu->get_by_pelayanan($id_pelayanan);

        $data = [];
        $no = 1;
        foreach ($list as $row) {
            $data[] = [
                $no++,
                '<button on class="btn btn-danger btn-sm hapus" data-id="' . $row->id . '"><i class="fa fa-trash"></i></button>',
                $row->tanggal,
                $row->jam,
                $row->gcs_e . '/' . $row->gcs_v . '/' . $row->gcs_m,
                $row->total_gcs,
                $row->pupil_kanan,
                $row->pupil_kiri,
                $row->refleks_cahaya,
                $row->keterangan,
            ];
        }

        echo json_encode(['data' => $data]);
    }

    // === HAPUS DATA ===
    public function hapus()
    {
        $id = $this->input->post('id');
        $result = $this->status_icu->hapus_data($id);
        echo json_encode(['status' => $result ? 'success' : 'failed']);
    }
}
