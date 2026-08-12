<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_PengamatanDokterHasilMcu extends CI_Model
{
    protected $table = 'pengkajian';


    public function getByPelayanan($id_pelayanan, $id_history)
    {
        return $this->db
            ->where('id_pelayanan', $id_pelayanan)
            ->where('id_history', $id_history)
            ->get($this->table)
            ->row();
    }

    public function exists($id_pelayanan, $id_history)
    {
        return $this->db
            ->where('id_pelayanan', $id_pelayanan)
            ->where('id_history', $id_history)
            ->count_all_results($this->table) > 0;
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id_pelayanan, $id_history, $data)
    {
        return $this->db
            ->where('id_pelayanan', $id_pelayanan)
            ->where('id_history', $id_history)
            ->update($this->table, $data);
    }

    public function selectHeaderById($id_pelayanan)
    {
        $this->db->select("pl.*, hp.*, p.*, hp.*, d.nama as nama_dokter, d.id_dokter as id_dokter_merawat");
        $this->db->from('history_pelayanan hp, pelayanan pl, pasien p, dokter d');
        $this->db->where('pl.id_pelayanan', $id_pelayanan);
        $this->db->where('d.id_dokter = hp.dpjp');
        return $this->db->get()->row();
    }
}