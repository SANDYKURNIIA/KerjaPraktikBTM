<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal_utang_piutang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Jurnal_pembayaran_utang');
        $this->load->model('M_Jurnal_keuangan');
        $this->load->model('M_Kasir');
    }

    // ////////////////////////////////////////Verifikasi Pengadaan Obat //////////////////////////////////////////////////////
    public function Verifikasi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Verifikasi_pembayaran_utang';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_verifikasi()
    {
        $out = null;
        $db = null;

        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $tipe = $this->input->post('tipe');


        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Jurnal_pembayaran_utang->SelectBuktiKas($first_date, $second_date);
        } else {
            $page_data = $this->M_Jurnal_pembayaran_utang->SelectBuktiKas('', '');
        }

        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;

            $dbvendor = $this->db->get_where('produsen', ['kode' => $page_data[$i]->vendor])->row();

            $no_jurnal = $dbvendor->nama_produsen;
            $no_dokumen = $page_data[$i]->no_dokumen;

            $total = number_format($page_data[$i]->total - $page_data[$i]->kredit, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_dokumen . "\")' '><i class='icon-printer '></i></button>";
            $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->no_dokumen . "'><label ></label></div>";

            $out[$i] = array($checkbox, $no_dokumen, $no_jurnal, $total, $tgl);
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
        $tgl = $this->input->post('tgl');
        for ($j = 0; $j < count($data); $j++) {

            $page_data = $this->M_Jurnal_pembayaran_utang->get_PembayaranUtang($data[$j]);
            $tipe = ($page_data[0]->pembayaran == '101.01.000') ? 'KAS' : 'BANK';
            $kode = ($page_data[0]->pembayaran == '101.01.000') ? '301' : '302';
            $jk = ($page_data[0]->pembayaran == '101.01.000') ? '10' : '11';

            $maxR = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl)->max;
            $noValidR =  sprintf('%04d', $maxR + 1, 'dyhtdyu');
            $noDokR = $noValidR . "/" . "GL-" . $kode . "/" . date('my', strtotime($tgl));

            for ($i = 0; $i < count($page_data); $i++) {
                $akun_split = explode(".", $page_data[$i]->akun);
                $jurnal_1 = [
                    'id_fk' => $tipe,
                    'jk' => $jk,
                    'rekening' => $page_data[$i]->akun,
                    'deskripsi' => $page_data[$i]->deskripsi,
                    'no_jurnal' => $noDokR,
                    'kredit' => $page_data[$i]->kredit,
                    'debet' => $page_data[$i]->debet,
                    'lap' => '01',
                    'jb' => $akun_split[2],
                    'cj' => '0',
                    'pk' => $page_data[$i]->pk,
                    'tgl' => $tgl,
                    'des_rek' => $page_data[$i]->deskripsi,
                    'staff' => $staff->nama,

                ];
                $this->M_Kasir->insert_tindakan($jurnal_1, 'detail_jurnal_kas_bank');



                $this->M_Kasir->update_tindakan(['ket_jurnal' => 1], ['no_dokumen' => $data[$j]], 'detail_hutang_bukti_kas');
            }

            $jurnal = array(
                'no_jurnal' => $noDokR,
                'tanggal' => $tgl,
                'tipe_jurnal' => $tipe,
                'tgl_input' => date("Y-m-d H:i:s"),
                'id_staff' => $staff->id_staff,
                'tgl_simpan' => date('Y-m-d H:i:s'),
                'ket' => 1
            );


            $this->M_Kasir->insert_tindakan($jurnal, 'jurnal_kas_bank');
            $dokumen = ['no_dokumen' => $noDokR, 'no_index' => $maxR + 1, 'kode' => $kode, 'tgl' => $tgl, 'staff' => $staff->nama];
            $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');
        }

        $out['status'] = 'success';
        // }

        echo json_encode($out);
    }

    ///////////////////////ACC JURNAL////////////////////////////
    public function Jurnal_verifikasi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Jurnal_pembayaran_utang';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jurnal()
    {
        $out = null;
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Jurnal_pembayaran_utang->selectPembayaranUtang($mulai, $akhir);
        } else {
            $page_data = $this->M_Jurnal_pembayaran_utang->selectPembayaranUtang('', '');
        }

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tgl = indo_date2($page_data[$i]->tgl);

            $no_dokumen = $page_data[$i]->no_jurnal;

            $total = number_format($page_data[$i]->total, 2, ',', '.');

            $verif = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>VERIFIKASI</button>";
            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $id_fk = $page_data[$i]->pk;

            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='setJurnal(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\",\"" .  $id_fk  . "\")' '><i class='icon-printer '></i></button>";

            $out[$i] = array($no, $verif, $cetak, $tgl, $no_dokumen, $total);
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
        $data = [
            'status' => 1,
            'staff_verifikasi' => $data_staff->nama
        ];

        $this->M_Kasir->update_tindakan($data, ['no_jurnal' => $noDok], 'jurnal_pembayaran_utang');
        $out['status'] = "success";

        echo json_encode($out);
    }

    ///////////////////////////////////////////////////////////////
    public function Laporan_jurnal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Laporan_jurnal_pembayaran_utang';
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
            $page_data = $this->M_Jurnal_pembayaran_utang->selectLaporanPembayaranUtang($first_date, $second_date, $tipe);
        } else {
            $page_data = $this->M_Jurnal_pembayaran_utang->selectLaporanPembayaranUtang('', '', $tipe);
        }


        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $tgl = indo_date2($page_data[$i]->tgl);

            $no_jurnal = $page_data[$i]->no_jurnal;

            $total = number_format($page_data[$i]->total, 2, ',', '.');

            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $id_fk = $page_data[$i]->pk;

            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='setJurnal(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\",\"" .  $id_fk  . "\")' '><i class='icon-printer '></i></button>";

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

    public function cetak_jurnal()
    {

        $id_fk = $this->input->post('id_fk');
        $no_jurnal = $this->input->post('no_jurnal');
        $page_data['tgl'] = $this->input->post('tgl');
        $page_data['staff'] = $this->input->post('staff');
        $page_data['jk'] = $this->input->post('jk');
        $page_data['no_po'] = $id_fk;
        $page_data['no_jurnal'] = $this->input->post('no_jurnal');
        $page_data['judul'] = 'JURNAL PEMBAYARAN UTANG';
        $page_data['data'] = $this->M_Jurnal_pembayaran_utang->getJurnalPembayaranUtang($no_jurnal);
        $db = $this->db->get_where('jurnal_pembayaran_utang', ['no_jurnal' => $no_jurnal])->row();
        $page_data['staff_verifikasi'] = $db->staff_verifikasi;

        $response = $this->load->view('jurnal_print/cetak_jurnal', $page_data, TRUE);
        echo $response;
    }

    /////////////////Pembayaran piutang//////////////////////
    public function Pembayaran_piutang()
    {
        $this->load->view('assets/_header');

        $page_data['tipe'] = "tambah";
        $page_data['judul'] = "PEMBAYARAN PIUTANG";
        $page_data['pelayanan'] = $this->db->query("SELECT distinct(id_vendor) id_vendor,cara_klaim from jurnal_piutang where status_piutang=0")->result_array();

        $page_data['page_content'] = 'Jurnal/Pembayaran_piutang';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Detail_Pembayaran_piutang($no_dok)
    {
        $this->load->view('assets/_header');
        $no_dok = base64_decode(urldecode($no_dok));
        $data = $this->db->query("SELECT * from pembayaran_piutang where no_dokumen='$no_dok'")->row();
        $page_data['invoice'] = $this->db->query("SELECT pk,no_jurnal from jurnal_piutang where id_vendor ='$data->id_vendor' group by no_jurnal")->result();

        $page_data['pelayanan'] = $this->db->get('daftar_akun')->result_array();
        $page_data['no_dokumen'] = $no_dok;
        $page_data['vendor'] = $data->vendor;
        $page_data['tipe'] = $data->tipe;
        $page_data['page_content'] = 'Jurnal/Detail_pembayaran_piutang';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_pembayaran_piutang()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $tipe = $this->input->post('tipe');


        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Jurnal_pembayaran_utang->SelectPembayaranPiutang($first_date, $second_date, $tipe);
        } else {
            $page_data = $this->M_Jurnal_pembayaran_utang->SelectPembayaranPiutang('', '', $tipe);
        }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;

            $vendor = $page_data[$i]->vendor;

            $no_jurnal = $page_data[$i]->no_dokumen;
            $total = number_format($page_data[$i]->total - $page_data[$i]->kredit, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            // $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_dokumen . "\")' '><i class='icon-printer '></i></button>";
            if ($page_data[$i]->save == 1) {
                $tombol = "<button title='Menyimpan Pembayaran' class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='verifikasi(\"" . $page_data[$i]->no_dokumen . "\",\"" . "2" . "\",\"" . "staff" . "\")' '><i class='fa fa-check '></i></button>
            <button title='Batal Pembayaran' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='verifikasi(\"" . $page_data[$i]->no_dokumen . "\",\"" . "99" . "\",\"" . "staff" . "\")' '><i class='fa fa-close '></i></button>";

                $pilih =  "<a title='Tambah isi pembayaran' class='btn btn-primary btn-icon-anim btn-square' href='" . base_url('Jurnal_utang_piutang/Detail_Pembayaran_piutang/') . urlencode(base64_encode($page_data[$i]->no_dokumen)) . "'><i class='icon-note'></i></a>";
            } else if ($page_data[$i]->save == 2) {
                if ($tipe == 'verif') {
                    if ($page_data[$i]->pembayaran == null) {
                        $tombol =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='pilih(\"" . $page_data[$i]->no_dokumen .  "\")'><i class='icon-note'></i></a>";
                    } else {
                        $tombol = ($page_data[$i]->pembayaran == '101.01.100') ? 'KAS' : (($page_data[$i]->pembayaran == '415.01.000') ? 'UTANG GAJI' : ((preg_match('/950./i', $page_data[$i]->pembayaran)) ? 'RK' : 'BANK'));
                    }
                } else {
                    $tombol = '<span class="label label-success">TERSIMPAN</span>';
                }
                $pilih =  "";
            } else if ($page_data[$i]->save == 99) {
                $tombol = '<span class="label label-danger">BATAL</span>';
                $pilih =  "";
            }


            if ($page_data[$i]->status_verifikasi == 'DITERIMA') {
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


            if ($tipe == 'tambah' || $tipe == 'non_verif') {
                $out[$i] = array($no, $tombol, $pilih,  $tgl, $no_jurnal, $vendor, $total, $staff, $chief);
            } else {
                $out[$i] = array($no, $tombol,  $tgl, $no_jurnal, $vendor, $total, $staff, $chief);
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
    public function tampil_pembayaran_piutang_by_no()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $no_dok = $this->input->post('no_dok');

        $page_data = $this->db->query("SELECT (t.debet) piutang, t.id_pelayanan,p.no_dokumen, t.invoice ,t.id, ps.no_rm,ps.nama
                 from detail_pembayaran_piutang t, pembayaran_piutang p, pelayanan b, pasien ps
                 where t.id_fk=p.no_dokumen and t.id_pelayanan = b.id_pelayanan and b.id_pasien = ps.no_rm
                 and t.id_fk = '$no_dok'
                 UNION ALL
                 SELECT (t.debet) piutang, t.id_pelayanan,p.no_dokumen, t.invoice ,t.id, '' as no_rm,b.nama_pasien nama
                 from detail_pembayaran_piutang t, pembayaran_piutang p, akun_non_pelayanan b
                 where t.id_fk=p.no_dokumen and t.id_pelayanan = b.id_pelayanan
                 and t.id_fk = '$no_dok'
                --  group by t.id_pelayanan
        ")->result();

        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;

            $no_rm = $page_data[$i]->no_rm;
            $invoice = $page_data[$i]->invoice;
            $nama = $page_data[$i]->nama;
            $total = number_format($page_data[$i]->piutang, 0, ',', '.');

            $hapus =  "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus(\"" . $page_data[$i]->id .  "\")'><i class='fa fa-trash'></i></a>";

            $out[$i] = array($no, $invoice, $no_rm, $nama, $total, $hapus);
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
    public function acc_pembayaran_piutang()
    {
        $data_staff = $this->session->userdata('data_auth');
        $tipe = $this->input->post('tipe');
        $no_dok = $this->input->post('no_dok');
        $status = $this->input->post('status');
        if ($tipe == 'pembayaran') {
            $tgl_faktur = $this->input->post('tgl_faktur');
            $jenis = $this->input->post('id_jenis');
            $no_dok = $this->input->post('no_dokumen');
            $bank = $this->input->post('bank');

            $dok = $this->db->get_where("detail_pembayaran_piutang", ['id_fk' => $no_dok])->result();

            if ($jenis == 'kas') {
                $coa = '101.01.100';
                $kode = '301';
                $judul = 'KAS';
                $jk = '10';
                $desk = 'Kas - Rupiah';
            } else if ($jenis == 'bank') {
                $kode = '302';
                $judul = 'BANK';
                $jk = '11';
                // $desk = 'Bank Mandiri - Rupiah';
                $desk = $this->db->get_where("daftar_bank", ['kode_coa' => $bank])->row()->deskripsi;
                $coa = $bank;
            } else if ($jenis == 'rk') {
                $kode = '306';
                $judul = 'RK';
                $jk = '15';
                // $desk = 'Bank Mandiri - Rupiah';
                $dbRK = $this->db->get_where("sub_detail_akun", ['id_detail' => $bank])->row_array();
                $coa = implode('.', [$dbRK["kategori"], $dbRK["sub_kategori"], $dbRK["kode"]]);
                $desk = $dbRK['deskripsi'];
            }
            $max = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl_faktur)->max;
            $noValid =  sprintf('%04d', $max + 1, 'dyhtdyu');
            $noDok = $noValid . "/" . "GL-" . $kode . "/" . date('my', strtotime($tgl_faktur));
            $no_index = $max + 1;
            if ($kode != '306') {
                $data_j = array(
                    'no_jurnal' => $noDok,
                    'tanggal' => $tgl_faktur,
                    'tipe_jurnal' => $judul,
                    'tgl_input' => date("Y-m-d H:i:s"),
                    'id_staff' => $data_staff->nama,
                    'ket' => 0,
                    'source' => 'PEMBAYARAN PIUTANG'

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
                        'deskripsi' => $row->deskripsi . ' No Inv.' . $row->invoice,
                        'no_jurnal' => $noDok,
                        'kredit' => $row->debet,
                        'debet' => $row->kredit,
                        'lap' => '01',
                        'jb' => $pelayanan[2],
                        'cj' => '101',
                        'pk' => $no_dok,
                        'tgl' => $tgl_faktur,
                        'des_rek' => $row->deskripsi,
                        'staff' => $data_staff->nama,
                        'id_fk' => $judul,
                        'pk_bukti' => $row->invoice,

                    ];
                    $this->M_Kasir->insert_tindakan($data2, 'detail_jurnal_kas_bank');
                }

                $sumdebit = $this->db->query("SELECT sum(debet) jumlah from detail_jurnal_kas_bank where no_jurnal ='$noDok'")->row()->jumlah;
                $sumkredit = $this->db->query("SELECT sum(kredit) jumlah from detail_jurnal_kas_bank where no_jurnal ='$noDok'")->row()->jumlah;
                $pelayanan1 = explode(".", $coa);


                $data1 = [
                    'id_jurnal' => '',
                    'jk' => $jk,
                    'rekening' => $coa,
                    'deskripsi' => $desk,
                    'no_jurnal' => $noDok,
                    'kredit' => $sumdebit,
                    'debet' => $sumkredit,
                    'lap' => '01',
                    'jb' => $pelayanan1[2],
                    'cj' => '101',
                    'pk' => $no_dok,
                    'tgl' => $tgl_faktur,
                    'des_rek' => $desk,
                    'staff' => $data_staff->nama,
                    'id_fk' => $judul,
                    'pk_bukti' => 'Jurnal',

                ];
                $this->M_Kasir->insert_tindakan($data1, 'detail_jurnal_kas_bank');
            }else {
                $data_j = array(
                    'no_jurnal' => $noDok,
                    'tanggal' => $tgl_faktur,
                    'tgl_input' => date("Y-m-d H:i:s"),
                    'id_staff' => $data_staff->id_staff,
                    'keterangan' => $judul

                );


                $id_jurnal = $this->M_Kasir->insert_tindakan($data_j, 'jurnal_rupa');
                $dokumen = ['no_dokumen' => $noDok, 'no_index' => $no_index, 'kode' => $kode, 'tgl' => $tgl_faktur, 'staff' => $data_staff->nama];
                $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');

                foreach ($dok as $row) {
                    $pelayanan = explode(".", $row->akun);

                    $data2 = [
                        'id_jurnal' => $row->id,
                        'jk' => '15',
                        'rekening' => $row->akun,
                        'deskripsi' => $row->deskripsi . ' No Inv.' . $row->invoice,
                        'no_jurnal' => $noDok,
                        'kredit' => $row->debet,
                        'debet' => $row->kredit,
                        'lap' => lap,
                        'jb' => $pelayanan[2],
                        'cj' => '101',
                        'pk' => $no_dok,
                        'tgl' => date("Y-m-d H:i:s"),
                        'des_rek' => $row->deskripsi,
                        'staff' => $data_staff->nama,
                        'id_fk' => ($row->debet != 0) ? 'KREDIT' : 'DEBIT',
                        'id_vendor' => '-',

                    ];
                    $this->M_Kasir->insert_tindakan($data2, 'detail_jurnal_rupa');
                }

                $sumdebit = $this->db->query("SELECT sum(debet) jumlah from detail_jurnal_rupa where no_jurnal ='$noDok'")->row()->jumlah;
                $sumkredit = $this->db->query("SELECT sum(kredit) jumlah from detail_jurnal_rupa where no_jurnal ='$noDok'")->row()->jumlah;
                $pelayanan1 = explode(".", $coa);


                $data1 = [
                    'id_jurnal' => $id_jurnal,
                    'jk' => '15',
                    'rekening' => $coa,
                    'deskripsi' => $desk,
                    'no_jurnal' => $noDok,
                    'kredit' => $sumdebit,
                    'debet' => $sumkredit,
                    'lap' => lap,
                    'jb' => $pelayanan1[2],
                    'cj' => '101',
                    'pk' => $no_dok,
                    'tgl' => date('Y-m-d H:i:s'),
                    'des_rek' => $desk,
                    'staff' => $data_staff->nama,
                    'id_fk' => ($sumdebit != 0) ? 'KREDIT' : 'DEBIT',
                    'id_vendor' => '-',

                ];
                $this->M_Kasir->insert_tindakan($data1, 'detail_jurnal_rupa');
            }
            $data = [
                'status_verifikasi' => 'DITERIMA',
                'staff_verifikasi' => $data_staff->nama,
                'pembayaran' => $coa,
                'tgl_verifikasi' => $tgl_faktur,
                'ket_jurnal' => 1,
                'no_jurnal' => $noDok,
            ];

            $this->M_Kasir->update_tindakan($data, ['no_dokumen' => $no_dok], 'pembayaran_piutang');
        } else {

            $data = array(
                'save' => $status,
            );
            $this->M_Kasir->update_tindakan($data, ['no_dokumen' => $no_dok], 'pembayaran_piutang');
        }
        $out['status'] = "success";

        echo json_encode($out);
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
        $ket = $this->input->post('ket');
        if ($ket == '-') {
            $data = $this->db->query("SELECT (ifnull(a.total,0) - ifnull(d.piutang,0)) total from (
        SELECT sum(debet) total, pk from jurnal_piutang where pk ='$inv' and cara_klaim != 'REDUKSI'
        ) as a
        LEFT JOIN
        (SELECT sum(t.debet) piutang, t.invoice 
                 from detail_pembayaran_piutang t, pembayaran_piutang p
                 where t.id_fk=p.no_dokumen and p.save != 99
                 group by t.invoice
                 ) d on a.pk= d.invoice
        ")->row();
        } else if ($ket == 'obat') {
            $data = $this->db->query("SELECT sum(obat+ppn_obat) total from v_total_piutang where pk ='$inv'")->row();
        } else if ($ket == 'pelayanan') {
            $data = $this->db->query("SELECT (sum(tagihan) - sum(obat+ppn_obat)) total from v_total_piutang where pk ='$inv'")->row();
        }

        echo json_encode($data);
    }
    function tampil_pasien_by_inv()
    {
        $out = null;

        $no_jurnal = $this->input->post('idFaktur');
        // $no_jurnal = $this->db->get_where("jurnal_piutang", ['no_jurnal' => $no_jurnal])->row()->id_fk;
        $page_data = $this->M_Jurnal_keuangan->getDetailPiutang($no_jurnal);
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;

            $no_rm = $page_data[$i]->no_rm;
            $nama = $page_data[$i]->nama;
            $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);
            $nilai = number_format($page_data[$i]->tagihan, 2, ',', '.');
            $total = number_format($page_data[$i]->piutang, 2, ',', '.');
            $nilai1 = ($page_data[$i]->tagihan - $page_data[$i]->piutang);

            $pilih =  "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_list_faktur(\"" . $page_data[$i]->id_pelayanan . "\",\"" . $nilai1 .  "\")'><i class='icon-note'></i></a>";

            $out[$i] = array($pilih, $no_rm, $nama, $tgl_masuk, $nilai, $total);
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
    public function hapus_pembayaran_piutang()
    {
        $id = $this->input->post('id');
        $db = $this->db->get_where("detail_pembayaran_piutang", ['id' => $id])->row();

        $this->M_Kasir->update_tindakan(['status_piutang' => 0], ['pk' => $db->invoice], 'jurnal_piutang');
        $this->M_Kasir->delete_tindakan(['id' => $id], 'detail_pembayaran_piutang');

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function insertdetail_piutang()
    {
        $idFaktur = $this->input->post('idFaktur');
        $harga = $this->input->post('harga');
        $invoice = $this->input->post('invoice');
        $vendor = $this->input->post('vendor');
        $no_jurnal = $this->input->post('no_jurnal');
        $data_staff = $this->session->userdata('data_auth');
        $noDokR = $this->input->post('no_dok');

        $db_piutang = $this->db->get_where('jurnal_piutang', ['no_jurnal' => $no_jurnal, 'debet !=' => 0, 'cara_klaim !=' => 'REDUKSI'])->row();
        $data = array(
            'id_pelayanan' => $idFaktur,
            'id_fk' => $noDokR,
            'invoice' => $invoice,
            'vendor' => $vendor,
            'tipe' => $no_jurnal,
            'akun' => $db_piutang->rekening,
            'debet' => $harga,
            'staff' => $data_staff->nama,
            'pk' => $noDokR,
            'deskripsi' => "Pembayaran Piutang " . $vendor,

        );

        $this->M_Kasir->insert_tindakan($data, 'detail_pembayaran_piutang');

        $db = $this->db->query("SELECT sum(debet) debet ,IFNULL(d.piutang,0) piutang
        from jurnal_cara_pembayaran v
        left join (SELECT sum(t.debet) piutang, t.tipe 
                 from detail_pembayaran_piutang t, pembayaran_piutang p 
                 where t.id_fk =p.no_dokumen and p.save != 99
                 group by t.invoice
                 ) d on v.no_jurnal= d.tipe
        where v.no_jurnal = '$no_jurnal'
        ")->row_array();
        if ($db['debet'] == $db['piutang']) {
            $this->M_Kasir->update_tindakan(['status_piutang' => 1], ['pk' => $noDokR], 'jurnal_cara_pembayaran');
        }


        $out['status'] = "success";
        echo json_encode($out);
    }
    public function simpan_bukti()
    {
        $data_staff = $this->session->userdata('data_auth');

        $vendor = $this->input->post('vendor');
        $id_vendor = $this->input->post('id_vendor');
        $tgl_faktur = $this->input->post('tgl_faktur');
        $tipe = $this->input->post('tipe');
        $tipe = ($tipe == 'tambah') ? 'kasbank' : $tipe;

        $tgl = date('Y-m', strtotime($tgl_faktur));
        $max = $this->db->query("SELECT max(no_indeks) max from pembayaran_piutang where tgl like '$tgl%'")->row();

        $noValidR =  sprintf('%04d', $max->max + 1, 'dyhtdyu');
        $noDokR = $noValidR . "/" . "" . "/" . date('my', strtotime($tgl_faktur));

        $data = array(

            'id_vendor' => $id_vendor,
            'no_indeks' => $max->max + 1,
            'no_dokumen' => $noDokR,
            'vendor' => $vendor,
            'tipe' => $tipe,
            'tgl' => $tgl_faktur,
            'save' => 1,
            'staff' => $data_staff->nama,
        );

        $this->M_Kasir->insert_tindakan($data, 'pembayaran_piutang');

        $out['status'] = "success";
        $out['no_dok'] = $noDokR;
        echo json_encode($out);
    }
    public function simpan_bundle_piutang()
    {
        $data_staff = $this->session->userdata('data_auth');

        $vendor = $this->input->post('vendor');
        $no_jurnal = $this->input->post('no_jurnal');
        $invoice = $this->input->post('invoice');
        $noDokR = $this->input->post('no_dok');
        $ket = $this->input->post('ket');
        // $jurnal = $this->db->get_where('jurnal_pembayaran_farmasi', ['id_jurnal' => $idFaktur])->row();
        $db_piutang = $this->db->get_where('jurnal_piutang', ['no_jurnal' => $no_jurnal, 'debet !=' => 0, 'cara_klaim !=' => 'REDUKSI'])->row();

        if ($ket == '-') {



            $page_data = $this->M_Jurnal_keuangan->getDetailPiutang($no_jurnal);

            foreach ($page_data as $row) {
                $data = array(
                    'id_pelayanan' => $row->id_pelayanan,
                    'invoice' => $invoice,
                    'id_fk' => $noDokR,
                    'vendor' => $vendor,
                    'tipe' => $no_jurnal,
                    'akun' => $db_piutang->rekening,
                    'debet' => $row->tagihan,
                    'staff' => $data_staff->nama,
                    'pk' => $invoice,
                    'deskripsi' => "Pembayaran Piutang " . $vendor,
                    'ket' => 'ALL',

                );
                $this->M_Kasir->insert_tindakan($data, 'detail_pembayaran_piutang');
            }

            $this->M_Kasir->update_tindakan(['status_piutang' => 1], ['pk' => $invoice], 'jurnal_piutang');

            $out['status'] = "success";
        } else if ($ket == 'obat') {
            $page_data = $this->db->query("SELECT id_pelayanan,(obat+ppn_obat) tagihan from v_total_piutang where pk ='$invoice' 
            having tagihan >0")->result();
            foreach ($page_data as $row) {
                $data = array(
                    'id_pelayanan' => $row->id_pelayanan,
                    'invoice' => $invoice,
                    'id_fk' => $noDokR,
                    'vendor' => $vendor,
                    'tipe' => $no_jurnal,
                    'akun' => $db_piutang->rekening,
                    'debet' => $row->tagihan,
                    'staff' => $data_staff->nama,
                    'pk' => $invoice,
                    'deskripsi' => "Pembayaran Piutang " . $vendor,
                    'ket' => 'OBAT',

                );
                $this->M_Kasir->insert_tindakan($data, 'detail_pembayaran_piutang');
            }
            $out['status'] = "success";
        } else if ($ket == 'pelayanan') {
            $page_data = $this->db->query("SELECT id_pelayanan,(tagihan - (obat+ppn_obat)) tagihan from v_total_piutang where pk ='$invoice'
            having tagihan >0")->result();
            foreach ($page_data as $row) {
                $data = array(
                    'id_pelayanan' => $row->id_pelayanan,
                    'invoice' => $invoice,
                    'id_fk' => $noDokR,
                    'vendor' => $vendor,
                    'tipe' => $no_jurnal,
                    'akun' => $db_piutang->rekening,
                    'debet' => $row->tagihan,
                    'staff' => $data_staff->nama,
                    'pk' => $invoice,
                    'deskripsi' => "Pembayaran Piutang " . $vendor,
                    'ket' => 'PELAYANAN',

                );
                $this->M_Kasir->insert_tindakan($data, 'detail_pembayaran_piutang');
            }
            $out['status'] = "success";
        }
        echo json_encode($out);
    }
    public function tampil_total_piutang()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->db->query("SELECT sum(d.debet) total,sum(d.kredit) kredit from detail_pembayaran_piutang d, pembayaran_piutang p 
        where p.no_dokumen=d.id_fk and p.save != 99 and d.invoice = '$idFaktur' group by d.invoice")->result();
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
    public function tampil_total_piutang_by_no()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->db->query("SELECT sum(debet) total,sum(kredit) kredit from detail_pembayaran_piutang where id_fk = '$idFaktur' group by id_fk")->result();
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $id_detail  = "Rp. " . number_format($page_data[$i]->total - $page_data[$i]->kredit, 2, ',', '.');
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

    public function Pembayaran_piutang_verifikasi()
    {
        $this->load->view('assets/_header');

        $page_data['judul'] = "PEMBAYARAN PIUTANG";
        $page_data['tipe'] = "verif";
        $page_data['page_content'] = 'Jurnal/Pembayaran_piutang';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Pembayaran_piutang_non_verif()
    {
        $this->load->view('assets/_header');

        $page_data['judul'] = "PEMBAYARAN TIDAK LULUS VERIFIKASI";
        $page_data['tipe'] = "non_verif";
        $page_data['page_content'] = 'Jurnal/Pembayaran_piutang';
        $page_data['pelayanan'] = $this->db->query("SELECT distinct(id_vendor) id_vendor,cara_klaim from jurnal_piutang where status_piutang=0")->result_array();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Aging($jenis)
    {
        $this->load->view('assets/_header');

        $page_data['judul'] = "LAPORAN AGING " . strtoupper($jenis);
        $page_data['jenis'] = $jenis;

        $page_data['page_content'] = 'Jurnal/Laporan_aging';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_aging()
    {
        $jenis = $this->input->post('jenis');
        $bulan = $this->input->post('bulan');
        $out = null;
        $page_data = $this->M_Jurnal_pembayaran_utang->Select_aging($jenis,$bulan);

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $cara_klaim = $page_data[$i]['cara_klaim'];
            $_0_30 = $page_data[$i]['0_30'];
            $_31_90 = $page_data[$i]['31_90'];
            $_91_180 = $page_data[$i]['91_180'];
            $_181_365 = $page_data[$i]['181_365'];
            $_366_730 = $page_data[$i]['366_730'];
            $_730 = $page_data[$i]['>730'];
            $total = $_0_30 + $_31_90 + $_91_180 + $_181_365 + $_366_730 + $_730;

            $_0_30 = number_format($_0_30, 2, ',', '.');
            $_31_90 = number_format($_31_90, 2, ',', '.');
            $_91_180 = number_format($_91_180, 2, ',', '.');
            $_181_365 = number_format($_181_365, 2, ',', '.');
            $_366_730 = number_format($_366_730, 2, ',', '.');
            $_730 = number_format($_730, 2, ',', '.');
            $total = number_format($total, 2, ',', '.');

            $out[$i] = array($no, $cara_klaim, $_0_30, $_31_90, $_91_180, $_181_365, $_366_730, $_730, $total);
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
}
