<<<<<<< HEAD
<?php

class M_Kunjungan_Ranap extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function cek_id($id_pelayanan)
    {
        $this->db->select('nama_diagnosa');
        $this->db->from('diagnosa');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function selectDataKunjunganRanap($tgl,$tipe)
    {
        // $tgl = date("Y-m-d");
        $this->db->select('*');
        $this->db->like('tgl_masuk', $tgl);
        $this->db->from('v_kunjungan_ranap');
        if ($tipe == 'IGD') {
            $this->db->where("id_pelayanan not in (select id_pelayanan from history_pelayanan where status = 1)");
        }
        if ($tipe == 'POLI'){
            $this->db->where("id_pelayanan not in (select id_pelayanan from history_pelayanan_ugd where status = 1)");
        }
        // $this->db->where('jenis_pelayanan','RAWAT INAP');
        return $this->db->get()->result();
    }
    public function selectDataKunjunganRanapRange($mulai, $akhir, $tipe)
    {
        $this->db->select('*');
        $this->db->from('v_kunjungan_ranap');
        if ($tipe == 'IGD') {
            $this->db->where("id_pelayanan not in (select id_pelayanan from history_pelayanan where status = 1)");
        }
        if ($tipe == 'POLI'){
            $this->db->where("id_pelayanan not in (select id_pelayanan from history_pelayanan_ugd where status = 1)");
        }
        $this->db->where('tgl_masuk >=', $mulai);
        $this->db->where('tgl_masuk <=', $akhir);
        return $this->db->get()->result();
    }
    public function total_apotik($id_history)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_farmasi t, list_logistik l, pelayanan p
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan  and t.poli='$id_history' and (t.jenis_pelayanan ='RAWAT INAP' or t.jenis_pelayanan ='RANAP')
        and t.frek != 0
        ");
        return $query->row();
    }
    public function total_visit($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p
        WHERE  t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$idPelayanan' and l.nama like '%VISIT%'
        ");
        return $query->row();
    }
    public function total_apelkes($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p
        WHERE  t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$idPelayanan' and l.nama not like '%VISIT%'
        ");
        return $query->row();
    }
}
=======
<?php

class M_Kunjungan_Ranap extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function cek_id($id_pelayanan)
    {
        $this->db->select('nama_diagnosa');
        $this->db->from('diagnosa');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function selectDataKunjunganRanap($tgl,$tipe)
    {
        // $tgl = date("Y-m-d");
        $this->db->select('*');
        $this->db->like('tgl_masuk', $tgl);
        $this->db->from('v_kunjungan_ranap');
        if ($tipe == 'IGD') {
            $this->db->where("id_pelayanan not in (select id_pelayanan from history_pelayanan where status = 1)");
        }
        if ($tipe == 'POLI'){
            $this->db->where("id_pelayanan not in (select id_pelayanan from history_pelayanan_ugd where status = 1)");
        }
        // $this->db->where('jenis_pelayanan','RAWAT INAP');
        return $this->db->get()->result();
    }
    public function selectDataKunjunganRanapRange($mulai, $akhir, $tipe)
    {
        $this->db->select('*');
        $this->db->from('v_kunjungan_ranap');
        if ($tipe == 'IGD') {
            $this->db->where("id_pelayanan not in (select id_pelayanan from history_pelayanan where status = 1)");
        }
        if ($tipe == 'POLI'){
            $this->db->where("id_pelayanan not in (select id_pelayanan from history_pelayanan_ugd where status = 1)");
        }
        $this->db->where('tgl_masuk >=', $mulai);
        $this->db->where('tgl_masuk <=', $akhir);
        return $this->db->get()->result();
    }
    public function total_apotik($id_history)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_farmasi t, list_logistik l, pelayanan p
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan  and t.poli='$id_history' and (t.jenis_pelayanan ='RAWAT INAP' or t.jenis_pelayanan ='RANAP')
        and t.frek != 0
        ");
        return $query->row();
    }
    public function total_visit($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p
        WHERE  t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$idPelayanan' and l.nama like '%VISIT%'
        ");
        return $query->row();
    }
    public function total_apelkes($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p
        WHERE  t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$idPelayanan' and l.nama not like '%VISIT%'
        ");
        return $query->row();
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
