<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quitioners extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_mcu');
    }

    public function tampil($id_mcu)
    {
        $this->load->view('assets/_header');

        $page_data['data_mcu'] = $this->M_mcu->getMCUById($id_mcu);

        $page_data['page_content'] = 'page_content/Quitioners';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function form_pemeriksaan($form)
    {
        $page_data['gambar'] = base_url("assets/dist/img/gambar.png");

        $view_path = 'kuisioner_mcu/' . $form;
        $response = $this->load->view($view_path, [], true); // Tambahkan parameter ketiga 'true'
        echo $response;
    }
    public function simpan_pemeriksaan_pribadi()
    {
        $id_mcu = $this->input->post('id_mcu');
        $data = array(
            'id_mcu' => $this->input->post('id_mcu'),
            'P11a' => $this->input->post('P11a'),
            'P11b' => $this->input->post('P11b'),
            'P12a' => $this->input->post('P12a'),
            'P12b' => $this->input->post('P12b'),
            'P12c' => $this->input->post('P12c'),
            'P12d' => $this->input->post('P12d'),
            'P12e' => $this->input->post('P12e'),
            'P12f' => $this->input->post('P12f'),
            'P12g' => $this->input->post('P12g'),
            'P12h' => $this->input->post('P12h'),
            'P13a' => $this->input->post('P13a'),
            'P13b' => $this->input->post('P13b'),
            'P14a' => $this->input->post('P14'),
            'P15a' => $this->input->post('P15'),
            'P16a' => $this->input->post('P16'),
            'P17a' => $this->input->post('P17a'),
            'smoker' => $this->input->post('smoker'),
            'number_smoker' => $this->input->post('numbersmoked'),
            'concumption_alcohol' => $this->input->post('concumption_alcohol'),
            'terhambat_belanjaan' => $this->input->post('terhambat_belanjaan'),

        );
        $db = $this->db->get_where('quiz_pemeriksaan_pribadi', ['id_mcu' => $id_mcu])->row();
        if (empty($db)) {
            $this->M_mcu->insert_mcu($data, 'quiz_pemeriksaan_pribadi');
        } else {
            $this->M_mcu->update($data, ['id_mcu' => $id_mcu], 'quiz_pemeriksaan_pribadi');
        }

        $out['status'] = 'success';
        echo json_encode($out);
    }
    public function simpan_riwayat_keluarga() {}
}
