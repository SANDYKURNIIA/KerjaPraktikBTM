<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_resume_medis extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_IGD');
		$this->load->model('M_Erm');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Assembling');
		$this->load->model('M_Poli');
		$this->load->model('M_Pencarian_Pasien');
		$this->load->model('M_Erm_ranap');


		$this->load->model('M_Resume_medis');
	}
	// public function delete($id)
	// {
	// 	// Panggil model dan fungsi untuk menghapus data
	// 	$this->load->model('M_Resume_medis');
	// 	$result = $this->M_Resume_medis->delete_data($id);

	// 	if ($result) {
	// 		// Jika penghapusan berhasil, kirimkan respons sukses
	// 		echo json_encode(array('status' => 'success', 'message' => 'Data berhasil dihapus.'));
	// 	} else {
	// 		// Jika penghapusan gagal, kirimkan respons gagal
	// 		echo json_encode(array('status' => 'error', 'message' => 'Gagal menghapus data.'));
	// 	}
	// }

	// public function edit($id)
	// {
	// 	// Mengambil data yang akan diubah dari model
	// 	$data_to_edit = $this->M_Resume_medis->getDataMedisById($id);

	// 	if (!$data_to_edit) {
	// 		// Tampilkan pesan jika data tidak ditemukan
	// 		echo 'Data tidak ditemukan';
	// 		return;
	// 	}

	// 	// Kirim data ke halaman edit_data.php
	// 	$data = array('data_to_edit' => $data_to_edit);
	// 	$this->load->view('erm_form/Ranap/view_edit_resume_medis', $data);
	// }


	// public function insert_data_pasien()
	// {
	// 	$this->load->model('M_Resume_medis');

	// 	// Mendapatkan data dari formulir (pastikan nama input sesuai dengan nama field dalam tabel)
	// 	$data = array(
	// 		'id_pelayanan' => $this->input->post('id_pelayanan'),
	// 		'DPJP1' => $this->input->post('dpjp1'),
	// 		'DPJP2' => $this->input->post('dpjp2'),
	// 		'DPJP3' => $this->input->post('dpjp3'),
	// 		'DPJP4' => $this->input->post('dpjp4'),
	// 		'Tanggal_Keluar' => $this->input->post('tanggal_keluar'),
	// 		'ruang_Rawat' => $this->input->post('ruang_rawat'),
	// 		'kelas' => $this->input->post('kelas'),
	// 		'riwayat_Alergi' => $this->input->post('riwayat_alergi'),
	// 		'keterangan' => $this->input->post('keterangan'),
	// 		'alasan_Indikasi_Masuk' => $this->input->post('alasan_indikasi_masuk'),
	// 		'Riwayat_Singkat_fisik' => $this->input->post('riwayat_singkat_fisik'),
	// 		'Pemeriksaan_Penunjang_Diagnostik' => $this->input->post('pemeriksaan_penunjang_diagnostik'),
	// 		'Diagnosa_Masuk' => $this->input->post('diagnosa_masuk'),
	// 		'Diagnosa_Keluar' => $this->input->post('diagnosa_keluar'),
	// 		'Prosedur_Pembedahan_Tindakan' => $this->input->post('prosedur_pembedahan_tindakan'),
	// 		'Keadaan_Waktu_Pulang' => $this->input->post('keadaan_waktu_pulang'),
	// 		'Alasan_Pulang' => $this->input->post('alasan_pulang'),
	// 		'Kesadaran' => $this->input->post('kesadaran'),
	// 		'Poliklinik' => $this->input->post('poliklinik'),
	// 		'Tanggal_Keluar_RS' => $this->input->post('tanggal_keluar_rs'),
	// 		'Selama_Dirumah' => $this->input->post('selama_dirumah'),
	// 		'Selama_Dirumah_Sakit' => $this->input->post('selama_dirumah_sakit')
	// 	);

	// 	// Memanggil fungsi model untuk memasukkan data ke dalam database
	// 	$this->M_Resume_medis->insert_data_pasien($data);
	// }



	public function formresume($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');
		$page_data['id_staff'] = $staff->id_staff;
		$page_data['nama'] = $selectPasien->nama;
		$page_data['pasien'] = $selectPasien;
		// $page_data['no_hp'] = $selectPasien->no_hp;
		// $page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['kelas'] = $selectPasien->kelas;
		$page_data['nama_ruangan'] = $selectPasien->nama_ruangan;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['dokter'] = $this->M_Resume_medis->getAktifDokter();
		$page_data['poli'] = $this->M_Resume_medis->getBukaPoli();
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();

		// Memanggil method getDataDokter dari model Dokter_model


		$page_data['per'] = empty($asses_per_igd) ? null : $asses_per_igd;
		$asses_dokter_igd = $this->M_Erm_poli->checkData($id_history, 'form_assesmen_dokter');
		$diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_pelayanan='$id_pelayanan'")->row_array();

		$page_data['diagnosa_utama'] = $diagnosa1;
		$page_data['dok'] = empty($asses_dokter_igd) ? null : $asses_dokter_igd;
		$page_data['form_perawat'] = $this->db->get_where('form_assesmen_awal_rajal', ['id_pelayanan' => $id_pelayanan])->row();
		$page_data['form_dokter'] = $this->db->get_where('form_assesmen_dokter', ['id_pelayanan' => $id_pelayanan])->row();

		// Kemudian, Anda dapat mengirimkan data ini ke view atau melakukan hal lain sesuai kebutuhan
		// $this->load->view('erm_form/Ranap/view_data_dokter_aktif', $data);

		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;


		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_resume_medis';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function store()
	{
		$this->load->model('M_Resume_medis');
		$id_pelayanan = $this->input->post('id_pelayanan');
		$existing_data = $this->M_Resume_medis->CekId($id_pelayanan);

		// Mendapatkan data dari formulir (pastikan nama input sesuai dengan nama field dalam tabel)
		$data = array(
			'id_staff' => $this->input->post('id_staff'),
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'namas' => $this->input->post('namas'),
			'tanggal_masuk' => $this->input->post('tanggal_masuk'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'no_rm' => $this->input->post('no_rm'),
			'kelamin' => $this->input->post('kelamin'),
			'dpjp1' => $this->input->post('dpjp1'),
			'dpjp2' => $this->input->post('dpjp2'),
			'dpjp3' => $this->input->post('dpjp3'),
			'dpjp4' => $this->input->post('dpjp4'),
			'tanggal_keluar' => $this->input->post('tanggal_keluar'),
			'ruang_rawat' => $this->input->post('ruang_rawat'),
			'kelas' => $this->input->post('kelas'),
			'riwayat_alergi' => $this->input->post('riwayat_alergi'),
			'keterangan' => $this->input->post('keterangan'),
			'alasan_indikasi_masuk' => $this->input->post('alasan_indikasi_masuk'),
			'riwayat_singkat_fisik' => $this->input->post('riwayat_singkat_fisik'),
			'pemeriksaan_penunjang_diagnostik' => $this->input->post('pemeriksaan_penunjang_diagnostik'),
			'diagnosa_masuk' => $this->input->post('diagnosa_masuk'),
			'diagnosa_keluar' => $this->input->post('diagnosa_keluar'),
			'prosedur_pembedahan_tindakan' => $this->input->post('prosedur_pembedahan_tindakan'),
			'keadaan_waktu_pulang' => $this->input->post('keadaan_waktu_pulang'),
			'alasan_pulang' => $this->input->post('alasan_pulang'),
			'kesadaran' => $this->input->post('kesadaran'),
			'TD' => $this->input->post('TD'),
			'TEMP' => $this->input->post('TEMP'),
			'RR' => $this->input->post('RR'),
			'HR' => $this->input->post('HR'),
			'SP02' => $this->input->post('SP02'),
			'poliklinik' => $this->input->post('poliklinik'),
			'tanggal_keluar_rs' => $this->input->post('tanggal_keluar_rs'),
			'selama_dirumah' => $this->input->post('selama_dirumah'),
			'selama_dirumah_sakit' => $this->input->post('selama_dirumah_sakit')
		);

		if ($existing_data) {
			// Data sudah ada, gunakan perintah update
			$this->M_Resume_medis->update_data_pasien($id_pelayanan, $data);
		} else {
			// Data belum ada, gunakan perintah insert
			$this->M_Resume_medis->insert_data_pasien($data);
		}
	}

	public function c_formresume($id)
	{
		$id = $this->uri->segment(3);
		$page_data['records'] = $this->M_Resume_medis->Get_id($id);
		// $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		// $staff = $this->session->userdata('data_auth');

		// $page_data['nama'] = $selectPasien->nama;
		// $page_data['no_hp'] = $selectPasien->no_hp;
		// $page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		// $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		// $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		// $page_data['cara_bayar'] = $selectPasien->cara_bayar;
		// $page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		// $page_data['staff'] = $staff->id_staff;
		// $page_data['no_rm'] = $selectPasien->no_rm;
		// $page_data['id_pelayanan'] = $id_pelayanan;
		// $page_data['id_history'] = $id_history;
		// $page_data['agama'] = $selectPasien->agama;
		// $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		// // Memanggil method getDataDokter dari model Dokter_model
		// $data['dokterOptions'] = $this->Dokter_model->getDokterOptions();

		// Kemudian, Anda dapat mengirimkan data ini ke view atau melakukan hal lain sesuai kebutuhan
		$this->load->view('erm_form/Ranap/view_data_resume_medis', $page_data);

		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;


		// $this->load->view('assets/_header');
		// $page_data['page_content'] = 'erm_form/Ranap/view_data_resume_medis';
		// $this->load->view('Main', $page_data);
		// $this->load->view('assets/_footer');
	}

	// public function edit_imd($id_pelayanan, $id_history)
	// {
	// 	$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
	// 	$selectPasien2 = $this->M_Erm_ranap->selectDataImd($id_pelayanan, $id_history);
	// 	$staff = $this->session->userdata('data_auth');

	// 	$page_data['nama'] = $selectPasien->nama;
	// 	$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
	// 	$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
	// 	$page_data['cara_bayar'] = $selectPasien->cara_bayar;
	// 	$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
	// 	$page_data['staff'] = $staff->id_staff;
	// 	$page_data['no_rm'] = $selectPasien->no_rm;
	// 	$page_data['id_pelayanan'] = $id_pelayanan;
	// 	$page_data['id_history'] = $id_history;
	// 	$page_data['agama'] = $selectPasien->agama;
	// 	$page_data['keluhan'] = $selectPasien->keluhan;
	// 	$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
	// 	$page_data['jenis_persalinan'] = $selectPasien2->jenis_persalinan;

	// 	$this->load->view('assets/_header');
	// 	$page_data['page_content'] = 'erm_form/Ranap_Edit/view_imd_asi';
	// 	$this->load->view('Main', $page_data);
	// 	$this->load->view('assets/_footer');
	// }
	// public function insert_imd_asi()
	// {
	// 	$data = $this->session->userdata('data_auth');
	// 	$tgl = date("Y-m-d h:i:s");
	// 	$staff = $data->id_staff;
	// 	$img = $this->input->post('ttd');
	// 	$img = str_replace('data:image/png;base64,', '', $img);
	// 	$img = str_replace(' ', '+', $img);
	// 	$data = base64_decode($img);
	// 	$file = "assets/images/" . uniqid(time(), true) . ".png";
	// 	$success = file_put_contents($file, $data);
	// 	$img1 = $this->input->post('ttd1');
	// 	$img1 = str_replace('data:image/png;base64,', '', $img1);
	// 	$img1 = str_replace(' ', '+', $img1);
	// 	$data1 = base64_decode($img1);
	// 	$file1 = "assets/images/" . uniqid(time(), true) . ".png";
	// 	$success1 = file_put_contents($file1, $data1);
	// 	$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
	// 	$this->form_validation->set_rules('jam_lahir', 'Waktu Selesai', 'required');
	// 	$this->form_validation->set_rules('jenis_persalinan', 'Jenis Persalinan', 'required');
	// 	$this->form_validation->set_rules('waktu_mulai', 'Waktu Mulai', 'required');
	// 	$this->form_validation->set_rules('waktu_selesai', 'Waktu Selesai', 'required');
	// 	$this->form_validation->set_rules('lama_kontak', 'Lama Kontak', 'required');
	// 	$this->form_validation->set_rules('menyusui1', 'Bayi Menyusui Pertama', 'required');
	// 	$this->form_validation->set_rules('menyusui2', 'Bayi Menyusui Kedua', 'required');
	// 	$this->form_validation->set_rules('catatan', 'Catatan', 'required');
	// 	$this->form_validation->set_rules('alasan', 'Alasan', 'required');
	// 	$this->form_validation->set_rules('kontak', 'Kontak', 'required');
	// 	if ($this->form_validation->run()) {
	// 		$data = array(
	// 			'id_pelayanan' => $this->input->post('id_pelayanan'),
	// 			'id_history' => $this->input->post('id_history'),
	// 			'no_rm' => $this->input->post('no_rm'),
	// 			'nama_ibu' => $this->input->post('nama_ibu'),
	// 			'no_rm' => $this->input->post('no_rm'),
	// 			'jenis_persalinan' => $this->input->post('jenis_persalinan'),
	// 			'pervagina' => $this->input->post('pervagina'),
	// 			'caesaria' => $this->input->post('sectio'),
	// 			'jam_lahir' => $this->input->post('jam_lahir'),
	// 			'waktu_mulai' => $this->input->post('waktu_mulai'),
	// 			'waktu_selesai' => $this->input->post('waktu_selesai'),
	// 			'kontak_kulit' => $this->input->post('kontak'),
	// 			'lama_kontak' => $this->input->post('lama_kontak'),
	// 			'bayi_menyusui' => $this->input->post('menyusui1'),
	// 			'menolong' => $this->input->post('menyusui2'),
	// 			'alasan' => $this->input->post('alasan'),
	// 			'catatan' => $this->input->post('catatan'),
	// 			'ttd' => $file,
	// 			'ttd1' => $file1,
	// 			'tanggal' => $tgl,
	// 			'staff' => $staff,
	// 		);
	// 		// $data2 = array(
	// 		// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
	// 		// 	'id_history' => $this->input->post('id_history'),
	// 		// 	'no_rm' => $this->input->post('no_rm'),
	// 		// );
	// 		$this->M_Erm_ranap->insert($data, 'imd_asi_eksklusif');
	// 		// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
	// 		$out['status'] = "success";
	// 	} else {
	// 		$out = array(
	// 			'error'   => true,
	// 			'nama_ibu' => form_error('nama_ibu'),
	// 			'jam_lahir' => form_error('jam_lahir'),
	// 			'waktu_mulai' => form_error('waktu_mulai'),
	// 			'waktu_selesai' => form_error('waktu_selesai'),
	// 			'jenis_persalinan' => form_error('jenis_persalinan'),
	// 			'lama_kontak' => form_error('lama_kontak'),
	// 			'kontak' => form_error('kontak'),
	// 			'bayi_menyusui' => form_error('menyusui1'),
	// 			'menolong' => form_error('menyusui2'),
	// 			'catatan' => form_error('catatan'),
	// 			'alasan' => form_error('alasan'),
	// 		);
	// 	}
	// 	echo json_encode($out);
	// }

	// public function update_imd_asi()
	// {
	// 	$data = $this->session->userdata('data_auth');
	// 	$tgl = date("Y-m-d h:i:s");
	// 	$staff = $data->id_staff;
	// 	$id = $this->input->post('id');
	// 	$img = $this->input->post('ttd');
	// 	$img = str_replace('data:image/png;base64,', '', $img);
	// 	$img = str_replace(' ', '+', $img);
	// 	$data = base64_decode($img);
	// 	$file = "assets/images/" . uniqid(time(), true) . ".png";
	// 	$success = file_put_contents($file, $data);
	// 	$img1 = $this->input->post('ttd1');
	// 	$img1 = str_replace('data:image/png;base64,', '', $img1);
	// 	$img1 = str_replace(' ', '+', $img1);
	// 	$data1 = base64_decode($img1);
	// 	$file1 = "assets/images/" . uniqid(time(), true) . ".png";
	// 	$success1 = file_put_contents($file1, $data1);
	// 	$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
	// 	$this->form_validation->set_rules('jam_lahir', 'Waktu Selesai', 'required');
	// 	$this->form_validation->set_rules('waktu_mulai', 'Waktu Mulai', 'required');
	// 	$this->form_validation->set_rules('waktu_selesai', 'Waktu Selesai', 'required');
	// 	$this->form_validation->set_rules('lama_kontak', 'Lama Kontak', 'required');
	// 	$this->form_validation->set_rules('menyusui1', 'Bayi Menyusui Pertama', 'required');
	// 	$this->form_validation->set_rules('menyusui2', 'Bayi Menyusui Kedua', 'required');
	// 	$this->form_validation->set_rules('catatan', 'Catatan', 'required');
	// 	$this->form_validation->set_rules('alasan', 'Alasan', 'required');
	// 	if ($this->form_validation->run()) {
	// 		$data = array(
	// 			'id_pelayanan' => $this->input->post('id_pelayanan'),
	// 			'id_history' => $this->input->post('id_history'),
	// 			'no_rm' => $this->input->post('no_rm'),
	// 			'nama_ibu' => $this->input->post('nama_ibu'),
	// 			'no_rm' => $this->input->post('no_rm'),
	// 			'jenis_persalinan' => $this->input->post('jenis_persalinan'),
	// 			'pervagina' => $this->input->post('pervagina'),
	// 			'caesaria' => $this->input->post('sectio'),
	// 			'jam_lahir' => $this->input->post('jam_lahir'),
	// 			'waktu_mulai' => $this->input->post('waktu_mulai'),
	// 			'waktu_selesai' => $this->input->post('waktu_selesai'),
	// 			'kontak_kulit' => $this->input->post('kontak'),
	// 			'lama_kontak' => $this->input->post('lama_kontak'),
	// 			'bayi_menyusui' => $this->input->post('menyusui1'),
	// 			'menolong' => $this->input->post('menyusui2'),
	// 			'alasan' => $this->input->post('alasan'),
	// 			'catatan' => $this->input->post('catatan'),
	// 			'ttd' => $file,
	// 			'ttd1' => $file1,
	// 			'tanggal' => $tgl,
	// 			'staff' => $staff,
	// 		);

	// 		$this->M_Erm_ranap->update_imd_asi($id, $data);
	// 		$out['status'] = "success";
	// 	} else {
	// 		$out = array(
	// 			'error'   => true,
	// 			'nama_ibu' => form_error('nama_ibu'),
	// 			'jam_lahir' => form_error('jam_lahir'),
	// 			'waktu_mulai' => form_error('waktu_mulai'),
	// 			'waktu_selesai' => form_error('waktu_selesai'),
	// 			'lama_kontak' => form_error('lama_kontak'),
	// 			'bayi_menyusui' => form_error('menyusui1'),
	// 			'menolong' => form_error('menyusui2'),
	// 			'catatan' => form_error('catatan'),
	// 			'alasan' => form_error('alasan'),
	// 		);
	// 	}
	// 	echo json_encode($out);
	// }
	public function get_ass_per()
	{
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
