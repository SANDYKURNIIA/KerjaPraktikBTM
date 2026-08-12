<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat_hibah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Pembelian_obat');
        $this->load->model('M_Po_obat');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        // $max = $this->M_Pembelian_obat->selectNoDokumenHibah();
        // $i = 0;
        // $page_data = array('max' =>  $max[$i]->max + 1,);
        // $max2 = $this->M_Pembelian_obat->selectNo();
        // $page_data = array('max2' =>  $max2[$i]->max2 + 1,);
        $page_data['vendor'] = $this->db->query('SELECT nama_produsen produsen from produsen')->result_array();

        $page_data['page_content'] = 'page_content/Obat_hibah';
        $page_data['obat'] = $this->M_Pembelian_obat->getNamaObat();
        $page_data['n_obat'] = $this->M_Pembelian_obat->getObatNama();

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }




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
        $tgl_buat = date("Y-m-d H:i:s");
        $inPO = $this->input->post('inPO');
        $max = $this->M_Pembelian_obat->selectNoDokumenHibah()->max;

        $max = ($max == 0) ? 1 : $max + 1;

        $data = array(
            'id_struk' => uniqid(),
            'index_dok' => $max,
            'tgl_masuk' => $tgl_masuk,
            'id_produsen' => $inVendor,
            'no_faktur' => $no_faktur,
            'tgl_struk' => $tgl_struk,
            'tgl_buat' => $tgl_buat,

        );



        $this->M_Pembelian_obat->insertFaktur($data, 'struk_obat_hibah');
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
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Pembelian_obat->selectRangeDataObatHibah($first_date, $second_date);
        } else {
            $page_data = $this->M_Pembelian_obat->selectDataObatHibah();
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
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' onclick='hapus_faktur(\"" . $page_data[$i]->id_struk . "\")'><i class='icon-trash'></i></a>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" .  "\",\"" . $page_data[$i]->no_faktur . "\",\"" . $page_data[$i]->id_struk . "\")'><i class='icon-note'></i></a>";
                $cetak = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('Obat_hibah/cetak/')  . $page_data[$i]->id_struk . "'><i class='icon-printer'></i></a>";

                $aksi = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal2' data-target='.modal-faktur2'  onclick='input_detail_tambahan(\"" . $page_data[$i]->no_faktur . "\")'><i class='fa fa-check'></i></a>";
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





            $no = $i + 1;
            $tgl_buat = $date;
            $waktu;
            $no_faktur = $page_data[$i]->no_faktur;
            $tgl_struk = $date2;
            $tgl_masuk = $date3;
            $id_produsen = $page_data[$i]->id_produsen;
            //$no_dokumen = $page_data[$i]->no_dokumen;

            $out[$i] = array($no, $cetak, $pilih, $edit, $hapus, $tgl_buat, $waktu, $no_faktur, $tgl_struk, $tgl_masuk, $id_produsen, $aksi);
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
        $page_data = $this->M_Po_obat->HitungPOBebas($idFaktur);
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


    function hapus_list_faktur()
    {
        $id_detail = $this->input->post('id_detail');
        $this->M_Po_obat->delete_po($id_detail);
        $out['status'] = "success";
        echo json_encode($out);
    }

    function hapus_isi_list_faktur()
    {
        $id_detail_struk = $this->input->post('id_detail_struk');

        $this->M_Pembelian_obat->delete_tindakan($id_detail_struk, 'detail_struk_obat_hibah', 'id_detail_struk');
        $this->db->delete('stok_logistik', array('id_struk' => 'F_' . $id_detail_struk));
        $out['status'] = "success";
        echo json_encode($out);
    }



    public function insertObatFaktur1()
    {
        $data_staff = $this->session->userdata('data_auth');
        $idFaktur = $this->input->post('idFaktur');
        $idfaktur = $this->input->post('idfaktur');
        $id_struk = $this->input->post('id_struk');
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


        $data_struk = array(
            'id_detail_struk' => $id,
            'id_struk' => $id_struk,
            'no_batch' => $noBatch,
            'kadaluarsa' => $tglExp,
            'id_logistik' => $idLogistik,
            'id_prod_obat' => $idProdusenObat,
            'frek' => $frek,
            'harga' => $hna,
            'total' => $total,
            'harga_beli' => $hna,
            'ppn' => $ppn,
            'diskon' => 0,
            'diskon_rs' => $diskonRs,
            'tgl_input' => date("Y-m-d H:i:s"),
            //'no_faktur' => $noFaktur,

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
            'harga_cost' => $hna,
            'ppn' => $ppn,
            'harga_persediaan' => $harga_persediaan,
            'margin' => $margin,
        );

        $this->M_Po_obat->insert_detail_struk($data_struk, 'detail_struk_obat_hibah');
        $this->M_Po_obat->insert_stok_logistik($data_stok, 'stok_logistik');

        $this->M_Po_obat->update_list_logistik($idLogistik, $data_list);
        $out['status'] = "success";
        echo json_encode($out);
    }


    function hapus_faktur()
    {
        $id_faktur = $this->input->post('id_faktur');
        //$this->M_Po_obat->delete_faktur($id_faktur);
        $detail = $this->db->query("SELECT d.id_detail_struk FROM struk_obat_hibah s, detail_struk_obat_hibah d where s.id_struk =d.id_struk and s.id_struk ='$id_faktur'")->row_array();
        $this->db->delete('stok_logistik', array('id_struk' => 'F_' . $detail['id_detail_struk']));
        $this->db->delete('detail_struk_obat_hibah', array('id_struk' => $id_faktur));
        $this->db->delete('struk_obat_hibah', array('id_struk' => $id_faktur));

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_list_faktur1()
    {
        $id_struk = $this->input->post('id_struk');
        $page_data = $this->M_Pembelian_obat->getDataFaktur1Hibah($id_struk);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_isi_list_faktur(\"" . $page_data[$i]->obat .  "\",\"" . $page_data[$i]->id_detail_struk .  "\")'><i class='icon-trash'></i></a>";


            $expired = strtotime($page_data[$i]->kadaluarsa);
            $date = strftime("%A, %d %B %Y ", $expired);


            $no = $i + 1;
            $nama_obat = $page_data[$i]->obat;
            $harga_satuan = $page_data[$i]->harga_beli;
            $jml_obat = $page_data[$i]->frek;
            $total = $page_data[$i]->total;
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
        $tmp_data = $this->M_Pembelian_obat->get_nofaktur_hibah($no_faktur);

        if (count($tmp_data) > 0) {
            echo '<label class="text-danger pt-10"><span><i class="fa fa-times" aria-hidden="true">
            </i> No Faktur tidak tersedia</span></label>';
        } else {
            echo '<label class="text-success pt-10"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> No Faktur tersedia</span></label>';
        }
    }

    // UNTUK BUTTON AKSI
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
        $this->M_Pembelian_obat->update_logistik_farmasi($where2, $page_data2, 'struk_obat_hibah');
        $out['status'] = "success";
        echo json_encode($out);
    }

    function hapus_faktur_farm()
    {
        $id_struk = $this->input->post('id_struk');
        $page_data1 = array(
            'ket' => '1',

        );
        $where = array(
            'id_struk' => $id_struk,
        );

        $this->M_Pembelian_obat->update_logistik_farmasi($where, $page_data1, 'struk_obat_hibah');
        $this->db->delete('detail_struk_obat_hibah', array('id_struk' => $id_struk));
        //$this->db->delete('struk_obat_hibah', array('id_struk' => $id_struk));

        // $id_faktur = $this->input->post('id_faktur');
        // $page_data = array(
        //     'status' => '0',

        // );
        // $where1 = array(
        //     'id_faktur' => $id_faktur,
        // );

        // $this->M_Pembelian_obat->update_logistik_farmasi($where1, $page_data, 'detail_po_bebas');
        $out['status'] = "success";
        echo json_encode($out);
    }


    // CETAK DP
    public function cetak($id_faktur)
    {
        $action = $this->input->post('action');
        // $id_faktur = $this->input->post('id_fakturdp');
        // $no_faktur = $this->input->post('nofakturdp');


        // $data['nofakturdp'] = $this->input->post('nofakturdp');
        // $data['no_dokumen'] = $this->input->post('no_dokumen');
        // //$data['nofaktur'] = $this->input->post('nofaktur');
        // $data['distributor'] = $this->input->post('distributor');
        // $data['tgl_terima'] = $this->input->post('tgl_terima');
        // $data['hargafaktur'] = $this->input->post('hargafaktur');
        // $data['ppn'] = $this->input->post('ppndp');
        // $data['no'] = $this->input->post('no');
        // $data['beaongkir'] = $this->input->post('beaongkir');
        $data['lengkap'] = 'YA';
        $data['po'] = '-';
        //$data['tgl'] = $this->M_Pembelian_obat->getTglBebas($id_faktur);
        $data['tglStruk'] = $this->db->get_where('struk_obat_hibah', ['id_struk' => $id_faktur])->row_array();
        $data['data'] = $this->M_Pembelian_obat->getDataCetakHibah($id_faktur);
        //$data['data_t'] = $this->M_Pembelian_obat->getTotalDiskonBebas($id_faktur, $no_faktur);

        $this->load->view('print/cetakDp_pebal', $data);
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
        $po = $this->db->query("SELECT SUM(total) total from detail_po_bebas where id_faktur = '$id_faktur'")->row();
        $db = $this->db->query("SELECT SUM(total) total, ppn from detail_struk_obat_hibah where id_faktur = '$no_faktur'")->result();
        $cetakDp = $this->db->query("SELECT *  from cetak_dp c, struk_obat_hibah s where c.id_faktur = s.id_faktur and s.no_faktur = '$no_faktur'")->result();
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
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat_hibah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Pembelian_obat');
        $this->load->model('M_Po_obat');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        // $max = $this->M_Pembelian_obat->selectNoDokumenHibah();
        // $i = 0;
        // $page_data = array('max' =>  $max[$i]->max + 1,);
        // $max2 = $this->M_Pembelian_obat->selectNo();
        // $page_data = array('max2' =>  $max2[$i]->max2 + 1,);
        $page_data['vendor'] = $this->db->query('SELECT nama_produsen produsen from produsen')->result_array();

        $page_data['page_content'] = 'page_content/Obat_hibah';
        $page_data['obat'] = $this->M_Pembelian_obat->getNamaObat();
        $page_data['n_obat'] = $this->M_Pembelian_obat->getObatNama();

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }




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
        $tgl_buat = date("Y-m-d H:i:s");
        $inPO = $this->input->post('inPO');
        $max = $this->M_Pembelian_obat->selectNoDokumenHibah()->max;

        $max = ($max == 0) ? 1 : $max + 1;

        $data = array(
            'id_struk' => uniqid(),
            'index_dok' => $max,
            'tgl_masuk' => $tgl_masuk,
            'id_produsen' => $inVendor,
            'no_faktur' => $no_faktur,
            'tgl_struk' => $tgl_struk,
            'tgl_buat' => $tgl_buat,

        );



        $this->M_Pembelian_obat->insertFaktur($data, 'struk_obat_hibah');
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
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Pembelian_obat->selectRangeDataObatHibah($first_date, $second_date);
        } else {
            $page_data = $this->M_Pembelian_obat->selectDataObatHibah();
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
                $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' onclick='hapus_faktur(\"" . $page_data[$i]->id_struk . "\")'><i class='icon-trash'></i></a>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" .  "\",\"" . $page_data[$i]->no_faktur . "\",\"" . $page_data[$i]->id_struk . "\")'><i class='icon-note'></i></a>";
                $cetak = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('Obat_hibah/cetak/')  . $page_data[$i]->id_struk . "'><i class='icon-printer'></i></a>";

                $aksi = "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal2' data-target='.modal-faktur2'  onclick='input_detail_tambahan(\"" . $page_data[$i]->no_faktur . "\")'><i class='fa fa-check'></i></a>";
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





            $no = $i + 1;
            $tgl_buat = $date;
            $waktu;
            $no_faktur = $page_data[$i]->no_faktur;
            $tgl_struk = $date2;
            $tgl_masuk = $date3;
            $id_produsen = $page_data[$i]->id_produsen;
            //$no_dokumen = $page_data[$i]->no_dokumen;

            $out[$i] = array($no, $cetak, $pilih, $edit, $hapus, $tgl_buat, $waktu, $no_faktur, $tgl_struk, $tgl_masuk, $id_produsen, $aksi);
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
        $page_data = $this->M_Po_obat->HitungPOBebas($idFaktur);
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


    function hapus_list_faktur()
    {
        $id_detail = $this->input->post('id_detail');
        $this->M_Po_obat->delete_po($id_detail);
        $out['status'] = "success";
        echo json_encode($out);
    }

    function hapus_isi_list_faktur()
    {
        $id_detail_struk = $this->input->post('id_detail_struk');

        $this->M_Pembelian_obat->delete_tindakan($id_detail_struk, 'detail_struk_obat_hibah', 'id_detail_struk');
        $this->db->delete('stok_logistik', array('id_struk' => 'F_' . $id_detail_struk));
        $out['status'] = "success";
        echo json_encode($out);
    }



    public function insertObatFaktur1()
    {
        $data_staff = $this->session->userdata('data_auth');
        $idFaktur = $this->input->post('idFaktur');
        $idfaktur = $this->input->post('idfaktur');
        $id_struk = $this->input->post('id_struk');
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


        $data_struk = array(
            'id_detail_struk' => $id,
            'id_struk' => $id_struk,
            'no_batch' => $noBatch,
            'kadaluarsa' => $tglExp,
            'id_logistik' => $idLogistik,
            'id_prod_obat' => $idProdusenObat,
            'frek' => $frek,
            'harga' => $hna,
            'total' => $total,
            'harga_beli' => $hna,
            'ppn' => $ppn,
            'diskon' => 0,
            'diskon_rs' => $diskonRs,
            'tgl_input' => date("Y-m-d H:i:s"),
            //'no_faktur' => $noFaktur,

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
            'harga_cost' => $hna,
            'ppn' => $ppn,
            'harga_persediaan' => $harga_persediaan,
            'margin' => $margin,
        );

        $this->M_Po_obat->insert_detail_struk($data_struk, 'detail_struk_obat_hibah');
        $this->M_Po_obat->insert_stok_logistik($data_stok, 'stok_logistik');

        $this->M_Po_obat->update_list_logistik($idLogistik, $data_list);
        $out['status'] = "success";
        echo json_encode($out);
    }


    function hapus_faktur()
    {
        $id_faktur = $this->input->post('id_faktur');
        //$this->M_Po_obat->delete_faktur($id_faktur);
        $detail = $this->db->query("SELECT d.id_detail_struk FROM struk_obat_hibah s, detail_struk_obat_hibah d where s.id_struk =d.id_struk and s.id_struk ='$id_faktur'")->row_array();
        $this->db->delete('stok_logistik', array('id_struk' => 'F_' . $detail['id_detail_struk']));
        $this->db->delete('detail_struk_obat_hibah', array('id_struk' => $id_faktur));
        $this->db->delete('struk_obat_hibah', array('id_struk' => $id_faktur));

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_list_faktur1()
    {
        $id_struk = $this->input->post('id_struk');
        $page_data = $this->M_Pembelian_obat->getDataFaktur1Hibah($id_struk);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_isi_list_faktur(\"" . $page_data[$i]->obat .  "\",\"" . $page_data[$i]->id_detail_struk .  "\")'><i class='icon-trash'></i></a>";


            $expired = strtotime($page_data[$i]->kadaluarsa);
            $date = strftime("%A, %d %B %Y ", $expired);


            $no = $i + 1;
            $nama_obat = $page_data[$i]->obat;
            $harga_satuan = $page_data[$i]->harga_beli;
            $jml_obat = $page_data[$i]->frek;
            $total = $page_data[$i]->total;
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
        $tmp_data = $this->M_Pembelian_obat->get_nofaktur_hibah($no_faktur);

        if (count($tmp_data) > 0) {
            echo '<label class="text-danger pt-10"><span><i class="fa fa-times" aria-hidden="true">
            </i> No Faktur tidak tersedia</span></label>';
        } else {
            echo '<label class="text-success pt-10"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> No Faktur tersedia</span></label>';
        }
    }

    // UNTUK BUTTON AKSI
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
        $this->M_Pembelian_obat->update_logistik_farmasi($where2, $page_data2, 'struk_obat_hibah');
        $out['status'] = "success";
        echo json_encode($out);
    }

    function hapus_faktur_farm()
    {
        $id_struk = $this->input->post('id_struk');
        $page_data1 = array(
            'ket' => '1',

        );
        $where = array(
            'id_struk' => $id_struk,
        );

        $this->M_Pembelian_obat->update_logistik_farmasi($where, $page_data1, 'struk_obat_hibah');
        $this->db->delete('detail_struk_obat_hibah', array('id_struk' => $id_struk));
        //$this->db->delete('struk_obat_hibah', array('id_struk' => $id_struk));

        // $id_faktur = $this->input->post('id_faktur');
        // $page_data = array(
        //     'status' => '0',

        // );
        // $where1 = array(
        //     'id_faktur' => $id_faktur,
        // );

        // $this->M_Pembelian_obat->update_logistik_farmasi($where1, $page_data, 'detail_po_bebas');
        $out['status'] = "success";
        echo json_encode($out);
    }


    // CETAK DP
    public function cetak($id_faktur)
    {
        $action = $this->input->post('action');
        // $id_faktur = $this->input->post('id_fakturdp');
        // $no_faktur = $this->input->post('nofakturdp');


        // $data['nofakturdp'] = $this->input->post('nofakturdp');
        // $data['no_dokumen'] = $this->input->post('no_dokumen');
        // //$data['nofaktur'] = $this->input->post('nofaktur');
        // $data['distributor'] = $this->input->post('distributor');
        // $data['tgl_terima'] = $this->input->post('tgl_terima');
        // $data['hargafaktur'] = $this->input->post('hargafaktur');
        // $data['ppn'] = $this->input->post('ppndp');
        // $data['no'] = $this->input->post('no');
        // $data['beaongkir'] = $this->input->post('beaongkir');
        $data['lengkap'] = 'YA';
        $data['po'] = '-';
        //$data['tgl'] = $this->M_Pembelian_obat->getTglBebas($id_faktur);
        $data['tglStruk'] = $this->db->get_where('struk_obat_hibah', ['id_struk' => $id_faktur])->row_array();
        $data['data'] = $this->M_Pembelian_obat->getDataCetakHibah($id_faktur);
        //$data['data_t'] = $this->M_Pembelian_obat->getTotalDiskonBebas($id_faktur, $no_faktur);

        $this->load->view('print/cetakDp_pebal', $data);
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
        $po = $this->db->query("SELECT SUM(total) total from detail_po_bebas where id_faktur = '$id_faktur'")->row();
        $db = $this->db->query("SELECT SUM(total) total, ppn from detail_struk_obat_hibah where id_faktur = '$no_faktur'")->result();
        $cetakDp = $this->db->query("SELECT *  from cetak_dp c, struk_obat_hibah s where c.id_faktur = s.id_faktur and s.no_faktur = '$no_faktur'")->result();
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
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
