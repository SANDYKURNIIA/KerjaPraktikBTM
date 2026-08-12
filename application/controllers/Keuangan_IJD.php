<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan_IJD extends CI_Controller
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
    // ////////////////////////////////////////Verifikasi IJD //////////////////////////////////////////////////////
    public function Verifikasi_ijd()
    {
        $this->load->view('assets/_header');
        $page_data['dokter'] = $this->db->query("SELECT * from dokter where status='AKTIF' group by nama")->result_array();
        $page_data['jenis'] = $this->db->get('kelompok_jurnal')->result_array();
        $page_data['page_content'] = 'Jurnal/Laporan_verifikasi_ijd';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_verifikasi_ijd()
    {
        $out = null;
        $db = null;

        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $dokter = $this->input->post('dokter');
        $jenis = $this->input->post('jenis');

        $page_data = $this->M_Keuangan_ijd->Select_ijd($dokter, $jenis, $first_date, $second_date, '0');


        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);

            $no = $i + 1;
            // $tgl =  strftime("%A, %d %B %Y ", $tgl);
            $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_akun . "'><label ></label></div>";

            $arr = explode("_", $page_data[$i]->id_pelayanan);
            $no_reg = 'RS01' . $arr[1];
            $nama = $page_data[$i]->nama;
            $tgl = date('d-m-Y', strtotime($page_data[$i]->tgl));
            $tindakan = $page_data[$i]->tindakan;
            $poli = $page_data[$i]->poli;
            $tipe = $page_data[$i]->tipe_pasien;
            $biaya = number_format($page_data[$i]->biaya, 2, ',', '.');
            $frek = $page_data[$i]->frek;
            $fee = $biaya;
            $rsppbm = $page_data[$i]->rsppbm;
            $rslain = $page_data[$i]->rs_lain;
            $jumlah = number_format($page_data[$i]->jumlah, 2, ',', '.');

            $out[$i] = array($checkbox, $no, $no_reg, $nama, $tgl, $tindakan, $poli, $tipe, $biaya, $frek, $fee, $jumlah);
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

    public function setVerifikasi()
    {
        $out = null;
        $staff = $this->session->userdata('data_auth');
        $data = $this->input->post('req');


        $id_fk = date('Y-m-d H:i:s');

        for ($j = 0; $j < count($data); $j++) {
            $db = [
                'verifikasi' => 1,
                'tgl_verifikasi' => $id_fk,
                'staff_verifikasi' => $staff->nama,
            ];
            $this->M_Kasir->update_tindakan($db, ['id_akun' => $data[$j]], 'akun_jasa_dokter');
        }
        $out['status'] = 'success';
        // }

        echo json_encode($out);
    }

    public function cetak_verifikasi()
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
    // ////////////////////////////////////////JURNAL IJD //////////////////////////////////////////////////////
    public function Bymhd_ijd()
    {
        $this->load->view('assets/_header');
        $page_data['dokter'] = $this->db->query("SELECT * from dokter where status='AKTIF' group by nama")->result_array();
        $page_data['page_content'] = 'Jurnal/Bymhd_ijd';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_bymhd_ijd()
    {
        $out = null;

        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $dokter = $this->input->post('dokter');

        $page_data = $this->M_Keuangan_ijd->SelectJurnalIJD($first_date, $second_date, $dokter);

        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);

            $no = $i + 1;
            // $tgl =  strftime("%A, %d %B %Y ", $tgl);
            $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_pelayanan . "'><label ></label></div>";

            $arr = explode("_", $page_data[$i]->id_pelayanan);
            $no_reg = 'RS01' . $arr[1];
            $nama = $page_data[$i]->nama;
            $tgl = date('d-m-Y', strtotime($page_data[$i]->tgl));
            $tipe = $page_data[$i]->tipe_pasien;

            $jumlah = number_format($page_data[$i]->jumlah, 2, ',', '.');

            $out[$i] = array($checkbox, $no, $no_reg, $nama, $tgl, $tipe, $jumlah);
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
    public function setJurnalIJD()
    {
        $staff = $this->session->userdata('data_auth');

        $dokter = $this->input->post('dokter');
        $tgl = $this->input->post('tgl');

        $data = $this->input->post('req');
        for ($i = 0; $i < count($data); $i++) {
            $a[] = $this->M_Keuangan_ijd->setJurnalIJD($data[$i]);
        }

        $maxR = $this->M_Jurnal_keuangan->selectNoDokumenPau('306', $tgl)->max;
        $noValidR =  sprintf('%04d', $maxR + 1, 'dyhtdyu');
        $noDokR = $noValidR . "/" . "GL-306" . "/" . date('my', strtotime($tgl));
        $dokumen = ['no_dokumen' => $noDokR, 'no_index' => $maxR + 1, 'kode' => '306', 'tgl' => $tgl, 'staff' => $staff->nama];
        $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');
        // $pk = 'N01PAU' . date('my') . $noValidR;
        $pk = date('my', strtotime($tgl));

        $id_fk = uniqid() . "" . $staff->id_staff;
        foreach ($a as $b) {
            foreach ($b as $item) {
                $arr = explode(".", $item->kode_akun);

                $jurnal_ijd = [
                    'id_fk' => $id_fk,
                    'jk' => '15',
                    'rekening' => $item->kode_akun,
                    'deskripsi' => 'Insentif Jasa Dokter ' . $item->tindakan .  ' = ' . $dokter,
                    'no_jurnal' => $noDokR,
                    'kredit' => 0,
                    'debet' => $item->jumlah,
                    'lap' => '02',
                    'jb' => $arr[2],
                    'cj' => '101',
                    'pk' => $pk,
                    'tgl' => $tgl,
                    'des_rek' => 'Insentif Jasa Dokter ' . $item->tindakan . ' = ' . $dokter,
                    'staff' => $staff->nama

                ];
                $this->M_Kasir->insert_tindakan($jurnal_ijd, 'jurnal_ijd');
                $this->M_Kasir->update_tindakan(['status' => 1, 'no_jurnal' => $noDokR], ['id_akun' => $item->id_akun], 'akun_jasa_dokter');
            }
        }


        $db_jurnal = $this->M_Keuangan_ijd->selectJurnalBebanIJD($noDokR);
        // var_dump($db_jurnal);

        $total = $db_jurnal->total;
        // echo $total . '<br>';
        $pkp = $total * 0.5;
        // echo $pkp;



        $year = date('Y');
        $sum_pkp = $this->db->query("SELECT sum(total) jumlah from pkp_ijd where dokter = '$dokter' and SUBSTRING_INDEX(periode, '-', -1) = '$year'")->row()->jumlah;

        // $sum_pkp = 5820000000;
        // echo $sum_pkp;

        $h9 =    $sum_pkp; //jumlah pkp sebelumnya
        $g10 =   $pkp; //pkp sekarang
        $kumulatif =   $sum_pkp + $pkp; //kumulatif = h9 + g10






        if ($kumulatif > 60000000 && $kumulatif <= 250000000) {
            if ($sum_pkp > 60000000) {
                $pajak = $pkp * 0.15;
            } else {
                $pajak = ((60000000 - $sum_pkp) * 0.05) + (($pkp - (60000000 - $sum_pkp)) * 0.15);
            }
        } else if ($kumulatif > 250000000 && $kumulatif <= 500000000) {
            if ($sum_pkp > 250000000) {
                $pajak = $pkp * 0.25;
            } else {
                $pajak = ((250000000 - $sum_pkp) * 0.15) + (($pkp - (250000000 - $sum_pkp)) * 0.25);
            }
        } else if ($kumulatif > 500000000 && $kumulatif <= 5000000000) {
            if ($sum_pkp > 500000000) {
                $pajak = $pkp * 0.3;
            } else {
                $pajak = ((500000000 - $sum_pkp) * 0.25) + (($pkp - (500000000 - $sum_pkp)) * 0.3);
            }
        } else {
            if ($sum_pkp > 5000000000) {
                $pajak = $pkp * 0.35;
            } else {
                $pajak = ((5000000000 - $sum_pkp) * 0.3) + (($pkp - (5000000000 - $sum_pkp)) * 0.35);
            }
        }


        // echo $pajak;

        $jurnal_hutang_ijd = [

            'id_fk' => $db_jurnal->id_fk,
            'jk' => '15',
            'rekening' => '415.02.000',
            'deskripsi' => 'Utang Insentif Jasa Dokter = ' .  $dokter,
            'no_jurnal' => $noDokR,
            'kredit' => $total,
            // 'kredit' => $total - $pajak,
            'debet' => 0,
            'lap' => '02',
            'jb' => '130',
            'cj' => '101',
            'pk' =>  $pk,
            'tgl' => $tgl,
            'des_rek' => 'Utang Insentif Jasa Dokter = ' .  $dokter,
            'staff' => $staff->nama,

        ];

        $pph_ijd = [

            'id_fk' => $db_jurnal->id_fk,
            'jk' => '15',
            'rekening' => '410.01.000',
            'deskripsi' => 'Utang Insentif Jasa Dokter = ' .  $dokter . ' = PPh 21',
            'no_jurnal' => $db_jurnal->no_jurnal,
            'kredit' => $pajak,
            'debet' => 0,
            'lap' => '02',
            'jb' => '130',
            'cj' => '101',
            'pk' =>  $pk,
            'tgl' => $tgl,
            'des_rek' => 'Utang Insentif Jasa Dokter = ' .  $dokter . ' = PPh 21',
            'staff' => $staff->nama,

        ];
        $this->M_Kasir->insert_tindakan($jurnal_hutang_ijd, 'jurnal_ijd');
        // $this->M_Kasir->insert_tindakan($pph_ijd, 'jurnal_hutang_ijd');

        $pkp_ijd = [
            'periode' => date('m-Y'),
            'dokter' => $dokter,
            'total' => $pkp,

        ];
        $this->M_Kasir->insert_tindakan($pkp_ijd, 'pkp_ijd');
        $out['status'] = 'success';
        echo json_encode($out);
    }


    public function Summary_ijd()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Laporan_summary_ijd';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_summary_ijd()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Keuangan_ijd->SelectLaporanIjd($first_date, $second_date);
        } else {
            $page_data = $this->M_Keuangan_ijd->SelectLaporanIjd('', '');
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;


            $no_jurnal = $page_data[$i]->no_jurnal;
            $total = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $pk = $page_data[$i]->pk;
            $id_fk = $page_data[$i]->id_fk;
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='setJurnal(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\",\"" .  $id_fk . "\")' '><i class='icon-printer '></i></button>";

            $out[$i] = array($no, $cetak, $tgl, $no_jurnal, $total, $staff);
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

    public function cetak_jurnal_ijd()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $id_fk = $this->input->post('id_fk');
        $page_data['tgl'] = $this->input->post('tgl');
        $page_data['staff'] = $this->input->post('staff');
        $page_data['jk'] = $this->input->post('jk');
        $page_data['no_jurnal'] = $no_jurnal;
        $page_data['data'] = $this->M_Keuangan_ijd->getJurnalIJD($id_fk);
        $page_data['staff_verifikasi'] = "";
        $page_data['judul'] = "JURNAL INSENTIF JASA DOKTER";
        $response = $this->load->view('jurnal_print/cetak_jurnal', $page_data, TRUE);
        echo $response;
    }

    /////////////////Pembayaran piutang//////////////////////
    public function Pembayaran_IJD()
    {
        $this->load->view('assets/_header');

        $page_data['judul'] = "PEMBAYARAN INSENTIF JASA DOKTER";

        $page_data['page_content'] = 'Jurnal/Pembayaran_IJD';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Detail_Pembayaran_IJD()
    {
        $this->load->view('assets/_header');
        $tgl = date('Y-m');
        // $max = $this->db->query("SELECT max(indeks) max from detail_hutang_bukti_kas where tgl like '$tgl%'")->row();
        // // $i = 0;
        // $page_data = array('max' =>  $max->max + 1,);
        $page_data['judul'] = "FORM PEMBAYARAN IJD";
        $page_data['pelayanan'] = $this->db->query("SELECT distinct(d.nama) dokter
        from akun_jasa_dokter a, dokter d
        where a.dokter = d.id_dokter and a.status_pembayaran is null and a.status = 1")->result_array();

        $page_data['page_content'] = 'Jurnal/Detail_pembayaran_IJD';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_pembayaran_IJD()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');


        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Keuangan_ijd->select_pembayaran_IJD($first_date, $second_date);
        } else {
            $page_data = $this->M_Keuangan_ijd->select_pembayaran_IJD($tgl, $tgl);
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;


            $no_jurnal = $page_data[$i]->vendor;

            $total = number_format($page_data[$i]->total - $page_data[$i]->kredit, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            // $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_dokumen . "\")' '><i class='icon-printer '></i></button>";


            $pilih =  "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_dokumen . "\")' '><i class='icon-printer '></i></button>";


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

            // $out[$i] = array($no, $tombol, $pilih, $tgl, $no_jurnal, $total, $no_dokumen, $staff, $direktur, $chief);
            $out[$i] = array($no, $pilih, $tgl,$no_dokumen,  $no_jurnal, $total, $staff, $chief);
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
    function getVendor_piutang()
    {
        $klaim = $this->input->post('klaim');
        $data = $this->db->query("SELECT pk,no_jurnal from jurnal_piutang where id_vendor ='$klaim' group by no_jurnal")->result();

        echo json_encode($data);
    }
    function getTotalInv()
    {
        $inv = $this->input->post('inv');
        $data = $this->db->query("SELECT sum(debet) total from jurnal_piutang where pk ='$inv'")->row();

        echo json_encode($data);
    }
    function tampil_pasien_by_dokter()
    {
        $dokter = $this->input->post('idFaktur');

        $page_data = $this->M_Keuangan_ijd->get_IJD_by_dokter($dokter);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;

            $no_rm = $page_data[$i]->no_rm;
            $nama = $page_data[$i]->nama;
            $tgl_masuk = indo_date2($page_data[$i]->tgl);
            $nilai = number_format($page_data[$i]->total, 0, ',', '.');
            $total = number_format($page_data[$i]->piutang, 0, ',', '.');
            $nilai1 = round($page_data[$i]->total - $page_data[$i]->piutang);

            $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_pelayanan . "'><label ></label></div>";

            $out[$i] = array($checkbox, $no_rm, $nama, $tgl_masuk, $nilai, $total);
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
    public function insertdetail_utang()
    {
        $data_staff = $this->session->userdata('data_auth');

        $vendor = $this->input->post('vendor');
        $req = $this->input->post('req');
        $date = $this->input->post('tgl');
        $tgl = date('Y-m', strtotime($date));

        $max = $this->db->query("SELECT max(indeks) max from bukti_kas where tgl like '$tgl%'")->row();

        $noValidR =  sprintf('%04d', $max->max + 1, 'dyhtdyu');
        $noDokR = $noValidR . "/" . "BP" . "/" . date('my', strtotime($date));
        $data_bukti = [
            'indeks' => $max->max + 1,
            'no_dokumen' => $noDokR,
            'staff' => $data_staff->nama,
            'tgl' => $date,
            'vendor' => $vendor,
            'tipe' => 'UTANG',
            'save' => 2,
        ];
        $this->M_Kasir->insert_tindakan($data_bukti, 'bukti_kas');

        for ($i = 0; $i < count($req); $i++) {
            $a[] = $this->M_Keuangan_ijd->SelectPembayaran_IJD($req[$i], $vendor);
        }
        // print_arr($a);
        foreach ($a as $b) {
            // echo $b->id_pelayanan;
            $data_utang = array(
                'id_jurnal' => $b->id_pelayanan,
                'indeks' => $max->max + 1,
                'no_dokumen' => $noDokR,
                'vendor' => $vendor,
                'tipe' => 'UTANG',
                'akun' => "401.01.000",
                'debet' =>  $b->jumlah,
                'kredit' =>  0,
                'pk' =>  $b->no_jurnal,
                'deskripsi' => "Pembayaran Utang Imbalan Jasa Dokter " . $vendor,
                'staff' => $data_staff->nama,
                'tgl' => $date,
                'save' => 2,

            );

            $this->M_Kasir->insert_tindakan($data_utang, 'detail_hutang_bukti_kas');

            // $data1 = array(
            //     'id_pelayanan' => $b->id_pelayanan,
            //     'no_dokumen' => $noDokR,
            //     'vendor' => $vendor,
            //     'tipe' => 'UTANG',
            //     'akun' => "401.01.000",
            //     'debet' => $b->jumlah,
            //     'staff' => $data_staff->nama,
            //     'pk' =>  $b->no_jurnal,
            //     'tgl' => $date,
            //     'deskripsi' => "Pembayaran Piutang " . $vendor,

            // );

            // $this->M_Kasir->insert_tindakan($data1, 'detail_pembayaran_piutang');

            $id_pelayanan = $b->id_pelayanan;
            // $this->M_Kasir->update_tindakan(['status_pembayaran' => $noDokR], ['id_pelayanan' => $id_pelayanan], 'akun_jasa_dokter');
        }




        $out['status'] = "success";
        echo json_encode($out);
    }
    public function simpan_bukti()
    {
        $tipe = $this->input->post('tipe');
        $no_dok = $this->input->post('no_dok');
        $vendor = $this->input->post('vendor');


        $data = array(
            'save' => 1,
        );

        $this->M_Kasir->update_tindakan($data, ['no_dokumen' => $no_dok], 'detail_pembayaran_piutang');

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function simpan_bundle_piutang()
    {
        $idFaktur = $this->input->post('idFaktur');
        $tgl_faktur = $this->input->post('tgl_faktur');
        $vendor = $this->input->post('vendor');
        $no_jurnal = $this->input->post('no_jurnal');
        $data_staff = $this->session->userdata('data_auth');
        $noDokR = $this->input->post('no_dok');
        // $jurnal = $this->db->get_where('jurnal_pembayaran_farmasi', ['id_jurnal' => $idFaktur])->row();

        $page_data = $this->M_Jurnal_keuangan->getDetailPiutang($no_jurnal);
        foreach ($page_data as $row) {
            $data = array(
                'id_pelayanan' => $row->id_pelayanan,
                'no_dokumen' => $noDokR,
                'vendor' => $vendor,
                'tipe' => $no_jurnal,
                'akun' => "401.01.000",
                'debet' => $row->total,
                'staff' => $data_staff->nama,
                'pk' => $noDokR,
                'tgl' => $tgl_faktur,
                'deskripsi' => "Pembayaran Piutang " . $vendor,
                'save' => 1,

            );
            $this->M_Kasir->insert_tindakan($data, 'detail_pembayaran_piutang');
        }

        $this->M_Kasir->update_tindakan(['status_piutang' => 1], ['pk' => $noDokR], 'jurnal_piutang');

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_total_piutang()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->db->query("SELECT sum(debet) total,sum(kredit) kredit from detail_pembayaran_piutang where no_dokumen = '$idFaktur' group by no_dokumen")->result();
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
}
