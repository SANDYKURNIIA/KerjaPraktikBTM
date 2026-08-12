<<<<<<< HEAD
<?php

class M_Erm_masalah_kep extends CI_Model
{
    protected $table = 'masalah_keperawatan';
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }
    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function update($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_all_data()
    {
        return $this->db->get('masalah_keperawatan')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id_masalah_kep' => $id])->row_array();
    }
}
=======
<?php

class M_Erm_masalah_kep extends CI_Model
{
    protected $table = 'masalah_keperawatan';
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }
    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function update($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_all_data()
    {
        return $this->db->get('masalah_keperawatan')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id_masalah_kep' => $id])->row_array();
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
