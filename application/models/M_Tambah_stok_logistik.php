<<<<<<< HEAD
<?php

class M_Tambah_stok_logistik extends CI_Model{

     public function selectDataJoin()
 {
      $this->db->select('l.nama, l.id_logistik,l.harga_cost, SUM(a.frek) stok  ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen');
      $this->db->from('stok_logistik a, list_logistik l');
      $this->db->where('a.id_logistik=l.id_logistik');
      $this->db->group_by('a.id_logistik');
      $this->db->order_by('stok');
      return $this->db->get()->result();
  }

public function updateStok($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

  public function insertUpdateStok($data, $table)
    {
        $this->db->insert($table, $data);
    }
//   public function selectDataStok()
//  {
//       $this->db->select('l.id_list,l.nama');
//       $this->db->if('(ISNULL( sum(s.frek)) , 0, sum(s.frek)) stok');
//       $this->db->from('list_logistik_umum l');
//       $this->db->join('stok_logistik_umum s', 's.id_list=l.id_list', 'LEFT');
//       $this->db->group_by('l.id_list');
//       $this->db->order_by('l.nama');
//       return $this->db->get()->result();
//   }

  public function selectDataStok()
  {
      $sql = "SELECT l.id_logistik,l.nama,  IF(ISNULL( sum(s.frek)) , 0, sum(s.frek)) stok
      FROM list_logistik l
      LEFT JOIN stok_logistik s 
      on s.id_logistik=l.id_logistik
      GROUP by l.id_logistik
      order by l.nama
      ";
$hasil = $this->db->query($sql, array())->result_array();
return $hasil;
  }

  
  public function selectDetailStok($id_logistik)
  {
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d");
    $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok ,a.kadaluarsa ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen,a.*');
    $this->db->from('stok_logistik a, list_logistik l');
    $this->db->where('a.id_logistik=l.id_logistik');
    $this->db->where('a.id_logistik',$id_logistik);
    // $this->db->group_by('a.kadaluarsa');
    $this->db->order_by('stok');
    
    
    return $this->db->get()->result();
  }





}

=======
<?php

class M_Tambah_stok_logistik extends CI_Model{

     public function selectDataJoin()
 {
      $this->db->select('l.nama, l.id_logistik,l.harga_cost, SUM(a.frek) stok  ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen');
      $this->db->from('stok_logistik a, list_logistik l');
      $this->db->where('a.id_logistik=l.id_logistik');
      $this->db->group_by('a.id_logistik');
      $this->db->order_by('stok');
      return $this->db->get()->result();
  }

public function updateStok($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

  public function insertUpdateStok($data, $table)
    {
        $this->db->insert($table, $data);
    }
//   public function selectDataStok()
//  {
//       $this->db->select('l.id_list,l.nama');
//       $this->db->if('(ISNULL( sum(s.frek)) , 0, sum(s.frek)) stok');
//       $this->db->from('list_logistik_umum l');
//       $this->db->join('stok_logistik_umum s', 's.id_list=l.id_list', 'LEFT');
//       $this->db->group_by('l.id_list');
//       $this->db->order_by('l.nama');
//       return $this->db->get()->result();
//   }

  public function selectDataStok()
  {
      $sql = "SELECT l.id_logistik,l.nama,  IF(ISNULL( sum(s.frek)) , 0, sum(s.frek)) stok
      FROM list_logistik l
      LEFT JOIN stok_logistik s 
      on s.id_logistik=l.id_logistik
      GROUP by l.id_logistik
      order by l.nama
      ";
$hasil = $this->db->query($sql, array())->result_array();
return $hasil;
  }

  
  public function selectDetailStok($id_logistik)
  {
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d");
    $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok ,a.kadaluarsa ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen,a.*');
    $this->db->from('stok_logistik a, list_logistik l');
    $this->db->where('a.id_logistik=l.id_logistik');
    $this->db->where('a.id_logistik',$id_logistik);
    // $this->db->group_by('a.kadaluarsa');
    $this->db->order_by('stok');
    
    
    return $this->db->get()->result();
  }





}

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
?>