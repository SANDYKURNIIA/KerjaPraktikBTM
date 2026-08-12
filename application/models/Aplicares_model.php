<<<<<<< HEAD
<?php
class Aplicares_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    function update_room()
    {
        $this->db->select('kodekelas,koderuang,namaruang,kapasitas,tersedia');
        return $this->db->get('v_bpjs_room')->result();
    }
    function create_room()
    {
        $this->db->select('kodekelas,koderuang,namaruang,kapasitas,tersedia,tersediapria, tersediawanita,tersediapriawanita');
        return $this->db->get('v_bpjs_room')->result();
    }
    function delete_room()
    {
        $this->db->select('kodekelas,koderuang');
        return $this->db->get('v_bpjs_room')->result();
    }
}
=======
<?php
class Aplicares_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    function update_room()
    {
        $this->db->select('kodekelas,koderuang,namaruang,kapasitas,tersedia');
        return $this->db->get('v_bpjs_room')->result();
    }
    function create_room()
    {
        $this->db->select('kodekelas,koderuang,namaruang,kapasitas,tersedia,tersediapria, tersediawanita,tersediapriawanita');
        return $this->db->get('v_bpjs_room')->result();
    }
    function delete_room()
    {
        $this->db->select('kodekelas,koderuang');
        return $this->db->get('v_bpjs_room')->result();
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
