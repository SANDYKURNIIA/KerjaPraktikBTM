<?php
defined('BASEPATH') or exit('No driect script access allowed');

class M_Laporan_total_billing_dan_diagnosa extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function selectLaporanTotalBillingDanDiagnosa()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT b.nama pasien, b.no_rm, p.tgl_masuk, c.nama cara_bayar, du.kode, du.nama_diagnosa, l.nama_panjang poli, d.total_harga total_bill
        FROM pelayanan p, history_pelayanan h, deatail_kasir d, cara_bayar c, pasien b, diagnosa_utama du, list_poli l
        WHERE p.id_pelayanan=h.id_pelayanan and d.id_pelayanan=p.id_pelayanan and c.id_cara_bayar=p.cara_bayar and l.id_list_poli=h.nama_poli and b.no_rm=p.id_pasien and du.id_pelayanan=p.id_pelayanan 
        and (c.id_cara_bayar='333' or c.id_cara_bayar='3331' or c.id_cara_bayar='b1') and p.tgl_masuk like '%$tgl%' and h.status=1 and p.status=1 and p.id_pelayanan not in(SELECT id_pelayanan FROM history_pelayanan_ranap)
        GROUP by p.id_pelayanan
        order by p.tgl_masuk asc");
        return $hasil->result();
    }
    public function selectLaporanTotalBillingDanDiagnosaRange($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT b.nama pasien, b.no_rm, p.tgl_masuk, c.nama cara_bayar, du.kode, du.nama_diagnosa, l.nama_panjang poli, d.total_harga total_bill
        FROM pelayanan p, history_pelayanan h, deatail_kasir d, cara_bayar c, pasien b, diagnosa_utama du, list_poli l
        WHERE p.id_pelayanan=h.id_pelayanan and d.id_pelayanan=p.id_pelayanan and c.id_cara_bayar=p.cara_bayar and l.id_list_poli=h.nama_poli and b.no_rm=p.id_pasien and du.id_pelayanan=p.id_pelayanan and (c.id_cara_bayar='333' or c.id_cara_bayar='3331' or c.id_cara_bayar='b1')  and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir') and h.status=1 
        and p.status=1 and p.id_pelayanan not in(SELECT id_pelayanan FROM history_pelayanan_ranap)
        order by p.tgl_masuk asc");
        return $hasil->result();
    }
}
