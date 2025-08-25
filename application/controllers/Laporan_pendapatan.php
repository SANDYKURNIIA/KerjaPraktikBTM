<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_pendapatan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Laporan_pendapatan');
        $this->load->model('M_Laporan_Pendapatan_Keuangan');
    }
    //Pasien Rajal casemix
    //Pasien Rajal casemix


    public function Laporan_pendapatan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pendapatan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    // laporan pendapatan jasa dokter
    public function Laporan_jasa_dokter()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_jasa_dokter';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Laporan_jenis_klaim()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_jenis_klaim';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function laporan_biaya_ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_biaya_ranap';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function laporan_visite_dokter()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_visite_dokter';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function laporan_pendapatan_fisio()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pendapatan_fisio';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function Tampil_laporan_pasien()
    {
        $page_data = $this->M_Laporan_pendapatan->selectLaporanPasien();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tgl_keluar);
            $tgl1 = strftime("%d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglKeluar = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            // $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->cara_bayar;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $total_pendapatan = $page_data[$i]->total_pendapatan;


            $out[$i] = array($no, $tgl, $tgl1, $no_rm, $pasien, $caraBayar, $jenis_pelayanan, $total_pendapatan);
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

    public function Tampil_Rangelaporan_pasien()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $pelayanan = $this->input->post('jenis_pelayanan');

        $page_data = $this->M_Laporan_pendapatan->selectRangeLaporanPasien($mulai, $akhir, $pelayanan);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tgl_keluar);
            $tgl1 = strftime("%d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglKeluar = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            // $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->cara_bayar;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $total_pendapatan = $page_data[$i]->total_pendapatan;


            $out[$i] = array($no, $tgl, $tgl1, $no_rm, $pasien, $caraBayar, $jenis_pelayanan, $total_pendapatan);
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

    //Laporan jasa dokter
    public function Tampil_laporan_dokter()
    {
        $page_data = $this->M_Laporan_pendapatan->selectLaporandokter();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->name;
            $jumlah = $page_data[$i]->jml;
            $total = $page_data[$i]->total;


            $out[$i] = array($no, $nama, $jumlah, $total);
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

    public function Tampil_Rangelaporan_dokter()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Laporan_pendapatan->selectRangeLaporandokter($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->name;
            $jumlah = $page_data[$i]->jml;
            $total = $page_data[$i]->total;


            $out[$i] = array($no, $nama, $jumlah, $total);
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

    //Laporan jenis klaim
    public function Tampil_laporan_jenis_klaim()
    {
        $page_data = $this->M_Laporan_pendapatan->selectLaporanjenisklaim();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $total = $page_data[$i]->total;


            $out[$i] = array($no, $nama, $total);
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

    public function Tampil_Rangelaporan_jenis_klaim()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $mulai = '2023-01-01';
        $akhir = '2023-01-31';

        // $page_data = $this->M_Laporan_pendapatan->selectRangeLaporanjenisklaim($mulai, $akhir);
        $page_data = $this->M_Laporan_pendapatan->selectLaporanjenisklaim();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $caraBayar = $page_data[$i]->id_cara_bayar;

            $adm = $this->M_Laporan_pendapatan->total_pelayanan_pasien($mulai, $akhir, $caraBayar);
            $apotik = $this->M_Laporan_pendapatan->total_apotik($mulai, $akhir, $caraBayar);
            $obatok = $this->M_Laporan_pendapatan->total_operasi($mulai, $akhir, $caraBayar);
            $igd = $this->M_Laporan_pendapatan->total_igd($mulai, $akhir, $caraBayar);
            $labor = $this->M_Laporan_pendapatan->total_labor($mulai, $akhir, $caraBayar);
            $radio = $this->M_Laporan_pendapatan->total_radio($mulai, $akhir, $caraBayar);
            $anak = $this->M_Laporan_pendapatan->total_anak($mulai, $akhir, $caraBayar);
            $apelkes = $this->M_Laporan_pendapatan->total_apelkes($mulai, $akhir, $caraBayar);
            $internis = $this->M_Laporan_pendapatan->total_internis($mulai, $akhir, $caraBayar);
            $bedah = $this->M_Laporan_pendapatan->total_bedah($mulai, $akhir, $caraBayar);
            $fisio = $this->M_Laporan_pendapatan->total_fisio($mulai, $akhir, $caraBayar);
            $gigi = $this->M_Laporan_pendapatan->total_gigi($mulai, $akhir, $caraBayar);
            $jantung = $this->M_Laporan_pendapatan->total_jantung($mulai, $akhir, $caraBayar);
            $kulit = $this->M_Laporan_pendapatan->total_kulit($mulai, $akhir, $caraBayar);
            $mata = $this->M_Laporan_pendapatan->total_mata($mulai, $akhir, $caraBayar);
            $obgyne = $this->M_Laporan_pendapatan->total_obgyne($mulai, $akhir, $caraBayar);
            $ok = $this->M_Laporan_pendapatan->total_ok($mulai, $akhir, $caraBayar);
            $tht = $this->M_Laporan_pendapatan->total_tht($mulai, $akhir, $caraBayar);
            $umum = $this->M_Laporan_pendapatan->total_umum($mulai, $akhir, $caraBayar);
            $akp = $this->M_Laporan_pendapatan->total_akupuntur($mulai, $akhir, $caraBayar);
            $bdm = $this->M_Laporan_pendapatan->total_bedah_mulut($mulai, $akhir, $caraBayar);
            $jiwa = $this->M_Laporan_pendapatan->total_kesjiwa($mulai, $akhir, $caraBayar);
            $ort = $this->M_Laporan_pendapatan->total_orthopedi($mulai, $akhir, $caraBayar);
            $paru = $this->M_Laporan_pendapatan->total_paru($mulai, $akhir, $caraBayar);
            $hd = $this->M_Laporan_pendapatan->total_hemodialisa($mulai, $akhir, $caraBayar);
            $saraf = $this->M_Laporan_pendapatan->total_saraf($mulai, $akhir, $caraBayar);
            $uro = $this->M_Laporan_pendapatan->total_urologi($mulai, $akhir, $caraBayar);
            $ginjal = $this->M_Laporan_pendapatan->total_ginjal($mulai, $akhir, $caraBayar);
            $pnm = $this->M_Laporan_pendapatan->total_penyakit_mulut($mulai, $akhir, $caraBayar);
            $rehab = $this->M_Laporan_pendapatan->total_rehab($mulai, $akhir, $caraBayar);
            $gizi = $this->M_Laporan_pendapatan->total_gizi($mulai, $akhir, $caraBayar);
            $terapi = $this->M_Laporan_pendapatan->total_terapi_wicara($mulai, $akhir, $caraBayar);
            $psikologi = $this->M_Laporan_pendapatan->total_psikolog($mulai, $akhir, $caraBayar);
            $kemo = $this->M_Laporan_pendapatan->total_kemoterapi($mulai, $akhir, $caraBayar);
            $stifin = $this->M_Laporan_pendapatan->total_stifin($mulai, $akhir, $caraBayar);
            $trasport = $this->M_Laporan_pendapatan->total_transportasi($mulai, $akhir, $caraBayar);
            $kia = $this->M_Laporan_pendapatan->total_kia($mulai, $akhir, $caraBayar);
            $lain = $this->M_Laporan_pendapatan->total_lain($mulai, $akhir, $caraBayar);
            $mcu = $this->M_Laporan_pendapatan->total_mcu($mulai, $akhir, $caraBayar);
            $obat_bebas = $this->M_Laporan_pendapatan->total_obat_bebas($mulai, $akhir, $caraBayar);

            $biaya_ranap = $this->db->query("SELECT IFNULL(h.biaya_ruangan,0) biaya_ruangan from history_pelayanan_ranap h , pelayanan p
            where p.status = 1 and h.status = 1 and h.id_pelayanan = p.id_pelayanan and p.cara_bayar ='$caraBayar'
            and DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir'")->row_array();
            $biaya_ranap = (isset($biaya_ranap)) ? $biaya_ranap['biaya_ruangan'] : 0;

            $total_harga = $adm
                + $biaya_ranap
                + $apotik['total'] + $obatok['total'] + $igd['total'] + $labor['total'] + $radio['total']
                + $anak['total'] + $apelkes['total'] + $internis['total'] + $bedah['total'] + $fisio['total'] + $gigi['total']
                + $jantung['total'] + $kulit['total'] + $mata['total'] + $obgyne['total'] + $ok['total'] + $tht['total'] + $umum['total'] +
                $akp['total'] + $bdm['total'] + $jiwa['total'] + $ort['total'] + $paru['total'] + $hd['total'] + $saraf['total'] + $uro['total'] +
                $ginjal['total'] + $pnm['total'] + $rehab['total'] + $gizi['total'] + $terapi['total'] + $psikologi['total'] +
                $kemo['total'] + $trasport['total'] + $kia['total'] + $stifin['total'] + $lain['total'] + $obat_bebas['total'] + $mcu['total'];


            $out[$i] = array($no, $nama, $total_harga);
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

    //Laporan biaya ranap
    public function Tampil_laporan_biaya_ranap()
    {
        $page_data = $this->M_Laporan_pendapatan->selectLaporanbiayaranap();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $total = $page_data[$i]->total;


            $out[$i] = array($no, $tanggal, $total);
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

    public function Tampil_Rangelaporan_biaya_ranap()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Laporan_pendapatan->selectRangeLaporanbiayaranap($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $total = $page_data[$i]->total;


            $out[$i] = array($no, $tanggal, $total);
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
    //Laporan biaya ranap
    public function Tampil_laporan_visite_dokter()
    {
        $page_data = $this->M_Laporan_pendapatan->selectLaporanvisitedokter();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $total = $page_data[$i]->total;


            $out[$i] = array($no, $tanggal, $total);
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

    public function Tampil_Rangelaporan_visite_dokter()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Laporan_pendapatan->selectRangeLaporanvisitedokter($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $total = $page_data[$i]->total;


            $out[$i] = array($no, $tanggal, $total);
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
    //Laporan pendapatan fisio
    public function Tampil_laporan_pendapatan_fisio()
    {
        $page_data = $this->M_Laporan_pendapatan->selectLaporanpendapatanfisio();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $total = $page_data[$i]->total;


            $out[$i] = array($no, $tanggal, $total);
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

    public function Tampil_Rangelaporan_pendapatan_fisio()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Laporan_pendapatan->selectRangeLaporanpendapatanfisio($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tanggal = $page_data[$i]->tanggal;
            $total = $page_data[$i]->total;


            $out[$i] = array($no, $tanggal, $total);
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
    //laporan pendapatan keuangan
    public function Laporan_pendapatan_keuangan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pendapatan_keuangan';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Labor_pulang_pdf()
    {
        $this->load->library('pdf');
        $this->data['title']    = 'Laporan';
        $mulai = $this->input->GET('mulai');
        $akhir = $this->input->GET('akhir');
        // var_dump($mulai);
        // var_dump($akhir);  



        $this->data['bpjs'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'BPJS');
        $this->data['yayasan_pertamina'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'YAYASAN PERTAMINA');
        $this->data['bayar_sendiri'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'BAYAR SENDIRI/UMUM');
        $this->data['timah'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'TIMAH');
        $this->data['internal_rsbt'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'INTERNAL RSBT');
        $this->data['asuransi_jiwa'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'ASURANSI JIWA INHEALTH INDONESIA');
        $this->data['pln'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'PLN (PERSERO)  WILAYAH BANGKA BELITUNG');
        $this->data['yayasan_kesehatan'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'YAYASAN KESEHATAN PEGAWAI TELKOM');
        $this->data['asuransi'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'ASURANSI BRI LIFE');
        $this->data['nayaka'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'NAYAKA ERA HUSADA ');
        $this->data['administrasi_medika'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'ADMINISTRASI MEDIKA');
        $this->data['asuransi_umum'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'ASURANSI UMUM BUMIPUTERA MUDA 1967');
        $this->data['bri'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'BANK RAKYAT INDONESIA ');
        $this->data['lippo'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'LIPPO GENERAL ASURANCE');
        $this->data['bukit_asam'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'BUKIT ASAM');
        $this->data['prudential'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'PRUDENTIAL LIFE ASSURANCE');
        $this->data['angkasa_pura'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'ANGKASA PURA II BANDARA DEPATI AMIR BANGKA');
        $this->data['asuransi_bca'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'ASURANSI BCA');
        $this->data['asuransi_ramayana'] = $this->M_Laporan_Pendapatan_Keuangan->selectPendapatanPerkelompok($mulai, $akhir, 'ASURANSI RAMAYANA Tbk');
        //
        $this->data['konsulRajal_jasaDokter'] = $this->M_Laporan_Pendapatan_Keuangan->selectKonsulRajalJasaDokter($mulai, $akhir);
        $this->data['visiteRajal_jasaDokter'] = $this->M_Laporan_Pendapatan_Keuangan->selectVisiteRanapJasaDokter($mulai, $akhir);
        $this->data['KonsulRajal_jasaSarana'] = $this->M_Laporan_Pendapatan_Keuangan->selectKonsulRajalJasaSarana($mulai, $akhir);
        $this->data['tindakanRajal_jasaSarana'] = $this->M_Laporan_Pendapatan_Keuangan->selectTindakanRajalJasaSarana($mulai, $akhir);
        $this->data['tindakanRanap_jasaSarana'] = $this->M_Laporan_Pendapatan_Keuangan->selectTindakanRanapJasaSarana($mulai, $akhir);
        $this->data['obatFarmasi_rajal'] = $this->M_Laporan_Pendapatan_Keuangan->selectobatFarmasiRajal($mulai, $akhir);
        $this->data['obatFarmasi_ranap'] = $this->M_Laporan_Pendapatan_Keuangan->selectobatFarmasiRanap($mulai, $akhir);
        $this->data['apotikLuar'] = $this->M_Laporan_Pendapatan_Keuangan->selectApotikLuar($mulai, $akhir);
        $this->data['fisioRanap'] = $this->M_Laporan_Pendapatan_Keuangan->selectFisioRanap($mulai, $akhir);
        $this->data['radiologiRajal'] = $this->M_Laporan_Pendapatan_Keuangan->selectRadiologiRajal($mulai, $akhir);
        $this->data['radiologiRanap'] = $this->M_Laporan_Pendapatan_Keuangan->selectRadiologiRanap($mulai, $akhir);
        $this->data['LaborRanap'] = $this->M_Laporan_Pendapatan_Keuangan->selectLaborRanap($mulai, $akhir);


        $html = $this->load->view('page_content/Laporan_keuangan_pdf', $this->data, true);
        $this->pdf->createPDF($html, 'FJP', false);
    }

    //laporan pendapatan keuangan
    public function Laporan_pendapatan_unit()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pendapatan_unit_rajal';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_pendapatan_rajal()
    {
        $now = date('Y-m-d');
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $page_data = $this->db->get_where('list_poli', ['status_dokter' => 'ADA'])->result();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tindakan = $page_data[$i]->tindakan;
            $list_tindakan = $page_data[$i]->list_tindakan;
            if ($mulai != '' && $akhir != '') {

                if ($tindakan == 'tindakan_labor') {
                    $total = $this->db->query("SELECT sum(total) total
                    FROM `$tindakan` t, `$list_tindakan` l, pelayanan p 
                    where t.id_list_tindakan = l.id_daftar_tindakan and p.id_pelayanan = t.id_pelayanan
                    and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
                    
                    ")->row()->total;
                } else if ($tindakan == 'tindakan_radiologi') {
                    $total = $this->db->query("SELECT sum(total) total
                    FROM `$tindakan` t, `$list_tindakan` l, pelayanan p 
                    where t.id_tindakan = l.id_daftar_tindakan and p.id_pelayanan = t.id_pelayanan
                    and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
                    
                    ")->row()->total;
                } else {
                    $total = $this->db->query("SELECT sum(total) total
                    FROM `$tindakan` t, `$list_tindakan` l, pelayanan p 
                    where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan
                    and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
                    
                    ")->row()->total;
                }
            } else {
                if ($tindakan == 'tindakan_labor') {
                    $total = $this->db->query("SELECT sum(total) total
                    FROM `$tindakan` t, `$list_tindakan` l, pelayanan p 
                    where t.id_list_tindakan = l.id_daftar_tindakan and p.id_pelayanan = t.id_pelayanan
                    and DATE(t.tanggal) = '$now' 
                    ")->row()->total;
                } else if ($tindakan == 'tindakan_radiologi') {
                    $total = $this->db->query("SELECT sum(total) total
                    FROM `$tindakan` t, `$list_tindakan` l, pelayanan p 
                    where t.id_tindakan = l.id_daftar_tindakan and p.id_pelayanan = t.id_pelayanan
                    and DATE(t.tanggal) = '$now'
                    
                    ")->row()->total;
                } else {
                    $total = $this->db->query("SELECT sum(total) total
            FROM `$tindakan` t, `$list_tindakan` l, pelayanan p 
            where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan
            and DATE(t.tanggal) = '$now' 
            
            ")->row()->total;
                }
            }
            $poli = $page_data[$i]->nama_panjang;
            $total = $total;

            $out[$i] = array($no, $poli, $total);
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
    public function Laporan_revenue()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_revenue';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function getPendapatan_revenue()
    {
        // $mulai = '2023-03-01';
        // $akhir = '2023-03-31';
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $adm = $this->M_Laporan_Pendapatan_Keuangan->total_pelayanan_pasien($mulai, $akhir);
        $apotik = $this->M_Laporan_Pendapatan_Keuangan->total_apotik($mulai, $akhir);
        $depo_ranap = $this->M_Laporan_Pendapatan_Keuangan->total_depo_ranap($mulai, $akhir);
        $obat_ruangan = $this->M_Laporan_Pendapatan_Keuangan->total_obat_ruangan_ranap($mulai, $akhir);
        $obatok = $this->M_Laporan_Pendapatan_Keuangan->total_operasi($mulai, $akhir);
        $igd = $this->M_Laporan_Pendapatan_Keuangan->total_igd($mulai, $akhir);
        $labor = $this->M_Laporan_Pendapatan_Keuangan->total_labor($mulai, $akhir);
        $radio = $this->M_Laporan_Pendapatan_Keuangan->total_radio($mulai, $akhir);
        $anak = $this->M_Laporan_Pendapatan_Keuangan->total_anak($mulai, $akhir);
        $apelkes = $this->M_Laporan_Pendapatan_Keuangan->total_apelkes($mulai, $akhir);
        $internis = $this->M_Laporan_Pendapatan_Keuangan->total_internis($mulai, $akhir);
        $bedah = $this->M_Laporan_Pendapatan_Keuangan->total_bedah($mulai, $akhir);
        $fisio = $this->M_Laporan_Pendapatan_Keuangan->total_fisio($mulai, $akhir);
        $gigi = $this->M_Laporan_Pendapatan_Keuangan->total_gigi($mulai, $akhir);
        $jantung = $this->M_Laporan_Pendapatan_Keuangan->total_jantung($mulai, $akhir);
        $kulit = $this->M_Laporan_Pendapatan_Keuangan->total_kulit($mulai, $akhir);
        $mata = $this->M_Laporan_Pendapatan_Keuangan->total_mata($mulai, $akhir);
        $obgyne = $this->M_Laporan_Pendapatan_Keuangan->total_obgyne($mulai, $akhir);
        $ok = $this->M_Laporan_Pendapatan_Keuangan->total_ok($mulai, $akhir);
        $tht = $this->M_Laporan_Pendapatan_Keuangan->total_tht($mulai, $akhir);
        $umum = $this->M_Laporan_Pendapatan_Keuangan->total_umum($mulai, $akhir);
        $akp = $this->M_Laporan_Pendapatan_Keuangan->total_akupuntur($mulai, $akhir);
        $bdm = $this->M_Laporan_Pendapatan_Keuangan->total_bedah_mulut($mulai, $akhir);
        $jiwa = $this->M_Laporan_Pendapatan_Keuangan->total_kesjiwa($mulai, $akhir);
        $ort = $this->M_Laporan_Pendapatan_Keuangan->total_orthopedi($mulai, $akhir);
        $paru = $this->M_Laporan_Pendapatan_Keuangan->total_paru($mulai, $akhir);
        $hd = $this->M_Laporan_Pendapatan_Keuangan->total_hemodialisa($mulai, $akhir);
        $saraf = $this->M_Laporan_Pendapatan_Keuangan->total_saraf($mulai, $akhir);
        $uro = $this->M_Laporan_Pendapatan_Keuangan->total_urologi($mulai, $akhir);
        $ginjal = $this->M_Laporan_Pendapatan_Keuangan->total_ginjal($mulai, $akhir);
        $pnm = $this->M_Laporan_Pendapatan_Keuangan->total_penyakit_mulut($mulai, $akhir);
        $rehab = $this->M_Laporan_Pendapatan_Keuangan->total_rehab($mulai, $akhir);
        $gizi = $this->M_Laporan_Pendapatan_Keuangan->total_gizi($mulai, $akhir);
        $terapi = $this->M_Laporan_Pendapatan_Keuangan->total_terapi_wicara($mulai, $akhir);
        $psikologi = $this->M_Laporan_Pendapatan_Keuangan->total_psikolog($mulai, $akhir);
        $kemo = $this->M_Laporan_Pendapatan_Keuangan->total_kemoterapi($mulai, $akhir);
        $stifin = $this->M_Laporan_Pendapatan_Keuangan->total_stifin($mulai, $akhir);
        $trasport = $this->M_Laporan_Pendapatan_Keuangan->total_transportasi($mulai, $akhir);
        $kia = $this->M_Laporan_Pendapatan_Keuangan->total_kia($mulai, $akhir);
        $lain = $this->M_Laporan_Pendapatan_Keuangan->total_lain($mulai, $akhir);
        $mcu = $this->M_Laporan_Pendapatan_Keuangan->total_mcu($mulai, $akhir);
        $obat_bebas = $this->M_Laporan_Pendapatan_Keuangan->total_obat_bebas($mulai, $akhir);

        $biaya_ranap = $this->db->query("SELECT IFNULL(sum(h.biaya_ruangan),0) biaya_ruangan from history_pelayanan_ranap h , pelayanan p
        where p.status = 1 and h.status = 1 and h.id_pelayanan = p.id_pelayanan
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir'")->row_array();
        $biaya_ranap = (isset($biaya_ranap)) ? $biaya_ranap['biaya_ruangan'] : 0;


        // echo $total_harga . '<br>';

        $dbhead = [
            'ADMINISTRASI',
            'BIAYA ADM RANAP',
            'FARMASI RAJAL',
            'FARMASI RANAP',
            'BMHP RUANGAN RAWAT INAP',
            'BAHAN MEDIS OK',
            'KAMAR OPERASI',
            'IGD',
            'LABORATORIUM',
            'RADIOLOGI',
            'TINDAKAN BIAYA RAWAT INAP',
            'POLI ANAK',
            'POLI INTERNIS',
            'POLI BEDAH',
            'POLI FISIOTERAPI',
            'POI GIGI',
            'POLI JANTUNG',
            'POLI KULIT',
            'POLI MATA',
            'POLI KANDUNGAN',
            'POLI THT',
            'POLI UMUM',
            'POLI AKUPUNTUR',
            'POLI BEDAH MULUT',
            'POLI KESEHATAN JIWA',
            'POLI ORTHOPEDI',
            'POLI PARU',
            'HEMODIALISA',
            'POLI SARAF',
            'POLI UROLOGI',
            'POLI GINJAL',
            'POLI PENYAKIT MULUT',
            'CONTROL REHABILITASI MEDIC',
            'GIZI',
            'TERAPI WICARA',
            'PSIKOLOGI',
            'KEMOTERAPI',
            'TRANSPORTASI',
            'POLI KIA',
            'STIFFIN',
            'PENUNJANG LAINNYA',
            'OBAT BEBAS',
            'MCU',
        ];
        $dbtotal_harga = [
            $adm,
            $biaya_ranap,
            $apotik['total'],
            $depo_ranap['total'],
            $obat_ruangan['total'],
            $obatok['total'],
            $ok['total'],
            $igd['total'],
            $labor['total'],
            $radio['total'],
            $apelkes['total'],
            $anak['total'],
            $internis['total'],
            $bedah['total'],
            $fisio['total'],
            $gigi['total'],
            $jantung['total'],
            $kulit['total'],
            $mata['total'],
            $obgyne['total'],
            $tht['total'],
            $umum['total'],
            $akp['total'],
            $bdm['total'],
            $jiwa['total'],
            $ort['total'],
            $paru['total'],
            $hd['total'],
            $saraf['total'],
            $uro['total'],
            $ginjal['total'],
            $pnm['total'],
            $rehab['total'],
            $gizi['total'],
            $terapi['total'],
            $psikologi['total'],
            $kemo['total'],
            $trasport['total'],
            $kia['total'],
            $stifin['total'],
            $lain['total'],
            $obat_bebas['total'],
            $mcu['total'],

        ];

        // print_arr($dbtotal_harga);


        // $total_harga = $adm
        //     + $biaya_ranap
        //     + $apotik['total'] + $obatok['total'] + $igd['total'] + $labor['total'] + $radio['total']
        //     + $anak['total'] + $apelkes['total'] + $internis['total'] + $bedah['total'] + $fisio['total'] + $gigi['total']
        //     + $jantung['total'] + $kulit['total'] + $mata['total'] + $obgyne['total'] + $ok['total'] + $tht['total'] + $umum['total'] +
        //     $akp['total'] + $bdm['total'] + $jiwa['total'] + $ort['total'] + $paru['total'] + $hd['total'] + $saraf['total'] + $uro['total'] +
        //     $ginjal['total'] + $pnm['total'] + $rehab['total'] + $gizi['total'] + $terapi['total'] + $psikologi['total'] +
        //     $kemo['total'] + $trasport['total'] + $kia['total'] + $stifin['total'] + $lain['total'] + $obat_bebas['total'] + $mcu['total'];


        $out = null;
        for ($i = 0; $i < count($dbhead); $i++) {
            $no = $i + 1;
            $head = $dbhead[$i];
            $total = number_format($dbtotal_harga[$i], 2, ',', '.');

            $out[$i] = array($no,$head,$total);
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
    public function getTotal_revenue()
    {
        // $mulai = '2023-03-01';
        // $akhir = '2023-03-31';
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $adm = $this->M_Laporan_Pendapatan_Keuangan->total_pelayanan_pasien($mulai, $akhir);
        $apotik = $this->M_Laporan_Pendapatan_Keuangan->total_apotik($mulai, $akhir);
        $depo_ranap = $this->M_Laporan_Pendapatan_Keuangan->total_depo_ranap($mulai, $akhir);
        $obat_ruangan = $this->M_Laporan_Pendapatan_Keuangan->total_obat_ruangan_ranap($mulai, $akhir);
        $obatok = $this->M_Laporan_Pendapatan_Keuangan->total_operasi($mulai, $akhir);
        $igd = $this->M_Laporan_Pendapatan_Keuangan->total_igd($mulai, $akhir);
        $labor = $this->M_Laporan_Pendapatan_Keuangan->total_labor($mulai, $akhir);
        $radio = $this->M_Laporan_Pendapatan_Keuangan->total_radio($mulai, $akhir);
        $anak = $this->M_Laporan_Pendapatan_Keuangan->total_anak($mulai, $akhir);
        $apelkes = $this->M_Laporan_Pendapatan_Keuangan->total_apelkes($mulai, $akhir);
        $internis = $this->M_Laporan_Pendapatan_Keuangan->total_internis($mulai, $akhir);
        $bedah = $this->M_Laporan_Pendapatan_Keuangan->total_bedah($mulai, $akhir);
        $fisio = $this->M_Laporan_Pendapatan_Keuangan->total_fisio($mulai, $akhir);
        $gigi = $this->M_Laporan_Pendapatan_Keuangan->total_gigi($mulai, $akhir);
        $jantung = $this->M_Laporan_Pendapatan_Keuangan->total_jantung($mulai, $akhir);
        $kulit = $this->M_Laporan_Pendapatan_Keuangan->total_kulit($mulai, $akhir);
        $mata = $this->M_Laporan_Pendapatan_Keuangan->total_mata($mulai, $akhir);
        $obgyne = $this->M_Laporan_Pendapatan_Keuangan->total_obgyne($mulai, $akhir);
        $ok = $this->M_Laporan_Pendapatan_Keuangan->total_ok($mulai, $akhir);
        $tht = $this->M_Laporan_Pendapatan_Keuangan->total_tht($mulai, $akhir);
        $umum = $this->M_Laporan_Pendapatan_Keuangan->total_umum($mulai, $akhir);
        $akp = $this->M_Laporan_Pendapatan_Keuangan->total_akupuntur($mulai, $akhir);
        $bdm = $this->M_Laporan_Pendapatan_Keuangan->total_bedah_mulut($mulai, $akhir);
        $jiwa = $this->M_Laporan_Pendapatan_Keuangan->total_kesjiwa($mulai, $akhir);
        $ort = $this->M_Laporan_Pendapatan_Keuangan->total_orthopedi($mulai, $akhir);
        $paru = $this->M_Laporan_Pendapatan_Keuangan->total_paru($mulai, $akhir);
        $hd = $this->M_Laporan_Pendapatan_Keuangan->total_hemodialisa($mulai, $akhir);
        $saraf = $this->M_Laporan_Pendapatan_Keuangan->total_saraf($mulai, $akhir);
        $uro = $this->M_Laporan_Pendapatan_Keuangan->total_urologi($mulai, $akhir);
        $ginjal = $this->M_Laporan_Pendapatan_Keuangan->total_ginjal($mulai, $akhir);
        $pnm = $this->M_Laporan_Pendapatan_Keuangan->total_penyakit_mulut($mulai, $akhir);
        $rehab = $this->M_Laporan_Pendapatan_Keuangan->total_rehab($mulai, $akhir);
        $gizi = $this->M_Laporan_Pendapatan_Keuangan->total_gizi($mulai, $akhir);
        $terapi = $this->M_Laporan_Pendapatan_Keuangan->total_terapi_wicara($mulai, $akhir);
        $psikologi = $this->M_Laporan_Pendapatan_Keuangan->total_psikolog($mulai, $akhir);
        $kemo = $this->M_Laporan_Pendapatan_Keuangan->total_kemoterapi($mulai, $akhir);
        $stifin = $this->M_Laporan_Pendapatan_Keuangan->total_stifin($mulai, $akhir);
        $trasport = $this->M_Laporan_Pendapatan_Keuangan->total_transportasi($mulai, $akhir);
        $kia = $this->M_Laporan_Pendapatan_Keuangan->total_kia($mulai, $akhir);
        $lain = $this->M_Laporan_Pendapatan_Keuangan->total_lain($mulai, $akhir);
        $mcu = $this->M_Laporan_Pendapatan_Keuangan->total_mcu($mulai, $akhir);
        $obat_bebas = $this->M_Laporan_Pendapatan_Keuangan->total_obat_bebas($mulai, $akhir);

        $biaya_ranap = $this->db->query("SELECT IFNULL(sum(h.biaya_ruangan),0) biaya_ruangan from history_pelayanan_ranap h , pelayanan p
        where p.status = 1 and h.status = 1 and h.id_pelayanan = p.id_pelayanan
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir'")->row_array();
        $biaya_ranap = (isset($biaya_ranap)) ? $biaya_ranap['biaya_ruangan'] : 0;


        // echo $total_harga . '<br>';

        $dbtotal_harga = [
            'adm'=>$adm,
            'adm ranap'=>$biaya_ranap,
            'depo rajal'=>$apotik['total'],
            'depo ranap'=>$depo_ranap['total'],
            'obat ruangan'=>$obat_ruangan['total'],
            'obatok'=>$obatok['total'],
            'igd'=>$igd['total'],
            'labor'=>$labor['total'],
            'radio'=>$radio['total'],
            'anak'=> $anak['total'],
            'apelkes'=>$apelkes['total'],
            'internis'=>$internis['total'],
            'bedah'=>$bedah['total'],
            'fisio'=>$fisio['total'],
            'gigi'=> $gigi['total'],
            'jantung'=>$jantung['total'],
            'kulit'=>$kulit['total'],
            'mata'=>$mata['total'],
            'obgyne'=>$obgyne['total'],
            'ok'=>$ok['total'],
            'tht'=>$tht['total'],
            'umum'=>$umum['total'],
            'akp'=>$akp['total'],
            'bdm'=>$bdm['total'],
            'jiwa'=>$jiwa['total'],
            'ort'=>$ort['total'],
            'paru'=>$paru['total'],
            'hd'=>$hd['total'],
            'saraf'=>$saraf['total'],
            'uro'=>$uro['total'],
            'ginjal'=>$ginjal['total'],
            'pnm'=> $pnm['total'],
            'rehab'=> $rehab['total'],
            'gizi'=>$gizi['total'],
            'terapi'=> $terapi['total'],
            'psikologi'=>$psikologi['total'],
            'kemo'=> $kemo['total'],
            'trasport'=>$trasport['total'],
            'kia'=> $kia['total'],
            'stifin'=> $stifin['total'],
            'tindakan_lain'=>$lain['total'],
            'obat_bebas'=>$obat_bebas['total'],
            'mcu'=>$mcu['total'],
        ];
        
        // print_arr($dbtotal_harga);


        $total_harga = $adm
            + $biaya_ranap
            + $apotik['total'] + $depo_ranap['total'] + $obat_ruangan['total']
            + $obatok['total'] + $igd['total'] + $labor['total'] + $radio['total']
            + $anak['total'] + $apelkes['total'] + $internis['total'] + $bedah['total'] + $fisio['total'] + $gigi['total']
            + $jantung['total'] + $kulit['total'] + $mata['total'] + $obgyne['total'] + $ok['total'] + $tht['total'] + $umum['total'] +
            $akp['total'] + $bdm['total'] + $jiwa['total'] + $ort['total'] + $paru['total'] + $hd['total'] + $saraf['total'] + $uro['total'] +
            $ginjal['total'] + $pnm['total'] + $rehab['total'] + $gizi['total'] + $terapi['total'] + $psikologi['total'] +
            $kemo['total'] + $trasport['total'] + $kia['total'] + $stifin['total'] + $lain['total'] + $obat_bebas['total'] + $mcu['total'];


            $out[0] = array('Rp. '.number_format($total_harga, 2, ',', '.'));
            $page_data['data'] = $out;
            echo json_encode($page_data);
    }
    public function getPendapatan1()
    {
        $mulai = '2023-03-01';
        $akhir = '2023-03-31';
      
        $adm = $this->M_Laporan_Pendapatan_Keuangan->total_pelayanan_pasien($mulai, $akhir);
        $apotik = $this->M_Laporan_Pendapatan_Keuangan->total_apotik($mulai, $akhir);
        $depo_ranap = $this->M_Laporan_Pendapatan_Keuangan->total_depo_ranap($mulai, $akhir);
        $obat_ruangan = $this->M_Laporan_Pendapatan_Keuangan->total_obat_ruangan_ranap($mulai, $akhir);
        $obatok = $this->M_Laporan_Pendapatan_Keuangan->total_operasi($mulai, $akhir);
        $igd = $this->M_Laporan_Pendapatan_Keuangan->total_igd($mulai, $akhir);
        $labor = $this->M_Laporan_Pendapatan_Keuangan->total_labor($mulai, $akhir);
        $radio = $this->M_Laporan_Pendapatan_Keuangan->total_radio($mulai, $akhir);
        $anak = $this->M_Laporan_Pendapatan_Keuangan->total_anak($mulai, $akhir);
        $apelkes = $this->M_Laporan_Pendapatan_Keuangan->total_apelkes($mulai, $akhir);
        $internis = $this->M_Laporan_Pendapatan_Keuangan->total_internis($mulai, $akhir);
        $bedah = $this->M_Laporan_Pendapatan_Keuangan->total_bedah($mulai, $akhir);
        $fisio = $this->M_Laporan_Pendapatan_Keuangan->total_fisio($mulai, $akhir);
        $gigi = $this->M_Laporan_Pendapatan_Keuangan->total_gigi($mulai, $akhir);
        $jantung = $this->M_Laporan_Pendapatan_Keuangan->total_jantung($mulai, $akhir);
        $kulit = $this->M_Laporan_Pendapatan_Keuangan->total_kulit($mulai, $akhir);
        $mata = $this->M_Laporan_Pendapatan_Keuangan->total_mata($mulai, $akhir);
        $obgyne = $this->M_Laporan_Pendapatan_Keuangan->total_obgyne($mulai, $akhir);
        $ok = $this->M_Laporan_Pendapatan_Keuangan->total_ok($mulai, $akhir);
        $tht = $this->M_Laporan_Pendapatan_Keuangan->total_tht($mulai, $akhir);
        $umum = $this->M_Laporan_Pendapatan_Keuangan->total_umum($mulai, $akhir);
        $akp = $this->M_Laporan_Pendapatan_Keuangan->total_akupuntur($mulai, $akhir);
        $bdm = $this->M_Laporan_Pendapatan_Keuangan->total_bedah_mulut($mulai, $akhir);
        $jiwa = $this->M_Laporan_Pendapatan_Keuangan->total_kesjiwa($mulai, $akhir);
        $ort = $this->M_Laporan_Pendapatan_Keuangan->total_orthopedi($mulai, $akhir);
        $paru = $this->M_Laporan_Pendapatan_Keuangan->total_paru($mulai, $akhir);
        $hd = $this->M_Laporan_Pendapatan_Keuangan->total_hemodialisa($mulai, $akhir);
        $saraf = $this->M_Laporan_Pendapatan_Keuangan->total_saraf($mulai, $akhir);
        $uro = $this->M_Laporan_Pendapatan_Keuangan->total_urologi($mulai, $akhir);
        $ginjal = $this->M_Laporan_Pendapatan_Keuangan->total_ginjal($mulai, $akhir);
        $pnm = $this->M_Laporan_Pendapatan_Keuangan->total_penyakit_mulut($mulai, $akhir);
        $rehab = $this->M_Laporan_Pendapatan_Keuangan->total_rehab($mulai, $akhir);
        $gizi = $this->M_Laporan_Pendapatan_Keuangan->total_gizi($mulai, $akhir);
        $terapi = $this->M_Laporan_Pendapatan_Keuangan->total_terapi_wicara($mulai, $akhir);
        $psikologi = $this->M_Laporan_Pendapatan_Keuangan->total_psikolog($mulai, $akhir);
        $kemo = $this->M_Laporan_Pendapatan_Keuangan->total_kemoterapi($mulai, $akhir);
        $stifin = $this->M_Laporan_Pendapatan_Keuangan->total_stifin($mulai, $akhir);
        $trasport = $this->M_Laporan_Pendapatan_Keuangan->total_transportasi($mulai, $akhir);
        $kia = $this->M_Laporan_Pendapatan_Keuangan->total_kia($mulai, $akhir);
        $lain = $this->M_Laporan_Pendapatan_Keuangan->total_lain($mulai, $akhir);
        $mcu = $this->M_Laporan_Pendapatan_Keuangan->total_mcu($mulai, $akhir);
        $obat_bebas = $this->M_Laporan_Pendapatan_Keuangan->total_obat_bebas($mulai, $akhir);

        $biaya_ranap = $this->db->query("SELECT IFNULL(h.biaya_ruangan,0) biaya_ruangan from history_pelayanan_ranap h , pelayanan p
        where p.status = 1 and h.status = 1 and h.id_pelayanan = p.id_pelayanan
        and DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir'")->row_array();
        $biaya_ranap = (isset($biaya_ranap)) ? $biaya_ranap['biaya_ruangan'] : 0;


        // echo $total_harga . '<br>';

        $dbtotal_harga = [
            'adm'=>$adm,
            'adm ranap'=>$biaya_ranap,
            'depo rajal'=>$apotik['total'],
            'depo ranap'=>$depo_ranap['total'],
            'obat ruangan'=>$obat_ruangan['total'],
            'obatok'=>$obatok['total'],
            'igd'=>$igd['total'],
            'labor'=>$labor['total'],
            'radio'=>$radio['total'],
            'anak'=> $anak['total'],
            'apelkes'=>$apelkes['total'],
            'internis'=>$internis['total'],
            'bedah'=>$bedah['total'],
            'fisio'=>$fisio['total'],
            'gigi'=> $gigi['total'],
            'jantung'=>$jantung['total'],
            'kulit'=>$kulit['total'],
            'mata'=>$mata['total'],
            'obgyne'=>$obgyne['total'],
            'ok'=>$ok['total'],
            'tht'=>$tht['total'],
            'umum'=>$umum['total'],
            'akp'=>$akp['total'],
            'bdm'=>$bdm['total'],
            'jiwa'=>$jiwa['total'],
            'ort'=>$ort['total'],
            'paru'=>$paru['total'],
            'hd'=>$hd['total'],
            'saraf'=>$saraf['total'],
            'uro'=>$uro['total'],
            'ginjal'=>$ginjal['total'],
            'pnm'=> $pnm['total'],
            'rehab'=> $rehab['total'],
            'gizi'=>$gizi['total'],
            'terapi'=> $terapi['total'],
            'psikologi'=>$psikologi['total'],
            'kemo'=> $kemo['total'],
            'trasport'=>$trasport['total'],
            'kia'=> $kia['total'],
            'stifin'=> $stifin['total'],
            'tindakan_lain'=>$lain['total'],
            'obat_bebas'=>$obat_bebas['total'],
            'mcu'=>$mcu['total'],
        ];
        
        print_arr($dbtotal_harga);


        $total_harga = $adm
            + $biaya_ranap
            + $apotik['total'] + $obatok['total'] + $igd['total'] + $labor['total'] + $radio['total']
            + $anak['total'] + $apelkes['total'] + $internis['total'] + $bedah['total'] + $fisio['total'] + $gigi['total']
            + $jantung['total'] + $kulit['total'] + $mata['total'] + $obgyne['total'] + $ok['total'] + $tht['total'] + $umum['total'] +
            $akp['total'] + $bdm['total'] + $jiwa['total'] + $ort['total'] + $paru['total'] + $hd['total'] + $saraf['total'] + $uro['total'] +
            $ginjal['total'] + $pnm['total'] + $rehab['total'] + $gizi['total'] + $terapi['total'] + $psikologi['total'] +
            $kemo['total'] + $trasport['total'] + $kia['total'] + $stifin['total'] + $lain['total'] + $obat_bebas['total'] + $mcu['total'];


    echo $total_harga;
    }
}
