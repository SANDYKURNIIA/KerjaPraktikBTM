<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Medikasi_pasien_icu extends CI_Model
{
    private $table = 'formulir_medikasi_pasien_icu';
    private $pk    = 'id_medikasi';

    /**
     * Insert satu record
     * @param array $data
     * @return bool
     */
    public function insert(array $data)
    {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Ambil data per pelayanan dan history, urut terbaru
     * @param mixed $id_pelayanan
     * @param mixed $id_history
     * @return array
     */
    public function getByPelayanan($id_pelayanan, $id_history)
    {
        $this->db->from($this->table);
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_history', $id_history);

        // Urutkan dulu berdasarkan tanggal lalu id sebagai penentu stabil
        $this->db->order_by('tanggal', 'DESC');
        $this->db->order_by($this->pk, 'DESC');

        return $this->db->get()->result();
    }

    /**
     * Ambil satu record by id
     * @param mixed $id
     * @return object|null
     */
    public function getById($id)
    {
        $id = is_numeric($id) ? (int)$id : $id;

        $q = $this->db->get_where($this->table, [$this->pk => $id], 1);
        $r = $q->row();

        if ($r && isset($r->tanggal) && !empty($r->tanggal)) {
            $ts = strtotime($r->tanggal);
            if ($ts !== false) {
                $r->tanggal = date('Y-m-d', $ts);
            }
        }

        return $r ?: null;
    }

    /**
     * Update satu record by id
     * @param mixed $id
     * @param array $data
     * @return bool
     */
    public function update($id, array $data)
    {
        $id = is_numeric($id) ? (int)$id : $id;

        $this->db->where($this->pk, $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Hapus satu record by id
     * @param mixed $id
     * @return bool
     */
    public function delete($id)
    {
        $id = is_numeric($id) ? (int)$id : $id;

        return $this->db->delete($this->table, [$this->pk => $id]);
    }
}
