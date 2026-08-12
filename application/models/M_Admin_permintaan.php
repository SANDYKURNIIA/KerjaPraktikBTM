<?php

class M_Admin_permintaan extends CI_Model
{
    public function selectDataPermintaan()
    {
        $this->db->select('*');
        $this->db->from('admin_logistik_umum');
        $this->db->order_by('unit ASC');
        return $this->db->get()->result();
    }
    public function update_buka($where,$page_data,$table){
        $this->db->where($where);
        $this->db->update($table,$page_data);
    }
    public function update_tutup($where,$page_data,$table){
        $this->db->where($where);
        $this->db->update($table,$page_data);
    }
}
