<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perencanaan_obat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Perencanaan');
    }


    public function index()
    {

        $this->load->view('assets/_header');
        $max = $this->M_Perencanaan->selectNoDokumen();
        $i = 0;
        $page_data = array('max' =>  $max[$i]->max + 1,);
        $page_data['vendor'] = $this->db->query('SELECT DISTINCT(produsen) produsen from list_logistik')->result_array();
        // $page_data['vendor'] = $this->db->get('produsen')->result_array();
        $page_data['usulan'] = $this->M_Perencanaan->getPoObat();
        $page_data['page_content'] = 'page_content/Perencanaan_obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function tampil_list_faktur() //untuk usulan
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Perencanaan->getDataFaktur($idFaktur);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $aksi =    "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat(\"" . $page_data[$i]->id_logistik . "\",\"" . $page_data[$i]->nama  . "\",\"" . $page_data[$i]->jumlah . "\",\"" . $page_data[$i]->frek . "\",\"" . $page_data[$i]->harga . "\",\"" . $page_data[$i]->id_detail . "\")'><i class='fa fa-check'></i></a>";


            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $produsen = $page_data[$i]->produsen;
            $jml_obat = $page_data[$i]->jumlah;
            $frek = $page_data[$i]->frek;

            $out[$i] = array($no, $nama_obat,$produsen, $jml_obat, $frek, $aksi);
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
    public function tampil_list_faktur1()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Perencanaan->getDataFaktur1($idFaktur);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            if ($page_data[$i]->status == 1) {

                $hapus = "<span class='label label-success capitalize-font inline-block'>terpenuhi</span>";
            } else {
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail . "\",\"" . $page_data[$i]->id_detail_usulan  .  "\")'><i class='icon-trash'></i></a>";
            }


            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $jml_obat = $page_data[$i]->jumlah;
            $frek = $page_data[$i]->frek;

            $out[$i] = array($no, $nama_obat, $jml_obat, $frek, $hapus);
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
    public function tampil_list_faktur2()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Perencanaan->getDataFaktur1($idFaktur);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            if ($page_data[$i]->status == 1) {

                $hapus = "<span class='label label-success capitalize-font inline-block'>terpenuhi</span>";
            } else {
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail . "\",\"" . $page_data[$i]->id_detail_usulan  .  "\")'><i class='icon-trash'></i></a>";
            }


            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $jml_obat = $page_data[$i]->jumlah;
            $frek = $page_data[$i]->frek;

            $out[$i] = array($no, $nama_obat, $jml_obat, $frek, $hapus);
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

    public function insertFaktur()
    {
        $id_faktur = uniqid();
        $no_dokumen  = $this->input->post('no_dokumen');
        $no_index = $this->input->post('no_index');
        $tgl_faktur = $this->input->post('tgl_faktur');
        $id_usulan = $this->input->post('id_usulan');
        $tgl_input = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');


        $data = array(
            'id_faktur' => $id_faktur,
            'no_dokumen' => $no_dokumen,
            'index_dok' => $no_index,
            'tgl_faktur' => $tgl_faktur,
            'id_usulan' => $id_usulan,
            'tgl_input' => $tgl_input,
            'id_staff' => $data_staff->id_staff
        );

        $data2 = array(
            'id_faktur' => $id_faktur,
            'tipe_faktur' => '-',
            'no_dokumen' => $no_dokumen,
            'index_dok' => $no_index,
            'tgl_faktur' => $tgl_faktur,
            'tgl_tempo' => '-',
            'no_faktur' => '-',
            'id_vendor' => '-',
            'tgl_input' => $tgl_input,
            'id_staff' => $data_staff->id_staff,
            'ket' => '-',
            'jenis' => 'Perencanaan'
        );


        $this->M_Perencanaan->insertObat($data2, 'faktur');

        $this->M_Perencanaan->insertObat($data, 'faktur_perencanaan_logfar');

        // $this->M_Perencanaan->update(['id_faktur' => $id_usulan], ['ket' => 1], 'faktur_usulan_logfar');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function insertObatFaktur()
    {
        $id = $this->input->post('id');
        $idFaktur = $this->input->post('idFaktur');
        $jumlah = $this->input->post('jumlah');
        $frek = $this->input->post('frek');
        $idLogistik = $this->input->post('idLogistik');
        $harga = $this->input->post('harga');
        $tgl = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');
        $id_usulan = $this->input->post('id_du');
        $diskon = $this->input->post('diskon');

        $data = array(
            'id_detail' => $id,
            'id_faktur' => $idFaktur,
            'id_list' => $idLogistik,
            'jumlah' => $jumlah,
            'frek' => $frek,
            'harga' => $harga,
            'total' => $harga * $frek * $jumlah,
            'tgl' => $tgl,
            'id_staff' => $data_staff->id_staff,
            'status' => '0',
            'id_detail_usulan' =>  $id_usulan,
            'diskon' => $diskon ,
        );


        $this->M_Perencanaan->insertObat($data, 'detail_perencanaan_logfar');

        $this->M_Perencanaan->update(['id_detail' => $id_usulan], ['status' => 1], 'detail_usulan_logfar');
        $this->M_Perencanaan->update(['id_logistik' => $idLogistik], ['diskon' => $diskon], 'list_logistik');

        $f_usulan = $this->db->query("SELECT id_usulan from faktur_perencanaan_logfar where id_faktur = '$idFaktur'")->row()->id_usulan;
        $usulan = $this->db->get_where('detail_usulan_logfar',['id_faktur'=>$f_usulan,'status'=>0])->result();
        if(count($usulan)==0){
            $this->M_Perencanaan->update(['id_faktur' => $f_usulan], ['ket' => 1], 'faktur_usulan_logfar');
        }

        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_list_faktur()
    {
        $id_detail = $this->input->post('id_detail');
        $id_usulan = $this->input->post('id_usulan');
        $this->M_Perencanaan->delete($id_detail, 'detail_perencanaan_logfar', 'id_detail');
        $this->M_Perencanaan->update(['id_detail' => $id_usulan], ['status' => 0], 'detail_usulan_logfar');
        $out['status'] = "success";
        echo json_encode($out);
    }
    function request()
    {
        $id = $this->input->post('idFaktur');
        $keterangan = $this->input->post('keterangan');
        $data = [
            'status' => 'DIAJUKAN',
            'status_kains' => 'DIAJUKAN',
            'ket_kains' => '-',
            'status_direktur' => 'DIAJUKAN',
            'ket_direktur' => '-',
            'keterangan' => $keterangan
        ];


        $this->M_Perencanaan->update(['id_faktur' => $id], $data, 'faktur_perencanaan_logfar');
        redirect(base_url('Perencanaan_obat'));
    }
    public function tampil_data()
    {
        $page_data = $this->M_Perencanaan->selectData();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {


            if ($page_data[$i]->status == 'DIAJUKAN') {
                $edit = '';
                $hapus = '';
                $pilih = '';
                $vendor = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur1(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";

                $request = "<span class='label label-warning capitalize-font inline-block'>REQUESTED<span>";
            } elseif ($page_data[$i]->status == 'DITOLAK') {
                $edit = '';
                $hapus = '';
                $pilih = '';
                $vendor = '';
                $request = "<span class='label label-danger capitalize-font inline-block'>DITOLAK<span>";
            } elseif ($page_data[$i]->status == 'DITERIMA') {
                $edit = '';
                $hapus = '';
                $pilih = '';
                $vendor = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur1(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";

                $request = "<a class='btn btn-primary btn-icon-anim btn-square' href='Perencanaan_obat/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";;
            } else {


                $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur .  "\")'><i class='icon-trash'></i></a>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";
                $vendor = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur1(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";
                $request = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='request(\"" . $page_data[$i]->id_faktur . "\")'><i class='fa fa-thumbs-up'></i></a>";
            }

            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $no_usulan = $page_data[$i]->no_usulan;
            $status = $page_data[$i]->status;
            $status_kains = $page_data[$i]->status_kains;
            $ket_kains = $page_data[$i]->ket_kains;
            $status_direktur = $page_data[$i]->status_direktur;
            $ket_direktur = $page_data[$i]->ket_direktur;
            if($page_data[$i]->tgl_acc_kains == null){
                $tgl_acc_kains="-";
            }else{
                $date = strtotime($page_data[$i]->tgl_acc_kains);
                $tgl_acc_kains = strftime(" %d %B %Y %T", $date);
            }
            if($page_data[$i]->tgl_acc_direktur == null){
                $tgl_acc_direktur="-";
            }else{
                $date1 = strtotime($page_data[$i]->tgl_acc_direktur);
                $tgl_acc_direktur = strftime(" %d %B %Y %T", $date1);
            }

            $out[$i] = array($no, $request, $pilih, $vendor, $hapus, $edit, $no_dokumen, $tgl_input, $tgl_faktur, $no_usulan, $status, $status_kains, $ket_kains,$tgl_acc_kains , $status_direktur, $ket_direktur,$tgl_acc_direktur);
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
    public function tampil_range()
    {



        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Perencanaan->selectRangePo($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {


            if ($page_data[$i]->status == 'DIAJUKAN') {
                $edit = '';
                $hapus = '';
                $pilih = '';
                $vendor = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur1(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";

                $request = "<span class='label label-warning capitalize-font inline-block'>REQUESTED<span>";
            } elseif ($page_data[$i]->status == 'DITOLAK') {
                $edit = '';
                $hapus = '';
                $pilih = '';
                $vendor = '';
                $request = "<span class='label label-danger capitalize-font inline-block'>DITOLAK<span>";
            } elseif ($page_data[$i]->status == 'DITERIMA') {
                $edit = '';
                $hapus = '';
                $pilih = '';
                $vendor = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur1(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";
                $request = "<a class='btn btn-primary btn-icon-anim btn-square' href='Perencanaan_obat/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";;
            } else {


                $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur .  "\")'><i class='icon-trash'></i></a>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";
                $vendor = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur1(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";
                $request = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='request(\"" . $page_data[$i]->id_faktur . "\")'><i class='fa fa-thumbs-up'></i></a>";
            }

            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $no_usulan = $page_data[$i]->no_usulan;
            
            $status_kains = $page_data[$i]->status_kains;
            $status = $page_data[$i]->status;
            $ket_kains = $page_data[$i]->ket_kains;
            $status_direktur = $page_data[$i]->status_direktur;
            $ket_direktur = $page_data[$i]->ket_direktur;
            if($page_data[$i]->tgl_acc_kains == null){
                $tgl_acc_kains="-";
            }else{
                $date = strtotime($page_data[$i]->tgl_acc_kains);
                $tgl_acc_kains = strftime(" %d %B %Y %T", $date);
            }
            if($page_data[$i]->tgl_acc_direktur == null){
                $tgl_acc_direktur="-";
            }else{
                $date1 = strtotime($page_data[$i]->tgl_acc_direktur);
                $tgl_acc_direktur = strftime(" %d %B %Y %T", $date1);
            }

            $out[$i] = array($no, $request, $pilih, $vendor, $hapus, $edit, $no_dokumen, $tgl_input, $tgl_faktur, $no_usulan, $status, $status_kains, $ket_kains,$tgl_acc_kains, $status_direktur, $ket_direktur,$tgl_acc_direktur);
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

    public function approve()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Perencanaan_obat_approve';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_approve()
    {
        $data_staff = $this->session->userdata('data_auth');

        $page_data = $this->M_Perencanaan->selectDataApprove();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $label =     "<a class='btn btn-danger btn-icon-anim btn-square' href='Po_obat/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";


            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";
            $request = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url('Perencanaan_obat/acc/') . $page_data[$i]->id_faktur . "'><i class='fa fa-thumbs-up'></i></a><a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur  . "\")'><i class='fa fa-ellipsis-h'></i></a>";


            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $no_usulan = $page_data[$i]->no_usulan;
            $keterangan = $page_data[$i]->keterangan;


            $out[$i] = array($no, $request, $pilih, $no_dokumen, $keterangan, $tgl_input, $tgl_faktur, $no_usulan,);
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
    function acc($id)
    {
        $data_staff = $this->session->userdata('data_auth');
        if ($data_staff->tipe == "logistik farmasi" && $data_staff->izin_akses == "admin") {
            $data = [
                'status_kains' => 'DITERIMA',
                'ket_kains' => '-',
                'tgl_acc_kains' => date('Y-m-d H:i:s'),
            ];
        }
        if ($data_staff->tipe == "direktur" && $data_staff->izin_akses == "admin") {
            $data = [
                'status' => 'DITERIMA',
                'status_direktur' => 'DITERIMA',
                'ket_direktur' => '-',
                'tgl_acc_direktur' => date('Y-m-d H:i:s'),
            ];
        }
        $this->M_Perencanaan->update(['id_faktur' => $id], $data, 'faktur_perencanaan_logfar');
        redirect(base_url('Perencanaan_obat/approve'));
    }
    function konfirmasi()
    {
        $id = $this->input->post('id');
        $acc = $this->input->post('acc');
        $ket = $this->input->post('ket');
        $data_staff = $this->session->userdata('data_auth');
        if ($data_staff->tipe == "logistik farmasi" && $data_staff->izin_akses == "admin") {
            if($acc == "DITOLAK"){
                $data = [
                    'status' => "DITOLAK",
                    'status_kains' => $acc,
                    'ket_kains' => $ket,
                    'tgl_acc_kains' => date('Y-m-d H:i:s'),
                ];
            }
            $data = [

                'status_kains' => $acc,
                'ket_kains' => $ket,
                'tgl_acc_kains' => date('Y-m-d H:i:s'),
            ];
        }
        if ($data_staff->tipe == "direktur" && $data_staff->izin_akses == "admin") {
            $data = [
                'status' => $acc,
                'status_direktur' => $acc,
                'ket_direktur' => $ket,
                'tgl_acc_direktur' => date('Y-m-d H:i:s'),
            ];
        }
        $this->M_Perencanaan->update(['id_faktur' => $id], $data, 'faktur_perencanaan_logfar');
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_faktur_po()
    {
        $id_faktur = $this->input->post('id_faktur');
        $this->M_Perencanaan->delete($id_faktur, 'faktur_perencanaan_logfar', 'id_faktur');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function getObatById()
    {

        $id_logistik = $this->input->post('id_logistik');
        $db = $this->M_Perencanaan->getDataFaktur1($id_logistik);
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
    public function getVendorById()
    {

        $id_faktur = $this->input->post('id_faktur');
        $db = $this->db->get_where('vendor_pr_obat', ['id_pr' => $id_faktur])->result();
        $db1 = $this->db->get_where('detail_perencanaan_logfar', ['id_faktur' => $id_faktur])->result();
        if (count($db1)>0) {
            if (count($db)>0) {
                $data['status_dt']= 'found';
                $data['status_obat'] = 'found';
            }else{
                $data['status_dt'] = 'not found';
                $data['status_obat'] = 'found';
            }
           
        } else {
            if (count($db)>0) {
                $data['status_dt'] = 'found';
                $data['status_obat'] = 'not found';
            }else{
                $data['status_dt'] = 'not found';
                $data['status_obat'] = 'not found';
            }
        }
        echo json_encode($data);
        exit;
    }
    public function print_out($id_faktur)

    {
        $data['judul']="PERENCANAAN";
        $pr = $this->db->get_where('faktur_perencanaan_logfar',['id_faktur'=>$id_faktur])->row();
        $data['usulan'] = $pr; 
        $data['usulan1'] = $this->db->get_where('faktur_usulan_logfar',['id_faktur'=>$pr->id_usulan])->row();
        $data['data'] = $this->M_Perencanaan->getDataFaktur1($id_faktur);
        $this->load->view('print/cetak_usulan', $data);
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perencanaan_obat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Perencanaan');
    }


    public function index()
    {

        $this->load->view('assets/_header');
        $max = $this->M_Perencanaan->selectNoDokumen();
        $i = 0;
        $page_data = array('max' =>  $max[$i]->max + 1,);
        $page_data['vendor'] = $this->db->query('SELECT DISTINCT(produsen) produsen from list_logistik')->result_array();
        // $page_data['vendor'] = $this->db->get('produsen')->result_array();
        $page_data['usulan'] = $this->M_Perencanaan->getPoObat();
        $page_data['page_content'] = 'page_content/Perencanaan_obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function tampil_list_faktur() //untuk usulan
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Perencanaan->getDataFaktur($idFaktur);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $aksi =    "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat(\"" . $page_data[$i]->id_logistik . "\",\"" . $page_data[$i]->nama  . "\",\"" . $page_data[$i]->jumlah . "\",\"" . $page_data[$i]->frek . "\",\"" . $page_data[$i]->harga . "\",\"" . $page_data[$i]->id_detail . "\")'><i class='fa fa-check'></i></a>";


            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $produsen = $page_data[$i]->produsen;
            $jml_obat = $page_data[$i]->jumlah;
            $frek = $page_data[$i]->frek;

            $out[$i] = array($no, $nama_obat,$produsen, $jml_obat, $frek, $aksi);
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
    public function tampil_list_faktur1()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Perencanaan->getDataFaktur1($idFaktur);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            if ($page_data[$i]->status == 1) {

                $hapus = "<span class='label label-success capitalize-font inline-block'>terpenuhi</span>";
            } else {
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail . "\",\"" . $page_data[$i]->id_detail_usulan  .  "\")'><i class='icon-trash'></i></a>";
            }


            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $jml_obat = $page_data[$i]->jumlah;
            $frek = $page_data[$i]->frek;

            $out[$i] = array($no, $nama_obat, $jml_obat, $frek, $hapus);
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
    public function tampil_list_faktur2()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Perencanaan->getDataFaktur1($idFaktur);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            if ($page_data[$i]->status == 1) {

                $hapus = "<span class='label label-success capitalize-font inline-block'>terpenuhi</span>";
            } else {
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail . "\",\"" . $page_data[$i]->id_detail_usulan  .  "\")'><i class='icon-trash'></i></a>";
            }


            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $jml_obat = $page_data[$i]->jumlah;
            $frek = $page_data[$i]->frek;

            $out[$i] = array($no, $nama_obat, $jml_obat, $frek, $hapus);
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

    public function insertFaktur()
    {
        $id_faktur = uniqid();
        $no_dokumen  = $this->input->post('no_dokumen');
        $no_index = $this->input->post('no_index');
        $tgl_faktur = $this->input->post('tgl_faktur');
        $id_usulan = $this->input->post('id_usulan');
        $tgl_input = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');


        $data = array(
            'id_faktur' => $id_faktur,
            'no_dokumen' => $no_dokumen,
            'index_dok' => $no_index,
            'tgl_faktur' => $tgl_faktur,
            'id_usulan' => $id_usulan,
            'tgl_input' => $tgl_input,
            'id_staff' => $data_staff->id_staff
        );

        $data2 = array(
            'id_faktur' => $id_faktur,
            'tipe_faktur' => '-',
            'no_dokumen' => $no_dokumen,
            'index_dok' => $no_index,
            'tgl_faktur' => $tgl_faktur,
            'tgl_tempo' => '-',
            'no_faktur' => '-',
            'id_vendor' => '-',
            'tgl_input' => $tgl_input,
            'id_staff' => $data_staff->id_staff,
            'ket' => '-',
            'jenis' => 'Perencanaan'
        );


        $this->M_Perencanaan->insertObat($data2, 'faktur');

        $this->M_Perencanaan->insertObat($data, 'faktur_perencanaan_logfar');

        // $this->M_Perencanaan->update(['id_faktur' => $id_usulan], ['ket' => 1], 'faktur_usulan_logfar');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function insertObatFaktur()
    {
        $id = $this->input->post('id');
        $idFaktur = $this->input->post('idFaktur');
        $jumlah = $this->input->post('jumlah');
        $frek = $this->input->post('frek');
        $idLogistik = $this->input->post('idLogistik');
        $harga = $this->input->post('harga');
        $tgl = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');
        $id_usulan = $this->input->post('id_du');
        $diskon = $this->input->post('diskon');

        $data = array(
            'id_detail' => $id,
            'id_faktur' => $idFaktur,
            'id_list' => $idLogistik,
            'jumlah' => $jumlah,
            'frek' => $frek,
            'harga' => $harga,
            'total' => $harga * $frek * $jumlah,
            'tgl' => $tgl,
            'id_staff' => $data_staff->id_staff,
            'status' => '0',
            'id_detail_usulan' =>  $id_usulan,
            'diskon' => $diskon ,
        );


        $this->M_Perencanaan->insertObat($data, 'detail_perencanaan_logfar');

        $this->M_Perencanaan->update(['id_detail' => $id_usulan], ['status' => 1], 'detail_usulan_logfar');
        $this->M_Perencanaan->update(['id_logistik' => $idLogistik], ['diskon' => $diskon], 'list_logistik');

        $f_usulan = $this->db->query("SELECT id_usulan from faktur_perencanaan_logfar where id_faktur = '$idFaktur'")->row()->id_usulan;
        $usulan = $this->db->get_where('detail_usulan_logfar',['id_faktur'=>$f_usulan,'status'=>0])->result();
        if(count($usulan)==0){
            $this->M_Perencanaan->update(['id_faktur' => $f_usulan], ['ket' => 1], 'faktur_usulan_logfar');
        }

        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_list_faktur()
    {
        $id_detail = $this->input->post('id_detail');
        $id_usulan = $this->input->post('id_usulan');
        $this->M_Perencanaan->delete($id_detail, 'detail_perencanaan_logfar', 'id_detail');
        $this->M_Perencanaan->update(['id_detail' => $id_usulan], ['status' => 0], 'detail_usulan_logfar');
        $out['status'] = "success";
        echo json_encode($out);
    }
    function request()
    {
        $id = $this->input->post('idFaktur');
        $keterangan = $this->input->post('keterangan');
        $data = [
            'status' => 'DIAJUKAN',
            'status_kains' => 'DIAJUKAN',
            'ket_kains' => '-',
            'status_direktur' => 'DIAJUKAN',
            'ket_direktur' => '-',
            'keterangan' => $keterangan
        ];


        $this->M_Perencanaan->update(['id_faktur' => $id], $data, 'faktur_perencanaan_logfar');
        redirect(base_url('Perencanaan_obat'));
    }
    public function tampil_data()
    {
        $page_data = $this->M_Perencanaan->selectData();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {


            if ($page_data[$i]->status == 'DIAJUKAN') {
                $edit = '';
                $hapus = '';
                $pilih = '';
                $vendor = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur1(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";

                $request = "<span class='label label-warning capitalize-font inline-block'>REQUESTED<span>";
            } elseif ($page_data[$i]->status == 'DITOLAK') {
                $edit = '';
                $hapus = '';
                $pilih = '';
                $vendor = '';
                $request = "<span class='label label-danger capitalize-font inline-block'>DITOLAK<span>";
            } elseif ($page_data[$i]->status == 'DITERIMA') {
                $edit = '';
                $hapus = '';
                $pilih = '';
                $vendor = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur1(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";

                $request = "<a class='btn btn-primary btn-icon-anim btn-square' href='Perencanaan_obat/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";;
            } else {


                $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur .  "\")'><i class='icon-trash'></i></a>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";
                $vendor = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur1(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";
                $request = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='request(\"" . $page_data[$i]->id_faktur . "\")'><i class='fa fa-thumbs-up'></i></a>";
            }

            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $no_usulan = $page_data[$i]->no_usulan;
            $status = $page_data[$i]->status;
            $status_kains = $page_data[$i]->status_kains;
            $ket_kains = $page_data[$i]->ket_kains;
            $status_direktur = $page_data[$i]->status_direktur;
            $ket_direktur = $page_data[$i]->ket_direktur;
            if($page_data[$i]->tgl_acc_kains == null){
                $tgl_acc_kains="-";
            }else{
                $date = strtotime($page_data[$i]->tgl_acc_kains);
                $tgl_acc_kains = strftime(" %d %B %Y %T", $date);
            }
            if($page_data[$i]->tgl_acc_direktur == null){
                $tgl_acc_direktur="-";
            }else{
                $date1 = strtotime($page_data[$i]->tgl_acc_direktur);
                $tgl_acc_direktur = strftime(" %d %B %Y %T", $date1);
            }

            $out[$i] = array($no, $request, $pilih, $vendor, $hapus, $edit, $no_dokumen, $tgl_input, $tgl_faktur, $no_usulan, $status, $status_kains, $ket_kains,$tgl_acc_kains , $status_direktur, $ket_direktur,$tgl_acc_direktur);
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
    public function tampil_range()
    {



        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Perencanaan->selectRangePo($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {


            if ($page_data[$i]->status == 'DIAJUKAN') {
                $edit = '';
                $hapus = '';
                $pilih = '';
                $vendor = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur1(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";

                $request = "<span class='label label-warning capitalize-font inline-block'>REQUESTED<span>";
            } elseif ($page_data[$i]->status == 'DITOLAK') {
                $edit = '';
                $hapus = '';
                $pilih = '';
                $vendor = '';
                $request = "<span class='label label-danger capitalize-font inline-block'>DITOLAK<span>";
            } elseif ($page_data[$i]->status == 'DITERIMA') {
                $edit = '';
                $hapus = '';
                $pilih = '';
                $vendor = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur1(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";
                $request = "<a class='btn btn-primary btn-icon-anim btn-square' href='Perencanaan_obat/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";;
            } else {


                $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur .  "\")'><i class='icon-trash'></i></a>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";
                $vendor = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur1(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";
                $request = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='request(\"" . $page_data[$i]->id_faktur . "\")'><i class='fa fa-thumbs-up'></i></a>";
            }

            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $no_usulan = $page_data[$i]->no_usulan;
            
            $status_kains = $page_data[$i]->status_kains;
            $status = $page_data[$i]->status;
            $ket_kains = $page_data[$i]->ket_kains;
            $status_direktur = $page_data[$i]->status_direktur;
            $ket_direktur = $page_data[$i]->ket_direktur;
            if($page_data[$i]->tgl_acc_kains == null){
                $tgl_acc_kains="-";
            }else{
                $date = strtotime($page_data[$i]->tgl_acc_kains);
                $tgl_acc_kains = strftime(" %d %B %Y %T", $date);
            }
            if($page_data[$i]->tgl_acc_direktur == null){
                $tgl_acc_direktur="-";
            }else{
                $date1 = strtotime($page_data[$i]->tgl_acc_direktur);
                $tgl_acc_direktur = strftime(" %d %B %Y %T", $date1);
            }

            $out[$i] = array($no, $request, $pilih, $vendor, $hapus, $edit, $no_dokumen, $tgl_input, $tgl_faktur, $no_usulan, $status, $status_kains, $ket_kains,$tgl_acc_kains, $status_direktur, $ket_direktur,$tgl_acc_direktur);
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

    public function approve()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Perencanaan_obat_approve';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_approve()
    {
        $data_staff = $this->session->userdata('data_auth');

        $page_data = $this->M_Perencanaan->selectDataApprove();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $label =     "<a class='btn btn-danger btn-icon-anim btn-square' href='Po_obat/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";


            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_usulan . "\")'><i class='icon-note'></i></a>";
            $request = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url('Perencanaan_obat/acc/') . $page_data[$i]->id_faktur . "'><i class='fa fa-thumbs-up'></i></a><a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur  . "\")'><i class='fa fa-ellipsis-h'></i></a>";


            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $no_usulan = $page_data[$i]->no_usulan;
            $keterangan = $page_data[$i]->keterangan;


            $out[$i] = array($no, $request, $pilih, $no_dokumen, $keterangan, $tgl_input, $tgl_faktur, $no_usulan,);
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
    function acc($id)
    {
        $data_staff = $this->session->userdata('data_auth');
        if ($data_staff->tipe == "logistik farmasi" && $data_staff->izin_akses == "admin") {
            $data = [
                'status_kains' => 'DITERIMA',
                'ket_kains' => '-',
                'tgl_acc_kains' => date('Y-m-d H:i:s'),
            ];
        }
        if ($data_staff->tipe == "direktur" && $data_staff->izin_akses == "admin") {
            $data = [
                'status' => 'DITERIMA',
                'status_direktur' => 'DITERIMA',
                'ket_direktur' => '-',
                'tgl_acc_direktur' => date('Y-m-d H:i:s'),
            ];
        }
        $this->M_Perencanaan->update(['id_faktur' => $id], $data, 'faktur_perencanaan_logfar');
        redirect(base_url('Perencanaan_obat/approve'));
    }
    function konfirmasi()
    {
        $id = $this->input->post('id');
        $acc = $this->input->post('acc');
        $ket = $this->input->post('ket');
        $data_staff = $this->session->userdata('data_auth');
        if ($data_staff->tipe == "logistik farmasi" && $data_staff->izin_akses == "admin") {
            if($acc == "DITOLAK"){
                $data = [
                    'status' => "DITOLAK",
                    'status_kains' => $acc,
                    'ket_kains' => $ket,
                    'tgl_acc_kains' => date('Y-m-d H:i:s'),
                ];
            }
            $data = [

                'status_kains' => $acc,
                'ket_kains' => $ket,
                'tgl_acc_kains' => date('Y-m-d H:i:s'),
            ];
        }
        if ($data_staff->tipe == "direktur" && $data_staff->izin_akses == "admin") {
            $data = [
                'status' => $acc,
                'status_direktur' => $acc,
                'ket_direktur' => $ket,
                'tgl_acc_direktur' => date('Y-m-d H:i:s'),
            ];
        }
        $this->M_Perencanaan->update(['id_faktur' => $id], $data, 'faktur_perencanaan_logfar');
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_faktur_po()
    {
        $id_faktur = $this->input->post('id_faktur');
        $this->M_Perencanaan->delete($id_faktur, 'faktur_perencanaan_logfar', 'id_faktur');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function getObatById()
    {

        $id_logistik = $this->input->post('id_logistik');
        $db = $this->M_Perencanaan->getDataFaktur1($id_logistik);
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
    public function getVendorById()
    {

        $id_faktur = $this->input->post('id_faktur');
        $db = $this->db->get_where('vendor_pr_obat', ['id_pr' => $id_faktur])->result();
        $db1 = $this->db->get_where('detail_perencanaan_logfar', ['id_faktur' => $id_faktur])->result();
        if (count($db1)>0) {
            if (count($db)>0) {
                $data['status_dt']= 'found';
                $data['status_obat'] = 'found';
            }else{
                $data['status_dt'] = 'not found';
                $data['status_obat'] = 'found';
            }
           
        } else {
            if (count($db)>0) {
                $data['status_dt'] = 'found';
                $data['status_obat'] = 'not found';
            }else{
                $data['status_dt'] = 'not found';
                $data['status_obat'] = 'not found';
            }
        }
        echo json_encode($data);
        exit;
    }
    public function print_out($id_faktur)

    {
        $data['judul']="PERENCANAAN";
        $pr = $this->db->get_where('faktur_perencanaan_logfar',['id_faktur'=>$id_faktur])->row();
        $data['usulan'] = $pr; 
        $data['usulan1'] = $this->db->get_where('faktur_usulan_logfar',['id_faktur'=>$pr->id_usulan])->row();
        $data['data'] = $this->M_Perencanaan->getDataFaktur1($id_faktur);
        $this->load->view('print/cetak_usulan', $data);
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
