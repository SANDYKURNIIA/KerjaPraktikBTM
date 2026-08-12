<<<<<<< HEAD
<?php

class M_Kasir_1 extends CI_Model
{
    
    public function list_tindakan_poli_ranap($idPelayanan)
    {
        $query =  $this->db->query("SELECT total, frek, nama_tindakan nama, if((nama_dokter!='-'),nama_dokter,'') dokter ,DATE(tanggal) tanggal
        from tindakan_poli
        WHERE id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    
    public function list_tindakan_poli($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(total) total, sum(frek) frek, nama_tindakan nama, if((nama_dokter!='-'),nama_dokter,'') dokter , nama_poli
        from tindakan_poli
        WHERE id_pelayanan='$idPelayanan'
        group by id_list_tindakan,id_poli
        order by nama_poli");
        return $query->result_array();
    }
    public function total_poli($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli
        WHERE id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }



    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function total_anak($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_anak t, list_tindakan_poli_anak l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_internis($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_internis t, list_tindakan_poli_internis l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_bedah($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_bedah t, list_tindakan_poli_bedah_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_fisio($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_fisio t, list_tindakan_poli_fisio l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_gigi($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_gigi t, list_tindakan_poli_gigi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_jantung($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_jantung t, list_tindakan_poli_jantung l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_kulit($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_kulit t, list_tindakan_poli_kulit l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_mata($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_mata t, list_tindakan_poli_mata l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_obgyne($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_obgyne t, list_tindakan_poli_obgyne l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
   
    public function total_tht($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_tht t, list_tindakan_poli_tht l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_umum($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_umum t, list_tindakan_poli_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_akupuntur($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_akupuntur t, list_tindakan_poli_akupuntur l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_bedah_mulut($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_bedah_mulut t, list_tindakan_poli_bedah_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_kesjiwa($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_kes_jiwa t, list_tindakan_poli_kes_jiwa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_orthopedi($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_orthopedi t, list_tindakan_poli_orthopedi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_paru($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_paru t, list_tindakan_poli_paru l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_hemodialisa($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_hemodialisa t, list_tindakan_poli_hemodialisa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_saraf($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_saraf t, list_tindakan_poli_saraf l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_urologi($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_urologi t, list_tindakan_poli_urologi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_ginjal($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_ginjal t, list_tindakan_poli_ginjal l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_penyakit_mulut($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_penyakit_mulut t, list_tindakan_poli_penyakit_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_rehab($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_rehab t, list_tindakan_poli_rehab l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_gizi($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_gizi t, list_tindakan_poli_gizi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_terapi_wicara($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_terapi_bicara t, list_tindakan_poli_terapi_bicara l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_psikolog($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_psikolog t, list_tindakan_poli_psikolog l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_kemoterapi($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_kemoterapi t, list_tindakan_poli_kemoterapi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_stifin($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_stifin t, list_tindakan_poli_stifin l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
}
=======
<?php

class M_Kasir_1 extends CI_Model
{
    
    public function list_tindakan_poli_ranap($idPelayanan)
    {
        $query =  $this->db->query("SELECT total, frek, nama_tindakan nama, if((nama_dokter!='-'),nama_dokter,'') dokter ,DATE(tanggal) tanggal
        from tindakan_poli
        WHERE id_pelayanan='$idPelayanan'
        order by tanggal");
        return $query->result_array();
    }
    
    public function list_tindakan_poli($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(total) total, sum(frek) frek, nama_tindakan nama, if((nama_dokter!='-'),nama_dokter,'') dokter , nama_poli
        from tindakan_poli
        WHERE id_pelayanan='$idPelayanan'
        group by id_list_tindakan,id_poli
        order by nama_poli");
        return $query->result_array();
    }
    public function total_poli($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli
        WHERE id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }



    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function total_anak($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_anak t, list_tindakan_poli_anak l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_internis($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_internis t, list_tindakan_poli_internis l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_bedah($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_bedah t, list_tindakan_poli_bedah_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_fisio($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_fisio t, list_tindakan_poli_fisio l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_gigi($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_gigi t, list_tindakan_poli_gigi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_jantung($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_jantung t, list_tindakan_poli_jantung l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_kulit($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_kulit t, list_tindakan_poli_kulit l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_mata($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_mata t, list_tindakan_poli_mata l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_obgyne($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_obgyne t, list_tindakan_poli_obgyne l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
   
    public function total_tht($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_tht t, list_tindakan_poli_tht l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_umum($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_umum t, list_tindakan_poli_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_akupuntur($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_akupuntur t, list_tindakan_poli_akupuntur l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_bedah_mulut($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_bedah_mulut t, list_tindakan_poli_bedah_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_kesjiwa($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_kes_jiwa t, list_tindakan_poli_kes_jiwa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_orthopedi($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_orthopedi t, list_tindakan_poli_orthopedi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_paru($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_paru t, list_tindakan_poli_paru l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_hemodialisa($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_hemodialisa t, list_tindakan_poli_hemodialisa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_saraf($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_saraf t, list_tindakan_poli_saraf l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_urologi($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_urologi t, list_tindakan_poli_urologi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_ginjal($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_ginjal t, list_tindakan_poli_ginjal l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_penyakit_mulut($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_penyakit_mulut t, list_tindakan_poli_penyakit_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_rehab($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_rehab t, list_tindakan_poli_rehab l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_gizi($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_gizi t, list_tindakan_poli_gizi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_terapi_wicara($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_terapi_bicara t, list_tindakan_poli_terapi_bicara l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_psikolog($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_psikolog t, list_tindakan_poli_psikolog l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_kemoterapi($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_kemoterapi t, list_tindakan_poli_kemoterapi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_stifin($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_stifin t, list_tindakan_poli_stifin l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
