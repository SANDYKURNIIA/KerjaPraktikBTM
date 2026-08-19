<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengisianAwalMCU extends CI_Controller
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
        $this->load->model('M_Erm_masalah_kep');
        $this->load->model('M_Pasien');
        $this->load->model('M_PengisianAwalMCU');
        $this->load->library('session');
    }

    public function awalMCU($id_pelayanan = null, $id_history = null)
    {
        $data_pasien = $this->M_PengisianAwalMCU->selectDataPasien($id_pelayanan);
        $page_data['data_dokter'] = $this->M_IGD->selectNamaDPJP();

        $page_data['gambar']       = base_url("assets/dist/img/orang1.png");
        $page_data['page_content'] = 'page_content/PengisianAwalMCU';
        $page_data['data']         = $data_pasien;
        $page_data['no_rm']        = $data_pasien->no_rm;
        
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history']   = $id_history;

        $this->load->view('assets/_header');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    // ✅ Fungsi untuk menyimpan data dari form Pengisian Awal MCU
    public function simpan()
    {
        $data = [

            'no_rm'             => $this->input->post('no_rm'),
            'dokter1'           => $this->input->post('dokter1'),
            'dokter2'           => $this->input->post('dokter2'),
            'dokter3'           => $this->input->post('dokter3'),
            'dokter4'           => $this->input->post('dokter4'),
            'vena_perifer1'     => $this->input->post('vena_perifer1'),
            'vena_perifer2'     => $this->input->post('vena_perifer2'),
            'cvc'               => $this->input->post('cvc'),
            'trakeal_tube'      => $this->input->post('trakeal_tube'),
            'katheter_urine'    => $this->input->post('katheter_urine'),
            'urine_bag'         => $this->input->post('urine_bag'),
            'ngt'               => $this->input->post('ngt'),
            'wsd'               => $this->input->post('wsd'),
            'catatan_khusus'    => $this->input->post('catatan_khusus'),
            'masalah_medis'     => $this->input->post('masalah_medis'),
            'enteral'           => $this->input->post('enteral'),
            'parenteral'        => $this->input->post('parenteral'),
            'pemeriksaan'       => $this->input->post('pemeriksaan'),
            'id_pelayanan'      => $this->input->post('id_pelayanan'),
            // 'id_history'        => $this->input->post('id_history')
            // 'tanggal_update'    => date('Y-m-d H:i:s')
        ];

        // Simpan data via model
        $this->M_PengisianAwalMCU->simpanData($data);

        // Response ke AJAX
        $this->session->set_flashdata('success', 'Data Pengisian Awal MCU berhasil disimpan.');
        echo json_encode(['status' => 'success']);
    
    }
    
}
