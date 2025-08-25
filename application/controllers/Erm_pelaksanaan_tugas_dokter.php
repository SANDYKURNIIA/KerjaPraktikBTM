<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_pelaksanaan_tugas_dokter extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_IGD');
		$this->load->model('M_Erm');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Assembling');
		$this->load->model('M_Pencarian_Pasien');
		$this->load->model('M_Erm_ranap');
		$this->load->model('M_Rawatinap');
		$this->load->model('M_Apelkes');
		$this->load->model('M_Pencarian_Pasien');

	}

	public function form($id_pelayanan, $id_history)
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
		$page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['dokter'] = $selectPasien->nama_dokter;
		$page_data['link'] = 'Erm_igd/form';
		$page_data['gambar'] = base_url("assets/dist/img/orang1.png");
		

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_tugas_dokter_IGD';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_tugas_dokter($id_pelayanan, $id_history)
	{
		$img = $this->input->post('gambar');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = "ttd/" . uniqid(time(), true) . ".png";
		// $success = file_put_contents($file, $data);


		$selectPasien = $this->M_Erm->selectDataPasienIGDby_id($id_pelayanan, $id_history); // $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;
		$page_data['dokter'] = $selectPasien->nama_dokter;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_edit/view_tugas_dokter_IGD';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function simpan_form_tugas_dokter()
    {
        // $data = $this->session->userdata('data_auth');
		// $tgl = date("Y-m-d H:i:s");
		// $img1 = $this->input->post('ttd');
		$img = $this->input->post('gambar');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = "assets/images/". uniqid(time(), true) . ".png";
		$success = file_put_contents($file, $data);

        $staff = $this->session->userdata('data_auth');
        // $staff = $data->id_staff;
        $id = $this->input->post('id_pelayanan');
        $db = $this->db->query("SELECT count(*) count from form_pelaksanaan_tugas_dokter where id_pelayanan ='$id'")->row();
        if ($db->count == 0) {
            $db = [
				'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                'pen_sakit' => $this->input->post('pen_sakit'),
                'diag_ugd' => $this->input->post('diag_ugd'),
                'pem_penunjangan' => $this->input->post('pem_penunjangan'),
                'obat_terapi' => $this->input->post('obat_terapi'),
                'konsul_spesialis' => $this->input->post('konsul_spesialis'),
                'dirawat' =>$this->input->post('dirawat'),
                'tgl_input' => date("Y-m-d H:i:s"), 
				'ket_sakit' => $this->input->post('ket_sakit'),
				'ket_diag'=> $this->input->post('ket_diag'),
				'ket_penunjang'=> $this->input->post('ket_penunjang'),
				'ket_terapi'=> $this->input->post('ket_terapi'),
				'ket_konsul'=> $this->input->post('ket_konsul'),
				'ket_dirawat'=> $this->input->post('ket_dirawat'),
                'staff' => $staff->id_staff,
				'gambar' => $file,
            ];
            $this->M_Erm_ranap->insert_tindakan($db, 'form_pelaksanaan_tugas_dokter');
        } else {
            $db = [
				'pen_sakit' => $this->input->post('pen_sakit'),
                'diag_ugd' => $this->input->post('diag_ugd'),
                'pem_penunjangan' => $this->input->post('pem_penunjangan'),
                'obat_terapi' => $this->input->post('obat_terapi'),
                'konsul_spesialis' => $this->input->post('konsul_spesialis'),
                'dirawat' =>$this->input->post('dirawat'),
				'ket_sakit' => $this->input->post('ket_sakit'),
				'ket_diag'=> $this->input->post('ket_diag'),
				'ket_penunjang'=> $this->input->post('ket_penunjang'),
				'ket_terapi'=> $this->input->post('ket_terapi'),
				'ket_konsul'=> $this->input->post('ket_konsul'),
				'ket_dirawat'=> $this->input->post('ket_dirawat'),
				'gambar' => $file,
            ];
			$where = array('id_pelayanan' => $this->input->post('id_pelayanan'));
			$this->M_Erm->update($db, $where, 'form_pelaksanaan_tugas_dokter');
        }
		$out['status'] = "success";
		echo json_encode($out);

    }
	public function getData()
	{
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_pelaksanaan_tugas_dokter', ['id_pelayanan' => $id])->row_array();
		if ($db == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data = $db;
			echo json_encode($page_data);
			exit;
		}
	}

	public function print_out()
	{
		$data['page_title']="General Concern";
		$id_pelayanan=$this->input->post('id_pelayanan');
		$data = $this->db->query("SELECT * from form_pelaksanaan_tugas_dokter s, pelayanan m where s.id_pelayanan = m.id_pelayanan and s.id_pelayanan = '$id_pelayanan'")->row();
		$this->load->view('erm_print/erm_pelaksanaan_tugas_dokter', $data);

	}
}