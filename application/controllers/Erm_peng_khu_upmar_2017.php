<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_peng_khu_upmar_2017 extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Staff');
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
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_idg_peng_khu_upmar_2017';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	

	public function tampil_list_pengawasan()
	{
		// $id_akun = 'dgok8itaesm';
		$id_history = $this->input->post('id_history');
		$page_data = $this->M_Erm_poli->selectListPengawasan($id_history);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_form_peng_khusus . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_tindakan(\"" . $page_data[$i]->id_form_peng_khusus  . "\")' '><i class='fa fa-trash'></i></button>";
			$kesadaran = $page_data[$i]->kesadaran;
			$tensi = $page_data[$i]->tensi;
			$nadi = $page_data[$i]->nadi;
			$nafas = $page_data[$i]->nafas;
			$suhu = $page_data[$i]->suhu;
			$nyeri = $page_data[$i]->nyeri;
			$oral = $page_data[$i]->oral;
			$infus = $page_data[$i]->infus;
			$jumlah_masuk = $page_data[$i]->jumlah_masuk;
			$urin = $page_data[$i]->urin;
			$muntah = $page_data[$i]->muntah;
			$bab = $page_data[$i]->bab;
			$jumlah_keluar = $page_data[$i]->jumlah_keluar;
			$keterangan = $page_data[$i]->keterangan;

			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal) . " " . $waktu = strftime("%H:%M WIB", $tanggal);;

			$out[$i] = array($tombol, $hapus, $date, $kesadaran, $tensi, $nadi, $nafas, $suhu, $nyeri, $oral, $infus, $jumlah_masuk, $urin, $muntah, $bab, $jumlah_keluar, $keterangan);
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
	public function insert_peng_khusus()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$this->form_validation->set_rules('kesadaran', 'Kesadaran', 'required');
		$this->form_validation->set_rules('tensi', 'Tensi', 'required');
		$this->form_validation->set_rules('nadi', 'Nadi', 'required');
		$this->form_validation->set_rules('nafas', 'Nafas', 'required');
		$this->form_validation->set_rules('nyeri', 'Nyeri', 'required');
		$this->form_validation->set_rules('jam', 'Jam ', 'required');
		$this->form_validation->set_rules('oral', 'Oral', 'required');
		$this->form_validation->set_rules('infus', 'Infus', 'required');
		$this->form_validation->set_rules('jumlah_masuk', 'Jumlah Masuk', 'required');
		$this->form_validation->set_rules('urin', 'Urin', 'required');
		$this->form_validation->set_rules('muntah', 'Muntah', 'required');
		$this->form_validation->set_rules('bab', 'Jam Penundaan', 'required');
		$this->form_validation->set_rules('jumlah_keluar', 'Jam Penundaan', 'required');
		$this->form_validation->set_rules('keterangan', 'Jam Penundaan', 'required');

		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'kesadaran' => $this->input->post('kesadaran'),
				'tensi' => $this->input->post('tensi'),
				'nadi' => $this->input->post('nadi'),
				'nafas' => $this->input->post('nafas'),
				'nyeri' => $this->input->post('nyeri'),
				'jam' => $this->input->post('jam'),
				'oral' => $this->input->post('oral'),
				'infus' => $this->input->post('infus'),
				'jumlah_masuk' => $this->input->post('jumlah_masuk'),
				'urin' => $this->input->post('urin'),
				'muntah' => $this->input->post('muntah'),
				'bab' => $this->input->post('bab'),
				'jumlah_keluar' => $this->input->post('jumlah_keluar'),
				'keterangan' => $this->input->post('keterangan'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm_poli->insert($data, 'form_peng_khusus');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'kesadaran' => form_error('kesadaran'),
				'tensi' => form_error('tensi'),
				'nadi' => form_error('nadi'),
				'nafas' => form_error('nafas'),
				'nyeri' => form_error('nyeri'),
				'jam' => form_error('jam'),
				'oral' => form_error('oral'),
				'infus' => form_error('infus'),
				'jumlah_masuk' => form_error('jumlah_masuk'),
				'urin' => form_error('urin'),
				'muntah' => form_error('muntah'),
				'bab' => form_error('bab'),
				'jumlah_keluar' => form_error('jumlah_keluar'),
				'keterangan' => form_error('keterangan'),
			);
		}
		echo json_encode($out);
	}
	public function edit_peng_khusus()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$data = array(
			'kesadaran' => $this->input->post('kesadaran'),
			'tensi' => $this->input->post('tensi'),
			'nadi' => $this->input->post('nadi'),
			'nafas' => $this->input->post('nafas'),
			'nyeri' => $this->input->post('nyeri'),
			'suhu' => $this->input->post('suhu'),
			'oral' => $this->input->post('oral'),
			'infus' => $this->input->post('infus'),
			'jumlah_masuk' => $this->input->post('jumlah_masuk'),
			'urin' => $this->input->post('urin'),
			'muntah' => $this->input->post('muntah'),
			'bab' => $this->input->post('bab'),
			'jumlah_keluar' => $this->input->post('jumlah_keluar'),
			'keterangan' => $this->input->post('keterangan'),
			'tanggal' => $tgl,
			'staff' => $staff,
		);
		$where = array(
			'id_form_peng_khusus' => $this->input->post('id_form'),
		);

		$this->M_Erm_poli->update($data, $where, 'form_peng_khusus');
		$out['status'] = "success";
		echo json_encode($out);
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
	function hapus_tindakan_pengawasan()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_form_peng_khusus' => $id,
		);
		$this->M_Erm_poli->delete($where, 'form_peng_khusus');
		$out['status'] = "success";
		echo json_encode($out);
	}
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_peng_khu_upmar_2017 extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Staff');
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
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_idg_peng_khu_upmar_2017';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	

	public function tampil_list_pengawasan()
	{
		// $id_akun = 'dgok8itaesm';
		$id_history = $this->input->post('id_history');
		$page_data = $this->M_Erm_poli->selectListPengawasan($id_history);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_form_peng_khusus . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_tindakan(\"" . $page_data[$i]->id_form_peng_khusus  . "\")' '><i class='fa fa-trash'></i></button>";
			$kesadaran = $page_data[$i]->kesadaran;
			$tensi = $page_data[$i]->tensi;
			$nadi = $page_data[$i]->nadi;
			$nafas = $page_data[$i]->nafas;
			$suhu = $page_data[$i]->suhu;
			$nyeri = $page_data[$i]->nyeri;
			$oral = $page_data[$i]->oral;
			$infus = $page_data[$i]->infus;
			$jumlah_masuk = $page_data[$i]->jumlah_masuk;
			$urin = $page_data[$i]->urin;
			$muntah = $page_data[$i]->muntah;
			$bab = $page_data[$i]->bab;
			$jumlah_keluar = $page_data[$i]->jumlah_keluar;
			$keterangan = $page_data[$i]->keterangan;

			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal) . " " . $waktu = strftime("%H:%M WIB", $tanggal);;

			$out[$i] = array($tombol, $hapus, $date, $kesadaran, $tensi, $nadi, $nafas, $suhu, $nyeri, $oral, $infus, $jumlah_masuk, $urin, $muntah, $bab, $jumlah_keluar, $keterangan);
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
	public function insert_peng_khusus()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$this->form_validation->set_rules('kesadaran', 'Kesadaran', 'required');
		$this->form_validation->set_rules('tensi', 'Tensi', 'required');
		$this->form_validation->set_rules('nadi', 'Nadi', 'required');
		$this->form_validation->set_rules('nafas', 'Nafas', 'required');
		$this->form_validation->set_rules('nyeri', 'Nyeri', 'required');
		$this->form_validation->set_rules('jam', 'Jam ', 'required');
		$this->form_validation->set_rules('oral', 'Oral', 'required');
		$this->form_validation->set_rules('infus', 'Infus', 'required');
		$this->form_validation->set_rules('jumlah_masuk', 'Jumlah Masuk', 'required');
		$this->form_validation->set_rules('urin', 'Urin', 'required');
		$this->form_validation->set_rules('muntah', 'Muntah', 'required');
		$this->form_validation->set_rules('bab', 'Jam Penundaan', 'required');
		$this->form_validation->set_rules('jumlah_keluar', 'Jam Penundaan', 'required');
		$this->form_validation->set_rules('keterangan', 'Jam Penundaan', 'required');

		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'kesadaran' => $this->input->post('kesadaran'),
				'tensi' => $this->input->post('tensi'),
				'nadi' => $this->input->post('nadi'),
				'nafas' => $this->input->post('nafas'),
				'nyeri' => $this->input->post('nyeri'),
				'jam' => $this->input->post('jam'),
				'oral' => $this->input->post('oral'),
				'infus' => $this->input->post('infus'),
				'jumlah_masuk' => $this->input->post('jumlah_masuk'),
				'urin' => $this->input->post('urin'),
				'muntah' => $this->input->post('muntah'),
				'bab' => $this->input->post('bab'),
				'jumlah_keluar' => $this->input->post('jumlah_keluar'),
				'keterangan' => $this->input->post('keterangan'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm_poli->insert($data, 'form_peng_khusus');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'kesadaran' => form_error('kesadaran'),
				'tensi' => form_error('tensi'),
				'nadi' => form_error('nadi'),
				'nafas' => form_error('nafas'),
				'nyeri' => form_error('nyeri'),
				'jam' => form_error('jam'),
				'oral' => form_error('oral'),
				'infus' => form_error('infus'),
				'jumlah_masuk' => form_error('jumlah_masuk'),
				'urin' => form_error('urin'),
				'muntah' => form_error('muntah'),
				'bab' => form_error('bab'),
				'jumlah_keluar' => form_error('jumlah_keluar'),
				'keterangan' => form_error('keterangan'),
			);
		}
		echo json_encode($out);
	}
	public function edit_peng_khusus()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$data = array(
			'kesadaran' => $this->input->post('kesadaran'),
			'tensi' => $this->input->post('tensi'),
			'nadi' => $this->input->post('nadi'),
			'nafas' => $this->input->post('nafas'),
			'nyeri' => $this->input->post('nyeri'),
			'suhu' => $this->input->post('suhu'),
			'oral' => $this->input->post('oral'),
			'infus' => $this->input->post('infus'),
			'jumlah_masuk' => $this->input->post('jumlah_masuk'),
			'urin' => $this->input->post('urin'),
			'muntah' => $this->input->post('muntah'),
			'bab' => $this->input->post('bab'),
			'jumlah_keluar' => $this->input->post('jumlah_keluar'),
			'keterangan' => $this->input->post('keterangan'),
			'tanggal' => $tgl,
			'staff' => $staff,
		);
		$where = array(
			'id_form_peng_khusus' => $this->input->post('id_form'),
		);

		$this->M_Erm_poli->update($data, $where, 'form_peng_khusus');
		$out['status'] = "success";
		echo json_encode($out);
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
	function hapus_tindakan_pengawasan()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_form_peng_khusus' => $id,
		);
		$this->M_Erm_poli->delete($where, 'form_peng_khusus');
		$out['status'] = "success";
		echo json_encode($out);
	}
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
