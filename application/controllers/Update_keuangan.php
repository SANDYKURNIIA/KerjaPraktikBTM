<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Update_keuangan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Jurnal_keuangan');
        $this->load->model('M_Jurnal_pendapatan');
        $this->load->model('M_Jurnal_pendapatan_nontunai');
        $this->load->model('M_Kasir');
    }


    public function update()
    {
        // $tgl = date('Y-m-d');
        $page_data = $this->db->query("SELECT *  FROM `jurnal_bank` WHERE `tgl` LIKE '%2023-09%' group BY `no_jurnal`")->result();
        // print_arr($page_data);

        for ($i = 0; $i < count($page_data); $i++) {
            $data_kas_bank = array(
                'no_jurnal' => $page_data[$i]->no_jurnal,
                'tanggal' => $page_data[$i]->tgl,
                'tipe_jurnal' => 'BANK',
                'tgl_input' => date("Y-m-d H:i:s"),
                'id_staff' => 'Suciyati',
            );
            $this->M_Kasir->insert_tindakan($data_kas_bank, 'jurnal_kas_bank');

            //     jurnal($page_data[$i]->id_pelayanan);
            //     updateTglPulang_pendapatan($page_data[$i]->id_pelayanan);

            //     jurnal_ijd($page_data[$i]->id_pelayanan);

            //     // echo $page_data[$i]->id_pelayanan . '<br>';
        }

        // // updateTglPulang_pendapatan('pl_139660');

        // // echo "selesai";

    }

    public function setJurnal()
    {
        $out = null;
        $tgl = '2024-01-04';
        $staff = $this->session->userdata('data_auth');
        $first_date = $tgl;
        $second_date = $tgl;

        $page_data1 = $this->M_Jurnal_pendapatan->Set_jurnal_rajal_range($first_date, $second_date);
        $db_deposite = $this->M_Jurnal_pendapatan->selectPendapatanKasir($first_date, $second_date);
        $page_data_reduksi = $this->M_Jurnal_pendapatan->Set_jurnal_rajal_range_reduksi($first_date, $second_date);

        $kode = '301';


        $max = 26;
        $id_fk = strtotime($tgl);
        $jk = '10';
        $pk = date('dmy', strtotime($tgl));
        $kode_fk = implode("", [uniqid(), $staff->username]);

        $noDok = '0067/GL-301/0124';

        // $this->db->trans_start();

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
                    $poli = $this->db->get_where('list_poli', ['kode_coa' => $arr[1]])->row();
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
                'staff' => "Suciyati",
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
                'staff' => "Suciyati",
                'kode_check' => $kode_fk,
                'id_vendor' => 'AR4001',
                'id_bank' => $db_deposite[$p]->id_bank

            ];
            $this->M_Kasir->insert_tindakan($jurnal_pendapatan, 'jurnal_pendapatan');


            //update deposite yang sudah dijurnal
            $this->M_Kasir->update_tindakan(
                ['no_jurnal_deposite' => $noDok],
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
                'staff' => "Suciyati",
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
                'staff' => 'Suciyati',
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
                'staff' => "Suciyati",
                'cara_klaim' => '',
                'ket_bayar' => 'tunai',
                'jenis_jurnal' => 'RAJAL',
                'id_vendor' => 'AR4001'

            ];
            $this->M_Kasir->insert_tindakan($jurnal_cara_bayar1, 'jurnal_cara_pembayaran');
        }

        // //////////////// debit reduksi
        for ($r = 0; $r < count($page_data_reduksi); $r++) {

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
                'jb' => '',
                'cj' => '101',
                'pk' => date('dmy', strtotime($tgl)),
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $page_data_reduksi[$r]->jenis_akun . ' ATAS NAMA ' . $page_data_reduksi[$r]->pasien,
                'staff' => "Suciyati",
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
                'staff' => "Suciyati",
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
                'staff' => "Suciyati",
                'kode_check' => $kode_fk,
                'id_vendor' => 'AR4001',
                'id_bank' => $db_deposite_nonpel[$u]->id_bank

            ];
            $this->M_Kasir->insert_tindakan($jurnal_pendapatan1, 'jurnal_pendapatan');
        }

        //PPN DIBEBASKAN
        $db_ppn_bebas = $this->M_Jurnal_pendapatan->get_total_revenue($noDok);
        $total_reduksi = $this->M_Jurnal_pendapatan->get_total_reduksi($noDok)->reduksi;

        $des_rek_k = 'PPN Keluaran Lainnya dan Non Waku';
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
            'staff' => "Suciyati",
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
            'staff' => "Suciyati",
            'kode_check' => $kode_fk,
            'id_vendor' => 'AR4001',

        ];
        $this->M_Kasir->insert_tindakan($jurnal_pendapatan2, 'jurnal_pendapatan');
        /////////////////////////////////////////////////////////////////////////////////////
        // //update jurnal kredit pendapatan yang sudah dibuat debitnya
        $this->M_Kasir->update_tindakan(['status' => 1], ['kode_check' => $kode_fk], 'jurnal_pendapatan');

        // $this->db->query("UPDATE jurnal_cara_pembayaran set status = 1 where deskripsi in (select deskripsi from jurnal_bank)");
        // $this->db->trans_complete();

        $out['no_dok'] = $noDok;
        $out['status'] = 'success';
        echo json_encode($out);
    }


    /////////////////////////RANAP//////////////////////////////////
    public function setJurnal_ranap()
    {

        $out = null;

        $noDok = '0302/GL-301/1123';
        // $noDok = base64_decode(urldecode($no_jurnal));

        $tgl = '2023-11-22';
        // $tgl = $this->db->get_where('dokumen_jurnal', ['no_dokumen' => $noDok])->row()->tgl;
        $staff = $this->session->userdata('data_auth');
        $first_date = $tgl;
        $second_date = $tgl;

        $page_data1 = $this->M_Jurnal_pendapatan->Set_jurnal_ranap_range($first_date, $second_date);
        $db_deposite = $this->M_Jurnal_pendapatan->selectPendapatanKasirRanap($first_date, $second_date);
        $page_data_reduksi = $this->M_Jurnal_pendapatan->Set_jurnal_ranap_range_reduksi($first_date, $second_date);


        $kode = '301';

        $max = 15;
        $id_fk = strtotime($tgl);
        $jk = '10';
        $pk = date('dmy', strtotime($tgl));
        $kode_fk = implode("", [uniqid(), $staff->username]);


        $this->db->trans_start();

        for ($i = 0; $i < count($page_data1); $i++) {

            $arr = explode(".", $page_data1[$i]->kode_akun);

            if ($arr[0] == '409') {
                $des = "PPN OBAT";
            } else {
                $a = $this->db->get_where('daftar_akun', ['kode' => $arr[0]])->row()->deskripsi;

                if ($arr[0] == '701') {
                    $b = $this->db->get_where('list_poli', ['kode_coa' => $arr[1]])->row()->nama_panjang;
                } else if ($arr[0] == '702') {
                    $b = $this->db->get_where('ruangan', ['kode_coa' => $arr[1]])->row()->nama_ruangan;
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
                'kredit' => $page_data1[$i]->total_akun,
                'debet' => 0,
                'lap' => '01',
                'jb' => $arr[2],
                'cj' => '101',
                'pk' => $pk,
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des,
                'staff' => 'Suciyati',
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
                'staff' => 'Suciyati',
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
                $id_pel = $id_fk;
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
                'staff' => 'Suciyati',
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
            if ((($pelayanan->status_rawat == 'selesai' && $tgl >= date('Y-m-d', strtotime($pelayanan->tgl_keluar)) && $pelayanan->cara_bayar == '42') && empty($selisih)) || ($pelayanan->tgl_keluar == '-')) {
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
                    $id_jurnal = $id_fk;
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
                'staff' => 'Suciyati',
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
                'jb' => $jb,
                'cj' => '101',
                'pk' => $pk,
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des_rek,
                'staff' => 'Suciyati',
                'cara_klaim' => '',
                'ket_bayar' => 'tunai',
                'jenis_jurnal' => 'RAJAL',
                'id_vendor' => 'AR4001'

            ];
            $this->M_Kasir->insert_tindakan($jurnal_cara_bayar1, 'jurnal_cara_pembayaran');
        }

        // //////////////// debit reduksi
        for ($r = 0; $r < count($page_data_reduksi); $r++) {


            $jurnal_reduksi = [
                'id_jurnal' => $page_data_reduksi[$r]->id_pelayanan,
                'jk' => $jk,
                'rekening' => $page_data_reduksi[$r]->kode_akun,
                'deskripsi' => $page_data_reduksi[$r]->jenis_akun . ' ATAS NAMA ' . $page_data_reduksi[$r]->pasien,
                'no_jurnal' => $noDok,
                'kredit' => 0,
                'debet' => $page_data_reduksi[$r]->total_akun,
                'lap' => '01',
                'jb' => '',
                'cj' => '101',
                'pk' => date('dmy', strtotime($tgl)),
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $page_data_reduksi[$r]->jenis_akun . ' ATAS NAMA ' . $page_data_reduksi[$r]->pasien,
                'staff' => 'Suciyati',
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
                'jb' => $jb,
                'cj' => '101',
                'pk' => $pk,
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des_rek_u,
                'staff' => 'Suciyati',
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
                'staff' => 'Suciyati',
                'kode_check' => $kode_fk,
                'id_vendor' => 'AR4001',
                'id_bank' => $db_deposite_nonpel[$u]->id_bank

            ];
            $this->M_Kasir->insert_tindakan($jurnal_pendapatan1, 'jurnal_pendapatan');
        }

        //update jurnal kredit pendapatan yang sudah dibuat debitnya
        $this->M_Kasir->update_tindakan(['status' => 1], ['kode_check' => $kode_fk], 'jurnal_pendapatan');

        $this->db->trans_complete();


        $out['no_dok'] = $noDok;
        $out['status'] = 'success';
        echo json_encode($out);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////
    public function update_pulang($mulai, $akhir)
    {



        $page_data = $this->db->query("SELECT b.id_pelayanan, date(b.tgl_masuk) tgl_masuk
        from pelayanan b, history_pelayanan h, cara_bayar c
        where b.id_pelayanan = h.id_pelayanan and b.cara_bayar = c.id_cara_bayar
        and date(b.tgl_masuk) >= '$mulai' and date(b.tgl_masuk) <= '$akhir'  and h.status = 1 and b.status = 1 and c.nama like '%BPJS%' and c.nama != 'BPJSTK'
        and b.status_rawat != 'selesai' and b.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status =1)

        group by b.id_pelayanan  
        ORDER BY `tgl_masuk` asc
        ")->result();
        // print_arr($page_data);

        for ($i = 0; $i < count($page_data); $i++) {

            $where = array('id_pelayanan' => $page_data[$i]->id_pelayanan);
            $datapel = array(
                'tgl_keluar' => $page_data[$i]->tgl_masuk . ' 16:00:00',
                'status_rawat' => 'selesai',
                'staff_checkout' => 'SIM'
            );
            $this->M_Kasir->update_tindakan($datapel, $where, 'pelayanan');
            $tgl_checkout = date('Y-m-d H:i:s');
            $this->M_Kasir->update_tindakan(['tgl_checkout' => $tgl_checkout], $where, 'deatail_kasir');

            jurnal($page_data[$i]->id_pelayanan, 'SIM');

            // jurnal_ijd($page_data[$i]->id_pelayanan);

            echo $page_data[$i]->id_pelayanan . '<br>';
        }

        echo "selesai";
    }
    public function update_pulang_2($mulai, $akhir)
    {


        $page_data = $this->db->query("SELECT b.id_pelayanan, date(b.tgl_masuk) tgl_masuk
        from pelayanan b, history_pelayanan_ugd h, cara_bayar c
        where b.id_pelayanan = h.id_pelayanan and b.cara_bayar = c.id_cara_bayar
        and date(b.tgl_masuk) >= '$mulai' and date(b.tgl_masuk) <= '$akhir'  and h.status = 1 and b.status = 1 and c.nama like '%BPJS%' and c.nama != 'BPJSTK'
        and b.status_rawat != 'selesai' and b.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status =1)

        group by b.id_pelayanan  
        ORDER BY `tgl_masuk` asc
        ")->result();
        // print_arr($page_data);

        for ($i = 0; $i < count($page_data); $i++) {

            $where = array('id_pelayanan' => $page_data[$i]->id_pelayanan);
            $datapel = array(
                'tgl_keluar' => $page_data[$i]->tgl_masuk . ' 16:00:00',
                'status_rawat' => 'selesai',
                'staff_checkout' => 'SIM'
            );
            $this->M_Kasir->update_tindakan($datapel, $where, 'pelayanan');
            $tgl_checkout = date('Y-m-d H:i:s');
            $this->M_Kasir->update_tindakan(['tgl_checkout' => $tgl_checkout], $where, 'deatail_kasir');

            jurnal($page_data[$i]->id_pelayanan, 'SIM');

            // jurnal_ijd($page_data[$i]->id_pelayanan);

            echo $page_data[$i]->id_pelayanan . '<br>';
        }

        echo "selesai";
    }

    public function update_pulang_ugd($mulai, $akhir)
    {


        $page_data = $this->db->query("SELECT b.id_pelayanan, date(b.tgl_masuk) tgl_masuk
        from pelayanan b, history_pelayanan_ugd h
        where b.id_pelayanan = h.id_pelayanan
        and date(b.tgl_masuk) >= '$mulai' and date(b.tgl_masuk) <= '$akhir'  and h.status = 1 and b.status = 1 
        and b.status_rawat != 'selesai' and b.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status =1)

        group by b.id_pelayanan  
        ORDER BY `tgl_masuk` asc
        ")->result();
        // print_arr($page_data);

        for ($i = 0; $i < count($page_data); $i++) {

            $where = array('id_pelayanan' => $page_data[$i]->id_pelayanan);
            $datapel = array(
                'tgl_keluar' => $page_data[$i]->tgl_masuk . ' 16:00:00',
                'status_rawat' => 'selesai',
                'staff_checkout' => 'SIM'
            );
            $this->M_Kasir->update_tindakan($datapel, $where, 'pelayanan');
            $tgl_checkout = date('Y-m-d H:i:s');
            $this->M_Kasir->update_tindakan(['tgl_checkout' => $tgl_checkout], $where, 'deatail_kasir');

            // jurnal($page_data[$i]->id_pelayanan, 'SIM');

            // jurnal_ijd($page_data[$i]->id_pelayanan);

            echo $page_data[$i]->id_pelayanan . '<br>';
        }

        echo "selesai";
    }
    public function update_pulang_poli($mulai, $akhir)
    {



        $page_data = $this->db->query("SELECT b.id_pelayanan, date(b.tgl_masuk) tgl_masuk
        from pelayanan b, history_pelayanan h
        where b.id_pelayanan = h.id_pelayanan
        and date(b.tgl_masuk) >= '$mulai' and date(b.tgl_masuk) <= '$akhir'  and h.status = 1 and b.status = 1 
        and b.status_rawat != 'selesai' and b.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status =1)

        group by b.id_pelayanan  
        ORDER BY `tgl_masuk` asc
        ")->result();
        // print_arr($page_data);

        for ($i = 0; $i < count($page_data); $i++) {

            $where = array('id_pelayanan' => $page_data[$i]->id_pelayanan);
            $datapel = array(
                'tgl_keluar' => $page_data[$i]->tgl_masuk . ' 16:00:00',
                'status_rawat' => 'selesai',
                'staff_checkout' => 'SIM'
            );
            $this->M_Kasir->update_tindakan($datapel, $where, 'pelayanan');
            $tgl_checkout = date('Y-m-d H:i:s');
            $this->M_Kasir->update_tindakan(['tgl_checkout' => $tgl_checkout], $where, 'deatail_kasir');

            // jurnal_ijd($page_data[$i]->id_pelayanan);

            echo $page_data[$i]->id_pelayanan . '<br>';
        }

        echo "selesai";
    }
    ////////////////////////////////////////////////////////////////////////////////////
    public function update_coa()
    {

        $this->hapus_duplicate();

        // $page_data1 = $this->db->query("SELECT p.*
        // FROM detail_kasir_diskon p
        // where p.id_pelayanan not in (select distinct(id_pelayanan) from akun_reduksi) and id_pelayanan in (select distinct(id_pelayanan) from akun_tindakan)
        // ")->result();

        // for ($a = 0; $a < count($page_data1); $a++) {

        //     // $this->M_Kasir->delete_tindakan(['id_pelayanan' => $page_data1[$a]->id_pelayanan, 'status' => 0], 'akun_reduksi');
        //     diskon_pelayanan($page_data1[$a]->id_pelayanan, 'SIM'); 
        //     echo $page_data1[$a]->id_pelayanan . '<br>';

        // }

        $page_data = $this->db->query("SELECT b.id_pelayanan
        FROM pelayanan b
        WHERE b.tgl_keluar >='2025-05-01' and b.status = 1
        and b.id_pelayanan not in (select distinct(id_pelayanan) from akun_tindakan where tgl_input >= '2025-05-01')
        and b.status_rawat ='selesai' and b.cara_bayar !='30'
        group by b.id_pelayanan
        order by b.tgl_keluar asc
        ")->result();


        for ($i = 0; $i < count($page_data); $i++) {

            $this->M_Kasir->delete_tindakan(['id_pelayanan' => $page_data[$i]->id_pelayanan, 'status' => 0], 'akun_tindakan');

            jurnal($page_data[$i]->id_pelayanan, 'SIM');
            // jurnal_ijd($page_data[$i]->id_pelayanan);

            // echo $page_data[$i]->id_pelayanan . '<br>';
        }
        exit;
        // updateTglPulang_pendapatan('pl_139660');

        // echo "selesai";
    }

    public function hapus_duplicate()
    {


        $page_data = $this->db->query("SELECT
        id_akun, sum(total_akun)
    FROM
        akun_tindakan
    WHERE tgl_input >= '2024-01-01' 
    and cara_bayar != 30 and status =0
    -- and no_jurnal ='0301/GL-301/0724'
    GROUP BY
        id_pelayanan,
        id_poli,
        total_akun,    
        harga_jasa,
        jenis_akun
    HAVING  COUNT(id_pelayanan) > 1
        AND COUNT(id_poli) > 1
        AND COUNT(total_akun) > 1
        AND COUNT(jenis_akun) > 1
        AND COUNT(harga_jasa) > 1
        ")->result();


        for ($i = 0; $i < count($page_data); $i++) {

            $this->M_Kasir->delete_tindakan(['id_akun' => $page_data[$i]->id_akun], 'akun_tindakan');
        }

        // updateTglPulang_pendapatan('pl_139660');

        // echo "selesai";
    }



    ////////////////////////////////////////////////////////////////////////////////////////
    public function setJurnalBank()
    {
        $out = null;
        $staff = $this->session->userdata('data_auth');


        // $id_fk = implode("", [uniqid(), $staff->username]);
        $a = $this->db->query("SELECT b.tgl,b.pk,j.id_jurnal,j.rekening,j.deskripsi,j.des_rek,b.debet,b.no_jurnal,b.no_jurnal_fk,b.id_vendor,b.keterangan,b.id_fk
        FROM jurnal_cara_pembayaran j
        join jurnal_bank b on j.id_jurnal = b.id_jurnal  
        where date(b.tgl) >= '2023-07-01' and date(b.tgl) <='2023-07-31'
        group by b.id_jurnal_bank")->result();

        foreach ($a as $row) {

            $jurnal_bank_kredit = [
                'id_fk' => $row->id_fk,
                'jk' => '10',
                'rekening' => $row->rekening,
                'deskripsi' => $row->deskripsi,
                'no_jurnal' =>  $row->no_jurnal,
                'kredit' => $row->debet,
                'debet' => 0,
                'lap' => '01',
                'jb' => '011',
                'cj' => '101',
                'pk' => $row->pk,
                'tgl' => $row->tgl,
                'des_rek' =>  $row->des_rek,
                'staff' => 'TES',
                'keterangan' => $row->keterangan,
                'id_vendor' => $row->id_vendor,
                'id_jurnal' => $row->id_jurnal,
                'no_jurnal_fk' => $row->no_jurnal_fk,

            ];
            $this->M_Kasir->insert_tindakan($jurnal_bank_kredit, 'jurnal_bank');
            // var_dump($jurnal_bank);
        }

        $out['status'] = 'success';


        echo json_encode($out);
    }

    public function setJurnal_Nontunai_pymhd()
    {

        $out = null;
        $tgl = '2024-02-29';
        $staff = $this->session->userdata('data_auth');
        $jenis_klaim = '30';

        // $data = ['pl_341459','pl_342958'];
        $data = $this->db->get_where('akun_tindakan', ['no_jurnal' => '0350/GL-304/0224'])->result();
        for ($i = 0; $i < count($data); $i++) {
            // $a[] = $this->db->query("SELECT * from jurnal_cara_pembayaran where id_jurnal_bayar = '$data[$i]'")->row();
            $a[] = $this->M_Jurnal_pendapatan_nontunai->Set_jurnal_nontunai($data[$i]->id_pelayanan);
        }



        $cara_bayar = $this->db->get_where('cara_bayar', ['id_cara_bayar' => $jenis_klaim])->row();
        $id_vendor = $cara_bayar->kode_pelanggan;

        $noDok = '0350/GL-304/0224';
        $noDokR = $noDok;
        $max = 0;
        $kode = '304';
        $jenis_pelayanan = 'RANAP';
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
                'tgl' => $tgl,
                'tgl_input' => date('Y-m-d H:i:s'),
                'des_rek' => $des,
                'staff' => $staff->nama,
                'id_vendor' => $id_vendor

            ];
            $this->M_Kasir->insert_tindakan($jurnal_pendapatan, 'jurnal_pendapatan');
        }

        // /////////////UPDATE AKUN/////////////////////////
        // for ($i = 0; $i < count($data); $i++) {
        //     $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDokR], ['id_pelayanan' => $data[$i]], 'akun_tindakan');
        //     $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDokR], ['id_pelayanan' => $data[$i]], 'akun_non_pelayanan');
        // }

        // ///////////////DEPOSITE SELISIH////////////////////////
        // for ($i = 0; $i < count($data); $i++) {
        //     $db_deposite = $this->M_Jurnal_pendapatan_nontunai->selectPendapatanKasir($data[$i]);

        //     // $selisih = $this->M_Jurnal_pendapatan_nontunai->getSelisih($data[$i]);
        //     for ($p = 0; $p < count($db_deposite); $p++) {
        //         $jurnal_cara_bayar1 = [

        //             'id_jurnal' => $data[$i],
        //             'jk' => '10',
        //             'rekening' => '403.01.000',
        //             'deskripsi' => 'DEPOSITE ' . $db_deposite[$p]->keterangan . ' ' . $db_deposite[$p]->bank . ' ATAS NAMA ' . $db_deposite[$p]->pasien,
        //             'no_jurnal' => $noDok,
        //             'kredit' => 0,
        //             'debet' => $db_deposite[$p]->total_akun,
        //             'lap' => '01',
        //             'jb' => '',
        //             'cj' => '101',
        //             'pk' => $db_deposite[$p]->pasien,
        //             'tgl' => $tgl,
        //             'tgl_input' => date('Y-m-d H:i:s'),
        //             'des_rek' => 'DEPOSITE ' . $db_deposite[$p]->keterangan . ' ' . $db_deposite[$p]->bank . ' ATAS NAMA ' . $db_deposite[$p]->pasien,
        //             'staff' => $staff->nama,
        //             'cara_klaim' => 'SELISIH',
        //             'ket_bayar' => 'non tunai',
        //             'jenis_jurnal' => $jenis_pelayanan,
        //             'id_vendor' => $db_deposite[$p]->kode_pelanggan
        //         ];
        //         $this->M_Kasir->insert_tindakan($jurnal_cara_bayar1, 'jurnal_cara_pembayaran');
        //     }
        // }


        // $selisih = $this->M_Jurnal_pendapatan_nontunai->select_selisih_nontunai($noDok);
        // $total_selisih = isset($selisih) ? $selisih->total : 0;
        // /////////////////////////////////////////

        // /////REDUKSI///////////////////////
        // if ($cara_bayar->diskon != 0) {
        //     if ($jenis_pelayanan == 'RAJAL') {
        //         $reduksi_carabayar = $this->M_Jurnal_pendapatan_nontunai->reduksi_carabayar_rajal($noDok);
        //     } else {
        //         $reduksi_carabayar = $this->M_Jurnal_pendapatan_nontunai->reduksi_carabayar_ranap($noDok);
        //     }

        //     // print_r($reduksi_carabayar);
        //     foreach ($reduksi_carabayar as $pelayanan => $key) {
        //         foreach ($key as  $row) {
        //     // for ($h = 0; $h < count($reduksi_carabayar); $h++) {
        //         $jurnal_reduksi_klaim = [
        //             'id_jurnal' => $row->id_pelayanan,
        //             'id_fk' => $row->id_pelayanan,
        //             'jk' => $jk,
        //             'rekening' => $row->kode_akun,
        //             'deskripsi' => $row->jenis_akun . ' ATAS NAMA ' . $row->pasien,
        //             'no_jurnal' => $noDok,
        //             'kredit' => 0,
        //             'debet' => ($row->total - $row->selisih) * $cara_bayar->diskon,
        //             'lap' => $row->lap,
        //             'jb' => '',
        //             'cj' => '101',
        //             'pk' => $row->pasien,
        //             'tgl' => $tgl,
        //             'tgl_input' => date('Y-m-d H:i:s'),
        //             'des_rek' => $row->jenis_akun . ' ATAS NAMA ' . $row->pasien,
        //             'staff' => $staff->nama,
        //             'cara_klaim' => 'REDUKSI',
        //             'ket_bayar' => 'non tunai',
        //             'jenis_jurnal' => $jenis_pelayanan,
        //             'id_vendor' => $row->kode_pelanggan
        //         ];
        //         $this->M_Kasir->insert_tindakan($jurnal_reduksi_klaim, 'jurnal_cara_pembayaran');
        //     }
        // }
        //     $total_reduksi = array_sum(array_column($reduksi_carabayar, 'total_akun'));
        //     $total_reduksi = isset($total_reduksi) ? $total_reduksi : 0;
        // } else {
        //     $page_data_reduksi = $this->M_Jurnal_pendapatan_nontunai->Set_jurnal_reduksi($noDok);

        //     for ($r = 0; $r < count($page_data_reduksi); $r++) {

        //         $jurnal_reduksi = [
        //             'id_jurnal' => $page_data_reduksi[$r]->id_pelayanan,
        //             'id_fk' => $page_data_reduksi[$r]->id_pelayanan,
        //             'jk' => $jk,
        //             'rekening' => $page_data_reduksi[$r]->kode_akun,
        //             'deskripsi' => $page_data_reduksi[$r]->jenis_akun . ' ATAS NAMA ' . $page_data_reduksi[$r]->pasien,
        //             'no_jurnal' => $noDok,
        //             'kredit' => 0,
        //             'debet' => $page_data_reduksi[$r]->total_akun,
        //             'lap' => '01',
        //             'jb' => '',
        //             'cj' => '101',
        //             'pk' => $page_data_reduksi[$r]->pasien,
        //             'tgl' => $tgl,
        //             'tgl_input' => date('Y-m-d H:i:s'),
        //             'des_rek' => $page_data_reduksi[$r]->jenis_akun . ' ATAS NAMA ' . $page_data_reduksi[$r]->pasien,
        //             'staff' => $staff->nama,
        //             'cara_klaim' => 'REDUKSI',
        //             'ket_bayar' => 'non tunai',
        //             'jenis_jurnal' => $jenis_pelayanan,
        //             'id_vendor' => $page_data_reduksi[$r]->kode_pelanggan
        //         ];
        //         $this->M_Kasir->insert_tindakan($jurnal_reduksi, 'jurnal_cara_pembayaran');
        //         $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDok], ['id_akun' => $page_data_reduksi[$r]->id_akun], 'akun_reduksi');
        //     }
        //     $total_reduksi = array_sum(array_column($page_data_reduksi, 'total_akun'));
        //     $total_reduksi = isset($total_reduksi) ? $total_reduksi : 0;
        // }




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
            'lap' => '01',
            'jb' => '',
            'cj' => '101',
            'pk' => $id_vendor,
            'tgl' => $tgl,
            'tgl_input' => date('Y-m-d H:i:s'),
            'des_rek' => $des_rek,
            'staff' => $staff->nama,
            'cara_klaim' => $ket,
            'ket_bayar' => 'non tunai',
            'jenis_jurnal' => $jenis_pelayanan,
            'id_vendor' => $id_vendor

        ];
        $this->M_Kasir->insert_tindakan($jurnal_cara_bayar, 'jurnal_cara_pembayaran');
        $this->M_Kasir->update_tindakan(['status' => 1], ['no_jurnal' => $noDok], 'jurnal_pendapatan');


        //PPN DIBEBASKAN
        $db_ppn_bebas = $this->M_Jurnal_pendapatan->get_total_revenue($noDok);
        $total_reduksi = $this->M_Jurnal_pendapatan->get_total_reduksi($noDok)->reduksi;

        $des_rek_k = 'PPN Keluaran Lainnya dan Non Waku';
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
            'lap' => '01',
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


    public function pulang_poli_sch()
    {
        $today = time();
        // Mengurangi satu hari dari timestamp hari ini
        $yesterday = strtotime('-1 day', $today);
        // Mengubah timestamp menjadi format tanggal yang diinginkan
        $yesterday_formatted = date('Y-m-d', $yesterday);

        $page_data = $this->db->query("SELECT b.id_pelayanan, date(b.tgl_masuk) tgl_masuk
        from pelayanan b, history_pelayanan h
        where b.id_pelayanan = h.id_pelayanan
        and date(b.tgl_masuk) >= '2025-01-01' and date(b.tgl_masuk) <= '$yesterday_formatted' and h.status = 1 and b.status = 1 and b.cara_bayar='30'
        and b.status_rawat != 'selesai' 
        and b.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status =1 and date(tgl_masuk) >='2024-12-01')
        and b.id_pelayanan not in (select id_pelayanan from antrian_operasi where tanggal >='2024-12-01')

        group by b.id_pelayanan  
        ORDER BY `tgl_masuk` asc
        ")->result();
        // print_arr($page_data);

        for ($i = 0; $i < count($page_data); $i++) {

            $where = array('id_pelayanan' => $page_data[$i]->id_pelayanan);
            $datapel = array(
                'tgl_keluar' => $page_data[$i]->tgl_masuk . ' 16:00:00',
                'status_rawat' => 'selesai',
                'staff_checkout' => 'SIM'
            );
            $this->M_Kasir->update_tindakan($datapel, $where, 'pelayanan');
            // $tgl_checkout = date('Y-m-d H:i:s');
            // $this->M_Kasir->update_tindakan(['tgl_checkout' => $tgl_checkout], $where, 'deatail_kasir');

        }
    }
    public function pulang_igd_sch()
    {
        $today = time();
        // Mengurangi satu hari dari timestamp hari ini
        $yesterday = strtotime('-1 day', $today);
        // Mengubah timestamp menjadi format tanggal yang diinginkan
        $yesterday_formatted = date('Y-m-d', $yesterday);

        $page_data = $this->db->query("SELECT b.id_pelayanan, date(b.tgl_masuk) tgl_masuk
        from pelayanan b, history_pelayanan_ugd h
        where b.id_pelayanan = h.id_pelayanan
        and date(b.tgl_masuk) >= '2025-01-01' and date(b.tgl_masuk) <= '$yesterday_formatted' and h.status = 1 and b.status = 1 and b.cara_bayar ='30'
        and b.status_rawat != 'selesai' 
        and b.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status =1 and date(tgl_masuk) >='2024-12-01')
        group by b.id_pelayanan  
        ORDER BY `tgl_masuk` asc
        ")->result();
        // print_arr($page_data);

        for ($i = 0; $i < count($page_data); $i++) {

            $where = array('id_pelayanan' => $page_data[$i]->id_pelayanan);
            $datapel = array(
                'tgl_keluar' => $page_data[$i]->tgl_masuk . ' 16:00:00',
                'status_rawat' => 'selesai',
                'staff_checkout' => 'SIM'
            );
            $this->M_Kasir->update_tindakan($datapel, $where, 'pelayanan');
            // $tgl_checkout = date('Y-m-d H:i:s');
            // $this->M_Kasir->update_tindakan(['tgl_checkout' => $tgl_checkout], $where, 'deatail_kasir');
        }
    }
}
