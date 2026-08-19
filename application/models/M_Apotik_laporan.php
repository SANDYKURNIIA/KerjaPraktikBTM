<?php

class M_Apotik_laporan extends CI_Model
{
    public function selectLaporanPasienObatApotik($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.id_logistik kode_sibatik, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM tindakan_farmasi t, list_logistik l, resep_obat r,history_pelayanan hs, pelayanan p, pasien ps, cara_bayar c, dokter d
        WHERE r.id_resep=t.id_resep AND l.id_logistik=t.id_list_tindakan and t.tgl_acc IS NOT NULL 
        and t.poli = hs.id_history and hs.status = 1 and t.id_pelayanan = p.id_pelayanan and p.id_pasien = ps.no_rm and p.cara_bayar = c.id_cara_bayar
        and d.id_dokter = hs.dpjp
        AND (date(t.tanggal) between '$mulai' and '$akhir')
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status = 1)
       union all
       
          SELECT ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.id_logistik kode_sibatik, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
    
        FROM tindakan_farmasi t, list_logistik l,history_pelayanan hs, pelayanan p, pasien ps, cara_bayar c, dokter d
        WHERE l.id_logistik=t.id_list_tindakan AND t.id_resep like '%obat farmasi%' 
        and t.poli = hs.id_history and hs.status = 1 and t.id_pelayanan = p.id_pelayanan and p.id_pasien = ps.no_rm and p.cara_bayar = c.id_cara_bayar
         and d.id_dokter = hs.dpjp
        AND  (date(t.tanggal) between '$mulai' and '$akhir') 
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status = 1)
        group by t.id_tindakan_farmasi

        order by tanggal asc
        ");
        return $query->result();
    }
public function selectLaporanPasienObatIgd()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter,hs.jenis_pelayanan, l.nama, l.golongan_obat,l.satuan_terkecil tipe,l.produsen,  l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p,history_pelayanan_ugd hs,  tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar 
        AND l.id_logistik=t.id_list_tindakan AND t.poli like '%ugd%' and id_resep not like '%obat ruang%'
        AND ps.no_rm=p.id_pasien AND t.tanggal like '%$tgl%' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap)
        group by t.id_tindakan_farmasi
        order by tanggal
        ");
        return $query->result();
    }

    public function selectRangeLaporanPasienObatIgd($mulai, $akhir)
    {
        $query =  $this->db->query("SELECT ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, hs.jenis_pelayanan, l.nama, l.golongan_obat,l.satuan_terkecil tipe,l.produsen,  l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p,history_pelayanan_ugd hs,  tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar 
        AND l.id_logistik=t.id_list_tindakan AND t.poli like '%ugd%' and id_resep not like '%obat ruang%'
        AND ps.no_rm=p.id_pasien AND  (date(t.tanggal) between '$mulai' and '$akhir') and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap)
        group by t.id_tindakan_farmasi
        order by tanggal
        ");
        return $query->result();
    }
    
    public function selectLaporanPasienObatRanap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter,  l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, ru.tipe ruangan, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan_ranap hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l,ruangan ru
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar 
        AND hs.id_kamar=ru.id_ruangan  AND l.id_logistik=t.id_list_tindakan and t.poli like '%ranap%'
        AND ps.no_rm=p.id_pasien AND t.tanggal like '%$tgl%' and id_resep not like '%obat ruang%'
        UNION ALL
        SELECT ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, 'UGD' ruangan, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan_ugd hs, history_pelayanan_ranap h, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND h.id_pelayanan=hs.id_pelayanan AND hs.dpjp=d.id_dokter 
        AND c.id_cara_bayar=p.cara_bayar and t.poli like '%ugd%'  AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien 
        AND t.tanggal like '%$tgl%'and id_resep not like '%obat ruang%'
        group by t.id_tindakan_farmasi
        order by tanggal
        ");
        return $query->result();
    }

    public function selectRangeLaporanPasienObatRanap($mulai, $akhir)
    {
        $query =  $this->db->query("SELECT ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter,  l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, ru.tipe ruangan, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan_ranap hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l,ruangan ru
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar 
         AND hs.id_kamar=ru.id_ruangan AND l.id_logistik=t.id_list_tindakan and t.poli like '%ranap%'
        AND ps.no_rm=p.id_pasien AND t.tanggal>='$mulai' AND t.tanggal<='$akhir' and id_resep not like '%obat ruang%'
        UNION ALL
        SELECT ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, 'UGD' ruangan, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan_ugd hs, history_pelayanan_ranap h, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND h.id_pelayanan=hs.id_pelayanan AND hs.dpjp=d.id_dokter 
        AND c.id_cara_bayar=p.cara_bayar and t.poli like '%ugd%' AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien 
        AND t.tanggal>='$mulai' AND t.tanggal<='$akhir' and id_resep not like '%obat ruang%'
        group by t.id_tindakan_farmasi
        order by tanggal
        ");
        return $query->result();
    }
}
