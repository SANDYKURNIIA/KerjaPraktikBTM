<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_status_respirasi extends CI_Model
{
    protected $table = 'status_respirasi';

    public function __construct()
    {
        parent::__construct();
    }

    /** Ambil data berdasarkan id_pelayanan & id_history */
    public function get_by_id($id_pelayanan, $id_history)
    {
        return $this->db->where('id_pelayanan', $id_pelayanan)
                        ->where('id_history', $id_history)
                        ->get($this->table)
                        ->row_array();
    }

    /** Cek apakah data sudah ada */
    public function exists($id_pelayanan, $id_history)
    {
        return $this->db->where('id_pelayanan', $id_pelayanan)
                        ->where('id_history', $id_history)
                        ->count_all_results($this->table) > 0;
    }

    /** Insert data baru */
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    /** Update data berdasarkan id_pelayanan & id_history */
    public function update($data, $id_pelayanan, $id_history)
    {
        return $this->db->where('id_pelayanan', $id_pelayanan)
                        ->where('id_history', $id_history)
                        ->update($this->table, $data);
    }

    /** Upsert: simpan baru jika belum ada, update kalau sudah ada */
    public function save_or_update($data)
    {
        $id_pelayanan = $data['id_pelayanan'] ?? null;
        $id_history   = $data['id_history'] ?? null;
        if (!$id_pelayanan || !$id_history) return false;

        $exists = $this->exists($id_pelayanan, $id_history);
        if ($exists) {
            return $this->update($data, $id_pelayanan, $id_history);
        } else {
            return $this->insert($data);
        }
    }
}
