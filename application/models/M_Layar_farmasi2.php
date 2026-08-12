<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No driect script access allowed');

class M_Layar_farmasi2 extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }

    public function selectPlay()
    {
        return $this->db->get('temp_antrian_farmasi')->row_array();
    }

    public function deleteplaySuara()
    {
        $this->db->limit(1);
        $this->db->empty_Table('temp_antrian_farmasi');
    }

    public function farmasi()
    {
        $tanggal_resep = date('Y-m-d');
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('status', '0');
        $this->db->like('tanggal_resep', $tanggal_resep);
        return $this->db->get('antrian_farmasi')->row_array();
    }

    public function getAntrianFarmasi()
    {
        $tanggal_resep = date('Y-m-d');

        $this->db->select('TIME(a.tanggal_resep) AS tanggal_resep, a.id_resep, a.no_antri, a.inisial, p.nama, a.status');
        $this->db->from('antrian_farmasi a');
        $this->db->join('pelayanan b', 'a.id_pelayanan = b.id_pelayanan', 'left');
        $this->db->join('pasien p', 'p.no_rm = b.id_pasien', 'left');
        $this->db->group_by('a.id_pelayanan');
        $this->db->like('DATE(a.tanggal_resep)', $tanggal_resep);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function update($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function getProses()
    {
        $tanggal_resep = date('Y-m-d');

        $this->db->select('TIME(a.tgl_proses) AS tanggal_proses, a.id_resep, a.no_antri, a.inisial, p.nama, a.status');
        $this->db->from('antrian_farmasi a');
        $this->db->join('pelayanan b', 'a.id_pelayanan = b.id_pelayanan', 'left');
        $this->db->join('pasien p', 'p.no_rm = b.id_pasien', 'left');
        $this->db->like('DATE(a.tanggal_resep)', $tanggal_resep);
        $this->db->group_by('a.id_pelayanan');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function getSelesai()
    {
        $tanggal_resep = date('Y-m-d');

        $this->db->select('TIME(a.tgl_selesai) AS tanggal_selesai, a.id_resep, a.no_antri, a.inisial, p.nama, a.status');
        $this->db->from('antrian_farmasi a');
        $this->db->join('pelayanan b', 'a.id_pelayanan = b.id_pelayanan', 'left');
        $this->db->join('pasien p', 'p.no_rm = b.id_pasien', 'left');
        $this->db->like('DATE(a.tanggal_resep)', $tanggal_resep);
        $this->db->group_by('a.id_pelayanan');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function getSkip()
    {
        $tanggal_resep = date('Y-m-d');

        $this->db->select('TIME(a.tgl_diberikan) AS tanggal_diberikan, a.id_resep, a.no_antri, a.inisial, p.nama, a.status');
        $this->db->from('antrian_farmasi a');
        $this->db->join('pelayanan b', 'a.id_pelayanan = b.id_pelayanan', 'left');
        $this->db->join('pasien p', 'p.no_rm = b.id_pasien', 'left');
        $this->db->group_by('a.id_pelayanan');
        $this->db->like('DATE(a.tanggal_resep)', $tanggal_resep);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
}
=======
<?php
defined('BASEPATH') or exit('No driect script access allowed');

class M_Layar_farmasi2 extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }

    public function selectPlay()
    {
        return $this->db->get('temp_antrian_farmasi')->row_array();
    }

    public function deleteplaySuara()
    {
        $this->db->limit(1);
        $this->db->empty_Table('temp_antrian_farmasi');
    }

    public function farmasi()
    {
        $tanggal_resep = date('Y-m-d');
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('status', '0');
        $this->db->like('tanggal_resep', $tanggal_resep);
        return $this->db->get('antrian_farmasi')->row_array();
    }

    public function getAntrianFarmasi()
    {
        $tanggal_resep = date('Y-m-d');

        $this->db->select('TIME(a.tanggal_resep) AS tanggal_resep, a.id_resep, a.no_antri, a.inisial, p.nama, a.status');
        $this->db->from('antrian_farmasi a');
        $this->db->join('pelayanan b', 'a.id_pelayanan = b.id_pelayanan', 'left');
        $this->db->join('pasien p', 'p.no_rm = b.id_pasien', 'left');
        $this->db->group_by('a.id_pelayanan');
        $this->db->like('DATE(a.tanggal_resep)', $tanggal_resep);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function update($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function getProses()
    {
        $tanggal_resep = date('Y-m-d');

        $this->db->select('TIME(a.tgl_proses) AS tanggal_proses, a.id_resep, a.no_antri, a.inisial, p.nama, a.status');
        $this->db->from('antrian_farmasi a');
        $this->db->join('pelayanan b', 'a.id_pelayanan = b.id_pelayanan', 'left');
        $this->db->join('pasien p', 'p.no_rm = b.id_pasien', 'left');
        $this->db->like('DATE(a.tanggal_resep)', $tanggal_resep);
        $this->db->group_by('a.id_pelayanan');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function getSelesai()
    {
        $tanggal_resep = date('Y-m-d');

        $this->db->select('TIME(a.tgl_selesai) AS tanggal_selesai, a.id_resep, a.no_antri, a.inisial, p.nama, a.status');
        $this->db->from('antrian_farmasi a');
        $this->db->join('pelayanan b', 'a.id_pelayanan = b.id_pelayanan', 'left');
        $this->db->join('pasien p', 'p.no_rm = b.id_pasien', 'left');
        $this->db->like('DATE(a.tanggal_resep)', $tanggal_resep);
        $this->db->group_by('a.id_pelayanan');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function getSkip()
    {
        $tanggal_resep = date('Y-m-d');

        $this->db->select('TIME(a.tgl_diberikan) AS tanggal_diberikan, a.id_resep, a.no_antri, a.inisial, p.nama, a.status');
        $this->db->from('antrian_farmasi a');
        $this->db->join('pelayanan b', 'a.id_pelayanan = b.id_pelayanan', 'left');
        $this->db->join('pasien p', 'p.no_rm = b.id_pasien', 'left');
        $this->db->group_by('a.id_pelayanan');
        $this->db->like('DATE(a.tanggal_resep)', $tanggal_resep);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
