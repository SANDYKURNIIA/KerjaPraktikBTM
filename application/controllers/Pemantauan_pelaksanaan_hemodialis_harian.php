<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemantauan_pelaksanaan_hemodialis_harian extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		setlocale(LC_ALL, 'id_ID');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Pemantauan_hd');
	}

	public function form($id_pel, $id_his)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));

		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');
		$page_data['pasien'] = $selectPasien;
		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Poli/view_pemantauan_pelaksanaan_hemodialis_harian';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function save()
	{
		$id_pelayanan = $this->input->post('id_pelayanan');
		$id_history = $this->input->post('id_history');
		$staff = $this->session->userdata('data_auth');
		// KUMPULKAN SEMUA FIELD DARI POST
		$data = [
			'id_pelayanan' => $id_pelayanan,
			'id_history' => $id_history,
			'no_rm' => $this->input->post('no_rm'),
			'gelang_identitas_status' => $this->input->post('gelang_identitas_status', true),
			'gelang_identitas_alasan' => $this->input->post('gelang_identitas_alasan', true),
			'alergi_status' => $this->input->post('alergi_status', true),
			'alergi_keterangan' => $this->input->post('alergi_keterangan', true),
			'gelang_alergi_status' => $this->input->post('gelang_alergi_status', true),
			'gelang_alergi_alasan' => $this->input->post('gelang_alergi_alasan', true),
			'akses_jenis' => $this->input->post('akses_jenis', true),
			'akses_lokasi' => $this->input->post('akses_lokasi', true),
			'akses_kondisi' => $this->input->post('akses_kondisi', true),
			'akses_infeksi' => $this->input->post('akses_infeksi', true),
			'akses_aneurisma' => $this->input->post('akses_aneurisma', true),
			'akses_thrill' => $this->input->post('akses_thrill', true),
			'akses_bruit' => $this->input->post('akses_bruit', true),
			'akses_lain' => $this->input->post('akses_lain', true),
			'lumen_arteri_cm' => $this->input->post('lumen_arteri_cm', true),
			'lumen_vena_cm' => $this->input->post('lumen_vena_cm', true),
			'panjang_dl_arteri_cc' => $this->input->post('panjang_dl_arteri_cc', true),
			'panjang_dl_vena_cc' => $this->input->post('panjang_dl_vena_cc', true),
			'antibiotic_lock_arteri_cc' => $this->input->post('antibiotic_lock_arteri_cc', true),
			'antibiotic_lock_vena_cc' => $this->input->post('antibiotic_lock_vena_cc', true),
			'mesin_hd' => $this->input->post('mesin_hd', true),
			'mesin_no' => $this->input->post('mesin_no', true),
			'dialisat_ca' => $this->input->post('dialisat_ca', true),
			'dialisat_suhu' => $this->input->post('dialisat_suhu', true),
			'dialiser_model' => $this->input->post('dialiser_model', true),
			'dialiser_flux' => $this->input->post('dialiser_flux', true),
			'dialiser_kondisi' => $this->input->post('dialiser_kondisi', true),
			'bb_kering_kg' => $this->input->post('bb_kering_kg', true),
			'lama_hd_jam' => $this->input->post('lama_hd_jam', true),
			'blood_flow_rate_ml_menit' => $this->input->post('blood_flow_rate_ml_menit', true),
			'ufg' => $this->input->post('ufg', true),
			'heparin_jenis' => $this->input->post('heparin_jenis', true),
			'heparin_total' => $this->input->post('heparin_total', true),
			'heparin_bolus' => $this->input->post('heparin_bolus', true),
			'heparin_kontinyu' => $this->input->post('heparin_kontinyu', true),
			'lain_lain_1' => $this->input->post('lain_lain_1', true),
			'lain_lain_2' => $this->input->post('lain_lain_2', true),
			'perubahan_obat' => $this->input->post('perubahan_obat', true),
			'id_staff' => $staff->id_staff,
			'tgl_simpan' => date('Y-m-d H:i:s')
		];

		$existing = $this->M_Pemantauan_hd->get_data_pemantauan_hd($id_pelayanan, $id_history);

		if ($existing) {
			$data['tgl_update'] = date('Y-m-d H:i:s');

			unset($data['tgl_input']);

			$this->M_Pemantauan_hd->update($id_pelayanan, $id_history, $data);
			echo json_encode([
				'status' => 'success',
				'type' => 'update',
				'message' => 'Data berhasil diperbarui'
			]);
		} else {
			// INSERT
			$this->M_Pemantauan_hd->insert($data);
			echo json_encode([
				'status' => 'success',
				'type' => 'insert',
				'message' => 'Data berhasil disimpan'
			]);
		}
	}


	public function get_data_pemantauan()
	{
		$id_pelayanan = $this->input->post('id_pelayanan');
		$id_history = $this->input->post('id_history');

		$data = $this->M_Pemantauan_hd->get_data_pemantauan_hd($id_pelayanan, $id_history);

		if ($data) {
			echo json_encode([
				'status' => 'found',
				'data' => $data
			]);
		} else {
			echo json_encode([
				'status' => 'not found'
			]);
		}
	}

	// public function cetak_pemantauan($id_pelayanan = null, $id_history = null)
	// {
	// 	$id_pelayanan = $this->input->post('id_pelayanan');
	// 	$id_history   = $this->input->post('id_history');

	// 	$pasien = $this->M_Erm_poli
	// 		->selectDataPasienIGDby_id($id_pelayanan, $id_history);

	// 	var_dump($pasien);

	// 	$pemantauan = $this->M_Pemantauan_hd
	// 		->get_data_pemantauan_hd($id_pelayanan, $id_history);

	// 	$data = [
	// 		'pasien'      => $pasien,
	// 		'pemantauan'  => $pemantauan,
	// 		'tanggal'     => strftime('%A, %d-%m-%Y'),
	// 		'jam'         => date('H:i') . ' WIB'
	// 	];

	// 	$this->load->view('erm_print/pemantauan_pelaksanaan_hemodialis_harian',$data);
	// }

	public function cetak_pemantauan($id_pel = null, $id_his = null) 
	{
		$pasien = $this->M_Erm_poli
			->selectDataPasienIGDby_id($id_pel, $id_his);

		$pemantauan = $this->M_Pemantauan_hd
			->get_data_pemantauan_hd($id_pel, $id_his);

		$dokter = $this->db
			->select('nama, foto')
			->from('dokter')
			->where('id_dokter', $pasien->dpjp)
			->get()
			->row();

		$data = [
			'pasien'      => $pasien,
			'pemantauan'  => $pemantauan,
			'dokter'      => $dokter,
			'tanggal'     => strftime('%A, %d-%m-%Y'),
			'jam'         => date('H:i') . ' WIB'
		];

		$this->load->view('erm_print/pemantauan_pelaksanaan_hemodialis_harian', $data);
	}


}
