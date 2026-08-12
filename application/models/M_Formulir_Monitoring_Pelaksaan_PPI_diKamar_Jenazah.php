<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah extends CI_Model
{
    //biar bisa panggil variable table
    private $table = "formulir_monitoring_pelaksaan_ppi_dikamar_jenazah";
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
        $this->db->where('id_pelaksanaan_ppi',$where);
        return $this->db->get($this->table);
    }

    public function update($where,$data){
        $this->db->where($where);
        $this->db->update($this->table, $data);
    }
}

=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah extends CI_Model
{
    //biar bisa panggil variable table
    private $table = "formulir_monitoring_pelaksaan_ppi_dikamar_jenazah";
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
        $this->db->where('id_pelaksanaan_ppi',$where);
        return $this->db->get($this->table);
    }

    public function update($where,$data){
        $this->db->where($where);
        $this->db->update($this->table, $data);
    }
}

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
