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
        $this->load->model('M_Apotik');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['tindakan_mcu'] = $this->M_Homecare->selectNamaMcu();
        $page_data['perawat'] = $this->M_Homecare->selectPerawat();
        $page_data['obat'] = $this->M_Rawatinap->getNamaObat();
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $page_data['page_content'] = 'page_content/Homecare';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function insert_pasien()
    {
        $nama = $this->input->post('nama');
        $tempat_lahir = $this->input->post('place');
        $tgl_lahir = $this->input->post('birthday');
        $jk = $this->input->post('sex');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $id_pasien =  uniqid();
        $data = array(
            'id_pasien' => $id_pasien,
            'nama' => $nama,
            'tempat_lahir' => $tempat_lahir,
            'tanggal' => date('Y-m-d H:i:s'),
            'tgl_lahir' => $tgl_lahir,
            'jk' => $jk,
            'no_hp' => $no_hp,
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
            $hapus = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='delete_mcu(\"" . $page_data[$i]->id_pasien . "\",\"" . $page_data[$i]->nama ."\")' '><i class='fa fa-trash '></i></button>";
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $nama = $page_data[$i]->nama;
            $jk = $page_data[$i]->jk;
            $tgl_lahir = $page_data[$i]->tgl_lahir;
            $no_hp = $page_data[$i]->no_hp;
            $alamat = $page_data[$i]->alamat;
            $tempat_lahir = $page_data[$i]->tempat_lahir;
            $out[$i] = array($no,$hapus,  $edit, $obat, $kasir, $bayar, $nama, $tanggal, $jk,$tempat_lahir, $tgl_lahir, $no_hp, $alamat);
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
        $tgl = date("Y-m-d h:i:sa");
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


            $out[$i] = array($no, $tombol, $nama, $tanggal, $harga, $frek,$perawat, $id_staff);
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
        $this->M_Homecare->delete_tindakan($id_tindakan_mcu,'id_pasien','homecare');
        $this->M_Homecare->delete_tindakan($id_tindakan_mcu,'id_pasien','req_kasir_homecare');
        $this->M_Homecare->delete_tindakan($id_tindakan_mcu,'id_pasien','tindakan_homecare');
        $this->M_Homecare->delete_tindakan($id_tindakan_mcu,'id_pasien','detail_kasir_homecare');
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
            $total = $page_data[$i]->total;
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
        $tindakan = $this->input->post('nama_tindakan');
        $id = $this->input->post('id');
        $biaya = $this->input->post('biaya_sarana');
        $jasa = $this->input->post('jasa');
        $total = $this->input->post('total');

        $data = array(
            'id_list_tindakan' => uniqid(),
            'nama' => $tindakan,
            'harga' => $biaya,
            'jasa' => $jasa,
            'total' => $total,
            'status' => 'AKTIF',
        );
        $out['status'] = "success";
        $this->M_Homecare->update_tindakan($id, $data);
        echo json_encode($out);
    }
    public function insert_tindakan_homecare()
    {
        $data = $this->session->userdata('data_auth');
        $biaya = $this->input->post('upBiayaSarana');
        $jasa = $this->input->post('upJasa');
        $total = $this->input->post('upTotal');
        $tindakan = $this->input->post('upTindakan');


        $data = array(
            'id_list_tindakan' => uniqid(),
            'nama' => $tindakan,
            'harga' => $biaya,
            'jasa' => $jasa,
            'total' => $total,
            'status' => 'AKTIF',
        );
        $this->M_Homecare->insert_tindakan_homecare($data, 'list_tindakan');
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
            $hapus = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus(\"" . $page_data[$i]->id_perawat ."\")' '><i class='fa fa-trash '></i></button>";
            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_perawat(\"" . $page_data[$i]->id_perawat .  "\")'><i class='icon-pencil'></i></a>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama_perawat;
            $biaya = $page_data[$i]->jenis_layanan;

            $out[$i] = array( $no,$edit,$hapus, $nama, $biaya);
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
        $this->M_Homecare->update($data,$where,'perawat_homecare');
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
        $this->M_Homecare->delete_tindakan($id_tindakan_mcu,'id_perawat','perawat_homecare');
        $out['status'] = "success";
        echo json_encode($out);
    }

    //Obat
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
}
