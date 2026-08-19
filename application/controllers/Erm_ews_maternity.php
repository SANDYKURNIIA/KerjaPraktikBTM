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
		$this->load->library('form_validation');
	}

	public function formewsmaternity($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama ?? '';
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir ?? '';
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin ?? '';
		$page_data['cara_bayar'] = $selectPasien->cara_bayar ?? '';
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk ?? '';
		$page_data['id_staff'] = $staff->id_staff ?? '';
		$page_data['no_rm'] = $selectPasien->no_rm ?? '';
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['nama_dokter'] = $selectPasien->nama_dokter ?? '';
		$page_data['agama'] = $selectPasien->agama ?? '';
		$page_data['diagnosa_pasien'] = $selectPasien->diagnosa ?? '';
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$page_data['dokter'] = $this->M_Rawatinap->selectNamaDPJP();
		$page_data['nama_ruangan'] = $this->M_Erm_ranap->getNamaRuanganByPelayanan($id_pelayanan);

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_ews_maternity';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_vital($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$ews = $this->M_Erm_ranap->getEwsMaternityByPelayanan($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		// DATA PASIEN
		$page_data['nama'] = $selectPasien->nama ?? '';
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir ?? '';
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin ?? '';
		$page_data['dpjp'] = $selectPasien->nama_dokter ?? '';
		$page_data['cara_bayar'] = $selectPasien->cara_bayar ?? '';
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk ?? '';
		$page_data['agama'] = $selectPasien->agama ?? '';
		$page_data['no_rm'] = $selectPasien->no_rm ?? '';
		$page_data['diagnosa_pasien'] = $ews->diagnosa ?? ($selectPasien->diagnosa ?? '');

		// IDENTITAS
		$page_data['id_staff'] = $staff->id_staff ?? '';
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['id_form'] = $ews->id_form ?? '';

		// DATA EWS
		$page_data['kesadaran'] = $ews->kesadaran ?? '';
		$page_data['sistolik'] = $ews->sistolik ?? '';
		$page_data['diastolik'] = $ews->diastolik ?? '';
		$page_data['nadi'] = $ews->nadi ?? '';
		$page_data['respirasi'] = $ews->respirasi ?? '';
		$page_data['suhu'] = $ews->suhu ?? '';
		$page_data['oksigen'] = $ews->oksigen ?? '';
		$page_data['nyeri'] = $ews->nyeri ?? '';
		$page_data['lokia'] = $ews->lokia ?? '';
		$page_data['protein_urin'] = $ews->protein_urin ?? '';
		$page_data['pendarahan_obstetri'] = $ews->pendarahan_obstetri ?? '';
		$page_data['produksi_urin'] = $ews->produksi_urin ?? '';
		$page_data['waktu'] = $ews->waktu ?? '';
		$page_data['total_ews'] = $ews->total_ews ?? '';

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_ews_maternity';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function insert_ews_maternity()
	{
		$staff_session = $this->session->userdata('data_auth');
		$id_staff = isset($staff_session->id_staff) ? $staff_session->id_staff : '';

		$this->form_validation->set_rules('kesadaran', 'kesadaran', 'required');
		$this->form_validation->set_rules('sistolik', 'sistolik', 'required');
		$this->form_validation->set_rules('diastolik', 'diastolik', 'required');
		$this->form_validation->set_rules('nadi', 'nadi', 'required');
		$this->form_validation->set_rules('respirasi', 'respirasi', 'required');
		$this->form_validation->set_rules('suhu', 'suhu', 'required');
		$this->form_validation->set_rules('oksigen', 'oksigen', 'required');
		$this->form_validation->set_rules('nyeri', 'nyeri', 'required');
		$this->form_validation->set_rules('lokia', 'lokia', 'required');
		$this->form_validation->set_rules('protein_urin', 'protein_urin', 'required');
		$this->form_validation->set_rules('pendarahan_obstetri', 'pendarahan_obstetri', 'required');
		$this->form_validation->set_rules('produksi_urin', 'produksi_urin', 'required');
		$this->form_validation->set_rules('ddj', 'ddj', 'required');
		$this->form_validation->set_rules('diagnosa', 'Diagnosa', 'required');
		$this->form_validation->set_rules('gravida', 'Gravida (G)', 'required');
		$this->form_validation->set_rules('para', 'Para (P)', 'required');
		$this->form_validation->set_rules('abortus', 'Abortus (A)', 'required');
		$this->form_validation->set_rules('minggu_kelahiran', 'Usia Kehamilan (Minggu)', 'required');
		$this->form_validation->set_rules('hari_kelahiran', 'Usia Kehamilan (Hari)', 'required');

		if ($this->form_validation->run()) {

			$tgl_input = $this->input->post('tgl_periksa');
			$jam_input = $this->input->post('jam_periksa');
			$tanggal_full = (!empty($tgl_input) && !empty($jam_input)) ? $tgl_input . ' ' . $jam_input : date("Y-m-d H:i:s");

			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'diagnosa' => $this->input->post('diagnosa'),
				'gravida' => $this->input->post('gravida') !== '' ? $this->input->post('gravida') : 0,
				'para' => $this->input->post('para') !== '' ? $this->input->post('para') : 0,
				'abortus' => $this->input->post('abortus') !== '' ? $this->input->post('abortus') : 0,
				'minggu_kelahiran' => $this->input->post('minggu_kelahiran') !== '' ? $this->input->post('minggu_kelahiran') : 0,
				'hari_kelahiran' => $this->input->post('hari_kelahiran') !== '' ? $this->input->post('hari_kelahiran') : 0,
				'kesadaran' => $this->input->post('kesadaran'),
				'sistolik' => $this->input->post('sistolik'),
				'diastolik' => $this->input->post('diastolik'),
				'nadi' => $this->input->post('nadi'),
				'respirasi' => $this->input->post('respirasi'),
				'suhu' => $this->input->post('suhu'),
				'oksigen' => $this->input->post('oksigen'),
				'nyeri' => $this->input->post('nyeri'),
				'lokia' => $this->input->post('lokia'),
				'protein_urin' => $this->input->post('protein_urin'),
				'pendarahan_obstetri' => $this->input->post('pendarahan_obstetri'),
				'produksi_urin' => $this->input->post('produksi_urin'),
				'ddj' => $this->input->post('ddj'),
				'waktu' => $jam_input,
				'jam_periksa' => $jam_input,
				'tanggal' => $tanggal_full,
				'total_ews' => $this->input->post('total_ews'),
				'id_staff' => $id_staff
			);

			$this->M_Erm_ranap->insert($data, 'ews_maternity');
			$out['status'] = "success";
		} else {
			$out['status'] = "error";
			$out['message'] = validation_errors();
		}

		echo json_encode($out);
		exit;
	}

	public function edit_ews_maternity()
	{
		$id_form = $this->input->post('id_form');

		if (empty($id_form)) {
			echo json_encode(['status' => 'error', 'message' => 'ID Form tidak ditemukan']);
			exit;
		}

		$staff_session = $this->session->userdata('data_auth');
		$id_staff = isset($staff_session->id_staff) ? $staff_session->id_staff : '';

		$tgl_input = $this->input->post('tgl_periksa');
		$jam_input = $this->input->post('jam_periksa');
		$tanggal_full = (!empty($tgl_input) && !empty($jam_input)) ? $tgl_input . ' ' . $jam_input : date("Y-m-d H:i:s");

		$data = array(
			'no_rm' => $this->input->post('no_rm'),
			'diagnosa' => $this->input->post('diagnosa'), // Kolom Diagnosa Baru
			'gravida' => $this->input->post('gravida') !== '' ? $this->input->post('gravida') : 0,
			'para' => $this->input->post('para') !== '' ? $this->input->post('para') : 0,
			'abortus' => $this->input->post('abortus') !== '' ? $this->input->post('abortus') : 0,
			'minggu_kelahiran' => $this->input->post('minggu_kelahiran') !== '' ? $this->input->post('minggu_kelahiran') : 0,
			'hari_kelahiran' => $this->input->post('hari_kelahiran') !== '' ? $this->input->post('hari_kelahiran') : 0,
			'kesadaran' => $this->input->post('kesadaran'),
			'sistolik' => $this->input->post('sistolik'),
			'diastolik' => $this->input->post('diastolik'),
			'nadi' => $this->input->post('nadi'),
			'respirasi' => $this->input->post('respirasi'),
			'suhu' => $this->input->post('suhu'),
			'oksigen' => $this->input->post('oksigen'),
			'nyeri' => $this->input->post('nyeri'),
			'lokia' => $this->input->post('lokia'),
			'protein_urin' => $this->input->post('protein_urin'),
			'pendarahan_obstetri' => $this->input->post('pendarahan_obstetri'),
			'produksi_urin' => $this->input->post('produksi_urin'),
			'ddj' => $this->input->post('ddj'),
			'waktu' => $jam_input,
			'jam_periksa' => $jam_input,
			'tanggal' => $tanggal_full,
			'total_ews' => $this->input->post('total_ews'),
			'id_staff' => $id_staff
		);

		$this->M_Erm_ranap->edit_ews_maternity_data($id_form, $data);
		echo json_encode(['status' => 'success']);
		exit;
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
		exit;
	}

	public function print_ews_maternity()
	{
		$ids_string = $this->input->post('ids');

		if (empty($ids_string)) {
			show_error('Tidak ada data yang dipilih untuk dicetak.', 400);
			return;
		}

		$id_array = explode(',', $ids_string);
		$dataPrint = $this->M_Erm_ranap->get_ews_maternity_by_ids($id_array);

		if (!empty($dataPrint)) {
			$id_pelayanan = $dataPrint[0]->id_pelayanan;
			$id_history = $dataPrint[0]->id_history;

			$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);

			if ($selectPasien) {
				$data['nama'] = $selectPasien->nama;
				$data['no_rm'] = $selectPasien->no_rm;
				$data['tgl_lahir'] = $selectPasien->tgl_lahir;
				$data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
				$data['dpjp'] = $selectPasien->nama_dokter;
				$data['ruangan'] = $this->M_Erm_ranap->getNamaRuanganByPelayanan($id_pelayanan);
			}
		}
		$data['data'] = $dataPrint;
		$this->load->view('erm_ranap_print/print_ews_maternity', $data);
	}

	public function tampil_list_per_id()
	{
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm_ranap->selectPemantauanEwsMaternitySehari($id_pelayanan);

		$out = array();

		if (!empty($page_data)) {
			for ($i = 0; $i < count($page_data); $i++) {
				$no = $i + 1;

				$out[$i] = array(
					$no,
					"<button class='btn btn-success btn-xs' onclick='pilih(\"{$page_data[$i]->id_form}\")'><i class='icon-rocket'></i></button>",
					"<button class='btn btn-danger btn-xs' onclick='hapus(\"{$page_data[$i]->id_form}\")'><i class='icon-trash'></i></button>",
					"<button class='btn btn-info btn-xs' onclick='cetak(\"{$page_data[$i]->id_form}\")'><i class='icon-printer'></i></button>",
					strftime("%A, %d %B %Y", strtotime($page_data[$i]->tanggal)),
					$page_data[$i]->waktu ?? '-',
					$page_data[$i]->nama_ruangan ?? '-',
					$page_data[$i]->total_ews ?? '-'
				);
			}
		}

		echo json_encode(['data' => $out]);
		exit;
	}
}
