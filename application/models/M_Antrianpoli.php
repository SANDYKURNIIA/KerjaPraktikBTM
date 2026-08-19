<?php

class M_Antrianpoli extends CI_Model{
 
  public function updateskip($where,$data,$table){
      $this->db->where($where);
      $this->db->update($table,$data);
  }

  public function updateselesai($where,$data,$table){
      $this->db->where($where);
      $this->db->update($table,$data);
  }

  public function selectAntrian(){
        $tanggal=date('Y-m-d');
        $hasil= $this->db->query("SELECT a.*, l.nama_panjang, p.nama,c.nama cara_bayar,p.no_rm,pel.id_pelayanan 
        FROM antrian_poli a, pelayanan pel, pasien p, cara_bayar c, list_poli l
        WHERE  a.ket!=3 and a.tanggal='$tanggal' and l.id_list_poli=a.poli and p.no_rm=pel.id_pasien and c.id_cara_bayar=pel.cara_bayar and a.id_pelayanan=pel.id_pelayanan and a.jenis_antrian='ONLINE' 
        UNION all 
        SELECT a.*, l.nama_panjang, p.nama,c.nama cara_bayar,p.no_rm,pel.id_pelayanan FROM antrian_poli a, pelayanan pel, pasien p, cara_bayar c, list_poli l
        WHERE  a.ket!=3 and a.tanggal='$tanggal' and l.id_list_poli=a.poli and p.no_rm=pel.id_pasien and c.id_cara_bayar=pel.cara_bayar and a.id_pelayanan=pel.id_pelayanan and a.jenis_antrian='LANGSUNG' order by ket,no_antri");
        return $hasil->result();
    }

}

?>