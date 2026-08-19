<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pencarian_pasien extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Pasien');
        $this->load->model('M_SEP');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pencarian_pasien';
        // $page_data['data_pasien'] = $this->M_Pencarian_Pasien->selectDataPasien();
        $page_data['no_rm'] = $this->M_Pencarian_Pasien->getMax();
        $page_data['tipe_masuk'] = $this->M_Pencarian_Pasien->getTipeMasuk();
        $page_data['asal_pasien'] = $this->M_Pencarian_Pasien->getAsalPasien();
        $page_data['cara_bayar'] = $this->M_Pencarian_Pasien->getCaraBayar();
        $page_data['nama_dpjp'] = $this->M_Pencarian_Pasien->getNamaDPJP();
        $page_data['poli'] = $this->M_Pencarian_Pasien->getPoli();
        $page_data['poli_sore'] = $this->M_Pencarian_Pasien->getPoliSore();
        $page_data['kelas'] = $this->M_Pencarian_Pasien->getKelas();
        $page_data['pendidikan'] = $this->M_Pencarian_Pasien->getPendidikan();
        $page_data['pekerjaan'] = $this->M_Pencarian_Pasien->getPekerjaan();
        $page_data['prov'] = $this->M_Pencarian_Pasien->getProvinsi();
        $page_data['kota'] = $this->M_Pencarian_Pasien->getKota();
        $page_data['kec'] = $this->M_Pencarian_Pasien->getKec();
        $page_data['kel'] = $this->M_Pencarian_Pasien->getKel();
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function getNoRM()
    {
        $db = $this->M_Pencarian_Pasien->getMax();
        echo json_encode($db);
        exit;
    }

    public function getDataPasien()
    {
        $no_rm = $this->input->post('pasien');
        $data = $this->M_Pencarian_Pasien->get_tgl_masuk($no_rm);
        $data1 = $this->M_Pencarian_Pasien->select_by_no_rm($no_rm);
        if (empty($data)) {
            $db = $data1;
        } else {
            $db = $data;
        }
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

    public function check_rm()
    {
        $no_rm = $this->input->post("no_rm");

        $tmp_data = $this->M_Pencarian_Pasien->get_rm($no_rm);
        $pasien = $this->M_Pencarian_Pasien->getMax();

        if (count($tmp_data) > 0) {
            echo '<label class="text-danger pt-10"><span><i class="fa fa-times" aria-hidden="true">
                </i> No RM tidak tersedia</span></label>';
        } else {
            if (intval($no_rm) > ($pasien['max'] + 1)) {
                echo '<label class="text-danger pt-10"><span><i class="fa fa-times" aria-hidden="true">
                </i> No RM tidak bisa digunakan</span></label>';
            } else {
                echo '<label class="text-success pt-10"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> No RM tersedia</span></label>';
            }
        }
    }

    public function tampil_riwayat_kunjungan()
    {
        $no_rm = $this->input->post('no_rm');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        if ($jenis_pelayanan == 'UGD') {
            $page_data = $this->M_Pencarian_Pasien->getRiwayatKunjunganUgd($no_rm);
        } else if ($jenis_pelayanan == 'POLI') {
            $page_data = $this->M_Pencarian_Pasien->getRiwayatKunjunganPoli($no_rm);
        } else if ($jenis_pelayanan == 'RANAP') {
            $page_data = $this->M_Pencarian_Pasien->getRiwayatKunjunganRanap($no_rm);
        } else {
            $page_data = $this->M_Pencarian_Pasien->getRiwayatKunjunganRanap('');
        }

        // kakak mau buat yang else disini, tapi gak tau gimana, karena get riwayatnya ada tiga
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $date = strftime("%A, %d %B %Y ", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tgl_masuk = $date;
            if ($page_data[$i]->tgl_keluar == null) {
                $tgl_keluar = '-';
            } else {
                $time1 = strtotime($page_data[$i]->tgl_keluar);
                $date1 = strftime("%A, %d %B %Y ", $time1);
                $tgl_keluar = $date1;
            }

            $nama_pjg = $this->M_Pencarian_Pasien->getNamaPanjang($page_data[$i]->id_history);
            if ($jenis_pelayanan == 'POLI') {
                $unit = $nama_pjg->nama_panjang;
            } else {
                $unit = $page_data[$i]->jenis_pelayanan;
            }
            $nama_dkt = $page_data[$i]->dokter;
            $cara_bayar = $page_data[$i]->caraBayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $tipe = $page_data[$i]->tipe;

            $status = $page_data[$i]->status_rawat;
            if ($status == "dirawat") {
                $tombol = "<span class='label label-warning'>DIRAWAT</span>";
            } else {
                $tombol = "<span class='label label-success'>SELESAI</span>";
            }

            $out[$i] = [$no, $tgl_masuk, $waktu, $tgl_keluar, $unit, $nama_dkt, $tipe, $cara_bayar, $diagnosa, $tombol];
        }

        if ($out == null || $out == "") {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }

    public function identitas_pasien($id)
    {
        $this->load->view('assets/_header');
        $data_staff = $this->session->userdata('data_auth');
        $page_data['sso_user_data'] = $data_staff;
        $page_data['page_content'] = 'page_content/Identitas_pasien';
        // $id = $this->input->post('pasien');
        $data = $this->M_Pencarian_Pasien->get_tgl_masuk($id);
        $data1 = $this->M_Pencarian_Pasien->select_by_no_rm($id);

        $page_data['data'] = $data1;

        $page_data['tgl_masuk'] = $data;

        $page_data['tipe_masuk'] = $this->M_Pencarian_Pasien->getTipeMasuk();
        $page_data['asal_pasien'] = $this->M_Pencarian_Pasien->getAsalPasien();
        $page_data['cara_bayar'] = $this->M_Pencarian_Pasien->getCaraBayar();
        $page_data['nama_dpjp'] = $this->M_Pencarian_Pasien->getNamaDPJP();
        $page_data['poli'] = $this->M_Pencarian_Pasien->getPoli();
        $page_data['poli_sore'] = $this->M_Pencarian_Pasien->getPoliSore();
        $page_data['kelas'] = $this->M_Pencarian_Pasien->getKelas();
        $page_data['pendidikan'] = $this->M_Pencarian_Pasien->getPendidikan();
        $page_data['pekerjaan'] = $this->M_Pencarian_Pasien->getPekerjaan();
        $page_data['prov'] = $this->M_Pencarian_Pasien->getProvinsi();
        // $page_data['kota'] = $this->M_Pencarian_Pasien->getKota();
        // $page_data['kec'] = $this->M_Pencarian_Pasien->getKec();
        // $page_data['kel'] = $this->M_Pencarian_Pasien->getKel();
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tambah_pasien()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('no_rm', 'No RM', 'required');
        if ($this->form_validation->run()) {
            $data = $this->session->userdata('data_auth');
            $username = $data->username;
            $id_staff = $this->M_Pencarian_Pasien->getIdStaff($username);
            $now = new DateTime();
            $id = $this->input->post('no_rm');

            if ($this->input->post('ket') == 'BARU') {
                $tgl = $now->format('Y-m-d H:i:s');
            } else {
                $tgl = '2022-04-01 23:33:27';
            }
            $data = [
                'no_rm' => $id,
                'nama' => $this->input->post('nama'),
                'no_ktp' => $this->input->post('no_ktp'),
                'agama' => $this->input->post('agama'),
                'jenis_kelamin' => $this->input->post('jk'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'nama_ayah' => $this->input->post('nama_ayah'),
                'no_bpjs' => $this->input->post('no_bpjs'),
                'nama_kepala_keluarga' => $this->input->post('namaKK'),
                'telp' => $this->input->post('telp'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'status' => $this->input->post('status'),
                'pendidikan' => $this->input->post('pendidikan'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp' => $this->input->post('no_hp'),
                'kota' => $this->input->post('kota'),
                'alamat' => $this->input->post('alamat'),
                'kecamatan' => $this->input->post('kec'),
                'kelurahan' => $this->input->post('kel'),
                'provinsi' => $this->input->post('prov'),
                'no_id_lain' => $this->input->post('no_id_lain'),
                'tgl_daftar' => $tgl,
                'id_staff' => $id_staff->id_staff,
            ];

            $pasien = $this->db->query("SELECT * FROM pasien where no_rm ='$id'")->result();
            $no_rm = $this->M_Pencarian_Pasien->getMax();
            if (count($pasien) > 0) {
                $out['status'] = "error";
            } else {
                if (intval($id) > ($no_rm['max'] + 1)) {
                    $out['status'] = "No RM tidak bisa digunakan, silahkan dicek kembali!";
                } else {
                    $this->M_Pencarian_Pasien->tambah_pasien($data);
                    $out['status'] = "success";
                }
            }
        } else {
            $out = [
                'error' => true,
                'noRM_error' => form_error('no_rm'),
                'name_error' => form_error('nama'),
                'ktp_error' => form_error('no_ktp'),
                'tgl_error' => form_error('tgl_lahir'),
            ];
        }
        echo json_encode($out);
    }

    public function tambah_kunjungan()
    {
        $data = $this->session->userdata('data_auth');
        $username = $data->username;
        $id_staff = $this->M_Pencarian_Pasien->getIdStaff($username);

        $id_kamar = $this->input->post('tempat_tidur');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $cara_bayar = $this->input->post('cara_bayar');
        $tgl = date("Y-m-d");

        $id_pelayanan = $this->M_Pencarian_Pasien->get_ai_tbl_pelayanan();
        $out = null;

        $no_rm = $this->input->post('id_pasien');
        $poli = $this->input->post('nama_poli');
        $dpjp = $this->input->post('dpjp');

        $db_carabayar = $this->db->get_where("cara_bayar", ['id_cara_bayar' => $cara_bayar])->row();

        $biaya = update_biaya($no_rm, $cara_bayar, $dpjp, $jenis_pelayanan, $poli);

        if (empty($dpjp)) {
            $error['dpjp'] = '*wajib diisi';
        }
        if ($cara_bayar == "-") {
            $error['cara_bayar'] = '*pilih jenis klaim';
        }
        if (!empty($error)) {
            $out['status'] = "failed";
            $out['error'] = $error;
        } else {
            $no_rm = $this->input->post('id_pasien');
            // $pelayanan = $this->db->query("SELECT * from pelayanan p where p.id_pasien = '$no_rm' and p.status = 1
            // and p.status_rawat !='selesai'  and date(p.tgl_masuk) = '$tgl'")->result();
            // if (count($pelayanan) > 0) {
            //     $out['status'] = "Pasien masih terdaftar di hari yang sama. Silahkan didaftarkan di rujukan internal!";
            // } else {

            $data_pelayanan = [
                'id_pelayanan' => $id_pelayanan,
                'id_pasien' => $this->input->post('id_pasien'),
                'asal_pasien' => $this->input->post('asal_pasien'),
                'no_sep' => $this->input->post('no_sep'),
                'status_rawat' => "dirawat",
                'total_bayar' => 0,
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'tgl_keluar' => null,
                'cara_bayar' => $this->input->post('cara_bayar'),
                'diagnosa' => $this->input->post('diagnosa'),
                'cara_keluar' => "-",
                'keadaan_keluar' => "-",
                'keterangan' => $this->input->post('keterangan'),
                'no_jaminan' => "-",
                'tipe' => "LANGSUNG",
                'status' => "1",
                'biaya_jasa' => $biaya['biaya_jasa'],
                'biaya_rs' => $biaya['biaya_rs'],
                'biaya_admin' => $biaya['biaya_admin'],
                'id_staff' => $id_staff->id_staff,
            ];

            // $out['status'] = "success";
            if ($jenis_pelayanan == "1") {
                $tgl = date("Y-m-d");
                $jam = date("H:i:s");
                $id_history_ugd = $this->M_Pencarian_Pasien->get_ai_tbl_history_ugd();
                $data_history = [
                    'id_history' => $id_history_ugd,
                    'jenis_pelayanan' => 'UGD',
                    'tgl_masuk' => date("Y-m-d H:i:s"),
                    'tgl_keluar' => null,
                    'dpjp' => $this->input->post('dpjp'),
                    'id_pelayanan' => $id_pelayanan,
                    'id_staff' => $id_staff->id_staff,
                    'biaya_jasa' => $biaya['biaya_jasa'],
                ];

                $page_data = [
                    'id_antrian' => uniqid(),
                    'inisial' => "-",
                    'no_antri' => "-",
                    'poli' => "UGD",
                    'tanggal' => $tgl,
                    'jam' => $jam,
                    'status' => 0,
                    'jenis_antrian' => 'LANGSUNG',
                    'id_pelayanan' => $id_pelayanan,
                    // 'id_history' => $id_history_ugd,
                    'id_akun' => '-',
                    'rujukan' => '-',
                ];

                //KAMAR KARTU TRACER AUTO
                $data_tracer = [
                    'id_pelayanan' => $id_pelayanan,
                    'jenis_pelayanan' => 'UGD',
                    'no_rm' => $this->input->post('id_pasien'),
                    'time_cetak' => time(),
                    'status' => 0,
                ];

                $duplikat = $this->db->query("SELECT * from pelayanan p, history_pelayanan_ugd h where p.id_pelayanan = h.id_pelayanan
                        and p.id_pasien = '$no_rm' and p.cara_bayar = '$cara_bayar' and h.dpjp ='$dpjp' and h.status = 1 and p.status = 1
                        and p.status_rawat !='selesai'  and date(p.tgl_masuk) = '$tgl' and date(h.tgl_masuk) = '$tgl'")->result();
                // $duplikat = $this->db->get_where("history_pelayanan", ['id_pelayanan' => $id_pelayanan, 'dpjp' => $dpjp,'status'=>1])->result();

                if (count($duplikat) > 0) {
                    $out['status'] = "Pasien sudah terdaftar di poli yang sama dengan DPJP yang sama pada hari yang sama.
                            Silahkan didaftarkan di rujukan internal!";
                } else {
                    $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);
                    $this->M_Pencarian_Pasien->tambah_history_ugd($data_history);
                    $this->M_Pencarian_Pasien->insert($page_data, 'antrian_igd');
                    $this->M_Pencarian_Pasien->tambah_tracer_kamar_kartu($data_tracer);
                    $out['status'] = "success";
                }
            } else if ($jenis_pelayanan == "5") {
                $tgl = date("Y-m-d");
                $jam = date("H:i:s");
                $id_history_ugd = $this->M_Pencarian_Pasien->get_ai_tbl_history_ugd();
                $data_history = [
                    'id_history' => $id_history_ugd,
                    'jenis_pelayanan' => 'UGD PONEK',
                    'tgl_masuk' => date("Y-m-d H:i:s"),
                    'tgl_keluar' => null,
                    'dpjp' => $this->input->post('dpjp'),
                    'id_pelayanan' => $id_pelayanan,
                    'id_staff' => $id_staff->id_staff,
                    'biaya_jasa' => $biaya['biaya_jasa'],
                ];

                $page_data = [
                    'id_antrian' => uniqid(),
                    'inisial' => "-",
                    'no_antri' => "-",
                    'poli' => "UGD PONEK",
                    'tanggal' => $tgl,
                    'jam' => $jam,
                    'status' => 0,
                    'jenis_antrian' => 'LANGSUNG',
                    'id_pelayanan' => $id_pelayanan,
                    // 'id_history' => $id_history_ugd,
                    'id_akun' => '-',
                    'rujukan' => '-',
                ];

                //KAMAR KARTU TRACER AUTO
                $data_tracer = [
                    'id_pelayanan' => $id_pelayanan,
                    'jenis_pelayanan' => 'UGD PONEK',
                    'no_rm' => $this->input->post('id_pasien'),
                    'time_cetak' => time(),
                    'status' => 0,
                ];

                $duplikat = $this->db->query("SELECT * from pelayanan p, history_pelayanan_ugd h where p.id_pelayanan = h.id_pelayanan
                        and p.id_pasien = '$no_rm' and p.cara_bayar = '$cara_bayar' and h.dpjp ='$dpjp' and h.status = 1 and p.status = 1
                        and p.status_rawat !='selesai'  and date(p.tgl_masuk) = '$tgl' and date(h.tgl_masuk) = '$tgl'")->result();
                // $duplikat = $this->db->get_where("history_pelayanan", ['id_pelayanan' => $id_pelayanan, 'dpjp' => $dpjp,'status'=>1])->result();

                if (count($duplikat) > 0) {
                    $out['status'] = "Pasien sudah terdaftar di poli yang sama dengan DPJP yang sama pada hari yang sama.
                            Silahkan didaftarkan di rujukan internal!";
                } else {
                    $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);
                    $this->M_Pencarian_Pasien->tambah_history_ugd($data_history);
                    $this->M_Pencarian_Pasien->insert($page_data, 'antrian_igd');
                    $this->M_Pencarian_Pasien->tambah_tracer_kamar_kartu($data_tracer);
                    $out['status'] = "success";
                }
            } elseif ($jenis_pelayanan == "3") {
                $out['status'] = "success";
                $ruangan = $this->db->get_where('ruangan', ['id_ruangan' => $id_kamar])->row();
                $data_history = [
                    'id_history' => $this->M_Pencarian_Pasien->get_ai_tbl_history_ranap(),
                    'jenis_pelayanan' => 'RAWAT INAP',
                    'tgl_masuk' => date("Y-m-d H:i:s"),
                    'tgl_keluar' => null,
                    'dpjp' => $this->input->post('dpjp'),
                    'id_pelayanan' => $id_pelayanan,
                    'id_kamar' => $id_kamar,
                    'id_staff' => $id_staff->id_staff,
                    'biaya_jasa' => $biaya['biaya_jasa'],
                    'biaya_ruangan' => $ruangan->biaya_ruangan,
                ];

                $data_kamar = [
                    'id_riwayat' => $this->M_Pencarian_Pasien->get_ai_tbl_riwayat(),
                    'id_pelayanan' => $id_pelayanan,
                    'id_kamar' => $id_kamar,
                    'tanggal_masuk' => date("Y-m-d H:i:s"),
                    'tanggal_keluar' => null,
                    'status' => $this->input->post('status'),
                    'id_staff' => $id_staff->id_staff,
                ];
                $data_status_kamar = [
                    'status' => "dipakai",
                ];

                //KAMAR KARTU TRACER AUTO
                $data_tracer = [
                    'id_pelayanan' => $id_pelayanan,
                    'jenis_pelayanan' => 'RAWAT INAP',
                    'no_rm' => $this->input->post('id_pasien'),
                    'time_cetak' => time(),
                    'status' => 0,
                ];

                $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);
                $this->M_Pencarian_Pasien->tambah_history_ranap($data_history);
                $this->M_Pencarian_Pasien->tambah_kamar($data_kamar);
                $this->M_Pencarian_Pasien->ubah_status_kamar($id_kamar, $data_status_kamar);
                $this->M_Pencarian_Pasien->tambah_tracer_kamar_kartu($data_tracer);

                //$this->update_bed();
                $out['status'] = "success";
                //  Update ruangan menggunakan trigger update
                //  Triger insert id_kamar di riwayat kamar

            } elseif ($jenis_pelayanan == "4") {
                $id_history = $this->M_Pencarian_Pasien->get_ai_tbl_history_poli();
                $data_history = [
                    'id_history' => $id_history,
                    'jenis_pelayanan' => 'POLI PRIORITAS',
                    'tgl_masuk' => date("Y-m-d H:i:s"),
                    'tgl_keluar' => null,
                    'dpjp' => $this->input->post('dpjp'),
                    'nama_poli' => $this->input->post('nama'),

                    'id_pelayanan' => $id_pelayanan,
                    'id_staff' => $id_staff->id_staff,
                    'biaya_jasa' => $biaya['biaya_jasa'],
                ];
                $page_data = [
                    'id_antrian' => uniqid(),
                    'inisial' => '-',
                    'no_antri' => '-',
                    'poli' => $this->input->post('nama'),
                    'dpjp' => $this->input->post('dpjp'),
                    'tanggal' => date("Y-m-d"),
                    'jam' => date("H:i:s"),
                    'status' => 0,
                    'jenis_antrian' => 'LANGSUNG',
                    'id_pelayanan' => $id_pelayanan,
                    // 'id_history' => $id_history,
                    'id_akun' => '-',
                    'rujukan' => '-',
                ];
                //KAMAR KARTU TRACER AUTO
                $data_tracer = [
                    'id_pelayanan' => $id_pelayanan,
                    'jenis_pelayanan' => 'POLI',
                    'no_rm' => $this->input->post('id_pasien'),
                    'time_cetak' => time(),
                    'status' => 0,
                ];

                $duplikat = $this->db->query("SELECT * from pelayanan p, history_pelayanan h where p.id_pelayanan = h.id_pelayanan
                        and p.id_pasien = '$no_rm' and p.cara_bayar = '$cara_bayar' and h.dpjp ='$dpjp' and h.nama_poli ='$poli' and h.status = 1 and p.status = 1
                        and p.status_rawat ='dirawat'  and date(p.tgl_masuk) = '$tgl' and date(h.tgl_masuk) = '$tgl'")->result();
                // $duplikat = $this->db->get_where("history_pelayanan", ['id_pelayanan' => $id_pelayanan, 'dpjp' => $dpjp,'status'=>1])->result();

                if (count($duplikat) > 0) {
                    $out['status'] = "Pasien sudah terdaftar di poli yang sama dengan DPJP yang sama pada hari yang sama.
                        Silahkan didaftarkan di rujukan internal!";
                } else if (date('H:i:s') < '07:00:00' && preg_match("/BPJS/i", $db_carabayar->nama) && $db_carabayar->nama != 'BPJSTK') {
                    $out['status'] = "Tidak dapat melakukan tambah kunjungan sebelum jam 07:00 WIB";
                } else {
                    $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);
                    $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $this->M_Pencarian_Pasien->tambah_tracer_kamar_kartu($data_tracer);
                    $out['status'] = "success";
                }
            } else {
                $id_history = $this->M_Pencarian_Pasien->get_ai_tbl_history_poli();
                $data_history = [ //Untuk insert ke history pelayanan poli
                    'id_history' => $id_history,
                    'jenis_pelayanan' => 'POLI',
                    'tgl_masuk' => date("Y-m-d H:i:s"),
                    'tgl_keluar' => null,
                    'dpjp' => $this->input->post('dpjp'),
                    'nama_poli' => $this->input->post('nama_poli'),
                    'id_pelayanan' => $id_pelayanan,
                    'id_staff' => $id_staff->id_staff,
                    'biaya_jasa' => $biaya['biaya_jasa'],
                ];

                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $no_rm = $this->input->post('id_pasien');
                $poli = $this->input->post('nama_poli');
                $no_antri = $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
                $inisial = $this->db->get_where("list_poli", ['id_list_poli' => $poli])->row()->inisial;
                $duplikat = $this->db->query("SELECT * from pelayanan p, history_pelayanan h where p.id_pelayanan = h.id_pelayanan
                        and p.id_pasien = '$no_rm' and p.cara_bayar = '$cara_bayar' and h.dpjp ='$dpjp' and h.nama_poli ='$poli' and h.status = 1 and p.status = 1
                        and p.status_rawat !='selesai'  and date(p.tgl_masuk) = '$tgl' and date(h.tgl_masuk) = '$tgl'")->result();
                // $duplikat = $this->db->get_where("history_pelayanan", ['id_pelayanan' => $id_pelayanan, 'dpjp' => $dpjp,'status'=>1])->result();

                if ($antrian == $no_antri || !empty($antrian)) {
                    $out['status'] = "error";
                } elseif (count($duplikat) > 0) {
                    $out['status'] = "Pasien sudah terdaftar di poli yang sama dengan DPJP yang sama pada hari yang sama.
                            Silahkan didaftarkan di rujukan internal!";
                } else if (date('H:i:s') < '07:00:00' && preg_match("/BPJS/i", $db_carabayar->nama) && $db_carabayar->nama != 'BPJSTK') {
                    $out['status'] = "Tidak dapat melakukan tambah kunjungan sebelum jam 07:00 WIB";
                } elseif ($antrian == null) {
                    $page_data = [
                        'id_antrian' => $id_antrian,
                        'inisial' => $inisial,
                        'no_antri' => $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'dpjp' => $this->input->post('dpjp'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        // 'id_history' => $id_history,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    ];

                    //KAMAR KARTU TRACER AUTO
                    $data_tracer = [
                        'id_pelayanan' => $id_pelayanan,
                        'jenis_pelayanan' => 'POLI',
                        'no_rm' => $this->input->post('id_pasien'),
                        'time_cetak' => time(),
                        'status' => 0,
                    ];

                    // $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);
                    // $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                    // $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    // $this->M_Pencarian_Pasien->tambah_tracer_kamar_kartu($data_tracer);

                    ////////////  antrol onsite ///////////////////////
                    $pasien = $this->db->get_where("pasien", ['no_rm' => $no_rm])->row();
                    $dokter = $this->db->get_where("dokter", ['id_dokter' => $dpjp])->row();
                    $list_poli = $this->db->get_where("list_poli", ['id_list_poli' => $poli])->row();

                    $estimasi = strtotime('+1 minute') * 1000;
                    $kuota = $dokter->kuota;
                    $total_antrian = $this->M_SEP->getTotalAntrian($list_poli->inisial, $dpjp, $tgl);

                    if (preg_match("/BPJS/i", $db_carabayar->nama) && $db_carabayar->nama != 'BPJSTK') {
                        $total_antrian = !empty($total_antrian) ? $total_antrian->bpjs : 0;
                        $sisa_kuota = $kuota - $total_antrian;
                        if ($sisa_kuota > 0) {
                            $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);
                            $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                            $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                            $this->M_Pencarian_Pasien->tambah_tracer_kamar_kartu($data_tracer);
                            $out['status'] = "success";
                        } else {
                            $out['status'] = "Antrian sudah memenuhi jumlah kapasitas";
                        }
                    } else {
                        $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);
                        $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                        $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                        $this->M_Pencarian_Pasien->tambah_tracer_kamar_kartu($data_tracer);

                        $jenis_pasien = "NON JKN";
                        $nomorkartu = '';
                        $nomorreferensi = '';
                        $nik = $pasien->no_ktp;
                        $no_hp = $pasien->no_hp;

                        if ($poli != '111111' && $poli != '6E975PL694') {
                            $jadwal = list_jadwal($list_poli->kdpoli_bpjs, $tgl);
                            // print_arr($jadwal);
                            if ($jadwal != 'no_data') {
                                foreach ($jadwal as $row) {
                                    if ($row->kodedokter == $dokter->kode_dokter) {
                                        $jam_praktek = $row->jadwal;
                                    } else {
                                        $jam_praktek = '08:00-14:00';
                                    }
                                }
                            } else {
                                $jam_praktek = '08:00-17:00';
                            }
                        } else {
                            $jam_praktek = '08:00-17:00';
                        }

                        $data_antrol = [
                            "kodebooking" => $id_antrian,
                            "jenispasien" => $jenis_pasien,
                            "nomorkartu" => $nomorkartu,
                            "nik" => $nik,
                            "nohp" => $no_hp,
                            "kodepoli" => $list_poli->kdpoli_bpjs,
                            "norm" => $no_rm,
                            "tanggalperiksa" => $tgl,
                            "kodedokter" => $dokter->kode_dokter,
                            "jampraktek" => $jam_praktek,
                            "jeniskunjungan" => 1,
                            "nomorreferensi" => $nomorreferensi,
                            "inisial" => strtoupper($list_poli->inisial),
                            "angkaantrean" => $no_antri,
                            "estimasidilayani" => $estimasi,
                            "kuota" => $kuota,
                            "totaljkn" => $total_antrian->bpjs,
                            "totalnonjkn" => $total_antrian->non_bpjs,

                        ];

                        if ($poli != '111111' && $poli != '6E975PL694' && $poli != 'NM3075J78') {
                            $hasil = tambah_antrian($data_antrol);
                        }
                        //  else {
                        //     $hasil['message'] = 'success';
                        // }
                        // $out['message'] = $hasil['message'];

                        // $antrian = $this->db->get_where('antrian_poli', ['id_antrian' => $id_antrian])->row();
                        $pasien1 = $this->M_Pasien->get_pasien_baru($no_rm)->result();

                        if (count($pasien1) > 0) {

                            $data_antrol1 = [
                                'kodebooking' => $id_antrian,
                                'taskid' => 1,
                                'waktu' => strtotime($pasien1[0]->tgl_daftar) * 1000,
                            ];
                            update_antrian($data_antrol1);

                            $random = strtotime("+" . rand(120, 300) . " seconds", strtotime($pasien1[0]->tgl_daftar));
                            $tgl_task2 = date("Y-m-d H:i:s", $random);
                            $data_antrol2 = [
                                'kodebooking' => $id_antrian,
                                'taskid' => 2,
                                'waktu' => $random * 1000,
                            ];
                            update_antrian($data_antrol2);

                            $data_antrol3 = [
                                'kodebooking' => $id_antrian,
                                'taskid' => 3,
                                'waktu' => strtotime("+" . rand(120, 300) . " seconds", strtotime($tgl_task2)) * 1000,
                            ];
                            update_antrian($data_antrol3);
                        } else {
                            $data_antrol = [
                                'kodebooking' => $id_antrian,
                                'taskid' => 3,
                                'waktu' => strtotime('now') * 1000,
                            ];
                            update_antrian($data_antrol);
                        }

                        $out['status'] = "success";
                    }
                }
            }
        }

        $out['id_pelayanan'] = $id_pelayanan;

        echo json_encode($out);
    }
    public function tambah_kunjungan_sore()
    {
        $data = $this->session->userdata('data_auth');
        $username = $data->username;
        $id_staff = $this->M_Pencarian_Pasien->getIdStaff($username);

        $id_kamar = $this->input->post('tempat_tidur');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $id_pelayanan = $this->M_Pencarian_Pasien->get_ai_tbl_pelayanan();
        $out = null;

        $data_pelayanan = [
            'id_pelayanan' => $id_pelayanan,
            'id_pasien' => $this->input->post('id_pasien'),
            'asal_pasien' => $this->input->post('asal_pasien'),
            'no_sep' => $this->input->post('no_sep'),
            'status_rawat' => "dirawat",
            'total_bayar' => 0,
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'tgl_keluar' => null,
            'cara_bayar' => $this->input->post('cara_bayar'),
            'diagnosa' => $this->input->post('diagnosa'),
            'cara_keluar' => "-",
            'keadaan_keluar' => "-",
            'keterangan' => $this->input->post('keterangan'),
            'no_jaminan' => "-",
            'tipe' => "POLI SORE",
            'status' => "1",
            'biaya_jasa' => $this->input->post('biaya_jasa'),
            'biaya_rs' => $biaya_rs,
            'biaya_admin' => $this->input->post('biaya_admin'),
            'id_staff' => $id_staff->id_staff,
        ];

        // $out['status'] = "success";
        if ($jenis_pelayanan == "1") {
            $data_history = [
                'id_history' => $this->M_Pencarian_Pasien->get_ai_tbl_history_ugd(),
                'jenis_pelayanan' => 'UGD',
                'tgl_masuk' => date("Y-m-d H:i:s"),
                'tgl_keluar' => null,
                'dpjp' => $this->input->post('dpjp'),
                'id_pelayanan' => $id_pelayanan,
                'id_staff' => $id_staff->id_staff,
            ];
            $this->M_Pencarian_Pasien->tambah_history_ugd($data_history);
            $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);

            $out['status'] = "success";
        } elseif ($jenis_pelayanan == "3") {
            $out['status'] = "success";
            $data_history = [
                'id_history' => $this->M_Pencarian_Pasien->get_ai_tbl_history_ranap(),
                'jenis_pelayanan' => 'RAWAT INAP',
                'tgl_masuk' => date("Y-m-d H:i:s"),
                'tgl_keluar' => null,
                'dpjp' => $this->input->post('dpjp'),
                'id_pelayanan' => $id_pelayanan,
                'id_kamar' => $id_kamar,
                'id_staff' => $id_staff->id_staff,
            ];

            $data_kamar = [
                'id_riwayat' => $this->M_Pencarian_Pasien->get_ai_tbl_riwayat(),
                'id_pelayanan' => $id_pelayanan,
                'id_kamar' => $id_kamar,
                'tanggal_masuk' => date("Y-m-d H:i:s"),
                'tanggal_keluar' => null,
                'status' => "AKTIF",
                'id_staff' => $id_staff->id_staff,
            ];
            $data_status_kamar = [
                'status' => "dipakai",
            ];

            $this->M_Pencarian_Pasien->ubah_status_kamar($id_kamar, $data_status_kamar);
            $this->M_Pencarian_Pasien->tambah_history_ranap($data_history);
            $this->M_Pencarian_Pasien->tambah_kamar($data_kamar);
            $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);

            //$this->update_bed();
            $out['status'] = "success";
            //  Update ruangan menggunakan trigger update
            //  Triger insert id_kamar di riwayat kamar

        } else {
            $data_history = [
                'id_history' => $this->M_Pencarian_Pasien->get_ai_tbl_history_poli(),
                'jenis_pelayanan' => 'POLI',
                'tgl_masuk' => date("Y-m-d H:i:s"),
                'tgl_keluar' => null,
                'dpjp' => $this->input->post('dpjp'),
                'nama_poli' => $this->input->post('nama_poli'),
                'id_pelayanan' => $id_pelayanan,
                'id_staff' => $id_staff->id_staff,
            ];
            if ($this->input->post('nama_poli') == '111111') {
                $tgl = date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');

                $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);

                $out['status'] = "success";
            } elseif ($this->input->post('nama_poli') == '146582') {
                $tgl = date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');

                $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);

                $out['status'] = "success";
            } elseif ($this->input->post('nama_poli') == '15487956') {
                $tgl = date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);

                $out['status'] = "success";
            } elseif ($this->input->post('nama_poli') == '24QRNLX29R') {
                $tgl = date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);

                $out['status'] = "success";
            } elseif ($this->input->post('nama_poli') == '2JZ09X4K22') {
                $tgl = date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);

                $out['status'] = "success";
            } elseif ($this->input->post('nama_poli') == '6E975PL694') {
                $tgl = date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);

                $out['status'] = "success";
            } elseif ($this->input->post('nama_poli') == 'AX1520L18') {
                $tgl = date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);

                $out['status'] = "success";
            } elseif ($this->input->post('nama_poli') == 'E00RX703') {
                $tgl = date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);

                $out['status'] = "success";
            } elseif ($this->input->post('nama_poli') == 'HLGI4176K8') {
                $tgl = date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);

                $out['status'] = "success";
            } elseif ($this->input->post('nama_poli') == 'I9NXY5VNQG') {
                $tgl = date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri = $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);

                if ($antrian == $no_antri || !empty($antrian)) {
                    $out['status'] = "error";
                } elseif ($antrian == null) {
                    $page_data = [
                        'id_antrian' => $id_antrian,
                        'inisial' => 'j',
                        'no_antri' => $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    ];
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                    $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);

                    $out['status'] = "success";
                }
            } elseif ($this->input->post('nama_poli') == 'MWK205D30K') {
                $tgl = date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);

                $out['status'] = "success";
            } elseif ($this->input->post('nama_poli') == 'O782EGU4PR') {
                $tgl = date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');

                $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);

                $out['status'] = "success";
            } elseif ($this->input->post('nama_poli') == 'ODI8643C27') {
                $tgl = date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);

                $out['status'] = "success";
            } elseif ($this->input->post('nama_poli') == 'RZE28J1098') {
                $tgl = date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);

                $out['status'] = "success";
            } elseif ($this->input->post('nama_poli') == 'UQ81K76373') {
                $tgl = date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $this->M_Pencarian_Pasien->tambah_history_poli($data_history);
                $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);

                $out['status'] = "success";
            }

            // $out['status'] = "success";
        }

        $out['biaya_rs'] = $biaya_rs;

        echo json_encode($out);
    }
    public function update_bed()
    {

        $rows = $this->M_Pencarian_Pasien->get_room();
        foreach ($rows as $row) {
            $data = json_encode($row);
            $headers = generate_headers();
            // print_arr($headers);
            /**
            Sending record to API Aplicares (for UPDATE)
             */
            $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL, "https://www.khayalan.net");
            curl_setopt($ch, CURLOPT_URL, base_aplicares() . "aplicaresws/rest/bed/update/0067R003");
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_TIMEOUT, 60);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $content = curl_exec($ch);
            $err = curl_error($ch);
            // echo "Response : " . $content;
            // print_arr($err);
            // print_arr($content);

            // close cURL resource, and free up system resources
            curl_close($ch);
        }
        $out['status'] = "success";
        echo json_encode($out);
        exit;
    }

    public function edit_pasien()
    {
        $id = $this->input->post('no_rm');
        $data = [
            'no_rm' => $id,
            'nama' => $this->input->post('nama'),
            'no_ktp' => $this->input->post('no_ktp'),
            'agama' => $this->input->post('agama'),
            'jenis_kelamin' => $this->input->post('jk'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'no_bpjs' => $this->input->post('no_bpjs'),
            'nama_kepala_keluarga' => $this->input->post('namaKK'),
            'telp' => $this->input->post('telp'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'status' => $this->input->post('status'),
            'pendidikan' => $this->input->post('pendidikan'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'no_hp' => $this->input->post('no_hp'),
            'kota' => $this->input->post('kota'),
            'alamat' => $this->input->post('alamat'),
            'kecamatan' => $this->input->post('kec'),
            'kelurahan' => $this->input->post('kel'),
            'provinsi' => $this->input->post('prov'),
            'no_id_lain' => $this->input->post('no_id_lain'),

        ];

        $this->M_Pencarian_Pasien->ubah_pasien($id, $data);
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function getKota()
    {
        $nm_prov = $this->input->post('prov');
        $data = $this->M_Pencarian_Pasien->getKotaByProv($nm_prov);
        echo json_encode($data);
    }
    public function getKec()
    {
        $nm_kab = $this->input->post('kota');
        $data = $this->M_Pencarian_Pasien->getKecByKota($nm_kab);
        echo json_encode($data);
    }
    public function getKel()
    {
        $nm_kec = $this->input->post('kec');
        $data = $this->M_Pencarian_Pasien->getKelByKec($nm_kec);
        echo json_encode($data);
    }
    public function getKamar()
    {
        $kelas = $this->input->post('kelas');
        $data = $this->M_Pencarian_Pasien->getKamar($kelas);
        echo json_encode($data);
    }

    //Antrian
    public function getAntrian()
    {
        $poli = $this->input->post('poli');
        $db = $this->M_Pencarian_Pasien->getAntrian($poli);

        $i = 0;
        if ($db[$i]->no_antri == 0) {
            $db = [3];
        } else {
            $db = [
                $id_max = $db[$i]->no_antri + 1,
            ];
        }

        echo json_encode($db);
        exit;
    }

    //Antrian Prioritas
    public function getAntrianPrioritas()
    {
        $poli = $this->input->post('poli');
        $db = $this->M_Pencarian_Pasien->getAntrian($poli);

        $i = 0;
        if ($db[$i]->no_antri == 0) {
            $db = [3];
        } else {
            $db = [
                $id_max = $db[$i]->no_antri + 1,
            ];
        }

        echo json_encode($db);
        exit;
    }

    //Dokter
    // Dokter
    public function getDokter()
    {
        $tipe = $this->input->post('tipe_masuk'); // 1=UGD, 3=RANAP, 4=PRIORITAS, lainnya=POLI RAJAL
        $poli = $this->input->post('poli');

        // default
        $data = [];

        // RANAP → pakai daftar DPJP (full)
        if ($tipe == 3) {
            $data = $this->M_Pencarian_Pasien->getNamaDPJP();
            echo json_encode($data);
            return;
        }

        // Ambil kdpoli_bpjs dari poli (kalau ada)
        $kdpoli = null;
        if (!empty($poli)) {
            $rowPoli = $this->db->get_where('list_poli', ['id_list_poli' => $poli])->row();
            if ($rowPoli) {
                $kdpoli = $rowPoli->kdpoli_bpjs;
            }
        }

        if ($tipe == 1) {
            // UGD → default ke spesialis umum (UMU).
            // Kalau user memilih poli tertentu, ikut spesialis poli tsb (tetap tidak bikin kode dokter baru).
            $data = $this->M_Pencarian_Pasien->getDokter(!empty($kdpoli) ? $kdpoli : 'UMU');
        } else {
            // POLI RAJAL / PRIORITAS / lainnya → ikut spesialis dari poli yang dipilih.
            // Tidak fallback ke kode buatan; kalau poli kosong ya kosongkan hasilnya.
            if (!empty($kdpoli)) {
                $data = $this->M_Pencarian_Pasien->getDokter($kdpoli);
            } else {
                $data = [];
            }
        }

        echo json_encode($data);
    }

    // public function getDokter()
    // {
    //     $tipe = $this->input->post('tipe_masuk');
    //     $poli = $this->input->post('poli');
    //     if ($tipe == 1 || $tipe == 5) {
    //         $spes = "UMU";
    //         $data = $this->M_Pencarian_Pasien->getDokter($spes);
    //     } elseif ($tipe == 3) {
    //         $data = $this->M_Pencarian_Pasien->getNamaDPJP();
    //     } elseif ($tipe == 4) {
    //         $db = $this->db->get_where('list_poli', ['id_list_poli' => $poli])->row();

    //         $spes = $db->kdpoli_bpjs;
    //         $data = $this->M_Pencarian_Pasien->getDokter($spes);
    //     } else {
    //         $db = $this->db->get_where('list_poli', ['id_list_poli' => $poli])->row();

    //         $spes = $db->kdpoli_bpjs;
    //         $data = $this->M_Pencarian_Pasien->getDokter($spes);
    //     }
    //     echo json_encode($data);
    // }

    //Dokter
    public function getDokterPrioritas()
    {
        $tipe = $this->input->post('tipe_masuk');
        $poli = $this->input->post('poli');
        $db = $this->db->get_where('list_poli', ['id_list_poli' => $poli])->row();

        $spes = $db->kdpoli_bpjs;

        $data = $this->M_Pencarian_Pasien->getDokter($spes);
        echo json_encode($data);
    }

    public function getNamaPoli()
    {
        $data = $this->M_Pencarian_Pasien->getPoli();
        echo json_encode($data);
    }

    public function getNamaPoliPrioritas()
    {
        $data = $this->M_Pencarian_Pasien->getPoliPrioritas();
        echo json_encode($data);
    }

    public function check_data()
    {
        $cari_data = $this->input->post('cari_data');
        if ($cari_data == '-999' || $cari_data == '0099') {
            $out = "";
        } else {
            $page_data = $this->M_Pencarian_Pasien->get_cek_like($cari_data);
            $out = null;

            for ($i = 0; $i < count($page_data); $i++) {
                $tombol = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_pasien(\"" . $page_data[$i]->no_rm . "\")'><i class='fa fa-pencil'></i></button>";
                $birthDate = $page_data[$i]->tgl_lahir;
                $date = new DateTime($birthDate);
                $now = new DateTime();
                $interval = $now->diff($date);

                $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";
                $tgl = strtotime($page_data[$i]->tgl_lahir);
                $no = $i + 1;
                $no_rm = " " . sprintf('%06d', $page_data[$i]->no_rm);
                $rm_lama = " " . sprintf('%06d', $page_data[$i]->rm_lama);
                $no_bpjs = $page_data[$i]->no_bpjs;
                $no_ktp = $page_data[$i]->no_ktp;
                $nama = $page_data[$i]->nama;
                $jenis_kelamin = $page_data[$i]->jenis_kelamin;
                $tgl_lahir = strftime(" %d %B %Y ", $tgl);
                $page_data[$i]->tgl_lahir;
                $kota = $page_data[$i]->kota;
                $umur = $umur;
                $alamat = $page_data[$i]->alamat;
                $aksi = $tombol;

                $out[$i] = [$no, $aksi, $no_rm, $rm_lama, $nama, $jenis_kelamin, $tgl_lahir, $no_bpjs, $no_ktp, $umur, $kota, $alamat];
            }

            if ($out == null || $out == "") {
                echo '{"data":""}';
                exit;
            } else {
                $page_data['data'] = $out;
                echo json_encode($page_data);
                exit;
            }
        }
    }
    public function cetak_antrian($antrian, $poli, $total)
    {
        $pasien = $this->M_Pencarian_Pasien->getCetakById($antrian, $poli);

        $data['cetak'] = $pasien;
        $data['sisa_antrian'] = $this->M_Pencarian_Pasien->getSisaAntrian($poli);
        $data['total'] = $pasien['total'];
        $data['staff'] = $pasien['staff'];
        $this->load->view('print/cetak_antrian_rm', $data);
    }

    public function cetak_antrian_pasien($id, $tipe)
    {
        if ($tipe == 'poli') {
            $pasien = $this->M_Pencarian_Pasien->getCetakAntrianById($id);
            $data['sisa_antrian'] = $this->M_Pencarian_Pasien->getSisaAntrianPasien($pasien['poli']);
        } else {
            $pasien = $this->M_Pencarian_Pasien->getCetakAntrianByIdPrio($id);
            $data['sisa_antrian']['no_antri'] = 1;
        }

        // if (!empty($pasien)) {
        $data['cetak'] = $pasien;
        $data['total'] = $pasien['total'];
        $data['staff'] = $pasien['staff'];
        $this->load->view('print/cetak_antrian_rm', $data);
        // } else {
        //     echo "<script type='text/javascript'>alert('" . $data['metaData']['message'] . "');window.history.go(-1);</script>";
        // }
    }

    public function cetak_antrian_pasienIGD($id_pelayanan, $id_history)
    {
        $pasien = $this->M_Pencarian_Pasien->getCetakAntrianIGDById($id_pelayanan, $id_history);
        $data['pasien'] = $pasien;
        $cara_bayar = $pasien['cara_bayar'];
        $data['cara_bayar'] = $this->db->get_where("cara_bayar", ['id_cara_bayar' => $cara_bayar])->row()->nama;
        $data['staff'] = $pasien['staff'];

        // $data['sisa_antrian'] = $this->M_Pencarian_Pasien->getSisaAntrianPasienIGD($pasien['UGD']);
        $data['total'] = $pasien['total'];
        $this->load->view('print/cetak_antrian_rm_ugd', $data);
    }

    public function cetak_antrian_ugd($no_rm, $cara_bayar, $id_pelayanan)
    {
        $pasien = $this->M_Pencarian_Pasien->getCetakAntrianIGDById($id_pelayanan, '');
        $data['pasien'] = $this->db->get_where("pasien", ['no_rm' => $no_rm])->row_array();
        $data['cara_bayar'] = $this->db->get_where("cara_bayar", ['id_cara_bayar' => $cara_bayar])->row()->nama;
        $data['staff'] = $this->M_Pencarian_Pasien->getCetakAntrianIGDByRm($no_rm)->staff;
        $data['total'] = $pasien['total'];
        $this->load->view('print/cetak_antrian_rm_ugd', $data);
    }
    public function getPasienBaru()
    {

        $pasien1 = $this->M_Pasien->get_pasien_baru($this->input->post('id_pasien'))->result();
        if (count($pasien1) > 0) {
            $out['status'] = 'baru';
        } else {
            $out['status'] = 'lama';
        }
        echo json_encode($out);
    }

    public function getBiaya()
    {

        $no_rm = $this->input->post('id_pasien');
        $cara_bayar = $this->input->post('cara_bayar');
        $dpjp = $this->input->post('dpjp');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $poli = $this->input->post('poli');
        $biaya = update_biaya($no_rm, $cara_bayar, $dpjp, $jenis_pelayanan, $poli);

        echo json_encode($biaya);
    }
}