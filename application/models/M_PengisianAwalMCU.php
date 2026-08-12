<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_PengisianAwalMCU extends CI_Model
{
    /**
     * Ambil data pasien dan data pengisian awal MCU
     */
    public function selectDataPasien($id_pelayanan)
    {
        $this->db->select('
            ps.no_rm,
            ps.nama,
            ps.tgl_lahir,
            TIMESTAMPDIFF(YEAR, ps.tgl_lahir, CURDATE()) AS umur,
            ps.goldar,
            p.diagnosa,
            pam.id_pelayanan,
            pam.catatan_khusus,
            pam.masalah_medis,
            pam.enteral,
            pam.parenteral,
            pam.pemeriksaan,
            pam.dokter1,
            pam.dokter2,
            pam.dokter3,
            pam.dokter4,
            pam.vena_perifer1,
            pam.vena_perifer2,
            pam.cvc,
            pam.trakeal_tube,
            pam.katheter_urine,
            pam.urine_bag,
            pam.ngt,
            pam.wsd
        ');
        $this->db->from('pelayanan p');
        $this->db->join('pasien ps', 'ps.no_rm = p.id_pasien', 'left');
        $this->db->join('history_pelayanan h', 'h.id_pelayanan = p.id_pelayanan', 'left');
        $this->db->join('list_poli l', 'l.id_list_poli = h.nama_poli', 'left');
        $this->db->join('pengisianawalmcu pam', 'pam.no_rm = ps.no_rm', 'left');
        $this->db->where('p.id_pelayanan', $id_pelayanan);

        return $this->db->get()->row();
    }

    /**
     * Simpan atau update data Pengisian Awal MCU
     */
    public function simpanData($data)
    {
        // Cek apakah sudah ada data untuk id_pelayanan yang sama
        $cek = $this->db->get_where('pengisianawalmcu', [
            'no_rm' => $data['no_rm']
        ])->row();

        if ($cek) {
            // Jika sudah ada → update data
            $this->db->where('no_rm', $data['no_rm']);
            $this->db->update('pengisianawalmcu', $data);
            return 'update';
        } else {
            // Jika belum ada → insert data baru
            $this->db->insert('pengisianawalmcu', $data);
            return 'insert';
        }
    }

    public function checkData($where, $table)
    {
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->row_array();
    }
}
