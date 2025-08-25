<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_general_concern extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_IGD');
		$this->load->model('M_Erm');
		$this->load->model('M_Assembling');
		$this->load->model('M_Pencarian_Pasien');
	}

	public function identitas_pasien($id)
	{
		$this->load->view('assets/_header');
		$data_staff = $this->session->userdata('data_auth');
		$page_data['sso_user_data'] = $data_staff;
		$page_data['page_content'] = 'erm_form/IGD/view_form_general_concern';
		$data1 = $this->M_Pencarian_Pasien->select_by_no_rm($id);

		$page_data['data'] = $data1;
		$page_data['id'] = $id;
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function get_gencon()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('general_concent', ['no_rm' => $id])->result();
		if (count($db) > 0) {
			$db = $db[0];
			$db->status_dt = 'found';
		} else {
			$db = null;
			$db['status_dt'] = 'not found';
		}
		echo json_encode($db);
	}
	public function insert_gencon()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$img = $this->input->post('gambar');
		if ($img != '') {
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = "ttd/" . uniqid(time(), true) . ".png";
			$success = file_put_contents($file, $data);
		} else {
			$file = '';
		}

		$this->form_validation->set_rules('nama', 'Yang Bersangkutan', 'required');
		$this->form_validation->set_rules('alamat', 'Hasil Periksa', 'required');
		$this->form_validation->set_rules('HP', 'Terapi ', 'required');
		$this->form_validation->set_rules('samaran', 'Terapi I', 'required');
		$this->form_validation->set_rules('anggota', 'Saran', 'required');
		$this->form_validation->set_rules('hubungan', 'Yang Bersangkutan', 'required');
		$this->form_validation->set_rules('jk', 'Diagnosis', 'required');

		if ($this->form_validation->run()) {
			$db   =   array(
				'no_rm' => $this->input->post('no_rm'),
				'hubungan' => $this->input->post('hubungan'),
				'nama' => $this->input->post('nama'),
				'jk' => $this->input->post('jk'),
				'alamat' => $this->input->post('alamat'),
				'hp' => $this->input->post('HP'),
				'samaran' => $this->input->post('samaran'),
				'anggota' => $this->input->post('anggota'),
				'file_path' => $file,
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			// print $success ? $file : 'Unable to save the file.';
			$this->M_Erm->insert($db, 'general_concent');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'hubungan' => form_error('hubungan'),
				'nama' => form_error('nama'),
				'jk' => form_error('jk'),
				'alamat' => form_error('alamat'),
				'hp' => form_error('HP'),
				'samaran' => form_error('samaran'),
				'anggota' => form_error('anggota'),
			);
		}
		echo json_encode($out);
	}
	public function update_gencon()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$img = $this->input->post('gambar');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = "ttd/" . uniqid(time(), true) . ".png";
		$success = file_put_contents($file, $data);


		$db   =   array(
			'no_rm' => $this->input->post('no_rm'),
			'hubungan' => $this->input->post('hubungan'),
			'nama' => $this->input->post('nama'),
			'jk' => $this->input->post('jk'),
			'alamat' => $this->input->post('alamat'),
			'hp' => $this->input->post('HP'),
			'samaran' => $this->input->post('samaran'),
			'anggota' => $this->input->post('anggota'),
			'file_path' => $file,
			'tanggal' => $tgl,
			'staff' => $staff,
		);
		$where   =   array(
			'id_general_concent' => $this->input->post('id'),
		);

		// print $success ? $file : 'Unable to save the file.';
		$this->M_Erm->update($db,$where, 'general_concent');
		$out['status'] = "success";

		echo json_encode($out);
	}
}
