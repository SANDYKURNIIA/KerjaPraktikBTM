<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kasir_pp extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'IND');
        $this->load->model('M_Kasir');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Pasien');
        $this->load->model('M_Poli_prio');
        $this->load->model('Aplicares_model');
    }


    //PASIEN HOMECARE
    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['data_cara_bayar'] = $this->M_Pasien->selectCaraBayar();
        $page_data['data_bank'] = $this->M_Pasien->selectBank();
        $page_data['data_staff'] = $this->M_Pasien->selectKaryawan();
        $page_data['page_content'] = 'page_content/Pasien_poli_prio';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_pasien_hc()
    {
        $page_data = $this->M_Poli_prio->selectPasienHc();

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
        $db = $this->M_Poli_prio->getDpDiscHc($id_mcu);
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
            'tgl' => date("Y-m-d h:i:sa"),
            'tgl_keluar' => $this->input->post('tgl_keluar'),
            'id_staff' => $data_staff->id_staff,
            'total_harga' => $this->input->post('total_harga'),
            'total_bayar' => $this->input->post('total_bayar'),
        );
        $where = array(
            'id_pasien' => $id_mcu,
        );
        $this->M_Kasir->update_tindakan($data, $where, 'detail_kasir_pp');
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
        $page_data = $this->M_Poli_prio->selectPasienPulangMcu();

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
        $page_data = $this->M_Poli_prio->selectRangePasienPulangMcu($mulai, $akhir);

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
        $this->M_Kasir->update_tindakan($pelayanan, $where, 'poli_prioritas');
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
        $data['pasien'] = $this->M_Poli_prio->getHcById($id_mcu);
        $data['internis'] = $this->M_Poli_prio->getTindakanInternisById($id_mcu);
        $data['obgyne'] = $this->M_Poli_prio->getTindakanObgyneById($id_mcu);
        $data['bedah'] = $this->M_Poli_prio->getTindakanBedahById($id_mcu);
        $data['obat'] = $this->M_Poli_prio->getObatHcById($id_mcu);
        $data['data_labor'] = $this->M_Poli_prio->getLaborById($id_mcu);
        $data['data_radio'] = $this->M_Poli_prio->getRadioById($id_mcu);
        if ($action == 'cetak') {
            $this->load->view('print/cetak_pembayaran_pp', $data);
        } else {
            $pelayanan = array(
                'status_bayar' => 1,
                'status_rawat' => 1,
                'tgl_keluar' => $this->input->post('tgl_keluar'),
            );
            $where = array(
                'id_pasien' => $id_mcu,
            );
            $this->M_Kasir->update_tindakan($pelayanan, $where, 'poli_prioritas');

            $this->load->view('print/cetak_pembayaran_pp', $data);
        }
    }
    public function insert_pembayaran_Hc()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data_staff = $this->session->userdata('data_auth');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->db->get_where('detail_kasir_pp', ['id_pasien' => $id_pelayanan])->row();
        if (!empty($page_data)) {
            $data = array(
                'diskon' => $this->input->post('diskon'),
                'total_harga' => $this->input->post('total_harga'),
                'total_bayar' => $this->input->post('total_bayar'),
                'tgl' => date("Y-m-d h:i:sa"),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'id_staff' => $data_staff->id_staff,
                'status' => 1,
            );
            $where = array(
                'id_pasien' => $id_pelayanan,
            );
            $this->M_Kasir->update_tindakan($data, $where, 'detail_kasir_pp');
            $out['status'] = "success";
        } else {
            $data = array(
                'id_detail' => uniqid(),
                'id_pasien' => $id_pelayanan,
                'diskon' => $this->input->post('diskon'),
                'total_harga' => $this->input->post('total_harga'),
                'total_bayar' => $this->input->post('total_bayar'),
                'tgl' => date("Y-m-d h:i:sa"),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'id_staff' => $data_staff->id_staff,
                'status' => 1,
            );
            $this->M_Kasir->insert_tindakan($data, 'detail_kasir_pp');
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
    public function update()
    {
        // $page_data = $this->db->get('jurnal_pendapatan')->result();
        $page_data = $this->db->get('jurnal_cara_pembayaran')->result();
        for ($i = 0; $i < count($page_data); $i++) {
            $no_jurnal = $page_data[$i]->no_jurnal;
            $carabayar = $this->db->query("SELECT c.kode_pelanggan id_vendor FROM akun_tindakan a, cara_bayar c where a.cara_bayar = c.id_cara_bayar and a.no_jurnal ='$no_jurnal'")->row();
            $carabayar1 = $this->db->query("SELECT c.kode_pelanggan id_vendor FROM akun_non_pelayanan a, cara_bayar c where a.cara_bayar = c.id_cara_bayar and a.no_jurnal ='$no_jurnal'")->row();
            if (!empty($carabayar)) {
                $id_vendor = $carabayar->id_vendor;
            } else if (!empty($carabayar1)) {
                $id_vendor = $carabayar1->id_vendor;
            } else {
                $id_vendor = 'AR4001';
            }
            $data = array(
                'id_vendor' => $id_vendor,
            );
            $where = array(
                'no_jurnal' => $no_jurnal,
            );
            $this->M_Kasir->update_tindakan($data, $where, 'jurnal_pendapatan');
            $this->M_Kasir->update_tindakan($data, $where, 'jurnal_cara_pembayaran');
        }
        echo "selesai";
    }
    public function update1()
    {
        // $page_data = $this->db->get_where('v_pasien_pulang_rawat_inap', ['tgl_keluar like' => '%2022-12-31%'])->result();
        // $page_data = $this->db->get_where('v_pasien_pulang_ugd', ['tgl_keluar >=' => '2022-11-01','tgl_keluar <=' => '2022-12-01'])->result();
        // $page_data = $this->db->get_where('v_pasien_pulang_poli', ['tgl_keluar >=' => '2023-01-01'])->result();
        // $page_data = $this->db->get_where('v_pasien_pulang_ugd', ['tgl_keluar >' => '2023-05-01', 'tgl_keluar <=' => '2023-05-31'])->result();
        // $page_data = $this->db->get_where('v_pasien_pulang_ugd', ['tgl_keluar >=' => '2023-05-01','tgl_keluar <=' => '2023-05-31','cara_bayar'=>'BPJS'])->result();
        // $page_data = $this->db->get_where('v_pasien_pulang_poli', ['tgl_keluar like' => '%2022-12-31%'])->result();
        // $page_data = $this->db->get_where('v_pasien_rajal_kasir', ['tgl_masuk <=' => '2022-12-31'])->result();
        // $page_data = $this->db->query("SELECT DISTINCT(t.id_pelayanan) id_pelayanan FROM tindakan_ok t, akun_tindakan a where a.id_pelayanan = t.id_pelayanan")->result();
        // $page_data = $this->db->query("SELECT * FROM v_pasien_pulang_rawat_inap where tgl_keluar >= '2023-01-01' and tgl_keluar <= '2023-02-01' and tgl_masuk <= '2022-12-24'")->result();
        // $page_data = $this->db->query("SELECT DISTINCT(a.id_pelayanan) id_pelayanan FROM akun_tindakan a where a.jenis_akun = '-'")->result();

        // $page_data = $this->db->query("SELECT * from v_pasien_pulang_ugd 
        // where date(tgl_keluar)= '2023-05-31' and cara_bayar ='BPJS' 
        // and id_pelayanan not in (select id_pelayanan from akun_tindakan where tgl_input <'2023-06-15')
        // and id_pelayanan not in (select id_pelayanan from akun_jasa_dokter)
        // order by tgl_keluar
        // ")->result();

        $page_data = $this->db->query("SELECT * from v_pasien_pulang_poli 
        where date(tgl_keluar)= '2023-05-29'  and cara_bayar ='BPJS' 
        and id_pelayanan not in (select id_pelayanan from akun_tindakan where tgl_input <'2023-06-15')
        and id_pelayanan not in (select id_pelayanan from akun_jasa_dokter)")->result();
        // print_arr($page_data);

        for ($i = 0; $i < count($page_data); $i++) {
            // updateTglPulang_pendapatan($page_data[$i]->id_pelayanan);

            jurnal($page_data[$i]->id_pelayanan);
            jurnal_ijd($page_data[$i]->id_pelayanan);

            echo $page_data[$i]->id_pelayanan . '<br>';
        }

        // updateTglPulang_pendapatan('pl_139660');

        echo "selesai";
    }
    public function update_bed()
    {
        $headers = generate_headers();
        $rows = $this->Aplicares_model->create_room();
        foreach ($rows as $row) {
            $data = json_encode($row);

            $url = base_aplicares() . "aplicaresws/rest/bed/create/0110R005";
            $content = post($url, $headers, $data);
            // print_arr($content);
        }

        $rows1 = $this->M_Pencarian_Pasien->get_room();
        foreach ($rows1 as $row) {
            $data = json_encode($row);
            $headers = generate_headers();
            // print_arr($headers);

            $url = base_aplicares() . "aplicaresws/rest/bed/update/0110R005";
            $content = post($url, $headers, $data);
        }

        $url_1 = base_aplicares() . "aplicaresws/rest/bed/read/0110R005/1/100";
        $content = get($url_1, $headers);
        print_arr($content);

        $out['status'] = "success";
        echo json_encode($out);
        exit;
    }
    public function view_bed()
    {
        $headers = generate_headers();
        /**
      Getting record from API Aplicares
         */
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, base_aplicares() . "aplicaresws/rest/bed/read/0110R005/1/100");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $content = curl_exec($ch);
        $err = curl_error($ch);

        print_r($err);
        //print_r($content);  

        $data = json_decode($content, true);
        print_arr($data);
        //echo "<br><br><br>";

        foreach ($data["response"]["list"] as $record) {
            //print_r($record);

            $a = [
                'kodekelas' => $record['kodekelas'],
                'koderuang' => $record['koderuang']
            ];
            $data_3 = json_encode($a);

            $url_3 = base_aplicares() . "aplicaresws/rest/bed/delete/0110R005";
            $content_3 = post($url_3, $headers, $data_3);
        }

        // close cURL resource, and free up system resources
        curl_close($ch);
    }

    function getLuarTanggungan()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');

        $data_labor = $this->db->query("SELECT sum(t.total) total
            from tindakan_labor t, list_tindakan_labor l, pelayanan p , form_labor f
            WHERE t.id_list_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$id_pelayanan'
            and t.id_form_labor = f.id_form_labor and f.status_pembayaran ='tidak'
        ")->row();
        $data_radio = $this->db->query("SELECT sum(t.total) total
        from tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p 
        WHERE t.id_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$id_pelayanan'
        and t.status_pembayaran ='tidak'
       ")->row();
        $data_transportasi = $this->db->query("SELECT sum(t.total) total
        from tindakan_pelayanan_tambahan t, list_tindakan_apelkes l, pelayanan p 
        WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$id_pelayanan'
        and t.status_pembayaran ='tidak'
       ")->row();
       $data_lain = $this->db->query("SELECT sum(t.total) total
       from tindakan_penunjang_lain t, list_tindakan_apelkes l, pelayanan p 
       WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$id_pelayanan'
       and t.status_pembayaran ='tidak'
      ")->row();
       $apelkes = $this->db->query("SELECT sum(t.total) total
       from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p 
       WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$id_pelayanan'
       and t.status_pembayaran ='tidak'
      ")->row();
      $poli = $this->db->query("SELECT sum(t.total) total
      from tindakan_poli t 
      WHERE t.id_pelayanan='$id_pelayanan'
      and t.status_pembayaran ='tidak'
     ")->row();
        $sudah_bayar = $this->db->query("SELECT ifnull(sum(total_bayar),0) sudah_dibayar from pendapatan_kasir where id_pelayanan='$id_pelayanan' and tipe ='SELISIH' and jenis_bill ='LUAR TANGGUNGAN'")->row()->sudah_dibayar;

        $total = $data_labor->total + $data_radio->total + $data_transportasi->total + $data_lain->total + $apelkes->total + $poli->total;

        $db['total_harga'] = round($total);
        $db['total'] = round($total - $sudah_bayar);
        echo json_encode($db);
    }
    public function insert_luar_tanggungan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data_staff = $this->session->userdata('data_auth');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        // $total_harga = $this->input->post('total_harga');

        $totalbayarkasir = $this->input->post('totalbayarkasir');
        $totalkeseluruhan = $this->input->post('totalkeseluruhan');
        $sudah_bayar = $totalbayarkasir;

        if ($this->input->post('opsi') != 'cash' && $this->input->post('opsi') != 'asuransi' && $this->input->post('jenis_bank') == '') {
            $out['status'] = "Jenis Bank Dipilih terlebih dahulu";
        } else {


            $id_pendapatan = uniqid();
            // $totalkeseluruhan = $this->input->post('total_bayar');
            $totalkeseluruhan = $this->input->post('totalkeseluruhan');
            $pendapatan = array(
                'id_pendapatan' => $id_pendapatan,
                'id_pelayanan' => $id_pelayanan,
                'total_pendapatan' => $totalkeseluruhan,
                'total_bayar' => $totalbayarkasir,
                'selisih' => $totalbayarkasir,
                'tgl_input' => date("Y-m-d H:i:s"),
                'diskon' => 0,
                'dp' => 0,
                'keterangan' => $this->input->post('opsi'),

                'id_staff' => $data_staff->id_staff,
                'tipe' => "SELISIH",
                'jenis_bill' => "LUAR TANGGUNGAN"
            );

            $data2 = array(
                'id_pendapatan_bank' => uniqid(),
                'id_pendapatan' => $id_pendapatan,
                'id_pelayanan' => $id_pelayanan,
                'total_pendapatan' => $totalbayarkasir,
                'jenis_pembayaran' => $this->input->post('opsi'),
                'cara_bayar' => $this->input->post('jenis_bank'),
                'tgl_input' => date("Y-m-d H:i:s"),
                'diskon' => 0,
                'dp' => 0,
                'keterangan' => "non-tunai",
                'tgl_pulang' => null,
                'id_staff' => $data_staff->id_staff,
                'status' => ""
            );

            if ($totalbayarkasir != 0) { //total bayar = 0

                $this->M_Kasir->insert_tindakan($pendapatan, 'pendapatan_kasir');

                if ($this->input->post('opsi') != 'cash') {

                    $this->M_Kasir->insert_tindakan($data2, 'pendapatan_bank');
                }
            }


            $out = [
                'status' => "success",
            ];
        }

        // $this->db->trans_complete();

        echo json_encode($out);
    }

    public function tampil_riwayat_pembayaran()
    {
        $tgl = date("Y-m-d");

        $id_pelayanan = $this->input->post('id');
        $id_his = $this->input->post('id_his');
        $url = $this->input->post('url');
        // $url = "";
        $page_data = $this->db->query("SELECT g.*,ifnull(b.nama_bank,'') bank,b.cara_bayar id_bank FROM(
           
            SELECT p.*,p.selisih nilai,s.nama staff
            from pendapatan_kasir p, staff s
            where p.id_staff = s.id_staff
            and p.tipe ='SELISIH' and jenis_bill='LUAR TANGGUNGAN' and p.id_pelayanan='$id_pelayanan'
            ) AS g
            left join 
            (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
            as b on g.id_pendapatan = b.id_pendapatan
            group by g.id_pendapatan  
            ")->result();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $time = strtotime($page_data[$i]->tgl_input);
            $date = indo_date2($page_data[$i]->tgl_input);
            $waktu = strftime(" %H:%M WIB", $time);

            $no = $i + 1;
            $tgl_input = $date . $waktu;

            $bayar = "Rp. " . number_format(($page_data[$i]->nilai), 0, ',', '.');
            $keterangan = $page_data[$i]->keterangan;
            $id_staff = $page_data[$i]->staff;
            $bank = $page_data[$i]->bank;
            $encript = urlencode(base64_encode($id_pelayanan . '|' . $id_his . '|' . $page_data[$i]->nilai . '|' . $page_data[$i]->dp));
            // $cetak = "<button class='btn btn-success btn-icon-anim btn-square'  onclick='print(\"" . $id_pelayanan . "\",\"" .  $id_his. "\",\"" .  $page_data[$i]->total_bayar . "\")' '><i class='icon-printer '></i></button>";
            $tombol1 =   "<button type='button' class='btn btn-info btn-icon-anim btn-square' onclick='tampilEditLuarTanggungan(\"" . $page_data[$i]->id_pendapatan . "\",\"" . $keterangan . "\",\"" . $page_data[$i]->nilai . "\",\"" . $page_data[$i]->id_bank . "\")'><i class='fa fa-rocket '></i></button>";
            $tombol_kwitansi =   "<button type='button' class='btn btn-info btn-icon-anim btn-square' onclick='kwitansi(\"" . $page_data[$i]->id_pendapatan . "\",\"" . $id_pelayanan . "\",\"" . $id_his . "\")'><i class='icon-printer'></i></button>";

            $opsi = strtoupper($keterangan) . ' ' . $bank;
            $cetak = "<a class='btn btn-primary btn-icon-anim btn-square' target ='_blank' href='" . base_url() . $url . '/' . $encript . "' ><i class='icon-printer'></i></a>";


            $out[$i] = array($no, $cetak, $tombol1, $tgl_input, $bayar, $opsi, $id_staff);
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
    public function serverSide_poli($id_pel,$id_his)
    {
        $this->load->library('pdf');
        $id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));
        $pendapatan = get_list_pendapatan($id_pelayanan);
        $pasien_pulang = $this->M_Kasir->getDataPasienPulangPoli($id_pelayanan, $id_history);
        $kasir = $this->M_Kasir->getDetailKasir($id_pelayanan);
       
        $data = $pendapatan;
        $data['pasien'] = $pasien_pulang;
        $data['tgl_keluar_rajal'] = $pasien_pulang['tgl_keluar'];
       
        $data['diskon'] = empty($kasir)?0:$kasir->diskon;
        $data['dp'] = empty($kasir)?0:$kasir->dp;
        $data['selisih'] =empty($kasir)?0:$kasir->selisih;
        $data['note'] = empty($kasir)?'':$kasir->note;
        // $data['tgl'] = $this->input->post('tgl');
        $data['inPel'] = $id_pelayanan;
        $data['inHis'] = $id_history;

        // $data['tgl_keluar'] = $pasien_pulang['tgl_keluar'];

        $filename = $pasien_pulang['nama'] . '-' . sprintf('%06d', $pasien_pulang['no_rm']).' ('.date("d-m-Y", strtotime($pasien_pulang['tgl_keluar'])).')';
        
        $html = $this->load->view("print/cetak_pembayaran_poli_pdf", $data, true); // Remove TRUE for debugging
         $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'potrait');
        $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
        $this->dompdf->render();
        $this->dompdf->stream($filename.".pdf", array("Attachment" => 1));
        //$this->pdf->createPDF($html, "Example PDF" . date("His"), TRUE = DOWNLOAD, FALSE = PREVIEW, $customPaper, 'portrait');
    }
    public function serverSide_poli_1($id_pelayanan,$id_history)
    {
        $this->load->library('pdf');
        // $id_pelayanan = base64_decode(urldecode($id_pel));
		// $id_history = base64_decode(urldecode($id_his));
        $pendapatan = get_list_pendapatan($id_pelayanan);
        $pasien_pulang = $this->M_Kasir->getDataPasienPulangPoli($id_pelayanan, $id_history);
        $kasir = $this->M_Kasir->getDetailKasir($id_pelayanan);
       
        $data = $pendapatan;
        $data['pasien'] = $pasien_pulang;
        $data['tgl_keluar_rajal'] = $pasien_pulang['tgl_keluar'];
       
        $data['diskon'] = empty($kasir)?0:$kasir->diskon;
        $data['dp'] = empty($kasir)?0:$kasir->dp;
        $data['selisih'] =empty($kasir)?0:$kasir->selisih;
        $data['note'] = empty($kasir)?'':$kasir->note;
        // $data['tgl'] = $this->input->post('tgl');
        $data['inPel'] = $id_pelayanan;
        $data['inHis'] = $id_history;

        // $data['tgl_keluar'] = $pasien_pulang['tgl_keluar'];

        // $filename = $pasien_pulang['nama'] . '-' . sprintf('%06d', $pasien_pulang['no_rm']).' ('.date("d-m-Y", strtotime($pasien_pulang['tgl_keluar'])).')';
        
        $this->load->view("print/cetak_pembayaran_poli_pdf", $data); // Remove TRUE for debugging
        
    }
    public function serverSide_igd($id_pel,$id_his)
    {
        $this->load->library('pdf');
        $id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));
        $pendapatan = get_list_pendapatan($id_pelayanan);
        $pasien_pulang = $this->M_Kasir->getDataPasienPulangIGD($id_pelayanan, $id_history);
        $kasir = $this->M_Kasir->getDetailKasir($id_pelayanan);
       
        $data = $pendapatan;
        $data['pasien'] = $pasien_pulang;
        $data['tgl_keluar_rajal'] = $pasien_pulang['tgl_keluar'];
       
        $data['diskon'] = empty($kasir)?0:$kasir->diskon;
        $data['dp'] = empty($kasir)?0:$kasir->dp;
        $data['selisih'] =empty($kasir)?0:$kasir->selisih;
        $data['note'] = empty($kasir)?'':$kasir->note;
        // $data['tgl'] = $this->input->post('tgl');
        $data['inPel'] = $id_pelayanan;
        $data['inHis'] = $id_history;

        // $data['tgl_keluar'] = $pasien_pulang['tgl_keluar'];
        $filename = $pasien_pulang['nama'] . '-' . sprintf('%06d', $pasien_pulang['no_rm']).' ('.date("d-m-Y", strtotime($pasien_pulang['tgl_keluar'])).')';
      
        $html = $this->load->view("print/cetak_pembayaran_igd_pdf", $data, true); // Remove TRUE for debugging
         $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'potrait');
        $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
        $this->dompdf->render();
        $this->dompdf->stream($filename.".pdf", array("Attachment" => 1));
        //$this->pdf->createPDF($html, "Example PDF" . date("His"), TRUE = DOWNLOAD, FALSE = PREVIEW, $customPaper, 'portrait');
    }
}
