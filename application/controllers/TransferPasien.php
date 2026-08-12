<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransferPasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Erm_ranap');
        $this->load->model('M_status_respirasi'); // ← tambahkan model baru
        $this->load->helper(['url']);
        $this->load->library(['user_agent']);
        $this->load->model('M_Erm');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_TransferPasien');
    }

    public function form($id_pelayanan, $id_history)
    {
        // Gunakan string apa adanya (misal: pl_9, ranap_10)
        $page_data['id_pelayanan'] = (string)$id_pelayanan;
        $page_data['id_history']   = (string)$id_history;

        $auth = $this->session->userdata('data_auth');

        $page_data['username_login'] = $auth ? $auth->username : '';
        // list dokter dari tabel dokter
        $page_data['list_dokter'] = $this->M_TransferPasien->get_dokter_aktif();
        // perawat IGD
        $page_data['list_perawat_igd']  = $this->M_TransferPasien->get_perawat_by_status('igd');
        // kalau nanti punya form rawat inap:
        $page_data['list_perawat_ranap'] = $this->M_TransferPasien->get_perawat_by_status('rawatinap');
        $page_data['list_dokter'] = $this->M_TransferPasien->get_dokter('DOKTER');
        $page_data['dokter_igd'] = $this->M_TransferPasien->get_dokter('DOKTER');
        $page_data['detail_transfer'] = $this->M_TransferPasien->get_by_history($id_history);
        // $page_data['riwayat_dulu'] = $this->M_Erm->getRiwayatDahulu();




        $selectPasien = $this->M_Erm->selectDataPasienIGDby_id($id_pelayanan, $id_history);
        // $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
        $staff = $this->session->userdata('data_auth');

        $page_data['nama'] = $selectPasien->nama;
        $page_data['no_hp'] = $selectPasien->no_hp;
        // $page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['cara_bayar'] = $selectPasien->cara_bayar;
        $page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
        $page_data['staff'] = $staff->id_staff;
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['agama'] = $selectPasien->agama;
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();


        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/IGD/view_transfer_pasien';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }




    // GET DATA (seperti get_triase)
    // TransferPasien.php

    // TransferPasien.php
    public function get_transfer_pasien()
    {
        $id = $this->input->post('id_history');

        // ambil data utama transfer pasien
        $row = $this->M_TransferPasien->get_by_history($id); // sesuaikan nama fungsi kalau beda

        if ($row) {
            $row->status_dt = 'found';
        } else {
            $row = new stdClass();
            $row->status_dt = 'not found';
        }

        // tambahkan RIWAYAT DAHULU dari form_assesmen_dokter
        $riw = $this->M_Erm->getRiwayatDahulu($id);
        if ($riw) {
            $row->riwayat_dulu = $riw->riwayat_dulu;
        } else {
            $row->riwayat_dulu = '';
        }

        echo json_encode($row);
    }


    public function get_riwayat_dulu()
    {
        $id_history = $this->input->post('id_history');

        $row = $this->M_Erm->getRiwayatDahulu($id_history);

        if ($row) {
            $out = [
                'status'       => 'found',
                'riwayat_dulu' => $row->riwayat_dulu,
                'no_rm'        => $row->no_rm,
                'id_pelayanan' => $row->id_pelayanan,
            ];
        } else {
            $out = [
                'status'       => 'not_found',
                'riwayat_dulu' => '',
            ];
        }

        echo json_encode($out);
    }

    public function save_riwayat_dulu()
    {
        $no_rm        = $this->input->post('no_rm');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history   = $this->input->post('id_history');
        $riwayat_dulu = $this->input->post('riwayat_dulu');

        $ok = $this->M_Erm->saveRiwayatDulu($no_rm, $id_pelayanan, $id_history, $riwayat_dulu);

        echo json_encode([
            'status' => $ok ? 'success' : 'failed'
        ]);
    }

    public function saveTriase()
    {
        $no_rm        = $this->input->post('no_rm');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history   = $this->input->post('id_history');

        $gcs  = $this->input->post('gcs');
        $e    = $this->input->post('e');
        $m    = $this->input->post('m');
        $v    = $this->input->post('v');
        $tekanan_darah   = $this->input->post('tekanan_darah');   // tekanan darah
        $suhu = $this->input->post('suhu');
        $frequensi_nadi = $this->input->post('frequensi_nadi');
        $frequensi_nafas = $this->input->post('frequensi_nafas');
        $spo2 = $this->input->post('spo2');

        $ok = $this->M_Erm->saveTriase(
            $no_rm,
            $id_pelayanan,
            $id_history,
            $gcs,
            $e,
            $m,
            $v,
            $tekanan_darah,
            $suhu,
            $frequensi_nadi,
            $frequensi_nafas,
            $spo2
        );

        echo json_encode(['status' => $ok ? 'success' : 'failed']);
    }



    // INSERT / UPDATE (auto: jika sudah ada = update)
    public function simpan_transfer_igd()
    {
        $id_history   = $this->input->post('id_history');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $no_rm        = $this->input->post('no_rm');

        // 1) input baru
        $verifikasi_dokter = $this->input->post('verifikasi_dokter'); // 'Tidak' / 'Ya'
        $dokter_jaga       = $this->input->post('dokter_jaga');       // id_staff dokter

        // baca data lama terlebih dulu
        $existing = $this->db
            ->get_where('form_transfer_pasien_igd', ['id_history' => $id_history])
            ->row();
        // default ambil dari data lama supaya tidak direset sembarangan
        $verif_status = $existing ? $existing->verif : null;
        $dokter_verif = $existing ? $existing->dokter_verif : null;
        if ($verifikasi_dokter === 'Tidak') {
            $verif_status = 'Tidak';
            $dokter_verif = null;
        } elseif ($verifikasi_dokter === 'Ya' && !empty($dokter_jaga)) {
            // hanya kalau belum terverifikasi, baru set ke "Belum"
            if (!$existing || $existing->verif !== 'Ya') {
                $verif_status = 'Belum';
            }
            $dokter_verif = $dokter_jaga;
        }

        // 3) siapkan data utama form_transfer_pasien_igd
        //yoyo
        $data = [
            'id_pelayanan' => $id_pelayanan,
            'id_history'   => $id_history,
            'no_rm'        => $no_rm,

            // SITUATION
            'pasien_dari'  => $this->input->post('pasien_dari'),
            'tt_asal'      => $this->input->post('tt_asal'),
            'tiba_di'      => $this->input->post('tiba_di'),
            'tt_tujuan'    => $this->input->post('tt_tujuan'),
            'dr1'          => $this->input->post('dr1'),
            'dr2'          => $this->input->post('dr2'),
            'dr3'          => $this->input->post('dr3'),
            'dx1'          => $this->input->post('dx1'),
            'dx2'          => $this->input->post('dx2'),
            'dx3'          => $this->input->post('dx3'),
            'prosedur_invasif'    => $this->input->post('prosedur_invasif'),
            'tgl_prosedur'        => $this->input->post('tgl_prosedur'),
            'indikasi_rawat_inap' => $this->input->post('indikasi_rawat_inap'),

            // BACKGROUND
            'alergi_obat'      => $this->input->post('alergi_obat'),
            'alergi_obat_nama' => $this->input->post('alergi_obat_nama'),
            'kewaspadaan'      => $this->input->post('kewaspadaan')
                ? implode(',', $this->input->post('kewaspadaan'))
                : null,

            // ASSESSMENT
            'jam_observasi'       => $this->input->post('jam_observasi'),
            'pupil_kanan'         => $this->input->post('pupil_kanan'),
            'pupil_kiri'          => $this->input->post('pupil_kiri'),
            'ews'                 => $this->input->post('ews'),
            'ews_kategori'        => $this->input->post('ews_kategori'),
            'skor_nyeri'          => $this->input->post('skor_nyeri'),
            'skor_nyeri_kategori' => $this->input->post('skor_nyeri_kategori'),
            'skor_jatuh'          => $this->input->post('skor_jatuh'),
            'skor_jatuh_kategori' => $this->input->post('skor_jatuh_kategori'),
            'skor_vte'            => $this->input->post('skor_vte'),
            'skor_vte_kategori'   => $this->input->post('skor_vte_kategori'),
            'skor_braden'         => $this->input->post('skor_braden'),
            'skor_braden_kategori' => $this->input->post('skor_braden_kategori'),

            // PEMBERIAN MAKAN
            'pemberian_makan' => $this->input->post('pemberian_makan'),

            // CHECKBOX
            // RADIO (single)
            'bab'               => $this->input->post('bab') ?: null,
            'bak'               => $this->input->post('bak') ?: null,
            'aktivitas'         => $this->input->post('aktivitas') ?: null,
            'mobilitas'         => $this->input->post('mobilitas') ?: null,

            'dekubitus'         => $this->input->post('dekubitus') ?: null,
            'dekubitus_lokasi'  => ($this->input->post('dekubitus') === 'Ada') ? ($this->input->post('dekubitus_lokasi') ?: null) : null,

            'gangguan_indra'    => $this->input->post('indra') ?: null,
            'indra_lokasi'      => ($this->input->post('indra') === 'Ada') ? ($this->input->post('indra_lokasi') ?: null) : null,

            'alat_bantu'        => $this->input->post('alat_bantu') ?: null,
            'alat_bantu_lokasi' => ($this->input->post('alat_bantu') === 'Ya') ? ($this->input->post('alat_bantu_lokasi') ?: null) : null,

            'infus'             => $this->input->post('infus') ?: null,
            'infus_pivas'       => ($this->input->post('infus') === 'Ya') ? ($this->input->post('infus_pivas') ?: null) : null,
            'infus_tanggal'     => ($this->input->post('infus') === 'Ya') ? ($this->input->post('infus_tanggal') ?: null) : null,


            // REKOMENDASI
            'follow_up_rujukan' => $this->input->post('follow_up_rujukan'),
            'terapi_khusus'     => $this->input->post('terapi_khusus'),
            'peralatan_khusus'  => $this->input->post('peralatan_khusus'),
            'rencana_tindakan'  => $this->input->post('rencana_tindakan'),
            'persiapan_khusus'  => $this->input->post('persiapan_khusus'),
            'persiapan_pulang'  => $this->input->post('persiapan_pulang'),

            // DOKUMEN
            'lab_lembar'        => $this->input->post('lab_lembar'),
            'xray_lembar'       => $this->input->post('xray_lembar'),
            'ctscan_lembar'     => $this->input->post('ctscan_lembar'),
            'mri_lembar'        => $this->input->post('mri_lembar'),
            'ekg_lembar'        => $this->input->post('ekg_lembar'),
            'echo_lembar'       => $this->input->post('echo_lembar'),
            'periksa_lainnya'   => $this->input->post('periksa_lainnya'),
            'dokumen'           => $this->input->post('dokumen') ? implode(',', $this->input->post('dokumen')) : null,
            'dokumen_lainnya'   => $this->input->post('dokumen_lainnya'),
            'hasil_nilai_kritis' => $this->input->post('hasil_nilai_kritis'),

            // TTD & VERIFIKASI DOKTER
            'diserahkan_oleh' => $this->input->post('diserahkan_oleh'),
            'diterima_oleh'   => $this->input->post('diterima_oleh'),
            'dokter_jaga'  => $dokter_jaga,
            'verif'        => $verif_status,
            'dokter_verif' => $dokter_verif,
            'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
            'jam_pengajuan' => $this->input->post('jam_pengajuan'),
        ];

        // 4) insert / update
        $cek = $this->db
            ->get_where('form_transfer_pasien_igd', ['id_history' => $id_history])
            ->row();

        if ($cek) {
            $this->db->update(
                'form_transfer_pasien_igd',
                $data,
                ['id_form_transfer' => $cek->id_form_transfer]
            );
        } else {
            $this->db->insert('form_transfer_pasien_igd', $data);
        }

        echo json_encode(['status' => 'success']);
    }

    public function get_triase()
    {
        $id = $this->input->post('id_history');

        $db = $this->db
            ->get_where('form_transfer_pasien_igd', ['id_history' => $id])
            ->row();

        if ($db) {
            $db->status_dt = 'found';
        } else {
            $db           = new stdClass();
            $db->status_dt = 'not found';
        }

        echo json_encode($db);
    }

    public function approve_transfer()
    {
        $id_history = $this->input->post('id_history');
        $auth = $this->session->userdata('data_auth');

        if (!$auth) {
            echo json_encode(['status' => 'error', 'msg' => 'Session habis']);
            return;
        }

        $login_staff = $auth->id_staff;

        $row = $this->db
            ->get_where('form_transfer_pasien_igd', ['id_history' => $id_history])
            ->row();

        if (!$row) {
            echo json_encode(['status' => 'error', 'msg' => 'Data transfer tidak ditemukan']);
            return;
        }

        // hanya dokter yang sudah dipilih yang boleh approve
        $dokter_yang_harus_verif = $row->dokter_verif ?: $row->dokter_jaga;

        if ($login_staff != $dokter_yang_harus_verif) {
            echo json_encode(['status' => 'error', 'msg' => 'Anda tidak berhak melakukan verifikasi']);
            return;
        }

        $this->db->where('id_form_transfer', $row->id_form_transfer)
            ->update('form_transfer_pasien_igd', [
                'verif'       => 'Ya',
                'dokter_verif' => $login_staff,
                'tgl_verif'   => date('Y-m-d H:i:s'),
            ]);

        echo json_encode(['status' => 'success']);
    }


    public function print($id_pelayanan, $id_history)
    {
        $id_pelayanan = (string)$id_pelayanan;
        $id_history   = (string)$id_history;

        // data transfer pasien
        $transfer = $this->M_TransferPasien->get_by_history($id_history);

        // data pasien IGD (sama seperti di form)
        $pasien = $this->M_Erm->selectDataPasienIGDby_id($id_pelayanan, $id_history);
        $triase_list = $this->M_TransferPasien->getTriaseAssesment($id_history); // ini result() → array

        // ambil baris pertama saja, atau null kalau tidak ada
        $triase = null;
        if (is_array($triase_list) && count($triase_list) > 0) {
            $triase = $triase_list[0];
        }


        // var_dump($triase);




        // riwayat dulu (dari form assesmen dokter)
        $riwayat_dulu = $this->M_Erm->getRiwayatDahulu($id_history);
        $riwayat_dulu_text = $riwayat_dulu ? $riwayat_dulu->riwayat_dulu : '';

        // nama dokter jaga dari tabel staff (kalau ada)
        $dokter_jaga_nama = '';
        if (!empty($transfer) && !empty($transfer->dokter_jaga)) {
            $st = $this->db->get_where('dokter', ['id_dokter' => $transfer->dokter_jaga])->row();
            if ($st) {
                $dokter_jaga_nama = $st->nama;
            }
        }
        $per = $this->db->get_where('staff', ['id_staff' => $transfer->diserahkan_oleh])->row();
        $per2 = $this->db->get_where('staff', ['id_staff' => $transfer->diterima_oleh])->row();



        $data = [];
        $data['transfer']          = $transfer;
        $data['pasien']            = $pasien;
        $data['riwayat_dulu_text'] = $riwayat_dulu_text;
        $data['dokter_jaga_nama']  = $dokter_jaga_nama;
        $data['foto']  = $st->foto;
        $data['ttd_perawat']  = $per->qr_code;
        $data['nama_per1']  = $per->nama;
        $data['nama_per2']  = $per2->nama;
        $data['triase'] = $triase;
        // var_dump($triase);

        $data['id_history'] = $id_history;
        // langsung load view print, tanpa Main wrapper
        $this->load->view('erm_print/print_transfer_pasien', $data);
    }
    public function get_status_verif()
    {
        $id_history = $this->input->post('id_history');

        // sesuaikan nama tabel dan primary key
        $row = $this->db
            ->get_where('form_transfer_pasien_igd', ['id_history' => $id_history])
            ->row();

        if ($row) {
            echo json_encode([
                'status'        => 'ok',
                'id_form_transfer' => $row->id_form_transfer,  // sesuaikan nama kolom
                'verif'         => $row->verif,          // 'Tidak' / 'Belum' / 'Ya'
                'dokter_verif'  => $row->dokter_verif,   // username / id dokter yang boleh verif
            ]);
        } else {
            echo json_encode([
                'status' => 'not_found'
            ]);
        }
    }
    public function verif_triase()
    {
        $id_triase_ugd = $this->input->post('id_triase_ugd');
        $auth          = $this->session->userdata('data_auth');
        $username      = $auth ? $auth->username : '';

        // ambil record triase
        $row = $this->db->get_where('form_ass_triase_ugd', [
            'id_triase_ugd' => $id_triase_ugd
        ])->row();

        if (!$row) {
            echo json_encode(['status' => 'error', 'msg' => 'Data tidak ditemukan']);
            return;
        }

        // hanya dokter yang sama dengan dokter_verif yang boleh approve
        if ($row->dokter_verif !== $username) {
            echo json_encode(['status' => 'forbidden', 'msg' => 'Anda bukan dokter verifikator']);
            return;
        }

        // update status verif
        $this->db->update(
            'form_ass_triase_ugd',
            [
                'verif'     => 'Ya',
                'tgl_verif' => date('Y-m-d H:i:s')
            ],
            ['id_triase_ugd' => $id_triase_ugd]
        );

        echo json_encode(['status' => 'ok']);
    }
}
