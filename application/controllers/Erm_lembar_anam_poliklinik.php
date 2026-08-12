<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_lembar_anam_poliklinik extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Erm');
	}

	public function form($id_pel, $id_his)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		// $page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_lembar_anamnesa';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function form_riwayat($id_pel, $id_his)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		// $page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_lembar_anamnesa';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function print_out()
	{
		$data['page_title'] = "General Concern";
		$this->load->view('erm_print/lembar_anam_poliklinik', $data);
	}
	public function tampil_list_anamnesa()
	{
		// $id_akun = 'dgok8itaesm';
		$id_history = $this->input->post('id_history');
		$page_data = $this->M_Erm->selectListAnamnesa($id_history);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_form . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_tindakan(\"" . $page_data[$i]->id_form  . "\")' '><i class='fa fa-trash'></i></button>";
			$terapi = $page_data[$i]->terapi;
			$diagnosis = $page_data[$i]->diagnosis;
			

			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal) . " " . $waktu = strftime("%H:%M WIB", $tanggal);;

			$out[$i] = array($no,$tombol, $hapus, $date, $diagnosis, $terapi);
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
	public function insert_lembar_anam()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
		$this->form_validation->set_rules('terapi', 'Terapi', 'required');
		

		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'diagnosis' => $this->input->post('diagnosis'),
				'terapi' => $this->input->post('terapi'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_lembar_anam');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'diagnosis' => form_error('diagnosis'),
				'terapi' => form_error('terapi'),
			);
		}
		echo json_encode($out);
	}
	public function edit_lembar_anam()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$data = array(
			'diagnosis' => $this->input->post('diagnosis'),
			'terapi' => $this->input->post('terapi'),
			'tanggal' => $tgl,
			'staff' => $staff,
		);
		$where = array(
			'id_form' => $this->input->post('id_form'),
		);

		$this->M_Erm->update($data, $where, 'form_lembar_anam');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function get_lembar_anam()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_lembar_anam', ['id_form' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	function hapus_tindakan_anam()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_form' => $id,
		);
		$this->M_Erm->delete($where, 'form_lembar_anam');
		$out['status'] = "success";
		echo json_encode($out);
	}
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_lembar_anam_poliklinik extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Erm');
	}

	public function form($id_pel, $id_his)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		// $page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_lembar_anamnesa';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function form_riwayat($id_pel, $id_his)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		// $page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_lembar_anamnesa';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function print_out()
	{
		$data['page_title'] = "General Concern";
		$this->load->view('erm_print/lembar_anam_poliklinik', $data);
	}
	public function tampil_list_anamnesa()
	{
		// $id_akun = 'dgok8itaesm';
		$id_history = $this->input->post('id_history');
		$page_data = $this->M_Erm->selectListAnamnesa($id_history);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_form . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_tindakan(\"" . $page_data[$i]->id_form  . "\")' '><i class='fa fa-trash'></i></button>";
			$terapi = $page_data[$i]->terapi;
			$diagnosis = $page_data[$i]->diagnosis;
			

			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal) . " " . $waktu = strftime("%H:%M WIB", $tanggal);;

			$out[$i] = array($no,$tombol, $hapus, $date, $diagnosis, $terapi);
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
	public function insert_lembar_anam()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
		$this->form_validation->set_rules('terapi', 'Terapi', 'required');
		

		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'diagnosis' => $this->input->post('diagnosis'),
				'terapi' => $this->input->post('terapi'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_lembar_anam');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'diagnosis' => form_error('diagnosis'),
				'terapi' => form_error('terapi'),
			);
		}
		echo json_encode($out);
	}
	public function edit_lembar_anam()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$data = array(
			'diagnosis' => $this->input->post('diagnosis'),
			'terapi' => $this->input->post('terapi'),
			'tanggal' => $tgl,
			'staff' => $staff,
		);
		$where = array(
			'id_form' => $this->input->post('id_form'),
		);

		$this->M_Erm->update($data, $where, 'form_lembar_anam');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function get_lembar_anam()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_lembar_anam', ['id_form' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	function hapus_tindakan_anam()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_form' => $id,
		);
		$this->M_Erm->delete($where, 'form_lembar_anam');
		$out['status'] = "success";
		echo json_encode($out);
	}
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
