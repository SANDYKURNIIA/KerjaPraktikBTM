<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pews_Anak extends CI_Model
{
    /**
     * Ambil data pasien + data PEWS terakhir
     */
    public function selectDataPasien($id_pelayanan)
    {
        $this->db->select('
            ps.no_rm,
            ps.nama,
            ps.tgl_lahir,
            TIMESTAMPDIFF(YEAR, ps.tgl_lahir, CURDATE()) AS umur,
            ps.jenis_kelamin,
            p.id_pelayanan,
            h.id_history,
            pa.id,
            pa.perilaku,
            pa.kardiovaskular,
            pa.respirasi,
            pa.skor,
            pa.jam,
            pa.tanggal,
            pa.id_staff,
        ');
        $this->db->from('pelayanan p');
        $this->db->join('pasien ps', 'ps.no_rm = p.id_pasien', 'left');
        $this->db->join('history_pelayanan h', 'h.id_pelayanan = p.id_pelayanan', 'left');
        $this->db->join('list_poli l', 'l.id_list_poli = h.nama_poli', 'left');
        $this->db->join('pews_anak pa', 'pa.id_pelayanan = p.id_pelayanan', 'left');

        // Hanya data PEWS terakhir
        $this->db->where('p.id_pelayanan', $id_pelayanan);
        $this->db->order_by('pa.id', 'DESC');
        $this->db->limit(1);

        return $this->db->get()->row();
    }

    /**
     * Simpan atau update data PEWS Anak
     */
    public function simpanData($data)
    {
        $this->db->insert('pews_anak', $data);
        return 'insert';
    }

    //     public function simpanData($data)
    // {
    //     // Cek apakah sudah ada PEWS untuk pelayanan ini (ambil PEWS terakhir)
    //     $cek = $this->db->order_by('id', 'DESC')
    //         ->get_where('pews_anak', [
    //             'id_pelayanan' => $data['id_pelayanan']
    //         ])
    //         ->row();

    //     if ($cek) {
    //         // Jika sudah ada → update data terakhir
    //         $this->db->where('id', $cek->id);
    //         $this->db->update('pews_anak', $data);
    //         return 'update';
    //     } else {
    //         // Jika belum ada → insert data baru
    //         $this->db->insert('pews_anak', $data);
    //         return 'insert';
    //     }
    // }

    /**
     * Fungsi umum pengecekan data
     */
    public function checkData($where, $table)
    {
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('pews_anak', $data);
    }

    public function getRiwayatPews($id_pelayanan)
    {
        $this->db->select('pws.*, s.nama as nama_staff');
        $this->db->from('pews_anak pws, staff s');
        $this->db->where('pws.id_pelayanan', $id_pelayanan);
        $this->db->where('pws.id_staff = s.id_staff');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_data_pws($id)
    {
        $this->db->select('*');
        $this->db->from('pews_anak');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
    public function hapus($id)
    {
        return $this->db->delete('pews_anak', ['id' => $id]);
    }
    
}
