<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ases_per_igd extends CI_Controller
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
		$page_data['alamat'] = $selectPasien->alamat ;
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


		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_asses_perawat_igd';
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
		$page_data['alamat'] = $selectPasien->alamat ;
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


		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_asses_perawat_igd';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_asses_perawat_igd($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm->selectDataPasienIGDbyid($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat;
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
		$page_data['page_content'] = 'erm_edit/view_asses_perawat_igd';
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
		$page_data['page_content'] = 'erm_edit/view_asses_perawat_igd';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}


	public function insert_asses_perawat_igd()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		// $this->form_validation->set_rules('pRujuk', 'Pasien Rujuk', 'required');
		// $this->form_validation->set_rules('asalRujuk', 'Asal Rujuk', 'required');
		// $this->form_validation->set_rules('gcs', 'GCS', 'required');
		// $this->form_validation->set_rules('kondisi_umum', 'Kondisi Umum', 'required');
		// $this->form_validation->set_rules('tekanan_darah', 'Tekanan Darah', 'required');
		// $this->form_validation->set_rules('suhu', 'Suhu', 'required');
		// $this->form_validation->set_rules('spo2', 'SPo2', 'required');
		// $this->form_validation->set_rules('frequensi_nadi', 'Frequensi Nadi', 'required');
		// $this->form_validation->set_rules('berat_badan', 'Pasien Rujuk', 'required');
		// $this->form_validation->set_rules('frequensi_nafas', 'Asal Rujuk', 'required');
		// $this->form_validation->set_rules('tinggi_badan', 'GCS', 'required');
		// $this->form_validation->set_rules('kebutuhan_khusus', 'Kondisi Umum', 'required');
		// $this->form_validation->set_rules('asesment_triase', 'Tekanan Darah', 'required');
		// $this->form_validation->set_rules('wajib_ibadah', 'Suhu', 'required');
		// $this->form_validation->set_rules('thaharah', 'SPo2', 'required');
		// $this->form_validation->set_rules('sholat', 'Frequensi Nadi', 'required');
		// $this->form_validation->set_rules('faktor_nyeri', 'Pasien Rujuk', 'required');
		// $this->form_validation->set_rules('kualitas_nyeri', 'Asal Rujuk', 'required');
		// $this->form_validation->set_rules('lokasi_nyeri', 'GCS', 'required');
		// $this->form_validation->set_rules('skala_nyeri', 'Kondisi Umum', 'required');
		// $this->form_validation->set_rules('durasi', 'Durasi', 'required');
		// $this->form_validation->set_rules('faktor_peringan', 'Suhu', 'required');
		// $this->form_validation->set_rules('efek_nyeri', 'SPo2', 'required');
		// $this->form_validation->set_rules('penurunan_bb', 'Frequensi Nadi', 'required');
		// $this->form_validation->set_rules('kurang_makan', 'Pasien Rujuk', 'required');
		// $this->form_validation->set_rules('kurus', 'Asal Rujuk', 'required');
		// $this->form_validation->set_rules('turun_bb', 'GCS', 'required');
		// $this->form_validation->set_rules('diare', 'Kondisi Umum', 'required');
		// $this->form_validation->set_rules('makan_kurang', 'Tekanan Darah', 'required');
		// $this->form_validation->set_rules('malnutrisi', 'Suhu', 'required');
		// $this->form_validation->set_rules('sempoyongan', 'SPo2', 'required');
		// $this->form_validation->set_rules('penopang', 'Frequensi Nadi', 'required');
		// $this->form_validation->set_rules('risiko', 'Pasien Rujuk', 'required');
		// $this->form_validation->set_rules('info_dpjp', 'Asal Rujuk', 'required');
		// $this->form_validation->set_rules('jam_info_dpjp', 'GCS', 'required');
		// $this->form_validation->set_rules('frek_bab', 'Kondisi Umum', 'required');
		// $this->form_validation->set_rules('keluhan_bab', 'Tekanan Darah', 'required');
		// $this->form_validation->set_rules('karakter_feces', 'Suhu', 'required');
		// $this->form_validation->set_rules('warna_feces', 'SPo2', 'required');
		// $this->form_validation->set_rules('frek_bak', 'Frequensi Nadi', 'required');
		// $this->form_validation->set_rules('warna_bak', 'Pasien Rujuk', 'required');
		// $this->form_validation->set_rules('keluhan_bak', 'Asal Rujuk', 'required');
		// $this->form_validation->set_rules('masalah', 'GCS', 'required');
		// $this->form_validation->set_rules('rencana', 'Kondisi Umum', 'required');
		// if ($this->form_validation->run()) {
		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'pRujuk' => $this->input->post('pRujuk'),
			'asal_rujuk' => $this->input->post('asalRujuk'),
			'gcs' => $this->input->post('gcs'),
			'kondisi_umum' => $this->input->post('kondisi_umum'),
			'tekanan_darah' => $this->input->post('tekanan_darah'),
			'suhu' => $this->input->post('suhu'),
			'spo2' => $this->input->post('spo2'),
			'frequensi_nadi' => $this->input->post('frequensi_nadi'),
			'berat_badan' => $this->input->post('berat_badan'),
			'frequensi_nafas' => $this->input->post('frequensi_nafas'),
			'tinggi_badan' => $this->input->post('tinggi_badan'),
			'kebutuhan_khusus' => $this->input->post('kebutuhan_khusus'),
			'asesment_triase' => $this->input->post('asesment_triase'),
			'wajib_ibadah' => $this->input->post('wajib_ibadah'),
			'thaharah' => $this->input->post('thaharah'),
			'sholat' => $this->input->post('sholat'),
			'faktor_nyeri' => $this->input->post('faktor_nyeri'),
			'kualitas_nyeri' => $this->input->post('kualitas_nyeri'),
			'lokasi_nyeri' => $this->input->post('lokasi_nyeri'),
			'skala_nyeri' => $this->input->post('skala_nyeri'),
			'durasi' => $this->input->post('durasi'),
			'faktor_peringan' => $this->input->post('faktor_peringan'),
			'efek_nyeri' => $this->input->post('efek_nyeri'),
			'penurunan_bb' => $this->input->post('penurunan_bb'),
			'kurang_makan' => $this->input->post('kurang_makan'),
			'kurus' => $this->input->post('kurus'),
			'turun_bb' => $this->input->post('turun_bb'),
			'diare' => $this->input->post('diare'),
			'makan_kurang' => $this->input->post('makan_kurang'),
			'malnutrisi' => $this->input->post('malnutrisi'),
			'sempoyongan' => $this->input->post('sempoyongan'),
			'penopang' => $this->input->post('penopang'),
			'tingkat_risiko' => $this->input->post('risiko'),
			'info_dpjp' => $this->input->post('info_dpjp'),
			'jam_info_dpjp' => $this->input->post('jam_info_dpjp'),
			'frek_bab' => $this->input->post('frek_bab'),
			'keluhan_bab' => $this->input->post('keluhan_bab'),
			'karakter_feces' => $this->input->post('karakter_feces'),
			'warna_feces' => $this->input->post('warna_feces'),
			'frek_bak' => $this->input->post('frek_bak'),
			'warna_bak' => $this->input->post('warna_bak'),
			'keluhan_bak' => $this->input->post('keluhan_bak'),
			'masalah' => $this->input->post('masalah'),
			'rencana' => $this->input->post('rencana'),
			'skor_nyeri' => $this->input->post('skor_nyeri'),
			'jatuh3bln' => $this->input->post('jatuh3bln'),
			'alatbantu' => $this->input->post('alatbantu'),
			'sulitjalan' => $this->input->post('sulitjalan'),
			'intervensi_risiko' => $this->input->post('intervensi_risiko'),
			'dekubitus_bantuan' => $this->input->post('dekubitus_bantuan'),
			'inkontinensia' => $this->input->post('inkontinensia'),
			'rwyt_dekubitus' => $this->input->post('rwyt_dekubitus'),
			'dekubitus_umur65' => $this->input->post('dekubitus_umur65'),
			'dekubitus_anak' => $this->input->post('dekubitus_anak'),
			// 'status_gizi' => $this->input->post('status_gizi'),
			// 'bbi_anak' => $this->input->post('bbi_anak'),
			// 'riwayat_imunisasi' => $this->input->post('riwayat_imunisasi'),
			// 'riwayat_tambahan' => $this->input->post('riwayat_tambahan'),

			'tanggal' => $tgl,
			'staff' => $staff,
		);

		$this->M_Erm->insert($data, 'form_ass_per_igd');
		$out['status'] = "success";
		// } else {
		// 	$out = array(
		// 		'error'   => true,
		// 		'pRujuk' => form_error('pRujuk'),
		// 		'gcs' => form_error('gcs'),
		// 		'kondisi_umum' => form_error('kondisi_umum'),
		// 		'tekanan_darah' => form_error('tekanan_darah'),
		// 		'suhu' => form_error('suhu'),
		// 		'spo2' => form_error('spo2'),
		// 		'frequensi_nadi' => form_error('frequensi_nadi'),
		// 		'berat_badan' => form_error('berat_badan'),
		// 		'frequensi_nafas' => form_error('frequensi_nafas'),
		// 		'tinggi_badan' => form_error('tinggi_badan'),
		// 		'kebutuhan_khusus' => form_error('kebutuhan_khusus'),
		// 		'asesment_triase' => form_error('asesment_triase'),
		// 		// 'wajib_ibadah' => form_error('wajib_ibadah'),
		// 		// 'thaharah' => form_error('thaharah'),
		// 		// 'sholat' => form_error('sholat'),
		// 		// 'faktor_nyeri' => form_error('faktor_nyeri'),
		// 		// 'kualitas_nyeri' => form_error('kualitas_nyeri'),
		// 		// 'lokasi_nyeri' => form_error('lokasi_nyeri'),
		// 		// 'skala_nyeri' => form_error('skala_nyeri'),
		// 		// 'durasi' => form_error('durasi'),
		// 		// 'faktor_peringan' => form_error('faktor_peringan'),
		// 		// 'efek_nyeri' => form_error('efek_nyeri'),
		// 		// 'penurunan_bb' => form_error('penurunan_bb'),
		// 		// 'kurang_makan' => form_error('kurang_makan'),
		// 		// 'kurus' => form_error('kurus'),
		// 		// 'turun_bb' => form_error('turun_bb'),
		// 		// 'diare' => form_error('diare'),
		// 		// 'makan_kurang' => form_error('makan_kurang'),
		// 		// 'malnutrisi' => form_error('malnutrisi'),
		// 		// 'sempoyongan' => form_error('sempoyongan'),
		// 		// 'penopang' => form_error('penopang'),
		// 		// 'tingkat_risiko' => form_error('risiko'),
		// 		// 'info_dpjp' => form_error('info_dpjp'),

		// 		'frek_bab' => form_error('frek_bab'),
		// 		'keluhan_bab' => form_error('keluhan_bab'),
		// 		'karakter_feces' => form_error('karakter_feces'),
		// 		'warna_feces' => form_error('warna_feces'),
		// 		'frek_bak' => form_error('frek_bak'),
		// 		'warna_bak' => form_error('warna_bak'),
		// 		'keluhan_bak' => form_error('keluhan_bak'),
		// 		'masalah' => form_error('masalah'),
		// 		'rencana' => form_error('rencana'),
		// 	);
		// }

		echo json_encode($out);
	}
	public function update_asses_perawat_igd()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$data   =   array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'pRujuk' => $this->input->post('pRujuk'),
			'asal_rujuk' => $this->input->post('asalRujuk'),
			'gcs' => $this->input->post('gcs'),
			'kondisi_umum' => $this->input->post('kondisi_umum'),
			'tekanan_darah' => $this->input->post('tekanan_darah'),
			'suhu' => $this->input->post('suhu'),
			'spo2' => $this->input->post('spo2'),
			'frequensi_nadi' => $this->input->post('frequensi_nadi'),
			'berat_badan' => $this->input->post('berat_badan'),
			'frequensi_nafas' => $this->input->post('frequensi_nafas'),
			'tinggi_badan' => $this->input->post('tinggi_badan'),
			'kebutuhan_khusus' => $this->input->post('kebutuhan_khusus'),
			'asesment_triase' => $this->input->post('asesment_triase'),
			'wajib_ibadah' => $this->input->post('wajib_ibadah'),
			'thaharah' => $this->input->post('thaharah'),
			'sholat' => $this->input->post('sholat'),
			'faktor_nyeri' => $this->input->post('faktor_nyeri'),
			'kualitas_nyeri' => $this->input->post('kualitas_nyeri'),
			'lokasi_nyeri' => $this->input->post('lokasi_nyeri'),
			'skala_nyeri' => $this->input->post('skala_nyeri'),
			'durasi' => $this->input->post('durasi'),
			'faktor_peringan' => $this->input->post('faktor_peringan'),
			'efek_nyeri' => $this->input->post('efek_nyeri'),
			'penurunan_bb' => $this->input->post('penurunan_bb'),
			'kurang_makan' => $this->input->post('kurang_makan'),
			'kurus' => $this->input->post('kurus'),
			'turun_bb' => $this->input->post('turun_bb'),
			'diare' => $this->input->post('diare'),
			'makan_kurang' => $this->input->post('makan_kurang'),
			'malnutrisi' => $this->input->post('malnutrisi'),
			'sempoyongan' => $this->input->post('sempoyongan'),
			'penopang' => $this->input->post('penopang'),
			'tingkat_risiko' => $this->input->post('risiko'),
			'info_dpjp' => $this->input->post('info_dpjp'),
			'jam_info_dpjp' => $this->input->post('jam_info_dpjp'),
			'frek_bab' => $this->input->post('frek_bab'),
			'keluhan_bab' => $this->input->post('keluhan_bab'),
			'karakter_feces' => $this->input->post('karakter_feces'),
			'warna_feces' => $this->input->post('warna_feces'),
			'frek_bak' => $this->input->post('frek_bak'),
			'warna_bak' => $this->input->post('warna_bak'),
			'keluhan_bak' => $this->input->post('keluhan_bak'),
			'masalah' => $this->input->post('masalah'),
			'rencana' => $this->input->post('rencana'),
			'skor_nyeri' => $this->input->post('skor_nyeri'),
			'jatuh3bln' => $this->input->post('jatuh3bln'),
			'alatbantu' => $this->input->post('alatbantu'),
			'sulitjalan' => $this->input->post('sulitjalan'),
			'intervensi_risiko' => $this->input->post('intervensi_risiko'),
			'dekubitus_bantuan' => $this->input->post('dekubitus_bantuan'),
			'inkontinensia' => $this->input->post('inkontinensia'),
			'rwyt_dekubitus' => $this->input->post('rwyt_dekubitus'),
			'dekubitus_umur65' => $this->input->post('dekubitus_umur65'),
			'dekubitus_anak' => $this->input->post('dekubitus_anak'),
			// 'status_gizi' => $this->input->post('status_gizi'),
			// 'bbi_anak' => $this->input->post('bbi_anak'),
			// 'riwayat_imunisasi' => $this->input->post('riwayat_imunisasi'),
			// 'riwayat_tambahan' => $this->input->post('riwayat_tambahan'),
			'tanggal' => $tgl,
			'staff' => $staff,
		);
		$where = array('id_form_ass_per_igd' => $this->input->post('id'));
		// print $success ? $file : 'Unable to save the file.';
		// print $success1 ? $file1 : 'Unable to save the file.';
		$this->M_Erm->update($data, $where, 'form_ass_per_igd');
		$out['status'] = "success";



		echo json_encode($out);
	}
	//assesmen rawat jalan
	public function get_triase()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_ass_triase_ugd', ['id_history' => $id])->result();
		if (count($db) > 0) {
			$db = $db[0];
			$db->status_dt = 'found';
		} else {
			$db = null;
			$db['status_dt'] = 'not found';
		}
		echo json_encode($db);

	}
}
