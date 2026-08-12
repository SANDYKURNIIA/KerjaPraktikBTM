<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_status_kesadaran_icu_model extends CI_Model
{
    protected $table = 'status_kesadaran_icu';

    // === Ambil data pasien berdasarkan id_pelayanan ===
    public function get_data_pasien($id_pelayanan)
    {
        $this->db->select('p.no_rm, p.nama, p.tgl_lahir, p.jenis_kelamin, p.alamat, d.nama as dokter');
        $this->db->from('pelayanan pel');
        $this->db->join('pasien p', 'p.no_rm = pel.id_pasien', 'left');
        $this->db->join('history_pelayanan h', 'h.id_pelayanan = pel.id_pelayanan', 'left');
        $this->db->join('dokter d', 'd.id_dokter = h.dpjp', 'left');
        $this->db->where('pel.id_pelayanan', $id_pelayanan);
        return $this->db->get()->row();
    }

    // === Ambil data status kesadaran berdasarkan id_pelayanan & id_history ===
    public function get_status_by_history($id_pelayanan, $id_history)
    {
        $this->db->select('
            id,
            tanggal,
            TIME(tgl_input) as jam,
            gcs_e,
            gcs_v,
            gcs_m,
            total_gcs,
            pupil_kanan,
            pupil_kiri,
            refleks_cahaya,
            keterangan,
            id_staff
        ');
        $this->db->from($this->table);
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_history', $id_history);
        $this->db->order_by('tanggal', 'DESC');
        $this->db->order_by('tgl_input', 'DESC');
        return $this->db->get()->result();
    }

    // === Simpan data baru (tanpa update) ===
    public function simpan_status($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // === Ambil semua data berdasarkan id_pelayanan (untuk DataTables) ===
    public function get_by_pelayanan($id_pelayanan)
    {
        $this->db->select('
            id,
            tanggal,
            TIME(tgl_input) as jam,
            gcs_e,
            gcs_v,
            gcs_m,
            total_gcs,
            pupil_kanan,
            pupil_kiri,
            refleks_cahaya,
            keterangan,
            id_staff
        ');
        $this->db->from($this->table);
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->order_by('tanggal', 'DESC');
        $this->db->order_by('jam', 'DESC');
        $this->db->order_by('tgl_input', 'DESC');
        return $this->db->get()->result();
    }

    // === Hapus data berdasarkan ID ===
    public function hapus_data($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}
