<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_resume_medis_raj extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm_poli');
	}

	public function form($id_pelayanan, $id_history, $jenis)
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
		$page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;

		$asses_per_igd = $this->M_Erm_poli->checkData($id_history, 'form_assesmen_awal_rajal');
		// var_dump($asses_per_igd);
		$page_data['per'] = empty($asses_per_igd) ? null : $asses_per_igd;
		$asses_dokter_igd = $this->M_Erm_poli->checkData($id_history, 'form_assesmen_dokter');
		$page_data['dok'] = empty($asses_dokter_igd) ? null : $asses_dokter_igd;

		$diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_pelayanan='$id_pelayanan'")->row_array();

		$page_data['diagnosa_utama'] = ($asses_dokter_igd == null) ? "" : $diagnosa1;
		$page_data['url'] = base_url('Erm_poli_edit/print_resume_medis/') . $id_pelayanan . '/' . $id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_rasume_medis_raj';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function input_rasume_medis_raj()
	{
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_rasume_medis_raj';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function get_data_resume()
	{
		$id = $this->input->post('id');
		$id_history = $this->input->post('id_history');

		$asses_per_igd = $this->db->query("SELECT 
		
		p.tekanan_darah,
		p.suhu,
		p.frequensi_nadi,
		p.frequensi_nafas,
		p.skala_nyeri,
		d.kepala,
		d.hidung,
		d.mulut,
		d.leher,
		d.thorax,
		d.jantung,
		d.paru,
		d.andomen,
		d.punggung,
		d.ekstremitas
	FROM
		form_assesmen_awal_rajal p
	LEFT JOIN
		form_assesmen_dokter d ON p.id_history = d.id_history
	WHERE
		p.id_pelayanan = '$id' AND d.id_history = '$id_history'
	GROUP BY
		p.id_history;")->row_array();
		// var_dump($asses_per_igd);
		$db = empty($asses_per_igd) ? null : $asses_per_igd;

		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}

	public function print_out()
	{
		$data['page_title'] = "Resume Medis Rajal";
		$this->load->view('erm_print/resume_medis_raj', $data);
	}
}
