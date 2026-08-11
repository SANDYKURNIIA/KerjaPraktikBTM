<?php
class M_laporan_operasi_model extends CI_Model
{
    public function insert_data_pasien($data)
 {
     $this->db->insert('laporan_operasi', $data);
 }

    public function update_data_pasien($id_pelayanan, $data)
    {
        // Melakukan pembaruan data berdasarkan id_pelayanan
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->update('laporan_operasi', $data);
    }
    
    public function update_by_id($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('laporan_operasi', $data);
    }

    public function CekId($id_pelayanan)
    {
        $query = $this->db->get_where('laporan_operasi', array('id_pelayanan' => $id_pelayanan));
        return $query->row();
    }
    public function getDataMedisById($id_pelayanan)
    {
        $query = $this->db->get_where('laporan_operasi', array('id_pelayanan' => $id_pelayanan));
        return $query->result();
    }

    public function getData($id_pelayanan){
        $this->db->select('*');
        $this->db->from('laporan_operasi');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->row();
    }
    
    public function getDiagnosa()
    {
        $this->db->select('id_diagnosa,nama_diagnosa');
        $this->db->from('list_diagnosa');
        return $this->db->get()->result_array();
        // return $this->db->get()->row();
    }

    public function get_list($id_pelayanan)
    {
        $this->db->select('laporan_operasi.*, staff.nama AS nama_staff');
        $this->db->from('laporan_operasi');
        $this->db->join('staff', 'staff.id_staff = laporan_operasi.staff', 'left');
        $this->db->where('laporan_operasi.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('laporan_operasi')->row();
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('laporan_operasi');
    }

    public function hapus_multiple($ids)
    {
        $this->db->where_in('id', $ids);
        return $this->db->delete('laporan_operasi');
    }
}