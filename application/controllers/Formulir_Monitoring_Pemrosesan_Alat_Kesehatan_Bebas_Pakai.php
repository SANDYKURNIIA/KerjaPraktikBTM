<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Assembling');
        $this->load->model('M_Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_form/Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function get_all_data(){   
        $data = $this->M_Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai->getAll();
        $out = null;

        for($i=0;$i<count($data);$i++){
            $no = $i+1;
            $tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='pilih(\"" . $data[$i]->id_MONITORING_PEMROSESAN_ALAT_KESEHATAN . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus(\"" . $data[$i]->id_MONITORING_PEMROSESAN_ALAT_KESEHATAN . "\")' '><i class='icon-trash'></i></button>";
            $nmstaff = $data[$i]->nama_staff;
            $tanggal = $data[$i]->Tanggal;
            $unit = $data[$i]->unit;
            $petugas = $data[$i]->Petugas_Pakai_Alat_Pelindung_Diri;
            $perendaman = $data[$i]->Perendaman_alat_sampai_seluruh_permukaan_alat;
            $perendaman2 = $data[$i]->perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit;
            $peralatan = $data[$i]->Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam;
            $dtt = $data[$i]->Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan;
            $penyimpanan = $data[$i]->Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan;
            $alatSteril = $data[$i]->Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak;
            $ttd = $data[$i]->Signature;

            $out[$i] = array($no,$tombol,$hapus,$nmstaff,$tanggal,$unit,$petugas,$perendaman,$perendaman2,$peralatan,$dtt,$penyimpanan,$alatSteril,$ttd);
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

    public function delete(){
        $id = $this->input->post('id');
        if($this->__imagesPath($id) != null){
			unlink($this->__imagesPath($id));
		}
        $this->M_Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai->delete(array('id_MONITORING_PEMROSESAN_ALAT_KESEHATAN' => $id));
    }

    private function __imagesPath($id){
		$sql = $this->db->get_where('formulir_monitoring_pemrosesan_alat_kesehatan_bebas_pakai',['id_MONITORING_PEMROSESAN_ALAT_KESEHATAN' => $id])->row();
		return $sql->Signature;
	}
    /*
    public function laporan() 
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Laporan_mutu_keselamatan_kerja/Laporan_Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai';
        $page_data['data'] = $this->M_Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai->getAll();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }*/

    public function getData(){
        $id = $this->input->post('id');
        $data = $this->M_Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai->getData($id);
        $out = null;
        if($data->num_rows =! 1){
            $out = 0;
        }else{
            $out = $data->row_array();
        }
        echo json_encode($out);
    }



    public function insert()
    {
        $data_staff = $this->session->userdata('data_auth');

        $ttd = $this->input->post('ttd');
        $ttdFile = str_replace('data:image/png;base64,','',$ttd);
        $ttdFile1 = str_replace(' ','+',$ttdFile);
        $data = base64_decode($ttdFile1);
        $file = "assets/images/" . uniqid(time(),true) . ".png";
        $success = file_put_contents($file,$data);

        $data = array(
            'id_staff'=>$data_staff->id_staff,
            'nama_staff'=>$data_staff->nama,
            'tgl_input'=>date("Y-m-d H:i:s"),
            'Tanggal' =>$this->input->post('tglForm'),
            'unit' => $this->input->post('unit'),
            'Petugas_Pakai_Alat_Pelindung_Diri' =>$this->input->post('Petugas_Pakai_Alat_Pelindung_Diri'),
            'Perendaman_alat_sampai_seluruh_permukaan_alat' =>$this->input->post('Perendaman_alat_sampai_seluruh_permukaan_alat'),
            'perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit' =>$this->input->post('perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit'),
            'Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam' =>$this->input->post('Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam'),
            'Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan' =>$this->input->post('Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan'),
            'Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan' =>$this->input->post('Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan'),
            'Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak' =>$this->input->post('Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak'),
            'Signature' =>$file
        );
        $this->db->insert('formulir_monitoring_pemrosesan_alat_kesehatan_bebas_pakai', $data);
    }

    public function update(){
        $data_staff = $this->session->userdata('data_auth');
        $where = base64_decode($this->input->post('idP'));
        if($this->__imagesPath($where) != null){
			unlink($this->__imagesPath($where));
		}
        $ttd = $this->input->post('ttd');
        $ttdFile = str_replace('data:image/png;base64,','',$ttd);
        $ttdFile1 = str_replace(' ','+',$ttdFile);
        $data = base64_decode($ttdFile1);
        $file = "assets/images/" . uniqid(time(),true) . ".png";
        $success = file_put_contents($file,$data);

        $data = array(
            'id_staff'=>$data_staff->id_staff,
            'nama_staff'=>$data_staff->nama,
            'tgl_input'=>date("Y-m-d H:i:s"),
            'Tanggal' =>$this->input->post('tglForm'),
            'unit' => $this->input->post('unit'),
            'Petugas_Pakai_Alat_Pelindung_Diri' =>$this->input->post('Petugas_Pakai_Alat_Pelindung_Diri'),
            'Perendaman_alat_sampai_seluruh_permukaan_alat' =>$this->input->post('Perendaman_alat_sampai_seluruh_permukaan_alat'),
            'perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit' =>$this->input->post('perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit'),
            'Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam' =>$this->input->post('Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam'),
            'Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan' =>$this->input->post('Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan'),
            'Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan' =>$this->input->post('Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan'),
            'Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak' =>$this->input->post('Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak'),
            'Signature' =>$file
        );
        $this->M_Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai->update(array('id_MONITORING_PEMROSESAN_ALAT_KESEHATAN' => $where),$data);
    }
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Assembling');
        $this->load->model('M_Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_form/Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function get_all_data(){   
        $data = $this->M_Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai->getAll();
        $out = null;

        for($i=0;$i<count($data);$i++){
            $no = $i+1;
            $tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='pilih(\"" . $data[$i]->id_MONITORING_PEMROSESAN_ALAT_KESEHATAN . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus(\"" . $data[$i]->id_MONITORING_PEMROSESAN_ALAT_KESEHATAN . "\")' '><i class='icon-trash'></i></button>";
            $nmstaff = $data[$i]->nama_staff;
            $tanggal = $data[$i]->Tanggal;
            $unit = $data[$i]->unit;
            $petugas = $data[$i]->Petugas_Pakai_Alat_Pelindung_Diri;
            $perendaman = $data[$i]->Perendaman_alat_sampai_seluruh_permukaan_alat;
            $perendaman2 = $data[$i]->perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit;
            $peralatan = $data[$i]->Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam;
            $dtt = $data[$i]->Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan;
            $penyimpanan = $data[$i]->Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan;
            $alatSteril = $data[$i]->Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak;
            $ttd = $data[$i]->Signature;

            $out[$i] = array($no,$tombol,$hapus,$nmstaff,$tanggal,$unit,$petugas,$perendaman,$perendaman2,$peralatan,$dtt,$penyimpanan,$alatSteril,$ttd);
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

    public function delete(){
        $id = $this->input->post('id');
        if($this->__imagesPath($id) != null){
			unlink($this->__imagesPath($id));
		}
        $this->M_Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai->delete(array('id_MONITORING_PEMROSESAN_ALAT_KESEHATAN' => $id));
    }

    private function __imagesPath($id){
		$sql = $this->db->get_where('formulir_monitoring_pemrosesan_alat_kesehatan_bebas_pakai',['id_MONITORING_PEMROSESAN_ALAT_KESEHATAN' => $id])->row();
		return $sql->Signature;
	}
    /*
    public function laporan() 
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Laporan_mutu_keselamatan_kerja/Laporan_Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai';
        $page_data['data'] = $this->M_Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai->getAll();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }*/

    public function getData(){
        $id = $this->input->post('id');
        $data = $this->M_Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai->getData($id);
        $out = null;
        if($data->num_rows =! 1){
            $out = 0;
        }else{
            $out = $data->row_array();
        }
        echo json_encode($out);
    }



    public function insert()
    {
        $data_staff = $this->session->userdata('data_auth');

        $ttd = $this->input->post('ttd');
        $ttdFile = str_replace('data:image/png;base64,','',$ttd);
        $ttdFile1 = str_replace(' ','+',$ttdFile);
        $data = base64_decode($ttdFile1);
        $file = "assets/images/" . uniqid(time(),true) . ".png";
        $success = file_put_contents($file,$data);

        $data = array(
            'id_staff'=>$data_staff->id_staff,
            'nama_staff'=>$data_staff->nama,
            'tgl_input'=>date("Y-m-d H:i:s"),
            'Tanggal' =>$this->input->post('tglForm'),
            'unit' => $this->input->post('unit'),
            'Petugas_Pakai_Alat_Pelindung_Diri' =>$this->input->post('Petugas_Pakai_Alat_Pelindung_Diri'),
            'Perendaman_alat_sampai_seluruh_permukaan_alat' =>$this->input->post('Perendaman_alat_sampai_seluruh_permukaan_alat'),
            'perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit' =>$this->input->post('perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit'),
            'Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam' =>$this->input->post('Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam'),
            'Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan' =>$this->input->post('Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan'),
            'Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan' =>$this->input->post('Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan'),
            'Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak' =>$this->input->post('Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak'),
            'Signature' =>$file
        );
        $this->db->insert('formulir_monitoring_pemrosesan_alat_kesehatan_bebas_pakai', $data);
    }

    public function update(){
        $data_staff = $this->session->userdata('data_auth');
        $where = base64_decode($this->input->post('idP'));
        if($this->__imagesPath($where) != null){
			unlink($this->__imagesPath($where));
		}
        $ttd = $this->input->post('ttd');
        $ttdFile = str_replace('data:image/png;base64,','',$ttd);
        $ttdFile1 = str_replace(' ','+',$ttdFile);
        $data = base64_decode($ttdFile1);
        $file = "assets/images/" . uniqid(time(),true) . ".png";
        $success = file_put_contents($file,$data);

        $data = array(
            'id_staff'=>$data_staff->id_staff,
            'nama_staff'=>$data_staff->nama,
            'tgl_input'=>date("Y-m-d H:i:s"),
            'Tanggal' =>$this->input->post('tglForm'),
            'unit' => $this->input->post('unit'),
            'Petugas_Pakai_Alat_Pelindung_Diri' =>$this->input->post('Petugas_Pakai_Alat_Pelindung_Diri'),
            'Perendaman_alat_sampai_seluruh_permukaan_alat' =>$this->input->post('Perendaman_alat_sampai_seluruh_permukaan_alat'),
            'perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit' =>$this->input->post('perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit'),
            'Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam' =>$this->input->post('Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam'),
            'Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan' =>$this->input->post('Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan'),
            'Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan' =>$this->input->post('Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan'),
            'Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak' =>$this->input->post('Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak'),
            'Signature' =>$file
        );
        $this->M_Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai->update(array('id_MONITORING_PEMROSESAN_ALAT_KESEHATAN' => $where),$data);
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
}