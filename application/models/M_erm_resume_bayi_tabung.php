<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_erm_resume_bayi_tabung extends CI_Model
{
    public function insert_data($data)
    {
        // Masukkan data ke dalam tabel "resume_pasien_pulang"
        $this->db->insert('resume_bayi_tabung', $data);
    }

    public function formopedit($id_pelayanan, $data)
    {
        // Melakukan pembaruan data berdasarkan id_pelayanan
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->update('resume_bayi_tabung', $data);
    }

    public function CekId($id_pelayanan)
    {
        $query = $this->db->get_where('resume_bayi_tabung', array('id_pelayanan' => $id_pelayanan));
        return $query->row();
    }
    public function getDataMedisById($id_pelayanan)
    {
        $query = $this->db->get_where('resume_bayi_tabung', array('id_pelayanan' => $id_pelayanan));
        return $query->result();
    }

}