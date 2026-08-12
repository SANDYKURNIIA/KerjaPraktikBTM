<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai extends CI_Model
{
    //biar bisa panggil variable table
    private $table = "formulir_monitoring_pemrosesan_alat_kesehatan_bebas_pakai";
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
        $this->db->where('id_MONITORING_PEMROSESAN_ALAT_KESEHATAN',$where);
        return $this->db->get($this->table);
    }

    public function update($where,$data){
        $this->db->where($where);
        $this->db->update($this->table, $data);
    }
}

