<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_sebab_kematian extends CI_Controller
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
		$page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;
		$page_data['link'] = 'Erm_igd/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/sebab_kematian';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
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
		$page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;
		$page_data['link'] = 'Erm_poli/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/sebab_kematian';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_sebab_kematian($id_pelayanan, $id_history)
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
		$page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;
		$page_data['link'] = 'Erm_igd/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/sebab_kematian';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_sebab_kematian_raj($id_pelayanan, $id_history)
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
		$page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;
		$page_data['link'] = 'Erm_poli/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/sebab_kematian';
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
		$page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;
		$page_data['link'] = 'Erm_igd/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/sebab_kematian';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function riwayat_sebab_kematian($id_pelayanan, $id_history)
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
		$page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;
		$page_data['link'] = 'Erm_igd/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/sebab_kematian';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function insert_sebab_kematian()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$img = $this->input->post('gambar');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = "ttd/" . uniqid(time(), true) . ".png";
		$success = file_put_contents($file, $data);
		$this->form_validation->set_rules('sebab_a', 'Sebab A', 'required');
		$this->form_validation->set_rules('lama_a', 'Lama A', 'required');
		$this->form_validation->set_rules('sebab_b', 'Sebab B', 'required');
		$this->form_validation->set_rules('lama_b', 'Lama B', 'required');
		$this->form_validation->set_rules('sebab_2', 'Sebab II', 'required');
		$this->form_validation->set_rules('lama_2', 'Lama II', 'required');
		$this->form_validation->set_rules('ruda_paksa', 'Rudapaksa', 'required');
		$this->form_validation->set_rules('cara_rudapaksa', 'Cara Rudapaksa', 'required');
		$this->form_validation->set_rules('sifat_jejas', 'Sifat Jejas', 'required');
		$this->form_validation->set_rules('janin_mati', 'Janin Mati', 'required');
		$this->form_validation->set_rules('sebab_lahir_mati', 'Sebab Lahir Mati', 'required');
		$this->form_validation->set_rules('persalinan', 'Persalinan', 'required');
		$this->form_validation->set_rules('hamil', 'Hamil', 'required');
		$this->form_validation->set_rules('operasi', 'Operasi', 'required');
		$this->form_validation->set_rules('jenis_operasi', 'Jenis Operasi', 'required');
		$this->form_validation->set_rules('nama_terang', 'Nama Terang', 'required');
		//$this->form_validation->set_rules('gambar', 'Gambar', 'required');

		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'sebab_a' => $this->input->post('sebab_a'),
				'lama_a' => $this->input->post('lama_a'),
				'sebab_b' => $this->input->post('sebab_b'),
				'lama_b' => $this->input->post('lama_b'),
				'sebab_2' => $this->input->post('sebab_2'),
				'lama_2' => $this->input->post('lama_2'),
				'ruda_paksa' => $this->input->post('ruda_paksa'),
				'cara_rudapaksa' => $this->input->post('cara_rudapaksa'),
				'sifat_jejas' => $this->input->post('sifat_jejas'),
				'janin_mati' => $this->input->post('janin_mati'),
				'sebab_lahir_mati' => $this->input->post('sebab_lahir_mati'),
				'persalinan' => $this->input->post('persalinan'),
				'hamil' => $this->input->post('hamil'),
				'operasi' => $this->input->post('operasi'),
				'jenis_operasi' => $this->input->post('jenis_operasi'),
				'nama_terang' => $this->input->post('nama_terang'),
				'gambar' => $file,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_sebab_kematian');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'sebab_a' => form_error('sebab_a'),
				'lama_a' => form_error('lama_a'),
				'sebab_b' => form_error('sebab_b'),
				'lama_b' => form_error('lama_b'),
				'sebab_2' => form_error('sebab_2'),
				'lama_2' => form_error('lama_2'),
				'ruda_paksa' => form_error('ruda_paksa'),
				'cara_rudapaksa' => form_error('cara_rudapaksa'),
				'sifat_jejas' => form_error('sifat_jejas'),
				'janin_mati' => form_error('janin_mati'),
				'sebab_lahir_mati' => form_error('sebab_lahir_mati'),
				'persalinan' => form_error('persalinan'),
				'hamil' => form_error('hamil'),
				'operasi' => form_error('operasi'),
				'jenis_operasi' => form_error('jenis_operasi'),
				'nama_terang' => form_error('nama_terang'),
				// 'gambar' => form_error('gambar'),
			);
		}
		echo json_encode($out);
	}
	public function update_sebab_kematian()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$img = $this->input->post('gambar');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = "ttd/" . uniqid(time(), true) . ".png";
		$success = file_put_contents($file, $data);

		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'sebab_a' => $this->input->post('sebab_a'),
			'lama_a' => $this->input->post('lama_a'),
			'sebab_b' => $this->input->post('sebab_b'),
			'lama_b' => $this->input->post('lama_b'),
			'sebab_2' => $this->input->post('sebab_2'),
			'lama_2' => $this->input->post('lama_2'),
			'ruda_paksa' => $this->input->post('ruda_paksa'),
			'cara_rudapaksa' => $this->input->post('cara_rudapaksa'),
			'sifat_jejas' => $this->input->post('sifat_jejas'),
			'janin_mati' => $this->input->post('janin_mati'),
			'sebab_lahir_mati' => $this->input->post('sebab_lahir_mati'),
			'persalinan' => $this->input->post('persalinan'),
			'hamil' => $this->input->post('hamil'),
			'operasi' => $this->input->post('operasi'),
			'jenis_operasi' => $this->input->post('jenis_operasi'),
			'nama_terang' => $this->input->post('nama_terang'),
			'gambar' => $file,
			'tanggal' => $tgl,
			'staff' => $staff,
		);
		$where = array(
			'id_form_sebab_kematian' => $this->input->post('id')
		);
		$this->M_Erm->update($data,$where, 'form_sebab_kematian');
		$out['status'] = "success";
		echo json_encode($out);
	}
}
