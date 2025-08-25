<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_trans_pas_antar_rs extends CI_Controller
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
		$page_data['dpjp'] = $selectPasien->nama_dokter;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['data'] = $selectPasien;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_transfer_antar_rs';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_antar($id_pelayanan, $id_history)
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
		$page_data['dpjp'] = $selectPasien->nama_dokter;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['data'] = $selectPasien;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_transfer_antar_rs';
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
		$page_data['dpjp'] = $selectPasien->nama_dokter;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['data'] = $selectPasien;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_transfer_antar_rs';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function riwayat_antar($id_pelayanan, $id_history)
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
		$page_data['dpjp'] = $selectPasien->nama_dokter;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['data'] = $selectPasien;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_transfer_antar_rs';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

/////////////////////////RAJAL/////////////////////////////////////////

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
		$page_data['dpjp'] = $selectPasien->nama_dokter;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['data'] = $selectPasien;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_transfer_antar_rs';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_antar_raj($id_pelayanan, $id_history)
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
		$page_data['dpjp'] = $selectPasien->nama_dokter;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['data'] = $selectPasien;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_transfer_antar_rs';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function insert_tf_antar_rs()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$img = $this->input->post('ttd');
		if($img!=''){
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = "assets/images/" . uniqid(time(), true) . ".png";
		$success = file_put_contents($file, $data);
		}else{
			$file='';
		}
		$this->form_validation->set_rules('rs_tujuan', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('staff', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('jam_brgkt', 'GCS', 'required');
		$this->form_validation->set_rules('staf_terima', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('tgl', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('jam_tiba', 'Suhu', 'required');
		$this->form_validation->set_rules('klinikal', 'SPo2', 'required');
		$this->form_validation->set_rules('non_klinik', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('diagnosis', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('dok_rujuk', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('riwayat_penyakit', 'GCS', 'required');
		$this->form_validation->set_rules('riwayat_alergi', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('inTakeOral', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('tindakan', 'SPo2', 'required');
		$this->form_validation->set_rules('gcs', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('kes_e', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('kes_m', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('kes_v', 'GCS', 'required');
		$this->form_validation->set_rules('td', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('suhu', 'Durasi', 'required');
		$this->form_validation->set_rules('nadi', 'Suhu', 'required');
		$this->form_validation->set_rules('rr', 'SPo2', 'required');
		$this->form_validation->set_rules('alat', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('kejadian', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('perawatan_lanjut', 'Asal Rujuk', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'rs_tujuan' => $this->input->post('rs_tujuan'),
				'staff' => $this->input->post('staff'),
				'jam_brgkt' => $this->input->post('jam_brgkt'),
				'staff_terima' => $this->input->post('staf_terima'),
				'tgl' => $this->input->post('tgl'),
				'jam_tiba' => $this->input->post('jam_tiba'),
				'klinikal' => $this->input->post('klinikal'),
				'non_klinik' => $this->input->post('non_klinik'),

				'diagnosis' => $this->input->post('diagnosis'),
				'dok_rujuk' => $this->input->post('dok_rujuk'),
				'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
				'riwayat_alergi' => $this->input->post('riwayat_alergi'),
				'inTakeOral' => $this->input->post('inTakeOral'),

				// 'periksa' => $this->input->post('periksa'),
				'tindakan' => $this->input->post('tindakan'),
				'gcs' => $this->input->post('gcs'),
				'kes_e' => $this->input->post('kes_e'),
				'kes_m' => $this->input->post('kes_m'),
				'kes_v' => $this->input->post('kes_v'),
				'td' => $this->input->post('td'),
				'suhu' => $this->input->post('suhu'),
				'nadi' => $this->input->post('nadi'),
				'rr' => $this->input->post('rr'),
				'alat' => $this->input->post('alat'),
				'kejadian' => $this->input->post('kejadian'),
				'perawatan_lanjut' => $this->input->post('perawatan_lanjut'),
				'ttd' => $file,
				'tanggal' => $tgl,
				// 'staff' => $this->input->post('staff'),
				'tgl' => $this->input->post('tgl'),
			);

			$this->M_Erm->insert($data, 'form_transfer_antar_rs');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'rs_tujuan' => form_error('rs_tujuan'),
				'staff' => form_error('staff'),
				'jam_brgkt' => form_error('jam_brgkt'),
				'staf_terima' => form_error('staf_terima'),
				'tgl' => form_error('tgl'),
				'jam_tiba' => form_error('jam_tiba'),
				'klinikal' => form_error('klinikal'),
				'non_klinik' => form_error('non_klinik'),

				'diagnosis' => form_error('diagnosis'),
				'dok_rujuk' => form_error('dok_rujuk'),
				'riwayat_penyakit' => form_error('riwayat_penyakit'),
				'riwayat_alergi' => form_error('riwayat_alergi'),
				'inTakeOral' => form_error('inTakeOral'),

				// 'periksa' => form_error('periksa'),
				'tindakan' => form_error('tindakan'),
				'gcs' => form_error('gcs'),
				'kes_e' => form_error('kes_e'),
				'kes_m' => form_error('kes_m'),
				'kes_v' => form_error('kes_v'),
				'td' => form_error('td'),
				'suhu' => form_error('suhu'),
				'nadi' => form_error('nadi'),
				'rr' => form_error('rr'),
				'alat' => form_error('alat'),
				'kejadian' => form_error('kejadian'),
				'perawatan_lanjut' => form_error('perawatan_lanjut'),
			);
		}
		echo json_encode($out);
	}
	public function edit_tf_antar_rs()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$img = $this->input->post('ttd');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = "assets/images/" . uniqid(time(), true) . ".png";
		$success = file_put_contents($file, $data);

		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'rs_tujuan' => $this->input->post('rs_tujuan'),
			'staff' => $this->input->post('staff'),
			'jam_brgkt' => $this->input->post('jam_brgkt'),
			'staff_terima' => $this->input->post('staf_terima'),
			'tgl' => $this->input->post('tgl'),
			'jam_tiba' => $this->input->post('jam_tiba'),
			'klinikal' => $this->input->post('klinikal'),
			'non_klinik' => $this->input->post('non_klinik'),

			'diagnosis' => $this->input->post('diagnosis'),
			'dok_rujuk' => $this->input->post('dok_rujuk'),
			'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
			'riwayat_alergi' => $this->input->post('riwayat_alergi'),
			'inTakeOral' => $this->input->post('inTakeOral'),

			// 'periksa' => $this->input->post('periksa'),
			'tindakan' => $this->input->post('tindakan'),
			'gcs' => $this->input->post('gcs'),
			'kes_e' => $this->input->post('kes_e'),
			'kes_m' => $this->input->post('kes_m'),
			'kes_v' => $this->input->post('kes_v'),
			'td' => $this->input->post('td'),
			'suhu' => $this->input->post('suhu'),
			'nadi' => $this->input->post('nadi'),
			'rr' => $this->input->post('rr'),
			'alat' => $this->input->post('alat'),
			'kejadian' => $this->input->post('kejadian'),
			'perawatan_lanjut' => $this->input->post('perawatan_lanjut'),
			'ttd' => $file,
			'tanggal' => $tgl,
			// 'staff' => $this->input->post('staff'),
			'tgl' => $this->input->post('tgl'),
		);
		$where = array('id_form_transfer_antar_rs' => $this->input->post('id'));

		$this->M_Erm->update($data,$where, 'form_transfer_antar_rs');
		$out['status'] = "success";

		echo json_encode($out);
	}
	public function print_out()
	{
		$data['page_title'] = "Transfer Pasien Antar RS";
		$this->load->view('erm_print/Trans_pas_antar_rs', $data);
	}
}
