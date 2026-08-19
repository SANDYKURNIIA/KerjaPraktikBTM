<?php 
defined('BASEPATH') OR exit('No driect script access allowed');

class M_Layar_farmasi extends CI_Model{
    function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }

    public function selectPlay(){
        return $this->db->get('temp_antrian_farmasi')->row_array();
    }

    public function deleteplaySuara(){
        $this->db->limit(1);
        $this->db->empty_Table('temp_antrian_farmasi');
    }

    public function farmasi(){
        $tanggal=date('Y-m-d');
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_farmasi')->row_array();
    }
    public function getAntrianFarmasi(){
        $tanggal=date('Y-m-d');
        $this->db->select('a.no_antri, p.nama, a.tanggal');
        $this->db->from('antrian_farmasi a, pasien p, pelayanan b, tindakan_farmasi t');
        $this->db->where('a.id_pelayanan = b.id_pelayanan');
        $this->db->where('p.no_rm = b.id_pasien');
        $this->db->where('a.status', '0');
        $this->db->like('a.tanggal', $tanggal);
        $this->db->group_by('t.id_pelayanan', 'ASC');
        return $this->db->get()->result_array();
    }
}