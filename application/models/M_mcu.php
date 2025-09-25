<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_mcu extends CI_Model
{
  public function checkData($id_mcu, $table)
  {
    $this->db->from($table);
    $this->db->where('id_mcu', $id_mcu);
    return $this->db->get()->row_array();
  }
  public function get_cek_like($cari_data)
  {
    $this->db->like('no_rm', $cari_data, 'both');
    $this->db->or_like('nama', $cari_data, 'both');
    $this->db->or_like('tgl_lahir', $cari_data, 'both');
    $this->db->limit(7);
    $result = $this->db->get('pasien')->result();
    return $result;
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
    $this->db->from('mcu m, req_kasir_mcu r');
    $this->db->where('m.id_mcu=r.id_mcu');
    $this->db->order_by('m.tanggal', 'DESC');
    return $this->db->get()->result();
  }
  public function selectNamaDPJP()
  {
    $this->db->select('nama, id_dokter');
    $this->db->where_not_in('id_dokter');
    $this->db->where('status', 'AKTIF');
    $this->db->from('dokter');
    $this->db->order_by('nama');
    return $this->db->get()->result();
  }

  public function getMCUById($id_mcu)
  {
    $this->db->select('m.*, p.no_rm,p.no_ktp,p.jenis_kelamin,p.kota,p.no_hp,p.status sts_kawin, p.agama, p.kelurahan,p.kecamatan,p.provinsi');
    $this->db->from('mcu m');
    $this->db->join('pasien p', 'm.no_rm=p.no_rm', 'left');
    $this->db->where('m.id_mcu', $id_mcu);
    $query = $this->db->get();
    return $query->row_array();
  }

  // Amirul
  public function selectDataMcuu($id)
  {
    $this->db->where('id_mcu', $id);
    return $this->db->get('mcu')->result();
  }
  public function update_tindakan_mcu_shap($id, $data)
  {
    $this->db->where('id_mcu', $id);
    return $this->db->update('mcu', $data);
  }

  public function getDetailMCUById($id_mcu)
  {
    $this->db->select('m.nama_pasien, m.tgl_lahir, m.perusahaan, m.occupation,d.examined, d.present,d.summary');
    $this->db->from('mcu m, detail_mcu d');
    $this->db->where('m.id_mcu', $id_mcu);
    $this->db->where('m.id_mcu=d.id_mcu');
    $query = $this->db->get();
    return $query->row_array();
  }
  public function delete_data_mcu($id_mcu)
  {
    $this->db->where('id_mcu', $id_mcu);
    return $this->db->delete('mcu');
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
    $this->db->select('t.*, l.nama, s.nama staff');
    $this->db->from('tindakan_mcu t, list_tindakan_mcu l, mcu m, staff s');
    $this->db->where('t.id_list_tindakan=l.id_list_tindakan_mcu');
    $this->db->where('s.id_staff=t.id_staff');
    $this->db->where('m.id_mcu=t.id_mcu');
    $this->db->where('t.id_mcu', $id_mcu);
    $this->db->order_by('t.tanggal', 'desc');
    return $this->db->get()->result();
  }

  public function Total_Mcu_Byid($id_mcu)
  {
    $this->db->select_sum('t.total');
    $this->db->from('tindakan_mcu t , list_tindakan_mcu l');
    $this->db->where('t.id_list_tindakan=l.id_list_tindakan_mcu');
    $this->db->where('t.id_mcu', $id_mcu);
    return $this->db->get()->result();
  }

  public function delete_mcu($id_tindakan_mcu)
  {
    $this->db->delete('tindakan_mcu', array('id_tindakan_mcu' => $id_tindakan_mcu));
  }

  //delete pasien mcu
  public function delete_pasien_mcu($id_mcu)
  {
    $this->db->delete('mcu', array('id_mcu' => $id_mcu));
  }


  // public function delete_labor($id_tindakan_labor)
  //   {
  //       $this->db->where('id_tindakan_labor',$id_tindakan_labor);
  //       $this->db->delete('tindakan_labor_mcu');
  //   }

  public function insert_tindakan($data, $table)
  {
    $this->db->insert($table, $data);
    return $this->db->insert_id();
  }

  public function selectNamaMcu()
  {
    $this->db->select('nama, id_list_tindakan_mcu id_daftar_tindakan, harga');
    $this->db->where('status', 'AKTIF');
    $this->db->from('list_tindakan_mcu');
    $this->db->order_by('nama');
    return $this->db->get()->result_array();
  }


  //PAKET -------------------------------------------------------------------------------

  public function selectPaketMcuById($id_mcu)
  {

    return $this->db->query("SELECT d.nama, t.harga, t.frek,s.nama staff, t.id_tindakan_mcu id_tindakan, l.nama_paket,t.tanggal, 'mcu' tabel 
    from tindakan_mcu t, detail_paket_mcu d, list_paket_mcu l, staff s
    where t.id_list_tindakan = d.id_list_tindakan and d.id_paket = l.id_paket_mcu and t.id_paket=l.id_paket_mcu and s.id_staff = t.id_staff and d.tipe = 'list_tindakan_mcu' and l.jenis='MCU' and t.id_mcu = '$id_mcu'
    UNION ALL
    SELECT d.nama, t.harga, t.frek,s.nama staff, t.id_tindakan_radiologi id_tindakan , l.nama_paket,t.tanggal, 'radiologi' tabel 
    from tindakan_radiologi_mcu t, detail_paket_mcu d, list_paket_mcu l, staff s
    where t.id_daftar_tindakan = d.id_list_tindakan and d.id_paket = l.id_paket_mcu and t.id_paket=l.id_paket_mcu and s.id_staff = t.id_staff and d.tipe = 'list_tindakan_radiologi_mcu' and l.jenis='MCU' and t.id_mcu = '$id_mcu'
    UNION ALL
    SELECT d.nama, t.harga, t.frek,s.nama staff, t.id_tindakan_labor id_tindakan , l.nama_paket,t.tanggal, 'labor' tabel
    from tindakan_labor_mcu t, detail_paket_mcu d, list_paket_mcu l, staff s
    where t.id_daftar_tindakan = d.id_list_tindakan and d.id_paket = l.id_paket_mcu and t.id_paket=l.id_paket_mcu and s.id_staff = t.id_staff and d.tipe = 'list_tindakan_labor' and l.jenis='MCU' and t.id_mcu = '$id_mcu'
    
    ")->result();
  }


  public function Total_paket_Byid($id_mcu)
  {
    return $this->db->query("SELECT sum(total) total from (SELECT sum(total) total
    from tindakan_mcu
    where id_mcu = '$id_mcu'
    UNION ALL
    SELECT sum(total) total
    from tindakan_radiologi_mcu 
    where id_mcu = '$id_mcu'
    UNION ALL
    SELECT sum(total) total
    from tindakan_labor_mcu 
    where id_mcu = '$id_mcu') as gabung
    
    ")->result();
  }
  // public function delete_labor($id_tindakan_labor)
  //   {
  //       $this->db->where('id_tindakan_labor',$id_tindakan_labor);
  //       $this->db->delete('tindakan_labor_mcu');
  //   }


  // RADIOLOGI ------------------------------------------------------------------
  public function selectNamaRadiologi()
  {
    $this->db->select('nama, id_daftar_tindakan , harga');
    $this->db->where('status', 'AKTIF');
    $this->db->where('tipe_kamar', 'KELAS III');
    $this->db->from('list_tindakan_radiologi_mcu');
    $this->db->order_by('nama');
    return $this->db->get()->result_array();
  }
  public function selectDataPasienRadiologiMCUby_id($id_mcu)
  {
    // $this->db->select('*');
    $this->db->where(array('id_mcu' => $id_mcu));
    $this->db->from('tindakan_radiologi_mcu');
    return $this->db->get()->result();
  }
  public function selectDataRadiologiById($id_mcu)
  {
    $this->db->select('t.*, l.nama, s.nama staff');
    $this->db->from('tindakan_radiologi_mcu t, list_tindakan_radiologi_mcu l, mcu m, staff s');
    $this->db->where('t.id_daftar_tindakan=l.id_daftar_tindakan');
    $this->db->where('s.id_staff=t.id_staff');
    $this->db->where('m.id_mcu=t.id_mcu');
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
    $this->db->from('tindakan_radiologi_mcu');
    $this->db->where('id_mcu', $id_mcu);
    return $this->db->get()->result();
  }

  public function delete_radiologi($id_tindakan_radiologi)
  {
    $this->db->delete('tindakan_radiologi_mcu', array('id_tindakan_radiologi' => $id_tindakan_radiologi));
  }

  //LABOR -------------------------------------------------------------------------------
  public function selectDataPasienLaborMCUby_id($id_mcu)
  {
    // $this->db->select('*');
    $this->db->where(array('id_mcu' => $id_mcu));
    $this->db->from('tindakan_labor_mcu');
    return $this->db->get()->result();
  }
  public function selectDataLaborById($id_mcu)
  {
    $this->db->select('t.*, l.nama, s.nama staff');
    $this->db->from('tindakan_labor_mcu t, list_tindakan_labor l, mcu m, staff s');
    $this->db->where('t.id_daftar_tindakan=l.id_daftar_tindakan');
    $this->db->where('s.id_staff=t.id_staff');
    $this->db->where('m.id_mcu=t.id_mcu');
    $this->db->where('t.id_form_labor', $id_mcu);
    $this->db->order_by('t.tanggal', 'desc');
    return $this->db->get()->result();
  }

  public function selectDataFormById_Labor($id_tindakan)
  {
    $this->db->select('t.*, l.nama');
    $this->db->from('tindakan_labor_mcu t, list_tindakan_labor l');
    $this->db->where('t.id_daftar_tindakan=l.id_daftar_tindakan');
    $this->db->where('t.id_tindakan_labor', $id_tindakan);
    $this->db->order_by('t.tanggal', 'desc');
    return $this->db->get()->result();
  }

  public function Total_Labor_Byid($id_mcu)
  {
    $this->db->select_sum('total');
    $this->db->from('tindakan_labor_mcu');
    $this->db->where('id_form_labor', $id_mcu);
    return $this->db->get()->result();
  }

  // delete form labor
  public function delete_tindakan($id, $table, $where)
  {
    $this->db->delete($table, array($where => $id));
  }

  public function delete_labor($id_tindakan_labor)
  {
    $this->db->delete('tindakan_labor_mcu', array('id_tindakan_labor' => $id_tindakan_labor));
  }
  // public function delete_labor($id_tindakan_labor)
  //   {
  //       $this->db->where('id_tindakan_labor',$id_tindakan_labor);
  //       $this->db->delete('tindakan_labor_mcu');
  //   }

  public function insert_labor($data, $table)
  {
    $this->db->insert($table, $data);
    return $this->db->insert_id();
  }

  public function selectNamaLabor()
  {
    $this->db->select('*');
    $this->db->where('status', 'AKTIF');
    $this->db->where('tipe_kamar', 'KELAS III');
    $this->db->from('list_tindakan_labor');
    // $this->db->order_by('nama');
    return $this->db->get()->result_array();
  }
  public function update_kasir($id_mcu, $data)
  {
    $this->db->where('id_mcu', $id_mcu);
    $this->db->update('req_kasir_mcu', $data);
  }
  //LAPORAN KUNJUNGAN MCU
  public function selectKunjunganMcu()
  {
    $tgl = date("Y-m-d ");
    $this->db->select('*');
    $this->db->from('mcu');
    // $this->db->where('status_bayar', 1);
    $this->db->like('tanggal', $tgl);
    $this->db->order_by('tanggal asc');
    return $this->db->get()->result();
  }
  public function selectRangeKunjunganMcu($mulai, $akhir)
  {
    $tgl = date("Y-m-d ");
    $this->db->select('*');
    $this->db->from('mcu');
    // $this->db->where('status_bayar', 1);
    $this->db->where('tanggal>=', $mulai);
    $this->db->where('tanggal<=', $akhir);
    $this->db->order_by('tanggal asc');
    return $this->db->get()->result();
  }

  ////tindakan mcu
  public function selectTindakanMcu()
  {
    $this->db->select('*');
    $this->db->where('status', 'AKTIF');
    $this->db->from('list_tindakan_mcu');
    $this->db->order_by('nama');
    return $this->db->get()->result();
  }
  public function selectDataTindakanMcu($id)
  {
    $this->db->where('id_list_tindakan_mcu', $id);
    return $this->db->get('list_tindakan_mcu')->result();
  }
  public function update_tindakan($id, $data)
  {
    $this->db->where('id_list_tindakan_mcu', $id);
    return $this->db->update('list_tindakan_mcu', $data);
  }

  ////paket mcu
  public function selectPaketMcu()
  {
    $this->db->select('*');
    $this->db->where('status', 'AKTIF');
    $this->db->where('jenis', 'MCU');
    $this->db->from('list_paket_mcu');
    $this->db->order_by('nama_paket');
    return $this->db->get()->result();
  }
  public function selectDataPaketMcu($id)
  {
    $this->db->where('id_paket_mcu', $id);
    return $this->db->get('list_paket_mcu')->result();
  }
  public function update_paket($id, $data)
  {
    $this->db->where('id_paket_mcu', $id);
    return $this->db->update('list_paket_mcu', $data);
  }

  ////Labor Mcu
  public function selectTindakanLaborMcu()
  {
    $this->db->select('*');
    $this->db->where('status', 'AKTIF');
    $this->db->where('tipe_kamar', 'KELAS III');
    $this->db->from('list_tindakan_labor');
    $this->db->order_by('nama');
    return $this->db->get()->result();
  }
  public function selectDataLaborMcu($id)
  {
    $this->db->where('id_daftar_tindakan', $id);
    return $this->db->get('list_tindakan_labor')->result();
  }
  public function update_labor_mcu($id, $data)
  {
    $this->db->where('id_daftar_tindakan', $id);
    return $this->db->update('list_tindakan_labor', $data);
  }

  ///Radiologi Mcu
  public function selectTindakanRadioMcu()
  {
    $this->db->select('*');
    $this->db->where('status', 'AKTIF');
    $this->db->from('list_tindakan_radiologi_mcu');
    $this->db->order_by('nama');
    return $this->db->get()->result();
  }
  public function selectDataRadioMcu($id)
  {
    $this->db->where('id_daftar_tindakan', $id);
    return $this->db->get('list_tindakan_radiologi_mcu')->result();
  }
  public function update_radiologi_mcu($id, $data)
  {
    $this->db->where('id_daftar_tindakan', $id);
    return $this->db->update('list_tindakan_radiologi_mcu', $data);
  }

  public function __getDataById($id)
  {
    return $this->db->get_where("penyakit_dalam", array("id_mcu" => $id));
  }

  public function getPYKById($id_mcu)
  {
    $this->db->select('*');
    $this->db->from('penyakit_dalam');
    $this->db->where('id_mcu', $id_mcu);
    $query = $this->db->get();
    return $query->row_array();
  }

  // public function getPYKById($id_mcu)
  // {
  //   $this->db->select('*');
  //   $this->db->from('penyakit_dalam');
  //   $this->db->where('id_mcu', $id_mcu);
  //   $query = $this->db->get();
  //   return $query->row_array();
  // }

  public function getKDGById($id_mcu)
  {
    $this->db->select('*');
    $this->db->from('periksa_kandungan');
    $this->db->where('id_mcu', $id_mcu);
    $query = $this->db->get();
    return $query->row_array();
  }

  // public function getKDGById($id_mcu)
  // {
  //   $this->db->select('*');
  //   $this->db->from('periksa_kandungan');
  //   $this->db->where('id_mcu', $id_mcu);
  //   $query = $this->db->get();
  //   return $query->row_array();
  // }

  public function getEkgById($id_mcu)
  {
    $this->db->select('*');
    $this->db->from('periksa_ekg');
    $this->db->where('id_mcu', $id_mcu);
    $query = $this->db->get();
    return $query->row_array();
  }
  public function getSpriById($id_mcu)
  {
    $this->db->select('*');
    $this->db->from('periksa_spirometri');
    $this->db->where('id_mcu', $id_mcu);
    $query = $this->db->get();
    return $query->row_array();
  }
  public function getDKTRById($id_mcu)
  {
    $this->db->select('*');
    $this->db->from('dokterspesialis_bedah');
    $this->db->where('id_mcu', $id_mcu);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function getJANById($id_mcu)
  {
    $this->db->select('*');
    $this->db->from('penyakit_jantung');
    $this->db->where('id_mcu', $id_mcu);
    $query = $this->db->get();
    return $query->row_array();
  }

  // public function getJANById($id_mcu)
  // {
  //   $this->db->select('*');
  //   $this->db->from('penyakit_jantung');
  //   $this->db->where('id_mcu', $id_mcu);
  //   $query = $this->db->get();
  //   return $query->row_array();
  // }

  public function getPARUById($id_mcu)
  {
    $this->db->select('*');
    $this->db->from('penyakit_paru');
    $this->db->where('id_mcu', $id_mcu);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function getGIGIById($id_mcu)
  {
    $this->db->select('*');
    $this->db->from('periksa_gigi');
    $this->db->where('id_mcu', $id_mcu);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function getREHABById($id_mcu)
  {
    $this->db->select('*');
    $this->db->from('rehab');
    $this->db->where('id_mcu', $id_mcu);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function getNeuById($id_mcu)
  {
    $this->db->select('*');
    $this->db->from('pemeriksaan_neurologi');
    $this->db->where('id_mcu', $id_mcu);
    $query = $this->db->get();
    return $query->row_array();
  }
  public function cetakResumeMed($id)
  {
    $this->db->select('f.*,d.*,u.nama_diagnosa,"" as diagnosa, p.nama,p.tgl_lahir,p.jenis_kelamin,b.tanggal tgl_masuk,c.nama cara_bayar');
    $this->db->from('mcu b');
    $this->db->join('form_assesmen_awal_rajal f', 'f.id_pelayanan = b.id_mcu');
    $this->db->join('form_assesmen_dokter d', 'd.id_pelayanan = b.id_mcu');
    $this->db->join('diagnosa_utama u', 'u.id_pelayanan = b.id_mcu');
    $this->db->join('dokter dok', 'd.staff = dok.username', 'left');
    $this->db->join('pasien p', 'b.no_rm = p.no_rm');
    $this->db->join('cara_bayar c','b.cara_bayar = c.id_cara_bayar');
    $this->db->where('b.id_mcu', $id);
    $this->db->group_by('b.id_mcu');

    return $this->db->get()->row_array();
  }
    public function getRiwayatById($id_mcu)
  {
    return $this->db->get_where('quiz_riwayat_kesehatan', ['id_mcu' => $id_mcu])->row_array();
  }


   public function simpan_riwayat_pekerjaan_kini($data) 
  {
      $table = 'riwayat_pekerjaan_kini';
      $id_mcu = $data['id_mcu'];
  
      // cek apakah sudah ada data untuk id_mcu ini
      $existing = $this->db->get_where($table, ['id_mcu' => $id_mcu])->row();
  
      if ($existing) {
          // kalau ada -> update record yang sama
          $this->db->where('id_mcu', $id_mcu);
          return $this->db->update($table, $data);
      } else {
          // kalau belum ada -> insert
          return $this->db->insert($table, $data);
      }
  }

}
