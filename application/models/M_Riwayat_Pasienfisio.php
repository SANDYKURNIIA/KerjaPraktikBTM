<<<<<<< HEAD
<?php

class M_Riwayat_Pasienfisio extends CI_Model
{
  public function checkGeneralConsentStatus($id_pelayanan)
  {
    $this->db->from('general_concent');
    $this->db->where('id_pelayanan', $id_pelayanan);
    $query = $this->db->get();

    return $query->num_rows() > 0; // Mengembalikan true jika data ada, false jika tidak
  }

  public function selectDataPasienfisio()
  {
    $this->db->where('status', '1');
    $this->db->from('v_pasien_fisio');
    $this->db->order_by('tgl_pelayanan', 'DESC');
    return $this->db->get()->result();
  }

  //model polifisio
  public function selectDataPasienPolifisio()
  {
    $this->db->select('b.id_pelayanan,h.id_history AS NO,h.tgl_pelayanan AS TANGGAL_PELAYANAN,h.jam_pelayanan AS JAM_PELAYANAN,p.no_rm AS NO_RM,p.nama AS NAMA_PASIEN,p.jenis_kelamin AS JENIS_KELAMIN,p.tgl_lahir AS TANGGAL_LAHIR,p.umur AS UMUR,h.cara_masuk AS CARA_MASUK,lp.nama AS POLIKLINIK_RUANG,c.nama AS CARA_BAYAR,b.diagnosa AS DIAGNOSA,dok.nama AS DPJP');
    $this->db->from('pasien p, pelayanan b, history_pelayanan h, cara_bayar c, dokter dok, list_poli lp');
    $this->db->where("p.no_rm = b.id_pasien and h.id_pelayanan = b.id_pelayanan and c.id_cara_bayar = b.cara_bayar and h.dpjp = dok.id_dokter and lp.id_list_poli = h.nama_poli and (b.status_rawat = 'dirawat' or b.status_rawat = 'dikembalikan') and b.status =1 and h. status =1");
    //$this->db->where('jenis_pelayanan','POLIFISIO');
    $this->db->order_by('tgl_pelayanan', 'DESC');
    return $this->db->get()->result();
  }

  public function selectDataRiwayatPolifisio()
  {
    $tgl = date("Y-m-d");
    $this->db->select('b.id_pelayanan,h.id_history ,h.tgl_masuk as tgl_pelayanan ,p.no_rm ,p.nama pasien,p.jenis_kelamin,p.tgl_lahir, h.jenis_pelayanan cara_masuk,lp.nama poli,c.nama cara_bayar,b.diagnosa,dok.nama nama_dokter');
    $this->db->from('pasien p, pelayanan b, history_pelayanan h, cara_bayar c, dokter dok, list_poli lp');
    $this->db->where("p.no_rm = b.id_pasien and h.id_pelayanan = b.id_pelayanan and c.id_cara_bayar = b.cara_bayar and h.dpjp = dok.id_dokter and lp.id_list_poli = h.nama_poli and (b.status_rawat = 'dirawat' or b.status_rawat = 'dikembalikan') and b.total_bayar =1 and b.status =1 and h. status =1 and b.tgl_masuk like '%$tgl%'");
    //$this->db->where('jenis_pelayanan','POLIFISIO');
    $this->db->group_by('b.id_pelayanan');
    $this->db->order_by('tgl_pelayanan', 'asc');
    return $this->db->get()->result();
  }

  public function selectRangeDataRiwayatPolifisio($mulai, $akhir)
  {
    $tgl = date("Y-m-d");
    $this->db->select('b.id_pelayanan,h.id_history ,h.tgl_masuk as tgl_pelayanan ,p.no_rm ,p.nama pasien,p.jenis_kelamin,p.tgl_lahir, h.jenis_pelayanan cara_masuk,lp.nama poli,c.nama cara_bayar,b.diagnosa,dok.nama nama_dokter');
    $this->db->from('pasien p, pelayanan b, history_pelayanan h, cara_bayar c, dokter dok, list_poli lp');
    $this->db->where("p.no_rm = b.id_pasien and h.id_pelayanan = b.id_pelayanan and c.id_cara_bayar = b.cara_bayar and h.dpjp = dok.id_dokter and lp.id_list_poli = h.nama_poli and (b.status_rawat = 'dirawat' or b.status_rawat = 'dikembalikan') and b.total_bayar =1 and b.status =1 and h. status =1 and b.tgl_masuk BETWEEN '$mulai' and '$akhir'");
    //$this->db->where('jenis_pelayanan','POLIFISIO');
    $this->db->group_by('b.id_pelayanan');
    $this->db->order_by('tgl_pelayanan', 'asc');
    return $this->db->get()->result();
  }

  public function update_pasien_balik($id_pelayanan)
  {
      $this->db->where('id_pelayanan', $id_pelayanan);
      return $this->db->update('pelayanan', ['total_bayar' => 0]);
  }
=======
<?php

class M_Riwayat_Pasienfisio extends CI_Model
{
  public function checkGeneralConsentStatus($id_pelayanan)
  {
    $this->db->from('general_concent');
    $this->db->where('id_pelayanan', $id_pelayanan);
    $query = $this->db->get();

    return $query->num_rows() > 0; // Mengembalikan true jika data ada, false jika tidak
  }

  public function selectDataPasienfisio()
  {
    $this->db->where('status', '1');
    $this->db->from('v_pasien_fisio');
    $this->db->order_by('tgl_pelayanan', 'DESC');
    return $this->db->get()->result();
  }

  //model polifisio
  public function selectDataPasienPolifisio()
  {
    $this->db->select('b.id_pelayanan,h.id_history AS NO,h.tgl_pelayanan AS TANGGAL_PELAYANAN,h.jam_pelayanan AS JAM_PELAYANAN,p.no_rm AS NO_RM,p.nama AS NAMA_PASIEN,p.jenis_kelamin AS JENIS_KELAMIN,p.tgl_lahir AS TANGGAL_LAHIR,p.umur AS UMUR,h.cara_masuk AS CARA_MASUK,lp.nama AS POLIKLINIK_RUANG,c.nama AS CARA_BAYAR,b.diagnosa AS DIAGNOSA,dok.nama AS DPJP');
    $this->db->from('pasien p, pelayanan b, history_pelayanan h, cara_bayar c, dokter dok, list_poli lp');
    $this->db->where("p.no_rm = b.id_pasien and h.id_pelayanan = b.id_pelayanan and c.id_cara_bayar = b.cara_bayar and h.dpjp = dok.id_dokter and lp.id_list_poli = h.nama_poli and (b.status_rawat = 'dirawat' or b.status_rawat = 'dikembalikan') and b.status =1 and h. status =1");
    //$this->db->where('jenis_pelayanan','POLIFISIO');
    $this->db->order_by('tgl_pelayanan', 'DESC');
    return $this->db->get()->result();
  }

  public function selectDataRiwayatPolifisio()
  {
    $tgl = date("Y-m-d");
    $this->db->select('b.id_pelayanan,h.id_history ,h.tgl_masuk as tgl_pelayanan ,p.no_rm ,p.nama pasien,p.jenis_kelamin,p.tgl_lahir, h.jenis_pelayanan cara_masuk,lp.nama poli,c.nama cara_bayar,b.diagnosa,dok.nama nama_dokter');
    $this->db->from('pasien p, pelayanan b, history_pelayanan h, cara_bayar c, dokter dok, list_poli lp');
    $this->db->where("p.no_rm = b.id_pasien and h.id_pelayanan = b.id_pelayanan and c.id_cara_bayar = b.cara_bayar and h.dpjp = dok.id_dokter and lp.id_list_poli = h.nama_poli and (b.status_rawat = 'dirawat' or b.status_rawat = 'dikembalikan') and b.total_bayar =1 and b.status =1 and h. status =1 and b.tgl_masuk like '%$tgl%'");
    //$this->db->where('jenis_pelayanan','POLIFISIO');
    $this->db->group_by('b.id_pelayanan');
    $this->db->order_by('tgl_pelayanan', 'asc');
    return $this->db->get()->result();
  }

  public function selectRangeDataRiwayatPolifisio($mulai, $akhir)
  {
    $tgl = date("Y-m-d");
    $this->db->select('b.id_pelayanan,h.id_history ,h.tgl_masuk as tgl_pelayanan ,p.no_rm ,p.nama pasien,p.jenis_kelamin,p.tgl_lahir, h.jenis_pelayanan cara_masuk,lp.nama poli,c.nama cara_bayar,b.diagnosa,dok.nama nama_dokter');
    $this->db->from('pasien p, pelayanan b, history_pelayanan h, cara_bayar c, dokter dok, list_poli lp');
    $this->db->where("p.no_rm = b.id_pasien and h.id_pelayanan = b.id_pelayanan and c.id_cara_bayar = b.cara_bayar and h.dpjp = dok.id_dokter and lp.id_list_poli = h.nama_poli and (b.status_rawat = 'dirawat' or b.status_rawat = 'dikembalikan') and b.total_bayar =1 and b.status =1 and h. status =1 and b.tgl_masuk BETWEEN '$mulai' and '$akhir'");
    //$this->db->where('jenis_pelayanan','POLIFISIO');
    $this->db->group_by('b.id_pelayanan');
    $this->db->order_by('tgl_pelayanan', 'asc');
    return $this->db->get()->result();
  }

  public function update_pasien_balik($id_pelayanan)
  {
      $this->db->where('id_pelayanan', $id_pelayanan);
      return $this->db->update('pelayanan', ['total_bayar' => 0]);
  }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
}