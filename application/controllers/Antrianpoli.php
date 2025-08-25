<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Antrianpoli extends CI_Controller{

    function __construct()
	{
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Antrianpoli');
    }

    public function index(){
        $this->load->view('assets/_header');
        $page_data['page_content']='page_content/Antrianpoli';
		$this->load->view('Main',$page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_antrian_poli(){
        $data = $this->M_Antrianpoli->selectAntrian();
        $out=null;
        for ($i=0; $i < count($data); $i++) { 
        if ($data[$i]->ket == 0) {
            $status ="<span class='label label-success capitalize-font inline-block'>ANTRI</span>";
            $skip = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='skip_data(\"" . $data[$i]->id_antrian . "\")' '><i class='icon-close'></i></button>";
            $selesai = "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='selesai_data(\"" . $data[$i]->id_antrian . "\")' '><i class='icon-control-play'></i></button>";
        } else if($data[$i]->ket == 1) {
            $status = "<span class='label label-danger capitalize-font inline-block'>SKIP</span>";
            $skip ="";
            $selesai = "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='selesai_data(\"" . $data[$i]->id_antrian . "\")' '><i class='icon-control-play'></i></button>";
        } else  if($data[$i]->ket == 2) {
            $status = "<span class='label label-warning capitalize-font inline-block'>SELESAI</span>";
            $skip ="";
            $selesai ="";
        }
        
        $time = strtotime($data[$i]->jam);
        $waktu = strftime("%H:%M WIB", $time);

        $no_rm= $data[$i]->no_rm;
        $nama= $data[$i]->nama;
        $nama_poli= $data[$i]->nama_panjang;
        $cara_bayar=$data[$i]->cara_bayar;
        $no_antri = $data[$i]->no_antri;
        $status=$status;
        $jam_masuk=$waktu;

        $out[$i]=array($no_antri,$nama_poli,$jam_masuk,$no_rm,$nama,$cara_bayar, $status,$skip,$selesai);
        }
        if($out==null){
            echo '{"data":""}';
            exit;
         }else{
            $data['data']=$out;
            echo json_encode($data);
            exit;
        }
    }
 
    public function updateskip(){
        $id_antrian = $this->input->post('id_antrian');
        $ket = '1';
    
        $data = array(
            'ket' => $ket
        );

        $where = array(
            'id_antrian' => $id_antrian
        );
    
        $this->M_Antrianpoli->updateskip($where, $data,'antrian_poli');
   
        $out['status']="success";
        echo json_encode($out);
    }

    public function updateselesai(){
        $id_antrian = $this->input->post('id_antrian');
        $ket = '2';
    
        $data = array(
            'ket' => $ket
        );

        $where = array(
            'id_antrian' => $id_antrian
        );
    
        $this->M_Antrianpoli->updateselesai($where, $data,'antrian_poli');
   
        $out['status']="success";
        echo json_encode($out);
    }

}
