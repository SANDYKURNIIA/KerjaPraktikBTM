<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Lembar_Monitoring extends CI_Model
{
    protected $table = 'lembar_monitoring';

    public function __construct()
    {
        parent::__construct();
    }

    // =========================
    // 🔹 SIMPAN DATA BARU
    // =========================
    public function insert(array $data)
    {
        // Validasi kolom wajib
        if (empty($data['id_staff']) || empty($data['id_pelayanan']) || empty($data['id_history'])) {
            log_message('error', 'Lembar Monitoring: ID staff / pelayanan / history kosong');
            return false;
        }

        // Pastikan tgl_input selalu ada
        if (!isset($data['tgl_input'])) {
            $data['tgl_input'] = date('Y-m-d H:i:s');
        }

        $ok = $this->db->insert($this->table, $data);

        if (!$ok) {
            log_message('error', 'DB Insert Error Lembar Monitoring: ' . print_r($this->db->error(), true));
        }

        return $ok;
    }

    // =========================
    // 🔹 UPDATE BERDASARKAN ID (UNTUK EDIT VIA AJAX)
    // =========================
    public function update_by_id($id, array $data)
    {
        if (empty($id)) return false;
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    // =========================
    // 🔹 DELETE BERDASARKAN ID
    // =========================
    public function delete_by_id($id)
    {
        if (empty($id)) return false;
        return $this->db->where('id', $id)->delete($this->table);
    }

    // =========================
    // 🔹 CEK DATA SUDAH ADA BERDASARKAN TGL & JAM
    // =========================
    public function exists($id_pelayanan, $id_history, $tanggal, $jam)
    {
        return $this->db
            ->where('id_pelayanan', $id_pelayanan)
            ->where('id_history', $id_history)
            ->where('tanggal_monitoring', $tanggal)
            ->where('jam_monitoring', $jam)
            ->count_all_results($this->table) > 0;
    }

    // =========================
    // 🔹 SIMPAN / UPDATE BERDASARKAN TGL & JAM
    // =========================
    public function save_or_update(array $data)
    {
        if (empty($data['id_pelayanan']) || empty($data['id_history']) || empty($data['tanggal_monitoring']) || empty($data['jam_monitoring'])) {
            return false;
        }

        if ($this->exists($data['id_pelayanan'], $data['id_history'], $data['tanggal_monitoring'], $data['jam_monitoring'])) {
            return $this->update_by_time($data);
        }

        return $this->insert($data);
    }

    // =========================
    // 🔹 UPDATE BERDASARKAN TGL & JAM
    // =========================
    private function update_by_time(array $data)
    {
        return $this->db
            ->where('id_pelayanan', $data['id_pelayanan'])
            ->where('id_history', $data['id_history'])
            ->where('tanggal_monitoring', $data['tanggal_monitoring'])
            ->where('jam_monitoring', $data['jam_monitoring'])
            ->update($this->table, $data);
    }

    // =========================
    // 🔹 AMBIL DATA PER HISTORY
    // =========================
    public function get_by_history($id_history)
    {
        return $this->db
            ->where('id_history', $id_history)
            ->order_by('tanggal_monitoring', 'DESC')
            ->order_by('jam_monitoring', 'DESC')
            ->get($this->table)
            ->result();
    }

    // =========================
    // 🔹 AMBIL 1 DATA BERDASARKAN ID
    // =========================
    public function get_by_id($id)
    {
        if (empty($id)) return null;
        return $this->db->where('id', $id)->get($this->table)->row();
    }
}