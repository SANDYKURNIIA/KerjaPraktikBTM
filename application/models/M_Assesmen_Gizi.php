<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Assesmen_Gizi extends CI_Model
{
    private $table = 'erm_assesmen_gizi';

    /** ====== CRUD GIZI ====== */
    public function getByPelayanan($id_pelayanan, $id_histori)
    {
        return $this->db->get_where($this->table, [
            'id_pelayanan' => $id_pelayanan,
            'id_histori'   => $id_histori,
        ])->row();
    }

    public function insert($data)
    {
        $ok = $this->db->insert($this->table, $data);
        return $ok ? $this->db->insert_id() : false;
    }

    public function update($id_pelayanan, $id_histori, $data)
    {
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_histori', $id_histori);
        return $this->db->update($this->table, $data);
    }

    public function exists($id_pelayanan, $id_histori)
    {
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_histori', $id_histori);
        return $this->db->count_all_results($this->table) > 0;
    }

    /**
     * ====== HEADER JOIN ======
     * Ambil field:
     * - no_rm            : dari pelayanan.id_pasien (diasumsikan berisi no_rm)
     * - nama             : pasien.nama
     * - jenis_kelamin    : pasien.jenis_kelamin
     * - tgl_lahir        : pasien.tgl_lahir
     * - tgl_masuk        : pelayanan.tgl_masuk  (HANYA ini, sesuai permintaan)
     * - dokter_merawat_id: history_pelayanan.dpjp
     * - nama_dokter      : dokter.nama
     */
    public function selectHeaderById($id_pelayanan, $id_histori)
    {
        $this->db->select("pl.*, hp.*, p.*, hp.*, d.nama as nama_dokter, d.id_dokter as id_dokter_merawat");
        $this->db->from('history_pelayanan hp, pelayanan pl, pasien p, dokter d');
        $this->db->where('pl.id_pelayanan', $id_pelayanan);
        $this->db->where('d.id_dokter = hp.dpjp');
        return $this->db->get()->row();
    }

    public function getRuangKelasByHistori($id_histori)
{
    return $this->db->select('r.tipe AS ruang, r.kelas AS kelas')
        ->from('history_pelayanan_ranap hpr')
        ->join('ruangan r', 'r.id_ruangan = hpr.id_kamar', 'left') // << id_kamar nyambung ke id_ruangan
        ->where('hpr.id_history', $id_histori)                    // << kolomnya id_history (pakai y)
        ->limit(1)
        ->get()
        ->row();
}


}