<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_robson extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Ambil data Robson berdasarkan id_pelayanan dan id_histori
     */
    public function get_data($id_pelayanan, $id_histori)
    {
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_histori', $id_histori);
        $query = $this->db->get('erm_robson');
        $result = $query->row_array();
        return $result ? $result : [];
    }
    public function get_list_dpjp()
    {
        return $this->db->select('id_dokter, nama')
            ->from('dokter')
            ->where('dokter_spes !=', 'UMU')
            ->where('status', 'AKTIF')
            ->order_by('nama', 'ASC')
            ->get()
            ->result();
    }
    /**
     * Simpan atau update data Robson
     * @param array $data
     * @return bool
     */
    public function save($data)
    {
        // Cek apakah sudah ada
        $existing = $this->get_data($data['id_pelayanan'], $data['id_histori']);

        if ($existing) {
            // Update: jangan ubah id, created_at
            unset($data['id']);
            unset($data['created_at']);
            $this->db->where('id_pelayanan', $data['id_pelayanan']);
            $this->db->where('id_histori', $data['id_histori']);
            $result = $this->db->update('erm_robson', $data);
        } else {
            // Insert: biarkan created_at otomatis dari database
            unset($data['id']);
            $result = $this->db->insert('erm_robson', $data);
        }

        // Cek apakah ada error
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            // Jika tidak ada perubahan, mungkin data sama persis, tetap dianggap sukses
            // Tapi kita cek error
            $error = $this->db->error();
            if ($error['code'] == 0) {
                return TRUE; // Tidak ada error, mungkin data sama
            } else {
                return FALSE;
            }
        }
    }
}