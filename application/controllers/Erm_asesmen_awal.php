<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_asesmen_awal extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Erm');
		$this->load->model('M_Pencarian_Pasien');
		$this->load->model('M_Erm_masalah_kep');
	}

	public function form($id_pel, $id_his, $jenis_pelayanan)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		//////////////  antrol ///////////////////////
		$antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $id_pelayanan, 'poli' => $selectPasien->nama_poli]);
		if (count($antrian->result()) > 0) {
			// echo $antrian->row()->id_antrian;
			$data_antrol = [
				'kodebooking' => $antrian->row()->id_antrian,
				'taskid' => 4,
				'waktu' => strtotime('now') * 1000
			];
			update_antrian($data_antrol);
		}

		$staff = $this->session->userdata('data_auth');
		// $page_data['pasien'] = $selectPasien;
		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['jenis_pelayanan'] = $jenis_pelayanan;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();

		if ($staff->tipe == 'allpoli') {
			$page_data['url'] = base_url('All_Poli/Poli/') . $jenis_pelayanan;
		} else {
			$page_data['url'] = base_url('Erm_poli/form/') . $id_pel . '/' . $id_his . '/' . $jenis_pelayanan;
		}


		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_asses_rajal';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function tampilkan_masalah_keperawatan()
	{
		$data['masalah_keperawatan'] = $this->M_Erm_masalah_kep->get_all_data(); 
		$this->load->view('assets/_header');
		$this->load->view('erm_form/view_asses_rajal', $data);
		$this->load->view('assets/_footer');
	}
	public function edit_asses_perawat_igd($id_pel, $id_his, $jenis_pelayanan)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDbyid($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $id_pelayanan, 'poli' => $selectPasien->nama_poli]);
		if (count($antrian->result()) > 0) {
			// echo $antrian->row()->id_antrian;
			$data_antrol = [
				'kodebooking' => $antrian->row()->id_antrian,
				'taskid' => 4,
				'waktu' => strtotime('now') * 1000
			];
			update_antrian($data_antrol);
		}

		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['jenis_pelayanan'] = $jenis_pelayanan;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['agama'] = $selectPasien->agama;

		if ($staff->tipe == 'allpoli') {
			$page_data['url'] = base_url('All_Poli/Poli/') . $jenis_pelayanan;
		} else {
			$page_data['url'] = base_url('Erm_poli/form/') . $id_pel . '/' . $id_his . '/' . $jenis_pelayanan;
		}
		// $page_data['url']= base_url('Erm_poli/form/'). $id_pel .'/'. $id_his .'/'. $jenis_pelayanan;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();


		$asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_assesmen_awal_rajal');
		$page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_asses_rajal';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}


	//untuk rawat jalan
	public function insert_asses_rajal()
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
		// $this->form_validation->set_rules('tinggi_badan', 'Tinggi Badan', 'required');
		// $this->form_validation->set_rules('lingkar_lengan', 'lingkar_lengan', 'required');
		// $this->form_validation->set_rules('kebutuhan_khusus', 'Kondisi Umum', 'required');
		// $this->form_validation->set_rules('asesment_triase', 'Tekanan Darah', 'required');
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
			'id_pelayanan' => base64_decode(urldecode($this->input->post('id_pelayanan'))),
			'id_history' => base64_decode(urldecode($this->input->post('id_history'))),
			'no_rm' => $this->input->post('no_rm'),
			'kebutuhan_khusus' => $this->input->post('kebutuhan_khusus'),
			'tekanan_darah' => $this->input->post('tekanan_darah'),
			'suhu' => $this->input->post('suhu'),
			'berat_lahir' => $this->input->post('berat_lahir'),
			'frequensi_nadi' => $this->input->post('frequensi_nadi'),
			'tinggi_badan' => $this->input->post('tinggi_badan'),
			'lingkar_kepala' => $this->input->post('lingkar_kepala'),
			'frequensi_nafas' => $this->input->post('frequensi_nafas'),
			'berat_badan' => $this->input->post('berat_badan'),
			'lingkar_lengan' => $this->input->post('lingkar_lengan'),
			'bicara' => $this->input->post('bicara'),
			'komunikasi' => $this->input->post('komunikasi'),
			'psikologis' => $this->input->post('psikologis'),
			'sosiologi' => $this->input->post('sosiologi'),
			'ekonomi' => $this->input->post('ekonomi'),
			'keluhan_utama' => $this->input->post('keluhan_utama'),
			'penyakit_past' => $this->input->post('penyakit_past'),
			'penyakit_keluarga' => $this->input->post('penyakit_keluarga'),
			'alloanamnesa' => $this->input->post('alloanamnesa'),
			'riwayat_penggunaobat' => $this->input->post('riwayat_penggunaobat'),
			'alergi' => $this->input->post('alergi'),
			'skor_nyeri' => $this->input->post('skor_nyeri'),
			'skala_nyeri' => $this->input->post('skala_nyeri'),



			'jatuh' => $this->input->post('jatuh'),
			'gangguan_ba' => $this->input->post('gangguan_ba'),
			'bingung' => $this->input->post('bingung'),
			'depresi' => $this->input->post('depresi'),
			'pusing' => $this->input->post('pusing'),
			'jalan' => $this->input->post('jalan'),
			'pikun' => $this->input->post('pikun'),
			'obat' => $this->input->post('obat'),
			'perawatan' => $this->input->post('perawatan'),

			'penurunan_bb' => $this->input->post('penurunan_bb'),
			'kurang_makan' => $this->input->post('kurang_makan'),
			'turun_bb' => $this->input->post('turun_bb'),
			'kurus' => $this->input->post('kurus'),
			'diare' => $this->input->post('diare'),
			'makan_kurang' => $this->input->post('makan_kurang'),
			'malnutrisi' => $this->input->post('malnutrisi'),


			'harilahir' => $this->input->post('harilahir'),
			'di_lahir' => $this->input->post('di_lahir'),
			'tolonglahir' => $this->input->post('tolonglahir'),
			'anaklahir' => $this->input->post('anaklahir'),
			'berat_badan_lahir' => $this->input->post('berat_badan_lahir'),
			'tinggi_badan_lahir' => $this->input->post('tinggi_badan_lahir'),
			'berat_tinggi_lahir' => $this->input->post('berat_tinggi_lahir'),
			'Kelainan_lahir' => $this->input->post('Kelainan_lahir'),
			'Anak_mendapat' => $this->input->post('Anak_mendapat'),


			'imunisasi_dasar' => $this->input->post('imunisasi_dasar'),
			'imunisasi_ulang' => $this->input->post('imunisasi_ulang'),
			'umur_membalikan' => $this->input->post('umur_membalikan'),
			'umur_duduk' => $this->input->post('umur_duduk'),
			'umur_berdiri' => $this->input->post('umur_berdiri'),
			'umur_berjalan' => $this->input->post('umur_berjalan'),
			'umur_mengoceh' => $this->input->post('umur_mengoceh'),
			'umur_berbicara' => $this->input->post('umur_berbicara'),

			'usia_menstruasi' => $this->input->post('usia_menstruasi'),
			'siklus_menstruasi' => $this->input->post('siklus_menstruasi'),
			'jumlah_darah' => $this->input->post('jumlah_darah'),
			'nyeri_haid'  => $this->input->post('nyeri_haid'),
			'riwayat_obstrik1' => $this->input->post('riwayat_obstrik1'),
			'riwayat_obstrik2' => $this->input->post('riwayat_obstrik2'),
			'riwayat_obstrik3' => $this->input->post('riwayat_obstrik3'),
			'jumlah_anak' => $this->input->post('jumlah_anak'),
			'jumlah_anak1' => $this->input->post('jumlah_anak1'),
			'jumlah_anak2' => $this->input->post('jumlah_anak2'),

			'riwayat_kb' => $this->input->post('riwayat_kb'),
			'riwayat_hamil' => $this->input->post('riwayat_hamil'),
			'keluhan_hamil' => $this->input->post('keluhan_hamil'),
			'obat_hamil' => $this->input->post('obat_hamil'),

			'riwayat_pakai_obat' => $this->input->post('riwayat_pakai_obat'),
			'riwayat_pakai_obat1' => $this->input->post('riwayat_pakai_obat1'),
			'riwayat_pakai_obat2' => $this->input->post('riwayat_pakai_obat2'),

			'presentasi_ni' => $this->input->post('presentasi_ni'),

			'masalah_keperawatan' => $this->input->post('masalah_keperawatan'),






			'tanggal' => $tgl,
			'staff' => $staff,
		);
		//database
		$this->M_Erm->insert_rajal($data, 'form_assesmen_awal_rajal');
		$out['status'] = "success";
		// } else {
		// 	$out = array(
		// 		'error'   => true,
		// 		// 'pRujuk' => form_error('pRujuk'),
		// 		// 'gcs' => form_error('gcs'),
		// 		// 'kondisi_umum' => form_error('kondisi_umum'),
		// 		'tekanan_darah' => form_error('tekanan_darah'),
		// 		'suhu' => form_error('suhu'),
		// 		'berat_lahir' => form_error('berat_lahir'),
		// 		'frequensi_nadi' => form_error('frequensi_nadi'),
		// 		'tinggi_badan' => form_error('tinggi_badan'),
		// 		'lingkar_kepala' => form_error('lingkar_kepala'),
		// 		'frequensi_nafas' => form_error('frequensi_nafas'),
		// 		'berat_badan' => form_error('berat_badan'),
		// 		'lingkar_lengan' => form_error('lingkar_lengan'),
		// 		'frequensi_nafas' => form_error('frequensi_nafas'),
		// 		'keluhan_utama' => form_error('keluhan_utama'),
		// 		'riwayat_penggunaobat' => form_error('riwayat_penggunaobat'),
		// 		'riwayat_Alloanamnesa' => form_error('riwayat_Alloanamnesa'),
		// 		'harilahir' => form_error('harilahir'),
		// 		'di_lahir' => form_error('di_lahir'),
		// 		'tolonglahir' => form_error('tolonglahir'),
		// 		'anaklahir' => form_error('anaklahir'),
		// 		'berat_badan_lahir' => form_error('berat_badan_lahir'),
		// 		'tinggi_badan_lahir' => form_error('tinggi_badan_lahir'),
		// 		'berat_tinggi_lahir' => form_error('berat_tinggi_lahir'),
		// 		'Kelainan_lahir' => form_error('Kelainan_lahir'),
		// 		'imunisasi_dasar' => form_error('imunisasi_dasar'),
		// 		'imunisasi_ulang' => form_error('imunisasi_ulang'),
		// 		'umur_membalikan' => form_error('umur_membalikan'),
		// 		'umur_duduk' => form_error('umur_duduk'),
		// 		'umur_berdiri' => form_error('umur_berdiri'),
		// 		'umur_berjalan' => form_error('umur_berjalan'),
		// 		'umur_mengoceh' => form_error('umur_mengoceh'),
		// 		'umur_berbicara' => form_error('umur_berbicara'),
		// 		'usia_menstruasi' => form_error('usia_menstruasi'),
		// 		'siklus_menstruasi' => form_error('siklus_menstruasi'),
		// 		'riwayat_obstrik1' => form_error('riwayat_obstrik1'),
		// 		'riwayat_obstrik2' => form_error('riwayat_obstrik2'),
		// 		'riwayat_obstrik3' => form_error('riwayat_obstrik3'),
		// 		'jumlah_anak' => form_error('jumlah_anak'),
		// 		'jumlah_anak1' => form_error('jumlah_anak1'),
		// 		'jumlah_anak2' => form_error('jumlah_anak2'),
		// 		'riwayat_pakai_obat' => form_error('riwayat_pakai_obat'),
		// 		'riwayat_pakai_obat1' => form_error('riwayat_pakai_obat1'),
		// 		'riwayat_pakai_obat2' => form_error('riwayat_pakai_obat2'),
		// 		'kebutuhan_khusus' => form_error('kebutuhan_khusus'),
		// 		'Bicara' => form_error('Bicara'),
		// 		'komunikasi' => form_error('komunikasi'),
		// 		'psikologis' => form_error('psikologis'),
		// 		'sosiologi' => form_error('sosiologi'),
		// 		'ekonomi' => form_error('ekonomi'),
		// 		'penyakit_past'  => form_error('penyakit_past'),
		// 		'penyakit_keluarga' => form_error('penyakit_keluarga'),
		// 		'Anak_mendapat' => form_error('Anak_mendapat'),
		// 		'jumlah_darah' => form_error('jumlah_darah'),
		// 		'jumlah_darah' => form_error('nyeri_haid'),
		// 		'riwayat_kb' => form_error('riwayat_kb'),
		// 		'riwayat_hamil' => form_error('riwayat_hamil'),
		// 		'keluhan_hamil' => form_error('keluhan_hamil'),
		// 		'obat_hamil' => form_error('obat_hamil'),
		// 		'presentasi_ni' => form_error('presentasi_ni'),
		// 		'kontrol_ulang' => form_error('kontrol_ulang'),
		// 		'masukrawat_inap' => form_error('masukrawat_inap'),
		// 		'masalah_keperawatan' => form_error('masalah_keperawatan'),
		// 		'penurunan_bb_error' => form_error('penurunan_bb_error'),
		// 		'kurang_makan_error' => form_error('kurang_makan_error'),
		// 		'sempoyongan_error' => form_error('sempoyongan_error'),
		// 		'sempoyongan_error1' => form_error('sempoyongan_error1'),
		// 		'sempoyongan_error2' => form_error('sempoyongan_error2'),
		// 		'sempoyongan_error3' => form_error('sempoyongan_error3'),
		// 		'sempoyongan_error4' => form_error('sempoyongan_error4'),
		// 		'sempoyongan_error5' => form_error('sempoyongan_error5'),
		// 		'sempoyongan_error6' => form_error('sempoyongan_error6'),
		// 		'sempoyongan_error7' => form_error('sempoyongan_error7'),
		// 		'sempoyongan_error8' => form_error('sempoyongan_error8'),
		// 		'alergi_error' => form_error('alergi_error'),

		// 	);
		// }

		///end
		echo json_encode($out);
	}

	public function update_asses_perawat()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$data   =   array(
			'id_pelayanan' => base64_decode(urldecode($this->input->post('id_pelayanan'))),
			'id_history' => base64_decode(urldecode($this->input->post('id_history'))),
			'no_rm' => $this->input->post('no_rm'),
			'kebutuhan_khusus' => $this->input->post('kebutuhan_khusus'),
			'tekanan_darah' => $this->input->post('tekanan_darah'),
			'suhu' => $this->input->post('suhu'),
			'berat_lahir' => $this->input->post('berat_lahir'),
			'frequensi_nadi' => $this->input->post('frequensi_nadi'),
			'tinggi_badan' => $this->input->post('tinggi_badan'),
			'lingkar_kepala' => $this->input->post('lingkar_kepala'),
			'frequensi_nafas' => $this->input->post('frequensi_nafas'),
			'berat_badan' => $this->input->post('berat_badan'),
			'lingkar_lengan' => $this->input->post('lingkar_lengan'),
			'bicara' => $this->input->post('bicara'),
			'komunikasi' => $this->input->post('komunikasi'),
			'psikologis' => $this->input->post('psikologis'),
			'sosiologi' => $this->input->post('sosiologi'),
			'ekonomi' => $this->input->post('ekonomi'),
			'keluhan_utama' => $this->input->post('keluhan_utama'),
			'penyakit_past' => $this->input->post('penyakit_past'),
			'penyakit_keluarga' => $this->input->post('penyakit_keluarga'),
			'alloanamnesa' => $this->input->post('alloanamnesa'),
			'riwayat_penggunaobat' => $this->input->post('riwayat_penggunaobat'),
			'alergi' => $this->input->post('alergi'),
			'skor_nyeri' => $this->input->post('skor_nyeri'),
			'skala_nyeri' => $this->input->post('skala_nyeri'),



			'jatuh' => $this->input->post('jatuh'),
			'gangguan_ba' => $this->input->post('gangguan_ba'),
			'bingung' => $this->input->post('bingung'),
			'depresi' => $this->input->post('depresi'),
			'pusing' => $this->input->post('pusing'),
			'jalan' => $this->input->post('jalan'),
			'pikun' => $this->input->post('pikun'),
			'obat' => $this->input->post('obat'),
			'perawatan' => $this->input->post('perawatan'),

			'penurunan_bb' => $this->input->post('penurunan_bb'),
			'kurang_makan' => $this->input->post('kurang_makan'),
			'turun_bb' => $this->input->post('turun_bb'),
			'kurus' => $this->input->post('kurus'),
			'diare' => $this->input->post('diare'),
			'makan_kurang' => $this->input->post('makan_kurang'),
			'malnutrisi' => $this->input->post('malnutrisi'),


			'harilahir' => $this->input->post('harilahir'),
			'di_lahir' => $this->input->post('di_lahir'),
			'tolonglahir' => $this->input->post('tolonglahir'),
			'anaklahir' => $this->input->post('anaklahir'),
			'berat_badan_lahir' => $this->input->post('berat_badan_lahir'),
			'tinggi_badan_lahir' => $this->input->post('tinggi_badan_lahir'),
			'berat_tinggi_lahir' => $this->input->post('berat_tinggi_lahir'),
			'Kelainan_lahir' => $this->input->post('Kelainan_lahir'),
			'Anak_mendapat' => $this->input->post('Anak_mendapat'),


			'imunisasi_dasar' => $this->input->post('imunisasi_dasar'),
			'imunisasi_ulang' => $this->input->post('imunisasi_ulang'),
			'umur_membalikan' => $this->input->post('umur_membalikan'),
			'umur_duduk' => $this->input->post('umur_duduk'),
			'umur_berdiri' => $this->input->post('umur_berdiri'),
			'umur_berjalan' => $this->input->post('umur_berjalan'),
			'umur_mengoceh' => $this->input->post('umur_mengoceh'),
			'umur_berbicara' => $this->input->post('umur_berbicara'),

			'usia_menstruasi' => $this->input->post('usia_menstruasi'),
			'siklus_menstruasi' => $this->input->post('siklus_menstruasi'),
			'jumlah_darah' => $this->input->post('jumlah_darah'),
			'nyeri_haid'  => $this->input->post('nyeri_haid'),
			'riwayat_obstrik1' => $this->input->post('riwayat_obstrik1'),
			'riwayat_obstrik2' => $this->input->post('riwayat_obstrik2'),
			'riwayat_obstrik3' => $this->input->post('riwayat_obstrik3'),
			'jumlah_anak' => $this->input->post('jumlah_anak'),
			'jumlah_anak1' => $this->input->post('jumlah_anak1'),
			'jumlah_anak2' => $this->input->post('jumlah_anak2'),

			'riwayat_kb' => $this->input->post('riwayat_kb'),
			'riwayat_hamil' => $this->input->post('riwayat_hamil'),
			'keluhan_hamil' => $this->input->post('keluhan_hamil'),
			'obat_hamil' => $this->input->post('obat_hamil'),

			'riwayat_pakai_obat' => $this->input->post('riwayat_pakai_obat'),
			'riwayat_pakai_obat1' => $this->input->post('riwayat_pakai_obat1'),
			'riwayat_pakai_obat2' => $this->input->post('riwayat_pakai_obat2'),

			'presentasi_ni' => $this->input->post('presentasi_ni'),

			'masalah_keperawatan' => $this->input->post('masalah_keperawatan'),






			'tanggal' => $tgl,
			'staff' => $staff,
		);
		$where = array('id_form_assesmen_awal_rajal' => $this->input->post('id'));
		// print $success ? $file : 'Unable to save the file.';
		// print $success1 ? $file1 : 'Unable to save the file.';
		$this->M_Erm->update($data, $where, 'form_assesmen_awal_rajal');
		$out['status'] = "success";



		echo json_encode($out);
	}
	public function get_ass_per()
	{
		$id = base64_decode(urldecode($this->input->post('id')));
		$db = $this->db->get_where('form_assesmen_awal_rajal', ['id_history' => $id])->row_array();
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
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_asesmen_awal extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Erm');
		$this->load->model('M_Pencarian_Pasien');
		$this->load->model('M_Erm_masalah_kep');
	}

	public function form($id_pel, $id_his, $jenis_pelayanan)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		//////////////  antrol ///////////////////////
		$antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $id_pelayanan, 'poli' => $selectPasien->nama_poli]);
		if (count($antrian->result()) > 0) {
			// echo $antrian->row()->id_antrian;
			$data_antrol = [
				'kodebooking' => $antrian->row()->id_antrian,
				'taskid' => 4,
				'waktu' => strtotime('now') * 1000
			];
			update_antrian($data_antrol);
		}

		$staff = $this->session->userdata('data_auth');
		// $page_data['pasien'] = $selectPasien;
		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['jenis_pelayanan'] = $jenis_pelayanan;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();

		if ($staff->tipe == 'allpoli') {
			$page_data['url'] = base_url('All_Poli/Poli/') . $jenis_pelayanan;
		} else {
			$page_data['url'] = base_url('Erm_poli/form/') . $id_pel . '/' . $id_his . '/' . $jenis_pelayanan;
		}


		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_asses_rajal';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function tampilkan_masalah_keperawatan()
	{
		$data['masalah_keperawatan'] = $this->M_Erm_masalah_kep->get_all_data(); 
		$this->load->view('assets/_header');
		$this->load->view('erm_form/view_asses_rajal', $data);
		$this->load->view('assets/_footer');
	}
	public function edit_asses_perawat_igd($id_pel, $id_his, $jenis_pelayanan)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDbyid($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $id_pelayanan, 'poli' => $selectPasien->nama_poli]);
		if (count($antrian->result()) > 0) {
			// echo $antrian->row()->id_antrian;
			$data_antrol = [
				'kodebooking' => $antrian->row()->id_antrian,
				'taskid' => 4,
				'waktu' => strtotime('now') * 1000
			];
			update_antrian($data_antrol);
		}

		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['jenis_pelayanan'] = $jenis_pelayanan;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['agama'] = $selectPasien->agama;

		if ($staff->tipe == 'allpoli') {
			$page_data['url'] = base_url('All_Poli/Poli/') . $jenis_pelayanan;
		} else {
			$page_data['url'] = base_url('Erm_poli/form/') . $id_pel . '/' . $id_his . '/' . $jenis_pelayanan;
		}
		// $page_data['url']= base_url('Erm_poli/form/'). $id_pel .'/'. $id_his .'/'. $jenis_pelayanan;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();


		$asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_assesmen_awal_rajal');
		$page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_asses_rajal';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}


	//untuk rawat jalan
	public function insert_asses_rajal()
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
		// $this->form_validation->set_rules('tinggi_badan', 'Tinggi Badan', 'required');
		// $this->form_validation->set_rules('lingkar_lengan', 'lingkar_lengan', 'required');
		// $this->form_validation->set_rules('kebutuhan_khusus', 'Kondisi Umum', 'required');
		// $this->form_validation->set_rules('asesment_triase', 'Tekanan Darah', 'required');
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
			'id_pelayanan' => base64_decode(urldecode($this->input->post('id_pelayanan'))),
			'id_history' => base64_decode(urldecode($this->input->post('id_history'))),
			'no_rm' => $this->input->post('no_rm'),
			'kebutuhan_khusus' => $this->input->post('kebutuhan_khusus'),
			'tekanan_darah' => $this->input->post('tekanan_darah'),
			'suhu' => $this->input->post('suhu'),
			'berat_lahir' => $this->input->post('berat_lahir'),
			'frequensi_nadi' => $this->input->post('frequensi_nadi'),
			'tinggi_badan' => $this->input->post('tinggi_badan'),
			'lingkar_kepala' => $this->input->post('lingkar_kepala'),
			'frequensi_nafas' => $this->input->post('frequensi_nafas'),
			'berat_badan' => $this->input->post('berat_badan'),
			'lingkar_lengan' => $this->input->post('lingkar_lengan'),
			'bicara' => $this->input->post('bicara'),
			'komunikasi' => $this->input->post('komunikasi'),
			'psikologis' => $this->input->post('psikologis'),
			'sosiologi' => $this->input->post('sosiologi'),
			'ekonomi' => $this->input->post('ekonomi'),
			'keluhan_utama' => $this->input->post('keluhan_utama'),
			'penyakit_past' => $this->input->post('penyakit_past'),
			'penyakit_keluarga' => $this->input->post('penyakit_keluarga'),
			'alloanamnesa' => $this->input->post('alloanamnesa'),
			'riwayat_penggunaobat' => $this->input->post('riwayat_penggunaobat'),
			'alergi' => $this->input->post('alergi'),
			'skor_nyeri' => $this->input->post('skor_nyeri'),
			'skala_nyeri' => $this->input->post('skala_nyeri'),



			'jatuh' => $this->input->post('jatuh'),
			'gangguan_ba' => $this->input->post('gangguan_ba'),
			'bingung' => $this->input->post('bingung'),
			'depresi' => $this->input->post('depresi'),
			'pusing' => $this->input->post('pusing'),
			'jalan' => $this->input->post('jalan'),
			'pikun' => $this->input->post('pikun'),
			'obat' => $this->input->post('obat'),
			'perawatan' => $this->input->post('perawatan'),

			'penurunan_bb' => $this->input->post('penurunan_bb'),
			'kurang_makan' => $this->input->post('kurang_makan'),
			'turun_bb' => $this->input->post('turun_bb'),
			'kurus' => $this->input->post('kurus'),
			'diare' => $this->input->post('diare'),
			'makan_kurang' => $this->input->post('makan_kurang'),
			'malnutrisi' => $this->input->post('malnutrisi'),


			'harilahir' => $this->input->post('harilahir'),
			'di_lahir' => $this->input->post('di_lahir'),
			'tolonglahir' => $this->input->post('tolonglahir'),
			'anaklahir' => $this->input->post('anaklahir'),
			'berat_badan_lahir' => $this->input->post('berat_badan_lahir'),
			'tinggi_badan_lahir' => $this->input->post('tinggi_badan_lahir'),
			'berat_tinggi_lahir' => $this->input->post('berat_tinggi_lahir'),
			'Kelainan_lahir' => $this->input->post('Kelainan_lahir'),
			'Anak_mendapat' => $this->input->post('Anak_mendapat'),


			'imunisasi_dasar' => $this->input->post('imunisasi_dasar'),
			'imunisasi_ulang' => $this->input->post('imunisasi_ulang'),
			'umur_membalikan' => $this->input->post('umur_membalikan'),
			'umur_duduk' => $this->input->post('umur_duduk'),
			'umur_berdiri' => $this->input->post('umur_berdiri'),
			'umur_berjalan' => $this->input->post('umur_berjalan'),
			'umur_mengoceh' => $this->input->post('umur_mengoceh'),
			'umur_berbicara' => $this->input->post('umur_berbicara'),

			'usia_menstruasi' => $this->input->post('usia_menstruasi'),
			'siklus_menstruasi' => $this->input->post('siklus_menstruasi'),
			'jumlah_darah' => $this->input->post('jumlah_darah'),
			'nyeri_haid'  => $this->input->post('nyeri_haid'),
			'riwayat_obstrik1' => $this->input->post('riwayat_obstrik1'),
			'riwayat_obstrik2' => $this->input->post('riwayat_obstrik2'),
			'riwayat_obstrik3' => $this->input->post('riwayat_obstrik3'),
			'jumlah_anak' => $this->input->post('jumlah_anak'),
			'jumlah_anak1' => $this->input->post('jumlah_anak1'),
			'jumlah_anak2' => $this->input->post('jumlah_anak2'),

			'riwayat_kb' => $this->input->post('riwayat_kb'),
			'riwayat_hamil' => $this->input->post('riwayat_hamil'),
			'keluhan_hamil' => $this->input->post('keluhan_hamil'),
			'obat_hamil' => $this->input->post('obat_hamil'),

			'riwayat_pakai_obat' => $this->input->post('riwayat_pakai_obat'),
			'riwayat_pakai_obat1' => $this->input->post('riwayat_pakai_obat1'),
			'riwayat_pakai_obat2' => $this->input->post('riwayat_pakai_obat2'),

			'presentasi_ni' => $this->input->post('presentasi_ni'),

			'masalah_keperawatan' => $this->input->post('masalah_keperawatan'),






			'tanggal' => $tgl,
			'staff' => $staff,
		);
		//database
		$this->M_Erm->insert_rajal($data, 'form_assesmen_awal_rajal');
		$out['status'] = "success";
		// } else {
		// 	$out = array(
		// 		'error'   => true,
		// 		// 'pRujuk' => form_error('pRujuk'),
		// 		// 'gcs' => form_error('gcs'),
		// 		// 'kondisi_umum' => form_error('kondisi_umum'),
		// 		'tekanan_darah' => form_error('tekanan_darah'),
		// 		'suhu' => form_error('suhu'),
		// 		'berat_lahir' => form_error('berat_lahir'),
		// 		'frequensi_nadi' => form_error('frequensi_nadi'),
		// 		'tinggi_badan' => form_error('tinggi_badan'),
		// 		'lingkar_kepala' => form_error('lingkar_kepala'),
		// 		'frequensi_nafas' => form_error('frequensi_nafas'),
		// 		'berat_badan' => form_error('berat_badan'),
		// 		'lingkar_lengan' => form_error('lingkar_lengan'),
		// 		'frequensi_nafas' => form_error('frequensi_nafas'),
		// 		'keluhan_utama' => form_error('keluhan_utama'),
		// 		'riwayat_penggunaobat' => form_error('riwayat_penggunaobat'),
		// 		'riwayat_Alloanamnesa' => form_error('riwayat_Alloanamnesa'),
		// 		'harilahir' => form_error('harilahir'),
		// 		'di_lahir' => form_error('di_lahir'),
		// 		'tolonglahir' => form_error('tolonglahir'),
		// 		'anaklahir' => form_error('anaklahir'),
		// 		'berat_badan_lahir' => form_error('berat_badan_lahir'),
		// 		'tinggi_badan_lahir' => form_error('tinggi_badan_lahir'),
		// 		'berat_tinggi_lahir' => form_error('berat_tinggi_lahir'),
		// 		'Kelainan_lahir' => form_error('Kelainan_lahir'),
		// 		'imunisasi_dasar' => form_error('imunisasi_dasar'),
		// 		'imunisasi_ulang' => form_error('imunisasi_ulang'),
		// 		'umur_membalikan' => form_error('umur_membalikan'),
		// 		'umur_duduk' => form_error('umur_duduk'),
		// 		'umur_berdiri' => form_error('umur_berdiri'),
		// 		'umur_berjalan' => form_error('umur_berjalan'),
		// 		'umur_mengoceh' => form_error('umur_mengoceh'),
		// 		'umur_berbicara' => form_error('umur_berbicara'),
		// 		'usia_menstruasi' => form_error('usia_menstruasi'),
		// 		'siklus_menstruasi' => form_error('siklus_menstruasi'),
		// 		'riwayat_obstrik1' => form_error('riwayat_obstrik1'),
		// 		'riwayat_obstrik2' => form_error('riwayat_obstrik2'),
		// 		'riwayat_obstrik3' => form_error('riwayat_obstrik3'),
		// 		'jumlah_anak' => form_error('jumlah_anak'),
		// 		'jumlah_anak1' => form_error('jumlah_anak1'),
		// 		'jumlah_anak2' => form_error('jumlah_anak2'),
		// 		'riwayat_pakai_obat' => form_error('riwayat_pakai_obat'),
		// 		'riwayat_pakai_obat1' => form_error('riwayat_pakai_obat1'),
		// 		'riwayat_pakai_obat2' => form_error('riwayat_pakai_obat2'),
		// 		'kebutuhan_khusus' => form_error('kebutuhan_khusus'),
		// 		'Bicara' => form_error('Bicara'),
		// 		'komunikasi' => form_error('komunikasi'),
		// 		'psikologis' => form_error('psikologis'),
		// 		'sosiologi' => form_error('sosiologi'),
		// 		'ekonomi' => form_error('ekonomi'),
		// 		'penyakit_past'  => form_error('penyakit_past'),
		// 		'penyakit_keluarga' => form_error('penyakit_keluarga'),
		// 		'Anak_mendapat' => form_error('Anak_mendapat'),
		// 		'jumlah_darah' => form_error('jumlah_darah'),
		// 		'jumlah_darah' => form_error('nyeri_haid'),
		// 		'riwayat_kb' => form_error('riwayat_kb'),
		// 		'riwayat_hamil' => form_error('riwayat_hamil'),
		// 		'keluhan_hamil' => form_error('keluhan_hamil'),
		// 		'obat_hamil' => form_error('obat_hamil'),
		// 		'presentasi_ni' => form_error('presentasi_ni'),
		// 		'kontrol_ulang' => form_error('kontrol_ulang'),
		// 		'masukrawat_inap' => form_error('masukrawat_inap'),
		// 		'masalah_keperawatan' => form_error('masalah_keperawatan'),
		// 		'penurunan_bb_error' => form_error('penurunan_bb_error'),
		// 		'kurang_makan_error' => form_error('kurang_makan_error'),
		// 		'sempoyongan_error' => form_error('sempoyongan_error'),
		// 		'sempoyongan_error1' => form_error('sempoyongan_error1'),
		// 		'sempoyongan_error2' => form_error('sempoyongan_error2'),
		// 		'sempoyongan_error3' => form_error('sempoyongan_error3'),
		// 		'sempoyongan_error4' => form_error('sempoyongan_error4'),
		// 		'sempoyongan_error5' => form_error('sempoyongan_error5'),
		// 		'sempoyongan_error6' => form_error('sempoyongan_error6'),
		// 		'sempoyongan_error7' => form_error('sempoyongan_error7'),
		// 		'sempoyongan_error8' => form_error('sempoyongan_error8'),
		// 		'alergi_error' => form_error('alergi_error'),

		// 	);
		// }

		///end
		echo json_encode($out);
	}

	public function update_asses_perawat()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$data   =   array(
			'id_pelayanan' => base64_decode(urldecode($this->input->post('id_pelayanan'))),
			'id_history' => base64_decode(urldecode($this->input->post('id_history'))),
			'no_rm' => $this->input->post('no_rm'),
			'kebutuhan_khusus' => $this->input->post('kebutuhan_khusus'),
			'tekanan_darah' => $this->input->post('tekanan_darah'),
			'suhu' => $this->input->post('suhu'),
			'berat_lahir' => $this->input->post('berat_lahir'),
			'frequensi_nadi' => $this->input->post('frequensi_nadi'),
			'tinggi_badan' => $this->input->post('tinggi_badan'),
			'lingkar_kepala' => $this->input->post('lingkar_kepala'),
			'frequensi_nafas' => $this->input->post('frequensi_nafas'),
			'berat_badan' => $this->input->post('berat_badan'),
			'lingkar_lengan' => $this->input->post('lingkar_lengan'),
			'bicara' => $this->input->post('bicara'),
			'komunikasi' => $this->input->post('komunikasi'),
			'psikologis' => $this->input->post('psikologis'),
			'sosiologi' => $this->input->post('sosiologi'),
			'ekonomi' => $this->input->post('ekonomi'),
			'keluhan_utama' => $this->input->post('keluhan_utama'),
			'penyakit_past' => $this->input->post('penyakit_past'),
			'penyakit_keluarga' => $this->input->post('penyakit_keluarga'),
			'alloanamnesa' => $this->input->post('alloanamnesa'),
			'riwayat_penggunaobat' => $this->input->post('riwayat_penggunaobat'),
			'alergi' => $this->input->post('alergi'),
			'skor_nyeri' => $this->input->post('skor_nyeri'),
			'skala_nyeri' => $this->input->post('skala_nyeri'),



			'jatuh' => $this->input->post('jatuh'),
			'gangguan_ba' => $this->input->post('gangguan_ba'),
			'bingung' => $this->input->post('bingung'),
			'depresi' => $this->input->post('depresi'),
			'pusing' => $this->input->post('pusing'),
			'jalan' => $this->input->post('jalan'),
			'pikun' => $this->input->post('pikun'),
			'obat' => $this->input->post('obat'),
			'perawatan' => $this->input->post('perawatan'),

			'penurunan_bb' => $this->input->post('penurunan_bb'),
			'kurang_makan' => $this->input->post('kurang_makan'),
			'turun_bb' => $this->input->post('turun_bb'),
			'kurus' => $this->input->post('kurus'),
			'diare' => $this->input->post('diare'),
			'makan_kurang' => $this->input->post('makan_kurang'),
			'malnutrisi' => $this->input->post('malnutrisi'),


			'harilahir' => $this->input->post('harilahir'),
			'di_lahir' => $this->input->post('di_lahir'),
			'tolonglahir' => $this->input->post('tolonglahir'),
			'anaklahir' => $this->input->post('anaklahir'),
			'berat_badan_lahir' => $this->input->post('berat_badan_lahir'),
			'tinggi_badan_lahir' => $this->input->post('tinggi_badan_lahir'),
			'berat_tinggi_lahir' => $this->input->post('berat_tinggi_lahir'),
			'Kelainan_lahir' => $this->input->post('Kelainan_lahir'),
			'Anak_mendapat' => $this->input->post('Anak_mendapat'),


			'imunisasi_dasar' => $this->input->post('imunisasi_dasar'),
			'imunisasi_ulang' => $this->input->post('imunisasi_ulang'),
			'umur_membalikan' => $this->input->post('umur_membalikan'),
			'umur_duduk' => $this->input->post('umur_duduk'),
			'umur_berdiri' => $this->input->post('umur_berdiri'),
			'umur_berjalan' => $this->input->post('umur_berjalan'),
			'umur_mengoceh' => $this->input->post('umur_mengoceh'),
			'umur_berbicara' => $this->input->post('umur_berbicara'),

			'usia_menstruasi' => $this->input->post('usia_menstruasi'),
			'siklus_menstruasi' => $this->input->post('siklus_menstruasi'),
			'jumlah_darah' => $this->input->post('jumlah_darah'),
			'nyeri_haid'  => $this->input->post('nyeri_haid'),
			'riwayat_obstrik1' => $this->input->post('riwayat_obstrik1'),
			'riwayat_obstrik2' => $this->input->post('riwayat_obstrik2'),
			'riwayat_obstrik3' => $this->input->post('riwayat_obstrik3'),
			'jumlah_anak' => $this->input->post('jumlah_anak'),
			'jumlah_anak1' => $this->input->post('jumlah_anak1'),
			'jumlah_anak2' => $this->input->post('jumlah_anak2'),

			'riwayat_kb' => $this->input->post('riwayat_kb'),
			'riwayat_hamil' => $this->input->post('riwayat_hamil'),
			'keluhan_hamil' => $this->input->post('keluhan_hamil'),
			'obat_hamil' => $this->input->post('obat_hamil'),

			'riwayat_pakai_obat' => $this->input->post('riwayat_pakai_obat'),
			'riwayat_pakai_obat1' => $this->input->post('riwayat_pakai_obat1'),
			'riwayat_pakai_obat2' => $this->input->post('riwayat_pakai_obat2'),

			'presentasi_ni' => $this->input->post('presentasi_ni'),

			'masalah_keperawatan' => $this->input->post('masalah_keperawatan'),






			'tanggal' => $tgl,
			'staff' => $staff,
		);
		$where = array('id_form_assesmen_awal_rajal' => $this->input->post('id'));
		// print $success ? $file : 'Unable to save the file.';
		// print $success1 ? $file1 : 'Unable to save the file.';
		$this->M_Erm->update($data, $where, 'form_assesmen_awal_rajal');
		$out['status'] = "success";



		echo json_encode($out);
	}
	public function get_ass_per()
	{
		$id = base64_decode(urldecode($this->input->post('id')));
		$db = $this->db->get_where('form_assesmen_awal_rajal', ['id_history' => $id])->row_array();
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
