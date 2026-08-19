
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kasir extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'IND');
        $this->load->model('M_Kasir');
        $this->load->model('M_Kasir_ranap');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Pasien');
    }

    public function pasien_rajal()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir1';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_rajal()
    {
        $data_staff = $this->session->userdata("data_auth");
        $page_data = $this->M_Kasir->selectPasienRajal();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $ranap = $this->M_Kasir->selectPasienRanapById($page_data[$i]->id_pelayanan);
            //$total = $this->M_Kasir->getTotal($page_data[$i]->id_pelayanan);

            if (count($ranap) > 0) {
                $status_ranap = '<span class="label label-warning">Masuk Rawat Inap</span>';
            } else {
                // if (strtotime($page_data[$i]->tgl_masuk) < strtotime('2022-10-12')) {
                //     $id_pelayanan = $page_data[$i]->id_pelayanan;

                //     $total_pelayanan = $this->M_Kasir->total_pelayanan_pasien1($id_pelayanan,$page_data[$i]->id_history);

                //     $apotik = $this->M_Kasir->total_apotik($id_pelayanan);
                //     $obatok = $this->M_Kasir->total_operasi($id_pelayanan);
                //     $igd = $this->M_Kasir->total_igd($id_pelayanan);
                //     $labor = $this->M_Kasir->total_labor($id_pelayanan);
                //     $radio = $this->M_Kasir->total_radio($id_pelayanan);
                //     $anak = $this->M_Kasir->total_anak($id_pelayanan);
                //     $apelkes = $this->M_Kasir->total_apelkes($id_pelayanan);
                //     $internis = $this->M_Kasir->total_internis($id_pelayanan);
                //     $bedah = $this->M_Kasir->total_bedah($id_pelayanan);
                //     $fisio = $this->M_Kasir->total_fisio($id_pelayanan);
                //     $gigi = $this->M_Kasir->total_gigi($id_pelayanan);
                //     $jantung = $this->M_Kasir->total_jantung($id_pelayanan);
                //     $kulit = $this->M_Kasir->total_kulit($id_pelayanan);
                //     $mata = $this->M_Kasir->total_mata($id_pelayanan);
                //     $obgyne = $this->M_Kasir->total_obgyne($id_pelayanan);
                //     $ok = $this->M_Kasir->total_ok($id_pelayanan);
                //     $tht = $this->M_Kasir->total_tht($id_pelayanan);
                //     $umum = $this->M_Kasir->total_umum($id_pelayanan);
                //     $akp = $this->M_Kasir->total_akupuntur($id_pelayanan);
                //     $bdm = $this->M_Kasir->total_bedah_mulut($id_pelayanan);
                //     $jiwa = $this->M_Kasir->total_kesjiwa($id_pelayanan);
                //     $ort = $this->M_Kasir->total_orthopedi($id_pelayanan);
                //     $paru = $this->M_Kasir->total_paru($id_pelayanan);
                //     $hd = $this->M_Kasir->total_hemodialisa($id_pelayanan);
                //     $saraf = $this->M_Kasir->total_saraf($id_pelayanan);
                //     $uro = $this->M_Kasir->total_urologi($id_pelayanan);
                //     $ginjal = $this->M_Kasir->total_ginjal($id_pelayanan);
                //     $pnm = $this->M_Kasir->total_penyakit_mulut($id_pelayanan);
                //     $rehab = $this->M_Kasir->total_rehab($id_pelayanan);
                //     $apotikppn = $apotik['total']*1.11;
                //     $total_harga = $total_pelayanan['total'] + $apotikppn + $obatok['total'] + $igd['total'] + $labor['total'] + $radio['total']
                //         + $anak['total'] + $apelkes['total'] + $internis['total'] + $bedah['total'] + $fisio['total'] + $gigi['total']
                //         + $jantung['total'] + $kulit['total'] + $mata['total'] + $obgyne['total'] + $ok['total'] + $tht['total'] + $umum['total'] +
                //         $akp['total'] + $bdm['total'] + $jiwa['total'] + $ort['total'] + $paru['total'] + $hd['total'] + $saraf['total'] + $uro['total'] +
                //         $ginjal['total'] + $pnm['total'] + $rehab['total'];

                //     $db_detail = $this->M_Kasir->getDetailKasir($id_pelayanan);
                //     if (!empty($page_data)) {
                //         $data = array(
                //             'diskon' => $db_detail->diskon,
                //             'dp' => $db_detail->dp,
                //             'total_harga' => $total_harga-$db_detail->diskon-$db_detail->dp,
                //             'total_bayar' => $total_harga,
                //             'tanggal' => date("Y-m-d H:i:s"),
                //             'tanggal_keluar' => $page_data[$i]->tgl_masuk,
                //             'id_staff' => $data_staff->id_staff,
                //             'status' => 1,
                //         );
                //         $where = array('id_pelayanan' => $id_pelayanan);
                //         $this->M_Kasir->update_tindakan($data, $where, 'deatail_kasir');
                //         $out['status'] = "success";
                //     } else {
                //         $data = array(
                //             'id_pelayanan' => $id_pelayanan,
                //             'diskon' => 0,
                //             'dp' => 0,
                //             'total_harga' => $total_harga,
                //             'total_bayar' => $total_harga,
                //             'tanggal' => date("Y-m-d H:i:s"),
                //             'tanggal_keluar' => $page_data[$i]->tgl_masuk,
                //             'id_staff' => $data_staff->id_staff,
                //             'status' => 1,
                //         );
                //         $this->M_Kasir->insert_tindakan($data, 'deatail_kasir');
                //     }

                //     $datapel = array(
                //         'tgl_keluar' =>  $page_data[$i]->tgl_masuk,
                //         'status_rawat' => 'selesai'
                //     );
                //     $wherepel = array('id_pelayanan' => $id_pelayanan);

                //     $this->M_Kasir->update_tindakan($datapel, $wherepel, 'pelayanan');
                // }
                $status_ranap = '-';
            }
            $no = $i + 1;
            $cetak = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url() . "Kasir/print_dp/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history . "/" . $page_data[$i]->id_cara_bayar . "' ><i class='icon-printer'></i></a>";
            $checkout = "<button class='btn btn-danger btn-icon-anim btn-square' onclick='check_out(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-logout'></i></button>";

            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->id_cara_bayar . "\",\"" . $page_data[$i]->cara_bayar . "\")' '><i class='fa fa-rocket '></i></button>";
            $tombol1 =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilEditKonsul(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;

            //Tanggal lahir
            $time1 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl1 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur
            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";
            //$total = $page_data[$i]->total_harga;
            //$alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $out[$i] = array($no, $cetak, $tombol, $tombol1, $checkout, $tgl, $waktu, $no_rm, $pasien, $jk, $tgl1, $umur, $jenis_pelayanan, $poli, $status_ranap, $caraBayar, $diagnosa, $dokter);
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

    public function pasien_rajal_ugd()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['page_content'] = 'page_content/Pasien_rajal_kasir_ugd';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_rajal_ugd()
    {
        $data_staff = $this->session->userdata("data_auth");
        $page_data = $this->M_Kasir->selectPasienRajalUgd();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $ranap = $this->M_Kasir->selectPasienRanapById($page_data[$i]->id_pelayanan);
            //$total = $this->M_Kasir->getTotal($page_data[$i]->id_pelayanan);

            // if ($page_data[$i]->cara_bayar == "BAYAR SENDIRI/UMUM") {
            //     $acc_man = "<button class='btn btn-danger btn-icon-anim btn-square' onclick='check_out(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-logout'></i></button>";
            // } else {
            //     $acc_man = "-";
            // }
            if (count($ranap) > 0) {
                $status_ranap = '<span class="label label-warning">Masuk Rawat Inap</span>';
            } else {
                // if (strtotime($page_data[$i]->tgl_masuk) < strtotime('2022-10-12')) {
                //     $id_pelayanan = $page_data[$i]->id_pelayanan;
                //     $igd = $this->M_Kasir->total_igd($id_pelayanan);
                //     $apotik = $this->M_Kasir->total_apotik($id_pelayanan);
                //     $labor = $this->M_Kasir->total_labor($id_pelayanan);
                //     $radio = $this->M_Kasir->total_radio($id_pelayanan);
                //     $total_harga = $apotik['total'] + $igd['total'] + $labor['total'] + $radio['total'];
                //     $db_detail = $this->M_Kasir->getDetailKasir($id_pelayanan);
                //     if (!empty($page_data)) {
                //         $data = array(
                //             'diskon' => $db_detail->diskon,
                //             'dp' => $db_detail->dp,
                //             'total_harga' => $total_harga,
                //             'total_bayar' => $total_harga,
                //             'tanggal' => date("Y-m-d H:i:s"),
                //             'tanggal_keluar' => $page_data[$i]->tgl_masuk,
                //             'id_staff' => $data_staff->id_staff,
                //             'status' => 1,
                //         );
                //         $where = array('id_pelayanan' => $id_pelayanan);
                //         $this->M_Kasir->update_tindakan($data, $where, 'deatail_kasir');
                //         $out['status'] = "success";
                //     } else {
                //         $data = array(
                //             'id_pelayanan' => $id_pelayanan,
                //             'diskon' => 0,
                //             'dp' => 0,
                //             'total_harga' => $total_harga,
                //             'total_bayar' => $total_harga,
                //             'tanggal' => date("Y-m-d H:i:s"),
                //             'tanggal_keluar' => $page_data[$i]->tgl_masuk,
                //             'id_staff' => $data_staff->id_staff,
                //             'status' => 1,
                //         );
                //         $this->M_Kasir->insert_tindakan($data, 'deatail_kasir');
                //     }

                //     $datapel = array(
                //         'tgl_keluar' =>  $page_data[$i]->tgl_masuk,
                //         'status_rawat' => 'selesai'
                //     );
                //     $wherepel = array('id_pelayanan' => $id_pelayanan);

                //     $this->M_Kasir->update_tindakan($datapel, $wherepel, 'pelayanan');
                // }
                $status_ranap = '-';
            }


            $no = $i + 1;
            $checkout = "<button class='btn btn-danger btn-icon-anim btn-square' onclick='check_out(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-logout'></i></button>";

            $cetak = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url() . "Kasir/print_dp/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history  . "' ><i class='icon-printer'></i></a>";
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->id_cara_bayar . "\",\"" . $page_data[$i]->cara_bayar . "\")' '><i class='fa fa-rocket '></i></button>";
            // $tombol1 =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilEditKonsul(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;

            //Tanggal lahir
            $time1 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl1 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur
            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";
            //$total = $page_data[$i]->total_harga;
            //$alamat = $page_data[$i]->alamat;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;
            $tombol1 = "<a class='btn btn-info btn-icon-anim btn-square' href='" . base_url() . "Kasir/print_ptt/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history  . "' ><i class='icon-printer'></i></a>";

            $out[$i] = array($no, $cetak, $tombol, $tombol1, $checkout, $tgl, $waktu, $no_rm, $pasien, $jk, $tgl1, $umur, $jenis_pelayanan, $poli, $status_ranap, $caraBayar, $diagnosa, $dokter);
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

    //Pasien ranap
    public function pasien_ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_ranap_kasir';
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        //$page_data['signa'] = $this->M_Kasir->getSigna();
        //$page_data['cara_pemakaian_obat'] = $this->M_Kasir->getCaraPakai();
        //$page_data['obat'] = $this->M_Kasir->getNamaObat();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_ranap()
    {
        $data_staff = $this->session->userdata("data_auth");
        $page_data = $this->M_Kasir->selectPasienRanap();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $id_pelayanan = $page_data[$i]->id_pelayanan;
            $id_history = $page_data[$i]->id_history;

            // $ranap = $this->db->query("SELECT * from history_pelayanan_ranap where id_history ='$id_history' and tgl_keluar is not null")->result();
            // if (count($ranap) > 0) {

            //     // if (strtotime($page_data[$i]->tgl_masuk) < strtotime('2022-10-07')) {
            //     $db_sewa = $this->M_Kasir->cekSewaKamar($id_pelayanan);
            //     $total_sewa = $this->M_Kasir->TotalSewaKamar($id_pelayanan)->total;
            //     if (count($db_sewa) > 0) {
            //         $service = $this->db->get_where('tindakan_apelkes', ['id_pelayanan' => $id_pelayanan, 'id_list_tindakan' => 1413])->result();
            //         if (count($service) == 0) {
            //             $data_service = [
            //                 'id_tindakan_apelkes' => uniqid(),
            //                 'harga' => $total_sewa * 0.1,
            //                 'frek' => 1,
            //                 'id_pelayanan' => $id_pelayanan,
            //                 'tipe' => $page_data[$i]->id_kamar,
            //                 'id_list_tindakan' => 1413,
            //                 'total' => $total_sewa * 0.1,
            //                 'id_dokter' => $page_data[$i]->dpjp,
            //                 'tanggal' => date('Y-m-d H:i:s'),
            //                 'id_staff' => $data_staff->id_staff
            //             ];
            //             $this->M_Kasir->insert_tindakan($data_service, 'tindakan_apelkes');
            //         } else {
            //             $data_service = [
            //                 'harga' => $total_sewa * 0.1,
            //                 'frek' => 1,
            //                 'id_pelayanan' => $id_pelayanan,
            //                 'tipe' => $page_data[$i]->id_kamar,
            //                 'id_list_tindakan' => 1413,
            //                 'total' => $total_sewa * 0.1,
            //                 'id_dokter' => $page_data[$i]->dpjp,
            //                 'tanggal' => date('Y-m-d H:i:s'),
            //                 'id_staff' => $data_staff->id_staff
            //             ];
            //             $this->M_Kasir->update_tindakan($data_service, ['id_tindakan_apelkes' => $service[0]->id_tindakan_apelkes], 'tindakan_apelkes');
            //         }
            //     }
            //     $total_pelayanan = $this->M_Kasir->total_pelayanan_pasien($id_pelayanan, $page_data[$i]->id_history);

            //     $apotik = $this->M_Kasir->total_apotik($id_pelayanan);
            //     $obatok = $this->M_Kasir->total_operasi($id_pelayanan);
            //     $igd = $this->M_Kasir->total_igd($id_pelayanan);
            //     $labor = $this->M_Kasir->total_labor($id_pelayanan);
            //     $radio = $this->M_Kasir->total_radio($id_pelayanan);
            //     $anak = $this->M_Kasir->total_anak($id_pelayanan);
            //     $apelkes = $this->M_Kasir->total_apelkes($id_pelayanan);
            //     $internis = $this->M_Kasir->total_internis($id_pelayanan);
            //     $bedah = $this->M_Kasir->total_bedah($id_pelayanan);
            //     $fisio = $this->M_Kasir->total_fisio($id_pelayanan);
            //     $gigi = $this->M_Kasir->total_gigi($id_pelayanan);
            //     $jantung = $this->M_Kasir->total_jantung($id_pelayanan);
            //     $kulit = $this->M_Kasir->total_kulit($id_pelayanan);
            //     $mata = $this->M_Kasir->total_mata($id_pelayanan);
            //     $obgyne = $this->M_Kasir->total_obgyne($id_pelayanan);
            //     $ok = $this->M_Kasir->total_ok($id_pelayanan);
            //     $tht = $this->M_Kasir->total_tht($id_pelayanan);
            //     $umum = $this->M_Kasir->total_umum($id_pelayanan);
            //     $akp = $this->M_Kasir->total_akupuntur($id_pelayanan);
            //     $bdm = $this->M_Kasir->total_bedah_mulut($id_pelayanan);
            //     $jiwa = $this->M_Kasir->total_kesjiwa($id_pelayanan);
            //     $ort = $this->M_Kasir->total_orthopedi($id_pelayanan);
            //     $paru = $this->M_Kasir->total_paru($id_pelayanan);
            //     $hd = $this->M_Kasir->total_hemodialisa($id_pelayanan);
            //     $saraf = $this->M_Kasir->total_saraf($id_pelayanan);
            //     $uro = $this->M_Kasir->total_urologi($id_pelayanan);
            //     $ginjal = $this->M_Kasir->total_ginjal($id_pelayanan);
            //     $pnm = $this->M_Kasir->total_penyakit_mulut($id_pelayanan);
            //     $rehab = $this->M_Kasir->total_rehab($id_pelayanan);
            //     // $apotikppn = $apotik['total'] * 1.11;
            //     $total_harga = $total_pelayanan['total'] + $apotik['total'] + $obatok['total'] + $igd['total'] + $labor['total'] + $radio['total']
            //         + $anak['total'] + $apelkes['total'] + $internis['total'] + $bedah['total'] + $fisio['total'] + $gigi['total']
            //         + $jantung['total'] + $kulit['total'] + $mata['total'] + $obgyne['total'] + $ok['total'] + $tht['total'] + $umum['total'] +
            //         $akp['total'] + $bdm['total'] + $jiwa['total'] + $ort['total'] + $paru['total'] + $hd['total'] + $saraf['total'] + $uro['total'] +
            //         $ginjal['total'] + $pnm['total'] + $rehab['total'];

            //     if ($total_harga > 5000000) {
            //         $materai = $this->db->get_where('tindakan_apelkes', ['id_pelayanan' => $id_pelayanan, 'id_list_tindakan' => 1412])->result();
            //         if (count($materai) == 0) {
            //             $data_materai = [
            //                 'id_tindakan_apelkes' => uniqid(),
            //                 'harga' => 10000,
            //                 'frek' => 1,
            //                 'id_pelayanan' => $id_pelayanan,
            //                 'tipe' => $page_data[$i]->id_kamar,
            //                 'id_list_tindakan' => 1412,
            //                 'total' => 10000,
            //                 'id_dokter' => $page_data[$i]->dpjp,
            //                 'tanggal' => date('Y-m-d H:i:s'),
            //                 'id_staff' => $data_staff->id_staff
            //             ];
            //             $this->M_Kasir->insert_tindakan($data_materai, 'tindakan_apelkes');
            //             $total_materai = 10000;
            //         } else {
            //             $total_materai = 0;
            //         }
            //     } else {
            //         $total_materai = 0;
            //     }
            //     $total_harga = $total_harga + $total_materai;

            //     //endhitung sewakamar

            //     $db_detail = $this->M_Kasir->getDetailKasir($id_pelayanan);
            //     if (!empty($page_data)) {
            //         $data = array(
            //             'diskon' => $db_detail->diskon,
            //             'dp' => $db_detail->dp,
            //             'total_harga' => $total_harga - $db_detail->diskon - $db_detail->dp,
            //             'total_bayar' => $total_harga,
            //             'tanggal' => date("Y-m-d H:i:s"),
            //             'tanggal_keluar' => $ranap[0]->tgl_keluar,
            //             'id_staff' => $data_staff->id_staff,
            //             'status' => 1,
            //         );
            //         $where = array('id_pelayanan' => $id_pelayanan);
            //         $this->M_Kasir->update_tindakan($data, $where, 'deatail_kasir');
            //     } else {
            //         $data = array(
            //             'id_pelayanan' => $id_pelayanan,
            //             'diskon' => 0,
            //             'dp' => 0,
            //             'total_harga' => $total_harga,
            //             'total_bayar' => $total_harga,
            //             'tanggal' => date("Y-m-d H:i:s"),
            //             'tanggal_keluar' => $ranap[0]->tgl_keluar,
            //             'id_staff' => $data_staff->id_staff,
            //             'status' => 1,
            //         );
            //         $this->M_Kasir->insert_tindakan($data, 'deatail_kasir');
            //     }

            //     $datapel = array(
            //         'tgl_keluar' => $ranap[0]->tgl_keluar,
            //         'status_rawat' => 'selesai'
            //     );
            //     $wherepel = array('id_pelayanan' => $id_pelayanan);

            //     $this->M_Kasir->update_tindakan($datapel, $wherepel, 'pelayanan');

            // }

            $no = $i + 1;

            $checkout = "<button class='btn btn-danger btn-icon-anim btn-square' onclick='check_out(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->nama . "\")'><i class='icon-logout'></i></button>";
            $cetak = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url() . "Kasir/print_dp/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history  . "' ><i class='icon-printer'></i></a>";
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->id_cara_bayar . "\",\"" . $page_data[$i]->cara_bayar . "\")' '><i class='fa fa-rocket '></i></button>";
            // $tombol1 =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilEditKonsul(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-rocket '></i></button>";
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jenis_kelamin;
            $al = $page_data[$i]->alamat;
            $ktp = $page_data[$i]->no_ktp;

            //Tanggal lahir
            $time1 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl1 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur
            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            // $tb_labor = $this->db->get_where('form_labor',['id_pelayanan'=>$id_pelayanan,'status_pembayaran'=>'tidak'])->result();
            // $tb_radio = $this->db->get_where('tindakan_radiologi',['id_pelayanan'=>$id_pelayanan,'status_pembayaran'=>'tidak'])->result();

            // if(count($tb_labor)>0 || count($tb_radio)>0){
            $tombol1 = "<a class='btn btn-info btn-icon-anim btn-square' href='" . base_url() . "Kasir/print_ptt/" . $page_data[$i]->id_pelayanan . "/" . $page_data[$i]->id_history  . "' ><i class='icon-printer'></i></a>";
            // }else{
            //     $tombol1="";
            // }


            $out[$i] = array($no, $cetak, $tombol, $tombol1, $checkout, $tgl, $waktu, $no_rm, $pasien, $jk, $tgl1, $umur, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter, $al, $ktp);
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

    public function pasien_pulang()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_pulang_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_pulang()
    {
        $data = $this->session->userdata('data_auth');
        $page_data = $this->M_Kasir->selectPasienPulang();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\")' '><i class='fa fa-rocket '></i></button>";
            if ($data->izin_akses == 'admin') {
                $tombol1 =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick=' kembali(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $page_data[$i]->id_history . "\",\"" . $page_data[$i]->id_kamar . "\")' '><i class='icon-action-undo '></i></button>";
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
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $out[$i] = array($no, $tombol, $tombol1, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter);
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
    public function Tampil_Range_pasienPulang()
    {
        $data = $this->session->userdata('data_auth');
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Kasir->selectRangePasienPulang($mulai, $akhir);

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
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $out[$i] = array($no, $tombol, $tombol1, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter);
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

    public function pasien_pulang_ugd()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_pulang_ugd';
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

            $out[$i] = array($no, $tombol, $tombol1, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $caraBayar, $diagnosa, $dokter);
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

            $out[$i] = array($no, $tombol, $tombol1, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $caraBayar, $diagnosa, $dokter);
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

    public function pasien_pulang_poli()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_pulang_poli';
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
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $out[$i] = array($no, $tombol, $tombol1, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter);
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
            $poli = $page_data[$i]->poli;
            $caraBayar = $page_data[$i]->cara_bayar;
            $diagnosa = $page_data[$i]->diagnosa;
            $dokter = $page_data[$i]->nama_dokter;

            $out[$i] = array($no, $tombol, $tombol1, $tgl, $waktu, $tgl1, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $poli, $caraBayar, $diagnosa, $dokter);
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
    //PASIEN MCU
    public function pasien_mcu()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['page_content'] = 'page_content/Pasien_mcu';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_mcu()
    {
        $page_data = $this->M_Kasir->selectPasienMcu();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $cetak =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_mcu . "\")' '><i class='fa fa-rocket '></i></button>";
            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $pasien = $page_data[$i]->nama_pasien;
            $tipe = $page_data[$i]->tipe;
            $perusahaan = $page_data[$i]->perusahaan;
            $jk = $page_data[$i]->sex;
            $occu = $page_data[$i]->occupation;
            $badge = $page_data[$i]->badge_no;
            $blood = $page_data[$i]->blood_group;

            //Tanggal lahir
            $time1 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl1 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur

            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $out[$i] = array($no, $cetak, $tgl, $waktu, $pasien, $jk, $tgl1, $umur, $tipe, $perusahaan, $occu, $badge, $blood);
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
    public function updateDetailKasirMcu()
    {
        $id_mcu = $this->input->post('id_mcu');
        $data_staff = $this->session->userdata('data_auth');
        $data = array(
            'diskon' => $this->input->post('diskon'),
            'dp' => $this->input->post('dp'),
            'tgl' => date("Y-m-d H:i:s"),
            'tgl_keluar' => $this->input->post('tgl_keluar'),
            'id_staff' => $data_staff->id_staff,
            'total_harga' => $this->input->post('total_harga'),
            'total_bayar' => $this->input->post('total_bayar'),
        );
        $where = array(
            'id_mcu' => $id_mcu,
        );
        $this->M_Kasir->update_tindakan($data, $where, 'detail_kasir_mcu');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function pasien_pulang_mcu()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_pulang_mcu';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_pulang_mcu()
    {
        $page_data = $this->M_Kasir->selectPasienPulangMcu();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tindakan =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_mcu . "\")' '><i class='fa fa-rocket '></i></button>";
            // $kembali =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='kembali(\"" .$page_data[$i]->id_mcu. "\")' '><i class='fa fa-undo '></i></button>";
            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $pasien = $page_data[$i]->nama_pasien;
            $tipe = $page_data[$i]->tipe;
            $perusahaan = $page_data[$i]->perusahaan;
            $jk = $page_data[$i]->sex;
            $occu = $page_data[$i]->occupation;
            $badge = $page_data[$i]->badge_no;
            $blood = $page_data[$i]->blood_group;

            //Tanggal lahir
            $time1 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl1 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur

            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $out[$i] = array($no, $tindakan, $tgl, $waktu, $pasien, $jk, $tgl1, $umur, $tipe, $perusahaan, $occu, $badge, $blood);
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
    public function tampil_range_pasien_pulang_mcu()
    {
        $data = $this->session->userdata('data_auth');
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $page_data = $this->M_Kasir->selectRangePasienPulangMcu($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tindakan =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='' '><i class='fa fa-rocket '></i></button>";

            if ($data->izin_akses == 'admin') {
                $kembali =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='' '><i class='fa fa-rocket '></i></button>";
            } else {
                $kembali = "";
            }

            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $pasien = $page_data[$i]->nama_pasien;
            $tipe = $page_data[$i]->tipe;
            $perusahaan = $page_data[$i]->perusahaan;
            $jk = $page_data[$i]->sex;
            $occu = $page_data[$i]->occupation;
            $badge = $page_data[$i]->badge_no;
            $blood = $page_data[$i]->blood_group;

            //Tanggal lahir
            $time1 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl1 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur

            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $out[$i] = array($no, $tindakan, $kembali, $tgl, $waktu, $pasien, $jk, $tgl1, $umur, $tipe, $perusahaan, $occu, $badge, $blood);
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
    function getDpDiscMcu()
    {
        $id_mcu = $this->input->post('id_mcu');
        $db = $this->M_Kasir->getDpDisc($id_mcu);
        if (count($db) > 0) {
            $db = $db[0];

            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        // print_arr($db) ;
        echo json_encode($db);
        exit;
    }
    public function update_pasien_balik_mcu()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_mcu = $this->input->post('id_mcu');
        $pelayanan = array(
            'status_rawat' => '2',
            'tgl_keluar' => null,
        );
        $where = array(
            'id_mcu' => $id_mcu,
        );
        $this->M_Kasir->update_tindakan($pelayanan, $where, 'mcu');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function print_kasir_mcu()
    {
        $action = $this->input->post('action');
        $id_mcu = $this->input->post('inMcu');
        $data['diskon'] = $this->input->post('inDiskon');
        $data['tgl_keluar'] = $this->input->post('inTglKeluar');
        $data['dp'] = $this->input->post('inDp');
        $data['tgl'] = $this->input->post('tgl');
        $data['inMcu'] = $id_mcu;
        $data['pasien'] = $this->M_Kasir->getMcuById($id_mcu);
        $data['data'] = $this->M_Kasir->getTindakanMcuById($id_mcu);
        $data['obat'] = $this->M_Kasir->getObatMcuById($id_mcu);
        $data['data_labor'] = $this->M_Kasir->list_labor_mcu($id_mcu);
        $data['data_radio'] = $this->M_Kasir->list_radio_mcu($id_mcu);
        if ($action == 'cetak') {
            $this->load->view('print/cetak_pembayaran_mcu', $data);
        } else {
            $pelayanan = array(
                'status_bayar' => 1,
                'status_rawat' => 1,
                'tgl_keluar' => $this->input->post('tgl_keluar'),
            );
            $where = array(
                'id_mcu' => $id_mcu,
            );
            $this->M_Kasir->update_tindakan($pelayanan, $where, 'mcu');

            $this->load->view('print/cetak_pembayaran_mcu', $data);
        }
    }

    public function print_kasirmcu($id_mcu)
    {
        $action = $this->input->post('action');
        $idmcu = $this->input->post($id_mcu);
        $data['diskon'] = $this->input->post('inDiskon');
        $data['tgl_keluar'] = $this->input->post('inTglKeluar');
        $data['dp'] = $this->input->post('inDp');
        $data['tgl'] = $this->input->post('tgl');
        $data['inMcu'] = $idmcu;
        $data['pasien'] = $this->M_Kasir->getMcuById($id_mcu);
        $data['data'] = $this->M_Kasir->getTindakanMcuById($id_mcu);
        $data['obat'] = $this->M_Kasir->getObatMcuById($id_mcu);
        $data['data_labor'] = $this->M_Kasir->list_labor_mcu($id_mcu);
        $data['data_radio'] = $this->M_Kasir->list_radio_mcu($id_mcu);
        // if ($action == 'cetak') {
        $this->load->view('print/cetak_pembayaran_mcu', $data);
        // } else {
        //     $pelayanan = array(
        //         'status_bayar' => 1,
        //         'status_rawat' => 1,
        //         'tgl_keluar' => $this->input->post('tgl_keluar'),
        //     );
        //     $where = array(
        //         'id_mcu' => $id_mcu,
        //     );
        //     $this->M_Kasir->update_tindakan($pelayanan, $where, 'mcu');

        //     $this->load->view('print/cetak_pembayaran_mcu', $data);
        // }
    }


    public function print_pasien_pulang_mcu()
    {
        $action = $this->input->post('action');
        $id_mcu = $this->input->post('inMcu');
        $data['diskon'] = $this->input->post('inDiskon');
        $data['tgl_keluar'] = $this->input->post('inTglKeluar');
        $data['dp'] = $this->input->post('inDp');
        $data['tgl'] = $this->input->post('tgl');
        $data['inMcu'] = $id_mcu;
        $data['pasien'] = $this->M_Kasir->getMcuById($id_mcu);
        $data['data'] = $this->M_Kasir->getTindakanMcuById($id_mcu);
        $data['obat'] = $this->M_Kasir->getObatMcuById($id_mcu);
        if ($action == 'cetak') {
            $this->load->view('print/cetak_pembayaran_mcu', $data);
        } else {
            $pelayanan = array(
                'status_bayar' => 1,
                'status_rawat' => 1,
                'tgl_keluar' => $this->input->post('tgl_keluar'),
            );
            $where = array(
                'id_mcu' => $id_mcu,
            );
            $this->M_Kasir->update_tindakan($pelayanan, $where, 'mcu');

            $this->load->view('print/cetak_pembayaran_mcu', $data);
        }
    }

    public function insert_pembayaran_mcu()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data_staff = $this->session->userdata('data_auth');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Kasir->getDetailKasir($id_pelayanan);
        if (!empty($page_data)) {
            $data = array(
                'diskon' => $this->input->post('diskon'),
                'total_harga' => $this->input->post('total_harga'),
                'total_bayar' => $this->input->post('total_bayar'),
                'tgl' => date("Y-m-d H:i:s"),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'id_staff' => $data_staff->id_staff,
                'status' => 1,
            );
            $where = array(
                'id_pasien' => $id_pelayanan,
            );
            $this->M_Kasir->update_tindakan($data, $where, 'detail_kasir_mcu');
            $out['status'] = "success";
        } else {
            $data = array(
                'id_detail' => uniqid(),
                'id_pasien' => $id_pelayanan,
                'diskon' => $this->input->post('diskon'),
                'total_harga' => $this->input->post('total_harga'),
                'total_bayar' => $this->input->post('total_bayar'),
                'tgl' => date("Y-m-d H:i:s"),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'id_staff' => $data_staff->id_staff,
                'status' => 1,
            );
            $this->M_Kasir->insert_tindakan($data, 'detail_kasir_mcu');
            $out['status'] = "success";
        }

        echo json_encode($out);
    }
    //End
    //PASIEN HOMECARE
    public function pasien_homecare()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['page_content'] = 'page_content/Pasien_homecare';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_hc()
    {
        $page_data = $this->M_Kasir->selectPasienHc();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $cetak =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pasien . "\")' '><i class='fa fa-rocket '></i></button>";
            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $pasien = $page_data[$i]->nama;
            $jk = $page_data[$i]->jk;
            $no_hp = $page_data[$i]->no_hp;
            $alamat = $page_data[$i]->alamat;
            //$tempat_lahir = $page_data[$i]->tempat_lahir;

            //Tanggal lahir
            $time1 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl1 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur

            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $out[$i] = array($no, $cetak, $tgl, $waktu, $pasien, $jk, $tgl1, $no_hp, $alamat);
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
    function getDpDiscHc()
    {
        $id_mcu = $this->input->post('id_mcu');
        $db = $this->M_Kasir->getDpDiscHc($id_mcu);
        if (count($db) > 0) {
            $db = $db[0];

            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        // print_arr($db) ;
        echo json_encode($db);
        exit;
    }
    public function updateDetailKasirHc()
    {
        $id_mcu = $this->input->post('id_mcu');
        $data_staff = $this->session->userdata('data_auth');
        $data = array(
            'diskon' => $this->input->post('diskon'),
            'tgl' => date("Y-m-d H:i:s"),
            'tgl_keluar' => $this->input->post('tgl_keluar'),
            'id_staff' => $data_staff->id_staff,
            'total_harga' => $this->input->post('total_harga'),
            'total_bayar' => $this->input->post('total_bayar'),
        );
        $where = array(
            'id_pasien' => $id_mcu,
        );
        $this->M_Kasir->update_tindakan($data, $where, 'detail_kasir_homecare');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function pasien_pulang_Hc()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pasien_pulang_Hc';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_pulang_Hc()
    {
        $page_data = $this->M_Kasir->selectPasienPulangMcu();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tindakan =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_mcu . "\")' '><i class='fa fa-rocket '></i></button>";
            // $kembali =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='kembali(\"" .$page_data[$i]->id_mcu. "\")' '><i class='fa fa-undo '></i></button>";
            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $pasien = $page_data[$i]->nama_pasien;
            $tipe = $page_data[$i]->tipe;
            $perusahaan = $page_data[$i]->perusahaan;
            $jk = $page_data[$i]->sex;
            $occu = $page_data[$i]->occupation;
            $badge = $page_data[$i]->badge_no;
            $blood = $page_data[$i]->blood_group;

            //Tanggal lahir
            $time1 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl1 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur

            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $out[$i] = array($no, $tindakan, $tgl, $waktu, $pasien, $jk, $tgl1, $umur, $tipe, $perusahaan, $occu, $badge, $blood);
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
    public function tampil_range_pasien_pulang_Hc()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $page_data = $this->M_Kasir->selectRangePasienPulangMcu($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tindakan =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='' '><i class='fa fa-rocket '></i></button>";
            $kembali =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='' '><i class='fa fa-rocket '></i></button>";
            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $pasien = $page_data[$i]->nama_pasien;
            $tipe = $page_data[$i]->tipe;
            $perusahaan = $page_data[$i]->perusahaan;
            $jk = $page_data[$i]->sex;
            $occu = $page_data[$i]->occupation;
            $badge = $page_data[$i]->badge_no;
            $blood = $page_data[$i]->blood_group;

            //Tanggal lahir
            $time1 = strtotime($page_data[$i]->tgl_lahir); //ngambil data dari kolom tgl-lahir diubah menjadi tanggal/waktu
            $tgl1 = strftime("%A, %d %B %Y", $time1); //mengubah format dalam bentuk tulisan
            $birthDate = $page_data[$i]->tgl_lahir; //ngambil data dari tgl_lahir
            $date = new DateTime($birthDate); //mengubah tgl dalam bahasa php -> untuk bisa mempermudah perhitungan(klo tidak NuN)
            $now = new DateTime(); //menyusaikan dengan tgl hari ni
            $interval = $now->diff($date); //rentang umur

            //Untuk umur
            $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";

            $out[$i] = array($no, $tindakan, $kembali, $tgl, $waktu, $pasien, $jk, $tgl1, $umur, $tipe, $perusahaan, $occu, $badge, $blood);
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

    public function update_pasien_balik_Hc()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_mcu = $this->input->post('id_mcu');
        $pelayanan = array(
            'status_rawat' => '2',
            'tgl_keluar' => null,
        );
        $where = array(
            'id_mcu' => $id_mcu,
        );
        $this->M_Kasir->update_tindakan($pelayanan, $where, 'mcu');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function print_kasir_Hc()
    {
        $action = $this->input->post('action');
        $id_mcu = $this->input->post('inMcu');
        $data['diskon'] = $this->input->post('inDiskon');
        $data['tgl_keluar'] = $this->input->post('inTglKeluar');
        $data['tgl'] = $this->input->post('tgl');
        $data['inMcu'] = $id_mcu;
        $data['pasien'] = $this->M_Kasir->getHcById($id_mcu);
        $data['data'] = $this->M_Kasir->getTindakanHcById($id_mcu);
        $data['obat'] = $this->M_Kasir->getObatHcById($id_mcu);
        if ($action == 'cetak') {
            $this->load->view('print/cetak_pembayaran_hc', $data);
        } else {
            $pelayanan = array(
                'status_bayar' => 1,
                'status_rawat' => 1,
                'tgl_keluar' => $this->input->post('tgl_keluar'),
            );
            $where = array(
                'id_pasien' => $id_mcu,
            );
            $this->M_Kasir->update_tindakan($pelayanan, $where, 'homecare');

            $this->load->view('print/cetak_pembayaran_hc', $data);
        }
    }
    public function insert_pembayaran_Hc()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data_staff = $this->session->userdata('data_auth');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Kasir->getDetailKasir($id_pelayanan);
        if (!empty($page_data)) {
            $data = array(
                'diskon' => $this->input->post('diskon'),
                'total_harga' => $this->input->post('total_harga'),
                'total_bayar' => $this->input->post('total_bayar'),
                'tgl' => date("Y-m-d H:i:s"),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'id_staff' => $data_staff->id_staff,
                'status' => 1,
            );
            $where = array(
                'id_pasien' => $id_pelayanan,
            );
            $this->M_Kasir->update_tindakan($data, $where, 'detail_kasir_homecare');
            $out['status'] = "success";
        } else {
            $data = array(
                'id_detail' => uniqid(),
                'id_pasien' => $id_pelayanan,
                'diskon' => $this->input->post('diskon'),
                'total_harga' => $this->input->post('total_harga'),
                'total_bayar' => $this->input->post('total_bayar'),
                'tgl' => date("Y-m-d H:i:s"),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'id_staff' => $data_staff->id_staff,
                'status' => 1,
            );
            $this->M_Kasir->insert_tindakan($data, 'detail_kasir_homecare');
            $out['status'] = "success";
        }

        echo json_encode($out);
    }
    public function print_pasien_pulang_Hc()
    {
        $action = $this->input->post('action');
        $id_mcu = $this->input->post('inMcu');
        $data['diskon'] = $this->input->post('inDiskon');
        $data['tgl_keluar'] = $this->input->post('inTglKeluar');
        $data['dp'] = $this->input->post('inDp');
        $data['tgl'] = $this->input->post('tgl');
        $data['inMcu'] = $id_mcu;
        $data['pasien'] = $this->M_Kasir->getDataPasienById($id_mcu);
        $data['data_mcu'] = $this->M_Kasir->getMcuById($id_mcu);
        $data['data_labor'] = $this->M_Kasir->getLaborById($id_mcu);
        $data['data_radio'] = $this->M_Kasir->getRadioById($id_mcu);
        $data['detail'] = $this->M_Kasir->getDetailKasirById($id_mcu);
        if ($action == 'cetak') {
            $this->load->view('print/cetak_pembayaran_pulang_mcu', $data);
        } else {
            $this->load->view('print/cetak_pembayaran_mcu', $data);
        }
    }
    //End
    //End

    public function pelayanan_tambahan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pelayanan_tambahan_kasir';
        $page_data['pelayanan'] = $this->M_Kasir->getPelayananUmum();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pelayanan_tambahan()
    {
        $page_data = $this->M_Kasir->selectPelayananTambahan();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan_umum . "\")' '><i class='fa fa-rocket '></i></button>";
            //$tombol1 =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" .$page_data[$i]->id_pelayanan. "\",\"" .$page_data[$i]->id_history."\")' '><i class='fa fa-rocket '></i></button>";
            $pasien = $page_data[$i]->nama;
            $time = strtotime($page_data[$i]->tgl);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus(\"" . $page_data[$i]->id_pelayanan_umum .  "\")' '><i class='fa fa-trash '></i></button>";


            $out[$i] = array($no, $tombol, $pasien, $tgl, $hapus);
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
    public function selectRangePelayananTambahan()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Kasir->selectRangePelayananTambahan($mulai, $akhir);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" . $page_data[$i]->id_pelayanan_umum . "\")' '><i class='fa fa-rocket '></i></button>";
            //$tombol1 =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampilTindakanFarmasi(\"" .$page_data[$i]->id_pelayanan. "\",\"" .$page_data[$i]->id_history."\")' '><i class='fa fa-rocket '></i></button>";
            $pasien = $page_data[$i]->nama;
            $time = strtotime($page_data[$i]->tgl);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus(\"" . $page_data[$i]->id_pelayanan_umum .  "\")' '><i class='fa fa-trash '></i></button>";


            $out[$i] = array($no, $tombol, $pasien, $tgl, $hapus);
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
    public function tampil_list_pelayanan()
    {
        $id = $this->input->post('id_pelayanan');
        $page_data = $this->M_Kasir->selectListPelayanan($id);


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;

            $nama = $page_data[$i]->nama;
            $harga = "Rp " . number_format($page_data[$i]->harga, 0, ',', '.');
            $frek = $page_data[$i]->frek;
            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list(\"" . $page_data[$i]->id_tindakan .  "\")' '><i class='fa fa-trash '></i></button>";


            $out[$i] = array($nama, $harga, $frek, $total, $hapus);
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
    //Cetak Pasien
    public function insert_pembayaran()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data_staff = $this->session->userdata('data_auth');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Kasir->getDetailKasir($id_pelayanan);
        if (!empty($page_data)) {
            $data = array(
                'diskon' => $this->input->post('diskon'),
                'dp' => $this->input->post('dp'),
                'selisih' => $this->input->post('selisih'),
                'note' => $this->input->post('note'),
                'total_harga' => $this->input->post('total_harga'),
                'total_bayar' => $this->input->post('total_bayar'),
                'tanggal' => date("Y-m-d H:i:s"),
                'tanggal_keluar' => $this->input->post('tgl_keluar'),
                'id_staff' => $data_staff->id_staff,
                'status' => 1,
            );
            $where = array(
                'id_pelayanan' => $id_pelayanan,
            );
            $this->M_Kasir->update_tindakan($data, $where, 'deatail_kasir');
            $out['status'] = "success";
        } else {
            $data = array(
                'id_pelayanan' => $id_pelayanan,
                'diskon' => $this->input->post('diskon'),
                'dp' => $this->input->post('dp'),
                'selisih' => $this->input->post('selisih'),
                'note' => $this->input->post('note'),
                'total_harga' => $this->input->post('total_harga'),
                'total_bayar' => $this->input->post('total_bayar'),
                'tanggal' => date("Y-m-d H:i:s"),
                'tanggal_keluar' => $this->input->post('tgl_keluar'),
                'id_staff' => $data_staff->id_staff,
                'status' => 1,
            );
            $this->M_Kasir->insert_tindakan($data, 'deatail_kasir');
            $out['status'] = "success";
        }

        $id_pendapatan = uniqid();
        $totalbayarkasir = ($this->input->post('opsi') != 'asuransi') ? $this->input->post('totalbayarkasir') : $this->input->post('total_bayar');
        $totalkeseluruhan = ($this->input->post('opsi') != 'asuransi') ? $this->input->post('totalkeseluruhan') : $this->input->post('total_bayar');
        $pendapatan = array(
            'id_pendapatan' => $id_pendapatan,
            'id_pelayanan' => $id_pelayanan,
            'total_pendapatan' => $totalkeseluruhan,
            'total_bayar' => $totalbayarkasir,
            'tgl_input' => date("Y-m-d H:i:s"),
            'keterangan' => $this->input->post('opsi'),
            'tgl_pulang' => $this->input->post('tgl_keluar'),
            'id_staff' => $data_staff->nama,
            'status' => ""
        );



        if ($totalbayarkasir != 0 && $this->input->post('opsi') != 'asuransi') {
            $this->M_Kasir->insert_tindakan($pendapatan, 'pendapatan_kasir');
        } else if ($this->input->post('opsi') == 'asuransi') {
            $db_asuransi = $this->db->get_where('pendapatan_kasir', ['id_pelayanan' => $id_pelayanan, 'keterangan' => 'asuransi'])->result();
            if (count($db_asuransi) > 0) {
                $pendapatan1 = array(
                    'total_pendapatan' => $totalkeseluruhan,
                    'total_bayar' => $totalbayarkasir,
                    'id_staff' => $data_staff->nama,
                );
                $this->M_Kasir->update_tindakan($pendapatan1, ['id_pelayanan' => $id_pelayanan], 'pendapatan_kasir');
            } else {
                $this->M_Kasir->insert_tindakan($pendapatan, 'pendapatan_kasir');
            }
        }

        echo json_encode($out);
    }
    public function update_konsul()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_pelayanan = $this->input->post('idPelayanan');
        $data = array(
            'biaya_rs' => $this->input->post('biaya_rs'),
            'biaya_jasa' => $this->input->post('biaya_jasa'),

        );
        $data1 = array(

            'biaya_jasa' => $this->input->post('biaya_jasa'),

        );
        $where = array(
            'id_pelayanan' => $id_pelayanan,
        );
        $this->M_Kasir->update_tindakan($data, $where, 'pelayanan');
        $this->M_Kasir->update_tindakan($data1, $where, 'history_pelayanan');
        $this->M_Kasir->update_tindakan($data1, $where, 'history_pelayanan_ugd');
        $this->M_Kasir->update_tindakan($data1, $where, 'history_pelayanan_ranap');
        $out['status'] = "success";

        echo json_encode($out);
    }

    public function insert_pembayaran_ranap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data_staff = $this->session->userdata('data_auth');
        $id_pelayanan = $this->input->post('idPelayanan');


        $pasien = $this->db->query("SELECT * from pelayanan where id_pelayanan = '$id_pelayanan'")->row();
        $out['pasien'] = $pasien;
        if ($pasien->status_rawat == 'dirawat') {
            $id_kamar = $this->M_Kasir->getKamarById($id_pelayanan);
            $i = 0;
            if ($id_kamar > 0) {
                $ruangan = array(
                    'status' => 'tersedia',
                );
                $where = array(
                    'id_ruangan' => $id_kamar[$i]->id_kamar,
                );
                $this->M_Kasir->update_tindakan($ruangan, $where, 'ruangan');

                $out['status'] = "success";
            }
            // update riwayat kamar
            $kamar = array(
                'status' => 'KELUAR',
                'tanggal_keluar' => date("Y-m-d H:i:s"),
            );
            $where1 = array(
                'id_pelayanan' => $id_pelayanan,
                'status' => 'AKTIF',
            );
            $this->M_Kasir->update_tindakan($kamar, $where1, 'riwayat_kamar');
            $out['status'] = "success";
        }

        $pelayanan = array(
            'status_rawat' => 'selesai',
            'tgl_keluar' => $this->input->post('tgl_keluar'),
        );
        $where2 = array(
            'id_pelayanan' => $id_pelayanan,
        );
        $this->M_Kasir->update_tindakan($pelayanan, $where2, 'pelayanan');

        $dp = floatval($this->input->post('dp'));
        $diskon = floatval($this->input->post('diskon'));
        $total_harga = $this->input->post('total_harga');
        $total = $total_harga - $dp - $diskon;
        $page_data = $this->M_Kasir->getDetailKasir($id_pelayanan);
        if (!empty($page_data)) {
            $data = array(

                'diskon' => $diskon,
                'dp' => $dp,
                'total_harga' => $total,
                'total_bayar' => $total_harga,
                'tanggal' => date("Y-m-d H:i:s"),
                'id_staff' => $data_staff->id_staff,
                'ket' => 1,
            );
            $this->M_Kasir->update_tindakan($data, $where2, 'deatail_kasir');
            $out['status'] = "success";
        } else {
            $data = array(
                'id_pelayanan' => $id_pelayanan,
                'diskon' => $diskon,
                'dp' => $dp,
                'total_harga' => $total,
                'total_bayar' => $total_harga,
                'tanggal' => date("Y-m-d H:i:s"),
                'id_staff' => $data_staff->id_staff,
            );
            $this->M_Kasir->insert_tindakan($data, 'deatail_kasir');
            $out['status'] = "success";
        }



        $out['status'] = "success";

        //$this->update_bed();
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
            //echo "Response : " . $content;
            // print_arr($err);
            //print_arr($content);

            // close cURL resource, and free up system resources
            curl_close($ch);
        }
        $out['status'] = "success";
        echo json_encode($out);
        exit;
    }
    public function insert_pembayaran_rajal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data_staff = $this->session->userdata('data_auth');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Kasir->getDetailKasir($id_pelayanan);
        if (!empty($page_data)) {
            $data = array(
                'diskon' => $this->input->post('diskon'),
                'dp' => $this->input->post('dp'),
                'total_harga' => $this->input->post('total_harga'),
                'total_bayar' => $this->input->post('total_bayar'),
                'tanggal' => date("Y-m-d H:i:s"),
                'id_staff' => $data_staff->id_staff,
            );
            $where = array(
                'id_pelayanan' => $id_pelayanan,
            );
            $this->M_Kasir->update_tindakan($data, $where, 'deatail_kasir');
            $out['status'] = "success";
        } else {
            $data = array(
                'id_pelayanan' => $id_pelayanan,
                'diskon' => $this->input->post('diskon'),
                'dp' => $this->input->post('dp'),
                'total_harga' => $this->input->post('total_harga'),
                'total_bayar' => $this->input->post('total_bayar'),
                'tanggal' => date("Y-m-d H:i:s"),
                'id_staff' => $data_staff->id_staff,
            );
            $this->M_Kasir->insert_tindakan($data, 'deatail_kasir');
            $out['status'] = "success";
        }

        $pelayanan = array(
            'status_rawat' => 'selesai',
            'tgl_keluar' => $this->input->post('tgl_keluar'),
        );
        $where = array(
            'id_pelayanan' => $id_pelayanan,
        );
        $this->M_Kasir->update_tindakan($pelayanan, $where, 'pelayanan');

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function print_kasir_ranap()
    {
        $staff = $this->session->userdata('data_auth');
        $action = $this->input->post('action');
        $id_pelayanan = $this->input->post('inPel');
        $id_history = $this->input->post('inHis');
        $data['pasien'] = $this->M_Kasir->getDataPasienRanap($id_pelayanan, $id_history);


        //hitung sewakamar
        $tgl_keluar = $this->input->post('inTglKeluar');
        $pasien = $this->M_Kasir->getDataPasienRanap($id_pelayanan, $id_history);
        $tgl_masuk = $pasien['tgl_masuk'];
        $sewa_kamar = $this->M_Kasir->getSewakamar($id_history);

        $apotik = $this->M_Kasir->total_apotik($id_pelayanan);
        $obatok = $this->M_Kasir->total_operasi($id_pelayanan);
        $igd = $this->M_Kasir->total_igd($id_pelayanan);
        $labor = $this->M_Kasir->total_labor($id_pelayanan);
        $radio = $this->M_Kasir->total_radio($id_pelayanan);
        $anak = $this->M_Kasir->total_anak($id_pelayanan);
        $apelkes = $this->M_Kasir->total_apelkes($id_pelayanan);
        $internis = $this->M_Kasir->total_internis($id_pelayanan);
        $bedah = $this->M_Kasir->total_bedah($id_pelayanan);
        $fisio = $this->M_Kasir->total_fisio($id_pelayanan);
        $gigi = $this->M_Kasir->total_gigi($id_pelayanan);
        $jantung = $this->M_Kasir->total_jantung($id_pelayanan);
        $kulit = $this->M_Kasir->total_kulit($id_pelayanan);
        $mata = $this->M_Kasir->total_mata($id_pelayanan);
        $obgyne = $this->M_Kasir->total_obgyne($id_pelayanan);
        $ok = $this->M_Kasir->total_ok($id_pelayanan);
        $tht = $this->M_Kasir->total_tht($id_pelayanan);
        $umum = $this->M_Kasir->total_umum($id_pelayanan);
        $akp = $this->M_Kasir->total_akupuntur($id_pelayanan);
        $bdm = $this->M_Kasir->total_bedah_mulut($id_pelayanan);
        $jiwa = $this->M_Kasir->total_kesjiwa($id_pelayanan);
        $ort = $this->M_Kasir->total_orthopedi($id_pelayanan);
        $paru = $this->M_Kasir->total_paru($id_pelayanan);
        $hd = $this->M_Kasir->total_hemodialisa($id_pelayanan);
        $saraf = $this->M_Kasir->total_saraf($id_pelayanan);
        $uro = $this->M_Kasir->total_urologi($id_pelayanan);
        $ginjal = $this->M_Kasir->total_ginjal($id_pelayanan);
        $pnm = $this->M_Kasir->total_penyakit_mulut($id_pelayanan);
        $rehab = $this->M_Kasir->total_rehab($id_pelayanan);
        $biaya_ranap = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row_array();
        $total_harga = $biaya_ranap['biaya_ruangan'] + $apotik['total'] + $obatok['total'] + $igd['total'] + $labor['total'] + $radio['total']
            + $anak['total'] + $apelkes['total'] + $internis['total'] + $bedah['total'] + $fisio['total'] + $gigi['total']
            + $jantung['total'] + $kulit['total'] + $mata['total'] + $obgyne['total'] + $ok['total'] + $tht['total'] + $umum['total'] +
            $akp['total'] + $bdm['total'] + $jiwa['total'] + $ort['total'] + $paru['total'] + $hd['total'] + $saraf['total'] + $uro['total'] +
            $ginjal['total'] + $pnm['total'] + $rehab['total'];

        $tgl1 = new DateTime($tgl_masuk);
        $tgl2 = new DateTime($tgl_keluar);
        $selisih = $tgl2->diff($tgl1)->days + 1;
        $db_sewa = $this->M_Kasir->cekSewaKamar($id_pelayanan);
        if (count($db_sewa) > 0) {

            if ($total_harga > 5000000) {
                $materai = $this->db->get_where('tindakan_apelkes', ['id_pelayanan' => $id_pelayanan, 'id_list_tindakan' => 1412])->result();
                if (count($materai) == 0) {
                    $data_materai = [
                        'id_tindakan_apelkes' => uniqid(),
                        'harga' => 10000,
                        'frek' => 1,
                        'id_pelayanan' => $id_pelayanan,
                        'tipe' => $pasien['id_kamar'],
                        'id_list_tindakan' => 1412,
                        'total' => 10000,
                        'id_dokter' => '-',
                        'tanggal' => date('Y-m-d H:i:s'),
                        'id_staff' => $staff->id_staff
                    ];
                    $this->M_Kasir->insert_tindakan($data_materai, 'tindakan_apelkes');
                }
            }
            $service = $this->db->get_where('tindakan_apelkes', ['id_pelayanan' => $id_pelayanan, 'id_list_tindakan' => 1413])->result();
            $sewakamaratas = $this->M_Kasir->TotalSewaKamarAtas($id_pelayanan);
            // var_dump($sewakamaratas);
            if (isset($sewakamaratas->total)) {
                $total_sewa = $sewakamaratas->total;
                if (count($service) == 0) {
                    $data_service = [
                        'id_tindakan_apelkes' => uniqid(),
                        'harga' => $total_sewa * 0.1,
                        'frek' => 1,
                        'id_pelayanan' => $id_pelayanan,
                        'tipe' => $pasien['id_kamar'],
                        'id_list_tindakan' => 1413,
                        'total' => $total_sewa * 0.1,
                        'id_dokter' => '-',
                        'tanggal' => date('Y-m-d H:i:s'),
                        'id_staff' => $staff->id_staff
                    ];
                    $this->M_Kasir->insert_tindakan($data_service, 'tindakan_apelkes');
                } else {
                    $data_service = [
                        'harga' => $total_sewa * 0.1,
                        'frek' => 1,
                        'id_pelayanan' => $id_pelayanan,
                        'tipe' => $pasien['id_kamar'],
                        'id_list_tindakan' => 1413,
                        'total' => $total_sewa * 0.1,
                        'id_dokter' => '-',
                        'tanggal' => date('Y-m-d H:i:s'),
                        'id_staff' => $staff->id_staff
                    ];
                    $this->M_Kasir->update_tindakan($data_service, ['id_tindakan_apelkes' => $service[0]->id_tindakan_apelkes], 'tindakan_apelkes');
                }
                // } else {
                //     $data_sewa = [
                //         'frek' => $selisih,
                //         'total' => $selisih * $sewa_kamar->harga_sarana,
                //         'tanggal' => date('Y-m-d H:i:s'),
                //         'id_staff' => $staff->id_staff
                //     ];
                //     $this->M_Kasir->update_tindakan($data_sewa, ['id_tindakan_apelkes' => $db_sewa[0]->id_tindakan_apelkes], 'tindakan_apelkes');
            }
        }
        // $data_admin = [
        //     'id_tindakan_apelkes' => uniqid(),
        //     'harga' => $biaya_ranap['biaya_ruangan'],
        //     'frek' => 1,
        //     'id_pelayanan' => $id_pelayanan,
        //     'tipe' => $pasien['id_kamar'],
        //     'id_list_tindakan' => 1414,
        //     'total' => $biaya_ranap['biaya_ruangan'],
        //     'id_dokter' => $pasien['dpjp'],
        //     'tanggal' => date('Y-m-d H:i:s'),
        //     'id_staff' => $staff->id_staff
        // ];
        // $this->db->replace('tindakan_apelkes', $data_admin);
        //endhitung sewakamar

        $igd = $this->M_Kasir->getDataPasienRanapIGD($id_pelayanan)->result();
        $dataigd = $this->M_Kasir->getDataPasienRanapIGD($id_pelayanan)->row();
        if (count($igd) > 0) {
            $data['dokterIGD'] = $dataigd->nama_dokter;
        } else {
            $data['dokterIGD'] = '-';
        }
        $poli = $this->M_Kasir->getDataPasienRanapPoli($id_pelayanan)->result();
        $datapoli = $this->M_Kasir->getDataPasienRanapPoli($id_pelayanan)->row();
        if (count($poli) > 0) {
            $data['dokterPoli'] = $datapoli->dokter;
        } else {
            $data['dokterPoli'] = '-';
        }
        $data['diskon'] = $this->input->post('inDiskon');
        $data['dp'] = $this->input->post('inDp');
        $data['selisih'] = $this->input->post('inSelisih');
        $data['note'] = $this->input->post('inNote');
        $data['inPel'] = $id_pelayanan;
        $data['data_pelayanan'] = $this->M_Kasir->list_pelayanan_pasien($id_pelayanan);
        $data['data_apotik'] = $this->M_Kasir_ranap->list_apotik_pasien($id_pelayanan);
        $data['data_operasi'] = $this->M_Kasir_ranap->list_operasi_pasien($id_pelayanan);
        $data['data_igd'] = $this->M_Kasir_ranap->list_igd_pasien($id_pelayanan);
        $data['data_labor'] = $this->M_Kasir_ranap->list_labor_pasien($id_pelayanan);
        $data['data_radio'] = $this->M_Kasir_ranap->list_radio_pasien($id_pelayanan);
        $data['data_anak'] = $this->M_Kasir_ranap->list_anak_pasien($id_pelayanan);
        $data['data_apelkes'] = $this->M_Kasir_ranap->list_apelkes_pasien($id_pelayanan);
        $data['data_internis'] = $this->M_Kasir_ranap->list_internis_pasien($id_pelayanan);
        $data['data_bedah'] = $this->M_Kasir_ranap->list_bedah_pasien($id_pelayanan);
        $data['data_fisio'] = $this->M_Kasir_ranap->list_fisio_pasien($id_pelayanan);
        $data['data_gigi'] = $this->M_Kasir_ranap->list_gigi_pasien($id_pelayanan);
        $data['data_jantung'] = $this->M_Kasir_ranap->list_jantung_pasien($id_pelayanan);
        $data['data_kulit'] = $this->M_Kasir_ranap->list_kulit_pasien($id_pelayanan);
        $data['data_mata'] = $this->M_Kasir_ranap->list_mata_pasien($id_pelayanan);
        $data['data_obgyne'] = $this->M_Kasir_ranap->list_obgyne_pasien($id_pelayanan);
        $data['data_ok'] = $this->M_Kasir_ranap->list_ok_pasien($id_pelayanan);
        $data['data_tht'] = $this->M_Kasir_ranap->list_tht_pasien($id_pelayanan);
        $data['data_umum'] = $this->M_Kasir_ranap->list_umum_pasien($id_pelayanan);
        $data['data_akp'] = $this->M_Kasir_ranap->list_akupuntur_pasien($id_pelayanan);
        $data['data_bdm'] = $this->M_Kasir_ranap->list_bedah_mulut_pasien($id_pelayanan);
        $data['data_jiwa'] = $this->M_Kasir_ranap->list_kesjiwa_pasien($id_pelayanan);
        $data['data_ort'] = $this->M_Kasir_ranap->list_orthopedi_pasien($id_pelayanan);
        $data['data_paru'] = $this->M_Kasir_ranap->list_paru_pasien($id_pelayanan);
        $data['data_hd'] = $this->M_Kasir_ranap->list_hemodialisa_pasien($id_pelayanan);
        $data['data_saraf'] = $this->M_Kasir_ranap->list_saraf_pasien($id_pelayanan);
        $data['data_uro'] = $this->M_Kasir_ranap->list_urologi_pasien($id_pelayanan);
        $data['data_ginjal'] = $this->M_Kasir_ranap->list_ginjal_pasien($id_pelayanan);
        $data['data_pnm'] = $this->M_Kasir_ranap->list_penyakit_mulut_pasien($id_pelayanan);
        $data['data_rehab'] = $this->M_Kasir_ranap->list_rehab_pasien($id_pelayanan);
        $data['biaya_ranap'] = $biaya_ranap['biaya_ruangan'];


        $data['tgl_keluar_ranap'] = $this->input->post('inTglKeluar');
        $data['tgl_keluar'] = $this->input->post('inTglKeluar');
        $data['opsi'] = $this->input->post('opsi_bayar');
        $data['totalbayarkasir'] = $this->input->post('totalbayar');
        $data['totalkeseluruhan'] = $this->input->post('totalkeseluruhan');
        $data['tgl_keluar'] = $this->input->post('inTglKeluar');
        $data['jenis_bank'] = $this->input->post('jenis_bank');

        if ($action == 'cetak') {
            // if ($data['pasien']['cara_bayar'] == 'JASA RAHARJA') {
            //     $this->load->view('print/cetak_bayar_ranap_raharja', $data);
            // } else {
            $this->load->view('print/cetak_bayar_ranap', $data);
            // }
        } else {

            $where = array('id_pelayanan' => $id_pelayanan);
            $datapel = array(
                'tgl_keluar' => $this->input->post('inTglKeluar'),
                'status_rawat' => 'selesai'
            );
            $this->M_Kasir->update_tindakan($datapel, $where, 'pelayanan');


            $id_kamar = $this->M_Kasir->getKamarById($id_pelayanan);
            $i = 0;
            if ($id_kamar > 0) {
                $ruangan = array(
                    'status' => 'tersedia',
                );

                $this->M_Kasir->update_tindakan($ruangan, ['id_ruangan' => $id_kamar[$i]->id_kamar, 'status' => 'dipakai'], 'ruangan');
            }
            //update riwayat kamar
            $kamar = array(
                'status' => 'KELUAR',
                'tanggal_keluar' => date("Y-m-d H:i:s"),
            );

            $this->M_Kasir->update_tindakan($kamar, ['id_pelayanan' => $id_pelayanan, 'status' => 'AKTIF'], 'riwayat_kamar');
            // $this->update_bed();

            $this->load->view('print/cetak_bayar_ranap', $data);
        }
    }
    public function print_kasir_rajal()
    {
        $action = $this->input->post('action');
        //$action2 = $this->input->post('cetak_bon');
        $id_pelayanan = $this->input->post('inPel');
        $id_history = $this->input->post('inHis');
        $data['pasien'] = $this->M_Kasir->getDataPasienRajal($id_pelayanan, $id_history);
        $data['diskon'] = $this->input->post('inDiskon');
        $data['tgl_keluar_rajal'] = $this->input->post('inTglKeluar');
        $data['dp'] = $this->input->post('inDp');
        $data['selisih'] = $this->input->post('inSelisih');
        $data['note'] = $this->input->post('inNote');
        $data['tgl'] = $this->input->post('tgl');
        $data['inPel'] = $id_pelayanan;
        $data['data_pelayanan'] = $this->M_Kasir->list_pelayanan_pasien($id_pelayanan);
        $data['data_apotik'] = $this->M_Kasir->list_apotik_pasien($id_pelayanan);
        $data['data_operasi'] = $this->M_Kasir->list_operasi_pasien($id_pelayanan);
        $data['data_igd'] = $this->M_Kasir->list_igd_pasien($id_pelayanan);
        $data['data_labor'] = $this->M_Kasir->list_labor_pasien($id_pelayanan);
        $data['data_radio'] = $this->M_Kasir->list_radio_pasien($id_pelayanan);
        $data['data_anak'] = $this->M_Kasir->list_anak_pasien($id_pelayanan);
        $data['data_apelkes'] = $this->M_Kasir->list_apelkes_pasien($id_pelayanan);
        $data['data_internis'] = $this->M_Kasir->list_internis_pasien($id_pelayanan);
        $data['data_bedah'] = $this->M_Kasir->list_bedah_pasien($id_pelayanan);
        $data['data_fisio'] = $this->M_Kasir->list_fisio_pasien($id_pelayanan);
        $data['data_gigi'] = $this->M_Kasir->list_gigi_pasien($id_pelayanan);
        $data['data_jantung'] = $this->M_Kasir->list_jantung_pasien($id_pelayanan);
        $data['data_kulit'] = $this->M_Kasir->list_kulit_pasien($id_pelayanan);
        $data['data_mata'] = $this->M_Kasir->list_mata_pasien($id_pelayanan);
        $data['data_obgyne'] = $this->M_Kasir->list_obgyne_pasien($id_pelayanan);
        $data['data_ok'] = $this->M_Kasir->list_ok_pasien($id_pelayanan);
        $data['data_tht'] = $this->M_Kasir->list_tht_pasien($id_pelayanan);
        $data['data_umum'] = $this->M_Kasir->list_umum_pasien($id_pelayanan);
        $data['data_akp'] = $this->M_Kasir->list_akupuntur_pasien($id_pelayanan);
        $data['data_bdm'] = $this->M_Kasir->list_bedah_mulut_pasien($id_pelayanan);
        $data['data_jiwa'] = $this->M_Kasir->list_kesjiwa_pasien($id_pelayanan);
        $data['data_ort'] = $this->M_Kasir->list_orthopedi_pasien($id_pelayanan);
        $data['data_paru'] = $this->M_Kasir->list_paru_pasien($id_pelayanan);
        $data['data_hd'] = $this->M_Kasir->list_hemodialisa_pasien($id_pelayanan);
        $data['data_saraf'] = $this->M_Kasir->list_saraf_pasien($id_pelayanan);
        $data['data_uro'] = $this->M_Kasir->list_urologi_pasien($id_pelayanan);
        $data['data_ginjal'] = $this->M_Kasir->list_ginjal_pasien($id_pelayanan);
        $data['data_pnm'] = $this->M_Kasir->list_penyakit_mulut_pasien($id_pelayanan);
        $data['data_rehab'] = $this->M_Kasir->list_rehab_pasien($id_pelayanan);
        $data['data_gizi'] = $this->M_Kasir->list_gizi($id_pelayanan);
        $data['data_terapi_wicara'] = $this->M_Kasir->list_terapi_bicara($id_pelayanan);
        $data['tgl_keluar_rajal'] = $this->input->post('inTglKeluar');
        $data['opsi'] = $this->input->post('opsi_bayar');
        $data['totalbayarkasir'] = $this->input->post('totalbayar');
        $data['totalkeseluruhan'] = $this->input->post('totalkeseluruhan');
        $data['tgl_keluar'] = $this->input->post('inTglKeluar');
        $data['jenis_bank'] = $this->input->post('jenis_bank');

        if ($action == 'cetak') {
            // if ($data['pasien']['cara_bayar'] == 'JASA RAHARJA') {
            //     $this->load->view('print/cetak_pembayaran_jasaraharja', $data);
            // } else {
            $this->load->view('print/cetak_pembayaran', $data);
            // }
        } else {
            $where = array('id_pelayanan' => $id_pelayanan);
            $datapel = array(
                'tgl_keluar' => $this->input->post('inTglKeluar'),
                'status_rawat' => 'selesai'
            );
            $this->M_Kasir->update_tindakan($datapel, $where, 'pelayanan');

            $this->load->view('print/cetak_pembayaran', $data);
            // }
        }
    }
    public function print_kasir_pulang()
    {
        $action = $this->input->post('action');
        $id_pelayanan = $this->input->post('inPel');
        $id_history = $this->input->post('inHis');
        $data['pasien'] = $this->M_Kasir->getDataPasienRajal($id_pelayanan, $id_history);
        $data['diskon'] = $this->input->post('inDiskon');
        $data['dp'] = $this->input->post('inDp');
        $data['inPel'] = $id_pelayanan;
        $data['data_pelayanan'] = $this->M_Kasir->list_pelayanan_pasien($id_pelayanan);
        $data['data_apotik'] = $this->M_Kasir->list_apotik_pasien($id_pelayanan);
        $data['data_operasi'] = $this->M_Kasir->list_operasi_pasien($id_pelayanan);
        $data['data_igd'] = $this->M_Kasir->list_igd_pasien($id_pelayanan);
        $data['data_labor'] = $this->M_Kasir->list_labor_pasien($id_pelayanan);
        $data['data_radio'] = $this->M_Kasir->list_radio_pasien($id_pelayanan);
        $data['data_anak'] = $this->M_Kasir->list_anak_pasien($id_pelayanan);
        $data['data_apelkes'] = $this->M_Kasir->list_apelkes_pasien($id_pelayanan);
        $data['data_internis'] = $this->M_Kasir->list_internis_pasien($id_pelayanan);
        $data['data_bedah'] = $this->M_Kasir->list_bedah_pasien($id_pelayanan);
        $data['data_fisio'] = $this->M_Kasir->list_fisio_pasien($id_pelayanan);
        $data['data_gigi'] = $this->M_Kasir->list_gigi_pasien($id_pelayanan);
        $data['data_jantung'] = $this->M_Kasir->list_jantung_pasien($id_pelayanan);
        $data['data_kulit'] = $this->M_Kasir->list_kulit_pasien($id_pelayanan);
        $data['data_mata'] = $this->M_Kasir->list_mata_pasien($id_pelayanan);
        $data['data_obgyne'] = $this->M_Kasir->list_obgyne_pasien($id_pelayanan);
        $data['data_ok'] = $this->M_Kasir->list_ok_pasien($id_pelayanan);
        $data['data_tht'] = $this->M_Kasir->list_tht_pasien($id_pelayanan);
        $data['data_umum'] = $this->M_Kasir->list_umum_pasien($id_pelayanan);
        $data['data_akp'] = $this->M_Kasir->list_akupuntur_pasien($id_pelayanan);
        $data['data_bdm'] = $this->M_Kasir->list_bedah_mulut_pasien($id_pelayanan);
        $data['data_jiwa'] = $this->M_Kasir->list_kesjiwa_pasien($id_pelayanan);
        $data['data_ort'] = $this->M_Kasir->list_orthopedi_pasien($id_pelayanan);
        $data['data_paru'] = $this->M_Kasir->list_paru_pasien($id_pelayanan);
        $data['data_hd'] = $this->M_Kasir->list_hemodialisa_pasien($id_pelayanan);
        $data['data_saraf'] = $this->M_Kasir->list_saraf_pasien($id_pelayanan);
        $data['data_uro'] = $this->M_Kasir->list_urologi_pasien($id_pelayanan);
        $data['data_ginjal'] = $this->M_Kasir->list_ginjal_pasien($id_pelayanan);
        $data['data_pnm'] = $this->M_Kasir->list_penyakit_mulut_pasien($id_pelayanan);
        $data['data_rehab'] = $this->M_Kasir->list_rehab_pasien($id_pelayanan);
        // $data['apotik'] = $this->M_Kasir->total_apotik($id_pelayanan);
        // $data['obatok'] = $this->M_Kasir->total_operasi($id_pelayanan);
        // $data['igd'] = $this->M_Kasir->total_igd($id_pelayanan);
        // $data['labor'] = $this->M_Kasir->total_labor($id_pelayanan);
        // $data['radio'] = $this->M_Kasir->total_radio($id_pelayanan);
        // $data['anak'] = $this->M_Kasir->total_anak($id_pelayanan);
        // $data['apelkes'] = $this->M_Kasir->total_apelkes($id_pelayanan);
        // $data['internis'] = $this->M_Kasir->total_internis($id_pelayanan);
        // $data['bedah'] = $this->M_Kasir->total_bedah($id_pelayanan);
        // $data['fisio'] = $this->M_Kasir->total_fisio($id_pelayanan);
        // $data['gigi'] = $this->M_Kasir->total_gigi($id_pelayanan);
        // $data['jantung'] = $this->M_Kasir->total_jantung($id_pelayanan);
        // $data['kulit'] = $this->M_Kasir->total_kulit($id_pelayanan);
        // $data['mata'] = $this->M_Kasir->total_mata($id_pelayanan);
        // $data['obgyne'] = $this->M_Kasir->total_obgyne($id_pelayanan);
        // $data['ok'] = $this->M_Kasir->total_ok($id_pelayanan);
        // $data['tht'] = $this->M_Kasir->total_tht($id_pelayanan);
        // $data['umum'] = $this->M_Kasir->total_umum($id_pelayanan);

        if ($action == 'cetak') {
            $data['tgl_keluar'] = $this->input->post('inTglKeluar');
            if ($data['pasien']['cara_bayar'] == 'JASA RAHARJA') {
                $this->load->view('print/cetak_pembayaran_jasaraharja', $data);
            } else {
                $this->load->view('print/cetak_pembayaran', $data);
            }
        } else {
            $data['tgl_keluar'] = $this->input->post('inTglKeluar');
            $this->load->view('print/cetak_pembayaran_rajal', $data);
        }
    }
    public function print_pasien_pulang()
    {
        $action = $this->input->post('action');
        $id_pelayanan = $this->input->post('inPel');
        $id_history = $this->input->post('inHis');
        $data['pasien'] = $this->M_Kasir->getDataPasienPulang($id_pelayanan, $id_history);
        $data['diskon'] = $this->input->post('inDiskon');
        $data['dp'] = $this->input->post('inDp');
        $data['inPel'] = $id_pelayanan;
        $data['data_pelayanan'] = $this->M_Kasir->list_pelayanan_pasien($id_pelayanan);
        $data['data_apotik'] = $this->M_Kasir->list_apotik_pasien($id_pelayanan);
        $data['data_operasi'] = $this->M_Kasir->list_operasi_pasien($id_pelayanan);
        $data['data_igd'] = $this->M_Kasir->list_igd_pasien($id_pelayanan);
        $data['data_labor'] = $this->M_Kasir->list_labor_pasien($id_pelayanan);
        $data['data_radio'] = $this->M_Kasir->list_radio_pasien($id_pelayanan);
        $data['data_anak'] = $this->M_Kasir->list_anak_pasien($id_pelayanan);
        $data['data_apelkes'] = $this->M_Kasir->list_apelkes_pasien($id_pelayanan);
        $data['data_internis'] = $this->M_Kasir->list_internis_pasien($id_pelayanan);
        $data['data_bedah'] = $this->M_Kasir->list_bedah_pasien($id_pelayanan);
        $data['data_fisio'] = $this->M_Kasir->list_fisio_pasien($id_pelayanan);
        $data['data_gigi'] = $this->M_Kasir->list_gigi_pasien($id_pelayanan);
        $data['data_jantung'] = $this->M_Kasir->list_jantung_pasien($id_pelayanan);
        $data['data_kulit'] = $this->M_Kasir->list_kulit_pasien($id_pelayanan);
        $data['data_mata'] = $this->M_Kasir->list_mata_pasien($id_pelayanan);
        $data['data_obgyne'] = $this->M_Kasir->list_obgyne_pasien($id_pelayanan);
        $data['data_ok'] = $this->M_Kasir->list_ok_pasien($id_pelayanan);
        $data['data_tht'] = $this->M_Kasir->list_tht_pasien($id_pelayanan);
        $data['data_umum'] = $this->M_Kasir->list_umum_pasien($id_pelayanan);
        $data['data_akp'] = $this->M_Kasir->list_akupuntur_pasien($id_pelayanan);
        $data['data_bdm'] = $this->M_Kasir->list_bedah_mulut_pasien($id_pelayanan);
        $data['data_jiwa'] = $this->M_Kasir->list_kesjiwa_pasien($id_pelayanan);
        $data['data_ort'] = $this->M_Kasir->list_orthopedi_pasien($id_pelayanan);
        $data['data_paru'] = $this->M_Kasir->list_paru_pasien($id_pelayanan);
        $data['data_hd'] = $this->M_Kasir->list_hemodialisa_pasien($id_pelayanan);
        $data['data_saraf'] = $this->M_Kasir->list_saraf_pasien($id_pelayanan);
        $data['data_uro'] = $this->M_Kasir->list_urologi_pasien($id_pelayanan);
        $data['data_ginjal'] = $this->M_Kasir->list_ginjal_pasien($id_pelayanan);
        $data['data_pnm'] = $this->M_Kasir->list_penyakit_mulut_pasien($id_pelayanan);
        $data['data_rehab'] = $this->M_Kasir->list_rehab_pasien($id_pelayanan);
        $data['apotik'] = $this->M_Kasir->total_apotik($id_pelayanan);
        $data['obatok'] = $this->M_Kasir->total_operasi($id_pelayanan);
        $data['igd'] = $this->M_Kasir->total_igd($id_pelayanan);
        $data['labor'] = $this->M_Kasir->total_labor($id_pelayanan);
        $data['radio'] = $this->M_Kasir->total_radio($id_pelayanan);
        $data['anak'] = $this->M_Kasir->total_anak($id_pelayanan);
        $data['apelkes'] = $this->M_Kasir->total_apelkes($id_pelayanan);
        $data['internis'] = $this->M_Kasir->total_internis($id_pelayanan);
        $data['bedah'] = $this->M_Kasir->total_bedah($id_pelayanan);
        $data['fisio'] = $this->M_Kasir->total_fisio($id_pelayanan);
        $data['gigi'] = $this->M_Kasir->total_gigi($id_pelayanan);
        $data['jantung'] = $this->M_Kasir->total_jantung($id_pelayanan);
        $data['kulit'] = $this->M_Kasir->total_kulit($id_pelayanan);
        $data['mata'] = $this->M_Kasir->total_mata($id_pelayanan);
        $data['obgyne'] = $this->M_Kasir->total_obgyne($id_pelayanan);
        $data['ok'] = $this->M_Kasir->total_ok($id_pelayanan);
        $data['tht'] = $this->M_Kasir->total_tht($id_pelayanan);
        $data['umum'] = $this->M_Kasir->total_umum($id_pelayanan);

        if ($action == 'cetak') {
            $data['tgl_keluar_rajal'] = $this->M_Kasir->getDataPasienPulang($id_pelayanan, $id_history);
            if ($data['pasien']['cara_bayar'] == 'JASA RAHARJA') {
                $this->load->view('print/cetak_pembayaran_pulang_raharja', $data);
            } else {
                $this->load->view('print/cetak_pembayaran_pulang', $data);
            }
        } else {
            $data['tgl_keluar'] = $this->input->post('inTglKeluar');
            $this->load->view('print/cetak_pembayaran_rajal', $data);
        }
    }

    public function print_tambahan($id_pelayanan)
    {
        $data['data'] = $this->M_Kasir->getPelayananUmumById($id_pelayanan);
        $data['pasien'] = $this->db->get_where('pelayanan_tambahan', array('id_pelayanan_umum' => $id_pelayanan))->row_array();

        $this->load->view('print/cetak_bil_tambahan', $data);
    }
    public function update_pasien_balik()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $pelayanan = array(
            'status_rawat' => 'dikembalikan',
            'tgl_keluar' => null,
        );
        $where = array(
            'id_pelayanan' => $id_pelayanan,
        );
        $this->M_Kasir->update_tindakan($pelayanan, $where, 'pelayanan');

        $count = array(
            'status' => 0,
            'tgl' => date("Y-m-d H:i:s"),
        );

        $this->M_Kasir->update_tindakan($count, $where, 'req_kasir');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function insert_pelayanan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data_staff = $this->session->userdata('data_auth');
        $data = array(
            'id_pelayanan_umum' => uniqid(),
            'nama' => $this->input->post('nama'),
            'tgl' => date("Y-m-d H:i:s"),
            'id_staff' => $data_staff->id_staff,
        );
        $this->M_Kasir->insert_tindakan($data, 'pelayanan_tambahan');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function insert_master()
    {
        $data = array(
            'id_list_tindakan' => uniqid(),
            'nama' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'harga_cost' => $this->input->post('harga_cost'),
            'tipe' => $this->input->post('tipe'),
            'tipe_beban' => '-',
            'status' => 'AKTIF',
        );
        $this->M_Kasir->insert_tindakan($data, 'list_tindakan_umum');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function insert_tindakan_pelayanan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data_staff = $this->session->userdata('data_auth');
        $data = array(
            'id_tindakan' => uniqid(),
            'id_list_tindakan' => $this->input->post('id_tindakan'),
            'frek' => $this->input->post('frek'),
            'harga' => $this->input->post('harga'),
            'total' => $this->input->post('total'),
            'tanggal' => date("Y-m-d H:i:s"),
            'id_pelayanan' => $this->input->post('idPelayanan'),
            'id_staff' => $data_staff->id_staff,
        );
        $this->M_Kasir->insert_tindakan($data, 'tindakan_umum');
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_pelayanan()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $where = array(
            'id_pelayanan_umum' => $id_pelayanan,
        );
        $this->M_Kasir->delete_tindakan($where, 'pelayanan_tambahan');
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_list_pelayanan()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $where = array(
            'id_tindakan' => $id_pelayanan,
        );
        $this->M_Kasir->delete_tindakan($where, 'tindakan_umum');
        $out['status'] = "success";
        echo json_encode($out);
    }
    function getDpDisc()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $db = $this->M_Kasir->getDpDisc($id_pelayanan);
        if (count($db) > 0) {
            $db = $db[0];

            $db->status_dt = 'found';
        } else {
            $db = null;
            
            $db['status_dt'] = 'not found';
        }
        // print_arr($db) ;
        echo json_encode($db);
        exit;
    }
    function getKonsul()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $db = $this->db->query("SELECT (biaya_rs + biaya_jasa) total, biaya_rs, biaya_jasa FROM pelayanan WHERE  id_pelayanan ='$id_pelayanan' ")->result();
        if (count($db) > 0) {
            $db = $db[0];

            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        // print_arr($db) ;
        echo json_encode($db);
        exit;
    }

    public function pendapatan_tunai_kasir()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pendapatan_tunai_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    //Pendapatan_nontunai_kasir
    public function pendapatan_nontunai_kasir()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pendapatan_nontunai_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    //Pendapatan_hutang_kasir
    public function pendapatan_hutang_kasir()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pendapatan_hutang_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function insertRajalKasir()
    {
        $id_pelayanan = $this->input->post('idPelayanan');
        //$id_history = $this->input->post('idHis');
        $id_pendapatan_tunai_kasir = uniqid();
        $id_pendapatan_hutang_kasir = uniqid();
        $id_pendapatan_nontunai_kasir = uniqid();
        $id_pendapatan_bank = uniqid();
        $tanggal_masuk = date("Y-m-d H:i:s");
        $id_staff = $this->session->userdata("data_auth");
        $opsi = $this->input->post('opsi');
        $total_bayar = floatval($this->input->post('total_bayar'));
        $bayar_tunai = floatval($this->input->post('bayar_tunai'));
        $karyawantunai = $this->input->post('karyawantunai');
        $opsi_lanjut = $this->input->post('opsi_lanjut');
        $jenis_bank = $this->input->post('jenis_bank');
        $jenis_asuransi = $this->input->post('jenis_asuransi');
        $opsi_bayar_aia = $this->input->post('opsi_bayar_aia');
        $total_bayarAIA = floatval($this->input->post('total_bayarAIA'));
        $inBayarAIA = floatval($this->input->post('inBayarAIA'));
        $karyawan_tunaiAIA = $this->input->post('karyawan_tunaiAIA');
        $hutang = $this->input->post('hutang');
        $hutangAIA = $this->input->post('hutangAIA');
        $setara = $this->input->post('setara');
        $setara2 = $this->input->post('setara2');
        $total_harga = $this->input->post('total_harga');
        $total_bayar_semua = $this->input->post('total_bayar_semua');
        $dp = floatval($this->input->post('dp'));
        $diskon = floatval($this->input->post('diskon'));
        $tgl_keluar = $this->input->post('tgl_keluar');

        $total2 = $total_bayarAIA - $dp - $diskon;
        $total = $total_harga - $dp - $diskon;



        $data = array(

            'diskon' => $diskon,
            'dp' => $dp,
            'total_harga' => $total,
            'total_bayar' => $total_harga,
            'tanggal' => date("Y-m-d H:i:s"),
            'id_staff' => $id_staff->id_staff,
            'ket' => 1,
        );
        $where = array('id_pelayanan' => $id_pelayanan);
        $datapel = array(
            'tgl_keluar' => $tgl_keluar,
            'status_rawat' => 'selesai'
        );
        $this->M_Kasir->update_tindakan($datapel, $where, 'pelayanan');
        $this->M_Kasir->update_tindakan($data, $where, 'deatail_kasir');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function insertRanapKasir()
    {
        $staff = $this->session->userdata('data_auth');
        $id_pelayanan = $this->input->post('idPelayanan');
        $id_history = $this->input->post('idHis');
        $id_pendapatan_tunai_kasir = uniqid();
        $id_pendapatan_hutang_kasir = uniqid();
        $id_pendapatan_nontunai_kasir = uniqid();
        $id_pendapatan_bank = uniqid();
        $tanggal_masuk = date("Y-m-d H:i:s");
        $id_staff = $this->session->userdata("data_auth");
        $opsi = $this->input->post('opsi');
        $total_bayar = floatval($this->input->post('total_bayar'));
        $bayar_tunai = floatval($this->input->post('bayar_tunai'));
        $karyawantunai = $this->input->post('karyawantunai');
        $opsi_lanjut = $this->input->post('opsi_lanjut');
        $jenis_bank = $this->input->post('jenis_bank');
        $jenis_asuransi = $this->input->post('jenis_asuransi');
        $opsi_bayar_aia = $this->input->post('opsi_bayar_aia');
        $total_bayarAIA = floatval($this->input->post('total_bayarAIA'));
        $inBayarAIA = floatval($this->input->post('inBayarAIA'));
        $karyawan_tunaiAIA = $this->input->post('karyawan_tunaiAIA');
        $hutang = $this->input->post('hutang');
        $hutangAIA = $this->input->post('hutangAIA');
        $setara = $this->input->post('setara');
        $setara2 = $this->input->post('setara2');
        $total_harga = $this->input->post('total_harga');
        $total_bayar_semua = $this->input->post('total_bayar_semua');
        $dp = floatval($this->input->post('dp'));
        $diskon = floatval($this->input->post('diskon'));
        $tgl_keluar = $this->input->post('tgl_keluar');

        $total2 = $total_bayarAIA - $dp - $diskon;
        $total = $total_harga - $dp - $diskon;

        $db = $this->db->get_where('pelayanan', array('id_pelayanan' => $id_pelayanan))->row_array();
        if ($db['status_rawat'] == 'dirawat') {
            $id_kamar = $this->M_Kasir->getKamarById($id_pelayanan);
            $i = 0;
            if ($id_kamar > 0) {
                $ruangan = array(
                    'status' => 'tersedia',
                );
                $where = array(
                    'id_ruangan' => $id_kamar[$i]->id_kamar,
                );
                $this->M_Kasir->update_tindakan($ruangan, $where, 'ruangan');
            }
            //update riwayat kamar
            $kamar = array(
                'status' => 'KELUAR',
                'tanggal_keluar' => date("Y-m-d H:i:s"),
            );
            $where = array(
                'id_pelayanan' => $id_pelayanan,
                'status' => 'AKTIF',
            );
            $this->M_Kasir->update_tindakan($kamar, $where, 'riwayat_kamar');
            // $this->update_bed();
            // $out['status'] = "success";
            // echo json_encode($out);
        }


        if ($opsi == 'tunai') {
            $data = array(

                'diskon' => $diskon,
                'dp' => $dp,
                'total_harga' => $total,
                'total_bayar' => $total_harga,
                'tanggal' => date("Y-m-d H:i:s"),
                'id_staff' => $id_staff->id_staff,
                'ket' => 1,
            );
            $where = array('id_pelayanan' => $id_pelayanan);
            $datapel = array(
                'tgl_keluar' => $tgl_keluar,
                'status_rawat' => 'selesai'
            );

            if ($setara == 0) {
                $data2 = array(
                    'id_pendapatan_tunai_kasir' => $id_pendapatan_tunai_kasir,
                    'id_pelayanan' => $id_pelayanan,
                    'total_pendapatan' => $total,
                    'total_bayar' => $bayar_tunai,
                    'biaya_penyetaraan' => $setara,
                    'selisih' => $setara,
                    'tgl_input' => date("Y-m-d H:i:s"),
                    'diskon' => $diskon,
                    'dp' => $dp,
                    'keterangan' => "tunai",
                    'tgl_pulang' => $tgl_keluar,
                    'id_staff' => $id_staff->id_staff,
                    'status' => ""
                );
            } else {
                $data2 = array(
                    'id_pendapatan_tunai_kasir' => $id_pendapatan_tunai_kasir,
                    'id_pelayanan' => $id_pelayanan,
                    'total_pendapatan' => $total,
                    'total_bayar' => $bayar_tunai,
                    'biaya_penyetaraan' => $setara,
                    'selisih' => $setara - $total,
                    'tgl_input' => date("Y-m-d H:i:s"),
                    'diskon' => $diskon,
                    'dp' => $dp,
                    'keterangan' => "tunai",
                    'tgl_pulang' => $tgl_keluar,
                    'id_staff' => $id_staff->id_staff,
                    'status' => ""
                );
            }

            $data3 = array(
                'id_pendapatan_tunai' => uniqid(),
                'id_pendapatan_tunai_kasir' => $id_pendapatan_tunai_kasir,
                'total' => $total,
                'tgl_input' => date("Y-m-d H:i:s"),
                'status' => 0,
                'id_staff' => $id_staff->id_staff,
            );
            if ($bayar_tunai < $total) {
                $data4 = array(
                    'id_pendapatan_hutang_kasir' => $id_pendapatan_hutang_kasir,
                    'id_pelayanan' => $id_pelayanan,
                    'total_pendapatan' => $total - $bayar_tunai,
                    'tgl_input' => date("Y-m-d H:i:s"),
                    'diskon' => $diskon,
                    'dp' => $dp,
                    'keterangan' => "hutang",
                    'tgl_pulang' => $tgl_keluar,
                    'id_staff' => $id_staff->id_staff,
                    'status' => ""
                );

                $data5 = array(
                    'id' => uniqid(),
                    'id_pendapatan_hutang_kasir' => $id_pendapatan_hutang_kasir,
                    'total' => $total - $bayar_tunai,
                    'tgl_input' => date("Y-m-d H:i:s"),
                    'jenis_pembayaran' => "tunai",
                    'status' => 0,
                    'id_staff' => $id_staff->id_staff,
                    'id_penghutang' => $karyawantunai,
                );
                $this->M_Kasir->insert_tindakan($data4, 'pendapatan_hutang_kasir');
                $this->M_Kasir->insert_tindakan($data5, 'pendapatan_hutang');
            }
            $this->M_Kasir->update_tindakan($datapel, $where, 'pelayanan');
            $this->M_Kasir->update_tindakan($data, $where, 'deatail_kasir');
            $this->M_Kasir->insert_tindakan($data2, 'pendapatan_tunai_kasir');
            $this->M_Kasir->insert_tindakan($data3, 'pendapatan_tunai');
            $out['status'] = "success";
            echo json_encode($out);
        } elseif ($opsi == 'non-tunai') {
            $data = array(

                'diskon' => $diskon,
                'dp' => $dp,
                'total_harga' => $total,
                'total_bayar' => $total_harga,
                'tanggal' => date("Y-m-d H:i:s"),
                'id_staff' => $id_staff->id_staff,
                'ket' => 1,
            );
            $where = array('id_pelayanan' => $id_pelayanan);
            $datapel = array(
                'tgl_keluar' => $tgl_keluar,
                'status_rawat' => 'selesai'
            );

            if ($opsi_lanjut == 'transfer') {
                $data2 = array(
                    'id_pendapatan_bank' => $id_pendapatan_bank,
                    'id_pelayanan' => $id_pelayanan,
                    'total_pendapatan' => $total,
                    'jenis_pembayaran' => $opsi_lanjut,
                    'cara_bayar' => $jenis_bank,
                    'tgl_input' => date("Y-m-d H:i:s"),
                    'diskon' => $diskon,
                    'dp' => $dp,
                    'keterangan' => "non-tunai",
                    'tgl_pulang' => $tgl_keluar,
                    'id_staff' => $id_staff->id_staff,
                    'status' => ""
                );

                $data3 = array(
                    'id_pendapatan_nontunai' => uniqid(),
                    'id_pendapatan_nontunai_kasir' => $id_pendapatan_bank,
                    'jenis_pembayaran' => $opsi_lanjut,
                    'cara_bayar' => $jenis_bank,
                    'tgl_input' => date("Y-m-d H:i:s"),
                    'total' => $total,
                    'status' => 0,
                    'id_staff' => $id_staff->id_staff,
                );

                $this->M_Kasir->insert_tindakan($data2, 'pendapatan_bank');
                $this->M_Kasir->insert_tindakan($data3, 'pendapatan_nontunai');
            } elseif ($opsi_lanjut == 'asuransi') {
                if ($inBayarAIA == 0) {
                    $data2 = array(
                        'id_pendapatan_nontunai_kasir' => $id_pendapatan_nontunai_kasir,
                        'id_pelayanan' => $id_pelayanan,
                        'total_pendapatan' => $total,
                        'jenis_pembayaran' => $opsi_lanjut,
                        'cara_bayar' => $jenis_asuransi,
                        'tgl_input' => date("Y-m-d H:i:s"),
                        'diskon' => $diskon,
                        'dp' => $dp,
                        'keterangan' => "piutang",
                        'tgl_pulang' => $tgl_keluar,
                        'id_staff' => $id_staff->id_staff,
                        'status' => ""
                    );
                } else {
                    $data2 = array(
                        'id_pendapatan_nontunai_kasir' => $id_pendapatan_nontunai_kasir,
                        'id_pelayanan' => $id_pelayanan,
                        'total_pendapatan' => $total - $inBayarAIA,
                        'jenis_pembayaran' => $opsi_lanjut,
                        'cara_bayar' => $jenis_asuransi,
                        'tgl_input' => date("Y-m-d H:i:s"),
                        'diskon' => $diskon,
                        'dp' => $dp,
                        'keterangan' => "piutang",
                        'tgl_pulang' => $tgl_keluar,
                        'id_staff' => $id_staff->id_staff,
                        'status' => ""
                    );
                }


                $data3 = array(
                    'id_pendapatan_nontunai' => uniqid(),
                    'id_pendapatan_nontunai_kasir' => $id_pendapatan_nontunai_kasir,
                    'jenis_pembayaran' => $opsi_lanjut,
                    'cara_bayar' => $jenis_asuransi,
                    'tgl_input' => date("Y-m-d H:i:s"),
                    'total' => $total,
                    'status' => 0,
                    'id_staff' => $id_staff->id_staff,
                );

                $this->M_Kasir->insert_tindakan($data2, 'pendapatan_nontunai_kasir');
                $this->M_Kasir->insert_tindakan($data3, 'pendapatan_nontunai');

                if ($opsi_bayar_aia == 'tunaiAIA') {
                    if ($setara2 == 0) {
                        $data4 = array(
                            'id_pendapatan_tunai_kasir' => $id_pendapatan_tunai_kasir,
                            'id_pelayanan' => $id_pelayanan,
                            'total_pendapatan' => $total2,
                            'total_bayar' => $inBayarAIA,
                            'biaya_penyetaraan' => $setara2,
                            'selisih' => $setara2,
                            'tgl_input' => date("Y-m-d H:i:s"),
                            'diskon' => $diskon,
                            'dp' => $dp,
                            'keterangan' => "tunai",
                            'tgl_pulang' => $tgl_keluar,
                            'id_staff' => $id_staff->id_staff,
                            'status' => ""
                        );
                    } else {
                        $data4 = array(
                            'id_pendapatan_tunai_kasir' => $id_pendapatan_tunai_kasir,
                            'id_pelayanan' => $id_pelayanan,
                            'total_pendapatan' => $total2,
                            'total_bayar' => $inBayarAIA,
                            'biaya_penyetaraan' => $setara2,
                            'selisih' => $setara2 - $total2,
                            'tgl_input' => date("Y-m-d H:i:s"),
                            'diskon' => $diskon,
                            'dp' => $dp,
                            'keterangan' => "tunai",
                            'tgl_pulang' => $tgl_keluar,
                            'id_staff' => $id_staff->id_staff,
                            'status' => ""
                        );
                    }


                    $data5 = array(
                        'id_pendapatan_tunai' => uniqid(),
                        'id_pendapatan_tunai_kasir' => $id_pendapatan_tunai_kasir,
                        'total' => $total,
                        'tgl_input' => date("Y-m-d H:i:s"),
                        'status' => 0,
                        'id_staff' => $id_staff->id_staff,
                    );
                    $this->M_Kasir->insert_tindakan($data4, 'pendapatan_tunai_kasir');
                    $this->M_Kasir->insert_tindakan($data5, 'pendapatan_tunai');
                } elseif ($opsi_bayar_aia == 'hutangAIA') {
                    $data4 = array(
                        'id_pendapatan_hutang_kasir' => $id_pendapatan_hutang_kasir,
                        'id_pelayanan' => $id_pelayanan,
                        'total_pendapatan' => $total,
                        'tgl_input' => date("Y-m-d H:i:s"),
                        'diskon' => $diskon,
                        'dp' => $dp,
                        'keterangan' => "hutang",
                        'tgl_pulang' => $tgl_keluar,
                        'id_staff' => $id_staff->id_staff,
                        'status' => ""
                    );

                    $data5 = array(
                        'id' => uniqid(),
                        'id_pendapatan_hutang_kasir' => $id_pendapatan_hutang_kasir,
                        'total' => $total,
                        'tgl_input' => date("Y-m-d H:i:s"),
                        'jenis_pembayaran' => "hutang",
                        'status' => 0,
                        'id_staff' => $id_staff->id_staff,
                        'id_penghutang' => $hutangAIA,
                    );

                    $this->M_Kasir->insert_tindakan($data4, 'pendapatan_hutang_kasir');
                    $this->M_Kasir->insert_tindakan($data5, 'pendapatan_hutang');
                }
            }

            $this->M_Kasir->update_tindakan($data, $where, 'deatail_kasir');
            $this->M_Kasir->update_tindakan($datapel, $where, 'pelayanan');


            $out['status'] = "success";
            ////$this->update_bed();
            echo json_encode($out);
        } elseif ($opsi == 'hutang') {
            $data = array(

                'diskon' => $diskon,
                'dp' => $dp,
                'total_harga' => $total,
                'total_bayar' => $total_harga,
                'tanggal' => date("Y-m-d H:i:s"),
                'id_staff' => $id_staff->id_staff,
                'ket' => 1,
            );
            $where = array('id_pelayanan' => $id_pelayanan);
            $datapel = array(
                'tgl_keluar' => $tgl_keluar,
                'status_rawat' => 'selesai'
            );

            $data2 = array(
                'id_pendapatan_hutang_kasir' => $id_pendapatan_hutang_kasir,
                'id_pelayanan' => $id_pelayanan,
                'total_pendapatan' => $total,
                'tgl_input' => date("Y-m-d H:i:s"),
                'diskon' => $diskon,
                'dp' => $dp,
                'keterangan' => "hutang",
                'tgl_pulang' => $tgl_keluar,
                'id_staff' => $id_staff->id_staff,
                'status' => ""
            );

            $data3 = array(
                'id' => uniqid(),
                'id_pendapatan_hutang_kasir' => $id_pendapatan_hutang_kasir,
                'total' => $total,
                'tgl_input' => date("Y-m-d H:i:s"),
                'jenis_pembayaran' => "hutang",
                'status' => 0,
                'id_staff' => $id_staff->id_staff,
                'id_penghutang' => $hutang,
            );

            $this->M_Kasir->update_tindakan($data, $where, 'deatail_kasir');
            $this->M_Kasir->insert_tindakan($data2, 'pendapatan_hutang_kasir');
            $this->M_Kasir->insert_tindakan($data3, 'pendapatan_hutang');
            $this->M_Kasir->update_tindakan($datapel, $where, 'pelayanan');

            $out['status'] = "success";
            echo json_encode($out);
        } else {
            $out['status'] = "success";
            echo json_encode($out);
        }
    }

    public function tampil_tunai_kasir()
    {
        $tgl = date("Y-m-d");

        $page_data = $this->M_Kasir->getKasir('pendapatan_tunai_kasir');


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $time = strtotime($page_data[$i]->tgl_input);
            $date = strftime("%A, %d %B %Y ", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_input = $date;
            $waktu;
            $total = "Rp. " . number_format(($page_data[$i]->total_pendapatan), 0, ',', '.');
            $diskon = "Rp. " . number_format(($page_data[$i]->diskon), 0, ',', '.');
            $dp = "Rp. " . number_format(($page_data[$i]->dp), 0, ',', '.');
            $bayar = "Rp. " . number_format(($page_data[$i]->total_bayar), 0, ',', '.');
            $setara = "Rp. " . number_format(($page_data[$i]->biaya_penyetaraan), 0, ',', '.');
            $selisih = "Rp. " . number_format(($page_data[$i]->selisih), 0, ',', '.');
            $keterangan = $page_data[$i]->keterangan;
            $tgl_pulang = $page_data[$i]->tgl_pulang;
            $id_staff = $page_data[$i]->nama;

            $out[$i] = array($no, $tgl_input, $waktu, $total, $diskon, $dp, $bayar, $setara, $selisih, $keterangan, $tgl_pulang, $id_staff);
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

    public function tampil_range_tunai_kasir()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Kasir->getRangeKasir($mulai, $akhir, 'pendapatan_tunai_kasir');


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $time = strtotime($page_data[$i]->tgl_input);
            $date = strftime("%A, %d %B %Y ", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_input = $date;
            $waktu;
            $total = "Rp. " . number_format(($page_data[$i]->total_pendapatan), 0, ',', '.');
            $diskon = "Rp. " . number_format(($page_data[$i]->diskon), 0, ',', '.');
            $dp = "Rp. " . number_format(($page_data[$i]->dp), 0, ',', '.');
            $bayar = "Rp. " . number_format(($page_data[$i]->total_bayar), 0, ',', '.');
            $setara = "Rp. " . number_format(($page_data[$i]->biaya_penyetaraan), 0, ',', '.');
            $selisih = "Rp. " . number_format(($page_data[$i]->selisih), 0, ',', '.');
            $keterangan = $page_data[$i]->keterangan;
            $tgl_pulang = $page_data[$i]->tgl_pulang;
            $id_staff = $page_data[$i]->id_staff;

            $out[$i] = array($no, $tgl_input, $waktu, $total, $diskon, $dp, $bayar, $setara, $selisih, $keterangan, $tgl_pulang, $id_staff);
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

    public function tampil_hutang_kasir()
    {
        $tgl = date("Y-m-d");

        $page_data = $this->M_Kasir->getKasir('pendapatan_hutang_kasir');


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $time = strtotime($page_data[$i]->tgl_input);
            $date = strftime("%A, %d %B %Y ", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_input = $date;
            $waktu;
            $total = "Rp. " . number_format(($page_data[$i]->total_pendapatan), 0, ',', '.');
            $diskon = "Rp. " . number_format(($page_data[$i]->diskon), 0, ',', '.');
            $dp = "Rp. " . number_format(($page_data[$i]->dp), 0, ',', '.');
            $keterangan = $page_data[$i]->keterangan;
            $tgl_pulang = $page_data[$i]->tgl_pulang;
            $id_staff = $page_data[$i]->id_staff;

            $out[$i] = array($no, $tgl_input, $waktu, $total, $diskon, $dp, $keterangan, $tgl_pulang, $id_staff);
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

    public function tampil_range_hutang_kasir()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Kasir->getRangeKasir($mulai, $akhir, 'pendapatan_hutang_kasir');


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $time = strtotime($page_data[$i]->tgl_input);
            $date = strftime("%A, %d %B %Y ", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_input = $date;
            $waktu;
            $total = "Rp. " . number_format(($page_data[$i]->total_pendapatan), 0, ',', '.');
            $diskon = "Rp. " . number_format(($page_data[$i]->diskon), 0, ',', '.');
            $dp = "Rp. " . number_format(($page_data[$i]->dp), 0, ',', '.');
            $keterangan = $page_data[$i]->keterangan;
            $tgl_pulang = $page_data[$i]->tgl_pulang;
            $id_staff = $page_data[$i]->id_staff;

            $out[$i] = array($no, $tgl_input, $waktu, $total, $diskon, $dp, $keterangan, $tgl_pulang, $id_staff);
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

    public function tampil_nontunai_kasir()
    {
        $tgl = date("Y-m-d");

        $page_data = $this->M_Kasir->getKasir('pendapatan_nontunai_kasir');


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $time = strtotime($page_data[$i]->tgl_input);
            $date = strftime("%A, %d %B %Y ", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_input = $date;
            $waktu;
            $total = "Rp. " . number_format(($page_data[$i]->total_pendapatan), 0, ',', '.');
            $pembayaran = $page_data[$i]->jenis_pembayaran;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diskon = "Rp. " . number_format(($page_data[$i]->diskon), 0, ',', '.');
            $dp = "Rp. " . number_format(($page_data[$i]->dp), 0, ',', '.');
            $keterangan = $page_data[$i]->keterangan;
            $tgl_pulang = $page_data[$i]->tgl_pulang;
            $id_staff = $page_data[$i]->id_staff;

            $out[$i] = array($no, $tgl_input, $waktu, $total, $pembayaran, $cara_bayar, $diskon, $dp, $keterangan, $tgl_pulang, $id_staff);
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

    public function tampil_range_nontunai_kasir()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Kasir->getRangeKasir($mulai, $akhir, 'pendapatan_nontunai_kasir');


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $time = strtotime($page_data[$i]->tgl_input);
            $date = strftime("%A, %d %B %Y ", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_input = $date;
            $waktu;
            $total = "Rp. " . number_format(($page_data[$i]->total_pendapatan), 0, ',', '.');
            $pembayaran = $page_data[$i]->jenis_pembayaran;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diskon = "Rp. " . number_format(($page_data[$i]->diskon), 0, ',', '.');
            $dp = "Rp. " . number_format(($page_data[$i]->dp), 0, ',', '.');
            $keterangan = $page_data[$i]->keterangan;
            $tgl_pulang = $page_data[$i]->tgl_pulang;
            $id_staff = $page_data[$i]->id_staff;

            $out[$i] = array($no, $tgl_input, $waktu, $total, $pembayaran, $cara_bayar, $diskon, $dp, $keterangan, $tgl_pulang, $id_staff);
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

    public function tampil_bank_kasir()
    {
        $tgl = date("Y-m-d");

        $page_data = $this->M_Kasir->getKasir('pendapatan_bank');


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $time = strtotime($page_data[$i]->tgl_input);
            $date = strftime("%A, %d %B %Y ", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_input = $date;
            $waktu;
            $total = "Rp. " . number_format(($page_data[$i]->total_pendapatan), 0, ',', '.');
            $pembayaran = $page_data[$i]->jenis_pembayaran;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diskon = "Rp. " . number_format(($page_data[$i]->diskon), 0, ',', '.');
            $dp = "Rp. " . number_format(($page_data[$i]->dp), 0, ',', '.');
            $keterangan = $page_data[$i]->keterangan;
            $tgl_pulang = $page_data[$i]->tgl_pulang;
            $id_staff = $page_data[$i]->id_staff;

            $out[$i] = array($no, $tgl_input, $waktu, $total, $pembayaran, $cara_bayar, $diskon, $dp, $keterangan, $tgl_pulang, $id_staff);
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

    public function tampil_range_bank_kasir()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Kasir->getRangeKasir($mulai, $akhir, 'pendapatan_bank');


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $time = strtotime($page_data[$i]->tgl_input);
            $date = strftime("%A, %d %B %Y ", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_input = $date;
            $waktu;
            $total = "Rp. " . number_format(($page_data[$i]->total_pendapatan), 0, ',', '.');
            $pembayaran = $page_data[$i]->jenis_pembayaran;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $diskon = "Rp. " . number_format(($page_data[$i]->diskon), 0, ',', '.');
            $dp = "Rp. " . number_format(($page_data[$i]->dp), 0, ',', '.');
            $keterangan = $page_data[$i]->keterangan;
            $tgl_pulang = $page_data[$i]->tgl_pulang;
            $id_staff = $page_data[$i]->id_staff;

            $out[$i] = array($no, $tgl_input, $waktu, $total, $pembayaran, $cara_bayar, $diskon, $dp, $keterangan, $tgl_pulang, $id_staff);
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

    public function getTotal()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data['data_pelayanan'] = $this->M_Kasir->list_pelayanan_pasien($id_pelayanan);
        $data['data_apotik'] = $this->M_Kasir->list_apotik_pasien($id_pelayanan);
        $data['data_operasi'] = $this->M_Kasir->list_operasi_pasien($id_pelayanan);
        $data['data_igd'] = $this->M_Kasir->list_igd_pasien($id_pelayanan);
        $data['data_labor'] = $this->M_Kasir->list_labor_pasien($id_pelayanan);
        $data['data_radio'] = $this->M_Kasir->list_radio_pasien($id_pelayanan);
        $data['data_anak'] = $this->M_Kasir->list_anak_pasien($id_pelayanan);
        $data['data_apelkes'] = $this->M_Kasir->list_apelkes_pasien($id_pelayanan);
        $data['data_internis'] = $this->M_Kasir->list_internis_pasien($id_pelayanan);
        $data['data_bedah'] = $this->M_Kasir->list_bedah_pasien($id_pelayanan);
        $data['data_fisio'] = $this->M_Kasir->list_fisio_pasien($id_pelayanan);
        $data['data_gigi'] = $this->M_Kasir->list_gigi_pasien($id_pelayanan);
        $data['data_jantung'] = $this->M_Kasir->list_jantung_pasien($id_pelayanan);
        $data['data_kulit'] = $this->M_Kasir->list_kulit_pasien($id_pelayanan);
        $data['data_mata'] = $this->M_Kasir->list_mata_pasien($id_pelayanan);
        $data['data_obgyne'] = $this->M_Kasir->list_obgyne_pasien($id_pelayanan);
        $data['data_ok'] = $this->M_Kasir->list_ok_pasien($id_pelayanan);
        $data['data_tht'] = $this->M_Kasir->list_tht_pasien($id_pelayanan);
        $data['data_umum'] = $this->M_Kasir->list_umum_pasien($id_pelayanan);
        $data['apotik'] = $this->M_Kasir->total_apotik($id_pelayanan);
        $data['obatok'] = $this->M_Kasir->total_operasi($id_pelayanan);
        $data['igd'] = $this->M_Kasir->total_igd($id_pelayanan);
        $data['labor'] = $this->M_Kasir->total_labor($id_pelayanan);
        $data['radio'] = $this->M_Kasir->total_radio($id_pelayanan);
        $data['anak'] = $this->M_Kasir->total_anak($id_pelayanan);
        $data['apelkes'] = $this->M_Kasir->total_apelkes($id_pelayanan);
        $data['internis'] = $this->M_Kasir->total_internis($id_pelayanan);
        $data['bedah'] = $this->M_Kasir->total_bedah($id_pelayanan);
        $data['fisio'] = $this->M_Kasir->total_fisio($id_pelayanan);
        $data['gigi'] = $this->M_Kasir->total_gigi($id_pelayanan);
        $data['jantung'] = $this->M_Kasir->total_jantung($id_pelayanan);
        $data['kulit'] = $this->M_Kasir->total_kulit($id_pelayanan);
        $data['mata'] = $this->M_Kasir->total_mata($id_pelayanan);
        $data['obgyne'] = $this->M_Kasir->total_obgyne($id_pelayanan);
        $data['ok'] = $this->M_Kasir->total_ok($id_pelayanan);
        $data['tht'] = $this->M_Kasir->total_tht($id_pelayanan);
        $data['umum'] = $this->M_Kasir->total_umum($id_pelayanan);


        $out =  $data;
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function getCaraBayar()
    {
        $id = $this->input->post('id_pelayanan');
        $data = $this->M_Kasir->getCaraBayar($id);
        echo json_encode($data);
    }

    public function insertDetailKasir()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        $data_pelayanan = $this->M_Kasir->list_pelayanan_pasien($id_pelayanan);
        $data_apotik = $this->M_Kasir->list_apotik_pasien($id_pelayanan);
        $data_operasi = $this->M_Kasir->list_operasi_pasien($id_pelayanan);
        $data_igd = $this->M_Kasir->list_igd_pasien($id_pelayanan);
        $data_labor = $this->M_Kasir->list_labor_pasien($id_pelayanan);
        $data_radio = $this->M_Kasir->list_radio_pasien($id_pelayanan);
        $data_anak = $this->M_Kasir->list_anak_pasien($id_pelayanan);
        $data_apelkes = $this->M_Kasir->list_apelkes_pasien($id_pelayanan);
        $data_internis = $this->M_Kasir->list_internis_pasien($id_pelayanan);
        $data_bedah = $this->M_Kasir->list_bedah_pasien($id_pelayanan);
        $data_fisio = $this->M_Kasir->list_fisio_pasien($id_pelayanan);
        $data_gigi = $this->M_Kasir->list_gigi_pasien($id_pelayanan);
        $data_jantung = $this->M_Kasir->list_jantung_pasien($id_pelayanan);
        $data_kulit = $this->M_Kasir->list_kulit_pasien($id_pelayanan);
        $data_mata = $this->M_Kasir->list_mata_pasien($id_pelayanan);
        $data_obgyne = $this->M_Kasir->list_obgyne_pasien($id_pelayanan);
        $data_ok = $this->M_Kasir->list_ok_pasien($id_pelayanan);
        $data_tht = $this->M_Kasir->list_tht_pasien($id_pelayanan);
        $data_umum = $this->M_Kasir->list_umum_pasien($id_pelayanan);

        if (count($data_pelayanan) > 0) {
            $total_pelayanan = array_sum($this->M_Kasir->total_pelayanan_pasien($id_pelayanan));
        } else {
            $total_pelayanan = 0;
        }

        if (count($data_apotik) > 0) {
            $apotik = array_sum($this->M_Kasir->total_apotik($id_pelayanan));
        } else {
            $apotik = 0;
        }

        if (count($data_operasi) > 0) {
            $obatok = array_sum($this->M_Kasir->total_operasi($id_pelayanan));
        } else {
            $obatok = 0;
        }

        if (count($data_igd) > 0) {
            $igd = array_sum($this->M_Kasir->total_igd($id_pelayanan));
        } else {
            $igd = 0;
        }

        if (count($data_labor) > 0) {
            $labor = array_sum($this->M_Kasir->total_labor($id_pelayanan));
        } else {
            $labor = 0;
        }

        if (count($data_radio) > 0) {
            $radio = array_sum($this->M_Kasir->total_radio($id_pelayanan));
        } else {
            $radio = 0;
        }

        if (count($data_anak) > 0) {
            $anak = array_sum($this->M_Kasir->total_anak($id_pelayanan));
        } else {
            $anak = 0;
        }

        if (count($data_apelkes) > 0) {
            $apelkes = array_sum($this->M_Kasir->total_apelkes($id_pelayanan));
        } else {
            $apelkes = 0;
        }

        if (count($data_bedah) > 0) {
            $bedah = array_sum($this->M_Kasir->total_bedah($id_pelayanan));
        } else {
            $bedah = 0;
        }

        if (count($data_fisio) > 0) {
            $fisio = array_sum($this->M_Kasir->total_fisio($id_pelayanan));
        } else {
            $fisio = 0;
        }

        if (count($data_gigi) > 0) {
            $gigi = array_sum($this->M_Kasir->total_gigi($id_pelayanan));
        } else {
            $gigi = 0;
        }

        if (count($data_mata) > 0) {
            $mata = array_sum($this->M_Kasir->total_mata($id_pelayanan));
        } else {
            $mata = 0;
        }

        if (count($data_obgyne) > 0) {
            $obgyne = array_sum($this->M_Kasir->total_obgyne($id_pelayanan));
        } else {
            $obgyne = 0;
        }

        if (count($data_ok) > 0) {
            $ok = array_sum($this->M_Kasir->total_ok($id_pelayanan));
        } else {
            $ok = 0;
        }

        if (count($data_tht) > 0) {
            $tht = array_sum($this->M_Kasir->total_tht($id_pelayanan));
        } else {
            $tht = 0;
        }

        if (count($data_kulit) > 0) {
            $kulit = array_sum($this->M_Kasir->total_kulit($id_pelayanan));
        } else {
            $kulit = 0;
        }

        if (count($data_jantung) > 0) {
            $jantung = array_sum($this->M_Kasir->total_jantung($id_pelayanan));
        } else {
            $jantung = 0;
        }

        if (count($data_internis) > 0) {
            $internis = array_sum($this->M_Kasir->total_internis($id_pelayanan));
        } else {
            $internis = 0;
        }

        if (count($data_umum) > 0) {
            $umum = array_sum($this->M_Kasir->total_umum($id_pelayanan));
        } else {
            $umum = 0;
        }

        $total_semua = $total_pelayanan + $apotik + $obatok + $igd + $labor + $radio + $anak + $apelkes + $bedah + $fisio + $gigi + $mata + $obgyne + $ok + $tht + $kulit + $jantung + $internis + $umum;

        $data_staff = $this->session->userdata('data_auth');
        $diskon = $this->input->post('diskon');
        $dp = $this->input->post('dp');
        $tgl_keluar = $this->input->post('tgl_keluar');
        $page_data = $this->M_Kasir->getDetailKasir($id_pelayanan);
        if (!empty($page_data)) {
            $data = array(
                'diskon' => $diskon,
                'dp' => $dp,
                'total_harga' => $total_semua,
                'total_bayar' => $total_semua - $dp - $diskon,
                'tanggal' => date("Y-m-d H:i:s"),
                'tanggal_keluar' => $tgl_keluar,
                'id_staff' => $data_staff->id_staff,
                'status' => 1,
            );
            $where = array(
                'id_pelayanan' => $id_pelayanan,
            );
            $this->M_Kasir->update_tindakan($data, $where, 'deatail_kasir');
            $out['status'] = "success";
        } else {
            $data = array(
                'id_pelayanan' => $id_pelayanan,
                'diskon' => $diskon,
                'dp' => $dp,
                'total_harga' => $total_semua,
                'total_bayar' => $total_semua - $dp - $diskon,
                'tanggal' => date("Y-m-d H:i:s"),
                'tanggal_keluar' => $tgl_keluar,
                'id_staff' => $data_staff->id_staff,
                'status' => 1,
            );
            $this->M_Kasir->insert_tindakan($data, 'deatail_kasir');
            $out['status'] = "success";
        }

        echo json_encode($out);
    }

    public function Pendapatan_tunai()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pendapatan_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_pendapatan()
    {
        $page_data = $this->M_Kasir->getPendapatan();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {



            if ($page_data[$i]->status == 0) {
                $status = '<span class="label label-default">Dibuat</span>';

                $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick=' hapus(\"" . $page_data[$i]->id_pendapatan . "\")' '><i class='icon-trash '></i></button>";
                $pilih =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampil_list(\"" . $page_data[$i]->id_pendapatan . "\")' '><i class='icon-note '></i></button>";
                $approve =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick=' approve(\"" . $page_data[$i]->id_pendapatan . "\")' '><i class='icon-like '></i></button>";
            } else if ($page_data[$i]->status == 1) {
                $status = '<span class="label label-warning">Diproses</span>';

                $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'><i class='fa fa-minus '></i></button>";
                $pilih =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'><i class='fa fa-minus '></i></button>";
                $approve =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick=' batal_approve(\"" . $page_data[$i]->id_pendapatan . "\")' '><i class='icon-dislike '></i></button>";
            }

            $time = strtotime($page_data[$i]->tgl_input);
            $date = strftime("%A, %d %B %Y ", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_input = $date;
            $waktu;
            $total = "Rp. " . number_format(($page_data[$i]->total_pendapatan), 0, ',', '.');
            $total2 = "Rp. " . number_format(($page_data[$i]->total_pendapatan_manual), 0, ',', '.');
            $keterangan = $page_data[$i]->keterangan;
            $nama = $page_data[$i]->nama;
            $id_staff = $page_data[$i]->staff;

            $out[$i] = array($no, $pilih, $approve, $hapus, $tgl_input, $waktu, $nama, $total, $total2, $status, $id_staff);
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

    public function insert_Pendapatan()
    {
        $count = $this->M_Kasir->getPendapatan1();
        $c = $count + 1;
        $id_staff = $this->session->userdata("data_auth");

        $data = array(
            'id_pendapatan' => uniqid(),
            'nama' => "Faktur Pendapatan " . $c,
            'total_pendapatan' => 0,
            'total_pendapatan_manual' => $this->input->post('total'),
            'keterangan' => $this->input->post('ket'),
            'tgl_input' => date("Y-m-d H:i:s"),
            'id_staff' => $id_staff->id_staff,
            'ket' => 0
        );
        $this->M_Kasir->insert_tindakan($data, 'pendapatan');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_list_pasien()
    {
        $id_pendapatan = $this->input->post('id_pendapatan');
        $page_data = $this->M_Kasir->getPasienTunai();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $poli = $this->M_Kasir->cekIDPelayanan($page_data[$i]->id_pelayanan);
            $ugd = $this->M_Kasir->cekIDPelayananUGD($page_data[$i]->id_pelayanan);
            $ranap = $this->M_Kasir->cekIDPelayananRanap($page_data[$i]->id_pelayanan);

            $no = $i + 1;
            $tombol =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick=' tambahList(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $id_pendapatan . "\")' '><i class='icon-plus'></i></button>";

            if (count($poli) > 0) {
                if (count($ranap) > 0) {
                    for ($j = 0; $j < count($ranap); $j++) {
                        $jenis_pelayanan = $ranap[$j]->jenis_pelayanan;
                        $dokter = $ranap[$j]->nama;
                    }
                } else {
                    for ($k = 0; $k < count($poli); $k++) {
                        $jenis_pelayanan = $poli[$k]->jenis_pelayanan;
                        $dokter = $poli[$k]->nama;
                    }
                }
            } elseif (count($ugd) > 0) {
                if (count($ranap) > 0) {
                    for ($l = 0; $l < count($ranap); $l++) {
                        $jenis_pelayanan = $ranap[$l]->jenis_pelayanan;
                        $dokter = $ranap[$l]->nama;
                    }
                } else {
                    for ($m = 0; $m < count($ugd); $m++) {
                        $jenis_pelayanan = $ugd[$m]->jenis_pelayanan;
                        $dokter = $ugd[$m]->nama;
                    }
                }
            } else {
                $jenis_pelayanan = "-";
                $dokter = "-";
            }

            $time = strtotime($page_data[$i]->tgl_keluar);
            $tgl = strftime("%A, %d %B %Y", $time);
            //$tgl_keluar = $page_data[$i]->tgl_keluar;
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
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

            $caraBayar = $page_data[$i]->bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tombol, $tgl, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $caraBayar, $diagnosa, $dokter);
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

    public function tampil_list_isi_pasien()
    {
        $id_pendapatan = $this->input->post('id_pendapatan');
        $page_data = $this->M_Kasir->getIsiPasienTunai($id_pendapatan);
        $cek = $this->M_Kasir->cekStatusPendapatan($id_pendapatan);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $poli = $this->M_Kasir->cekIDPelayanan($page_data[$i]->id_pelayanan);
            $ugd = $this->M_Kasir->cekIDPelayananUGD($page_data[$i]->id_pelayanan);
            $ranap = $this->M_Kasir->cekIDPelayananRanap($page_data[$i]->id_pelayanan);

            $no = $i + 1;
            if (count($cek) == 0) {
                $tombol = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick=' hapusList(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $id_pendapatan . "\")' '><i class='fa fa-minus'></i></button>";
            } else {
                $tombol = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'><i class='fa fa-minus '></i></button>";
            }


            if (count($poli) > 0) {
                if (count($ranap) > 0) {
                    for ($j = 0; $j < count($ranap); $j++) {
                        $jenis_pelayanan = $ranap[$j]->jenis_pelayanan;
                        $dokter = $ranap[$j]->nama;
                    }
                } else {
                    for ($k = 0; $k < count($poli); $k++) {
                        $jenis_pelayanan = $poli[$k]->jenis_pelayanan;
                        $dokter = $poli[$k]->nama;
                    }
                }
            } elseif (count($ugd) > 0) {
                if (count($ranap) > 0) {
                    for ($l = 0; $l < count($ranap); $l++) {
                        $jenis_pelayanan = $ranap[$l]->jenis_pelayanan;
                        $dokter = $ranap[$l]->nama;
                    }
                } else {
                    for ($m = 0; $m < count($ugd); $m++) {
                        $jenis_pelayanan = $ugd[$m]->jenis_pelayanan;
                        $dokter = $ugd[$m]->nama;
                    }
                }
            } else {
                $jenis_pelayanan = "-";
                $dokter = "-";
            }

            $time = strtotime($page_data[$i]->tgl_keluar);
            $tgl = strftime("%A, %d %B %Y", $time);
            //$tgl_keluar = $page_data[$i]->tgl_keluar;
            $waktu = strftime("%H:%M WIB", $time);
            $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
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

            $caraBayar = $page_data[$i]->bayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $out[$i] = array($no, $tombol, $tgl, $no_rm, $pasien, $jk, $tgl2, $umur, $jenis_pelayanan, $caraBayar, $diagnosa, $dokter);
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

    public function tampil_total_harga()
    {
        $id_pendapatan = $this->input->post('id_pendapatan');
        $page_data = $this->M_Kasir->HitungTotal($id_pendapatan);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $total  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $out[$i] = array($total);
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

    public function hapus_list_pendapatan()
    {
        $id_pendapatan = $this->input->post('id_pendapatan');

        $where = array('id_pendapatan' => $id_pendapatan);
        $data = array('ket' => 1);
        $this->M_Kasir->update_tindakan($data, $where, 'pendapatan');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function approve_pendapatan()
    {
        $id_pendapatan = $this->input->post('id_pendapatan');

        $where = array('id_pendapatan' => $id_pendapatan);
        $data = array('status' => 1);
        $this->M_Kasir->update_tindakan($data, $where, 'pendapatan');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function batal_approve_pendapatan()
    {
        $id_pendapatan = $this->input->post('id_pendapatan');

        $where = array('id_pendapatan' => $id_pendapatan);
        $data = array('status' => 0);
        $this->M_Kasir->update_tindakan($data, $where, 'pendapatan');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tambah_list_pendapatan()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_pendapatan = $this->input->post('id_pendapatan');

        $data = array('status' => $id_pendapatan);
        $where = array('id_pelayanan' => $id_pelayanan);

        $this->M_Kasir->update_tindakan($data, $where, 'Pendapatan_tunai_kasir');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function hapus_isi_list_pendapatan()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_pendapatan = $this->input->post('id_pendapatan');

        $data = array('status' => "");
        $where = array('id_pelayanan' => $id_pelayanan);

        $this->M_Kasir->update_tindakan($data, $where, 'Pendapatan_tunai_kasir');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function simPanTotalPendapatan()
    {
        $id_pendapatan = $this->input->post('id_pendapatan');

        $totbar = array_sum($this->M_Kasir->GetTotal($id_pendapatan));

        $total = 0 + $totbar;
        $data2 = array('total_pendapatan' => $total);
        $where2 = array('id_pendapatan' => $id_pendapatan);

        $this->M_Kasir->update_tindakan($data2, $where2, 'pendapatan');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function Laporan_pendapatan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pendapatan_kasir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_laporan_pendapatan()
    {
        $page_data = $this->M_Kasir->getLaporanPendapatan();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {



            if ($page_data[$i]->status == 1) {
                $status = '<span class="label label-warning">Diproses</span>';

                $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick=' hapus(\"" . $page_data[$i]->id_pendapatan . "\")' '><i class='icon-trash '></i></button>";
                $pilih =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampil_list(\"" . $page_data[$i]->id_pendapatan . "\")' '><i class='icon-note '></i></button>";
            } else if ($page_data[$i]->status == 2) {
                $status = '<span class="label label-success">Disetujui</span>';

                $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'><i class='fa fa-minus '></i></button>";
                $pilih =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'><i class='fa fa-minus '></i></button>";
            }

            $time = strtotime($page_data[$i]->tgl_input);
            $date = strftime("%A, %d %B %Y ", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_input = $date;
            $waktu;
            $total = "Rp. " . number_format(($page_data[$i]->total_pendapatan), 0, ',', '.');
            $total2 = "Rp. " . number_format(($page_data[$i]->total_pendapatan_manual), 0, ',', '.');
            $keterangan = $page_data[$i]->keterangan;
            $nama = $page_data[$i]->nama;
            $id_staff = $page_data[$i]->staff;

            $out[$i] = array($no, $pilih, $hapus, $tgl_input, $waktu, $nama, $total, $total2, $status, $id_staff);
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

    public function tampil_range_laporan_pendapatan()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Kasir->getRangeLaporanPendapatan($mulai, $akhir);


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {



            if ($page_data[$i]->status == 1) {
                $status = '<span class="label label-warning">Diproses</span>';

                $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick=' hapus(\"" . $page_data[$i]->id_pendapatan . "\")' '><i class='icon-trash '></i></button>";
                $pilih =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick=' tampil_list(\"" . $page_data[$i]->id_pendapatan . "\")' '><i class='icon-note '></i></button>";
            } else if ($page_data[$i]->status == 2) {
                $status = '<span class="label label-success">Disetujui</span>';

                $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'><i class='fa fa-minus '></i></button>";
                $pilih =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'><i class='fa fa-minus '></i></button>";
            }

            $time = strtotime($page_data[$i]->tgl_input);
            $date = strftime("%A, %d %B %Y ", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_input = $date;
            $waktu;
            $total = "Rp. " . number_format(($page_data[$i]->total_pendapatan), 0, ',', '.');
            $total2 = "Rp. " . number_format(($page_data[$i]->total_pendapatan_manual), 0, ',', '.');
            $keterangan = $page_data[$i]->keterangan;
            $nama = $page_data[$i]->nama;
            $id_staff = $page_data[$i]->staff;

            $out[$i] = array($no, $pilih, $hapus, $tgl_input, $waktu, $nama, $total, $total2, $status, $id_staff);
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
    public function print_dp($id_pelayanan, $id_history)

    {
        $data_staff = $this->session->userdata('data_auth');
        $pagedata = $this->M_Kasir->getCetakDp($id_pelayanan, $id_history);
        $data['data'] = $pagedata;
        $total = $pagedata['biaya_rs'] + $pagedata['biaya_jasa'];
        $harga = round($total / 500) * 500;
        $adm = round($pagedata['biaya_admin'] / 500) * 500;
        $total_pelayanan = $harga + $adm;
        $page_data = $this->M_Kasir->getDetailKasir($id_pelayanan);
        if (!empty($page_data)) {
            $data1 = array(

                'dp' => $total_pelayanan,
                'id_staff' => $data_staff->id_staff
            );
            $where = array(
                'id_pelayanan' => $id_pelayanan,
            );
            $this->M_Kasir->update_tindakan($data1, $where, 'deatail_kasir');
        } else {
            $data2 = array(
                'id_pelayanan' => $id_pelayanan,
                'diskon' => 0,
                'dp' => $total_pelayanan,
                'total_harga' => $total_pelayanan,
                'total_bayar' => $total_pelayanan,
                'tanggal' => date("Y-m-d H:i:s"),
                'tanggal_keluar' => "0000-00-00 00:00:00",
                'id_staff' => $data_staff->id_staff,
                'status' => 1,
            );
            $this->M_Kasir->insert_tindakan($data2, 'deatail_kasir');
        }
        $db_pendapatan = $this->db->get_where('pendapatan_kasir', ['id_pelayanan' => $id_pelayanan])->result();
        if (count($db_pendapatan) > 0) {
            $pendapatan1 = array(
                'total_pendapatan' => $total_pelayanan,
                'total_bayar' => $total_pelayanan,
                'id_staff' => $data_staff->nama,
            );
            $this->M_Kasir->update_tindakan($pendapatan1, ['id_pelayanan' => $id_pelayanan], 'pendapatan_kasir');
        } else {
            $pendapatan = array(
                'id_pendapatan' => uniqid(),
                'id_pelayanan' => $id_pelayanan,
                'total_pendapatan' => $total_pelayanan,
                'total_bayar' => $total_pelayanan,
                'tgl_input' => date("Y-m-d H:i:s"),
                'keterangan' => 'cash',
                'tgl_pulang' => "0000-00-00 00:00:00",
                'id_staff' => $data_staff->nama,
                'status' => ""
            );

            $this->M_Kasir->insert_tindakan($pendapatan, 'pendapatan_kasir');
        }


        $this->load->view('print/cetak_dp_kasir', $data);
    }
    public function print_ptt($id_pelayanan, $id_history)

    {
        $data['data_labor'] = $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama,Date(t.tanggal) tanggal
            from tindakan_labor t, list_tindakan_labor l, pelayanan p , form_labor f
            WHERE t.id_list_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$id_pelayanan'
            and t.id_form_labor = f.id_form_labor and f.status_pembayaran ='tidak'
        ")->result_array();
        $data['data_radio'] = $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama ,DATE(t.tanggal) tanggal
        from tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p 
        WHERE t.id_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$id_pelayanan'
        and t.status_pembayaran ='tidak'
       ")->result_array();
        $data['pasien'] = $this->M_Kasir->getCetakDp($id_pelayanan, $id_history);

        $this->load->view('print/cetak_ptt_kasir', $data);
    }
    // checkout fisio
    public function insertCheckOutFisio()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        //$id_history = $this->input->post('idHis');
        $data_staff = $this->session->userdata("data_auth");
        $data_pelayanan = $this->M_Kasir->list_pelayanan_pasien($id_pelayanan);
        $data_apotik = $this->M_Kasir->list_apotik_pasien($id_pelayanan);
        $data_operasi = $this->M_Kasir->list_operasi_pasien($id_pelayanan);
        $data_igd = $this->M_Kasir->list_igd_pasien($id_pelayanan);
        $data_labor = $this->M_Kasir->list_labor_pasien($id_pelayanan);
        $data_radio = $this->M_Kasir->list_radio_pasien($id_pelayanan);
        $data_anak = $this->M_Kasir->list_anak_pasien($id_pelayanan);
        $data_apelkes = $this->M_Kasir->list_apelkes_pasien($id_pelayanan);
        $data_internis = $this->M_Kasir->list_internis_pasien($id_pelayanan);
        $data_bedah = $this->M_Kasir->list_bedah_pasien($id_pelayanan);
        $data_fisio = $this->M_Kasir->list_fisio_pasien($id_pelayanan);
        $data_gigi = $this->M_Kasir->list_gigi_pasien($id_pelayanan);
        $data_jantung = $this->M_Kasir->list_jantung_pasien($id_pelayanan);
        $data_kulit = $this->M_Kasir->list_kulit_pasien($id_pelayanan);
        $data_mata = $this->M_Kasir->list_mata_pasien($id_pelayanan);
        $data_obgyne = $this->M_Kasir->list_obgyne_pasien($id_pelayanan);
        $data_ok = $this->M_Kasir->list_ok_pasien($id_pelayanan);
        $data_tht = $this->M_Kasir->list_tht_pasien($id_pelayanan);
        $data_umum = $this->M_Kasir->list_umum_pasien($id_pelayanan);
        $data_akupuntur = $this->M_Kasir->list_akupuntur_pasien($id_pelayanan);
        $data_bedah_mulut = $this->M_Kasir->list_bedah_mulut_pasien($id_pelayanan);
        $data_kesjiwa = $this->M_Kasir->list_kesjiwa_pasien($id_pelayanan);
        $data_orthopedi = $this->M_Kasir->list_orthopedi_pasien($id_pelayanan);
        $data_paru = $this->M_Kasir->list_paru_pasien($id_pelayanan);
        $data_hd = $this->M_Kasir->list_hemodialisa_pasien($id_pelayanan);
        $data_saraf = $this->M_Kasir->list_saraf_pasien($id_pelayanan);
        $data_urologi = $this->M_Kasir->list_urologi_pasien($id_pelayanan);
        $data_ginjal = $this->M_Kasir->list_ginjal_pasien($id_pelayanan);
        $data_penyakit_mulut = $this->M_Kasir->list_penyakit_mulut_pasien($id_pelayanan);
        $data_rehab = $this->M_Kasir->list_rehab_pasien($id_pelayanan);
        $data_gizi = $this->M_Kasir->list_gizi($id_pelayanan);
        $data_terapi = $this->M_Kasir->list_terapi_bicara($id_pelayanan);

        if (count($data_pelayanan) > 0) {
            $total_pelayanan = array_sum($this->M_Kasir->total_pelayanan_pasien($id_pelayanan));
        } else {
            $total_pelayanan = 0;
        }

        if (count($data_apotik) > 0) {
            $apotik = array_sum($this->M_Kasir->total_apotik($id_pelayanan));
        } else {
            $apotik = 0;
        }

        if (count($data_operasi) > 0) {
            $obatok = array_sum($this->M_Kasir->total_operasi($id_pelayanan));
        } else {
            $obatok = 0;
        }

        if (count($data_igd) > 0) {
            $igd = array_sum($this->M_Kasir->total_igd($id_pelayanan));
        } else {
            $igd = 0;
        }

        if (count($data_labor) > 0) {
            $labor = array_sum($this->M_Kasir->total_labor($id_pelayanan));
        } else {
            $labor = 0;
        }

        if (count($data_radio) > 0) {
            $radio = array_sum($this->M_Kasir->total_radio($id_pelayanan));
        } else {
            $radio = 0;
        }

        if (count($data_anak) > 0) {
            $anak = array_sum($this->M_Kasir->total_anak($id_pelayanan));
        } else {
            $anak = 0;
        }

        if (count($data_apelkes) > 0) {
            $apelkes = array_sum($this->M_Kasir->total_apelkes($id_pelayanan));
        } else {
            $apelkes = 0;
        }

        if (count($data_bedah) > 0) {
            $bedah = array_sum($this->M_Kasir->total_bedah($id_pelayanan));
        } else {
            $bedah = 0;
        }

        if (count($data_fisio) > 0) {
            $fisio = array_sum($this->M_Kasir->total_fisio($id_pelayanan));
        } else {
            $fisio = 0;
        }

        if (count($data_gigi) > 0) {
            $gigi = array_sum($this->M_Kasir->total_gigi($id_pelayanan));
        } else {
            $gigi = 0;
        }

        if (count($data_mata) > 0) {
            $mata = array_sum($this->M_Kasir->total_mata($id_pelayanan));
        } else {
            $mata = 0;
        }

        if (count($data_obgyne) > 0) {
            $obgyne = array_sum($this->M_Kasir->total_obgyne($id_pelayanan));
        } else {
            $obgyne = 0;
        }

        if (count($data_ok) > 0) {
            $ok = array_sum($this->M_Kasir->total_ok($id_pelayanan));
        } else {
            $ok = 0;
        }

        if (count($data_tht) > 0) {
            $tht = array_sum($this->M_Kasir->total_tht($id_pelayanan));
        } else {
            $tht = 0;
        }

        if (count($data_kulit) > 0) {
            $kulit = array_sum($this->M_Kasir->total_kulit($id_pelayanan));
        } else {
            $kulit = 0;
        }

        if (count($data_jantung) > 0) {
            $jantung = array_sum($this->M_Kasir->total_jantung($id_pelayanan));
        } else {
            $jantung = 0;
        }

        if (count($data_internis) > 0) {
            $internis = array_sum($this->M_Kasir->total_internis($id_pelayanan));
        } else {
            $internis = 0;
        }

        if (count($data_umum) > 0) {
            $umum = array_sum($this->M_Kasir->total_umum($id_pelayanan));
        } else {
            $umum = 0;
        }

        if (count($data_akupuntur) > 0) {
            $akupuntur = array_sum($this->M_Kasir->total_akupuntur($id_pelayanan));
        } else {
            $akupuntur = 0;
        }

        if (count($data_bedah_mulut) > 0) {
            $bedah_mulut = array_sum($this->M_Kasir->total_bedah_mulut($id_pelayanan));
        } else {
            $bedah_mulut = 0;
        }

        if (count($data_kesjiwa) > 0) {
            $kesjiwa = array_sum($this->M_Kasir->total_kesjiwa($id_pelayanan));
        } else {
            $kesjiwa = 0;
        }

        if (count($data_orthopedi) > 0) {
            $orthopedi = array_sum($this->M_Kasir->total_orthopedi($id_pelayanan));
        } else {
            $orthopedi = 0;
        }

        if (count($data_paru) > 0) {
            $paru = array_sum($this->M_Kasir->total_paru($id_pelayanan));
        } else {
            $paru = 0;
        }

        if (count($data_hd) > 0) {
            $hd = array_sum($this->M_Kasir->total_hemodialisa($id_pelayanan));
        } else {
            $hd = 0;
        }

        if (count($data_saraf) > 0) {
            $saraf = array_sum($this->M_Kasir->total_saraf($id_pelayanan));
        } else {
            $saraf = 0;
        }

        if (count($data_urologi) > 0) {
            $urologi = array_sum($this->M_Kasir->total_urologi($id_pelayanan));
        } else {
            $urologi = 0;
        }

        if (count($data_ginjal) > 0) {
            $ginjal = array_sum($this->M_Kasir->total_ginjal($id_pelayanan));
        } else {
            $ginjal = 0;
        }

        if (count($data_penyakit_mulut) > 0) {
            $penyakit_mulut = array_sum($this->M_Kasir->total_penyakit_mulut($id_pelayanan));
        } else {
            $penyakit_mulut = 0;
        }

        if (count($data_rehab) > 0) {
            $rehab = array_sum($this->M_Kasir->total_rehab($id_pelayanan));
        } else {
            $rehab = 0;
        }

        if (count($data_gizi) > 0) {
            $gizi = array_sum($this->M_Kasir->total_gizi($id_pelayanan));
        } else {
            $gizi = 0;
        }

        if (count($data_terapi) > 0) {
            $terapi = array_sum($this->M_Kasir->total_terapi_wicara($id_pelayanan));
        } else {
            $terapi = 0;
        }

        $total_semua = $total_pelayanan + $apotik + $obatok + $igd + $labor + $radio + $anak + $apelkes + $bedah + $fisio + $gigi + $mata + $obgyne + $ok + $tht + $kulit + $jantung + $internis
            + $umum + $akupuntur + $bedah_mulut + $kesjiwa + $orthopedi + $paru + $hd + $saraf + $urologi + $ginjal + $penyakit_mulut + $rehab + $gizi + $terapi;


        $page_data = $this->M_Kasir->getDetailKasir($id_pelayanan);
        if (!empty($page_data)) {
            $data = array(
                'diskon' => 0,
                'total_harga' => $total_semua,
                'total_bayar' => $total_semua,
                'tanggal' => date("Y-m-d H:i:s"),
                'tanggal_keluar' => date("Y-m-d H:i:s"),
                'id_staff' => $data_staff->id_staff,
                'status' => 1,
            );
            $where = array('id_pelayanan' => $id_pelayanan);
            $this->M_Kasir->update_tindakan($data, $where, 'deatail_kasir');
            $out['status'] = "success";
        } else {
            $data = array(
                'id_pelayanan' => $id_pelayanan,
                'diskon' => 0,
                'total_harga' => $total_semua,
                'total_bayar' => $total_semua,
                'tanggal' => date("Y-m-d H:i:s"),
                'tanggal_keluar' => date("Y-m-d H:i:s"),
                'id_staff' => $data_staff->id_staff,
                'status' => 1,
            );
            $this->M_Kasir->insert_tindakan($data, 'deatail_kasir');
        }

        $datapel = array(
            'tgl_keluar' =>  date("Y-m-d H:i:s"),
            'status_rawat' => 'selesai'
        );
        $wherepel = array('id_pelayanan' => $id_pelayanan);

        $this->M_Kasir->update_tindakan($datapel, $wherepel, 'pelayanan');

        //////////////  antrol ///////////////////////
        $antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $id_pelayanan]);
        if (count($antrian->result()) > 0) {
            $data_antrol = [
                'kodebooking' => $antrian->row()->id_antrian,
                'taskid' => 5,
                'waktu' => strtotime('now') * 1000
            ];
            // update_antrian($data_antrol);
        }

        ///end

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function insertCheckOutRanap()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $diskon = $this->input->post('diskon');
        $dp = $this->input->post('dp');
        $id_history = $this->input->post('id_history');
        $data_staff = $this->session->userdata("data_auth");
        $apotik = $this->M_Kasir->total_apotik($id_pelayanan);
        $obatok = $this->M_Kasir->total_operasi($id_pelayanan);
        $igd = $this->M_Kasir->total_igd($id_pelayanan);
        $labor = $this->M_Kasir->total_labor($id_pelayanan);
        $radio = $this->M_Kasir->total_radio($id_pelayanan);
        $anak = $this->M_Kasir->total_anak($id_pelayanan);
        $apelkes = $this->M_Kasir->total_apelkes($id_pelayanan);
        $internis = $this->M_Kasir->total_internis($id_pelayanan);
        $bedah = $this->M_Kasir->total_bedah($id_pelayanan);
        $fisio = $this->M_Kasir->total_fisio($id_pelayanan);
        $gigi = $this->M_Kasir->total_gigi($id_pelayanan);
        $jantung = $this->M_Kasir->total_jantung($id_pelayanan);
        $kulit = $this->M_Kasir->total_kulit($id_pelayanan);
        $mata = $this->M_Kasir->total_mata($id_pelayanan);
        $obgyne = $this->M_Kasir->total_obgyne($id_pelayanan);
        $ok = $this->M_Kasir->total_ok($id_pelayanan);
        $tht = $this->M_Kasir->total_tht($id_pelayanan);
        $umum = $this->M_Kasir->total_umum($id_pelayanan);
        $akp = $this->M_Kasir->total_akupuntur($id_pelayanan);
        $bdm = $this->M_Kasir->total_bedah_mulut($id_pelayanan);
        $jiwa = $this->M_Kasir->total_kesjiwa($id_pelayanan);
        $ort = $this->M_Kasir->total_orthopedi($id_pelayanan);
        $paru = $this->M_Kasir->total_paru($id_pelayanan);
        $hd = $this->M_Kasir->total_hemodialisa($id_pelayanan);
        $saraf = $this->M_Kasir->total_saraf($id_pelayanan);
        $uro = $this->M_Kasir->total_urologi($id_pelayanan);
        $ginjal = $this->M_Kasir->total_ginjal($id_pelayanan);
        $pnm = $this->M_Kasir->total_penyakit_mulut($id_pelayanan);
        $rehab = $this->M_Kasir->total_rehab($id_pelayanan);
        $total_harga = $apotik['total'] + $obatok['total'] + $igd['total'] + $labor['total'] + $radio['total']
            + $anak['total'] + $apelkes['total'] + $internis['total'] + $bedah['total'] + $fisio['total'] + $gigi['total']
            + $jantung['total'] + $kulit['total'] + $mata['total'] + $obgyne['total'] + $ok['total'] + $tht['total'] + $umum['total'] +
            $akp['total'] + $bdm['total'] + $jiwa['total'] + $ort['total'] + $paru['total'] + $hd['total'] + $saraf['total'] + $uro['total'] +
            $ginjal['total'] + $pnm['total'] + $rehab['total'];

        $db_sewa = $this->M_Kasir->cekSewaKamar($id_pelayanan);
        $total_sewa = $this->M_Kasir->TotalSewaKamar($id_pelayanan)->total;
        $pasien = $this->M_Kasir->getDataPasienRanap($id_pelayanan, $id_history);
        if (count($db_sewa) > 0) {

            if ($total_harga > 5000000) {
                $materai = $this->db->get_where('tindakan_apelkes', ['id_pelayanan' => $id_pelayanan, 'id_list_tindakan' => 1412])->result();
                if (count($materai) == 0) {
                    $data_materai = [
                        'id_tindakan_apelkes' => uniqid(),
                        'harga' => 10000,
                        'frek' => 1,
                        'id_pelayanan' => $id_pelayanan,
                        'tipe' => $pasien['id_kamar'],
                        'id_list_tindakan' => 1412,
                        'total' => 10000,
                        'id_dokter' => '-',
                        'tanggal' => date('Y-m-d H:i:s'),
                        'id_staff' => $data_staff->id_staff
                    ];
                    $this->M_Kasir->insert_tindakan($data_materai, 'tindakan_apelkes');
                    $total_materai = 10000;
                } else {
                    $total_materai = 0;
                }
            }


            $service = $this->db->get_where('tindakan_apelkes', ['id_pelayanan' => $id_pelayanan, 'id_list_tindakan' => 1413])->result();
            $sewakamaratas = $this->M_Kasir->TotalSewaKamarAtas($id_pelayanan);

            if (isset($sewakamaratas->total)) {
                $total_sewa = $sewakamaratas->total;
                if (count($service) == 0) {
                    $data_service = [
                        'id_tindakan_apelkes' => uniqid(),
                        'harga' => $total_sewa * 0.1,
                        'frek' => 1,
                        'id_pelayanan' => $id_pelayanan,
                        'tipe' => $pasien['id_kamar'],
                        'id_list_tindakan' => 1413,
                        'total' => $total_sewa * 0.1,
                        'id_dokter' => '-',
                        'tanggal' => date('Y-m-d H:i:s'),
                        'id_staff' => $data_staff->id_staff
                    ];
                    $this->M_Kasir->insert_tindakan($data_service, 'tindakan_apelkes');
                } else {
                    $data_service = [
                        'harga' => $total_sewa * 0.1,
                        'frek' => 1,
                        'id_pelayanan' => $id_pelayanan,
                        'tipe' => $pasien['id_kamar'],
                        'id_list_tindakan' => 1413,
                        'total' => $total_sewa * 0.1,
                        'id_dokter' => '-',
                        'tanggal' => date('Y-m-d H:i:s'),
                        'id_staff' => $data_staff->id_staff
                    ];
                    $this->M_Kasir->update_tindakan($data_service, ['id_tindakan_apelkes' => $service[0]->id_tindakan_apelkes], 'tindakan_apelkes');
                }
                // } else {
                //     $data_sewa = [
                //         'frek' => $selisih,
                //         'total' => $selisih * $sewa_kamar->harga_sarana,
                //         'tanggal' => date('Y-m-d H:i:s'),
                //         'id_staff' => $staff->id_staff
                //     ];
                //     $this->M_Kasir->update_tindakan($data_sewa, ['id_tindakan_apelkes' => $db_sewa[0]->id_tindakan_apelkes], 'tindakan_apelkes');
            }
            $total_service = $total_sewa * 0.1;
            // } else {
            //     $data_sewa = [
            //         'frek' => $selisih,
            //         'total' => $selisih * $sewa_kamar->harga_sarana,
            //         'tanggal' => date('Y-m-d H:i:s'),
            //         'id_staff' => $staff->id_staff
            //     ];
            //     $this->M_Kasir->update_tindakan($data_sewa, ['id_tindakan_apelkes' => $db_sewa[0]->id_tindakan_apelkes], 'tindakan_apelkes');
        } else {
            $total_materai = 0;
            $total_service = 0;
        }
        $total_harga = $total_harga + $total_materai + $total_service;

        //endhitung sewakamar

        $page_data = $this->M_Kasir->getDetailKasir($id_pelayanan);
        if (!empty($page_data)) {
            $data = array(
                'diskon' => $page_data->diskon,
                'dp' => $page_data->dp,
                'total_harga' => $total_harga - $page_data->diskon - $page_data->dp,
                'total_bayar' => $total_harga,
                'tanggal' => date("Y-m-d H:i:s"),
                'tanggal_keluar' => date("Y-m-d H:i:s"),
                'id_staff' => $data_staff->id_staff,
                'status' => 1,
            );
            $where = array('id_pelayanan' => $id_pelayanan);
            $this->M_Kasir->update_tindakan($data, $where, 'deatail_kasir');
            $out['status'] = "success";
        } else {
            $data = array(
                'id_pelayanan' => $id_pelayanan,
                'diskon' => $diskon,
                'dp' => $dp,
                'total_harga' => $total_harga,
                'total_bayar' => $total_harga,
                'tanggal' => date("Y-m-d H:i:s"),
                'tanggal_keluar' => date("Y-m-d H:i:s"),
                'id_staff' => $data_staff->id_staff,
                'status' => 1,
            );
            $this->M_Kasir->insert_tindakan($data, 'deatail_kasir');
        }

        $datapel = array(
            'tgl_keluar' =>  date("Y-m-d H:i:s"),
            'status_rawat' => 'selesai'
        );
        $wherepel = array('id_pelayanan' => $id_pelayanan);

        $this->M_Kasir->update_tindakan($datapel, $wherepel, 'pelayanan');
        $this->M_Kasir->update_tindakan($data, $where, 'deatail_kasir');
        // $out['status'] = "success";
        // echo json_encode($out);

        // $db = $this->db->get_where('pelayanan', array('id_pelayanan' => $id_pelayanan))->row_array();
        // if ($db['status_rawat'] == 'dirawat') {
        $id_kamar = $this->M_Kasir->getKamarById($id_pelayanan);
        $i = 0;
        if ($id_kamar > 0) {
            $ruangan = array(
                'status' => 'tersedia',
            );
            $where = array(
                'id_ruangan' => $id_kamar[$i]->id_kamar,
            );
            $this->M_Kasir->update_tindakan($ruangan, $where, 'ruangan');
        }
        //update riwayat kamar
        $kamar = array(
            'status' => 'KELUAR',
            'tanggal_keluar' => date("Y-m-d H:i:s"),
        );
        $where = array(
            'id_pelayanan' => $id_pelayanan,
            'status' => 'AKTIF',
        );
        $this->M_Kasir->update_tindakan($kamar, $where, 'riwayat_kamar');
        $this->update_bed();
        $out['status'] = "success";
        echo json_encode($out);
        // }


    }


    // public function updateDetailKasirMcu2()
    // {
    //     $id_mcu = $this->input->post('id_mcu');
    //     $data_staff = $this->session->userdata('data_auth');
    //     $data = array(
    //         'diskon' => $this->input->post('diskon'),
    //         'dp' => $this->input->post('dp'),
    //         'tgl' => date("Y-m-d H:i:s"),
    //         'tgl_keluar' => $this->input->post('tgl_keluar'),
    //         'id_staff' => $data_staff->id_staff,
    //         'total_harga' => $this->input->post('total_harga'),
    //         'total_bayar' => $this->input->post('total_bayar'),
    //         'status' => 1,
    //     );
    //     $data2 = array(
    //         'status_bayar' => 1,
    //         'tgl_keluar' => $this->input->post('tgl_keluar'),
    //     );
    //     $where = array(
    //         'id_mcu' => $id_mcu,
    //     );
    //     $this->M_Kasir->update_tindakan($data, $where, 'detail_kasir_mcu');
    //     $this->M_Kasir->update_tindakan($data2, $where, 'mcu');
    //     $out['status'] = "success";
    //     echo json_encode($out);
    // }
    // public function updateDetailKasirMcu3()
    // {
    //     $id_mcu = $this->input->post('id_mcu');
    //     $data_staff = $this->session->userdata('data_auth');
    //     $data = array(
    //         'diskon' => $this->input->post('diskon'),
    //         'dp' => $this->input->post('dp'),
    //         'id_staff' => $data_staff->id_staff,
    //         'total_harga' => $this->input->post('total_harga'),
    //         'total_bayar' => $this->input->post('total_bayar'),
    //     );
    //     $where = array(
    //         'id_mcu' => $id_mcu,
    //     );
    //     $this->M_Kasir->update_tindakan($data, $where, 'detail_kasir_mcu');
    //     $out['status'] = "success";
    //     echo json_encode($out);
    // }
}
