<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property M_Erm $M_Erm
 * @property M_Erm_ranap $M_Erm_ranap
 * @property M_laporan_tindakan_kebidanan $M_laporan_tindakan_kebidanan
 * @property M_Permohonan_Ranap $M_Permohonan_Ranap
 * @property M_form_ekg $M_form_ekg
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Insert $insert
 * @property CI_db $db
 */

class Erm_form_ekg extends CI_Controller
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
        $this->load->model('M_Permohonan_Ranap');
        $this->load->model('M_form_ekg');
    }

    public function get_data($id_pelayanan, $id_history)
    {
        $data = $this->db
            ->where('id_pelayanan', $id_pelayanan)
            ->where('id_history', $id_history)
            ->get('form_ekg')
            ->row();

        echo json_encode($data);
    }

    public function form($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_form_ekg->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        // $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);

        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history']   = $id_history;

        $page_data['selectPasien'] = $selectPasien;
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['nama'] = $selectPasien->nama;
        $page_data['cara_bayar'] = $this->M_Permohonan_Ranap->get_cara_bayar_pasien($id_pelayanan);
        $page_data['url_back'] = site_url('erm_ranap');
        $ekg = $this->db->get_where('form_ekg', [
            'id_pelayanan' => $id_pelayanan,
            'id_history'   => $id_history
        ])->row();

        $page_data['ekg'] = $ekg;

        $this->load->model('M_laporan_tindakan_kebidanan');

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/view_form_ekg';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function simpan()
    {
        // ambil data dasar
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history   = $this->input->post('id_history');
        $data_auth    = $this->session->userdata('data_auth');
        $id_staff     = $data_auth->id_staff ?? null;

        // ambil tanggal dari input user
        $tanggal_input_user = $this->input->post('tanggal');

        $input_time = DateTime::createFromFormat('Y-m-d\TH:i', $tanggal_input_user);
        $now = new DateTime();

        if ($input_time > $now) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Tanggal pemeriksaan tidak boleh melebihi waktu saat ini'
            ]);
            return;
        }

        $tanggal_pemeriksaan = date(
            'Y-m-d H:i:s',
            strtotime($tanggal_input_user)
        );

        // helper format
        $format = function ($val, $ket) {
            return !empty($ket) ? $val . ', ' . $ket : $val;
        };

        $data = [
            'id_pelayanan' => $id_pelayanan,
            'id_history'   => $id_history,
            'id_staff'     => $id_staff,

            'tanggal_pemeriksaan' => $tanggal_pemeriksaan,
            'tanggal_input'       => date('Y-m-d H:i:s'),

            'irama'       => $this->input->post('irama'),
            'gelombang_p' => $this->input->post('gelombang_p'),

            'pr_interval' => $format(
                $this->input->post('pr_interval'),
                $this->input->post('abnormal_ket1')
            ),

            'kompleks_qrs' => $format(
                $this->input->post('kompleks_qrs'),
                $this->input->post('abnormal_ket2')
            ),

            'q_pathologis' => $format(
                $this->input->post('q_pathologis'),
                $this->input->post('ada_ket1')
            ),

            'st_segmen' => $format(
                $this->input->post('st_segmen'),
                $this->input->post('elevasi_ket')
            ),

            't_inverted' => $format(
                $this->input->post('t_inverted'),
                $this->input->post('ada_ket2')
            ),

            'kesimpulan' => $this->input->post('kesimpulan'),
        ];

        // insert
        $insert = $this->db->insert('form_ekg', $data);

        // response
        if ($insert) {
            echo json_encode([
                'status'  => 'success',
                'message' => 'Data EKG berhasil disimpan'
            ]);
        } else {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Gagal menyimpan data'
            ]);
        }
    }

    public function update()
    {
        $id_history = $this->input->post('id_history');

        $format = function ($val, $ket) {
            return !empty($ket) ? $val . ', ' . $ket : $val;
        };

        $tanggal_input_user = $this->input->post('tanggal');

        $tanggal_pemeriksaan = date(
            'Y-m-d H:i:s',
            strtotime($tanggal_input_user)
        );

        $data = [
            'tanggal_pemeriksaan' => $tanggal_pemeriksaan,
            'tanggal_input' => date('Y-m-d H:i:s'),
            'irama'       => $this->input->post('irama'),
            'gelombang_p' => $this->input->post('gelombang_p'),
            'pr_interval' => $format(
                $this->input->post('pr_interval'),
                $this->input->post('abnormal_ket1')
            ),
            'kompleks_qrs' => $format(
                $this->input->post('kompleks_qrs'),
                $this->input->post('abnormal_ket2')
            ),
            'q_pathologis' => $format(
                $this->input->post('q_pathologis'),
                $this->input->post('ada_ket1')
            ),
            'st_segmen' => $format(
                $this->input->post('st_segmen'),
                $this->input->post('elevasi_ket')
            ),
            't_inverted' => $format(
                $this->input->post('t_inverted'),
                $this->input->post('ada_ket2')
            ),
            'kesimpulan' => $this->input->post('kesimpulan'),
        ];

        $this->db->where('id_history', $id_history);
        $update = $this->db->update('form_ekg', $data);

        echo json_encode([
            'status' => $update ? 'success' : 'error',
            'message' => $update ? 'Data berhasil diupdate' : 'Gagal update'
        ]);
    }

    public function cetak($id_pelayanan, $id_history)
    {
        // ambil data pasien (sama kayak form)
        $selectPasien = $this->M_form_ekg->selectDataPasienRanapby_id($id_pelayanan, $id_history);

        // ambil data EKG
        $ekg = $this->db->get_where('form_ekg', [
            'id_pelayanan' => $id_pelayanan,
            'id_history'   => $id_history
        ])->row();

        // lempar ke view
        $data['pasien'] = $selectPasien;
        $data['ekg']    = $ekg;

        // load view khusus cetak (tanpa header/footer biar clean)
        $this->load->view('print/cetak_form_ekg', $data);
    }


    public function form_edit($id_pelayanan = null, $id_histori = null, $jenis_pelayanan = null)
    {
        // Ambil data assesmen berdasarkan id_histori
        $form_ekg = $this->M_form_ekg->get_by_histori($id_histori);

        if (!$form_ekg) {
            show_error("Data form_ekg tidak ditemukan untuk ID histori: {$id_histori}");
            return;
        }

        // Redirect ke form utama
        redirect("Erm_form_ekg/form/{$id_pelayanan}/{$id_histori}/{$jenis_pelayanan}");
    }
}
