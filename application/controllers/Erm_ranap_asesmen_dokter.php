<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_asesmen_dokter extends CI_Controller
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
	public function formasesmen($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history); // $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
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
		$page_data['gambar'] = base_url("assets/dist/img/status_lokalis.png");
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_anamnesis_pemeriksaan_fisik';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function formedit($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history); // $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
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
		$page_data['page_content'] = 'erm_form/Ranap_Edit/view_anamnesis_pemeriksaan_fisik';
		$page_data['gambar'] = base_url("assets/dist/img/status_lokalis.png");
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function insert_asses_dokter_ranap()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$img = $this->input->post('gambar');
		if ($img != "") {
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = "assets/images/" . uniqid(time(), true) . ".png";
			$success = file_put_contents($file, $data);
		} else {
			$file = "";
		}
		$img1 = $this->input->post('ttd');
		if ($img1 != "") {
			$img1 = str_replace('data:image/png;base64,', '', $img1);
			$img1 = str_replace(' ', '+', $img1);
			$data1 = base64_decode($img1);
			$file1 = "assets/images/" . uniqid(time(), true) . ".png";
			$success1 = file_put_contents($file1, $data1);
		} else {
			$file1 = "";
		}
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
		// if ($this->form_validation->run()) {
		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'riwayat_alergi' => $this->input->post('riwayat_alergi'),
			'keluhan_utama' => $this->input->post('keluhan'),
			'riwayat_sekarang' => $this->input->post('riwayat_sekarang'),
			'riwayat_dahulu' => $this->input->post('riwayat_dahulu'),
			'riwayat_menular' => $this->input->post('riwayat_menular'),
			'keadaan_sosial' => $this->input->post('keadaan_sosial'),
			'keadaan_fisik' => $this->input->post('keadaan_fisik'),

			// 'labor_mulai' => $this->input->post('mulai_labor'),
			// 'labor_selesai' => $this->input->post('selesai_labor'),
			// 'rontgen_mulai' => $this->input->post('mulai_rontgen'),
			// 'rontgen_selesai' => $this->input->post('selesai_rontgen'),
			// 'konsul_mulai' => $this->input->post('mulai_konsul'),
			// 'konsul_selesai' => $this->input->post('selesai_konsul'),
			// 'resep_mulai' => $this->input->post('mulai_resep'),
			// 'resep_selesai' => $this->input->post('selesai_resep'),
			// 'transfer_mulai' => $this->input->post('mulai_transfer'),
			// 'transfer_selesai' => $this->input->post('selesai_transfer'),

			'kepala' => $this->input->post('kepala'),
			'hidung' => $this->input->post('hidung'),
			'leher' => $this->input->post('leher'),
			'mulut' => $this->input->post('mulut'),
			'thorax' => $this->input->post('thorax'),
			'jantung' => $this->input->post('jantung'),
			'paru' => $this->input->post('paru'),
			'andomen' => $this->input->post('andomen'),
			'punggung' => $this->input->post('punggung'),
			'ekstremitas' => $this->input->post('ekstremitas'),
			'genetalia' => $this->input->post('genetalia'),

			'keterangan' => $this->input->post('keterangan'),
			'terapi' => $this->input->post('terapi'),
			// 'dokter_pemeriksa' => $this->input->post('dokter_pemeriksa'),
			// 'tanggal_pemeriksaan' => $this->input->post('tglpemeriksaan'),
			'konsul' => $this->input->post('konsul'),
			'lama' => $this->input->post('lama'),
			'prognosa' => $this->input->post('prognosa'),

			'gambar' => $file,
			'ttd' => $file1,
			'tanggal' => $tgl,
			'staff' => $staff,
		);
		// $data2 = array(
		// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
		// 	'id_history' => $this->input->post('id_history'),
		// 	'no_rm' => $this->input->post('no_rm'),
		// );
		$this->M_Erm->insert($data, 'form_ass_dokter_ranap');
		// $this->M_Erm->insert($data2, 'riwayat_erm_ranap');
		$out['status'] = "success";
		// } else {
		// 	$out = array(
		// 		'error'   => true,
		// 		'cara_masuk' => form_error('cara_masuk'),
		// 		'kondisi_masuk' => form_error('kondisi'),
		// 		'gcs' => form_error('gcs'),
		// 		'e' => form_error('e'),
		// 		'm' => form_error('m'),
		// 		'v' => form_error('v'),
		// 		'tekanan_darah' => form_error('tekanan_darah'),
		// 		'suhu' => form_error('suhu'),
		// 		'spo2' => form_error('spo2'),
		// 		'frequensi_nadi' => form_error('frequensi_nadi'),
		// 		'berat_badan' => form_error('berat_badan'),
		// 		'frequensi_nafas' => form_error('frequensi_nafas'),
		// 		'tinggi_badan' => form_error('tinggi_badan'),
		// 		'dokter_pemeriksa' => form_error('dokter_pemeriksa'),
		// 		'diagnosa_masuk' => form_error('diagnosa_masuk'),
		// 		'keluhan_utama' => form_error('keluhan_utama'),
		// 		'alergi_obat' => form_error('alergi_obat'),
		// 		'alergi' => form_error('alergi'),
		// 		'reaksi_utama' => form_error('reaksi_utama'),
		// 		'riwayat_merokok' => form_error('merokok'),
		// 		'riwayat_alkohol' => form_error('alkohol'),
		// 		'bab' => form_error('bab'),
		// 		'bak' => form_error('bak'),
		// 		'pemuka_agama' => form_error('pemuka_agama'),
		// 	);
		// }

		echo json_encode($out);
	}
	public function update_asses_dokter_ranap()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_ass_dokter_ranap', ['id_form' => $id])->row();

		$img = $this->input->post('gambar');
		if ($img != "") {
			if ($db->gambar != '') {
				$file_path = $db->gambar;
				if (file_exists($file_path)) {
					unlink($file_path); // Hapus file
				}
			}
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = "assets/images/" . uniqid(time(), true) . ".png";
			$success = file_put_contents($file, $data);
		} else {
			$file = "";
		}
		

		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'riwayat_alergi' => $this->input->post('riwayat_alergi'),
			'keluhan_utama' => $this->input->post('keluhan'),
			'riwayat_sekarang' => $this->input->post('riwayat_sekarang'),
			'riwayat_dahulu' => $this->input->post('riwayat_dahulu'),
			'riwayat_menular' => $this->input->post('riwayat_menular'),
			'keadaan_sosial' => $this->input->post('keadaan_sosial'),
			'keadaan_fisik' => $this->input->post('keadaan_fisik'),

			'kepala' => $this->input->post('kepala'),
			'hidung' => $this->input->post('hidung'),
			'leher' => $this->input->post('leher'),
			'mulut' => $this->input->post('mulut'),
			'thorax' => $this->input->post('thorax'),
			'jantung' => $this->input->post('jantung'),
			'paru' => $this->input->post('paru'),
			'andomen' => $this->input->post('andomen'),
			'punggung' => $this->input->post('punggung'),
			'ekstremitas' => $this->input->post('ekstremitas'),
			'genetalia' => $this->input->post('genetalia'),

			'keterangan' => $this->input->post('keterangan'),
			'terapi' => $this->input->post('terapi'),
			// 'dokter_pemeriksa' => $this->input->post('dokter_pemeriksa'),
			// 'tanggal_pemeriksaan' => $this->input->post('tglpemeriksaan'),
			'konsul' => $this->input->post('konsul'),
			'lama' => $this->input->post('lama'),
			'prognosa' => $this->input->post('prognosa'),

			// 'gambar' => $file,
			// 'ttd' => $file1,
			'tanggal' => $tgl,
			'staff' => $staff,
		);
		if ($file != '') {
			$data['gambar'] = $file;
		}

		// $this->M_Erm_ranap->update_ass_dokter($data, 'form_ass_dokter_ranap');
		$this->M_Erm_ranap->update_ass_dokter($id, $data);
		$out['status'] = "success";


		echo json_encode($out);
	}
	public function get_ass_per_ranap()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_ass_per_ranap', ['id_pelayanan' => $id])->result();
		if (count($db) > 0) {
			$db = $db[0];
			$db->status_dt = 'found';
		} else {
			$db = null;
			$db['status_dt'] = 'not found';
		}
		echo json_encode($db);
	}
	// public function get_ass_dok()
	// {
	// 	$id = $this->input->post('id');
	// 	$db = $this->db->get_where('form_ass_dokter_ranap', ['id_history' => $id])->result();
	// 	if (count($db) > 0) {
	// 		$db = $db[0];
	// 		$db->status_dt = 'found';
	// 	} else {
	// 		$db = null;
	// 		$db['status_dt'] = 'not found';
	// 	}
	// 	echo json_encode($db);
	// }
	public function get_ass_dok()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_ass_dokter_ranap', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	function hapus_data_diagnosa()
	{
		$id = $this->input->post('id');
		$where = array(
			'no_diagnosa' => $id,
		);
		$this->M_Erm->delete($where, 'diagnosa_utama');
		$out['status'] = "success";
		echo json_encode($out);
	}
	function hapus_data_diagnosa1()
	{
		$id = $this->input->post('id');
		$where = array(
			'no_diagnosa' => $id,
		);
		$this->M_Erm->delete($where, 'erm_diagnosa_dokter');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function tampil_list_diagnosa_ranap()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm->selectDataDiagnosaByIdPel($id_pelayanan);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {

			// $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
			$tombol = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa1(\"" . $page_data[$i]->no_diagnosa . "\")' '><i class='fa fa-trash '></i></button>";


			$nama_dokter = $page_data[$i]->no_diagnosa;
			$kode = $page_data[$i]->kode;
			$nama_diagnosa = $page_data[$i]->nama_diagnosa;
			$tombol = $tombol;



			$out[$i] = array($nama_dokter, $kode, $nama_diagnosa, $tombol);
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
	public function tampil_list_diagnosa1()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->db->query("SELECT * from diagnosa_utama where id_history='$id_pelayanan'")->result();

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {

			// $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
			$tombol = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->no_diagnosa . "\")' '><i class='fa fa-trash '></i></button>";


			$nama_dokter = $page_data[$i]->no_diagnosa;
			$kode = $page_data[$i]->kode;
			$nama_diagnosa = $page_data[$i]->nama_diagnosa;
			$tombol = $tombol;



			$out[$i] = array($nama_dokter, $kode, $nama_diagnosa, $tombol);
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
