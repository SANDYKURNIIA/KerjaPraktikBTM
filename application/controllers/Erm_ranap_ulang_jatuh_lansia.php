<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_ulang_jatuh_lansia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_IGD');
        $this->load->model('M_Erm');
        $this->load->model('M_Assembling');
        $this->load->model('M_Poli');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Erm_ranap');
    }

    /**
     * form view untuk lansia.
     */
    public function formulangjatuhlansia($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $staff        = $this->session->userdata('data_auth');

        $page_data['nama']          = $selectPasien->nama;
        $page_data['tgl_lahir']     = $selectPasien->tgl_lahir;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['cara_bayar']    = $selectPasien->cara_bayar;
        $page_data['tgl_masuk']     = $selectPasien->tgl_masuk;
        $page_data['staff']         = $staff->id_staff;
        $page_data['no_rm']         = $selectPasien->no_rm;
        $page_data['id_pelayanan']  = $id_pelayanan;
        $page_data['id_history']    = $id_history;
        $page_data['agama']         = $selectPasien->agama;
        $page_data['nama_ruangan']  = $selectPasien->poli;

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap/view_ulang_jatuh_lansia';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    /**
     * Insert asesmen + resiko untuk lansia
     */
    public function insert_asesmen()
    {
        $data  = $this->session->userdata('data_auth');
        $tgl   = date("Y-m-d H:i:s");
        $staff = $data->id_staff;

        // Validasi form
        $this->form_validation->set_rules('usia', 'Usia', 'required');
        $this->form_validation->set_rules('sensoris', 'Defisit Sensoris', 'required');
        $this->form_validation->set_rules('aktivitas', 'Aktivitas', 'required');
        $this->form_validation->set_rules('riwayat_jatuh', 'Riwayat Jatuh', 'required');
        $this->form_validation->set_rules('kognisi', 'Kognisi', 'required');
        $this->form_validation->set_rules('pengobatan', 'Pengobatan / Penggunaan Alat', 'required');
        $this->form_validation->set_rules('mobilitas', 'Mobilitas', 'required');
        $this->form_validation->set_rules('bab', 'Pola BAB/BAK', 'required');
        $this->form_validation->set_rules('komorbid', 'Komorbiditas', 'required');
        $this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
        $this->form_validation->set_rules('tipe_resiko', 'Tipe Resiko', 'required');

        if ($this->form_validation->run()) {
            // Data untuk tabel asesmen_ulang_lansia
            $data_asesmen = [
                'id_pelayanan'          => $this->input->post('id_pelayanan'),
                'id_history'            => $this->input->post('id_history'),
                'no_rm'                 => $this->input->post('no_rm'),

                'usia'                  => $this->input->post('usia'),
                'defisit_sensoris'      => $this->input->post('sensoris'),
                'aktivitas'             => $this->input->post('aktivitas'),
                'riwayat_jatuh'         => $this->input->post('riwayat_jatuh'),
                'kognisi'               => $this->input->post('kognisi'),
                'pengobatan_penggunaan' => $this->input->post('pengobatan'),
                'mobilitas'             => $this->input->post('mobilitas'),
                'pola_bab'              => $this->input->post('bab'),
                'komorbiditas'          => $this->input->post('komorbid'),

                'skor_resiko'           => $this->input->post('skor_total'),
                'tipe_resiko'           => $this->input->post('tipe_resiko'),
                'tanggal'               => $tgl,
                'staff'                 => $staff,
            ];

            $this->M_Erm_ranap->insert($data_asesmen, 'asesmen_ulang_lansia');
            $id_asesmen = $this->db->insert_id();

            // Data untuk tabel resiko_ulang_jatuh_lansia
            $data_resiko = [
                'id_asesmen'          => $id_asesmen,

                'orientasi_pasien'    => $this->input->post('orientasi_pasien'),
                'rem'                 => $this->input->post('rem'),
                'bel'                 => $this->input->post('bel'),
                'barang_berbahaya'    => $this->input->post('barang_berbahaya'),
                'lampu_malam'         => $this->input->post('lampu_malam'),
                'alat_bantu'          => $this->input->post('alat_bantu'),
                'alas_kaki'           => $this->input->post('alas_kaki'),
                'kebutuhan_pribadi'   => $this->input->post('kebutuhan_pribadi'),
                'meja_pasien'         => $this->input->post('meja_pasien'),
                'tempatkan_pasien'    => $this->input->post('tempatkan_pasien'),

                'review_obat'         => $this->input->post('review_obat'),
                'risiko_jatuh'        => $this->input->post('risiko_jatuh'),
                'gelang'              => $this->input->post('gelang'),

                'perlu_bantuan'       => $this->input->post('perlu_bantuan'),
                'pasang_pagar'        => $this->input->post('pasang_pagar'),
                'mobilisasi'          => $this->input->post('mobilisasi'),
                'kaji_kebutuhan'      => $this->input->post('kaji_kebutuhan'),
                'pindahkan_pasien'    => $this->input->post('pindahkan_pasien'),
                'pagar_pengaman'      => $this->input->post('pagar_pengaman'),
                'orientasi_ulang'     => $this->input->post('orientasi_ulang'),
                'tanda_gelang_kuning' => $this->input->post('tanda_gelang_kuning'),
            ];

            $this->M_Erm_ranap->insert($data_resiko, 'resiko_ulang_jatuh_lansia');

            $out['status'] = "success";
        } else {
            $out = [
                'error'         => true,
                'usia'          => form_error('usia'),
                'sensoris'      => form_error('sensoris'),
                'aktivitas'     => form_error('aktivitas'),
                'riwayat_jatuh' => form_error('riwayat_jatuh'),
                'kognisi'       => form_error('kognisi'),
                'pengobatan'    => form_error('pengobatan'),
                'mobilitas'     => form_error('mobilitas'),
                'bab'           => form_error('bab'),
                'komorbid'      => form_error('komorbid'),
            ];
        }

        echo json_encode($out);
    }

    /**
     * Update asesmen + resiko untuk lansia.
     * Endpoint: Erm_ranap_ulang_jatuh_lansia/update_asesmen
     */
    public function update_asesmen()
    {
        $data  = $this->session->userdata('data_auth');
        $tgl   = date("Y-m-d H:i:s");
        $staff = $data->id_staff;
        $id    = $this->input->post('id');

        // VALIDASI (disamakan dengan insert)
        $this->form_validation->set_rules('usia', 'Usia', 'required');
        $this->form_validation->set_rules('sensoris', 'Defisit Sensoris', 'required');
        $this->form_validation->set_rules('aktivitas', 'Aktivitas', 'required');
        $this->form_validation->set_rules('riwayat_jatuh', 'Riwayat Jatuh', 'required');
        $this->form_validation->set_rules('kognisi', 'Kognisi', 'required');
        $this->form_validation->set_rules('pengobatan', 'Pengobatan / Penggunaan Alat', 'required');
        $this->form_validation->set_rules('mobilitas', 'Mobilitas', 'required');
        $this->form_validation->set_rules('bab', 'Pola BAB/BAK', 'required');
        $this->form_validation->set_rules('komorbid', 'Komorbiditas', 'required');
        $this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
        $this->form_validation->set_rules('tipe_resiko', 'Tipe Resiko', 'required');

        if ($this->form_validation->run()) {

            $data_asesmen = [
                'id_pelayanan'          => $this->input->post('id_pelayanan'),
                'id_history'            => $this->input->post('id_history'),
                'no_rm'                 => $this->input->post('no_rm'),

                'usia'                  => $this->input->post('usia'),
                'defisit_sensoris'      => $this->input->post('sensoris'),
                'aktivitas'             => $this->input->post('aktivitas'),
                'riwayat_jatuh'         => $this->input->post('riwayat_jatuh'),
                'kognisi'               => $this->input->post('kognisi'),
                'pengobatan_penggunaan' => $this->input->post('pengobatan'),
                'mobilitas'             => $this->input->post('mobilitas'),
                'pola_bab'              => $this->input->post('bab'),
                'komorbiditas'          => $this->input->post('komorbid'),

                'skor_resiko'           => $this->input->post('skor_total'),
                'tipe_resiko'           => $this->input->post('tipe_resiko'),
                'tanggal'               => $tgl,
                'staff'                 => $staff,
            ];

            // Update asesmen
            $this->M_Erm_ranap->update_ulang_lansia($id, $data_asesmen);
            $id_asesmen = $id;

            $data_resiko = [
                'id_asesmen'          => $id_asesmen,

                'orientasi_pasien'    => $this->input->post('orientasi_pasien'),
                'rem'                 => $this->input->post('rem'),
                'bel'                 => $this->input->post('bel'),
                'barang_berbahaya'    => $this->input->post('barang_berbahaya'),
                'lampu_malam'         => $this->input->post('lampu_malam'),
                'alat_bantu'          => $this->input->post('alat_bantu'),
                'alas_kaki'           => $this->input->post('alas_kaki'),
                'kebutuhan_pribadi'   => $this->input->post('kebutuhan_pribadi'),
                'meja_pasien'         => $this->input->post('meja_pasien'),
                'tempatkan_pasien'    => $this->input->post('tempatkan_pasien'),
                'review_obat'         => $this->input->post('review_obat'),
                'gelang'              => $this->input->post('gelang'),
                'risiko_jatuh'        => $this->input->post('risiko_jatuh'),
                'perlu_bantuan'       => $this->input->post('perlu_bantuan'),
                'pasang_pagar'        => $this->input->post('pasang_pagar'),
                'mobilisasi'          => $this->input->post('mobilisasi'),
                'kaji_kebutuhan'      => $this->input->post('kaji_kebutuhan'),
                'pindahkan_pasien'    => $this->input->post('pindahkan_pasien'),
                'pagar_pengaman'      => $this->input->post('pagar_pengaman'),
                'orientasi_ulang'     => $this->input->post('orientasi_ulang'),
                'tanda_gelang_kuning' => $this->input->post('tanda_gelang_kuning'),
            ];

            // Update resiko
            $this->M_Erm_ranap->update_resiko_ulang_jatuh_lansia($id_asesmen, $data_resiko);

            $out['status'] = "success";
        } else {

            // Jika validasi gagal — disamakan juga
            $out = [
                'error'         => true,
                'usia'          => form_error('usia'),
                'sensoris'      => form_error('sensoris'),
                'aktivitas'     => form_error('aktivitas'),
                'riwayat_jatuh' => form_error('riwayat_jatuh'),
                'kognisi'       => form_error('kognisi'),
                'pengobatan'    => form_error('pengobatan'),
                'mobilitas'     => form_error('mobilitas'),
                'bab'           => form_error('bab'),
                'komorbid'      => form_error('komorbid'),
            ];
        }

        echo json_encode($out);
    }

    /**
     * Mendapatkan data asesmen + resiko (gabungan) berdasarkan id_asesmen
     * Endpoint dipanggil oleh AJAX pada view.
     */
    public function get_ass_per()
    {
        $id = $this->input->post('id');

        // Menggabungkan data dari dua tabel menggunakan LEFT JOIN
        $this->db->select('a.*, b.*');
        $this->db->from('asesmen_ulang_lansia a');
        $this->db->join('resiko_ulang_jatuh_lansia b', 'a.id_asesmen = b.id_asesmen', 'left');
        $this->db->where('a.id_asesmen', $id);
        $db = $this->db->get()->row_array();

        if (! empty($db)) {
            $db['status_dt'] = 'found';
        } else {
            $db = ['status_dt' => 'not found'];
        }

        echo json_encode($db);
        exit;
    }

    /**
     * Menampilkan list asesmen ulang per id_pelayanan (DataTable)
     * Endpoint: tampil_list_per_pen_rujukan
     */

    public function tampil_list_per_pen_rujukan()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data    = $this->M_Erm_ranap->selectUlangJatuhLansia($id_pelayanan);
        $data         = $this->session->userdata('data_auth');
        $staff        = $data->nama;
        if ($staff == "st33") {
            $nama = "rawatinap";
        } else {
            $data->nama;
        }
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $no          = $i + 1;
            $tombol      = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_asesmen . "\")'><i class='icon-rocket'></i></button>";
            $skor_total  = $page_data[$i]->skor_resiko;
            $tanggal     = strtotime($page_data[$i]->tanggal);
            $date        = strftime("%A, %d %B %Y ", $tanggal);
            $tipe_resiko = $page_data[$i]->tipe_resiko;

            $staff = $staff;

            $out[$i] = [$no, $tombol, $skor_total, $date, $staff, $tipe_resiko];
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
}