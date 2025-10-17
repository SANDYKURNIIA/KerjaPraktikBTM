<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_assesmen_rehab extends CI_Model
{
    /**
     * Ambil data lengkap pasien + pelayanan + histori untuk assesmen rehab.
     * Jika id_histori = 0, maka ambil hanya berdasarkan id_pelayanan.
     */
    public function getDataAssesmenRehab($id_pelayanan, $id_histori = 0)
    {
        $this->db->select('
            p.id_pasien,
            p.nama AS nama_pasien,
            p.no_rm,
            p.tanggal_lahir AS tanggal_lahir,
            p.jenis_kelamin,
            p.alamat,
            d.nama AS nama_dokter,  -- sesuai struktur tabel dokter (kolomnya "nama")
            pr.nama_poli,
            pl.id_pelayanan,
            h.id_history            -- sesuaikan dengan tabel sebenarnya: history_pelayanan
        ');
        $this->db->from('pelayanan pl');
        $this->db->join('pasien p', 'p.id_pasien = pl.id_pasien', 'left');
        $this->db->join('dokter d', 'd.id_dokter = pl.id_dokter', 'left');
        $this->db->join('poli pr', 'pr.id_poli = pl.id_poli', 'left');
        $this->db->join('history_pelayanan h', 'h.id_pelayanan = pl.id_pelayanan', 'left');

        // Jika id_histori dikirim dan bukan nol
        if (!empty($id_histori) && $id_histori > 0) {
            $this->db->where('h.id_history', $id_histori);
        }

        $this->db->where('pl.id_pelayanan', $id_pelayanan);

        return $this->db->get()->row();
    }

    /**
     * Simpan data assesmen baru.
     * Mengembalikan ID insert terakhir jika sukses, false jika gagal.
     */
    public function insertAssesmen($data)
    {
        if (empty($data['id_pelayanan'])) {
            log_message('error', 'Insert gagal: id_pelayanan kosong.');
            return false;
        }

        $this->db->insert('assesmen_rehab', $data);
        return $this->db->insert_id();
    }

    /**
     * Update data assesmen berdasarkan ID assesmen.
     */
    public function updateAssesmen($id_assesmen, $data)
    {
        if (empty($id_assesmen)) {
            log_message('error', 'Update gagal: id_assesmen kosong.');
            return false;
        }

        $this->db->where('id_assesmen', $id_assesmen);
        $data['updated_at'] = date('Y-m-d H:i:s');

        return $this->db->update('assesmen_rehab', $data);
    }

    /**
     * Ambil data assesmen berdasarkan id_pelayanan dan id_histori.
     * Jika id_histori = 0, maka hanya berdasarkan id_pelayanan.
     */
    public function getAssesmenByPelayanan($id_pelayanan, $id_histori = 0)
    {
        $this->db->from('assesmen_rehab');

        $this->db->where('id_pelayanan', $id_pelayanan);
        if (!empty($id_histori) && $id_histori > 0) {
            $this->db->where('id_histori', $id_histori);
        }

        $this->db->order_by('id_assesmen', 'DESC');
        $this->db->limit(1);

        return $this->db->get()->row();
    }

    /**
     * Ambil data assesmen berdasarkan nomor rekam medis (no_rm).
     */
    public function getAssesmenByNoRM($no_rm)
    {
        $this->db->select('
            ar.*,
            p.nama AS nama_pasien,
            p.jenis_kelamin,
            p.tanggal_lahir,
            p.no_rm,
            p.alamat
        ');
        $this->db->from('assesmen_rehab ar');
        $this->db->join('pasien p', 'p.no_rm = ar.no_rm', 'left');
        $this->db->where('ar.no_rm', $no_rm);

        return $this->db->get()->row();
    }

    /**
     * Ambil data assesmen berdasarkan id_histori (untuk halaman print/preview).
     * Jika kolom ttd kosong, maka ambil dari tabel dokter.foto
     */
public function getAssesmenByHistori($id_histori)
{
    $this->db->select('
        ar.*,
        p.nama AS nama_pasien,
        p.jenis_kelamin,
        p.tanggal_lahir,
        p.alamat,
        p.no_rm,
        d.nama AS nama_dokter,
        d.foto AS ttd_dokter
    ');
    $this->db->from('assesmen_rehab ar');
    $this->db->join('pasien p', 'p.no_rm = ar.no_rm', 'left');
    $this->db->join('history_pelayanan h', 'h.id_history = ar.id_histori', 'left');
    $this->db->join('dokter d', 'd.id_dokter = h.dpjp', 'left');
    $this->db->where('ar.id_histori', $id_histori);

    $result = $this->db->get()->row();

    // Jika tidak ditemukan, kembalikan null biar controller bisa tangani error
    if (!$result) {
        log_message('error', 'Data assesmen tidak ditemukan untuk ID histori: ' . $id_histori);
        return null;
    }

    // Pastikan path ttd dokter sesuai base_url
    if (!empty($result->ttd_dokter) && !file_exists(FCPATH . $result->ttd_dokter)) {
        $result->ttd_dokter = null; // hilangkan jika file tidak ada
    }

    return $result;
}
    
    /**
     * Hapus data assesmen berdasarkan ID.
     */
    public function deleteAssesmen($id_assesmen)
    {
        if (empty($id_assesmen)) {
            log_message('error', 'Delete gagal: id_assesmen kosong.');
            return false;
        }

        return $this->db->delete('assesmen_rehab', ['id_assesmen' => $id_assesmen]);
    }

    public function get_by_histori($id_histori)
    {
        return $this->db->get_where('assesmen_rehab', ['id_histori' => $id_histori])->row();
    }
}

