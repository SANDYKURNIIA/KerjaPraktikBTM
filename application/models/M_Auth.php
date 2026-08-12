<<<<<<< HEAD
<?php
    class M_Auth extends CI_Model
    {
        public function getData($username)
        {
            $this->db->select('*');
            $this->db->where('username',$username);
            return $this->db->get('staff')->row();
        }
        function getStaffByToken($token)
        {
            return $this->db->get_where('staff', ['token' => $token])->row_array();
        }
    }

?>
=======
<?php
    class M_Auth extends CI_Model
    {
        public function getData($username)
        {
            $this->db->select('*');
            $this->db->where('username',$username);
            return $this->db->get('staff')->row();
        }
        function getStaffByToken($token)
        {
            return $this->db->get_where('staff', ['token' => $token])->row_array();
        }
    }

?>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
