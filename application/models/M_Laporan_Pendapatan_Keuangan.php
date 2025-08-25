<?php

class M_Laporan_Pendapatan_Keuangan extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }
  
    public function selectPendapatanPerkelompok($mulai,$akhir,$cara_bayar)
    {
        $query = $this->db->query("SELECT sum(d.total_harga) total
        FROM deatail_kasir d, pelayanan p, cara_bayar c
        WHERE d.id_pelayanan=p.id_pelayanan and p.cara_bayar=c.id_cara_bayar and p.status_rawat='selesai' and p.status=1 
        and d.tanggal BETWEEN '$mulai' AND '$akhir' and c.nama ='$cara_bayar'");

        return $query->row()->total;
    }
    public function selectKonsulRajalJasaDokter($mulai,$akhir)
    {
        $query = $this->db->query("SELECT sum(biaya_jasa) total
        FROM pelayanan
        WHERE status_rawat='selesai'
        and tgl_masuk BETWEEN '$mulai' AND '$akhir'");

        return $query->row()->total;

    }
    public function selectVisiteRanapJasaDokter($mulai,$akhir)
    {
        $query = $this->db->query("SELECT sum(t.total) total
        FROM tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p
        WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and t.id_pelayanan=p.id_pelayanan and p.status_rawat='selesai' and p.status=1 and l.nama LIKE '%VISIT%'
        and t.tanggal BETWEEN '$mulai' AND '$akhir'");

        return $query->row()->total;

    }
    public function selectKonsulRajalJasaSarana($mulai,$akhir)
    {
        $query = $this->db->query("SELECT sum(p.biaya_rs) total
        FROM pelayanan p, history_pelayanan h
        WHERE p.id_pelayanan=h.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir' 
        UNION
        SELECT sum(p.biaya_rs) total
        FROM pelayanan p, history_pelayanan_ugd h
        WHERE p.id_pelayanan=h.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'");

        return $query->row()->total;

    }
    public function selectTindakanRajalJasaSarana($mulai,$akhir)
    {
        $query = $this->db->query("SELECT sum(total) total from ( 
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_anak l, tindakan_poli_anak t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_umum l, tindakan_poli_umum t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_igd l, tindakan_igd t, pelayanan p WHERE t.id_list_tindakan=l.id_tindakan_igd and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_akupuntur l, tindakan_poli_akupuntur t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_bedah_mulut l, tindakan_poli_bedah_mulut t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_bedah_prioritas l, tindakan_poli_bedah_prioritas t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_bedah_umum l, tindakan_poli_bedah t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_fisio l, tindakan_poli_fisio t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_gigi l, tindakan_poli_gigi t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_ginjal l, tindakan_poli_ginjal t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_hemodialisa l, tindakan_poli_hemodialisa t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_internis l, tindakan_poli_internis t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_internis_prioritas l, tindakan_poli_internis_prioritas t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_jantung l, tindakan_poli_jantung t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_kes_jiwa l, tindakan_poli_kes_jiwa t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_kulit l, tindakan_poli_kulit t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_mata l, tindakan_poli_mata t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir' 
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_obgyne l, tindakan_poli_obgyne t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'  
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_obgyne_prioritas l, tindakan_poli_obgyne_prioritas t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'  
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_orthopedi l, tindakan_poli_orthopedi t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'   
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_paru l, tindakan_poli_paru t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'    
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_penyakit_mulut l, tindakan_poli_penyakit_mulut t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'    
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_rehab l, tindakan_poli_rehab t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'   
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_saraf l, tindakan_poli_saraf t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'   
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_terapi_bicara l, tindakan_poli_terapi_bicara t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'   
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_tht l, tindakan_poli_tht t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'    
        UNION all
        SELECT SUM(l.harga_sarana) total FROM list_tindakan_poli_urologi l, tindakan_poli_urologi t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and p.tgl_masuk BETWEEN '$mulai' AND '$akhir'
        ) as gabung"
        );

        return $query->row()->total;

    }
    public function selectTindakanRanapJasaSarana($mulai,$akhir)
    {
        $query = $this->db->query("SELECT sum(t.total) total
        FROM tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p
        WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and t.id_pelayanan=p.id_pelayanan and p.status_rawat='selesai' and p.status=1 and l.nama NOT LIKE '%VISIT%'
        and t.tanggal BETWEEN '$mulai' AND '$akhir'");

        return $query->row()->total;

    }
    public function selectobatFarmasiRajal($mulai,$akhir)
    {
        $query = $this->db->query("SELECT sum(total) total
        FROM tindakan_farmasi
        WHERE depo='APOTIK' and id_resep != 'obat_bebas'
        and tanggal BETWEEN '$mulai' AND '$akhir'");

        return $query->row()->total;

    }
    public function selectobatFarmasiRanap($mulai,$akhir)
    {
        $query = $this->db->query("SELECT sum(total) total
        FROM tindakan_farmasi
        WHERE depo='RANAP' and id_resep != 'obat_bebas'
        and tanggal BETWEEN '$mulai' AND '$akhir'");

        return $query->row()->total;

    }
    public function selectApotikLuar($mulai,$akhir)
    {
        $query = $this->db->query("SELECT sum(total) total
        FROM tindakan_farmasi
        WHERE id_resep='obat_bebas'
        and tanggal BETWEEN '$mulai' AND '$akhir'");

        return $query->row()->total;

    }
    public function selectFisioRanap($mulai,$akhir)
    {
        $query = $this->db->query("SELECT SUM(t.total) total 
        FROM list_tindakan_poli_fisio l, tindakan_poli_fisio t, pelayanan p 
        WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1
        and t.tanggal BETWEEN '$mulai' AND '$akhir'");

        return $query->row()->total;

    }
    public function selectRadiologiRajal($mulai,$akhir)
    {
        $query = $this->db->query("SELECT SUM(t.total) total 
        FROM list_tindakan_radiologi l, tindakan_radiologi t, pelayanan p 
        WHERE t.id_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and t.jenis_pelayanan is null
        and t.tanggal BETWEEN '$mulai' AND '$akhir'");

        return $query->row()->total;

    }
    public function selectRadiologiRanap($mulai,$akhir)
    {
        $query = $this->db->query("SELECT SUM(t.total) total 
        FROM list_tindakan_radiologi l, tindakan_radiologi t, pelayanan p 
        WHERE t.id_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and t.jenis_pelayanan='RAWAT INAP'
        and t.tanggal BETWEEN '$mulai' AND '$akhir'");

        return $query->row()->total;

    }
    public function selectLaborRanap($mulai,$akhir)
    {
        $query = $this->db->query("SELECT SUM(t.total) total 
        FROM list_tindakan_labor l, tindakan_labor t, pelayanan p 
        WHERE t.id_list_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and p.status=1 and t.cara_masuk='RAWAT INAP'
        and t.tanggal BETWEEN '$mulai' AND '$akhir'");

        return $query->row()->total;

    }
    public function total_pelayanan_pasien($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(biaya_rs + biaya_admin) total
        from pelayanan   
        WHERE DATE(tgl_masuk) BETWEEN '$mulai' and '$akhir' and status =1 and status_rawat='selesai'")->row_array();

        
        return $query['total'];
    }
    public function total_apotik($mulai,$akhir)
    {
        
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total FROM (
        SELECT (t.total) total 
        from tindakan_farmasi t, list_logistik l, pelayanan p, resep_obat r  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and r.id_resep = t.id_resep and r.depo ='APOTIK' and p.status_rawat='selesai' and
        DATE(t.tanggal) BETWEEN '$mulai' and '$akhir' and r.jenis_resep!=3 and t.frek !=0
       
        ) AS gabung");
        return $query->row_array();
    }
    public function total_depo_ranap($mulai,$akhir)
    {
        
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total FROM (
        
        SELECT t.total total 
        from tindakan_farmasi t, list_logistik l, pelayanan p, resep_obat r  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and r.id_resep = t.id_resep and r.depo !='APOTIK' and p.status_rawat='selesai' and
        DATE(t.tanggal) BETWEEN '$mulai' and '$akhir' and r.jenis_resep!=3 and t.frek !=0
       
        ) AS gabung");
        return $query->row_array();
    }
    public function total_obat_ruangan_ranap($mulai,$akhir)
    {
        
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total FROM (
        SELECT t.total total 
        from tindakan_farmasi t, list_logistik l, pelayanan p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai'  and (t.id_resep ='OBAT RUANGAN' or t.id_resep ='OBAT RUANG')
        and t.frek !=0
        and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        ) AS gabung");
        return $query->row_array();
    }

    public function total_operasi($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_obat_ok t, list_logistik l, pelayanan p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'");
        return $query->row_array();
    }
    public function total_igd($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_igd t, list_tindakan_igd l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_tindakan_igd and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and p.status_rawat='selesai'
        and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        ");
        return $query->row_array();
    }
    public function total_labor($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_labor t, list_tindakan_labor l, pelayanan p , form_labor f 
        WHERE t.id_list_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai'  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        and t.id_form_labor = f.id_form_labor and (f.status_pembayaran !='tidak' or f.status_pembayaran is null) and f.status != 99
        ");
        return $query->row_array();
    }
    public function total_radio($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p 
        WHERE t.id_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        and (t.status_pembayaran !='tidak' or t.status_pembayaran is null)
        ");
        return $query->row_array();
    }
    public function total_anak($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_anak t, list_tindakan_poli_anak l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.status_rawat='selesai' and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='E00RX703'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_apelkes($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p
        WHERE  t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        ");
        return $query->row_array();
    }
    public function total_internis($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_internis t, list_tindakan_poli_internis l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='24QRNLX29R'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_bedah($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_bedah t, list_tindakan_poli_bedah_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai'  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='MWK205D30K'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_fisio($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_fisio t, list_tindakan_poli_fisio l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        ");
        return $query->row_array();
    }
    public function total_gigi($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_gigi t, list_tindakan_poli_gigi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='JG6142E66'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_jantung($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_jantung t, list_tindakan_poli_jantung l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='I9NXY5VNQG'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_kulit($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_kulit t, list_tindakan_poli_kulit l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='2JZ09X4K22'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_mata($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_mata t, list_tindakan_poli_mata l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='UQ81K76373'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_obgyne($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_obgyne t, list_tindakan_poli_obgyne l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='HLGI4176K8'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_ok($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_ok t, list_kamar_ok l, pelayanan p  
        WHERE t.id_tindakan=l.id_list_kamar_ok  and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir' 
       ");
        return $query->row_array();
    }
    public function total_tht($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_tht t, list_tindakan_poli_tht l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='O782EGU4PR'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_umum($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_umum t, list_tindakan_poli_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='RZE28J1098'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_akupuntur($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_akupuntur t, list_tindakan_poli_akupuntur l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='SC3120P87'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_bedah_mulut($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_bedah_mulut t, list_tindakan_poli_bedah_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='JG6142E66'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_kesjiwa($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_kes_jiwa t, list_tindakan_poli_kes_jiwa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='WT5092N25'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_orthopedi($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_orthopedi t, list_tindakan_poli_orthopedi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='YR6435H21'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_paru($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_paru t, list_tindakan_poli_paru l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='ZX2016T39'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_hemodialisa($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_hemodialisa t, list_tindakan_poli_hemodialisa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        ");
        return $query->row_array();
    }
    public function total_saraf($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_saraf t, list_tindakan_poli_saraf l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='XN5395D61'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_urologi($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_urologi t, list_tindakan_poli_urologi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='EV7719I53'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_ginjal($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_ginjal t, list_tindakan_poli_ginjal l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='UG4424O51'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_penyakit_mulut($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_penyakit_mulut t, list_tindakan_poli_penyakit_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='FE1400Y26'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_rehab($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_rehab t, list_tindakan_poli_rehab l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='111111'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_gizi($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_gizi t, list_tindakan_poli_gizi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='CV3RN1X29R'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_terapi_wicara($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_terapi_bicara t, list_tindakan_poli_terapi_bicara l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='6E9TWC694'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_psikolog($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_psikolog t, list_tindakan_poli_psikolog l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='HK81U92373'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_kemoterapi($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_kemoterapi t, list_tindakan_poli_kemoterapi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='EM4488C53'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_stifin($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_stifin t, list_tindakan_poli_stifin l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='STF56NI'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_transportasi($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_pelayanan_tambahan t, list_tindakan_apelkes l, pelayanan p 
        WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir' and (t.status_pembayaran !='tidak' or t.status_pembayaran is null)
        ");
        return $query->row_array();
    }
    public function total_kia($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_kia t, list_tindakan_poli_kia l, pelayanan p 
        WHERE l.id_list_tindakan = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(h.biaya_jasa) ,0) total 
        from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
        WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and p.status_rawat='selesai'
        and DATE(h.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1 and h.nama_poli='KASE14'
        ) as gabung
        ");
        return $query->row_array();
    }
    public function total_lain($mulai,$akhir)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_penunjang_lain t, list_tindakan_apelkes l, pelayanan p
        WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan  and p.id_pelayanan=t.id_pelayanan and p.status_rawat='selesai' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        ");
        return $query->row_array();
    }
    public function total_mcu($mulai,$akhir)
    {
        $query = $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from(
        SELECT IFNULL(sum(t.total) ,0) total
        FROM tindakan_mcu t, list_tindakan_mcu l, mcu p
        WHERE t.id_list_tindakan=l.id_list_tindakan_mcu and t.id_mcu = p.id_mcu
        and DATE(p.tanggal) BETWEEN '$mulai' and '$akhir'
        union all
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_labor_mcu t, list_tindakan_labor_mcu l, mcu p 
        WHERE t.id_daftar_tindakan=l.id_daftar_tindakan and p.id_mcu=t.id_mcu 
        and DATE(p.tanggal) BETWEEN '$mulai' and '$akhir'
        union all
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_radiologi_mcu t, list_tindakan_radiologi_mcu l, mcu p 
        WHERE t.id_daftar_tindakan=l.id_daftar_tindakan and p.id_mcu=t.id_mcu 
        and DATE(p.tanggal) BETWEEN '$mulai' and '$akhir'
        ) as g");
        return $query->row_array();
    }
    public function total_obat_bebas($mulai,$akhir)
    {
        $query =  $this->db->query(" SELECT IFNULL(sum(total) ,0) total
        from(
        SELECT (IFNULL(sum(t.total) ,0) * 0.11) total
        from tindakan_farmasi t, list_logistik l, obat_bebas p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_obat_bebas=t.id_pelayanan
        and p.unit = 'APOTIK'
        and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        UNION ALL
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_farmasi t, list_logistik l, obat_bebas p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_obat_bebas=t.id_pelayanan
        and p.unit != 'APOTIK'
        and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        ) as g
        ");
        return $query->row_array();
    }
}
