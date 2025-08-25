<?php

class M_Daftar_vendor extends CI_Model
{
    public function selectDataVendor()
    {
        $this->db->select('*');
        $this->db->from('vendor_logistik_umum');
        $this->db->where('status', 'AKTIF');
        $this->db->order_by('nama');
        return $this->db->get()->result();
    }
    public function insert_vendor($data)
    {
        return $this->db->insert('vendor_logistik_umum', $data);
    }
    public function selectDataById($id)
    {
        $this->db->where('id_vendor', $id);
        return $this->db->get('vendor_logistik_umum')->result();
    }
    public function update_vendor($id, $data)
    {
        $this->db->where('id_vendor', $id);
        return $this->db->update('vendor_logistik_umum', $data);
    }
    public function delete_vendor($id)
    {
        $this->db->delete('vendor_logistik_umum', array('id_vendor' => $id));
    }
}
