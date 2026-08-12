<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logistik_farmasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'IND');
        $this->load->model('M_Logistik_farmasi');
        $this->load->model('M_Apotik');
        $this->load->model('M_Stok_obat_ok');
    }

    // Laporan mutasi
    public function Laporan_mutasi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_mutasi_farmasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_mutasi()
    {
        $staff = $this->session->userdata('data_auth');

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Logistik_farmasi->selectRangeLaporanmutasiFarmasi($mulai, $akhir);
        } else {
            $page_data = $this->M_Logistik_farmasi->selectLaporanmutasiFarmasi();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $id_logistik = $page_data[$i]->id_logistik;

            $satuan_terkecil = $page_data[$i]->satuan_terkecil;
            $jenis = $page_data[$i]->ket;
            $nama = $page_data[$i]->nama;
            $standar = $page_data[$i]->standar;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $jml_terima = abs($page_data[$i]->jml_terima);
            $zat_adiktif = $page_data[$i]->zat_adiktif;
            $high_alert = $page_data[$i]->high_alert;
            $produsen = $page_data[$i]->produsen;
            $harga_cost = $page_data[$i]->harga_cost;
            $hargappn = $page_data[$i]->harga_cost * 1.11;
            $hargappn = intval($hargappn);
            $total = $hargappn * $jml_terima;

            $time = strtotime($page_data[$i]->tgl_res);
            $tgl = strftime("%d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $tgl_exp = indo_date2($page_data[$i]->kadaluarsa);
            // if ($tipe == "FAKTUR") {
            //     $id_req = str_replace("F_", "", $page_data[$i]->id_struk);
            //     $no_faktur = $this->M_Logistik_farmasi->getNoFaktur($id_req);
            //     $ket = $no_faktur['no_faktur'];
            // } else if ($tipe == "PENJUALAN") {
            //     $data_pasien =  $this->M_Logistik_farmasi->getPasienByReq($page_data[$i]->id_struk);
            //     if (count($data_pasien->result()) > 0) {
            //         $ket = $data_pasien->row()->nama;
            //     } else {
            //         $ket = 'BATAL BEROBAT';
            //     }
            // }  else if ($jenis == "MUTASI") {
            //     $indeks =  $this->M_Logistik_farmasi->getNoPSN($page_data[$i]->id_struk);
            //     if (count($indeks->result()) > 0) {
            //         if (strlen($indeks->row()->indeks) >= 6) {
            //             $ket = "PSN-" . $indeks->row()->indeks;
            //         } else {
            //             $ket =  "PSN-" . sprintf('%06d', $indeks->row()->indeks);
            //         }
            //     } else {
            //         $ket = '-';
            //     }
            // }  else {
            //     $ket = '-';
            // }

            if ($tipe == "BASE") {
                $tipe = "STOK OPNAME";
            } else if ($tipe == "apotik") {
                $tipe = "DEPO RAJAL";
            } else if ($tipe == "deporanap") {
                $tipe = "DEPO RANAP";
            } else if ($tipe == "labor" || $tipe == "laboratorium") {
                $tipe = "LABORATORIUM";
            } else if ($tipe == "ok") {
                $tipe = "KAMAR OPERASI";
            } else if ($tipe == "rawatinap") {
            } else if ($tipe == "rawatjalan") {
                $tipe = "RAWAT JALAN";
            } else {
                $tipe = strtoupper($tipe);
            }



            $diskon = $this->db->query("SELECT diskon_rs from detail_struk 
                 where id_logistik ='$id_logistik' ORDER BY ABS(DATEDIFF(tgl_input, NOW())) ASC limit 1");

            $nilaidiskon = (count($diskon->result()) > 0) ? round(($diskon->row()->diskon_rs / 100), 2) : 0;
            $hnadiskon = round($harga_cost * (1 - $nilaidiskon));
            $out[$i] = array($no, $id_logistik, $jenis, $nama, $produsen, $satuan_terkecil, $harga_cost, $hargappn, $nilaidiskon, $hnadiskon, $tipe, $jml_terima, $total, $tgl, $waktu, $zat_adiktif, $high_alert, $golongan_obat, $standar, $kode, $tgl_exp);
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


    // End

    // Laporan kartu stok

    public function Laporan_stok()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        if ($perequest == "apotik") {
            $stok = "stok_apotik";
        } else if ($perequest == "logistik farmasi") {
            $stok = "stok_logistik";
        } else if ($perequest == "deporanap") {
            $stok = "stok_depo";
        }
        $this->load->view('assets/_header');
        $page_data['obat'] = $this->M_Logistik_farmasi->selectStok($stok);
        $page_data['page_content'] = 'page_content/Laporan_kartu_stok';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function Tampil_laporan_stok()
    {
        $tgl = date("Y-m-d");
        $id_logistik = $this->input->post('id_logistik');
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $out = null;

        if ($this->input->post('awal') && $this->input->post('akhir') && $this->input->post('id_logistik')) {

            $page_data = $this->M_Logistik_farmasi->selectLaporanStok($awal, $akhir, $id_logistik);


            for ($i = 0; $i < count($page_data); $i++) {
                $no = $i + 1;
                $staff = $page_data[$i]->staff;
                $jenis = $page_data[$i]->ket;
                $nama = $page_data[$i]->nama;
                $tipe = $page_data[$i]->tipe;

                $awal = ($page_data[$i]->awal);
                $masuk = ($page_data[$i]->masuk);
                $keluar = ($page_data[$i]->keluar);
                $saldo = intval($page_data[$i]->saldo);



                $time = strtotime($page_data[$i]->tgl_res);
                $tgl = strftime("%d %B %Y", $time);
                $waktu = strftime("%H:%M WIB", $time);
                $tgl = $tgl . ' ' . $waktu;
                if ($jenis == "MUTASI") {
                    $psn =  $this->M_Logistik_farmasi->getPSN($page_data[$i]->id_struk);
                    $ket = !empty($psn) ? "PSN-" . $psn->indeks : 'PSN hilang';
                } else {
                    if ($tipe == "FAKTUR") {
                        $id_req = str_replace("F_", "", $page_data[$i]->id_struk);
                        $no_faktur = $this->M_Logistik_farmasi->getNoFaktur($id_req);
                        $ket = isset($no_faktur['no_faktur']) ? $no_faktur['no_faktur'] : "";
                    } else if ($tipe == "PENJUALAN" || $tipe == "RETUR") {
                        $data_pasien =  $this->M_Logistik_farmasi->getPasienByReq($page_data[$i]->id_struk);
                        if (count($data_pasien->result()) > 0) {
                            $ket = $data_pasien->row()->nama . $data_pasien->row()->dokter;
                        } else {
                            $ket = 'BATAL BEROBAT';
                        }
                    } else {
                        $ket = '-';
                    }
                }

                if ($tipe == "BASE") {
                    $tipe = "STOK OPNAME";
                } else if ($tipe == "apotik") {
                    $tipe = "DEPO RAJAL";
                } else if ($tipe == "deporanap") {
                    $tipe = "DEPO RANAP";
                } else if ($tipe == "labor" || $tipe == "laboratorium") {
                    $tipe = "LABORATORIUM";
                } else if ($tipe == "ok") {
                    $tipe = "KAMAR OPERASI";
                } else if ($tipe == "rawatinap") {
                } else if ($tipe == "rawatjalan") {
                    $tipe = "RAWAT JALAN";
                } else {
                    $tipe = strtoupper($tipe);
                }


                $out[$i] = array($no, $tgl, $nama, $awal, $masuk, $keluar, $saldo, $tipe, $ket, $staff);
            }
        } else {
            $out = null;
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



    //Pengeluaran Obat
    public function Pengeluaran_obat()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pengeluaran_obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_pengeluaran_obat()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Logistik_farmasi->selectRangePengeluaranObat($mulai, $akhir);
        } else {
            $page_data = $this->M_Logistik_farmasi->selectPengeluaranObat();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $id_logistik = $page_data[$i]->id_logistik;
            $nama = $page_data[$i]->nama;
            $stok = abs($page_data[$i]->stok);


            $tujuan = $page_data[$i]->asal_tujuan;


            $out[$i] = array($no, $id_logistik, $nama, $stok);
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

    //END


    //Laporan Pembelian
    public function Laporan_pembelian()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pembelian_farmasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pembelian()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Logistik_farmasi->selectRangeLaporanPembelian($mulai, $akhir);
        } else {
            $page_data = $this->M_Logistik_farmasi->selectLaporanPembelian();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $id_logistik = $page_data[$i]->id_logistik;
            $no = " " . $page_data[$i]->no_faktur;
            $kode = $page_data[$i]->kode;
            $standar = $page_data[$i]->standar;
            $nama_produsen = $page_data[$i]->nama_produsen;
            // $vendor = $page_data[$i]->vendor;
            $nama = $page_data[$i]->nama;
            // $tanggal_buat = $page_data[$i]->tanggal_buat;
            // $jam_buat = $page_data[$i]->jam_buat;
            $no_batch = $page_data[$i]->no_batch;
            $id_prod_obat = $page_data[$i]->id_prod_obat;
            $tipe = $page_data[$i]->tipe;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $frek = $page_data[$i]->frek;
            $harga_beli = intval($page_data[$i]->harga_beli);
            $diskon = $page_data[$i]->diskon_rs / 100;
            $disc = number_format($diskon * $harga_beli * $frek, 0, ',', ',');
            $ppn = $page_data[$i]->ppn;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $total = number_format($harga_beli * $frek, 0, ',', ',');
            $time = strtotime($page_data[$i]->tgl_input);
            $time1 = strtotime($page_data[$i]->tgl_buat);
            $waktu = strftime("%H:%M WIB", $time1);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $tgl = strftime("%d-%m-%Y", $time);
            $tgl_po = indo_date2($page_data[$i]->tgl_po);
            $kadaluarsa = indo_date2($page_data[$i]->kadaluarsa);


            $noValid =  sprintf('%04d', $page_data[$i]->index_dok, 'dyhtdyu');
            $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($page_data[$i]->tgl_buat))) . "/" . date("Y", strtotime($page_data[$i]->tgl_buat));
            $out[$i] = array($id_logistik, $no, $kode, $standar, $nama_produsen, $nama, $no_batch, $noDok, $no_dokumen, $id_prod_obat, $tipe, $golongan_obat, $frek,  $frek, $frek - $frek, $harga_beli, $diskon, $disc, $ppn, $total, $kadaluarsa, $tgl, $waktu, $tgl_po);
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



    //END
    //Laporan Pembelian
    public function Laporan_pembelian_pebal()
    {
        $this->load->view('assets/_header');
        $page_data['judul'] = 'PEMBELIAN PEBAL';
        $page_data['url'] = 'Logistik_farmasi/Tampil_laporan_pembelian_pebal';
        $page_data['page_content'] = 'page_content/Laporan_pembelian_farmasi_pebal';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pembelian_pebal()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Logistik_farmasi->selectRangeLaporanPembelianPebal($mulai, $akhir, 'PEBAL');
        } else {
            $page_data = $this->M_Logistik_farmasi->selectLaporanPembelianPebal('PEBAL');
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $id_logistik = $page_data[$i]->id_logistik;
            $no = " " . $page_data[$i]->no_faktur;
            $kode = $page_data[$i]->kode;
            $standar = $page_data[$i]->standar;
            $distributor = $page_data[$i]->id_produsen;
            $nama = $page_data[$i]->nama;
            $no_batch = $page_data[$i]->no_batch;
            $zat_aktif = $page_data[$i]->zat_aktif;
            $nama_produsen = $page_data[$i]->nama_produsen;
            $tipe = $page_data[$i]->tipe;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $frek = $page_data[$i]->frek;
            $harga_beli = $page_data[$i]->harga_beli;
            $diskon = $page_data[$i]->diskon_rs;
            $disc = $diskon / 100 * $harga_beli * $frek;
            $ppn = $page_data[$i]->ppn;
            $total = $harga_beli * $frek;
            $total = round(($harga_beli * (1 + $ppn / 100)) * $frek, 2);
            // $total = $page_data[$i]->total;
            $time = strtotime($page_data[$i]->tgl_input);
            $tgl = strftime(" %d %B %Y", $time);
            $out[$i] = array($id_logistik, $no, $kode, $standar, $distributor, $nama, $no_batch, $nama_produsen, $tipe, $golongan_obat, $zat_aktif, $frek,  $frek, $frek - $frek, $harga_beli, $diskon, $disc, $ppn, $total, $tgl);
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

    //Laporan Pembelian
    public function Laporan_pembelian_hibah()
    {
        $this->load->view('assets/_header');
        $page_data['judul'] = 'OBAT HIBAH';
        $page_data['url'] = 'Logistik_farmasi/Tampil_laporan_pembelian_hibah';
        $page_data['page_content'] = 'page_content/Laporan_pembelian_farmasi_pebal';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pembelian_hibah()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Logistik_farmasi->selectRangeLaporanPembelianHibah($mulai, $akhir);
        } else {
            $tgl = date('Y-m-d');
            $page_data = $this->M_Logistik_farmasi->selectRangeLaporanPembelianHibah($tgl, $tgl);
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $id_logistik = $page_data[$i]->id_logistik;
            $no = " " . $page_data[$i]->no_faktur;
            $kode = $page_data[$i]->kode;
            $standar = $page_data[$i]->standar;
            $distributor = $page_data[$i]->id_produsen;
            $nama = $page_data[$i]->nama;
            $no_batch = $page_data[$i]->no_batch;
            $zat_aktif = $page_data[$i]->zat_aktif;
            $nama_produsen = $page_data[$i]->nama_produsen;
            $tipe = $page_data[$i]->tipe;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $frek = $page_data[$i]->frek;
            $harga_beli = $page_data[$i]->harga_beli;
            $diskon = $page_data[$i]->diskon_rs;
            $disc = $diskon / 100 * $harga_beli * $frek;
            $ppn = $page_data[$i]->ppn;
            $total = $harga_beli * $frek;
            $total = round(($harga_beli * (1 + $ppn / 100)) * $frek, 2);
            // $total = $page_data[$i]->total;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime(" %d %B %Y", $time);
            $out[$i] = array($id_logistik, $no, $kode, $standar, $distributor, $nama, $no_batch, $nama_produsen, $tipe, $golongan_obat, $zat_aktif, $frek,  $frek, $frek - $frek, $harga_beli, $diskon, $disc, $ppn, $total, $tgl);
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


    //END
    //Laporan Pembelian Obat Kundur
    public function Laporan_po_kundur()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_po_kundur';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_po_kundur()
    {
        $page_data = $this->M_Logistik_farmasi->selectLaporanPoKundur();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $button = "<div class='btn btn-success btn-icon-anim btn-square' onclick='tampilPermintaanObat(\"" . $page_data[$i]->id_req . "\")'><i class='icon-pencil'></i></div>";

            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $status = $page_data[$i]->status;

            $out[$i] = array($no, $button, $tgl, $waktu, $status);
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

    public function tampil_list_tindakan()
    {
        $id_req = $this->input->post('id_req');
        $page_data = $this->M_Logistik_farmasi->selectTindakanById($id_req);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $jml_terima = $page_data[$i]->jml_terima;
            $harga_cost = $page_data[$i]->harga_cost;
            $total = $harga_cost * $jml_terima;
            $out[$i] = array($no, $nama, $tipe, $jml_terima, $harga_cost, $total);
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
    public function getHarga()
    {
        $id_req = $this->input->post('id_req');
        $db = $this->M_Logistik_farmasi->getTotal($id_req);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    //END
    public function Laporan_Cetak_so()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Cetak_so';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    //Laporan Aktif
    public function Laporan_aktif()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_aktif';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function tampil_list_faktur21()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Logistik_farmasi->getDataFaktur21($idFaktur);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            if ($page_data[$i]->status == 1) {
                $hapus =  "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail .  "\")'><i class='icon-trash'></i></a>";
                $status = "<span class='label label-success capitalize-font inline-block'>terpenuhi</span>";
            } else {

                $hapus =  "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail .  "\")'><i class='icon-trash'></i></a>";

                $status = "<span class='label label-danger capitalize-font inline-block'>belum</span>";
            }

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $harga = $page_data[$i]->harga;
            $jumlah = $page_data[$i]->jumlah;
            $diskon = $page_data[$i]->diskon;
            $ppn = $page_data[$i]->ppn;
            $total = $page_data[$i]->total;

            $out[$i] = array($no, $nama, $harga, $jumlah, $diskon, $ppn, $total, $status, $hapus,);
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

    //END

    public function Tampil_cetak_so()
    {
        $page_data = $this->M_Logistik_farmasi->selectCetakSo();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $id_logistik = $page_data[$i]->id_logistik;
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $stok = $page_data[$i]->stok;
            $standar = $page_data[$i]->standar;
            $harga_cost = $page_data[$i]->harga_cost;
            $hargappn = $page_data[$i]->harga_cost * (1 + ($page_data[$i]->ppn / 100));
            $hargappn = intval($hargappn);
            $golongan_obat = $page_data[$i]->golongan_obat;
            $produsen = $page_data[$i]->produsen;

            $diskon = $this->db->query("SELECT diskon_rs from detail_struk 
                 where id_logistik ='$id_logistik' ORDER BY ABS(DATEDIFF(tgl_input, NOW())) ASC limit 1");

            $kadaluarsa = $this->db->query("SELECT (kadaluarsa) exp,tgl_input from detail_struk 
            where id_logistik ='$id_logistik' 
            UNION ALL 
            SELECT (kadaluarsa) exp,tgl_input from detail_struk_bebas
            where id_logistik ='$id_logistik'
            order by tgl_input desc
            ")->row();

            $kadaluarsa_past = $this->db->query("SELECT max(kadaluarsa) exp from stok_logistik 
            where id_logistik ='$id_logistik'")->row();

            $nilaidiskon = (count($diskon->result()) > 0) ? round(($diskon->row()->diskon_rs / 100), 2) : 0;
            $hnadiskon = round($harga_cost * (1 - $nilaidiskon));
            $exp = isset($kadaluarsa->exp) ? date('d-m-Y', strtotime($kadaluarsa->exp)) : (isset($kadaluarsa_past->exp) ? date('d-m-Y', strtotime($kadaluarsa_past->exp)) : '-');

            $out[$i] = array($no, $id_logistik, $nama, $exp, $tipe, $stok, $harga_cost, $nilaidiskon, $hargappn, $hnadiskon, '', $golongan_obat, $produsen, $standar);
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


    //Cetak So IGD
    public function Laporan_Cetak_soApotik()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Cetak_soApotik';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_cetak_soApotik()
    {
        $page_data = $this->M_Logistik_farmasi->selectCetakSoApotik();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $stok = $page_data[$i]->stok;
            $produsen = $page_data[$i]->produsen;

            $out[$i] = array($no, $nama, $tipe, $stok, '', $produsen);
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


    //Riwayat Penarikan
    public function Riwayat_penarikan()
    {
        $this->load->view('assets/_header');
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        $page_data['page_content'] = 'page_content/Riwayat_penarikan';
        //$page_data['unit'] = $this->db->get('admin_logistik_farmasi')->result_array();
        $page_data['unit'] = $this->M_Logistik_farmasi->getUnitPenarikan();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function getObatByUnit()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        $id_unit = $this->input->post('id_unit');
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $id_unit])->row();

        $query = $this->db->query("SELECT sl.id_logistik,l.nama , SUM(sl.frek) stok,produsen FROM `$data_adm->stok` sl, list_logistik l WHERE sl.id_logistik=l.id_logistik GROUP BY sl.id_logistik having stok>0 order by nama ")->result_array();

        $out = $query;
        echo json_encode($out);
    }

    public function getTglExp()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        $id_unit = $this->input->post('id_unit');
        $id_logistik = $this->input->post('id_logistik');
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $id_unit])->row();

        $query = $this->db->query("SELECT sum(s.frek) stok, s.kadaluarsa, l.margin, l.harga_cost,l.id_logistik,l.nama FROM `$data_adm->stok` s, list_logistik l WHERE l.id_logistik=s.id_logistik AND s.id_logistik = '$id_logistik' GROUP BY s.kadaluarsa ORDER BY sum(s.frek)>0")->result_array();

        $out = $query;
        echo json_encode($out);
    }

    public function getObatById()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;

        $id_logistik = $this->input->post('id_logistik');
        if ($tipe == "apotik") {
            $query = $this->db->query("SELECT sum(s.frek) stok, max(s.kadaluarsa) kadaluarsa, l.margin, l.harga_cost,l.id_logistik,l.nama,l.ppn FROM stok_apotik s, list_logistik l WHERE l.id_logistik=s.id_logistik AND s.id_logistik = '$id_logistik'")->row_array();
        } else if ($tipe == "ranapapotik" || $tipe == "deporanap") {
            $query = $this->db->query("SELECT sum(s.frek) stok, max(s.kadaluarsa) kadaluarsa, l.margin, l.harga_cost,l.id_logistik,l.nama,l.ppn FROM stok_depo s, list_logistik l WHERE l.id_logistik=s.id_logistik AND s.id_logistik = '$id_logistik' ")->row_array();
        } else if ($tipe == "logistik farmasi") {
            $query = $this->db->query("SELECT sum(s.frek) stok, max(s.kadaluarsa) kadaluarsa, l.margin, l.harga_cost,l.id_logistik,l.nama,l.ppn FROM stok_logistik s, list_logistik l WHERE l.id_logistik=s.id_logistik AND s.id_logistik = '$id_logistik'")->row_array();
        }
        $out = $query;
        echo json_encode($out);
    }
    public function Tampil_riwayat_penarikan()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Logistik_farmasi->selectRangeRiwayatPenarikanObat($mulai, $akhir);
        } else {
            $page_data = $this->M_Logistik_farmasi->selectRiwayatPenarikanObat();
        }


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            // $button = "<div class='btn btn-success btn-icon-anim btn-square' onclick='tampilDetailRequest(\"".$page_data[$i]->id_req."\")'><i class='icon-rocket'></i></div>";
            $nama = $page_data[$i]->nama;
            $kadaluarsa = $page_data[$i]->kadaluarsa;

            $tgl = $page_data[$i]->tgl;
            $asal_tujuan = $page_data[$i]->asal_tujuan;
            $frek = $page_data[$i]->frek;
            $staff = $page_data[$i]->staff;
            // if($page_data[$i]->status =="DIAJUKAN"){
            //     $status= "<span class='label label-info'>DIAJUKAN</span>";
            // }else if($page_data[$i]->status =="DITOLAK"){
            //     $status= "<span class='label label-danger'>DITOLAK</span>";
            // }else if($page_data[$i]->status =="DITERIMA"){
            //     $status= "<span class='label label-success'>DITERIMA</span>";
            // }
            // $keterangan = $page_data[$i]->keterangan;
            // if($page_data[$i]->status !="DIAJUKAN" || $getStok < $page_data[$i]->jml_req){
            //     $terima = "-";
            // }else{
            //     $terima = "<div class='btn btn-success btn-icon-anim btn-square' onclick='terimaLangsung(\"".$page_data[$i]->id_req. "\",\"".$page_data[$i]->tipe."\",\"".$page_data[$i]->id_logistik. "\" )'><i class='icon-like '></i></div>";
            // }
            // if($page_data[$i]->status !="DIAJUKAN"){
            //     $respon = "-";
            // }else{
            $respon = "<div class='btn btn-danger btn-icon-anim btn-square' 
                onclick='hapus(\"" . $page_data[$i]->id_stok . "\" )'>
                <i class='icon-trash '></i></div>";
            // }
            $out[$i] = array($no, $nama, $kadaluarsa, $tgl, $asal_tujuan, $frek, $staff, $respon);
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



    public function insertPenarikan()
    {
        $data_staff = $this->session->userdata('data_auth');
        $nama_unit = $this->input->post('nama_unit');
        $id_logistik = $this->input->post('id_logistik');
        $jumlah_penarikan = $this->input->post('jumlah_penarikan');
        $tgl_exp = $this->input->post('tgl_kadaluarsa');
        $now = new DateTime();
        $id_req = uniqid();
        $tgl =  date("Y-m-d H:i:s");
        if ($data_staff->tipe == "logistik farmasi") {
            if ($nama_unit == "apotik") {
                $obat = $this->M_Apotik->getSumObatApotik($id_logistik);

                $stok_penarikan = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'PENARIKAN',
                    'frek' => $jumlah_penarikan * -1,
                    'saldo' => $obat['stok'] + ($jumlah_penarikan * -1),
                    'kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
                    'asal_tujuan' => 'Logistik',
                    'id_req' => 'T_' . $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
            } else if ($nama_unit == "deporanap") {
                $obat = $this->M_Apotik->getSumObatRanap($id_logistik);

                $stok_penarikan = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'PENARIKAN',
                    'frek' => $jumlah_penarikan * -1,
                    'saldo' => $obat['stok'] + ($jumlah_penarikan * -1),
                    'kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
                    'asal_tujuan' => 'Logistik',
                    'id_req' => 'T_' . $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
            } else {
                $stok_penarikan = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'PENARIKAN',
                    'frek' => $jumlah_penarikan * -1,
                    'kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
                    'asal_tujuan' => 'Logistik',
                    'id_req' => 'T_' . $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
            }

            $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaan($id_logistik)->stok;

            $stok_logistik = array(
                'id_stok' => uniqid(),
                'id_logistik' => $id_logistik,
                'tgl' => $now->format('Y-m-d H:i:s'),
                'keterangan' => 'STOK DARI PENARIKAN',
                'frek' => $jumlah_penarikan,
                'saldo' => $getStok + ($jumlah_penarikan),
                'kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
                'asal_tujuan' => $nama_unit,
                'id_struk' => 'T_' . $id_req,
                'id_staff' => $data_staff->id_staff,
            );
            $this->M_Logistik_farmasi->insertStok($stok_logistik, 'stok_logistik');

            $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $nama_unit])->row();

            $this->M_Logistik_farmasi->insertStok($stok_penarikan, $data_adm->stok);

            $out['status'] = "success";
            echo json_encode($out);
        } else {
            $stok_penarikan = array(
                'id_stok' => uniqid(),
                'id_logistik' => $id_logistik,
                'tgl' => $now->format('Y-m-d H:i:s'),
                'keterangan' => 'PENARIKAN',
                'frek' => $jumlah_penarikan * -1,
                'kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
                'asal_tujuan' => $data_staff->tipe,
                'id_req' => 'T_' . $id_req,
                'id_staff' => $data_staff->id_staff,
            );
            $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $nama_unit])->row();

            $this->M_Logistik_farmasi->insertStok($stok_penarikan, $data_adm->stok);

            if ($data_staff->tipe == "apotik") {
                $obat = $this->M_Apotik->getSumObatApotik($id_logistik);

                $stok_depo = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'STOK DARI PENARIKAN',
                    'frek' => $jumlah_penarikan * 1,
                    'saldo' => $obat['stok'] + ($jumlah_penarikan),
                    'kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
                    'asal_tujuan' => $nama_unit,
                    'id_req' => 'T_' . $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
                $this->M_Logistik_farmasi->insertStok($stok_depo, 'stok_apotik');
                $this->M_Apotik->update_perencanaan($id_logistik, 'stok_apotik', 'pr_apotik');
            } else if ($data_staff->tipe == "deporanap") {
                $obat = $this->M_Apotik->getSumObatRanap($id_logistik);

                $stok_depo = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'STOK DARI PENARIKAN',
                    'frek' => $jumlah_penarikan * 1,
                    'saldo' => $obat['stok'] + ($jumlah_penarikan),
                    'kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
                    'asal_tujuan' => $nama_unit,
                    'id_req' => 'T_' . $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
                $this->M_Logistik_farmasi->insertStok($stok_depo, 'stok_depo');
                $this->M_Apotik->update_perencanaan($id_logistik, 'stok_depo', 'pr_depo');
            }
            $out['status'] = "success";
            echo json_encode($out);
        }
    }

    public function hapus_penarikan()
    {
        $data_staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_faktur');

        $now = new DateTime();
        $tgl =  date("Y-m-d H:i:s");
        $data_adm1 = $this->db->get_where('admin_logistik_farmasi', ['unit' => $data_staff->tipe])->row();
        $data_tarik = $this->db->get_where($data_adm1->stok, ['id_stok' => $id])->row();
        $nama_unit = $data_tarik->asal_tujuan;
        $id_logistik = $data_tarik->id_logistik;
        $jumlah_penarikan = $data_tarik->frek;
        $exp = $data_tarik->kadaluarsa;
        $id_req =  ($data_staff->tipe == "logistik farmasi") ? $data_tarik->id_struk : $data_tarik->id_req;

        if ($data_staff->tipe == "logistik farmasi") {

            if ($data_tarik == "apotik") {
                $obat = $this->M_Apotik->getSumObatApotik($id_logistik);

                $stok_penarikan = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'BATAL PENARIKAN',
                    'frek' => $jumlah_penarikan,
                    'saldo' => $obat['stok'] + ($jumlah_penarikan),
                    'kadaluarsa' => $exp,
                    'asal_tujuan' => 'Logistik',
                    'id_req' =>  $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
            } else if ($nama_unit == "deporanap") {
                $obat = $this->M_Apotik->getSumObatRanap($id_logistik);

                $stok_penarikan = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'BATAL PENARIKAN',
                    'frek' => $jumlah_penarikan,
                    'saldo' => $obat['stok'] + ($jumlah_penarikan),
                    'kadaluarsa' => $exp,
                    'asal_tujuan' => 'Logistik',
                    'id_req' =>  $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
            } else {
                $stok_penarikan = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'BATAL PENARIKAN',
                    'frek' => $jumlah_penarikan,
                    'kadaluarsa' => $exp,
                    'asal_tujuan' => 'Logistik',
                    'id_req' => $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
            }

            $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaan($id_logistik)->stok;

            $stok_logistik = array(
                'id_stok' => uniqid(),
                'id_logistik' => $id_logistik,
                'tgl' => $now->format('Y-m-d H:i:s'),
                'keterangan' => 'BATAL PENARIKAN',
                'frek' => $jumlah_penarikan * -1,
                'saldo' => $getStok + ($jumlah_penarikan * -1),
                'kadaluarsa' => $exp,
                'asal_tujuan' => $nama_unit,
                'id_struk' =>  $id_req,
                'id_staff' => $data_staff->id_staff,
            );
            $this->M_Logistik_farmasi->insertStok($stok_logistik, 'stok_logistik');

            $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $nama_unit])->row();


            $this->M_Logistik_farmasi->insertStok($stok_penarikan, $data_adm->stok);
            if ($data_tarik == "apotik") {
                $this->M_Apotik->update_perencanaan($id_logistik, 'stok_apotik', 'pr_apotik');
            } else if ($data_staff->tipe == "deporanap") {
                $this->M_Apotik->update_perencanaan($id_logistik, 'stok_depo', 'pr_depo');
            }

            $out['status'] = "success";
            echo json_encode($out);
        } else {
            $stok_penarikan = array(
                'id_stok' => uniqid(),
                'id_logistik' => $id_logistik,
                'tgl' => $now->format('Y-m-d H:i:s'),
                'keterangan' => 'BATAL PENARIKAN',
                'frek' => $jumlah_penarikan,
                'kadaluarsa' => $exp,
                'asal_tujuan' => $data_staff->tipe,
                'id_req' => $id_req,
                'id_staff' => $data_staff->id_staff,
            );
            $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $nama_unit])->row();

            $this->M_Logistik_farmasi->insertStok($stok_penarikan, $data_adm->stok);

            if ($data_staff->tipe == "apotik") {
                $obat = $this->M_Apotik->getSumObatApotik($id_logistik);

                $stok_depo = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'BATAL PENARIKAN',
                    'frek' => $jumlah_penarikan * -1,
                    'saldo' => $obat['stok'] + ($jumlah_penarikan * -1),
                    'kadaluarsa' => $exp,
                    'asal_tujuan' => $nama_unit,
                    'id_req' => $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
                $this->M_Logistik_farmasi->insertStok($stok_depo, 'stok_apotik');
                $this->M_Apotik->update_perencanaan($id_logistik, 'stok_apotik', 'pr_apotik');
            } else if ($data_staff->tipe == "deporanap") {
                $obat = $this->M_Apotik->getSumObatRanap($id_logistik);

                $stok_depo = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'BATAL PENARIKAN',
                    'frek' => $jumlah_penarikan * -1,
                    'saldo' => $obat['stok'] + ($jumlah_penarikan * -1),
                    'kadaluarsa' => $exp,
                    'asal_tujuan' => $nama_unit,
                    'id_req' => $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
                $this->M_Logistik_farmasi->insertStok($stok_depo, 'stok_depo');
                $this->M_Apotik->update_perencanaan($id_logistik, 'stok_depo', 'pr_depo');
            }
            $out['status'] = "success";
            echo json_encode($out);
        }
    }


    //Riwayat Permintaan Obat
    public function Riwayat_permintaan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_permintaan_obat_farmasi_logistik';
        //$page_data['obat'] = $this->db->query("SELECT l.id_logistik,l.nama,l.produsen FROM stok_logistik s, list_logistik l WHERE l.id_logistik=s.id_logistik group by l.id_logistik")->result_array();
        $page_data['obat'] = $this->db->get('list_logistik')->result_array();

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    //Riwayat Permintaan Obat Farmasi
    public function Riwayat_permintaanFarmasi()
    {
        $staf = $this->session->userdata('data_auth');
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_permintaan_obat_farmasi';

        // if($staf->tipe ="apotik"){
        //     $page_data['obat'] = $this->db->query("SELECT l.id_logistik,l.nama,l.produsen FROM stok_apotik s, list_logistik l WHERE l.id_logistik=s.id_logistik group by l.id_logistik")->result_array();

        // }else if($staf->tipe ="deporanap"){
        //     $page_data['obat'] = $this->db->query("SELECT l.id_logistik,l.nama,l.produsen FROM list_logistik l left join stok_depo s on l.id_logistik=s.id_logistik group by l.id_logistik")->result_array();

        // }else{
        $page_data['obat'] = $this->db->get('list_logistik')->result_array();
        //}
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_riwayat_permintaan()
    {
        $tgl = date("Y-m-d");
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Logistik_farmasi->selectRangeRiwayatPermintaanObat($mulai, $akhir);
        } else {
            $page_data = $this->M_Logistik_farmasi->selectRiwayatPermintaanObat();
        }


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            // $count = $this->M_Logistik_farmasi->countRiwayatPermintaan($page_data[$i]->id_req);
            // if ($count > 0) {
            $no = $i + 1;
            $print = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url() . "Logistik_farmasi/print_out_permintaan/" . $page_data[$i]->id_req . "' ><i class='icon-printer'></i></a>";;
            $button = "<div class='btn btn-success btn-icon-anim btn-square' onclick='tampilDetailRequest(\"" . $page_data[$i]->id_req . "\")'><i class='icon-rocket'></i></div>";
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            if (strlen($page_data[$i]->indeks) >= 6) {
                $no_pesan = "PSN-" . $page_data[$i]->indeks;
            } else {
                $no_pesan =  "PSN-" . sprintf('%06d', $page_data[$i]->indeks);
            }
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $print, $button, $no_pesan, $tgl, $waktu, $tipe, $nama, $keterangan);
            // }
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

    // riwayat permintaan untuk unit
    public function Tampil_riwayat_permintaan_unit()
    {
        $data_staff = $this->session->userdata('data_auth');
        //$date = new DateTime('+1 day');
        if ($data_staff->tipe == "apotik") {
            $tipe = "unit";
        } else {
            $tipe = "depo ranap";
        }
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Logistik_farmasi->selectRangeRiwayatPermintaanObatFarmasi($mulai, $akhir);
        } else {
            $page_data = $this->M_Logistik_farmasi->selectRiwayatPermintaanObatFarmasi($tipe);
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            // $count = $this->M_Logistik_farmasi->countRiwayatPermintaan($page_data[$i]->id_req);
            // if($count>0){
            $no = $i + 1;
            $print = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url() . "Logistik_farmasi/print_out_permintaan/" . $page_data[$i]->id_req . "' ><i class='icon-printer'></i></a>";;
            $button = "<div class='btn btn-success btn-icon-anim btn-square' onclick='tampilDetailRequest(\"" . $page_data[$i]->id_req . "\")'><i class='icon-rocket'></i></div>";
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe_staff;
            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            if (strlen($page_data[$i]->indeks) >= 6) {
                $no_pesan = "PSN-" . $page_data[$i]->indeks;
            } else {
                $no_pesan =  "PSN-" . sprintf('%06d', $page_data[$i]->indeks);
            }
            if ($tipe == 'rawatinap') {
                $keterangan = $page_data[$i]->ruangan;
            } else {
                $keterangan = $page_data[$i]->keterangan;
            }

            $out[$i] = array($no, $print, $button, $no_pesan, $tgl, $waktu, $tipe, $nama, $keterangan);
            //}

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



    // cetak
    public function print_out_permintaan($id_faktur)

    {
        $data['data'] = $this->M_Logistik_farmasi->getListRiwayatPermintaanObat($id_faktur);
        $data['unit'] = $this->M_Logistik_farmasi->getUnitRiwayatPermintaanObat($id_faktur);
        $this->load->view('print/cetak_riwayat_permintaan_logfar', $data);
    }

    public function Tampil_list_riwayat_permintaan_obat()
    {
        $id_req = $this->input->post('id_req');
        $page_data = $this->M_Logistik_farmasi->getListRiwayatPermintaanObat($id_req);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $exp = $this->M_Logistik_farmasi->getExpByObat($page_data[$i]->id_logistik, "stok_logistik");
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $produsen = $page_data[$i]->produsen;
            $satuan_terkecil = $page_data[$i]->satuan_terkecil;
            $tgl_exp = $exp['kadaluarsa'];
            $jml_req = $page_data[$i]->jml_req;
            $jml_terima = $page_data[$i]->jml_terima;
            $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaan($page_data[$i]->id_logistik)->stok;
            $stok = $getStok;

            $cekstok = $this->db->get_where('stok_logistik', ['id_struk' => $page_data[$i]->id_req])->row();

            if ($page_data[$i]->status == "DIAJUKAN" || ($page_data[$i]->status == "DITERIMA" && empty($cekstok))) {
                $status = "<span class='label label-info'>DIAJUKAN</span>";
            } else if ($page_data[$i]->status == "DITOLAK") {
                $status = "<span class='label label-danger'>DITOLAK</span>";
            } else if ($page_data[$i]->status == "DITERIMA" && !empty($cekstok)) {
                $status = "<span class='label label-success'>DITERIMA</span>";
            }
            $keterangan = $page_data[$i]->keterangan;
            if ($page_data[$i]->status == "DITOLAK" || ($page_data[$i]->status == "DIAJUKAN" && $getStok < $page_data[$i]->jml_req) || ($page_data[$i]->status == "DITERIMA" && !empty($cekstok))) {
                $terima = "-";
                $hapus = "-";
            } else {
                $terima = "<div class='btn btn-success btn-icon-anim btn-square' onclick='terimaLangsung(\"" . $page_data[$i]->id_req . "\",\"" . $page_data[$i]->tipe . "\",\"" . $page_data[$i]->id_logistik . "\" )'><i class='icon-like '></i></div>";
                $hapus = "<div class='btn btn-warning btn-icon-anim btn-square' onclick='hapusRequest(\"" . $page_data[$i]->id_req . "\",\"" . $nama .  "\")'><i class='icon-trash'></i></div>";
            }
            if ($page_data[$i]->status == "DIAJUKAN" || ($page_data[$i]->status == "DITERIMA" && empty($cekstok))) {
                $respon = "<div class='btn btn-warning btn-icon-anim btn-square' 
                onclick='tampilKonfirmasi(\"" . $page_data[$i]->id_req . "\",\"" . $page_data[$i]->tipe . "\",\"" . $page_data[$i]->id_logistik . "\",\"" . $page_data[$i]->id_staff . "\" )'>
                <i class='icon-hourglass '></i></div>";
                $hapus = "<div class='btn btn-warning btn-icon-anim btn-square' onclick='hapusRequest(\"" . $page_data[$i]->id_req . "\",\"" . $nama .  "\")'><i class='icon-trash'></i></div>";
            } else {
                $respon = "-";
                $hapus = "-";
            }

            $out[$i] = array($no, $terima, $respon, $nama, $produsen, $tgl_exp,  $jml_req, $jml_terima, $stok, $status, $keterangan, $hapus);
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
    //farmasi
    public function Tampil_list_riwayat_permintaan_obat_farmasi()
    {
        $data_staff = $this->session->userdata('data_auth');

        $id_req = $this->input->post('id_req');
        $page_data = $this->M_Logistik_farmasi->getListRiwayatPermintaanObat($id_req);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            if ($data_staff->tipe == "apotik") {
                $stok = "stok_apotik";
            } else {
                $stok = "stok_depo";
            }
            $exp = $this->M_Logistik_farmasi->getExpByObat($page_data[$i]->id_logistik, $stok);
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $satuan_terkecil = $page_data[$i]->satuan_terkecil;
            $produsen = $page_data[$i]->produsen;
            $tgl_exp = $exp['kadaluarsa'];
            $jml_req = $page_data[$i]->jml_req;
            $jml_terima = $page_data[$i]->jml_terima;
            $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaanFarmasi($page_data[$i]->id_logistik)->stok;
            $stok = number_format($getStok);
            if ($page_data[$i]->status == "DIAJUKAN") {
                $status = "<span class='label label-info'>DIAJUKAN</span>";
            } else if ($page_data[$i]->status == "DITOLAK") {
                $status = "<span class='label label-danger'>DITOLAK</span>";
            } else if ($page_data[$i]->status == "DITERIMA") {
                $status = "<span class='label label-success'>DITERIMA</span>";
            }
            $keterangan = $page_data[$i]->keterangan;
            if ($page_data[$i]->status != "DIAJUKAN" || $getStok < $page_data[$i]->jml_req) {
                $terima = "-";
            } else {
                $terima = "<div class='btn btn-primary btn-icon-anim btn-square' onclick='terimaLangsung(\"" . $page_data[$i]->id_req . "\",\"" . $page_data[$i]->tipe . "\",\"" . $page_data[$i]->id_logistik . "\" )'><i class='icon-like '></i></div>";
            }
            if ($page_data[$i]->status != "DIAJUKAN") {
                $respon = "-";
            } else {
                $respon = "<div class='btn btn-success btn-icon-anim btn-square' 
                onclick='tampilKonfirmasi(\"" . $page_data[$i]->id_req . "\",\"" . $page_data[$i]->tipe . "\",\"" . $page_data[$i]->id_logistik . "\",\"" . $page_data[$i]->id_staff . "\" )'>
                <i class='icon-rocket '></i></div>";
            }

            $jam = date('H');
            if ($jam < 25) {
                if ($page_data[$i]->status != "DIAJUKAN") {
                    $hapus = "-";
                } else {
                    $hapus = "<div class='btn btn-warning btn-icon-anim btn-square' onclick='hapusRequest(\"" . $page_data[$i]->id_req . "\",\"" . $nama .  "\")'><i class='icon-trash'></i></div>";
                }
            } else {
                $hapus = "-";
            }

            $out[$i] = array($no, $terima, $respon, $nama, $produsen, $tgl_exp, $jml_req, $jml_terima, $stok, $status, $keterangan,  $hapus);
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

    function hapus_request()
    {
        $id_req = $this->input->post('id_req');

        $this->M_Logistik_farmasi->delete_tindakan_permintaan($id_req, 'detail_request');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function updateTerimaStokLogistik()
    {
        $data_staff = $this->session->userdata('data_auth');
        $id_request = $this->input->post('id_request');
        $perequest = $this->input->post('perequest');
        $idLogistik = $this->input->post('idLogistik');
        $id_form = $this->input->post('id_form');
        $now = new DateTime();
        $tgl =  date("Y-m-d H:i:s");
        $update = array(
            'id_logistik' => $idLogistik,
            'tgl_exp' => $this->input->post('tgl_exp'),
            'status' => 'DITERIMA',
            'jml_terima' => $this->input->post('jml_terima'),
            'tgl_res' => $now->format('Y-m-d H:i:s'),
            'keterangan' => $this->input->post('keterangan'),
            'jml_req' => $this->input->post('JumlahPermintaan'),
        );
        $this->M_Logistik_farmasi->update_detail_request($id_request, $update);
        $updatereq = array('status' => 'diterima');
        $this->M_Logistik_farmasi->update_request($updatereq, $id_form, 'request_obat');

        $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaan($idLogistik)->stok;

        $cek_req = $this->db->get_where('stok_logistik', ['id_struk' => $id_request])->result();

        if (count($cek_req) == 1) {
            //do nothing
        } else {

            $stok_logistik = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $now->format('Y-m-d H:i:s'),
                'keterangan' => 'MUTASI',
                'frek' => $this->input->post('jml_terima') * -1,
                'saldo' => $getStok + ($this->input->post('jml_terima') * -1),
                'kadaluarsa' => $this->input->post('tgl_exp'),
                'asal_tujuan' => $perequest,
                'id_struk' => $id_request,
                'id_staff' => $data_staff->id_staff,
            );
            $this->M_Logistik_farmasi->insertStok($stok_logistik, 'stok_logistik');
            $out['status'] = "success";

            $stok_perequest = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $now->format('Y-m-d H:i:s'),
                'keterangan' => 'MASUK',
                'frek' => $this->input->post('jml_terima'),
                'kadaluarsa' => $this->input->post('tgl_exp'),
                'asal_tujuan' => 'Logistik',
                'id_req' => $id_request,
                'id_staff' => $data_staff->id_staff,
            );


            if ($perequest == "logistik farmasi") {

                $this->M_Logistik_farmasi->insertStok($stok_perequest, 'stok_ruangan_logistik');
                $out['status'] = "success";
            } else if ($perequest == "apotik") {
                //do nothing
            } else {
                $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();

                $this->M_Logistik_farmasi->insertStok($stok_perequest, $data_adm->stok);
                $this->M_Apotik->update_perencanaan($idLogistik, 'stok_depo', 'pr_depo');
                $out['status'] = "success";
            }
        }

        $out['status'] = "success";
        echo json_encode($out);
    }
    // stok farmasi
    public function updateTerimaStokFarmasi()
    {
        $data_staff = $this->session->userdata('data_auth');
        $id_request = $this->input->post('id_request');
        $perequest = $this->input->post('perequest');
        $idLogistik = $this->input->post('idLogistik');
        $id_form = $this->input->post('id_form');
        $now = new DateTime();
        $tgl =  date("Y-m-d H:i:s");

        $dt = $this->db->get_where('detail_request', ['id_req' => $id_request]);
        $staff = $this->db->get_where('staff', ['id_staff' => $dt->row()->id_staff])->row();


        $update = array(
            'tgl_exp' => $this->input->post('tgl_exp'),
            'status' => 'DITERIMA',
            'jml_terima' => $this->input->post('jml_terima'),
            'tgl_res' => $now->format('Y-m-d H:i:s'),
            'id_logistik' => $idLogistik,
            'jml_req' => $this->input->post('JumlahPermintaan'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $this->M_Logistik_farmasi->update_detail_request($id_request, $update);
        $updatereq = array('status' => 'diterima');
        $this->M_Logistik_farmasi->update_request($updatereq, $id_form, 'request_obat');

        $id_form = $dt->row()->id_form;
        $tipe = $this->db->get_where('request_obat', ['id_req' => $id_form])->row();

        $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaanFarmasi($idLogistik)->stok;
        $id_resep = ($perequest == 'rawatinap') ? $staff->ruangan : $tipe->keterangan;

        $stok_apotik = array(
            'id_stok' => uniqid(),
            'id_logistik' => $idLogistik,
            'tgl' => $now->format('Y-m-d H:i:s'),
            'keterangan' => 'MUTASI',
            'frek' => $this->input->post('jml_terima') * -1,
            'saldo' => $getStok + ($this->input->post('jml_terima') * -1),
            'kadaluarsa' => $this->input->post('tgl_exp'),
            'asal_tujuan' => $perequest,
            'id_req' => $id_request,
            'id_staff' => $data_staff->id_staff,
            'id_resep' =>  $id_resep,

        );

        $out['status'] = "success";
        if ($perequest == 'rawatinap' || $perequest == 'rawatjalan') {
            $stok_perequest = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $now->format('Y-m-d H:i:s'),
                'keterangan' => 'MASUK',
                'frek' => $this->input->post('jml_terima'),
                'kadaluarsa' => $this->input->post('tgl_exp'),
                'asal_tujuan' => $data_staff->tipe,
                'id_req' => $id_request,
                'id_staff' => $data_staff->id_staff,
                'id_resep' =>  $id_resep,
            );
        } else {
            $stok_perequest = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $now->format('Y-m-d H:i:s'),
                'keterangan' => 'MASUK',
                'frek' => $this->input->post('jml_terima'),
                'kadaluarsa' => $this->input->post('tgl_exp'),
                'asal_tujuan' => $data_staff->tipe,
                'id_req' => $id_request,
                'id_staff' => $data_staff->id_staff,
            );
        }


        // Potong stok depo
        if ($data_staff->tipe == "apotik") {
            $cek_req = $this->db->get_where('stok_apotik', ['id_req' => $id_request])->result();
            if (count($cek_req) == 1) {
                //do nothing
            } else {
                $this->M_Logistik_farmasi->insertStok($stok_apotik, 'stok_apotik');
                $this->M_Apotik->update_perencanaan($idLogistik, 'stok_apotik', 'pr_apotik');
                $out['status'] = "success";
            }
        } else if ($data_staff->tipe == "deporanap") {
            $cek_req = $this->db->get_where('stok_depo', ['id_req' => $id_request])->result();
            if (count($cek_req) == 1) {
                //do nothing
            } else {
                $this->M_Logistik_farmasi->insertStok($stok_apotik, 'stok_depo');
                $this->M_Apotik->update_perencanaan($idLogistik, 'stok_depo', 'pr_depo');
                $out['status'] = "success";
            }
        }

        // input data stok

        if ($perequest == "apotik") {
            if ($tipe->tipe == 'unit') {
                $this->M_Logistik_farmasi->insertStok($stok_perequest, 'stok_ruangan_apotik');
                $out['status'] = "success";
            }
            // else {
            //     $this->M_Logistik_farmasi->insertStok($stok_perequest, 'stok_apotik');
            //     $out['status'] = "success";
            // }
        } else if ($perequest == "deporanap") {
            if ($tipe->tipe == 'depo ranap') {
                $this->M_Logistik_farmasi->insertStok($stok_perequest, 'stok_ruangan_depo');
                $out['status'] = "success";
            }
            //  else {
            //     $this->M_Logistik_farmasi->insertStok($stok_perequest, 'stok_depo');
            //     $out['status'] = "success";
            // }
        } else {
            $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
            $this->M_Logistik_farmasi->insertStok($stok_perequest, $data_adm->stok);
            $out['status'] = "success";
        }



        $out['status'] = "success";
        echo json_encode($out);
    }
    public function updateTolakStokLogistik()
    {
        $id_request = $this->input->post('id_request');
        $now = new DateTime();
        $update = array(
            'status' => 'DITOLAK',
            'jml_terima' => 0,
            'tgl_res' => $now->format('Y-m-d H:i:s'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $this->M_Logistik_farmasi->update_detail_request($id_request, $update);

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function Laporan_cetak_dp()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_cetak_dp';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_laporan_dp()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Logistik_farmasi->selectDataDPRange($mulai, $akhir);
        } else {
            $page_data = $this->M_Logistik_farmasi->selectDataDP();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_cetak_dp(\"" . $page_data[$i]->id_cetak . "\",\"" . $page_data[$i]->faktur_nomor_dp . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->no_distributor . "\",\"" . $page_data[$i]->distributor . "\",\"" . $page_data[$i]->total_keseluruhan . "\",\"" . $page_data[$i]->ppn . "\")'><i class='icon-pencil'></i></a>";
            // $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->id_cetak . "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tampil_isi_dp(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='icon-note'></i></a>";
            $cetak = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' href='cetakDP/" . $page_data[$i]->id_faktur . "/" . $page_data[$i]->no_faktur . "'><i class='icon-printer'></i></a>";
            $hapus = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick=' hapus(\"" . $page_data[$i]->id_cetak . "\",\"" . $page_data[$i]->no_distributor . "\")'><i class='icon-trash '></i></button>";

            $time = strtotime($page_data[$i]->tgl_input);
            $date = strftime("%A, %d %B %Y ", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $time2 = strtotime($page_data[$i]->tgl_terima);
            $date2 = strftime("%A, %d %B %Y ", $time2);

            $no = $i + 1;
            $tgl_input = $date;
            $waktu;
            $no_dp = $page_data[$i]->no_index;
            $no_distributor = $page_data[$i]->no_distributor;
            $distributor = $page_data[$i]->distributor;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $no_faktur_dp = $page_data[$i]->faktur_nomor_dp;
            $total = "Rp." . number_format($page_data[$i]->total_keseluruhan, 0, ',', '.');

            $out[$i] = array($no, $cetak, $pilih, $edit, $hapus, $tgl_input, $waktu, $no_dp, $no_distributor, $distributor, $no_dokumen, $no_faktur_dp, $date2, $total);
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


    public function updateDP()
    {
        $id_cetak = $this->input->post("id_cetak");
        $no_dokumen = $this->input->post("no_dokumen");
        $no_distributor = $this->input->post("no_distributor");
        $distributor = $this->input->post("distributor");
        $ppn = $this->input->post("ppn");

        $data = array(
            'faktur_nomor_dp' => $this->input->post("nofaktur"),
            'tgl_terima' => $this->input->post("tgl_terima"),
            'total_keseluruhan' => $this->input->post("hargafaktur"),
            'beaongkir' => $this->input->post("beaongkir"),
            'ppn' => $ppn
        );

        $where = array('id_cetak' => $id_cetak);
        $this->M_Logistik_farmasi->update_tindakan($data, $where, 'cetak_dp');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_isi_dp()
    {
        $id_faktur = $this->input->post('id_faktur');
        $no_dokumen = $this->input->post('no_dokumen');
        $index_no = $this->input->post('nomor');

        $page_data = $this->M_Logistik_farmasi->getIsiDataDP($id_faktur, $index_no);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $nomor = $i + 1;
            $no = " " . $page_data[$i]->no_faktur;
            $kode = $page_data[$i]->kode;
            $standar = $page_data[$i]->standar;
            $nama_produsen = $page_data[$i]->nama_produsen;
            $nama = $page_data[$i]->nama;
            $no_batch = $page_data[$i]->no_batch;
            $id_prod_obat = $page_data[$i]->id_prod_obat;
            $tipe = $page_data[$i]->tipe;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $frek = $page_data[$i]->frek;
            $harga_beli = $page_data[$i]->harga_beli;
            $diskon = $page_data[$i]->diskon;
            $disc = $diskon / 100 * $harga_beli * $frek;
            $ppn = $page_data[$i]->ppn;
            $total = $harga_beli * $frek;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $out[$i] = array($nomor, $kode, $standar, $nama_produsen, $nama, $no_batch, $id_prod_obat, $tipe, $golongan_obat, $frek,  $frek, $frek - $frek, $harga_beli, $diskon, $disc, $ppn, $total, $tgl);
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

    public function cetakDP($id_faktur, $no_faktur)
    {
        $data['data1'] = $this->M_Logistik_farmasi->getDataDp($id_faktur, $no_faktur);
        $data['data2'] = $this->M_Logistik_farmasi->getDataDp2($id_faktur);
        $data['tgl'] = $this->M_Logistik_farmasi->getTgl($id_faktur);
        $data['data_t'] = $this->M_Logistik_farmasi->getTotalDiskon($id_faktur, $no_faktur);

        $this->load->view('print/LaporanCetakDP', $data);
    }

    public function delete_dp()
    {
        $id_cetak = $this->input->post('id_cetak');
        $no_distributor = $this->input->post('no_distributor');

        $where = array('id_cetak' => $id_cetak);

        $this->M_Logistik_farmasi->delete_tindakan($where, 'cetak_dp');

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function Laporan_persediaan()
    {
        $this->load->view('assets/_header');
        $page_data['url'] = 'Logistik_farmasi/Tampil_laporan_persediaan';
        $page_data['page_content'] = 'page_content/Laporan_persediaan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    // Tambahkan fungsi ini di dalam controller Logistik_farmasi 
    public function Laporan_persediaan_dua()
    {
        $page_data['url'] = '';
        $page_data['page_content'] = 'page_content/Laporan_persediaan_dua';
        $this->load->view('assets/_header');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_persediaan()
    {
        $data_staff = $this->session->userdata('data_auth');

        $periode = $this->input->post('periode');
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $data_staff->tipe])->row();
        $stok = $data_adm->stok;


        $page_data = $this->M_Logistik_farmasi->selectLaporan_Persediaan($periode, $stok);
        // $page_data = $this->M_Logistik_farmasi->selectObatPersediaan($periode, $stok);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $id_logistik = $page_data[$i]->id_logistik;
            $nama_produsen = $page_data[$i]->produsen;
            $vendor = $page_data[$i]->distributor;
            $nama = $page_data[$i]->nama;
            $satuan_terbesar = $page_data[$i]->satuan_terbesar;
            $hna = $page_data[$i]->harga_cost;
            $ppn = $page_data[$i]->ppn;
            $hargappn = round($hna * (1 + ($ppn / 100)), 2);
            $golongan_obat = $page_data[$i]->golongan_sediaan;
            $standar = $page_data[$i]->standar;
            $kode = $page_data[$i]->kode;
            $harga_persediaan = $page_data[$i]->harga_persediaan;


            // $tgl_faktur = isset($harga_beli)?$harga_beli->tgl_input:0;

            // $stok_awal = $this->M_Logistik_farmasi->getStokAwal($periode, $stok, $id_logistik);
            // $stok_awal = isset($stok_awal) ? $stok_awal->jumlah : 0;

            // $penerimaan = $this->M_Logistik_farmasi->getStokPenerimaan($periode, $stok, $id_logistik);
            // $penerimaan = isset($penerimaan) ? $penerimaan->jumlah : 0;

            // $pengeluaran = $this->M_Logistik_farmasi->getStokPengeluaran($periode, $stok, $id_logistik);
            // $pengeluaran = isset($pengeluaran) ? abs($pengeluaran->jumlah) : 0;

            // $stok_akhir = $this->M_Logistik_farmasi->getStokSekarang($periode, $stok, $id_logistik);
            // $stok_akhir = isset($stok_akhir) ? $stok_akhir->jumlah : 0;

            $stok_awal =  $page_data[$i]->awal;
            $penerimaan =  $page_data[$i]->masuk;
            $pengeluaran =  abs($page_data[$i]->keluar);
            $stok_akhir =  $page_data[$i]->akhir;


            $data_struk = $this->M_Logistik_farmasi->getHargaBeli($periode, $id_logistik);

            $data_struk_last = $this->M_Logistik_farmasi->getHargaBeli_last($periode, $id_logistik);
            if ($penerimaan == 0) {
                $harga_beli = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? round($data_struk_last->harga_beli, 2) : $harga_persediaan;
                $distributor = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? $data_struk_last->id_produsen : $vendor;
                $tgl_struk = (isset($data_struk_last) && $data_struk_last->harga_beli > 0)  ? date('d-m-Y', strtotime($data_struk_last->tgl_struk)) : '-';
                $tgl_exp = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? date('d-m-Y', strtotime($data_struk_last->tgl_exp)) : '-';
            } else {
                if ($data_staff->tipe == "logistik farmasi") {
                    $harga_beli = isset($data_struk) ? round($data_struk->harga_beli, 2) : 0;
                    $distributor = isset($data_struk) ? $data_struk->id_produsen : '-';
                    $tgl_struk = isset($data_struk->tgl_struk) ? date('d-m-Y', strtotime($data_struk->tgl_struk)) : '-';
                    $tgl_exp = isset($data_struk->tgl_exp) ? date('d-m-Y', strtotime($data_struk->tgl_exp)) : '-';
                } else {
                    $harga_beli = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? round($data_struk_last->harga_beli, 2) : $harga_persediaan;
                    $distributor = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? $data_struk_last->id_produsen : $vendor;
                    $tgl_struk = (isset($data_struk_last) && $data_struk_last->harga_beli > 0)  ? date('d-m-Y', strtotime($data_struk_last->tgl_struk)) : '-';
                    $tgl_exp = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? date('d-m-Y', strtotime($data_struk_last->tgl_exp)) : '-';
                }
            }

            $harga_beli = $harga_beli;
            $nilai_awal = round($page_data[$i]->harga_persediaan_last * $stok_awal, 2);
            $nilai_terima = round($harga_persediaan * $penerimaan, 2);
            $nilai_pakai = round($harga_persediaan * $pengeluaran, 2);
            $nilai_akhir = round($nilai_awal + $nilai_terima - $nilai_pakai, 2);
            $nilai_persediaan = $harga_persediaan * $stok_akhir;


            // $tgl_faktur = $tgl_faktur;

            $out[$i] = array($id_logistik, $nama, $nama_produsen, $distributor, $satuan_terbesar, $hargappn, $harga_beli, $harga_persediaan, $tgl_struk, $tgl_exp, $stok_awal, $penerimaan, $pengeluaran, $stok_akhir, $nilai_awal, $nilai_terima, $nilai_pakai, $nilai_akhir, $golongan_obat, $standar, $kode);
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
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logistik_farmasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'IND');
        $this->load->model('M_Logistik_farmasi');
        $this->load->model('M_Apotik');
        $this->load->model('M_Stok_obat_ok');
    }

    // Laporan mutasi
    public function Laporan_mutasi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_mutasi_farmasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_mutasi()
    {
        $staff = $this->session->userdata('data_auth');

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Logistik_farmasi->selectRangeLaporanmutasiFarmasi($mulai, $akhir);
        } else {
            $page_data = $this->M_Logistik_farmasi->selectLaporanmutasiFarmasi();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $id_logistik = $page_data[$i]->id_logistik;

            $satuan_terkecil = $page_data[$i]->satuan_terkecil;
            $jenis = $page_data[$i]->ket;
            $nama = $page_data[$i]->nama;
            $standar = $page_data[$i]->standar;
            $kode = $page_data[$i]->kode;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $tipe = $page_data[$i]->tipe;
            $jml_terima = abs($page_data[$i]->jml_terima);
            $zat_adiktif = $page_data[$i]->zat_adiktif;
            $high_alert = $page_data[$i]->high_alert;
            $produsen = $page_data[$i]->produsen;
            $harga_cost = $page_data[$i]->harga_cost;
            $hargappn = $page_data[$i]->harga_cost * 1.11;
            $hargappn = intval($hargappn);
            $total = $hargappn * $jml_terima;

            $time = strtotime($page_data[$i]->tgl_res);
            $tgl = strftime("%d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $tgl_exp = indo_date2($page_data[$i]->kadaluarsa);
            // if ($tipe == "FAKTUR") {
            //     $id_req = str_replace("F_", "", $page_data[$i]->id_struk);
            //     $no_faktur = $this->M_Logistik_farmasi->getNoFaktur($id_req);
            //     $ket = $no_faktur['no_faktur'];
            // } else if ($tipe == "PENJUALAN") {
            //     $data_pasien =  $this->M_Logistik_farmasi->getPasienByReq($page_data[$i]->id_struk);
            //     if (count($data_pasien->result()) > 0) {
            //         $ket = $data_pasien->row()->nama;
            //     } else {
            //         $ket = 'BATAL BEROBAT';
            //     }
            // }  else if ($jenis == "MUTASI") {
            //     $indeks =  $this->M_Logistik_farmasi->getNoPSN($page_data[$i]->id_struk);
            //     if (count($indeks->result()) > 0) {
            //         if (strlen($indeks->row()->indeks) >= 6) {
            //             $ket = "PSN-" . $indeks->row()->indeks;
            //         } else {
            //             $ket =  "PSN-" . sprintf('%06d', $indeks->row()->indeks);
            //         }
            //     } else {
            //         $ket = '-';
            //     }
            // }  else {
            //     $ket = '-';
            // }

            if ($tipe == "BASE") {
                $tipe = "STOK OPNAME";
            } else if ($tipe == "apotik") {
                $tipe = "DEPO RAJAL";
            } else if ($tipe == "deporanap") {
                $tipe = "DEPO RANAP";
            } else if ($tipe == "labor" || $tipe == "laboratorium") {
                $tipe = "LABORATORIUM";
            } else if ($tipe == "ok") {
                $tipe = "KAMAR OPERASI";
            } else if ($tipe == "rawatinap") {
            } else if ($tipe == "rawatjalan") {
                $tipe = "RAWAT JALAN";
            } else {
                $tipe = strtoupper($tipe);
            }



            $diskon = $this->db->query("SELECT diskon_rs from detail_struk 
                 where id_logistik ='$id_logistik' ORDER BY ABS(DATEDIFF(tgl_input, NOW())) ASC limit 1");

            $nilaidiskon = (count($diskon->result()) > 0) ? round(($diskon->row()->diskon_rs / 100), 2) : 0;
            $hnadiskon = round($harga_cost * (1 - $nilaidiskon));
            $out[$i] = array($no, $id_logistik, $jenis, $nama, $produsen, $satuan_terkecil, $harga_cost, $hargappn, $nilaidiskon, $hnadiskon, $tipe, $jml_terima, $total, $tgl, $waktu, $zat_adiktif, $high_alert, $golongan_obat, $standar, $kode, $tgl_exp);
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


    // End

    // Laporan kartu stok

    public function Laporan_stok()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        if ($perequest == "apotik") {
            $stok = "stok_apotik";
        } else if ($perequest == "logistik farmasi") {
            $stok = "stok_logistik";
        } else if ($perequest == "deporanap") {
            $stok = "stok_depo";
        }
        $this->load->view('assets/_header');
        $page_data['obat'] = $this->M_Logistik_farmasi->selectStok($stok);
        $page_data['page_content'] = 'page_content/Laporan_kartu_stok';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function Tampil_laporan_stok()
    {
        $tgl = date("Y-m-d");
        $id_logistik = $this->input->post('id_logistik');
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $out = null;

        if ($this->input->post('awal') && $this->input->post('akhir') && $this->input->post('id_logistik')) {

            $page_data = $this->M_Logistik_farmasi->selectLaporanStok($awal, $akhir, $id_logistik);


            for ($i = 0; $i < count($page_data); $i++) {
                $no = $i + 1;
                $staff = $page_data[$i]->staff;
                $jenis = $page_data[$i]->ket;
                $nama = $page_data[$i]->nama;
                $tipe = $page_data[$i]->tipe;

                $awal = ($page_data[$i]->awal);
                $masuk = ($page_data[$i]->masuk);
                $keluar = ($page_data[$i]->keluar);
                $saldo = intval($page_data[$i]->saldo);



                $time = strtotime($page_data[$i]->tgl_res);
                $tgl = strftime("%d %B %Y", $time);
                $waktu = strftime("%H:%M WIB", $time);
                $tgl = $tgl . ' ' . $waktu;
                if ($jenis == "MUTASI") {
                    $psn =  $this->M_Logistik_farmasi->getPSN($page_data[$i]->id_struk);
                    $ket = !empty($psn) ? "PSN-" . $psn->indeks : 'PSN hilang';
                } else {
                    if ($tipe == "FAKTUR") {
                        $id_req = str_replace("F_", "", $page_data[$i]->id_struk);
                        $no_faktur = $this->M_Logistik_farmasi->getNoFaktur($id_req);
                        $ket = isset($no_faktur['no_faktur']) ? $no_faktur['no_faktur'] : "";
                    } else if ($tipe == "PENJUALAN" || $tipe == "RETUR") {
                        $data_pasien =  $this->M_Logistik_farmasi->getPasienByReq($page_data[$i]->id_struk);
                        if (count($data_pasien->result()) > 0) {
                            $ket = $data_pasien->row()->nama . $data_pasien->row()->dokter;
                        } else {
                            $ket = 'BATAL BEROBAT';
                        }
                    } else {
                        $ket = '-';
                    }
                }

                if ($tipe == "BASE") {
                    $tipe = "STOK OPNAME";
                } else if ($tipe == "apotik") {
                    $tipe = "DEPO RAJAL";
                } else if ($tipe == "deporanap") {
                    $tipe = "DEPO RANAP";
                } else if ($tipe == "labor" || $tipe == "laboratorium") {
                    $tipe = "LABORATORIUM";
                } else if ($tipe == "ok") {
                    $tipe = "KAMAR OPERASI";
                } else if ($tipe == "rawatinap") {
                } else if ($tipe == "rawatjalan") {
                    $tipe = "RAWAT JALAN";
                } else {
                    $tipe = strtoupper($tipe);
                }


                $out[$i] = array($no, $tgl, $nama, $awal, $masuk, $keluar, $saldo, $tipe, $ket, $staff);
            }
        } else {
            $out = null;
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



    //Pengeluaran Obat
    public function Pengeluaran_obat()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pengeluaran_obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_pengeluaran_obat()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Logistik_farmasi->selectRangePengeluaranObat($mulai, $akhir);
        } else {
            $page_data = $this->M_Logistik_farmasi->selectPengeluaranObat();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $id_logistik = $page_data[$i]->id_logistik;
            $nama = $page_data[$i]->nama;
            $stok = abs($page_data[$i]->stok);


            $tujuan = $page_data[$i]->asal_tujuan;


            $out[$i] = array($no, $id_logistik, $nama, $stok);
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

    //END


    //Laporan Pembelian
    public function Laporan_pembelian()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_pembelian_farmasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pembelian()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Logistik_farmasi->selectRangeLaporanPembelian($mulai, $akhir);
        } else {
            $page_data = $this->M_Logistik_farmasi->selectLaporanPembelian();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $id_logistik = $page_data[$i]->id_logistik;
            $no = " " . $page_data[$i]->no_faktur;
            $kode = $page_data[$i]->kode;
            $standar = $page_data[$i]->standar;
            $nama_produsen = $page_data[$i]->nama_produsen;
            // $vendor = $page_data[$i]->vendor;
            $nama = $page_data[$i]->nama;
            // $tanggal_buat = $page_data[$i]->tanggal_buat;
            // $jam_buat = $page_data[$i]->jam_buat;
            $no_batch = $page_data[$i]->no_batch;
            $id_prod_obat = $page_data[$i]->id_prod_obat;
            $tipe = $page_data[$i]->tipe;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $frek = $page_data[$i]->frek;
            $harga_beli = intval($page_data[$i]->harga_beli);
            $diskon = $page_data[$i]->diskon_rs / 100;
            $disc = number_format($diskon * $harga_beli * $frek, 0, ',', ',');
            $ppn = $page_data[$i]->ppn;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $total = number_format($harga_beli * $frek, 0, ',', ',');
            $time = strtotime($page_data[$i]->tgl_input);
            $time1 = strtotime($page_data[$i]->tgl_buat);
            $waktu = strftime("%H:%M WIB", $time1);
            $tgl1 = strftime("%A, %d %B %Y", $time1);
            $tgl = strftime("%d-%m-%Y", $time);
            $tgl_po = indo_date2($page_data[$i]->tgl_po);
            $kadaluarsa = indo_date2($page_data[$i]->kadaluarsa);


            $noValid =  sprintf('%04d', $page_data[$i]->index_dok, 'dyhtdyu');
            $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($page_data[$i]->tgl_buat))) . "/" . date("Y", strtotime($page_data[$i]->tgl_buat));
            $out[$i] = array($id_logistik, $no, $kode, $standar, $nama_produsen, $nama, $no_batch, $noDok, $no_dokumen, $id_prod_obat, $tipe, $golongan_obat, $frek,  $frek, $frek - $frek, $harga_beli, $diskon, $disc, $ppn, $total, $kadaluarsa, $tgl, $waktu, $tgl_po);
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



    //END
    //Laporan Pembelian
    public function Laporan_pembelian_pebal()
    {
        $this->load->view('assets/_header');
        $page_data['judul'] = 'PEMBELIAN PEBAL';
        $page_data['url'] = 'Logistik_farmasi/Tampil_laporan_pembelian_pebal';
        $page_data['page_content'] = 'page_content/Laporan_pembelian_farmasi_pebal';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pembelian_pebal()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Logistik_farmasi->selectRangeLaporanPembelianPebal($mulai, $akhir, 'PEBAL');
        } else {
            $page_data = $this->M_Logistik_farmasi->selectLaporanPembelianPebal('PEBAL');
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $id_logistik = $page_data[$i]->id_logistik;
            $no = " " . $page_data[$i]->no_faktur;
            $kode = $page_data[$i]->kode;
            $standar = $page_data[$i]->standar;
            $distributor = $page_data[$i]->id_produsen;
            $nama = $page_data[$i]->nama;
            $no_batch = $page_data[$i]->no_batch;
            $zat_aktif = $page_data[$i]->zat_aktif;
            $nama_produsen = $page_data[$i]->nama_produsen;
            $tipe = $page_data[$i]->tipe;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $frek = $page_data[$i]->frek;
            $harga_beli = $page_data[$i]->harga_beli;
            $diskon = $page_data[$i]->diskon_rs;
            $disc = $diskon / 100 * $harga_beli * $frek;
            $ppn = $page_data[$i]->ppn;
            $total = $harga_beli * $frek;
            $total = round(($harga_beli * (1 + $ppn / 100)) * $frek, 2);
            // $total = $page_data[$i]->total;
            $time = strtotime($page_data[$i]->tgl_input);
            $tgl = strftime(" %d %B %Y", $time);
            $out[$i] = array($id_logistik, $no, $kode, $standar, $distributor, $nama, $no_batch, $nama_produsen, $tipe, $golongan_obat, $zat_aktif, $frek,  $frek, $frek - $frek, $harga_beli, $diskon, $disc, $ppn, $total, $tgl);
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

    //Laporan Pembelian
    public function Laporan_pembelian_hibah()
    {
        $this->load->view('assets/_header');
        $page_data['judul'] = 'OBAT HIBAH';
        $page_data['url'] = 'Logistik_farmasi/Tampil_laporan_pembelian_hibah';
        $page_data['page_content'] = 'page_content/Laporan_pembelian_farmasi_pebal';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_pembelian_hibah()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Logistik_farmasi->selectRangeLaporanPembelianHibah($mulai, $akhir);
        } else {
            $tgl = date('Y-m-d');
            $page_data = $this->M_Logistik_farmasi->selectRangeLaporanPembelianHibah($tgl, $tgl);
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $id_logistik = $page_data[$i]->id_logistik;
            $no = " " . $page_data[$i]->no_faktur;
            $kode = $page_data[$i]->kode;
            $standar = $page_data[$i]->standar;
            $distributor = $page_data[$i]->id_produsen;
            $nama = $page_data[$i]->nama;
            $no_batch = $page_data[$i]->no_batch;
            $zat_aktif = $page_data[$i]->zat_aktif;
            $nama_produsen = $page_data[$i]->nama_produsen;
            $tipe = $page_data[$i]->tipe;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $frek = $page_data[$i]->frek;
            $harga_beli = $page_data[$i]->harga_beli;
            $diskon = $page_data[$i]->diskon_rs;
            $disc = $diskon / 100 * $harga_beli * $frek;
            $ppn = $page_data[$i]->ppn;
            $total = $harga_beli * $frek;
            $total = round(($harga_beli * (1 + $ppn / 100)) * $frek, 2);
            // $total = $page_data[$i]->total;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime(" %d %B %Y", $time);
            $out[$i] = array($id_logistik, $no, $kode, $standar, $distributor, $nama, $no_batch, $nama_produsen, $tipe, $golongan_obat, $zat_aktif, $frek,  $frek, $frek - $frek, $harga_beli, $diskon, $disc, $ppn, $total, $tgl);
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


    //END
    //Laporan Pembelian Obat Kundur
    public function Laporan_po_kundur()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_po_kundur';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_po_kundur()
    {
        $page_data = $this->M_Logistik_farmasi->selectLaporanPoKundur();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $button = "<div class='btn btn-success btn-icon-anim btn-square' onclick='tampilPermintaanObat(\"" . $page_data[$i]->id_req . "\")'><i class='icon-pencil'></i></div>";

            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $no = $i + 1;
            $status = $page_data[$i]->status;

            $out[$i] = array($no, $button, $tgl, $waktu, $status);
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

    public function tampil_list_tindakan()
    {
        $id_req = $this->input->post('id_req');
        $page_data = $this->M_Logistik_farmasi->selectTindakanById($id_req);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $jml_terima = $page_data[$i]->jml_terima;
            $harga_cost = $page_data[$i]->harga_cost;
            $total = $harga_cost * $jml_terima;
            $out[$i] = array($no, $nama, $tipe, $jml_terima, $harga_cost, $total);
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
    public function getHarga()
    {
        $id_req = $this->input->post('id_req');
        $db = $this->M_Logistik_farmasi->getTotal($id_req);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    //END
    public function Laporan_Cetak_so()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Cetak_so';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    //Laporan Aktif
    public function Laporan_aktif()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_aktif';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function tampil_list_faktur21()
    {
        $idFaktur = $this->input->post('idFaktur');
        $page_data = $this->M_Logistik_farmasi->getDataFaktur21($idFaktur);
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            if ($page_data[$i]->status == 1) {
                $hapus =  "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail .  "\")'><i class='icon-trash'></i></a>";
                $status = "<span class='label label-success capitalize-font inline-block'>terpenuhi</span>";
            } else {

                $hapus =  "<a class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_faktur(\"" . $page_data[$i]->id_detail .  "\")'><i class='icon-trash'></i></a>";

                $status = "<span class='label label-danger capitalize-font inline-block'>belum</span>";
            }

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $harga = $page_data[$i]->harga;
            $jumlah = $page_data[$i]->jumlah;
            $diskon = $page_data[$i]->diskon;
            $ppn = $page_data[$i]->ppn;
            $total = $page_data[$i]->total;

            $out[$i] = array($no, $nama, $harga, $jumlah, $diskon, $ppn, $total, $status, $hapus,);
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

    //END

    public function Tampil_cetak_so()
    {
        $page_data = $this->M_Logistik_farmasi->selectCetakSo();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $id_logistik = $page_data[$i]->id_logistik;
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $stok = $page_data[$i]->stok;
            $standar = $page_data[$i]->standar;
            $harga_cost = $page_data[$i]->harga_cost;
            $hargappn = $page_data[$i]->harga_cost * (1 + ($page_data[$i]->ppn / 100));
            $hargappn = intval($hargappn);
            $golongan_obat = $page_data[$i]->golongan_obat;
            $produsen = $page_data[$i]->produsen;

            $diskon = $this->db->query("SELECT diskon_rs from detail_struk 
                 where id_logistik ='$id_logistik' ORDER BY ABS(DATEDIFF(tgl_input, NOW())) ASC limit 1");

            $kadaluarsa = $this->db->query("SELECT (kadaluarsa) exp,tgl_input from detail_struk 
            where id_logistik ='$id_logistik' 
            UNION ALL 
            SELECT (kadaluarsa) exp,tgl_input from detail_struk_bebas
            where id_logistik ='$id_logistik'
            order by tgl_input desc
            ")->row();

            $kadaluarsa_past = $this->db->query("SELECT max(kadaluarsa) exp from stok_logistik 
            where id_logistik ='$id_logistik'")->row();

            $nilaidiskon = (count($diskon->result()) > 0) ? round(($diskon->row()->diskon_rs / 100), 2) : 0;
            $hnadiskon = round($harga_cost * (1 - $nilaidiskon));
            $exp = isset($kadaluarsa->exp) ? date('d-m-Y', strtotime($kadaluarsa->exp)) : (isset($kadaluarsa_past->exp) ? date('d-m-Y', strtotime($kadaluarsa_past->exp)) : '-');

            $out[$i] = array($no, $id_logistik, $nama, $exp, $tipe, $stok, $harga_cost, $nilaidiskon, $hargappn, $hnadiskon, '', $golongan_obat, $produsen, $standar);
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


    //Cetak So IGD
    public function Laporan_Cetak_soApotik()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Cetak_soApotik';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_cetak_soApotik()
    {
        $page_data = $this->M_Logistik_farmasi->selectCetakSoApotik();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $stok = $page_data[$i]->stok;
            $produsen = $page_data[$i]->produsen;

            $out[$i] = array($no, $nama, $tipe, $stok, '', $produsen);
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


    //Riwayat Penarikan
    public function Riwayat_penarikan()
    {
        $this->load->view('assets/_header');
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        $page_data['page_content'] = 'page_content/Riwayat_penarikan';
        //$page_data['unit'] = $this->db->get('admin_logistik_farmasi')->result_array();
        $page_data['unit'] = $this->M_Logistik_farmasi->getUnitPenarikan();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function getObatByUnit()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        $id_unit = $this->input->post('id_unit');
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $id_unit])->row();

        $query = $this->db->query("SELECT sl.id_logistik,l.nama , SUM(sl.frek) stok,produsen FROM `$data_adm->stok` sl, list_logistik l WHERE sl.id_logistik=l.id_logistik GROUP BY sl.id_logistik having stok>0 order by nama ")->result_array();

        $out = $query;
        echo json_encode($out);
    }

    public function getTglExp()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        $id_unit = $this->input->post('id_unit');
        $id_logistik = $this->input->post('id_logistik');
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $id_unit])->row();

        $query = $this->db->query("SELECT sum(s.frek) stok, s.kadaluarsa, l.margin, l.harga_cost,l.id_logistik,l.nama FROM `$data_adm->stok` s, list_logistik l WHERE l.id_logistik=s.id_logistik AND s.id_logistik = '$id_logistik' GROUP BY s.kadaluarsa ORDER BY sum(s.frek)>0")->result_array();

        $out = $query;
        echo json_encode($out);
    }

    public function getObatById()
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;

        $id_logistik = $this->input->post('id_logistik');
        if ($tipe == "apotik") {
            $query = $this->db->query("SELECT sum(s.frek) stok, max(s.kadaluarsa) kadaluarsa, l.margin, l.harga_cost,l.id_logistik,l.nama,l.ppn FROM stok_apotik s, list_logistik l WHERE l.id_logistik=s.id_logistik AND s.id_logistik = '$id_logistik'")->row_array();
        } else if ($tipe == "ranapapotik" || $tipe == "deporanap") {
            $query = $this->db->query("SELECT sum(s.frek) stok, max(s.kadaluarsa) kadaluarsa, l.margin, l.harga_cost,l.id_logistik,l.nama,l.ppn FROM stok_depo s, list_logistik l WHERE l.id_logistik=s.id_logistik AND s.id_logistik = '$id_logistik' ")->row_array();
        } else if ($tipe == "logistik farmasi") {
            $query = $this->db->query("SELECT sum(s.frek) stok, max(s.kadaluarsa) kadaluarsa, l.margin, l.harga_cost,l.id_logistik,l.nama,l.ppn FROM stok_logistik s, list_logistik l WHERE l.id_logistik=s.id_logistik AND s.id_logistik = '$id_logistik'")->row_array();
        }
        $out = $query;
        echo json_encode($out);
    }
    public function Tampil_riwayat_penarikan()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Logistik_farmasi->selectRangeRiwayatPenarikanObat($mulai, $akhir);
        } else {
            $page_data = $this->M_Logistik_farmasi->selectRiwayatPenarikanObat();
        }


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;
            // $button = "<div class='btn btn-success btn-icon-anim btn-square' onclick='tampilDetailRequest(\"".$page_data[$i]->id_req."\")'><i class='icon-rocket'></i></div>";
            $nama = $page_data[$i]->nama;
            $kadaluarsa = $page_data[$i]->kadaluarsa;

            $tgl = $page_data[$i]->tgl;
            $asal_tujuan = $page_data[$i]->asal_tujuan;
            $frek = $page_data[$i]->frek;
            $staff = $page_data[$i]->staff;
            // if($page_data[$i]->status =="DIAJUKAN"){
            //     $status= "<span class='label label-info'>DIAJUKAN</span>";
            // }else if($page_data[$i]->status =="DITOLAK"){
            //     $status= "<span class='label label-danger'>DITOLAK</span>";
            // }else if($page_data[$i]->status =="DITERIMA"){
            //     $status= "<span class='label label-success'>DITERIMA</span>";
            // }
            // $keterangan = $page_data[$i]->keterangan;
            // if($page_data[$i]->status !="DIAJUKAN" || $getStok < $page_data[$i]->jml_req){
            //     $terima = "-";
            // }else{
            //     $terima = "<div class='btn btn-success btn-icon-anim btn-square' onclick='terimaLangsung(\"".$page_data[$i]->id_req. "\",\"".$page_data[$i]->tipe."\",\"".$page_data[$i]->id_logistik. "\" )'><i class='icon-like '></i></div>";
            // }
            // if($page_data[$i]->status !="DIAJUKAN"){
            //     $respon = "-";
            // }else{
            $respon = "<div class='btn btn-danger btn-icon-anim btn-square' 
                onclick='hapus(\"" . $page_data[$i]->id_stok . "\" )'>
                <i class='icon-trash '></i></div>";
            // }
            $out[$i] = array($no, $nama, $kadaluarsa, $tgl, $asal_tujuan, $frek, $staff, $respon);
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



    public function insertPenarikan()
    {
        $data_staff = $this->session->userdata('data_auth');
        $nama_unit = $this->input->post('nama_unit');
        $id_logistik = $this->input->post('id_logistik');
        $jumlah_penarikan = $this->input->post('jumlah_penarikan');
        $tgl_exp = $this->input->post('tgl_kadaluarsa');
        $now = new DateTime();
        $id_req = uniqid();
        $tgl =  date("Y-m-d H:i:s");
        if ($data_staff->tipe == "logistik farmasi") {
            if ($nama_unit == "apotik") {
                $obat = $this->M_Apotik->getSumObatApotik($id_logistik);

                $stok_penarikan = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'PENARIKAN',
                    'frek' => $jumlah_penarikan * -1,
                    'saldo' => $obat['stok'] + ($jumlah_penarikan * -1),
                    'kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
                    'asal_tujuan' => 'Logistik',
                    'id_req' => 'T_' . $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
            } else if ($nama_unit == "deporanap") {
                $obat = $this->M_Apotik->getSumObatRanap($id_logistik);

                $stok_penarikan = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'PENARIKAN',
                    'frek' => $jumlah_penarikan * -1,
                    'saldo' => $obat['stok'] + ($jumlah_penarikan * -1),
                    'kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
                    'asal_tujuan' => 'Logistik',
                    'id_req' => 'T_' . $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
            } else {
                $stok_penarikan = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'PENARIKAN',
                    'frek' => $jumlah_penarikan * -1,
                    'kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
                    'asal_tujuan' => 'Logistik',
                    'id_req' => 'T_' . $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
            }

            $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaan($id_logistik)->stok;

            $stok_logistik = array(
                'id_stok' => uniqid(),
                'id_logistik' => $id_logistik,
                'tgl' => $now->format('Y-m-d H:i:s'),
                'keterangan' => 'STOK DARI PENARIKAN',
                'frek' => $jumlah_penarikan,
                'saldo' => $getStok + ($jumlah_penarikan),
                'kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
                'asal_tujuan' => $nama_unit,
                'id_struk' => 'T_' . $id_req,
                'id_staff' => $data_staff->id_staff,
            );
            $this->M_Logistik_farmasi->insertStok($stok_logistik, 'stok_logistik');

            $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $nama_unit])->row();

            $this->M_Logistik_farmasi->insertStok($stok_penarikan, $data_adm->stok);

            $out['status'] = "success";
            echo json_encode($out);
        } else {
            $stok_penarikan = array(
                'id_stok' => uniqid(),
                'id_logistik' => $id_logistik,
                'tgl' => $now->format('Y-m-d H:i:s'),
                'keterangan' => 'PENARIKAN',
                'frek' => $jumlah_penarikan * -1,
                'kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
                'asal_tujuan' => $data_staff->tipe,
                'id_req' => 'T_' . $id_req,
                'id_staff' => $data_staff->id_staff,
            );
            $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $nama_unit])->row();

            $this->M_Logistik_farmasi->insertStok($stok_penarikan, $data_adm->stok);

            if ($data_staff->tipe == "apotik") {
                $obat = $this->M_Apotik->getSumObatApotik($id_logistik);

                $stok_depo = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'STOK DARI PENARIKAN',
                    'frek' => $jumlah_penarikan * 1,
                    'saldo' => $obat['stok'] + ($jumlah_penarikan),
                    'kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
                    'asal_tujuan' => $nama_unit,
                    'id_req' => 'T_' . $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
                $this->M_Logistik_farmasi->insertStok($stok_depo, 'stok_apotik');
                $this->M_Apotik->update_perencanaan($id_logistik, 'stok_apotik', 'pr_apotik');
            } else if ($data_staff->tipe == "deporanap") {
                $obat = $this->M_Apotik->getSumObatRanap($id_logistik);

                $stok_depo = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'STOK DARI PENARIKAN',
                    'frek' => $jumlah_penarikan * 1,
                    'saldo' => $obat['stok'] + ($jumlah_penarikan),
                    'kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
                    'asal_tujuan' => $nama_unit,
                    'id_req' => 'T_' . $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
                $this->M_Logistik_farmasi->insertStok($stok_depo, 'stok_depo');
                $this->M_Apotik->update_perencanaan($id_logistik, 'stok_depo', 'pr_depo');
            }
            $out['status'] = "success";
            echo json_encode($out);
        }
    }

    public function hapus_penarikan()
    {
        $data_staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_faktur');

        $now = new DateTime();
        $tgl =  date("Y-m-d H:i:s");
        $data_adm1 = $this->db->get_where('admin_logistik_farmasi', ['unit' => $data_staff->tipe])->row();
        $data_tarik = $this->db->get_where($data_adm1->stok, ['id_stok' => $id])->row();
        $nama_unit = $data_tarik->asal_tujuan;
        $id_logistik = $data_tarik->id_logistik;
        $jumlah_penarikan = $data_tarik->frek;
        $exp = $data_tarik->kadaluarsa;
        $id_req =  ($data_staff->tipe == "logistik farmasi") ? $data_tarik->id_struk : $data_tarik->id_req;

        if ($data_staff->tipe == "logistik farmasi") {

            if ($data_tarik == "apotik") {
                $obat = $this->M_Apotik->getSumObatApotik($id_logistik);

                $stok_penarikan = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'BATAL PENARIKAN',
                    'frek' => $jumlah_penarikan,
                    'saldo' => $obat['stok'] + ($jumlah_penarikan),
                    'kadaluarsa' => $exp,
                    'asal_tujuan' => 'Logistik',
                    'id_req' =>  $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
            } else if ($nama_unit == "deporanap") {
                $obat = $this->M_Apotik->getSumObatRanap($id_logistik);

                $stok_penarikan = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'BATAL PENARIKAN',
                    'frek' => $jumlah_penarikan,
                    'saldo' => $obat['stok'] + ($jumlah_penarikan),
                    'kadaluarsa' => $exp,
                    'asal_tujuan' => 'Logistik',
                    'id_req' =>  $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
            } else {
                $stok_penarikan = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'BATAL PENARIKAN',
                    'frek' => $jumlah_penarikan,
                    'kadaluarsa' => $exp,
                    'asal_tujuan' => 'Logistik',
                    'id_req' => $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
            }

            $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaan($id_logistik)->stok;

            $stok_logistik = array(
                'id_stok' => uniqid(),
                'id_logistik' => $id_logistik,
                'tgl' => $now->format('Y-m-d H:i:s'),
                'keterangan' => 'BATAL PENARIKAN',
                'frek' => $jumlah_penarikan * -1,
                'saldo' => $getStok + ($jumlah_penarikan * -1),
                'kadaluarsa' => $exp,
                'asal_tujuan' => $nama_unit,
                'id_struk' =>  $id_req,
                'id_staff' => $data_staff->id_staff,
            );
            $this->M_Logistik_farmasi->insertStok($stok_logistik, 'stok_logistik');

            $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $nama_unit])->row();


            $this->M_Logistik_farmasi->insertStok($stok_penarikan, $data_adm->stok);
            if ($data_tarik == "apotik") {
                $this->M_Apotik->update_perencanaan($id_logistik, 'stok_apotik', 'pr_apotik');
            } else if ($data_staff->tipe == "deporanap") {
                $this->M_Apotik->update_perencanaan($id_logistik, 'stok_depo', 'pr_depo');
            }

            $out['status'] = "success";
            echo json_encode($out);
        } else {
            $stok_penarikan = array(
                'id_stok' => uniqid(),
                'id_logistik' => $id_logistik,
                'tgl' => $now->format('Y-m-d H:i:s'),
                'keterangan' => 'BATAL PENARIKAN',
                'frek' => $jumlah_penarikan,
                'kadaluarsa' => $exp,
                'asal_tujuan' => $data_staff->tipe,
                'id_req' => $id_req,
                'id_staff' => $data_staff->id_staff,
            );
            $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $nama_unit])->row();

            $this->M_Logistik_farmasi->insertStok($stok_penarikan, $data_adm->stok);

            if ($data_staff->tipe == "apotik") {
                $obat = $this->M_Apotik->getSumObatApotik($id_logistik);

                $stok_depo = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'BATAL PENARIKAN',
                    'frek' => $jumlah_penarikan * -1,
                    'saldo' => $obat['stok'] + ($jumlah_penarikan * -1),
                    'kadaluarsa' => $exp,
                    'asal_tujuan' => $nama_unit,
                    'id_req' => $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
                $this->M_Logistik_farmasi->insertStok($stok_depo, 'stok_apotik');
                $this->M_Apotik->update_perencanaan($id_logistik, 'stok_apotik', 'pr_apotik');
            } else if ($data_staff->tipe == "deporanap") {
                $obat = $this->M_Apotik->getSumObatRanap($id_logistik);

                $stok_depo = array(
                    'id_stok' => uniqid(),
                    'id_logistik' => $id_logistik,
                    'tgl' => $now->format('Y-m-d H:i:s'),
                    'keterangan' => 'BATAL PENARIKAN',
                    'frek' => $jumlah_penarikan * -1,
                    'saldo' => $obat['stok'] + ($jumlah_penarikan * -1),
                    'kadaluarsa' => $exp,
                    'asal_tujuan' => $nama_unit,
                    'id_req' => $id_req,
                    'id_staff' => $data_staff->id_staff,
                );
                $this->M_Logistik_farmasi->insertStok($stok_depo, 'stok_depo');
                $this->M_Apotik->update_perencanaan($id_logistik, 'stok_depo', 'pr_depo');
            }
            $out['status'] = "success";
            echo json_encode($out);
        }
    }


    //Riwayat Permintaan Obat
    public function Riwayat_permintaan()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_permintaan_obat_farmasi_logistik';
        //$page_data['obat'] = $this->db->query("SELECT l.id_logistik,l.nama,l.produsen FROM stok_logistik s, list_logistik l WHERE l.id_logistik=s.id_logistik group by l.id_logistik")->result_array();
        $page_data['obat'] = $this->db->get('list_logistik')->result_array();

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    //Riwayat Permintaan Obat Farmasi
    public function Riwayat_permintaanFarmasi()
    {
        $staf = $this->session->userdata('data_auth');
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_permintaan_obat_farmasi';

        // if($staf->tipe ="apotik"){
        //     $page_data['obat'] = $this->db->query("SELECT l.id_logistik,l.nama,l.produsen FROM stok_apotik s, list_logistik l WHERE l.id_logistik=s.id_logistik group by l.id_logistik")->result_array();

        // }else if($staf->tipe ="deporanap"){
        //     $page_data['obat'] = $this->db->query("SELECT l.id_logistik,l.nama,l.produsen FROM list_logistik l left join stok_depo s on l.id_logistik=s.id_logistik group by l.id_logistik")->result_array();

        // }else{
        $page_data['obat'] = $this->db->get('list_logistik')->result_array();
        //}
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_riwayat_permintaan()
    {
        $tgl = date("Y-m-d");
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Logistik_farmasi->selectRangeRiwayatPermintaanObat($mulai, $akhir);
        } else {
            $page_data = $this->M_Logistik_farmasi->selectRiwayatPermintaanObat();
        }


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            // $count = $this->M_Logistik_farmasi->countRiwayatPermintaan($page_data[$i]->id_req);
            // if ($count > 0) {
            $no = $i + 1;
            $print = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url() . "Logistik_farmasi/print_out_permintaan/" . $page_data[$i]->id_req . "' ><i class='icon-printer'></i></a>";;
            $button = "<div class='btn btn-success btn-icon-anim btn-square' onclick='tampilDetailRequest(\"" . $page_data[$i]->id_req . "\")'><i class='icon-rocket'></i></div>";
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe;
            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            if (strlen($page_data[$i]->indeks) >= 6) {
                $no_pesan = "PSN-" . $page_data[$i]->indeks;
            } else {
                $no_pesan =  "PSN-" . sprintf('%06d', $page_data[$i]->indeks);
            }
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $print, $button, $no_pesan, $tgl, $waktu, $tipe, $nama, $keterangan);
            // }
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

    // riwayat permintaan untuk unit
    public function Tampil_riwayat_permintaan_unit()
    {
        $data_staff = $this->session->userdata('data_auth');
        //$date = new DateTime('+1 day');
        if ($data_staff->tipe == "apotik") {
            $tipe = "unit";
        } else {
            $tipe = "depo ranap";
        }
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Logistik_farmasi->selectRangeRiwayatPermintaanObatFarmasi($mulai, $akhir);
        } else {
            $page_data = $this->M_Logistik_farmasi->selectRiwayatPermintaanObatFarmasi($tipe);
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            // $count = $this->M_Logistik_farmasi->countRiwayatPermintaan($page_data[$i]->id_req);
            // if($count>0){
            $no = $i + 1;
            $print = "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url() . "Logistik_farmasi/print_out_permintaan/" . $page_data[$i]->id_req . "' ><i class='icon-printer'></i></a>";;
            $button = "<div class='btn btn-success btn-icon-anim btn-square' onclick='tampilDetailRequest(\"" . $page_data[$i]->id_req . "\")'><i class='icon-rocket'></i></div>";
            $nama = $page_data[$i]->nama;
            $tipe = $page_data[$i]->tipe_staff;
            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            if (strlen($page_data[$i]->indeks) >= 6) {
                $no_pesan = "PSN-" . $page_data[$i]->indeks;
            } else {
                $no_pesan =  "PSN-" . sprintf('%06d', $page_data[$i]->indeks);
            }
            if ($tipe == 'rawatinap') {
                $keterangan = $page_data[$i]->ruangan;
            } else {
                $keterangan = $page_data[$i]->keterangan;
            }

            $out[$i] = array($no, $print, $button, $no_pesan, $tgl, $waktu, $tipe, $nama, $keterangan);
            //}

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



    // cetak
    public function print_out_permintaan($id_faktur)

    {
        $data['data'] = $this->M_Logistik_farmasi->getListRiwayatPermintaanObat($id_faktur);
        $data['unit'] = $this->M_Logistik_farmasi->getUnitRiwayatPermintaanObat($id_faktur);
        $this->load->view('print/cetak_riwayat_permintaan_logfar', $data);
    }

    public function Tampil_list_riwayat_permintaan_obat()
    {
        $id_req = $this->input->post('id_req');
        $page_data = $this->M_Logistik_farmasi->getListRiwayatPermintaanObat($id_req);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $exp = $this->M_Logistik_farmasi->getExpByObat($page_data[$i]->id_logistik, "stok_logistik");
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $produsen = $page_data[$i]->produsen;
            $satuan_terkecil = $page_data[$i]->satuan_terkecil;
            $tgl_exp = $exp['kadaluarsa'];
            $jml_req = $page_data[$i]->jml_req;
            $jml_terima = $page_data[$i]->jml_terima;
            $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaan($page_data[$i]->id_logistik)->stok;
            $stok = $getStok;

            $cekstok = $this->db->get_where('stok_logistik', ['id_struk' => $page_data[$i]->id_req])->row();

            if ($page_data[$i]->status == "DIAJUKAN" || ($page_data[$i]->status == "DITERIMA" && empty($cekstok))) {
                $status = "<span class='label label-info'>DIAJUKAN</span>";
            } else if ($page_data[$i]->status == "DITOLAK") {
                $status = "<span class='label label-danger'>DITOLAK</span>";
            } else if ($page_data[$i]->status == "DITERIMA" && !empty($cekstok)) {
                $status = "<span class='label label-success'>DITERIMA</span>";
            }
            $keterangan = $page_data[$i]->keterangan;
            if ($page_data[$i]->status == "DITOLAK" || ($page_data[$i]->status == "DIAJUKAN" && $getStok < $page_data[$i]->jml_req) || ($page_data[$i]->status == "DITERIMA" && !empty($cekstok))) {
                $terima = "-";
                $hapus = "-";
            } else {
                $terima = "<div class='btn btn-success btn-icon-anim btn-square' onclick='terimaLangsung(\"" . $page_data[$i]->id_req . "\",\"" . $page_data[$i]->tipe . "\",\"" . $page_data[$i]->id_logistik . "\" )'><i class='icon-like '></i></div>";
                $hapus = "<div class='btn btn-warning btn-icon-anim btn-square' onclick='hapusRequest(\"" . $page_data[$i]->id_req . "\",\"" . $nama .  "\")'><i class='icon-trash'></i></div>";
            }
            if ($page_data[$i]->status == "DIAJUKAN" || ($page_data[$i]->status == "DITERIMA" && empty($cekstok))) {
                $respon = "<div class='btn btn-warning btn-icon-anim btn-square' 
                onclick='tampilKonfirmasi(\"" . $page_data[$i]->id_req . "\",\"" . $page_data[$i]->tipe . "\",\"" . $page_data[$i]->id_logistik . "\",\"" . $page_data[$i]->id_staff . "\" )'>
                <i class='icon-hourglass '></i></div>";
                $hapus = "<div class='btn btn-warning btn-icon-anim btn-square' onclick='hapusRequest(\"" . $page_data[$i]->id_req . "\",\"" . $nama .  "\")'><i class='icon-trash'></i></div>";
            } else {
                $respon = "-";
                $hapus = "-";
            }

            $out[$i] = array($no, $terima, $respon, $nama, $produsen, $tgl_exp,  $jml_req, $jml_terima, $stok, $status, $keterangan, $hapus);
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
    //farmasi
    public function Tampil_list_riwayat_permintaan_obat_farmasi()
    {
        $data_staff = $this->session->userdata('data_auth');

        $id_req = $this->input->post('id_req');
        $page_data = $this->M_Logistik_farmasi->getListRiwayatPermintaanObat($id_req);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            if ($data_staff->tipe == "apotik") {
                $stok = "stok_apotik";
            } else {
                $stok = "stok_depo";
            }
            $exp = $this->M_Logistik_farmasi->getExpByObat($page_data[$i]->id_logistik, $stok);
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $satuan_terkecil = $page_data[$i]->satuan_terkecil;
            $produsen = $page_data[$i]->produsen;
            $tgl_exp = $exp['kadaluarsa'];
            $jml_req = $page_data[$i]->jml_req;
            $jml_terima = $page_data[$i]->jml_terima;
            $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaanFarmasi($page_data[$i]->id_logistik)->stok;
            $stok = number_format($getStok);
            if ($page_data[$i]->status == "DIAJUKAN") {
                $status = "<span class='label label-info'>DIAJUKAN</span>";
            } else if ($page_data[$i]->status == "DITOLAK") {
                $status = "<span class='label label-danger'>DITOLAK</span>";
            } else if ($page_data[$i]->status == "DITERIMA") {
                $status = "<span class='label label-success'>DITERIMA</span>";
            }
            $keterangan = $page_data[$i]->keterangan;
            if ($page_data[$i]->status != "DIAJUKAN" || $getStok < $page_data[$i]->jml_req) {
                $terima = "-";
            } else {
                $terima = "<div class='btn btn-primary btn-icon-anim btn-square' onclick='terimaLangsung(\"" . $page_data[$i]->id_req . "\",\"" . $page_data[$i]->tipe . "\",\"" . $page_data[$i]->id_logistik . "\" )'><i class='icon-like '></i></div>";
            }
            if ($page_data[$i]->status != "DIAJUKAN") {
                $respon = "-";
            } else {
                $respon = "<div class='btn btn-success btn-icon-anim btn-square' 
                onclick='tampilKonfirmasi(\"" . $page_data[$i]->id_req . "\",\"" . $page_data[$i]->tipe . "\",\"" . $page_data[$i]->id_logistik . "\",\"" . $page_data[$i]->id_staff . "\" )'>
                <i class='icon-rocket '></i></div>";
            }

            $jam = date('H');
            if ($jam < 25) {
                if ($page_data[$i]->status != "DIAJUKAN") {
                    $hapus = "-";
                } else {
                    $hapus = "<div class='btn btn-warning btn-icon-anim btn-square' onclick='hapusRequest(\"" . $page_data[$i]->id_req . "\",\"" . $nama .  "\")'><i class='icon-trash'></i></div>";
                }
            } else {
                $hapus = "-";
            }

            $out[$i] = array($no, $terima, $respon, $nama, $produsen, $tgl_exp, $jml_req, $jml_terima, $stok, $status, $keterangan,  $hapus);
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

    function hapus_request()
    {
        $id_req = $this->input->post('id_req');

        $this->M_Logistik_farmasi->delete_tindakan_permintaan($id_req, 'detail_request');
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function updateTerimaStokLogistik()
    {
        $data_staff = $this->session->userdata('data_auth');
        $id_request = $this->input->post('id_request');
        $perequest = $this->input->post('perequest');
        $idLogistik = $this->input->post('idLogistik');
        $id_form = $this->input->post('id_form');
        $now = new DateTime();
        $tgl =  date("Y-m-d H:i:s");
        $update = array(
            'id_logistik' => $idLogistik,
            'tgl_exp' => $this->input->post('tgl_exp'),
            'status' => 'DITERIMA',
            'jml_terima' => $this->input->post('jml_terima'),
            'tgl_res' => $now->format('Y-m-d H:i:s'),
            'keterangan' => $this->input->post('keterangan'),
            'jml_req' => $this->input->post('JumlahPermintaan'),
        );
        $this->M_Logistik_farmasi->update_detail_request($id_request, $update);
        $updatereq = array('status' => 'diterima');
        $this->M_Logistik_farmasi->update_request($updatereq, $id_form, 'request_obat');

        $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaan($idLogistik)->stok;

        $cek_req = $this->db->get_where('stok_logistik', ['id_struk' => $id_request])->result();

        if (count($cek_req) == 1) {
            //do nothing
        } else {

            $stok_logistik = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $now->format('Y-m-d H:i:s'),
                'keterangan' => 'MUTASI',
                'frek' => $this->input->post('jml_terima') * -1,
                'saldo' => $getStok + ($this->input->post('jml_terima') * -1),
                'kadaluarsa' => $this->input->post('tgl_exp'),
                'asal_tujuan' => $perequest,
                'id_struk' => $id_request,
                'id_staff' => $data_staff->id_staff,
            );
            $this->M_Logistik_farmasi->insertStok($stok_logistik, 'stok_logistik');
            $out['status'] = "success";

            $stok_perequest = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $now->format('Y-m-d H:i:s'),
                'keterangan' => 'MASUK',
                'frek' => $this->input->post('jml_terima'),
                'kadaluarsa' => $this->input->post('tgl_exp'),
                'asal_tujuan' => 'Logistik',
                'id_req' => $id_request,
                'id_staff' => $data_staff->id_staff,
            );


            if ($perequest == "logistik farmasi") {

                $this->M_Logistik_farmasi->insertStok($stok_perequest, 'stok_ruangan_logistik');
                $out['status'] = "success";
            } else if ($perequest == "apotik") {
                //do nothing
            } else {
                $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();

                $this->M_Logistik_farmasi->insertStok($stok_perequest, $data_adm->stok);
                $this->M_Apotik->update_perencanaan($idLogistik, 'stok_depo', 'pr_depo');
                $out['status'] = "success";
            }
        }

        $out['status'] = "success";
        echo json_encode($out);
    }
    // stok farmasi
    public function updateTerimaStokFarmasi()
    {
        $data_staff = $this->session->userdata('data_auth');
        $id_request = $this->input->post('id_request');
        $perequest = $this->input->post('perequest');
        $idLogistik = $this->input->post('idLogistik');
        $id_form = $this->input->post('id_form');
        $now = new DateTime();
        $tgl =  date("Y-m-d H:i:s");

        $dt = $this->db->get_where('detail_request', ['id_req' => $id_request]);
        $staff = $this->db->get_where('staff', ['id_staff' => $dt->row()->id_staff])->row();


        $update = array(
            'tgl_exp' => $this->input->post('tgl_exp'),
            'status' => 'DITERIMA',
            'jml_terima' => $this->input->post('jml_terima'),
            'tgl_res' => $now->format('Y-m-d H:i:s'),
            'id_logistik' => $idLogistik,
            'jml_req' => $this->input->post('JumlahPermintaan'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $this->M_Logistik_farmasi->update_detail_request($id_request, $update);
        $updatereq = array('status' => 'diterima');
        $this->M_Logistik_farmasi->update_request($updatereq, $id_form, 'request_obat');

        $id_form = $dt->row()->id_form;
        $tipe = $this->db->get_where('request_obat', ['id_req' => $id_form])->row();

        $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaanFarmasi($idLogistik)->stok;
        $id_resep = ($perequest == 'rawatinap') ? $staff->ruangan : $tipe->keterangan;

        $stok_apotik = array(
            'id_stok' => uniqid(),
            'id_logistik' => $idLogistik,
            'tgl' => $now->format('Y-m-d H:i:s'),
            'keterangan' => 'MUTASI',
            'frek' => $this->input->post('jml_terima') * -1,
            'saldo' => $getStok + ($this->input->post('jml_terima') * -1),
            'kadaluarsa' => $this->input->post('tgl_exp'),
            'asal_tujuan' => $perequest,
            'id_req' => $id_request,
            'id_staff' => $data_staff->id_staff,
            'id_resep' =>  $id_resep,

        );

        $out['status'] = "success";
        if ($perequest == 'rawatinap' || $perequest == 'rawatjalan') {
            $stok_perequest = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $now->format('Y-m-d H:i:s'),
                'keterangan' => 'MASUK',
                'frek' => $this->input->post('jml_terima'),
                'kadaluarsa' => $this->input->post('tgl_exp'),
                'asal_tujuan' => $data_staff->tipe,
                'id_req' => $id_request,
                'id_staff' => $data_staff->id_staff,
                'id_resep' =>  $id_resep,
            );
        } else {
            $stok_perequest = array(
                'id_stok' => uniqid(),
                'id_logistik' => $idLogistik,
                'tgl' => $now->format('Y-m-d H:i:s'),
                'keterangan' => 'MASUK',
                'frek' => $this->input->post('jml_terima'),
                'kadaluarsa' => $this->input->post('tgl_exp'),
                'asal_tujuan' => $data_staff->tipe,
                'id_req' => $id_request,
                'id_staff' => $data_staff->id_staff,
            );
        }


        // Potong stok depo
        if ($data_staff->tipe == "apotik") {
            $cek_req = $this->db->get_where('stok_apotik', ['id_req' => $id_request])->result();
            if (count($cek_req) == 1) {
                //do nothing
            } else {
                $this->M_Logistik_farmasi->insertStok($stok_apotik, 'stok_apotik');
                $this->M_Apotik->update_perencanaan($idLogistik, 'stok_apotik', 'pr_apotik');
                $out['status'] = "success";
            }
        } else if ($data_staff->tipe == "deporanap") {
            $cek_req = $this->db->get_where('stok_depo', ['id_req' => $id_request])->result();
            if (count($cek_req) == 1) {
                //do nothing
            } else {
                $this->M_Logistik_farmasi->insertStok($stok_apotik, 'stok_depo');
                $this->M_Apotik->update_perencanaan($idLogistik, 'stok_depo', 'pr_depo');
                $out['status'] = "success";
            }
        }

        // input data stok

        if ($perequest == "apotik") {
            if ($tipe->tipe == 'unit') {
                $this->M_Logistik_farmasi->insertStok($stok_perequest, 'stok_ruangan_apotik');
                $out['status'] = "success";
            }
            // else {
            //     $this->M_Logistik_farmasi->insertStok($stok_perequest, 'stok_apotik');
            //     $out['status'] = "success";
            // }
        } else if ($perequest == "deporanap") {
            if ($tipe->tipe == 'depo ranap') {
                $this->M_Logistik_farmasi->insertStok($stok_perequest, 'stok_ruangan_depo');
                $out['status'] = "success";
            }
            //  else {
            //     $this->M_Logistik_farmasi->insertStok($stok_perequest, 'stok_depo');
            //     $out['status'] = "success";
            // }
        } else {
            $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
            $this->M_Logistik_farmasi->insertStok($stok_perequest, $data_adm->stok);
            $out['status'] = "success";
        }



        $out['status'] = "success";
        echo json_encode($out);
    }
    public function updateTolakStokLogistik()
    {
        $id_request = $this->input->post('id_request');
        $now = new DateTime();
        $update = array(
            'status' => 'DITOLAK',
            'jml_terima' => 0,
            'tgl_res' => $now->format('Y-m-d H:i:s'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $this->M_Logistik_farmasi->update_detail_request($id_request, $update);

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function Laporan_cetak_dp()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_cetak_dp';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_laporan_dp()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        if ($this->input->post('mulai') && $this->input->post('akhir')) {
            $page_data = $this->M_Logistik_farmasi->selectDataDPRange($mulai, $akhir);
        } else {
            $page_data = $this->M_Logistik_farmasi->selectDataDP();
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_cetak_dp(\"" . $page_data[$i]->id_cetak . "\",\"" . $page_data[$i]->faktur_nomor_dp . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->no_distributor . "\",\"" . $page_data[$i]->distributor . "\",\"" . $page_data[$i]->total_keseluruhan . "\",\"" . $page_data[$i]->ppn . "\")'><i class='icon-pencil'></i></a>";
            // $hapus =    "<a class='btn btn-danger btn-icon-anim btn-square' onclick='hapus_faktur(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->id_cetak . "\")'><i class='icon-trash'></i></a>";
            $pilih = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='tampil_isi_dp(\"" . $page_data[$i]->id_faktur . "\",\"" . $page_data[$i]->no_dokumen . "\",\"" . $page_data[$i]->no_faktur . "\")'><i class='icon-note'></i></a>";
            $cetak = "<a class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' href='cetakDP/" . $page_data[$i]->id_faktur . "/" . $page_data[$i]->no_faktur . "'><i class='icon-printer'></i></a>";
            $hapus = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick=' hapus(\"" . $page_data[$i]->id_cetak . "\",\"" . $page_data[$i]->no_distributor . "\")'><i class='icon-trash '></i></button>";

            $time = strtotime($page_data[$i]->tgl_input);
            $date = strftime("%A, %d %B %Y ", $time);
            $waktu = strftime("%H:%M WIB", $time);

            $time2 = strtotime($page_data[$i]->tgl_terima);
            $date2 = strftime("%A, %d %B %Y ", $time2);

            $no = $i + 1;
            $tgl_input = $date;
            $waktu;
            $no_dp = $page_data[$i]->no_index;
            $no_distributor = $page_data[$i]->no_distributor;
            $distributor = $page_data[$i]->distributor;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $no_faktur_dp = $page_data[$i]->faktur_nomor_dp;
            $total = "Rp." . number_format($page_data[$i]->total_keseluruhan, 0, ',', '.');

            $out[$i] = array($no, $cetak, $pilih, $edit, $hapus, $tgl_input, $waktu, $no_dp, $no_distributor, $distributor, $no_dokumen, $no_faktur_dp, $date2, $total);
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


    public function updateDP()
    {
        $id_cetak = $this->input->post("id_cetak");
        $no_dokumen = $this->input->post("no_dokumen");
        $no_distributor = $this->input->post("no_distributor");
        $distributor = $this->input->post("distributor");
        $ppn = $this->input->post("ppn");

        $data = array(
            'faktur_nomor_dp' => $this->input->post("nofaktur"),
            'tgl_terima' => $this->input->post("tgl_terima"),
            'total_keseluruhan' => $this->input->post("hargafaktur"),
            'beaongkir' => $this->input->post("beaongkir"),
            'ppn' => $ppn
        );

        $where = array('id_cetak' => $id_cetak);
        $this->M_Logistik_farmasi->update_tindakan($data, $where, 'cetak_dp');

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_isi_dp()
    {
        $id_faktur = $this->input->post('id_faktur');
        $no_dokumen = $this->input->post('no_dokumen');
        $index_no = $this->input->post('nomor');

        $page_data = $this->M_Logistik_farmasi->getIsiDataDP($id_faktur, $index_no);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $nomor = $i + 1;
            $no = " " . $page_data[$i]->no_faktur;
            $kode = $page_data[$i]->kode;
            $standar = $page_data[$i]->standar;
            $nama_produsen = $page_data[$i]->nama_produsen;
            $nama = $page_data[$i]->nama;
            $no_batch = $page_data[$i]->no_batch;
            $id_prod_obat = $page_data[$i]->id_prod_obat;
            $tipe = $page_data[$i]->tipe;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $frek = $page_data[$i]->frek;
            $harga_beli = $page_data[$i]->harga_beli;
            $diskon = $page_data[$i]->diskon;
            $disc = $diskon / 100 * $harga_beli * $frek;
            $ppn = $page_data[$i]->ppn;
            $total = $harga_beli * $frek;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $tgl = strftime("%A, %d %B %Y", $time);
            $out[$i] = array($nomor, $kode, $standar, $nama_produsen, $nama, $no_batch, $id_prod_obat, $tipe, $golongan_obat, $frek,  $frek, $frek - $frek, $harga_beli, $diskon, $disc, $ppn, $total, $tgl);
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

    public function cetakDP($id_faktur, $no_faktur)
    {
        $data['data1'] = $this->M_Logistik_farmasi->getDataDp($id_faktur, $no_faktur);
        $data['data2'] = $this->M_Logistik_farmasi->getDataDp2($id_faktur);
        $data['tgl'] = $this->M_Logistik_farmasi->getTgl($id_faktur);
        $data['data_t'] = $this->M_Logistik_farmasi->getTotalDiskon($id_faktur, $no_faktur);

        $this->load->view('print/LaporanCetakDP', $data);
    }

    public function delete_dp()
    {
        $id_cetak = $this->input->post('id_cetak');
        $no_distributor = $this->input->post('no_distributor');

        $where = array('id_cetak' => $id_cetak);

        $this->M_Logistik_farmasi->delete_tindakan($where, 'cetak_dp');

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function Laporan_persediaan()
    {
        $this->load->view('assets/_header');
        $page_data['url'] = 'Logistik_farmasi/Tampil_laporan_persediaan';
        $page_data['page_content'] = 'page_content/Laporan_persediaan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    // Tambahkan fungsi ini di dalam controller Logistik_farmasi 
    public function Laporan_persediaan_dua()
    {
        $page_data['url'] = '';
        $page_data['page_content'] = 'page_content/Laporan_persediaan_dua';
        $this->load->view('assets/_header');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_laporan_persediaan()
    {
        $data_staff = $this->session->userdata('data_auth');

        $periode = $this->input->post('periode');
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $data_staff->tipe])->row();
        $stok = $data_adm->stok;


        $page_data = $this->M_Logistik_farmasi->selectLaporan_Persediaan($periode, $stok);
        // $page_data = $this->M_Logistik_farmasi->selectObatPersediaan($periode, $stok);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $id_logistik = $page_data[$i]->id_logistik;
            $nama_produsen = $page_data[$i]->produsen;
            $vendor = $page_data[$i]->distributor;
            $nama = $page_data[$i]->nama;
            $satuan_terbesar = $page_data[$i]->satuan_terbesar;
            $hna = $page_data[$i]->harga_cost;
            $ppn = $page_data[$i]->ppn;
            $hargappn = round($hna * (1 + ($ppn / 100)), 2);
            $golongan_obat = $page_data[$i]->golongan_sediaan;
            $standar = $page_data[$i]->standar;
            $kode = $page_data[$i]->kode;
            $harga_persediaan = $page_data[$i]->harga_persediaan;


            // $tgl_faktur = isset($harga_beli)?$harga_beli->tgl_input:0;

            // $stok_awal = $this->M_Logistik_farmasi->getStokAwal($periode, $stok, $id_logistik);
            // $stok_awal = isset($stok_awal) ? $stok_awal->jumlah : 0;

            // $penerimaan = $this->M_Logistik_farmasi->getStokPenerimaan($periode, $stok, $id_logistik);
            // $penerimaan = isset($penerimaan) ? $penerimaan->jumlah : 0;

            // $pengeluaran = $this->M_Logistik_farmasi->getStokPengeluaran($periode, $stok, $id_logistik);
            // $pengeluaran = isset($pengeluaran) ? abs($pengeluaran->jumlah) : 0;

            // $stok_akhir = $this->M_Logistik_farmasi->getStokSekarang($periode, $stok, $id_logistik);
            // $stok_akhir = isset($stok_akhir) ? $stok_akhir->jumlah : 0;

            $stok_awal =  $page_data[$i]->awal;
            $penerimaan =  $page_data[$i]->masuk;
            $pengeluaran =  abs($page_data[$i]->keluar);
            $stok_akhir =  $page_data[$i]->akhir;


            $data_struk = $this->M_Logistik_farmasi->getHargaBeli($periode, $id_logistik);

            $data_struk_last = $this->M_Logistik_farmasi->getHargaBeli_last($periode, $id_logistik);
            if ($penerimaan == 0) {
                $harga_beli = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? round($data_struk_last->harga_beli, 2) : $harga_persediaan;
                $distributor = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? $data_struk_last->id_produsen : $vendor;
                $tgl_struk = (isset($data_struk_last) && $data_struk_last->harga_beli > 0)  ? date('d-m-Y', strtotime($data_struk_last->tgl_struk)) : '-';
                $tgl_exp = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? date('d-m-Y', strtotime($data_struk_last->tgl_exp)) : '-';
            } else {
                if ($data_staff->tipe == "logistik farmasi") {
                    $harga_beli = isset($data_struk) ? round($data_struk->harga_beli, 2) : 0;
                    $distributor = isset($data_struk) ? $data_struk->id_produsen : '-';
                    $tgl_struk = isset($data_struk->tgl_struk) ? date('d-m-Y', strtotime($data_struk->tgl_struk)) : '-';
                    $tgl_exp = isset($data_struk->tgl_exp) ? date('d-m-Y', strtotime($data_struk->tgl_exp)) : '-';
                } else {
                    $harga_beli = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? round($data_struk_last->harga_beli, 2) : $harga_persediaan;
                    $distributor = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? $data_struk_last->id_produsen : $vendor;
                    $tgl_struk = (isset($data_struk_last) && $data_struk_last->harga_beli > 0)  ? date('d-m-Y', strtotime($data_struk_last->tgl_struk)) : '-';
                    $tgl_exp = (isset($data_struk_last) && $data_struk_last->harga_beli > 0) ? date('d-m-Y', strtotime($data_struk_last->tgl_exp)) : '-';
                }
            }

            $harga_beli = $harga_beli;
            $nilai_awal = round($page_data[$i]->harga_persediaan_last * $stok_awal, 2);
            $nilai_terima = round($harga_persediaan * $penerimaan, 2);
            $nilai_pakai = round($harga_persediaan * $pengeluaran, 2);
            $nilai_akhir = round($nilai_awal + $nilai_terima - $nilai_pakai, 2);
            $nilai_persediaan = $harga_persediaan * $stok_akhir;


            // $tgl_faktur = $tgl_faktur;

            $out[$i] = array($id_logistik, $nama, $nama_produsen, $distributor, $satuan_terbesar, $hargappn, $harga_beli, $harga_persediaan, $tgl_struk, $tgl_exp, $stok_awal, $penerimaan, $pengeluaran, $stok_akhir, $nilai_awal, $nilai_terima, $nilai_pakai, $nilai_akhir, $golongan_obat, $standar, $kode);
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
