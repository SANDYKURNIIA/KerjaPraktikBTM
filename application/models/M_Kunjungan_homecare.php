<?php

class M_Kunjungan_homecare extends CI_Model
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
    public function selectDataKunjunganHomecare()
    {
        $tanggal = date("Y-m-d");
        $this->db->select('*');
        $this->db->like('tanggal',$tanggal);
        $this->db->from('homecare');
        $this->db->where('status_bayar',1);
        return $this->db->get()->result();
    }
    public function selectKunjunganHomecareRange($mulai, $akhir)
    {
        $this->db->select('*');
        $this->db->from('homecare');
        $this->db->where('status_bayar',1);
        $this->db->where('tanggal >=', $mulai);
        $this->db->where('tanggal <=', $akhir);
        return $this->db->get()->result();
    }
}