<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Jurnal_manual extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Jurnal_manual');
        $this->load->model('M_Jurnal_keuangan');
        $this->load->model('M_Kasir');
    }
    public function Jurnal_rupa()
    {
        $data_staff = $this->session->userdata('data_auth');

        $this->load->view('assets/_header');
        // $page_data['kondisi'] = $this->db->get('list_kondisi_asset')->result_array();
        $page_data['vendor'] = $this->M_Jurnal_manual->getVendor();
        $page_data['pelayanan'] = $this->db->get('daftar_akun')->result_array();

        $kode = '306';
        $page_data['max'] = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, '')->max;
        $page_data['kode'] = $kode;
        $page_data['staff'] = $data_staff;
        $page_data['page_content'] = 'Jurnal/Jurnal_rupa';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function insertJurnalRupa()
    {
        $data_staff = $this->session->userdata('data_auth');
        $noDok = $this->input->post('no_dokumen');
        $tgl = $this->input->post('tgl_faktur');

        $jurnal = $this->db->get_where('jurnal_rupa', ['no_jurnal' => $noDok])->row();
        $dok_jurnal = $this->db->get_where('dokumen_jurnal', ['no_dokumen' => $noDok])->row();
        if (!empty($jurnal) && !empty($dok_jurnal)) {
            $kode = '306';
            $max = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl)->max;

            $noValid =  sprintf('%04d', $max + 1, 'dyhtdyu');
            $noDok = $noValid . "/" . "GL-" . $kode . "/" . date('my', strtotime($tgl));
            $no_index = $max + 1;
        } else {
            $noDok = $noDok;
            $no_index = $this->input->post('no_index');
        }

        $data = array(
            'no_jurnal' => $noDok,
            'tanggal' => $this->input->post('tgl_faktur'),
            'tgl_input' => date("Y-m-d H:i:s"),
            'id_staff' => $data_staff->id_staff,
        );


        $this->M_Kasir->insert_tindakan($data, 'jurnal_rupa');

        $dokumen = ['no_dokumen' => $noDok, 'no_index' => $no_index, 'kode' => '306', 'tgl' => $tgl, 'staff' => $data_staff->nama];
        $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_jurnal_rupa()
    {
        $out = null;
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Jurnal_manual->SelectJurnalRupa($mulai, $akhir);
        } else {
            $page_data = $this->M_Jurnal_manual->SelectJurnalRupa('', '');
        }

        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);

            $no = $i + 1;


            $tgl = indo_date2($page_data[$i]->tanggal);

            $no_jurnal = $page_data[$i]->no_jurnal;
            // $total = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            if ($page_data[$i]->ket == 0) {
                $cetak = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>SIMPAN</button>";
                $delete =
                    "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id_jurnal . "\")' '><i class='fa fa-trash '></i></button>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")'><i class='icon-note'></i></a>";
                $status = "";
                $ket = "";
            } else if ($page_data[$i]->ket == 1 && $page_data[$i]->verifikasi == null) {
                $cetak = '<span class="label label-warning">Menunggu Verifikasi</span>';
                // $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal  . "\")' '><i class='icon-printer '></i></button>";
                $delete = "<button title='Kembalikan Jurnal' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='ubah_ket(\"" . $page_data[$i]->no_jurnal . "\")' '><i class='fa fa-times '></i></button>";
                $pilih = "";
                $status = "";
                $ket = "";
            } else if ($page_data[$i]->ket == 1 && $page_data[$i]->verifikasi == 'DITERIMA') {
                $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal  . "\")' '><i class='icon-printer '></i></button>";
                $delete = "<button title='Kembalikan Jurnal' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='ubah_ket(\"" . $page_data[$i]->no_jurnal . "\")' '><i class='fa fa-times '></i></button>";

                $pilih = "";
                $status = '<span class="label label-success">' . $page_data[$i]->verifikasi . '</span>';
                $ket = $page_data[$i]->keterangan;
            } else if ($page_data[$i]->ket == 1 && $page_data[$i]->verifikasi == 'DITOLAK') {
                $cetak = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>SIMPAN</button>";
                $delete = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id_jurnal . "\")' '><i class='fa fa-trash '></i></button>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")'><i class='icon-note'></i></a>";
                $status = '<span class="label label-danger">' . $page_data[$i]->verifikasi . '</span>';
                $ket = $page_data[$i]->keterangan;
            }

            $db_sum = $this->db->query("SELECT sum(debet) debet , sum(kredit) kredit,pk from detail_jurnal_rupa where no_jurnal ='$no_jurnal'")->row();
            $sum = isset($db_sum) ? number_format($db_sum->kredit, 0, ',', '.') : '0';
            $pk =  isset($db_sum) ? $db_sum->pk : '';

            $out[$i] = array($no, $pilih, $cetak, $tgl, $no_jurnal, $sum, $staff, $pk, $ket, $status, $delete);
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

    function get_beban_usaha()
    {
        $jenis = $this->input->post('jenis');
        $data = $this->db->get_where('detail_daftar_akun', ['id_akun' => $jenis])->result_array();
        echo json_encode($data);
    }
    function get_detail_akun()
    {
        $kategori = $this->input->post('kategori');
        $jenis = $this->input->post('jenis');
        $kode1 = $this->db->get_where('daftar_akun', ['id_akun' => $kategori])->row()->kode;
        $kode2 = $this->db->get_where('detail_daftar_akun', ['id_detail' => $jenis])->row()->kode;
        $kode1_split = str_split($kode1);
        if ($kode1_split[0] == 7 || $kode1_split[0] == 8) {
            $data = $this->db->get_where('sub_detail_daftar_akun', ['sub_kode' => $kode1_split[0]])->result_array();
        } else {
            $data = $this->db->get_where('sub_detail_akun', ['kategori' => $kode1, 'sub_kategori' => $kode2])->result_array();
        }

        echo json_encode($data);
    }
    public function insert_detail_jurnal_rupa()
    {
        $data_staff = $this->session->userdata('data_auth');
        $pelayanan = explode("|", $this->input->post('pelayanan'));
        $id_jenis = explode("|", $this->input->post('id_jenis'));
        $id_jurnal = $this->input->post('id_jurnal');
        $kode1 = $this->db->get_where('daftar_akun', ['id_akun' => $id_jenis[1]])->row();
        $kode2 = $this->db->get_where('detail_daftar_akun', ['id_detail' => $id_jenis[0]])->row();

        $jurnal = $this->db->get_where('jurnal_rupa', ['id_jurnal' => $id_jurnal])->row();
        $rek = $kode1->kode . '.' . $kode2->kode . '.' . $pelayanan[0];
        $kode1_split = str_split($kode1->kode);
        if ($kode1_split[0] == 7 || $kode1_split[0] == 8) {
            $desk =  $kode1->deskripsi . ' = ' . $kode2->deskripsi . ' = ' . $pelayanan[1];
        } else {
            $desk =  $kode1->deskripsi . ' = ' . $pelayanan[1];
        }
        $nilai = $this->input->post('nilai');
        $tipe = $this->input->post('tipe');
        $vendor = $this->input->post('vendor');

        $data = [
            'id_jurnal' => $id_jurnal,
            'jk' => '15',
            'rekening' => $rek,
            'deskripsi' => $this->input->post('deskripsi'),
            'no_jurnal' => $jurnal->no_jurnal,
            'kredit' => ($tipe == 'KREDIT') ? $nilai : 0,
            'debet' => ($tipe == 'DEBIT') ? $nilai : 0,
            'lap' => '01',
            'jb' => $pelayanan[0],
            'cj' => '101',
            'pk' => $this->input->post('pk'),
            'tgl' => date('Y-m-d H:i:s'),
            'des_rek' => $desk,
            'staff' => $data_staff->nama,
            'id_fk' => $tipe,
            'id_vendor' => $vendor,

        ];


        $this->M_Kasir->insert_tindakan($data, 'detail_jurnal_rupa');


        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_detail_jurnal_rupa()
    {
        $out = null;
        $idFaktur = $this->input->post('idFaktur');

        $page_data = $this->M_Jurnal_manual->getJurnalRupa($idFaktur);
        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);

            $no = $i + 1;
            $edit = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]['id_detail'] . "\")'><i class='icon-note'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]['id_detail'] . "\")'><i class='icon-note'></i></a>";
            $delete =
                "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_list_faktur(\"" . $page_data[$i]['id_detail'] . "\")' '><i class='fa fa-trash '></i></button>";


            // $tgl = indo_date2($page_data[$i]->tanggal);

            $rek = $page_data[$i]['rekening'];
            $deskripsi = $page_data[$i]['deskripsi'];
            $pk = $page_data[$i]['pk'];
            $debit = number_format($page_data[$i]['debet'], 2, ',', '.');
            $kredit = number_format($page_data[$i]['kredit'], 2, ',', '.');
            $des_rek = $page_data[$i]['des_rek'];


            $out[$i] = array($no, $edit, $rek, $deskripsi, $pk, $debit, $kredit, $des_rek, $delete);
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
    public function getDetail_jurnal_rupa()
    {
        $id_detail = $this->input->post('id_detail');
        $tipe = $this->input->post('tipe');

        $data = $this->db->get_where('detail_jurnal_rupa', ['id_detail' => $id_detail])->row();

        $rek = explode('.', $data->rekening);
        $kode1 = $this->db->get_where('daftar_akun', ['kode' => $rek[0]])->row()->id_akun;
        $kode2 = $this->db->get_where('detail_daftar_akun', ['id_akun' => $kode1, 'kode' => $rek[1]])->row()->id_detail;
        $kode1_split = str_split($rek[0]);
        if ($kode1_split[0] == 7 || $kode1_split[0] == 8) {
            $desk = explode(' = ', $data->des_rek);
            $desk = $desk[2];
        } else {

            $desk = explode(' = ', $data->des_rek);
            $desk = $desk[1];
        }
        $response['kode1'] = $kode1;
        $response['kode2'] = $kode2;
        $response['kode3'] = $rek[2];
        $response['desk'] = $desk;
        $response['no_pk'] = $data->pk;
        $response['deskripsi'] = $data->deskripsi;
        $response['nilai'] = $data->kredit + $data->debet;
        $response['cj'] = $data->cj;
        $response['tipe'] = ($data->kredit != 0) ? 'KREDIT' : 'DEBIT';

        echo json_encode($response);
    }

    function hapus_detail_jurnal_rupa()
    {
        $id_detail = $this->input->post('id_detail');
        $this->M_Kasir->delete_tindakan(['id_detail' => $id_detail], 'detail_jurnal_rupa');
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_jurnal_rupa()
    {
        $id_faktur = $this->input->post('id_faktur');
        $this->M_Kasir->delete_tindakan(['id_jurnal' => $id_faktur], 'jurnal_rupa');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function cetak_jurnal_rupa()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $page_data['judul'] = 'RUPA RUPA';
        $page_data['no_jurnal'] = $no_jurnal;
        $page_data['data'] = $this->M_Jurnal_manual->getJurnalRupa($no_jurnal);
        $page_data['jurnal'] = $this->M_Jurnal_manual->TampilJurnalRupa($no_jurnal);

        $response = $this->load->view('jurnal_print/cetak_jurnal_rupa', $page_data, TRUE);
        echo $response;
    }
    public function simpan_jurnal_rupa()
    {
        $data_staff = $this->session->userdata('data_auth');
        $noDok = $this->input->post('no_jurnal');

        $debit = $this->db->get_where('detail_jurnal_rupa', ['no_jurnal' => $noDok, 'id_fk' => 'DEBIT'])->result();
        $kredit = $this->db->get_where('detail_jurnal_rupa', ['no_jurnal' => $noDok, 'id_fk' => 'KREDIT'])->result();
        $sumdebit = $this->db->query("SELECT sum(debet) jumlah from detail_jurnal_rupa where no_jurnal ='$noDok'")->row()->jumlah;
        $sumkredit = $this->db->query("SELECT sum(kredit) jumlah from detail_jurnal_rupa where no_jurnal ='$noDok'")->row()->jumlah;


        // if (count($debit) > count($kredit)) {
        //     $out['status'] = "Jurnal Belum Balance";
        // } else if (count($debit) < count($kredit)) {
        //     $out['status'] = "Jurnal Belum Balance";
        // } else 
        if ($sumdebit != $sumkredit) {
            $out['status'] = "Total Jurnal Belum Balance";
        } else {
            $data = [
                'tgl_simpan' => date('Y-m-d H:i:s'),
                'ket' => 1
            ];
            $this->M_Kasir->update_tindakan($data, ['no_jurnal' => $noDok], 'jurnal_rupa');
            $out['status'] = "success";
        }

        echo json_encode($out);
    }
    // Start edit ayat jurnal
    public function edit_detail_jurnal()
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
            $source = $this->input->post('source');

            if ($source == 'MIT') {
                $data = [
                    'rekening' => $rek,
                    'deskripsi' => $this->input->post('deskripsi'),
                    'kredit' => ($tipe == 'KREDIT') ? $nilai : 0,
                    'debet' => ($tipe == 'DEBIT') ? $nilai : 0,
                    'jb' => $pelayanan[0],
                    'pk' => $this->input->post('pk'),
                    'tgl' => date('Y-m-d H:i:s'),
                    'des_rek' => $desk,
                    'staff' => $data_staff->nama,
                    'id_fk' => $tipe,
                ];

                $this->M_Kasir->update_tindakan($data, ['id_jurnal_bank' => $id_detail], 'jurnal_bank');
            } else {
                $data = [
                    'jk' => $this->input->post('jk'),
                    'rekening' => $rek,
                    'deskripsi' => $this->input->post('deskripsi'),
                    'kredit' => ($tipe == 'KREDIT') ? $nilai : 0,
                    'debet' => ($tipe == 'DEBIT') ? $nilai : 0,
                    'lap' => '01',
                    'jb' => $pelayanan[0],
                    'pk' => $this->input->post('pk'),
                    'tgl' => date('Y-m-d H:i:s'),
                    'des_rek' => $desk,
                    'staff' => $data_staff->nama,
                    'id_fk' => $tipe,
                ];
                $this->M_Kasir->update_tindakan($data, ['id_detail' => $id_detail], 'detail_jurnal_rupa');
            }
            $out['status'] = "success";
        }
        echo json_encode($out);
    }

    public function total_jurnal_rupa()
    {
        $noDok = $this->input->post('idFaktur');
        $debit = $this->db->query("SELECT ifnull(sum(debet),0) jumlah from detail_jurnal_rupa where no_jurnal ='$noDok'")->row()->jumlah;
        $kredit = $this->db->query("SELECT ifnull(sum(kredit),0) jumlah from detail_jurnal_rupa where no_jurnal ='$noDok'")->row()->jumlah;

        // for ($i = 0; $i < count($page_data); $i++) {
        //     $id_detail  = "Rp. " . number_format($page_data[$i]->total - $page_data[$i]->kredit, 0, ',', '.');
        // }

        $id_detail  = number_format($debit - $kredit, 2, ',', '.');
        $out[0] = array($id_detail);
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }
    public function total_jurnal_rupa_dk()
    {
        $noDok = $this->input->post('idFaktur');
        $debit = $this->db->query("SELECT ifnull(sum(debet),0) jumlah from detail_jurnal_rupa where no_jurnal ='$noDok'")->row()->jumlah;
        $kredit = $this->db->query("SELECT ifnull(sum(kredit),0) jumlah from detail_jurnal_rupa where no_jurnal ='$noDok'")->row()->jumlah;


        $out[0] = array(number_format($debit, 2, ',', '.'), number_format($kredit, 2, ',', '.'));
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }

    public function Jurnal_rupa_verifikasi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Jurnal_rupa_verifikasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jurnal_rupa_verifikasi()
    {
        $out = null;
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Jurnal_manual->SelectJurnalRupaVerifikasi($mulai, $akhir);
        } else {
            $page_data = $this->M_Jurnal_manual->SelectJurnalRupaVerifikasi('', '');
        }

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tgl = indo_date2($page_data[$i]->tanggal);

            $no_jurnal = $page_data[$i]->no_jurnal;
            // $total = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            if ($page_data[$i]->verifikasi == null || $page_data[$i]->verifikasi == '') {
                $verif = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>VERIFIKASI</button>";
                $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal  . "\")' '><i class='icon-printer '></i></button>";
            } elseif ($page_data[$i]->verifikasi == 'DITERIMA') {
                $verif = '<span class="label label-success">' . $page_data[$i]->verifikasi . '</span>';
                $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal  . "\")' '><i class='icon-printer '></i></button>";
            } elseif ($page_data[$i]->verifikasi == 'DITOLAK') {
                $verif = '<span class="label label-danger">' . $page_data[$i]->verifikasi . '</span>';
                $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal  . "\")' '><i class='icon-printer '></i></button>";
            } else {
                $verif = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>VERIFIKASI</button>";
                $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal  . "\")' '><i class='icon-printer '></i></button>";
            }
            $db_sum = $this->db->query("SELECT sum(debet) debet , sum(kredit) kredit from detail_jurnal_rupa where no_jurnal ='$no_jurnal'")->row();
            $sum = isset($db_sum) ? number_format($db_sum->kredit, 0, ',', '.') : '0';

            $out[$i] = array($no, $verif, $cetak, $tgl, $no_jurnal, $sum, $staff);
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
    public function verifikasi_jurnal_rupa()
    {
        $data_staff = $this->session->userdata('data_auth');
        $noDok = $this->input->post('id_jurnal');
        $data = [
            'staff_verifikasi' => $data_staff->nama,
            'tgl_verifikasi' => date('Y-m-d H:i:s'),
            'keterangan' => $this->input->post('ket'),
            'verifikasi' => $this->input->post('acc'),
        ];

        if ($this->input->post('acc') == '-') {
            $out['status'] = "Status Verifikasi Dipilih terlebih dahulu";
        } else {
            $this->M_Kasir->update_tindakan($data, ['no_jurnal' => $noDok], 'jurnal_rupa');
            $out['status'] = "success";
        }


        echo json_encode($out);
    }
    public function getSum()
    {
        $no_jurnal = $this->input->post('no_jurnal');

        $data = $this->db->query("SELECT SUM(debet) debet,SUM(kredit) kredit from detail_jurnal_rupa where no_jurnal ='$no_jurnal'")->row();

        echo json_encode($data);
    }
    public function getNoDokumen()
    {
        $tgl = $this->input->post('tanggal');
        $kode = $this->input->post('kode');
        $max = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl)->max;

        $noValid =  sprintf('%04d', $max + 1, 'dyhtdyu');
        $noDok = $noValid . "/" . "GL-" . $kode . "/" . date('my', strtotime($tgl));

        echo json_encode($noDok);
    }

    //SALDO AWAL
    public function Saldo_awal()
    {
        $this->load->view('assets/_header');

        $page_data['page_content'] = 'Jurnal/Saldo_awal';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Hal_Saldo_awal($id, $tahun)
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Hal_Saldo_awal';

        $page_data['id'] = $id;
        $page_data['tahun'] = $tahun;
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    function get_akun_saldo()
    {
        $data = $this->db->get_where('daftar_akun_saldo_awal', ['id_fk' => 0])->result_array();

        echo json_encode($data);
    }
    public function tampil_saldo_awal()
    {
        $out = null;

        $page_data = $this->M_Jurnal_manual->SelectSaldoAwal();

        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);

            $no = $i + 1;


            $tahun = ($page_data[$i]->tanggal);
            $tgl = indo_date2($page_data[$i]->tgl_input);
            // $total = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            if ($page_data[$i]->ket == 0) {
                $cetak = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->id_jurnal .  "\")' class='badge bg-pink'>SIMPAN</button>";
                $delete =
                    "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id_jurnal . "\")' '><i class='fa fa-trash '></i></button>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('Jurnal_manual/Hal_Saldo_awal/') . $page_data[$i]->id_jurnal . '/' . $page_data[$i]->tanggal  . "'><i class='icon-note'></i></a>";
                $status = "";
                $ket = "";
            } else {
                $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->id_jurnal  . "\")' '><i class='icon-printer '></i></button>
                <a class='btn btn-success btn-icon-anim btn-square' href='" . base_url('Jurnal_manual/export_saldo_awal/') . $page_data[$i]->id_jurnal . '/' . $tahun . "'><i class='fa fa-download '></i></a>";
                $delete = "";
                $pilih = "";
                $status = '<span class="label label-success">TERSIMPAN</span>';
                $ket = "";
            }

            $out[$i] = array($no, $pilih, $cetak, $tahun, $staff, $ket, $status, $tgl, $delete);
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

    public function insertSaldoAwal()
    {
        $data_staff = $this->session->userdata('data_auth');
        $tgl = date('Y', strtotime($this->input->post('tgl_faktur')));
        $dbsaldo = $this->db->get_where("jurnal_saldo_awal", ['tanggal' => $tgl])->result();
        if (count($dbsaldo) > 0) {
            $out['status'] = "Saldo Tahun " . $tgl . " Sudah Ada";
        } else {

            $data = array(
                'tanggal' => $this->input->post('tgl_faktur'),
                'id_staff' => $data_staff->id_staff,
            );


            $this->M_Kasir->insert_tindakan($data, 'jurnal_saldo_awal');
            $out['status'] = "success";
        }
        echo json_encode($out);
    }
    public function insert_detail_saldo_awal()
    {
        $data_staff = $this->session->userdata('data_auth');
        $id_jurnal = $this->input->post('id_jurnal');

        // if ($kode1_split[0] == 7 || $kode1_split[0] == 8) {
        //     $desk =  $kode1->deskripsi . ' = ' . $kode2->deskripsi . ' = ' . $pelayanan[1];
        // } else {
        //     $desk =  $kode1->deskripsi . ' = ' . $pelayanan[1];
        // }
        $nilai = $this->input->post('nilai');
        $akun = $this->input->post('akun');
        $pelayanan = explode(".", $akun);



        $data = [
            'id_jurnal' => $id_jurnal,
            'jk' => '0',
            'rekening' => $akun,
            'deskripsi' => $this->input->post('deskripsi'),
            'nilai' => $this->input->post('nilai'),
            'd_k' => $this->input->post('tipe'),
            'lap' => '01',
            'jb' => $pelayanan[2],
            'cj' => '0',
            'pk' => '2022',
            'tgl' => date('Y-m-d H:i:s'),
            'des_rek' => $this->input->post('deskripsi'),
            'staff' => $data_staff->nama,

        ];


        $this->M_Kasir->insert_tindakan($data, 'detail_jurnal_saldo_awal');


        $out['status'] = "success";
        echo json_encode($out);
    }
    public function edit_detail_saldo_awal()
    {
        $data_staff = $this->session->userdata('data_auth');

        $data = [
            'nilai' => $this->input->post('nilai'),
        ];
        $where = [
            'id_detail' => $this->input->post('id_detail'),
        ];

        $this->M_Kasir->update_tindakan($data, $where, 'detail_jurnal_saldo_awal');

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_detail_saldo_awal()
    {
        $out = null;
        $idFaktur = $this->input->post('idFaktur');

        $page_data = $this->M_Jurnal_manual->getSaldoAwal($idFaktur);
        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);

            $no = $i + 1;
            $pilih = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]['id_detail'] . "\",\"" . $page_data[$i]['nilai'] . "\")'><i class='icon-rocket'></i></button>";
            $delete =
                "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_list_faktur(\"" . $page_data[$i]['id_detail'] . "\")' '><i class='fa fa-trash '></i></button>";


            // $tgl = indo_date2($page_data[$i]->tanggal);

            $rek = $page_data[$i]['rekening'];

            if ($page_data[$i]['d_k'] == 'KREDIT') {
                $debit = '(' . number_format($page_data[$i]['nilai'], 2, ',', '.') . ')';
            } else {
                $debit = number_format($page_data[$i]['nilai'], 2, ',', '.');
            }
            $des_rek = $page_data[$i]['des_rek'];


            $out[$i] = array($no, $rek, $debit, $des_rek, $pilih, $delete);
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
    public function tampil_total_saldo_awal()
    {
        $idFaktur = $this->input->post('idFaktur');
        $debit = $this->db->query("SELECT ifnull(sum(nilai),0) debit from detail_jurnal_saldo_awal where id_jurnal='$idFaktur' and d_k = 'DEBIT'")->row()->debit;
        $kredit = $this->db->query("SELECT ifnull(sum(nilai),0) kredit from detail_jurnal_saldo_awal where id_jurnal='$idFaktur' and d_k = 'KREDIT'")->row()->kredit;

        // for ($i = 0; $i < count($page_data); $i++) {
        //     $id_detail  = "Rp. " . number_format($page_data[$i]->total - $page_data[$i]->kredit, 0, ',', '.');
        // }

        $id_detail  = number_format($debit - $kredit, 2, ',', '.');
        $out[0] = array($id_detail);
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }
    public function tampil_total_saldo_awal_dk()
    {
        $idFaktur = $this->input->post('idFaktur');
        $debit = $this->db->query("SELECT ifnull(sum(nilai),0) debit from detail_jurnal_saldo_awal where id_jurnal='$idFaktur' and d_k = 'DEBIT'")->row()->debit;
        $kredit = $this->db->query("SELECT ifnull(sum(nilai),0) kredit from detail_jurnal_saldo_awal where id_jurnal='$idFaktur' and d_k = 'KREDIT'")->row()->kredit;


        $out[0] = array(number_format($debit, 2, ',', '.'), number_format($kredit, 2, ',', '.'));
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }
    function hapus_detail_saldo_awal()
    {
        $id_detail = $this->input->post('id_detail');
        $this->M_Kasir->delete_tindakan(['id_detail' => $id_detail], 'detail_jurnal_saldo_awal');
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_saldo_awal()
    {
        $id_faktur = $this->input->post('id_faktur');
        $this->M_Kasir->delete_tindakan(['id_jurnal' => $id_faktur], 'jurnal_saldo_awal');
        $this->M_Kasir->delete_tindakan(['id_jurnal' => $id_faktur], 'detail_jurnal_saldo_awal');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function cetak_saldo_awal()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $page_data['tgl'] = $this->db->get_where('jurnal_saldo_awal', ['id_jurnal' => $no_jurnal])->row()->tanggal;
        $page_data['data'] = $this->M_Jurnal_manual->getSaldoAwal($no_jurnal);
        $page_data['jurnal'] = $no_jurnal;


        $response = $this->load->view('jurnal_print/cetak_saldo_awal', $page_data, TRUE);
        echo $response;
    }
    public function simpan_saldo_awal()
    {
        $data_staff = $this->session->userdata('data_auth');
        $noDok = $this->input->post('no_jurnal');
        $sumdebit = $this->db->query("SELECT sum(nilai) jumlah from detail_jurnal_saldo_awal where id_jurnal ='$noDok'")->row()->jumlah;


        // if (count($debit) > count($kredit)) {
        //     $out['status'] = "Jurnal Belum Balance";
        // } else if (count($debit) < count($kredit)) {
        //     $out['status'] = "Jurnal Belum Balance";
        // } else 
        // if ($sumdebit != 0) {
        //     $out['status'] = "Total Jurnal Belum Balance";
        // } else {
        $data = [
            'tgl_simpan' => date('Y-m-d H:i:s'),
            'ket' => 1
        ];
        $this->M_Kasir->update_tindakan($data, ['id_jurnal' => $noDok], 'jurnal_saldo_awal');
        $out['status'] = "success";
        // }

        echo json_encode($out);
    }
    public function export_saldo_awal($id, $tahun)
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
        $sheet->setCellValue('A1', "SALDO AWAL " . $tahun); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        // Buat header tabel nya pada baris ke 3
        // $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('B3', "KODE AKUN"); // Set kolom B3 dengan tulisan "NIS"
        $sheet->setCellValue('C3', "NILAI"); // Set kolom C3 dengan tulisan "NAMA"
        $sheet->setCellValue('D3', "DESKRIPSI"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        // $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        // $first_date = $this->input->post('mulai');
        // $second_date = $this->input->post('akhir');

        $rekap = $this->M_Jurnal_manual->TampilSaldoAwal($id);
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        $sum = 0;
        foreach ($rekap as $data) { // Lakukan looping pada variabel siswa
            // $sheet->setCellValue('A' . $numrow, $no);
            if ($data->d_k == 'KREDIT') {
                $debit = '-' . $data->nilai;
            } else {
                $debit = $data->nilai;
            }
            $sheet->setCellValue('B' . $numrow, $data->kode);
            $sheet->setCellValue('C' . $numrow, $debit);
            $sheet->setCellValue('D' . $numrow, $data->deskripsi);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            // $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
            $sum += $data->nilai;
        }
        // $sheet->setCellValue('B' . $numrow, "Total");
        // $sheet->setCellValue('C' . $numrow, $sum);
        // $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
        // $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
        // $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
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
        $sheet->setTitle("Laporan Saldo Awal");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Saldo Awal ' . $tahun . '.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
    public function ubah_keterangan()
    {
        $noDok = $this->input->post('no_jurnal');

        $data = [
            'ket' => 0,
            'verifikasi' => null,
        ];

        $this->M_Kasir->update_tindakan($data, ['no_jurnal' => $noDok], 'jurnal_rupa');

        // $out['status'] = "Keterangan berhasil diubah menjadi 1";
        $out['status'] = "success";

        echo json_encode($out);
    }
}
