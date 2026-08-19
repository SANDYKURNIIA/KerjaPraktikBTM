<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_pemantauan_pasien_icu extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Rawatinap');
        $this->load->model('M_Erm_ranap');

	}

    public function form($id_pelayanan, $id_history)
	{
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');

		$page_data['nama'] = $selectPasien->nama;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['nama_dokter'] = $selectPasien->nama_dokter;
		$page_data['agama'] = $selectPasien->agama;
        $labels = ["Jan", "Feb", "Mar", "Apr", "May"];
        $pendapatan = [100, 150, 180, 200, 250];
        $pengeluaran = [80, 120, 160, 170, 210];

        $page_data['labels'] = json_encode($labels);
        $page_data['pendapatan'] = json_encode($pendapatan);
        $page_data['pengeluaran'] = json_encode($pengeluaran);

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/Ranap/view_catatan_pemantauan_pasien_icu';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
    }

    public function insert_data(){
        $data = [
            'id_pelayanan'     => $this->input->post('id_pelayanan'),
            'id_history'       => $this->input->post('id_history'),
            'id_staff'         => $this->session->userdata('data_auth')->id_staff,

            'sistolik'         => $this->input->post('sistolik'),
            'wakur_sistolik'   => $this->input->post('waktu_sistolik'),

            'diastolik'        => $this->input->post('diastolik'),
            'wakur_diastolik'  => $this->input->post('waktu_diastolik'),

            'nadi'             => $this->input->post('nadi'),
            'wakur_nadi'       => $this->input->post('waktu_nadi'),

            'suhu'             => $this->input->post('suhu'),
            'wakur_suhu'       => $this->input->post('waktu_suhu'),

            'rr'               => $this->input->post('rr'),
            'wakur_rr'         => $this->input->post('waktu_rr'),
        ];
        // Simpan ke database

        $insert = $this->M_Rawatinap->insert_pemantauanTd($data);

        if($insert){
            $out['status'] = "success";
        }else {
            $out['status'] = "gagal";
            $out['Error message : '] = $insert;
        }
        echo json_encode($out);
    }

	public function update_data(){
		$id      = $this->input->post('id');

        $data = [
            'id_pelayanan'     => $this->input->post('id_pelayanan'),
            'id_history'       => $this->input->post('id_history'),
            'id_staff'         => $this->session->userdata('data_auth')->id_staff,

            'sistolik'         => $this->input->post('sistolik'),
            'wakur_sistolik'   => $this->input->post('waktu_sistolik'),

            'diastolik'        => $this->input->post('diastolik'),
            'wakur_diastolik'  => $this->input->post('waktu_diastolik'),

            'nadi'             => $this->input->post('nadi'),
            'wakur_nadi'       => $this->input->post('waktu_nadi'),

            'suhu'             => $this->input->post('suhu'),
            'wakur_suhu'       => $this->input->post('waktu_suhu'),

            'rr'               => $this->input->post('rr'),
            'wakur_rr'         => $this->input->post('waktu_rr'),
        ];
        // Simpan ke database

        $insert = $this->M_Rawatinap->update_pemantauanTd($id, $data);

        if($insert){
            $out['status'] = "success";
        }else {
            $out['status'] = "gagal";
            $out['Error message : '] = $insert;
        }
        echo json_encode($out);
    }

    public function tampil_list_pemantauan_TD()
	{
		$id_pelayanan = $this->input->post('id_pelayanan');
		$id_history = $this->input->post('id_history');
		$tgl_data = $this->input->post('tgl_data');
		$page_data = $this->M_Rawatinap->get_pemantauanTd_by_hisNPelNTgl($id_history,$id_pelayanan , $tgl_data);

		$out = null;
		for ($i = 0; $i < count($page_data); $i++) {
			$no = $i + 1;
			$id = $page_data[$i]->id_catatan_tekanan_darah;
			// $tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_catatan . "\")'><i class='icon-rocket'></i></button>";
			// $lanjut = "<button class='btn btn-warning btn-icon-anim btn square' id='myButton' onclick='next(\"" . $page_data[$i]->id_catatan . "\")'><i class='icon-rocket'></i></button>";
			// $hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $page_data[$i]->id_catatan . "\")'><i class='icon-trash'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus($id)'><i class='icon-trash'></i></button>";
			$edit = "<button class='btn btn-warning btn-icon-anim btn square' id='myButton' onclick='get_data_by_id($id)'><i class='icon-rocket'></i></button>";
            $sistolik = $page_data[$i]->sistolik;
            $wakur_sistolik = $page_data[$i]->wakur_sistolik;
			$diastolik = $page_data[$i]->diastolik;
			$wakur_diastolik = $page_data[$i]->wakur_diastolik;
			$nadi = $page_data[$i]->nadi;
			$wakur_nadi = $page_data[$i]->wakur_nadi;
			$suhu = $page_data[$i]->suhu;
			$wakur_suhu = $page_data[$i]->wakur_suhu;
			$rr = $page_data[$i]->rr;
			$wakur_rr = $page_data[$i]->wakur_rr;
			$waktu_input = date('Y-m-d', strtotime($page_data[$i]->tgl_input));

		

			$out[$i] = array($no, $edit , $hapus , $sistolik , $wakur_sistolik , $diastolik,  $wakur_diastolik , $nadi,  $wakur_nadi , $suhu, $wakur_suhu , $rr, $wakur_rr, $waktu_input);
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

	public function get_data_by_id()
	{
		$id = $this->input->post('id');
		$data = $this->M_Rawatinap->get_pemantauanTd_by_id($id);

		$out = $data;

		if ($out == null) {
			echo '{"data":""}';
			exit;
		} else {
			$page_data['data'] = $out;
			$page_data['status'] = 'success';
			echo json_encode($page_data);
			exit;
		}
	}

	public function hapus_data()
    {
     
		$id = $this->input->post('id');

        $hapus = $this->M_Rawatinap->hapus_pematauanTd($id);
    

        if($hapus){
            $out['status'] = "success";
        }else {
            $out['status'] = "gagal";
            $out['Error message : '] = $hapus;
        }
        echo json_encode($out);
    }

    public function tampil_list_grafik()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');

        $dateGrafik = date('Y-m-d');

        if ($this->input->post('tanggal_grafik')) {
            $dateGrafik = $this->input->post('tanggal_grafik');
        }

        $result = $this->M_Rawatinap->get_pemantauanTd_Today($id_history, $id_pelayanan, $dateGrafik);

        if (!$result) {
            $output['status'] = 'gagal';
            echo json_encode($output);
            return;
        }

        // 🕐 Ambil semua waktu observasi (tanpa pembulatan)
        $labels = [];

        foreach ($result as $row) {
            if (!empty($row['wakur_sistolik'])) {
                // Ambil format jam:menit tanpa detik
                $time = date('H:i', strtotime($row['wakur_sistolik']));

                if (!in_array($time, $labels)) {
                    $labels[] = $time;
                }
            }
        }

        // Urutkan label berdasarkan waktu
        sort($labels);

        // Siapkan array kosong untuk data
        $dataSistolik = array_fill(0, count($labels), null);
        $dataDiastolik = array_fill(0, count($labels), null);
        $dataNadi = array_fill(0, count($labels), null);
        $dataRR = array_fill(0, count($labels), null);
        $dataSuhu = array_fill(0, count($labels), null);

        // Isi nilai berdasarkan waktu yang persis
        foreach ($result as $row) {
            $time = date('H:i', strtotime($row['wakur_sistolik']));

            $index = array_search($time, $labels);
            if ($index !== false) {
                $dataSistolik[$index] = (int)$row['sistolik'];
                $dataDiastolik[$index] = (int)$row['diastolik'];
                $dataNadi[$index] = (int)$row['nadi'];
                $dataRR[$index] = (int)$row['rr'];
                $dataSuhu[$index] = (float)$row['suhu'];
            }
        }

        // Kirim ke view / Chart.js
        $output = [
            'status' => 'success',
            'labels' => $labels,
            'sistolik' => $dataSistolik,
            'diastolik' => $dataDiastolik,
            'nadi' => $dataNadi,
            'rr' => $dataRR,
            'suhu' => $dataSuhu,
            'tgl_data' => $dateGrafik
        ];

        echo json_encode($output);
    }


}