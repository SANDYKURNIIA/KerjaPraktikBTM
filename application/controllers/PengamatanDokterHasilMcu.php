<?php defined('BASEPATH') or exit('No direct script access allowed');

class PengamatanDokterHasilMcu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_Assesmen_Gizi']);
        $this->load->model('M_PengamatanDokterHasilMcu');
        $this->load->helper(['url', 'html', 'security']);
        $this->load->library('session');
    }

    /** ==== FORM ==== */
    public function form($id_pelayanan, $id_history)
    {
        // Ambil data pasien & hasil sebelumnya
        $data = $this->M_PengamatanDokterHasilMcu->getByPelayanan($id_pelayanan, $id_history);
        $data = $data ? (array)$data : [];

        $data['id_pelayanan'] = $id_pelayanan;
        $data['id_history']   = $id_history;

        $data['header'] = $this->M_PengamatanDokterHasilMcu->selectHeaderById($id_pelayanan);

        $this->load->view('assets/_header');
        $data['page_content'] = 'page_content/PengamatanDokterHasilMcu';
        $data['data']         = $data;
        $this->load->view('Main', $data);
        $this->load->view('assets/_footer');

        // $this->load->view('assets/_header');
        // $this->load->view('page_content/PengamatanDokterHasiMcu', $data);
        // $this->load->view('assets/_footer');
    }

    /** ==== SAVE ==== */
    public function save()
    {
        if ($this->input->method() !== 'post') {
            return $this->_json(405, false, 'Method Not Allowed');
        }

        $staff = $this->session->userdata('data_auth');
        $id_staff = $staff ? ($staff->id_staff ?? null) : null;

        $post = $this->input->post(NULL, true);

        $data = [
            'no_rm'               => $post['no_rm'],
            'id_pelayanan'        => $post['id_pelayanan'],
            'id_history'          => $post['id_history'],
            'id_staff'            => $id_staff,
            'tgl_pengkajian'      => $post['tgl_pengkajian'],
            'pencitraan'          => $post['pencitraan'],
            'kultur'              => $post['kultur'],
            'catatan_konsultasi'  => $post['catatan_konsultasi'],
        ];

        // Jika data sudah ada, update
        if ($this->M_PengamatanDokterHasilMcu->exists($post['id_pelayanan'], $post['id_history'])) {
            $ok = $this->M_PengamatanDokterHasilMcu->update($post['id_pelayanan'], $post['id_history'], $data);
            return $this->_json($ok ? 200 : 500, $ok, $ok ? 'Data berhasil diperbarui.' : 'Gagal memperbarui data.');
        } else {
            $ok = $this->M_PengamatanDokterHasilMcu->insert($data);
            return $this->_json($ok ? 200 : 500, $ok, $ok ? 'Data berhasil disimpan.' : 'Gagal menyimpan data.');
        }
    }

    /** ==== UTIL ==== */
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
}