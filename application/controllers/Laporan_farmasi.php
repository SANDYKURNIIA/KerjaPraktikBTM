<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_Farmasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        // $this->load->model('M_Apotik');
        $this->load->model('M_Logistik_farmasi');
        $this->load->model('M_Laporan_farmasi');
    }

    public function Laporan_kartu_persediaan()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        if ($perequest == "apotik") {
            $stok = "stok_apotik";
        } else if ($perequest == "logistik farmasi") {
            $stok = "stok_logistik";
        } else if ($perequest == "deporanap") {
            $stok = "stok_depo";
        }
        $this->load->view('assets/_header');
        $page_data['obat'] = $this->M_Logistik_farmasi->selectStok($stok);

        $page_data['page_content'] = 'page_content/Laporan_kartu_persediaan';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_kartu_persediaan()
    {
        $data_staff = $this->session->userdata('data_auth');

        $id_logistik = $this->input->post('id_logistik');
        $tahun = $this->input->post('tahun');

        if ($data_staff->tipe == "deporanap") {
            $stok = "stok_depo";
        } else if ($data_staff->tipe == "apotik") {
            $stok = "stok_apotik";
        } else if ($data_staff->tipe == "logistik farmasi") {
            $stok = "stok_logistik";
        }

        if ($this->input->post('id_logistik')) {
            $page_data = $this->M_Laporan_farmasi->kartu_persediaan($tahun, $id_logistik, $stok);
            $db_obat = $this->db->get_where('list_logistik', ['id_logistik' => $id_logistik])->row();

            // print_r($page_data);

            for ($i = 0; $i < count($page_data); $i++) {
                $no = $i + 1;
                $bulan = $page_data[$i]->nama;
                $id = $page_data[$i]->id;

                $masuk = ($page_data[$i]->masuk != null) ? $page_data[$i]->masuk : 0;
                $keluar = ($page_data[$i]->keluar != null) ? $page_data[$i]->keluar : 0;
                $sisa = ($page_data[$i]->sisa != null) ? $page_data[$i]->sisa : 0;

                $periode = $tahun . '-' . $id;

                $data_struk = $this->M_Logistik_farmasi->getHargaBeli($periode, $id_logistik);

                $data_struk_last = $this->M_Logistik_farmasi->getHargaBeli_last($periode, $id_logistik);
                $harga_persediaan = $db_obat->harga_persediaan;

                if ($masuk == 0) {
                    $harga_beli = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? round($data_struk_last->harga_beli, 2) : $harga_persediaan;
                } else {
                    if ($data_staff->tipe == "logistik farmasi") {
                        $harga_beli = isset($data_struk) ? round($data_struk->harga_beli, 2) : 0;
                    } else {
                        $harga_beli = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? round($data_struk_last->harga_beli, 2) : $harga_persediaan;
                    }
                }

                $nilai_masuk = round($harga_beli * $masuk, 2);
                $nilai_keluar = round($harga_beli * $keluar, 2);
                $nilai_sisa = round($harga_beli * $sisa, 2);

                $out[$i] = array($no, $bulan, $masuk, $nilai_masuk, $keluar, $nilai_keluar, $sisa, $nilai_sisa);
            }
        } else {
            $out = null;
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

    public function kunci_so()
    {
        $data_staff = $this->session->userdata('data_auth');
        $tipe = $data_staff->tipe;

        $periode = $this->input->post('periode');
        $date = strtotime($periode);
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $data_staff->tipe])->row();


        $stok = $data_adm->stok;
        $this->M_Logistik_farmasi->delete_tindakan(['tipe_stok' => $tipe, 'stok' => $stok, 'bulan' => date("m", $date), 'tahun' => date('Y', $date)], 'stop_opname_gudang');
        $page_data = $this->M_Logistik_farmasi->selectLaporan_Persediaan($periode, $stok);

        for ($i = 0; $i < count($page_data); $i++) {

            $id_logistik = $page_data[$i]->id_logistik;
            $hna = $page_data[$i]->harga_cost;
            $ppn = $page_data[$i]->ppn;
            $hargappn = round($hna * (1 + ($ppn / 100)), 2);
            $harga_persediaan = $page_data[$i]->harga_persediaan;
            $vendor = $page_data[$i]->distributor;

            $stok_awal =  $page_data[$i]->awal;
            $penerimaan =  $page_data[$i]->masuk;
            $pengeluaran =  abs($page_data[$i]->keluar);
            $stok_akhir =  $page_data[$i]->akhir;

            $data_struk = $this->M_Logistik_farmasi->getHargaBeli($periode, $id_logistik);

            $data_struk_last = $this->M_Logistik_farmasi->getHargaBeli_last($periode, $id_logistik);
            if ($penerimaan == 0) {
                $distributor = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? $data_struk_last->id_produsen : $vendor;
                $harga_beli = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? round($data_struk_last->harga_beli, 2) : $harga_persediaan;
                $tgl_struk = (isset($data_struk_last) && $data_struk_last->harga_beli > 0)  ? date('Y-m-d', strtotime($data_struk_last->tgl_struk)) : '-';
                $tgl_exp = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? date('Y-m-d', strtotime($data_struk_last->tgl_exp)) : '-';
            } else {
                if ($data_staff->tipe == "logistik farmasi") {
                    $distributor = isset($data_struk) ? $data_struk->id_produsen : '-';
                    $harga_beli = isset($data_struk) ? round($data_struk->harga_beli, 2) : 0;
                    $tgl_struk = isset($data_struk->tgl_struk) ? date('Y-m-d', strtotime($data_struk->tgl_struk)) : '-';
                    $tgl_exp = isset($data_struk->tgl_exp) ? date('Y-m-d', strtotime($data_struk->tgl_exp)) : '-';
                } else {
                    $distributor = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? $data_struk_last->id_produsen : $vendor;
                    $harga_beli = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? round($data_struk_last->harga_beli, 2) : $harga_persediaan;
                    $tgl_struk = (isset($data_struk_last) && $data_struk_last->harga_beli > 0)  ? date('Y-m-d', strtotime($data_struk_last->tgl_struk)) : '-';
                    $tgl_exp = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? date('Y-m-d', strtotime($data_struk_last->tgl_exp)) : '-';
                }
            }


            $stop_opname = array(
                'id_logistik' => $id_logistik,
                'harga_persediaan' => $harga_persediaan,
                'stok_awal' => $stok_awal,
                'penerimaan' => $penerimaan,
                'pengeluaran' => $pengeluaran,
                'stok_akhir' =>  $stok_akhir,
                'harga_beli' => $harga_beli,
                'tgl_exp' => $tgl_exp,
                'tgl_faktur' => $tgl_struk,
                'hargappn' => $hargappn,
                'distributor' => ($distributor != null) ? $distributor : '-',
                'bulan' => date("m", $date),
                'tahun' => date('Y', $date),
                'staff' => $data_staff->id_staff,
                'tipe_stok' => $tipe,
                'stok' => $stok,
            );

            $this->M_Logistik_farmasi->insertStok($stop_opname, 'stop_opname_gudang');
        }
        $page_data['status'] = 'success';
        echo json_encode($page_data);
    }
    public function Laporan_persediaan($tipe)
    {
        $this->load->view('assets/_header');
        $page_data['tipe'] = $tipe;
        $page_data['url'] = 'Laporan_farmasi/Tampil_laporan_persediaan';
        $page_data['page_content'] = 'page_content/Laporan_persediaan_so';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_persediaan()
    {
        $data_staff = $this->session->userdata('data_auth');

        $periode = $this->input->post('periode');
        $tipe = $this->input->post('tipe');
        if ($tipe == 'unit') {
            $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $data_staff->tipe])->row();
            $stok = $data_adm->stok;
            $page_data = $this->M_Laporan_farmasi->selectLaporan_Persediaan($periode, $stok);
        } else {
            $page_data = $this->M_Laporan_farmasi->selectLaporan_Persediaan($periode, '');
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $id_logistik = $page_data[$i]->id_logistik;
            $nama_produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $nama = $page_data[$i]->nama;
            $satuan_terbesar = $page_data[$i]->satuan_terbesar;

            $hargappn = $page_data[$i]->hargappn;
            $golongan_obat = $page_data[$i]->golongan_sediaan;
            $standar = $page_data[$i]->standar;
            $kode = $page_data[$i]->kode;
            $harga_persediaan = $page_data[$i]->harga_persediaan;
            $harga_persediaan_last = $page_data[$i]->harga_persediaan_last;
            $tgl_struk = $page_data[$i]->tgl_faktur;
            $tgl_exp = $page_data[$i]->tgl_exp;


            $stok_awal =  $page_data[$i]->stok_awal;
            $penerimaan =  $page_data[$i]->penerimaan;
            $pengeluaran =  $page_data[$i]->pengeluaran;
            $stok_akhir =  $page_data[$i]->stok_akhir;
            $harga_beli =  $page_data[$i]->harga_beli;

            $nilai_awal = round($harga_persediaan_last * $stok_awal, 2);
            $nilai_terima = round($harga_persediaan * $penerimaan, 2);
            $nilai_pakai = round($harga_persediaan * $pengeluaran, 2);
            $nilai_akhir = round($nilai_awal + $nilai_terima - $nilai_pakai, 2);
            $nilai_persediaan = $harga_persediaan * $stok_akhir;
            if ($tipe == 'all') {
                $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $page_data[$i]->tipe_stok])->row();
                $unit = $data_adm->nama;
            } else {
                $unit = "";
            }

            // $tgl_faktur = $tgl_faktur;
            // if ($tipe == 'all') {
            //     $out[$i] = array($id_logistik, $nama, $nama_produsen, $distributor, $satuan_terbesar, $hargappn, $harga_beli, $harga_persediaan, $tgl_struk, $tgl_exp, $stok_awal, $penerimaan, $pengeluaran, $stok_akhir, $nilai_awal, $nilai_terima, $nilai_pakai, $nilai_akhir, $nilai_persediaan, $golongan_obat, $standar, $kode, $unit);
            // } else {
            $baseArray = array($id_logistik, $nama, $nama_produsen, $distributor, $satuan_terbesar, $hargappn, $harga_beli, $harga_persediaan, $tgl_struk, $tgl_exp, $stok_awal, $penerimaan, $pengeluaran, $stok_akhir, $nilai_awal, $nilai_terima, $nilai_pakai, $nilai_akhir, $golongan_obat, $standar, $kode);
            if ($tipe == 'all') {
                $baseArray[] = $unit;
            }

            $out[$i] = $baseArray;
            // }
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {

            $page_data['data'] = $out;

            echo json_encode($page_data);
        }
    }

    public function Laporan_respon_time_non()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_respon_time_non';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_respon_time_non()
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Laporan_farmasi->selectRangeResponTimeNon($first_date, $second_date);
        } else {
            $page_data = $this->M_Laporan_farmasi->selectLaporanResponTimeNon();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;

            $tgl_proses = ($page_data[$i]->tgl_proses == '-') ? '-' : indo_date2($page_data[$i]->tgl_proses) . " " . date('H:i:s', strtotime($page_data[$i]->tgl_proses));
            $tgl_selesai = ($page_data[$i]->tgl_selesai == '-') ? '-' : indo_date2($page_data[$i]->tgl_selesai) . " " . date('H:i:s', strtotime($page_data[$i]->tgl_selesai));
            $tanggal_resep = ($page_data[$i]->tanggal_resep == '-') ? '-' : indo_date2($page_data[$i]->tanggal_resep) . " " . date('H:i:s', strtotime($page_data[$i]->tanggal_resep));
            $tgl_diberikan = ($page_data[$i]->tgl_diberikan == '-') ? '-' : indo_date2($page_data[$i]->tgl_diberikan) . " " . date('H:i:s', strtotime($page_data[$i]->tgl_diberikan));

            $pasien = $page_data[$i]->pasien;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);



            $out[$i] = array($no, $pasien, $no_rm, $tanggal_resep, $tgl_proses, $tgl_selesai, $tgl_diberikan);
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

    public function Laporan_respon_time_racikan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_respon_time_racikan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_respon_time_racikan()
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Laporan_farmasi->selectRangeResponTimeRacikan($first_date, $second_date);
        } else {
            $page_data = $this->M_Laporan_farmasi->selectLaporanResponTimeRacikan();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;

            $tgl_proses = ($page_data[$i]->tgl_proses == '-') ? '-' : indo_date2($page_data[$i]->tgl_proses) . " " . date('H:i:s', strtotime($page_data[$i]->tgl_proses));
            $tgl_selesai = ($page_data[$i]->tgl_selesai == '-') ? '-' : indo_date2($page_data[$i]->tgl_selesai) . " " . date('H:i:s', strtotime($page_data[$i]->tgl_selesai));
            $tanggal_resep = ($page_data[$i]->tanggal_resep == '-') ? '-' : indo_date2($page_data[$i]->tanggal_resep) . " " . date('H:i:s', strtotime($page_data[$i]->tanggal_resep));
            $tgl_diberikan = ($page_data[$i]->tgl_diberikan == '-') ? '-' : indo_date2($page_data[$i]->tgl_diberikan) . " " . date('H:i:s', strtotime($page_data[$i]->tgl_diberikan));

            $pasien = $page_data[$i]->pasien;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);



            $out[$i] = array($no, $pasien, $no_rm, $tanggal_resep, $tgl_proses, $tgl_selesai, $tgl_diberikan);
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

    public function target_poli()
    {
        $this->load->view('assets/_header');
        // $page_data['url'] = 'Laporan_farmasi/Tampil_laporan_persediaan';
        $page_data['page_content'] = 'page_content/Target_poli';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function get_target_poli()
    {
        $page_data = $this->M_Laporan_farmasi->get_target();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $edit = '<button class="btn btn-warning" onclick="edit_target(' . $page_data[$i]->id_target_poli . ')"><i class="fa fa-pencil"></i></button>';
            $delete = '<button class="btn btn-danger" onclick="delete_target(' . $page_data[$i]->id_target_poli . ')"><i class="fa fa-trash"></i></button>';
            $tanggal = $page_data[$i]->tanggal;
            // $tgl_target = $page_data[$i]->tanggal_target;
            $keterangan = date('F');
            $out[$i] = array($no, $edit, $delete, $tanggal, $keterangan);
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

    public function edit_target_poli()
    {
        $id = $this->input->post('id');
        $page_data = $this->M_Laporan_farmasi->get_data_update_target($id);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['success' => true, 'data' => $page_data]));
    }

    public function insert_target_poli()
    {
        // $target = $this->input->post('target');
        $poli_akupuntur = $this->input->post('poli_akupuntur');
        $poli_anak = $this->input->post('poli_anak');
        $poli_bedah_mulut = $this->input->post('poli_bedah_mulut');
        $poli_bedah_umum = $this->input->post('poli_bedah_umum');
        $poli_fisio = $this->input->post('poli_fisio');
        $poli_gigi = $this->input->post('poli_gigi');
        $poli_kemoterapi = $this->input->post('poli_kemoterapi');
        $poli_kesehatan_jiwa = $this->input->post('poli_kesehatan_jiwa');
        $poli_kia = $this->input->post('poli_kia');
        $poli_kulit = $this->input->post('poli_kulit');
        $poli_mata = $this->input->post('poli_mata');
        $poli_obgyne = $this->input->post('poli_obgyne');
        $poli_orthopedi = $this->input->post('poli_orthopedi');
        $poli_tht = $this->input->post('poli_tht');
        $poli_gizi = $this->input->post('poli_gizi');
        $poli_ginjal = $this->input->post('poli_ginjal');
        $poli_hemodalisa = $this->input->post('poli_hemodalisa');
        $poli_internis = $this->input->post('poli_internis');
        $poli_jantung = $this->input->post('poli_jantung');
        $poli_paru = $this->input->post('poli_paru');
        $poli_penyakit_mulut = $this->input->post('poli_penyakit_mulut');
        $poli_psikolog = $this->input->post('poli_psikolog');
        $poli_rehab = $this->input->post('poli_rehab');
        $poli_saraf = $this->input->post('poli_saraf');
        $poli_stifin = $this->input->post('poli_stifin');
        $poli_umum = $this->input->post('poli_umum');
        $poli_urologi = $this->input->post('poli_urologi');
        $poli_terapi_bicara = $this->input->post('poli_terapi_bicara');
        // $tanggal_target = $this->input->post('tanggal_target');
        $data_staff = $this->session->userdata('data_auth');
        $id_staff = $data_staff->id_staff;


        // $latest_date = $this->M_Laporan_farmasi->get_latest_tanggal();
    
        // $tanggal_mulai = date('Y-m-d', strtotime('-30 days', strtotime($latest_date)));
        // $tanggal_selesai = $latest_date;

        // // Periksa apakah sudah ada data dalam rentang 30 hari
        // $existing_data = $this->M_Laporan_farmasi->check_existing_target_in_range($tanggal_mulai, $tanggal_selesai);

        // if ($existing_data) {
        //     // Jika data dalam 30 hari terakhir sudah ada
        //     echo json_encode(['success' => false, 'message' => 'Target poli sudah ada dalam 30 hari terakhir.']);
        //     return;
        // }

        $data = array(
            'poli_akupuntur' => $poli_akupuntur,
            'poli_anak' => $poli_anak,
            'poli_bedah_mulut' => $poli_bedah_mulut,
            'poli_bedah_umum' => $poli_bedah_umum,
            'poli_fisio' => $poli_fisio,
            'poli_gigi' => $poli_gigi,
            'poli_kemoterapi' => $poli_kemoterapi,
            'poli_kesehatan_jiwa' => $poli_kesehatan_jiwa,
            'poli_kia' => $poli_kia,
            'poli_kulit' => $poli_kulit,
            'poli_mata' => $poli_mata,
            'poli_obgyne' => $poli_obgyne,
            'poli_orthopedi' => $poli_orthopedi,
            'poli_tht' => $poli_tht,
            'poli_gizi' => $poli_gizi,
            'poli_ginjal' => $poli_ginjal,
            'poli_hemodalisa' => $poli_hemodalisa,
            'poli_internis' => $poli_internis,
            'poli_jantung' => $poli_jantung,
            'poli_paru' => $poli_paru,
            'poli_penyakit_mulut' => $poli_penyakit_mulut,
            'poli_psikolog' => $poli_psikolog,
            'poli_rehab' => $poli_rehab,
            'poli_saraf' => $poli_saraf,
            'poli_stifin' => $poli_stifin,
            'poli_terapi_bicara' => $poli_terapi_bicara,
            'poli_umum' => $poli_umum,
            'poli_urologi' => $poli_urologi,
            'id_staff'=>$id_staff
            // 'tanggal_target' => $tanggal_target
        );

        // if ($target == "harian") {
        //     $result = $this->M_Laporan_farmasi->insert_data('target_poli_harian', $data);
        // } else if ($target == "bulanan") {
        //     $result =  $this->M_Laporan_farmasi->insert_data('target_poli_bulanan', $data);
        // } else if ($target == 'tahunan') {
        //     $result = $this->M_Laporan_farmasi->insert_data('target_poli_tahunan', $data);
        // }

        $result =  $this->M_Laporan_farmasi->insert_data('target_poli_bulanan', $data);

        // Validasi data (opsional)
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Data berhasil disimpan.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal menyimpan data.']);
        }
    }

    public function update_target_poli()
    {
        // $target = $this->input->post('target');
        $poli_akupuntur = $this->input->post('poli_akupuntur');
        $poli_anak = $this->input->post('poli_anak');
        $poli_bedah_mulut = $this->input->post('poli_bedah_mulut');
        $poli_bedah_umum = $this->input->post('poli_bedah_umum');
        $poli_fisio = $this->input->post('poli_fisio');
        $poli_gigi = $this->input->post('poli_gigi');
        $poli_kemoterapi = $this->input->post('poli_kemoterapi');
        $poli_kesehatan_jiwa = $this->input->post('poli_kesehatan_jiwa');
        $poli_kia = $this->input->post('poli_kia');
        $poli_kulit = $this->input->post('poli_kulit');
        $poli_mata = $this->input->post('poli_mata');
        $poli_obgyne = $this->input->post('poli_obgyne');
        $poli_orthopedi = $this->input->post('poli_orthopedi');
        $poli_tht = $this->input->post('poli_tht');
        $poli_gizi = $this->input->post('poli_gizi');
        $poli_ginjal = $this->input->post('poli_ginjal');
        $poli_hemodalisa = $this->input->post('poli_hemodalisa');
        $poli_internis = $this->input->post('poli_internis');
        $poli_jantung = $this->input->post('poli_jantung');
        $poli_paru = $this->input->post('poli_paru');
        $poli_penyakit_mulut = $this->input->post('poli_penyakit_mulut');
        $poli_psikolog = $this->input->post('poli_psikolog');
        $poli_rehab = $this->input->post('poli_rehab');
        $poli_saraf = $this->input->post('poli_saraf');
        $poli_stifin = $this->input->post('poli_stifin');
        $poli_umum = $this->input->post('poli_umum');
        $poli_urologi = $this->input->post('poli_urologi');
        $poli_terapi_bicara = $this->input->post('poli_terapi_bicara');
        $id = $this->input->post('id');
        $tanggal_target = $this->input->post('tanggal_target');

        $data = array(
            'poli_akupuntur' => $poli_akupuntur,
            'poli_anak' => $poli_anak,
            'poli_bedah_mulut' => $poli_bedah_mulut,
            'poli_bedah_umum' => $poli_bedah_umum,
            'poli_fisio' => $poli_fisio,
            'poli_gigi' => $poli_gigi,
            'poli_kemoterapi' => $poli_kemoterapi,
            'poli_kesehatan_jiwa' => $poli_kesehatan_jiwa,
            'poli_kia' => $poli_kia,
            'poli_kulit' => $poli_kulit,
            'poli_mata' => $poli_mata,
            'poli_obgyne' => $poli_obgyne,
            'poli_orthopedi' => $poli_orthopedi,
            'poli_tht' => $poli_tht,
            'poli_gizi' => $poli_gizi,
            'poli_ginjal' => $poli_ginjal,
            'poli_hemodalisa' => $poli_hemodalisa,
            'poli_internis' => $poli_internis,
            'poli_jantung' => $poli_jantung,
            'poli_paru' => $poli_paru,
            'poli_penyakit_mulut' => $poli_penyakit_mulut,
            'poli_psikolog' => $poli_psikolog,
            'poli_rehab' => $poli_rehab,
            'poli_saraf' => $poli_saraf,
            'poli_stifin' => $poli_stifin,
            'poli_terapi_bicara' => $poli_terapi_bicara,
            'poli_umum' => $poli_umum,
            'poli_urologi' => $poli_urologi,
            'tanggal_target' => $tanggal_target
        );

        $result =  $this->M_Laporan_farmasi->update_data($id, $data);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Data berhasil diupdate.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal update data.']);
        }
    }

    public function delete_target_poli()
    {
        $id = $this->input->post('id');

        $result = $this->M_Laporan_farmasi->delete_data('target_poli_bulanan', $id);

        if ($result) {
            $response = ['success' => true, 'message' => 'Data berhasil dihapus.'];
        } else {
            $response = ['success' => false, 'message' => 'Gagal menghapus data.'];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function get_all_poli()
    {
        // Panggil model untuk mendapatkan hasil rata-rata poli
        $data = $this->M_Laporan_farmasi->poli();

        // Cek jika data ada, lalu kirimkan sebagai JSON
        if ($data) {
            // Set header untuk JSON response
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            // Jika tidak ada data, kirimkan respon kosong atau error
            echo json_encode(['error' => 'Data tidak ditemukan.']);
        }
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_Farmasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        // $this->load->model('M_Apotik');
        $this->load->model('M_Logistik_farmasi');
        $this->load->model('M_Laporan_farmasi');
    }

    public function Laporan_kartu_persediaan()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        if ($perequest == "apotik") {
            $stok = "stok_apotik";
        } else if ($perequest == "logistik farmasi") {
            $stok = "stok_logistik";
        } else if ($perequest == "deporanap") {
            $stok = "stok_depo";
        }
        $this->load->view('assets/_header');
        $page_data['obat'] = $this->M_Logistik_farmasi->selectStok($stok);

        $page_data['page_content'] = 'page_content/Laporan_kartu_persediaan';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_kartu_persediaan()
    {
        $data_staff = $this->session->userdata('data_auth');

        $id_logistik = $this->input->post('id_logistik');
        $tahun = $this->input->post('tahun');

        if ($data_staff->tipe == "deporanap") {
            $stok = "stok_depo";
        } else if ($data_staff->tipe == "apotik") {
            $stok = "stok_apotik";
        } else if ($data_staff->tipe == "logistik farmasi") {
            $stok = "stok_logistik";
        }

        if ($this->input->post('id_logistik')) {
            $page_data = $this->M_Laporan_farmasi->kartu_persediaan($tahun, $id_logistik, $stok);
            $db_obat = $this->db->get_where('list_logistik', ['id_logistik' => $id_logistik])->row();

            // print_r($page_data);

            for ($i = 0; $i < count($page_data); $i++) {
                $no = $i + 1;
                $bulan = $page_data[$i]->nama;
                $id = $page_data[$i]->id;

                $masuk = ($page_data[$i]->masuk != null) ? $page_data[$i]->masuk : 0;
                $keluar = ($page_data[$i]->keluar != null) ? $page_data[$i]->keluar : 0;
                $sisa = ($page_data[$i]->sisa != null) ? $page_data[$i]->sisa : 0;

                $periode = $tahun . '-' . $id;

                $data_struk = $this->M_Logistik_farmasi->getHargaBeli($periode, $id_logistik);

                $data_struk_last = $this->M_Logistik_farmasi->getHargaBeli_last($periode, $id_logistik);
                $harga_persediaan = $db_obat->harga_persediaan;

                if ($masuk == 0) {
                    $harga_beli = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? round($data_struk_last->harga_beli, 2) : $harga_persediaan;
                } else {
                    if ($data_staff->tipe == "logistik farmasi") {
                        $harga_beli = isset($data_struk) ? round($data_struk->harga_beli, 2) : 0;
                    } else {
                        $harga_beli = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? round($data_struk_last->harga_beli, 2) : $harga_persediaan;
                    }
                }

                $nilai_masuk = round($harga_beli * $masuk, 2);
                $nilai_keluar = round($harga_beli * $keluar, 2);
                $nilai_sisa = round($harga_beli * $sisa, 2);

                $out[$i] = array($no, $bulan, $masuk, $nilai_masuk, $keluar, $nilai_keluar, $sisa, $nilai_sisa);
            }
        } else {
            $out = null;
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

    public function kunci_so()
    {
        $data_staff = $this->session->userdata('data_auth');
        $tipe = $data_staff->tipe;

        $periode = $this->input->post('periode');
        $date = strtotime($periode);
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $data_staff->tipe])->row();


        $stok = $data_adm->stok;
        $this->M_Logistik_farmasi->delete_tindakan(['tipe_stok' => $tipe, 'stok' => $stok, 'bulan' => date("m", $date), 'tahun' => date('Y', $date)], 'stop_opname_gudang');
        $page_data = $this->M_Logistik_farmasi->selectLaporan_Persediaan($periode, $stok);

        for ($i = 0; $i < count($page_data); $i++) {

            $id_logistik = $page_data[$i]->id_logistik;
            $hna = $page_data[$i]->harga_cost;
            $ppn = $page_data[$i]->ppn;
            $hargappn = round($hna * (1 + ($ppn / 100)), 2);
            $harga_persediaan = $page_data[$i]->harga_persediaan;
            $vendor = $page_data[$i]->distributor;

            $stok_awal =  $page_data[$i]->awal;
            $penerimaan =  $page_data[$i]->masuk;
            $pengeluaran =  abs($page_data[$i]->keluar);
            $stok_akhir =  $page_data[$i]->akhir;

            $data_struk = $this->M_Logistik_farmasi->getHargaBeli($periode, $id_logistik);

            $data_struk_last = $this->M_Logistik_farmasi->getHargaBeli_last($periode, $id_logistik);
            if ($penerimaan == 0) {
                $distributor = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? $data_struk_last->id_produsen : $vendor;
                $harga_beli = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? round($data_struk_last->harga_beli, 2) : $harga_persediaan;
                $tgl_struk = (isset($data_struk_last) && $data_struk_last->harga_beli > 0)  ? date('Y-m-d', strtotime($data_struk_last->tgl_struk)) : '-';
                $tgl_exp = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? date('Y-m-d', strtotime($data_struk_last->tgl_exp)) : '-';
            } else {
                if ($data_staff->tipe == "logistik farmasi") {
                    $distributor = isset($data_struk) ? $data_struk->id_produsen : '-';
                    $harga_beli = isset($data_struk) ? round($data_struk->harga_beli, 2) : 0;
                    $tgl_struk = isset($data_struk->tgl_struk) ? date('Y-m-d', strtotime($data_struk->tgl_struk)) : '-';
                    $tgl_exp = isset($data_struk->tgl_exp) ? date('Y-m-d', strtotime($data_struk->tgl_exp)) : '-';
                } else {
                    $distributor = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? $data_struk_last->id_produsen : $vendor;
                    $harga_beli = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? round($data_struk_last->harga_beli, 2) : $harga_persediaan;
                    $tgl_struk = (isset($data_struk_last) && $data_struk_last->harga_beli > 0)  ? date('Y-m-d', strtotime($data_struk_last->tgl_struk)) : '-';
                    $tgl_exp = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? date('Y-m-d', strtotime($data_struk_last->tgl_exp)) : '-';
                }
            }


            $stop_opname = array(
                'id_logistik' => $id_logistik,
                'harga_persediaan' => $harga_persediaan,
                'stok_awal' => $stok_awal,
                'penerimaan' => $penerimaan,
                'pengeluaran' => $pengeluaran,
                'stok_akhir' =>  $stok_akhir,
                'harga_beli' => $harga_beli,
                'tgl_exp' => $tgl_exp,
                'tgl_faktur' => $tgl_struk,
                'hargappn' => $hargappn,
                'distributor' => ($distributor != null) ? $distributor : '-',
                'bulan' => date("m", $date),
                'tahun' => date('Y', $date),
                'staff' => $data_staff->id_staff,
                'tipe_stok' => $tipe,
                'stok' => $stok,
            );

            $this->M_Logistik_farmasi->insertStok($stop_opname, 'stop_opname_gudang');
        }
        $page_data['status'] = 'success';
        echo json_encode($page_data);
    }
    public function Laporan_persediaan($tipe)
    {
        $this->load->view('assets/_header');
        $page_data['tipe'] = $tipe;
        $page_data['url'] = 'Laporan_farmasi/Tampil_laporan_persediaan';
        $page_data['page_content'] = 'page_content/Laporan_persediaan_so';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_persediaan()
    {
        $data_staff = $this->session->userdata('data_auth');

        $periode = $this->input->post('periode');
        $tipe = $this->input->post('tipe');
        if ($tipe == 'unit') {
            $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $data_staff->tipe])->row();
            $stok = $data_adm->stok;
            $page_data = $this->M_Laporan_farmasi->selectLaporan_Persediaan($periode, $stok);
        } else {
            $page_data = $this->M_Laporan_farmasi->selectLaporan_Persediaan($periode, '');
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $id_logistik = $page_data[$i]->id_logistik;
            $nama_produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $nama = $page_data[$i]->nama;
            $satuan_terbesar = $page_data[$i]->satuan_terbesar;

            $hargappn = $page_data[$i]->hargappn;
            $golongan_obat = $page_data[$i]->golongan_sediaan;
            $standar = $page_data[$i]->standar;
            $kode = $page_data[$i]->kode;
            $harga_persediaan = $page_data[$i]->harga_persediaan;
            $harga_persediaan_last = $page_data[$i]->harga_persediaan_last;
            $tgl_struk = $page_data[$i]->tgl_faktur;
            $tgl_exp = $page_data[$i]->tgl_exp;


            $stok_awal =  $page_data[$i]->stok_awal;
            $penerimaan =  $page_data[$i]->penerimaan;
            $pengeluaran =  $page_data[$i]->pengeluaran;
            $stok_akhir =  $page_data[$i]->stok_akhir;
            $harga_beli =  $page_data[$i]->harga_beli;

            $nilai_awal = round($harga_persediaan_last * $stok_awal, 2);
            $nilai_terima = round($harga_persediaan * $penerimaan, 2);
            $nilai_pakai = round($harga_persediaan * $pengeluaran, 2);
            $nilai_akhir = round($nilai_awal + $nilai_terima - $nilai_pakai, 2);
            $nilai_persediaan = $harga_persediaan * $stok_akhir;
            if ($tipe == 'all') {
                $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $page_data[$i]->tipe_stok])->row();
                $unit = $data_adm->nama;
            } else {
                $unit = "";
            }

            // $tgl_faktur = $tgl_faktur;
            // if ($tipe == 'all') {
            //     $out[$i] = array($id_logistik, $nama, $nama_produsen, $distributor, $satuan_terbesar, $hargappn, $harga_beli, $harga_persediaan, $tgl_struk, $tgl_exp, $stok_awal, $penerimaan, $pengeluaran, $stok_akhir, $nilai_awal, $nilai_terima, $nilai_pakai, $nilai_akhir, $nilai_persediaan, $golongan_obat, $standar, $kode, $unit);
            // } else {
            $baseArray = array($id_logistik, $nama, $nama_produsen, $distributor, $satuan_terbesar, $hargappn, $harga_beli, $harga_persediaan, $tgl_struk, $tgl_exp, $stok_awal, $penerimaan, $pengeluaran, $stok_akhir, $nilai_awal, $nilai_terima, $nilai_pakai, $nilai_akhir, $golongan_obat, $standar, $kode);
            if ($tipe == 'all') {
                $baseArray[] = $unit;
            }

            $out[$i] = $baseArray;
            // }
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {

            $page_data['data'] = $out;

            echo json_encode($page_data);
        }
    }

    public function Laporan_respon_time_non()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_respon_time_non';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_respon_time_non()
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Laporan_farmasi->selectRangeResponTimeNon($first_date, $second_date);
        } else {
            $page_data = $this->M_Laporan_farmasi->selectLaporanResponTimeNon();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;

            $tgl_proses = ($page_data[$i]->tgl_proses == '-') ? '-' : indo_date2($page_data[$i]->tgl_proses) . " " . date('H:i:s', strtotime($page_data[$i]->tgl_proses));
            $tgl_selesai = ($page_data[$i]->tgl_selesai == '-') ? '-' : indo_date2($page_data[$i]->tgl_selesai) . " " . date('H:i:s', strtotime($page_data[$i]->tgl_selesai));
            $tanggal_resep = ($page_data[$i]->tanggal_resep == '-') ? '-' : indo_date2($page_data[$i]->tanggal_resep) . " " . date('H:i:s', strtotime($page_data[$i]->tanggal_resep));
            $tgl_diberikan = ($page_data[$i]->tgl_diberikan == '-') ? '-' : indo_date2($page_data[$i]->tgl_diberikan) . " " . date('H:i:s', strtotime($page_data[$i]->tgl_diberikan));

            $pasien = $page_data[$i]->pasien;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);



            $out[$i] = array($no, $pasien, $no_rm, $tanggal_resep, $tgl_proses, $tgl_selesai, $tgl_diberikan);
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

    public function Laporan_respon_time_racikan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_respon_time_racikan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_respon_time_racikan()
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Laporan_farmasi->selectRangeResponTimeRacikan($first_date, $second_date);
        } else {
            $page_data = $this->M_Laporan_farmasi->selectLaporanResponTimeRacikan();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;

            $tgl_proses = ($page_data[$i]->tgl_proses == '-') ? '-' : indo_date2($page_data[$i]->tgl_proses) . " " . date('H:i:s', strtotime($page_data[$i]->tgl_proses));
            $tgl_selesai = ($page_data[$i]->tgl_selesai == '-') ? '-' : indo_date2($page_data[$i]->tgl_selesai) . " " . date('H:i:s', strtotime($page_data[$i]->tgl_selesai));
            $tanggal_resep = ($page_data[$i]->tanggal_resep == '-') ? '-' : indo_date2($page_data[$i]->tanggal_resep) . " " . date('H:i:s', strtotime($page_data[$i]->tanggal_resep));
            $tgl_diberikan = ($page_data[$i]->tgl_diberikan == '-') ? '-' : indo_date2($page_data[$i]->tgl_diberikan) . " " . date('H:i:s', strtotime($page_data[$i]->tgl_diberikan));

            $pasien = $page_data[$i]->pasien;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);



            $out[$i] = array($no, $pasien, $no_rm, $tanggal_resep, $tgl_proses, $tgl_selesai, $tgl_diberikan);
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

    public function target_poli()
    {
        $this->load->view('assets/_header');
        // $page_data['url'] = 'Laporan_farmasi/Tampil_laporan_persediaan';
        $page_data['page_content'] = 'page_content/Target_poli';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function get_target_poli()
    {
        $page_data = $this->M_Laporan_farmasi->get_target();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $edit = '<button class="btn btn-warning" onclick="edit_target(' . $page_data[$i]->id_target_poli . ')"><i class="fa fa-pencil"></i></button>';
            $delete = '<button class="btn btn-danger" onclick="delete_target(' . $page_data[$i]->id_target_poli . ')"><i class="fa fa-trash"></i></button>';
            $tanggal = $page_data[$i]->tanggal;
            // $tgl_target = $page_data[$i]->tanggal_target;
            $keterangan = date('F');
            $out[$i] = array($no, $edit, $delete, $tanggal, $keterangan);
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

    public function edit_target_poli()
    {
        $id = $this->input->post('id');
        $page_data = $this->M_Laporan_farmasi->get_data_update_target($id);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['success' => true, 'data' => $page_data]));
    }

    public function insert_target_poli()
    {
        // $target = $this->input->post('target');
        $poli_akupuntur = $this->input->post('poli_akupuntur');
        $poli_anak = $this->input->post('poli_anak');
        $poli_bedah_mulut = $this->input->post('poli_bedah_mulut');
        $poli_bedah_umum = $this->input->post('poli_bedah_umum');
        $poli_fisio = $this->input->post('poli_fisio');
        $poli_gigi = $this->input->post('poli_gigi');
        $poli_kemoterapi = $this->input->post('poli_kemoterapi');
        $poli_kesehatan_jiwa = $this->input->post('poli_kesehatan_jiwa');
        $poli_kia = $this->input->post('poli_kia');
        $poli_kulit = $this->input->post('poli_kulit');
        $poli_mata = $this->input->post('poli_mata');
        $poli_obgyne = $this->input->post('poli_obgyne');
        $poli_orthopedi = $this->input->post('poli_orthopedi');
        $poli_tht = $this->input->post('poli_tht');
        $poli_gizi = $this->input->post('poli_gizi');
        $poli_ginjal = $this->input->post('poli_ginjal');
        $poli_hemodalisa = $this->input->post('poli_hemodalisa');
        $poli_internis = $this->input->post('poli_internis');
        $poli_jantung = $this->input->post('poli_jantung');
        $poli_paru = $this->input->post('poli_paru');
        $poli_penyakit_mulut = $this->input->post('poli_penyakit_mulut');
        $poli_psikolog = $this->input->post('poli_psikolog');
        $poli_rehab = $this->input->post('poli_rehab');
        $poli_saraf = $this->input->post('poli_saraf');
        $poli_stifin = $this->input->post('poli_stifin');
        $poli_umum = $this->input->post('poli_umum');
        $poli_urologi = $this->input->post('poli_urologi');
        $poli_terapi_bicara = $this->input->post('poli_terapi_bicara');
        // $tanggal_target = $this->input->post('tanggal_target');
        $data_staff = $this->session->userdata('data_auth');
        $id_staff = $data_staff->id_staff;


        // $latest_date = $this->M_Laporan_farmasi->get_latest_tanggal();
    
        // $tanggal_mulai = date('Y-m-d', strtotime('-30 days', strtotime($latest_date)));
        // $tanggal_selesai = $latest_date;

        // // Periksa apakah sudah ada data dalam rentang 30 hari
        // $existing_data = $this->M_Laporan_farmasi->check_existing_target_in_range($tanggal_mulai, $tanggal_selesai);

        // if ($existing_data) {
        //     // Jika data dalam 30 hari terakhir sudah ada
        //     echo json_encode(['success' => false, 'message' => 'Target poli sudah ada dalam 30 hari terakhir.']);
        //     return;
        // }

        $data = array(
            'poli_akupuntur' => $poli_akupuntur,
            'poli_anak' => $poli_anak,
            'poli_bedah_mulut' => $poli_bedah_mulut,
            'poli_bedah_umum' => $poli_bedah_umum,
            'poli_fisio' => $poli_fisio,
            'poli_gigi' => $poli_gigi,
            'poli_kemoterapi' => $poli_kemoterapi,
            'poli_kesehatan_jiwa' => $poli_kesehatan_jiwa,
            'poli_kia' => $poli_kia,
            'poli_kulit' => $poli_kulit,
            'poli_mata' => $poli_mata,
            'poli_obgyne' => $poli_obgyne,
            'poli_orthopedi' => $poli_orthopedi,
            'poli_tht' => $poli_tht,
            'poli_gizi' => $poli_gizi,
            'poli_ginjal' => $poli_ginjal,
            'poli_hemodalisa' => $poli_hemodalisa,
            'poli_internis' => $poli_internis,
            'poli_jantung' => $poli_jantung,
            'poli_paru' => $poli_paru,
            'poli_penyakit_mulut' => $poli_penyakit_mulut,
            'poli_psikolog' => $poli_psikolog,
            'poli_rehab' => $poli_rehab,
            'poli_saraf' => $poli_saraf,
            'poli_stifin' => $poli_stifin,
            'poli_terapi_bicara' => $poli_terapi_bicara,
            'poli_umum' => $poli_umum,
            'poli_urologi' => $poli_urologi,
            'id_staff'=>$id_staff
            // 'tanggal_target' => $tanggal_target
        );

        // if ($target == "harian") {
        //     $result = $this->M_Laporan_farmasi->insert_data('target_poli_harian', $data);
        // } else if ($target == "bulanan") {
        //     $result =  $this->M_Laporan_farmasi->insert_data('target_poli_bulanan', $data);
        // } else if ($target == 'tahunan') {
        //     $result = $this->M_Laporan_farmasi->insert_data('target_poli_tahunan', $data);
        // }

        $result =  $this->M_Laporan_farmasi->insert_data('target_poli_bulanan', $data);

        // Validasi data (opsional)
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Data berhasil disimpan.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal menyimpan data.']);
        }
    }

    public function update_target_poli()
    {
        // $target = $this->input->post('target');
        $poli_akupuntur = $this->input->post('poli_akupuntur');
        $poli_anak = $this->input->post('poli_anak');
        $poli_bedah_mulut = $this->input->post('poli_bedah_mulut');
        $poli_bedah_umum = $this->input->post('poli_bedah_umum');
        $poli_fisio = $this->input->post('poli_fisio');
        $poli_gigi = $this->input->post('poli_gigi');
        $poli_kemoterapi = $this->input->post('poli_kemoterapi');
        $poli_kesehatan_jiwa = $this->input->post('poli_kesehatan_jiwa');
        $poli_kia = $this->input->post('poli_kia');
        $poli_kulit = $this->input->post('poli_kulit');
        $poli_mata = $this->input->post('poli_mata');
        $poli_obgyne = $this->input->post('poli_obgyne');
        $poli_orthopedi = $this->input->post('poli_orthopedi');
        $poli_tht = $this->input->post('poli_tht');
        $poli_gizi = $this->input->post('poli_gizi');
        $poli_ginjal = $this->input->post('poli_ginjal');
        $poli_hemodalisa = $this->input->post('poli_hemodalisa');
        $poli_internis = $this->input->post('poli_internis');
        $poli_jantung = $this->input->post('poli_jantung');
        $poli_paru = $this->input->post('poli_paru');
        $poli_penyakit_mulut = $this->input->post('poli_penyakit_mulut');
        $poli_psikolog = $this->input->post('poli_psikolog');
        $poli_rehab = $this->input->post('poli_rehab');
        $poli_saraf = $this->input->post('poli_saraf');
        $poli_stifin = $this->input->post('poli_stifin');
        $poli_umum = $this->input->post('poli_umum');
        $poli_urologi = $this->input->post('poli_urologi');
        $poli_terapi_bicara = $this->input->post('poli_terapi_bicara');
        $id = $this->input->post('id');
        $tanggal_target = $this->input->post('tanggal_target');

        $data = array(
            'poli_akupuntur' => $poli_akupuntur,
            'poli_anak' => $poli_anak,
            'poli_bedah_mulut' => $poli_bedah_mulut,
            'poli_bedah_umum' => $poli_bedah_umum,
            'poli_fisio' => $poli_fisio,
            'poli_gigi' => $poli_gigi,
            'poli_kemoterapi' => $poli_kemoterapi,
            'poli_kesehatan_jiwa' => $poli_kesehatan_jiwa,
            'poli_kia' => $poli_kia,
            'poli_kulit' => $poli_kulit,
            'poli_mata' => $poli_mata,
            'poli_obgyne' => $poli_obgyne,
            'poli_orthopedi' => $poli_orthopedi,
            'poli_tht' => $poli_tht,
            'poli_gizi' => $poli_gizi,
            'poli_ginjal' => $poli_ginjal,
            'poli_hemodalisa' => $poli_hemodalisa,
            'poli_internis' => $poli_internis,
            'poli_jantung' => $poli_jantung,
            'poli_paru' => $poli_paru,
            'poli_penyakit_mulut' => $poli_penyakit_mulut,
            'poli_psikolog' => $poli_psikolog,
            'poli_rehab' => $poli_rehab,
            'poli_saraf' => $poli_saraf,
            'poli_stifin' => $poli_stifin,
            'poli_terapi_bicara' => $poli_terapi_bicara,
            'poli_umum' => $poli_umum,
            'poli_urologi' => $poli_urologi,
            'tanggal_target' => $tanggal_target
        );

        $result =  $this->M_Laporan_farmasi->update_data($id, $data);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Data berhasil diupdate.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal update data.']);
        }
    }

    public function delete_target_poli()
    {
        $id = $this->input->post('id');

        $result = $this->M_Laporan_farmasi->delete_data('target_poli_bulanan', $id);

        if ($result) {
            $response = ['success' => true, 'message' => 'Data berhasil dihapus.'];
        } else {
            $response = ['success' => false, 'message' => 'Gagal menghapus data.'];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function get_all_poli()
    {
        // Panggil model untuk mendapatkan hasil rata-rata poli
        $data = $this->M_Laporan_farmasi->poli();

        // Cek jika data ada, lalu kirimkan sebagai JSON
        if ($data) {
            // Set header untuk JSON response
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            // Jika tidak ada data, kirimkan respon kosong atau error
            echo json_encode(['error' => 'Data tidak ditemukan.']);
        }
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
