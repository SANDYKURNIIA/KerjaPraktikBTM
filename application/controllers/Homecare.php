<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Homecare extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Homecare');
        $this->load->model('M_Rawatinap');
        $this->load->model('M_IGD');
        $this->load->model('M_Apotik');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Poli');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['tindakan_mcu'] = $this->M_Homecare->selectNamaMcu();
        $page_data['perawat'] = $this->M_Homecare->selectPerawat();
        $page_data['obat'] = $this->M_Rawatinap->getNamaObat();
        $page_data['cara_bayar'] = $this->M_Pencarian_Pasien->getCaraBayar();
        $page_data['obatruang'] = $this->M_Homecare->getNamaObat();
		$page_data['data_dokter'] = $this->M_IGD->selectNamaDPJP();
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $page_data['signaobat'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat_biasa'] = $this->M_Apotik->getCaraPakai();
        $page_data['jenis_pelayanan'] = 'Homecare';
        $page_data['url_resep'] = 'Homecare/tampil_resep';
        $page_data['page_content'] = 'page_content/Homecare';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function insert_pasien()
    {
        $nama = $this->input->post('nama');
        $keterangan = $this->input->post('keterangan');
        $tgl_lahir = $this->input->post('birthday');
        $jk = $this->input->post('sex');
        $no_hp = $this->input->post('no_hp');
        $cara_bayar = $this->input->post('cara_bayar');
        $alamat = $this->input->post('alamat');
        $jenis_layanan = $this->input->post('layanan');
        $id_pasien =  uniqid();
        $data = array(
            'id_pasien' => $id_pasien,
            'nama' => $nama,
            'keterangan' => $keterangan,
            'tanggal' => date('Y-m-d H:i:s'),
            'tgl_lahir' => $tgl_lahir,
            'jk' => $jk,
            'cara_bayar' => $cara_bayar,
            'no_hp' => $no_hp,
            'jenis_layanan' => 'HOMECARE',
            'alamat' => $alamat,
        );

        $data6 = array(
            'id_req' => uniqid(),
            'id_pasien' => $id_pasien,
        );
        $data7 = array(
            'id_detail' => uniqid(),
            'id_pasien' => $id_pasien,
        );
        $this->M_Homecare->insert_mcu($data,  'homecare');
        $this->M_Homecare->insert_mcu($data6, 'req_kasir_homecare');
        $this->M_Homecare->insert_mcu($data7, 'detail_kasir_homecare');
        $out['status'] = 'success';
        echo json_encode($out);
    }


    public function edit_detail($id_mcu)
    {
        $this->load->view('assets/_header');
        $page_data['data_dokter'] = $this->M_Homecare->selectNamaDokter();
        $page_data['data_mcu'] = $this->M_Homecare->getMCUById($id_mcu);
        $this->load->view('page_content/Detail_mcu', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Data_MCU()
    {
        date_default_timezone_set('Asia/Jakarta');
        $page_data = $this->M_Homecare->selectMCUhariini();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $edit = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_mcu(\"" . $page_data[$i]->id_pasien . "\")'><i class='icon-rocket'></i></button>";


            if ($page_data[$i]->status == 1) {
                $kasir = "<span class='label label-success capitalize-font inline-block'>REQUESTED<i class=''></i><span>";
            } else if ($page_data[$i]->status == 0) {
                $kasir = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='insert_kasir(\"" . $page_data[$i]->id_pasien . "\")'><i class='fa fa-dollar'></i></button>";
            }
            if ($page_data[$i]->status_bayar == 1) {
                $bayar = "<span class='label label-success capitalize-font inline-block'>SUDAH BAYAR<i class=''></i><span>";
            } else {
                $bayar = "<span class='label label-warning capitalize-font inline-block'>BELUM BAYAR<i class=''></i><span>";
            }


            $obat = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_obat(\"" . $page_data[$i]->id_pasien . "\")'><i class='fa fa-medkit'></i></button>";
            $obatRuangan = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_obat1(\"" . $page_data[$i]->id_pasien . "\")'><i class='fa fa-medkit'></i></button>";
            $hapus = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='delete_mcu(\"" . $page_data[$i]->id_pasien . "\",\"" . $page_data[$i]->nama . "\")' '><i class='fa fa-trash '></i></button>";
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $nama = $page_data[$i]->nama;
            $jk = $page_data[$i]->jk;
            $tgl_lahir = $page_data[$i]->tgl_lahir;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $no_hp = $page_data[$i]->no_hp;
            $alamat = $page_data[$i]->alamat;
            $keterangan = $page_data[$i]->keterangan;
            $jenis_layanan = $page_data[$i]->jenis_layanan;
            $out[$i] = array($no, $hapus,  $edit, $obat, $obatRuangan, $kasir, $bayar, $nama, $tanggal, $jenis_layanan, $jk, $keterangan, $cara_bayar, $tgl_lahir, $no_hp, $alamat);
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

    public function laporan_kunjungan_mcu()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_kunjungan_mcu';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_kunjungan_mcu()
    {
        date_default_timezone_set('Asia/Jakarta');
        $page_data = $this->M_Homecare->selectKunjunganMcu();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $nama = $page_data[$i]->nama_pasien;
            $jk = $page_data[$i]->sex;
            $tgl_lahir = $page_data[$i]->tgl_lahir;
            $occupation = $page_data[$i]->occupation;
            $badgeno = $page_data[$i]->badge_no;
            $blood_group = $page_data[$i]->blood_group;
            $perusahaan = $page_data[$i]->perusahaan;
            $out[$i] = array($no, $nama, $tanggal, $jk, $tgl_lahir, $occupation, $badgeno, $blood_group, $perusahaan);
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
    public function tampil_range_kunjungan_mcu()
    {
        date_default_timezone_set('Asia/Jakarta');
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $page_data = $this->M_Homecare->selectRangeKunjunganMcu($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $nama = $page_data[$i]->nama_pasien;
            $jk = $page_data[$i]->sex;
            $tgl_lahir = $page_data[$i]->tgl_lahir;
            $occupation = $page_data[$i]->occupation;
            $badgeno = $page_data[$i]->badge_no;
            $blood_group = $page_data[$i]->blood_group;
            $perusahaan = $page_data[$i]->perusahaan;
            $out[$i] = array($no, $nama, $tanggal, $jk, $tgl_lahir, $occupation, $badgeno, $blood_group, $perusahaan);
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

    //TINDAKAN-------------------------------------------------------------------
    public function get_mcu()
    {
        $id_mcu = $this->input->post('id_mcu');
        $db = $this->M_Homecare->selectDataPasienMCUby_id($id_mcu);
        if (count($db) > 0) {
            $data = $db[0];
            $db = array(
                'status_dt' => 'found',
                'data' => $data,
            );
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    public function insert_mcu()
    {
        $data = $this->session->userdata('data_auth');
        $harga = $this->input->post('harga');
        $id_list_tindakan = $this->input->post('id_list_tindakan');
        $frek = $this->input->post('frek');
        $total = $this->input->post('total');
        $nama_dokter = $this->input->post('nama_dokter');
        $tgl = date("Y-m-d H:i:sa");
        $id_mcu = $this->input->post('id_mcu');
        $staff = $data->id_staff;

        $data = array(
            'id_tindakan' => uniqid(),
            'id_list_tindakan' => $id_list_tindakan,
            'id_perawat' => $this->input->post('perawat'),
            'id_pasien' => $id_mcu,
            'tanggal' => date("Y-m-d H:i:s"),
            'harga' => $harga,
            'frek' => $frek,
            'total' => $total,
            'tanggal' => $tgl,
            'nama_dokter' => $nama_dokter,
            'id_staff' => $staff,
        );
        $this->M_Homecare->insert_mcu($data, 'tindakan_homecare');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_list()
    {
        $id_mcu = $this->input->post('id_mcu');
        $data = $this->M_Homecare->selectDataMcuById($id_mcu);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 1) {
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_mcu(\"" . $data[$i]->id_tindakan . "\",\"" . $id_mcu . "\",\"" . $data[$i]->nama_tindakan . "\")' '><i class='fa fa-trash'></i></button>";
                $status = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
            } else {
                $status = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_mcu(\"" . $data[$i]->id_tindakan . "\",\"" . $id_mcu . "\",\"" . $data[$i]->nama_tindakan . "\")' '><i class='fa fa-trash'></i></button>";
            }

            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;
            $nama = $data[$i]->nama_tindakan;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->total, 0, ',', '.');
            $frek = $data[$i]->frek;
            $id_staff = $data[$i]->staff;
            $perawat = $data[$i]->nama_perawat;
            $dokter = $data[$i]->dokter;


            $out[$i] = array($no, $tombol, $nama, $tanggal, $harga, $frek, $perawat, $dokter, $id_staff);
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
    public function tampil_total_mcu()
    {
        $id_mcu = $this->input->post('id_mcu');
        $data = $this->M_Homecare->Total_Mcu_Byid($id_mcu);
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
    public function hapus_data_mcu()
    {
        $id_tindakan_mcu = $this->input->post('id_tindakan_mcu');
        $this->M_Homecare->delete_mcu($id_tindakan_mcu);
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function hapus_mcu()
    {
        $id_tindakan_mcu = $this->input->post('id_tindakan_mcu');
        $this->M_Homecare->delete_tindakan($id_tindakan_mcu, 'id_pasien', 'homecare');
        $this->M_Homecare->delete_tindakan($id_tindakan_mcu, 'id_pasien', 'req_kasir_homecare');
        $this->M_Homecare->delete_tindakan($id_tindakan_mcu, 'id_pasien', 'tindakan_homecare');
        $this->M_Homecare->delete_tindakan($id_tindakan_mcu, 'id_pasien', 'detail_kasir_homecare');
        $out['status'] = "success";
        echo json_encode($out);
    }


    //KASIR---------------------------------------------------------->
    function insert_req_kasir()
    {
        $id_mcu = $this->input->post('id_mcu');
        $data = array(
            'tanggal' => date('Y-m-d H:i:s'),
            'status' => 1,
        );
        $this->M_Homecare->update_kasir($id_mcu, $data);
        $out['status'] = "success";
        echo json_encode($out);
    }

    //Tindakan homecare
    public function tindakan_homecare()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Tindakan_homecare';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_tindakan_homecare()
    {
        $page_data = $this->M_Homecare->selectTindakanHomecare();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_tindakan_homecare(\"" . $page_data[$i]->id_list_tindakan .  "\")'><i class='icon-pencil'></i></a>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama_tindakan;
            $biaya = $page_data[$i]->biaya_sarana;
            $jasa = $page_data[$i]->jasa_transport;
            $total = $jasa + $biaya;
            $status = $page_data[$i]->status;

            $out[$i] = array($edit,  $no,  $nama, $biaya, $jasa, $total, $status);
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    public function getDataTindakanHomecare()
    {
        $id_list_tindakan = $this->input->post('id_list_tindakan');
        $db = $this->M_Homecare->selectDataTindakanHomecare($id_list_tindakan);

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

    public function edit_tindakan_homecare()
    {
        $tindakan = $this->input->post('nama');
        $id = $this->input->post('id');
        $biaya = $this->input->post('biaya_sarana');
        $jasa = $this->input->post('jasa');
        // $total = $this->input->post('total');

        $data = array(
            'id_list_tindakan' => uniqid(),
            'nama_tindakan' => $tindakan,
            'biaya_sarana' => $biaya,
            'jasa_transport' => $jasa,
            'unit_cost' => $jasa,
            'status' => 'AKTIF',
        );
        $out['status'] = "success";
        $this->M_Homecare->update_tindakan($id, $data);
        echo json_encode($out);
    }
    public function insert_tindakan_homecare()
    {
        $data = $this->session->userdata('data_auth');
        $tindakan = $this->input->post('nama');
        $biaya = $this->input->post('biaya_sarana');
        $jasa = $this->input->post('jasa');


        $data = array(
            'id_list_tindakan' => uniqid(),
            'nama_tindakan' => $tindakan,
            'biaya_sarana' => $biaya,
            'jasa_transport' => $jasa,
            'unit_cost' => $jasa,
            'status' => 'AKTIF',
        );
        $this->M_Homecare->insert_tindakan_homecare($data, 'list_tindakan_homecare');
        $out['status'] = "success";
        echo json_encode($out);
    }
    //PERAWAT----------------------------------->
    public function perawat()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Perawat_homecare';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_perawat()
    {
        $page_data = $this->M_Homecare->selectDataPerawat();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $hapus = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus(\"" . $page_data[$i]->id_perawat . "\")' '><i class='fa fa-trash '></i></button>";
            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_perawat(\"" . $page_data[$i]->id_perawat .  "\")'><i class='icon-pencil'></i></a>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama_perawat;
            $biaya = $page_data[$i]->jenis_layanan;

            $out[$i] = array($no, $edit, $hapus, $nama, $biaya);
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

    public function getDataPerawat()
    {
        $id_list_tindakan = $this->input->post('id_list_tindakan_mcu');
        $db = $this->M_Homecare->selectPerawatById($id_list_tindakan);

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

    public function edit_perawat()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $jenis = $this->input->post('jenis');

        $data = array(
            'nama_perawat' => $nama,
            'jenis_layanan' => $jenis,
        );
        $where = array(
            'id_perawat' => $id,
        );

        $out['status'] = "success";
        $this->M_Homecare->update($data, $where, 'perawat_homecare');
        echo json_encode($out);
    }
    public function insert_perawat()
    {
        $nama = $this->input->post('nama');
        $jenis = $this->input->post('jenis');

        $data = array(
            'id_perawat' => uniqid(),
            'nama_perawat' => $nama,
            'jenis_layanan' => $jenis,
        );
        $this->M_Homecare->insert_tindakan_homecare($data, 'perawat_homecare');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function hapus_perawat()
    {
        $id_tindakan_mcu = $this->input->post('id_logistik');
        $this->M_Homecare->delete_tindakan($id_tindakan_mcu, 'id_perawat', 'perawat_homecare');
        $out['status'] = "success";
        echo json_encode($out);
    }

    //Obat
    public function tampil_resep()
    {
        $staff = $this->session->userdata('data_auth');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $page_data = $this->M_Homecare->selectResepById($id_pelayanan, $id_history);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 


            if ($page_data[$i]->status == 0) {
                $request =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='request(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_resep . "\")' '><i class='fa fa-thumbs-up '></i></button>";
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_resep . "\",\"" . $page_data[$i]->cara_bayar .  "\",\"" . $page_data[$i]->depo .  "\",\"" . $id_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
                $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_resep(\"" . $page_data[$i]->id_resep .  "\")' '><i class='fa fa-trash '></i></button>";
                $next = "";
            } elseif ($page_data[$i]->status == 1) {
                $request = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat1(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_resep . "\",\"" . $page_data[$i]->cara_bayar  .  "\",\"" . $page_data[$i]->depo .  "\",\"" . $id_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
                if ($staff->username == "20181004") {
                    $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_resep(\"" . $page_data[$i]->id_resep .  "\")' '><i class='fa fa-trash '></i></button>";
                } else {
                    $hapus = "";
                }
                $next =   "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='next_resep(\"" . $page_data[$i]->id_resep . "\",\"" . $id_history .  "\",\"" . $id_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
            } elseif ($page_data[$i]->status == 2) {
                $request = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat1(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_resep . "\",\"" . $page_data[$i]->cara_bayar  .  "\",\"" . $page_data[$i]->depo .  "\",\"" . $id_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
                if ($staff->username == "20181004") {
                    $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_resep(\"" . $page_data[$i]->id_resep .  "\")' '><i class='fa fa-trash '></i></button>";
                } else {
                    $hapus = "";
                }
                $next =   "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='next_resep(\"" . $page_data[$i]->id_resep . "\",\"" . $id_history .  "\",\"" . $id_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
            } else {
                $request = "<span class='label label-danger capitalize-font inline-block'>BATAL</span>";
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat1(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_resep . "\",\"" . $page_data[$i]->cara_bayar  .  "\",\"" . $page_data[$i]->depo .  "\",\"" . $id_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
                if ($staff->username == "20181004") {
                    $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_resep(\"" . $page_data[$i]->id_resep .  "\")' '><i class='fa fa-trash '></i></button>";
                } else {
                    $hapus = "";
                }
                $next = "";
            }


            $no = $i + 1;
            $nama_resep = $page_data[$i]->nama_resep;
            $jenis_resep = $page_data[$i]->jenis_resep;

            $depo = $page_data[$i]->depo;
            if ($depo == "APOTIK") {
                $depo = "RAJAL";
            }
            $tgl = $page_data[$i]->tanggal;
            if ($jenis_resep == 1) {
                $jenis_resep = 'Non Racikan';
            } else if ($jenis_resep == 2) {
                $jenis_resep = 'Racikan';
            } else if ($jenis_resep == 3) {
                $jenis_resep = 'OTT';
            } else if ($jenis_resep == 5) {
                $jenis_resep = 'OBAT KRONIS';
            } else {
                $jenis_resep = 'RETURN';
                $request = "";
            }


            $out[$i] = array($no, $request, $tombol, $hapus, $nama_resep, $jenis_resep, $depo, $tgl);

            // }else{
            //     $out[$i] = array($no, $request, $tombol, $nama_resep, $jenis_resep,$tgl);
            // }


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
    public function tampil_obat()
    {
        $id_resep = $this->input->post('id_resep');
        $page_data = $this->M_Homecare->selectObatByResep($id_resep);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 
            // $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat(\"" . $page_data[$i]->id_resep ."\",\"" .$page_data[$i]->jenis_resep.  "\")' '><i class='fa fa-rocket '></i></button>";
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->depo . "\")' '><i class='fa fa-trash '></i></button>";
            $signa =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetakSigna(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->id_resep . "\")' '><i class='icon-printer'></i></button>";
            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $time = strtotime($page_data[$i]->kadaluarsa);
            $kadaluarsa = strftime("%A, %d %B %Y ", $time);
            $harga_obat = "Rp " . number_format($page_data[$i]->total / $page_data[$i]->frek, 0, ',', '.');
            $jumlah_obat = $page_data[$i]->frek;
            $depo = $page_data[$i]->depo;
            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $ket = $page_data[$i]->keterangan;
            $staff = $page_data[$i]->staff;


            $out[$i] = array($no, $nama_obat, $kadaluarsa, $harga_obat, $jumlah_obat, $depo, $total, $ket, $staff, $hapus, $signa);
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

        $page_data = array(
            'id_tindakan_farmasi' =>  $id_tindakan,
            'harga' => $this->input->post('harga'),
            'frek' => $this->input->post('frek'),
            'id_pelayanan' => $this->input->post('id_pelayanan'),
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


        $obat = $this->M_Rawatinap->getSumObat($this->input->post('id_list_tindakan'), 'stok_homecare');
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
            $this->M_Apotik->insert_tindakan($datastok, 'stok_homecare');

            $out['status'] = "success";
        }

        echo json_encode($out);
    }

    // Jenazah

    public function insert_obatR2()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        $tgl =  date("Y-m-d H:i:s");
        //$depo = $this->input->post('depo');
        $id_tindakan = uniqid();
        $id_logistik = $this->input->post('id_list_tindakan');

        $page_data = array(
            'id_tindakan_farmasi' =>  $id_tindakan,
            'harga' => $this->input->post('harga'),
            'frek' => $this->input->post('frek'),
            'id_pelayanan' => $this->input->post('id_pelayanan'),
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


        $obat = $this->M_Rawatinap->getSumObat($this->input->post('id_list_tindakan'), 'stok_jenazah');
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
            $this->M_Apotik->insert_tindakan($datastok, 'stok_jenazah');

            $out['status'] = "success";
        }

        echo json_encode($out);
    }

    public function tampil_obat1()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Homecare->selectObatById($id_pelayanan);

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

    function hapus_obat()
    {
        $id_tindakan = $this->input->post('id');
        $depo = $this->input->post('depo');

        $this->db->delete('tindakan_farmasi', ['id_tindakan_farmasi' => $id_tindakan]);
        $this->db->delete('stok_homecare', ['id_req' => $id_tindakan]);
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_obat2()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Homecare->selectObatById($id_pelayanan);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 

            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat2(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->nama .  "\")' '><i class='fa fa-trash '></i></button>";

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

    function hapus_obat2()
    {
        $id_tindakan = $this->input->post('id');
        $depo = $this->input->post('depo');

        $this->db->delete('tindakan_farmasi', ['id_tindakan_farmasi' => $id_tindakan]);
        $this->db->delete('stok_jenazah', ['id_req' => $id_tindakan]);
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_list_total_obat()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Homecare->getTotalObat($id_pelayanan);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $id_tindakan_igd  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $ppn  = "Rp. " . number_format($page_data[$i]->total * 0.11, 0, ',', '.');
            $out[$i] = array($id_tindakan_igd, $ppn);
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
    public function tampil_resep_farmasi()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $page_data = $this->M_Homecare->selectResepById($id_pelayanan, $id_history);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 
            if ($page_data[$i]->status == 2) {
                $tombol =   "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
            } else {
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_resep . "\",\"" . $page_data[$i]->cara_bayar . "\")' '><i class='fa fa-rocket '></i></button>";
            }
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_resep(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->nama_resep .  "\")' '><i class='fa fa-trash '></i></button>";
            // if($page_data[$i]->status == 1){
            //     $request =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='request(\"" . $page_data[$i]->id_resep ."\",\"" .$page_data[$i]->nama_resep. "\")' '><i class='fa fa-thumbs-up '></i></button>";
            // }elseif($page_data[$i]->status == 2){
            //     $request = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
            // }

            $no = $i + 1;
            $nama_resep = $page_data[$i]->nama_resep;
            $peresep = $page_data[$i]->staff;
            $jenis_resep = $page_data[$i]->jenis_resep;
            $depo = $page_data[$i]->depo;
            if ($depo == "APOTIK") {
                $depo = "RAJAL";
            }
            $tgl = $page_data[$i]->tanggal;
            if ($jenis_resep == 1) {
                $jenis_resep = 'Non Racikan';
            } else if ($jenis_resep == 2) {
                $jenis_resep = 'Racikan';
            } else if ($jenis_resep == 3) {
                $jenis_resep = 'OTT';
            } else if ($jenis_resep == 5) {
                $jenis_resep = 'OBAT KRONIS';
            } else {
                $jenis_resep = 'RETURN';
                $tombol = "";
            }

            $out[$i] = array($no, $tombol, $hapus, $nama_resep, $jenis_resep, $depo, $peresep, $tgl);
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
    public function print_struk_obat($id_resep, $id_history)
    {
        $staff = $this->session->userdata('data_auth');


        $id = uniqid();
        $tgl = date("Y-m-d H:i:s");
        $nota = $this->M_Apotik->getNota($id_resep);
        $max = $this->M_Apotik->getMax()->indeks;

        $max = ($max == 0) ? 1 : $max + 1;
        $kode = ($staff->tipe == "apotik") ? "FRJ" : "FRI";
        $no_nota = "NB." . $kode . "." . date("Ydm") . "." . sprintf('%04d', $max);

        if (count($nota) > 0) {
            // do nothing
        } else {
            $data_nota = [
                'id_nota_resep' => $id,
                'indeks' => $max,
                'no_nota' => $no_nota,
                'tanggal' => date("Y-m-d H:i:s"),
                'tipe' => 'resep',
                'staff' => $staff->id_staff
            ];
            $this->M_Apotik->insert_tindakan($data_nota, 'nota_resep');


            $resep = array(
                'id_nota' => $id
            );
            $where = array(
                'id_resep' => $id_resep
            );
            $this->M_Apotik->update($resep, $where, 'resep_obat');
        }

        $data['resep'] = $this->M_Apotik->getResepById($id_resep);
        $data['nota'] = $this->M_Apotik->getNota($id_resep)[0]->no_nota;
        $data['pasien'] = $this->M_Homecare->getPasienById($id_history);
        $this->load->view('print/cetak_struk_homecare', $data);
    }
    public function cetak_signa($id_resep, $id_history)
    {
        $page_data = array(
            'status' => 2
        );
        $where = array(
            'id_resep' => $id_resep
        );
        $this->M_Apotik->update($page_data, $where, 'resep_obat');


        $data['pasien'] = $this->M_Homecare->getPasienById($id_history);
        $data['signa'] = $this->M_Homecare->getSignaByResep($id_resep);
        $this->load->view('print/cetak_signa_bebas', $data);
    }

    // KAMAR JENAZAH
    public function tindakan_jenazah()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Kamar_jenazah';
        $page_data['obatruang'] = $this->M_Homecare->getNamaObat2();
        $page_data['signaobat'] = $this->M_Apotik->getSigna();
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat_biasa'] = $this->M_Apotik->getCaraPakai();
        $page_data['data_jasa'] = $this->M_Homecare->selectDataNamaTindakan();
        $page_data['perawat'] = $this->M_Homecare->selectDataNamaPerawat();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_tindakan_jenazah()
    {
        $page_data = $this->M_Homecare->selectKamarJenazah();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $hapus = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus(\"" . $page_data[$i]->id_pasien . "\")' '><i class='fa fa-trash '></i></button>";
            $editKamar = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_kamar(\"" . $page_data[$i]->id_pasien . "\")'><i class='icon-rocket'></i></button>";
            $kamar = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='show_kamar(\"" . $page_data[$i]->id_pasien . "\")'><i class='fa fa-pencil'></i></button>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama_pasien;
            $hp = $page_data[$i]->no_telp;
            $sex = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = indo_date2($page_data[$i]->tgl_lahir);
            $status = $page_data[$i]->status;

            $out[$i] = array($no,  $hapus, $kamar, $editKamar, $nama, $hp, $sex, $tgl_lahir, $status);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
        // $page_data['data'] = $out;
        // echo json_encode($page_data);
    }


    public function getDataTindakanJenazah()
    {
        $id_pasien = $this->input->post('id_pasien');
        $db = $this->M_Homecare->selectDataKamarJenazah($id_pasien);

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

    public function edit_kamar_jenazah()
    {
        $tindakan = $this->input->post('nama');
        $id = $this->input->post('id');
        $biaya = $this->input->post('biaya_sarana');
        $jasa = $this->input->post('jasa');
        // $total = $this->input->post('total');

        $data = array(
            'id_list_tindakan' => uniqid(),
            'nama_tindakan' => $tindakan,
            'biaya_sarana' => $biaya,
            'jasa_transport' => $jasa,
            'unit_cost' => $jasa,
            'status' => 'AKTIF',
        );
        $out['status'] = "success";
        $this->M_Homecare->update_tindakan($id, $data);
        echo json_encode($out);
    }

    public function insert_kamar_jenazah()
    {
        $data = $this->session->userdata('data_auth');
        $nama = $this->input->post('nama_pasien');
        $hp = $this->input->post('no_telp');
        $sex = $this->input->post('jenis_kelamin');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $status = $this->input->post('status');
        $staff = $data->id_staff;
        $tgl = date("Y-m-d H:i:sa");

        $data = array(
            'id_pasien' => uniqid(),
            'nama_pasien' => $nama,
            'no_telp' => $hp,
            'jenis_kelamin' => $sex,
            'tgl_lahir' => $tgl_lahir,
            'status' => $status,
            'id_staff' => $staff,
            'tanggal' => $tgl,
        );
        $this->M_Homecare->insert_kamar_jenazah($data, 'kamar_jenazah');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function hapus_kamar()
    {
        $id_tindakan_mcu = $this->input->post('id_logistik');
        $this->M_Homecare->delete_tindakan($id_tindakan_mcu, 'id_pasien', 'kamar_jenazah');
        $out['status'] = "success";
        echo json_encode($out);
    }

    // intan, amirul
    public function tampil_total_mcu2()
    {
        $id_mcu = $this->input->post('id_mcu');
        $data = $this->M_Homecare->Total_Mcu_Byid($id_mcu);
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

    public function insert_mcu2()
    {
        $data = $this->session->userdata('data_auth');
        $harga = $this->input->post('harga');
        $tindakan = $this->input->post('nama_tindakan');
        $id_list_tindakan = $this->input->post('id_list_tindakan');
        $frek = $this->input->post('frek');
        $total = $this->input->post('total');
        $tgl = date("Y-m-d H:i:sa");
        $id_mcu = $this->input->post('id_mcu');
        $staff = $data->id_staff;

        $data = array(
            'id_tindakan' => uniqid(),
            'id_list_tindakan' => $id_list_tindakan,
            'id_perawat' => $this->input->post('perawat'),
            'id_pasien' => $id_mcu,
            'tanggal' => date("Y-m-d H:i:s"),
            'harga' => $harga,
            'frek' => 1,
            'total' => $total,
            'tanggal' => $tgl,
            'id_staff' => $staff,
        );
        $this->M_Homecare->insert_mcu2($data, 'tindakan_kamar_jenazah');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_list2()
    {
        $id_mcu = $this->input->post('id_mcu');
        $data = $this->M_Homecare->selectDataJenazahById($id_mcu);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 1) {
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_mcu2(\"" . $data[$i]->id_tindakan . "\",\"" . $id_mcu . "\",\"" . $data[$i]->nama_tindakan . "\")' '><i class='fa fa-trash'></i></button>";
                $status = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
            } else {
                $status = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_mcu2(\"" . $data[$i]->id_tindakan . "\",\"" . $id_mcu . "\",\"" . $data[$i]->nama_tindakan . "\")' '><i class='fa fa-trash'></i></button>";
            }

            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;
            $nama = $data[$i]->nama_tindakan;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->total, 0, ',', '.');
            $frek = $data[$i]->frek;
            $id_staff = $data[$i]->staff;
            $perawat = $data[$i]->nama_perawat;


            $out[$i] = array($no, $tombol, $nama, $tanggal, $harga, $frek, $perawat, $id_staff);
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

    public function hapus_mcu2()
    {
        $id_tindakan = $this->input->post('id');
        $this->M_Homecare->delete_detail_mcu($id_tindakan, 'id_tindakan', 'tindakan_kamar_jenazah');
        $out['status'] = "success";
        echo json_encode($out);
    }

    //tindakan jenazah
    public function tindakan_jasa_jenazah()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Tindakan_jenazah';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jasa_tindakan_jenazah()
    {
        $page_data = $this->M_Homecare->selectTindakanJenazah();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_tindakan_jenazah(\"" . $page_data[$i]->id_list_tindakan .  "\")'><i class='icon-pencil'></i></a>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama_tindakan;
            $biaya = $page_data[$i]->biaya_sarana;
            $jasa = $page_data[$i]->jasa_transport;
            $total = $jasa + $biaya;
            $status = $page_data[$i]->status;

            $out[$i] = array($edit,  $no,  $nama, $biaya, $jasa, $total, $status);
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    public function getDataTindakanJasaJenazah()
    {
        $id_list_tindakan = $this->input->post('id_list_tindakan');
        $db = $this->M_Homecare->selectDataTindakanJenazah($id_list_tindakan);

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

    public function edit_tindakan_jasa_jenazah()
    {
        $tindakan = $this->input->post('nama');
        $id = $this->input->post('id');
        $biaya = $this->input->post('biaya_sarana');
        $jasa = $this->input->post('jasa');
        // $total = $this->input->post('total');

        $data = array(
            'id_list_tindakan' => uniqid(),
            'nama_tindakan' => $tindakan,
            'biaya_sarana' => $biaya,
            'jasa_transport' => $jasa,
            'unit_cost' => 0,
            'status' => 'AKTIF',
        );
        $out['status'] = "success";
        $this->M_Homecare->update_tindakan_jasa_jenazah($id, $data);
        echo json_encode($out);
    }
    public function insert_tindakan_jasa_jenazah()
    {
        $data = $this->session->userdata('data_auth');
        $tindakan = $this->input->post('nama');
        $biaya = $this->input->post('biaya_sarana');
        $jasa = $this->input->post('jasa');


        $data = array(
            'id_list_tindakan' => uniqid(),
            'nama_tindakan' => $tindakan,
            'biaya_sarana' => $biaya,
            'jasa_transport' => $jasa,
            'unit_cost' => 0,
            'status' => 'AKTIF',
        );
        $this->M_Homecare->insert_tindakan_jasa_jenazah($data, 'list_tindakan_jenazah');
        $out['status'] = "success";
        echo json_encode($out);
    }
}
