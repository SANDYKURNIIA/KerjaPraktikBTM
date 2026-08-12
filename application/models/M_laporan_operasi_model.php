<<<<<<< HEAD
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
=======
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
}