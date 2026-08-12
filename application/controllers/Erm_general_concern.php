<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_general_concern extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_IGD');
		$this->load->model('M_Erm');
		$this->load->model('M_Assembling');
		$this->load->model('M_Pencarian_Pasien');
	}

	public function identitas_pasien($id)
	{
		$this->load->view('assets/_header');
		$data_staff = $this->session->userdata('data_auth');
		$page_data['sso_user_data'] = $data_staff;
		$page_data['page_content'] = 'erm_form/IGD/view_form_general_concern4';
		$data1 = $this->M_Pencarian_Pasien->select_by_no_rm($id);

		$page_data['data'] = $data1;
		$page_data['id'] = $id;
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	// public function get_gencon()
	// {
	// 	$id = $this->input->post('id');
	// 	$db = $this->db->get_where('general_concent', ['no_rm' => $id])->result();
	// 	if (count($db) > 0) {
	// 		$db = $db[0];
	// 		$db->status_dt = 'found';
	// 	} else {
	// 		$db = null;
	// 		$db['status_dt'] = 'not found';
	// 	}
	// 	echo json_encode($db);
	// }

	public function get_gencon()
	{
		$no_rm = $this->input->post('id');
		$output = [];

		// Mengambil satu baris data dari database
		$data_db = $this->db->get_where('general_concent', ['no_rm' => $no_rm])->row();

		if ($data_db) {
			// Jika data ditemukan, ubah object menjadi array
			$output = (array) $data_db;
			$output['status_dt'] = 'found';
		} else {
			// Jika data tidak ditemukan
			$output['status_dt'] = 'not_found';
		}

		// Kirim output sebagai JSON kembali ke JavaScript
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}

	// public function insert_gencon()
	// {
	// 	$data = $this->session->userdata('data_auth');

	// 	$tgl = date("Y-m-d H:i:s");
	// 	$staff = $data->id_staff;

	// 	$img = $this->input->post('gambar');
	// 	if ($img != '') {
	// 		$img = str_replace('data:image/png;base64,', '', $img);
	// 		$img = str_replace(' ', '+', $img);
	// 		$data = base64_decode($img);
	// 		$file = "ttd/" . uniqid(time(), true) . ".png";
	// 		$success = file_put_contents($file, $data);
	// 	} else {
	// 		$file = '';
	// 	}

	// 	$this->form_validation->set_rules('nama', 'Yang Bersangkutan', 'required');
	// 	$this->form_validation->set_rules('alamat', 'Hasil Periksa', 'required');
	// 	$this->form_validation->set_rules('HP', 'Terapi ', 'required');
	// 	$this->form_validation->set_rules('samaran', 'Terapi I', 'required');
	// 	$this->form_validation->set_rules('anggota', 'Saran', 'required');
	// 	$this->form_validation->set_rules('hubungan', 'Yang Bersangkutan', 'required');
	// 	$this->form_validation->set_rules('jk', 'Diagnosis', 'required');

	// 	if ($this->form_validation->run()) {
	// 		$db   =   array(
	// 			'no_rm' => $this->input->post('no_rm'),
	// 			'hubungan' => $this->input->post('hubungan'),
	// 			'nama' => $this->input->post('nama'),
	// 			'jk' => $this->input->post('jk'),
	// 			'alamat' => $this->input->post('alamat'),
	// 			'hp' => $this->input->post('HP'),
	// 			'samaran' => $this->input->post('samaran'),
	// 			'anggota' => $this->input->post('anggota'),
	// 			'file_path' => $file,
	// 			'tanggal' => $tgl,
	// 			'staff' => $staff,
	// 		);
	// 		// print $success ? $file : 'Unable to save the file.';
	// 		$this->M_Erm->insert($db, 'general_concent');
	// 		$out['status'] = "success";
	// 	} else {
	// 		$out = array(
	// 			'error'   => true,
	// 			'hubungan' => form_error('hubungan'),
	// 			'nama' => form_error('nama'),
	// 			'jk' => form_error('jk'),
	// 			'alamat' => form_error('alamat'),
	// 			'hp' => form_error('HP'),
	// 			'samaran' => form_error('samaran'),
	// 			'anggota' => form_error('anggota'),
	// 		);
	// 	}
	// 	echo json_encode($out);
	// }

	public function insert_gencon()
	{
		$data_auth = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d H:i:s");
		$staff = $data_auth->id_staff;

		// Validasi untuk semua field yang wajib diisi
		$this->form_validation->set_rules('nama', 'Nama Penandatangan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('HP', 'No. HP', 'required');
		// $this->form_validation->set_rules('samaran', 'Nama Wali', 'required');
		// $this->form_validation->set_rules('anggota', 'Anggota Keluarga', 'required');
		// $this->form_validation->set_rules('hubungan', 'Hubungan', 'required');
		// $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('perusahaan_pengguna', 'Perusahaan Pengguna', 'required');
		$this->form_validation->set_rules('perusahaan_penjamin', 'Perusahaan Penjamin', 'required');
		$this->form_validation->set_rules('batas_biaya', 'Batas Biaya', 'required');

		if ($this->form_validation->run()) {
			// Proses Tanda Tangan
			$img = $this->input->post('gambar');
			$file = '';
			if ($img) {
				$img = str_replace('data:image/png;base64,', '', $img);
				$img = str_replace(' ', '+', $img);
				$data_gambar = base64_decode($img);
				$file = "ttd/" . uniqid(time(), true) . ".png";
				file_put_contents($file, $data_gambar);
			}

			// Siapkan data untuk dimasukkan ke database
			$db = [
				'no_rm'                 => $this->input->post('no_rm'),
				// 'hubungan'           => $this->input->post('hubungan'),
				'nama'                  => $this->input->post('nama'),
				// 'jk'                 => $this->input->post('jk'),
				'alamat'                => $this->input->post('alamat'),
				'hp'                    => $this->input->post('HP'),
				// 'samaran'            => $this->input->post('samaran'),
				// 'anggota'            => $this->input->post('anggota'),
				'file_path'             => $file,
				'tanggal'               => $tgl,
				'staff'                 => $staff,
				'nik'                   => $this->input->post('nik'),
				'tgl_lahir'             => $this->input->post('tgl_lahir'),
				'perusahaan_pengguna'   => $this->input->post('perusahaan_pengguna'),
				'perusahaan_penjamin'   => $this->input->post('perusahaan_penjamin'),
				'batas_biaya'           => $this->input->post('batas_biaya'),
				'pihak_keluarga'        => $this->input->post('pihak_keluarga') // Simpan data JSON
			];

			// Panggil model untuk insert
			// ganti M_Erm dengan nama modelmu
			$this->M_Erm->insert($db, 'general_concent');
			$out['status'] = "success";
		} else {
			// Jika validasi gagal, kirim pesan error
			$out = [
				'error'                 => true,
				// 'hubungan'           => form_error('hubungan'),
				'nama'                  => form_error('nama'),
				// 'jk'                 => form_error('jk'),
				'alamat'                => form_error('alamat'),
				'hp'                    => form_error('HP'),
				// 'samaran'            => form_error('samaran'),
				// 'anggota'            => form_error('anggota'),
				'nik'                   => form_error('nik'),
				'tgl_lahir'             => form_error('tgl_lahir'),
				'perusahaan_pengguna'   => form_error('perusahaan_pengguna'),
				'perusahaan_penjamin'   => form_error('perusahaan_penjamin'),
				'batas_biaya'           => form_error('batas_biaya'),
			];
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($out));
	}




	// public function update_gencon()
	// {
	// 	$data = $this->session->userdata('data_auth');

	// 	$tgl = date("Y-m-d H:i:s");
	// 	$staff = $data->id_staff;

	// 	$img = $this->input->post('gambar');
	// 	$img = str_replace('data:image/png;base64,', '', $img);
	// 	$img = str_replace(' ', '+', $img);
	// 	$data = base64_decode($img);
	// 	$file = "ttd/" . uniqid(time(), true) . ".png";
	// 	$success = file_put_contents($file, $data);


	// 	$db   =   array(
	// 		'no_rm' => $this->input->post('no_rm'),
	// 		'hubungan' => $this->input->post('hubungan'),
	// 		'nama' => $this->input->post('nama'),
	// 		'jk' => $this->input->post('jk'),
	// 		'alamat' => $this->input->post('alamat'),
	// 		'hp' => $this->input->post('HP'),
	// 		'samaran' => $this->input->post('samaran'),
	// 		'anggota' => $this->input->post('anggota'),
	// 		'file_path' => $file,
	// 		'tanggal' => $tgl,
	// 		'staff' => $staff,
	// 	);
	// 	$where   =   array(
	// 		'id_general_concent' => $this->input->post('id'),
	// 	);

	// 	// print $success ? $file : 'Unable to save the file.';
	// 	$this->M_Erm->update($db, $where, 'general_concent');
	// 	$out['status'] = "success";

	// 	echo json_encode($out);
	// }

	public function update_gencon()
	{
		$data_auth = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d H:i:s");
		$staff = $data_auth->id_staff;

		// 1. Aturan validasi yang relevan (tanpa field yang sudah dihapus)
		$this->form_validation->set_rules('nama', 'Nama Penandatangan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('HP', 'No. HP', 'required');
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('perusahaan_pengguna', 'Perusahaan Pengguna', 'required');
		$this->form_validation->set_rules('perusahaan_penjamin', 'Perusahaan Penjamin', 'required');
		$this->form_validation->set_rules('batas_biaya', 'Batas Biaya', 'required');

		if ($this->form_validation->run()) {

			// 2. Siapkan data untuk di-update (tanpa field yang sudah dihapus)
			$db = [
				'no_rm'                 => $this->input->post('no_rm'),
				'nama'                  => $this->input->post('nama'),
				'alamat'                => $this->input->post('alamat'),
				'hp'                    => $this->input->post('HP'), // Ambil dari 'HP' (uppercase), simpan ke 'hp' (lowercase)
				'nik'                   => $this->input->post('nik'),
				'tgl_lahir'             => $this->input->post('tgl_lahir'),
				'perusahaan_pengguna'   => $this->input->post('perusahaan_pengguna'),
				'perusahaan_penjamin'   => $this->input->post('perusahaan_penjamin'),
				'batas_biaya'           => $this->input->post('batas_biaya'),
				'pihak_keluarga'        => $this->input->post('pihak_keluarga'),
				'tanggal'               => $tgl,
				'staff'                 => $staff
			];

			// Penanganan TTD: hanya update jika ada TTD baru yang dikirim
			$img = $this->input->post('gambar');
			if ($img && strpos($img, 'data:image/png;base64,') !== false) {
				$id = $this->input->post('id');
				// Ambil data lama untuk mendapatkan path file ttd yang akan dihapus
				$old_data = $this->db->get_where('general_concent', ['id_general_concent' => $id])->row();
				if ($old_data && !empty($old_data->file_path) && file_exists($old_data->file_path)) {
					unlink($old_data->file_path); // Hapus file TTD lama
				}

				// Proses dan simpan file TTD yang baru
				$img = str_replace('data:image/png;base64,', '', $img);
				$img = str_replace(' ', '+', $img);
				$data_gambar = base64_decode($img);
				$file = "ttd/" . uniqid(time(), true) . ".png";
				file_put_contents($file, $data_gambar);

				$db['file_path'] = $file; // Tambahkan path file baru ke data yang akan di-update
			}

			$where = ['id_general_concent' => $this->input->post('id')];

			// Panggil model untuk update
			// ganti M_Erm dengan nama modelmu
			$this->M_Erm->update($db, $where, 'general_concent');
			$out['status'] = "success";
		} else {
			// 3. Jika validasi gagal, kirimkan semua pesan error yang relevan
			$out = [
				'error'                 => true,
				'nama'                  => form_error('nama'),
				'alamat'                => form_error('alamat'),
				'hp'                    => form_error('HP'), // Error diambil dari rule 'HP'
				'nik'                   => form_error('nik'),
				'tgl_lahir'             => form_error('tgl_lahir'),
				'perusahaan_pengguna'   => form_error('perusahaan_pengguna'),
				'perusahaan_penjamin'   => form_error('perusahaan_penjamin'),
				'batas_biaya'           => form_error('batas_biaya'),
			];
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($out));
	}

	public function print_general_concern($id = null)
	{
		if ($id === null) {
			show_error("Parameter ID tidak ditemukan.", 400);
			return;
		}

		// Mengambil data gabungan dari TIGA tabel
		$this->db->select(
			'gc.nama AS nama_penanggung_jawab, gc.tgl_lahir AS tgl_lahir_penanggung_jawab, gc.nik AS nik_penanggung_jawab, gc.alamat AS alamat_penanggung_jawab, gc.hp, gc.perusahaan_pengguna, gc.perusahaan_penjamin, gc.pihak_keluarga, gc.batas_biaya, gc.file_path, ' .
				'p.nama AS nama_pasien, p.jenis_kelamin, p.tgl_lahir AS tgl_lahir_pasien, p.no_ktp, p.alamat AS alamat_pasien, p.no_hp AS no_hp_pasien, ' .
				's.nama AS nama_petugas' // BARIS BARU: Ambil nama petugas
		);
		$this->db->from('general_concent gc');

		// JOIN ke tabel pasien
		$this->db->join('pasien p', 'gc.no_rm = p.no_rm', 'left');

		// JOIN BARU: ke tabel staff
		// Ganti 'staff s' dan 's.id_staff' jika nama tabel & kolom Anda berbeda
		$this->db->join('staff s', 'gc.staff = s.id_staff', 'left');

		$this->db->where('gc.id_general_concent', $id);

		$data_db = $this->db->get()->row_array();

		if (!$data_db) {
			show_error("Data persetujuan umum dengan ID '$id' tidak ditemukan.", 404);
			return;
		}

		$data['data'] = $data_db;
		$this->load->view('erm_print/general_concern2', $data);
	}
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_general_concern extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_IGD');
		$this->load->model('M_Erm');
		$this->load->model('M_Assembling');
		$this->load->model('M_Pencarian_Pasien');
	}

	public function identitas_pasien($id)
	{
		$this->load->view('assets/_header');
		$data_staff = $this->session->userdata('data_auth');
		$page_data['sso_user_data'] = $data_staff;
		$page_data['page_content'] = 'erm_form/IGD/view_form_general_concern4';
		$data1 = $this->M_Pencarian_Pasien->select_by_no_rm($id);

		$page_data['data'] = $data1;
		$page_data['id'] = $id;
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	// public function get_gencon()
	// {
	// 	$id = $this->input->post('id');
	// 	$db = $this->db->get_where('general_concent', ['no_rm' => $id])->result();
	// 	if (count($db) > 0) {
	// 		$db = $db[0];
	// 		$db->status_dt = 'found';
	// 	} else {
	// 		$db = null;
	// 		$db['status_dt'] = 'not found';
	// 	}
	// 	echo json_encode($db);
	// }

	public function get_gencon()
	{
		$no_rm = $this->input->post('id');
		$output = [];

		// Mengambil satu baris data dari database
		$data_db = $this->db->get_where('general_concent', ['no_rm' => $no_rm])->row();

		if ($data_db) {
			// Jika data ditemukan, ubah object menjadi array
			$output = (array) $data_db;
			$output['status_dt'] = 'found';
		} else {
			// Jika data tidak ditemukan
			$output['status_dt'] = 'not_found';
		}

		// Kirim output sebagai JSON kembali ke JavaScript
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}

	// public function insert_gencon()
	// {
	// 	$data = $this->session->userdata('data_auth');

	// 	$tgl = date("Y-m-d H:i:s");
	// 	$staff = $data->id_staff;

	// 	$img = $this->input->post('gambar');
	// 	if ($img != '') {
	// 		$img = str_replace('data:image/png;base64,', '', $img);
	// 		$img = str_replace(' ', '+', $img);
	// 		$data = base64_decode($img);
	// 		$file = "ttd/" . uniqid(time(), true) . ".png";
	// 		$success = file_put_contents($file, $data);
	// 	} else {
	// 		$file = '';
	// 	}

	// 	$this->form_validation->set_rules('nama', 'Yang Bersangkutan', 'required');
	// 	$this->form_validation->set_rules('alamat', 'Hasil Periksa', 'required');
	// 	$this->form_validation->set_rules('HP', 'Terapi ', 'required');
	// 	$this->form_validation->set_rules('samaran', 'Terapi I', 'required');
	// 	$this->form_validation->set_rules('anggota', 'Saran', 'required');
	// 	$this->form_validation->set_rules('hubungan', 'Yang Bersangkutan', 'required');
	// 	$this->form_validation->set_rules('jk', 'Diagnosis', 'required');

	// 	if ($this->form_validation->run()) {
	// 		$db   =   array(
	// 			'no_rm' => $this->input->post('no_rm'),
	// 			'hubungan' => $this->input->post('hubungan'),
	// 			'nama' => $this->input->post('nama'),
	// 			'jk' => $this->input->post('jk'),
	// 			'alamat' => $this->input->post('alamat'),
	// 			'hp' => $this->input->post('HP'),
	// 			'samaran' => $this->input->post('samaran'),
	// 			'anggota' => $this->input->post('anggota'),
	// 			'file_path' => $file,
	// 			'tanggal' => $tgl,
	// 			'staff' => $staff,
	// 		);
	// 		// print $success ? $file : 'Unable to save the file.';
	// 		$this->M_Erm->insert($db, 'general_concent');
	// 		$out['status'] = "success";
	// 	} else {
	// 		$out = array(
	// 			'error'   => true,
	// 			'hubungan' => form_error('hubungan'),
	// 			'nama' => form_error('nama'),
	// 			'jk' => form_error('jk'),
	// 			'alamat' => form_error('alamat'),
	// 			'hp' => form_error('HP'),
	// 			'samaran' => form_error('samaran'),
	// 			'anggota' => form_error('anggota'),
	// 		);
	// 	}
	// 	echo json_encode($out);
	// }

	public function insert_gencon()
	{
		$data_auth = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d H:i:s");
		$staff = $data_auth->id_staff;

		// Validasi untuk semua field yang wajib diisi
		$this->form_validation->set_rules('nama', 'Nama Penandatangan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('HP', 'No. HP', 'required');
		// $this->form_validation->set_rules('samaran', 'Nama Wali', 'required');
		// $this->form_validation->set_rules('anggota', 'Anggota Keluarga', 'required');
		// $this->form_validation->set_rules('hubungan', 'Hubungan', 'required');
		// $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('perusahaan_pengguna', 'Perusahaan Pengguna', 'required');
		$this->form_validation->set_rules('perusahaan_penjamin', 'Perusahaan Penjamin', 'required');
		$this->form_validation->set_rules('batas_biaya', 'Batas Biaya', 'required');

		if ($this->form_validation->run()) {
			// Proses Tanda Tangan
			$img = $this->input->post('gambar');
			$file = '';
			if ($img) {
				$img = str_replace('data:image/png;base64,', '', $img);
				$img = str_replace(' ', '+', $img);
				$data_gambar = base64_decode($img);
				$file = "ttd/" . uniqid(time(), true) . ".png";
				file_put_contents($file, $data_gambar);
			}

			// Siapkan data untuk dimasukkan ke database
			$db = [
				'no_rm'                 => $this->input->post('no_rm'),
				// 'hubungan'           => $this->input->post('hubungan'),
				'nama'                  => $this->input->post('nama'),
				// 'jk'                 => $this->input->post('jk'),
				'alamat'                => $this->input->post('alamat'),
				'hp'                    => $this->input->post('HP'),
				// 'samaran'            => $this->input->post('samaran'),
				// 'anggota'            => $this->input->post('anggota'),
				'file_path'             => $file,
				'tanggal'               => $tgl,
				'staff'                 => $staff,
				'nik'                   => $this->input->post('nik'),
				'tgl_lahir'             => $this->input->post('tgl_lahir'),
				'perusahaan_pengguna'   => $this->input->post('perusahaan_pengguna'),
				'perusahaan_penjamin'   => $this->input->post('perusahaan_penjamin'),
				'batas_biaya'           => $this->input->post('batas_biaya'),
				'pihak_keluarga'        => $this->input->post('pihak_keluarga') // Simpan data JSON
			];

			// Panggil model untuk insert
			// ganti M_Erm dengan nama modelmu
			$this->M_Erm->insert($db, 'general_concent');
			$out['status'] = "success";
		} else {
			// Jika validasi gagal, kirim pesan error
			$out = [
				'error'                 => true,
				// 'hubungan'           => form_error('hubungan'),
				'nama'                  => form_error('nama'),
				// 'jk'                 => form_error('jk'),
				'alamat'                => form_error('alamat'),
				'hp'                    => form_error('HP'),
				// 'samaran'            => form_error('samaran'),
				// 'anggota'            => form_error('anggota'),
				'nik'                   => form_error('nik'),
				'tgl_lahir'             => form_error('tgl_lahir'),
				'perusahaan_pengguna'   => form_error('perusahaan_pengguna'),
				'perusahaan_penjamin'   => form_error('perusahaan_penjamin'),
				'batas_biaya'           => form_error('batas_biaya'),
			];
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($out));
	}




	// public function update_gencon()
	// {
	// 	$data = $this->session->userdata('data_auth');

	// 	$tgl = date("Y-m-d H:i:s");
	// 	$staff = $data->id_staff;

	// 	$img = $this->input->post('gambar');
	// 	$img = str_replace('data:image/png;base64,', '', $img);
	// 	$img = str_replace(' ', '+', $img);
	// 	$data = base64_decode($img);
	// 	$file = "ttd/" . uniqid(time(), true) . ".png";
	// 	$success = file_put_contents($file, $data);


	// 	$db   =   array(
	// 		'no_rm' => $this->input->post('no_rm'),
	// 		'hubungan' => $this->input->post('hubungan'),
	// 		'nama' => $this->input->post('nama'),
	// 		'jk' => $this->input->post('jk'),
	// 		'alamat' => $this->input->post('alamat'),
	// 		'hp' => $this->input->post('HP'),
	// 		'samaran' => $this->input->post('samaran'),
	// 		'anggota' => $this->input->post('anggota'),
	// 		'file_path' => $file,
	// 		'tanggal' => $tgl,
	// 		'staff' => $staff,
	// 	);
	// 	$where   =   array(
	// 		'id_general_concent' => $this->input->post('id'),
	// 	);

	// 	// print $success ? $file : 'Unable to save the file.';
	// 	$this->M_Erm->update($db, $where, 'general_concent');
	// 	$out['status'] = "success";

	// 	echo json_encode($out);
	// }

	public function update_gencon()
	{
		$data_auth = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d H:i:s");
		$staff = $data_auth->id_staff;

		// 1. Aturan validasi yang relevan (tanpa field yang sudah dihapus)
		$this->form_validation->set_rules('nama', 'Nama Penandatangan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('HP', 'No. HP', 'required');
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('perusahaan_pengguna', 'Perusahaan Pengguna', 'required');
		$this->form_validation->set_rules('perusahaan_penjamin', 'Perusahaan Penjamin', 'required');
		$this->form_validation->set_rules('batas_biaya', 'Batas Biaya', 'required');

		if ($this->form_validation->run()) {

			// 2. Siapkan data untuk di-update (tanpa field yang sudah dihapus)
			$db = [
				'no_rm'                 => $this->input->post('no_rm'),
				'nama'                  => $this->input->post('nama'),
				'alamat'                => $this->input->post('alamat'),
				'hp'                    => $this->input->post('HP'), // Ambil dari 'HP' (uppercase), simpan ke 'hp' (lowercase)
				'nik'                   => $this->input->post('nik'),
				'tgl_lahir'             => $this->input->post('tgl_lahir'),
				'perusahaan_pengguna'   => $this->input->post('perusahaan_pengguna'),
				'perusahaan_penjamin'   => $this->input->post('perusahaan_penjamin'),
				'batas_biaya'           => $this->input->post('batas_biaya'),
				'pihak_keluarga'        => $this->input->post('pihak_keluarga'),
				'tanggal'               => $tgl,
				'staff'                 => $staff
			];

			// Penanganan TTD: hanya update jika ada TTD baru yang dikirim
			$img = $this->input->post('gambar');
			if ($img && strpos($img, 'data:image/png;base64,') !== false) {
				$id = $this->input->post('id');
				// Ambil data lama untuk mendapatkan path file ttd yang akan dihapus
				$old_data = $this->db->get_where('general_concent', ['id_general_concent' => $id])->row();
				if ($old_data && !empty($old_data->file_path) && file_exists($old_data->file_path)) {
					unlink($old_data->file_path); // Hapus file TTD lama
				}

				// Proses dan simpan file TTD yang baru
				$img = str_replace('data:image/png;base64,', '', $img);
				$img = str_replace(' ', '+', $img);
				$data_gambar = base64_decode($img);
				$file = "ttd/" . uniqid(time(), true) . ".png";
				file_put_contents($file, $data_gambar);

				$db['file_path'] = $file; // Tambahkan path file baru ke data yang akan di-update
			}

			$where = ['id_general_concent' => $this->input->post('id')];

			// Panggil model untuk update
			// ganti M_Erm dengan nama modelmu
			$this->M_Erm->update($db, $where, 'general_concent');
			$out['status'] = "success";
		} else {
			// 3. Jika validasi gagal, kirimkan semua pesan error yang relevan
			$out = [
				'error'                 => true,
				'nama'                  => form_error('nama'),
				'alamat'                => form_error('alamat'),
				'hp'                    => form_error('HP'), // Error diambil dari rule 'HP'
				'nik'                   => form_error('nik'),
				'tgl_lahir'             => form_error('tgl_lahir'),
				'perusahaan_pengguna'   => form_error('perusahaan_pengguna'),
				'perusahaan_penjamin'   => form_error('perusahaan_penjamin'),
				'batas_biaya'           => form_error('batas_biaya'),
			];
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($out));
	}

	public function print_general_concern($id = null)
	{
		if ($id === null) {
			show_error("Parameter ID tidak ditemukan.", 400);
			return;
		}

		// Mengambil data gabungan dari TIGA tabel
		$this->db->select(
			'gc.nama AS nama_penanggung_jawab, gc.tgl_lahir AS tgl_lahir_penanggung_jawab, gc.nik AS nik_penanggung_jawab, gc.alamat AS alamat_penanggung_jawab, gc.hp, gc.perusahaan_pengguna, gc.perusahaan_penjamin, gc.pihak_keluarga, gc.batas_biaya, gc.file_path, ' .
				'p.nama AS nama_pasien, p.jenis_kelamin, p.tgl_lahir AS tgl_lahir_pasien, p.no_ktp, p.alamat AS alamat_pasien, p.no_hp AS no_hp_pasien, ' .
				's.nama AS nama_petugas' // BARIS BARU: Ambil nama petugas
		);
		$this->db->from('general_concent gc');

		// JOIN ke tabel pasien
		$this->db->join('pasien p', 'gc.no_rm = p.no_rm', 'left');

		// JOIN BARU: ke tabel staff
		// Ganti 'staff s' dan 's.id_staff' jika nama tabel & kolom Anda berbeda
		$this->db->join('staff s', 'gc.staff = s.id_staff', 'left');

		$this->db->where('gc.id_general_concent', $id);

		$data_db = $this->db->get()->row_array();

		if (!$data_db) {
			show_error("Data persetujuan umum dengan ID '$id' tidak ditemukan.", 404);
			return;
		}

		$data['data'] = $data_db;
		$this->load->view('erm_print/general_concern2', $data);
	}
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
