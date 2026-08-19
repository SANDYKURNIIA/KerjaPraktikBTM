<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pemantauan_hd extends CI_Model
{
    private $table = 'pemantauan_hd_harian';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data_pemantauan_hd($no_rm, $id_pelayanan = null, $id_history = null)
    {
        $this->db
            ->select('
            pemantauan_hd_harian.id,
            pemantauan_hd_harian.no_rm,
            pemantauan_hd_harian.id_pelayanan,
            pemantauan_hd_harian.id_history,
            pemantauan_hd_harian.tgl_simpan,
            pasien.nama as nama_pasien,
            pelayanan.tgl_masuk
        ')
            ->from('pemantauan_hd_harian')

            ->join('pasien', 'pasien.no_rm = pemantauan_hd_harian.no_rm', 'left')
            ->join('pelayanan', 'pelayanan.id_pelayanan = pemantauan_hd_harian.id_pelayanan', 'left')

            ->where('pasien.no_rm', $no_rm);

        // ->where('pemantauan_hd_harian.id_pelayanan', $id_pelayanan)
        return $this->db
            ->order_by('pemantauan_hd_harian.tgl_simpan', 'DESC')
            ->get()
            ->result();
    }

    public function get_by_id($id)
    {
        return $this->db
            ->select('pemantauan_hd_harian.*, pasien.nama, pelayanan.tgl_masuk')
            ->from('pemantauan_hd_harian')
            ->join('pelayanan', 'pelayanan.id_pelayanan = pemantauan_hd_harian.id_pelayanan', 'left')
            ->join('pasien', 'pasien.no_rm = pelayanan.id_pasien', 'left')
            ->where('pemantauan_hd_harian.id', $id)
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
