<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Erm_laporan_tin_operasi extends CI_Controller {

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm_poli');
	}
	public function get_tindakan_operasi()
	{
		$id = $this->input->post('no_rm');
		$db = $this->db->get_where('form_tindakan_operasi', ['no_rm' => $id])->result();
		if (count($db) > 0) {
			$db = $db[0];
			$db->status_dt = 'found';
		} else {
			$db = null;
			$db['status_dt'] = 'not found';
		}
		echo json_encode($db);
	}

	public function form($id_pel, $id_his)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		// $page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_laporan_tin_operasi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_laporan($id_pel, $id_his)
	{
		$id_pelayanan = $id_pel;
		$id_history = $id_his;
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		// $page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;
		$db = $this->db->get_where('form_tindakan_operasi', ['id_history' => $id_his])->row_array();
		$page_data['data'] = $db;
		

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_laporan_tin_operasi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function print_out()
	{
		$data['page_title']="Resiko Jatuh";
		$this->load->view('erm_print/resiko_jatuh', $data);
	}

	public function insert_tind_opr() {
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d H:i:s");

			$data = array(
				'id_pelayanan' => base64_decode(urldecode($this->input->post('id_pelayanan'))),
				'id_history' => base64_decode(urldecode($this->input->post('id_history'))),
				'no_rm' => $this->input->post('no_rm'),
				'ruang' => $this->input->post('Ruang'),
				'kelas' => $this->input->post('Kelas'),
				'ahlibedah' => $this->input->post('ahlibedah'),
				'perawat' => $this->input->post('perawat'),
				'asisten1' => $this->input->post('asisten1'),
				'asisten2' => $this->input->post('asisten2'),
				'diag_pra_opr' => $this->input->post('diag_pra_opr'),
				't_operasi' => $this->input->post('t_operasi'),

				'diag_post_opr' => $this->input->post('diag_post_opr'),
				'indikasi_opr' => $this->input->post('indikasi_opr'),
				'jenis_opr' => $this->input->post('jenis_opr'),
				'tgl_operasi' => $this->input->post('tgl_operasi'),
				'opr_mulai' => $this->input->post('opr_mulai'),

				// 'periksa' => $this->input->post('periksa'),
				'opr_selesai' => $this->input->post('opr_selesai'),
				'jaringan' => $this->input->post('jaringan'),
				'p_phatologis' => $this->input->post('p_phatologis'),
				'b_labor' => $this->input->post('b_labor'),
				'uraian' => $this->input->post('uraian'),
				'c_approach' => $this->input->post('c_approach'),
				'p_penderita' => $this->input->post('p_penderita'),
				's_kelainan' => $this->input->post('s_kelainan'),
				'jenis_laser' => $this->input->post('jenis_laser'),
				'jenis_pasien' => $this->input->post('jenis_pasien'),
				'j_spot' => $this->input->post('jumlah_spot'),
				'B_spot' => $this->input->post('besar_spot'),
				'power' => $this->input->post('power'),
				'durasi_val' => $this->input->post('durasi_val'),
			);

			$this->M_Erm_poli->insert($data, 'form_tindakan_operasi');
			$out['status'] = "success";
		echo json_encode($out);
	}

	public function update_tind_opr() {
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d H:i:s");

			$data = array(
				'id_pelayanan' => base64_decode(urldecode($this->input->post('id_pelayanan'))),
				'id_history' => base64_decode(urldecode($this->input->post('id_history'))),
				'no_rm' => $this->input->post('no_rm'),
				'ruang' => $this->input->post('Ruang'),
				'kelas' => $this->input->post('Kelas'),
				'ahlibedah' => $this->input->post('ahlibedah'),
				'perawat' => $this->input->post('perawat'),
				'asisten1' => $this->input->post('asisten1'),
				'asisten2' => $this->input->post('asisten2'),
				'diag_pra_opr' => $this->input->post('diag_pra_opr'),
				't_operasi' => $this->input->post('t_operasi'),

				'diag_post_opr' => $this->input->post('diag_post_opr'),
				'indikasi_opr' => $this->input->post('indikasi_opr'),
				'jenis_opr' => $this->input->post('jenis_opr'),
				'tgl_operasi' => $this->input->post('tgl_operasi'),
				'opr_mulai' => $this->input->post('opr_mulai'),

				// 'periksa' => $this->input->post('periksa'),
				'opr_selesai' => $this->input->post('opr_selesai'),
				'jaringan' => $this->input->post('jaringan'),
				'p_phatologis' => $this->input->post('p_phatologis'),
				'b_labor' => $this->input->post('b_labor'),
				'uraian' => $this->input->post(''),
				'c_approach' => $this->input->post('c_approach'),
				'p_penderita' => $this->input->post('p_penderita'),
				's_kelainan' => $this->input->post('s_kelainan'),
				'jenis_laser' => $this->input->post('jenis_laser'),
				'jenis_pasien' => $this->input->post('jenis_pasien'),
				'j_spot' => $this->input->post('jumlah_spot'),
				'B_spot' => $this->input->post('besar_spot'),
				'power' => $this->input->post('power'),
				'durasi_val' => $this->input->post('durasi_val'),
			);

			$where =array('id_form_tindakan_operasi' => $this->input->post('id'));
			
			$this->M_Erm_poli->update($data,$where,'form_tindakan_operasi');
			$out['status'] = "success";
		echo json_encode($out);
	}
	
}