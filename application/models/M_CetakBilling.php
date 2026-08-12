<<<<<<< HEAD
<?php

class M_CetakBilling extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function selectLaporanRangeBilling($mulai, $akhir, $jenis_pelayanan, $klaim)
    {
        // date_default_timezone_set('Asia/Jakarta');
        if ($klaim == 'ALL') {
            $cb = "";
        } else if ($klaim == 'TIMAH') {
            $cb = "and (p.cara_bayar = '333' or p.cara_bayar = '3331')";
        } else if ($klaim == 'SENDIRI') {
            $cb = "and p.cara_bayar = '42'";
        } else if ($klaim == 'BPJS') {
            $cb = "and (p.cara_bayar = '30' )";
        } else if ($klaim == 'BPJSTK') {
            $cb = "and (p.cara_bayar = '99' )";
        } else if ($klaim == 'BPJS - INHEALTH') {
            $cb = "and (p.cara_bayar = 'b5' )";
        } else if ($klaim == 'BPJS - PT DAK') {
            $cb = "and (p.cara_bayar = 'DAK17' )";
        } else if ($klaim == 'BPJS - PT TIMAH') {
            $cb = "and (p.cara_bayar = 'b1' )";
        } else if ($klaim == 'BPJS - PT POS') {
            $cb = "and (p.cara_bayar = 'bpos' )";
        } else if ($klaim == 'BPJS - RSBT') {
            $cb = "and (p.cara_bayar = 'b33' )";
        } else if ($klaim == 'PT. BTM - BPJS') {
            $cb = "and (p.cara_bayar = 'BTMBPJS' )";
        } else if ($klaim == 'JASA RAHARJA - BPJS') {
            $cb = "and (p.cara_bayar = 'BPJH' )";
        } else {
            $cb = "and c.id_cara_bayar = '$klaim'";
        }
        if ($jenis_pelayanan == 'POLI') {
            $hasil = $this->db->query("SELECT  p.id_pelayanan,h.id_history
            FROM pelayanan p,history_pelayanan h,cara_bayar c
            WHERE p.id_pelayanan=h.id_pelayanan and p.cara_bayar=c.id_cara_bayar and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 
            and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1)
            GROUP by p.id_pelayanan, h.id_history");
            return $hasil->result();
        } else if ($jenis_pelayanan == 'RANAP') {
            $hasil = $this->db->query("SELECT p.id_pelayanan,h.id_history
            FROM pelayanan p, history_pelayanan_ranap h, cara_bayar c
            WHERE p.id_pelayanan=h.id_pelayanan and p.cara_bayar=c.id_cara_bayar and (DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 
            GROUP by p.id_pelayanan, h.id_history");
            return $hasil->result();
        } else if ($jenis_pelayanan == 'UGD') {
            $hasil = $this->db->query("SELECT p.id_pelayanan,h.id_history
            FROM pelayanan p, history_pelayanan_ugd h, cara_bayar c
            WHERE p.id_pelayanan=h.id_pelayanan and p.cara_bayar=c.id_cara_bayar and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 
            and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1)
            GROUP by p.id_pelayanan, h.id_history");
            return $hasil->result();
        } 
    }
    
=======
<?php

class M_CetakBilling extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function selectLaporanRangeBilling($mulai, $akhir, $jenis_pelayanan, $klaim)
    {
        // date_default_timezone_set('Asia/Jakarta');
        if ($klaim == 'ALL') {
            $cb = "";
        } else if ($klaim == 'TIMAH') {
            $cb = "and (p.cara_bayar = '333' or p.cara_bayar = '3331')";
        } else if ($klaim == 'SENDIRI') {
            $cb = "and p.cara_bayar = '42'";
        } else if ($klaim == 'BPJS') {
            $cb = "and (p.cara_bayar = '30' )";
        } else if ($klaim == 'BPJSTK') {
            $cb = "and (p.cara_bayar = '99' )";
        } else if ($klaim == 'BPJS - INHEALTH') {
            $cb = "and (p.cara_bayar = 'b5' )";
        } else if ($klaim == 'BPJS - PT DAK') {
            $cb = "and (p.cara_bayar = 'DAK17' )";
        } else if ($klaim == 'BPJS - PT TIMAH') {
            $cb = "and (p.cara_bayar = 'b1' )";
        } else if ($klaim == 'BPJS - PT POS') {
            $cb = "and (p.cara_bayar = 'bpos' )";
        } else if ($klaim == 'BPJS - RSBT') {
            $cb = "and (p.cara_bayar = 'b33' )";
        } else if ($klaim == 'PT. BTM - BPJS') {
            $cb = "and (p.cara_bayar = 'BTMBPJS' )";
        } else if ($klaim == 'JASA RAHARJA - BPJS') {
            $cb = "and (p.cara_bayar = 'BPJH' )";
        } else {
            $cb = "and c.id_cara_bayar = '$klaim'";
        }
        if ($jenis_pelayanan == 'POLI') {
            $hasil = $this->db->query("SELECT  p.id_pelayanan,h.id_history
            FROM pelayanan p,history_pelayanan h,cara_bayar c
            WHERE p.id_pelayanan=h.id_pelayanan and p.cara_bayar=c.id_cara_bayar and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 
            and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1)
            GROUP by p.id_pelayanan, h.id_history");
            return $hasil->result();
        } else if ($jenis_pelayanan == 'RANAP') {
            $hasil = $this->db->query("SELECT p.id_pelayanan,h.id_history
            FROM pelayanan p, history_pelayanan_ranap h, cara_bayar c
            WHERE p.id_pelayanan=h.id_pelayanan and p.cara_bayar=c.id_cara_bayar and (DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 
            GROUP by p.id_pelayanan, h.id_history");
            return $hasil->result();
        } else if ($jenis_pelayanan == 'UGD') {
            $hasil = $this->db->query("SELECT p.id_pelayanan,h.id_history
            FROM pelayanan p, history_pelayanan_ugd h, cara_bayar c
            WHERE p.id_pelayanan=h.id_pelayanan and p.cara_bayar=c.id_cara_bayar and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 
            and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1)
            GROUP by p.id_pelayanan, h.id_history");
            return $hasil->result();
        } 
    }
    
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
}