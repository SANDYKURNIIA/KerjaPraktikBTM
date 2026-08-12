<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_evaluasi_dpjp extends CI_Controller
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
		$this->load->model('M_Rawatinap');
	}
    public function formevaluasidpjp($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		// $page_data['no_hp'] = $selectPasien->no_hp;
		// $page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
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
		$page_data['dokter'] = $this->M_Rawatinap->selectNamaDPJP();


		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_lembar_evaluasi_dpjp';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_evaluasi_dpjp($id_pelayanan, $id_history)
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
		$page_data['dokter'] = $this->M_Rawatinap->selectNamaDPJP();

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap_Edit/view_lembar_evaluasi_dpjp';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function insert_evaluasi()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$img = $this->input->post('ttd');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = "assets/images/" . uniqid(time(), true) . ".png";
		$success = file_put_contents($file, $data);
		$img1 = $this->input->post('ttd1');
		$img1 = str_replace('data:image/png;base64,', '', $img1);
		$img1 = str_replace(' ', '+', $img1);
		$data1 = base64_decode($img1);
		$file1 = "assets/images/" . uniqid(time(), true) . ".png";
		$success1 = file_put_contents($file1, $data1);
		$this->form_validation->set_rules('harapan', 'Harapan', 'required');
		$this->form_validation->set_rules('terapi', 'Terapi', 'required');
		$this->form_validation->set_rules('konsul', 'Konsul', 'required');
		$this->form_validation->set_rules('penunjang', 'Penunjang', 'required');
		$this->form_validation->set_rules('periksa', 'Periksa', 'required');
		$this->form_validation->set_rules('salam', 'Salam', 'required');
		$this->form_validation->set_rules('perkenalan', 'Perkenalan', 'required');
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
		$this->form_validation->set_rules('waktu_evaluasi', 'Waktu Evaluasi', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'nama_dokter' => $this->input->post('nama_dokter'),
				'waktu_evaluasi' => $this->input->post('waktu_evaluasi'),
				'sebagai' => $this->input->post('sebagai'),
				'perkenalan' => $this->input->post('perkenalan'),
				'periksa' => $this->input->post('periksa'),
				'penunjang' => $this->input->post('penunjang'),
				'konsul' => $this->input->post('konsul'),
				'terapi' => $this->input->post('terapi'),
				'harapan' => $this->input->post('harapan'),
				'pertanyaan' => $this->input->post('pertanyaan'),
				'salam' => $this->input->post('salam'),
				'ttd' => $file,
				'ttd1' => $file1,
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			// $data2= array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_ranap->insert($data, 'lembar_evaluasi_dpjp');
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'konsul' => form_error('konsul'),
				'harapan' => form_error('harapan'),
				'terapi' => form_error('terapi'),
				'pertanyaan' => form_error('pertanyaan'),
				'penunjang' => form_error('penunjang'),
				'periksa' => form_error('periksa'),
				'salam' => form_error('salam'),
				'perkenalan' => form_error('perkenalan'),
				'waktu_evaluasi' => form_error('waktu_evaluasi'),
			);
		}
		echo json_encode($out);
	}
	public function update_evaluasi()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$id = $this->input->post('id');
		$img = $this->input->post('ttd');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = "assets/images/" . uniqid(time(), true) . ".png";
		$success = file_put_contents($file, $data);
		$img1 = $this->input->post('ttd1');
		$img1 = str_replace('data:image/png;base64,', '', $img1);
		$img1 = str_replace(' ', '+', $img1);
		$data1 = base64_decode($img1);
		$file1 = "assets/images/" . uniqid(time(), true) . ".png";
		$success1 = file_put_contents($file1, $data1);
		$this->form_validation->set_rules('harapan', 'Harapan', 'required');
		$this->form_validation->set_rules('terapi', 'Terapi', 'required');
		$this->form_validation->set_rules('konsul', 'Konsul', 'required');
		$this->form_validation->set_rules('penunjang', 'Penunjang', 'required');
		$this->form_validation->set_rules('periksa', 'Periksa', 'required');
		$this->form_validation->set_rules('salam', 'Salam', 'required');
		$this->form_validation->set_rules('perkenalan', 'Perkenalan', 'required');
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
		$this->form_validation->set_rules('waktu_evaluasi', 'Waktu Evaluasi', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'nama_dokter' => $this->input->post('nama_dokter'),
				'waktu_evaluasi' => $this->input->post('waktu_evaluasi'),
				'sebagai' => $this->input->post('sebagai'),
				'perkenalan' => $this->input->post('perkenalan'),
				'periksa' => $this->input->post('periksa'),
				'penunjang' => $this->input->post('penunjang'),
				'konsul' => $this->input->post('konsul'),
				'terapi' => $this->input->post('terapi'),
				'harapan' => $this->input->post('harapan'),
				'pertanyaan' => $this->input->post('pertanyaan'),
				'salam' => $this->input->post('salam'),
				'ttd' => $file,
				'ttd1' => $file1,
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			$this->M_Erm_ranap->update_evaluasi($id,$data);
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'konsul' => form_error('konsul'),
				'harapan' => form_error('harapan'),
				'terapi' => form_error('terapi'),
				'pertanyaan' => form_error('pertanyaan'),
				'penunjang' => form_error('penunjang'),
				'periksa' => form_error('periksa'),
				'salam' => form_error('salam'),
				'perkenalan' => form_error('perkenalan'),
				'waktu_evaluasi' => form_error('waktu_evaluasi'),
			);
		}
		echo json_encode($out);
	}
	public function get_ass_per()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('lembar_evaluasi_dpjp', ['id_history' => $id])->row_array();
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

class Erm_ranap_evaluasi_dpjp extends CI_Controller
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
		$this->load->model('M_Rawatinap');
	}
    public function formevaluasidpjp($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		// $page_data['no_hp'] = $selectPasien->no_hp;
		// $page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
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
		$page_data['dokter'] = $this->M_Rawatinap->selectNamaDPJP();


		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_lembar_evaluasi_dpjp';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_evaluasi_dpjp($id_pelayanan, $id_history)
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
		$page_data['dokter'] = $this->M_Rawatinap->selectNamaDPJP();

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap_Edit/view_lembar_evaluasi_dpjp';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function insert_evaluasi()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$img = $this->input->post('ttd');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = "assets/images/" . uniqid(time(), true) . ".png";
		$success = file_put_contents($file, $data);
		$img1 = $this->input->post('ttd1');
		$img1 = str_replace('data:image/png;base64,', '', $img1);
		$img1 = str_replace(' ', '+', $img1);
		$data1 = base64_decode($img1);
		$file1 = "assets/images/" . uniqid(time(), true) . ".png";
		$success1 = file_put_contents($file1, $data1);
		$this->form_validation->set_rules('harapan', 'Harapan', 'required');
		$this->form_validation->set_rules('terapi', 'Terapi', 'required');
		$this->form_validation->set_rules('konsul', 'Konsul', 'required');
		$this->form_validation->set_rules('penunjang', 'Penunjang', 'required');
		$this->form_validation->set_rules('periksa', 'Periksa', 'required');
		$this->form_validation->set_rules('salam', 'Salam', 'required');
		$this->form_validation->set_rules('perkenalan', 'Perkenalan', 'required');
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
		$this->form_validation->set_rules('waktu_evaluasi', 'Waktu Evaluasi', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'nama_dokter' => $this->input->post('nama_dokter'),
				'waktu_evaluasi' => $this->input->post('waktu_evaluasi'),
				'sebagai' => $this->input->post('sebagai'),
				'perkenalan' => $this->input->post('perkenalan'),
				'periksa' => $this->input->post('periksa'),
				'penunjang' => $this->input->post('penunjang'),
				'konsul' => $this->input->post('konsul'),
				'terapi' => $this->input->post('terapi'),
				'harapan' => $this->input->post('harapan'),
				'pertanyaan' => $this->input->post('pertanyaan'),
				'salam' => $this->input->post('salam'),
				'ttd' => $file,
				'ttd1' => $file1,
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			// $data2= array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_ranap->insert($data, 'lembar_evaluasi_dpjp');
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'konsul' => form_error('konsul'),
				'harapan' => form_error('harapan'),
				'terapi' => form_error('terapi'),
				'pertanyaan' => form_error('pertanyaan'),
				'penunjang' => form_error('penunjang'),
				'periksa' => form_error('periksa'),
				'salam' => form_error('salam'),
				'perkenalan' => form_error('perkenalan'),
				'waktu_evaluasi' => form_error('waktu_evaluasi'),
			);
		}
		echo json_encode($out);
	}
	public function update_evaluasi()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$id = $this->input->post('id');
		$img = $this->input->post('ttd');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = "assets/images/" . uniqid(time(), true) . ".png";
		$success = file_put_contents($file, $data);
		$img1 = $this->input->post('ttd1');
		$img1 = str_replace('data:image/png;base64,', '', $img1);
		$img1 = str_replace(' ', '+', $img1);
		$data1 = base64_decode($img1);
		$file1 = "assets/images/" . uniqid(time(), true) . ".png";
		$success1 = file_put_contents($file1, $data1);
		$this->form_validation->set_rules('harapan', 'Harapan', 'required');
		$this->form_validation->set_rules('terapi', 'Terapi', 'required');
		$this->form_validation->set_rules('konsul', 'Konsul', 'required');
		$this->form_validation->set_rules('penunjang', 'Penunjang', 'required');
		$this->form_validation->set_rules('periksa', 'Periksa', 'required');
		$this->form_validation->set_rules('salam', 'Salam', 'required');
		$this->form_validation->set_rules('perkenalan', 'Perkenalan', 'required');
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
		$this->form_validation->set_rules('waktu_evaluasi', 'Waktu Evaluasi', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'nama_dokter' => $this->input->post('nama_dokter'),
				'waktu_evaluasi' => $this->input->post('waktu_evaluasi'),
				'sebagai' => $this->input->post('sebagai'),
				'perkenalan' => $this->input->post('perkenalan'),
				'periksa' => $this->input->post('periksa'),
				'penunjang' => $this->input->post('penunjang'),
				'konsul' => $this->input->post('konsul'),
				'terapi' => $this->input->post('terapi'),
				'harapan' => $this->input->post('harapan'),
				'pertanyaan' => $this->input->post('pertanyaan'),
				'salam' => $this->input->post('salam'),
				'ttd' => $file,
				'ttd1' => $file1,
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			$this->M_Erm_ranap->update_evaluasi($id,$data);
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'konsul' => form_error('konsul'),
				'harapan' => form_error('harapan'),
				'terapi' => form_error('terapi'),
				'pertanyaan' => form_error('pertanyaan'),
				'penunjang' => form_error('penunjang'),
				'periksa' => form_error('periksa'),
				'salam' => form_error('salam'),
				'perkenalan' => form_error('perkenalan'),
				'waktu_evaluasi' => form_error('waktu_evaluasi'),
			);
		}
		echo json_encode($out);
	}
	public function get_ass_per()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('lembar_evaluasi_dpjp', ['id_history' => $id])->row_array();
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
?>