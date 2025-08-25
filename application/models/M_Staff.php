<?php

    class M_Staff extends CI_Model
    {

        function update_token($data, $token)
        {
            $this->db->where('token', $token);
            $this->db->update('staff', $data);
        }

        public function updateAkun($where, $data, $table){
            $this->db->where($where);
            $this->db->update($table,$data);
        }

        function get_staffByUsername($username)
        {
            return $this->db->get_where('staff', array('username' => $username, 'status' => 'aktif'))->result();
        }

        function get_staffByUsername2($username)
        {
            return $this->db->get_where('staff', array('username' => $username, 'status' => 'aktif'))->result();
        }
    }
?>