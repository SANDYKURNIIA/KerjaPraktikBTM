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
		$page_data['dokter'] = $this->M_Erm->get_dokter_spes();
		

		$page_data['staff'] = $this->db->where('tipe', 'igd')
			->where('status', 'aktif')
			->order_by('nama', 'ASC')
			->get('staff')
			->result();

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


		$asses_triase_ugd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_triase_ugd');
		$page_data['data'] = empty($asses_triase_ugd) ? null : $asses_triase_ugd;
		$page_data['dokter'] = $this->M_Erm->get_dokter_spes();
		$page_data['username_login'] = $staff->nama; 
		if (!empty($asses_triase_ugd) && is_object($asses_triase_ugd)) {
    	$dbdokter = $this->db->get_where(
        'dokter',
        ['nama' => $asses_triase_ugd->dokter_verif]
    	)->row();
		} else {
   		$dbdokter = null; // tidak error & tidak tampil notice
		}

		$page_data['dbdokter'] = $dbdokter;


		// $page_data ['dokter'] = $page_data[$i]->dokter_verif;
		// $auth = $this->session->userdata('data_auth');
		// $page_data ['username'] = $auth->username;

		$page_data['staff'] = $this->db->where('tipe', 'igd')
			->where('status', 'aktif')
			->order_by('nama', 'ASC')
			->get('staff')
			->result();


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
		$this->form_validation->set_rules('cara_datang', 'Cara Datang', 'required');
		$this->form_validation->set_rules('alat_bantu', 'Alat Bantu', 'required');
		$this->form_validation->set_rules('kasus', 'kasus', 'required');
		$this->form_validation->set_rules('status_hamil', 'Status Hamil');
		$this->form_validation->set_rules('hamil_g', 'G');
		$this->form_validation->set_rules('hamil_p', 'P');
		$this->form_validation->set_rules('hamil_a', 'A');
		$this->form_validation->set_rules('hamil_minggu', 'Hamil Minggu');
		$this->form_validation->set_rules('gcs', 'GCS', 'required');
		$this->form_validation->set_rules('e', 'E', 'required');
		$this->form_validation->set_rules('m', 'M', 'required');
		$this->form_validation->set_rules('v', 'V', 'required');
		$this->form_validation->set_rules('risiko_jatuh', 'Risiko Jatuh', 'required');
		$this->form_validation->set_rules('pRujuk', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('keluhan_utama', 'Keluhan Utama', 'required');
		$this->form_validation->set_rules('tekanan_darah', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('suhu', 'Suhu', 'required');
		$this->form_validation->set_rules('spo2', 'SPo2', 'required');
		$this->form_validation->set_rules('frequensi_nadi', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('frequensi_nafas', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('airway', 'airway', 'required');
		$this->form_validation->set_rules('breathing', 'breathing', 'required');
		$this->form_validation->set_rules('cyrculation', 'cyrculation', 'required');
		$this->form_validation->set_rules('disability', 'disability', 'required');
		$this->form_validation->set_rules('skala_nyeri', 'Skala Nyeri', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori Triase', 'required');
		$this->form_validation->set_rules('nama_staff', 'Nama Staff', 'required');
		$this->form_validation->set_rules('skala_nyeri', 'Skala Nyeri', 'required');
		if ($this->form_validation->run()) {
			$verif_input = $this->input->post('verif');
			$verif_value = ($verif_input === 'Ya') ? 'Belum' : 'Tidak';
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'cara_datang' => $this->input->post('cara_datang'),
				'alat_bantu'  => $this->input->post('alat_bantu'),
				'kasus'  => $this->input->post('kasus'),
				'status_hamil' => $this->input->post('status_hamil'),
				'hamil_g' => $this->input->post('hamil_g'),
				'hamil_p' => $this->input->post('hamil_p'),
				'hamil_a' => $this->input->post('hamil_a'),
				'hamil_minggu' => $this->input->post('hamil_minggu'),
				'gcs' => $this->input->post('gcs'),
				'e' => $this->input->post('e'),
				'm' => $this->input->post('m'),
				'v' => $this->input->post('v'),
				'risiko_jatuh' => $this->input->post('risiko_jatuh'),
				'no_rm' => $this->input->post('no_rm'),
				'pRujuk' => $this->input->post('pRujuk'),
				'keluhan_utama' => $this->input->post('keluhan_utama'),
				'gcs' => $this->input->post('gcs'),
				'tekanan_darah' => $this->input->post('tekanan_darah'),
				'suhu' => $this->input->post('suhu'),
				'spo2' => $this->input->post('spo2'),
				'frequensi_nadi' => $this->input->post('frequensi_nadi'),
				'frequensi_nafas' => $this->input->post('frequensi_nafas'),
				'airway' => $this->input->post('airway'),
				'breathing' => $this->input->post('breathing'),
				'cyrculation' => $this->input->post('cyrculation'),
				'disability' => $this->input->post('disability'),
				'skala_nyeri' => $this->input->post('skala_nyeri'),
				'kategori' => $this->input->post('kategori'),
				'nama_staff' => $this->input->post('nama_staff'),
	
				'skor_nyeri' => $this->input->post('skor_nyeri'),
				'verif' => $verif_value,
				'tgl_verif' => $this->input->post('tgl_verifikasi'),
				'dokter_verif' => $this->input->post('nama_dokter'),
				'tanggal' => date("Y-m-d H:i:s"),
				'staff' => $this->session->userdata('data_auth')->id_staff,
			);

			// Modifikasi di sini: Dapatkan ID yang baru di-insert
			$insert_id = $this->M_Erm->insert_and_get_id($data, 'form_ass_triase_ugd');
			if ($insert_id) {
				$out['status'] = "success";
				$out['id'] = $insert_id;
			} else {
				$out['status'] = "error";
				$out['message'] = "Gagal menyimpan data.";
			}
		} else {
			$out = array(
				'error' => true,
				'cara_datang' => form_error('cara_datang'),
				'alat_bantu' => form_error('alat_bantu'),
				'kasus' => form_error('kasus'),
				'status_hamil' => form_error('status_hamil'),
				'hamil_g' => form_error('hamil_g'),
				'hamil_p' => form_error('hamil_p'),
				'hamil_a' => form_error('hamil_a'),
				'hamil_minggu' => form_error('hamil_minggu'),
				'gcs' => form_error('gcs'),
				'e' => form_error('e'),
				'm' => form_error('m'),
				'v' => form_error('v'),
				'risiko_jatuh' => form_error('risiko_jatuh'),
				'pRujuk' => form_error('pRujuk'),
				'keluhan_utama' => form_error('keluhan_utama'),
				'tekanan_darah' => form_error('tekanan_darah'),
				'suhu' => form_error('suhu'),
				'spo2' => form_error('spo2'),
				'frequensi_nadi' => form_error('frequensi_nadi'),
				'frequensi_nafas' => form_error('frequensi_nafas'),
				'airway' => form_error('airway'),
				'breathing' => form_error('breathing'),
				'cyrculation' => form_error('cyrculation'),
				'disability' => form_error('disability'),
				'skala_nyeri' => form_error('skala_nyeri'),
				'kategori_error' => form_error('kategori'),
				'nama_staff' => form_error('nama_staff'),
				'verif' => form_error('verif'),
				'tgl_verif' => form_error('tgl_verif'),
				'dokter_verif' => form_error('nama_dokter'),
			);
		}

		echo json_encode($out);
	}

	public function update_asses_triase_ugd()
	{
		$id_triase_ugd = $this->input->post('id');
		$this->form_validation->set_rules('cara_datang', 'Cara Datang', 'required');
		$this->form_validation->set_rules('alat_bantu', 'Alat Bantu', 'required');
		$this->form_validation->set_rules('kasus', 'Kasus', 'required');
		$this->form_validation->set_rules('gcs', 'GCS', 'required');
		$this->form_validation->set_rules('e', 'E', 'required');
		$this->form_validation->set_rules('m', 'M', 'required');
		$this->form_validation->set_rules('v', 'V', 'required');
		$this->form_validation->set_rules('risiko_jatuh', 'Risiko Jatuh', 'required');
		$this->form_validation->set_rules('pRujuk', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('keluhan_utama', 'Keluhan Utama', 'required');
		$this->form_validation->set_rules('tekanan_darah', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('suhu', 'Suhu', 'required');
		$this->form_validation->set_rules('spo2', 'SPo2', 'required');
		$this->form_validation->set_rules('frequensi_nadi', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('frequensi_nafas', 'Frequensi Nafas', 'required');
		$this->form_validation->set_rules('airway', 'Airway', 'required');
		$this->form_validation->set_rules('breathing', 'Breathing', 'required');
		$this->form_validation->set_rules('cyrculation', 'Cyrculation', 'required');
		$this->form_validation->set_rules('disability', 'Disability', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori Triase', 'required');
		$this->form_validation->set_rules('nama_staff', 'Nama Staff', 'required');
		$this->form_validation->set_rules('skala_nyeri', 'Skala Nyeri', 'required');
		if ($this->form_validation->run() == FALSE) {
			echo json_encode([
				'error' => true,
				'cara_datang' => form_error('cara_datang'),
				'alat_bantu' => form_error('alat_bantu'),
				'kasus' => form_error('kasus'),
				'gcs' => form_error('gcs'),
				'e' => form_error('e'),
				'm' => form_error('m'),
				'v' => form_error('v'),
				'risiko_jatuh' => form_error('risiko_jatuh'),
				'pRujuk' => form_error('pRujuk'),
				'keluhan_utama' => form_error('keluhan_utama'),
				'tekanan_darah' => form_error('tekanan_darah'),
				'suhu' => form_error('suhu'),
				'spo2' => form_error('spo2'),
				'frequensi_nadi' => form_error('frequensi_nadi'),
				'frequensi_nafas' => form_error('frequensi_nafas'),
				'airway' => form_error('airway'),
				'breathing' => form_error('breathing'),
				'cyrculation' => form_error('cyrculation'),
				'disability' => form_error('disability'),
				'kategori' => form_error('kategori'),
				'nama_staff' => form_error('nama_staff'),
				'skala_nyeri' => form_error('skala_nyeri'),
				'verif' => form_error('verif'),
				'tgl_verif' => form_error('tgl_verif'),
				'dokter_verif' => form_error('nama_dokter'),
			]);
			return;
		}

		// ✔ Jika validasi lolos → lanjut update
		$verif_input = $this->input->post('verif');
		$verif_value = ($verif_input === 'Ya') ? 'Belum' : 'Tidak';
		$update_data = array(
			'id_pelayanan'      => $this->input->post('id_pelayanan'),
			'id_history'        => $this->input->post('id_history'),
			'no_rm'             => $this->input->post('no_rm'),
			'cara_datang'       => $this->input->post('cara_datang'),
			'alat_bantu'        => $this->input->post('alat_bantu'),
			'kasus'             => $this->input->post('kasus'),
			'status_hamil'      => $this->input->post('status_hamil'),
			'hamil_g'           => $this->input->post('hamil_g'),
			'hamil_p'           => $this->input->post('hamil_p'),
			'hamil_a'           => $this->input->post('hamil_a'),
			'hamil_minggu'      => $this->input->post('hamil_minggu'),
			'gcs'               => $this->input->post('gcs'),
			'e'                 => $this->input->post('e'),
			'm'                 => $this->input->post('m'),
			'v'                 => $this->input->post('v'),
			'risiko_jatuh'      => $this->input->post('risiko_jatuh'),
			'pRujuk'            => $this->input->post('pRujuk'),
			'keluhan_utama'     => $this->input->post('keluhan_utama'),
			'tekanan_darah'     => $this->input->post('tekanan_darah'),
			'suhu'              => $this->input->post('suhu'),
			'spo2'              => $this->input->post('spo2'),
			'frequensi_nadi'    => $this->input->post('frequensi_nadi'),
			'frequensi_nafas'   => $this->input->post('frequensi_nafas'),
			'airway'            => $this->input->post('airway'),
			'breathing'         => $this->input->post('breathing'),
			'cyrculation'       => $this->input->post('cyrculation'),
			'disability'        => $this->input->post('disability'),
			'kategori'          => $this->input->post('kategori'),
			'nama_staff' 		=> $this->input->post('nama_staff'),
			'skala_nyeri' 			=> $this->input->post('skala_nyeri'),
			'skor_nyeri' 		=> $this->input->post('skor_nyeri'),
			'verif' 			=> $verif_value,
			'tgl_verif' 		=> $this->input->post('tgl_verifikasi'),
			'dokter_verif' 		=> $this->input->post('nama_dokter'),
			'tanggal'           => date("Y-m-d H:i:s"),
			'staff'             => $this->session->userdata('data_auth')->id_staff,
		);

		$where = array('id_triase_ugd' => $id_triase_ugd);
		if (empty($id_triase_ugd)) {
			$out['status'] = 'error';
			$out['message'] = 'ID untuk update tidak ditemukan di dalam payload.';
			echo json_encode($out);
			return;
		}

		// print $success ? $file : 'Unable to save the file.';
		// print $success1 ? $file1 : 'Unable to save the file.';
		$this->M_Erm->update($update_data, $where, 'form_ass_triase_ugd');
		$out['status'] = "success";
		echo json_encode($out);
	}

	public function get_ass_per()
	{
		$id = $this->input->post('id');
		$db = $this->M_Erm->get_triase_by_id_history($id);

		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			echo json_encode($db);
			exit;
		}
	}
	
	public function verif_catatan()
	{
		$id = $this->input->post('id');
		$data = array(
			'verif' => 'Ya',
			'tgl_verif' => date("Y-m-d h:i:s"),
		);
		$this->M_Erm->update_catatan($id, $data);
		$out['status'] = "success";
		echo json_encode($out);
	}

	public function print_triase($id_pelayanan)
	{
		$data['data'] = $this->M_Erm->get_triase($id_pelayanan);

		$data['ttd_dokter'] = $this->db
			->select('foto')
			->from('dokter')
			->where('nama', $data['data']['dokter_verif'])
			->get()
			->row('foto');
			

		$this->load->view('print/ases_triase_ugd', $data);
	}

}
