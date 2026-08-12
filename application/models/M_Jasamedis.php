<?php

class M_Jasamedis extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function selectLaporanRangeJasmed($mulai, $akhir, $jenis_pelayanan, $klaim)
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
            $cb = "and (p.cara_bayar = 'b5' or p.cara_bayar = 'a722' or p.cara_bayar = 'a723' or p.cara_bayar = 'a724' )";
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
            $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan, lp.nama_panjang nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_anak l, tindakan_poli_anak t, cara_bayar c, dokter d,list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and h.nama_poli = lp.id_list_poli
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan, lp.nama_panjang nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_bedah_umum l, tindakan_poli_bedah t, cara_bayar c, dokter d,list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and h.nama_poli = lp.id_list_poli
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan, lp.nama_panjang nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_bedah_mulut l, tindakan_poli_bedah_mulut t, cara_bayar c, dokter d,list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and h.nama_poli = lp.id_list_poli
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan, lp.nama_panjang nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_fisio l, tindakan_poli_fisio t, cara_bayar c, dokter d,list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and h.nama_poli = lp.id_list_poli
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan, lp.nama_panjang nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_saraf l, tindakan_poli_saraf t, cara_bayar c, dokter d,list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and h.nama_poli = lp.id_list_poli
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan, lp.nama_panjang nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_gigi l, tindakan_poli_gigi t, cara_bayar c, dokter d,list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and h.nama_poli = lp.id_list_poli
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan, lp.nama_panjang nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_gigi l, tindakan_konservasi_gigi t, cara_bayar c, dokter d,list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and h.nama_poli = lp.id_list_poli
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan, lp.nama_panjang nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_paru l, tindakan_poli_paru t, cara_bayar c, dokter d,list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and h.nama_poli = lp.id_list_poli
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan, lp.nama_panjang nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_internis l, tindakan_poli_internis t, cara_bayar c, dokter d,list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and h.nama_poli = lp.id_list_poli
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan, lp.nama_panjang nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_jantung l, tindakan_poli_jantung t, cara_bayar c, dokter d,list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and h.nama_poli = lp.id_list_poli
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan, lp.nama_panjang nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_kulit l, tindakan_poli_kulit t, cara_bayar c, dokter d,list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and h.nama_poli = lp.id_list_poli 
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan, lp.nama_panjang nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_mata l, tindakan_poli_mata t, cara_bayar c, dokter d,list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and h.nama_poli = lp.id_list_poli
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan, lp.nama_panjang nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_obgyne l, tindakan_poli_obgyne t, cara_bayar c, dokter d,list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and h.nama_poli = lp.id_list_poli
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan, lp.nama_panjang nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_tht l, tindakan_poli_tht t, cara_bayar c, dokter d,list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and h.nama_poli = lp.id_list_poli 
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan, lp.nama_panjang nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_umum l, tindakan_poli_umum t, cara_bayar c, dokter d,list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and h.nama_poli = lp.id_list_poli 
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan, lp.nama_panjang nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_terapi_bicara l, tindakan_poli_terapi_bicara t, cara_bayar c, dokter d,list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and h.nama_poli = lp.id_list_poli 
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter,'0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, 1 as frek , h.jenis_pelayanan, lp.nama_panjang nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan h, cara_bayar c, dokter d,list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and h.nama_poli = lp.id_list_poli 
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and h.biaya_jasa != 0 and h.status=1
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            return $hasil->result();
        } else if ($jenis_pelayanan == 'RANAP') {
            $hasil = $this->db->query("SELECT a.*, 'RAWAT INAP' as jenis_pelayanan from(SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, l.harga_jasa jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek, r.nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan_ranap h, list_tindakan_apelkes l, tindakan_apelkes t, cara_bayar c, dokter d, ruangan r
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and t.tipe=r.id_ruangan
            and l.id_list_tindakan_apelkes=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP BY t.id_pelayanan,l.id_list_tindakan_apelkes, t.id_dokter
            ) as a
            UNION ALL
            SELECT b.*,'-' as nama_ruangan, 'KAMAR OPERASI' as jenis_pelayanan from(
                SELECT date(p.tgl_keluar) tgl_keluar,date(t.tanggal) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (t.harga) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek 
                FROM pelayanan p, pasien ps, list_kamar_ok l, tindakan_ok t, cara_bayar c, dokter d
                WHERE p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_kamar_ok=t.id_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
                GROUP by t.id_pelayanan,l.id_list_kamar_ok, t.id_dokter
                order by pasien asc
            ) as b
             UNION ALL
             SELECT c.*, 'RAWAT INAP' as jenis_pelayanan from(SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, l.harga_jasa jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek, r.nama_ruangan
            FROM pelayanan p, pasien ps,history_pelayanan_ranap h, list_tindakan_apelkes l, tindakan_penunjang_lain t, cara_bayar c, dokter d, ruangan r
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and t.tipe = r.id_ruangan
            and l.id_list_tindakan_apelkes=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            GROUP BY t.id_pelayanan,l.id_list_tindakan_apelkes, t.id_dokter
            ) as c
            order by pasien asc");
            return $hasil->result();
        } else if ($jenis_pelayanan == 'UGD RANAP') {
            if ($klaim == 'ALL') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pelayanan = r.id_pelayanan
            and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0  and r.status=1 and h.status=1
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir')  
            and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan and r.status=1 and h.status=1
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            } else if ($klaim == 'TIMAH') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pelayanan = r.id_pelayanan
                and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and (p.cara_bayar = '333' or p.cara_bayar = '3331')  
                and p.status=1 and l.harga_jasa != 0 and p.id_pelayanan = r.id_pelayanan and r.status=1 and h.status=1
                GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
                UNION ALL
                SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp 
                and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and (p.cara_bayar = '333' or p.cara_bayar = '3331') and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan and r.status=1 and h.status=1
                GROUP by p.id_pelayanan, h.id_history
                order by pasien asc");
            } else if ($klaim == 'SENDIRI') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pelayanan = r.id_pelayanan
                and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = '42' 
                and p.status=1 and l.harga_jasa != 0  and r.status=1 and h.status=1
                GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
                UNION ALL
                SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') 
                and p.cara_bayar = '42' and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan and r.status=1 and h.status=1
                GROUP by p.id_pelayanan, h.id_history
                order by pasien asc");
            } else if ($klaim == 'BPJS') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pelayanan = r.id_pelayanan
                and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = '30'  and p.status=1 and l.harga_jasa != 0  and r.status=1 and h.status=1
                GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
                UNION ALL
                SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp 
                and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = '30' and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan and r.status=1 and h.status=1
                GROUP by p.id_pelayanan, h.id_history
                order by pasien asc");
            } else if ($klaim == 'BPJSTK') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pelayanan = r.id_pelayanan
                and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = '99'  and p.status=1 and l.harga_jasa != 0 and r.status=1 and h.status=1
                GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
                UNION ALL
                SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') 
                and p.cara_bayar = '99' and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan and r.status=1 and h.status=1
                GROUP by p.id_pelayanan, h.id_history
                order by pasien asc");
            } else if ($klaim == 'BPJS - INHEALTH') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pelayanan = r.id_pelayanan
                and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'b5'  and p.status=1 and l.harga_jasa != 0 and r.status=1 and h.status=1
                GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
                UNION ALL
                SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') 
                and p.cara_bayar = 'b5' and p.status=1 and h.biaya_jasa != 0 and r.status=1 and h.status=1 and p.id_pelayanan = r.id_pelayanan
                GROUP by p.id_pelayanan, h.id_history
                order by pasien asc");
            } else if ($klaim == 'BPJS - PT DAK') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pelayanan = r.id_pelayanan
                and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'DAK17'  and p.status=1 and l.harga_jasa != 0 and r.status=1 and h.status=1
                GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
                UNION ALL
                SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp 
                and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'DAK17' and p.status=1 and h.biaya_jasa != 0 and r.status=1 and h.status=1 and p.id_pelayanan = r.id_pelayanan
                GROUP by p.id_pelayanan, h.id_history
                order by pasien asc");
            } else if ($klaim == 'BPJS - PT TIMAH') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pelayanan = r.id_pelayanan
                and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'b1'  and p.status=1 and l.harga_jasa != 0 and r.status=1 and h.status=1
                GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
                UNION ALL
                SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp 
                and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'b1' and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan
                GROUP by p.id_pelayanan, h.id_history
                order by pasien asc");
            } else if ($klaim == 'BPJS - PT POS') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pelayanan = r.id_pelayanan
                and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'bpos'  and p.status=1 and l.harga_jasa != 0 and r.status=1 and h.status=1
                GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
                UNION ALL
                SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp 
                and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'bpos' and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan
                GROUP by p.id_pelayanan, h.id_history
                order by pasien asc");
            } else if ($klaim == 'BPJS - RSBT') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pelayanan = r.id_pelayanan
                and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'b33'  and p.status=1 and l.harga_jasa != 0 and p.id_pelayanan = r.id_pelayanan and r.status=1 and h.status=1
                GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
                UNION ALL
                SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') 
                and p.cara_bayar = 'b33' and p.status=1 and h.biaya_jasa != 0 and r.status=1 and h.status=1 and p.id_pelayanan = r.id_pelayanan
                GROUP by p.id_pelayanan, h.id_history
                order by pasien asc");
            } else if ($klaim == 'PT. BTM - BPJS') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pelayanan = r.id_pelayanan
                and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'BTMBPJS'  and p.status=1 and l.harga_jasa != 0 and r.status=1 and h.status=1
                GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
                UNION ALL
                SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp 
                and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'BTMBPJS' and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan and r.status=1 and h.status=1
                GROUP by p.id_pelayanan, h.id_history
                order by pasien asc");
            } else if ($klaim == 'JASA RAHARJA - BPJS') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pelayanan = r.id_pelayanan
                and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'BPJH'  and p.status=1 and l.harga_jasa != 0 and r.status=1 and h.status=1
                GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
                UNION ALL
                SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') 
                and p.cara_bayar = 'BPJH' and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan and r.status=1 and h.status=1
                GROUP by p.id_pelayanan, h.id_history
                order by pasien asc");
            } else {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pelayanan = r.id_pelayanan
                and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and c.id_cara_bayar = '$klaim'  and p.status=1 and l.harga_jasa != 0 and r.status=1 and h.status=1
                GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
                UNION ALL
                SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
                WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp 
                and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and c.id_cara_bayar = '$klaim' and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan and r.status=1 and h.status=1 
                GROUP by p.id_pelayanan, h.id_history
                order by pasien asc");
            }
            return $hasil->result();
            
        } else if ($jenis_pelayanan == 'UGD RAJAL') {
            $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan 
            and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and h.status=1
            and p.id_pelayanan not in(SELECT id_pelayanan FROM history_pelayanan_ranap where status =1)
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and h.biaya_jasa != 0
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            return $hasil->result();
        }
    }
    public function selectLaporanRangeJasmed_bydokter($mulai, $akhir, $jenis_pelayanan, $klaim, $dokter)
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
            $cb = "and (p.cara_bayar = 'b5' or p.cara_bayar = 'a722' or p.cara_bayar = 'a723' or p.cara_bayar = 'a724' )";
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
            $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_anak l, tindakan_poli_anak t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_bedah_umum l, tindakan_poli_bedah t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_bedah_mulut l, tindakan_poli_bedah_mulut t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_fisio l, tindakan_poli_fisio t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_gigi l, tindakan_poli_gigi t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_saraf l, tindakan_poli_saraf t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_gigi l, tindakan_konservasi_gigi t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_paru l, tindakan_poli_paru t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_internis l, tindakan_poli_internis t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_jantung l, tindakan_poli_jantung t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_kulit l, tindakan_poli_kulit t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_mata l, tindakan_poli_mata t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_obgyne l, tindakan_poli_obgyne t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_tht l, tindakan_poli_tht t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_umum l, tindakan_poli_umum t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_terapi_bicara l, tindakan_poli_terapi_bicara t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter,'0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, 1 as frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and h.biaya_jasa != 0
            and d.nama ='$dokter'
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            return $hasil->result();
        } else if ($jenis_pelayanan == 'RANAP') {
            $hasil = $this->db->query("SELECT a.*, 'RAWAT INAP' as jenis_pelayanan from(SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, l.harga_jasa jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek 
            FROM pelayanan p, pasien ps,history_pelayanan_ranap h, list_tindakan_apelkes l, tindakan_apelkes t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_list_tindakan_apelkes=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP BY t.id_pelayanan,l.id_list_tindakan_apelkes, t.id_dokter
            ) as a
            UNION ALL
            SELECT b.*, 'KAMAR OPERASI' as jenis_pelayanan from(
                SELECT date(p.tgl_keluar) tgl_keluar,date(t.tanggal) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (t.harga) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek 
                FROM pelayanan p, pasien ps, list_kamar_ok l, tindakan_ok t, cara_bayar c, dokter d
                WHERE p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_kamar_ok=t.id_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
                and d.nama ='$dokter'
                GROUP by t.id_pelayanan,l.id_list_kamar_ok, t.id_dokter
                order by pasien asc
            ) as b
             UNION ALL
             SELECT c.*, 'RAWAT INAP' as jenis_pelayanan from(SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, l.harga_jasa jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek 
            FROM pelayanan p, pasien ps,history_pelayanan_ranap h, list_tindakan_apelkes l, tindakan_penunjang_lain t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_list_tindakan_apelkes=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0
            and d.nama ='$dokter'
            GROUP BY t.id_pelayanan,l.id_list_tindakan_apelkes, t.id_dokter
            ) as c
            order by pasien asc");
            return $hasil->result();
        } else if ($jenis_pelayanan == 'UGD RANAP') {
            if ($klaim == 'ALL') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter 
            and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0 and d.nama ='$dokter' and p.id_pelayanan = r.id_pelayanan
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan
            and d.nama ='$dokter' 
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            } else if ($klaim == 'TIMAH') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter 
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and (p.cara_bayar = '333' or p.cara_bayar = '3331')  and p.status=1 and l.harga_jasa != 0 and d.nama ='$dokter' and p.id_pelayanan = r.id_pelayanan
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and (p.cara_bayar = '333' or p.cara_bayar = '3331')  and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan
            and d.nama ='$dokter' 
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            } else if ($klaim == 'SENDIRI') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter 
            and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = '42'  and p.status=1 and l.harga_jasa != 0 and d.nama ='$dokter' and p.id_pelayanan = r.id_pelayanan
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = '42'  and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan
            and d.nama ='$dokter' 
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            } else if ($klaim == 'BPJS') {
                $cb = "and (p.cara_bayar = '30' )";
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter 
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = '30'  and p.status=1 and l.harga_jasa != 0 and d.nama ='$dokter' and p.id_pelayanan = r.id_pelayanan
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = '30'  and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan
            and d.nama ='$dokter' 
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            } else if ($klaim == 'BPJSTK') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter 
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = '99'  and p.status=1 and l.harga_jasa != 0 and d.nama ='$dokter' and p.id_pelayanan = r.id_pelayanan
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = '99'  and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan
            and d.nama ='$dokter' 
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            } else if ($klaim == 'BPJS - INHEALTH') {
                $cb = "and (p.cara_bayar = 'b5' )";
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter 
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'b5'  and p.status=1 and l.harga_jasa != 0 and d.nama ='$dokter' and p.id_pelayanan = r.id_pelayanan
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'b5'  and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan
            and d.nama ='$dokter' 
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            } else if ($klaim == 'BPJS - PT DAK') {
                $cb = "and (p.cara_bayar = 'DAK17' )";
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter 
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'DAK17'  and p.status=1 and l.harga_jasa != 0 and d.nama ='$dokter' and p.id_pelayanan = r.id_pelayanan
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'DAK17'  and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan
            and d.nama ='$dokter' 
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            } else if ($klaim == 'BPJS - PT TIMAH') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter 
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'b1'  and p.status=1 and l.harga_jasa != 0 and d.nama ='$dokter' and p.id_pelayanan = r.id_pelayanan
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'b1'  and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan
            and d.nama ='$dokter' 
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            } else if ($klaim == 'BPJS - PT POS') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter 
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'bpos'  and p.status=1 and l.harga_jasa != 0 and d.nama ='$dokter' and p.id_pelayanan = r.id_pelayanan
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'bpos'  and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan
            and d.nama ='$dokter' 
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            } else if ($klaim == 'BPJS - RSBT') {
                $cb = "and (p.cara_bayar = 'b33' )";
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter 
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'b33'  and p.status=1 and l.harga_jasa != 0 and d.nama ='$dokter' and p.id_pelayanan = r.id_pelayanan
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'b33'  and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan
            and d.nama ='$dokter' 
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            } else if ($klaim == 'PT. BTM - BPJS') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter 
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'BTMBPJS'  and p.status=1 and l.harga_jasa != 0 and d.nama ='$dokter' and p.id_pelayanan = r.id_pelayanan
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'BTMBPJS'  and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan
            and d.nama ='$dokter' 
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            } else if ($klaim == 'JASA RAHARJA - BPJS') {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter 
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'BPJH'  and p.status=1 and l.harga_jasa != 0 and d.nama ='$dokter' and p.id_pelayanan = r.id_pelayanan
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and p.cara_bayar = 'BPJH'  and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan
            and d.nama ='$dokter' 
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            } else {
                $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter 
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and c.id_cara_bayar = '$klaim'  and p.status=1 and l.harga_jasa != 0 and d.nama ='$dokter' and p.id_pelayanan = r.id_pelayanan
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d, history_pelayanan_ranap r
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') and c.id_cara_bayar = '$klaim'  and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan = r.id_pelayanan
            and d.nama ='$dokter' 
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            }

            return $hasil->result();
        } else if ($jenis_pelayanan == 'UGD RAJAL') {
            $hasil = $this->db->query("SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter 
            and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and l.harga_jasa != 0 and d.nama ='$dokter' and p.id_pelayanan not in(SELECT id_pelayanan FROM history_pelayanan_ranap)
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(p.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_keluar) BETWEEN '$mulai' and '$akhir') " . $cb . "  and p.status=1 and h.biaya_jasa != 0 and p.id_pelayanan not in(SELECT id_pelayanan FROM history_pelayanan_ranap)
            and d.nama ='$dokter' 
            GROUP by p.id_pelayanan, h.id_history
            order by pasien asc");
            return $hasil->result();
        }
    }

    public function selectJasmed($mulai, $akhir, $jenis_pelayanan)
    {
        // date_default_timezone_set('Asia/Jakarta');
        // if($klaim =='ALL'){
        $cb = "";
        // }else{
        //     $cb = "and c.id_cara_bayar = '$klaim'";
        // }
        if ($jenis_pelayanan == 'rajal') {
            $hasil = $this->db->query("SELECT a.* FROM(SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_anak l, tindakan_poli_anak t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_bedah_umum l, tindakan_poli_bedah t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_fisio l, tindakan_poli_fisio t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_gigi l, tindakan_poli_gigi t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_internis l, tindakan_poli_internis t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_jantung l, tindakan_poli_jantung t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_kulit l, tindakan_poli_kulit t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_mata l, tindakan_poli_mata t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_obgyne l, tindakan_poli_obgyne t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_tht l, tindakan_poli_tht t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_umum l, tindakan_poli_umum t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter,'0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, 1 as frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.biaya_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by p.id_pelayanan, h.id_history
            ) as a
            UNION ALL
            SELECT c.*, 'IGD' as jenis_pelayanan FROM(
                SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek ,p.id_pelayanan,h.id_history
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.biaya_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by p.id_pelayanan, h.id_history
            ) as c
            where id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status =1)
            order by pasien asc");
            return $hasil->result();
        } else if ($jenis_pelayanan == 'RANAP') {
            $hasil = $this->db->query("SELECT a.*, 'RAWAT INAP' as jenis_pelayanan FROM(SELECT date(h.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, l.harga_jasa jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history
            FROM pelayanan p, pasien ps,history_pelayanan_ranap h, list_tindakan_apelkes l, tindakan_apelkes t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_list_tindakan_apelkes=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP BY t.id_pelayanan,l.id_list_tindakan_apelkes, t.id_dokter
            ) AS a
            UNION ALL
            SELECT b.*, 'IGD' as jenis_pelayanan FROM(
                SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and id_pelayanan in (select id_pelayanan from history_pelayanan_ranap where status =1)
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek 
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.biaya_jasa != 0
            and id_pelayanan in (select id_pelayanan from history_pelayanan_ranap where status =1)
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            
            GROUP by p.id_pelayanan, h.id_history
            )as b
            SELECT c.*,'KAMAR OPERASI' as jenis_pelayanan FROM(
                SELECT date(p.tgl_keluar) tgl_keluar,date(t.tanggal) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (t.harga) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d
                FROM pelayanan p, pasien ps, list_kamar_ok l, tindakan_ok t, cara_bayar c, dokter d
                WHERE p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_kamar_ok=t.id_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
                and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
                GROUP by t.id_pelayanan,l.id_list_kamar_ok, t.id_dokter
            ) as c

            order by pasien asc");
            return $hasil->result();
        } else {
            $hasil = $this->db->query("SELECT a.* FROM(SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_anak l, tindakan_poli_anak t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_bedah_umum l, tindakan_poli_bedah t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_fisio l, tindakan_poli_fisio t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_gigi l, tindakan_poli_gigi t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_internis l, tindakan_poli_internis t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_jantung l, tindakan_poli_jantung t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_kulit l, tindakan_poli_kulit t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_mata l, tindakan_poli_mata t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_obgyne l, tindakan_poli_obgyne t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_tht l, tindakan_poli_tht t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_umum l, tindakan_poli_umum t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter,'0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, 1 as frek ,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.biaya_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by p.id_pelayanan, h.id_history
            ) as a
            UNION ALL
            SELECT c.*, 'IGD' as jenis_pelayanan FROM(
                SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek ,p.id_pelayanan,h.id_history
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.biaya_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP by p.id_pelayanan, h.id_history
            ) as c
            UNION ALL
            SELECT d.*, 'RAWAT INAP' as jenis_pelayanan FROM(SELECT date(h.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, l.harga_jasa jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history
            FROM pelayanan p, pasien ps,history_pelayanan_ranap h, list_tindakan_apelkes l, tindakan_apelkes t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar 
            and l.id_list_tindakan_apelkes=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
            and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
            GROUP BY t.id_pelayanan,l.id_list_tindakan_apelkes, t.id_dokter
            ) AS d
             UNION ALL
            SELECT e.*,'KAMAR OPERASI' as jenis_pelayanan FROM(
                SELECT date(p.tgl_keluar) tgl_keluar,date(t.tanggal) tgl_masuk, ps.no_rm, ps.nama pasien, p.no_sep, l.nama tindakan, (t.harga) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history
                FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d
                FROM pelayanan p, pasien ps, list_kamar_ok l, tindakan_ok t, cara_bayar c, dokter d
                WHERE p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_kamar_ok=t.id_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1 and l.harga_jasa != 0
                and (c.nama like '%BPJS%' or p.cara_bayar = '42' or p.cara_bayar = '333' or p.cara_bayar = '3331' or p.cara_bayar = 'PTDAK')
                GROUP by t.id_pelayanan,l.id_list_kamar_ok, t.id_dokter
            ) as e
            order by pasien asc");
            return $hasil->result();
        }
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function selectLaporanRangeJasmed_realese($mulai, $akhir)
    {
        return $this->db->query("SELECT v.*,IFNULL(d.piutang,0) piutang
        from v_total_piutang v
        join (SELECT sum(t.debet) piutang, t.id_pelayanan 
                          from detail_pembayaran_piutang t, pembayaran_piutang p
                         where t.id_fk=p.no_dokumen and p.save != 99
                         group by t.id_pelayanan
                         ) d on v.id_pelayanan= d.id_pelayanan
                         where date(v.tgl_keluar) BETWEEN '$mulai' and '$akhir'
                         having (tagihan-piutang) = 0")->result();
    }
    public function detailJasmed_realese($mulai, $akhir)
    {
        // // date_default_timezone_set('Asia/Jakarta');
        // $hasil = array();
        // // $pasien = $this->db->query("SELECT v.id_pelayanan
        // // from v_total_piutang v
        // // join (SELECT sum(t.debet) piutang, t.id_pelayanan ,p.tgl
        // //                 from detail_pembayaran_piutang t, pembayaran_piutang p
        // //                  where t.id_fk=p.no_dokumen and p.no_jurnal is not null
        // //                  group by t.id_pelayanan
        // //                  ) d on v.id_pelayanan= d.id_pelayanan
        // //                  where date(d.tgl) BETWEEN '$mulai' and '$akhir'
        // //                  and (v.tagihan-d.piutang) = 0")->result();
        // $pasien = $this->db->query("SELECT DISTINCT(t.id_pelayanan) id_pelayanan
        //  from detail_pembayaran_piutang t, pembayaran_piutang p
        //   where t.id_fk=p.no_dokumen and p.no_jurnal is not null and p.save = 2
        //   and date(p.tgl) BETWEEN '$mulai' and '$akhir' and (p.vendor not like '%BPJS%' or p.vendor = 'BPJS' or p.vendor = 'BPJSTK')
        //   UNION all
        // SELECT id_pelayanan
        // from v_total_piutang 
        // where pk in (select invoice from detail_pembayaran_piutang t, pembayaran_piutang p
        //         where t.id_fk=p.no_dokumen and p.no_jurnal is not null and p.save = 2
        // and date(p.tgl) BETWEEN '$mulai' and '$akhir' and p.vendor like '%BPJS%' and p.vendor != 'BPJSTK' and p.vendor != 'BPJS')
        // ")->result();

        // foreach ($pasien as $row) {
        //     $hasil[] = $this->db->query("SELECT g.*,ifnull(d.diskon_konsul,0) diskon_konsul, ifnull(d.diskon_visite,0) diskon_visite FROM(
        //     SELECT a.* FROM(SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
        //     FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_anak l, tindakan_poli_anak t, cara_bayar c, dokter d
        //     WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and p.id_pelayanan = '$row->id_pelayanan'  and p.status=1 and l.harga_jasa != 0
        //     GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
        //     UNION ALL
        //     SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
        //     FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_bedah_umum l, tindakan_poli_bedah t, cara_bayar c, dokter d
        //     WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and p.id_pelayanan = '$row->id_pelayanan'  and p.status=1 and l.harga_jasa != 0
        //     GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
        //     UNION ALL
        //     SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
        //     FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_fisio l, tindakan_poli_fisio t, cara_bayar c, dokter d
        //     WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and p.id_pelayanan = '$row->id_pelayanan'  and p.status=1 and l.harga_jasa != 0
        //     GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
        //     UNION ALL
        //     SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
        //     FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_gigi l, tindakan_poli_gigi t, cara_bayar c, dokter d
        //     WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and p.id_pelayanan = '$row->id_pelayanan'  and p.status=1 and l.harga_jasa != 0
        //     GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
        //     UNION ALL
        //     SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
        //     FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_gigi l, tindakan_konservasi_gigi t, cara_bayar c, dokter d
        //     WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and p.id_pelayanan = '$row->id_pelayanan'  and p.status=1 and l.harga_jasa != 0
        //     GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
        //     UNION ALL
        //     SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
        //     FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_internis l, tindakan_poli_internis t, cara_bayar c, dokter d
        //     WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and p.id_pelayanan = '$row->id_pelayanan'  and p.status=1 and l.harga_jasa != 0
        //     GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
        //     UNION ALL
        //     SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history, h.jenis_pelayanan 
        //     FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_jantung l, tindakan_poli_jantung t, cara_bayar c, dokter d
        //     WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and p.id_pelayanan = '$row->id_pelayanan'  and p.status=1 and l.harga_jasa != 0
        //     GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
        //     UNION ALL
        //     SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
        //     FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_kulit l, tindakan_poli_kulit t, cara_bayar c, dokter d
        //     WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and p.id_pelayanan = '$row->id_pelayanan'  and p.status=1 and l.harga_jasa != 0
        //     GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
        //     UNION ALL
        //     SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
        //     FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_mata l, tindakan_poli_mata t, cara_bayar c, dokter d
        //     WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and p.id_pelayanan = '$row->id_pelayanan'  and p.status=1 and l.harga_jasa != 0
        //     GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
        //     UNION ALL
        //     SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
        //     FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_obgyne l, tindakan_poli_obgyne t, cara_bayar c, dokter d
        //     WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and p.id_pelayanan = '$row->id_pelayanan'  and p.status=1 and l.harga_jasa != 0
        //     GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
        //     UNION ALL
        //     SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
        //     FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_tht l, tindakan_poli_tht t, cara_bayar c, dokter d
        //     WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and p.id_pelayanan = '$row->id_pelayanan'  and p.status=1 and l.harga_jasa != 0
        //     GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
        //     UNION ALL
        //     SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
        //     FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_umum l, tindakan_poli_umum t, cara_bayar c, dokter d
        //     WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and p.id_pelayanan = '$row->id_pelayanan'  and p.status=1 and l.harga_jasa != 0
        //     GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
        //     UNION ALL
        //     SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter,'0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, 1 as frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
        //     FROM pelayanan p, pasien ps,history_pelayanan h, cara_bayar c, dokter d
        //     WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and p.id_pelayanan = '$row->id_pelayanan'  and p.status=1 and h.biaya_jasa != 0
        //     GROUP by p.id_pelayanan, h.id_history
        //     ) as a
        //     UNION ALL
        //     SELECT b.*, 'RAWAT INAP' as jenis_pelayanan FROM(
        //         SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, l.harga_jasa jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history
        //     FROM pelayanan p, pasien ps,history_pelayanan_ranap h, list_tindakan_apelkes l, tindakan_apelkes t, cara_bayar c, dokter d
        //     WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan_apelkes=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and p.id_pelayanan = '$row->id_pelayanan'  and p.status=1 and l.harga_jasa != 0
        //     GROUP by t.id_pelayanan,l.id_list_tindakan_apelkes, t.id_dokter
        //     ) as b
        //     UNION ALL
        //     SELECT c.*, 'IGD' as jenis_pelayanan FROM(
        //         SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history
        //     FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d
        //     WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and p.id_pelayanan = '$row->id_pelayanan'  and p.status=1 and l.harga_jasa != 0
        //     GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
        //     UNION ALL
        //     SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek ,p.id_pelayanan,h.id_history
        //     FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d
        //     WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and p.id_pelayanan = '$row->id_pelayanan'  and p.status=1 and h.biaya_jasa != 0
        //     GROUP by p.id_pelayanan, h.id_history
        //     ) as c
        //     UNION ALL
        //     SELECT d.*,'' as id_history, 'OK' as jenis_pelayanan FROM(
        //         SELECT date(p.tgl_keluar) tgl_keluar,date(t.tanggal) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan
        //     FROM pelayanan p, pasien ps, list_kamar_ok l, tindakan_ok t, cara_bayar c, dokter d
        //     WHERE p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_kamar_ok=t.id_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and p.id_pelayanan = '$row->id_pelayanan'  and p.status=1 and l.harga_jasa != 0
        //     GROUP by t.id_pelayanan,l.id_list_kamar_ok, t.id_dokter
        //     )as d
        //     order by pasien asc
        //     ) as g
        //     left join detail_kasir_diskon d on d.id_history = g.id_history and (d.diskon_konsul != 0 or d.diskon_visite != 0)")->result();
        // }
        // return (is_array($hasil)) ? $hasil : array();

        $hasil = $this->db->query("SELECT g.*,ifnull(d.diskon_konsul,0) diskon_konsul, ifnull(d.diskon_visite,0) diskon_visite FROM(
            SELECT a.* FROM(SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_anak l, tindakan_poli_anak t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter   and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_bedah_umum l, tindakan_poli_bedah t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter   and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_fisio l, tindakan_poli_fisio t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter   and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_gigi l, tindakan_poli_gigi t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter   and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_gigi l, tindakan_konservasi_gigi t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter   and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_internis l, tindakan_poli_internis t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter   and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history, h.jenis_pelayanan 
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_jantung l, tindakan_poli_jantung t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter   and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_kulit l, tindakan_poli_kulit t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter   and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_mata l, tindakan_poli_mata t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter   and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_obgyne l, tindakan_poli_obgyne t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter   and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_tht l, tindakan_poli_tht t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter   and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_umum l, tindakan_poli_umum t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter   and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter,'0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, 1 as frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp   and p.status=1 and h.biaya_jasa != 0
            GROUP by p.id_pelayanan, h.id_history
            ) as a
            UNION ALL
            SELECT b.*, 'RAWAT INAP' as jenis_pelayanan FROM(
                SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, l.harga_jasa jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history
            FROM pelayanan p, pasien ps,history_pelayanan_ranap h, list_tindakan_apelkes l, tindakan_apelkes t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan_apelkes=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter   and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan_apelkes, t.id_dokter
            ) as b
            UNION ALL
            SELECT c.*, 'IGD' as jenis_pelayanan FROM(
                SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter   and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek ,p.id_pelayanan,h.id_history
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp   and p.status=1 and h.biaya_jasa != 0
            GROUP by p.id_pelayanan, h.id_history
            ) as c
            UNION ALL
            SELECT d.*,'' as id_history, 'OK' as jenis_pelayanan FROM(
                SELECT date(p.tgl_keluar) tgl_keluar,date(t.tanggal) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (t.harga) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan
            FROM pelayanan p, pasien ps, list_kamar_ok l, tindakan_ok t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_kamar_ok=t.id_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter   and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_kamar_ok, t.id_dokter
            )as d
            
            
            order by pasien asc
            ) as g
            left join detail_kasir_diskon d on d.id_history = g.id_history and (d.diskon_konsul != 0 or d.diskon_visite != 0)
            join (SELECT DISTINCT(t.id_pelayanan) id_pelayanan
                    from detail_pembayaran_piutang t, pembayaran_piutang p
                    where t.id_fk=p.no_dokumen and p.no_jurnal is not null and p.save = 2
                    and date(p.tgl) BETWEEN '$mulai' and '$akhir' and (p.vendor not like '%BPJS%' or p.vendor = 'BPJS' or p.vendor = 'BPJSTK')
                    UNION all
                    SELECT id_pelayanan
                    from v_total_piutang 
                    where pk in (select invoice from detail_pembayaran_piutang t, pembayaran_piutang p
                            where t.id_fk=p.no_dokumen and p.no_jurnal is not null and p.save = 2
                    and date(p.tgl) BETWEEN '$mulai' and '$akhir' and p.vendor like '%BPJS%' and p.vendor != 'BPJSTK' and p.vendor != 'BPJS')
            ) as g1 on g1.id_pelayanan = g.id_pelayanan
            where dokter != '-'
            ")->result();
        //    }
        return $hasil;
    }
    public function detailpasien_realese_bydokter($mulai, $akhir, $id_dokter)
    {

        $hasil = $this->db->query("SELECT g.*,ifnull(d.diskon_konsul,0) diskon_konsul, ifnull(d.diskon_visite,0) diskon_visite FROM(
            SELECT a.* FROM(SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_anak l, tindakan_poli_anak t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and d.id_dokter = '$id_dokter'  and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_bedah_umum l, tindakan_poli_bedah t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and d.id_dokter = '$id_dokter'  and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_fisio l, tindakan_poli_fisio t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and d.id_dokter = '$id_dokter'  and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_gigi l, tindakan_poli_gigi t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and d.id_dokter = '$id_dokter'  and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_gigi l, tindakan_konservasi_gigi t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and d.id_dokter = '$id_dokter'  and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_internis l, tindakan_poli_internis t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and d.id_dokter = '$id_dokter'  and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history, h.jenis_pelayanan 
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_jantung l, tindakan_poli_jantung t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and d.id_dokter = '$id_dokter'  and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_kulit l, tindakan_poli_kulit t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and d.id_dokter = '$id_dokter'  and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_mata l, tindakan_poli_mata t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and d.id_dokter = '$id_dokter'  and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_obgyne l, tindakan_poli_obgyne t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and d.id_dokter = '$id_dokter'  and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_tht l, tindakan_poli_tht t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and d.id_dokter = '$id_dokter'  and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, sum(t.frek) frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_umum l, tindakan_poli_umum t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and d.id_dokter = '$id_dokter'  and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter,'0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, 1 as frek,p.id_pelayanan,h.id_history , h.jenis_pelayanan
            FROM pelayanan p, pasien ps,history_pelayanan h, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and d.id_dokter = '$id_dokter'  and p.status=1 and h.biaya_jasa != 0
            GROUP by p.id_pelayanan, h.id_history
            ) as a
            UNION ALL
            SELECT b.*, 'RAWAT INAP' as jenis_pelayanan FROM(
                SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, l.harga_jasa jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history
            FROM pelayanan p, pasien ps,history_pelayanan_ranap h, list_tindakan_apelkes l, tindakan_apelkes t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan_apelkes=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and d.id_dokter = '$id_dokter'  and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_tindakan_apelkes, t.id_dokter
            ) as b
            UNION ALL
            SELECT c.*, 'IGD' as jenis_pelayanan FROM(
                SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (l.harga_jasa) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan,h.id_history
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and d.id_dokter = '$id_dokter'  and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_tindakan_igd, t.id_dokter
            UNION ALL
            SELECT date(p.tgl_keluar) tgl_keluar,date(h.tgl_masuk) tgl_masuk, ps.no_rm, ps.nama pasien, 'Konsultasi' tindakan, h.biaya_jasa jasa_dokter, '0' biaya_rs, h.biaya_jasa total, c.nama cara_bayar,d.nama dokter, d.dokter_spes, '1' frek ,p.id_pelayanan,h.id_history
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and d.id_dokter = '$id_dokter'  and p.status=1 and h.biaya_jasa != 0
            GROUP by p.id_pelayanan, h.id_history
            ) as c
            UNION ALL
            SELECT d.*,'' as id_history, 'OK' as jenis_pelayanan FROM(
                SELECT date(p.tgl_keluar) tgl_keluar,date(t.tanggal) tgl_masuk, ps.no_rm, ps.nama pasien, l.nama tindakan, (t.harga) jasa_dokter, (l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter, d.dokter_spes, sum(t.frek) frek ,p.id_pelayanan
            FROM pelayanan p, pasien ps, list_kamar_ok l, tindakan_ok t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_kamar_ok=t.id_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=t.id_dokter and d.id_dokter = '$id_dokter'  and p.status=1 and l.harga_jasa != 0
            GROUP by t.id_pelayanan,l.id_list_kamar_ok, t.id_dokter
            )as d
            
            
            order by pasien asc
            ) as g
            left join detail_kasir_diskon d on d.id_history = g.id_history and (d.diskon_konsul != 0 or d.diskon_visite != 0)
            join (SELECT DISTINCT(t.id_pelayanan) id_pelayanan
                    from detail_pembayaran_piutang t, pembayaran_piutang p
                    where t.id_fk=p.no_dokumen and p.no_jurnal is not null and p.save = 2
                    and date(p.tgl) BETWEEN '$mulai' and '$akhir' and (p.vendor not like '%BPJS%' or p.vendor = 'BPJS' or p.vendor = 'BPJSTK')
                    UNION all
                    SELECT id_pelayanan
                    from v_total_piutang 
                    where pk in (select invoice from detail_pembayaran_piutang t, pembayaran_piutang p
                            where t.id_fk=p.no_dokumen and p.no_jurnal is not null and p.save = 2
                    and date(p.tgl) BETWEEN '$mulai' and '$akhir' and p.vendor like '%BPJS%' and p.vendor != 'BPJSTK' and p.vendor != 'BPJS')
            ) as g1 on g1.id_pelayanan = g.id_pelayanan
            where dokter != '-'
            ")->result();
        //    }
        return $hasil;
    }
}
