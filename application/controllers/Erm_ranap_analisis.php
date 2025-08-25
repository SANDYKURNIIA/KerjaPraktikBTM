<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_analisis extends CI_Controller
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
    public function formanalisisdata($id_pelayanan, $id_history)
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

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_analisis_data';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function tampil_list_per_id()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm_ranap->selectAnalisis($id_pelayanan);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_analisis . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $page_data[$i]->id_analisis . "\")' '><i class='icon-trash'></i></button>";

			$data = $page_data[$i]->data;
			$etiologi = $page_data[$i]->etiologi;
			$masalah = $page_data[$i]->masalah;
			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal);
			// $gambar = null;
            // foreach (explode(',', $page_data[$i]->file) as $image) { // 1, 2, 3
            //     $gambar .= "<img src='".base_url()."assets/images/" . $image . "' class='img-responsive zoom'><br>";
            // }
			$out[$i] = array($no, $tombol,$hapus,$date,$data,$etiologi,$masalah);
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
	public function insert_analisis()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$this->form_validation->set_rules('masalah', 'Masalah', 'required');
		$this->form_validation->set_rules('etiologi', 'Etiologi', 'required');
		$this->form_validation->set_rules('datas', 'Data', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tanggal' => $tgl,
				'data' => $this->input->post('datas'),
				'etiologi' => $this->input->post('etiologi'),
				'masalah' => $this->input->post('masalah'),
				'staff' => $staff,
			);
			$data2 = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
			);

			$this->M_Erm_ranap->insert($data, 'analisis_data');
			$this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'masalah' => form_error('masalah'),
				'etiologi' => form_error('etiologi'),
				'datas' => form_error('datas'),
			);
		}
		echo json_encode($out);
	}
	public function edit_analisis()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$id = $this->input->post('id');
		$this->form_validation->set_rules('masalah', 'Masalah', 'required');
		$this->form_validation->set_rules('etiologi', 'Etiologi', 'required');
		$this->form_validation->set_rules('datas', 'Data', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tanggal' => $tgl,
				'data' => $this->input->post('datas'),
				'etiologi' => $this->input->post('etiologi'),
				'masalah' => $this->input->post('masalah'),
				'staff' => $staff,
			);
			$this->M_Erm_ranap->update_analisis($id,$data);
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'masalah' => form_error('masalah'),
				'etiologi' => form_error('etiologi'),
				'datas' => form_error('datas'),
			);
		}
		echo json_encode($out);
	}
	function hapus_analisis()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_analisis' => $id,
		);
		$this->M_Erm_ranap->delete($where, 'analisis_data');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function getPerAnalisis()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('analisis_data', ['id_analisis' => $id])->row_array();
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
?>
