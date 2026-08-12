<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Jurnal_farmasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Keuangan_ijd');
        $this->load->model('M_Jurnal_keuangan');
        $this->load->model('M_Kasir');
    }

    // ////////////////////////////////////////Verifikasi Pengadaan Obat //////////////////////////////////////////////////////
    public function Verifikasi_farmasi()
    {
        $this->load->view('assets/_header');
        $page_data['tipe'] = 'persediaan';
        $page_data['page_content'] = 'Jurnal/Verifikasi_farmasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Verifikasi_hutang_farmasi()
    {
        $this->load->view('assets/_header');
        $page_data['tipe'] = 'hutang';
        $page_data['page_content'] = 'Jurnal/Verifikasi_farmasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_verifikasi_farmasi()
    {
        $out = null;
        $db = null;

        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $tipe = $this->input->post('tipe');


        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Keuangan_ijd->Select_akun_persediaan_farmasi($first_date, $second_date, $tipe);
        } else {
            $page_data = $this->M_Keuangan_ijd->Select_akun_persediaan_farmasi('', '', $tipe);
        }

        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);

            $no = $i + 1;
            // $tgl =  strftime("%A, %d %B %Y ", $tgl);
            if ($tipe == "persediaan") {
                $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_akun . "'><label ></label></div>";

                $no_faktur = $page_data[$i]->no_faktur;
                $no_po = $page_data[$i]->no_po;
                $tgl_faktur = date('d-m-Y', strtotime($page_data[$i]->tgl_faktur));
                $tgl_po = date('d-m-Y', strtotime($page_data[$i]->tgl_po));
                $vendor = $page_data[$i]->vendor;
                $jumlah = number_format($page_data[$i]->jumlah, 2, ',', '.');
                $noValid =  sprintf('%04d', $page_data[$i]->index_dok, 'dyhtdyu');
                $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($page_data[$i]->tgl_buat))) . "/" . date("Y", strtotime($page_data[$i]->tgl_buat));

                $out[$i] = array($checkbox, $no, $no_faktur, $no_po, $noDok, $tgl_faktur, $tgl_po, $vendor, $jumlah);
            } else {
                $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->no_jurnal . "'><label ></label></div>";

                $no_jurnal = $page_data[$i]->no_jurnal;
                $no_po = $page_data[$i]->pk;
                $tgl_faktur = date('d-m-Y', strtotime($page_data[$i]->tgl));
                $jumlah = number_format($page_data[$i]->total, 2, ',', '.');
                $des = explode(" - ", $page_data[$i]->des_rek);
                $vendor = $des[1];

                $dat = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal]);
                $akun = $this->db->get_where('akun_persediaan_farmasi', ['no_jurnal' => $no_jurnal]);
                // $npb = isset($npb) ? $npb->pk : '-';
                // $dat = $this->db->query("SELECT d.id_struk, s.index_dok, s.tgl_buat from detail_struk d, struk_logistik s where d.id_struk = s.no_faktur and id_detail_po='$id_detail' and id_logistik = '$id_log'");

                if ($dat->num_rows() > 0) {

                    if ($dat->num_rows() > 1) {
                        $struk = $dat->result_array();
                        $k = array();
                        // var_dump($struk);
                        foreach ($struk as $row) {
                            $k[] = $row['pk'];
                        }

                        $npb = implode(', ', array_unique($k));
                    } else {
                        $npb = $dat->row();
                        $npb = isset($npb) ? $npb->pk : '-';
                    }
                }

                if ($akun->num_rows() > 0) {

                    if ($akun->num_rows() > 1) {
                        $faktur = $akun->result_array();
                        $j = array();
                        // var_dump($struk);
                        foreach ($faktur as $row1) {
                            $j[] = $row1['no_faktur'];
                        }

                        $no_faktur = implode(', ', array_unique($j));
                    } else {
                        $no_faktur = $akun->row();
                        $no_faktur = isset($no_faktur) ? $no_faktur->no_faktur : '-';
                    }
                }


                $out[$i] = array($checkbox, $no, $no_jurnal, $no_po, $no_faktur, $npb, $vendor, $tgl_faktur, $jumlah);
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

    public function setVerifikasi_farmasi()
    {
        $out = null;
        $staff = $this->session->userdata('data_auth');
        $data = $this->input->post('req');
        $tipe = $this->input->post('tipe');
        $tgl_verif = $this->input->post('tgl_verif');


        $id_fk = date('Y-m-d H:i:s');

        for ($j = 0; $j < count($data); $j++) {
            if ($tipe == "persediaan") {
                $db = [
                    'verifikasi' => 1,
                    'tgl_verifikasi' => $tgl_verif,
                    'staff_verifikasi' => $staff->nama,
                ];
                $this->M_Kasir->update_tindakan($db, ['id_akun' => $data[$j]], 'akun_persediaan_farmasi');
            } else {
                $db = [
                    'verifikasi_hutang' => 1,
                    'tgl_verif_hutang' => $tgl_verif,
                    'staff_verif_hutang' => $staff->nama,
                ];
                $this->M_Kasir->update_tindakan($db, ['no_jurnal' => $data[$j]], 'jurnal_pembayaran_farmasi');
            }
        }

        $out['status'] = 'success';
        // }

        echo json_encode($out);
    }


    public function cetak_verifikasi_farmasi()
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $dokter = $this->input->post('dokter');
        $jenis = $this->input->post('jenis');


        $page_data['mulai'] = $first_date;
        $page_data['akhir'] = $second_date;
        $page_data['dokter'] = $this->db->get_where('dokter', ['id_dokter' => $dokter])->row()->nama;
        $page_data['jenis'] = $this->db->get_where('kelompok_jurnal', ['id_kelompok' => $jenis])->row()->nama;
        $page_data['data'] = $this->M_Keuangan_ijd->Select_ijd($dokter, $jenis, $first_date, $second_date, '1');

        $response = $this->load->view('print/cetak_verifikasi_ijd', $page_data, TRUE);
        echo $response;
    }


    // ////////////////////////////////////////JURNAL PERSEDIAAN FARMASI //////////////////////////////////////////////////////
    public function Jurnal_persediaan_farmasi()
    {
        $this->load->view('assets/_header');
        $page_data['tipe'] = 'persediaan';
        $page_data['page_content'] = 'Jurnal/Jurnal_farmasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function Jurnal_hutang_farmasi()
    {
        $this->load->view('assets/_header');
        $page_data['tipe'] = 'hutang';
        $page_data['page_content'] = 'Jurnal/Jurnal_farmasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jurnal_farmasi()
    {
        $out = null;

        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $tipe = $this->input->post('tipe');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Keuangan_ijd->SelectJurnalFarmasi($first_date, $second_date, $tipe);
        } else {
            $page_data = $this->M_Keuangan_ijd->SelectJurnalFarmasi('', '', $tipe);
        }


        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);


            $no = $i + 1;
            // $tgl =  strftime("%A, %d %B %Y ", $tgl);

            if ($tipe == 'persediaan') {
                $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_akun . "'><label ></label></div>";
                $noValid =  sprintf('%04d', $page_data[$i]->index_dok, 'dyhtdyu');
                $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($page_data[$i]->tgl_buat))) . "/" . date("Y", strtotime($page_data[$i]->tgl_buat));

                $golongan_sediaan = $page_data[$i]->desk;
                $no_faktur = $page_data[$i]->no_faktur;
                $vendor = $page_data[$i]->vendor;
                $kode_akun = $page_data[$i]->coa;
                $total_akun = number_format(round($page_data[$i]->total), 2, ',', '.');
                $out[$i] = array($checkbox, $no, $kode_akun, $golongan_sediaan, $vendor, $noDok, $no_faktur, $total_akun);
            } else {
                $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->no_jurnal . "'><label ></label></div>";
                $golonga_sediaan = $page_data[$i]->des_rek;
                $des = explode(" - ", $page_data[$i]->des_rek);
                $vendor = $des[1];
                $kode_akun = $page_data[$i]->rekening;
                $no_jurnal = $page_data[$i]->no_jurnal;
                // $ppn = $page_data[$i]->total * (11 / 100);
                $total_akun = number_format(($page_data[$i]->total), 2, ',', '.');
                $dat = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal]);
                $akun = $this->db->get_where('akun_persediaan_farmasi', ['no_jurnal' => $no_jurnal]);
                // $npb = isset($npb) ? $npb->pk : '-';
                // $dat = $this->db->query("SELECT d.id_struk, s.index_dok, s.tgl_buat from detail_struk d, struk_logistik s where d.id_struk = s.no_faktur and id_detail_po='$id_detail' and id_logistik = '$id_log'");

                if ($dat->num_rows() > 0) {

                    if ($dat->num_rows() > 1) {
                        $struk = $dat->result_array();
                        $k = array();
                        // var_dump($struk);
                        foreach ($struk as $row) {
                            $k[] = $row['pk'];
                        }

                        $npb = implode(', ', array_unique($k));
                    } else {
                        $npb = $dat->row();
                        $npb = isset($npb) ? $npb->pk : '-';
                    }
                }
                if ($akun->num_rows() > 0) {

                    if ($akun->num_rows() > 1) {
                        $faktur = $akun->result_array();
                        $j = array();
                        // var_dump($struk);
                        foreach ($faktur as $row1) {
                            $j[] = $row1['no_faktur'];
                        }

                        $no_faktur = implode(', ', array_unique($j));
                    } else {
                        $no_faktur = $akun->row();
                        $no_faktur = isset($no_faktur) ? $no_faktur->no_faktur : '-';
                    }
                }
                $out[$i] = array($checkbox, $no, $no_jurnal, $kode_akun, $golonga_sediaan, $vendor, $npb, $no_faktur, $total_akun);
            }
            // $total_akun = $page_data[$i]->total;

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

    public function setJurnalFarmasi()
    {
        $staff = $this->session->userdata('data_auth');


        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $tipe = $this->input->post('tipe');
        $tgl = $this->input->post('tgl');

        $data = $this->input->post('req');
        $id_fk = implode("", [uniqid(), $staff->username]);


        if ($tipe == 'persediaan') {
            for ($i = 0; $i < count($data); $i++) {
                $a[] = $this->db->query("SELECT vendor from akun_persediaan_farmasi where id_akun = '$data[$i]'")->row();
            }
        } else {
            for ($i = 0; $i < count($data); $i++) {
                $a[] = $this->db->query("SELECT id_vendor vendor from jurnal_pembayaran_farmasi where no_jurnal = '$data[$i]'")->row();
            }
        }

        $count_bank = array_count_values(array_column($a, 'vendor'));

        // if (count($count_bank) > 1) {
        //     $out['status'] = 'error';
        //     $out['message'] = 'Jurnal hanya dilakukan dengan vendor yang sama';
        // } else {
        if ($tipe == 'persediaan') {
            for ($g = 0; $g < count($data); $g++) {
                $this->M_Kasir->update_tindakan(['kode_check' => $id_fk], ['id_akun' => $data[$g]], 'akun_persediaan_farmasi');
            }
        } else {
            for ($g = 0; $g < count($data); $g++) {
                $this->M_Kasir->update_tindakan(['kode_check' => $id_fk], ['no_jurnal' => $data[$g]], 'jurnal_pembayaran_farmasi');
            }
        }
        $page_data1 = $this->M_Keuangan_ijd->SetJurnalFarmasi($id_fk, $tipe);

        for ($h = 0; $h < count($page_data1); $h++) {
            if ($tipe == 'persediaan') {

                $page_data = $this->M_Keuangan_ijd->SelectJurnalFarmasiByNopo($id_fk, $tipe, $page_data1[$h]->no_po);


                $kode = '306';
                $maxR = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl)->max;
                $noValidR =  sprintf('%04d', $maxR + 1, 'dyhtdyu');
                $noDokR = $noValidR . "/" . "GL-306" . "/" . date('my', strtotime($tgl));

                for ($i = 0; $i < count($page_data); $i++) {

                    $golongan_sediaan = $page_data[$i]->golongan_sediaan;
                    $vendor = $page_data[$i]->id_produsen;
                    $no_po = $page_data[$i]->no_po;
                    $no_faktur = $page_data[$i]->id_struk;
                    $struk = $this->db->get_where('struk_logistik', ['no_faktur' => $no_faktur, 'ket' => 0])->row();
                    $noValid =  sprintf('%04d', $struk->index_dok, 'dyhtdyu');
                    $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($struk->tgl_buat))) . "/" . date("Y", strtotime($struk->tgl_buat));


                    // $list_coa = $this->db->get_where('list_coa', ['nama' => $golongan_sediaan])->row();
                    $arr = explode(".", $page_data[$i]->coa);
                    $desk = $page_data[$i]->desk;
                    $rek = $page_data[$i]->coa;
                    $total_akun = round($page_data[$i]->total);




                    $jurnal_1 = [
                        'id_fk' => $id_fk,
                        'jk' => '15',
                        'rekening' => $rek,
                        'deskripsi' => $desk,
                        'no_jurnal' => $noDokR,
                        'kredit' => 0,
                        'debet' => $total_akun,
                        'lap' => '01',
                        'jb' => '',
                        'cj' => '101',
                        'pk' => $noDok,
                        'tgl' => $tgl,
                        'des_rek' => $desk,
                        'staff' => $staff->nama,
                        'no_po' => $no_po,
                        'id_vendor' => $vendor,
                        'jenis_jurnal' => $tipe,

                    ];
                    $this->M_Kasir->insert_tindakan($jurnal_1, 'jurnal_farmasi');

                    $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDokR], ['no_faktur' => $page_data[$i]->no_faktur, 'tipe_akun' => $tipe], 'akun_persediaan_farmasi');

                    $dokumen = ['no_dokumen' => $noDokR, 'no_index' => $maxR + 1, 'kode' => $kode, 'tgl' => $tgl, 'staff' => $staff->nama];
                    $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');
                }
            } else {
                $des = explode(" - ", $page_data1[$h]->des_rek);
                $vendor = $des[1];
                // $dbvendor1 = $this->db->get_where('produsen', ['nama_produsen' => $vendor])->row();

                $kode = '305';
                $maxR = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl)->max;
                $noValidR =  sprintf('%04d', $maxR + 1, 'dyhtdyu');
                $noDokR = $noValidR . "/" . "GL-305" . "/" . date('my', strtotime($tgl));

                $ppn = round($page_data1[$h]->total * (11 / 100));
                $total_akun = round($page_data1[$h]->total);
                $dat = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $page_data1[$h]->no_jurnal]);
                // $npb = isset($npb) ? $npb->pk : '-';
                // $dat = $this->db->query("SELECT f.*  FROM jurnal_pembayaran_farmasi j, jurnal_farmasi f 
                // WHERE j.no_jurnal = f.no_jurnal and j.kode_check = '$id_fk'");

                if ($dat->num_rows() > 0) {

                    if ($dat->num_rows() > 1) {
                        $struk = $dat->result_array();
                        $k = array();
                        // var_dump($struk);
                        foreach ($struk as $row) {
                            $k[] = $row['pk'];
                        }

                        $npb = implode(', ', array_unique($k));
                    } else {
                        $npb = $dat->row();
                        $npb = isset($npb) ? $npb->pk : '-';
                    }
                }

                $jurnal_1 = [
                    'id_fk' => $page_data1[$h]->kode_check,
                    'jk' => '15',
                    'rekening' => '412.02.000',
                    'deskripsi' => $page_data1[$h]->des_rek,
                    'no_jurnal' => $noDokR,
                    'kredit' => 0,
                    'debet' => $total_akun,
                    'lap' => '01',
                    'jb' => '',
                    'cj' => '101',
                    'pk' => $page_data1[$h]->pk,
                    'tgl' => $tgl,
                    'des_rek' => $page_data1[$h]->des_rek,
                    'staff' => $staff->nama,
                    'no_po' => $npb,
                    'id_vendor' => $page_data1[$h]->id_vendor,
                    'jenis_jurnal' => $tipe,

                ];
                $jurnalppn = [

                    'id_fk' => $page_data1[$h]->kode_check,
                    'jk' => '15',
                    'rekening' => '111.01.000',
                    'deskripsi' => 'PPN Masukan',
                    'no_jurnal' => $noDokR,
                    'kredit' => 0,
                    'debet' => $ppn,
                    'lap' => '01',
                    'jb' => '',
                    'cj' => '101',
                    'pk' =>  $page_data1[$h]->pk,
                    'tgl' => $tgl,
                    'des_rek' => 'PPN Masukan',
                    'staff' => $staff->nama,
                    'no_po' => $npb,
                    'id_vendor' => $page_data1[$h]->id_vendor,
                    'jenis_jurnal' => $tipe,

                ];
                $this->M_Kasir->insert_tindakan($jurnal_1, 'jurnal_farmasi');
                $this->M_Kasir->insert_tindakan($jurnalppn, 'jurnal_farmasi');


                $dokumen = ['no_dokumen' => $noDokR, 'no_index' => $maxR + 1, 'kode' => $kode, 'tgl' => $tgl, 'staff' => $staff->nama];
                $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');

                $db_ju = $this->M_Keuangan_ijd->SelectJurnalFarmasiByNopo($id_fk, $tipe, "");
                foreach ($db_ju as $row) {
                    $update_db = [
                        'ket_jurnal' => 1,
                    ];
                    $this->M_Kasir->update_tindakan($update_db, ['id_jurnal' => $row->id_jurnal], 'jurnal_pembayaran_farmasi');
                }
            }
        }



        $db_jurnal = $this->M_Keuangan_ijd->selectJurnalPembayaranFarmasi($tipe);

        // var_dump($db_jurnal);
        for ($m = 0; $m < count($db_jurnal); $m++) {
            $dbvendor = $this->db->get_where('produsen', ['kode' => $db_jurnal[$m]->id_vendor])->row();
            if ($tipe == 'persediaan') {
                $total_akun1 = round($db_jurnal[$m]->total);
                $desk = 'BYMHD - ' . $dbvendor->nama_produsen;
                $rek = '412.02.000';
                $jurnal_2 = [

                    'id_fk' => $db_jurnal[$m]->id_fk,
                    'jk' => '15',
                    'rekening' => $rek,
                    'deskripsi' => $desk,
                    'no_jurnal' => $db_jurnal[$m]->no_jurnal,
                    'kredit' => round($db_jurnal[$m]->total),
                    'debet' => 0,
                    'lap' => '01',
                    'jb' => '',
                    'cj' => '101',
                    'pk' =>  $db_jurnal[$m]->no_po,
                    'tgl' => $tgl,
                    'des_rek' => $desk,
                    'staff' => $staff->nama,
                    'id_vendor' => $db_jurnal[$m]->id_vendor,
                    'jenis_jurnal' => $tipe,

                ];
            } else {

                $total_akun1 = round($db_jurnal[$m]->total / 1.11);
                $desk = 'Hutang Usaha - ' . $dbvendor->nama_produsen;
                $rek = '401.01.000';
                $jurnal_2 = [

                    'id_fk' => $db_jurnal[$m]->id_fk,
                    'jk' => '15',
                    'rekening' => $rek,
                    'deskripsi' => $desk,
                    'no_jurnal' => $db_jurnal[$m]->no_jurnal,
                    'kredit' => round($db_jurnal[$m]->total),
                    'debet' => 0,
                    'lap' => '01',
                    'jb' => '',
                    'cj' => '101',
                    'pk' =>  $db_jurnal[$m]->pk,
                    'tgl' => $tgl,
                    'des_rek' => $desk,
                    'staff' => $staff->nama,
                    'id_vendor' => $db_jurnal[$m]->id_vendor,
                    'jenis_jurnal' => $tipe,

                ];
            }


            $this->M_Kasir->insert_tindakan($jurnal_2, 'jurnal_pembayaran_farmasi');
            $this->M_Kasir->update_tindakan(['status' => 1], ['id_fk' => $db_jurnal[$m]->id_fk], 'jurnal_farmasi');
        }




        $out['status'] = 'success';
        // }
        echo json_encode($out);
    }
    ///////////////////////ACC JURNAL////////////////////////////
    public function Jurnal_farmasi_verifikasi($tipe)
    {
        $this->load->view('assets/_header');
        $page_data['judul'] = strtoupper($tipe) . ' FARMASI';
        $page_data['tipe'] = $tipe;
        $page_data['page_content'] = 'Jurnal/Jurnal_farmasi_verifikasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jurnal_farmasi_verifikasi()
    {
        $out = null;
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $tipe = $this->input->post('tipe');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Keuangan_ijd->SelectJurnalFarmasiVerifikasi($mulai, $akhir, $tipe);
        } else {
            $page_data = $this->M_Keuangan_ijd->SelectJurnalFarmasiVerifikasi('', '', $tipe);
        }

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tgl = indo_date2($page_data[$i]->tgl);

            $no_jurnal = $page_data[$i]->no_jurnal;

            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $pk = $page_data[$i]->pk;
            // $total = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            if ($page_data[$i]->status == null) {
                $verif = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>VERIFIKASI</button>";
            } elseif ($page_data[$i]->status == 'DITERIMA') {
                $verif = '<span class="label label-success">' . $page_data[$i]->status . '</span>';
            } elseif ($page_data[$i]->status == 'DITOLAK') {
                $verif = '<span class="label label-danger">' . $page_data[$i]->status . '</span>';
            }
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='setJurnal(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\",\"" .  $pk . "\",\"" .  $tipe . "\")' '><i class='icon-printer '></i></button>";

            if ($tipe == 'persediaan') {
                $dat = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal]);
                // $npb = isset($npb) ? $npb->pk : '-';
                // $dat = $this->db->query("SELECT d.id_struk, s.index_dok, s.tgl_buat from detail_struk d, struk_logistik s where d.id_struk = s.no_faktur and id_detail_po='$id_detail' and id_logistik = '$id_log'");

                if ($dat->num_rows() > 0) {

                    if ($dat->num_rows() > 1) {
                        $struk = $dat->result_array();
                        $k = array();
                        // var_dump($struk);
                        foreach ($struk as $row) {
                            $k[] = $row['pk'];
                        }

                        $npb = implode(', ', array_unique($k));
                    } else {
                        $npb = $dat->row();
                        $npb = isset($npb) ? $npb->pk : '-';
                    }
                }
            } else {
                $id_fk = $page_data[$i]->id_fk;

                $dat = $this->db->query("SELECT b.*
                from jurnal_pembayaran_farmasi a, jurnal_farmasi b
                where a.kode_check ='$id_fk' and a.pk='$pk' and b.no_jurnal = a.no_jurnal");
                // $npb = isset($npb) ? $npb->pk : '-';
                // $dat = $this->db->query("SELECT d.id_struk, s.index_dok, s.tgl_buat from detail_struk d, struk_logistik s where d.id_struk = s.no_faktur and id_detail_po='$id_detail' and id_logistik = '$id_log'");

                if ($dat->num_rows() > 0) {

                    if ($dat->num_rows() > 1) {
                        $struk = $dat->result_array();
                        $k = array();
                        // var_dump($struk);
                        foreach ($struk as $row) {
                            $k[] = $row['pk'];
                        }

                        $npb = implode(', ', array_unique($k));
                    } else {
                        $npb = $dat->row();
                        $npb = isset($npb) ? $npb->pk : '-';
                    }
                }

                $jf = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal])->row();
                if ($jf->no_po != null) {
                    $npb = $jf->no_po;
                } else {
                    $npb = $npb;
                }
            }


            $out[$i] = array($no, $verif, $cetak, $tgl, $no_jurnal, $pk, $npb, $staff);
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
    public function acc_jurnal_farmasi()
    {
        $data_staff = $this->session->userdata('data_auth');
        $tipe = $this->input->post('tipe');
        $noDok = $this->input->post('id_jurnal');

        $kode = explode('/', $noDok);
        if ($this->input->post('acc') == 'DITOLAK') {
            if ($kode[1] == 'GL-306') {
                $data_akun = [
                    'status' => 0,
                    'verifikasi' => 0,
                    'no_jurnal' => NULL,
                ];
                $this->M_Kasir->update_tindakan($data_akun, ['no_jurnal' => $noDok], 'akun_persediaan_farmasi');
                $data = [
                    'staff_verif' => $data_staff->nama,
                    'tgl_verif' => date('Y-m-d H:i:s'),
                    'keterangan' => $this->input->post('ket'),
                    'status' => $this->input->post('acc'),
                ];
    
                $this->M_Kasir->update_tindakan($data, ['no_jurnal' => $noDok], 'jurnal_pembayaran_farmasi');
            } else {
                $dat = $this->db->query("SELECT a.*
                from jurnal_pembayaran_farmasi a,  jurnal_pembayaran_farmasi b
                where a.kode_check =b.id_fk and a.pk=b.pk and b.no_jurnal ='$noDok'")->row();
                $update_db = [
                    'verifikasi_hutang' => 0,
                    'ket_jurnal' => 0,
                ];
                $this->M_Kasir->update_tindakan($update_db, ['id_jurnal' => $dat->id_jurnal], 'jurnal_pembayaran_farmasi');
                $this->M_Kasir->update_tindakan(['status' => 'DITOLAK'], ['no_jurnal' => $noDok], 'jurnal_pembayaran_farmasi');
            }
        } else {
            $data = [
                'staff_verif' => $data_staff->nama,
                'tgl_verif' => date('Y-m-d H:i:s'),
                'keterangan' => $this->input->post('ket'),
                'status' => $this->input->post('acc'),
            ];

            $this->M_Kasir->update_tindakan($data, ['no_jurnal' => $noDok], 'jurnal_pembayaran_farmasi');
        }
        $out['status'] = "success";

        echo json_encode($out);
    }

    ////////////////PELACAKAN NPB FARMASI
    public function pelacakan_npb()
    {
        $this->load->view('assets/_header');
        $page_data['judul'] = 'PELACAKAN FARMASI';
        $page_data['page_content'] = 'Jurnal/Pelacakan_npb';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_pelacakan()
    {
        $out = null;
        $db = null;

        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $tipe = $this->input->post('tipe');


        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Keuangan_ijd->Select_pelacakan($first_date, $second_date);
        } else {
            $page_data = $this->M_Keuangan_ijd->Select_pelacakan('', '');
        }

        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);

            $no = $i + 1;
            $no_faktur = $page_data[$i]->no_faktur;
            $no_po = $page_data[$i]->no_po;
            $tgl_buat = indo_date2($page_data[$i]->tgl_buat);
            $tgl_faktur = date('d-m-Y', strtotime($page_data[$i]->tgl_faktur));
            $tgl_po = date('d-m-Y', strtotime($page_data[$i]->tgl_po));
            $vendor = $page_data[$i]->vendor;
            $jumlah = number_format($page_data[$i]->jumlah, 2, ',', '.');
            $noValid =  sprintf('%04d', $page_data[$i]->index_dok, 'dyhtdyu');
            $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($page_data[$i]->tgl_buat))) . "/" . date("Y", strtotime($page_data[$i]->tgl_buat));
            $verifikasi = ($page_data[$i]->verifikasi == 1) ? '<i class="fa fa-check" style="color:green;font-size:20px;"></i>' : '<i class="fa fa-close" style="color:red;font-size:20px;"></i>';
            $jurnal_persediaan = ($page_data[$i]->status == 1) ? '<i class="fa fa-check" style="color:green;font-size:20px;"></i>' : '<i class="fa fa-close" style="color:red;font-size:20px;"></i>';
            $verif_jurnal_persediaan = ($page_data[$i]->status_jurnal == 'DITERIMA') ? '<i class="fa fa-check" style="color:green;font-size:20px;"></i>' : '<i class="fa fa-close" style="color:red;font-size:20px;"></i>';
            $verif_utang = ($page_data[$i]->verifikasi_hutang == 1) ? '<i class="fa fa-check" style="color:green;font-size:20px;"></i>' : '<i class="fa fa-close" style="color:red;font-size:20px;"></i>';
            $jurnal_utang = ($page_data[$i]->jurnal_utang == 1) ? '<i class="fa fa-check" style="color:green;font-size:20px;"></i>' : '<i class="fa fa-close" style="color:red;font-size:20px;"></i>';

            $id_fk = $page_data[$i]->kode_check;

            $dat = $this->M_Keuangan_ijd->getNpb_pelacakan($noDok);
            $verif_jurnal_utang = ($dat > 0) ? '<i class="fa fa-check" style="color:green;font-size:20px;"></i>' : '<i class="fa fa-close" style="color:red;font-size:20px;"></i>';
            $dat_1 = $this->M_Keuangan_ijd->getBuktiKas_pelacakan($noDok);
            $bukti_kas = ($dat_1 == 1) ? '<i class="fa fa-check" style="color:green;font-size:20px;"></i>' : '<i class="fa fa-close" style="color:red;font-size:20px;"></i>';


            $out[$i] = array($no, $noDok, $tgl_buat, $verifikasi, $jurnal_persediaan, $verif_jurnal_persediaan, $verif_utang, $jurnal_utang, $verif_jurnal_utang, $bukti_kas);
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

    ///////////////////////////////////////////////////////////////
    public function Laporan_jurnal_farmasi($tipe)
    {
        $this->load->view('assets/_header');
        $page_data['tipe'] = $tipe;
        $page_data['page_content'] = 'Jurnal/Laporan_jurnal_farmasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_laporan_jurnal_farmasi()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $tipe = $this->input->post('tipe');


        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Keuangan_ijd->SelectLaporanJurnalFarmasi($first_date, $second_date, $tipe);
        } else {
            $page_data = $this->M_Keuangan_ijd->SelectLaporanJurnalFarmasi('', '', $tipe);
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;


            $no_jurnal = $page_data[$i]->no_jurnal;
            $total = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $pk = $page_data[$i]->pk;
            $des = explode(" - ", $page_data[$i]->des_rek);
            $vendor = $des[1];
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='setJurnal(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\",\"" .  $pk . "\",\"" .  $tipe . "\")' '><i class='icon-printer '></i></button>";

            $id_fk = $page_data[$i]->id_fk;

            $dat = $this->db->query("select b.*
            from jurnal_pembayaran_farmasi a, jurnal_farmasi b
            where a.kode_check ='$id_fk' and a.pk='$pk' and b.no_jurnal = a.no_jurnal");
            // $npb = isset($npb) ? $npb->pk : '-';
            // $dat = $this->db->query("SELECT d.id_struk, s.index_dok, s.tgl_buat from detail_struk d, struk_logistik s where d.id_struk = s.no_faktur and id_detail_po='$id_detail' and id_logistik = '$id_log'");

            if ($dat->num_rows() > 0) {

                if ($dat->num_rows() > 1) {
                    $struk = $dat->result_array();
                    $k = array();
                    // var_dump($struk);
                    foreach ($struk as $row) {
                        $k[] = $row['pk'];
                    }

                    $npb = implode(', ', array_unique($k));
                } else {
                    $npb = $dat->row();
                    $npb = isset($npb) ? $npb->pk : '-';
                }
            }

            $out[$i] = array($no, $cetak, $tgl, $no_jurnal, $pk, $npb, $vendor, $total, $staff);
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

    public function cetak_jurnal_farmasi()
    {
        $tipe = $this->input->post('tipe');
        $id_fk = $this->input->post('id_fk');
        $no_jurnal = $this->input->post('no_jurnal');
        $page_data['tgl'] = $this->input->post('tgl');
        $page_data['staff'] = $this->input->post('staff');
        $page_data['jk'] = $this->input->post('jk');
        $page_data['tipe'] = $tipe;
        $page_data['no_po'] = $id_fk;
        $page_data['no_jurnal'] = $this->input->post('no_jurnal');
        $page_data['judul'] = 'JURNAL ' . strtoupper($tipe) . ' FARMASI';
        $page_data['data'] = $this->M_Keuangan_ijd->getJurnalFarmasi($id_fk, $no_jurnal, $tipe);
        $db = $this->db->get_where('jurnal_pembayaran_farmasi', ['no_jurnal' => $no_jurnal])->row();
        $page_data['staff_verifikasi'] = ($db->status == 'DITERIMA') ? $db->staff_verif : '';

        $response = $this->load->view('jurnal_print/cetak_jurnal_farmasi', $page_data, TRUE);
        echo $response;
    }

    /////////////////BUKTI KAS//////////////////////
    public function Bukti_kas()
    {
        $this->load->view('assets/_header');
        $tgl = date('Y-m');
        $max = $this->db->query("SELECT max(indeks) max from bukti_kas where tgl like '$tgl%'")->row();
        // $i = 0;
        $page_data = array('max' =>  $max->max + 1,);
        $page_data['judul'] = "BUKTI KAS";
        $page_data['pelayanan'] = $this->db->get('daftar_akun')->result_array();
        $page_data['data_cj'] = $this->db->get('akun_cj')->result_array();

        $page_data['page_content'] = 'Jurnal/Bukti_kas_hutang';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function getNoDokumen()
    {
        $date = $this->input->post('tanggal');
        $tgl = date('Y-m', strtotime($date));
        $max = $this->db->query("SELECT max(indeks) max from bukti_kas where tgl like '$tgl%'")->row();

        $noValidR =  sprintf('%04d', $max->max + 1, 'dyhtdyu');
        $noDokR = $noValidR . "/" . "BP" . "/" . date('my', strtotime($date));
        echo json_encode($noDokR);
    }
    public function tampil_bukti_kas()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');


        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Keuangan_ijd->SelectBuktiKas($first_date, $second_date);
        } else {
            $page_data = $this->M_Keuangan_ijd->SelectBuktiKas('', '');
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;

            if ($page_data[$i]->tipe == 'UTANG') {
                $dbvendor = $this->db->get_where('produsen', ['kode' => $page_data[$i]->vendor])->row();

                $no_jurnal = isset($dbvendor) ? $dbvendor->nama_produsen : $page_data[$i]->vendor;
            } else {
                $no_jurnal = $page_data[$i]->vendor;
            }

            $total = number_format($page_data[$i]->total - $page_data[$i]->kredit, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            // $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_dokumen . "\")' '><i class='icon-printer '></i></button>";
            if ($page_data[$i]->save == 1) {
                $tombol = "<button title='Menyimpan BK' class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='verifikasi(\"" . $page_data[$i]->no_dokumen . "\",\"" . "2" . "\",\"" . "staff" . "\")' '><i class='fa fa-check '></i></button>
            <button title='Batal BK' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='verifikasi(\"" . $page_data[$i]->no_dokumen . "\",\"" . "99" . "\",\"" . "staff" . "\")' '><i class='fa fa-close '></i></button>";

                $pilih =  "<a title='Tambah isi bukti kas' class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='bukti_kas(\"" . $page_data[$i]->no_dokumen .  "\")'><i class='icon-note'></i></a>";
                $kembali = "";
            } else if ($page_data[$i]->save == 2) {
                $tombol = '<span class="label label-success">TERSIMPAN</span>';
                $pilih =  "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_dokumen . "\")' '><i class='icon-printer '></i></button>";
                $kembali = "<button title='Kembalikan BK' class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'  onclick='kembalikan_bk(\"" . $page_data[$i]->no_dokumen . "\")' '><i class='icon-action-undo'></i></button>";
            } else if ($page_data[$i]->save == 99) {
                $tombol = '<span class="label label-danger">BATAL</span>';
                $pilih =  "";
                $kembali = "";
            } else if ($page_data[$i]->save == 3) {
                $tombol = '<span class="label label-danger">JURNAL DITOLAK</span>';
                // $pilih =  "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_dokumen . "\")' '><i class='icon-printer '></i></button>";
                $pilih =  "";
                $kembali = "";
            }

            if ($page_data[$i]->status_direktur == 'DISETUJUI') {
                $direktur = '<span class="label label-success">' . $page_data[$i]->status_direktur . '</span>';
            } elseif ($page_data[$i]->status_direktur == 'DITOLAK') {
                $direktur = '<span class="label label-danger">' . $page_data[$i]->status_direktur . '</span>';
            } else {
                if ($page_data[$i]->save == 2) {
                    $direktur = '<span class="label label-warning">Menunggu Verifikasi</span>';
                } else {
                    $direktur = '';
                }
            }


            if ($page_data[$i]->status_verifikasi == 'DISETUJUI') {
                $chief = '<span class="label label-success">' . $page_data[$i]->status_verifikasi . '</span>';
            } elseif ($page_data[$i]->status_verifikasi == 'DITOLAK') {
                $chief = '<span class="label label-danger">' . $page_data[$i]->status_verifikasi . '</span>';
            } else {
                if ($page_data[$i]->save == 2) {
                    $chief = '<span class="label label-warning">Menunggu Verifikasi</span>';
                } else {
                    $chief = '';
                }
            }
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tipe = $page_data[$i]->tipe;


            $out[$i] = array($no, $tombol, $pilih, $tgl, $no_jurnal, $total, $no_dokumen, $tipe, $staff, $direktur, $chief, $kembali);
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
    function getUangMuka()
    {
        $data = $this->db->query("SELECT b.no_dokumen,b.vendor,(sum(d.debet) - sum(d.kredit)) total
        from bukti_kas b, detail_hutang_bukti_kas d
        where d.no_dokumen = b.no_dokumen and b.tipe = 'UANG MUKA' and d.save =2 and d.pembayaran is not null 
        and b.no_dokumen not in (SELECT pk from detail_hutang_bukti_kas where tipe ='PERTANGGUNG JAWABAN' and status_verifikasi !='DITOLAK' and save !=3)
        group by b.no_dokumen,b.vendor
        order by vendor asc")->result();

        echo json_encode($data);
    }
    function getVendor_buktiKas()
    {
        $data = $this->db->query("SELECT id_vendor, SUBSTRING_INDEX(des_rek, ' - ',-1) vendor
        from jurnal_pembayaran_farmasi
        where jenis_jurnal = 'hutang' and status='DITERIMA' and ket_jurnal = 0 group by id_vendor
        order by vendor asc")->result();

        echo json_encode($data);
    }

    function tampil_vendor_bukti_kas()
    {
        $id_vendor = $this->input->post('idFaktur');
        $page_data = $this->db->query("SELECT j.*,IFNULL(d.total,0) total
        from jurnal_pembayaran_farmasi j
        left join (SELECT sum(debet) total, id_jurnal , save
                 from detail_hutang_bukti_kas 
                 where (save != 99 and save !=3) and status_verifikasi !='DITOLAK' 
                 group by id_jurnal
                 ) d on j.id_jurnal= d.id_jurnal
        where j.jenis_jurnal = 'hutang' and j.status='DITERIMA' and j.ket_jurnal = 0 
        and j.id_vendor = '$id_vendor'
        having (kredit-total) != 0
        ")->result();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;

            $des = explode(" - ", $page_data[$i]->des_rek);
            $vendor = $des[1];
            $id_vendor = $page_data[$i]->id_vendor;

            $no_jurnal = $page_data[$i]->no_jurnal;
            $tgl = indo_date2($page_data[$i]->tgl);
            $nilai = number_format($page_data[$i]->kredit, 2, ',', '.');
            $total = number_format($page_data[$i]->total, 2, ',', '.');
            $nilai1 = round(($page_data[$i]->kredit - $page_data[$i]->total), 2);
            $pk = $page_data[$i]->pk;
            $id_fk = $page_data[$i]->id_fk;

            // $dat = $this->db->query("select b.*
            //     from jurnal_pembayaran_farmasi a, jurnal_farmasi b
            //     where a.kode_check ='$id_fk' and a.pk='$pk' and b.no_jurnal = a.no_jurnal");
            // // $npb = isset($npb) ? $npb->pk : '-';
            // // $dat = $this->db->query("SELECT d.id_struk, s.index_dok, s.tgl_buat from detail_struk d, struk_logistik s where d.id_struk = s.no_faktur and id_detail_po='$id_detail' and id_logistik = '$id_log'");

            // if ($dat->num_rows() > 0) {

            //     if ($dat->num_rows() > 1) {
            //         $struk = $dat->result_array();
            //         $k = array();
            //         $j = array();
            //         // var_dump($struk);
            //         foreach ($struk as $row) {
            //             $k[] = $row['pk'];
            //             $akun = $this->db->get_where('akun_persediaan_farmasi', ['npb' => $row['pk']])->row();
            //             if (!empty($akun)) {
            //                 $j[] = $akun->no_faktur;
            //             } else {
            //                 $j[] = '-';
            //             }
            //         }

            //         $npb = implode(', ', array_unique($k));

            //         $no_faktur = implode(', ', array_unique($j));
            //     } else {
            //         $npb = $dat->row();
            //         // $npb = isset($npb) ? $npb->pk : '-';
            //         if (isset($npb)) {
            //             $npb = $npb->pk;
            //             $akun = $this->db->get_where('akun_persediaan_farmasi', ['npb' => $npb])->row();

            //             $no_faktur = isset($akun->no_faktur) ? $akun->no_faktur : '-';
            //         } else {
            //             $npb = '-';
            //             $no_faktur = '-';
            //         }
            //     }
            // } else {
            //     $npb = '-';
            //     $no_faktur = '-';
            // }
            $jf = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $page_data[$i]->no_jurnal])->row();
            if (!empty($jf) && $jf->no_po != null) {
                $npb = $jf->no_po;
                $akun = $this->db->get_where('akun_persediaan_farmasi', ['npb' => $npb])->row();
                $no_faktur = isset($akun->no_faktur) ? $akun->no_faktur : '-';
            } else {
                $npb = '-';
                $no_faktur = '-';
            }

            $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_jurnal . "'><label ></label></div>";
            $pilih =  "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_list_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $nilai1 . "\",\"" . $vendor .  "\")'><i class='icon-note'></i></a>";

            $out[$i] = array($pilih, $no_jurnal, $tgl, $pk, $npb, $no_faktur, $vendor, $id_vendor, $nilai, $total);
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
    public function insertdetail_buktikas()
    {
        $idFaktur = $this->input->post('idFaktur');
        $harga = $this->input->post('harga');
        $tgl = $this->input->post('tgl');
        $data_staff = $this->session->userdata('data_auth');
        $max = $this->input->post('max');
        $noDokR = $this->input->post('no_dok');
        $vendor = $this->input->post('vendor');
        $cj = $this->input->post('cj');
        $jurnal = $this->db->get_where('jurnal_pembayaran_farmasi', ['id_jurnal' => $idFaktur])->row();


        $data = array(
            'id_jurnal' => $idFaktur,
            'indeks' => $max,
            'no_dokumen' => $noDokR,
            'akun' => "401.01.000",
            'debet' => $harga,
            'cj' => $cj,
            'staff' => $data_staff->nama,
            'pk' => $jurnal->pk,
        );
        $this->M_Kasir->insert_tindakan($data, 'detail_hutang_bukti_kas');

        $db = $this->db->query("SELECT j.kredit,IFNULL(d.total,0) total
        from jurnal_pembayaran_farmasi j
        left join (SELECT sum(debet) total, id_jurnal 
                 from detail_hutang_bukti_kas 
                 group by id_jurnal
                 ) d on j.id_jurnal= d.id_jurnal
        where j.id_jurnal = '$idFaktur'")->row_array();
        if (round($db['kredit'] - $db['total']) == 0) {
            $this->M_Kasir->update_tindakan(['ket_jurnal' => 1], ['id_jurnal' => $idFaktur], 'jurnal_pembayaran_farmasi');
        }


        $out['status'] = "success";
        echo json_encode($out);
    }

    public function batal_buktikas()
    {
        $noDokR = $this->input->post('no_dok');
        $db = $this->M_Keuangan_ijd->getBuktiKas($noDokR);
        // if ($status == 99) {
        foreach ($db as $row) {
            if ($row->ket_jurnal == 1) {
                $this->M_Kasir->update_tindakan(['ket_jurnal' => 0], ['id_jurnal' => $row->id_jurnal], 'jurnal_pembayaran_farmasi');
            }
        }
        // } 

        $this->M_Kasir->delete_tindakan(['no_dokumen' => $noDokR, 'save' => '0'], 'detail_hutang_bukti_kas');
    }

    public function tampil_total_bukti_kas()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->db->query("SELECT sum(debet) total,sum(kredit) kredit from detail_hutang_bukti_kas where no_dokumen = '$idFaktur' group by no_dokumen")->result();
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $id_detail  = "Rp. " . number_format($page_data[$i]->total - $page_data[$i]->kredit, 0, ',', '.');
            $out[$i] = array($id_detail);
        }
        if ($out == null) {
            echo '{"data":"0"}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function simpan_bukti()
    {
        $data_staff = $this->session->userdata('data_auth');
        $tipe = $this->input->post('tipe');
        $no_dok = $this->input->post('no_dok');
        $max = $this->input->post('max');
        $vendor = $this->input->post('vendor');
        $tgl_faktur = $this->input->post('tgl_faktur');
        $pk = $this->input->post('pk');
        $dbvendor = $this->db->get_where('produsen', ['kode' => $vendor])->row();
        $data_bukti = [
            'indeks' => $max,
            'no_dokumen' => $no_dok,
            'staff' => $data_staff->nama,
            'tgl' => $tgl_faktur,
            'vendor' => $vendor,
            'tipe' => $tipe,
            'save' => 1,
        ];
        $this->M_Kasir->insert_tindakan($data_bukti, 'bukti_kas');

        if ($tipe == 'UTANG') {
            $data = array(
                'tgl' => $tgl_faktur,
                'vendor' => $vendor,
                'tipe' => $tipe,
                'deskripsi' => "Pembayaran Utang " . $dbvendor->nama_produsen,
                'des_rek' => "Pembayaran Utang " . $dbvendor->nama_produsen,
                'save' => 1,
            );

            $this->M_Kasir->update_tindakan($data, ['no_dokumen' => $no_dok], 'detail_hutang_bukti_kas');
        } else if ($tipe == 'PERTANGGUNG JAWABAN') {
            $db_bk = $this->db->get_where('detail_hutang_bukti_kas', ['no_dokumen' => $pk, 'akun !=' => ''])->row();
            $data = [
                'indeks' => $max,
                'no_dokumen' => $no_dok,
                'akun' => $db_bk->akun,
                'kredit' => $db_bk->debet,
                'debet' => $db_bk->kredit,
                'cj' => $db_bk->cj,
                'staff' => $data_staff->nama,
                'pk' => $pk,
                'tgl' => $tgl_faktur,
                'vendor' => $vendor,
                'tipe' => $tipe,
                'deskripsi' => $db_bk->deskripsi,
                'des_rek' => $db_bk->deskripsi,
                'save' => 1,
            ];
            $this->M_Kasir->insert_tindakan($data, 'detail_hutang_bukti_kas');
        } else {
            $data = [
                'indeks' => $max,
                'no_dokumen' => $no_dok,
                'akun' => '',
                'kredit' => 0,
                'debet' => 0,
                'staff' => $data_staff->nama,
                'pk' => '',
                'tgl' => $tgl_faktur,
                'vendor' => $vendor,
                'tipe' => $tipe,
                'deskripsi' => '',
                'save' => 1,
            ];
            $this->M_Kasir->insert_tindakan($data, 'detail_hutang_bukti_kas');
        }


        $out['status'] = "success";
        echo json_encode($out);
    }

    public function cetak_bukti_kas()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $page_data['no_dokumen'] = $no_jurnal;
        $page_data['data'] = $this->M_Keuangan_ijd->getBuktiKas($no_jurnal);
        $dbjurnal = $this->db->query("SELECT sum(debet) total,sum(kredit) kredit, vendor,staff,staff_verifikasi,pembayaran
        from detail_hutang_bukti_kas where no_dokumen = '$no_jurnal' group by no_dokumen")->row();
        $page_data['jurnal'] = $dbjurnal;

        if ($dbjurnal->pembayaran != null) {
            $page_data['judul'] = ($dbjurnal->pembayaran == '101.01.100') ? 'KAS' : 'BANK';
        } else {
            $page_data['judul'] = 'KAS/BANK';
        }


        $response = $this->load->view('jurnal_print/cetak_bukti_kas', $page_data, TRUE);
        echo $response;
    }
    function tampil_detail_bukti_kas()
    {
        $id_vendor = $this->input->post('idFaktur');
        $page_data = $this->M_Keuangan_ijd->getBuktiKas($id_vendor);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;

            // $des = explode(" - ", $page_data[$i]->des_rek);
            // $vendor = $des[1];
            $id_vendor = $page_data[$i]->vendor;
            // $vendor =$this->db->get_where('produsen',['kode'=>$id_vendor])->row();

            $akun = $page_data[$i]->akun;
            $cj = $page_data[$i]->cj;
            $uraian = $page_data[$i]->deskripsi;
            $nilai = number_format($page_data[$i]->debet + $page_data[$i]->kredit, 0, ',', '.');
            if ($page_data[$i]->id_jurnal == "" || $page_data[$i]->id_jurnal == null) {
                $delete =
                    "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id . "\")' '><i class='fa fa-trash '></i></button>";
            } else {
                $delete = "";
            }
            $pilih = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" .  $page_data[$i]->id . "\")'><i class='icon-rocket'></i></button>";

            // $total = number_format($page_data[$i]->kredit, 0, ',', '.');
            // $nilai1 = round($page_data[$i]->kredit - $page_data[$i]->total);
            // $id_fk = $page_data[$i]->pk;


            $out[$i] = array($delete,$pilih, $akun,$cj, $uraian, $nilai);
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
    public function addBk()
    {
        $data_staff = $this->session->userdata('data_auth');
        $pelayanan = explode("|", $this->input->post('pelayanan'));
        $id_jenis = explode("|", $this->input->post('id_jenis'));
        $no_dokumen = $this->input->post('no_dokumen');

        $kode1 = $this->db->get_where('daftar_akun', ['id_akun' => $id_jenis[1]])->row();
        $kode2 = $this->db->get_where('detail_daftar_akun', ['id_detail' => $id_jenis[0]])->row();

        $rek = $kode1->kode . '.' . $kode2->kode . '.' . $pelayanan[0];
        $kode1_split = str_split($kode1->kode);
        if ($kode1_split[0] == 7 || $kode1_split[0] == 8) {
            $desk =  $kode1->deskripsi . ' = ' . $kode2->deskripsi . ' = ' . $pelayanan[1];
        } else {
            $desk =  $kode1->deskripsi . ' = ' . $pelayanan[1];
        }

        $nilai = $this->input->post('nilai');
        $tipe = $this->input->post('tipe');
        $dok = $this->db->get_where("bukti_kas", ['no_dokumen' => $no_dokumen])->row();

        $data = [
            'indeks' => $dok->indeks,
            'no_dokumen' => $no_dokumen,
            'akun' => $rek,
            'kredit' => ($tipe == 'KREDIT') ? $nilai : 0,
            'debet' => ($tipe == 'DEBIT') ? $nilai : 0,
            'staff' => $data_staff->nama,
            'pk' => $this->input->post('pk'),
            'tgl' => $dok->tgl,
            'vendor' => $dok->vendor,
            'tipe' => $dok->tipe,
            'deskripsi' => $this->input->post('deskripsi'),
            'cj' => $this->input->post('cj'),
            'des_rek' => $desk,
            'save' => 1,
        ];

        $this->M_Kasir->insert_tindakan($data, 'detail_hutang_bukti_kas');
        if ($dok->tipe != 'UTANG') {
            $this->M_Kasir->delete_tindakan(['no_dokumen' => $no_dokumen, 'akun' => ''], 'detail_hutang_bukti_kas');
        }


        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_addBK()
    {
        $id_faktur = $this->input->post('id_faktur');

        // $this->M_Kasir->update_tindakan(['save'=>99], ['id' => $id_faktur], 'detail_hutang_bukti_kas');
        $this->M_Kasir->delete_tindakan(['id' => $id_faktur], 'detail_hutang_bukti_kas');
        $out['status'] = "success";
        echo json_encode($out);
    }

     // Start edit ayat jurnal
     public function edit_bukti_kas()
     {
         $data_staff = $this->session->userdata('data_auth');
         if ($this->input->post('pelayanan') == "-" || $this->input->post('id_jenis') == "-" || $this->input->post('kategori') == "-") {
             $out['COA Rekening Dipilih Terlebih Dahulu'] = "success";
         } else {
 
             $pelayanan = explode("|", $this->input->post('pelayanan'));
             $id_jenis = explode("|", $this->input->post('id_jenis'));
             $id_detail = $this->input->post('id_detail');
             $kode1 = $this->db->get_where('daftar_akun', ['id_akun' => $id_jenis[1]])->row();
             $kode2 = $this->db->get_where('detail_daftar_akun', ['id_detail' => $id_jenis[0]])->row();
 
             $rek = $kode1->kode . '.' . $kode2->kode . '.' . $pelayanan[0];
             $kode1_split = str_split($kode1->kode);
             if ($kode1_split[0] == 7 || $kode1_split[0] == 8) {
                 $desk =  $kode1->deskripsi . ' = ' . $kode2->deskripsi . ' = ' . $pelayanan[1];
             } else {
                 $desk =  $kode1->deskripsi . ' = ' . $pelayanan[1];
             }
             $nilai = $this->input->post('nilai');
             $tipe = $this->input->post('tipe');
 
           
                 $data = [
                     'akun' => $rek,
                     'deskripsi' => $this->input->post('deskripsi'),
                     'kredit' => ($tipe == 'KREDIT') ? $nilai : 0,
                     'debet' => ($tipe == 'DEBIT') ? $nilai : 0,
                     // 'lap' => '01',
                     // 'jb' => $pelayanan[0],
                     'cj' => $this->input->post('cj'),
                     'pk' => $this->input->post('pk'),
                     'tgl_input' => date('Y-m-d H:i:s'),
                     'des_rek' => $desk,
                     'staff' => $data_staff->nama,
                     // 'id_fk' => $tipe,
                 ];
                 $this->M_Kasir->update_tindakan($data, ['id' => $id_detail], 'detail_hutang_bukti_kas');
             
             $out['status'] = "success";
         }
         echo json_encode($out);
     }
    public function edit_addBk()
    {
        $id_detail = $this->input->post('id_detail');
        $tipe = $this->input->post('tipe');
      
            $data = $this->db->get_where('detail_hutang_bukti_kas', ['id' => $id_detail])->row();
        
        $rek = explode('.', $data->akun);
        $kode1 = $this->db->get_where('daftar_akun', ['kode' => $rek[0]])->row()->id_akun;
        $kode2 = $this->db->get_where('detail_daftar_akun', ['id_akun' => $kode1, 'kode' => $rek[1]])->row()->id_detail;
        $kode1_split = str_split($rek[0]);
        if ($kode1_split[0] == 7 || $kode1_split[0] == 8) {
            $desk = explode(' = ', $data->des_rek);
            $desk = $desk[2];
        } else {
            // if ($tipe == 'MIT' || $tipe =='PEMBAYARAN PIUTANG') {
            //     $desk = $this->db->get_where('sub_detail_akun', ['kategori' => $rek[0], 'sub_kategori' => $rek[1], 'kode' => $rek[2]])->row()->deskripsi;
            // } else {
                $desk = explode(' = ', $data->des_rek);
                $desk = $desk[1];
            // }
        }
        $response['kode1'] = $kode1;
        $response['kode2'] = $kode2;
        $response['kode3'] = $rek[2];
        $response['desk'] = $desk;
        $response['no_pk'] = $data->pk;
        $response['deskripsi'] = $data->deskripsi;
        $response['nilai'] = $data->kredit + $data->debet;
        // $response['cj'] = $data->cj;
        $response['tipe'] = ($data->kredit != 0) ? 'KREDIT' : 'DEBIT';

        echo json_encode($response);
    }

    /////////////////////verif bukti kas
    public function Verifikasi_Bukti_kas()
    {
        $this->load->view('assets/_header');

        $page_data['judul'] = "BUKTI KAS";
        $page_data['page_content'] = 'Jurnal/Bukti_kas_hutang_verifikasi';
        $page_data['data_cj'] = $this->db->get('akun_cj')->result_array();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_bukti_kas_verifikasi()
    {
        $data_staff = $this->session->userdata('data_auth');

        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');


        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Keuangan_ijd->SelectBuktiKas1($first_date, $second_date);
        } else {
            $page_data = $this->M_Keuangan_ijd->SelectBuktiKas1('', '');
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;

            $dbvendor = $this->db->get_where('produsen', ['kode' => $page_data[$i]->vendor])->row();

            // $no_jurnal = $dbvendor->nama_produsen;
            if ($page_data[$i]->tipe == 'UTANG') {
                $dbvendor = $this->db->get_where('produsen', ['kode' => $page_data[$i]->vendor])->row();

                $no_jurnal = isset($dbvendor) ? $dbvendor->nama_produsen : $page_data[$i]->vendor;
            } else {
                $no_jurnal = $page_data[$i]->vendor;
            }
            $no_dokumen = $page_data[$i]->no_dokumen;

            $total = number_format($page_data[$i]->total - $page_data[$i]->kredit, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_dokumen . "\")' '><i class='icon-printer '></i></button>";

            if ($data_staff->tipe == 'direktur') {
                if ($page_data[$i]->status_direktur == null) {
                    $tombol = "<button title='Menyetujui BK' class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='verifikasi(\"" . $page_data[$i]->no_dokumen . "\",\"" . "DISETUJUI" . "\",\"" . "direktur" . "\")' '><i class='fa fa-thumbs-up '></i></button>
                <button title='Tidak Menyetujui BK' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='verifikasi(\"" . $page_data[$i]->no_dokumen . "\",\"" . "DITOLAK" . "\",\"" . "direktur" . "\")' '><i class='fa fa-close '></i></button>";
                } else if ($page_data[$i]->status_direktur == 'DISETUJUI') {
                    $tombol = '<span class="label label-success">' . $page_data[$i]->status_direktur . '</span>';
                } elseif ($page_data[$i]->status_direktur == 'DITOLAK') {
                    $tombol = '<span class="label label-danger">' . $page_data[$i]->status_direktur . '</span>';
                }
            } else {
                if ($page_data[$i]->status_verifikasi == null) {
                    $tombol = "<button title='Menyetujui BK' class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='verifikasi(\"" . $page_data[$i]->no_dokumen . "\",\"" . "DISETUJUI" . "\",\"" . "chief" . "\")' '><i class='fa fa-thumbs-up '></i></button>
                <button title='Tidak Menyetujui BK' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='verifikasi(\"" . $page_data[$i]->no_dokumen . "\",\"" . "DITOLAK" . "\",\"" . "chief" . "\")' '><i class='fa fa-close '></i></button>";
                } else if ($page_data[$i]->status_verifikasi == 'DISETUJUI') {
                    if ($page_data[$i]->pembayaran == null) {
                        $tombol =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='pilih(\"" . $page_data[$i]->no_dokumen .  "\")'><i class='icon-note'></i></a>";
                    } else {
                        $tombol = ($page_data[$i]->pembayaran == '101.01.100') ? 'KAS' : 'BANK';
                    }
                } elseif ($page_data[$i]->status_verifikasi == 'DITOLAK') {
                    $tombol = '<span class="label label-danger">' . $page_data[$i]->status_verifikasi . '</span>';
                }
            }



            $out[$i] = array($no, $tombol, $cetak, $no_dokumen, $no_jurnal, $total, $staff);
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
    public function verifikasi()
    {
        $data_staff = $this->session->userdata('data_auth');

        $status = $this->input->post('status');
        $no_dok = $this->input->post('no_dok');
        $tipe = $this->input->post('tipe');

        if ($tipe == 'direktur') {
            $data = array(
                'status_direktur' => $status,
                'tgl_direktur' => date('Y-m-d H:i:s'),
            );
        } else  if ($tipe == 'chief') {
            $db = $this->M_Keuangan_ijd->getBuktiKas($no_dok);
            if ($status == 'DITOLAK') {
                foreach ($db as $row) {
                    if ($row->ket_jurnal == 1) {
                        $this->M_Kasir->update_tindakan(['ket_jurnal' => 0], ['id_jurnal' => $row->id_jurnal], 'jurnal_pembayaran_farmasi');
                    }
                }
            }
            $data = array(
                'status_verifikasi' => $status,
                'staff_verifikasi' => $data_staff->nama,
                'tgl_chief' => date('Y-m-d H:i:s'),
            );
        } else {
            $db = $this->M_Keuangan_ijd->getBuktiKas($no_dok);
            if ($status == 99) {
                foreach ($db as $row) {
                    if ($row->ket_jurnal == 1) {
                        $this->M_Kasir->update_tindakan(['ket_jurnal' => 0], ['id_jurnal' => $row->id_jurnal], 'jurnal_pembayaran_farmasi');
                    }
                }
            }
            $data = array(
                'save' => $status,
            );
            $this->M_Kasir->update_tindakan($data, ['no_dokumen' => $no_dok], 'bukti_kas');
        }


        $this->M_Kasir->update_tindakan($data, ['no_dokumen' => $no_dok], 'detail_hutang_bukti_kas');

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function get_bank()
    {
        $out = $this->db->get('daftar_bank')->result();
        echo json_encode($out);
    }
    public function Simpan_pembayaran_utang()
    {
        $data_staff = $this->session->userdata('data_auth');

        $tgl_faktur = $this->input->post('tgl_faktur');
        // $tgl_faktur = date('Y-m-d');
        $jenis = $this->input->post('id_jenis');
        $no_dok = $this->input->post('no_dokumen');
        $bank = $this->input->post('bank');

        $dok = $this->db->get_where("detail_hutang_bukti_kas", ['no_dokumen' => $no_dok, 'akun !=' => ''])->result();
        $tgl = $dok[0]->tgl;

        if ($jenis == 'kas') {
            $coa = '101.01.100';
            $kode = '301';
            $judul = 'KAS';
            $jk = '10';
            $desk = 'Kas - Rupiah';
        } else {
            $kode = '302';
            $judul = 'BANK';
            $jk = '11';
            // $desk = 'Bank Mandiri - Rupiah';
            $desk = $this->db->get_where("daftar_bank", ['kode_coa' => $bank])->row()->deskripsi;
            $coa = $bank;
        }
        $max = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl_faktur)->max;
        $noValid =  sprintf('%04d', $max + 1, 'dyhtdyu');
        $noDok = $noValid . "/" . "GL-" . $kode . "/" . date('my', strtotime($tgl_faktur));
        $no_index = $max + 1;
        $data_j = array(
            'no_jurnal' => $noDok,
            'tanggal' => $tgl_faktur,
            'tipe_jurnal' => $judul,
            'tgl_input' => date("Y-m-d H:i:s"),
            'tgl_simpan' => date("Y-m-d H:i:s"),
            'id_staff' => $dok[0]->staff,
            'ket' => 1,
            'source' => 'BK'

        );


        $id_jurnal = $this->M_Kasir->insert_tindakan($data_j, 'jurnal_kas_bank');
        $dokumen = ['no_dokumen' => $noDok, 'no_index' => $no_index, 'kode' => $kode, 'tgl' => $tgl_faktur, 'staff' => $data_staff->nama];
        $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');

        foreach ($dok as $row) {
            $pelayanan = explode(".", $row->akun);

            $data2 = [
                'id_jurnal' => $row->id,
                'jk' => $jk,
                'rekening' => $row->akun,
                'deskripsi' => $row->deskripsi,
                'no_jurnal' => $noDok,
                'kredit' => $row->kredit,
                'debet' => $row->debet,
                'lap' => '01',
                'jb' => $pelayanan[2],
                'cj' => is_null($row->cj)?0:$row->cj,
                'pk' => $no_dok,
                'tgl' => $tgl_faktur,
                'des_rek' => $row->des_rek,
                'staff' => $dok[0]->staff,
                'id_fk' => $judul,
                'pk_bukti' => $row->pk,

            ];
            $this->M_Kasir->insert_tindakan($data2, 'detail_jurnal_kas_bank');
        }

        $sumdebit = $this->db->query("SELECT sum(debet) jumlah from detail_hutang_bukti_kas where no_dokumen ='$no_dok'")->row()->jumlah;
        $sumkredit = $this->db->query("SELECT sum(kredit) jumlah from detail_hutang_bukti_kas where no_dokumen ='$no_dok'")->row()->jumlah;
        $pelayanan1 = explode(".", $coa);
        $db_kd = $sumdebit - $sumkredit;
        if ($db_kd < 0) {
            $debet =  $db_kd * -1;
            $kredit = 0;
        } else {
            $debet =  0;
            $kredit = $db_kd;
        }

        $data1 = [
            'id_jurnal' => '',
            'jk' => $jk,
            'rekening' => $coa,
            'deskripsi' => $desk,
            'no_jurnal' => $noDok,
            'kredit' => $kredit,
            'debet' => $debet,
            'lap' => '01',
            'jb' => $pelayanan1[2],
            'cj' =>'101',
            'pk' => $no_dok,
            'tgl' => $tgl_faktur,
            'des_rek' => $desk,
            'staff' => $dok[0]->staff,
            'id_fk' => $judul,
            'pk_bukti' => 'Jurnal',

        ];
        $this->M_Kasir->insert_tindakan($data1, 'detail_jurnal_kas_bank');

        $data = [
            'pembayaran' => $coa,
            'tgl_verifikasi' => $tgl_faktur,
            'ket_jurnal' => 1,
            'no_jurnal' => $noDok,
        ];

        $this->M_Kasir->update_tindakan($data, ['no_dokumen' => $no_dok], 'detail_hutang_bukti_kas');

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function Sisa_utang_vendor()
    {
        $this->load->view('assets/_header');

        $page_data['judul'] = "LAPORAN SISA PEMBYARAN UTANG";
        $page_data['page_content'] = 'Jurnal/Laporan_sisa_utang_vendor';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    function tampil_sisa_hutang_vendor()
    {
        $page_data = $this->db->query("SELECT j.*, sum(j.kredit) kredit,IFNULL(sum(d.total),0) total
        from jurnal_pembayaran_farmasi j
        left join (SELECT sum(debet) total, id_jurnal 
                 from detail_hutang_bukti_kas 
                 where save = 2
                 group by id_jurnal
                 ) d on j.id_jurnal= d.id_jurnal
        where j.jenis_jurnal = 'hutang' and j.status='DITERIMA'
        group by j.id_vendor
        having (kredit-total) != 0
        ")->result();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;

            $des = explode(" - ", $page_data[$i]->des_rek);
            $vendor = $des[1];
            $id_vendor = $page_data[$i]->id_vendor;

            $nilai = number_format($page_data[$i]->kredit, 0, ',', '.');
            $total = number_format($page_data[$i]->total, 0, ',', '.');
            $nilai1 = number_format(round($page_data[$i]->kredit - $page_data[$i]->total), 0, ',', '.');
            // $aging = $this->M_Keuangan_ijd->getAgingUtang($id_vendor);
            // foreach($aging as $row){
            //     if($row->hari <=90){
            //         $a0_90 = $row->kredit - $row->total;
            //     }else if($row->hari >90 && $row->hari<= 120){
            //         $a91_120 = $row->kredit - $row->total;
            //     }else if($row->hari >120 && $row->hari<= 365){
            //         $a121_365 = $row->kredit - $row->total;
            //     }else if($row->hari > 365){
            //         $a365 = $row->kredit - $row->total;
            //     }
            // }
            // print_arr($aging);


            // $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_jurnal . "'><label ></label></div>";
            $pilih =  "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_list_faktur(\"" . $id_vendor .  "\")'><i class='icon-note'></i></a>";

            // $out[$i] = array($no,$pilih, $vendor, $id_vendor, $nilai1,$a0_90,$a91_120,$a121_365,$a365);
            $out[$i] = array($no, $pilih, $vendor, $id_vendor, $nilai1);
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
    function tampil_sisa_hutang_Byvendor()
    {
        $id_vendor = $this->input->post('idFaktur');
        $page_data = $this->db->query("SELECT j.*,IFNULL(d.total,0) total
        from jurnal_pembayaran_farmasi j
        left join (SELECT sum(debet) total, id_jurnal 
                 from detail_hutang_bukti_kas 
                 where save = 2
                 group by id_jurnal
                 ) d on j.id_jurnal= d.id_jurnal
        where j.jenis_jurnal = 'hutang' and j.status='DITERIMA' 
        and j.id_vendor = '$id_vendor'
        having (kredit-total) != 0
        ")->result();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;

            $des = explode(" - ", $page_data[$i]->des_rek);
            $vendor = $des[1];
            $id_vendor = $page_data[$i]->id_vendor;

            $no_jurnal = $page_data[$i]->no_jurnal;
            $nilai = number_format($page_data[$i]->kredit, 0, ',', '.');
            $total = number_format($page_data[$i]->total, 0, ',', '.');
            $nilai1 = number_format(round($page_data[$i]->kredit - $page_data[$i]->total), 0, ',', '.');
            $id_fk = $page_data[$i]->pk;

            // $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_jurnal . "'><label ></label></div>";
            // $pilih =  "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_list_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $nilai1 . "\",\"" . $vendor .  "\")'><i class='icon-note'></i></a>";

            $out[$i] = array($no, $no_jurnal, $id_fk, $vendor, $id_vendor, $nilai1);
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
    public function update($id_jurnal)
    {

        // $page_data = $this->M_Keuangan_ijd->update('2023-01-01', '2023-01-20');
        // $page_data = $this->db->query("SELECT s.*,a.id_akun from akun_persediaan_farmasi a, struk_logistik s 
        // where a.no_faktur = s.no_faktur")->result();

        // for ($i = 0; $i < count($page_data); $i++) {

        //     $noValid =  sprintf('%04d', $page_data[$i]->index_dok, 'dyhtdyu');
        //     $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($page_data[$i]->tgl_buat))) . "/" . date("Y", strtotime($page_data[$i]->tgl_buat));
        //     $db = [
        //         'npb' => $noDok,
        //     ];
        //     // $db = [
        //     //     // 'verifikasi' => 0,
        //     //     'status' => 0,
        //     // ];
        //     $this->M_Kasir->update_tindakan($db, ['id_akun' => $page_data[$i]->id_akun], 'akun_persediaan_farmasi');
        //     // $this->M_Kasir->update_tindakan(['status' => 'DITOLAK', 'keterangan' => 'dikembalikan ke awal'], ['no_jurnal' => $page_data[$i]->no_jurnal], 'jurnal_pembayaran_farmasi');
        //     // // $this->M_Kasir->delete_tindakan(['no_jurnal' => $page_data[$i]->no_jurnal], 'jurnal_pembayaran_farmasi');
        // }
        // $page_data = $this->M_Keuangan_ijd->SelectJurnalFarmasiVerifikasi('2023-01-01', '2023-02-28', 'hutang');
        // $page_data = $this->db->query("SELECT * 
        // FROM jurnal_farmasi
        // where jenis_jurnal='hutang' and no_po is null  ")->result();

        // for ($i = 0; $i < count($page_data); $i++) {
        //     $id_fk = $page_data[$i]->id_fk;
        //     $pk = $page_data[$i]->pk;
        //     $no_jurnal = $page_data[$i]->no_jurnal;

        //     $dat = $this->db->query("SELECT b.*
        //         from jurnal_pembayaran_farmasi a, jurnal_farmasi b
        //         where a.kode_check ='$id_fk' and a.pk='$pk' and b.no_jurnal = a.no_jurnal");
        //     // $npb = isset($npb) ? $npb->pk : '-';
        //     // $dat = $this->db->query("SELECT d.id_struk, s.index_dok, s.tgl_buat from detail_struk d, struk_logistik s where d.id_struk = s.no_faktur and id_detail_po='$id_detail' and id_logistik = '$id_log'");

        //     if ($dat->num_rows() > 0) {

        //         if ($dat->num_rows() > 1) {
        //             $struk = $dat->result_array();
        //             $k = array();
        //             // var_dump($struk);
        //             foreach ($struk as $row) {
        //                 $k[] = $row['pk'];
        //             }

        //             $npb = implode(', ', array_unique($k));
        //         } else {
        //             $npb = $dat->row();
        //             $npb = isset($npb) ? $npb->pk : '-';
        //         }
        //     }
        //     $this->M_Kasir->update_tindakan(
        //         ['no_po' => $npb],
        //         ['no_jurnal' => $no_jurnal, 'jenis_jurnal' => 'hutang', 'no_po' => NULL],
        //         'jurnal_farmasi'
        //     );
        // }
        $jp = $this->db->get_where('jurnal_pembayaran_farmasi', ['id_jurnal' => $id_jurnal])->row();
        $no_po = $jp->pk;
        $no_jurnal = $jp->no_jurnal;

        $jf = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal])->row();
        $npb = $jf->no_po;

        $dat_npb = explode(', ', $npb);
        // print_r($dat_npb);
        $akun_pers = array();
        for ($a = 0; $a < count($dat_npb); $a++) {
            $akun_pers[] = $this->db->get_where('akun_persediaan_farmasi', ['npb' => $dat_npb[$a]])->row();
        }
        // echo '<br>';
        // print_r($akun_pers);
        $no_faktur = implode(', ', array_column($akun_pers, 'no_faktur'));
        $tgl_po = implode(', ', array_column($akun_pers, 'tgl_po'));
        $tgl_faktur = implode(', ', array_column($akun_pers, 'tgl_faktur'));
        echo $no_faktur;
    }

    public function export_jurnal($mulai, $akhir, $jurnal)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        $sheet->setCellValue('A1', "REKAP JURNAL"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        // Buat header tabel nya pada baris ke 3
        // $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('B3', "JK"); // Set kolom B3 dengan tulisan "NIS"
        $sheet->setCellValue('C3', "TANGGAL"); // Set kolom C3 dengan tulisan "NAMA"
        $sheet->setCellValue('D3', "NO JURNAL"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('E3', "GROUP"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('F3', "MEAN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('G3', "SUB"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('H3', "JP"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('I3', "REKENING"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('J3', "JP/JB");
        $sheet->setCellValue('K3', "CF");
        $sheet->setCellValue('L3', "PK");
        $sheet->setCellValue('M3', "LAP");
        $sheet->setCellValue('N3', "KODE VENDOR");
        $sheet->setCellValue('O3', "NAMA REKANAN");
        // $sheet->setCellValue('P3', "KELOMPOK VENDOR");
        $sheet->setCellValue('P3', "DEBET");
        $sheet->setCellValue('Q3', "KREDIT");
        $sheet->setCellValue('R3', "SALDO");
        $sheet->setCellValue('S3', "DESKRIPSI");
        $sheet->setCellValue('T3', "DESKRIPSI REKENING");
        $sheet->setCellValue('U3', "NO FAKTUR");
        $sheet->setCellValue('V3', "TGL FAKTUR");
        $sheet->setCellValue('W3', "NO PO");
        $sheet->setCellValue('X3', "TGL PO");
        $sheet->setCellValue('Y3', "NO NPB");
        $sheet->setCellValue('Z3', "STAFF");

        if ($jurnal == 'kas_bank_utang') {
            $sheet->setCellValue('AA3', "NO JURNAL UTANG");
        }
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        // $sheet->getStyle('A3')->applyFromArray($style_col);
        if ($jurnal == 'kas_bank_utang') {
            $sheet->getStyle('B3:AA3')->applyFromArray($style_col);
        } else {
            $sheet->getStyle('B3:Z3')->applyFromArray($style_col);
        }
        // $sheet->getStyle('V')->getNumberFormat()->setFormatCode('@');

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        // $first_date = $this->input->post('mulai');
        // $second_date = $this->input->post('akhir');

        $rekap = $this->M_Keuangan_ijd->SelectRekapLogFar($mulai, $akhir, $jurnal);

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($rekap as $data) { // Lakukan looping pada variabel siswa
            // $svheet->setCellValue('A' . $numrow, $no);
            $rekening = explode('.', $data->rekening);
            $group = substr($rekening[0], 0, 1);


            if ($jurnal == 'persediaan') {
                $no_jurnal = $data->no_jurnal;
                $id_vendor = $data->id_vendor;

                $jp = $this->db->get_where('jurnal_pembayaran_farmasi', ['no_jurnal' => $no_jurnal])->row();
                $no_po = $jp->pk;

                $dat = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal]);
                $akun_pers = $this->db->get_where('akun_persediaan_farmasi', ['no_jurnal' => $no_jurnal]);

                if ($dat->num_rows() > 0) {

                    if ($dat->num_rows() > 1) {
                        $struk = $dat->result_array();
                        $k = array();
                        // var_dump($struk);
                        foreach ($struk as $row) {
                            $k[] = $row['pk'];
                        }

                        $npb = implode(', ', array_unique($k));
                    } else {
                        $npb = $dat->row();
                        $npb = isset($npb) ? $npb->pk : '-';
                    }
                }
                if ($akun_pers->num_rows() > 1) {
                    $struk_1 = $akun_pers->result_array();
                    $l = array();
                    $m = array();
                    $n = array();
                    // var_dump($struk);
                    foreach ($struk_1 as $row) {
                        $l[] = $row['tgl_po'];
                        $m[] = $row['tgl_faktur'];
                        $n[] = $row['no_faktur'];
                    }

                    $tgl_po = implode(', ', array_unique($l));
                    $tgl_faktur = implode(', ', array_unique($m));
                    $no_faktur = implode(', ', array_unique($n));
                } else {
                    $akun_pers_row = $akun_pers->row();
                    $tgl_po = isset($akun_pers_row) ? $akun_pers_row->tgl_po : '-';
                    $tgl_faktur = isset($akun_pers_row) ? $akun_pers_row->tgl_faktur : '-';
                    $no_faktur = isset($akun_pers_row) ? $akun_pers_row->no_faktur : '-';
                }
            } else if ($jurnal == 'hutang') {
                $no_jurnal = $data->no_jurnal;
                $id_vendor = $data->id_vendor;

                $jp = $this->db->get_where('jurnal_pembayaran_farmasi', ['no_jurnal' => $data->no_jurnal])->row();
                $no_po = $jp->pk;
                $no_jurnal = $jp->no_jurnal;

                $jf = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal])->row();
                $npb = $jf->no_po;

                $dat_npb = explode(', ', $npb);
                // print_r($dat_npb);
                $akun_pers = array();
                for ($a = 0; $a < count($dat_npb); $a++) {
                    $akun_pers[] = $this->db->get_where('akun_persediaan_farmasi', ['npb' => $dat_npb[$a]])->row();
                }
                // echo '<br>';
                // print_r($akun_pers);
                $no_faktur = implode(', ', array_column($akun_pers, 'no_faktur'));
                $tgl_po = implode(', ', array_column($akun_pers, 'tgl_po'));
                $tgl_faktur = implode(', ', array_column($akun_pers, 'tgl_faktur'));
                // $no_po='';
                // $no_faktur='';
                // $tgl_po='';
                // $tgl_faktur='';

            } else if ($jurnal == 'kas_bank_utang') {
                if (isset($data->id_jurnal)) {
                    $id_jurnal =  $this->db->get_where('detail_hutang_bukti_kas', ['id' => $data->id_jurnal])->row();
                    if (!empty($id_jurnal) && isset($id_jurnal->id_jurnal)) {
                        $id_jurnal = $id_jurnal->id_jurnal;
                        $jp = $this->db->get_where('jurnal_pembayaran_farmasi', ['id_jurnal' => $id_jurnal])->row();
                        $no_po = $jp->pk;
                        $id_vendor = $jp->id_vendor;
                        $no_jurnal = $jp->no_jurnal;

                        $jf = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal])->row();
                        $npb = $jf->no_po;

                        $dat_npb = explode(', ', $npb);
                        // print_r($dat_npb);
                        $akun_pers = array();
                        for ($a = 0; $a < count($dat_npb); $a++) {
                            $akun_pers[] = $this->db->get_where('akun_persediaan_farmasi', ['npb' => $dat_npb[$a]])->row();
                        }

                        // echo '<br>';
                        // print_r($akun_pers);
                        $no_faktur = implode(', ', array_column($akun_pers, 'no_faktur'));
                        $tgl_po = implode(', ', array_column($akun_pers, 'tgl_po'));
                        $tgl_faktur = implode(', ', array_column($akun_pers, 'tgl_faktur'));
                    } else {
                        $npb = '-';
                        $no_po = '-';
                        $tgl_po = '-';
                        $no_faktur = '-';
                        $tgl_faktur = '-';
                        $id_vendor = '-';
                    }
                } else {
                    $npb = '-';
                    $no_po = '-';
                    $tgl_po = '-';
                    $no_faktur = '-';
                    $tgl_faktur = '-';
                    $id_vendor = '-';
                }
            }

            $vendor = $this->db->query("SELECT nama nama_rekanan FROM
            cara_bayar where kode_pelanggan ='$id_vendor'
            union all
            SELECT nama_produsen nama_rekanan FROM
            produsen where kode ='$id_vendor'
            ")->row();
            $vendor = isset($vendor->nama_rekanan) ? $vendor->nama_rekanan : '';

            $sheet->setCellValue('B' . $numrow, $data->jk);
            $sheet->setCellValue('C' . $numrow, date('Y-m-d', strtotime($data->tgl)));
            $sheet->setCellValue('D' . $numrow, $data->no_jurnal);
            $sheet->setCellValue('E' . $numrow, $group);
            $sheet->setCellValue('F' . $numrow, $rekening[0]);
            $sheet->setCellValue('G' . $numrow, $rekening[1]);
            $sheet->setCellValue('H' . $numrow, $rekening[2]);
            $sheet->setCellValue('I' . $numrow, $data->rekening);
            $sheet->setCellValue('J' . $numrow, $data->jb);
            $sheet->setCellValue('K' . $numrow, $data->cj);
            $sheet->setCellValue('L' . $numrow, $data->pk);
            $sheet->setCellValue('M' . $numrow, $data->lap);
            $sheet->setCellValue('N' . $numrow, $id_vendor);
            $sheet->setCellValue('O' . $numrow, $vendor);
            // $sheet->setCellValue('P' . $numrow, $data->kelompok_pelanggan);
            $sheet->setCellValue('P' . $numrow, $data->debet);
            $sheet->setCellValue('Q' . $numrow, $data->kredit);
            $sheet->setCellValue('R' . $numrow, $data->debet - $data->kredit);
            $sheet->setCellValue('S' . $numrow, ucwords(strtolower($data->deskripsi)));
            $sheet->setCellValue('T' . $numrow, ucwords(strtolower($data->des_rek)));
            $sheet->setCellValue('U' . $numrow, $no_faktur);
            $sheet->setCellValue('V' . $numrow, date('d/m/Y', strtotime($tgl_faktur)));
            $sheet->setCellValue('W' . $numrow, $no_po);
            $sheet->setCellValue('X' . $numrow, date('d/m/Y', strtotime($tgl_po)));
            $sheet->setCellValue('Y' . $numrow, $npb);
            $sheet->setCellValue('Z' . $numrow, $data->staff);

            if ($jurnal == 'kas_bank_utang') {
                $sheet->setCellValue('AA' . $numrow, $no_jurnal);
            }

            $sheet->getCell('U' . $numrow)->setValueExplicit(
                $no_faktur,
                \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING2
            );
            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            // $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow . ':Z' . $numrow)->applyFromArray($style_row);

            if ($jurnal == 'kas_bank_utang') {
                $sheet->getStyle('AA' . $numrow)->applyFromArray($style_row);
            }

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $sheet->getDefaultColumnDimension()->setWidth(-1); // Set width kolom A

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Laporan Rekap Jurnal");
        // Proses file excel
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Rekap.xlsx"'); // Set nama file excel nya
        // header('Cache-Control: max-age=0');
        // $writer = new Xlsx($spreadsheet);
        ob_end_clean();

        // ob_start();
        $writer->save('php://output');
        // $content = ob_get_contents();
        // ob_end_clean();
        // die;
        exit();
    }
    public function getData()
    {
        $rekap = $this->M_Keuangan_ijd->SelectRekapLogFar('2023-06-09', '2023-06-09', 'kas_bank_utang');
        foreach ($rekap as $data) {
            $id_jurnal =  $this->db->get_where('detail_hutang_bukti_kas', ['id' => $data->id_jurnal])->row()->id_jurnal;
            if ($id_jurnal != null) {
                $jp = $this->db->get_where('jurnal_pembayaran_farmasi', ['id_jurnal' => $id_jurnal])->row();
                $no_po = $jp->pk;
                $id_vendor = $jp->id_vendor;
                $no_jurnal = $jp->no_jurnal;

                $jf = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal])->row();
                $npb = $jf->no_po;

                $dat_npb = explode(', ', $npb);
                // print_r($dat_npb);
                $akun_pers = array();
                for ($a = 0; $a < count($dat_npb); $a++) {
                    $akun_pers[] = $this->db->get_where('akun_persediaan_farmasi', ['npb' => $dat_npb[$a]])->row();
                }

                // echo '<br>';
                // print_r($akun_pers);
                $no_faktur = implode(', ', array_column($akun_pers, 'no_faktur'));
                $tgl_po = implode(', ', array_column($akun_pers, 'tgl_po'));
                $tgl_faktur = implode(', ', array_column($akun_pers, 'tgl_faktur'));
            } else {

                $no_po = ($data->pk_bukti != 'Jurnal') ? $data->pk_bukti : '-';
                $no_faktur = '-';
            }
            $noJUrnal = $data->no_jurnal;

            $out[] = array($noJUrnal, $data->pk, $no_po, $no_faktur);
        }
        print_arr($out);
    }

    function kembalikan_bk()
    {
        $no = $this->input->post('no');

        $bk = $this->db->get_where('detail_hutang_bukti_kas', ['no_dokumen' => $no])->result();
        $this->M_Kasir->update_tindakan(['save' => 1], ['no_dokumen' => $no], 'bukti_kas');
        foreach ($bk as $row) {
            $this->M_Kasir->update_tindakan(
                ['ket_jurnal' => 0, 'pembayaran' => NULL, 'status_verifikasi' => NULL, 'status_direktur' => null, 'save' => 1],
                ['no_dokumen' => $no],
                'detail_hutang_bukti_kas'
            );
        }
      
        $out['status'] = "success";
        echo json_encode($out);
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Jurnal_farmasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Keuangan_ijd');
        $this->load->model('M_Jurnal_keuangan');
        $this->load->model('M_Kasir');
    }

    // ////////////////////////////////////////Verifikasi Pengadaan Obat //////////////////////////////////////////////////////
    public function Verifikasi_farmasi()
    {
        $this->load->view('assets/_header');
        $page_data['tipe'] = 'persediaan';
        $page_data['page_content'] = 'Jurnal/Verifikasi_farmasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Verifikasi_hutang_farmasi()
    {
        $this->load->view('assets/_header');
        $page_data['tipe'] = 'hutang';
        $page_data['page_content'] = 'Jurnal/Verifikasi_farmasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_verifikasi_farmasi()
    {
        $out = null;
        $db = null;

        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $tipe = $this->input->post('tipe');


        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Keuangan_ijd->Select_akun_persediaan_farmasi($first_date, $second_date, $tipe);
        } else {
            $page_data = $this->M_Keuangan_ijd->Select_akun_persediaan_farmasi('', '', $tipe);
        }

        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);

            $no = $i + 1;
            // $tgl =  strftime("%A, %d %B %Y ", $tgl);
            if ($tipe == "persediaan") {
                $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_akun . "'><label ></label></div>";

                $no_faktur = $page_data[$i]->no_faktur;
                $no_po = $page_data[$i]->no_po;
                $tgl_faktur = date('d-m-Y', strtotime($page_data[$i]->tgl_faktur));
                $tgl_po = date('d-m-Y', strtotime($page_data[$i]->tgl_po));
                $vendor = $page_data[$i]->vendor;
                $jumlah = number_format($page_data[$i]->jumlah, 2, ',', '.');
                $noValid =  sprintf('%04d', $page_data[$i]->index_dok, 'dyhtdyu');
                $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($page_data[$i]->tgl_buat))) . "/" . date("Y", strtotime($page_data[$i]->tgl_buat));

                $out[$i] = array($checkbox, $no, $no_faktur, $no_po, $noDok, $tgl_faktur, $tgl_po, $vendor, $jumlah);
            } else {
                $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->no_jurnal . "'><label ></label></div>";

                $no_jurnal = $page_data[$i]->no_jurnal;
                $no_po = $page_data[$i]->pk;
                $tgl_faktur = date('d-m-Y', strtotime($page_data[$i]->tgl));
                $jumlah = number_format($page_data[$i]->total, 2, ',', '.');
                $des = explode(" - ", $page_data[$i]->des_rek);
                $vendor = $des[1];

                $dat = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal]);
                $akun = $this->db->get_where('akun_persediaan_farmasi', ['no_jurnal' => $no_jurnal]);
                // $npb = isset($npb) ? $npb->pk : '-';
                // $dat = $this->db->query("SELECT d.id_struk, s.index_dok, s.tgl_buat from detail_struk d, struk_logistik s where d.id_struk = s.no_faktur and id_detail_po='$id_detail' and id_logistik = '$id_log'");

                if ($dat->num_rows() > 0) {

                    if ($dat->num_rows() > 1) {
                        $struk = $dat->result_array();
                        $k = array();
                        // var_dump($struk);
                        foreach ($struk as $row) {
                            $k[] = $row['pk'];
                        }

                        $npb = implode(', ', array_unique($k));
                    } else {
                        $npb = $dat->row();
                        $npb = isset($npb) ? $npb->pk : '-';
                    }
                }

                if ($akun->num_rows() > 0) {

                    if ($akun->num_rows() > 1) {
                        $faktur = $akun->result_array();
                        $j = array();
                        // var_dump($struk);
                        foreach ($faktur as $row1) {
                            $j[] = $row1['no_faktur'];
                        }

                        $no_faktur = implode(', ', array_unique($j));
                    } else {
                        $no_faktur = $akun->row();
                        $no_faktur = isset($no_faktur) ? $no_faktur->no_faktur : '-';
                    }
                }


                $out[$i] = array($checkbox, $no, $no_jurnal, $no_po, $no_faktur, $npb, $vendor, $tgl_faktur, $jumlah);
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

    public function setVerifikasi_farmasi()
    {
        $out = null;
        $staff = $this->session->userdata('data_auth');
        $data = $this->input->post('req');
        $tipe = $this->input->post('tipe');
        $tgl_verif = $this->input->post('tgl_verif');


        $id_fk = date('Y-m-d H:i:s');

        for ($j = 0; $j < count($data); $j++) {
            if ($tipe == "persediaan") {
                $db = [
                    'verifikasi' => 1,
                    'tgl_verifikasi' => $tgl_verif,
                    'staff_verifikasi' => $staff->nama,
                ];
                $this->M_Kasir->update_tindakan($db, ['id_akun' => $data[$j]], 'akun_persediaan_farmasi');
            } else {
                $db = [
                    'verifikasi_hutang' => 1,
                    'tgl_verif_hutang' => $tgl_verif,
                    'staff_verif_hutang' => $staff->nama,
                ];
                $this->M_Kasir->update_tindakan($db, ['no_jurnal' => $data[$j]], 'jurnal_pembayaran_farmasi');
            }
        }

        $out['status'] = 'success';
        // }

        echo json_encode($out);
    }


    public function cetak_verifikasi_farmasi()
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $dokter = $this->input->post('dokter');
        $jenis = $this->input->post('jenis');


        $page_data['mulai'] = $first_date;
        $page_data['akhir'] = $second_date;
        $page_data['dokter'] = $this->db->get_where('dokter', ['id_dokter' => $dokter])->row()->nama;
        $page_data['jenis'] = $this->db->get_where('kelompok_jurnal', ['id_kelompok' => $jenis])->row()->nama;
        $page_data['data'] = $this->M_Keuangan_ijd->Select_ijd($dokter, $jenis, $first_date, $second_date, '1');

        $response = $this->load->view('print/cetak_verifikasi_ijd', $page_data, TRUE);
        echo $response;
    }


    // ////////////////////////////////////////JURNAL PERSEDIAAN FARMASI //////////////////////////////////////////////////////
    public function Jurnal_persediaan_farmasi()
    {
        $this->load->view('assets/_header');
        $page_data['tipe'] = 'persediaan';
        $page_data['page_content'] = 'Jurnal/Jurnal_farmasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function Jurnal_hutang_farmasi()
    {
        $this->load->view('assets/_header');
        $page_data['tipe'] = 'hutang';
        $page_data['page_content'] = 'Jurnal/Jurnal_farmasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jurnal_farmasi()
    {
        $out = null;

        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $tipe = $this->input->post('tipe');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Keuangan_ijd->SelectJurnalFarmasi($first_date, $second_date, $tipe);
        } else {
            $page_data = $this->M_Keuangan_ijd->SelectJurnalFarmasi('', '', $tipe);
        }


        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);


            $no = $i + 1;
            // $tgl =  strftime("%A, %d %B %Y ", $tgl);

            if ($tipe == 'persediaan') {
                $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_akun . "'><label ></label></div>";
                $noValid =  sprintf('%04d', $page_data[$i]->index_dok, 'dyhtdyu');
                $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($page_data[$i]->tgl_buat))) . "/" . date("Y", strtotime($page_data[$i]->tgl_buat));

                $golongan_sediaan = $page_data[$i]->desk;
                $no_faktur = $page_data[$i]->no_faktur;
                $vendor = $page_data[$i]->vendor;
                $kode_akun = $page_data[$i]->coa;
                $total_akun = number_format(round($page_data[$i]->total), 2, ',', '.');
                $out[$i] = array($checkbox, $no, $kode_akun, $golongan_sediaan, $vendor, $noDok, $no_faktur, $total_akun);
            } else {
                $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->no_jurnal . "'><label ></label></div>";
                $golonga_sediaan = $page_data[$i]->des_rek;
                $des = explode(" - ", $page_data[$i]->des_rek);
                $vendor = $des[1];
                $kode_akun = $page_data[$i]->rekening;
                $no_jurnal = $page_data[$i]->no_jurnal;
                // $ppn = $page_data[$i]->total * (11 / 100);
                $total_akun = number_format(($page_data[$i]->total), 2, ',', '.');
                $dat = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal]);
                $akun = $this->db->get_where('akun_persediaan_farmasi', ['no_jurnal' => $no_jurnal]);
                // $npb = isset($npb) ? $npb->pk : '-';
                // $dat = $this->db->query("SELECT d.id_struk, s.index_dok, s.tgl_buat from detail_struk d, struk_logistik s where d.id_struk = s.no_faktur and id_detail_po='$id_detail' and id_logistik = '$id_log'");

                if ($dat->num_rows() > 0) {

                    if ($dat->num_rows() > 1) {
                        $struk = $dat->result_array();
                        $k = array();
                        // var_dump($struk);
                        foreach ($struk as $row) {
                            $k[] = $row['pk'];
                        }

                        $npb = implode(', ', array_unique($k));
                    } else {
                        $npb = $dat->row();
                        $npb = isset($npb) ? $npb->pk : '-';
                    }
                }
                if ($akun->num_rows() > 0) {

                    if ($akun->num_rows() > 1) {
                        $faktur = $akun->result_array();
                        $j = array();
                        // var_dump($struk);
                        foreach ($faktur as $row1) {
                            $j[] = $row1['no_faktur'];
                        }

                        $no_faktur = implode(', ', array_unique($j));
                    } else {
                        $no_faktur = $akun->row();
                        $no_faktur = isset($no_faktur) ? $no_faktur->no_faktur : '-';
                    }
                }
                $out[$i] = array($checkbox, $no, $no_jurnal, $kode_akun, $golonga_sediaan, $vendor, $npb, $no_faktur, $total_akun);
            }
            // $total_akun = $page_data[$i]->total;

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

    public function setJurnalFarmasi()
    {
        $staff = $this->session->userdata('data_auth');


        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $tipe = $this->input->post('tipe');
        $tgl = $this->input->post('tgl');

        $data = $this->input->post('req');
        $id_fk = implode("", [uniqid(), $staff->username]);


        if ($tipe == 'persediaan') {
            for ($i = 0; $i < count($data); $i++) {
                $a[] = $this->db->query("SELECT vendor from akun_persediaan_farmasi where id_akun = '$data[$i]'")->row();
            }
        } else {
            for ($i = 0; $i < count($data); $i++) {
                $a[] = $this->db->query("SELECT id_vendor vendor from jurnal_pembayaran_farmasi where no_jurnal = '$data[$i]'")->row();
            }
        }

        $count_bank = array_count_values(array_column($a, 'vendor'));

        // if (count($count_bank) > 1) {
        //     $out['status'] = 'error';
        //     $out['message'] = 'Jurnal hanya dilakukan dengan vendor yang sama';
        // } else {
        if ($tipe == 'persediaan') {
            for ($g = 0; $g < count($data); $g++) {
                $this->M_Kasir->update_tindakan(['kode_check' => $id_fk], ['id_akun' => $data[$g]], 'akun_persediaan_farmasi');
            }
        } else {
            for ($g = 0; $g < count($data); $g++) {
                $this->M_Kasir->update_tindakan(['kode_check' => $id_fk], ['no_jurnal' => $data[$g]], 'jurnal_pembayaran_farmasi');
            }
        }
        $page_data1 = $this->M_Keuangan_ijd->SetJurnalFarmasi($id_fk, $tipe);

        for ($h = 0; $h < count($page_data1); $h++) {
            if ($tipe == 'persediaan') {

                $page_data = $this->M_Keuangan_ijd->SelectJurnalFarmasiByNopo($id_fk, $tipe, $page_data1[$h]->no_po);


                $kode = '306';
                $maxR = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl)->max;
                $noValidR =  sprintf('%04d', $maxR + 1, 'dyhtdyu');
                $noDokR = $noValidR . "/" . "GL-306" . "/" . date('my', strtotime($tgl));

                for ($i = 0; $i < count($page_data); $i++) {

                    $golongan_sediaan = $page_data[$i]->golongan_sediaan;
                    $vendor = $page_data[$i]->id_produsen;
                    $no_po = $page_data[$i]->no_po;
                    $no_faktur = $page_data[$i]->id_struk;
                    $struk = $this->db->get_where('struk_logistik', ['no_faktur' => $no_faktur, 'ket' => 0])->row();
                    $noValid =  sprintf('%04d', $struk->index_dok, 'dyhtdyu');
                    $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($struk->tgl_buat))) . "/" . date("Y", strtotime($struk->tgl_buat));


                    // $list_coa = $this->db->get_where('list_coa', ['nama' => $golongan_sediaan])->row();
                    $arr = explode(".", $page_data[$i]->coa);
                    $desk = $page_data[$i]->desk;
                    $rek = $page_data[$i]->coa;
                    $total_akun = round($page_data[$i]->total);




                    $jurnal_1 = [
                        'id_fk' => $id_fk,
                        'jk' => '15',
                        'rekening' => $rek,
                        'deskripsi' => $desk,
                        'no_jurnal' => $noDokR,
                        'kredit' => 0,
                        'debet' => $total_akun,
                        'lap' => '01',
                        'jb' => '',
                        'cj' => '101',
                        'pk' => $noDok,
                        'tgl' => $tgl,
                        'des_rek' => $desk,
                        'staff' => $staff->nama,
                        'no_po' => $no_po,
                        'id_vendor' => $vendor,
                        'jenis_jurnal' => $tipe,

                    ];
                    $this->M_Kasir->insert_tindakan($jurnal_1, 'jurnal_farmasi');

                    $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDokR], ['no_faktur' => $page_data[$i]->no_faktur, 'tipe_akun' => $tipe], 'akun_persediaan_farmasi');

                    $dokumen = ['no_dokumen' => $noDokR, 'no_index' => $maxR + 1, 'kode' => $kode, 'tgl' => $tgl, 'staff' => $staff->nama];
                    $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');
                }
            } else {
                $des = explode(" - ", $page_data1[$h]->des_rek);
                $vendor = $des[1];
                // $dbvendor1 = $this->db->get_where('produsen', ['nama_produsen' => $vendor])->row();

                $kode = '305';
                $maxR = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl)->max;
                $noValidR =  sprintf('%04d', $maxR + 1, 'dyhtdyu');
                $noDokR = $noValidR . "/" . "GL-305" . "/" . date('my', strtotime($tgl));

                $ppn = round($page_data1[$h]->total * (11 / 100));
                $total_akun = round($page_data1[$h]->total);
                $dat = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $page_data1[$h]->no_jurnal]);
                // $npb = isset($npb) ? $npb->pk : '-';
                // $dat = $this->db->query("SELECT f.*  FROM jurnal_pembayaran_farmasi j, jurnal_farmasi f 
                // WHERE j.no_jurnal = f.no_jurnal and j.kode_check = '$id_fk'");

                if ($dat->num_rows() > 0) {

                    if ($dat->num_rows() > 1) {
                        $struk = $dat->result_array();
                        $k = array();
                        // var_dump($struk);
                        foreach ($struk as $row) {
                            $k[] = $row['pk'];
                        }

                        $npb = implode(', ', array_unique($k));
                    } else {
                        $npb = $dat->row();
                        $npb = isset($npb) ? $npb->pk : '-';
                    }
                }

                $jurnal_1 = [
                    'id_fk' => $page_data1[$h]->kode_check,
                    'jk' => '15',
                    'rekening' => '412.02.000',
                    'deskripsi' => $page_data1[$h]->des_rek,
                    'no_jurnal' => $noDokR,
                    'kredit' => 0,
                    'debet' => $total_akun,
                    'lap' => '01',
                    'jb' => '',
                    'cj' => '101',
                    'pk' => $page_data1[$h]->pk,
                    'tgl' => $tgl,
                    'des_rek' => $page_data1[$h]->des_rek,
                    'staff' => $staff->nama,
                    'no_po' => $npb,
                    'id_vendor' => $page_data1[$h]->id_vendor,
                    'jenis_jurnal' => $tipe,

                ];
                $jurnalppn = [

                    'id_fk' => $page_data1[$h]->kode_check,
                    'jk' => '15',
                    'rekening' => '111.01.000',
                    'deskripsi' => 'PPN Masukan',
                    'no_jurnal' => $noDokR,
                    'kredit' => 0,
                    'debet' => $ppn,
                    'lap' => '01',
                    'jb' => '',
                    'cj' => '101',
                    'pk' =>  $page_data1[$h]->pk,
                    'tgl' => $tgl,
                    'des_rek' => 'PPN Masukan',
                    'staff' => $staff->nama,
                    'no_po' => $npb,
                    'id_vendor' => $page_data1[$h]->id_vendor,
                    'jenis_jurnal' => $tipe,

                ];
                $this->M_Kasir->insert_tindakan($jurnal_1, 'jurnal_farmasi');
                $this->M_Kasir->insert_tindakan($jurnalppn, 'jurnal_farmasi');


                $dokumen = ['no_dokumen' => $noDokR, 'no_index' => $maxR + 1, 'kode' => $kode, 'tgl' => $tgl, 'staff' => $staff->nama];
                $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');

                $db_ju = $this->M_Keuangan_ijd->SelectJurnalFarmasiByNopo($id_fk, $tipe, "");
                foreach ($db_ju as $row) {
                    $update_db = [
                        'ket_jurnal' => 1,
                    ];
                    $this->M_Kasir->update_tindakan($update_db, ['id_jurnal' => $row->id_jurnal], 'jurnal_pembayaran_farmasi');
                }
            }
        }



        $db_jurnal = $this->M_Keuangan_ijd->selectJurnalPembayaranFarmasi($tipe);

        // var_dump($db_jurnal);
        for ($m = 0; $m < count($db_jurnal); $m++) {
            $dbvendor = $this->db->get_where('produsen', ['kode' => $db_jurnal[$m]->id_vendor])->row();
            if ($tipe == 'persediaan') {
                $total_akun1 = round($db_jurnal[$m]->total);
                $desk = 'BYMHD - ' . $dbvendor->nama_produsen;
                $rek = '412.02.000';
                $jurnal_2 = [

                    'id_fk' => $db_jurnal[$m]->id_fk,
                    'jk' => '15',
                    'rekening' => $rek,
                    'deskripsi' => $desk,
                    'no_jurnal' => $db_jurnal[$m]->no_jurnal,
                    'kredit' => round($db_jurnal[$m]->total),
                    'debet' => 0,
                    'lap' => '01',
                    'jb' => '',
                    'cj' => '101',
                    'pk' =>  $db_jurnal[$m]->no_po,
                    'tgl' => $tgl,
                    'des_rek' => $desk,
                    'staff' => $staff->nama,
                    'id_vendor' => $db_jurnal[$m]->id_vendor,
                    'jenis_jurnal' => $tipe,

                ];
            } else {

                $total_akun1 = round($db_jurnal[$m]->total / 1.11);
                $desk = 'Hutang Usaha - ' . $dbvendor->nama_produsen;
                $rek = '401.01.000';
                $jurnal_2 = [

                    'id_fk' => $db_jurnal[$m]->id_fk,
                    'jk' => '15',
                    'rekening' => $rek,
                    'deskripsi' => $desk,
                    'no_jurnal' => $db_jurnal[$m]->no_jurnal,
                    'kredit' => round($db_jurnal[$m]->total),
                    'debet' => 0,
                    'lap' => '01',
                    'jb' => '',
                    'cj' => '101',
                    'pk' =>  $db_jurnal[$m]->pk,
                    'tgl' => $tgl,
                    'des_rek' => $desk,
                    'staff' => $staff->nama,
                    'id_vendor' => $db_jurnal[$m]->id_vendor,
                    'jenis_jurnal' => $tipe,

                ];
            }


            $this->M_Kasir->insert_tindakan($jurnal_2, 'jurnal_pembayaran_farmasi');
            $this->M_Kasir->update_tindakan(['status' => 1], ['id_fk' => $db_jurnal[$m]->id_fk], 'jurnal_farmasi');
        }




        $out['status'] = 'success';
        // }
        echo json_encode($out);
    }
    ///////////////////////ACC JURNAL////////////////////////////
    public function Jurnal_farmasi_verifikasi($tipe)
    {
        $this->load->view('assets/_header');
        $page_data['judul'] = strtoupper($tipe) . ' FARMASI';
        $page_data['tipe'] = $tipe;
        $page_data['page_content'] = 'Jurnal/Jurnal_farmasi_verifikasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jurnal_farmasi_verifikasi()
    {
        $out = null;
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $tipe = $this->input->post('tipe');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Keuangan_ijd->SelectJurnalFarmasiVerifikasi($mulai, $akhir, $tipe);
        } else {
            $page_data = $this->M_Keuangan_ijd->SelectJurnalFarmasiVerifikasi('', '', $tipe);
        }

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tgl = indo_date2($page_data[$i]->tgl);

            $no_jurnal = $page_data[$i]->no_jurnal;

            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $pk = $page_data[$i]->pk;
            // $total = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            if ($page_data[$i]->status == null) {
                $verif = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>VERIFIKASI</button>";
            } elseif ($page_data[$i]->status == 'DITERIMA') {
                $verif = '<span class="label label-success">' . $page_data[$i]->status . '</span>';
            } elseif ($page_data[$i]->status == 'DITOLAK') {
                $verif = '<span class="label label-danger">' . $page_data[$i]->status . '</span>';
            }
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='setJurnal(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\",\"" .  $pk . "\",\"" .  $tipe . "\")' '><i class='icon-printer '></i></button>";

            if ($tipe == 'persediaan') {
                $dat = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal]);
                // $npb = isset($npb) ? $npb->pk : '-';
                // $dat = $this->db->query("SELECT d.id_struk, s.index_dok, s.tgl_buat from detail_struk d, struk_logistik s where d.id_struk = s.no_faktur and id_detail_po='$id_detail' and id_logistik = '$id_log'");

                if ($dat->num_rows() > 0) {

                    if ($dat->num_rows() > 1) {
                        $struk = $dat->result_array();
                        $k = array();
                        // var_dump($struk);
                        foreach ($struk as $row) {
                            $k[] = $row['pk'];
                        }

                        $npb = implode(', ', array_unique($k));
                    } else {
                        $npb = $dat->row();
                        $npb = isset($npb) ? $npb->pk : '-';
                    }
                }
            } else {
                $id_fk = $page_data[$i]->id_fk;

                $dat = $this->db->query("SELECT b.*
                from jurnal_pembayaran_farmasi a, jurnal_farmasi b
                where a.kode_check ='$id_fk' and a.pk='$pk' and b.no_jurnal = a.no_jurnal");
                // $npb = isset($npb) ? $npb->pk : '-';
                // $dat = $this->db->query("SELECT d.id_struk, s.index_dok, s.tgl_buat from detail_struk d, struk_logistik s where d.id_struk = s.no_faktur and id_detail_po='$id_detail' and id_logistik = '$id_log'");

                if ($dat->num_rows() > 0) {

                    if ($dat->num_rows() > 1) {
                        $struk = $dat->result_array();
                        $k = array();
                        // var_dump($struk);
                        foreach ($struk as $row) {
                            $k[] = $row['pk'];
                        }

                        $npb = implode(', ', array_unique($k));
                    } else {
                        $npb = $dat->row();
                        $npb = isset($npb) ? $npb->pk : '-';
                    }
                }

                $jf = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal])->row();
                if ($jf->no_po != null) {
                    $npb = $jf->no_po;
                } else {
                    $npb = $npb;
                }
            }


            $out[$i] = array($no, $verif, $cetak, $tgl, $no_jurnal, $pk, $npb, $staff);
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
    public function acc_jurnal_farmasi()
    {
        $data_staff = $this->session->userdata('data_auth');
        $tipe = $this->input->post('tipe');
        $noDok = $this->input->post('id_jurnal');

        $kode = explode('/', $noDok);
        if ($this->input->post('acc') == 'DITOLAK') {
            if ($kode[1] == 'GL-306') {
                $data_akun = [
                    'status' => 0,
                    'verifikasi' => 0,
                    'no_jurnal' => NULL,
                ];
                $this->M_Kasir->update_tindakan($data_akun, ['no_jurnal' => $noDok], 'akun_persediaan_farmasi');
                $data = [
                    'staff_verif' => $data_staff->nama,
                    'tgl_verif' => date('Y-m-d H:i:s'),
                    'keterangan' => $this->input->post('ket'),
                    'status' => $this->input->post('acc'),
                ];
    
                $this->M_Kasir->update_tindakan($data, ['no_jurnal' => $noDok], 'jurnal_pembayaran_farmasi');
            } else {
                $dat = $this->db->query("SELECT a.*
                from jurnal_pembayaran_farmasi a,  jurnal_pembayaran_farmasi b
                where a.kode_check =b.id_fk and a.pk=b.pk and b.no_jurnal ='$noDok'")->row();
                $update_db = [
                    'verifikasi_hutang' => 0,
                    'ket_jurnal' => 0,
                ];
                $this->M_Kasir->update_tindakan($update_db, ['id_jurnal' => $dat->id_jurnal], 'jurnal_pembayaran_farmasi');
                $this->M_Kasir->update_tindakan(['status' => 'DITOLAK'], ['no_jurnal' => $noDok], 'jurnal_pembayaran_farmasi');
            }
        } else {
            $data = [
                'staff_verif' => $data_staff->nama,
                'tgl_verif' => date('Y-m-d H:i:s'),
                'keterangan' => $this->input->post('ket'),
                'status' => $this->input->post('acc'),
            ];

            $this->M_Kasir->update_tindakan($data, ['no_jurnal' => $noDok], 'jurnal_pembayaran_farmasi');
        }
        $out['status'] = "success";

        echo json_encode($out);
    }

    ////////////////PELACAKAN NPB FARMASI
    public function pelacakan_npb()
    {
        $this->load->view('assets/_header');
        $page_data['judul'] = 'PELACAKAN FARMASI';
        $page_data['page_content'] = 'Jurnal/Pelacakan_npb';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_pelacakan()
    {
        $out = null;
        $db = null;

        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $tipe = $this->input->post('tipe');


        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Keuangan_ijd->Select_pelacakan($first_date, $second_date);
        } else {
            $page_data = $this->M_Keuangan_ijd->Select_pelacakan('', '');
        }

        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);

            $no = $i + 1;
            $no_faktur = $page_data[$i]->no_faktur;
            $no_po = $page_data[$i]->no_po;
            $tgl_buat = indo_date2($page_data[$i]->tgl_buat);
            $tgl_faktur = date('d-m-Y', strtotime($page_data[$i]->tgl_faktur));
            $tgl_po = date('d-m-Y', strtotime($page_data[$i]->tgl_po));
            $vendor = $page_data[$i]->vendor;
            $jumlah = number_format($page_data[$i]->jumlah, 2, ',', '.');
            $noValid =  sprintf('%04d', $page_data[$i]->index_dok, 'dyhtdyu');
            $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($page_data[$i]->tgl_buat))) . "/" . date("Y", strtotime($page_data[$i]->tgl_buat));
            $verifikasi = ($page_data[$i]->verifikasi == 1) ? '<i class="fa fa-check" style="color:green;font-size:20px;"></i>' : '<i class="fa fa-close" style="color:red;font-size:20px;"></i>';
            $jurnal_persediaan = ($page_data[$i]->status == 1) ? '<i class="fa fa-check" style="color:green;font-size:20px;"></i>' : '<i class="fa fa-close" style="color:red;font-size:20px;"></i>';
            $verif_jurnal_persediaan = ($page_data[$i]->status_jurnal == 'DITERIMA') ? '<i class="fa fa-check" style="color:green;font-size:20px;"></i>' : '<i class="fa fa-close" style="color:red;font-size:20px;"></i>';
            $verif_utang = ($page_data[$i]->verifikasi_hutang == 1) ? '<i class="fa fa-check" style="color:green;font-size:20px;"></i>' : '<i class="fa fa-close" style="color:red;font-size:20px;"></i>';
            $jurnal_utang = ($page_data[$i]->jurnal_utang == 1) ? '<i class="fa fa-check" style="color:green;font-size:20px;"></i>' : '<i class="fa fa-close" style="color:red;font-size:20px;"></i>';

            $id_fk = $page_data[$i]->kode_check;

            $dat = $this->M_Keuangan_ijd->getNpb_pelacakan($noDok);
            $verif_jurnal_utang = ($dat > 0) ? '<i class="fa fa-check" style="color:green;font-size:20px;"></i>' : '<i class="fa fa-close" style="color:red;font-size:20px;"></i>';
            $dat_1 = $this->M_Keuangan_ijd->getBuktiKas_pelacakan($noDok);
            $bukti_kas = ($dat_1 == 1) ? '<i class="fa fa-check" style="color:green;font-size:20px;"></i>' : '<i class="fa fa-close" style="color:red;font-size:20px;"></i>';


            $out[$i] = array($no, $noDok, $tgl_buat, $verifikasi, $jurnal_persediaan, $verif_jurnal_persediaan, $verif_utang, $jurnal_utang, $verif_jurnal_utang, $bukti_kas);
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

    ///////////////////////////////////////////////////////////////
    public function Laporan_jurnal_farmasi($tipe)
    {
        $this->load->view('assets/_header');
        $page_data['tipe'] = $tipe;
        $page_data['page_content'] = 'Jurnal/Laporan_jurnal_farmasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_laporan_jurnal_farmasi()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $tipe = $this->input->post('tipe');


        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Keuangan_ijd->SelectLaporanJurnalFarmasi($first_date, $second_date, $tipe);
        } else {
            $page_data = $this->M_Keuangan_ijd->SelectLaporanJurnalFarmasi('', '', $tipe);
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;


            $no_jurnal = $page_data[$i]->no_jurnal;
            $total = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $pk = $page_data[$i]->pk;
            $des = explode(" - ", $page_data[$i]->des_rek);
            $vendor = $des[1];
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='setJurnal(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\",\"" .  $pk . "\",\"" .  $tipe . "\")' '><i class='icon-printer '></i></button>";

            $id_fk = $page_data[$i]->id_fk;

            $dat = $this->db->query("select b.*
            from jurnal_pembayaran_farmasi a, jurnal_farmasi b
            where a.kode_check ='$id_fk' and a.pk='$pk' and b.no_jurnal = a.no_jurnal");
            // $npb = isset($npb) ? $npb->pk : '-';
            // $dat = $this->db->query("SELECT d.id_struk, s.index_dok, s.tgl_buat from detail_struk d, struk_logistik s where d.id_struk = s.no_faktur and id_detail_po='$id_detail' and id_logistik = '$id_log'");

            if ($dat->num_rows() > 0) {

                if ($dat->num_rows() > 1) {
                    $struk = $dat->result_array();
                    $k = array();
                    // var_dump($struk);
                    foreach ($struk as $row) {
                        $k[] = $row['pk'];
                    }

                    $npb = implode(', ', array_unique($k));
                } else {
                    $npb = $dat->row();
                    $npb = isset($npb) ? $npb->pk : '-';
                }
            }

            $out[$i] = array($no, $cetak, $tgl, $no_jurnal, $pk, $npb, $vendor, $total, $staff);
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

    public function cetak_jurnal_farmasi()
    {
        $tipe = $this->input->post('tipe');
        $id_fk = $this->input->post('id_fk');
        $no_jurnal = $this->input->post('no_jurnal');
        $page_data['tgl'] = $this->input->post('tgl');
        $page_data['staff'] = $this->input->post('staff');
        $page_data['jk'] = $this->input->post('jk');
        $page_data['tipe'] = $tipe;
        $page_data['no_po'] = $id_fk;
        $page_data['no_jurnal'] = $this->input->post('no_jurnal');
        $page_data['judul'] = 'JURNAL ' . strtoupper($tipe) . ' FARMASI';
        $page_data['data'] = $this->M_Keuangan_ijd->getJurnalFarmasi($id_fk, $no_jurnal, $tipe);
        $db = $this->db->get_where('jurnal_pembayaran_farmasi', ['no_jurnal' => $no_jurnal])->row();
        $page_data['staff_verifikasi'] = ($db->status == 'DITERIMA') ? $db->staff_verif : '';

        $response = $this->load->view('jurnal_print/cetak_jurnal_farmasi', $page_data, TRUE);
        echo $response;
    }

    /////////////////BUKTI KAS//////////////////////
    public function Bukti_kas()
    {
        $this->load->view('assets/_header');
        $tgl = date('Y-m');
        $max = $this->db->query("SELECT max(indeks) max from bukti_kas where tgl like '$tgl%'")->row();
        // $i = 0;
        $page_data = array('max' =>  $max->max + 1,);
        $page_data['judul'] = "BUKTI KAS";
        $page_data['pelayanan'] = $this->db->get('daftar_akun')->result_array();
        $page_data['data_cj'] = $this->db->get('akun_cj')->result_array();

        $page_data['page_content'] = 'Jurnal/Bukti_kas_hutang';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function getNoDokumen()
    {
        $date = $this->input->post('tanggal');
        $tgl = date('Y-m', strtotime($date));
        $max = $this->db->query("SELECT max(indeks) max from bukti_kas where tgl like '$tgl%'")->row();

        $noValidR =  sprintf('%04d', $max->max + 1, 'dyhtdyu');
        $noDokR = $noValidR . "/" . "BP" . "/" . date('my', strtotime($date));
        echo json_encode($noDokR);
    }
    public function tampil_bukti_kas()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');


        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Keuangan_ijd->SelectBuktiKas($first_date, $second_date);
        } else {
            $page_data = $this->M_Keuangan_ijd->SelectBuktiKas('', '');
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;

            if ($page_data[$i]->tipe == 'UTANG') {
                $dbvendor = $this->db->get_where('produsen', ['kode' => $page_data[$i]->vendor])->row();

                $no_jurnal = isset($dbvendor) ? $dbvendor->nama_produsen : $page_data[$i]->vendor;
            } else {
                $no_jurnal = $page_data[$i]->vendor;
            }

            $total = number_format($page_data[$i]->total - $page_data[$i]->kredit, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            // $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_dokumen . "\")' '><i class='icon-printer '></i></button>";
            if ($page_data[$i]->save == 1) {
                $tombol = "<button title='Menyimpan BK' class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='verifikasi(\"" . $page_data[$i]->no_dokumen . "\",\"" . "2" . "\",\"" . "staff" . "\")' '><i class='fa fa-check '></i></button>
            <button title='Batal BK' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='verifikasi(\"" . $page_data[$i]->no_dokumen . "\",\"" . "99" . "\",\"" . "staff" . "\")' '><i class='fa fa-close '></i></button>";

                $pilih =  "<a title='Tambah isi bukti kas' class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='bukti_kas(\"" . $page_data[$i]->no_dokumen .  "\")'><i class='icon-note'></i></a>";
                $kembali = "";
            } else if ($page_data[$i]->save == 2) {
                $tombol = '<span class="label label-success">TERSIMPAN</span>';
                $pilih =  "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_dokumen . "\")' '><i class='icon-printer '></i></button>";
                $kembali = "<button title='Kembalikan BK' class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'  onclick='kembalikan_bk(\"" . $page_data[$i]->no_dokumen . "\")' '><i class='icon-action-undo'></i></button>";
            } else if ($page_data[$i]->save == 99) {
                $tombol = '<span class="label label-danger">BATAL</span>';
                $pilih =  "";
                $kembali = "";
            } else if ($page_data[$i]->save == 3) {
                $tombol = '<span class="label label-danger">JURNAL DITOLAK</span>';
                // $pilih =  "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_dokumen . "\")' '><i class='icon-printer '></i></button>";
                $pilih =  "";
                $kembali = "";
            }

            if ($page_data[$i]->status_direktur == 'DISETUJUI') {
                $direktur = '<span class="label label-success">' . $page_data[$i]->status_direktur . '</span>';
            } elseif ($page_data[$i]->status_direktur == 'DITOLAK') {
                $direktur = '<span class="label label-danger">' . $page_data[$i]->status_direktur . '</span>';
            } else {
                if ($page_data[$i]->save == 2) {
                    $direktur = '<span class="label label-warning">Menunggu Verifikasi</span>';
                } else {
                    $direktur = '';
                }
            }


            if ($page_data[$i]->status_verifikasi == 'DISETUJUI') {
                $chief = '<span class="label label-success">' . $page_data[$i]->status_verifikasi . '</span>';
            } elseif ($page_data[$i]->status_verifikasi == 'DITOLAK') {
                $chief = '<span class="label label-danger">' . $page_data[$i]->status_verifikasi . '</span>';
            } else {
                if ($page_data[$i]->save == 2) {
                    $chief = '<span class="label label-warning">Menunggu Verifikasi</span>';
                } else {
                    $chief = '';
                }
            }
            $no_dokumen = $page_data[$i]->no_dokumen;
            $tipe = $page_data[$i]->tipe;


            $out[$i] = array($no, $tombol, $pilih, $tgl, $no_jurnal, $total, $no_dokumen, $tipe, $staff, $direktur, $chief, $kembali);
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
    function getUangMuka()
    {
        $data = $this->db->query("SELECT b.no_dokumen,b.vendor,(sum(d.debet) - sum(d.kredit)) total
        from bukti_kas b, detail_hutang_bukti_kas d
        where d.no_dokumen = b.no_dokumen and b.tipe = 'UANG MUKA' and d.save =2 and d.pembayaran is not null 
        and b.no_dokumen not in (SELECT pk from detail_hutang_bukti_kas where tipe ='PERTANGGUNG JAWABAN' and status_verifikasi !='DITOLAK' and save !=3)
        group by b.no_dokumen,b.vendor
        order by vendor asc")->result();

        echo json_encode($data);
    }
    function getVendor_buktiKas()
    {
        $data = $this->db->query("SELECT id_vendor, SUBSTRING_INDEX(des_rek, ' - ',-1) vendor
        from jurnal_pembayaran_farmasi
        where jenis_jurnal = 'hutang' and status='DITERIMA' and ket_jurnal = 0 group by id_vendor
        order by vendor asc")->result();

        echo json_encode($data);
    }

    function tampil_vendor_bukti_kas()
    {
        $id_vendor = $this->input->post('idFaktur');
        $page_data = $this->db->query("SELECT j.*,IFNULL(d.total,0) total
        from jurnal_pembayaran_farmasi j
        left join (SELECT sum(debet) total, id_jurnal , save
                 from detail_hutang_bukti_kas 
                 where (save != 99 and save !=3) and status_verifikasi !='DITOLAK' 
                 group by id_jurnal
                 ) d on j.id_jurnal= d.id_jurnal
        where j.jenis_jurnal = 'hutang' and j.status='DITERIMA' and j.ket_jurnal = 0 
        and j.id_vendor = '$id_vendor'
        having (kredit-total) != 0
        ")->result();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;

            $des = explode(" - ", $page_data[$i]->des_rek);
            $vendor = $des[1];
            $id_vendor = $page_data[$i]->id_vendor;

            $no_jurnal = $page_data[$i]->no_jurnal;
            $tgl = indo_date2($page_data[$i]->tgl);
            $nilai = number_format($page_data[$i]->kredit, 2, ',', '.');
            $total = number_format($page_data[$i]->total, 2, ',', '.');
            $nilai1 = round(($page_data[$i]->kredit - $page_data[$i]->total), 2);
            $pk = $page_data[$i]->pk;
            $id_fk = $page_data[$i]->id_fk;

            // $dat = $this->db->query("select b.*
            //     from jurnal_pembayaran_farmasi a, jurnal_farmasi b
            //     where a.kode_check ='$id_fk' and a.pk='$pk' and b.no_jurnal = a.no_jurnal");
            // // $npb = isset($npb) ? $npb->pk : '-';
            // // $dat = $this->db->query("SELECT d.id_struk, s.index_dok, s.tgl_buat from detail_struk d, struk_logistik s where d.id_struk = s.no_faktur and id_detail_po='$id_detail' and id_logistik = '$id_log'");

            // if ($dat->num_rows() > 0) {

            //     if ($dat->num_rows() > 1) {
            //         $struk = $dat->result_array();
            //         $k = array();
            //         $j = array();
            //         // var_dump($struk);
            //         foreach ($struk as $row) {
            //             $k[] = $row['pk'];
            //             $akun = $this->db->get_where('akun_persediaan_farmasi', ['npb' => $row['pk']])->row();
            //             if (!empty($akun)) {
            //                 $j[] = $akun->no_faktur;
            //             } else {
            //                 $j[] = '-';
            //             }
            //         }

            //         $npb = implode(', ', array_unique($k));

            //         $no_faktur = implode(', ', array_unique($j));
            //     } else {
            //         $npb = $dat->row();
            //         // $npb = isset($npb) ? $npb->pk : '-';
            //         if (isset($npb)) {
            //             $npb = $npb->pk;
            //             $akun = $this->db->get_where('akun_persediaan_farmasi', ['npb' => $npb])->row();

            //             $no_faktur = isset($akun->no_faktur) ? $akun->no_faktur : '-';
            //         } else {
            //             $npb = '-';
            //             $no_faktur = '-';
            //         }
            //     }
            // } else {
            //     $npb = '-';
            //     $no_faktur = '-';
            // }
            $jf = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $page_data[$i]->no_jurnal])->row();
            if (!empty($jf) && $jf->no_po != null) {
                $npb = $jf->no_po;
                $akun = $this->db->get_where('akun_persediaan_farmasi', ['npb' => $npb])->row();
                $no_faktur = isset($akun->no_faktur) ? $akun->no_faktur : '-';
            } else {
                $npb = '-';
                $no_faktur = '-';
            }

            $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_jurnal . "'><label ></label></div>";
            $pilih =  "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_list_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $nilai1 . "\",\"" . $vendor .  "\")'><i class='icon-note'></i></a>";

            $out[$i] = array($pilih, $no_jurnal, $tgl, $pk, $npb, $no_faktur, $vendor, $id_vendor, $nilai, $total);
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
    public function insertdetail_buktikas()
    {
        $idFaktur = $this->input->post('idFaktur');
        $harga = $this->input->post('harga');
        $tgl = $this->input->post('tgl');
        $data_staff = $this->session->userdata('data_auth');
        $max = $this->input->post('max');
        $noDokR = $this->input->post('no_dok');
        $vendor = $this->input->post('vendor');
        $cj = $this->input->post('cj');
        $jurnal = $this->db->get_where('jurnal_pembayaran_farmasi', ['id_jurnal' => $idFaktur])->row();


        $data = array(
            'id_jurnal' => $idFaktur,
            'indeks' => $max,
            'no_dokumen' => $noDokR,
            'akun' => "401.01.000",
            'debet' => $harga,
            'cj' => $cj,
            'staff' => $data_staff->nama,
            'pk' => $jurnal->pk,
        );
        $this->M_Kasir->insert_tindakan($data, 'detail_hutang_bukti_kas');

        $db = $this->db->query("SELECT j.kredit,IFNULL(d.total,0) total
        from jurnal_pembayaran_farmasi j
        left join (SELECT sum(debet) total, id_jurnal 
                 from detail_hutang_bukti_kas 
                 group by id_jurnal
                 ) d on j.id_jurnal= d.id_jurnal
        where j.id_jurnal = '$idFaktur'")->row_array();
        if (round($db['kredit'] - $db['total']) == 0) {
            $this->M_Kasir->update_tindakan(['ket_jurnal' => 1], ['id_jurnal' => $idFaktur], 'jurnal_pembayaran_farmasi');
        }


        $out['status'] = "success";
        echo json_encode($out);
    }

    public function batal_buktikas()
    {
        $noDokR = $this->input->post('no_dok');
        $db = $this->M_Keuangan_ijd->getBuktiKas($noDokR);
        // if ($status == 99) {
        foreach ($db as $row) {
            if ($row->ket_jurnal == 1) {
                $this->M_Kasir->update_tindakan(['ket_jurnal' => 0], ['id_jurnal' => $row->id_jurnal], 'jurnal_pembayaran_farmasi');
            }
        }
        // } 

        $this->M_Kasir->delete_tindakan(['no_dokumen' => $noDokR, 'save' => '0'], 'detail_hutang_bukti_kas');
    }

    public function tampil_total_bukti_kas()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->db->query("SELECT sum(debet) total,sum(kredit) kredit from detail_hutang_bukti_kas where no_dokumen = '$idFaktur' group by no_dokumen")->result();
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $id_detail  = "Rp. " . number_format($page_data[$i]->total - $page_data[$i]->kredit, 0, ',', '.');
            $out[$i] = array($id_detail);
        }
        if ($out == null) {
            echo '{"data":"0"}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function simpan_bukti()
    {
        $data_staff = $this->session->userdata('data_auth');
        $tipe = $this->input->post('tipe');
        $no_dok = $this->input->post('no_dok');
        $max = $this->input->post('max');
        $vendor = $this->input->post('vendor');
        $tgl_faktur = $this->input->post('tgl_faktur');
        $pk = $this->input->post('pk');
        $dbvendor = $this->db->get_where('produsen', ['kode' => $vendor])->row();
        $data_bukti = [
            'indeks' => $max,
            'no_dokumen' => $no_dok,
            'staff' => $data_staff->nama,
            'tgl' => $tgl_faktur,
            'vendor' => $vendor,
            'tipe' => $tipe,
            'save' => 1,
        ];
        $this->M_Kasir->insert_tindakan($data_bukti, 'bukti_kas');

        if ($tipe == 'UTANG') {
            $data = array(
                'tgl' => $tgl_faktur,
                'vendor' => $vendor,
                'tipe' => $tipe,
                'deskripsi' => "Pembayaran Utang " . $dbvendor->nama_produsen,
                'des_rek' => "Pembayaran Utang " . $dbvendor->nama_produsen,
                'save' => 1,
            );

            $this->M_Kasir->update_tindakan($data, ['no_dokumen' => $no_dok], 'detail_hutang_bukti_kas');
        } else if ($tipe == 'PERTANGGUNG JAWABAN') {
            $db_bk = $this->db->get_where('detail_hutang_bukti_kas', ['no_dokumen' => $pk, 'akun !=' => ''])->row();
            $data = [
                'indeks' => $max,
                'no_dokumen' => $no_dok,
                'akun' => $db_bk->akun,
                'kredit' => $db_bk->debet,
                'debet' => $db_bk->kredit,
                'cj' => $db_bk->cj,
                'staff' => $data_staff->nama,
                'pk' => $pk,
                'tgl' => $tgl_faktur,
                'vendor' => $vendor,
                'tipe' => $tipe,
                'deskripsi' => $db_bk->deskripsi,
                'des_rek' => $db_bk->deskripsi,
                'save' => 1,
            ];
            $this->M_Kasir->insert_tindakan($data, 'detail_hutang_bukti_kas');
        } else {
            $data = [
                'indeks' => $max,
                'no_dokumen' => $no_dok,
                'akun' => '',
                'kredit' => 0,
                'debet' => 0,
                'staff' => $data_staff->nama,
                'pk' => '',
                'tgl' => $tgl_faktur,
                'vendor' => $vendor,
                'tipe' => $tipe,
                'deskripsi' => '',
                'save' => 1,
            ];
            $this->M_Kasir->insert_tindakan($data, 'detail_hutang_bukti_kas');
        }


        $out['status'] = "success";
        echo json_encode($out);
    }

    public function cetak_bukti_kas()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $page_data['no_dokumen'] = $no_jurnal;
        $page_data['data'] = $this->M_Keuangan_ijd->getBuktiKas($no_jurnal);
        $dbjurnal = $this->db->query("SELECT sum(debet) total,sum(kredit) kredit, vendor,staff,staff_verifikasi,pembayaran
        from detail_hutang_bukti_kas where no_dokumen = '$no_jurnal' group by no_dokumen")->row();
        $page_data['jurnal'] = $dbjurnal;

        if ($dbjurnal->pembayaran != null) {
            $page_data['judul'] = ($dbjurnal->pembayaran == '101.01.100') ? 'KAS' : 'BANK';
        } else {
            $page_data['judul'] = 'KAS/BANK';
        }


        $response = $this->load->view('jurnal_print/cetak_bukti_kas', $page_data, TRUE);
        echo $response;
    }
    function tampil_detail_bukti_kas()
    {
        $id_vendor = $this->input->post('idFaktur');
        $page_data = $this->M_Keuangan_ijd->getBuktiKas($id_vendor);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;

            // $des = explode(" - ", $page_data[$i]->des_rek);
            // $vendor = $des[1];
            $id_vendor = $page_data[$i]->vendor;
            // $vendor =$this->db->get_where('produsen',['kode'=>$id_vendor])->row();

            $akun = $page_data[$i]->akun;
            $cj = $page_data[$i]->cj;
            $uraian = $page_data[$i]->deskripsi;
            $nilai = number_format($page_data[$i]->debet + $page_data[$i]->kredit, 0, ',', '.');
            if ($page_data[$i]->id_jurnal == "" || $page_data[$i]->id_jurnal == null) {
                $delete =
                    "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id . "\")' '><i class='fa fa-trash '></i></button>";
            } else {
                $delete = "";
            }
            $pilih = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" .  $page_data[$i]->id . "\")'><i class='icon-rocket'></i></button>";

            // $total = number_format($page_data[$i]->kredit, 0, ',', '.');
            // $nilai1 = round($page_data[$i]->kredit - $page_data[$i]->total);
            // $id_fk = $page_data[$i]->pk;


            $out[$i] = array($delete,$pilih, $akun,$cj, $uraian, $nilai);
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
    public function addBk()
    {
        $data_staff = $this->session->userdata('data_auth');
        $pelayanan = explode("|", $this->input->post('pelayanan'));
        $id_jenis = explode("|", $this->input->post('id_jenis'));
        $no_dokumen = $this->input->post('no_dokumen');

        $kode1 = $this->db->get_where('daftar_akun', ['id_akun' => $id_jenis[1]])->row();
        $kode2 = $this->db->get_where('detail_daftar_akun', ['id_detail' => $id_jenis[0]])->row();

        $rek = $kode1->kode . '.' . $kode2->kode . '.' . $pelayanan[0];
        $kode1_split = str_split($kode1->kode);
        if ($kode1_split[0] == 7 || $kode1_split[0] == 8) {
            $desk =  $kode1->deskripsi . ' = ' . $kode2->deskripsi . ' = ' . $pelayanan[1];
        } else {
            $desk =  $kode1->deskripsi . ' = ' . $pelayanan[1];
        }

        $nilai = $this->input->post('nilai');
        $tipe = $this->input->post('tipe');
        $dok = $this->db->get_where("bukti_kas", ['no_dokumen' => $no_dokumen])->row();

        $data = [
            'indeks' => $dok->indeks,
            'no_dokumen' => $no_dokumen,
            'akun' => $rek,
            'kredit' => ($tipe == 'KREDIT') ? $nilai : 0,
            'debet' => ($tipe == 'DEBIT') ? $nilai : 0,
            'staff' => $data_staff->nama,
            'pk' => $this->input->post('pk'),
            'tgl' => $dok->tgl,
            'vendor' => $dok->vendor,
            'tipe' => $dok->tipe,
            'deskripsi' => $this->input->post('deskripsi'),
            'cj' => $this->input->post('cj'),
            'des_rek' => $desk,
            'save' => 1,
        ];

        $this->M_Kasir->insert_tindakan($data, 'detail_hutang_bukti_kas');
        if ($dok->tipe != 'UTANG') {
            $this->M_Kasir->delete_tindakan(['no_dokumen' => $no_dokumen, 'akun' => ''], 'detail_hutang_bukti_kas');
        }


        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_addBK()
    {
        $id_faktur = $this->input->post('id_faktur');

        // $this->M_Kasir->update_tindakan(['save'=>99], ['id' => $id_faktur], 'detail_hutang_bukti_kas');
        $this->M_Kasir->delete_tindakan(['id' => $id_faktur], 'detail_hutang_bukti_kas');
        $out['status'] = "success";
        echo json_encode($out);
    }

     // Start edit ayat jurnal
     public function edit_bukti_kas()
     {
         $data_staff = $this->session->userdata('data_auth');
         if ($this->input->post('pelayanan') == "-" || $this->input->post('id_jenis') == "-" || $this->input->post('kategori') == "-") {
             $out['COA Rekening Dipilih Terlebih Dahulu'] = "success";
         } else {
 
             $pelayanan = explode("|", $this->input->post('pelayanan'));
             $id_jenis = explode("|", $this->input->post('id_jenis'));
             $id_detail = $this->input->post('id_detail');
             $kode1 = $this->db->get_where('daftar_akun', ['id_akun' => $id_jenis[1]])->row();
             $kode2 = $this->db->get_where('detail_daftar_akun', ['id_detail' => $id_jenis[0]])->row();
 
             $rek = $kode1->kode . '.' . $kode2->kode . '.' . $pelayanan[0];
             $kode1_split = str_split($kode1->kode);
             if ($kode1_split[0] == 7 || $kode1_split[0] == 8) {
                 $desk =  $kode1->deskripsi . ' = ' . $kode2->deskripsi . ' = ' . $pelayanan[1];
             } else {
                 $desk =  $kode1->deskripsi . ' = ' . $pelayanan[1];
             }
             $nilai = $this->input->post('nilai');
             $tipe = $this->input->post('tipe');
 
           
                 $data = [
                     'akun' => $rek,
                     'deskripsi' => $this->input->post('deskripsi'),
                     'kredit' => ($tipe == 'KREDIT') ? $nilai : 0,
                     'debet' => ($tipe == 'DEBIT') ? $nilai : 0,
                     // 'lap' => '01',
                     // 'jb' => $pelayanan[0],
                     'cj' => $this->input->post('cj'),
                     'pk' => $this->input->post('pk'),
                     'tgl_input' => date('Y-m-d H:i:s'),
                     'des_rek' => $desk,
                     'staff' => $data_staff->nama,
                     // 'id_fk' => $tipe,
                 ];
                 $this->M_Kasir->update_tindakan($data, ['id' => $id_detail], 'detail_hutang_bukti_kas');
             
             $out['status'] = "success";
         }
         echo json_encode($out);
     }
    public function edit_addBk()
    {
        $id_detail = $this->input->post('id_detail');
        $tipe = $this->input->post('tipe');
      
            $data = $this->db->get_where('detail_hutang_bukti_kas', ['id' => $id_detail])->row();
        
        $rek = explode('.', $data->akun);
        $kode1 = $this->db->get_where('daftar_akun', ['kode' => $rek[0]])->row()->id_akun;
        $kode2 = $this->db->get_where('detail_daftar_akun', ['id_akun' => $kode1, 'kode' => $rek[1]])->row()->id_detail;
        $kode1_split = str_split($rek[0]);
        if ($kode1_split[0] == 7 || $kode1_split[0] == 8) {
            $desk = explode(' = ', $data->des_rek);
            $desk = $desk[2];
        } else {
            // if ($tipe == 'MIT' || $tipe =='PEMBAYARAN PIUTANG') {
            //     $desk = $this->db->get_where('sub_detail_akun', ['kategori' => $rek[0], 'sub_kategori' => $rek[1], 'kode' => $rek[2]])->row()->deskripsi;
            // } else {
                $desk = explode(' = ', $data->des_rek);
                $desk = $desk[1];
            // }
        }
        $response['kode1'] = $kode1;
        $response['kode2'] = $kode2;
        $response['kode3'] = $rek[2];
        $response['desk'] = $desk;
        $response['no_pk'] = $data->pk;
        $response['deskripsi'] = $data->deskripsi;
        $response['nilai'] = $data->kredit + $data->debet;
        // $response['cj'] = $data->cj;
        $response['tipe'] = ($data->kredit != 0) ? 'KREDIT' : 'DEBIT';

        echo json_encode($response);
    }

    /////////////////////verif bukti kas
    public function Verifikasi_Bukti_kas()
    {
        $this->load->view('assets/_header');

        $page_data['judul'] = "BUKTI KAS";
        $page_data['page_content'] = 'Jurnal/Bukti_kas_hutang_verifikasi';
        $page_data['data_cj'] = $this->db->get('akun_cj')->result_array();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_bukti_kas_verifikasi()
    {
        $data_staff = $this->session->userdata('data_auth');

        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');


        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Keuangan_ijd->SelectBuktiKas1($first_date, $second_date);
        } else {
            $page_data = $this->M_Keuangan_ijd->SelectBuktiKas1('', '');
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;

            $dbvendor = $this->db->get_where('produsen', ['kode' => $page_data[$i]->vendor])->row();

            // $no_jurnal = $dbvendor->nama_produsen;
            if ($page_data[$i]->tipe == 'UTANG') {
                $dbvendor = $this->db->get_where('produsen', ['kode' => $page_data[$i]->vendor])->row();

                $no_jurnal = isset($dbvendor) ? $dbvendor->nama_produsen : $page_data[$i]->vendor;
            } else {
                $no_jurnal = $page_data[$i]->vendor;
            }
            $no_dokumen = $page_data[$i]->no_dokumen;

            $total = number_format($page_data[$i]->total - $page_data[$i]->kredit, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_dokumen . "\")' '><i class='icon-printer '></i></button>";

            if ($data_staff->tipe == 'direktur') {
                if ($page_data[$i]->status_direktur == null) {
                    $tombol = "<button title='Menyetujui BK' class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='verifikasi(\"" . $page_data[$i]->no_dokumen . "\",\"" . "DISETUJUI" . "\",\"" . "direktur" . "\")' '><i class='fa fa-thumbs-up '></i></button>
                <button title='Tidak Menyetujui BK' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='verifikasi(\"" . $page_data[$i]->no_dokumen . "\",\"" . "DITOLAK" . "\",\"" . "direktur" . "\")' '><i class='fa fa-close '></i></button>";
                } else if ($page_data[$i]->status_direktur == 'DISETUJUI') {
                    $tombol = '<span class="label label-success">' . $page_data[$i]->status_direktur . '</span>';
                } elseif ($page_data[$i]->status_direktur == 'DITOLAK') {
                    $tombol = '<span class="label label-danger">' . $page_data[$i]->status_direktur . '</span>';
                }
            } else {
                if ($page_data[$i]->status_verifikasi == null) {
                    $tombol = "<button title='Menyetujui BK' class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='verifikasi(\"" . $page_data[$i]->no_dokumen . "\",\"" . "DISETUJUI" . "\",\"" . "chief" . "\")' '><i class='fa fa-thumbs-up '></i></button>
                <button title='Tidak Menyetujui BK' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='verifikasi(\"" . $page_data[$i]->no_dokumen . "\",\"" . "DITOLAK" . "\",\"" . "chief" . "\")' '><i class='fa fa-close '></i></button>";
                } else if ($page_data[$i]->status_verifikasi == 'DISETUJUI') {
                    if ($page_data[$i]->pembayaran == null) {
                        $tombol =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='pilih(\"" . $page_data[$i]->no_dokumen .  "\")'><i class='icon-note'></i></a>";
                    } else {
                        $tombol = ($page_data[$i]->pembayaran == '101.01.100') ? 'KAS' : 'BANK';
                    }
                } elseif ($page_data[$i]->status_verifikasi == 'DITOLAK') {
                    $tombol = '<span class="label label-danger">' . $page_data[$i]->status_verifikasi . '</span>';
                }
            }



            $out[$i] = array($no, $tombol, $cetak, $no_dokumen, $no_jurnal, $total, $staff);
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
    public function verifikasi()
    {
        $data_staff = $this->session->userdata('data_auth');

        $status = $this->input->post('status');
        $no_dok = $this->input->post('no_dok');
        $tipe = $this->input->post('tipe');

        if ($tipe == 'direktur') {
            $data = array(
                'status_direktur' => $status,
                'tgl_direktur' => date('Y-m-d H:i:s'),
            );
        } else  if ($tipe == 'chief') {
            $db = $this->M_Keuangan_ijd->getBuktiKas($no_dok);
            if ($status == 'DITOLAK') {
                foreach ($db as $row) {
                    if ($row->ket_jurnal == 1) {
                        $this->M_Kasir->update_tindakan(['ket_jurnal' => 0], ['id_jurnal' => $row->id_jurnal], 'jurnal_pembayaran_farmasi');
                    }
                }
            }
            $data = array(
                'status_verifikasi' => $status,
                'staff_verifikasi' => $data_staff->nama,
                'tgl_chief' => date('Y-m-d H:i:s'),
            );
        } else {
            $db = $this->M_Keuangan_ijd->getBuktiKas($no_dok);
            if ($status == 99) {
                foreach ($db as $row) {
                    if ($row->ket_jurnal == 1) {
                        $this->M_Kasir->update_tindakan(['ket_jurnal' => 0], ['id_jurnal' => $row->id_jurnal], 'jurnal_pembayaran_farmasi');
                    }
                }
            }
            $data = array(
                'save' => $status,
            );
            $this->M_Kasir->update_tindakan($data, ['no_dokumen' => $no_dok], 'bukti_kas');
        }


        $this->M_Kasir->update_tindakan($data, ['no_dokumen' => $no_dok], 'detail_hutang_bukti_kas');

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function get_bank()
    {
        $out = $this->db->get('daftar_bank')->result();
        echo json_encode($out);
    }
    public function Simpan_pembayaran_utang()
    {
        $data_staff = $this->session->userdata('data_auth');

        $tgl_faktur = $this->input->post('tgl_faktur');
        // $tgl_faktur = date('Y-m-d');
        $jenis = $this->input->post('id_jenis');
        $no_dok = $this->input->post('no_dokumen');
        $bank = $this->input->post('bank');

        $dok = $this->db->get_where("detail_hutang_bukti_kas", ['no_dokumen' => $no_dok, 'akun !=' => ''])->result();
        $tgl = $dok[0]->tgl;

        if ($jenis == 'kas') {
            $coa = '101.01.100';
            $kode = '301';
            $judul = 'KAS';
            $jk = '10';
            $desk = 'Kas - Rupiah';
        } else {
            $kode = '302';
            $judul = 'BANK';
            $jk = '11';
            // $desk = 'Bank Mandiri - Rupiah';
            $desk = $this->db->get_where("daftar_bank", ['kode_coa' => $bank])->row()->deskripsi;
            $coa = $bank;
        }
        $max = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl_faktur)->max;
        $noValid =  sprintf('%04d', $max + 1, 'dyhtdyu');
        $noDok = $noValid . "/" . "GL-" . $kode . "/" . date('my', strtotime($tgl_faktur));
        $no_index = $max + 1;
        $data_j = array(
            'no_jurnal' => $noDok,
            'tanggal' => $tgl_faktur,
            'tipe_jurnal' => $judul,
            'tgl_input' => date("Y-m-d H:i:s"),
            'tgl_simpan' => date("Y-m-d H:i:s"),
            'id_staff' => $dok[0]->staff,
            'ket' => 1,
            'source' => 'BK'

        );


        $id_jurnal = $this->M_Kasir->insert_tindakan($data_j, 'jurnal_kas_bank');
        $dokumen = ['no_dokumen' => $noDok, 'no_index' => $no_index, 'kode' => $kode, 'tgl' => $tgl_faktur, 'staff' => $data_staff->nama];
        $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');

        foreach ($dok as $row) {
            $pelayanan = explode(".", $row->akun);

            $data2 = [
                'id_jurnal' => $row->id,
                'jk' => $jk,
                'rekening' => $row->akun,
                'deskripsi' => $row->deskripsi,
                'no_jurnal' => $noDok,
                'kredit' => $row->kredit,
                'debet' => $row->debet,
                'lap' => '01',
                'jb' => $pelayanan[2],
                'cj' => is_null($row->cj)?0:$row->cj,
                'pk' => $no_dok,
                'tgl' => $tgl_faktur,
                'des_rek' => $row->des_rek,
                'staff' => $dok[0]->staff,
                'id_fk' => $judul,
                'pk_bukti' => $row->pk,

            ];
            $this->M_Kasir->insert_tindakan($data2, 'detail_jurnal_kas_bank');
        }

        $sumdebit = $this->db->query("SELECT sum(debet) jumlah from detail_hutang_bukti_kas where no_dokumen ='$no_dok'")->row()->jumlah;
        $sumkredit = $this->db->query("SELECT sum(kredit) jumlah from detail_hutang_bukti_kas where no_dokumen ='$no_dok'")->row()->jumlah;
        $pelayanan1 = explode(".", $coa);
        $db_kd = $sumdebit - $sumkredit;
        if ($db_kd < 0) {
            $debet =  $db_kd * -1;
            $kredit = 0;
        } else {
            $debet =  0;
            $kredit = $db_kd;
        }

        $data1 = [
            'id_jurnal' => '',
            'jk' => $jk,
            'rekening' => $coa,
            'deskripsi' => $desk,
            'no_jurnal' => $noDok,
            'kredit' => $kredit,
            'debet' => $debet,
            'lap' => '01',
            'jb' => $pelayanan1[2],
            'cj' =>'101',
            'pk' => $no_dok,
            'tgl' => $tgl_faktur,
            'des_rek' => $desk,
            'staff' => $dok[0]->staff,
            'id_fk' => $judul,
            'pk_bukti' => 'Jurnal',

        ];
        $this->M_Kasir->insert_tindakan($data1, 'detail_jurnal_kas_bank');

        $data = [
            'pembayaran' => $coa,
            'tgl_verifikasi' => $tgl_faktur,
            'ket_jurnal' => 1,
            'no_jurnal' => $noDok,
        ];

        $this->M_Kasir->update_tindakan($data, ['no_dokumen' => $no_dok], 'detail_hutang_bukti_kas');

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function Sisa_utang_vendor()
    {
        $this->load->view('assets/_header');

        $page_data['judul'] = "LAPORAN SISA PEMBYARAN UTANG";
        $page_data['page_content'] = 'Jurnal/Laporan_sisa_utang_vendor';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    function tampil_sisa_hutang_vendor()
    {
        $page_data = $this->db->query("SELECT j.*, sum(j.kredit) kredit,IFNULL(sum(d.total),0) total
        from jurnal_pembayaran_farmasi j
        left join (SELECT sum(debet) total, id_jurnal 
                 from detail_hutang_bukti_kas 
                 where save = 2
                 group by id_jurnal
                 ) d on j.id_jurnal= d.id_jurnal
        where j.jenis_jurnal = 'hutang' and j.status='DITERIMA'
        group by j.id_vendor
        having (kredit-total) != 0
        ")->result();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;

            $des = explode(" - ", $page_data[$i]->des_rek);
            $vendor = $des[1];
            $id_vendor = $page_data[$i]->id_vendor;

            $nilai = number_format($page_data[$i]->kredit, 0, ',', '.');
            $total = number_format($page_data[$i]->total, 0, ',', '.');
            $nilai1 = number_format(round($page_data[$i]->kredit - $page_data[$i]->total), 0, ',', '.');
            // $aging = $this->M_Keuangan_ijd->getAgingUtang($id_vendor);
            // foreach($aging as $row){
            //     if($row->hari <=90){
            //         $a0_90 = $row->kredit - $row->total;
            //     }else if($row->hari >90 && $row->hari<= 120){
            //         $a91_120 = $row->kredit - $row->total;
            //     }else if($row->hari >120 && $row->hari<= 365){
            //         $a121_365 = $row->kredit - $row->total;
            //     }else if($row->hari > 365){
            //         $a365 = $row->kredit - $row->total;
            //     }
            // }
            // print_arr($aging);


            // $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_jurnal . "'><label ></label></div>";
            $pilih =  "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_list_faktur(\"" . $id_vendor .  "\")'><i class='icon-note'></i></a>";

            // $out[$i] = array($no,$pilih, $vendor, $id_vendor, $nilai1,$a0_90,$a91_120,$a121_365,$a365);
            $out[$i] = array($no, $pilih, $vendor, $id_vendor, $nilai1);
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
    function tampil_sisa_hutang_Byvendor()
    {
        $id_vendor = $this->input->post('idFaktur');
        $page_data = $this->db->query("SELECT j.*,IFNULL(d.total,0) total
        from jurnal_pembayaran_farmasi j
        left join (SELECT sum(debet) total, id_jurnal 
                 from detail_hutang_bukti_kas 
                 where save = 2
                 group by id_jurnal
                 ) d on j.id_jurnal= d.id_jurnal
        where j.jenis_jurnal = 'hutang' and j.status='DITERIMA' 
        and j.id_vendor = '$id_vendor'
        having (kredit-total) != 0
        ")->result();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;

            $des = explode(" - ", $page_data[$i]->des_rek);
            $vendor = $des[1];
            $id_vendor = $page_data[$i]->id_vendor;

            $no_jurnal = $page_data[$i]->no_jurnal;
            $nilai = number_format($page_data[$i]->kredit, 0, ',', '.');
            $total = number_format($page_data[$i]->total, 0, ',', '.');
            $nilai1 = number_format(round($page_data[$i]->kredit - $page_data[$i]->total), 0, ',', '.');
            $id_fk = $page_data[$i]->pk;

            // $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_jurnal . "'><label ></label></div>";
            // $pilih =  "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_list_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $nilai1 . "\",\"" . $vendor .  "\")'><i class='icon-note'></i></a>";

            $out[$i] = array($no, $no_jurnal, $id_fk, $vendor, $id_vendor, $nilai1);
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
    public function update($id_jurnal)
    {

        // $page_data = $this->M_Keuangan_ijd->update('2023-01-01', '2023-01-20');
        // $page_data = $this->db->query("SELECT s.*,a.id_akun from akun_persediaan_farmasi a, struk_logistik s 
        // where a.no_faktur = s.no_faktur")->result();

        // for ($i = 0; $i < count($page_data); $i++) {

        //     $noValid =  sprintf('%04d', $page_data[$i]->index_dok, 'dyhtdyu');
        //     $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($page_data[$i]->tgl_buat))) . "/" . date("Y", strtotime($page_data[$i]->tgl_buat));
        //     $db = [
        //         'npb' => $noDok,
        //     ];
        //     // $db = [
        //     //     // 'verifikasi' => 0,
        //     //     'status' => 0,
        //     // ];
        //     $this->M_Kasir->update_tindakan($db, ['id_akun' => $page_data[$i]->id_akun], 'akun_persediaan_farmasi');
        //     // $this->M_Kasir->update_tindakan(['status' => 'DITOLAK', 'keterangan' => 'dikembalikan ke awal'], ['no_jurnal' => $page_data[$i]->no_jurnal], 'jurnal_pembayaran_farmasi');
        //     // // $this->M_Kasir->delete_tindakan(['no_jurnal' => $page_data[$i]->no_jurnal], 'jurnal_pembayaran_farmasi');
        // }
        // $page_data = $this->M_Keuangan_ijd->SelectJurnalFarmasiVerifikasi('2023-01-01', '2023-02-28', 'hutang');
        // $page_data = $this->db->query("SELECT * 
        // FROM jurnal_farmasi
        // where jenis_jurnal='hutang' and no_po is null  ")->result();

        // for ($i = 0; $i < count($page_data); $i++) {
        //     $id_fk = $page_data[$i]->id_fk;
        //     $pk = $page_data[$i]->pk;
        //     $no_jurnal = $page_data[$i]->no_jurnal;

        //     $dat = $this->db->query("SELECT b.*
        //         from jurnal_pembayaran_farmasi a, jurnal_farmasi b
        //         where a.kode_check ='$id_fk' and a.pk='$pk' and b.no_jurnal = a.no_jurnal");
        //     // $npb = isset($npb) ? $npb->pk : '-';
        //     // $dat = $this->db->query("SELECT d.id_struk, s.index_dok, s.tgl_buat from detail_struk d, struk_logistik s where d.id_struk = s.no_faktur and id_detail_po='$id_detail' and id_logistik = '$id_log'");

        //     if ($dat->num_rows() > 0) {

        //         if ($dat->num_rows() > 1) {
        //             $struk = $dat->result_array();
        //             $k = array();
        //             // var_dump($struk);
        //             foreach ($struk as $row) {
        //                 $k[] = $row['pk'];
        //             }

        //             $npb = implode(', ', array_unique($k));
        //         } else {
        //             $npb = $dat->row();
        //             $npb = isset($npb) ? $npb->pk : '-';
        //         }
        //     }
        //     $this->M_Kasir->update_tindakan(
        //         ['no_po' => $npb],
        //         ['no_jurnal' => $no_jurnal, 'jenis_jurnal' => 'hutang', 'no_po' => NULL],
        //         'jurnal_farmasi'
        //     );
        // }
        $jp = $this->db->get_where('jurnal_pembayaran_farmasi', ['id_jurnal' => $id_jurnal])->row();
        $no_po = $jp->pk;
        $no_jurnal = $jp->no_jurnal;

        $jf = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal])->row();
        $npb = $jf->no_po;

        $dat_npb = explode(', ', $npb);
        // print_r($dat_npb);
        $akun_pers = array();
        for ($a = 0; $a < count($dat_npb); $a++) {
            $akun_pers[] = $this->db->get_where('akun_persediaan_farmasi', ['npb' => $dat_npb[$a]])->row();
        }
        // echo '<br>';
        // print_r($akun_pers);
        $no_faktur = implode(', ', array_column($akun_pers, 'no_faktur'));
        $tgl_po = implode(', ', array_column($akun_pers, 'tgl_po'));
        $tgl_faktur = implode(', ', array_column($akun_pers, 'tgl_faktur'));
        echo $no_faktur;
    }

    public function export_jurnal($mulai, $akhir, $jurnal)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        $sheet->setCellValue('A1', "REKAP JURNAL"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        // Buat header tabel nya pada baris ke 3
        // $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('B3', "JK"); // Set kolom B3 dengan tulisan "NIS"
        $sheet->setCellValue('C3', "TANGGAL"); // Set kolom C3 dengan tulisan "NAMA"
        $sheet->setCellValue('D3', "NO JURNAL"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('E3', "GROUP"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('F3', "MEAN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('G3', "SUB"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('H3', "JP"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('I3', "REKENING"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('J3', "JP/JB");
        $sheet->setCellValue('K3', "CF");
        $sheet->setCellValue('L3', "PK");
        $sheet->setCellValue('M3', "LAP");
        $sheet->setCellValue('N3', "KODE VENDOR");
        $sheet->setCellValue('O3', "NAMA REKANAN");
        // $sheet->setCellValue('P3', "KELOMPOK VENDOR");
        $sheet->setCellValue('P3', "DEBET");
        $sheet->setCellValue('Q3', "KREDIT");
        $sheet->setCellValue('R3', "SALDO");
        $sheet->setCellValue('S3', "DESKRIPSI");
        $sheet->setCellValue('T3', "DESKRIPSI REKENING");
        $sheet->setCellValue('U3', "NO FAKTUR");
        $sheet->setCellValue('V3', "TGL FAKTUR");
        $sheet->setCellValue('W3', "NO PO");
        $sheet->setCellValue('X3', "TGL PO");
        $sheet->setCellValue('Y3', "NO NPB");
        $sheet->setCellValue('Z3', "STAFF");

        if ($jurnal == 'kas_bank_utang') {
            $sheet->setCellValue('AA3', "NO JURNAL UTANG");
        }
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        // $sheet->getStyle('A3')->applyFromArray($style_col);
        if ($jurnal == 'kas_bank_utang') {
            $sheet->getStyle('B3:AA3')->applyFromArray($style_col);
        } else {
            $sheet->getStyle('B3:Z3')->applyFromArray($style_col);
        }
        // $sheet->getStyle('V')->getNumberFormat()->setFormatCode('@');

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        // $first_date = $this->input->post('mulai');
        // $second_date = $this->input->post('akhir');

        $rekap = $this->M_Keuangan_ijd->SelectRekapLogFar($mulai, $akhir, $jurnal);

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($rekap as $data) { // Lakukan looping pada variabel siswa
            // $svheet->setCellValue('A' . $numrow, $no);
            $rekening = explode('.', $data->rekening);
            $group = substr($rekening[0], 0, 1);


            if ($jurnal == 'persediaan') {
                $no_jurnal = $data->no_jurnal;
                $id_vendor = $data->id_vendor;

                $jp = $this->db->get_where('jurnal_pembayaran_farmasi', ['no_jurnal' => $no_jurnal])->row();
                $no_po = $jp->pk;

                $dat = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal]);
                $akun_pers = $this->db->get_where('akun_persediaan_farmasi', ['no_jurnal' => $no_jurnal]);

                if ($dat->num_rows() > 0) {

                    if ($dat->num_rows() > 1) {
                        $struk = $dat->result_array();
                        $k = array();
                        // var_dump($struk);
                        foreach ($struk as $row) {
                            $k[] = $row['pk'];
                        }

                        $npb = implode(', ', array_unique($k));
                    } else {
                        $npb = $dat->row();
                        $npb = isset($npb) ? $npb->pk : '-';
                    }
                }
                if ($akun_pers->num_rows() > 1) {
                    $struk_1 = $akun_pers->result_array();
                    $l = array();
                    $m = array();
                    $n = array();
                    // var_dump($struk);
                    foreach ($struk_1 as $row) {
                        $l[] = $row['tgl_po'];
                        $m[] = $row['tgl_faktur'];
                        $n[] = $row['no_faktur'];
                    }

                    $tgl_po = implode(', ', array_unique($l));
                    $tgl_faktur = implode(', ', array_unique($m));
                    $no_faktur = implode(', ', array_unique($n));
                } else {
                    $akun_pers_row = $akun_pers->row();
                    $tgl_po = isset($akun_pers_row) ? $akun_pers_row->tgl_po : '-';
                    $tgl_faktur = isset($akun_pers_row) ? $akun_pers_row->tgl_faktur : '-';
                    $no_faktur = isset($akun_pers_row) ? $akun_pers_row->no_faktur : '-';
                }
            } else if ($jurnal == 'hutang') {
                $no_jurnal = $data->no_jurnal;
                $id_vendor = $data->id_vendor;

                $jp = $this->db->get_where('jurnal_pembayaran_farmasi', ['no_jurnal' => $data->no_jurnal])->row();
                $no_po = $jp->pk;
                $no_jurnal = $jp->no_jurnal;

                $jf = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal])->row();
                $npb = $jf->no_po;

                $dat_npb = explode(', ', $npb);
                // print_r($dat_npb);
                $akun_pers = array();
                for ($a = 0; $a < count($dat_npb); $a++) {
                    $akun_pers[] = $this->db->get_where('akun_persediaan_farmasi', ['npb' => $dat_npb[$a]])->row();
                }
                // echo '<br>';
                // print_r($akun_pers);
                $no_faktur = implode(', ', array_column($akun_pers, 'no_faktur'));
                $tgl_po = implode(', ', array_column($akun_pers, 'tgl_po'));
                $tgl_faktur = implode(', ', array_column($akun_pers, 'tgl_faktur'));
                // $no_po='';
                // $no_faktur='';
                // $tgl_po='';
                // $tgl_faktur='';

            } else if ($jurnal == 'kas_bank_utang') {
                if (isset($data->id_jurnal)) {
                    $id_jurnal =  $this->db->get_where('detail_hutang_bukti_kas', ['id' => $data->id_jurnal])->row();
                    if (!empty($id_jurnal) && isset($id_jurnal->id_jurnal)) {
                        $id_jurnal = $id_jurnal->id_jurnal;
                        $jp = $this->db->get_where('jurnal_pembayaran_farmasi', ['id_jurnal' => $id_jurnal])->row();
                        $no_po = $jp->pk;
                        $id_vendor = $jp->id_vendor;
                        $no_jurnal = $jp->no_jurnal;

                        $jf = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal])->row();
                        $npb = $jf->no_po;

                        $dat_npb = explode(', ', $npb);
                        // print_r($dat_npb);
                        $akun_pers = array();
                        for ($a = 0; $a < count($dat_npb); $a++) {
                            $akun_pers[] = $this->db->get_where('akun_persediaan_farmasi', ['npb' => $dat_npb[$a]])->row();
                        }

                        // echo '<br>';
                        // print_r($akun_pers);
                        $no_faktur = implode(', ', array_column($akun_pers, 'no_faktur'));
                        $tgl_po = implode(', ', array_column($akun_pers, 'tgl_po'));
                        $tgl_faktur = implode(', ', array_column($akun_pers, 'tgl_faktur'));
                    } else {
                        $npb = '-';
                        $no_po = '-';
                        $tgl_po = '-';
                        $no_faktur = '-';
                        $tgl_faktur = '-';
                        $id_vendor = '-';
                    }
                } else {
                    $npb = '-';
                    $no_po = '-';
                    $tgl_po = '-';
                    $no_faktur = '-';
                    $tgl_faktur = '-';
                    $id_vendor = '-';
                }
            }

            $vendor = $this->db->query("SELECT nama nama_rekanan FROM
            cara_bayar where kode_pelanggan ='$id_vendor'
            union all
            SELECT nama_produsen nama_rekanan FROM
            produsen where kode ='$id_vendor'
            ")->row();
            $vendor = isset($vendor->nama_rekanan) ? $vendor->nama_rekanan : '';

            $sheet->setCellValue('B' . $numrow, $data->jk);
            $sheet->setCellValue('C' . $numrow, date('Y-m-d', strtotime($data->tgl)));
            $sheet->setCellValue('D' . $numrow, $data->no_jurnal);
            $sheet->setCellValue('E' . $numrow, $group);
            $sheet->setCellValue('F' . $numrow, $rekening[0]);
            $sheet->setCellValue('G' . $numrow, $rekening[1]);
            $sheet->setCellValue('H' . $numrow, $rekening[2]);
            $sheet->setCellValue('I' . $numrow, $data->rekening);
            $sheet->setCellValue('J' . $numrow, $data->jb);
            $sheet->setCellValue('K' . $numrow, $data->cj);
            $sheet->setCellValue('L' . $numrow, $data->pk);
            $sheet->setCellValue('M' . $numrow, $data->lap);
            $sheet->setCellValue('N' . $numrow, $id_vendor);
            $sheet->setCellValue('O' . $numrow, $vendor);
            // $sheet->setCellValue('P' . $numrow, $data->kelompok_pelanggan);
            $sheet->setCellValue('P' . $numrow, $data->debet);
            $sheet->setCellValue('Q' . $numrow, $data->kredit);
            $sheet->setCellValue('R' . $numrow, $data->debet - $data->kredit);
            $sheet->setCellValue('S' . $numrow, ucwords(strtolower($data->deskripsi)));
            $sheet->setCellValue('T' . $numrow, ucwords(strtolower($data->des_rek)));
            $sheet->setCellValue('U' . $numrow, $no_faktur);
            $sheet->setCellValue('V' . $numrow, date('d/m/Y', strtotime($tgl_faktur)));
            $sheet->setCellValue('W' . $numrow, $no_po);
            $sheet->setCellValue('X' . $numrow, date('d/m/Y', strtotime($tgl_po)));
            $sheet->setCellValue('Y' . $numrow, $npb);
            $sheet->setCellValue('Z' . $numrow, $data->staff);

            if ($jurnal == 'kas_bank_utang') {
                $sheet->setCellValue('AA' . $numrow, $no_jurnal);
            }

            $sheet->getCell('U' . $numrow)->setValueExplicit(
                $no_faktur,
                \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING2
            );
            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            // $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow . ':Z' . $numrow)->applyFromArray($style_row);

            if ($jurnal == 'kas_bank_utang') {
                $sheet->getStyle('AA' . $numrow)->applyFromArray($style_row);
            }

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $sheet->getDefaultColumnDimension()->setWidth(-1); // Set width kolom A

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Laporan Rekap Jurnal");
        // Proses file excel
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Rekap.xlsx"'); // Set nama file excel nya
        // header('Cache-Control: max-age=0');
        // $writer = new Xlsx($spreadsheet);
        ob_end_clean();

        // ob_start();
        $writer->save('php://output');
        // $content = ob_get_contents();
        // ob_end_clean();
        // die;
        exit();
    }
    public function getData()
    {
        $rekap = $this->M_Keuangan_ijd->SelectRekapLogFar('2023-06-09', '2023-06-09', 'kas_bank_utang');
        foreach ($rekap as $data) {
            $id_jurnal =  $this->db->get_where('detail_hutang_bukti_kas', ['id' => $data->id_jurnal])->row()->id_jurnal;
            if ($id_jurnal != null) {
                $jp = $this->db->get_where('jurnal_pembayaran_farmasi', ['id_jurnal' => $id_jurnal])->row();
                $no_po = $jp->pk;
                $id_vendor = $jp->id_vendor;
                $no_jurnal = $jp->no_jurnal;

                $jf = $this->db->get_where('jurnal_farmasi', ['no_jurnal' => $no_jurnal])->row();
                $npb = $jf->no_po;

                $dat_npb = explode(', ', $npb);
                // print_r($dat_npb);
                $akun_pers = array();
                for ($a = 0; $a < count($dat_npb); $a++) {
                    $akun_pers[] = $this->db->get_where('akun_persediaan_farmasi', ['npb' => $dat_npb[$a]])->row();
                }

                // echo '<br>';
                // print_r($akun_pers);
                $no_faktur = implode(', ', array_column($akun_pers, 'no_faktur'));
                $tgl_po = implode(', ', array_column($akun_pers, 'tgl_po'));
                $tgl_faktur = implode(', ', array_column($akun_pers, 'tgl_faktur'));
            } else {

                $no_po = ($data->pk_bukti != 'Jurnal') ? $data->pk_bukti : '-';
                $no_faktur = '-';
            }
            $noJUrnal = $data->no_jurnal;

            $out[] = array($noJUrnal, $data->pk, $no_po, $no_faktur);
        }
        print_arr($out);
    }

    function kembalikan_bk()
    {
        $no = $this->input->post('no');

        $bk = $this->db->get_where('detail_hutang_bukti_kas', ['no_dokumen' => $no])->result();
        $this->M_Kasir->update_tindakan(['save' => 1], ['no_dokumen' => $no], 'bukti_kas');
        foreach ($bk as $row) {
            $this->M_Kasir->update_tindakan(
                ['ket_jurnal' => 0, 'pembayaran' => NULL, 'status_verifikasi' => NULL, 'status_direktur' => null, 'save' => 1],
                ['no_dokumen' => $no],
                'detail_hutang_bukti_kas'
            );
        }
      
        $out['status'] = "success";
        echo json_encode($out);
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
