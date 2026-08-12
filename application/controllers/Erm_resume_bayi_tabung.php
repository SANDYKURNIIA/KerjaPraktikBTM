<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_resume_bayi_tabung extends CI_Controller
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
		$this->load->model('M_erm_resume_bayi_tabung');
	}

	public function simpan()
	{
		$staff = $this->session->userdata('data_auth');
		$id = $this->input->post('id_pelayanan');
		$db = $this->db->query("SELECT count(*) count from resume_bayi_tabung where id_pelayanan ='$id'")->row();
		if ($db->count == 0) {
			$db = [
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'riwayat_kelahiran' => $this->input->post('riwayat_kelahiran'),
				'pemeriksaan_fisik' => $this->input->post('pemeriksaan_fisik'),
				'hasil_pemeriksaan_penunjang' => $this->input->post('hasil_pemeriksaan_penunjang'),
				'prosedur_terapi' => $this->input->post('prosedur_terapi'),
				'terapi_obat_yang_diberikan' => $this->input->post('terapi_obat_yang_diberikan'),
				'edukasi_yang_sudah_diberikan' => $this->input->post('edukasi_yang_sudah_diberikan'),
				'kondisi_pasien_saat_pulang' => $this->input->post('kondisi_pasien_saat_pulang'),
				'tanggal_kontrol_kembali' => $this->input->post('tanggal_kontrol_kembali'),
				'staff' => $staff->id_staff,
			];

			$this->M_erm_resume_bayi_tabung->formopedit($db, 'resume_bayi_tabung');
		} else {
			$db = [
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'riwayat_kelahiran' => $this->input->post('riwayat_kelahiran'),
				'pemeriksaan_fisik' => $this->input->post('pemeriksaan_fisik'),
				'hasil_pemeriksaan_penunjang' => $this->input->post('hasil_pemeriksaan_penunjang'),
				'prosedur_terapi' => $this->input->post('prosedur_terapi'),
				'terapi_obat_yang_diberikan' => $this->input->post('terapi_obat_yang_diberikan'),
				'edukasi_yang_sudah_diberikan' => $this->input->post('edukasi_yang_sudah_diberikan'),
				'kondisi_pasien_saat_pulang' => $this->input->post('kondisi_pasien_saat_pulang'),
				'tanggal_kontrol_kembali' => $this->input->post('tanggal_kontrol_kembali'),
				'staff' => $staff->id_staff,
			];
			$where = array('id_pelayanan' => $this->input->post('id_pelayanan'));
			$this->M_erm_resume_bayi_tabung->formopedit($db, $where, 'form_laporan');
		}
		$out['status'] = "success";
		echo json_encode($out);
	}


	public function formresumebayitabung($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['staff'] = $staff->id_staff;
		$page_data['kelas'] = $selectPasien->kelas;
		$page_data['ruang_rawat'] = $this->M_Erm_ranap->getRuangByRiwayatKamar($id_pelayanan);
		$page_data['nama'] = $selectPasien->nama;
		$page_data['alamat'] = $selectPasien->alamat;
		$page_data['keluar_kamar'] = $selectPasien->keluar_kamar;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['dpjp1'] = $selectPasien->nama_dokter;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['id_staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['pasien'] = $selectPasien;
		$diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_pelayanan='$id_pelayanan'")->row_array();
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$page_data['status'] = $selectPasien->status;
		$page_data['diagnosa_utama'] = $diagnosa1;

		

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_resume_bayi_tabung';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function store()
	{
		$this->load->model('M_erm_resume_bayi_tabung');
		$id_pelayanan = $this->input->post('id_pelayanan');
		$existing_data = $this->M_erm_resume_bayi_tabung->CekId($id_pelayanan);
		$staff = $this->session->userdata('data_auth');
		// Menangani pengiriman data dari form ke database
		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'riwayat_kelahiran' => $this->input->post('riwayat_kelahiran'),
			'pemeriksaan_fisik' => $this->input->post('pemeriksaan_fisik'),
			'hasil_pemeriksaan_penunjang' => $this->input->post('hasil_pemeriksaan_penunjang'),
			'prosedur_terapi' => $this->input->post('prosedur_terapi'),
			'terapi_obat_yang_diberikan' => $this->input->post('terapi_obat_yang_diberikan'),
			'edukasi_yang_sudah_diberikan' => $this->input->post('edukasi_yang_sudah_diberikan'),
			'kondisi_pasien_saat_pulang' => $this->input->post('kondisi_pasien_saat_pulang'),
			'tanggal_kontrol_kembali' => $this->input->post('tanggal_kontrol_kembali'),
			'staff' => $staff->id_staff, 
		);
		if ($existing_data) {
			// Data sudah ada, gunakan perintah update
			$this->M_erm_resume_bayi_tabung->formopedit($id_pelayanan, $data);
		} else {
			// Data belum ada, gunakan perintah insert
			$this->M_erm_resume_bayi_tabung->insert_data($data);
		}
		$out['status'] = "success";
		echo json_encode($out);
	}

	public function print_out($id_pelayanan, $id_history)
	{
		// $data['data'] = $this->M_laporan_operasi_model->getData($id_pelayanan);
		$data['data'] = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$data['resume_bayi_tabung'] = $this->db->get_where("resume_bayi_tabung", ["id_pelayanan" => $id_pelayanan])->row();
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$data['diagnosa_utama'] = $this->db->get_where("diagnosa_utama", ["id_history" => $id_history])->row();
		$this->load->view('erm_print/view_resume_bayi_tabung_print', $data);
	}

	public function formopedit($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');
		$page_data['resume_bayi_tabung'] = $this->db->get_where("resume_bayi_tabung", ["id_pelayanan" => $id_pelayanan])->row_array();
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['staff'] = $staff->id_staff;
		$page_data['kelas'] = $selectPasien->kelas;
		$page_data['nama_ruangan'] = $selectPasien->nama_ruangan;
		$page_data['nama'] = $selectPasien->nama;
		$page_data['alamat'] = $selectPasien->alamat;
		$page_data['keluar_kamar'] = $selectPasien->keluar_kamar;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['dpjp1'] = $selectPasien->nama_dokter;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['id_staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['pasien'] = $selectPasien;
		$diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_pelayanan='$id_pelayanan'")->row_array();
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$page_data['status'] = $selectPasien->status;
		$page_data['diagnosa_utama'] = $diagnosa1;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap_Edit/view_resume_bayi_tabung_edit';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_resume_bayi_tabung($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$selectPasien2 = $this->M_Erm_ranap->selectPasienPulang($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['staff'] = $staff->id_staff;
		$page_data['kelas'] = $selectPasien->kelas;
		$page_data['nama_ruangan'] = $selectPasien->nama_ruangan;
		$page_data['nama'] = $selectPasien->nama;
		$page_data['alamat'] = $selectPasien->alamat;
		$page_data['keluar_kamar'] = $selectPasien->keluar_kamar;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['dpjp1'] = $selectPasien->nama_dokter;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['id_staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['pasien'] = $selectPasien;
		$diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_pelayanan='$id_pelayanan'")->row_array();
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		// $page_data['status'] = $selectPasien->status;
		$page_data['diagnosa_utama'] = $diagnosa1;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap_Edit/view_resume_bayi_tabung_edit';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
}
