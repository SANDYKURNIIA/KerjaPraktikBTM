<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian_obat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Pembelian_obat');
        $this->load->model('M_Po_obat');
        $this->load->model('M_Logistik_farmasi');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $i = 0;
        $max2 = $this->M_Pembelian_obat->selectNo();
        $page_data = array('max2' =>  $max2[$i]->max2 + 1,);

        // $page_data['vaksin'] = $this->db->get('produsen')->result_array();
        $page_data['po_obat'] = $this->M_Pembelian_obat->getPoObat();
        //$page_data['po_obat'] = $this->M_Pembelian_obat->getDataPO();

        $page_data['page_content'] = 'page_content/Pembelian_obat';
        $page_data['obat'] = $this->M_Pembelian_obat->getNamaObat();
        $page_data['n_obat'] = $this->M_Pembelian_obat->getObatNama();

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    /* public function getnodokumen()
    {
        $this->load->view('assets/_header');
        $max=$this->M_Pembelian_obat->selectNoDokumen();
        $i=0;
        $page_data = array('max' =>  $max[$i]->max + 1, );

        $page_data['page_content'] = 'page_content/Pembelian_obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }*/


    public function total_faktur()
    {
        $this->load->view('assets/_header');
        $max = $this->M_Pembelian_obat->selectNoDokumen();
        $i = 0;
        $page_data = array('max' =>  $max[$i]->max + 1,);
        $page_data['page_content'] = 'page_content/TotalFaktur';
        $page_data['id_total'] = $this->M_Pembelian_obat->getTotal();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function insertFaktur()
    {
        $tgl_masuk = $this->input->post('tgl_masuk');
        $inVendor  = $this->input->post('inVendor');
        $no_faktur  = $this->input->post('no_faktur');
        $tgl_struk = $this->input->post('tgl_struk');
        $tgl_overdue = $this->input->post('tgl_overdue');
        $tgl_buat = date("Y-m-d H:i:s");
        $inPO = $this->input->post('inPO');
        $max = $this->M_Pembelian_obat->selectNoDokumen()->max;

        $max = ($max == 0) ? 1 : $max + 1;

        $data = array(
            'id_struk' => uniqid(),
            'index_dok' => $max,
            'tgl_masuk' => $tgl_masuk,
            'id_produsen' => $inVendor,
            'no_faktur' => $no_faktur,
            'tgl_struk' => $tgl_struk,
            'tgl_overdue' => $tgl_overdue,
            'tgl_buat' => $tgl_buat,
            'id_faktur' => $inPO,
            'jenis_bayar' => $this->input->post('jenis_bayar'),
        );



        $this->M_Pembelian_obat->insertFaktur($data, 'struk_logistik');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function print_out($id_faktur)

    {
        $data['laporan_dp'] = $this->M_Pembelian_obat->getDataFaktur1($id_faktur);
        $data['nonduplikat'] = $this->M_Pembelian_obat->getDataFaktur123($id_faktur);
        $this->load->view('print/laporan_dp', $data);
    }


    public function tampil_pelayanan_masuk()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Pembelian_obat->selectRangePo($mulai, $akhir);
        } else {
            $page_data = $this->M_Pembelian_obat->selectDataJoin();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            // $idkey = $page_data[$i]->id_struk;
            // print_r($idkey);
            // exit();

            // $tes = $this->M_Pembelian_obat->getDataFaktur($idkey);
            // var_dump($tes);
            // die();


            if ($page_data[$i]->ket == 0) {
                $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_struk . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='icon-pencil'></i></a>";
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->id_struk . "\")'><i class='icon-trash'></i></a>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='icon-note'></i></a>";
                $cetak = "<a class='btn btn-info btn-icon-anim btn-square' target='_blank' href='" . base_url('Pembelian_obat/cetak/') . $page_data[$i]->id_struk .  "/" . $page_data[$i]->id_faktur . "'><i class='icon-printer'></i></a>";
                $aksi = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal2' data-target='.modal-faktur2'  onclick='input_detail_tambahan(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='fa fa-check'></i></a>";
            } elseif ($page_data[$i]->ket == 2) {
                $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'><i class='glyphicon glyphicon-ban-circle'></i></a>";
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square'><i class='glyphicon glyphicon-ban-circle'></i></a>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal'><i class='glyphicon glyphicon-ban-circle'></i></a>";
                $aksi = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal2' data-target='.modal-faktur2'><i class='glyphicon glyphicon-ban-circle'></i></a>";
                $cetak = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal2' data-target='.modal-faktur2'><i class='glyphicon glyphicon-ban-circle'></i></a>";
            }
            $time = strtotime($page_data[$i]->tgl_buat);
            $date = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $time1 = strtotime($page_data[$i]->tgl_struk);
            $date2 = strftime("%A, %d %B %Y ", $time1);

            $tgl1 = strtotime($page_data[$i]->tgl_masuk);
            $date3 = strftime("%A, %d %B %Y ", $tgl1);

            $tgl2 = strtotime($page_data[$i]->tgl_overdue);
            $date4 = strftime("%A, %d %B %Y ", $tgl2);



            $id_struk = $page_data[$i]->id_struk;
            // $totald = $this->db->query("SELECT sum(total) total from detail_struk where id_struk ='$id_struk'")->result_array();

            $no = $i + 1;
            $tgl_buat = $date;
            $waktu;
            $no_faktur = $page_data[$i]->no_faktur;
            $tgl_struk = $date2;
            $tgl_masuk = $date3;
            $id_produsen = $page_data[$i]->id_produsen;
            $no_dokumen = $page_data[$i]->no_dokumen;
            // $total = $totald[0]['total'];

            $out[$i] = array($no, $cetak, $pilih, $edit, $hapus, $tgl_buat, $waktu, $tgl_struk, $no_faktur, $date4, $tgl_masuk, $id_produsen, $no_dokumen, $aksi);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    //data baru
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
    public function tampil_total_harga1()
    {
        $idFaktur = $this->input->post('idFaktur');
        $idPo = $this->input->post('idPo');
        // $page_data = $this->db->query("SELECT SUM(total) total, ppn from detail_struk where id_struk = '$idFaktur'")->result();
        $page_data = $this->M_Po_obat->getTotalStruk($idPo, $idFaktur);
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

    public function tampil_list_faktur()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Pembelian_obat->getDataFaktur21($idFaktur);
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
            $harga = $page_data[$i]->harga;
            $jumlah = $page_data[$i]->jumlah;
            $frek = $page_data[$i]->diskon;
            $satuan = $page_data[$i]->ppn;
            $harga_cost = $page_data[$i]->harga_cost;
            $diskon = $page_data[$i]->disc;


            $total = $page_data[$i]->total;

            $out[$i] = array($no, $nama, $harga, $jumlah, $frek, $satuan, $diskon, $total, $status, $harga_cost, $pilih, $hapus);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    function hapus_list_faktur()
    {
        $id_detail = $this->input->post('id_detail');
        $this->M_Po_obat->delete_po($id_detail);
        $out['status'] = "success";
        echo json_encode($out);
    }

    function hapus_isi_list_faktur()
    {
        $id_detail = $this->input->post('id_detail');
        $id_faktur = $this->input->post('id_faktur');
        $id_detail_struk = $this->input->post('id_detail_struk');
        $data = array('status' => 0);
        $data2 = array('ket' => 0);

        // $keuangan = $this->db->query("SELECT a.* from akun_persediaan_farmasi a, detail_struk d, struk_logistik s 
        // where s.no_faktur = d.id_struk and a.no_faktur = s.no_faktur and a.tgl_faktur=s.tgl_masuk
        // and d.id_detail_struk ='$id_detail_struk'")->row();
        // if (!empty($keuangan)) {
        // $this->M_Po_obat->update(['no_faktur'=>$keuangan->no_faktur], ['status'=>0,'verifikasi'=>0], 'akun_persediaan_farmasi');
        // $this->M_Po_obat->update(['no_faktur'=>$keuangan->no_faktur], ['status'=>0,'verifikasi'=>0], 'akun_persediaan_farmasi');

        // }
        $this->M_Po_obat->delete_isi_po($id_detail, $id_faktur, $id_detail_struk, $data, $data2);
        $out['status'] = "success";
        // } else {
        //     $out['status'] = "Obat tidak bisa dihapus karena faktur sudah diverifikasi keuangan";
        // }
        echo json_encode($out);
    }

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
            'id_staff' => $data_staff->id_staff
        );


        $this->M_Po_obat->insertDetail($data, 'detail_po');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function getDataListFaktur()
    {
        $id_detail = $this->input->post('id_detail');
        $db = $this->M_Pembelian_obat->select_data_list_faktur($id_detail);

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
        $idfaktur = $this->input->post('idfaktur');
        $id_detail = $this->input->post('id_detail');
        // var_dump($id_detail);
        // die();


        $harga  = $this->input->post('harga');
        $margin  = $this->input->post('margin');
        $noBatch = $this->input->post('noBatch');
        $hargaLama = $this->input->post('hargalama');
        //$noFaktur = $this->input->post('noFaktur');
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
        $harga_persediaan = $this->input->post('harga_persediaan');

        $harga_struk = $this->input->post('harga_struk');
        $suhu = $this->input->post('suhu');
        $harga_ppn = $harga_struk * ($ppn / 100);

        $data = array(
            'status' =>  "1",
        );

        $data2 = array(
            'ket' =>  1,
        );


        $struk = $this->db->get_where('struk_logistik', ['no_faktur' => $idFaktur, 'id_faktur' => $idfaktur, 'ket' => 0])->row();
        $keuangan = $this->db->get_where('akun_persediaan_farmasi', ['no_faktur' => $idFaktur, 'tgl_faktur' => $struk->tgl_masuk, 'verifikasi' => 1])->row();

        if ($tglExp == '' || $tglExp == '0001-01-01' || $tglExp == '0000-00-00') {
            $out['status'] = "Pengisian Tanggal Espired Belum Sesuai";
        } else if (!empty($keuangan)) {
            $out['status'] = "Tidak dapat diinput, karena faktur sudah diverifikasi keuangan";
        } else {



            $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaan($idLogistik)->stok;

            $data_stok = array(
                'id_stok' => $id2,
                'id_logistik' => $idLogistik,
                'tgl' => date("Y-m-d H:i:s"),
                'keterangan' => 'MASUK',
                'frek' => $frek,
                'saldo' => $getStok + ($frek),
                'kadaluarsa' => $tglExp,
                'asal_tujuan' => 'FAKTUR',
                'id_struk' => 'F_' . $id,
                'id_staff' => $data_staff->id_staff,

            );
            // if($hargaLama > $harga)
            // {
            //     $data_list = array(
            //     'harga_cost' => $hargaLama,
            //     'margin' => $margin,
            //     );
            // }else if($hargaLama < $harga)
            // {
            //     $data_list = array(
            //         'harga_cost' => $harga,
            //         'margin' => $margin,
            //         );
            // }else{
            //     $data_list = array(
            //         'harga_cost' => $hargaLama,
            //         'margin' => $margin,
            //         );
            // }
            $data_list = array(
                // 'harga_cost' => $hna,
                'ppn' => $ppn,
                'harga_persediaan' => $harga_persediaan,
                'margin' => $margin,
            );

            $frek_po = $this->db->query("SELECT (jumlah * diskon) pc from detail_po where id_detail = '$id_detail'")->row()->pc;
            $frek_struk_awal = $this->db->query("SELECT sum(frek) frek from detail_struk where id_detail_po = '$id_detail' ")->row()->frek;
            $sisa_frek = $frek_po - $frek_struk_awal;

            if ($frek > $sisa_frek) {
                $out['status'] = "Jumlah barang tidak boleh lebih dari PO";
            } else {

                $data_struk = array(
                    'id_detail_struk' => $id,
                    'id_struk' => $idFaktur,
                    'no_batch' => $noBatch,
                    'kadaluarsa' => $tglExp,
                    'id_logistik' => $idLogistik,
                    'id_prod_obat' => $idProdusenObat,
                    'frek' => $frek,
                    'harga' => $hna,
                    'total' => $this->input->post('total'),
                    'harga_beli' => $hna,
                    'ppn' => $ppn,
                    //'harga_ppn' =>$harga_ppn,
                    'diskon' => 0,
                    'diskon_rs' => $diskonRs,
                    'tgl_input' => date("Y-m-d H:i:s"),
                    'id_detail_po' => $id_detail,
                    'suhu' => $suhu,
                    'sisa' => $sisa_frek - $frek,
                );

                $this->M_Po_obat->insert_detail_struk($data_struk, 'detail_struk');
                $this->M_Po_obat->insert_stok_logistik($data_stok, 'stok_logistik');

                $this->M_Po_obat->update_list_logistik($idLogistik, $data_list);

                $frek_struk = $this->db->query("SELECT sum(frek) frek from detail_struk where id_detail_po = '$id_detail' ")->row()->frek;

                if ($frek_struk >= $frek_po) {
                    $this->M_Po_obat->update_pembelian($id_detail, $data);
                }
                $po = $this->M_Pembelian_obat->cekPO($idfaktur, $data2);


                $out['status'] = "success";
            }
        }
        echo json_encode($out);
    }

    public function tampil_rangePo()
    {



        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Pembelian_obat->selectRangePo($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {


            if ($page_data[$i]->ket == 0) {
                $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_struk . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='icon-pencil'></i></a>";
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->id_struk . "\")'><i class='icon-trash'></i></a>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='icon-note'></i></a>";
                $cetak = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('Pembelian_obat/cetak/') . $page_data[$i]->id_struk .  "/" . $page_data[$i]->id_faktur . "'><i class='icon-printer'></i></a>";
                $aksi = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal2' data-target='.modal-faktur2'  onclick='input_detail_tambahan(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='fa fa-check'></i></a>";
            } elseif ($page_data[$i]->ket == 2) {
                $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'><i class='glyphicon glyphicon-ban-circle'></i></a>";
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square'><i class='glyphicon glyphicon-ban-circle'></i></a>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal'><i class='glyphicon glyphicon-ban-circle'></i></a>";
                $aksi = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal2' data-target='.modal-faktur2'><i class='glyphicon glyphicon-ban-circle'></i></a>";
                $cetak = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal2' data-target='.modal-faktur2'><i class='glyphicon glyphicon-ban-circle'></i></a>";
            }
            $time = strtotime($page_data[$i]->tgl_buat);
            $date = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $time = strtotime($page_data[$i]->tgl_struk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $tgl = strtotime($page_data[$i]->tgl_masuk);
            $date3 = strftime("%A, %d %B %Y ", $tgl);




            $id_struk = $page_data[$i]->id_struk;
            $total = $this->M_Pembelian_obat->getTotalById($page_data[$i]->id_struk)->total;


            $no = $i + 1;
            $tgl_buat = $date;
            $waktu;
            $no_faktur = $page_data[$i]->no_faktur;
            $tgl_struk = $date2;
            $tgl_masuk = $date3;
            $id_produsen = $page_data[$i]->id_produsen;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $total = $total;

            $out[$i] = array($no, $cetak, $pilih, $edit, $hapus, $tgl_buat, $waktu, $no_faktur, $tgl_struk, $tgl_masuk, $id_produsen, $no_dokumen, $aksi);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    function hapus_faktur()
    {
        $id_faktur = $this->input->post('id_faktur');
        $this->M_Po_obat->delete_faktur($id_faktur);
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_list_faktur1()
    {
        $id_faktur = $this->input->post('id_faktur');
        $id_struk = $this->input->post('id_struk');
        $page_data = $this->M_Po_obat->getDataFaktur1($id_faktur, $id_struk);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_isi_list_faktur(\"" . $page_data[$i]->id_detail .  "\",\"" . $page_data[$i]->id_faktur .  "\",\"" . $page_data[$i]->id_detail_struk .  "\")'><i class='icon-trash'></i></a>";


            $expired = strtotime($page_data[$i]->kadaluarsa);
            $date = strftime("%A, %d %B %Y ", $expired);


            $no = $i + 1;
            $nama_obat = $page_data[$i]->obat;
            $harga_satuan =  "Rp. " . number_format($page_data[$i]->harga_beli, 0, ',', '.');
            $jml_obat = $page_data[$i]->frek;
            $total =  "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $no_batch = $page_data[$i]->no_batch;
            $diskon = $page_data[$i]->diskon_rs;
            //$no_faktur= $page_data[$i]->no_faktur;
            $tgl_exp = $date;

            $out[$i] = array($no, $nama_obat, $harga_satuan, $diskon, $jml_obat, $total, $no_batch, $tgl_exp, $hapus);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    public function check_noFaktur1()
    {
        $no_faktur = $this->input->post("no_faktur");
        $tmp_data = $this->M_Pembelian_obat->get_nofaktur($no_faktur);

        if (count($tmp_data) > 0) {
            echo '<label class="text-danger pt-10"><span><i class="fa fa-times" aria-hidden="true">
            </i> No Faktur tidak tersedia</span></label>';
        } else {
            echo '<label class="text-success pt-10"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> No Faktur tersedia</span></label>';
        }
    }

    public function tampil_total_harga2()
    {
        $idFaktur = $this->input->post('id_faktur');
        $sum = $this->db->query("SELECT sum(total) total FROM detail_struk WHERE id_struk='$idFaktur'  ")->row_array();
        $out =  $sum;
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function insertTotalFakturLogFarm()
    {
        $id_faktur = $this->input->post("id_faktur");
        $nofaktur = $this->input->post("nofaktur");
        $ongkir = $this->input->post("OngkosKirim");
        $diskon = $this->input->post("DiscKeselurahan");
        $ppn = $this->input->post("PpnKeseluruhan");
        $file = $this->input->post("file");
        $hargaLama = $this->input->post("outHnaTotal");
        $hargatotal = $this->input->post("outHargaTotal");
        $tanggal_masuk = date("Y-m-d H:i:s");
        $id_staff = $this->session->userdata("data_auth");
        $ket = 0;

        $config['upload_path']          = './assets/images-log/';
        $config['allowed_types']        = 'pdf|gif|jpg|png';
        $config['max_size']             = 5000;
        $config['file_name']            = round(microtime(true) * 1000);


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        } else {
            $filename = $this->upload->data('file_name');


            $data = array(
                'id_total' => uniqid(),
                'id_faktur' => $id_faktur,
                'no_faktur' => $nofaktur,
                'diskon' => $diskon,
                'ppn' => $ppn,
                'ongkir' => $ongkir,
                'total' => $hargaLama,
                'total_keseluruhan' => $hargatotal,
                'tanggal_masuk' => $tanggal_masuk,
                'id_staff' => $id_staff->id_staff,
                'file' => $filename,
                'ket' => $ket
            );

            $data2 = array('ket' => 2);

            $this->M_Pembelian_obat->upload_detail_total($data);
            $this->M_Pembelian_obat->update_ket_faktur($nofaktur, $data2);

            //   if (!empty($_FILES['file']['name'])) {
            //     $upload = $this->_do_upload();
            //     $data['file'] = $upload;
            // }   

            // $out['status'] = "success";
            // echo json_encode($out);
            redirect(base_url('Pembelian_obat'));
        }
    }

    public function tampil_total()
    {
        $tgl = date("Y-m-d");

        $page_data = $this->M_Pembelian_obat->getTotal();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            //$pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal'><i class='icon-note'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='update_total(\"" . $page_data[$i]->id_total . "\",\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_faktur . "\",\"" . $page_data[$i]->ppn . "\",\"" . $page_data[$i]->diskon . "\",\"" . $page_data[$i]->ongkir . "\",\"" . $page_data[$i]->total . "\",\"" . $page_data[$i]->total_keseluruhan . "\")'><i class='icon-note'></i></a>";

            $hapus = "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='delete_total(\"" . $page_data[$i]->id_total . "\",\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='icon-trash'></i></a>";

            $time = strtotime($page_data[$i]->tanggal_masuk);
            $date = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_buat = $date;
            $waktu;
            $no_faktur = $page_data[$i]->id_faktur;
            $pajak = $page_data[$i]->ppn . "%";
            $ongkir = $page_data[$i]->ongkir;
            $diskon = $page_data[$i]->diskon;
            $tot = $page_data[$i]->total_keseluruhan;
            $gambar = $page_data[$i]->file;
            $url = base_url() . "/assets/images-log/" . $gambar;
            //$img = echo "<img src='assets/file-uploads/$gambar' width='70' height='90' />";

            $out[$i] = array($no, $pilih, $hapus, $tgl_buat, $waktu, $no_faktur, $ongkir, $diskon, $pajak, $tot, "<img src='$url' width='100' height='120' />");
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

    public function tampil_total_range()
    {
        $tgl = date("Y-m-d");
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Pembelian_obat->getTotaltRangePo($mulai, $akhir);


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            //$pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal'><i class='icon-note'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='update_total(\"" . $page_data[$i]->id_total . "\",\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_faktur . "\",\"" . $page_data[$i]->ppn . "\",\"" . $page_data[$i]->diskon . "\",\"" . $page_data[$i]->ongkir . "\",\"" . $page_data[$i]->total . "\",\"" . $page_data[$i]->total_keseluruhan . "\")'><i class='icon-note'></i></a>";

            $hapus = "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='delete_total(\"" . $page_data[$i]->id_total . "\",\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='icon-trash'></i></a>";

            $time = strtotime($page_data[$i]->tanggal_masuk);
            $date = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_buat = $date;
            $waktu;
            $no_faktur = $page_data[$i]->id_faktur;
            $pajak = $page_data[$i]->ppn . "%";
            $ongkir = $page_data[$i]->ongkir;
            $diskon = $page_data[$i]->diskon;
            $tot = $page_data[$i]->total_keseluruhan;
            $gambar = $page_data[$i]->file;
            $url = base_url() . "/assets/images-log/" . $gambar;
            //$img = echo "<img src='assets/file-uploads/$gambar' width='70' height='90' />";

            $out[$i] = array($no, $pilih, $hapus, $tgl_buat, $waktu, $no_faktur, $ongkir, $diskon, $pajak, $tot, "<img src='$url' width='100' height='120' />");
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
    //end data baru 
    public function update_total()
    {
        $id_total = $this->input->post("id_total");
        $id_faktur = $this->input->post("id_faktur");
        $nofaktur = $this->input->post('nofaktur');
        $diskon = $this->input->post("diskon");
        $ppn = $this->input->post("ppn");
        $ongkir = $this->input->post("ongkir");
        $total = $this->input->post("total");
        $total_keseluruhan = $this->input->post("total_keseluruhan");

        $data = array(
            'id_total' => $id_total,
            'id_faktur' => $id_faktur,
            'no_faktur' => $nofaktur,
            'diskon' => $diskon,
            'ppn' => $ppn,
            'ongkir' => $ongkir,
            'total' => $total,
            'total_keseluruhan' => $total_keseluruhan
        );

        $where = array(
            'id_total' => $id_total
        );

        $this->M_Pembelian_obat->update_detail_total($where, $data, 'total_faktur_logistik_farmasi');
        $out['status'] = "success";
        echo json_encode($out);
    }

    function delete_total()
    {
        $id_total = $this->input->post('id_total');
        $id_faktur = $this->input->post('id_faktur');
        $nofaktur = $this->input->post('no_faktur');
        $page_data1 = array(
            'ket' => '1',

        );
        $page_data2 = array(
            'ket' => '0',
        );
        $where = array(
            'id_total' => $id_total,
        );

        $where2 = array(
            'no_faktur' => $nofaktur,
        );

        $this->M_Pembelian_obat->update_logistik_farmasi($where, $page_data1, 'total_faktur_logistik_farmasi');
        $this->M_Pembelian_obat->update_logistik_farmasi($where2, $page_data2, 'struk_logistik');
        $out['status'] = "success";
        echo json_encode($out);
    }

    function hapus_faktur_farm()
    {
        $id_struk = $this->input->post('id_struk');

        $keuangan = $this->db->query("SELECT a.* from akun_persediaan_farmasi a, struk_logistik s where a.no_faktur = s.no_faktur and s.id_struk='$id_struk' and a.verifikasi =1")->row();
        if (empty($keuangan)) {
            $page_data1 = array(
                'ket' => '1',

            );
            $where = array(
                'id_struk' => $id_struk,
            );

            $this->M_Pembelian_obat->update_logistik_farmasi($where, $page_data1, 'struk_logistik');

            $db = $this->db->query("SELECT d.* from struk_logistik s, detail_struk d where s.no_faktur = d.id_struk and s.id_struk ='$id_struk'")->result();
            $no_faktur = $db[0]->id_struk;

            $db1 = $this->db->query("SELECT count(id_struk) jumlah from struk_logistik s where s.no_faktur ='$no_faktur'")->row();
            if ($db1->jumlah == 1) {
                $this->db->delete('akun_persediaan_farmasi', array('no_faktur' => $db[0]->id_struk, 'verifikasi' => 0));

                foreach ($db as $row) {

                    $this->db->delete('stok_logistik', array('id_struk' => 'F_' . $row->id_detail_struk));
                    $this->db->delete('detail_struk', array('id_detail_struk' => $row->id_detail_struk));
                }
            }
            $out['status'] = "success";
        } else {
            $out['status'] = "Faktur tidak dapat dihapus, karena faktur sudah diverifikasi keuangan";
        }
        echo json_encode($out);
    }

    function insertReturObat()
    {
        $id_faktur = $this->input->post("nofaktur");
        $namaobat = $this->input->post("nama_obat");
        $jumlah_obat = $this->input->post("jumlah_obat");
        $harga_satuan = $this->input->post("harga_satuan");
        $harga_struk = $this->input->post("harga_struk");
        $harga_total = $this->input->post("harga_total");


        $data = array(
            'id_retur' => uniqid(),
            'id_faktur' => $id_faktur,
            'nama_obat' => $namaobat,
            'harga_obat' => $jumlah_obat,
            'harga_struk' => $harga_struk,
            'jumlah_obat' => $jumlah_obat,
            'harga_total' => $harga_total,
        );
        $this->M_Pembelian_obat->insertObatRetur($data, 'obat_retur');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function cetak($no_faktur, $id_faktur)
    {
        // $data['lengkap'] = 'YA';

        $struk = $this->db->get_where('struk_logistik', ['id_struk' => $no_faktur])->row_array();
        $po = $this->db->get_where('faktur_logistik_farmasi', ['id_faktur' => $id_faktur])->row_array();
        $data['tglStruk'] = $struk;
        $data['po'] = $po;
        $data['data'] = $this->M_Pembelian_obat->getDataCetak($id_faktur, $no_faktur);

        $dbtotal = $this->db->query("SELECT sum(d.harga*d.frek)  total_hna, d.ppn ,sum((d.harga - d.harga * (d.diskon_rs / 100))*d.frek) total,sum(d.total) total_ppn
            from detail_struk d, list_logistik l, detail_po dp, faktur_logistik_farmasi f,struk_logistik s
            where d.id_logistik = l.id_logistik
            and d.id_logistik=dp.id_list
            and d.id_detail_po=dp.id_detail
            and d.id_struk = s.no_faktur
            and f.id_faktur = dp.id_faktur
            and s.id_struk = '$no_faktur'")->row();
        $ppn = $dbtotal->total * 0.11;
        $noValid =  sprintf('%04d', $struk['index_dok'], 'dyhtdyu');
        $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($struk['tgl_buat']))) . "/" . date("Y", strtotime($struk['tgl_buat']));

        $data_verifikasi = array(
            'tipe_akun' => 'persediaan',
            'no_faktur' => $struk['no_faktur'],
            'no_po' => $po['no_dokumen'],
            'npb' => $noDok,
            'tgl_faktur' => $struk['tgl_masuk'],
            'tgl_po' => $po['tgl_faktur'],
            'vendor' => $struk['id_produsen'],
            'jumlah' => round($dbtotal->total),
        );

        $map = $this->db->get_where('akun_persediaan_farmasi', ['no_faktur' => $struk['no_faktur'], 'npb' => $noDok])->result();
        if (count($map) > 0) {
            if ($map[0]->verifikasi == 0) {
                $this->M_Pembelian_obat->delete_tindakan($struk['no_faktur'], 'akun_persediaan_farmasi', 'no_faktur');
                $this->M_Po_obat->insert_stok_logistik($data_verifikasi, 'akun_persediaan_farmasi');
            }
        } else {
            $this->M_Po_obat->insert_stok_logistik($data_verifikasi, 'akun_persediaan_farmasi');
        }

        // echo round($ppn);
        // $data_verifikasi1 = array(
        //     'tipe_akun' => 'hutang',
        //     'no_faktur' => $struk['no_faktur'],
        //     'no_po' => $po['no_dokumen'],
        //     'tgl_faktur' => $struk['tgl_masuk'],
        //     'tgl_po' => $po['tgl_faktur'],
        //     'vendor' => $struk['id_produsen'],
        //     'jumlah' => round($dbtotal->total_ppn),
        // );
        // $this->M_Po_obat->insert_stok_logistik($data_verifikasi1, 'akun_persediaan_farmasi');

        $data['data_t'] = $this->M_Pembelian_obat->getTotalDiskon($id_faktur, $no_faktur);

        $this->load->view('print/cetakDp', $data);
    }

    public function insert_cetakDp()
    {
        $id_staff = $this->session->userdata("data_auth");
        $id_faktur = $this->input->post('id_faktur');

        $cetakDp = $this->db->query("SELECT count(*) jumlah  from cetak_dp  where id_faktur = '$id_faktur'")->row();
        if ($cetakDp->jumlah > 0) {
            //do nothing
        } else {
            $data = array(
                'id_cetak' => uniqid(),
                'id_faktur' => $this->input->post('id_faktur'),
                'no_dokumen' => $this->input->post('no_dokumen'),
                'faktur_nomor_dp' => $this->input->post('faktur_nomor'),
                'no_distributor' => $this->input->post('no_dist'),
                'distributor' => $this->input->post('distributor'),
                'no_index' => $this->input->post('no_index'),
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga'),
                'diskon' => $this->input->post('diskon'),
                'total' => $this->input->post('total'),
                'beaongkir' => $this->input->post('beaongkir'),
                'alldiskon' => $this->input->post('alldiskon'),
                'ppn' => $this->input->post('ppn'),
                'total_keseluruhan' => $this->input->post('total_kes'),
                'tgl_input' => date("Y-m-d H:i:s"),
                'tgl_terima' => $this->input->post('tgl_terima'),
                'ket' => $this->input->post('ket'),
                'id_staff' => $id_staff->id_staff,
            );

            $this->M_Pembelian_obat->insert_cetak($data, 'cetak_dp');
        }


        $out['status'] = "success";
        echo json_encode($out);
    }
    public function getHargaFaktur()
    {
        $no_faktur = $this->input->post('no_faktur');
        $id_faktur = $this->input->post('id_faktur');
        $po = $this->db->query("SELECT SUM(total) total from detail_po where id_faktur = '$id_faktur'")->row();
        $db = $this->db->query("SELECT SUM(total) total, ppn from detail_struk where id_struk = '$no_faktur'")->result();
        $cetakDp = $this->db->query("SELECT *  from cetak_dp c, struk_logistik s where c.id_faktur = s.id_faktur and s.no_faktur = '$no_faktur'")->result();
        // $tgl = strtotime($cetakDp[0]->tgl_terima);


        // cari max no distributor
        $dbMax = $this->M_Pembelian_obat->selectNo();
        $max2 =  $dbMax[0]->max2 + 1;
        date_default_timezone_set('Asia/Jakarta');
        date("Y-m-d");
        $noValid =  sprintf('%04d', $max2, 'dyhtdyu');
        $noDok = $noValid . "/" . "RDP/FARM-RSBT/" . $this->numtor(date("m")) . "/" . date("Y");


        if (count($cetakDp) > 0) {
            $no_distributor = $cetakDp[0]->no_distributor;
            $bea_ongkir = $cetakDp[0]->beaongkir;
            // $tgl_terima = date('Y-m-d',$tgl);
        } else {
            $no_distributor = $noDok;
            $bea_ongkir = 0;
            // $tgl_terima ="";
        }
        if (count($db) > 0) {
            $db = $db[0];
            $db->no_distributor = $no_distributor;
            $db->bea_ongkir = $bea_ongkir;
            $db->total_po = $po->total;
            // $db->tgl_terima = $tgl_terima;
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    function numtor($number)
    {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if ($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }

    public function faktur_po()
    {
        $page_data = $this->db->get('faktur_logistik_farmasi')->result();
        foreach ($page_data as $row) {
            $id_faktur = $row->id_faktur;
            $query = $this->db->query("SELECT d.*, f.id_faktur FROM detail_po d, faktur_logistik_farmasi f where d.id_faktur='$id_faktur' AND d.id_faktur = f.id_faktur AND d.status = '0'");

            if ($query->num_rows() == 0) {
                $data2 = array(
                    'ket' =>  1,
                );
                $this->db->where('id_faktur', $id_faktur);
                $this->db->update('faktur_logistik_farmasi', $data2);
            }
        }
    }
    public function getDataFaktur()
    {
        $id_struk = $this->input->post("id_struk");
        // $tmp_data = $this->db->get_where('struk_logistik', ['id_struk' => $id_struk])->row();
        $tmp_data = $this->db->query("SELECT s.*,a.verifikasi,j.verifikasi_hutang from struk_logistik s 
        left join akun_persediaan_farmasi a  on a.no_faktur = s.no_faktur and a.tgl_faktur=s.tgl_masuk
        left join jurnal_pembayaran_farmasi j  on a.no_jurnal = j.no_jurnal
        where s.id_struk='$id_struk'
        group by s.id_struk")->row();

        echo json_encode($tmp_data);
    }
    public function editFaktur()
    {
        $tgl_masuk = $this->input->post('tgl_masuk');
        // $inVendor  = $this->input->post('inVendor');
        $no_faktur  = $this->input->post('no_faktur');
        $id_struk  = $this->input->post('id_struk');
        $tgl_struk = $this->input->post('tgl_struk');
        $tgl_overdue = $this->input->post('tgl_overdue');

        // $keuangan = $this->db->query("SELECT a.* from akun_persediaan_farmasi a, struk_logistik s where a.no_faktur = s.no_faktur and s.id_struk='$id_struk' and a.verifikasi =1")->row();
        // if (empty($keuangan)) {
        $dbstruk = $this->db->get_where('struk_logistik', ['id_struk' => $id_struk])->row();
        $dbstruk_no = $this->db->get_where('struk_logistik', ['no_faktur' => $no_faktur])->result();
        if (count($dbstruk_no) < 1) {
            $this->M_Pembelian_obat->update_logistik_farmasi(['id_struk' => $dbstruk->no_faktur], ['id_struk' => $no_faktur], 'detail_struk');
            $this->M_Pembelian_obat->update_logistik_farmasi(['no_faktur' => $dbstruk->no_faktur], ['no_faktur' => $no_faktur], 'akun_persediaan_farmasi');

            $data = array(
                'tgl_masuk' => $tgl_masuk,
                'no_faktur' => $no_faktur,
                'tgl_struk' => $tgl_struk,
                'tgl_overdue' => $tgl_overdue,
            );


            $this->M_Pembelian_obat->update_logistik_farmasi(['id_struk' => $id_struk], $data, 'struk_logistik');
            $out['status'] = "success";
        } else {
            $out['status'] = "Faktur tidak bisa diedit, karena no faktur " . $no_faktur . " sudah ada";
        }
        echo json_encode($out);
    }

    public function getDataDetailFaktur()
    {
        $id_struk = $this->input->post("id_struk");
        // $tmp_data = $this->db->get_where('struk_logistik', ['id_struk' => $id_struk])->row();
        $tmp_data = $this->db->query("SELECT a.verifikasi,j.verifikasi_hutang 
        from detail_struk d
        join struk_logistik s on s.no_faktur = d.id_struk
        left join akun_persediaan_farmasi a  on a.no_faktur = s.no_faktur and a.tgl_faktur=s.tgl_masuk
        left join jurnal_pembayaran_farmasi j  on a.no_jurnal = j.no_jurnal
        where d.id_detail_struk='$id_struk'
        group by d.id_detail_struk")->row();

        echo json_encode($tmp_data);
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian_obat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Pembelian_obat');
        $this->load->model('M_Po_obat');
        $this->load->model('M_Logistik_farmasi');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $i = 0;
        $max2 = $this->M_Pembelian_obat->selectNo();
        $page_data = array('max2' =>  $max2[$i]->max2 + 1,);

        // $page_data['vaksin'] = $this->db->get('produsen')->result_array();
        $page_data['po_obat'] = $this->M_Pembelian_obat->getPoObat();
        //$page_data['po_obat'] = $this->M_Pembelian_obat->getDataPO();

        $page_data['page_content'] = 'page_content/Pembelian_obat';
        $page_data['obat'] = $this->M_Pembelian_obat->getNamaObat();
        $page_data['n_obat'] = $this->M_Pembelian_obat->getObatNama();

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    /* public function getnodokumen()
    {
        $this->load->view('assets/_header');
        $max=$this->M_Pembelian_obat->selectNoDokumen();
        $i=0;
        $page_data = array('max' =>  $max[$i]->max + 1, );

        $page_data['page_content'] = 'page_content/Pembelian_obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }*/


    public function total_faktur()
    {
        $this->load->view('assets/_header');
        $max = $this->M_Pembelian_obat->selectNoDokumen();
        $i = 0;
        $page_data = array('max' =>  $max[$i]->max + 1,);
        $page_data['page_content'] = 'page_content/TotalFaktur';
        $page_data['id_total'] = $this->M_Pembelian_obat->getTotal();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function insertFaktur()
    {
        $tgl_masuk = $this->input->post('tgl_masuk');
        $inVendor  = $this->input->post('inVendor');
        $no_faktur  = $this->input->post('no_faktur');
        $tgl_struk = $this->input->post('tgl_struk');
        $tgl_overdue = $this->input->post('tgl_overdue');
        $tgl_buat = date("Y-m-d H:i:s");
        $inPO = $this->input->post('inPO');
        $max = $this->M_Pembelian_obat->selectNoDokumen()->max;

        $max = ($max == 0) ? 1 : $max + 1;

        $data = array(
            'id_struk' => uniqid(),
            'index_dok' => $max,
            'tgl_masuk' => $tgl_masuk,
            'id_produsen' => $inVendor,
            'no_faktur' => $no_faktur,
            'tgl_struk' => $tgl_struk,
            'tgl_overdue' => $tgl_overdue,
            'tgl_buat' => $tgl_buat,
            'id_faktur' => $inPO,
            'jenis_bayar' => $this->input->post('jenis_bayar'),
        );



        $this->M_Pembelian_obat->insertFaktur($data, 'struk_logistik');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function print_out($id_faktur)

    {
        $data['laporan_dp'] = $this->M_Pembelian_obat->getDataFaktur1($id_faktur);
        $data['nonduplikat'] = $this->M_Pembelian_obat->getDataFaktur123($id_faktur);
        $this->load->view('print/laporan_dp', $data);
    }


    public function tampil_pelayanan_masuk()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Pembelian_obat->selectRangePo($mulai, $akhir);
        } else {
            $page_data = $this->M_Pembelian_obat->selectDataJoin();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            // $idkey = $page_data[$i]->id_struk;
            // print_r($idkey);
            // exit();

            // $tes = $this->M_Pembelian_obat->getDataFaktur($idkey);
            // var_dump($tes);
            // die();


            if ($page_data[$i]->ket == 0) {
                $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]->id_struk . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='icon-pencil'></i></a>";
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->id_struk . "\")'><i class='icon-trash'></i></a>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='icon-note'></i></a>";
                $cetak = "<a class='btn btn-info btn-icon-anim btn-square' target='_blank' href='" . base_url('Pembelian_obat/cetak/') . $page_data[$i]->id_struk .  "/" . $page_data[$i]->id_faktur . "'><i class='icon-printer'></i></a>";
                $aksi = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal2' data-target='.modal-faktur2'  onclick='input_detail_tambahan(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='fa fa-check'></i></a>";
            } elseif ($page_data[$i]->ket == 2) {
                $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'><i class='glyphicon glyphicon-ban-circle'></i></a>";
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square'><i class='glyphicon glyphicon-ban-circle'></i></a>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal'><i class='glyphicon glyphicon-ban-circle'></i></a>";
                $aksi = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal2' data-target='.modal-faktur2'><i class='glyphicon glyphicon-ban-circle'></i></a>";
                $cetak = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal2' data-target='.modal-faktur2'><i class='glyphicon glyphicon-ban-circle'></i></a>";
            }
            $time = strtotime($page_data[$i]->tgl_buat);
            $date = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $time1 = strtotime($page_data[$i]->tgl_struk);
            $date2 = strftime("%A, %d %B %Y ", $time1);

            $tgl1 = strtotime($page_data[$i]->tgl_masuk);
            $date3 = strftime("%A, %d %B %Y ", $tgl1);

            $tgl2 = strtotime($page_data[$i]->tgl_overdue);
            $date4 = strftime("%A, %d %B %Y ", $tgl2);



            $id_struk = $page_data[$i]->id_struk;
            // $totald = $this->db->query("SELECT sum(total) total from detail_struk where id_struk ='$id_struk'")->result_array();

            $no = $i + 1;
            $tgl_buat = $date;
            $waktu;
            $no_faktur = $page_data[$i]->no_faktur;
            $tgl_struk = $date2;
            $tgl_masuk = $date3;
            $id_produsen = $page_data[$i]->id_produsen;
            $no_dokumen = $page_data[$i]->no_dokumen;
            // $total = $totald[0]['total'];

            $out[$i] = array($no, $cetak, $pilih, $edit, $hapus, $tgl_buat, $waktu, $tgl_struk, $no_faktur, $date4, $tgl_masuk, $id_produsen, $no_dokumen, $aksi);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    //data baru
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
    public function tampil_total_harga1()
    {
        $idFaktur = $this->input->post('idFaktur');
        $idPo = $this->input->post('idPo');
        // $page_data = $this->db->query("SELECT SUM(total) total, ppn from detail_struk where id_struk = '$idFaktur'")->result();
        $page_data = $this->M_Po_obat->getTotalStruk($idPo, $idFaktur);
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

    public function tampil_list_faktur()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Pembelian_obat->getDataFaktur21($idFaktur);
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
            $harga = $page_data[$i]->harga;
            $jumlah = $page_data[$i]->jumlah;
            $frek = $page_data[$i]->diskon;
            $satuan = $page_data[$i]->ppn;
            $harga_cost = $page_data[$i]->harga_cost;
            $diskon = $page_data[$i]->disc;


            $total = $page_data[$i]->total;

            $out[$i] = array($no, $nama, $harga, $jumlah, $frek, $satuan, $diskon, $total, $status, $harga_cost, $pilih, $hapus);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    function hapus_list_faktur()
    {
        $id_detail = $this->input->post('id_detail');
        $this->M_Po_obat->delete_po($id_detail);
        $out['status'] = "success";
        echo json_encode($out);
    }

    function hapus_isi_list_faktur()
    {
        $id_detail = $this->input->post('id_detail');
        $id_faktur = $this->input->post('id_faktur');
        $id_detail_struk = $this->input->post('id_detail_struk');
        $data = array('status' => 0);
        $data2 = array('ket' => 0);

        // $keuangan = $this->db->query("SELECT a.* from akun_persediaan_farmasi a, detail_struk d, struk_logistik s 
        // where s.no_faktur = d.id_struk and a.no_faktur = s.no_faktur and a.tgl_faktur=s.tgl_masuk
        // and d.id_detail_struk ='$id_detail_struk'")->row();
        // if (!empty($keuangan)) {
        // $this->M_Po_obat->update(['no_faktur'=>$keuangan->no_faktur], ['status'=>0,'verifikasi'=>0], 'akun_persediaan_farmasi');
        // $this->M_Po_obat->update(['no_faktur'=>$keuangan->no_faktur], ['status'=>0,'verifikasi'=>0], 'akun_persediaan_farmasi');

        // }
        $this->M_Po_obat->delete_isi_po($id_detail, $id_faktur, $id_detail_struk, $data, $data2);
        $out['status'] = "success";
        // } else {
        //     $out['status'] = "Obat tidak bisa dihapus karena faktur sudah diverifikasi keuangan";
        // }
        echo json_encode($out);
    }

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
            'id_staff' => $data_staff->id_staff
        );


        $this->M_Po_obat->insertDetail($data, 'detail_po');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function getDataListFaktur()
    {
        $id_detail = $this->input->post('id_detail');
        $db = $this->M_Pembelian_obat->select_data_list_faktur($id_detail);

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
        $idfaktur = $this->input->post('idfaktur');
        $id_detail = $this->input->post('id_detail');
        // var_dump($id_detail);
        // die();


        $harga  = $this->input->post('harga');
        $margin  = $this->input->post('margin');
        $noBatch = $this->input->post('noBatch');
        $hargaLama = $this->input->post('hargalama');
        //$noFaktur = $this->input->post('noFaktur');
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
        $harga_persediaan = $this->input->post('harga_persediaan');

        $harga_struk = $this->input->post('harga_struk');
        $suhu = $this->input->post('suhu');
        $harga_ppn = $harga_struk * ($ppn / 100);

        $data = array(
            'status' =>  "1",
        );

        $data2 = array(
            'ket' =>  1,
        );


        $struk = $this->db->get_where('struk_logistik', ['no_faktur' => $idFaktur, 'id_faktur' => $idfaktur, 'ket' => 0])->row();
        $keuangan = $this->db->get_where('akun_persediaan_farmasi', ['no_faktur' => $idFaktur, 'tgl_faktur' => $struk->tgl_masuk, 'verifikasi' => 1])->row();

        if ($tglExp == '' || $tglExp == '0001-01-01' || $tglExp == '0000-00-00') {
            $out['status'] = "Pengisian Tanggal Espired Belum Sesuai";
        } else if (!empty($keuangan)) {
            $out['status'] = "Tidak dapat diinput, karena faktur sudah diverifikasi keuangan";
        } else {



            $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaan($idLogistik)->stok;

            $data_stok = array(
                'id_stok' => $id2,
                'id_logistik' => $idLogistik,
                'tgl' => date("Y-m-d H:i:s"),
                'keterangan' => 'MASUK',
                'frek' => $frek,
                'saldo' => $getStok + ($frek),
                'kadaluarsa' => $tglExp,
                'asal_tujuan' => 'FAKTUR',
                'id_struk' => 'F_' . $id,
                'id_staff' => $data_staff->id_staff,

            );
            // if($hargaLama > $harga)
            // {
            //     $data_list = array(
            //     'harga_cost' => $hargaLama,
            //     'margin' => $margin,
            //     );
            // }else if($hargaLama < $harga)
            // {
            //     $data_list = array(
            //         'harga_cost' => $harga,
            //         'margin' => $margin,
            //         );
            // }else{
            //     $data_list = array(
            //         'harga_cost' => $hargaLama,
            //         'margin' => $margin,
            //         );
            // }
            $data_list = array(
                // 'harga_cost' => $hna,
                'ppn' => $ppn,
                'harga_persediaan' => $harga_persediaan,
                'margin' => $margin,
            );

            $frek_po = $this->db->query("SELECT (jumlah * diskon) pc from detail_po where id_detail = '$id_detail'")->row()->pc;
            $frek_struk_awal = $this->db->query("SELECT sum(frek) frek from detail_struk where id_detail_po = '$id_detail' ")->row()->frek;
            $sisa_frek = $frek_po - $frek_struk_awal;

            if ($frek > $sisa_frek) {
                $out['status'] = "Jumlah barang tidak boleh lebih dari PO";
            } else {

                $data_struk = array(
                    'id_detail_struk' => $id,
                    'id_struk' => $idFaktur,
                    'no_batch' => $noBatch,
                    'kadaluarsa' => $tglExp,
                    'id_logistik' => $idLogistik,
                    'id_prod_obat' => $idProdusenObat,
                    'frek' => $frek,
                    'harga' => $hna,
                    'total' => $this->input->post('total'),
                    'harga_beli' => $hna,
                    'ppn' => $ppn,
                    //'harga_ppn' =>$harga_ppn,
                    'diskon' => 0,
                    'diskon_rs' => $diskonRs,
                    'tgl_input' => date("Y-m-d H:i:s"),
                    'id_detail_po' => $id_detail,
                    'suhu' => $suhu,
                    'sisa' => $sisa_frek - $frek,
                );

                $this->M_Po_obat->insert_detail_struk($data_struk, 'detail_struk');
                $this->M_Po_obat->insert_stok_logistik($data_stok, 'stok_logistik');

                $this->M_Po_obat->update_list_logistik($idLogistik, $data_list);

                $frek_struk = $this->db->query("SELECT sum(frek) frek from detail_struk where id_detail_po = '$id_detail' ")->row()->frek;

                if ($frek_struk >= $frek_po) {
                    $this->M_Po_obat->update_pembelian($id_detail, $data);
                }
                $po = $this->M_Pembelian_obat->cekPO($idfaktur, $data2);


                $out['status'] = "success";
            }
        }
        echo json_encode($out);
    }

    public function tampil_rangePo()
    {



        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Pembelian_obat->selectRangePo($mulai, $akhir);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {


            if ($page_data[$i]->ket == 0) {
                $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_struk . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='icon-pencil'></i></a>";
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->id_struk . "\")'><i class='icon-trash'></i></a>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='icon-note'></i></a>";
                $cetak = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('Pembelian_obat/cetak/') . $page_data[$i]->id_struk .  "/" . $page_data[$i]->id_faktur . "'><i class='icon-printer'></i></a>";
                $aksi = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal2' data-target='.modal-faktur2'  onclick='input_detail_tambahan(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='fa fa-check'></i></a>";
            } elseif ($page_data[$i]->ket == 2) {
                $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'><i class='glyphicon glyphicon-ban-circle'></i></a>";
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square'><i class='glyphicon glyphicon-ban-circle'></i></a>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal'><i class='glyphicon glyphicon-ban-circle'></i></a>";
                $aksi = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal2' data-target='.modal-faktur2'><i class='glyphicon glyphicon-ban-circle'></i></a>";
                $cetak = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal2' data-target='.modal-faktur2'><i class='glyphicon glyphicon-ban-circle'></i></a>";
            }
            $time = strtotime($page_data[$i]->tgl_buat);
            $date = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $time = strtotime($page_data[$i]->tgl_struk);
            $date2 = strftime("%A, %d %B %Y ", $time);

            $tgl = strtotime($page_data[$i]->tgl_masuk);
            $date3 = strftime("%A, %d %B %Y ", $tgl);




            $id_struk = $page_data[$i]->id_struk;
            $total = $this->M_Pembelian_obat->getTotalById($page_data[$i]->id_struk)->total;


            $no = $i + 1;
            $tgl_buat = $date;
            $waktu;
            $no_faktur = $page_data[$i]->no_faktur;
            $tgl_struk = $date2;
            $tgl_masuk = $date3;
            $id_produsen = $page_data[$i]->id_produsen;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $total = $total;

            $out[$i] = array($no, $cetak, $pilih, $edit, $hapus, $tgl_buat, $waktu, $no_faktur, $tgl_struk, $tgl_masuk, $id_produsen, $no_dokumen, $aksi);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    function hapus_faktur()
    {
        $id_faktur = $this->input->post('id_faktur');
        $this->M_Po_obat->delete_faktur($id_faktur);
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_list_faktur1()
    {
        $id_faktur = $this->input->post('id_faktur');
        $id_struk = $this->input->post('id_struk');
        $page_data = $this->M_Po_obat->getDataFaktur1($id_faktur, $id_struk);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_isi_list_faktur(\"" . $page_data[$i]->id_detail .  "\",\"" . $page_data[$i]->id_faktur .  "\",\"" . $page_data[$i]->id_detail_struk .  "\")'><i class='icon-trash'></i></a>";


            $expired = strtotime($page_data[$i]->kadaluarsa);
            $date = strftime("%A, %d %B %Y ", $expired);


            $no = $i + 1;
            $nama_obat = $page_data[$i]->obat;
            $harga_satuan =  "Rp. " . number_format($page_data[$i]->harga_beli, 0, ',', '.');
            $jml_obat = $page_data[$i]->frek;
            $total =  "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $no_batch = $page_data[$i]->no_batch;
            $diskon = $page_data[$i]->diskon_rs;
            //$no_faktur= $page_data[$i]->no_faktur;
            $tgl_exp = $date;

            $out[$i] = array($no, $nama_obat, $harga_satuan, $diskon, $jml_obat, $total, $no_batch, $tgl_exp, $hapus);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }

    public function check_noFaktur1()
    {
        $no_faktur = $this->input->post("no_faktur");
        $tmp_data = $this->M_Pembelian_obat->get_nofaktur($no_faktur);

        if (count($tmp_data) > 0) {
            echo '<label class="text-danger pt-10"><span><i class="fa fa-times" aria-hidden="true">
            </i> No Faktur tidak tersedia</span></label>';
        } else {
            echo '<label class="text-success pt-10"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> No Faktur tersedia</span></label>';
        }
    }

    public function tampil_total_harga2()
    {
        $idFaktur = $this->input->post('id_faktur');
        $sum = $this->db->query("SELECT sum(total) total FROM detail_struk WHERE id_struk='$idFaktur'  ")->row_array();
        $out =  $sum;
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function insertTotalFakturLogFarm()
    {
        $id_faktur = $this->input->post("id_faktur");
        $nofaktur = $this->input->post("nofaktur");
        $ongkir = $this->input->post("OngkosKirim");
        $diskon = $this->input->post("DiscKeselurahan");
        $ppn = $this->input->post("PpnKeseluruhan");
        $file = $this->input->post("file");
        $hargaLama = $this->input->post("outHnaTotal");
        $hargatotal = $this->input->post("outHargaTotal");
        $tanggal_masuk = date("Y-m-d H:i:s");
        $id_staff = $this->session->userdata("data_auth");
        $ket = 0;

        $config['upload_path']          = './assets/images-log/';
        $config['allowed_types']        = 'pdf|gif|jpg|png';
        $config['max_size']             = 5000;
        $config['file_name']            = round(microtime(true) * 1000);


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        } else {
            $filename = $this->upload->data('file_name');


            $data = array(
                'id_total' => uniqid(),
                'id_faktur' => $id_faktur,
                'no_faktur' => $nofaktur,
                'diskon' => $diskon,
                'ppn' => $ppn,
                'ongkir' => $ongkir,
                'total' => $hargaLama,
                'total_keseluruhan' => $hargatotal,
                'tanggal_masuk' => $tanggal_masuk,
                'id_staff' => $id_staff->id_staff,
                'file' => $filename,
                'ket' => $ket
            );

            $data2 = array('ket' => 2);

            $this->M_Pembelian_obat->upload_detail_total($data);
            $this->M_Pembelian_obat->update_ket_faktur($nofaktur, $data2);

            //   if (!empty($_FILES['file']['name'])) {
            //     $upload = $this->_do_upload();
            //     $data['file'] = $upload;
            // }   

            // $out['status'] = "success";
            // echo json_encode($out);
            redirect(base_url('Pembelian_obat'));
        }
    }

    public function tampil_total()
    {
        $tgl = date("Y-m-d");

        $page_data = $this->M_Pembelian_obat->getTotal();


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            //$pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal'><i class='icon-note'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='update_total(\"" . $page_data[$i]->id_total . "\",\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_faktur . "\",\"" . $page_data[$i]->ppn . "\",\"" . $page_data[$i]->diskon . "\",\"" . $page_data[$i]->ongkir . "\",\"" . $page_data[$i]->total . "\",\"" . $page_data[$i]->total_keseluruhan . "\")'><i class='icon-note'></i></a>";

            $hapus = "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='delete_total(\"" . $page_data[$i]->id_total . "\",\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='icon-trash'></i></a>";

            $time = strtotime($page_data[$i]->tanggal_masuk);
            $date = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_buat = $date;
            $waktu;
            $no_faktur = $page_data[$i]->id_faktur;
            $pajak = $page_data[$i]->ppn . "%";
            $ongkir = $page_data[$i]->ongkir;
            $diskon = $page_data[$i]->diskon;
            $tot = $page_data[$i]->total_keseluruhan;
            $gambar = $page_data[$i]->file;
            $url = base_url() . "/assets/images-log/" . $gambar;
            //$img = echo "<img src='assets/file-uploads/$gambar' width='70' height='90' />";

            $out[$i] = array($no, $pilih, $hapus, $tgl_buat, $waktu, $no_faktur, $ongkir, $diskon, $pajak, $tot, "<img src='$url' width='100' height='120' />");
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

    public function tampil_total_range()
    {
        $tgl = date("Y-m-d");
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $page_data = $this->M_Pembelian_obat->getTotaltRangePo($mulai, $akhir);


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            //$pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal'><i class='icon-note'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='update_total(\"" . $page_data[$i]->id_total . "\",\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_faktur . "\",\"" . $page_data[$i]->ppn . "\",\"" . $page_data[$i]->diskon . "\",\"" . $page_data[$i]->ongkir . "\",\"" . $page_data[$i]->total . "\",\"" . $page_data[$i]->total_keseluruhan . "\")'><i class='icon-note'></i></a>";

            $hapus = "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='delete_total(\"" . $page_data[$i]->id_total . "\",\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='icon-trash'></i></a>";

            $time = strtotime($page_data[$i]->tanggal_masuk);
            $date = strftime("%A, %d %B %Y ", $time);

            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $tgl_buat = $date;
            $waktu;
            $no_faktur = $page_data[$i]->id_faktur;
            $pajak = $page_data[$i]->ppn . "%";
            $ongkir = $page_data[$i]->ongkir;
            $diskon = $page_data[$i]->diskon;
            $tot = $page_data[$i]->total_keseluruhan;
            $gambar = $page_data[$i]->file;
            $url = base_url() . "/assets/images-log/" . $gambar;
            //$img = echo "<img src='assets/file-uploads/$gambar' width='70' height='90' />";

            $out[$i] = array($no, $pilih, $hapus, $tgl_buat, $waktu, $no_faktur, $ongkir, $diskon, $pajak, $tot, "<img src='$url' width='100' height='120' />");
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
    //end data baru 
    public function update_total()
    {
        $id_total = $this->input->post("id_total");
        $id_faktur = $this->input->post("id_faktur");
        $nofaktur = $this->input->post('nofaktur');
        $diskon = $this->input->post("diskon");
        $ppn = $this->input->post("ppn");
        $ongkir = $this->input->post("ongkir");
        $total = $this->input->post("total");
        $total_keseluruhan = $this->input->post("total_keseluruhan");

        $data = array(
            'id_total' => $id_total,
            'id_faktur' => $id_faktur,
            'no_faktur' => $nofaktur,
            'diskon' => $diskon,
            'ppn' => $ppn,
            'ongkir' => $ongkir,
            'total' => $total,
            'total_keseluruhan' => $total_keseluruhan
        );

        $where = array(
            'id_total' => $id_total
        );

        $this->M_Pembelian_obat->update_detail_total($where, $data, 'total_faktur_logistik_farmasi');
        $out['status'] = "success";
        echo json_encode($out);
    }

    function delete_total()
    {
        $id_total = $this->input->post('id_total');
        $id_faktur = $this->input->post('id_faktur');
        $nofaktur = $this->input->post('no_faktur');
        $page_data1 = array(
            'ket' => '1',

        );
        $page_data2 = array(
            'ket' => '0',
        );
        $where = array(
            'id_total' => $id_total,
        );

        $where2 = array(
            'no_faktur' => $nofaktur,
        );

        $this->M_Pembelian_obat->update_logistik_farmasi($where, $page_data1, 'total_faktur_logistik_farmasi');
        $this->M_Pembelian_obat->update_logistik_farmasi($where2, $page_data2, 'struk_logistik');
        $out['status'] = "success";
        echo json_encode($out);
    }

    function hapus_faktur_farm()
    {
        $id_struk = $this->input->post('id_struk');

        $keuangan = $this->db->query("SELECT a.* from akun_persediaan_farmasi a, struk_logistik s where a.no_faktur = s.no_faktur and s.id_struk='$id_struk' and a.verifikasi =1")->row();
        if (empty($keuangan)) {
            $page_data1 = array(
                'ket' => '1',

            );
            $where = array(
                'id_struk' => $id_struk,
            );

            $this->M_Pembelian_obat->update_logistik_farmasi($where, $page_data1, 'struk_logistik');

            $db = $this->db->query("SELECT d.* from struk_logistik s, detail_struk d where s.no_faktur = d.id_struk and s.id_struk ='$id_struk'")->result();
            $no_faktur = $db[0]->id_struk;

            $db1 = $this->db->query("SELECT count(id_struk) jumlah from struk_logistik s where s.no_faktur ='$no_faktur'")->row();
            if ($db1->jumlah == 1) {
                $this->db->delete('akun_persediaan_farmasi', array('no_faktur' => $db[0]->id_struk, 'verifikasi' => 0));

                foreach ($db as $row) {

                    $this->db->delete('stok_logistik', array('id_struk' => 'F_' . $row->id_detail_struk));
                    $this->db->delete('detail_struk', array('id_detail_struk' => $row->id_detail_struk));
                }
            }
            $out['status'] = "success";
        } else {
            $out['status'] = "Faktur tidak dapat dihapus, karena faktur sudah diverifikasi keuangan";
        }
        echo json_encode($out);
    }

    function insertReturObat()
    {
        $id_faktur = $this->input->post("nofaktur");
        $namaobat = $this->input->post("nama_obat");
        $jumlah_obat = $this->input->post("jumlah_obat");
        $harga_satuan = $this->input->post("harga_satuan");
        $harga_struk = $this->input->post("harga_struk");
        $harga_total = $this->input->post("harga_total");


        $data = array(
            'id_retur' => uniqid(),
            'id_faktur' => $id_faktur,
            'nama_obat' => $namaobat,
            'harga_obat' => $jumlah_obat,
            'harga_struk' => $harga_struk,
            'jumlah_obat' => $jumlah_obat,
            'harga_total' => $harga_total,
        );
        $this->M_Pembelian_obat->insertObatRetur($data, 'obat_retur');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function cetak($no_faktur, $id_faktur)
    {
        // $data['lengkap'] = 'YA';

        $struk = $this->db->get_where('struk_logistik', ['id_struk' => $no_faktur])->row_array();
        $po = $this->db->get_where('faktur_logistik_farmasi', ['id_faktur' => $id_faktur])->row_array();
        $data['tglStruk'] = $struk;
        $data['po'] = $po;
        $data['data'] = $this->M_Pembelian_obat->getDataCetak($id_faktur, $no_faktur);

        $dbtotal = $this->db->query("SELECT sum(d.harga*d.frek)  total_hna, d.ppn ,sum((d.harga - d.harga * (d.diskon_rs / 100))*d.frek) total,sum(d.total) total_ppn
            from detail_struk d, list_logistik l, detail_po dp, faktur_logistik_farmasi f,struk_logistik s
            where d.id_logistik = l.id_logistik
            and d.id_logistik=dp.id_list
            and d.id_detail_po=dp.id_detail
            and d.id_struk = s.no_faktur
            and f.id_faktur = dp.id_faktur
            and s.id_struk = '$no_faktur'")->row();
        $ppn = $dbtotal->total * 0.11;
        $noValid =  sprintf('%04d', $struk['index_dok'], 'dyhtdyu');
        $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($struk['tgl_buat']))) . "/" . date("Y", strtotime($struk['tgl_buat']));

        $data_verifikasi = array(
            'tipe_akun' => 'persediaan',
            'no_faktur' => $struk['no_faktur'],
            'no_po' => $po['no_dokumen'],
            'npb' => $noDok,
            'tgl_faktur' => $struk['tgl_masuk'],
            'tgl_po' => $po['tgl_faktur'],
            'vendor' => $struk['id_produsen'],
            'jumlah' => round($dbtotal->total),
        );

        $map = $this->db->get_where('akun_persediaan_farmasi', ['no_faktur' => $struk['no_faktur'], 'npb' => $noDok])->result();
        if (count($map) > 0) {
            if ($map[0]->verifikasi == 0) {
                $this->M_Pembelian_obat->delete_tindakan($struk['no_faktur'], 'akun_persediaan_farmasi', 'no_faktur');
                $this->M_Po_obat->insert_stok_logistik($data_verifikasi, 'akun_persediaan_farmasi');
            }
        } else {
            $this->M_Po_obat->insert_stok_logistik($data_verifikasi, 'akun_persediaan_farmasi');
        }

        // echo round($ppn);
        // $data_verifikasi1 = array(
        //     'tipe_akun' => 'hutang',
        //     'no_faktur' => $struk['no_faktur'],
        //     'no_po' => $po['no_dokumen'],
        //     'tgl_faktur' => $struk['tgl_masuk'],
        //     'tgl_po' => $po['tgl_faktur'],
        //     'vendor' => $struk['id_produsen'],
        //     'jumlah' => round($dbtotal->total_ppn),
        // );
        // $this->M_Po_obat->insert_stok_logistik($data_verifikasi1, 'akun_persediaan_farmasi');

        $data['data_t'] = $this->M_Pembelian_obat->getTotalDiskon($id_faktur, $no_faktur);

        $this->load->view('print/cetakDp', $data);
    }

    public function insert_cetakDp()
    {
        $id_staff = $this->session->userdata("data_auth");
        $id_faktur = $this->input->post('id_faktur');

        $cetakDp = $this->db->query("SELECT count(*) jumlah  from cetak_dp  where id_faktur = '$id_faktur'")->row();
        if ($cetakDp->jumlah > 0) {
            //do nothing
        } else {
            $data = array(
                'id_cetak' => uniqid(),
                'id_faktur' => $this->input->post('id_faktur'),
                'no_dokumen' => $this->input->post('no_dokumen'),
                'faktur_nomor_dp' => $this->input->post('faktur_nomor'),
                'no_distributor' => $this->input->post('no_dist'),
                'distributor' => $this->input->post('distributor'),
                'no_index' => $this->input->post('no_index'),
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga'),
                'diskon' => $this->input->post('diskon'),
                'total' => $this->input->post('total'),
                'beaongkir' => $this->input->post('beaongkir'),
                'alldiskon' => $this->input->post('alldiskon'),
                'ppn' => $this->input->post('ppn'),
                'total_keseluruhan' => $this->input->post('total_kes'),
                'tgl_input' => date("Y-m-d H:i:s"),
                'tgl_terima' => $this->input->post('tgl_terima'),
                'ket' => $this->input->post('ket'),
                'id_staff' => $id_staff->id_staff,
            );

            $this->M_Pembelian_obat->insert_cetak($data, 'cetak_dp');
        }


        $out['status'] = "success";
        echo json_encode($out);
    }
    public function getHargaFaktur()
    {
        $no_faktur = $this->input->post('no_faktur');
        $id_faktur = $this->input->post('id_faktur');
        $po = $this->db->query("SELECT SUM(total) total from detail_po where id_faktur = '$id_faktur'")->row();
        $db = $this->db->query("SELECT SUM(total) total, ppn from detail_struk where id_struk = '$no_faktur'")->result();
        $cetakDp = $this->db->query("SELECT *  from cetak_dp c, struk_logistik s where c.id_faktur = s.id_faktur and s.no_faktur = '$no_faktur'")->result();
        // $tgl = strtotime($cetakDp[0]->tgl_terima);


        // cari max no distributor
        $dbMax = $this->M_Pembelian_obat->selectNo();
        $max2 =  $dbMax[0]->max2 + 1;
        date_default_timezone_set('Asia/Jakarta');
        date("Y-m-d");
        $noValid =  sprintf('%04d', $max2, 'dyhtdyu');
        $noDok = $noValid . "/" . "RDP/FARM-RSBT/" . $this->numtor(date("m")) . "/" . date("Y");


        if (count($cetakDp) > 0) {
            $no_distributor = $cetakDp[0]->no_distributor;
            $bea_ongkir = $cetakDp[0]->beaongkir;
            // $tgl_terima = date('Y-m-d',$tgl);
        } else {
            $no_distributor = $noDok;
            $bea_ongkir = 0;
            // $tgl_terima ="";
        }
        if (count($db) > 0) {
            $db = $db[0];
            $db->no_distributor = $no_distributor;
            $db->bea_ongkir = $bea_ongkir;
            $db->total_po = $po->total;
            // $db->tgl_terima = $tgl_terima;
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    function numtor($number)
    {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if ($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }

    public function faktur_po()
    {
        $page_data = $this->db->get('faktur_logistik_farmasi')->result();
        foreach ($page_data as $row) {
            $id_faktur = $row->id_faktur;
            $query = $this->db->query("SELECT d.*, f.id_faktur FROM detail_po d, faktur_logistik_farmasi f where d.id_faktur='$id_faktur' AND d.id_faktur = f.id_faktur AND d.status = '0'");

            if ($query->num_rows() == 0) {
                $data2 = array(
                    'ket' =>  1,
                );
                $this->db->where('id_faktur', $id_faktur);
                $this->db->update('faktur_logistik_farmasi', $data2);
            }
        }
    }
    public function getDataFaktur()
    {
        $id_struk = $this->input->post("id_struk");
        // $tmp_data = $this->db->get_where('struk_logistik', ['id_struk' => $id_struk])->row();
        $tmp_data = $this->db->query("SELECT s.*,a.verifikasi,j.verifikasi_hutang from struk_logistik s 
        left join akun_persediaan_farmasi a  on a.no_faktur = s.no_faktur and a.tgl_faktur=s.tgl_masuk
        left join jurnal_pembayaran_farmasi j  on a.no_jurnal = j.no_jurnal
        where s.id_struk='$id_struk'
        group by s.id_struk")->row();

        echo json_encode($tmp_data);
    }
    public function editFaktur()
    {
        $tgl_masuk = $this->input->post('tgl_masuk');
        // $inVendor  = $this->input->post('inVendor');
        $no_faktur  = $this->input->post('no_faktur');
        $id_struk  = $this->input->post('id_struk');
        $tgl_struk = $this->input->post('tgl_struk');
        $tgl_overdue = $this->input->post('tgl_overdue');

        // $keuangan = $this->db->query("SELECT a.* from akun_persediaan_farmasi a, struk_logistik s where a.no_faktur = s.no_faktur and s.id_struk='$id_struk' and a.verifikasi =1")->row();
        // if (empty($keuangan)) {
        $dbstruk = $this->db->get_where('struk_logistik', ['id_struk' => $id_struk])->row();
        $dbstruk_no = $this->db->get_where('struk_logistik', ['no_faktur' => $no_faktur])->result();
        if (count($dbstruk_no) < 1) {
            $this->M_Pembelian_obat->update_logistik_farmasi(['id_struk' => $dbstruk->no_faktur], ['id_struk' => $no_faktur], 'detail_struk');
            $this->M_Pembelian_obat->update_logistik_farmasi(['no_faktur' => $dbstruk->no_faktur], ['no_faktur' => $no_faktur], 'akun_persediaan_farmasi');

            $data = array(
                'tgl_masuk' => $tgl_masuk,
                'no_faktur' => $no_faktur,
                'tgl_struk' => $tgl_struk,
                'tgl_overdue' => $tgl_overdue,
            );


            $this->M_Pembelian_obat->update_logistik_farmasi(['id_struk' => $id_struk], $data, 'struk_logistik');
            $out['status'] = "success";
        } else {
            $out['status'] = "Faktur tidak bisa diedit, karena no faktur " . $no_faktur . " sudah ada";
        }
        echo json_encode($out);
    }

    public function getDataDetailFaktur()
    {
        $id_struk = $this->input->post("id_struk");
        // $tmp_data = $this->db->get_where('struk_logistik', ['id_struk' => $id_struk])->row();
        $tmp_data = $this->db->query("SELECT a.verifikasi,j.verifikasi_hutang 
        from detail_struk d
        join struk_logistik s on s.no_faktur = d.id_struk
        left join akun_persediaan_farmasi a  on a.no_faktur = s.no_faktur and a.tgl_faktur=s.tgl_masuk
        left join jurnal_pembayaran_farmasi j  on a.no_jurnal = j.no_jurnal
        where d.id_detail_struk='$id_struk'
        group by d.id_detail_struk")->row();

        echo json_encode($tmp_data);
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
