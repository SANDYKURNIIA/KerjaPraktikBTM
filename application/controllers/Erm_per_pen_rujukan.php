<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_per_pen_rujukan extends CI_Controller
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
		$page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['link'] = 'Erm_igd/form';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_per_pen_rujukan';
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

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_per_pen_rujukan';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function form_raj($id_pelayanan, $id_history)
	{
		// $id_pelayanan = base64_decode(urldecode($id_pel));
		// $id_history = base64_decode(urldecode($id_his));
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
		$page_data['page_content'] = 'erm_form/view_per_pen_rujukan';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}


	public function tampil_list_per_pen_rujukan()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm->selectPerPenRujukan($id_pelayanan);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_form_per_pen_rujukan . "\")' '><i class='icon-rocket'></i></button>";

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

	public function insert_per_pen_rujukan()
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
		$this->form_validation->set_rules('pemberi_info', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('penerima_info', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('diagnosis', 'GCS', 'required');
		$this->form_validation->set_rules('td_diagnosis', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('alasan', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('td_alasan', 'Suhu', 'required');
		$this->form_validation->set_rules('risiko', 'SPo2', 'required');
		$this->form_validation->set_rules('td_risiko', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('transport', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('td_transport', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('hambatan', 'GCS', 'required');
		$this->form_validation->set_rules('td_hambatan', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('ttd_pemberi_info', 'Tekanan Darah', 'required');
		$this->form_validation->set_rules('ttd_penerima_info', 'Suhu', 'required');
		$this->form_validation->set_rules('nama', 'SPo2', 'required');
		$this->form_validation->set_rules('umur', 'Frequensi Nadi', 'required');
		$this->form_validation->set_rules('alamat', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('jk', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('ghubungan', 'Asal Rujuk', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'pemberi_info' => $this->input->post('pemberi_info'),
				'penerima_info' => $this->input->post('penerima_info'),
				'diagnosis' => $this->input->post('diagnosis'),
				'td_diagnosis' => $this->input->post('td_diagnosis'),
				'alasan' => $this->input->post('alasan'),
				'td_alasan' => $this->input->post('td_alasan'),
				'risiko' => $this->input->post('risiko'),
				'td_risiko' => $this->input->post('td_risiko'),
				'transport' => $this->input->post('transport'),
				'td_transport' => $this->input->post('td_transport'),
				'hambatan' => $this->input->post('hambatan'),
				'td_hambatan' => $this->input->post('td_hambatan'),
				'ttd_pemberi_info' => $this->input->post('ttd_pemberi_info'),
				'ttd_penerima_info' => $this->input->post('ttd_penerima_info'),
				'nama' => $this->input->post('nama'),
				'umur' => $this->input->post('umur'),
				'alamat' => $this->input->post('alamat'),
				'jk' => $this->input->post('jk'),
				'ghubungan' => $this->input->post('ghubungan'),
				'ttd' => $file,
				'ttd1' => $file1,
				'ttd2' => $file2,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_per_pen_rujukan');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'pemberi_info' => form_error('pemberi_info'),
				'penerima_info' => form_error('penerima_info'),
				'diagnosis' => form_error('diagnosis'),
				'td_diagnosis' => form_error('td_diagnosis'),
				'alasan' => form_error('alasan'),
				'td_alasan' => form_error('td_alasan'),
				'risiko' => form_error('risiko'),
				'td_risiko' => form_error('td_risiko'),
				'transport' => form_error('transport'),
				'td_transport' => form_error('td_transport'),
				'hambatan' => form_error('hambatan'),
				'td_hambatan' => form_error('td_hambatan'),
				'ttd_pemberi_info' => form_error('ttd_pemberi_info'),
				'ttd_penerima_info' => form_error('ttd_penerima_info'),
				'nama' => form_error('nama'),
				'umur' => form_error('umur'),
				'alamat' => form_error('alamat'),
				'jk' => form_error('jk'),
				'ghubungan' => form_error('ghubungan'),
			);
		}
		echo json_encode($out);
	}
	public function edit_per_pen_rujukan()
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

		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'pemberi_info' => $this->input->post('pemberi_info'),
			'penerima_info' => $this->input->post('penerima_info'),
			'diagnosis' => $this->input->post('diagnosis'),
			'td_diagnosis' => $this->input->post('td_diagnosis'),
			'alasan' => $this->input->post('alasan'),
			'td_alasan' => $this->input->post('td_alasan'),
			'risiko' => $this->input->post('risiko'),
			'td_risiko' => $this->input->post('td_risiko'),
			'transport' => $this->input->post('transport'),
			'td_transport' => $this->input->post('td_transport'),
			'hambatan' => $this->input->post('hambatan'),
			'td_hambatan' => $this->input->post('td_hambatan'),
			'ttd_pemberi_info' => $this->input->post('ttd_pemberi_info'),
			'ttd_penerima_info' => $this->input->post('ttd_penerima_info'),
			'nama' => $this->input->post('nama'),
			'umur' => $this->input->post('umur'),
			'alamat' => $this->input->post('alamat'),
			'jk' => $this->input->post('jk'),
			'ghubungan' => $this->input->post('ghubungan'),
			'ttd' => $file,
			'ttd1' => $file1,
			'ttd2' => $file2,
			'tanggal' => $tgl,
			'staff' => $staff,
		);
		$where = array(
			'id_form_per_pen_rujukan' => $this->input->post('id')
		);

		$this->M_Erm->update($data, $where, 'form_per_pen_rujukan');
		$out['status'] = "success";

		echo json_encode($out);
	}
	public function getPerPenRujukan()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_per_pen_rujukan', ['id_form_per_pen_rujukan' => $id])->row_array();
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
