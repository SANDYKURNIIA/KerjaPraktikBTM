<?php

class M_Kunjungan_dokpri extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function selectLaporanKunjunganDokpri()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT d.nama dokter, COUNT(p.id_pelayanan) jumlah
        from pelayanan p, history_pelayanan h, dokter d
        WHERE p.id_pelayanan=h.id_pelayanan and d.id_dokter=h.dpjp and h.jenis_pelayanan 
        and p.status=1 and h.status=1 and p.tgl_masuk like '%$tgl%'
        GROUP by d.id_dokter
        ORDER by jumlah desc
        ");
        return $hasil->result();
    }

    public function selectLaporanRangeKunjunganDokpri($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $hasil = $this->db->query("SELECT d.nama dokter, COUNT(p.id_pelayanan) jumlah
        from pelayanan p, history_pelayanan h, dokter d
        WHERE p.id_pelayanan=h.id_pelayanan and d.id_dokter=h.dpjp 
        and h.jenis_pelayanan like '%prioritas%' and p.status=1 and h.status=1 and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')
        GROUP by d.id_dokter
        ORDER by jumlah desc
        ");
        return $hasil->result();
    }
}
