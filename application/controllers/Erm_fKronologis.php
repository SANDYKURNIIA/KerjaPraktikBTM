<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_fKronologis extends CI_Controller{
	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm');

	}

	private function _primary(){
		return "id_fKronologis";
	}
	private function _where(){
		return "upload_form_kronologis";
	}
	private function _imgPath(){
		return "./assets/images/";
	}

	public function form($id_pelayanan, $id_history){
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
		$page_data['tgl_keluar'] = ($selectPasien->tgl_keluar == null) ? '-' : $selectPasien->tgl_keluar;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
		$page_data['id_history'] = $selectPasien->id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_Erm_fKronologis';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function tampil_data(){
		$id_pel = $this->input->post("id_pelayanan");
		$sql = $this->db->get_where($this->_where(),['id_pelayanan' => $id_pel])->result();
		$out = null;

		for($i = 0;$i < count($sql);$i++){
			$no = $i + 1;
			$tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='pilih(\"" . $sql[$i]->id_fKronologis . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myHapus_".$sql[$i]->id_fKronologis."' onclick='hapus(\"" . $sql[$i]->id_fKronologis . "\")' '><i class='icon-trash'></i></button>";

			$tanggal = strtotime($sql[$i]->tanggal);
			$date = strftime("%A, %d %B %Y ", $tanggal);
			$gambar = null;
			$dpjp = $sql[$i]->dpjp;
			$ket = $sql[$i]->keterangan;
			foreach (explode(',', $sql[$i]->file) as $image) { // 1, 2, 3
                $gambar .= "<img src='".base_url().$this->_imgPath(). $image . "' class='img-responsive zoom'>";
            }
			//$out[$i] = array($no, $tombol,$hapus, htmlentities($tanggal), htmlentities($dpjp), htmlentities($ket),$gambar);
			$out[$i] = array($no, $tombol,$hapus, htmlentities($date), htmlentities($dpjp), htmlentities($ket),$gambar);
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

	private function __getDokter(){
		$this->db->select("nama");
		$this->db->from("dokter");
		return $this->db->get()->result_array();
	}

	public function getDokter(){
		echo json_encode($this->__getDokter());
	}

	public function insert_data(){
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$config['upload_path']= $this->_imgPath();
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
		$config['overwrite'] = FALSE;
		$config['max_size'] = 5048000; //5 mb

        $this->load->library('upload',$config);

        if(!$this->upload->do_upload("filefoto")){
			$status = "gagal";
			$msg = $this->upload->display_errors("", "");
		}else{
			$status = "sukses";
			$msg = "File successfully uploaded";
		}

        $fileData = $this->upload->data();

			$allData = [
				'id_pelayanan' => $this->input->post('inPel'),
				'id_history' => $this->input->post('inHis'),
				'no_rm' => $this->input->post('inNoRM'),
				'tanggal' => $this->input->post('tanggal'),
				'dpjp' => $this->input->post('dpjp'),
				'keterangan' => $this->input->post('ket'),
				'file'  => $fileData['file_name'],
				'tanggal_input' => $tgl,
				'staff' => $staff,
			];
		$this->M_Erm->insert($allData,$this->_where());

		echo json_encode(array('status' => $status, 'msg' => $msg));
	}

	private function __imagesPath($id){
		$sql = $this->db->get_where($this->_where(),[$this->_primary() => $id])->row();
		return $sql->file;
	}

	public function deleteData(){
		$id = $this->input->post('id');
		$where = array($this->_primary() => $id);

		if($this->__imagesPath($id) != null){
			unlink($this->_imgPath().$this->__imagesPath($id));
		}

		$this->M_Erm->delete($where,$this->_where());
		$out["status"] = "sukses";
		echo json_encode($out);
	}

	public function getDataUpdate(){
		$data = $this->session->userdata('data_auth');
		$id = $this->input->post("id");
		$db = $this->db->get_where($this->_where(),[$this->_primary() => $id]);
		if ($db->num_rows() != 0 ) {
			$db = $db->row_array();
			$db['status'] = 'found';
		} else {
			$db = null;
			$db['status'] = 'not found';
		}
		echo json_encode($db);
		exit;
	}

	public function updateData(){
		$data = $this->session->userdata('data_auth');
		$tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

		$config['upload_path']= $this->_imgPath();
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
		$config['overwrite'] = FALSE;
		$config['max_size'] = 5048000; //5 mb

        $this->load->library('upload',$config);

		

        if(!$this->upload->do_upload("filefoto")){
			$status = "gagal";
			$msg = $this->upload->display_errors("", "");

			$allData = [
				'id_pelayanan' => $this->input->post('inPel'),
				'id_history' => $this->input->post('inHis'),
				'no_rm' => $this->input->post('inNoRM'),
				'tanggal' => $this->input->post('tanggal'),
				'dpjp' => $this->input->post('dpjp'),
				'keterangan' => $this->input->post('ket'),
				'tanggal_input' => $tgl,
				'staff' => $staff,
			];
		}else{
			$status = "sukses";
			$msg = "File successfully uploaded";
			$fileData = $this->upload->data();
			unlink($this->_imgPath().$this->__imagesPath($this->input->post('id')));
			$allData = [
				'id_pelayanan' => $this->input->post('inPel'),
				'id_history' => $this->input->post('inHis'),
				'no_rm' => $this->input->post('inNoRM'),
				'tanggal' => $this->input->post('tanggal'),
				'dpjp' => $this->input->post('dpjp'),
				'keterangan' => $this->input->post('ket'),
				'file'  => $fileData['file_name'],
				'tanggal_input' => $tgl,
				'staff' => $staff,
			];
		}




		$where = array(
			$this->_primary() => $this->input->post('id')
		);
		$this->M_Erm->update($allData,$where,$this->_where());
		echo json_encode(array('status' => $status, 'msg' => $msg));
	}


}