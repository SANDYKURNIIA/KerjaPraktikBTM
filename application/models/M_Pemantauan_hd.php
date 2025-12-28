<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pemantauan_hd extends CI_Model
{
    private $table = 'pemantauan_hd_harian';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data_pemantauan_hd($id_pelayanan, $id_history)
    {
        return $this->db->from($this->table)
            ->where('id_pelayanan', $id_pelayanan)
            ->where('id_history', $id_history)
            ->get()
            ->row();
    }

    public function insert($data)
    {
        if (empty($data))
            return false;

        $this->db->insert($this->table, $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function update($id_pelayanan, $id_history, $data)
    {
        if (empty($data))
            return false;

        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_history', $id_history);
        $this->db->update($this->table, $data);

        return ($this->db->affected_rows() >= 0);
    }
}
