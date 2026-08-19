<?php

class M_diagnosa_diare extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function cek_id($id_pelayanan)
    {
        $this->db->select('nama_diagnosa');
        $this->db->from('diagnosa');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function selectDiagnosaDiare(){
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("d-m-Y");
        $hasil = $this->db->query("SELECT v.nama pasien, v.no_rm, v.alamat, 
        v.jenis_pelayanan, v.poli, d.kode, d.nama_diagnosa
        FROM v_kunjungan v, diagnosa_utama d
        WHERE v.id_pelayanan=d.id_pelayanan 
        and d.kode ='a099' 
        and v.tgl_masuk like '$tgl'
        ORDER BY v.tgl_masuk asc");
        return $hasil->row();
    }
    
    public function selectRangeDiagnosaDiare($mulai, $akhir){
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("d-m-Y");
        $hasil = $this->db->query("SELECT v.nama pasien, v.no_rm, v.alamat, 
        v.jenis_pelayanan, v.poli, d.kode, d.nama_diagnosa, v.tgl_masuk
        FROM v_kunjungan v, diagnosa_utama d
        WHERE v.id_pelayanan=d.id_pelayanan
        and d.kode ='a099'
        and v.tgl_masuk >= '$mulai' and v.tgl_masuk <= '$akhir' ");
        return $hasil->result();
    }
}
  