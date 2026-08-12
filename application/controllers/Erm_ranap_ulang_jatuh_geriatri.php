<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_ulang_jatuh_geriatri extends CI_Controller
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
	public function formulangjatuhgeriatri($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

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
		$page_data['ruang_rawat'] = $this->M_Erm_ranap->getRuangByRiwayatKamar($id_pelayanan);


		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_ulang_jatuh_geriatri';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');

	}
	public function edit_ulang_geriatri()
	{
		

		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('jatuh1', 'Jatuh 1', 'required');
		$this->form_validation->set_rules('jatuh2', 'Jatuh 2', 'required');
		$this->form_validation->set_rules('delirium', 'Delirium', 'required');
		$this->form_validation->set_rules('disorientasi', 'Disorientasi', 'required');
		$this->form_validation->set_rules('agitasi', 'Agitasi', 'required');
		$this->form_validation->set_rules('kacamata', 'Kacamata', 'required');
		$this->form_validation->set_rules('buram', 'Buram', 'required');
		$this->form_validation->set_rules('berkemih', 'Berkemih', 'required');
		$this->form_validation->set_rules('transfer', 'Transfer', 'required');
		$this->form_validation->set_rules('mobilitas', 'Mobilitas', 'required');
		$this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
		if ($this->form_validation->run()) {
			$id = $this->input->post('id_pelayanan');
			$data = array(
				// 'id_pelayanan' => $this->input->post('id_pelayanan'),
				// 'id_history' => $this->input->post('id_history'),
				// 'no_rm' => $this->input->post('no_rm'),
				'jatuh1' => $this->input->post('jatuh1'),
				'jatuh2' => $this->input->post('jatuh2'),
				'delirium' => $this->input->post('delirium'),
				'disorientasi' => $this->input->post('disorientasi'),
				'agitasi' => $this->input->post('agitasi'),
				'kacamata' => $this->input->post('kacamata'),
				'buram' => $this->input->post('buram'),
				'berkemih' => $this->input->post('berkemih'),
				'transfer' => $this->input->post('transfer'),
				'mobilitas' => $this->input->post('mobilitas'),
				'skor_total' => $this->input->post('skor_total'),
				'diagnosa' => $this->input->post('diagnosa'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_ranap->update_ulang_geriatri($id, $data);
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error' => true,
				'jatuh1' => form_error('jatuh1'),
				'jatuh2' => form_error('jatuh2'),
				'delirium' => form_error('delirium'),
				'disorientasi' => form_error('disorientasi'),
				'agitasi' => form_error('agitasi'),
				'kacamata' => form_error('kacamata'),
				'buram' => form_error('buram'),
				'berkemih' => form_error('berkemih'),
				'transfer' => form_error('transfer'),
				'mobilitas' => form_error('mobilitas'),
				'skor_total' => form_error('skor_total'),
			);
		}
		echo json_encode($out);
	}


	public function insert_asesmen()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('jatuh1', 'Jatuh 1', 'required');
		$this->form_validation->set_rules('jatuh2', 'Jatuh 2', 'required');
		$this->form_validation->set_rules('delirium', 'Delirium', 'required');
		$this->form_validation->set_rules('disorientasi', 'Disorientasi', 'required');
		$this->form_validation->set_rules('agitasi', 'Agitasi', 'required');
		$this->form_validation->set_rules('kacamata', 'Kacamata', 'required');
		$this->form_validation->set_rules('buram', 'Buram', 'required');
		$this->form_validation->set_rules('berkemih', 'Berkemih', 'required');
		$this->form_validation->set_rules('transfer', 'Transfer', 'required');
		$this->form_validation->set_rules('mobilitas', 'Mobilitas', 'required');
		$this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'jatuh1' => $this->input->post('jatuh1'),
				'jatuh2' => $this->input->post('jatuh2'),
				'delirium' => $this->input->post('delirium'),
				'disorientasi' => $this->input->post('disorientasi'),
				'agitasi' => $this->input->post('agitasi'),
				'kacamata' => $this->input->post('kacamata'),
				'buram' => $this->input->post('buram'),
				'berkemih' => $this->input->post('berkemih'),
				'transfer' => $this->input->post('transfer'),
				'mobilitas' => $this->input->post('mobilitas'),
				'skor_total' => $this->input->post('skor_total'),
				'diagnosa' => $this->input->post('diagnosa'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_ranap->insert($data, 'asesmen_ulang_geriatri');
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error' => true,
				'jatuh1' => form_error('jatuh1'),
				'jatuh2' => form_error('jatuh2'),
				'delirium' => form_error('delirium'),
				'disorientasi' => form_error('disorientasi'),
				'agitasi' => form_error('agitasi'),
				'kacamata' => form_error('kacamata'),
				'buram' => form_error('buram'),
				'berkemih' => form_error('berkemih'),
				'transfer' => form_error('transfer'),
				'mobilitas' => form_error('mobilitas'),
				'skor_total' => form_error('skor_total'),
			);
		}
		echo json_encode($out);
	}

	public function tampil_list_per_pen_rujukan()
	{
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm_ranap->selectUlangGeriatri($id_pelayanan);
		$data = $this->session->userdata('data_auth');
		$staff = $data->id_staff;
		if($staff == "st32"){
			$nama = "rawatinap";
		}else{
			$data->nama;
		}
		


		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_asesmen . "\")'><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $page_data[$i]->id_asesmen . "\")'><i class='icon-trash'></i></button>";

			$skor_total = $page_data[$i]->skor_total;
			$diagnosa = $page_data[$i]->diagnosa;
			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal);

			$staff = $nama; 

			$out[$i] = array($no, $tombol, $hapus, $skor_total, $diagnosa, $date, $staff); 
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

	function hapus_catatan()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_asesmen' => $id,
		);
		$this->M_Erm->delete($where, 'asesmen_ulang_geriatri');
		$out['status'] = "success";
		echo json_encode($out);
	}


	// public function update_asesmen()
	// {
	// 	$data = $this->session->userdata('data_auth');
	// 	$tgl = date("Y-m-d h:i:s");
	// 	$staff = $data->id_staff;
	// 	$id = $this->input->post('id');
	// 	$this->form_validation->set_rules('jatuh1', 'Jatuh 1', 'required');
	// 	$this->form_validation->set_rules('jatuh2', 'Jatuh 2', 'required');
	// 	$this->form_validation->set_rules('delirium', 'Delirium', 'required');
	// 	$this->form_validation->set_rules('disorientasi', 'Disorientasi', 'required');
	// 	$this->form_validation->set_rules('agitasi', 'Agitasi', 'required');
	// 	$this->form_validation->set_rules('kacamata', 'Kacamata', 'required');
	// 	$this->form_validation->set_rules('buram', 'Buram', 'required');
	// 	$this->form_validation->set_rules('berkemih', 'Berkemih', 'required');
	// 	$this->form_validation->set_rules('transfer', 'Transfer', 'required');
	// 	$this->form_validation->set_rules('mobilitas', 'Mobilitas', 'required');
	// 	$this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
	// 	if ($this->form_validation->run()) {
	// 		$data = array(
	// 			'id_pelayanan' => $this->input->post('id_pelayanan'),
	// 			'id_history' => $this->input->post('id_history'),
	// 			'no_rm' => $this->input->post('no_rm'),
	// 			'jatuh1' => $this->input->post('jatuh1'),
	// 			'jatuh2' => $this->input->post('jatuh2'),
	// 			'delirium' => $this->input->post('delirium'),
	// 			'disorientasi' => $this->input->post('disorientasi'),
	// 			'agitasi' => $this->input->post('agitasi'),
	// 			'kacamata' => $this->input->post('kacamata'),
	// 			'buram' => $this->input->post('buram'),
	// 			'berkemih' => $this->input->post('berkemih'),
	// 			'transfer' => $this->input->post('transfer'),
	// 			'mobilitas' => $this->input->post('mobilitas'),
	// 			'skor_total' => $this->input->post('skor_total'),
	// 			'diagnosa' => $this->input->post('diagnosa'),
	// 			'tanggal' => $tgl,
	// 			'staff' => $staff,
	// 		);
	// 		$this->M_Erm_ranap->update_ulang_geriatri($id,$data);
	// 		$out['status'] = "success";
	// 	} else {
	// 		$out = array(
	// 			'error'   => true,
	// 			'jatuh1' => form_error('jatuh1'),
	// 			'jatuh2' => form_error('jatuh2'),
	// 			'delirium' => form_error('delirium'),
	// 			'disorientasi' => form_error('disorientasi'),
	// 			'agitasi' => form_error('agitasi'),
	// 			'kacamata' => form_error('kacamata'),
	// 			'buram' => form_error('buram'),
	// 			'berkemih' => form_error('berkemih'),
	// 			'transfer' => form_error('transfer'),
	// 			'mobilitas' => form_error('mobilitas'),
	// 			'skor_total' => form_error('skor_total'),
	// 		);
	// 	}
	// 	echo json_encode($out);
	// }
	public function get_ass_per()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('asesmen_ulang_geriatri', ['id_asesmen' => $id])->row_array();
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

class Erm_ranap_ulang_jatuh_geriatri extends CI_Controller
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
	public function formulangjatuhgeriatri($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

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
		$page_data['ruang_rawat'] = $this->M_Erm_ranap->getRuangByRiwayatKamar($id_pelayanan);


		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_ulang_jatuh_geriatri';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');

	}
	public function edit_ulang_geriatri()
	{
		

		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('jatuh1', 'Jatuh 1', 'required');
		$this->form_validation->set_rules('jatuh2', 'Jatuh 2', 'required');
		$this->form_validation->set_rules('delirium', 'Delirium', 'required');
		$this->form_validation->set_rules('disorientasi', 'Disorientasi', 'required');
		$this->form_validation->set_rules('agitasi', 'Agitasi', 'required');
		$this->form_validation->set_rules('kacamata', 'Kacamata', 'required');
		$this->form_validation->set_rules('buram', 'Buram', 'required');
		$this->form_validation->set_rules('berkemih', 'Berkemih', 'required');
		$this->form_validation->set_rules('transfer', 'Transfer', 'required');
		$this->form_validation->set_rules('mobilitas', 'Mobilitas', 'required');
		$this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
		if ($this->form_validation->run()) {
			$id = $this->input->post('id_pelayanan');
			$data = array(
				// 'id_pelayanan' => $this->input->post('id_pelayanan'),
				// 'id_history' => $this->input->post('id_history'),
				// 'no_rm' => $this->input->post('no_rm'),
				'jatuh1' => $this->input->post('jatuh1'),
				'jatuh2' => $this->input->post('jatuh2'),
				'delirium' => $this->input->post('delirium'),
				'disorientasi' => $this->input->post('disorientasi'),
				'agitasi' => $this->input->post('agitasi'),
				'kacamata' => $this->input->post('kacamata'),
				'buram' => $this->input->post('buram'),
				'berkemih' => $this->input->post('berkemih'),
				'transfer' => $this->input->post('transfer'),
				'mobilitas' => $this->input->post('mobilitas'),
				'skor_total' => $this->input->post('skor_total'),
				'diagnosa' => $this->input->post('diagnosa'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_ranap->update_ulang_geriatri($id, $data);
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error' => true,
				'jatuh1' => form_error('jatuh1'),
				'jatuh2' => form_error('jatuh2'),
				'delirium' => form_error('delirium'),
				'disorientasi' => form_error('disorientasi'),
				'agitasi' => form_error('agitasi'),
				'kacamata' => form_error('kacamata'),
				'buram' => form_error('buram'),
				'berkemih' => form_error('berkemih'),
				'transfer' => form_error('transfer'),
				'mobilitas' => form_error('mobilitas'),
				'skor_total' => form_error('skor_total'),
			);
		}
		echo json_encode($out);
	}


	public function insert_asesmen()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('jatuh1', 'Jatuh 1', 'required');
		$this->form_validation->set_rules('jatuh2', 'Jatuh 2', 'required');
		$this->form_validation->set_rules('delirium', 'Delirium', 'required');
		$this->form_validation->set_rules('disorientasi', 'Disorientasi', 'required');
		$this->form_validation->set_rules('agitasi', 'Agitasi', 'required');
		$this->form_validation->set_rules('kacamata', 'Kacamata', 'required');
		$this->form_validation->set_rules('buram', 'Buram', 'required');
		$this->form_validation->set_rules('berkemih', 'Berkemih', 'required');
		$this->form_validation->set_rules('transfer', 'Transfer', 'required');
		$this->form_validation->set_rules('mobilitas', 'Mobilitas', 'required');
		$this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'jatuh1' => $this->input->post('jatuh1'),
				'jatuh2' => $this->input->post('jatuh2'),
				'delirium' => $this->input->post('delirium'),
				'disorientasi' => $this->input->post('disorientasi'),
				'agitasi' => $this->input->post('agitasi'),
				'kacamata' => $this->input->post('kacamata'),
				'buram' => $this->input->post('buram'),
				'berkemih' => $this->input->post('berkemih'),
				'transfer' => $this->input->post('transfer'),
				'mobilitas' => $this->input->post('mobilitas'),
				'skor_total' => $this->input->post('skor_total'),
				'diagnosa' => $this->input->post('diagnosa'),
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_ranap->insert($data, 'asesmen_ulang_geriatri');
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error' => true,
				'jatuh1' => form_error('jatuh1'),
				'jatuh2' => form_error('jatuh2'),
				'delirium' => form_error('delirium'),
				'disorientasi' => form_error('disorientasi'),
				'agitasi' => form_error('agitasi'),
				'kacamata' => form_error('kacamata'),
				'buram' => form_error('buram'),
				'berkemih' => form_error('berkemih'),
				'transfer' => form_error('transfer'),
				'mobilitas' => form_error('mobilitas'),
				'skor_total' => form_error('skor_total'),
			);
		}
		echo json_encode($out);
	}

	public function tampil_list_per_pen_rujukan()
	{
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm_ranap->selectUlangGeriatri($id_pelayanan);
		$data = $this->session->userdata('data_auth');
		$staff = $data->id_staff;
		if($staff == "st32"){
			$nama = "rawatinap";
		}else{
			$data->nama;
		}
		


		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_asesmen . "\")'><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $page_data[$i]->id_asesmen . "\")'><i class='icon-trash'></i></button>";

			$skor_total = $page_data[$i]->skor_total;
			$diagnosa = $page_data[$i]->diagnosa;
			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal);

			$staff = $nama; 

			$out[$i] = array($no, $tombol, $hapus, $skor_total, $diagnosa, $date, $staff); 
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

	function hapus_catatan()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_asesmen' => $id,
		);
		$this->M_Erm->delete($where, 'asesmen_ulang_geriatri');
		$out['status'] = "success";
		echo json_encode($out);
	}


	// public function update_asesmen()
	// {
	// 	$data = $this->session->userdata('data_auth');
	// 	$tgl = date("Y-m-d h:i:s");
	// 	$staff = $data->id_staff;
	// 	$id = $this->input->post('id');
	// 	$this->form_validation->set_rules('jatuh1', 'Jatuh 1', 'required');
	// 	$this->form_validation->set_rules('jatuh2', 'Jatuh 2', 'required');
	// 	$this->form_validation->set_rules('delirium', 'Delirium', 'required');
	// 	$this->form_validation->set_rules('disorientasi', 'Disorientasi', 'required');
	// 	$this->form_validation->set_rules('agitasi', 'Agitasi', 'required');
	// 	$this->form_validation->set_rules('kacamata', 'Kacamata', 'required');
	// 	$this->form_validation->set_rules('buram', 'Buram', 'required');
	// 	$this->form_validation->set_rules('berkemih', 'Berkemih', 'required');
	// 	$this->form_validation->set_rules('transfer', 'Transfer', 'required');
	// 	$this->form_validation->set_rules('mobilitas', 'Mobilitas', 'required');
	// 	$this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
	// 	if ($this->form_validation->run()) {
	// 		$data = array(
	// 			'id_pelayanan' => $this->input->post('id_pelayanan'),
	// 			'id_history' => $this->input->post('id_history'),
	// 			'no_rm' => $this->input->post('no_rm'),
	// 			'jatuh1' => $this->input->post('jatuh1'),
	// 			'jatuh2' => $this->input->post('jatuh2'),
	// 			'delirium' => $this->input->post('delirium'),
	// 			'disorientasi' => $this->input->post('disorientasi'),
	// 			'agitasi' => $this->input->post('agitasi'),
	// 			'kacamata' => $this->input->post('kacamata'),
	// 			'buram' => $this->input->post('buram'),
	// 			'berkemih' => $this->input->post('berkemih'),
	// 			'transfer' => $this->input->post('transfer'),
	// 			'mobilitas' => $this->input->post('mobilitas'),
	// 			'skor_total' => $this->input->post('skor_total'),
	// 			'diagnosa' => $this->input->post('diagnosa'),
	// 			'tanggal' => $tgl,
	// 			'staff' => $staff,
	// 		);
	// 		$this->M_Erm_ranap->update_ulang_geriatri($id,$data);
	// 		$out['status'] = "success";
	// 	} else {
	// 		$out = array(
	// 			'error'   => true,
	// 			'jatuh1' => form_error('jatuh1'),
	// 			'jatuh2' => form_error('jatuh2'),
	// 			'delirium' => form_error('delirium'),
	// 			'disorientasi' => form_error('disorientasi'),
	// 			'agitasi' => form_error('agitasi'),
	// 			'kacamata' => form_error('kacamata'),
	// 			'buram' => form_error('buram'),
	// 			'berkemih' => form_error('berkemih'),
	// 			'transfer' => form_error('transfer'),
	// 			'mobilitas' => form_error('mobilitas'),
	// 			'skor_total' => form_error('skor_total'),
	// 		);
	// 	}
	// 	echo json_encode($out);
	// }
	public function get_ass_per()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('asesmen_ulang_geriatri', ['id_asesmen' => $id])->row_array();
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
?>