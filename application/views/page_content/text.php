public function total_apotik($id_pelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama 
        from tindakan_farmasi t, list_logistik l, pelayanan p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$id_pelayanan'");
        return $query->result_array();
    }
   
    public function total_operasi($id_pelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama
        from tindakan_obat_ok t, list_logistik l, pelayanan p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$id_pelayanan'");
        return $query->result();
    }
    public function total_igd($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, d.nama dokter 
        from tindakan_igd t, list_tindakan_igd l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_tindakan_igd and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->result();
    }
    public function total_labor($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama
        from tindakan_labor t, list_tindakan_labor l, pelayanan p 
        WHERE t.id_list_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->result();
    }
    public function total_radio($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, d.nama dokter 
        from tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p , dokter d
        WHERE t.id_tindakan=l.id_daftar_tindakan and t.dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'");
        return $query->result();
    }
    public function total_anak($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, d.nama dokter 
        from tindakan_poli_anak t, list_tindakan_poli_anak l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->result();
    }
    public function total_apelkes($idPelayanan)
    {
        $query =  $this->db->query("SELECT t.*, l.nama
        from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p
        WHERE  t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$idPelayanan'
        ");
        return $query->result();
    }
    public function total_internis($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, d.nama dokter 
        from tindakan_poli_internis t, list_tindakan_poli_internis l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->result();
    }
    public function total_bedah($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, d.nama dokter 
        from tindakan_poli_bedah t, list_tindakan_poli_bedah_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->result();
    }
    public function total_fisio($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, d.nama dokter 
        from tindakan_poli_fisio t, list_tindakan_poli_fisio l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->result();
    }
    public function total_gigi($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, d.nama dokter 
        from tindakan_poli_gigi t, list_tindakan_poli_gigi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->result();
    }
    public function total_jantung($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, d.nama dokter 
        from tindakan_poli_jantung t, list_tindakan_poli_jantung l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->result();
    }
    public function total_kulit($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, d.nama dokter 
        from tindakan_poli_kulit t, list_tindakan_poli_kulit l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->result();
    }
    public function total_mata($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, d.nama dokter 
        from tindakan_poli_mata t, list_tindakan_poli_mata l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->result();
    }
    public function total_obgyne($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, d.nama dokter 
        from tindakan_poli_obgyne t, list_tindakan_poli_obgyne l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->result();
    }
    public function total_ok($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama
        from tindakan_ok t, list_kamar_ok l, pelayanan p  
        WHERE t.id_tindakan=l.id_list_kamar_ok  and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'");
        return $query->result();
    }
    public function total_tht($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, d.nama dokter 
        from tindakan_poli_tht t, list_tindakan_poli_tht l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->result();
    }
    public function total_umum($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, d.nama dokter 
        from tindakan_poli_tht t, list_tindakan_poli_tht l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->result();