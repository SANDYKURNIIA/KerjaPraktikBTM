<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Jasamedis extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Jasamedis');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_jasamedis';
        $page_data['url'] = 'Jasamedis/tampil_jasmed';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tes()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_jasamedis_tes';
        $page_data['url'] = 'Jasamedis/tampil_jasmed_dokter';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function tampil_jasmed()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $jenis_klaim = $this->input->post('jenis_klaim');
        $dokter = $this->input->post('dokter');
        if ($dokter == '-') {
            $page_data = $this->M_Jasamedis->selectLaporanRangeJasmed($first_date, $second_date, $jenis_pelayanan, $jenis_klaim);
        } else {
            $page_data = $this->M_Jasamedis->selectLaporanRangeJasmed_bydokter($first_date, $second_date, $jenis_pelayanan, $jenis_klaim, $dokter);
        }

        for ($i = 0; $i < count($page_data); $i++) {
            $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);
            $tgl_keluar = indo_date2($page_data[$i]->tgl_keluar);

            $no = $i + 1;

            $no_rm = $page_data[$i]->no_rm;
            // $poli = $page_data[$i]->poli;
            $pasien = $page_data[$i]->pasien;
            $tindakan = $page_data[$i]->tindakan;
            $no_sep = $page_data[$i]->no_sep;
            $jasa_dokter = $page_data[$i]->jasa_dokter;
            $biaya_rs = $page_data[$i]->biaya_rs;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $dokter = $page_data[$i]->dokter;
            $total = $page_data[$i]->total;
            $ket = $page_data[$i]->jenis_pelayanan;
            if ($this->input->post('dokter') == '-') {
                $ruangan = ($jenis_pelayanan == 'UGD RAJAL' ||  $jenis_pelayanan == 'UGD RANAP') ? '-' : $page_data[$i]->nama_ruangan;
            } else {
                $ruangan = '-';
            }
            $frek = $page_data[$i]->frek;

            if ($page_data[$i]->jenis_pelayanan == 'KAMAR OPERASI') {
                if ($cara_bayar == 'BPJS') {
                    if (preg_match('/operator/i', $tindakan)) { //operator 
                        $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (60 / 100); //dokter
                    } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                        $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (20 / 100); //dokter
                    } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                        $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (20 / 100); //dokter
                    } else {
                        $jumlah = $jasa_dokter * $page_data[$i]->frek; //dokter
                    }
                } else if (preg_match('/TIMAH/i', $cara_bayar)) {
                    if (preg_match('/operator/i', $tindakan)) { //operator 
                        $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (50 / 100); //dokter
                    } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                        $jumlah = (($jasa_dokter * $page_data[$i]->frek * 100) / 40) * (40 / 100) * (50 / 100); //dokter
                    } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                        $jumlah = (($jasa_dokter * $page_data[$i]->frek * 100) / 30) * (30 / 100) * (50 / 100); //dokter
                    } else {
                        $jumlah = $jasa_dokter * $page_data[$i]->frek; //dokter
                    }
                } else {
                    $jumlah = $jasa_dokter * $page_data[$i]->frek; //dokter
                }
            } else {
                if (preg_match('/BPJS/i', $cara_bayar)) {
                    if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                        if ($jenis_pelayanan == 'UGD RAJAL' || $jenis_pelayanan == 'POLI') {
                            $jumlah = ($page_data[$i]->dokter_spes == 'UMU') ? 30000 : 50000; //dokter
                        } else {
                            $jumlah = ($page_data[$i]->dokter_spes == 'UMU') ? 35000 : 50000; //dokter
                        }
                    } elseif (preg_match('/visite/i', $tindakan)) {
                        $jumlah = 50000;
                    } else { ///tindakan
                        // $jumlah = ($page_data[$i]->dokter_spes == 'UMU') ? (10000 * $page_data[$i]->frek) : (50000 * $page_data[$i]->frek); //dokter
                        $jumlah = 50000; //dokter
                    }
                } else if ($cara_bayar == 'TIMAH REGULER') {
                    if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                        $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (50 / 100); //dokter
                    } else { ///tindakan
                        $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (50 / 100); //dokter
                    }
                } else {
                    if (preg_match('/visite/i', $tindakan) || preg_match('/konsultasi/i', $tindakan)) { //konsul 
                        if ($cara_bayar == 'TIMAH PRIORITAS') {
                            $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (60 / 100); //dokter konsul timah prio
                        } else if ($page_data[$i]->jenis_pelayanan == 'POLI PRIORITAS') {
                            if (preg_match('/BAYAR SENDIRI/i', $cara_bayar)) {
                                $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (60 / 100); //dokter konsul umum prio
                            } else {
                                $jumlah = ($page_data[$i]->dokter_spes == 'UMU') ? ($jasa_dokter * $page_data[$i]->frek) * (64 / 100) : ($jasa_dokter * $page_data[$i]->frek) * (67 / 100); //konsul assuransi lainnya prio
                            }
                        } else {
                            $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (72 / 100); //konsul biasa

                        }
                    } else {
                        // if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                        //     $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (72 / 100); //dokter

                        // } else { ///tindakan
                        /////////////////////////////////////////////////
                        // if (is_numeric($jasa_dokter)) {
                        //     if (is_numeric($page_data[$i]->frek)) {
                                $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (80 / 100); //dokter
                        //     } else {
                        //         $jumlah = -1;
                        //     }
                        // } else {
                        //     $jumlah = -2;
                        // }
                        /////////////////////////////////////////////////////////
                        // }
                    }
                }
            }


            $out[$i] = array($no, $tgl_masuk, $tgl_keluar, $no_rm, $pasien, $no_sep, $tindakan,  $jasa_dokter, $frek, $jumlah, $cara_bayar, $dokter, $ket, $ruangan);
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



    public function realese()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Laporan_jasamedis_realese';
        $page_data['url'] = 'Jasamedis/tampil_jasmed_realese';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jasmed_realese()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $page_data = $this->M_Jasamedis->detailJasmed_realese($first_date, $second_date);
        $no = 0;
        foreach ($page_data as $pelayanan => $key) {
            foreach ($key as  $row) {
                $tgl_masuk = indo_date2($row->tgl_masuk);
                $tgl_keluar = indo_date2($row->tgl_keluar);

                $no = $no + 1;

                $no_rm = $row->no_rm;
                // $poli = $row->poli;
                $pasien = $row->pasien;
                $tindakan = $row->tindakan;
                $jasa_dokter = $row->jasa_dokter;
                $biaya_rs = $row->biaya_rs;
                $cara_bayar = $row->cara_bayar;
                $dokter = $row->dokter;
                $total = $row->total;
                $frek = $row->frek;

                if ($row->jenis_pelayanan == 'OK') {
                    if ($cara_bayar == 'BPJS') {
                        if (preg_match('/operator/i', $tindakan)) { //operator 
                            $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                        } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                            $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                        } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                            $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                        } else {
                            $jumlah = $jasa_dokter * $row->frek; //dokter
                        }
                    } else {
                        $jumlah = $jasa_dokter * $row->frek; //dokter
                    }
                } else {
                    if ($cara_bayar == 'BPJS') {
                        if (preg_match('/konsultasi/i', $tindakan)) { //konsul 

                            $jumlah = ($row->dokter_spes == 'UMU') ? 30000 : 50000; //dokter
                        } elseif (preg_match('/visite/i', $tindakan)) {
                            $jumlah = 50000;
                        } else { ///tindakan
                            // $jumlah = ($row->dokter_spes == 'UMU') ? (10000 * $row->frek) : (50000 * $row->frek); //dokter
                            $jumlah = 50000; //dokter
                        }
                    } else if ($cara_bayar == 'TIMAH REGULER') {
                        if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                            $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                        } else { ///tindakan
                            $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                        }
                    } else {
                        if (preg_match('/visite/i', $tindakan) || preg_match('/konsultasi/i', $tindakan)) { //konsul 
                            if ($cara_bayar == 'TIMAH PRIORITAS') {
                                $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                            } else if ($row->jenis_pelayanan == 'POLI PRIORITAS') {
                                if (preg_match('/BAYAR SENDIRI/i', $cara_bayar)) {
                                    $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                                } else {
                                    $jumlah = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (64 / 100) : ($jasa_dokter * $row->frek) * (67 / 100); //dokter
                                }
                            }
                        } else {
                            if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                                $jumlah = ($jasa_dokter * $row->frek) * (72 / 100); //dokter

                            } else { ///tindakan
                                $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                            }
                        }
                    }
                }


                $out[] = array($no, $tgl_masuk, $tgl_keluar, $no_rm, $pasien, $tindakan,  $jasa_dokter, $frek, $jumlah, $cara_bayar, $dokter);
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
    public function cetak_detail_pdf($first_date,  $second_date, $jenis)
    {
        $staff = $this->session->userdata('data_auth');

        $this->load->library('pdf');
        $judul = $jenis == 'rajal' ? 'RAWAT JALAN' : (($jenis == 'ranap') ? 'RAWAT INAP' : '');
        $this->data['title'] = 'LAPORAN JASA MEDIS ' . $judul;
        $page_data['judul'] = 'LAPORAN JASA MEDIS ' . $judul;
        // $first_date = $this->input->post('mulai');
        // $second_date = $this->input->post('akhir');
        // if ($staff->ruangan == 'jasmed') {
        //     $page_data['data'] = $this->M_Jasamedis->selectLaporanRangeJasmed($first_date, $second_date,$jenis);
        // } else {
        $page_data['data'] = $this->M_Jasamedis->detailJasmed_realese($first_date, $second_date);
        // }
        $page_data['first_date'] = $first_date;
        $page_data['second_date'] = $second_date;

        $this->dompdf->setPaper('A4', 'landscape');
        $html = $this->load->view('jurnal_print/cetak_detail_jasmed', $page_data, true);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
        $this->dompdf->render();
        $this->dompdf->stream("LAPORAN JASA MEDIS.pdf", array("Attachment" => 0));
    }
    public function cetak_detail_pdf_dokter($first_date,  $second_date, $jenis)
    {
        $this->load->library('pdf');
        $this->data['title']    = 'Laporan';

        $data = $this->M_Jasamedis->detailJasmed_realese($first_date, $second_date);
        $db = null;
        // foreach ($data as $pelayanan => $key) {
        foreach ($data as  $row) {
            $dokter = $row->dokter;

            $tindakan = $row->tindakan;
            $cara_bayar = $row->cara_bayar;
            $jasa_dokter = $row->jasa_dokter;

            if ($row->jenis_pelayanan == 'OK') {
                if ($cara_bayar == 'BPJS') {
                    if (preg_match('/operator/i', $tindakan)) { //operator 
                        $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                    } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                        $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                    } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                        $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                    } else {
                        $jumlah = $jasa_dokter * $row->frek; //dokter
                    }
                    $rs = 0;
                    $karyawan = 0;
                } else {

                    if (preg_match('/operator/i', $tindakan)) { //operator 
                        $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                    } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                        $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                    } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                        $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                    } else {
                        $jumlah = $jasa_dokter * $row->frek; //dokter
                    }
                    $rs = 0;
                    $karyawan = 0;
                }
            } else {
                if ($cara_bayar == 'BPJS') {
                    if (preg_match('/konsultasi/i', $tindakan)) { //konsul 

                        $jumlah = ($row->dokter_spes == 'UMU') ? 30000 : 50000; //dokter
                        $rs = 0;
                        $karyawan = 0;
                    } elseif (preg_match('/visite/i', $tindakan)) {
                        $jumlah = 50000;
                        $rs = 0;
                        $karyawan = 0;
                    } else { ///tindakan
                        // $jumlah = ($row->dokter_spes == 'UMU') ? (10000 * $row->frek) : (50000 * $row->frek); //dokter
                        $jumlah = 50000; //dokter
                        $rs = 0;
                        $karyawan = 0;
                    }
                } else if ($cara_bayar == 'TIMAH REGULER') {

                    if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                        $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                        $rs = ($jasa_dokter * $row->frek) * (50 / 100);
                        $karyawan = 0;
                    } else { ///tindakan
                        $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                        $rs = ($jasa_dokter * $row->frek) * (50 / 100);
                        $karyawan = 0;
                    }
                } else {

                    if (preg_match('/visite/i', $tindakan) || preg_match('/konsultasi/i', $tindakan)) { //konsul 
                        if ($cara_bayar == 'TIMAH PRIORITAS') {
                            $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                            $rs = ($jasa_dokter * $row->frek) * (50 / 100);
                            $karyawan = 0;
                        } else if ($row->jenis_pelayanan == 'POLI PRIORITAS') {
                            if (preg_match('/BAYAR SENDIRI/i', $cara_bayar)) {
                                $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                                $rs = ($jasa_dokter * $row->frek) * (40 / 100);
                                $karyawan = 0;
                            } else {
                                $jumlah = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (64 / 100) : ($jasa_dokter * $row->frek) * (67 / 100); //dokter
                                $rs = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (21 / 100) : ($jasa_dokter * $row->frek) * (18 / 100); //dokter
                                $karyawan = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (15 / 100) : ($jasa_dokter * $row->frek) * (15 / 100); //dokter
                            }
                        } else {
                            $jumlah = ($jasa_dokter * $row->frek) * (72 / 100); //dokter
                            $rs = ($jasa_dokter * $row->frek) * (18 / 100);
                            $karyawan = ($jasa_dokter * $row->frek) * (10 / 100);
                        }
                    } else { ///tindakan
                        $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                        $rs = ($jasa_dokter * $row->frek) * (5 / 100);
                        $karyawan = ($jasa_dokter * $row->frek) * (15 / 100);
                    }
                }
            }
            $db[] = array(
                'dokter' => $dokter,
                'jasa_dokter' => $jasa_dokter,
                'frek' => $row->frek,
                'diskon_konsul' => $row->diskon_konsul,
                'diskon_visite' => $row->diskon_visite,
                'jumlah' => $jumlah,
                'rs' => $rs,
                'karyawan' => $karyawan,
            );
        }
        // }
        // print_arr($db);

        $groups = array();


        foreach ($db as $item) {
            $key = $item['dokter'];

            if (!array_key_exists($key, $groups)) {
                $groups[$key] = array(
                    'dokter' => $item['dokter'],
                    'jasa_dokter' => $item['jasa_dokter'],
                    'total' => $item['jasa_dokter'] * $item['frek'],
                    'diskon' => $item['diskon_konsul'] + $item['diskon_visite'],
                    'jasmed' => $item['jumlah'],
                    'rs' => $item['rs'],
                    'karyawan' => $item['karyawan'],
                );
            } else {
                $groups[$key]['jasa_dokter'] = $groups[$key]['jasa_dokter'] + $item['jasa_dokter'];
                $groups[$key]['total'] = $groups[$key]['total'] + ($item['jasa_dokter'] * $item['frek']);
                $groups[$key]['diskon'] = $groups[$key]['diskon'] + ($item['diskon_konsul'] + $item['diskon_visite']);
                $groups[$key]['jasmed'] = $groups[$key]['jasmed'] + $item['jumlah'];
                $groups[$key]['rs'] = $groups[$key]['rs'] + $item['rs'];
                $groups[$key]['karyawan'] = $groups[$key]['karyawan'] + $item['karyawan'];
            }
        }

        // print_arr($groups);

        $page_data['first_date'] = $first_date;
        $page_data['second_date'] = $second_date;
        $page_data['data'] = $groups;

        $this->dompdf->setPaper('A4', 'landscape');
        $html = $this->load->view('jurnal_print/cetak_jasmed_dokter', $page_data, true);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
        $this->dompdf->render();
        $this->dompdf->stream("Rekapitulasi Pasien.pdf", array("Attachment" => 0));
    }
    public function cetak_pasien_dokter($first_date,  $second_date, $id_dokter, $jenis)
    {
        $this->load->library('pdf');
        $this->data['title']    = 'Laporan';


        $data = $this->M_Jasamedis->detailpasien_realese_bydokter($first_date, $second_date, $id_dokter);

        if (empty($data)) {
            echo "<script type='text/javascript'>alert('Data tidak ada');window.history.go(-1);</script>";
        } else {

            foreach ($data as  $row) {


                $tindakan = $row->tindakan;
                $cara_bayar = $row->cara_bayar;
                $jasa_dokter = $row->jasa_dokter;
                $freq = $row->frek;

                if ($row->jenis_pelayanan == 'OK') {
                    if ($cara_bayar == 'BPJS') {
                        if (preg_match('/operator/i', $tindakan)) { //operator 
                            $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                        } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                            $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                        } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                            $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                        } else {
                            $jumlah = $jasa_dokter * $row->frek; //dokter
                        }
                    } else {
                        if (preg_match('/operator/i', $tindakan)) { //operator 
                            $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                        } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                            $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                        } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                            $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                        } else {
                            $jumlah = $jasa_dokter * $row->frek; //dokter
                        }
                    }
                    $konsul = 0;
                    $biaya = $jasa_dokter;
                } else {
                    if ($cara_bayar == 'BPJS') {
                        if (preg_match('/konsultasi/i', $tindakan)) { //konsul 

                            $jumlah = ($row->dokter_spes == 'UMU') ? 30000 : 50000; //dokter
                            $konsul = $jasa_dokter;
                            $biaya = 0;
                        } elseif (preg_match('/visite/i', $tindakan)) {
                            $jumlah = 50000;
                            $konsul = $jasa_dokter;
                            $biaya = 0;
                        } else { ///tindakan
                            // $jumlah = ($row->dokter_spes == 'UMU') ? (10000 * $row->frek) : (50000 * $row->frek); //dokter
                            $jumlah = 50000; //dokter
                            $konsul = 0;
                            $biaya = $jasa_dokter;
                        }
                    } else if ($cara_bayar == 'TIMAH REGULER') {

                        if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                            $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                            $konsul = $jasa_dokter;
                            $biaya = 0;
                        } else { ///tindakan
                            $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                            $konsul = 0;
                            $biaya = $jasa_dokter;
                        }
                    } else {

                        if (preg_match('/visite/i', $tindakan) || preg_match('/konsultasi/i', $tindakan)) { //konsul 
                            if ($cara_bayar == 'TIMAH PRIORITAS') {
                                $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                            } else if ($row->jenis_pelayanan == 'POLI PRIORITAS') {
                                if (preg_match('/BAYAR SENDIRI/i', $cara_bayar)) {
                                    $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                                } else {
                                    $jumlah = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (64 / 100) : ($jasa_dokter * $row->frek) * (67 / 100); //dokter
                                }
                            } else {
                                $jumlah = ($jasa_dokter * $row->frek) * (72 / 100); //dokter
                            }
                            $konsul = $jasa_dokter;
                            $biaya = 0;
                        } else { ///tindakan
                            $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                            $konsul = 0;
                            $biaya = $jasa_dokter;
                        }
                    }
                }
                $db[] = array(
                    'id_pelayanan' => $row->id_pelayanan,
                    'jasa_dokter' => $jasa_dokter,
                    'frek' => $row->frek,
                    'diskon_konsul' => $row->diskon_konsul,
                    'diskon_visite' => $row->diskon_visite,
                    'jumlah' => $jumlah,
                    'konsul' => $konsul,
                    'biaya' => $biaya,
                    'nama' => $row->pasien,
                    'no_rm' => $row->no_rm,
                    'tgl_masuk' => $row->tgl_masuk,
                    'tgl_keluar' => $row->tgl_keluar,
                    'jenis_pelayanan' => $row->jenis_pelayanan,
                    'cara_bayar' => $cara_bayar,
                    'jasmed_konsul' => $konsul != 0 ? $jumlah : 0,
                    'jasmed_tindakan' => $biaya != 0 ? $jumlah : 0,
                );
            }

            // print_arr($db);

            $groups = array();


            foreach ($db as $item) {
                $key = $item['id_pelayanan'];

                if (!array_key_exists($key, $groups)) {
                    $groups[$key] = array(
                        'id_pelayanan' => $item['id_pelayanan'],
                        'jasa_dokter' => $item['jasa_dokter'],
                        'total' => $item['jasa_dokter'] * $item['frek'],
                        'konsul' => $item['konsul'] * $item['frek'],
                        'biaya' => $item['biaya'] * $item['frek'],
                        'diskon' => $item['diskon_konsul'] + $item['diskon_visite'],
                        'jasmed' => $item['jumlah'],
                        'pasien' => $item['nama'],
                        'no_rm' => $item['no_rm'],
                        'tgl_masuk' => $item['tgl_masuk'],
                        'tgl_keluar' => $item['tgl_keluar'],
                        'jenis_pelayanan' => $item['jenis_pelayanan'],
                        'cara_bayar' => $item['cara_bayar'],
                        'jasmed_konsul' => $item['jasmed_konsul'],
                        'jasmed_tindakan' => $item['jasmed_tindakan'],
                    );
                } else {
                    $groups[$key]['jasa_dokter'] = $groups[$key]['jasa_dokter'] + $item['jasa_dokter'];
                    $groups[$key]['total'] = $groups[$key]['total'] + ($item['jasa_dokter'] * $item['frek']);
                    $groups[$key]['konsul'] = $groups[$key]['konsul'] + ($item['konsul'] * $item['frek']);
                    $groups[$key]['biaya'] = $groups[$key]['biaya'] + ($item['biaya'] * $item['frek']);
                    $groups[$key]['diskon'] = $groups[$key]['diskon'] + ($item['diskon_konsul'] + $item['diskon_visite']);
                    $groups[$key]['jasmed'] = $groups[$key]['jasmed'] + $item['jumlah'];
                    $groups[$key]['jasmed_konsul'] = $groups[$key]['jasmed_konsul'] + ($item['jasmed_konsul']);
                    $groups[$key]['jasmed_tindakan'] = $groups[$key]['jasmed_tindakan'] + ($item['jasmed_tindakan']);
                }
            }

            // print_arr($groups);

            $page_data['first_date'] = $first_date;
            $page_data['second_date'] = $second_date;
            $page_data['dokter'] = $data[0]->dokter;
            $page_data['data'] = $groups;

            $this->dompdf->setPaper('A4', 'landscape');
            $html = $this->load->view('jurnal_print/cetak_pasien_jasmed_dokter', $page_data, true);
            $this->dompdf->loadHtml($html);
            $this->dompdf->setPaper('A4', 'landscape');
            $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
            $this->dompdf->render();
            $this->dompdf->stream("Rekapitulasi Pasien.pdf", array("Attachment" => 0));
        }
    }

    ///////////////////////////////////EXCEL////////////////////////////////////////////// 
    public function cetak_detail_excel($first_date,  $second_date, $jenis)
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


        // $first_date = $this->input->post('mulai');
        // $second_date = $this->input->post('akhir');
        $page_data['data'] = $this->M_Jasamedis->detailJasmed_realese($first_date, $second_date);
        $page_data['first_date'] = $first_date;
        $page_data['second_date'] = $second_date;

        $this->dompdf->setPaper('A4', 'landscape');
        $html = $this->load->view('jurnal_print/cetak_detail_jasmed', $page_data, true);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
        $this->dompdf->render();
        $this->dompdf->stream("Rekapitulasi Pasien.pdf", array("Attachment" => 0));
    }
    public function cetak_detail_excel_dokter($first_date,  $second_date)
    {
        $this->load->library('pdf');
        $this->data['title']    = 'Laporan';

        $data = $this->M_Jasamedis->detailJasmed_realese($first_date, $second_date);
        $db = null;
        foreach ($data as $pelayanan => $key) {
            foreach ($key as  $row) {
                $dokter = $row->dokter;

                $tindakan = $row->tindakan;
                $cara_bayar = $row->cara_bayar;
                $jasa_dokter = $row->jasa_dokter;

                if ($row->jenis_pelayanan == 'OK') {
                    if (preg_match('/BPJS/i', $cara_bayar)) {
                        if (preg_match('/operator/i', $tindakan)) { //operator 
                            $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                        } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                            $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                        } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                            $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                        } else {
                            $jumlah = $jasa_dokter * $row->frek; //dokter
                        }
                        $rs = 0;
                        $karyawan = 0;
                    } else {
                        $jumlah = $jasa_dokter * $row->frek; //dokter
                        $rs = 0;
                        $karyawan = 0;
                    }
                } else {
                    if (preg_match('/BPJS/i', $cara_bayar)) {
                        if (preg_match('/konsultasi/i', $tindakan)) { //konsul 

                            $jumlah = ($row->dokter_spes == 'UMU') ? 30000 : 50000; //dokter
                            $rs = 0;
                            $karyawan = 0;
                        } elseif (preg_match('/visite/i', $tindakan)) {
                            $jumlah = 50000;
                            $rs = 0;
                            $karyawan = 0;
                        } else { ///tindakan
                            // $jumlah = ($row->dokter_spes == 'UMU') ? (10000 * $row->frek) : (50000 * $row->frek); //dokter
                            $jumlah = 50000; //dokter
                            $rs = 0;
                            $karyawan = 0;
                        }
                    } else if ($cara_bayar == 'TIMAH REGULER') {

                        if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                            $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                            $rs = ($jasa_dokter * $row->frek) * (50 / 100);
                            $karyawan = 0;
                        } else { ///tindakan
                            $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                            $rs = ($jasa_dokter * $row->frek) * (50 / 100);
                            $karyawan = 0;
                        }
                    } else {

                        if (preg_match('/visite/i', $tindakan) || preg_match('/konsultasi/i', $tindakan)) { //konsul 
                            if ($cara_bayar == 'TIMAH PRIORITAS') {
                                $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                                $rs = ($jasa_dokter * $row->frek) * (50 / 100);
                                $karyawan = 0;
                            } else if ($row->jenis_pelayanan == 'POLI PRIORITAS') {
                                if (preg_match('/BAYAR SENDIRI/i', $cara_bayar)) {
                                    $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                                    $rs = ($jasa_dokter * $row->frek) * (40 / 100);
                                    $karyawan = 0;
                                } else {
                                    $jumlah = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (64 / 100) : ($jasa_dokter * $row->frek) * (67 / 100); //dokter
                                    $rs = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (21 / 100) : ($jasa_dokter * $row->frek) * (18 / 100); //dokter
                                    $karyawan = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (15 / 100) : ($jasa_dokter * $row->frek) * (15 / 100); //dokter
                                }
                            } else {
                                $jumlah = ($jasa_dokter * $row->frek) * (72 / 100); //dokter
                                $rs = ($jasa_dokter * $row->frek) * (18 / 100);
                                $karyawan = ($jasa_dokter * $row->frek) * (10 / 100);
                            }
                        } else { ///tindakan
                            $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                            $rs = ($jasa_dokter * $row->frek) * (5 / 100);
                            $karyawan = ($jasa_dokter * $row->frek) * (15 / 100);
                        }
                    }
                }
                $db[] = array(
                    'dokter' => $dokter,
                    'jasa_dokter' => $jasa_dokter,
                    'frek' => $row->frek,
                    'diskon_konsul' => $row->diskon_konsul,
                    'diskon_visite' => $row->diskon_visite,
                    'jumlah' => $jumlah,
                    'rs' => $rs,
                    'karyawan' => $karyawan,
                );
            }
        }
        // print_arr($db);

        $groups = array();


        foreach ($db as $item) {
            $key = $item['dokter'];

            if (!array_key_exists($key, $groups)) {
                $groups[$key] = array(
                    'dokter' => $item['dokter'],
                    'jasa_dokter' => $item['jasa_dokter'],
                    'total' => $item['jasa_dokter'] * $item['frek'],
                    'diskon' => $item['diskon_konsul'] + $item['diskon_visite'],
                    'jasmed' => $item['jumlah'],
                    'rs' => $item['rs'],
                    'karyawan' => $item['karyawan'],
                );
            } else {
                $groups[$key]['jasa_dokter'] = $groups[$key]['jasa_dokter'] + $item['jasa_dokter'];
                $groups[$key]['total'] = $groups[$key]['total'] + ($item['jasa_dokter'] * $item['frek']);
                $groups[$key]['diskon'] = $groups[$key]['diskon'] + ($item['diskon_konsul'] + $item['diskon_visite']);
                $groups[$key]['jasmed'] = $groups[$key]['jasmed'] + $item['jumlah'];
                $groups[$key]['rs'] = $groups[$key]['rs'] + $item['rs'];
                $groups[$key]['karyawan'] = $groups[$key]['karyawan'] + $item['karyawan'];
            }
        }

        // print_arr($groups);

        $page_data['first_date'] = $first_date;
        $page_data['second_date'] = $second_date;
        $page_data['data'] = $groups;

        $this->dompdf->setPaper('A4', 'landscape');
        $html = $this->load->view('jurnal_print/cetak_jasmed_dokter', $page_data, true);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
        $this->dompdf->render();
        $this->dompdf->stream("Rekapitulasi Pasien.pdf", array("Attachment" => 0));
    }
    public function cetak_pasien_dokter_excel($first_date,  $second_date, $id_dokter)
    {
        $this->load->library('pdf');
        $this->data['title']    = 'Laporan';

        $data = $this->M_Jasamedis->detailpasien_realese_bydokter($first_date, $second_date, $id_dokter);
        // print_arr($data);


        foreach ($data as  $row) {


            $tindakan = $row->tindakan;
            $cara_bayar = $row->cara_bayar;
            $jasa_dokter = $row->jasa_dokter;

            if ($row->jenis_pelayanan == 'OK') {
                if (preg_match('/BPJS/i', $cara_bayar)) {
                    if (preg_match('/operator/i', $tindakan)) { //operator 
                        $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                    } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                        $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                    } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                        $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                    } else {
                        $jumlah = $jasa_dokter * $row->frek; //dokter
                    }
                } else {
                    $jumlah = $jasa_dokter * $row->frek; //dokter
                }
            } else {
                if (preg_match('/BPJS/i', $cara_bayar)) {
                    if (preg_match('/konsultasi/i', $tindakan)) { //konsul 

                        $jumlah = ($row->dokter_spes == 'UMU') ? 30000 : 50000; //dokter
                    } elseif (preg_match('/visite/i', $tindakan)) {
                        $jumlah = 50000;
                    } else { ///tindakan
                        // $jumlah = ($row->dokter_spes == 'UMU') ? (10000 * $row->frek) : (50000 * $row->frek); //dokter
                        $jumlah = 50000; //dokter
                    }
                } else if ($cara_bayar == 'TIMAH REGULER') {

                    if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                        $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter

                    } else { ///tindakan
                        $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                    }
                } else {

                    if (preg_match('/visite/i', $tindakan) || preg_match('/konsultasi/i', $tindakan)) { //konsul 
                        if ($cara_bayar == 'TIMAH PRIORITAS') {
                            $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                        } else if ($row->jenis_pelayanan == 'POLI PRIORITAS') {
                            if (preg_match('/BAYAR SENDIRI/i', $cara_bayar)) {
                                $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                            } else {
                                $jumlah = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (64 / 100) : ($jasa_dokter * $row->frek) * (67 / 100); //dokter
                            }
                        } else {
                            $jumlah = ($jasa_dokter * $row->frek) * (72 / 100); //dokter
                        }
                    } else { ///tindakan
                        $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                    }
                }
            }
            $db[] = array(
                'id_pelayanan' => $row->id_pelayanan,
                'jasa_dokter' => $jasa_dokter,
                'frek' => $row->frek,
                'diskon_konsul' => $row->diskon_konsul,
                'diskon_visite' => $row->diskon_visite,
                'jumlah' => $jumlah,
                'nama' => $row->pasien,
                'no_rm' => $row->no_rm,
                'tgl_masuk' => $row->tgl_masuk,
                'tgl_keluar' => $row->tgl_keluar,
                'jenis_pelayanan' => $row->jenis_pelayanan,
                'cara_bayar' => $cara_bayar,
            );
        }

        // print_arr($db);

        $groups = array();


        foreach ($db as $item) {
            $key = $item['id_pelayanan'];

            if (!array_key_exists($key, $groups)) {
                $groups[$key] = array(
                    'id_pelayanan' => $item['id_pelayanan'],
                    'jasa_dokter' => $item['jasa_dokter'],
                    'total' => $item['jasa_dokter'] * $item['frek'],
                    'diskon' => $item['diskon_konsul'] + $item['diskon_visite'],
                    'jasmed' => $item['jumlah'],
                    'pasien' => $item['nama'],
                    'no_rm' => $item['no_rm'],
                    'tgl_masuk' => $item['tgl_masuk'],
                    'tgl_keluar' => $item['tgl_keluar'],
                    'jenis_pelayanan' => $item['jenis_pelayanan'],
                    'cara_bayar' => $item['cara_bayar'],
                );
            } else {
                $groups[$key]['jasa_dokter'] = $groups[$key]['jasa_dokter'] + $item['jasa_dokter'];
                $groups[$key]['total'] = $groups[$key]['total'] + ($item['jasa_dokter'] * $item['frek']);
                $groups[$key]['diskon'] = $groups[$key]['diskon'] + ($item['diskon_konsul'] + $item['diskon_visite']);
                $groups[$key]['jasmed'] = $groups[$key]['jasmed'] + $item['jumlah'];
            }
        }

        // print_arr($groups);

        $page_data['first_date'] = $first_date;
        $page_data['second_date'] = $second_date;
        $page_data['dokter'] = $data[0]->dokter;
        $page_data['data'] = $groups;

        $this->dompdf->setPaper('A4', 'landscape');
        $html = $this->load->view('jurnal_print/cetak_pasien_jasmed_dokter', $page_data, true);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
        $this->dompdf->render();
        $this->dompdf->stream("Rekapitulasi Pasien.pdf", array("Attachment" => 0));
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Jasamedis extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Jasamedis');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_jasamedis';
        $page_data['url'] = 'Jasamedis/tampil_jasmed';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tes()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_jasamedis_tes';
        $page_data['url'] = 'Jasamedis/tampil_jasmed_dokter';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function tampil_jasmed()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $jenis_klaim = $this->input->post('jenis_klaim');
        $dokter = $this->input->post('dokter');
        if ($dokter == '-') {
            $page_data = $this->M_Jasamedis->selectLaporanRangeJasmed($first_date, $second_date, $jenis_pelayanan, $jenis_klaim);
        } else {
            $page_data = $this->M_Jasamedis->selectLaporanRangeJasmed_bydokter($first_date, $second_date, $jenis_pelayanan, $jenis_klaim, $dokter);
        }

        for ($i = 0; $i < count($page_data); $i++) {
            $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);
            $tgl_keluar = indo_date2($page_data[$i]->tgl_keluar);

            $no = $i + 1;

            $no_rm = $page_data[$i]->no_rm;
            // $poli = $page_data[$i]->poli;
            $pasien = $page_data[$i]->pasien;
            $tindakan = $page_data[$i]->tindakan;
            $no_sep = $page_data[$i]->no_sep;
            $jasa_dokter = $page_data[$i]->jasa_dokter;
            $biaya_rs = $page_data[$i]->biaya_rs;
            $cara_bayar = $page_data[$i]->cara_bayar;
            $dokter = $page_data[$i]->dokter;
            $total = $page_data[$i]->total;
            $ket = $page_data[$i]->jenis_pelayanan;
            if ($this->input->post('dokter') == '-') {
                $ruangan = ($jenis_pelayanan == 'UGD RAJAL' ||  $jenis_pelayanan == 'UGD RANAP') ? '-' : $page_data[$i]->nama_ruangan;
            } else {
                $ruangan = '-';
            }
            $frek = $page_data[$i]->frek;

            if ($page_data[$i]->jenis_pelayanan == 'KAMAR OPERASI') {
                if ($cara_bayar == 'BPJS') {
                    if (preg_match('/operator/i', $tindakan)) { //operator 
                        $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (60 / 100); //dokter
                    } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                        $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (20 / 100); //dokter
                    } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                        $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (20 / 100); //dokter
                    } else {
                        $jumlah = $jasa_dokter * $page_data[$i]->frek; //dokter
                    }
                } else if (preg_match('/TIMAH/i', $cara_bayar)) {
                    if (preg_match('/operator/i', $tindakan)) { //operator 
                        $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (50 / 100); //dokter
                    } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                        $jumlah = (($jasa_dokter * $page_data[$i]->frek * 100) / 40) * (40 / 100) * (50 / 100); //dokter
                    } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                        $jumlah = (($jasa_dokter * $page_data[$i]->frek * 100) / 30) * (30 / 100) * (50 / 100); //dokter
                    } else {
                        $jumlah = $jasa_dokter * $page_data[$i]->frek; //dokter
                    }
                } else {
                    $jumlah = $jasa_dokter * $page_data[$i]->frek; //dokter
                }
            } else {
                if (preg_match('/BPJS/i', $cara_bayar)) {
                    if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                        if ($jenis_pelayanan == 'UGD RAJAL' || $jenis_pelayanan == 'POLI') {
                            $jumlah = ($page_data[$i]->dokter_spes == 'UMU') ? 30000 : 50000; //dokter
                        } else {
                            $jumlah = ($page_data[$i]->dokter_spes == 'UMU') ? 35000 : 50000; //dokter
                        }
                    } elseif (preg_match('/visite/i', $tindakan)) {
                        $jumlah = 50000;
                    } else { ///tindakan
                        // $jumlah = ($page_data[$i]->dokter_spes == 'UMU') ? (10000 * $page_data[$i]->frek) : (50000 * $page_data[$i]->frek); //dokter
                        $jumlah = 50000; //dokter
                    }
                } else if ($cara_bayar == 'TIMAH REGULER') {
                    if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                        $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (50 / 100); //dokter
                    } else { ///tindakan
                        $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (50 / 100); //dokter
                    }
                } else {
                    if (preg_match('/visite/i', $tindakan) || preg_match('/konsultasi/i', $tindakan)) { //konsul 
                        if ($cara_bayar == 'TIMAH PRIORITAS') {
                            $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (60 / 100); //dokter konsul timah prio
                        } else if ($page_data[$i]->jenis_pelayanan == 'POLI PRIORITAS') {
                            if (preg_match('/BAYAR SENDIRI/i', $cara_bayar)) {
                                $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (60 / 100); //dokter konsul umum prio
                            } else {
                                $jumlah = ($page_data[$i]->dokter_spes == 'UMU') ? ($jasa_dokter * $page_data[$i]->frek) * (64 / 100) : ($jasa_dokter * $page_data[$i]->frek) * (67 / 100); //konsul assuransi lainnya prio
                            }
                        } else {
                            $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (72 / 100); //konsul biasa

                        }
                    } else {
                        // if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                        //     $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (72 / 100); //dokter

                        // } else { ///tindakan
                        /////////////////////////////////////////////////
                        // if (is_numeric($jasa_dokter)) {
                        //     if (is_numeric($page_data[$i]->frek)) {
                                $jumlah = ($jasa_dokter * $page_data[$i]->frek) * (80 / 100); //dokter
                        //     } else {
                        //         $jumlah = -1;
                        //     }
                        // } else {
                        //     $jumlah = -2;
                        // }
                        /////////////////////////////////////////////////////////
                        // }
                    }
                }
            }


            $out[$i] = array($no, $tgl_masuk, $tgl_keluar, $no_rm, $pasien, $no_sep, $tindakan,  $jasa_dokter, $frek, $jumlah, $cara_bayar, $dokter, $ket, $ruangan);
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



    public function realese()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Laporan_jasamedis_realese';
        $page_data['url'] = 'Jasamedis/tampil_jasmed_realese';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jasmed_realese()
    {
        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $page_data = $this->M_Jasamedis->detailJasmed_realese($first_date, $second_date);
        $no = 0;
        foreach ($page_data as $pelayanan => $key) {
            foreach ($key as  $row) {
                $tgl_masuk = indo_date2($row->tgl_masuk);
                $tgl_keluar = indo_date2($row->tgl_keluar);

                $no = $no + 1;

                $no_rm = $row->no_rm;
                // $poli = $row->poli;
                $pasien = $row->pasien;
                $tindakan = $row->tindakan;
                $jasa_dokter = $row->jasa_dokter;
                $biaya_rs = $row->biaya_rs;
                $cara_bayar = $row->cara_bayar;
                $dokter = $row->dokter;
                $total = $row->total;
                $frek = $row->frek;

                if ($row->jenis_pelayanan == 'OK') {
                    if ($cara_bayar == 'BPJS') {
                        if (preg_match('/operator/i', $tindakan)) { //operator 
                            $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                        } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                            $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                        } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                            $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                        } else {
                            $jumlah = $jasa_dokter * $row->frek; //dokter
                        }
                    } else {
                        $jumlah = $jasa_dokter * $row->frek; //dokter
                    }
                } else {
                    if ($cara_bayar == 'BPJS') {
                        if (preg_match('/konsultasi/i', $tindakan)) { //konsul 

                            $jumlah = ($row->dokter_spes == 'UMU') ? 30000 : 50000; //dokter
                        } elseif (preg_match('/visite/i', $tindakan)) {
                            $jumlah = 50000;
                        } else { ///tindakan
                            // $jumlah = ($row->dokter_spes == 'UMU') ? (10000 * $row->frek) : (50000 * $row->frek); //dokter
                            $jumlah = 50000; //dokter
                        }
                    } else if ($cara_bayar == 'TIMAH REGULER') {
                        if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                            $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                        } else { ///tindakan
                            $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                        }
                    } else {
                        if (preg_match('/visite/i', $tindakan) || preg_match('/konsultasi/i', $tindakan)) { //konsul 
                            if ($cara_bayar == 'TIMAH PRIORITAS') {
                                $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                            } else if ($row->jenis_pelayanan == 'POLI PRIORITAS') {
                                if (preg_match('/BAYAR SENDIRI/i', $cara_bayar)) {
                                    $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                                } else {
                                    $jumlah = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (64 / 100) : ($jasa_dokter * $row->frek) * (67 / 100); //dokter
                                }
                            }
                        } else {
                            if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                                $jumlah = ($jasa_dokter * $row->frek) * (72 / 100); //dokter

                            } else { ///tindakan
                                $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                            }
                        }
                    }
                }


                $out[] = array($no, $tgl_masuk, $tgl_keluar, $no_rm, $pasien, $tindakan,  $jasa_dokter, $frek, $jumlah, $cara_bayar, $dokter);
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
    public function cetak_detail_pdf($first_date,  $second_date, $jenis)
    {
        $staff = $this->session->userdata('data_auth');

        $this->load->library('pdf');
        $judul = $jenis == 'rajal' ? 'RAWAT JALAN' : (($jenis == 'ranap') ? 'RAWAT INAP' : '');
        $this->data['title'] = 'LAPORAN JASA MEDIS ' . $judul;
        $page_data['judul'] = 'LAPORAN JASA MEDIS ' . $judul;
        // $first_date = $this->input->post('mulai');
        // $second_date = $this->input->post('akhir');
        // if ($staff->ruangan == 'jasmed') {
        //     $page_data['data'] = $this->M_Jasamedis->selectLaporanRangeJasmed($first_date, $second_date,$jenis);
        // } else {
        $page_data['data'] = $this->M_Jasamedis->detailJasmed_realese($first_date, $second_date);
        // }
        $page_data['first_date'] = $first_date;
        $page_data['second_date'] = $second_date;

        $this->dompdf->setPaper('A4', 'landscape');
        $html = $this->load->view('jurnal_print/cetak_detail_jasmed', $page_data, true);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
        $this->dompdf->render();
        $this->dompdf->stream("LAPORAN JASA MEDIS.pdf", array("Attachment" => 0));
    }
    public function cetak_detail_pdf_dokter($first_date,  $second_date, $jenis)
    {
        $this->load->library('pdf');
        $this->data['title']    = 'Laporan';

        $data = $this->M_Jasamedis->detailJasmed_realese($first_date, $second_date);
        $db = null;
        // foreach ($data as $pelayanan => $key) {
        foreach ($data as  $row) {
            $dokter = $row->dokter;

            $tindakan = $row->tindakan;
            $cara_bayar = $row->cara_bayar;
            $jasa_dokter = $row->jasa_dokter;

            if ($row->jenis_pelayanan == 'OK') {
                if ($cara_bayar == 'BPJS') {
                    if (preg_match('/operator/i', $tindakan)) { //operator 
                        $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                    } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                        $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                    } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                        $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                    } else {
                        $jumlah = $jasa_dokter * $row->frek; //dokter
                    }
                    $rs = 0;
                    $karyawan = 0;
                } else {

                    if (preg_match('/operator/i', $tindakan)) { //operator 
                        $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                    } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                        $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                    } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                        $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                    } else {
                        $jumlah = $jasa_dokter * $row->frek; //dokter
                    }
                    $rs = 0;
                    $karyawan = 0;
                }
            } else {
                if ($cara_bayar == 'BPJS') {
                    if (preg_match('/konsultasi/i', $tindakan)) { //konsul 

                        $jumlah = ($row->dokter_spes == 'UMU') ? 30000 : 50000; //dokter
                        $rs = 0;
                        $karyawan = 0;
                    } elseif (preg_match('/visite/i', $tindakan)) {
                        $jumlah = 50000;
                        $rs = 0;
                        $karyawan = 0;
                    } else { ///tindakan
                        // $jumlah = ($row->dokter_spes == 'UMU') ? (10000 * $row->frek) : (50000 * $row->frek); //dokter
                        $jumlah = 50000; //dokter
                        $rs = 0;
                        $karyawan = 0;
                    }
                } else if ($cara_bayar == 'TIMAH REGULER') {

                    if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                        $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                        $rs = ($jasa_dokter * $row->frek) * (50 / 100);
                        $karyawan = 0;
                    } else { ///tindakan
                        $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                        $rs = ($jasa_dokter * $row->frek) * (50 / 100);
                        $karyawan = 0;
                    }
                } else {

                    if (preg_match('/visite/i', $tindakan) || preg_match('/konsultasi/i', $tindakan)) { //konsul 
                        if ($cara_bayar == 'TIMAH PRIORITAS') {
                            $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                            $rs = ($jasa_dokter * $row->frek) * (50 / 100);
                            $karyawan = 0;
                        } else if ($row->jenis_pelayanan == 'POLI PRIORITAS') {
                            if (preg_match('/BAYAR SENDIRI/i', $cara_bayar)) {
                                $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                                $rs = ($jasa_dokter * $row->frek) * (40 / 100);
                                $karyawan = 0;
                            } else {
                                $jumlah = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (64 / 100) : ($jasa_dokter * $row->frek) * (67 / 100); //dokter
                                $rs = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (21 / 100) : ($jasa_dokter * $row->frek) * (18 / 100); //dokter
                                $karyawan = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (15 / 100) : ($jasa_dokter * $row->frek) * (15 / 100); //dokter
                            }
                        } else {
                            $jumlah = ($jasa_dokter * $row->frek) * (72 / 100); //dokter
                            $rs = ($jasa_dokter * $row->frek) * (18 / 100);
                            $karyawan = ($jasa_dokter * $row->frek) * (10 / 100);
                        }
                    } else { ///tindakan
                        $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                        $rs = ($jasa_dokter * $row->frek) * (5 / 100);
                        $karyawan = ($jasa_dokter * $row->frek) * (15 / 100);
                    }
                }
            }
            $db[] = array(
                'dokter' => $dokter,
                'jasa_dokter' => $jasa_dokter,
                'frek' => $row->frek,
                'diskon_konsul' => $row->diskon_konsul,
                'diskon_visite' => $row->diskon_visite,
                'jumlah' => $jumlah,
                'rs' => $rs,
                'karyawan' => $karyawan,
            );
        }
        // }
        // print_arr($db);

        $groups = array();


        foreach ($db as $item) {
            $key = $item['dokter'];

            if (!array_key_exists($key, $groups)) {
                $groups[$key] = array(
                    'dokter' => $item['dokter'],
                    'jasa_dokter' => $item['jasa_dokter'],
                    'total' => $item['jasa_dokter'] * $item['frek'],
                    'diskon' => $item['diskon_konsul'] + $item['diskon_visite'],
                    'jasmed' => $item['jumlah'],
                    'rs' => $item['rs'],
                    'karyawan' => $item['karyawan'],
                );
            } else {
                $groups[$key]['jasa_dokter'] = $groups[$key]['jasa_dokter'] + $item['jasa_dokter'];
                $groups[$key]['total'] = $groups[$key]['total'] + ($item['jasa_dokter'] * $item['frek']);
                $groups[$key]['diskon'] = $groups[$key]['diskon'] + ($item['diskon_konsul'] + $item['diskon_visite']);
                $groups[$key]['jasmed'] = $groups[$key]['jasmed'] + $item['jumlah'];
                $groups[$key]['rs'] = $groups[$key]['rs'] + $item['rs'];
                $groups[$key]['karyawan'] = $groups[$key]['karyawan'] + $item['karyawan'];
            }
        }

        // print_arr($groups);

        $page_data['first_date'] = $first_date;
        $page_data['second_date'] = $second_date;
        $page_data['data'] = $groups;

        $this->dompdf->setPaper('A4', 'landscape');
        $html = $this->load->view('jurnal_print/cetak_jasmed_dokter', $page_data, true);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
        $this->dompdf->render();
        $this->dompdf->stream("Rekapitulasi Pasien.pdf", array("Attachment" => 0));
    }
    public function cetak_pasien_dokter($first_date,  $second_date, $id_dokter, $jenis)
    {
        $this->load->library('pdf');
        $this->data['title']    = 'Laporan';


        $data = $this->M_Jasamedis->detailpasien_realese_bydokter($first_date, $second_date, $id_dokter);

        if (empty($data)) {
            echo "<script type='text/javascript'>alert('Data tidak ada');window.history.go(-1);</script>";
        } else {

            foreach ($data as  $row) {


                $tindakan = $row->tindakan;
                $cara_bayar = $row->cara_bayar;
                $jasa_dokter = $row->jasa_dokter;
                $freq = $row->frek;

                if ($row->jenis_pelayanan == 'OK') {
                    if ($cara_bayar == 'BPJS') {
                        if (preg_match('/operator/i', $tindakan)) { //operator 
                            $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                        } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                            $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                        } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                            $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                        } else {
                            $jumlah = $jasa_dokter * $row->frek; //dokter
                        }
                    } else {
                        if (preg_match('/operator/i', $tindakan)) { //operator 
                            $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                        } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                            $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                        } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                            $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                        } else {
                            $jumlah = $jasa_dokter * $row->frek; //dokter
                        }
                    }
                    $konsul = 0;
                    $biaya = $jasa_dokter;
                } else {
                    if ($cara_bayar == 'BPJS') {
                        if (preg_match('/konsultasi/i', $tindakan)) { //konsul 

                            $jumlah = ($row->dokter_spes == 'UMU') ? 30000 : 50000; //dokter
                            $konsul = $jasa_dokter;
                            $biaya = 0;
                        } elseif (preg_match('/visite/i', $tindakan)) {
                            $jumlah = 50000;
                            $konsul = $jasa_dokter;
                            $biaya = 0;
                        } else { ///tindakan
                            // $jumlah = ($row->dokter_spes == 'UMU') ? (10000 * $row->frek) : (50000 * $row->frek); //dokter
                            $jumlah = 50000; //dokter
                            $konsul = 0;
                            $biaya = $jasa_dokter;
                        }
                    } else if ($cara_bayar == 'TIMAH REGULER') {

                        if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                            $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                            $konsul = $jasa_dokter;
                            $biaya = 0;
                        } else { ///tindakan
                            $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                            $konsul = 0;
                            $biaya = $jasa_dokter;
                        }
                    } else {

                        if (preg_match('/visite/i', $tindakan) || preg_match('/konsultasi/i', $tindakan)) { //konsul 
                            if ($cara_bayar == 'TIMAH PRIORITAS') {
                                $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                            } else if ($row->jenis_pelayanan == 'POLI PRIORITAS') {
                                if (preg_match('/BAYAR SENDIRI/i', $cara_bayar)) {
                                    $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                                } else {
                                    $jumlah = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (64 / 100) : ($jasa_dokter * $row->frek) * (67 / 100); //dokter
                                }
                            } else {
                                $jumlah = ($jasa_dokter * $row->frek) * (72 / 100); //dokter
                            }
                            $konsul = $jasa_dokter;
                            $biaya = 0;
                        } else { ///tindakan
                            $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                            $konsul = 0;
                            $biaya = $jasa_dokter;
                        }
                    }
                }
                $db[] = array(
                    'id_pelayanan' => $row->id_pelayanan,
                    'jasa_dokter' => $jasa_dokter,
                    'frek' => $row->frek,
                    'diskon_konsul' => $row->diskon_konsul,
                    'diskon_visite' => $row->diskon_visite,
                    'jumlah' => $jumlah,
                    'konsul' => $konsul,
                    'biaya' => $biaya,
                    'nama' => $row->pasien,
                    'no_rm' => $row->no_rm,
                    'tgl_masuk' => $row->tgl_masuk,
                    'tgl_keluar' => $row->tgl_keluar,
                    'jenis_pelayanan' => $row->jenis_pelayanan,
                    'cara_bayar' => $cara_bayar,
                    'jasmed_konsul' => $konsul != 0 ? $jumlah : 0,
                    'jasmed_tindakan' => $biaya != 0 ? $jumlah : 0,
                );
            }

            // print_arr($db);

            $groups = array();


            foreach ($db as $item) {
                $key = $item['id_pelayanan'];

                if (!array_key_exists($key, $groups)) {
                    $groups[$key] = array(
                        'id_pelayanan' => $item['id_pelayanan'],
                        'jasa_dokter' => $item['jasa_dokter'],
                        'total' => $item['jasa_dokter'] * $item['frek'],
                        'konsul' => $item['konsul'] * $item['frek'],
                        'biaya' => $item['biaya'] * $item['frek'],
                        'diskon' => $item['diskon_konsul'] + $item['diskon_visite'],
                        'jasmed' => $item['jumlah'],
                        'pasien' => $item['nama'],
                        'no_rm' => $item['no_rm'],
                        'tgl_masuk' => $item['tgl_masuk'],
                        'tgl_keluar' => $item['tgl_keluar'],
                        'jenis_pelayanan' => $item['jenis_pelayanan'],
                        'cara_bayar' => $item['cara_bayar'],
                        'jasmed_konsul' => $item['jasmed_konsul'],
                        'jasmed_tindakan' => $item['jasmed_tindakan'],
                    );
                } else {
                    $groups[$key]['jasa_dokter'] = $groups[$key]['jasa_dokter'] + $item['jasa_dokter'];
                    $groups[$key]['total'] = $groups[$key]['total'] + ($item['jasa_dokter'] * $item['frek']);
                    $groups[$key]['konsul'] = $groups[$key]['konsul'] + ($item['konsul'] * $item['frek']);
                    $groups[$key]['biaya'] = $groups[$key]['biaya'] + ($item['biaya'] * $item['frek']);
                    $groups[$key]['diskon'] = $groups[$key]['diskon'] + ($item['diskon_konsul'] + $item['diskon_visite']);
                    $groups[$key]['jasmed'] = $groups[$key]['jasmed'] + $item['jumlah'];
                    $groups[$key]['jasmed_konsul'] = $groups[$key]['jasmed_konsul'] + ($item['jasmed_konsul']);
                    $groups[$key]['jasmed_tindakan'] = $groups[$key]['jasmed_tindakan'] + ($item['jasmed_tindakan']);
                }
            }

            // print_arr($groups);

            $page_data['first_date'] = $first_date;
            $page_data['second_date'] = $second_date;
            $page_data['dokter'] = $data[0]->dokter;
            $page_data['data'] = $groups;

            $this->dompdf->setPaper('A4', 'landscape');
            $html = $this->load->view('jurnal_print/cetak_pasien_jasmed_dokter', $page_data, true);
            $this->dompdf->loadHtml($html);
            $this->dompdf->setPaper('A4', 'landscape');
            $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
            $this->dompdf->render();
            $this->dompdf->stream("Rekapitulasi Pasien.pdf", array("Attachment" => 0));
        }
    }

    ///////////////////////////////////EXCEL////////////////////////////////////////////// 
    public function cetak_detail_excel($first_date,  $second_date, $jenis)
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


        // $first_date = $this->input->post('mulai');
        // $second_date = $this->input->post('akhir');
        $page_data['data'] = $this->M_Jasamedis->detailJasmed_realese($first_date, $second_date);
        $page_data['first_date'] = $first_date;
        $page_data['second_date'] = $second_date;

        $this->dompdf->setPaper('A4', 'landscape');
        $html = $this->load->view('jurnal_print/cetak_detail_jasmed', $page_data, true);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
        $this->dompdf->render();
        $this->dompdf->stream("Rekapitulasi Pasien.pdf", array("Attachment" => 0));
    }
    public function cetak_detail_excel_dokter($first_date,  $second_date)
    {
        $this->load->library('pdf');
        $this->data['title']    = 'Laporan';

        $data = $this->M_Jasamedis->detailJasmed_realese($first_date, $second_date);
        $db = null;
        foreach ($data as $pelayanan => $key) {
            foreach ($key as  $row) {
                $dokter = $row->dokter;

                $tindakan = $row->tindakan;
                $cara_bayar = $row->cara_bayar;
                $jasa_dokter = $row->jasa_dokter;

                if ($row->jenis_pelayanan == 'OK') {
                    if (preg_match('/BPJS/i', $cara_bayar)) {
                        if (preg_match('/operator/i', $tindakan)) { //operator 
                            $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                        } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                            $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                        } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                            $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                        } else {
                            $jumlah = $jasa_dokter * $row->frek; //dokter
                        }
                        $rs = 0;
                        $karyawan = 0;
                    } else {
                        $jumlah = $jasa_dokter * $row->frek; //dokter
                        $rs = 0;
                        $karyawan = 0;
                    }
                } else {
                    if (preg_match('/BPJS/i', $cara_bayar)) {
                        if (preg_match('/konsultasi/i', $tindakan)) { //konsul 

                            $jumlah = ($row->dokter_spes == 'UMU') ? 30000 : 50000; //dokter
                            $rs = 0;
                            $karyawan = 0;
                        } elseif (preg_match('/visite/i', $tindakan)) {
                            $jumlah = 50000;
                            $rs = 0;
                            $karyawan = 0;
                        } else { ///tindakan
                            // $jumlah = ($row->dokter_spes == 'UMU') ? (10000 * $row->frek) : (50000 * $row->frek); //dokter
                            $jumlah = 50000; //dokter
                            $rs = 0;
                            $karyawan = 0;
                        }
                    } else if ($cara_bayar == 'TIMAH REGULER') {

                        if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                            $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                            $rs = ($jasa_dokter * $row->frek) * (50 / 100);
                            $karyawan = 0;
                        } else { ///tindakan
                            $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                            $rs = ($jasa_dokter * $row->frek) * (50 / 100);
                            $karyawan = 0;
                        }
                    } else {

                        if (preg_match('/visite/i', $tindakan) || preg_match('/konsultasi/i', $tindakan)) { //konsul 
                            if ($cara_bayar == 'TIMAH PRIORITAS') {
                                $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                                $rs = ($jasa_dokter * $row->frek) * (50 / 100);
                                $karyawan = 0;
                            } else if ($row->jenis_pelayanan == 'POLI PRIORITAS') {
                                if (preg_match('/BAYAR SENDIRI/i', $cara_bayar)) {
                                    $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                                    $rs = ($jasa_dokter * $row->frek) * (40 / 100);
                                    $karyawan = 0;
                                } else {
                                    $jumlah = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (64 / 100) : ($jasa_dokter * $row->frek) * (67 / 100); //dokter
                                    $rs = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (21 / 100) : ($jasa_dokter * $row->frek) * (18 / 100); //dokter
                                    $karyawan = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (15 / 100) : ($jasa_dokter * $row->frek) * (15 / 100); //dokter
                                }
                            } else {
                                $jumlah = ($jasa_dokter * $row->frek) * (72 / 100); //dokter
                                $rs = ($jasa_dokter * $row->frek) * (18 / 100);
                                $karyawan = ($jasa_dokter * $row->frek) * (10 / 100);
                            }
                        } else { ///tindakan
                            $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                            $rs = ($jasa_dokter * $row->frek) * (5 / 100);
                            $karyawan = ($jasa_dokter * $row->frek) * (15 / 100);
                        }
                    }
                }
                $db[] = array(
                    'dokter' => $dokter,
                    'jasa_dokter' => $jasa_dokter,
                    'frek' => $row->frek,
                    'diskon_konsul' => $row->diskon_konsul,
                    'diskon_visite' => $row->diskon_visite,
                    'jumlah' => $jumlah,
                    'rs' => $rs,
                    'karyawan' => $karyawan,
                );
            }
        }
        // print_arr($db);

        $groups = array();


        foreach ($db as $item) {
            $key = $item['dokter'];

            if (!array_key_exists($key, $groups)) {
                $groups[$key] = array(
                    'dokter' => $item['dokter'],
                    'jasa_dokter' => $item['jasa_dokter'],
                    'total' => $item['jasa_dokter'] * $item['frek'],
                    'diskon' => $item['diskon_konsul'] + $item['diskon_visite'],
                    'jasmed' => $item['jumlah'],
                    'rs' => $item['rs'],
                    'karyawan' => $item['karyawan'],
                );
            } else {
                $groups[$key]['jasa_dokter'] = $groups[$key]['jasa_dokter'] + $item['jasa_dokter'];
                $groups[$key]['total'] = $groups[$key]['total'] + ($item['jasa_dokter'] * $item['frek']);
                $groups[$key]['diskon'] = $groups[$key]['diskon'] + ($item['diskon_konsul'] + $item['diskon_visite']);
                $groups[$key]['jasmed'] = $groups[$key]['jasmed'] + $item['jumlah'];
                $groups[$key]['rs'] = $groups[$key]['rs'] + $item['rs'];
                $groups[$key]['karyawan'] = $groups[$key]['karyawan'] + $item['karyawan'];
            }
        }

        // print_arr($groups);

        $page_data['first_date'] = $first_date;
        $page_data['second_date'] = $second_date;
        $page_data['data'] = $groups;

        $this->dompdf->setPaper('A4', 'landscape');
        $html = $this->load->view('jurnal_print/cetak_jasmed_dokter', $page_data, true);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
        $this->dompdf->render();
        $this->dompdf->stream("Rekapitulasi Pasien.pdf", array("Attachment" => 0));
    }
    public function cetak_pasien_dokter_excel($first_date,  $second_date, $id_dokter)
    {
        $this->load->library('pdf');
        $this->data['title']    = 'Laporan';

        $data = $this->M_Jasamedis->detailpasien_realese_bydokter($first_date, $second_date, $id_dokter);
        // print_arr($data);


        foreach ($data as  $row) {


            $tindakan = $row->tindakan;
            $cara_bayar = $row->cara_bayar;
            $jasa_dokter = $row->jasa_dokter;

            if ($row->jenis_pelayanan == 'OK') {
                if (preg_match('/BPJS/i', $cara_bayar)) {
                    if (preg_match('/operator/i', $tindakan)) { //operator 
                        $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                    } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                        $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                    } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                        $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                    } else {
                        $jumlah = $jasa_dokter * $row->frek; //dokter
                    }
                } else {
                    $jumlah = $jasa_dokter * $row->frek; //dokter
                }
            } else {
                if (preg_match('/BPJS/i', $cara_bayar)) {
                    if (preg_match('/konsultasi/i', $tindakan)) { //konsul 

                        $jumlah = ($row->dokter_spes == 'UMU') ? 30000 : 50000; //dokter
                    } elseif (preg_match('/visite/i', $tindakan)) {
                        $jumlah = 50000;
                    } else { ///tindakan
                        // $jumlah = ($row->dokter_spes == 'UMU') ? (10000 * $row->frek) : (50000 * $row->frek); //dokter
                        $jumlah = 50000; //dokter
                    }
                } else if ($cara_bayar == 'TIMAH REGULER') {

                    if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                        $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter

                    } else { ///tindakan
                        $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                    }
                } else {

                    if (preg_match('/visite/i', $tindakan) || preg_match('/konsultasi/i', $tindakan)) { //konsul 
                        if ($cara_bayar == 'TIMAH PRIORITAS') {
                            $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                        } else if ($row->jenis_pelayanan == 'POLI PRIORITAS') {
                            if (preg_match('/BAYAR SENDIRI/i', $cara_bayar)) {
                                $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                            } else {
                                $jumlah = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (64 / 100) : ($jasa_dokter * $row->frek) * (67 / 100); //dokter
                            }
                        } else {
                            $jumlah = ($jasa_dokter * $row->frek) * (72 / 100); //dokter
                        }
                    } else { ///tindakan
                        $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                    }
                }
            }
            $db[] = array(
                'id_pelayanan' => $row->id_pelayanan,
                'jasa_dokter' => $jasa_dokter,
                'frek' => $row->frek,
                'diskon_konsul' => $row->diskon_konsul,
                'diskon_visite' => $row->diskon_visite,
                'jumlah' => $jumlah,
                'nama' => $row->pasien,
                'no_rm' => $row->no_rm,
                'tgl_masuk' => $row->tgl_masuk,
                'tgl_keluar' => $row->tgl_keluar,
                'jenis_pelayanan' => $row->jenis_pelayanan,
                'cara_bayar' => $cara_bayar,
            );
        }

        // print_arr($db);

        $groups = array();


        foreach ($db as $item) {
            $key = $item['id_pelayanan'];

            if (!array_key_exists($key, $groups)) {
                $groups[$key] = array(
                    'id_pelayanan' => $item['id_pelayanan'],
                    'jasa_dokter' => $item['jasa_dokter'],
                    'total' => $item['jasa_dokter'] * $item['frek'],
                    'diskon' => $item['diskon_konsul'] + $item['diskon_visite'],
                    'jasmed' => $item['jumlah'],
                    'pasien' => $item['nama'],
                    'no_rm' => $item['no_rm'],
                    'tgl_masuk' => $item['tgl_masuk'],
                    'tgl_keluar' => $item['tgl_keluar'],
                    'jenis_pelayanan' => $item['jenis_pelayanan'],
                    'cara_bayar' => $item['cara_bayar'],
                );
            } else {
                $groups[$key]['jasa_dokter'] = $groups[$key]['jasa_dokter'] + $item['jasa_dokter'];
                $groups[$key]['total'] = $groups[$key]['total'] + ($item['jasa_dokter'] * $item['frek']);
                $groups[$key]['diskon'] = $groups[$key]['diskon'] + ($item['diskon_konsul'] + $item['diskon_visite']);
                $groups[$key]['jasmed'] = $groups[$key]['jasmed'] + $item['jumlah'];
            }
        }

        // print_arr($groups);

        $page_data['first_date'] = $first_date;
        $page_data['second_date'] = $second_date;
        $page_data['dokter'] = $data[0]->dokter;
        $page_data['data'] = $groups;

        $this->dompdf->setPaper('A4', 'landscape');
        $html = $this->load->view('jurnal_print/cetak_pasien_jasmed_dokter', $page_data, true);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
        $this->dompdf->render();
        $this->dompdf->stream("Rekapitulasi Pasien.pdf", array("Attachment" => 0));
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
