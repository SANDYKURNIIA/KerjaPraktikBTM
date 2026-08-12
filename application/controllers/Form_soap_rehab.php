<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_soap_rehab extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_IGD');
		$this->load->model('M_Erm');
		$this->load->model('M_Assembling');
		$this->load->model('M_Poli');
		$this->load->model('M_Pencarian_Pasien');
		$this->load->model('M_Erm_poli');
	}
	public function formsoap($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_poli->selectDataPasienPoliby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		// $page_data['no_hp'] = $selectPasien->no_hp;
		// $page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['nama_dokter'] = $selectPasien->nama_dokter;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['total_bayar'] = $selectPasien->total_bayar;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();


		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Penunjang/view_form_soap_rehab';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function get_autocomplete()
	{
		$term = $this->input->get('term');

		$data = $this->M_Pencarian_Pasien->searchDiagnosa($term);

		$response = [];
		foreach ($data as $diagnosa) {
			$response[] = [
				'id' => $diagnosa->id_diagnosa,
				'label' => $diagnosa->id_diagnosa . ' | ' . $diagnosa->nama_diagnosa,
				'value' => $diagnosa->id_diagnosa . ' | ' . $diagnosa->nama_diagnosa
			];
		}
		echo json_encode($response);
	}
	public function tampil_list_per_pen_rujukan()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$total_bayar = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row()->total_bayar;
		$page_data = $this->M_Erm_poli->selectSoap($id_pelayanan);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_catatan . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $page_data[$i]->id_catatan . "\")' '><i class='icon-trash'></i></button>";
			$edit = "<a href='" . base_url('Form_soap_rehab/edit_view/' . $page_data[$i]->id_catatan) . "' class='btn btn-warning'><i class='icon-pencil'></i> Edit</a>";

			$s = $page_data[$i]->S;
			$o = $page_data[$i]->O;
			$a = $page_data[$i]->A;
			$p = $page_data[$i]->P;
			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal);
			// $gambar = null;
			// foreach (explode(',', $page_data[$i]->verifikasi) as $image) { // 1, 2, 3
			//     $gambar .= "<img src='".base_url()."assets/images/" . $image . "' class='img-responsive zoom'><br>";
			// }
			if ($total_bayar != 1) {
				$out[$i] = array($no, $tombol, $s, $o, $a, $p, $date);
			} else {
				$out[$i] = array($no, $s, $o, $a, $p, $date);
			}
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
	public function insert_soap()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('s', 'S', 'required');
		$this->form_validation->set_rules('o', 'O', 'required');
		$this->form_validation->set_rules('a', 'A', 'required');
		$this->form_validation->set_rules('p', 'P', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('status_kunjungan', 'Status Kunjungan', 'required');
		// yang status kunjungan semua ya bang


		if ($this->form_validation->run()) {

			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				's' => $this->input->post('s'),
				'o' => $this->input->post('o'),
				'a' => $this->input->post('a'),
				'p' => $this->input->post('p'),
				'tanggal' => $this->input->post('tanggal'),
				'status_kunjungan' => $this->input->post('status_kunjungan'),
				'staff' => $staff
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_poli->insert($data, 'form_soap_rehab');
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				's' => form_error('s'),
				'o' => form_error('o'),
				'a' => form_error('a'),
				'p' => form_error('p'),
				'tanggal' => form_error('tanggal'),
				'status_kunjungan' => form_error('status_kunjungan')
			);
		}
		echo json_encode($out);
	}
	public function getPerPenRujukan()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_soap_rehab', ['id_catatan' => $id])->row_array();
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
	public function edit_soap()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$id = $this->input->post('id');
		$this->form_validation->set_rules('s', 'S', 'required');
		$this->form_validation->set_rules('o', 'O', 'required');
		$this->form_validation->set_rules('a', 'A', 'required');
		$this->form_validation->set_rules('p', 'P', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('status_kunjungan', 'Status Kunjungan', 'required');


		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				's' => $this->input->post('s'),
				'o' => $this->input->post('o'),
				'a' => $this->input->post('a'),
				'p' => $this->input->post('p'),
				'tanggal' => $tgl,
				'status_kunjungan' => $this->input->post('status_kunjungan'),
				'staff' => $staff,
			);

			
			// $this->M_Erm_poli->update_soap($id, $data);
			$this->M_Erm_poli->update($data, ['id_catatan' => $id], 'form_soap_rehab');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				's' => form_error('s'),
				'o' => form_error('o'),
				'a' => form_error('a'),
				'p' => form_error('p'),
				'tanggal' => form_error('tanggal'),
				'status_kunjungan' => form_error('status_kunjungan')
			);
		}
		echo json_encode($out);
	}

	//NII YA BANGGGG//
	public function print_soap($id)
{
    // Panggil dari model
    $data = $this->M_Erm_poli->get_data_print_soap($id);
    if (!$data) {
        show_error("Data SOAP tidak ditemukan.", 404);
        return;
    }
    $this->load->view('erm_print/view_print_soap_rehab', $data);
}


=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_soap_rehab extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_IGD');
		$this->load->model('M_Erm');
		$this->load->model('M_Assembling');
		$this->load->model('M_Poli');
		$this->load->model('M_Pencarian_Pasien');
		$this->load->model('M_Erm_poli');
	}
	public function formsoap($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_poli->selectDataPasienPoliby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		// $page_data['no_hp'] = $selectPasien->no_hp;
		// $page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['nama_dokter'] = $selectPasien->nama_dokter;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['total_bayar'] = $selectPasien->total_bayar;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();


		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Penunjang/view_form_soap_rehab';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function get_autocomplete()
	{
		$term = $this->input->get('term');

		$data = $this->M_Pencarian_Pasien->searchDiagnosa($term);

		$response = [];
		foreach ($data as $diagnosa) {
			$response[] = [
				'id' => $diagnosa->id_diagnosa,
				'label' => $diagnosa->id_diagnosa . ' | ' . $diagnosa->nama_diagnosa,
				'value' => $diagnosa->id_diagnosa . ' | ' . $diagnosa->nama_diagnosa
			];
		}
		echo json_encode($response);
	}
	public function tampil_list_per_pen_rujukan()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$total_bayar = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row()->total_bayar;
		$page_data = $this->M_Erm_poli->selectSoap($id_pelayanan);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_catatan . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $page_data[$i]->id_catatan . "\")' '><i class='icon-trash'></i></button>";
			$edit = "<a href='" . base_url('Form_soap_rehab/edit_view/' . $page_data[$i]->id_catatan) . "' class='btn btn-warning'><i class='icon-pencil'></i> Edit</a>";

			$s = $page_data[$i]->S;
			$o = $page_data[$i]->O;
			$a = $page_data[$i]->A;
			$p = $page_data[$i]->P;
			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal);
			// $gambar = null;
			// foreach (explode(',', $page_data[$i]->verifikasi) as $image) { // 1, 2, 3
			//     $gambar .= "<img src='".base_url()."assets/images/" . $image . "' class='img-responsive zoom'><br>";
			// }
			if ($total_bayar != 1) {
				$out[$i] = array($no, $tombol, $s, $o, $a, $p, $date);
			} else {
				$out[$i] = array($no, $s, $o, $a, $p, $date);
			}
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
	public function insert_soap()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('s', 'S', 'required');
		$this->form_validation->set_rules('o', 'O', 'required');
		$this->form_validation->set_rules('a', 'A', 'required');
		$this->form_validation->set_rules('p', 'P', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('status_kunjungan', 'Status Kunjungan', 'required');
		// yang status kunjungan semua ya bang


		if ($this->form_validation->run()) {

			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				's' => $this->input->post('s'),
				'o' => $this->input->post('o'),
				'a' => $this->input->post('a'),
				'p' => $this->input->post('p'),
				'tanggal' => $this->input->post('tanggal'),
				'status_kunjungan' => $this->input->post('status_kunjungan'),
				'staff' => $staff
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_poli->insert($data, 'form_soap_rehab');
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				's' => form_error('s'),
				'o' => form_error('o'),
				'a' => form_error('a'),
				'p' => form_error('p'),
				'tanggal' => form_error('tanggal'),
				'status_kunjungan' => form_error('status_kunjungan')
			);
		}
		echo json_encode($out);
	}
	public function getPerPenRujukan()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_soap_rehab', ['id_catatan' => $id])->row_array();
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
	public function edit_soap()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$id = $this->input->post('id');
		$this->form_validation->set_rules('s', 'S', 'required');
		$this->form_validation->set_rules('o', 'O', 'required');
		$this->form_validation->set_rules('a', 'A', 'required');
		$this->form_validation->set_rules('p', 'P', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('status_kunjungan', 'Status Kunjungan', 'required');


		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				's' => $this->input->post('s'),
				'o' => $this->input->post('o'),
				'a' => $this->input->post('a'),
				'p' => $this->input->post('p'),
				'tanggal' => $tgl,
				'status_kunjungan' => $this->input->post('status_kunjungan'),
				'staff' => $staff,
			);

			
			// $this->M_Erm_poli->update_soap($id, $data);
			$this->M_Erm_poli->update($data, ['id_catatan' => $id], 'form_soap_rehab');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				's' => form_error('s'),
				'o' => form_error('o'),
				'a' => form_error('a'),
				'p' => form_error('p'),
				'tanggal' => form_error('tanggal'),
				'status_kunjungan' => form_error('status_kunjungan')
			);
		}
		echo json_encode($out);
	}

	//NII YA BANGGGG//
	public function print_soap($id)
{
    // Panggil dari model
    $data = $this->M_Erm_poli->get_data_print_soap($id);
    if (!$data) {
        show_error("Data SOAP tidak ditemukan.", 404);
        return;
    }
    $this->load->view('erm_print/view_print_soap_rehab', $data);
}


>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
}