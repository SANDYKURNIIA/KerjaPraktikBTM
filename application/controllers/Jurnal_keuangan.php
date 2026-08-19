<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Jurnal_keuangan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Jurnal_keuangan');
        $this->load->model('M_Jurnal_pendapatan');
        $this->load->model('M_Kasir');
    }
    //PENDAPATAN
    public function Laporan_jurnal_rajal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Laporan_jurnal_rajal';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Laporan_jurnal_rajal_nontunai()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Laporan_jurnal_rajal_nontunai';
        $page_data['cara_bayar'] = $this->M_Jurnal_keuangan->caraBayar_RajalNonTunai();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_data_laporan_jurnal_rajal() //tunai
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Jurnal_keuangan->SelectLaporanRajal_pasien($first_date, $second_date);
        } else {
            $page_data = $this->M_Jurnal_keuangan->SelectLaporanRajal_pasien('', '');
        }

        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $tgl_keluar = indo_date2($page_data[$i]->tgl_keluar);
            $kasir = $this->db->get_where('deatail_kasir', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            $diskon = empty($kasir) ? 0 : $kasir->diskon;

            // $kode_akun = $page_data[$i]->kode_akun;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $cara_bayar = ($page_data[$i]->keterangan == 'PENDAPATAN') ? $page_data[$i]->cara_bayar : strtoupper($page_data[$i]->keterangan) . ' ' . $page_data[$i]->cara_bayar;
            // $cara_bayar = $page_data[$i]->cara_bayar;
            $total_akun = number_format($page_data[$i]->total_akun - $diskon, 2, ',', '.');
            // $jenis_akun = $page_data[$i]->jenis_akun;
            $no_rm = " " . sprintf('%06d', $page_data[$i]->no_rm);

            $pasien = $page_data[$i]->pasien;


            $out[$i] = array($no, $tgl_keluar, $no_rm, $pasien, $jenis_pelayanan, $cara_bayar, $total_akun);
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

            $kasir = $this->db->get_where('deatail_kasir', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            $diskon = empty($kasir) ? 0 : $kasir->diskon;
            $selisih = empty($kasir) ? 0 : $kasir->selisih;
            // $kode_akun = $page_data[$i]->kode_akun;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $total_akun = number_format($page_data[$i]->total_akun - $diskon - $selisih, 2, ',', '.');
            // $jenis_akun = $page_data[$i]->jenis_akun;
            $no_rm = " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;

            $out[$i] = array($checkbox, $no, $tgl_keluar, $no_rm, $pasien, $jenis_pelayanan, $cara_bayar, $total_akun);
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

    public function Laporan_jurnal_ranap()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Laporan_jurnal_ranap';
        $page_data['cara_bayar'] = $this->db->get('cara_bayar')->result();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Laporan_jurnal_ranap_nontunai()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Laporan_jurnal_ranap_nontunai';
        $page_data['cara_bayar'] = $this->M_Jurnal_keuangan->caraBayar_RanapNonTunai();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_laporan_jurnal_ranap() //tunai
    {
        $out = null;
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Jurnal_keuangan->SelectLaporanRanap_pasien($first_date, $second_date);
        } else {
            $page_data = $this->M_Jurnal_keuangan->SelectLaporanRanap_pasien('', '');
        }
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $tgl_keluar = indo_date2($page_data[$i]->tgl_keluar);

            $kasir = $this->db->get_where('deatail_kasir', ['id_pelayanan' => $page_data[$i]->id_pelayanan])->row();
            $diskon = empty($kasir) ? 0 : $kasir->diskon;
            // $kode_akun = $page_data[$i]->kode_akun;

            $cara_bayar = ($page_data[$i]->keterangan == 'PENDAPATAN') ? $page_data[$i]->cara_bayar : strtoupper($page_data[$i]->keterangan) . ' ' . $page_data[$i]->cara_bayar;
            $total_akun = number_format($page_data[$i]->total_akun - $diskon, 2, ',', '.');
            // $jenis_akun = $page_data[$i]->jenis_akun;
            $no_rm = " " . sprintf('%06d', $page_data[$i]->no_rm);
            $pasien = $page_data[$i]->pasien;
            $jenis_pelayanan = $page_data[$i]->jenis_pelayanan;
            // $pasien = $this->db->get_where('pasien', ['no_rm' => $page_data[$i]->no_rm])->row()->nama;


            $out[$i] = array($no, $tgl_keluar, $no_rm, $pasien, $jenis_pelayanan, $cara_bayar, $total_akun);
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


    ///////////////////////////////////////////////////////////SET JURNAL RAJAL/////////////////////////////////////////////////////////////////
    public function setJurnal()
    {
        $out = null;
        $tgl = $this->input->post('jurnal');
        $staff = $this->session->userdata('data_auth');
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');

        if ($first_date != '' || $second_date != '') {
            $page_data1 = $this->M_Jurnal_pendapatan->Set_jurnal_rajal_range($first_date, $second_date);
            $db_deposite = $this->M_Jurnal_pendapatan->selectPendapatanKasir($first_date, $second_date);
        } else {
            $page_data1 = $this->M_Jurnal_pendapatan->Set_jurnal_rajal();
            $db_deposite = $this->M_Jurnal_pendapatan->selectPendapatanKasir('', '');
        }


        $kode = '301';
        $max = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl)->max;
        $noValid =  sprintf('%04d', $max + 1, 'dyhtdyu');
        $noDok = $noValid . "/" . "GL-" . $kode . "/" . date('my', strtotime($tgl));
        $dokumen = ['no_dokumen' => $noDok, 'no_index' => $max + 1, 'kode' => $kode, 'tgl' => $tgl, 'staff' => $staff->nama];
        $id_fk = strtotime($tgl);
        $jk = '10';
        $pk = date('dmy', strtotime($tgl));
        $kode_fk = implode("", [uniqid(), $staff->username]);

        //////// $noDok = '0132/GL-301/0723';

        // $this->db->trans_start();
        $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');


        //jurnal kredit pendapatan 
        for ($i = 0; $i < count($page_data1); $i++) {

            $arr = explode(".", $page_data1[$i]->kode_akun);

            if ($arr[0] == '409') {
                $des = "PPN OBAT";
            } else {
                $a = $this->db->get_where('daftar_akun', ['kode' => $arr[0]])->row()->deskripsi;
                if ($arr[0] == '703' || $arr[0] == '704') {
                    $b = '';
                } else {
                    $poli = $this->db->get_where('list_poli', ['kode_coa' => $arr[1], 'id_list_poli !=' => '146582', 'id_list_poli !=' => '15487956'])->row();
                    $b = isset($poli->nama_panjang) ? $poli->nama_panjang : '';
                }
                $c = $page_data1[$i]->jenis_akun;

                // if ($page_data1[$i]->jenis_bayar == 'tunai') {
                $des = $a . ' ' . $b . ' ' . $c;
                // } else {
                //     $pasien = $this->db->get_where('v_kunjungan', ['id_pelayanan' => $page_data1[$i]->id_pelayanan])->row();
                //     $des = $a . ' ' . $b . ' ' . $c . ' ' . $pasien->nama . ' (' . " " . sprintf('%06d', $pasien->no_rm) . ')';
                // }
            }

            $jurnal_pendapatan = [
                'id_fk' => $id_fk,
                'jk' => $jk,
                'rekening' => $page_data1[$i]->kode_akun,
                'deskripsi' => $des,
                'no_jurnal' => $noDok,
                'no_index' => $max + 1,
                'jenis' => $kode,
                'kredit' => $page_data1[$i]->total_akun,
                'debet' => 0,
                'lap' => $page_data1[$i]->lap,
                'jb' => $arr[2],
                'cj' => '101',
                'pk' => $pk,
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des,
                'staff' => $staff->nama,
                'kode_check' => $kode_fk,
                'id_vendor' => 'AR4001'

            ];
            $this->M_Kasir->insert_tindakan($jurnal_pendapatan, 'jurnal_pendapatan');
        }

        //deposite kredit pendapatan
        for ($p = 0; $p < count($db_deposite); $p++) {

            if ($db_deposite[$p]->keterangan == 'cash') {
                $jk = '10';
            } else if ($db_deposite[$p]->keterangan != 'cash' && $db_deposite[$p]->bank != ' ') {
                $jk = '11'; //untuk kode saja, dilaporan tetap jk =10
            }


            $jurnal_pendapatan = [
                'id_fk' => $db_deposite[$p]->id_pelayanan,
                'jk' => $jk,
                'rekening' => $db_deposite[$p]->kode_akun,
                'deskripsi' => 'DEPOSITE ' . $db_deposite[$p]->keterangan . ' ' . $db_deposite[$p]->bank . ' ATAS NAMA ' . $db_deposite[$p]->pasien,
                'no_jurnal' => $noDok,
                'no_index' => $max + 1,
                'jenis' => $kode,
                'kredit' => $db_deposite[$p]->total_akun,
                'debet' => 0,
                'lap' => '01',
                'jb' => '',
                'cj' => '101',
                'pk' => date('dmy', strtotime($tgl)),
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => 'DEPOSITE ' . $db_deposite[$p]->keterangan . ' ' . $db_deposite[$p]->bank . ' ATAS NAMA ' . $db_deposite[$p]->pasien,
                'staff' => $staff->nama,
                'kode_check' => $kode_fk,
                'id_vendor' => 'AR4001',
                'id_bank' => $db_deposite[$p]->id_bank

            ];
            $this->M_Kasir->insert_tindakan($jurnal_pendapatan, 'jurnal_pendapatan');


            //update deposite yang sudah dijurnal
            $this->M_Kasir->update_tindakan(
                ['status_jurnal' => 1, 'no_jurnal_deposite' => $noDok],
                [
                    'id_pelayanan' => $db_deposite[$p]->id_pelayanan, 'status' => 1,
                    'date(tgl_verifikasi)>=' => $first_date, 'date(tgl_verifikasi)<=' => $second_date
                ],
                'pendapatan_kasir'
            );
        }


        //update akun pendapatan
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Jurnal_pendapatan->SelectLaporanRangeJurnalRajal($first_date, $second_date);
        } else {
            $page_data = $this->M_Jurnal_pendapatan->SelectLaporanJurnalRajal();
        }
        for ($j = 0; $j < count($page_data); $j++) {
            $this->M_Kasir->update_tindakan(['status_jurnal' => 1, 'no_jurnal' => $noDok], ['id_pelayanan' => $page_data[$j]->id_pelayanan, 'status' => 1], 'pendapatan_kasir');
            $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDok], ['id_akun' => $page_data[$j]->id_akun, 'kode_akun' => $page_data[$j]->kode_akun], 'akun_tindakan');
            $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDok], ['id_akun' => $page_data[$j]->id_akun, 'kode_akun' => $page_data[$j]->kode_akun], 'akun_non_pelayanan');
        }


        //jurnal debit pendapatan
        $db_jurnal = $this->M_Jurnal_pendapatan->selectJurnal($noDok, $tgl);

        for ($m = 0; $m < count($db_jurnal); $m++) {

            if ($db_jurnal[$m]->keterangan == 'cash') {
                $rekening = '101.01.100';
                $des_rek =  'PENERIMAAN DENGAN CASH ' . date('d/m/Y', strtotime($tgl));
                $ket = 'CASH';
                $ket_bayar = 'tunai';
                // $id_fk = $id_fk;
                $id_fk = $db_jurnal[$m]->id_fk;
            } else {
                $id_pel = $db_jurnal[$m]->id_fk;
                $tipe = $db_jurnal[$m]->tipe;

                $pasien = $this->M_Jurnal_keuangan->getNama_pasien_tipe($id_pel, $tipe);
                // $rekening = $bank->kode_coa;
                $rekening = '114.02.000';
                $des_rek = 'MONEY IN TRANSIT ' . $db_jurnal[$m]->nama_bank . ' ' . date('d/m/Y', strtotime($tgl)) . ' == ' . $pasien->nama . ' (' . sprintf('%06d', $pasien->no_rm) . ')';
                $ket = $db_jurnal[$m]->id_bank;
                $ket_bayar = 'tunai';
                $id_fk = $id_pel;
            }

            $jurnal_cara_bayar = [

                'id_jurnal' => $id_fk,
                'jk' => $jk,
                'rekening' => $rekening,
                'deskripsi' => $des_rek,
                'no_jurnal' => $db_jurnal[$m]->no_jurnal,
                'kredit' => 0,
                'debet' => $db_jurnal[$m]->total,
                'lap' => '01',
                'jb' => '011',
                'cj' => '101',
                'pk' => $pk,
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des_rek,
                'staff' => $staff->nama,
                'cara_klaim' => $ket,
                'ket_bayar' => $ket_bayar,
                'jenis_jurnal' => 'RAJAL',
                'id_vendor' => 'AR4001'
            ];
            $this->M_Kasir->insert_tindakan($jurnal_cara_bayar, 'jurnal_cara_pembayaran');
        }


        // ///////////////////deposite debit pendapatan

        $db_jurnal_deposite = $this->M_Jurnal_pendapatan->selectJurnalDeposite($noDok);

        for ($o = 0; $o < count($db_jurnal_deposite); $o++) {
            $pelayanan = $this->M_Jurnal_keuangan->getNama_pasien($db_jurnal_deposite[$o]->id_fk);
            $selisih = $this->M_Jurnal_pendapatan->get_selisih($db_jurnal_deposite[$o]->id_fk);
            $akun_tindakan = $this->M_Jurnal_pendapatan->getData_akun($db_jurnal_deposite[$o]->id_fk);
            if ((($pelayanan->status_rawat == 'selesai' && $tgl >= date('Y-m-d', strtotime($pelayanan->tgl_keluar)) && isset($akun_tindakan) && $pelayanan->cara_bayar == '42') && empty($selisih)) || ($pelayanan->tgl_keluar == '-')) {
                $jb = '';
                $id_jurnal = $db_jurnal_deposite[$o]->id_fk;
                $rekening = '403.01.000';
                $des_rek =  $db_jurnal_deposite[$o]->deskripsi;
                $ket = '';
                $ket_bayar = 'tunai';
            } else {
                $jb = '011';
                $id_pel = $db_jurnal_deposite[$o]->id_fk;
                $id_bank = $db_jurnal_deposite[$o]->id_bank;

                if ($db_jurnal_deposite[$o]->jk == '10') {
                    $rekening = '101.01.100';
                    $des_rek = 'PENERIMAAN DENGAN CASH ' . date('d/m/Y', strtotime($tgl));
                    $ket = 'CASH';
                    $ket_bayar = 'tunai';
                    // $id_jurnal = $id_fk;
                    $id_jurnal = $db_jurnal_deposite[$o]->id_fk;
                } else if ($db_jurnal_deposite[$o]->jk == '11') {
                    $bank = $this->db->query("SELECT d.* from daftar_bank d, pendapatan_bank p where d.id_bank = p.cara_bayar and p.id_pelayanan ='$id_pel' and p.cara_bayar ='$id_bank'")->row();
                    // $rekening = $bank->kode_coa;
                    $rekening = '114.02.000';
                    $des_rek = 'MONEY IN TRANSIT ' . $bank->nama_bank . ' ' . date('d/m/Y', strtotime($tgl)) . ' == ' . $pelayanan->nama . ' (' . sprintf('%06d', $pelayanan->no_rm) . ')';
                    $ket = $bank->id_bank;
                    $ket_bayar = 'tunai';
                    $id_jurnal = $db_jurnal_deposite[$o]->id_fk;
                }
            }


            $jurnal_cara_bayar1 = [

                'id_jurnal' => $id_jurnal,
                'jk' => $db_jurnal_deposite[$o]->jk,
                'rekening' => $rekening,
                'deskripsi' => $des_rek,
                'no_jurnal' => $db_jurnal_deposite[$o]->no_jurnal,
                'kredit' => 0,
                'debet' => $db_jurnal_deposite[$o]->total,
                'lap' => '01',
                'jb' => $jb,
                'cj' => '101',
                'pk' => $pk,
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des_rek,
                'staff' => $staff->nama,
                'cara_klaim' => $ket,
                'ket_bayar' => $ket_bayar,
                'jenis_jurnal' => 'RAJAL',
                'id_vendor' => 'AR4001'

            ];
            $this->M_Kasir->insert_tindakan($jurnal_cara_bayar1, 'jurnal_cara_pembayaran');
        }

        /////////////deposite debit pendapatan yang sudah dijurnal sebelumnya/////////////////////////////////////////////////
        $db_jurnal_deposite_done = $this->M_Jurnal_pendapatan->selectJurnalDeposite_selesai($noDok);
        for ($t = 0; $t < count($db_jurnal_deposite_done); $t++) {
            $pelayanan = $this->M_Jurnal_keuangan->getNama_pasien($db_jurnal_deposite_done[$t]->id_fk);
            $des_rek = 'DEPOSITE ' . $db_jurnal_deposite_done[$t]->keterangan . ' ' . $db_jurnal_deposite_done[$t]->nama_bank . ' ATAS NAMA ' .  $pelayanan->nama;
            $jurnal_cara_bayar1 = [

                'id_jurnal' =>  $db_jurnal_deposite_done[$t]->id_fk,
                'jk' => '10',
                'rekening' => '403.01.000',
                'deskripsi' => $des_rek,
                'no_jurnal' => $noDok,
                'kredit' => 0,
                'debet' => $db_jurnal_deposite_done[$t]->total,
                'lap' => '01',
                'jb' => '',
                'cj' => '101',
                'pk' => $pk,
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des_rek,
                'staff' => $staff->nama,
                'cara_klaim' => '',
                'ket_bayar' => 'tunai',
                'jenis_jurnal' => 'RAJAL',
                'id_vendor' => 'AR4001'

            ];
            $this->M_Kasir->insert_tindakan($jurnal_cara_bayar1, 'jurnal_cara_pembayaran');
        }

        // //////////////// debit reduksi
        if ($first_date != '' || $second_date != '') {
            $page_data_reduksi = $this->M_Jurnal_pendapatan->Set_jurnal_rajal_range_reduksi($first_date, $second_date);
        } else {
            $page_data_reduksi = $this->M_Jurnal_pendapatan->Set_jurnal_rajal_reduksi();
        }
        for ($r = 0; $r < count($page_data_reduksi); $r++) {
            $arr1 = explode(".", $page_data_reduksi[$r]->kode_akun);
            $jurnal_reduksi = [
                'id_jurnal' => $page_data_reduksi[$r]->id_pelayanan,
                'id_fk' => $page_data_reduksi[$r]->id_pelayanan,
                'jk' => $jk,
                'rekening' => $page_data_reduksi[$r]->kode_akun,
                'deskripsi' => $page_data_reduksi[$r]->jenis_akun . ' ATAS NAMA ' . $page_data_reduksi[$r]->pasien,
                'no_jurnal' => $noDok,
                'kredit' => 0,
                'debet' => $page_data_reduksi[$r]->total_akun,
                'lap' => '01',
                'jb' => $arr1[2],
                'cj' => '101',
                'pk' => date('dmy', strtotime($tgl)),
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $page_data_reduksi[$r]->jenis_akun . ' ATAS NAMA ' . $page_data_reduksi[$r]->pasien,
                'staff' => $staff->nama,
                'cara_klaim' => 'REDUKSI',
                'ket_bayar' => 'tunai',
                'jenis_jurnal' => 'RAJAL',
                'id_vendor' => 'AR4001'
            ];
            $this->M_Kasir->insert_tindakan($jurnal_reduksi, 'jurnal_cara_pembayaran');
            $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDok], ['id_akun' => $page_data_reduksi[$r]->id_akun], 'akun_reduksi');
        }

        /////////////////////////deposite non pelayanan////////////////////////////////////////////////////
        $db_deposite_nonpel = $this->M_Jurnal_pendapatan->getDepositeNonPel($noDok);
        for ($u = 0; $u < count($db_deposite_nonpel); $u++) {

            $des_rek_u = 'DEPOSITE ' . $db_deposite_nonpel[$u]->keterangan . ' ' . $db_deposite_nonpel[$u]->bank . ' ATAS NAMA ' .  $db_deposite_nonpel[$u]->pasien;
            $jurnal_cara_bayar2 = [

                'id_jurnal' =>  $db_deposite_nonpel[$u]->id_pelayanan,
                'jk' => '10',
                'rekening' => '403.01.000',
                'deskripsi' => $des_rek_u,
                'no_jurnal' => $noDok,
                'kredit' => 0,
                'debet' => $db_deposite_nonpel[$u]->total_akun,
                'lap' => '01',
                'jb' => '',
                'cj' => '101',
                'pk' => $pk,
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des_rek_u,
                'staff' => $staff->nama,
                'cara_klaim' => '',
                'ket_bayar' => 'tunai',
                'jenis_jurnal' => 'RAJAL',
                'id_vendor' => 'AR4001'

            ];
            $this->M_Kasir->insert_tindakan($jurnal_cara_bayar2, 'jurnal_cara_pembayaran');

            $jurnal_pendapatan1 = [
                'id_fk' => $db_deposite_nonpel[$u]->id_pelayanan,
                'jk' => '10',
                'rekening' => '403.01.000',
                'deskripsi' => $des_rek_u,
                'no_jurnal' => $noDok,
                'no_index' => $max + 1,
                'jenis' => $kode,
                'kredit' => $db_deposite_nonpel[$u]->total_akun,
                'debet' => 0,
                'lap' => '01',
                'jb' => '',
                'cj' => '101',
                'pk' => date('dmy', strtotime($tgl)),
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des_rek_u,
                'staff' => $staff->nama,
                'kode_check' => $kode_fk,
                'id_vendor' => 'AR4001',
                'id_bank' => $db_deposite_nonpel[$u]->id_bank

            ];
            $this->M_Kasir->insert_tindakan($jurnal_pendapatan1, 'jurnal_pendapatan');
        }

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
            'lap' => '01',
            'jb' => '',
            'cj' => '101',
            'pk' => $pk,
            'tgl' => $tgl,
            'tgl_input' => date('Y-m-d H:i:s'),
            'des_rek' => $des_rek_k,
            'staff' => $staff->nama,
            'cara_klaim' => '',
            'ket_bayar' => 'tunai',
            'jenis_jurnal' => 'RAJAL',
            'id_vendor' => 'AR4001'

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
            'lap' => '01',
            'jb' => '',
            'cj' => '101',
            'pk' => date('dmy', strtotime($tgl)),
            'tgl' => $tgl,
            'tgl_input' => date('Y-m-d H:i:s'),
            'des_rek' => $des_rek_k,
            'staff' => $staff->nama,
            'kode_check' => $kode_fk,
            'id_vendor' => 'AR4001',

        ];
        $this->M_Kasir->insert_tindakan($jurnal_pendapatan2, 'jurnal_pendapatan');
        /////////////////////////////////////////////////////////////////////////////////////
        // //update jurnal kredit pendapatan yang sudah dibuat debitnya
        $this->M_Kasir->update_tindakan(['status' => 1], ['kode_check' => $kode_fk], 'jurnal_pendapatan');

        // $this->db->trans_complete();

        $out['status'] = 'success';
        echo json_encode($out);
    }



    ///////////////////////////////////////////////////////////////SET JURNAL RANAP/////////////////////////////////////////////////////////////////
    public function setJurnal1()
    {
        $out = null;
        $tgl = $this->input->post('jurnal');
        $staff = $this->session->userdata('data_auth');
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');

        if ($first_date != '' || $second_date != '') {
            $page_data1 = $this->M_Jurnal_pendapatan->Set_jurnal_ranap_range($first_date, $second_date);
            $db_deposite = $this->M_Jurnal_pendapatan->selectPendapatanKasirRanap($first_date, $second_date);
            $page_data_reduksi = $this->M_Jurnal_pendapatan->Set_jurnal_ranap_range_reduksi($first_date, $second_date);
        } else {
            $page_data1 = $this->M_Jurnal_pendapatan->Set_jurnal_ranap();
            $db_deposite = $this->M_Jurnal_pendapatan->selectPendapatanKasirRanap('', '');
            $page_data_reduksi = $this->M_Jurnal_pendapatan->Set_jurnal_ranap_reduksi();
        }


        $kode = '301';
        $max = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl)->max;
        $noValid =  sprintf('%04d', $max + 1, 'dyhtdyu');
        $noDok = $noValid . "/" . "GL-" . $kode . "/" . date('my', strtotime($tgl));
        $dokumen = ['no_dokumen' => $noDok, 'no_index' => $max + 1, 'kode' => $kode, 'tgl' => $tgl, 'staff' => $staff->nama];
        $id_fk = strtotime($tgl);
        $jk = '10';
        $pk = date('dmy', strtotime($tgl));
        $kode_fk = implode("", [uniqid(), $staff->username]);

        ////// $noDok = '0132/GL-301/0723';

        // $this->db->trans_start();
        $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');


        for ($i = 0; $i < count($page_data1); $i++) {

            $arr = explode(".", $page_data1[$i]->kode_akun);

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

                $c = $page_data1[$i]->jenis_akun;

                // if ($page_data1[$i]->jenis_bayar == 'tunai') {
                $des = $a . ' ' . $b . ' ' . $c;
                // } else {
                //     $pasien = $this->db->get_where('v_kunjungan', ['id_pelayanan' => $page_data1[$i]->id_pelayanan])->row();
                //     $des = $a . ' ' . $b . ' ' . $c . ' ' . $pasien->nama . ' (' . " " . sprintf('%06d', $pasien->no_rm) . ')';
                // }
            }

            $jurnal_pendapatan = [
                'id_fk' => $id_fk,
                'jk' => $jk,
                'rekening' => $page_data1[$i]->kode_akun,
                'deskripsi' => $des,
                'no_jurnal' => $noDok,
                'no_index' => $max + 1,
                'jenis' => $kode,
                'kredit' => round($page_data1[$i]->total_akun),
                'debet' => 0,
                'lap' => '01',
                'jb' => $arr[2],
                'cj' => '101',
                'pk' => $pk,
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des,
                'staff' => $staff->nama,
                'kode_check' => $kode_fk,
                'id_vendor' => 'AR4001'

            ];
            $this->M_Kasir->insert_tindakan($jurnal_pendapatan, 'jurnal_pendapatan');
        }


        //////////////////////////deposite kredit pendapatan
        for ($p = 0; $p < count($db_deposite); $p++) {

            if ($db_deposite[$p]->keterangan == 'cash') {
                $jk = '10';
            } else if ($db_deposite[$p]->keterangan != 'cash' && $db_deposite[$p]->bank != ' ') {
                $jk = '11'; //untuk kode saja, dilaporan tetap jk =10
            }

            $jurnal_pendapatan = [
                'id_fk' => $db_deposite[$p]->id_pelayanan,
                'jk' => $jk,
                'rekening' => $db_deposite[$p]->kode_akun,
                'deskripsi' => 'DEPOSITE ' . $db_deposite[$p]->keterangan . ' ' . $db_deposite[$p]->bank . ' ATAS NAMA ' . $db_deposite[$p]->pasien,
                'no_jurnal' => $noDok,
                'no_index' => $max + 1,
                'jenis' => $kode,
                'kredit' => $db_deposite[$p]->total_akun,
                'debet' => 0,
                'lap' => '01',
                'jb' => '',
                'cj' => '101',
                'pk' => date('dmy', strtotime($tgl)),
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => 'DEPOSITE ' . $db_deposite[$p]->keterangan . ' ' . $db_deposite[$p]->bank . ' ATAS NAMA ' . $db_deposite[$p]->pasien,
                'staff' => $staff->nama,
                'kode_check' => $kode_fk,
                'id_vendor' => 'AR4001',
                'id_bank' => $db_deposite[$p]->id_bank

            ];
            $this->M_Kasir->insert_tindakan($jurnal_pendapatan, 'jurnal_pendapatan');

            //update deposite yang sudah dijurnal
            $this->M_Kasir->update_tindakan(
                ['status_jurnal' => 1, 'no_jurnal_deposite' => $noDok],
                [
                    'id_pelayanan' => $db_deposite[$p]->id_pelayanan, 'status' => 1,
                    'date(tgl_verifikasi)>=' => $first_date, 'date(tgl_verifikasi)<=' => $second_date
                ],
                'pendapatan_kasir'
            );
        }


        //update akun pendapatan
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Jurnal_pendapatan->SelectLaporanRangeJurnalRanap($first_date, $second_date);
        } else {
            $page_data = $this->M_Jurnal_pendapatan->SelectLaporanJurnalRanap();
        }
        for ($j = 0; $j < count($page_data); $j++) {

            $this->M_Kasir->update_tindakan(['status_jurnal' => 1, 'no_jurnal' => $noDok], ['id_pelayanan' => $page_data[$j]->id_pelayanan, 'status' => 1], 'pendapatan_kasir');
            $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDok], ['id_akun' => $page_data[$j]->id_akun, 'kode_akun' => $page_data[$j]->kode_akun], 'akun_tindakan');
            $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDok], ['id_akun' => $page_data[$j]->id_akun, 'kode_akun' => $page_data[$j]->kode_akun], 'akun_non_pelayanan');
        }

        //jurnal debit pendapatan
        $db_jurnal = $this->M_Jurnal_pendapatan->selectJurnal($noDok, $tgl);

        for ($m = 0; $m < count($db_jurnal); $m++) {
            if ($db_jurnal[$m]->keterangan == 'cash') {
                $rekening = '101.01.100';
                $des_rek =  'PENERIMAAN DENGAN CASH ' . date('d/m/Y', strtotime($tgl));
                $ket = 'CASH';
                $ket_bayar = 'tunai';
                // $id_pel = $id_fk;
                $id_pel = $db_jurnal[$m]->id_fk;
            } else {
                $id_pel = $db_jurnal[$m]->id_fk;
                $tipe = $db_jurnal[$m]->tipe;

                $pasien = $this->M_Jurnal_keuangan->getNama_pasien_tipe($id_pel, $tipe);
                // $rekening = $bank->kode_coa;
                $rekening = '114.03.000';
                $des_rek = 'MONEY IN TRANSIT ' . $db_jurnal[$m]->nama_bank . ' ' . date('d/m/Y', strtotime($tgl)) . ' == ' . $pasien->nama . ' (' . sprintf('%06d', $pasien->no_rm) . ')';
                $ket = $db_jurnal[$m]->id_bank;
                $ket_bayar = 'tunai';
            }

            $jurnal_cara_bayar = [

                'id_jurnal' => $id_pel,
                'id_fk' => $id_pel,
                'jk' => $jk,
                'rekening' => $rekening,
                'deskripsi' => $des_rek,
                'no_jurnal' => $db_jurnal[$m]->no_jurnal,
                'kredit' => 0,
                'debet' => $db_jurnal[$m]->total,
                'lap' => '01',
                'jb' => '011',
                'cj' => '101',
                'pk' => $pk,
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des_rek,
                'staff' => $staff->nama,
                'cara_klaim' => $ket,
                'ket_bayar' => $ket_bayar,
                'jenis_jurnal' => 'RANAP',
                'id_vendor' => 'AR4001'
            ];
            $this->M_Kasir->insert_tindakan($jurnal_cara_bayar, 'jurnal_cara_pembayaran');
        }

        /////////////////////////deposite debit pendapatan
        $db_jurnal_deposite = $this->M_Jurnal_pendapatan->selectJurnalDeposite($noDok);

        for ($o = 0; $o < count($db_jurnal_deposite); $o++) {
            $id_fk = $id_fk;
            $pelayanan = $this->M_Jurnal_keuangan->getNama_pasien($db_jurnal_deposite[$o]->id_fk);
            $selisih = $this->db->get_where('pendapatan_kasir', ['id_pelayanan' => $db_jurnal_deposite[$o]->id_fk, 'tipe' => 'SELISIH'])->row();
            $akun_tindakan = $this->M_Jurnal_pendapatan->getData_akun($db_jurnal_deposite[$o]->id_fk);

            if ((($pelayanan->status_rawat == 'selesai' && $tgl >= date('Y-m-d', strtotime($pelayanan->tgl_keluar)) && isset($akun_tindakan) && $pelayanan->cara_bayar == '42') && empty($selisih)) || ($pelayanan->tgl_keluar == '-')) {
                $jb = '';
                $id_jurnal = $db_jurnal_deposite[$o]->id_fk;
                $rekening = '403.01.000';
                $des_rek =  $db_jurnal_deposite[$o]->deskripsi;
                $ket = '';
                $ket_bayar = 'tunai';
            } else {
                $jb = '011';
                $id_pel = $db_jurnal_deposite[$o]->id_fk;
                $id_bank = $db_jurnal_deposite[$o]->id_bank;

                if ($db_jurnal_deposite[$o]->jk == '10') {
                    $rekening = '101.01.100';
                    $des_rek =  'PENERIMAAN DENGAN CASH ' . date('d/m/Y', strtotime($tgl));
                    $ket = 'CASH';
                    $ket_bayar = 'tunai';
                    // $id_jurnal = strtotime($tgl);
                    $id_jurnal = $db_jurnal_deposite[$o]->id_fk;
                } else if ($db_jurnal_deposite[$o]->jk == '11') {
                    $bank = $this->db->query("SELECT d.* from daftar_bank d, pendapatan_bank p where d.id_bank = p.cara_bayar and p.id_pelayanan ='$id_pel' and p.cara_bayar ='$id_bank'")->row();

                    // $rekening = $bank->kode_coa;
                    $rekening = '114.03.000';
                    $des_rek = 'MONEY IN TRANSIT ' . $bank->nama_bank . ' ' . date('d/m/Y', strtotime($tgl)) . ' == ' . $pelayanan->nama . ' (' . sprintf('%06d', $pelayanan->no_rm) . ')';
                    $ket = $bank->id_bank;
                    $ket_bayar = 'tunai';
                    $id_jurnal = $db_jurnal_deposite[$o]->id_fk;
                }
            }


            $jurnal_cara_bayar1 = [

                'id_jurnal' => $id_jurnal,
                'jk' => $db_jurnal_deposite[$o]->jk,
                'rekening' => $rekening,
                'deskripsi' => $des_rek,
                'no_jurnal' => $db_jurnal_deposite[$o]->no_jurnal,
                'kredit' => 0,
                'debet' => $db_jurnal_deposite[$o]->total,
                'lap' => '01',
                'jb' => $jb,
                'cj' => '101',
                'pk' => $pk,
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des_rek,
                'staff' => $staff->nama,
                'cara_klaim' => $ket,
                'ket_bayar' => $ket_bayar,
                'jenis_jurnal' => 'RANAP',
                'id_vendor' => 'AR4001'
            ];
            $this->M_Kasir->insert_tindakan($jurnal_cara_bayar1, 'jurnal_cara_pembayaran');
        }

        /////////////deposite debit pendapatan yang sudah dijurnal sebelumnya/////////////////////////////////////////////////
        $db_jurnal_deposite_done = $this->M_Jurnal_pendapatan->selectJurnalDeposite_selesai($noDok);
        for ($t = 0; $t < count($db_jurnal_deposite_done); $t++) {
            $pelayanan = $this->M_Jurnal_keuangan->getNama_pasien($db_jurnal_deposite_done[$t]->id_fk);
            $des_rek = 'DEPOSITE ' . $db_jurnal_deposite_done[$t]->keterangan . ' ' . $db_jurnal_deposite_done[$t]->nama_bank . ' ATAS NAMA ' .  $pelayanan->nama;
            $jurnal_cara_bayar1 = [

                'id_jurnal' =>  $db_jurnal_deposite_done[$t]->id_fk,
                'jk' => '10',
                'rekening' => '403.01.000',
                'deskripsi' => $des_rek,
                'no_jurnal' => $noDok,
                'kredit' => 0,
                'debet' => $db_jurnal_deposite_done[$t]->total,
                'lap' => '01',
                'jb' => '',
                'cj' => '101',
                'pk' => $pk,
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des_rek,
                'staff' => $staff->nama,
                'cara_klaim' => '',
                'ket_bayar' => 'tunai',
                'jenis_jurnal' => 'RAJAL',
                'id_vendor' => 'AR4001'

            ];
            $this->M_Kasir->insert_tindakan($jurnal_cara_bayar1, 'jurnal_cara_pembayaran');
        }

        // //////////////// debit reduksi
        for ($r = 0; $r < count($page_data_reduksi); $r++) {

            $arr2 = explode(".", $page_data_reduksi[$r]->kode_akun);
            $jurnal_reduksi = [
                'id_jurnal' => $page_data_reduksi[$r]->id_pelayanan,
                'jk' => $jk,
                'rekening' => $page_data_reduksi[$r]->kode_akun,
                'deskripsi' => $page_data_reduksi[$r]->jenis_akun . ' ATAS NAMA ' . $page_data_reduksi[$r]->pasien,
                'no_jurnal' => $noDok,
                'kredit' => 0,
                'debet' => $page_data_reduksi[$r]->total_akun,
                'lap' => '01',
                'jb' => $arr2[2],
                'cj' => '101',
                'pk' => date('dmy', strtotime($tgl)),
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $page_data_reduksi[$r]->jenis_akun . ' ATAS NAMA ' . $page_data_reduksi[$r]->pasien,
                'staff' => $staff->nama,
                'cara_klaim' => 'REDUKSI',
                'ket_bayar' => 'tunai',
                'jenis_jurnal' => 'RANAP',
                'id_vendor' => 'AR4001'
            ];
            $this->M_Kasir->insert_tindakan($jurnal_reduksi, 'jurnal_cara_pembayaran');
            $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDok], ['id_akun' => $page_data_reduksi[$r]->id_akun], 'akun_reduksi');
        }

        /////////////////////////deposite non pel////////////////////////////////////////////////////
        $db_deposite_nonpel = $this->M_Jurnal_pendapatan->getDepositeNonPel($noDok);
        for ($u = 0; $u < count($db_deposite_nonpel); $u++) {

            $des_rek_u = 'DEPOSITE ' . $db_deposite_nonpel[$u]->keterangan . ' ' . $db_deposite_nonpel[$u]->bank . ' ATAS NAMA ' .  $db_deposite_nonpel[$u]->pasien;
            $jurnal_cara_bayar2 = [

                'id_jurnal' =>  $db_deposite_nonpel[$u]->id_pelayanan,
                'jk' => '10',
                'rekening' => '403.01.000',
                'deskripsi' => $des_rek_u,
                'no_jurnal' => $noDok,
                'kredit' => 0,
                'debet' => $db_deposite_nonpel[$u]->total_akun,
                'lap' => '01',
                'jb' => '',
                'cj' => '101',
                'pk' => $pk,
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des_rek_u,
                'staff' => $staff->nama,
                'cara_klaim' => '',
                'ket_bayar' => 'tunai',
                'jenis_jurnal' => 'RANAP',
                'id_vendor' => 'AR4001'

            ];
            $this->M_Kasir->insert_tindakan($jurnal_cara_bayar2, 'jurnal_cara_pembayaran');

            $jurnal_pendapatan1 = [
                'id_fk' => $db_deposite_nonpel[$u]->id_pelayanan,
                'jk' => '10',
                'rekening' => '403.01.000',
                'deskripsi' => $des_rek_u,
                'no_jurnal' => $noDok,
                'no_index' => $max + 1,
                'jenis' => $kode,
                'kredit' => $db_deposite_nonpel[$u]->total_akun,
                'debet' => 0,
                'lap' => '01',
                'jb' => '',
                'cj' => '101',
                'pk' => date('dmy', strtotime($tgl)),
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des_rek_u,
                'staff' => $staff->nama,
                'kode_check' => $kode_fk,
                'id_vendor' => 'AR4001',
                'id_bank' => $db_deposite_nonpel[$u]->id_bank

            ];
            $this->M_Kasir->insert_tindakan($jurnal_pendapatan1, 'jurnal_pendapatan');
        }

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
            'lap' => '01',
            'jb' => '',
            'cj' => '101',
            'pk' => $pk,
            'tgl' => $tgl,
            'tgl_input' => date('Y-m-d H:i:s'),
            'des_rek' => $des_rek_k,
            'staff' => $staff->nama,
            'cara_klaim' => '',
            'ket_bayar' => 'tunai',
            'jenis_jurnal' => 'RANAP',
            'id_vendor' => 'AR4001'

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
            'lap' => '01',
            'jb' => '',
            'cj' => '101',
            'pk' => date('dmy', strtotime($tgl)),
            'tgl' => $tgl,
            'tgl_input' => date('Y-m-d H:i:s'),
            'des_rek' => $des_rek_k,
            'staff' => $staff->nama,
            'kode_check' => $kode_fk,
            'id_vendor' => 'AR4001',

        ];
        $this->M_Kasir->insert_tindakan($jurnal_pendapatan2, 'jurnal_pendapatan');

        // //update jurnal kredit pendapatan yang sudah dibuat debitnya
        $this->M_Kasir->update_tindakan(['status' => 1], ['kode_check' => $kode_fk], 'jurnal_pendapatan');

        // $this->db->trans_complete();


        $out['status'] = 'success';
        echo json_encode($out);
    }

    ///////////////////////////////////////////////////VERIFIKASI JURNAL////////////////////////////////////////////////////////////////////////////
    public function Verifikasi_jurnal_pendapatan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Verifikasi_jurnal_pendapatan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_jurnal_pendapatan()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Jurnal_keuangan->SelectJurnalPendapatan($first_date, $second_date);
        } else {
            $page_data = $this->M_Jurnal_keuangan->SelectJurnalPendapatan('', '');
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;


            $no_jurnal = $page_data[$i]->no_jurnal;
            $debet = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $pk = $page_data[$i]->pk;
            $verif = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>VERIFIKASI</button>";
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='setJurnal(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\")' '><i class='icon-printer '></i></button>";


            $out[$i] = array($no, $verif, $cetak, $tgl, $no_jurnal, $debet, $staff);
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


    public function acc_jurnal_pendapatan()
    {
        $data_staff = $this->session->userdata('data_auth');
        $noDok = $this->input->post('no_jurnal');
        $arr = explode('/', $noDok);

        $piutang = $this->db->query("SELECT sum(kredit) total from jurnal_piutang where no_jurnal ='$noDok'")->row();
        $kredit = $this->db->query("SELECT sum(kredit) total from jurnal_pendapatan where no_jurnal ='$noDok'")->row();
        $debet = $this->db->query("SELECT sum(debet) total from jurnal_cara_pembayaran where no_jurnal ='$noDok'")->row();

        if ($arr[1] == 'GL-301') {

            $selisih = $kredit->total - $debet->total;
            if (abs($selisih) != 0) {
                $out['status'] = "Belum Balance";
            } else {
                $data = [
                    'staff_verifikasi' => $data_staff->nama,
                    'tgl_verifikasi' => date('Y-m-d H:i:s'),
                    'verifikasi' => 1,
                ];

                $this->M_Kasir->update_tindakan($data, ['no_jurnal' => $noDok], 'jurnal_cara_pembayaran');
                // $page_data = $this->M_Jurnal_keuangan->get_jurnal_pendapatan_bypelayanan();
                // for ($i = 0; $i < count($page_data); $i++) {
                //     jurnal_material($page_data[$i]->id_pelayanan);
                // }
                $out['status'] = "success";
            }
        } else {
            $data = [
                'staff_verifikasi' => $data_staff->nama,
                'tgl_verifikasi' => date('Y-m-d H:i:s'),
                'verifikasi' => 1,
            ];

            $this->M_Kasir->update_tindakan($data, ['no_jurnal' => $noDok], 'jurnal_cara_pembayaran');

            $data1 = [
                'staff_verifikasi' => $data_staff->nama,
                'tgl_verifikasi' => date('Y-m-d H:i:s'),
                'verifikasi' => 1,
            ];

            $this->M_Kasir->update_tindakan($data1, ['no_jurnal' => $noDok], 'jurnal_piutang');
            // $page_data = $this->M_Jurnal_keuangan->get_jurnal_pendapatan_bypelayanan();
            // for ($i = 0; $i < count($page_data); $i++) {
            //     jurnal_material($page_data[$i]->id_pelayanan);
            // }
            $out['status'] = "success";
        }
        // if (isset($kredit)) {

        //     $selisih = $kredit->total - $debet->total;
        //     if (abs($selisih) > 1000) {
        //         $out['status'] = "Belum Balance";
        //     } else {
        //         $data = [
        //             'staff_verifikasi' => $data_staff->nama,
        //             'tgl_verifikasi' => date('Y-m-d H:i:s'),
        //             'verifikasi' => 1,
        //         ];

        //         $this->M_Kasir->update_tindakan($data, ['no_jurnal' => $noDok], 'jurnal_cara_pembayaran');
        //         // $page_data = $this->M_Jurnal_keuangan->get_jurnal_pendapatan_bypelayanan();
        //         // for ($i = 0; $i < count($page_data); $i++) {
        //         //     jurnal_material($page_data[$i]->id_pelayanan);
        //         // }
        //         $out['status'] = "success";
        //     }
        // }



        echo json_encode($out);
    }

    ///////////////////////////////////////////////////////////////SUMMARY JURNAL//////////////////////////////////////////////////////////////
    public function Laporan_summary_jurnal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Laporan_summary_jurnal';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_summary_jurnal()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Jurnal_keuangan->SelectRangeLaporanSummary($first_date, $second_date);
        } else {
            $page_data = $this->M_Jurnal_keuangan->SelectLaporanSummary();
        }


        for ($i = 0; $i < count($page_data); $i++) {

            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;


            $no_jurnal = $page_data[$i]->no_jurnal;
            $debet = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $pk = $page_data[$i]->pk;
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='setJurnal(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\")' '><i class='icon-printer '></i></button>";
            $detail = "<a class='btn btn-info btn-icon-anim btn-square' href='" . base_url('Jurnal_keuangan/cetak_detail_pdf/') . urlencode(base64_encode($page_data[$i]->no_jurnal)) . "'><i class='icon-printer '></i></button>";
            if ($page_data[$i]->ket_bayar == 'non tunai') {
                $kwitansi = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='kwitansi(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $pk . "\")' '><i class='icon-printer '></i></a>";
                $penagihan = "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='penagihan(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $pk . "\")' '><i class='icon-printer '></i></button>";
                $invoice = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='invoice(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $pk . "\")' '><i class='icon-printer '></i></button>";
            } else {
                $kwitansi = "";
                $penagihan = "";
                $invoice = "";
            }

            $out[$i] = array($no, $cetak, $detail, $kwitansi, $invoice, $penagihan, $tgl, $no_jurnal, $debet, $staff);
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



    public function cetak_jurnal()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $page_data['tgl'] = $this->input->post('tgl');
        $page_data['staff'] = $this->input->post('staff');
        $page_data['jk'] = $this->input->post('jk');
        $page_data['no_jurnal'] = $no_jurnal;
        $page_data['judul'] = 'JURNAL PENDAPATAN';
        $db = $this->db->query("SELECT * FROM jurnal_cara_pembayaran WHERE no_jurnal ='$no_jurnal' 
        UNION ALL 
        SELECT * FROM jurnal_piutang WHERE no_jurnal ='$no_jurnal'")->row();
        $page_data['staff_verifikasi'] = $db->staff_verifikasi;
        $page_data['data'] = $this->M_Jurnal_keuangan->getSummary($no_jurnal);

        $response = $this->load->view('jurnal_print/cetak_jurnal', $page_data, TRUE);
        echo $response;
    }

    public function cetak_detail()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $page_data['tgl'] = $this->input->post('tgl');
        $page_data['tgl_keluar'] = $this->input->post('tgl_keluar');
        $page_data['staff'] = $this->input->post('staff');
        $page_data['pk'] = $this->input->post('pk');
        $page_data['no_jurnal'] = $no_jurnal;
        $page_data['data'] = $this->M_Jurnal_keuangan->getDetail($no_jurnal);

        $response = $this->load->view('jurnal_print/cetak_detail_jurnal', $page_data, TRUE);
        echo $response;
    }
    public function cetak_kwitansi()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $page_data['tgl'] = $this->input->post('tgl');
        $page_data['staff'] = $this->input->post('staff');
        $page_data['pk'] = $this->input->post('pk');
        $page_data['no_jurnal'] = $no_jurnal;
        $page_data['jurnal'] = $this->M_Jurnal_keuangan->getDataJurnal($no_jurnal);
        $page_data['pasien'] = $this->M_Jurnal_keuangan->get_data_kwitansi($no_jurnal);

        $response = $this->load->view('jurnal_print/cetak_kwitansi', $page_data, TRUE);
        echo $response;
    }
    public function cetak_penagihan()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $page_data['tgl'] = $this->input->post('tgl');
        $page_data['staff'] = $this->input->post('staff');
        $page_data['pk'] = $this->input->post('pk');
        $page_data['no_jurnal'] = $no_jurnal;
        $page_data['jurnal'] = $this->M_Jurnal_keuangan->getDataJurnal($no_jurnal);
        $page_data['pasien'] = $this->M_Jurnal_keuangan->get_data_kwitansi($no_jurnal);
        $page_data['data'] = $this->M_Jurnal_keuangan->getDetail($no_jurnal);

        $response = $this->load->view('jurnal_print/cetak_penagihan', $page_data, TRUE);
        echo $response;
    }
    public function cetak_invoice()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $page_data['tgl'] = $this->input->post('tgl');
        $page_data['staff'] = $this->input->post('staff');
        $page_data['pk'] = $this->input->post('pk');
        $page_data['no_jurnal'] = $no_jurnal;
        $page_data['jurnal'] = $this->M_Jurnal_keuangan->getDataJurnal($no_jurnal);
        $page_data['pasien'] = $this->M_Jurnal_keuangan->get_data_kwitansi($no_jurnal);
        $page_data['data'] = $this->M_Jurnal_keuangan->getDetail($no_jurnal);

        $response = $this->load->view('jurnal_print/cetak_invoice', $page_data, TRUE);
        echo $response;
    }
    /////////////////////////////////////////////////////////////JURNAL BANK//////////////////////////////////////////////////////////
    public function Laporan_jurnal_bank()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Laporan_jurnal_bank';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_laporan_jurnal_bank()
    {
        $out = null;

        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Jurnal_keuangan->SelectJurnalBank($first_date, $second_date);
        } else {
            $page_data = $this->M_Jurnal_keuangan->SelectJurnalBank('', '');
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date($page_data[$i]->tgl);

            $no = $i + 1;
            // $tgl =  strftime("%A, %d %B %Y ", $tgl);

            $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_jurnal_bayar . "'><label ></label></div>";
            $rekening = $page_data[$i]->rekening;
            $no_jurnal = $page_data[$i]->no_jurnal;
            $debet = number_format($page_data[$i]->debet, 2, ',', '.');
            $deskripsi = $page_data[$i]->deskripsi;
            $nama_bank = $page_data[$i]->nama_bank;
            $jenis_pembayaran = strtoupper($page_data[$i]->jenis_pembayaran);

            $out[$i] = array($checkbox, $no, $tgl, $rekening, $no_jurnal, $debet, $deskripsi, $jenis_pembayaran, $nama_bank);
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
    public function setJurnalBank()
    {
        $out = null;
        $staff = $this->session->userdata('data_auth');
        $tgl = $this->input->post('tgl');
        $data = $this->input->post('req');
        for ($i = 0; $i < count($data); $i++) {
            // $a[] = $this->db->query("SELECT * from jurnal_cara_pembayaran where id_jurnal_bayar = '$data[$i]'")->row();
            $a[] = $this->M_Jurnal_keuangan->getForJurnalBank($data[$i]);
        }

        $count_bank = array_count_values(array_column($a, 'cara_klaim'));
        $jenis_pembayaran = array_count_values(array_column($a, 'jenis_pembayaran'));
        // var_dump($count_bank);
        if (count($count_bank) > 1) {
            $out['status'] = 'error';
            $out['message'] = 'Jurnal hanya dilakukan dengan bank yang sama';
        } else {

            // print_arr($a);

            // $sum_arr = $this->test($a);//untuk digrupkan by no jurnal
            // print_arr($sum_arr);
            $id_fk = implode("", [uniqid(), $staff->username]);

            $kode = '302';
            $max = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl)->max;
            $noValid =  sprintf('%04d', $max + 1, 'dyhtdyu');
            $noDok = $noValid . "/" . "GL-" . $kode . "/" . date('my', strtotime($tgl));
            $dokumen = ['no_dokumen' => $noDok, 'no_index' => $max + 1, 'kode' => $kode, 'tgl' => $tgl, 'staff' => $staff->nama];
            $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');

            $data_kas_bank = array(
                'no_jurnal' => $noDok,
                'tanggal' => $tgl,
                'tipe_jurnal' => 'BANK',
                'tgl_input' => date("Y-m-d H:i:s"),
                'id_staff' => $staff->nama,
                'source' => 'MIT',
            );

            $this->M_Kasir->insert_tindakan($data_kas_bank, 'jurnal_kas_bank');

            $groups = array();
            foreach ($a as $item) {
                $key = $item->cara_klaim;
                $bank = $this->db->query("SELECT kode_coa, nama_bank from daftar_bank where id_bank = '$key'")->row();
                if (!array_key_exists($key, $groups)) {
                    $groups[$key] = array(
                        'rekening' => $bank->kode_coa,
                        'nama_bank' => $bank->nama_bank,
                        'debet' => $item->debet,
                        'kredit' => $item->kredit,
                        'jenis_pembayaran' => $item->jenis_pembayaran,
                        'id_vendor' => $item->id_vendor,
                        'id_jurnal' => $item->id_jurnal,
                        'no_jurnal' => $item->no_jurnal,
                    );
                } else {
                    $groups[$key]['debet'] = $groups[$key]['debet'] + $item->debet;
                    $groups[$key]['kredit'] = $groups[$key]['kredit'] + $item->kredit;
                }
            }
            // print_arr($groups);

            foreach ($groups as $rows) {
                $jurnal_bank = [
                    'id_fk' => $id_fk,
                    'jk' => '10',
                    'rekening' => $rows['rekening'],
                    'deskripsi' => 'Pembayaran Transfer Via ' . $rows['nama_bank'] . ' ' . date('d/m/Y', strtotime($tgl)),
                    'no_jurnal' =>  $noDok,
                    'kredit' => 0,
                    'debet' => $rows['debet'],
                    'lap' => '01',
                    'jb' => '011',
                    'cj' => '101',
                    'pk' => date('dmy', strtotime($tgl)),
                    'tgl' => $tgl,
                    'des_rek' =>  'Pembayaran Transfer Via ' . $rows['nama_bank'] . ' ' . date('d/m/Y', strtotime($tgl)),
                    'staff' => $staff->nama,
                    'keterangan' => $rows['jenis_pembayaran'],
                    'id_vendor' => $rows['id_vendor'],
                    'id_jurnal' => $rows['id_jurnal'],
                    'no_jurnal_fk' => $rows['no_jurnal'],

                ];
                $this->M_Kasir->insert_tindakan($jurnal_bank, 'jurnal_bank');
            }


            foreach ($a as $row) {

                $jurnal_bank_kredit = [
                    'id_fk' => $id_fk,
                    'jk' => '10',
                    'rekening' => $row->rekening,
                    'deskripsi' => $row->deskripsi,
                    'no_jurnal' =>  $noDok,
                    'kredit' => $row->debet,
                    'debet' => 0,
                    'lap' => '01',
                    'jb' => '011',
                    'cj' => '115',
                    'pk' => date('dmy', strtotime($tgl)),
                    'tgl' => $tgl,
                    'des_rek' =>  $row->des_rek,
                    'staff' => $staff->nama,
                    'keterangan' => $row->jenis_pembayaran,
                    'id_vendor' => $row->id_vendor,
                    'id_jurnal' => $row->id_jurnal,
                    'no_jurnal_fk' => $row->no_jurnal,

                ];
                $this->M_Kasir->insert_tindakan($jurnal_bank_kredit, 'jurnal_bank');
                // var_dump($jurnal_bank);
            }
            for ($j = 0; $j < count($data); $j++) {
                $this->M_Kasir->update_tindakan(['status' => 1, 'id_fk' => $id_fk], ['id_jurnal_bayar' => $data[$j]], 'jurnal_cara_pembayaran');
            }
            $out['status'] = 'success';
        }

        echo json_encode($out);
    }
    public function Laporan_summary_bank()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Laporan_summary_bank';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_summary_bank()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Jurnal_keuangan->SelectSummaryBank($first_date, $second_date);
        } else {
            $page_data = $this->M_Jurnal_keuangan->SelectSummaryBank('', '');
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;


            $no_jurnal = $page_data[$i]->no_jurnal;
            $debet = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $id_fk = $page_data[$i]->id_fk;
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='setJurnal(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\",\"" .  $id_fk . "\")' '><i class='icon-printer '></i></button>";

            $out[$i] = array($no, $cetak, $tgl, $no_jurnal, $debet, $staff);
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
    public function cetak_jurnal_bank()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $id_fk = $this->input->post('id_fk');
        $page_data['tgl'] = $this->input->post('tgl');
        $page_data['staff'] = $this->input->post('staff');
        $page_data['jk'] = $this->input->post('jk');
        $page_data['no_jurnal'] = $no_jurnal;
        $page_data['judul'] = 'JURNAL MONEY IN TRANSIT';
        $page_data['data'] = $this->M_Jurnal_keuangan->getJurnalBank($no_jurnal, $id_fk);
        $page_data['staff_verifikasi'] = "";
        $response = $this->load->view('jurnal_print/cetak_jurnal', $page_data, TRUE);
        echo $response;
    }

    ///////////////////////////////////////////////////JURNAL PAU//////////////////////////////////////////////////////////////////

    public function Laporan_jurnal_pau()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Laporan_jurnal_pau';
        $page_data['unit'] = $this->db->get('coa_unit')->result();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_laporan_jurnal_pau()
    {
        $out = null;

        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Jurnal_keuangan->SelectJurnalPAU($first_date, $second_date);
        } else {
            $page_data = $this->M_Jurnal_keuangan->SelectJurnalPAU('', '');
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date($page_data[$i]->tgl);

            $no = $i + 1;
            // $tgl =  strftime("%A, %d %B %Y ", $tgl);

            $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_jurnal_bayar . "'><label ></label></div>";
            $rekening = $page_data[$i]->rekening;
            $no_jurnal = $page_data[$i]->no_jurnal;
            $debet = number_format($page_data[$i]->debet, 2, ',', '.');
            $deskripsi = $page_data[$i]->deskripsi;
            $nama_bank = $page_data[$i]->cara_klaim;

            $out[$i] = array($checkbox, $no, $tgl, $rekening, $no_jurnal, $debet, $deskripsi, $nama_bank);
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
    public function setJurnalPAU()
    {
        $out = null;
        $staff = $this->session->userdata('data_auth');
        $data = $this->input->post('req');
        $unit = $this->input->post('unit');
        $kode = '306';
        $maxR = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, '')->max;
        $noValidR =  sprintf('%04d', $maxR + 1, 'dyhtdyu');
        $noDokR = $noValidR . "/" . "GL-306" . "/" . date('my');
        $pk = 'N01PAU' . date('my') . $noValidR;
        // var_dump($data);
        for ($i = 0; $i < count($data); $i++) {
            $a[] = $this->db->query("SELECT * from jurnal_cara_pembayaran where id_jurnal_bayar = '$data[$i]'")->row();
        }

        // $count_bank = array_count_values(array_column($a, 'cara_klaim'));
        // if (count($count_bank) > 1) {
        //     $out['status'] = 'error';
        //     $out['message'] = 'Jurnal hanya dilakukan dengan jenis klaim yang sama';
        // } else {
        // $sum_arr = $this->test($a);
        // print_arr($sum_arr);
        $id_fk = implode("", [uniqid(), $staff->username]);

        foreach ($a as $row) {
            // $kode_bank = $key['bank'];
            $bank = $this->db->query("SELECT kode_rs, unit_rs from coa_unit where id_coa_unit = '$unit'")->row();
            $jurnal_pau = [
                'id_fk' => $id_fk,
                'jk' => '15',
                'rekening' => $bank->kode_rs,
                'deskripsi' => 'PAU Kepada' . ' ' . $bank->unit_rs . ' NO. ' . $row->pk .  date('d/m/Y'),
                'no_jurnal' => $noDokR,
                'kredit' => 0,
                'debet' => $row->debet,
                'lap' => '01',
                'jb' => '000',
                'cj' => '',
                'pk' => $pk,
                'tgl' => date('Y-m-d H:i:s'),
                'des_rek' =>  'PAU Kepada ' . $bank->unit_rs . ' ' . $pk . ' ' . date('d/m/Y'),
                'staff' => $staff->nama

            ];
            $this->M_Kasir->insert_tindakan($jurnal_pau, 'jurnal_pau');
            // var_dump($jurnal_pau);
        }
        for ($j = 0; $j < count($data); $j++) {
            $this->M_Kasir->update_tindakan(['status' => 1, 'id_fk' => $id_fk], ['id_jurnal_bayar' => $data[$j]], 'jurnal_cara_pembayaran');
        }
        $out['status'] = 'success';
        // }

        echo json_encode($out);
    }


    public function Laporan_summary_pau()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Laporan_summary_pau';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_summary_pau()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Jurnal_keuangan->SelectSummaryPau($first_date, $second_date);
        } else {
            $page_data = $this->M_Jurnal_keuangan->SelectSummaryPau('', '');
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;


            $no_jurnal = $page_data[$i]->no_jurnal;
            $debet = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $id_fk = $page_data[$i]->id_fk;
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='setJurnal(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\",\"" .  $id_fk . "\")' '><i class='icon-printer '></i></button>";

            $out[$i] = array($no, $cetak, $tgl, $no_jurnal, $debet, $staff);
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
    public function cetak_jurnal_pau()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $id_fk = $this->input->post('id_fk');
        $page_data['tgl'] = $this->input->post('tgl');
        $page_data['staff'] = $this->input->post('staff');
        $page_data['jk'] = $this->input->post('jk');
        $page_data['no_jurnal'] = $no_jurnal;
        $page_data['pk'] = $this->db->get_where('jurnal_pau', ['no_jurnal' => $no_jurnal])->row()->pk;
        $page_data['judul'] = 'JURNAL PAU';
        $page_data['data'] = $this->M_Jurnal_keuangan->getJurnalPau($no_jurnal, $id_fk);
        $page_data['staff_verifikasi'] = "";
        $response = $this->load->view('jurnal_print/cetak_jurnal', $page_data, TRUE);
        echo $response;
    }

    public function Laporan_rekap_jurnal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Laporan_rekap_jurnal';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_laporan_rekap_jurnal()
    {
        $out = null;
        // $staff = $this->session->userdata('data_auth');
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Jurnal_keuangan->SelectLaporanRangeRekap($first_date, $second_date);
        } else {
            // $page_data = $this->M_Jurnal_keuangan->SelectLaporanRekapJurnal();
            $out = null;
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date($page_data[$i]->tgl);

            $no = $i + 1;
            // $tgl =  strftime("%A, %d %B %Y ", $tgl);

            // $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_jurnal_bayar . "'><label ></label></div>";
            $rekening = $page_data[$i]->rekening;
            $no_jurnal = $page_data[$i]->no_jurnal;
            $jk = $page_data[$i]->jk;
            $deskripsi = $page_data[$i]->deskripsi;
            $kredit = number_format($page_data[$i]->kredit, 2, ',', '.');
            $debet = number_format($page_data[$i]->debet, 2, ',', '.');
            $lap = $page_data[$i]->lap;
            $jb = $page_data[$i]->jb;
            $staff = $page_data[$i]->staff;
            $cj = $page_data[$i]->cj;
            $pk = $page_data[$i]->pk;
            $des_rek = $page_data[$i]->des_rek;

            $out[$i] = array($no, $jk, $tgl, $no_jurnal, $rekening, $jb, $cj, $pk, $lap, $debet, $kredit, $deskripsi, $des_rek, $staff);
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





    public function export($mulai, $akhir,$jenis_jurnal)
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
        $sheet->setCellValue('P3', "KELOMPOK VENDOR");
        $sheet->setCellValue('Q3', "DEBET");
        $sheet->setCellValue('R3', "KREDIT");
        $sheet->setCellValue('S3', "SALDO");
        $sheet->setCellValue('T3', "DESKRIPSI");
        $sheet->setCellValue('U3', "DESKRIPSI REKENING");
        $sheet->setCellValue('V3', "STAFF");
        $sheet->setCellValue('W3', "NO REG");
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        // $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        $sheet->getStyle('F3')->applyFromArray($style_col);
        $sheet->getStyle('G3')->applyFromArray($style_col);
        $sheet->getStyle('H3')->applyFromArray($style_col);
        $sheet->getStyle('I3')->applyFromArray($style_col);
        $sheet->getStyle('J3')->applyFromArray($style_col);
        $sheet->getStyle('K3')->applyFromArray($style_col);
        $sheet->getStyle('L3')->applyFromArray($style_col);
        $sheet->getStyle('M3')->applyFromArray($style_col);
        $sheet->getStyle('N3')->applyFromArray($style_col);
        $sheet->getStyle('O3')->applyFromArray($style_col);
        $sheet->getStyle('P3')->applyFromArray($style_col);
        $sheet->getStyle('Q3')->applyFromArray($style_col);
        $sheet->getStyle('R3')->applyFromArray($style_col);
        $sheet->getStyle('S3')->applyFromArray($style_col);
        $sheet->getStyle('T3')->applyFromArray($style_col);
        $sheet->getStyle('U3')->applyFromArray($style_col);
        $sheet->getStyle('V3')->applyFromArray($style_col);
        $sheet->getStyle('W3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        // $first_date = $this->input->post('mulai');
        // $second_date = $this->input->post('akhir');
        if ($jenis_jurnal == '-') {
            $rekap = $this->M_Jurnal_keuangan->SelectLaporanRangeRekap($mulai, $akhir);
        } else {
            $rekap = $this->M_Jurnal_keuangan->SelectLaporanRangeRekapByJenis($mulai, $akhir,$jenis_jurnal);
        }
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($rekap as $data) { // Lakukan looping pada variabel siswa
            // $svheet->setCellValue('A' . $numrow, $no);
            $rekening = explode('.', $data->rekening);
            $rek2 =  !empty($rekening[1]) ? $rekening[1] : 0;
            $rek3 =  !empty($rekening[2]) ? $rekening[2] : 0;

            $group = substr($rekening[0], 0, 1);
            $vendor = $this->db->query("SELECT nama nama_rekanan FROM
            cara_bayar where kode_pelanggan ='$data->id_vendor'
            union all
            SELECT nama_produsen nama_rekanan FROM
            produsen where kode ='$data->id_vendor'
            ")->row();
            $vendor = isset($vendor->nama_rekanan) ? $vendor->nama_rekanan : '';

            $sheet->setCellValue('B' . $numrow, $data->jk);
            $sheet->setCellValue('C' . $numrow, date('d/m/Y', strtotime($data->tgl)));
            $sheet->setCellValue('D' . $numrow, $data->no_jurnal);
            $sheet->setCellValue('E' . $numrow, $group);
            $sheet->setCellValue('F' . $numrow, $rekening[0]);
            $sheet->setCellValue('G' . $numrow, $rek2);
            $sheet->setCellValue('H' . $numrow, $rek3);
            $sheet->setCellValue('I' . $numrow, $data->rekening);
            $sheet->setCellValue('J' . $numrow, $data->jb);
            $sheet->setCellValue('K' . $numrow, $data->cj);
            $sheet->setCellValue('L' . $numrow, $data->pk);
            $sheet->setCellValue('M' . $numrow, $data->lap);
            $sheet->setCellValue('N' . $numrow, $data->id_vendor);
            $sheet->setCellValue('O' . $numrow, $vendor);
            $sheet->setCellValue('P' . $numrow, $data->kelompok_pelanggan);
            $sheet->setCellValue('Q' . $numrow, $data->debet);
            $sheet->setCellValue('R' . $numrow, $data->kredit);
            $sheet->setCellValue('S' . $numrow, $data->debet - $data->kredit);
            $sheet->setCellValue('T' . $numrow, ucwords(strtolower($data->deskripsi)));
            $sheet->setCellValue('U' . $numrow, ucwords(strtolower($data->des_rek)));
            $sheet->setCellValue('V' . $numrow, $data->staff);
            $sheet->setCellValue('W' . $numrow, $data->no_reg);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            // $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('G' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('H' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('I' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('J' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('K' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('L' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('M' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('N' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('O' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('P' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('Q' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('R' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('S' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('T' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('U' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('V' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('W' . $numrow)->applyFromArray($style_row);

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
        $sheet->setTitle("Laporan Rekap Jurnal");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Rekap.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function export_bche($mulai, $akhir)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $style_col = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM], // Set border top dengan garis tebal
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM], // Set border right dengan garis tebal
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM], // Set border bottom dengan garis tebal
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM] // Set border left dengan garis tebal
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

        // Set judul kolom
        $sheet->setCellValue('A5', "No");
        $sheet->setCellValue('B5', "Poli");
        $sheet->setCellValue('C5', "Jenis Kelamin");
        $sheet->setCellValue('D5', "Jumlah Pasien");
        $sheet->setCellValue('E5', "Jumlah Skrining");
        $sheet->setCellValue('F5', "Jumlah Terduga");
        $sheet->setCellValue('G5', "Tanggal");

        $sheet->getStyle('A5:G5')->applyFromArray($style_col);

        // Panggil data dari model atau sumber lainnya
        $jenis_kelamin_list = array('LAKI-LAKI', 'PEREMPUAN'); // Memisahkan jenis kelamin menjadi array
        $poli_list = array("paru", "anak", "dalam", "umum", "obgyn");
        $data = $this->M_Jurnal_keuangan->SelectRekapBche($mulai, $akhir); // Gantikan ini dengan data yang sebenarnya dari model atau sumber data

        // Mengisi data pada kolom-kolom
        $no = 1; // Untuk nomor urut
        $numrow = 6; // Dimulai dari baris ke-2 untuk data

        foreach ($data as $row) {
            foreach ($poli_list as $poli) {
                foreach ($jenis_kelamin_list as $jenis_kelamin) {
                    $jumlah_pasien = $this->M_Jurnal_keuangan->jumlah_pasien_per_poli($poli, $jenis_kelamin);
                    $jumlah_skrin = $this->M_Jurnal_keuangan->jumlah_skrining($poli, $jenis_kelamin);
                    $jumlah_terduga_per = $this->M_Jurnal_keuangan->jumlah_terduga_per_poli($poli, $jenis_kelamin);

                    $tgl_masuk = isset($row->tgl_masuk) ? date('d/m/Y', strtotime($row->tgl_masuk)) : '';
                    $sheet->setCellValue('A' . $numrow, $no++);
                    $sheet->setCellValue('B' . $numrow, $poli); // Kolom B
                    $sheet->setCellValue('C' . $numrow, $jenis_kelamin); // Kolom C
                    $sheet->setCellValue('D' . $numrow, $jumlah_pasien); // Kolom D
                    $sheet->setCellValue('E' . $numrow, $jumlah_skrin); // Kolom E
                    $sheet->setCellValue('F' . $numrow, $jumlah_terduga_per); // Kolom F
                    $sheet->setCellValue('G' . $numrow, $tgl_masuk); // Kolom A

                    $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
                    $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
                    $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
                    $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
                    $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
                    $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);
                    $sheet->getStyle('G' . $numrow)->applyFromArray($style_row);

                    $numrow++;
                }
            }
        }

        // Set style untuk kolom dan baris yang diisi
        // $sheet->getStyle('A1:J1')->applyFromArray($style_col); // Contoh penggunaan style, sesuaikan dengan kebutuhan Anda

        // Atur lebar kolom
        // $sheet->getColumnDimension('A')->setWidth(5); // Contoh pengaturan lebar kolom, sesuaikan dengan kebutuhan Anda

        // Set orientasi kertas
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        // Set judul file excel
        $sheet->setTitle("Laporan Hasil Skrining");

        // Proses file excel untuk di-download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Laporan_Hasil_Skrining.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
    public function cetak_detail_pdf($no_jurnal)
    {
        $this->load->library('pdf');
        $this->data['title']    = 'Laporan';

        $no_jurnal = base64_decode(urldecode($no_jurnal));
        $page_data['jurnal'] = $this->M_Jurnal_keuangan->getDataJurnal($no_jurnal);

        $page_data['no_jurnal'] = $no_jurnal;
        $page_data['data'] = $this->M_Jurnal_keuangan->getDetail($no_jurnal);

        $this->dompdf->setPaper('A4', 'landscape');
        $html = $this->load->view('jurnal_print/cetak_detail_jurnal', $page_data, true);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
        $this->dompdf->render();
        $this->dompdf->stream("Rekapitulasi Pasien.pdf", array("Attachment" => 0));
    }
}
