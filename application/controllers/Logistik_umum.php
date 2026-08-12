<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logistik_umum extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Logistik_umum');
    }

    // Laporan mutasi
    public function Laporan_mutasi(){
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_mutasi_umum';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_mutasi(){
        $page_data = $this->M_Logistik_umum->selectLaporanmutasiUmum();

        $out=null;
        for ($i=0; $i < count($page_data); $i++) {
        $no=$i+1;
        $jenis = "MUTASI";
        $nama = $page_data[$i]->nama;
        $tipe = $page_data[$i]->tipe;
        $frek = $page_data[$i]->frek;
        $satuan = $page_data[$i]->satuan;
        $beban = $page_data[$i]->jenis_beban;
        $harga = $page_data[$i]->harga;
        $total = $harga * $frek;
        $time = strtotime($page_data[$i]->tgl);
        $tgl = strftime("%A, %d %B %Y %H:%M WIB", $time);
            $out[$i]=array($no,$jenis,$nama,$tipe,$frek,$satuan,$beban,$harga,$total,$tgl);
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

    public function Tampil_Rangelaporan_mutasi(){

        $mulai = $this->input->post('mulai');
        $akhir= $this->input->post('akhir');
    
        $page_data = $this->M_Logistik_umum->selectRangeLaporanmutasiUmum($mulai,$akhir);

        $out=null;
        for ($i=0; $i < count($page_data); $i++) {
        $no=$i+1;
        $jenis = "MUTASI";
        $nama = $page_data[$i]->nama;
        $tipe = $page_data[$i]->tipe;
        $frek = $page_data[$i]->frek;
        $satuan = $page_data[$i]->satuan;
        $beban = $page_data[$i]->jenis_beban;
        $harga = $page_data[$i]->harga;
        $total = $harga * $frek;
        $time = strtotime($page_data[$i]->tgl);
        $tgl = strftime("%A, %d %B %Y %H:%M WIB", $time);
            $out[$i]=array($no,$jenis,$nama,$tipe,$frek,$satuan,$beban,$harga,$total,$tgl);
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

   
    // End

    // Konfirmasi Permintaan
    public function Konfirmasi_permintaan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Konfirmasi_permintaan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_konfirmasi_permintaan()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $data = $this->input->post('tanggal_masuk');

        if ($this->input->post('tanggal_masuk') && $this->input->post('tanggal_keluar') && $this->input->post('jenis_pelayanan')) {
            $first_date = $this->input->post('tanggal_masuk');
            $second_date = $this->input->post('tanggal_keluar');
            
            if ($first_date != '' || $second_date != '') {
                $page_data = $this->M_Laporan->selectDataPasienKunjungan($first_date, $second_date, $jenis_pelayanan);
            } else if ($first_date = '' || $second_date = '') {
                $page_data = $this->M_Laporan->selectDataPasienKunjungan($tgl, $tgl, '');
            }
        } else {
            $page_data = $this->M_Laporan->selectDataPasienKunjungan($tgl, $tgl, '');
        }

        for ($i = 0; $i < count($page_data); $i++) {


            $tgl_masuk = strtotime($page_data[$i]->tgl_masuk);
            $tgl_keluar = strtotime($page_data[$i]->tgl_keluar);

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $alamat = $page_data[$i]->alamat;
            $no_hp = $page_data[$i]->no_hp;
            $cara_bayar = $page_data[$i]->bayar;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $tgl_masuk =  strftime("%A, %d %B %Y ", $tgl_masuk);
            $tgl_keluar =  strftime("%A, %d %B %Y ", $tgl_keluar);


            $out[$i] = array($no, $nama, $no_rm,  $alamat, $no_hp,  $cara_bayar,  $jenis_pelayanan,  $poli, $tgl_masuk,  $tgl_keluar);
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

    // End

    // Admin Permintaan
    public function Admin_buka_permintaan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Admin_buka_permintaan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_permintaan()
    {
        $page_data = $this->M_Logistik_umum->selectDataPermintaan();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            if($page_data[$i]->status != "BUKA"){
                $status = "<div class='btn btn-danger btn-icon-anim btn-square' onclick='edit_buka(\"" . $page_data[$i]->unit ."\")'><i class='icon-lock-open'></i></div>";
            }else{
                $status = "<div class='btn btn-success btn-icon-anim btn-square' onclick='edit_tutup(\"" . $page_data[$i]->unit ."\")'><i class='icon-lock'></i></div>";
            }
            if($page_data[$i]->status !="BUKA"){
               $ket = "<span class='label label-danger'>TUTUP</span>";
            } else{

                $ket = "<span class='label label-success'>BUKA</span></td>";
            }
           
            $no = $i + 1;
            $button1 = $status;
            $unit = $page_data[$i]->unit;

            $out[$i] = array($no, $button1, $unit, $ket);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }

    public function buka_unit(){
        $unit= $this->input->post('unit');
        $status = 'BUKA';
        
        $page_data = array(
            'status' => $status
        );
    
        $where = array(
            'unit' => $unit
        );
        $this->M_Logistik_umum->update_buka($where, $page_data,'admin_logistik_umum');
    
        $out['status']="success";
        echo json_encode($out);
    }

    public function tutup_unit(){
        $unit= $this->input->post('unit');
        $status = 'TUTUP';
        
        $page_data = array(
            'status' => $status
        );
    
        $where = array(
            'unit' => $unit
        );
        $this->M_Logistik_umum->update_tutup($where, $page_data,'admin_logistik_umum');
    
        $out['status']="success";
        echo json_encode($out);
    }
    // End

    // Daftar Barang
    public function Daftar_barang()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Daftar_barang';
        $page_data['satuan'] = $this->M_Logistik_umum->getSatuan();
        $page_data['tipe'] = $this->M_Logistik_umum->getTipe();
        $page_data['jenis_beban'] = $this->M_Logistik_umum->getJenisBeban();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_master_barang()
    {
        $page_data = $this->M_Logistik_umum->selectDataMasterBarang();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $edit ="<button class='btn btn-success btn-icon-anim btn-square' onclick='tampilEditBarang(\"" . $page_data[$i]->id_list ."\")'  ><i class='icon-pencil'></i></button>";
            $mutasi ="<button class='btn btn-primary btn-icon-anim btn-square' onclick='tampilKunjungan(\"" . $page_data[$i]->id_list ."\")'  ><i class='icon-arrow-up-circle'></i></button>";   
            $pembelian = "<button class='btn btn-info btn-icon-anim btn-square' onclick='tampilKunjunganPembelian(\"" . $page_data[$i]->id_list ."\")'  ><i class='fa fa-shopping-cart'></i></button>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $satuan = $page_data[$i]->satuan;
            $tipe = $page_data[$i]->tipe;
            $harga ="Rp. ". number_format($page_data[$i]->harga);
            $jenis_beban = $page_data[$i]->jenis_beban;
            $status = $page_data[$i]->status;

            $out[$i] = array($edit, $mutasi, $pembelian, $no, $nama, $satuan, $tipe, $harga, $jenis_beban, $status);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }

    public function tambah_barang(){
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $golongan = $this->input->post('golongan');
        $tipe = $this->input->post('tipe');
        $harga = $this->input->post('harga');
        $jenis = $this->input->post('jenis');

        $data = array(
            'id_list' => $id,
            'nama' => $nama,
            'satuan' => $tipe,
            'harga' => $harga,
            'tipe' => $golongan,
            'jenis_beban' => $jenis,
            'status' => 'AKTIF',
        );
        $out['status']="success";
        $this->M_Logistik_umum->insert_barang($data);
        echo json_encode($out);
    }

    public function getDataBarang()
    {
        $id_list = $this->input->post('id_list');
        $db = $this->M_Logistik_umum->selectDataById($id_list);
     
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

    public function edit_barang(){
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $golongan = $this->input->post('golongan');
        $tipe = $this->input->post('tipe');
        $harga = $this->input->post('harga');
        $jenis = $this->input->post('jenis');

        $data = array(
            'nama' => $nama,
            'satuan' => $tipe,
            'harga' => $harga,
            'tipe' => $golongan,
            'jenis_beban' => $jenis,
            'status' => 'AKTIF',
        );
        $out['status']="success";
        $this->M_Logistik_umum->update_barang($id, $data);
        echo json_encode($out);
    }

    public function tampil_mutasi()
    {
        $id_list = $this->input->post('id_list');
        $page_data = $this->M_Daftar_barang->getMutasi($id_list);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $ket ="MUTASI";
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $frek = $page_data[$i]->frek;
            $satuan = $page_data[$i]->satuan;
            $jenis_beban = $page_data[$i]->jenis_beban;
            $harga = "Rp. " . number_format($page_data[$i]->harga, 0, ',', '.');
            $hrg = $page_data[$i]->harga;
            $abs = "Rp. " . number_format($hrg * $frek, 0, ',', '.');
            $time = strtotime($page_data[$i]->tgl);
            $date = strftime("%A, %d %B %Y ", $time);
           
            $tgl = $date;

            $out[$i] = array($no, $ket, $nama,  $tipe,  $frek,  $satuan,  $jenis_beban, $harga, $abs, $tgl);
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

    public function tampil_pembelian()
    {
        $id_list = $this->input->post('id_list');
        $page_data = $this->M_Logistik_umum->getPembelian($id_list);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $no_dok =$page_data[$i]->no_dokumen;
            $no_fak = $page_data[$i]->no_faktur;
            $vendor = $page_data[$i]->vendor;
            $nama = $page_data[$i]->nama;
            $satuan = $page_data[$i]->satuan;
            $jumlah = $page_data[$i]->jumlah;
            $sisa ='';
            $harga = "Rp. " . number_format($page_data[$i]->harga, 0, ',', '.');
            $diskon = $page_data[$i]->diskon;
            $ppn = $page_data[$i]->ppn;
            $total = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $time = strtotime($page_data[$i]->tgl_faktur);
            $date = strftime("%A, %d %B %Y ", $time);
           
            $tgl = $date;

            $out[$i] = array($no, $no_dok, $no_fak,  $vendor,  $nama,  $satuan,  $jumlah, $jumlah, $sisa, $harga, $diskon, $ppn, $total, $tgl);
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
    // End

    // Daftar Vendor
    public function Daftar_vendor(){
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Daftar_vendor';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    
    public function tampil_data_vendor()
    {
        $page_data = $this->M_Logistik_umum->selectDataVendor();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $edit ="<button class='btn btn-success btn-icon-anim btn-square' onclick='tampilEditVendor(\"" . $page_data[$i]->id_vendor ."\")'  ><i class='icon-pencil'></i></button>";
            $hapus ="<button class='btn btn-danger btn-icon-anim btn-square' onclick='hapusVendor(\"" . $page_data[$i]->id_vendor .  "\",\"" . $page_data[$i]->nama ."\")'  ><i class='icon-trash'></i></button>";   

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $alamat = $page_data[$i]->alamat;
            $telp = $page_data[$i]->telp;
            $sales = $page_data[$i]->sales;

            $out[$i] = array($edit, $hapus, $no, $nama, $alamat, $telp, $sales);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }

    public function tambah_vendor(){
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $alamat = $this->input->post('alamat');
        $sales = $this->input->post('sales');
        $telp = $this->input->post('telp');

        $data = array(
            'id_vendor' => $id,
            'nama' => $nama,
            'sales' => $sales,
            'alamat' => $alamat,
            'telp' => $telp,
            'status' => 'AKTIF',
        );
        $out['status']="success";
        $this->M_Logistik_umum->insert_vendor($data);
        echo json_encode($out);
    }

    public function edit_vendor(){
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $alamat = $this->input->post('alamat');
        $sales = $this->input->post('sales');
        $telp = $this->input->post('telp');

        $data = array(
            'nama' => $nama,
            'sales' => $sales,
            'alamat' => $alamat,
            'telp' => $telp,
        );
        $out['status']="success";
        $this->M_Logistik_umum->update_vendor($id, $data);
        echo json_encode($out);
    }

    public function getDataVendor()
    {
        $id_vendor = $this->input->post('id_vendor');
        $db = $this->M_Logistik_umum->selectDataVendorById($id_vendor);
     
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
    
    function hapus_vendor()
    {
        $id_vendor = $this->input->post('id_vendor');

        $this->M_Logistik_umum->delete_vendor($id_vendor);
        $out['status'] = "success";
        echo json_encode($out);
    }
    // End Vendor


}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logistik_umum extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Logistik_umum');
    }

    // Laporan mutasi
    public function Laporan_mutasi(){
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_mutasi_umum';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_mutasi(){
        $page_data = $this->M_Logistik_umum->selectLaporanmutasiUmum();

        $out=null;
        for ($i=0; $i < count($page_data); $i++) {
        $no=$i+1;
        $jenis = "MUTASI";
        $nama = $page_data[$i]->nama;
        $tipe = $page_data[$i]->tipe;
        $frek = $page_data[$i]->frek;
        $satuan = $page_data[$i]->satuan;
        $beban = $page_data[$i]->jenis_beban;
        $harga = $page_data[$i]->harga;
        $total = $harga * $frek;
        $time = strtotime($page_data[$i]->tgl);
        $tgl = strftime("%A, %d %B %Y %H:%M WIB", $time);
            $out[$i]=array($no,$jenis,$nama,$tipe,$frek,$satuan,$beban,$harga,$total,$tgl);
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

    public function Tampil_Rangelaporan_mutasi(){

        $mulai = $this->input->post('mulai');
        $akhir= $this->input->post('akhir');
    
        $page_data = $this->M_Logistik_umum->selectRangeLaporanmutasiUmum($mulai,$akhir);

        $out=null;
        for ($i=0; $i < count($page_data); $i++) {
        $no=$i+1;
        $jenis = "MUTASI";
        $nama = $page_data[$i]->nama;
        $tipe = $page_data[$i]->tipe;
        $frek = $page_data[$i]->frek;
        $satuan = $page_data[$i]->satuan;
        $beban = $page_data[$i]->jenis_beban;
        $harga = $page_data[$i]->harga;
        $total = $harga * $frek;
        $time = strtotime($page_data[$i]->tgl);
        $tgl = strftime("%A, %d %B %Y %H:%M WIB", $time);
            $out[$i]=array($no,$jenis,$nama,$tipe,$frek,$satuan,$beban,$harga,$total,$tgl);
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

   
    // End

    // Konfirmasi Permintaan
    public function Konfirmasi_permintaan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Konfirmasi_permintaan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_konfirmasi_permintaan()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $data = $this->input->post('tanggal_masuk');

        if ($this->input->post('tanggal_masuk') && $this->input->post('tanggal_keluar') && $this->input->post('jenis_pelayanan')) {
            $first_date = $this->input->post('tanggal_masuk');
            $second_date = $this->input->post('tanggal_keluar');
            
            if ($first_date != '' || $second_date != '') {
                $page_data = $this->M_Laporan->selectDataPasienKunjungan($first_date, $second_date, $jenis_pelayanan);
            } else if ($first_date = '' || $second_date = '') {
                $page_data = $this->M_Laporan->selectDataPasienKunjungan($tgl, $tgl, '');
            }
        } else {
            $page_data = $this->M_Laporan->selectDataPasienKunjungan($tgl, $tgl, '');
        }

        for ($i = 0; $i < count($page_data); $i++) {


            $tgl_masuk = strtotime($page_data[$i]->tgl_masuk);
            $tgl_keluar = strtotime($page_data[$i]->tgl_keluar);

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $alamat = $page_data[$i]->alamat;
            $no_hp = $page_data[$i]->no_hp;
            $cara_bayar = $page_data[$i]->bayar;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $poli = $page_data[$i]->poli;
            $tgl_masuk =  strftime("%A, %d %B %Y ", $tgl_masuk);
            $tgl_keluar =  strftime("%A, %d %B %Y ", $tgl_keluar);


            $out[$i] = array($no, $nama, $no_rm,  $alamat, $no_hp,  $cara_bayar,  $jenis_pelayanan,  $poli, $tgl_masuk,  $tgl_keluar);
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

    // End

    // Admin Permintaan
    public function Admin_buka_permintaan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Admin_buka_permintaan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_permintaan()
    {
        $page_data = $this->M_Logistik_umum->selectDataPermintaan();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            if($page_data[$i]->status != "BUKA"){
                $status = "<div class='btn btn-danger btn-icon-anim btn-square' onclick='edit_buka(\"" . $page_data[$i]->unit ."\")'><i class='icon-lock-open'></i></div>";
            }else{
                $status = "<div class='btn btn-success btn-icon-anim btn-square' onclick='edit_tutup(\"" . $page_data[$i]->unit ."\")'><i class='icon-lock'></i></div>";
            }
            if($page_data[$i]->status !="BUKA"){
               $ket = "<span class='label label-danger'>TUTUP</span>";
            } else{

                $ket = "<span class='label label-success'>BUKA</span></td>";
            }
           
            $no = $i + 1;
            $button1 = $status;
            $unit = $page_data[$i]->unit;

            $out[$i] = array($no, $button1, $unit, $ket);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }

    public function buka_unit(){
        $unit= $this->input->post('unit');
        $status = 'BUKA';
        
        $page_data = array(
            'status' => $status
        );
    
        $where = array(
            'unit' => $unit
        );
        $this->M_Logistik_umum->update_buka($where, $page_data,'admin_logistik_umum');
    
        $out['status']="success";
        echo json_encode($out);
    }

    public function tutup_unit(){
        $unit= $this->input->post('unit');
        $status = 'TUTUP';
        
        $page_data = array(
            'status' => $status
        );
    
        $where = array(
            'unit' => $unit
        );
        $this->M_Logistik_umum->update_tutup($where, $page_data,'admin_logistik_umum');
    
        $out['status']="success";
        echo json_encode($out);
    }
    // End

    // Daftar Barang
    public function Daftar_barang()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Daftar_barang';
        $page_data['satuan'] = $this->M_Logistik_umum->getSatuan();
        $page_data['tipe'] = $this->M_Logistik_umum->getTipe();
        $page_data['jenis_beban'] = $this->M_Logistik_umum->getJenisBeban();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_master_barang()
    {
        $page_data = $this->M_Logistik_umum->selectDataMasterBarang();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $edit ="<button class='btn btn-success btn-icon-anim btn-square' onclick='tampilEditBarang(\"" . $page_data[$i]->id_list ."\")'  ><i class='icon-pencil'></i></button>";
            $mutasi ="<button class='btn btn-primary btn-icon-anim btn-square' onclick='tampilKunjungan(\"" . $page_data[$i]->id_list ."\")'  ><i class='icon-arrow-up-circle'></i></button>";   
            $pembelian = "<button class='btn btn-info btn-icon-anim btn-square' onclick='tampilKunjunganPembelian(\"" . $page_data[$i]->id_list ."\")'  ><i class='fa fa-shopping-cart'></i></button>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $satuan = $page_data[$i]->satuan;
            $tipe = $page_data[$i]->tipe;
            $harga ="Rp. ". number_format($page_data[$i]->harga);
            $jenis_beban = $page_data[$i]->jenis_beban;
            $status = $page_data[$i]->status;

            $out[$i] = array($edit, $mutasi, $pembelian, $no, $nama, $satuan, $tipe, $harga, $jenis_beban, $status);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }

    public function tambah_barang(){
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $golongan = $this->input->post('golongan');
        $tipe = $this->input->post('tipe');
        $harga = $this->input->post('harga');
        $jenis = $this->input->post('jenis');

        $data = array(
            'id_list' => $id,
            'nama' => $nama,
            'satuan' => $tipe,
            'harga' => $harga,
            'tipe' => $golongan,
            'jenis_beban' => $jenis,
            'status' => 'AKTIF',
        );
        $out['status']="success";
        $this->M_Logistik_umum->insert_barang($data);
        echo json_encode($out);
    }

    public function getDataBarang()
    {
        $id_list = $this->input->post('id_list');
        $db = $this->M_Logistik_umum->selectDataById($id_list);
     
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

    public function edit_barang(){
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $golongan = $this->input->post('golongan');
        $tipe = $this->input->post('tipe');
        $harga = $this->input->post('harga');
        $jenis = $this->input->post('jenis');

        $data = array(
            'nama' => $nama,
            'satuan' => $tipe,
            'harga' => $harga,
            'tipe' => $golongan,
            'jenis_beban' => $jenis,
            'status' => 'AKTIF',
        );
        $out['status']="success";
        $this->M_Logistik_umum->update_barang($id, $data);
        echo json_encode($out);
    }

    public function tampil_mutasi()
    {
        $id_list = $this->input->post('id_list');
        $page_data = $this->M_Daftar_barang->getMutasi($id_list);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $ket ="MUTASI";
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $frek = $page_data[$i]->frek;
            $satuan = $page_data[$i]->satuan;
            $jenis_beban = $page_data[$i]->jenis_beban;
            $harga = "Rp. " . number_format($page_data[$i]->harga, 0, ',', '.');
            $hrg = $page_data[$i]->harga;
            $abs = "Rp. " . number_format($hrg * $frek, 0, ',', '.');
            $time = strtotime($page_data[$i]->tgl);
            $date = strftime("%A, %d %B %Y ", $time);
           
            $tgl = $date;

            $out[$i] = array($no, $ket, $nama,  $tipe,  $frek,  $satuan,  $jenis_beban, $harga, $abs, $tgl);
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

    public function tampil_pembelian()
    {
        $id_list = $this->input->post('id_list');
        $page_data = $this->M_Logistik_umum->getPembelian($id_list);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $no_dok =$page_data[$i]->no_dokumen;
            $no_fak = $page_data[$i]->no_faktur;
            $vendor = $page_data[$i]->vendor;
            $nama = $page_data[$i]->nama;
            $satuan = $page_data[$i]->satuan;
            $jumlah = $page_data[$i]->jumlah;
            $sisa ='';
            $harga = "Rp. " . number_format($page_data[$i]->harga, 0, ',', '.');
            $diskon = $page_data[$i]->diskon;
            $ppn = $page_data[$i]->ppn;
            $total = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $time = strtotime($page_data[$i]->tgl_faktur);
            $date = strftime("%A, %d %B %Y ", $time);
           
            $tgl = $date;

            $out[$i] = array($no, $no_dok, $no_fak,  $vendor,  $nama,  $satuan,  $jumlah, $jumlah, $sisa, $harga, $diskon, $ppn, $total, $tgl);
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
    // End

    // Daftar Vendor
    public function Daftar_vendor(){
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Daftar_vendor';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    
    public function tampil_data_vendor()
    {
        $page_data = $this->M_Logistik_umum->selectDataVendor();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $edit ="<button class='btn btn-success btn-icon-anim btn-square' onclick='tampilEditVendor(\"" . $page_data[$i]->id_vendor ."\")'  ><i class='icon-pencil'></i></button>";
            $hapus ="<button class='btn btn-danger btn-icon-anim btn-square' onclick='hapusVendor(\"" . $page_data[$i]->id_vendor .  "\",\"" . $page_data[$i]->nama ."\")'  ><i class='icon-trash'></i></button>";   

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $alamat = $page_data[$i]->alamat;
            $telp = $page_data[$i]->telp;
            $sales = $page_data[$i]->sales;

            $out[$i] = array($edit, $hapus, $no, $nama, $alamat, $telp, $sales);
        }
        $print['data'] = $out;
        echo json_encode($print);
    }

    public function tambah_vendor(){
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $alamat = $this->input->post('alamat');
        $sales = $this->input->post('sales');
        $telp = $this->input->post('telp');

        $data = array(
            'id_vendor' => $id,
            'nama' => $nama,
            'sales' => $sales,
            'alamat' => $alamat,
            'telp' => $telp,
            'status' => 'AKTIF',
        );
        $out['status']="success";
        $this->M_Logistik_umum->insert_vendor($data);
        echo json_encode($out);
    }

    public function edit_vendor(){
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $alamat = $this->input->post('alamat');
        $sales = $this->input->post('sales');
        $telp = $this->input->post('telp');

        $data = array(
            'nama' => $nama,
            'sales' => $sales,
            'alamat' => $alamat,
            'telp' => $telp,
        );
        $out['status']="success";
        $this->M_Logistik_umum->update_vendor($id, $data);
        echo json_encode($out);
    }

    public function getDataVendor()
    {
        $id_vendor = $this->input->post('id_vendor');
        $db = $this->M_Logistik_umum->selectDataVendorById($id_vendor);
     
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
    
    function hapus_vendor()
    {
        $id_vendor = $this->input->post('id_vendor');

        $this->M_Logistik_umum->delete_vendor($id_vendor);
        $out['status'] = "success";
        echo json_encode($out);
    }
    // End Vendor


}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
