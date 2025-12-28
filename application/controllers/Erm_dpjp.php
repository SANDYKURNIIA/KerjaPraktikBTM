<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_dpjp extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Pencarian_Pasien');
		$this->load->model('M_Pelayanan_masuk');
		$this->load->model('M_Lembar_konsul');
	}

	public function form($id_pel, $id_his)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm_poli->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');
		$is_dokter = $this->is_dokter($staff->username);

		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		// $page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;
		$page_data['url'] = base_url('Erm_poli/form/') . $id_pel . '/' . $id_his . '/' . $selectPasien->jenis_pelayanan;
		$page_data['is_dokter'] = $is_dokter;

		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$page_data['dokter'] = $this->M_Lembar_konsul->get_dokter_aktif();
		$page_data['list_poli'] = $this->M_Lembar_konsul->get_list_poli_ada();

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_lembar_konsul';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function eval($id_pel, $id_his)
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
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		// $page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;
		$page_data['url'] = base_url('Erm_poli/form/') . $id_pel . '/' . $id_his . '/' . $selectPasien->jenis_pelayanan;

		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_lembar_evaluasi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_lembar_rujukan($id_pel, $id_his)
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
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		// $page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;
		$page_data['url'] = base_url('Erm_poli/form/') . $id_pel . '/' . $id_his . '/' . $selectPasien->jenis_pelayanan;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_lembar_konsul';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	
	public function insert_lembar_rujukan()
	{
		$data_user_login = $this->session->userdata('data_auth');

		// ambil input
		$id_pelayanan = $this->input->post('id_pelayanan');
		$id_history = $this->input->post('id_history');
		$no_rm = $this->input->post('no_rm');
		$id_dokter = $this->input->post('id_dokter');
		$id_list_poli = $this->input->post('id_list_poli');
		$riwayat_penyakit = $this->input->post('riwayat_penyakit');
		$diagnosis = $this->input->post('diagnosis');
		$terapi = $this->input->post('terapi');
		$keluhan = $this->input->post('keluhan');
		$tanggal = date("Y-m-d H:i:s");
		$staff = $data_user_login->id_staff;

		$errors = [];

		if (!$id_dokter)
			$errors[] = "Dokter tidak boleh kosong.";
		if (!$id_list_poli)
			$errors[] = "Poli tujuan tidak boleh kosong.";
		if (!$riwayat_penyakit)
			$errors[] = "Riwayat penyakit harus diisi.";
		if (!$diagnosis)
			$errors[] = "Diagnosis harus diisi.";
		if (!$terapi)
			$errors[] = "Terapi harus diisi.";
		if (!$keluhan)
			$errors[] = "Keluhan harus diisi.";

		if (count($errors) > 0) {
			echo json_encode([
				"status" => implode("", $errors),
			]);
			return;
		}

		$pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan, 'status' => 1])->row();

		$history_pelayanan = $this->db->get_where('history_pelayanan', ['id_history' => $id_history, 'status' => 1])->row();

		// hitung biaya jasa
		$biaya = update_biaya($no_rm, $pelayanan->cara_bayar, $id_dokter, 'POLI', $id_list_poli);

		// data tabel history_pelayanan
		$new_id_history_pelayanan = $this->M_Pelayanan_masuk->get_ai_tbl_history_poli();

		$data_history_pelayanan = array(
			'id_history' => $new_id_history_pelayanan,
			'nama_poli' => $id_list_poli,
			'jenis_pelayanan' => $history_pelayanan->jenis_pelayanan,
			'tgl_masuk' => $tanggal,
			'dpjp' => $id_dokter,
			'id_pelayanan' => $id_pelayanan,
			'id_staff' => $staff,
			'biaya_jasa' => $biaya['biaya_jasa'],
		);

		$data_form_rujukan = array(
			'id_pelayanan' => $id_pelayanan,
			'id_history' => $id_history,
			'id_history_form' => $new_id_history_pelayanan,
			'no_rm' => $no_rm,
			'id_dokter' => $id_dokter,
			'id_list_poli' => $id_list_poli,
			'riwayat_penyakit' => $riwayat_penyakit,
			'diagnosis' => $diagnosis,
			'terapi' => $terapi,
			'keluhan' => $keluhan,
			'tanggal' => $tanggal,
			'staff' => $staff,
		);


		$this->M_Lembar_konsul->tambah_history_rujukan($data_history_pelayanan);

		$this->M_Lembar_konsul->insert($data_form_rujukan, 'form_lembar_rujukan');

		$out['status'] = "success";

		echo json_encode($out);
	}

	public function edit_eval($id_pel, $id_his)
	{
		// $id_pelayanan = base64_decode(urldecode($id_pel));
		// $id_history = base64_decode(urldecode($id_his));
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pel, $id_his);
		$selectEval = $this->M_Erm_poli->getDataEval($id_pel, $id_his);
		// $selectPasien2 = $this->M_Erm_poli->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		// $page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;
		$page_data['hasil_eval'] = $selectEval->evaluasi;
		$page_data['url'] = base_url('Erm_poli/form/') . $id_pel . '/' . $id_his . '/' . $selectPasien->jenis_pelayanan;

		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_lembar_edit_eval';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_lembar_evaluasi()
	{
		$eval = $this->input->post('evaluasi');
		// $id = $this->input->post('id_pelayanan');

		$data = array(
			'evaluasi' => $eval
		);

		$where = array('id_pelayanan' => $this->input->post('id_pelayanan'));

		$this->M_Erm_poli->update($data, $where, 'form_lembar_evaluasi');
		$out['status'] = "success";
		echo json_encode($out);
	}

	public function insert_lembar_evaluasi()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'evaluasi' => $this->input->post('evaluasi'),
			// 'tempat' => '-',
			// 'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
			// 'diagnosis' => $this->input->post('diagnosis'),
			// 'tempat1' => '-',
			// 'hasil_periksa' => '',
			// 'terapi' => $this->input->post('terapi'),
			// // 'tindak_lanjut' => $this->input->post('tindak_lanjut'),
			// 'terapi1' => '',
			// 'saran' => '',
			'tanggal' => $tgl,
			'staff' => $staff,

		);

		$this->M_Erm_poli->insert($data, 'form_lembar_evaluasi');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function update_lembar_rujukan()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'tempat' => '-',
			'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
			'diagnosis' => $this->input->post('diagnosis'),
			'tempat1' => '-',
			'hasil_periksa' => '',
			'terapi' => $this->input->post('terapi'),
			// 'tindak_lanjut' => $this->input->post('tindak_lanjut'),
			'terapi1' => '',
			'saran' => '',
			'tanggal' => $tgl,
			'staff' => $staff,

		);
		$where = array('id_form_lembar_rujukan' => $this->input->post('id'));

		$this->M_Erm_poli->update($data, $where, 'form_lembar_rujukan');
		$out['status'] = "success";
		echo json_encode($out);
	}

	public function get_diagnosa()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('diagnosa_utama', ['id_history' => $id])->result();
		if (count($db) > 0) {
			$db = $db[0];
			$db->status_dt = 'found';
		} else {
			$db = null;
			$db['status_dt'] = 'not found';
		}
		echo json_encode($db);
	}

	public function get_ass_dok()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_assesmen_dokter', ['id_history' => $id])->result();
		if (count($db) > 0) {
			$db = $db[0];
			$db->status_dt = 'found';
		} else {
			$db = null;
			$db['status_dt'] = 'not found';
		}
		echo json_encode($db);
	}

	public function is_dokter($username)
	{
		$dokter = $this->db
			->get_where('dokter', ['username' => $username])
			->row();

		return $dokter;
	}

	public function get_data()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_lembar_rujukan', ['id_pelayanan' => $id])->result();
		if (count($db) > 0) {
			$db = $db[0];
			$db->status_dt = 'found';
		} else {
			$db = null;
			$db['status_dt'] = 'not found';
		}
		echo json_encode($db);
	}

	public function get_data_awal()
	{
		$id = $this->input->post('id');

		$result = $this->M_Lembar_konsul->get_data_form_awal($id);

		if ($result) {
			$result->status = 'found';
		} else {
			$result->status = 'not found';
		}
		echo json_encode($result);
	}

	public function get_all_diagnosa()
	{
		$result = $this->M_Lembar_konsul->get_all_diagnosa();

		echo json_encode($result);
	}

	public function hapus_lembar_konsul($id_lembar_konsul)
	{
		$keterangan = $this->input->post('keterangan');

		$result = $this->M_Lembar_konsul->hapus_lembar_konsul($id_lembar_konsul, $keterangan);

		if ($result['status']) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error', 'message' => $result['message']]);
		}
	}
	public function print_lembar_konsul($id_lembar_konsul)
	{
		$data['lembar_konsul'] = $this->M_Lembar_konsul->get_form_lembar_rujukan_by_id_form($id_lembar_konsul);

		$this->load->view('erm_print/print_lembar_konsul', $data);
	}

	public function get_lembar_konsul()
	{
		$id_lembar_konsul = $this->input->post('id');

		$data['lembar_konsul'] = $this->M_Lembar_konsul->get_form_lembar_rujukan_by_id_form($id_lembar_konsul);
	
		echo json_encode($data);
	}

	public function kirim_balasan()
	{
		$id_form_rujukan = $this->input->post('id_form_lembar_rujukan');

		$data = [
			'id_history' => $this->input->post('id_history'),
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_dokter' => $this->input->post('id_dokter'),
			'id_list_poli' => $this->input->post('id_list_poli'),
			'no_rm' => $this->input->post('no_rm'),
			'verifikasi' => $this->input->post('respon_dokter'),
			'balasan' => $this->input->post('balasan'),
		];

		$this->db->where('id_form_lembar_rujukan', $id_form_rujukan);
		$this->db->update('form_lembar_rujukan', $data);

		if ($this->db->affected_rows() > 0) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Data tidak berubah']);
		}
	}

	public function getPoliBySpes()
	{
		$spes = $this->input->post('spes');

		if ($spes) {
			$this->db->where('LOWER(spes) =', strtolower($spes));
		}

		$data = $this->db->get('list_poli')->result();

		echo json_encode($data);
	}

	public function tampil_list()
	{
		$id_pelayanan = $this->input->post('id_pelayanan');

		$user_login = $this->session->userdata('data_auth');
		$is_dokter = $this->is_dokter($user_login->username);

		if ($is_dokter) {
			$page_data = $this->M_Lembar_konsul->get_form_lembar_rujukan_by_pelayanan_for_dokter($id_pelayanan, $is_dokter->id_dokter);
			$out = [];
			for ($i = 0; $i < count($page_data); $i++) {
				$no = $i + 1;
				$id_form = $page_data[$i]->id_form_lembar_rujukan ?? '';

				$tombol_balasan = "<button class='btn btn-warning btn-icon-anim btn square pilih-konsul' onclick='select_konsul(\"{$id_form}\")'><i class='icon-rocket'></i></button>";
				$tombol_cetak = "<button class='btn btn-primary btn-icon-anim btn square' id='myButton' onclick='print_lembar_konsul(\"{$id_form}\")'><i class='icon-printer'></i></button>";
				$hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_lembar_konsul(\"{$id_form}\")'><i class='fa fa-trash'></i></button>";

				$poli = $page_data[$i]->nama_poli ?? '';
				$dokter = $page_data[$i]->nama_dokter ?? '';
				$diagnosa = $page_data[$i]->diagnosis ?? '';
				$nama_pasien = $page_data[$i]->nama ?? '';

				$tanggal_lahir = new DateTime($page_data[$i]->tgl_lahir ?? '');
				$today = new DateTime();
				$usia = $today->diff($tanggal_lahir)->y . ' tahun';

				$tanggal = strtotime($page_data[$i]->tanggal ?? '');
				$date = strftime("%A, %d %B %Y ", $tanggal) . " " . strftime("%H:%M WIB", $tanggal);

				$keluhan = $page_data[$i]->keluhan ?? '-';

				$status = $page_data[$i]->verifikasi;

				$mapping = [
					'menunggu_balasan' => ['Menunggu Balasan', 'badge-warning'],
					'terima' => ['Diterima', 'badge-success'],
					'tolak' => ['Ditolak', 'badge-danger'],
				];

				$label = $mapping[$status][0] ?? 'Tidak diketahui';

				$class = $mapping[$status][1] ?? 'badge-secondary';

				$verifikasi = "<span class='w-full badge {$class}' id='myButton'>{$label}</span>";


				$balasan = $page_data[$i]->balasan ?? '-';

				$out[] = [
					$tombol_balasan,
					$tombol_cetak,
					$nama_pasien,
					$usia,
					$date,
					$dokter,
					$poli,
					$diagnosa,
					$keluhan,
					$verifikasi,
					$balasan
				];
			}

			if (empty($out)) {
				echo json_encode(['data' => '']);
			} else {
				echo json_encode(['data' => $out]);
			}
			exit;
		} else {
			$page_data = $this->M_Lembar_konsul->get_form_lembar_rujukan_by_pelayanan($id_pelayanan);

			$out = [];
			for ($i = 0; $i < count($page_data); $i++) {
				$no = $i + 1;
				$id_form = $page_data[$i]->id_form_lembar_rujukan ?? '';

				$hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_lembar_konsul(\"{$id_form}\")'><i class='fa fa-trash'></i></button>";
				$tombol_cetak = "<button class='btn btn-primary btn-icon-anim btn square' id='myButton' onclick='print_lembar_konsul(\"{$id_form}\")'><i class='icon-printer'></i></button>";

				$poli = $page_data[$i]->nama_poli ?? '';
				$dokter = $page_data[$i]->nama_dokter ?? '';
				$diagnosa = $page_data[$i]->diagnosis ?? '';
				$nama_pasien = $page_data[$i]->nama ?? '';

				$tanggal_lahir = new DateTime($page_data[$i]->tgl_lahir ?? '');
				$today = new DateTime();
				$usia = $today->diff($tanggal_lahir)->y . ' tahun';

				$tanggal = strtotime($page_data[$i]->tanggal ?? '');
				$date = strftime("%A, %d %B %Y ", $tanggal) . " " . strftime("%H:%M WIB", $tanggal);

				$keluhan = $page_data[$i]->keluhan ?? '-';

				$status = $page_data[$i]->verifikasi;

				$mapping = [
					'menunggu_balasan' => ['Menunggu Balasan', 'badge-warning'],
					'terima' => ['Diterima', 'badge-success'],
					'tolak' => ['Ditolak', 'badge-danger'],
				];

				$label = $mapping[$status][0] ?? 'Tidak diketahui';

				$class = $mapping[$status][1] ?? 'label-secondary';

				$verifikasi = "<span class='badge {$class}' id='myButton'>{$label}</span>";


				$balasan = $page_data[$i]->balasan ?? '-';

				$out[] = [
					$hapus,
					$tombol_cetak,
					$nama_pasien,
					$usia,
					$date,
					$dokter,
					$poli,
					$diagnosa,
					$keluhan,
					$verifikasi,
					$balasan
				];
			}

			if (empty($out)) {
				echo json_encode(['data' => '']);
			} else {
				echo json_encode(['data' => $out]);
			}
			exit;
		}
	}
}
