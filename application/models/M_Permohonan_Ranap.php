<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Permohonan_Ranap extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Lembar_konsul');
        $this->load->database();
    }

    public function get_list_poli()
    {
        return $this->M_Lembar_konsul->get_list_poli_ada();
    }

    public function get_dokter()
    {
        return $this->M_Lembar_konsul->get_dokter_aktif();
    }

    public function get_ruangan()
    {
        $this->db->select('id_ruangan, nama_ruangan, tipe');
        $this->db->from('ruangan');
        // $this->db->where('status', 'AKTIF');
        return $this->db->get()->result();
    }

    public function get_ruangan_pasien($id_pelayanan)
    {
        $this->db->select('r.id_ruangan, r.nama_ruangan, r.tipe');
        $this->db->select('h.id_kamar, r.id_ruangan, r.nama_ruangan, r.tipe');
        $this->db->from('history_pelayanan_ranap h');
        $this->db->join('ruangan r', 'r.id_ruangan = h.id_kamar', 'left');
        $this->db->where('h.id_pelayanan', $id_pelayanan);
        $this->db->order_by('h.tgl_masuk', 'DESC');
        $this->db->limit(1);

        return $this->db->get()->row();
    }

    public function get_cara_bayar_pasien($id_pelayanan)
    {
        $this->db->select('cb.nama');
        $this->db->from('pelayanan p');
        $this->db->join('cara_bayar cb', 'cb.id_cara_bayar = p.cara_bayar', 'left');
        $this->db->where('p.id_pelayanan', $id_pelayanan);

        return $this->db->get()->row();
    }

    public function insert($data)
    {
        return $this->db->insert('form_permohonan_ranap', $data);
    }

    public function get_by_pelayanan($id_pelayanan)
    {
        $this->db->select('
    f.*, 
    d.nama AS nama_dokter_master, 
    p.nama_panjang AS nama_poli_master,
    r.tipe AS tipe_ruangan
');


        $this->db->from('form_permohonan_ranap f');

        $this->db->join('list_poli p', 'p.id_list_poli = f.id_list_poli', 'left');
        $this->db->join('dokter d', 'd.id_dokter = f.id_dokter', 'left');
        $this->db->join('ruangan r', 'r.id_ruangan = f.id_ruangan', 'left'); // 🔥 INI TAMBAHAN

        $this->db->where('f.id_pelayanan', $id_pelayanan);

        return $this->db->get()->row();
    }


    public function update_by_pelayanan($id_pelayanan, $data)
    {
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->update('form_permohonan_ranap', $data);
    }
}
