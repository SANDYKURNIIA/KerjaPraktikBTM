<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelacakan_obat extends CI_Controller
{
    //Pelacakan Obat
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_Po_obat');
    }
    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pelacakan_obat';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_pelacakan()
    {
        $page_data = $this->M_Po_obat->selectPelacakan();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $id_log = $page_data[$i]->id_logistik;

            $id_detail = $page_data[$i]->id_detail;


            $dat = $this->db->query("SELECT d.id_struk, s.index_dok, s.tgl_buat from detail_struk d, struk_logistik s where d.id_struk = s.no_faktur and id_detail_po='$id_detail' and id_logistik = '$id_log'");

            if ($dat->num_rows() > 0) {

                if ($dat->num_rows() > 1) {
                    $struk = $dat->result_array();
                    $k = array();
                    $no = 1;
                    // var_dump($struk);
                    foreach ($struk as $row) {
                        $k[] = '<strong>Faktur ' . $no . ': </strong><br>' . $row['id_struk'];
                        $no++;
                    }


                    $no_faktur = implode('<br>', array_unique($k));
                } else {
                    $no_faktur = $dat->row()->id_struk;
                }
                $noValid =  sprintf('%04d', $dat->row()->index_dok, 'dyhtdyu');
                $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($dat->row()->tgl_buat))) . "/" . date("Y", strtotime($dat->row()->tgl_buat));
                $tgl_struk = indo_date2($dat->row()->tgl_buat);

                $det_struk = ($this->db->query("SELECT SUM(frek) frek from detail_struk where id_detail_po='$id_detail'")->row()->frek);
                if ($det_struk > 0) {
                    // $frek_struk = $det_struk / $page_data[$i]->jml_satuan_terkecil;
                    $frek_struk = $det_struk;
                } else {
                    $frek_struk = 0;
                }
            } else {
                $no_faktur = "";
                $noDok = "";
                $frek_struk = 0;
                $tgl_struk = "";
            }


            if ($page_data[$i]->status == 1) {
                $status = "<span class='label label-success capitalize-font inline-block'>Sudah Terpenuhi</span>";
            } else {
                $status = "<span class='label label-danger capitalize-font inline-block'>Belum Terpenuhi</span>";
            }
            $produsen = $page_data[$i]->produsen;
            $nama = $page_data[$i]->nama;
            $vendor = $page_data[$i]->id_vendor;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $no_usulan = $page_data[$i]->no_usulan;
            $no_pr = $page_data[$i]->no_pr;
            $tgl_faktur = indo_date2($page_data[$i]->tgl_faktur);
            $tgl_pr = indo_date2($page_data[$i]->tgl_pr);
            $tgl_usulan = indo_date2($page_data[$i]->tgl_usulan);
            $satun_terbesar =  $page_data[$i]->jumlah;
            $satuan_terkecil = $page_data[$i]->diskon;
            $diskon = $page_data[$i]->disc;
            $hna = $page_data[$i]->hna;
            $jumlah = $satun_terbesar * $satuan_terkecil;
            $selisih = $jumlah - $frek_struk;

            if ($page_data[$i]->tgl_acc_kains == null) {
                $tgl_acc_kains = "-";
            } else {
                $date = strtotime($page_data[$i]->tgl_acc_kains);
                $tgl_acc_kains = strftime(" %d %B %Y %T", $date);
            }
            if ($page_data[$i]->tgl_acc_direktur == null) {
                $tgl_acc_direktur = "-";
            } else {
                $date1 = strtotime($page_data[$i]->tgl_acc_direktur);
                $tgl_acc_direktur = strftime(" %d %B %Y %T", $date1);
            }
            // $time = strtotime($page_data[$i]->tgl_res);
            // $tgl = strftime(" %d %B %Y", $time);
            if ($page_data[$i]->status_pr == 'DITERIMA') {
                $status_pr = "<span class='label label-success capitalize-font inline-block'>" . $page_data[$i]->status_pr . "</span>";
            } else {
                $status_pr = "<span class='label label-danger capitalize-font inline-block'>" . $page_data[$i]->status_pr . "</span>";
            }

            $out[$i] = array($no, $nama, $hna,$diskon, $jumlah, $frek_struk, $selisih, $produsen, $vendor, $no_dokumen, $tgl_faktur, $status, $no_faktur, $noDok, $tgl_struk, $no_pr, $tgl_pr, $no_usulan, $tgl_usulan, $status_pr, $tgl_acc_kains, $tgl_acc_direktur);
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

    public function Tampil_Rangepelacakan()
    {

        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        if ($mulai != '' && $akhir != '') {
            $page_data = $this->M_Po_obat->selectRangePelacakan($mulai, $akhir);
        } else {
            $page_data = $this->M_Po_obat->selectRangePelacakan('', '');
        }

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $id_log = $page_data[$i]->id_logistik;

            $id_detail = $page_data[$i]->id_detail;


            $dat = $this->db->query("SELECT d.id_struk, s.index_dok, s.tgl_buat from detail_struk d, struk_logistik s where d.id_struk = s.no_faktur and id_detail_po='$id_detail' and id_logistik = '$id_log'");

            if ($dat->num_rows() > 0) {

                if ($dat->num_rows() > 1) {
                    $struk = $dat->result_array();
                    $k = array();
                    $no = 1;
                    // var_dump($struk);
                    foreach ($struk as $row) {
                        $k[] = '<strong>Faktur ' . $no . ': </strong><br>' . $row['id_struk'];
                        $no++;
                    }


                    $no_faktur = implode('<br>', array_unique($k));
                } else {
                    $no_faktur = $dat->row()->id_struk;
                }
                $noValid =  sprintf('%04d', $dat->row()->index_dok, 'dyhtdyu');
                $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($dat->row()->tgl_buat))) . "/" . date("Y", strtotime($dat->row()->tgl_buat));
                $tgl_struk = indo_date2($dat->row()->tgl_buat);

                $det_struk = ($this->db->query("SELECT SUM(frek) frek from detail_struk where id_detail_po='$id_detail'")->row()->frek);
                if ($det_struk > 0) {
                    // $frek_struk = $det_struk / $page_data[$i]->jml_satuan_terkecil;
                    $frek_struk = $det_struk;
                } else {
                    $frek_struk = 0;
                }
            } else {
                $no_faktur = "";
                $noDok = "";
                $frek_struk = 0;
                $tgl_struk = "";
            }


            if ($page_data[$i]->status == 1) {
                $status = "<span class='label label-success capitalize-font inline-block'>Sudah Terpenuhi</span>";
            } else {
                $status = "<span class='label label-danger capitalize-font inline-block'>Belum Terpenuhi</span>";
            }
            $produsen = $page_data[$i]->produsen;
            $nama = $page_data[$i]->nama;
            $vendor = $page_data[$i]->id_vendor;
            $no_dokumen = $page_data[$i]->no_dokumen;
            $no_usulan = $page_data[$i]->no_usulan;
            $no_pr = $page_data[$i]->no_pr;
            $tgl_faktur = indo_date2($page_data[$i]->tgl_faktur);
            $tgl_pr = indo_date2($page_data[$i]->tgl_pr);
            $tgl_usulan = indo_date2($page_data[$i]->tgl_usulan);
            $satun_terbesar =  $page_data[$i]->jumlah;
            $diskon = $page_data[$i]->disc;
            $hna = $page_data[$i]->hna;
            $keterangan = $page_data[$i]->keterangan;
            $satuan_terkecil = $page_data[$i]->diskon;
            $jumlah = $satun_terbesar * $satuan_terkecil;
            $selisih = $jumlah - $frek_struk;

            if ($page_data[$i]->tgl_acc_kains == null) {
                $tgl_acc_kains = "-";
            } else {
                $date = strtotime($page_data[$i]->tgl_acc_kains);
                $tgl_acc_kains = strftime(" %d %B %Y %T", $date);
            }
            if ($page_data[$i]->tgl_acc_direktur == null) {
                $tgl_acc_direktur = "-";
            } else {
                $date1 = strtotime($page_data[$i]->tgl_acc_direktur);
                $tgl_acc_direktur = strftime(" %d %B %Y %T", $date1);
            }
            // $time = strtotime($page_data[$i]->tgl_res);
            // $tgl = strftime(" %d %B %Y", $time);
            if ($page_data[$i]->status_pr == 'DITERIMA') {
                $status_pr = "<span class='label label-success capitalize-font inline-block'>" . $page_data[$i]->status_pr . "</span>";
            } else {
                $status_pr = "<span class='label label-danger capitalize-font inline-block'>" . $page_data[$i]->status_pr . "</span>";
            }

            $out[$i] = array($no, $nama, $hna,$diskon, $jumlah, $frek_struk, $selisih,$keterangan, $produsen, $vendor, $no_dokumen, $tgl_faktur, $status, $no_faktur, $noDok, $tgl_struk, $no_pr, $tgl_pr, $no_usulan, $tgl_usulan, $status_pr, $tgl_acc_kains, $tgl_acc_direktur);
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
}
