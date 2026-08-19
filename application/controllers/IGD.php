<?php
defined('BASEPATH') or exit('No direct script access allowed');
class IGD extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_IGD');
        $this->load->model('M_Apotik');
        $this->load->model('M_Poli');
        $this->load->model('M_Rawatinap');
        $this->api = "http://36.92.141.4/rest_ci/index.php";
        // $this->api = "http://103.154.93.45/rest_ci/index.php";
        $this->load->library('curl');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/IGD';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    //Data
    public function insert_tindakan()
    {
        $id_pelayanan = $this->input->post('idPelayanan');
        $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
        if ($pelayanan->status_rawat == 'selesai') {
            $out['status'] = "Pasien sudah dicheckout";
        } else {
            $id_tindakan_igd = uniqid();
            $id_list_tindakan = $this->input->post('id_list_tindakan');
            $harga = $this->input->post('harga');
            $frek = $this->input->post('frek');
            $total = $this->input->post('total');
            $id_dokter = $this->input->post('dokter');
            $id_staff = 'st30';
            $tgl =  date("Y-m-d H:i:s");
            $id_history = $this->input->post('id_history');
            if ($frek == 0) {
                $out['status'] = "error";
            } else {
                $page_data = array(
                    'id_tindakan_igd' => $id_tindakan_igd,
                    'id_pelayanan' => $id_pelayanan,
                    'id_list_tindakan' => $id_list_tindakan,
                    'harga' => $harga,
                    'frek' => $frek,
                    'tanggal' => $tgl,
                    'total' => $total,
                    'id_dokter' => $id_dokter,
                    'id_staff' => $id_staff,
                );

                $this->M_IGD->insert_tindakan($page_data, 'tindakan_igd');

                $out['status'] = "success";
                $count = array(
                    'tindakan' => 1,
                );
                $this->M_Poli->insert_req_kasir($id_pelayanan, $id_history, $count);
                $out['status'] = "success";
            }
        }
        echo json_encode($out);
    }


    //Data
    public function tampil_list_tindakan()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_IGD->selectDataTindakanByIdPel($id_pelayanan);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_tindakan(\"" . $page_data[$i]->id_tindakan_igd . "\",\"" . $id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";

            $no = $i + 1;
            $nama_tindakan = $page_data[$i]->nama;
            $harga = "Rp. " . number_format($page_data[$i]->harga, 0, ',', '.');
            $frek = $page_data[$i]->frek;
            $total = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $nama_dokter = $page_data[$i]->dokter;
            $username = $page_data[$i]->staff;
            $tombol = $tombol;

            $out[$i] = array($no, $nama_tindakan, $harga, $frek, $total, $nama_dokter, $username, $tombol);
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

    //Data
    public function tampil_list_total()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_IGD->selectDataTotalByIdPel($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $id_tindakan_igd  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $out[$i] = array($id_tindakan_igd);
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

    //Data
    function hapus_data_tindakan()
    {
        $id_tindakan_igd = $this->input->post('id_tindakan_igd');


        $this->M_IGD->delete_tindakan($id_tindakan_igd);
        $out['status'] = "success";
        echo json_encode($out);
    }

    // Data
    public function tampil_data_igd()
    {
        $page_data = $this->M_IGD->selectDataPasienIGD();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            // $ranap = $this->M_Rawatinap->selectDataPasienRanapById($page_data[$i]->id_pelayanan);
            // if (count($ranap) > 0) {
            //     $status_ranap = '<span class="label label-warning">Masuk Rawat Inap</span>';
            // } else {
            $status_ranap = '-';
            // }

            // if ($page_data[$i]->status == 1) {
            //     $kasir = "<span class='label label-success capitalize-font inline-block'>REQUESTED<span>";
            // } else {
            //     $kasir = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='edit_kasir(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-dollar'></i></button>";
            // }
            $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('erm_igd/form/' . urlencode(base64_encode($page_data[$i]->id_pelayanan)) . '/' . urlencode(base64_encode($page_data[$i]->id_history))) . "><i class='icon-note'></i></a>";
            //$checkout = "<button class='btn btn-primary btn-icon-anim btn-square' onclick='check_out(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='icon-like'></i></button>";
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
            $alamat = $page_data[$i]->alamat;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $erm, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $alamat, $cara_bayar, $diagnosa, $dokter);
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

    // Data
    public function getdata_igd()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_IGD->selectDataPasienIGDby_id($id_pelayanan, $id_history);
        $tbTindakan = 'tindakan_igd';
        $db1 = $this->M_IGD->cekJumTindakan($id_pelayanan, $tbTindakan);
        $count = count($db1);
        if (count($db) > 0) {
            $data = $db[0];
            $db = array(
                'status_dt' => 'found',
                'data' => $data,
                'countTin' => $count
            );
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    // tampil laporan Dokter UGD

    public function laporan_UGD()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/laporan_UGD';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_laporan_UGD()
    {
        $data = $this->M_IGD->selectDataLaporanUGD();
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $time = strtotime($data[$i]->tgl_masuk);
            $tgl_masuk = strftime('%A, %d %B %Y ', $time);

            $no = $i + 1;
            $jenis_pelayanan = $data[$i]->jenis_pelayanan;
            $dokter = $data[$i]->nama;
            $nama = $data[$i]->pasien;
            $out[$i] = array($no, $jenis_pelayanan, $tgl_masuk, $dokter, $nama);
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
    public function tampil_range_laporan_UGD()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $data = $this->M_IGD->selectDataRangeLaporanUGD($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $time = strtotime($data[$i]->tgl_masuk);
            $tgl_masuk = strftime('%A, %d %B %Y ', $time);

            $no = $i + 1;
            $jenis_pelayanan = $data[$i]->jenis_pelayanan;
            $dokter = $data[$i]->nama;
            $nama = $data[$i]->pasien;
            $out[$i] = array($no, $jenis_pelayanan, $tgl_masuk, $dokter, $nama);
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

    // tampil laporan Dokter UGD RAWAT INAP

    public function laporan_UGD_ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/laporan_UGD_ranap';
        // $page_data['data_pasien'] = $this->M_Laporan->selectDataPasien();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_laporan_UGD_ranap()
    {
        $data = $this->M_IGD->selectDataLaporanUGDranap();
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $time = strtotime($data[$i]->tgl_masuk);
            $tgl_masuk = strftime('%A, %d %B %Y ', $time);

            $no = $i + 1;
            $jenis_pelayanan = $data[$i]->jenis_pelayanan;
            $dokter = $data[$i]->nama;
            $out[$i] = array($no, $jenis_pelayanan, $tgl_masuk, $dokter);
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
    public function tampil_range_laporan_UGD_ranap()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $data = $this->M_IGD->selectDataRangeLaporanUGDranap($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $time = strtotime($data[$i]->tgl_masuk);
            $tgl_masuk = strftime('%A, %d %B %Y ', $time);

            $no = $i + 1;
            $jenis_pelayanan = $data[$i]->jenis_pelayanan;
            $dokter = $data[$i]->nama;
            $out[$i] = array($no, $jenis_pelayanan, $tgl_masuk, $dokter);
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

    // Radiologi 
    public function get_radiologi()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_IGD->selectDataPasienIGDby_id($id_pelayanan, $id_history);
        $db1 = $this->M_IGD->cekJumTindakanRad($id_pelayanan);
        $count = count($db1);
        if (count($db) > 0) {
            $data = $db[0];
            $db = array(
                'status_dt' => 'found',
                'data' => $data,
                'countTin' => $count
            );
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    // public function insert_radiologi()
    // {
    //     $data = $this->session->userdata('data_auth');

    //     $id_pel_rad = $this->input->post('id_pel_rad');
    //     $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pel_rad])->row();
    //     if ($pelayanan->status_rawat == 'selesai') {
    //         $out['status'] = "Pasien sudah dicheckout";
    //     } else {
    //         $id_tindakan_radiologi = $this->input->post('id');
    //         $harga = $this->input->post('harga');
    //         $id_list_tindakan = $this->input->post('id_list_tindakan');
    //         $frek = $this->input->post('frek');
    //         $total = $this->input->post('total');
    //         $tgl = date("Y-m-d H:i:s");
    //         $staff = $data->id_staff;

    //         if ($frek == 0) {
    //             $out['status'] = "error";
    //         } else {
    //             $data = array(
    //                 'id_tindakan_radiologi' => $id_tindakan_radiologi,
    //                 'harga' => $harga,
    //                 'frek' => $frek,
    //                 'id_pelayanan' => $id_pel_rad,
    //                 'jenis_pelayanan' => 'IGD',
    //                 'id_tindakan' => $id_list_tindakan,
    //                 'total' => $total,
    //                 'tanggal' => $tgl,
    //                 'id_staff' => $staff,
    //                 'status_radiologi' => 1,
    //             );

    //             $this->M_IGD->insert_radiologi($data, 'tindakan_radiologi');
    //             $out['status'] = "success";
    //         }
    //     }

    //     echo json_encode($out);
    // }
    public function tampil_list_radiologi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_IGD->selectDataRadiologiById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 1) {
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
                $status = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
            } else {

                $status = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            }
            if ($data[$i]->keterangan == null || $data[$i]->keterangan == '') {
                $download = "";
            } else {
                $download = '<a class="btn btn-success btn-xs" href="' . base_url('Poli/download_expertise/' . $data[$i]->id_tindakan_radiologi) . '"><span class="fas fa-pencil-alt"></span> Download</a></div>';
            }

            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            // $total = "Rp. " . number_format($data[$i]->total, 0, ',', '.');
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;
            $gambar = null;
            foreach (explode(',', $data[$i]->gambar) as $image) { // 1, 2, 3
                $gambar .= "<img src='".base_url('assets/images/'). $image . "' class='img-responsive zoom'><br>";
            }
            $ket = $data[$i]->keterangan;
            $a = $tombol;
            $b = $status;

            $out[$i] = array($no, $download, $nama, $tanggal, $harga, $frek, $id_staff, $staff_konf, $gambar, $ket, $b, $a);
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
        $data = $this->M_IGD->Total_Radiologi_Byid($id_pelayanan);
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
    public function hapus_data_radiologi()
    {
        $id_tindakan_radiologi = $this->input->post('id_tindakan_radiologi');
        $this->M_IGD->delete_radiologi($id_tindakan_radiologi);
        $out['status'] = "success";
        echo json_encode($out);
    }
    // End

    // Labor

    public function get_labor()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_IGD->selectDataPasienIGDby_id($id_pelayanan, $id_history);
        $db1 = $this->M_IGD->cekJumTindakanLab($id_pelayanan);
        $count = count($db1);
        if (count($db) > 0) {
            $data = $db[0];
            $db = array(
                'status_dt' => 'found',
                'data' => $data,
                'countTin' => $count
            );
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }


    // public function insert_labor()
    // {
    //     $data = $this->session->userdata('data_auth');

    //     $id_pel_lab = $this->input->post('id_pel_lab');
    //     $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pel_lab])->row();
    //     if ($pelayanan->status_rawat == 'selesai') {
    //         $out['status'] = "Pasien sudah dicheckout";
    //     } else {
    //         $id_form_lab = $this->input->post('id_form_lab');
    //         $id_tindakan_labor = $this->input->post('id');
    //         $harga = $this->input->post('harga');
    //         $id_list_tindakan = $this->input->post('id_list_tindakan');
    //         $frek = $this->input->post('frek');
    //         $total = $this->input->post('total');
    //         $tgl = date("Y-m-d H:i:s");
    //         $staff = $data->id_staff;
    //         if ($frek == 0) {
    //             $out['status'] = "error";
    //         } else {
    //             $data = array(
    //                 'id_tindakan_labor' => $id_tindakan_labor,
    //                 'harga' => $harga,
    //                 'frek' => $frek,
    //                 'id_pelayanan' => $id_pel_lab,
    //                 'id_form_labor' => $id_form_lab,
    //                 'id_list_tindakan' => $id_list_tindakan,
    //                 'total' => $total,
    //                 'tanggal' => $tgl,
    //                 'id_staff' => $staff,
    //                 'status_labor' => 1,
    //                 'cara_masuk' => "UGD",
    //             );

    //             $this->M_IGD->insert_labor($data, 'tindakan_labor');
    //             $out['status'] = "success";

    //             // $id_pelayanan = $this->input->post('id_pel_lab');
    //             // $id_history = $this->input->post('id_his_lab');
    //             // $count = array(
    //             //     'tindakan_labor' => 1,
    //             // );
    //             // $this->M_Poli->insert_req_kasir($id_pelayanan, $id_history, $count);
    //             // $out['status'] = "success";
    //         }
    //     }
    //     echo json_encode($out);
    // }
    public function tampil_list_labor()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_IGD->selectDataLaborById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            $param = array('ID' => $data[$i]->id_form_labor);
            $labor = json_decode($this->curl->simple_get($this->api . '/kontak', $param));
            if (empty($labor)) {
                $labor = '0';
            } else {
                $labor = '1';
            }
            $dblabor = $this->db->get_where('form_labor', array('id_form_labor' => $data[$i]->id_form_labor, 'status !=' => 99))->row();

            if ($dblabor->status == 0 && $labor == '0') {
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
                // $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            } else {
                $tombol = "";
            }

            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;
            $tombol = $tombol;

            $out[$i] = array($no, $tombol, $nama, $tanggal, $harga, $frek, $id_staff, $staff_konf);
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

    public function tampil_total_labor()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_IGD->Total_Labor_Byid($id_pelayanan);
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
    public function hapus_data_labor()
    {
        $id_tindakan_labor = $this->input->post('id_tindakan_labor');
        $this->M_IGD->delete_labor($id_tindakan_labor);
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function insertAntrian()
    {
        $tgl =  date("Y-m-d H:i:s");
        $data = $this->session->userdata('data_auth');
        $jenis = $data->tipe;
        $id_pelayanan = $this->input->post('id_pelayanan');
        $out = null;
        $id_antrian = uniqid();
        $i = 0;
        $no_antri = $this->M_IGD->getAntrian();
        if (count($no_antri) > 0) {
            $page_data = array(
                'inisial' => 't',
                'no_antri' =>    $no_antri[$i]->no_antri + 1,
                'jenis' => $jenis,
                'id_pelayanan' => $id_pelayanan,
                'tanggal' => $tgl,
                'status' => 0,
            );
            $this->M_IGD->insert_tindakan($page_data, 'antrian_farmasi');
        } else {
            $page_data = array(
                'inisial' => 't',
                'no_antri' => 1,
                'jenis' => $jenis,
                'id_pelayanan' => $id_pelayanan,
                'tanggal' => $tgl,
                'status' => 0,
            );
            $this->M_IGD->insert_tindakan($page_data, 'antrian_farmasi');
        }
    }
    public function print_antrian_apotik()
    {
        $data_staff = $this->session->userdata('data_auth');
        $jenis = $data_staff->tipe;
        $data['nama'] = "IGD";

        $i = 0;
        $antrian = $this->M_IGD->getAntrian();
        $data['inisial'] = 't';
        $data['no_antri'] = $antrian[$i]->no_antri;

        $this->load->view('print/cetak_antrian_apotik', $data);
    }
    public function cekTindakanObat()
    {

        $id_pelayanan = $this->input->post('id_pelayanan');
        $db1 = $this->M_IGD->cekJumTindakanObat($id_pelayanan);
        $count = count($db1);

        // print_arr($db1) ;
        echo json_encode($count);
        exit;
    }

    public function Laporan_igd()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_igd';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function insert_obat()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:sa");
        $depo = $this->input->post('depo');
        $id_tindakan = uniqid();
        $id_logistik = $this->input->post('id_list_tindakan');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
        if ($pelayanan->status_rawat == 'selesai') {
            $out['status'] = "Pasien sudah dicheckout";
        } else {
            $db_list = $this->db->get_where('list_logistik',['id_logistik'=>$id_logistik])->row();

            $page_data = array(
                'id_tindakan_farmasi' =>  $id_tindakan,
                'harga' => $this->input->post('harga'),
                'harga_persediaan' => $db_list->harga_persediaan,
                'frek' => $this->input->post('frek'),
                'frek_req' => $this->input->post('frek'),
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_resep' => $this->input->post('id_resep'),
                'jenis_pelayanan' => 'IGD',
                'id_list_tindakan' => $this->input->post('id_list_tindakan'),
                'total' => $this->input->post('total'),
                'tipe' => "NON",
                'jumlah_racikan' => 0,
                'kadaluarsa' => $this->input->post('expire'),
                'tanggal' => $tgl,
                'id_staff' => $data->id_staff,
                'id_signa' => $this->input->post('signa'),
                'id_cara_pakai' => $this->input->post('cara_pakai'),
                'depo' => $depo,
                'hna' => $this->input->post('harga'),
                'margin' => $this->input->post('margin'),
                'disc' => $this->input->post('disc'),
                'keterangan' => $this->input->post('ket'),
            );

            if ($depo == 'APOTIK') {
                $obat = $this->M_Apotik->getSumObatApotik($this->input->post('id_list_tindakan'));
                if ($obat['stok'] < $this->input->post('frek')) {
                    $out['status'] = "error";
                } else {
                    $stok = array(
                        'id_stok' => uniqid(),
                        'id_logistik' => $this->input->post('id_list_tindakan'),
                        'tgl' => $tgl,
                        'keterangan' => "KELUAR",
                        'frek' => $this->input->post('jumlahKurang'),
                        'kadaluarsa' => $this->input->post('expire'),
                        'asal_tujuan' => "PENJUALAN",
                        'id_req' =>  $id_tindakan,
                        'id_staff' => $data->id_staff,
                        'id_resep' => $this->input->post('id_resep'),
                    );
                    $this->M_Poli->insert_tindakan($page_data, 'tindakan_farmasi');
                    $this->M_Apotik->insert_tindakan($stok, 'stok_apotik');

                    $this->M_Apotik->update_perencanaan($id_logistik, 'stok_apotik', 'pr_apotik');
                    $out['status'] = "success";
                }
            } else if ($depo == 'IGD') {
                $obat = $this->M_Apotik->getSumObatIgd($this->input->post('id_list_tindakan'));
                if ($obat['stok'] < $this->input->post('frek')) {
                    $out['status'] = "error";
                } else {
                    $stok = array(
                        'id_stok' => uniqid(),
                        'id_logistik' => $this->input->post('id_list_tindakan'),
                        'tgl' => $tgl,
                        'keterangan' => "KELUAR",
                        'frek' => $this->input->post('jumlahKurang'),
                        'kadaluarsa' => $this->input->post('expire'),
                        'asal_tujuan' => "PENJUALAN",
                        'id_req' =>  $id_tindakan,
                        'id_staff' => $data->id_staff,
                        'id_resep' => $this->input->post('id_resep'),
                    );
                    $this->M_Poli->insert_tindakan($page_data, 'tindakan_farmasi');
                    $this->M_Apotik->insert_tindakan($stok, 'stok_igd');

                    $this->M_Apotik->update_perencanaan($id_logistik, 'stok_igd', 'pr_igd');
                    $out['status'] = "success";
                }
            } else {
                $obat = $this->M_Apotik->getSumObatRanap($this->input->post('id_list_tindakan'));
                if ($obat['stok'] < $this->input->post('frek')) {
                    $out['status'] = "error";
                } else {
                    $stok = array(
                        'id_stok' => uniqid(),
                        'id_logistik' => $this->input->post('id_list_tindakan'),
                        'tgl' => $tgl,
                        'keterangan' => "KELUAR",
                        'frek' => $this->input->post('jumlahKurang'),
                        'kadaluarsa' => $this->input->post('expire'),
                        'asal_tujuan' => "PENJUALAN",
                        'id_req' =>  $id_tindakan,
                        'id_staff' => $data->id_staff,
                        'id_resep' => $this->input->post('id_resep'),
                    );
                    $this->M_Poli->insert_tindakan($page_data, 'tindakan_farmasi');
                    $this->M_Apotik->insert_tindakan($stok, 'stok_depo');

                    $this->M_Apotik->update_perencanaan($id_logistik, 'stok_depo', 'pr_depo');
                    $out['status'] = "success";
                }
            }
            // $out['status'] = "success";
            // $id_pelayanan = $this->input->post('id_pelayanan');
            // $id_history = $this->input->post('id_history');
            // $count = array(
            //     'tindakan_farmasi' => 1,
            // );
            // $this->M_Poli->insert_req_kasir($id_pelayanan, $id_history,$count);
            // $out['status'] = "success";
        }
        echo json_encode($out);
    }

    //erm
    public function erm_igd()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_erm_igd';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_erm_igd()
    {
        $data = $this->session->userdata('data_auth');

        if ($this->input->post('tipe') == 'range') {
            $page_data = $this->M_IGD->selectERMRange($this->input->post('mulai'), $this->input->post('akhir'));
        } else {
            $page_data = $this->M_IGD->selectERM();
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $erm = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('erm_igd/form_riwayat/' . $page_data[$i]->id_pelayanan . '/' . $page_data[$i]->id_history) . "><i class='icon-note'></i></a>";
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
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $erm, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $cara_bayar, $diagnosa, $dokter);
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

    public function insert_obatR()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        $tgl =  date("Y-m-d H:i:s");
        //$depo = $this->input->post('depo');
        $id_tindakan = uniqid();
        $id_logistik = $this->input->post('id_list_tindakan');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
        if ($pelayanan->status_rawat == 'selesai') {
            $out['status'] = "Pasien sudah dicheckout";
        } else {
            $db_list = $this->db->get_where('list_logistik',['id_logistik'=>$id_logistik])->row();

            $page_data = array(
                'id_tindakan_farmasi' =>  $id_tindakan,
                'harga' => $this->input->post('harga'),
                'harga_persediaan' => $db_list->harga_persediaan,
                'frek' => $this->input->post('frek'),
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'poli' => $this->input->post('id_history'),
                'jenis_pelayanan' => 'IGD',
                //'poli' => '-',
                'id_resep' => 'OBAT RUANG',
                'id_list_tindakan' => $this->input->post('id_list_tindakan'),
                'total' => $this->input->post('total'),
                'tipe' => "NON",
                'jumlah_racikan' => 0,
                'kadaluarsa' => $this->input->post('expire'),
                'tanggal' => $tgl,
                'id_staff' => $data->id_staff,
                'id_signa' => $this->input->post('signa'),
                'id_cara_pakai' => $this->input->post('cara_pakai'),
                'depo' => '',
                'hna' => $this->input->post('harga'),
                'margin' => $this->input->post('margin'),
                'disc' => $this->input->post('disc'),
                'keterangan' => $this->input->post('ket'),
            );


            $obat = $this->M_Rawatinap->getSumObat($this->input->post('id_list_tindakan'), 'stok_igd');
            if ($obat['stok'] < $this->input->post('frek')) {
                $out['status'] = "error";
            } else {
                $datastok = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $this->input->post('id_list_tindakan'),
                    'tgl' => $tgl,
                    'keterangan' => "KELUAR",
                    'frek' => $this->input->post('jumlahKurang'),
                    'kadaluarsa' => $this->input->post('expire'),
                    'asal_tujuan' => "PENJUALAN",
                    'id_req' =>  $id_tindakan,
                    'id_staff' => $data->id_staff,
                    'id_resep' => $this->input->post('id_resep'),
                );
                $this->M_Poli->insert_tindakan($page_data, 'tindakan_farmasi');
                $this->M_Apotik->insert_tindakan($datastok, 'stok_igd');

                $this->M_Apotik->update_perencanaan($id_logistik, 'stok_igd', 'pr_igd');
                $out['status'] = "success";
            }
        }
        echo json_encode($out);
    }
    public function tampil_obat()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_IGD->selectObatById($id_pelayanan);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 

            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat1(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->nama .  "\")' '><i class='fa fa-trash '></i></button>";



            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $time = strtotime($page_data[$i]->kadaluarsa);
            $kadaluarsa = strftime("%A, %d %B %Y ", $time);
            $harga_obat = "Rp " . number_format($page_data[$i]->total / $page_data[$i]->frek, 0, ',', '.');
            $jumlah_obat = $page_data[$i]->frek;

            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $staff = $page_data[$i]->staff;


            $out[$i] = array($no, $nama_obat, $kadaluarsa, $harga_obat, $jumlah_obat, $total, $staff, $hapus);
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
    public function print_resep($id_pelayanan, $id_history)
    {
        $data['resep'] = $this->M_IGD->getResepById($id_pelayanan);
        $data['pasien'] = $this->M_IGD->getDataByIdResep($id_pelayanan, $id_history);
        $this->load->view('print/cetak_resep', $data);
    }
    function hapus_obat()
    {
        $id_tindakan = $this->input->post('id');
        $depo = $this->input->post('depo');

        $this->db->delete('tindakan_farmasi', ['id_tindakan_farmasi' => $id_tindakan]);
        $this->db->delete('stok_igd', ['id_req' => $id_tindakan]);
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_list_total_obat()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_IGD->getTotalObat($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $id_tindakan_igd  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $out[$i] = array($id_tindakan_igd);
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

    public function Laporan_tindakan_igd()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_tindakan_igd';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_laporan_igd()
    {
        $data = $this->M_IGD->selectDataLaporanTindakanIgd();
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $no = $i + 1;
            $tindakan = $data[$i]->tindakan;
            $jml = $data[$i]->jml;
            // $total = $data[$i]->total;
            $out[$i] = array($no, $tindakan, $jml);
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

        $data = $this->M_IGD->selectDataRangeLaporanTindakanIgd($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($data); $i++) {

            $no = $i + 1;
            $tindakan = $data[$i]->tindakan;
            $jml = $data[$i]->jml;
            // $total = $data[$i]->total;
            $out[$i] = array($no, $tindakan, $jml);
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

    public function Kriteria_Hais()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Kriteria_Hais';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
}
