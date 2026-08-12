<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan_tindakan_kebidanan extends CI_Model
{
    public function getPenolong()
    {
        $this->db->select('id_staff, nama');
        $this->db->from('staff');
        $this->db->where('tipe', 'rawatinap');
        $this->db->where('status', 'aktif');

        return $this->db->get()->result();
    }

    public function getStaffById($id)
    {
        return $this->db->get_where('staff', ['id_staff' => $id])->row();
    }

    public function insertData($data)
    {
        return $this->db->insert('laporan_tindakan_kebidanan', $data);
    }

    public function updateByPelayanan($id_pelayanan, $data)
    {
        return $this->db
            ->where('id_pelayanan', $id_pelayanan)
            ->update('laporan_tindakan_kebidanan', $data);
    }

    public function getDataLaporan()
    {
        $this->db->select('
        l.*,
        p.nama as nama_penolong,
        a.nama as nama_asisten
    ');
        $this->db->from('laporan_tindakan_kebidanan l');
        $this->db->join('staff p', 'p.id_staff = l.penolong', 'left');
        $this->db->join('staff a', 'a.id_staff = l.asisten', 'left');

        return $this->db->get()->result();
    }

    public function get_by_pelayanan($id_pelayanan)
    {
        return $this->db
            ->where('id_pelayanan', $id_pelayanan)
            ->get('laporan_tindakan_kebidanan')
            ->row();
    }
}
