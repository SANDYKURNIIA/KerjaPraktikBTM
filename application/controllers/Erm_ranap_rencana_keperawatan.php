<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_rencana_keperawatan extends CI_Controller
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
	public function formrencanakeperawatan($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');
		$no_rm = $selectPasien->no_rm;
		$id_history = $selectPasien->id_history;

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

		$id_masalah_kep_data = $this->M_Erm_ranap->getIdMasalahKepByNoRM($id_history);
		if ($id_masalah_kep_data) {
			// Mengambil id_masalah_kep dan nama
			$page_data['id_masalah_kep'] = array_column($id_masalah_kep_data, 'id_masalah_kep');
			$page_data['nama_masalah_kep'] = array_column($id_masalah_kep_data, 'nama');

			// Menggabungkan nama masalah keperawatan menjadi string yang dipisahkan koma
			$page_data['id_masalah_kep_display'] = implode(', ', $page_data['nama_masalah_kep']);
		} else {
			$page_data['id_masalah_kep_display'] = 'Tidak ada data';
		}

		// Memuat tampilan dengan data yang telah diproses
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_rencana_asuhan_keperawatan';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function tampil_list_per_id()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm_ranap->selectRencanaKep($id_pelayanan);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_rencana . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $page_data[$i]->id_rencana . "\")' '><i class='icon-trash'></i></button>";

			// $diagnosa = $page_data[$i]->diagnosa;
			// $tujuan = $page_data[$i]->tujuan;
			// $intervensi = $page_data[$i]->intervensi;
			$nama_masalah = $page_data[$i]->nama_masalah;
			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal);
			$out[$i] = array($no, $tombol, $hapus, $date, $nama_masalah);
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

	public function insert_rencana()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

		if ($this->form_validation->run()) {
			// Mengambil data dari input
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tanggal' => $this->input->post('tanggal'),

				'bukti_hipertermia' => str_replace('"', '', json_encode($this->input->post('bukti_hipertermia'))),
				'hasil_hipertermia' => str_replace('"', '', json_encode($this->input->post('hasil_hipertermia'))),
				'manajemen_hipertermia' => str_replace('"', '', json_encode($this->input->post('manajemen_hipertermia'))),

				'faktor_nausea' => str_replace('"', '', json_encode($this->input->post('faktor_nausea'))),
				'gejala_nausea' => str_replace('"', '', json_encode($this->input->post('gejala_nausea'))),
				'kriteria_hasil_nausea' => str_replace('"', '', json_encode($this->input->post('kriteria_hasil_nausea'))),
				'manajemen_mual' => str_replace('"', '', json_encode($this->input->post('manajemen_mual'))),
				'manajemen_muntah' => str_replace('"', '', json_encode($this->input->post('manajemen_muntah'))),

				'faktor_bersihan_jalan_nafas' => str_replace('"', '', json_encode($this->input->post('faktor_bersihan_jalan_nafas'))),
				'gejala_bersihan_jalan_nafas' => str_replace('"', '', json_encode($this->input->post('gejala_bersihan_jalan_nafas'))),
				'kriteria_hasil_bersihan_jalan_nafas' => str_replace('"', '', json_encode($this->input->post('kriteria_hasil_bersihan_jalan_nafas'))),
				'kriteria_hasil_tingkat_infeksi' => str_replace('"', '', json_encode($this->input->post('kriteria_hasil_tingkat_infeksi'))),
				'manajemen_jalan_nafas' => str_replace('"', '', json_encode($this->input->post('manajemen_jalan_nafas'))),
				'manajemen_isolasi' => str_replace('"', '', json_encode($this->input->post('manajemen_isolasi'))),


				'gejala' => str_replace('"', '', json_encode($this->input->post('gejala'))),
				'hasil_ansietas' => str_replace('"', '', json_encode($this->input->post('hasil_ansietas'))),
				'reduction_ansietas' => str_replace('"', '', json_encode($this->input->post('reduction_ansietas'))),
				'dukungan_ibadah' => str_replace('"', '', json_encode($this->input->post('dukungan_ibadah'))),

				'gejala_nyeri_akut' => str_replace('"', '', json_encode($this->input->post('gejala_nyeri_akut'))),
				'hasil_nyeri' => str_replace('"', '', json_encode($this->input->post('hasil_nyeri'))),

				'gejala_diare' => str_replace('"', '', json_encode($this->input->post('gejala_diare'))),
				'hasil_diare' => str_replace('"', '', json_encode($this->input->post('hasil_diare'))),
				'manajemen_diare' => str_replace('"', '', json_encode($this->input->post('manajemen_diare'))),

				'gejala_mobilitas' => str_replace('"', '', json_encode($this->input->post('gejala_mobilitas'))),
				'bukti_mobilitas' => str_replace('"', '', json_encode($this->input->post('bukti_mobilitas'))),
				'hasil_mobilitas' => str_replace('"', '', json_encode($this->input->post('hasil_mobilitas'))),
				'dukungan_mobilisasi' => str_replace('"', '', json_encode($this->input->post('dukungan_mobilisasi'))),

				'gangguan_penyapihan' => str_replace('"', '', json_encode($this->input->post('gangguan_penyapihan'))),
				'buktikan_penyapihan' => str_replace('"', '', json_encode($this->input->post('buktikan_penyapihan'))),
				'hasil_penyapihan' => str_replace('"', '', json_encode($this->input->post('hasil_penyapihan'))),

				'bukti_gangguan_pertukaran_gas' => str_replace('"', '', json_encode($this->input->post('bukti_gangguan_pertukaran_gas'))),
				'hasil_pertukaran_gas' => str_replace('"', '', json_encode($this->input->post('hasil_pertukaran_gas'))),

				'gangguan_poldur' => str_replace('"', '', json_encode($this->input->post('gangguan_poldur'))),
				'bukti_gangguan_poldur' => str_replace('"', '', json_encode($this->input->post('bukti_gangguan_poldur'))),
				'hasil_gangguan_poldur' => str_replace('"', '', json_encode($this->input->post('hasil_gangguan_poldur'))),
				'dukungan_poldur' => str_replace('"', '', json_encode($this->input->post('dukungan_poldur'))),

				'resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('resiko_jatuh'))),
				'bukti_resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_jatuh'))),
				'minor_resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('minor_resiko_jatuh'))),
				'hasil_resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_jatuh'))),
				'manajemen_resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('manajemen_resiko_jatuh'))),

				'defisit_perawatan_diri' => str_replace('"', '', json_encode($this->input->post('defisit_perawatan_diri'))),
				'bukti_defisit_perawatan_diri' => str_replace('"', '', json_encode($this->input->post('bukti_defisit_perawatan_diri'))),
				'hasil_defisit_perawatan_diri' => str_replace('"', '', json_encode($this->input->post('hasil_defisit_perawatan_diri'))),

				'bukti_hipovolemia' => str_replace('"', '', json_encode($this->input->post('bukti_hipovolemia'))),
				'hasil_hipovolemia' => str_replace('"', '', json_encode($this->input->post('hasil_hipovolemia'))),

				'intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('intoleransi_aktivitas'))),
				'bukti_intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('bukti_intoleransi_aktivitas'))),
				'minor_intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('minor_intoleransi_aktivitas'))),
				'hasil_intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('hasil_intoleransi_aktivitas'))),
				'manajemen_intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('manajemen_intoleransi_aktivitas'))),

				'curah_jantung' => str_replace('"', '', json_encode($this->input->post('curah_jantung'))),
				'bukti_curah_jantung' => str_replace('"', '', json_encode($this->input->post('bukti_curah_jantung'))),
				'hasil_curah_jantung' => str_replace('"', '', json_encode($this->input->post('hasil_curah_jantung'))),
				'perawatan_jantung' => str_replace('"', '', json_encode($this->input->post('perawatan_jantung'))),

				'bukti_penurunan_adaptif' => str_replace('"', '', json_encode($this->input->post('bukti_penurunan_adaptif'))),
				'hasil_penurunan_adaptif' => str_replace('"', '', json_encode($this->input->post('hasil_penurunan_adaptif'))),
				'manajemen_peningkatan_adaptif' => str_replace('"', '', json_encode($this->input->post('manajemen_peningkatan_adaptif'))),

				'hubungan_perfusi_perifier' => str_replace('"', '', json_encode($this->input->post('hubungan_perfusi_perifier'))),
				'bukti_perfusi_perifer' => str_replace('"', '', json_encode($this->input->post('bukti_perfusi_perifer'))),
				'hasil_perfusi_perifer' => str_replace('"', '', json_encode($this->input->post('hasil_perfusi_perifer'))),

				'hubungan_nafas_tidak_efektif' => str_replace('"', '', json_encode($this->input->post('hubungan_nafas_tidak_efektif'))),
				'bukti_nafas_tidak_efektif' => str_replace('"', '', json_encode($this->input->post('bukti_nafas_tidak_efektif'))),
				'hasil_nafas_tidak_efektif' => str_replace('"', '', json_encode($this->input->post('hasil_nafas_tidak_efektif'))),
				'manajamen_nafas_tidak_efektif' => str_replace('"', '', json_encode($this->input->post('manajamen_nafas_tidak_efektif'))),

				'bukti_resiko_defisit_nutrisi' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_defisit_nutrisi'))),
				'hasil_resiko_defisit_nutrisi' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_defisit_nutrisi'))),
				'manajamen_resiko_defisit_nutrisi' => str_replace('"', '', json_encode($this->input->post('manajamen_resiko_defisit_nutrisi'))),

				'bukti_resiko_hipovolemia' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_hipovolemia'))),
				'hasil_resiko_hipovolemia' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_hipovolemia'))),
				'manajamen_resiko_hipovolemia' => str_replace('"', '', json_encode($this->input->post('manajamen_resiko_hipovolemia'))),

				'bukti_resiko_infeksi' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_infeksi'))),
				'hasil_resiko_infeksi' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_infeksi'))),
				'pencegahan_resiko_infeksi' => str_replace('"', '', json_encode($this->input->post('pencegahan_resiko_infeksi'))),

				'bukti_resiko_ketidakstabilan_gula_darah' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_ketidakstabilan_gula_darah'))),
				'hasil_resiko_ketidakstabilan_gula_darah' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_ketidakstabilan_gula_darah'))),
				'manajemen_hiperglikimia' => str_replace('"', '', json_encode($this->input->post('manajemen_hiperglikimia'))),
				'manajemen_hipoglikimia' => str_replace('"', '', json_encode($this->input->post('manajemen_hipoglikimia'))),

				'bukti_resiko_perdarahan' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_perdarahan'))),
				'hasil_resiko_perdarahan' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_perdarahan'))),
				'pencegahan_resiko_perdarahan' => str_replace('"', '', json_encode($this->input->post('pencegahan_resiko_perdarahan'))),
				'laiinnya_resiko_perdarahan' => $this->input->post('laiinnya_resiko_perdarahan', true),
				'laiinnya_manajemen_hipertermia' => $this->input->post('laiinnya_manajemen_hipertermia', true),
				'laiinnya_manajemen_muntah' => $this->input->post('laiinnya_manajemen_muntah', true),
				'laiinnya_perawatan_jantung' => $this->input->post('laiinnya_perawatan_jantung', true),
				'laiinnya_hipoglikimia' => $this->input->post('laiinnya_hipoglikimia', true),
				'laiinnya_perfusi_perifer' => $this->input->post('laiinnya_perfusi_perifer', true),
				'laiinnya_resiko_hipovolemia' => $this->input->post('laiinnya_resiko_hipovolemia', true),
				'laiinnya_resiko_infeksi' => $this->input->post('laiinnya_resiko_infeksi', true),
				'laiinnya_peningkatan_adaptif' => $this->input->post('laiinnya_peningkatan_adaptif', true),
				'laiinnya_dukungan_ibadah' => $this->input->post('laiinnya_dukungan_ibadah', true),
				'laiinnya_isolasi' => $this->input->post('laiinnya_isolasi', true),
				'laiinnya_nyeri' => $this->input->post('laiinnya_nyeri', true),
				'laiinnya_poldur' => $this->input->post('laiinnya_poldur', true),
				'laiinnya_diare' => $this->input->post('laiinnya_diare', true),
				'laiinnya_defisit_nutrisi' => $this->input->post('laiinnya_defisit_nutrisi', true),
				'laiinnya_mobilisasi' => $this->input->post('laiinnya_mobilisasi', true),
				'laiinnya_penyapihan' => $this->input->post('laiinnya_penyapihan', true),
				'laiinnya_pertukaran_gas' => $this->input->post('laiinnya_pertukaran_gas', true),
				'laiinnya_jatuh' => $this->input->post('laiinnya_jatuh', true),
				'laiinnya_hipovolemia' => $this->input->post('laiinnya_hipovolemia', true),
				'laiinnya_aktivitas' => $this->input->post('laiinnya_aktivitas', true),
				'laiinnya_perawatan_diri' => $this->input->post('laiinnya_perawatan_diri', true),
				'laiinnya_nafas_tidak_efektif' => $this->input->post('laiinnya_nafas_tidak_efektif', true),
				'nama_masalah' => $this->input->post('inIdMasalahKep'),
				'tanggal_input' => $tgl,
				'staff' => $staff,
			);
			$this->M_Erm_ranap->insert($data, 'rencana_keperawatan');
			$out['status'] = "success";
		} else {
			// Jika validasi gagal, mengembalikan error
			$out = array(
				'error' => true,
				'tanggal' => form_error('tanggal'),
				'faktor_bersihan_jalan_nafas' => form_error('faktor_bersihan_jalan_nafas'),
				'gejala_bersihan_jalan_nafas' => form_error('gejala_bersihan_jalan_nafas'),
				'kriteria_hasil_bersihan_jalan_nafas' => form_error('kriteria_hasil_bersihan_jalan_nafas'),
				'kriteria_hasil_tingkat_infeksi' => form_error('kriteria_hasil_tingkat_infeksi'),
				'manajemen_jalan_nafas' => form_error('manajemen_jalan_nafas'),
				'gejala' => form_error('gejala'),
				'hasil_ansietas' => form_error('hasil_ansietas'),
				'reduction_ansietas' => form_error('reduction_ansietas'),
				'dukungan_ibadah' => form_error('dukungan_ibadah'),
				'gejala_nyeri_akut' => form_error('gejala_nyeri_akut'),
				'hasil_nyeri' => form_error('hasil_nyeri'),
				'gejala_diare' => form_error('gejala_diare'),
				'hasil_diare' => form_error('hasil_diare'),
				'manajemen_diare' => form_error('manajemen_diare'),
				'gejala_mobilitas' => form_error('gejala_mobilitas'),
				'bukti_mobilitas' => form_error('bukti_mobilitas'),
				'hasil_mobilitas' => form_error('hasil_mobilitas'),
				'dukungan_mobilisasi' => form_error('dukungan_mobilisasi'),
				'gangguan_penyapihan' => form_error('gangguan_penyapihan'),
				'buktikan_penyapihan' => form_error('buktikan_penyapihan'),
				'hasil_penyapihan' => form_error('hasil_penyapihan'),
				'bukti_gangguan_pertukaran_gas' => form_error('bukti_gangguan_pertukaran_gas'),
				'hasil_pertukaran_gas' => form_error('hasil_pertukaran_gas'),
				'gangguan_poldur' => form_error('gangguan_poldur'),
				'bukti_gangguan_poldur' => form_error('bukti_gangguan_poldur'),
				'hasil_gangguan_poldur' => form_error('hasil_gangguan_poldur'),
				'dukungan_poldur' => form_error('dukungan_poldur'),
				'resiko_jatuh' => form_error('resiko_jatuh'),
				'bukti_resiko_jatuh' => form_error('bukti_resiko_jatuh'),
				'minor_resiko_jatuh' => form_error('minor_resiko_jatuh'),
				'hasil_resiko_jatuh' => form_error('hasil_resiko_jatuh'),
				'manajemen_resiko_jatuh' => form_error('manajemen_resiko_jatuh'),
			);
		}
		echo json_encode($out);
	}

	public function edit_rencana()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$id = $this->input->post('id');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tanggal' => $this->input->post('tanggal'),

				'bukti_hipertermia' => str_replace('"', '', json_encode($this->input->post('bukti_hipertermia'))),
				'hasil_hipertermia' => str_replace('"', '', json_encode($this->input->post('hasil_hipertermia'))),
				'manajemen_hipertermia' => str_replace('"', '', json_encode($this->input->post('manajemen_hipertermia'))),

				'faktor_nausea' => str_replace('"', '', json_encode($this->input->post('faktor_nausea'))),
				'gejala_nausea' => str_replace('"', '', json_encode($this->input->post('gejala_nausea'))),
				'kriteria_hasil_nausea' => str_replace('"', '', json_encode($this->input->post('kriteria_hasil_nausea'))),
				'manajemen_mual' => str_replace('"', '', json_encode($this->input->post('manajemen_mual'))),
				'manajemen_muntah' => str_replace('"', '', json_encode($this->input->post('manajemen_muntah'))),

				'faktor_bersihan_jalan_nafas' => str_replace('"', '', json_encode($this->input->post('faktor_bersihan_jalan_nafas'))),
				'gejala_bersihan_jalan_nafas' => str_replace('"', '', json_encode($this->input->post('gejala_bersihan_jalan_nafas'))),
				'kriteria_hasil_bersihan_jalan_nafas' => str_replace('"', '', json_encode($this->input->post('kriteria_hasil_bersihan_jalan_nafas'))),
				'kriteria_hasil_tingkat_infeksi' => str_replace('"', '', json_encode($this->input->post('kriteria_hasil_tingkat_infeksi'))),
				'manajemen_jalan_nafas' => str_replace('"', '', json_encode($this->input->post('manajemen_jalan_nafas'))),
				'manajemen_isolasi' => str_replace('"', '', json_encode($this->input->post('manajemen_isolasi'))),
				'gejala' => str_replace('"', '', json_encode($this->input->post('gejala'))),
				'hasil_ansietas' => str_replace('"', '', json_encode($this->input->post('hasil_ansietas'))),
				'reduction_ansietas' => str_replace('"', '', json_encode($this->input->post('reduction_ansietas'))),
				'dukungan_ibadah' => str_replace('"', '', json_encode($this->input->post('dukungan_ibadah'))),
				'gejala_nyeri_akut' => str_replace('"', '', json_encode($this->input->post('gejala_nyeri_akut'))),
				'hasil_nyeri' => str_replace('"', '', json_encode($this->input->post('hasil_nyeri'))),
				'gejala_diare' => str_replace('"', '', json_encode($this->input->post('gejala_diare'))),
				'hasil_diare' => str_replace('"', '', json_encode($this->input->post('hasil_diare'))),
				'manajemen_diare' => str_replace('"', '', json_encode($this->input->post('manajemen_diare'))),
				'gejala_mobilitas' => str_replace('"', '', json_encode($this->input->post('gejala_mobilitas'))),
				'bukti_mobilitas' => str_replace('"', '', json_encode($this->input->post('bukti_mobilitas'))),
				'hasil_mobilitas' => str_replace('"', '', json_encode($this->input->post('hasil_mobilitas'))),
				'dukungan_mobilisasi' => str_replace('"', '', json_encode($this->input->post('dukungan_mobilisasi'))),
				'gangguan_penyapihan' => str_replace('"', '', json_encode($this->input->post('gangguan_penyapihan'))),
				'buktikan_penyapihan' => str_replace('"', '', json_encode($this->input->post('buktikan_penyapihan'))),
				'hasil_penyapihan' => str_replace('"', '', json_encode($this->input->post('hasil_penyapihan'))),
				'bukti_gangguan_pertukaran_gas' => str_replace('"', '', json_encode($this->input->post('bukti_gangguan_pertukaran_gas'))),
				'hasil_pertukaran_gas' => str_replace('"', '', json_encode($this->input->post('hasil_pertukaran_gas'))),
				'gangguan_poldur' => str_replace('"', '', json_encode($this->input->post('gangguan_poldur'))),
				'bukti_gangguan_poldur' => str_replace('"', '', json_encode($this->input->post('bukti_gangguan_poldur'))),
				'hasil_gangguan_poldur' => str_replace('"', '', json_encode($this->input->post('hasil_gangguan_poldur'))),
				'dukungan_poldur' => str_replace('"', '', json_encode($this->input->post('dukungan_poldur'))),
				'resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('resiko_jatuh'))),
				'bukti_resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_jatuh'))),
				'minor_resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('minor_resiko_jatuh'))),
				'hasil_resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_jatuh'))),
				'manajemen_resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('manajemen_resiko_jatuh'))),

				'defisit_perawatan_diri' => str_replace('"', '', json_encode($this->input->post('defisit_perawatan_diri'))),
				'bukti_defisit_perawatan_diri' => str_replace('"', '', json_encode($this->input->post('bukti_defisit_perawatan_diri'))),
				'hasil_defisit_perawatan_diri' => str_replace('"', '', json_encode($this->input->post('hasil_defisit_perawatan_diri'))),

				'bukti_hipovolemia' => str_replace('"', '', json_encode($this->input->post('bukti_hipovolemia'))),
				'hasil_hipovolemia' => str_replace('"', '', json_encode($this->input->post('hasil_hipovolemia'))),
				'intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('intoleransi_aktivitas'))),
				'bukti_intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('bukti_intoleransi_aktivitas'))),
				'minor_intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('minor_intoleransi_aktivitas'))),
				'hasil_intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('hasil_intoleransi_aktivitas'))),
				'manajemen_intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('manajemen_intoleransi_aktivitas'))),
				'curah_jantung' => str_replace('"', '', json_encode($this->input->post('curah_jantung'))),
				'bukti_curah_jantung' => str_replace('"', '', json_encode($this->input->post('bukti_curah_jantung'))),
				'hasil_curah_jantung' => str_replace('"', '', json_encode($this->input->post('hasil_curah_jantung'))),
				'perawatan_jantung' => str_replace('"', '', json_encode($this->input->post('perawatan_jantung'))),
				'bukti_penurunan_adaptif' => str_replace('"', '', json_encode($this->input->post('bukti_penurunan_adaptif'))),
				'hasil_penurunan_adaptif' => str_replace('"', '', json_encode($this->input->post('hasil_penurunan_adaptif'))),
				'manajemen_peningkatan_adaptif' => str_replace('"', '', json_encode($this->input->post('manajemen_peningkatan_adaptif'))),

				'hubungan_perfusi_perifier' => str_replace('"', '', json_encode($this->input->post('hubungan_perfusi_perifier'))),
				'bukti_perfusi_perifer' => str_replace('"', '', json_encode($this->input->post('bukti_perfusi_perifer'))),
				'hasil_perfusi_perifer' => str_replace('"', '', json_encode($this->input->post('hasil_perfusi_perifer'))),

				'hubungan_nafas_tidak_efektif' => str_replace('"', '', json_encode($this->input->post('hubungan_nafas_tidak_efektif'))),
				'bukti_nafas_tidak_efektif' => str_replace('"', '', json_encode($this->input->post('bukti_nafas_tidak_efektif'))),
				'hasil_nafas_tidak_efektif' => str_replace('"', '', json_encode($this->input->post('hasil_nafas_tidak_efektif'))),
				'manajamen_nafas_tidak_efektif' => str_replace('"', '', json_encode($this->input->post('manajamen_nafas_tidak_efektif'))),

				'bukti_resiko_defisit_nutrisi' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_defisit_nutrisi'))),
				'hasil_resiko_defisit_nutrisi' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_defisit_nutrisi'))),
				'manajamen_resiko_defisit_nutrisi' => str_replace('"', '', json_encode($this->input->post('manajamen_resiko_defisit_nutrisi'))),
	

				'bukti_resiko_hipovolemia' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_hipovolemia'))),
				'hasil_resiko_hipovolemia' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_hipovolemia'))),
				'manajamen_resiko_hipovolemia' => str_replace('"', '', json_encode($this->input->post('manajamen_resiko_hipovolemia'))),

				'bukti_resiko_infeksi' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_infeksi'))),
				'hasil_resiko_infeksi' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_infeksi'))),
				'pencegahan_resiko_infeksi' => str_replace('"', '', json_encode($this->input->post('pencegahan_resiko_infeksi'))),

				'bukti_resiko_ketidakstabilan_gula_darah' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_ketidakstabilan_gula_darah'))),
				'hasil_resiko_ketidakstabilan_gula_darah' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_ketidakstabilan_gula_darah'))),
				'manajemen_hiperglikimia' => str_replace('"', '', json_encode($this->input->post('manajemen_hiperglikimia'))),
				'manajemen_hipoglikimia' => str_replace('"', '', json_encode($this->input->post('manajemen_hipoglikimia'))),

				'bukti_resiko_perdarahan' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_perdarahan'))),
				'hasil_resiko_perdarahan' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_perdarahan'))),
				'pencegahan_resiko_perdarahan' => str_replace('"', '', json_encode($this->input->post('pencegahan_resiko_perdarahan'))),

				'nama_masalah' => $this->input->post('inIdMasalahKep'),
				'tanggal_input' => $tgl,
				'staff' => $staff,
				'laiinnya_resiko_perdarahan' => $this->input->post('laiinnya_resiko_perdarahan', true),
				'laiinnya_manajemen_hipertermia' => $this->input->post('laiinnya_manajemen_hipertermia', true),
				'laiinnya_manajemen_muntah' => $this->input->post('laiinnya_manajemen_muntah', true),
				'laiinnya_perawatan_jantung' => $this->input->post('laiinnya_perawatan_jantung', true),
				'laiinnya_hipoglikimia' => $this->input->post('laiinnya_hipoglikimia', true),
				'laiinnya_perfusi_perifer' => $this->input->post('laiinnya_perfusi_perifer', true),
				'laiinnya_peningkatan_adaptif' => $this->input->post('laiinnya_peningkatan_adaptif', true),
				'laiinnya_resiko_infeksi' => $this->input->post('laiinnya_resiko_infeksi', true),
				'laiinnya_resiko_hipovolemia' => $this->input->post('laiinnya_resiko_hipovolemia', true),
				'laiinnya_dukungan_ibadah' => $this->input->post('laiinnya_dukungan_ibadah', true),
				'laiinnya_isolasi' => $this->input->post('laiinnya_isolasi', true),
				'laiinnya_nyeri' => $this->input->post('laiinnya_nyeri', true),
				'laiinnya_diare' => $this->input->post('laiinnya_diare', true),
				'laiinnya_mobilisasi' => $this->input->post('laiinnya_mobilisasi', true),
				'laiinnya_defisit_nutrisi' => $this->input->post('laiinnya_defisit_nutrisi', true),
				'laiinnya_poldur' => $this->input->post('laiinnya_poldur', true),
				'laiinnya_pertukaran_gas' => $this->input->post('laiinnya_pertukaran_gas', true),
				'laiinnya_jatuh' => $this->input->post('laiinnya_jatuh', true),
				'laiinnya_hipovolemia' => $this->input->post('laiinnya_hipovolemia', true),
				'laiinnya_aktivitas' => $this->input->post('laiinnya_aktivitas', true),
				'laiinnya_perawatan_diri' => $this->input->post('laiinnya_perawatan_diri', true),
				'laiinnya_nafas_tidak_efektif' => $this->input->post('laiinnya_nafas_tidak_efektif', true),
				'laiinnya_penyapihan' => $this->input->post('laiinnya_penyapihan', true),
			);

			$this->M_Erm_ranap->update_rencana($id, $data);
			$out['status'] = "success";
		} else {
			$out = array(
				'error' => true,
				'tanggal' => form_error('tanggal'),
				'faktor_bersihan_jalan_nafas' => form_error('faktor_bersihan_jalan_nafas'),
				'gejala_bersihan_jalan_nafas' => form_error('gejala_bersihan_jalan_nafas'),
				'kriteria_hasil_bersihan_jalan_nafas' => form_error('kriteria_hasil_bersihan_jalan_nafas'),
				'kriteria_hasil_tingkat_infeksi' => form_error('kriteria_hasil_tingkat_infeksi'),
				'manajemen_jalan_nafas' => form_error('manajemen_jalan_nafas'),
				'gejala' => form_error('gejala'),
				'hasil_ansietas' => form_error('hasil_ansietas'),
				'reduction_ansietas' => form_error('reduction_ansietas'),
				'dukungan_ibadah' => form_error('dukungan_ibadah'),
				'gejala_nyeri_akut' => form_error('gejala_nyeri_akut'),
				'hasil_nyeri' => form_error('hasil_nyeri'),
				'gejala_diare' => form_error('gejala_diare'),
				'hasil_diare' => form_error('hasil_diare'),
				'manajemen_diare' => form_error('manajemen_diare'),
				'gejala_mobilitas' => form_error('gejala_mobilitas'),
				'bukti_mobilitas' => form_error('bukti_mobilitas'),
				'hasil_mobilitas' => form_error('hasil_mobilitas'),
				'dukungan_mobilisasi' => form_error('dukungan_mobilisasi'),
				'gangguan_penyapihan' => form_error('gangguan_penyapihan'),
				'buktikan_penyapihan' => form_error('buktikan_penyapihan'),
				'hasil_penyapihan' => form_error('hasil_penyapihan'),
				'bukti_gangguan_pertukaran_gas' => form_error('bukti_gangguan_pertukaran_gas'),
				'hasil_pertukaran_gas' => form_error('hasil_pertukaran_gas'),
				'gangguan_poldur' => form_error('gangguan_poldur'),
				'bukti_gangguan_poldur' => form_error('bukti_gangguan_poldur'),
				'hasil_gangguan_poldur' => form_error('hasil_gangguan_poldur'),
				'dukungan_poldur' => form_error('dukungan_poldur'),
				'resiko_jatuh' => form_error('resiko_jatuh'),
				'bukti_resiko_jatuh' => form_error('bukti_resiko_jatuh'),
				'minor_resiko_jatuh' => form_error('minor_resiko_jatuh'),
				'hasil_resiko_jatuh' => form_error('hasil_resiko_jatuh'),
				'manajemen_resiko_jatuh' => form_error('manajemen_resiko_jatuh'),
			);
		}
		echo json_encode($out);
	}


	// public function insert_rencana()
	// {
	// 	$data = $this->session->userdata('data_auth');
	// 	$tgl = date("Y-m-d h:i:s");
	// 	$staff = $data->id_staff;

	// 	$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
	// 	// $this->form_validation->set_rules('diagnosa', 'Diagnosa', 'required');
	// 	// $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
	// 	// $this->form_validation->set_rules('intervensi', 'Intervensi', 'required');
	// 	if ($this->form_validation->run()) {
	// 		$data = array(
	// 			'id_pelayanan' => $this->input->post('id_pelayanan'),
	// 			'id_history' => $this->input->post('id_history'),
	// 			'no_rm' => $this->input->post('no_rm'),
	// 			'tanggal' => $this->input->post('tanggal'),
	// 			// 'diagnosa' => $this->input->post('diagnosa'),
	// 			// 'tujuan' => $this->input->post('tujuan'),
	// 			// 'intervensi' => $this->input->post('intervensi'),
	// 			'tanggal_input' => $tgl,
	// 			'staff' => $staff,
	// 		);
	// 		// $data2 = array(
	// 		// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
	// 		// 	'id_history' => $this->input->post('id_history'),
	// 		// 	'no_rm' => $this->input->post('no_rm'),
	// 		// );
	// 		$this->M_Erm_ranap->insert($data, 'rencana_keperawatan');
	// 		// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
	// 		$out['status'] = "success";
	// 	} else {
	// 		$out = array(
	// 			'error'   => true,
	// 			'tanggal' => form_error('tanggal'),
	// 			// 'diagnosa' => form_error('diagnosa'),
	// 			// 'tujuan' => form_error('tujuan'),
	// 			// 'intervensi' => form_error('intervensi'),
	// 		);
	// 	}
	// 	echo json_encode($out);
	// }






	function hapus_rencana()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_rencana' => $id,
		);
		$this->M_Erm_ranap->delete($where, 'rencana_keperawatan');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function getPerRencana()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('rencana_keperawatan', ['id_rencana' => $id])->row_array();
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
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_rencana_keperawatan extends CI_Controller
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
	public function formrencanakeperawatan($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');
		$no_rm = $selectPasien->no_rm;
		$id_history = $selectPasien->id_history;

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

		$id_masalah_kep_data = $this->M_Erm_ranap->getIdMasalahKepByNoRM($id_history);
		if ($id_masalah_kep_data) {
			// Mengambil id_masalah_kep dan nama
			$page_data['id_masalah_kep'] = array_column($id_masalah_kep_data, 'id_masalah_kep');
			$page_data['nama_masalah_kep'] = array_column($id_masalah_kep_data, 'nama');

			// Menggabungkan nama masalah keperawatan menjadi string yang dipisahkan koma
			$page_data['id_masalah_kep_display'] = implode(', ', $page_data['nama_masalah_kep']);
		} else {
			$page_data['id_masalah_kep_display'] = 'Tidak ada data';
		}

		// Memuat tampilan dengan data yang telah diproses
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_rencana_asuhan_keperawatan';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function tampil_list_per_id()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm_ranap->selectRencanaKep($id_pelayanan);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_rencana . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $page_data[$i]->id_rencana . "\")' '><i class='icon-trash'></i></button>";

			// $diagnosa = $page_data[$i]->diagnosa;
			// $tujuan = $page_data[$i]->tujuan;
			// $intervensi = $page_data[$i]->intervensi;
			$nama_masalah = $page_data[$i]->nama_masalah;
			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal);
			$out[$i] = array($no, $tombol, $hapus, $date, $nama_masalah);
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

	public function insert_rencana()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

		if ($this->form_validation->run()) {
			// Mengambil data dari input
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tanggal' => $this->input->post('tanggal'),

				'bukti_hipertermia' => str_replace('"', '', json_encode($this->input->post('bukti_hipertermia'))),
				'hasil_hipertermia' => str_replace('"', '', json_encode($this->input->post('hasil_hipertermia'))),
				'manajemen_hipertermia' => str_replace('"', '', json_encode($this->input->post('manajemen_hipertermia'))),

				'faktor_nausea' => str_replace('"', '', json_encode($this->input->post('faktor_nausea'))),
				'gejala_nausea' => str_replace('"', '', json_encode($this->input->post('gejala_nausea'))),
				'kriteria_hasil_nausea' => str_replace('"', '', json_encode($this->input->post('kriteria_hasil_nausea'))),
				'manajemen_mual' => str_replace('"', '', json_encode($this->input->post('manajemen_mual'))),
				'manajemen_muntah' => str_replace('"', '', json_encode($this->input->post('manajemen_muntah'))),

				'faktor_bersihan_jalan_nafas' => str_replace('"', '', json_encode($this->input->post('faktor_bersihan_jalan_nafas'))),
				'gejala_bersihan_jalan_nafas' => str_replace('"', '', json_encode($this->input->post('gejala_bersihan_jalan_nafas'))),
				'kriteria_hasil_bersihan_jalan_nafas' => str_replace('"', '', json_encode($this->input->post('kriteria_hasil_bersihan_jalan_nafas'))),
				'kriteria_hasil_tingkat_infeksi' => str_replace('"', '', json_encode($this->input->post('kriteria_hasil_tingkat_infeksi'))),
				'manajemen_jalan_nafas' => str_replace('"', '', json_encode($this->input->post('manajemen_jalan_nafas'))),
				'manajemen_isolasi' => str_replace('"', '', json_encode($this->input->post('manajemen_isolasi'))),


				'gejala' => str_replace('"', '', json_encode($this->input->post('gejala'))),
				'hasil_ansietas' => str_replace('"', '', json_encode($this->input->post('hasil_ansietas'))),
				'reduction_ansietas' => str_replace('"', '', json_encode($this->input->post('reduction_ansietas'))),
				'dukungan_ibadah' => str_replace('"', '', json_encode($this->input->post('dukungan_ibadah'))),

				'gejala_nyeri_akut' => str_replace('"', '', json_encode($this->input->post('gejala_nyeri_akut'))),
				'hasil_nyeri' => str_replace('"', '', json_encode($this->input->post('hasil_nyeri'))),

				'gejala_diare' => str_replace('"', '', json_encode($this->input->post('gejala_diare'))),
				'hasil_diare' => str_replace('"', '', json_encode($this->input->post('hasil_diare'))),
				'manajemen_diare' => str_replace('"', '', json_encode($this->input->post('manajemen_diare'))),

				'gejala_mobilitas' => str_replace('"', '', json_encode($this->input->post('gejala_mobilitas'))),
				'bukti_mobilitas' => str_replace('"', '', json_encode($this->input->post('bukti_mobilitas'))),
				'hasil_mobilitas' => str_replace('"', '', json_encode($this->input->post('hasil_mobilitas'))),
				'dukungan_mobilisasi' => str_replace('"', '', json_encode($this->input->post('dukungan_mobilisasi'))),

				'gangguan_penyapihan' => str_replace('"', '', json_encode($this->input->post('gangguan_penyapihan'))),
				'buktikan_penyapihan' => str_replace('"', '', json_encode($this->input->post('buktikan_penyapihan'))),
				'hasil_penyapihan' => str_replace('"', '', json_encode($this->input->post('hasil_penyapihan'))),

				'bukti_gangguan_pertukaran_gas' => str_replace('"', '', json_encode($this->input->post('bukti_gangguan_pertukaran_gas'))),
				'hasil_pertukaran_gas' => str_replace('"', '', json_encode($this->input->post('hasil_pertukaran_gas'))),

				'gangguan_poldur' => str_replace('"', '', json_encode($this->input->post('gangguan_poldur'))),
				'bukti_gangguan_poldur' => str_replace('"', '', json_encode($this->input->post('bukti_gangguan_poldur'))),
				'hasil_gangguan_poldur' => str_replace('"', '', json_encode($this->input->post('hasil_gangguan_poldur'))),
				'dukungan_poldur' => str_replace('"', '', json_encode($this->input->post('dukungan_poldur'))),

				'resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('resiko_jatuh'))),
				'bukti_resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_jatuh'))),
				'minor_resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('minor_resiko_jatuh'))),
				'hasil_resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_jatuh'))),
				'manajemen_resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('manajemen_resiko_jatuh'))),

				'defisit_perawatan_diri' => str_replace('"', '', json_encode($this->input->post('defisit_perawatan_diri'))),
				'bukti_defisit_perawatan_diri' => str_replace('"', '', json_encode($this->input->post('bukti_defisit_perawatan_diri'))),
				'hasil_defisit_perawatan_diri' => str_replace('"', '', json_encode($this->input->post('hasil_defisit_perawatan_diri'))),

				'bukti_hipovolemia' => str_replace('"', '', json_encode($this->input->post('bukti_hipovolemia'))),
				'hasil_hipovolemia' => str_replace('"', '', json_encode($this->input->post('hasil_hipovolemia'))),

				'intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('intoleransi_aktivitas'))),
				'bukti_intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('bukti_intoleransi_aktivitas'))),
				'minor_intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('minor_intoleransi_aktivitas'))),
				'hasil_intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('hasil_intoleransi_aktivitas'))),
				'manajemen_intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('manajemen_intoleransi_aktivitas'))),

				'curah_jantung' => str_replace('"', '', json_encode($this->input->post('curah_jantung'))),
				'bukti_curah_jantung' => str_replace('"', '', json_encode($this->input->post('bukti_curah_jantung'))),
				'hasil_curah_jantung' => str_replace('"', '', json_encode($this->input->post('hasil_curah_jantung'))),
				'perawatan_jantung' => str_replace('"', '', json_encode($this->input->post('perawatan_jantung'))),

				'bukti_penurunan_adaptif' => str_replace('"', '', json_encode($this->input->post('bukti_penurunan_adaptif'))),
				'hasil_penurunan_adaptif' => str_replace('"', '', json_encode($this->input->post('hasil_penurunan_adaptif'))),
				'manajemen_peningkatan_adaptif' => str_replace('"', '', json_encode($this->input->post('manajemen_peningkatan_adaptif'))),

				'hubungan_perfusi_perifier' => str_replace('"', '', json_encode($this->input->post('hubungan_perfusi_perifier'))),
				'bukti_perfusi_perifer' => str_replace('"', '', json_encode($this->input->post('bukti_perfusi_perifer'))),
				'hasil_perfusi_perifer' => str_replace('"', '', json_encode($this->input->post('hasil_perfusi_perifer'))),

				'hubungan_nafas_tidak_efektif' => str_replace('"', '', json_encode($this->input->post('hubungan_nafas_tidak_efektif'))),
				'bukti_nafas_tidak_efektif' => str_replace('"', '', json_encode($this->input->post('bukti_nafas_tidak_efektif'))),
				'hasil_nafas_tidak_efektif' => str_replace('"', '', json_encode($this->input->post('hasil_nafas_tidak_efektif'))),
				'manajamen_nafas_tidak_efektif' => str_replace('"', '', json_encode($this->input->post('manajamen_nafas_tidak_efektif'))),

				'bukti_resiko_defisit_nutrisi' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_defisit_nutrisi'))),
				'hasil_resiko_defisit_nutrisi' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_defisit_nutrisi'))),
				'manajamen_resiko_defisit_nutrisi' => str_replace('"', '', json_encode($this->input->post('manajamen_resiko_defisit_nutrisi'))),

				'bukti_resiko_hipovolemia' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_hipovolemia'))),
				'hasil_resiko_hipovolemia' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_hipovolemia'))),
				'manajamen_resiko_hipovolemia' => str_replace('"', '', json_encode($this->input->post('manajamen_resiko_hipovolemia'))),

				'bukti_resiko_infeksi' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_infeksi'))),
				'hasil_resiko_infeksi' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_infeksi'))),
				'pencegahan_resiko_infeksi' => str_replace('"', '', json_encode($this->input->post('pencegahan_resiko_infeksi'))),

				'bukti_resiko_ketidakstabilan_gula_darah' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_ketidakstabilan_gula_darah'))),
				'hasil_resiko_ketidakstabilan_gula_darah' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_ketidakstabilan_gula_darah'))),
				'manajemen_hiperglikimia' => str_replace('"', '', json_encode($this->input->post('manajemen_hiperglikimia'))),
				'manajemen_hipoglikimia' => str_replace('"', '', json_encode($this->input->post('manajemen_hipoglikimia'))),

				'bukti_resiko_perdarahan' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_perdarahan'))),
				'hasil_resiko_perdarahan' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_perdarahan'))),
				'pencegahan_resiko_perdarahan' => str_replace('"', '', json_encode($this->input->post('pencegahan_resiko_perdarahan'))),
				'laiinnya_resiko_perdarahan' => $this->input->post('laiinnya_resiko_perdarahan', true),
				'laiinnya_manajemen_hipertermia' => $this->input->post('laiinnya_manajemen_hipertermia', true),
				'laiinnya_manajemen_muntah' => $this->input->post('laiinnya_manajemen_muntah', true),
				'laiinnya_perawatan_jantung' => $this->input->post('laiinnya_perawatan_jantung', true),
				'laiinnya_hipoglikimia' => $this->input->post('laiinnya_hipoglikimia', true),
				'laiinnya_perfusi_perifer' => $this->input->post('laiinnya_perfusi_perifer', true),
				'laiinnya_resiko_hipovolemia' => $this->input->post('laiinnya_resiko_hipovolemia', true),
				'laiinnya_resiko_infeksi' => $this->input->post('laiinnya_resiko_infeksi', true),
				'laiinnya_peningkatan_adaptif' => $this->input->post('laiinnya_peningkatan_adaptif', true),
				'laiinnya_dukungan_ibadah' => $this->input->post('laiinnya_dukungan_ibadah', true),
				'laiinnya_isolasi' => $this->input->post('laiinnya_isolasi', true),
				'laiinnya_nyeri' => $this->input->post('laiinnya_nyeri', true),
				'laiinnya_poldur' => $this->input->post('laiinnya_poldur', true),
				'laiinnya_diare' => $this->input->post('laiinnya_diare', true),
				'laiinnya_defisit_nutrisi' => $this->input->post('laiinnya_defisit_nutrisi', true),
				'laiinnya_mobilisasi' => $this->input->post('laiinnya_mobilisasi', true),
				'laiinnya_penyapihan' => $this->input->post('laiinnya_penyapihan', true),
				'laiinnya_pertukaran_gas' => $this->input->post('laiinnya_pertukaran_gas', true),
				'laiinnya_jatuh' => $this->input->post('laiinnya_jatuh', true),
				'laiinnya_hipovolemia' => $this->input->post('laiinnya_hipovolemia', true),
				'laiinnya_aktivitas' => $this->input->post('laiinnya_aktivitas', true),
				'laiinnya_perawatan_diri' => $this->input->post('laiinnya_perawatan_diri', true),
				'laiinnya_nafas_tidak_efektif' => $this->input->post('laiinnya_nafas_tidak_efektif', true),
				'nama_masalah' => $this->input->post('inIdMasalahKep'),
				'tanggal_input' => $tgl,
				'staff' => $staff,
			);
			$this->M_Erm_ranap->insert($data, 'rencana_keperawatan');
			$out['status'] = "success";
		} else {
			// Jika validasi gagal, mengembalikan error
			$out = array(
				'error' => true,
				'tanggal' => form_error('tanggal'),
				'faktor_bersihan_jalan_nafas' => form_error('faktor_bersihan_jalan_nafas'),
				'gejala_bersihan_jalan_nafas' => form_error('gejala_bersihan_jalan_nafas'),
				'kriteria_hasil_bersihan_jalan_nafas' => form_error('kriteria_hasil_bersihan_jalan_nafas'),
				'kriteria_hasil_tingkat_infeksi' => form_error('kriteria_hasil_tingkat_infeksi'),
				'manajemen_jalan_nafas' => form_error('manajemen_jalan_nafas'),
				'gejala' => form_error('gejala'),
				'hasil_ansietas' => form_error('hasil_ansietas'),
				'reduction_ansietas' => form_error('reduction_ansietas'),
				'dukungan_ibadah' => form_error('dukungan_ibadah'),
				'gejala_nyeri_akut' => form_error('gejala_nyeri_akut'),
				'hasil_nyeri' => form_error('hasil_nyeri'),
				'gejala_diare' => form_error('gejala_diare'),
				'hasil_diare' => form_error('hasil_diare'),
				'manajemen_diare' => form_error('manajemen_diare'),
				'gejala_mobilitas' => form_error('gejala_mobilitas'),
				'bukti_mobilitas' => form_error('bukti_mobilitas'),
				'hasil_mobilitas' => form_error('hasil_mobilitas'),
				'dukungan_mobilisasi' => form_error('dukungan_mobilisasi'),
				'gangguan_penyapihan' => form_error('gangguan_penyapihan'),
				'buktikan_penyapihan' => form_error('buktikan_penyapihan'),
				'hasil_penyapihan' => form_error('hasil_penyapihan'),
				'bukti_gangguan_pertukaran_gas' => form_error('bukti_gangguan_pertukaran_gas'),
				'hasil_pertukaran_gas' => form_error('hasil_pertukaran_gas'),
				'gangguan_poldur' => form_error('gangguan_poldur'),
				'bukti_gangguan_poldur' => form_error('bukti_gangguan_poldur'),
				'hasil_gangguan_poldur' => form_error('hasil_gangguan_poldur'),
				'dukungan_poldur' => form_error('dukungan_poldur'),
				'resiko_jatuh' => form_error('resiko_jatuh'),
				'bukti_resiko_jatuh' => form_error('bukti_resiko_jatuh'),
				'minor_resiko_jatuh' => form_error('minor_resiko_jatuh'),
				'hasil_resiko_jatuh' => form_error('hasil_resiko_jatuh'),
				'manajemen_resiko_jatuh' => form_error('manajemen_resiko_jatuh'),
			);
		}
		echo json_encode($out);
	}

	public function edit_rencana()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$id = $this->input->post('id');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tanggal' => $this->input->post('tanggal'),

				'bukti_hipertermia' => str_replace('"', '', json_encode($this->input->post('bukti_hipertermia'))),
				'hasil_hipertermia' => str_replace('"', '', json_encode($this->input->post('hasil_hipertermia'))),
				'manajemen_hipertermia' => str_replace('"', '', json_encode($this->input->post('manajemen_hipertermia'))),

				'faktor_nausea' => str_replace('"', '', json_encode($this->input->post('faktor_nausea'))),
				'gejala_nausea' => str_replace('"', '', json_encode($this->input->post('gejala_nausea'))),
				'kriteria_hasil_nausea' => str_replace('"', '', json_encode($this->input->post('kriteria_hasil_nausea'))),
				'manajemen_mual' => str_replace('"', '', json_encode($this->input->post('manajemen_mual'))),
				'manajemen_muntah' => str_replace('"', '', json_encode($this->input->post('manajemen_muntah'))),

				'faktor_bersihan_jalan_nafas' => str_replace('"', '', json_encode($this->input->post('faktor_bersihan_jalan_nafas'))),
				'gejala_bersihan_jalan_nafas' => str_replace('"', '', json_encode($this->input->post('gejala_bersihan_jalan_nafas'))),
				'kriteria_hasil_bersihan_jalan_nafas' => str_replace('"', '', json_encode($this->input->post('kriteria_hasil_bersihan_jalan_nafas'))),
				'kriteria_hasil_tingkat_infeksi' => str_replace('"', '', json_encode($this->input->post('kriteria_hasil_tingkat_infeksi'))),
				'manajemen_jalan_nafas' => str_replace('"', '', json_encode($this->input->post('manajemen_jalan_nafas'))),
				'manajemen_isolasi' => str_replace('"', '', json_encode($this->input->post('manajemen_isolasi'))),
				'gejala' => str_replace('"', '', json_encode($this->input->post('gejala'))),
				'hasil_ansietas' => str_replace('"', '', json_encode($this->input->post('hasil_ansietas'))),
				'reduction_ansietas' => str_replace('"', '', json_encode($this->input->post('reduction_ansietas'))),
				'dukungan_ibadah' => str_replace('"', '', json_encode($this->input->post('dukungan_ibadah'))),
				'gejala_nyeri_akut' => str_replace('"', '', json_encode($this->input->post('gejala_nyeri_akut'))),
				'hasil_nyeri' => str_replace('"', '', json_encode($this->input->post('hasil_nyeri'))),
				'gejala_diare' => str_replace('"', '', json_encode($this->input->post('gejala_diare'))),
				'hasil_diare' => str_replace('"', '', json_encode($this->input->post('hasil_diare'))),
				'manajemen_diare' => str_replace('"', '', json_encode($this->input->post('manajemen_diare'))),
				'gejala_mobilitas' => str_replace('"', '', json_encode($this->input->post('gejala_mobilitas'))),
				'bukti_mobilitas' => str_replace('"', '', json_encode($this->input->post('bukti_mobilitas'))),
				'hasil_mobilitas' => str_replace('"', '', json_encode($this->input->post('hasil_mobilitas'))),
				'dukungan_mobilisasi' => str_replace('"', '', json_encode($this->input->post('dukungan_mobilisasi'))),
				'gangguan_penyapihan' => str_replace('"', '', json_encode($this->input->post('gangguan_penyapihan'))),
				'buktikan_penyapihan' => str_replace('"', '', json_encode($this->input->post('buktikan_penyapihan'))),
				'hasil_penyapihan' => str_replace('"', '', json_encode($this->input->post('hasil_penyapihan'))),
				'bukti_gangguan_pertukaran_gas' => str_replace('"', '', json_encode($this->input->post('bukti_gangguan_pertukaran_gas'))),
				'hasil_pertukaran_gas' => str_replace('"', '', json_encode($this->input->post('hasil_pertukaran_gas'))),
				'gangguan_poldur' => str_replace('"', '', json_encode($this->input->post('gangguan_poldur'))),
				'bukti_gangguan_poldur' => str_replace('"', '', json_encode($this->input->post('bukti_gangguan_poldur'))),
				'hasil_gangguan_poldur' => str_replace('"', '', json_encode($this->input->post('hasil_gangguan_poldur'))),
				'dukungan_poldur' => str_replace('"', '', json_encode($this->input->post('dukungan_poldur'))),
				'resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('resiko_jatuh'))),
				'bukti_resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_jatuh'))),
				'minor_resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('minor_resiko_jatuh'))),
				'hasil_resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_jatuh'))),
				'manajemen_resiko_jatuh' => str_replace('"', '', json_encode($this->input->post('manajemen_resiko_jatuh'))),

				'defisit_perawatan_diri' => str_replace('"', '', json_encode($this->input->post('defisit_perawatan_diri'))),
				'bukti_defisit_perawatan_diri' => str_replace('"', '', json_encode($this->input->post('bukti_defisit_perawatan_diri'))),
				'hasil_defisit_perawatan_diri' => str_replace('"', '', json_encode($this->input->post('hasil_defisit_perawatan_diri'))),

				'bukti_hipovolemia' => str_replace('"', '', json_encode($this->input->post('bukti_hipovolemia'))),
				'hasil_hipovolemia' => str_replace('"', '', json_encode($this->input->post('hasil_hipovolemia'))),
				'intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('intoleransi_aktivitas'))),
				'bukti_intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('bukti_intoleransi_aktivitas'))),
				'minor_intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('minor_intoleransi_aktivitas'))),
				'hasil_intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('hasil_intoleransi_aktivitas'))),
				'manajemen_intoleransi_aktivitas' => str_replace('"', '', json_encode($this->input->post('manajemen_intoleransi_aktivitas'))),
				'curah_jantung' => str_replace('"', '', json_encode($this->input->post('curah_jantung'))),
				'bukti_curah_jantung' => str_replace('"', '', json_encode($this->input->post('bukti_curah_jantung'))),
				'hasil_curah_jantung' => str_replace('"', '', json_encode($this->input->post('hasil_curah_jantung'))),
				'perawatan_jantung' => str_replace('"', '', json_encode($this->input->post('perawatan_jantung'))),
				'bukti_penurunan_adaptif' => str_replace('"', '', json_encode($this->input->post('bukti_penurunan_adaptif'))),
				'hasil_penurunan_adaptif' => str_replace('"', '', json_encode($this->input->post('hasil_penurunan_adaptif'))),
				'manajemen_peningkatan_adaptif' => str_replace('"', '', json_encode($this->input->post('manajemen_peningkatan_adaptif'))),

				'hubungan_perfusi_perifier' => str_replace('"', '', json_encode($this->input->post('hubungan_perfusi_perifier'))),
				'bukti_perfusi_perifer' => str_replace('"', '', json_encode($this->input->post('bukti_perfusi_perifer'))),
				'hasil_perfusi_perifer' => str_replace('"', '', json_encode($this->input->post('hasil_perfusi_perifer'))),

				'hubungan_nafas_tidak_efektif' => str_replace('"', '', json_encode($this->input->post('hubungan_nafas_tidak_efektif'))),
				'bukti_nafas_tidak_efektif' => str_replace('"', '', json_encode($this->input->post('bukti_nafas_tidak_efektif'))),
				'hasil_nafas_tidak_efektif' => str_replace('"', '', json_encode($this->input->post('hasil_nafas_tidak_efektif'))),
				'manajamen_nafas_tidak_efektif' => str_replace('"', '', json_encode($this->input->post('manajamen_nafas_tidak_efektif'))),

				'bukti_resiko_defisit_nutrisi' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_defisit_nutrisi'))),
				'hasil_resiko_defisit_nutrisi' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_defisit_nutrisi'))),
				'manajamen_resiko_defisit_nutrisi' => str_replace('"', '', json_encode($this->input->post('manajamen_resiko_defisit_nutrisi'))),
	

				'bukti_resiko_hipovolemia' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_hipovolemia'))),
				'hasil_resiko_hipovolemia' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_hipovolemia'))),
				'manajamen_resiko_hipovolemia' => str_replace('"', '', json_encode($this->input->post('manajamen_resiko_hipovolemia'))),

				'bukti_resiko_infeksi' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_infeksi'))),
				'hasil_resiko_infeksi' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_infeksi'))),
				'pencegahan_resiko_infeksi' => str_replace('"', '', json_encode($this->input->post('pencegahan_resiko_infeksi'))),

				'bukti_resiko_ketidakstabilan_gula_darah' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_ketidakstabilan_gula_darah'))),
				'hasil_resiko_ketidakstabilan_gula_darah' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_ketidakstabilan_gula_darah'))),
				'manajemen_hiperglikimia' => str_replace('"', '', json_encode($this->input->post('manajemen_hiperglikimia'))),
				'manajemen_hipoglikimia' => str_replace('"', '', json_encode($this->input->post('manajemen_hipoglikimia'))),

				'bukti_resiko_perdarahan' => str_replace('"', '', json_encode($this->input->post('bukti_resiko_perdarahan'))),
				'hasil_resiko_perdarahan' => str_replace('"', '', json_encode($this->input->post('hasil_resiko_perdarahan'))),
				'pencegahan_resiko_perdarahan' => str_replace('"', '', json_encode($this->input->post('pencegahan_resiko_perdarahan'))),

				'nama_masalah' => $this->input->post('inIdMasalahKep'),
				'tanggal_input' => $tgl,
				'staff' => $staff,
				'laiinnya_resiko_perdarahan' => $this->input->post('laiinnya_resiko_perdarahan', true),
				'laiinnya_manajemen_hipertermia' => $this->input->post('laiinnya_manajemen_hipertermia', true),
				'laiinnya_manajemen_muntah' => $this->input->post('laiinnya_manajemen_muntah', true),
				'laiinnya_perawatan_jantung' => $this->input->post('laiinnya_perawatan_jantung', true),
				'laiinnya_hipoglikimia' => $this->input->post('laiinnya_hipoglikimia', true),
				'laiinnya_perfusi_perifer' => $this->input->post('laiinnya_perfusi_perifer', true),
				'laiinnya_peningkatan_adaptif' => $this->input->post('laiinnya_peningkatan_adaptif', true),
				'laiinnya_resiko_infeksi' => $this->input->post('laiinnya_resiko_infeksi', true),
				'laiinnya_resiko_hipovolemia' => $this->input->post('laiinnya_resiko_hipovolemia', true),
				'laiinnya_dukungan_ibadah' => $this->input->post('laiinnya_dukungan_ibadah', true),
				'laiinnya_isolasi' => $this->input->post('laiinnya_isolasi', true),
				'laiinnya_nyeri' => $this->input->post('laiinnya_nyeri', true),
				'laiinnya_diare' => $this->input->post('laiinnya_diare', true),
				'laiinnya_mobilisasi' => $this->input->post('laiinnya_mobilisasi', true),
				'laiinnya_defisit_nutrisi' => $this->input->post('laiinnya_defisit_nutrisi', true),
				'laiinnya_poldur' => $this->input->post('laiinnya_poldur', true),
				'laiinnya_pertukaran_gas' => $this->input->post('laiinnya_pertukaran_gas', true),
				'laiinnya_jatuh' => $this->input->post('laiinnya_jatuh', true),
				'laiinnya_hipovolemia' => $this->input->post('laiinnya_hipovolemia', true),
				'laiinnya_aktivitas' => $this->input->post('laiinnya_aktivitas', true),
				'laiinnya_perawatan_diri' => $this->input->post('laiinnya_perawatan_diri', true),
				'laiinnya_nafas_tidak_efektif' => $this->input->post('laiinnya_nafas_tidak_efektif', true),
				'laiinnya_penyapihan' => $this->input->post('laiinnya_penyapihan', true),
			);

			$this->M_Erm_ranap->update_rencana($id, $data);
			$out['status'] = "success";
		} else {
			$out = array(
				'error' => true,
				'tanggal' => form_error('tanggal'),
				'faktor_bersihan_jalan_nafas' => form_error('faktor_bersihan_jalan_nafas'),
				'gejala_bersihan_jalan_nafas' => form_error('gejala_bersihan_jalan_nafas'),
				'kriteria_hasil_bersihan_jalan_nafas' => form_error('kriteria_hasil_bersihan_jalan_nafas'),
				'kriteria_hasil_tingkat_infeksi' => form_error('kriteria_hasil_tingkat_infeksi'),
				'manajemen_jalan_nafas' => form_error('manajemen_jalan_nafas'),
				'gejala' => form_error('gejala'),
				'hasil_ansietas' => form_error('hasil_ansietas'),
				'reduction_ansietas' => form_error('reduction_ansietas'),
				'dukungan_ibadah' => form_error('dukungan_ibadah'),
				'gejala_nyeri_akut' => form_error('gejala_nyeri_akut'),
				'hasil_nyeri' => form_error('hasil_nyeri'),
				'gejala_diare' => form_error('gejala_diare'),
				'hasil_diare' => form_error('hasil_diare'),
				'manajemen_diare' => form_error('manajemen_diare'),
				'gejala_mobilitas' => form_error('gejala_mobilitas'),
				'bukti_mobilitas' => form_error('bukti_mobilitas'),
				'hasil_mobilitas' => form_error('hasil_mobilitas'),
				'dukungan_mobilisasi' => form_error('dukungan_mobilisasi'),
				'gangguan_penyapihan' => form_error('gangguan_penyapihan'),
				'buktikan_penyapihan' => form_error('buktikan_penyapihan'),
				'hasil_penyapihan' => form_error('hasil_penyapihan'),
				'bukti_gangguan_pertukaran_gas' => form_error('bukti_gangguan_pertukaran_gas'),
				'hasil_pertukaran_gas' => form_error('hasil_pertukaran_gas'),
				'gangguan_poldur' => form_error('gangguan_poldur'),
				'bukti_gangguan_poldur' => form_error('bukti_gangguan_poldur'),
				'hasil_gangguan_poldur' => form_error('hasil_gangguan_poldur'),
				'dukungan_poldur' => form_error('dukungan_poldur'),
				'resiko_jatuh' => form_error('resiko_jatuh'),
				'bukti_resiko_jatuh' => form_error('bukti_resiko_jatuh'),
				'minor_resiko_jatuh' => form_error('minor_resiko_jatuh'),
				'hasil_resiko_jatuh' => form_error('hasil_resiko_jatuh'),
				'manajemen_resiko_jatuh' => form_error('manajemen_resiko_jatuh'),
			);
		}
		echo json_encode($out);
	}


	// public function insert_rencana()
	// {
	// 	$data = $this->session->userdata('data_auth');
	// 	$tgl = date("Y-m-d h:i:s");
	// 	$staff = $data->id_staff;

	// 	$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
	// 	// $this->form_validation->set_rules('diagnosa', 'Diagnosa', 'required');
	// 	// $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
	// 	// $this->form_validation->set_rules('intervensi', 'Intervensi', 'required');
	// 	if ($this->form_validation->run()) {
	// 		$data = array(
	// 			'id_pelayanan' => $this->input->post('id_pelayanan'),
	// 			'id_history' => $this->input->post('id_history'),
	// 			'no_rm' => $this->input->post('no_rm'),
	// 			'tanggal' => $this->input->post('tanggal'),
	// 			// 'diagnosa' => $this->input->post('diagnosa'),
	// 			// 'tujuan' => $this->input->post('tujuan'),
	// 			// 'intervensi' => $this->input->post('intervensi'),
	// 			'tanggal_input' => $tgl,
	// 			'staff' => $staff,
	// 		);
	// 		// $data2 = array(
	// 		// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
	// 		// 	'id_history' => $this->input->post('id_history'),
	// 		// 	'no_rm' => $this->input->post('no_rm'),
	// 		// );
	// 		$this->M_Erm_ranap->insert($data, 'rencana_keperawatan');
	// 		// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
	// 		$out['status'] = "success";
	// 	} else {
	// 		$out = array(
	// 			'error'   => true,
	// 			'tanggal' => form_error('tanggal'),
	// 			// 'diagnosa' => form_error('diagnosa'),
	// 			// 'tujuan' => form_error('tujuan'),
	// 			// 'intervensi' => form_error('intervensi'),
	// 		);
	// 	}
	// 	echo json_encode($out);
	// }






	function hapus_rencana()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_rencana' => $id,
		);
		$this->M_Erm_ranap->delete($where, 'rencana_keperawatan');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function getPerRencana()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('rencana_keperawatan', ['id_rencana' => $id])->row_array();
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
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
