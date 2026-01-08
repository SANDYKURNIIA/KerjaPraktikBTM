<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Lembar_konsul extends CI_Model
{
    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function get_data_form_awal($id_history)
    {
        $this->db->select("d.nama_diagnosa,d.kode, f.terapi, f.riwayat, f.keluhan");
        $this->db->from("diagnosa_utama d, form_assesmen_dokter f");
        $this->db->where("f.id_history", $id_history);
        $this->db->where("d.id_history", $id_history);
        return $this->db->get()->row();
    }

    public function get_form_lembar_rujukan_by_pelayanan($id_pelayanan)
    {
        $this->db->select("f.*, l.nama_panjang AS nama_poli, d.nama AS nama_dokter, p.nama, p.tgl_lahir");
        $this->db->from("form_lembar_rujukan f");
        $this->db->join("list_poli l", "f.id_list_poli = l.id_list_poli", "left");
        $this->db->join("dokter d", "f.id_dokter = d.id_dokter", "left");
        $this->db->join("pasien p", "f.no_rm = p.no_rm", "left");
        $this->db->where("f.id_pelayanan", $id_pelayanan);
        $this->db->where("f.status", 1);

        return $this->db->get()->result();
    }
    public function get_form_lembar_rujukan_by_pelayanan_for_dokter($id_pelayanan, $id_dokter)
    {
        $this->db->select("f.*, l.nama_panjang AS nama_poli, d.nama AS nama_dokter, p.nama, p.tgl_lahir");
        $this->db->from("form_lembar_rujukan f");
        $this->db->join("list_poli l", "f.id_list_poli = l.id_list_poli", "left");
        $this->db->join("dokter d", "f.id_dokter = d.id_dokter", "left");
        $this->db->join("pasien p", "f.no_rm = p.no_rm", "left");
        $this->db->where("f.id_pelayanan", $id_pelayanan);
        $this->db->where("f.id_dokter", $id_dokter);
        $this->db->where("f.status", 1);

        return $this->db->get()->result();
    }

    public function get_form_lembar_rujukan_by_id_form($id_form)
    {
        $this->db->select("
        f.*, 
        l.nama_panjang AS nama_poli, 
        d_tujuan.nama AS dokter_tujuan, 
        d_pengirim.nama AS dokter_pengirim, d_pengirim.foto as ttd_dokter_pengirim,
        p.nama AS nama_pasien, 
        p.tgl_lahir
    ");
        $this->db->from("form_lembar_rujukan f");
        $this->db->join("list_poli l", "f.id_list_poli = l.id_list_poli", "left");
        $this->db->join("dokter d_tujuan", "f.id_dokter = d_tujuan.id_dokter", "left");
        $this->db->join("history_pelayanan h", "f.id_history = h.id_history", "left");
        $this->db->join("dokter d_pengirim", "h.dpjp = d_pengirim.id_dokter", "left");
        $this->db->join("pasien p", "f.no_rm = p.no_rm", "left");
        $this->db->where("f.id_form_lembar_rujukan", $id_form);

        return $this->db->get()->row();
    }

    public function tambah_history_rujukan($data)
    {
        return $this->db->insert('history_pelayanan', $data);
    }

    public function hapus_lembar_konsul($id_lembar_konsul, $keterangan_input)
    {
        $lembar = $this->db->get_where('form_lembar_rujukan', [
            'id_form_lembar_rujukan' => $id_lembar_konsul
        ])->row();

        if (!$lembar) {
            return [
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ];
        }

        $id_history = $lembar->id_history_form;

        // Simpan keterangan dari user
        $update_data_form = [
            'status' => 0,
            'keterangan' => $keterangan_input,
            'tanggal_hapus' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id_form_lembar_rujukan', $id_lembar_konsul);
        $this->db->update('form_lembar_rujukan', $update_data_form);

        // Update history
        $update_data = [
            'status' => 0,
            'ket' => $lembar->staff,
            'tgl_hapus' => date('Y-m-d H:i:s')
        ];

        $this->db->where(['id_history' => $id_history, 'status' => 1]);
        $this->db->update('history_pelayanan', $update_data);

        return [
            'status' => true,
            'message' => 'Berhasil menghapus data'
        ];
    }

    public function get_all_diagnosa()
    {
        $this->db->select('id_diagnosa,nama_diagnosa');
        $this->db->from('list_diagnosa');
        return $this->db->get()->result();
    }

    public function get_dokter_aktif()
    {
        return $this->db
            ->where('status', 'AKTIF')
            ->order_by('nama', 'ASC')
            ->get('dokter')
            ->result();
    }

    public function get_list_poli_ada()
    {
        return $this->db
            ->where('status_dokter', 'ADA')
            ->order_by('nama_panjang', 'ASC')
            ->get('list_poli')
            ->result();
    }
}