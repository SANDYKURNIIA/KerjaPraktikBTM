<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Lembar_uji_fungsi extends CI_Model
{
    protected $table = 'lembar_uji_fungsi';

    /** Pasien + pelayanan + dpjp (nama dokter) + tgl_pemeriksaan */
    public function get_pasien_pelayanan_dpjp($no_rm, $id_pelayanan, $id_history = null)
    {
        $this->db->select("
            p.no_rm, p.nama, p.jenis_kelamin, p.alamat, p.no_hp, p.tgl_lahir,
            pel.tgl_masuk AS tgl_pemeriksaan, pel.id_pelayanan,
            hp.id_history, hp.dpjp,
            d.nama AS dpjp_nama
        ");
        $this->db->from('pasien p');
        $this->db->join('pelayanan pel', 'pel.id_pasien = p.no_rm AND pel.id_pelayanan = ' . $this->db->escape($id_pelayanan), 'inner');
        $this->db->join('history_pelayanan hp', 'hp.id_pelayanan = pel.id_pelayanan', 'left');
        $this->db->join('dokter d', 'd.id_dokter = hp.dpjp', 'left');
        $this->db->where('p.no_rm', $no_rm);
        $this->db->where('pel.id_pelayanan', $id_pelayanan);

        if ($id_history) {
            $this->db->where('hp.id_history', $id_history);
        }

        // utamakan history aktif & terbaru
        $this->db->order_by('hp.status', 'DESC');
        $this->db->order_by('hp.tgl_masuk', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    /** Diagnosa Fungsional by visit */
    public function get_diagnosa_fungsi($id_pelayanan, $id_history)
    {
        if (empty($id_history))
            return '';
        $this->db->select('GROUP_CONCAT(nama_diagnosa ORDER BY tanggal SEPARATOR ", ") AS diagnosa');
        $this->db->from('fr_diagnosa_fungsi');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_history', $id_history);
        $row = $this->db->get()->row();
        return $row ? $row->diagnosa : '';
    }

    /** Diagnosa Medis by visit */
    public function get_diagnosa_medis($id_pelayanan, $id_history)
    {
        if (empty($id_history))
            return '';
        $this->db->select('GROUP_CONCAT(nama_diagnosa ORDER BY tanggal SEPARATOR ", ") AS diagnosa');
        $this->db->from('fr_diagnosa_medis');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_history', $id_history);
        $row = $this->db->get()->row();
        return $row ? $row->diagnosa : '';
    }

    /** Ambil lembar by composite key */
    public function get_lembar($id_pelayanan, $id_history)
    {
        return $this->db->get_where($this->table, [
            'id_pelayanan' => $id_pelayanan,
            'id_history' => $id_history
        ])->row();
    }

    /** Simpan atau update lembar */
    public function simpan_update($data)
    {
        $exist = $this->db->get_where($this->table, [
            'id_pelayanan' => $data['id_pelayanan'],
            'id_history' => $data['id_history']
        ])->row();

        if ($exist) {
            $this->db->where('id', $exist->id);
            $ok = $this->db->update($this->table, $data);
            if (!$ok) {
                $err = $this->db->error();
                return ['ok' => false, 'action' => 'update', 'error' => $err];
            }
            return ['ok' => true, 'action' => 'update', 'error' => null];
        } else {
            $ok = $this->db->insert($this->table, $data);
            if (!$ok) {
                $err = $this->db->error();
                return ['ok' => false, 'action' => 'insert', 'error' => $err];
            }
            return ['ok' => true, 'action' => 'insert', 'error' => null];
        }
    }
}