<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir_fasilitas_kebersihan_tangan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Form_Fasilitas_Kebersihan_Tangan');
    }

    public function index(){
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_form/Form_fasilitas_kebersihan_tangan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    private function getStaffName($id_staff){
        return $this->db->get_where("staff",["id_staff" => $id_staff])->row()->nama;
    }

    public function get_all_data(){
        $data = $this->M_Form_Fasilitas_Kebersihan_Tangan->getAll();
        $out = null;

        for ($i=0; $i < count($data); $i++) { 
           $no = $i+1;
           $tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='pilih(\"" . $data[$i]->idform_fasKeb . "\")' '><i class='icon-rocket'></i></button>";
           $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus(\"" . $data[$i]->idform_fasKeb . "\")' '><i class='icon-trash'></i></button>";

           $nama = $data[$i]->nama;
           $hasil = $data[$i]->hasil;

           $ter_saca = $data[$i]->ter_saca;
           $ter_caba = $data[$i]->ter_caba;
           $was_be = $data[$i]->was_be;
           $fas_cut = $data[$i]->fas_cut;
           $tmp_smph = $data[$i]->tmp_smph;
           $ter_hand = $data[$i]->ter_hand;
           $ter_pos = $data[$i]->ter_pos;
           
           $ket = $data[$i]->keterangan;
           $rec = $data[$i]->rekomendasi;

           $nmStaff = $this->getStaffName($data[$i]->id_staff);
           $tgl_input = $data[$i]->tgl_input;

           $out[$i] = array($no,$tombol,$hapus,$nama,$hasil,$ter_saca,$ter_caba,$was_be,$fas_cut,$tmp_smph,$ter_hand,$ter_pos,$ket,$rec,$tgl_input,$nmStaff);
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
        $this->M_Form_Fasilitas_Kebersihan_Tangan->delete($id);
    }

    public function getData(){
        $id = $this->input->post('id');
        $data = $this->db->get_where('Formulir_fasilitas_kebersihan_tangan',["idform_fasKeb" => $id])->row_array();
        echo json_encode($data);
    }

    public function insert(){
        $data_staff = $this->session->userdata('data_auth');
        $data  = array(
            'nama' => $this->input->post('nama'),
            'hasil' => $this->input->post('hasil'),
            'ter_saca' => $this->input->post('ter_saca'),
            'ter_caba' => $this->input->post('ter_caba'),
            'was_be' => $this->input->post('was_be'),
            'fas_cut' => $this->input->post('fas_cut'),
            'tmp_smph' => $this->input->post('tmp_smph'),
            'ter_hand' => $this->input->post('ter_hand'),
            'ter_pos' => $this->input->post('ter_pos'),
            'keterangan' => $this->input->post('keterangan'),
            'rekomendasi' => $this->input->post('rekomendasi'),
            "id_staff" =>$data_staff->id_staff
        );
        $this->M_Form_Fasilitas_Kebersihan_Tangan->insert($data);
    }

    public function update(){
        $id = base64_decode($this->input->post('idP'));
        $data_staff = $this->session->userdata('data_auth');
        $data  = array(
            'nama' => $this->input->post('nama'),
            'hasil' => $this->input->post('hasil'),
            'ter_saca' => $this->input->post('ter_saca'),
            'ter_caba' => $this->input->post('ter_caba'),
            'was_be' => $this->input->post('was_be'),
            'fas_cut' => $this->input->post('fas_cut'),
            'tmp_smph' => $this->input->post('tmp_smph'),
            'ter_hand' => $this->input->post('ter_hand'),
            'ter_pos' => $this->input->post('ter_pos'),
            'keterangan' => $this->input->post('keterangan'),
            'rekomendasi' => $this->input->post('rekomendasi'),
            'tgl_input' => date("Y-m-d H:i:s"),
            "id_staff" =>$data_staff->id_staff
        );
        $this->M_Form_Fasilitas_Kebersihan_Tangan->update($id,$data);
    }

}