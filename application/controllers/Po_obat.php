<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Po_obat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Po_obat');
        $this->load->model('M_Perencanaan');
    }

    public function index()
    {

        $this->load->view('assets/_header');
        $max = $this->M_Po_obat->selectNoDokumen();
        $i = 0;
        $page_data = array('max' =>  $max[$i]->max + 1,);
        $page_data['vendor'] = $this->db->get('produsen')->result_array();
        $page_data['page_content'] = 'page_content/Po_obat';
        $idFaktur = $this->input->post('idFaktur');
        // $page_data['nomer'] = $this->M_Po_obat->getNoFaktur($idFaktur);
        $page_data['obat'] = $this->M_Po_obat->getNamaObat();

        $page_data['satuan'] = $this->M_Po_obat->getSatuanObat();
        $page_data['pr_obat'] = $this->M_Po_obat->getPoObat();

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
        $data['cetak_po'] = $this->M_Po_obat->getDataPo($id_faktur);
        $data['cetak_po2'] = $this->M_Po_obat->getDataPo2($id_faktur);
        $this->load->view('print/cetak_po', $data);
    }
    public function getDataPo()
    {

        $id_faktur = $this->input->post('id_faktur');
        $db = $this->M_Po_obat->getDataPo($id_faktur);

        if (count($db) > 0) {
            $db = $db[0];
            $db['status_dt'] = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
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
        $inPR = $this->input->post('inPR');

        $data = array(
            'id_faktur' => $id_faktur,
            'no_dokumen' => $no_dokumen,
            'index_dok' => $no_index,
            'tgl_faktur' => $tgl_faktur,
            'id_vendor' => $id_vendor,
            'tgl_input' => $tgl_input,
            'id_staff' => $data_staff->id_staff,
            'id_pr_obat' => $inPR,
            'keterangan' => $this->input->post('keterangan'),
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

        $this->M_Po_obat->insertFaktur($data, 'faktur_logistik_farmasi');
        $out['status'] = "success";
        echo json_encode($out);
    }

    //tampil data 
    public function update_Faktur()
    {



        $id_faktur = $this->input->post('idFaktur');
        $no_dokumen  = $this->input->post('no_dokumen');
        $tgl_faktur = $this->input->post('tgl_faktur');
        $id_vendor = $this->input->post('id_vendor');
        $tgl_input = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');
        $inPR = $this->input->post('inPR');

        $data = array(

            'no_dokumen' => $no_dokumen,
            'tgl_faktur' => $tgl_faktur,
            'id_vendor' => $id_vendor,
            'keterangan' => $this->input->post('keterangan'),
        );
        $where = array(
            'id_faktur' => $id_faktur,
        );

        $this->M_Po_obat->update($where, $data, 'faktur_logistik_farmasi');
        $out['status'] = "success";
        echo json_encode($out);
    }

    //tampil list data 

    public function tampil_list_faktur()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Po_obat->getDataFaktur($idFaktur);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            if ($page_data[$i]->status == 1) {
                $hapus = "";
                $pilih = "";
                $status = "<span class='label label-success capitalize-font inline-block'>terpenuhi</span>";
            } else {

                $hapus =  "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail .  "\")'><i class='icon-trash'></i></a>";

                $pilih =  "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_list_faktur(\"" . $page_data[$i]->id_detail .  "\")'><i class='icon-note'></i></a>";
                $status = "<span class='label label-danger capitalize-font inline-block'>belum</span>";
            }

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $produsen = $page_data[$i]->produsen;
            $harga = $page_data[$i]->harga;
            $jumlah = $page_data[$i]->jumlah;
            $diskon = $page_data[$i]->diskon;
            $ppn = $page_data[$i]->ppn;
            $total = $page_data[$i]->total;

            $out[$i] = array($no, $nama, $produsen, $harga, $jumlah, $diskon, $ppn, $total, $status, $hapus, $pilih);
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

        $struk = $this->db->get_where('detail_struk', ['id_detail_po' => $id_detail])->result();
        if (count($struk) > 0) {
            $out['status'] = "Detail PO ini sudah masuk di faktur penerimaan";
        } else {
            $id_detail_pr = $this->db->get_where('detail_po', ['id_detail' => $id_detail])->row()->id_detail_pr;
            $this->M_Po_obat->update(['id_detail' => $id_detail_pr], ['status' => 0], 'detail_perencanaan_logfar');

            $this->M_Po_obat->delete_po($id_detail);

            $out['status'] = "success";
        }
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
            'id_detail_pr' => $id_detail,
            'jumlah' => $frek,
            'harga' => $harga,
            'diskon' => $diskon,
            'ppn' => $ppn,
            'total' => $total,
            'tgl' => $tgl,
            'id_staff' => $data_staff->id_staff,
            'status' => '0',
            'disc' => $this->input->post('disc'),

        );

        $this->M_Po_obat->insertDetail($data, 'detail_po');

        $db = $this->M_Po_obat->getTotalPO($id_detail);
        if ($db['frek'] >= $db['jumlah']) {
            $this->M_Po_obat->update(['id_detail' => $id_detail], ['status' => 1], 'detail_perencanaan_logfar');
        }



        $out['status'] = "success";
        echo json_encode($out);
    }



    //end insert

    public function tampil_data()
    {
        $staff = $this->session->userdata('data_auth');
        $page_data = $this->M_Po_obat->selectData();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {



            $request = "<a class='btn btn-primary btn-icon-anim btn-square' href='Po_obat/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";;
            $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur .  "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_pr_obat . "\")'><i class='icon-note'></i></a>";



            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $id_vendor = $page_data[$i]->id_vendor;
            $status = $page_data[$i]->no_perencanaan;
            $keterangan = $page_data[$i]->keterangan;

            if ($staff->tipe == "logistik farmasi") {
                $out[$i] = array($no, $request, $pilih, $hapus, $edit, $no_dokumen, $tgl_input, $tgl_faktur, $id_vendor, $status, $keterangan);
            } else {
                $out[$i] = array($no, $request, $no_dokumen, $tgl_input, $tgl_faktur, $id_vendor, $status, $keterangan);
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


    //end tampil data

    //tampil range permit

    public function tampil_rangePo()
    {


        $staff = $this->session->userdata('data_auth');

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Po_obat->selectRangePo($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $request = "<a class='btn btn-primary btn-icon-anim btn-square' href='Po_obat/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";;
            $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\")'><i class='icon-pencil'></i></a>";
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur .  "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_pr_obat . "\")'><i class='icon-note'></i></a>";


            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $status = $page_data[$i]->no_perencanaan;
            $id_vendor = $page_data[$i]->id_vendor;
            $keterangan = $page_data[$i]->keterangan;

            if ($staff->tipe == "logistik farmasi") {
                $out[$i] = array($no, $request, $pilih, $hapus, $edit, $no_dokumen, $tgl_input, $tgl_faktur, $id_vendor, $status, $keterangan);
            } else {
                $out[$i] = array($no, $request, $no_dokumen, $tgl_input, $tgl_faktur, $id_vendor, $status, $keterangan);
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
    function request($id)
    {

        $data = [
            'status' => 'DIAJUKAN',
            'status_kains' => 'DIAJUKAN',
            'ket_kains' => '-',
            'status_direktur' => 'DIAJUKAN',
            'ket_direktur' => '-',
        ];
        $this->M_Perencanaan->update(['id_faktur' => $id], $data, 'faktur_logistik_farmasi');
        redirect(base_url('Po_obat'));
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
        $this->M_Po_obat->delete_faktur($id_faktur);
        $out['status'] = "success";
        echo json_encode($out);
    }

    function hapus_faktur_po()
    {
        $id_faktur = $this->input->post('id_faktur');
        $dbfaktur = $this->db->get_where('detail_po', ['id_faktur' => $id_faktur])->result();
        foreach ($dbfaktur as $row) {
            $this->M_Po_obat->update(['id_detail' => $row->id_detail_pr], ['status' => 0], 'faktur_perencanaan_logfar');
        }

        $this->M_Po_obat->delete_faktur_po($id_faktur);


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
            $nama_obat = $page_data[$i]->obat;
            $harga_satuan = $page_data[$i]->harga;
            $jml_obat = $page_data[$i]->frek;
            $total = $page_data[$i]->total;
            $no_batch = $page_data[$i]->no_batch;
            $no_faktur = $page_data[$i]->no_faktur;
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




    //end coba
    public function tampil_list_faktur2()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Po_obat->getDataFakturPR($idFaktur);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat(\"" . $page_data[$i]->id_list . "\",\"" . $page_data[$i]->nama  . "\",\"" . $page_data[$i]->harga . "\",\"" . $page_data[$i]->jumlah . "\",\"" . $page_data[$i]->satuan_terkecil . "\",\"" . $page_data[$i]->id_detail . "\",\"" . $page_data[$i]->frek .  "\")'><i class='icon-pencil'></i></a>";

            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $produsen = $page_data[$i]->produsen;
            $jml_obat = $page_data[$i]->jumlah;

            $out[$i] = array($no, $nama_obat, $produsen, $jml_obat, $edit);
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
    public function getDataPR()
    {
        $id_faktur = $this->input->post('id_faktur');
        $data = $this->db->get_where('vendor_pr_obat', ['id_pr' => $id_faktur])->result();
        echo json_encode($data);
    }
    public function getPerencanaan()
    {
        $id_faktur = $this->input->post('id_faktur');
        $data = $this->db->get_where('detail_perencanaan_logfar', ['id_detail' => $id_faktur])->row();
        echo json_encode($data);
    }
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
        $page_data['satuan_kecil'] = $this->db->query("SELECT DISTINCT(satuan_terkecil) satuan_terkecil from list_logistik")->result_array();
        $page_data['satuan_besar'] = $this->db->query("SELECT DISTINCT(satuan_terbesar) satuan_terbesar from list_logistik")->result_array();
        $page_data['golongan_sediaan'] = $this->db->query("SELECT DISTINCT(golongan_sediaan) golongan_sediaan from list_logistik")->result_array();
        $page_data['golongan_obat'] = $this->db->query("SELECT DISTINCT(golongan_obat) golongan_obat from list_logistik")->result_array();
        $page_data['golongan_farmakologi'] = $this->db->query("SELECT DISTINCT(golongan_farmakologi) golongan_farmakologi from list_logistik")->result_array();
        $page_data['kategori'] = $this->db->query("SELECT DISTINCT(kategori) kategori from list_logistik")->result_array();
        //$page_data['satuan'] = $this->db->get('satuan_list_logistik')->result_array();
        //$page_data['gol_obat'] = $this->db->get('list_logistik')->result_array();
        // $page_data['produ'] = $this->db->get('prod_obat')->result_array();
        $page_data['dist'] = $this->db->get('produsen')->result_array();
        $page_data['produ'] = $this->db->get('prod_obat')->result_array();
        // $page_data['produ'] = $this->db->query("SELECT DISTINCT(produsen) nama from list_logistik")->result_array();
        // $page_data['dist'] = $this->db->query("SELECT DISTINCT(distributor) nama_produsen from list_logistik")->result_array();
        $page_data['page_content'] = 'page_content/Obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function insertObat()
    {
        $staff = $this->session->userdata('data_auth');

        $id = $this->db->query("SELECT MAX(id_logistik) id from list_logistik")->row()->id;
        $data = array(
            // 'id_logistik' => $id + 1,
            'kode_imedis' => NULL,
            'nama' => $this->input->post('nama'),
            'satuan_terkecil' => $this->input->post('satuan_terkecil'),
            'satuan_terbesar' => $this->input->post('satuan_terbesar'),
            'golongan_sediaan' => $this->input->post('golongan_sediaan'),
            'golongan_obat' => $this->input->post('golongan_obat'),
            'golongan_farmakologi' => $this->input->post('golongan_farmakologi'),
            'jml_satuan_terkecil' => $this->input->post('jml_terkecil'),
            'harga_cost' => $this->input->post('harga_cost'),
            'ppn' => $this->input->post('ppn'),
            'margin' => $this->input->post('margin'),
            'min_stok' => $this->input->post('min_stok'),
            'produsen' => $this->input->post('produsen'),
            'distributor' => $this->input->post('distributor'),
            'standar' => $this->input->post('standar'),
            'kode' => $this->input->post('kode'),
            'id_material' => $this->input->post('id_material'),
            'zat_adiktif' => $this->input->post('zat_adiktif'),
            'high_alert' => $this->input->post('high_alert'),
            'standar_fornas' => $this->input->post('standar_fornas'),
            'zat_aktif' => $this->input->post('zat_aktif'),
            'kategori' => $this->input->post('kategori'),
            'status' => $this->input->post('status'),
            'diskon' => $this->input->post('diskon'),
            'tgl_input' => date("Y-m-d H:i:s"),
            'satuan_ok' => 1,

            'staff_update' => $staff->id_staff,
        );



        $this->M_Po_obat->insertObat($data, 'list_logistik');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_obat()
    {
        $staff = $this->session->userdata('data_auth');

        $page_data = $this->M_Po_obat->selectObat();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {


            if ($staff->tipe == "keuangan") {
                $edit = "";
            } else {

                $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat(\"" . $page_data[$i]->id_logistik .  "\")'><i class='icon-pencil'></i></a>";
            }




            $no = $i + 1;
            $kode_sibatik = $page_data[$i]->id_logistik;
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->satuan_terkecil;
            $satuan = $page_data[$i]->satuan_terbesar;
            $golongan_sediaan = $page_data[$i]->golongan_sediaan;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $golongan_farmakologi = $page_data[$i]->golongan_farmakologi;
            $jml_satuan_terkecil = $page_data[$i]->jml_satuan_terkecil;
            $jml_satuan_terbesar = $page_data[$i]->jml_satuan_terbesar;
            $ppn = $page_data[$i]->ppn;
            $harga_cost = $page_data[$i]->harga_cost;
            $harga_persediaan = $page_data[$i]->harga_persediaan;
            $margin = $page_data[$i]->margin;
            $harga_jual = intval(($harga_cost * (1 + ($ppn / 100))) * $margin);
            $produsen = $page_data[$i]->produsen;
            $standar = $page_data[$i]->standar;
            $distributor = $page_data[$i]->distributor;
            $zat_adiktif = $page_data[$i]->zat_adiktif;
            $high_alert = $page_data[$i]->high_alert;
            $standar_fornas = $page_data[$i]->standar_fornas;
            $zat_aktif = $page_data[$i]->zat_aktif;
            $kategori = $page_data[$i]->kategori;
            $kode = $page_data[$i]->kode;
            $id_material = $page_data[$i]->id_material;
            $status = $page_data[$i]->status;
            $min_stok = $page_data[$i]->min_stok;
            $diskon = $page_data[$i]->diskon;
            // $diskon = $this->db->query("SELECT diskon_rs from detail_struk 
            // where id_logistik ='$kode_sibatik' ORDER BY ABS(DATEDIFF(tgl_input, NOW())) ASC limit 1");

            // $nilaidiskon = (count($diskon->result()) > 0) ? round(($diskon->row()->diskon_rs / 100), 2) : 0;

            $out[$i] = array($kode_sibatik, $edit, $nama, $produsen, $tipe, $satuan, $golongan_sediaan, $golongan_obat, $golongan_farmakologi, $jml_satuan_terkecil, $harga_cost, $ppn, $harga_jual, $harga_persediaan, $margin, $diskon, $min_stok, $distributor, $standar, $kode, $id_material, $zat_adiktif, $high_alert, $standar_fornas, $zat_aktif, $kategori, $status);
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
        $staff = $this->session->userdata('data_auth');

        $id = $this->input->post('id');

        $data = array(
            'nama' => $this->input->post('nama'),
            'satuan_terkecil' => $this->input->post('satuan_terkecil'),
            'satuan_terbesar' => $this->input->post('satuan_terbesar'),
            'golongan_sediaan' => $this->input->post('golongan_sediaan'),
            'golongan_obat' => $this->input->post('golongan_obat'),
            'golongan_farmakologi' => $this->input->post('golongan_farmakologi'),
            'jml_satuan_terkecil' => $this->input->post('jml_terkecil'),
            'harga_cost' => $this->input->post('harga_cost'),
            'ppn' => $this->input->post('ppn'),
            'margin' => $this->input->post('margin'),
            'min_stok' => $this->input->post('min_stok'),
            'produsen' => $this->input->post('produsen'),
            'distributor' => $this->input->post('distributor'),
            'standar' => $this->input->post('standar'),
            'kode' => $this->input->post('kode'),
            'id_material' => $this->input->post('id_material'),
            'zat_adiktif' => $this->input->post('zat_adiktif'),
            'high_alert' => $this->input->post('high_alert'),
            'standar_fornas' => $this->input->post('standar_fornas'),
            'zat_aktif' => $this->input->post('zat_aktif'),
            'kategori' => $this->input->post('kategori'),
            'status' => $this->input->post('status'),
            'diskon' => $this->input->post('diskon'),
            'tgl_update' => date("Y-m-d H:i:s"),
            'staff_update' => $staff->id_staff,


        );
        $out['status'] = "success";
        $this->M_Po_obat->update_obat($id, $data);
        echo json_encode($out);
    }



    ////APPROVAL 
    public function approve()
    {

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Po_obat_approve';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_approve()
    {
        $data_staff = $this->session->userdata('data_auth');

        $page_data = $this->M_Po_obat->selectDataApprove();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $label =     "<a class='btn btn-danger btn-icon-anim btn-square' href='Po_obat/print_out/" . $page_data[$i]->id_faktur . "' ><i class='icon-printer'></i></a>";


            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->id_vendor . "\")'><i class='icon-note'></i></a>";
            $request = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url('Po_obat/acc/') . $page_data[$i]->id_faktur . "'><i class='fa fa-thumbs-up'></i></a><a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_faktur  . "\")'><i class='fa fa-ellipsis-h'></i></a>";


            $no = $i + 1;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tgl_input = $page_data[$i]->tgl_input;
            $tgl_faktur = $page_data[$i]->tgl_faktur;
            $id_vendor = $page_data[$i]->id_vendor;
            $status = $page_data[$i]->status;


            $out[$i] = array($no, $request, $pilih, $no_dokumen, $tgl_input, $tgl_faktur, $id_vendor, $status);
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
        $this->M_Perencanaan->update(['id_faktur' => $id], $data, 'faktur_logistik_farmasi');
        redirect(base_url('Po_obat/approve'));
    }
    function konfirmasi()
    {
        $id = $this->input->post('id');
        $acc = $this->input->post('acc');
        $ket = $this->input->post('ket');
        $data_staff = $this->session->userdata('data_auth');
        if ($data_staff->tipe == "logistik farmasi" && $data_staff->izin_akses == "admin") {
            $data = [
                'status_kains' => $acc,
                'ket_kains' => $ket,
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
        $this->M_Perencanaan->update(['id_faktur' => $id], $data, 'faktur_logistik_farmasi');
        $out['status'] = "success";
        echo json_encode($out);
    }
}
