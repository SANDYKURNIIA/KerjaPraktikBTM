<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Apotik_laporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Apotik_laporan');
        $this->load->model('M_Apotik');
    }
    //Pasien Rajal

    //Laporan Paien Rajal
    public function Laporan_pasien_rajal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pasien_rajal_apotik';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_pasien_rajal()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $page_data = $this->M_Apotik_laporan->selectLaporanPasienObatApotik($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $kode_obat = $page_data[$i]->kode_sibatik;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $dokter, $kode_obat, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor,  $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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
    public function update_perencanaan()
    {
        $stok = $this->input->post('stok');//tabel stok
        $table = $this->input->post('table');//tabel pr
        $tgl = date('Y-m-d H:i:s');
        $d_stok = $this->db->query("SELECT sum(frek) stok, id_logistik from $stok group by id_logistik")->result();
        // $d_penggunaan = $this->db->query("SELECT sum(frek) stok from $stok where asal_tujuan = 'PENJUALAN' and id_logistik ='$id_logistik'")->row();
        foreach ($d_stok as $row) {
            $pr = $this->db->query("SELECT count(id_logistik) jum from `$table` where id_logistik ='$row->id_logistik'")->row();
            if ($pr->jum > 0) {
                $this->M_Apotik->update(['stok_tersedia' => $row->stok,  'tanggal_update' => $tgl], ['id_logistik' => $row->id_logistik], $table);
            } else {
                $page_data = [
                    'id_logistik' => $row->id_logistik,
                    'stok_tersedia' => $row->stok,
                    'penggunaan' => 0,
                    'tanggal_update' => $tgl
                ];
                $this->db->insert($table, $page_data);
            }
            echo $row->id_logistik;
        }
        echo 'selesai';
    }

     public function Laporan_pasien_Igd()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pasien_Igd_apotik2';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_pasien_Igd()
    {
        $page_data = $this->M_Apotik_laporan->selectLaporanPasienObatIgd();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $standar = $page_data[$i]->standar;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $jenis_pelayanan, $dokter, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor,  $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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
    public function Tampil_Rangelaporan_pasienIgd()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik_laporan->selectRangeLaporanPasienObatIgd($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $jenis_pelayanan,  $dokter, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor,  $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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
    
    public function Laporan_pasien_Ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pasien_ranap_apotik2';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_pasien_Ranap()
    {
        $page_data = $this->M_Apotik_laporan->selectLaporanPasienObatRanap();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $jenis_pelayanan = $page_data[$i]->ruangan;
            $standar = $page_data[$i]->standar;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $jenis_pelayanan, $dokter, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor,  $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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
    public function Tampil_Rangelaporan_pasienRanap()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik_laporan->selectRangeLaporanPasienObatRanap($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $jenis_pelayanan = $page_data[$i]->ruangan;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $jenis_pelayanan,  $dokter, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor,  $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Apotik_laporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Apotik_laporan');
        $this->load->model('M_Apotik');
    }
    //Pasien Rajal

    //Laporan Paien Rajal
    public function Laporan_pasien_rajal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pasien_rajal_apotik';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_pasien_rajal()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $page_data = $this->M_Apotik_laporan->selectLaporanPasienObatApotik($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $kode_obat = $page_data[$i]->kode_sibatik;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $dokter, $kode_obat, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor,  $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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
    public function update_perencanaan()
    {
        $stok = $this->input->post('stok');//tabel stok
        $table = $this->input->post('table');//tabel pr
        $tgl = date('Y-m-d H:i:s');
        $d_stok = $this->db->query("SELECT sum(frek) stok, id_logistik from $stok group by id_logistik")->result();
        // $d_penggunaan = $this->db->query("SELECT sum(frek) stok from $stok where asal_tujuan = 'PENJUALAN' and id_logistik ='$id_logistik'")->row();
        foreach ($d_stok as $row) {
            $pr = $this->db->query("SELECT count(id_logistik) jum from `$table` where id_logistik ='$row->id_logistik'")->row();
            if ($pr->jum > 0) {
                $this->M_Apotik->update(['stok_tersedia' => $row->stok,  'tanggal_update' => $tgl], ['id_logistik' => $row->id_logistik], $table);
            } else {
                $page_data = [
                    'id_logistik' => $row->id_logistik,
                    'stok_tersedia' => $row->stok,
                    'penggunaan' => 0,
                    'tanggal_update' => $tgl
                ];
                $this->db->insert($table, $page_data);
            }
            echo $row->id_logistik;
        }
        echo 'selesai';
    }

     public function Laporan_pasien_Igd()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pasien_Igd_apotik2';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_pasien_Igd()
    {
        $page_data = $this->M_Apotik_laporan->selectLaporanPasienObatIgd();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $standar = $page_data[$i]->standar;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $jenis_pelayanan, $dokter, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor,  $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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
    public function Tampil_Rangelaporan_pasienIgd()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik_laporan->selectRangeLaporanPasienObatIgd($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $jenis_pelayanan,  $dokter, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor,  $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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
    
    public function Laporan_pasien_Ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pasien_ranap_apotik2';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan_pasien_Ranap()
    {
        $page_data = $this->M_Apotik_laporan->selectLaporanPasienObatRanap();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $distributor = $page_data[$i]->distributor;
            $jenis_pelayanan = $page_data[$i]->ruangan;
            $standar = $page_data[$i]->standar;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $jenis_pelayanan, $dokter, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor,  $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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
    public function Tampil_Rangelaporan_pasienRanap()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Apotik_laporan->selectRangeLaporanPasienObatRanap($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $tglMasuk = $tgl . "," . $waktu;
            $time1 = strtotime($page_data[$i]->tanggal);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu1 = strftime("%H:%M WIB", $time1);
            $tglInput = $tgl1 . "," . $waktu1;
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jk = $page_data[$i]->jenis_kelamin;
            $caraBayar = $page_data[$i]->caraBayar;
            $dokter = $page_data[$i]->dokter;
            $nama = $page_data[$i]->nama;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $produsen = $page_data[$i]->produsen;
            $jenis_pelayanan = $page_data[$i]->ruangan;
            $distributor = $page_data[$i]->distributor;
            $standar = $page_data[$i]->standar;
            $hna = $page_data[$i]->hna;
            $margin = $page_data[$i]->margin;
            $disc = $page_data[$i]->disc;
            $total = $page_data[$i]->total;
            $total_jual = $page_data[$i]->total_jual;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $tglMasuk, $tglInput, $no_rm, $pasien, $jk, $caraBayar, $jenis_pelayanan,  $dokter, $nama, $kode, $golongan_obat, $tipe, $produsen, $distributor,  $standar, $hna, $margin, $disc, $total, $total_jual, $keterangan);
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
