<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_pengobatan_orang_sakit extends CI_Controller
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

	public function formpengobatan($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm->selectDataPasienbyid($id_pelayanan, $id_history);
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
		$page_data['nama_obat'] = $this->M_Erm_ranap->get_nama_obat($id_pelayanan);
		$page_data['signa_obat'] = $this->M_Erm_ranap->get_signa_obat($id_pelayanan);



		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_pengobatan_orang_sakit';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	//perbaikan tampil tanggal
public function tampil_list_per_id()
{
    $id_pelayanan = $this->input->post('id_pelayanan');
    $page_data    = $this->M_Erm_ranap->selectPengobatan($id_pelayanan);

    $out = [];
    if (!empty($page_data)) {
        $bulanIndo = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $hariIndo = [
            'Sunday'    => 'Minggu',
            'Monday'    => 'Senin',
            'Tuesday'   => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday'  => 'Kamis',
            'Friday'    => 'Jumat',
            'Saturday'  => 'Sabtu'
        ];

        foreach ($page_data as $i => $row) {
            $no     = $i + 1;
            $tombol = "<button class='btn btn-success btn-icon-anim btn square' onclick='pilih(\"{$row->id_pengobatan}\")'><i class='icon-rocket'></i></button>";
            $hapus  = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus(\"{$row->id_pengobatan}\")'><i class='icon-trash'></i></button>";

            // Tanggal pengobatan (dipilih user)
            $dtPengobatan = new DateTime($row->tanggal_pengobatan);
            $tanggal_pengobatan = $hariIndo[$dtPengobatan->format('l')] . ", " .
                                  $dtPengobatan->format('d') . " " .
                                  $bulanIndo[(int)$dtPengobatan->format('m')] . " " .
                                  $dtPengobatan->format('Y');

            // Tanggal input (tanggal dibuat sistem)
            $dtInput = new DateTime($row->tanggal); // field `tanggal` di DB
            $tanggal_input = $hariIndo[$dtInput->format('l')] . ", " .
                             $dtInput->format('d') . " " .
                             $bulanIndo[(int)$dtInput->format('m')] . " " .
                             $dtInput->format('Y') . " " . $dtInput->format('H:i:s');

            $out[] = [
                $no,
                $tombol,
                $hapus,
                $tanggal_pengobatan, // kolom Tanggal Obat
                $row->jam,
                $row->jenis_obat,
                $row->nama_obat,
                $row->staff,
                $tanggal_input       // kolom tambahan: Tanggal Input
            ];
        }
    }

    echo json_encode(['data' => $out ?: ""]);
    exit;
}



	public function insert_pengobatan()
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
		$this->form_validation->set_rules('jenis_obat', 'Jenis Obat', 'required');
		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
		$this->form_validation->set_rules('dosis', 'Dosis', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jam', 'Jam', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tanggal_pengobatan' => $this->input->post('tanggal'),
				'dosis' => $this->input->post('dosis'),
				'jam' => $this->input->post('jam'),
				'jenis_obat' => $this->input->post('jenis_obat'),
				'nama_obat' => $this->input->post('nama_obat'),
				'ttd' => $file,
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_ranap->insert($data, 'daftar_pengobatan');
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'diagnosis' => form_error('diagnosis'),
				'nama_obat' => form_error('nama_obat'),
				'dosis' => form_error('dosis'),
				'tanggal' => form_error('tanggal'),
				'jam' => form_error('jam'),
			);
		}
		echo json_encode($out);
	}
	public function getPerRencana()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('daftar_pengobatan', ['id_pengobatan' => $id])->row_array();
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
	function hapus_pengobatan()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_pengobatan' => $id,
		);
		$this->M_Erm_ranap->delete($where, 'daftar_pengobatan');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function edit_pengobatan()
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
		$this->form_validation->set_rules('jenis_obat', 'Jenis Obat', 'required');
		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
		$this->form_validation->set_rules('dosis', 'Dosis', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jam', 'Jam', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tanggal_pengobatan' => $this->input->post('tanggal'),
				'dosis' => $this->input->post('dosis'),
				'jam' => $this->input->post('jam'),
				'jenis_obat' => $this->input->post('jenis_obat'),
				'nama_obat' => $this->input->post('nama_obat'),
				'ttd' => $file,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm_ranap->update_pengobatan($id, $data);
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'diagnosis' => form_error('diagnosis'),
				'nama_obat' => form_error('nama_obat'),
				'dosis' => form_error('dosis'),
				'tanggal' => form_error('tanggal'),
				'jam' => form_error('jam'),
			);
		}
		echo json_encode($out);
	}

	public function getSignaObat()
	{
		$namaObat = $this->input->get('nama_obat');
		$idPelayanan = $this->input->get('id_pelayanan');
	
		if ($namaObat && $idPelayanan) {
			$query = $this->db->select('so.tindakan AS signa_obat, l.nama AS nama_obat')
				->from('tindakan_farmasi tf')
				->join('signa_obat so', 'tf.id_signa = so.id_signa')
				->join('list_logistik l', 'tf.id_list_tindakan = l.id_logistik')
				->where('l.nama', $namaObat)
				->where('tf.id_pelayanan', $idPelayanan) 
				->get();
	
			if ($query->num_rows() > 0) {
				$response = $query->row_array();
				$response['signa_obat'] = !empty($response['signa_obat']) ? $response['signa_obat'] : 'Data tidak ditemukan';
				echo json_encode($response);
			} else {
				echo json_encode(['signa_obat' => 'Data tidak ditemukan']);
			}
		} else {
			echo json_encode(['signa_obat' => 'Data tidak ditemukan']);
		}
	}
	
	
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_pengobatan_orang_sakit extends CI_Controller
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

	public function formpengobatan($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm->selectDataPasienbyid($id_pelayanan, $id_history);
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
		$page_data['nama_obat'] = $this->M_Erm_ranap->get_nama_obat($id_pelayanan);
		$page_data['signa_obat'] = $this->M_Erm_ranap->get_signa_obat($id_pelayanan);



		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_pengobatan_orang_sakit';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	//perbaikan tampil tanggal
public function tampil_list_per_id()
{
    $id_pelayanan = $this->input->post('id_pelayanan');
    $page_data    = $this->M_Erm_ranap->selectPengobatan($id_pelayanan);

    $out = [];
    if (!empty($page_data)) {
        $bulanIndo = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $hariIndo = [
            'Sunday'    => 'Minggu',
            'Monday'    => 'Senin',
            'Tuesday'   => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday'  => 'Kamis',
            'Friday'    => 'Jumat',
            'Saturday'  => 'Sabtu'
        ];

        foreach ($page_data as $i => $row) {
            $no     = $i + 1;
            $tombol = "<button class='btn btn-success btn-icon-anim btn square' onclick='pilih(\"{$row->id_pengobatan}\")'><i class='icon-rocket'></i></button>";
            $hapus  = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus(\"{$row->id_pengobatan}\")'><i class='icon-trash'></i></button>";

            // Tanggal pengobatan (dipilih user)
            $dtPengobatan = new DateTime($row->tanggal_pengobatan);
            $tanggal_pengobatan = $hariIndo[$dtPengobatan->format('l')] . ", " .
                                  $dtPengobatan->format('d') . " " .
                                  $bulanIndo[(int)$dtPengobatan->format('m')] . " " .
                                  $dtPengobatan->format('Y');

            // Tanggal input (tanggal dibuat sistem)
            $dtInput = new DateTime($row->tanggal); // field `tanggal` di DB
            $tanggal_input = $hariIndo[$dtInput->format('l')] . ", " .
                             $dtInput->format('d') . " " .
                             $bulanIndo[(int)$dtInput->format('m')] . " " .
                             $dtInput->format('Y') . " " . $dtInput->format('H:i:s');

            $out[] = [
                $no,
                $tombol,
                $hapus,
                $tanggal_pengobatan, // kolom Tanggal Obat
                $row->jam,
                $row->jenis_obat,
                $row->nama_obat,
                $row->staff,
                $tanggal_input       // kolom tambahan: Tanggal Input
            ];
        }
    }

    echo json_encode(['data' => $out ?: ""]);
    exit;
}



	public function insert_pengobatan()
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
		$this->form_validation->set_rules('jenis_obat', 'Jenis Obat', 'required');
		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
		$this->form_validation->set_rules('dosis', 'Dosis', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jam', 'Jam', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tanggal_pengobatan' => $this->input->post('tanggal'),
				'dosis' => $this->input->post('dosis'),
				'jam' => $this->input->post('jam'),
				'jenis_obat' => $this->input->post('jenis_obat'),
				'nama_obat' => $this->input->post('nama_obat'),
				'ttd' => $file,
				'tanggal' => $tgl,
				'staff' => $staff,
			);
			// $data2 = array(
			// 	'id_pelayanan' => $this->input->post('id_pelayanan'),
			// 	'id_history' => $this->input->post('id_history'),
			// 	'no_rm' => $this->input->post('no_rm'),
			// );
			$this->M_Erm_ranap->insert($data, 'daftar_pengobatan');
			// $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'diagnosis' => form_error('diagnosis'),
				'nama_obat' => form_error('nama_obat'),
				'dosis' => form_error('dosis'),
				'tanggal' => form_error('tanggal'),
				'jam' => form_error('jam'),
			);
		}
		echo json_encode($out);
	}
	public function getPerRencana()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('daftar_pengobatan', ['id_pengobatan' => $id])->row_array();
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
	function hapus_pengobatan()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_pengobatan' => $id,
		);
		$this->M_Erm_ranap->delete($where, 'daftar_pengobatan');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function edit_pengobatan()
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
		$this->form_validation->set_rules('jenis_obat', 'Jenis Obat', 'required');
		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
		$this->form_validation->set_rules('dosis', 'Dosis', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jam', 'Jam', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tanggal_pengobatan' => $this->input->post('tanggal'),
				'dosis' => $this->input->post('dosis'),
				'jam' => $this->input->post('jam'),
				'jenis_obat' => $this->input->post('jenis_obat'),
				'nama_obat' => $this->input->post('nama_obat'),
				'ttd' => $file,
				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm_ranap->update_pengobatan($id, $data);
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'diagnosis' => form_error('diagnosis'),
				'nama_obat' => form_error('nama_obat'),
				'dosis' => form_error('dosis'),
				'tanggal' => form_error('tanggal'),
				'jam' => form_error('jam'),
			);
		}
		echo json_encode($out);
	}

	public function getSignaObat()
	{
		$namaObat = $this->input->get('nama_obat');
		$idPelayanan = $this->input->get('id_pelayanan');
	
		if ($namaObat && $idPelayanan) {
			$query = $this->db->select('so.tindakan AS signa_obat, l.nama AS nama_obat')
				->from('tindakan_farmasi tf')
				->join('signa_obat so', 'tf.id_signa = so.id_signa')
				->join('list_logistik l', 'tf.id_list_tindakan = l.id_logistik')
				->where('l.nama', $namaObat)
				->where('tf.id_pelayanan', $idPelayanan) 
				->get();
	
			if ($query->num_rows() > 0) {
				$response = $query->row_array();
				$response['signa_obat'] = !empty($response['signa_obat']) ? $response['signa_obat'] : 'Data tidak ditemukan';
				echo json_encode($response);
			} else {
				echo json_encode(['signa_obat' => 'Data tidak ditemukan']);
			}
		} else {
			echo json_encode(['signa_obat' => 'Data tidak ditemukan']);
		}
	}
	
	
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
}