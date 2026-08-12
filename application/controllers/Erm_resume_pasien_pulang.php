<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_resume_pasien_pulang extends CI_Controller
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
	}

	public function simpan()
	{
		$staff = $this->session->userdata('data_auth');
		$id = $this->input->post('id_pelayanan');
		$db = $this->db->query("SELECT count(*) count from resume_pasien_pulang where id_pelayanan ='$id'")->row();
		if ($db->count == 0) {
			$db = [
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'riw_kel' => $this->input->post('riw_kel'),
				'pem_fisik' => $this->input->post('pem_fisik'),
				'has_pem_pen' => $this->input->post('has_pem_pen'),
				'diag_seku' => $this->input->post('diag_seku'),
				'por_terapi' => $this->input->post('por_terapi'),
				'ter_obat' => $this->input->post('ter_obat'),
				'kead_pasien' => $this->input->post('kead_pasien'),
				'edu_diberi' => $this->input->post('edu_diberi'),
				'tanggal' => $this->input->post('tanggal'),
				'pukul' => $this->input->post('pukul'),
				'staff' => $staff->id_staff,
			];
			$this->M_Resume_pasien_pulang->formopedit($db, 'resume_pasien_pulang');
		} else {
			$db = [
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'riw_kel' => $this->input->post('riw_kel'),
				'pem_fisik' => $this->input->post('pem_fisik'),
				'has_pem_pen' => $this->input->post('has_pem_pen'),
				'diag_seku' => $this->input->post('diag_seku'),
				'por_terapi' => $this->input->post('por_terapi'),
				'ter_obat' => $this->input->post('ter_obat'),
				'kead_pasien' => $this->input->post('kead_pasien'),
				'edu_diberi' => $this->input->post('edu_diberi'),
				'tanggal' => $this->input->post('tanggal'),
				'pukul' => $this->input->post('pukul'),
				
			];
			$where = array('id_pelayanan' => $this->input->post('id_pelayanan'));
			$this->M_Resume_pasien_pulang->formopedit($db, $where, 'form_laporan');
		}
		$out['status'] = "success";
		echo json_encode($out);
	}


	public function formresumepasienpulang($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['nama_ruangan'] = $selectPasien->nama_ruangan;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['kelas'] = $selectPasien->kelas;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['alamat'] = $selectPasien->alamat;
		$page_data['status'] = $selectPasien->perkawinan;
		$page_data['nama_dokter'] = $selectPasien->nama_dokter;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['keluar_kamar'] = $selectPasien->keluar_kamar;
		$page_data['diagnosa_utama'] = $this->db->get_where("diagnosa_utama", ["id_history" => $id_history])->row();
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $selectPasien->diagnosa;
		// $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_resume_pasien_pulang';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function store()
	{
		$this->load->model('M_Resume_pasien_pulang');
		$id_pelayanan = $this->input->post('id_pelayanan');
		$existing_data = $this->M_Resume_pasien_pulang->CekId($id_pelayanan);
		// Menangani pengiriman data dari form ke database
		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'riw_kel' => $this->input->post('riw_kel'),
			'pem_fisik' => $this->input->post('pem_fisik'),
			'has_pem_pen' => $this->input->post('has_pem_pen'),
			'diag_seku' => $this->input->post('diag_seku'),
			'por_terapi' => $this->input->post('por_terapi'),
			'ter_obat' => $this->input->post('ter_obat'),
			'kead_pasien' => $this->input->post('kead_pasien'),
			'edu_diberi' => $this->input->post('edu_diberi'),
			'tanggal' => $this->input->post('tanggal'),
			'pukul' => $this->input->post('pukul'),
	);
	if ($existing_data) {
		// Data sudah ada, gunakan perintah update
		$this->M_Resume_pasien_pulang->formopedit($id_pelayanan, $data);
	} else {
		// Data belum ada, gunakan perintah insert
		$this->M_Resume_pasien_pulang->insert_data($data);
	}
	$out['status'] = "success";
	echo json_encode($out);

}

public function print_out($id_pelayanan, $id_history)
	{
		// $data['data'] = $this->M_laporan_operasi_model->getData($id_pelayanan);
        $data['data'] = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $data['resume_pasien_pulang'] = $this->db->get_where("resume_pasien_pulang", ["id_pelayanan" => $id_pelayanan])->row();
        // $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		 // $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		 $data['diagnosa_utama'] = $this->db->get_where("diagnosa_utama", ["id_history" => $id_history])->row();
		$this->load->view('erm_ranap_print/view_resume_pasien_pulang_print', $data);
		
        
	}


	public function formopedit($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $staff = $this->session->userdata('data_auth');
		$page_data['resume_pasien_pulang'] = $this->db->get_where("resume_pasien_pulang", ["id_pelayanan" => $id_pelayanan])->row_array();
        $page_data['nama'] = $selectPasien->nama;
		$page_data['nama_ruangan'] = $selectPasien->nama_ruangan;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['kelas'] = $selectPasien->kelas;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['alamat'] = $selectPasien->alamat;
		$page_data['status'] = $selectPasien->perkawinan;
		$page_data['nama_dokter'] = $selectPasien->nama_dokter;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['keluar_kamar'] = $selectPasien->keluar_kamar;
		$page_data['diagnosa_utama'] = $this->db->get_where("diagnosa_utama", ["id_history" => $id_history])->row();
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $selectPasien->diagnosa;

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_edit/view_resume_pasien_pulang';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

	public function edit_resume_pasien_pulang($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$selectPasien2 = $this->M_Erm_ranap->selectPasienPulang($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['jenis_persalinan'] = $selectPasien2->jenis_persalinan;
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
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap_Edit/view_resume_pasien_pulang';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function insert_pasien_pulang()
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
		$this->form_validation->set_rules('catatan', 'Catatan', 'required');
		$this->form_validation->set_rules('alasan', 'Alasan', 'required');
		$this->form_validation->set_rules('sectio', 'Sectio', 'required');
		$this->form_validation->set_rules('pervagina', 'Pervagina', 'required');
		$this->form_validation->set_rules('jenis_persalinan', 'Jenis Persalinan', 'required');
		$this->form_validation->set_rules('rawat_gabung', 'Waktu Mulai', 'required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'no_rm' => $this->input->post('no_rm'),
				'pervagina' => $this->input->post('pervagina'),
				'caesaria' => $this->input->post('sectio'),
				'jenis_persalinan' => $this->input->post('jenis_persalinan'),
				'waktu_mulai' => $this->input->post('rawat_gabung'),
				'alasan' => $this->input->post('alasan'),
				'catatan' => $this->input->post('catatan'),
				'ttd' => $file,
				'ttd1' => $file1,
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_ranap->insert($data, 'resume_pasien_pulang');
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'nama_ibu' => form_error('nama_ibu'),
				'waktu_mulai' => form_error('waktu_mulai'),
				'jenis_persalinan' => form_error('jenis_persalinan'),
				'sectio' => form_error('sectio'),
				'rawat_gabung' => form_error('rawat_gabung'),
				'alasan' => form_error('alasan'),
				'pervagina' => form_error('pervagina'),
				'catatan' => form_error('catatan'),
			);
		}
		echo json_encode($out);
	}
	public function get_ass_per()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('resume_pasien_pulang', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function tampil_list_diagnosa_ranap()
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
		$page_data = $this->db->query("SELECT * from diagnosa_utama where id_history='$id_pelayanan'")->result();

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
	public function update_pasien_pulang()
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
		$this->form_validation->set_rules('catatan', 'Catatan', 'required');
		$this->form_validation->set_rules('alasan', 'Alasan', 'required');
		$this->form_validation->set_rules('sectio', 'Sectio', 'required');
		$this->form_validation->set_rules('pervagina', 'Pervagina', 'required');
		$this->form_validation->set_rules('jenis_persalinan', 'Jenis Persalinan', 'required');
		$this->form_validation->set_rules('rawat_gabung', 'Waktu Mulai', 'required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'no_rm' => $this->input->post('no_rm'),
				'pervagina' => $this->input->post('pervagina'),
				'caesaria' => $this->input->post('sectio'),
				'jenis_persalinan' => $this->input->post('jenis_persalinan'),
				'waktu_mulai' => $this->input->post('rawat_gabung'),
				'alasan' => $this->input->post('alasan'),
				'catatan' => $this->input->post('catatan'),
				'ttd' => $file,
				'ttd1' => $file1,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm_ranap->update_pasien_pulang($id, $data);
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'nama_ibu' => form_error('nama_ibu'),
				'waktu_mulai' => form_error('waktu_mulai'),
				'jenis_persalinan' => form_error('jenis_persalinan'),
				'sectio' => form_error('sectio'),
				'rawat_gabung' => form_error('rawat_gabung'),
				'alasan' => form_error('alasan'),
				'pervagina' => form_error('pervagina'),
				'catatan' => form_error('catatan'),
			);
		}
		echo json_encode($out);
	}
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_resume_pasien_pulang extends CI_Controller
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
	}

	public function simpan()
	{
		$staff = $this->session->userdata('data_auth');
		$id = $this->input->post('id_pelayanan');
		$db = $this->db->query("SELECT count(*) count from resume_pasien_pulang where id_pelayanan ='$id'")->row();
		if ($db->count == 0) {
			$db = [
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'riw_kel' => $this->input->post('riw_kel'),
				'pem_fisik' => $this->input->post('pem_fisik'),
				'has_pem_pen' => $this->input->post('has_pem_pen'),
				'diag_seku' => $this->input->post('diag_seku'),
				'por_terapi' => $this->input->post('por_terapi'),
				'ter_obat' => $this->input->post('ter_obat'),
				'kead_pasien' => $this->input->post('kead_pasien'),
				'edu_diberi' => $this->input->post('edu_diberi'),
				'tanggal' => $this->input->post('tanggal'),
				'pukul' => $this->input->post('pukul'),
				'staff' => $staff->id_staff,
			];
			$this->M_Resume_pasien_pulang->formopedit($db, 'resume_pasien_pulang');
		} else {
			$db = [
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'riw_kel' => $this->input->post('riw_kel'),
				'pem_fisik' => $this->input->post('pem_fisik'),
				'has_pem_pen' => $this->input->post('has_pem_pen'),
				'diag_seku' => $this->input->post('diag_seku'),
				'por_terapi' => $this->input->post('por_terapi'),
				'ter_obat' => $this->input->post('ter_obat'),
				'kead_pasien' => $this->input->post('kead_pasien'),
				'edu_diberi' => $this->input->post('edu_diberi'),
				'tanggal' => $this->input->post('tanggal'),
				'pukul' => $this->input->post('pukul'),
				
			];
			$where = array('id_pelayanan' => $this->input->post('id_pelayanan'));
			$this->M_Resume_pasien_pulang->formopedit($db, $where, 'form_laporan');
		}
		$out['status'] = "success";
		echo json_encode($out);
	}


	public function formresumepasienpulang($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['nama_ruangan'] = $selectPasien->nama_ruangan;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['kelas'] = $selectPasien->kelas;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['alamat'] = $selectPasien->alamat;
		$page_data['status'] = $selectPasien->perkawinan;
		$page_data['nama_dokter'] = $selectPasien->nama_dokter;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['keluar_kamar'] = $selectPasien->keluar_kamar;
		$page_data['diagnosa_utama'] = $this->db->get_where("diagnosa_utama", ["id_history" => $id_history])->row();
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $selectPasien->diagnosa;
		// $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_resume_pasien_pulang';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function store()
	{
		$this->load->model('M_Resume_pasien_pulang');
		$id_pelayanan = $this->input->post('id_pelayanan');
		$existing_data = $this->M_Resume_pasien_pulang->CekId($id_pelayanan);
		// Menangani pengiriman data dari form ke database
		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'riw_kel' => $this->input->post('riw_kel'),
			'pem_fisik' => $this->input->post('pem_fisik'),
			'has_pem_pen' => $this->input->post('has_pem_pen'),
			'diag_seku' => $this->input->post('diag_seku'),
			'por_terapi' => $this->input->post('por_terapi'),
			'ter_obat' => $this->input->post('ter_obat'),
			'kead_pasien' => $this->input->post('kead_pasien'),
			'edu_diberi' => $this->input->post('edu_diberi'),
			'tanggal' => $this->input->post('tanggal'),
			'pukul' => $this->input->post('pukul'),
	);
	if ($existing_data) {
		// Data sudah ada, gunakan perintah update
		$this->M_Resume_pasien_pulang->formopedit($id_pelayanan, $data);
	} else {
		// Data belum ada, gunakan perintah insert
		$this->M_Resume_pasien_pulang->insert_data($data);
	}
	$out['status'] = "success";
	echo json_encode($out);

}

public function print_out($id_pelayanan, $id_history)
	{
		// $data['data'] = $this->M_laporan_operasi_model->getData($id_pelayanan);
        $data['data'] = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $data['resume_pasien_pulang'] = $this->db->get_where("resume_pasien_pulang", ["id_pelayanan" => $id_pelayanan])->row();
        // $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		 // $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		 $data['diagnosa_utama'] = $this->db->get_where("diagnosa_utama", ["id_history" => $id_history])->row();
		$this->load->view('erm_ranap_print/view_resume_pasien_pulang_print', $data);
		
        
	}


	public function formopedit($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $staff = $this->session->userdata('data_auth');
		$page_data['resume_pasien_pulang'] = $this->db->get_where("resume_pasien_pulang", ["id_pelayanan" => $id_pelayanan])->row_array();
        $page_data['nama'] = $selectPasien->nama;
		$page_data['nama_ruangan'] = $selectPasien->nama_ruangan;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['kelas'] = $selectPasien->kelas;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['alamat'] = $selectPasien->alamat;
		$page_data['status'] = $selectPasien->perkawinan;
		$page_data['nama_dokter'] = $selectPasien->nama_dokter;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['keluar_kamar'] = $selectPasien->keluar_kamar;
		$page_data['diagnosa_utama'] = $this->db->get_where("diagnosa_utama", ["id_history" => $id_history])->row();
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $selectPasien->diagnosa;

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_edit/view_resume_pasien_pulang';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

	public function edit_resume_pasien_pulang($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$selectPasien2 = $this->M_Erm_ranap->selectPasienPulang($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['jenis_persalinan'] = $selectPasien2->jenis_persalinan;
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
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap_Edit/view_resume_pasien_pulang';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function insert_pasien_pulang()
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
		$this->form_validation->set_rules('catatan', 'Catatan', 'required');
		$this->form_validation->set_rules('alasan', 'Alasan', 'required');
		$this->form_validation->set_rules('sectio', 'Sectio', 'required');
		$this->form_validation->set_rules('pervagina', 'Pervagina', 'required');
		$this->form_validation->set_rules('jenis_persalinan', 'Jenis Persalinan', 'required');
		$this->form_validation->set_rules('rawat_gabung', 'Waktu Mulai', 'required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'no_rm' => $this->input->post('no_rm'),
				'pervagina' => $this->input->post('pervagina'),
				'caesaria' => $this->input->post('sectio'),
				'jenis_persalinan' => $this->input->post('jenis_persalinan'),
				'waktu_mulai' => $this->input->post('rawat_gabung'),
				'alasan' => $this->input->post('alasan'),
				'catatan' => $this->input->post('catatan'),
				'ttd' => $file,
				'ttd1' => $file1,
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_ranap->insert($data, 'resume_pasien_pulang');
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'nama_ibu' => form_error('nama_ibu'),
				'waktu_mulai' => form_error('waktu_mulai'),
				'jenis_persalinan' => form_error('jenis_persalinan'),
				'sectio' => form_error('sectio'),
				'rawat_gabung' => form_error('rawat_gabung'),
				'alasan' => form_error('alasan'),
				'pervagina' => form_error('pervagina'),
				'catatan' => form_error('catatan'),
			);
		}
		echo json_encode($out);
	}
	public function get_ass_per()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('resume_pasien_pulang', ['id_history' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}
	public function tampil_list_diagnosa_ranap()
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
		$page_data = $this->db->query("SELECT * from diagnosa_utama where id_history='$id_pelayanan'")->result();

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
	public function update_pasien_pulang()
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
		$this->form_validation->set_rules('catatan', 'Catatan', 'required');
		$this->form_validation->set_rules('alasan', 'Alasan', 'required');
		$this->form_validation->set_rules('sectio', 'Sectio', 'required');
		$this->form_validation->set_rules('pervagina', 'Pervagina', 'required');
		$this->form_validation->set_rules('jenis_persalinan', 'Jenis Persalinan', 'required');
		$this->form_validation->set_rules('rawat_gabung', 'Waktu Mulai', 'required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'no_rm' => $this->input->post('no_rm'),
				'pervagina' => $this->input->post('pervagina'),
				'caesaria' => $this->input->post('sectio'),
				'jenis_persalinan' => $this->input->post('jenis_persalinan'),
				'waktu_mulai' => $this->input->post('rawat_gabung'),
				'alasan' => $this->input->post('alasan'),
				'catatan' => $this->input->post('catatan'),
				'ttd' => $file,
				'ttd1' => $file1,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm_ranap->update_pasien_pulang($id, $data);
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'nama_ibu' => form_error('nama_ibu'),
				'waktu_mulai' => form_error('waktu_mulai'),
				'jenis_persalinan' => form_error('jenis_persalinan'),
				'sectio' => form_error('sectio'),
				'rawat_gabung' => form_error('rawat_gabung'),
				'alasan' => form_error('alasan'),
				'pervagina' => form_error('pervagina'),
				'catatan' => form_error('catatan'),
			);
		}
		echo json_encode($out);
	}
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
