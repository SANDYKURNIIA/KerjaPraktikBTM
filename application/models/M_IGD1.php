<?php

class M_IGD extends CI_Model{
   function __construct(){
       parent::__construct();
       date_default_timezone_set('Asia/Jakarta');
       setlocale(LC_ALL, 'id_ID');
   }

   public function selectDataPasienIGD()
   {
    $query =$this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  
    FROM v_igd v
    LEFT JOIN req_kasir r
    ON v.id_history = r.id_history
    
     ORDER BY v.tgl_masuk desc");
    return $query->result();
   }

   public function selectDataPasienIGDby_id($id_pelayanan, $id_history)
   {
       $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
       $this->db->from('v_igd');
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

   public function selectDataTindakanByIdPel($id_pelayanan)
   {
       $this->db->select('*');
       $this->db->from('v_tindakan_igd');
       $this->db->where('id_pelayanan', $id_pelayanan);
       return $this->db->get()->result();
   }
   public function selectDataTotalByIdPel($id_pelayanan)
   {
       $this->db->select_sum('total');
       $this->db->from('v_tindakan_igd');
       $this->db->where('id_pelayanan', $id_pelayanan);
       return $this->db->get()->result();
   }

   public function delete_tindakan($id_tindakan_igd)
   {
       $this->db->delete('tindakan_igd', array('id_tindakan_igd' => $id_tindakan_igd));
   }

   public function insert_tindakan($page_data, $table)
   {
       $this->db->insert($table, $page_data);
   }

   public function selectNamaTindakan()
   {
       $this->db->select('DISTINCT(nama) nama_bayar, id_tindakan_igd, harga_jasa, harga_sarana');
       $this->db->where('status', 'AKTIF');
       $this->db->order_by('nama', 'ASC');
       return $this->db->get('list_tindakan_igd')->result_array();
   }
   public function selectDataLaporanUGD()
   {
       date_default_timezone_set('Asia/Jakarta');
       $tgl = date("Y-m-d");
       $this->db->select('h.*, d.nama,  ps.nama pasien');
       $this->db->from('history_pelayanan h, dokter d, pelayanan p, pasien ps');
       $this->db->where('jenis_pelayanan','UGD');
       $this->db->where('h.dpjp=d.id_dokter');
       $this->db->where('h.id_pelayanan=p.id_pelayanan');
       $this->db->where('p.id_pasien= ps.no_rm');
       $this->db->where('h.tgl_masuk', $tgl);
       $this->db->order_by('h.tgl_masuk');
       return $this->db->get()->result();
   }
   public function selectDataRangeLaporanUGD($mulai,$akhir)
   {
    $this->db->select('h.*, d.nama,  ps.nama pasien');
    $this->db->from('history_pelayanan h, dokter d, pelayanan p, pasien ps');
    $this->db->where('jenis_pelayanan','UGD');
    $this->db->where('h.dpjp=d.id_dokter');
    $this->db->where('h.id_pelayanan=p.id_pelayanan');
    $this->db->where('p.id_pasien= ps.no_rm');
    $this->db->where('h.tgl_masuk>=', $mulai);
    $this->db->where('h.tgl_masuk <=', $akhir);
    $this->db->order_by('h.tgl_masuk');
    return $this->db->get()->result();

}



public function selectDataLaporanUGDranap()
{
   date_default_timezone_set('Asia/Jakarta');
   $tgl = date("Y-m-d");
   $hasil = $this->db->query("SELECT h.*, d.nama
       from history_pelayanan h, dokter d
       WHERE jenis_pelayanan='UGD' and h.dpjp=d.id_dokter and tgl_masuk ='$tgl' and  id_pelayanan IN (
       SELECT h.id_pelayanan
       FROM history_pelayanan h
       WHERE jenis_pelayanan='RAWAT INAP' and tgl_masuk ='$tgl'
       )
       ORDER BY tgl_masuk");
   return $hasil->result();
}

public function selectDataRangeLaporanUGDranap($mulai,$akhir)
{ 
$hasil = $this->db->query("SELECT h.*, d.nama
   from history_pelayanan h, dokter d
   WHERE jenis_pelayanan='UGD' and h.dpjp=d.id_dokter and tgl_masuk >='$mulai' and tgl_masuk <='$akhir' and  id_pelayanan IN (
   SELECT h.id_pelayanan
   FROM history_pelayanan h
   WHERE jenis_pelayanan='RAWAT INAP' and tgl_masuk >='$mulai' and tgl_masuk <='$akhir'
   )
   ORDER BY tgl_masuk");
return $hasil->result();
}


//   Radiologi
public function selectDataRadiologiById($id_pelayanan)
{
  $this->db->select('t.*, l.nama, s.nama staff');
  $this->db->from('tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p, staff s');
  $this->db->where('t.id_tindakan=l.id_daftar_tindakan');
  $this->db->where('s.id_staff=t.id_staff');
  $this->db->where('p.id_pelayanan=t.id_pelayanan');
  $this->db->where('t.id_pelayanan',$id_pelayanan);
  $this->db->order_by('t.tanggal','desc');
  return $this->db->get()->result();
}

public function insert_radiologi($data, $table)
{
   $this->db->insert($table, $data);
}

public function Total_Radiologi_Byid($id_pelayanan)
{
   $this->db->select_sum('total');
   $this->db->from('tindakan_radiologi');
   $this->db->where('id_pelayanan',$id_pelayanan);
   return $this->db->get()->result();
}

public function delete_radiologi($id_tindakan_radiologi)
{
 $this->db->delete('tindakan_radiologi', array('id_tindakan_radiologi' => $id_tindakan_radiologi));
}

// End


//   Labor
public function selectNamaRadiologi()
{
  $this->db->select('nama, id_daftar_tindakan, harga');
  $this->db->where('status','AKTIF');
  $this->db->from('list_tindakan_radiologi');
  $this->db->order_by('nama');
  return $this->db->get()->result_array();
}

public function selectDataLaborById($id_pelayanan)
{
 $this->db->select('t.*, l.nama, s.nama staff');
 $this->db->from('tindakan_labor t, list_tindakan_labor l, pelayanan p, staff s');
 $this->db->where('t.id_list_tindakan=l.id_daftar_tindakan');
 $this->db->where('s.id_staff=t.id_staff');
 $this->db->where('p.id_pelayanan=t.id_pelayanan');
 $this->db->where('t.id_form_labor',$id_pelayanan);
 $this->db->order_by('t.tanggal','desc');
 return $this->db->get()->result();
}

public function Total_Labor_Byid($id_pelayanan)
{
   $this->db->select_sum('total');
   $this->db->from('tindakan_labor');
   $this->db->where('id_form_labor',$id_pelayanan);
   return $this->db->get()->result();
}

public function delete_labor($id_tindakan_radiologi)
{
 $this->db->delete('tindakan_labor', array('id_tindakan_labor' => $id_tindakan_radiologi));
}

public function insert_labor($data, $table)
{
   $this->db->insert($table, $data);
}

public function selectNamaLabor()
{
   $this->db->select('nama, id_daftar_tindakan, harga');
   $this->db->where('status','AKTIF');
   $this->db->from('list_tindakan_labor');
   $this->db->order_by('nama');
   return $this->db->get()->result_array();
}

    //   End
    public function getAntrian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select_max('no_antri');
        $this->db->from('antrian_farmasi');
        $this->db->like('tanggal', $tgl);
        return $this->db->get()->result();
    }
    public function getNamaObat()
    {
        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,sl.kadaluarsa,l.margin,l.harga_cost');
        $this->db->from('stok_apotik sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
        
    }
    public function cekJumTindakan($id_pelayanan, $tbTindakan)
    {
        $this->db->select('id_tindakan_igd');
        $this->db->from($tbTindakan);
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function cekJumTindakanObat($id_pelayanan)
    {
       
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_igd v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        
        
    }
    public function cekJumTindakanRad($id_pelayanan)
    {
        
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_igd v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
    }
    public function cekJumTindakanLab($id_pelayanan)
    {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_igd v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
    }

}