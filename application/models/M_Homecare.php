<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Homecare extends CI_Model
{
  //LAPORAN KUNJUNGAN MCU
  public function selectKunjunganMcu()
  {
    $tgl = date("Y-m-d ");
    $this->db->select('*');
    $this->db->from('mcu');
    $this->db->where('status_bayar', 1);
    $this->db->like('tgl_keluar', $tgl);
    $this->db->order_by('tgl_keluar asc');
    return $this->db->get()->result();
  }
  public function selectRangeKunjunganMcu($mulai, $akhir)
  {
    $tgl = date("Y-m-d ");
    $this->db->select('*');
    $this->db->from('mcu');
    $this->db->where('status_bayar', 1);
    $this->db->where('tgl_keluar>=', $mulai);
    $this->db->where('tgl_keluar<=', $akhir);
    $this->db->order_by('tgl_keluar asc');
    return $this->db->get()->result();
  }

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
  public function insert_tindakan_homecare($data, $table)
  {
    $this->db->insert($table, $data);
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
    $this->db->select('m.*, r.status, c.nama cara_bayar');
    $this->db->from('homecare m, req_kasir_homecare r, cara_bayar c');
    $this->db->where('m.id_pasien=r.id_pasien');
    $this->db->where('m.cara_bayar=c.id_cara_bayar');
    // $this->db->where('status_rawat', 0);
    $this->db->order_by('m.tanggal', 'desc');
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
  public function insert_mcu2($page_data, $table)
  {
    $this->db->insert($table, $page_data);
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
    $this->db->select('t.*, l.nama_tindakan, s.nama staff, p.nama_perawat, d.nama dokter');
    $this->db->from('tindakan_homecare t, list_tindakan_homecare l, homecare m, staff s, perawat_homecare p, dokter d');
    $this->db->where('t.id_list_tindakan=l.id_list_tindakan');
    $this->db->where('s.id_staff=t.id_staff');
    $this->db->where('m.id_pasien=t.id_pasien');
    $this->db->where('t.id_perawat=p.id_perawat');
    $this->db->where('t.nama_dokter=d.id_dokter');
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
  public function selectResepById($id_pelayanan)
  {
    $this->db->select('r.*, p.cara_bayar,s.nama staff');
    $this->db->from('resep_obat r, homecare p,staff s');
    $this->db->where('r.id_pelayanan = p.id_pasien');
    $this->db->where('r.id_staff = s.id_staff');
    $this->db->where('r.id_pelayanan', $id_pelayanan);
    $this->db->order_by('r.tanggal', 'desc');
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
  public function getNamaObat()
  {
    $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
    $this->db->from('stok_homecare sl, list_logistik l');
    $this->db->where(' sl.id_logistik=l.id_logistik');
    $this->db->group_by('sl.id_logistik');
    $this->db->having('stok>0');
    $this->db->order_by('nama');
    return $this->db->get()->result_array();
  }
  // Amirul
  public function getNamaObat2()
  {
    $this->db->select('sl.id_logistik, l.nama , SUM(sl.frek) stok, max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
    $this->db->from('stok_jenazah sl, list_logistik l');
    $this->db->where(' sl.id_logistik=l.id_logistik');
    $this->db->group_by('sl.id_logistik');
    $this->db->having('stok>0');
    $this->db->order_by('nama');
    return $this->db->get()->result_array();
  }
  public function selectObatById($id_pelayanan)
  {
    $this->db->select('t.*, l.nama, s.nama staff');
    $this->db->from(' tindakan_farmasi t, list_logistik l , staff s');
    $this->db->where('t.id_list_tindakan=l.id_logistik');
    $this->db->where('s.id_staff=t.id_staff');
    $this->db->where('t.id_resep', 'OBAT RUANG');
    $this->db->where('t.id_pelayanan', $id_pelayanan);
    $this->db->order_by('t.tanggal desc');

    return $this->db->get()->result();
  }
  public function getTotalObat($id_pelayanan)
  {
    $this->db->select_sum('total');
    $this->db->from('tindakan_farmasi');
    $this->db->where('id_resep', 'OBAT RUANG');
    $this->db->where('id_pelayanan', $id_pelayanan);
    return $this->db->get()->result();
  }
  public function getPasienById($id_pelayanan)
  {
    $this->db->select('h.nama,h.tgl_lahir tanggal,c.nama cara_bayar,"-" as dpjp');
    $this->db->from('homecare h, cara_bayar c');
    $this->db->where('h.cara_bayar = c.id_cara_bayar');
    $this->db->where('h.id_pasien', $id_pelayanan);
    return $this->db->get()->row_array();
  }
  public function getSignaByResep($id_resep)
  {
    $this->db->select('f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat, s.tindakan id_signa, c.cara_pemakaian id_cara_pakai');
    $this->db->from('tindakan_farmasi f , list_logistik l ,  resep_obat r, signa_obat s, cara_pemakaian_obat c');
    $this->db->where('r.id_resep=f.id_resep');
    $this->db->where('f.id_list_tindakan=l.id_logistik');
    $this->db->where('f.id_signa=s.id_signa');
    $this->db->where('f.id_cara_pakai=c.id_cara_pemakaian');
    $this->db->where('f.id_resep', $id_resep);


    return $this->db->get()->result_array();
  }

  ////KAMAR JENAZAH 
  public function selectKamarJenazah()
  {
    $this->db->select('*');
    $this->db->from('kamar_jenazah');
    $this->db->order_by('nama_pasien');
    return $this->db->get()->result();
  }
  public function selectDataKamarJenazah($id)
  {
    $this->db->where('id_pasien', $id);
    return $this->db->get('kamar_jenazah')->result();
  }
  public function update_kamar_jenazah($id, $data)
  {
    $this->db->where('id_pasien', $id);
    return $this->db->update('kamar_jenazah', $data);
  }
  public function insert_kamar_jenazah($data, $table)
  {
    $this->db->insert($table, $data);
  }
  public function selectDataJenazahById($id_mcu)
  {
    $this->db->select('t.*, l.nama_tindakan, s.nama staff, p.nama_perawat');
    $this->db->from('tindakan_kamar_jenazah t, list_tindakan_jenazah l, staff s, perawat_homecare p');
    $this->db->where('t.id_list_tindakan=l.id_list_tindakan');
    $this->db->where('s.id_staff=t.id_staff');
    $this->db->where('t.id_perawat=p.id_perawat');
    $this->db->where('t.id_pasien', $id_mcu);
    $this->db->order_by('t.tanggal', 'desc');
    return $this->db->get()->result();
  }

  public function delete_detail_mcu($id, $where, $table)
  {
    $this->db->where($where, $id);
    return $this->db->delete($table);
  }

  //TINDAKAN JENAZAH
  public function selectTindakanJenazah()
  {
    $this->db->select('*');
    $this->db->where('status', 'AKTIF');
    $this->db->from('list_tindakan_jenazah');
    $this->db->order_by('nama_tindakan');
    return $this->db->get()->result();
  }
  public function selectDataTindakanJenazah($id)
  {
    $this->db->where('id_list_tindakan', $id);
    return $this->db->get('list_tindakan_jenazah')->result();
  }
  public function update_tindakan_jasa_jenazah($id, $data)
  {
    $this->db->where('id_list_tindakan', $id);
    return $this->db->update('list_tindakan_jenazah', $data);
  }
  public function insert_tindakan_jasa_jenazah($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function selectDataNamaTindakan()
  {
    $this->db->select('*');
    $this->db->order_by('nama_tindakan', 'ASC');
    return $this->db->get('list_tindakan_jenazah')->result_array();
  }
  
  public function selectDataNamaPerawat()
  {
    $this->db->select('nama_perawat, id_perawat');
    $this->db->order_by('nama_perawat', 'ASC');
    return $this->db->get('perawat_homecare')->result_array();
  }

  public function get_nama_dokter()
  {
    $query = $this->db->get('dokter'); // Ganti 'dokter' dengan nama tabel yang sesuai
    return $query->result();
  }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Homecare extends CI_Model
{
  //LAPORAN KUNJUNGAN MCU
  public function selectKunjunganMcu()
  {
    $tgl = date("Y-m-d ");
    $this->db->select('*');
    $this->db->from('mcu');
    $this->db->where('status_bayar', 1);
    $this->db->like('tgl_keluar', $tgl);
    $this->db->order_by('tgl_keluar asc');
    return $this->db->get()->result();
  }
  public function selectRangeKunjunganMcu($mulai, $akhir)
  {
    $tgl = date("Y-m-d ");
    $this->db->select('*');
    $this->db->from('mcu');
    $this->db->where('status_bayar', 1);
    $this->db->where('tgl_keluar>=', $mulai);
    $this->db->where('tgl_keluar<=', $akhir);
    $this->db->order_by('tgl_keluar asc');
    return $this->db->get()->result();
  }

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
  public function insert_tindakan_homecare($data, $table)
  {
    $this->db->insert($table, $data);
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
    $this->db->select('m.*, r.status, c.nama cara_bayar');
    $this->db->from('homecare m, req_kasir_homecare r, cara_bayar c');
    $this->db->where('m.id_pasien=r.id_pasien');
    $this->db->where('m.cara_bayar=c.id_cara_bayar');
    // $this->db->where('status_rawat', 0);
    $this->db->order_by('m.tanggal', 'desc');
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
  public function insert_mcu2($page_data, $table)
  {
    $this->db->insert($table, $page_data);
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
    $this->db->select('t.*, l.nama_tindakan, s.nama staff, p.nama_perawat, d.nama dokter');
    $this->db->from('tindakan_homecare t, list_tindakan_homecare l, homecare m, staff s, perawat_homecare p, dokter d');
    $this->db->where('t.id_list_tindakan=l.id_list_tindakan');
    $this->db->where('s.id_staff=t.id_staff');
    $this->db->where('m.id_pasien=t.id_pasien');
    $this->db->where('t.id_perawat=p.id_perawat');
    $this->db->where('t.nama_dokter=d.id_dokter');
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
  public function selectResepById($id_pelayanan)
  {
    $this->db->select('r.*, p.cara_bayar,s.nama staff');
    $this->db->from('resep_obat r, homecare p,staff s');
    $this->db->where('r.id_pelayanan = p.id_pasien');
    $this->db->where('r.id_staff = s.id_staff');
    $this->db->where('r.id_pelayanan', $id_pelayanan);
    $this->db->order_by('r.tanggal', 'desc');
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
  public function getNamaObat()
  {
    $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
    $this->db->from('stok_homecare sl, list_logistik l');
    $this->db->where(' sl.id_logistik=l.id_logistik');
    $this->db->group_by('sl.id_logistik');
    $this->db->having('stok>0');
    $this->db->order_by('nama');
    return $this->db->get()->result_array();
  }
  // Amirul
  public function getNamaObat2()
  {
    $this->db->select('sl.id_logistik, l.nama , SUM(sl.frek) stok, max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
    $this->db->from('stok_jenazah sl, list_logistik l');
    $this->db->where(' sl.id_logistik=l.id_logistik');
    $this->db->group_by('sl.id_logistik');
    $this->db->having('stok>0');
    $this->db->order_by('nama');
    return $this->db->get()->result_array();
  }
  public function selectObatById($id_pelayanan)
  {
    $this->db->select('t.*, l.nama, s.nama staff');
    $this->db->from(' tindakan_farmasi t, list_logistik l , staff s');
    $this->db->where('t.id_list_tindakan=l.id_logistik');
    $this->db->where('s.id_staff=t.id_staff');
    $this->db->where('t.id_resep', 'OBAT RUANG');
    $this->db->where('t.id_pelayanan', $id_pelayanan);
    $this->db->order_by('t.tanggal desc');

    return $this->db->get()->result();
  }
  public function getTotalObat($id_pelayanan)
  {
    $this->db->select_sum('total');
    $this->db->from('tindakan_farmasi');
    $this->db->where('id_resep', 'OBAT RUANG');
    $this->db->where('id_pelayanan', $id_pelayanan);
    return $this->db->get()->result();
  }
  public function getPasienById($id_pelayanan)
  {
    $this->db->select('h.nama,h.tgl_lahir tanggal,c.nama cara_bayar,"-" as dpjp');
    $this->db->from('homecare h, cara_bayar c');
    $this->db->where('h.cara_bayar = c.id_cara_bayar');
    $this->db->where('h.id_pasien', $id_pelayanan);
    return $this->db->get()->row_array();
  }
  public function getSignaByResep($id_resep)
  {
    $this->db->select('f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat, s.tindakan id_signa, c.cara_pemakaian id_cara_pakai');
    $this->db->from('tindakan_farmasi f , list_logistik l ,  resep_obat r, signa_obat s, cara_pemakaian_obat c');
    $this->db->where('r.id_resep=f.id_resep');
    $this->db->where('f.id_list_tindakan=l.id_logistik');
    $this->db->where('f.id_signa=s.id_signa');
    $this->db->where('f.id_cara_pakai=c.id_cara_pemakaian');
    $this->db->where('f.id_resep', $id_resep);


    return $this->db->get()->result_array();
  }

  ////KAMAR JENAZAH 
  public function selectKamarJenazah()
  {
    $this->db->select('*');
    $this->db->from('kamar_jenazah');
    $this->db->order_by('nama_pasien');
    return $this->db->get()->result();
  }
  public function selectDataKamarJenazah($id)
  {
    $this->db->where('id_pasien', $id);
    return $this->db->get('kamar_jenazah')->result();
  }
  public function update_kamar_jenazah($id, $data)
  {
    $this->db->where('id_pasien', $id);
    return $this->db->update('kamar_jenazah', $data);
  }
  public function insert_kamar_jenazah($data, $table)
  {
    $this->db->insert($table, $data);
  }
  public function selectDataJenazahById($id_mcu)
  {
    $this->db->select('t.*, l.nama_tindakan, s.nama staff, p.nama_perawat');
    $this->db->from('tindakan_kamar_jenazah t, list_tindakan_jenazah l, staff s, perawat_homecare p');
    $this->db->where('t.id_list_tindakan=l.id_list_tindakan');
    $this->db->where('s.id_staff=t.id_staff');
    $this->db->where('t.id_perawat=p.id_perawat');
    $this->db->where('t.id_pasien', $id_mcu);
    $this->db->order_by('t.tanggal', 'desc');
    return $this->db->get()->result();
  }

  public function delete_detail_mcu($id, $where, $table)
  {
    $this->db->where($where, $id);
    return $this->db->delete($table);
  }

  //TINDAKAN JENAZAH
  public function selectTindakanJenazah()
  {
    $this->db->select('*');
    $this->db->where('status', 'AKTIF');
    $this->db->from('list_tindakan_jenazah');
    $this->db->order_by('nama_tindakan');
    return $this->db->get()->result();
  }
  public function selectDataTindakanJenazah($id)
  {
    $this->db->where('id_list_tindakan', $id);
    return $this->db->get('list_tindakan_jenazah')->result();
  }
  public function update_tindakan_jasa_jenazah($id, $data)
  {
    $this->db->where('id_list_tindakan', $id);
    return $this->db->update('list_tindakan_jenazah', $data);
  }
  public function insert_tindakan_jasa_jenazah($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function selectDataNamaTindakan()
  {
    $this->db->select('*');
    $this->db->order_by('nama_tindakan', 'ASC');
    return $this->db->get('list_tindakan_jenazah')->result_array();
  }
  
  public function selectDataNamaPerawat()
  {
    $this->db->select('nama_perawat, id_perawat');
    $this->db->order_by('nama_perawat', 'ASC');
    return $this->db->get('perawat_homecare')->result_array();
  }

  public function get_nama_dokter()
  {
    $query = $this->db->get('dokter'); // Ganti 'dokter' dengan nama tabel yang sesuai
    return $query->result();
  }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
