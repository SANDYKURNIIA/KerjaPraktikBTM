<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Erm_usg_kebidanan extends CI_Model
{
    private $table = 'hasil_usg_kebidanan';
    private $fields_cache = null;
    private $last_error = null;

    private $id_num_expr = 'CAST(SUBSTRING(id,4) AS UNSIGNED)';

    public function __construct(){ parent::__construct(); }

    /* ============ CRUD RINGAN ============ */

    public function insert(array $data)
    {
        $this->last_error = null;
        $this->normalize_before_save($data, true);
        $data = $this->filter_allowed_columns($data);
        $this->touch_timestamps($data, true);
        $this->generate_id_if_needed($data, true);

        $ok = $this->db->insert($this->table, $data);
        if (!$ok) { $this->last_error = $this->db->error(); return false; }
        return $this->db->affected_rows() > 0;
    }

    public function update($id, array $data)
    {
        $this->last_error = null;
        $id = (string)$id;
        if ($id === '') return false;

        $this->normalize_before_save($data, false);
        $data = $this->filter_allowed_columns($data);
        $this->touch_timestamps($data, false);

        $ok = $this->db->where('id', $id)->update($this->table, $data);
        if (!$ok) { $this->last_error = $this->db->error(); return false; }
        return true;
    }

    /* ============ SELECTORS ============ */

    public function getDataById($id_pelayanan){ return $this->getLatestByPelayanan($id_pelayanan); }

    public function getById($no_rm)
    {
        $row = $this->db->get_where($this->table, ['no_rm' => (string)$no_rm])->row_array();
        return $this->normalize_row_after_fetch($row);
    }

    public function getLatestByPelayanan($id_pelayanan)
    {
        $this->db->from($this->table);
        $this->db->where('id_pelayanan', (string)$id_pelayanan);
        if ($this->field_exists('tanggal_pemeriksaan')) $this->db->order_by('tanggal_pemeriksaan', 'DESC');
        if ($this->field_exists('created_at'))          $this->db->order_by('created_at', 'DESC');
        $this->db->order_by($this->id_num_expr, 'DESC', false);
        $this->db->limit(1);
        $row = $this->db->get()->row_array();
        return $this->normalize_row_after_fetch($row);
    }

    public function getLatestByNoRM($no_rm)
    {
        $this->db->from($this->table);
        $this->db->where('no_rm', (string)$no_rm);
        if ($this->field_exists('tanggal_pemeriksaan')) $this->db->order_by('tanggal_pemeriksaan', 'DESC');
        if ($this->field_exists('created_at'))          $this->db->order_by('created_at', 'DESC');
        $this->db->order_by($this->id_num_expr, 'DESC', false);
        $this->db->limit(1);
        $row = $this->db->get()->row_array();
        return $this->normalize_row_after_fetch($row);
    }

    public function delete($id)
    {
        $ok = $this->db->where('id', (string)$id)->delete($this->table);
        if (!$ok) { $this->last_error = $this->db->error(); return false; }
        return $this->db->affected_rows() > 0;
    }

    /* ============ NORMALIZATION ============ */

    private function field_exists($column)
    {
        if (!is_array($this->fields_cache)) {
            $this->fields_cache = $this->db->list_fields($this->table);
        }
        return in_array($column, $this->fields_cache, true);
    }

    private function normalize_before_save(array &$data, $isCreate)
    {
        if (isset($data['jenis_pemeriksaan'])) {
            $allowed = ['Transabdominal', 'Transvaginal'];
            if (is_array($data['jenis_pemeriksaan'])) {
                $list = array_values(array_intersect($allowed, array_map('trim', $data['jenis_pemeriksaan'])));
                $data['jenis_pemeriksaan'] = implode(',', $list);
            } else {
                $val  = trim((string)$data['jenis_pemeriksaan']);
                $list = array_map('trim', explode(',', $val));
                $list = array_values(array_intersect($allowed, $list));
                $data['jenis_pemeriksaan'] = implode(',', $list);
            }
        }

        if (!empty($data['tanggal_pemeriksaan'])) {
            $ts = strtotime($data['tanggal_pemeriksaan']);
            if ($ts) $data['tanggal_pemeriksaan'] = date('Y-m-d', $ts);
        }

        foreach ($data as $k => $v) {
            if (is_string($v)) $data[$k] = trim($v);
        }
    }

    private function touch_timestamps(array &$data, $isCreate = false)
    {
        $now = date('Y-m-d H:i:s');
        if ($isCreate && $this->field_exists('created_at') && empty($data['created_at'])) {
            $data['created_at'] = $now;
        }
        if ($this->field_exists('updated_at')) {
            $data['updated_at'] = $now;
        }
    }

    private function filter_allowed_columns(array $data)
    {
        if (!is_array($this->fields_cache)) {
            $this->fields_cache = $this->db->list_fields($this->table);
        }
        return array_intersect_key($data, array_flip($this->fields_cache));
    }

    private function normalize_row_after_fetch($row)
    {
        if ($row) {
            $jp = $row['jenis_pemeriksaan'] ?? '';
            $row['jenis_pemeriksaan_array'] = $jp ? array_map('trim', explode(',', $jp)) : [];
        }
        return $row;
    }

    private function generate_id_if_needed(array &$data, $inside_txn = false)
    {
        if (!$this->field_exists('id') || !empty($data['id'])) return;

        if (!$inside_txn) $this->db->trans_begin();
        $row = $this->db->query("
            SELECT IFNULL(MAX({$this->id_num_expr}), 0) AS maxnum
            FROM {$this->table}
            WHERE id REGEXP '^usg[0-9]+$'
        ")->row_array();

        $next = (int)($row['maxnum'] ?? 0) + 1;
        $data['id'] = 'usg' . $next;
        if (!$inside_txn) $this->db->trans_commit();
    }

    public function getLastError(){ return $this->last_error; }
}