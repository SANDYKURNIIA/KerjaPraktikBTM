<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Labor extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Labor');
        $this->load->model('M_mcu');
        $this->load->helper('text');
        $this->api = "http://192.168.87.2:8181/";
        $this->load->library('curl');
    }

    // Rajal
    public function Rajal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Labor-rajal';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    // Print BAYI HARI
    public function Labor_BAYIHARI_Print($id_tindakan_labor)
    {
        $data['print_labor'] = $this->M_Labor->Labor_PrintById_Rajal($id_tindakan_labor);
        $this->load->view('print/labor_bayihari_print', $data);
    }

    // Print BAYI BULAN
    public function Labor_BAYIBULAN_Print($id_tindakan_labor)
    {
        $data['print_labor'] = $this->M_Labor->Labor_PrintById_Rajal($id_tindakan_labor);
        $this->load->view('print/labor_bayibulan_print', $data);
    }

    // Print ANAK
    public function Labor_ANAK_Print($id_tindakan_labor)
    {
        $data['print_labor'] = $this->M_Labor->Labor_PrintById_Rajal($id_tindakan_labor);
        $this->load->view('print/labor_anak_print', $data);
    }

    // Print DEWASA
    public function Labor_DEWASA_Print($id_tindakan_labor)
    {
        $data['print_labor'] = $this->M_Labor->Labor_PrintById_Rajal($id_tindakan_labor);
        $this->load->view('print/labor_dewasa_print', $data);
    }

    // ----------------------------

    // Print All DEWASA
    public function Labor_DEWASA_All_Print($id_pelayanan)
    {
        $data['print_labor'] = $this->M_Labor->Labor_PrintById_All($id_pelayanan);
        $data['print_labor2'] = $this->M_Labor->Labor_PrintById_All2($id_pelayanan);
        $this->load->view('print/labor_dewasa_print_all', $data);
    }

    // Print All ANAK
    public function Labor_ANAK_All_Print($id_pelayanan)
    {
        $data['print_labor'] = $this->M_Labor->Labor_PrintById_All($id_pelayanan);
        $data['print_labor2'] = $this->M_Labor->Labor_PrintById_All2($id_pelayanan);
        $this->load->view('print/labor_anak_print_all', $data);
    }

    // Print All BAYI BULAN
    public function Labor_BULAN_All_Print($id_pelayanan)
    {
        $data['print_labor'] = $this->M_Labor->Labor_PrintById_All($id_pelayanan);
        $data['print_labor2'] = $this->M_Labor->Labor_PrintById_All2($id_pelayanan);
        $this->load->view('print/labor_bayibulan_print_all', $data);
    }

    // Print All BAYI HARI
    public function Labor_HARI_All_Print($id_pelayanan)
    {
        $data['print_labor'] = $this->M_Labor->Labor_PrintById_All($id_pelayanan);
        $data['print_labor2'] = $this->M_Labor->Labor_PrintById_All2($id_pelayanan);
        $this->load->view('print/labor_bayihari_print_all', $data);
    }

    //  End
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
            // $tindakan =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='aksi_labor_dewasa(\"" . $page_data[$i]->id_form_labor . "\")' '><i class='fa fa-rocket '></i></button>";
            $tindakan = '<a class="btn btn-success btn-xs" href="' . base_url('Apelkes/print_labor/' . $page_data[$i]->id_form_labor) . '"><i class="icon-printer"></i></a></div>';

            if ($page_data[$i]->status == 1) {
                $request =   "<button class='btn btn-primary' data-toggle='modal' onclick='selesai(\"" . $page_data[$i]->id_form_labor .  "\")' '>selesai</button>";
            } else {
                $request = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
            }

            $no = $i + 1;
            $diagnosa = $page_data[$i]->diagnosa;
            $ringkasan = $page_data[$i]->ringkasan;
            $keterangan = $page_data[$i]->keterangan;
            $time = strtotime($page_data[$i]->tgl);
            $tgl = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $out[$i] = array($no, $tindakan, $tombol, $request, $hapus, $tgl, $waktu, $diagnosa, $ringkasan, $keterangan);
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
    public function tampil_form_labor_mcu()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $page_data = $this->M_Labor->selectDataPasienMcuById($id_pelayanan);
        // $page_data = $this->db->get_where('form_labor_mcu', array('id_mcu' => $id_pelayanan))->result();

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_labor(\"" . $page_data[$i]->id_form_labor . "\")' '><i class='fa fa-rocket '></i></button>";
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_form_labor(\"" . $page_data[$i]->id_form_labor .  "\")' '><i class='fa fa-trash '></i></button>";
            $tindakan = '<a class="btn btn-success btn-xs" href="' . base_url('Apelkes/print_labor_mcu/' . $page_data[$i]->id_form_labor) . '"><i class="icon-printer"></i></a></div>';

            if ($page_data[$i]->status == 1) {
                $request =   "<button class='btn btn-primary' data-toggle='modal' onclick='selesai(\"" . $page_data[$i]->id_form_labor .  "\")' '>selesai</button>";
            } else {
                $request = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
            }

            $no = $i + 1;
            $diagnosa = $page_data[$i]->diagnosa;
            $ringkasan = $page_data[$i]->ringkasan;
            $keterangan = $page_data[$i]->keterangan;
            $time = strtotime($page_data[$i]->tgl);
            $tgl = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $out[$i] = array($no, $tindakan, $tombol, $request, $hapus, $tgl, $waktu, $diagnosa, $ringkasan, $keterangan);
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
    // ----------------------------

    public function tampil_datarajal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $page_data = $this->M_Labor->selectDataPasienRawatJalan();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $time1 = strtotime($page_data[$i]->tgl_request);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $tgl_req = $date1;
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
            $alamat = $page_data[$i]->alamat . ',' . $page_data[$i]->kelurahan . ',' . $page_data[$i]->kecamatan . ',' . $page_data[$i]->kota . ',' . $page_data[$i]->provinsi;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $alamat, $tgl_req, $waktu1, $ruang, $no_hp, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk,  $dokter, $tgl_masuk, $jam_masuk, $cara_bayar, $keterangan, $no_sep, $diagnosa, $agama);
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

    public function getdata_formById_Labor()
    {
        $id_tindakan = $this->input->post('tindakan');
        $db = $this->M_Labor->selectDataFormById_Labor($id_tindakan);

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

    // Labor Dewasa
    public function tampil_all_labor_dewasa()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Labor->selectDataLaborById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {

            if ($data[$i]->ket == 1) {
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_tindakan_labor_dewasa(\""  .  $data[$i]->id_tindakan_labor . "\")'>Selengkapnya</a>";
                $status = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
                $tombol = "<a class='btn btn-primary btn-icon-anim btn square' href='Labor_DEWASA_Print/" . $data[$i]->id_tindakan_labor . "'><i class='icon-printer'></i></a>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor_DEWASA(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            } else {
                $detail = "<a style='color:blue; cursor:pointer;' onclick='detail_tindakan_labor_dewasa(\""  .  $data[$i]->id_tindakan_labor . "\")'>Selengkapnya</a>";
                $tombol = "<button class='btn btn-success btn-icon-anim btn square' onclick='aksi_labor_dewasa(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\""  . $data[$i]->id_list_tindakan . "\")' '><i class='icon-rocket'></i></button>";
                $status = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor_DEWASA(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            }

            $keta = $data[$i]->keterangan;
            $sub_ket = word_limiter($keta, 3);
            $hasil_keta = $sub_ket . " &nbsp;" . $detail;

            $ring = $data[$i]->ringkasan;
            $sub_ring = word_limiter($ring, 3);
            $hasil_ring = $sub_ring . " &nbsp;" . $detail;

            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime('%H:%M WIB', $time);

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $id_staff = $data[$i]->staff;
            $staff_konf = $data[$i]->staff_konf;

            $out[$i] = array($no, $nama, $tanggal, $waktu, $harga, $frek, $id_staff, $staff_konf, $hasil_ring, $hasil_keta, $hapus);
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
    // End

    // Labor Hari Sendiri
    public function tampil_all_labor_hari_sendiri()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Labor->selectDataLaborSendiriById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {

            if ($data[$i]->ket == 1) {
                $status = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
                $tombol = "<a class='btn btn-primary btn-icon-anim btn square' href='Labor_BAYIHARI_Print/" . $data[$i]->id_tindakan_labor . "'><i class='icon-printer'></i></a>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor_HARI(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            } else {
                $tombol = "<button class='btn btn-success btn-icon-anim btn square' onclick='aksi_labor_hari(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\""  . $data[$i]->id_list_tindakan . "\")' '><i class='icon-rocket'></i></button>";
                $status = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor_HARI(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            }

            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $id_staff = $data[$i]->staff;

            $out[$i] = array($no, $tombol, $status, $nama, $tanggal, $harga, $frek, $id_staff, $hapus);
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
    // End

    // Labor Bulan Sendiri
    public function tampil_all_labor_bulan_sendiri()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Labor->selectDataLaborSendiriById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {

            if ($data[$i]->ket == 1) {
                $status = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
                $tombol = "<a class='btn btn-primary btn-icon-anim btn square' href='Labor_BAYIBULAN_Print/" . $data[$i]->id_tindakan_labor . "'><i class='icon-printer'></i></a>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor_BULAN(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            } else {
                $tombol = "<button class='btn btn-success btn-icon-anim btn square' onclick='aksi_labor_bulan(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\""  . $data[$i]->id_list_tindakan . "\")' '><i class='icon-rocket'></i></button>";
                $status = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor_BULAN(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            }

            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $id_staff = $data[$i]->staff;

            $out[$i] = array($no, $tombol, $status, $nama, $tanggal, $harga, $frek, $id_staff, $hapus);
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
    // End

    // Labor Anak Sendiri
    public function tampil_all_labor_anak_sendiri()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Labor->selectDataLaborMcuById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {

            if ($data[$i]->ket == 1) {
                $status = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
                $tombol = "<a class='btn btn-primary btn-icon-anim btn square' href='Labor_ANAK_Print/" . $data[$i]->id_tindakan_labor . "'><i class='icon-printer'></i></a>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor_ANAK(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            } else {
                $tombol = "<button class='btn btn-success btn-icon-anim btn square' onclick='aksi_labor_anak(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\""  . $data[$i]->id_daftar_tindakan . "\")' '><i class='icon-rocket'></i></button>";
                $status = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor_ANAK(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            }

            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);
            $waktu = strftime('%H:%M WIB', $time);

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $id_staff = $data[$i]->staff;

            $out[$i] = array($no, $nama, $tanggal, $waktu, $harga, $frek, $id_staff, $hapus);
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
    // End

    // Labor Dewasa Sendiri
    public function tampil_all_labor_dewasa_sendiri()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Labor->selectDataLaborSendiriById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {

            if ($data[$i]->ket == 1) {
                $status = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
                $tombol = "<a class='btn btn-primary btn-icon-anim btn square' href='Labor_DEWASA_Print/" . $data[$i]->id_tindakan_labor . "'><i class='icon-printer'></i></a>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor_DEWASA(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            } else {
                $tombol = "<button class='btn btn-success btn-icon-anim btn square' onclick='aksi_labor_dewasa(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\""  . $data[$i]->id_list_tindakan . "\")' '><i class='icon-rocket'></i></button>";
                $status = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor_DEWASA(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
            }

            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $id_staff = $data[$i]->staff;

            $out[$i] = array($no, $tombol, $status, $nama, $tanggal, $harga, $frek, $id_staff, $hapus);
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
    // End

    //MCU
    public function mcu()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Labor-mcu';
        $page_data['tindakan_labor'] = $this->M_Labor->selectNamaLabor();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_datamcu()
    {
        date_default_timezone_set('Asia/Jakarta');
        $page_data = $this->M_Labor->selectDataPasienMcu();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_mcu . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tanggal);
            $date2 = strftime(' %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime(' %d %B %Y ', $tgl);

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama_pasien;

            $jk = $page_data[$i]->sex;
            $occupation = $page_data[$i]->occupation;
            $badgeno = $page_data[$i]->badge_no;
            $blood_group = $page_data[$i]->blood_group;
            $out[$i] = array($no, $tindakan, $no_rm, $nama, $date2, $waktu, $jk, $date3, $umur, $occupation, $badgeno, $blood_group);
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

    //

    // Ranap
    public function Ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Labor-ranap';
        $page_data['tindakan_labor'] = $this->M_Labor->selectNamaLabor();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_dataranap()
    {
        $page_data = $this->M_Labor->selectDataPasienRanap();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');

            $tindakan = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\",\"" . $umr . "\",\"" . $umur . "\",\"" . $page_data[$i]->jenis_kelamin . "\",\"" . $page_data[$i]->tipe . "\")'><i class='icon-rocket'></i></button>";

            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime('%A, %d %B %Y ', $time);

            $waktu = strftime('%H:%M WIB', $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime('%A, %d %B %Y ', $tgl);

            $time1 = strtotime($page_data[$i]->tgl_request);
            $date1 = strftime('%A, %d %B %Y ', $time1);
            $waktu1 = strftime('%H:%M WIB', $time1);

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan';

            $no = $i + 1;
            $no_rm =  '' . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $tgl_req = $date1;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->tipe;
            $dokter = $page_data[$i]->nama_dokter;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $alamat = $page_data[$i]->alamat . ',' . $page_data[$i]->kelurahan . ',' . $page_data[$i]->kecamatan . ',' . $page_data[$i]->kota . ',' . $page_data[$i]->provinsi;

            $out[$i] = array($no, $tindakan, $no_rm, $nama, $alamat, $tgl_req, $waktu1, $ruang, $jenis_kelamin, $tgl_lahir, $umur, $tgl_masuk, $jam_masuk, $cara_masuk,  $cara_bayar, $diagnosa, $dokter);
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

    public function tampil_ranap_labor()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Labor->selectDataLaborById($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {

            $tombol = "<button class='btn btn-success btn-icon-anim btn square' onclick='hapus_labor(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $id_pelayanan . "\",\"" . $data[$i]->nama . "\")' '><i class='icon-rocket'></i></button>";

            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $id_staff = $data[$i]->staff;
            $tombol = $tombol;

            $out[$i] = array($no, $tombol, $nama, $tanggal, $harga, $frek, $id_staff,);
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

    public function insert_tindakan()
    {
        $data = $this->session->userdata('data_auth');
        $id_pel_lab = $this->input->post('id_pel_lab');
        $id_tindakan_labor = $this->input->post('id');
        $harga = $this->input->post('harga');
        $id_list_tindakan = $this->input->post('id_list_tindakan');
        $frek = $this->input->post('frek');
        $total = $this->input->post('total');
        $tgl = date("Y-m-d H:i:s");
        $staff = $data->id_staff;
        if ($frek == 0) {
            $out['status'] = "error";
        } else {
            $data = array(
                'id_tindakan_labor' => $id_tindakan_labor,
                'harga' => $harga,
                'frek' => $frek,
                'id_pelayanan' => $id_pel_lab,
                'id_list_tindakan' => $id_list_tindakan,
                'total' => $total,
                'tanggal' => $tgl,
                'id_staff' => $staff,
            );

            $this->M_Labor->insert_tindakan($data, 'tindakan_labor');
            $out['status'] = "success";
        }
        echo json_encode($out);
    }
    // End RANAP

    // Pasien Labor
    public function pasienlabor()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Labor-pasienlabor';
        $page_data['tindakan_labor'] = $this->M_Labor->selectNamaLabor();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    // Pasien Labor Login labor

    public function laborpasien()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Labor-Pasien';
        $page_data['tindakan_labor'] = $this->M_Labor->selectNamaLabor();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_pasien_labor()
    {
        $page_data = $this->M_Labor->selectDataPasienLabor();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');

            $labor = "<button class='btn btn-success btn-icon-anim btn-square' onclick='aksi_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\",\"" . $umr . "\",\"" . $umur . "\",\"" . $page_data[$i]->jenis_kelamin . "\")'><i class='icon-rocket'></i></button>";
            $t = $page_data[$i]->tindakan;
            $l = $page_data[$i]->tindakan_labor;
            $r = $page_data[$i]->tindakan_radiologi;
            $f = $page_data[$i]->tindakan_farmasi;
            if ($l == 0) {
                $kasir = "<span class='label label-danger capitalize-font inline-block'>Klik tombol N/A terlebih dahulu<span>";
            } else if ($page_data[$i]->status == 1) {
                $kasir = "<span class='label label-success capitalize-font inline-block'>REQUESTED<span>";
            } else {
                $kasir = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='edit_kasir(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-dollar'></i></button>";
            }

            $db1 = $this->M_Labor->cekJumTindakan($page_data[$i]->id_pelayanan);
            $count = count($db1);
            if ($count > 0) {

                $na = "<span class='label label-success capitalize-font inline-block'>Sudah ada tindakan<span>";
                if ($page_data[$i]->status == 1) {
                    $kasir = "<span class='label label-success capitalize-font inline-block'>REQUESTED<span>";
                } else {
                    $kasir = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='edit_kasir(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-dollar'></i></button>";
                }
            } else if ($count == 0 && $l == 1) {
                $na = "<span class='label label-success capitalize-font inline-block'>Sudah ada tindakan<span>";
            } else {
                $na = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='edit_na(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")'><i class='fa fa-thumb-tack'></i></button>";
            }
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
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $out[$i] = array($no, $labor, $na, $kasir, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $diagnosa, $dokter);
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
    //LAPORAN LABOR
    public function laporan_laboratorium()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_laboratorium';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_laporan_laboratorium()
    {
        date_default_timezone_set('Asia/Jakarta');
        $page_data = $this->M_Labor->selectLaporanLaboratorium();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $no_rm = $page_data[$i]->no_rm;
            $nama = $page_data[$i]->nama;
            $cara_bayar = $page_data[$i]->caraBayar;
            $tindakan = $page_data[$i]->tindakan;
            $harga = $page_data[$i]->harga;
            $harga_cost = $page_data[$i]->harga_cost;
            $frek = $page_data[$i]->frek;
            $total = $page_data[$i]->total;
            $out[$i] = array($no, $tanggal, $no_rm, $nama, $cara_bayar, $tindakan, $harga, $harga_cost, $frek, $total);
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

    // Tampil Pasien Labor untuk login labor
    //Get data Labor Login labor
    public function tampil_pasien_labor2()
    {
        $page_data = $this->M_Labor->selectDataPasienLabor2();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';
            $umr = $interval->format('%Y') . '' . $interval->format('%M') . '' . $interval->format('%D');

            $labor = "<button class='btn btn-success btn-icon-anim btn-square' onclick='aksi_data_tindakan(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\",\"" . $umr . "\",\"" . $umur . "\",\"" . $page_data[$i]->jenis_kelamin . "\")'><i class='icon-rocket'></i></button>";




            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $time1 = strtotime($page_data[$i]->tgl_request);
            $date4 = strftime("%A, %d %B %Y ", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);
            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $no = $i + 1;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $no_rm =  "" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $cara_masuk = $page_data[$i]->jenis_pelayanan;
            $ruang = $page_data[$i]->poli;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $out[$i] = array($no, $labor,  $tgl_masuk, $jam_masuk, $date4, $waktu1, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $diagnosa, $dokter);
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


    public function tampil_range_laporan_laboratorium()
    {
        date_default_timezone_set('Asia/Jakarta');
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $page_data = $this->M_Labor->selectRangeLaporanLaboratorium($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $no_rm = $page_data[$i]->no_rm;
            $nama = $page_data[$i]->nama;
            $cara_bayar = $page_data[$i]->caraBayar;
            $tindakan = $page_data[$i]->tindakan;
            $harga = $page_data[$i]->harga;
            $harga_cost = $page_data[$i]->harga_cost;
            $frek = $page_data[$i]->frek;
            $total = $page_data[$i]->total;
            $out[$i] = array($no, $tanggal, $no_rm, $nama, $cara_bayar, $tindakan, $harga, $harga_cost, $frek, $total);
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
    public function laporan_tindakan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_tindakan_labor';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_laporan_tindakan_labor()
    {
        date_default_timezone_set('Asia/Jakarta');
        $page_data = $this->M_Labor->selectTindakanLabor();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tindakan = $page_data[$i]->tindakan;
            $tipe = $page_data[$i]->kamar;
            $jumlah = $page_data[$i]->jml;
            $harga = $page_data[$i]->harga;
            $total = $page_data[$i]->total;
            $out[$i] = array($no, $tindakan, $jumlah, $harga, $total);
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
    public function tampil_range_tindakan_labor()
    {
        date_default_timezone_set('Asia/Jakarta');
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $page_data = $this->M_Labor->selectRangeTindakanLabor($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tindakan = $page_data[$i]->tindakan;
            $tipe = $page_data[$i]->kamar;
            $jumlah = $page_data[$i]->jml;
            $harga = $page_data[$i]->harga;
            $total = $page_data[$i]->total;
            $out[$i] = array($no, $tindakan, $jumlah, $harga, $total);
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

    // Get Data All Modal
    public function get_labor()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_history = $this->input->post('history');
        $db = $this->M_Labor->selectDataPasienLaborBy_id($id_pelayanan, $id_history);
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

    public function insert_labor()
    {
        $data = $this->session->userdata('data_auth');

        $id_pel_lab = $this->input->post('id_pel_lab');
        $id_tindakan_labor = $this->input->post('id');
        $harga = $this->input->post('harga');
        $id_list_tindakan = $this->input->post('id_list_tindakan');
        $frek = $this->input->post('frek');
        $total = $this->input->post('total');
        $tgl = date("Y-m-d H:i:s");
        $staff = $data->id_staff;
        if ($frek == 0) {
            $out['status'] = "error";
        } else {
            $data = array(
                'id_tindakan_labor' => $id_tindakan_labor,
                'harga' => $harga,
                'frek' => $frek,
                'id_pelayanan' => $id_pel_lab,
                'id_list_tindakan' => $id_list_tindakan,
                'total' => $total,
                'tanggal' => $tgl,
                'id_staff' => $staff,
                'status_labor' => 1,
            );
        }

        $this->M_Labor->insert_labor($data, 'tindakan_labor');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function hapus_data_labor()
    {
        $id_tindakan_labor = $this->input->post('id_tindakan_labor');
        $this->M_Labor->delete_labor($id_tindakan_labor);
        $out['status'] = "success";
        echo json_encode($out);
    }
    // End


    // INSERT LABOR HARI

    public function post_labor_rajal()
    {
        $inTindakan = $this->input->post('id_form');
        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['files']['name']);
        $getDataImages = [
            'success' => [],
            'error' => []
        ];
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['file']['name'] = $files['files']['name'][$i];
            $_FILES['file']['type'] = $files['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $files['files']['error'][$i];
            $_FILES['file']['size'] = $files['files']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
                $getDataImages['success'][] = [
                    'response' => ['status' => 'success'],
                    'data' => $data['upload_data']['file_name'],
                ];
            } else {
                $getDataImages['error'][] = [
                    'response' => ['status' => 'failed'],
                    'data' => $_FILES['file']['name'],
                ];
            }
        }

        $success = $getDataImages['success'];
        $error = $getDataImages['error'];
        foreach ($success as $successData) {
            $alldata =  [
                'jam_periksa'  => $this->input->post('jam_periksa'),
                'file'  => implode(',', array_map(function ($val) {
                    return $val['data'];
                }, $success)),
                'jam_sample'  => $this->input->post('jam_sample'),
                'ket'  => $inJumlah = $this->input->post('keterangan'),
                'status'  => 1,
                'tgl_respon' => date("Y-m-d H:i:s"),
            ];
            $this->M_Labor->insert_labor_request($inTindakan, $alldata);
        }

        echo json_encode(['status' => ['success' => count($success), 'error' => count($error)]]);
    }
    private function set_upload_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = "./assets/file-upload";
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 5048000; //5 mb
        $config['overwrite']     = FALSE;

        return $config;
    }

    // ALL

    public function getLaborById()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $id_tindakan_labor = $this->input->post('tindakan');

        $db = $this->M_Labor->getLaborById($id_pelayanan, $id_tindakan_labor);
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
    public function getPasienById()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');

        $db = $this->db->query("SELECT p.nama,LPAD(p.no_rm, 6, '0') no_rm,p.no_bpjs from pelayanan b, pasien p where b.id_pasien = p.no_rm and b.id_pelayanan ='$id_pelayanan'")->result();
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


    // Tampilin data total nya
    public function tampil_total_labor()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Labor->Total_Labor_Byid($id_pelayanan);
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
    public function tampil_total_labor_mcu()
    {
        $id_mcu = $this->input->post('id_pelayanan');
        $data = $this->M_mcu->Total_Labor_Byid($id_mcu);
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
    public function tampil_total_labor_sendiri()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Labor->Total_Labor_Sendiri_Byid($id_pelayanan);
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
    // End Tampilin data total nya

    // End



    // Laporan  Labor
    public function Laporan_labor()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Labor_laporan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_laporan()
    {
        $data = $this->M_Labor->selectDataLaporanLabor();
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
            $out[$i] = array($no, $tgl, $no_rm, $nama, $cara_bayar, $tindakan, $harga, $harga_cost, $frek, $total);
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

        $data = $this->M_Labor->selectDataRangeLaporanLabor($mulai, $akhir);
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
            $out[$i] = array($no, $tgl, $no_rm, $nama, $cara_bayar, $tindakan, $harga, $harga_cost, $frek, $total);
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
    // End

    // Laporan Tindakan Labor
    public function Laporan_tindakan_labor()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Labor_laporan_tindakan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_laporan_tindakan()
    {
        $data = $this->M_Labor->selectDataLaporanTindakanLabor();
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

        $data = $this->M_Labor->selectDataRangeLaporanTindakanLabor($mulai, $akhir);
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
    // End

    // Riwayat Pasien
    public function Riwayat_pasien()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Labor_riwayat_pasien';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_riwayat_pasien()
    {
        $data = $this->M_Labor->selectDataRiwayatLabor();
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

            $out[$i] = array($no, $tindakan, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $diagnosa, $dokter);
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

        $data = $this->M_Labor->selectDataRiwayatLaborRange($mulai, $akhir);
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

            $out[$i] = array($no, $tindakan, $tgl_masuk, $jam_masuk, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $cara_masuk, $ruang, $cara_bayar, $diagnosa, $dokter);
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
    public function selesai_labor($inTindakan)
    {
        $alldata =  [
            'status'  => 2,
            'tgl_respon' => date("Y-m-d H:i:s"),
        ];
        $this->M_Labor->insert_labor_request($inTindakan, $alldata);
        header('Location: ../laborpasien');
    }
    public function selesai_labor_rajal()
    {
        $inTindakan = $this->input->post("id");
        $alldata =  [
            'status'  => 2,
            'tgl_respon' => date("Y-m-d H:i:s"),
        ];
        $this->M_Labor->insert_labor_request($inTindakan, $alldata);
        // header('Location: ../Rajal');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function selesai_labor1($inTindakan)
    {
        $alldata =  [
            'status'  => 2,
            'tgl_respon' => date("Y-m-d H:i:s"),
        ];
        $where = [
            'id_form_labor' => $inTindakan
        ];

        $this->M_Labor->update($alldata, $where, 'form_labor');

        $out['status'] = "success";
        echo json_encode($out);
    }
    // End

    public function Laporan_kunjungan_labor_poli()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan_labor_poli';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_kunjungan_labor_poli()
    {

        $page_data = $this->M_Labor->selectLaporanKunjunganLabor();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $bpjs = $this->M_Labor->getJumlahPasienLabor('BPJS', $page_data[$i]->tgl_masuk);
            $umum = $this->M_Labor->getJumlahPasienLabor('UMUM', $page_data[$i]->tgl_masuk);
            $timah = $this->M_Labor->getJumlahPasienLabor('TIMAH', $page_data[$i]->tgl_masuk);
            $mitra = $this->M_Labor->getJumlahPasienLabor('MITRA', $page_data[$i]->tgl_masuk);
            $internal = $this->M_Labor->getJumlahPasienLabor('INTERNAL', $page_data[$i]->tgl_masuk);
            $lainnya = $this->M_Labor->getJumlahPasienLabor('LAINNYA', $page_data[$i]->tgl_masuk);

            $tgl_masuk = $page_data[$i]->tgl_masuk;
            $bpjs = $bpjs->total;
            $umum = $umum->total;
            $timah = $timah->total;
            $mitra = $mitra->total;
            $internal = $internal->total;
            $lainnya = $lainnya->total;

            $out[$i] = array($no, $tgl_masuk, $bpjs, $umum, $timah, $mitra, $internal, $lainnya);
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

    public function Tampil_Range_kunjungan_labor()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        // $pelayanan = $this->input->post('jenis_pelayanan');

        $page_data = $this->M_Labor->selectRangeLaporanKunjunganLabor($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;

            $bpjs = $this->M_Labor->getJumlahPasienLabor('BPJS', $page_data[$i]->tgl_masuk);
            $umum = $this->M_Labor->getJumlahPasienLabor('UMUM', $page_data[$i]->tgl_masuk);
            $timah = $this->M_Labor->getJumlahPasienLabor('TIMAH', $page_data[$i]->tgl_masuk);
            $mitra = $this->M_Labor->getJumlahPasienLabor('MITRA', $page_data[$i]->tgl_masuk);
            $internal = $this->M_Labor->getJumlahPasienLabor('INTERNAL', $page_data[$i]->tgl_masuk);
            $lainnya = $this->M_Labor->getJumlahPasienLabor('LAINNYA', $page_data[$i]->tgl_masuk);

            // $id_dokter = $page_data[$i]->id_dokter;
            //var_dump($id_dokter);
            // $bpjs = $this->M_Labor->getJumlahPasienLabor('BPJS', $page_data[$i]->tgl_masuk);
            // $umum = $this->M_Labor->getJumlahPasienLabor('UMUM', $page_data[$i]->tgl_masuk);
            // $timah = $this->M_Labor->getJumlahPasienLabor('TIMAH', $page_data[$i]->tgl_masuk);
            // $mitra = $this->M_Labor->getJumlahPasienLabor('MITRA', $page_data[$i]->tgl_masuk);
            // $internal = $this->M_Labor->getJumlahPasienLabor('INTERNAL', $page_data[$i]->tgl_masuk);
            // $lainnya = $this->M_Labor->getJumlahPasienLabor('LAINNYA', $page_data[$i]->tgl_masuk);
            //$jenis_pelayanan = $page_data[$i]->jenis_pelayanan;


            // $dokter = $page_data[$i]->nama;
            $tgl_masuk = $page_data[$i]->tgl_masuk;
            $bpjs = $bpjs->total;
            $umum = $umum->total;
            $timah = $timah->total;
            $mitra = $mitra->total;
            $internal = $internal->total;
            $lainnya = $lainnya->total;

            //$dokter, $poli,

            $out[$i] = array($no, $tgl_masuk, $bpjs, $umum, $timah, $mitra, $internal, $lainnya);
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

    public function Laporan_kunjungan_labor_igd()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan_labor_igd';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_kunjungan_labor_igd()
    {

        $page_data = $this->M_Labor->selectLaporanKunjunganLaborIgd();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $bpjs = $this->M_Labor->getJumlahPasienLaborIgd('BPJS', $page_data[$i]->tgl_masuk);
            $umum = $this->M_Labor->getJumlahPasienLaborIgd('UMUM', $page_data[$i]->tgl_masuk);
            $timah = $this->M_Labor->getJumlahPasienLaborIgd('TIMAH', $page_data[$i]->tgl_masuk);
            $mitra = $this->M_Labor->getJumlahPasienLaborIgd('MITRA', $page_data[$i]->tgl_masuk);
            $internal = $this->M_Labor->getJumlahPasienLaborIgd('INTERNAL', $page_data[$i]->tgl_masuk);
            $lainnya = $this->M_Labor->getJumlahPasienLaborIgd('LAINNYA', $page_data[$i]->tgl_masuk);

            $tgl_masuk = $page_data[$i]->tgl_masuk;
            $bpjs = $bpjs->total;
            $umum = $umum->total;
            $timah = $timah->total;
            $mitra = $mitra->total;
            $internal = $internal->total;
            $lainnya = $lainnya->total;

            $out[$i] = array($no, $tgl_masuk, $bpjs, $umum, $timah, $mitra, $internal, $lainnya);
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

    public function Tampil_Range_kunjungan_labor_igd()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        // $pelayanan = $this->input->post('jenis_pelayanan');

        $page_data = $this->M_Labor->selectRangeLaporanKunjunganLaborIgd($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;

            $bpjs = $this->M_Labor->getJumlahPasienLaborIgd('BPJS', $page_data[$i]->tgl_masuk);
            $umum = $this->M_Labor->getJumlahPasienLaborIgd('UMUM', $page_data[$i]->tgl_masuk);
            $timah = $this->M_Labor->getJumlahPasienLaborIgd('TIMAH', $page_data[$i]->tgl_masuk);
            $mitra = $this->M_Labor->getJumlahPasienLaborIgd('MITRA', $page_data[$i]->tgl_masuk);
            $internal = $this->M_Labor->getJumlahPasienLaborIgd('INTERNAL', $page_data[$i]->tgl_masuk);
            $lainnya = $this->M_Labor->getJumlahPasienLaborIgd('LAINNYA', $page_data[$i]->tgl_masuk);

            // $id_dokter = $page_data[$i]->id_dokter;
            //var_dump($id_dokter);
            // $bpjs = $this->M_Labor->getJumlahPasienLabor('BPJS', $page_data[$i]->tgl_masuk);
            // $umum = $this->M_Labor->getJumlahPasienLabor('UMUM', $page_data[$i]->tgl_masuk);
            // $timah = $this->M_Labor->getJumlahPasienLabor('TIMAH', $page_data[$i]->tgl_masuk);
            // $mitra = $this->M_Labor->getJumlahPasienLabor('MITRA', $page_data[$i]->tgl_masuk);
            // $internal = $this->M_Labor->getJumlahPasienLabor('INTERNAL', $page_data[$i]->tgl_masuk);
            // $lainnya = $this->M_Labor->getJumlahPasienLabor('LAINNYA', $page_data[$i]->tgl_masuk);
            //$jenis_pelayanan = $page_data[$i]->jenis_pelayanan;


            // $dokter = $page_data[$i]->nama;
            $tgl_masuk = $page_data[$i]->tgl_masuk;
            $bpjs = $bpjs->total;
            $umum = $umum->total;
            $timah = $timah->total;
            $mitra = $mitra->total;
            $internal = $internal->total;
            $lainnya = $lainnya->total;

            //$dokter, $poli,

            $out[$i] = array($no, $tgl_masuk, $bpjs, $umum, $timah, $mitra, $internal, $lainnya);
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

    public function Laporan_kunjungan_labor_ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan_labor_ranap';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_kunjungan_labor_ranap()
    {

        $page_data = $this->M_Labor->selectLaporanKunjunganLaborRanap();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $bpjs = $this->M_Labor->getJumlahPasienLaborRanap('BPJS', $page_data[$i]->tgl_masuk);
            $umum = $this->M_Labor->getJumlahPasienLaborRanap('UMUM', $page_data[$i]->tgl_masuk);
            $timah = $this->M_Labor->getJumlahPasienLaborRanap('TIMAH', $page_data[$i]->tgl_masuk);
            $mitra = $this->M_Labor->getJumlahPasienLaborRanap('MITRA', $page_data[$i]->tgl_masuk);
            $internal = $this->M_Labor->getJumlahPasienLaborRanap('INTERNAL', $page_data[$i]->tgl_masuk);
            $lainnya = $this->M_Labor->getJumlahPasienLaborRanap('LAINNYA', $page_data[$i]->tgl_masuk);

            $tgl_masuk = $page_data[$i]->tgl_masuk;
            $bpjs = $bpjs->total;
            $umum = $umum->total;
            $timah = $timah->total;
            $mitra = $mitra->total;
            $internal = $internal->total;
            $lainnya = $lainnya->total;

            $out[$i] = array($no, $tgl_masuk, $bpjs, $umum, $timah, $mitra, $internal, $lainnya);
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

    public function Tampil_Range_kunjungan_labor_ranap()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        // $pelayanan = $this->input->post('jenis_pelayanan');

        $page_data = $this->M_Labor->selectRangeLaporanKunjunganLaborRanap($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;

            $bpjs = $this->M_Labor->getJumlahPasienLaborRanap('BPJS', $page_data[$i]->tgl_masuk);
            $umum = $this->M_Labor->getJumlahPasienLaborRanap('UMUM', $page_data[$i]->tgl_masuk);
            $timah = $this->M_Labor->getJumlahPasienLaborRanap('TIMAH', $page_data[$i]->tgl_masuk);
            $mitra = $this->M_Labor->getJumlahPasienLaborRanap('MITRA', $page_data[$i]->tgl_masuk);
            $internal = $this->M_Labor->getJumlahPasienLaborRanap('INTERNAL', $page_data[$i]->tgl_masuk);
            $lainnya = $this->M_Labor->getJumlahPasienLaborRanap('LAINNYA', $page_data[$i]->tgl_masuk);


            // $dokter = $page_data[$i]->nama;
            $tgl_masuk = $page_data[$i]->tgl_masuk;
            $bpjs = $bpjs->total;
            $umum = $umum->total;
            $timah = $timah->total;
            $mitra = $mitra->total;
            $internal = $internal->total;
            $lainnya = $lainnya->total;

            //$dokter, $poli,

            $out[$i] = array($no, $tgl_masuk, $bpjs, $umum, $timah, $mitra, $internal, $lainnya);
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

    public function Laporan_kunjungan_labor_mcu()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan_labor_mcu';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_kunjungan_labor_mcu()
    {

        $page_data = $this->M_Labor->selectLaporanKunjunganLaborMcu();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tgl_masuk = $page_data[$i]->tanggal;
            $bpjs = $page_data[$i]->BPJS;
            $umum = $page_data[$i]->UMUM;
            $timah = $page_data[$i]->TIMAH;
            $mitra = $page_data[$i]->PERUSAHAAN_MITRA;
            $internal = $page_data[$i]->INTERNAL_RSBT;
            $lainnya = $page_data[$i]->ASURANSI_LAIN;
            $pendapatan = $page_data[$i]->pendapatan;

            $out[$i] = array($no, $tgl_masuk, $bpjs, $umum, $timah, $mitra, $internal, $lainnya, $pendapatan);
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

    public function Tampil_Range_kunjungan_labor_mcu()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        // $pelayanan = $this->input->post('jenis_pelayanan');

        $page_data = $this->M_Labor->selectRangeLaporanKunjunganLaborMcu($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;

           
            $tgl_masuk = $page_data[$i]->tanggal;
            $bpjs = $page_data[$i]->BPJS;
            $umum = $page_data[$i]->UMUM;
            $timah = $page_data[$i]->TIMAH;
            $mitra = $page_data[$i]->PERUSAHAAN_MITRA;
            $internal = $page_data[$i]->INTERNAL_RSBT;
            $lainnya = $page_data[$i]->ASURANSI_LAIN;
            $pendapatan = $page_data[$i]->pendapatan;

            //$dokter, $poli,

            $out[$i] = array($no, $tgl_masuk, $bpjs, $umum, $timah, $mitra, $internal, $lainnya, $pendapatan);
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

    //pendapatan
    public function laporan_pendapatan_labor()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pendapatan_labor';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pendapatan_labor()
    {
        $page_data = $this->M_Labor->selectLaporanPendapatanLabor();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            // $id_dokter = $page_data[$i]->id_dokter;
            //var_dump($id_dokter);


            // $dokter = $page_data[$i]->nama;
            // $poli = $page_data[$i]->poli;
            $tgl_masuk = $page_data[$i]->tanggal;
            $jml_pemeriksaan = $page_data[$i]->jml_pemeriksaan;
            $pendapatan = $page_data[$i]->pendapatan;
            //$dokter, $poli,

            $out[$i] = array($no, $tgl_masuk, $jml_pemeriksaan, $pendapatan);
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

    public function Tampil_Range_pendapatan_labor()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $cara_bayar = $this->input->post('cara_bayar');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');

        $page_data = $this->M_Labor->selectRangeLaporanpendapatanLabor($mulai, $akhir, $cara_bayar, $jenis_pelayanan);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            // $id_dokter = $page_data[$i]->id_dokter;
            //var_dump($id_dokter);



            // $dokter = $page_data[$i]->nama;
            $tgl_masuk = $page_data[$i]->tanggal;
            $jml_pemeriksaan = $page_data[$i]->jml_pemeriksaan;
            $pendapatan = $page_data[$i]->pendapatan;
            //$dokter, $poli,

            $out[$i] = array($no, $tgl_masuk, $jml_pemeriksaan, $pendapatan);
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


    //pasien hiv
    public function laporan_pasien_hiv()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pasien_hiv';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pasien_hiv()
    {
        $page_data = $this->M_Labor->selectLaporanPasienhiv();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $no_rm = $page_data[$i]->no_rm;
            $pasien = $page_data[$i]->pasien;
            $nik = $page_data[$i]->nik;
            $tgl_lahir = $page_data[$i]->tgl_lahir;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $dokter = $page_data[$i]->dokter;
            $id_form = $page_data[$i]->id_form_labor;

            $param = array('ono' => 'A' . $id_form);
            $labor = json_decode($this->curl->simple_get($this->api . 'RESULTS', $param));

            if ($labor != "") {
                $group = array();
                foreach ($labor[0]->RESULT as $row) {
                    $group[$row->GROUP][] = $row;
                    foreach ($group as $key => $value) {
                        foreach ($value as $k) {
                            if ($k->TESTCODE == "AHIVR") {
                                if ($k->VALUE != "null") {
                                    $hasil = $k->VALUE;
                                } else {
                                    $hasil = "";
                                }
                            }
                        }
                    }
                }
                if ($labor[0]->DIAGNOSA != "null") {
                    $diagnosa = $labor[0]->DIAGNOSA;
                } else {
                    $diagnosa = "";
                }
            } else {
                $diagnosa = "";
                $hasil = "";
            }

            //$dokter, $poli,

            $out[$i] = array($no, $tanggal, $no_rm, $pasien, $nik, $tgl_lahir, $jenis_kelamin, $alamat, $jenis_pelayanan, $dokter, $diagnosa, $hasil);
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

    public function Tampil_Range_pasien_hiv()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');


        $page_data = $this->M_Labor->selectRangeLaporanPasienhiv($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $tanggal = $page_data[$i]->tanggal;
            $no_rm = $page_data[$i]->no_rm;
            $pasien = $page_data[$i]->pasien;
            $nik = $page_data[$i]->nik;
            $tgl_lahir = $page_data[$i]->tgl_lahir;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $dokter = $page_data[$i]->dokter;
            $id_form = $page_data[$i]->id_form_labor;

            $param = array('ono' => 'A' . $id_form);
            $labor = json_decode($this->curl->simple_get($this->api . 'RESULTS', $param));
            // print_arr($labor);
            if ($labor != "" && isset($labor[0]->RESULT)) {
                $group = array();
                foreach ($labor[0]->RESULT as $row) {
                    $group[$row->GROUP][] = $row;
                    foreach ($group as $key => $value) {
                        foreach ($value as $k) {
                            if ($k->TESTCODE == "AHIVR") {
                                if ($k->VALUE != "null") {
                                    $hasil = $k->VALUE;
                                } else {
                                    $hasil = "";
                                }
                            }
                        }
                    }
                }
                if ($labor[0]->DIAGNOSA != "null") {
                    $diagnosa = $labor[0]->DIAGNOSA;
                } else {
                    $diagnosa = "";
                }
            } else {
                $diagnosa = "";
                $hasil = "";
            }

            //$dokter, $poli,

            $out[$i] = array($no, $tanggal, $no_rm, $pasien, $nik, $tgl_lahir, $jenis_kelamin, $alamat, $jenis_pelayanan, $dokter, $diagnosa, $hasil);
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

    public function laporan_pasien_gram()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pasien_gram';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pasien_gram()
    {
        $page_data = $this->M_Labor->selectLaporanPasienGram();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $no_rm = $page_data[$i]->no_rm;
            $pasien = $page_data[$i]->pasien;
            $nik = $page_data[$i]->nik;
            $tgl_lahir = $page_data[$i]->tgl_lahir;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $dokter = $page_data[$i]->dokter;
            $id_form = $page_data[$i]->id_form_labor;

            $param = array('ono' => 'A' . $id_form);
            $labor = json_decode($this->curl->simple_get($this->api . 'RESULTS', $param));

            if ($labor != "") {
                $group = array();
                foreach ($labor[0]->RESULT as $row) {
                    $group[$row->GROUP][] = $row;
                    foreach ($group as $key => $value) {
                        foreach ($value as $k) {
                            if ($k->TESTCODE == "PWGR") {
                                if ($k->VALUE != "null") {
                                    $hasil = $k->VALUE;
                                } else {
                                    $hasil = "";
                                }
                            }
                        }
                    }
                }
                if ($labor[0]->DIAGNOSA != "null") {
                    $diagnosa = $labor[0]->DIAGNOSA;
                } else {
                    $diagnosa = "";
                }
            } else {
                $diagnosa = "";
                $hasil = "";
            }

            //$dokter, $poli,

            $out[$i] = array($no, $tanggal, $no_rm, $pasien, $nik, $tgl_lahir, $jenis_kelamin, $alamat, $jenis_pelayanan, $dokter, $diagnosa, $hasil);
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

    public function Tampil_Range_pasien_gram()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');


        $page_data = $this->M_Labor->selectRangeLaporanPasienGram($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $tanggal = $page_data[$i]->tanggal;
            $no_rm = $page_data[$i]->no_rm;
            $pasien = $page_data[$i]->pasien;
            $nik = $page_data[$i]->nik;
            $tgl_lahir = $page_data[$i]->tgl_lahir;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $dokter = $page_data[$i]->dokter;
            $id_form = $page_data[$i]->id_form_labor;

            $param = array('ono' => 'A' . $id_form);
            $labor = json_decode($this->curl->simple_get($this->api . 'RESULTS', $param));
            // print_arr($labor);
            if ($labor != "" && isset($labor[0]->RESULT)) {
                $group = array();
                foreach ($labor[0]->RESULT as $row) {
                    $group[$row->GROUP][] = $row;
                    foreach ($group as $key => $value) {
                        foreach ($value as $k) {
                            if ($k->TESTCODE == "PWGR") {
                                if ($k->VALUE != "null") {
                                    $hasil = $k->VALUE;
                                } else {
                                    $hasil = "";
                                }
                            }
                        }
                    }
                }
                if ($labor[0]->DIAGNOSA != "null") {
                    $diagnosa = $labor[0]->DIAGNOSA;
                } else {
                    $diagnosa = "";
                }
            } else {
                $diagnosa = "";
                $hasil = "";
            }

            //$dokter, $poli,

            $out[$i] = array($no, $tanggal, $no_rm, $pasien, $nik, $tgl_lahir, $jenis_kelamin, $alamat, $jenis_pelayanan, $dokter, $diagnosa, $hasil);
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
    //malaria
    public function laporan_pasien_malaria()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pasien_malaria';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pasien_malaria()
    {
        $page_data = $this->M_Labor->selectLaporanPasienMalaria();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $no_rm = $page_data[$i]->no_rm;
            $pasien = $page_data[$i]->pasien;
            $nik = $page_data[$i]->nik;
            $tgl_lahir = $page_data[$i]->tgl_lahir;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $dokter = $page_data[$i]->dokter;
            $id_form = $page_data[$i]->id_form_labor;

            $param = array('ono' => 'A' . $id_form);
            // $param = array('ono' => $id_form);
            $labor = json_decode($this->curl->simple_get($this->api . 'RESULTS', $param));

            if ($labor != "") {
                $group = array();
                foreach ($labor[0]->RESULT as $row) {
                    $group[$row->GROUP][] = $row;
                    foreach ($group as $key => $value) {
                        foreach ($value as $k) {
                            if ($k->TESTCODE == "MALER") {
                                if ($k->VALUE != "null") {
                                    $hasil = $k->VALUE;
                                } else {
                                    $hasil = "";
                                }
                            }
                        }
                    }
                }
                if ($labor[0]->DIAGNOSA != "null") {
                    $diagnosa = $labor[0]->DIAGNOSA;
                } else {
                    $diagnosa = "";
                }
            } else {
                $diagnosa = "";
                $hasil = "";
            }

            //$dokter, $poli,

            $out[$i] = array($no, $tanggal, $no_rm, $pasien, $nik, $tgl_lahir, $jenis_kelamin, $alamat, $jenis_pelayanan, $dokter, $diagnosa, $hasil);
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

    public function Tampil_Range_pasien_malaria()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');


        $page_data = $this->M_Labor->selectRangeLaporanPasienMalaria($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $tanggal = $page_data[$i]->tanggal;
            $no_rm = $page_data[$i]->no_rm;
            $pasien = $page_data[$i]->pasien;
            $nik = $page_data[$i]->nik;
            $tgl_lahir = $page_data[$i]->tgl_lahir;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $dokter = $page_data[$i]->dokter;
            $id_form = $page_data[$i]->id_form_labor;

            $param = array('ono' => 'A' . $id_form);
            // $param = array('ono' => $id_form);
            $labor = json_decode($this->curl->simple_get($this->api . 'RESULTS', $param));
            if ($labor != "") {
                $group = array();
                foreach ($labor[0]->RESULT as $row) {
                    $group[$row->GROUP][] = $row;
                    foreach ($group as $key => $value) {
                        foreach ($value as $k) {
                            if ($k->TESTCODE == "MALER") {
                                if ($k->VALUE != "null") {
                                    $hasil = $k->VALUE;
                                } else {
                                    $hasil = "";
                                }
                            }
                        }
                    }
                }
                if ($labor[0]->DIAGNOSA != "null") {
                    $diagnosa = $labor[0]->DIAGNOSA;
                } else {
                    $diagnosa = "";
                }
            } else {
                $diagnosa = "";
                $hasil = "";
            }

            //$dokter, $poli,

            $out[$i] = array($no, $tanggal, $no_rm, $pasien, $nik, $tgl_lahir, $jenis_kelamin, $alamat, $jenis_pelayanan, $dokter, $diagnosa, $hasil);
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

    //Pasien covid
    public function laporan_pasien_covid()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pasien_covid';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pasien_covid()
    {
        $page_data = $this->M_Labor->selectLaporanPasienCovid();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $no_rm = $page_data[$i]->no_rm;
            $pasien = $page_data[$i]->pasien;
            $nik = $page_data[$i]->nik;
            $tgl_lahir = $page_data[$i]->tgl_lahir;
            $klaim = $page_data[$i]->cara_bayar;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $dokter = $page_data[$i]->dokter;
            $id_form = $page_data[$i]->id_form_labor;

            $param = array('ono' => 'A' . $id_form);
            // $param = array('ono' => $id_form);
            $labor = json_decode($this->curl->simple_get($this->api . 'RESULTS', $param));

            if ($labor != "") {
                $group = array();
                foreach ($labor[0]->RESULT as $row) {
                    $group[$row->GROUP][] = $row;
                    foreach ($group as $key => $value) {
                        foreach ($value as $k) {
                            if ($k->TESTCODE == "COVIDA") {
                                if ($k->VALUE != "null") {
                                    $hasil = $k->VALUE;
                                } else {
                                    $hasil = "";
                                }
                            }
                        }
                    }
                }
                if ($labor[0]->DIAGNOSA != "null") {
                    $diagnosa = $labor[0]->DIAGNOSA;
                } else {
                    $diagnosa = "";
                }
            } else {
                $diagnosa = "";
                $hasil = "";
            }

            //$dokter, $poli,

            $out[$i] = array($no, $tanggal, $no_rm, $pasien, $nik, $klaim, $tgl_lahir, $jenis_kelamin, $alamat, $jenis_pelayanan, $dokter, $diagnosa, $hasil);
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

    public function Tampil_Range_pasien_covid()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');


        $page_data = $this->M_Labor->selectRangeLaporanPasienCovid($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $tanggal = $page_data[$i]->tanggal;
            $no_rm = $page_data[$i]->no_rm;
            $pasien = $page_data[$i]->pasien;
            $nik = $page_data[$i]->nik;
            $klaim = $page_data[$i]->cara_bayar;
            $tgl_lahir = $page_data[$i]->tgl_lahir;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $dokter = $page_data[$i]->dokter;
            $id_form = $page_data[$i]->id_form_labor;

            $param = array('ono' => 'A' . $id_form);
            // $param = array('ono' => $id_form);
            $labor = json_decode($this->curl->simple_get($this->api . 'RESULTS', $param));
            // print_r($labor);
            if ($labor != "") {
                $group = array();
                if (isset($labor[0]->RESULT)) {
                    foreach ($labor[0]->RESULT as $row) {
                        $group[$row->GROUP][] = $row;
                        foreach ($group as $key => $value) {
                            foreach ($value as $k) {
                                if ($k->TESTCODE == "COVIDA" || $k->TESTCODE == "COVID") {
                                    if ($k->VALUE != "null") {
                                        $hasil = $k->VALUE;
                                    } else {
                                        $hasil = "";
                                    }
                                }
                            }
                        }
                    }
                    if ($labor[0]->DIAGNOSA != "null") {
                        $diagnosa = $labor[0]->DIAGNOSA;
                    } else {
                        $diagnosa = "";
                    }
                } else {
                    $diagnosa = "";
                    $hasil = "";
                }
            } else {
                $diagnosa = "";
                $hasil = "";
            }

            //$dokter, $poli,

            $out[$i] = array($no, $tanggal, $no_rm, $pasien, $nik, $klaim, $tgl_lahir, $jenis_kelamin, $alamat, $jenis_pelayanan, $dokter, $diagnosa, $hasil);
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

    //BTA
    public function laporan_pasien_bta()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pasien_bta';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pasien_bta()
    {
        $page_data = $this->M_Labor->selectLaporanPasienBta();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $no_rm = $page_data[$i]->no_rm;
            $pasien = $page_data[$i]->pasien;
            $nik = $page_data[$i]->nik;
            $tgl_lahir = $page_data[$i]->tgl_lahir;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $dokter = $page_data[$i]->dokter;
            $nama_tindakan = $page_data[$i]->nama_tindakan;
            $id_form = $page_data[$i]->id_form_labor;

            $param = array('ono' => 'A' . $id_form);
            // $param = array('ono' => $id_form);
            $labor = json_decode($this->curl->simple_get($this->api . 'RESULTS', $param));

            if ($labor != "") {
                $group = array();
                foreach ($labor[0]->RESULT as $row) {
                    $group[$row->GROUP][] = $row;
                    foreach ($group as $key => $value) {
                        foreach ($value as $k) {
                            if ($k->TESTCODE == "BTA1" || $k->TESTCODE == "BTAS3X") {
                                if ($k->VALUE != "null") {
                                    $hasil = $k->VALUE;
                                } else {
                                    $hasil = "";
                                }
                            }
                        }
                    }
                }
                if ($labor[0]->DIAGNOSA != "null") {
                    $diagnosa = $labor[0]->DIAGNOSA;
                } else {
                    $diagnosa = "";
                }
            } else {
                $diagnosa = "";
                $hasil = "";
            }

            //$dokter, $poli,

            $out[$i] = array($no, $tanggal, $no_rm, $pasien, $nik, $tgl_lahir, $jenis_kelamin, $alamat, $jenis_pelayanan, $nama_tindakan, $dokter, $diagnosa, $hasil);
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

    public function Tampil_Range_pasien_bta()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');


        $page_data = $this->M_Labor->selectRangeLaporanPasienBta($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;


            $tanggal = $page_data[$i]->tanggal;
            $no_rm = $page_data[$i]->no_rm;
            $pasien = $page_data[$i]->pasien;
            $nik = $page_data[$i]->nik;
            $tgl_lahir = $page_data[$i]->tgl_lahir;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $nama_tindakan = $page_data[$i]->nama_tindakan;
            $dokter = $page_data[$i]->dokter;
            $id_form = $page_data[$i]->id_form_labor;

            $param = array('ono' => 'A' . $id_form);
            // $param = array('ono' => $id_form);
            $labor = json_decode($this->curl->simple_get($this->api . 'RESULTS', $param));
            if ($labor != "") {
                $group = array();
                foreach ($labor[0]->RESULT as $row) {
                    $group[$row->GROUP][] = $row;
                    foreach ($group as $key => $value) {
                        foreach ($value as $k) {
                            if ($k->TESTCODE == "BTA1" || $k->TESTCODE == "BTAS3X") {
                                if ($k->VALUE != "null") {
                                    $hasil = $k->VALUE;
                                } else {
                                    $hasil = "";
                                }
                            }
                        }
                    }
                }
                if ($labor[0]->DIAGNOSA != "null") {
                    $diagnosa = $labor[0]->DIAGNOSA;
                } else {
                    $diagnosa = "";
                }
            } else {
                $diagnosa = "";
                $hasil = "";
            }

            //$dokter, $poli,

            $out[$i] = array($no, $tanggal, $no_rm, $pasien, $nik, $tgl_lahir, $jenis_kelamin, $alamat, $jenis_pelayanan, $nama_tindakan, $dokter, $diagnosa, $hasil);
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

    public function laporan_pasien_biopsi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pasien_biopsi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pasien_biopsi()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Labor->selectRangeLaporanPasienBiopsi($first_date, $second_date);
        } else {
            $page_data = $this->M_Labor->selectLaporanPasienBiopsi();
        }


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $no_rm = $page_data[$i]->no_rm;
            $pasien = $page_data[$i]->pasien;
            $nik = $page_data[$i]->nik;
            $tgl_lahir = $page_data[$i]->tgl_lahir;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $dokter = $page_data[$i]->dokter;
            $id_form = $page_data[$i]->id_form_labor;

            $param = array('ono' => 'A' . $id_form);
            // $param = array('ono' => $id_form);
            $labor = json_decode($this->curl->simple_get($this->api . 'RESULTS', $param));

            if ($labor != "") {
                $group = array();
                foreach ($labor[0]->RESULT as $row) {
                    $group[$row->GROUP][] = $row;
                    foreach ($group as $key => $value) {
                        foreach ($value as $k) {
                            if ($k->TESTCODE == "BIOPK") {
                                if ($k->VALUE != "null") {
                                    $hasil = $k->VALUE;
                                } else {
                                    $hasil = "";
                                }
                            }
                        }
                    }
                }
                if ($labor[0]->DIAGNOSA != "null") {
                    $diagnosa = $labor[0]->DIAGNOSA;
                } else {
                    $diagnosa = "";
                }
            } else {
                $diagnosa = "";
                $hasil = "";
            }

            //$dokter, $poli,

            $out[$i] = array($no, $tanggal, $no_rm, $pasien, $nik, $tgl_lahir, $jenis_kelamin, $alamat, $jenis_pelayanan, $dokter, $diagnosa, $hasil);
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
}
