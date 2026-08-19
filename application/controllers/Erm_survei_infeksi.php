<?php

defined('BASEPATH') or exit('No direct script access allowed');

class erm_survei_infeksi extends CI_Controller{
	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm');
		$this->load->model('M_Erm_ranap');
	}

	public function getIdFormSurvei(){
		$id = $this->input->post('id');
		$db = $this->db->get_where('form_survei_infeksi', ['id_form_survei_infeksi' => $id])->row_array();
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

	public function form($id_pelayanan, $id_history){
		$selectPasien = $this->M_Erm->selectDataPasienIGDbyid($id_pelayanan, $id_history);
		$selectPasienRanap = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');
		if($staff->tipe == "igd"){
			$page_data['nama'] = $selectPasien->nama;
			$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
			$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
			$page_data['no_rm'] = $selectPasien->no_rm;
			$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
			$page_data['id_history'] = $selectPasien->id_history;
			$page_data['pasien'] = $selectPasien;
		}elseif ($staff->tipe == "rawatinap") {
			$page_data['nama'] = $selectPasienRanap->nama;
			$page_data['tgl_lahir'] = $selectPasienRanap->tgl_lahir;
			$page_data['jenis_kelamin'] = $selectPasienRanap->jenis_kelamin;
			$page_data['no_rm'] = $selectPasienRanap->no_rm;
			$page_data['id_pelayanan'] = $selectPasienRanap->id_pelayanan;
			$page_data['id_history'] = $selectPasienRanap->id_history;
			$page_data['pasien'] = $selectPasienRanap;
		}
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_asses_survei_infeksi';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}


	
	public function edit_survei(){
		$data = $this->session->userdata('data_auth');

		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;
		$id = $this->input->post('id');

		//$this->input->post('{var name in payload}')
		//noRm, id pel & his
		$no_rm = $this->input->post('inNoRm');
		$idPel = $this->input->post('inPel');
		$idHis = $this->input->post('inHis');

		//getData
		//Rawat Jalan
		$tglKontrol = $this->input->post('TglKontrol');
		$hariKe = $this->input->post('hariKe');
		$kondisiLuka = $this->input->post('kondisiLuka');

		//Kontrol
		$kel_cai_pur = $this->input->post('kel_cai_pur');
		$tandaInfeksi = $this->input->post('tanda_infeksi');
		$arrtoString = implode(",", (array)$tandaInfeksi);
		$datas = [
				'no_rm' => $no_rm,
				'id_pelayanan' => $idPel,
				'id_history' => $idHis,
				'tgl_kontrol' => $tglKontrol,
				'hari_ke' => $hariKe,
				'kondisi_luka' => $kondisiLuka,
				'kel_cai_pur' => $kel_cai_pur,
				'tanda_infeksi' => $arrtoString,
				'id_staff' => $staff
		];
		$where = array('id_form_survei_infeksi' => $id);
		$this->M_Erm->update($datas, $where, 'form_survei_infeksi');
		$out['status'] = "success";
		echo json_encode($out);
	}
	



	public function insert_survei_infeksi(){
		//Auth user
		$data = $this->session->userdata('data_auth');
		$tgl =  date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		//noRm, id pel & his

		//$this->input->post('{var name in payload}')
		$no_rm = $this->input->post('no_rm');
		$idPel = $this->input->post('id_pelayanan');
		$idHis = $this->input->post('id_history');

		//getData
		//Rawat Jalan
		$tglKontrol = $this->input->post('tgl_kontrol');
		$hariKe = $this->input->post('hari_ke');
		$kondisiLuka = $this->input->post('kondisi_luka');
		$kel_cai_pur = $this->input->post('kel_cai_pur');
		$tandaInfeksi = $this->input->post('tanda_infeksi');
		$data = array(
				'no_rm' => $no_rm,
				'id_pelayanan' => $idPel,
				'id_history' => $idHis,
				'tgl_kontrol' => $tglKontrol,
				'hari_ke' => $hariKe,
				'kondisi_luka' => $kondisiLuka,
				'kel_cai_pur' => $kel_cai_pur,
				'tanda_infeksi' => $tandaInfeksi,
				'id_staff' => $staff
		);

		$this->M_Erm->insert($data,'form_survei_infeksi');
		$out['status'] = "success";
		echo json_encode($out);
	}

	public function hapus_survei(){
		$id = $this->input->post('id');
		$where = array(
			'id_form_survei_infeksi' => $id,
		);
		$this->M_Erm->delete($where,'form_survei_infeksi');
		$out['status'] = "success";
		echo json_encode($out);
	}

	private function __getStaffName($id){
		return $this->db->get_where("staff",array("id_staff" => $id))->row()->nama;
	}


	public function tampil_list_hasil_survei_infeksi(){
		$id_pelayanan = $this->input->post('id_pelayanan');
		//$page_data = $this->db->query("SELECT * from form_survei_infeksi where id_pelayanan='$id_pelayanan' AND id_history='$id_history'")->result();
		$page_data = $this->M_Erm->selectSurveiInfeksi($id_pelayanan);
		//$page_data = null;
		$out = null;
		for($i=0;$i < count($page_data);$i++){
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_form_survei_infeksi . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $page_data[$i]->id_form_survei_infeksi . "\")' '><i class='icon-trash'></i></button>";
			$tanggal = strtotime($page_data[$i]->tgl_kontrol);
			$date = strftime("%A, %d %B %Y ", $tanggal);
			$hari = $page_data[$i]->hari_ke;
			$kondisi = $page_data[$i]->kondisi_luka;
			$kelcaipur = $page_data[$i]->kel_cai_pur;
			$tandaInfeksi = $page_data[$i]->tanda_infeksi;
			$staffName = $this->__getStaffName($page_data[$i]->id_staff);
			$out[$i] = array($no,$tombol,$hapus,$date,$hari,$kondisi,$kelcaipur,$tandaInfeksi,$staffName);
		}
		if($out == null){
			echo '{"data":""}';
			exit;
		}else{
			$page_data['data'] = $out;
			echo json_encode($page_data);
			exit;
		}
	}


}