<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_asesmen_perawat extends CI_Controller
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
		$this->load->model('M_Erm_masalah_kep');
	}
	public function formasesmenranap($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);


		$staff = $this->session->userdata('data_auth');
		$no_rm = $selectPasien->no_rm;

		$page_data['nama'] = $selectPasien->nama;
		$page_data['tgl_lahir'] = date('d-m-Y', strtotime($selectPasien->tgl_lahir));
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['dpjp'] = $selectPasien->nama_dokter;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = date('d-m-Y', strtotime($selectPasien->tgl_masuk));
		$page_data['tgl_masuk'] = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$page_data['masalah_keperawatan'] = $this->M_Erm_masalah_kep->get_all_data();
		$page_data['asesmen'] = $this->M_Erm_ranap->getAsesmenPerawatRanap($id_pelayanan, $id_history);

		$page_data['gambar'] = base_url("assets/dist/img/orang1.png");
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_asses_perawat_ranap';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_asses_perawat_ranap($id_pelayanan, $id_history)
	{
		$this->formasesmenranap($id_pelayanan, $id_history);
	}
	public function insert_asses_perawat_ranap()
	{
		$this->db->trans_start();

		$dokter = $this->input->post('dokter_pemeriksa');

		$auth = $this->session->userdata('data_auth');
		$id_staff = is_object($auth) ? $auth->id_staff : (is_array($auth) ? $auth['id_staff'] : $this->session->userdata('id_staf'));


		$data_utama = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'dokter_pemeriksa' => (!empty($dokter) && $dokter !== 'undefined') ? $dokter : '-',
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'cMasuk' => $this->input->post('cMasuk'),
			'gcs' => $this->input->post('gcs'),
			'e' => $this->input->post('e'),
			'm' => $this->input->post('m'),
			'v' => $this->input->post('v'),
			'tekanan_darah' => $this->input->post('tekanan_darah'),
			'suhu' => $this->input->post('suhu'),
			'frequensi_nadi' => $this->input->post('frequensi_nadi'),
			'spo2' => $this->input->post('spo2'),
			'berat_badan' => $this->input->post('berat_badan'),
			'frequensi_nafas' => $this->input->post('frequensi_nafas'),
			'tinggi_badan' => $this->input->post('tinggi_badan'),
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
			'genetalia' => $this->input->post('genetalia'),
			'persepsi' => $this->input->post('persepsi'),
			'kelembaban' => $this->input->post('kelembaban'),
			'aktifitas' => $this->input->post('aktifitas'),
			'mobilitas' => $this->input->post('mobilitas'),
			'nutrisi' => $this->input->post('nutrisi'),
			'gesekan' => $this->input->post('gesekan'),
			'bradan_score' => $this->input->post('bradan_score'),
			'diagnosa_masuk' => $this->input->post('diagnosa_masuk'),
			'keluhan_utama' => $this->input->post('keluhan_utama'),
			'alergi_obat' => $this->input->post('alergi_obat'),
			'alergi_obat_textbox' => $this->input->post('alergi_obat_textbox'),
			'alergi' => $this->input->post('alergi'),
			'reaksi_alergi' => $this->input->post('reaksi_alergi'),
			'transfusi_darah' => $this->input->post('transfusi_darah'),
			'transfusi_darah_detail' => $this->input->post('transfusi_darah_detail'),
			'lain_lain' => $this->input->post('lain_lain'),
			'reaksi_utama' => $this->input->post('reaksi_utama'),
			'riwayat_merokok' => $this->input->post('riwayat_merokok'),
			'jumlah_rokok' => $this->input->post('jumlah_rokok'),
			'riwayat_alkohol' => $this->input->post('riwayat_alkohol'),
			'jumlah_alkohol' => $this->input->post('jumlah_alkohol'),
			'obat_penenang' => $this->input->post('obat_penenang'),
			'obat_penenang_detail' => $this->input->post('obat_penenang_detail'),
			'riwayat_keluarga' => $this->input->post('riwayat_keluarga'),
			'detail_penyakit_keluarga_lainnya' => $this->input->post('detail_penyakit_keluarga_lainnya'),
			'keluhan' => $this->input->post('keluhan'),
			'nrs' => $this->input->post('nrs'),
			'skala_nyeri' => $this->input->post('skala_nyeri'),
			'bps' => $this->input->post('bps'),
			'flacc' => $this->input->post('flacc'),
			'gambar' => $this->input->post('gambar'),
			'keterangan' => $this->input->post('keterangan'),
			'penyebab' => $this->input->post('penyebab'),
			'lainnyaa' => $this->input->post('lainnyaa'),
			'karakter' => $this->input->post('karakter'),
			'frekuensi' => $this->input->post('frekuensi'),
			'nyeri' => $this->input->post('nyeri'),
			'nyerii' => $this->input->post('nyerii'),
			'durasi' => $this->input->post('durasi'),
			'selama' => $this->input->post('selama'),
			'hygiene' => $this->input->post('hygiene'),
			'makan' => $this->input->post('makan'),
			'mandi' => $this->input->post('mandi'),
			'toilet' => $this->input->post('toilet'),
			'tangga' => $this->input->post('tangga'),
			'pakaian' => $this->input->post('pakaian'),
			'kontrolBab' => $this->input->post('kontrolBab'),
			'kontrolBak' => $this->input->post('kontrolBak'),
			'transfer' => $this->input->post('transfer'),
			'berjalan' => $this->input->post('berjalan'),
			'aktifitas_score' => $this->input->post('aktifitas_score'),
			'pola' => $this->input->post('pola'),
			'polaa' => $this->input->post('polaa'),
			'cara' => $this->input->post('cara'),
			'caraa' => $this->input->post('caraa'),
			'mental' => $this->input->post('mental'),
			'mentall' => $this->input->post('mentall'),
			'taliIkat' => $this->input->post('taliIkat'),
			'taliIkat_detail' => $this->input->post('taliIkat_detail'),
			'umur' => $this->input->post('umur'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'diagnosis' => $this->input->post('diagnosis'),
			'gangguan' => $this->input->post('gangguan'),
			'faktor' => $this->input->post('faktor'),
			'anestesi' => $this->input->post('anestesi'),
			'obatan' => $this->input->post('obatan'),
			'resiko_score' => $this->input->post('resiko_score'),
			'intake' => $this->input->post('intake'),
			'intake_lain_lain_textbox' => $this->input->post('intake_lain_lain_textbox'),
			'masalah' => $this->input->post('masalah'),
			'diagKhusus' => $this->input->post('diagKhusus'),
			'turun' => $this->input->post('turun'),
			'asupan' => $this->input->post('asupan'),
			'nutrisi_score' => $this->input->post('nutrisi_score'),
			'bab' => $this->input->post('bab'),
			'bak' => $this->input->post('bak'),
			'hamil' => $this->input->post('hamil'),
			'tgl_haid' => $this->input->post('tgl_haid') ? $this->input->post('tgl_haid') : NULL,
			'alat_kontrasepsi' => $this->input->post('alat_kontrasepsi'),
			'masalah_prostat' => $this->input->post('masalah_prostat'),
			'pemuka_agama' => $this->input->post('pemuka_agama'),
			'keperluan' => $this->input->post('keperluan'),
			'keperawatan' => $this->input->post('keperawatan'),
			'keperawatann' => $this->input->post('keperawatann'),
			'status_pernikahan' => $this->input->post('status_pernikahan'),
			'keluarga' => $this->input->post('keluarga'),
			'tempat_tinggal' => $this->input->post('tempat_tinggal'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'aktivitas' => $this->input->post('aktivitas'),
			'status_emosional' => $this->input->post('status_emosional'),
			'keluarga_terdekat' => $this->input->post('keluarga_terdekat'),
			'hubungan' => $this->input->post('hubungan'),
			'sumber_informasi' => $this->input->post('sumber_informasi'),
			'tanggal' => date('Y-m-d H:i:s'),
			'staff' => $id_staff,
			'id_masalah_kep' => $this->input->post('id_masalah_kep')
		);

		$this->db->insert('form_ass_per_ranap', $data_utama);

		$id_form = $this->db->insert_id();
		$data_tambahan = array(
			'id_form' => $id_form,
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_staf' => $id_staff,
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),

			'kom_bicara' => $this->input->post('kom_bicara'),
			'kom_serangan_bicara_kapan' => $this->input->post('kom_serangan_bicara_kapan'),
			'kom_bahasa' => $this->input->post('kom_bahasa'),
			'kom_bahasa_daerah_detail' => $this->input->post('kom_bahasa_daerah_detail'),
			'kom_bahasa_lain_detail' => $this->input->post('kom_bahasa_lain_detail'),
			'kom_perlu_penterjemah' => $this->input->post('kom_perlu_penterjemah'),
			'kom_penterjemah_bahasa' => $this->input->post('kom_penterjemah_bahasa'),
			'kom_bahan_isyarat' => $this->input->post('kom_bahan_isyarat'),
			'kom_hambatan_belajar' => $this->input->post('kom_hambatan_belajar'),
			'kom_cara_belajar_disukai' => $this->input->post('kom_cara_belajar_disukai'),
			'kom_tingkat_pendidikan' => $this->input->post('kom_tingkat_pendidikan'),
			'kom_potensial_kebutuhan_pembelajaran' => $this->input->post('kom_potensial_kebutuhan_pembelajaran'),
			'kom_potensial_lain_detail' => $this->input->post('kom_potensial_lain_detail'),
			'kognitif_izin_informasi' => $this->input->post('kognitif_izin_informasi'),

			'paed_lama_kehamilan' => $this->input->post('paed_lama_kehamilan'),
			'paed_komplikasi_tipe' => $this->input->post('paed_komplikasi_tipe'),
			'paed_masalah_maternal' => $this->input->post('paed_masalah_maternal'),
			'paed_persalina_tipe' => $this->input->post('paed_persalina_tipe'),
			'paed_penyulit_persalinan' => $this->input->post('paed_penyulit_persalinan'),
			'paed_post_natal' => $this->input->post('paed_post_natal'),
			'paed_riwayat_imunisasi' => $this->input->post('paed_riwayat_imunisasi'),
			'paed_keluhan_tumbuh_kembang' => $this->input->post('paed_keluhan_tumbuh_kembang'),
			'paed_diagnosa_medis' => $this->input->post('paed_diagnosa_medis'),
			'paed_lahir_umur_kehamilan' => $this->input->post('paed_lahir_umur_kehamilan'),
			'paed_pernah_dirawat' => $this->input->post('paed_pernah_dirawat'),
			'paed_pernah_dirawat_dimana' => $this->input->post('paed_pernah_dirawat_dimana'),
			'paed_pernah_dirawat_kapan' => $this->input->post('paed_pernah_dirawat_kapan'),
			'paed_lk_saat_lahir' => $this->input->post('paed_lk_saat_lahir'),
			'paed_bb_saat_lahir' => $this->input->post('paed_bb_saat_lahir'),
			'paed_tb_saat_lahir' => $this->input->post('paed_tb_saat_lahir'),
			'paed_asi_sampai_umur' => $this->input->post('paed_asi_sampai_umur'),
			'paed_susu_formula_mulai' => $this->input->post('paed_susu_formula_mulai'),
			'paed_makanan_tambahan_umur' => $this->input->post('paed_makanan_tambahan_umur'),
			'paed_masalah_neonatus' => $this->input->post('paed_masalah_neonatus'),
			'paed_tengkurap_bln' => $this->input->post('paed_tengkurap_bln'),
			'paed_duduk_bln' => $this->input->post('paed_duduk_bln'),
			'paed_merangkak_bln' => $this->input->post('paed_merangkak_bln'),
			'paed_berdiri_bln' => $this->input->post('paed_berdiri_bln'),
			'paed_berjalan_bln' => $this->input->post('paed_berjalan_bln')
		);

		$this->db->insert('form_ass_per_ranap_2', $data_tambahan);

		// 2. Selesaikan Transaksi Database
		$this->db->trans_complete();

		// 3. Response Output
		$this->output->set_content_type('application/json');

		if ($this->db->trans_status() === FALSE) {
			// Ambil pesan error jika ada kegagalan query
			$db_error = $this->db->error();
			echo json_encode([
				'status' => 'error',
				'message' => 'Gagal menyimpan data: ' . $db_error['message']
			]);
		} else {
			echo json_encode([
				'status' => 'success',
				'message' => 'Data asesmen berhasil disimpan.',
				'id_form' => $id_form
			]);
		}
	}
	public function update_asses_perawat_ranap()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("d-m-Y h:i:s");
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
		$id = $this->input->post('id');
		$this->form_validation->set_rules('cMasuk', 'Cara Masuk', 'required');
		$this->form_validation->set_rules('gcs', 'GCS', 'required');
		$this->form_validation->set_rules('e', 'E', 'required');
		$this->form_validation->set_rules('m', 'M', 'required');
		$this->form_validation->set_rules('v', 'V', 'required');
		// $this->form_validation->set_rules('kondisi', 'Kondisi Saat Masuk :', 'required');
		// $this->form_validation->set_rules('tekanan_darah', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('suhu', 'Suhu', 'required');
		$this->form_validation->set_rules('spo2', 'SPo2', 'required');
		$this->form_validation->set_rules('frequensi_nadi', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('berat_badan', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('frequensi_nafas', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('tinggi_badan', 'GCS', 'required');
		// $this->form_validation->set_rules('dokter_pemeriksa', 'Dokter Pemeriksa', 'required');
		// $this->form_validation->set_rules('diagnosa_masuk', 'Diagnosa Masuk', 'required');
		// $this->form_validation->set_rules('keluhan_utama', 'Keluhan Utama', 'required');
		$this->form_validation->set_rules('keluhan', 'Apakah terdapat keluhan nyeri ?', 'required');
		$this->form_validation->set_rules('alergi_obat', 'Alergi Obat', 'required');
		$this->form_validation->set_rules('alergi', 'Alergi', 'required');
		// $this->form_validation->set_rules('reaksi_utama', 'Reaksi Utama', 'required');
		$this->form_validation->set_rules('merokok', 'Rokok', 'required');
		$this->form_validation->set_rules('bab', 'BAB', 'required');
		$this->form_validation->set_rules('bak', 'BAK', 'required');
		$this->form_validation->set_rules('pemuka_agama', 'Pemuka Agama', 'required');
		$this->form_validation->set_rules('id_masalah_kep', 'Id Masalah Keperawatan', 'required');

		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'cMasuk' => $this->input->post('cMasuk'),
				'gcs' => $this->input->post('gcs'),
				'e' => $this->input->post('e'),
				'm' => $this->input->post('m'),
				'v' => $this->input->post('v'),
				// 'kondisi_masuk' => $this->input->post('kondisi'),
				'tekanan_darah' => $this->input->post('tekanan_darah'),
				'suhu' => $this->input->post('suhu'),
				'spo2' => $this->input->post('spo2'),
				'frequensi_nadi' => $this->input->post('frequensi_nadi'),
				'berat_badan' => $this->input->post('berat_badan'),
				'frequensi_nafas' => $this->input->post('frequensi_nafas'),
				'tinggi_badan' => $this->input->post('tinggi_badan'),
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
				'persepsi' => $this->input->post('persepsi'),
				'kelembaban' => $this->input->post('kelembaban'),
				'aktifitas' => $this->input->post('aktifitas'),
				'mobilitas' => $this->input->post('mobilitas'),
				'nutrisi' => $this->input->post('nutrisi'),
				'gesekan' => $this->input->post('gesekan'),
				'bradan_score' => $this->input->post('bradan_score'),
				'umur' => $this->input->post('umur'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'diagnosis' => $this->input->post('diagnosis'),
				'gangguan' => $this->input->post('gangguan'),
				'faktor' => $this->input->post('faktor'),
				'anestesi' => $this->input->post('anestesi'),
				'obatan' => $this->input->post('obatan'),
				'resiko_score' => $this->input->post('resiko_score'),
				'intake' => $this->input->post('intake'),
				'masalah' => $this->input->post('masalah'),
				'turun' => $this->input->post('turun'),
				'asupan' => $this->input->post('asupan'),
				'nutrisi_score' => $this->input->post('nutrisi_score'),
				// 'dokter_pemeriksa' => $this->input->post('dokter_pemeriksa'),
				// 'diagnosa_masuk' => $this->input->post('diagnosa_masuk'),
				// 'keluhan_utama' => $this->input->post('keluhan_utama'),
				'alergi_obat' => $this->input->post('alergi_obat'),
				'transfusi_darah' => $this->input->post('transfusi_darah'),
				'transfusi_darah_detail' => $this->input->post('transfusi_darah_detail'),
				'reaksi_alergi' => $this->input->post('reaksi_alergi'),
				'alergi' => $this->input->post('alergi'),
				'alergi_obat_textbox' => $this->input->post('alergi_obat_textbox'),
				'lain_lain' => $this->input->post('lain_lain'),
				'lainnyaa' => $this->input->post('lainnyaa'),
				'nyerii' => $this->input->post('nyerii'),
				'polaa' => $this->input->post('polaa'),
				'mentall' => $this->input->post('mentall'),
				// 'reaksi_utama' => $this->input->post('reaksi_utama'),
				'riwayat_merokok' => $this->input->post('merokok'),
				'riwayat_alkohol' => $this->input->post('alkohol'),
				'riwayat_keluarga' => $this->input->post('riwayat_keluarga'),
				'keterangan' => $this->input->post('keterangan'),
				'penyebab' => $this->input->post('penyebab'),
				'karakter' => $this->input->post('karakter'),
				'frekuensi' => $this->input->post('frekuensi'),
				'nyeri' => $this->input->post('nyeri'),
				'durasi' => $this->input->post('durasi'),
				'selama' => $this->input->post('selama'),
				'skala_nyeri' => $this->input->post('skala_nyeri'),
				'bps' => $this->input->post('bps'),
				'nrs' => $this->input->post('nrs'),
				'flacc' => $this->input->post('flacc'),
				'hygiene' => $this->input->post('hygiene'),
				'makan' => $this->input->post('makan'),
				'mandi' => $this->input->post('mandi'),
				'toilet' => $this->input->post('toilet'),
				'tangga' => $this->input->post('tangga'),
				'pakaian' => $this->input->post('pakaian'),
				'kontrolBab' => $this->input->post('kontrolBab'),
				'kontrolBak' => $this->input->post('kontrolBak'),
				'transfer' => $this->input->post('transfer'),
				'berjalan' => $this->input->post('berjalan'),
				'aktifitas_score' => $this->input->post('aktifitas_score'),
				'intake_lain_lain_textbox' => $this->input->post('intake_lain_lain_textbox'),
				'pola' => $this->input->post('pola'),
				'cara' => $this->input->post('cara'),
				'caraa' => $this->input->post('caraa'),
				'mental' => $this->input->post('mental'),
				'taliIkat' => $this->input->post('taliIkat'),
				'taliIkat_detail' => $this->input->post('taliIkat_detail'),
				'diagKhusus' => $this->input->post('diagKhusus'),
				'detail_penyakit_keluarga_lainnya' => $this->input->post('detail_penyakit_keluarga_lainnya'),
				'keperawatan' => $this->input->post('keperawatan'),
				'keperawatann' => $this->input->post('keperawatann'),
				'jumlah_rokok' => $this->input->post('jumlah_rokok'),
				'jumlah_alkohol' => $this->input->post('jumlah_alkohol'),
				'obat_penenang' => $this->input->post('obat_penenang'),
				'obat_penenang_detail' => $this->input->post('obat_penenang_detail'),
				'bab' => $this->input->post('bab'),
				'bak' => $this->input->post('bak'),
				'hamil' => $this->input->post('hamil'),
				'tgl_haid' => $this->input->post('tgl_haid'),
				'alat_kontrasepsi' => $this->input->post('kontrasepsi'),
				'masalah_prostat' => $this->input->post('prostat'),
				'pemuka_agama' => $this->input->post('pemuka_agama'),
				'id_masalah_kep' => $this->input->post('id_masalah_kep'),
				'keperluan' => $this->input->post('keperluan'),
				'keluhan' => $this->input->post('keluhan'),
				'status_pernikahan' => $this->input->post('status'),
				'keluarga' => $this->input->post('keluarga'),
				'tempat_tinggal' => $this->input->post('tempat_tinggal'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'aktivitas' => $this->input->post('aktivitas'),
				'status_emosional' => $this->input->post('status_emosional'),
				'keluarga_terdekat' => $this->input->post('keluarga_terdekat'),
				'hubungan' => $this->input->post('hubungan'),
				'sumber_informasi' => $this->input->post('sumber_informasi'),
				'tanggal' => $tgl,
				'staff' => $staff,
				'tanggal' => date("Y-m-d H:i:s"),
				'gambar' => $file,
				// 'id_pelayanan' => $this->input->post('id_pelayanan'),
				// 'id_history' => $this->input->post('id_history'),
				// 'no_rm' => $this->input->post('no_rm'),
				// 'cMasuk' => $this->input->post('cMasuk'),
				// 'gcs' => $this->input->post('gcs'),
				// 'e' => $this->input->post('e'),
				// 'm' => $this->input->post('m'),
				// 'v' => $this->input->post('v'),
				// 'kondisi_masuk' => $this->input->post('kondisi'),
				// 'tekanan_darah' => $this->input->post('tekanan_darah'),
				// 'suhu' => $this->input->post('suhu'),
				// 'spo2' => $this->input->post('spo2'),
				// 'frequensi_nadi' => $this->input->post('frequensi_nadi'),
				// 'berat_badan' => $this->input->post('berat_badan'),
				// 'frequensi_nafas' => $this->input->post('frequensi_nafas'),
				// 'tinggi_badan' => $this->input->post('tinggi_badan'),
				// 'kepala' => $this->input->post('kepala'),
				// 'hidung' => $this->input->post('hidung'),
				// 'leher' => $this->input->post('leher'),
				// 'mulut' => $this->input->post('mulut'),
				// 'thorax' => $this->input->post('thorax'),
				// 'jantung' => $this->input->post('jantung'),
				// 'paru' => $this->input->post('paru'),
				// 'andomen' => $this->input->post('andomen'),
				// 'punggung' => $this->input->post('punggung'),
				// 'ekstremitas' => $this->input->post('ekstremitas'),
				// 'genetalia' => $this->input->post('genetalia'),
				// 'persepsi'  => $this->input->post('persepsi'),
				// 'kelembaban' => $this->input->post('kelembaban'),
				// 'aktifitas' => $this->input->post('aktifitas'),
				// 'mobilitas' => $this->input->post('mobilitas'),
				// 'nutrisi'  => $this->input->post('nutrisi'),
				// 'gesekan' => $this->input->post('gesekan'),
				// 'bradan_score' => $this->input->post('bradan_score'),
				// 'umur' => $this->input->post('umur'),
				// 'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				// 'diagnosis' => $this->input->post('diagnosis'),
				// 'gangguan' => $this->input->post('gangguan'),
				// 'faktor' => $this->input->post('faktor'),
				// 'anestesi' => $this->input->post('anestesi'),
				// 'obatan' => $this->input->post('obatan'),
				// 'resiko_score' => $this->input->post('resiko_score'),
				// 'intake' => $this->input->post('intake'),
				// 'masalah' => $this->input->post('masalah'),
				// 'turun' => $this->input->post('turun'),
				// 'asupan' => $this->input->post('asupan'),
				// 'nutrisi_score' => $this->input->post('nutrisi_score'),
				// 'dokter_pemeriksa' => $this->input->post('dokter_pemeriksa'),
				// 'diagnosa_masuk' => $this->input->post('diagnosa_masuk'),
				// 'keluhan_utama' => $this->input->post('keluhan_utama'),
				// 'alergi_obat' => $this->input->post('alergi_obat'),
				// 'transfusi_darah' => $this->input->post('transfusi_darah'),
				// 'transfusi_darah_detail' => $this->input->post('transfusi_darah_detail'),
				// 'reaksi_alergi' => $this->input->post('reaksi_alergi'),
				// 'alergi' => $this->input->post('alergi'),
				// 'alergi_obat_textbox' => $this->input->post('alergi_obat_textbox'),
				// 'lain_lain' => $this->input->post('lain_lain'),
				// 'lainnyaa' => $this->input->post('lainnyaa'),
				// 'nyerii' => $this->input->post('nyerii'),
				// 'polaa' => $this->input->post('polaa'),
				// 'mentall' => $this->input->post('mentall'),
				// 'reaksi_utama' => $this->input->post('reaksi_utama'),
				// 'riwayat_merokok' => $this->input->post('merokok'),
				// 'riwayat_alkohol' => $this->input->post('alkohol'),
				// 'riwayat_keluarga' => $this->input->post('riwayat_keluarga'),
				// 'keterangan' => $this->input->post('keterangan'),
				// 'penyebab' => $this->input->post('penyebab'),
				// 'karakter' => $this->input->post('karakter'),
				// 'frekuensi' => $this->input->post('frekuensi'),
				// 'nyeri' => $this->input->post('nyeri'),
				// 'durasi' => $this->input->post('durasi'),
				// 'selama' => $this->input->post('selama'),
				// 'skala_nyeri' => $this->input->post('skala_nyeri'),
				// 'nrs' => $this->input->post('nrs'),
				// 'bps' => $this->input->post('bps'),
				// 'flacc' => $this->input->post('flacc'),
				// 'hygiene' => $this->input->post('hygiene'),
				// 'makan' => $this->input->post('makan'),
				// 'mandi' => $this->input->post('mandi'),
				// 'toilet' => $this->input->post('toilet'),
				// 'tangga' => $this->input->post('tangga'),
				// 'pakaian' => $this->input->post('pakaian'),
				// 'kontrolBab' => $this->input->post('kontrolBab'),
				// 'kontrolBak' => $this->input->post('kontrolBak'),
				// 'transfer' => $this->input->post('transfer'),
				// 'berjalan' => $this->input->post('berjalan'),
				// 'aktifitas_score' => $this->input->post('aktifitas_score'),
				// 'intake_lain_lain_textbox' => $this->input->post('intake_lain_lain_textbox'),
				// 'pola' => $this->input->post('pola'),
				// 'cara' => $this->input->post('cara'),
				// 'caraa' => $this->input->post('caraa'),
				// 'mental' => $this->input->post('mental'),
				// 'taliIkat' => $this->input->post('taliIkat'),
				// 'taliIkat_detail' => $this->input->post('taliIkat_detail'),
				// 'diagKhusus' => $this->input->post('diagKhusus'),
				// 'detail_penyakit_keluarga_lainnya' => $this->input->post('detail_penyakit_keluarga_lainnya'),
				// 'jumlah_rokok' => $this->input->post('jumlah_rokok'),
				// 'jumlah_alkohol' => $this->input->post('jumlah_alkohol'),
				// 'obat_penenang' => $this->input->post('obat_penenang'),
				// 'obat_penenang_detail' => $this->input->post('obat_penenang_detail'),
				// 'bab' => $this->input->post('bab'),
				// 'bak' => $this->input->post('bak'),
				// 'hamil' => $this->input->post('hamil'),
				// 'tgl_haid' => $this->input->post('tgl_haid'),
				// 'alat_kontrasepsi' => $this->input->post('kontrasepsi'),
				// 'masalah_prostat' => $this->input->post('prostat'),
				// 'pemuka_agama' => $this->input->post('pemuka_agama'),
				// 'keperluan' => $this->input->post('keperluan'),
				// 'keperawatan' => $this->input->post('keperawatan'),
				// 'keperawatann' => $this->input->post('keperawatann'),
				// 'keluhan' => $this->input->post('keluhan'),
				// 'status_pernikahan' => $this->input->post('status'),
				// 'keluarga' => $this->input->post('keluarga'),
				// 'tempat_tinggal' => $this->input->post('tempat_tinggal'),
				// 'pekerjaan' => $this->input->post('pekerjaan'),
				// 'aktivitas' => $this->input->post('aktivitas'),
				// 'status_emosional' => $this->input->post('status_emosional'),
				// 'keluarga_terdekat' => $this->input->post('keluarga_terdekat'),
				// 'hubungan' => $this->input->post('hubungan'),
				// 'sumber_informasi' => $this->input->post('sumber_informasi'),
				// 'tanggal' => $tgl,
				// 'staff' => $staff,
				// 'tanggal' => date("Y-m-d H:i:s"),
				// 'gambar' => $file,
			);

			$this->M_Erm_ranap->update_asesmen($id, $data);
			$out['status'] = "success";
		} else {
			$out = array(
				'error' => true,
				'cara_masuk' => form_error('cara_masuk'),
				// 'kondisi_masuk' => form_error('kondisi'),
				'gcs' => form_error('gcs'),
				'e' => form_error('e'),
				'm' => form_error('m'),
				'v' => form_error('v'),
				// 'tekanan_darah' => form_error('tekanan_darah'),
				'suhu' => form_error('suhu'),
				'spo2' => form_error('spo2'),
				'frequensi_nadi' => form_error('frequensi_nadi'),
				'berat_badan' => form_error('berat_badan'),
				'frequensi_nafas' => form_error('frequensi_nafas'),
				'tinggi_badan' => form_error('tinggi_badan'),
				// 'dokter_pemeriksa' => form_error('dokter_pemeriksa'),
				// 'diagnosa_masuk' => form_error('diagnosa_masuk'),
				// 'keluhan_utama' => form_error('keluhan_utama'),
				'alergi_obat' => form_error('alergi_obat'),
				'alergi' => form_error('alergi'),
				// 'reaksi_utama' => form_error('reaksi_utama'),
				'riwayat_merokok' => form_error('merokok'),
				'riwayat_alkohol' => form_error('alkohol'),
				'bab' => form_error('bab'),
				'bak' => form_error('bak'),
				'pemuka_agama' => form_error('pemuka_agama'),
				'id_masalah_kep' => form_error('id_masalah_kep'),
				'gambar' => $file,
				'tanggal' => date("Y-m-d H:i:s"),
			);
		}

		echo json_encode($out);
	}

	public function get_ass_per()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_ass_per_ranap', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}



	public function get_ass_rajal()
	{
		$id = $this->input->post('id');

		$poli = $this->db->query("SELECT f.keluhan_utama, f.id_pelayanan,f.id_history,tekanan_darah,suhu,frequensi_nadi,berat_badan,frequensi_nafas,tinggi_badan,riwayat,riwayat_dulu,skala_nyeri, d.riwayat_alergi from form_assesmen_awal_rajal f left join form_assesmen_dokter d on f.id_history = d.id_history having id_pelayanan = '$id'")->row();
		$igd = $this->db->query("SELECT f.id_pelayanan,f.id_history,tekanan_darah,suhu,frequensi_nadi,berat_badan,frequensi_nafas,tinggi_badan,gcs,spo2,keluhan,riwayat, riwayat_dulu, skala_nyeri, d.riwayat_alergi from form_ass_per_igd f left join form_ass_dokter_igd d on f.id_history = d.id_history and d.id_pelayanan = f.id_pelayanan 
		having id_pelayanan = '$id'")->row();
		$diagnosa = $this->db->query("SELECT * from diagnosa_utama where id_pelayanan='$id' and SUBSTRING_INDEX(id_history, '_', 1) = 'ranap'")->row_array();
		// $ass_dok = $this->db->query("SELECT terapi,konsul from form_ass_dokter_ranap where id_pelayanan='$id'")->row_array();
		// $ass_per = $this->db->query("SELECT * from form_ass_per_ranap where id_pelayanan='$id'")->row_array();

		if (isset($poli) || (isset($poli) && isset($igd))) {
			$diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_history='$poli->id_history'")->row_array();

			$db = [
				'gcs' => 0,
				'e' => 0,
				'm' => 0,
				'v' => 0,
				'tekanan_darah' => $poli->tekanan_darah,
				'suhu' => $poli->suhu,
				'frequensi_nadi' => $poli->frequensi_nadi,
				'spo2' => 0,
				'berat_badan' => $poli->berat_badan,
				'frequensi_nafas' => $poli->frequensi_nafas,
				'tinggi_badan' => $poli->tinggi_badan,
				'keluhan' => $poli->keluhan_utama,
				'riwayat' => $poli->riwayat,
				'riwayat_dulu' => $poli->riwayat_dulu,
				'riwayat_alergi' => $poli->riwayat_alergi,
				// 'skala_nyeri' => $poli->skala_nyeri,
				'diagnosa' => !empty($diagnosa1) ? $diagnosa1['kode'] . ' - ' . $diagnosa1['nama_diagnosa'] : '',
				'diagnosa_utama' => !empty($diagnosa) ? $diagnosa['kode'] . ' - ' . $diagnosa['nama_diagnosa'] : '',
				// 'terapi' => !empty($ass_dok) ? $ass_dok['terapi'] : '',
				// 'konsul' => !empty($ass_dok) ? $ass_dok['konsul'] : '',
				// 'ass_per' => $ass_per,

			];
		} else {
			if (isset($igd)) {
				$diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_history='$igd->id_history'")->row_array();
				$db = [
					'gcs' => $igd->gcs,
					'e' => 0,
					'm' => 0,
					'v' => 0,
					'tekanan_darah' => $igd->tekanan_darah,
					'suhu' => $igd->suhu,
					'frequensi_nadi' => $igd->frequensi_nadi,
					'spo2' => $igd->spo2,
					'berat_badan' => $igd->berat_badan,
					'frequensi_nafas' => $igd->frequensi_nafas,
					'tinggi_badan' => $igd->tinggi_badan,
					'keluhan' => $igd->keluhan,
					'riwayat' => $igd->riwayat,
					'riwayat_dulu' => $igd->riwayat_dulu,
					'riwayat_alergi' => $igd->riwayat_alergi,
					// 'skala_nyeri' => $igd->skala_nyeri,
					'diagnosa' => !empty($diagnosa1) ? $diagnosa1['kode'] . ' - ' . $diagnosa1['nama_diagnosa'] : '',
					'diagnosa_utama' => !empty($diagnosa) ? $diagnosa['kode'] . ' - ' . $diagnosa['nama_diagnosa'] : '',
					// 'terapi' => !empty($ass_dok) ? $ass_dok['terapi'] : '',
					// 'konsul' => !empty($ass_dok) ? $ass_dok['konsul'] : '',
					// 'ass_per' => $ass_per,
				];
			} else {
				$db = null;
			}
		}
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

class Erm_ranap_asesmen_perawat extends CI_Controller
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
		$this->load->model('M_Erm_masalah_kep');
	}
	public function formasesmenranap($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);


		$staff = $this->session->userdata('data_auth');
		$no_rm = $selectPasien->no_rm;

		$page_data['nama'] = $selectPasien->nama;
		$page_data['tgl_lahir'] = date('d-m-Y', strtotime($selectPasien->tgl_lahir));
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['dpjp'] = $selectPasien->nama_dokter;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = date('d-m-Y', strtotime($selectPasien->tgl_masuk));
		$page_data['tgl_masuk'] = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$page_data['masalah_keperawatan'] = $this->M_Erm_masalah_kep->get_all_data();
		


		$page_data['gambar'] = base_url("assets/dist/img/orang1.png");
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_asses_perawat_ranap';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_asses_perawat_ranap($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['tgl_lahir'] = date('d-m-Y', strtotime($selectPasien->tgl_lahir));
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['dpjp'] = $selectPasien->nama_dokter;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = date('d-m-Y', strtotime($selectPasien->tgl_masuk));
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$page_data['masalah_keperawatan'] = $this->M_Erm_masalah_kep->get_all_data();


		$page_data['gambar'] = base_url("assets/dist/img/orang1.png");
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap_Edit/view_asses_perawat_ranap';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function insert_asses_perawat_ranap()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("d-m-Y h:i:s");
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

		$this->form_validation->set_rules('cMasuk', 'Cara Masuk', 'required');
		$this->form_validation->set_rules('gcs', 'GCS', 'required');
		$this->form_validation->set_rules('e', 'E', 'required');
		$this->form_validation->set_rules('m', 'M', 'required');
		$this->form_validation->set_rules('v', 'V', 'required');
		// $this->form_validation->set_rules('kondisi', 'Kondisi Saat Masuk :', 'required');
		// $this->form_validation->set_rules('tekanan_darah', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('suhu', 'Suhu', 'required');
		$this->form_validation->set_rules('spo2', 'SPo2', 'required');
		$this->form_validation->set_rules('frequensi_nadi', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('berat_badan', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('frequensi_nafas', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('tinggi_badan', 'GCS', 'required');
		// $this->form_validation->set_rules('dokter_pemeriksa', 'Dokter Pemeriksa', 'required');
		// $this->form_validation->set_rules('diagnosa_masuk', 'Diagnosa Masuk', 'required');
		// $this->form_validation->set_rules('keluhan_utama', 'Keluhan Utama', 'required');
		$this->form_validation->set_rules('alergi_obat', 'Alergi Obat', 'required');
		$this->form_validation->set_rules('alergi', 'Alergi', 'required');
		$this->form_validation->set_rules('keluhan', 'Apakah terdapat keluhan nyeri ?', 'required');
		// $this->form_validation->set_rules('reaksi_utama', 'Reaksi Utama', 'required');
		$this->form_validation->set_rules('merokok', 'Rokok', 'required');
		$this->form_validation->set_rules('bab', 'BAB', 'required');
		$this->form_validation->set_rules('bak', 'BAK', 'required');
		$this->form_validation->set_rules('pemuka_agama', 'Pemuka Agama', 'required');
		$this->form_validation->set_rules('id_masalah_kep[]', 'Id Masalah Keperawatan', 'required');


		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'cMasuk' => $this->input->post('cMasuk'),
				'gcs' => $this->input->post('gcs'),
				'e' => $this->input->post('e'),
				'm' => $this->input->post('m'),
				'v' => $this->input->post('v'),
				// 'kondisi_masuk' => $this->input->post('kondisi'),
				'tekanan_darah' => $this->input->post('tekanan_darah'),
				'suhu' => $this->input->post('suhu'),
				'spo2' => $this->input->post('spo2'),
				'frequensi_nadi' => $this->input->post('frequensi_nadi'),
				'berat_badan' => $this->input->post('berat_badan'),
				'frequensi_nafas' => $this->input->post('frequensi_nafas'),
				'tinggi_badan' => $this->input->post('tinggi_badan'),
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
				'persepsi'  => $this->input->post('persepsi'),
				'kelembaban' => $this->input->post('kelembaban'),
				'aktifitas' => $this->input->post('aktifitas'),
				'mobilitas' => $this->input->post('mobilitas'),
				'nutrisi'  => $this->input->post('nutrisi'),
				'gesekan' => $this->input->post('gesekan'),
				'bradan_score' => $this->input->post('bradan_score'),
				'umur' => $this->input->post('umur'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'diagnosis' => $this->input->post('diagnosis'),
				'gangguan' => $this->input->post('gangguan'),
				'faktor' => $this->input->post('faktor'),
				'anestesi' => $this->input->post('anestesi'),
				'obatan' => $this->input->post('obatan'),
				'resiko_score' => $this->input->post('resiko_score'),
				'intake' => $this->input->post('intake'),
				'masalah' => $this->input->post('masalah'),
				'turun' => $this->input->post('turun'),
				'asupan' => $this->input->post('asupan'),
				'nutrisi_score' => $this->input->post('nutrisi_score'),
				// 'dokter_pemeriksa' => $this->input->post('dokter_pemeriksa'),
				// 'diagnosa_masuk' => $this->input->post('diagnosa_masuk'),
				// 'keluhan_utama' => $this->input->post('keluhan_utama'),
				'alergi_obat' => $this->input->post('alergi_obat'),
				'transfusi_darah' => $this->input->post('transfusi_darah'),
				'transfusi_darah_detail' => $this->input->post('transfusi_darah_detail'),
				'reaksi_alergi' => $this->input->post('reaksi_alergi'),
				'alergi' => $this->input->post('alergi'),
				'alergi_obat_textbox' => $this->input->post('alergi_obat_textbox'),
				'lain_lain' => $this->input->post('lain_lain'),
				'lainnyaa' => $this->input->post('lainnyaa'),
				'nyerii' => $this->input->post('nyerii'),
				'polaa' => $this->input->post('polaa'),
				'mentall' => $this->input->post('mentall'),
				'reaksi_utama' => $this->input->post('reaksi_utama'),
				'riwayat_merokok' => $this->input->post('merokok'),
				'riwayat_alkohol' => $this->input->post('alkohol'),
				'riwayat_keluarga' => $this->input->post('riwayat_keluarga'),
				'keterangan' => $this->input->post('keterangan'),
				'penyebab' => $this->input->post('penyebab'),
				'karakter' => $this->input->post('karakter'),
				'frekuensi' => $this->input->post('frekuensi'),
				'nyeri' => $this->input->post('nyeri'),
				'durasi' => $this->input->post('durasi'),
				'selama' => $this->input->post('selama'),
				'skala_nyeri' => $this->input->post('skala_nyeri'),
				'bps' => $this->input->post('bps'),
				'nrs' => $this->input->post('nrs'),
				'flacc' => $this->input->post('flacc'),
				'hygiene' => $this->input->post('hygiene'),
				'makan' => $this->input->post('makan'),
				'mandi' => $this->input->post('mandi'),
				'toilet' => $this->input->post('toilet'),
				'tangga' => $this->input->post('tangga'),
				'pakaian' => $this->input->post('pakaian'),
				'kontrolBab' => $this->input->post('kontrolBab'),
				'kontrolBak' => $this->input->post('kontrolBak'),
				'transfer' => $this->input->post('transfer'),
				'berjalan' => $this->input->post('berjalan'),
				'aktifitas_score' => $this->input->post('aktifitas_score'),
				'intake_lain_lain_textbox' => $this->input->post('intake_lain_lain_textbox'),
				'pola' => $this->input->post('pola'),
				'cara' => $this->input->post('cara'),
				'caraa' => $this->input->post('caraa'),
				'mental' => $this->input->post('mental'),
				'taliIkat' => $this->input->post('taliIkat'),
				'taliIkat_detail' => $this->input->post('taliIkat_detail'),
				'diagKhusus' => $this->input->post('diagKhusus'),
				'detail_penyakit_keluarga_lainnya' => $this->input->post('detail_penyakit_keluarga_lainnya'),
				'keperawatan' => $this->input->post('keperawatan'),
				'keperawatann' => $this->input->post('keperawatann'),
				'jumlah_rokok' => $this->input->post('jumlah_rokok'),
				'jumlah_alkohol' => $this->input->post('jumlah_alkohol'),
				'obat_penenang' => $this->input->post('obat_penenang'),
				'obat_penenang_detail' => $this->input->post('obat_penenang_detail'),
				'bab' => $this->input->post('bab'),
				'bak' => $this->input->post('bak'),
				'hamil' => $this->input->post('hamil'),
				'tgl_haid' => $this->input->post('tgl_haid'),
				'alat_kontrasepsi' => $this->input->post('kontrasepsi'),
				'masalah_prostat' => $this->input->post('prostat'),
				'pemuka_agama' => $this->input->post('pemuka_agama'),
				'id_masalah_kep' => $this->input->post('id_masalah_kep'),
				'keperluan' => $this->input->post('keperluan'),
				'keluhan' => $this->input->post('keluhan'),
				'status_pernikahan' => $this->input->post('status'),
				'keluarga' => $this->input->post('keluarga'),
				'tempat_tinggal' => $this->input->post('tempat_tinggal'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'aktivitas' => $this->input->post('aktivitas'),
				'status_emosional' => $this->input->post('status_emosional'),
				'keluarga_terdekat' => $this->input->post('keluarga_terdekat'),
				'hubungan' => $this->input->post('hubungan'),
				'sumber_informasi' => $this->input->post('sumber_informasi'),
				'tanggal' => $tgl,
				'staff' => $staff,
				'tanggal' => date("Y-m-d H:i:s"),
				'gambar' => $file,
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm->insert($data, 'form_ass_per_ranap');
			// $this->M_Erm->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'cara_masuk' => form_error('cara_masuk'),
				// 'kondisi_masuk' => form_error('kondisi'),
				'e' => form_error('e'),
				'm' => form_error('m'),
				'v' => form_error('v'),
				// 'tekanan_darah' => form_error('tekanan_darah'),
				'suhu' => form_error('suhu'),
				'spo2' => form_error('spo2'),
				'frequensi_nadi' => form_error('frequensi_nadi'),
				'berat_badan' => form_error('berat_badan'),
				'frequensi_nafas' => form_error('frequensi_nafas'),
				'tinggi_badan' => form_error('tinggi_badan'),
				// 'dokter_pemeriksa' => form_error('dokter_pemeriksa'),
				// 'diagnosa_masuk' => form_error('diagnosa_masuk'),
				// 'keluhan_utama' => form_error('keluhan_utama'),
				'alergi_obat' => form_error('alergi_obat'),
				'alergi' => form_error('alergi'),
				// 'reaksi_utama' => form_error('reaksi_utama'),
				'riwayat_merokok' => form_error('merokok'),
				'riwayat_alkohol' => form_error('alkohol'),
				'bab' => form_error('bab'),
				'bak' => form_error('bak'),
				'pemuka_agama' => form_error('pemuka_agama'),
				'id_masalah_kep' => form_error('id_masalah_kep'),
			);

			if (form_error('gcs')) {
				$out['gcs'] =  "Wajib isi & isi Form Bawah ini E , M , V";
			}

		}

		echo json_encode($out);
	}
	public function update_asses_perawat_ranap()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("d-m-Y h:i:s");
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
		$id = $this->input->post('id');
		$this->form_validation->set_rules('cMasuk', 'Cara Masuk', 'required');
		$this->form_validation->set_rules('gcs', 'GCS', 'required');
		$this->form_validation->set_rules('e', 'E', 'required');
		$this->form_validation->set_rules('m', 'M', 'required');
		$this->form_validation->set_rules('v', 'V', 'required');
		// $this->form_validation->set_rules('kondisi', 'Kondisi Saat Masuk :', 'required');
		// $this->form_validation->set_rules('tekanan_darah', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('suhu', 'Suhu', 'required');
		$this->form_validation->set_rules('spo2', 'SPo2', 'required');
		$this->form_validation->set_rules('frequensi_nadi', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('berat_badan', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('frequensi_nafas', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('tinggi_badan', 'GCS', 'required');
		// $this->form_validation->set_rules('dokter_pemeriksa', 'Dokter Pemeriksa', 'required');
		// $this->form_validation->set_rules('diagnosa_masuk', 'Diagnosa Masuk', 'required');
		// $this->form_validation->set_rules('keluhan_utama', 'Keluhan Utama', 'required');
		$this->form_validation->set_rules('keluhan', 'Apakah terdapat keluhan nyeri ?', 'required');
		$this->form_validation->set_rules('alergi_obat', 'Alergi Obat', 'required');
		$this->form_validation->set_rules('alergi', 'Alergi', 'required');
		// $this->form_validation->set_rules('reaksi_utama', 'Reaksi Utama', 'required');
		$this->form_validation->set_rules('merokok', 'Rokok', 'required');
		$this->form_validation->set_rules('bab', 'BAB', 'required');
		$this->form_validation->set_rules('bak', 'BAK', 'required');
		$this->form_validation->set_rules('pemuka_agama', 'Pemuka Agama', 'required');
		$this->form_validation->set_rules('id_masalah_kep', 'Id Masalah Keperawatan', 'required');

		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'cMasuk' => $this->input->post('cMasuk'),
				'gcs' => $this->input->post('gcs'),
				'e' => $this->input->post('e'),
				'm' => $this->input->post('m'),
				'v' => $this->input->post('v'),
				// 'kondisi_masuk' => $this->input->post('kondisi'),
				'tekanan_darah' => $this->input->post('tekanan_darah'),
				'suhu' => $this->input->post('suhu'),
				'spo2' => $this->input->post('spo2'),
				'frequensi_nadi' => $this->input->post('frequensi_nadi'),
				'berat_badan' => $this->input->post('berat_badan'),
				'frequensi_nafas' => $this->input->post('frequensi_nafas'),
				'tinggi_badan' => $this->input->post('tinggi_badan'),
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
				'persepsi'  => $this->input->post('persepsi'),
				'kelembaban' => $this->input->post('kelembaban'),
				'aktifitas' => $this->input->post('aktifitas'),
				'mobilitas' => $this->input->post('mobilitas'),
				'nutrisi'  => $this->input->post('nutrisi'),
				'gesekan' => $this->input->post('gesekan'),
				'bradan_score' => $this->input->post('bradan_score'),
				'umur' => $this->input->post('umur'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'diagnosis' => $this->input->post('diagnosis'),
				'gangguan' => $this->input->post('gangguan'),
				'faktor' => $this->input->post('faktor'),
				'anestesi' => $this->input->post('anestesi'),
				'obatan' => $this->input->post('obatan'),
				'resiko_score' => $this->input->post('resiko_score'),
				'intake' => $this->input->post('intake'),
				'masalah' => $this->input->post('masalah'),
				'turun' => $this->input->post('turun'),
				'asupan' => $this->input->post('asupan'),
				'nutrisi_score' => $this->input->post('nutrisi_score'),
				// 'dokter_pemeriksa' => $this->input->post('dokter_pemeriksa'),
				// 'diagnosa_masuk' => $this->input->post('diagnosa_masuk'),
				// 'keluhan_utama' => $this->input->post('keluhan_utama'),
				'alergi_obat' => $this->input->post('alergi_obat'),
				'transfusi_darah' => $this->input->post('transfusi_darah'),
				'transfusi_darah_detail' => $this->input->post('transfusi_darah_detail'),
				'reaksi_alergi' => $this->input->post('reaksi_alergi'),
				'alergi' => $this->input->post('alergi'),
				'alergi_obat_textbox' => $this->input->post('alergi_obat_textbox'),
				'lain_lain' => $this->input->post('lain_lain'),
				'lainnyaa' => $this->input->post('lainnyaa'),
				'nyerii' => $this->input->post('nyerii'),
				'polaa' => $this->input->post('polaa'),
				'mentall' => $this->input->post('mentall'),
				// 'reaksi_utama' => $this->input->post('reaksi_utama'),
				'riwayat_merokok' => $this->input->post('merokok'),
				'riwayat_alkohol' => $this->input->post('alkohol'),
				'riwayat_keluarga' => $this->input->post('riwayat_keluarga'),
				'keterangan' => $this->input->post('keterangan'),
				'penyebab' => $this->input->post('penyebab'),
				'karakter' => $this->input->post('karakter'),
				'frekuensi' => $this->input->post('frekuensi'),
				'nyeri' => $this->input->post('nyeri'),
				'durasi' => $this->input->post('durasi'),
				'selama' => $this->input->post('selama'),
				'skala_nyeri' => $this->input->post('skala_nyeri'),
				'bps' => $this->input->post('bps'),
				'nrs' => $this->input->post('nrs'),
				'flacc' => $this->input->post('flacc'),
				'hygiene' => $this->input->post('hygiene'),
				'makan' => $this->input->post('makan'),
				'mandi' => $this->input->post('mandi'),
				'toilet' => $this->input->post('toilet'),
				'tangga' => $this->input->post('tangga'),
				'pakaian' => $this->input->post('pakaian'),
				'kontrolBab' => $this->input->post('kontrolBab'),
				'kontrolBak' => $this->input->post('kontrolBak'),
				'transfer' => $this->input->post('transfer'),
				'berjalan' => $this->input->post('berjalan'),
				'aktifitas_score' => $this->input->post('aktifitas_score'),
				'intake_lain_lain_textbox' => $this->input->post('intake_lain_lain_textbox'),
				'pola' => $this->input->post('pola'),
				'cara' => $this->input->post('cara'),
				'caraa' => $this->input->post('caraa'),
				'mental' => $this->input->post('mental'),
				'taliIkat' => $this->input->post('taliIkat'),
				'taliIkat_detail' => $this->input->post('taliIkat_detail'),
				'diagKhusus' => $this->input->post('diagKhusus'),
				'detail_penyakit_keluarga_lainnya' => $this->input->post('detail_penyakit_keluarga_lainnya'),
				'keperawatan' => $this->input->post('keperawatan'),
				'keperawatann' => $this->input->post('keperawatann'),
				'jumlah_rokok' => $this->input->post('jumlah_rokok'),
				'jumlah_alkohol' => $this->input->post('jumlah_alkohol'),
				'obat_penenang' => $this->input->post('obat_penenang'),
				'obat_penenang_detail' => $this->input->post('obat_penenang_detail'),
				'bab' => $this->input->post('bab'),
				'bak' => $this->input->post('bak'),
				'hamil' => $this->input->post('hamil'),
				'tgl_haid' => $this->input->post('tgl_haid'),
				'alat_kontrasepsi' => $this->input->post('kontrasepsi'),
				'masalah_prostat' => $this->input->post('prostat'),
				'pemuka_agama' => $this->input->post('pemuka_agama'),
				'id_masalah_kep' => $this->input->post('id_masalah_kep'),
				'keperluan' => $this->input->post('keperluan'),
				'keluhan' => $this->input->post('keluhan'),
				'status_pernikahan' => $this->input->post('status'),
				'keluarga' => $this->input->post('keluarga'),
				'tempat_tinggal' => $this->input->post('tempat_tinggal'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'aktivitas' => $this->input->post('aktivitas'),
				'status_emosional' => $this->input->post('status_emosional'),
				'keluarga_terdekat' => $this->input->post('keluarga_terdekat'),
				'hubungan' => $this->input->post('hubungan'),
				'sumber_informasi' => $this->input->post('sumber_informasi'),
				'tanggal' => $tgl,
				'staff' => $staff,
				'tanggal' => date("Y-m-d H:i:s"),
				'gambar' => $file,
				// 'id_pelayanan' => $this->input->post('id_pelayanan'),
				// 'id_history' => $this->input->post('id_history'),
				// 'no_rm' => $this->input->post('no_rm'),
				// 'cMasuk' => $this->input->post('cMasuk'),
				// 'gcs' => $this->input->post('gcs'),
				// 'e' => $this->input->post('e'),
				// 'm' => $this->input->post('m'),
				// 'v' => $this->input->post('v'),
				// 'kondisi_masuk' => $this->input->post('kondisi'),
				// 'tekanan_darah' => $this->input->post('tekanan_darah'),
				// 'suhu' => $this->input->post('suhu'),
				// 'spo2' => $this->input->post('spo2'),
				// 'frequensi_nadi' => $this->input->post('frequensi_nadi'),
				// 'berat_badan' => $this->input->post('berat_badan'),
				// 'frequensi_nafas' => $this->input->post('frequensi_nafas'),
				// 'tinggi_badan' => $this->input->post('tinggi_badan'),
				// 'kepala' => $this->input->post('kepala'),
				// 'hidung' => $this->input->post('hidung'),
				// 'leher' => $this->input->post('leher'),
				// 'mulut' => $this->input->post('mulut'),
				// 'thorax' => $this->input->post('thorax'),
				// 'jantung' => $this->input->post('jantung'),
				// 'paru' => $this->input->post('paru'),
				// 'andomen' => $this->input->post('andomen'),
				// 'punggung' => $this->input->post('punggung'),
				// 'ekstremitas' => $this->input->post('ekstremitas'),
				// 'genetalia' => $this->input->post('genetalia'),
				// 'persepsi'  => $this->input->post('persepsi'),
				// 'kelembaban' => $this->input->post('kelembaban'),
				// 'aktifitas' => $this->input->post('aktifitas'),
				// 'mobilitas' => $this->input->post('mobilitas'),
				// 'nutrisi'  => $this->input->post('nutrisi'),
				// 'gesekan' => $this->input->post('gesekan'),
				// 'bradan_score' => $this->input->post('bradan_score'),
				// 'umur' => $this->input->post('umur'),
				// 'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				// 'diagnosis' => $this->input->post('diagnosis'),
				// 'gangguan' => $this->input->post('gangguan'),
				// 'faktor' => $this->input->post('faktor'),
				// 'anestesi' => $this->input->post('anestesi'),
				// 'obatan' => $this->input->post('obatan'),
				// 'resiko_score' => $this->input->post('resiko_score'),
				// 'intake' => $this->input->post('intake'),
				// 'masalah' => $this->input->post('masalah'),
				// 'turun' => $this->input->post('turun'),
				// 'asupan' => $this->input->post('asupan'),
				// 'nutrisi_score' => $this->input->post('nutrisi_score'),
				// 'dokter_pemeriksa' => $this->input->post('dokter_pemeriksa'),
				// 'diagnosa_masuk' => $this->input->post('diagnosa_masuk'),
				// 'keluhan_utama' => $this->input->post('keluhan_utama'),
				// 'alergi_obat' => $this->input->post('alergi_obat'),
				// 'transfusi_darah' => $this->input->post('transfusi_darah'),
				// 'transfusi_darah_detail' => $this->input->post('transfusi_darah_detail'),
				// 'reaksi_alergi' => $this->input->post('reaksi_alergi'),
				// 'alergi' => $this->input->post('alergi'),
				// 'alergi_obat_textbox' => $this->input->post('alergi_obat_textbox'),
				// 'lain_lain' => $this->input->post('lain_lain'),
				// 'lainnyaa' => $this->input->post('lainnyaa'),
				// 'nyerii' => $this->input->post('nyerii'),
				// 'polaa' => $this->input->post('polaa'),
				// 'mentall' => $this->input->post('mentall'),
				// 'reaksi_utama' => $this->input->post('reaksi_utama'),
				// 'riwayat_merokok' => $this->input->post('merokok'),
				// 'riwayat_alkohol' => $this->input->post('alkohol'),
				// 'riwayat_keluarga' => $this->input->post('riwayat_keluarga'),
				// 'keterangan' => $this->input->post('keterangan'),
				// 'penyebab' => $this->input->post('penyebab'),
				// 'karakter' => $this->input->post('karakter'),
				// 'frekuensi' => $this->input->post('frekuensi'),
				// 'nyeri' => $this->input->post('nyeri'),
				// 'durasi' => $this->input->post('durasi'),
				// 'selama' => $this->input->post('selama'),
				// 'skala_nyeri' => $this->input->post('skala_nyeri'),
				// 'nrs' => $this->input->post('nrs'),
				// 'bps' => $this->input->post('bps'),
				// 'flacc' => $this->input->post('flacc'),
				// 'hygiene' => $this->input->post('hygiene'),
				// 'makan' => $this->input->post('makan'),
				// 'mandi' => $this->input->post('mandi'),
				// 'toilet' => $this->input->post('toilet'),
				// 'tangga' => $this->input->post('tangga'),
				// 'pakaian' => $this->input->post('pakaian'),
				// 'kontrolBab' => $this->input->post('kontrolBab'),
				// 'kontrolBak' => $this->input->post('kontrolBak'),
				// 'transfer' => $this->input->post('transfer'),
				// 'berjalan' => $this->input->post('berjalan'),
				// 'aktifitas_score' => $this->input->post('aktifitas_score'),
				// 'intake_lain_lain_textbox' => $this->input->post('intake_lain_lain_textbox'),
				// 'pola' => $this->input->post('pola'),
				// 'cara' => $this->input->post('cara'),
				// 'caraa' => $this->input->post('caraa'),
				// 'mental' => $this->input->post('mental'),
				// 'taliIkat' => $this->input->post('taliIkat'),
				// 'taliIkat_detail' => $this->input->post('taliIkat_detail'),
				// 'diagKhusus' => $this->input->post('diagKhusus'),
				// 'detail_penyakit_keluarga_lainnya' => $this->input->post('detail_penyakit_keluarga_lainnya'),
				// 'jumlah_rokok' => $this->input->post('jumlah_rokok'),
				// 'jumlah_alkohol' => $this->input->post('jumlah_alkohol'),
				// 'obat_penenang' => $this->input->post('obat_penenang'),
				// 'obat_penenang_detail' => $this->input->post('obat_penenang_detail'),
				// 'bab' => $this->input->post('bab'),
				// 'bak' => $this->input->post('bak'),
				// 'hamil' => $this->input->post('hamil'),
				// 'tgl_haid' => $this->input->post('tgl_haid'),
				// 'alat_kontrasepsi' => $this->input->post('kontrasepsi'),
				// 'masalah_prostat' => $this->input->post('prostat'),
				// 'pemuka_agama' => $this->input->post('pemuka_agama'),
				// 'keperluan' => $this->input->post('keperluan'),
				// 'keperawatan' => $this->input->post('keperawatan'),
				// 'keperawatann' => $this->input->post('keperawatann'),
				// 'keluhan' => $this->input->post('keluhan'),
				// 'status_pernikahan' => $this->input->post('status'),
				// 'keluarga' => $this->input->post('keluarga'),
				// 'tempat_tinggal' => $this->input->post('tempat_tinggal'),
				// 'pekerjaan' => $this->input->post('pekerjaan'),
				// 'aktivitas' => $this->input->post('aktivitas'),
				// 'status_emosional' => $this->input->post('status_emosional'),
				// 'keluarga_terdekat' => $this->input->post('keluarga_terdekat'),
				// 'hubungan' => $this->input->post('hubungan'),
				// 'sumber_informasi' => $this->input->post('sumber_informasi'),
				// 'tanggal' => $tgl,
				// 'staff' => $staff,
				// 'tanggal' => date("Y-m-d H:i:s"),
				// 'gambar' => $file,
			);

			$this->M_Erm_ranap->update_asesmen($id, $data);
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'cara_masuk' => form_error('cara_masuk'),
				// 'kondisi_masuk' => form_error('kondisi'),
				'gcs' => form_error('gcs'),
				'e' => form_error('e'),
				'm' => form_error('m'),
				'v' => form_error('v'),
				// 'tekanan_darah' => form_error('tekanan_darah'),
				'suhu' => form_error('suhu'),
				'spo2' => form_error('spo2'),
				'frequensi_nadi' => form_error('frequensi_nadi'),
				'berat_badan' => form_error('berat_badan'),
				'frequensi_nafas' => form_error('frequensi_nafas'),
				'tinggi_badan' => form_error('tinggi_badan'),
				// 'dokter_pemeriksa' => form_error('dokter_pemeriksa'),
				// 'diagnosa_masuk' => form_error('diagnosa_masuk'),
				// 'keluhan_utama' => form_error('keluhan_utama'),
				'alergi_obat' => form_error('alergi_obat'),
				'alergi' => form_error('alergi'),
				// 'reaksi_utama' => form_error('reaksi_utama'),
				'riwayat_merokok' => form_error('merokok'),
				'riwayat_alkohol' => form_error('alkohol'),
				'bab' => form_error('bab'),
				'bak' => form_error('bak'),
				'pemuka_agama' => form_error('pemuka_agama'),
				'id_masalah_kep' => form_error('id_masalah_kep'),
				'gambar' => $file,
				'tanggal' => date("Y-m-d H:i:s"),
			);
		}

		echo json_encode($out);
	}

	public function get_ass_per()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_ass_per_ranap', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}



	public function get_ass_rajal()
	{
		$id = $this->input->post('id');

		$poli = $this->db->query("SELECT f.keluhan_utama, f.id_pelayanan,f.id_history,tekanan_darah,suhu,frequensi_nadi,berat_badan,frequensi_nafas,tinggi_badan,riwayat,riwayat_dulu,skala_nyeri, d.riwayat_alergi from form_assesmen_awal_rajal f left join form_assesmen_dokter d on f.id_history = d.id_history having id_pelayanan = '$id'")->row();
		$igd = $this->db->query("SELECT f.id_pelayanan,f.id_history,tekanan_darah,suhu,frequensi_nadi,berat_badan,frequensi_nafas,tinggi_badan,gcs,spo2,keluhan,riwayat, riwayat_dulu, skala_nyeri, d.riwayat_alergi from form_ass_per_igd f left join form_ass_dokter_igd d on f.id_history = d.id_history and d.id_pelayanan = f.id_pelayanan 
		having id_pelayanan = '$id'")->row();
		$diagnosa = $this->db->query("SELECT * from diagnosa_utama where id_pelayanan='$id' and SUBSTRING_INDEX(id_history, '_', 1) = 'ranap'")->row_array();
		// $ass_dok = $this->db->query("SELECT terapi,konsul from form_ass_dokter_ranap where id_pelayanan='$id'")->row_array();
		// $ass_per = $this->db->query("SELECT * from form_ass_per_ranap where id_pelayanan='$id'")->row_array();

		if (isset($poli) || (isset($poli) && isset($igd))) {
			$diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_history='$poli->id_history'")->row_array();

			$db = [
				'gcs' => 0,
				'e' => 0,
				'm' => 0,
				'v' => 0,
				'tekanan_darah' => $poli->tekanan_darah,
				'suhu' => $poli->suhu,
				'frequensi_nadi' => $poli->frequensi_nadi,
				'spo2' => 0,
				'berat_badan' => $poli->berat_badan,
				'frequensi_nafas' => $poli->frequensi_nafas,
				'tinggi_badan' => $poli->tinggi_badan,
				'keluhan' => $poli->keluhan_utama,
				'riwayat' => $poli->riwayat,
				'riwayat_dulu' => $poli->riwayat_dulu,
				'riwayat_alergi' => $poli->riwayat_alergi,
				// 'skala_nyeri' => $poli->skala_nyeri,
				'diagnosa' => !empty($diagnosa1) ? $diagnosa1['kode'] . ' - ' . $diagnosa1['nama_diagnosa'] : '',
				'diagnosa_utama' => !empty($diagnosa) ? $diagnosa['kode'] . ' - ' . $diagnosa['nama_diagnosa'] : '',
				// 'terapi' => !empty($ass_dok) ? $ass_dok['terapi'] : '',
				// 'konsul' => !empty($ass_dok) ? $ass_dok['konsul'] : '',
				// 'ass_per' => $ass_per,

			];
		} else {
			if (isset($igd)) {
				$diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_history='$igd->id_history'")->row_array();
				$db = [
					'gcs' => $igd->gcs,
					'e' => 0,
					'm' => 0,
					'v' => 0,
					'tekanan_darah' => $igd->tekanan_darah,
					'suhu' => $igd->suhu,
					'frequensi_nadi' => $igd->frequensi_nadi,
					'spo2' => $igd->spo2,
					'berat_badan' => $igd->berat_badan,
					'frequensi_nafas' => $igd->frequensi_nafas,
					'tinggi_badan' => $igd->tinggi_badan,
					'keluhan' => $igd->keluhan,
					'riwayat' => $igd->riwayat,
					'riwayat_dulu' => $igd->riwayat_dulu,
					'riwayat_alergi' => $igd->riwayat_alergi,
					// 'skala_nyeri' => $igd->skala_nyeri,
					'diagnosa' => !empty($diagnosa1) ? $diagnosa1['kode'] . ' - ' . $diagnosa1['nama_diagnosa'] : '',
					'diagnosa_utama' => !empty($diagnosa) ? $diagnosa['kode'] . ' - ' . $diagnosa['nama_diagnosa'] : '',
					// 'terapi' => !empty($ass_dok) ? $ass_dok['terapi'] : '',
					// 'konsul' => !empty($ass_dok) ? $ass_dok['konsul'] : '',
					// 'ass_per' => $ass_per,
				];
			} else {
				$db = null;
			}
		}
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
