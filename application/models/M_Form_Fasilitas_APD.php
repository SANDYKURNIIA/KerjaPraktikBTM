<<<<<<< HEAD
<?php

class M_Form_Fasilitas_APD extends CI_Model{
    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }

    private $table = "form_fasilitas_apd";


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
    

=======
<?php

class M_Form_Fasilitas_APD extends CI_Model{
    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }

    private $table = "form_fasilitas_apd";


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
    

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
}