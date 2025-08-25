<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir_APD extends CI_Controller{
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Form_APD');
        $this->load->model('M_Form_Fasilitas_APD');
    }

    //formulir apd

    public function form_kepatuhan_apd(){
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_form/Form_APD';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    private function getStaffName($id_staff){
        return $this->db->get_where("staff",["id_staff" => $id_staff])->row()->nama;
    }

    public function get_all_data(){
        $data = $this->M_Form_APD->getAll();
        $out = null;

        for ($i=0; $i < count($data); $i++) { 
           $no = $i+1;
           $tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='pilih(\"" . $data[$i]->id_form . "\")' '><i class='icon-rocket'></i></button>";
           $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus(\"" . $data[$i]->id_form . "\")' '><i class='icon-trash'></i></button>";

           $nama = $data[$i]->nama;
           $petugas = $data[$i]->petugas;
           $hasil = $data[$i]->hasil;
           $topi = $data[$i]->topi;
           $masker = $data[$i]->masker;
           $sarungT = $data[$i]->sarungT;
           $gaun = $data[$i]->gaun;
           $google = $data[$i]->google;
           $alasK = $data[$i]->alasK;
           $keterangan = $data[$i]->keterangan;
           $rekomendasi = $data[$i]->rekomendasi;

           $namaStaff = $this->getStaffName($data[$i]->id_staff);
           $tgl_input = $data[$i]->tgl_input;

           $out[$i] = array($no,$tombol,$hapus,$nama,$petugas,$hasil,$topi,$masker,$sarungT,$gaun,$google,$alasK,$keterangan,$rekomendasi,$tgl_input,$namaStaff);
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
        $this->M_Form_APD->delete($id);
    }

    public function getData(){
        $id = $this->input->post('id');
        $data = $this->db->get_where('form_apd',["id_form" => $id])->row_array();
        echo json_encode($data);
    }

    public function insert(){
        $data_staff = $this->session->userdata('data_auth');
        $data  = array(
            'nama' => $this->input->post('nama'),
            'petugas' => $this->input->post('petugas'),
            'hasil' => $this->input->post('hasil'),
            'topi' => $this->input->post('topi'),
            'masker' => $this->input->post('masker'),
            'sarungT' => $this->input->post('sarungT'),
            'gaun' => $this->input->post('gaun'),
            'google' => $this->input->post('google'),
            'alasK' => $this->input->post('alasK'),
            'keterangan' => $this->input->post('keterangan'),
            'rekomendasi' => $this->input->post('rekomendasi'),
            "id_staff" =>$data_staff->id_staff
        );
        $this->M_Form_APD->insert($data);
    }

    public function update(){

        $id = base64_decode($this->input->post('idP'));

        $data_staff = $this->session->userdata('data_auth');
        $data  = array(
            'nama' => $this->input->post('nama'),
            'hasil' => $this->input->post('hasil'),
            'petugas' => $this->input->post('petugas'),
            'topi' => $this->input->post('topi'),
            'masker' => $this->input->post('masker'),
            'sarungT' => $this->input->post('sarungT'),
            'gaun' => $this->input->post('gaun'),
            'google' => $this->input->post('google'),
            'alasK' => $this->input->post('alasK'),
            'keterangan' => $this->input->post('keterangan'),
            'rekomendasi' => $this->input->post('rekomendasi'),
            'tgl_input' => date("Y-m-d H:i:s"),
            "id_staff" =>$data_staff->id_staff
        );
        $this->M_Form_APD->update($id,$data);
    }


    //fasilitas APD
    public function form_fasilitas_apd(){
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_form/Form_fasilitas_APD';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function get_all_data_fasilitas_apd(){
        $data = $this->M_Form_Fasilitas_APD->getAll();
        $out = null;

        for ($i=0; $i < count($data); $i++) { 
           $no = $i+1;
           $tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='pilih(\"" . $data[$i]->id_form . "\")' '><i class='icon-rocket'></i></button>";
           $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus(\"" . $data[$i]->id_form . "\")' '><i class='icon-trash'></i></button>";

           $nama = $data[$i]->nama;
           $petugas = $data[$i]->petugas;
           $hasil = $data[$i]->hasil;

           $apd_terLe = $data[$i]->apd_terLe;
           $stok_apd = $data[$i]->stok_apd;
           
           $ket = $data[$i]->keterangan;
           $rec = $data[$i]->rekomendasi;

           $nmStaff = $this->getStaffName($data[$i]->id_staff);
           $tgl_input = $data[$i]->tgl_input;

           $out[$i] = array($no,$tombol,$hapus,$nama,$petugas,$hasil,$apd_terLe,$stok_apd,$ket,$rec,$tgl_input,$nmStaff);
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

    public function delete_fasilitas_apd(){
        $id = $this->input->post('id');
        $this->M_Form_Fasilitas_APD->delete($id);
    }

    public function getData_fasilitas_apd(){
        $id = $this->input->post('id');
        $data = $this->db->get_where('form_fasilitas_apd',["id_form" => $id])->row_array();
        echo json_encode($data);
    }

    public function insert_fasilitas_apd(){
        $data_staff = $this->session->userdata('data_auth');
        $data  = array(
            'nama' => $this->input->post('nama'),
            'petugas' => $this->input->post('petugas'),
            'hasil' => $this->input->post('hasil'),
            'apd_terLe' => $this->input->post('apd_terLe'),
            'stok_apd' => $this->input->post('stok_apd'),
            'keterangan' => $this->input->post('keterangan'),
            'rekomendasi' => $this->input->post('rekomendasi'),
            "id_staff" =>$data_staff->id_staff
        );
        $this->M_Form_Fasilitas_APD->insert($data);
    }

    public function update_fasilitas_apd(){
        $id = base64_decode($this->input->post('idP'));
        $data_staff = $this->session->userdata('data_auth');
        $data  = array(
            'nama' => $this->input->post('nama'),
            'petugas' => $this->input->post('petugas'),
            'hasil' => $this->input->post('hasil'),
            'apd_terLe' => $this->input->post('apd_terLe'),
            'stok_apd' => $this->input->post('stok_apd'),
            'keterangan' => $this->input->post('keterangan'),
            'rekomendasi' => $this->input->post('rekomendasi'),
            'tgl_input' => date("Y-m-d H:i:s"),
            "id_staff" =>$data_staff->id_staff
        );
        $this->M_Form_Fasilitas_APD->update($id,$data);
    }

}
