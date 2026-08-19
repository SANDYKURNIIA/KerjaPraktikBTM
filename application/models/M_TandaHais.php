<?php

class M_TandaHais extends CI_Model{
    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }

    public function resetIncrement(){
        $sql = "ALTER TABLE form_survei_inveksi_hais AUTO_INCREMENT = 1";
        return $this->db->query($sql);
    }

    public function getAllData($id_pelayanan)
    {
        $this->db->select('id_form_hais,tgl_masuk,waktu_masuk,dokterPenanggung');
        $this->db->from('form_survei_inveksi_hais');
        $this->db->where('form_survei_inveksi_hais.id_form_hais',$id_pelayanan);
        return $this->db->get()->result();
    }

    public function getExistData($table,$tipe,$key){
        //not used anymore
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where("tipe",$tipe);
        $this->db->where("id_form_hais",$key);
        return $this->db->get()->result();
    }

    public function getDataUpdate($id,$tipe){
        if($tipe === "DCB"){
            $this->db->select("*");
            $this->db->from("tbl_dcb");
            $this->db->where("id_dcb",$id);
        }elseif ($tipe === "IDO") {
            $this->db->select("*");
            $this->db->from("tbl_ido");
            $this->db->where("id_ido",$id);
        }else{
            $this->db->select("*");
            $this->db->from("detail_tanda_hais");
            $this->db->where("tipe",$tipe);
            $this->db->where("id_tanda_hais",$id);
        }
        return $this->db->get()->result();
    }

    public function update($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function getMaxID(){
        $this->db->select_max('id_form_hais');
        $res = $this->db->get('form_survei_inveksi_hais')->row();
        if($res->id_form_hais != null){
            return $res->id_form_hais;
        }else{
            return "kosong";
        }
        
    }

    public function insert($data,$table){
        $this->db->insert($table,$data);
    }

    public function delete($id){
        $this->db->where('id_form_hais',$id);
        $this->db->delete("form_survei_inveksi_hais");
    }

    public function deleteDetail($id,$where){
        $this->db->where($id);
        $this->db->delete($where);
    }

    public function getDokter(){
        $this->db->select('nama');
        $this->db->from('dokter');
        return $this->db->get()->result();
    }


}