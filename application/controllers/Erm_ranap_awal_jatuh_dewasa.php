<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_awal_jatuh_dewasa extends CI_Controller
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
		$this->load->model('M_Erm_ranap');
	}
    public function formawaljatuhdewasa($id_pelayanan,$id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		
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
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$page_data['ruang_rawat'] = $this->M_Erm_ranap->getRuangByRiwayatKamar($id_pelayanan);
	
	

		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_awal_jatuh_dewasa';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_asesmen($id_pelayanan,$id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$selectPasien2 = $this->M_Erm_ranap->selectBayi($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap_Edit/view_awal_jatuh_dewasa';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function insert_asesmen()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('jatuh', 'Riwayat Jatuh', 'required');
		$this->form_validation->set_rules('sekunder', 'Diagnosa Sekunder', 'required');
		$this->form_validation->set_rules('bantu', 'Alat Bantu', 'required');
		$this->form_validation->set_rules('infus', 'Infus', 'required');
		$this->form_validation->set_rules('berjalan', 'Gaya Berjalan', 'required');
		$this->form_validation->set_rules('mental', 'Status Mental', 'required');
		$this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'riwayat_jatuh' => $this->input->post('jatuh'),
				'diagnosa_sekunder' => $this->input->post('sekunder'),
				'alat_bantu' => $this->input->post('bantu'),
				'infus' => $this->input->post('infus'),
				'gaya_jalan' => $this->input->post('berjalan'),
				'status_mental' => $this->input->post('mental'),
				'skor_total' => $this->input->post('skor_total'),
				'diagnosa' => $this->input->post('diagnosa'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_ranap->insert($data, 'asesmen_awal_dewasa');
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'riwayat_jatuh' => form_error('jatuh'),
				'diagnosa_sekunder' => form_error('sekunder'),
				'alat_bantu' => form_error('bantu'),
				'infus' => form_error('infus'),
				'gaya_jalan' => form_error('berjalan'),
				'status_mental' => form_error('mental'),
				'skor_total' => form_error('skor_total'),
			);
		}
		echo json_encode($out);
	}
	public function update_asesmen()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$id = $this->input->post('id');
		$this->form_validation->set_rules('jatuh', 'Riwayat Jatuh', 'required');
		$this->form_validation->set_rules('sekunder', 'Diagnosa Sekunder', 'required');
		$this->form_validation->set_rules('bantu', 'Alat Bantu', 'required');
		$this->form_validation->set_rules('infus', 'Infus', 'required');
		$this->form_validation->set_rules('berjalan', 'Gaya Berjalan', 'required');
		$this->form_validation->set_rules('mental', 'Status Mental', 'required');
		$this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'riwayat_jatuh' => $this->input->post('jatuh'),
				'diagnosa_sekunder' => $this->input->post('sekunder'),
				'alat_bantu' => $this->input->post('bantu'),
				'infus' => $this->input->post('infus'),
				'gaya_jalan' => $this->input->post('berjalan'),
				'status_mental' => $this->input->post('mental'),
				'skor_total' => $this->input->post('skor_total'),
				'diagnosa' => $this->input->post('diagnosa'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm_ranap->update_awal_dewasa($id,$data);
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'riwayat_jatuh' => form_error('jatuh'),
				'diagnosa_sekunder' => form_error('sekunder'),
				'alat_bantu' => form_error('bantu'),
				'infus' => form_error('infus'),
				'gaya_jalan' => form_error('jalan'),
				'status_mental' => form_error('mental'),
				'skor_total' => form_error('skor_total'),
			);
		}
		echo json_encode($out);
	}
	public function get_ass_per()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('asesmen_awal_dewasa', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
}
?>
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_awal_jatuh_dewasa extends CI_Controller
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
		$this->load->model('M_Erm_ranap');
	}
    public function formawaljatuhdewasa($id_pelayanan,$id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		
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
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$page_data['ruang_rawat'] = $this->M_Erm_ranap->getRuangByRiwayatKamar($id_pelayanan);
	
	

		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_awal_jatuh_dewasa';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_asesmen($id_pelayanan,$id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$selectPasien2 = $this->M_Erm_ranap->selectBayi($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap_Edit/view_awal_jatuh_dewasa';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function insert_asesmen()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('jatuh', 'Riwayat Jatuh', 'required');
		$this->form_validation->set_rules('sekunder', 'Diagnosa Sekunder', 'required');
		$this->form_validation->set_rules('bantu', 'Alat Bantu', 'required');
		$this->form_validation->set_rules('infus', 'Infus', 'required');
		$this->form_validation->set_rules('berjalan', 'Gaya Berjalan', 'required');
		$this->form_validation->set_rules('mental', 'Status Mental', 'required');
		$this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'riwayat_jatuh' => $this->input->post('jatuh'),
				'diagnosa_sekunder' => $this->input->post('sekunder'),
				'alat_bantu' => $this->input->post('bantu'),
				'infus' => $this->input->post('infus'),
				'gaya_jalan' => $this->input->post('berjalan'),
				'status_mental' => $this->input->post('mental'),
				'skor_total' => $this->input->post('skor_total'),
				'diagnosa' => $this->input->post('diagnosa'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_ranap->insert($data, 'asesmen_awal_dewasa');
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'riwayat_jatuh' => form_error('jatuh'),
				'diagnosa_sekunder' => form_error('sekunder'),
				'alat_bantu' => form_error('bantu'),
				'infus' => form_error('infus'),
				'gaya_jalan' => form_error('berjalan'),
				'status_mental' => form_error('mental'),
				'skor_total' => form_error('skor_total'),
			);
		}
		echo json_encode($out);
	}
	public function update_asesmen()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$id = $this->input->post('id');
		$this->form_validation->set_rules('jatuh', 'Riwayat Jatuh', 'required');
		$this->form_validation->set_rules('sekunder', 'Diagnosa Sekunder', 'required');
		$this->form_validation->set_rules('bantu', 'Alat Bantu', 'required');
		$this->form_validation->set_rules('infus', 'Infus', 'required');
		$this->form_validation->set_rules('berjalan', 'Gaya Berjalan', 'required');
		$this->form_validation->set_rules('mental', 'Status Mental', 'required');
		$this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'riwayat_jatuh' => $this->input->post('jatuh'),
				'diagnosa_sekunder' => $this->input->post('sekunder'),
				'alat_bantu' => $this->input->post('bantu'),
				'infus' => $this->input->post('infus'),
				'gaya_jalan' => $this->input->post('berjalan'),
				'status_mental' => $this->input->post('mental'),
				'skor_total' => $this->input->post('skor_total'),
				'diagnosa' => $this->input->post('diagnosa'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm_ranap->update_awal_dewasa($id,$data);
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'riwayat_jatuh' => form_error('jatuh'),
				'diagnosa_sekunder' => form_error('sekunder'),
				'alat_bantu' => form_error('bantu'),
				'infus' => form_error('infus'),
				'gaya_jalan' => form_error('jalan'),
				'status_mental' => form_error('mental'),
				'skor_total' => form_error('skor_total'),
			);
		}
		echo json_encode($out);
	}
	public function get_ass_per()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('asesmen_awal_dewasa', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
}
?>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
