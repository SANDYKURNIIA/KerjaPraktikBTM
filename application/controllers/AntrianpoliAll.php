<<<<<<< HEAD
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AntrianpoliAll extends CI_Controller{

    function __construct()
	{
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_AntrianpoliAll');
        $this->load->model('M_Poli');
    }

    public function index(){
        $this->load->view('assets/_header');
        $page_data['page_content']='page_content/AntrianpoliAll';
		$this->load->view('Main',$page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_antrian_poli(){
        $data = $this->M_AntrianpoliAll->selectAntrian();
        $out=null;
        for ($i=0; $i < count($data); $i++) { 
        if ($data[$i]->ket == 0) {
            $status ="<span class='label label-success capitalize-font inline-block'>ANTRI</span>";
            $skip = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='skip_data(\"" . $data[$i]->id_antrian . "\")' '><i class='icon-close'></i></button>";
            $panggil = "<button title='".$data[$i]->tipe_staff."'' class='btn btn-success btn-icon-anim btn-square' data-toggle='modal'  onclick='playTableSuara(\"" . $data[$i]->inisial . "\",\"" . $data[$i]->no_antri . "\",\"" . $data[$i]->poli . "\",\"" . $data[$i]->nama . "\",\"" . $data[$i]->tipe_staff . "\")' '><i class='icon-control-play'></i></button>";
            $selesai = "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='selesai_data(\"" . $data[$i]->id_antrian . "\")' '><i class='icon-control-play'></i></button>";
        } else if($data[$i]->ket == 1) {
            $status = "<span class='label label-danger capitalize-font inline-block'>SKIP</span>";
            $skip ="";
            $panggil = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal'  onclick='playTableSuara(\"" . $data[$i]->inisial . "\",\"" . $data[$i]->no_antri . "\",\"" . $data[$i]->poli . "\",\"" . $data[$i]->nama . "\")' '><i class='icon-control-play'></i></button>";
            $selesai = "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='selesai_data(\"" . $data[$i]->id_antrian . "\")' '><i class='icon-control-play'></i></button>";
        } else  if($data[$i]->ket == 2) {
            $status = "<span class='label label-warning capitalize-font inline-block'>SELESAI</span>";
            $skip ="";
            $panggil ="";
            $selesai ="";
        }
        
        $time = strtotime($data[$i]->jam);
        $waktu = strftime("%H:%M WIB", $time);

        $no_rm= $data[$i]->no_rm;
        $nama= $data[$i]->nama;
        $nama_poli= $data[$i]->nama_panjang;
        $cara_bayar=$data[$i]->cara_bayar;
        $no_antri = strtoupper($data[$i]->inisial.$data[$i]->no_antri);
        $status=$status;
        $jam_masuk=$waktu;

        $out[$i]=array($no_antri,$nama_poli,$jam_masuk,$no_rm,$nama,$cara_bayar, $status,$skip,$panggil,$selesai);
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
    
        $this->M_AntrianpoliAll->updateskip($where, $data,'antrian_poli');
   
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
    
        $this->M_AntrianpoliAll->updateselesai($where, $data,'antrian_poli');
   
        $out['status']="success";
        echo json_encode($out);
    }


    public function playSuara()
    {
        // $data = $this->session->userdata('data_auth');
        $tipe = $this->input->post("tipe_staff");;
      
        $spes = $this->db->get_where('list_poli',['tipe_staff'=>$tipe])->row()->nama;
        $nomor = $this->input->post("nomor");
        $kode = $this->input->post("kode");
        $nama = $this->input->post("nama");

        // $tipe = 'POLI';
        $poli = $spes;

        $data = array(
            'no' => $nomor,
            'kode' => $kode,
            'tipe' => $tipe,
            'poli' => $spes,
            'nama' => $nama,
        );

        $this->M_AntrianpoliAll->insertplaySuara($data, 'temp_panggil_antrian');
        $out['status'] = "success";
        echo json_encode($out);
    }

}
=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AntrianpoliAll extends CI_Controller{

    function __construct()
	{
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_AntrianpoliAll');
        $this->load->model('M_Poli');
    }

    public function index(){
        $this->load->view('assets/_header');
        $page_data['page_content']='page_content/AntrianpoliAll';
		$this->load->view('Main',$page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_antrian_poli(){
        $data = $this->M_AntrianpoliAll->selectAntrian();
        $out=null;
        for ($i=0; $i < count($data); $i++) { 
        if ($data[$i]->ket == 0) {
            $status ="<span class='label label-success capitalize-font inline-block'>ANTRI</span>";
            $skip = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='skip_data(\"" . $data[$i]->id_antrian . "\")' '><i class='icon-close'></i></button>";
            $panggil = "<button title='".$data[$i]->tipe_staff."'' class='btn btn-success btn-icon-anim btn-square' data-toggle='modal'  onclick='playTableSuara(\"" . $data[$i]->inisial . "\",\"" . $data[$i]->no_antri . "\",\"" . $data[$i]->poli . "\",\"" . $data[$i]->nama . "\",\"" . $data[$i]->tipe_staff . "\")' '><i class='icon-control-play'></i></button>";
            $selesai = "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='selesai_data(\"" . $data[$i]->id_antrian . "\")' '><i class='icon-control-play'></i></button>";
        } else if($data[$i]->ket == 1) {
            $status = "<span class='label label-danger capitalize-font inline-block'>SKIP</span>";
            $skip ="";
            $panggil = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal'  onclick='playTableSuara(\"" . $data[$i]->inisial . "\",\"" . $data[$i]->no_antri . "\",\"" . $data[$i]->poli . "\",\"" . $data[$i]->nama . "\")' '><i class='icon-control-play'></i></button>";
            $selesai = "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='selesai_data(\"" . $data[$i]->id_antrian . "\")' '><i class='icon-control-play'></i></button>";
        } else  if($data[$i]->ket == 2) {
            $status = "<span class='label label-warning capitalize-font inline-block'>SELESAI</span>";
            $skip ="";
            $panggil ="";
            $selesai ="";
        }
        
        $time = strtotime($data[$i]->jam);
        $waktu = strftime("%H:%M WIB", $time);

        $no_rm= $data[$i]->no_rm;
        $nama= $data[$i]->nama;
        $nama_poli= $data[$i]->nama_panjang;
        $cara_bayar=$data[$i]->cara_bayar;
        $no_antri = strtoupper($data[$i]->inisial.$data[$i]->no_antri);
        $status=$status;
        $jam_masuk=$waktu;

        $out[$i]=array($no_antri,$nama_poli,$jam_masuk,$no_rm,$nama,$cara_bayar, $status,$skip,$panggil,$selesai);
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
    
        $this->M_AntrianpoliAll->updateskip($where, $data,'antrian_poli');
   
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
    
        $this->M_AntrianpoliAll->updateselesai($where, $data,'antrian_poli');
   
        $out['status']="success";
        echo json_encode($out);
    }


    public function playSuara()
    {
        // $data = $this->session->userdata('data_auth');
        $tipe = $this->input->post("tipe_staff");;
      
        $spes = $this->db->get_where('list_poli',['tipe_staff'=>$tipe])->row()->nama;
        $nomor = $this->input->post("nomor");
        $kode = $this->input->post("kode");
        $nama = $this->input->post("nama");

        // $tipe = 'POLI';
        $poli = $spes;

        $data = array(
            'no' => $nomor,
            'kode' => $kode,
            'tipe' => $tipe,
            'poli' => $spes,
            'nama' => $nama,
        );

        $this->M_AntrianpoliAll->insertplaySuara($data, 'temp_panggil_antrian');
        $out['status'] = "success";
        echo json_encode($out);
    }

}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
