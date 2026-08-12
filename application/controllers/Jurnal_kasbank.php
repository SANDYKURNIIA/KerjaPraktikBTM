<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal_kasbank extends CI_Controller
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
    public function Jurnal($tipe)
    {
        $this->load->view('assets/_header');
        // $page_data['kondisi'] = $this->db->get('list_kondisi_asset')->result_array();
        $page_data['pelayanan'] = $this->db->get('daftar_akun')->result_array();
        $page_data['data_cj'] = $this->db->get('akun_cj')->result_array();
        if ($tipe == 'kas') {
            $kode = '301';
            $judul = 'KAS';
            $jk = '10';
        } else {
            $kode = '302';
            $judul = 'BANK';
            $jk = '11';
        }
        $page_data['max'] = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, '')->max;
        $page_data['kode'] = $kode;
        $page_data['judul'] = $judul;
        $page_data['jk'] = $jk;
        $page_data['page_content'] = 'Jurnal/Jurnal_kasbank';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function insertJurnal()
    {
        $data_staff = $this->session->userdata('data_auth');
        $noDok = $this->input->post('no_dokumen');
        $no_index = $this->input->post('no_index');
        $tgl = $this->input->post('tgl_faktur');
        $kode = $this->input->post('kode');

        $data = array(
            'no_jurnal' => $noDok,
            'tanggal' => $this->input->post('tgl_faktur'),
            'tipe_jurnal' => $this->input->post('tipe_jurnal'),
            'tgl_input' => date("Y-m-d H:i:s"),
            'id_staff' => $data_staff->nama,
        );


        $this->M_Kasir->insert_tindakan($data, 'jurnal_kas_bank');
        $dokumen = ['no_dokumen' => $noDok, 'no_index' => $no_index, 'kode' => $kode, 'tgl' => $tgl, 'staff' => $data_staff->nama];
        $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_jurnal()
    {
        $out = null;
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $tipe_jurnal = $this->input->post('tipe_jurnal');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Jurnal_manual->SelectJurnalKasBank($mulai, $akhir, $tipe_jurnal);
        } else {
            $page_data = $this->M_Jurnal_manual->SelectJurnalKasBank('', '', $tipe_jurnal);
        }

        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);

            $no = $i + 1;


            $tgl = indo_date2($page_data[$i]->tanggal);

            $no_jurnal = $page_data[$i]->no_jurnal;
            $source = $page_data[$i]->source;
            // $total = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->id_staff;
            if ($page_data[$i]->ket == 0) {
                $cetak = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>SIMPAN</button>";
                $delete =
                    "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='fa fa-trash '></i></button>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\",\"" . $page_data[$i]->source  . "\")'><i class='icon-note'></i></a>";
                $status = "";
                $ket = "";
            } else if ($page_data[$i]->ket == 1 && $page_data[$i]->verifikasi == null) {
                // $cetak = '<span class="label label-warning">Menunggu Verifikasi</span>';
                $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal . "\",\"" . $page_data[$i]->source . "\")' '><i class='icon-printer '></i></button>";
                if ($source == 'BK') {
                    $delete = "<button mr-10 title='Kembalikan Jurnal ke Verif BK' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='fa fa-trash '></i></button>
                        <button title='Kembalikan Jurnal ke BK' class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'  onclick='kembalikan_bk(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='icon-action-undo'></i></button>";
                } elseif ($source == 'MIT') {
                    $delete =
                        "<button title='Kembalikan Jurnal ke MIT' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='fa fa-trash '></i></button>
                        <button title='Buka Jurnal' class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'  onclick='buka_jurnal(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='icon-action-undo'></i></button>";
                } else {
                    $delete =
                        "<button title='Buka Jurnal' class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'  onclick='buka_jurnal(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='icon-action-undo'></i></button>";
                }
                $pilih = "";
                $status = '<span class="label label-warning">Menunggu Verifikasi</span>';
                $ket = '<span class="label label-warning">Menunggu Verifikasi</span>';
            } else if ($page_data[$i]->ket == 1 && $page_data[$i]->verifikasi == 'DITERIMA') {
                $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal . "\",\"" . $page_data[$i]->source . "\")' '><i class='icon-printer '></i></button>";
                if ($source == 'BK') {
                    $delete = "<button mr-10 title='Kembalikan Jurnal ke Verif BK' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='fa fa-trash '></i></button>
                        <button title='Kembalikan Jurnal ke BK' class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'  onclick='kembalikan_bk(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='icon-action-undo'></i></button>";
                } elseif ($source == 'MIT') {
                    $delete =
                        "<button title='Kembalikan Jurnal ke MIT' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='fa fa-trash '></i></button>
                        <button title='Buka Jurnal' class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'  onclick='buka_jurnal(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='icon-action-undo'></i></button>";
                } else {
                    $delete =
                        "<button title='Buka Jurnal' class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'  onclick='buka_jurnal(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='icon-action-undo'></i></button>";
                }
                $pilih = "";
                $status = '<span class="label label-success">' . $page_data[$i]->verifikasi . '</span>';
                $ket = $page_data[$i]->keterangan;
            } else if ($page_data[$i]->ket == 1 && $page_data[$i]->verifikasi == 'DITOLAK') {
                // $cetak = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>SIMPAN</button>";
                // $delete = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id_jurnal . "\")' '><i class='fa fa-trash '></i></button>";
                // $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")'><i class='icon-note'></i></a>";
                $cetak = "";
                $delete = "";
                $pilih = "";
                $status = '<span class="label label-danger">' . $page_data[$i]->verifikasi . '</span>';
                $ket = $page_data[$i]->keterangan;
            }

            $db_sum = $this->db->query("SELECT sum(debet) debet , sum(kredit) kredit from (
            SELECT (debet) debet , (kredit) kredit from detail_jurnal_kas_bank where no_jurnal ='$no_jurnal'
            UNION ALL
            SELECT (debet) debet , (kredit) kredit from jurnal_bank where no_jurnal ='$no_jurnal'
            ) as a")->row();
            $sum = isset($db_sum) ? number_format($db_sum->debet, 0, ',', '.') : '0';
            $db_deskripsi = $this->db->query("SELECT d.deskripsi from detail_jurnal_kas_bank d, jurnal_kas_bank j where d.no_jurnal = j.no_jurnal and d.debet!=0 and d.no_jurnal ='$no_jurnal' and (j.source is null or j.source!= 'PEMBAYARAN PIUTANG')
                UNION ALL
                SELECT d.deskripsi from detail_jurnal_kas_bank d, jurnal_kas_bank j where d.no_jurnal = j.no_jurnal and d.pk_bukti !='Jurnal' and d.no_jurnal ='$no_jurnal' and j.source = 'PEMBAYARAN PIUTANG'
                UNION ALL
                SELECT deskripsi from jurnal_bank where debet!=0 and no_jurnal ='$no_jurnal'
               ")->row();
            $deskripsi = isset($db_deskripsi) ? $db_deskripsi->deskripsi : '';


            $out[$i] = array($no, $pilih, $cetak, $tgl, $no_jurnal, $sum, $deskripsi, $staff, $ket, $status, $delete);
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


    public function insert_detail_jurnal()
    {
        $data_staff = $this->session->userdata('data_auth');
        $pelayanan = explode("|", $this->input->post('pelayanan'));
        $id_jenis = explode("|", $this->input->post('id_jenis'));
        $id_jurnal = $this->input->post('id_jurnal');
        $kode1 = $this->db->get_where('daftar_akun', ['id_akun' => $id_jenis[1]])->row();
        $kode2 = $this->db->get_where('detail_daftar_akun', ['id_detail' => $id_jenis[0]])->row();

        $jurnal = $this->db->get_where('jurnal_kas_bank', ['id_jurnal' => $id_jurnal])->row();
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
                'jk' => $this->input->post('jk'),
                'rekening' => $rek,
                'deskripsi' => $this->input->post('deskripsi'),
                'no_jurnal' => $jurnal->no_jurnal,
                'kredit' => ($tipe == 'KREDIT') ? $nilai : 0,
                'debet' => ($tipe == 'DEBIT') ? $nilai : 0,
                'lap' => '01',
                'jb' => $pelayanan[0],
                'cj' => $this->input->post('cj'),
                'pk' => $this->input->post('pk'),
                'tgl' => date('Y-m-d H:i:s'),
                'des_rek' => $desk,
                'staff' => $data_staff->nama,
                'id_fk' => $tipe,
            ];

            $this->M_Kasir->insert_tindakan($data, 'jurnal_bank');
        } else {
            $data = [
                'id_jurnal' => $id_jurnal,
                'jk' => $this->input->post('jk'),
                'rekening' => $rek,
                'deskripsi' => $this->input->post('deskripsi'),
                'no_jurnal' => $jurnal->no_jurnal,
                'kredit' => ($tipe == 'KREDIT') ? $nilai : 0,
                'debet' => ($tipe == 'DEBIT') ? $nilai : 0,
                'lap' => '01',
                'jb' => $pelayanan[0],
                'cj' => $this->input->post('cj'),
                'pk' => $this->input->post('pk'),
                'tgl' => date('Y-m-d H:i:s'),
                'des_rek' => $desk,
                'staff' => $data_staff->nama,
                'id_fk' => $tipe,

            ];
            $this->M_Kasir->insert_tindakan($data, 'detail_jurnal_kas_bank');
        }





        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_detail_jurnal()
    {
        $out = null;
        $idFaktur = $this->input->post('idFaktur');
        $tipe = $this->input->post('tipe');

        $page_data = $this->M_Jurnal_manual->getJurnalKasBank($idFaktur, $tipe);
        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);

            $no = $i + 1;
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]['id_detail'] . "\",\"" . $tipe  . "\")'><i class='icon-note'></i></a>";
            $delete =
                "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_list_faktur(\"" . $page_data[$i]['id_detail'] . "\",\"" . $tipe . "\")' '><i class='fa fa-trash '></i></button>";


            // $tgl = indo_date2($page_data[$i]->tanggal);

            $rek = $page_data[$i]['rekening'];
            $deskripsi = $page_data[$i]['deskripsi'];
            $pk = $page_data[$i]['pk'];
            $debit = number_format($page_data[$i]['debet'], 2, ',', '.');
            $kredit = number_format($page_data[$i]['kredit'], 2, ',', '.');
            $des_rek = $page_data[$i]['des_rek'];


            $out[$i] = array($no, $pilih, $rek, $deskripsi, $pk, $debit, $kredit, $des_rek, $delete);
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
    public function getDetail_jurnal()
    {
        $id_detail = $this->input->post('id_detail');
        $tipe = $this->input->post('tipe');
        if ($tipe == 'MIT') {
            $data = $this->db->get_where('jurnal_bank', ['id_jurnal_bank' => $id_detail])->row();
        } else {
            $data = $this->db->get_where('detail_jurnal_kas_bank', ['id_detail' => $id_detail])->row();
        }
        $rek = explode('.', $data->rekening);
        $kode1 = $this->db->get_where('daftar_akun', ['kode' => $rek[0]])->row()->id_akun;
        $kode2 = $this->db->get_where('detail_daftar_akun', ['id_akun' => $kode1, 'kode' => $rek[1]])->row()->id_detail;
        $kode1_split = str_split($rek[0]);
        if ($kode1_split[0] == 7 || $kode1_split[0] == 8) {
            $desk = explode(' = ', $data->des_rek);
            $desk = $desk[2];
        } else {
            if ($tipe == 'MIT' || $tipe == 'PEMBAYARAN PIUTANG') {
                $desk = $this->db->get_where('sub_detail_akun', ['kategori' => $rek[0], 'sub_kategori' => $rek[1], 'kode' => $rek[2]])->row()->deskripsi;
            } else {
                $desk = explode(' = ', $data->des_rek);
                $desk = $desk[1];
            }
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
                    'cj' => $this->input->post('cj'),
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
                    'cj' => $this->input->post('cj'),
                    'pk' => $this->input->post('pk'),
                    'tgl' => date('Y-m-d H:i:s'),
                    'des_rek' => $desk,
                    'staff' => $data_staff->nama,
                    'id_fk' => $tipe,

                ];
                $this->M_Kasir->update_tindakan($data, ['id_detail' => $id_detail], 'detail_jurnal_kas_bank');
            }





            $out['status'] = "success";
        }
        echo json_encode($out);
    }
    function hapus_detail_jurnal()
    {
        $id_detail = $this->input->post('id_detail');
        $tipe = $this->input->post('tipe');
        if ($tipe == 'MIT') {
            $this->M_Kasir->delete_tindakan(['id_jurnal_bank' => $id_detail], 'jurnal_bank');
        } else {
            $this->M_Kasir->delete_tindakan(['id_detail' => $id_detail], 'detail_jurnal_kas_bank');
        }
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_jurnal()
    {
        $id_faktur = $this->input->post('id_faktur');
        $db = $this->db->get_where('jurnal_kas_bank', ['id_jurnal' => $id_faktur])->row();
        if ($db->source == 'MIT') {
            $bank = $this->db->get_where('jurnal_bank', ['no_jurnal' => $db->no_jurnal])->result();
            foreach ($bank as $row) {
                $this->M_Kasir->update_tindakan(['status' => 0], ['id_jurnal' => $row->id_jurnal, 'id_fk' => $row->id_fk], 'jurnal_cara_pembayaran');
            }

            $this->M_Kasir->delete_tindakan(['no_jurnal' => $db->no_jurnal], 'jurnal_bank');
            $this->M_Kasir->delete_tindakan(['id_jurnal' => $id_faktur], 'jurnal_kas_bank');
        } else if ($db->source == 'BK') {
            $bk = $this->db->get_where('detail_hutang_bukti_kas', ['no_jurnal' => $db->no_jurnal])->result();
            foreach ($bk as $row) {
                $this->M_Kasir->update_tindakan(['no_jurnal' => NULL, 'ket_jurnal' => 0, 'pembayaran' => NULL], ['no_jurnal' => $db->no_jurnal], 'detail_hutang_bukti_kas');
            }
            $this->M_Kasir->update_tindakan(['verifikasi' => 'DITOLAK'], ['no_jurnal' => $db->no_jurnal], 'jurnal_kas_bank');
            // $this->M_Kasir->delete_tindakan(['no_jurnal' => $db->no_jurnal], 'detail_jurnal_kas_bank');

        } else if ($db->source == 'PEMBAYARAN PIUTANG') {

            $this->M_Kasir->update_tindakan(['no_jurnal' => NULL, 'ket_jurnal' => 0, 'pembayaran' => NULL,'status_verifikasi'=>NULL], ['no_jurnal' => $db->no_jurnal], 'pembayaran_piutang');

            $this->M_Kasir->delete_tindakan(['no_jurnal' => $db->no_jurnal], 'jurnal_kas_bank');
            $this->M_Kasir->delete_tindakan(['no_jurnal' => $db->no_jurnal], 'detail_jurnal_kas_bank');
        } else {
            $this->M_Kasir->delete_tindakan(['id_jurnal' => $id_faktur], 'jurnal_kas_bank');
            $this->M_Kasir->delete_tindakan(['no_jurnal' => $db->no_jurnal], 'detail_jurnal_kas_bank');
        }
        $out['status'] = "success";
        echo json_encode($out);
    }
    function kembalikan_bk()
    {
        $id_faktur = $this->input->post('id_faktur');
        $db = $this->db->get_where('jurnal_kas_bank', ['id_jurnal' => $id_faktur])->row();
        if ($db->source == 'BK') {
            $bk = $this->db->get_where('detail_hutang_bukti_kas', ['no_jurnal' => $db->no_jurnal])->result();
            $this->M_Kasir->update_tindakan(['save' => 1], ['no_dokumen' => $bk[0]->no_dokumen], 'bukti_kas');
            foreach ($bk as $row) {
                $this->M_Kasir->update_tindakan(
                    ['no_jurnal' => NULL, 'ket_jurnal' => 0, 'pembayaran' => NULL, 'status_verifikasi' => NULL, 'status_direktur' => null, 'save' => 1],
                    ['no_jurnal' => $db->no_jurnal],
                    'detail_hutang_bukti_kas'
                );
            }
            $this->M_Kasir->update_tindakan(['verifikasi' => 'DITOLAK'], ['no_jurnal' => $db->no_jurnal], 'jurnal_kas_bank');
            // $this->M_Kasir->delete_tindakan(['no_jurnal' => $db->no_jurnal], 'detail_jurnal_kas_bank');
        } else {
            $this->M_Kasir->update_tindakan(['verifikasi' => NULL, 'ket' => 0], ['no_jurnal' => $db->no_jurnal], 'jurnal_kas_bank');
        }
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function cetak_jurnal()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $tipe = $this->input->post('tipe');
        $page_data['judul'] = $this->input->post('tipe_jurnal');
        $page_data['no_jurnal'] = $no_jurnal;
        $page_data['data'] = $this->M_Jurnal_manual->getJurnalKasBank($no_jurnal, $tipe);
        $page_data['jurnal'] = $this->M_Jurnal_manual->TampilJurnalKasBank($no_jurnal);

        $response = $this->load->view('jurnal_print/cetak_jurnal_rupa', $page_data, TRUE);
        echo $response;
    }
    public function simpan_jurnal()
    {
        $data_staff = $this->session->userdata('data_auth');
        $noDok = $this->input->post('no_jurnal');

        $debit = $this->db->get_where('detail_jurnal_kas_bank', ['no_jurnal' => $noDok, 'id_fk' => 'DEBIT'])->result();
        $kredit = $this->db->get_where('detail_jurnal_kas_bank', ['no_jurnal' => $noDok, 'id_fk' => 'KREDIT'])->result();
        $sumdebit = $this->db->query("SELECT sum(debet) jumlah from detail_jurnal_kas_bank where no_jurnal ='$noDok'")->row()->jumlah;
        $sumkredit = $this->db->query("SELECT sum(kredit) jumlah from detail_jurnal_kas_bank where no_jurnal ='$noDok'")->row()->jumlah;

        $sumdebit_bank = $this->db->query("SELECT sum(debet) jumlah from jurnal_bank where no_jurnal ='$noDok'")->row()->jumlah;
        $sumkredit_bank = $this->db->query("SELECT sum(kredit) jumlah from jurnal_bank where no_jurnal ='$noDok'")->row()->jumlah;
        // if (count($debit) > count($kredit)) {
        //     $out['status'] = "Jurnal Belum Balance";
        // } else if (count($debit) < count($kredit)) {
        //     $out['status'] = "Jurnal Belum Balance";
        // } else 
        if ($sumdebit != $sumkredit || $sumdebit_bank != $sumkredit_bank) {
            $out['status'] = "Total Jurnal Belum Balance";
        } else {
            $data = [
                'tgl_simpan' => date('Y-m-d H:i:s'),
                'ket' => 1
            ];
            $this->M_Kasir->update_tindakan($data, ['no_jurnal' => $noDok], 'jurnal_kas_bank');
            $out['status'] = "success";
        }

        echo json_encode($out);
    }
    public function Verifikasi($tipe)
    {
        $this->load->view('assets/_header');
        $page_data['judul'] = strtoupper($tipe);
        $page_data['judul1'] = 'VERIFIKASI';
        $page_data['url'] = base_url('Jurnal_kasbank/tampil_jurnal_verifikasi');
        $page_data['page_content'] = 'Jurnal/Jurnal_kasbank_verifikasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jurnal_verifikasi()
    {
        $out = null;
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $tipe_jurnal = $this->input->post('tipe_jurnal');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Jurnal_manual->SelectJurnalKasBankVerifikasi($mulai, $akhir, $tipe_jurnal);
        } else {
            $page_data = $this->M_Jurnal_manual->SelectJurnalKasBankVerifikasi('', '', $tipe_jurnal);
        }

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tgl = indo_date2($page_data[$i]->tanggal);

            $no_jurnal = $page_data[$i]->no_jurnal;
            $source = $page_data[$i]->source;
            // $total = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->id_staff;
            if ($page_data[$i]->verifikasi == null) {
                $verif = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>VERIFIKASI</button>";
                $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal . "\",\"" . $source   . "\")' '><i class='icon-printer '></i></button>";
            } elseif ($page_data[$i]->verifikasi == 'DITERIMA') {
                $verif = '<span class="label label-success">' . $page_data[$i]->verifikasi . '</span>';
                $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal . "\",\"" . $source   . "\")' '><i class='icon-printer '></i></button>";
            } elseif ($page_data[$i]->verifikasi == 'DITOLAK') {
                $verif = '<span class="label label-danger">' . $page_data[$i]->verifikasi . '</span>';
                $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal . "\",\"" . $source   . "\")' '><i class='icon-printer '></i></button>";
            }

            if ($source == 'MIT') {
                $db_sum = $this->db->query("SELECT sum(debet) debet , sum(kredit) kredit from jurnal_bank where no_jurnal ='$no_jurnal'")->row();
            } else {
                $db_sum = $this->db->query("SELECT sum(debet) debet , sum(kredit) kredit from detail_jurnal_kas_bank where no_jurnal ='$no_jurnal'")->row();
            }

            $sum = isset($db_sum) ? number_format($db_sum->debet, 0, ',', '.') : '0';

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
    public function verifikasi_jurnal()
    {
        $data_staff = $this->session->userdata('data_auth');
        $noDok = $this->input->post('id_jurnal');
        $tgl = $this->input->post('tgl');
        $data = [
            'staff_verifikasi' => $data_staff->nama,
            'tgl_verifikasi' =>  $tgl . ' ' . date('H:i:s'),
            'keterangan' => $this->input->post('ket'),
            'verifikasi' => $this->input->post('acc'),
        ];

        $this->M_Kasir->update_tindakan($data, ['no_jurnal' => $noDok], 'jurnal_kas_bank');

        if ($this->input->post('acc') == 'DITOLAK') {

            $db = $this->M_Jurnal_manual->getBuktiKas($noDok);
            if (!empty($db)) {
                foreach ($db as $row) {
                    if ($row->ket_jurnal == 1) {
                        $this->M_Kasir->update_tindakan(['ket_jurnal' => 0], ['id_jurnal' => $row->id_jurnal], 'jurnal_pembayaran_farmasi');
                    }
                    $this->M_Kasir->update_tindakan(['save' => 3], ['no_dokumen' => $row->no_dokumen], 'bukti_kas');
                    $this->M_Kasir->update_tindakan(['save' => 3], ['no_dokumen' => $row->no_dokumen], 'detail_hutang_bukti_kas');
                }
            }
        }

        $out['status'] = "success";

        echo json_encode($out);
    }
    public function getSum()
    {
        $no_jurnal = $this->input->post('no_jurnal');

        $data = $this->db->query("SELECT SUM(debet) debet,SUM(kredit) kredit from detail_jurnal_kas_bank where no_jurnal ='$no_jurnal'")->row();

        echo json_encode($data);
    }
    public function Laporan($tipe)
    {
        $this->load->view('assets/_header');
        $page_data['judul'] = strtoupper($tipe);
        $page_data['judul1'] = 'LAPORAN';
        $page_data['url'] = base_url('Jurnal_kasbank/tampil_jurnal_laporan');
        $page_data['page_content'] = 'Jurnal/Jurnal_kasbank_verifikasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jurnal_laporan()
    {
        $out = null;
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $tipe_jurnal = $this->input->post('tipe_jurnal');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Jurnal_manual->SelectJurnalKasBankLaporan($mulai, $akhir, $tipe_jurnal);
        } else {
            $page_data = $this->M_Jurnal_manual->SelectJurnalKasBankLaporan('', '', $tipe_jurnal);
        }

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tgl = indo_date2($page_data[$i]->tanggal);

            $no_jurnal = $page_data[$i]->no_jurnal;
            // $total = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->id_staff;
            $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal  . "\")' '><i class='icon-printer '></i></button>";


            $out[$i] = array($no, $cetak, $tgl, $no_jurnal, $staff);
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

    public function getNoDokumen()
    {
        $tgl = $this->input->post('tanggal');
        $kode = '306';
        $max = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl)->max;

        $noValid =  sprintf('%04d', $max + 1, 'dyhtdyu');
        $noDok = $noValid . "/" . "GL-" . $kode . "/" . date('my', strtotime($tgl));

        echo json_encode($noDok);
    }

    public function total_jurnal_kasbank()
    {
        $noDok = $this->input->post('idFaktur');
        $debit = $this->db->query("SELECT ifnull(sum(debet),0) jumlah from detail_jurnal_kas_bank where no_jurnal ='$noDok'")->row()->jumlah;
        $kredit = $this->db->query("SELECT ifnull(sum(kredit),0) jumlah from detail_jurnal_kas_bank where no_jurnal ='$noDok'")->row()->jumlah;

        // for ($i = 0; $i < count($page_data); $i++) {
        //     $id_detail  = "Rp. " . number_format($page_data[$i]->total - $page_data[$i]->kredit, 0, ',', '.');
        // }

        $id_detail  = number_format($debit - $kredit, 2, ',', '.');
        $out[0] = array($id_detail);
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }
    public function total_jurnal_kasbank_dk()
    {
        $noDok = $this->input->post('idFaktur');
        $debit = $this->db->query("SELECT ifnull(sum(debet),0) jumlah from detail_jurnal_kas_bank where no_jurnal ='$noDok'")->row()->jumlah;
        $kredit = $this->db->query("SELECT ifnull(sum(kredit),0) jumlah from detail_jurnal_kas_bank where no_jurnal ='$noDok'")->row()->jumlah;


        $out[0] = array(number_format($debit, 2, ',', '.'), number_format($kredit, 2, ',', '.'));
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal_kasbank extends CI_Controller
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
    public function Jurnal($tipe)
    {
        $this->load->view('assets/_header');
        // $page_data['kondisi'] = $this->db->get('list_kondisi_asset')->result_array();
        $page_data['pelayanan'] = $this->db->get('daftar_akun')->result_array();
        $page_data['data_cj'] = $this->db->get('akun_cj')->result_array();
        if ($tipe == 'kas') {
            $kode = '301';
            $judul = 'KAS';
            $jk = '10';
        } else {
            $kode = '302';
            $judul = 'BANK';
            $jk = '11';
        }
        $page_data['max'] = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, '')->max;
        $page_data['kode'] = $kode;
        $page_data['judul'] = $judul;
        $page_data['jk'] = $jk;
        $page_data['page_content'] = 'Jurnal/Jurnal_kasbank';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function insertJurnal()
    {
        $data_staff = $this->session->userdata('data_auth');
        $noDok = $this->input->post('no_dokumen');
        $no_index = $this->input->post('no_index');
        $tgl = $this->input->post('tgl_faktur');
        $kode = $this->input->post('kode');

        $data = array(
            'no_jurnal' => $noDok,
            'tanggal' => $this->input->post('tgl_faktur'),
            'tipe_jurnal' => $this->input->post('tipe_jurnal'),
            'tgl_input' => date("Y-m-d H:i:s"),
            'id_staff' => $data_staff->nama,
        );


        $this->M_Kasir->insert_tindakan($data, 'jurnal_kas_bank');
        $dokumen = ['no_dokumen' => $noDok, 'no_index' => $no_index, 'kode' => $kode, 'tgl' => $tgl, 'staff' => $data_staff->nama];
        $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_jurnal()
    {
        $out = null;
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $tipe_jurnal = $this->input->post('tipe_jurnal');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Jurnal_manual->SelectJurnalKasBank($mulai, $akhir, $tipe_jurnal);
        } else {
            $page_data = $this->M_Jurnal_manual->SelectJurnalKasBank('', '', $tipe_jurnal);
        }

        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);

            $no = $i + 1;


            $tgl = indo_date2($page_data[$i]->tanggal);

            $no_jurnal = $page_data[$i]->no_jurnal;
            $source = $page_data[$i]->source;
            // $total = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->id_staff;
            if ($page_data[$i]->ket == 0) {
                $cetak = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>SIMPAN</button>";
                $delete =
                    "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='fa fa-trash '></i></button>";
                $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\",\"" . $page_data[$i]->source  . "\")'><i class='icon-note'></i></a>";
                $status = "";
                $ket = "";
            } else if ($page_data[$i]->ket == 1 && $page_data[$i]->verifikasi == null) {
                // $cetak = '<span class="label label-warning">Menunggu Verifikasi</span>';
                $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal . "\",\"" . $page_data[$i]->source . "\")' '><i class='icon-printer '></i></button>";
                if ($source == 'BK') {
                    $delete = "<button mr-10 title='Kembalikan Jurnal ke Verif BK' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='fa fa-trash '></i></button>
                        <button title='Kembalikan Jurnal ke BK' class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'  onclick='kembalikan_bk(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='icon-action-undo'></i></button>";
                } elseif ($source == 'MIT') {
                    $delete =
                        "<button title='Kembalikan Jurnal ke MIT' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='fa fa-trash '></i></button>
                        <button title='Buka Jurnal' class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'  onclick='buka_jurnal(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='icon-action-undo'></i></button>";
                } else {
                    $delete =
                        "<button title='Buka Jurnal' class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'  onclick='buka_jurnal(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='icon-action-undo'></i></button>";
                }
                $pilih = "";
                $status = '<span class="label label-warning">Menunggu Verifikasi</span>';
                $ket = '<span class="label label-warning">Menunggu Verifikasi</span>';
            } else if ($page_data[$i]->ket == 1 && $page_data[$i]->verifikasi == 'DITERIMA') {
                $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal . "\",\"" . $page_data[$i]->source . "\")' '><i class='icon-printer '></i></button>";
                if ($source == 'BK') {
                    $delete = "<button mr-10 title='Kembalikan Jurnal ke Verif BK' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='fa fa-trash '></i></button>
                        <button title='Kembalikan Jurnal ke BK' class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'  onclick='kembalikan_bk(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='icon-action-undo'></i></button>";
                } elseif ($source == 'MIT') {
                    $delete =
                        "<button title='Kembalikan Jurnal ke MIT' class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='fa fa-trash '></i></button>
                        <button title='Buka Jurnal' class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'  onclick='buka_jurnal(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='icon-action-undo'></i></button>";
                } else {
                    $delete =
                        "<button title='Buka Jurnal' class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal'  onclick='buka_jurnal(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")' '><i class='icon-action-undo'></i></button>";
                }
                $pilih = "";
                $status = '<span class="label label-success">' . $page_data[$i]->verifikasi . '</span>';
                $ket = $page_data[$i]->keterangan;
            } else if ($page_data[$i]->ket == 1 && $page_data[$i]->verifikasi == 'DITOLAK') {
                // $cetak = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>SIMPAN</button>";
                // $delete = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id_jurnal . "\")' '><i class='fa fa-trash '></i></button>";
                // $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tambah_obat_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $page_data[$i]->no_jurnal . "\")'><i class='icon-note'></i></a>";
                $cetak = "";
                $delete = "";
                $pilih = "";
                $status = '<span class="label label-danger">' . $page_data[$i]->verifikasi . '</span>';
                $ket = $page_data[$i]->keterangan;
            }

            $db_sum = $this->db->query("SELECT sum(debet) debet , sum(kredit) kredit from (
            SELECT (debet) debet , (kredit) kredit from detail_jurnal_kas_bank where no_jurnal ='$no_jurnal'
            UNION ALL
            SELECT (debet) debet , (kredit) kredit from jurnal_bank where no_jurnal ='$no_jurnal'
            ) as a")->row();
            $sum = isset($db_sum) ? number_format($db_sum->debet, 0, ',', '.') : '0';
            $db_deskripsi = $this->db->query("SELECT d.deskripsi from detail_jurnal_kas_bank d, jurnal_kas_bank j where d.no_jurnal = j.no_jurnal and d.debet!=0 and d.no_jurnal ='$no_jurnal' and (j.source is null or j.source!= 'PEMBAYARAN PIUTANG')
                UNION ALL
                SELECT d.deskripsi from detail_jurnal_kas_bank d, jurnal_kas_bank j where d.no_jurnal = j.no_jurnal and d.pk_bukti !='Jurnal' and d.no_jurnal ='$no_jurnal' and j.source = 'PEMBAYARAN PIUTANG'
                UNION ALL
                SELECT deskripsi from jurnal_bank where debet!=0 and no_jurnal ='$no_jurnal'
               ")->row();
            $deskripsi = isset($db_deskripsi) ? $db_deskripsi->deskripsi : '';


            $out[$i] = array($no, $pilih, $cetak, $tgl, $no_jurnal, $sum, $deskripsi, $staff, $ket, $status, $delete);
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


    public function insert_detail_jurnal()
    {
        $data_staff = $this->session->userdata('data_auth');
        $pelayanan = explode("|", $this->input->post('pelayanan'));
        $id_jenis = explode("|", $this->input->post('id_jenis'));
        $id_jurnal = $this->input->post('id_jurnal');
        $kode1 = $this->db->get_where('daftar_akun', ['id_akun' => $id_jenis[1]])->row();
        $kode2 = $this->db->get_where('detail_daftar_akun', ['id_detail' => $id_jenis[0]])->row();

        $jurnal = $this->db->get_where('jurnal_kas_bank', ['id_jurnal' => $id_jurnal])->row();
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
                'jk' => $this->input->post('jk'),
                'rekening' => $rek,
                'deskripsi' => $this->input->post('deskripsi'),
                'no_jurnal' => $jurnal->no_jurnal,
                'kredit' => ($tipe == 'KREDIT') ? $nilai : 0,
                'debet' => ($tipe == 'DEBIT') ? $nilai : 0,
                'lap' => '01',
                'jb' => $pelayanan[0],
                'cj' => $this->input->post('cj'),
                'pk' => $this->input->post('pk'),
                'tgl' => date('Y-m-d H:i:s'),
                'des_rek' => $desk,
                'staff' => $data_staff->nama,
                'id_fk' => $tipe,
            ];

            $this->M_Kasir->insert_tindakan($data, 'jurnal_bank');
        } else {
            $data = [
                'id_jurnal' => $id_jurnal,
                'jk' => $this->input->post('jk'),
                'rekening' => $rek,
                'deskripsi' => $this->input->post('deskripsi'),
                'no_jurnal' => $jurnal->no_jurnal,
                'kredit' => ($tipe == 'KREDIT') ? $nilai : 0,
                'debet' => ($tipe == 'DEBIT') ? $nilai : 0,
                'lap' => '01',
                'jb' => $pelayanan[0],
                'cj' => $this->input->post('cj'),
                'pk' => $this->input->post('pk'),
                'tgl' => date('Y-m-d H:i:s'),
                'des_rek' => $desk,
                'staff' => $data_staff->nama,
                'id_fk' => $tipe,

            ];
            $this->M_Kasir->insert_tindakan($data, 'detail_jurnal_kas_bank');
        }





        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_detail_jurnal()
    {
        $out = null;
        $idFaktur = $this->input->post('idFaktur');
        $tipe = $this->input->post('tipe');

        $page_data = $this->M_Jurnal_manual->getJurnalKasBank($idFaktur, $tipe);
        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);

            $no = $i + 1;
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_faktur(\"" . $page_data[$i]['id_detail'] . "\",\"" . $tipe  . "\")'><i class='icon-note'></i></a>";
            $delete =
                "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_list_faktur(\"" . $page_data[$i]['id_detail'] . "\",\"" . $tipe . "\")' '><i class='fa fa-trash '></i></button>";


            // $tgl = indo_date2($page_data[$i]->tanggal);

            $rek = $page_data[$i]['rekening'];
            $deskripsi = $page_data[$i]['deskripsi'];
            $pk = $page_data[$i]['pk'];
            $debit = number_format($page_data[$i]['debet'], 2, ',', '.');
            $kredit = number_format($page_data[$i]['kredit'], 2, ',', '.');
            $des_rek = $page_data[$i]['des_rek'];


            $out[$i] = array($no, $pilih, $rek, $deskripsi, $pk, $debit, $kredit, $des_rek, $delete);
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
    public function getDetail_jurnal()
    {
        $id_detail = $this->input->post('id_detail');
        $tipe = $this->input->post('tipe');
        if ($tipe == 'MIT') {
            $data = $this->db->get_where('jurnal_bank', ['id_jurnal_bank' => $id_detail])->row();
        } else {
            $data = $this->db->get_where('detail_jurnal_kas_bank', ['id_detail' => $id_detail])->row();
        }
        $rek = explode('.', $data->rekening);
        $kode1 = $this->db->get_where('daftar_akun', ['kode' => $rek[0]])->row()->id_akun;
        $kode2 = $this->db->get_where('detail_daftar_akun', ['id_akun' => $kode1, 'kode' => $rek[1]])->row()->id_detail;
        $kode1_split = str_split($rek[0]);
        if ($kode1_split[0] == 7 || $kode1_split[0] == 8) {
            $desk = explode(' = ', $data->des_rek);
            $desk = $desk[2];
        } else {
            if ($tipe == 'MIT' || $tipe == 'PEMBAYARAN PIUTANG') {
                $desk = $this->db->get_where('sub_detail_akun', ['kategori' => $rek[0], 'sub_kategori' => $rek[1], 'kode' => $rek[2]])->row()->deskripsi;
            } else {
                $desk = explode(' = ', $data->des_rek);
                $desk = $desk[1];
            }
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
                    'cj' => $this->input->post('cj'),
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
                    'cj' => $this->input->post('cj'),
                    'pk' => $this->input->post('pk'),
                    'tgl' => date('Y-m-d H:i:s'),
                    'des_rek' => $desk,
                    'staff' => $data_staff->nama,
                    'id_fk' => $tipe,

                ];
                $this->M_Kasir->update_tindakan($data, ['id_detail' => $id_detail], 'detail_jurnal_kas_bank');
            }





            $out['status'] = "success";
        }
        echo json_encode($out);
    }
    function hapus_detail_jurnal()
    {
        $id_detail = $this->input->post('id_detail');
        $tipe = $this->input->post('tipe');
        if ($tipe == 'MIT') {
            $this->M_Kasir->delete_tindakan(['id_jurnal_bank' => $id_detail], 'jurnal_bank');
        } else {
            $this->M_Kasir->delete_tindakan(['id_detail' => $id_detail], 'detail_jurnal_kas_bank');
        }
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_jurnal()
    {
        $id_faktur = $this->input->post('id_faktur');
        $db = $this->db->get_where('jurnal_kas_bank', ['id_jurnal' => $id_faktur])->row();
        if ($db->source == 'MIT') {
            $bank = $this->db->get_where('jurnal_bank', ['no_jurnal' => $db->no_jurnal])->result();
            foreach ($bank as $row) {
                $this->M_Kasir->update_tindakan(['status' => 0], ['id_jurnal' => $row->id_jurnal, 'id_fk' => $row->id_fk], 'jurnal_cara_pembayaran');
            }

            $this->M_Kasir->delete_tindakan(['no_jurnal' => $db->no_jurnal], 'jurnal_bank');
            $this->M_Kasir->delete_tindakan(['id_jurnal' => $id_faktur], 'jurnal_kas_bank');
        } else if ($db->source == 'BK') {
            $bk = $this->db->get_where('detail_hutang_bukti_kas', ['no_jurnal' => $db->no_jurnal])->result();
            foreach ($bk as $row) {
                $this->M_Kasir->update_tindakan(['no_jurnal' => NULL, 'ket_jurnal' => 0, 'pembayaran' => NULL], ['no_jurnal' => $db->no_jurnal], 'detail_hutang_bukti_kas');
            }
            $this->M_Kasir->update_tindakan(['verifikasi' => 'DITOLAK'], ['no_jurnal' => $db->no_jurnal], 'jurnal_kas_bank');
            // $this->M_Kasir->delete_tindakan(['no_jurnal' => $db->no_jurnal], 'detail_jurnal_kas_bank');

        } else if ($db->source == 'PEMBAYARAN PIUTANG') {

            $this->M_Kasir->update_tindakan(['no_jurnal' => NULL, 'ket_jurnal' => 0, 'pembayaran' => NULL,'status_verifikasi'=>NULL], ['no_jurnal' => $db->no_jurnal], 'pembayaran_piutang');

            $this->M_Kasir->delete_tindakan(['no_jurnal' => $db->no_jurnal], 'jurnal_kas_bank');
            $this->M_Kasir->delete_tindakan(['no_jurnal' => $db->no_jurnal], 'detail_jurnal_kas_bank');
        } else {
            $this->M_Kasir->delete_tindakan(['id_jurnal' => $id_faktur], 'jurnal_kas_bank');
            $this->M_Kasir->delete_tindakan(['no_jurnal' => $db->no_jurnal], 'detail_jurnal_kas_bank');
        }
        $out['status'] = "success";
        echo json_encode($out);
    }
    function kembalikan_bk()
    {
        $id_faktur = $this->input->post('id_faktur');
        $db = $this->db->get_where('jurnal_kas_bank', ['id_jurnal' => $id_faktur])->row();
        if ($db->source == 'BK') {
            $bk = $this->db->get_where('detail_hutang_bukti_kas', ['no_jurnal' => $db->no_jurnal])->result();
            $this->M_Kasir->update_tindakan(['save' => 1], ['no_dokumen' => $bk[0]->no_dokumen], 'bukti_kas');
            foreach ($bk as $row) {
                $this->M_Kasir->update_tindakan(
                    ['no_jurnal' => NULL, 'ket_jurnal' => 0, 'pembayaran' => NULL, 'status_verifikasi' => NULL, 'status_direktur' => null, 'save' => 1],
                    ['no_jurnal' => $db->no_jurnal],
                    'detail_hutang_bukti_kas'
                );
            }
            $this->M_Kasir->update_tindakan(['verifikasi' => 'DITOLAK'], ['no_jurnal' => $db->no_jurnal], 'jurnal_kas_bank');
            // $this->M_Kasir->delete_tindakan(['no_jurnal' => $db->no_jurnal], 'detail_jurnal_kas_bank');
        } else {
            $this->M_Kasir->update_tindakan(['verifikasi' => NULL, 'ket' => 0], ['no_jurnal' => $db->no_jurnal], 'jurnal_kas_bank');
        }
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function cetak_jurnal()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $tipe = $this->input->post('tipe');
        $page_data['judul'] = $this->input->post('tipe_jurnal');
        $page_data['no_jurnal'] = $no_jurnal;
        $page_data['data'] = $this->M_Jurnal_manual->getJurnalKasBank($no_jurnal, $tipe);
        $page_data['jurnal'] = $this->M_Jurnal_manual->TampilJurnalKasBank($no_jurnal);

        $response = $this->load->view('jurnal_print/cetak_jurnal_rupa', $page_data, TRUE);
        echo $response;
    }
    public function simpan_jurnal()
    {
        $data_staff = $this->session->userdata('data_auth');
        $noDok = $this->input->post('no_jurnal');

        $debit = $this->db->get_where('detail_jurnal_kas_bank', ['no_jurnal' => $noDok, 'id_fk' => 'DEBIT'])->result();
        $kredit = $this->db->get_where('detail_jurnal_kas_bank', ['no_jurnal' => $noDok, 'id_fk' => 'KREDIT'])->result();
        $sumdebit = $this->db->query("SELECT sum(debet) jumlah from detail_jurnal_kas_bank where no_jurnal ='$noDok'")->row()->jumlah;
        $sumkredit = $this->db->query("SELECT sum(kredit) jumlah from detail_jurnal_kas_bank where no_jurnal ='$noDok'")->row()->jumlah;

        $sumdebit_bank = $this->db->query("SELECT sum(debet) jumlah from jurnal_bank where no_jurnal ='$noDok'")->row()->jumlah;
        $sumkredit_bank = $this->db->query("SELECT sum(kredit) jumlah from jurnal_bank where no_jurnal ='$noDok'")->row()->jumlah;
        // if (count($debit) > count($kredit)) {
        //     $out['status'] = "Jurnal Belum Balance";
        // } else if (count($debit) < count($kredit)) {
        //     $out['status'] = "Jurnal Belum Balance";
        // } else 
        if ($sumdebit != $sumkredit || $sumdebit_bank != $sumkredit_bank) {
            $out['status'] = "Total Jurnal Belum Balance";
        } else {
            $data = [
                'tgl_simpan' => date('Y-m-d H:i:s'),
                'ket' => 1
            ];
            $this->M_Kasir->update_tindakan($data, ['no_jurnal' => $noDok], 'jurnal_kas_bank');
            $out['status'] = "success";
        }

        echo json_encode($out);
    }
    public function Verifikasi($tipe)
    {
        $this->load->view('assets/_header');
        $page_data['judul'] = strtoupper($tipe);
        $page_data['judul1'] = 'VERIFIKASI';
        $page_data['url'] = base_url('Jurnal_kasbank/tampil_jurnal_verifikasi');
        $page_data['page_content'] = 'Jurnal/Jurnal_kasbank_verifikasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jurnal_verifikasi()
    {
        $out = null;
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $tipe_jurnal = $this->input->post('tipe_jurnal');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Jurnal_manual->SelectJurnalKasBankVerifikasi($mulai, $akhir, $tipe_jurnal);
        } else {
            $page_data = $this->M_Jurnal_manual->SelectJurnalKasBankVerifikasi('', '', $tipe_jurnal);
        }

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tgl = indo_date2($page_data[$i]->tanggal);

            $no_jurnal = $page_data[$i]->no_jurnal;
            $source = $page_data[$i]->source;
            // $total = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->id_staff;
            if ($page_data[$i]->verifikasi == null) {
                $verif = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>VERIFIKASI</button>";
                $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal . "\",\"" . $source   . "\")' '><i class='icon-printer '></i></button>";
            } elseif ($page_data[$i]->verifikasi == 'DITERIMA') {
                $verif = '<span class="label label-success">' . $page_data[$i]->verifikasi . '</span>';
                $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal . "\",\"" . $source   . "\")' '><i class='icon-printer '></i></button>";
            } elseif ($page_data[$i]->verifikasi == 'DITOLAK') {
                $verif = '<span class="label label-danger">' . $page_data[$i]->verifikasi . '</span>';
                $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal . "\",\"" . $source   . "\")' '><i class='icon-printer '></i></button>";
            }

            if ($source == 'MIT') {
                $db_sum = $this->db->query("SELECT sum(debet) debet , sum(kredit) kredit from jurnal_bank where no_jurnal ='$no_jurnal'")->row();
            } else {
                $db_sum = $this->db->query("SELECT sum(debet) debet , sum(kredit) kredit from detail_jurnal_kas_bank where no_jurnal ='$no_jurnal'")->row();
            }

            $sum = isset($db_sum) ? number_format($db_sum->debet, 0, ',', '.') : '0';

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
    public function verifikasi_jurnal()
    {
        $data_staff = $this->session->userdata('data_auth');
        $noDok = $this->input->post('id_jurnal');
        $tgl = $this->input->post('tgl');
        $data = [
            'staff_verifikasi' => $data_staff->nama,
            'tgl_verifikasi' =>  $tgl . ' ' . date('H:i:s'),
            'keterangan' => $this->input->post('ket'),
            'verifikasi' => $this->input->post('acc'),
        ];

        $this->M_Kasir->update_tindakan($data, ['no_jurnal' => $noDok], 'jurnal_kas_bank');

        if ($this->input->post('acc') == 'DITOLAK') {

            $db = $this->M_Jurnal_manual->getBuktiKas($noDok);
            if (!empty($db)) {
                foreach ($db as $row) {
                    if ($row->ket_jurnal == 1) {
                        $this->M_Kasir->update_tindakan(['ket_jurnal' => 0], ['id_jurnal' => $row->id_jurnal], 'jurnal_pembayaran_farmasi');
                    }
                    $this->M_Kasir->update_tindakan(['save' => 3], ['no_dokumen' => $row->no_dokumen], 'bukti_kas');
                    $this->M_Kasir->update_tindakan(['save' => 3], ['no_dokumen' => $row->no_dokumen], 'detail_hutang_bukti_kas');
                }
            }
        }

        $out['status'] = "success";

        echo json_encode($out);
    }
    public function getSum()
    {
        $no_jurnal = $this->input->post('no_jurnal');

        $data = $this->db->query("SELECT SUM(debet) debet,SUM(kredit) kredit from detail_jurnal_kas_bank where no_jurnal ='$no_jurnal'")->row();

        echo json_encode($data);
    }
    public function Laporan($tipe)
    {
        $this->load->view('assets/_header');
        $page_data['judul'] = strtoupper($tipe);
        $page_data['judul1'] = 'LAPORAN';
        $page_data['url'] = base_url('Jurnal_kasbank/tampil_jurnal_laporan');
        $page_data['page_content'] = 'Jurnal/Jurnal_kasbank_verifikasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jurnal_laporan()
    {
        $out = null;
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $tipe_jurnal = $this->input->post('tipe_jurnal');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Jurnal_manual->SelectJurnalKasBankLaporan($mulai, $akhir, $tipe_jurnal);
        } else {
            $page_data = $this->M_Jurnal_manual->SelectJurnalKasBankLaporan('', '', $tipe_jurnal);
        }

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tgl = indo_date2($page_data[$i]->tanggal);

            $no_jurnal = $page_data[$i]->no_jurnal;
            // $total = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->id_staff;
            $cetak = "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal  . "\")' '><i class='icon-printer '></i></button>";


            $out[$i] = array($no, $cetak, $tgl, $no_jurnal, $staff);
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

    public function getNoDokumen()
    {
        $tgl = $this->input->post('tanggal');
        $kode = '306';
        $max = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, $tgl)->max;

        $noValid =  sprintf('%04d', $max + 1, 'dyhtdyu');
        $noDok = $noValid . "/" . "GL-" . $kode . "/" . date('my', strtotime($tgl));

        echo json_encode($noDok);
    }

    public function total_jurnal_kasbank()
    {
        $noDok = $this->input->post('idFaktur');
        $debit = $this->db->query("SELECT ifnull(sum(debet),0) jumlah from detail_jurnal_kas_bank where no_jurnal ='$noDok'")->row()->jumlah;
        $kredit = $this->db->query("SELECT ifnull(sum(kredit),0) jumlah from detail_jurnal_kas_bank where no_jurnal ='$noDok'")->row()->jumlah;

        // for ($i = 0; $i < count($page_data); $i++) {
        //     $id_detail  = "Rp. " . number_format($page_data[$i]->total - $page_data[$i]->kredit, 0, ',', '.');
        // }

        $id_detail  = number_format($debit - $kredit, 2, ',', '.');
        $out[0] = array($id_detail);
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }
    public function total_jurnal_kasbank_dk()
    {
        $noDok = $this->input->post('idFaktur');
        $debit = $this->db->query("SELECT ifnull(sum(debet),0) jumlah from detail_jurnal_kas_bank where no_jurnal ='$noDok'")->row()->jumlah;
        $kredit = $this->db->query("SELECT ifnull(sum(kredit),0) jumlah from detail_jurnal_kas_bank where no_jurnal ='$noDok'")->row()->jumlah;


        $out[0] = array(number_format($debit, 2, ',', '.'), number_format($kredit, 2, ',', '.'));
        $page_data['data'] = $out;
        echo json_encode($page_data);
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
