<?php
class List_poli_model extends CI_Model
{
    // id_list_poli
    // nama
    // nama_panjang
    // buka
    // kuota
    // status
    // inisial
    // kdpoli_bpjs
    // nmpoli_bpjs
    function __construct()
    {
        parent::__construct();
    }
    
    function get_list_poli($kdpoli_bpjs)
    {
        return $this->db->get_where('list_poli',array('kdpoli_bpjs'=>$kdpoli_bpjs,'status'=> 'aktif'))->result();
    }

    function get_list_poli_bpjs($kdpoli_bpjs)
    {
        return $this->db->get_where('list_poli',array('kdpoli_bpjs'=>$kdpoli_bpjs))->result();
    }

    
    function add_list_poli($params)
    {
        $this->db->insert('list_poli',$params);
        return $this->db->insert_id();
    }
    
    function update_list_poli($id_list_poli,$params)
    {
        $this->db->where('id_list_poli',$id_list_poli);
        return $this->db->update('list_poli',$params);
    }
    function getData($id){
        $this->db->select('no_rm, nama');
        $this->db->like('no_rm',$id);
        return $this->db->get('pasien')->result_array();
    }
    function getJadwal(){
        return $this->db->query("SELECT j.hari AS hari,j.jam_mulai AS buka,j.jam_selesai AS tutup,d.kode_dokter ,d.dokter_spes 
        from jadwal_dokter_lokal j 
        left join dokter d on d.id_dokter = j.id_dokter
        where d.kode_dokter ='26846'")->result();
    }
    function insert($params,$table)
    {
        $this->db->insert($table,$params);
        return $this->db->insert_id();
    }
    
    function update($params,$where,$table)
    {
        $this->db->where($where);
        return $this->db->update($table,$params);
    }
}
