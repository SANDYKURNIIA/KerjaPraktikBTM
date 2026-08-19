<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_awal_jatuh_anak extends CI_Controller
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


    public function form($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        // $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
        $staff = $this->session->userdata('data_auth');

        $page_data['nama'] = $selectPasien->nama;
        // $page_data['no_hp'] = $selectPasien->no_hp;
        // $page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
        $page_data['tgl_lahir']       = $selectPasien->tgl_lahir;
        $page_data['jenis_kelamin']   = $selectPasien->jenis_kelamin;
        $page_data['cara_bayar']      = $selectPasien->cara_bayar;
        $page_data['tgl_masuk']       = $selectPasien->tgl_masuk;
        $page_data['staff']           = $staff->id_staff;
        $page_data['no_rm']           = $selectPasien->no_rm;
        $page_data['id_pelayanan']    = $id_pelayanan;
        $page_data['id_history']      = $id_history;
        $page_data['agama']           = $selectPasien->agama;
        $page_data['nama_ruangan']    = $selectPasien->poli;
        $page_data['diagnosa']        = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['riwayat_asesmen'] = $this->M_Erm_ranap->getRiwayatAsesmenAnak($id_pelayanan, $id_history);

        // Path view sesuai folder case-sensitive'
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap/view_awal_jatuh_anak';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    // public function simpan()
    // {
    //     $id_pelayanan = $this->input->post('id_pelayanan');
    //     $id_history   = $this->input->post('id_history');

    //     $data = [
    //         'id_pelayanan'  => $id_pelayanan,
    //         'id_histori'    => $id_history,
    //         'no_rm'         => $this->input->post('no_rm'),
    //         'nama_pasien'   => $this->input->post('nama_pasien'),
    //         'tanggal_lahir' => $this->input->post('tanggal_lahir'),
    //         'jenis_kelamin' => $this->input->post('jenis_kelamin'),
    //         'ruang_rawat'   => $this->input->post('ruang_rawat'),

    //         'faktor_a'      => $this->input->post('faktor_a'),
    //         'faktor_b'      => $this->input->post('faktor_b'),
    //         'faktor_c'      => $this->input->post('faktor_c'),
    //         'faktor_d'      => $this->input->post('faktor_d'),
    //         'faktor_e'      => $this->input->post('faktor_e'),
    //         'faktor_f'      => $this->input->post('faktor_f'),
    //         'faktor_g'      => $this->input->post('faktor_g'),

    //         'skor_total'    => $this->input->post('skor_total'),

    //         'tanggal_input' => date('Y-m-d H:i:s'),
    //         'user_input'    => $this->session->userdata('username'),
    //     ];

    //     $this->M_awal_jatuh_anak->save($data);

    //     redirect('Erm/view/' . $id_pelayanan . '/' . $id_history);
    // }

    public function insert_asesmen()
    {
        $data  = $this->session->userdata('data_auth');
        $tgl   = date("Y-m-d h:i:s");
        $staff = $data->id_staff;

        // Validasi form
        $this->form_validation->set_rules('usia', 'Usia', 'required');
        $this->form_validation->set_rules('kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('diagnosa', 'Diagnosa', 'required');
        $this->form_validation->set_rules('kognitif', 'Gangguan Kognitif', 'required');
        $this->form_validation->set_rules('lingkungan', 'Faktor Lingkungan', 'required');
        $this->form_validation->set_rules('response', 'Respon Pasien', 'required');
        $this->form_validation->set_rules('obat', 'Penggunaan Obat', 'required');
        $this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
        $this->form_validation->set_rules('tipe_resiko', 'Tipe Resiko', 'required');

        if ($this->form_validation->run()) {
            // Data untuk tabel asesmen_ulang_anak
            $data_asesmen = [
                'id_pelayanan'      => $this->input->post('id_pelayanan'),
                'id_history'        => $this->input->post('id_history'),
                'no_rm'             => $this->input->post('no_rm'),
                'tanggal'           => $tgl,
                'usia'              => $this->input->post('usia'),
                'jenis_kelamin'     => $this->input->post('kelamin'),
                'diagnosa'          => $this->input->post('diagnosa'),
                'gangguan_kognitif' => $this->input->post('kognitif'),
                'faktor_lingkungan' => $this->input->post('lingkungan'),
                'respon_pasien'     => $this->input->post('response'),
                'penggunaan_obat'   => $this->input->post('obat'),
                'skor_resiko'       => $this->input->post('skor_total'),
                'tipe_resiko'       => $this->input->post('tipe_resiko'),
                'staff'             => $staff,
            ];

            // Simpan data ke tabel asesmen_ulang_dewasa
            $this->M_Erm_ranap->insert($data_asesmen, 'asesmen_ulang_anak');

            // Dapatkan id_asesmen yang baru disimpan
            $id_asesmen = $this->db->insert_id();

            // Data untuk tabel resiko_ulang_jatuh_dewasa
            $data_resiko = [
                'id_asesmen'                  => $id_asesmen,
                'orientasikan_pasien'         => $this->input->post('orientasikan_pasien'),
                'rem_tempat_tidur'            => $this->input->post('rem_tempat_tidur'),
                'pastikel_bel'                => $this->input->post('pastikel_bel'),
                'singkirkan_barang_berbahaya' => $this->input->post('singkirkan_barang_berbahaya'),
                'persetujuan_pasien'          => $this->input->post('persetujuan_pasien'),
                'alat_bantu_jalan'            => $this->input->post('alat_bantu_jalan'),
                'alas_kaki'                   => $this->input->post('alas_kaki'),
                'kebutuhan_pribadi'           => $this->input->post('kebutuhan_pribadi'),
                'meja_pasien'                 => $this->input->post('meja_pasien'),
                'tempatkan_pasien'            => $this->input->post('tempatkan_pasien'),
                'review_obat_berisiko'        => $this->input->post('review_obat_berisiko'),
                'kebutuhan_pasien'            => $this->input->post('kebutuhan_pasien'),
                'pagar_pegangan'              => $this->input->post('pagar_pegangan'),
                'pindahkan_pasien'            => $this->input->post('pindahkan_pasien'),
                'orientasi_ulang'             => $this->input->post('orientasi_ulang'),
                'tanda_gelang_kuning'         => $this->input->post('tanda_gelang_kuning'),
            ];

            // Simpan data ke tabel resiko_ulang_jatuh_dewasa
            $this->M_Erm_ranap->insert($data_resiko, 'resiko_ulang_jatuh_anak');

            $out['status'] = "success";
        } else {
            // Jika validasi gagal
            $out = [
                'error'             => true,
                'riwayat_jatuh'     => form_error('jatuh'),
                'diagnosa_sekunder' => form_error('sekunder'),
                'bantu		'           => form_error('bantu'),
                'infus'             => form_error('infus'),
                'gaya_jalan'        => form_error('berjalan'),
                'status_mental'     => form_error('mental'),
                'skor_total'        => form_error('skor_total'),
                'tipe_resiko'       => form_error('tipe_resiko'),
            ];
        }

        echo json_encode($out);
    }

    
    public function update_asesmen_anak()
    {
        $data  = $this->session->userdata('data_auth');
        $tgl   = date("Y-m-d h:i:s");
        $staff = $data->id_staff;
        $id    = $this->input->post('id');

        // Validasi form
        $this->form_validation->set_rules('usia', 'Usia', 'required');
        $this->form_validation->set_rules('kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('diagnosa', 'Diagnosa', 'required');
        $this->form_validation->set_rules('kognitif', 'Gangguan Kognitif', 'required');
        $this->form_validation->set_rules('lingkungan', 'Faktor Lingkungan', 'required');
        $this->form_validation->set_rules('response', 'Respon Pasien', 'required');
        $this->form_validation->set_rules('obat', 'Penggunaan Obat', 'required');
        $this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
        $this->form_validation->set_rules('tipe_resiko', 'Tipe Resiko', 'required');


        if ($this->form_validation->run()) {
            // Data untuk tabel asesmen_ulang_anak
            $data_asesmen = [
                'id_pelayanan'      => $this->input->post('id_pelayanan'),
                'id_history'        => $this->input->post('id_history'),
                'no_rm'             => $this->input->post('no_rm'),
                'tanggal'           => $tgl,
                
                'usia'              => $this->input->post('usia'),
                'jenis_kelamin'     => $this->input->post('kelamin'),
                'diagnosa'          => $this->input->post('diagnosa'),
                'gangguan_kognitif' => $this->input->post('kognitif'),
                'faktor_lingkungan' => $this->input->post('lingkungan'),
                'respon_pasien'     => $this->input->post('response'),
                'penggunaan_obat'   => $this->input->post('obat'),
                'skor_resiko'       => $this->input->post('skor_total'),
                'tipe_resiko'       => $this->input->post('tipe_resiko'),
                'staff'             => $staff,
            ];

            // Update data ke tabel asesmen_ulang_dewasa
            $this->M_Erm_ranap->update_ulang_anak($id, $data_asesmen);

            $id_asesmen = $id;

            // Data untuk tabel resiko_ulang_jatuh_dewasa
            $data_resiko = [
                'id_asesmen'                  => $id_asesmen,
                'orientasikan_pasien'         => $this->input->post('orientasikan_pasien'),
                'rem_tempat_tidur'            => $this->input->post('rem_tempat_tidur'),
                'pastikel_bel'                => $this->input->post('pastikel_bel'),
                'singkirkan_barang_berbahaya' => $this->input->post('singkirkan_barang_berbahaya'),
                'persetujuan_pasien'          => $this->input->post('persetujuan_pasien'),
                'alat_bantu_jalan'            => $this->input->post('alat_bantu_jalan'),
                'alas_kaki'                   => $this->input->post('alas_kaki'),
                'kebutuhan_pribadi'           => $this->input->post('kebutuhan_pribadi'),
                'meja_pasien'                 => $this->input->post('meja_pasien'),
                'tempatkan_pasien'            => $this->input->post('tempatkan_pasien'),
                'review_obat_berisiko'        => $this->input->post('review_obat_berisiko'),
                'kebutuhan_pasien'            => $this->input->post('kebutuhan_pasien'),
                'pagar_pegangan'              => $this->input->post('pagar_pegangan'),
                'pindahkan_pasien'            => $this->input->post('pindahkan_pasien'),
                'orientasi_ulang'             => $this->input->post('orientasi_ulang'),
                'tanda_gelang_kuning'         => $this->input->post('tanda_gelang_kuning'),
            ];

            // Update data ke tabel resiko_ulang_jatuh_dewasa
            $this->M_Erm_ranap->update_resiko_ulang_jatuh_anak($id, $data_resiko);

            $out['status'] = "success";
        } else {
            // Jika validasi gagal
            $out = [
                'error'             => true,
                'riwayat_jatuh'     => form_error('jatuh'),
                'diagnosa_sekunder' => form_error('sekunder'),
                'bantu		'       => form_error('bantu'),
                'infus'             => form_error('infus'),
                'gaya_jalan'        => form_error('berjalan'),
                'status_mental'     => form_error('mental'),
                'skor_total'        => form_error('skor_total'),
                'tipe_resiko'       => form_error('tipe_resiko'),
            ];
        }

        echo json_encode($out);
    }

    public function formulangjatuhanak($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        // $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
        $staff = $this->session->userdata('data_auth');

        $page_data['nama'] = $selectPasien->nama;
        // $page_data['no_hp'] = $selectPasien->no_hp;
        // $page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
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

        // $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
        // $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap/view_awal_jatuh_anak';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_list_per_pen_rujukan()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data    = $this->M_Erm_ranap->selectUlangJatuhAnak($id_pelayanan);
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

    public function get_ass_per()
    {
        $id = $this->input->post('id');

        // Menggabungkan data dari dua tabel menggunakan JOIN
        $this->db->select('a.*, b.*');
        $this->db->from('asesmen_ulang_anak a');
        $this->db->join('resiko_ulang_jatuh_anak b', 'a.id_asesmen = b.id_asesmen', 'left');
        $this->db->where('a.id_asesmen', $id);

        $db = $this->db->get()->row_array();

        if (!empty($db)) {
            $db['status_dt'] = 'found';
        } else {
            $db = ['status_dt' => 'not found'];
        }

        echo json_encode($db);
        exit;
    }
}