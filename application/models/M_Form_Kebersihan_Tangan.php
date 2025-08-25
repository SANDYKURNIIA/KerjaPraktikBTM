<?php

class M_Form_Kebersihan_Tangan extends CI_Model{
    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }

    private $table = "form_kebersihan_tangan";


    public function insert($data){
        $this->db->insert($this->table, $data);
    }

    public function update($id,$data){
        $this->db->where(array("id_form" => $id));
        $this->db->update($this->table, $data);
    }

    public function delete($where) {
        return $this->db->delete($this->table, array("id_form" => $where));
    }

    public function getAll(){
        $this->db->select("*");
        $this->db->order_by("tgl_input desc");
        return $this->db->get($this->table)->result();
    }
    
}