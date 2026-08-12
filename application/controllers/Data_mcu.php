<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_mcu extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_mcu');
		$this->load->model('M_Poli');
		$this->api = "http://36.92.141.4/rest_ci/index.php";
		$this->load->library('curl');
	}

	public function index()
	{
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'page_content/Erm';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function form($id_mcu)
	{
		// $id_pelayanan = $id_pel;
		// $id_histori = $id_his;
		$selectPasien = $this->M_mcu->getMCUById($id_mcu);

		$page_data['id_pelayanan'] = $id_mcu;
		$page_data['pasien'] = $selectPasien;

		// $page_data['no_rm'] = $selectPasien->no_rm;
		// $page_data['pasien'] = $this->M_Erm->selectDataPasien($db[0]->no_rm);
		$page_data['data_dokter'] = $this->M_mcu->selectNamaDokter();
		$page_data['tindakan_mcu'] = $this->M_mcu->selectNamaMcu();
		$page_data['tindakan_radiologi'] = $this->M_mcu->selectNamaRadiologi();
		$page_data['tindakan_labor'] = $this->M_mcu->selectNamaLabor();
		$page_data['paket_mcu'] = $this->db->get_where('list_paket_mcu',['jenis'=>'MCU'])->result_array();

		// load page view
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'page_content/Data_tindakan_mcu';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
		$this->load->view('modal_mcu/modal_surat_keterangan_sakit', $page_data);

	}
	public function getNamaTindakan()
	{
		$depo = $this->input->post('depo');
		if ($depo == 'list_tindakan_mcu') {
			$data = $this->M_mcu->selectNamaMcu();
		} else if ($depo == 'list_tindakan_labor') {
			$data = $this->M_mcu->selectNamaLabor();
		} else if ($depo == 'list_tindakan_radiologi_mcu') {
			$data = $this->M_mcu->selectNamaRadiologi();
		}

		echo json_encode($data);
	}
	public function insertDetail()
	{
		$data = $this->session->userdata('data_auth');
		$id = $this->input->post('id');


		$data = array(
			'id_detail_paket' => uniqid(),
			'id_paket' => $this->input->post('id'),
			'id_list_tindakan' => $this->input->post('id_list_tindakan'),
			'nama' => $this->input->post('nama'),
			'tipe' => $this->input->post('tipe'),
			'harga' => $this->input->post('harga'),
			'tgl' => date('Y-m-d H:i:s'),
		);
		$id_paket = $this->M_mcu->insert_labor($data, 'detail_paket_mcu');

		$paket = $this->db->get_where('list_paket_mcu', ['id_paket_mcu' => $this->input->post('id')]);
		if (count($paket->result()) > 0) {
			$harga = $this->db->query("SELECT sum(harga) harga from detail_paket_mcu where id_paket ='$id'")->row()->harga;

			$this->M_mcu->update(['harga' => $harga], ['id_paket_mcu' => $id], 'list_paket_mcu');
		}
		$out['status'] = "success";
		$out['id'] = $id_paket;
		echo json_encode($out);
	}
	public function tampil_list_paket()
	{
		$id = $this->input->post('id');

		$page_data = $this->db->get_where('detail_paket_mcu', ['id_paket' => $id])->result();
		echo json_encode($page_data);
	}
	public function tampil_list_paket1()
	{
		$id = $this->input->post('id');

		$page_data = $this->db->get_where('detail_paket_mcu', ['id_paket' => $id])->result();

		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {

			$tombol = '<button class="btn btn-danger btn-icon-anim btn-square delete" type="button" name="delete" id="' . $page_data[$i]->id_detail_paket . '" ><i class="fa fa-trash"></i></button>';

			$no = $i + 1;
			$nama = $page_data[$i]->nama;
			$harga = "Rp. " . number_format($page_data[$i]->harga, 0, ',', '.');

			$out[$i] = array($no,  $nama, $harga, $tombol);
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
	public function insert_paket()
	{
		$staff = $this->session->userdata('data_auth');

		$id_mcu = $this->input->post('id_mcu');
		$id_paket = $this->input->post('id_paket');

		$paket = $this->db->get_where('detail_paket_mcu', ['id_paket' => $id_paket])->result();

		for ($i = 0; $i < count($paket); $i++) {
			if ($paket[$i]->tipe == 'list_tindakan_mcu') {
				$list = $this->db->get_where('list_tindakan_mcu', ['id_list_tindakan_mcu' =>  $paket[$i]->id_list_tindakan])->row();
				$data = array(
					'id_tindakan_mcu' => uniqid(),
					'id_list_tindakan' => $paket[$i]->id_list_tindakan,
					'id_mcu' => $id_mcu,
					'tanggal' => date("Y-m-d H:i:s"),
					'harga' => $list->harga,
					'frek' => 1,
					'total' => $list->harga,
					'id_staff' => $staff->id_staff,
					'id_paket' => $id_paket,
				);
				$this->M_mcu->insert_labor($data, 'tindakan_mcu');
				$out['status_t'] = "success";
			}
			if ($paket[$i]->tipe == 'list_tindakan_radiologi_mcu') {
				$list = $this->db->get_where('list_tindakan_radiologi_mcu', ['id_daftar_tindakan' =>  $paket[$i]->id_list_tindakan])->row();

				$data = array(
					'id_tindakan_radiologi' => uniqid(),
					'id_daftar_tindakan' => $paket[$i]->id_list_tindakan,
					'tanggal' => date("Y-m-d H:i:s"),
					'id_mcu' => $id_mcu,
					'harga' => $list->harga,
					'frek' => 1,
					'total' => $list->harga,
					'id_staff' => $staff->id_staff,
					'status_radiologi' => 1,
					'id_paket' => $id_paket,
				);

				$this->M_mcu->insert_labor($data, 'tindakan_radiologi_mcu');
				$out['status_r'] = "success";
			}
			if ($paket[$i]->tipe == 'list_tindakan_labor') {

				$labor = $this->db->get_where('form_labor', ['id_pelayanan' =>  $id_mcu]);

				if (count($labor->result()) == 0) {
					$form = array(
						'id_pelayanan' => $id_mcu,
						'diagnosa' => '',
						'ringkasan' => '',
						'keterangan' => '',
						'tgl' => date("Y-m-d H:i:s"),
						'status' => 0,
						'id_staff' => $staff->id_staff,
					);
					$id_form_labor = $this->M_mcu->insert_tindakan($form, 'form_labor'); //diganti dengan labor biasa
				} else {
					$id_form_labor = $labor->row()->id_form_labor;
				}


				$list = $this->db->get_where('list_tindakan_labor', ['id_daftar_tindakan' =>  $paket[$i]->id_list_tindakan])->row();

				$data = array(
					'id_tindakan_labor' => uniqid(),
					'id_daftar_tindakan' => $paket[$i]->id_list_tindakan,
					'nama_tindakan' => $list->nama,
					'kode_lis' => $list->kode_lis,
					'id_mcu' => $id_mcu,
					'id_form_labor' => $id_form_labor,
					'tanggal' => date("Y-m-d H:i:s"),
					'harga' => $list->harga,
					'frek' => 1,
					'total' => $list->harga,
					'id_staff' => $staff->id_staff,
					'id_paket' => $id_paket,
				);


				$this->M_mcu->insert_labor($data, 'tindakan_labor_mcu');
				$out['status_l'] = "success";
			}
		}
		
		$labor1 = $this->db->get_where('form_labor', ['id_pelayanan' =>  $id_mcu]);
		if (count($labor1->result()) > 0) {
			$id_form_labor1 = $labor1->row()->id_form_labor;

			$out['status_lis'] = $this->req_form_labor($id_form_labor1);
		}

		$out['status'] = "success";
		echo json_encode($out);
	}

	public function req_form_labor($id)
	{
		// $id = $this->input->post('id');
		$query = $this->db->query("SELECT * from tindakan_labor_mcu where id_form_labor='$id'")->result();
		if (count($query) > 0) {
			$page_data = array(
				'tgl_request' =>  date("Y-m-d H:i:s"),
				'status' => 1
			);
			$where = array(
				'id_form_labor' => $id
			);
			$this->M_Poli->update_tindakan($page_data, $where, 'form_labor');
			$id_pel = $query[0]->id_mcu;


			$v_rawat_jalan = $this->db->query("SELECT no_rm,nama_pasien nama,alamat,tgl_lahir,sex jenis_kelamin FROM mcu  WHERE id_mcu ='$id_pel'")->row_array();
			$form_labor = $this->db->query("SELECT diagnosa,tgl FROM form_labor  WHERE id_form_labor ='$id'")->row_array();


			if ($v_rawat_jalan['jenis_kelamin'] == 'Laki-laki' || $v_rawat_jalan['jenis_kelamin'] == 'LAKI-LAKI') {
				$jenis_kelamin = '1';
			} else {
				$jenis_kelamin = '2';
			}

			$kode_lis = $this->db->query("SELECT kode_lis from tindakan_labor_mcu where id_form_labor = '$id'")->result_array();
			$k = array();
			//print_arr($kode_lis);
			foreach ($kode_lis as $row) {
				$k[] = $row['kode_lis'];
			}

			$date  = $v_rawat_jalan['tgl_lahir'];
			$date1 = substr($date, 0, 10);
			$time2 = substr($date, 11, 20);
			$date2 = str_replace("-", "", $date1);
			$time2 = str_replace(":", "", $time2);

			$tgl_lahir = $date2 . $time2;

			$tgl  = $form_labor['tgl'];
			$tgl1 = substr($tgl, 0, 10);
			$jam1 = substr($tgl, 11, 20);
			$tgl2 = str_replace("-", "", $tgl1);
			$jam2 = str_replace(":", "", $jam1);

			$tgl_req = $tgl2 . $jam2;

			$data = array(
				'ID'            =>  $id,
				'MESSAGE_DT'    =>  date('Ymdhis'),
				'ORDER_CONTROL' =>  'NW',
				// 'VERSION'       =>   '2.3',
				'PID'           =>  $v_rawat_jalan['no_rm'],
				'PNAME'         =>  $v_rawat_jalan['nama'],
				// 'ADDRESS1'       =>  $add,
				'ADDRESS1'      =>  $v_rawat_jalan['alamat'],
				'ADDRESS2'      =>  '-',
				'ADDRESS3'      =>  '-',
				'ADDRESS4'      =>  '-',
				'PTYPE'         =>  'OP',
				'BIRTH_DT'      =>  $tgl_lahir,
				'SEX'           =>  $jenis_kelamin,
				'ONO'           =>  'A' . $id,
				'REQUEST_DT'    =>  $tgl_req,
				'SOURCE'        =>  'MCU^Medical Check Up',
				'CLINICIAN'     =>  '-^-',
				'ROOM_NO'       =>  '-',
				'PRIORITY'      =>  'R',
				'CMT'           =>  $form_labor['diagnosa'],
				'VISITNO'       =>  $id,

				'ORDER_TESTID'  =>  implode('~', $k),

				'STATUS'        =>  'N',
				'POST_DT'       =>  date('Ymdhis'),
				'GET_DT'        =>  date('Ymdhis'),
			);
			// echo print_r($data);
			$insert = $this->curl->simple_post($this->api . '/kontak', $data, array(CURLOPT_BUFFERSIZE => 50));



			return "success";
		} else {
			return "error";
		}
	}

	public function hapus_tindakan()
	{
		$id_tindakan = $this->input->post('id_tindakan');
		$tabel = $this->input->post('tabel');

		if ($tabel == 'mcu') {
			$this->M_mcu->delete_tindakan($id_tindakan, 'tindakan_mcu', 'id_tindakan_mcu');
		}
		if ($tabel == 'radiologi') {
			$this->M_mcu->delete_tindakan($id_tindakan, 'tindakan_radiologi_mcu', 'id_tindakan_radiologi');
		}
		if ($tabel == 'labor') {
			$this->M_mcu->delete_tindakan($id_tindakan, 'tindakan_labor_mcu', 'id_tindakan_labor');
		}
		$out['status'] = "success";
		echo json_encode($out);
	}

	public function tampil_total_paket()
	{
		$id_mcu = $this->input->post('id_mcu');
		$data = $this->M_mcu->Total_paket_Byid($id_mcu);
		$out = null;

		for ($i = 0; $i < count($data); $i++) {
			$id_tindakan = "Rp. " . number_format($data[$i]->total, 0, ',', '.');
			$out[$i] = array($id_tindakan);
		}

		if ($out == null) {
			echo '{"data":""}';
			exit;
		} else {
			$data['data'] = $out;
			echo json_encode($data);
			exit;
		}
	}
	public function hapus_list()
	{
		$id = $this->input->post('id');
		$id_paket = $this->input->post('id_paket1');
		$this->M_mcu->delete_tindakan($id, 'detail_paket_mcu', 'id_detail_paket');

		$paket = $this->db->get_where('list_paket_mcu', ['id_paket_mcu' => $id_paket]);
		if (count($paket->result()) > 0) {
			$harga = $this->db->query("SELECT sum(harga) harga from detail_paket_mcu where id_paket ='$id_paket'")->row()->harga;

			$this->M_mcu->update(['harga' => $harga], ['id_paket_mcu' => $id_paket], 'list_paket_mcu');
		}

		$out['status'] = "success";
		echo json_encode($out);
	}
	public function get_total()
	{
		$id_paket = $this->input->post('id');

		$harga = $this->db->query("SELECT sum(harga) harga from detail_paket_mcu where id_paket ='$id_paket'")->row()->harga;
		echo json_encode($harga);
	}
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_mcu extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_mcu');
		$this->load->model('M_Poli');
		$this->api = "http://36.92.141.4/rest_ci/index.php";
		$this->load->library('curl');
	}

	public function index()
	{
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'page_content/Erm';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function form($id_mcu)
	{
		// $id_pelayanan = $id_pel;
		// $id_histori = $id_his;
		$selectPasien = $this->M_mcu->getMCUById($id_mcu);

		$page_data['id_pelayanan'] = $id_mcu;
		$page_data['pasien'] = $selectPasien;

		// $page_data['no_rm'] = $selectPasien->no_rm;
		// $page_data['pasien'] = $this->M_Erm->selectDataPasien($db[0]->no_rm);
		$page_data['data_dokter'] = $this->M_mcu->selectNamaDokter();
		$page_data['tindakan_mcu'] = $this->M_mcu->selectNamaMcu();
		$page_data['tindakan_radiologi'] = $this->M_mcu->selectNamaRadiologi();
		$page_data['tindakan_labor'] = $this->M_mcu->selectNamaLabor();
		$page_data['paket_mcu'] = $this->db->get_where('list_paket_mcu',['jenis'=>'MCU'])->result_array();

		// load page view
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'page_content/Data_tindakan_mcu';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
		$this->load->view('modal_mcu/modal_surat_keterangan_sakit', $page_data);

	}
	public function getNamaTindakan()
	{
		$depo = $this->input->post('depo');
		if ($depo == 'list_tindakan_mcu') {
			$data = $this->M_mcu->selectNamaMcu();
		} else if ($depo == 'list_tindakan_labor') {
			$data = $this->M_mcu->selectNamaLabor();
		} else if ($depo == 'list_tindakan_radiologi_mcu') {
			$data = $this->M_mcu->selectNamaRadiologi();
		}

		echo json_encode($data);
	}
	public function insertDetail()
	{
		$data = $this->session->userdata('data_auth');
		$id = $this->input->post('id');


		$data = array(
			'id_detail_paket' => uniqid(),
			'id_paket' => $this->input->post('id'),
			'id_list_tindakan' => $this->input->post('id_list_tindakan'),
			'nama' => $this->input->post('nama'),
			'tipe' => $this->input->post('tipe'),
			'harga' => $this->input->post('harga'),
			'tgl' => date('Y-m-d H:i:s'),
		);
		$id_paket = $this->M_mcu->insert_labor($data, 'detail_paket_mcu');

		$paket = $this->db->get_where('list_paket_mcu', ['id_paket_mcu' => $this->input->post('id')]);
		if (count($paket->result()) > 0) {
			$harga = $this->db->query("SELECT sum(harga) harga from detail_paket_mcu where id_paket ='$id'")->row()->harga;

			$this->M_mcu->update(['harga' => $harga], ['id_paket_mcu' => $id], 'list_paket_mcu');
		}
		$out['status'] = "success";
		$out['id'] = $id_paket;
		echo json_encode($out);
	}
	public function tampil_list_paket()
	{
		$id = $this->input->post('id');

		$page_data = $this->db->get_where('detail_paket_mcu', ['id_paket' => $id])->result();
		echo json_encode($page_data);
	}
	public function tampil_list_paket1()
	{
		$id = $this->input->post('id');

		$page_data = $this->db->get_where('detail_paket_mcu', ['id_paket' => $id])->result();

		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {

			$tombol = '<button class="btn btn-danger btn-icon-anim btn-square delete" type="button" name="delete" id="' . $page_data[$i]->id_detail_paket . '" ><i class="fa fa-trash"></i></button>';

			$no = $i + 1;
			$nama = $page_data[$i]->nama;
			$harga = "Rp. " . number_format($page_data[$i]->harga, 0, ',', '.');

			$out[$i] = array($no,  $nama, $harga, $tombol);
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
	public function insert_paket()
	{
		$staff = $this->session->userdata('data_auth');

		$id_mcu = $this->input->post('id_mcu');
		$id_paket = $this->input->post('id_paket');

		$paket = $this->db->get_where('detail_paket_mcu', ['id_paket' => $id_paket])->result();

		for ($i = 0; $i < count($paket); $i++) {
			if ($paket[$i]->tipe == 'list_tindakan_mcu') {
				$list = $this->db->get_where('list_tindakan_mcu', ['id_list_tindakan_mcu' =>  $paket[$i]->id_list_tindakan])->row();
				$data = array(
					'id_tindakan_mcu' => uniqid(),
					'id_list_tindakan' => $paket[$i]->id_list_tindakan,
					'id_mcu' => $id_mcu,
					'tanggal' => date("Y-m-d H:i:s"),
					'harga' => $list->harga,
					'frek' => 1,
					'total' => $list->harga,
					'id_staff' => $staff->id_staff,
					'id_paket' => $id_paket,
				);
				$this->M_mcu->insert_labor($data, 'tindakan_mcu');
				$out['status_t'] = "success";
			}
			if ($paket[$i]->tipe == 'list_tindakan_radiologi_mcu') {
				$list = $this->db->get_where('list_tindakan_radiologi_mcu', ['id_daftar_tindakan' =>  $paket[$i]->id_list_tindakan])->row();

				$data = array(
					'id_tindakan_radiologi' => uniqid(),
					'id_daftar_tindakan' => $paket[$i]->id_list_tindakan,
					'tanggal' => date("Y-m-d H:i:s"),
					'id_mcu' => $id_mcu,
					'harga' => $list->harga,
					'frek' => 1,
					'total' => $list->harga,
					'id_staff' => $staff->id_staff,
					'status_radiologi' => 1,
					'id_paket' => $id_paket,
				);

				$this->M_mcu->insert_labor($data, 'tindakan_radiologi_mcu');
				$out['status_r'] = "success";
			}
			if ($paket[$i]->tipe == 'list_tindakan_labor') {

				$labor = $this->db->get_where('form_labor', ['id_pelayanan' =>  $id_mcu]);

				if (count($labor->result()) == 0) {
					$form = array(
						'id_pelayanan' => $id_mcu,
						'diagnosa' => '',
						'ringkasan' => '',
						'keterangan' => '',
						'tgl' => date("Y-m-d H:i:s"),
						'status' => 0,
						'id_staff' => $staff->id_staff,
					);
					$id_form_labor = $this->M_mcu->insert_tindakan($form, 'form_labor'); //diganti dengan labor biasa
				} else {
					$id_form_labor = $labor->row()->id_form_labor;
				}


				$list = $this->db->get_where('list_tindakan_labor', ['id_daftar_tindakan' =>  $paket[$i]->id_list_tindakan])->row();

				$data = array(
					'id_tindakan_labor' => uniqid(),
					'id_daftar_tindakan' => $paket[$i]->id_list_tindakan,
					'nama_tindakan' => $list->nama,
					'kode_lis' => $list->kode_lis,
					'id_mcu' => $id_mcu,
					'id_form_labor' => $id_form_labor,
					'tanggal' => date("Y-m-d H:i:s"),
					'harga' => $list->harga,
					'frek' => 1,
					'total' => $list->harga,
					'id_staff' => $staff->id_staff,
					'id_paket' => $id_paket,
				);


				$this->M_mcu->insert_labor($data, 'tindakan_labor_mcu');
				$out['status_l'] = "success";
			}
		}
		
		$labor1 = $this->db->get_where('form_labor', ['id_pelayanan' =>  $id_mcu]);
		if (count($labor1->result()) > 0) {
			$id_form_labor1 = $labor1->row()->id_form_labor;

			$out['status_lis'] = $this->req_form_labor($id_form_labor1);
		}

		$out['status'] = "success";
		echo json_encode($out);
	}

	public function req_form_labor($id)
	{
		// $id = $this->input->post('id');
		$query = $this->db->query("SELECT * from tindakan_labor_mcu where id_form_labor='$id'")->result();
		if (count($query) > 0) {
			$page_data = array(
				'tgl_request' =>  date("Y-m-d H:i:s"),
				'status' => 1
			);
			$where = array(
				'id_form_labor' => $id
			);
			$this->M_Poli->update_tindakan($page_data, $where, 'form_labor');
			$id_pel = $query[0]->id_mcu;


			$v_rawat_jalan = $this->db->query("SELECT no_rm,nama_pasien nama,alamat,tgl_lahir,sex jenis_kelamin FROM mcu  WHERE id_mcu ='$id_pel'")->row_array();
			$form_labor = $this->db->query("SELECT diagnosa,tgl FROM form_labor  WHERE id_form_labor ='$id'")->row_array();


			if ($v_rawat_jalan['jenis_kelamin'] == 'Laki-laki' || $v_rawat_jalan['jenis_kelamin'] == 'LAKI-LAKI') {
				$jenis_kelamin = '1';
			} else {
				$jenis_kelamin = '2';
			}

			$kode_lis = $this->db->query("SELECT kode_lis from tindakan_labor_mcu where id_form_labor = '$id'")->result_array();
			$k = array();
			//print_arr($kode_lis);
			foreach ($kode_lis as $row) {
				$k[] = $row['kode_lis'];
			}

			$date  = $v_rawat_jalan['tgl_lahir'];
			$date1 = substr($date, 0, 10);
			$time2 = substr($date, 11, 20);
			$date2 = str_replace("-", "", $date1);
			$time2 = str_replace(":", "", $time2);

			$tgl_lahir = $date2 . $time2;

			$tgl  = $form_labor['tgl'];
			$tgl1 = substr($tgl, 0, 10);
			$jam1 = substr($tgl, 11, 20);
			$tgl2 = str_replace("-", "", $tgl1);
			$jam2 = str_replace(":", "", $jam1);

			$tgl_req = $tgl2 . $jam2;

			$data = array(
				'ID'            =>  $id,
				'MESSAGE_DT'    =>  date('Ymdhis'),
				'ORDER_CONTROL' =>  'NW',
				// 'VERSION'       =>   '2.3',
				'PID'           =>  $v_rawat_jalan['no_rm'],
				'PNAME'         =>  $v_rawat_jalan['nama'],
				// 'ADDRESS1'       =>  $add,
				'ADDRESS1'      =>  $v_rawat_jalan['alamat'],
				'ADDRESS2'      =>  '-',
				'ADDRESS3'      =>  '-',
				'ADDRESS4'      =>  '-',
				'PTYPE'         =>  'OP',
				'BIRTH_DT'      =>  $tgl_lahir,
				'SEX'           =>  $jenis_kelamin,
				'ONO'           =>  'A' . $id,
				'REQUEST_DT'    =>  $tgl_req,
				'SOURCE'        =>  'MCU^Medical Check Up',
				'CLINICIAN'     =>  '-^-',
				'ROOM_NO'       =>  '-',
				'PRIORITY'      =>  'R',
				'CMT'           =>  $form_labor['diagnosa'],
				'VISITNO'       =>  $id,

				'ORDER_TESTID'  =>  implode('~', $k),

				'STATUS'        =>  'N',
				'POST_DT'       =>  date('Ymdhis'),
				'GET_DT'        =>  date('Ymdhis'),
			);
			// echo print_r($data);
			$insert = $this->curl->simple_post($this->api . '/kontak', $data, array(CURLOPT_BUFFERSIZE => 50));



			return "success";
		} else {
			return "error";
		}
	}

	public function hapus_tindakan()
	{
		$id_tindakan = $this->input->post('id_tindakan');
		$tabel = $this->input->post('tabel');

		if ($tabel == 'mcu') {
			$this->M_mcu->delete_tindakan($id_tindakan, 'tindakan_mcu', 'id_tindakan_mcu');
		}
		if ($tabel == 'radiologi') {
			$this->M_mcu->delete_tindakan($id_tindakan, 'tindakan_radiologi_mcu', 'id_tindakan_radiologi');
		}
		if ($tabel == 'labor') {
			$this->M_mcu->delete_tindakan($id_tindakan, 'tindakan_labor_mcu', 'id_tindakan_labor');
		}
		$out['status'] = "success";
		echo json_encode($out);
	}

	public function tampil_total_paket()
	{
		$id_mcu = $this->input->post('id_mcu');
		$data = $this->M_mcu->Total_paket_Byid($id_mcu);
		$out = null;

		for ($i = 0; $i < count($data); $i++) {
			$id_tindakan = "Rp. " . number_format($data[$i]->total, 0, ',', '.');
			$out[$i] = array($id_tindakan);
		}

		if ($out == null) {
			echo '{"data":""}';
			exit;
		} else {
			$data['data'] = $out;
			echo json_encode($data);
			exit;
		}
	}
	public function hapus_list()
	{
		$id = $this->input->post('id');
		$id_paket = $this->input->post('id_paket1');
		$this->M_mcu->delete_tindakan($id, 'detail_paket_mcu', 'id_detail_paket');

		$paket = $this->db->get_where('list_paket_mcu', ['id_paket_mcu' => $id_paket]);
		if (count($paket->result()) > 0) {
			$harga = $this->db->query("SELECT sum(harga) harga from detail_paket_mcu where id_paket ='$id_paket'")->row()->harga;

			$this->M_mcu->update(['harga' => $harga], ['id_paket_mcu' => $id_paket], 'list_paket_mcu');
		}

		$out['status'] = "success";
		echo json_encode($out);
	}
	public function get_total()
	{
		$id_paket = $this->input->post('id');

		$harga = $this->db->query("SELECT sum(harga) harga from detail_paket_mcu where id_paket ='$id_paket'")->row()->harga;
		echo json_encode($harga);
	}
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
