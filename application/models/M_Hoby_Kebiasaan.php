<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Hoby_Kebiasaan extends CI_Model
{
    private $table = 'hoby_kebiasaan';

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id_mcu, $data)
    {
        return $this->db->update($this->table, $data, ['id_mcu' => $id_mcu]);
    }

    public function getById($id_mcu)
    {
        return $this->db->get_where($this->table, ['id_mcu' => $id_mcu])->row_array();
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    // 🔹 Join dengan tabel mcu untuk dapatkan data pasien + hoby_kebiasaan
    public function getWithMcuById($id_mcu)
    {
        $this->db->select('mcu.id_mcu, mcu.no_rm, mcu.nama_pasien, mcu.tanggal, hoby_kebiasaan.hobi, hoby_kebiasaan.hobi_lain, hoby_kebiasaan.kebiasaan, hoby_kebiasaan.kebiasaan_lain');
        $this->db->from('mcu');
        $this->db->join('hoby_kebiasaan', 'mcu.id_mcu = hoby_kebiasaan.id_mcu', 'left'); 
        $this->db->where('mcu.id_mcu', $id_mcu);
        return $this->db->get()->row_array();
    }

    // 🔹 Ambil semua data dengan join ke tabel mcu
    public function getAllWithMcu()
    {
        $this->db->select('mcu.id_mcu, mcu.no_rm, mcu.nama_pasien, mcu.tanggal, hoby_kebiasaan.hobi, hoby_kebiasaan.hobi_lain, hoby_kebiasaan.kebiasaan, hoby_kebiasaan.kebiasaan_lain');
        $this->db->from('mcu');
        $this->db->join('hoby_kebiasaan', 'mcu.id_mcu = hoby_kebiasaan.id_mcu', 'left');
        return $this->db->get()->result_array();
    }
}
