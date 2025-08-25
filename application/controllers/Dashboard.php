<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Staff');
        $this->load->library('form_validation');
        $this->load->library('upload');
        // if (!$this->session->userdata('token')) {
        //     redirect('Home');
        // }
    }
    public function index()
    {
        $token = $this->session->userdata('token');
        $data['data_staff'] = $this->M_Staff->getStaffByToken($token);
        $data['staff'] = $this->M_Staff->getStaff();
        $this->load->view('dashboard/_header', $data);
        $this->load->view('Main', $data);
        $this->load->view('dashboard/_footer', $data);
    }

    public function logout()
    {
        $id_token = $this->session->userdata('token');
        $data = [
            'token' => '',
        ];
        $this->M_Staff->update_token($data, $id_token);

        $this->session->sess_destroy();
        redirect(base_url('Home'));
    }

    public function tambah_staff()
    {
        $token = $this->session->userdata('token');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = hash_pass($this->input->post('password'));
        $tipe = $this->input->post('tipe');
        $status = $this->input->post('status');
        $image = $this->input->post('image');
        $izin_akses = $this->input->post('izin_akses');
        $nik_eklaim = $this->input->post('nik_eklaim');

        $data['data_staff'] = $this->M_Staff->getStaffByToken($token);
        $data_username = $this->M_Staff->getStaffByUsername($username);

        $data['staff'] = $this->M_Staff->getStaff();
        $username_aktif = array(
            'username' => $username,

        );
        $this->form_validation->set_rules('username', 'Username', 'trim|required', array('trim' => '', 'required' => 'Username tidak boleh kosong.'));
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', array('trim' => '', 'required' => 'Nama tidak boleh kosong.'));
        $this->form_validation->set_rules('tipe', 'Tipe', 'trim|required', array('trim' => '', 'required' => 'Tipe tidak boleh kosong.'));
        $this->form_validation->set_rules('izin_akses', 'Izin akses', 'trim|required', array('trim' => '', 'required' => 'Izin akses tidak boleh kosong.'));
        $this->form_validation->set_rules('nik_eklaim', 'Nik E-Claim', 'trim|required', array('trim' => '', 'required' => 'Nik E-Claim tidak boleh kosong.'));

        if ($this->form_validation->run() == false) {
            $this->load->view('dashboard/_header', $data);
            $this->load->view('home', $data);
            $this->load->view('dashboard/_footer', $data);
        } else {
            if ($data_username == $username_aktif) {

                $this->session->set_flashdata(
                    'alert',
                    ' <div class="alert alert-danger alert-dismissible fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Info </strong> - Username sudah ada! Ganti dengan username lain.
                        </div>'
                );
                redirect(base_url('Dashboard'));
            } else {

                $id = $this->name = uniqid();
                $data = array(
                    'id_staff' => $id,
                    'nama' => $nama,
                    'username' => $username,
                    'password' => $password,
                    'tipe' => $tipe,
                    'status' => $status,
                    'image' => $image,
                    'izin_akses' => $izin_akses,
                    'nik_eklaim' => $nik_eklaim
                );

                $this->M_Staff->insert_staff($data, 'staff');
                $this->session->set_flashdata(
                    'alert',
                    ' <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Staff telah ditambahkan!. 
            </div>'
                );
                redirect(base_url('Dashboard'));
            }
        }
    }

    public function update_password()
    {
        $id = $this->input->post('id_staff');

        // $password = hash_pass($this->input->post('password')); // ketika update juga method ini juga
        $password = ($this->input->post('password')); // ketika update juga method ini juga

        $data = array(
            'password' => $password,
        );

        $where = array(
            'id_staff' => $id
        );

        $this->M_Staff->updateAkun($where, $data, 'staff');
        redirect(base_url('Main'));
    }



    function edit_profil()
    {
        $post = $this->input->post();
        $id = $this->input->post('id_staff');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        // $tipe = $this->input->post('tipe');
        $data = array(
            'nama' => $nama,
            'username' => $username,
            // 'tipe' => $tipe,
        );

        $where = array(
            'id_staff' => $id
        );

        $this->M_Staff->updateAkun($where, $data, 'staff');

        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        $config['max_size']   = 1024;

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {

            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['width'] = 400;
                $config['height'] = 400;

                $config['new_image'] = './assets/images/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];

                $id = $this->input->post('id_staff');
                $nama = $this->input->post('nama');
                $username = $this->input->post('username');
                $tipe = $this->input->post('tipe');
                $image_lama = $this->input->post('old_image');

                $post = $this->input->post();
                $this->nama = $post["nama"];
                $this->username = $post["username"];
                $this->tipe = $post["tipe"];

                $data1 = array(
                    'nama' => $nama,
                    'username' => $username,
                    'tipe' => $tipe,
                    'image' => $gambar,

                );
                $where = array(
                    'id_staff' => $id
                );
                if ($image_lama == "default.jpg") { //untuk  kondisi jika gambar default, tidak hapus gambar default.
                    $this->M_Staff->updateAkun($where, $data1, 'staff');
                    redirect(base_url('Main'));
                } else { //untuk kondisi jika gambar tidak default, hapus gambar lama.
                    unlink(FCPATH . 'assets/images/' . $image_lama);
                    $this->M_Staff->updateAkun($where, $data1, 'staff');
                    redirect(base_url('Main'));
                }
            } else {
                echo "<script>
                alert('File terlalu besar');
                window.location.href='';
                </script>";
            }
        } else {
            redirect(base_url('Main'));
        }
    }


    public function edit_staff()
    {
        $data['data_staff'] = $this->db->get_where('staff', ['id_staff' =>
        $this->session->userdata('id_staff')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('dashboard/_header', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('dashboard/_footer', $data);
        } else {
            $id_staff = $this->input->post('id_staff');
            $data = [
                'username' => $this->input->post('username'),
                // 'password' => hash_pass($this->input->post('password')),
                'password' => ($this->input->post('password')),
                'nama' => $this->input->post('nama'),
                'izin_akses' => $this->input->post('izin_akses'),
                'tipe' => $this->input->post('tipe'),
                'nik_eklaim' => $this->input->post('nik_eklaim'),

            ];
            $where = array(
                'id_staff' => $id_staff
            );

            $this->M_Staff->updateAkun($where, $data, 'staff');

            $this->session->set_flashdata(
                'alert',
                ' <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data staf telah diperbarui!. 
            </div>'
            );


            redirect(base_url('Main'));
        }
    }
    public function suspend_staff()
    {
        $data['data_staff'] = $this->db->get_where('staff', ['id_staff' =>
        $this->session->userdata('id_staff')])->row_array();

        $id_staff = $this->input->post('id_staff');

        $data = [
            'status' => 'tidak aktif',
        ];

        $this->M_Staff->update_profil($data, $id_staff);

        $this->session->set_flashdata(
            'alert',
            ' <div class="alert alert-info alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info </strong> - Akun staf di Non-aktifkan.
            </div>'
        );
        redirect('Dashboard');
    }

    public function aktifkan_staff()
    {
        $data['data_staff'] = $this->db->get_where('staff', ['id_staff' =>
        $this->session->userdata('id_staff')])->row_array();

        $id_staff = $this->input->post('id_staff');

        $data = [
            'status' => 'aktif',
        ];

        $this->M_Staff->update_profil($data, $id_staff);

        $this->session->set_flashdata(
                'alert',
                ' <div class="alert alert-info alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Info </strong> - Akun staf telah diaktifkan.
                </div>'
        );
        redirect('Dashboard');
    }



    public function hapus_staff()
    {

        $data['data_staff'] = $this->db->get_where('staff', ['id_staff' =>
        $this->session->userdata('id_staff')])->row_array();

        $id_staff = $this->input->post('id_staff');

        $this->M_Staff->hapus_staff($id_staff);

        $this->session->set_flashdata(
            'alert',
            ' <div class="alert alert-info alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info </strong> - Data akun staf telah dihapus.
            </div>'
        );
        redirect('Dashboard');
    }


    public function sign()
    {
        $username = $this->input->post('username');
        $user_datacek = $this->M_Staff->getStaffcek($username);
        if (count($user_datacek) > 0) {
            $user_datacek = $user_datacek[0];
            $token = get_token($username);
            if ($user_datacek->token != $token) {
                $user_datacek->token = $token;
                $this->M_Staff->update_staff($user_datacek->id_staff, $user_datacek);
            }
            $data = [
                'token' => $user_datacek->token,
            ];
            $this->session->set_userdata($data);
            $token = $this->session->userdata();
            redirect(base_url() . 'Dashboard', 'refresh');
        } else {
            $this->session->set_flashdata(
                'alert',
                ' <div class="alert alert-info alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info </strong> - Akun tidak tersedia!.
            </div>'
            );
            redirect('Dashboard');
        }
    }

}
