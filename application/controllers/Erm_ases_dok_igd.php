<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ases_dok_igd extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm');
		$this->load->model('M_Pencarian_Pasien');
	}
	public function get_ass_dok()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_ass_dokter_igd', ['no_rm' => $id])->result();
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
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_ass_per_igd', ['id_pelayanan' => $id])->result();
		if (count($db) > 0) {
			$db = $db[0];
			$db->status_dt = 'found';
		} else {
			$db = null;
			$db['status_dt'] = 'not found';
		}
		echo json_encode($db);
	}
	
	public function form($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;

		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;

		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? [] : $asses_per_igd;
		$page_data['gambar'] = base_url("assets/dist/img/orang1.png");
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_asses_dokter_igd';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	
	public function form_riwayat($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;

		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;

		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? [] : $asses_per_igd;
		$page_data['gambar'] = base_url("assets/dist/img/orang1.png");
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_asses_dokter_igd';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_asses_dok_igd($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm->selectDataPasienIGDbyid($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;

		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;

		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ?  $asses_per_igd[0] : $asses_per_igd;

		$page_data['gambar'] = base_url("assets/dist/img/orang1.png");
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_asses_dokter_igd';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function riwayat_asses_dok_igd($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm->selectDataPasienIGDbyid($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;

		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['pasien'] = $selectPasien;

		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ?  $asses_per_igd[0] : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_asses_dokter_igd';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function insert_asses_dokter_igd()
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
		$psikologis = $this->input->post('psikologis');
		$ham_sos = $this->input->post('ham_sos');
		$ham_eko = $this->input->post('ham_eko');
		$ham_spirit = $this->input->post('ham_spirit');
		$kepala = $this->input->post('kepala');
		$hidung = $this->input->post('hidung');
		$mulut = $this->input->post('mulut');
		$leher = $this->input->post('leher');
		$thorax = $this->input->post('thorax');
		$jantung = $this->input->post('jantung');
		$paru = $this->input->post('paru');
		$andomen = $this->input->post('andomen');
		$punggung = $this->input->post('punggung');
		$ekstremitas = $this->input->post('ekstremitas');
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
		// if (empty($psikologis)) {
		// 	$error['psikologis'] = '*wajib diisi';
		// }
		// if (empty($ham_sos)) {
		// 	$error['ham_sos'] = '*wajib diisi';
		// }
		// if (empty($ham_eko)) {
		// 	$error['ham_eko'] = '*wajib diisi';
		// }
		// if (empty($ham_spirit)) {
		// 	$error['ham_spirit'] = '*wajib diisi';
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
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'keluhan' => $this->input->post('keluhan'),
				'riwayat' => $this->input->post('riwayat'),
				'riwayat_dulu' => $this->input->post('riwayat_dulu'),
				'riwayat_alergi' => $this->input->post('riwayat_alergi'),
				'alergi_obat' => $this->input->post('alergi_obat'),
				'psikologis' => $this->input->post('psikologis'),
				'ham_sos' => $this->input->post('ham_sos'),
				'ham_eko' => $this->input->post('ham_eko'),
				'ham_spirit' => $this->input->post('ham_spirit'),
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
				// 'usg' => $this->input->post('usg'),
				// 'ekg' => $this->input->post('ekg'),
				// 'ctg' => $this->input->post('ctg'),
				// 'periksa_lain' => $this->input->post('periksa_lain'),
				'tindak_lanjut' => $this->input->post('tindak_lanjut'),
				'konsul' => $this->input->post('konsul'),
				'keadaan_pulang' => $this->input->post('kondisi_pulang'),
				'terapi' => $this->input->post('terapi'),
				'paham' => $this->input->post('paham'),
				'nama_lengkap' => strtoupper($this->input->post('nama_lengkap')),
				'keterangan' => $this->input->post('keterangan'),
				'gambar' => $file,
				'ttd' => $file1,
				'tanggal' => $tgl,
				'staff' => $staff,
				// Yohanes Tambahan kolom baru
    			'diagnosa_utama_dokter' => $this->input->post('diagnosa_utama_dokter'),
    			'diagnosa_sekunder_dokter' => $this->input->post('diagnosa_sekunder_dokter'),

			);
			// print $success ? $file : 'Unable to save the file.';
			// print $success1 ? $file1 : 'Unable to save the file.';
			$this->M_Erm->insert($data, 'form_ass_dokter_igd');
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
		$data   =   array(
			'no_rm' => $this->input->post('no_rm'),
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'keluhan' => $this->input->post('keluhan'),
			'riwayat' => $this->input->post('riwayat'),
			'riwayat_dulu' => $this->input->post('riwayat_dulu'),
			'riwayat_alergi' => $this->input->post('riwayat_alergi'),
			'psikologis' => $this->input->post('psikologis'),
			'ham_sos' => $this->input->post('ham_sos'),
			'ham_eko' => $this->input->post('ham_eko'),
			'ham_spirit' => $this->input->post('ham_spirit'),
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
			// 'usg' => $this->input->post('usg'),
			// 'ekg' => $this->input->post('ekg'),
			// 'ctg' => $this->input->post('ctg'),
			// 'periksa_lain' => $this->input->post('periksa_lain'),
			'tindak_lanjut' => $this->input->post('tindak_lanjut'),
			'konsul' => $this->input->post('konsul'),
			'keadaan_pulang' => $this->input->post('kondisi_pulang'),
			'terapi' => $this->input->post('terapi'),
			'paham' => $this->input->post('paham'),
			'nama_lengkap' => strtoupper($this->input->post('nama_lengkap')),
			'keterangan' => $this->input->post('keterangan'),
			'gambar' => $file,
			'ttd' => $file1,
			'tanggal' => $tgl,
			'staff' => $staff,
			// Yohanes Tambahan kolom baru
    		'diagnosa_utama_dokter' => $this->input->post('diagnosa_utama_dokter'),
    		'diagnosa_sekunder_dokter' => $this->input->post('diagnosa_sekunder_dokter'),

		);
		$where = array('id_form_ass_dokter_igd'=> $this->input->post('id'));
		// print $success ? $file : 'Unable to save the file.';
		// print $success1 ? $file1 : 'Unable to save the file.';
		$this->M_Erm->update($data,$where, 'form_ass_dokter_igd');
		$out['status'] = "success";



		echo json_encode($out);
	}
	public function upload_file()
	{
		$this->_validate_upload_file();

		$staff = $this->session->userdata('data_auth');
		$data = array(
			'id_pelayanan' => $this->input->post('idPel'),
			'nama' => $this->input->post('nama_periksa'),
			'file' => $this->input->post('file'),
			'tgl' => date("Y-m-d H:i:s"),
			'staff' =>  $staff->id_staff
		);

		if (!empty($_FILES['file']['name'])) {
			$upload = $this->_do_upload();
			$data['file'] = $upload;
		}

		$this->M_Erm->insert($data, 'pemeriksaan_penunjang');

		echo json_encode(array("status" => TRUE));
	}
	private function _validate_upload_file()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('nama_periksa') == '') {
			$data['inputerror'][] = 'jenis';
			$data['error_string'][] = 'Jenis wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}
	private function _do_upload()
	{
		$config['upload_path']          = './assets/file-upload';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 5000;
		$config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) //upload and validate
		{
			$data['inputerror'][] = 'file';
			$data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}
	public function tampil_listdata_penunjang()
	{
		// $id_akun = 'dgok8itaesm';
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->db->query("SELECT * from pemeriksaan_penunjang where id_pelayanan='$id_pelayanan'")->result();

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {

			$tombol1 = '<a class="btn btn-success btn-xs" href="' . base_url('Erm_ases_dok_igd/download_file/' . $page_data[$i]->file) . '"><span class="fas fa-pencil-alt"></span> Download</a></div>';
			$tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_penunjang(\"" . $page_data[$i]->nama . "\",\""  . $page_data[$i]->id_penunjang . "\")' '><i class='fa fa-trash '></i></button>";


			$nama_dokter = $page_data[$i]->nama;
			$kode = $page_data[$i]->tgl;
			$tombol = $tombol;



			$out[$i] = array($nama_dokter, $kode, $tombol1, $tombol);
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
	public function download_file($file)
	{
		force_download('assets/file-upload/' . $file, NULL);
	}
	function hapus_data_diagnosa()
	{
		$id = $this->input->post('id');
		$where = array(
			'no_diagnosa' => $id,
		);
		$this->M_Erm->delete($where, 'diagnosa_utama');
		$out['status'] = "success";
		echo json_encode($out);
	}
	function hapus_data_diagnosa1()
	{
		$id = $this->input->post('id');
		$where = array(
			'no_diagnosa' => $id,
		);
		$this->M_Erm->delete($where, 'erm_diagnosa_dokter');
		$out['status'] = "success";
		echo json_encode($out);
	}
	function hapus_data_penunjang()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_penunjang' => $id,
		);
		$this->M_Erm->delete($where, 'pemeriksaan_penunjang');
		$out['status'] = "success";
		echo json_encode($out);
	}
}
