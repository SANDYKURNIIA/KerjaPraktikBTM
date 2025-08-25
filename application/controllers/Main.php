<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Staff');
        // if (!$this->session->userdata('id_staff')) {
        //     redirect('Home');
        // }
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data'); //session
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'page_content/Main';

        // Token
        // $id_token = $this->session->userdata('token');
        // $dataall = $this->session->userdata('data_auth');
        // $id_staff = $dataall->id_staff;
        // $data = array(
        //     'token' => $id_token,
        // );
        // $where = array(
        //     'id_staff' => $id_staff
        // );
        // $this->M_Staff->updateAkun($where, $data,'staff');
        // End

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function logout()
    {
        $id_token = $this->session->userdata('token');
        $data = [
            'token' => '',
        ];
        $this->M_Staff->update_token($data, $id_token);

        $this->session->sess_destroy();
        redirect($this->session->userdata['base_sso']);
        // redirect('Home');
    }

    public function back()
    {
        $id_token = $this->session->userdata('token');
        $data = [
            'token' => '',
        ];
        $this->M_Staff->update_token($data, $id_token);
        redirect($this->session->userdata['baseback_sso']);
        // redirect('Home');
    }
}
