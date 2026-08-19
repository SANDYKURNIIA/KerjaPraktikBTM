<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Erm_prmrj extends CI_Controller {

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm_poli');
	}

	public function form($id_pel, $id_his,$jenis_pelayanan)
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
		$page_data['no_rm'] = $selectPasien->no_rm;
		$tgl_masuk = date('Y-m-d',strtotime($selectPasien->tgl_masuk));

		$page_data['pelayanan'] = $this->db->query("SELECT p.id_pelayanan, h.id_history, h.tgl_masuk, l.nama_panjang,d.nama dpjp
		FROM pelayanan p, history_pelayanan h , list_poli l, dokter d
		where p.id_pelayanan = h.id_pelayanan and h.nama_poli = l.id_list_poli and h.dpjp = d.id_dokter
		and p.id_pasien = '$selectPasien->no_rm' and p.status = 1 and h.status = 1
		and DATE(p.tgl_masuk)='$tgl_masuk'")->result();
		
		// $this->load->view('assets/_header');
		// $page_data['page_content'] = 'erm_form/view_prmrj';
		$this->load->view('erm_print/prmrj',$page_data);
		// $this->load->view('Main', $page_data);
		// $this->load->view('assets/_footer');
	}

	public function print_out()
	{
		$data['page_title']="General Concern";
		$this->load->view('erm_print/prmrj', $data);
	}
}
