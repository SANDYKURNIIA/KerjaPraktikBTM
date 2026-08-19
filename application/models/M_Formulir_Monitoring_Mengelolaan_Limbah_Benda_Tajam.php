<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Formulir_Monitoring_Mengelolaan_Limbah_Benda_Tajam extends CI_Model
{
    //biar bisa panggil variable table
    private $table = "formulir_monitoring_mengelolaan_limbah_benda_tajam";
    public function getAll()
    {
        $this->db->order_by("tgl_input desc");
        return $this->db->get($this->table)->result();
    }

    public function getWhere($search) {
        return $this->db->get($this->table)->result();
    }


    public function delete($where) {
        return $this->db->delete($this->table, $where);
    }

    public function getData($where){
        $this->db->select("*");
        $this->db->where('id_benda_tajam',$where);
        return $this->db->get($this->table);
    }

    public function update($where,$data){
        $this->db->where($where);
        $this->db->update($this->table, $data);
    }
}

