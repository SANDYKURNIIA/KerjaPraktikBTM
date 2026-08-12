<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_FisikRehab extends CI_Model
{
    private $table = 'fr_rj_form';

    public function get_by_visit($id_pelayanan, $id_history)
    {
        return $this->db->get_where($this->table, [
            'id_pelayanan' => $id_pelayanan,
            'id_history'   => $id_history
        ])->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_by_visit($data)
    {
        $this->db->where('id_pelayanan', $data['id_pelayanan']);
        $this->db->where('id_history',   $data['id_history']);
        return $this->db->update($this->table, $data);
    }

    
}