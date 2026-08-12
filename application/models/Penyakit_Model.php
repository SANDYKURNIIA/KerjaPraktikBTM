<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit_model extends CI_Model {
    private $table = 'penyakit_pasien';

    public function insert_penyakit_batch($data) {
        if (!empty($data)) {
            $insert = $this->db->insert_batch($this->table, $data);
            if (!$insert) {
                // Log error ke file log CI
                log_message('error', 'Insert Batch Gagal: ' . $this->db->last_query());
                log_message('error', 'DB Error: ' . print_r($this->db->error(), true));
            } else {
                // Log query sukses
                log_message('info', 'Insert Batch Sukses: ' . $this->db->last_query());
            }
            return $insert;
        }
        log_message('error', 'Data kosong, tidak ada yang diinsert.');
        return false;
    }

    public function delete_by_mcu($id_mcu) {
        $delete = $this->db->delete($this->table, ['id_mcu' => $id_mcu]);
        if (!$delete) {
            log_message('error', 'Delete Gagal: ' . $this->db->last_query());
            log_message('error', 'DB Error: ' . print_r($this->db->error(), true));
        } else {
            log_message('info', 'Delete Sukses: ' . $this->db->last_query());
        }
        return $delete;
    }
}
