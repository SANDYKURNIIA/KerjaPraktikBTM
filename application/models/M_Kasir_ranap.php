<<<<<<< HEAD
<?php

class M_Kasir_ranap extends CI_Model
{
    public function selectPasienRanap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select(' b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, b.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.alamat,p.no_ktp,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli');
        $this->db->from('pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok');
        $this->db->where('p.no_rm=b.id_pasien');
        $this->db->where('h.id_pelayanan=b.id_pelayanan');
        $this->db->where('c.id_cara_bayar=b.cara_bayar');
        $this->db->where('r.id_ruangan=h.id_kamar');
        $this->db->where('h.dpjp=dok.id_dokter');
        // $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        $this->db->where("h.status=1 and b.status =1");
        $this->db->where("(b.status_rawat='dirawat' or b.status_rawat = 'dikembalikan')");
        $this->db->order_by('tgl_masuk desc ');
        return $this->db->get()->result();
    }
    public function selectPasienRanapById($id_pelayanan)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select(' b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, b.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli');
        $this->db->from('pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok');
        $this->db->where('p.no_rm=b.id_pasien');
        $this->db->where('h.id_pelayanan=b.id_pelayanan');
        $this->db->where('c.id_cara_bayar=b.cara_bayar');
        $this->db->where('r.id_ruangan=h.id_kamar');
        $this->db->where('h.dpjp=dok.id_dokter');
        // $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        $this->db->where('b.status_rawat', 'dirawat');
        $this->db->where('h.status', '1');
        $this->db->where('h.tgl_keluar', NULL);
        $this->db->where('b.id_pelayanan', $id_pelayanan);
        $this->db->order_by('tgl_masuk desc ');
        return $this->db->get()->result();
    }



    public function list_pelayanan_pasien($id_pelayanan)
    {
        $query =  $this->db->query("SELECT (biaya_rs + biaya_jasa) total, biaya_admin, tipe nama
        from pelayanan p  
        WHERE id_pelayanan='$id_pelayanan'");
        return $query->row_array();
    }
    public function list_apotik_pasien($id_pelayanan)
    {
        $query =  $this->db->query("SELECT (total) total, (frek) frek, nama, jenis_resep, id_logistik,DATE(tanggal) tanggal from(
            SELECT t.total total, t.frek frek, l.nama , r.jenis_resep, l.id_logistik,t.tanggal 
            from tindakan_farmasi t, list_logistik l, pelayanan p, resep_obat r 
            WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and r.id_resep = t.id_resep and r.jenis_resep!=3 and r.id_pelayanan='$id_pelayanan' 
            UNION ALL
            SELECT t.total total, t.frek frek, l.nama , t.id_resep jenis_resep, l.id_logistik,t.tanggal 
            from tindakan_farmasi t, list_logistik l, pelayanan p
            WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and ( t.id_resep ='obat farmasi' or t.id_resep = 'obat retur') and  t.id_pelayanan='$id_pelayanan' 
        ) as gabung 
        where frek != 0
        order by tanggal,jenis_resep");
        return $query->result_array();
    }
    public function list_apotik_igd($id_pelayanan)
    {
        $query =  $this->db->query("SELECT (total) total, (frek) frek, nama, jenis_resep, id_logistik,DATE(tanggal) tanggal from(
            SELECT t.total total, t.frek frek, l.nama , t.id_resep jenis_resep, l.id_logistik,t.tanggal 
            from tindakan_farmasi t, list_logistik l, pelayanan p
            WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and ( t.id_resep ='OBAT RUANGAN' or t.id_resep ='OBAT RUANG') and  t.id_pelayanan='$id_pelayanan' 
            and (t.jenis_pelayanan = 'UGD' or t.jenis_pelayanan = 'IGD')
        ) as gabung 
        where frek != 0
        order by tanggal,jenis_resep");
        return $query->result_array();
    }
    public function list_apotik_ranap($id_pelayanan)
    {
        $query =  $this->db->query("SELECT (total) total, (frek) frek, nama, jenis_resep, id_logistik,DATE(tanggal) tanggal from(
            SELECT t.total total, t.frek frek, l.nama , t.id_resep jenis_resep, l.id_logistik,t.tanggal 
            from tindakan_farmasi t, list_logistik l, pelayanan p
            WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and ( t.id_resep ='OBAT RUANGAN' or t.id_resep ='OBAT RUANG') and  t.id_pelayanan='$id_pelayanan' 
            and (t.jenis_pelayanan = 'RANAP' or t.jenis_pelayanan = 'RAWAT INAP')
        ) as gabung 
        where frek != 0
        order by tanggal,jenis_resep");
        return $query->result_array();
    }
    public function list_operasi_pasien($id_pelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama,DATE(t.tanggal) tanggal
        from tindakan_obat_ok t, list_logistik l, pelayanan p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$id_pelayanan'
        ");
        return $query->result_array();
    }
    public function list_igd_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_igd t, list_tindakan_igd l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_tindakan_igd and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->result_array();
    }
    public function list_labor_pasien($idPelayanan)
    {
        $query =  $this->db->query(" SELECT (t.total) total, (t.frek) frek, l.nama,DATE(t.tanggal) tanggal
        from tindakan_labor t, list_tindakan_labor l, pelayanan p , form_labor f
        WHERE t.id_list_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        and t.id_form_labor = f.id_form_labor and (f.status_pembayaran !='tidak' or f.status_pembayaran is null)
       and f.status != 99
        order by tanggal");
        return $query->result_array();
    }
    public function list_radio_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama ,DATE(t.tanggal) tanggal
        from tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p 
        WHERE t.id_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        and (t.status_pembayaran !='tidak' or t.status_pembayaran is null)
        order by tanggal");
        return $query->result_array();
    }
    public function list_anak_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_anak t, list_tindakan_poli_anak l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_apelkes_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal,t.tipe
        from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p , dokter d
        WHERE  t.id_list_tindakan=l.id_list_tindakan_apelkes and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_apelkes_pasien_penata($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama ,DATE(t.tanggal) tanggal
        from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p
        WHERE  t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$idPelayanan'
        and t.id_dokter ='-' and l.nama not like '%sewa ruang%' and t.id_list_tindakan != '1413' and t.id_list_tindakan != '1412'
        order by tanggal");
        return $query->result_array();
    }
    public function list_internis_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_internis t, list_tindakan_poli_internis l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_bedah_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_bedah t, list_tindakan_poli_bedah_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal ");
        return $query->result_array();
    }
    public function list_fisio_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_fisio t, list_tindakan_poli_fisio l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_gigi_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_gigi t, list_tindakan_poli_gigi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_jantung_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_jantung t, list_tindakan_poli_jantung l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_kulit_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_kulit t, list_tindakan_poli_kulit l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_mata_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_mata t, list_tindakan_poli_mata l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_obgyne_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_obgyne t, list_tindakan_poli_obgyne l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_ok_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT * from (SELECT (t.total) total, (t.frek) frek, l.nama,DATE(t.tanggal) tanggal
        from tindakan_ok t, list_kamar_ok l, pelayanan p  
        WHERE t.id_tindakan=l.id_list_kamar_ok  and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan' 
        union all
        SELECT (t.total) total, (t.frek) frek, t.id_tindakan nama,DATE(t.tanggal) tanggal
        from tindakan_ok t, pelayanan p  
        WHERE p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan' and t.tipe_tindakan is not null
        ) as gabung where frek is not null
        order by tanggal");
        return $query->result_array();
    }
    public function list_tht_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_tht t, list_tindakan_poli_tht l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_umum_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_umum t, list_tindakan_poli_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_akupuntur_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_akupuntur t, list_tindakan_poli_akupuntur l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_bedah_mulut_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_bedah_mulut t, list_tindakan_poli_bedah_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_kesjiwa_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_kes_jiwa t, list_tindakan_poli_kes_jiwa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_orthopedi_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_orthopedi t, list_tindakan_poli_orthopedi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_paru_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_paru t, list_tindakan_poli_paru l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_hemodialisa_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_hemodialisa t, list_tindakan_poli_hemodialisa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_saraf_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_saraf t, list_tindakan_poli_saraf l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_urologi_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_urologi t, list_tindakan_poli_urologi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_ginjal_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_ginjal t, list_tindakan_poli_ginjal l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_penyakit_mulut_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_penyakit_mulut t, list_tindakan_poli_penyakit_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_rehab_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter,DATE(t.tanggal) tanggal 
        from tindakan_poli_rehab t, list_tindakan_poli_rehab l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_gizi($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_gizi t, list_tindakan_poli_gizi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_terapi_bicara($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_terapi_bicara t, list_tindakan_poli_terapi_bicara l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_psikolog($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_psikolog t, list_tindakan_poli_psikolog l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal ");
        return $query->result_array();
    }
    public function list_kemo_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_kemoterapi t, list_tindakan_poli_kemoterapi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        
        order by tanggal");
        return $query->result_array();
    }
    public function list_transportasi_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama ,DATE(t.tanggal) tanggal
        from tindakan_pelayanan_tambahan t, list_tindakan_apelkes l, pelayanan p 
        WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        and (t.status_pembayaran !='tidak' or t.status_pembayaran is null)
        order by tanggal");
        return $query->result_array();
    }
    public function list_kia_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama ,DATE(t.tanggal) tanggal
        from tindakan_poli_kia t, list_tindakan_poli_kia l, pelayanan p 
        WHERE l.id_list_tindakan = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_stifin_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama ,DATE(t.tanggal) tanggal
        from tindakan_poli_stifin t, list_tindakan_poli_stifin l, pelayanan p 
        WHERE l.id_list_tindakan = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_lain_pasien($idPelayanan)
    {
        $query = $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama ,DATE(t.tanggal) tanggal
        from tindakan_penunjang_lain t, list_tindakan_apelkes l, pelayanan p
        WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$idPelayanan' 
        and (t.status_pembayaran !='tidak' or t.status_pembayaran is null)
        order by tanggal");
        return $query->result_array();
    }

    public function list_tindakan_poli($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(total) total, sum(frek) frek, nama_tindakan nama, if((nama_dokter!='-'),nama_dokter,'') dokter , nama_poli ,DATE(tanggal) tanggal
        from tindakan_poli
        WHERE id_pelayanan='$idPelayanan'
        group by id_list_tindakan,id_poli,DATE(tanggal)
        order by nama_poli, tanggal");
        return $query->result_array();
    }

    public function total_apotik($id_pelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_farmasi t, list_logistik l, pelayanan p
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$id_pelayanan' 
        ");
        return $query->row_array();

        // $query =  $this->db->query("SELECT sum(total) FROM (
        // SELECT t.total total 
        // from tindakan_farmasi t, list_logistik l, pelayanan p, resep_obat r  
        // WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and r.id_resep = t.id_resep and r.id_pelayanan='$id_pelayanan' and r.jenis_resep!=3 
        // UNION ALL
        // SELECT t.total total 
        // from tindakan_farmasi t, list_logistik l, pelayanan p  
        // WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan  and (t.id_resep ='OBAT RUANGAN' or t.id_resep ='OBAT RUANG' or t.id_resep ='obat farmasi' or t.id_resep = 'obat retur') and t.id_pelayanan='$id_pelayanan'


        // ) AS gabung");
        // return $query->row_array();
    }

    public function total_operasi($id_pelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_obat_ok t, list_logistik l, pelayanan p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$id_pelayanan'");
        return $query->row_array();
    }
    public function total_igd($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total 
        from tindakan_igd t, list_tindakan_igd l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_tindakan_igd and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_labor($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_labor t, list_tindakan_labor l, pelayanan p 
        WHERE t.id_list_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_radio($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p
        WHERE t.id_tindakan=l.id_daftar_tindakan  and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'");
        return $query->row_array();
    }
    public function total_anak($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_anak t, list_tindakan_poli_anak l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_apelkes($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p
        WHERE  t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_internis($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_internis t, list_tindakan_poli_internis l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_bedah($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_bedah t, list_tindakan_poli_bedah_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_fisio($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(p.biaya_rs+p.biaya_jasa) total
        from tindakan_poli_fisio t, list_tindakan_poli_fisio l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_gigi($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_gigi t, list_tindakan_poli_gigi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_jantung($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_jantung t, list_tindakan_poli_jantung l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_kulit($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_kulit t, list_tindakan_poli_kulit l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_mata($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_mata t, list_tindakan_poli_mata l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_obgyne($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_obgyne t, list_tindakan_poli_obgyne l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_ok($idPelayanan)
    {
        $query =  $this->db->query("SELECT * from (SELECT sum(t.total) total
        from tindakan_ok t, list_kamar_ok l, pelayanan p  
        WHERE t.id_tindakan=l.id_list_kamar_ok  and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        union all
        SELECT sum(t.total) total
        from tindakan_ok t, pelayanan p  
        WHERE p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan' and t.tipe_tindakan is not null
        ) as gabung where total is not null");
        return $query->row_array();
    }
    public function total_tht($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_tht t, list_tindakan_poli_tht l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_umum($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_umum t, list_tindakan_poli_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_akupuntur($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_akupuntur t, list_tindakan_poli_akupuntur l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_bedah_mulut($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_bedah_mulut t, list_tindakan_poli_bedah_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_kesjiwa($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_kes_jiwa t, list_tindakan_poli_kes_jiwa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_orthopedi($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_orthopedi t, list_tindakan_poli_orthopedi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_paru($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_paru t, list_tindakan_poli_paru l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_hemodialisa($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_hemodialisa t, list_tindakan_poli_hemodialisa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_saraf($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_saraf t, list_tindakan_poli_saraf l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_urologi($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_urologi t, list_tindakan_poli_urologi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_ginjal($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_ginjal t, list_tindakan_poli_ginjal l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_penyakit_mulut($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_penyakit_mulut t, list_tindakan_poli_penyakit_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_rehab($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_rehab t, list_tindakan_poli_rehab l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_gizi($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_gizi t, list_tindakan_poli_gizi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_terapi_wicara($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_terapi_bicara t, list_tindakan_poli_terapi_bicara l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }

    public function getSewakamar($id_history)
    {
        return $this->db->query("SELECT l.*
        from history_pelayanan_ranap h, ruangan r, list_tindakan_apelkes l
        where h.id_kamar=r.id_ruangan and r.kelas=l.tipe_kamar and l.nama like '%sewa ruang%' and  h.id_history='$id_history' ")->row();
    }
    public function getSewakamar1($id_pelayanan)
    {
        return $this->db->query("SELECT l.*, r.*
        from riwayat_kamar h, ruangan r, list_tindakan_apelkes l
        where h.id_kamar=r.id_ruangan and r.kelas=l.tipe_kamar and l.nama like '%sewa ruang%' and  h.id_pelayanan='$id_pelayanan' ")->result();
    }
    public function cekSewaKamar($id_pelayanan)
    {
        return $this->db->query("SELECT *
        from tindakan_apelkes t, list_tindakan_apelkes l
        where t.id_list_tindakan=l.id_list_tindakan_apelkes and l.nama like '%sewa ruang%' and t.id_pelayanan='$id_pelayanan' ")->result();
    }
    public function TotalSewaKamar($id_pelayanan)
    {
        return $this->db->query("SELECT sum(t.total) total
        from tindakan_apelkes t, list_tindakan_apelkes l
        where t.id_list_tindakan=l.id_list_tindakan_apelkes and l.nama like '%sewa ruang%' and t.id_pelayanan='$id_pelayanan' ")->row();
    }
    public function TotalSewaKamarAtas($id_pelayanan)
    {
        return $this->db->query("SELECT sum(t.total) total
        from tindakan_apelkes t, list_tindakan_apelkes l
        where t.id_list_tindakan=l.id_list_tindakan_apelkes and l.nama like '%sewa ruang%' 
        and (t.id_list_tindakan='1263' or t.id_list_tindakan='1266' or t.id_list_tindakan='1264' or t.id_list_tindakan='1265' or t.id_list_tindakan='1269' or t.id_list_tindakan='560') and t.id_pelayanan='$id_pelayanan' ")->row();
    }
}
=======
<?php

class M_Kasir_ranap extends CI_Model
{
    public function selectPasienRanap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select(' b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, b.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.alamat,p.no_ktp,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli');
        $this->db->from('pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok');
        $this->db->where('p.no_rm=b.id_pasien');
        $this->db->where('h.id_pelayanan=b.id_pelayanan');
        $this->db->where('c.id_cara_bayar=b.cara_bayar');
        $this->db->where('r.id_ruangan=h.id_kamar');
        $this->db->where('h.dpjp=dok.id_dokter');
        // $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        $this->db->where("h.status=1 and b.status =1");
        $this->db->where("(b.status_rawat='dirawat' or b.status_rawat = 'dikembalikan')");
        $this->db->order_by('tgl_masuk desc ');
        return $this->db->get()->result();
    }
    public function selectPasienRanapById($id_pelayanan)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select(' b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, b.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli');
        $this->db->from('pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok');
        $this->db->where('p.no_rm=b.id_pasien');
        $this->db->where('h.id_pelayanan=b.id_pelayanan');
        $this->db->where('c.id_cara_bayar=b.cara_bayar');
        $this->db->where('r.id_ruangan=h.id_kamar');
        $this->db->where('h.dpjp=dok.id_dokter');
        // $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        $this->db->where('b.status_rawat', 'dirawat');
        $this->db->where('h.status', '1');
        $this->db->where('h.tgl_keluar', NULL);
        $this->db->where('b.id_pelayanan', $id_pelayanan);
        $this->db->order_by('tgl_masuk desc ');
        return $this->db->get()->result();
    }



    public function list_pelayanan_pasien($id_pelayanan)
    {
        $query =  $this->db->query("SELECT (biaya_rs + biaya_jasa) total, biaya_admin, tipe nama
        from pelayanan p  
        WHERE id_pelayanan='$id_pelayanan'");
        return $query->row_array();
    }
    public function list_apotik_pasien($id_pelayanan)
    {
        $query =  $this->db->query("SELECT (total) total, (frek) frek, nama, jenis_resep, id_logistik,DATE(tanggal) tanggal from(
            SELECT t.total total, t.frek frek, l.nama , r.jenis_resep, l.id_logistik,t.tanggal 
            from tindakan_farmasi t, list_logistik l, pelayanan p, resep_obat r 
            WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and r.id_resep = t.id_resep and r.jenis_resep!=3 and r.id_pelayanan='$id_pelayanan' 
            UNION ALL
            SELECT t.total total, t.frek frek, l.nama , t.id_resep jenis_resep, l.id_logistik,t.tanggal 
            from tindakan_farmasi t, list_logistik l, pelayanan p
            WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and ( t.id_resep ='obat farmasi' or t.id_resep = 'obat retur') and  t.id_pelayanan='$id_pelayanan' 
        ) as gabung 
        where frek != 0
        order by tanggal,jenis_resep");
        return $query->result_array();
    }
    public function list_apotik_igd($id_pelayanan)
    {
        $query =  $this->db->query("SELECT (total) total, (frek) frek, nama, jenis_resep, id_logistik,DATE(tanggal) tanggal from(
            SELECT t.total total, t.frek frek, l.nama , t.id_resep jenis_resep, l.id_logistik,t.tanggal 
            from tindakan_farmasi t, list_logistik l, pelayanan p
            WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and ( t.id_resep ='OBAT RUANGAN' or t.id_resep ='OBAT RUANG') and  t.id_pelayanan='$id_pelayanan' 
            and (t.jenis_pelayanan = 'UGD' or t.jenis_pelayanan = 'IGD')
        ) as gabung 
        where frek != 0
        order by tanggal,jenis_resep");
        return $query->result_array();
    }
    public function list_apotik_ranap($id_pelayanan)
    {
        $query =  $this->db->query("SELECT (total) total, (frek) frek, nama, jenis_resep, id_logistik,DATE(tanggal) tanggal from(
            SELECT t.total total, t.frek frek, l.nama , t.id_resep jenis_resep, l.id_logistik,t.tanggal 
            from tindakan_farmasi t, list_logistik l, pelayanan p
            WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and ( t.id_resep ='OBAT RUANGAN' or t.id_resep ='OBAT RUANG') and  t.id_pelayanan='$id_pelayanan' 
            and (t.jenis_pelayanan = 'RANAP' or t.jenis_pelayanan = 'RAWAT INAP')
        ) as gabung 
        where frek != 0
        order by tanggal,jenis_resep");
        return $query->result_array();
    }
    public function list_operasi_pasien($id_pelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama,DATE(t.tanggal) tanggal
        from tindakan_obat_ok t, list_logistik l, pelayanan p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$id_pelayanan'
        ");
        return $query->result_array();
    }
    public function list_igd_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_igd t, list_tindakan_igd l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_tindakan_igd and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->result_array();
    }
    public function list_labor_pasien($idPelayanan)
    {
        $query =  $this->db->query(" SELECT (t.total) total, (t.frek) frek, l.nama,DATE(t.tanggal) tanggal
        from tindakan_labor t, list_tindakan_labor l, pelayanan p , form_labor f
        WHERE t.id_list_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        and t.id_form_labor = f.id_form_labor and (f.status_pembayaran !='tidak' or f.status_pembayaran is null)
       and f.status != 99
        order by tanggal");
        return $query->result_array();
    }
    public function list_radio_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama ,DATE(t.tanggal) tanggal
        from tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p 
        WHERE t.id_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        and (t.status_pembayaran !='tidak' or t.status_pembayaran is null)
        order by tanggal");
        return $query->result_array();
    }
    public function list_anak_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_anak t, list_tindakan_poli_anak l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_apelkes_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal,t.tipe
        from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p , dokter d
        WHERE  t.id_list_tindakan=l.id_list_tindakan_apelkes and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_apelkes_pasien_penata($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama ,DATE(t.tanggal) tanggal
        from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p
        WHERE  t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$idPelayanan'
        and t.id_dokter ='-' and l.nama not like '%sewa ruang%' and t.id_list_tindakan != '1413' and t.id_list_tindakan != '1412'
        order by tanggal");
        return $query->result_array();
    }
    public function list_internis_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_internis t, list_tindakan_poli_internis l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_bedah_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_bedah t, list_tindakan_poli_bedah_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal ");
        return $query->result_array();
    }
    public function list_fisio_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_fisio t, list_tindakan_poli_fisio l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_gigi_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_gigi t, list_tindakan_poli_gigi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_jantung_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_jantung t, list_tindakan_poli_jantung l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_kulit_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_kulit t, list_tindakan_poli_kulit l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_mata_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_mata t, list_tindakan_poli_mata l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_obgyne_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_obgyne t, list_tindakan_poli_obgyne l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_ok_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT * from (SELECT (t.total) total, (t.frek) frek, l.nama,DATE(t.tanggal) tanggal
        from tindakan_ok t, list_kamar_ok l, pelayanan p  
        WHERE t.id_tindakan=l.id_list_kamar_ok  and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan' 
        union all
        SELECT (t.total) total, (t.frek) frek, t.id_tindakan nama,DATE(t.tanggal) tanggal
        from tindakan_ok t, pelayanan p  
        WHERE p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan' and t.tipe_tindakan is not null
        ) as gabung where frek is not null
        order by tanggal");
        return $query->result_array();
    }
    public function list_tht_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_tht t, list_tindakan_poli_tht l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_umum_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_umum t, list_tindakan_poli_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_akupuntur_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_akupuntur t, list_tindakan_poli_akupuntur l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_bedah_mulut_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_bedah_mulut t, list_tindakan_poli_bedah_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_kesjiwa_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_kes_jiwa t, list_tindakan_poli_kes_jiwa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_orthopedi_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_orthopedi t, list_tindakan_poli_orthopedi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_paru_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_paru t, list_tindakan_poli_paru l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_hemodialisa_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_hemodialisa t, list_tindakan_poli_hemodialisa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_saraf_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_saraf t, list_tindakan_poli_saraf l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_urologi_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_urologi t, list_tindakan_poli_urologi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_ginjal_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_ginjal t, list_tindakan_poli_ginjal l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_penyakit_mulut_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_penyakit_mulut t, list_tindakan_poli_penyakit_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_rehab_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter,DATE(t.tanggal) tanggal 
        from tindakan_poli_rehab t, list_tindakan_poli_rehab l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_gizi($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_gizi t, list_tindakan_poli_gizi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_terapi_bicara($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_terapi_bicara t, list_tindakan_poli_terapi_bicara l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_psikolog($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_psikolog t, list_tindakan_poli_psikolog l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal ");
        return $query->result_array();
    }
    public function list_kemo_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter ,DATE(t.tanggal) tanggal
        from tindakan_poli_kemoterapi t, list_tindakan_poli_kemoterapi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        
        order by tanggal");
        return $query->result_array();
    }
    public function list_transportasi_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama ,DATE(t.tanggal) tanggal
        from tindakan_pelayanan_tambahan t, list_tindakan_apelkes l, pelayanan p 
        WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        and (t.status_pembayaran !='tidak' or t.status_pembayaran is null)
        order by tanggal");
        return $query->result_array();
    }
    public function list_kia_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama ,DATE(t.tanggal) tanggal
        from tindakan_poli_kia t, list_tindakan_poli_kia l, pelayanan p 
        WHERE l.id_list_tindakan = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_stifin_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama ,DATE(t.tanggal) tanggal
        from tindakan_poli_stifin t, list_tindakan_poli_stifin l, pelayanan p 
        WHERE l.id_list_tindakan = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    public function list_lain_pasien($idPelayanan)
    {
        $query = $this->db->query("SELECT (t.total) total, (t.frek) frek, l.nama ,DATE(t.tanggal) tanggal
        from tindakan_penunjang_lain t, list_tindakan_apelkes l, pelayanan p
        WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$idPelayanan' 
        and (t.status_pembayaran !='tidak' or t.status_pembayaran is null)
        order by tanggal");
        return $query->result_array();
    }

    public function list_tindakan_poli($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(total) total, sum(frek) frek, nama_tindakan nama, if((nama_dokter!='-'),nama_dokter,'') dokter , nama_poli ,DATE(tanggal) tanggal
        from tindakan_poli
        WHERE id_pelayanan='$idPelayanan'
        group by id_list_tindakan,id_poli,DATE(tanggal)
        order by nama_poli, tanggal");
        return $query->result_array();
    }

    public function total_apotik($id_pelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_farmasi t, list_logistik l, pelayanan p
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$id_pelayanan' 
        ");
        return $query->row_array();

        // $query =  $this->db->query("SELECT sum(total) FROM (
        // SELECT t.total total 
        // from tindakan_farmasi t, list_logistik l, pelayanan p, resep_obat r  
        // WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and r.id_resep = t.id_resep and r.id_pelayanan='$id_pelayanan' and r.jenis_resep!=3 
        // UNION ALL
        // SELECT t.total total 
        // from tindakan_farmasi t, list_logistik l, pelayanan p  
        // WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan  and (t.id_resep ='OBAT RUANGAN' or t.id_resep ='OBAT RUANG' or t.id_resep ='obat farmasi' or t.id_resep = 'obat retur') and t.id_pelayanan='$id_pelayanan'


        // ) AS gabung");
        // return $query->row_array();
    }

    public function total_operasi($id_pelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_obat_ok t, list_logistik l, pelayanan p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$id_pelayanan'");
        return $query->row_array();
    }
    public function total_igd($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total 
        from tindakan_igd t, list_tindakan_igd l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_tindakan_igd and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_labor($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_labor t, list_tindakan_labor l, pelayanan p 
        WHERE t.id_list_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_radio($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p
        WHERE t.id_tindakan=l.id_daftar_tindakan  and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'");
        return $query->row_array();
    }
    public function total_anak($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_anak t, list_tindakan_poli_anak l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_apelkes($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p
        WHERE  t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_internis($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_internis t, list_tindakan_poli_internis l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_bedah($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_bedah t, list_tindakan_poli_bedah_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_fisio($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(p.biaya_rs+p.biaya_jasa) total
        from tindakan_poli_fisio t, list_tindakan_poli_fisio l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_gigi($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_gigi t, list_tindakan_poli_gigi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_jantung($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_jantung t, list_tindakan_poli_jantung l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_kulit($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_kulit t, list_tindakan_poli_kulit l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_mata($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_mata t, list_tindakan_poli_mata l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_obgyne($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_obgyne t, list_tindakan_poli_obgyne l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_ok($idPelayanan)
    {
        $query =  $this->db->query("SELECT * from (SELECT sum(t.total) total
        from tindakan_ok t, list_kamar_ok l, pelayanan p  
        WHERE t.id_tindakan=l.id_list_kamar_ok  and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        union all
        SELECT sum(t.total) total
        from tindakan_ok t, pelayanan p  
        WHERE p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan' and t.tipe_tindakan is not null
        ) as gabung where total is not null");
        return $query->row_array();
    }
    public function total_tht($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_tht t, list_tindakan_poli_tht l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_umum($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_umum t, list_tindakan_poli_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_akupuntur($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_akupuntur t, list_tindakan_poli_akupuntur l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_bedah_mulut($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_bedah_mulut t, list_tindakan_poli_bedah_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_kesjiwa($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_kes_jiwa t, list_tindakan_poli_kes_jiwa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_orthopedi($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_orthopedi t, list_tindakan_poli_orthopedi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_paru($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_paru t, list_tindakan_poli_paru l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_hemodialisa($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_hemodialisa t, list_tindakan_poli_hemodialisa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_saraf($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_saraf t, list_tindakan_poli_saraf l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_urologi($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_urologi t, list_tindakan_poli_urologi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_ginjal($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_ginjal t, list_tindakan_poli_ginjal l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_penyakit_mulut($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_penyakit_mulut t, list_tindakan_poli_penyakit_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_rehab($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_rehab t, list_tindakan_poli_rehab l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_gizi($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_gizi t, list_tindakan_poli_gizi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_terapi_wicara($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_poli_terapi_bicara t, list_tindakan_poli_terapi_bicara l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }

    public function getSewakamar($id_history)
    {
        return $this->db->query("SELECT l.*
        from history_pelayanan_ranap h, ruangan r, list_tindakan_apelkes l
        where h.id_kamar=r.id_ruangan and r.kelas=l.tipe_kamar and l.nama like '%sewa ruang%' and  h.id_history='$id_history' ")->row();
    }
    public function getSewakamar1($id_pelayanan)
    {
        return $this->db->query("SELECT l.*, r.*
        from riwayat_kamar h, ruangan r, list_tindakan_apelkes l
        where h.id_kamar=r.id_ruangan and r.kelas=l.tipe_kamar and l.nama like '%sewa ruang%' and  h.id_pelayanan='$id_pelayanan' ")->result();
    }
    public function cekSewaKamar($id_pelayanan)
    {
        return $this->db->query("SELECT *
        from tindakan_apelkes t, list_tindakan_apelkes l
        where t.id_list_tindakan=l.id_list_tindakan_apelkes and l.nama like '%sewa ruang%' and t.id_pelayanan='$id_pelayanan' ")->result();
    }
    public function TotalSewaKamar($id_pelayanan)
    {
        return $this->db->query("SELECT sum(t.total) total
        from tindakan_apelkes t, list_tindakan_apelkes l
        where t.id_list_tindakan=l.id_list_tindakan_apelkes and l.nama like '%sewa ruang%' and t.id_pelayanan='$id_pelayanan' ")->row();
    }
    public function TotalSewaKamarAtas($id_pelayanan)
    {
        return $this->db->query("SELECT sum(t.total) total
        from tindakan_apelkes t, list_tindakan_apelkes l
        where t.id_list_tindakan=l.id_list_tindakan_apelkes and l.nama like '%sewa ruang%' 
        and (t.id_list_tindakan='1263' or t.id_list_tindakan='1266' or t.id_list_tindakan='1264' or t.id_list_tindakan='1265' or t.id_list_tindakan='1269' or t.id_list_tindakan='560') and t.id_pelayanan='$id_pelayanan' ")->row();
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
