<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_poli_edit extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_IGD');
		$this->load->model('M_Erm');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Assembling');
		$this->load->model('M_Pencarian_Pasien');
		$this->load->model('M_Poli');
	}

	// Get Data

	public function get_ass_dok()
	{
		$id = base64_decode(urldecode($this->input->post('id'))); //di decode dulu
		$db = $this->db->get_where('form_assesmen_dokter', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_ass_per()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_ass_per_igd', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_intra()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_transfer_intra_rs', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_antar()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_transfer_antar_rs', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_super_ranap()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_perintah_ranap', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_penundaan()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_penundaan_pelayanan_obat', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_rujukan()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_lembar_rujukan', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_observasi()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_observasi', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_kematian()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_sebab_kematian', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_peng_khusus()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_peng_khusus', ['id_form_peng_khusus' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_obat_observasi()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('obat_observasi', ['id_obat' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function getPerPenRujukan()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_per_pen_rujukan', ['id_form_per_pen_rujukan' => $id])->row_array();
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
	public function getPerTindakanDok()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_persetujuan_tindakan_dokter', ['id_form_persetujuan_tindakan_dokter' => $id])->row_array();
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
	public function getPenTindakanDok()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_penolakan_tindakan_dokter', ['id_form_penolakan_tindakan_dokter' => $id])->row_array();
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
	public function getRiwayat()
	{
		$id = $this->input->post('id');
		$db = $this->M_Erm->selectDataPasien($id);
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	//Update
	public function insert_asses_perawat_igd()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('pRujuk', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('asalRujuk', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('gcs', 'GCS', 'required');
		$this->form_validation->set_rules('kondisi_umum', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('tekanan_darah', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('suhu', 'Suhu', 'required');
		$this->form_validation->set_rules('spo2', 'SPo2', 'required');
		$this->form_validation->set_rules('frequensi_nadi', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('berat_badan', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('frequensi_nafas', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('tinggi_badan', 'GCS', 'required');
		$this->form_validation->set_rules('kebutuhan_khusus', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('asesment_triase', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('wajib_ibadah', 'Suhu', 'required');
		$this->form_validation->set_rules('thaharah', 'SPo2', 'required');
		$this->form_validation->set_rules('sholat', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('faktor_nyeri', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('kualitas_nyeri', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('lokasi_nyeri', 'GCS', 'required');
		$this->form_validation->set_rules('skala_nyeri', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('durasi', 'Durasi', 'required');
		$this->form_validation->set_rules('faktor_peringan', 'Suhu', 'required');
		$this->form_validation->set_rules('efek_nyeri', 'SPo2', 'required');
		$this->form_validation->set_rules('penurunan_bb', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('kurang_makan', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('kurus', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('turun_bb', 'GCS', 'required');
		$this->form_validation->set_rules('diare', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('makan_kurang', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('malnutrisi', 'Suhu', 'required');
		$this->form_validation->set_rules('sempoyongan', 'SPo2', 'required');
		$this->form_validation->set_rules('penopang', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('risiko', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('info_dpjp', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('jam_info_dpjp', 'GCS', 'required');
		$this->form_validation->set_rules('frek_bab', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('keluhan_bab', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('karakter_feces', 'Suhu', 'required');
		$this->form_validation->set_rules('warna_feces', 'SPo2', 'required');
		$this->form_validation->set_rules('frek_bak', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('warna_bak', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('keluhan_bak', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('masalah', 'GCS', 'required');
		$this->form_validation->set_rules('rencana', 'Kondisi Umum', 'required');
		if ($this->form_validation->run()) {
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
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_ass_per_igd');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'pRujuk' => form_error('pRujuk'),
				'gcs' => form_error('gcs'),
				'kondisi_umum' => form_error('kondisi_umum'),
				'tekanan_darah' => form_error('tekanan_darah'),
				'suhu' => form_error('suhu'),
				'spo2' => form_error('spo2'),
				'frequensi_nadi' => form_error('frequensi_nadi'),
				'berat_badan' => form_error('berat_badan'),
				'frequensi_nafas' => form_error('frequensi_nafas'),
				'tinggi_badan' => form_error('tinggi_badan'),
				'kebutuhan_khusus' => form_error('kebutuhan_khusus'),
				'asesment_triase' => form_error('asesment_triase'),
				'wajib_ibadah' => form_error('wajib_ibadah'),
				'thaharah' => form_error('thaharah'),
				'sholat' => form_error('sholat'),
				'faktor_nyeri' => form_error('faktor_nyeri'),
				'kualitas_nyeri' => form_error('kualitas_nyeri'),
				'lokasi_nyeri' => form_error('lokasi_nyeri'),
				'skala_nyeri' => form_error('skala_nyeri'),
				'durasi' => form_error('durasi'),
				'faktor_peringan' => form_error('faktor_peringan'),
				'efek_nyeri' => form_error('efek_nyeri'),
				'penurunan_bb' => form_error('penurunan_bb'),
				'kurang_makan' => form_error('kurang_makan'),
				'kurus' => form_error('kurus'),
				'turun_bb' => form_error('turun_bb'),
				'diare' => form_error('diare'),
				'makan_kurang' => form_error('makan_kurang'),
				'malnutrisi' => form_error('malnutrisi'),
				'sempoyongan' => form_error('sempoyongan'),
				'penopang' => form_error('penopang'),
				'tingkat_risiko' => form_error('risiko'),
				'info_dpjp' => form_error('info_dpjp'),

				'frek_bab' => form_error('frek_bab'),
				'keluhan_bab' => form_error('keluhan_bab'),
				'karakter_feces' => form_error('karakter_feces'),
				'warna_feces' => form_error('warna_feces'),
				'frek_bak' => form_error('frek_bak'),
				'warna_bak' => form_error('warna_bak'),
				'keluhan_bak' => form_error('keluhan_bak'),
				'masalah' => form_error('masalah'),
				'rencana' => form_error('rencana'),
			);
		}

		echo json_encode($out);
	}

	public function insert_super_ranap_igd()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
		$this->form_validation->set_rules('dokter_merawat', 'Dokter Merawat', 'required');
		$this->form_validation->set_rules('dokter_pengirim', 'Dokter Pengirim', 'required');
		$this->form_validation->set_rules('kamar_rawat', 'Kamar Rawat', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'diagnosis' => $this->input->post('diagnosis'),
				'dokter_merawat' => $this->input->post('dokter_merawat'),
				'dokter_pengirim' => $this->input->post('dokter_pengirim'),
				'kamar_rawat' => $this->input->post('kamar_rawat'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_perintah_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'diagnosis' => form_error('diagnosis'),
				'dokter_merawat' => form_error('dokter_merawat'),
				'dokter_pengirim' => form_error('dokter_pengirim'),
				'kamar_rawat' => form_error('kamar_rawat'),
			);
		}
		echo json_encode($out);
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
	public function insert_asses_dokter_igd()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$img = $this->input->post('gambar');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = "assets/images/" . uniqid(time(), true) . ".png";
		$success = file_put_contents($file, $data);
		$img1 = $this->input->post('ttd');
		$img1 = str_replace('data:image/png;base64,', '', $img1);
		$img1 = str_replace(' ', '+', $img1);
		$data1 = base64_decode($img1);
		$file1 = "assets/images/" . uniqid(time(), true) . ".png";
		$success1 = file_put_contents($file1, $data1);
		$this->form_validation->set_rules('keluhan', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('riwayat', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('riwayat_alergi', 'GCS', 'required');
		$this->form_validation->set_rules('psikologis', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('ham_sos', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('ham_eko', 'Suhu', 'required');
		$this->form_validation->set_rules('ham_spirit', 'SPo2', 'required');
		$this->form_validation->set_rules('usg', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('ekg', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('ctg', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('periksa_lain', 'GCS', 'required');
		$this->form_validation->set_rules('tindak_lanjut', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('konsul', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('keadaan_pulang', 'Suhu', 'required');
		$this->form_validation->set_rules('terapi', 'SPo2', 'required');
		if ($this->form_validation->run()) {
			$data   =   array(
				'no_rm' => $this->input->post('no_rm'),
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'keluhan' => $this->input->post('keluhan'),
				'riwayat' => $this->input->post('riwayat'),
				'riwayat_alergi' => $this->input->post('riwayat_alergi'),
				'psikologis' => $this->input->post('psikologis'),
				'ham_sos' => $this->input->post('ham_sos'),
				'ham_eko' => $this->input->post('ham_eko'),
				'ham_spirit' => $this->input->post('ham_spirit'),
				'kepala' => $this->input->post('kepala'),
				'hidung' => $this->input->post('hidung'),
				'mulut' => $this->input->post('mulut'),
				'leher' => $this->input->post('leher'),
				'thorax' => $this->input->post('thorax'),
				'jantung' => $this->input->post('jantung'),
				'paru' => $this->input->post('paru'),
				'andomen' => $this->input->post('andomen'),
				'punggung' => $this->input->post('punggung'),
				'ekstremitas' => $this->input->post('ekstremitas'),
				// 'labor' => $this->input->post('labor'),
				// 'jam_periksa_labor' => $this->input->post('jam_periksa'),
				// 'jam_selesai_labor' => $this->input->post('jam_selesai'),
				// 'rontgen' => $this->input->post('rontgen'),
				// 'jam_periksa_rontgen' => $this->input->post('periksa'),
				// 'jam_selesai_rontgen' => $this->input->post('selesai'),
				'usg' => $this->input->post('usg'),
				'ekg' => $this->input->post('ekg'),
				'ctg' => $this->input->post('ctg'),
				'periksa_lain' => $this->input->post('periksa_lain'),
				'tindak_lanjut' => $this->input->post('tindak_lanjut'),
				'konsul' => $this->input->post('konsul'),
				'keadaan_pulang' => $this->input->post('kondisi_pulang'),
				'terapi' => $this->input->post('terapi'),
				'gambar' => $file,
				'ttd' => $file1,
				'tanggal' => $tgl,
				'staff' => $staff,

			);
			// print $success ? $file : 'Unable to save the file.';
			// print $success1 ? $file1 : 'Unable to save the file.';
			$this->M_Erm->insert($data, 'form_ass_dokter_igd');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'keluhan' => form_error('keluhan'),
				'riwayat' => form_error('riwayat'),
				'riwayat_alergi' => form_error('riwayat_alergi'),
				'psikologis' => form_error('psikologis'),
				'ham_sos' => form_error('ham_sos'),
				'ham_eko' => form_error('ham_eko'),
				'ham_spirit' => form_error('ham_spirit'),

				'tindak_lanjut' => form_error('tindak_lanjut'),
				'konsul' => form_error('konsul'),
				'keadaan_pulang' => form_error('kondisi_pulang'),
				'terapi' => form_error('terapi'),
			);
		}
		echo json_encode($out);
	}
	public function insert_lembar_rujukan()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$this->form_validation->set_rules('tempat', 'Yang Bersangkutan', 'required');
		$this->form_validation->set_rules('tempat1', 'Yang Bersangkutan', 'required');
		$this->form_validation->set_rules('riwayat_penyakit', 'Riwayat Penyakit', 'required');
		$this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
		$this->form_validation->set_rules('hasil_periksa', 'Hasil Periksa', 'required');
		$this->form_validation->set_rules('terapi', 'Terapi ', 'required');
		$this->form_validation->set_rules('terapi1', 'Terapi I', 'required');
		$this->form_validation->set_rules('saran', 'Saran', 'required');

		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tempat' => $this->input->post('tempat'),
				'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
				'diagnosis' => $this->input->post('diagnosis'),
				'tempat1' => $this->input->post('tempat1'),
				'hasil_periksa' => $this->input->post('hasil_periksa'),
				'terapi' => $this->input->post('terapi'),
				'terapi1' => $this->input->post('terapi1'),
				'saran' => $this->input->post('saran'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_lembar_rujukan');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'tempat' => form_error('tempat'),
				'riwayat_penyakit' => form_error('riwayat_penyakit'),
				'diagnosis' => form_error('diagnosis'),
				'tempat1' => form_error('tempat1'),
				'hasil_periksa' => form_error('hasil_periksa'),
				'terapi' => form_error('terapi'),
				'terapi1' => form_error('terapi1'),
				'saran' => form_error('saran'),
				// 'gambar' => form_error('gambar'),
			);
		}
		echo json_encode($out);
	}
	public function insert_penolakan_tindakan()
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
		$this->form_validation->set_rules('pemberi_info', 'Pemberi Info', 'isset');
		$this->form_validation->set_rules('penerima_info', 'Penerima Info', 'isset');
		$this->form_validation->set_rules('diagnosis', 'Diagnosis', 'isset');
		$this->form_validation->set_rules('td_diagnosis', 'Tanda Diagnosis', 'isset');
		$this->form_validation->set_rules('diagnosis_d', 'Diagnosis', 'required');
		$this->form_validation->set_rules('td_diagnosis_d', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('tindakan', 'GCS', 'required');
		$this->form_validation->set_rules('td_tindakan', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('indikasi', 'GCS', 'required');
		$this->form_validation->set_rules('td_indikasi', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('tatacara', 'GCS', 'required');
		$this->form_validation->set_rules('td_tatacara', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('tujuan', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('td_tujuan', 'Suhu', 'isset');
		$this->form_validation->set_rules('risiko', 'SPo2', 'required');
		$this->form_validation->set_rules('td_risiko', 'Frequensi Nadi', 'isset');
		$this->form_validation->set_rules('prognosis', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('td_prognosis', 'Asal Rujuk', 'isset');
		$this->form_validation->set_rules('alt_risiko', 'GCS', 'required');
		$this->form_validation->set_rules('td_alt_risiko', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('alt_risiko', 'GCS', 'required');
		$this->form_validation->set_rules('td_alt_risiko', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('hal_lain', 'GCS', 'required');
		$this->form_validation->set_rules('td_hal_lain', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('ttd_pemberi_info', 'Tekanan Darah', 'isset');
		$this->form_validation->set_rules('ttd_penerima_info', 'Suhu', 'isset');
		$this->form_validation->set_rules('nama', 'SPo2', 'required');
		$this->form_validation->set_rules('umur', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('alamat', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('jk', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('tolak_tindakan', 'Asal Rujuk', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'pemberi_info' => $this->input->post('pemberi_info'),
				'penerima_info' => $this->input->post('penerima_info'),
				'diagnosis' => $this->input->post('diagnosis'),
				'td_diagnosis' => $this->input->post('td_diagnosis'),
				'diagnosis_d' => $this->input->post('diagnosis_d'),
				'td_diagnosis_d' => $this->input->post('td_diagnosis_d'),
				'tindakan' => $this->input->post('tindakan'),
				'td_tindakan' => $this->input->post('td_tindakan'),
				'indikasi' => $this->input->post('indikasi'),
				'td_indikasi' => $this->input->post('td_indikasi'),
				'tatacara' => $this->input->post('tatacara'),
				'td_tatacara' => $this->input->post('td_tatacara'),
				'tujuan' => $this->input->post('tujuan'),
				'td_tujuan' => $this->input->post('td_tujuan'),
				'risiko' => $this->input->post('risiko'),
				'td_risiko' => $this->input->post('td_risiko'),
				'prognosis' => $this->input->post('prognosis'),
				'td_prognosis' => $this->input->post('td_prognosis'),
				'alt_risiko' => $this->input->post('alt_risiko'),
				'td_alt_risiko' => $this->input->post('td_alt_risiko'),
				'hal_lain' => $this->input->post('hal_lain'),
				'td_hal_lain' => $this->input->post('td_hal_lain'),
				'ttd_pemberi_info' => $this->input->post('ttd_pemberi_info'),
				'ttd_penerima_info' => $this->input->post('ttd_penerima_info'),
				'nama' => $this->input->post('nama'),
				'umur' => $this->input->post('umur'),
				'alamat' => $this->input->post('alamat'),
				'jk' => $this->input->post('jk'),
				'tolak_tindakan' => $this->input->post('tolak_tindakan'),
				'ttd' => $file,
				'ttd1' => $file1,
				'ttd2' => $file2,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_penolakan_tindakan_dokter');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'pemberi_info' => form_error('pemberi_info'),
				'penerima_info' => form_error('penerima_info'),
				'diagnosis' => form_error('diagnosis'),
				'td_diagnosis' => form_error('td_diagnosis'),
				'diagnosis_d' => form_error('diagnosis_d'),
				'td_diagnosis_d' => form_error('td_diagnosis_d'),
				'tindakan' => form_error('tindakan'),
				'td_tindakan' => form_error('td_tindakan'),
				'indikasi' => form_error('indikasi'),
				'td_indikasi' => form_error('td_indikasi'),
				'tatacara' => form_error('tatacara'),
				'td_tatacara' => form_error('td_tatacara'),
				'tujuan' => form_error('tujuan'),
				'td_tujuan' => form_error('td_tujuan'),
				'risiko' => form_error('risiko'),
				'td_risiko' => form_error('td_risiko'),
				'prognosis' => form_error('prognosis'),
				'td_prognosis' => form_error('td_prognosis'),
				'alt_risiko' => form_error('alt_risiko'),
				'td_alt_risiko' => form_error('td_alt_risiko'),
				'hal_lain' => form_error('hal_lain'),
				'td_hal_lain' => form_error('td_hal_lain'),
				'ttd_pemberi_info' => form_error('ttd_pemberi_info'),
				'ttd_penerima_info' => form_error('ttd_penerima_info'),
				'nama' => form_error('nama'),
				'umur' => form_error('umur'),
				'alamat' => form_error('alamat'),
				'jk' => form_error('jk'),
				'tolak_tindakan' => form_error('tolak_tindakan'),
			);
		}
		echo json_encode($out);
	}
	public function insert_observasi()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('gawat', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('nama_supir', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('nama_tm', 'GCS', 'required');
		$this->form_validation->set_rules('tgl', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('jenis_kasus', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('berangkat', 'Suhu', 'required');
		$this->form_validation->set_rules('tujuan', 'SPo2', 'required');
		$this->form_validation->set_rules('jam_brgkt', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('jam_tiba', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('ale_obat', 'Asal Rujuk', 'required');
		if ($this->form_validation->run() == true) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'gawat' => $this->input->post('gawat'),
				'nama_supir' => $this->input->post('nama_supir'),
				'nama_tm' => $this->input->post('nama_tm'),
				'tgl' => $this->input->post('tgl'),
				'jenis_kasus' => $this->input->post('jenis_kasus'),
				'berangkat' => $this->input->post('berangkat'),
				'tujuan' => $this->input->post('tujuan'),
				'jam_brgkt' => $this->input->post('jam_brgkt'),
				'jam_tiba' => $this->input->post('jam_tiba'),
				'ale_obat' => $this->input->post('ale_obat'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			$this->M_Erm->insert($data, 'form_observasi');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'gawat' => form_error('gawat'),
				'nama_supir' => form_error('nama_supir'),
				'nama_tm' => form_error('nama_tm'),
				'tgl' => form_error('tgl'),
				'jenis_kasus' => form_error('jenis_kasus'),
				'berangkat' => form_error('berangkat'),
				'tujuan' => form_error('tujuan'),
				'jam_brgkt' => form_error('jam_brgkt'),
				'jam_tiba' => form_error('jam_tiba'),
				'ale_obat' => form_error('ale_obat'),
			);
		}
		echo json_encode($out);
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
	public function insert_persetujuan_tindakan()
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
		$this->form_validation->set_rules('pemberi_info', 'Pemberi Info', 'isset');
		$this->form_validation->set_rules('penerima_info', 'Penerima Info', 'isset');
		$this->form_validation->set_rules('diagnosis', 'Diagnosis', 'isset');
		$this->form_validation->set_rules('td_diagnosis', 'Tanda Diagnosis', 'isset');
		$this->form_validation->set_rules('diagnosis_d', 'Diagnosis', 'required');
		$this->form_validation->set_rules('td_diagnosis_d', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('tindakan', 'GCS', 'required');
		$this->form_validation->set_rules('td_tindakan', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('indikasi', 'GCS', 'required');
		$this->form_validation->set_rules('td_indikasi', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('tatacara', 'GCS', 'required');
		$this->form_validation->set_rules('td_tatacara', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('tujuan', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('td_tujuan', 'Suhu', 'isset');
		$this->form_validation->set_rules('risiko', 'SPo2', 'required');
		$this->form_validation->set_rules('td_risiko', 'Frequensi Nadi', 'isset');
		$this->form_validation->set_rules('prognosis', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('td_prognosis', 'Asal Rujuk', 'isset');
		$this->form_validation->set_rules('alt_risiko', 'GCS', 'required');
		$this->form_validation->set_rules('td_alt_risiko', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('alt_risiko', 'GCS', 'required');
		$this->form_validation->set_rules('td_alt_risiko', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('hal_lain', 'GCS', 'required');
		$this->form_validation->set_rules('td_hal_lain', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('ttd_pemberi_info', 'Tekanan Darah', 'isset');
		$this->form_validation->set_rules('ttd_penerima_info', 'Suhu', 'isset');
		$this->form_validation->set_rules('nama', 'SPo2', 'required');
		$this->form_validation->set_rules('umur', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('alamat', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('jk', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('tolak_tindakan', 'Asal Rujuk', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'pemberi_info' => $this->input->post('pemberi_info'),
				'penerima_info' => $this->input->post('penerima_info'),
				'diagnosis' => $this->input->post('diagnosis'),
				'td_diagnosis' => $this->input->post('td_diagnosis'),
				'diagnosis_d' => $this->input->post('diagnosis_d'),
				'td_diagnosis_d' => $this->input->post('td_diagnosis_d'),
				'tindakan' => $this->input->post('tindakan'),
				'td_tindakan' => $this->input->post('td_tindakan'),
				'indikasi' => $this->input->post('indikasi'),
				'td_indikasi' => $this->input->post('td_indikasi'),
				'tatacara' => $this->input->post('tatacara'),
				'td_tatacara' => $this->input->post('td_tatacara'),
				'tujuan' => $this->input->post('tujuan'),
				'td_tujuan' => $this->input->post('td_tujuan'),
				'risiko' => $this->input->post('risiko'),
				'td_risiko' => $this->input->post('td_risiko'),
				'prognosis' => $this->input->post('prognosis'),
				'td_prognosis' => $this->input->post('td_prognosis'),
				'alt_risiko' => $this->input->post('alt_risiko'),
				'td_alt_risiko' => $this->input->post('td_alt_risiko'),
				'hal_lain' => $this->input->post('hal_lain'),
				'td_hal_lain' => $this->input->post('td_hal_lain'),
				'ttd_pemberi_info' => $this->input->post('ttd_pemberi_info'),
				'ttd_penerima_info' => $this->input->post('ttd_penerima_info'),
				'nama' => $this->input->post('nama'),
				'umur' => $this->input->post('umur'),
				'alamat' => $this->input->post('alamat'),
				'jk' => $this->input->post('jk'),
				'tolak_tindakan' => $this->input->post('tolak_tindakan'),
				'ttd' => $file,
				'ttd1' => $file1,
				'ttd2' => $file2,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_persetujuan_tindakan_dokter');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'pemberi_info' => form_error('pemberi_info'),
				'penerima_info' => form_error('penerima_info'),
				'diagnosis' => form_error('diagnosis'),
				'td_diagnosis' => form_error('td_diagnosis'),
				'diagnosis_d' => form_error('diagnosis_d'),
				'td_diagnosis_d' => form_error('td_diagnosis_d'),
				'tindakan' => form_error('tindakan'),
				'td_tindakan' => form_error('td_tindakan'),
				'indikasi' => form_error('indikasi'),
				'td_indikasi' => form_error('td_indikasi'),
				'tatacara' => form_error('tatacara'),
				'td_tatacara' => form_error('td_tatacara'),
				'tujuan' => form_error('tujuan'),
				'td_tujuan' => form_error('td_tujuan'),
				'risiko' => form_error('risiko'),
				'td_risiko' => form_error('td_risiko'),
				'prognosis' => form_error('prognosis'),
				'td_prognosis' => form_error('td_prognosis'),
				'alt_risiko' => form_error('alt_risiko'),
				'td_alt_risiko' => form_error('td_alt_risiko'),
				'hal_lain' => form_error('hal_lain'),
				'td_hal_lain' => form_error('td_hal_lain'),
				'ttd_pemberi_info' => form_error('ttd_pemberi_info'),
				'ttd_penerima_info' => form_error('ttd_penerima_info'),
				'nama' => form_error('nama'),
				'umur' => form_error('umur'),
				'alamat' => form_error('alamat'),
				'jk' => form_error('jk'),
				'tolak_tindakan' => form_error('tolak_tindakan'),
			);
		}
		echo json_encode($out);
	}
	public function insert_tf_antar_rs()
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
		$this->form_validation->set_rules('periksa', 'Suhu', 'required');
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

				'periksa' => $this->input->post('periksa'),
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

				'periksa' => form_error('periksa'),
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
	public function insert_tf_intra_rs()
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
		$this->form_validation->set_rules('tglPindah', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('tuj_pindah', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('cara_tf', 'GCS', 'required');
		$this->form_validation->set_rules('kondisi_tf', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('kondisi_terima', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('keadaan_umum', 'Suhu', 'required');
		$this->form_validation->set_rules('kesadaran', 'SPo2', 'required');
		$this->form_validation->set_rules('tekanan_darah', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('suhu', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('frequensi_nadi', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('rr', 'GCS', 'required');
		$this->form_validation->set_rules('skala_nyeri', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('keluhan', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('riwayat_penyakit', 'Suhu', 'required');
		$this->form_validation->set_rules('alergi', 'SPo2', 'required');
		$this->form_validation->set_rules('tekanan_darah1', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('suhu1', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('frequensi_nadi1', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('rr1', 'GCS', 'required');
		$this->form_validation->set_rules('skala_nyeri1', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('infus', 'Suhu', 'required');
		$this->form_validation->set_rules('tindakan', 'Suhu', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tglPindah' => $this->input->post('tglPindah'),
				'tuj_pindah' => $this->input->post('tuj_pindah'),
				'cara_tf' => $this->input->post('cara_tf'),
				'kondisi_tf' => $this->input->post('kondisi_tf'),
				'kondisi_terima' => $this->input->post('kondisi_terima'),
				'keadaan_umum' => $this->input->post('keadaan_umum'),
				'kesadaran' => $this->input->post('kesadaran'),
				'tekanan_darah' => $this->input->post('tekanan_darah'),
				'suhu' => $this->input->post('suhu'),
				'frequensi_nadi' => $this->input->post('frequensi_nadi'),
				'rr' => $this->input->post('rr'),
				'skala_nyeri' => $this->input->post('skala_nyeri'),
				'keluhan' => $this->input->post('keluhan'),
				'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
				'alergi' => $this->input->post('alergi'),
				'tekanan_darah1' => $this->input->post('tekanan_darah1'),
				'suhu1' => $this->input->post('suhu1'),
				'frequensi_nadi1' => $this->input->post('frequensi_nadi1'),
				'rr1' => $this->input->post('rr1'),
				'skala_nyeri1' => $this->input->post('skala_nyeri1'),

				'ctg' => $this->input->post('ctg'),
				'ekg' => $this->input->post('ekg'),
				'usg' => $this->input->post('usg'),
				'hsg' => $this->input->post('hsg'),
				'appendicogram' => $this->input->post('appendicogram'),
				'bno' => $this->input->post('bno'),
				'infus' => $this->input->post('infus'),
				'tindakan' => $this->input->post('tindakan'),
				'ttd' => $file,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_transfer_intra_rs');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'tglPindah' => form_error('tglPindah'),
				'tuj_pindah' => form_error('tuj_pindah'),
				'cara_tf' => form_error('cara_tf'),
				'kondisi_tf' => form_error('kondisi_tf'),
				'kondisi_terima' => form_error('kondisi_terima'),
				'keadaan_umum' => form_error('keadaan_umum'),
				'kesadaran' => form_error('kesadaran'),
				'tekanan_darah' => form_error('tekanan_darah'),
				'suhu' => form_error('suhu'),
				'frequensi_nadi' => form_error('frequensi_nadi'),
				'rr' => form_error('rr'),
				'skala_nyeri' => form_error('skala_nyeri'),
				'keluhan' => form_error('keluhan'),
				'riwayat_penyakit' => form_error('riwayat_penyakit'),
				'alergi' => form_error('alergi'),
				'tekanan_darah1' => form_error('tekanan_darah1'),
				'suhu1' => form_error('suhu1'),
				'frequensi_nadi1' => form_error('frequensi_nadi1'),
				'rr1' => form_error('rr1'),
				'skala_nyeri1' => form_error('skala_nyeri1'),
				'infus' => form_error('infus'),
				'tindakan' => form_error('tindakan'),
			);
		}
		echo json_encode($out);
	}
	public function insert_per_pen_rujukan()
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
		$this->form_validation->set_rules('pemberi_info', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('penerima_info', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('diagnosis', 'GCS', 'required');
		$this->form_validation->set_rules('td_diagnosis', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('alasan', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('td_alasan', 'Suhu', 'isset');
		$this->form_validation->set_rules('risiko', 'SPo2', 'required');
		$this->form_validation->set_rules('td_risiko', 'Frequensi Nadi', 'isset');
		$this->form_validation->set_rules('transport', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('td_transport', 'Asal Rujuk', 'isset');
		$this->form_validation->set_rules('hambatan', 'GCS', 'required');
		$this->form_validation->set_rules('td_hambatan', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('ttd_pemberi_info', 'Tekanan Darah', 'isset');
		$this->form_validation->set_rules('ttd_penerima_info', 'Suhu', 'isset');
		$this->form_validation->set_rules('nama', 'SPo2', 'required');
		$this->form_validation->set_rules('umur', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('alamat', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('jk', 'Asal Rujuk', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'pemberi_info' => $this->input->post('pemberi_info'),
				'penerima_info' => $this->input->post('penerima_info'),
				'diagnosis' => $this->input->post('diagnosis'),
				'td_diagnosis' => $this->input->post('td_diagnosis'),
				'alasan' => $this->input->post('alasan'),
				'td_alasan' => $this->input->post('td_alasan'),
				'risiko' => $this->input->post('risiko'),
				'td_risiko' => $this->input->post('td_risiko'),
				'transport' => $this->input->post('transport'),
				'td_transport' => $this->input->post('td_transport'),
				'hambatan' => $this->input->post('hambatan'),
				'td_hambatan' => $this->input->post('td_hambatan'),
				'ttd_pemberi_info' => $this->input->post('ttd_pemberi_info'),
				'ttd_penerima_info' => $this->input->post('ttd_penerima_info'),
				'nama' => $this->input->post('nama'),
				'umur' => $this->input->post('umur'),
				'alamat' => $this->input->post('alamat'),
				'jk' => $this->input->post('jk'),
				'ttd' => $file,
				'ttd1' => $file1,
				'ttd2' => $file2,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_per_pen_rujukan');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'pemberi_info' => form_error('pemberi_info'),
				'penerima_info' => form_error('penerima_info'),
				'diagnosis' => form_error('diagnosis'),
				'td_diagnosis' => form_error('td_diagnosis'),
				'alasan' => form_error('alasan'),
				'td_alasan' => form_error('td_alasan'),
				'risiko' => form_error('risiko'),
				'td_risiko' => form_error('td_risiko'),
				'transport' => form_error('transport'),
				'td_transport' => form_error('td_transport'),
				'hambatan' => form_error('hambatan'),
				'td_hambatan' => form_error('td_hambatan'),
				'ttd_pemberi_info' => form_error('ttd_pemberi_info'),
				'ttd_penerima_info' => form_error('ttd_penerima_info'),
				'nama' => form_error('nama'),
				'umur' => form_error('umur'),
				'alamat' => form_error('alamat'),
				'jk' => form_error('jk'),
			);
		}
		echo json_encode($out);
	}
	// Cetak
	public function print_ass_per_igd($id)
	{
		$data['data'] = $this->M_Erm->cetakAssPer($id);
		$this->load->view('erm_print/ases_per_igd', $data);
	}
	public function print_ass_dok_igd($id)
	{
		$data['data'] = $this->M_Erm->cetakResumeMed($id);
		$this->load->view('erm_print/ases_dok_igd', $data);
	}

	public function print_resume_medis($id, $id_history)
	{
		$data['data'] = $this->M_Erm_poli->cetakResumeMed($id_history);

		$data['ttd'] = base_url() . 'assets/ttd/' . $data['data']['foto'];
		$data['terapi'] = $this->M_Erm->selectTerapiByIdPel($id);

		//tindakan poli
		$dataUser = $this->session->userdata('data_auth');
		$tipe = $dataUser->tipe;
		if ($tipe == 'poliinternis' || $tipe == 'poli') {
			$table = 'v_tindakan_poli_internis';
		} elseif ($tipe == 'poliobgyne' || $tipe == 'poli') {
			$table = 'v_tindakan_poli_obgyne';
		} elseif ($tipe == 'politht') {
			$table = 'v_tindakan_poli_tht';
		} elseif ($tipe == 'polimata') {
			$table = 'v_tindakan_poli_mata';
		} elseif ($tipe == 'polikulit') {
			$table = 'v_tindakan_poli_kulit';
		} elseif ($tipe == 'poliumum') {
			$table = 'v_tindakan_poli_umum';
		} elseif ($tipe == 'polianak') {
			$table = 'v_tindakan_poli_anak';
		} elseif ($tipe == 'poligigi' || $tipe == 'poliorthodonti') {
			$table = 'v_tindakan_poli_gigi';
		} elseif ($tipe == 'polijantung') {
			$table = 'v_tindakan_poli_jantung';
		} elseif ($tipe == 'polibedah') {
			$table = 'v_tindakan_poli_bedah';
		} elseif ($tipe == 'polifisio' || $tipe == 'rekam medis' || $tipe == 'rawatinap' || $tipe == 'icu' || $tipe == 'rehab') {
			$table = 'v_tindakan_poli_fisio';
		} elseif ($tipe == 'poliakupuntur') {
			$table = 'v_tindakan_poli_akupuntur';
		} elseif ($tipe == 'polibedahmulut') {
			$table = 'v_tindakan_poli_bedah_mulut';
		} elseif ($tipe == 'polikesjiwa') {
			$table = 'v_tindakan_poli_kes_jiwa';
		} elseif ($tipe == 'poliorthopedi') {
			$table = 'v_tindakan_poli_orthopedi';
		} elseif ($tipe == 'poliparu') {
			$table = 'v_tindakan_poli_paru';
		} elseif ($tipe == 'polisaraf') {
			$table = 'v_tindakan_poli_saraf';
		} elseif ($tipe == 'poliurologi') {
			$table = 'v_tindakan_poli_urologi';
		} elseif ($tipe == 'polipenyakitmulut') {
			$table = 'v_tindakan_poli_penyakit_mulut';
		} elseif ($tipe == 'poliginjal') {
			$table = 'v_tindakan_poli_ginjal';
		} elseif ($tipe == 'polipsikolog') {
			$table = 'v_tindakan_poli_psikolog';
		} elseif ($tipe == 'poligizi') {
			$table = 'v_tindakan_poli_gizi';
		} elseif ($tipe == 'terapiwicara') {
			$table = 'v_tindakan_poli_terapi_wicara';
		} elseif ($tipe == 'polihemodialisa') {
			$table = 'v_tindakan_poli_hd';
		} elseif ($tipe == 'kemoterapi') {
			$table = 'v_tindakan_poli_kemo';
		} elseif ($tipe == 'polistifin') {
			$table = 'v_tindakan_poli_stifin';
		} elseif ($tipe == 'poliorthodonti') {
			$table = 'v_tindakan_orthodenti';
		} elseif ($tipe == 'konservasigigi') {
			$table = 'v_tindakan_konservasi_gigi';
		} elseif ($tipe == 'okupasi') {
			$table = 'v_tindakan_okupasi';
		} else {
			//dinamis
			if ($row = $this->db->get_where('list_poli', ['tipe_staff' => $tipe])->row()) {
				//table tindakan
				$table = "v_" . $row->tindakan;
			}
		}
		$list_tindakan = $this->M_Poli->selectDataTindakanByIdPel($id, $table);
		$data['tindakan_poli'] = $list_tindakan;
		//radiologi
		$data['radiologi'] = $this->M_Poli->selectDataRadiologiById($id);
		//labor
		$data['labor'] = $this->M_Poli->selectDataLaborByIdAndStatus1($id);
		
		$this->load->view('erm_print/resume_medis_raj', $data);
	}

	// 	public function print_resume_medis($id,$id_history)
	// {
	// 	$data['data'] = $this->M_Erm_poli->cetakResumeMed($id_history);
	// 	$data['terapi'] = $this->M_Erm->selectTerapiByIdPel($id,$id_history);
	// 	$this->load->view('erm_print/resume_medis_raj', $data);
	// }
	public function print_observasi($id)
	{
		$data['data'] = $this->M_Erm->cetakObservasi($id);
		// $data['terapi'] = $this->M_Erm->selectTerapiByIdPel($id);
		$this->load->view('erm_print/observasi_transfer', $data);
	}
	public function print_sebab_kematian($id)
	{
		$data['data'] = $this->M_Erm->cetakSebabKematian($id);
		// $data['terapi'] = $this->M_Erm->selectTerapiByIdPel($id);
		$this->load->view('erm_print/sebab_kematian', $data);
	}
	public function print_intra($id, $id_history)
	{
		$data['data'] = $this->M_Erm->cetakIntra($id);
		$data['terapi'] = $this->M_Erm->selectTerapiByIdPel($id_history);
		$this->load->view('erm_print/transfer_intra_rs', $data);
	}
	public function print_antar($id, $id_history)
	{
		$data['data'] = $this->M_Erm->cetakAntar($id);
		$data['terapi'] = $this->M_Erm->selectTerapiByIdPel($id_history);
		$this->load->view('erm_print/trans_pas_antar_rs', $data);
	}
	public function print_peng_khusus($id, $id_pelayanan)
	{
		$data['data'] = $this->M_Erm->selectDataPasienIGDby_id($id_pelayanan, $id);
		$data['db'] = $this->M_Erm->selectListPengawasan($id);
		$this->load->view('erm_print/peng_khu_upmar_2017', $data);
	}
	public function print_per_pen_rujukan($id)
	{
		$data['data'] = $this->M_Erm->cetakPerPenRujuk($id);
		$this->load->view('erm_print/per_pen_rujukan', $data);
	}
	public function print_penolakan($id)
	{
		$data['data'] = $this->M_Erm->cetakPenolakan($id);
		$this->load->view('erm_print/penolakan_tindakan_kedokteran', $data);
	}
	public function print_persetujuan($id)
	{
		$data['data'] = $this->M_Erm->cetakPersetujuan($id);
		$this->load->view('erm_print/per_tin_kedokteran', $data);
	}
	public function print_rujukan($id)
	{
		$data['data'] = $this->M_Erm->cetakRujukan($id);
		$this->load->view('erm_print/lembar_rujukan', $data);
	}
	public function print_super_ranap($id)
	{
		$data['data'] = $this->M_Erm->cetakSuperRanap($id);
		$this->load->view('erm_print/super_rawat_inap_spri', $data);
	}
	public function print_penundaan($id)
	{
		$data['data'] = $this->M_Erm->cetakPenundaan($id);
		$this->load->view('erm_print/penundaan_pelayanan_pengobatan', $data);
	}
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_poli_edit extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_IGD');
		$this->load->model('M_Erm');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Assembling');
		$this->load->model('M_Pencarian_Pasien');
		$this->load->model('M_Poli');
	}

	// Get Data

	public function get_ass_dok()
	{
		$id = base64_decode(urldecode($this->input->post('id'))); //di decode dulu
		$db = $this->db->get_where('form_assesmen_dokter', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_ass_per()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_ass_per_igd', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_intra()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_transfer_intra_rs', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_antar()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_transfer_antar_rs', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_super_ranap()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_perintah_ranap', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_penundaan()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_penundaan_pelayanan_obat', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_rujukan()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_lembar_rujukan', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_observasi()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_observasi', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_kematian()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_sebab_kematian', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_peng_khusus()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_peng_khusus', ['id_form_peng_khusus' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function get_obat_observasi()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('obat_observasi', ['id_obat' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function getPerPenRujukan()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_per_pen_rujukan', ['id_form_per_pen_rujukan' => $id])->row_array();
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
	public function getPerTindakanDok()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_persetujuan_tindakan_dokter', ['id_form_persetujuan_tindakan_dokter' => $id])->row_array();
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
	public function getPenTindakanDok()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_penolakan_tindakan_dokter', ['id_form_penolakan_tindakan_dokter' => $id])->row_array();
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
	public function getRiwayat()
	{
		$id = $this->input->post('id');
		$db = $this->M_Erm->selectDataPasien($id);
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	//Update
	public function insert_asses_perawat_igd()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('pRujuk', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('asalRujuk', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('gcs', 'GCS', 'required');
		$this->form_validation->set_rules('kondisi_umum', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('tekanan_darah', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('suhu', 'Suhu', 'required');
		$this->form_validation->set_rules('spo2', 'SPo2', 'required');
		$this->form_validation->set_rules('frequensi_nadi', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('berat_badan', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('frequensi_nafas', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('tinggi_badan', 'GCS', 'required');
		$this->form_validation->set_rules('kebutuhan_khusus', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('asesment_triase', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('wajib_ibadah', 'Suhu', 'required');
		$this->form_validation->set_rules('thaharah', 'SPo2', 'required');
		$this->form_validation->set_rules('sholat', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('faktor_nyeri', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('kualitas_nyeri', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('lokasi_nyeri', 'GCS', 'required');
		$this->form_validation->set_rules('skala_nyeri', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('durasi', 'Durasi', 'required');
		$this->form_validation->set_rules('faktor_peringan', 'Suhu', 'required');
		$this->form_validation->set_rules('efek_nyeri', 'SPo2', 'required');
		$this->form_validation->set_rules('penurunan_bb', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('kurang_makan', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('kurus', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('turun_bb', 'GCS', 'required');
		$this->form_validation->set_rules('diare', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('makan_kurang', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('malnutrisi', 'Suhu', 'required');
		$this->form_validation->set_rules('sempoyongan', 'SPo2', 'required');
		$this->form_validation->set_rules('penopang', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('risiko', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('info_dpjp', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('jam_info_dpjp', 'GCS', 'required');
		$this->form_validation->set_rules('frek_bab', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('keluhan_bab', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('karakter_feces', 'Suhu', 'required');
		$this->form_validation->set_rules('warna_feces', 'SPo2', 'required');
		$this->form_validation->set_rules('frek_bak', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('warna_bak', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('keluhan_bak', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('masalah', 'GCS', 'required');
		$this->form_validation->set_rules('rencana', 'Kondisi Umum', 'required');
		if ($this->form_validation->run()) {
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
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_ass_per_igd');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'pRujuk' => form_error('pRujuk'),
				'gcs' => form_error('gcs'),
				'kondisi_umum' => form_error('kondisi_umum'),
				'tekanan_darah' => form_error('tekanan_darah'),
				'suhu' => form_error('suhu'),
				'spo2' => form_error('spo2'),
				'frequensi_nadi' => form_error('frequensi_nadi'),
				'berat_badan' => form_error('berat_badan'),
				'frequensi_nafas' => form_error('frequensi_nafas'),
				'tinggi_badan' => form_error('tinggi_badan'),
				'kebutuhan_khusus' => form_error('kebutuhan_khusus'),
				'asesment_triase' => form_error('asesment_triase'),
				'wajib_ibadah' => form_error('wajib_ibadah'),
				'thaharah' => form_error('thaharah'),
				'sholat' => form_error('sholat'),
				'faktor_nyeri' => form_error('faktor_nyeri'),
				'kualitas_nyeri' => form_error('kualitas_nyeri'),
				'lokasi_nyeri' => form_error('lokasi_nyeri'),
				'skala_nyeri' => form_error('skala_nyeri'),
				'durasi' => form_error('durasi'),
				'faktor_peringan' => form_error('faktor_peringan'),
				'efek_nyeri' => form_error('efek_nyeri'),
				'penurunan_bb' => form_error('penurunan_bb'),
				'kurang_makan' => form_error('kurang_makan'),
				'kurus' => form_error('kurus'),
				'turun_bb' => form_error('turun_bb'),
				'diare' => form_error('diare'),
				'makan_kurang' => form_error('makan_kurang'),
				'malnutrisi' => form_error('malnutrisi'),
				'sempoyongan' => form_error('sempoyongan'),
				'penopang' => form_error('penopang'),
				'tingkat_risiko' => form_error('risiko'),
				'info_dpjp' => form_error('info_dpjp'),

				'frek_bab' => form_error('frek_bab'),
				'keluhan_bab' => form_error('keluhan_bab'),
				'karakter_feces' => form_error('karakter_feces'),
				'warna_feces' => form_error('warna_feces'),
				'frek_bak' => form_error('frek_bak'),
				'warna_bak' => form_error('warna_bak'),
				'keluhan_bak' => form_error('keluhan_bak'),
				'masalah' => form_error('masalah'),
				'rencana' => form_error('rencana'),
			);
		}

		echo json_encode($out);
	}

	public function insert_super_ranap_igd()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
		$this->form_validation->set_rules('dokter_merawat', 'Dokter Merawat', 'required');
		$this->form_validation->set_rules('dokter_pengirim', 'Dokter Pengirim', 'required');
		$this->form_validation->set_rules('kamar_rawat', 'Kamar Rawat', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'diagnosis' => $this->input->post('diagnosis'),
				'dokter_merawat' => $this->input->post('dokter_merawat'),
				'dokter_pengirim' => $this->input->post('dokter_pengirim'),
				'kamar_rawat' => $this->input->post('kamar_rawat'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_perintah_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'diagnosis' => form_error('diagnosis'),
				'dokter_merawat' => form_error('dokter_merawat'),
				'dokter_pengirim' => form_error('dokter_pengirim'),
				'kamar_rawat' => form_error('kamar_rawat'),
			);
		}
		echo json_encode($out);
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
	public function insert_asses_dokter_igd()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$img = $this->input->post('gambar');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = "assets/images/" . uniqid(time(), true) . ".png";
		$success = file_put_contents($file, $data);
		$img1 = $this->input->post('ttd');
		$img1 = str_replace('data:image/png;base64,', '', $img1);
		$img1 = str_replace(' ', '+', $img1);
		$data1 = base64_decode($img1);
		$file1 = "assets/images/" . uniqid(time(), true) . ".png";
		$success1 = file_put_contents($file1, $data1);
		$this->form_validation->set_rules('keluhan', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('riwayat', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('riwayat_alergi', 'GCS', 'required');
		$this->form_validation->set_rules('psikologis', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('ham_sos', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('ham_eko', 'Suhu', 'required');
		$this->form_validation->set_rules('ham_spirit', 'SPo2', 'required');
		$this->form_validation->set_rules('usg', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('ekg', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('ctg', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('periksa_lain', 'GCS', 'required');
		$this->form_validation->set_rules('tindak_lanjut', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('konsul', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('keadaan_pulang', 'Suhu', 'required');
		$this->form_validation->set_rules('terapi', 'SPo2', 'required');
		if ($this->form_validation->run()) {
			$data   =   array(
				'no_rm' => $this->input->post('no_rm'),
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'keluhan' => $this->input->post('keluhan'),
				'riwayat' => $this->input->post('riwayat'),
				'riwayat_alergi' => $this->input->post('riwayat_alergi'),
				'psikologis' => $this->input->post('psikologis'),
				'ham_sos' => $this->input->post('ham_sos'),
				'ham_eko' => $this->input->post('ham_eko'),
				'ham_spirit' => $this->input->post('ham_spirit'),
				'kepala' => $this->input->post('kepala'),
				'hidung' => $this->input->post('hidung'),
				'mulut' => $this->input->post('mulut'),
				'leher' => $this->input->post('leher'),
				'thorax' => $this->input->post('thorax'),
				'jantung' => $this->input->post('jantung'),
				'paru' => $this->input->post('paru'),
				'andomen' => $this->input->post('andomen'),
				'punggung' => $this->input->post('punggung'),
				'ekstremitas' => $this->input->post('ekstremitas'),
				// 'labor' => $this->input->post('labor'),
				// 'jam_periksa_labor' => $this->input->post('jam_periksa'),
				// 'jam_selesai_labor' => $this->input->post('jam_selesai'),
				// 'rontgen' => $this->input->post('rontgen'),
				// 'jam_periksa_rontgen' => $this->input->post('periksa'),
				// 'jam_selesai_rontgen' => $this->input->post('selesai'),
				'usg' => $this->input->post('usg'),
				'ekg' => $this->input->post('ekg'),
				'ctg' => $this->input->post('ctg'),
				'periksa_lain' => $this->input->post('periksa_lain'),
				'tindak_lanjut' => $this->input->post('tindak_lanjut'),
				'konsul' => $this->input->post('konsul'),
				'keadaan_pulang' => $this->input->post('kondisi_pulang'),
				'terapi' => $this->input->post('terapi'),
				'gambar' => $file,
				'ttd' => $file1,
				'tanggal' => $tgl,
				'staff' => $staff,

			);
			// print $success ? $file : 'Unable to save the file.';
			// print $success1 ? $file1 : 'Unable to save the file.';
			$this->M_Erm->insert($data, 'form_ass_dokter_igd');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'keluhan' => form_error('keluhan'),
				'riwayat' => form_error('riwayat'),
				'riwayat_alergi' => form_error('riwayat_alergi'),
				'psikologis' => form_error('psikologis'),
				'ham_sos' => form_error('ham_sos'),
				'ham_eko' => form_error('ham_eko'),
				'ham_spirit' => form_error('ham_spirit'),

				'tindak_lanjut' => form_error('tindak_lanjut'),
				'konsul' => form_error('konsul'),
				'keadaan_pulang' => form_error('kondisi_pulang'),
				'terapi' => form_error('terapi'),
			);
		}
		echo json_encode($out);
	}
	public function insert_lembar_rujukan()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$this->form_validation->set_rules('tempat', 'Yang Bersangkutan', 'required');
		$this->form_validation->set_rules('tempat1', 'Yang Bersangkutan', 'required');
		$this->form_validation->set_rules('riwayat_penyakit', 'Riwayat Penyakit', 'required');
		$this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
		$this->form_validation->set_rules('hasil_periksa', 'Hasil Periksa', 'required');
		$this->form_validation->set_rules('terapi', 'Terapi ', 'required');
		$this->form_validation->set_rules('terapi1', 'Terapi I', 'required');
		$this->form_validation->set_rules('saran', 'Saran', 'required');

		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tempat' => $this->input->post('tempat'),
				'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
				'diagnosis' => $this->input->post('diagnosis'),
				'tempat1' => $this->input->post('tempat1'),
				'hasil_periksa' => $this->input->post('hasil_periksa'),
				'terapi' => $this->input->post('terapi'),
				'terapi1' => $this->input->post('terapi1'),
				'saran' => $this->input->post('saran'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_lembar_rujukan');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'tempat' => form_error('tempat'),
				'riwayat_penyakit' => form_error('riwayat_penyakit'),
				'diagnosis' => form_error('diagnosis'),
				'tempat1' => form_error('tempat1'),
				'hasil_periksa' => form_error('hasil_periksa'),
				'terapi' => form_error('terapi'),
				'terapi1' => form_error('terapi1'),
				'saran' => form_error('saran'),
				// 'gambar' => form_error('gambar'),
			);
		}
		echo json_encode($out);
	}
	public function insert_penolakan_tindakan()
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
		$this->form_validation->set_rules('pemberi_info', 'Pemberi Info', 'isset');
		$this->form_validation->set_rules('penerima_info', 'Penerima Info', 'isset');
		$this->form_validation->set_rules('diagnosis', 'Diagnosis', 'isset');
		$this->form_validation->set_rules('td_diagnosis', 'Tanda Diagnosis', 'isset');
		$this->form_validation->set_rules('diagnosis_d', 'Diagnosis', 'required');
		$this->form_validation->set_rules('td_diagnosis_d', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('tindakan', 'GCS', 'required');
		$this->form_validation->set_rules('td_tindakan', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('indikasi', 'GCS', 'required');
		$this->form_validation->set_rules('td_indikasi', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('tatacara', 'GCS', 'required');
		$this->form_validation->set_rules('td_tatacara', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('tujuan', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('td_tujuan', 'Suhu', 'isset');
		$this->form_validation->set_rules('risiko', 'SPo2', 'required');
		$this->form_validation->set_rules('td_risiko', 'Frequensi Nadi', 'isset');
		$this->form_validation->set_rules('prognosis', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('td_prognosis', 'Asal Rujuk', 'isset');
		$this->form_validation->set_rules('alt_risiko', 'GCS', 'required');
		$this->form_validation->set_rules('td_alt_risiko', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('alt_risiko', 'GCS', 'required');
		$this->form_validation->set_rules('td_alt_risiko', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('hal_lain', 'GCS', 'required');
		$this->form_validation->set_rules('td_hal_lain', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('ttd_pemberi_info', 'Tekanan Darah', 'isset');
		$this->form_validation->set_rules('ttd_penerima_info', 'Suhu', 'isset');
		$this->form_validation->set_rules('nama', 'SPo2', 'required');
		$this->form_validation->set_rules('umur', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('alamat', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('jk', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('tolak_tindakan', 'Asal Rujuk', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'pemberi_info' => $this->input->post('pemberi_info'),
				'penerima_info' => $this->input->post('penerima_info'),
				'diagnosis' => $this->input->post('diagnosis'),
				'td_diagnosis' => $this->input->post('td_diagnosis'),
				'diagnosis_d' => $this->input->post('diagnosis_d'),
				'td_diagnosis_d' => $this->input->post('td_diagnosis_d'),
				'tindakan' => $this->input->post('tindakan'),
				'td_tindakan' => $this->input->post('td_tindakan'),
				'indikasi' => $this->input->post('indikasi'),
				'td_indikasi' => $this->input->post('td_indikasi'),
				'tatacara' => $this->input->post('tatacara'),
				'td_tatacara' => $this->input->post('td_tatacara'),
				'tujuan' => $this->input->post('tujuan'),
				'td_tujuan' => $this->input->post('td_tujuan'),
				'risiko' => $this->input->post('risiko'),
				'td_risiko' => $this->input->post('td_risiko'),
				'prognosis' => $this->input->post('prognosis'),
				'td_prognosis' => $this->input->post('td_prognosis'),
				'alt_risiko' => $this->input->post('alt_risiko'),
				'td_alt_risiko' => $this->input->post('td_alt_risiko'),
				'hal_lain' => $this->input->post('hal_lain'),
				'td_hal_lain' => $this->input->post('td_hal_lain'),
				'ttd_pemberi_info' => $this->input->post('ttd_pemberi_info'),
				'ttd_penerima_info' => $this->input->post('ttd_penerima_info'),
				'nama' => $this->input->post('nama'),
				'umur' => $this->input->post('umur'),
				'alamat' => $this->input->post('alamat'),
				'jk' => $this->input->post('jk'),
				'tolak_tindakan' => $this->input->post('tolak_tindakan'),
				'ttd' => $file,
				'ttd1' => $file1,
				'ttd2' => $file2,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_penolakan_tindakan_dokter');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'pemberi_info' => form_error('pemberi_info'),
				'penerima_info' => form_error('penerima_info'),
				'diagnosis' => form_error('diagnosis'),
				'td_diagnosis' => form_error('td_diagnosis'),
				'diagnosis_d' => form_error('diagnosis_d'),
				'td_diagnosis_d' => form_error('td_diagnosis_d'),
				'tindakan' => form_error('tindakan'),
				'td_tindakan' => form_error('td_tindakan'),
				'indikasi' => form_error('indikasi'),
				'td_indikasi' => form_error('td_indikasi'),
				'tatacara' => form_error('tatacara'),
				'td_tatacara' => form_error('td_tatacara'),
				'tujuan' => form_error('tujuan'),
				'td_tujuan' => form_error('td_tujuan'),
				'risiko' => form_error('risiko'),
				'td_risiko' => form_error('td_risiko'),
				'prognosis' => form_error('prognosis'),
				'td_prognosis' => form_error('td_prognosis'),
				'alt_risiko' => form_error('alt_risiko'),
				'td_alt_risiko' => form_error('td_alt_risiko'),
				'hal_lain' => form_error('hal_lain'),
				'td_hal_lain' => form_error('td_hal_lain'),
				'ttd_pemberi_info' => form_error('ttd_pemberi_info'),
				'ttd_penerima_info' => form_error('ttd_penerima_info'),
				'nama' => form_error('nama'),
				'umur' => form_error('umur'),
				'alamat' => form_error('alamat'),
				'jk' => form_error('jk'),
				'tolak_tindakan' => form_error('tolak_tindakan'),
			);
		}
		echo json_encode($out);
	}
	public function insert_observasi()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('gawat', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('nama_supir', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('nama_tm', 'GCS', 'required');
		$this->form_validation->set_rules('tgl', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('jenis_kasus', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('berangkat', 'Suhu', 'required');
		$this->form_validation->set_rules('tujuan', 'SPo2', 'required');
		$this->form_validation->set_rules('jam_brgkt', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('jam_tiba', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('ale_obat', 'Asal Rujuk', 'required');
		if ($this->form_validation->run() == true) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'gawat' => $this->input->post('gawat'),
				'nama_supir' => $this->input->post('nama_supir'),
				'nama_tm' => $this->input->post('nama_tm'),
				'tgl' => $this->input->post('tgl'),
				'jenis_kasus' => $this->input->post('jenis_kasus'),
				'berangkat' => $this->input->post('berangkat'),
				'tujuan' => $this->input->post('tujuan'),
				'jam_brgkt' => $this->input->post('jam_brgkt'),
				'jam_tiba' => $this->input->post('jam_tiba'),
				'ale_obat' => $this->input->post('ale_obat'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			$this->M_Erm->insert($data, 'form_observasi');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'gawat' => form_error('gawat'),
				'nama_supir' => form_error('nama_supir'),
				'nama_tm' => form_error('nama_tm'),
				'tgl' => form_error('tgl'),
				'jenis_kasus' => form_error('jenis_kasus'),
				'berangkat' => form_error('berangkat'),
				'tujuan' => form_error('tujuan'),
				'jam_brgkt' => form_error('jam_brgkt'),
				'jam_tiba' => form_error('jam_tiba'),
				'ale_obat' => form_error('ale_obat'),
			);
		}
		echo json_encode($out);
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
	public function insert_persetujuan_tindakan()
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
		$this->form_validation->set_rules('pemberi_info', 'Pemberi Info', 'isset');
		$this->form_validation->set_rules('penerima_info', 'Penerima Info', 'isset');
		$this->form_validation->set_rules('diagnosis', 'Diagnosis', 'isset');
		$this->form_validation->set_rules('td_diagnosis', 'Tanda Diagnosis', 'isset');
		$this->form_validation->set_rules('diagnosis_d', 'Diagnosis', 'required');
		$this->form_validation->set_rules('td_diagnosis_d', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('tindakan', 'GCS', 'required');
		$this->form_validation->set_rules('td_tindakan', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('indikasi', 'GCS', 'required');
		$this->form_validation->set_rules('td_indikasi', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('tatacara', 'GCS', 'required');
		$this->form_validation->set_rules('td_tatacara', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('tujuan', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('td_tujuan', 'Suhu', 'isset');
		$this->form_validation->set_rules('risiko', 'SPo2', 'required');
		$this->form_validation->set_rules('td_risiko', 'Frequensi Nadi', 'isset');
		$this->form_validation->set_rules('prognosis', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('td_prognosis', 'Asal Rujuk', 'isset');
		$this->form_validation->set_rules('alt_risiko', 'GCS', 'required');
		$this->form_validation->set_rules('td_alt_risiko', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('alt_risiko', 'GCS', 'required');
		$this->form_validation->set_rules('td_alt_risiko', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('hal_lain', 'GCS', 'required');
		$this->form_validation->set_rules('td_hal_lain', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('ttd_pemberi_info', 'Tekanan Darah', 'isset');
		$this->form_validation->set_rules('ttd_penerima_info', 'Suhu', 'isset');
		$this->form_validation->set_rules('nama', 'SPo2', 'required');
		$this->form_validation->set_rules('umur', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('alamat', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('jk', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('tolak_tindakan', 'Asal Rujuk', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'pemberi_info' => $this->input->post('pemberi_info'),
				'penerima_info' => $this->input->post('penerima_info'),
				'diagnosis' => $this->input->post('diagnosis'),
				'td_diagnosis' => $this->input->post('td_diagnosis'),
				'diagnosis_d' => $this->input->post('diagnosis_d'),
				'td_diagnosis_d' => $this->input->post('td_diagnosis_d'),
				'tindakan' => $this->input->post('tindakan'),
				'td_tindakan' => $this->input->post('td_tindakan'),
				'indikasi' => $this->input->post('indikasi'),
				'td_indikasi' => $this->input->post('td_indikasi'),
				'tatacara' => $this->input->post('tatacara'),
				'td_tatacara' => $this->input->post('td_tatacara'),
				'tujuan' => $this->input->post('tujuan'),
				'td_tujuan' => $this->input->post('td_tujuan'),
				'risiko' => $this->input->post('risiko'),
				'td_risiko' => $this->input->post('td_risiko'),
				'prognosis' => $this->input->post('prognosis'),
				'td_prognosis' => $this->input->post('td_prognosis'),
				'alt_risiko' => $this->input->post('alt_risiko'),
				'td_alt_risiko' => $this->input->post('td_alt_risiko'),
				'hal_lain' => $this->input->post('hal_lain'),
				'td_hal_lain' => $this->input->post('td_hal_lain'),
				'ttd_pemberi_info' => $this->input->post('ttd_pemberi_info'),
				'ttd_penerima_info' => $this->input->post('ttd_penerima_info'),
				'nama' => $this->input->post('nama'),
				'umur' => $this->input->post('umur'),
				'alamat' => $this->input->post('alamat'),
				'jk' => $this->input->post('jk'),
				'tolak_tindakan' => $this->input->post('tolak_tindakan'),
				'ttd' => $file,
				'ttd1' => $file1,
				'ttd2' => $file2,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_persetujuan_tindakan_dokter');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'pemberi_info' => form_error('pemberi_info'),
				'penerima_info' => form_error('penerima_info'),
				'diagnosis' => form_error('diagnosis'),
				'td_diagnosis' => form_error('td_diagnosis'),
				'diagnosis_d' => form_error('diagnosis_d'),
				'td_diagnosis_d' => form_error('td_diagnosis_d'),
				'tindakan' => form_error('tindakan'),
				'td_tindakan' => form_error('td_tindakan'),
				'indikasi' => form_error('indikasi'),
				'td_indikasi' => form_error('td_indikasi'),
				'tatacara' => form_error('tatacara'),
				'td_tatacara' => form_error('td_tatacara'),
				'tujuan' => form_error('tujuan'),
				'td_tujuan' => form_error('td_tujuan'),
				'risiko' => form_error('risiko'),
				'td_risiko' => form_error('td_risiko'),
				'prognosis' => form_error('prognosis'),
				'td_prognosis' => form_error('td_prognosis'),
				'alt_risiko' => form_error('alt_risiko'),
				'td_alt_risiko' => form_error('td_alt_risiko'),
				'hal_lain' => form_error('hal_lain'),
				'td_hal_lain' => form_error('td_hal_lain'),
				'ttd_pemberi_info' => form_error('ttd_pemberi_info'),
				'ttd_penerima_info' => form_error('ttd_penerima_info'),
				'nama' => form_error('nama'),
				'umur' => form_error('umur'),
				'alamat' => form_error('alamat'),
				'jk' => form_error('jk'),
				'tolak_tindakan' => form_error('tolak_tindakan'),
			);
		}
		echo json_encode($out);
	}
	public function insert_tf_antar_rs()
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
		$this->form_validation->set_rules('periksa', 'Suhu', 'required');
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

				'periksa' => $this->input->post('periksa'),
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

				'periksa' => form_error('periksa'),
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
	public function insert_tf_intra_rs()
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
		$this->form_validation->set_rules('tglPindah', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('tuj_pindah', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('cara_tf', 'GCS', 'required');
		$this->form_validation->set_rules('kondisi_tf', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('kondisi_terima', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('keadaan_umum', 'Suhu', 'required');
		$this->form_validation->set_rules('kesadaran', 'SPo2', 'required');
		$this->form_validation->set_rules('tekanan_darah', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('suhu', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('frequensi_nadi', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('rr', 'GCS', 'required');
		$this->form_validation->set_rules('skala_nyeri', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('keluhan', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('riwayat_penyakit', 'Suhu', 'required');
		$this->form_validation->set_rules('alergi', 'SPo2', 'required');
		$this->form_validation->set_rules('tekanan_darah1', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('suhu1', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('frequensi_nadi1', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('rr1', 'GCS', 'required');
		$this->form_validation->set_rules('skala_nyeri1', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('infus', 'Suhu', 'required');
		$this->form_validation->set_rules('tindakan', 'Suhu', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tglPindah' => $this->input->post('tglPindah'),
				'tuj_pindah' => $this->input->post('tuj_pindah'),
				'cara_tf' => $this->input->post('cara_tf'),
				'kondisi_tf' => $this->input->post('kondisi_tf'),
				'kondisi_terima' => $this->input->post('kondisi_terima'),
				'keadaan_umum' => $this->input->post('keadaan_umum'),
				'kesadaran' => $this->input->post('kesadaran'),
				'tekanan_darah' => $this->input->post('tekanan_darah'),
				'suhu' => $this->input->post('suhu'),
				'frequensi_nadi' => $this->input->post('frequensi_nadi'),
				'rr' => $this->input->post('rr'),
				'skala_nyeri' => $this->input->post('skala_nyeri'),
				'keluhan' => $this->input->post('keluhan'),
				'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
				'alergi' => $this->input->post('alergi'),
				'tekanan_darah1' => $this->input->post('tekanan_darah1'),
				'suhu1' => $this->input->post('suhu1'),
				'frequensi_nadi1' => $this->input->post('frequensi_nadi1'),
				'rr1' => $this->input->post('rr1'),
				'skala_nyeri1' => $this->input->post('skala_nyeri1'),

				'ctg' => $this->input->post('ctg'),
				'ekg' => $this->input->post('ekg'),
				'usg' => $this->input->post('usg'),
				'hsg' => $this->input->post('hsg'),
				'appendicogram' => $this->input->post('appendicogram'),
				'bno' => $this->input->post('bno'),
				'infus' => $this->input->post('infus'),
				'tindakan' => $this->input->post('tindakan'),
				'ttd' => $file,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_transfer_intra_rs');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'tglPindah' => form_error('tglPindah'),
				'tuj_pindah' => form_error('tuj_pindah'),
				'cara_tf' => form_error('cara_tf'),
				'kondisi_tf' => form_error('kondisi_tf'),
				'kondisi_terima' => form_error('kondisi_terima'),
				'keadaan_umum' => form_error('keadaan_umum'),
				'kesadaran' => form_error('kesadaran'),
				'tekanan_darah' => form_error('tekanan_darah'),
				'suhu' => form_error('suhu'),
				'frequensi_nadi' => form_error('frequensi_nadi'),
				'rr' => form_error('rr'),
				'skala_nyeri' => form_error('skala_nyeri'),
				'keluhan' => form_error('keluhan'),
				'riwayat_penyakit' => form_error('riwayat_penyakit'),
				'alergi' => form_error('alergi'),
				'tekanan_darah1' => form_error('tekanan_darah1'),
				'suhu1' => form_error('suhu1'),
				'frequensi_nadi1' => form_error('frequensi_nadi1'),
				'rr1' => form_error('rr1'),
				'skala_nyeri1' => form_error('skala_nyeri1'),
				'infus' => form_error('infus'),
				'tindakan' => form_error('tindakan'),
			);
		}
		echo json_encode($out);
	}
	public function insert_per_pen_rujukan()
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
		$this->form_validation->set_rules('pemberi_info', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('penerima_info', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('diagnosis', 'GCS', 'required');
		$this->form_validation->set_rules('td_diagnosis', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('alasan', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('td_alasan', 'Suhu', 'isset');
		$this->form_validation->set_rules('risiko', 'SPo2', 'required');
		$this->form_validation->set_rules('td_risiko', 'Frequensi Nadi', 'isset');
		$this->form_validation->set_rules('transport', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('td_transport', 'Asal Rujuk', 'isset');
		$this->form_validation->set_rules('hambatan', 'GCS', 'required');
		$this->form_validation->set_rules('td_hambatan', 'Kondisi Umum', 'isset');
		$this->form_validation->set_rules('ttd_pemberi_info', 'Tekanan Darah', 'isset');
		$this->form_validation->set_rules('ttd_penerima_info', 'Suhu', 'isset');
		$this->form_validation->set_rules('nama', 'SPo2', 'required');
		$this->form_validation->set_rules('umur', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('alamat', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('jk', 'Asal Rujuk', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'pemberi_info' => $this->input->post('pemberi_info'),
				'penerima_info' => $this->input->post('penerima_info'),
				'diagnosis' => $this->input->post('diagnosis'),
				'td_diagnosis' => $this->input->post('td_diagnosis'),
				'alasan' => $this->input->post('alasan'),
				'td_alasan' => $this->input->post('td_alasan'),
				'risiko' => $this->input->post('risiko'),
				'td_risiko' => $this->input->post('td_risiko'),
				'transport' => $this->input->post('transport'),
				'td_transport' => $this->input->post('td_transport'),
				'hambatan' => $this->input->post('hambatan'),
				'td_hambatan' => $this->input->post('td_hambatan'),
				'ttd_pemberi_info' => $this->input->post('ttd_pemberi_info'),
				'ttd_penerima_info' => $this->input->post('ttd_penerima_info'),
				'nama' => $this->input->post('nama'),
				'umur' => $this->input->post('umur'),
				'alamat' => $this->input->post('alamat'),
				'jk' => $this->input->post('jk'),
				'ttd' => $file,
				'ttd1' => $file1,
				'ttd2' => $file2,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_per_pen_rujukan');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'pemberi_info' => form_error('pemberi_info'),
				'penerima_info' => form_error('penerima_info'),
				'diagnosis' => form_error('diagnosis'),
				'td_diagnosis' => form_error('td_diagnosis'),
				'alasan' => form_error('alasan'),
				'td_alasan' => form_error('td_alasan'),
				'risiko' => form_error('risiko'),
				'td_risiko' => form_error('td_risiko'),
				'transport' => form_error('transport'),
				'td_transport' => form_error('td_transport'),
				'hambatan' => form_error('hambatan'),
				'td_hambatan' => form_error('td_hambatan'),
				'ttd_pemberi_info' => form_error('ttd_pemberi_info'),
				'ttd_penerima_info' => form_error('ttd_penerima_info'),
				'nama' => form_error('nama'),
				'umur' => form_error('umur'),
				'alamat' => form_error('alamat'),
				'jk' => form_error('jk'),
			);
		}
		echo json_encode($out);
	}
	// Cetak
	public function print_ass_per_igd($id)
	{
		$data['data'] = $this->M_Erm->cetakAssPer($id);
		$this->load->view('erm_print/ases_per_igd', $data);
	}
	public function print_ass_dok_igd($id)
	{
		$data['data'] = $this->M_Erm->cetakResumeMed($id);
		$this->load->view('erm_print/ases_dok_igd', $data);
	}

	public function print_resume_medis($id, $id_history)
	{
		$data['data'] = $this->M_Erm_poli->cetakResumeMed($id_history);

		$data['ttd'] = base_url() . 'assets/ttd/' . $data['data']['foto'];
		$data['terapi'] = $this->M_Erm->selectTerapiByIdPel($id);

		//tindakan poli
		$dataUser = $this->session->userdata('data_auth');
		$tipe = $dataUser->tipe;
		if ($tipe == 'poliinternis' || $tipe == 'poli') {
			$table = 'v_tindakan_poli_internis';
		} elseif ($tipe == 'poliobgyne' || $tipe == 'poli') {
			$table = 'v_tindakan_poli_obgyne';
		} elseif ($tipe == 'politht') {
			$table = 'v_tindakan_poli_tht';
		} elseif ($tipe == 'polimata') {
			$table = 'v_tindakan_poli_mata';
		} elseif ($tipe == 'polikulit') {
			$table = 'v_tindakan_poli_kulit';
		} elseif ($tipe == 'poliumum') {
			$table = 'v_tindakan_poli_umum';
		} elseif ($tipe == 'polianak') {
			$table = 'v_tindakan_poli_anak';
		} elseif ($tipe == 'poligigi' || $tipe == 'poliorthodonti') {
			$table = 'v_tindakan_poli_gigi';
		} elseif ($tipe == 'polijantung') {
			$table = 'v_tindakan_poli_jantung';
		} elseif ($tipe == 'polibedah') {
			$table = 'v_tindakan_poli_bedah';
		} elseif ($tipe == 'polifisio' || $tipe == 'rekam medis' || $tipe == 'rawatinap' || $tipe == 'icu' || $tipe == 'rehab') {
			$table = 'v_tindakan_poli_fisio';
		} elseif ($tipe == 'poliakupuntur') {
			$table = 'v_tindakan_poli_akupuntur';
		} elseif ($tipe == 'polibedahmulut') {
			$table = 'v_tindakan_poli_bedah_mulut';
		} elseif ($tipe == 'polikesjiwa') {
			$table = 'v_tindakan_poli_kes_jiwa';
		} elseif ($tipe == 'poliorthopedi') {
			$table = 'v_tindakan_poli_orthopedi';
		} elseif ($tipe == 'poliparu') {
			$table = 'v_tindakan_poli_paru';
		} elseif ($tipe == 'polisaraf') {
			$table = 'v_tindakan_poli_saraf';
		} elseif ($tipe == 'poliurologi') {
			$table = 'v_tindakan_poli_urologi';
		} elseif ($tipe == 'polipenyakitmulut') {
			$table = 'v_tindakan_poli_penyakit_mulut';
		} elseif ($tipe == 'poliginjal') {
			$table = 'v_tindakan_poli_ginjal';
		} elseif ($tipe == 'polipsikolog') {
			$table = 'v_tindakan_poli_psikolog';
		} elseif ($tipe == 'poligizi') {
			$table = 'v_tindakan_poli_gizi';
		} elseif ($tipe == 'terapiwicara') {
			$table = 'v_tindakan_poli_terapi_wicara';
		} elseif ($tipe == 'polihemodialisa') {
			$table = 'v_tindakan_poli_hd';
		} elseif ($tipe == 'kemoterapi') {
			$table = 'v_tindakan_poli_kemo';
		} elseif ($tipe == 'polistifin') {
			$table = 'v_tindakan_poli_stifin';
		} elseif ($tipe == 'poliorthodonti') {
			$table = 'v_tindakan_orthodenti';
		} elseif ($tipe == 'konservasigigi') {
			$table = 'v_tindakan_konservasi_gigi';
		} elseif ($tipe == 'okupasi') {
			$table = 'v_tindakan_okupasi';
		} else {
			//dinamis
			if ($row = $this->db->get_where('list_poli', ['tipe_staff' => $tipe])->row()) {
				//table tindakan
				$table = "v_" . $row->tindakan;
			}
		}
		$list_tindakan = $this->M_Poli->selectDataTindakanByIdPel($id, $table);
		$data['tindakan_poli'] = $list_tindakan;
		//radiologi
		$data['radiologi'] = $this->M_Poli->selectDataRadiologiById($id);
		//labor
		$data['labor'] = $this->M_Poli->selectDataLaborByIdAndStatus1($id);
		
		$this->load->view('erm_print/resume_medis_raj', $data);
	}

	// 	public function print_resume_medis($id,$id_history)
	// {
	// 	$data['data'] = $this->M_Erm_poli->cetakResumeMed($id_history);
	// 	$data['terapi'] = $this->M_Erm->selectTerapiByIdPel($id,$id_history);
	// 	$this->load->view('erm_print/resume_medis_raj', $data);
	// }
	public function print_observasi($id)
	{
		$data['data'] = $this->M_Erm->cetakObservasi($id);
		// $data['terapi'] = $this->M_Erm->selectTerapiByIdPel($id);
		$this->load->view('erm_print/observasi_transfer', $data);
	}
	public function print_sebab_kematian($id)
	{
		$data['data'] = $this->M_Erm->cetakSebabKematian($id);
		// $data['terapi'] = $this->M_Erm->selectTerapiByIdPel($id);
		$this->load->view('erm_print/sebab_kematian', $data);
	}
	public function print_intra($id, $id_history)
	{
		$data['data'] = $this->M_Erm->cetakIntra($id);
		$data['terapi'] = $this->M_Erm->selectTerapiByIdPel($id_history);
		$this->load->view('erm_print/transfer_intra_rs', $data);
	}
	public function print_antar($id, $id_history)
	{
		$data['data'] = $this->M_Erm->cetakAntar($id);
		$data['terapi'] = $this->M_Erm->selectTerapiByIdPel($id_history);
		$this->load->view('erm_print/trans_pas_antar_rs', $data);
	}
	public function print_peng_khusus($id, $id_pelayanan)
	{
		$data['data'] = $this->M_Erm->selectDataPasienIGDby_id($id_pelayanan, $id);
		$data['db'] = $this->M_Erm->selectListPengawasan($id);
		$this->load->view('erm_print/peng_khu_upmar_2017', $data);
	}
	public function print_per_pen_rujukan($id)
	{
		$data['data'] = $this->M_Erm->cetakPerPenRujuk($id);
		$this->load->view('erm_print/per_pen_rujukan', $data);
	}
	public function print_penolakan($id)
	{
		$data['data'] = $this->M_Erm->cetakPenolakan($id);
		$this->load->view('erm_print/penolakan_tindakan_kedokteran', $data);
	}
	public function print_persetujuan($id)
	{
		$data['data'] = $this->M_Erm->cetakPersetujuan($id);
		$this->load->view('erm_print/per_tin_kedokteran', $data);
	}
	public function print_rujukan($id)
	{
		$data['data'] = $this->M_Erm->cetakRujukan($id);
		$this->load->view('erm_print/lembar_rujukan', $data);
	}
	public function print_super_ranap($id)
	{
		$data['data'] = $this->M_Erm->cetakSuperRanap($id);
		$this->load->view('erm_print/super_rawat_inap_spri', $data);
	}
	public function print_penundaan($id)
	{
		$data['data'] = $this->M_Erm->cetakPenundaan($id);
		$this->load->view('erm_print/penundaan_pelayanan_pengobatan', $data);
	}
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
