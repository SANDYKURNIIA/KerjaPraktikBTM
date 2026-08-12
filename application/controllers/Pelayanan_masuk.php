<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pelayanan_masuk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Pelayanan_masuk');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Pasien');
    }
    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pelayanan_masuk';
        $page_data['poli'] = $this->M_Pelayanan_masuk->getPoli();
        $page_data['kelas'] = $this->M_Pelayanan_masuk->getKelas();
        $page_data['tipe'] = $this->M_Pelayanan_masuk->getNoTidur();
        $page_data['data'] = $this->M_Pelayanan_masuk->selectPelayananMasuk();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    /*public function print_gelang($id)
    {
        $data['cetak_gelang'] = $this->M_Pelayanan_masuk->getGelangById($id);;
        $this->load->view('print/cetak_gelang', $data);
    }
    public function print_label($id)
    {
        $data['cetak_label'] = $this->M_Pelayanan_masuk->getLabelById($id);;
        $this->load->view('print/cetak_label', $data);
    }*/


    public function getdata_pelayanan()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $db = $this->M_Pelayanan_masuk->selectDataPelayananby_id($id_pelayanan);
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

    public function tampil_pelayanan_masuk()
    {
        $staff = $this->session->userdata('data_auth');
        $page_data = $this->M_Pelayanan_masuk->selectPelayananMasuk();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tombol = "<button class='btn btn-default btn-icon-anim btn-square' data-toggle='modal' onclick='edit_data_pelayanan(\"" . $page_data[$i]->id_pelayanan . "\")'><i class='fa fa-pencil'></i></button>";
            if ($staff->ruangan == "SRO") {
            $delete = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='delete_pasien(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->tipe . "\")' '><i class='fa fa-trash '></i></button>";
            }else{
                $delete="";
            }
            $birthDate = $page_data[$i]->tgl_lahir;
            $date = new DateTime($birthDate);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";


            $time = strtotime($page_data[$i]->tgl_masuk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $tgl = strtotime($page_data[$i]->tgl_lahir);
            $date3 = strftime("%A, %d %B %Y ", $tgl);

            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $nama = $page_data[$i]->nama;
            $tgl_masuk = $date2;
            $jam_masuk = $waktu;
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $tgl_lahir = $date3;
            $umur = $umur;
            $agama = $page_data[$i]->agama;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $no_sep = $page_data[$i]->no_sep;

            if ($staff->izin_akses == "admin") {
                $out[$i] = array($no, $delete, $tombol, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $agama, $cara_bayar, $diagnosa, $no_sep);
            } else {
                $out[$i] = array($no, $tombol, $no_rm, $nama, $tgl_masuk, $jam_masuk, $jenis_kelamin, $tgl_lahir, $umur, $agama, $cara_bayar, $diagnosa, $no_sep);
            }
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

    public function getKamar()
    {
        $kelas = $this->input->post('kelas');
        $data = $this->M_Pelayanan_masuk->getKamar($kelas);
        echo json_encode($data);
    }
    public function getRuangan()
    {
        $data = $this->M_Pelayanan_masuk->getKelas();
        echo json_encode($data);
    }
    public function tambah_kunjungan()
    {
        $sso_user_data = $this->session->userdata('sso_user_data');
        $username = $sso_user_data->username;
        $id_staff = $this->M_Pelayanan_masuk->getIdStaff($username);
        $id_pelayanan = $this->input->post('id_pelayanan');
        $tgl_masuk = $this->input->post('tgl_masuk');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $dpjp = $this->input->post('dpjp');
        $nama_poli = $this->input->post('nama_poli');
        $id_kamar = $this->input->post('id_tempat_tidur');
        $id_kamar2 = $this->input->post('id_tempat_tidur2');
        $pasien = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan, 'status' => 1])->row();

        $biaya = update_biaya($pasien->id_pasien, $pasien->cara_bayar, $dpjp, $jenis_pelayanan, $nama_poli);

        if ($jenis_pelayanan == "1") {
            $id_history_ugd = $this->M_Pelayanan_masuk->get_ai_tbl_history_ugd();
            $data_history = array(
                'id_history' => $id_history_ugd,
                'jenis_pelayanan' => 'UGD',
                'tgl_masuk' => date('Y-m-d H:i:s'),
                'dpjp' => $dpjp,
                'id_pelayanan' => $id_pelayanan,
                'id_staff' => $id_staff->id_staff,
                'biaya_jasa' => $biaya['biaya_jasa'],
            );
            $page_data = array(
                'id_antrian' => uniqid(),
                'inisial' => "-",
                'no_antri' =>    "-",
                'poli' => "UGD",
                'tanggal' => date('Y-m-d'),
                'jam' => date('H:i:s'),
                'status' => 0,
                'jenis_antrian' => 'LANGSUNG',
                'id_pelayanan' => $id_pelayanan,
                'id_history' => $id_history_ugd,
                'id_akun' => '-',
                'rujukan' => '-',
            );
            $this->M_Pelayanan_masuk->tambah_history_ugd($data_history);
            $this->M_Pencarian_Pasien->insert($page_data, 'antrian_igd');

            $out['status'] = "success";
            echo json_encode($out);
        } elseif ($jenis_pelayanan == "2") {
            $poli = $this->input->post('nama_poli');
            $duplikat = $this->db->query("SELECT * from history_pelayanan h where h.nama_poli ='$poli' and h.id_pelayanan='$id_pelayanan' and h.status = 1 ")->result();
            if (count($duplikat) > 0) {
                $out['status'] = "Pasien sudah dirujuk internal di poli yang sama";
            } else {
                $id_history = $this->M_Pelayanan_masuk->get_ai_tbl_history_poli();
                $data_history = array(
                    'id_history' => $id_history,
                    'jenis_pelayanan' => 'POLI',
                    'tgl_masuk' => date('Y-m-d H:i:s'),
                    'dpjp' => $dpjp,
                    'nama_poli' => $this->input->post('nama_poli'),
                    'id_pelayanan' => $id_pelayanan,
                    'id_staff' => $id_staff->id_staff,
                    'biaya_jasa' => $biaya['biaya_jasa'],
                );
                $this->M_Pelayanan_masuk->tambah_history_poli($data_history);

                $inisial = $this->db->get_where("list_poli", ['id_list_poli' => $nama_poli])->row()->inisial;
                $db = $this->M_Pencarian_Pasien->getAntrian($nama_poli);
                $no_antri = ($db[0]->no_antri == 0) ? 3 : $db[0]->no_antri + 1;
                $id_antrian = uniqid();
                $page_data = array(
                    'id_antrian' => $id_antrian,
                    'inisial' => $inisial,
                    'no_antri' => $no_antri,
                    'poli' => $this->input->post('nama_poli'),
                    'dpjp' => $dpjp,
                    'tanggal' => date('Y-m-d'),
                    'jam' => date("H:i:s"),
                    'status' => 0,
                    'jenis_antrian' => 'LANGSUNG',
                    'id_pelayanan' => $id_pelayanan,
                    'id_history' => $id_history,
                    'id_akun' => '-',
                    'rujukan' => '-',
                );
                $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);

                $out['id_antrian'] = $id_antrian;
                $out['status'] = "success";
            }

            echo json_encode($out);
        } elseif ($jenis_pelayanan == "3") {
            $ranap = $this->db->get_where('history_pelayanan_ranap', ['id_pelayanan' => $id_pelayanan, 'status' => 1])->result();
            if (count($ranap) > 0) {
                $out['status'] = "Pasien sudah terdaftar di Rawat Inap";
            } else {
                $ruangan = $this->db->get_where('ruangan', ['id_ruangan' => $id_kamar])->row();
                $data_history_ranap = array(
                    'id_history' => $this->M_Pelayanan_masuk->get_ai_tbl_history_ranap(),
                    'jenis_pelayanan' => 'RAWAT INAP',
                    'tgl_masuk' => date('Y-m-d H:i:s'),
                    'dpjp' => $dpjp,
                    'id_pelayanan' => $id_pelayanan,
                    'id_kamar' => $id_kamar,
                    'id_staff' => $id_staff->id_staff,
                    'biaya_ruangan' =>  $ruangan->biaya_ruangan,

                );
                $data_kamar = array(
                    'id_riwayat' => $this->M_Pelayanan_masuk->get_ai_tbl_idriway(),
                    'id_pelayanan' => $id_pelayanan,
                    'id_kamar' => $id_kamar,
                    'tanggal_masuk' => date('Y-m-d H:i:s'),
                    'tanggal_keluar' => NULL,
                    'status' => $this->input->post('status'),
                    'id_staff' => $id_staff->id_staff,
                );

                $this->M_Pelayanan_masuk->tambah_history_ranap($data_history_ranap);

                $this->M_Pelayanan_masuk->tambah_kamar($data_kamar);

                $data_status_kamar = array(
                    'status' => "dipakai",
                );
                $this->M_Pelayanan_masuk->ubah_status_kamar($id_kamar, $data_status_kamar);
                $out['status'] = "success";
            }
            echo json_encode($out);
        } elseif ($jenis_pelayanan == "4") {
            $data_history = array(
                'id_history' => $this->M_Pelayanan_masuk->get_ai_tbl_history_poli(),
                'jenis_pelayanan' => 'POLI PRIORITAS',
                'tgl_masuk' => date("Y-m-d H:i:s"),
                'tgl_keluar' => NULL,
                'dpjp' => $this->input->post('dpjp'),
                'nama_poli' => $this->input->post('nama'),

                'id_pelayanan' => $id_pelayanan,
                'id_staff' => $id_staff->id_staff,
                'biaya_jasa' => $biaya['biaya_jasa'],
            );

            $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
            $out['status'] = "success";
            echo json_encode($out);
        } elseif ($jenis_pelayanan == "5") { //if ODC 
            //Data ranap ODC
            $ruangan = $this->db->get_where('ruangan', ['id_ruangan' => $id_kamar2])->row();
            $data_history_ranap = array(
                'id_history' => $this->M_Pelayanan_masuk->get_ai_tbl_history_ranap(),
                'jenis_pelayanan' => 'ONE DAY CARE (ODC)',
                'tgl_masuk' => date('Y-m-d H:i:s'),
                'dpjp' => $dpjp,
                'id_pelayanan' => $id_pelayanan,
                'id_kamar' => $id_kamar2,
                'id_staff' => $id_staff->id_staff,
                'biaya_ruangan' =>  $ruangan->biaya_ruangan,
            );
            //Data Kamar ODC
            $data_kamar = array(
                'id_riwayat' => $this->M_Pelayanan_masuk->get_ai_tbl_idriway(),
                'id_pelayanan' => $id_pelayanan,
                'id_kamar' => $id_kamar2,
                'tanggal_masuk' => date('Y-m-d H:i:s'),
                'tanggal_keluar' => NULL,
                'status' => $this->input->post('status'),
                'id_staff' => $id_staff->id_staff,
            );

            $this->M_Pelayanan_masuk->tambah_history_ranap($data_history_ranap);
            $this->M_Pelayanan_masuk->tambah_kamar($data_kamar);

            // $data_status_kamar = array(
            //     'status' => "dipakai",
            // );
            // $this->M_Pelayanan_masuk->ubah_status_kamar($id_kamar, $data_status_kamar);
            $out['status'] = "success";
            echo json_encode($out);
        }
    }
    public function getDokter()
    {
        $tipe = $this->input->post('tipe_masuk');
        $poli = $this->input->post('poli');
        if ($tipe == 1) {
            $spes = "UMU";
            $data = $this->M_Pelayanan_masuk->getDokter($spes);
        } elseif ($tipe == 3) {
            $data = $this->M_Pelayanan_masuk->getNamaDPJP();
        } else {
            $db = $this->db->get_where('list_poli', ['id_list_poli' => $poli])->row();

            $spes = $db->kdpoli_bpjs;
            $data = $this->M_Pelayanan_masuk->getDokter($spes);
        }
        echo json_encode($data);
    }
    public function getNamaDokter()
    {
        $query =  $this->input->post('query');
        $cari = $query['term'];
        $db = $this->M_Pelayanan_masuk->getDokterByNama($cari);
        foreach ($db as $row) {
             $data[] = array(
                'id' => "" . $row['nama'] . "",
                'value' => "" . $row['nama'],
                'id_dokter' => $row['id_dokter'],
            );
        }
        echo json_encode($data);
    }

    public function getNamaPoli()
    {
        $data = $this->M_Pelayanan_masuk->getPoli();
        echo json_encode($data);
    }

    public function getNamaPoliODC()
    {
        $data = $this->M_Pelayanan_masuk->getPoliODC();
        echo json_encode($data);
    }

    public function  delete_pasien()
    {
        $staff = $this->session->userdata('data_auth');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $tipe = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row()->tipe;
        if ($tipe == 'APM') {
            $status = '2';
        } else {
            $status = '0';
        }


        $page_data = array(
            'status' => $status,
            'ket' => $staff->id_staff,
            'tgl_hapus' => date('Y-m-d H:i:s'),
        );
        $where = array(
            'id_pelayanan' => $id_pelayanan
        );
        $this->M_Pasien->delete_data_rajal($where, $page_data, 'pelayanan');
        //////////////  antrol ///////////////////////
        $antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $id_pelayanan]);
        if (count($antrian->result()) > 0) {
            $data_antrol = [
                'kodebooking' => $antrian->row()->id_antrian,
                'taskid' => 99,
                'waktu' => strtotime('now') * 1000
            ];
            update_antrian($data_antrol);
        }
        //end
        $out['status'] = 'success';
        echo json_encode($out);
    }

    public function  delete_pasien_konfirm_batal()
    {
        $staff = $this->session->userdata('data_auth');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $tipe = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row()->tipe;
        if ($tipe == 'APM') {
            $status = '2';
        } else {
            $status = '0';
        }

        $page_data = array(
            'status' => $status,
            'ket' => $staff->id_staff,
            'tgl_hapus' => date('Y-m-d H:i:s'),
        );
        $where = array(
            'id_history' => $id_history
        );
        $this->M_Pasien->delete_data_rajal($where, $page_data, 'history_pelayanan');
        //////////////  antrol ///////////////////////
        $antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $id_pelayanan]);
        if (count($antrian->result()) > 0) {
            $data_antrol = [
                'kodebooking' => $antrian->row()->id_antrian,
                'taskid' => 99,
                'waktu' => strtotime('now') * 1000
            ];
            update_antrian($data_antrol);
        }
        //end
        $out['status'] = 'success';
        echo json_encode($out);
    }
}
