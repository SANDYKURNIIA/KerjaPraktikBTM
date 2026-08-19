<?php

class M_Staff extends CI_Model
{
    function update_token($data, $token)
    {
        $this->db->where('token', $token);
        $this->db->update('staff', $data);
    }

    public function updateAkun($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function get_staffByUsername($username)
    {
        return $this->db->get_where('staff', [
            'username' => $username,
            'status'   => 'aktif'
        ])->result();
    }

    function get_staffByUsername2($username)
    {
        return $this->db->get_where('staff', [
            'username' => $username,
            'status'   => 'aktif'
        ])->result();
    }

    public function getStaffNameById($id_staff)
    {
        if (!$id_staff) return null;

        $this->db->select('nama');
        $this->db->from('staff');
        $this->db->where('id_staff', $id_staff);
        $this->db->where('status', 'aktif');

        $row = $this->db->get()->row();
        return $row ? $row->nama : null;
    }
}

?>