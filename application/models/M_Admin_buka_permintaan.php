<?php

class M_Admin_buka_permintaan extends CI_Model{

    public function selectUnit(){
        return $this->db->get('admin_logistik_farmasi')->result();
    }

        //Update

     
    public function update_unit($where,$page_data,$table){
        $this->db->where($where);
        $this->db->update($table,$page_data);
    }	


}

?>
