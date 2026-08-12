<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ews_maternity extends CI_Controller
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

	public function formewsmaternity($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap
			->selectDataPasienRanapby_id($id_pelayanan, $id_history);

		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['id_staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['nama_dokter'] = $selectPasien->nama_dokter;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$page_data['dokter'] = $this->M_Rawatinap->selectNamaDPJP();

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_ews_maternity';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_vital($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap
			->selectDataPasienRanapby_id($id_pelayanan, $id_history);

		$ews = $this->M_Erm_ranap
			->getEwsMaternityByPelayanan($id_pelayanan, $id_history);

		$staff = $this->session->userdata('data_auth');

		// DATA PASIEN
		$page_data['nama'] = $selectPasien->nama;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['dpjp'] = $selectPasien->nama_dokter;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['no_rm'] = $selectPasien->no_rm;

		// IDENTITAS
		$page_data['id_staff'] = $staff->id_staff;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;

		// DATA EWS
		$page_data['kesadaran'] = $ews->kesadaran ?? '';
		$page_data['sistolik'] = $ews->sistolik ?? '';
		$page_data['diastolik'] = $ews->diastolik ?? '';
		$page_data['nadi'] = $ews->nadi ?? '';
		$page_data['pernafasan'] = $ews->pernafasan ?? '';
		$page_data['suhu'] = $ews->suhu ?? '';
		$page_data['oksigen'] = $ews->oksigen ?? '';
		$page_data['nyeri'] = $ews->nyeri ?? '';
		$page_data['lokia'] = $ews->lokia ?? '';
		$page_data['protein'] = $ews->protein ?? '';
		$page_data['waktu'] = $ews->waktu ?? '';
		$page_data['total_ews'] = $ews->total_ews ?? '';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_ews_maternity';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function insert_ews_maternity()
	{
		// === AMBIL STAFF DARI SESSION (BENAR) ===
		$staff_session = $this->session->userdata('data_auth');
		$id_staff = $staff_session->id_staff;
		$tgl = date("Y-m-d H:i:s");

		$this->form_validation->set_rules('kesadaran', 'kesadaran', 'required');
		$this->form_validation->set_rules('sistolik', 'sistolik', 'required');
		$this->form_validation->set_rules('diastolik', 'diastolik', 'required');
		$this->form_validation->set_rules('nadi', 'nadi', 'required');
		$this->form_validation->set_rules('pernafasan', 'pernafasan', 'required');
		$this->form_validation->set_rules('suhu', 'suhu', 'required');
		$this->form_validation->set_rules('oksigen', 'oksigen', 'required');
		$this->form_validation->set_rules('nyeri', 'nyeri', 'required');
		$this->form_validation->set_rules('lokia', 'lokia', 'required');
		$this->form_validation->set_rules('protein', 'protein', 'required');

		if ($this->form_validation->run()) {

			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),

				'kesadaran' => $this->input->post('kesadaran'),
				'sistolik' => $this->input->post('sistolik'),
				'diastolik' => $this->input->post('diastolik'),
				'nadi' => $this->input->post('nadi'),
				'pernafasan' => $this->input->post('pernafasan'),
				'suhu' => $this->input->post('suhu'),
				'oksigen' => $this->input->post('oksigen'),
				'nyeri' => $this->input->post('nyeri'),
				'lokia' => $this->input->post('lokia'),
				'protein' => $this->input->post('protein'),

				'waktu' => $this->input->post('waktu'),
				'total_ews' => $this->input->post('total_ews'),
				'tanggal' => $tgl,

				// === INI YANG KAMU MAU ===
				'id_staff' => $id_staff
			);

			$this->M_Erm_ranap->insert($data, 'ews_maternity');
			$out['status'] = "success";
		} else {
			$out['error'] = true;
		}

		echo json_encode($out);
	}

	public function get_ews_maternity()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('ews_maternity', ['id_form' => $id])->row_array();

		if (!empty($db)) {
			$db['status_dt'] = 'found';
		} else {
			$db = ['status_dt' => 'not found'];
		}

		echo json_encode($db);
		exit;
	}

	function hapus_ews_maternity()
	{
		$id = $this->input->post('id');
		$where = array('id_form' => $id);
		$this->M_Erm_ranap->delete($where, 'ews_maternity');
		echo json_encode(['status' => 'success']);
	}

	public function tampil_list_per_id()
	{
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm_ranap
			->selectPemantauanEwsMaternitySehari($id_pelayanan);

		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;

			$out[$i] = array(
				$no,
				"<button class='btn btn-success' onclick='pilih(\"{$page_data[$i]->id_form}\")'><i class='icon-rocket'></i></button>",
				"<button class='btn btn-danger' onclick='hapus(\"{$page_data[$i]->id_form}\")'><i class='icon-trash'></i></button>",
				strftime("%A, %d %B %Y", strtotime($page_data[$i]->tanggal)),
				$page_data[$i]->kesadaran,
				$page_data[$i]->sistolik,
				$page_data[$i]->diastolik,
				$page_data[$i]->nadi,
				$page_data[$i]->pernafasan,
				$page_data[$i]->suhu,
				$page_data[$i]->oksigen,
				$page_data[$i]->nyeri,
				$page_data[$i]->lokia,
				$page_data[$i]->protein,
				$page_data[$i]->waktu,
				$page_data[$i]->total_ews
			);
		}

		echo json_encode(['data' => $out]);
		exit;
	}
}
