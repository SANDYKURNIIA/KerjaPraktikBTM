<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_infus_sehari extends CI_Controller
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
    public function forminfus($id_pelayanan, $id_history)
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
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();


		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_infus_sehari';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function tampil_list_per_id()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm_ranap->selectInfusSehari($id_pelayanan);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_infus . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $page_data[$i]->id_infus . "\")' '><i class='icon-trash'></i></button>";

			$laporan = $page_data[$i]->laporan;
			$mulai_pukul = $page_data[$i]->mulai_pukul;
			$isi = $page_data[$i]->isi;
			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal);
			// $gambar = null;
            // foreach (explode(',', $page_data[$i]->file) as $image) { // 1, 2, 3
            //     $gambar .= "<img src='".base_url()."assets/images/" . $image . "' class='img-responsive zoom'><br>";
            // }
			$out[$i] = array($no, $tombol,$hapus,$date,$isi,$mulai_pukul,$laporan);
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
	public function insert_infus()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$img = $this->input->post('ttd');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = "assets/images/" . uniqid(time(), true) . ".png";
		$success = file_put_contents($file, $data);
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('mulai_pukul', 'Mulai Pukul', 'required');
		$this->form_validation->set_rules('laporan', 'Laporan', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tanggal' => $this->input->post('tanggal'),
				'isi' => $this->input->post('isi'),
				'mulai_pukul' => $this->input->post('mulai_pukul'),
				'laporan' => $this->input->post('laporan'),
				'ttd' => $file,
				'tanggal_input' => $tgl,
				'staff' => $staff,
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_ranap->insert($data, 'daftar_infus_sehari');
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'tanggal' => form_error('tanggal'),
				'mulai_pukul' => form_error('dokter_merawat'),
				'laporan' => form_error('dokter_pengirim'),
				'isi' => form_error('skor_total'),
			);
		}
		echo json_encode($out);
	}
	public function getPerRencana()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('daftar_infus_sehari', ['id_infus' => $id])->row_array();
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
	function hapus_infus()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_infus' => $id,
		);
		$this->M_Erm_ranap->delete($where, 'daftar_infus_sehari');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function edit_infus()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$id = $this->input->post('id');
		$img = $this->input->post('ttd');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = "assets/images/" . uniqid(time(), true) . ".png";
		$success = file_put_contents($file, $data);
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('mulai_pukul', 'Mulai Pukul', 'required');
		$this->form_validation->set_rules('laporan', 'Laporan', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tanggal' => $this->input->post('tanggal'),
				'isi' => $this->input->post('isi'),
				'mulai_pukul' => $this->input->post('mulai_pukul'),
				'laporan' => $this->input->post('laporan'),
				'ttd' => $file,
				'tanggal_input' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm_ranap->update_infus($id,$data);
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'tanggal' => form_error('tanggal'),
				'mulai_pukul' => form_error('dokter_merawat'),
				'laporan' => form_error('dokter_pengirim'),
				'isi' => form_error('skor_total'),
			);
		}
		echo json_encode($out);
	}
}
?>
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_infus_sehari extends CI_Controller
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
    public function forminfus($id_pelayanan, $id_history)
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
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();


		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_infus_sehari';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function tampil_list_per_id()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->M_Erm_ranap->selectInfusSehari($id_pelayanan);

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_infus . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $page_data[$i]->id_infus . "\")' '><i class='icon-trash'></i></button>";

			$laporan = $page_data[$i]->laporan;
			$mulai_pukul = $page_data[$i]->mulai_pukul;
			$isi = $page_data[$i]->isi;
			$tanggal = strtotime($page_data[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal);
			// $gambar = null;
            // foreach (explode(',', $page_data[$i]->file) as $image) { // 1, 2, 3
            //     $gambar .= "<img src='".base_url()."assets/images/" . $image . "' class='img-responsive zoom'><br>";
            // }
			$out[$i] = array($no, $tombol,$hapus,$date,$isi,$mulai_pukul,$laporan);
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
	public function insert_infus()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$img = $this->input->post('ttd');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = "assets/images/" . uniqid(time(), true) . ".png";
		$success = file_put_contents($file, $data);
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('mulai_pukul', 'Mulai Pukul', 'required');
		$this->form_validation->set_rules('laporan', 'Laporan', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tanggal' => $this->input->post('tanggal'),
				'isi' => $this->input->post('isi'),
				'mulai_pukul' => $this->input->post('mulai_pukul'),
				'laporan' => $this->input->post('laporan'),
				'ttd' => $file,
				'tanggal_input' => $tgl,
				'staff' => $staff,
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_ranap->insert($data, 'daftar_infus_sehari');
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'tanggal' => form_error('tanggal'),
				'mulai_pukul' => form_error('dokter_merawat'),
				'laporan' => form_error('dokter_pengirim'),
				'isi' => form_error('skor_total'),
			);
		}
		echo json_encode($out);
	}
	public function getPerRencana()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('daftar_infus_sehari', ['id_infus' => $id])->row_array();
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
	function hapus_infus()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_infus' => $id,
		);
		$this->M_Erm_ranap->delete($where, 'daftar_infus_sehari');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function edit_infus()
	{
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d h:i:s");
		$staff = $data->id_staff;
		$id = $this->input->post('id');
		$img = $this->input->post('ttd');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = "assets/images/" . uniqid(time(), true) . ".png";
		$success = file_put_contents($file, $data);
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('mulai_pukul', 'Mulai Pukul', 'required');
		$this->form_validation->set_rules('laporan', 'Laporan', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tanggal' => $this->input->post('tanggal'),
				'isi' => $this->input->post('isi'),
				'mulai_pukul' => $this->input->post('mulai_pukul'),
				'laporan' => $this->input->post('laporan'),
				'ttd' => $file,
				'tanggal_input' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm_ranap->update_infus($id,$data);
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'tanggal' => form_error('tanggal'),
				'mulai_pukul' => form_error('dokter_merawat'),
				'laporan' => form_error('dokter_pengirim'),
				'isi' => form_error('skor_total'),
			);
		}
		echo json_encode($out);
	}
}
?>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
