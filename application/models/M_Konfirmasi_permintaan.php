<?php

class M_Konfirmasi_permintaan extends CI_Model
{
    public function selectRequest()
    {
        $this->db->select(' r.*, s.nama staff');
        $this->db->from('request_logistik_umum r, staff s');
        $this->db->where('s.id_staff=r.id_staff_req');
        $this->db->where('r.unit', 'sungairaya');
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