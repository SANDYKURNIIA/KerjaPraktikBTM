<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_dpjp extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Pencarian_Pasien');
	}

	public function form($id_pel, $id_his)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm_poli->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		// $page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;
		$page_data['url'] = base_url('Erm_poli/form/') . $id_pel . '/' .$id_his .'/' .$selectPasien->jenis_pelayanan;

		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_lembar_konsul';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function eval($id_pel, $id_his)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm_poli->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		// $page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;
		$page_data['url'] = base_url('Erm_poli/form/') . $id_pel . '/' .$id_his .'/' .$selectPasien->jenis_pelayanan;

		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_lembar_evaluasi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_lembar_rujukan($id_pel, $id_his)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm_poli->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		// $page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;
		$page_data['url'] = base_url('Erm_poli/form/') . $id_pel . '/' .$id_his .'/' .$selectPasien->jenis_pelayanan;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_lembar_konsul';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function insert_lembar_rujukan()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'tempat' => '-',
			'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
			'diagnosis' => $this->input->post('diagnosis'),
			'tempat1' => '-',
			'hasil_periksa' => '',
			'terapi' => $this->input->post('terapi'),
			// 'tindak_lanjut' => $this->input->post('tindak_lanjut'),
			'terapi1' => '',
			'saran' => '',
			'tanggal' => $tgl,
			'staff' => $staff,
			
		);

		$this->M_Erm_poli->insert($data, 'form_lembar_rujukan');
		$out['status'] = "success";
		echo json_encode($out);
	}

	public function edit_eval($id_pel,$id_his){
		// $id_pelayanan = base64_decode(urldecode($id_pel));
		// $id_history = base64_decode(urldecode($id_his));
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pel, $id_his);
		$selectEval = $this->M_Erm_poli->getDataEval($id_pel, $id_his);
		// $selectPasien2 = $this->M_Erm_poli->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		// $page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;
		$page_data['hasil_eval'] = $selectEval->evaluasi;
		$page_data['url'] = base_url('Erm_poli/form/') . $id_pel . '/' .$id_his .'/' .$selectPasien->jenis_pelayanan;

		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_lembar_edit_eval';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_lembar_evaluasi(){
		$eval = $this->input->post('evaluasi');
		// $id = $this->input->post('id_pelayanan');

		$data = array(
			'evaluasi'=> $eval
		);

		$where = array('id_pelayanan' => $this->input->post('id_pelayanan'));

		$this->M_Erm_poli->update($data, $where, 'form_lembar_evaluasi');
		$out['status'] = "success";
		echo json_encode($out);
	}

	public function insert_lembar_evaluasi()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'evaluasi' => $this->input->post('evaluasi'),
			// 'tempat' => '-',
			// 'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
			// 'diagnosis' => $this->input->post('diagnosis'),
			// 'tempat1' => '-',
			// 'hasil_periksa' => '',
			// 'terapi' => $this->input->post('terapi'),
			// // 'tindak_lanjut' => $this->input->post('tindak_lanjut'),
			// 'terapi1' => '',
			// 'saran' => '',
			'tanggal' => $tgl,
			'staff' => $staff,
			
		);

		$this->M_Erm_poli->insert($data, 'form_lembar_evaluasi');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function update_lembar_rujukan()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'tempat' => '-',
			'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
			'diagnosis' => $this->input->post('diagnosis'),
			'tempat1' => '-',
			'hasil_periksa' => '',
			'terapi' => $this->input->post('terapi'),
			// 'tindak_lanjut' => $this->input->post('tindak_lanjut'),
			'terapi1' => '',
			'saran' => '',
			'tanggal' => $tgl,
			'staff' => $staff,
			
		);
		$where = array('id_form_lembar_rujukan' => $this->input->post('id'));

		$this->M_Erm_poli->update($data, $where, 'form_lembar_rujukan');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function get_diagnosa()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('diagnosa_utama', ['id_history' => $id])->result();
		if (count($db) > 0) {
			$db = $db[0];
			$db->status_dt = 'found';
		} else {
			$db = null;
			$db['status_dt'] = 'not found';
		}
		echo json_encode($db);
	}
	public function get_ass_dok()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_assesmen_dokter', ['id_history' => $id])->result();
		if (count($db) > 0) {
			$db = $db[0];
			$db->status_dt = 'found';
		} else {
			$db = null;
			$db['status_dt'] = 'not found';
		}
		echo json_encode($db);
	}
	public function get_data()//edit
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_lembar_rujukan', ['id_pelayanan' => $id])->result();
		if (count($db) > 0) {
			$db = $db[0];
			$db->status_dt = 'found';
		} else {
			$db = null;
			$db['status_dt'] = 'not found';
		}
		echo json_encode($db);
	}
	public function tampil_list()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->db->get_where('form_lembar_rujukan', ['id_pelayanan' => $id_pelayanan]);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_form_peng_khusus . "\")' '><i class='icon-rocket'></i></button>";
			$tombol1 = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_form_peng_khusus . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_tindakan(\"" . $page_data[$i]->id_form_peng_khusus  . "\")' '><i class='fa fa-trash'></i></button>";
			$poli = $page_data[$i]->kesadaran;
			$staff = $page_data[$i]->tensi;

			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal) . " " . $waktu = strftime("%H:%M WIB", $tanggal);;

			$out[$i] = array($tombol,$tombol1, $hapus, $date, $poli, $staff);
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
