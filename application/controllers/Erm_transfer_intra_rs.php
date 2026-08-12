<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_transfer_intra_rs extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm');
		$this->load->model('M_Erm_poli');
	}

	public function form($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm->selectDataPasienbyid($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
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
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['data'] = $selectPasien;
		$page_data['diagnosa'] = $this->db->query("SELECT * from diagnosa_utama where id_history='$id_history'")->row();


		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_transfer_intra_rs';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_intra($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
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
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['data'] = $selectPasien;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_transfer_intra_rs';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function form_riwayat($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm->selectDataPasienIGDbyid($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
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
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['data'] = $selectPasien;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_transfer_intra_rs';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function riwayat_intra($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm->selectDataPasienIGDbyid($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
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
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['data'] = $selectPasien;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_transfer_intra_rs';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	/////////////////////RAJAL////////////////////////////
	public function form_raj($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
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
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['data'] = $selectPasien;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_transfer_intra_rs';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function edit_intra_raj($id_pelayanan, $id_history)
	{
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
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
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['data'] = $selectPasien;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_transfer_intra_rs';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function insert_tf_intra_rs()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;


		$this->form_validation->set_rules('tglPindah', 'Pasien Rujuk', 'required');
		$this->form_validation->set_rules('tuj_pindah', 'Asal Rujuk', 'required');
		$this->form_validation->set_rules('cara_tf', 'GCS', 'required');
		$this->form_validation->set_rules('kondisi_tf', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('dada', 'Kondisi Umum', 'required');
		$this->form_validation->set_rules('paru', 'Suhu', 'required');
		$this->form_validation->set_rules('sirkulasi', 'Suhu', 'required');
		if ($this->form_validation->run()) {
			$data = array(
				'id_pelayanan' => $this->input->post('id_pelayanan'),
				'id_history' => $this->input->post('id_history'),
				'no_rm' => $this->input->post('no_rm'),
				'tglPindah' => $this->input->post('tglPindah'),
				'tuj_pindah' => $this->input->post('tuj_pindah'),
				'id_kamar' => $this->input->post('id_kamar'),
				'cara_tf' => $this->input->post('cara_tf'),
				'kondisi_tf' => $this->input->post('kondisi_tf'),
				'kondisi_terima' => $this->input->post('kondisi_terima'),
				'dada' => $this->input->post('dada'),
				'paru' => $this->input->post('paru'),
				'sirkulasi' => $this->input->post('sirkulasi'),
				'observasi' => $this->input->post('observasi'),

				'tanggal' => $tgl,
				'staff' => $staff,
			);

			$this->M_Erm->insert($data, 'form_transfer_intra_rs');
			$out['status'] = "success";
		} else {
			$out = array(
				'error'   => true,
				'tglPindah' => form_error('tglPindah'),
				'tuj_pindah' => form_error('tuj_pindah'),
				'cara_tf' => form_error('cara_tf'),
				'kondisi_tf' => form_error('kondisi_tf'),
				'kondisi_terima' => form_error('kondisi_terima'),
				'dada' => form_error('dada'),
				'paru' => form_error('paru'),
				'sirkulasi' => form_error('sirkulasi'),
			);
		}
		echo json_encode($out);
	}
	public function edit_tf_intra_rs()
	{
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;


		$data = array(
			'id_pelayanan' => $this->input->post('id_pelayanan'),
			'id_history' => $this->input->post('id_history'),
			'no_rm' => $this->input->post('no_rm'),
			'tglPindah' => $this->input->post('tglPindah'),
			'tuj_pindah' => $this->input->post('tuj_pindah'),
			'id_kamar' => $this->input->post('id_kamar'),
			'cara_tf' => $this->input->post('cara_tf'),
			'kondisi_tf' => $this->input->post('kondisi_tf'),
			'kondisi_terima' => $this->input->post('kondisi_terima'),

			'dada' => $this->input->post('dada'),
			'paru' => $this->input->post('paru'),
			'sirkulasi' => $this->input->post('sirkulasi'),
			'observasi' => $this->input->post('observasi'),

			'tanggal' => $tgl,
			'staff' => $staff,
		);
		$where = array(
			'id_form_transfer_intra_rs' => $this->input->post('id')
		);
		$this->M_Erm->update($data, $where, 'form_transfer_intra_rs');
		$out['status'] = "success";

		echo json_encode($out);
	}

	public function tampil_list()
	{
		$id_pelayanan = $this->input->post('id_pelayanan');
		$page_data = $this->db->get_where('form_transfer_intra_rs',['id_pelayanan'=>$id_pelayanan])->result();

		// $page_data = null;
		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_form_transfer_intra_rs . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_tindakan(\"" . $page_data[$i]->id_form_transfer_intra_rs  . "\")' '><i class='fa fa-trash'></i></button>";
			$tuj_pindah = $page_data[$i]->tuj_pindah;
			$cara_tf = $page_data[$i]->cara_tf;
			$kondisi_tf  = $page_data[$i]->kondisi_tf;
			$kondisi_terima = $page_data[$i]->kondisi_terima;

			$tanggal = strtotime($page_data[$i]->tglPindah);
			$date = strftime("%A, %d %B %Y ", $tanggal) . " " . $waktu = strftime("%H:%M WIB", $tanggal);;

			$out[$i] = array($no, $date,$tuj_pindah,$cara_tf,$kondisi_tf,$kondisi_terima, $tombol, $hapus);
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
	public function getDataForm()
	{
		$id = $this->input->post('id');
		$db = $this->db->query("SELECT f.*,r.kelas_ruangan FROM form_transfer_intra_rs f 
		join ruangan r on f.id_kamar = r.id_ruangan
		where f.id_form_transfer_intra_rs ='$id'")->result_array();
		if ($db == null) {
			$out['status']='not-found';
		} else {
			$out['status']='found';
			$out['data']=$db[0];
		}
		echo json_encode($out);

	}
}
