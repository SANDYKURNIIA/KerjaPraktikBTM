<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mcu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_mcu');
        $this->load->model('M_Poli');
        $this->api = "http://36.92.141.4/rest_ci/index.php";
        // $this->api = "http://103.154.93.45/rest_ci/index.php";
        $this->load->library('curl');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Mcu';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function insert_dataPersonal()
    {
        $nama = $this->input->post('nama');
        if (strpos($nama, '|') !== false) {
            $split = explode(" | ", $nama);
            $no_rm = $split[0];
            $nama = $split[1];
        } else {
            $no_rm = 0;
            $nama = $nama;
        }

        $tempat_lahir = $this->input->post('place');
        $birthday = $this->input->post('birthday');
        $occupation = $this->input->post('occupation');
        $badge = $this->input->post('badge');
        $sex = $this->input->post('sex');
        $blood = $this->input->post('blood');
        $perusahaan = $this->input->post('perusahaan');
        $alamat = $this->input->post('alamat');
        $alamat_comp = $this->input->post('alamat_comp');
        $status_pegawai = $this->input->post('status_pegawai');
        $unit = $this->input->post('unit');
        $fungsi = $this->input->post('fungsi');
        $id_mcu = uniqid();
        $data = array(
            'id_mcu' => $id_mcu,
            'no_rm' => $no_rm,
            'nama_pasien' => $nama,
            'tempat_lahir' => $tempat_lahir,
            'tanggal' => date('Y-m-d H:i:s'),
            'tgl_lahir' => $birthday,
            'sex' => $sex,
            'badge_no' => $badge,
            'blood_group' => $blood,
            'occupation' => $occupation,
            'tipe' => "MCU",
            'perusahaan' => $perusahaan,
            'cara_bayar' => $this->input->post('cara_bayar'),
            'alamat' => $alamat,
            'alamat_comp' => $alamat_comp,
            'status_pegawai' => $status_pegawai,
            'unit' => $unit,
            'fungsi' => $fungsi,
        );
        // $data2 = array(
        //     'id_tindakan_mcu' => uniqid(),
        //     'id_mcu'=> $id_mcu,
        // );
        // $data3 = array(
        //     'id_tindakan_radiologi' => uniqid(),
        //     'id_mcu'=> $id_mcu,
        // );
        // $data4 = array(
        //     'id_tindakan_labor' => uniqid(),
        //     'id_mcu'=> $id_mcu,
        // );
        $data5 = array(
            'id_detail_mcu' => uniqid(),
            'id_mcu' => $id_mcu,
        );
        $data6 = array(
            'id_req_mcu' => uniqid(),
            'id_mcu' => $id_mcu,
        );
        $data7 = array(
            'id_detail' => uniqid(),
            'id_pasien' => $id_mcu,
        );
        $this->M_mcu->insert_mcu($data,  'mcu');
        // $this->M_mcu->insert_mcu($data2, 'tindakan_mcu');
        // $this->M_mcu->insert_mcu($data3, 'tindakan_radiologi_mcu');
        // $this->M_mcu->insert_mcu($data4, 'tindakan_labor_mcu');
        $this->M_mcu->insert_mcu($data5, 'detail_mcu');
        $this->M_mcu->insert_mcu($data6, 'req_kasir_mcu');
        $this->M_mcu->insert_mcu($data7, 'detail_kasir_mcu');
        $out['status'] = 'success';
        echo json_encode($out);
    }

    public function simpan_mcu()
    {
        $id_mcu = $this->input->post('id_mcu');
        $data = array(
            '11a' => $this->input->post('P11a'),
            '11b' => $this->input->post('P11b'),
            '12a' => $this->input->post('P12a'),
            '12b' => $this->input->post('P12b'),
            '12c' => $this->input->post('P12c'),
            '12d' => $this->input->post('P12d'),
            '12e' => $this->input->post('P12e'),
            '12f' => $this->input->post('P12f'),
            '12g' => $this->input->post('P12g'),
            '12h' => $this->input->post('P12h'),
            '13a' => $this->input->post('P13a'),
            '13b' => $this->input->post('P13b'),
            '14a' => $this->input->post('P14'),
            '15a' => $this->input->post('P15'),
            '16a' => $this->input->post('P16'),
            '17a' => $this->input->post('P17a'),
            'smoker' => $this->input->post('smoker'),
            'number_smoker' => $this->input->post('numbersmoked'),
            'concumption_alcohol' => $this->input->post('concumption_alcohol'),
            'if_live_age_father' => $this->input->post('liv_father'),
            'state_of_health_father' => $this->input->post('healthfather'),
            'if_dead_age_father' => $this->input->post('deadfather'),
            'cause_of_dead_father' => $this->input->post('causedeadfather'),
            'if_live_age_mother' => $this->input->post('liv_mother'),
            'state_of_health_mother' => $this->input->post('healthmother'),
            'if_dead_age_mother' => $this->input->post('deadmother'),
            'cause_of_dead_mother' => $this->input->post('causedeadmother'),
            'if_live_age_brosis' => $this->input->post('livbrosis'),
            'state_of_health_brosis' => $this->input->post('healthbrosis'),
            'if_dead_age_brosis' => $this->input->post('deadbrosis'),
            'cause_of_dead_brosis' => $this->input->post('causedeadbrosis'),
            'live_age_bros' => $this->input->post('livbrosis1'),
            'state_health_bros' => $this->input->post('healthbrosis1'),
            'dead_age_bros' => $this->input->post('deadbrosis1'),
            'cause_dead_bros' => $this->input->post('causedeadbrosis1'),
            'live_age_sis' => $this->input->post('livbrosis2'),
            'state_health_sis' => $this->input->post('healthbrosis2'),
            'dead_age_sis' => $this->input->post('deadbrosis2'),
            'cause_dead_sis' => $this->input->post('causedeadbrosis2'),
            '31a' => $this->input->post('Ear'),
            '32a' => $this->input->post('Nose'),
            '33a' => $this->input->post('Color'),
            '34a' => $this->input->post('Frequent'),
            '35a' => $this->input->post('epilepsy'),
            '36a' => $this->input->post('Hypertension'),
            '37a' => $this->input->post('Diabetes'),
            '38a' => $this->input->post('Endocrione'),
            '39a' => $this->input->post('Hernia'),
            '310a' => $this->input->post('Fistula'),
            '311a' => $this->input->post('Malaria'),
            '312a' => $this->input->post('Skin'),
            '313a' => $this->input->post('Cance'),
            '314a' => $this->input->post('Allergy'),
            'height' => $this->input->post('height'),
            'weight' => $this->input->post('weight'),
            'BMI' => $this->input->post('BMI'),
            '48c' => $this->input->post('P48c'),
            '48d' => $this->input->post('P48d'),
            '48e' => $this->input->post('P48e'),
            '49a' => $this->input->post('P49a'),
            '49b' => $this->input->post('P49b'),
            '49c' => $this->input->post('P49c'),
            '49d' => $this->input->post('P49d'),
            'insystolic' => $this->input->post('insystolic'),
            'inpulse' => $this->input->post('inpulse'),
            '410a' => $this->input->post('P410a'),
            '410b' => $this->input->post('P410b'),
            '411a' => $this->input->post('P411a'),
            '411b' => $this->input->post('P411b'),
            '411c' => $this->input->post('P411c'),
            '412a' => $this->input->post('P412a'),
            '412b' => $this->input->post('P412b'),
            '413a' => $this->input->post('P413a'),
            'UFVOO' => $this->input->post('UFVOO'),
            'UFVOS' => $this->input->post('UFVOS'),
            'UNVOO' => $this->input->post('UNVOO'),
            'UNVOS' => $this->input->post('UNVOS'),
            'UCVAdequate' => $this->input->post('UCVAdequate'),
            'CFVOO' => $this->input->post('CFVOO'),
            'CFVOS' => $this->input->post('CFVOS'),
            'CNVOO' => $this->input->post('CNVOO'),
            'CNVOS' => $this->input->post('CNVOS'),
            'CCVDefective' => $this->input->post('CCVDefective'),
            'Remarks' => $this->input->post('Remarks'),
            '51a' => $this->input->post('P51a'),
            '52a' => $this->input->post('P52a'),
            '53a' => $this->input->post('P53a'),
            '541a' => $this->input->post('P541a'),
            '542a' => $this->input->post('P542a'),
            '543a' => $this->input->post('P543a'),
            '55a' => $this->input->post('P55a'),
            '56a' => $this->input->post('P56a'),
            '57a' => $this->input->post('P57a'),
            '58a' => $this->input->post('P58a'),
            '59a' => $this->input->post('P59a'),
            '510a' => $this->input->post('P510a'),
            '511a' => $this->input->post('P511a'),
            '512a' => $this->input->post('P512a'),
            '513a' => $this->input->post('P513a'),
            'summary' => $this->input->post('summary'),
            'present' => $this->input->post('present'),
            'examined' => $this->input->post('examined'),
            'Duty' => $this->input->post('Duty'),
        );
        $data2 = array(
            'status_update' => 1,
        );
        $this->M_mcu->update_mcu($data, $data2, $id_mcu);

        $out['status'] = 'success';
        echo json_encode($out);
    }
    public function print_mcu($id_mcu)
    {
        $data['cetak_mcu'] = $this->M_mcu->getMCUById($id_mcu);;
        $this->load->view('print/cetak_mcu', $data);
    }
    public function detail_mcu()
    {
        // $page_data['page_content'] = 'page_content/Detail_mcu';
        $this->load->view('page_content/Detail_mcu');
    }

    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_mcu->get_cek_like($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row) {
                    $arr_result[] = array(
                        'id' => "" . $row->no_rm . " | " . $row->nama . " | " . $row->tgl_lahir . "",
                        'value' => "" . $row->no_rm . " | " . $row->nama . " | " . $row->tgl_lahir . "",
                        'tgl_lahir' => "" . date('Y-m-d', strtotime($row->tgl_lahir)) . "",
                        'sex' => "" . $row->jenis_kelamin . "",
                        'pekerjaan' => "" . $row->pekerjaan . "",
                        'alamat' => "" . $row->alamat . "",
                        'nik' => "" . $row->no_ktp . "",
                        'pendidikan' => "" . $row->pendidikan . "",
                        'no_rm' => "" . $row->no_rm . "",
                        'kelurahan' => "" . $row->kelurahan . "",
                        'pasien' => "" . $row->nama . "",
                        'agama' => "" . $row->agama . "",
                        'kepala_keluarga' => "" . $row->nama_kepala_keluarga . "",
                        'no_hp' => "" . $row->no_hp . "",

                    );
                }
                echo json_encode($arr_result);
            }
        }
    }
    public function DataMCU()
    {
        $this->load->view('assets/_header');
        $page_data['data_dokter'] = $this->M_mcu->selectNamaDokter();
        $page_data['tindakan_mcu'] = $this->M_mcu->selectNamaMcu();
        $page_data['tindakan_radiologi'] = $this->M_mcu->selectNamaRadiologi();
        $page_data['tindakan_labor'] = $this->M_mcu->selectNamaLabor();
        // $page_data['obat'] = $this->M_mcu->getNamaObat();
        $page_data['page_content'] = 'page_content/Data_mcu';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    // Amirul
    public function getDataMcu()
    {
        $id_mcu = $this->input->post('id_mcu');
        $db = $this->M_mcu->selectDataMcuu($id_mcu);

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

    public function edit_tindakan_mcu_shap()
    {
        $perusahaan = $this->input->post('perusahaan');
        $id = $this->input->post('id');
        $cara_bayar = $this->input->post('cara_bayar');

        $data = array(
            'perusahaan' => $perusahaan,
            'cara_bayar' => $cara_bayar,
        );
        $out['status'] = "success";
        $this->M_mcu->update_tindakan_mcu_shap($id, $data);
        echo json_encode($out);
    }

    public function edit_detail($id_mcu)
    {
        $this->load->view('assets/_header');
        $page_data['data_dokter'] = $this->M_mcu->selectNamaDokter();
        $page_data['data_mcu'] = $this->M_mcu->getMCUById($id_mcu);
        $this->load->view('page_content/Detail_mcu', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Data_MCU()
    {
        date_default_timezone_set('Asia/Jakarta');
        $page_data = $this->M_mcu->selectMCUhariini();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            // $cetak = "<a class='btn btn-info btn-icon-anim btn-square' href='mcu/print_mcu/".$page_data[$i]->id_mcu."' ><i class='icon-printer'></i></a>";
            $radiologi = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_radiologi(\"" . $page_data[$i]->id_mcu . "\")'><i class='icon-disc'></i></button>";
            $labor = "<button class='btn btn-info btn-icon-anim btn-square' onclick='edit_labor(\"" . $page_data[$i]->id_mcu . "\")'><i class='icon-chemistry'></i></button>";
            $edit = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_mcu(\"" . $page_data[$i]->id_mcu . "\")'><i class='icon-rocket'></i></button>";
            $cetakk = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url() . "Kasir/print_kasirmcu/" . $page_data[$i]->id_mcu . "' ><i class='icon-printer'></i></a>";
            // $mcu = "<button class='btn btn-primary btn-icon-anim btn-square' onclick='edit_detail()'><i class='icon-note'></i></button>";
            // $mcu = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' href='edit_detail/". $page_data[$i]->id_mcu. "'><i class='icon-note'></i></a>";
            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_mcu_shap(\"" . $page_data[$i]->id_mcu .  "\")'><i class='icon-pencil'></i></a>";

            if ($page_data[$i]->verif_mcu == 1) {
                $mcu = "<span class='label label-success capitalize-font inline-block'>SUDAH TERSIMPAN<i class=''></i><span>";
            } else {
                $mcu = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='verif_mcu(\"" . $page_data[$i]->id_mcu .  "\")'><i class='fa fa-thumbs-up'></i></a>";
            }

            if ($page_data[$i]->status_update == 1) {
                $cetak = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' href='cetak_sertif/" . $page_data[$i]->id_mcu . "'><i class='icon-printer'></i></a>";
            } else {
                $cetak = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' href=''><i class='icon-close'></i></a>";
            }

            if ($page_data[$i]->status == 1) {
                if ($page_data[$i]->status_bayar == 1) {
                    $kasir = "<span class='label label-success capitalize-font inline-block'>SUDAH BAYAR<i class=''></i><span>";
                } else {
                    $kasir = "<span class='label label-warning capitalize-font inline-block'>REQUESTED, Belum Bayar<i class=''></i><span>";
                }
            } else if ($page_data[$i]->status == 0) {
                $kasir = "<button class='btn btn-warning btn-icon-anim btn-square' onclick='insert_kasir(\"" . $page_data[$i]->id_mcu . "\")'><i class='fa fa-dollar'></i></button>";
            }
            


            $aksi = "<a class='btn btn-primary btn-icon-anim btn-square' href=" . base_url('Data_mcu/form/' . $page_data[$i]->id_mcu) . "><i class='icon-note'></i></a>";

            $hapus = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='delete_mcu(\"" . $page_data[$i]->id_mcu . "\")' '><i class='fa fa-trash '></i></button>";
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $nama = $page_data[$i]->nama_pasien;
            $jk = $page_data[$i]->sex;
            $tgl_lahir = $page_data[$i]->tgl_lahir;
            $no_rm = $page_data[$i]->no_rm;
            $occupation = $page_data[$i]->occupation;
            $badgeno = $page_data[$i]->badge_no;
            $blood_group = $page_data[$i]->blood_group;
            $perusahaan = $page_data[$i]->perusahaan;
            $out[$i] = array($no, $aksi, $kasir, $cetakk, $hapus, $mcu, $edit, $nama, $no_rm, $tanggal, $jk, $tgl_lahir, $perusahaan, $occupation, $badgeno, $blood_group);
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

    public function hapus_pasien_mcu()
    {
        $id_mcu = $this->input->post('id_mcu');
        $this->M_mcu->delete_pasien_mcu($id_mcu);
        $out['status'] = "success";
        echo json_encode($out);
    }


    public function cetak_sertif($id_mcu)
    {
        $this->load->view('assets/_header');
        $page_data['data_mcu'] = $this->M_mcu->getDetailMCUById($id_mcu);
        $this->load->view('print/cetak_sertif', $page_data);
        $this->load->view('assets/_footer');
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
        $page_data = $this->M_mcu->selectKunjunganMcu();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tgl_lahir = indo_date2($page_data[$i]->tgl_lahir);
            $tanggal = $page_data[$i]->tanggal;
            $nama = $page_data[$i]->nama_pasien;
            $jk = $page_data[$i]->sex;
            // $tgl_lahir = $page_data[$i]->tgl_lahir;
            $alamat = $page_data[$i]->alamat;
            $alamat_comp = $page_data[$i]->alamat_comp;
            $badgeno = $page_data[$i]->badge_no;
            $blood_group = $page_data[$i]->blood_group;
            $perusahaan = $page_data[$i]->perusahaan;
            $status_pegawai = $page_data[$i]->status_pegawai;
            $unit = $page_data[$i]->unit;
            $fungsi = $page_data[$i]->fungsi;
            $out[$i] = array($no, $nama, $tanggal, $jk, $tgl_lahir, $perusahaan, $alamat, $alamat_comp,$badgeno, $blood_group, $status_pegawai,$unit,$fungsi );
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
        $page_data = $this->M_mcu->selectRangeKunjunganMcu($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
           $tgl_lahir = indo_date2($page_data[$i]->tgl_lahir);
            $tanggal = $page_data[$i]->tanggal;
            $nama = $page_data[$i]->nama_pasien;
            $jk = $page_data[$i]->sex;
            // $tgl_lahir = $page_data[$i]->tgl_lahir;
            $alamat = $page_data[$i]->alamat;
            $alamat_comp = $page_data[$i]->alamat_comp;
            $badgeno = $page_data[$i]->badge_no;
            $blood_group = $page_data[$i]->blood_group;
            $perusahaan = $page_data[$i]->perusahaan;
            $status_pegawai = $page_data[$i]->status_pegawai;
            $unit = $page_data[$i]->unit;
            $fungsi = $page_data[$i]->fungsi;
            $out[$i] = array($no, $nama, $tanggal, $jk, $tgl_lahir, $perusahaan, $alamat, $alamat_comp,$badgeno, $blood_group, $status_pegawai,$unit,$fungsi );
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
        $db = $this->M_mcu->selectDataPasienMCUby_id($id_mcu);
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
        $tgl = date("Y-m-d H:i:s");
        $id_mcu = $this->input->post('id_mcu');
        $staff = $data->id_staff;

        $data = array(
            'id_tindakan_mcu' => uniqid(),
            'id_list_tindakan' => $id_list_tindakan,
            'id_mcu' => $id_mcu,
            'tanggal' => date("Y-m-d H:i:s"),
            'harga' => $harga,
            'frek' => 1,
            'total' => $total,
            'tanggal' => $tgl,
            'id_staff' => $staff,
        );
        $this->M_mcu->insert_labor($data, 'tindakan_mcu');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_list_mcu()
    {
        $id_mcu = $this->input->post('id_mcu');
        $data = $this->M_mcu->selectDataMcuById($id_mcu);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 1) {
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_mcu(\"" . $data[$i]->id_tindakan_mcu . "\",\"" . $id_mcu . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
                $status = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
            } else {
                $status = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_mcu(\"" . $data[$i]->id_tindakan_mcu . "\",\"" . $id_mcu . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
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


            $out[$i] = array($no, $tombol, $status, $nama, $tanggal, $harga, $frek, $id_staff, $staff_konf);
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
        $data = $this->M_mcu->Total_Mcu_Byid($id_mcu);
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
        $this->M_mcu->delete_mcu($id_tindakan_mcu);
        $out['status'] = "success";
        echo json_encode($out);
    }


    //PAKET-------------------------------------------------------------------
    public function get_paket()
    {
        $id_mcu = $this->input->post('id_mcu');
        $db = $this->M_mcu->selectDataPasienMCUby_id($id_mcu);
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

    public function tampil_list_paket()
    {
        $id_mcu = $this->input->post('id_mcu');
        $data = $this->M_mcu->selectDataMcuById($id_mcu);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 1) {
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_mcu(\"" . $data[$i]->id_tindakan_mcu . "\",\"" . $id_mcu . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
                $status = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
            } else {
                $status = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_mcu(\"" . $data[$i]->id_tindakan_mcu . "\",\"" . $id_mcu . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
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


            $out[$i] = array($no, $tombol, $status, $nama, $tanggal, $harga, $frek, $id_staff, $staff_konf);
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
    public function tampil_total_paket()
    {
        $id_paket = $this->input->post('id_paket');
        $data = $this->db->get_where('list_paket_mcu', ['id_paket_mcu' => $id_paket])->result();
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            $id_tindakan = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
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
    public function hapus_data_paket()
    {
        $id_tindakan_mcu = $this->input->post('id_tindakan_mcu');
        $this->M_mcu->delete_mcu($id_tindakan_mcu);
        $out['status'] = "success";
        echo json_encode($out);
    }


    //RADIOLOGI ----------------------------------------------------------------
    public function get_radiologi()
    {
        $id_mcu = $this->input->post('id_mcu');
        $db = $this->M_mcu->selectDataPasienRadiologiMCUby_id($id_mcu);
        // $db1 = $this->M_IGD->cekJumTindakanRad($id_mcu);
        // $count = count($db1);
        if (count($db) > 0) {
            $data = $db[0];
            $db = array(
                'status_dt' => 'found',
                'data' => $data,
                // 'countTin' => $count
            );
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    public function insert_radiologi()
    {
        $data = $this->session->userdata('data_auth');
        $harga = $this->input->post('harga');
        $id_list_tindakan = $this->input->post('id_list_tindakan');
        $frek = $this->input->post('frek');
        $total = $this->input->post('total');
        $tgl = date("Y-m-d H:i:s");
        $id_mcu = $this->input->post('id_tindakan_radiologi');
        $staff = $data->id_staff;

        $data = array(
            'id_tindakan_radiologi' => uniqid(),
            'id_daftar_tindakan' => $id_list_tindakan,
            'tanggal' => date("Y-m-d H:i:s"),
            'id_mcu' => $id_mcu,
            'harga' => $harga,
            'frek' => 1,
            'total' => $total,
            'tanggal' => $tgl,
            'id_staff' => $staff,
            'status_radiologi' => 1,
        );
        $this->M_mcu->insert_radiologi($data, 'tindakan_radiologi_mcu');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_list_radiologi()
    {
        $id_mcu = $this->input->post('id_mcu');
        $data = $this->M_mcu->selectDataRadiologiById($id_mcu);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 1) {
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_mcu . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
                $status = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
            } else {
                $status = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_radiologi(\"" . $data[$i]->id_tindakan_radiologi . "\",\"" . $id_mcu . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
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
                $gambar .= "<img src='" . base_url('assets/images/'). $image . "' class='img-responsive zoom'><br>";
            }
            $ket = $data[$i]->keterangan;
            $a = $tombol;
            $b = $status;

            $out[$i] = array($no, $nama, $tanggal, $harga, $frek, $id_staff, $staff_konf, $gambar, $ket, $b, $a);
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
        $id_mcu = $this->input->post('id_mcu');
        $data = $this->M_mcu->Total_Radiologi_Byid($id_mcu);
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
        $this->M_mcu->delete_radiologi($id_tindakan_radiologi);
        $out['status'] = "success";
        echo json_encode($out);
    }
    //LABOR --------------------------------------------------------------------------->

    public function insert_form_labor()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");

        $page_data = array(
            'id_pelayanan' => $this->input->post('id_mcu'),
            'diagnosa' => $this->input->post('diagnosa'),
            'ringkasan' => $this->input->post('ringkasan'),
            'keterangan' => $this->input->post('keterangan'),
            'tgl' => $tgl,
            'status' => 0,
            'id_staff' => $data->id_staff,
        );
        $this->M_mcu->insert_tindakan($page_data, 'form_labor');
        $out['status'] = "success";
        echo json_encode($out);
    }

    // tampil form labor
    public function tampil_form_labor()
    {
        $staff = $this->session->userdata('data_auth');
        $id_mcu = $this->input->post('id_mcu');
        $page_data = $this->db->get_where('form_labor', array('id_pelayanan' => $id_mcu))->result();

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_form_labor(\"" . $page_data[$i]->id_form_labor .  "\")' '><i class='fa fa-trash '></i></button>";
            
            $param = array('ID' => $page_data[$i]->id_form_labor);
            $labor = json_decode($this->curl->simple_get($this->api . '/kontak', $param));
            if (empty($labor)) {
                $labor = '0';
            } else {
                $labor = '1';
            }

            if (($page_data[$i]->status == 0 && $labor == '0') || ($page_data[$i]->status == 1 && $labor == '0') || ($page_data[$i]->status == 0 && $labor == '1')) {
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_labor(\"" . $page_data[$i]->id_form_labor . "\")' '><i class='fa fa-rocket '></i></button>";

                $request =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='request_labor(\"" . $page_data[$i]->id_form_labor . "\")' '><i class='fa fa-thumbs-up '></i></button>";
            } elseif ($page_data[$i]->status == 1 && $labor == '1') {
                if ($staff->tipe == "laboratorium") {
                    $request = '<a class="btn btn-success btn-xs" href="' . base_url('Apelkes/print_labor/' . $page_data[$i]->id_form_labor) . '"><span class="fas fa-pencil-alt"></span> Download</a></div>';
                } else {
                    $request = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                }
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_labor1(\"" . $page_data[$i]->id_form_labor . "\")' '><i class='fa fa-rocket '></i></button>";
                $hapus = "";
            } else {
                $request = '<a class="btn btn-success btn-xs" href="' . base_url('Apelkes/print_labor/' . $page_data[$i]->id_form_labor) . '"><span class="fas fa-pencil-alt"></span> Download</a></div>';
                $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_labor1(\"" . $page_data[$i]->id_form_labor . "\")' '><i class='fa fa-rocket '></i></button>";
                $hapus = "";
            }

            $no = $i + 1;
            $diagnosa = $page_data[$i]->diagnosa;
            $ringkasan = $page_data[$i]->ringkasan;
            $keterangan = $page_data[$i]->keterangan;
            $time = strtotime($page_data[$i]->tgl);
            $tgl = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $out[$i] = array($no, $request, $tombol, $hapus, $tgl, $waktu, $diagnosa, $ringkasan, $keterangan);
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

    //hapus form
    public function hapus_form_labor()
    {
        $id = $this->input->post('id');
        $this->M_mcu->delete_tindakan($id, 'form_labor', 'id_form_labor');
        $this->M_mcu->delete_tindakan($id, 'tindakan_labor_mcu', 'id_form_labor');
        $out['status'] = "success";
        echo json_encode($out);
    }



    public function get_labor()
    {
        $id_mcu = $this->input->post('id_mcu');
        $db = $this->M_mcu->selectDataPasienLaborMCUby_id($id_mcu);
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
    public function insert_labor()
    {
        $data = $this->session->userdata('data_auth');
        $harga = $this->input->post('harga');
        $id_list_tindakan = $this->input->post('id_list_tindakan');
        // $frek = $this->input->post('frek');
        $nama_tindakan = $this->input->post('nama_tindakan');
        $kode_lis = $this->input->post('kode_lis');
        $total = $this->input->post('total');
        $tgl = date("Y-m-d H:i:s");
        $id_mcu = $this->input->post('id_mcu');
        $id_form_labor = $this->input->post('id_form_lab');
        $staff = $data->id_staff;

        $data = array(
            'id_tindakan_labor' => uniqid(),
            'id_daftar_tindakan' => $id_list_tindakan,
            'nama_tindakan' => $nama_tindakan,
            'kode_lis' => $kode_lis,
            'id_mcu' => $id_mcu,
            'id_form_labor' => $id_form_labor,
            'tanggal' => date("Y-m-d H:i:s"),
            'harga' => $harga,
            'frek' => 1,
            'total' => $total,
            'tanggal' => $tgl,
            'id_staff' => $staff,
        );
        $this->M_mcu->insert_labor($data, 'tindakan_labor_mcu');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_list_labor()
    {
        $id_mcu = $this->input->post('idmcu');
        $data = $this->M_mcu->selectDataLaborById($id_mcu);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->ket == 1) {
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor(\"" . $data[$i]->id_tindakan_labor . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
                $status = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
            } else {
                $status = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_labor(\"" . $data[$i]->id_tindakan_labor .  "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";
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
            // $gambar = null;
            // foreach (explode(',', $data[$i]->gambar) as $image) { // 1, 2, 3
            //     $gambar .= "<img src='assets/images/" . $image . "' class='img-responsive zoom'><br>";
            // }
            // $ket = $data[$i]->keterangan;
            //$a = $tombol;
            $b = $status;

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

    public function getdata_formById_Labor()
    {
        $id_tindakan = $this->input->post('tindakan');
        $db = $this->M_mcu->selectDataFormById_Labor($id_tindakan);

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

    public function tampil_total_labor()
    {
        $id_mcu = $this->input->post('id_mcu');
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
    public function hapus_data_labor()
    {
        $id_tindakan_labor = $this->input->post('id_tindakan_labor');
        $this->M_mcu->delete_labor($id_tindakan_labor);
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function req_form_labor()
    {
        $id = $this->input->post('id');
        $query = $this->db->query("SELECT * from tindakan_labor_mcu where id_form_labor='$id'")->result();
        if (count($query) > 0) {
            $page_data = array(
                'tgl_request' =>  date("Y-m-d H:i:s"),
                'status' => 1
            );
            $where = array(
                'id_form_labor' => $id
            );
            $this->M_Poli->update_tindakan($page_data, $where, 'form_labor');
            $id_pel = $query[0]->id_mcu;


            $v_rawat_jalan = $this->db->query("SELECT no_rm,nama_pasien nama,alamat,tgl_lahir,sex jenis_kelamin FROM mcu  WHERE id_mcu ='$id_pel'")->row_array();
            $form_labor = $this->db->query("SELECT diagnosa,tgl FROM form_labor  WHERE id_form_labor ='$id'")->row_array();


            if ($v_rawat_jalan['jenis_kelamin'] == 'Laki-laki' || $v_rawat_jalan['jenis_kelamin'] == 'LAKI-LAKI') {
                $jenis_kelamin = '1';
            } else {
                $jenis_kelamin = '2';
            }

            $kode_lis = $this->db->query("SELECT kode_lis from tindakan_labor_mcu where id_form_labor = '$id'")->result_array();
            $k = array();
            //print_arr($kode_lis);
            foreach ($kode_lis as $row) {
                $k[] = $row['kode_lis'];
            }

            $date  = $v_rawat_jalan['tgl_lahir'];
            $date1 = substr($date, 0, 10);
            $time2 = substr($date, 11, 20);
            $date2 = str_replace("-", "", $date1);
            $time2 = str_replace(":", "", $time2);

            $tgl_lahir = $date2 . $time2;

            $tgl  = $form_labor['tgl'];
            $tgl1 = substr($tgl, 0, 10);
            $jam1 = substr($tgl, 11, 20);
            $tgl2 = str_replace("-", "", $tgl1);
            $jam2 = str_replace(":", "", $jam1);

            $tgl_req = $tgl2 . $jam2;

            $data = array(
                'ID'            =>  $id,
                'MESSAGE_DT'    =>  date('Ymdhis'),
                'ORDER_CONTROL' =>  'NW',
                // 'VERSION'       =>   '2.3',
                'PID'           =>  $v_rawat_jalan['no_rm'],
                'PNAME'         =>  $v_rawat_jalan['nama'],
                // 'ADDRESS1'       =>  $add,
                'ADDRESS1'      =>  $v_rawat_jalan['alamat'],
                'ADDRESS2'      =>  '-',
                'ADDRESS3'      =>  '-',
                'ADDRESS4'      =>  '-',
                'PTYPE'         =>  'OP',
                'BIRTH_DT'      =>  $tgl_lahir,
                'SEX'           =>  $jenis_kelamin,
                'ONO'           =>  'A' . $id,
                'REQUEST_DT'    =>  $tgl_req,
                'SOURCE'        =>  'MCU^Medical Check Up',
                'CLINICIAN'     =>  '-^-',
                'ROOM_NO'       =>  '-',
                'PRIORITY'      =>  'R',
                'CMT'           =>  $form_labor['diagnosa'],
                'VISITNO'       =>  'A' . $id,

                'ORDER_TESTID'  =>  implode('~', $k),

                'STATUS'        =>  'N',
                'POST_DT'       =>  date('Ymdhis'),
                'GET_DT'        =>  date('Ymdhis'),
            );
            // echo print_r($data);
            $insert = $this->curl->simple_post($this->api . '/kontak', $data, array(CURLOPT_BUFFERSIZE => 50));



            $out['status'] = "success";
        } else {
            $out['status'] = "error";
        }

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
        $this->M_mcu->update_kasir($id_mcu, $data);
        $out['status'] = "success";
        echo json_encode($out);
    }
    function verif_mcu()
    {
        $id_mcu = $this->input->post('id_mcu');
        $data = array(
            'verif_mcu' => 1,
        );
        $this->M_mcu->update($data,['id_mcu'=> $id_mcu],'mcu');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function insert_tindakan()
    {
        $data = $this->session->userdata('data_auth');
        $biaya = $this->input->post('upBiaya');
        $tindakan = $this->input->post('upTindakan');


        $data = array(
            'id_list_tindakan_mcu' => uniqid(),
            'nama' => $tindakan,
            'harga' => $biaya,
            'harga_cost' => 0,
            'status' => 'AKTIF',
        );
        $this->M_mcu->insert_labor($data, 'list_tindakan_mcu');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function obat()
    {

        $this->load->view('assets/_header');
        $page_data['satuan'] = $this->db->get('satuan_list_logistik')->result_array();
        $page_data['gol_obat'] = $this->db->get('list_logistik')->result_array();
        $page_data['produ'] = $this->db->get('prod_obat')->result_array();
        $page_data['page_content'] = 'page_content/Obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function insertObat()
    {

        $nama  = $this->input->post('nama');
        $tipe = $this->input->post('tipe');
        $harga_cost = $this->input->post('harga_cost');
        $golongan_obat  = $this->input->post('golongan_obat');
        $margin = $this->input->post('margin');
        $produsen = $this->input->post('produsen');
        $standar = $this->input->post('standar');
        $distributor = $this->input->post('distributor');
        $kode = $this->input->post('kode');

        $data = array(
            'id_logistik' => uniqid(),
            'nama' => $nama,
            'tipe' => $tipe,
            'harga_cost' => $harga_cost,
            'golongan_obat' => $golongan_obat,
            'margin' => $margin,
            'produsen' => $produsen,
            'standar' => $standar,
            'distributor' => $distributor,
            'status' => 'AKTIF',
            'kode' => $kode,
            'tgl_input' => date("Y-m-d H:i:s")
        );



        $this->M_Po_obat->insertObat($data, 'list_logistik');
        $out['status'] = "success";
        echo json_encode($out);
    }

    ////Tindakan MCU
    public function tindakan_mcu()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Tindakan_mcu';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_tindakan_mcu()
    {
        $page_data = $this->M_mcu->selectTindakanMcu();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_tindakan_mcu(\"" . $page_data[$i]->id_list_tindakan_mcu .  "\")'><i class='icon-pencil'></i></a>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $harga = $page_data[$i]->harga;
            $harga_cost = $page_data[$i]->harga_cost;
            $status = $page_data[$i]->status;

            $out[$i] = array($edit,  $no,  $nama, $harga, $harga_cost, $status);
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    public function getDataTindakan()
    {
        $id_list_tindakan_mcu = $this->input->post('id_list_tindakan_mcu');
        $db = $this->M_mcu->selectDataTindakanMcu($id_list_tindakan_mcu);

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

    public function edit_tindakan_mcu()
    {
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $harga = $this->input->post('harga');
        $harga_cost = $this->input->post('harga_cost');
        $status = $this->input->post('status');

        $data = array(
            'nama' => $nama,
            'harga' => $harga,
            'harga_cost' => $harga_cost,
            'status' => $status,
        );
        $out['status'] = "success";
        $this->M_mcu->update_tindakan($id, $data);
        echo json_encode($out);
    }

    /////Paket MCU

    public function Paket_mcu()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Paket_mcu';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function insert_paket()
    {
        $data = $this->session->userdata('data_auth');
        $id = $this->input->post('id');
        $tindakan = $this->input->post('upTindakan');


        $harga = $this->db->query("SELECT sum(harga) harga from detail_paket_mcu where id_paket ='$id'")->row()->harga;

        $data = array(
            'id_paket_mcu' => $this->input->post('id'),
            'nama_paket' => $tindakan,
            'harga' => $harga,
            'tgl' => date('Y-m-d H:i:s'),
            'id_staff' => $data->id_staff,
            'status' => 'AKTIF',
            'jenis' => 'MCU',
        );
        $id_paket = $this->M_mcu->insert_labor($data, 'list_paket_mcu');
        $out['status'] = "success";

        echo json_encode($out);
    }

    public function tampil_paket_mcu()
    {
        $page_data = $this->M_mcu->selectPaketMcu();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_tindakan_mcu(\"" . $page_data[$i]->id_paket_mcu . "\",\"" . $page_data[$i]->nama_paket .   "\")'><i class='icon-pencil'></i></a>";
            $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_paket(\"" . $page_data[$i]->id_paket_mcu . "\",\"" . $page_data[$i]->nama_paket . "\")' '><i class='fa fa-trash'></i></button>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama_paket;
            $harga = "Rp. " . number_format($page_data[$i]->harga, 0, ',', '.');
            $status = $page_data[$i]->status;

            $out[$i] = array($no, $edit, $tombol,   $nama, $harga, $status);
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


    public function getDataPaket()
    {
        $id_list_tindakan_mcu = $this->input->post('id_list_tindakan_mcu');
        $db = $this->M_mcu->selectDataTindakanMcu($id_list_tindakan_mcu);

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

    public function hapus_paket()
    {
        $id = $this->input->post('id');
        $this->M_mcu->delete_tindakan($id, 'detail_paket_mcu', 'id_paket');
        $this->M_mcu->delete_tindakan($id, 'list_paket_mcu', 'id_paket_mcu');

        $out['status'] = "success";
        echo json_encode($out);
    }

    /////Labor Mcu
    public function Tindakan_labor_mcu()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Tindakan_labor_mcu';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_Tindakan_labor_mcu()
    {
        $page_data = $this->M_mcu->selectTindakanLaborMcu();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_labor_mcu(\"" . $page_data[$i]->id_daftar_tindakan .  "\")'><i class='icon-pencil'></i></a>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $harga = $page_data[$i]->harga;
            $harga_cost = $page_data[$i]->harga_cost;
            $status = $page_data[$i]->status;

            $out[$i] = array($edit,  $no,  $nama, $harga, $harga_cost, $status);
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    public function getDataLaborMcu()
    {
        $id_daftar_tindakan = $this->input->post('id_daftar_tindakan');
        $db = $this->M_mcu->selectDataLaborMcu($id_daftar_tindakan);

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

    public function edit_labor_mcu()
    {
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $harga = $this->input->post('harga');
        $harga_cost = $this->input->post('harga_cost');
        $status = $this->input->post('status');

        $data = array(
            'nama' => $nama,
            'harga' => $harga,
            'harga_cost' => $harga_cost,
            'status' => $status,
        );
        $out['status'] = "success";
        $this->M_mcu->update_labor_mcu($id, $data);
        echo json_encode($out);
    }
    public function insert_tindakan_labor_mcu()
    {
        $data = $this->session->userdata('data_auth');
        $biaya = $this->input->post('upBiaya');
        $tindakan = $this->input->post('upTindakan');
        $harga_cost = $this->input->post('upCost');


        $data = array(
            'id_daftar_tindakan' => uniqid(),
            'nama' => $tindakan,
            'harga' => $biaya,
            'harga_cost' => $harga_cost,
            'status' => 'AKTIF',
        );
        $this->M_mcu->insert_labor($data, 'list_tindakan_labor_mcu');
        $out['status'] = "success";
        echo json_encode($out);
    }

    ///Radiologi mcu
    public function Tindakan_radio_mcu()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Tindakan_radio_mcu';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_tindakan_radio_mcu()
    {
        $page_data = $this->M_mcu->selectTindakanRadioMcu();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_radio_mcu(\"" . $page_data[$i]->id_daftar_tindakan .  "\")'><i class='icon-pencil'></i></a>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $harga = $page_data[$i]->harga;
            $harga_cost = $page_data[$i]->harga_cost;
            $status = $page_data[$i]->status;

            $out[$i] = array($edit,  $no,  $nama, $harga, $harga_cost, $status);
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    public function getDataRadioMcu()
    {
        $id_daftar_tindakan = $this->input->post('id_daftar_tindakan');
        $db = $this->M_mcu->selectDataRadioMcu($id_daftar_tindakan);

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

    public function edit_radio_mcu()
    {
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $harga = $this->input->post('harga');
        $harga_cost = $this->input->post('harga_cost');
        $status = $this->input->post('status');

        $data = array(
            'nama' => $nama,
            'harga' => $harga,
            'harga_cost' => $harga_cost,
            'status' => $status,
        );
        $out['status'] = "success";
        $this->M_mcu->update_radiologi_mcu($id, $data);
        echo json_encode($out);
    }
    public function insert_tindakan_radio_mcu()
    {
        $data = $this->session->userdata('data_auth');
        $biaya = $this->input->post('upBiaya');
        $tindakan = $this->input->post('upTindakan');
        $harga_cost = $this->input->post('upCost');


        $data = array(
            'id_daftar_tindakan' => uniqid(),
            'nama' => $tindakan,
            'harga' => $biaya,
            'harga_cost' => $harga_cost,
            'status' => 'AKTIF',
        );
        $this->M_mcu->insert_radiologi($data, 'list_tindakan_radiologi_mcu');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_list_paket_mcu()
    {
        $id_mcu = $this->input->post('id_mcu');
        $data = $this->M_mcu->selectPaketMcuById($id_mcu);
        $out = null;

        for ($i = 0; $i < count($data); $i++) {

            $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_list_paket(\"" . $data[$i]->id_tindakan . "\",\"" . $data[$i]->tabel . "\",\"" . $data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";


            $time = strtotime($data[$i]->tanggal);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $no = $i + 1;
            $nama = $data[$i]->nama;
            $tanggal = $date2;
            $harga = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $frek = $data[$i]->frek;
            $id_staff = $data[$i]->staff;
            $nama_paket = $data[$i]->nama_paket;


            $out[$i] = array($no, $tombol,  $nama, $tanggal, $harga, $frek, $nama_paket, $id_staff);
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
