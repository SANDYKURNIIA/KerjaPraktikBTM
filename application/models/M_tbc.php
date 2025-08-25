<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tbc extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }

    // public function get_pasien($no_rm)
    // {
    //     $this->db->select('nama, no_ktp, jenis_kelamin, tgl_lahir, provinsi, alamat');
    //     $this->db->from('pasien');
    //     $this->db->where('no_rm', $no_rm);
    //     $result = $this->db->get()->row();

    //     // Memeriksa apakah ada data yang ditemukan
    //     if (!empty($result)) {
    //         // Mengembalikan data pasien jika ditemukan
    //         return $result;
    //     } else {
    //         // Mengembalikan null jika tidak ada data yang ditemukan
    //         return null;
    //     }
    // }

    public function get_kode_icd($id_pelayanan)
    {
        $this->db->select("kode");
        $this->db->from("diagnosa_utama");
        $this->db->where('kode >=', 'A15');
        $this->db->where('kode <=', 'A19');
        $this->db->where("id_pelayanan", $id_pelayanan);
        return $this->db->get()->row();
    }

    public function Labor_PrintById_Rajal($id_tindakan_labor)
    {
        $this->db->select('t.*, l.nama, pa.nama pasien, pa.jenis_kelamin, p.id_pasien, r.nama cara_bayar');
        $this->db->from('tindakan_labor t, list_tindakan_labor l, pelayanan p, pasien pa, cara_bayar r');
        $this->db->where('t.id_list_tindakan=l.id_daftar_tindakan');
        $this->db->where('pa.no_rm=p.id_pasien');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('p.cara_bayar=r.id_cara_bayar');
        $this->db->where('t.id_tindakan_labor', $id_tindakan_labor);
        $this->db->order_by('t.tanggal', 'desc');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_Pasien($id_pelayanan)
    {
        $this->db->select('p.id_pelayanan,p.id_pasien,pa.*,hp.nama_poli,ss.id_satusehat');
        $this->db->from('pelayanan p,history_pelayanan hp,satusehat_suborganisasi ss,pasien pa');
        $this->db->where('p.id_pelayanan=hp.id_pelayanan');
        $this->db->where('hp.nama_poli=ss.id_list_poli');
        $this->db->where('p.id_pasien=pa.no_rm');
        $this->db->where('p.id_pelayanan', $id_pelayanan);
        $query = $this->db->get();
        return $query->row();
    }

    public function classifications($no_rm)
    {
        $this->db->select("p.tgl_masuk,p.tgl_keluar,fa.tanggal");
        $this->db->from("pelayanan p,form_ass_per_igd fa");
        $this->db->where("p.id_pasien = fa.no_rm");
        $this->db->where("p.id_pasien", $no_rm);
        return $this->db->get()->row();
    }

    public function classifications2($id_pelayanan)
    {
        $this->db->select("jenis_pelayanan");
        $this->db->from("v_kunjungan");
        $this->db->where("id_pelayanan", $id_pelayanan);
        return $this->db->get()->row();
    }
    public function kfa_code($id_pelayanan)
    {
        $this->db->select("lg.*");
        $this->db->from("pelayanan p,tindakan_farmasi tf,list_logistik lg");
        $this->db->where('p.id_pelayanan = tf.id_pelayanan');
        $this->db->where('tf.id_list_tindakan = lg.id_logistik');
        $this->db->where("p.id_pelayanan", $id_pelayanan);
        return $this->db->get()->result();
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() > 0) {
            return array('status' => true, 'message' => 'Insert success');
        } else {
            return array('status' => false, 'message' => 'Insert failed');
        }
    }


    public function insert_data_duplicate($data, $table)
    {
        // Example of checking for duplication by a unique field (e.g., 'nik' field)
        $this->db->where('practitioner_nik', $data['practitioner_nik']);  // Assuming 'nik' is the unique field in your table
        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {
            // If a record with the same 'nik' exists, return false with a duplicate error message
            return array('status' => false, 'message' => 'Data sudah ada di database!');
        } else {
            // Otherwise, insert the data
            $insert = $this->db->insert($table, $data);

            if ($insert) {
                return array('status' => true, 'message' => 'Data inserted successfully');
            } else {
                return array('status' => false, 'message' => 'Failed to insert data');
            }
        }
    }

    public function cek_data($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('ihs_encounter');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $query = $this->db->get();

        // Cek apakah hasil query ada
        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan satu baris data
        } else {
            return null; // Tidak ditemukan
        }
    }

    public function get_form($id_pelayanan)
    {
        $this->db->select('id_form_labor');
        $this->db->from('tindakan_labor');
        $this->db->where("CONVERT(id_pelayanan USING utf8mb4) = CONVERT('$id_pelayanan' USING utf8mb4)", null, false);
        return $this->db->get()->row();
    }

    public function insert_observation($data)
    {
        // Masukkan data ke tabel observasi di database
        $this->db->insert('tb_observ_labor', $data);
    }

    public function insert_medication($data)
    {
        $this->db->insert_batch('tb_medication', $data);
    }

    public function get_idpel()
    {
        $this->db->select('du.id_pelayanan,p.no_rm');
        $this->db->from('diagnosa_utama du,pasien p,pelayanan pe');
        $this->db->where('du.id_pelayanan = pe.id_pelayanan');
        $this->db->where('pe.id_pasien = p.no_rm');
        $this->db->where('pe.tgl_masuk >=', '2024-01-01');
        $this->db->where('pe.tgl_masuk <=', '2024-10-31');
        $this->db->where('pe.status_rawat', 'selesai');
        $this->db->where("du.id_pelayanan NOT IN (SELECT encounter_local_id FROM tb_data_schedule)");
        $this->db->group_start();
        $this->db->where('du.kode >=', 'A15');
        $this->db->where('du.kode <=', 'A19');
        $this->db->group_end();
        // $this->db->limit(5);
        return $this->db->get()->result();
    }

    public function insert_batch($table, $data)
    {
        return $this->db->insert_batch($table, $data);
    }


    public function cek_labor($id_pelayanan)
    {
        $this->db->select('id_form_labor');
        $this->db->from('tindakan_labor');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->row();
    }
}
