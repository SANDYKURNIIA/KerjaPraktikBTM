<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pasien_online extends CI_Controller{

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

    public function Pendaftaran_akun()
    {
        $this->load->view('assets/_header');
        $page_data['page_content']='page_content/Pendaftaran_akun';
        $this->load->view('Main',$page_data);
        $this->load->view('assets/_footer');
    }

    public function Konfirmasi_kehadiran()
    {
        $this->load->view('assets/_header');
        $page_data['page_content']='page_content/Konfirmasi_kehadiran';
        $page_data['data_asal_pasien']=$this->M_Polionline->selectAsalPasien();
        $page_data['data_dokter']=$this->M_Polionline->selectNamaDPJP();
        $page_data['data_cara_bayar']=$this->M_Polionline->selectCaraBayar();
        $page_data['data_nama_poli'] = $this->M_Pasien->selectNamaPoli();
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $this->load->view('Main',$page_data);
        $this->load->view('assets/_footer');
    }

    public function Poli_online()
    {
        $this->load->view('assets/_header');
        $page_data['page_content']='page_content/Poli_online';
        $this->load->view('Main',$page_data);
        $this->load->view('assets/_footer');
    }

    // Get
    public function getdata_pendaftaran()
    {
        $username=$this->input->post('username');
        $db=$this->M_Polionline->selectDataPendaftaranby_id($username);
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



    public function getdata_ubahkonfirm()
    {
        $id_pelayanan=$this->input->post('id_pelayanan');
        $db=$this->M_Polionline->selectDataUbahby_id($id_pelayanan);
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


    //Select
    public function tampil_konfirmasi_kehadiran(){
        $page_data = $this->M_Polionline->selectKonfirmasiKehadiran();
        $out=null   ;
        for ($i=0; $i < count($page_data); $i++) { 
       
        if($page_data[$i]->status == 1) {
                $status =
                "<span class='label label-success capitalize-font inline-block'>Sudah dikonfirmasi</span>";
                $konfirmasi = '';
                $batal = '';
                $data = '';
            } else{
                $konfirmasi =                                                                                                                  
                "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_modalkonfirmasi(\"" . $page_data[$i]->id_pelayanan ."\",\"".$page_data[$i]->nama. "\")' '><i class='glyphicon glyphicon-check'></i></button>";  
                $status ="<span class='label label-warning capitalize-font inline-block'>Belum dikonfirmasi</span>";
                $batal=
                "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='edit_modaldelete(\"" . $page_data[$i]->id_pelayanan ."\",\"".$page_data[$i]->nama. "\")' '><i class='fa fa-close '></i></button>";      
            }  
     
            $ubah =
            "<button class='btn btn-default btn-icon-anim btn-square' data-toggle='modal'  onclick='edit_modalubah(\"" . $page_data[$i]->id_pelayanan ."\")' '><i class='fa fa-pencil'></i></button>";

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);

            $waktu = strftime("%H:%M WIB", $time);

            $no=$i+1;
            $ubah=$ubah;
            $batal=$batal;
            $konfirmasi=$konfirmasi;
            $status=$status;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk=$date2;
            $jam_masuk=$waktu;
            $no_antrian = "kosong";
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $agama = $page_data[$i]->agama;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa= $page_data[$i]->diagnosa;
            $keterangan= $page_data[$i]->keterangan;
            $no_sep= $page_data[$i]->no_sep;
            $nama_akun= $page_data[$i]->nama_akun;
            $telp= $page_data[$i]->no_hp;

            $out[$i]=array($no,$ubah,$batal,$konfirmasi,$status,$no_rm,$nama,$tgl_masuk,$jam_masuk,$no_antrian,$jenis_kelamin,$tgl_lahir,$umur,$agama,$cara_masuk,$ruang,$dokter,$cara_bayar,$diagnosa,$keterangan,$no_sep,$nama_akun,$telp);

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

    public function tampil_dataakun(){
        $page_data = $this->M_Polionline->selectDataAkun();
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
            $email=$page_data[$i]->email;
            $no_hp=$page_data[$i]->no_hp;
            $tgl_daftar=$page_data[$i]->tgl_daftar;
            $tombol=$tombol;
            $status=$status;
            $aksi=$aksi;

            $out[$i]=array($no,$aksi,$status,$tombol,$nama,$username,$password,$email,$no_hp,$tgl_daftar);
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

    public function tampil_poli_online(){
        $page_data = $this->M_Polionline->selectPoliOnline();
        $out=null   ;
        for ($i=0; $i < count($page_data); $i++) { 
         if ($page_data[$i]->status == "buka") {
            $status =
            "<span class='label label-success capitalize-font inline-block'>BUKA</span>";
            $tombol =
            "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_tutup(\"" . $page_data[$i]->id_list_poli ."\",\"". $page_data[$i]->nama_panjang. "\")' '><i class='icon-lock '></i></button>";
        } else {
            $status =
            "<span class='label label-danger capitalize-font inline-block'>TUTUP</span>";
            $tombol =
            "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='edit_buka(\"" . $page_data[$i]->id_list_poli ."\",\"". $page_data[$i]->nama_panjang. "\")' '><i class='icon-lock '></i></button>";

        }
        $no=$i+1;
        $tombol=$tombol;
        $status=$status;
        $nama_panjang=$page_data[$i]->nama_panjang;
        $out[$i]=array($no,$tombol,$status,$nama_panjang);
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

public function tampil_list(){
    $username = $this->input->post('dt_username');
    $db_akun=$this->M_Polionline->selectDataPendaftaranby_id($username);
    $page_data = null;
    $out=null;
    if(count($db_akun)>0){
        $id_akun = $db_akun[0]->id_akun;
        $page_data = $this->M_Polionline->get_list($id_akun);
        for ($i=0; $i < count($page_data); $i++) { 
            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_rm(\"" . $id_akun ."\",\"". $page_data[$i]->no_rm. "\")' '><i class='fa fa-trash '></i></button>";
            $no=$i+1;
            $no_rm=$page_data[$i]->no_rm;
            $nama=$page_data[$i]->nama;
            $tgl_lahir=$page_data[$i]->tgl_lahir;
            $tombol=$tombol;

            $out[$i]=array($no,$no_rm,$nama,$tgl_lahir,$tombol);
        }
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

//Insert
public function insertAkun(){
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
 
    if ($this->form_validation->run()) {
        $email = $this->input->post('email');
        $username  = $this->input->post('username');
        $password  = $this->input->post('password');
        $nama = $this->input->post('nama');
        $status = 'aktif';
        $no_hp = $this->input->post('no_hp');
        $tgl_daftar = date("Y-m-d H:i:s");
        $data = array(
            'id_akun' => $this->M_Polionline->get_ai_tbl_id(),
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'status' => $status,
            'tgl_daftar' => $tgl_daftar,
            'no_hp' => $no_hp
        );
            $this->M_Polionline->insertAkun($data,'akun_online');
            $out['status']="success";
    } else {
        $out = array(
            'error'   => true,
            'nama_error' => form_error('nama'),
            'username_error' => form_error('username'),
            'password_error' => form_error('password'),
            'email_error' => form_error('email'),
            'nohp_error' => form_error('no_hp')
        );
    }
        echo json_encode($out);
}


public function simpan_data_rm(){
    $id_akun = $this->input->post('id_akun');
    $no_rm = $this->input->post('no_rm');
    $idakun_rm = $this->M_Polionline->get_listby_id_rm($id_akun,$no_rm);//check apakah ada no rm dengan id akun yang sama
    //jika ada tidak diinputkan ulang
    $out=null;
    if(count($idakun_rm)>0){
        $out['status']="No RM tersebut telah ditambahkan pada akun ini sebelumnya";
    }else{
        $data=array(
            'id_akun'=>$id_akun,
            'no_rm'=>$no_rm
        );
        $this->M_Polionline->insert_data_rm($data,'list_rm_online');
        $out['status']="success";
    }
    echo json_encode($out);
}

//Get
public function check_username(){

    $usrname=$this->input->post("username");
    $tmp_data=$this->M_Polionline->get_username($usrname);
    if(count($tmp_data)>0)
    {
        echo '<label class="text-danger pt-10"><span><i class="fa fa-times" aria-hidden="true">
        </i> Username sudah dipakai</span></label>';
    }
    else {
        echo '<label class="text-success pt-10"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Username tersedia</span></label>';
    }
}


public function check_norm(){
    $no_rm = $this->input->post('no_rm');
    $page_data = $this->M_Polionline->get_norm_like($no_rm);
    $out=null   ;
    for ($i=0; $i < count($page_data); $i++) { 
        $tombol =  $tombol = "<button class='btn btn-success btn-icon-anim btn-square'  onclick='simpan_data_rm(\"" . $page_data[$i]->no_rm . "\")' '><i class='icon-plus '></i></button>";
        $no=$i+1;
        $no_rm=$page_data[$i]->no_rm;
        $nama=$page_data[$i]->nama;
        $tgl_lahir=$page_data[$i]->tgl_lahir;
        $tombol=$tombol;

        $out[$i]=array($no,$no_rm,$nama,$tgl_lahir,$tombol);
    }
    
    if($out==null || $out==""){
        echo '{"data":""}';
    exit;
    }else{
        $page_data['data']=$out;
        echo json_encode($page_data);
        exit;
    }
}


    //Update
public function buka_akunonline(){

    $username = $this->input->post('username');
    $status = 'aktif';

    $page_data = array(
        'status' => $status
    );
    $where = array(
        'username' => $username
    );

    $this->M_Polionline->update_akunonline($where, $page_data,'akun_online');

    $out['status']="success";
    echo json_encode($out);
}


public function tutup_akunonline(){

    $username = $this->input->post('username');
    $status = 'tidak aktif';

    $page_data = array(
        'status' => $status
    );
    $where = array(
        'username' => $username
    );

    $this->M_Polionline->update_akunonline($where, $page_data,'akun_online');

    $out['status']="success";
    echo json_encode($out);
}


public function update_data(){
    $id_pelayanan = $this->input->post('id_pelayanan');
    
    $data1=array(
        'asal_pasien' => $this->input->post('asalUbah'),
        'no_sep'  => $this->input->post('sepUbah'),
        'cara_bayar'  => $this->input->post('bayarUbah'),
        'diagnosa' => $this->input->post('diagnoUbah'),
    );
   
    $this->M_Polionline->update_kehadirankonfirmasi1($id_pelayanan,$data1);

    $idHis = $this->input->post('idHis');
    $data2=array( 
    'dpjp' => $this->input->post('dokterUbah'),
    'nama_poli'  => $this->input->post('poliUbah'),
    );

    $this->M_Polionline->update_kehadirankonfirmasi2($idHis,$data2);

    $out['status']="success";
    echo json_encode($out);
}


public function buka_polionline(){

    $id_list_poli = $this->input->post('id_list_poli');
    $status = 'buka';

    $page_data = array(
        'status' => $status
    );

    $where = array(
        'id_list_poli' => $id_list_poli
    );
    $this->M_Polionline->update_poli_online($where, $page_data,'list_poli');

    $out['status']="success";
    echo json_encode($out);

}

public function tutup_polionline(){

    $id_list_poli = $this->input->post('id_list_poli');
    $namapoli = $this->input->post('namapoli');
    $status = 'tutup';

    $page_data = array(
        'status' => $status
    );

    $where = array(
        'id_list_poli' => $id_list_poli
    );

    $this->M_Polionline->update_poli_online($where, $page_data,'list_poli');
    $out['status']="success";
    echo json_encode($out);

}

public function konfirmasi_hadir(){

    $id_pelayanan = $this->input->post('id_pelayanan');
    $status = '1';

    $page_data = array(
        'status' => $status
    );

    $where = array(
        'id_pelayanan' => $id_pelayanan
    );

    $this->M_Polionline->update_konfirmasi($where, $page_data,'pelayanan');
    $out['status']="success";
    echo json_encode($out);
}

    // Delete
function hapus_data_rmbyakun(){
    $id_akun = $this->input->post('id_akun');
    $no_rm = $this->input->post('no_rm');
    $this->M_Polionline->delete_rm($id_akun,$no_rm);  
    $out['status']="success";
    echo json_encode($out);
}

     // Delete Konfirmasi kehadiran
     
    public function batal_hadir()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $ket = '1';
        
        $page_data = array(
        'ket' => $ket
    );
        $where = array(
        'id_pelayanan' => $id_pelayanan
    );
        $this->M_Polionline->delete_konfirm($where, $page_data,'pelayanan');
        $out['status']="success";
        echo json_encode($out);
    }


}
