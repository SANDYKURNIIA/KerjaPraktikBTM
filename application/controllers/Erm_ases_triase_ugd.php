<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ases_triase_ugd extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm');
		$this->load->model('M_Pencarian_Pasien');
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
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();


		// $asses_triase_ugd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_triase_ugd');
		// $page_data['data'] = empty($asses_triase_ugd) ? null : $asses_triase_ugd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_asses_triase_ugd';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function form_riwayat($id_pelayanan, $id_history)
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
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();


		// $asses_triase_ugd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_triase_ugd');
		// $page_data['data'] = empty($asses_triase_ugd) ? null : $asses_triase_ugd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_asses_triase_ugd';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_asses_triase_ugd($id_pelayanan, $id_history)
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
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();


		$asses_triase_ugd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_triase_ugd');
		$page_data['data'] = empty($asses_triase_ugd) ? null : $asses_triase_ugd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_asses_triase_ugd';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function riwayat_asses_perawat_igd($id_pelayanan, $id_history)
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
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();


		$asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		$page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_asses_triase_ugd';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}


	public function insert_asses_triase_ugd()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('pRujuk', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('asal_rujuk', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('keluhan_utama', 'Keluhan Utama', 'required');
		$this->form_validation->set_rules('gcs', 'GCS', 'required');
		$this->form_validation->set_rules('tekanan_darah', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('suhu', 'Suhu', 'required');
		$this->form_validation->set_rules('spo2', 'SPo2', 'required');
		$this->form_validation->set_rules('frequensi_nadi', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('berat_badan', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('frequensi_nafas', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('tinggi_badan', 'Tinggi Badan', 'required');
		$this->form_validation->set_rules('kebutuhan_khusus', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('mata', 'Mata', 'required');
		$this->form_validation->set_rules('verbal', 'Verbal', 'required');
		$this->form_validation->set_rules('motorik', 'motorik', 'required');
		$this->form_validation->set_rules('pemeriksaan', 'pemeriksaan', 'required');
		$this->form_validation->set_rules('resutasi', 'resutasi', 'required');
		$this->form_validation->set_rules('breathing', 'breathing', 'required');
		$this->form_validation->set_rules('cyrculation', 'cyrculation', 'required');
		$this->form_validation->set_rules('disability', 'disability', 'required');
		$this->form_validation->set_rules('exposure', 'exposure', 'required');
		$this->form_validation->set_rules('emergency', 'emergency', 'required');
		$this->form_validation->set_rules('urgent', 'urgent', 'required');
		$this->form_validation->set_rules('tidak_darurat', 'tidak_darurat', 'required');
		$this->form_validation->set_rules('skor_nyeri', 'Skor Nyeri', 'required');
		$this->form_validation->set_rules('skala_nyeri', 'Skala Nyeri', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'pRujuk' => $this->input->post('pRujuk'),
				'asal_rujuk' => $this->input->post('asal_rujuk'),
				'keluhan_utama' => $this->input->post('keluhan_utama'),
				'gcs' => $this->input->post('gcs'),
				'tekanan_darah' => $this->input->post('tekanan_darah'),
				'suhu' => $this->input->post('suhu'),
				'spo2' => $this->input->post('spo2'),
				'frequensi_nadi' => $this->input->post('frequensi_nadi'),
				'berat_badan' => $this->input->post('berat_badan'),
				'frequensi_nafas' => $this->input->post('frequensi_nafas'),
				'tinggi_badan' => $this->input->post('tinggi_badan'),
				'kebutuhan_khusus' => $this->input->post('kebutuhan_khusus'),
				'mata' => $this->input->post('mata'),
				'verbal' => $this->input->post('verbal'),
				'motorik' => $this->input->post('motorik'),
				'pemeriksaan' => $this->input->post('pemeriksaan'),
				'resutasi' => $this->input->post('resutasi'),
				'breathing' => $this->input->post('breathing'),
				'cyrculation' => $this->input->post('cyrculation'),
				'disability' => $this->input->post('disability'),
				'exposure' => $this->input->post('exposure'),
				'emergency' => $this->input->post('emergency'),
				'urgent' => $this->input->post('urgent'),
				'tidak_darurat' => $this->input->post('tidak_darurat'),
				'skor_nyeri' => $this->input->post('skor_nyeri'),
				'skala_nyeri' => $this->input->post('skala_nyeri'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_ass_triase_ugd');
			$out['status'] = "success";
		} else {
			$out = array(
				'error' => true,
				'pRujuk' => form_error('pRujuk'),
				'asal_rujuk' => form_error('asal_rujuk'),
				'keluhan_utama' => form_error('keluhan_utama'),
				'gcs' => form_error('gcs'),
				'tekanan_darah' => form_error('tekanan_darah'),
				'suhu' => form_error('suhu'),
				'spo2' => form_error('spo2'),
				'frequensi_nadi' => form_error('frequensi_nadi'),
				'berat_badan' => form_error('berat_badan'),
				'frequensi_nafas' => form_error('frequensi_nafas'),
				'tinggi_badan' => form_error('tinggi_badan'),
				'kebutuhan_khusus' => form_error('kebutuhan_khusus'),
				'mata' => form_error('mata'),
				'verbal' => form_error('verbal'),
				'motorik' => form_error('motorik'),
				'pemeriksaan' => form_error('pemeriksaan'),
				'resutasi' => form_error('resutasi'),
				'breathing' => form_error('breathing'),
				'cyrculation' => form_error('cyrculation'),
				'disability' => form_error('disability'),
				'exposure' => form_error('exposure'),
				'emergency' => form_error('emergency'),
				'urgent' => form_error('urgent'),
				'tidak_darurat' => form_error('tidak_darurat'),
				'skor_nyeri' => form_error('skor_nyeri'),
				'skala_nyeri' => form_error('skala_nyeri'),
			);
		}

		echo json_encode($out);
	}


	public function update_asses_triase_ugd()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'pRujuk' => $this->input->post('pRujuk'),
			'asal_rujuk' => $this->input->post('asal_rujuk'),
			'keluhan_utama' => $this->input->post('keluhan_utama'),
			'gcs' => $this->input->post('gcs'),
			'tekanan_darah' => $this->input->post('tekanan_darah'),
			'suhu' => $this->input->post('suhu'),
			'spo2' => $this->input->post('spo2'),
			'frequensi_nadi' => $this->input->post('frequensi_nadi'),
			'berat_badan' => $this->input->post('berat_badan'),
			'frequensi_nafas' => $this->input->post('frequensi_nafas'),
			'tinggi_badan' => $this->input->post('tinggi_badan'),
			'kebutuhan_khusus' => $this->input->post('kebutuhan_khusus'),
			'mata' => $this->input->post('mata'),
			'verbal' => $this->input->post('verbal'),
			'motorik' => $this->input->post('motorik'),
			'pemeriksaan' => $this->input->post('pemeriksaan'),
			'resutasi' => $this->input->post('resutasi'),
			'breathing' => $this->input->post('breathing'),
			'cyrculation' => $this->input->post('cyrculation'),
			'disability' => $this->input->post('disability'),
			'exposure' => $this->input->post('exposure'),
			'emergency' => $this->input->post('emergency'),
			'urgent' => $this->input->post('urgent'),
			'tidak_darurat' => $this->input->post('tidak_darurat'),
			'skor_nyeri' => $this->input->post('skor_nyeri'),
			'skala_nyeri' => $this->input->post('skala_nyeri'),
			'tanggal' => $tgl,
			'staff' => $staff,
		);

		$where = array('id_triase_ugd' => $this->input->post('id'));
		if (!$this->input->post('id')) {
			// Menangani kesalahan jika ID tidak ada
			$out['status'] = 'error';
			$out['message'] = 'ID tidak ditemukan';
			echo json_encode($out);
			return;
		}
		// print $success ? $file : 'Unable to save the file.';
		// print $success1 ? $file1 : 'Unable to save the file.';
		$this->M_Erm->update($data, $where, 'form_ass_triase_ugd');
		$out['status'] = "success";

		echo json_encode($out);
	}

	public function get_ass_per()
	{
		$id = $this->input->post('id');

		$this->db->select('form_ass_triase_ugd.*, form_ass_dokter_igd.keluhan');
		$this->db->from('form_ass_triase_ugd');
		$this->db->join('form_ass_dokter_igd', 'form_ass_triase_ugd.id_history = form_ass_dokter_igd.id_history', 'left');
		$this->db->where('form_ass_triase_ugd.id_history', $id);

		$db = $this->db->get()->row_array();

		if ($db == null) {
			$this->db->select('keluhan');
			$this->db->from('form_ass_dokter_igd');
			$this->db->where('id_history', $id);
			$db = $this->db->get()->row_array();
		}

		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			echo json_encode($db);
			exit;
		}
	}
}
