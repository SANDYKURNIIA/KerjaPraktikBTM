<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Discharge_planning extends CI_Controller
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
		$this->load->model('M_Resume_pasien_pulang');
		$this->load->model('M_discharger');
	}

	public function formresume($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['nama_ruangan'] = $this->M_Erm_ranap->getRuangByRiwayatKamar($id_pelayanan);
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['kelas'] = $selectPasien->kelas;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		// $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_discharge_planning';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function store()
	{
		// Ambil data dari request
		$tgl = date("Y-m-d h:i:s");
		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'id_form' => $this->input->post('id_form'),
			'no_rm' => $this->input->post('no_rm'),
			'pasienTinggal' => $this->input->post('pasienTinggal'),
			'letakkamar' => $this->input->post('letakkamar'),
			'penerangan' => $this->input->post('penerangan'),
			'kamarmandi' => $this->input->post('kamarmandi'),
			'toilet' => $this->input->post('toilet'),
			'kebutuhandasar' => $this->input->post('kebutuhandasar'),
			'alatbantukhusus' => $this->input->post('alatbantukhusus'),
			'dietmakananprogram' => $this->input->post('dietmakananprogram'),
			'rujukankekomunitas' => $this->input->post('rujukankekomunitas'),
			'hubungan' => $this->input->post('hubungan'),
			'Alamat' => $this->input->post('Alamat'),
			'penjemput' => $this->input->post('penjemput'),
			'keperluan1' => $this->input->post('keperluan1'),
			'keperluan2' => $this->input->post('keperluan2'),
			'keperluan3' => $this->input->post('keperluan3'),
			'keperluan4' => $this->input->post('keperluan4'),
			'keperluan5' => $this->input->post('keperluan5'),
			'keperluan6' => $this->input->post('keperluan6'),
			'keperluan7' => $this->input->post('keperluan7'),
			'keperluan8' => $this->input->post('keperluan8'),
			'keperluan9' => $this->input->post('keperluan9'),
			'keperluan10' => $this->input->post('keperluan10'),
			'keperluan11' => $this->input->post('keperluan11'),
			'keperluan12' => $this->input->post('keperluan12'),
			'keperluan13' => $this->input->post('keperluan13'),
			'keperluan14' => $this->input->post('keperluan14'),
			'keperluan15' => $this->input->post('keperluan15'),
			'suratpulang' => $this->input->post('suratpulang'),
			'penyuluhan' => $this->input->post('penyuluhan'),
			// 'managemenNyeri' => $this->input->post('managemenNyeri'),
			'transportasi' => $this->input->post('transportasi'),
			'tanggal' => date("Y-m-d H:i:s"),
		);

		// Menyimpan data dan memeriksa hasil penyimpanan
		$result = $this->M_discharger->saveData('discharger', $data);

		// Menyiapkan output berdasarkan hasil penyimpanan
		$out = $result ? ['status' => "success"] : ['status' => "error", 'message' => 'Failed to save data'];

		// Mengembalikan respons ke client dalam format JSON
		echo json_encode($out);
	}



	public function edit_discharger($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm_ranap->selectDataImd($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['nama_ruangan'] = $this->M_Erm_ranap->getRuangByRiwayatKamar($id_pelayanan);
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['kelas'] = $selectPasien->kelas;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		// $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap_Edit/view_ulang_discharger_planning';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}


	public function get_ass_per()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('discharger', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}

	public function update()
	{
		$id_pelayanan = $this->input->post('id_pelayanan'); // pastikan ada inputan untuk where clause
		$where = ['id_pelayanan' => $id_pelayanan]; // sesuaikan kolom untuk kondisi

		$data = array(
			'id_history' => $this->input->post('id_history'),
			'id_form' => $this->input->post('id_form'),
			'no_rm' => $this->input->post('no_rm'),
			'pasienTinggal' => $this->input->post('pasienTinggal'),
			'letakkamar' => $this->input->post('letakkamar'),
			'penerangan' => $this->input->post('penerangan'),
			'kamarmandi' => $this->input->post('kamarmandi'),
			'toilet' => $this->input->post('toilet'),
			'kebutuhandasar' => $this->input->post('kebutuhandasar'),
			'alatbantukhusus' => $this->input->post('alatbantukhusus'),
			'dietmakananprogram' => $this->input->post('dietmakananprogram'),
			'rujukankekomunitas' => $this->input->post('rujukankekomunitas'),
			'hubungan' => $this->input->post('hubungan'),
			'Alamat' => $this->input->post('Alamat'),
			'penjemput' => $this->input->post('penjemput'),
			'keperluan1' => $this->input->post('keperluan1'),
			'keperluan2' => $this->input->post('keperluan2'),
			'keperluan3' => $this->input->post('keperluan3'),
			'keperluan4' => $this->input->post('keperluan4'),
			'keperluan5' => $this->input->post('keperluan5'),
			'keperluan6' => $this->input->post('keperluan6'),
			'keperluan7' => $this->input->post('keperluan7'),
			'keperluan8' => $this->input->post('keperluan8'),
			'keperluan9' => $this->input->post('keperluan9'),
			'keperluan10' => $this->input->post('keperluan10'),
			'keperluan11' => $this->input->post('keperluan11'),
			'keperluan12' => $this->input->post('keperluan12'),
			'keperluan13' => $this->input->post('keperluan13'),
			'keperluan14' => $this->input->post('keperluan14'),
			'keperluan15' => $this->input->post('keperluan15'),
			'suratpulang' => $this->input->post('suratpulang'),
			'penyuluhan' => $this->input->post('penyuluhan'),
			'transportasi' => $this->input->post('transportasi'),
			'tanggal' => date("Y-m-d H:i:s"),
		);

		// Memanggil model dengan parameter lengkap
		$result = $this->M_discharger->update($data, $where, 'discharger');

		$out = $result ? ['status' => "success"] : ['status' => "error", 'message' => 'Failed to save data'];
		echo json_encode($out);
	}


	public function Print_Discharge($id_pelayanan)
	{
		// $id_pelayanan = "pl_6";
		$data['data'] = $this->M_discharger->get_discharge($id_pelayanan);
		$this->load->view('erm_ranap_print/print_discharge', $data);
	}
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Discharge_planning extends CI_Controller
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
		$this->load->model('M_Resume_pasien_pulang');
		$this->load->model('M_discharger');
	}

	public function formresume($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['nama_ruangan'] = $this->M_Erm_ranap->getRuangByRiwayatKamar($id_pelayanan);
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['kelas'] = $selectPasien->kelas;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		// $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_discharge_planning';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function store()
	{
		// Ambil data dari request
		$tgl = date("Y-m-d h:i:s");
		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'id_form' => $this->input->post('id_form'),
			'no_rm' => $this->input->post('no_rm'),
			'pasienTinggal' => $this->input->post('pasienTinggal'),
			'letakkamar' => $this->input->post('letakkamar'),
			'penerangan' => $this->input->post('penerangan'),
			'kamarmandi' => $this->input->post('kamarmandi'),
			'toilet' => $this->input->post('toilet'),
			'kebutuhandasar' => $this->input->post('kebutuhandasar'),
			'alatbantukhusus' => $this->input->post('alatbantukhusus'),
			'dietmakananprogram' => $this->input->post('dietmakananprogram'),
			'rujukankekomunitas' => $this->input->post('rujukankekomunitas'),
			'hubungan' => $this->input->post('hubungan'),
			'Alamat' => $this->input->post('Alamat'),
			'penjemput' => $this->input->post('penjemput'),
			'keperluan1' => $this->input->post('keperluan1'),
			'keperluan2' => $this->input->post('keperluan2'),
			'keperluan3' => $this->input->post('keperluan3'),
			'keperluan4' => $this->input->post('keperluan4'),
			'keperluan5' => $this->input->post('keperluan5'),
			'keperluan6' => $this->input->post('keperluan6'),
			'keperluan7' => $this->input->post('keperluan7'),
			'keperluan8' => $this->input->post('keperluan8'),
			'keperluan9' => $this->input->post('keperluan9'),
			'keperluan10' => $this->input->post('keperluan10'),
			'keperluan11' => $this->input->post('keperluan11'),
			'keperluan12' => $this->input->post('keperluan12'),
			'keperluan13' => $this->input->post('keperluan13'),
			'keperluan14' => $this->input->post('keperluan14'),
			'keperluan15' => $this->input->post('keperluan15'),
			'suratpulang' => $this->input->post('suratpulang'),
			'penyuluhan' => $this->input->post('penyuluhan'),
			// 'managemenNyeri' => $this->input->post('managemenNyeri'),
			'transportasi' => $this->input->post('transportasi'),
			'tanggal' => date("Y-m-d H:i:s"),
		);

		// Menyimpan data dan memeriksa hasil penyimpanan
		$result = $this->M_discharger->saveData('discharger', $data);

		// Menyiapkan output berdasarkan hasil penyimpanan
		$out = $result ? ['status' => "success"] : ['status' => "error", 'message' => 'Failed to save data'];

		// Mengembalikan respons ke client dalam format JSON
		echo json_encode($out);
	}



	public function edit_discharger($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm_ranap->selectDataImd($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['nama_ruangan'] = $this->M_Erm_ranap->getRuangByRiwayatKamar($id_pelayanan);
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['kelas'] = $selectPasien->kelas;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		// $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap_Edit/view_ulang_discharger_planning';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}


	public function get_ass_per()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('discharger', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}

	public function update()
	{
		$id_pelayanan = $this->input->post('id_pelayanan'); // pastikan ada inputan untuk where clause
		$where = ['id_pelayanan' => $id_pelayanan]; // sesuaikan kolom untuk kondisi

		$data = array(
			'id_history' => $this->input->post('id_history'),
			'id_form' => $this->input->post('id_form'),
			'no_rm' => $this->input->post('no_rm'),
			'pasienTinggal' => $this->input->post('pasienTinggal'),
			'letakkamar' => $this->input->post('letakkamar'),
			'penerangan' => $this->input->post('penerangan'),
			'kamarmandi' => $this->input->post('kamarmandi'),
			'toilet' => $this->input->post('toilet'),
			'kebutuhandasar' => $this->input->post('kebutuhandasar'),
			'alatbantukhusus' => $this->input->post('alatbantukhusus'),
			'dietmakananprogram' => $this->input->post('dietmakananprogram'),
			'rujukankekomunitas' => $this->input->post('rujukankekomunitas'),
			'hubungan' => $this->input->post('hubungan'),
			'Alamat' => $this->input->post('Alamat'),
			'penjemput' => $this->input->post('penjemput'),
			'keperluan1' => $this->input->post('keperluan1'),
			'keperluan2' => $this->input->post('keperluan2'),
			'keperluan3' => $this->input->post('keperluan3'),
			'keperluan4' => $this->input->post('keperluan4'),
			'keperluan5' => $this->input->post('keperluan5'),
			'keperluan6' => $this->input->post('keperluan6'),
			'keperluan7' => $this->input->post('keperluan7'),
			'keperluan8' => $this->input->post('keperluan8'),
			'keperluan9' => $this->input->post('keperluan9'),
			'keperluan10' => $this->input->post('keperluan10'),
			'keperluan11' => $this->input->post('keperluan11'),
			'keperluan12' => $this->input->post('keperluan12'),
			'keperluan13' => $this->input->post('keperluan13'),
			'keperluan14' => $this->input->post('keperluan14'),
			'keperluan15' => $this->input->post('keperluan15'),
			'suratpulang' => $this->input->post('suratpulang'),
			'penyuluhan' => $this->input->post('penyuluhan'),
			'transportasi' => $this->input->post('transportasi'),
			'tanggal' => date("Y-m-d H:i:s"),
		);

		// Memanggil model dengan parameter lengkap
		$result = $this->M_discharger->update($data, $where, 'discharger');

		$out = $result ? ['status' => "success"] : ['status' => "error", 'message' => 'Failed to save data'];
		echo json_encode($out);
	}


	public function Print_Discharge($id_pelayanan)
	{
		// $id_pelayanan = "pl_6";
		$data['data'] = $this->M_discharger->get_discharge($id_pelayanan);
		$this->load->view('erm_ranap_print/print_discharge', $data);
	}
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
