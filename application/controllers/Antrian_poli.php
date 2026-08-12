<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Antrian_poli extends CI_Controller{

    function __construct()
	{
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Polionline');
    }

    public function index(){
        $this->load->view('assets/_header');
        $page_data['page_content']='page_content/Antrian_poli';
		$this->load->view('Main',$page_data);
        $this->load->view('assets/_footer');
    }

    public function buka_poli(){
        $nama= $this->input->post('nama');
        $status = 'BUKA';
        
        $page_data = array(
            'status' => $status
        );
    
        $where = array(
            'nama' => $nama
        );
        $this->M_Polionline->update_antrian_poli($where, $page_data,'admin_poli');
    
        $out['status']="success";
        echo json_encode($out);
    
    }
    
    public function tutup_poli(){
    
        $nama= $this->input->post('nama');
        $status = 'TUTUP';
    
        $page_data = array(
            'status' => $status
        );
    
        $where = array(
            'nama' => $nama
        );
    
        $this->M_Polionline->update_antrian_poli($where, $page_data,'admin_poli');
        $out['status']="success";
        echo json_encode($out);
    
    }


    public function tampil_antrian_poli(){
        $page_data = $this->M_Polionline->selectAntrianPoli();
        $out = null;
        for ($i=0; $i < count($page_data); $i++) { 
        if ($page_data[$i]->status == "BUKA") {
        $status =
        "<span class='label label-success capitalize-font inline-block'>BUKA</span>";
            $tombol =
            "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_tutup(\"" . $page_data[$i]->nama . "\")' '><i class='icon-lock '></i></button>";
        } else {
             $status =
            "<span class='label label-danger capitalize-font inline-block'>TUTUP</span>";
            $tombol =
            "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='edit_buka(\"" . $page_data[$i]->nama . "\")' '><i class='icon-lock '></i></button>";
        }   

            $no=$i+1;
            $tombol=$tombol;
            $nama=$page_data[$i]->nama;
            $status=$status;

            $out[$i]=array($no,$tombol,$status,$nama);
        }
        if($out==null){
            echo '{"data":""}';
            exit;
        }else{
            $page_data['data']=$out;
            echo json_encode($page_data);
            exit;
        }
           
    }

}
