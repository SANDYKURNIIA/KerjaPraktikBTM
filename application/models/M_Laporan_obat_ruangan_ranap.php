<?php
defined('BASEPATH') or exit('No driect script access allowed');

class M_Laporan_obat_ruangan_ranap extends CI_Model
{ 
    function __construct()
    {
        parent::__construct();
        $this->load->database();
      
    }
    public function selectLaporanObatRuanganRanap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date("Y-m-d");
        $hasil = $this->db->query("SELECT s.tgl tanggal, l.id_logistik kode_obat,l.nama nama_obat, (s.frek *-1) jumlah,  ROUND(l.harga_cost*1.11) hna_ppn, ROUND(l.harga_cost) hna, f.nama staff_req, f.ruangan, f.tipe unit, a.nama staff_acc
        FROM stok_depo s, list_logistik l, detail_request d,staff f, staff a
        WHERE s.id_req = d.id_req and s.id_logistik = l.id_logistik and d.id_staff = f.id_staff  and s.id_staff = a.id_staff and s.tgl like '%$tanggal%'
        ORDER BY tanggal asc");
        return $hasil->result();
    }
    public function selectLaporanObatRuanganRanapRange($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $hasil = $this->db->query("SELECT s.tgl tanggal, l.id_logistik kode_obat,l.nama nama_obat, (s.frek *-1) jumlah,  ROUND(l.harga_cost*1.11) hna_ppn, ROUND(l.harga_cost) hna, f.nama staff_req, f.ruangan, f.tipe unit, a.nama staff_acc
        FROM stok_depo s, list_logistik l, detail_request d,staff f, staff a
        WHERE s.id_req = d.id_req and s.id_logistik = l.id_logistik and d.id_staff = f.id_staff  and s.id_staff = a.id_staff and (DATE(s.tgl) BETWEEN '$mulai' and '$akhir')
        ORDER BY tanggal asc");
        return $hasil->result();
    }
} 