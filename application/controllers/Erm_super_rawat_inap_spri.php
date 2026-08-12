<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_super_rawat_inap_spri extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm');
		$this->load->model('M_Erm_poli');
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
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_super_ranap';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_super_ranap($id_pelayanan, $id_history)
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
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_super_ranap';
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
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_super_ranap';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function riwayat_super_ranap($id_pelayanan, $id_history)
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
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_super_ranap';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	/////////////////////////RAJAL////////////////////////////
	public function form_raj($id_pelayanan, $id_history)
	{
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
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_super_ranap';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_super_ranap_raj($id_pelayanan, $id_history)
	{
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
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_super_ranap';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function insert_super_ranap_igd()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
		$this->form_validation->set_rules('dokter_merawat', 'Dokter Merawat', 'required');
		$this->form_validation->set_rules('dokter_pengirim', 'Dokter Pengirim', 'required');
		$this->form_validation->set_rules('kamar_rawat', 'Kamar Rawat', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'diagnosis' => $this->input->post('diagnosis'),
				'dokter_merawat' => $this->input->post('dokter_merawat'),
				'dokter_pengirim' => $this->input->post('dokter_pengirim'),
				'kamar_rawat' => $this->input->post('kamar_rawat'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_perintah_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'diagnosis' => form_error('diagnosis'),
				'dokter_merawat' => form_error('dokter_merawat'),
				'dokter_pengirim' => form_error('dokter_pengirim'),
				'kamar_rawat' => form_error('kamar_rawat'),
			);
		}
		echo json_encode($out);
	}
	public function edit_super_ranap_igd()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'diagnosis' => $this->input->post('diagnosis'),
			'dokter_merawat' => $this->input->post('dokter_merawat'),
			'dokter_pengirim' => $this->input->post('dokter_pengirim'),
			'kamar_rawat' => $this->input->post('kamar_rawat'),
			'tanggal' => $tgl,
			'staff' => $staff,
		);

		$where = array('id_form_perintah_ranap' => $this->input->post('id'));
		$this->M_Erm->update($data,$where, 'form_perintah_ranap');
		$out['status'] = "success";

		echo json_encode($out);
	}

	public function print_out()
	{
		$data['page_title'] = "General Concern";
		$this->load->view('erm_print/super_rawat_inap_spri', $data);
	}
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_super_rawat_inap_spri extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm');
		$this->load->model('M_Erm_poli');
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
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_super_ranap';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_super_ranap($id_pelayanan, $id_history)
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
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_super_ranap';
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
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_super_ranap';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function riwayat_super_ranap($id_pelayanan, $id_history)
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
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_super_ranap';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	/////////////////////////RAJAL////////////////////////////
	public function form_raj($id_pelayanan, $id_history)
	{
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
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_super_ranap';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_super_ranap_raj($id_pelayanan, $id_history)
	{
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
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_super_ranap';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function insert_super_ranap_igd()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
		$this->form_validation->set_rules('dokter_merawat', 'Dokter Merawat', 'required');
		$this->form_validation->set_rules('dokter_pengirim', 'Dokter Pengirim', 'required');
		$this->form_validation->set_rules('kamar_rawat', 'Kamar Rawat', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'diagnosis' => $this->input->post('diagnosis'),
				'dokter_merawat' => $this->input->post('dokter_merawat'),
				'dokter_pengirim' => $this->input->post('dokter_pengirim'),
				'kamar_rawat' => $this->input->post('kamar_rawat'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_perintah_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'diagnosis' => form_error('diagnosis'),
				'dokter_merawat' => form_error('dokter_merawat'),
				'dokter_pengirim' => form_error('dokter_pengirim'),
				'kamar_rawat' => form_error('kamar_rawat'),
			);
		}
		echo json_encode($out);
	}
	public function edit_super_ranap_igd()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'diagnosis' => $this->input->post('diagnosis'),
			'dokter_merawat' => $this->input->post('dokter_merawat'),
			'dokter_pengirim' => $this->input->post('dokter_pengirim'),
			'kamar_rawat' => $this->input->post('kamar_rawat'),
			'tanggal' => $tgl,
			'staff' => $staff,
		);

		$where = array('id_form_perintah_ranap' => $this->input->post('id'));
		$this->M_Erm->update($data,$where, 'form_perintah_ranap');
		$out['status'] = "success";

		echo json_encode($out);
	}

	public function print_out()
	{
		$data['page_title'] = "General Concern";
		$this->load->view('erm_print/super_rawat_inap_spri', $data);
	}
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
