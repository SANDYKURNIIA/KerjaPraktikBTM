<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir_Monitoring_Mengelolaan_Limbah_Benda_Tajam extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Assembling');
         $this->load->model('M_Formulir_Monitoring_Mengelolaan_Limbah_Benda_Tajam');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_form/Formulir_Monitoring_Mengelolaan_Limbah_Benda_Tajam';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function get_all_data(){   
        $data = $this->M_Formulir_Monitoring_Mengelolaan_Limbah_Benda_Tajam->getAll();
        $out = null;

        for($i=0;$i<count($data);$i++){
            $no = $i+1;
            $tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='pilih(\"" . $data[$i]->id_benda_tajam . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus(\"" . $data[$i]->id_benda_tajam . "\")' '><i class='icon-trash'></i></button>";
            $nmstaff = $data[$i]->nama_staff;
            $tanggal = $data[$i]->Tanggal;
            $unit = $data[$i]->unit;
            $fasilitas = $data[$i]->Tersedia_fasilitas_pembuangan_sampah_yang_sesuai;
            $limbah = $data[$i]->Tempat_limbah_tajam_diletaka_ditempat_yang_aman;
            $dgnbenar = $data[$i]->Tempat_limbah_benda_tajam_dirakit_denganbenar;
            $isilim = $data[$i]->Isi_limbah_maksimal3_4;
            $tidakada = $data[$i]->Tidak_ada_limbah_benda_tajam_yang_keluar_dari_tempat;
            $lngsung = $data[$i]->Limbah_benda_tajam_langsung_dibuang_ke_tempat_limbah_benda_tajam;
            $tmptl = $data[$i]->Jika_sudah_penuh_tempat_limbah_benda_tajam_ditutup_rapat;
            $pajanan = $data[$i]->Tersedia_alur_pajanan;

            $out[$i] = array($no,$tombol,$hapus,$nmstaff,$unit,$tanggal,$fasilitas,$limbah,$dgnbenar,$isilim,$tidakada,$lngsung,$tmptl,$pajanan);
        }
        if($out == null){
            echo '{"data":""}';
            exit;
        }else{
            $page_data['data'] = $out;
			echo json_encode($page_data);
			exit;
        }
    }

    public function delete(){
        $id = $this->input->post('id');
        $this->M_Formulir_Monitoring_Mengelolaan_Limbah_Benda_Tajam->delete(array('id_benda_tajam' => $id));
    }
    /*
    public function laporan() 
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Laporan_mutu_keselamatan_kerja/Laporan_Formulir_Monitoring_Mengelolaan_Limbah_Benda_Tajam';
        $page_data['data'] = $this->M_Formulir_Monitoring_Mengelolaan_Limbah_Benda_Tajam->getAll();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }*/

    public function getData(){
        $id = $this->input->post('id');
        $data = $this->M_Formulir_Monitoring_Mengelolaan_Limbah_Benda_Tajam->getData($id);
        $out = null;
        if($data->num_rows =! 1){
            $out = 0;
        }else{
            $out = $data->row_array();
        }
        echo json_encode($out);
    }

     public function insert(){
        $data_staff = $this->session->userdata('data_auth');
         
        $data = array(
            'id_staff'=>$data_staff->id_staff,
            'nama_staff'=>$data_staff->nama,
            'tgl_input'=>date("Y-m-d H:i:s"),
            'unit' =>$this->input->post('unit'),
            'Tanggal' =>$this->input->post('tglForm'),
            'Tersedia_fasilitas_pembuangan_sampah_yang_sesuai' =>$this->input->post('Tersedia_fasilitas_pembuangan_sampah_yang_sesuai'),
            'Tempat_limbah_tajam_diletaka_ditempat_yang_aman' =>$this->input->post('Tempat_limbah_tajam_diletaka_ditempat_yang_aman'),
            'Tempat_limbah_benda_tajam_dirakit_denganbenar' =>$this->input->post('Tempat_limbah_benda_tajam_dirakit_denganbenar'),
            'Isi_limbah_maksimal3_4' =>$this->input->post('Isi_limbah_maksimal3_4'),
            'Tidak_ada_limbah_benda_tajam_yang_keluar_dari_tempat' =>$this->input->post('Tidak_ada_limbah_benda_tajam_yang_keluar_dari_tempat'),
            'Limbah_benda_tajam_langsung_dibuang_ke_tempat_limbah_benda_tajam' =>$this->input->post('Limbah_benda_tajam_langsung_dibuang_ke_tempat_limbah_benda_tajam'),
            'Jika_sudah_penuh_tempat_limbah_benda_tajam_ditutup_rapat' =>$this->input->post('Jika_sudah_penuh_tempat_limbah_benda_tajam_ditutup_rapat'),
            'Tersedia_alur_pajanan' =>$this->input->post('Tersedia_alur_pajanan')
        );
        $this->db->insert('formulir_monitoring_mengelolaan_limbah_benda_tajam', $data);
    }

    public function update(){
        $data_staff = $this->session->userdata('data_auth');
        $where = base64_decode($this->input->post('idP'));
        $data = array(
            'id_staff'=>$data_staff->id_staff,
            'nama_staff'=>$data_staff->nama,
            'tgl_input'=>date("Y-m-d H:i:s"),
            'unit' =>$this->input->post('unit'),
            'Tanggal' =>$this->input->post('tglForm'),
            'Tersedia_fasilitas_pembuangan_sampah_yang_sesuai' =>$this->input->post('Tersedia_fasilitas_pembuangan_sampah_yang_sesuai'),
            'Tempat_limbah_tajam_diletaka_ditempat_yang_aman' =>$this->input->post('Tempat_limbah_tajam_diletaka_ditempat_yang_aman'),
            'Tempat_limbah_benda_tajam_dirakit_denganbenar' =>$this->input->post('Tempat_limbah_benda_tajam_dirakit_denganbenar'),
            'Isi_limbah_maksimal3_4' =>$this->input->post('Isi_limbah_maksimal3_4'),
            'Tidak_ada_limbah_benda_tajam_yang_keluar_dari_tempat' =>$this->input->post('Tidak_ada_limbah_benda_tajam_yang_keluar_dari_tempat'),
            'Limbah_benda_tajam_langsung_dibuang_ke_tempat_limbah_benda_tajam' =>$this->input->post('Limbah_benda_tajam_langsung_dibuang_ke_tempat_limbah_benda_tajam'),
            'Jika_sudah_penuh_tempat_limbah_benda_tajam_ditutup_rapat' =>$this->input->post('Jika_sudah_penuh_tempat_limbah_benda_tajam_ditutup_rapat'),
            'Tersedia_alur_pajanan' =>$this->input->post('Tersedia_alur_pajanan')
        );
        $this->M_Formulir_Monitoring_Mengelolaan_Limbah_Benda_Tajam->update(array('id_benda_tajam' => $where),$data);
    }

}