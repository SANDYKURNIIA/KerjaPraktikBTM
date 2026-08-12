<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_status_respirasi extends CI_Model
{
    protected $table = 'status_respirasi';

    public function get_by_id($id_pelayanan, $id_history)
    {
        $row = $this->db
            ->where('id_pelayanan', $id_pelayanan)
            ->where('id_history', $id_history)
            ->get($this->table)
            ->row_array();

        if (!$row) return null;

        $row['pola_angka'] = [];

        if (!empty($row['json_pola_angka'])) {
            $decoded = json_decode($row['json_pola_angka'], true);
            if (is_array($decoded)) {
                $row['pola_angka'] = $decoded;
            }
        }

        return $row;
    }

    private function exists($id_pelayanan, $id_history)
    {
        return $this->db
            ->where('id_pelayanan', $id_pelayanan)
            ->where('id_history', $id_history)
            ->count_all_results($this->table) > 0;
    }

    public function save_or_update($data)
    {
        if (empty($data['id_pelayanan']) || empty($data['id_history'])) {
            return false;
        }

        if ($this->exists($data['id_pelayanan'], $data['id_history'])) {
            return $this->db
                ->where('id_pelayanan', $data['id_pelayanan'])
                ->where('id_history', $data['id_history'])
                ->update($this->table, $data);
        }

        return $this->db->insert($this->table, $data);
    }
}
