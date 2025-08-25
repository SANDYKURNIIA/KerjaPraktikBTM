<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->library('form_validation');
		$this->load->model('M_Staff', 's_m');
		$this->load->model('M_Auth');
		// if ($this->session->userdata('token')) {
		// 	redirect('Dashboard');
		// }
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required', array('trim' => '', 'required' => 'Username tidak boleh kosong.'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required', array('trim' => '', 'required' => 'Password tidak boleh kosong.'));

		if ($this->form_validation->run() == false) {
			$this->load->view('dashboard/_header');
			$this->load->view('index');
			$this->load->view('dashboard/_footer');
		} else {
			$this->_login();
		}
	}

	public function hash_pwd($param1 = '') //untuk generate hash password ex. home/hash_pwd/pass_text
	{
		$enc['plain_text'] = $param1;
		$enc['cyper_text'] = hash_pass($param1);
		print_arr($enc);
	}

	public function encrypt_staff() // untuk update seluruh password menjadi terenkripsi
	{
		$data_staff = $this->s_m->getStaff();
		for ($i = 0; $i < count($data_staff); $i++) {
			$id = $data_staff[$i]['id_staff'];
			$data_staff[$i]['password'] = hash_pass($data_staff[$i]['password']);
			print_arr($data_staff[$i]);
			$this->s_m->update_profil($data_staff[$i], $id);
		}
	}

	public function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($username == '') {
			$data_output["response"] = 'page is not accessible';
			$cetakoutput = set_api_response($data_output);
		} else {
			$user_data = $this->s_m->get_staffByUsername($username);

			if (count($user_data) > 0) {
				$user_data = $user_data[0];
				// Encode the input password with base64
				$encoded_password = base64_encode($password);

				if ($user_data->password == $encoded_password) { // Check with base64 encoded password
					// $token = get_token($username);

					$data_sibatik = $this->M_Auth->getData($username);
					$data_auth = [
						'data_auth' => $data_sibatik
					];
					$this->session->set_userdata($data_auth);

					$sso_user_data = [
						'sso_user_data' => $data_sibatik
					];
					$this->session->set_userdata($sso_user_data);

					redirect('Main');
				} else {
					$data['alert'] = $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Password anda salah!</div>');
					redirect('Home', $data);
				}
			} else {
				$data['alert'] = $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Akun anda tidak aktif! Silahkan hubungi admin.</div>');
				redirect('Home', $data);
			}
		}
		echo json_encode($cetakoutput);
	}


	// Fungsi untuk menangani login berhasil
	// private function handle_successful_login($username, $user_data)
	// {
	// 	// Buat token dan simpan sesi pengguna
	// 	$token = get_token($username);

	// 	// Ambil data untuk sesi pengguna
	// 	$data_sibatik = $this->M_Auth->getData($username);

	// 	// Simpan data autentikasi ke session
	// 	$data_auth = [
	// 		'data_auth' => $data_sibatik
	// 	];
	// 	$this->session->set_userdata($data_auth);

	// 	// Simpan data pengguna di session SSO
	// 	$sso_user_data = [
	// 		'sso_user_data' => $data_sibatik
	// 	];
	// 	$this->session->set_userdata($sso_user_data);

	// 	// Redirect ke halaman utama
	// 	redirect('Main');
	// }

	// Fungsi untuk menangani login gagal
	// private function handle_failed_login($message)
	// {
	// 	$data['alert'] = $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">' . $message . '</div>');
	// 	redirect('Home', $data);
	// }



	public function _login()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($this->input->post('username') == '') {
			$data_output["response"] = 'page is not accessible';
			$cetakoutput = set_api_response($data_output);
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$user_data = $this->s_m->get_staffByUsername($username);

			if (count($user_data) > 0) {
				$user_data = $user_data[0];
				if ($user_data->password == $password) { //cuma nambah method ini doang untuk checknya
					// $token = get_token($username);
					// if ($user_data->password != $token) {
					// $user_data->token = $token;
					// $this->s_m->update_staff($user_data->id_staff, $user_data);
					// }
					// $data_output["response"]["token"] = $user_data->token;

					// $cetakoutput = set_api_response($data_output);
					// $data = [
					// 	'token' => $user_data->token,
					// ];
					// $this->session->set_userdata($data);

					$data_sibatik = $this->M_Auth->getData($username);
					$data_auth = [
						'data_auth' => $data_sibatik
					];
					$this->session->set_userdata($data_auth);

					$sso_user_data = [
						'sso_user_data' => $data_sibatik
					];
					$this->session->set_userdata($sso_user_data);

					redirect('Main');
				} else {

					$data['alert'] = $this->session->set_flashdata('alert', '<div class="alert alert-danger"
						role="alert">Password anda salah!</div>');
					redirect('Home', $data);
				}
			} else {

				$data['alert'] = $this->session->set_flashdata('alert', '<div class="alert alert-danger"
					role="alert">Akun anda tidak aktif! Silahkan hubungi admin.</div>');
				redirect('Home', $data);
			}
		}
		echo json_encode($cetakoutput);
	}
}
