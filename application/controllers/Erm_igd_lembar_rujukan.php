<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_igd_lembar_rujukan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm');
		$this->load->model('M_Staff');
	}

	public function form($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm->selectDataPasienIGDby_id($id_pelayanan, $id_history);
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
		$page_data['pekerjaan'] = $selectPasien->pekerjaan;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_igd_lembar_rujukan';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_lembar_rujukan($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm->selectDataPasienIGDby_id($id_pelayanan, $id_history);
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
		$page_data['pekerjaan'] = $selectPasien->pekerjaan;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_igd_lembar_rujukan';
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
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['pekerjaan'] = $selectPasien->pekerjaan;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_igd_lembar_rujukan';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function riwayat_lembar_rujukan($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm->selectDataPasienIGDby_id($id_pelayanan, $id_history);
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
		$page_data['pekerjaan'] = $selectPasien->pekerjaan;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_igd_lembar_rujukan';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function insert_lembar_rujukan()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'tempat' => $this->input->post('tempat'),
			'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
			'diagnosis' => $this->input->post('diagnosis'),
			'tempat1' => $this->input->post('tempat1'),
			'hasil_periksa' => $this->input->post('hasil_periksa'),
			'terapi' => $this->input->post('terapi'),
			'terapi1' => $this->input->post('terapi1'),
			'saran' => $this->input->post('saran'),
			'tanggal' => $tgl,
			'staff' => $staff,
		);

		$this->M_Erm->insert($data, 'form_lembar_rujukan');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function update_lembar_rujukan()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'tempat' => $this->input->post('tempat'),
			'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
			'diagnosis' => $this->input->post('diagnosis'),
			'tempat1' => $this->input->post('tempat1'),
			'hasil_periksa' => $this->input->post('hasil_periksa'),
			'terapi' => $this->input->post('terapi'),
			'terapi1' => $this->input->post('terapi1'),
			'saran' => $this->input->post('saran'),
			'tanggal' => $tgl,
			'staff' => $staff,
		);
		$where = array('id_form_lembar_rujukan' => $this->input->post('id'));

		$this->M_Erm->update($data, $where, 'form_lembar_rujukan');
		$out['status'] = "success";
		echo json_encode($out);
	}
}
