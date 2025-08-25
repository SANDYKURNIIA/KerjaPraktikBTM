<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Jadwal_dokter extends CI_Model
{
  
  ////Jadwal Perdokter (percobaan)
  public function selectJadwalPerdokter($id_dokter)
  {
    $this->db->select('*');
    $this->db->from('jadwal_dokter_lokal');
    // $this->db->where('status', 'AKTIF');
    $this->db->where('id_dokter', $id_dokter);
    $this->db->order_by('id_jadwal');
    return $this->db->get()->result();
  }

  public function delete_jadwal_perdokter($id_jadwal, $where, $table){
    $this->db->where($where, $id_jadwal);
    return $this->db->delete($table);
  }
  
  public function insert_jadwal_perdokter($data, $table)
  {
     $this->db->insert($table, $data);
    //  return $this->db->insert_id();
  }
  public function selectDataJadwalPerDokter($id)
  {
    $this->db->where('id_jadwal', $id);
    return $this->db->get('jadwal_dokter_lokal')->result();
  }


  ////Jadwal
  public function selectJadwalDokter()
  {
    $this->db->select('d.*, l.nama_panjang');
    $this->db->from('dokter d, list_poli l');
    $this->db->where('l.kdpoli_bpjs=d.dokter_spes');
    $this->db->where('d.nama !=', '-');
    $this->db->where('d.status', 'AKTIF');
    $this->db->order_by('d.id_dokter');
    return $this->db->get()->result();
  }
  public function selectDataJadwalDokter($id)
  {
    $this->db->where('id_dokter', $id);
    return $this->db->get('dokter')->result();
  }
  public function update_jadwal_dokter($id, $data)
  {
    $this->db->from('dokter d, jadwal_dokter_lokal j');
    $this->db->where('d.id_dokter', $id);
    $this->db->where('j.id_dokter', $id);
    return $this->db->update('dokter', $data);
  }
  public function insert_jadwal_dokter($data, $table)
  {
     $this->db->insert($table, $data);
     return $this->db->insert_id();
  }

  public function checkData($id_mcu, $table)
  {
    $this->db->from($table);
    $this->db->where('id_pasien', $id_mcu);
    return $this->db->get()->row_array();
  }
  public function insert_mcu($page_data, $table)
  {
    $this->db->insert($table, $page_data);
  }
  public function update($data, $where, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }
  public function selectMCUhariini()
  {
    $tgl = date("Y-m-d ");
    $this->db->select('m.*, r.status');
    $this->db->from('homecare m, req_kasir_homecare r');
    $this->db->where('m.id_pasien=r.id_pasien');
    $this->db->where('status_rawat', 0);
    $this->db->order_by('m.tanggal', $tgl);
    return $this->db->get()->result();
  }
  public function selectPerawat()
  {
    $this->db->select('nama_perawat, id_perawat');
    // $this->db->where('status', 'AKTIF');
    $this->db->from('perawat_homecare');
    $this->db->order_by('nama_perawat');
    return $this->db->get()->result_array();
  }


  public function delete_tindakan($id_mcu, $where, $table)
  {
    $this->db->where($where, $id_mcu);
    return $this->db->delete($table);
  }
  public function update_mcu($data, $data2, $id_mcu)
  {
    $this->db->where('id_mcu', $id_mcu);
    $this->db->update('detail_mcu', $data);
    $this->db->where('id_mcu', $id_mcu);
    $this->db->update('mcu', $data2);
  }
  public function selectNamaDokter()
  {
    $this->db->select('nama, id_dokter');
    $this->db->where_not_in('id_dokter');
    $this->db->where('status', 'AKTIF');
    $this->db->from('dokter');
    $this->db->order_by('nama');
    return $this->db->get()->result();
  }

  //TINDAKAN -------------------------------------------------------------------------------
  public function selectDataPasienMCUby_id($id_mcu)
  {
    // $this->db->select('*');
    $this->db->where(array('id_mcu' => $id_mcu));
    $this->db->from('tindakan_mcu');
    return $this->db->get()->result();
  }
  public function selectDataMcuById($id_mcu)
  {
    $this->db->select('t.*, l.nama_tindakan, s.nama staff, p.nama_perawat');
    $this->db->from('tindakan_homecare t, list_tindakan_homecare l, homecare m, staff s, perawat_homecare p');
    $this->db->where('t.id_list_tindakan=l.id_list_tindakan');
    $this->db->where('s.id_staff=t.id_staff');
    $this->db->where('m.id_pasien=t.id_pasien');
    $this->db->where('t.id_perawat=p.id_perawat');
    $this->db->where('t.id_pasien', $id_mcu);
    $this->db->order_by('t.tanggal', 'desc');
    return $this->db->get()->result();
  }

  public function Total_Mcu_Byid($id_mcu)
  {
    $this->db->select_sum('total');
    $this->db->from('tindakan_homecare');
    $this->db->where('id_pasien', $id_mcu);
    return $this->db->get()->result();
  }

  public function delete_mcu($id_tindakan_mcu)
  {
    $this->db->delete('tindakan_homecare', array('id_tindakan' => $id_tindakan_mcu));
  }
  // public function delete_labor($id_tindakan_labor)
  //   {
  //       $this->db->where('id_tindakan_labor',$id_tindakan_labor);
  //       $this->db->delete('tindakan_labor_mcu');
  //   }

  public function insert_tindakan($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function selectNamaMcu()
  {
    $this->db->select('*');
    $this->db->where('status', 'AKTIF');
    $this->db->from('list_tindakan_homecare');
    $this->db->order_by('nama_tindakan');
    return $this->db->get()->result_array();
  }


  public function update_kasir($id_mcu, $data)
  {
    $this->db->where('id_pasien', $id_mcu);
    $this->db->update('req_kasir_homecare', $data);
  }
  
   //PERAWAT -------------------------------------------------------------------------------
   public function selectPerawatById($id_mcu)
   {
     // $this->db->select('*');
     $this->db->where(array('id_perawat' => $id_mcu));
     $this->db->from('perawat_homecare');
     return $this->db->get()->result();
   }
   public function selectDataPerawat()
  {
    $this->db->select('*');
   
    $this->db->from('perawat_homecare');
    $this->db->where_not_in('id_perawat', '-');
    $this->db->order_by('nama_perawat');
    return $this->db->get()->result();
  }
  public function selectObatByResep($id_resep)
  {
      $this->db->select('t.*, l.nama, s.nama staff');
      $this->db->from('tindakan_farmasi t, list_logistik l , staff s');
      $this->db->where('t.id_list_tindakan=l.id_logistik');
      $this->db->where('s.id_staff=t.id_staff');
      $this->db->where('t.id_pelayanan', $id_resep);
      $this->db->order_by('t.tanggal desc');

      return $this->db->get()->result();
  }
}
