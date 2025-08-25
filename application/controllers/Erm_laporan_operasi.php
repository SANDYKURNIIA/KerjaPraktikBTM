<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_laporan_operasi extends CI_Controller
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
        $this->load->model('M_laporan_operasi_model');
        $this->load->model('M_Rawatinap');
    }

    public function insert($data)
    {

        $this->load->model('M_laporan_operasi_model');
        // Fungsi ini digunakan untuk menyimpan data ke tabel laporan_operasi
        $this->db->insert('laporan_operasi', $data);
        $this->load->view('erm_form/Ranap/view_laporan_operasi');
        return $this->db->insert_id();
    }


    public function simpan()
	{
		$staff = $this->session->userdata('data_auth');
		$id = $this->input->post('id_pelayanan');
		$db = $this->db->query("SELECT count(*) count from laporan_operasi where id_pelayanan ='$id'")->row();
		if ($db->count == 0) {
			$db = [
                // 'Ruang' => $this->input->post('Ruang'),
                'no_rm' => $this->input->post('no_rm'),
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                // 'kelas' => $this->input->post('kelas'),
                // 'nama_pasien' => $this->input->post('nama_pasien'),
                // 'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                // 'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'nama_ahli_bedah' => $this->input->post('nama_ahli_bedah'),
                'nama_perawat_instrumen' => $this->input->post('nama_perawat_instrumen'),
                'nama_asisten1' => $this->input->post('nama_asisten1'),
                'nama_asisten2' => $this->input->post('nama_asisten2'),
                'diagnosa_pra_operasi' => $this->input->post('diagnosa_pra_operasi'),
                'tindakan_operasi' => $this->input->post('tindakan_operasi'),
                'diagnosa_post_operasi' => $this->input->post('diagnosa_post_operasi'),
                'indikasi_operasi' => $this->input->post('indikasi_operasi'),
                'jenis_operasi' => $this->input->post('jenis_operasi'),
                'tanggal_operasi' => $this->input->post('tanggal_operasi'),
                'operasi_dimulai' => $this->input->post('operasi_dimulai'),
                'operasi_selesai' => $this->input->post('operasi_selesai'),
                'jaringan_eksisi' => $this->input->post('jaringan_eksisi'),
                'bahan_dikirim_laboratorium' => $this->input->post('bahan_dikirim_laboratorium'),
                'pemeriksaan_pathologie' => $this->input->post('pemeriksaan_pathologie'),
                'untuk_pemeriksaan' => $this->input->post('untuk_pemeriksaan'),
                'antiseptik' => $this->input->post('antiseptik'),
                'jumlah_pendarahan' => $this->input->post('jumlah_pendarahan'),
                'jumlah_transfusi' => $this->input->post('jumlah_transfusi'),
                'penyulit_operasi' => $this->input->post('penyulit_operasi'),
                'komplikasi_operasi' => $this->input->post('komplikasi_operasi'),
                'nomor_pendaftaran' => $this->input->post('nomor_pendaftaran'),
                'staff' => $staff->id_staff,
            ];
			$this->M_laporan_operasi_model->update_data_pasien($db, 'laporan_operasi');
		} else {
			$db = [
                // 'Ruang' => $this->input->post('Ruang'),
                // 'no_rm' => $this->input->post('no_rm'),
                // 'id_pelayanan' => $this->input->post('id_pelayanan'),
                // 'id_history' => $this->input->post('id_history'),
                // 'kelas' => $this->input->post('kelas'),
                // 'nama_pasien' => $this->input->post('nama_pasien'),
                // 'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                // 'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'nama_ahli_bedah' => $this->input->post('nama_ahli_bedah'),
                'nama_perawat_instrumen' => $this->input->post('nama_perawat_instrumen'),
                'nama_asisten1' => $this->input->post('nama_asisten1'),
                'nama_asisten2' => $this->input->post('nama_asisten2'),
                'diagnosa_pra_operasi' => $this->input->post('diagnosa_pra_operasi'),
                'tindakan_operasi' => $this->input->post('tindakan_operasi'),
                'diagnosa_post_operasi' => $this->input->post('diagnosa_post_operasi'),
                'indikasi_operasi' => $this->input->post('indikasi_operasi'),
                'jenis_operasi' => $this->input->post('jenis_operasi'),
                'tanggal_operasi' => $this->input->post('tanggal_operasi'),
                'operasi_dimulai' => $this->input->post('operasi_dimulai'),
                'operasi_selesai' => $this->input->post('operasi_selesai'),
                'jaringan_eksisi' => $this->input->post('jaringan_eksisi'),
                'bahan_dikirim_laboratorium' => $this->input->post('bahan_dikirim_laboratorium'),
                'pemeriksaan_pathologie' => $this->input->post('pemeriksaan_pathologie'),
                'untuk_pemeriksaan' => $this->input->post('untuk_pemeriksaan'),
                'antiseptik' => $this->input->post('antiseptik'),
                'jumlah_pendarahan' => $this->input->post('jumlah_pendarahan'),
                'jumlah_transfusi' => $this->input->post('jumlah_transfusi'),
                'penyulit_operasi' => $this->input->post('penyulit_operasi'),
                'komplikasi_operasi' => $this->input->post('komplikasi_operasi'),
                'nomor_pendaftaran' => $this->input->post('nomor_pendaftaran'),
                'staff' => $staff->id_staff,
            ];
			$where = array('id_pelayanan' => $this->input->post('id_pelayanan'));
			$this->M_laporan_operasi_model->update($db, $where, 'form_laporan');
		}
		$out['status'] = "success";
		echo json_encode($out);
	}
      


    public function print_out($id_pelayanan, $id_history)
	{
		// $data['data'] = $this->M_laporan_operasi_model->getData($id_pelayanan);
        $data['data'] = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $data['laporan_operasi'] = $this->db->get_where("laporan_operasi", ["id_pelayanan" => $id_pelayanan])->row();
        // $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		 // $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$this->load->view('erm_form/Ranap/view_laporan_operasi_print', $data);
        
	}

    public function store()
    {
        $this->load->model('M_laporan_operasi_model');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $existing_data = $this->M_laporan_operasi_model->CekId($id_pelayanan);
		$staff = $this->session->userdata('data_auth');
        // Menangani pengiriman data dari form ke database
        {
            $data = array(
                // 'Ruang' => $this->input->post('Ruang'),
                'no_rm' => $this->input->post('no_rm'),
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                // 'kelas' => $this->input->post('kelas'),
                // 'nama_pasien' => $this->input->post('nama_pasien'),
                // 'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                // 'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'nama_ahli_bedah' => $this->input->post('nama_ahli_bedah'),
                'nama_perawat_instrumen' => $this->input->post('nama_perawat_instrumen'),
                'nama_asisten1' => $this->input->post('nama_asisten1'),
                'nama_asisten2' => $this->input->post('nama_asisten2'),
                'diagnosa_pra_operasi' => $this->input->post('diagnosa_pra_operasi'),
                'tindakan_operasi' => $this->input->post('tindakan_operasi'),
                'diagnosa_post_operasi' => $this->input->post('diagnosa_post_operasi'),
                'indikasi_operasi' => $this->input->post('indikasi_operasi'),
                'jenis_operasi' => $this->input->post('jenis_operasi'),
                'tanggal_operasi' => $this->input->post('tanggal_operasi'),
                'operasi_dimulai' => $this->input->post('operasi_dimulai'),
                'operasi_selesai' => $this->input->post('operasi_selesai'),
                'jaringan_eksisi' => $this->input->post('jaringan_eksisi'),
                'bahan_dikirim_laboratorium' => $this->input->post('bahan_dikirim_laboratorium'),
                'pemeriksaan_pathologie' => $this->input->post('pemeriksaan_pathologie'),
                'untuk_pemeriksaan' => $this->input->post('untuk_pemeriksaan'),
                'antiseptik' => $this->input->post('antiseptik'),
                'jumlah_pendarahan' => $this->input->post('jumlah_pendarahan'),
                'jumlah_transfusi' => $this->input->post('jumlah_transfusi'),
                'penyulit_operasi' => $this->input->post('penyulit_operasi'),
                'komplikasi_operasi' => $this->input->post('komplikasi_operasi'),
                'nomor_pendaftaran' => $this->input->post('nomor_pendaftaran'),
                'laporan_operasi' => $this->input->post('laporan_operasi'),
                'staff' => $staff->id_staff,
            );   
            // var_dump($data);
            // die;
            // log_message('debug', 'Data yang diterima: ' . print_r($data, true)); 

            if ($existing_data) {
                // Data sudah ada, gunakan perintah update
                $this->M_laporan_operasi_model->update_data_pasien($id_pelayanan, $data);
            } else {
                // Data belum ada, gunakan perintah insert
                $this->M_laporan_operasi_model->insert_data_pasien($data);
            }
        }
        $out['status'] = "success";

        echo json_encode($out);
    }

    
    public function formlaporanoperasi($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $staff = $this->session->userdata('data_auth');
        $page_data['staff'] = $staff->id_staff;
        $page_data['nama'] = $selectPasien->nama;
        $ruangObj = $this->M_Erm_ranap->getRuangByRiwayatKamar($id_pelayanan); // Mengambil objek ruangan
        $page_data['nama_ruangan'] = $ruangObj->nama_ruangan; // Ambil properti nama_ruangan dari objek
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['kelas'] = $selectPasien->kelas;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_history;
        $page_data['dokter'] = $this->M_Rawatinap->selectNamaDPJP();
        $page_data['staff'] = $this->M_Rawatinap->selectNamaStaff();
        
        $this->load->view('assets/_header');
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['page_content'] = 'erm_form/Ranap/view_laporan_operasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function formlaporanoperasi_riwayat($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $staff = $this->session->userdata('data_auth');
        $page_data['staff'] = $staff->id_staff;
        $page_data['nama'] = $selectPasien->nama;
        $ruangObj = $this->M_Erm_ranap->getRuangByRiwayatKamar($id_pelayanan); // Mengambil objek ruangan
        $page_data['nama_ruangan'] = $ruangObj->nama_ruangan; // Ambil properti nama_ruangan dari objek
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['kelas'] = $selectPasien->kelas;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_history;

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap/view_laporan_operasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function formopedit($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $staff = $this->session->userdata('data_auth');
        $page_data['staff'] = $staff->id_staff;

        $page_data['laporan_operasi'] = $this->db->get_where("laporan_operasi", ["id_pelayanan" => $id_pelayanan])->row_array();
        $page_data['nama'] = $selectPasien->nama;
        $ruangObj = $this->M_Erm_ranap->getRuangByRiwayatKamar($id_pelayanan); // Mengambil objek ruangan
        $page_data['nama_ruangan'] = $ruangObj->nama_ruangan; // Ambil properti nama_ruangan dari objek
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['kelas'] = $selectPasien->kelas;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_history;

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap_Edit/view_laporan_operasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function riwayat_laporanoperasi($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $staff = $this->session->userdata('data_auth');
        $page_data['staff'] = $staff->id_staff;

        $page_data['nama'] = $selectPasien->nama;
        $ruangObj = $this->M_Erm_ranap->getRuangByRiwayatKamar($id_pelayanan); // Mengambil objek ruangan
        $page_data['nama_ruangan'] = $ruangObj->nama_ruangan; // Ambil properti nama_ruangan dari objek
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['kelas'] = $selectPasien->kelas;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_history;

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap_edit/view_laporan_operasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function get_ass_per()
    {
        $id = $this->input->post('id');
        $db = $this->db->get_where('resume_bayi', ['id_history' => $id])->row_array();
        if ($db == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data = $db;
            echo json_encode($page_data);
            exit;
        }
    }
    public function tampil_list_diagnosa_ranap()
    {
        // $id_akun = 'dgok8itaesm';
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Erm->selectDataDiagnosaByIdPel($id_pelayanan);

        // $page_data = null;
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            // $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa1(\"" . $page_data[$i]->no_diagnosa . "\")' '><i class='fa fa-trash '></i></button>";


            $nama_dokter = $page_data[$i]->no_diagnosa;
            $kode = $page_data[$i]->kode;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;
            $tombol = $tombol;

            $out[$i] = array($nama_dokter, $kode, $nama_diagnosa, $tombol);
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
    public function tampil_list_diagnosa1()
    {
        // $id_akun = 'dgok8itaesm';
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->db->query("SELECT * from diagnosa_utama where id_history='$id_pelayanan'")->result();

        // $page_data = null;
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            // $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\""  . $page_data[$i]->no_diagnosa . "\")' '><i class='fa fa-trash '></i></button>";


            $nama_dokter = $page_data[$i]->no_diagnosa;
            $kode = $page_data[$i]->kode;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;
            $tombol = $tombol;

            $out[$i] = array($nama_dokter, $kode, $nama_diagnosa, $tombol);
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
    public function update_bayi()
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
        $img1 = $this->input->post('ttd1');
        $img1 = str_replace('data:image/png;base64,', '', $img1);
        $img1 = str_replace(' ', '+', $img1);
        $data1 = base64_decode($img1);
        $file1 = "assets/images/" . uniqid(time(), true) . ".png";
        $success1 = file_put_contents($file1, $data1);
        $this->form_validation->set_rules('catatan', 'Catatan', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');
        $this->form_validation->set_rules('sectio', 'Sectio', 'required');
        $this->form_validation->set_rules('pervagina', 'Pervagina', 'required');
        $this->form_validation->set_rules('jenis_persalinan', 'Jenis Persalinan', 'required');
        $this->form_validation->set_rules('rawat_gabung', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        if ($this->form_validation->run()) {
            $data = array(
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                'no_rm' => $this->input->post('no_rm'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'no_rm' => $this->input->post('no_rm'),
                'pervagina' => $this->input->post('pervagina'),
                'caesaria' => $this->input->post('sectio'),
                'jenis_persalinan' => $this->input->post('jenis_persalinan'),
                'waktu_mulai' => $this->input->post('rawat_gabung'),
                'alasan' => $this->input->post('alasan'),
                'catatan' => $this->input->post('catatan'),
                'ttd' => $file,
                'ttd1' => $file1,
                'tanggal' => $tgl,
                'staff' => $staff,
            );

            $this->M_Erm_ranap->update_bayi($id, $data);
            $out['status'] = "success";
        } else {
            $out = array(
                'error'   => true,
                'nama_ibu' => form_error('nama_ibu'),
                'waktu_mulai' => form_error('waktu_mulai'),
                'jenis_persalinan' => form_error('jenis_persalinan'),
                'sectio' => form_error('sectio'),
                'rawat_gabung' => form_error('rawat_gabung'),
                'alasan' => form_error('alasan'),
                'pervagina' => form_error('pervagina'),
                'catatan' => form_error('catatan'),
            );
        }
        echo json_encode($out);
    }
}


