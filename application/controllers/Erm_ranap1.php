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
		$this->load->model('M_Assembling');
		$this->load->model('M_Rawatinap');
		$this->load->model('M_Apelkes');
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
		// $id_pelayanan = $id_pel;
		// $id_histori = $id_his;
		$selectPasien = $this->M_Erm_ranap->selectDataPasienIGDby_id($id_pelayanan, $id_histori);

		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_histori'] = $id_histori;
		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['nama_dokter'] = $selectPasien->nama_dokter;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['simpan'] = 0;
		// $page_data['no_rm'] = $selectPasien->no_rm;
		// $page_data['pasien'] = $this->M_Erm->selectDataPasien($db[0]->no_rm);
		$page_data['data_dokter'] = $this->M_IGD->selectNamaDPJP();
		$page_data['data_kamar'] = $this->M_Rawatinap->selectKamar();
        $page_data['action'] = site_url("Pasien/edit_rawat_jalan");
        $page_data['obat'] = $this->M_Rawatinap->getNamaObat();

		$kelas = $selectPasien->kelas;
		$page_data['kelas'] =$kelas;
        $page_data['tindakan_radiologi'] = $this->M_Erm_ranap->selectNamaRadiologi($kelas);
        $page_data['tindakan_labor'] = $this->M_Erm_ranap->selectNamaLabor($kelas);
        $page_data['obat'] = $this->M_Apotik->getNamaObat();
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
		$page_data['data_dokter'] = $this->M_Apelkes->selectDokter();
        $page_data['data_tipe_kamar'] = $this->M_Apelkes->selectTipeKamar();

		$page_data['gen_con'] = 'erm_igd/Form_general_concern/input_gencon_igd/';
		$page_data['ass_per_igd'] = 'Erm/input_asses_per_igd/';
		$page_data['ass_dok_igd'] = 'Erm_ases_dok_igd/input_asses_dok_igd/';

		// load page view
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_erm';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function form_riwayat($id_pel, $id_his)
	{
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

		$page_data['gen_con'] = 'erm_igd/Form_general_concern/input_gencon_igd/';
		$page_data['ass_per_igd'] = 'Erm/input_asses_per_igd/';
		$page_data['ass_dok_igd'] = 'Erm_ases_dok_igd/input_asses_dok_igd/';

		// load page view
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/IGD/view_erm_riwayat';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function checkData()
	{
		$id_pelayanan = $this->input->post('id_pelayanan');
		$super_ranap = $this->M_Erm->checkData($id_pelayanan, 'form_perintah_ranap');
		$asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		$observasi = $this->M_Erm->checkData($id_pelayanan, 'form_observasi');
		$sebab_kematian = $this->M_Erm->checkData($id_pelayanan, 'form_sebab_kematian');
		$lembar_rujukan = $this->M_Erm->checkData($id_pelayanan, 'form_lembar_rujukan');
		$asses_dokter_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_dokter_igd');
		// $peng_khusus = $this->M_Erm->checkData($id_pelayanan, 'form_peng_khusus');
		$penundaan = $this->M_Erm->checkData($id_pelayanan, 'form_penundaan_pelayanan_obat');
		$intra = $this->M_Erm->checkData($id_pelayanan, 'form_transfer_intra_rs');
		$antar = $this->M_Erm->checkData($id_pelayanan, 'form_transfer_antar_rs');


		$db['super_ranap'] = empty($super_ranap) ? 'not-found' : 'found';
		$db['asses_per_igd'] = empty($asses_per_igd) ? 'not-found' : 'found';
		$db['asses_dokter_igd'] = empty($asses_dokter_igd) ? 'not-found' : 'found';
		$db['observasi'] = empty($observasi) ? 'not-found' : 'found';
		$db['sebab_kematian'] = empty($sebab_kematian) ? 'not-found' : 'found';
		$db['lembar_rujukan'] = empty($lembar_rujukan) ? 'not-found' : 'found';
		$db['penundaan'] = empty($penundaan) ? 'not-found' : 'found';
		$db['intra'] = empty($intra) ? 'not-found' : 'found';
		$db['antar'] = empty($antar) ? 'not-found' : 'found';

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

		$tgl = date("Y-m-d h:i:s");
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
		$tgl = date("Y-m-d h:i:s");
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
	
}
