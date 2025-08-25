<?php

class M_Jurnal extends CI_Model
{

    ////////////////////////////////////////////////////////////////AKUN JURNAL/////////////////////////////////////////////////////////////////////////////
    public function get_akun_tindakan($date)
    {
        $a = array();
        $b = array();
        $c = array();

        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.nama_panjang poli, l.kode_coa,a.dpjp,a.biaya_jasa,a.id_history 
        from history_pelayanan a, list_poli l , pelayanan p
        where a.nama_poli = l.id_list_poli and p.id_pelayanan=a.id_pelayanan and a.status = 1 and date(p.tgl_keluar) ='$date'
        
        ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT t.id_pelayanan,t.id_dokter,sum(t.frek) frek,l.nama, l.harga_jasa, '$row->poli' as poli,  '$row->kode_coa' as coa_poli,'1' as jenis_rawat, b.no_rm, b.nama_pasien, p.tgl_keluar
            FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p , pasien b
            where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan and b.no_rm=p.id_pasien and date(p.tgl_keluar) ='$date'
            and l.harga_jasa !=0
            and p.status_rawat ='selesai'
             and l.nama != 'Konsultasi'
            group by t.id_list_tindakan, t.id_dokter
           
            ")->result();
        }
        $a = (is_array($a)) ? $a : array();

        $b[] = $this->db->query("SELECT t.id_pelayanan,t.id_dokter,sum(t.frek) frek,l.nama,  l.harga_jasa, r.nama_ruangan as poli,  r.kode_coa as coa_poli,'2' as jenis_rawat, b.no_rm, b.nama_pasien, p.tgl_keluar
        FROM tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p ,ruangan r, pasien b
        where t.id_list_tindakan = l.id_list_tindakan_apelkes and p.id_pelayanan = t.id_pelayanan and t.tipe = r.id_ruangan and date(p.tgl_keluar) ='$date'
        and l.harga_jasa !=0
        and p.status_rawat ='selesai'
        
        group by t.tipe,t.id_list_tindakan, t.id_dokter
        ")->result();
        $b = (is_array($b)) ? $b : array();

        $c[] = $this->db->query("SELECT t.id_pelayanan,t.id_dokter,sum(t.frek) frek, l.nama, l.harga_jasa, 'IGD' as poli,  '14' as coa_poli,'1' as jenis_rawat, b.no_rm, b.nama_pasien, p.tgl_keluar
        FROM tindakan_igd t, list_tindakan_igd l, pelayanan p, pasien b
        where t.id_list_tindakan = l.id_tindakan_igd and p.id_pelayanan = t.id_pelayanan and date(p.tgl_keluar) ='$date'
        and l.harga_jasa !=0
        and p.status_rawat ='selesai'
       
        group by t.id_list_tindakan, t.id_dokter
       
        ")->result();
        $c = (is_array($c)) ? $c : array();

        $d[] = $this->db->query("SELECT h.id_pelayanan,h.dpjp as id_dokter,'1' as frek,'Konsultasi' as nama,h.biaya_jasa as harga_jasa, l.nama_panjang poli,  l.kode_coa as coa_poli,'1' as jenis_rawat, b.no_rm, b.nama_pasien, p.tgl_keluar
        FROM history_pelayanan h, pelayanan p, list_poli l, pasien b 
        where p.id_pelayanan = h.id_pelayanan and h.nama_poli = l.id_list_poli and date(p.tgl_keluar) ='$date'
        and h.biaya_jasa !=0 and h.status = 1
        and p.status_rawat ='selesai'
        
        group by h.dpjp
        ")->result();
        $d = (is_array($d)) ? $d : array();

        $e[] = $this->db->query(" SELECT h.id_pelayanan as id_pelayanan,h.dpjp as id_dokter,'1' as frek,'Konsultasi' as nama,h.biaya_jasa as harga_jasa, 'IGD' as poli,  '14' as coa_poli,'1' as jenis_rawat, b.no_rm, b.nama_pasien, p.tgl_keluar
        FROM history_pelayanan_ugd h, pelayanan p, pasien b 
        where p.id_pelayanan = h.id_pelayanan 
        and h.biaya_jasa !=0 and h.status = 1 and date(p.tgl_keluar) ='$date'
        and p.status_rawat ='selesai'
        group by h.dpjp
        ")->result();
        $e = (is_array($e)) ? $e : array();

        // }
        // $ary2 = (is_array($ary2))?$ary2:array($ary2);
        // print_arr($a);
        return array_merge($a, $b, $c,$d,$e);
    }
}
