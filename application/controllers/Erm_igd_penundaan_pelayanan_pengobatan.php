<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_igd_penundaan_pelayanan_pengobatan extends CI_Controller
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
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['dpjp'] = $selectPasien->nama_dokter;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_igd_penundaan_pelayanan_pengobatan';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_penundaan($id_pelayanan, $id_history)
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
		$page_data['dpjp'] = $selectPasien->nama_dokter;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_igd_penundaan_pelayanan_pengobatan';
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
		$page_data['dpjp'] = $selectPasien->nama_dokter;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_igd_penundaan_pelayanan_pengobatan';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function riwayat_penundaan($id_pelayanan, $id_history)
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
		$page_data['dpjp'] = $selectPasien->nama_dokter;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_igd_penundaan_pelayanan_pengobatan';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function insert_penundaan_pelayanan()
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
		$img1 = $this->input->post('ttd1');
		$img1 = str_replace('data:image/png;base64,', '', $img1);
		$img1 = str_replace(' ', '+', $img1);
		$data1 = base64_decode($img1);
		$file1 = "assets/images/" . uniqid(time(), true) . ".png";
		$success1 = file_put_contents($file1, $data1);
		$img2 = $this->input->post('ttd2');
		$img2 = str_replace('data:image/png;base64,', '', $img2);
		$img2 = str_replace(' ', '+', $img2);
		$data2 = base64_decode($img2);
		$file2 = "assets/images/" . uniqid(time(), true) . ".png";
		$success2 = file_put_contents($file2, $data2);

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('hubungan', 'Hubungan', 'required');
		$this->form_validation->set_rules('tindakan', 'Tindakan', 'required');
		$this->form_validation->set_rules('alasan', 'Alasan ', 'required');
		$this->form_validation->set_rules('alt', 'Alternatif yang Diberikan', 'required');
		$this->form_validation->set_rules('tgl_tunda', 'Tanggal Tunda', 'required');
		$this->form_validation->set_rules('jam_tunda', 'Jam Tunda', 'required');
		$this->form_validation->set_rules('bts_tgl', 'Perkiraan Penundaan', 'required');
		$this->form_validation->set_rules('bts_jam', 'Jam Penundaan', 'required');

		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'nama' => $this->input->post('nama'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'alamat' => $this->input->post('alamat'),
				'hubungan' => $this->input->post('hubungan'),
				'tindakan' => $this->input->post('tindakan'),
				'alasan' => $this->input->post('alasan'),
				'alt' => $this->input->post('alt'),
				'tgl_tunda' => $this->input->post('tgl_tunda'),
				'jam_tunda' => $this->input->post('jam_tunda'),
				'bts_tgl' => $this->input->post('bts_tgl'),
				'bts_jam' => $this->input->post('bts_jam'),
				'ttd' => $file,
				'ttd1' => $file1,
				'ttd2' => $file2,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_penundaan_pelayanan_obat');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'nama' => form_error('nama'),
				'tgl_lahir' => form_error('tgl_lahir'),
				'alamat' => form_error('alamat'),
				'hubungan' => form_error('hubungan'),
				'tindakan' => form_error('tindakan'),
				'alasan' => form_error('alasan'),
				'alt' => form_error('alt'),
				'tgl_tunda' => form_error('tgl_tunda'),
				'jam_tunda' => form_error('jam_tunda'),
				'bts_tgl' => form_error('bts_tgl'),
				'bts_jam' => form_error('bts_jam'),

				// 'gambar' => form_error('gambar'),
			);
		}
		echo json_encode($out);
	}
	public function edit_penundaan_pelayanan()
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
		$img1 = $this->input->post('ttd1');
		$img1 = str_replace('data:image/png;base64,', '', $img1);
		$img1 = str_replace(' ', '+', $img1);
		$data1 = base64_decode($img1);
		$file1 = "assets/images/" . uniqid(time(), true) . ".png";
		$success1 = file_put_contents($file1, $data1);
		$img2 = $this->input->post('ttd2');
		$img2 = str_replace('data:image/png;base64,', '', $img2);
		$img2 = str_replace(' ', '+', $img2);
		$data2 = base64_decode($img2);
		$file2 = "assets/images/" . uniqid(time(), true) . ".png";
		$success2 = file_put_contents($file2, $data2);

		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'nama' => $this->input->post('nama'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'alamat' => $this->input->post('alamat'),
			'hubungan' => $this->input->post('hubungan'),
			'tindakan' => $this->input->post('tindakan'),
			'alasan' => $this->input->post('alasan'),
			'alt' => $this->input->post('alt'),
			'tgl_tunda' => $this->input->post('tgl_tunda'),
			'jam_tunda' => $this->input->post('jam_tunda'),
			'bts_tgl' => $this->input->post('bts_tgl'),
			'bts_jam' => $this->input->post('bts_jam'),
			'ttd' => $file,
			'ttd1' => $file1,
			'ttd2' => $file2,
			'tanggal' => $tgl,
			'staff' => $staff,
		);
		$where = array(
			'id_form_penundaan_pelayanan_obat' => $this->input->post('id')
		);

		$this->M_Erm->update($data,$where, 'form_penundaan_pelayanan_obat');
		$out['status'] = "success";

		echo json_encode($out);
	}
}
