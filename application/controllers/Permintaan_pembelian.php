<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan_pembelian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Pr_obat');
    }

    public function getObatById()
    {
      
        $id_logistik = $this->input->post('id_logistik');
        $db = $this->M_Pr_obat->getDataFaktur1($id_logistik);
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
    public function updateObatFaktur()
    {
        $data_staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id');
        $jumlah = $this->input->post('jumlah');
        $frek = $this->input->post('frek');
        $harga = $this->input->post('harga');

        $data = array(
            'id_detail' => $id,
            
            'jumlah' => $jumlah,
            'frek' => $frek,
            'harga' => $harga,
            'total' => $harga * $frek * $jumlah,
            'id_staff' => $data_staff->id_staff,
        );


        $this->M_Pr_obat->update(['id_detail' => $id],$data, 'detail_perencanaan_logfar');
        
      
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_list_faktur()
    {
        $data_staff = $this->session->userdata('data_auth');
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Pr_obat->getDataFakturPerencanaan($idFaktur);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $pilih =  "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat(\"" . $page_data[$i]->id_detail .  "\")'><i class='icon-note'></i></a>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $produsen = $page_data[$i]->produsen;
            $harga = $page_data[$i]->harga;
            $jumlah = $page_data[$i]->jumlah;
            $total = $page_data[$i]->total;
            $frek = $page_data[$i]->frek;
            $tipe = $page_data[$i]->satuan_terkecil;
            $tipe1 = $page_data[$i]->satuan_terbesar;

            if ($data_staff->tipe == "logistik farmasi" && $data_staff->izin_akses == "admin") {
                $out[$i] = array($no, $pilih, $nama, $harga, $jumlah, $frek, $tipe, $tipe1, $total);
            }else{
                $out[$i] = array($no, $nama,$produsen, $harga, $jumlah, $frek, $tipe, $tipe1, $total);

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
    public function tampil_total_harga()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Pr_obat->HitungPO($idFaktur);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $id_detail  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $out[$i] = array($id_detail);
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


    public function print_out($id_faktur)

    {
        $data['cetak_po'] = $this->M_Pr_obat->getDataPo($id_faktur);
        $data['cetak_po2'] = $this->M_Pr_obat->getDataPo2($id_faktur);
        $this->load->view('print/cetak_po', $data);
    }


    public function insertFaktur()
    {



        $id_faktur = uniqid();
        $no_dokumen  = $this->input->post('no_dokumen');
        $no_index = $this->input->post('no_index');
        $tgl_faktur = $this->input->post('tgl_faktur');
        //$id_vendor = $this->input->post('id_vendor');
        $tgl_input = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');
        $inPR = $this->input->post('inPR');

        $data = array(
            'id_faktur' => $id_faktur,
            'no_dokumen' => $no_dokumen,
            'index_dok' => $no_index,
            'tgl_faktur' => $tgl_faktur,
            //'id_vendor' => $id_vendor,
            'tgl_input' => $tgl_input,
            'id_staff' => $data_staff->id_staff,
            'id_perencanaan' => $inPR
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
            'jenis' => 'farmasi'
        );


        $this->M_Pr_obat->insertFaktur($data2, 'faktur');

        $this->M_Pr_obat->insertFaktur($data, 'faktur_pr_obat');
        $this->M_Pr_obat->update(['id_faktur' => $inPR], ['ket' => 1], 'faktur_perencanaan_logfar');
        $out['status'] = "success";
        
        $out['status'] = "success";
        echo json_encode($out);
    }

    //tampil data 


    //tampil list data 

   

    //end tampil list 

    //hapus

    function hapus_list_faktur()
    {
        $id_detail = $this->input->post('id_detail');
        $this->M_Pr_obat->delete_po($id_detail);
        $out['status'] = "success";
        echo json_encode($out);
    }

    //hapus


    //insert 

    public function insertObatFaktur()
    {

        //$id_detail = uniqid();
        $id = $this->input->post('id');
        //$id2 = $this->input->post('id2');
        $idFaktur = $this->input->post('idFaktur');
        $harga = $this->input->post('harga');
        $frek = $this->input->post('frek');


        $total = $this->input->post('total');
        //$idFaktur = $this->input->post('idFaktur');
        $idLogistik = $this->input->post('idLogistik');
        $vendor = $this->input->post('vendor');
        $ppn = $this->input->post('ppn');
        $diskon = $this->input->post('diskon');

        $tgl = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');
        $id_detail = $this->input->post('id_detail');

        $data = array(
            'id_detail' => $id,
            'id_faktur' => $idFaktur,
            'id_list' => $idLogistik,
            'id_detail_perencanaan' => $id_detail,
            'jumlah' => $frek,
            'harga' => $harga,
            'total' => $total,
            'tgl' => $tgl,
            'id_staff' => $data_staff->id_staff,
            'status' => '0',
            'frek' => $diskon,

        );

        $this->M_Pr_obat->insertDetail($data, 'detail_pr_obat');

        //$this->M_Pr_obat->update(['id_detail' => $id_detail], ['status' => 1], 'detail_perencanaan_logfar');


        $out['status'] = "success";
        echo json_encode($out);
    }



    //end insert

    public function tampil_data()
    {
        $page_data = $this->M_Pr_obat->selectData();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $label =     "<a class='btn btn-danger btn-icon-anim btn-square' href='Po_obat/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";
            $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur .  "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_perencanaan . "\")'><i class='icon-note'></i></a>";


            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $no_perencanaan = $page_data[$i]->no_perencanaan;

            $out[$i] = array($no, $label, $pilih, $hapus, $edit, $no_dokumen, $tgl_input, $tgl_faktur, $no_perencanaan);
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


    //end tampil data

    //tampil range permit

    public function tampil_rangePo()
    {



        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Pr_obat->selectRangePo($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $label =     "<a class='btn btn-danger btn-icon-anim btn-square' href='Po_obat/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";
            $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur .  "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-note'></i></a>";

            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $id_vendor = $page_data[$i]->id_vendor;

            $out[$i] = array($no, $label, $pilih, $hapus, $edit, $no_dokumen, $tgl_input, $tgl_faktur, $id_vendor,);
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

    //end tampil range permit

    public function getDataListFaktur()
    {
        $id_faktur = $this->M_Pembelian_obat->selectIndex();
        $faktursekarang = $this->M_Pembelian_obat->selectIndex2($id_faktur);

        $id_detail = $this->input->post('id_detail');
        $db = $this->M_Pr_obat->select_data_list_faktur($id_detail);

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
  

    //hapus faktur

    function hapus_faktur()
    {
        $id_faktur = $this->input->post('id_faktur');
        $this->M_Pr_obat->delete_faktur($id_faktur);
        $out['status'] = "success";
        echo json_encode($out);
    }

 


  
    //get no faktur

    public function check_noFaktur()
    {
        $no_faktur = $this->input->post("no_faktur");
        $tmp_data = $this->M_Pr_obat->get_nofaktur($no_faktur);

        if (count($tmp_data) > 0) {
            echo '<label class="text-danger pt-10"><span><i class="fa fa-times" aria-hidden="true">
            </i> No Faktur tidak tersedia</span></label>';
        } else {
            echo '<label class="text-success pt-10"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> No Faktur tersedia</span></label>';
        }
    }

    //end no faktur

    public function tampil_list_faktur2()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->db->get('produsen')->result();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
			$tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_produsen(\"" . $idFaktur . "\",\"" . $page_data[$i]->id_produsen . "\",\"" . $page_data[$i]->nama_produsen . "\")' '><i class='icon-plus'></i></button>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama_produsen;

            $out[$i] = array($no, $nama, $tombol);
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
    public function tampil_produsen()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Pr_obat->getProdusenById($idFaktur);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
			$tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_produsen(\"" . $page_data[$i]->id_list . "\",\"" . $page_data[$i]->nama_produsen . "\")' '><i class='icon-trash'></i></button>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama_produsen;
            $alamat = $page_data[$i]->alamat;
            $telp = $page_data[$i]->telp;

            $out[$i] = array($no, $nama,$alamat,$telp, $tombol);
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
    function tambah_produsen()
    {
        $data = [
            'id_pr' => $this->input->post('id'),
            'id_produsen' => $this->input->post('id_produsen'),
            'nama_produsen' => $this->input->post('produsen'),

        ];
        $this->M_Pr_obat->insertFaktur($data, 'vendor_pr_obat');
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_faktur_po()
    {
        $id_faktur = $this->input->post('id');
        $this->M_Pr_obat->delete($id_faktur, 'faktur_usulan_logfar','id_faktur');
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_produsen()
	{
		$id_faktur = $this->input->post('id');
        $this->M_Pr_obat->delete($id_faktur, 'vendor_pr_obat','id_list');
        $out['status'] = "success";
        echo json_encode($out);
	}
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan_pembelian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Pr_obat');
    }

    public function getObatById()
    {
      
        $id_logistik = $this->input->post('id_logistik');
        $db = $this->M_Pr_obat->getDataFaktur1($id_logistik);
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
    public function updateObatFaktur()
    {
        $data_staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id');
        $jumlah = $this->input->post('jumlah');
        $frek = $this->input->post('frek');
        $harga = $this->input->post('harga');

        $data = array(
            'id_detail' => $id,
            
            'jumlah' => $jumlah,
            'frek' => $frek,
            'harga' => $harga,
            'total' => $harga * $frek * $jumlah,
            'id_staff' => $data_staff->id_staff,
        );


        $this->M_Pr_obat->update(['id_detail' => $id],$data, 'detail_perencanaan_logfar');
        
      
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_list_faktur()
    {
        $data_staff = $this->session->userdata('data_auth');
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Pr_obat->getDataFakturPerencanaan($idFaktur);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $pilih =  "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat(\"" . $page_data[$i]->id_detail .  "\")'><i class='icon-note'></i></a>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $produsen = $page_data[$i]->produsen;
            $harga = $page_data[$i]->harga;
            $jumlah = $page_data[$i]->jumlah;
            $total = $page_data[$i]->total;
            $frek = $page_data[$i]->frek;
            $tipe = $page_data[$i]->satuan_terkecil;
            $tipe1 = $page_data[$i]->satuan_terbesar;

            if ($data_staff->tipe == "logistik farmasi" && $data_staff->izin_akses == "admin") {
                $out[$i] = array($no, $pilih, $nama, $harga, $jumlah, $frek, $tipe, $tipe1, $total);
            }else{
                $out[$i] = array($no, $nama,$produsen, $harga, $jumlah, $frek, $tipe, $tipe1, $total);

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
    public function tampil_total_harga()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Pr_obat->HitungPO($idFaktur);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $id_detail  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $out[$i] = array($id_detail);
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


    public function print_out($id_faktur)

    {
        $data['cetak_po'] = $this->M_Pr_obat->getDataPo($id_faktur);
        $data['cetak_po2'] = $this->M_Pr_obat->getDataPo2($id_faktur);
        $this->load->view('print/cetak_po', $data);
    }


    public function insertFaktur()
    {



        $id_faktur = uniqid();
        $no_dokumen  = $this->input->post('no_dokumen');
        $no_index = $this->input->post('no_index');
        $tgl_faktur = $this->input->post('tgl_faktur');
        //$id_vendor = $this->input->post('id_vendor');
        $tgl_input = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');
        $inPR = $this->input->post('inPR');

        $data = array(
            'id_faktur' => $id_faktur,
            'no_dokumen' => $no_dokumen,
            'index_dok' => $no_index,
            'tgl_faktur' => $tgl_faktur,
            //'id_vendor' => $id_vendor,
            'tgl_input' => $tgl_input,
            'id_staff' => $data_staff->id_staff,
            'id_perencanaan' => $inPR
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
            'jenis' => 'farmasi'
        );


        $this->M_Pr_obat->insertFaktur($data2, 'faktur');

        $this->M_Pr_obat->insertFaktur($data, 'faktur_pr_obat');
        $this->M_Pr_obat->update(['id_faktur' => $inPR], ['ket' => 1], 'faktur_perencanaan_logfar');
        $out['status'] = "success";
        
        $out['status'] = "success";
        echo json_encode($out);
    }

    //tampil data 


    //tampil list data 

   

    //end tampil list 

    //hapus

    function hapus_list_faktur()
    {
        $id_detail = $this->input->post('id_detail');
        $this->M_Pr_obat->delete_po($id_detail);
        $out['status'] = "success";
        echo json_encode($out);
    }

    //hapus


    //insert 

    public function insertObatFaktur()
    {

        //$id_detail = uniqid();
        $id = $this->input->post('id');
        //$id2 = $this->input->post('id2');
        $idFaktur = $this->input->post('idFaktur');
        $harga = $this->input->post('harga');
        $frek = $this->input->post('frek');


        $total = $this->input->post('total');
        //$idFaktur = $this->input->post('idFaktur');
        $idLogistik = $this->input->post('idLogistik');
        $vendor = $this->input->post('vendor');
        $ppn = $this->input->post('ppn');
        $diskon = $this->input->post('diskon');

        $tgl = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');
        $id_detail = $this->input->post('id_detail');

        $data = array(
            'id_detail' => $id,
            'id_faktur' => $idFaktur,
            'id_list' => $idLogistik,
            'id_detail_perencanaan' => $id_detail,
            'jumlah' => $frek,
            'harga' => $harga,
            'total' => $total,
            'tgl' => $tgl,
            'id_staff' => $data_staff->id_staff,
            'status' => '0',
            'frek' => $diskon,

        );

        $this->M_Pr_obat->insertDetail($data, 'detail_pr_obat');

        //$this->M_Pr_obat->update(['id_detail' => $id_detail], ['status' => 1], 'detail_perencanaan_logfar');


        $out['status'] = "success";
        echo json_encode($out);
    }



    //end insert

    public function tampil_data()
    {
        $page_data = $this->M_Pr_obat->selectData();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $label =     "<a class='btn btn-danger btn-icon-anim btn-square' href='Po_obat/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";
            $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur .  "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_perencanaan . "\")'><i class='icon-note'></i></a>";


            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $no_perencanaan = $page_data[$i]->no_perencanaan;

            $out[$i] = array($no, $label, $pilih, $hapus, $edit, $no_dokumen, $tgl_input, $tgl_faktur, $no_perencanaan);
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


    //end tampil data

    //tampil range permit

    public function tampil_rangePo()
    {



        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Pr_obat->selectRangePo($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $label =     "<a class='btn btn-danger btn-icon-anim btn-square' href='Po_obat/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";
            $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur .  "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-note'></i></a>";

            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $id_vendor = $page_data[$i]->id_vendor;

            $out[$i] = array($no, $label, $pilih, $hapus, $edit, $no_dokumen, $tgl_input, $tgl_faktur, $id_vendor,);
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

    //end tampil range permit

    public function getDataListFaktur()
    {
        $id_faktur = $this->M_Pembelian_obat->selectIndex();
        $faktursekarang = $this->M_Pembelian_obat->selectIndex2($id_faktur);

        $id_detail = $this->input->post('id_detail');
        $db = $this->M_Pr_obat->select_data_list_faktur($id_detail);

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
  

    //hapus faktur

    function hapus_faktur()
    {
        $id_faktur = $this->input->post('id_faktur');
        $this->M_Pr_obat->delete_faktur($id_faktur);
        $out['status'] = "success";
        echo json_encode($out);
    }

 


  
    //get no faktur

    public function check_noFaktur()
    {
        $no_faktur = $this->input->post("no_faktur");
        $tmp_data = $this->M_Pr_obat->get_nofaktur($no_faktur);

        if (count($tmp_data) > 0) {
            echo '<label class="text-danger pt-10"><span><i class="fa fa-times" aria-hidden="true">
            </i> No Faktur tidak tersedia</span></label>';
        } else {
            echo '<label class="text-success pt-10"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> No Faktur tersedia</span></label>';
        }
    }

    //end no faktur

    public function tampil_list_faktur2()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->db->get('produsen')->result();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
			$tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_produsen(\"" . $idFaktur . "\",\"" . $page_data[$i]->id_produsen . "\",\"" . $page_data[$i]->nama_produsen . "\")' '><i class='icon-plus'></i></button>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama_produsen;

            $out[$i] = array($no, $nama, $tombol);
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
    public function tampil_produsen()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Pr_obat->getProdusenById($idFaktur);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
			$tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_produsen(\"" . $page_data[$i]->id_list . "\",\"" . $page_data[$i]->nama_produsen . "\")' '><i class='icon-trash'></i></button>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama_produsen;
            $alamat = $page_data[$i]->alamat;
            $telp = $page_data[$i]->telp;

            $out[$i] = array($no, $nama,$alamat,$telp, $tombol);
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
    function tambah_produsen()
    {
        $data = [
            'id_pr' => $this->input->post('id'),
            'id_produsen' => $this->input->post('id_produsen'),
            'nama_produsen' => $this->input->post('produsen'),

        ];
        $this->M_Pr_obat->insertFaktur($data, 'vendor_pr_obat');
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_faktur_po()
    {
        $id_faktur = $this->input->post('id');
        $this->M_Pr_obat->delete($id_faktur, 'faktur_usulan_logfar','id_faktur');
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_produsen()
	{
		$id_faktur = $this->input->post('id');
        $this->M_Pr_obat->delete($id_faktur, 'vendor_pr_obat','id_list');
        $out['status'] = "success";
        echo json_encode($out);
	}
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
