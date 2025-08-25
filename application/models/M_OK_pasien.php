<?php

class M_OK_pasien extends CI_Model
{
  function __construct()
  {
    parent::__construct();

    date_default_timezone_set('Asia/Jakarta');
    setlocale(LC_ALL, 'id_ID');
  }
  public function selectPasien()
  {

    $this->db->from('v_ok_pasien');
    // $this->db->where('tgl_keluar',null);
    // $this->db->where("tgl_masuk >= '2024-11-01'");
    return $this->db->get()->result();
  }
  public function selectPasien_poli()
  {
    $query =  $this->db->query("SELECT id_pelayanan,id_history,tgl_lahir,tgl_masuk,no_rm,nama,jenis_kelamin,jenis_pelayanan,poli,cara_bayar,diagnosa,nama_dokter
      from v_kunjungan 
      where status_rawat != 'selesai' and 
      (nama_poli = 'MWK205D30K' or nama_poli = 'YR6435H21' or nama_poli = 'O782EGU4PR' or nama_poli = 'EV7719I53' or nama_poli = 'JG6142E66' or nama_poli = 'UQ81K76373')
      and id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)
      order by tgl_masuk desc");
    return $query->result();
  }

  public function selectDataPasienby_id($id_pelayanan, $id_history)
  {
    $query =  $this->db->query("SELECT * FROM (
        SELECT id_pelayanan,id_history,tgl_lahir,tgl_masuk,no_rm,nama,jenis_kelamin,jenis_pelayanan,poli,cara_bayar,diagnosa,nama_dokter,no_bpjs,'RANAP' kdpoli_bpjs
        from v_ok_pasien
        union all
        SELECT v.id_pelayanan,v.id_history,v.tgl_lahir,v.tgl_masuk,v.no_rm,v.nama,v.jenis_kelamin,v.jenis_pelayanan,v.poli,v.cara_bayar,v.diagnosa,v.nama_dokter,v.no_bpjs,l.kdpoli_bpjs
        from v_kunjungan v ,list_poli l
        where v.nama_poli = l.id_list_poli and v.status_rawat != 'selesai' and (v.nama_poli = 'MWK205D30K' or v.nama_poli = 'YR6435H21' or v.nama_poli = 'O782EGU4PR' or v.nama_poli = 'EV7719I53' or v.nama_poli = 'JG6142E66' or nama_poli = 'UQ81K76373')
        ) as gabung
        where id_pelayanan = '$id_pelayanan' and id_history = '$id_history'");
    return $query->result();
    // $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
    // $this->db->from('v_ok_pasien');
    // return $this->db->get()->result();
  }

  public function getOperasi()
  {
    $this->db->select('DISTINCT(tipe)');
    return $this->db->get('list_kamar_ok')->result_array();
  }

  public function getTipe()
  {
    $this->db->select('DISTINCT(keterangan)');
    $this->db->where_not_in('keterangan', 'SEWA KAMAR');
    $this->db->where_not_in('keterangan', '-');
    return $this->db->get('list_kamar_ok')->result_array();
  }



  public function getKamar()
  {
    $this->db->select('DISTINCT(tipe_kamar)');
    return $this->db->get('list_kamar_ok')->result_array();
  }

  public function getTindakan($tipe, $tipeKamar, $keterangan, $cara_bayar)
  {
    $this->db->select("*");
    $this->db->from("list_kamar_ok");
    $this->db->where_in("jenis_bayar", $cara_bayar);
    $this->db->where_in("tipe", $tipe);
    $this->db->where_in("tipe_kamar", $tipeKamar);
    $this->db->where_in("keterangan", $keterangan);
    // $this->db->where("status", 'AKTIF');
    $query1 = $this->db->get_compiled_select();

    $this->db->select("*");
    $this->db->from("list_kamar_ok");
    $this->db->where_in("jenis", '-');
    $this->db->where_in("tipe", $tipe);
    $this->db->where_in("tipe_kamar", $tipeKamar);
    $this->db->where_in("keterangan", 'SEWA KAMAR');
    // $this->db->where("status", 'AKTIF');
    $query2 = $this->db->get_compiled_select();

    $this->db->select("*");
    $this->db->from("list_kamar_ok");
    $this->db->where_in("jenis", '-');
    $this->db->where_in("tipe", '-');
    $this->db->where_in("tipe_kamar", '-');
    $this->db->where_in("keterangan", '-');
    $this->db->order_by('nama');
    // $this->db->where("status", 'AKTIF');
    $query3 = $this->db->get_compiled_select();

    $query = $this->db->query($query1 . " UNION " . $query2 . " UNION " . $query3);
    return $query->result();
  }

  public function getTindakanAll()
  {
    $this->db->select("nama, id_list_kamar_ok");
    $this->db->from("list_kamar_ok");
    $this->db->where("tipe !=", 'SEWA ALAT');
    $this->db->where("tipe !=", '-');
    $this->db->where("tipe !=", 'BMHP');
    $this->db->where("tipe !=", 'SIRKUMSISI');
    $this->db->where("tipe !=", 'SINGLE TARIF');
    $this->db->not_like('nama', 'LAPARASCOPY');
    $this->db->group_by("nama");

    return $this->db->get()->result();
  }

  public function tambah_tindakan_ok($data)
  {
    $this->db->insert('tindakan_ok', $data);
  }

  public function selectDataTindakanByIdPel($id_pelayanan, $jenis)
  {
    $this->db->select('*');
    $this->db->from('v_tindakan_ok');
    $this->db->where('id_pelayanan', $id_pelayanan);
    $this->db->where('jenis_tindakan', $jenis);
    return $this->db->get()->result();
  }

  public function hapus_tindakan($id_tindakan_ok)
  {
    $this->db->delete('tindakan_ok', array('id_tindakan_ok' => $id_tindakan_ok));
  }

  public function Total_Harga_Byid($id_pelayanan)
  {
    $this->db->select_sum('total');
    $this->db->from('v_tindakan_ok');
    $this->db->where('id_pelayanan', $id_pelayanan);
    return $this->db->get()->result();
  }

  public function selectDataDokterby_id($id_pelayanan, $id_history)
  {
    $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
    $this->db->from('v_ok_pasien');
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

  public function getCaraBayar()
  {
    $this->db->select('DISTINCT(nama), id_cara_bayar');
    $this->db->group_by('nama', 'ASC');
    return $this->db->get('cara_bayar')->result_array();
  }

  public function insert_tindakan_dokter($page_data, $table)
  {
    $this->db->insert($table, $page_data);
  }

  public function selectDataDokterByIdPel($id_pelayanan)
  {
    $this->db->select('*');
    $this->db->from('v_list_dokter');
    $this->db->where('id_pelayanan', $id_pelayanan);
    return $this->db->get()->result();
  }

  public function delete_tindakan_dokter($id_list_dokter)
  {
    $this->db->delete('list_dokter', array('id_list_dokter' => $id_list_dokter));
  }
  public function selectLaporanDok()
  {
    $tgl = date("Y-m-d");
    $this->db->select(' h.*, d.nama nama_dokter, ps.nama pasien, p.diagnosa, r.kelas_ruangan, p.tgl_masuk, l.nama namat, l.jenis,l.keterangan, l.tipe tipep');
    $this->db->from('list_dokter h, dokter d, pelayanan p, pasien ps, history_pelayanan_ranap hp, ruangan r, tindakan_ok t, list_kamar_ok l');
    $this->db->where('h.id_dokter=d.id_dokter');
    $this->db->where('h.id_pelayanan=p.id_pelayanan');
    $this->db->where('p.id_pasien= ps.no_rm');
    $this->db->where('hp.id_pelayanan=p.id_pelayanan');
    $this->db->where('hp.id_kamar=r.id_ruangan');
    $this->db->where('t.id_pelayanan = p.id_pelayanan');
    $this->db->where('t.id_tindakan = l.id_list_kamar_ok');
    $this->db->like('p.tgl_masuk', $tgl);
    $this->db->order_by('p.tgl_masuk');
    return $this->db->get()->result();
  }
  public function selectLaporanDokRange($mulai, $akhir)
  {
    $this->db->select(' h.*, d.nama nama_dokter, ps.nama pasien, p.diagnosa, r.kelas_ruangan, p.tgl_masuk, l.nama namat, l.jenis,l.keterangan, l.tipe tipep');
    $this->db->from('list_dokter h, dokter d, pelayanan p, pasien ps, history_pelayanan_ranap hp, ruangan r, tindakan_ok t, list_kamar_ok l');
    $this->db->where('h.id_dokter=d.id_dokter');
    $this->db->where('h.id_pelayanan=p.id_pelayanan');
    $this->db->where('p.id_pasien= ps.no_rm');
    $this->db->where('hp.id_pelayanan=p.id_pelayanan');
    $this->db->where('hp.id_kamar=r.id_ruangan');
    $this->db->where('t.id_pelayanan = p.id_pelayanan');
    $this->db->where('t.id_tindakan = l.id_list_kamar_ok');
    $this->db->where('p.tgl_masuk >=', $mulai);
    $this->db->where('p.tgl_masuk <=', $akhir);
    $this->db->order_by('p.tgl_masuk');
    return $this->db->get()->result();
  }
  public function selectLaporanKunjungan()
  {
    $tgl = date("Y-m-d");
    $this->db->select('DISTINCT (h.id_pelayanan), ps.nama pasien, p.tgl_masuk, p.diagnosa');
    $this->db->from('list_dokter h, dokter d, pelayanan p, pasien ps');
    $this->db->where('h.id_dokter=d.id_dokter');
    $this->db->where('h.id_pelayanan=p.id_pelayanan');
    $this->db->where('p.id_pasien= ps.no_rm');
    $this->db->like('p.tgl_masuk', $tgl);
    $this->db->order_by('h.tanggal');
    return $this->db->get()->result();
  }
  public function selectLaporanKunjunganRange($mulai, $akhir)
  {
    $this->db->select('DISTINCT(h.id_pelayanan), ps.nama pasien, p.tgl_masuk, p.diagnosa');
    $this->db->from('list_dokter h, dokter d, pelayanan p, pasien ps');
    $this->db->where('h.id_dokter=d.id_dokter');
    $this->db->where('h.id_pelayanan=p.id_pelayanan');
    $this->db->where('p.id_pasien= ps.no_rm');
    $this->db->where('p.tgl_masuk >=', $mulai);
    $this->db->where('p.tgl_masuk <=', $akhir);
    $this->db->order_by('h.tanggal');
    return $this->db->get()->result();
  }
  public function selectRiwayat()
  {
    $tgl = date("Y-m-d");
    $this->db->select('b.id_pelayanan ,h.id_history ,b.tgl_masuk,p.no_rm,p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan ,d.nama  nama_dokter,b.no_sep,b.diagnosa,c.nama  cara_bayar,r.tipe  poli');
    $this->db->from('pasien p, pelayanan b, history_pelayanan_ranap h, ruangan r, dokter d, cara_bayar c');
    $this->db->where('h.id_pelayanan=b.id_pelayanan');
    $this->db->where('b.id_pasien= p.no_rm');
    $this->db->where('h.id_kamar=r.id_ruangan');
    $this->db->where('h.dpjp = d.id_dokter');
    $this->db->where('b.cara_bayar = c.id_cara_bayar');
    $this->db->where('h.id_kamar = r.id_ruangan');
    $this->db->where('b.status_rawat', 'selesai');
    $this->db->where('b.status', 1);
    $this->db->where('h.status', 1);
    $this->db->like('b.tgl_keluar', $tgl);
    $this->db->order_by('b.tgl_keluar');
    return $this->db->get()->result();
  }
  public function selectRiwayatRange($mulai, $akhir)
  {

    $this->db->select(' b.id_pelayanan ,h.id_history ,b.tgl_masuk,p.no_rm,p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan ,d.nama  nama_dokter,b.no_sep,b.diagnosa,c.nama  cara_bayar,r.tipe  poli');
    $this->db->from('pasien p, pelayanan b, history_pelayanan_ranap h, ruangan r, dokter d, cara_bayar c');
    $this->db->where('h.id_pelayanan=b.id_pelayanan');
    $this->db->where('b.id_pasien= p.no_rm');
    $this->db->where('h.id_kamar=r.id_ruangan');
    $this->db->where('h.dpjp = d.id_dokter');
    $this->db->where('b.cara_bayar = c.id_cara_bayar');
    $this->db->where('h.id_kamar = r.id_ruangan');
    $this->db->where('b.status_rawat', 'selesai');
    $this->db->where('b.status', 1);
    $this->db->where('h.status', 1);
    $this->db->where('b.tgl_keluar >=', $mulai);
    $this->db->where('b.tgl_keluar <=', $akhir);
    $this->db->order_by('b.tgl_keluar');
    return $this->db->get()->result();
  }
  public function selectRiwayatby_id($id_pelayanan, $id_history)
  {
    $this->db->select(' b.id_pelayanan ,h.id_history ,b.tgl_masuk,p.no_rm,p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan ,d.nama  nama_dokter,b.no_sep,b.diagnosa,c.nama  cara_bayar,r.tipe  poli');
    $this->db->from('pasien p, pelayanan b, history_pelayanan_ranap h, ruangan r, dokter d, cara_bayar c');
    $this->db->where('h.id_pelayanan=b.id_pelayanan');
    $this->db->where('b.id_pasien= p.no_rm');
    $this->db->where('h.id_kamar=r.id_ruangan');
    $this->db->where('h.dpjp = d.id_dokter');
    $this->db->where('b.cara_bayar = c.id_cara_bayar');
    $this->db->where('h.id_kamar = r.id_ruangan');
    $this->db->where('b.status_rawat', 'selesai');
    $this->db->where('b.status', 1);
    $this->db->where('h.status', 1);
    $this->db->where(array('b.id_pelayanan' => $id_pelayanan, 'h.id_history' => $id_history));

    return $this->db->get()->result();
  }
  public function getEditObatApotik()
  {
    $hasil = $this->db->query("SELECT l.id_logistik,l.nama,  sum(s.frek) stok
        FROM list_logistik l
        INNER JOIN stok_ok s 
        on s.id_logistik=l.id_logistik
        GROUP by l.id_logistik
        order by l.nama");
    return $hasil->result_array();
  }
  public function selectStok()
  {
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d");
    $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok  ,l.tipe,l.golongan_obat,l.produsen');
    $this->db->from('stok_ok a, list_logistik l');
    $this->db->where('a.id_logistik=l.id_logistik');
    $this->db->group_by('a.id_logistik');
    $this->db->order_by('stok');
    return $this->db->get()->result();
  }
  public function selectDetailStok($id_logistik)
  {

    $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok ,a.kadaluarsa ,l.tipe,l.golongan_obat,l.produsen');
    $this->db->from('stok_ok a, list_logistik l');
    $this->db->where('a.id_logistik=l.id_logistik');
    $this->db->where('a.id_logistik', $id_logistik);
    $this->db->group_by('a.kadaluarsa');
    $this->db->order_by('stok');


    return $this->db->get()->result();
  }
  public function update($data, $where, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }
  public function insert_tindakan($page_data, $table)
  {
    $this->db->insert($table, $page_data);
  }
  public function delete_tindakan($id, $table, $where)
  {
    $this->db->delete($table, array($where => $id));
  }
  public function getExpByObat($obat)
  {
    $this->db->select('sum(s.frek) stok, s.kadaluarsa,l.margin,l.harga_cost,l.id_logistik,l.nama');
    $this->db->from('stok_ok s, list_logistik l');
    $this->db->where(' s.id_logistik=l.id_logistik');
    $this->db->where(' s.id_logistik', $obat);
    $this->db->group_by('s.id_stok');
    $this->db->having('sum(s.frek)>0');
    return $this->db->get()->result_array();
  }
  public function getObatApotik()
  {
    $this->db->select('l.id_logistik,l.nama');
    $this->db->from('list_logistik l');
    $this->db->order_by('l.nama');
    return $this->db->get()->result_array();
  }
  public function getNamaObat()
  {
    $staff = $this->session->userdata("data_auth");

    $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.satuan_ok,l.produsen');
    if ($staff->ruangan == 'Cendrawasih') {
      $this->db->from('stok_ranap sl, list_logistik l');
      $this->db->where(' sl.id_logistik=l.id_logistik');
      $this->db->where(' sl.id_resep', 'Cendrawasih');
    } else  if ($staff->tipe == 'cssd') {
      $this->db->from('stok_cssd sl, list_logistik l');
      $this->db->where(' sl.id_logistik=l.id_logistik');
    } else {
      $this->db->from('stok_ok sl, list_logistik l');
      $this->db->where(' sl.id_logistik=l.id_logistik');
    }
    $this->db->where(' l.status', 'AKTIF');
    $this->db->group_by('sl.id_logistik');
    $this->db->having('stok>0');
    $this->db->order_by('nama');
    return $this->db->get()->result_array();
  }
  public function getSumObat($obat)
  {
    $staff = $this->session->userdata("data_auth");

    $this->db->select('sum(frek) stok');
    if ($staff->tipe == 'cssd') {
      $this->db->from('stok_cssd');
    } else {
      $this->db->from('stok_ok');
    }
    $this->db->where(' id_logistik', $obat);
    return $this->db->get()->row_array();
  }
  public function selectObatById($id_pelayanan)
  {
    $this->db->select('t.*, l.nama, s.nama staff');
    $this->db->from(' tindakan_obat_ok t, list_logistik l , staff s');
    $this->db->where('t.id_list_tindakan=l.id_logistik');
    $this->db->where('s.id_staff=t.id_staff');
    $this->db->where('l.status', 'AKTIF');
    $this->db->where('t.id_pelayanan', $id_pelayanan);
    $this->db->order_by('t.tanggal desc');

    return $this->db->get()->result();
  }
  public function getResepById($id_pelayanan)
  {
    $this->db->select('sum(t.total) total, sum(t.frek) frek, l.nama obat, "-" as keterangan,  "-" as id_cara_pakai');
    $this->db->from('tindakan_obat_ok t, list_logistik l');
    $this->db->where('t.id_list_tindakan=l.id_logistik');
    $this->db->where('t.id_pelayanan', $id_pelayanan);
    $this->db->group_by('t.id_list_tindakan');
    return $this->db->get()->result_array();
  }
  public function getDataByIdResep($id_pelayanan, $id_history)
  {
    $query =  $this->db->query("SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat,c.nama  cara_bayar,a.nama asal,d.nama dokter, d.foto,r1.tipe
        from pasien pa, pelayanan p, dokter d,cara_bayar c,   asal_pasien  a, history_pelayanan_ranap h,  ruangan r1  
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan and h.id_kamar=r1.id_ruangan and p.id_pelayanan = '$id_pelayanan' and h.id_history = '$id_history'
        ");
    return $query->row_array();
  }
  public function selectDataTotalByIdPel($id_pelayanan)
  {
    $this->db->select_sum('total');
    $this->db->from('tindakan_obat_ok');
    $this->db->where('id_pelayanan', $id_pelayanan);
    return $this->db->get()->result();
  }
  function next_queue_poli($kode, $tgl)
  {
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date("Y-m-d");
    $this->db->select('(case when max(no_antri) is null then (0+3) else (max(no_antri)+1) end) queue');
    $this->db->where('tanggal', $tgl);
    return $this->db->get_where('antrian_operasi', ['kodepoli' => $kode])->row()->queue;
  }
  function bpjs_status_queue($nomorkartu)
  {
    // $tanggal=date('Y-m-d');
    // $this->db->order_by('no_antri desc');
    // $this->db->select('antrian_operasi');
    return $this->db->get_where('antrian_operasi', array('no_kartu' => $nomorkartu, 'terlaksana' => 0))->result();
  }
  function getAll()
  {
    $tanggal = date('Y-m-d');

    $this->db->select('a.*,p.nama,p.no_rm');
    $this->db->where('a.terlaksana', 0);
    $this->db->from('antrian_operasi a, pasien p,pelayanan b');
    $this->db->where('p.no_rm = b.id_pasien');
    $this->db->where('a.id_pelayanan = b.id_pelayanan');
    $this->db->like('a.tanggal', $tanggal);

    return $this->db->get()->result();
  }
  function getAllRange($awal, $akhir)
  {
    $this->db->select('a.*,p.nama,p.no_rm');
    $this->db->where('a.terlaksana', 0);
    $this->db->from('antrian_operasi a, pasien p,pelayanan b');
    $this->db->where('p.no_rm = b.id_pasien');
    $this->db->where('a.id_pelayanan = b.id_pelayanan');
    $this->db->where('a.tanggal >=', $awal);
    $this->db->where('a.tanggal <=', $akhir);
    return $this->db->get()->result();
  }

  public function selectCetakSo()
  {
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d");
    $this->db->select('l.id_logistik,l.nama , sum(s.frek) stok,l.harga_cost, l.ppn, l.satuan_terkecil tipe, l.produsen,l.golongan_obat');
    $this->db->from('list_logistik l');
    $this->db->join('stok_ok s', 's.id_logistik=l.id_logistik', 'left');

    $this->db->where('s.tgl<= NOW()');
    $this->db->where('l.status', 'AKTIF');
    $this->db->group_by('l.id_logistik ');
    $this->db->order_by('l.nama asc');
    return $this->db->get()->result();
  }
  public function selectDataPasienby_id_row($id_pelayanan, $id_history)
  {
    $query =  $this->db->query("SELECT * FROM (
        SELECT id_pelayanan,id_history,tgl_lahir,tgl_masuk,no_rm,nama,jenis_kelamin,jenis_pelayanan,poli,cara_bayar,diagnosa,nama_dokter,no_bpjs,'RANAP' kdpoli_bpjs
        from v_ok_pasien
        union all
        SELECT v.id_pelayanan,v.id_history,v.tgl_lahir,v.tgl_masuk,v.no_rm,v.nama,v.jenis_kelamin,v.jenis_pelayanan,v.poli,v.cara_bayar,v.diagnosa,v.nama_dokter,v.no_bpjs,l.kdpoli_bpjs
        from v_kunjungan v ,list_poli l
        where v.nama_poli = l.id_list_poli and v.status_rawat != 'selesai' and (v.nama_poli = 'MWK205D30K' or v.nama_poli = 'YR6435H21' or v.nama_poli = 'O782EGU4PR' or v.nama_poli = 'EV7719I53' or v.nama_poli = 'JG6142E66' or nama_poli = 'UQ81K76373')
        ) as gabung
        where id_pelayanan = '$id_pelayanan' and id_history = '$id_history'");
    return $query->row();
    // $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
    // $this->db->from('v_ok_pasien');
    // return $this->db->get()->result();
  }
}
