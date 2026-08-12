<?php

class M_Stok_per_ed extends CI_Model{



  public function selectStokpered()
  {

    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d");
    $this->db->select('l.nama, l.id_logistik,l.harga_cost, sum(a.frek) stok  ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen,a.kadaluarsa');
    $this->db->from('stok_logistik a, list_logistik l');
    $this->db->where('a.id_logistik=l.id_logistik');
    $this->db->group_by('a.id_logistik, a.kadaluarsa');
    $this->db->having('stok >0');
    $this->db->order_by('a.kadaluarsa');
    
    
    return $this->db->get()->result();
  }


}

?>