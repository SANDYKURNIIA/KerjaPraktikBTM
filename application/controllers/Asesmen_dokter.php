<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asesmen_dokter extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Pencarian_Pasien');
	}

	public function form($id_pel, $id_his, $jenis_pelayanan)
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
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['jenis_pelayanan'] = $jenis_pelayanan;

		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();

		if ($selectPasien->poli == "MATA") {
			$page_data['gambar'] = base_url("assets/dist/img/test.jpg");
		} else {
			$page_data['gambar'] = base_url("assets/dist/img/orang1.png");
		}

		$page_data['url'] = base_url('Erm_poli/form/') . $id_pel . '/' . $id_his . '/' . $jenis_pelayanan;
		// $asses_per_igd = $this->M_Erm_poli->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		//////////////  antrol ///////////////////////

		$antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $id_pelayanan, 'poli' => $selectPasien->nama_poli]);
		if (count($antrian->result()) > 0) {
			$kodebooking = $antrian->row()->id_antrian;
			$schedule_antrian = $this->db->get_where('schedule_antrol_task', ['kodebooking' => $kodebooking, 'taskid' => 4])->row();
			if (empty($schedule_antrian)) {
				if (preg_match("/BPJS/i", $selectPasien->cara_bayar)) {
					echo "<script type='text/javascript'>alert('Mohon Isi Asesmen Keperawatan Terlebih Dahulu');window.history.go(-1);</script>";
				} else {
					$data_antrol = [
						'kodebooking' => $antrian->row()->id_antrian,
						'taskid' => 5,
						'waktu' => strtotime('now') * 1000
					];
					update_antrian($data_antrol);

					$this->load->view('assets/_header');
					$page_data['page_content'] = 'erm_form/view_ases_dokter';
					$this->load->view('Main', $page_data);
					$this->load->view('assets/_footer');
				}
			} else {
				$data_antrol = [
					'kodebooking' => $antrian->row()->id_antrian,
					'taskid' => 5,
					'waktu' => strtotime('now') * 1000
				];
				update_antrian($data_antrol);

				$this->load->view('assets/_header');
				$page_data['page_content'] = 'erm_form/view_ases_dokter';
				$this->load->view('Main', $page_data);
				$this->load->view('assets/_footer');
			}

			// echo $antrian->row()->id_antrian;

		} else {


			$this->load->view('assets/_header');
			$page_data['page_content'] = 'erm_form/view_ases_dokter';
			$this->load->view('Main', $page_data);
			$this->load->view('assets/_footer');
		}
		///////////////////////////end///////////////////////////////////////////



	}
	public function edit_asses_dok_igd($id_pel, $id_his, $jenis_pelayanan)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));


		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDbyid($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;

		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;
		$page_data['jenis_pelayanan'] = $jenis_pelayanan;
		
		if ($selectPasien->poli == "MATA") {
			$page_data['gambar'] = base_url("assets/dist/img/test.jpg");
		} else {
			$page_data['gambar'] = base_url("assets/dist/img/orang1.png");
		}
		// $asses_per_igd = $this->M_Erm_poli->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ?  $asses_per_igd[0] : $asses_per_igd;
		// $page_data['url'] = base_url('Asesmen_dokter/edit_asses_dok_igd/') . $id_pel . '/' . $id_his . '/' . $jenis_pelayanan;
		$page_data['url'] = base_url('Erm_poli/form/') . $id_pel . '/' . $id_his . '/' . $jenis_pelayanan;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_ases_dokter';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function insert_asses_dokter()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$img = $this->input->post('gambar');
		if ($img != "") {
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = "assets/images/" . uniqid(time(), true) . ".png";
			$success = file_put_contents($file, $data);
		} else {
			$file = "";
		}
		$img1 = $this->input->post('ttd');
		if ($img1 != "") {
			$img1 = str_replace('data:image/png;base64,', '', $img1);
			$img1 = str_replace(' ', '+', $img1);
			$data1 = base64_decode($img1);
			$file1 = "assets/images/" . uniqid(time(), true) . ".png";
			$success1 = file_put_contents($file1, $data1);
		} else {
			$file1 = "";
		}

		$keluhan = $this->input->post('keluhan');
		$riwayat = $this->input->post('riwayat');
		$riwayat_dulu = $this->input->post('riwayat_dulu');
		$riwayat_alergi = $this->input->post('riwayat_alergi');

		$tindak_lanjut = $this->input->post('tindak_lanjut');
		$konsul = $this->input->post('konsul');
		$keadaan_pulang = $this->input->post('kondisi_pulang');
		$terapi = $this->input->post('terapi');
		$paham = $this->input->post('paham');
		$error = [];
		$nama_lengkap = strtoupper($this->input->post('nama_lengkap'));
		// if (empty($keluhan)) {
		// 	$error['keluhan'] = '*wajib diisi';
		// }
		// if (empty($riwayat)) {
		// 	$error['riwayat'] = '*wajib diisi';
		// }
		// if (empty($riwayat_dulu)) {
		// 	$error['riwayat_dulu'] = '*wajib diisi';
		// }
		// if (empty($riwayat_alergi)) {
		// 	$error['riwayat_alergi'] = '*wajib diisi';
		// }

		// if (empty($tindak_lanjut)) {
		// 	$error['tindak_lanjut'] = '*wajib diisi';
		// }
		// if (empty($konsul)) {
		// 	$error['konsul'] = '*wajib diisi';
		// }
		// if (empty($keadaan_pulang)) {
		// 	$error['keadaan_pulang'] = '*wajib diisi';
		// }
		// if (empty($terapi)) {
		// 	$error['terapi'] = '*wajib diisi';
		// }
		// if (empty($paham)) {
		// 	$error['paham'] = '*wajib diisi';
		// }
		// if (empty($nama_lengkap)) {
		// 	$error['nama_lengkap'] = '*wajib diisi';
		// }
		// if (!empty($error)) {
		// 	$out['status'] = "failed";
		// 	$out['error'] = $error;
		// } else {
		$data   =   array(
			'no_rm' => $this->input->post('no_rm'),
			'id_pelayanan' => base64_decode(urldecode($this->input->post('id_pelayanan'))),
			'id_history' => base64_decode(urldecode($this->input->post('id_history'))),
			'alergi_obat' => $this->input->post('alergi_obat'),
			'riwayat_alergi' => $this->input->post('riwayat_alergi'),
			'kepala' => $this->input->post('kepala'),
			'hidung' => $this->input->post('hidung'),
			'mulut' => $this->input->post('mulut'),
			'leher' => $this->input->post('leher'),
			'thorax' => $this->input->post('thorax'),
			'jantung' => $this->input->post('jantung'),
			'paru' => $this->input->post('paru'),
			'andomen' => $this->input->post('andomen'),
			'punggung' => $this->input->post('punggung'),
			'ekstremitas' => $this->input->post('ekstremitas'),

			'prosedur_tindakan' => $this->input->post('prosedur_tindakan'),
    		'konsul' => $this->input->post('konsul'),
    		'diagnosa_utama' => $this->input->post('diagnosa_utama'),
    		'diagnosa_sekunder' => $this->input->post('diagnosa_sekunder'),

			'tindak_lanjut' => $this->input->post('tindak_lanjut'),
			'konsul' => $this->input->post('konsul'),
			'keadaan_pulang' => $this->input->post('kondisi_pulang'),
			// 'terapi' => null,
			'paham' => $this->input->post('paham'),
			'nama_lengkap' => strtoupper($this->input->post('nama_lengkap')),
			'keterangan' => $this->input->post('keterangan'),
			'gambar' => $file,
			'ttd' => $file1,
			'tanggal' => $tgl,
			'staff' => $staff,

		);

		$this->M_Erm_poli->insert($data, 'form_assesmen_dokter');

		$data_perawat   =   array(
			'keluhan_utama' => $this->input->post('keluhan_utama'),
			'penyakit_past' => $this->input->post('penyakit_past'),
			'penyakit_keluarga' => $this->input->post('penyakit_keluarga'),
			'alloanamnesa' => $this->input->post('alloanamnesa'),

		);
		$where = array(
			'id_pelayanan' => base64_decode(urldecode($this->input->post('id_pelayanan'))),
			'id_history' => base64_decode(urldecode($this->input->post('id_history'))),
		);
		// print $success ? $file : 'Unable to save the file.';
		// print $success1 ? $file1 : 'Unable to save the file.';
		$this->M_Erm_poli->update($data_perawat, $where, 'form_assesmen_awal_rajal');

		$out['status'] = "success";
		// }


		echo json_encode($out);
	}
	public function update_asses_dokter_igd()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$img = $this->input->post('gambar');
		if ($img != "") {
			$db = $this->db->get_where('form_assesmen_dokter', ['id_history' => base64_decode(urldecode($this->input->post('id_history')))])->row();
			$file_path = './' . $db->gambar;
			if (file_exists($file_path)) {
				unlink($file_path); // Hapus file
			}
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = "assets/images/" . uniqid(time(), true) . ".png";
			// $success = file_put_contents($file, $data); -> kalau diuncomment error
		} else {
			$file = "";
		}
		$img1 = $this->input->post('ttd');
		if ($img1 != "") {
			$db = $this->db->get_where('form_assesmen_dokter', ['id_history' => base64_decode(urldecode($this->input->post('id_history')))])->row();
			$file_path = './' . $db->ttd;
			if (file_exists($file_path)) {
				unlink($file_path); // Hapus file
			}
			$img1 = str_replace('data:image/png;base64,', '', $img1);
			$img1 = str_replace(' ', '+', $img1);
			$data1 = base64_decode($img1);
			$file1 = "assets/images/" . uniqid(time(), true) . ".png";
			$success1 = file_put_contents($file1, $data1);
		} else {
			$file1 = "";
		}

		$data   =   array(
			'no_rm' => $this->input->post('no_rm'),
			'id_pelayanan' => base64_decode(urldecode($this->input->post('id_pelayanan'))),
			'id_history' => base64_decode(urldecode($this->input->post('id_history'))),
			'alergi_obat' => $this->input->post('alergi_obat'),
			'riwayat_alergi' => $this->input->post('riwayat_alergi'),
			'kepala' => $this->input->post('kepala'),
			'hidung' => $this->input->post('hidung'),
			'mulut' => $this->input->post('mulut'),
			'leher' => $this->input->post('leher'),
			'thorax' => $this->input->post('thorax'),
			'jantung' => $this->input->post('jantung'),
			'paru' => $this->input->post('paru'),
			'andomen' => $this->input->post('andomen'),
			'punggung' => $this->input->post('punggung'),
			'ekstremitas' => $this->input->post('ekstremitas'),

			'prosedur_tindakan' => $this->input->post('prosedur_tindakan'),
			'konsul' => $this->input->post('konsul'),
			'diagnosa_utama' => $this->input->post('diagnosa_utama'),
			'diagnosa_sekunder' => $this->input->post('diagnosa_sekunder'),

			'tindak_lanjut' => $this->input->post('tindak_lanjut'),
			// 'konsul' => $this->input->post('konsul'),
			'keadaan_pulang' => $this->input->post('kondisi_pulang'),
			'paham' => $this->input->post('paham'),
			'nama_lengkap' => strtoupper($this->input->post('nama_lengkap')),
			'keterangan' => $this->input->post('keterangan'),
			'gambar' => $file,
			'ttd' => $file1,
			'tanggal' => $tgl,
			'staff' => $staff,

		);

		$where = array('id_form_ass_dokter' => $this->input->post('id'));
		$this->M_Erm_poli->update($data, $where, 'form_assesmen_dokter');

		$data_perawat   =   array(
			'keluhan_utama' => $this->input->post('keluhan_utama'),
			'penyakit_past' => $this->input->post('penyakit_past'),
			'penyakit_keluarga' => $this->input->post('penyakit_keluarga'),
			'alloanamnesa' => $this->input->post('alloanamnesa'),
		);
		$where = array(
			'id_pelayanan' => base64_decode(urldecode($this->input->post('id_pelayanan'))),
			'id_history' => base64_decode(urldecode($this->input->post('id_history'))),
		);
		// print $success ? $file : 'Unable to save the file.';
		// print $success1 ? $file1 : 'Unable to save the file.';
		$this->M_Erm_poli->update($data_perawat, $where, 'form_assesmen_awal_rajal');

		$out['status'] = "success";


		echo json_encode($out);
	}

	function hapus_data_diagnosa()
	{
		$id = $this->input->post('id');
		$where = array(
			'no_diagnosa' => $id,
		);
		$this->M_Erm_poli->delete($where, 'diagnosa_utama');
		$out['status'] = "success";
		echo json_encode($out);
	}
	function hapus_data_diagnosa1()
	{
		$id = $this->input->post('id');
		$where = array(
			'no_diagnosa' => $id,
		);
		$this->M_Erm_poli->delete($where, 'erm_diagnosa_dokter');
		$out['status'] = "success";
		echo json_encode($out);
	}

	public function get_ass_dok()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_assesmen_dokter', ['no_rm' => $id])->result();
		if (count($db) > 0) {
			$db = $db[0];
			$db->status_dt = 'found';
		} else {
			$db = null;
			$db['status_dt'] = 'not found';
		}
		echo json_encode($db);
	}
	public function get_ass_per()
	{
		$id = base64_decode(urldecode($this->input->post('id')));
		$db = $this->db->get_where('form_assesmen_awal_rajal', ['id_pelayanan' => $id])->result();
		if (count($db) > 0) {
			$db = $db[0];
			$db->status_dt = 'found';
		} else {
			$db = null;
			$db['status_dt'] = 'not found';
		}
		//echo $id;
		echo json_encode($db);
	}
	public function print_out()
	{
		$data['page_title'] = "Asesmen Dokter";
		$this->load->view('print/asesmen_dokter', $data);
	}

// 	public function simpan()
// {
//     $data = [
//         'terapi' => $this->input->post('terapi'),
//         'konsul' => $this->input->post('konsul'),
//         'diagnosa_utama' => $this->input->post('diagnosa_utama'),
//         'diagnosa_sekunder' => $this->input->post('diagnosa_sekunder'),
//     ];

//     $this->db->insert('form_assesmen_awal_rajal', $data);

//     echo json_encode(['status' => 'success']);
// }
public function simpan()
{
    $data = array(
        'prosedur_tindakan' => $this->input->post('prosedur_tindakan'),
        'konsul' => $this->input->post('konsul'),
        'diagnosa_utama' => $this->input->post('diagnosa_utama'),
        'diagnosa_sekunder' => $this->input->post('diagnosa_sekunder')
    );

    $this->db->insert('form_assesmen_dokter', $data);

    $this->session->set_flashdata('success', 'Data berhasil disimpan!');
}

}