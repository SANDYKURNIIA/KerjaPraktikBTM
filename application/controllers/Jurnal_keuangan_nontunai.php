<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Jurnal_keuangan_nontunai extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Jurnal_keuangan');
        $this->load->model('M_Jurnal_pendapatan');
        $this->load->model('M_Jurnal_pendapatan_nontunai');
        $this->load->model('M_Kasir');
    }


    public function tampil_RangeLaporan_jurnal_rajal() //non tunai
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $jenis_klaim = $this->input->post('jenis_klaim');
        if ($this->input->post('mulai') != '' && $this->input->post('akhir') != '') {
            $page_data = $this->M_Jurnal_keuangan->SelectLaporanRajalNonTunai_pasien($first_date, $second_date, $jenis_klaim);
        } else {
            $page_data = $this->M_Jurnal_keuangan->SelectLaporanRajalNonTunai_pasien('', '', $jenis_klaim);
        }
        $out = null;


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl_keluar = indo_date2($page_data[$i]->tgl_keluar);

            $no = $i + 1;

            $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_pelayanan . "'><label ></label></div>";
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;

            if ($jenis_pelayanan == 'MCU') {
                $kasir = $this->db->get_where('detail_kasir_mcu', ['id_pasien' => $page_data[$i]->id_pelayanan])->row();
            } else {
                $kasir = $this->db->get_where('deatail_kasir', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            }
            $id_pel = $page_data[$i]->id_pelayanan;
            $db_selisih = $this->M_Jurnal_pendapatan_nontunai->getSelisih($id_pel);
            $selisih = empty($db_selisih) ? 0 : $db_selisih->total;

            $diskon_kasir = empty($kasir) ? 0 : $kasir->diskon;
            if ($jenis_pelayanan == 'MCU') {
                $diskon = $diskon_kasir;
            } else {
                $diskon = ($page_data[$i]->diskon != 0) ? ($page_data[$i]->total_akun - $selisih) * $page_data[$i]->diskon : $diskon_kasir;
            }

            // $kode_akun = $page_data[$i]->kode_akun;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $revenue = number_format($page_data[$i]->total_akun, 2, ',', '.');
            $total_akun = number_format($page_data[$i]->total_akun - $selisih - $diskon, 2, ',', '.');
            // $jenis_akun = $page_data[$i]->jenis_akun;
            $no_rm = " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;

            $out[$i] = array($checkbox, $no, $tgl_keluar, $no_rm, $pasien, $jenis_pelayanan, $cara_bayar, $revenue, $total_akun);
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


    public function tampil_RangeLaporan_jurnal_ranap() //nontunai
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $jenis_klaim = $this->input->post('jenis_klaim');
        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Jurnal_keuangan->SelectLaporanRanapNonTunai_pasien($first_date, $second_date, $jenis_klaim);
        } else {
            $page_data = $this->M_Jurnal_keuangan->SelectLaporanRanapNonTunai_pasien('', '', $jenis_klaim);
        }
        $out = null;


        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_pelayanan . "'><label ></label></div>";

            $tgl_keluar = indo_date2($page_data[$i]->tgl_keluar);
            $kasir = $this->db->get_where('deatail_kasir', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();

            $id_pel = $page_data[$i]->id_pelayanan;
            $db_selisih = $this->M_Jurnal_pendapatan_nontunai->getSelisih($id_pel);
            $selisih = empty($db_selisih) ? 0 : $db_selisih->total;

            $diskon_kasir = empty($kasir) ? 0 : $kasir->diskon;
            $diskon = ($page_data[$i]->diskon != 0) ? ($page_data[$i]->total_akun - $selisih) * $page_data[$i]->diskon : $diskon_kasir;

            // $kode_akun = $page_data[$i]->kode_akun;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $revenue = number_format($page_data[$i]->total_akun, 2, ',', '.');
            $total_akun = number_format($page_data[$i]->total_akun - $selisih - $diskon, 2, ',', '.');
            // $jenis_akun = $page_data[$i]->jenis_akun;
            $no_rm = " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;

            $out[$i] = array($checkbox, $no, $tgl_keluar, $no_rm, $pasien, $jenis_pelayanan, $cara_bayar, $revenue, $total_akun);
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


    public function setJurnal_Nontunai_pymhd()
    {

        $out = null;
        $tgl = $this->input->post('jurnal');
        $staff = $this->session->userdata('data_auth');
        $jenis_klaim = $this->input->post('jenis_klaim');

        $kode = '304';
        $maxR = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl)->max;
        $noValidR =  sprintf('%04d', $maxR + 1, 'dyhtdyu');
        $noDokR = $noValidR . "/" . "GL-" . $kode . "/" . date('my', strtotime($tgl));

        $dokumen = ['no_dokumen' => $noDokR, 'no_index' => $maxR + 1, 'kode' => $kode, 'tgl' => $tgl, 'staff' => $staff->nama];
        $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');

        // $this->db->trans_start();

        $data = $this->input->post('req');
        for ($i = 0; $i < count($data); $i++) {
            // $a[] = $this->db->query("SELECT * from jurnal_cara_pembayaran where id_jurnal_bayar = '$data[$i]'")->row();
            $a[] = $this->M_Jurnal_pendapatan_nontunai->Set_jurnal_nontunai($data[$i]);
        }



        $cara_bayar = $this->db->get_where('cara_bayar', ['id_cara_bayar' => $jenis_klaim])->row();
        $id_vendor = $cara_bayar->kode_pelanggan;

        $noDok = $noDokR;
        $max = $maxR;
        $kode = '304';
        $jk = '15';
        $kode_fk = implode("", [uniqid(), $staff->username]);
        $id_fk = uniqid();

        $groups = array();
        // print_arr($a);
        foreach ($a as $b) {
            foreach ($b as $item) {
                $key = $item->kode_akun;

                if (!array_key_exists($key, $groups)) {
                    $groups[$key] = array(
                        'kode_akun' => $item->kode_akun,
                        'jenis_akun' => $item->jenis_akun,
                        'total_akun' => $item->total_akun,
                        'id_fk' => $item->id_fk,
                        'lap' => $item->lap,
                    );
                } else {
                    $groups[$key]['total_akun'] = $groups[$key]['total_akun'] + $item->total_akun;
                }
            }
        }
        // print_r($groups);
        ////////////////////////jurnal revenue//////////////////
        foreach ($groups as $rows) {
            $arr = explode(".", $rows['kode_akun']);

            if ($arr[0] == '409') {
                $des = "PPN OBAT";
            } else {

                $a = $this->db->get_where('daftar_akun', ['kode' => $arr[0]])->row()->deskripsi;
                if ($arr[0] == '701') {
                    $b = $this->db->get_where('list_poli', ['kode_coa' => $arr[1]])->row()->nama_panjang;
                } else if ($arr[0] == '702') {
                    $b = $this->db->get_where('ruangan', ['kode_coa' => $arr[1]])->row()->kelas;
                } else if ($arr[0] == '703' || $arr[0] == '704') {
                    $b = '';
                } else {
                    $b = '';
                }
                $c = $rows['jenis_akun'];

                // if ($page_data1[$i]->jenis_bayar == 'tunai') {
                $des = $a . ' ' . $b . ' ' . $c;
                // } else {
                //     $pasien = $this->db->get_where('v_kunjungan', ['id_pelayanan' => $page_data1[$i]->id_pelayanan])->row();
                //     $des = $a . ' ' . $b . ' ' . $c . ' ' . $pasien->nama . ' (' . " " . sprintf('%06d', $pasien->no_rm) . ')';
                // }
            }
            $jurnal_pendapatan = [
                'id_fk' => $rows['id_fk'],
                'jk' => $jk,
                'rekening' => $rows['kode_akun'],
                'deskripsi' => $des,
                'no_jurnal' => $noDok,
                'no_index' => $max + 1,
                'jenis' => $kode,
                'kredit' => $rows['total_akun'],
                'debet' => 0,
                'lap' => $rows['lap'],
                'jb' => $arr[2],
                'cj' => '101',
                'pk' => $id_vendor,
                'tgl' => $this->input->post('jurnal'),
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des,
                'staff' => $staff->nama,
                'id_vendor' => $id_vendor

            ];
            $this->M_Kasir->insert_tindakan($jurnal_pendapatan, 'jurnal_pendapatan');
        }

        /////////////UPDATE AKUN/////////////////////////
        for ($i = 0; $i < count($data); $i++) {
            $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDokR], ['id_pelayanan' => $data[$i]], 'akun_tindakan');
            $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDokR], ['id_pelayanan' => $data[$i]], 'akun_non_pelayanan');

            $id_pel = $data[$i];
            $total = $this->db->query("select sum(ifnull(total,0)) total from ( SELECT sum(total_akun) total from akun_tindakan where id_pelayanan = '$id_pel'
            union all SELECT sum(total_akun) total from akun_non_pelayanan where id_pelayanan = '$id_pel') as b")->row();

            $this->M_Kasir->insert_tindakan(['id_pelayanan' => $data[$i], 'no_jurnal' => $noDokR, 'total' => $total->total], 'pendapatan_hutang');
        }

        ///////////////DEPOSITE SELISIH////////////////////////
        for ($i = 0; $i < count($data); $i++) {


            $db_deposite = $this->M_Jurnal_pendapatan_nontunai->selectPendapatanKasir($data[$i]);

            // $selisih = $this->M_Jurnal_pendapatan_nontunai->getSelisih($data[$i]);
            for ($p = 0; $p < count($db_deposite); $p++) {
                $jurnal_cara_bayar1 = [

                    'id_jurnal' => $data[$i],
                    'jk' => '10',
                    'rekening' => '403.01.000',
                    'deskripsi' => 'DEPOSITE ' . $db_deposite[$p]->keterangan . ' ' . $db_deposite[$p]->bank . ' ATAS NAMA ' . $db_deposite[$p]->pasien,
                    'no_jurnal' => $noDok,
                    'kredit' => 0,
                    'debet' => $db_deposite[$p]->total_akun,
                    'lap' => lap,
                    'jb' => '',
                    'cj' => '101',
                    'pk' => $db_deposite[$p]->pasien,
                    'tgl' => $tgl,
                    'tgl_input' => date('Y-m-d H:i:s'),
                    'des_rek' => 'DEPOSITE ' . $db_deposite[$p]->keterangan . ' ' . $db_deposite[$p]->bank . ' ATAS NAMA ' . $db_deposite[$p]->pasien,
                    'staff' => $staff->nama,
                    'cara_klaim' => 'SELISIH',
                    'ket_bayar' => 'non tunai',
                    'jenis_jurnal' => $this->input->post('jenis_pelayanan'),
                    'id_vendor' => $db_deposite[$p]->kode_pelanggan
                ];
                $this->M_Kasir->insert_tindakan($jurnal_cara_bayar1, 'jurnal_cara_pembayaran');
            }
        }


        $selisih = $this->M_Jurnal_pendapatan_nontunai->select_selisih_nontunai($noDok);
        $total_selisih = isset($selisih) ? $selisih->total : 0;
        /////////////////////////////////////////

        /////REDUKSI///////////////////////
        $page_data_reduksi = $this->M_Jurnal_pendapatan_nontunai->Set_jurnal_reduksi($noDok);

        if ($cara_bayar->diskon != 0 && count($page_data_reduksi) == 0) {
            if ($this->input->post('jenis_pelayanan') == 'RAJAL') {
                $reduksi_carabayar = $this->M_Jurnal_pendapatan_nontunai->reduksi_carabayar_rajal($noDok);
            } else {
                $reduksi_carabayar = $this->M_Jurnal_pendapatan_nontunai->reduksi_carabayar_ranap($noDok);
            }

            // print_r($reduksi_carabayar);
            foreach ($reduksi_carabayar as $pelayanan => $key) {
                foreach ($key as  $row) {
                    // for ($h = 0; $h < count($reduksi_carabayar); $h++) {
                    $arr1 = explode(".", $row->kode_akun);
                    $jurnal_reduksi_klaim = [
                        'id_jurnal' => $row->id_pelayanan,
                        'id_fk' => $row->id_pelayanan,
                        'jk' => $jk,
                        'rekening' => $row->kode_akun,
                        'deskripsi' => $row->jenis_akun . ' ATAS NAMA ' . $row->pasien,
                        'no_jurnal' => $noDok,
                        'kredit' => 0,
                        'debet' => ($row->total - $row->selisih) * $cara_bayar->diskon,
                        'lap' => $row->lap,
                        'jb' => $arr1[2],
                        'cj' => '101',
                        'pk' => $row->pasien,
                        'tgl' => $tgl,
                        'tgl_input' => date('Y-m-d H:i:s'),
                        'des_rek' => $row->jenis_akun . ' ATAS NAMA ' . $row->pasien,
                        'staff' => $staff->nama,
                        'cara_klaim' => 'REDUKSI',
                        'ket_bayar' => 'non tunai',
                        'jenis_jurnal' => $this->input->post('jenis_pelayanan'),
                        'id_vendor' => $row->kode_pelanggan
                    ];
                    $this->M_Kasir->insert_tindakan($jurnal_reduksi_klaim, 'jurnal_cara_pembayaran');
                }
            }
            $total_reduksi = array_sum(array_column($reduksi_carabayar, 'total_akun'));
            $total_reduksi = isset($total_reduksi) ? $total_reduksi : 0;
        } else {
            // $page_data_reduksi = $this->M_Jurnal_pendapatan_nontunai->Set_jurnal_reduksi($noDok);

            for ($r = 0; $r < count($page_data_reduksi); $r++) {
                $arr2 = explode(".", $page_data_reduksi[$r]->kode_akun);

                $jurnal_reduksi = [
                    'id_jurnal' => $page_data_reduksi[$r]->id_pelayanan,
                    'id_fk' => $page_data_reduksi[$r]->id_pelayanan,
                    'jk' => $jk,
                    'rekening' => $page_data_reduksi[$r]->kode_akun,
                    'deskripsi' => $page_data_reduksi[$r]->jenis_akun . ' ATAS NAMA ' . $page_data_reduksi[$r]->pasien,
                    'no_jurnal' => $noDok,
                    'kredit' => 0,
                    'debet' => $page_data_reduksi[$r]->total_akun,
                    'lap' => lap,
                    'jb' => $arr2[2],
                    'cj' => '101',
                    'pk' => $page_data_reduksi[$r]->pasien,
                    'tgl' => $tgl,
                    'tgl_input' => date('Y-m-d H:i:s'),
                    'des_rek' => $page_data_reduksi[$r]->jenis_akun . ' ATAS NAMA ' . $page_data_reduksi[$r]->pasien,
                    'staff' => $staff->nama,
                    'cara_klaim' => 'REDUKSI',
                    'ket_bayar' => 'non tunai',
                    'jenis_jurnal' => $this->input->post('jenis_pelayanan'),
                    'id_vendor' => $page_data_reduksi[$r]->kode_pelanggan
                ];
                $this->M_Kasir->insert_tindakan($jurnal_reduksi, 'jurnal_cara_pembayaran');
                $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDok], ['id_akun' => $page_data_reduksi[$r]->id_akun], 'akun_reduksi');
            }
            $total_reduksi = array_sum(array_column($page_data_reduksi, 'total_akun'));
            $total_reduksi = isset($total_reduksi) ? $total_reduksi : 0;
        }




        $db_jurnal = $this->M_Jurnal_pendapatan_nontunai->selectJurnalNontunai($noDok);

        $rekening = '113.01.000';
        $des_rek =  'PYMHD - ' . $cara_bayar->nama;
        $ket = $cara_bayar->nama;

        $jurnal_cara_bayar = [

            'id_jurnal' => $id_fk,
            'jk' => $jk,
            'rekening' => $rekening,
            'deskripsi' => $des_rek,
            'no_jurnal' => $noDok,
            'kredit' => 0,
            'debet' => $db_jurnal->sisa,
            'lap' => lap,
            'jb' => '',
            'cj' => '101',
            'pk' => $id_vendor,
            'tgl' => $this->input->post('jurnal'),
            'tgl_input' => date('Y-m-d H:i:s'),
            'des_rek' => $des_rek,
            'staff' => $staff->nama,
            'cara_klaim' => $ket,
            'ket_bayar' => 'non tunai',
            'jenis_jurnal' => $this->input->post('jenis_pelayanan'),
            'id_vendor' => $id_vendor

        ];
        $this->M_Kasir->insert_tindakan($jurnal_cara_bayar, 'jurnal_cara_pembayaran');
        $this->M_Kasir->update_tindakan(['status' => 1], ['no_jurnal' => $noDok], 'jurnal_pendapatan');


        //PPN DIBEBASKAN
        $db_ppn_bebas = $this->M_Jurnal_pendapatan->get_total_revenue($noDok);
        $total_reduksi = $this->M_Jurnal_pendapatan->get_total_reduksi($noDok)->reduksi;

        $des_rek_k = 'PPN Keluaran Lainnya dan Non Wapu';
        $total_ppn = ($db_ppn_bebas->total - $total_reduksi) * 0.11;
        $jurnal_cara_bayar3 = [

            'id_jurnal' => $id_fk,
            'jk' => '10',
            'rekening' => '409.03.000',
            'deskripsi' => $des_rek_k,
            'no_jurnal' => $noDok,
            'kredit' => 0,
            'debet' => $total_ppn - $db_ppn_bebas->ppn,
            'lap' => lap,
            'jb' => '',
            'cj' => '101',
            'pk' => date('dmy', strtotime($tgl)),
            'tgl' => $tgl,
            'tgl_input' => date('Y-m-d H:i:s'),
            'des_rek' => $des_rek_k,
            'staff' => $staff->nama,
            'cara_klaim' => '',
            'ket_bayar' => 'tunai',
            'jenis_jurnal' => 'RAJAL',
            'id_vendor' => $id_vendor

        ];
        $this->M_Kasir->insert_tindakan($jurnal_cara_bayar3, 'jurnal_cara_pembayaran');

        $jurnal_pendapatan2 = [
            'id_fk' => $id_fk,
            'jk' => '10',
            'rekening' => '409.03.000',
            'deskripsi' => $des_rek_k,
            'no_jurnal' => $noDok,
            'no_index' => $max + 1,
            'jenis' => $kode,
            'kredit' => $total_ppn - $db_ppn_bebas->ppn,
            'debet' => 0,
            'lap' => lap,
            'jb' => '',
            'cj' => '101',
            'pk' => date('dmy', strtotime($tgl)),
            'tgl' => $tgl,
            'tgl_input' => date('Y-m-d H:i:s'),
            'des_rek' => $des_rek_k,
            'staff' => $staff->nama,
            'kode_check' => $kode_fk,
            'id_vendor' => $id_vendor,

        ];
        $this->M_Kasir->insert_tindakan($jurnal_pendapatan2, 'jurnal_pendapatan');
        // $this->db->trans_complete();



        $out['status'] = 'success';
        echo json_encode($out);
    }


    public function Jurnal_rajal_nontunai()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Jurnal_rajal_nontunai';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Jurnal_ranap_nontunai()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Jurnal_ranap_nontunai';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jurnal_nontunai() //non tunai
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $jenis = $this->input->post('jenis');
        $tgl = date('Y-m-d H:i:s');

        if ($this->input->post('mulai') != '' && $this->input->post('akhir') != '') {
            $page_data = $this->M_Jurnal_pendapatan_nontunai->SelectRajalNonTunai_pasien($first_date, $second_date, $jenis);
        } else {
            $page_data = $this->M_Jurnal_pendapatan_nontunai->SelectRajalNonTunai_pasien($tgl, $tgl, $jenis);
        }
        $out = null;


        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;

            $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->no_jurnal . "'><label ></label></div>";

            $tgl = indo_date2($page_data[$i]->tgl);
            $no_jurnal = $page_data[$i]->no_jurnal;
            $vendor = $page_data[$i]->vendor;
            // $vendor = '';

            $total = number_format($page_data[$i]->debet, 2, ',', '.');
            $staff = $page_data[$i]->staff;

            $out[$i] = array($checkbox, $no, $tgl, $no_jurnal, $vendor, $total, $staff);
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
    public function setJurnal_Nontunai()
    {
        $out = null;
        $tgl = $this->input->post('jurnal');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $staff = $this->session->userdata('data_auth');

        $data = $this->input->post('req');

        for ($i = 0; $i < count($data); $i++) {
            // $a[] = $this->db->query("SELECT * from jurnal_cara_pembayaran where id_jurnal_bayar = '$data[$i]'")->row();
            $a[] = $this->M_Jurnal_pendapatan_nontunai->SelectJurnal_NonTunai($data[$i]);
        }
        $count_vendor = array_count_values(array_column($a, 'vendor'));

        if (count($count_vendor) > 1) {
            $out['status'] = 'Jurnal hanya dilakukan dengan penjamin yang sama';
        } else {
            $this->db->trans_start();

            $kode = '304';
            $maxR = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl)->max;
            $noValidR =  sprintf('%04d', $maxR + 1, 'dyhtdyu');
            $noDokR = $noValidR . "/" . "GL-" . $kode . "/" . date('my', strtotime($tgl));

            $dokumen = ['no_dokumen' => $noDokR, 'no_index' => $maxR + 1, 'kode' => $kode, 'tgl' => $tgl, 'staff' => $staff->nama];
            $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');

            $noDok = $noDokR;
            $max = $maxR;
            $kode = '304';
            $pk = 'N'.lap.'DN' . date('my', strtotime($tgl)) . $noValidR;
            $jk = '15';

            foreach ($a as $rows) {


                $jurnal_pendapatan = [
                    'jk' => 10,
                    'rekening' => $rows->rekening,
                    'deskripsi' => $rows->des_rek,
                    'no_jurnal' => $noDok,
                    'kredit' => $rows->debet,
                    'debet' => 0,
                    'lap' => $rows->lap,
                    'jb' => '',
                    'cj' => '101',
                    'pk' => $pk,
                    'id_fk' => $rows->no_jurnal,
                    'tgl' => $this->input->post('jurnal'),
                    'tgl_input' => date('Y-m-d H:i:s'),
                    'des_rek' => $rows->des_rek,
                    'staff' => $staff->nama,
                    'cara_klaim' => $rows->cara_klaim,
                    'ket_bayar' => 'non tunai',
                    'jenis_jurnal' => $jenis_pelayanan,
                    'id_vendor' => $rows->id_vendor

                ];
                $this->M_Kasir->insert_tindakan($jurnal_pendapatan, 'jurnal_piutang');

                $this->M_Kasir->update_tindakan(['status_piutang' => 1], ['no_jurnal' => $rows->no_jurnal], 'jurnal_cara_pembayaran');
            }

            $db = $this->M_Jurnal_pendapatan_nontunai->Select_Sum_Jurnal_NonTunai($noDok);
            $db_coa = $this->db->query("SELECT u.* FROM cara_bayar c, coa_unit u where c.kelompok_pelanggan = u.unit_rs and c.kode_pelanggan ='$db->id_vendor'")->row();

            $rekening = $db_coa->kode_rs;

            $arr = explode(".", $rekening);
            if ($arr[0] == '950') {
                $des_rek =  'R/K Antar Unit Usaha - ' . $db_coa->unit_rs;
            } else {
                $des_rek =  'PIUTANG - ' . $db->cara_klaim;
            }

            $jurnal_cara_bayar = [
                'jk' => 15,
                'rekening' => $rekening,
                'deskripsi' => $des_rek,
                'no_jurnal' => $noDok,
                'kredit' => 0,
                'debet' => $db->total,
                'lap' => lap,
                'jb' => $arr[2],
                'cj' => '101',
                'pk' => $pk,
                'id_fk' => '',
                'tgl' => $this->input->post('jurnal'),
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des_rek,
                'staff' => $staff->nama,
                'cara_klaim' => $db->cara_klaim,
                'ket_bayar' => 'non tunai',
                'jenis_jurnal' => $jenis_pelayanan,
                'id_vendor' => $db->id_vendor

            ];
            $this->M_Kasir->insert_tindakan($jurnal_cara_bayar, 'jurnal_piutang');

            $this->db->trans_complete();

            $out['status'] = 'success';
        }

        echo json_encode($out);
    }

    public function Verifikasi_jurnal($jenis)
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Verifikasi_jurnal_piutang';
        $page_data['jenis'] = $jenis;
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jurnal_piutang()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $jenis = $this->input->post('jenis');
        $authstaff = $this->session->userdata('data_auth');

        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Jurnal_keuangan->SelectJurnalPiutang($first_date, $second_date, $jenis);
        } else {
            $page_data = $this->M_Jurnal_keuangan->SelectJurnalPiutang('', '', $jenis);
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;


            $no_jurnal = $page_data[$i]->no_jurnal;
            $debet = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $pk = $page_data[$i]->pk;
            if ($page_data[$i]->verifikasi == 0) {
                $verif = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>VERIFIKASI</button>";
            } else {
                $verif = '<span class="label label-success">DISETUJUI</span>';
            }
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='setJurnal(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\")' '><i class='icon-printer '></i></button>";


            if ($authstaff->username == '20171033') {
                $balik = "<button title='Batal Jurnal' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='batal_jurnal(\"" . $jenis . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='icon-trash'></i></button>";
            } else {
                $balik = "";
            }
            $out[$i] = array($no, $verif, $cetak, $tgl, $no_jurnal, $debet, $staff, $balik);
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

    public function Laporan_summary_nontunai($jenis)
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Laporan_summary_jurnal_nontunai';
        $page_data['jenis'] = $jenis;
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_summary_nontunai()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $jenis = $this->input->post('jenis');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Jurnal_pendapatan_nontunai->SelectRangeLaporanSummary($first_date, $second_date, $jenis);
        } else {
            $page_data = $this->M_Jurnal_pendapatan_nontunai->SelectRangeLaporanSummary($tgl, $tgl, $jenis);
        }


        for ($i = 0; $i < count($page_data); $i++) {

            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;


            $no_jurnal = $page_data[$i]->no_jurnal;
            $debet = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $pk = $page_data[$i]->pk;
            $cara_klaim = $page_data[$i]->cara_klaim;
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='setJurnal(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\")' '><i class='icon-printer '></i></button>";
            if ($jenis == 'PIUTANG') {
                $detail = "<a class='btn btn-info btn-icon-anim btn-square' title='PDF' href='" . base_url('Jurnal_keuangan_nontunai/cetak_detail_pdf/') . urlencode(base64_encode($page_data[$i]->no_jurnal)) . "'><i class='icon-printer '></i></button>
                <a class='btn btn-success btn-icon-anim btn-square' title='Excel' href='" . base_url('Jurnal_keuangan_nontunai/download_excel/') . urlencode(base64_encode($page_data[$i]->no_jurnal)) . "'><i class='fa fa-download'></i></button>";
                $kwitansi = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='kwitansi(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $pk . "\")' '><i class='icon-printer '></i></a>";
                $penagihan = "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='penagihan(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $pk . "\")' '><i class='icon-printer '></i></button>";
                $invoice = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='invoice(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $pk . "\")' '><i class='icon-printer '></i></button>";
            } else {
                $detail = "<a class='btn btn-info btn-icon-anim btn-square' href='" . base_url('Jurnal_keuangan/cetak_detail_pdf/') . urlencode(base64_encode($page_data[$i]->no_jurnal)) . "'><i class='icon-printer '></i></button>";
                $kwitansi = "";
                $penagihan = "";
                $invoice = "";
            }

            $out[$i] = array($no, $cetak, $detail, $kwitansi, $invoice, $penagihan, $tgl, $no_jurnal, $cara_klaim, $debet, $staff);
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

    public function cetak_detail_pdf($no_jurnal)
    {
        $this->load->library('pdf');
        $this->data['title']    = 'Laporan';

        $no_jurnal = base64_decode(urldecode($no_jurnal));
        $page_data['jurnal'] = $this->M_Jurnal_keuangan->getDataJurnal($no_jurnal);

        $page_data['no_jurnal'] = $no_jurnal;
        $page_data['data'] = $this->M_Jurnal_pendapatan_nontunai->getDetail($no_jurnal);

        $this->dompdf->setPaper('A4', 'landscape');
        $html = $this->load->view('jurnal_print/cetak_detail_jurnal_piutang', $page_data, true);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
        $this->dompdf->render();
        $this->dompdf->stream("Rekapitulasi Pasien.pdf", array("Attachment" => 0));
    }

     public function download_excel($no_jurnal)
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

        $no_jurnal = base64_decode(urldecode($no_jurnal));
        $jurnal = $this->M_Jurnal_keuangan->getDataJurnal($no_jurnal);

        $rekap = $this->M_Jurnal_pendapatan_nontunai->getDetail($no_jurnal);

        $sheet->setCellValue('A1', "REKAPITULASI PASIEN"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A3', "Tanggal :" . strtoupper(indo_date2($jurnal->tgl))); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('A4', "No. Jurnal :" . $no_jurnal); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('A5', "No. Invoice :" . $jurnal->pk); // Set kolom A3 dengan tulisan "NO"

        $sheet->setCellValue('B6', "No"); // Set kolom B3 dengan tulisan "NIS"
        $sheet->setCellValue('C6', "Tgl. Inv"); // Set kolom C3 dengan tulisan "NAMA"
        $sheet->setCellValue('D6', "No Reg"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('E6', "Tgl Reg"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('F6', "No MedRec"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('G6', "Nama"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('H6', "Sts"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('I6', "Penanggung"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('J6', "No. Pegawai"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('K6', "Dokter");
        $sheet->setCellValue('L6', "Poli");
        $sheet->setCellValue('M6', "Kelas");
        $sheet->setCellValue('N6', "Administrasi"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('O6', "Konsultasi");
        $sheet->setCellValue('P6', "Visite");
        $sheet->setCellValue('Q6', "Tindakan");
        $sheet->setCellValue('R6', "Radiologi");
        $sheet->setCellValue('S6', "Laboratorium");
        $sheet->setCellValue('T6', "Obat & BMHP RAJAL");
        $sheet->setCellValue('U6', "Obat & BMHP NON RAJAL");
        $sheet->setCellValue('V6', "PPN Obat");
        $sheet->setCellValue('W6', "Total");
        $sheet->setCellValue('X6', "Selisih Bayar/Deposit");
        $sheet->setCellValue('Y6', "Total Billing");
        $sheet->setCellValue('Z6', "Diskon");
        $sheet->setCellValue('AA6', "Tagihan");
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        // $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B6:AA6')->applyFromArray($style_col);
        // $sheet->getStyle('C6')->applyFromArray($style_col);
        // $sheet->getStyle('D6')->applyFromArray($style_col);
        // $sheet->getStyle('E6')->applyFromArray($style_col);
        // $sheet->getStyle('F6')->applyFromArray($style_col);
        // $sheet->getStyle('G6')->applyFromArray($style_col);
        // $sheet->getStyle('H6')->applyFromArray($style_col);
        // $sheet->getStyle('I6')->applyFromArray($style_col);
        // $sheet->getStyle('J6')->applyFromArray($style_col);
        // $sheet->getStyle('K6')->applyFromArray($style_col);
        // $sheet->getStyle('L6')->applyFromArray($style_col);
        // $sheet->getStyle('M6')->applyFromArray($style_col);
        // $sheet->getStyle('N6')->applyFromArray($style_col);
        // $sheet->getStyle('O6')->applyFromArray($style_col);
        // $sheet->getStyle('P6')->applyFromArray($style_col);
        // $sheet->getStyle('Q6')->applyFromArray($style_col);
        // $sheet->getStyle('R6')->applyFromArray($style_col);
        // $sheet->getStyle('S6')->applyFromArray($style_col);
        // $sheet->getStyle('T6')->applyFromArray($style_col);
        // $sheet->getStyle('U6')->applyFromArray($style_col);
        // $sheet->getStyle('V6')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya

        $no = 0; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 7; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($rekap as $row) { // Lakukan looping pada variabel siswa
            if ($row['jenis_jurnal'] == 'RANAP') {
                $data_kelas = $this->M_Jurnal_pendapatan_nontunai->getKelas($row['id_pelayanan']);
                $kelas = $data_kelas->kelas;
            }else{
                $kelas='-';
            }
            // $svheet->setCellValue('A' . $numrow, $no);

            $piutang = round($row['total']) - round($row['selisih']) - ($row['reduksi']);

            if (preg_match('/pl_/i', $row['id_pelayanan'])) {
                $arr = explode("_", $row['id_pelayanan']);
                $kode = $arr[1];
            } else {
                $kode = $row['id_pelayanan'];
            }
            $sheet->setCellValue('B' . $numrow, $no + 1);
            $sheet->setCellValue('C' . $numrow, indo_date2($row['tgl_keluar']));
            $sheet->setCellValue('D' . $numrow, 'RS01' . $kode);
            $sheet->setCellValue('E' . $numrow, indo_date2($row['tgl_masuk']));
            $sheet->setCellValue('F' . $numrow, sprintf('%06d', $row['no_rm']));
            $sheet->setCellValue('G' . $numrow, $row['nama']);
            $sheet->setCellValue('H' . $numrow, $row['nama_ayah']);
            $sheet->setCellValue('I' . $numrow, $row['nama_ibu']);
            $sheet->setCellValue('J' . $numrow, $row['no_id_lain']);
            $sheet->setCellValue('K' . $numrow, $row['dokter']);
            $sheet->setCellValue('L' . $numrow, $row['poli']);
            $sheet->setCellValue('M' . $numrow, $kelas);
            $sheet->setCellValue('N' . $numrow, round($row['adm']));
            $sheet->setCellValue('O' . $numrow, round($row['konsul']));
            $sheet->setCellValue('P' . $numrow, round($row['visite']));
            $sheet->setCellValue('Q' . $numrow, round($row['tindakan']));
            $sheet->setCellValue('R' . $numrow, round($row['radiologi']));
            $sheet->setCellValue('S' . $numrow, round($row['labor']));
            $sheet->setCellValue('T' . $numrow, round($row['obat']));
            $sheet->setCellValue('U' . $numrow, round($row['obat_ranap']));
            $sheet->setCellValue('V' . $numrow, round($row['ppn_obat']));
            $sheet->setCellValue('W' . $numrow, round($row['total']));
            $sheet->setCellValue('X' . $numrow, round($row['selisih']));
            $sheet->setCellValue('Y' . $numrow, ($row['total']) - ($row['selisih']));
            $sheet->setCellValue('Z' . $numrow, ($row['reduksi']));
            $sheet->setCellValue('AA' . $numrow, $piutang);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            // $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow . ':AA' . $numrow)->applyFromArray($style_row);
            $spreadsheet->getActiveSheet()->getStyle('N' . $numrow . ':AA' . $numrow)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_ACCOUNTING);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $sheet->getDefaultColumnDimension()->setWidth(-1); // Set width kolom A
        // $sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B
        // $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
        // $sheet->getColumnDimension('D')->setWidth(20); // Set width kolom D
        // $sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle($jurnal->pk);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Laporan Rekapitulasi Pasien No Invoice "' . $jurnal->pk . '.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    function batal_jurnal()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $jenis = $this->input->post('jenis');
        if ($jenis == 'PYMHD') {

            $this->M_Kasir->delete_tindakan(['no_jurnal' => $no_jurnal], 'jurnal_pendapatan');
            $this->M_Kasir->delete_tindakan(['no_jurnal' => $no_jurnal], 'jurnal_cara_pembayaran');
            $this->M_Kasir->update_tindakan(['no_jurnal' => NULL, 'status' => 0], ['no_jurnal' => $no_jurnal], 'akun_tindakan');
            $this->M_Kasir->update_tindakan(['no_jurnal' => NULL, 'status' => 0], ['no_jurnal' => $no_jurnal], 'akun_non_pelayanan');
            $this->M_Kasir->update_tindakan(['no_jurnal' => NULL, 'status' => 0], ['no_jurnal' => $no_jurnal], 'akun_reduksi');
        } else {
            $db = $this->db->get_where('jurnal_piutang ', ['no_jurnal' => $no_jurnal])->result();
            foreach ($db as $row) {
                $this->M_Kasir->update_tindakan(['status_piutang' => 0], ['no_jurnal' => $row->id_fk], 'jurnal_cara_pembayaran');
            }
            $this->M_Kasir->delete_tindakan(['no_jurnal' => $no_jurnal], 'jurnal_piutang');
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
class Jurnal_keuangan_nontunai extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Jurnal_keuangan');
        $this->load->model('M_Jurnal_pendapatan');
        $this->load->model('M_Jurnal_pendapatan_nontunai');
        $this->load->model('M_Kasir');
    }


    public function tampil_RangeLaporan_jurnal_rajal() //non tunai
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $jenis_klaim = $this->input->post('jenis_klaim');
        if ($this->input->post('mulai') != '' && $this->input->post('akhir') != '') {
            $page_data = $this->M_Jurnal_keuangan->SelectLaporanRajalNonTunai_pasien($first_date, $second_date, $jenis_klaim);
        } else {
            $page_data = $this->M_Jurnal_keuangan->SelectLaporanRajalNonTunai_pasien('', '', $jenis_klaim);
        }
        $out = null;


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl_keluar = indo_date2($page_data[$i]->tgl_keluar);

            $no = $i + 1;

            $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_pelayanan . "'><label ></label></div>";
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;

            if ($jenis_pelayanan == 'MCU') {
                $kasir = $this->db->get_where('detail_kasir_mcu', ['id_pasien' => $page_data[$i]->id_pelayanan])->row();
            } else {
                $kasir = $this->db->get_where('deatail_kasir', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            }
            $id_pel = $page_data[$i]->id_pelayanan;
            $db_selisih = $this->M_Jurnal_pendapatan_nontunai->getSelisih($id_pel);
            $selisih = empty($db_selisih) ? 0 : $db_selisih->total;

            $diskon_kasir = empty($kasir) ? 0 : $kasir->diskon;
            if ($jenis_pelayanan == 'MCU') {
                $diskon = $diskon_kasir;
            } else {
                $diskon = ($page_data[$i]->diskon != 0) ? ($page_data[$i]->total_akun - $selisih) * $page_data[$i]->diskon : $diskon_kasir;
            }

            // $kode_akun = $page_data[$i]->kode_akun;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $revenue = number_format($page_data[$i]->total_akun, 2, ',', '.');
            $total_akun = number_format($page_data[$i]->total_akun - $selisih - $diskon, 2, ',', '.');
            // $jenis_akun = $page_data[$i]->jenis_akun;
            $no_rm = " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;

            $out[$i] = array($checkbox, $no, $tgl_keluar, $no_rm, $pasien, $jenis_pelayanan, $cara_bayar, $revenue, $total_akun);
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


    public function tampil_RangeLaporan_jurnal_ranap() //nontunai
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $jenis_klaim = $this->input->post('jenis_klaim');
        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Jurnal_keuangan->SelectLaporanRanapNonTunai_pasien($first_date, $second_date, $jenis_klaim);
        } else {
            $page_data = $this->M_Jurnal_keuangan->SelectLaporanRanapNonTunai_pasien('', '', $jenis_klaim);
        }
        $out = null;


        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_pelayanan . "'><label ></label></div>";

            $tgl_keluar = indo_date2($page_data[$i]->tgl_keluar);
            $kasir = $this->db->get_where('deatail_kasir', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();

            $id_pel = $page_data[$i]->id_pelayanan;
            $db_selisih = $this->M_Jurnal_pendapatan_nontunai->getSelisih($id_pel);
            $selisih = empty($db_selisih) ? 0 : $db_selisih->total;

            $diskon_kasir = empty($kasir) ? 0 : $kasir->diskon;
            $diskon = ($page_data[$i]->diskon != 0) ? ($page_data[$i]->total_akun - $selisih) * $page_data[$i]->diskon : $diskon_kasir;

            // $kode_akun = $page_data[$i]->kode_akun;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $revenue = number_format($page_data[$i]->total_akun, 2, ',', '.');
            $total_akun = number_format($page_data[$i]->total_akun - $selisih - $diskon, 2, ',', '.');
            // $jenis_akun = $page_data[$i]->jenis_akun;
            $no_rm = " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;

            $out[$i] = array($checkbox, $no, $tgl_keluar, $no_rm, $pasien, $jenis_pelayanan, $cara_bayar, $revenue, $total_akun);
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


    public function setJurnal_Nontunai_pymhd()
    {

        $out = null;
        $tgl = $this->input->post('jurnal');
        $staff = $this->session->userdata('data_auth');
        $jenis_klaim = $this->input->post('jenis_klaim');

        $kode = '304';
        $maxR = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl)->max;
        $noValidR =  sprintf('%04d', $maxR + 1, 'dyhtdyu');
        $noDokR = $noValidR . "/" . "GL-" . $kode . "/" . date('my', strtotime($tgl));

        $dokumen = ['no_dokumen' => $noDokR, 'no_index' => $maxR + 1, 'kode' => $kode, 'tgl' => $tgl, 'staff' => $staff->nama];
        $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');

        // $this->db->trans_start();

        $data = $this->input->post('req');
        for ($i = 0; $i < count($data); $i++) {
            // $a[] = $this->db->query("SELECT * from jurnal_cara_pembayaran where id_jurnal_bayar = '$data[$i]'")->row();
            $a[] = $this->M_Jurnal_pendapatan_nontunai->Set_jurnal_nontunai($data[$i]);
        }



        $cara_bayar = $this->db->get_where('cara_bayar', ['id_cara_bayar' => $jenis_klaim])->row();
        $id_vendor = $cara_bayar->kode_pelanggan;

        $noDok = $noDokR;
        $max = $maxR;
        $kode = '304';
        $jk = '15';
        $kode_fk = implode("", [uniqid(), $staff->username]);
        $id_fk = uniqid();

        $groups = array();
        // print_arr($a);
        foreach ($a as $b) {
            foreach ($b as $item) {
                $key = $item->kode_akun;

                if (!array_key_exists($key, $groups)) {
                    $groups[$key] = array(
                        'kode_akun' => $item->kode_akun,
                        'jenis_akun' => $item->jenis_akun,
                        'total_akun' => $item->total_akun,
                        'id_fk' => $item->id_fk,
                        'lap' => $item->lap,
                    );
                } else {
                    $groups[$key]['total_akun'] = $groups[$key]['total_akun'] + $item->total_akun;
                }
            }
        }
        // print_r($groups);
        ////////////////////////jurnal revenue//////////////////
        foreach ($groups as $rows) {
            $arr = explode(".", $rows['kode_akun']);

            if ($arr[0] == '409') {
                $des = "PPN OBAT";
            } else {

                $a = $this->db->get_where('daftar_akun', ['kode' => $arr[0]])->row()->deskripsi;
                if ($arr[0] == '701') {
                    $b = $this->db->get_where('list_poli', ['kode_coa' => $arr[1]])->row()->nama_panjang;
                } else if ($arr[0] == '702') {
                    $b = $this->db->get_where('ruangan', ['kode_coa' => $arr[1]])->row()->kelas;
                } else if ($arr[0] == '703' || $arr[0] == '704') {
                    $b = '';
                } else {
                    $b = '';
                }
                $c = $rows['jenis_akun'];

                // if ($page_data1[$i]->jenis_bayar == 'tunai') {
                $des = $a . ' ' . $b . ' ' . $c;
                // } else {
                //     $pasien = $this->db->get_where('v_kunjungan', ['id_pelayanan' => $page_data1[$i]->id_pelayanan])->row();
                //     $des = $a . ' ' . $b . ' ' . $c . ' ' . $pasien->nama . ' (' . " " . sprintf('%06d', $pasien->no_rm) . ')';
                // }
            }
            $jurnal_pendapatan = [
                'id_fk' => $rows['id_fk'],
                'jk' => $jk,
                'rekening' => $rows['kode_akun'],
                'deskripsi' => $des,
                'no_jurnal' => $noDok,
                'no_index' => $max + 1,
                'jenis' => $kode,
                'kredit' => $rows['total_akun'],
                'debet' => 0,
                'lap' => $rows['lap'],
                'jb' => $arr[2],
                'cj' => '101',
                'pk' => $id_vendor,
                'tgl' => $this->input->post('jurnal'),
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des,
                'staff' => $staff->nama,
                'id_vendor' => $id_vendor

            ];
            $this->M_Kasir->insert_tindakan($jurnal_pendapatan, 'jurnal_pendapatan');
        }

        /////////////UPDATE AKUN/////////////////////////
        for ($i = 0; $i < count($data); $i++) {
            $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDokR], ['id_pelayanan' => $data[$i]], 'akun_tindakan');
            $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDokR], ['id_pelayanan' => $data[$i]], 'akun_non_pelayanan');

            $id_pel = $data[$i];
            $total = $this->db->query("select sum(ifnull(total,0)) total from ( SELECT sum(total_akun) total from akun_tindakan where id_pelayanan = '$id_pel'
            union all SELECT sum(total_akun) total from akun_non_pelayanan where id_pelayanan = '$id_pel') as b")->row();

            $this->M_Kasir->insert_tindakan(['id_pelayanan' => $data[$i], 'no_jurnal' => $noDokR, 'total' => $total->total], 'pendapatan_hutang');
        }

        ///////////////DEPOSITE SELISIH////////////////////////
        for ($i = 0; $i < count($data); $i++) {


            $db_deposite = $this->M_Jurnal_pendapatan_nontunai->selectPendapatanKasir($data[$i]);

            // $selisih = $this->M_Jurnal_pendapatan_nontunai->getSelisih($data[$i]);
            for ($p = 0; $p < count($db_deposite); $p++) {
                $jurnal_cara_bayar1 = [

                    'id_jurnal' => $data[$i],
                    'jk' => '10',
                    'rekening' => '403.01.000',
                    'deskripsi' => 'DEPOSITE ' . $db_deposite[$p]->keterangan . ' ' . $db_deposite[$p]->bank . ' ATAS NAMA ' . $db_deposite[$p]->pasien,
                    'no_jurnal' => $noDok,
                    'kredit' => 0,
                    'debet' => $db_deposite[$p]->total_akun,
                    'lap' => lap,
                    'jb' => '',
                    'cj' => '101',
                    'pk' => $db_deposite[$p]->pasien,
                    'tgl' => $tgl,
                    'tgl_input' => date('Y-m-d H:i:s'),
                    'des_rek' => 'DEPOSITE ' . $db_deposite[$p]->keterangan . ' ' . $db_deposite[$p]->bank . ' ATAS NAMA ' . $db_deposite[$p]->pasien,
                    'staff' => $staff->nama,
                    'cara_klaim' => 'SELISIH',
                    'ket_bayar' => 'non tunai',
                    'jenis_jurnal' => $this->input->post('jenis_pelayanan'),
                    'id_vendor' => $db_deposite[$p]->kode_pelanggan
                ];
                $this->M_Kasir->insert_tindakan($jurnal_cara_bayar1, 'jurnal_cara_pembayaran');
            }
        }


        $selisih = $this->M_Jurnal_pendapatan_nontunai->select_selisih_nontunai($noDok);
        $total_selisih = isset($selisih) ? $selisih->total : 0;
        /////////////////////////////////////////

        /////REDUKSI///////////////////////
        $page_data_reduksi = $this->M_Jurnal_pendapatan_nontunai->Set_jurnal_reduksi($noDok);

        if ($cara_bayar->diskon != 0 && count($page_data_reduksi) == 0) {
            if ($this->input->post('jenis_pelayanan') == 'RAJAL') {
                $reduksi_carabayar = $this->M_Jurnal_pendapatan_nontunai->reduksi_carabayar_rajal($noDok);
            } else {
                $reduksi_carabayar = $this->M_Jurnal_pendapatan_nontunai->reduksi_carabayar_ranap($noDok);
            }

            // print_r($reduksi_carabayar);
            foreach ($reduksi_carabayar as $pelayanan => $key) {
                foreach ($key as  $row) {
                    // for ($h = 0; $h < count($reduksi_carabayar); $h++) {
                    $arr1 = explode(".", $row->kode_akun);
                    $jurnal_reduksi_klaim = [
                        'id_jurnal' => $row->id_pelayanan,
                        'id_fk' => $row->id_pelayanan,
                        'jk' => $jk,
                        'rekening' => $row->kode_akun,
                        'deskripsi' => $row->jenis_akun . ' ATAS NAMA ' . $row->pasien,
                        'no_jurnal' => $noDok,
                        'kredit' => 0,
                        'debet' => ($row->total - $row->selisih) * $cara_bayar->diskon,
                        'lap' => $row->lap,
                        'jb' => $arr1[2],
                        'cj' => '101',
                        'pk' => $row->pasien,
                        'tgl' => $tgl,
                        'tgl_input' => date('Y-m-d H:i:s'),
                        'des_rek' => $row->jenis_akun . ' ATAS NAMA ' . $row->pasien,
                        'staff' => $staff->nama,
                        'cara_klaim' => 'REDUKSI',
                        'ket_bayar' => 'non tunai',
                        'jenis_jurnal' => $this->input->post('jenis_pelayanan'),
                        'id_vendor' => $row->kode_pelanggan
                    ];
                    $this->M_Kasir->insert_tindakan($jurnal_reduksi_klaim, 'jurnal_cara_pembayaran');
                }
            }
            $total_reduksi = array_sum(array_column($reduksi_carabayar, 'total_akun'));
            $total_reduksi = isset($total_reduksi) ? $total_reduksi : 0;
        } else {
            // $page_data_reduksi = $this->M_Jurnal_pendapatan_nontunai->Set_jurnal_reduksi($noDok);

            for ($r = 0; $r < count($page_data_reduksi); $r++) {
                $arr2 = explode(".", $page_data_reduksi[$r]->kode_akun);

                $jurnal_reduksi = [
                    'id_jurnal' => $page_data_reduksi[$r]->id_pelayanan,
                    'id_fk' => $page_data_reduksi[$r]->id_pelayanan,
                    'jk' => $jk,
                    'rekening' => $page_data_reduksi[$r]->kode_akun,
                    'deskripsi' => $page_data_reduksi[$r]->jenis_akun . ' ATAS NAMA ' . $page_data_reduksi[$r]->pasien,
                    'no_jurnal' => $noDok,
                    'kredit' => 0,
                    'debet' => $page_data_reduksi[$r]->total_akun,
                    'lap' => lap,
                    'jb' => $arr2[2],
                    'cj' => '101',
                    'pk' => $page_data_reduksi[$r]->pasien,
                    'tgl' => $tgl,
                    'tgl_input' => date('Y-m-d H:i:s'),
                    'des_rek' => $page_data_reduksi[$r]->jenis_akun . ' ATAS NAMA ' . $page_data_reduksi[$r]->pasien,
                    'staff' => $staff->nama,
                    'cara_klaim' => 'REDUKSI',
                    'ket_bayar' => 'non tunai',
                    'jenis_jurnal' => $this->input->post('jenis_pelayanan'),
                    'id_vendor' => $page_data_reduksi[$r]->kode_pelanggan
                ];
                $this->M_Kasir->insert_tindakan($jurnal_reduksi, 'jurnal_cara_pembayaran');
                $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDok], ['id_akun' => $page_data_reduksi[$r]->id_akun], 'akun_reduksi');
            }
            $total_reduksi = array_sum(array_column($page_data_reduksi, 'total_akun'));
            $total_reduksi = isset($total_reduksi) ? $total_reduksi : 0;
        }




        $db_jurnal = $this->M_Jurnal_pendapatan_nontunai->selectJurnalNontunai($noDok);

        $rekening = '113.01.000';
        $des_rek =  'PYMHD - ' . $cara_bayar->nama;
        $ket = $cara_bayar->nama;

        $jurnal_cara_bayar = [

            'id_jurnal' => $id_fk,
            'jk' => $jk,
            'rekening' => $rekening,
            'deskripsi' => $des_rek,
            'no_jurnal' => $noDok,
            'kredit' => 0,
            'debet' => $db_jurnal->sisa,
            'lap' => lap,
            'jb' => '',
            'cj' => '101',
            'pk' => $id_vendor,
            'tgl' => $this->input->post('jurnal'),
            'tgl_input' => date('Y-m-d H:i:s'),
            'des_rek' => $des_rek,
            'staff' => $staff->nama,
            'cara_klaim' => $ket,
            'ket_bayar' => 'non tunai',
            'jenis_jurnal' => $this->input->post('jenis_pelayanan'),
            'id_vendor' => $id_vendor

        ];
        $this->M_Kasir->insert_tindakan($jurnal_cara_bayar, 'jurnal_cara_pembayaran');
        $this->M_Kasir->update_tindakan(['status' => 1], ['no_jurnal' => $noDok], 'jurnal_pendapatan');


        //PPN DIBEBASKAN
        $db_ppn_bebas = $this->M_Jurnal_pendapatan->get_total_revenue($noDok);
        $total_reduksi = $this->M_Jurnal_pendapatan->get_total_reduksi($noDok)->reduksi;

        $des_rek_k = 'PPN Keluaran Lainnya dan Non Wapu';
        $total_ppn = ($db_ppn_bebas->total - $total_reduksi) * 0.11;
        $jurnal_cara_bayar3 = [

            'id_jurnal' => $id_fk,
            'jk' => '10',
            'rekening' => '409.03.000',
            'deskripsi' => $des_rek_k,
            'no_jurnal' => $noDok,
            'kredit' => 0,
            'debet' => $total_ppn - $db_ppn_bebas->ppn,
            'lap' => lap,
            'jb' => '',
            'cj' => '101',
            'pk' => date('dmy', strtotime($tgl)),
            'tgl' => $tgl,
            'tgl_input' => date('Y-m-d H:i:s'),
            'des_rek' => $des_rek_k,
            'staff' => $staff->nama,
            'cara_klaim' => '',
            'ket_bayar' => 'tunai',
            'jenis_jurnal' => 'RAJAL',
            'id_vendor' => $id_vendor

        ];
        $this->M_Kasir->insert_tindakan($jurnal_cara_bayar3, 'jurnal_cara_pembayaran');

        $jurnal_pendapatan2 = [
            'id_fk' => $id_fk,
            'jk' => '10',
            'rekening' => '409.03.000',
            'deskripsi' => $des_rek_k,
            'no_jurnal' => $noDok,
            'no_index' => $max + 1,
            'jenis' => $kode,
            'kredit' => $total_ppn - $db_ppn_bebas->ppn,
            'debet' => 0,
            'lap' => lap,
            'jb' => '',
            'cj' => '101',
            'pk' => date('dmy', strtotime($tgl)),
            'tgl' => $tgl,
            'tgl_input' => date('Y-m-d H:i:s'),
            'des_rek' => $des_rek_k,
            'staff' => $staff->nama,
            'kode_check' => $kode_fk,
            'id_vendor' => $id_vendor,

        ];
        $this->M_Kasir->insert_tindakan($jurnal_pendapatan2, 'jurnal_pendapatan');
        // $this->db->trans_complete();



        $out['status'] = 'success';
        echo json_encode($out);
    }


    public function Jurnal_rajal_nontunai()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Jurnal_rajal_nontunai';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Jurnal_ranap_nontunai()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Jurnal_ranap_nontunai';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jurnal_nontunai() //non tunai
    {
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $jenis = $this->input->post('jenis');
        $tgl = date('Y-m-d H:i:s');

        if ($this->input->post('mulai') != '' && $this->input->post('akhir') != '') {
            $page_data = $this->M_Jurnal_pendapatan_nontunai->SelectRajalNonTunai_pasien($first_date, $second_date, $jenis);
        } else {
            $page_data = $this->M_Jurnal_pendapatan_nontunai->SelectRajalNonTunai_pasien($tgl, $tgl, $jenis);
        }
        $out = null;


        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;

            $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->no_jurnal . "'><label ></label></div>";

            $tgl = indo_date2($page_data[$i]->tgl);
            $no_jurnal = $page_data[$i]->no_jurnal;
            $vendor = $page_data[$i]->vendor;
            // $vendor = '';

            $total = number_format($page_data[$i]->debet, 2, ',', '.');
            $staff = $page_data[$i]->staff;

            $out[$i] = array($checkbox, $no, $tgl, $no_jurnal, $vendor, $total, $staff);
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
    public function setJurnal_Nontunai()
    {
        $out = null;
        $tgl = $this->input->post('jurnal');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $staff = $this->session->userdata('data_auth');

        $data = $this->input->post('req');

        for ($i = 0; $i < count($data); $i++) {
            // $a[] = $this->db->query("SELECT * from jurnal_cara_pembayaran where id_jurnal_bayar = '$data[$i]'")->row();
            $a[] = $this->M_Jurnal_pendapatan_nontunai->SelectJurnal_NonTunai($data[$i]);
        }
        $count_vendor = array_count_values(array_column($a, 'vendor'));

        if (count($count_vendor) > 1) {
            $out['status'] = 'Jurnal hanya dilakukan dengan penjamin yang sama';
        } else {
            $this->db->trans_start();

            $kode = '304';
            $maxR = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl)->max;
            $noValidR =  sprintf('%04d', $maxR + 1, 'dyhtdyu');
            $noDokR = $noValidR . "/" . "GL-" . $kode . "/" . date('my', strtotime($tgl));

            $dokumen = ['no_dokumen' => $noDokR, 'no_index' => $maxR + 1, 'kode' => $kode, 'tgl' => $tgl, 'staff' => $staff->nama];
            $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');

            $noDok = $noDokR;
            $max = $maxR;
            $kode = '304';
            $pk = 'N'.lap.'DN' . date('my', strtotime($tgl)) . $noValidR;
            $jk = '15';

            foreach ($a as $rows) {


                $jurnal_pendapatan = [
                    'jk' => 10,
                    'rekening' => $rows->rekening,
                    'deskripsi' => $rows->des_rek,
                    'no_jurnal' => $noDok,
                    'kredit' => $rows->debet,
                    'debet' => 0,
                    'lap' => $rows->lap,
                    'jb' => '',
                    'cj' => '101',
                    'pk' => $pk,
                    'id_fk' => $rows->no_jurnal,
                    'tgl' => $this->input->post('jurnal'),
                    'tgl_input' => date('Y-m-d H:i:s'),
                    'des_rek' => $rows->des_rek,
                    'staff' => $staff->nama,
                    'cara_klaim' => $rows->cara_klaim,
                    'ket_bayar' => 'non tunai',
                    'jenis_jurnal' => $jenis_pelayanan,
                    'id_vendor' => $rows->id_vendor

                ];
                $this->M_Kasir->insert_tindakan($jurnal_pendapatan, 'jurnal_piutang');

                $this->M_Kasir->update_tindakan(['status_piutang' => 1], ['no_jurnal' => $rows->no_jurnal], 'jurnal_cara_pembayaran');
            }

            $db = $this->M_Jurnal_pendapatan_nontunai->Select_Sum_Jurnal_NonTunai($noDok);
            $db_coa = $this->db->query("SELECT u.* FROM cara_bayar c, coa_unit u where c.kelompok_pelanggan = u.unit_rs and c.kode_pelanggan ='$db->id_vendor'")->row();

            $rekening = $db_coa->kode_rs;

            $arr = explode(".", $rekening);
            if ($arr[0] == '950') {
                $des_rek =  'R/K Antar Unit Usaha - ' . $db_coa->unit_rs;
            } else {
                $des_rek =  'PIUTANG - ' . $db->cara_klaim;
            }

            $jurnal_cara_bayar = [
                'jk' => 15,
                'rekening' => $rekening,
                'deskripsi' => $des_rek,
                'no_jurnal' => $noDok,
                'kredit' => 0,
                'debet' => $db->total,
                'lap' => lap,
                'jb' => $arr[2],
                'cj' => '101',
                'pk' => $pk,
                'id_fk' => '',
                'tgl' => $this->input->post('jurnal'),
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des_rek,
                'staff' => $staff->nama,
                'cara_klaim' => $db->cara_klaim,
                'ket_bayar' => 'non tunai',
                'jenis_jurnal' => $jenis_pelayanan,
                'id_vendor' => $db->id_vendor

            ];
            $this->M_Kasir->insert_tindakan($jurnal_cara_bayar, 'jurnal_piutang');

            $this->db->trans_complete();

            $out['status'] = 'success';
        }

        echo json_encode($out);
    }

    public function Verifikasi_jurnal($jenis)
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Verifikasi_jurnal_piutang';
        $page_data['jenis'] = $jenis;
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jurnal_piutang()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $jenis = $this->input->post('jenis');
        $authstaff = $this->session->userdata('data_auth');

        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Jurnal_keuangan->SelectJurnalPiutang($first_date, $second_date, $jenis);
        } else {
            $page_data = $this->M_Jurnal_keuangan->SelectJurnalPiutang('', '', $jenis);
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;


            $no_jurnal = $page_data[$i]->no_jurnal;
            $debet = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $pk = $page_data[$i]->pk;
            if ($page_data[$i]->verifikasi == 0) {
                $verif = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>VERIFIKASI</button>";
            } else {
                $verif = '<span class="label label-success">DISETUJUI</span>';
            }
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='setJurnal(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\")' '><i class='icon-printer '></i></button>";


            if ($authstaff->username == '20171033') {
                $balik = "<button title='Batal Jurnal' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='batal_jurnal(\"" . $jenis . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='icon-trash'></i></button>";
            } else {
                $balik = "";
            }
            $out[$i] = array($no, $verif, $cetak, $tgl, $no_jurnal, $debet, $staff, $balik);
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

    public function Laporan_summary_nontunai($jenis)
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Laporan_summary_jurnal_nontunai';
        $page_data['jenis'] = $jenis;
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_summary_nontunai()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $jenis = $this->input->post('jenis');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Jurnal_pendapatan_nontunai->SelectRangeLaporanSummary($first_date, $second_date, $jenis);
        } else {
            $page_data = $this->M_Jurnal_pendapatan_nontunai->SelectRangeLaporanSummary($tgl, $tgl, $jenis);
        }


        for ($i = 0; $i < count($page_data); $i++) {

            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;


            $no_jurnal = $page_data[$i]->no_jurnal;
            $debet = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $pk = $page_data[$i]->pk;
            $cara_klaim = $page_data[$i]->cara_klaim;
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='setJurnal(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\")' '><i class='icon-printer '></i></button>";
            if ($jenis == 'PIUTANG') {
                $detail = "<a class='btn btn-info btn-icon-anim btn-square' title='PDF' href='" . base_url('Jurnal_keuangan_nontunai/cetak_detail_pdf/') . urlencode(base64_encode($page_data[$i]->no_jurnal)) . "'><i class='icon-printer '></i></button>
                <a class='btn btn-success btn-icon-anim btn-square' title='Excel' href='" . base_url('Jurnal_keuangan_nontunai/download_excel/') . urlencode(base64_encode($page_data[$i]->no_jurnal)) . "'><i class='fa fa-download'></i></button>";
                $kwitansi = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='kwitansi(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $pk . "\")' '><i class='icon-printer '></i></a>";
                $penagihan = "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='penagihan(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $pk . "\")' '><i class='icon-printer '></i></button>";
                $invoice = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='invoice(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $pk . "\")' '><i class='icon-printer '></i></button>";
            } else {
                $detail = "<a class='btn btn-info btn-icon-anim btn-square' href='" . base_url('Jurnal_keuangan/cetak_detail_pdf/') . urlencode(base64_encode($page_data[$i]->no_jurnal)) . "'><i class='icon-printer '></i></button>";
                $kwitansi = "";
                $penagihan = "";
                $invoice = "";
            }

            $out[$i] = array($no, $cetak, $detail, $kwitansi, $invoice, $penagihan, $tgl, $no_jurnal, $cara_klaim, $debet, $staff);
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

    public function cetak_detail_pdf($no_jurnal)
    {
        $this->load->library('pdf');
        $this->data['title']    = 'Laporan';

        $no_jurnal = base64_decode(urldecode($no_jurnal));
        $page_data['jurnal'] = $this->M_Jurnal_keuangan->getDataJurnal($no_jurnal);

        $page_data['no_jurnal'] = $no_jurnal;
        $page_data['data'] = $this->M_Jurnal_pendapatan_nontunai->getDetail($no_jurnal);

        $this->dompdf->setPaper('A4', 'landscape');
        $html = $this->load->view('jurnal_print/cetak_detail_jurnal_piutang', $page_data, true);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
        $this->dompdf->render();
        $this->dompdf->stream("Rekapitulasi Pasien.pdf", array("Attachment" => 0));
    }

     public function download_excel($no_jurnal)
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

        $no_jurnal = base64_decode(urldecode($no_jurnal));
        $jurnal = $this->M_Jurnal_keuangan->getDataJurnal($no_jurnal);

        $rekap = $this->M_Jurnal_pendapatan_nontunai->getDetail($no_jurnal);

        $sheet->setCellValue('A1', "REKAPITULASI PASIEN"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A3', "Tanggal :" . strtoupper(indo_date2($jurnal->tgl))); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('A4', "No. Jurnal :" . $no_jurnal); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('A5', "No. Invoice :" . $jurnal->pk); // Set kolom A3 dengan tulisan "NO"

        $sheet->setCellValue('B6', "No"); // Set kolom B3 dengan tulisan "NIS"
        $sheet->setCellValue('C6', "Tgl. Inv"); // Set kolom C3 dengan tulisan "NAMA"
        $sheet->setCellValue('D6', "No Reg"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('E6', "Tgl Reg"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('F6', "No MedRec"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('G6', "Nama"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('H6', "Sts"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('I6', "Penanggung"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('J6', "No. Pegawai"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('K6', "Dokter");
        $sheet->setCellValue('L6', "Poli");
        $sheet->setCellValue('M6', "Kelas");
        $sheet->setCellValue('N6', "Administrasi"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('O6', "Konsultasi");
        $sheet->setCellValue('P6', "Visite");
        $sheet->setCellValue('Q6', "Tindakan");
        $sheet->setCellValue('R6', "Radiologi");
        $sheet->setCellValue('S6', "Laboratorium");
        $sheet->setCellValue('T6', "Obat & BMHP RAJAL");
        $sheet->setCellValue('U6', "Obat & BMHP NON RAJAL");
        $sheet->setCellValue('V6', "PPN Obat");
        $sheet->setCellValue('W6', "Total");
        $sheet->setCellValue('X6', "Selisih Bayar/Deposit");
        $sheet->setCellValue('Y6', "Total Billing");
        $sheet->setCellValue('Z6', "Diskon");
        $sheet->setCellValue('AA6', "Tagihan");
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        // $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B6:AA6')->applyFromArray($style_col);
        // $sheet->getStyle('C6')->applyFromArray($style_col);
        // $sheet->getStyle('D6')->applyFromArray($style_col);
        // $sheet->getStyle('E6')->applyFromArray($style_col);
        // $sheet->getStyle('F6')->applyFromArray($style_col);
        // $sheet->getStyle('G6')->applyFromArray($style_col);
        // $sheet->getStyle('H6')->applyFromArray($style_col);
        // $sheet->getStyle('I6')->applyFromArray($style_col);
        // $sheet->getStyle('J6')->applyFromArray($style_col);
        // $sheet->getStyle('K6')->applyFromArray($style_col);
        // $sheet->getStyle('L6')->applyFromArray($style_col);
        // $sheet->getStyle('M6')->applyFromArray($style_col);
        // $sheet->getStyle('N6')->applyFromArray($style_col);
        // $sheet->getStyle('O6')->applyFromArray($style_col);
        // $sheet->getStyle('P6')->applyFromArray($style_col);
        // $sheet->getStyle('Q6')->applyFromArray($style_col);
        // $sheet->getStyle('R6')->applyFromArray($style_col);
        // $sheet->getStyle('S6')->applyFromArray($style_col);
        // $sheet->getStyle('T6')->applyFromArray($style_col);
        // $sheet->getStyle('U6')->applyFromArray($style_col);
        // $sheet->getStyle('V6')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya

        $no = 0; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 7; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($rekap as $row) { // Lakukan looping pada variabel siswa
            if ($row['jenis_jurnal'] == 'RANAP') {
                $data_kelas = $this->M_Jurnal_pendapatan_nontunai->getKelas($row['id_pelayanan']);
                $kelas = $data_kelas->kelas;
            }else{
                $kelas='-';
            }
            // $svheet->setCellValue('A' . $numrow, $no);

            $piutang = round($row['total']) - round($row['selisih']) - ($row['reduksi']);

            if (preg_match('/pl_/i', $row['id_pelayanan'])) {
                $arr = explode("_", $row['id_pelayanan']);
                $kode = $arr[1];
            } else {
                $kode = $row['id_pelayanan'];
            }
            $sheet->setCellValue('B' . $numrow, $no + 1);
            $sheet->setCellValue('C' . $numrow, indo_date2($row['tgl_keluar']));
            $sheet->setCellValue('D' . $numrow, 'RS01' . $kode);
            $sheet->setCellValue('E' . $numrow, indo_date2($row['tgl_masuk']));
            $sheet->setCellValue('F' . $numrow, sprintf('%06d', $row['no_rm']));
            $sheet->setCellValue('G' . $numrow, $row['nama']);
            $sheet->setCellValue('H' . $numrow, $row['nama_ayah']);
            $sheet->setCellValue('I' . $numrow, $row['nama_ibu']);
            $sheet->setCellValue('J' . $numrow, $row['no_id_lain']);
            $sheet->setCellValue('K' . $numrow, $row['dokter']);
            $sheet->setCellValue('L' . $numrow, $row['poli']);
            $sheet->setCellValue('M' . $numrow, $kelas);
            $sheet->setCellValue('N' . $numrow, round($row['adm']));
            $sheet->setCellValue('O' . $numrow, round($row['konsul']));
            $sheet->setCellValue('P' . $numrow, round($row['visite']));
            $sheet->setCellValue('Q' . $numrow, round($row['tindakan']));
            $sheet->setCellValue('R' . $numrow, round($row['radiologi']));
            $sheet->setCellValue('S' . $numrow, round($row['labor']));
            $sheet->setCellValue('T' . $numrow, round($row['obat']));
            $sheet->setCellValue('U' . $numrow, round($row['obat_ranap']));
            $sheet->setCellValue('V' . $numrow, round($row['ppn_obat']));
            $sheet->setCellValue('W' . $numrow, round($row['total']));
            $sheet->setCellValue('X' . $numrow, round($row['selisih']));
            $sheet->setCellValue('Y' . $numrow, ($row['total']) - ($row['selisih']));
            $sheet->setCellValue('Z' . $numrow, ($row['reduksi']));
            $sheet->setCellValue('AA' . $numrow, $piutang);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            // $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow . ':AA' . $numrow)->applyFromArray($style_row);
            $spreadsheet->getActiveSheet()->getStyle('N' . $numrow . ':AA' . $numrow)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_ACCOUNTING);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $sheet->getDefaultColumnDimension()->setWidth(-1); // Set width kolom A
        // $sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B
        // $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
        // $sheet->getColumnDimension('D')->setWidth(20); // Set width kolom D
        // $sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle($jurnal->pk);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Laporan Rekapitulasi Pasien No Invoice "' . $jurnal->pk . '.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    function batal_jurnal()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $jenis = $this->input->post('jenis');
        if ($jenis == 'PYMHD') {

            $this->M_Kasir->delete_tindakan(['no_jurnal' => $no_jurnal], 'jurnal_pendapatan');
            $this->M_Kasir->delete_tindakan(['no_jurnal' => $no_jurnal], 'jurnal_cara_pembayaran');
            $this->M_Kasir->update_tindakan(['no_jurnal' => NULL, 'status' => 0], ['no_jurnal' => $no_jurnal], 'akun_tindakan');
            $this->M_Kasir->update_tindakan(['no_jurnal' => NULL, 'status' => 0], ['no_jurnal' => $no_jurnal], 'akun_non_pelayanan');
            $this->M_Kasir->update_tindakan(['no_jurnal' => NULL, 'status' => 0], ['no_jurnal' => $no_jurnal], 'akun_reduksi');
        } else {
            $db = $this->db->get_where('jurnal_piutang ', ['no_jurnal' => $no_jurnal])->result();
            foreach ($db as $row) {
                $this->M_Kasir->update_tindakan(['status_piutang' => 0], ['no_jurnal' => $row->id_fk], 'jurnal_cara_pembayaran');
            }
            $this->M_Kasir->delete_tindakan(['no_jurnal' => $no_jurnal], 'jurnal_piutang');
        }
        $out['status'] = "success";
        echo json_encode($out);
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
