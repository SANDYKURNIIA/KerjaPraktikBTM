<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_resume_medis_raj extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Poli');
	}

	public function form($id_pelayanan, $id_history, $jenis)
	{
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDbyid($id_pelayanan, $id_history);
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
		$page_data['pasien'] = $selectPasien;

		$asses_per_igd = $this->M_Erm_poli->checkData($id_history, 'form_assesmen_awal_rajal');
		// var_dump($asses_per_igd);
		$page_data['per'] = empty($asses_per_igd) ? null : $asses_per_igd;
		$asses_dokter_igd = $this->M_Erm_poli->checkData($id_history, 'form_assesmen_dokter');
		$page_data['dok'] = empty($asses_dokter_igd) ? null : $asses_dokter_igd;

		$diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_pelayanan='$id_pelayanan'")->row_array();

		$page_data['diagnosa_utama'] = ($asses_dokter_igd == null) ? "" : $diagnosa1;
		$page_data['url'] = base_url('Erm_poli_edit/print_resume_medis/') . $id_pelayanan . '/' . $id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_rasume_medis_raj';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function input_rasume_medis_raj()
	{
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_rasume_medis_raj';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function get_data_resume()
	{
		$id = $this->input->post('id');
		$id_history = $this->input->post('id_history');

		$asses_per_igd = $this->db->query("SELECT 
		
		p.tekanan_darah,
		p.suhu,
		p.frequensi_nadi,
		p.frequensi_nafas,
		p.skala_nyeri,
		d.kepala,
		d.hidung,
		d.mulut,
		d.leher,
		d.thorax,
		d.jantung,
		d.paru,
		d.andomen,
		d.punggung,
		d.ekstremitas
	FROM
		form_assesmen_awal_rajal p
	LEFT JOIN
		form_assesmen_dokter d ON p.id_history = d.id_history
	WHERE
		p.id_pelayanan = '$id' AND d.id_history = '$id_history'
	GROUP BY
		p.id_history;")->row_array();
		// var_dump($asses_per_igd);
		$db = empty($asses_per_igd) ? null : $asses_per_igd;

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
		$data['page_title'] = "Resume Medis Rajal";
		$this->load->view('erm_print/resume_medis_raj', $data);
	}

	public function tampil_list_tindakan() {
		$data = $this->session->userdata('data_auth');
		$tipe = $data->tipe;
		if ($tipe == 'poliinternis' || $tipe == 'poli') {
			$table = 'v_tindakan_poli_internis';
		} elseif ($tipe == 'poliobgyne' || $tipe == 'poli') {
			$table = 'v_tindakan_poli_obgyne';
		} elseif ($tipe == 'politht') {
			$table = 'v_tindakan_poli_tht';
		} elseif ($tipe == 'polimata') {
			$table = 'v_tindakan_poli_mata';
		} elseif ($tipe == 'polikulit') {
			$table = 'v_tindakan_poli_kulit';
		} elseif ($tipe == 'poliumum') {
			$table = 'v_tindakan_poli_umum';
		} elseif ($tipe == 'polianak') {
			$table = 'v_tindakan_poli_anak';
		} elseif ($tipe == 'poligigi' || $tipe == 'poliorthodonti') {
			$table = 'v_tindakan_poli_gigi';
		} elseif ($tipe == 'polijantung') {
			$table = 'v_tindakan_poli_jantung';
		} elseif ($tipe == 'polibedah') {
			$table = 'v_tindakan_poli_bedah';
		} elseif ($tipe == 'polifisio' || $tipe == 'rekam medis' || $tipe == 'rawatinap' || $tipe == 'icu' || $tipe == 'rehab') {
			$table = 'v_tindakan_poli_fisio';
		} elseif ($tipe == 'poliakupuntur') {
			$table = 'v_tindakan_poli_akupuntur';
		} elseif ($tipe == 'polibedahmulut') {
			$table = 'v_tindakan_poli_bedah_mulut';
		} elseif ($tipe == 'polikesjiwa') {
			$table = 'v_tindakan_poli_kes_jiwa';
		} elseif ($tipe == 'poliorthopedi') {
			$table = 'v_tindakan_poli_orthopedi';
		} elseif ($tipe == 'poliparu') {
			$table = 'v_tindakan_poli_paru';
		} elseif ($tipe == 'polisaraf') {
			$table = 'v_tindakan_poli_saraf';
		} elseif ($tipe == 'poliurologi') {
			$table = 'v_tindakan_poli_urologi';
		} elseif ($tipe == 'polipenyakitmulut') {
			$table = 'v_tindakan_poli_penyakit_mulut';
		} elseif ($tipe == 'poliginjal') {
			$table = 'v_tindakan_poli_ginjal';
		} elseif ($tipe == 'polipsikolog') {
			$table = 'v_tindakan_poli_psikolog';
		} elseif ($tipe == 'poligizi') {
			$table = 'v_tindakan_poli_gizi';
		} elseif ($tipe == 'terapiwicara') {
			$table = 'v_tindakan_poli_terapi_wicara';
		} elseif ($tipe == 'polihemodialisa') {
			$table = 'v_tindakan_poli_hd';
		} elseif ($tipe == 'kemoterapi') {
			$table = 'v_tindakan_poli_kemo';
		} elseif ($tipe == 'polistifin') {
			$table = 'v_tindakan_poli_stifin';
		} elseif ($tipe == 'poliorthodonti') {
			$table = 'v_tindakan_orthodenti';
		} elseif ($tipe == 'konservasigigi') {
			$table = 'v_tindakan_konservasi_gigi';
		} elseif ($tipe == 'okupasi') {
			$table = 'v_tindakan_okupasi';
		} else {
			//dinamis
			if ($row = $this->db->get_where('list_poli', ['tipe_staff' => $tipe])->row()) {
				//table tindakan
				$table = "v_" . $row->tindakan;
			}
		}
		$id_pelayanan = $this->input->post('id_pelayanan');
		$list_tindakan = $this->M_Poli->selectDataTindakanByIdPel($id_pelayanan, $table);

		if ($list_tindakan == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data['data'] = $list_tindakan;
			echo json_encode($page_data);
			exit;
		}
	}

	public function tampil_list_radiologi() {
		$id_pelayanan = $this->input->post('id_pelayanan');
		$list_radiologi = $this->M_Poli->selectDataRadiologiById($id_pelayanan);

		if ($list_radiologi == null) {
			echo '{"data":""}';
			exit;
		} else {
			$data['data'] = $list_radiologi;
			echo json_encode($data);
			exit;
		}
	}


	public function tampil_list_labor()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $list_labor = $this->M_Poli->selectDataLaborByIdAndStatus1($id_pelayanan);
        if ($list_labor == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $list_labor;
            echo json_encode($data);
            exit;
        }
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_resume_medis_raj extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Poli');
	}

	public function form($id_pelayanan, $id_history, $jenis)
	{
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDbyid($id_pelayanan, $id_history);
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
		$page_data['pasien'] = $selectPasien;

		$asses_per_igd = $this->M_Erm_poli->checkData($id_history, 'form_assesmen_awal_rajal');
		// var_dump($asses_per_igd);
		$page_data['per'] = empty($asses_per_igd) ? null : $asses_per_igd;
		$asses_dokter_igd = $this->M_Erm_poli->checkData($id_history, 'form_assesmen_dokter');
		$page_data['dok'] = empty($asses_dokter_igd) ? null : $asses_dokter_igd;

		$diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_pelayanan='$id_pelayanan'")->row_array();

		$page_data['diagnosa_utama'] = ($asses_dokter_igd == null) ? "" : $diagnosa1;
		$page_data['url'] = base_url('Erm_poli_edit/print_resume_medis/') . $id_pelayanan . '/' . $id_history;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_rasume_medis_raj';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function input_rasume_medis_raj()
	{
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_rasume_medis_raj';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function get_data_resume()
	{
		$id = $this->input->post('id');
		$id_history = $this->input->post('id_history');

		$asses_per_igd = $this->db->query("SELECT 
		
		p.tekanan_darah,
		p.suhu,
		p.frequensi_nadi,
		p.frequensi_nafas,
		p.skala_nyeri,
		d.kepala,
		d.hidung,
		d.mulut,
		d.leher,
		d.thorax,
		d.jantung,
		d.paru,
		d.andomen,
		d.punggung,
		d.ekstremitas
	FROM
		form_assesmen_awal_rajal p
	LEFT JOIN
		form_assesmen_dokter d ON p.id_history = d.id_history
	WHERE
		p.id_pelayanan = '$id' AND d.id_history = '$id_history'
	GROUP BY
		p.id_history;")->row_array();
		// var_dump($asses_per_igd);
		$db = empty($asses_per_igd) ? null : $asses_per_igd;

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
		$data['page_title'] = "Resume Medis Rajal";
		$this->load->view('erm_print/resume_medis_raj', $data);
	}

	public function tampil_list_tindakan() {
		$data = $this->session->userdata('data_auth');
		$tipe = $data->tipe;
		if ($tipe == 'poliinternis' || $tipe == 'poli') {
			$table = 'v_tindakan_poli_internis';
		} elseif ($tipe == 'poliobgyne' || $tipe == 'poli') {
			$table = 'v_tindakan_poli_obgyne';
		} elseif ($tipe == 'politht') {
			$table = 'v_tindakan_poli_tht';
		} elseif ($tipe == 'polimata') {
			$table = 'v_tindakan_poli_mata';
		} elseif ($tipe == 'polikulit') {
			$table = 'v_tindakan_poli_kulit';
		} elseif ($tipe == 'poliumum') {
			$table = 'v_tindakan_poli_umum';
		} elseif ($tipe == 'polianak') {
			$table = 'v_tindakan_poli_anak';
		} elseif ($tipe == 'poligigi' || $tipe == 'poliorthodonti') {
			$table = 'v_tindakan_poli_gigi';
		} elseif ($tipe == 'polijantung') {
			$table = 'v_tindakan_poli_jantung';
		} elseif ($tipe == 'polibedah') {
			$table = 'v_tindakan_poli_bedah';
		} elseif ($tipe == 'polifisio' || $tipe == 'rekam medis' || $tipe == 'rawatinap' || $tipe == 'icu' || $tipe == 'rehab') {
			$table = 'v_tindakan_poli_fisio';
		} elseif ($tipe == 'poliakupuntur') {
			$table = 'v_tindakan_poli_akupuntur';
		} elseif ($tipe == 'polibedahmulut') {
			$table = 'v_tindakan_poli_bedah_mulut';
		} elseif ($tipe == 'polikesjiwa') {
			$table = 'v_tindakan_poli_kes_jiwa';
		} elseif ($tipe == 'poliorthopedi') {
			$table = 'v_tindakan_poli_orthopedi';
		} elseif ($tipe == 'poliparu') {
			$table = 'v_tindakan_poli_paru';
		} elseif ($tipe == 'polisaraf') {
			$table = 'v_tindakan_poli_saraf';
		} elseif ($tipe == 'poliurologi') {
			$table = 'v_tindakan_poli_urologi';
		} elseif ($tipe == 'polipenyakitmulut') {
			$table = 'v_tindakan_poli_penyakit_mulut';
		} elseif ($tipe == 'poliginjal') {
			$table = 'v_tindakan_poli_ginjal';
		} elseif ($tipe == 'polipsikolog') {
			$table = 'v_tindakan_poli_psikolog';
		} elseif ($tipe == 'poligizi') {
			$table = 'v_tindakan_poli_gizi';
		} elseif ($tipe == 'terapiwicara') {
			$table = 'v_tindakan_poli_terapi_wicara';
		} elseif ($tipe == 'polihemodialisa') {
			$table = 'v_tindakan_poli_hd';
		} elseif ($tipe == 'kemoterapi') {
			$table = 'v_tindakan_poli_kemo';
		} elseif ($tipe == 'polistifin') {
			$table = 'v_tindakan_poli_stifin';
		} elseif ($tipe == 'poliorthodonti') {
			$table = 'v_tindakan_orthodenti';
		} elseif ($tipe == 'konservasigigi') {
			$table = 'v_tindakan_konservasi_gigi';
		} elseif ($tipe == 'okupasi') {
			$table = 'v_tindakan_okupasi';
		} else {
			//dinamis
			if ($row = $this->db->get_where('list_poli', ['tipe_staff' => $tipe])->row()) {
				//table tindakan
				$table = "v_" . $row->tindakan;
			}
		}
		$id_pelayanan = $this->input->post('id_pelayanan');
		$list_tindakan = $this->M_Poli->selectDataTindakanByIdPel($id_pelayanan, $table);

		if ($list_tindakan == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data['data'] = $list_tindakan;
			echo json_encode($page_data);
			exit;
		}
	}

	public function tampil_list_radiologi() {
		$id_pelayanan = $this->input->post('id_pelayanan');
		$list_radiologi = $this->M_Poli->selectDataRadiologiById($id_pelayanan);

		if ($list_radiologi == null) {
			echo '{"data":""}';
			exit;
		} else {
			$data['data'] = $list_radiologi;
			echo json_encode($data);
			exit;
		}
	}


	public function tampil_list_labor()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $list_labor = $this->M_Poli->selectDataLaborByIdAndStatus1($id_pelayanan);
        if ($list_labor == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $list_labor;
            echo json_encode($data);
            exit;
        }
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
