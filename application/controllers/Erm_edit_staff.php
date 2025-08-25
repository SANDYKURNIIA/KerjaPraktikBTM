<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Erm_edit_staff extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Polionline');
        $this->load->model('M_Pasien');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->library('form_validation');
    }

    public function edit_staff()
    {
        $this->load->view('assets/_header');
        $page_data['page_content']='page_content/edit_staff';
        $this->load->view('Main',$page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_dataakun(){
        $page_data = $this->M_Polionline->selectDataStaff();
        $out=null;
        for ($i=0; $i < count($page_data); $i++) { 
            if ($page_data[$i]->status == "aktif") {
                $status = "<span class='label label-success capitalize-font inline-block'>aktif</span>";
                $tombol = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_tutup(\"" . $page_data[$i]->username . "\")' '><i class='icon-lock '></i></button>";
            } else {
                $status = "<span class='label label-danger capitalize-font inline-block'>Tidak aktif</span>";
                $tombol = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='edit_buka(\"" . $page_data[$i]->username . "\")' '><i class='icon-lock '></i></button>";
            }
            $aksi = "<button class='btn btn-default btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_pendaftaran(\"" . $page_data[$i]->username . "\")' '><i class='fa fa-pencil'></i></button>";

            $no=$i+1;
            $nama=$page_data[$i]->nama;
            $username=$page_data[$i]->username;
            $password=$page_data[$i]->password;
            $izin_akses=$page_data[$i]->izin_akses;
            $tipe=$page_data[$i]->tipe;
            $tombol=$tombol;
            $status=$status;
            $aksi=$aksi;

            $out[$i]=array($no,$aksi,$status,$tombol,$username,$password,$nama,$izin_akses,$tipe);
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

    public function insertAkun(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('izin_akses', 'Izin Akses', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');
     
        if ($this->form_validation->run()) {
            $username  = $this->input->post('username');
            $password  = $this->input->post('password');
            $nama = $this->input->post('nama');
            $status = 'aktif';
            $izin_akses = $this->input->post('izin_akses');
            $tipe = $this->input->post('tipe');
            
            $data = array(
                'id_akun' => $this->M_Polionline->get_ai_tbl_id(),

                'username' => $username,
                'password' => $password,
                'nama' => $nama,
                'status' => $status,
                'tipe' => $tipe,
                'izin_akses' => $izin_akses,

            );
                $this->M_Polionline->insertAkun($data,'staff');
                $out['status']="success";
        } else {
            $out = array(
                'error'   => true,
                'nama_error' => form_error('nama'),
                'username_error' => form_error('username'),
                'password_error' => form_error('password'),
                'izin_akses_error' => form_error('izin_akses'),
                'tipe_error' => form_error('tipe')
            );
        }
            echo json_encode($out);
    }

    public function buka_staff(){

        $username = $this->input->post('username');
        $status = 'aktif';
    
        $page_data = array(
            'status' => $status
        );
        $where = array(
            'username' => $username
        );
    
        $this->M_Polionline->update_staff($where, $page_data,'staff');
    
        $out['status']="success";
        echo json_encode($out);
    }

    public function tutup_staff(){

        $username = $this->input->post('username');
        $status = 'tidak aktif';
    
        $page_data = array(
            'status' => $status
        );
        $where = array(
            'username' => $username
        );
    
        $this->M_Polionline->update_staff($where, $page_data,'staff');
    
        $out['status']="success";
        echo json_encode($out);
    }

    public function check_username(){

        $usrname=$this->input->post("username");
        $tmp_data=$this->M_Polionline->get_usernamestaff($usrname);
        if(count($tmp_data)>0)
        {
            echo '<label class="text-danger pt-10"><span><i class="fa fa-times" aria-hidden="true">
            </i> Username sudah dipakai</span></label>';
        }
        else {
            echo '<label class="text-success pt-10"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Username tersedia</span></label>';
        }
    }

    public function getdata_staff()
    {
        $username=$this->input->post('username');
        $db=$this->M_Polionline->selectDataStaffby_id($username);
        if(count($db)>0){
            $db=$db[0];
            $db->status_dt='found';
        }else{
            $db=null;
            $db['status_dt']='not found';
        }
        echo json_encode($db);
        exit;
    }
}




