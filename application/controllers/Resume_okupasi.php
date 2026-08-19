<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resume_okupasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Erm_poli');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Erm');
        $this->load->model('M_mcu');
    }


    public function form_perawat($tipe, $id_pelayanan)
    {
        $selectPasien = $this->M_mcu->getMCUById($id_pelayanan);


        $staff = $this->session->userdata('data_auth');
        // $page_data['pasien'] = $selectPasien;
        $page_data['nama'] = $selectPasien['nama_pasien'];
        $page_data['no_hp'] = $selectPasien['no_hp'];
        $page_data['alamat'] = $selectPasien['alamat'] . ', ' . $selectPasien['kelurahan'] . ', ' . $selectPasien['kecamatan'] . ', ' . $selectPasien['provinsi'];
        $page_data['tgl_lahir'] = $selectPasien['tgl_lahir'];
        $page_data['jenis_kelamin'] = $selectPasien['jenis_kelamin'];
        $page_data['cara_bayar'] = $selectPasien['perusahaan'];
        $page_data['tgl_masuk'] = $selectPasien['tanggal'];
        $page_data['staff'] = $staff->id_staff;
        $page_data['no_rm'] = $selectPasien['no_rm'];
        $page_data['jenis_pelayanan'] = 'MCU';
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_pelayanan;
        $page_data['agama'] = $selectPasien['agama'];
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();

        $page_data['url'] = base_url('Resume_okupasi/form_perawat/put/') . $id_pelayanan;

        $this->load->view('assets/_header');
        if ($tipe == 'post') {
            $page_data['page_content'] = 'erm_form/view_asses_rajal';
        } else {
            $page_data['page_content'] = 'erm_edit/view_asses_rajal';
        }
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function form_dokter($tipe, $id_pelayanan)
    {

        $selectPasien = $this->M_mcu->getMCUById($id_pelayanan);
        $staff = $this->session->userdata('data_auth');

        $page_data['nama'] = $selectPasien['nama_pasien'];
        $page_data['no_hp'] = $selectPasien['no_hp'];
        $page_data['alamat'] = $selectPasien['alamat'] . ', ' . $selectPasien['kelurahan'] . ', ' . $selectPasien['kecamatan'] . ', ' . $selectPasien['provinsi'];
        $page_data['tgl_lahir'] = $selectPasien['tgl_lahir'];
        $page_data['jenis_kelamin'] = $selectPasien['jenis_kelamin'];
        $page_data['cara_bayar'] = $selectPasien['perusahaan'];
        $page_data['tgl_masuk'] = $selectPasien['tanggal'];
        $page_data['staff'] = $staff->id_staff;
        $page_data['no_rm'] = $selectPasien['no_rm'];
        $page_data['jenis_pelayanan'] = 'MCU';
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_pelayanan;
        $page_data['agama'] = $selectPasien['agama'];
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();

        $page_data['gambar'] = base_url("assets/dist/img/orang1.png");
        $page_data['url'] = base_url('Data_mcu/form/') . $id_pelayanan;

        $this->load->view('assets/_header');
        if ($tipe == 'post') {
            $page_data['page_content'] = 'erm_form/view_ases_dokter';
        } else {
            $page_data['page_content'] = 'erm_edit/view_ases_dokter';
        }
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function resume($id_pelayanan)
    {

        $selectPasien = $this->M_mcu->getMCUById($id_pelayanan);
        $staff = $this->session->userdata('data_auth');

        // $page_data['pasien'] = $selectPasien;
        $page_data['nama'] = $selectPasien['nama_pasien'];
        $page_data['no_hp'] = $selectPasien['no_hp'];
        $page_data['alamat'] = $selectPasien['alamat'] . ', ' . $selectPasien['kelurahan'] . ', ' . $selectPasien['kecamatan'] . ', ' . $selectPasien['provinsi'];
        $page_data['tgl_lahir'] = $selectPasien['tgl_lahir'];
        $page_data['jenis_kelamin'] = $selectPasien['jenis_kelamin'];
        $page_data['cara_bayar'] = $selectPasien['perusahaan'];
        $page_data['tgl_masuk'] = $selectPasien['tanggal'];
        $page_data['tgl_keluar'] = ($selectPasien['tgl_keluar'] == null) ? '-' : $selectPasien['tgl_keluar'];
        $page_data['staff'] = $staff->id_staff;
        $page_data['no_rm'] = $selectPasien['no_rm'];
        $page_data['jenis_pelayanan'] = 'MCU';
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_pelayanan;
        $page_data['agama'] = $selectPasien['agama'];
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();

        $page_data['url'] = base_url('Resume_okupasi/print_resume_medis/') . $id_pelayanan;

        $asses_per_igd = $this->M_Erm_poli->checkData($id_pelayanan, 'form_assesmen_awal_rajal');
        // var_dump($asses_per_igd);
        $page_data['per'] = empty($asses_per_igd) ? null : $asses_per_igd;
        $asses_dokter_igd = $this->M_Erm_poli->checkData($id_pelayanan, 'form_assesmen_dokter');
        $page_data['dok'] = empty($asses_dokter_igd) ? null : $asses_dokter_igd;

        $diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_pelayanan='$id_pelayanan'")->row_array();

        $page_data['diagnosa_utama'] = ($asses_dokter_igd == null) ? "" : $diagnosa1;

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/view_rasume_medis_raj';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function print_resume_medis($id)
	{
        $this->load->library('qrgenerator');

		$data['data'] = $this->M_mcu->cetakResumeMed($id);
        $data['data']['dpjp'] = 'dr. PRIO HANGUDI SAMPURNO, MKK, SpOK';
        $data['ttd'] = $this->qrgenerator->generate($data['data']['dpjp'], 100, 5);
		$data['terapi'] = $this->M_Erm->selectTerapiByIdPel($id);
		$this->load->view('erm_print/resume_medis_raj', $data);
	}
}
