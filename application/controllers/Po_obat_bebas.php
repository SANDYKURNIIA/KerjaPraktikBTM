<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Po_obat_bebas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Po_obat');
    }

    public function index()
    {

        $this->load->view('assets/_header');
        $max = $this->M_Po_obat->selectNoDokumenBebas();
        $i = 0;
        $page_data = array('max' =>  $max[$i]->max + 1,);
        $page_data['vendor'] = $this->db->get('produsen')->result_array();
        $page_data['page_content'] = 'page_content/Po_obat_bebas';
        $idFaktur = $this->input->post('idFaktur');
        // $page_data['nomer'] = $this->M_Po_obat->getNoFaktur($idFaktur);
        $page_data['obat'] = $this->M_Po_obat->getNamaObat();
        $page_data['satuan'] = $this->M_Po_obat->getSatuanObat();


        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_total_harga()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Po_obat->HitungPO($idFaktur);
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
        $data['cetak_po']=$this->M_Po_obat->getDataPo($id_faktur);
        $data['cetak_po2']=$this->M_Po_obat->getDataPo2($id_faktur);
		$this->load->view('print/cetak_po', $data);

    }   


    public function insertFaktur()
    {



        $id_faktur = uniqid();
        $no_dokumen  = $this->input->post('no_dokumen');
        $no_index = $this->input->post('no_index');
        $tgl_faktur = $this->input->post('tgl_faktur');
        $id_vendor = $this->input->post('id_vendor');
        $tgl_input = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');


        $data = array(
            'id_faktur' => $id_faktur,
            'no_dokumen' => $no_dokumen,
            'index_dok' => $no_index,
            'tgl_faktur' => $tgl_faktur,
            'id_vendor' => $id_vendor,
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
            'id_vendor' => $id_vendor,
            'tgl_input' => $tgl_input,
            'id_staff' => $data_staff->id_staff,
            'ket' => '-',
            'jenis' => 'farmasi'
        );


        $this->M_Po_obat->insertFaktur($data2, 'faktur');

        $this->M_Po_obat->insertFaktur($data, 'faktur_bebas_logistik_farmasi');
        $out['status'] = "success";
        echo json_encode($out);
    }

    //tampil data 


    //tampil list data 

    public function tampil_list_faktur()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Po_obat->getDataFakturBebas($idFaktur);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
             if($page_data[$i]->status == 1 ){
                $hapus = "";
                $pilih = "";
                $status = "<span class='label label-success capitalize-font inline-block'>terpenuhi</span>";
            }else{
         
                $hapus =  "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail .  "\")'><i class='icon-trash'></i></a>";

                $pilih =  "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_list_faktur(\"" . $page_data[$i]->id_detail .  "\")'><i class='icon-note'></i></a>";
                $status = "<span class='label label-danger capitalize-font inline-block'>belum</span>";
            }

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $harga = $page_data[$i]->harga;
            $jumlah = $page_data[$i]->jumlah;
            $diskon = $page_data[$i]->diskon;
            $ppn = $page_data[$i]->ppn;
            $total = $page_data[$i]->total;

            $out[$i] = array($no, $nama, $harga, $jumlah, $diskon, $ppn, $total, $status, $hapus, $pilih);
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


    //end tampil list 

    //hapus

    function hapus_list_faktur()
    {
        $id_detail = $this->input->post('id_detail');
        $this->db->delete('detail_po_bebas', array('id_detail' => $id_detail));
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


        $data = array(
            'id_detail' => $id,
            'id_faktur' => $idFaktur,
            'id_list' => $idLogistik,
            'jumlah' => $frek,
            'harga' => $harga,
            'diskon' => $diskon,
            'ppn' => $ppn,
            'total' => $total,
            'tgl' => $tgl,
            'id_staff' => $data_staff->id_staff,
            'status' => '0',

        );


        $this->M_Po_obat->insertDetail($data, 'detail_po_bebas');
        $out['status'] = "success";
        echo json_encode($out);
    }



    //end insert

    public function tampil_data()
    {
        $page_data = $this->M_Po_obat->selectDataBebas();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $label= 	"<a class='btn btn-danger btn-icon-anim btn-square' href='Po_obat/print_out/".$page_data[$i]->id_faktur."' ><i class='icon-printer'></i></a>";
            $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur .  "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-note'></i></a>";


            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $id_vendor = $page_data[$i]->id_vendor;

            $out[$i] = array($no,$label, $pilih, $hapus, $edit, $no_dokumen, $tgl_input, $tgl_faktur, $id_vendor,);
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

    public function tampil_rangePo(){
        
        
       
        $mulai = $this->input->post('mulai');
        $akhir= $this->input->post('akhir');

        $page_data = $this->M_Po_obat->selectRangePoBebas($mulai,$akhir);
        $out=null;
        for ($i=0; $i < count($page_data); $i++) {
            $label= 	"<a class='btn btn-danger btn-icon-anim btn-square' href='Po_obat/print_out/".$page_data[$i]->id_faktur."' ><i class='icon-printer'></i></a>";
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
        $db = $this->M_Po_obat->select_data_list_faktur($id_detail);
        
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
    public function insertObatFaktur1()
    {
        $data_staff = $this->session->userdata('data_auth');
        $idFaktur = $this->input->post('idFaktur');
        $id_detail = $this->input->post('id_detail');
        // var_dump($id_detail);
        // die();

        $status = "1";
        $harga  = $this->input->post('harga');
        $margin  = $this->input->post('margin');
        $noBatch = $this->input->post('noBatch');
        $noFaktur = $this->input->post('noFaktur');
        $frek = $this->input->post('frek');
        $total = $this->input->post('total');
        $idLogistik = $this->input->post('idLogistik');
        $tglExp = $this->input->post('tglExp');
        $idProdusenObat = $this->input->post('idProdusenObat');
        $id = $this->input->post('id');
        $id2 = $this->input->post('id2');
        $diskon = $this->input->post('diskon');
        $diskonRs = $this->input->post('diskonRs');
        $hna = $this->input->post('hna');
        $ppn = $this->input->post('ppn');

        $data_struk = array(
            'id_detail_struk' => $id,
            'id_struk' => $idFaktur,
            'id_detail' => $id_detail,
            'no_batch' => $noBatch,
            'kadaluarsa' => $tglExp,
            'id_logistik' => $idLogistik,
            'id_prod_obat' => $idProdusenObat,
            'frek' => $frek,
            'harga' => $harga,
            'total' => $total,
            'harga_beli' => $hna,
            'ppn' => $ppn,
            'diskon' => $diskon,
            'diskon_rs' => $diskonRs,
            'tgl_input' => date("Y-m-d H:i:s"),
            'no_faktur' => $noFaktur,

        );
        $data_stok = array(
            'id_stok' => $id2,
            'id_logistik' => $idLogistik,
            'tgl' => date("Y-m-d H:i:s"),
            'keterangan' => 'MASUK',
            'frek' => $frek,
            'kadaluarsa' => $tglExp,
            'asal_tujuan' => 'FAKTUR',
            'id_struk' => 'F_' . $id,
            'id_staff' => $data_staff->id_staff,

        );
        $data_list = array(
            'harga_cost' => $harga,
            'margin' => $margin,
        );

        $data_po = array(
            'status' => $status,
        );

        $this->M_Po_obat->insert_detail_struk($data_struk, 'detail_struk');
        $this->M_Po_obat->insert_stok_logistik($data_stok, 'stok_logistik');
        $this->M_Po_obat->update_po($idFaktur, $id_detail, $data_po);
        $this->M_Po_obat->update_list_logistik($idLogistik, $data_list);
        $out['status'] = "success";
        echo json_encode($out);
    }

    //hapus faktur

     function hapus_faktur()
    {
        $id_faktur = $this->input->post('id_faktur');
        $this->db->delete('struk_logistik', array('id_faktur' => $id_faktur));
        $out['status'] = "success";
        echo json_encode($out);
    }

    function hapus_faktur_po()
    {
        $id_faktur = $this->input->post('id_faktur');
        $this->M_Po_obat->delete_faktur_po_bebas($id_faktur);
        $out['status'] = "success";
        echo json_encode($out);
    }


    //end faktur hapus
    public function tampil_list_faktur1()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Po_obat->getDataFaktur1($idFaktur);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail_struk .  "\")'><i class='icon-trash'></i></a>";


            $expired = strtotime($page_data[$i]->kadaluarsa);
            $date = strftime("%A, %d %B %Y ", $expired);


            $no = $i + 1;
            $nama_obat= $page_data[$i]->obat;
            $harga_satuan= $page_data[$i]->harga;
            $jml_obat= $page_data[$i]->frek;
            $total= $page_data[$i]->total;
            $no_batch= $page_data[$i]->no_batch;
            $no_faktur= $page_data[$i]->no_faktur;
            $tgl_exp = $date;
            
            $out[$i] = array($no, $nama_obat, $harga_satuan, $jml_obat, $total, $no_batch, $no_faktur, $tgl_exp, $hapus);
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

    //get no faktur

    public function check_noFaktur()
    {
        $no_faktur = $this->input->post("no_faktur");
        $tmp_data = $this->M_Po_obat->get_nofaktur($no_faktur);

        if (count($tmp_data) > 0) {
            echo '<label class="text-danger pt-10"><span><i class="fa fa-times" aria-hidden="true">
            </i> No Faktur tidak tersedia</span></label>';
        } else {
            echo '<label class="text-success pt-10"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> No Faktur tersedia</span></label>';
        }
    }

    //end no faktur


    //DISTRIBUTOR OBAT

    public function dis_obat()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Dis_obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function insertDistributor()
    {
        $nama_produsen = $this->input->post('nama_produsen');
        $alamat  = $this->input->post('alamat');
        $telp  = $this->input->post('telp');
        $nama_sales = $this->input->post('nama_sales');

        $data = array(
            'id_produsen' => uniqid(),
            'nama_produsen' => $nama_produsen,
            'alamat' => $alamat,
            'telp' => $telp,
            'nama_sales' => $nama_sales
        );



        $this->M_Po_obat->insertDistributor($data, 'produsen');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_distributor()
    {
        $page_data = $this->M_Po_obat->selectDistributor();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_distributor(\"" . $page_data[$i]->id_produsen .  "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_distributor(\"" . $page_data[$i]->id_produsen .  "\")'><i class='icon-trash'></i></a>";
            


            $no = $i + 1;
            $nama_produsen = $page_data[$i]->nama_produsen;
            $alamat = $page_data[$i]->alamat;
            $telp = $page_data[$i]->telp;
            $nama_sales = $page_data[$i]->nama_sales;

            $out[$i] = array($edit, $hapus,  $no,  $nama_produsen, $alamat, $telp, $nama_sales,);
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    public function getDataDistributor()
    {
        $id_produsen = $this->input->post('id_produsen');
        $db = $this->M_Po_obat->selectDataDistributorById($id_produsen);

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

    public function edit_distributor()
    {
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $alamat = $this->input->post('alamat');
        $sales = $this->input->post('sales');
        $telp = $this->input->post('telp');

        $data = array(
            'nama_produsen' => $nama,
            'nama_sales' => $sales,
            'alamat' => $alamat,
            'telp' => $telp,
        );
        $out['status'] = "success";
        $this->M_Po_obat->update_distributor($id, $data);
        echo json_encode($out);
    }

    function hapus_distributor()
    {
        $id_produsen = $this->input->post('id_produsen');
        $this->M_Po_obat->delete_distributor($id_produsen);
        $out['status'] = "success";
        echo json_encode($out);
    }



    //END DISTRIBUTOR OBAT


    //PRODUSEN OBAT

    public function pro_obat()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pro_obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }



    public function insertProdusen()
    {
       
        $nama  = $this->input->post('nama');
        $kota  = $this->input->post('kota');
        $negara = $this->input->post('negara');

        $data = array(
            'id_pro_obat' => uniqid(),
            'nama' => $nama,
            'kota' => $kota,
            'negara' => $negara
        );



        $this->M_Po_obat->insertProdusenObat($data, 'prod_obat');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_produsen()
    {
        $page_data = $this->M_Po_obat->selectProdusen();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_produsen(\"" . $page_data[$i]->id_pro_obat .  "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_produsen(\"" . $page_data[$i]->id_pro_obat .  "\")'><i class='icon-trash'></i></a>";
            


            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $kota = $page_data[$i]->kota;
            $negara = $page_data[$i]->negara;

            $out[$i] = array($edit, $hapus,  $no,  $nama, $kota, $negara,);
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    public function getDataProdusen()
    {
        $id_pro_obat = $this->input->post('id_pro_obat');
        $db = $this->M_Po_obat->selectDataProdusenById($id_pro_obat);

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

    public function edit_produsen()
    {
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $kota = $this->input->post('kota');
        $negara = $this->input->post('negara');

        $data = array(
            'nama' => $nama,
            'kota' => $kota,
            'negara' => $negara,
        );
        $out['status'] = "success";
        $this->M_Po_obat->update_produsen($id, $data);
        echo json_encode($out);
    }

    function hapus_produsen()
    {
        $id_pro_obat = $this->input->post('id_pro_obat');
        $this->M_Po_obat->delete_produsen($id_pro_obat);
        $out['status'] = "success";
        echo json_encode($out);
    }





    //END PRODUSEN OBAT


    //OBAT

    public function obat()
    {

        $this->load->view('assets/_header');
        $page_data['satuan'] = $this->db->get('satuan_list_logistik')->result_array();
        $page_data['gol_obat'] = $this->db->get('list_logistik')->result_array();
        $page_data['produ'] = $this->db->get('prod_obat')->result_array();
        $page_data['page_content'] = 'page_content/Obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function insertObat()
    {
       
        $nama  = $this->input->post('nama');
        $tipe = $this->input->post('tipe');
        $harga_cost= $this->input->post('harga_cost');
        $golongan_obat  = $this->input->post('golongan_obat');
        $margin = $this->input->post('margin');
        $produsen= $this->input->post('produsen');
        $standar= $this->input->post('standar');
        $distributor= $this->input->post('distributor');
        $kode = $this->input->post('kode');

        $data = array(
            'id_logistik' => uniqid(),
            'nama' => $nama,
            'tipe' => $tipe,
            'harga_cost' => $harga_cost,
            'golongan_obat' => $golongan_obat,
            'margin' => $margin,
            'produsen' => $produsen,
            'standar' => $standar,
            'distributor' => $distributor,
            'status' => 'AKTIF',
            'kode'=> $kode,
            'tgl_input'=> date("Y-m-d H:i:s")
        );



        $this->M_Po_obat->insertObat($data, 'list_logistik');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_obat()
    {
        $page_data = $this->M_Po_obat->selectObat();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat(\"" . $page_data[$i]->id_logistik .  "\")'><i class='icon-pencil'></i></a>";
            
            


            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $harga_cost = $page_data[$i]->harga_cost;
            $margin = $page_data[$i]->margin;
            $produsen = $page_data[$i]->produsen;
            $standar = $page_data[$i]->standar;
            $distributor = $page_data[$i]->distributor;
            $status = $page_data[$i]->status;

            $out[$i] = array($edit,  $no,  $nama, $tipe, $golongan_obat, $harga_cost, $margin, $produsen, $standar, $distributor, $status,);
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    public function getDataObat()
    {
        $id_logistik = $this->input->post('id_logistik');
        $db = $this->M_Po_obat->selectDataObatById($id_logistik);

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

    public function edit_obat()
    {
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $satuan = $this->input->post('satuan');
        $golongan = $this->input->post('golongan');
        $hna = $this->input->post('hna');
        $margin = $this->input->post('margin');
        $produsen = $this->input->post('produsen');
        $status = $this->input->post('status');

        $data = array(
            'nama' => $nama,
            'tipe' => $satuan,
            'golongan_obat' => $golongan,
            'harga_cost' => $hna,
            'margin' => $margin,
            'produsen' => $produsen,
            'status' => $status,
        );
        $out['status'] = "success";
        $this->M_Po_obat->update_obat($id, $data);
        echo json_encode($out);
    }




    //END OBAT


    //coba

    public function coba()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/coba';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }



    //end coba

}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Po_obat_bebas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Po_obat');
    }

    public function index()
    {

        $this->load->view('assets/_header');
        $max = $this->M_Po_obat->selectNoDokumenBebas();
        $i = 0;
        $page_data = array('max' =>  $max[$i]->max + 1,);
        $page_data['vendor'] = $this->db->get('produsen')->result_array();
        $page_data['page_content'] = 'page_content/Po_obat_bebas';
        $idFaktur = $this->input->post('idFaktur');
        // $page_data['nomer'] = $this->M_Po_obat->getNoFaktur($idFaktur);
        $page_data['obat'] = $this->M_Po_obat->getNamaObat();
        $page_data['satuan'] = $this->M_Po_obat->getSatuanObat();


        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_total_harga()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Po_obat->HitungPO($idFaktur);
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
        $data['cetak_po']=$this->M_Po_obat->getDataPo($id_faktur);
        $data['cetak_po2']=$this->M_Po_obat->getDataPo2($id_faktur);
		$this->load->view('print/cetak_po', $data);

    }   


    public function insertFaktur()
    {



        $id_faktur = uniqid();
        $no_dokumen  = $this->input->post('no_dokumen');
        $no_index = $this->input->post('no_index');
        $tgl_faktur = $this->input->post('tgl_faktur');
        $id_vendor = $this->input->post('id_vendor');
        $tgl_input = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');


        $data = array(
            'id_faktur' => $id_faktur,
            'no_dokumen' => $no_dokumen,
            'index_dok' => $no_index,
            'tgl_faktur' => $tgl_faktur,
            'id_vendor' => $id_vendor,
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
            'id_vendor' => $id_vendor,
            'tgl_input' => $tgl_input,
            'id_staff' => $data_staff->id_staff,
            'ket' => '-',
            'jenis' => 'farmasi'
        );


        $this->M_Po_obat->insertFaktur($data2, 'faktur');

        $this->M_Po_obat->insertFaktur($data, 'faktur_bebas_logistik_farmasi');
        $out['status'] = "success";
        echo json_encode($out);
    }

    //tampil data 


    //tampil list data 

    public function tampil_list_faktur()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Po_obat->getDataFakturBebas($idFaktur);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
             if($page_data[$i]->status == 1 ){
                $hapus = "";
                $pilih = "";
                $status = "<span class='label label-success capitalize-font inline-block'>terpenuhi</span>";
            }else{
         
                $hapus =  "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail .  "\")'><i class='icon-trash'></i></a>";

                $pilih =  "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_list_faktur(\"" . $page_data[$i]->id_detail .  "\")'><i class='icon-note'></i></a>";
                $status = "<span class='label label-danger capitalize-font inline-block'>belum</span>";
            }

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $harga = $page_data[$i]->harga;
            $jumlah = $page_data[$i]->jumlah;
            $diskon = $page_data[$i]->diskon;
            $ppn = $page_data[$i]->ppn;
            $total = $page_data[$i]->total;

            $out[$i] = array($no, $nama, $harga, $jumlah, $diskon, $ppn, $total, $status, $hapus, $pilih);
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


    //end tampil list 

    //hapus

    function hapus_list_faktur()
    {
        $id_detail = $this->input->post('id_detail');
        $this->db->delete('detail_po_bebas', array('id_detail' => $id_detail));
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


        $data = array(
            'id_detail' => $id,
            'id_faktur' => $idFaktur,
            'id_list' => $idLogistik,
            'jumlah' => $frek,
            'harga' => $harga,
            'diskon' => $diskon,
            'ppn' => $ppn,
            'total' => $total,
            'tgl' => $tgl,
            'id_staff' => $data_staff->id_staff,
            'status' => '0',

        );


        $this->M_Po_obat->insertDetail($data, 'detail_po_bebas');
        $out['status'] = "success";
        echo json_encode($out);
    }



    //end insert

    public function tampil_data()
    {
        $page_data = $this->M_Po_obat->selectDataBebas();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $label= 	"<a class='btn btn-danger btn-icon-anim btn-square' href='Po_obat/print_out/".$page_data[$i]->id_faktur."' ><i class='icon-printer'></i></a>";
            $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur .  "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-note'></i></a>";


            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $id_vendor = $page_data[$i]->id_vendor;

            $out[$i] = array($no,$label, $pilih, $hapus, $edit, $no_dokumen, $tgl_input, $tgl_faktur, $id_vendor,);
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

    public function tampil_rangePo(){
        
        
       
        $mulai = $this->input->post('mulai');
        $akhir= $this->input->post('akhir');

        $page_data = $this->M_Po_obat->selectRangePoBebas($mulai,$akhir);
        $out=null;
        for ($i=0; $i < count($page_data); $i++) {
            $label= 	"<a class='btn btn-danger btn-icon-anim btn-square' href='Po_obat/print_out/".$page_data[$i]->id_faktur."' ><i class='icon-printer'></i></a>";
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
        $db = $this->M_Po_obat->select_data_list_faktur($id_detail);
        
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
    public function insertObatFaktur1()
    {
        $data_staff = $this->session->userdata('data_auth');
        $idFaktur = $this->input->post('idFaktur');
        $id_detail = $this->input->post('id_detail');
        // var_dump($id_detail);
        // die();

        $status = "1";
        $harga  = $this->input->post('harga');
        $margin  = $this->input->post('margin');
        $noBatch = $this->input->post('noBatch');
        $noFaktur = $this->input->post('noFaktur');
        $frek = $this->input->post('frek');
        $total = $this->input->post('total');
        $idLogistik = $this->input->post('idLogistik');
        $tglExp = $this->input->post('tglExp');
        $idProdusenObat = $this->input->post('idProdusenObat');
        $id = $this->input->post('id');
        $id2 = $this->input->post('id2');
        $diskon = $this->input->post('diskon');
        $diskonRs = $this->input->post('diskonRs');
        $hna = $this->input->post('hna');
        $ppn = $this->input->post('ppn');

        $data_struk = array(
            'id_detail_struk' => $id,
            'id_struk' => $idFaktur,
            'id_detail' => $id_detail,
            'no_batch' => $noBatch,
            'kadaluarsa' => $tglExp,
            'id_logistik' => $idLogistik,
            'id_prod_obat' => $idProdusenObat,
            'frek' => $frek,
            'harga' => $harga,
            'total' => $total,
            'harga_beli' => $hna,
            'ppn' => $ppn,
            'diskon' => $diskon,
            'diskon_rs' => $diskonRs,
            'tgl_input' => date("Y-m-d H:i:s"),
            'no_faktur' => $noFaktur,

        );
        $data_stok = array(
            'id_stok' => $id2,
            'id_logistik' => $idLogistik,
            'tgl' => date("Y-m-d H:i:s"),
            'keterangan' => 'MASUK',
            'frek' => $frek,
            'kadaluarsa' => $tglExp,
            'asal_tujuan' => 'FAKTUR',
            'id_struk' => 'F_' . $id,
            'id_staff' => $data_staff->id_staff,

        );
        $data_list = array(
            'harga_cost' => $harga,
            'margin' => $margin,
        );

        $data_po = array(
            'status' => $status,
        );

        $this->M_Po_obat->insert_detail_struk($data_struk, 'detail_struk');
        $this->M_Po_obat->insert_stok_logistik($data_stok, 'stok_logistik');
        $this->M_Po_obat->update_po($idFaktur, $id_detail, $data_po);
        $this->M_Po_obat->update_list_logistik($idLogistik, $data_list);
        $out['status'] = "success";
        echo json_encode($out);
    }

    //hapus faktur

     function hapus_faktur()
    {
        $id_faktur = $this->input->post('id_faktur');
        $this->db->delete('struk_logistik', array('id_faktur' => $id_faktur));
        $out['status'] = "success";
        echo json_encode($out);
    }

    function hapus_faktur_po()
    {
        $id_faktur = $this->input->post('id_faktur');
        $this->M_Po_obat->delete_faktur_po_bebas($id_faktur);
        $out['status'] = "success";
        echo json_encode($out);
    }


    //end faktur hapus
    public function tampil_list_faktur1()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Po_obat->getDataFaktur1($idFaktur);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail_struk .  "\")'><i class='icon-trash'></i></a>";


            $expired = strtotime($page_data[$i]->kadaluarsa);
            $date = strftime("%A, %d %B %Y ", $expired);


            $no = $i + 1;
            $nama_obat= $page_data[$i]->obat;
            $harga_satuan= $page_data[$i]->harga;
            $jml_obat= $page_data[$i]->frek;
            $total= $page_data[$i]->total;
            $no_batch= $page_data[$i]->no_batch;
            $no_faktur= $page_data[$i]->no_faktur;
            $tgl_exp = $date;
            
            $out[$i] = array($no, $nama_obat, $harga_satuan, $jml_obat, $total, $no_batch, $no_faktur, $tgl_exp, $hapus);
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

    //get no faktur

    public function check_noFaktur()
    {
        $no_faktur = $this->input->post("no_faktur");
        $tmp_data = $this->M_Po_obat->get_nofaktur($no_faktur);

        if (count($tmp_data) > 0) {
            echo '<label class="text-danger pt-10"><span><i class="fa fa-times" aria-hidden="true">
            </i> No Faktur tidak tersedia</span></label>';
        } else {
            echo '<label class="text-success pt-10"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> No Faktur tersedia</span></label>';
        }
    }

    //end no faktur


    //DISTRIBUTOR OBAT

    public function dis_obat()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Dis_obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function insertDistributor()
    {
        $nama_produsen = $this->input->post('nama_produsen');
        $alamat  = $this->input->post('alamat');
        $telp  = $this->input->post('telp');
        $nama_sales = $this->input->post('nama_sales');

        $data = array(
            'id_produsen' => uniqid(),
            'nama_produsen' => $nama_produsen,
            'alamat' => $alamat,
            'telp' => $telp,
            'nama_sales' => $nama_sales
        );



        $this->M_Po_obat->insertDistributor($data, 'produsen');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_distributor()
    {
        $page_data = $this->M_Po_obat->selectDistributor();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_distributor(\"" . $page_data[$i]->id_produsen .  "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_distributor(\"" . $page_data[$i]->id_produsen .  "\")'><i class='icon-trash'></i></a>";
            


            $no = $i + 1;
            $nama_produsen = $page_data[$i]->nama_produsen;
            $alamat = $page_data[$i]->alamat;
            $telp = $page_data[$i]->telp;
            $nama_sales = $page_data[$i]->nama_sales;

            $out[$i] = array($edit, $hapus,  $no,  $nama_produsen, $alamat, $telp, $nama_sales,);
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    public function getDataDistributor()
    {
        $id_produsen = $this->input->post('id_produsen');
        $db = $this->M_Po_obat->selectDataDistributorById($id_produsen);

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

    public function edit_distributor()
    {
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $alamat = $this->input->post('alamat');
        $sales = $this->input->post('sales');
        $telp = $this->input->post('telp');

        $data = array(
            'nama_produsen' => $nama,
            'nama_sales' => $sales,
            'alamat' => $alamat,
            'telp' => $telp,
        );
        $out['status'] = "success";
        $this->M_Po_obat->update_distributor($id, $data);
        echo json_encode($out);
    }

    function hapus_distributor()
    {
        $id_produsen = $this->input->post('id_produsen');
        $this->M_Po_obat->delete_distributor($id_produsen);
        $out['status'] = "success";
        echo json_encode($out);
    }



    //END DISTRIBUTOR OBAT


    //PRODUSEN OBAT

    public function pro_obat()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pro_obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }



    public function insertProdusen()
    {
       
        $nama  = $this->input->post('nama');
        $kota  = $this->input->post('kota');
        $negara = $this->input->post('negara');

        $data = array(
            'id_pro_obat' => uniqid(),
            'nama' => $nama,
            'kota' => $kota,
            'negara' => $negara
        );



        $this->M_Po_obat->insertProdusenObat($data, 'prod_obat');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_produsen()
    {
        $page_data = $this->M_Po_obat->selectProdusen();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_produsen(\"" . $page_data[$i]->id_pro_obat .  "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_produsen(\"" . $page_data[$i]->id_pro_obat .  "\")'><i class='icon-trash'></i></a>";
            


            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $kota = $page_data[$i]->kota;
            $negara = $page_data[$i]->negara;

            $out[$i] = array($edit, $hapus,  $no,  $nama, $kota, $negara,);
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    public function getDataProdusen()
    {
        $id_pro_obat = $this->input->post('id_pro_obat');
        $db = $this->M_Po_obat->selectDataProdusenById($id_pro_obat);

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

    public function edit_produsen()
    {
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $kota = $this->input->post('kota');
        $negara = $this->input->post('negara');

        $data = array(
            'nama' => $nama,
            'kota' => $kota,
            'negara' => $negara,
        );
        $out['status'] = "success";
        $this->M_Po_obat->update_produsen($id, $data);
        echo json_encode($out);
    }

    function hapus_produsen()
    {
        $id_pro_obat = $this->input->post('id_pro_obat');
        $this->M_Po_obat->delete_produsen($id_pro_obat);
        $out['status'] = "success";
        echo json_encode($out);
    }





    //END PRODUSEN OBAT


    //OBAT

    public function obat()
    {

        $this->load->view('assets/_header');
        $page_data['satuan'] = $this->db->get('satuan_list_logistik')->result_array();
        $page_data['gol_obat'] = $this->db->get('list_logistik')->result_array();
        $page_data['produ'] = $this->db->get('prod_obat')->result_array();
        $page_data['page_content'] = 'page_content/Obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function insertObat()
    {
       
        $nama  = $this->input->post('nama');
        $tipe = $this->input->post('tipe');
        $harga_cost= $this->input->post('harga_cost');
        $golongan_obat  = $this->input->post('golongan_obat');
        $margin = $this->input->post('margin');
        $produsen= $this->input->post('produsen');
        $standar= $this->input->post('standar');
        $distributor= $this->input->post('distributor');
        $kode = $this->input->post('kode');

        $data = array(
            'id_logistik' => uniqid(),
            'nama' => $nama,
            'tipe' => $tipe,
            'harga_cost' => $harga_cost,
            'golongan_obat' => $golongan_obat,
            'margin' => $margin,
            'produsen' => $produsen,
            'standar' => $standar,
            'distributor' => $distributor,
            'status' => 'AKTIF',
            'kode'=> $kode,
            'tgl_input'=> date("Y-m-d H:i:s")
        );



        $this->M_Po_obat->insertObat($data, 'list_logistik');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_obat()
    {
        $page_data = $this->M_Po_obat->selectObat();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat(\"" . $page_data[$i]->id_logistik .  "\")'><i class='icon-pencil'></i></a>";
            
            


            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $harga_cost = $page_data[$i]->harga_cost;
            $margin = $page_data[$i]->margin;
            $produsen = $page_data[$i]->produsen;
            $standar = $page_data[$i]->standar;
            $distributor = $page_data[$i]->distributor;
            $status = $page_data[$i]->status;

            $out[$i] = array($edit,  $no,  $nama, $tipe, $golongan_obat, $harga_cost, $margin, $produsen, $standar, $distributor, $status,);
        }
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    public function getDataObat()
    {
        $id_logistik = $this->input->post('id_logistik');
        $db = $this->M_Po_obat->selectDataObatById($id_logistik);

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

    public function edit_obat()
    {
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $satuan = $this->input->post('satuan');
        $golongan = $this->input->post('golongan');
        $hna = $this->input->post('hna');
        $margin = $this->input->post('margin');
        $produsen = $this->input->post('produsen');
        $status = $this->input->post('status');

        $data = array(
            'nama' => $nama,
            'tipe' => $satuan,
            'golongan_obat' => $golongan,
            'harga_cost' => $hna,
            'margin' => $margin,
            'produsen' => $produsen,
            'status' => $status,
        );
        $out['status'] = "success";
        $this->M_Po_obat->update_obat($id, $data);
        echo json_encode($out);
    }




    //END OBAT


    //coba

    public function coba()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/coba';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }



    //end coba

}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
