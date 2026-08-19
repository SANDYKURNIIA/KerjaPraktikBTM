<?php defined('BASEPATH') or exit('No direct script access allowed');

class Erm_assesmen_gizi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_Assesmen_Gizi']);
        $this->load->helper(['url','html','security']);
        $this->load->library('session');
    }

    /** ==== FORM ==== */
    public function formgizi($id_pelayanan, $id_histori)
    {
    // Header dari join 4 tabel
    $h = $this->M_Assesmen_Gizi->selectHeaderById($id_pelayanan, $id_histori);
    // Prefill data gizi (jika ada)
    $g = $this->M_Assesmen_Gizi->getByPelayanan($id_pelayanan, $id_histori);
    $g = $g ? (array)$g : [];

    // 🔑 Ambil ruang & kelas dari tabel ruangan
    $rk = $this->M_Assesmen_Gizi->getRuangKelasByHistori($id_histori);

    $header = [
        'id_pelayanan'      => $id_pelayanan,
        'id_histori'        => $id_histori,

        // pasien
        'no_rm'             => $h->no_rm ?? '-',
        'nama'              => $h->nama ?? '-',
        'jenis_kelamin'     => $h->jenis_kelamin ?? '-',
        'tgl_lahir'         => !empty($h->tgl_lahir) ? date('d F Y', strtotime($h->tgl_lahir)) : '-',

        // hanya dari pelayanan.tgl_masuk
        'tgl_masuk_dirawat' => !empty($h->tgl_masuk) ? date('d F Y', strtotime($h->tgl_masuk)) : '-',

        // dokter
        'dokter_merawat'    => $h->nama_dokter ?? '-',
        'dokter_merawat_id' => $h->dokter_merawat_id ?? '',

        // opsional tampilan
        'ruang'             => $rk->ruang ?? '',
        'kelas'             => $rk->kelas ?? '',
    ];

    $data = array_merge($header, $g);

    $this->load->view('assets/_header');
    $page_data['page_content'] = 'erm_form/Ranap/view_assesmen_gizi';
    $page_data['data']         = $data;
    $this->load->view('Main', $page_data);
    $this->load->view('assets/_footer');
    }


    /** ==== PRINT VIEW ==== */
    public function print_view($id_pelayanan, $id_histori)
{
    // Header dari join 4 tabel
    $h = $this->M_Assesmen_Gizi->selectHeaderById($id_pelayanan, $id_histori);

    // Prefill data gizi (jika ada)
    $g = $this->M_Assesmen_Gizi->getByPelayanan($id_pelayanan, $id_histori);
    $g = $g ? (array)$g : [];

    // Ambil ruang & kelas dari relasi ruangan
    $rk = $this->M_Assesmen_Gizi->getRuangKelasByHistori($id_histori);

    $header = [
        'id_pelayanan'      => $id_pelayanan,
        'id_histori'        => $id_histori,

        // pasien
        'no_rm'             => $h->no_rm ?? '-',
        'nama'              => $h->nama ?? '-',
        'jenis_kelamin'     => $h->jenis_kelamin ?? '-',
        'tgl_lahir'         => !empty($h->tgl_lahir) ? date('d F Y', strtotime($h->tgl_lahir)) : '-',

        // hanya dari pelayanan.tgl_masuk
        'tgl_masuk_dirawat' => !empty($h->tgl_masuk) ? date('d F Y', strtotime($h->tgl_masuk)) : '-',

        // dokter
        'dokter_merawat'    => $h->nama_dokter ?? '-',
        'dokter_merawat_id' => $h->dokter_merawat_id ?? '',

        // ruang & kelas dari DB
        'ruang'             => $rk->ruang ?? '-',
        'kelas'             => $rk->kelas ?? '-',
    ];

    $data = array_merge($header, $g);

    // langsung load view print (tanpa template header/footer)
    $this->load->view('erm_print/assesmen_gizi', $data);
}


    /** ==== SAVE (AJAX POST) ==== */
    public function save()
    {
        if ($this->input->method() !== 'post') {
            return $this->_json(405, false, 'Method Not Allowed');
        }

        $staff    = $this->session->userdata('data_auth');
        $id_staff = $staff ? ($staff->id_staff ?? null) : null;

        $post = $this->input->post(NULL, true);

        $id_pelayanan = $post['id_pelayanan'] ?? null;
        $id_histori   = $post['id_histori'] ?? null;
        $no_rm        = $post['no_rm'] ?? null;

        if (!$no_rm && $id_pelayanan && $id_histori) {
            $h = $this->M_Assesmen_Gizi->selectHeaderById($id_pelayanan, $id_histori);
            if ($h && !empty($h->no_rm)) $no_rm = $h->no_rm;
        }

        if (!$id_pelayanan || !$id_histori || !$no_rm) {
            return $this->_json(422, false, 'id_pelayanan, id_histori, dan no_rm wajib ada.');
        }

        $bb  = $this->_toFloat($post['bb'] ?? null);
        $tb  = $this->_toFloat($post['tb'] ?? null);
        $imt = $this->_safeIMT($bb, $tb);

        $data = [
            'no_rm'               => (int)$no_rm,
            'id_pelayanan'        => $id_pelayanan,
            'id_histori'          => $id_histori,
            'id_staff'            => $id_staff,

            'tgl_pengkajian'      => $post['tgl_pengkajian'] ?? null,
            'diagnosa_medis'      => $post['diagnosa_medis'] ?? null,

            // antropometri
            'bb'                  => $bb,
            'tb'                  => $tb,
            'imt'                 => $imt,
            'status_gizi'         => $post['status_gizi'] ?? null,
            'perubahan_bb'        => $post['perubahan_bb'] ?? null,
            'ket_perubahan_bb'    => $post['ket_perubahan_bb'] ?? null,
            'lla'                 => $this->_toFloat($post['lla'] ?? null),
            'tinggi_lutut'        => $this->_toFloat($post['tinggi_lutut'] ?? null),

            // biokimia
            'biokimia'            => $post['biokimia'] ?? null,

            // fisik/klinik
            'tensi'               => $post['tensi'] ?? null,
            'nadi'                => $post['nadi'] ?? null,
            'respirasi'           => $post['respirasi'] ?? null,
            'suhu'                => $post['suhu'] ?? null,

            // penampilan
            'adiposa'             => $post['adiposa'] ?? null,
            'edema'               => $post['edema'] ?? null,
            'gangguan_menelan'    => $post['gangguan_menelan'] ?? null,
            'gangguan_mengunyah'  => $post['gangguan_mengunyah'] ?? null,

            // riwayat gizi
            'pola_makan'          => $post['pola_makan'] ?? null,
            'makan_utama'         => $post['makan_utama'] ?? null,
            'makan_selingan'      => $post['makan_selingan'] ?? null,
            'makanan_pokok'       => $post['makanan_pokok'] ?? null,
            'lauk_hewani'         => $post['lauk_hewani'] ?? null,
            'lauk_nabati'         => $post['lauk_nabati'] ?? null,
            'sayur'               => $post['sayur'] ?? null,
            'buah'                => $post['buah'] ?? null,
            'snack'                => $post['snack'] ?? null,

            // asupan & penilaian
            'azg_energi'          => $post['azg_energi'] ?? null,
            'azg_karbo'           => $post['azg_karbo'] ?? null,
            'azg_protein'         => $post['azg_protein'] ?? null,
            'azg_lemak'           => $post['azg_lemak'] ?? null,
            'azg_lainnya'         => $post['azg_lainnya'] ?? null,
            'pengetahuan_gizi'    => $post['pengetahuan_gizi'] ?? null,
            'kepatuhan_diet'      => $post['kepatuhan_diet'] ?? null,
            'akses_suplai_makanan'=> $post['akses_suplai_makanan'] ?? null,
            'fungsi_fisik'        => $post['fungsi_fisik'] ?? null,
            'aktifitas_fisik'     => $post['aktifitas_fisik'] ?? null,
            'olahraga'            => $post['olahraga'] ?? null,

            // diagnosis
            'dg_utama'            => $post['dg_utama'] ?? null,
            'dg_etiologi'         => $post['dg_etiologi'] ?? null,
            'dg_tanda'            => $post['dg_tanda'] ?? null,

            // intervensi
            'iv_tujuan'           => $post['iv_tujuan'] ?? null,
            'iv_jenis_diet'       => $post['iv_jenis_diet'] ?? null,
            'iv_bentuk_makanan'   => $post['iv_bentuk_makanan'] ?? null,
            'iv_cara_pemberian'   => $post['iv_cara_pemberian'] ?? null,
            'iv_edukasi_jenis'    => $post['iv_edukasi_jenis'] ?? null,
            'iv_edukasi_jumlah'   => $post['iv_edukasi_jumlah'] ?? null,
            'iv_edukasi_jadwal'   => $post['iv_edukasi_jadwal'] ?? null,
            'iv_edukasi_motivasi' => $post['iv_edukasi_motivasi'] ?? null,

            // monev
            'iv_monev_rencana'    => $post['iv_monev_rencana'] ?? null,
            'iv_monev_hasil'      => $post['iv_monev_hasil'] ?? null,
        ];

        if ($this->M_Assesmen_Gizi->exists($id_pelayanan, $id_histori)) {
            $ok = $this->M_Assesmen_Gizi->update($id_pelayanan, $id_histori, $data);
            return $this->_json($ok ? 200 : 500, $ok, $ok ? 'Data berhasil diperbarui.' : 'Gagal memperbarui data.');
        } else {
            $new_id = $this->M_Assesmen_Gizi->insert($data);
            return $this->_json($new_id ? 200 : 500, (bool)$new_id, $new_id ? 'Data berhasil disimpan.' : 'Gagal menyimpan data.');
        }
    }

    /** ====== UTIL ====== */
    private function _json($code, $success, $message, $extra = [])
    {
        $this->output
            ->set_status_header($code)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode(array_merge([
                'success' => (bool)$success,
                'message' => $message,
            ], $extra)));
    }

    private function _toFloat($v)
    {
        if ($v === null || $v === '') return null;
        $v = str_replace(['.', ','], ['', '.'], preg_replace('/[^\d,.\-]/', '', (string)$v));
        return is_numeric($v) ? (float)$v : null;
    }

    private function _safeIMT($bb, $tb)
    {
        $b = ($bb && $bb > 0) ? (float)$bb : null;
        $t = ($tb && $tb > 0) ? (float)$tb : null;
        if (!$b || !$t) return null;
        $m = ($t > 10) ? $t / 100.0 : $t;
        if ($m <= 0) return null;
        $x = $b / ($m * $m);
        return ($x > 0 && $x < 200) ? round($x, 2) : null;
    }
}