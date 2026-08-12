<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Implementasi_perawatan extends CI_Model
{
    protected $table = 'implementasi_perawatan';

    public function __construct()
    {
        parent::__construct();
    }

    /** 🔹 Ambil semua data + JOIN staff dan history_pelayanan */
    public function get_all()
    {
        return $this->db
            ->select('ip.*, s.nama AS nama_staff, s.ruangan, s.izin_akses, h.jenis_pelayanan, h.nama_poli')
            ->from($this->table . ' AS ip')
            ->join('staff AS s', 's.id_staff = ip.id_staff', 'left')
            ->join('history_pelayanan AS h', 'h.id_history = ip.id_history', 'left')
            ->order_by('ip.tgl_input', 'DESC')
            ->get()
            ->result();
    }

    /** 🔹 Ambil data berdasarkan ID utama (join staff + history_pelayanan) */
    public function get_by_id($id)
    {
        return $this->db
            ->select('ip.*, s.nama AS nama_staff, s.ruangan, s.izin_akses, h.jenis_pelayanan, h.nama_poli')
            ->from($this->table . ' AS ip')
            ->join('staff AS s', 's.id_staff = ip.id_staff', 'left')
            ->join('history_pelayanan AS h', 'h.id_history = ip.id_history', 'left')
            ->where('ip.id', $id)
            ->get()
            ->row();
    }

    /** 🔹 Ambil data berdasarkan id_pelayanan & id_history */
    public function get_by_pelayanan_history($id_pelayanan, $id_history)
    {
        return $this->db
            ->select('ip.*, s.nama AS nama_staff, s.ruangan, s.izin_akses, h.jenis_pelayanan, h.nama_poli')
            ->from($this->table . ' AS ip')
            ->join('staff AS s', 's.id_staff = ip.id_staff', 'left')
            ->join('history_pelayanan AS h', 'h.id_history = ip.id_history', 'left')
            ->where('ip.id_pelayanan', $id_pelayanan)
            ->where('ip.id_history', $id_history)
            ->get()
            ->row();
    }

    /** 🔹 Cek apakah data sudah ada */
    public function exists($id_pelayanan, $id_history)
    {
        return $this->db
            ->where('id_pelayanan', $id_pelayanan)
            ->where('id_history', $id_history)
            ->count_all_results($this->table) > 0;
    }

    /** 🔹 Insert data baru */
    public function insert($data)
    {
        $data = $this->normalize_data($data);

        if (!isset($data['tgl_input'])) {
            $data['tgl_input'] = date('Y-m-d H:i:s');
        }

        $ok = $this->db->insert($this->table, $data);
        if (!$ok) {
            log_message('error', 'DB Insert Error: ' . print_r($this->db->error(), true));
        }
        return $ok;
    }

    /** 🔹 Update data berdasarkan id_pelayanan & id_history */
    public function update($data, $id_pelayanan, $id_history)
    {
        $data = $this->normalize_data($data);

        $ok = $this->db->where('id_pelayanan', $id_pelayanan)
            ->where('id_history', $id_history)
            ->update($this->table, $data);

        if (!$ok) {
            log_message('error', 'DB Update Error: ' . print_r($this->db->error(), true));
        }

        return $ok;
    }

    /** 🔹 Simpan baru jika belum ada, update jika sudah ada */
    public function save_or_update($data)
    {
        $id_pelayanan = $data['id_pelayanan'] ?? null;
        $id_history   = $data['id_history'] ?? null;

        if (!$id_pelayanan || !$id_history) return false;

        return $this->exists($id_pelayanan, $id_history)
            ? $this->update($data, $id_pelayanan, $id_history)
            : $this->insert($data);
    }

    /** 🔹 Helper: ubah array menjadi CSV, biarkan teks area tetap */
    private function normalize_data(array $data): array
    {
        foreach ($data as $key => $value) {
            if (in_array($key, ['laporan_pagi', 'laporan_siang', 'laporan_malam'])) continue;

            if (is_array($value)) {
                $value = array_filter($value, fn($v) => is_numeric($v) && $v > 0);
                $data[$key] = json_encode(array_values($value));
            }
        }
        return $data;
    }
}