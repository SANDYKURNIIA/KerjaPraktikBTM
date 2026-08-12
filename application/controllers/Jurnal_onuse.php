<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal_onuse extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Jurnal_onuse');
        $this->load->model('M_Jurnal_keuangan');
        $this->load->model('M_Jurnal');
        $this->load->model('M_Kasir');
    }
    public function Rekap_penyusutan()
    {
        $this->load->view('assets/_header');
        $page_data['kondisi'] = $this->db->get('list_kondisi_asset')->result_array();
        $page_data['jenis'] = $this->db->get('list_jenis_asset')->result_array();
        $page_data['page_content'] = 'Jurnal/Rekap_penyusutan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function insertFaktur()
    {
        $id_faktur = uniqid();
        $no_asset  = $this->input->post('no_asset');
        $item_asset = $this->input->post('item_asset');
        $no_seri = $this->input->post('no_seri');
        $lokasi = $this->input->post('lokasi');
        $kondisi = $this->input->post('kondisi');
        $vendor = $this->input->post('vendor');
        $jenis = $this->input->post('jenis');
        $tgl = $this->input->post('tgl');
        $harga = $this->input->post('harga');
        $tgl_input = date("Y-m-d H:i:s");
        $data_staff = $this->session->userdata('data_auth');


        $data = array(
            'no_asset' => $no_asset,
            'item_asset' => $item_asset,
            'no_seri' => $no_seri,
            'lokasi' => $lokasi,
            'kondisi' => $kondisi,
            'vendor' => $vendor,
            'jenis_asset' => $jenis,
            'tgl' => $tgl,
            'harga' => $harga,
            'tgl_input' => $tgl_input,
            'id_staff' => $data_staff->id_staff,
        );


        $this->M_Kasir->insert_tindakan($data, 'list_asset');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_data_penyusutan()
    {

        $out = null;
        $page_data = $this->M_Jurnal_onuse->Select_penyusutan();

        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);

            $no = $i + 1;
            // $tgl =  strftime("%A, %d %B %Y ", $tgl);
            $delete =
                "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_faktur(\"" . $page_data[$i]->id . "\",\"" . $page_data[$i]->item_asset . "\")' '><i class='fa fa-trash '></i></button>";


            $unit = $page_data[$i]->unit;
            $no_asset = $page_data[$i]->no_asset;
            $nama = $page_data[$i]->item_asset;
            $no_seri = $page_data[$i]->no_seri;
            $lokasi = $page_data[$i]->lokasi;
            $kondisi = $page_data[$i]->kondisi;
            $vendor = $page_data[$i]->vendor;
            $jenis_asset = $page_data[$i]->jenis;
            if ($page_data[$i]->penyesuaian == 1) {
                $masa = 1;
            } else {
                $masa = $page_data[$i]->masa;
            }
            $tgl = date('d-m-Y', strtotime($page_data[$i]->tgl));
            $harga = $page_data[$i]->harga;
            if ($masa == 0) {
                $hargapenyusutan = round($harga);
            } else {
                $hargapenyusutan = round($harga / $masa);
            }

            $tanggal = date('Y-m-d');
            $tanggal='2025-01-30';

            $tgl1 = strtotime($page_data[$i]->tgl_penyusutan);
            $tgl2 = strtotime($tanggal);

            $dateAwal = new DateTime($page_data[$i]->tgl_penyusutan);
            $dateAkhir = new DateTime();
            $dateAkhir = new DateTime($tanggal);

            // Hitung selisih awal menggunakan date_diff()
            $selisihAwal = date_diff($dateAwal, $dateAkhir);

            // Jika tanggal di bulan kedua lebih besar dari 15, tambahkan satu bulan
            $nowmonth = (date("m", $tgl2) . '-15'); //format bulan 



            if ((date('d', $tgl1)) > 15) {
                $selisih = $selisihAwal->y * 12 + $selisihAwal->m;
            } else if ((date('d', $tgl1)) <= 15) {
                if (date('m', $tgl1) == 12) {
                    $selisih = $selisihAwal->y * 12 + $selisihAwal->m;
                } else {
                    $selisih = $selisihAwal->y * 12 + $selisihAwal->m + 1;
                }
            } else {
                $selisih = $selisihAwal->y * 12 + $selisihAwal->m + 1;
            }
            // echo $nama . " : " . $selisih . '<br>';
                // $selisih = $selisihAwal->y * 12 + $selisihAwal->m;


            if ($selisih < $masa) {
                $hargapenyusutan = $hargapenyusutan;
            } else if ($selisih == $masa  && (date('m-d', $tgl1)) <= $nowmonth) {
                $hargapenyusutan = 0;
            } else {
                $hargapenyusutan = 0;
            }

            if ($dateAwal->format('Y') !== $dateAkhir->format('Y')) {
                $firstDayOfYear = new DateTime($dateAkhir->format('Y') . '-01-01');

                // Hitung selisih awal menggunakan date_diff()
                $selisihBeban = date_diff($firstDayOfYear, $dateAkhir);
                $selisihBeban = $selisihBeban->m + 1;
            } else {
                if ((date('m-d', $tgl1)) > $nowmonth) {
                    $selisihBeban = $selisihAwal->y * 12 + $selisihAwal->m;
                } else if ((date('m-d', $tgl1)) <= $nowmonth) {
                    $selisihBeban = $selisihAwal->y * 12 + $selisihAwal->m + 1;
                } else {
                    $selisihBeban = $selisihAwal->y * 12 + $selisihAwal->m;
                }
            }
            // echo  $nama . " : " .$selisihBeban . '<br>';


            $hargabeban = $hargapenyusutan * $selisihBeban;

            $hargaakumulasi = $hargapenyusutan * $selisih;

            if ($hargaakumulasi == 0 && $masa != 0) {
                $akumulasi = $harga;
            } else if ($masa == 0) {
                $akumulasi = 0;
            } else {
                $akumulasi = $hargaakumulasi;
            }
            $harganilai = $harga - $akumulasi;

            // if ($harganilai <= 0  || $selisih > $masa) {
            //     $nilai = 0;
            // } else {
            $nilai = $harganilai;
            // }



            // $data = array(
            //     'id' => $page_data[$i]->id,
            //     'no_asset' => $page_data[$i]->no_asset,
            //     'jenis' => $page_data[$i]->jenis_asset,
            //     'harga_penyusutan' => $hargapenyusutan,
            //     'akumulasi' => $akumulasi,
            //     'nilai_buku' => $nilai,
            //     'tgl' => date('Y-m-d H:i:s'),
            // );

            // $this->db->replace('rekap_asset', $data);


            $harga = number_format($harga, 2, ',', '.');
            $penyusutan = number_format($hargapenyusutan, 2, ',', '.');

            $beban = number_format($hargabeban, 2, ',', '.');

            $nilai = number_format($nilai, 2, ',', '.');

            $akumulasi = number_format($akumulasi, 2, ',', '.');
            // $masa = $masa.' | '.$selisih; 


            $out[$i] = array($no, $delete, $no_asset, $nama, $no_seri, $lokasi, $kondisi, $vendor, $jenis_asset, $tgl, $harga, $masa, $penyusutan, $beban, $akumulasi, $nilai, $unit);
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
    function cetak_penyusutan()
    {
        $data_staff = $this->session->userdata('data_auth');
        $page_data['data'] = $this->M_Jurnal_onuse->Select_penyusutan();
        // $page_data['data_jenis'] = $this->M_Jurnal_onuse->SelectJurnalPenyusutan();
        $page_data['staff'] = $data_staff->nama;
        $response = $this->load->view('jurnal_print/cetak_penyusutan', $page_data, TRUE);
        echo $response;
    }
    function hapus_faktur()
    {
        $id_faktur = $this->input->post('id_faktur');
        $this->M_Kasir->delete_tindakan(['id' => $id_faktur], 'list_asset');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function Jurnal_penyusutan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Jurnal_penyusutan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function setJurnalPenyusutan()
    {
        $staff = $this->session->userdata('data_auth');

        $dbsaldo = $this->db->get_where("jurnal_akumulasi_penyusutan", ['MONTH(tgl)' => date('m'), 'YEAR(tgl)' => date('Y')])->result();
        if (count($dbsaldo) > 0) {
            $out['status'] = "Jurnal Penyusutan " . bulan(date('m')) . " " . date('Y') . " Sudah Ada";
        } else {

            $db = $this->M_Jurnal_onuse->Select_penyusutan();
            for ($i = 0; $i < count($db); $i++) {
                if ($db[$i]->penyesuaian == 1) {
                    $masa = 1;
                } else {
                    $masa = $db[$i]->masa;
                }
                $tgl = date('d-m-Y', strtotime($db[$i]->tgl));
                $harga = $db[$i]->harga;
                if ($masa == 0) {
                    $hargapenyusutan = round($harga, 2);
                } else {

                    $hargapenyusutan = round($harga / $masa, 2);
                }

                $tanggal = date('Y-m-d');
                // $tanggal = '2024-11-30';
                $tgl1 = strtotime($db[$i]->tgl_penyusutan);

                $tgl2 = strtotime($tanggal);
                $dateAwal = new DateTime($db[$i]->tgl_penyusutan);
                $dateAkhir = new DateTime($tanggal);

                // Hitung selisih awal menggunakan date_diff()
                $selisihAwal = date_diff($dateAwal, $dateAkhir);

                // Jika tanggal di bulan kedua lebih besar dari 15, tambahkan satu bulan
                $nowmonth = (date("m", $tgl2) . '-15'); //format bulan 

                if ((date('d', $tgl1)) > 15) {
                    $selisih = $selisihAwal->y * 12 + $selisihAwal->m;
                } else if ((date('d', $tgl1)) <= 15) {
                    if (date('m', $tgl1) == 12) {
                        $selisih = $selisihAwal->y * 12 + $selisihAwal->m;
                    } else {
                        $selisih = $selisihAwal->y * 12 + $selisihAwal->m + 1;
                    }
                } else {
                    $selisih = $selisihAwal->y * 12 + $selisihAwal->m + 1;
                }
                // echo $nama . " : " . $selisih . '<br>';

                if ($selisih < $masa) {
                    $hargapenyusutan = $hargapenyusutan;
                } else if ($selisih == $masa  && (date('m-d', $tgl1)) <= $nowmonth) {
                    $hargapenyusutan = 0;
                } else {
                    $hargapenyusutan = 0;
                }

                if ($dateAwal->format('Y') !== $dateAkhir->format('Y')) {
                    $firstDayOfYear = new DateTime($dateAkhir->format('Y') . '-01-01');

                    // Hitung selisih awal menggunakan date_diff()
                    $selisihBeban = date_diff($firstDayOfYear, $dateAkhir);
                    $selisihBeban = $selisihBeban->m + 1;
                } else {
                    if ((date('m-d', $tgl1)) > $nowmonth) {
                        $selisihBeban = $selisihAwal->y * 12 + $selisihAwal->m;
                    } else if ((date('m-d', $tgl1)) <= $nowmonth) {
                        $selisihBeban = $selisihAwal->y * 12 + $selisihAwal->m + 1;
                    } else {
                        $selisihBeban = $selisihAwal->y * 12 + $selisihAwal->m;
                    }
                }
                // echo  $nama . " : " .$selisihBeban . '<br>';


                $hargabeban = $hargapenyusutan * $selisihBeban;

                $hargaakumulasi = $hargapenyusutan * $selisih;

                if ($hargaakumulasi == 0 && $masa != 0) {
                    $akumulasi = $harga;
                } else if ($masa == 0) {
                    $akumulasi = 0;
                } else {
                    $akumulasi = $hargaakumulasi;
                }
                $harganilai = $harga - $akumulasi;

                // if ($harganilai <= 0  || $selisih > $masa) {
                //     $nilai = 0;
                // } else {
                $nilai = $harganilai;
                // }

                $data = array(
                    'id' => $db[$i]->id,
                    'no_asset' => $db[$i]->no_asset,
                    'jenis' => $db[$i]->jenis_asset,
                    'harga_penyusutan' => $hargapenyusutan,
                    'akumulasi' => $akumulasi,
                    'nilai_buku' => $nilai,
                    'tgl' => $tanggal,
                );

                $this->db->replace('rekap_asset', $data);
                // $this->M_Kasir->insert_tindakan($data, 'rekap_asset');

            }

            $page_data = $this->M_Jurnal_onuse->SelectJurnalPenyusutan();

            $maxR = $this->M_Jurnal_keuangan->selectNoDokumenPau('304', $tanggal)->max;
            $noValidR =  sprintf('%04d', $maxR + 1, 'dyhtdyu');
            $noDokR = $noValidR . "/" . "GL-304" . "/" . date('my', $tgl2);
            $pk = 'N01PAU' . date('my', $tgl2) . $noValidR;

            $id_fk = implode("", [uniqid(), $staff->username]);
            for ($j = 0; $j < count($page_data); $j++) {
                $arr = explode(".", $page_data[$j]->coa_debit);

                $jurnal_penyusutan = [
                    'id_fk' => $id_fk,
                    'jk' => '15',
                    'rekening' => $page_data[$j]->coa_debit,
                    'deskripsi' => 'Biaya Penyusutan & Amortisasi = ' . $page_data[$j]->jenis . ' = ' . bulan_kecil(date('m', $tgl2)) . ' ' . date('Y', $tgl2),
                    'no_jurnal' => $noDokR,
                    'kredit' => 0,
                    'debet' => $page_data[$j]->total,
                    'lap' => lap,
                    'jb' => $arr[2],
                    'cj' => '101',
                    'pk' => date('my', $tgl2),
                    'tgl' => $tanggal,
                    'des_rek' => 'Biaya Penyusutan & Amortisasi = ' . $page_data[$j]->jenis . ' = ' . bulan_kecil(date('m', $tgl2)) . ' ' . date('Y', $tgl2),
                    'staff' => $staff->nama

                ];
                $this->M_Kasir->insert_tindakan($jurnal_penyusutan, 'jurnal_penyusutan');

                $jurnal_akumulasi_penyusutan = [

                    'id_fk' => $id_fk,
                    'jk' => '15',
                    'rekening' => $page_data[$j]->coa_kredit,
                    'deskripsi' => 'Penyusutan = ' . $page_data[$j]->jenis . ' = ' . bulan_kecil(date('m', $tgl2)) . ' ' . date('Y', $tgl2),
                    'no_jurnal' => $noDokR,
                    'kredit' =>  $page_data[$j]->total,
                    'debet' => 0,
                    'lap' => lap,
                    'jb' => '',
                    'cj' => '101',
                    'pk' =>  date('my', $tgl2),
                    'tgl' => $tanggal,
                    'des_rek' => 'Penyusutan = ' . $page_data[$j]->jenis . ' = ' . bulan_kecil(date('m', $tgl2)) . ' ' . date('Y', $tgl2),
                    'staff' => $staff->nama,

                ];


                $this->M_Kasir->insert_tindakan($jurnal_akumulasi_penyusutan, 'jurnal_akumulasi_penyusutan');
            }

            $dokumen = ['no_dokumen' => $noDokR, 'no_index' => $maxR + 1, 'kode' => '304', 'tgl' => $tanggal, 'staff' => $staff->nama];
            $this->M_Kasir->insert_tindakan($dokumen, 'dokumen_jurnal');
            // $db_jurnal = $this->M_Jurnal_onuse->selectJurnalAkumulasiPenyusutan($id_fk);
            // // var_dump($db_jurnal);




            // $this->M_Kasir->update_tindakan(['status' => 1], ['id_fk' => $db_jurnal->id_fk], 'jurnal_ijd');

            $out['status'] = 'success';
        }
        echo json_encode($out);
    }
    function hapus_jurnal()
    {
        $id_faktur = $this->input->post('id_faktur');
        $this->M_Kasir->delete_tindakan(['no_jurnal' => $id_faktur], 'jurnal_akumulasi_penyusutan');
        $this->M_Kasir->delete_tindakan(['no_jurnal' => $id_faktur], 'jurnal_penyusutan');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function tampil_jurnal_penyusutan()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        // if ($first_date != '' || $second_date != '') {
        //     $page_data = $this->M_Keuangan_ijd->SelectLaporanIjd($first_date, $second_date);
        // } else {
        $page_data = $this->M_Jurnal_onuse->SelectLaporanJurnalPenyusutan();
        // }


        for ($i = 0; $i < count($page_data); $i++) {
            $tgl = indo_date2($page_data[$i]->tgl);
            $bulan = str_split(date('m', strtotime($page_data[$i]->tgl)));
            $periode = bulan_kecil(date('m', strtotime($page_data[$i]->tgl))) . ' ' . date('Y', strtotime($tgl));

            $no = $i + 1;


            $no_jurnal = $page_data[$i]->no_jurnal;
            $total = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $pk = $page_data[$i]->pk;
            $id_fk = $page_data[$i]->id_fk;
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='cetak(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\",\"" .  $id_fk . "\")' '><i class='icon-printer '></i></button>";
            $delete =
                "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_jurnal(\"" . $no_jurnal . "\")' '><i class='fa fa-trash '></i></button>";

            $out[$i] = array($no, $cetak, $tgl, $no_jurnal, $total, $staff, $delete);
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
    public function cetak_jurnal_penyusutan()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $id_fk = $this->input->post('id_fk');
        $page_data['tgl'] = $this->input->post('tgl');
        $page_data['staff'] = $this->input->post('staff');
        $page_data['jk'] = $this->input->post('jk');
        $page_data['no_jurnal'] = $no_jurnal;
        $page_data['judul'] = 'JURNAL PENYUSUTAN';
        $page_data['data'] = $this->M_Jurnal_onuse->getJurnalPenyusutan($id_fk);
        $page_data['staff_verifikasi'] = "";
        $response = $this->load->view('jurnal_print/cetak_jurnal', $page_data, TRUE);
        echo $response;
    }



    //////////////////////////////////JURNAL MATERIAL/////////////////////////////////////////////////////////////////

    public function Jurnal_material()
    {
        $this->load->view('assets/_header');
        $page_data['tipe'] = 'hutang';
        $page_data['page_content'] = 'Jurnal/Jurnal_material';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Laporan_jurnal_material()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Laporan_jurnal';
        $page_data['judul'] = 'LAPORAN JURNAL MATERIAL';
        $page_data['url_tabel'] = 'Jurnal_onuse/tampil_laporan_jurnal_material';
        $page_data['url_cetak'] = 'Jurnal_onuse/cetak_jurnal_material';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_laporan_jurnal_material()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_Jurnal_onuse->SelectRangeLaporanMaterial($first_date, $second_date);
        } else {
            $page_data = $this->M_Jurnal_onuse->SelectRangeLaporanMaterial($tgl, $tgl);
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

    public function cetak_jurnal_material()
    {
        $no_jurnal = $this->input->post('no_jurnal');
        $page_data['tgl'] = $this->input->post('tgl');
        $page_data['staff'] = $this->input->post('staff');
        $page_data['jk'] = $this->input->post('jk');
        $page_data['no_jurnal'] = $no_jurnal;
        $page_data['judul'] = 'JURNAL MATERIAL';

        // $page_data['verif'] = $this->db->get_where('jurnal_cara_pembayaran', ['no_jurnal' => $no_jurnal])->row();
        $page_data['data'] = $this->M_Jurnal_onuse->getMaterial($no_jurnal);
        $page_data['staff_verifikasi'] = "";

        $response = $this->load->view('jurnal_print/cetak_jurnal', $page_data, TRUE);
        echo $response;
    }
    public function update()
    {
        $page_data = $this->M_Jurnal_keuangan->get_jurnal_pendapatan_bypelayanan();

        for ($i = 0; $i < count($page_data); $i++) {
            jurnal_material($page_data[$i]->id_pelayanan);
        }
        echo "selesai";
    }
}
