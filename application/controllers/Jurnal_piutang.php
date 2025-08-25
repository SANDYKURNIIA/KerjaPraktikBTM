<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal_piutang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }

    public function Sisa_piutang_vendor()
    {
        $this->load->view('assets/_header');

        $page_data['judul'] = "LAPORAN SISA PIUTANG";
        $page_data['page_content'] = 'Jurnal/Laporan_sisa_piutang';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
   
    function tampil_sisa_piutang_vendor()
    {
        $page_data = $this->db->query("SELECT pk,no_jurnal,cara_klaim, id_vendor,sum(kredit) kredit,ifnull(sum(total),0) total,ifnull(no_pembayaran,'') no_pembayaran from(
            SELECT j.pk,j.no_jurnal,j.cara_klaim, j.id_vendor,sum(j.kredit) kredit
               from jurnal_piutang j
               where j.verifikasi=1
               group by j.pk
           ) as a 
           
           left join (SELECT sum(t.debet) total, t.invoice, t.id_fk no_pembayaran 
                       from detail_pembayaran_piutang t, pembayaran_piutang p  
                       where t.id_fk =p.no_dokumen and p.save = 2
                       group by t.invoice
                       ) b on a.pk = b.invoice
        group by id_vendor
        having (kredit-total) != 0
        order by cara_klaim
        ")->result();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;

            $vendor = $page_data[$i]->cara_klaim;
            $id_vendor = $page_data[$i]->id_vendor;

            $nilai = number_format($page_data[$i]->kredit, 0, ',', '.');
            $total = number_format($page_data[$i]->total, 0, ',', '.');
            $nilai1 = number_format(round($page_data[$i]->kredit - $page_data[$i]->total), 0, ',', '.');

            $pilih =  "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_list_faktur(\"" . $id_vendor .  "\")'><i class='icon-note'></i></a>";
            $out[$i] = array($no, $pilih, $vendor, $id_vendor, $nilai1);
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
    function tampil_sisa_piutang_Byvendor()
    {
        $id_vendor = $this->input->post('idFaktur');
        $page_data = $this->db->query("SELECT pk,no_jurnal,cara_klaim, id_vendor,kredit,ifnull(total,0) total,ifnull(no_pembayaran,'') no_pembayaran from(
                 SELECT j.pk,j.no_jurnal,j.cara_klaim, j.id_vendor,sum(j.kredit) kredit
                    from jurnal_piutang j
                    where j.verifikasi=1
                    and j.id_vendor = '$id_vendor'
                    group by j.pk
                ) as a 
                
                left join (SELECT sum(t.debet) total, t.invoice, t.id_fk no_pembayaran 
                            from detail_pembayaran_piutang t, pembayaran_piutang p  
                            where t.id_fk =p.no_dokumen and p.save = 2
                            group by t.invoice
                            ) b on a.pk = b.invoice
        having (kredit-total) != 0
        ")->result();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;

            $vendor = $page_data[$i]->cara_klaim;
            $id_vendor = $page_data[$i]->id_vendor;
            $no_jurnal = $page_data[$i]->no_jurnal;

            $nilai = number_format($page_data[$i]->kredit, 0, ',', '.');
            $total = number_format($page_data[$i]->total, 0, ',', '.');
            $nilai1 = number_format(round($page_data[$i]->kredit - $page_data[$i]->total), 0, ',', '.');
            $id_fk = $page_data[$i]->pk;

            // $checkbox = "<div class='checkbox checkbox-success'><input type='checkbox' name='check[]' value='" . $page_data[$i]->id_jurnal . "'><label ></label></div>";
            // $pilih =  "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_list_faktur(\"" . $page_data[$i]->id_jurnal . "\",\"" . $nilai1 . "\",\"" . $vendor .  "\")'><i class='icon-note'></i></a>";

            $out[$i] = array($no, $no_jurnal, $id_fk, $vendor, $id_vendor, $nilai, $nilai1, $total);
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

    public function Sisa_piutang_vendor_pasien()
    {
        $this->load->view('assets/_header');

        $page_data['judul'] = "LAPORAN SISA PIUTANG";
        $page_data['page_content'] = 'Jurnal/Laporan_sisa_piutang_pasien';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    function tampil_sisa_piutang_vendor_pasien()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $vendor = $this->input->post('vendor');
        $page_data = $this->db->query("SELECT v.nama, v.no_rm,v.pk invoice,v.cara_klaim,v.tagihan,IFNULL(d.piutang,0) sudah_bayar, v.tagihan - IFNULL(d.piutang,0) sisa
        from v_total_piutang v
        left join (SELECT sum(t.debet) piutang, t.id_pelayanan 
                 from detail_pembayaran_piutang t, pembayaran_piutang p
                 where t.id_fk=p.no_dokumen and p.save != 99
                 group by t.id_pelayanan
                 ) d on v.id_pelayanan= d.id_pelayanan
        where date(v.tgl_keluar) between '$mulai' and '$akhir' and v.id_vendor = '$vendor'
        order by tgl_masuk desc
        ")->result();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $no = $i + 1;

            $vendor = $page_data[$i]->cara_klaim;
            $nama = $page_data[$i]->nama;

            $no_rm = $page_data[$i]->no_rm;
            $invoice = $page_data[$i]->invoice;
            $total = number_format($page_data[$i]->tagihan, 0, ',', '.');
            $sisa = number_format($page_data[$i]->sisa, 0, ',', '.');
            $sudah_bayar = number_format($page_data[$i]->sudah_bayar, 0, ',', '.');
            $out[$i] = array($no, $vendor, $nama, $no_rm, $invoice, $total, $sisa, $sudah_bayar);
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
