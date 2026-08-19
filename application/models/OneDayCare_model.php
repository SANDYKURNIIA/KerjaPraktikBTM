<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OneDayCare_model extends CI_Model
{

    public function selectDataPasien($id_pelayanan)
    {
        $this->db->select('
            ps.no_rm,
            ps.nama,
            ps.tgl_lahir,
            ps.jenis_kelamin,
            ps.agama,
            ps.status,
            ps.pendidikan,
            ps.pekerjaan,
            ps.alamat,
            p.tgl_masuk,
            p.tgl_keluar,
            p.diagnosa,
            l.nama_panjang AS jenis_pelayanan
        ');
        $this->db->from('pelayanan p');
        $this->db->join('pasien ps', 'ps.no_rm = p.id_pasien', 'left');
        $this->db->join('history_pelayanan h', 'h.id_pelayanan = p.id_pelayanan', 'left');
        $this->db->join('list_poli l', 'l.id_list_poli = h.nama_poli', 'left');
        $this->db->where('p.id_pelayanan', $id_pelayanan);

        return $this->db->get()->row();
    }

    public function get_dokter_by_pelayanan_pasien($id_pelayanan)
    {

        $this->db->select('d.nama as nama_dokter');
        $this->db->from('pelayanan p, history_pelayanan_ranap h, dokter d');
        $this->db->where('p.id_pelayanan = h.id_pelayanan');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('p.id_pelayanan', $id_pelayanan);
        $query = $this->db->get();
        return $query->row_array();
    }


    // public function get_onedaycare_by_id($id_onedaycare) {
    //     $this->db->where('id_onedaycare', $id_onedaycare);
    //     $query = $this->db->get('onedaycare');
    //     return $query->row();
    // }
    public function get_onedaycare_by_rm($no_rm)
    {
        $this->db->select('p.no_rm, p.nama, p.tgl_lahir, p.jenis_kelamin, p.agama, 
                       p.status, p.pendidikan, p.pekerjaan, p.alamat,
                       o.anamnesa, o.riwayat_penyakit_sebelumnya, 
                       o.pengobatan_sebelumnya, o.pemeriksaan_fisik, 
                       o.hasil_labor, o.therapi, o.pemantauan, o.anjuran');
        $this->db->from('pasien p');
        $this->db->join('onedaycare o', 'o.no_rm = p.no_rm', 'left');
        $this->db->where('p.no_rm', $no_rm);
        return $this->db->get()->row();
    }

    public function simpan_onedaycare($data)
    {
        $this->db->where('no_rm', $data['no_rm']);
        $query = $this->db->get('onedaycare');

        if ($query->num_rows() > 0) {
            $this->db->where('no_rm', $data['no_rm']);
            return $this->db->update('onedaycare', $data);
        } else {
            return $this->db->insert('onedaycare', $data);
        }
    }
    public function get_pasien_with_onedaycare($no_rm)
    {
        $this->db->select('
        p.no_rm, p.nama, p.tgl_lahir, p.jenis_kelamin, p.agama,
        p.status, p.pendidikan, p.pekerjaan, p.alamat,
        o.anamnesa, o.riwayat_penyakit_sebelumnya as riwayat_penyakit,
        o.pengobatan_sebelumnya as pengobatan,
        o.pemeriksaan_fisik, 
        o.hasil_labor as laboratorium, 
        o.therapi, o.pemantauan, o.anjuran
    ');
        $this->db->from('pasien p');
        $this->db->join('onedaycare o', 'o.no_rm = p.no_rm', 'left');
        $this->db->where('p.no_rm', $no_rm);
        return $this->db->get()->row();
    }

    public function checkData($where, $table)
    {
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->row_array();
    }

    public function check_onedaycare($id_pelayanan, $id_history)
    {
        return $this->db->get_where('onedaycare', [
            'id_pelayanan' => $id_pelayanan,
            'id_history'   => $id_history
        ])->row();
    }
    public function simpan_pemeriksaan_fisik($data)
    {
        // Cek apakah data pemeriksaan fisik untuk no_rm ini sudah ada
        $this->db->where('no_rm', $data['no_rm']);
        $query = $this->db->get('pemeriksaan_fisik');

        if ($query->num_rows() > 0) {
            // Update jika sudah ada
            $this->db->where('no_rm', $data['no_rm']);
            return $this->db->update('pemeriksaan_fisik', $data);
        } else {
            // Insert jika belum ada
            return $this->db->insert('pemeriksaan_fisik', $data);
        }
    }


    // ✅ fungsi baru untuk ambil data pemeriksaan_fisik
    public function get_pemeriksaan_fisik_by_rm($no_rm)
    {
        return $this->db->get_where('pemeriksaan_fisik', ['no_rm' => $no_rm])->row();
    }

    public function get_dokter_by_pelayanan($id_pelayanan)
    {
        // Coba cek dulu kolom mana yang ada
        $query = $this->db->query("
        SELECT COLUMN_NAME 
        FROM INFORMATION_SCHEMA.COLUMNS 
        WHERE TABLE_NAME = 'dokter'
    ")->result();

        $available_cols = array_map(function ($col) {
            return $col->COLUMN_NAME;
        }, $query);

        // Tentukan nama kolom nama dokter
        $col_nama = 'nama_dokter';
        if (!in_array('nama_dokter', $available_cols)) {
            if (in_array('nama', $available_cols)) {
                $col_nama = 'nama';
            } elseif (in_array('nm_dokter', $available_cols)) {
                $col_nama = 'nm_dokter';
            } elseif (in_array('nama_pegawai', $available_cols)) {
                $col_nama = 'nama_pegawai';
            }
        }

        // Build query utama
        return $this->db->select("dokter.$col_nama AS nama_dokter")
            ->from('pelayanan')
            ->join('dokter', 'dokter.id_dokter = pelayanan.id_dokter', 'left')
            ->where('pelayanan.id_pelayanan', $id_pelayanan)
            ->get()
            ->row();
    }
}
