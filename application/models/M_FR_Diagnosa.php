<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_FR_Diagnosa extends CI_Model
{
    private $tbl_medis  = 'fr_diagnosa_medis';
    private $tbl_fungsi = 'fr_diagnosa_fungsi';
    private $tbl_master = 'list_diagnosa';

    /* ===== Helper: ambil nama diagnosa dari master bila perlu ===== */
    private function get_nama_by_kode($kode)
    {
        $row = $this->db->get_where($this->tbl_master, ['id_diagnosa' => $kode])->row();
        return $row ? $row->nama_diagnosa : null;
    }

    /* ===== List (dengan fallback COALESCE supaya nama pasti muncul) ===== */
    public function list_medis($id_pelayanan, $id_history)
    {
        $this->db->select(
            'm.no_diagnosa, m.kode, COALESCE(m.nama_diagnosa, ld.nama_diagnosa) AS nama_diagnosa, m.tanggal',
            false
        );
        $this->db->from($this->tbl_medis . ' m');
        $this->db->join($this->tbl_master . ' ld', 'ld.id_diagnosa = m.kode', 'left');
        $this->db->where('m.id_pelayanan', $id_pelayanan);
        $this->db->where('m.id_history',   $id_history);
        $this->db->order_by('m.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function list_fungsi($id_pelayanan, $id_history)
    {
        $this->db->select(
            'f.no_diagnosa, f.kode, COALESCE(f.nama_diagnosa, ld.nama_diagnosa) AS nama_diagnosa, f.tanggal',
            false
        );
        $this->db->from($this->tbl_fungsi . ' f');
        $this->db->join($this->tbl_master . ' ld', 'ld.id_diagnosa = f.kode', 'left');
        $this->db->where('f.id_pelayanan', $id_pelayanan);
        $this->db->where('f.id_history',   $id_history);
        $this->db->order_by('f.tanggal', 'desc');
        return $this->db->get()->result();
    }

    /* ===== Insert (pastikan nama_diagnosa ikut tersimpan) ===== */
    public function add_medis($data)
    {
        if (empty($data['nama_diagnosa'])) {
            $data['nama_diagnosa'] = $this->get_nama_by_kode($data['kode']);
        }
        $row = [
            'id_pelayanan'  => $data['id_pelayanan'],
            'id_history'    => $data['id_history'],
            'kode'          => $data['kode'],
            'nama_diagnosa' => $data['nama_diagnosa'],
            'tanggal'       => date('Y-m-d H:i:s'),
            'id_staff'      => $data['id_staff'] ?? null,
        ];
        return $this->db->insert($this->tbl_medis, $row);
    }

    public function add_fungsi($data)
    {
        if (empty($data['nama_diagnosa'])) {
            $data['nama_diagnosa'] = $this->get_nama_by_kode($data['kode']);
        }
        $row = [
            'id_pelayanan'  => $data['id_pelayanan'],
            'id_history'    => $data['id_history'],
            'kode'          => $data['kode'],
            'nama_diagnosa' => $data['nama_diagnosa'],
            'tanggal'       => date('Y-m-d H:i:s'),
            'id_staff'      => $data['id_staff'] ?? null,
        ];
        return $this->db->insert($this->tbl_fungsi, $row);
    }

    /* ===== Delete ===== */
    public function delete_medis($no_diagnosa)
    {
        return $this->db->delete($this->tbl_medis, ['no_diagnosa' => $no_diagnosa]);
    }

    public function delete_fungsi($no_diagnosa)
    {
        return $this->db->delete($this->tbl_fungsi, ['no_diagnosa' => $no_diagnosa]);
    }
}
