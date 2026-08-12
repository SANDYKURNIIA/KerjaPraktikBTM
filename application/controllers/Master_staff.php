<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Master_staff extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Master_Staff');
    }
    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['tipe'] = $this->M_Master_Staff->get_tipe();
        $page_data['page_content'] = 'page_content/master_staff';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function hapus_master_staff()
    {
        $id = $this->input->post('id_staff');
        $this->M_Master_Staff->delete_master_staff($id, 'master_staff', 'id_staff');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_master_staff()
    {
        $page_data = $this->M_Master_Staff->selectmaster_staff();
        $id = $this->input->post('id');
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_master_staff(\"" . $page_data[$i]->id_staff .  "\")'><i class='icon-pencil'></i></a>";
            $no = $i + 1;
            $username = $page_data[$i]->username;
            $password = $page_data[$i]->password;
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $status = $page_data[$i]->status;
            $hapus = "<button class='btn btn-danger btn-icon-anim btn-square' onclick='hapus_master_staff(\"" . $page_data[$i]->id_staff . "\")'><i class='fa fa-trash '></i></button>";
            // $biaya = $page_data[$i]->biaya_sarana;
            // $jasa = $page_data[$i]->jasa_transport;
            // $total = $jasa + $biaya;
            // $status = $page_data[$i]->status;

            $out[$i] = array($no, $edit, $hapus,  $username, $password, $nama, $tipe, $status);
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    public function getDatamasterstaff()
    {
        $id_staff = $this->input->post('id_staff');
        $db = $this->M_Master_Staff->selectDatamaster_staff($id_staff);

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

    public function edit_master_staff()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $tipe = $this->input->post('tipe');
        $status = $this->input->post('status');
        $id_staff = $this->input->post('id_staff');
        $data = array(
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'tipe' => $tipe,
            'status' => $status,
        );
        $where = array(
            'id_staff' => $id_staff,
        );
        $out['status'] = "success";
        $this->M_Master_Staff->update($data, $where, 'staff');
        echo json_encode($out);
    }

    
    public function insert_master_staff()
    {
        // Mendapatkan data dari session
        $data = $this->session->userdata('data_auth');

        // Mendapatkan data dari input form
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $tipe = $this->input->post('tipe');
        $status = $this->input->post('status');

        $encoded_password = base64_encode($password);
        // $people = $this->M_Master_Staff->get_staff_by_username($username);
        // $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Menyiapkan data yang akan diinsert ke dalam tabel staff
        $data = array(
            'id_staff' => uniqid(),  // Menghasilkan id unik untuk staff
            'username' => $username,
            'password' => $encoded_password,
            'nama' => $nama,
            'tipe' => $tipe,
            'status' => $status,
            // Jika ada kolom lain yang diperlukan, tambahkan di sini.
        );


        // Panggil model untuk insert data
        $this->M_Master_Staff->insert_master_staff($data, 'staff');

        // Siapkan output response
        $out['status'] = "success";  // Status berhasil
        echo json_encode($out);  // Mengembalikan hasil dalam format JSON
    }

    
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Master_staff extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Master_Staff');
    }
    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['tipe'] = $this->M_Master_Staff->get_tipe();
        $page_data['page_content'] = 'page_content/master_staff';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function hapus_master_staff()
    {
        $id = $this->input->post('id_staff');
        $this->M_Master_Staff->delete_master_staff($id, 'master_staff', 'id_staff');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_master_staff()
    {
        $page_data = $this->M_Master_Staff->selectmaster_staff();
        $id = $this->input->post('id');
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_master_staff(\"" . $page_data[$i]->id_staff .  "\")'><i class='icon-pencil'></i></a>";
            $no = $i + 1;
            $username = $page_data[$i]->username;
            $password = $page_data[$i]->password;
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $status = $page_data[$i]->status;
            $hapus = "<button class='btn btn-danger btn-icon-anim btn-square' onclick='hapus_master_staff(\"" . $page_data[$i]->id_staff . "\")'><i class='fa fa-trash '></i></button>";
            // $biaya = $page_data[$i]->biaya_sarana;
            // $jasa = $page_data[$i]->jasa_transport;
            // $total = $jasa + $biaya;
            // $status = $page_data[$i]->status;

            $out[$i] = array($no, $edit, $hapus,  $username, $password, $nama, $tipe, $status);
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    public function getDatamasterstaff()
    {
        $id_staff = $this->input->post('id_staff');
        $db = $this->M_Master_Staff->selectDatamaster_staff($id_staff);

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

    public function edit_master_staff()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $tipe = $this->input->post('tipe');
        $status = $this->input->post('status');
        $id_staff = $this->input->post('id_staff');
        $data = array(
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'tipe' => $tipe,
            'status' => $status,
        );
        $where = array(
            'id_staff' => $id_staff,
        );
        $out['status'] = "success";
        $this->M_Master_Staff->update($data, $where, 'staff');
        echo json_encode($out);
    }

    
    public function insert_master_staff()
    {
        // Mendapatkan data dari session
        $data = $this->session->userdata('data_auth');

        // Mendapatkan data dari input form
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $tipe = $this->input->post('tipe');
        $status = $this->input->post('status');

        $encoded_password = base64_encode($password);
        // $people = $this->M_Master_Staff->get_staff_by_username($username);
        // $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Menyiapkan data yang akan diinsert ke dalam tabel staff
        $data = array(
            'id_staff' => uniqid(),  // Menghasilkan id unik untuk staff
            'username' => $username,
            'password' => $encoded_password,
            'nama' => $nama,
            'tipe' => $tipe,
            'status' => $status,
            // Jika ada kolom lain yang diperlukan, tambahkan di sini.
        );


        // Panggil model untuk insert data
        $this->M_Master_Staff->insert_master_staff($data, 'staff');

        // Siapkan output response
        $out['status'] = "success";  // Status berhasil
        echo json_encode($out);  // Mengembalikan hasil dalam format JSON
    }

    
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
