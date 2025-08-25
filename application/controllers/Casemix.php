<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Casemix extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Casemix');
        $this->load->model('M_Poli');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Pasien');
        $this->load->model('M_Labor');
        $this->load->model('M_Rawatinap');
        $this->load->model('M_Erm');
        $this->load->model('M_Erm_poli');
        $this->load->model('M_Kasir');
        $this->api = "http://192.168.87.2:8181/";
        //$this->api = "http://36.92.141.4/rest_ci/index.php";
        $this->load->library('curl');
    }
    //Pasien Rajal casemix
    //Pasien Rajal casemix
    public function pasien_rajal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_rajal_casemix';
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['prosedur'] = $this->db->query('SELECT  * FROM list_prosedur')->result_array();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_rajal()
    {
        $page_data = $this->M_Casemix->selectRajal();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $no_sep = $page_data[$i]->no_sep;
            $no_bpjs = $page_data[$i]->no_bpjs;
            $pasien = $page_data[$i]->nama;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            //Tanggal lahir
            $time1 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl1 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan


            //$alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $eklaim = $this->db->get_where('eklaim', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            if (count($this->db->get_where('eklaim', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->result()) != 0) {
                $inacbg = $eklaim->kode;
                $tarif_inacbg = $eklaim->tarif;
            } else {
                $inacbg = '-';
                $tarif_inacbg = 0;
            }

            $out[$i] = array($no, $tombol, $no_rm, $no_sep, $no_bpjs, $pasien, $tgl, $waktu, $tgl1, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $inacbg, $tarif_inacbg);
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

    //Pasien ranap
    public function pasien_ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_ranap_casemix';
        $page_data['data_dokter'] = $this->M_Pasien->selectNamaDPJP();
        $page_data['data_asal_pasien'] = $this->M_Pasien->selectAsalPasien();
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_nama_ruangan'] = $this->M_Pasien->selectNamaRuangan();
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['prosedur'] = $this->db->query('SELECT  * FROM list_prosedur')->result_array();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_ranap()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Casemix->selectRanap($mulai, $akhir);

            $out = null;
            for ($i = 0; $i < count($page_data); $i++) {
                $no = $i + 1;
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilEdit(\"" . $page_data[$i]->id_pelayanan .  "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";
                $tombol1 =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";
                $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
                $no_sep = $page_data[$i]->no_sep;
                $no_bpjs = $page_data[$i]->no_bpjs;
                $pasien = $page_data[$i]->nama;
                $time = strtotime($page_data[$i]->tgl_masuk);
                $tgl = strftime("%A, %d %B %Y", $time);
                $waktu = strftime("%H:%M WIB", $time);
                //Tanggal lahir
                $time1 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
                $tgl1 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan


                //$alamat = $page_data[$i]->alamat;
                $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
                $poli = $page_data[$i]->poli;
                $caraBayar = $page_data[$i]->cara_bayar;
                $diagnosa = $page_data[$i]->diagnosa;
                $eklaim = $this->db->get_where('eklaim', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
                if (count($this->db->get_where('eklaim', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->result()) != 0) {
                    $inacbg = $eklaim->kode;
                    $tarif_inacbg = $eklaim->tarif;
                } else {
                    $inacbg = '-';
                    $tarif_inacbg = 0;
                }


                $out[$i] = array($no, $tombol, $tombol1, $no_rm, $no_sep, $no_bpjs, $pasien, $tgl, $waktu, $tgl1, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $inacbg, $tarif_inacbg);
            }

            if ($out == null) {
                echo '{"data":""}';
                exit;
            } else {
                $page_data['data'] = $out;
                echo json_encode($page_data);
                exit;
            }
        } else {
            echo '{"data":""}';
        }
    }
    // COntrol Biaya
    public function control_biaya()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Control_biaya_casemix';
        $page_data['data_dokter'] = $this->M_Pasien->selectNamaDPJP();
        $page_data['data_asal_pasien'] = $this->M_Pasien->selectAsalPasien();
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_nama_ruangan'] = $this->M_Pasien->selectNamaRuangan();
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['prosedur'] = $this->db->query('SELECT  * FROM list_prosedur')->result_array();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_control_biaya()
    {
        $page_data = $this->M_Casemix->selectControlBiaya();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilEdit(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";
            $tombol1 =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $no_sep = $page_data[$i]->no_sep;
            $no_bpjs = $page_data[$i]->no_bpjs;
            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;
            $dpjp = $page_data[$i]->nama_dokter;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            //Tanggal lahir
            $time1 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl1 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan


            //$alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $eklaim = $this->db->get_where('eklaim', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            if (count($this->db->get_where('eklaim', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->result()) != 0) {
                $inacbg = $eklaim->kode;
                $tarif_inacbg = $eklaim->tarif;
                $total = $eklaim->total;
            } else {
                $inacbg = '-';
                $tarif_inacbg = 0;
                $total = 0;
            }


            $out[$i] = array($no, $tombol, $tombol1, $no_rm, $no_sep, $no_bpjs, $pasien, $tgl, $waktu, $tgl1, $jk, $dpjp, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $inacbg, $total, $tarif_inacbg);
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

    //Assembling
    public function assembling()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Assembling_casemix';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function rajal_list()
    {
        $tgl = date("Y-m-d");
        $out = null;
        // $keluar = null;
        // $data = $this->input->post('tanggal_masuk');
        $kecaw = null;

        if ($this->input->post('tanggal_masuk') && $this->input->post('tanggal_keluar') && $this->input->post('jenis_pelayanan')) {
            $first_date = $this->input->post('tanggal_masuk');
            $second_date = $this->input->post('tanggal_keluar');
            $jenis_pelayanan = $this->input->post('jenis_pelayanan');
            if ($first_date != '' || $second_date != '') {
                $page_data = $this->M_Casemix->selectDataAssembling($first_date, $second_date, $jenis_pelayanan);
            } else if ($first_date = '' || $second_date = '') {
                $page_data = $this->M_Casemix->selectDataAssembling($tgl, $tgl, '');
            }
        } else {

            $page_data = $this->M_Casemix->selectDataAssembling($tgl, $tgl, '');
        }

        for ($i = 0; $i < count($page_data); $i++) {

            $tgl_masuk = strtotime($page_data[$i]->tgl_masuk);
            $waktu = strftime("%H:%M", $tgl_masuk);


            $tgl_lahir = strtotime($page_data[$i]->tgl_lahir);
            $birthDate = $page_data[$i]->tgl_lahir;


            // $tombol = "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' data-target='#ModalEditPasien' '><i class='icon-rocket'></i></button>";
            $tombol = "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_pendaftaran(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-pencil'></i></button>";

            $no = $i + 1;
            $tombol = $tombol;
            $nama = $page_data[$i]->nama;
            $tgl_masuk =  strftime("%A, %d %B %Y ", $tgl_masuk);
            $durasi = $waktu;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = strftime(" %d %B %Y ", $tgl_lahir);
            $usia =  counting_age1($birthDate);
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $nama_dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $diagnosa = $page_data[$i]->diagnosa;
            $no_sep = $page_data[$i]->no_sep;

            $assembling = json_encode($this->M_Casemix->cek_id($page_data[$i]->id_pelayanan));

            $out[$i] = array($no, $tombol, $nama, $tgl_masuk, $durasi, $no_rm,  $jenis_kelamin, $tgl_lahir, $usia, $jenis_pelayanan,  $poli, $nama_dokter,  $cara_bayar, $diagnosa, $assembling,   $no_sep);
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


    public function tampil_listdata_diagnosa()
    {
        $page_data = $this->M_Casemix->selectDataAllDiagnosa();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $id_pelayanan = $this->input->post('id_pelayanan');
            // $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_data_diagnosa(\"" . $id_pelayanan . "\",\"" . $page_data[$i]->id_diagnosa . "\",\"" . $page_data[$i]->nama_diagnosa . "\")' '><i class='icon-plus'></i></button>";


            $id_diagnosa = $page_data[$i]->id_diagnosa;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;
            $tombol = $tombol;



            $out[$i] = array($id_diagnosa, $nama_diagnosa, $tombol);
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

    public function tampil_listdata_prosedur()
    {
        // $id_akun = 'dgok8itaesm';

        $page_data = $this->M_Casemix->selectDataAllProsedur();

        // $page_data = null;
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $id_pelayanan = $this->input->post('id_pelayanan');
            // $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_data_prosedur(\"" . $id_pelayanan . "\",\"" . $page_data[$i]->id_prosedur . "\",\"" . $page_data[$i]->nama_prosedur . "\")' '><i class='icon-plus'></i></button>";


            $id_prosedur = $page_data[$i]->id_prosedur;
            $nama_prosedur = $page_data[$i]->nama_prosedur;
            $tombol = $tombol;



            $out[$i] = array($id_prosedur, $nama_prosedur, $tombol);
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

    public function tampil_list_diagnosa()
    {
        // $id_akun = 'dgok8itaesm';
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Casemix->selectDataDiagnosaByIdPel($id_pelayanan);

        // $page_data = null;
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            // $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->no_diagnosa . "\")' '><i class='fa fa-trash '></i></button>";


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

    function hapus_data_diagnosabyakun()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $no_diagnosa = $this->input->post('no_diagnosa');

        $this->M_Casemix->delete_dignosa_byId($id_pelayanan, $no_diagnosa);
        $out['status'] = "success";
        echo json_encode($out);
    }

    function tambah_data_diagnosa()
    {
        $no_diagnosa = uniqid();
        $tgl = date("Y-m-d");
        $id_staff = '0';
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_diagnosa = $this->input->post('id_diagnosa');
        $nama_diagnosa = $this->input->post('nama_diagnosa');

        $page_data = array(
            'no_diagnosa' => $no_diagnosa,
            'id_pelayanan' => $id_pelayanan,
            'kode' => $id_diagnosa,
            'nama_diagnosa' => $nama_diagnosa,
            'tanggal' => $tgl,
            'id_staff' => $id_staff,


        );

        $this->M_Casemix->insert_diagnosa($page_data, 'diagnosa');

        $out['status'] = "success";
        echo json_encode($out);
    }
    function tambah_data_prosedur()
    {
        $no_prosedur = uniqid();
        $tgl = date("Y-m-d");
        $id_staff = '0';
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_prosedur = $this->input->post('id_prosedur');
        $nama_prosedur = $this->input->post('nama_prosedur');

        $page_data = array(
            'no_prosedur' => $no_prosedur,
            'id_pelayanan' => $id_pelayanan,
            'kode' => $id_prosedur,
            'nama_prosedur' => $nama_prosedur,
            'tanggal' => $tgl,
            'id_staff' => $id_staff,


        );

        $this->M_Casemix->insert_prosedur($page_data, 'prosedur');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_list_prosedur()
    {
        // $id_akun = 'dgok8itaesm';
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Casemix->selectDataProsedurByIdPel($id_pelayanan);

        // $page_data = null;
        $out = null;
        // if (count($db_akun) > 0) {
        //     $id_akun = $db_akun[0]->id_akun;
        //     $page_data = $this->M_Polionline->get_list($id_akun);
        for ($i = 0; $i < count($page_data); $i++) {

            // $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_rm(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_prosedur(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->no_prosedur . "\")' '><i class='fa fa-trash '></i></button>";


            $nama_dokter = $page_data[$i]->no_prosedur;
            $kode = $page_data[$i]->kode;
            $nama_prosedur = $page_data[$i]->nama_prosedur;
            $tombol = $tombol;



            $out[$i] = array($nama_dokter, $kode, $nama_prosedur, $tombol);
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
    function hapus_data_prosedurbyakun()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $no_prosedur = $this->input->post('no_prosedur');

        $this->M_Casemix->delete_prosedur_byId($id_pelayanan, $no_prosedur);
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function ajax_edit($id)
    {
        $data = $this->person->get_by_id($id);
        echo json_encode($data);
    }
    public function getdata_pendaftaran()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');

        $db = $this->M_Casemix->selectDataPendaftaranby_id($id_pelayanan, $id_history);
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
    public function simpan_cara_keluar()
    {

        $id_pelayanan = $this->input->post('id_pelayanan');
        $cara_keluar = $this->input->post('cara_keluar');

        $page_data = array(
            'cara_keluar' => $cara_keluar
        );

        $where = array(
            'id_pelayanan' => $id_pelayanan
        );

        $this->M_Casemix->update_cara_keluar($where, $page_data, 'pelayanan');

        $this->session->set_flashdata(
            'alert',
            ' <div style="margin-left:15px;" class="alert alert-info alert-dismissible fade in">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       Akun <strong> </strong>    telah di non-aktifkan.
       </div>'
        );
    }

    public function insert_cara_keluar()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $cara_keluar = $this->input->post('cara_keluar');

        $page_data = array(
            'cara_keluar' => $cara_keluar
        );
        $where = array(
            'id_pelayanan' => $id_pelayanan
        );

        $this->M_Casemix->update_cara_keluar($where, $page_data, 'pelayanan');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function insert_keadaan_keluar()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $keadaan_keluar = $this->input->post('keadaan_keluar');

        $page_data = array(
            'keadaan_keluar' => $keadaan_keluar
        );
        $where = array(
            'id_pelayanan' => $id_pelayanan
        );

        $this->M_Casemix->update_keadaan_keluar($where, $page_data, 'pelayanan');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function simpan_keadaan_keluar()
    {
        $id_pelayanan = $this->input->post('id_pelayanan1');
        $keadaan_keluar = $this->input->post('keadaan_keluar');

        $page_data = array(
            'keadaan_keluar' => $keadaan_keluar
        );

        $where = array(
            'id_pelayanan' => $id_pelayanan
        );

        $this->M_Casemix->update_keadaan_keluar($where, $page_data, 'pelayanan');

        $this->session->set_flashdata(
            'alert',
            ' <div style="margin-left:15px;" class="alert alert-info alert-dismissible fade in">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       Akun <strong> </strong>    telah di non-aktifkan.
       </div>'
        );

        // redirect('Assembling/assembling');
    }
    public function ajax_add()
    {
        $data = array(
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'gender' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'dob' => $this->input->post('dob'),
        );
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $data = array(
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'gender' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'dob' => $this->input->post('dob'),
        );
        $this->person->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->person->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
    //End

    public function monev_harian()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Monev_harian_casemix';
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['prosedur'] = $this->db->query('SELECT  * FROM list_prosedur')->result_array();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_monev_harian()
    {
        $page_data = $this->M_Casemix->selectMonevHarian();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";
            //$tombol1 =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" .$page_data[$i]->id_pelayanan. "\",\"" .$page_data[$i]->id_history."\")' '><i class='fa fa-rocket '></i></button>";
            $no_rm = sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $birthDate = strtotime($page_data[$i]->tgl_lahir);
            $tgl_lahir = strftime("%A, %d %B %Y", $birthDate);
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $no_sep = $page_data[$i]->no_sep;
            $ekalim = $this->db->get_where('eklaim', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            if (count($this->db->get_where('eklaim', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->result()) != 0) {
                $inacbg = $ekalim->kode;
                $tarif_inacbg = $ekalim->tarif;
            } else {
                $inacbg = '-';
                $tarif_inacbg = 0;
            }



            $out[$i] = array($no, $tombol, $no_rm, $pasien, $tgl, $waktu, $tgl_lahir, $jenis_pelayanan, $poli, $cara_bayar, $diagnosa, $no_sep, $inacbg, $tarif_inacbg);
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
    public function monev_control_biaya()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Monev_control_biaya';
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['prosedur'] = $this->db->query('SELECT  * FROM list_prosedur')->result_array();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_monev_control_biaya()
    {
        $page_data = $this->M_Casemix->selectMonevControlBiaya();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $gtLabor = 0;
            $gtRadio = 0;
            $gtApelkes = 0;
            $gtApotik = 0;
            $gtUnitCost = 0;
            $gtJasa = 0;
            $gtSarana = 0;
            $gtGT = 0;
            $gtIna = 0;
            $gtSelisihTarif = 0;
            $gtSelisihUnit = 0;
            $gtOK = 0;
            $gtObatOk = 0;
            $no = $i + 1;

            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm = sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $dokter = $page_data[$i]->dokter;

            if ($page_data[$i]->status_rawat == "dirawat") {
                $status = ' <span class="label label-warning">DIRAWAT</span>';
            } else {
                $status = '<span class="label label-success">SELESAI</span>';
            }
            $diagnosa = $page_data[$i]->diagnosa;


            $labor = $this->M_Casemix->getLabor($page_data[$i]->id_pelayanan);
            $total_labor = $labor->total;
            $tarif_labor = $labor->tarif;
            $gtLabor += $total_labor;

            $radio = $this->M_Casemix->getRadio($page_data[$i]->id_pelayanan);
            $total_radio = $radio->total;
            $tarif_radio = $radio->tarif;
            $gtRadio += $total_radio;

            $apelkes = $this->M_Casemix->getApelkes($page_data[$i]->id_pelayanan);
            $total_apelkes = $apelkes->total;
            $tarif_apelkes = $apelkes->tarif;
            $gtApelkes += $total_apelkes;

            $ok = $this->M_Casemix->getOk($page_data[$i]->id_pelayanan);
            $total_ok = $ok->total;
            $tarif_ok = $ok->tarif;
            $gtOK += $total_ok;

            $obat_ok = $this->M_Casemix->getObatOk($page_data[$i]->id_pelayanan);
            $total_obat_ok = $obat_ok->total;
            $tarif_obat_ok = $obat_ok->tarif;
            $gtObatOk += $total_obat_ok;

            $apotik = $this->M_Casemix->getApotik($page_data[$i]->id_pelayanan);
            $total_apotik = $apotik->total;
            $tarif_apotik = $apotik->tarif;
            $gtApotik += $total_apotik;

            $totalUnitCost = $total_labor + $total_radio + $total_apelkes + $total_ok + $tarif_obat_ok + $total_apotik;

            $gtUnitCost += $totalUnitCost;

            $totalSemua = $tarif_labor + $tarif_apotik + $tarif_obat_ok + $tarif_radio + $tarif_ok + $tarif_apelkes;
            $gtGT += $totalSemua;

            $ekalim = $this->db->get_where('eklaim', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            if (count($this->db->get_where('eklaim', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->result()) != 0) {
                $tarif_inacbg = $ekalim->tarif;
            } else {
                $tarif_inacbg = 0;
            }
            $gtIna += $tarif_inacbg;

            $selisihTarif = $tarif_inacbg - $totalSemua;
            $gtSelisihTarif += $selisihTarif;
            if ($selisihTarif < 0) {
                $selisih_tarif = '<span class="label label-danger">' . $selisihTarif;
            } else {
                $selisih_tarif = '<span class="label label-success">' . $selisihTarif;
            }

            $selisihUnit = $tarif_inacbg - $totalUnitCost;
            $gtSelisihUnit += $selisihUnit;
            if ($selisihUnit < 0) {
                $selisih_unit = '<span class="label label-danger">' . $selisihUnit;
            } else {
                $selisih_unit = '<span class="label label-success">' . $selisihUnit;
            }

            $out[$i] = array($no, $tgl, $no_rm, $pasien, $jenis_kelamin, $cara_bayar, $dokter, $status, $diagnosa,  $total_labor, $total_radio, $total_apelkes, $total_ok, $total_obat_ok, $total_apotik, $totalUnitCost, $totalSemua, $tarif_inacbg, $selisih_tarif, $selisih_unit);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            $page_data['tarif'] = $gtSelisihTarif;
            $page_data['unit'] = $gtSelisihUnit;
            echo json_encode($page_data);
            exit;
        }
    }
    public function getDataPasien()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $data = $this->M_Casemix->getDataPasien($id_pelayanan, $id_history);
        $non_bedah = $this->M_Casemix->getTotalNonBedah($id_pelayanan);
        $konsul = $this->M_Casemix->getTotalKonsul($id_pelayanan);
        $kamar = $this->M_Casemix->getTotalKamar($id_pelayanan);
        $penunjang = $this->M_Casemix->getTotalPenunjang($id_pelayanan);
        $tenaga_ahli = $this->M_Casemix->getTotalTenagaAhli($id_pelayanan);
        $radio = $this->M_Casemix->getTotalRadio($id_pelayanan);
        $labor = $this->M_Casemix->getTotalLabor($id_pelayanan);
        $keperawatan = $this->M_Casemix->getTotalKeperawatan($id_pelayanan);
        $bedah = $this->M_Casemix->getTotalBedah($id_pelayanan);
        $sewa_alat = $this->M_Casemix->getTotalSewaAlat($id_pelayanan);
        $rehab = $this->M_Casemix->getTotalRehab($id_pelayanan);
        $bmhp = $this->M_Casemix->getTotalBmhp($id_pelayanan);
        $pel_darah = $this->M_Casemix->getTotalPelDarah($id_pelayanan);
        $obat = $this->M_Casemix->getTotalObat($id_pelayanan);
        $ekalim = $this->db->get_where('eklaim', ['id_pelayanan' => $id_pelayanan])->row();
        if (count($this->db->get_where('eklaim', ['id_pelayanan' => $id_pelayanan])->result()) != 0) {
            $inacbg = $ekalim->kode;
            $tarif_inacbg = $ekalim->tarif;
        } else {
            $inacbg = '-';
            $tarif_inacbg = 0;
        }

        if (count($data) != 0) {
            $db = array(
                'pasien' => $data[0],
                'non_bedah' => $non_bedah,
                'konsul' => $konsul,
                'kamar' => $kamar,
                'penunjang' => $penunjang,
                'tenaga_ahli' => $tenaga_ahli,
                'radio' => $radio,
                'labor' => $labor,
                'keperawatan' => $keperawatan,
                'bedah' => $bedah,
                'sewa_alat' => $sewa_alat,
                'rehab' => $rehab,
                'bmhp' => $bmhp,
                'pel_darah' => $pel_darah,
                'obat' => $obat,
                'inacbg' => $inacbg,
                'tarif_inacbg' => $tarif_inacbg,
                'status_dt' => 'found'
            );
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    public function getDataPasienRajal()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $rajal = $this->M_Casemix->getDataPasienRajal($id_pelayanan, $id_history);
        $non_bedah = $this->M_Casemix->getTotalNonBedah($id_pelayanan);
        $konsul = $this->M_Casemix->getTotalKonsul($id_pelayanan);
        $kamar = $this->M_Casemix->getTotalKamar($id_pelayanan);
        $penunjang = $this->M_Casemix->getTotalPenunjang($id_pelayanan);
        $tenaga_ahli = $this->M_Casemix->getTotalTenagaAhli($id_pelayanan);
        $radio = $this->M_Casemix->getTotalRadio($id_pelayanan);
        $labor = $this->M_Casemix->getTotalLabor($id_pelayanan);
        $keperawatan = $this->M_Casemix->getTotalKeperawatan($id_pelayanan);
        $bedah = $this->M_Casemix->getTotalBedah($id_pelayanan);
        $sewa_alat = $this->M_Casemix->getTotalSewaAlat($id_pelayanan);
        $rehab = $this->M_Casemix->getTotalRehab($id_pelayanan);
        $bmhp = $this->M_Casemix->getTotalBmhp($id_pelayanan);
        $pel_darah = $this->M_Casemix->getTotalPelDarah($id_pelayanan);
        $obat = $this->M_Casemix->getTotalObat($id_pelayanan);
        $poli = $this->db->query("SELECT * from history_pelayanan where status = 1 and id_pelayanan ='$id_pelayanan' 
        and id_pelayanan not in(SELECT id_pelayanan from history_pelayanan_ranap where status = 1)")->result();
        if (count($poli) > 0) {
            $ppn = $obat->hasil * 0.11;
        } else {
            $ppn = 0;
        }
        $obat = (object) array('hasil' => round($obat->hasil) + round($ppn));

        $ekalim = $this->db->get_where('eklaim', ['id_pelayanan' => $id_pelayanan])->row();
        if (count($this->db->get_where('eklaim', ['id_pelayanan' => $id_pelayanan])->result()) != 0) {
            $inacbg = $ekalim->kode;
            $tarif_inacbg = $ekalim->tarif;
        } else {
            $inacbg = '-';
            $tarif_inacbg = 0;
        }

        if (count($rajal) != 0) {
            $db = array(
                'rajal' => $rajal[0],
                'non_bedah' => $non_bedah,
                'konsul' => $konsul,
                'kamar' => $kamar,
                'penunjang' => $penunjang,
                'tenaga_ahli' => $tenaga_ahli,
                'radio' => $radio,
                'labor' => $labor,
                'keperawatan' => $keperawatan,
                'bedah' => $bedah,
                'sewa_alat' => $sewa_alat,
                'rehab' => $rehab,
                'bmhp' => $bmhp,
                'pel_darah' => $pel_darah,
                'obat' => $obat,
                'inacbg' => $inacbg,
                'tarif_inacbg' => $tarif_inacbg,
                'status_dt' => 'found'
            );
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    public function tampil_diagnosa()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $page_data = $this->M_Casemix->selectDiagnosaById($id_pelayanan);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 

            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_diagnosa(\"" . $page_data[$i]->no_diagnosa .  "\")' '><i class='fa fa-trash '></i></button>";

            $no = $page_data[$i]->no_diagnosa;
            $kode = $page_data[$i]->kode;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;

            $out[$i] = array($no, $kode, $nama_diagnosa, $hapus);
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
    public function tampil_prosedur()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $page_data = $this->M_Casemix->selectProsedurById($id_pelayanan);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 

            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_prosedur(\"" . $page_data[$i]->no_prosedur .  "\")' '><i class='fa fa-trash '></i></button>";

            $no = $page_data[$i]->no_prosedur;
            $kode = $page_data[$i]->kode;
            $nama_prosedur = $page_data[$i]->nama_prosedur;

            $out[$i] = array($no, $kode, $nama_prosedur, $hapus);
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
    public function insert_diagnosa()
    {
        $data = $this->session->userdata('data_auth');

        $id_pelayanan = $this->input->post('idPelayanan');
        $no_diagnosa = uniqid();
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $staff = $data->id_staff;

        $page_data = array(
            'no_diagnosa' => $no_diagnosa,
            'id_pelayanan' => $id_pelayanan,
            'kode' => $kode,
            'nama_diagnosa' => $nama,
            'tanggal' => date("Y-m-d H:i:s"),
            'id_staff' => $staff,
        );
        $this->M_Poli->insert_tindakan($page_data, 'diagnosa');
        $out['status'] = "success";

        echo json_encode($out);
    }
    public function insert_prosedur()
    {
        $data = $this->session->userdata('data_auth');

        $id_pelayanan = $this->input->post('idPelayanan');
        $no_prosedur = uniqid();
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $staff = $data->id_staff;

        $page_data = array(
            'no_prosedur' => $no_prosedur,
            'id_pelayanan' => $id_pelayanan,
            'kode' => $kode,
            'nama_prosedur' => $nama,
            'tanggal' => date("Y-m-d H:i:s"),
            'id_staff' => $staff,
        );
        $this->M_Poli->insert_tindakan($page_data, 'prosedur');
        $out['status'] = "success";

        echo json_encode($out);
    }
    function hapus_diagnosa()
    {
        $id = $this->input->post('id');
        $this->M_Poli->delete_tindakan($id, 'diagnosa', 'no_diagnosa');
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_prosedur()
    {
        $id = $this->input->post('id');
        $this->M_Poli->delete_tindakan($id, 'prosedur', 'no_prosedur');
        $out['status'] = "success";
        echo json_encode($out);
    }
    // Monev Ranap
    public function monev_ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Monev_ranap_casemix';
        $page_data['pelayanan'] = $this->M_Kasir->getPelayananUmum();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_monev_ranap()
    {
        $page_data = $this->M_Casemix->selectMonevRanap();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $gtLabor = 0;
            $gtRadio = 0;
            $gtApelkes = 0;
            $gtApotik = 0;
            $gtUnitCost = 0;
            $gtJasa = 0;
            $gtSarana = 0;
            $gtGT = 0;
            $gtIna = 0;
            $gtSelisihTarif = 0;
            $gtSelisihUnit = 0;
            $gtOK = 0;
            $gtObatOk = 0;
            $no = $i + 1;

            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm = sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $dokter = $page_data[$i]->dokter;

            if ($page_data[$i]->status_rawat == "dirawat") {
                $status = ' <span class="label label-warning">DIRAWAT</span>';
            } else {
                $status = '<span class="label label-success">SELESAI</span>';
            }
            $diagnosa = $page_data[$i]->diagnosa;


            $labor = $this->M_Casemix->getLabor($page_data[$i]->id_pelayanan);
            $total_labor = $labor->total;
            $tarif_labor = $labor->tarif;
            $gtLabor += $total_labor;

            $radio = $this->M_Casemix->getRadio($page_data[$i]->id_pelayanan);
            $total_radio = $radio->total;
            $tarif_radio = $radio->tarif;
            $gtRadio += $total_radio;

            $apelkes = $this->M_Casemix->getApelkes($page_data[$i]->id_pelayanan);
            $total_apelkes = $apelkes->total;
            $tarif_apelkes = $apelkes->tarif;
            $gtApelkes += $total_apelkes;

            $ok = $this->M_Casemix->getOk($page_data[$i]->id_pelayanan);
            $total_ok = $ok->total;
            $tarif_ok = $ok->tarif;
            $gtOK += $total_ok;

            $obat_ok = $this->M_Casemix->getObatOk($page_data[$i]->id_pelayanan);
            $total_obat_ok = $obat_ok->total;
            $tarif_obat_ok = $obat_ok->tarif;
            $gtObatOk += $total_obat_ok;

            $apotik = $this->M_Casemix->getApotik($page_data[$i]->id_pelayanan);
            $total_apotik = $apotik->total;
            $tarif_apotik = $apotik->tarif;
            $gtApotik += $total_apotik;

            $totalUnitCost = $total_labor + $total_radio + $total_apelkes + $total_ok + $tarif_obat_ok + $total_apotik;

            $gtUnitCost += $totalUnitCost;

            $totalSemua = $tarif_labor + $tarif_apotik + $tarif_obat_ok + $tarif_radio + $tarif_ok + $tarif_apelkes;
            $gtGT += $totalSemua;

            $ekalim = $this->db->get_where('eklaim', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            if (count($this->db->get_where('eklaim', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->result()) != 0) {
                $tarif_inacbg = $ekalim->tarif;
            } else {
                $tarif_inacbg = 0;
            }
            $gtIna += $tarif_inacbg;

            $selisihTarif = $tarif_inacbg - $totalSemua;
            $gtSelisihTarif += $selisihTarif;
            if ($selisihTarif < 0) {
                $selisih_tarif = '<span class="label label-danger">' . $selisihTarif;
            } else {
                $selisih_tarif = '<span class="label label-success">' . $selisihTarif;
            }

            $selisihUnit = $tarif_inacbg - $totalUnitCost;
            $gtSelisihUnit += $selisihUnit;
            if ($selisihUnit < 0) {
                $selisih_unit = '<span class="label label-danger">' . $selisihUnit;
            } else {
                $selisih_unit = '<span class="label label-success">' . $selisihUnit;
            }

            $out[$i] = array($no, $tgl, $no_rm, $pasien, $jenis_kelamin, $cara_bayar, $dokter, $status, $diagnosa,  $total_labor, $total_radio, $total_apelkes, $total_ok, $total_obat_ok, $total_apotik, $totalUnitCost, $totalSemua, $tarif_inacbg, $selisih_tarif, $selisih_unit);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            $page_data['tarif'] = $gtSelisihTarif;
            $page_data['unit'] = $gtSelisihUnit;
            echo json_encode($page_data);
            exit;
        }
    }
    public function monev_rajal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/monev_rajal_casemix';
        $page_data['pelayanan'] = $this->M_Kasir->getPelayananUmum();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_monev_rajal()
    {
        $page_data = $this->M_Casemix->selectMonevRajal();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $gtLabor = 0;
            $gtRadio = 0;
            $gtApelkes = 0;
            $gtApotik = 0;
            $gtUnitCost = 0;
            $gtJasa = 0;
            $gtSarana = 0;
            $gtGT = 0;
            $gtIna = 0;
            $gtSelisihTarif = 0;
            $gtSelisihUnit = 0;
            $gtOK = 0;
            $gtObatOk = 0;
            $no = $i + 1;

            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $no_rm = sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $poli = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $dokter = $page_data[$i]->dokter;

            if ($page_data[$i]->status_rawat == "dirawat") {
                $status = ' <span class="label label-warning">DIRAWAT</span>';
            } else {
                $status = '<span class="label label-success">SELESAI</span>';
            }
            $diagnosa = $page_data[$i]->diagnosa;

            $labor = $this->M_Casemix->getLabor($page_data[$i]->id_pelayanan);
            $total_labor = $labor->total;
            $tarif_labor = $labor->tarif;
            $gtLabor += $total_labor;

            $radio = $this->M_Casemix->getRadio($page_data[$i]->id_pelayanan);
            $total_radio = $radio->total;
            $tarif_radio = $radio->tarif;
            $gtRadio += $total_radio;

            $apelkes = $this->M_Casemix->getApelkes($page_data[$i]->id_pelayanan);
            $total_apelkes = $apelkes->total;
            $tarif_apelkes = $apelkes->tarif;
            $gtApelkes += $total_apelkes;

            $ok = $this->M_Casemix->getOk($page_data[$i]->id_pelayanan);
            $total_ok = $ok->total;
            $tarif_ok = $ok->tarif;
            $gtOK += $total_ok;

            $obat_ok = $this->M_Casemix->getObatOk($page_data[$i]->id_pelayanan);
            $total_obat_ok = $obat_ok->total;
            $tarif_obat_ok = $obat_ok->tarif;
            $gtObatOk += $total_obat_ok;

            $apotik = $this->M_Casemix->getApotik($page_data[$i]->id_pelayanan);
            $total_apotik = $apotik->total;
            $tarif_apotik = $apotik->tarif;
            $gtApotik += $total_apotik;

            $totalUnitCost = $total_labor + $total_radio + $total_apelkes + $total_ok + $tarif_obat_ok + $total_apotik;

            $gtUnitCost += $totalUnitCost;

            $totalJasa = $this->M_Casemix->getJasa($page_data[$i]->id_pelayanan)->total;
            $gtJasa += $totalJasa;

            $totalSarana = $this->M_Casemix->getSarana($page_data[$i]->id_pelayanan)->total;
            $gtSarana += $totalSarana;

            $totalSemua = $totalJasa + $totalSarana + $tarif_labor + $tarif_apotik + $tarif_obat_ok + $tarif_radio;
            $gtGT += $totalSemua;

            $ekalim = $this->db->get_where('eklaim', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            if (count($this->db->get_where('eklaim', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->result()) != 0) {
                $tarif_inacbg = $ekalim->tarif;
            } else {
                $tarif_inacbg = 0;
            }
            $gtIna += $tarif_inacbg;

            $selisihTarif = $tarif_inacbg - $totalSemua;
            $gtSelisihTarif += $selisihTarif;
            if ($selisihTarif < 0) {
                $selisih_tarif = '<span class="label label-danger">' . $selisihTarif;
            } else {
                $selisih_tarif = '<span class="label label-success">' . $selisihTarif;
            }

            $selisihUnit = $tarif_inacbg - $totalUnitCost;
            $gtSelisihUnit += $selisihUnit;
            if ($selisihUnit < 0) {
                $selisih_unit = '<span class="label label-danger">' . $selisihUnit;
            } else {
                $selisih_unit = '<span class="label label-success">' . $selisihUnit;
            }

            $out[$i] = array($no, $tgl, $no_rm, $pasien, $poli, $cara_bayar, $status, $diagnosa,  $total_labor, $total_radio, $total_apelkes, $total_ok, $total_obat_ok, $total_apotik, $totalUnitCost, $totalJasa, $totalSarana, $totalSemua, $tarif_inacbg, $selisih_tarif, $selisih_unit);
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
    public function tampil_Range_Monev_rajal()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $page_data = $this->M_Casemix->selectRangeMonevRajal($mulai, $akhir);


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $gtLabor = 0;
            $gtRadio = 0;
            $gtApelkes = 0;
            $gtApotik = 0;
            $gtUnitCost = 0;
            $gtJasa = 0;
            $gtSarana = 0;
            $gtGT = 0;
            $gtIna = 0;
            $gtSelisihTarif = 0;
            $gtSelisihUnit = 0;
            $gtOK = 0;
            $gtObatOk = 0;
            $no = $i + 1;

            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $no_rm = sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $poli = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;

            if ($page_data[$i]->status_rawat == "dirawat") {
                $status = ' <span class="label label-warning">DIRAWAT</span>';
            } else {
                $status = '<span class="label label-success">SELESAI</span>';
            }
            $diagnosa = $page_data[$i]->diagnosa;

            $labor = $this->M_Casemix->getLabor($page_data[$i]->id_pelayanan);
            $total_labor = $labor->total;
            $tarif_labor = $labor->tarif;
            $gtLabor += $total_labor;

            $radio = $this->M_Casemix->getRadio($page_data[$i]->id_pelayanan);
            $total_radio = $radio->total;
            $tarif_radio = $radio->tarif;
            $gtRadio += $total_radio;

            $apelkes = $this->M_Casemix->getApelkes($page_data[$i]->id_pelayanan);
            $total_apelkes = $apelkes->total;
            $tarif_apelkes = $apelkes->tarif;
            $gtApelkes += $total_apelkes;

            $ok = $this->M_Casemix->getOk($page_data[$i]->id_pelayanan);
            $total_ok = $ok->total;
            $tarif_ok = $ok->tarif;
            $gtOK += $total_ok;

            $obat_ok = $this->M_Casemix->getObatOk($page_data[$i]->id_pelayanan);
            $total_obat_ok = $obat_ok->total;
            $tarif_obat_ok = $obat_ok->tarif;
            $gtObatOk += $total_obat_ok;

            $apotik = $this->M_Casemix->getApotik($page_data[$i]->id_pelayanan);
            $total_apotik = $apotik->total;
            $tarif_apotik = $apotik->tarif;
            $gtApotik += $total_apotik;

            $totalUnitCost = $total_labor + $total_radio + $total_apelkes + $total_ok + $tarif_obat_ok + $total_apotik;

            $gtUnitCost += $totalUnitCost;

            $totalJasa = $this->M_Casemix->getJasa($page_data[$i]->id_pelayanan)->total;
            $gtJasa += $totalJasa;

            $totalSarana = $this->M_Casemix->getSarana($page_data[$i]->id_pelayanan)->total;
            $gtSarana += $totalSarana;

            $totalSemua = $totalJasa + $totalSarana + $tarif_labor + $tarif_apotik + $tarif_obat_ok + $tarif_radio;
            $gtGT += $totalSemua;

            $ekalim = $this->db->get_where('eklaim', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            if (count($this->db->get_where('eklaim', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->result()) != 0) {
                $tarif_inacbg = $ekalim->tarif;
            } else {
                $tarif_inacbg = 0;
            }

            $gtIna += $tarif_inacbg;

            $selisihTarif = $tarif_inacbg - $totalSemua;
            $gtSelisihTarif += $selisihTarif;
            if ($selisihTarif < 0) {
                $selisih_tarif = '<span class="label label-danger">' . $selisihTarif;
            } else {
                $selisih_tarif = '<span class="label label-success">' . $selisihTarif;
            }

            $selisihUnit = $tarif_inacbg - $totalUnitCost;
            $gtSelisihUnit += $selisihUnit;
            if ($selisihUnit < 0) {
                $selisih_unit = '<span class="label label-danger">' . $selisihUnit;
            } else {
                $selisih_unit = '<span class="label label-success">' . $selisihUnit;
            }

            $out[$i] = array($no, $tgl, $no_rm, $pasien, $poli, $cara_bayar, $status, $diagnosa,  $total_labor, $total_radio, $total_apelkes, $total_ok, $total_obat_ok, $total_apotik, $totalUnitCost, $totalJasa, $totalSarana, $totalSemua, $tarif_inacbg, $selisih_tarif, $selisih_unit);
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
    public function klaim()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Klaim_casemix';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_klaim()
    {
        $page_data = $this->M_Casemix->selectKlaim();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tindakanST(\"" . $page_data[$i]->id_klaim . "\")' '><i class='fa fa-rocket '></i></button>";
            $tombol1 =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick=' tindakanFpk(\"" . $page_data[$i]->id_klaim . "\")' '><i class='fa fa-rocket '></i></button>";
            $tombol2 =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick=' tindakanTP(\"" . $page_data[$i]->id_klaim . "\")' '><i class='fa fa-rocket '></i></button>";
            $bulan_peng =  $page_data[$i]->bulan_peng;
            $bulan_pel = $page_data[$i]->bulan_pel;
            $no_ba = $page_data[$i]->no_ba;
            $tgl_ba = strftime("%A, %d %B %Y", strtotime($page_data[$i]->tgl_ba));
            $krj = $page_data[$i]->krj;
            $rprj = $page_data[$i]->rprj;
            $kri = $page_data[$i]->kri;
            $rpri =  $page_data[$i]->rpri;
            $no_ba_sertim = '<span class="label label-success">' . $page_data[$i]->no_ba_sertim;
            $tgl_ba_sertim = '<span class="label label-success">' . $page_data[$i]->tgl_ba_sertim;
            $k_rj = '<span class="label label-success">' . $page_data[$i]->k_rj;
            $rp_rj = '<span class="label label-success">' . $page_data[$i]->rp_rj;
            $k_ri = '<span class="label label-success">' . $page_data[$i]->k_ri;
            $rp_ri = '<span class="label label-success">' . $page_data[$i]->rp_ri;
            $no_fpk =  '<span class="label label-warning">' . $page_data[$i]->no_fpk;
            $tgl_fpk = '<span class="label label-warning">' . $page_data[$i]->tgl_fpk;
            $lk_rj = '<span class="label label-warning">' . $page_data[$i]->lk_rj;
            $lrp_rj = '<span class="label label-warning">' . $page_data[$i]->lrp_rj;
            $lk_ri = '<span class="label label-warning">' . $page_data[$i]->lk_ri;
            $lrp_ri = '<span class="label label-warning">' . $page_data[$i]->lrp_ri;
            $pk_rj = '<span class="label label-warning">' . $page_data[$i]->pk_rj;
            $prp_rj =  '<span class="label label-warning">' . $page_data[$i]->prp_rj;
            $pk_ri = '<span class="label label-warning">' . $page_data[$i]->pk_ri;
            $prp_ri = '<span class="label label-warning">' . $page_data[$i]->prp_ri;
            $tlk_rj = '<span class="label label-warning">' . $page_data[$i]->tlk_rj;
            $tlrp_rj = '<span class="label label-warning">' . $page_data[$i]->tlrp_rj;
            $tlk_ri = '<span class="label label-warning">' . $page_data[$i]->tlk_ri;
            $tlrp_ri = '<span class="label label-warning">' . $page_data[$i]->tlrp_ri;

            $dk_rj =  '<span class="label label-warning">' . $page_data[$i]->dk_rj;
            $drp_rj = '<span class="label label-warning">' . $page_data[$i]->drp_rj;
            $dk_ri = '<span class="label label-warning">' . $page_data[$i]->dk_ri;
            $drp_ri = '<span class="label label-warning">' . $page_data[$i]->drp_ri;
            $tgl_rek = '<span class="label label-danger">' . $page_data[$i]->tgl_rek;
            $rj = '<span class="label label-danger">' . $page_data[$i]->rj;
            $ri = '<span class="label label-danger">' . $page_data[$i]->ri;

            $out[$i] = array($no, $tombol, $tombol1, $tombol2, $bulan_peng, $bulan_pel, $no_ba, $tgl_ba, $krj, $rprj, $kri, $rpri, $no_ba_sertim, $tgl_ba_sertim, $k_rj, $rp_rj, $k_ri, $rp_ri, $no_fpk, $tgl_fpk, $lk_rj, $lrp_rj, $lk_ri, $lrp_ri, $pk_rj, $prp_rj, $pk_ri, $prp_ri, $tlk_rj, $tlrp_rj, $tlk_ri, $tlrp_ri, $dk_rj, $drp_rj, $dk_ri, $drp_ri, $tgl_rek, $rj, $ri);
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
    public function insertKlaimBpjs()
    {
        $data = $this->session->userdata('data_auth');


        $id = uniqid();
        $bulan_peng = $this->input->post('pengajuan');
        $bulan_pel = $this->input->post('pelayanan');
        $no_ba = $this->input->post('no_ba');
        $tgl_ba = $this->input->post('tgl_masuk');
        $krj = $this->input->post('klaim_rj');
        $rprj = $this->input->post('biaya_rj');
        $kri = $this->input->post('klaim_ri');
        $rpri = $this->input->post('biaya_ri');
        $staff = $data->id_staff;

        $klaim = array(
            'id_klaim' => $id,
            'bulan_peng' => $bulan_peng,
            'bulan_pel' => $bulan_pel,
            'no_ba' => $no_ba,
            'tgl_ba' => $tgl_ba,
            'krj' => $krj,
            'rprj' => $rprj,
            'kri' => $kri,
            'rpri' => $rpri,
            'tanggal' => date("Y-m-d H:i:s"),
            'staff' => $staff,
        );
        $this->M_Poli->insert_tindakan($klaim, 'klaim');
        $klaim_ba = array(
            'id_klaim' => $id,
            'no_ba_sertim' => '-',
            'tgl_ba_sertim' => '-',
            'k_rj' => '-',
            'rp_rj' => '-',
            'k_ri' => '-',
            'rp_ri' => '-',
            'staff_ba' => $staff,
        );
        $this->M_Poli->insert_tindakan($klaim_ba, 'klaim_ba');
        $klaim_fpk = array('id_klaim' => $id, 'no_fpk' => '-', 'tgl_fpk' => '-', 'lk_rj' => '-', 'lrp_rj' => '-', 'lk_ri' => '-', 'lrp_ri' => '-', 'pk_rj' => '-', 'prp_rj' => '-', 'pk_ri' => '-', 'prp_ri' => '-', 'tlk_rj' => '-', 'tlrp_rj' => '-', 'tlk_ri' => '-', '	tlrp_ri' => '-', 'dk_rj' => '-', 'drp_rj' => '-', 'dk_ri' => '-', 'drp_ri' => '-', 'id_staff_fpk' => $staff);
        $this->M_Poli->insert_tindakan($klaim_fpk, 'klaim_fpk');
        $klaim_rek = array('id_klaim' => $id, 'tgl_rek' => '-', 'rj' => '-', 'ri' => '-', 'staff_rek' => $staff);
        $this->M_Poli->insert_tindakan($klaim_rek, 'klaim_rek');
        $out['status'] = "success";

        echo json_encode($out);
    }
    public function insertKlaimBpjsBa()
    {
        $data = $this->session->userdata('data_auth');

        $idKlaim = $this->input->post('idKlaim');
        $no_ba = $this->input->post('no_ba');
        $tgl_masuk = $this->input->post('tgl_masuk');
        $klaim_rj = $this->input->post('klaim_rj');
        $biaya_rj = $this->input->post('biaya_rj');
        $klaim_ri = $this->input->post('klaim_ri');
        $biaya_ri = $this->input->post('biaya_ri');
        $staff = $data->id_staff;
        $where = array(
            'id_klaim' => $idKlaim
        );

        $klaim_ba = array(
            'no_ba_sertim' => $no_ba,
            'tgl_ba_sertim' =>  $tgl_masuk,
            'k_rj' =>  $klaim_rj,
            'rp_rj' => $biaya_rj,
            'k_ri' => $klaim_ri,
            'rp_ri' => $biaya_ri,
            'staff_ba' => $staff,
        );
        $this->M_Poli->update($klaim_ba, $where, 'klaim_ba');

        $out['status'] = "success";

        echo json_encode($out);
    }
    public function insertKlaimBpjsFpk()
    {
        $data = $this->session->userdata('data_auth');

        $idKlaim = $this->input->post('idKlaim');
        $no_ba = $this->input->post('no_ba');
        $tgl_masuk = $this->input->post('tgl_masuk');
        $klaim_rj = $this->input->post('klaim_rj');
        $biaya_rj = $this->input->post('biaya_rj');
        $klaim_ri = $this->input->post('klaim_ri');
        $biaya_ri = $this->input->post('biaya_ri');
        $klaim_rjp = $this->input->post('klaim_rjp');
        $biaya_rjp = $this->input->post('biaya_rjp');
        $klaim_rip = $this->input->post('klaim_rip');
        $biaya_rip = $this->input->post('biaya_rip');
        $klaim_rjtl = $this->input->post('klaim_rjtl');
        $biaya_rjtl = $this->input->post('biaya_rjtl');
        $klaim_ritl = $this->input->post('klaim_ritl');
        $biaya_ritl = $this->input->post('biaya_ritl');
        $klaim_rjd = $this->input->post('klaim_rjd');
        $biaya_rjd = $this->input->post('biaya_rjd');
        $klaim_rid = $this->input->post('klaim_rid');
        $biaya_rid = $this->input->post('biaya_rid');
        $staff = $data->id_staff;
        $where = array(
            'id_klaim' => $idKlaim
        );

        $klaim_fpk = array(
            'no_fpk' => $no_ba,
            'tgl_fpk' => $tgl_masuk,
            'lk_rj' => $klaim_rj,
            'lrp_rj' => $biaya_rj,
            'lk_ri' => $klaim_ri,
            'lrp_ri' => $biaya_ri,
            'pk_rj' => $klaim_rjp,
            'prp_rj' => $biaya_rjp,
            'pk_ri' => $klaim_rip,
            'prp_ri' => $biaya_rip,
            'tlk_rj' => $klaim_rjtl,
            'tlrp_rj' => $biaya_rjtl,
            'tlk_ri' => $klaim_ritl,
            'tlrp_ri' => $biaya_ritl,
            'dk_rj' => $klaim_rjd,
            'drp_rj' => $biaya_rjd,
            'dk_ri' => $klaim_rid,
            'drp_ri' => $biaya_rid,
            'id_staff_fpk' => $staff
        );
        $this->M_Poli->update($klaim_fpk, $where, 'klaim_fpk');

        $out['status'] = "success";

        echo json_encode($out);
    }
    public function insertKlaimBpjsRek()
    {
        $data = $this->session->userdata('data_auth');
        $idKlaim = $this->input->post('idKlaim');
        $tgl_masuk = $this->input->post('tgl_masuk');
        $biaya_rj = $this->input->post('biaya_rj');
        $biaya_ri = $this->input->post('biaya_ri');
        $staff = $data->id_staff;
        $where = array(
            'id_klaim' => $idKlaim
        );

        $klaim_rek = array(
            'tgl_rek' => $tgl_masuk,
            'rj' => $biaya_rj,
            'ri' => $biaya_ri,
            'staff_rek' => $staff
        );
        $this->M_Poli->update($klaim_rek, $where, 'klaim_rek');

        $out['status'] = "success";

        echo json_encode($out);
    }

    public function Labor_pulang_poli()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Labor_pulang_poli';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_labor_pulang_poli()
    {
        date_default_timezone_set('Asia/Jakarta');
        $page_data = $this->db->get('v_labor_poli')->result();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->jenis_pelayanan . "\",\"" . $page_data[$i]->poli .  "\",\"" . $page_data[$i]->nama . "\",\"" . $umr . "\",\"" . $umur . "\",\"" . $page_data[$i]->jenis_kelamin . "\",\"" . $page_data[$i]->poli . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

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
            $no_hp = $page_data[$i]->no_hp;
            $diagnosa = $page_data[$i]->diagnosa;
            $agama = $page_data[$i]->agama;
            $alamat = $page_data[$i]->alamat;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $alamat, $tgl_masuk, $jam_masuk, $no_hp, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $dokter, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $print['data'] = $out;
            echo json_encode($print);
            exit;
        }
    }
    public function tampil_form_labor()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $page_data = $this->db->get_where('form_labor', array('id_pelayanan' => $id_pelayanan))->result();

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_labor(\"" . $page_data[$i]->id_form_labor . "\")' '><i class='fa fa-rocket '></i></button>";
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_form_labor(\"" . $page_data[$i]->id_form_labor .  "\")' '><i class='fa fa-trash '></i></button>";
            if ($page_data[$i]->status == 0) {
                $request =   "";
            } elseif ($page_data[$i]->status == 1) {
                $request = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
            } else {
                $request = '<a class="btn btn-success btn-xs" href="' . base_url('Poli/download_file/' . $page_data[$i]->file) . '"><span class="fas fa-pencil-alt"></span> Download</a></div>';
            }

            $no = $i + 1;
            $diagnosa = $page_data[$i]->diagnosa;
            $ringkasan = $page_data[$i]->ringkasan;
            $keterangan = $page_data[$i]->keterangan;
            $time = strtotime($page_data[$i]->tgl);
            $tgl = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $out[$i] = array($no, $request, $tgl, $waktu, $diagnosa, $ringkasan, $keterangan);
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
    public function download_file($file)
    {
        force_download('assets/file-upload/' . $file, NULL);
    }
    public function Erm()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Erm_casemix';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_erm()
    {
        date_default_timezone_set('Asia/Jakarta');
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($this->input->post('tipe') == 'range') {
            $page_data = $this->M_Casemix->selectDataPasienIGDRange($mulai, $akhir);
        } else {
            $tgl = date('Y-m-d');
            $page_data = $this->M_Casemix->selectDataPasienIGDRange($tgl, $tgl);
        }


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            // $ranap = $this->M_Rawatinap->selectDataPasienRanapById($page_data[$i]->id_pelayanan);
            // if (count($ranap) > 0) {
            //     $status_ranap = '<span class="label label-warning">Masuk Rawat Inap</span>';
            // } else {
            //     $status_ranap = '-';
            // }
            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');


            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $no = $i + 1;
            $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            // $dokter = $page_data[$i]->nama_dokter;
            $nama_poli = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;
            // $diagnosa = $page_data[$i]->diagnosa;
            $jenis = ($cara_masuk == 'POLI PRIORITAS') ? 'POLI' : $cara_masuk;
            $tindakan = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('Casemix/print_resume_medis/') . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "'><i class='icon-printer'></i></a>";

            $out[$i] = array($no, $tindakan, $tgl_masuk, $jam_masuk, $no_rm, $nama,  $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $nama_poli, $cara_bayar);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $print['data'] = $out;
            echo json_encode($print);
            exit;
        }
    }
    public function print_resume_medis($id_pelayanan, $id_history)
    {
        $this->load->model('M_Erm_ranap');

        $data = get_list_pendapatan_casemix($id_pelayanan);

        $jenis_pel = explode('_', $id_history);

        if ($jenis_pel[0] == 'ugd') {
            $data['data'] = $this->M_Erm->cetakResumeMed($id_pelayanan);
        } else if ($jenis_pel[0] == 'his') {
            $data['data'] = $this->M_Erm_poli->cetakResumeMed($id_history);
        } else if ($jenis_pel[0] == 'ranap') {
            $data['pasien_ranap'] = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
            $data['resume'] = $this->M_Erm_ranap->getResumePulang($id_pelayanan, $id_history);
            $data['terapi_ranap'] = $this->M_Erm->selectTerapiByIdPel($id_pelayanan);
        }

        // if ($cara_masuk == 'UGD') {
        //     $data['data'] = $this->M_Erm->cetakResumeMed($id_pelayanan);
        // } else if (preg_match('/POLI/',$cara_masuk)) {
        //     $data['data'] = $this->M_Erm_poli->cetakResumeMed($id_history);
        // }
        $data['cara_masuk'] = $jenis_pel[0];
        $data['inPel'] = $id_pelayanan;
        $data['inHis'] = $id_history;
        $data['terapi'] = $this->M_Casemix->selectTerapiByIdPel($id_pelayanan);
        $data['penunjang'] = $this->M_Casemix->cetakPenunjang($id_pelayanan);

        $data['labor1'] = $this->db->query("SELECT * FROM form_labor where id_pelayanan= '$id_pelayanan'")->result_array();
        $data['radio1'] = $this->db->query("SELECT * FROM tindakan_radiologi where id_pelayanan= '$id_pelayanan' and keterangan != ''")->result_array();
        $data['sep'] = $this->M_Casemix->selectSEP($id_pelayanan);
        $data['pasien'] = $this->M_Casemix->selectDataPasienby_id($id_pelayanan, $id_history);
        $data['kasir'] = $this->M_Casemix->getDpDisc($id_pelayanan);

        // $dblabor = $this->db->get_where('form_labor',['id_pelayanan'=>$id_pelayanan])->result();

        $this->load->view('print/erm_casemix', $data);
    }

    public function print_resume_medistes($id_pelayanan, $id_history, $cara_masuk)
    {
        $this->load->helper('eklaim');
        // $data['pendapatan'] = get_list_pendapatan_casemix($id_pelayanan);

        $jenis_pel = explode('_', $id_history);

        if ($jenis_pel[0] == 'ugd') {
            $data['pendapatan'] = get_list_pendapatan($id_pelayanan);
            $data['data'] = $this->M_Erm->cetakResumeMed($id_pelayanan);
            $data['terapi'] = $this->M_Erm->selectTerapiByIdPel($id_pelayanan);
            $cara_masuk = 'UGD';
        } else if ($jenis_pel[0] == 'his') {
            $data['pendapatan'] = get_list_pendapatan($id_pelayanan);
            $data['data'] = $this->M_Erm_poli->cetakResumeMed($id_history);
            $data['terapi'] = $this->M_Casemix->selectTerapiByIdPel($id_pelayanan);
            $cara_masuk = 'POLI';
        } else if ($jenis_pel[0] == 'ranap') {
            $data['pendapatan'] = get_list_pendapatan_ranap($id_pelayanan);
            $data['pasien_ranap'] = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
            $data['resume'] = $this->M_Erm_ranap->getResumePulang($id_pelayanan, $id_history);
            $data['terapi_ranap'] = $this->M_Erm->selectTerapiByIdPel($id_pelayanan);
            $data['terapi'] = $this->M_Casemix->selectTerapiByIdPel($id_pelayanan);
            $cara_masuk = 'RAWAT INAP';
        }

        $data['cara_masuk'] = $cara_masuk;
        $data['inPel'] = $id_pelayanan;
        $data['penunjang'] = $this->M_Casemix->cetakPenunjang($id_pelayanan);

        $data['labor1'] = $this->db->query("SELECT * FROM form_labor where id_pelayanan= '$id_pelayanan'")->result_array();
        $data['radio1'] = $this->db->query("SELECT e.* FROM tindakan_radiologi t, table_expertise e where e.id_tindakan_radiologi= t.id_tindakan_radiologi and t.id_pelayanan= '$id_pelayanan' and keterangan != ''")->result_array();
        $data['sep'] = $this->M_Casemix->selectSEP($id_pelayanan);
        $data['pasien'] = $this->M_Casemix->selectDataPasienby_id($id_pelayanan, $id_history);
        $data['kasir'] = $this->M_Kasir->getDetailKasir($id_pelayanan);

        // $dblabor = $this->db->get_where('form_labor',['id_pelayanan'=>$id_pelayanan])->result();
        $data['eklaim'] = getClaim($data['pasien']['no_sep']);

        // echo $data['eklaim'];
        $this->load->view('print/erm_casemix_tes', $data);
    }

    public function Laporan_keuangan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_keuangan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pasien_ranap()
    {
        $page_data = $this->M_Casemix->selectLaporanPasienRanap();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $dokter, $nama, $golongan_obat, $tipe, $produsen, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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

    public function Tampil_laporan_pasien_ranap_sanbe()
    {
        $page_data = $this->M_Casemix->selectLaporanPasienRanapSanbe();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->nama;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $dokter, $nama, $golongan_obat, $tipe, $produsen, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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

    public function Tampil_Rangelaporan_pasienRanapSanbe()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Casemix->selectRangeLaporanPasienRanapSanbe($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->nama;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $dokter, $nama, $golongan_obat, $tipe, $produsen, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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

    public function Tampil_Rangelaporan_pasienRanap()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Casemix->selectRangeLaporanPasienRanap($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $dokter, $nama, $golongan_obat, $tipe, $produsen, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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

    //poli

    public function Laporan_pasien_poli()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pasien_poli';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_pasien_rajal()
    {
        $page_data = $this->M_Casemix->selectLaporanPasienRajal();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $dokter, $nama, $golongan_obat, $tipe, $produsen, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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
    public function Tampil_Rangelaporan_pasienRajal()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Casemix->selectRangeLaporanPasienRajal($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $dokter, $nama, $golongan_obat, $tipe, $produsen, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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

    //igd

    public function Laporan_pasien_Igd()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pasien_igd';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_pasien_Igd()
    {
        $page_data = $this->M_Casemix->selectLaporanPasienIgd();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $dokter, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor,  $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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
    public function Tampil_Rangelaporan_pasienIgd()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Casemix->selectRangeLaporanPasienIgd($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $dokter, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor,  $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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

    public function pasien_batal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_batal_casemix';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    //pasien batal

    private function __namaStaff($id)
    {
        $db = $this->db->get_where("staff", ["id_staff" => $id])->row()->nama;
        return $db;
    }
    private function tanggal_hapus($id)
    {
        return $this->db->get_where('pelayanan', ["id_pelayanan" => $id])->row()->tgl_hapus;
    }
    private function caraBayar($id)
    {
        return $this->db->get_where('cara_bayar', ["id_cara_bayar" => $id])->row()->nama;
    }
    private function getIDCaraBayar($idpel)
    {
        return $this->db->get_where('pelayanan', ["id_pelayanan" => $idpel])->row()->cara_bayar;
    }

    public function tampil_pasien_batal()
    {
        $date1 = date('Y-m-d H:i:s', mktime(0, 0, 0));
        $date2 = date('Y-m-d H:i:s', mktime(23, 59, 59));
        if ($this->input->post('tipe') == 'range') {
            $page_data = $this->M_Erm->selectPembatalanDateRange($this->input->post('mulai'), $this->input->post('akhir'));
        } else {
            $page_data = $this->M_Erm->selectPembatalan($date1, $date2);
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            if ($page_data[$i]->status_batal == "0") {
                $status = "<span class='label label-success'>APPROVED</span>";
            } else {
                $status = "<span class='label label-danger'>NOT APPROVED</span>";
            }

            $keterangan = $page_data[$i]->keterangan;

            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='approve(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";
            $norm = $page_data[$i]->no_rm;
            $nama = $page_data[$i]->nama;
            $poli = $page_data[$i]->poli;
            $dpjp = $page_data[$i]->dpjp;
            $tgl_hapus = $this->tanggal_hapus($page_data[$i]->id_pelayanan);
            $getIDCara = $this->getIDCaraBayar($page_data[$i]->id_pelayanan);
            $carabayar = $this->caraBayar($getIDCara);

            $staff = $this->__namaStaff($page_data[$i]->staff);
            $out[$i] = array($no, $tombol, $norm, $nama, $tglMasuk, $dpjp, $keterangan, $carabayar, $staff, $status, $tgl_hapus);
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

    public function approve_batal()
    {
        $id = $this->input->post('id');
        $data = [
            'status_batal' => "0",
            'tgl_approve' => date('Y-m-d H:i:s', time()),
        ];
        $this->M_Erm->update($data, array("id_pelayanan" => $id), "konfirmasi_batal");
    }

    //end pasien batal

}
