<<<<<<< HEAD

<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kasir_pendapatan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'IND');
        $this->load->model('M_Kasir');
        $this->load->model('M_Pasien');
    }

    public function pasien_pulang2()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_pulang_kasir2';
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_pulang()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Kasir->selectRangePasienPulang($mulai, $akhir);
        } else {
            $page_data = $this->M_Kasir->selectPasienPulang();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";
            

            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $time1 = strtotime($page_data[$i]->tgl_keluar);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            //$tgl_keluar = $page_data[$i]->tgl_keluar;
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;

            //Tanggal lahir
            $time2 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl2 = strftime("%A, %d %B %Y", $time2); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur
            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            //$alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $out[$i] = array($no, $tombol, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter);
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


    public function pasien_pulang_ugd2()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_pulang_ugd2';
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_pulang_ugd()
    {
        $data = $this->session->userdata('data_auth');
        $page_data = $this->M_Kasir->selectPasienPulangUGD();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";

            if ($data->izin_akses == 'admin') {
                $tombol1 =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick=' kembali(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-action-undo '></i></button>";
            } else {
                $tombol1 = "";
            }

            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $time1 = strtotime($page_data[$i]->tgl_keluar);
            $tgl1 = strftime("%A, %d %B %Y", $time);
            //$tgl_keluar = $page_data[$i]->tgl_keluar;
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;

            //Tanggal lahir
            $time2 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl2 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur
            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            //$alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            //$poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            if ($data->id_staff == 'drfebry') {
                $out[$i] = array($no, $tombol, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $caraBayar, $diagnosa, $dokter);
            } else {
                $out[$i] = array($no, $tombol, $tombol1, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $caraBayar, $diagnosa, $dokter);
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
    public function Tampil_Range_pasienPulang_ugd()
    {
        $data = $this->session->userdata('data_auth');
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Kasir->selectRangePasienPulangUGD($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";

            if ($data->izin_akses == 'admin') {
                $tombol1 =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick=' kembali(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-action-undo '></i></button>";
            } else {
                $tombol1 = "";
            }

            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $time1 = strtotime($page_data[$i]->tgl_keluar);
            $tgl1 = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;

            //Tanggal lahir
            $time2 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl2 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur
            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            //$alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            // $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            if ($data->id_staff == 'drfebry') {
                $out[$i] = array($no, $tombol, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $caraBayar, $diagnosa, $dokter);
            } else {
                $out[$i] = array($no, $tombol, $tombol1, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $caraBayar, $diagnosa, $dokter);
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

    public function pasien_pulang_poli2()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_pulang_poli2';
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_pulang_poli()
    {
        $data = $this->session->userdata('data_auth');
        $page_data = $this->M_Kasir->selectPasienPulangPoli();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";

            if ($data->izin_akses == 'admin') {
                $tombol1 =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick=' kembali(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-action-undo '></i></button>";
            } else {
                $tombol1 = "";
            }

            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $time1 = strtotime($page_data[$i]->tgl_keluar);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            //$tgl_keluar = $page_data[$i]->tgl_keluar;
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;

            //Tanggal lahir
            $time2 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl2 = strftime("%A, %d %B %Y", $time2); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur
            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            //$alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            if ($data->id_staff == 'drfebry') {
                $out[$i] = array($no, $tombol, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter);
            } else {
                $out[$i] = array($no, $tombol, $tombol1, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter);
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
    public function Tampil_Range_pasienPulang_poli()
    {
        $data = $this->session->userdata('data_auth');
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Kasir->selectRangePasienPulangPoli($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";

            if ($data->izin_akses == 'admin') {
                $tombol1 =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick=' kembali(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-action-undo '></i></button>";
            } else {
                $tombol1 = "";
            }

            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $time1 = strtotime($page_data[$i]->tgl_keluar);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;

            //Tanggal lahir
            $time2 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl2 = strftime("%A, %d %B %Y", $time2); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur
            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            //$alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            if ($data->id_staff == 'drfebry') {
                $out[$i] = array($no, $tombol, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter);
            } else {
                $out[$i] = array($no, $tombol, $tombol1, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter);
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
}
=======

<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kasir_pendapatan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'IND');
        $this->load->model('M_Kasir');
        $this->load->model('M_Pasien');
    }

    public function pasien_pulang2()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_pulang_kasir2';
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_pulang()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Kasir->selectRangePasienPulang($mulai, $akhir);
        } else {
            $page_data = $this->M_Kasir->selectPasienPulang();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";
            

            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $time1 = strtotime($page_data[$i]->tgl_keluar);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            //$tgl_keluar = $page_data[$i]->tgl_keluar;
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;

            //Tanggal lahir
            $time2 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl2 = strftime("%A, %d %B %Y", $time2); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur
            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            //$alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $out[$i] = array($no, $tombol, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter);
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


    public function pasien_pulang_ugd2()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_pulang_ugd2';
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_pulang_ugd()
    {
        $data = $this->session->userdata('data_auth');
        $page_data = $this->M_Kasir->selectPasienPulangUGD();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";

            if ($data->izin_akses == 'admin') {
                $tombol1 =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick=' kembali(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-action-undo '></i></button>";
            } else {
                $tombol1 = "";
            }

            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $time1 = strtotime($page_data[$i]->tgl_keluar);
            $tgl1 = strftime("%A, %d %B %Y", $time);
            //$tgl_keluar = $page_data[$i]->tgl_keluar;
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;

            //Tanggal lahir
            $time2 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl2 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur
            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            //$alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            //$poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            if ($data->id_staff == 'drfebry') {
                $out[$i] = array($no, $tombol, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $caraBayar, $diagnosa, $dokter);
            } else {
                $out[$i] = array($no, $tombol, $tombol1, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $caraBayar, $diagnosa, $dokter);
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
    public function Tampil_Range_pasienPulang_ugd()
    {
        $data = $this->session->userdata('data_auth');
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Kasir->selectRangePasienPulangUGD($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";

            if ($data->izin_akses == 'admin') {
                $tombol1 =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick=' kembali(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-action-undo '></i></button>";
            } else {
                $tombol1 = "";
            }

            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $time1 = strtotime($page_data[$i]->tgl_keluar);
            $tgl1 = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;

            //Tanggal lahir
            $time2 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl2 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur
            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            //$alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            // $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            if ($data->id_staff == 'drfebry') {
                $out[$i] = array($no, $tombol, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $caraBayar, $diagnosa, $dokter);
            } else {
                $out[$i] = array($no, $tombol, $tombol1, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $caraBayar, $diagnosa, $dokter);
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

    public function pasien_pulang_poli2()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_pulang_poli2';
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_pulang_poli()
    {
        $data = $this->session->userdata('data_auth');
        $page_data = $this->M_Kasir->selectPasienPulangPoli();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";

            if ($data->izin_akses == 'admin') {
                $tombol1 =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick=' kembali(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-action-undo '></i></button>";
            } else {
                $tombol1 = "";
            }

            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $time1 = strtotime($page_data[$i]->tgl_keluar);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            //$tgl_keluar = $page_data[$i]->tgl_keluar;
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;

            //Tanggal lahir
            $time2 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl2 = strftime("%A, %d %B %Y", $time2); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur
            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            //$alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            if ($data->id_staff == 'drfebry') {
                $out[$i] = array($no, $tombol, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter);
            } else {
                $out[$i] = array($no, $tombol, $tombol1, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter);
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
    public function Tampil_Range_pasienPulang_poli()
    {
        $data = $this->session->userdata('data_auth');
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Kasir->selectRangePasienPulangPoli($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";

            if ($data->izin_akses == 'admin') {
                $tombol1 =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick=' kembali(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='icon-action-undo '></i></button>";
            } else {
                $tombol1 = "";
            }

            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $time1 = strtotime($page_data[$i]->tgl_keluar);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;

            //Tanggal lahir
            $time2 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl2 = strftime("%A, %d %B %Y", $time2); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur
            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            //$alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            if ($data->id_staff == 'drfebry') {
                $out[$i] = array($no, $tombol, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter);
            } else {
                $out[$i] = array($no, $tombol, $tombol1, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter);
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
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
