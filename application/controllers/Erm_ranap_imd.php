<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_imd extends CI_Controller
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
    public function formimdasi($id_pelayanan, $id_history)
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


		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_imd_asi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_imd($id_pelayanan,$id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$selectPasien2 = $this->M_Erm_ranap->selectDataImd($id_pelayanan, $id_history);
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
		$page_data['jenis_persalinan'] = $selectPasien2->jenis_persalinan;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap_Edit/view_imd_asi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function insert_imd_asi()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
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
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
		$this->form_validation->set_rules('jam_lahir', 'Waktu Selesai', 'required');
		$this->form_validation->set_rules('jenis_persalinan', 'Jenis Persalinan', 'required');
		$this->form_validation->set_rules('waktu_mulai', 'Waktu Mulai', 'required');
		$this->form_validation->set_rules('waktu_selesai', 'Waktu Selesai', 'required');
		$this->form_validation->set_rules('lama_kontak', 'Lama Kontak', 'required');
		$this->form_validation->set_rules('menyusui1', 'Bayi Menyusui Pertama', 'required');
		$this->form_validation->set_rules('menyusui2', 'Bayi Menyusui Kedua', 'required');
		$this->form_validation->set_rules('catatan', 'Catatan', 'required');
		$this->form_validation->set_rules('alasan', 'Alasan', 'required');
		$this->form_validation->set_rules('kontak', 'Kontak', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'no_rm' => $this->input->post('no_rm'),
				'jenis_persalinan' => $this->input->post('jenis_persalinan'),
				'pervagina' => $this->input->post('pervagina'),
				'caesaria' => $this->input->post('sectio'),
				'jam_lahir' => $this->input->post('jam_lahir'),
				'waktu_mulai' => $this->input->post('waktu_mulai'),
				'waktu_selesai' => $this->input->post('waktu_selesai'),
				'kontak_kulit' => $this->input->post('kontak'),
				'lama_kontak' => $this->input->post('lama_kontak'),
				'bayi_menyusui' => $this->input->post('menyusui1'),
				'menolong' => $this->input->post('menyusui2'),
				'alasan' => $this->input->post('alasan'),
				'catatan' => $this->input->post('catatan'),
				'ttd' => $file,
				'ttd1' => $file1,
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_ranap->insert($data, 'imd_asi_eksklusif');
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'nama_ibu' => form_error('nama_ibu'),
				'jam_lahir' => form_error('jam_lahir'),
				'waktu_mulai' => form_error('waktu_mulai'),
				'waktu_selesai' => form_error('waktu_selesai'),
				'jenis_persalinan' => form_error('jenis_persalinan'),
				'lama_kontak' => form_error('lama_kontak'),
				'kontak' => form_error('kontak'),
				'bayi_menyusui' => form_error('menyusui1'),
				'menolong' => form_error('menyusui2'),
				'catatan' => form_error('catatan'),
				'alasan' => form_error('alasan'),
			);
		}
		echo json_encode($out);
	}
	public function update_imd_asi()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$id = $this->input->post('id');
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
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
		$this->form_validation->set_rules('jam_lahir', 'Waktu Selesai', 'required');
		$this->form_validation->set_rules('waktu_mulai', 'Waktu Mulai', 'required');
		$this->form_validation->set_rules('waktu_selesai', 'Waktu Selesai', 'required');
		$this->form_validation->set_rules('lama_kontak', 'Lama Kontak', 'required');
		$this->form_validation->set_rules('menyusui1', 'Bayi Menyusui Pertama', 'required');
		$this->form_validation->set_rules('menyusui2', 'Bayi Menyusui Kedua', 'required');
		$this->form_validation->set_rules('catatan', 'Catatan', 'required');
		$this->form_validation->set_rules('alasan', 'Alasan', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'no_rm' => $this->input->post('no_rm'),
				'jenis_persalinan' => $this->input->post('jenis_persalinan'),
				'pervagina' => $this->input->post('pervagina'),
				'caesaria' => $this->input->post('sectio'),
				'jam_lahir' => $this->input->post('jam_lahir'),
				'waktu_mulai' => $this->input->post('waktu_mulai'),
				'waktu_selesai' => $this->input->post('waktu_selesai'),
				'kontak_kulit' => $this->input->post('kontak'),
				'lama_kontak' => $this->input->post('lama_kontak'),
				'bayi_menyusui' => $this->input->post('menyusui1'),
				'menolong' => $this->input->post('menyusui2'),
				'alasan' => $this->input->post('alasan'),
				'catatan' => $this->input->post('catatan'),
				'ttd' => $file,
				'ttd1' => $file1,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm_ranap->update_imd_asi($id,$data);
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'nama_ibu' => form_error('nama_ibu'),
				'jam_lahir' => form_error('jam_lahir'),
				'waktu_mulai' => form_error('waktu_mulai'),
				'waktu_selesai' => form_error('waktu_selesai'),
				'lama_kontak' => form_error('lama_kontak'),
				'bayi_menyusui' => form_error('menyusui1'),
				'menolong' => form_error('menyusui2'),
				'catatan' => form_error('catatan'),
				'alasan' => form_error('alasan'),
			);
		}
		echo json_encode($out);
	}
	public function get_ass_per(){
		$id = $this->input->post('id');
		$db = $this->db->get_where('imd_asi_eksklusif', ['id_history' => $id])->row_array();
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
