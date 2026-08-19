<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Radiologi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->library('upload');
        $this->load->model('M_Radiologi');
    }

    // Rajal
    public function Rajal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_rajal';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_datarajal()
    {
        $page_data = $this->M_Radiologi->selectDataPasienRawatJalan();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->poli . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $keterangan = $page_data[$i]->keterangan;
            $no_sep = $page_data[$i]->no_sep;
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }

    public function print_radiologi()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_tindakan_radiologi = $this->input->post('tindakan');
        $nama_pasien = $this->input->post('a');
        $tgl_lahir = $this->input->post('b');
        $no_rm = $this->input->post('c');
        $cara_bayar = $this->input->post('d');
        $ruang = $this->input->post('e');
        $data = $this->M_Radiologi->getRadiologiById($id_pelayanan, $id_tindakan_radiologi);
        $i = 0;
        if (count($data) > 0) {
            $data = array(

                'nama' =>    $data[$i]->nama,
                'keterangan' =>    $data[$i]->keterangan,
                'tanggal' =>    $data[$i]->tanggal,


            );
        }
        echo json_encode($data);
    }


    public function getdata_radiologiAnak()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataAnakby_id($id_pelayanan, $id_history);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    public function getdata_radiologiBedah()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataBedahby_id($id_pelayanan, $id_history);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    public function getdata_radiologiFisio()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataFisioby_id($id_pelayanan, $id_history);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    public function getdata_radiologiGigi()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataGigiby_id($id_pelayanan, $id_history);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    public function getdata_radiologiIntern()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataInternby_id($id_pelayanan, $id_history);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    public function getdata_radiologiJantung()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataJantungby_id($id_pelayanan, $id_history);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    public function getdata_radiologiKulit()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataKulitby_id($id_pelayanan, $id_history);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    public function getdata_radiologiMata()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataMataby_id($id_pelayanan, $id_history);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    public function getdata_radiologiObg()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataObgby_id($id_pelayanan, $id_history);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    public function getdata_radiologiUmum()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataUmumby_id($id_pelayanan, $id_history);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    public function getdata_radiologiALL()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataRadiologiALLbyid($id_pelayanan, $id_history);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    public function getdata_formById()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_tindakan = $this->input->post('tindakan');

        $db = $this->M_Radiologi->selectDataFormById($id_pelayanan, $id_tindakan);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }


    public function insert_radiologi()
    {
        $id_pel_rad = $this->input->post('id_pel_rad');
        $id_tindakan_radiologi = $this->input->post('id');
        $harga = $this->input->post('harga');
        $id_list_tindakan = $this->input->post('id_list_tindakan');
        $frek = $this->input->post('frek');
        $total = $this->input->post('total');
        $tgl = date("Y-m-d H:i:s");

        $data = array(
            'id_tindakan_radiologi' => $id_tindakan_radiologi,
            'harga' => $harga,
            'frek' => $frek,
            'id_pelayanan' => $id_pel_rad,
            'id_tindakan' => $id_list_tindakan,
            'total' => $total,
            'tanggal' => $tgl,
        );
        $this->M_Poli_tht->insert_radiologi($data, 'tindakan_radiologi');
        $out['status'] = "success";
        echo json_encode($out);
    }

    //    Tampilin data list radiologi

    public function tampil_rajal_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->selectRadiologiById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 1) {
                $tombol =  "<button class='btn btn-primary btn-icon-anim btn square'     onclick='print_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")' '><i class='icon-printer'></i></button>";
                $status = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
            } else {
                $status = "<span class='label label-warning capitalize-font inline-block'>MENUNGGU DIPROSES</span>";
                $tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='aksi_radiologi(\""  . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")' '><i class='icon-rocket'></i></button>";
            }

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $dokter = $data[$i]->dokter;
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;
            $gambar = "<img src='../assets/images/" . $data[$i]->gambar . "' class='img-responsive zoom'>";
            $ket = $data[$i]->keterangan;
            $tombol = $tombol;

            $out[$i] = array($no, $tombol, $status, $nama, $frek, $harga, $dokter,  $gambar, $id_staff, $staff_konf, $ket);
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

    public function tampil_total_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->Total_Radiologi_Byid($id_pelayanan);
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

    //    Tampilin data total nya

    public function hapus_data_radiologi()
    {
        $id_tindakan_radiologi = $this->input->post('id_tindakan_radiologi');
        $this->M_Radiologi->delete_radiologi($id_tindakan_radiologi);
        $out['status'] = "success";
        echo json_encode($out);
    }


    public function post_radiologi()
    { 
        $inPelayanan = $this->input->post('inPelayanan');
        $auth = $this->session->userdata('data_auth');
        $inTindakan = $this->input->post('id_tindakan_radiologi');
        $inKet = $this->input->post('inKet');
        $Ket = '1';

          // Count total files
      $countfiles = count($_FILES['files']['name']);
       
      // Looping all files
        for($i=0;$i<$countfiles;$i++){
 
            if(!empty($_FILES['files']['name'][$i])){
 
                // Define new $_FILES array - $_FILES['file']
                $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                // Set preference
                $config['upload_path']="./assets/images";
                $config['allowed_types']='gif|jpg|png|pdf';
                $config['encrypt_name'] = TRUE;
                $config['file_name'] = $_FILES['files']['name'][$i];
             
                //Load upload library
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
            
                // File upload
                if($this->upload->do_upload("file")){
                   
                    // Get data about the file
                     $data = array('upload_data' => $this->upload->data());
                    
                    $alldata = array(
                        'id_pelayanan' => $inPelayanan,
                        'frek'  => $inJumlah = $this->input->post('inJumlah'),
                        'gambar'  => $data['upload_data']['file_name'],
                        'id_tindakan_radiologi'  => $inTindakan,
                        'dokter'  => $inDPJP = $this->input->post('inDPJP'),
                        'total'  => $inJumlah = $this->input->post('inBiaya'),
                        'staff_konf'  => $staff = $auth->nama,
                        'keterangan'  => $inKet = $this->input->post('inKet'),
                        'ket'  => $Ket,
                    );
                    $this->M_Radiologi->update_radiologi($inPelayanan, $inTindakan, $alldata);
                    $out['status'] = "success";
                    echo json_encode($out);
                }else{
                    $out['status'] = "failed";
                    echo json_encode($out);
                }

            }
        }
        
        
    }

    // Ranap

    public function Ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_ranap';
        $page_data['dokter'] = $this->M_Radiologi->getDokter();
        $page_data['tindakan_radiologi'] = $this->M_Radiologi->selectNamaRadiologi();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_dataranap()
    {
        $page_data = $this->M_Radiologi->selectDataPasienRanap();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->nama_poli;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->nama_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $diagnosa, $dokter);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }

    public function get_radiologi()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Radiologi->selectDataby_id($id_pelayanan, $id_history);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    public function tampil_ranap_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->selectRadiologiById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->dokter == "" || $data[$i]->dokter == NULL) {
                $tombol =  "";
                $print =  "";
            } else {
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square'  onclick='hapus_radiologi(\""  . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $nama = $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
                $print =  "<button class='btn btn-primary btn-icon-anim btn square'  href='Radiologi/print_radiologi/(\"" . $id_pelayanan . "\",\"" . $data[$i]->id_tindakan_radiologi . "\")'     '><i class='icon-printer'></i></button>";
            }

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $dokter = $data[$i]->dokter;
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;
            $gambar = "<img src='../assets/images/" . $data[$i]->gambar . "' class='img-responsive zoom'>";
            $ket = $data[$i]->keterangan;
            $tombol = $tombol;

            $out[$i] = array($no, $tombol, $print, $nama, $frek, $harga, $dokter, $id_staff, $gambar, $ket);
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

    public function tampil_total_ranap()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Radiologi->Total_Radiologi_Byid($id_pelayanan);
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


    // Riwayat Pasien
    public function Riwayat_pasien()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Radiologi_riwayat_pasien';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_riwayat_pasien()
    {
        $data = $this->M_Radiologi->selectDataRiwayatRadiologi();
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $data[$i]->id_pelayanan . "\",\"" . $data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($data[$i]->tgl_masuk);
            $tgl_masuk = strftime('%A, %d %B %Y ', $time);

            $jam_masuk = strftime('%H:%M WIB', $time);

            $tgl = strtotime($data[$i]->tgl_lahir);
            $tgl_lahir = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $data[$i]->no_rm);
            $nama = $data[$i]->nama;
            $jenis_kelamin = $data[$i]->jenis_kelamin;
            $umur = $umur;
            $cara_masuk = $data[$i]->jenis_pelayanan;
            $ruang = $data[$i]->poli;
            $dokter = $data[$i]->nama_dokter;
            $cara_bayar = $data[$i]->cara_bayar;
            $diagnosa = $data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang,  $cara_bayar, $diagnosa, $dokter);
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


    public function tampil_range_riwayat_pasien()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $data = $this->M_Radiologi->selectDataRiwayatRadiologiRange($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $data[$i]->id_pelayanan . "\",\"" . $data[$i]->id_history . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($data[$i]->tgl_masuk);
            $tgl_masuk = strftime('%A, %d %B %Y ', $time);

            $jam_masuk = strftime('%H:%M WIB', $time);

            $tgl = strtotime($data[$i]->tgl_lahir);
            $tgl_lahir = strftime('%A, %d %B %Y ', $tgl);

            $birthDate = $data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $data[$i]->no_rm);
            $nama = $data[$i]->nama;
            $jenis_kelamin = $data[$i]->jenis_kelamin;
            $umur = $umur;
            $cara_masuk = $data[$i]->jenis_pelayanan;
            $ruang = $data[$i]->poli;
            $dokter = $data[$i]->nama_dokter;
            $cara_bayar = $data[$i]->cara_bayar;
            $diagnosa = $data[$i]->diagnosa;

            $out[$i] = array($no, $tindakan, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang,  $cara_bayar, $diagnosa, $dokter);
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


    // Laporan  Radiologi
    public function Laporan_radiologi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/radiologi_laporan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_laporan()
    {
        $data = $this->M_Radiologi->selectDataLaporanRadiologi();
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $time = strtotime($data[$i]->tanggal);
            $tgl = strftime('%A, %d %B %Y ', $time);

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $data[$i]->no_rm);
            $nama = $data[$i]->nama;
            $cara_bayar = $data[$i]->caraBayar;
            $tindakan = $data[$i]->tindakan;
            $harga = $data[$i]->harga;
            $harga_cost = $data[$i]->harga_cost;
            $frek = $data[$i]->frek;
            $total = $data[$i]->total;
            $dokter = $data[$i]->dokter;
            $out[$i] = array($no, $tgl, $no_rm, $nama, $cara_bayar, $tindakan, $harga, $harga_cost, $frek, $total, $dokter);
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


    public function tampil_range_laporan()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $data = $this->M_Radiologi->selectDataRangeLaporanRadiologi($mulai,$akhir);
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $time = strtotime($data[$i]->tanggal);
            $tgl = strftime('%A, %d %B %Y ', $time);

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $data[$i]->no_rm);
            $nama = $data[$i]->nama;
            $cara_bayar = $data[$i]->caraBayar;
            $tindakan = $data[$i]->tindakan;
            $harga = $data[$i]->harga;
            $harga_cost = $data[$i]->harga_cost;
            $frek = $data[$i]->frek;
            $total = $data[$i]->total;
            $dokter = $data[$i]->dokter;
            $out[$i] = array($no, $tgl, $no_rm, $nama, $cara_bayar, $tindakan, $harga, $harga_cost, $frek, $total, $dokter);
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

       // Laporan Tindakan Radiologi
       public function Laporan_tindakan_radiologi()
       {
           $this->load->view('assets/_header');
           $page_data['page_content'] = 'page_content/Radiologi_laporan_tindakan';
           $this->load->view('Main', $page_data);
           $this->load->view('assets/_footer');
       }
   
       public function tampil_laporan_tindakan()
       {
           $data = $this->M_Radiologi->selectDataLaporanTindakanRadiologi();
           $out = null;
           for ($i = 0; $i < count($data); $i++) {

                $no = $i + 1;
                $tindakan = $data[$i]->tindakan;
                $jml = $data[$i]->jml;
                $total = $data[$i]->total;
                $out[$i] = array($no, $tindakan, $jml, $total);
              
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
   
   
       public function tampil_range_tindakan_laporan()
       {
           $mulai = $this->input->post('mulai');
           $akhir = $this->input->post('akhir');
   
           $data = $this->M_Radiologi->selectDataRangeLaporanTindakanRadiologi($mulai,$akhir);
           $out = null;
           for ($i = 0; $i < count($data); $i++) {
   
               $no = $i + 1;
               $tindakan = $data[$i]->tindakan;
               $jml = $data[$i]->jml;
               $total = $data[$i]->total;
               $out[$i] = array($no, $tindakan, $jml, $total);
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



}
