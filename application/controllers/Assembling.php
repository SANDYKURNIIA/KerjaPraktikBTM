<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assembling extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Assembling');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Assembling';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function assembling()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Assembling';
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
                $page_data = $this->M_Assembling->selectDataAssembling($first_date, $second_date, $jenis_pelayanan);
            } else if ($first_date = '' || $second_date = '') {
                $page_data = $this->M_Assembling->selectDataAssembling($tgl, $tgl, '');
            }
        } else {

            $page_data = $this->M_Assembling->selectDataAssembling($tgl, $tgl, '');
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
            $diagnosa_pelayanan = $page_data[$i]->diagnosa;
            $no_sep = $page_data[$i]->no_sep;
            $keterangan = $page_data[$i]->keterangan;

            $assembling = json_encode($this->M_Assembling->cek_id($page_data[$i]->id_pelayanan));
            $diagnosa_assembling = json_encode($this->M_Assembling->cek_diagnosa($page_data[$i]->id_pelayanan));

            $out[$i] = array($no, $tombol, $nama, $tgl_masuk, $durasi, $no_rm,  $jenis_kelamin, $tgl_lahir, $usia, $jenis_pelayanan,  $poli, $nama_dokter,  $cara_bayar, $diagnosa_pelayanan, $diagnosa_assembling, $assembling,   $no_sep, $keterangan);
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
        $page_data = $this->M_Assembling->selectDataAllDiagnosa();

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

        $page_data = $this->M_Assembling->selectDataAllProsedur();

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
        $page_data = $this->M_Assembling->selectDataDiagnosaByIdPel($id_pelayanan);

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

        $this->M_Assembling->delete_dignosa_byId($id_pelayanan, $no_diagnosa);
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

        $this->M_Assembling->insert_diagnosa($page_data, 'diagnosa');

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

        $this->M_Assembling->insert_prosedur($page_data, 'prosedur');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_list_prosedur()
    {
        // $id_akun = 'dgok8itaesm';
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Assembling->selectDataProsedurByIdPel($id_pelayanan);

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

        $this->M_Assembling->delete_prosedur_byId($id_pelayanan, $no_prosedur);
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

        $db = $this->M_Assembling->selectDataPendaftaranby_id($id_pelayanan, $id_history);
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

        $this->M_Assembling->update_cara_keluar($where, $page_data, 'pelayanan');

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

        $this->M_Assembling->update_cara_keluar($where, $page_data, 'pelayanan');

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

        $this->M_Assembling->update_keadaan_keluar($where, $page_data, 'pelayanan');

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

        $this->M_Assembling->update_keadaan_keluar($where, $page_data, 'pelayanan');

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
}
