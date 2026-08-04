<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property M_Erm $M_Erm
 * @property M_Erm_ranap $M_Erm_ranap
 * @property M_laporan_tindakan_kebidanan $M_laporan_tindakan_kebidanan
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Insert $insert
 * @property CI_db $db
 */

class Erm_laporan_tindakan_kebidanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_IGD');
        $this->load->model('M_Erm');
        $this->load->model('M_Assembling');
        $this->load->model('M_Poli');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Erm_ranap');
        $this->load->model('M_Erm_masalah_kep');
        $this->load->model('M_laporan_tindakan_kebidanan');
    }

    public function form($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        // $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);

        $staff = $this->session->userdata('data_auth');
        $page_data['selectPasien'] = $selectPasien;
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['nama'] = $selectPasien->nama;
        $page_data['tgl_lahir'] = date('d-m-Y', strtotime($selectPasien->tgl_lahir));
        $page_data['alamat'] = $selectPasien->alamat;
        $page_data['list_penolong'] = $this->M_laporan_tindakan_kebidanan->getPenolong();
        $page_data['url_back'] = site_url('erm_ranap/form/' . urlencode(base64_encode($id_pelayanan)) . '/' .
            urlencode(base64_encode($id_history)));

        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history']   = $id_history;

        $this->load->model('M_laporan_tindakan_kebidanan');

        $laporan = $this->M_laporan_tindakan_kebidanan
            ->get_by_pelayanan($id_pelayanan);

        $page_data['laporan'] = $laporan;
        $jam = $this->session->userdata('jam_kebidanan_' . $id_pelayanan);
        $page_data['jam_kebidanan'] = $jam;

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap/view_laporan_tindakan_kebidanan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function simpan()
    {
        $id_pelayanan        = $this->input->post('id_pelayanan');
        $id_history          = $this->input->post('id_history');
        $jenis_persalinan    = $this->input->post('jenis_persalinan');
        $penolong            = $this->input->post('penolong');
        $asisten             = $this->input->post('asisten');
        $tanggal_input       = $this->input->post('tanggal'); // dari datetime-local
        $jalannya_persalinan = $this->input->post('jalannya_persalinan');

        if (
            !$id_pelayanan ||
            !$id_history ||
            !$penolong ||
            !$asisten ||
            !$tanggal_input
        ) {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Data wajib belum lengkap!'
            ]);
            return;
        }

        $tanggal = date('Y-m-d H:i:s', strtotime($tanggal_input));
        $tanggal_input = date('Y-m-d H:i:s');

        $staff = $this->session->userdata('data_auth');
        $id_staff = $staff->id_staff;

        $penolong_data = $this->M_laporan_tindakan_kebidanan->getStaffById($penolong);
        $asisten_data  = $this->M_laporan_tindakan_kebidanan->getStaffById($asisten);

        // susun data
        $data = [
            'id_pelayanan'        => $id_pelayanan,
            'id_history'          => $id_history,
            'id_staff'            => $id_staff,
            'jenis_persalinan'    => $jenis_persalinan,
            'penolong'            => $penolong_data ? $penolong_data->nama : null,
            'asisten'             => $asisten_data ? $asisten_data->nama : null,
            'tanggal'             => $tanggal, // ✅ sudah datetime
            'jalannya_persalinan' => $jalannya_persalinan,
            'tanggal_input' => $tanggal_input
        ];

        $existing = $this->M_laporan_tindakan_kebidanan
            ->get_by_pelayanan($id_pelayanan);

        if ($existing) {
            $update = $this->M_laporan_tindakan_kebidanan
                ->updateByPelayanan($id_pelayanan, $data);

            if ($update) {
                echo json_encode([
                    'status'  => 'success',
                    'message' => 'Data berhasil diupdate!'
                ]);
            }
        } else {
            $insert = $this->M_laporan_tindakan_kebidanan
                ->insertData($data);

            if ($insert) {
                echo json_encode([
                    'status'  => 'success',
                    'message' => 'Data berhasil disimpan!'
                ]);
            }
        }
    }

    public function cek_laporan()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');

        $this->load->model('M_laporan_tindakan_kebidanan');
        $cek = $this->M_laporan_tindakan_kebidanan->get_by_pelayanan($id_pelayanan);

        if ($cek) {
            echo json_encode([
                'status' => 'found'
            ]);
        } else {
            echo json_encode([
                'status' => 'empty'
            ]);
        }
    }

    public function cetak($id_pelayanan)
    {
        $data['laporan'] = $this->M_laporan_tindakan_kebidanan
            ->get_by_pelayanan($id_pelayanan);

        $data = $this->M_laporan_tindakan_kebidanan->get_by_pelayanan($id_pelayanan);
        $pasien = $this->M_Erm->selectDataPasienIGDby_id(
            $data->id_pelayanan,
            $data->id_history
        );

        $this->load->view('print/cetak_laporan_tindakan_kebidanan', [
            'data' => $data,
            'pasien' => $pasien,

        ]);
    }
}
