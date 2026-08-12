<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_observasi_transfer extends CI_Controller
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
	}

	public function form($id_pelayanan, $id_history)
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
		$page_data['link'] = 'Erm_igd/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_form_obserfasi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_obserfasi($id_pelayanan, $id_history)
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
		$page_data['link'] = 'Erm_igd/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_form_obserfasi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function form_riwayat($id_pelayanan, $id_history)
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
		$page_data['link'] = 'Erm_igd/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_form_obserfasi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function riwayat_obserfasi($id_pelayanan, $id_history)
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
		$page_data['link'] = 'Erm_igd/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_form_obserfasi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	///////////////RAJAL//////////////////////
	public function form_raj($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
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
		$page_data['link'] = 'Erm_poli/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_form_obserfasi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_obserfasi_raj($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
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
		$page_data['link'] = 'Erm_poli/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_form_obserfasi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	/////////////////////////////////////////////////////////////////////////

	public function tampil_list_obat_observasi()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$id_history = $this->input->post('id_history');
		$page_data = $this->db->get_where('obat_observasi', ['id_history' => $id_history, 'id_pelayanan' => $id_pelayanan])->result();

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_obat . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_tindakan(\"" . $page_data[$i]->id_obat  . "\")' '><i class='fa fa-trash'></i></button>";
			$gcs = $page_data[$i]->gcs;
			$tensi = $page_data[$i]->tensi;
			$nadi = $page_data[$i]->nadi;
			$nafas = $page_data[$i]->nafas;
			$suhu = $page_data[$i]->suhu;
			$spo2 = $page_data[$i]->spo2;
			$kejadian = $page_data[$i]->kejadian;
			$tindakan_obat = $page_data[$i]->tindakan_obat;

			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%d %B %Y, %H:%M WIB", $tanggal);

			$out[$i] = array($tombol, $hapus, $date, $gcs, $tensi, $nadi, $suhu, $nafas, $spo2, $kejadian, $tindakan_obat);
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

	public function edit_obat_observasi()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$data = array(
			'gcs' => $this->input->post('gcs'),
			'tensi' => $this->input->post('tensi'),
			'nadi' => $this->input->post('nadi'),
			'nafas' => $this->input->post('nafas'),
			'suhu' => $this->input->post('suhu'),
			'spo2' => $this->input->post('spo2'),
			'kejadian' => $this->input->post('kejadian'),
			'tindakan_obat' => $this->input->post('tindakan_obat'),
		);
		$where = array(
			'id_obat' => $this->input->post('id_form'),
		);

		$this->M_Erm->update($data, $where, 'obat_observasi');
		$out['status'] = "success";
		echo json_encode($out);
	}

	function hapus_obat_observasi()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_obat' => $id,
		);
		$this->M_Erm->delete($where, 'obat_observasi');
		$out['status'] = "success";
		echo json_encode($out);
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
	public function edit_observasi()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
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
		$where = array('id_form_observasi' => $this->input->post('id'));
		$this->M_Erm->update($data, $where, 'form_observasi');
		$out['status'] = "success";

		echo json_encode($out);
	}

	public function insert_obat_observasi()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'gcs' => $this->input->post('gcs'),
			'tensi' => $this->input->post('tensi'),
			'nadi' => $this->input->post('nadi'),
			'nafas' => $this->input->post('nafas'),
			'suhu' => $this->input->post('suhu'),
			'spo2' => $this->input->post('spo2'),
			'kejadian' => $this->input->post('kejadian'),
			'tindakan_obat' => $this->input->post('tindakan_obat'),
			'tanggal' => $tgl,
			'staff' => $staff,
		);


		$this->M_Erm->insert($data, 'obat_observasi');
		$out['status'] = "success";
		echo json_encode($out);
	}
	// public function edit_obat_observasi()
	// {
	// 	$data = $this->session->userdata('data_auth');

	// 	$tgl = date("Y-m-d H:i:s");
	// 	$staff = $data->id_staff;

	// 	$data = array(
	// 		'gcs' => $this->input->post('gcs'),
	// 		'tensi' => $this->input->post('tensi'),
	// 		'nadi' => $this->input->post('nadi'),
	// 		'nafas' => $this->input->post('nafas'),
	// 		'suhu' => $this->input->post('suhu'),
	// 		'spo2' => $this->input->post('spo2'),
	// 		'kejadian' => $this->input->post('kejadian'),
	// 		'tindakan_obat' => $this->input->post('tindakan_obat'),
	// 	);
	// 	$where = array(
	// 		'id_obat' => $this->input->post('id_form'),
	// 	);

	// 	$this->M_Erm->update($data, $where, 'obat_observasi');
	// 	$out['status'] = "success";
	// 	echo json_encode($out);
	// }

	public function print_out()
	{
		$data['page_title'] = "Form Observasi transfer antar RS";
		$this->load->view('erm_print/observasi_transfer', $data);
	}
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_observasi_transfer extends CI_Controller
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
	}

	public function form($id_pelayanan, $id_history)
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
		$page_data['link'] = 'Erm_igd/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_form_obserfasi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_obserfasi($id_pelayanan, $id_history)
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
		$page_data['link'] = 'Erm_igd/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_form_obserfasi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function form_riwayat($id_pelayanan, $id_history)
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
		$page_data['link'] = 'Erm_igd/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_form_obserfasi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function riwayat_obserfasi($id_pelayanan, $id_history)
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
		$page_data['link'] = 'Erm_igd/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_form_obserfasi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	///////////////RAJAL//////////////////////
	public function form_raj($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
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
		$page_data['link'] = 'Erm_poli/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_form_obserfasi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_obserfasi_raj($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
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
		$page_data['link'] = 'Erm_poli/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_form_obserfasi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	/////////////////////////////////////////////////////////////////////////

	public function tampil_list_obat_observasi()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$id_history = $this->input->post('id_history');
		$page_data = $this->db->get_where('obat_observasi', ['id_history' => $id_history, 'id_pelayanan' => $id_pelayanan])->result();

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_obat . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_tindakan(\"" . $page_data[$i]->id_obat  . "\")' '><i class='fa fa-trash'></i></button>";
			$gcs = $page_data[$i]->gcs;
			$tensi = $page_data[$i]->tensi;
			$nadi = $page_data[$i]->nadi;
			$nafas = $page_data[$i]->nafas;
			$suhu = $page_data[$i]->suhu;
			$spo2 = $page_data[$i]->spo2;
			$kejadian = $page_data[$i]->kejadian;
			$tindakan_obat = $page_data[$i]->tindakan_obat;

			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%d %B %Y, %H:%M WIB", $tanggal);

			$out[$i] = array($tombol, $hapus, $date, $gcs, $tensi, $nadi, $suhu, $nafas, $spo2, $kejadian, $tindakan_obat);
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

	public function edit_obat_observasi()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$data = array(
			'gcs' => $this->input->post('gcs'),
			'tensi' => $this->input->post('tensi'),
			'nadi' => $this->input->post('nadi'),
			'nafas' => $this->input->post('nafas'),
			'suhu' => $this->input->post('suhu'),
			'spo2' => $this->input->post('spo2'),
			'kejadian' => $this->input->post('kejadian'),
			'tindakan_obat' => $this->input->post('tindakan_obat'),
		);
		$where = array(
			'id_obat' => $this->input->post('id_form'),
		);

		$this->M_Erm->update($data, $where, 'obat_observasi');
		$out['status'] = "success";
		echo json_encode($out);
	}

	function hapus_obat_observasi()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_obat' => $id,
		);
		$this->M_Erm->delete($where, 'obat_observasi');
		$out['status'] = "success";
		echo json_encode($out);
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
	public function edit_observasi()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
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
		$where = array('id_form_observasi' => $this->input->post('id'));
		$this->M_Erm->update($data, $where, 'form_observasi');
		$out['status'] = "success";

		echo json_encode($out);
	}

	public function insert_obat_observasi()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'gcs' => $this->input->post('gcs'),
			'tensi' => $this->input->post('tensi'),
			'nadi' => $this->input->post('nadi'),
			'nafas' => $this->input->post('nafas'),
			'suhu' => $this->input->post('suhu'),
			'spo2' => $this->input->post('spo2'),
			'kejadian' => $this->input->post('kejadian'),
			'tindakan_obat' => $this->input->post('tindakan_obat'),
			'tanggal' => $tgl,
			'staff' => $staff,
		);


		$this->M_Erm->insert($data, 'obat_observasi');
		$out['status'] = "success";
		echo json_encode($out);
	}
	// public function edit_obat_observasi()
	// {
	// 	$data = $this->session->userdata('data_auth');

	// 	$tgl = date("Y-m-d H:i:s");
	// 	$staff = $data->id_staff;

	// 	$data = array(
	// 		'gcs' => $this->input->post('gcs'),
	// 		'tensi' => $this->input->post('tensi'),
	// 		'nadi' => $this->input->post('nadi'),
	// 		'nafas' => $this->input->post('nafas'),
	// 		'suhu' => $this->input->post('suhu'),
	// 		'spo2' => $this->input->post('spo2'),
	// 		'kejadian' => $this->input->post('kejadian'),
	// 		'tindakan_obat' => $this->input->post('tindakan_obat'),
	// 	);
	// 	$where = array(
	// 		'id_obat' => $this->input->post('id_form'),
	// 	);

	// 	$this->M_Erm->update($data, $where, 'obat_observasi');
	// 	$out['status'] = "success";
	// 	echo json_encode($out);
	// }

	public function print_out()
	{
		$data['page_title'] = "Form Observasi transfer antar RS";
		$this->load->view('erm_print/observasi_transfer', $data);
	}
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
