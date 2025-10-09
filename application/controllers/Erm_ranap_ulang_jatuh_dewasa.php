<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_ulang_jatuh_dewasa extends CI_Controller
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
	public function formulangjatuhdewasa($id_pelayanan, $id_history)
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
		$page_data['agama'] = $selectPasien->agama;
		$page_data['nama_ruangan'] = $selectPasien->poli;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();


		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_ulang_jatuh_dewasa';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	// public function edit_ulang_dewasa($id_pelayanan, $id_history)
	// {
	// 	$selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
	// 	// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
	// 	$staff = $this->session->userdata('data_auth');

	// 	$page_data['nama'] = $selectPasien->nama;
	// 	// $page_data['no_hp'] = $selectPasien->no_hp;
	// 	// $page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
	// 	$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
	// 	$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
	// 	$page_data['cara_bayar'] = $selectPasien->cara_bayar;
	// 	$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
	// 	$page_data['staff'] = $staff->id_staff;
	// 	$page_data['no_rm'] = $selectPasien->no_rm;
	// 	$page_data['id_pelayanan'] = $id_pelayanan;
	// 	$page_data['id_history'] = $id_history;
	// 	$page_data['agama'] = $selectPasien->agama;
	// 	$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();


	// 	// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
	// 	// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

	// 	$this->load->view('assets/_header');
	// 	$page_data['page_content'] = 'erm_form/Ranap_Edit/view_ulang_jatuh_dewasa';
	// 	$this->load->view('Main', $page_data);
	// 	$this->load->view('assets/_footer');
	// }



	public function insert_asesmen()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;

		// Validasi form
		$this->form_validation->set_rules('jatuh', 'Riwayat Jatuh', 'required');
		$this->form_validation->set_rules('sekunder', 'Diagnosa Sekunder', 'required');
		$this->form_validation->set_rules('bantu', 'Alat Bantu', 'required');
		$this->form_validation->set_rules('infus', 'Infus', 'required');
		$this->form_validation->set_rules('berjalan', 'Gaya Berjalan', 'required');
		$this->form_validation->set_rules('mental', 'Status Mental', 'required');
		$this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
		$this->form_validation->set_rules('tipe_resiko', 'Tipe Resiko', 'required');

		if ($this->form_validation->run()) {
			// Data untuk tabel asesmen_ulang_dewasa
			$data_asesmen = array(
				'id_pelayanan'    => $this->input->post('id_pelayanan'),
				'id_history'      => $this->input->post('id_history'),
				'no_rm'           => $this->input->post('no_rm'),
				'riwayat_jatuh'   => $this->input->post('jatuh'),
				'diagnosa_sekunder' => $this->input->post('sekunder'),
				'bantu'      		=> $this->input->post('bantu'),
				'infus'           => $this->input->post('infus'),
				'gaya_jalan'      => $this->input->post('berjalan'),
				'status_mental'   => $this->input->post('mental'),
				'skor_total'      => $this->input->post('skor_total'),
				'tipe_resiko'     => $this->input->post('tipe_resiko'),
				'diagnosa'        => $this->input->post('diagnosa'),
				'tanggal'         => $tgl,
				'staff'           => $staff,
			);

			// Simpan data ke tabel asesmen_ulang_dewasa
			$this->M_Erm_ranap->insert($data_asesmen, 'asesmen_ulang_dewasa');

			// Dapatkan id_asesmen yang baru disimpan
			$id_asesmen = $this->db->insert_id();

			// Data untuk tabel resiko_ulang_jatuh_dewasa
			$data_resiko = array(
				'id_asesmen'        => $id_asesmen, // Foreign key dari tabel asesmen_ulang_dewasa
				'observasi'         => $this->input->post('observasi'),
				'pagar'             => $this->input->post('pagar'),
				'posisi'            => $this->input->post('posisi'),
				'edukasi'           => $this->input->post('edukasi'),
				'monitor'           => $this->input->post('monitor'),
				'kaoskaki'          => $this->input->post('kaoskaki'),
				'lokasi_kamar_mandi' => $this->input->post('lokasi_kamar_mandi'),
				'orientasi_bertahap' => $this->input->post('orientasi_bertahap'),
				'tempat_bel'        => $this->input->post('tempat_bel'),
				'bantuan_perawat'   => $this->input->post('bantuan_perawat'),
				'lantai_licin'      => $this->input->post('lantai_licin'),
				'aktivitas_sedang'  => $this->input->post('aktivitas_sedang'),
				'pakai_gelang'      => $this->input->post('pakai_gelang'),
				'pasang_gambar'     => $this->input->post('pasang_gambar'),
				'tempat_tanda'      => $this->input->post('tempat_tanda'),
				'obatan'            => $this->input->post('obatan'),
				'alat_bantu'        => $this->input->post('alat_bantu'),
				'partisipasi_keluarga' => $this->input->post('partisipasi_keluarga'),
				'aktivitas_tinggi'  => $this->input->post('aktivitas_tinggi'),
				'ruangan_diagnostic' => $this->input->post('ruangan_diagnostic'),
				'penempatan_pasien' => $this->input->post('penempatan_pasien'),
			);

			// Simpan data ke tabel resiko_ulang_jatuh_dewasa
			$this->M_Erm_ranap->insert($data_resiko, 'resiko_ulang_jatuh_dewasa');

			$out['status'] = "success";
		} else {
			// Jika validasi gagal
			$out = array(
				'error' => true,
				'riwayat_jatuh'   => form_error('jatuh'),
				'diagnosa_sekunder' => form_error('sekunder'),
				'bantu		'      => form_error('bantu'),
				'infus'           => form_error('infus'),
				'gaya_jalan'      => form_error('berjalan'),
				'status_mental'   => form_error('mental'),
				'skor_total'      => form_error('skor_total'),
				'tipe_resiko'     => form_error('tipe_resiko'),
			);
		}

		echo json_encode($out);
	}

	public function update_asesmen()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$id = $this->input->post('id');

		// Validasi form
		$this->form_validation->set_rules('jatuh', 'Riwayat Jatuh', 'required');
		$this->form_validation->set_rules('sekunder', 'Diagnosa Sekunder', 'required');
		$this->form_validation->set_rules('bantu', 'Alat Bantu', 'required');
		$this->form_validation->set_rules('infus', 'Infus', 'required');
		$this->form_validation->set_rules('berjalan', 'Gaya Berjalan', 'required');
		$this->form_validation->set_rules('mental', 'Status Mental', 'required');
		$this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
		$this->form_validation->set_rules('tipe_resiko', 'Tipe Resiko', 'required');

		if ($this->form_validation->run()) {
			// Data untuk tabel asesmen_ulang_dewasa
			$data_asesmen = array(
				'id_pelayanan'    => $this->input->post('id_pelayanan'),
				'id_history'      => $this->input->post('id_history'),
				'no_rm'           => $this->input->post('no_rm'),
				'riwayat_jatuh'   => $this->input->post('jatuh'),
				'diagnosa_sekunder' => $this->input->post('sekunder'),
				'bantu'      		=> $this->input->post('bantu'),
				'infus'           => $this->input->post('infus'),
				'gaya_jalan'      => $this->input->post('berjalan'),
				'status_mental'   => $this->input->post('mental'),
				'skor_total'      => $this->input->post('skor_total'),
				'tipe_resiko'     => $this->input->post('tipe_resiko'),
				'diagnosa'        => $this->input->post('diagnosa'),
				'tanggal'         => $tgl,
				'staff'           => $staff,
			);

			// Update data ke tabel asesmen_ulang_dewasa
			$this->M_Erm_ranap->update_ulang_dewasa($id, $data_asesmen);

			$id_asesmen = $this->db->insert_id();


			// Data untuk tabel resiko_ulang_jatuh_dewasa
			$data_resiko = array(
				'id_asesmen'        => $id_asesmen, // Foreign key dari tabel asesmen_ulang_dewasa
				'observasi'         => $this->input->post('observasi'),
				'pagar'             => $this->input->post('pagar'),
				'posisi'            => $this->input->post('posisi'),
				'edukasi'           => $this->input->post('edukasi'),
				'monitor'           => $this->input->post('monitor'),
				'kaoskaki'          => $this->input->post('kaoskaki'),
				'lokasi_kamar_mandi' => $this->input->post('lokasi_kamar_mandi'),
				'orientasi_bertahap' => $this->input->post('orientasi_bertahap'),
				'tempat_bel'        => $this->input->post('tempat_bel'),
				'bantuan_perawat'   => $this->input->post('bantuan_perawat'),
				'lantai_licin'      => $this->input->post('lantai_licin'),
				'aktivitas_sedang'  => $this->input->post('aktivitas_sedang'),
				'pakai_gelang'      => $this->input->post('pakai_gelang'),
				'pasang_gambar'     => $this->input->post('pasang_gambar'),
				'tempat_tanda'      => $this->input->post('tempat_tanda'),
				'obatan'            => $this->input->post('obatan'),
				'alat_bantu'        => $this->input->post('alat_bantu'),
				'partisipasi_keluarga' => $this->input->post('partisipasi_keluarga'),
				'aktivitas_tinggi'  => $this->input->post('aktivitas_tinggi'),
				'ruangan_diagnostic' => $this->input->post('ruangan_diagnostic'),
				'penempatan_pasien' => $this->input->post('penempatan_pasien'),
			);

			// Update data ke tabel resiko_ulang_jatuh_dewasa
			$this->M_Erm_ranap->update_resiko_ulang_jatuh($id, $data_resiko);

			$out['status'] = "success";
		} else {
			// Jika validasi gagal
			$out = array(
				'error' => true,
				'riwayat_jatuh'   => form_error('jatuh'),
				'diagnosa_sekunder' => form_error('sekunder'),
				'bantu		'      => form_error('bantu'),
				'infus'           => form_error('infus'),
				'gaya_jalan'      => form_error('berjalan'),
				'status_mental'   => form_error('mental'),
				'skor_total'      => form_error('skor_total'),
				'tipe_resiko'     => form_error('tipe_resiko'),
			);
		}

		echo json_encode($out);
	}



	// public function insert_asesmen()
	// {
	// 	$data = $this->session->userdata('data_auth');
	// 	$tgl = date("Y-m-d h:i:s");
	// 	$staff = $data->id_staff;
	// 	$this->form_validation->set_rules('jatuh', 'Riwayat Jatuh', 'required');
	// 	$this->form_validation->set_rules('sekunder', 'Diagnosa Sekunder', 'required');
	// 	$this->form_validation->set_rules('bantu', 'Alat Bantu', 'required');
	// 	$this->form_validation->set_rules('infus', 'Infus', 'required');
	// 	$this->form_validation->set_rules('berjalan', 'Gaya Berjalan', 'required');
	// 	$this->form_validation->set_rules('mental', 'Status Mental', 'required');
	// 	$this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
	// 	if ($this->form_validation->run()) {
	// 		$data = array(
	// 			'id_pelayanan' => $this->input->post('id_pelayanan'),
	// 			'id_history' => $this->input->post('id_history'),
	// 			'no_rm' => $this->input->post('no_rm'),
	// 			'riwayat_jatuh' => $this->input->post('jatuh'),
	// 			'diagnosa_sekunder' => $this->input->post('sekunder'),
	// 			'alat_bantu' => $this->input->post('bantu'),
	// 			'infus' => $this->input->post('infus'),
	// 			'gaya_jalan' => $this->input->post('berjalan'),
	// 			'status_mental' => $this->input->post('mental'),
	// 			'skor_total' => $this->input->post('skor_total'),
	// 			'diagnosa' => $this->input->post('diagnosa'),
	// 			'tanggal' => $tgl,
	// 			'staff' => $staff,
	// 		);
	// 		// $data2 = array(
	// 		// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
	// 		// 	'id_history' => $this->input->post('id_history'),
	// 		// 	'no_rm' => $this->input->post('no_rm'),
	// 		// );
	// 		$this->M_Erm_ranap->insert($data, 'asesmen_ulang_dewasa');
	// 		// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
	// 		$out['status'] = "success";
	// 	} else {
	// 		$out = array(
	// 			'error'   => true,
	// 			'riwayat_jatuh' => form_error('jatuh'),
	// 			'diagnosa_sekunder' => form_error('sekunder'),
	// 			'alat_bantu' => form_error('bantu'),
	// 			'infus' => form_error('infus'),
	// 			'gaya_jalan' => form_error('jalan'),
	// 			'status_mental' => form_error('mental'),
	// 			'skor_total' => form_error('skor_total'),
	// 		);
	// 	}
	// 	echo json_encode($out);
	// }
	// public function update_asesmen()
	// {
	// 	$data = $this->session->userdata('data_auth');
	// 	$tgl = date("Y-m-d h:i:s");
	// 	$staff = $data->id_staff;
	// 	$id = $this->input->post('id');
	// 	$this->form_validation->set_rules('jatuh', 'Riwayat Jatuh', 'required');
	// 	$this->form_validation->set_rules('sekunder', 'Diagnosa Sekunder', 'required');
	// 	$this->form_validation->set_rules('bantu', 'Alat Bantu', 'required');
	// 	$this->form_validation->set_rules('infus', 'Infus', 'required');
	// 	$this->form_validation->set_rules('berjalan', 'Gaya Berjalan', 'required');
	// 	$this->form_validation->set_rules('mental', 'Status Mental', 'required');
	// 	$this->form_validation->set_rules('skor_total', 'Skor Total', 'required');
	// 	if ($this->form_validation->run()) {
	// 		$data = array(
	// 			'id_pelayanan' => $this->input->post('id_pelayanan'),
	// 			'id_history' => $this->input->post('id_history'),
	// 			'no_rm' => $this->input->post('no_rm'),
	// 			'riwayat_jatuh' => $this->input->post('jatuh'),
	// 			'diagnosa_sekunder' => $this->input->post('sekunder'),
	// 			'alat_bantu' => $this->input->post('bantu'),
	// 			'infus' => $this->input->post('infus'),
	// 			'gaya_jalan' => $this->input->post('berjalan'),
	// 			'status_mental' => $this->input->post('mental'),
	// 			'skor_total' => $this->input->post('skor_total'),
	// 			'diagnosa' => $this->input->post('diagnosa'),
	// 			'tanggal' => $tgl,
	// 			'staff' => $staff,
	// 		);

	// 		$this->M_Erm_ranap->update_ulang_dewasa($id, $data);
	// 		$out['status'] = "success";
	// 	} else {
	// 		$out = array(
	// 			'error'   => true,
	// 			'riwayat_jatuh' => form_error('jatuh'),
	// 			'diagnosa_sekunder' => form_error('sekunder'),
	// 			'alat_bantu' => form_error('bantu'),
	// 			'infus' => form_error('infus'),
	// 			'gaya_jalan' => form_error('jalan'),
	// 			'status_mental' => form_error('mental'),
	// 			'skor_total' => form_error('skor_total'),
	// 		);
	// 	}
	// 	echo json_encode($out);
	// }

	// public function get_ass_per()
	// {
	// 	// Mendapatkan id dari POST request
	// 	$id = $this->input->post('id');

	// 	// Query untuk mengambil data dari tabel asesmen_ulang_dewasa berdasarkan id_history
	// 	$asesmen = $this->db->get_where('asesmen_ulang_dewasa', ['id_asesmen' => $id])->row_array();

	// 	// Cek apakah data asesmen ditemukan
	// 	if ($asesmen == null) {
	// 		// Jika data asesmen tidak ditemukan
	// 		echo '{"data":""}';
	// 		exit;
	// 	} else {
	// 		// Jika data asesmen ditemukan, ambil id_asesmen
	// 		$id_asesmen = $asesmen['id_asesmen'];

	// 		// Query untuk mengambil data dari tabel resiko_ulang_jatuh_dewasa berdasarkan id_asesmen
	// 		$resiko = $this->db->get_where('resiko_ulang_jatuh_dewasa', ['id_asesmen' => $id_asesmen])->row_array();

	// 		// Gabungkan data asesmen dan data resiko
	// 		$data = [
	// 			'asesmen' => $asesmen,
	// 			'resiko' => $resiko
	// 		];

	// 		// Kirimkan data dalam bentuk JSON
	// 		echo json_encode($data);
	// 		exit;
	// 	}
	// }

// 	public function get_ass_per()
// {
//     $id = $this->input->post('id');

//     // Ambil data dari tabel pertama: 'asesmen_ulang_dewasa'
//     $db1 = $this->db->get_where('asesmen_ulang_dewasa', ['id_asesmen' => $id])->row_array();

//     // Ambil data dari tabel kedua: 'resiko_ulang_jatuh_dewasa'
//     $db2 = $this->db->get_where('resiko_ulang_jatuh_dewasa', ['id_asesmen' => $id])->row_array();

//     // Gabungkan data dari kedua tabel
//     if (!empty($db1) || !empty($db2)) {
//         $result = [
//             'status_dt' => 'found',
//             'data_asesmen_ulang_dewasa' => $db1,
//             'data_resiko_ulang_jatuh_dewasa' => $db2,
//         ];
//     } else {
//         $result = [
//             'status_dt' => 'not found',
//             'data_asesmen_ulang_dewasa' => null,
//             'data_resiko_ulang_jatuh_dewasa' => null,
//         ];
//     }

//     echo json_encode($result);
//     exit;
// }




	// public function get_ass_per()
	// {
	// 	$id = $this->input->post('id');
	// 	$db = $this->db->get_where('asesmen_ulang_dewasa', ['id_asesmen' => $id])->row_array();
	// 	if (count($db) > 0) {
	// 		$db = $db;
	// 		$db['status_dt'] = 'found';
	// 	} else {
	// 		$db = null;
	// 		$db['status_dt'] = 'not found';
	// 	}
	// 	echo json_encode($db);
	// 	exit;
	// }

	public function get_ass_per()
{
    $id = $this->input->post('id');
    
    // Menggabungkan data dari dua tabel menggunakan JOIN
    $this->db->select('a.*, b.*');
    $this->db->from('asesmen_ulang_dewasa a');
    $this->db->join('resiko_ulang_jatuh_dewasa b', 'a.id_asesmen = b.id_asesmen', 'left');
    $this->db->where('a.id_asesmen', $id);
    $db = $this->db->get()->row_array();
    
    if (!empty($db)) {
        $db['status_dt'] = 'found';
    } else {
        $db = ['status_dt' => 'not found'];
    }
    
    echo json_encode($db);
    exit;
}


	// public function get_ass_per()
	// {
	// 	$id = $this->input->post('id');
	// 	$db = $this->db->get_where('resiko_ulang_jatuh_dewasa', ['id_asesmen' => $id])->row_array();
	// 	if (count($db) > 0) {
	// 		$db = $db;
	// 		$db['status_dt'] = 'found';
	// 	} else {
	// 		$db = null;
	// 		$db['status_dt'] = 'not found';
	// 	}
	// 	echo json_encode($db);
	// 	exit;
	// }

	// public function get_ass_per()
	// {
	// 	$id = $this->input->post('id');
	// 	$db = $this->db->get_where('asesmen_ulang_dewasa', ['id_history' => $id])->row_array();
	// 	if ($db == null) {
	// 		echo '{"data":""}';
	// 		exit;
	// 	} else {
	// 		$page_data = $db;
	// 		echo json_encode($page_data);
	// 		exit;
	// 	}
	// }



 public function tampil_list_per_pen_rujukan()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');


        $dataFromRanap = $this->db->get_where('form_ass_per_ranap', ['id_pelayanan' => $id_pelayanan])->row();
       
        $page_data = $this->M_Erm_ranap->selectUlangJatuh($id_pelayanan);
       
        $skor_total = $dataFromRanap->umur +
            $dataFromRanap->jenis_kelamin +
            $dataFromRanap->diagnosis +
            $dataFromRanap->gangguan +
            $dataFromRanap->faktor +
            $dataFromRanap->anestesi;


        $tipeResikoRanap = 'rendah';


        if ($skor_total >= 50) {
            $tipeResikoRanap = "tinggi";
        }




        $new_row = (object) [
            'skor_total' => $skor_total,
            'id_asesmen' => $dataFromRanap->id_form,
            'id_form' => $dataFromRanap->id_form,
            'tanggal' => $dataFromRanap->tanggal,
            'tipe_resiko' => $tipeResikoRanap,
            'staff' => $dataFromRanap->staff,
            'gaya_jalan ' => "ranap"
        ];



        if($dataFromRanap->id_form){
            $page_data[] = $new_row;
        }


        $data = $this->session->userdata('data_auth');
        $staff = $data->nama;
        if ($staff == "st32") {
            $nama = "rawatinap";
        } else {
            $data->nama;
        }






        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol = null;


           
            $tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_asesmen . "\")'><i class='icon-rocket'></i></button>";


            if (isset($page_data[$i]->id_form)) {
                $tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilihRanap(\"" . $page_data[$i]->id_asesmen . "\")'><i class='icon-rocket'></i></button>";
            }


           
            // $hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $page_data[$i]->id_asesmen . "\")'><i class='icon-trash'></i></button>";


            $skor_total = $page_data[$i]->skor_total;
            // $diagnosa = $page_data[$i]->diagnosa;
            $tanggal = strtotime($page_data[$i]->tanggal);
            $date = strftime("%A, %d %B %Y ", $tanggal);
            $tipe_resiko = $page_data[$i]->tipe_resiko;




            $staff = $staff;


            $out[$i] = array($no, $tombol,$skor_total, $date, $staff, $tipe_resiko);
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

	public function get_ass_per_ranap()
        {
            $id = $this->input->post('id');
           
            // Menggabungkan data dari dua tabel menggunakan JOIN
            $this->db->select('a.*');
            $this->db->from('form_ass_per_ranap a');
            $this->db->where('a.id_form', $id);
            $db = $this->db->get()->row_array();
           
            if (!empty($db)) {
                $db['status_dt'] = 'found';
            } else {
                $db = ['status_dt' => 'not found'];
            }
           
            echo json_encode($db);
            exit;
        }
		public function update_asesmen_ranap()
    {
        // Ambil data dari AJAX POST
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history   = $this->input->post('id_history');
        $no_rm        = $this->input->post('no_rm');


        $jatuh        = $this->input->post('jatuh');
        $sekunder     = $this->input->post('sekunder');
        $bantu        = $this->input->post('bantu');
        $infus        = $this->input->post('infus');
        $berjalan     = $this->input->post('berjalan');
        $mental       = $this->input->post('mental');


        // Siapkan data untuk update
        $data = [
            'umur'          => $jatuh,
            'jenis_kelamin' => $sekunder,
            'diagnosis'     => $bantu,
            'gangguan'      => $infus,
            'faktor'        => $berjalan,
            'anestesi'      => $mental,
            'tanggal'       => date('Y-m-d H:i:s')
        ];


        // Jalankan query update langsung tanpa model
        $this->db->where('id_history', $id_history);
        $this->db->where('id_pelayanan', $id_pelayanan);
        $update = $this->db->update('form_ass_per_ranap', $data);


        // Kirim respon JSON ke AJAX
        if ($update) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal mengupdate data.']);
        }
    }







	
}
