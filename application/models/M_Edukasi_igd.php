<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Edukasi_igd extends CI_Model
{
    private $tbl = 'topik_edukasi_igd';

    /* =========================
       READ (single-row schema)
       ========================= */
    public function getEdukasiByNoRM($no_rm, $id_pelayanan = null)
    {
        $this->db->from($this->tbl)->where('no_rm', $no_rm);
        if (!empty($id_pelayanan)) {
            $this->db->where('id_pelayanan', $id_pelayanan);
        }
        $this->db->order_by('tanggal_input', 'DESC')->limit(1);

        $row = $this->db->get()->row_array();
        if (!$row) return [];

        // Keluarkan topik1..6 (CSV) sebagai array untuk kebutuhan view
        for ($i=1; $i<=6; $i++) {
            $k = "topik{$i}";
            $row[$k] = $this->toArray($row[$k] ?? null);
        }
        return [$row]; // tetap array (kompatibel dengan view lama yang expect list)
    }

    /* =========================
       UPSERT (single-row)
       ========================= */
    public function saveEdukasiTopik($no_rm, $id_pelayanan, $id_staff, array $post)
    {
        // helper cast durasi ke INT/NULL
        $getDurasi = function($key) use ($post) {
            if (!array_key_exists($key, $post)) return null;
            $v = trim((string)$post[$key]);
            return ($v === '') ? null : (int)$v;
        };

        // helper trim string pendek
        $s = function($v, $max = 150) {
            if ($v === null) return null;
            $v = trim((string)$v);
            if ($v === '') return null;
            return mb_substr($v, 0, $max);
        };

        // gabung subtopik S4 + lain-lain
        $s4_sub = $post['s4_sub'] ?? [];
        if (!empty($post['s4_sub_lain'])) $s4_sub[] = trim($post['s4_sub_lain']);

        // Build data untuk insert/update
        $data = [
            'no_rm'        => $no_rm,
            'id_pelayanan' => $id_pelayanan,
            'id_staff'     => $id_staff,

            // materi/subtopik disimpan CSV
            'topik1' => $this->encodeList($post['s1_materi'] ?? []),  // Manajemen Nyeri
            'topik2' => $this->encodeList($post['s2_materi'] ?? []),  // Resiko Jatuh
            'topik3' => $this->encodeList($post['s3_sub']    ?? []),  // PPI
            'topik4' => $this->encodeList($s4_sub),                    // Cara Perawatan Bayi
            'topik5' => $this->encodeList($post['s5_sub']    ?? []),  // Nifas
            'topik6' => $this->encodeList($post['s6_sub']    ?? []),  // Alat Medis

            // penerima & edukator
            'penerima1' => $s($post['s1_penerima'] ?? null),
            'edukator1' => $s($post['s1_edukator'] ?? null),
            'penerima2' => $s($post['s2_penerima'] ?? null),
            'edukator2' => $s($post['s2_edukator'] ?? null),
            'penerima3' => $s($post['s3_penerima'] ?? null),
            'edukator3' => $s($post['s3_edukator'] ?? null),
            'penerima4' => $s($post['s4_penerima'] ?? null),
            'edukator4' => $s($post['s4_edukator'] ?? null),
            'penerima5' => $s($post['s5_penerima'] ?? null),
            'edukator5' => $s($post['s5_edukator'] ?? null),
            'penerima6' => $s($post['s6_penerima'] ?? null),
            'edukator6' => $s($post['s6_edukator'] ?? null),

            // durasi INT & evaluasi
            'durasi1'   => $getDurasi('s1_durasi'),
            'evaluasi1' => $s($post['s1_evaluasi'] ?? null, 50),

            'durasi2'   => $getDurasi('s2_durasi'),
            'evaluasi2' => $s($post['s2_evaluasi'] ?? null, 50),

            'durasi3'   => $getDurasi('s3_durasi'),
            'evaluasi3' => $s($post['s3_evaluasi'] ?? null, 50),

            'durasi4'   => $getDurasi('s4_durasi'),
            'evaluasi4' => $s($post['s4_evaluasi'] ?? null, 50),

            'durasi5'   => $getDurasi('s5_durasi'),
            'evaluasi5' => $s($post['s5_evaluasi'] ?? null, 50),

            'durasi6'   => $getDurasi('s6_durasi'),
            'evaluasi6' => $s($post['s6_evaluasi'] ?? null, 50),

            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Upsert berdasarkan (no_rm, id_pelayanan)
        $where = ['no_rm' => $no_rm, 'id_pelayanan' => $id_pelayanan];
        $cek   = $this->db->get_where($this->tbl, $where)->row();

        if ($cek) {
            $this->db->where('id_edukasi', $cek->id_edukasi);
            return $this->db->update($this->tbl, $data);
        } else {
            $data['tanggal_input'] = date('Y-m-d H:i:s');
            return $this->db->insert($this->tbl, $data);
        }
    }

    /* Back-compat: dipanggil controller lama */
    public function saveOrUpdateFromPostByNoRM($no_rm, array $post, $id_staff, $id_pelayanan)
    {
        $ok = $this->saveEdukasiTopik($no_rm, $id_pelayanan, $id_staff, $post);
        return ['transaction_status' => (bool)$ok];
    }

    /* =========================
       DELETE
       ========================= */
    public function deleteAllByNoRM($no_rm, $id_pelayanan = null)
    {
        $where = ['no_rm' => $no_rm];
        if (!empty($id_pelayanan)) $where['id_pelayanan'] = $id_pelayanan;
        return $this->db->delete($this->tbl, $where);
    }

    /* =========================
       Helpers (CSV <-> array)
       ========================= */

    // Simpan sebagai CSV "A, B, C"
    private function encodeList($val)
    {
        if (is_array($val)) {
            $items = array_map('trim', $val);
            $items = array_filter($items, function($v){ return $v !== '' && $v !== null; });
            return empty($items) ? null : implode(', ', $items);
        }
        if (is_string($val) && strlen($val)) {
            // jika string JSON lama -> decode
            if ($val[0] === '[') {
                $arr = json_decode($val, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($arr)) {
                    return $this->encodeList($arr);
                }
            }
            // CSV biasa
            $arr = $this->toArray($val);
            return empty($arr) ? null : implode(', ', $arr);
        }
        return null;
    }

    // Keluarkan sebagai array (kompatibel JSON/CSV)
    private function toArray($val)
    {
        if ($val === null || $val === '') return [];
        if (is_array($val)) {
            return array_values(array_filter(array_map('trim', $val), function($v){ return $v !== ''; }));
        }
        if (is_string($val)) {
            if ($val !== '' && $val[0] === '[') {
                $decoded = json_decode($val, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    return $this->toArray($decoded);
                }
            }
            $parts = array_map('trim', explode(',', $val));
            return array_values(array_filter($parts, function($v){ return $v !== ''; }));
        }
        return [];
    }
}