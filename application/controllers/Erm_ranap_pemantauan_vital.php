<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_pemantauan_vital extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm_ranap');
	}

	public function formvital($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['dpjp'] = $selectPasien->nama_dokter;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['tgl_masuk'] = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_pemantauan_vital_dewasa';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_vital($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['dpjp'] = $selectPasien->nama_dokter;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap_Edit/view_pemantauan_vital_dewasa';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function insert_pemantauan_vital()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('kesadaran', 'Tingkat Kesadaran', 'required');
		$this->form_validation->set_rules('pernafasan', 'Pernafasan', 'required');
		$this->form_validation->set_rules('tekananDarah', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('denyut_jantung', 'Denyut Jantung', 'required');
		$this->form_validation->set_rules('temperatur', 'Temperatur', 'required');
		// $this->form_validation->set_rules('cMasuk', 'Cara Masuk', 'required');
		// $this->form_validation->set_rules('gcs', 'GCS', 'required');
		// $this->form_validation->set_rules('e', 'E', 'required');
		// $this->form_validation->set_rules('m', 'M', 'required');
		// $this->form_validation->set_rules('v', 'V', 'required');
		// $this->form_validation->set_rules('kondisi', 'Kondisi Saat Masuk :', 'required');
		// $this->form_validation->set_rules('tekanan_darah', 'Tekanan Darah', 'required');
		// $this->form_validation->set_rules('suhu', 'Suhu', 'required');
		// $this->form_validation->set_rules('spo2', 'SPo2', 'required');
		// $this->form_validation->set_rules('frequensi_nadi', 'Frequensi Nadi', 'required');
		// $this->form_validation->set_rules('berat_badan', 'Pasien Rujuk', 'required');
		// $this->form_validation->set_rules('frequensi_nafas', 'Asal Rujuk', 'required');
		// $this->form_validation->set_rules('tinggi_badan', 'GCS', 'required');
		// $this->form_validation->set_rules('dokter_pemeriksa', 'Dokter Pemeriksa', 'required');
		// $this->form_validation->set_rules('diagnosa_masuk', 'Diagnosa Masuk', 'required');
		// $this->form_validation->set_rules('keluhan_utama', 'Keluhan Utama', 'required');
		// $this->form_validation->set_rules('alergi_obat', 'Alergi Obat', 'required');
		// $this->form_validation->set_rules('alergi', 'Alergi', 'required');
		// $this->form_validation->set_rules('reaksi_utama', 'Reaksi Utama', 'required');
		// $this->form_validation->set_rules('merokok', 'Rokok', 'required');
		// $this->form_validation->set_rules('bab', 'BAB', 'required');
		// $this->form_validation->set_rules('bak', 'BAK', 'required');
		// $this->form_validation->set_rules('pemuka_agama', 'Pemuka Agama', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'kesadaran' => $this->input->post('kesadaran'),
				'kesadaran_detail' => $this->input->post('kesadaran_detail'),
				'pernafasan' => $this->input->post('pernafasan'),
				'pernafasan_detail' => $this->input->post('pernafasan_detail'),
				'tekananDarah' => $this->input->post('tekananDarah'),
				'tekananDarah_detail' => $this->input->post('tekananDarah_detail'),
				'denyut_jantung' => $this->input->post('denyut_jantung'),
				'denyut_jantung_detail' => $this->input->post('denyut_jantung_detail'),
				'temperatur' => $this->input->post('temperatur'),
				'temperatur_detail' => $this->input->post('temperatur_detail'),
				'waktu' => $this->input->post('waktu'),
				'total_ews' => $this->input->post('total_ews'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_ranap->insert($data, 'data_pemantauan_vital');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'kesadaran' => $this->input->post('kesadaran'),
				'kesadaran_detail' => $this->input->post('kesadaran_detail'),
				'pernafasan' => $this->input->post('pernafasan'),
				'pernafasan_detail' => $this->input->post('pernafasan_detail'),
				'tekananDarah' => $this->input->post('tekananDdarah'),
				'tekananDarah_detail' => $this->input->post('tekananDarah_detail'),
				'denyut_jantung' => $this->input->post('denyut_jantung'),
				'denyut_jantung_detail' => $this->input->post('denyut_jantung_detail'),
				'temperatur' => $this->input->post('temperatur'),
				'temperatur_detail' => $this->input->post('temperatur_detail'),
				'waktu' => $this->input->post('waktu'),
				'total_ews' => $this->input->post('total_ews'),
			);
		}

		echo json_encode($out);
	}
	// public function update_asses_perawat_ranap()
	// {
	// 	$data = $this->session->userdata('data_auth');
	// 	$tgl = date("Y-m-d h:i:s");
	// 	$staff = $data->id_staff;
	// $this->form_validation->set_rules('cMasuk', 'Cara Masuk', 'required');
	// $this->form_validation->set_rules('gcs', 'GCS', 'required');
	// $this->form_validation->set_rules('e', 'E', 'required');
	// $this->form_validation->set_rules('m', 'M', 'required');
	// $this->form_validation->set_rules('v', 'V', 'required');
	// $this->form_validation->set_rules('kondisi', 'Kondisi Saat Masuk :', 'required');
	// $this->form_validation->set_rules('tekanan_darah', 'Tekanan Darah', 'required');
	// $this->form_validation->set_rules('suhu', 'Suhu', 'required');
	// $this->form_validation->set_rules('spo2', 'SPo2', 'required');
	// $this->form_validation->set_rules('frequensi_nadi', 'Frequensi Nadi', 'required');
	// $this->form_validation->set_rules('berat_badan', 'Pasien Rujuk', 'required');
	// $this->form_validation->set_rules('frequensi_nafas', 'Asal Rujuk', 'required');
	// $this->form_validation->set_rules('tinggi_badan', 'GCS', 'required');
	// 	// $this->form_validation->set_rules('dokter_pemeriksa', 'Dokter Pemeriksa', 'required');
	// 	// $this->form_validation->set_rules('diagnosa_masuk', 'Diagnosa Masuk', 'required');
	// 	// $this->form_validation->set_rules('keluhan_utama', 'Keluhan Utama', 'required');
	// 	// $this->form_validation->set_rules('alergi_obat', 'Alergi Obat', 'required');
	// 	// $this->form_validation->set_rules('alergi', 'Alergi', 'required');
	// 	// $this->form_validation->set_rules('reaksi_utama', 'Reaksi Utama', 'required');
	// 	// $this->form_validation->set_rules('merokok', 'Rokok', 'required');
	// 	// $this->form_validation->set_rules('bab', 'BAB', 'required');
	// 	// $this->form_validation->set_rules('bak', 'BAK', 'required');
	// 	// $this->form_validation->set_rules('pemuka_agama', 'Pemuka Agama', 'required');
	// 	if ($this->form_validation->run()) {
	// 		$data = array(
	// 			'id_pelayanan' => $this->input->post('id_pelayanan'),
	// 			'id_history' => $this->input->post('id_history'),
	// 			'no_rm' => $this->input->post('no_rm'),
	// 			'tingkat_kesadaran' => $this->input->post('tingkat_kesadaran'),
	// 			'tingkat_kesadaran_detail' => $this->input->post('tingkat_kesadaran_detail'),
	// 			'pernafasan' => $this->input->post('pernafasan'),
	// 			'pernafasan_detail' => $this->input->post('pernafasan_detail'),
	// 			'tekanan_darah' => $this->input->post('tekanan_darah'),
	// 			'tekanan_darah_detail' => $this->input->post('tekanan_darah_detail'),
	// 			'denyut_jantung' => $this->input->post('denyut_jantung'),
	// 			'denyut_jantung_detail' => $this->input->post('denyut_jantung_detail'),
	// 			'temperatur' => $this->input->post('temperatur'),
	// 			'temperatur_detail' => $this->input->post('temperatur_detail'),
	// 			'total_score' => $this->input->post('total_score'),
	// 			'tanggal' => $tgl,
	// 			'staff' => $staff,
	// 		);
	// 		// $data2 = array(
	// 		// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
	// 		// 	'id_history' => $this->input->post('id_history'),
	// 		// 	'no_rm' => $this->input->post('no_rm'),
	// 		// );
	// 		$out['status'] = "success";
	// 	} else {
	// 		$out = array(
	// 			'error'   => true,
	// 			'tingkat_kesadaran' => $this->input->post('tingkat_kesadaran'),
	// 			'tingkat_kesadaran_detail' => $this->input->post('tingkat_kesadaran_detail'),
	// 			'pernafasan' => $this->input->post('pernafasan'),
	// 			'pernafasan_detail' => $this->input->post('pernafasan_detail'),
	// 			'tekanan_darah' => $this->input->post('tekanan_darah'),
	// 			'tekanan_darah_detail' => $this->input->post('tekanan_darah_detail'),
	// 			'denyut_jantung' => $this->input->post('denyut_jantung'),
	// 			'denyut_jantung_detail' => $this->input->post('denyut_jantung_detail'),
	// 			'temperatur' => $this->input->post('temperatur'),
	// 			'temperatur_detail' => $this->input->post('temperatur_detail'),
	// 			'total_score' => $this->input->post('total_score'),
	// 		);

	// 		$result = $this->M_Erm_ranap->update_pemantauan_vital($id, $data);

	// 		if ($result) {
	// 			$out['status'] = "success";
	// 		} else {
	// 			$out['status'] = "error";
	// 			$out['message'] = 'Failed to update data';
	// 		}
	// 	} else {
	// 		$out['status'] = "error";
	// 		$out['message'] = validation_errors(); // Mengumpulkan semua pesan kesalahan validasi
	// 	}

	// 	// Mengembalikan respons ke client dalam format JSON
	// 	echo json_encode($out);
	// }
	public function get_peman_vital()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('data_pemantauan_vital', ['id_form' => $id])->row_array();
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
	function hapus_vital()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_form' => $id,
		);
		$this->M_Erm_ranap->delete($where, 'data_pemantauan_vital');
		$out['status'] = "success";
		echo json_encode($out);
	}

	public function tampil_list_per_id()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm_ranap->selectPemantauanSehari($id_pelayanan);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_form . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $page_data[$i]->id_form . "\")' '><i class='icon-trash'></i></button>";

			$waktu = $page_data[$i]->waktu;
			$total_ews = $page_data[$i]->total_ews;
			$temperatur_detail = $page_data[$i]->temperatur_detail;
			$denyut_jantung_detail = $page_data[$i]->denyut_jantung_detail;
			$tekananDarah_detail = $page_data[$i]->tekananDarah_detail;
			$pernafasan_detail = $page_data[$i]->pernafasan_detail;
			$kesadaran_detail = $page_data[$i]->kesadaran_detail;
			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal);
			$out[$i] = array($no,$tombol,$hapus,$date,$kesadaran_detail,$pernafasan_detail,$tekananDarah_detail,$denyut_jantung_detail,$temperatur_detail,$waktu,$total_ews);
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
}
