<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_IGD');
		$this->load->model('M_Apotik');
		$this->load->model('M_Erm_ranap');
		$this->load->model('M_Erm');
		$this->load->model('M_Assembling');
		$this->load->model('M_Rawatinap');
		$this->load->model('M_Apelkes');
		$this->load->model('OneDayCare_model');
		$this->load->model('M_Pencarian_Pasien');
	}

	public function index()
	{
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'page_content/Erm';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function form($id_pel, $id_his)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_histori = base64_decode(urldecode($id_his));
		$data = $this->session->userdata('data_auth');
		$perequest = $data->tipe;
		// $id_pelayanan = $id_pel;
		// $id_histori = $id_his;
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_histori);

		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_histori'] = $id_histori;

		$dbigd = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'history_pelayanan_ugd');
		$page_data['id_histori_igd'] = empty($dbigd) ? '' : $dbigd['id_history'];
		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['nama_dokter'] = $selectPasien->nama_dokter;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['simpan'] = 0;
		// $page_data['no_rm'] = $selectPasien->no_rm;
		// $page_data['pasien'] = $this->M_Erm->selectDataPasien($db[0]->no_rm);
		$page_data['data_dokter'] = $this->M_IGD->selectNamaDPJP();
		$page_data['data_kamar'] = $this->M_Rawatinap->selectKamar();
		// $page_data['tindakan_fisio'] = $this->M_Rawatinap->selectNamaTindakan('list_tindakan_poli_fisio');
		$page_data['dokter'] = $this->M_Rawatinap->selectNamaDPJP();
		$page_data['action'] = site_url("Pasien/edit_rawat_jalan");

		if ($selectPasien->kelas != 'KELAS III' && $selectPasien->cara_bayar == 'BPJS') {
			$kelas_penunjang = 'KELAS III';
		} else {
			$kelas_penunjang = $selectPasien->kelas;
		}
		$page_data['kelas_penunjang'] = $kelas_penunjang;

		$kelas = $selectPasien->kelas;
		$page_data['kelas'] = $kelas;
		// $page_data['tindakan_radiologi'] = $this->M_Erm_ranap->selectNamaRadiologi($kelas_penunjang);
		// $page_data['tindakan_labor'] = $this->M_Erm_ranap->selectNamaLabor($kelas_penunjang);
		$carabayar = $selectPasien->id_cara_bayar;
		if ($carabayar == '333' || $carabayar == 'a74' || $carabayar == 'b1' || $carabayar == 'b4') {
			$page_data['tindakan_radiologi'] = $this->M_Erm_ranap->selectNamaRadiologi_lama($kelas);
			$page_data['tindakan_labor'] = $this->M_Erm_ranap->selectNamaLabor_lama($kelas);
			$page_data['tindakan_fisio'] = $this->M_Rawatinap->getTipeKamarFisio_lama($kelas);
		} else {
			$page_data['tindakan_radiologi'] = $this->M_Erm_ranap->selectNamaRadiologi($kelas);
			$page_data['tindakan_labor'] = $this->M_Erm_ranap->selectNamaLabor($kelas);
			$page_data['tindakan_fisio'] = $this->M_Rawatinap->getTipeKamarFisio($kelas);
		}

		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['obat'] = $this->M_Apotik->getNamaObat();
		$page_data['signa'] = $this->M_Apotik->getSigna();
		$page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
		$page_data['data_dokter'] = $this->M_Apelkes->selectDokter();
		$page_data['data_tipe_kamar'] = $this->M_Apelkes->selectTipeKamar();
		$page_data['golongan'] = $this->db->query("SELECT DISTINCT(golongan_farmakologi) golongan_farmakologi from list_logistik")->result_array();
		$page_data['paket_obat'] = $this->db->get_where('list_paket_mcu', ['jenis' => 'Cendrawasih'])->result_array();


		if ($perequest == "isolasi") {
			$stok = "stok_isolasi";
		} else if ($perequest == "icu") {
			$stok = "stok_icu";
		} else if ($perequest == "vip") {
			$stok = "stok_vip";
		} else if ($perequest == "ipcn") {
			$stok = "stok_ipcn";
		} else if ($perequest == "kebidanan") {
			$stok = "stok_kebidanan";
		} else if ($perequest == "mcu") {
			$stok = "stok_mcu";
		} else if ($perequest == "nicu") {
			$stok = "stok_nicu";
		} else if ($perequest == "rawatinap") {
			$stok = "stok_ranap";
		} else if (
			$perequest == "anastesi" || $perequest == 'poliinternis' || $perequest == 'poliobgyne' || $perequest == 'politht' || $perequest === 'polimata' || $perequest == 'polikulit' || $perequest == 'poliumum' || $perequest == 'polianak' || $perequest == 'poligigi' || $perequest == 'polijantung' || $perequest == 'polibedah' || $perequest == 'rehab' || $perequest == 'polihemodialisa' || $perequest == 'poliakupuntur' || $perequest == 'polibedahmulut' || $perequest == 'polikesjiwa' || $perequest == 'poliorthopedi' || $perequest == 'poliparu' || $perequest == 'polisaraf'
			|| $perequest == 'poliurologi' || $perequest == 'polipenyakitmulut' || $perequest == 'poliginjal' || $perequest == 'kasir'|| $perequest == 'homecare'
		) {
			$stok = "stok_ranap";
		} else if ($perequest == "igdponek") {
			$stok = "stok_igd_ponek";
		} else if ($perequest == "gizi") {
			$stok = "stok_ranap";
		} else if ($perequest == "ok") {
			$stok = "stok_ranap";
		} else if ($perequest == "poligizi") {
			$stok = "stok_ranap";
		} else if ($perequest == "polistifin") {
			$stok = "stok_ranap";
		} else if ($perequest == "kemoterapi") {
			$stok = "stok_kemo";
		}
		$page_data['obat_ruang'] = $this->M_Rawatinap->getNamaObatRuang($stok);
		// load page view
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_erm';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function form_riwayat($id_pel, $id_his)
	{
		$data = $this->session->userdata('data_auth');
		$perequest = $data->tipe;
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_histori = base64_decode(urldecode($id_his));
		$selectPasien = $this->M_Erm->selectDataPasienIGDbyid($id_pelayanan, $id_histori);

		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_histori'] = $id_histori;
		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['nama_dokter'] = $selectPasien->nama_dokter;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['simpan'] = 1;


		$page_data['data_dokter'] = $this->M_IGD->selectNamaDPJP();
		$page_data['data_kamar'] = $this->M_Rawatinap->selectKamar();
		$page_data['tindakan_fisio'] = $this->M_Rawatinap->selectNamaTindakan('list_tindakan_poli_fisio');
		$page_data['action'] = site_url("Pasien/edit_rawat_jalan");



		if ($selectPasien->kelas != 'KELAS III' && $selectPasien->cara_bayar == 'BPJS') {
			$kelas_penunjang = 'KELAS III';
		} else {
			$kelas_penunjang = $selectPasien->kelas;
		}
		$page_data['kelas_penunjang'] = $kelas_penunjang;

		$kelas = $selectPasien->kelas;
		$page_data['kelas'] = $kelas;
		$page_data['tindakan_radiologi'] = $this->M_Erm_ranap->selectNamaRadiologi($kelas);
		$page_data['tindakan_labor'] = $this->M_Erm_ranap->selectNamaLabor($kelas);
		$page_data['obat'] = $this->M_Apotik->getNamaObat();
		$page_data['signa'] = $this->M_Apotik->getSigna();
		$page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
		$page_data['data_dokter'] = $this->M_Apelkes->selectDokter();
		$page_data['data_tipe_kamar'] = $this->M_Apelkes->selectTipeKamar();
		$page_data['golongan'] = $this->db->query("SELECT DISTINCT(golongan_farmakologi) golongan_farmakologi from list_logistik")->result_array();

		if ($perequest == "isolasi") {
			$stok = "stok_isolasi";
		} else if ($perequest == "icu") {
			$stok = "stok_icu";
		} else if ($perequest == "vip") {
			$stok = "stok_vip";
		} else if ($perequest == "ipcn") {
			$stok = "stok_ipcn";
		} else if ($perequest == "kebidanan") {
			$stok = "stok_kebidanan";
		} else if ($perequest == "mcu") {
			$stok = "stok_mcu";
		} else if ($perequest == "nicu") {
			$stok = "stok_nicu";
		} else if ($perequest == "rawatinap" || $perequest == "anastesi" || $perequest == 'poliinternis' || $perequest == 'poliobgyne' || $perequest == 'politht' || $perequest === 'polimata' || $perequest == 'polikulit' || $perequest == 'poliumum' || $perequest == 'polianak' || $perequest == 'poligigi' || $perequest == 'polijantung' || $perequest == 'polibedah' || $perequest == 'rehab' || $perequest == 'polihemodialisa' || $perequest == 'poliakupuntur' || $perequest == 'polibedahmulut' || $perequest == 'polikesjiwa' || $perequest == 'poliorthopedi' || $perequest == 'poliparu' || $perequest == 'polisaraf' || $perequest == 'poliurologi' || $perequest == 'polipenyakitmulut' || $perequest == 'poliginjal') {
			$stok = "stok_ranap";
		} else if ($perequest == "igdponek") {
			$stok = "stok_ranap";
		} else if ($perequest == "gizi") {
			$stok = "stok_ranap";
		} else if ($perequest == "ok") {
			$stok = "stok_ranap";
		} else if ($perequest == "poligizi") {
			$stok = "stok_ranap";
		}
		$page_data['obat_ruang'] = $this->M_Rawatinap->getNamaObatRuang($stok);
		// load page view
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_erm_riwayat';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function formnicu($id_pelayanan, $id_histori)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_histori);

		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_histori'] = $id_histori;
		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['nama_dokter'] = $selectPasien->nama_dokter;
		$page_data['agama'] = $selectPasien->agama;
		// $page_data['simpan'] = 0;
		// $page_data['no_rm'] = $selectPasien->no_rm;
		// $page_data['pasien'] = $this->M_Erm->selectDataPasien($db[0]->no_rm);

		// $page_data['gen_con'] = 'erm_igd/Form_general_concern/input_gencon_igd/';
		// $page_data['ass_per_igd'] = 'Erm/input_asses_per_igd/';
		// $page_data['ass_dok_igd'] = 'Erm_ases_dok_igd/input_asses_dok_igd/';

		// load page view
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_erm_nicu';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function checkData()
	{
		$id_pelayanan = $this->input->post('id_pelayanan');
		$id_histori = $this->input->post('id_histori');

		$asesmen_awal_dewasa = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'asesmen_awal_dewasa');
		$asesmen_ulang_dewasa = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'asesmen_ulang_dewasa');
		$asesmen_awal_geriatri = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'asesmen_awal_geriatri');
		$asesmen_ulang_geriatri = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'asesmen_ulang_geriatri');
		$imd_eksklusif = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'imd_asi_eksklusif');
		$analisis_data = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'analisis_data');
		$rencana_keperawatan = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'rencana_keperawatan');
		$bayi_gabung = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'bayi_rawat_gabung');
		$catatan_perkembangan = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'catatan_perkembangan_terintegrasi');
		$persetujuan_kedokteran = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'form_ranap_persetujuan_tindakan_dokter');
		$lembar_evaluasi = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'lembar_evaluasi_dpjp');
		$infus_sehari = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'daftar_infus_sehari');
		$pengobatan_sakit = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'daftar_pengobatan');
		$asses_per_ranap = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'form_ass_per_ranap');
		$anamnesis_fisik = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'form_ass_dokter_ranap');
		$survei = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'form_survei_infeksi');
		$surveilans = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'form_survei_inveksi_hais');
		$laporan_operasi = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'laporan_operasi');
		$resume_pasien_pulang = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'resume_pasien_pulang');
		$ass_bayi_baru_lahir = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'ass_bayi_baru_lahir');
		$resume_pulang = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'resume_pulang');
		$status_respirasi = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'status_respirasi');
		$resume_bayi_tabung = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'resume_bayi_tabung');
		$discharge_planning = $this->M_Erm_ranap->checkData(['id_pelayanan' => $id_pelayanan], 'discharger');

		$one_day_care = $this->OneDayCare_model->checkData(['no_rm' => $id_histori], 'onedaycare');

		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $observasi = $this->M_Erm->checkData($id_pelayanan, 'form_observasi');
		// $sebab_kematian = $this->M_Erm->checkData($id_pelayanan, 'form_sebab_kematian');
		// $lembar_rujukan = $this->M_Erm->checkData($id_pelayanan, 'form_lembar_rujukan');
		// $asses_dokter_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_dokter_igd');
		// // $peng_khusus = $this->M_Erm->checkData($id_pelayanan, 'form_peng_khusus');
		// $penundaan = $this->M_Erm->checkData($id_pelayanan, 'form_penundaan_pelayanan_obat');
		// $intra = $this->M_Erm->checkData($id_pelayanan, 'form_transfer_intra_rs');
		// $antar = $this->M_Erm->checkData($id_pelayanan, 'form_transfer_antar_rs');

		$db['asesmen_awal_dewasa'] = empty($asesmen_awal_dewasa) ? 'not-found' : 'found';
		$db['asesmen_ulang_dewasa'] = empty($asesmen_ulang_dewasa) ? 'not-found' : 'found';
		$db['asesmen_awal_geriatri'] = empty($asesmen_awal_geriatri) ? 'not-found' : 'found';
		$db['asesmen_ulang_geriatri'] = empty($asesmen_ulang_geriatri) ? 'not-found' : 'found';
		$db['imd_eksklusif'] = empty($imd_eksklusif) ? 'not-found' : 'found';
		$db['analisis_data'] = empty($analisis_data) ? 'not-found' : 'found';
		$db['rencana_keperawatan'] = empty($rencana_keperawatan) ? 'not-found' : 'found';
		$db['bayi_gabung'] = empty($bayi_gabung) ? 'not-found' : 'found';
		$db['catatan_perkembangan'] = empty($catatan_perkembangan) ? 'not-found' : 'found';
		$db['persetujuan_kedokteran'] = empty($persetujuan_kedokteran) ? 'not-found' : 'found';
		$db['lembar_evaluasi'] = empty($lembar_evaluasi) ? 'not-found' : 'found';
		$db['infus_sehari'] = empty($infus_sehari) ? 'not-found' : 'found';
		$db['pengobatan_sakit'] = empty($pengobatan_sakit) ? 'not-found' : 'found';
		$db['asses_per_ranap'] = empty($asses_per_ranap) ? 'not-found' : 'found';
		$db['anamnesis_fisik'] = empty($anamnesis_fisik) ? 'not-found' : 'found';
		$db['survei'] = empty($survei) ? 'not-found' : 'found';
		$db['surveilans'] = empty($surveilans) ? 'not-found' : 'found';
		$db['laporan_operasi'] = empty($laporan_operasi) ? 'not-found' : 'found';
		$db['resume_pasien_pulang'] = empty($resume_pasien_pulang) ? 'not-found' : 'found';
		$db['ass_bayi_baru_lahir'] = empty($ass_bayi_baru_lahir) ? 'not-found' : 'found';
		$db['resume_pulang'] = empty($resume_pulang) ? 'not-found' : 'found';
		$db['status_respirasi'] = empty($status_respirasi) ? 'not-found' : 'found';
		$db['resume_bayi_tabung'] = empty($resume_bayi_tabung) ? 'not-found' : 'found';
		$db['discharge_planning'] = empty($discharge_planning) ? 'not-found' : 'found';

		$db['one_day_care'] = empty($one_day_care) ? 'not-found' : 'found';
		

		// $db['asses_per_igd'] = empty($asses_per_igd) ? 'not-found' : 'found';
		// $db['asses_dokter_igd'] = empty($asses_dokter_igd) ? 'not-found' : 'found';
		// $db['observasi'] = empty($observasi) ? 'not-found' : 'found';
		// $db['sebab_kematian'] = empty($sebab_kematian) ? 'not-found' : 'found';
		// $db['lembar_rujukan'] = empty($lembar_rujukan) ? 'not-found' : 'found';
		// $db['penundaan'] = empty($penundaan) ? 'not-found' : 'found';
		// $db['intra'] = empty($intra) ? 'not-found' : 'found';
		// $db['antar'] = empty($antar) ? 'not-found' : 'found';
		echo json_encode($db);
		exit;
	}
	public function checkKasir()
	{
		$id_pelayanan = base64_decode(urldecode($this->input->post('inPel')));
		$id_history = base64_decode(urldecode($this->input->post('inHis')));
		$db = $this->db->get_where('req_kasir', array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history))->result_array();
		if (count($db) > 0) {
			if ($db[0]['status'] == 0) {
				$page_data['status'] = 'found'; //tampil
			} else {
				$page_data['status'] = 'not_found'; //tidak tampil
			}
		} else {
			$page_data['status'] = 'found'; //tampil
		}
		echo json_encode($page_data);
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
	public function getErm()
	{
		$id = $this->input->post('id');
		$db = $this->M_Erm->getErm($id);
		if ($db == null) {
			echo '{"data":"",
				"status":"not_found"}';
			exit;
		} else {
			$page_data['erm'] = $db;
			$page_data['status'] = 'found';
			echo json_encode($page_data);
			exit;
		}
	}
	public function input_resume_medis_raj($id_pelayanan, $id_history)
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

		$asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		$page_data['per'] = empty($asses_per_igd) ? null : $asses_per_igd;
		$asses_dokter_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_dokter_igd');
		$page_data['dok'] = empty($asses_dokter_igd) ? null : $asses_dokter_igd;

		$diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_pelayanan='$id_pelayanan'")->row_array();

		$page_data['diagnosa_utama'] = empty($asses_dokter_igd) ? null : $diagnosa1;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_resume_medis_raj';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function riwayat_resume_medis_raj($id_pelayanan, $id_history)
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

		$asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		$page_data['per'] = empty($asses_per_igd) ? null : $asses_per_igd;
		$asses_dokter_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_dokter_igd');
		$page_data['dok'] = empty($asses_dokter_igd) ? null : $asses_dokter_igd;

		$diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_pelayanan='$id_pelayanan'")->row_array();

		$page_data['diagnosa_utama'] = empty($asses_dokter_igd) ? null : $diagnosa1;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_resume_medis_raj';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}


	// // INSERT
	public function insert_gencon()
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

		$this->form_validation->set_rules('nama', 'Yang Bersangkutan', 'required');
		$this->form_validation->set_rules('alamat', 'Hasil Periksa', 'required');
		$this->form_validation->set_rules('HP', 'Terapi ', 'required');
		$this->form_validation->set_rules('samaran', 'Terapi I', 'required');
		$this->form_validation->set_rules('anggota', 'Saran', 'required');
		$this->form_validation->set_rules('hubungan', 'Yang Bersangkutan', 'required');
		$this->form_validation->set_rules('jk', 'Diagnosis', 'required');

		if ($this->form_validation->run()) {
			$db   =   array(
				'no_rm' => $this->input->post('no_rm'),
				'hubungan' => $this->input->post('hubungan'),
				'nama' => $this->input->post('nama'),
				'jk' => $this->input->post('jk'),
				'alamat' => $this->input->post('alamat'),
				'hp' => $this->input->post('HP'),
				'samaran' => $this->input->post('samaran'),
				'anggota' => $this->input->post('anggota'),
				'file_path' => $file,
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			// print $success ? $file : 'Unable to save the file.';
			$this->M_Erm->insert($db, 'general_concent');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'hubungan' => form_error('hubungan'),
				'nama' => form_error('nama'),
				'jk' => form_error('jk'),
				'alamat' => form_error('alamat'),
				'hp' => form_error('HP'),
				'samaran' => form_error('samaran'),
				'anggota' => form_error('anggota'),
			);
		}
		echo json_encode($out);
	}
	public function simpan_erm()
	{
		$db   =   array(
			'total_bayar' => 1,
		);
		$where = array(
			'id_pelayanan' => $this->input->post('id_pelayanan')
		);
		$this->M_Erm->update($db, $where, 'pelayanan');

		$id_pelayanan = $this->input->post('id_pelayanan');
		$id_history = $this->input->post('id_history');
		$count = array(
			'status' => 1,
		);
		$this->M_Poli->insert_req_kasir($id_pelayanan, $id_history, $count);
		$out['status'] = "success";
		echo json_encode($out);
	}

	// // Tampil Data

	function tambah_data_diagnosa()
	{
		$no_diagnosa = uniqid();
		$tgl = date("Y-m-d H:i:s");
		$id_staff = '0';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$id_diagnosa = $this->input->post('id_diagnosa');
		$nama_diagnosa = $this->input->post('nama_diagnosa');

		$page_data = array(
			'no_diagnosa' => $no_diagnosa,
			'id_pelayanan' => $id_pelayanan,
			'kode' => $id_diagnosa,
			'nama_diagnosa' => $nama_diagnosa,
			'tanggal' => $tgl,
			'id_staff' => $id_staff,
		);
		$diagnosa = $this->M_Erm->checkData($id_pelayanan, 'diagnosa_utama');
		if (!empty($diagnosa)) {
			$this->M_Erm->insert($page_data, 'erm_diagnosa_dokter');
		} else {
			$this->M_Erm->insert($page_data, 'diagnosa_utama');
		}

		$out['status'] = "success";
		echo json_encode($out);
	}
	public function tampil_listdata_diagnosa()
	{
		$page_data = $this->M_Assembling->selectDataAllDiagnosa();

		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$id_pelayanan = $this->input->post('id_pelayanan');
			// $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
			$tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_data_diagnosa(\"" . $id_pelayanan . "\",\"" . $page_data[$i]->id_diagnosa . "\",\"" . $page_data[$i]->nama_diagnosa . "\")' '><i class='icon-plus'></i></button>";


			$id_diagnosa = $page_data[$i]->id_diagnosa;
			$nama_diagnosa = $page_data[$i]->nama_diagnosa;
			$tombol = $tombol;



			$out[$i] = array($id_diagnosa, $nama_diagnosa, $tombol);
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
	public function tampil_list_diagnosa()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm->selectDataDiagnosaByIdPel($id_pelayanan);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {

			// $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
			$tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa1(\"" . $page_data[$i]->no_diagnosa . "\")' '><i class='fa fa-trash '></i></button>";


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
		$page_data = $this->db->query("SELECT * from diagnosa_utama where id_pelayanan='$id_pelayanan'")->result();

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {

			// $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
			$tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\""  . $page_data[$i]->no_diagnosa . "\")' '><i class='fa fa-trash '></i></button>";


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
	public function tampil_list_terapi()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm->selectTerapiByIdPel($id_pelayanan);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {

			$nama = $page_data[$i]->nama;
			$frek = $page_data[$i]->frek;
			$signa = $page_data[$i]->tindakan;
			$cara = $page_data[$i]->cara_pemakaian;



			$out[$i] = array($nama, $signa, $frek, $cara);
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
	public function tampil_list_terapi1()
	{
		// $id_akun = 'dgok8itaesm';
		$id_history = $this->input->post('id_history');
		$page_data = $this->M_Erm->selectTerapiByIdPel($id_history);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {

			$nama = $page_data[$i]->nama;
			$frek = $page_data[$i]->frek;
			$signa = $page_data[$i]->tindakan;
			$cara = $page_data[$i]->cara_pemakaian;



			$out[$i] = array($nama, $signa, $cara);
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

	public function print_persetujuan($id)
	{
		$data['data'] = $this->M_Erm_ranap->cetakPersetujuan($id);
		$this->load->view('erm_ranap_print/per_tin_kedokteran', $data);
	}
	public function print_imd_asi($id)
	{
		$data['data'] = $this->M_Erm_ranap->cetakImdAsi($id);
		$this->load->view('erm_ranap_print/imd_asi', $data);
	}
	public function print_bayi_gabung($id)
	{
		$data['data'] = $this->M_Erm_ranap->cetakBayiGabung($id);
		$this->load->view('erm_ranap_print/bayi_gabung', $data);
	}
	public function print_analisis($id)
	{
		$data['data'] = $this->M_Erm_ranap->cetakAnalisis($id);
		$this->load->view('erm_ranap_print/analisa_data', $data);
	}
	public function print_evaluasi($id)
	{
		$data['data'] = $this->M_Erm_ranap->cetakEvaluasi($id);
		$this->load->view('erm_ranap_print/lembar_evaluasi', $data);
	}
	public function print_awal_dewasa($id)
	{
		$data['data'] = $this->M_Erm_ranap->cetakAwalDewasa($id);
		$this->load->view('erm_ranap_print/asesmen_awal_dewasa', $data);
	}
	public function print_ulang_dewasa($id)
	{
		$data['data'] = $this->M_Erm_ranap->cetakUlangDewasa($id);
		$this->load->view('erm_ranap_print/asesmen_ulang_dewasa', $data);
	}
	public function print_awal_geriatri($id)
	{
		$data['data'] = $this->M_Erm_ranap->cetakAwalGeriatri($id);
		$this->load->view('erm_ranap_print/asesmen_awal_geriatri', $data);
	}
	public function print_ulang_geriatri($id)
	{
		$data['data'] = $this->M_Erm_ranap->cetakUlangGeriatri($id);
		$this->load->view('erm_ranap_print/asesmen_ulang_geriatri', $data);
	}
	public function print_ass_per_ranap($id)
	{
		$data['data'] = $this->M_Erm_ranap->cetakAssPerRanap($id);
		$this->load->view('erm_ranap_print/ases_per_ranap', $data);
	}
	public function print_ass_dok_ranap($id)
	{
		$data['data'] = $this->M_Erm_ranap->cetakAssDokRanap($id);
		// $data['data2'] = $this->M_Erm_ranap->getDataPerawat($id2);
		$this->load->view('erm_ranap_print/ases_dok_ranap', $data);
	}

	public function cek_skrining_tbc() {
		$id_pelayanan = $this->input->post('id_pelayanan');
		$result = $this->M_Erm_ranap->cek_skrining($id_pelayanan);
		if ($result) {
			echo json_encode([
				'status' => 'success',
				'message' => 'Data ditemukan.'
			]);
		} else {
			echo json_encode([
				'status' => 'error',
				'message' => 'Data tidak ditemukan.'
			]);
		}
	}

	//erm
    public function erm_ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_erm_ranap';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_erm_ranap()
    {
        $data = $this->session->userdata('data_auth');

        if ($this->input->post('mulai')!='' && $this->input->post('akhir')!=''  && $this->input->post('tipe')!=''  ) {
            $page_data = $this->M_Erm_ranap->selectERM($this->input->post('mulai'), $this->input->post('akhir'), $this->input->post('tipe'));
        } else {
			$tgl = date('Y-m-d');
            $page_data = $this->M_Erm_ranap->selectERM($tgl,$tgl,'ranap');
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('erm_ranap/form/' . urlencode(base64_encode($page_data[$i]->id_pelayanan)) . '/' . urlencode(base64_encode($page_data[$i]->id_history))) . "><i class='icon-note'></i></a>";
           
            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $no = $i + 1;
            $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = indo_date($page_data[$i]->tgl_masuk) . ' ' .date('H:m:s',strtotime($page_data[$i]->tgl_masuk));
            $tgl_pulang = indo_date($page_data[$i]->keluar_kamar) . ' ' .date('H:m:s',strtotime($page_data[$i]->keluar_kamar));
           
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $ruangan = $page_data[$i]->poli;

            $out[$i] = array($no, $erm, $tgl_masuk, $tgl_pulang, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk,$ruangan, $cara_bayar, $diagnosa, $dokter);
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
