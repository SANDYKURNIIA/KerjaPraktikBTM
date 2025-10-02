<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_usg_kebidanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Erm_poli');
        $this->load->model('M_Erm_usg_kebidanan');
        $this->load->helper(['url','form','security']);
        $this->load->library(['session','form_validation','user_agent']);
    }

    /* =========================================================
     * FORM TAMBAH (prefill by id_pelayanan → fallback no_rm)
     * route: Erm_usg_kebidanan/form/{b64_id_pelayanan}/{b64_id_history}
     * ========================================================= */
    public function form($id_pel, $id_his)
    {
        $id_pelayanan = base64_decode(urldecode($id_pel));
        $id_history   = base64_decode(urldecode($id_his));

        $pasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
        if (!$pasien) show_404();

        $page_data['id_pelayanan'] = $pasien->id_pelayanan;
        $page_data['id_history']   = $pasien->id_history;

        $page_data['no_rm']        = $pasien->no_rm ?? '';
        $page_data['nama_pasien']  = $pasien->nama ?? '';
        $page_data['no_bpjs']      = $pasien->no_bpjs ?? '';
        $page_data['usia']         = $this->_hitungUsiaText($pasien->tgl_lahir ?? null);

        // Prefill latest by pelayanan → fallback by no_rm
        $prefill = $this->M_Erm_usg_kebidanan->getLatestByPelayanan($page_data['id_pelayanan']);
        if (!$prefill && !empty($page_data['no_rm'])) {
            $prefill = $this->M_Erm_usg_kebidanan->getLatestByNoRM($page_data['no_rm']);
        }
        $page_data['prefill'] = $prefill ?: [];

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/poli/hasil_usg_kebidanan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    /* =========================================================
     * FORM EDIT (1 record by primary id e.g. 'usg12')
     * ========================================================= */
    public function edit($id)
    {
        $row = $this->M_Erm_usg_kebidanan->getById($id);
        if (!$row) show_404();

        $page_data = [
            'row'          => $row,
            'id_pelayanan' => $row['id_pelayanan'] ?? '',
            'id_history'   => $row['id_history']   ?? '',
            'no_rm'        => $row['no_rm']        ?? '',
            'nama_pasien'  => $row['nama_pasien']  ?? '',
            'no_bpjs'      => $row['no_bpjs']      ?? '',
            'usia'         => $row['usia']         ?? '',
            // Kirim juga prefill supaya view tetap satu
            'prefill'      => $row
        ];

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/poli/hasil_usg_kebidanan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    /* =========================================================
     * UPSERT (AJAX): update jika sudah ada, selain itu insert
     * Kunci prioritas: id_pelayanan → fallback no_rm
     * ========================================================= */
    public function insert_usg()
    {
        // Wajib tanggal & dokter, dan minimal salah satu id_pelayanan/no_rm
        $this->form_validation->set_rules('tanggal_pemeriksaan', 'Tanggal Pemeriksaan', 'required|trim');
        $this->form_validation->set_rules('dokter_pemeriksa',    'Dokter Pemeriksa',    'required|trim');

        $id_pelayanan = trim((string)$this->input->post('id_pelayanan', true));
        $no_rm        = trim((string)$this->input->post('no_rm', true));

        if (!$this->form_validation->run() || ($id_pelayanan === '' && $no_rm === '')) {
            return $this->_json([
                'status'  => 'failed',
                'message' => $id_pelayanan === '' && $no_rm === ''
                    ? 'id_pelayanan atau No. RM wajib diisi.'
                    : 'Validasi gagal.',
                'errors'  => [
                    'tanggal_pemeriksaan' => form_error('tanggal_pemeriksaan'),
                    'dokter_pemeriksa'    => form_error('dokter_pemeriksa'),
                ]
            ]);
        }

        $jenis_arr = $this->input->post('jenis_pemeriksaan');
        $payload = [
            'id_pelayanan'         => $id_pelayanan ?: null,
            'id_history'           => $this->input->post('id_history', true) ?: null,
            'no_rm'                => $no_rm ?: null,
            'nama_pasien'          => $this->input->post('nama_pasien', true) ?: null,
            'no_bpjs'              => ($this->input->post('no_bpjs', true) !== '') ? $this->input->post('no_bpjs', true) : null,
            'usia'                 => $this->input->post('usia', true) ?: null,
            'tanggal_pemeriksaan'  => $this->input->post('tanggal_pemeriksaan', true),
            'dokter_pemeriksa'     => $this->input->post('dokter_pemeriksa', true),
            'jenis_pemeriksaan'    => is_array($jenis_arr) ? implode(',', $jenis_arr) : (string)$jenis_arr,
            'indikasi_pemeriksaan' => $this->input->post('indikasi_pemeriksaan', false),
            'hasil_pemeriksaan'    => $this->input->post('hasil_pemeriksaan', false),
            'kesimpulan'           => $this->input->post('kesimpulan', false),
        ];

        // Cari existing by id_pelayanan → fallback by no_rm
        $existing = null;
        if ($id_pelayanan !== '') {
            $existing = $this->M_Erm_usg_kebidanan->getLatestByPelayanan($id_pelayanan);
        }
        if (!$existing && $no_rm !== '') {
            $existing = $this->M_Erm_usg_kebidanan->getLatestByNoRM($no_rm);
        }

        if ($existing && !empty($existing['id'])) {
            // UPDATE (jangan ubah identitas)
            $id = (string)$existing['id'];
            $updateData = [
                'tanggal_pemeriksaan'  => $payload['tanggal_pemeriksaan'],
                'dokter_pemeriksa'     => $payload['dokter_pemeriksa'],
                'jenis_pemeriksaan'    => $payload['jenis_pemeriksaan'],
                'indikasi_pemeriksaan' => $payload['indikasi_pemeriksaan'],
                'hasil_pemeriksaan'    => $payload['hasil_pemeriksaan'],
                'kesimpulan'           => $payload['kesimpulan'],
            ];
            $ok = $this->M_Erm_usg_kebidanan->update($id, $updateData);
            if ($ok) {
                return $this->_json([
                    'status'  => 'success',
                    'message' => 'Data USG diperbarui.',
                    'id'      => $id,
                ]);
            }
            $err = $this->M_Erm_usg_kebidanan->getLastError() ?: ['code'=>0,'message'=>'Gagal memperbarui data.'];
            log_message('error','USG UPDATE ERROR: '.json_encode($err));
            return $this->_json([
                'status'  => 'failed',
                'message' => 'Gagal memperbarui data (DB: '.$err['code'].'). '.$err['message'],
                'error'   => $err,
            ]);
        }

        // INSERT baru
        $ok = $this->M_Erm_usg_kebidanan->insert($payload);
        if ($ok) {
            // ambil id terbaru berdasarkan kunci
            $just = null;
            if ($id_pelayanan !== '') {
                $just = $this->M_Erm_usg_kebidanan->getLatestByPelayanan($id_pelayanan);
            } elseif ($no_rm !== '') {
                $just = $this->M_Erm_usg_kebidanan->getLatestByNoRM($no_rm);
            }
            return $this->_json([
                'status'  => 'success',
                'message' => 'Data USG tersimpan.',
                'id'      => isset($just['id']) ? (string)$just['id'] : '',
            ]);
        }
        $err = $this->M_Erm_usg_kebidanan->getLastError() ?: ['code'=>0,'message'=>'Gagal menyimpan data.'];
        log_message('error','USG INSERT ERROR: '.json_encode($err));
        return $this->_json([
            'status'  => 'failed',
            'message' => 'Gagal menyimpan data (DB: '.$err['code'].'). '.$err['message'],
            'error'   => $err,
        ]);
    }

    /* =========================================================
     * PRINT (fleksibel: by ?id= / ?id_pelayanan= / ?no_rm=)
     * route: Erm_usg_kebidanan/print_out
     * ========================================================= */
    public function print_out()
    {
        $id           = trim((string)$this->input->get('id', true));
        $id_pelayanan = trim((string)$this->input->get('id_pelayanan', true));
        $no_rm        = trim((string)$this->input->get('no_rm', true));

        $row = null;
        if ($id !== '')                    $row = $this->M_Erm_usg_kebidanan->getById($id);
        if (!$row && $id_pelayanan !== '') $row = $this->M_Erm_usg_kebidanan->getLatestByPelayanan($id_pelayanan);
        if (!$row && $no_rm !== '')        $row = $this->M_Erm_usg_kebidanan->getLatestByNoRM($no_rm);

        if (!$row) {
            $this->session->set_flashdata('msg_error', 'Data untuk cetak tidak ditemukan.');
            redirect($this->agent->referrer() ?: site_url('/'));
            return;
        }

        $data['page_title'] = 'Hasil USG Kebidanan';
        $data['row']        = (object)$row;

        if (file_exists(APPPATH.'views/erm_print/hasil_usg_kebidanan.php')) {
            $this->load->view('erm_print/hasil_usg_kebidanan', $data);
        } else {
            $this->_render_inline_print($data);
        }
    }

    /* =========================== HELPERS =========================== */

    private function _json($arr)
    {
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($arr, JSON_UNESCAPED_UNICODE));
    }

    private function _hitungUsiaText($tgl_lahir)
    {
        if (!$tgl_lahir) return '';
        try {
            $birth = new DateTime($tgl_lahir);
            $now   = new DateTime('today');
            return $birth->diff($now)->y . ' th';
        } catch (Exception $e) {
            return '';
        }
    }

    /** fallback print inline jika view cetak belum ada */
    private function _render_inline_print($data)
    {
        $row = $data['row']; ?>
        <!DOCTYPE html>
        <html>
        <head><meta charset="utf-8"><title><?= htmlentities($data['page_title']) ?></title></head>
        <body onload="window.print()">
        <h2>Hasil USG Kebidanan</h2>
        <table border="1" cellpadding="6" cellspacing="0">
            <tr><th>No. RM</th><td><?= htmlentities($row->no_rm) ?></td></tr>
            <tr><th>Nama</th><td><?= htmlentities($row->nama_pasien) ?></td></tr>
            <tr><th>Tanggal</th><td><?= htmlentities(substr($row->tanggal_pemeriksaan,0,10)) ?></td></tr>
            <tr><th>Dokter</th><td><?= htmlentities($row->dokter_pemeriksa) ?></td></tr>
            <tr><th>Jenis</th><td><?= htmlentities($row->jenis_pemeriksaan) ?></td></tr>
            <tr><th>Indikasi</th><td><?= nl2br(htmlentities($row->indikasi_pemeriksaan)) ?></td></tr>
            <tr><th>Hasil</th><td><?= nl2br(htmlentities($row->hasil_pemeriksaan)) ?></td></tr>
            <tr><th>Kesimpulan</th><td><?= nl2br(htmlentities($row->kesimpulan)) ?></td></tr>
        </table>
        </body>
        </html>
        <?php
    }
}