<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_catatan_perkembangan extends CI_Controller
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
	public function formcppt($id_pelayanan, $id_history)
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
		$page_data['nama_dokter'] = $selectPasien->nama_dokter;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$page_data['dokter'] = $this->M_Rawatinap->selectNamaDPJP();


		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_catatan_perkembangan_terintegrasi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function insert_perkembangan()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;

		$this->form_validation->set_rules('instruksi', 'Instruksi', 'required');
		// $this->form_validation->set_rules('profesi', 'Profesi', 'required');
		// $this->form_validation->set_rules('hasil_analisis', 'Hasil Analisis', 'required');
		$this->form_validation->set_rules('tanggal_rencana', 'Tanggal Rencana', 'required');
		if ($this->form_validation->run()) {
			$verif_input = $this->input->post('verif');
    		$verif_value = ($verif_input === 'Ya') ? 'Belum' : 'Tidak';
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tanggal_rencana' => $this->input->post('tanggal_rencana'),
				'hasil_analisis' => $this->input->post('hasil_analisis'),
				'S' => $this->input->post('s'),
				'O' => $this->input->post('o'),
				'A' => $this->input->post('a'),
				'P' => $this->input->post('p'),
				'instruksi' => $this->input->post('instruksi'),
				'mulai_pukul' => $this->input->post('mulai_pukul'),
				'verif' => $verif_value,
				'tgl_verif' => $this->input->post('tgl_verifikasi'),
				'dokter_verif' => $this->input->post('nama_dokter'),
				// 'profesi' => $this->input->post('profesi'),
				// 'ttd' => $file,
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_ranap->insert($data, 'catatan_perkembangan_terintegrasi');
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error' => true,
				'instruksi' => form_error('instruksi'),
				// 'profesi' => form_error('profesi'),
				// 'hasil_analisis' => form_error('hasil_analisis'),
				'tanggal_rencana' => form_error('tanggal_rencana'),
				'mulai_pukul' => form_error('dokter_merawat'),
			);
		}
		echo json_encode($out);
	}

	public function tampil_list_per_pen_rujukan()
	{
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm_ranap->selectCatatanPer($id_pelayanan);

		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_catatan . "\")'><i class='icon-rocket'></i></button>";
			$lanjut = "<button class='btn btn-warning btn-icon-anim btn square' id='myButton' onclick='next(\"" . $page_data[$i]->id_catatan . "\")'><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $page_data[$i]->id_catatan . "\")'><i class='icon-trash'></i></button>";
			$checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_catatan . "'><label></label></div>";

			$auth = $this->session->userdata('data_auth');
			$username = $auth->username;
			$dokter = $page_data[$i]->dokter_verif;
			$dbdokter = $this->db->get_where('dokter', ['nama' => $dokter])->row();

			if ($page_data[$i]->verif == 'Belum' && $username == $dbdokter->username) {
				$verif = "<button class='btn btn-primary btn-icon-anim btn square' id='myButton' onclick='verif(\"" . $page_data[$i]->id_catatan . "\")'>
                <i class='icon-check'> </i>		
              </button>";
			} else if ($page_data[$i]->verif == 'Belum' && $username !== $dbdokter->username) {
				$verif = "<span class='badge badge-warning'>Menunggu verifikasi</span>";
			} elseif ($page_data[$i]->verif == 'Ya') {
				$verif = "<span class='badge badge-success'>Terverifikasi</span>";
			} elseif ($page_data[$i]->verif == 'Tidak') {
				$verif = "<span class='badge badge-default'>Tidak memerlukan verifikasi</span>";
			}

			$S = $page_data[$i]->S;
			$O = $page_data[$i]->O;
			$A = $page_data[$i]->A;
			$P = $page_data[$i]->P;
			// $hasil = $page_data[$i]->hasil_analisis;
			$instruksi = $page_data[$i]->instruksi;
			$tanggal = strtotime($page_data[$i]->tanggal_rencana);
			$mulai_pukul = $page_data[$i]->mulai_pukul;
			$date = strftime("%A, %d %B %Y ", $tanggal);
			$staff = $page_data[$i]->nama;
			// $dokter = $page_data[$i]->dokter_verif;
			$tgl_verif = ($page_data[$i]->tgl_verif != null) ? indo_date2($page_data[$i]->tgl_verif) . ' ' . date('H:i:s', strtotime($page_data[$i]->tgl_verif)) : '-';
			$dbdokter = $this->db->get_where('dokter', ['nama' => $dokter])->row();
			$ttd = (empty($dbdokter) || $page_data[$i]->verif!='Ya')?'':'<img src="' . base_url() . 'assets/ttd/' . $dbdokter->foto . '" style="width: 80px; ">';

			$out[$i] = array($checkbox, $no, $tombol, $lanjut, $hapus, $S, $O, $A, $P, $instruksi, $date, $mulai_pukul, $verif, $tgl_verif, $dokter, $ttd, $staff);
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

	public function edit_catatan()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$id = $this->input->post('id');

		$this->form_validation->set_rules('instruksi', 'Instruksi', 'required');
		// $this->form_validation->set_rules('profesi', 'Profesi', 'required');
		// $this->form_validation->set_rules('hasil_analisis', 'Hasil Analisis', 'required');
		$this->form_validation->set_rules('tanggal_rencana', 'Tanggal Rencana', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tanggal_rencana' => $this->input->post('tanggal_rencana'),
				// 'hasil_analisis' => $this->input->post('hasil_analisis'),
				'S' => $this->input->post('s'),
				'O' => $this->input->post('o'),
				'A' => $this->input->post('a'),
				'P' => $this->input->post('p'),
				'instruksi' => $this->input->post('instruksi'),
				'mulai_pukul' => $this->input->post('mulai_pukul'),
				// 'verif' => $this->input->post('verif'),
				// 'tgl_verif' => $this->input->post('tgl_verifikasi'),
				'dokter_verif' => $this->input->post('nama_dokter'),
				// 'profesi' => $this->input->post('profesi'),
				// 'ttd' => $file,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm_ranap->update_catatan($id, $data);
			$out['status'] = "success";
		} else {
			$out = array(
				'error' => true,
				'instruksi' => form_error('instruksi'),
				// 'profesi' => form_error('profesi'),
				// 'hasil_analisis' => form_error('hasil_analisis'),
				'tanggal_rencana' => form_error('tanggal_rencana'),
				'mulai_pukul' => form_error('dokter_merawat'),
			);
		}
		echo json_encode($out);
	}
	function hapus_catatan()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_catatan' => $id,
		);
		$this->M_Erm->delete($where, 'catatan_perkembangan_terintegrasi');
		$out['status'] = "success";
		echo json_encode($out);
	}
	// private function set_upload_options()
	// {
	// 	//upload an image options
	// 	$config = array();
	// 	$config['upload_path'] = "./assets/images";
	// 	$config['allowed_types'] = 'jpg|png|jpeg';
	// 	$config['encrypt_name'] = TRUE;
	// 	$config['max_size'] = 5048000; //5 mb
	// 	$config['overwrite']     = FALSE;

	// 	return $config;
	// }
	public function getPerPenRujukan()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('catatan_perkembangan_terintegrasi', ['id_catatan' => $id])->row_array();
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

	public function print_perkembangan()
	{
		$ids_string = $this->input->post('ids');
		if (empty($ids_string)) {
			show_error('Tidak ada data yang dipilih untuk dicetak.', 400);
			return;
		}
		$id_array = explode(',', $ids_string);
		$dataPrint = $this->M_Erm_ranap->get_perkembangan($id_array);
		for ($i = 0; $i < count($dataPrint); $i++) {
			$dokter = $dataPrint[$i]->dokter_verif;
			$nama = $dataPrint[$i]->nama;
			$dbdokter = $this->db->get_where('dokter', ['nama' => $dokter])->row();
			$ttd = (empty($dbdokter) || $dataPrint[$i]->verif!='Ya')?'':'<img src="' . base_url() . 'assets/ttd/' . $dbdokter->foto . '" style="width: 80px; ">';
			$dataPrint[$i]->ttd = $ttd;
		}
		$data['data'] = $dataPrint;
		$this->load->view('erm_ranap_print/print_perkembangan', $data);
	}

	public function verif_catatan()
	{
		$id = $this->input->post('id');
		$data = array(
			'verif' => 'Ya',
			'tgl_verif' => date("Y-m-d h:i:s"),
		);
		$this->M_Erm_ranap->update_catatan($id, $data);
		$out['status'] = "success";
		echo json_encode($out);
	}
}
