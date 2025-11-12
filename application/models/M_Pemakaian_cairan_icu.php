<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pemakaian_cairan_icu extends CI_Model
{
    private $table = 'pemakaian_cairan_icu';

    public function get_by_keys($id_pelayanan, $id_history)
    {
        return $this->db->get_where($this->table, [
            'id_pelayanan' => $id_pelayanan,
            'id_history'   => $id_history
        ])->row_array();
    }

    public function upsert($payload)
    {
        // Pastikan kunci unik ada
        if (empty($payload['id_pelayanan']) || empty($payload['id_history']) || empty($payload['id_staff'])) {
            return ['ok' => false, 'msg' => 'id_pelayanan, id_history, dan id_staff wajib diisi'];
        }

        $exists = $this->get_by_keys($payload['id_pelayanan'], $payload['id_history']);

        // Hanya field yang dikenali
        $fields = [
            'id_pelayanan', 'id_history', 'id_staff',
            'enteral_jenis','parenteral_jenis',
            'enteral','parenteral','keluar',
            'total_input','total_output','total'
        ];

        $data = [];
        foreach ($fields as $f) {
            if (array_key_exists($f, $payload)) {
                $data[$f] = is_array($payload[$f]) ? json_encode($payload[$f]) : $payload[$f];
            }
        }

        if ($exists) {
            // edit
            $this->db->where('id_pelayanan', $payload['id_pelayanan']);
            $this->db->where('id_history',   $payload['id_history']);
            $ok = $this->db->update($this->table, $data);
        } else {
            // create
            $data['tgl_input'] = date('Y-m-d H:i:s');
            $ok = $this->db->insert($this->table, $data);
        }

        if (!$ok) {
            return ['ok' => false, 'msg' => $this->db->error()['message'] ?? 'DB error'];
        }
        return ['ok' => true];
    }
}