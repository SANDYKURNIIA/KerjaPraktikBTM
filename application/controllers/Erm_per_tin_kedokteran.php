<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_per_tin_kedokteran extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm');
		$this->load->model('M_Erm_poli');
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
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['dpjp'] = $selectPasien->nama_dokter;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/persetujuan_tindakan_dokter_igd';
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
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['dpjp'] = $selectPasien->nama_dokter;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/persetujuan_tindakan_dokter_igd';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	////////////////////////////////RAJAL///////////////////////////
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
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['dpjp'] = $selectPasien->nama_dokter;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/persetujuan_tindakan_dokter_igd';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function tampil_list_per_tindakan_dokter()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm->selectPerTindakanDok($id_pelayanan);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_form_persetujuan_tindakan_dokter . "\")' '><i class='icon-rocket'></i></button>";

			$time = strtotime($page_data[$i]->tgl_masuk);
			$date2 = strftime("%A, %d %B %Y ", $time);
			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal);

			$out[$i] = array($no, $tombol, $date2, $date);
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
	public function getPerTindakanDok()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_persetujuan_tindakan_dokter', ['id_form_persetujuan_tindakan_dokter' => $id])->row_array();
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
	public function insert_persetujuan_tindakan()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$img = $this->input->post('ttd');
		if ($img != '') {
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = "assets/images/" . uniqid(time(), true) . ".png";
			$success = file_put_contents($file, $data);
		} else {
			$file = '';
		}

		$img1 = $this->input->post('ttd1');
		if ($img1 != '') {
			$img1 = str_replace('data:image/png;base64,', '', $img1);
			$img1 = str_replace(' ', '+', $img1);
			$data1 = base64_decode($img1);
			$file1 = "assets/images/" . uniqid(time(), true) . ".png";
			$success1 = file_put_contents($file1, $data1);
		} else {
			$file1 = '';
		}

		$img2 = $this->input->post('ttd2');
		if ($img2 != '') {
			$img2 = str_replace('data:image/png;base64,', '', $img2);
			$img2 = str_replace(' ', '+', $img2);
			$data2 = base64_decode($img2);
			$file2 = "assets/images/" . uniqid(time(), true) . ".png";
			$success2 = file_put_contents($file2, $data2);
		} else {
			$file2 = '';
		}
		
		$this->form_validation->set_rules('pemberi_info', 'Pemberi Info', 'required');
		$this->form_validation->set_rules('penerima_info', 'Penerima Info', 'required');
		$this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
		$this->form_validation->set_rules('td_diagnosis', 'Tanda Diagnosis', 'required');
		$this->form_validation->set_rules('diagnosis_d', 'Diagnosis', 'required');
		$this->form_validation->set_rules('td_diagnosis_d', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('tindakan', 'GCS', 'required');
		$this->form_validation->set_rules('td_tindakan', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('indikasi', 'GCS', 'required');
		$this->form_validation->set_rules('td_indikasi', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('tatacara', 'GCS', 'required');
		$this->form_validation->set_rules('td_tatacara', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('tujuan', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('td_tujuan', 'Suhu', 'required');
		$this->form_validation->set_rules('risiko', 'SPo2', 'required');
		$this->form_validation->set_rules('td_risiko', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('prognosis', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('td_prognosis', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('alt_risiko', 'GCS', 'required');
		$this->form_validation->set_rules('td_alt_risiko', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('alt_risiko', 'GCS', 'required');
		$this->form_validation->set_rules('td_alt_risiko', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('hal_lain', 'GCS', 'required');
		$this->form_validation->set_rules('td_hal_lain', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('ttd_pemberi_info', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('ttd_penerima_info', 'Suhu', 'required');
		$this->form_validation->set_rules('nama', 'SPo2', 'required');
		$this->form_validation->set_rules('umur', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('alamat', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('jk', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('tolak_tindakan', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('ghubungan', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('tgl_tindakan', 'Asal Rujuk', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'pemberi_info' => $this->input->post('pemberi_info'),
				'penerima_info' => $this->input->post('penerima_info'),
				'diagnosis' => $this->input->post('diagnosis'),
				'td_diagnosis' => $this->input->post('td_diagnosis'),
				'diagnosis_d' => $this->input->post('diagnosis_d'),
				'td_diagnosis_d' => $this->input->post('td_diagnosis_d'),
				'tindakan' => $this->input->post('tindakan'),
				'td_tindakan' => $this->input->post('td_tindakan'),
				'indikasi' => $this->input->post('indikasi'),
				'td_indikasi' => $this->input->post('td_indikasi'),
				'tatacara' => $this->input->post('tatacara'),
				'td_tatacara' => $this->input->post('td_tatacara'),
				'tujuan' => $this->input->post('tujuan'),
				'td_tujuan' => $this->input->post('td_tujuan'),
				'risiko' => $this->input->post('risiko'),
				'td_risiko' => $this->input->post('td_risiko'),
				'prognosis' => $this->input->post('prognosis'),
				'td_prognosis' => $this->input->post('td_prognosis'),
				'alt_risiko' => $this->input->post('alt_risiko'),
				'td_alt_risiko' => $this->input->post('td_alt_risiko'),
				'hal_lain' => $this->input->post('hal_lain'),
				'td_hal_lain' => $this->input->post('td_hal_lain'),
				'ttd_pemberi_info' => $this->input->post('ttd_pemberi_info'),
				'ttd_penerima_info' => $this->input->post('ttd_penerima_info'),
				'nama' => $this->input->post('nama'),
				'umur' => $this->input->post('umur'),
				'alamat' => $this->input->post('alamat'),
				'jk' => $this->input->post('jk'),
				'ghubungan' => $this->input->post('ghubungan'),
				'tolak_tindakan' => $this->input->post('tolak_tindakan'),
				'tgl_tindakan' => $this->input->post('tgl_tindakan'),
				'ttd' => $file,
				'ttd1' => $file1,
				'ttd2' => $file2,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_persetujuan_tindakan_dokter');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'pemberi_info' => form_error('pemberi_info'),
				'penerima_info' => form_error('penerima_info'),
				'diagnosis' => form_error('diagnosis'),
				'td_diagnosis' => form_error('td_diagnosis'),
				'diagnosis_d' => form_error('diagnosis_d'),
				'td_diagnosis_d' => form_error('td_diagnosis_d'),
				'tindakan' => form_error('tindakan'),
				'td_tindakan' => form_error('td_tindakan'),
				'indikasi' => form_error('indikasi'),
				'td_indikasi' => form_error('td_indikasi'),
				'tatacara' => form_error('tatacara'),
				'td_tatacara' => form_error('td_tatacara'),
				'tujuan' => form_error('tujuan'),
				'td_tujuan' => form_error('td_tujuan'),
				'risiko' => form_error('risiko'),
				'td_risiko' => form_error('td_risiko'),
				'prognosis' => form_error('prognosis'),
				'td_prognosis' => form_error('td_prognosis'),
				'alt_risiko' => form_error('alt_risiko'),
				'td_alt_risiko' => form_error('td_alt_risiko'),
				'hal_lain' => form_error('hal_lain'),
				'td_hal_lain' => form_error('td_hal_lain'),
				'ttd_pemberi_info' => form_error('ttd_pemberi_info'),
				'ttd_penerima_info' => form_error('ttd_penerima_info'),
				'nama' => form_error('nama'),
				'umur' => form_error('umur'),
				'alamat' => form_error('alamat'),
				'jk' => form_error('jk'),
				'ghubungan' => form_error('ghubungan'),
				'tolak_tindakan' => form_error('tolak_tindakan'),
				'tgl_tindakan' => form_error('tgl_tindakan'),
			);
		}
		echo json_encode($out);
	}
	public function edit_persetujuan_tindakan()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
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
		$img2 = $this->input->post('ttd2');
		$img2 = str_replace('data:image/png;base64,', '', $img2);
		$img2 = str_replace(' ', '+', $img2);
		$data2 = base64_decode($img2);
		$file2 = "assets/images/" . uniqid(time(), true) . ".png";
		$success2 = file_put_contents($file2, $data2);

		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'pemberi_info' => $this->input->post('pemberi_info'),
			'penerima_info' => $this->input->post('penerima_info'),
			'diagnosis' => $this->input->post('diagnosis'),
			'td_diagnosis' => $this->input->post('td_diagnosis'),
			'diagnosis_d' => $this->input->post('diagnosis_d'),
			'td_diagnosis_d' => $this->input->post('td_diagnosis_d'),
			'tindakan' => $this->input->post('tindakan'),
			'td_tindakan' => $this->input->post('td_tindakan'),
			'indikasi' => $this->input->post('indikasi'),
			'td_indikasi' => $this->input->post('td_indikasi'),
			'tatacara' => $this->input->post('tatacara'),
			'td_tatacara' => $this->input->post('td_tatacara'),
			'tujuan' => $this->input->post('tujuan'),
			'td_tujuan' => $this->input->post('td_tujuan'),
			'risiko' => $this->input->post('risiko'),
			'td_risiko' => $this->input->post('td_risiko'),
			'prognosis' => $this->input->post('prognosis'),
			'td_prognosis' => $this->input->post('td_prognosis'),
			'alt_risiko' => $this->input->post('alt_risiko'),
			'td_alt_risiko' => $this->input->post('td_alt_risiko'),
			'hal_lain' => $this->input->post('hal_lain'),
			'td_hal_lain' => $this->input->post('td_hal_lain'),
			'ttd_pemberi_info' => $this->input->post('ttd_pemberi_info'),
			'ttd_penerima_info' => $this->input->post('ttd_penerima_info'),
			'nama' => $this->input->post('nama'),
			'umur' => $this->input->post('umur'),
			'alamat' => $this->input->post('alamat'),
			'jk' => $this->input->post('jk'),
			'ghubungan' => $this->input->post('ghubungan'),
			'tolak_tindakan' => $this->input->post('tolak_tindakan'),
			'tgl_tindakan' => $this->input->post('tgl_tindakan'),
			'ttd' => $file,
			'ttd1' => $file1,
			'ttd2' => $file2,
			'tanggal' => $tgl,
			'staff' => $staff,
		);
		$where = array(
			'id_form_persetujuan_tindakan_dokter' => $this->input->post('id')
		);

		$this->M_Erm->update($data,$where, 'form_persetujuan_tindakan_dokter');
		$out['status'] = "success";

		echo json_encode($out);
	}
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_per_tin_kedokteran extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm');
		$this->load->model('M_Erm_poli');
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
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['dpjp'] = $selectPasien->nama_dokter;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/persetujuan_tindakan_dokter_igd';
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
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['dpjp'] = $selectPasien->nama_dokter;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/persetujuan_tindakan_dokter_igd';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	////////////////////////////////RAJAL///////////////////////////
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
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['dpjp'] = $selectPasien->nama_dokter;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/persetujuan_tindakan_dokter_igd';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function tampil_list_per_tindakan_dokter()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm->selectPerTindakanDok($id_pelayanan);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_form_persetujuan_tindakan_dokter . "\")' '><i class='icon-rocket'></i></button>";

			$time = strtotime($page_data[$i]->tgl_masuk);
			$date2 = strftime("%A, %d %B %Y ", $time);
			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal);

			$out[$i] = array($no, $tombol, $date2, $date);
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
	public function getPerTindakanDok()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_persetujuan_tindakan_dokter', ['id_form_persetujuan_tindakan_dokter' => $id])->row_array();
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
	public function insert_persetujuan_tindakan()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$img = $this->input->post('ttd');
		if ($img != '') {
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = "assets/images/" . uniqid(time(), true) . ".png";
			$success = file_put_contents($file, $data);
		} else {
			$file = '';
		}

		$img1 = $this->input->post('ttd1');
		if ($img1 != '') {
			$img1 = str_replace('data:image/png;base64,', '', $img1);
			$img1 = str_replace(' ', '+', $img1);
			$data1 = base64_decode($img1);
			$file1 = "assets/images/" . uniqid(time(), true) . ".png";
			$success1 = file_put_contents($file1, $data1);
		} else {
			$file1 = '';
		}

		$img2 = $this->input->post('ttd2');
		if ($img2 != '') {
			$img2 = str_replace('data:image/png;base64,', '', $img2);
			$img2 = str_replace(' ', '+', $img2);
			$data2 = base64_decode($img2);
			$file2 = "assets/images/" . uniqid(time(), true) . ".png";
			$success2 = file_put_contents($file2, $data2);
		} else {
			$file2 = '';
		}
		
		$this->form_validation->set_rules('pemberi_info', 'Pemberi Info', 'required');
		$this->form_validation->set_rules('penerima_info', 'Penerima Info', 'required');
		$this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
		$this->form_validation->set_rules('td_diagnosis', 'Tanda Diagnosis', 'required');
		$this->form_validation->set_rules('diagnosis_d', 'Diagnosis', 'required');
		$this->form_validation->set_rules('td_diagnosis_d', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('tindakan', 'GCS', 'required');
		$this->form_validation->set_rules('td_tindakan', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('indikasi', 'GCS', 'required');
		$this->form_validation->set_rules('td_indikasi', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('tatacara', 'GCS', 'required');
		$this->form_validation->set_rules('td_tatacara', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('tujuan', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('td_tujuan', 'Suhu', 'required');
		$this->form_validation->set_rules('risiko', 'SPo2', 'required');
		$this->form_validation->set_rules('td_risiko', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('prognosis', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('td_prognosis', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('alt_risiko', 'GCS', 'required');
		$this->form_validation->set_rules('td_alt_risiko', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('alt_risiko', 'GCS', 'required');
		$this->form_validation->set_rules('td_alt_risiko', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('hal_lain', 'GCS', 'required');
		$this->form_validation->set_rules('td_hal_lain', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('ttd_pemberi_info', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('ttd_penerima_info', 'Suhu', 'required');
		$this->form_validation->set_rules('nama', 'SPo2', 'required');
		$this->form_validation->set_rules('umur', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('alamat', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('jk', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('tolak_tindakan', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('ghubungan', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('tgl_tindakan', 'Asal Rujuk', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'pemberi_info' => $this->input->post('pemberi_info'),
				'penerima_info' => $this->input->post('penerima_info'),
				'diagnosis' => $this->input->post('diagnosis'),
				'td_diagnosis' => $this->input->post('td_diagnosis'),
				'diagnosis_d' => $this->input->post('diagnosis_d'),
				'td_diagnosis_d' => $this->input->post('td_diagnosis_d'),
				'tindakan' => $this->input->post('tindakan'),
				'td_tindakan' => $this->input->post('td_tindakan'),
				'indikasi' => $this->input->post('indikasi'),
				'td_indikasi' => $this->input->post('td_indikasi'),
				'tatacara' => $this->input->post('tatacara'),
				'td_tatacara' => $this->input->post('td_tatacara'),
				'tujuan' => $this->input->post('tujuan'),
				'td_tujuan' => $this->input->post('td_tujuan'),
				'risiko' => $this->input->post('risiko'),
				'td_risiko' => $this->input->post('td_risiko'),
				'prognosis' => $this->input->post('prognosis'),
				'td_prognosis' => $this->input->post('td_prognosis'),
				'alt_risiko' => $this->input->post('alt_risiko'),
				'td_alt_risiko' => $this->input->post('td_alt_risiko'),
				'hal_lain' => $this->input->post('hal_lain'),
				'td_hal_lain' => $this->input->post('td_hal_lain'),
				'ttd_pemberi_info' => $this->input->post('ttd_pemberi_info'),
				'ttd_penerima_info' => $this->input->post('ttd_penerima_info'),
				'nama' => $this->input->post('nama'),
				'umur' => $this->input->post('umur'),
				'alamat' => $this->input->post('alamat'),
				'jk' => $this->input->post('jk'),
				'ghubungan' => $this->input->post('ghubungan'),
				'tolak_tindakan' => $this->input->post('tolak_tindakan'),
				'tgl_tindakan' => $this->input->post('tgl_tindakan'),
				'ttd' => $file,
				'ttd1' => $file1,
				'ttd2' => $file2,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_persetujuan_tindakan_dokter');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'pemberi_info' => form_error('pemberi_info'),
				'penerima_info' => form_error('penerima_info'),
				'diagnosis' => form_error('diagnosis'),
				'td_diagnosis' => form_error('td_diagnosis'),
				'diagnosis_d' => form_error('diagnosis_d'),
				'td_diagnosis_d' => form_error('td_diagnosis_d'),
				'tindakan' => form_error('tindakan'),
				'td_tindakan' => form_error('td_tindakan'),
				'indikasi' => form_error('indikasi'),
				'td_indikasi' => form_error('td_indikasi'),
				'tatacara' => form_error('tatacara'),
				'td_tatacara' => form_error('td_tatacara'),
				'tujuan' => form_error('tujuan'),
				'td_tujuan' => form_error('td_tujuan'),
				'risiko' => form_error('risiko'),
				'td_risiko' => form_error('td_risiko'),
				'prognosis' => form_error('prognosis'),
				'td_prognosis' => form_error('td_prognosis'),
				'alt_risiko' => form_error('alt_risiko'),
				'td_alt_risiko' => form_error('td_alt_risiko'),
				'hal_lain' => form_error('hal_lain'),
				'td_hal_lain' => form_error('td_hal_lain'),
				'ttd_pemberi_info' => form_error('ttd_pemberi_info'),
				'ttd_penerima_info' => form_error('ttd_penerima_info'),
				'nama' => form_error('nama'),
				'umur' => form_error('umur'),
				'alamat' => form_error('alamat'),
				'jk' => form_error('jk'),
				'ghubungan' => form_error('ghubungan'),
				'tolak_tindakan' => form_error('tolak_tindakan'),
				'tgl_tindakan' => form_error('tgl_tindakan'),
			);
		}
		echo json_encode($out);
	}
	public function edit_persetujuan_tindakan()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
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
		$img2 = $this->input->post('ttd2');
		$img2 = str_replace('data:image/png;base64,', '', $img2);
		$img2 = str_replace(' ', '+', $img2);
		$data2 = base64_decode($img2);
		$file2 = "assets/images/" . uniqid(time(), true) . ".png";
		$success2 = file_put_contents($file2, $data2);

		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'pemberi_info' => $this->input->post('pemberi_info'),
			'penerima_info' => $this->input->post('penerima_info'),
			'diagnosis' => $this->input->post('diagnosis'),
			'td_diagnosis' => $this->input->post('td_diagnosis'),
			'diagnosis_d' => $this->input->post('diagnosis_d'),
			'td_diagnosis_d' => $this->input->post('td_diagnosis_d'),
			'tindakan' => $this->input->post('tindakan'),
			'td_tindakan' => $this->input->post('td_tindakan'),
			'indikasi' => $this->input->post('indikasi'),
			'td_indikasi' => $this->input->post('td_indikasi'),
			'tatacara' => $this->input->post('tatacara'),
			'td_tatacara' => $this->input->post('td_tatacara'),
			'tujuan' => $this->input->post('tujuan'),
			'td_tujuan' => $this->input->post('td_tujuan'),
			'risiko' => $this->input->post('risiko'),
			'td_risiko' => $this->input->post('td_risiko'),
			'prognosis' => $this->input->post('prognosis'),
			'td_prognosis' => $this->input->post('td_prognosis'),
			'alt_risiko' => $this->input->post('alt_risiko'),
			'td_alt_risiko' => $this->input->post('td_alt_risiko'),
			'hal_lain' => $this->input->post('hal_lain'),
			'td_hal_lain' => $this->input->post('td_hal_lain'),
			'ttd_pemberi_info' => $this->input->post('ttd_pemberi_info'),
			'ttd_penerima_info' => $this->input->post('ttd_penerima_info'),
			'nama' => $this->input->post('nama'),
			'umur' => $this->input->post('umur'),
			'alamat' => $this->input->post('alamat'),
			'jk' => $this->input->post('jk'),
			'ghubungan' => $this->input->post('ghubungan'),
			'tolak_tindakan' => $this->input->post('tolak_tindakan'),
			'tgl_tindakan' => $this->input->post('tgl_tindakan'),
			'ttd' => $file,
			'ttd1' => $file1,
			'ttd2' => $file2,
			'tanggal' => $tgl,
			'staff' => $staff,
		);
		$where = array(
			'id_form_persetujuan_tindakan_dokter' => $this->input->post('id')
		);

		$this->M_Erm->update($data,$where, 'form_persetujuan_tindakan_dokter');
		$out['status'] = "success";

		echo json_encode($out);
	}
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
