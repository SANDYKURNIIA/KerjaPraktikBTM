<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Poli_prio extends CI_Model
{
  ////tindakan Homecare 
  public function selectTindakanHomecare()
  {
    $this->db->select('*');
    $this->db->where('status', 'AKTIF');
    $this->db->from('list_tindakan_homecare');
    $this->db->order_by('nama_tindakan');
    return $this->db->get()->result();
  }
  public function selectDataTindakanHomecare($id)
  {
    $this->db->where('id_list_tindakan', $id);
    return $this->db->get('list_tindakan_homecare')->result();
  }
  public function update_tindakan($id, $data)
  {
    $this->db->where('id_list_tindakan', $id);
    return $this->db->update('list_tindakan_homecare', $data);
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
    $this->db->select('m.*, r.status, d.nama nama_dokter');
    $this->db->from('poli_prioritas m, req_kasir_pp r, dokter d');
    $this->db->where('m.id_pasien=r.id_pasien');
    $this->db->where('m.dpjp=d.id_dokter');
    $this->db->where('status_rawat', 0);
    $this->db->order_by('m.tanggal', $tgl);
    return $this->db->get()->result();
  }

  public function selectDokter()
  {
    $this->db->select('id_dokter, nama');
    $this->db->where('ket', 'prioritas');
    $this->db->where('status', 'AKTIF');
    $this->db->from('dokter');
    $this->db->order_by('nama');
    return $this->db->get()->result_array();
  }


  public function delete_tindakan($id_mcu, $where, $table)
  {
    $this->db->where($where, $id_mcu);
    return $this->db->delete($table);
  }


  //TINDAKAN -------------------------------------------------------------------------------
  public function selectDataPasienMCUby_id($id_mcu)
  {
    // $this->db->select('*');
    $this->db->where(array('id_mcu' => $id_mcu));
    $this->db->from('tindakan_mcu');
    return $this->db->get()->result();
  }
  public function selectDataMcuById($id_mcu, $tabel, $list)
  {
    $this->db->select('t.*, l.nama, s.nama staff, p.nama dpjp');
    $this->db->from($tabel . ' t, ' . $list . ' l, poli_prioritas m, staff s, dokter p');
    $this->db->where('t.id_list_tindakan=l.id_list_tindakan');
    $this->db->where('s.id_staff=t.id_staff');
    $this->db->where('m.id_pasien=t.id_pasien');
    $this->db->where('t.dpjp=p.id_dokter');
    $this->db->where('t.id_pasien', $id_mcu);
    $this->db->order_by('t.tanggal', 'desc');
    return $this->db->get()->result();
  }

  public function Total_Mcu_Byid($id_mcu, $tabel)
  {
    $this->db->select_sum('total');
    $this->db->from($tabel);
    $this->db->where('id_pasien', $id_mcu);
    return $this->db->get()->result();
  }

  public function delete_mcu($id_tindakan_mcu, $tabel)
  {
    $this->db->delete($tabel, array('id_tindakan' => $id_tindakan_mcu));
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
    $this->db->update('req_kasir_pp', $data);
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
  // RADIOLOGI ------------------------------------------------------------------
  public function selectNamaRadiologi()
  {
    $this->db->select('nama, id_daftar_tindakan, harga');
    $this->db->where('status', 'AKTIF');
    $this->db->from('list_tindakan_radiologi_mcu');
    $this->db->order_by('nama');
    return $this->db->get()->result_array();
  }
  public function selectDataPasienRadiologiMCUby_id($id_mcu)
  {
    // $this->db->select('*');
    $this->db->where(array('id_mcu' => $id_mcu));
    $this->db->from('tindakan_radiologi_pp');
    return $this->db->get()->result();
  }
  public function selectDataRadiologiById($id_mcu)
  {
    $this->db->select('t.*, l.nama, s.nama staff');
    $this->db->from('tindakan_radiologi_pp t, list_tindakan_radiologi_mcu l, poli_prioritas m, staff s');
    $this->db->where('t.id_daftar_tindakan=l.id_daftar_tindakan');
    $this->db->where('s.id_staff=t.id_staff');
    $this->db->where('m.id_pasien=t.id_mcu');
    $this->db->where('t.id_mcu', $id_mcu);
    $this->db->order_by('t.tanggal', 'desc');
    return $this->db->get()->result();
  }

  public function insert_radiologi($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function Total_Radiologi_Byid($id_mcu)
  {
    $this->db->select_sum('total');
    $this->db->from('tindakan_radiologi_pp');
    $this->db->where('id_mcu', $id_mcu);
    return $this->db->get()->result();
  }

  public function delete_radiologi($id_tindakan_radiologi)
  {
    $this->db->delete('tindakan_radiologi_pp', array('id_tindakan_radiologi' => $id_tindakan_radiologi));
  }

  //LABOR -------------------------------------------------------------------------------
  public function selectDataPasienLaborMCUby_id($id_mcu)
  {
    // $this->db->select('*');
    $this->db->where(array('id_mcu' => $id_mcu));
    $this->db->from('tindakan_labor_pp');
    return $this->db->get()->result();
  }
  public function selectDataLaborById($id_mcu)
  {
    $this->db->select('t.*, l.nama, s.nama staff');
    $this->db->from('tindakan_labor_pp t, list_tindakan_labor_mcu l, poli_prioritas m, staff s');
    $this->db->where('t.id_daftar_tindakan=l.id_daftar_tindakan');
    $this->db->where('s.id_staff=t.id_staff');
    $this->db->where('m.id_pasien=t.id_mcu');
    $this->db->where('t.id_mcu', $id_mcu);
    $this->db->order_by('t.tanggal', 'desc');
    return $this->db->get()->result();
  }

  public function Total_Labor_Byid($id_mcu)
  {
    $this->db->select_sum('total');
    $this->db->from('tindakan_labor_pp');
    $this->db->where('id_mcu', $id_mcu);
    return $this->db->get()->result();
  }

  public function delete_labor($id_tindakan_labor)
  {
    $this->db->delete('tindakan_labor_pp', array('id_tindakan_labor' => $id_tindakan_labor));
  }
  // public function delete_labor($id_tindakan_labor)
  //   {
  //       $this->db->where('id_tindakan_labor',$id_tindakan_labor);
  //       $this->db->delete('tindakan_labor_mcu');
  //   }

  public function insert_labor($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function selectNamaLabor()
  {
    $this->db->select('nama, id_daftar_tindakan, harga');
    $this->db->where('status', 'AKTIF');
    $this->db->from('list_tindakan_labor_mcu');
    $this->db->order_by('nama');
    return $this->db->get()->result_array();
  }

  //KASIR
  public function getTindakanInternisById($id_mcu)
  {
    $query = $this->db->query("SELECT l.nama nama_tindakan, t.total, t.frek , t.harga
    FROM tindakan_pp_internis t, list_tindakan_poli_internis l
    WHERE t.id_list_tindakan=l.id_list_tindakan
    AND t.id_pasien='$id_mcu'");
    return $query->result_array();
  }
  public function getTindakanBedahById($id_mcu)
  {
    $query = $this->db->query("SELECT l.nama nama_tindakan, t.total, t.frek , t.harga
    FROM tindakan_pp_bedah t, list_tindakan_poli_bedah_umum l
    WHERE t.id_list_tindakan=l.id_list_tindakan
    AND t.id_pasien='$id_mcu'");
    return $query->result_array();
  }
  public function getTindakanObgyneById($id_mcu)
  {
    $query = $this->db->query("SELECT l.nama nama_tindakan, t.total, t.frek , t.harga
    FROM tindakan_pp_obgyne t, list_tindakan_poli_obgyne l
    WHERE t.id_list_tindakan=l.id_list_tindakan
    AND t.id_pasien='$id_mcu'");
    return $query->result_array();
  }
  public function selectPasienHc()
  {
    $query = $this->db->query("SELECT m.*, r.status
    FROM poli_prioritas m, req_kasir_pp r
    WHERE m.id_pasien = r.id_pasien
    AND r.status = 1
    AND m.status_bayar = 0
    AND m.status_rawat = 0
    ORDER BY m.tanggal DESC");
    return $query->result();
  }
  public function getHcById($id_mcu)
  {
    $this->db->select('h.*,d.nama nama_dokter');
    $this->db->from('poli_prioritas h,dokter d');
    $this->db->where('h.dpjp = d.id_dokter');
    $this->db->where('h.id_pasien', $id_mcu);
    return $this->db->get()->row_array();
  }
  public function getDpDiscHc($id_pelayanan)
  {
    $this->db->select('diskon, total_harga, status');
    $this->db->where('id_pasien', $id_pelayanan);
    return $this->db->get('detail_kasir_homecare')->result();
  }
  public function getObatHcById($id_mcu)
  {
    $query = $this->db->query("SELECT l.nama, t.total, t.frek , t.harga
  FROM tindakan_farmasi t, list_logistik l
  WHERE t.id_list_tindakan=l.id_logistik
  AND t.id_pelayanan='$id_mcu'");
    return $query->result_array();
  }
  public function getLaborById($id_mcu)
  {
    $query = $this->db->query("SELECT l.nama, t.total, t.frek , t.harga
    FROM tindakan_labor_pp t, list_tindakan_labor_mcu l
    WHERE t.id_daftar_tindakan=l.id_daftar_tindakan
    AND t.id_mcu='$id_mcu'");
    return $query->result_array();
  }
  public function getRadioById($id_mcu)
  {
    $query = $this->db->query("SELECT l.nama , t.total, t.frek , t.harga
    FROM tindakan_radiologi_pp t, list_tindakan_radiologi_mcu l
    WHERE t.id_daftar_tindakan=l.id_daftar_tindakan
    AND t.id_mcu='$id_mcu'");
    return $query->result_array();
  }
}
