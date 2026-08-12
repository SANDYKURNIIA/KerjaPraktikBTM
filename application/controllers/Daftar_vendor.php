<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_vendor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Daftar_vendor');
    }

    public function index()
    {

        $this->load->view('assets/_header');
        
        $page_data['page_content'] = 'page_content/Daftar_vendor';
        

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_vendor()
    {
        $page_data = $this->M_Daftar_vendor->selectDataVendor();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $edit ="<button class='btn btn-success btn-icon-anim btn-square' onclick='tampilEditVendor(\"" . $page_data[$i]->id_vendor ."\")'  ><i class='icon-pencil'></i></button>";
            $hapus ="<button class='btn btn-danger btn-icon-anim btn-square' onclick='hapusVendor(\"" . $page_data[$i]->id_vendor .  "\",\"" . $page_data[$i]->nama ."\")'  ><i class='icon-trash'></i></button>";   

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $alamat = $page_data[$i]->alamat;
            $telp = $page_data[$i]->telp;
            $sales = $page_data[$i]->sales;

            $out[$i] = array($edit, $hapus, $no, $nama, $alamat, $telp, $sales);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }
    public function tambah_vendor(){
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $alamat = $this->input->post('alamat');
        $sales = $this->input->post('sales');
        $telp = $this->input->post('telp');

        $data = array(
            'id_vendor' => $id,
            'nama' => $nama,
            'sales' => $sales,
            'alamat' => $alamat,
            'telp' => $telp,
            'status' => 'AKTIF',
        );
        $out['status']="success";
        $this->M_Daftar_vendor->insert_vendor($data);
        echo json_encode($out);
    }
    public function edit_vendor(){
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $alamat = $this->input->post('alamat');
        $sales = $this->input->post('sales');
        $telp = $this->input->post('telp');

        $data = array(
            'nama' => $nama,
            'sales' => $sales,
            'alamat' => $alamat,
            'telp' => $telp,
        );
        $out['status']="success";
        $this->M_Daftar_vendor->update_vendor($id, $data);
        echo json_encode($out);
    }
    public function getDataVendor()
    {
        $id_vendor = $this->input->post('id_vendor');
        $db = $this->M_Daftar_vendor->selectDataById($id_vendor);
     
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    function hapus_vendor()
    {
        $id_vendor = $this->input->post('id_vendor');

        $this->M_Daftar_vendor->delete_vendor($id_vendor);
        $out['status'] = "success";
        echo json_encode($out);
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_vendor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Daftar_vendor');
    }

    public function index()
    {

        $this->load->view('assets/_header');
        
        $page_data['page_content'] = 'page_content/Daftar_vendor';
        

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_vendor()
    {
        $page_data = $this->M_Daftar_vendor->selectDataVendor();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $edit ="<button class='btn btn-success btn-icon-anim btn-square' onclick='tampilEditVendor(\"" . $page_data[$i]->id_vendor ."\")'  ><i class='icon-pencil'></i></button>";
            $hapus ="<button class='btn btn-danger btn-icon-anim btn-square' onclick='hapusVendor(\"" . $page_data[$i]->id_vendor .  "\",\"" . $page_data[$i]->nama ."\")'  ><i class='icon-trash'></i></button>";   

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $alamat = $page_data[$i]->alamat;
            $telp = $page_data[$i]->telp;
            $sales = $page_data[$i]->sales;

            $out[$i] = array($edit, $hapus, $no, $nama, $alamat, $telp, $sales);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }
    public function tambah_vendor(){
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $alamat = $this->input->post('alamat');
        $sales = $this->input->post('sales');
        $telp = $this->input->post('telp');

        $data = array(
            'id_vendor' => $id,
            'nama' => $nama,
            'sales' => $sales,
            'alamat' => $alamat,
            'telp' => $telp,
            'status' => 'AKTIF',
        );
        $out['status']="success";
        $this->M_Daftar_vendor->insert_vendor($data);
        echo json_encode($out);
    }
    public function edit_vendor(){
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $alamat = $this->input->post('alamat');
        $sales = $this->input->post('sales');
        $telp = $this->input->post('telp');

        $data = array(
            'nama' => $nama,
            'sales' => $sales,
            'alamat' => $alamat,
            'telp' => $telp,
        );
        $out['status']="success";
        $this->M_Daftar_vendor->update_vendor($id, $data);
        echo json_encode($out);
    }
    public function getDataVendor()
    {
        $id_vendor = $this->input->post('id_vendor');
        $db = $this->M_Daftar_vendor->selectDataById($id_vendor);
     
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    function hapus_vendor()
    {
        $id_vendor = $this->input->post('id_vendor');

        $this->M_Daftar_vendor->delete_vendor($id_vendor);
        $out['status'] = "success";
        echo json_encode($out);
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
