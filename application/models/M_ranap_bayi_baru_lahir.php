<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_ranap_bayi_baru_lahir extends CI_Model
{
    public function insert_data ($tabel, $data)
    {
        // Masukkan data ke dalam tabel "resume_pasien_pulang"
        $this->db->insert($tabel, $data);
    }

    public function update_data($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function formopedit($id_pelayanan, $data)
    {
        // Melakukan pembaruan data berdasarkan id_pelayanan
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->update('ass_bayi_baru_lahir', $data);
    }

    public function CekId($id_pelayanan)
    {
        $query = $this->db->query("SELECT *
        FROM ass_bayi_baru_lahir
        JOIN fk1_bayi_baru_lahir ON fk1_bayi_baru_lahir.id_fk = ass_bayi_baru_lahir.id_form
        JOIN fk2_bayi_baru_lahir ON fk2_bayi_baru_lahir.id_fk = ass_bayi_baru_lahir.id_form
        WHERE ass_bayi_baru_lahir.id_pelayanan = ?", array($id_pelayanan));

        $result = $query->row();

        return $result;
    }
    public function getDataMedisById($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('ass_bayi_baru_lahir');
        $this->db->join('fk1_bayi_baru_lahir', 'fk1_bayi_baru_lahir.id_fk = ass_bayi_baru_lahir.id_form', 'left');
        $this->db->join('fk2_bayi_baru_lahir', 'fk2_bayi_baru_lahir.id_fk = ass_bayi_baru_lahir.id_form', 'left');
        $this->db->where('ass_bayi_baru_lahir.id_pelayanan', $id_pelayanan);
    
        $query = $this->db->get();
    
        return $query->row(); // Use row() instead of result()
    }
    
    
    


}

    



