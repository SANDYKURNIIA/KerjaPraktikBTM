<<<<<<< HEAD
<?php

class M_Jurnal extends CI_Model
{

    ////////////////////////////////////////////////////////////////AKUN JURNAL/////////////////////////////////////////////////////////////////////////////
    public function count_konsul($id_history, $id_pelayanan)
    {
        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa 
        from history_pelayanan a, list_poli l 
        where a.nama_poli = l.id_list_poli and a.status = 1 
        and a.id_history = '$id_history'
        ")->row();
        if (!empty($poli)) {
            $a = $this->db->query("SELECT count(*) jumlah
            FROM `$poli->tindakan` t, `$poli->list_tindakan` l, pelayanan p 
            where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan and t.id_pelayanan = '$id_pelayanan'
            and l.nama = 'Konsultasi'
            ")->row();

            return $a->jumlah;
        } else {
            return 0;
        }
    }
    public function akun_poli($id_pelayanan)
    {
        $a = null;
        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa , a.jenis_pelayanan
        from history_pelayanan a, list_poli l 
        where a.nama_poli = l.id_list_poli and a.status = 1 
        and a.nama_poli !='146582' and a.nama_poli !='15487956' and a.nama_poli !='6E975PL694' and a.nama_poli !='111111' and a.nama_poli !='NM3075J78' and a.nama_poli !='KASE14' and a.nama_poli !='EM4488C53'
        and a.id_pelayanan = '$id_pelayanan'
        ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT sum(t.total) total, sum(l.harga_jasa) jasa, l.kode_coa, '$row->poli' as id_poli,  '$row->kode_coa' as coa_poli, '$row->jenis_pelayanan' as jenis_pelayanan
            FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
            where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan and t.id_pelayanan = '$id_pelayanan'
            
            group by l.kode_coa
            ")->result();
        }
        return $a;
    }


    public function akun_igd($id_pelayanan)
    {
        return $this->db->query("SELECT l.kode_coa, sum(t.total) total, sum(l.harga_jasa) jasa
        from tindakan_igd t, list_tindakan_igd l
        where t.id_list_tindakan=l.id_tindakan_igd and t.id_pelayanan='$id_pelayanan' 
        group by l.kode_coa")->result();
    }

    public function akun_fisio($id_pelayanan)
    {
        return $this->db->query("SELECT (if((t.jenis_pelayanan ='RAWAT INAP'),'311','310')) kode_coa, t.jenis_pelayanan, t.poli
        from tindakan_poli_fisio t, list_tindakan_poli_fisio l
        where t.id_list_tindakan=l.id_list_tindakan and t.id_pelayanan='$id_pelayanan' 
        group by t.poli")->result();
    }
    public function akun_hd($id_pelayanan)
    {
        return $this->db->query("SELECT '350' kode_coa, t.jenis_pelayanan, t.poli
        from tindakan_poli_hemodialisa t, list_tindakan_poli_hemodialisa l
        where t.id_list_tindakan=l.id_list_tindakan and t.id_pelayanan='$id_pelayanan' 
        group by t.poli")->result();
    }
    public function akun_kia($id_pelayanan)
    {
        return $this->db->query("SELECT l.coa, t.jenis_pelayanan,  t.id_history poli, sum(t.total) total
        from tindakan_poli t, list_tindakan_poli_kia l
        where t.id_poli ='KASE14' and t.id_list_tindakan=l.id_list_tindakan and t.id_pelayanan='$id_pelayanan' 
        group by t.id_history
        having total >0
        ")->result();
    }
    public function akun_transportasi($id_pelayanan)
    {
        return $this->db->query("SELECT (if((t.jenis_pelayanan ='RAWAT INAP'),'621','620')) kode_coa, t.jenis_pelayanan, t.poli, sum(t.total) total
        from tindakan_pelayanan_tambahan t, list_tindakan_apelkes l
        where t.id_list_tindakan=l.id_list_tindakan_apelkes and t.id_pelayanan='$id_pelayanan' 
        -- and t.status_pembayaran = 'ditanggung'
        group by t.poli
        having total >0
        ")->result();
    }
    public function akun_labor($id_pelayanan)
    {
        return $this->db->query("SELECT (if((t.cara_masuk ='RAWAT INAP'),'811','810')) kode_coa, t.cara_masuk, t.poli
        from tindakan_labor t, list_tindakan_labor l, form_labor f 
        where t.id_list_tindakan=l.id_daftar_tindakan and t.id_form_labor = f.id_form_labor and t.id_pelayanan='$id_pelayanan'
        -- and (f.status_pembayaran !='tidak' or f.status_pembayaran is null) 
        and f.status != 99
        group by t.poli")->result();
    }
    public function poli_labor($id_pelayanan)
    {
        return $this->db->query("SELECT l.kode_coa, l.id_list_poli
        from tindakan_labor t, history_pelayanan h, list_poli l
        where t.id_pelayanan=h.id_pelayanan and h.nama_poli = l.id_list_poli and t.id_pelayanan='$id_pelayanan' 
        ");
    }
    public function total_labor1($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_labor t , form_labor f 
        WHERE t.poli='$idPelayanan' and t.id_form_labor = f.id_form_labor
        -- and (f.status_pembayaran !='tidak' or f.status_pembayaran is null) 
        and f.status != 99
        group by t.poli
        ");
        return $query->row_array();
    }
    public function total_fisio1($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_fisio t
        WHERE t.poli='$idPelayanan'
        group by t.poli
        ");
        return $query->row_array();
    }
    public function total_hd1($idPelayanan)
    {
        $query =  $this->db->query("SELECT ifnull(sum(t.total),0) total
        from tindakan_poli_hemodialisa t
        WHERE t.poli='$idPelayanan'
        group by t.poli
        ");
        return $query->row_array();
    }
    public function akun_radio($id_pelayanan)
    {
        return $this->db->query("SELECT (if((t.jenis_pelayanan ='RAWAT INAP'),'721','720')) kode_coa, t.jenis_pelayanan, t.poli
        from tindakan_radiologi t, list_tindakan_radiologi l
        where t.id_tindakan=l.id_daftar_tindakan and t.id_pelayanan='$id_pelayanan' 
        group by t.poli")->result();
    }
    public function poli_radio($id_pelayanan)
    {
        return $this->db->query("SELECT l.kode_coa, l.id_list_poli
        from tindakan_radiologi t, history_pelayanan h, list_poli l
        where t.id_pelayanan=h.id_pelayanan and h.nama_poli = l.id_list_poli and t.id_pelayanan='$id_pelayanan' 
        ");
    }
    public function total_radio1($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_radiologi t
        WHERE t.poli='$idPelayanan'
        group by t.poli
        ");
        return $query->row_array();
    }
    public function akun_apotik($id_pelayanan)
    {
        return $this->db->query("SELECT  t.jenis_pelayanan, t.poli,sum(t.total) total, c.coa_pendapatan
        from tindakan_farmasi t, list_logistik l, list_coa c
        where t.id_list_tindakan=l.id_logistik and l.golongan_sediaan=c.nama and t.id_pelayanan='$id_pelayanan' 
        and t.frek != 0
        group by t.poli, c.coa_pendapatan")->result();
    }

    public function poli_apotik($id_his)
    {
        return $this->db->query("SELECT l.kode_coa, l.id_list_poli,h.jenis_pelayanan,l.nama_panjang, d.nama nama_dokter
        from history_pelayanan h, list_poli l, dokter d
        where  h.nama_poli = l.id_list_poli and h.dpjp = d.id_dokter and h.id_history='$id_his' 
        ");
    }
    public function total_apotik1($id_his)
    {
        $query =  $this->db->query("SELECT sum(total) FROM (
            SELECT t.total total 
            from tindakan_farmasi t, list_logistik l, pelayanan p 
            WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan  and t.poli='$id_his' 
            and t.frek != 0
           
            ) AS gabung
        ");
        return $query->row_array();
    }


    /////////////////////JURNAL RANAP///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // apotik ranap
    public function kamar_apotik($id_his)
    {
        return $this->db->query("SELECT l.kode_coa, t.tipe,sum(t.total) total
        from tindakan_farmasi t, ruangan l
        where  t.tipe = l.id_ruangan and t.poli='$id_his' 
        group by t.tipe
        ")->row();
    }
    public function ok_apotik($id_pelayanan)
    {
        return $this->db->query("SELECT l.kode_coa, t.tipe, sum(t.total) total
        from tindakan_obat_ok t, ruangan l
        where  t.tipe = l.id_ruangan and t.id_pelayanan='$id_pelayanan' 
        group by t.tipe
        ")->result();
    }
    public function obat_ok($id_pelayanan)
    {
        return $this->db->query("SELECT c.coa_pendapatan, sum(t.total) total
        from tindakan_obat_ok t, list_logistik l, list_coa c
        where  t.id_list_tindakan=l.id_logistik and l.golongan_sediaan=c.nama and t.id_pelayanan='$id_pelayanan' 
       
        ")->result();
    }


    // Apelkes

    public function akun_apelkes($id_pelayanan)
    {
        return $this->db->query("SELECT r.kode_coa kode_ruang,l.kode_coa kode_tindakan, t.tipe,sum(t.total) total, sum(l.harga_jasa) jasa , c.nama jenis_akun
        from tindakan_apelkes t, ruangan r, list_tindakan_apelkes l, list_coa_ranap c
        where t.tipe = r.id_ruangan and t.id_list_tindakan=l.id_list_tindakan_apelkes 
        and l.kode_coa = c.kode_coa
        and t.id_pelayanan='$id_pelayanan' 
        group by r.kode_coa, l.kode_coa")->result();
    }
    public function akun_penunjang_lain($id_pelayanan)
    {
        return $this->db->query("SELECT r.kode_coa kode_ruang,l.kode_coa kode_tindakan, t.tipe,sum(t.total) total, sum(l.harga_jasa) jasa , c.nama jenis_akun
        from tindakan_penunjang_lain t, ruangan r, list_tindakan_apelkes l, list_coa_ranap c
        where t.tipe = r.id_ruangan and t.id_list_tindakan=l.id_list_tindakan_apelkes 
        and l.kode_coa = c.kode_coa 
        -- and t.status_pembayaran !='tidak'
        and t.id_pelayanan='$id_pelayanan' 
        group by r.kode_coa, l.kode_coa")->result();
    }
    public function akun_ok($id_pelayanan)
    {
        return $this->db->query("SELECT l.kode_coa kode_tindakan, sum(t.total) total, sum(l.harga_jasa) jasa
        from tindakan_ok t
        left join  list_kamar_ok l on t.id_tindakan=l.id_list_kamar_ok
        where t.id_pelayanan='$id_pelayanan' and harga !=0
        group by t.id_pelayanan")->result();
    }
    public function akun_kemo($id_pelayanan)
    {
        return $this->db->query("SELECT t.poli, sum(t.total) total, jenis_pelayanan, sum(l.harga_jasa) jasa, tipe
        from tindakan_poli_kemoterapi t, list_tindakan_poli_kemoterapi l
        where t.id_list_tindakan = l.id_list_tindakan and t.id_pelayanan='$id_pelayanan' 
        group by t.poli")->result();
    }

    // public function total_apelkes1($idPelayanan)
    // {
    //     $query =  $this->db->query("SELECT sum(t.total) total
    //     from tindakan_radiologi t
    //     WHERE t.poli='$idPelayanan'
    //     group by t.poli
    //     ");
    //     return $query->row_array();
    // }

    public function kamar_labor($id_his)
    {
        return $this->db->query("SELECT l.kode_coa, t.tipe,sum(t.total) total
        from tindakan_labor t, ruangan l, form_labor f
        where  t.tipe = l.id_ruangan and t.id_form_labor = f.id_form_labor 
        -- and (f.status_pembayaran !='tidak' or f.status_pembayaran is null)  
        and t.poli='$id_his' 
        group by t.tipe
        ")->result();
    }

    public function kamar_fisio($id_his)
    {
        return $this->db->query("SELECT l.kode_coa, t.tipe,sum(t.total) total
        from tindakan_poli_fisio t, ruangan l
        where  t.tipe = l.id_ruangan and t.poli='$id_his' 
        group by t.tipe
        ")->result();
    }

    public function kamar_hd($id_his)
    {
        return $this->db->query("SELECT l.kode_coa, t.tipe,sum(t.total) total
        from tindakan_poli_hemodialisa t, ruangan l
        where  t.tipe = l.id_ruangan and t.poli='$id_his' 
        group by t.tipe
        ")->result();
    }
    public function kamar_kia($id_his)
    {
        return $this->db->query("SELECT l.kode_coa, t.tipe,sum(t.total) total
        from tindakan_poli_kia t, ruangan l
        where  t.tipe = l.id_ruangan and t.poli='$id_his' 
        group by t.tipe
        ")->result();
    }
    public function kamar_transportasi($id_his)
    {
        return $this->db->query("SELECT l.kode_coa, t.tipe,sum(t.total) total
        from tindakan_pelayanan_tambahan t, ruangan l
        where  t.tipe = l.id_ruangan and t.poli='$id_his' 
        -- and t.status_pembayaran = 'ditanggung'
        group by t.tipe
        ")->result();
    }

    public function kamar_radiologi($id_his)
    {
        return $this->db->query("SELECT l.kode_coa, t.tipe,sum(t.total) total
        from tindakan_radiologi t, ruangan l
        where  t.tipe = l.id_ruangan and t.poli='$id_his' 
        group by t.tipe
        ")->result();
    }

    public function get_akun_tindakan($id_pelayanan)
    {
        $a = array();
        $b = array();
        $c = array();

        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.nama_panjang poli, l.kode_coa,a.dpjp,a.biaya_jasa,a.id_history 
        from history_pelayanan a, list_poli l 
        where a.nama_poli = l.id_list_poli and a.status = 1 
        and a.id_pelayanan = '$id_pelayanan'
        ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT t.id_pelayanan,t.id_dokter,sum(t.frek) frek,l.nama, l.harga_jasa, '$row->poli' as poli,  '$row->kode_coa' as coa_poli,'1' as jenis_rawat
            FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
            where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan 
            and l.harga_jasa !=0
            and p.status_rawat ='selesai'
            and t.id_pelayanan = '$id_pelayanan' and l.nama != 'Konsultasi'
            group by t.id_list_tindakan, t.id_dokter
           
            ")->result();
        }
        $a = (is_array($a)) ? $a : array();

        $b[] = $this->db->query("SELECT t.id_pelayanan,t.id_dokter,sum(t.frek) frek,l.nama,  l.harga_jasa, r.nama_ruangan as poli,  r.kode_coa as coa_poli,'2' as jenis_rawat
        FROM tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p ,ruangan r
        where t.id_list_tindakan = l.id_list_tindakan_apelkes and p.id_pelayanan = t.id_pelayanan and t.tipe = r.id_ruangan
        and l.harga_jasa !=0
        and p.status_rawat ='selesai'
        and t.id_pelayanan = '$id_pelayanan' 
        group by t.tipe,t.id_list_tindakan, t.id_dokter
        ")->result();
        $b = (is_array($b)) ? $b : array();

        $c[] = $this->db->query("SELECT t.id_pelayanan,t.id_dokter,sum(t.frek) frek, l.nama, l.harga_jasa, 'IGD' as poli,  '14' as coa_poli,'1' as jenis_rawat
        FROM tindakan_igd t, list_tindakan_igd l, pelayanan p
        where t.id_list_tindakan = l.id_tindakan_igd and p.id_pelayanan = t.id_pelayanan
        and l.harga_jasa !=0
        and p.status_rawat ='selesai'
        and t.id_pelayanan = '$id_pelayanan' 
        group by t.id_list_tindakan, t.id_dokter
       
        ")->result();
        $c = (is_array($c)) ? $c : array();

        $d[] = $this->db->query("SELECT h.id_pelayanan,h.dpjp as id_dokter,'1' as frek,'Konsultasi' as nama,h.biaya_jasa as harga_jasa, l.nama_panjang poli,  l.kode_coa as coa_poli,'1' as jenis_rawat
        FROM history_pelayanan h, pelayanan p, list_poli l 
        where p.id_pelayanan = h.id_pelayanan and h.nama_poli = l.id_list_poli
        and h.biaya_jasa !=0 and h.status = 1
        and p.status_rawat ='selesai'
        and p.id_pelayanan = '$id_pelayanan'
        group by h.dpjp
        ")->result();
        $d = (is_array($d)) ? $d : array();

        $e[] = $this->db->query(" SELECT h.id_pelayanan as id_pelayanan,h.dpjp as id_dokter,'1' as frek,'Konsultasi' as nama,h.biaya_jasa as harga_jasa, 'IGD' as poli,  '14' as coa_poli,'1' as jenis_rawat
        FROM history_pelayanan_ugd h, pelayanan p 
        where p.id_pelayanan = h.id_pelayanan 
        and h.biaya_jasa !=0 and h.status = 1
        and p.status_rawat ='selesai'
        and p.id_pelayanan = '$id_pelayanan'
        group by h.dpjp
        ")->result();
        $e = (is_array($e)) ? $e : array();

        // }
        // $ary2 = (is_array($ary2))?$ary2:array($ary2);
        // print_arr($a);
        return array_merge($a, $b, $c, $d, $e);
    }
    public function akun_material($id_pelayanan)
    {

        return $this->db->query("SELECT * FROM(
        SELECT r.kode_coa kode_ruang,l.kode_keuangan kode_tindakan, r.kelas ruangan,sum(t.frek * l.harga_persediaan) total,t.jenis_pelayanan
        from tindakan_farmasi t, ruangan r, list_logistik l
        where t.tipe = r.id_ruangan and t.id_list_tindakan=l.id_logistik 
        and t.id_pelayanan='$id_pelayanan' 
        group by r.kode_coa, l.kode_keuangan
        union all
        SELECT r.kode_coa kode_ruang,l.kode_keuangan kode_tindakan, r.nama_panjang ruangan,sum(t.frek * l.harga_persediaan) total,t.jenis_pelayanan
        from tindakan_farmasi t, history_pelayanan h,list_poli r, list_logistik l
        where t.poli = h.id_history and h.nama_poli = r.id_list_poli and t.id_list_tindakan=l.id_logistik 
        and t.id_pelayanan='$id_pelayanan' 
        group by r.kode_coa, l.kode_keuangan
        union all
        SELECT '14' as kode_ruang,l.kode_keuangan kode_tindakan, 'IGD' as ruangan,sum(t.frek * l.harga_persediaan) total,t.jenis_pelayanan
        from tindakan_farmasi t, history_pelayanan_ugd h,list_logistik l
        where t.poli = h.id_history and  t.id_list_tindakan=l.id_logistik 
        and t.id_pelayanan='$id_pelayanan' 
        group by l.kode_keuangan
        ) as gabung")->result();
    }
    public function akun_obat_bebas($id_pelayanan)
    {
        return $this->db->query("SELECT  t.depo,sum(t.total) total,(if((t.depo ='APOTIK'),'01.420','02.421')) kode_coa,(if((t.depo ='APOTIK'),'Rawat Jalan','Rawat Inap')) jenis
        from tindakan_farmasi t, list_logistik l
        where t.id_list_tindakan=l.id_logistik and t.id_pelayanan='$id_pelayanan' 
        and t.id_resep ='obat_bebas'
        group by t.depo")->result();
    }
    public function getObatHcById($id_mcu)
    {
        return $this->db->query("SELECT sum(t.total) total,(if((c.coa_pendapatan ='OBAT'),'420','430')) kode_coa, c.coa_pendapatan
        FROM tindakan_farmasi t, list_logistik l, list_coa c
        WHERE t.id_list_tindakan=l.id_logistik and t.frek != 0
        and l.golongan_sediaan=c.nama
        AND t.id_pelayanan='$id_mcu'
        group by c.coa_pendapatan")->result();
    }
}
=======
<?php

class M_Jurnal extends CI_Model
{

    ////////////////////////////////////////////////////////////////AKUN JURNAL/////////////////////////////////////////////////////////////////////////////
    public function count_konsul($id_history, $id_pelayanan)
    {
        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa 
        from history_pelayanan a, list_poli l 
        where a.nama_poli = l.id_list_poli and a.status = 1 
        and a.id_history = '$id_history'
        ")->row();
        if (!empty($poli)) {
            $a = $this->db->query("SELECT count(*) jumlah
            FROM `$poli->tindakan` t, `$poli->list_tindakan` l, pelayanan p 
            where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan and t.id_pelayanan = '$id_pelayanan'
            and l.nama = 'Konsultasi'
            ")->row();

            return $a->jumlah;
        } else {
            return 0;
        }
    }
    public function akun_poli($id_pelayanan)
    {
        $a = null;
        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa , a.jenis_pelayanan
        from history_pelayanan a, list_poli l 
        where a.nama_poli = l.id_list_poli and a.status = 1 
        and a.nama_poli !='146582' and a.nama_poli !='15487956' and a.nama_poli !='6E975PL694' and a.nama_poli !='111111' and a.nama_poli !='NM3075J78' and a.nama_poli !='KASE14' and a.nama_poli !='EM4488C53'
        and a.id_pelayanan = '$id_pelayanan'
        ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT sum(t.total) total, sum(l.harga_jasa) jasa, l.kode_coa, '$row->poli' as id_poli,  '$row->kode_coa' as coa_poli, '$row->jenis_pelayanan' as jenis_pelayanan
            FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
            where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan and t.id_pelayanan = '$id_pelayanan'
            
            group by l.kode_coa
            ")->result();
        }
        return $a;
    }


    public function akun_igd($id_pelayanan)
    {
        return $this->db->query("SELECT l.kode_coa, sum(t.total) total, sum(l.harga_jasa) jasa
        from tindakan_igd t, list_tindakan_igd l
        where t.id_list_tindakan=l.id_tindakan_igd and t.id_pelayanan='$id_pelayanan' 
        group by l.kode_coa")->result();
    }

    public function akun_fisio($id_pelayanan)
    {
        return $this->db->query("SELECT (if((t.jenis_pelayanan ='RAWAT INAP'),'311','310')) kode_coa, t.jenis_pelayanan, t.poli
        from tindakan_poli_fisio t, list_tindakan_poli_fisio l
        where t.id_list_tindakan=l.id_list_tindakan and t.id_pelayanan='$id_pelayanan' 
        group by t.poli")->result();
    }
    public function akun_hd($id_pelayanan)
    {
        return $this->db->query("SELECT '350' kode_coa, t.jenis_pelayanan, t.poli
        from tindakan_poli_hemodialisa t, list_tindakan_poli_hemodialisa l
        where t.id_list_tindakan=l.id_list_tindakan and t.id_pelayanan='$id_pelayanan' 
        group by t.poli")->result();
    }
    public function akun_kia($id_pelayanan)
    {
        return $this->db->query("SELECT l.coa, t.jenis_pelayanan,  t.id_history poli, sum(t.total) total
        from tindakan_poli t, list_tindakan_poli_kia l
        where t.id_poli ='KASE14' and t.id_list_tindakan=l.id_list_tindakan and t.id_pelayanan='$id_pelayanan' 
        group by t.id_history
        having total >0
        ")->result();
    }
    public function akun_transportasi($id_pelayanan)
    {
        return $this->db->query("SELECT (if((t.jenis_pelayanan ='RAWAT INAP'),'621','620')) kode_coa, t.jenis_pelayanan, t.poli, sum(t.total) total
        from tindakan_pelayanan_tambahan t, list_tindakan_apelkes l
        where t.id_list_tindakan=l.id_list_tindakan_apelkes and t.id_pelayanan='$id_pelayanan' 
        -- and t.status_pembayaran = 'ditanggung'
        group by t.poli
        having total >0
        ")->result();
    }
    public function akun_labor($id_pelayanan)
    {
        return $this->db->query("SELECT (if((t.cara_masuk ='RAWAT INAP'),'811','810')) kode_coa, t.cara_masuk, t.poli
        from tindakan_labor t, list_tindakan_labor l, form_labor f 
        where t.id_list_tindakan=l.id_daftar_tindakan and t.id_form_labor = f.id_form_labor and t.id_pelayanan='$id_pelayanan'
        -- and (f.status_pembayaran !='tidak' or f.status_pembayaran is null) 
        and f.status != 99
        group by t.poli")->result();
    }
    public function poli_labor($id_pelayanan)
    {
        return $this->db->query("SELECT l.kode_coa, l.id_list_poli
        from tindakan_labor t, history_pelayanan h, list_poli l
        where t.id_pelayanan=h.id_pelayanan and h.nama_poli = l.id_list_poli and t.id_pelayanan='$id_pelayanan' 
        ");
    }
    public function total_labor1($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_labor t , form_labor f 
        WHERE t.poli='$idPelayanan' and t.id_form_labor = f.id_form_labor
        -- and (f.status_pembayaran !='tidak' or f.status_pembayaran is null) 
        and f.status != 99
        group by t.poli
        ");
        return $query->row_array();
    }
    public function total_fisio1($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_fisio t
        WHERE t.poli='$idPelayanan'
        group by t.poli
        ");
        return $query->row_array();
    }
    public function total_hd1($idPelayanan)
    {
        $query =  $this->db->query("SELECT ifnull(sum(t.total),0) total
        from tindakan_poli_hemodialisa t
        WHERE t.poli='$idPelayanan'
        group by t.poli
        ");
        return $query->row_array();
    }
    public function akun_radio($id_pelayanan)
    {
        return $this->db->query("SELECT (if((t.jenis_pelayanan ='RAWAT INAP'),'721','720')) kode_coa, t.jenis_pelayanan, t.poli
        from tindakan_radiologi t, list_tindakan_radiologi l
        where t.id_tindakan=l.id_daftar_tindakan and t.id_pelayanan='$id_pelayanan' 
        group by t.poli")->result();
    }
    public function poli_radio($id_pelayanan)
    {
        return $this->db->query("SELECT l.kode_coa, l.id_list_poli
        from tindakan_radiologi t, history_pelayanan h, list_poli l
        where t.id_pelayanan=h.id_pelayanan and h.nama_poli = l.id_list_poli and t.id_pelayanan='$id_pelayanan' 
        ");
    }
    public function total_radio1($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_radiologi t
        WHERE t.poli='$idPelayanan'
        group by t.poli
        ");
        return $query->row_array();
    }
    public function akun_apotik($id_pelayanan)
    {
        return $this->db->query("SELECT  t.jenis_pelayanan, t.poli,sum(t.total) total, c.coa_pendapatan
        from tindakan_farmasi t, list_logistik l, list_coa c
        where t.id_list_tindakan=l.id_logistik and l.golongan_sediaan=c.nama and t.id_pelayanan='$id_pelayanan' 
        and t.frek != 0
        group by t.poli, c.coa_pendapatan")->result();
    }

    public function poli_apotik($id_his)
    {
        return $this->db->query("SELECT l.kode_coa, l.id_list_poli,h.jenis_pelayanan,l.nama_panjang, d.nama nama_dokter
        from history_pelayanan h, list_poli l, dokter d
        where  h.nama_poli = l.id_list_poli and h.dpjp = d.id_dokter and h.id_history='$id_his' 
        ");
    }
    public function total_apotik1($id_his)
    {
        $query =  $this->db->query("SELECT sum(total) FROM (
            SELECT t.total total 
            from tindakan_farmasi t, list_logistik l, pelayanan p 
            WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan  and t.poli='$id_his' 
            and t.frek != 0
           
            ) AS gabung
        ");
        return $query->row_array();
    }


    /////////////////////JURNAL RANAP///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // apotik ranap
    public function kamar_apotik($id_his)
    {
        return $this->db->query("SELECT l.kode_coa, t.tipe,sum(t.total) total
        from tindakan_farmasi t, ruangan l
        where  t.tipe = l.id_ruangan and t.poli='$id_his' 
        group by t.tipe
        ")->row();
    }
    public function ok_apotik($id_pelayanan)
    {
        return $this->db->query("SELECT l.kode_coa, t.tipe, sum(t.total) total
        from tindakan_obat_ok t, ruangan l
        where  t.tipe = l.id_ruangan and t.id_pelayanan='$id_pelayanan' 
        group by t.tipe
        ")->result();
    }
    public function obat_ok($id_pelayanan)
    {
        return $this->db->query("SELECT c.coa_pendapatan, sum(t.total) total
        from tindakan_obat_ok t, list_logistik l, list_coa c
        where  t.id_list_tindakan=l.id_logistik and l.golongan_sediaan=c.nama and t.id_pelayanan='$id_pelayanan' 
       
        ")->result();
    }


    // Apelkes

    public function akun_apelkes($id_pelayanan)
    {
        return $this->db->query("SELECT r.kode_coa kode_ruang,l.kode_coa kode_tindakan, t.tipe,sum(t.total) total, sum(l.harga_jasa) jasa , c.nama jenis_akun
        from tindakan_apelkes t, ruangan r, list_tindakan_apelkes l, list_coa_ranap c
        where t.tipe = r.id_ruangan and t.id_list_tindakan=l.id_list_tindakan_apelkes 
        and l.kode_coa = c.kode_coa
        and t.id_pelayanan='$id_pelayanan' 
        group by r.kode_coa, l.kode_coa")->result();
    }
    public function akun_penunjang_lain($id_pelayanan)
    {
        return $this->db->query("SELECT r.kode_coa kode_ruang,l.kode_coa kode_tindakan, t.tipe,sum(t.total) total, sum(l.harga_jasa) jasa , c.nama jenis_akun
        from tindakan_penunjang_lain t, ruangan r, list_tindakan_apelkes l, list_coa_ranap c
        where t.tipe = r.id_ruangan and t.id_list_tindakan=l.id_list_tindakan_apelkes 
        and l.kode_coa = c.kode_coa 
        -- and t.status_pembayaran !='tidak'
        and t.id_pelayanan='$id_pelayanan' 
        group by r.kode_coa, l.kode_coa")->result();
    }
    public function akun_ok($id_pelayanan)
    {
        return $this->db->query("SELECT l.kode_coa kode_tindakan, sum(t.total) total, sum(l.harga_jasa) jasa
        from tindakan_ok t
        left join  list_kamar_ok l on t.id_tindakan=l.id_list_kamar_ok
        where t.id_pelayanan='$id_pelayanan' and harga !=0
        group by t.id_pelayanan")->result();
    }
    public function akun_kemo($id_pelayanan)
    {
        return $this->db->query("SELECT t.poli, sum(t.total) total, jenis_pelayanan, sum(l.harga_jasa) jasa, tipe
        from tindakan_poli_kemoterapi t, list_tindakan_poli_kemoterapi l
        where t.id_list_tindakan = l.id_list_tindakan and t.id_pelayanan='$id_pelayanan' 
        group by t.poli")->result();
    }

    // public function total_apelkes1($idPelayanan)
    // {
    //     $query =  $this->db->query("SELECT sum(t.total) total
    //     from tindakan_radiologi t
    //     WHERE t.poli='$idPelayanan'
    //     group by t.poli
    //     ");
    //     return $query->row_array();
    // }

    public function kamar_labor($id_his)
    {
        return $this->db->query("SELECT l.kode_coa, t.tipe,sum(t.total) total
        from tindakan_labor t, ruangan l, form_labor f
        where  t.tipe = l.id_ruangan and t.id_form_labor = f.id_form_labor 
        -- and (f.status_pembayaran !='tidak' or f.status_pembayaran is null)  
        and t.poli='$id_his' 
        group by t.tipe
        ")->result();
    }

    public function kamar_fisio($id_his)
    {
        return $this->db->query("SELECT l.kode_coa, t.tipe,sum(t.total) total
        from tindakan_poli_fisio t, ruangan l
        where  t.tipe = l.id_ruangan and t.poli='$id_his' 
        group by t.tipe
        ")->result();
    }

    public function kamar_hd($id_his)
    {
        return $this->db->query("SELECT l.kode_coa, t.tipe,sum(t.total) total
        from tindakan_poli_hemodialisa t, ruangan l
        where  t.tipe = l.id_ruangan and t.poli='$id_his' 
        group by t.tipe
        ")->result();
    }
    public function kamar_kia($id_his)
    {
        return $this->db->query("SELECT l.kode_coa, t.tipe,sum(t.total) total
        from tindakan_poli_kia t, ruangan l
        where  t.tipe = l.id_ruangan and t.poli='$id_his' 
        group by t.tipe
        ")->result();
    }
    public function kamar_transportasi($id_his)
    {
        return $this->db->query("SELECT l.kode_coa, t.tipe,sum(t.total) total
        from tindakan_pelayanan_tambahan t, ruangan l
        where  t.tipe = l.id_ruangan and t.poli='$id_his' 
        -- and t.status_pembayaran = 'ditanggung'
        group by t.tipe
        ")->result();
    }

    public function kamar_radiologi($id_his)
    {
        return $this->db->query("SELECT l.kode_coa, t.tipe,sum(t.total) total
        from tindakan_radiologi t, ruangan l
        where  t.tipe = l.id_ruangan and t.poli='$id_his' 
        group by t.tipe
        ")->result();
    }

    public function get_akun_tindakan($id_pelayanan)
    {
        $a = array();
        $b = array();
        $c = array();

        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.nama_panjang poli, l.kode_coa,a.dpjp,a.biaya_jasa,a.id_history 
        from history_pelayanan a, list_poli l 
        where a.nama_poli = l.id_list_poli and a.status = 1 
        and a.id_pelayanan = '$id_pelayanan'
        ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT t.id_pelayanan,t.id_dokter,sum(t.frek) frek,l.nama, l.harga_jasa, '$row->poli' as poli,  '$row->kode_coa' as coa_poli,'1' as jenis_rawat
            FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
            where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan 
            and l.harga_jasa !=0
            and p.status_rawat ='selesai'
            and t.id_pelayanan = '$id_pelayanan' and l.nama != 'Konsultasi'
            group by t.id_list_tindakan, t.id_dokter
           
            ")->result();
        }
        $a = (is_array($a)) ? $a : array();

        $b[] = $this->db->query("SELECT t.id_pelayanan,t.id_dokter,sum(t.frek) frek,l.nama,  l.harga_jasa, r.nama_ruangan as poli,  r.kode_coa as coa_poli,'2' as jenis_rawat
        FROM tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p ,ruangan r
        where t.id_list_tindakan = l.id_list_tindakan_apelkes and p.id_pelayanan = t.id_pelayanan and t.tipe = r.id_ruangan
        and l.harga_jasa !=0
        and p.status_rawat ='selesai'
        and t.id_pelayanan = '$id_pelayanan' 
        group by t.tipe,t.id_list_tindakan, t.id_dokter
        ")->result();
        $b = (is_array($b)) ? $b : array();

        $c[] = $this->db->query("SELECT t.id_pelayanan,t.id_dokter,sum(t.frek) frek, l.nama, l.harga_jasa, 'IGD' as poli,  '14' as coa_poli,'1' as jenis_rawat
        FROM tindakan_igd t, list_tindakan_igd l, pelayanan p
        where t.id_list_tindakan = l.id_tindakan_igd and p.id_pelayanan = t.id_pelayanan
        and l.harga_jasa !=0
        and p.status_rawat ='selesai'
        and t.id_pelayanan = '$id_pelayanan' 
        group by t.id_list_tindakan, t.id_dokter
       
        ")->result();
        $c = (is_array($c)) ? $c : array();

        $d[] = $this->db->query("SELECT h.id_pelayanan,h.dpjp as id_dokter,'1' as frek,'Konsultasi' as nama,h.biaya_jasa as harga_jasa, l.nama_panjang poli,  l.kode_coa as coa_poli,'1' as jenis_rawat
        FROM history_pelayanan h, pelayanan p, list_poli l 
        where p.id_pelayanan = h.id_pelayanan and h.nama_poli = l.id_list_poli
        and h.biaya_jasa !=0 and h.status = 1
        and p.status_rawat ='selesai'
        and p.id_pelayanan = '$id_pelayanan'
        group by h.dpjp
        ")->result();
        $d = (is_array($d)) ? $d : array();

        $e[] = $this->db->query(" SELECT h.id_pelayanan as id_pelayanan,h.dpjp as id_dokter,'1' as frek,'Konsultasi' as nama,h.biaya_jasa as harga_jasa, 'IGD' as poli,  '14' as coa_poli,'1' as jenis_rawat
        FROM history_pelayanan_ugd h, pelayanan p 
        where p.id_pelayanan = h.id_pelayanan 
        and h.biaya_jasa !=0 and h.status = 1
        and p.status_rawat ='selesai'
        and p.id_pelayanan = '$id_pelayanan'
        group by h.dpjp
        ")->result();
        $e = (is_array($e)) ? $e : array();

        // }
        // $ary2 = (is_array($ary2))?$ary2:array($ary2);
        // print_arr($a);
        return array_merge($a, $b, $c, $d, $e);
    }
    public function akun_material($id_pelayanan)
    {

        return $this->db->query("SELECT * FROM(
        SELECT r.kode_coa kode_ruang,l.kode_keuangan kode_tindakan, r.kelas ruangan,sum(t.frek * l.harga_persediaan) total,t.jenis_pelayanan
        from tindakan_farmasi t, ruangan r, list_logistik l
        where t.tipe = r.id_ruangan and t.id_list_tindakan=l.id_logistik 
        and t.id_pelayanan='$id_pelayanan' 
        group by r.kode_coa, l.kode_keuangan
        union all
        SELECT r.kode_coa kode_ruang,l.kode_keuangan kode_tindakan, r.nama_panjang ruangan,sum(t.frek * l.harga_persediaan) total,t.jenis_pelayanan
        from tindakan_farmasi t, history_pelayanan h,list_poli r, list_logistik l
        where t.poli = h.id_history and h.nama_poli = r.id_list_poli and t.id_list_tindakan=l.id_logistik 
        and t.id_pelayanan='$id_pelayanan' 
        group by r.kode_coa, l.kode_keuangan
        union all
        SELECT '14' as kode_ruang,l.kode_keuangan kode_tindakan, 'IGD' as ruangan,sum(t.frek * l.harga_persediaan) total,t.jenis_pelayanan
        from tindakan_farmasi t, history_pelayanan_ugd h,list_logistik l
        where t.poli = h.id_history and  t.id_list_tindakan=l.id_logistik 
        and t.id_pelayanan='$id_pelayanan' 
        group by l.kode_keuangan
        ) as gabung")->result();
    }
    public function akun_obat_bebas($id_pelayanan)
    {
        return $this->db->query("SELECT  t.depo,sum(t.total) total,(if((t.depo ='APOTIK'),'01.420','02.421')) kode_coa,(if((t.depo ='APOTIK'),'Rawat Jalan','Rawat Inap')) jenis
        from tindakan_farmasi t, list_logistik l
        where t.id_list_tindakan=l.id_logistik and t.id_pelayanan='$id_pelayanan' 
        and t.id_resep ='obat_bebas'
        group by t.depo")->result();
    }
    public function getObatHcById($id_mcu)
    {
        return $this->db->query("SELECT sum(t.total) total,(if((c.coa_pendapatan ='OBAT'),'420','430')) kode_coa, c.coa_pendapatan
        FROM tindakan_farmasi t, list_logistik l, list_coa c
        WHERE t.id_list_tindakan=l.id_logistik and t.frek != 0
        and l.golongan_sediaan=c.nama
        AND t.id_pelayanan='$id_mcu'
        group by c.coa_pendapatan")->result();
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
