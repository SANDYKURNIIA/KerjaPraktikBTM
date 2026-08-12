<<<<<<< HEAD
<?php

class M_Biometri extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function selectLaporanBiometri()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT b.nama pasien, b.no_rm, h.tgl_masuk, l.nama tindakan, d.nama dokter,c.nama cara_bayar
        FROM pelayanan p, history_pelayanan h, list_tindakan_poli_mata l, tindakan_poli_mata t, pasien b, cara_bayar c, dokter d
        WHERE p.id_pelayanan=h.id_pelayanan and l.id_list_tindakan=t.id_list_tindakan and t.id_pelayanan=p.id_pelayanan and b.no_rm=p.id_pasien and c.id_cara_bayar=p.cara_bayar 
        and d.id_dokter=t.id_dokter and h.status=1 and p.status=1 and l.nama like '%biometri%' and h.tgl_masuk like '%$tgl%'
        group by p.id_pelayanan
        ORDER by tgl_masuk asc");
        return $hasil->result();
    }
    public function selectLaporanBiometriRange($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT b.nama pasien, b.no_rm, h.tgl_masuk, l.nama tindakan, d.nama dokter,c.nama cara_bayar
        FROM pelayanan p, history_pelayanan h, list_tindakan_poli_mata l, tindakan_poli_mata t, pasien b, cara_bayar c, dokter d
        WHERE p.id_pelayanan=h.id_pelayanan and l.id_list_tindakan=t.id_list_tindakan and t.id_pelayanan=p.id_pelayanan and b.no_rm=p.id_pasien and c.id_cara_bayar=p.cara_bayar and d.id_dokter=t.id_dokter and l.nama like '%biometri%' and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')
        group by p.id_pelayanan
        ORDER by tgl_masuk asc");
        return $hasil->result();
    }
=======
<?php

class M_Biometri extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function selectLaporanBiometri()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT b.nama pasien, b.no_rm, h.tgl_masuk, l.nama tindakan, d.nama dokter,c.nama cara_bayar
        FROM pelayanan p, history_pelayanan h, list_tindakan_poli_mata l, tindakan_poli_mata t, pasien b, cara_bayar c, dokter d
        WHERE p.id_pelayanan=h.id_pelayanan and l.id_list_tindakan=t.id_list_tindakan and t.id_pelayanan=p.id_pelayanan and b.no_rm=p.id_pasien and c.id_cara_bayar=p.cara_bayar 
        and d.id_dokter=t.id_dokter and h.status=1 and p.status=1 and l.nama like '%biometri%' and h.tgl_masuk like '%$tgl%'
        group by p.id_pelayanan
        ORDER by tgl_masuk asc");
        return $hasil->result();
    }
    public function selectLaporanBiometriRange($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT b.nama pasien, b.no_rm, h.tgl_masuk, l.nama tindakan, d.nama dokter,c.nama cara_bayar
        FROM pelayanan p, history_pelayanan h, list_tindakan_poli_mata l, tindakan_poli_mata t, pasien b, cara_bayar c, dokter d
        WHERE p.id_pelayanan=h.id_pelayanan and l.id_list_tindakan=t.id_list_tindakan and t.id_pelayanan=p.id_pelayanan and b.no_rm=p.id_pasien and c.id_cara_bayar=p.cara_bayar and d.id_dokter=t.id_dokter and l.nama like '%biometri%' and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')
        group by p.id_pelayanan
        ORDER by tgl_masuk asc");
        return $hasil->result();
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
}