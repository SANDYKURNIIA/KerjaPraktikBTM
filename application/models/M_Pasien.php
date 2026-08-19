<?php

class M_Pasien extends CI_Model
{

  public function selectDataPasienRawatJalan()
  {
    $tgl = date("Y-m-d");
    $this->db->select("v.*,a.no_antri,a.id_antrian");
    $this->db->where('v.status', '1');
    $this->db->where_not_in('v.status_rawat', 'selesai');
    $this->db->like('v.tgl_masuk', $tgl);
    $this->db->from('v_rawat_jalan v');
    $this->db->join('antrian_poli a', 'v.id_pelayanan = a.id_pelayanan and v.dpjp=a.dpjp', 'left');
    $this->db->order_by('tgl_masuk, no_sep','ASC');
    // $this->db->order_by('no_sep','DESC');

    return $this->db->get()->result();
  }
  public function selectRangeDataPasienRawatJalan($mulai, $akhir)
  {
    $this->db->select("v.*,a.no_antri,a.id_antrian");
    $this->db->where('v.status', '1');
    $this->db->where("(DATE(v.tgl_masuk) BETWEEN '$mulai' and '$akhir')");
    $this->db->where_not_in('v.status_rawat', 'selesai');
   
    $this->db->from('v_rawat_jalan v');
    $this->db->join('antrian_poli a', 'v.id_pelayanan = a.id_pelayanan and v.dpjp=a.dpjp', 'left');
    $this->db->order_by('tgl_masuk, no_sep');
    // $this->db->order_by('tgl_masuk', 'ASC');

    return $this->db->get()->result();
  }
  public function selectDataPasienRawatJalanAll()
  {
    $tgl = date("Y-m-d");
    $this->db->select("v.*,a.no_antri,a.id_antrian");
    $this->db->where('v.status', '1');
    // $this->db->where_not_in('v.status_rawat', 'selesai');
    $this->db->like('v.tgl_masuk', $tgl);
    $this->db->from('v_rawat_jalan v');
    $this->db->join('antrian_poli a', 'v.id_pelayanan = a.id_pelayanan', 'left');
    $this->db->order_by('tgl_masuk', 'ASC');

    return $this->db->get()->result();
  }
  public function selectRangeDataPasienRawatJalanAll($mulai, $akhir)
  {
    $this->db->select("v.*,a.no_antri,a.id_antrian");
    $this->db->where('v.status', '1');
    $this->db->where("(DATE(v.tgl_masuk) BETWEEN '$mulai' and '$akhir')");
    // $this->db->where_not_in('v.status_rawat', 'selesai');
   
    $this->db->from('v_rawat_jalan v');
    $this->db->join('antrian_poli a', 'v.id_pelayanan = a.id_pelayanan', 'left');
    $this->db->order_by('tgl_masuk', 'ASC');

    return $this->db->get()->result();
  }
  public function selectDataPasienRawatJalan1()
  {
    $this->db->select("v.*,a.no_antri");
    $this->db->where('v.status', '1');
    $this->db->from('v_rawat_jalan v');
    $this->db->join('antrian_poli a', 'v.id_pelayanan = a.id_pelayanan', 'left');
    $this->db->order_by('poli', 'ASC');
    $this->db->order_by('no_antri', 'ASC');
    return $this->db->get()->result();
  }

  

  public function selectDataPasienrehab()
  {
    $query = $this->db->query("SELECT v.*, r.status status_kasir  
              FROM v_pasien_rehab_medik v
              LEFT JOIN req_kasir r
              ON v.id_history = r.id_history 
             
              order by v.tgl_masuk desc");
    return $query->result();
  }



  public function getGelangById($id_pelayanan)
  {
    $this->db->select('pa.nama,pa.no_rm,pa.tgl_lahir,pa.jenis_kelamin, d.nama dokter, c.nama cara ');
    $this->db->from('pelayanan p, pasien pa, history_pelayanan_ranap h, dokter d, cara_bayar c');
    $this->db->where('pa.no_rm = p.id_pasien');
    $this->db->where('p.id_pelayanan = h.id_pelayanan');
    $this->db->where('h.dpjp = d.id_dokter');
    $this->db->where('p.cara_bayar= c.id_cara_bayar');
    $this->db->where('p.id_pelayanan', $id_pelayanan);
    $this->db->where('h.status', 1);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function getLabelById($id_pelayanan)
  {
    $this->db->select('pa.nama,pa.no_rm,pa.tgl_lahir,pa.jenis_kelamin,pa.alamat,pa.no_ktp , c.nama caraBayar,p.tgl_masuk');
    $this->db->from('pelayanan p');
    $this->db->join('pasien pa', 'pa.no_rm = p.id_pasien');
    $this->db->join('cara_bayar c', 'p.cara_bayar = c.id_cara_bayar');
    $this->db->where('p.id_pelayanan', $id_pelayanan);
    $query = $this->db->get();
    return $query->row_array();
  }


  public function getByPelayanan($id_pelayanan)
  {
    $this->db->select('p.nama, p.no_rm, p.tgl_lahir, p.jenis_kelamin');
    $this->db->from('pelayanan pel');
    $this->db->join('pasien p', 'p.no_rm = pel.id_pasien');
    $this->db->where('pel.id_pelayanan', $id_pelayanan);
    $query = $this->db->get();
    return $query->row();
  }

  //KAMAR KARTU
  public function getPasienById($no_rm)
  {
    $this->db->select('p.no_rm, p.nama, p.jenis_kelamin, p.tgl_lahir, p.alamat');
    $this->db->from('pasien p');
    $this->db->where('p.no_rm', $no_rm);
    $query = $this->db->get();
    return $query->row_array();
  }

  //KAMAR KARTU TRACER AUTO
  public function getTracerPoli()
  {
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d");
    $this->db->select('a.no_antri no_antri, p.nama_panjang nama,a.inisial inisial,ps.nama pasien,ps.no_rm,cb.nama klaim,dr.nama nama_dokter');
    $this->db->from('antrian_poli a, list_poli p , pelayanan pl, pasien ps, cara_bayar cb, history_pelayanan hp,dokter dr,tracer_kamar_kartu tr');
    $this->db->where('a.poli = p.id_list_poli');
    $this->db->where('a.id_pelayanan = pl.id_pelayanan');
    $this->db->where('pl.cara_bayar = cb.id_cara_bayar');
    $this->db->where('pl.id_pasien = ps.no_rm');
    $this->db->where('pl.id_pelayanan = hp.id_pelayanan');
    $this->db->where('pl.id_pelayanan = tr.id_pelayanan');
    $this->db->where('pl.id_pasien = tr.no_rm');
    $this->db->where('hp.dpjp = dr.id_dokter');
    $this->db->where('tr.status', 0);
    return $this->db->get()->result();
  }

  //KAMAR KARTU TRACER AUTO
  public function getTracerUgd()
  {
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d");
    $this->db->select('ps.nama pasien,ps.no_rm,cb.nama klaim,dr.nama nama_dokter,hp.jenis_pelayanan');
    $this->db->from('pelayanan pl, pasien ps, cara_bayar cb, history_pelayanan_ugd hp,dokter dr,tracer_kamar_kartu tr');
    $this->db->where('pl.cara_bayar = cb.id_cara_bayar');
    $this->db->where('pl.id_pasien = ps.no_rm');
    $this->db->where('pl.id_pelayanan = hp.id_pelayanan');
    $this->db->where('pl.id_pelayanan = tr.id_pelayanan');
    $this->db->where('pl.id_pasien = tr.no_rm');
    $this->db->where('hp.dpjp = dr.id_dokter');
    $this->db->where('tr.status', 0);
    return $this->db->get()->result();
  }

  //KAMAR KARTU TRACER AUTO
  public function getStatusTracer()
  {
    $this->db->select('status');
    $this->db->from('tracer_kamar_kartu');
    $this->db->where('status', 0);
    return $this->db->count_all_results();
  }

  //KAMAR KARTU TRACER AUTO
  public function getJenisPelayanan()
  {
    $this->db->select('status,id_pelayanan,jenis_pelayanan');
    $this->db->from('tracer_kamar_kartu');
    $this->db->where('status', 0);
    return $this->db->get()->result();
  }


  //KAMAR KARTU TRACER AUTO
  public function UpdateStatusTracer()
  {
    $this->db->set('status', 1);
    $this->db->where('status', 0);
    $this->db->update('tracer_kamar_kartu');
  }


  public function selectDataPasienfisio()
  {
    $this->db->where('status', '1');
    $this->db->from('v_pasien_fisio');
    $this->db->order_by('tgl_masuk', 'DESC');
    return $this->db->get()->result();
  }

  //model polifisio
  public function selectDataPasienPolifisio()
  {
    $this->db->select('b.id_pelayanan,h.id_history,h.tgl_masuk,p.no_rm,p.nama,p.jenis_kelamin,p.tgl_lahir,p.agama,h.jenis_pelayanan,dok.nama AS nama_dokter,b.no_sep,b.diagnosa,c.nama AS cara_bayar,b.keterangan,b.asal_pasien,b.tipe, lp.nama poli,p.no_bpjs');
    $this->db->from('pasien p, pelayanan b, history_pelayanan h, cara_bayar c, dokter dok, list_poli lp');
    $this->db->where("p.no_rm = b.id_pasien and h.id_pelayanan = b.id_pelayanan and c.id_cara_bayar = b.cara_bayar and h.dpjp = dok.id_dokter and lp.id_list_poli = h.nama_poli and (b.status_rawat = 'dirawat' or b.status_rawat = 'dikembalikan') and b.total_bayar=0 and b.status =1 and h. status =1");
    //$this->db->where('jenis_pelayanan','POLIFISIO');
    $this->db->order_by('tgl_masuk', 'DESC');
    return $this->db->get()->result();
  }

  //model polifisio login polifisio
  public function selectDataPasien_Polifisio()
  {
    $this->db->select('b.id_pelayanan,h.id_history,h.tgl_masuk,p.no_rm,p.nama,p.jenis_kelamin,p.tgl_lahir,p.agama,h.jenis_pelayanan,dok.nama AS nama_dokter,b.no_sep,b.diagnosa,c.nama AS cara_bayar,b.keterangan,b.asal_pasien,b.tipe, lp.nama poli');
    $this->db->from('pasien p, pelayanan b, history_pelayanan h, cara_bayar c, dokter dok, list_poli lp');
    $this->db->where("p.no_rm = b.id_pasien and h.id_pelayanan = b.id_pelayanan and c.id_cara_bayar = b.cara_bayar and h.dpjp = dok.id_dokter and lp.id_list_poli = h.nama_poli and (b.status_rawat = 'dirawat' or b.status_rawat = 'dikembalikan')and b.total_bayar=0 and b.status =1 and h. status =1");
    $this->db->where('nama_poli', '6E975PL694');
    $this->db->order_by('tgl_masuk', 'DESC');
    return $this->db->get()->result();
  }

  // fisio ranap
  public function selectDataPasien_ranapfisio()
  {
    $this->db->select('b.id_pelayanan,h.id_history,h.tgl_masuk,p.no_rm,p.nama,p.jenis_kelamin,p.tgl_lahir,p.agama,h.jenis_pelayanan,dok.nama AS nama_dokter,b.no_sep,b.diagnosa,c.nama AS cara_bayar,b.keterangan,b.asal_pasien,b.tipe, r.tipe ruangan');
    $this->db->from('pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c, dokter dok, ruangan r');
    $this->db->where("p.no_rm = b.id_pasien and h.id_pelayanan = b.id_pelayanan and r.id_ruangan=h.id_kamar and c.id_cara_bayar = b.cara_bayar and h.dpjp = dok.id_dokter and (b.status_rawat = 'dirawat' or b.status_rawat = 'dikembalikan') and b.status =1 and h. status =1 and h.tgl_keluar IS NULL");
    $this->db->order_by('tgl_masuk', 'DESC');
    return $this->db->get()->result();
  }

  public function selectDataPasienRawatJalanby_id($id_pelayanan, $id_history)
  {
    $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
    $this->db->from('v_rawat_jalan');
    return $this->db->get()->result();
  }
  public function selectDataPasienIgd()
  { //IGD
    $tgl = date("Y-m-d");
    $this->db->select('b.id_pelayanan,h.id_history,h.tgl_masuk,p.no_rm,p.nama,p.jenis_kelamin,p.tgl_lahir,p.agama,p.no_bpjs,h.jenis_pelayanan,dok.nama AS nama_dokter,b.no_sep,b.diagnosa,c.nama AS cara_bayar,b.keterangan,b.asal_pasien,b.tipe');
    $this->db->from('pasien p, pelayanan b, history_pelayanan_ugd h, cara_bayar c, dokter dok');
    $this->db->where("p.no_rm = b.id_pasien and h.id_pelayanan = b.id_pelayanan and c.id_cara_bayar = b.cara_bayar and h.dpjp = dok.id_dokter and (b.status_rawat = 'dirawat' or b.status_rawat = 'dikembalikan') and b.status =1 and h. status =1");
    // $this->db->where("b.id_pelayanan not in (SELECT id_pelayanan from history_pelayanan_ranap where status = 1)");
    // $this->db->like("h.tgl_masuk", $tgl);
    $this->db->order_by('tgl_masuk', 'DESC');
    return $this->db->get()->result();
  }
  public function selectRangeDataPasienIgd($mulai, $akhir)
  { //IGD
    $tgl = date("Y-m-d");
    $this->db->select('b.id_pelayanan,h.id_history,h.tgl_masuk,p.no_rm,p.nama,p.jenis_kelamin,p.tgl_lahir,p.agama,p.no_bpjs,h.jenis_pelayanan,dok.nama AS nama_dokter,b.no_sep,b.diagnosa,c.nama AS cara_bayar,b.keterangan,b.asal_pasien,b.tipe');
    $this->db->from('pasien p, pelayanan b, history_pelayanan_ugd h, cara_bayar c, dokter dok');
    $this->db->where("p.no_rm = b.id_pasien and h.id_pelayanan = b.id_pelayanan and c.id_cara_bayar = b.cara_bayar and h.dpjp = dok.id_dokter and (b.status_rawat = 'dirawat' or b.status_rawat = 'dikembalikan') and b.status =1 and h. status =1");
    $this->db->where("h.tgl_masuk>=", $mulai);
    $this->db->where("h.tgl_masuk<=", $akhir);
    $this->db->order_by('tgl_masuk', 'DESC');
    return $this->db->get()->result();
  }
  public function selectDataPasienIgdby_id($id_pelayanan, $id_history)
  { //IGD
    $this->db->select('b.id_pelayanan,h.id_history,h.tgl_masuk,p.no_rm,p.nama,p.jenis_kelamin,p.tgl_lahir,p.agama,h.jenis_pelayanan,h.dpjp,b.cara_bayar id_cara_bayar,dok.nama AS nama_dokter,b.no_sep,b.diagnosa,c.nama AS cara_bayar,b.keterangan,b.asal_pasien,b.tipe');
    $this->db->from('pasien p, pelayanan b, history_pelayanan_ugd h, cara_bayar c, dokter dok');
    $this->db->where("p.no_rm = b.id_pasien and h.id_pelayanan = b.id_pelayanan and c.id_cara_bayar = b.cara_bayar and h.dpjp = dok.id_dokter and (b.status_rawat = 'dirawat' or b.status_rawat = 'dikembalikan') and b.status =1 and h. status =1");
    $this->db->where(array('b.id_pelayanan' => $id_pelayanan, 'h.id_history' => $id_history));
    return $this->db->get()->result();
  }

  public function selectDataPasienRawatInap()
  {
    $tgl = date("Y-m-d");
    $this->db->where('status', '1');
    // $this->db->where('tgl_keluar',NULL);
    $this->db->from('v_pasien_ranap');
    return $this->db->get()->result();
  }

  public function selectRangeDataPasienRawatInap($mulai, $akhir)
  {
    $tgl = date("Y-m-d");
    $this->db->where('status', '1');
    $this->db->where('tgl_masuk>=', $mulai);
    $this->db->where('tgl_masuk<=', $akhir);
    $this->db->from('v_pasien_ranap');
    return $this->db->get()->result();
  }

  public function selectDataPasienRawatInapby_id($id_pelayanan, $id_history)
  {
    $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
    $this->db->from('v_pasien_ranap');
    return $this->db->get()->result();
  }


  public function selectNamaDPJP()
  {
    $this->db->select('nama, id_dokter');
    //$this->db->where_not_in('id_dokter');
    $this->db->where('status', 'AKTIF');
		$this->db->where('kode_dokter !=', '-');
    $this->db->from('dokter');
    $this->db->group_by('nama');
    $this->db->order_by('nama');
    return $this->db->get()->result_array();
  }
  public function selectDokterIgd()
  {
    $this->db->select('nama, id_dokter');
    //$this->db->where_not_in('id_dokter');
    $this->db->where('status', 'AKTIF');
    $this->db->where('dokter_spes', 'UMU');
    $this->db->from('dokter');
    $this->db->order_by('nama');
    return $this->db->get()->result_array();
  }
  public function selectAsalPasien()
  {
    $this->db->select('DISTINCT(nama) nama_asal, id_asal_pasien');
    $this->db->order_by('nama_asal', 'ASC');
    return $this->db->get('asal_pasien')->result();
  }

  public function selectCaraBayar()
  {
    $this->db->select('DISTINCT(nama) nama_bayar, id_cara_bayar');
		$this->db->where('status', 'AKTIF');
    $this->db->order_by('nama_bayar', 'ASC');
    return $this->db->get('cara_bayar')->result();
  }
  public function selectBank()
  {
    $this->db->select('DISTINCT(nama_bank) nama_bank, id_bank');
    $this->db->order_by('nama_bank', 'ASC');
    $this->db->where('ket', 'AKTIF');
    return $this->db->get('daftar_bank')->result();
  }

  public function selectKaryawan()
  {
    $this->db->select('DISTINCT(nama) nama, id_karyawan, account');
    $this->db->order_by('nama', 'ASC');
    return $this->db->get('karyawan')->result();
  }
  public function selectAsuransi()
  {
    // $this->db->select('DISTINCT(nama) nama_bayar, id_cara_bayar');
    // $this->db->order_by('nama_bayar');
    // return $this->db->get('cara_bayar')->result();
    // $this->db->select('DISTINCT(nama) nama_bayar, id_cara_bayar');
    // $this->db->order_by('nama_bayar');
    // return $this->db->get('cara_bayar')->result_array();
    $query = $this->db->get('cara_bayar');
    return $query;
  }
  public function selectNamaPoli()
  {
    $this->db->select('DISTINCT(nama_panjang) nama, id_list_poli');
    $this->db->where('status_dokter', 'ADA');
    $this->db->order_by('nama', 'ASC');
    return $this->db->get('list_poli')->result();
  }
  public function edit_pasien_rawat_jalan($idp, $data)
  {
    $this->db->where('id_pelayanan', $idp);
    $this->db->update('pelayanan', $data);
  }
  public function edit_pasien_rajal($idh, $data, $table)
  {
    $this->db->where('id_history', $idh);
    $this->db->update($table, $data);
  }
  public function edit_pasien_rawat_inap($idp, $data)
  {
    $this->db->where('id_pelayanan', $idp);
    $this->db->update('pelayanan', $data);
  }
  public function edit_pasien_ranap($idh, $data)
  {
    $this->db->where('id_history', $idh);
    $this->db->update('history_pelayanan_ranap', $data);
  }
  public function selectNamaRuangan()
  {
    $this->db->select('DISTINCT(tipe) nama, id_ruangan');
    $this->db->order_by('nama', 'ASC');
    return $this->db->get('ruangan')->result();
  }
  public function delete_data_rajal($where, $page_data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $page_data);
  }
  public function delete_data_ranap($where, $page_data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $page_data);
  }
  public function Update_ruangan($where, $page_data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $page_data);
  }
  public function delete_antrianpoli($id_pelayanan)
  {
    $this->db->where('id_pelayanan', $id_pelayanan);
    $this->db->update("antrian_poli", ['ket'=>2]);
    // $this->db->where('id_pelayanan', $id_pelayanan);
    // return  $this->db->delete("antrian_poli");
  }
  public function getDokter($spes)
  {
    $this->db->select('nama, id_dokter');
    $this->db->where('status', 'AKTIF');
    $this->db->where('dokter_spes', $spes);
    $this->db->order_by('nama');
    return $this->db->get('dokter')->result_array();
  }
  public function selectDataPasienApm()
  {
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d");
    $this->db->where('Date(tgl_masuk)', $tgl);
    $this->db->order_by('tgl_masuk desc');
    return $this->db->get('v_pasien_apm')->result();
  }
  public function getDataPasienApm($id)
  {
    $this->db->where('id_pelayanan', $id);
    return $this->db->get('v_pasien_apm')->row();
  }
  public function konfirmasiPasienAPM($id, $data)
  {
    $this->db->where('id_pelayanan', $id);
    $this->db->update('pelayanan', $data);
  }
  //Pasien range
  public function selectDataPoli()
  {
    $tgl = date('Y-m-d');
    $this->db->where('status', '1');
    $this->db->like('tgl_masuk', $tgl);
    $this->db->from('v_rawat_jalan');

    $this->db->order_by('tgl_masuk', 'DESC');
    return $this->db->get()->result();
  }
  public function selectDataPoliRange($mulai, $akhir)
  {
    $this->db->where('status', '1');
    $this->db->where('tgl_masuk>=', $mulai);
    $this->db->where('tgl_masuk<=', $akhir);
    $this->db->from('v_rawat_jalan');

    $this->db->order_by('tgl_masuk', 'DESC');
    return $this->db->get()->result();
  }
  public function selectNamaDPJPById($id_dokter)
  {
    $this->db->select('*');
    // $this->db->where_not_in('id_dokter');
    $this->db->where('id_dokter', $id_dokter);
    $this->db->from('dokter');
    return $this->db->get()->row_array();
  }
  public function selectAntrolJKN()
  {
    $tgl = date('Y-m-d');
    // $this->db->where('Date(tanggal) >=', $tgl);
    $this->db->from('v_antrol_jkn');
    $this->db->order_by('tanggal', 'DESC');
    return $this->db->get()->result();
  }
  public function selectAntrolJKN_range($mulai,$akhir)
  {
    $tgl = date('Y-m-d');
    // $this->db->where('Date(tanggal) >=', $tgl);
    $this->db->from('v_antrol_jkn');
    $this->db->order_by('tanggal', 'DESC');
    return $this->db->get()->result();
  }
  public function update($where, $page_data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $page_data);
  }
  public function get_pasien_baru($no_rm)
  {
    $tanggal = date('Y-m-d');
    return $this->db->query("SELECT * 
      from pasien 
      where no_rm = '$no_rm' and DATE(tgl_daftar) = '$tanggal'");
  }

  public function get_no_ktp()
  {
    $this->db->select('no_ktp');
    $this->db->from('pasien');
    $this->db->where('no_ktp !="0000000000000000"');
    $this->db->where('LENGTH(no_ktp)', 16);
    $this->db->where('status_satusehat', 0);
    $this->db->where('no_rm > 500000');
    // $this->db->where('isnumber(no_ktp)',1);

    // if ($limit !== null) {
    //   $this->db->limit($limit);
    // }
      $this->db->order_by('no_rm desc');
    $query = $this->db->get();


    if ($query->num_rows() > 0) {
      // Jika ada data yang memenuhi kriteria
      return $query->result();
    } else {
      // Jika tidak ada data yang memenuhi kriteria
      return null;
    }
  }
  public function update_status_satusehat($no_ktp, $status_satusehat)
  {
    if (!isset($no_ktp)) {
      return false;
    }

    // Lakukan update ke tabel pasien
    $this->db->where('no_ktp', $no_ktp);
    $update_data = array('status_satusehat' => $status_satusehat);

    // Jalankan query update
    $this->db->update('pasien', $update_data);

    // Periksa apakah update berhasil
    return $this->db->affected_rows() > 0;
  }

}
