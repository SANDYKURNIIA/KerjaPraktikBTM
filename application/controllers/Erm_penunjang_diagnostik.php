<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_penunjang_diagnostik extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm');
		$this->load->model('M_Pencarian_Pasien');
		$this->load->model('M_Erm_poli');
	}

	public function form($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDbyid($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_penunjang_diagnostik';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function form_riwayat($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm->selectDataPasienIGDbyid($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_penunjang_diagnostik';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function tampil_list_per_pen_rujukan()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm->selectPenunjangDiag($id_pelayanan);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_penunjang . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $page_data[$i]->id_penunjang . "\")' '><i class='icon-trash'></i></button>";

			$periksa = $page_data[$i]->periksa;
			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal);
			$gambar = null;
            foreach (explode(',', $page_data[$i]->file) as $image) { // 1, 2, 3
                $gambar .= "<img src='".base_url()."assets/images/" . $image . "' class='img-responsive zoom'><br>";
            }
			$out[$i] = array($no, $tombol,$hapus, $periksa, $date,$gambar);
		}
		if ($out == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data['data'] = $out;
			echo json_encode($page_data);
			exit;
		}
	}

	public function insert_penunjang()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$id_pelayanan = $this->input->post('inPel');
		$id_history = $this->input->post('inHis');
		$this->load->library('upload');

		$files = $_FILES;
		$cpt = count($_FILES['files']['name']);
		$getDataImages = [
			'success' => [],
			'error' => []
		];
		for ($i = 0; $i < $cpt; $i++) {
			$_FILES['file']['name'] = $files['files']['name'][$i];
			$_FILES['file']['type'] = $files['files']['type'][$i];
			$_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
			$_FILES['file']['error'] = $files['files']['error'][$i];
			$_FILES['file']['size'] = $files['files']['size'][$i];

			$this->upload->initialize($this->set_upload_options());
			if ($this->upload->do_upload("file")) {
				$data = array('upload_data' => $this->upload->data());
				$getDataImages['success'][] = [
					'response' => ['status' => 'success'],
					'data' => $data['upload_data']['file_name'],
				];
			} else {
				$getDataImages['success'][] = [
					'response' => ['status' => 'success'],
					'data' => null,
				];
			}
		}

		$success = $getDataImages['success'];
		$error = $getDataImages['error'];
		foreach ($success as $successData) {
			$alldata =  [
				'id_pelayanan' => $this->input->post('inPel'),
				'id_history' => $this->input->post('inHis'),
				'no_rm' => $this->input->post('inNoRM'),
				'tanggal' => $this->input->post('tanggal'),
				'periksa' => $this->input->post('periksa'),
				'dpjp' => $this->input->post('dpjp'),
				'ket' => $this->input->post('ket'),
				'file'  => implode(',', array_map(function ($val) {
					return $val['data'];
				}, $success)),
				'tanggal_input' => $tgl,
				'staff' => $staff,
			];
			
		}
		$this->M_Erm->insert($alldata,'hasil_penunjang_diagnostik');
		echo json_encode(['status' => ['success' => count($success), 'error' => count($error)]]);
	}
	public function edit_penunjang()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$id = $this->input->post('id');

		$this->load->library('upload');

		$files = $_FILES;
		$cpt = count($_FILES['files']['name']);
		$getDataImages = [
			'success' => [],
			'error' => []
		];
		for ($i = 0; $i < $cpt; $i++) {
			$_FILES['file']['name'] = $files['files']['name'][$i];
			$_FILES['file']['type'] = $files['files']['type'][$i];
			$_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
			$_FILES['file']['error'] = $files['files']['error'][$i];
			$_FILES['file']['size'] = $files['files']['size'][$i];

			$this->upload->initialize($this->set_upload_options());
			if ($this->upload->do_upload("file")) {
				$data = array('upload_data' => $this->upload->data());
				$getDataImages['success'][] = [
					'response' => ['status' => 'success'],
					'data' => $data['upload_data']['file_name'],
				];
			} else {
				$getDataImages['success'][] = [
					'response' => ['status' => 'success'],
					'data' => null,
				];
			}
		}

		$success = $getDataImages['success'];
		$error = $getDataImages['error'];
		foreach ($success as $successData) {
			$alldata =  [
				'id_pelayanan' => $this->input->post('inPel'),
				'id_history' => $this->input->post('inHis'),
				'no_rm' => $this->input->post('inNoRM'),
				'tanggal' => $this->input->post('tanggal'),
				'periksa' => $this->input->post('periksa'),
				'dpjp' => $this->input->post('dpjp'),
				'ket' => $this->input->post('ket'),
				'file'  => implode(',', array_map(function ($val) {
					return $val['data'];
				}, $success)),
				'tanggal_input' => $tgl,
				'staff' => $staff,
			];
			
		}
		$where=array(
			'id_penunjang' =>$id
		);
		$this->M_Erm->update($alldata,$where,'hasil_penunjang_diagnostik');
		echo json_encode(['status' => ['success' => count($success), 'error' => count($error)]]);
	}
	function hapus_penunjang()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_penunjang' => $id,
		);
		$this->M_Erm->delete($where, 'hasil_penunjang_diagnostik');
		$out['status'] = "success";
		echo json_encode($out);
	}
	private function set_upload_options()
	{
		//upload an image options
		$config = array();
		$config['upload_path'] = "./assets/images";
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 5048000; //5 mb
		$config['overwrite']     = FALSE;

		return $config;
	}
	public function getPerPenRujukan()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('hasil_penunjang_diagnostik', ['id_penunjang' => $id])->row_array();
		if (count($db) > 0) {
			$db = $db;
			$db['status_dt'] = 'found';
		} else {
			$db = null;
			$db['status_dt'] = 'not found';
		}
		echo json_encode($db);
		exit;
	}
}
