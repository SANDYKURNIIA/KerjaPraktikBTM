<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambah_stok_logistik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Tambah_stok_logistik');
        $this->load->model('M_Logistik_farmasi');
       
    }

    
    public function index()
    {
        
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Tambah_stok_logistik';
        $page_data['obat'] = $this->M_Tambah_stok_logistik->selectDataStok();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');

    }

    public function updateStok(){
        $frek = $this->input->post('frek');
        $id_stok = $this->input->post('id_stok'); 
        $data = array(
            'frek' => $frek
        );

        $where = array(
            'id_stok' => $id_stok
        );
    
        $this->M_Tambah_stok_logistik->updateStok($where, $data,'stok_logistik');
   
        $out['status']="success";
        echo json_encode($out);
    }

    public function tampil_detail(){
        $id_logistik = $this->input->post('id_logistik');


        $page_data = $this->M_Tambah_stok_logistik->selectDetailStok($id_logistik);
        


        $out=null;
        for ($i=0; $i < count($page_data); $i++) { 

        $no=$i+1;
        $nama=$page_data[$i]->nama;
        $idLogistik=$page_data[$i]->id_logistik;

        // $kadaluarsa = $this->db->query("SELECT kadaluarsa FROM stok_logistik 
        // WHERE id_logistik = '$idLogistik' 
        // group by kadaluarsa
        // having stok > 0 and timestampdiff(year,NOW(),kadaluarsa) > 1
        // ORDER by kadaluarsa asc limit 1")->row()->kadaluarsa;
        $kadaluarsa=$page_data[$i]->kadaluarsa;
        $frek=$page_data[$i]->stok;
        $tombol = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='collapse' href='#editDetailStok' onclick='editStokLogistik(\"" .$page_data[$i]->id_stok. "\",\"" .$page_data[$i]->id_logistik. "\",\"" .$page_data[$i]->nama. "\", \"" .$page_data[$i]->id_stok. "\" ,\"" .$kadaluarsa. "\" ,\"" .$page_data[$i]->stok. "\"  )'><i class='fa fa-pencil'></i></button>";
            $out[$i]=array($no,$nama,$kadaluarsa,$frek,$tombol);
        } 
        
        $page_data['data']=$out;
        echo json_encode($page_data);
    }


    public function insertUpdateStok()
    {
        $data_staff = $this->session->userdata('data_auth');
        $frek = $this->input->post('frek');
        $idLogistik = $this->input->post('id_logistik');
        $tglExp = $this->input->post('tglExp');
      
        $idProdusenObat = $this->input->post('idProdusenObat');
        $id = $this->input->post('id');
        $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaan($idLogistik)->stok;

        $data = array(
            'id_stok' => $id,
            'id_logistik' => $idLogistik,
            'tgl' => date("Y-m-d H:i:s"),
            'keterangan' => 'MASUK',
            'frek' => $frek,
            'saldo' => $getStok + ($frek),
            'kadaluarsa' => $tglExp,
            'asal_tujuan' => 'BASE',
            'id_struk' => '-',
            'id_staff' => $data_staff->id_staff,
        );
        // var_dump($data);
        // die();



        $this->M_Tambah_stok_logistik->insertUpdateStok($data, 'stok_logistik');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_stok_obat(){
        $page_data = $this->M_Tambah_stok_logistik->selectDataJoin();
        $out=null;
        for ($i=0; $i < count($page_data); $i++) { 

        $tombol = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal'
        data-target='#modal_edit' onclick='edit_detail(\"" .$page_data[$i]->id_logistik. "\" )'><i class='fa fa-pencil'></i></button>";
       
        $no=$i+1;
        $nama=$page_data[$i]->nama;
        $harga_cost = "Rp." . number_format($page_data[$i]->harga_cost, 0, ',', '.');
        $golongan_obat=$page_data[$i]->golongan_obat;
        $produsen=$page_data[$i]->produsen;
        $frek=number_format($page_data[$i]->stok);
        $tipe=$page_data[$i]->tipe;

            $out[$i]=array($no,$nama,$harga_cost,$golongan_obat,$produsen,$frek,$tipe,$tombol,);
        }
                $page_data['data']=$out;
                echo json_encode($page_data);
    }

}
?>