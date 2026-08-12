<<<<<<< HEAD
<?php

class M_Pencarian_Pasien extends CI_Model
{

	// public function selectDataPasien()
	// {
	// 	$this->db->from('pasien');
	// 	$this->db->not_like('no_rm', '-999');
	// 	return $this->db->get()->result();
	// }
	public function insert($data, $table)
	{
		$this->db->insert($table, $data);
	}
	public function get_cek_like($cari_data)
	{
		$this->db->like('no_rm', $cari_data, 'both');
		$this->db->or_like('rm_lama', $cari_data, 'both');
		$this->db->or_like('nama', $cari_data, 'both');
		$this->db->or_like('tgl_lahir', $cari_data, 'both');
		$this->db->or_like('no_bpjs', $cari_data, 'both');
		$this->db->or_like('no_ktp', $cari_data, 'both');
		$this->db->limit(500);
		$result = $this->db->get('pasien')->result();
		return $result;
	}
	public function select_by_no_rm($id)
	{
		$this->db->where('no_rm', $id);
		$query = $this->db->get('pasien')->row_array();
		 echo $this->db->last_query();
		return $query;
	}
	public function getDataPasienById($id)
	{
		$this->db->where('no_rm', $id);
		return $this->db->get('pasien')->row_array();
	}
	public function getMax()
	{
		$this->db->select('MAX(no_rm) max');
		$this->db->from('pasien');
		return $this->db->get()->row_array();
	}

	public function get_tgl_masuk($no_rm)
	{
		$this->db->where('no_rm', $no_rm);
		$query = $this->db->get('v_pasien')->row_array();
		 echo $this->db->last_query();
		return $query;
	}
	public function getAsalPasien()
	{
		$this->db->select('DISTINCT(nama), id_asal_pasien');
		$this->db->group_by('nama', 'ASC');
		return $this->db->get('asal_pasien')->result_array();
	}
	public function getTipeMasuk()
	{
		$this->db->select('DISTINCT(nama_tipe_masuk), id_tipe_masuk, biaya_admin');
		// $this->db->where('date_format(Now(),"%H:%i:%s") >= waktu');
		return $this->db->get('tipe_masuk')->result_array();
	}


	public function getCaraBayar()
	{
		$this->db->select('DISTINCT(nama), id_cara_bayar');
		$this->db->where('status', 'AKTIF');
		$this->db->group_by('nama', 'ASC');
		return $this->db->get('cara_bayar')->result_array();
	}

	public function getNamaDPJP()
	{
		$this->db->select('d.* , j.jam_mulai , j.jam_selesai');
		$this->db->from('dokter d , jadwal_dokter_lokal j');
		$this->db->where('d.id_dokter = j.id_dokter');
		$this->db->where('d.status', 'AKTIF');
		$this->db->group_by('d.nama');
		$this->db->order_by('d.nama');
		return $this->db->get()->result_array();
	}
	public function getPoli()
	{
		$this->db->select('DISTINCT(id_list_poli), nama_panjang');
		$this->db->where('status_dokter', 'ADA');
		$this->db->group_by('nama_panjang', 'ASC');
		return $this->db->get('list_poli')->result_array();
	}
	public function getPoliPrioritas()
	{
		$this->db->select('*');
		$this->db->where('status_poli', 'AKTIF');
		$this->db->group_by('nama_poli', 'ASC');
		return $this->db->get('list_poli_prioritas')->result_array();
	}
	public function getPoliSore()
	{
		$this->db->select('DISTINCT(id_list_poli), nama_panjang');
		$this->db->where('id_list_poli = "24QRNLX29R" or id_list_poli = "HLGI4176K8" or id_list_poli = "E00RX703" or id_list_poli = "ODI8643C27" or id_list_poli = "MWK205D30K"');
		$this->db->group_by('nama_panjang', 'ASC');
		return $this->db->get('list_poli')->result_array();
	}
	public function getKelas()
	{
		$this->db->select('DISTINCT(kelas_ruangan)');
		$this->db->where('keterangan', 'AKTIF');
		$this->db->where('status', 'tersedia');
		$this->db->order_by('kelas_ruangan');
		return $this->db->get('ruangan')->result_array();
	}
	public function getKamar($id)
	{
		$this->db->select('DISTINCT(tipe), id_ruangan');
		$this->db->where('kelas_ruangan', $id);
		return $this->db->get('v_kamar')->result_array();
	}

	public function get_rm($no_rm)
	{
		$this->db->where('no_rm', $no_rm);
		$query = $this->db->get('pasien');
		return $query->result();
	}

	public function getRiwayatKunjunganUgd($no_rm)
	{
		$this->db->select('p.tgl_masuk, p.tgl_keluar,p.tipe, h.jenis_pelayanan, c.nama caraBayar, p.diagnosa, p.status_rawat, h.id_history id_history, d.nama dokter');
		$this->db->from('pelayanan p, history_pelayanan_ugd h, cara_bayar c, dokter d');
		$this->db->where('h.id_pelayanan=p.id_pelayanan');
		$this->db->where('c.id_cara_bayar=p.cara_bayar');
		$this->db->where('h.dpjp=d.id_dokter');
		$this->db->where('p.status = 1 and h.status = 1');
		$this->db->where('p.id_pasien', $no_rm);
		$this->db->order_by('p.tgl_masuk', 'desc');
		return $this->db->get()->result();
	}

	public function getRiwayatKunjunganPoli($no_rm)
	{
		$this->db->select('p.tgl_masuk, p.tgl_keluar,p.tipe, h.jenis_pelayanan, c.nama caraBayar, p.diagnosa, p.status_rawat, h.id_history id_history, d.nama dokter');
		$this->db->from('pelayanan p, history_pelayanan h, cara_bayar c, dokter d');
		$this->db->where('h.id_pelayanan=p.id_pelayanan');
		$this->db->where('c.id_cara_bayar=p.cara_bayar');
		$this->db->where('h.dpjp=d.id_dokter');
		$this->db->where('p.status = 1 and h.status = 1');
		$this->db->where('p.id_pasien', $no_rm);
		$this->db->order_by('p.tgl_masuk', 'desc');
		return $this->db->get()->result();
	}
	public function getRiwayatKunjunganRanap($no_rm)
	{
		$this->db->select('p.tgl_masuk, p.tgl_keluar,p.tipe, h.jenis_pelayanan, c.nama caraBayar, p.diagnosa, p.status_rawat, h.id_history id_history, d.nama dokter');
		$this->db->from('pelayanan p, history_pelayanan_ranap h, cara_bayar c, dokter d');
		$this->db->where('h.id_pelayanan=p.id_pelayanan');
		$this->db->where('c.id_cara_bayar=p.cara_bayar');
		$this->db->where('h.dpjp=d.id_dokter');
		$this->db->where('p.status = 1 and h.status = 1');
		$this->db->where('p.id_pasien', $no_rm);
		$this->db->order_by('p.tgl_masuk', 'desc');
		return $this->db->get()->result();
	}

	public function getIdHistory($no_rm)
	{
		$this->db->select('h.id_history id_history');
		$this->db->from('pelayanan p');
		$this->db->join('history_pelayanan h', 'h.id_pelayanan=p.id_pelayanan');
		$this->db->join('cara_bayar c', 'c.id_cara_bayar=p.cara_bayar');
		$this->db->where('p.id_pasien', $no_rm);
		$this->db->order_by('p.tgl_masuk', 'desc');
		return $this->db->get()->row();
	}
	public function getNamaPanjang($id)
	{
		$this->db->select('p.nama_panjang nama_panjang');
		$this->db->from('list_poli p');
		$this->db->join('history_pelayanan h', 'h.nama_poli=p.id_list_poli');
		$this->db->where('h.id_history', $id);
		return $this->db->get()->row();
	}
	public function getNamaDokter($id)
	{
		$this->db->select('d.nama nama_dokter');
		$this->db->from('dokter d');
		$this->db->join('history_pelayanan h', 'h.dpjp=d.id_dokter');
		$this->db->where('h.id_history', $id);
		return $this->db->get()->row();
	}


	public function getPendidikan()
	{
		$this->db->select('DISTINCT(nama)');
		$this->db->from('pendidikan');
		return $this->db->get()->result_array();
	}

	public function getPekerjaan()
	{
		$this->db->select('DISTINCT(nama)');
		$this->db->from('pekerjaan');
		return $this->db->get()->result_array();
	}

	public function getProvinsi()
	{
		$this->db->select('DISTINCT(nm_prov)');
		$this->db->from('desa_indonesia');
		return $this->db->get()->result_array();
	}

	public function getKota()
	{
		$this->db->select('DISTINCT(nm_kab)');
		$this->db->from('desa_indonesia');
		return $this->db->get()->result_array();
	}
	public function getKotaByProv($prov)
	{
		$this->db->select('DISTINCT(nm_kab)');
		$this->db->where('nm_prov', $prov);
		return $this->db->get('desa_indonesia')->result();
	}
	public function getKecByKota($kota)
	{
		$this->db->select('DISTINCT(nm_kec)');
		$this->db->where('nm_kab', $kota);
		return $this->db->get('desa_indonesia')->result();
	}
	public function getKelByKec($kec)
	{
		$this->db->select('DISTINCT(nm_desa)');
		$this->db->where('nm_kec', $kec);
		return $this->db->get('desa_indonesia')->result();
	}
	public function getKec()
	{
		$this->db->select('DISTINCT(nm_kec)');
		$this->db->from('desa_indonesia');
		return $this->db->get()->result_array();
	}
	public function getKel()
	{
		$this->db->select('DISTINCT(nm_desa)');
		$this->db->from('desa_indonesia');
		return $this->db->get()->result_array();
	}
	public function getDiagnosa()
	{
		$this->db->select('id_diagnosa,nama_diagnosa');
		$this->db->from('list_diagnosa');
		return $this->db->get()->result_array();
	}
	public function tambah_pasien($data)
	{
		return $this->db->insert('pasien', $data);
	}
	public function tambah_pelayanan($data)
	{
		return $this->db->insert('pelayanan', $data);
	}

	// utk tracer
	public function tambah_tracer_kamar_kartu($tracer)
	{
		return $this->db->insert('tracer_kamar_kartu', $tracer);
	}

	public function tambah_history_ugd($data)
	{
		return $this->db->insert('history_pelayanan_ugd', $data);
	}
	public function tambah_history_poli($data)
	{
		return $this->db->insert('history_pelayanan', $data);
	}
	public function tambah_history_ranap($data)
	{
		return $this->db->insert('history_pelayanan_ranap', $data);
	}
	public function tambah_kamar($data)
	{
		return $this->db->insert('riwayat_kamar', $data);
	}
	public function ubah_pasien($id, $data)
	{
		$this->db->where('no_rm', $id);
		return $this->db->update('pasien', $data);
	}
	public function tambah_erm($data)
	{
		return $this->db->insert('erm', $data);
	}
	public function ubah_status_kamar($id, $data)
	{
		$this->db->where('id_ruangan', $id);
		return $this->db->update('ruangan', $data);
	}
	public function get_ai_tbl_pelayanan()
	{
		return $this->db->query('select generate_id_pelayanan() as id')->row()->id;
	}
	public function get_ai_tbl_history_ugd()
	{
		return $this->db->query('select generate_id_history_ugd() as id from dual')->row()->id;
	}
	public function get_ai_tbl_history_poli()
	{
		return $this->db->query('select generate_id_history() as id from dual')->row()->id;
	}
	
	public function get_ai_tbl_history_ranap()
	{
		return $this->db->query('select generate_id_history_ranap() as id from dual')->row()->id;
	}
	public function get_ai_tbl_riwayat()
	{
		return $this->db->query('select generate_id_riwayat() as id from dual')->row()->id;
	}
	public function get_ai_tbl_erm()
	{
		return $this->db->query('select generate_id_erm() as id from dual')->row()->id;
	}

	public function getIdStaff($id)
	{
		$this->db->select('id_staff');
		$this->db->where('username', $id);
		return $this->db->get('staff')->row();
	}

	public function insert_antrian_poli($data)
	{
		$this->db->insert('antrian_poli', $data);
	}
	public function getDokter($spes)
	{
		$this->db->select('d.* , j.jam_mulai , j.jam_selesai');
		$this->db->from('dokter d , jadwal_dokter_lokal j');
		$this->db->where('d.id_dokter = j.id_dokter');
		$this->db->where('d.status', 'AKTIF');
		$this->db->where('d.dokter_spes', $spes);
		$this->db->group_by('d.id_dokter');
		$this->db->order_by('d.nama');
		return $this->db->get()->result_array();
	}
	// public function getDokterPrioritas($spes)
	// {
	// 	$this->db->select('*');
	// 	$this->db->where('status', 'AKTIF');
	// 	$this->db->where('dokter_spes', $spes);
	// 	$this->db->group_by('dokter_spes,id_dokter');
	// 	$this->db->order_by('nama');
	// 	return $this->db->get('dokter')->result_array();
	// }

	public function getAntrian($poli)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$this->db->select_max('no_antri');
		$this->db->from('antrian_poli');
		$this->db->like('tanggal', $tgl);
		$this->db->where('poli', $poli);
		return $this->db->get()->result();
	}
	public function cekAntrian($poli, $nomor)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$this->db->select('no_antri');
		$this->db->from('antrian_poli');
		$this->db->where('tanggal', $tgl);
		$this->db->where('poli', $poli);
		$this->db->where('no_antri', $nomor);
		return $this->db->get()->row_array();
	}

	public function getCetakById($antrian, $poli)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$this->db->select('a.no_antri no_antri, p.nama_panjang nama,a.inisial inisial,ps.nama pasien,ps.no_rm,cb.nama klaim,dr.nama nama_dokter, s.nama staff,(pl.biaya_rs+pl.biaya_jasa+pl.biaya_admin) total');
		$this->db->from('antrian_poli a, list_poli p , pelayanan pl, pasien ps, cara_bayar cb, history_pelayanan hp,dokter dr,staff s');
		$this->db->where('a.poli = p.id_list_poli');
		$this->db->where('a.id_pelayanan = pl.id_pelayanan');
		$this->db->where('pl.cara_bayar = cb.id_cara_bayar');
		$this->db->where('pl.id_pasien = ps.no_rm');
		$this->db->where('pl.id_pelayanan = hp.id_pelayanan');
		$this->db->where('pl.id_staff = s.id_staff');
		$this->db->where('hp.dpjp = dr.id_dokter');
		$this->db->like('tanggal', $tgl);
		$this->db->where('a.no_antri', $antrian);
		$this->db->where('a.poli', $poli);
		return $this->db->get()->row_array();
	}

	//CETAK ANTRIAN PASIEN
	public function getCetakAntrianById($id_pelayanan)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$dbantrian = $this->db->get_where('antrian_poli', ['id_history !=' => NULL, 'id_antrian' => $id_pelayanan])->row();
		if (!empty($dbantrian)) {
			$this->db->select('a.no_antri no_antri,h.nama_poli poli, p.nama_panjang nama,a.inisial inisial,ps.nama pasien,ps.no_rm,cb.nama klaim,dr.nama nama_dokter, a.id_pelayanan pelayanan,h.biaya_jasa total, s.nama staff');
			$this->db->from('antrian_poli a, list_poli p , pelayanan pl, pasien ps, cara_bayar cb, history_pelayanan h,dokter dr,staff s');
			$this->db->where('h.id_history', $dbantrian->id_history);
		} else {
			$this->db->select('a.no_antri no_antri,h.nama_poli poli, p.nama_panjang nama,a.inisial inisial,ps.nama pasien,ps.no_rm,cb.nama klaim,dr.nama nama_dokter, a.id_pelayanan pelayanan,(pl.biaya_rs+pl.biaya_jasa+pl.biaya_admin) total, s.nama staff');
			$this->db->from('antrian_poli a, list_poli p , pelayanan pl, pasien ps, cara_bayar cb, history_pelayanan h,dokter dr,staff s');
		}
		// $this->db->where('a.poli = p.id_list_poli');
		$this->db->where('a.id_pelayanan = pl.id_pelayanan');

		$this->db->where('pl.id_pelayanan = h.id_pelayanan');
		$this->db->where('h.nama_poli = p.id_list_poli');
		$this->db->where('pl.cara_bayar = cb.id_cara_bayar');
		$this->db->where('pl.id_pasien = ps.no_rm');
		$this->db->where('pl.id_staff = s.id_staff');
		$this->db->where('a.dpjp = dr.id_dokter');
		$this->db->where('h.status', 1);
		$this->db->where('a.id_antrian', $id_pelayanan);
		// $this->db->where('pl.id_pelayanan', $id_pelayanan);
		return $this->db->get()->row_array();
	}
	public function getCetakAntrianByIdPrio($id_pelayanan)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");

		$this->db->select('"" no_antri,h.nama_poli poli, p.nama_panjang nama,p.inisial inisial,ps.nama pasien,ps.no_rm,cb.nama klaim,dr.nama nama_dokter, pl.id_pelayanan pelayanan,(pl.biaya_rs+h.biaya_jasa+pl.biaya_admin) total, s.nama staff');
		$this->db->from('list_poli p , pelayanan pl, pasien ps, cara_bayar cb, history_pelayanan h,dokter dr,staff s');
		$this->db->where('pl.id_pelayanan = h.id_pelayanan');
		$this->db->where('h.nama_poli = p.id_list_poli');
		$this->db->where('pl.cara_bayar = cb.id_cara_bayar');
		$this->db->where('pl.id_pasien = ps.no_rm');
		$this->db->where('pl.id_staff = s.id_staff');
		$this->db->where('h.dpjp = dr.id_dokter');
		$this->db->where('h.id_history', $id_pelayanan);
		return $this->db->get()->row_array();
	}
	//CETAK ANTRIAN PASIEN IGD
	public function getCetakAntrianIGDById($id_pelayanan, $id_history)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$dbantrian = $this->db->get_where('antrian_igd', ['id_history' => $id_history])->row();
		if (!empty($dbantrian)) {
			$this->db->select('a.no_antri no_antri,ps.no_rm,ps.nama, a.id_pelayanan pelayanan,h.biaya_jasa total,pl.cara_bayar, s.nama staff');
			$this->db->from('antrian_igd a , pelayanan pl, pasien ps,  history_pelayanan_ugd h,staff s');
			$this->db->where('h.id_history', $id_history);
		} else {
			$this->db->select('a.no_antri no_antri,ps.no_rm,ps.nama, a.id_pelayanan pelayanan,(pl.biaya_rs+pl.biaya_jasa+pl.biaya_admin) total,pl.cara_bayar, s.nama staff');
			$this->db->from('antrian_igd a , pelayanan pl, pasien ps,  history_pelayanan_ugd h,staff s');
		}

		$this->db->where('a.id_pelayanan = pl.id_pelayanan');
		$this->db->where('pl.id_pelayanan = h.id_pelayanan');
		$this->db->where('pl.id_pasien = ps.no_rm');
		$this->db->where('pl.id_staff = s.id_staff');
		$this->db->where('pl.id_pelayanan', $id_pelayanan);
		return $this->db->get()->row_array();
	}
	public function getCetakAntrianIGDByRm($no_rm)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$this->db->select('s.nama staff');
		$this->db->from('pelayanan pl,staff s');
		$this->db->where('pl.id_staff = s.id_staff');
		$this->db->where('pl.id_pasien', $no_rm);
		$this->db->order_by('pl.tgl_masuk', 'desc');
		$this->db->limit(1);
		return $this->db->get()->row();
	}

	public function getSisaAntrian($poli)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$this->db->select('count(no_antri) no_antri');
		$this->db->from('antrian_poli');
		$this->db->like('tanggal', $tgl);
		$this->db->where('poli', $poli);
		$this->db->where_not_in('status', 2);
		return $this->db->get()->row_array();
	}

	//CETAK ANTRIAN PASIEN
	public function getSisaAntrianPasien($poli)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$this->db->select('count(no_antri) no_antri');
		$this->db->from('antrian_poli');
		$this->db->like('tanggal', $tgl);
		$this->db->where('poli', $poli);
		$this->db->where_not_in('status', 2);
		return $this->db->get()->row_array();
	}

	//CETAK ANTRIAN PASIEN IGD
	public function getSisaAntrianPasienIGD($poli)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$this->db->select('count(no_antri) no_antri');
		$this->db->from('antrian_igd');
		$this->db->like('tanggal', $tgl);
		$this->db->where('poli', $poli);
		$this->db->where_not_in('status', 2);
		return $this->db->get()->row_array();
	}

	function get_room()
	{
		$this->db->select('kodekelas,koderuang,namaruang,kapasitas,tersedia');
		return $this->db->get('v_bpjs_room')->result();
	}

	public function jumlah_pasien_per_poli_bulan($alias_poli, $jenis_kelamin, $bulan, $tahun)
	{
		$poli_codes = array(
			'anak' => 'E00RX703',
			'paru' => 'ZX2016T39',
			'dalam' => '24QRNLX29R',
			'umum' => 'MWK205D30K',
			'obgyn' => 'HLGI4176K8'
		);

		if (array_key_exists($alias_poli, $poli_codes)) {
			$id_poli = $poli_codes[$alias_poli];

			$this->db->select('COUNT(DISTINCT p.id_pelayanan) as jumlah_pasien');
			$this->db->from('pelayanan p');
			$this->db->join('history_pelayanan hp', 'p.id_pelayanan = hp.id_pelayanan', 'inner');
			$this->db->join('list_poli lp', 'hp.nama_poli = lp.id_list_poli', 'inner');
			$this->db->join('pasien_TBC pt', 'p.id_pelayanan = pt.id_pelayanan', 'inner');

			$this->db->where('lp.id_list_poli', $id_poli);
			$this->db->where('pt.jenis_kelamin', $jenis_kelamin);
			$this->db->where('MONTH(p.tgl_masuk)', $bulan);
			$this->db->where('YEAR(p.tgl_masuk)', $tahun);

			$query = $this->db->get();
			return $query->row()->jumlah_pasien;
		}
		return 0;
	}



	function jumlah_skrining($alias_poli, $jenis_kelamin, $bulan, $tahun)
	{
		$poli_codes = array(
			'anak' => 'E00RX703',
			'paru' => 'ZX2016T39',
			'dalam' => '24QRNLX29R',
			'umum' => 'MWK205D30K',
			'obgyn' => 'HLGI4176K8'
		);
		if (array_key_exists($alias_poli, $poli_codes)) {
			$id_poli = $poli_codes[$alias_poli];

			$this->db->select("COUNT(id_pasien) as jumlah_skrining");
			$this->db->from("pasien_TBC");
			$this->db->where("id_poli", $id_poli);
			$this->db->where("jenis_kelamin", $jenis_kelamin);

			// Filter by month and year
			$this->db->where('MONTH(tgl_dinyatakan)', $bulan);
			$this->db->where('YEAR(tgl_dinyatakan)', $tahun);

			$query = $this->db->get();
			return $query->row()->jumlah_skrining;
		}
		return 0;
	}


	function jumlah_terduga_per_poli($alias_poli, $jenis_kelamin, $bulan, $tahun)
	{
		// Membuat map dari alias ke kode poli yang sebenarnya
		$kode_poli_map = array(
			'anak' => 'E00RX703',
			'paru' => 'ZX2016T39',
			'dalam' => '24QRNLX29R',
			'umum' => 'MWK205D30K',
			'obgyn' => 'HLGI4176K8'
		);

		// Mengecek apakah alias poli yang diberikan ada dalam map
		if (array_key_exists($alias_poli, $kode_poli_map)) {
			$id_poli = $kode_poli_map[$alias_poli];

			// Ambil jumlah terduga hanya untuk kode poli yang diinginkan dan berdasarkan jenis kelamin
			$this->db->select("COUNT(pt.id_pasien) as jumlah_terduga");
			$this->db->from("pasien_TBC pt");
			$this->db->join("list_poli lp", "pt.id_poli = lp.id_list_poli", "inner");
			$this->db->where("pt.keterangan", "terduga TBC");
			$this->db->where("lp.id_list_poli", $id_poli);
			$this->db->where("pt.jenis_kelamin", $jenis_kelamin);

			// Filter by month and year
			$this->db->where('MONTH(pt.tgl_dinyatakan)', $bulan);
			$this->db->where('YEAR(pt.tgl_dinyatakan)', $tahun);

			$query = $this->db->get();

			// Simpan jumlah terduga untuk poli yang diproses dalam array hasil
			return $query->row()->jumlah_terduga;
		} else {
			// Jika alias poli yang diberikan tidak ada dalam map, kembalikan pesan error atau nilai default
			return "Alias poli tidak valid.";
		}
	}

	public function getTanggalMax($bulan, $tahun)
	{
		// Format tanggal awal dan akhir dari bulan yang diberikan
		$start_date = "$tahun-$bulan-01";
		$end_date = date("Y-m-t", strtotime($start_date));

		// Query untuk mendapatkan tanggal terakhir dari bulan yang diberikan
		$this->db->select_max('tgl_dinyatakan');
		$this->db->from('pasien_TBC');
		$this->db->where('tgl_dinyatakan >=', $start_date);
		$this->db->where('tgl_dinyatakan <=', $end_date);

		$query = $this->db->get();
		$result = $query->row();

		return $result ? $result->tgl_dinyatakan : null;
	}

	function semua_terduga()
	{
		$this->db->select("COUNT(id_pasien) as total_terduga");
		$this->db->from("pasien_TBC");
		$this->db->where("keterangan = 'terduga TBC ' and 'Terduga TBC'");
		$query = $this->db->get();
		return $query->row()->total_terduga;
	}
	public function searchDiagnosa($term)
	{
		$this->db->select('id_diagnosa, nama_diagnosa');
		$this->db->from('list_diagnosa');
		$this->db->like('id_diagnosa', $term);
		$query = $this->db->get();

		return $query->result();
	}
=======
<?php

class M_Pencarian_Pasien extends CI_Model
{

	// public function selectDataPasien()
	// {
	// 	$this->db->from('pasien');
	// 	$this->db->not_like('no_rm', '-999');
	// 	return $this->db->get()->result();
	// }
	public function insert($data, $table)
	{
		$this->db->insert($table, $data);
	}
	public function get_cek_like($cari_data)
	{
		$this->db->like('no_rm', $cari_data, 'both');
		$this->db->or_like('rm_lama', $cari_data, 'both');
		$this->db->or_like('nama', $cari_data, 'both');
		$this->db->or_like('tgl_lahir', $cari_data, 'both');
		$this->db->or_like('no_bpjs', $cari_data, 'both');
		$this->db->or_like('no_ktp', $cari_data, 'both');
		$this->db->limit(500);
		$result = $this->db->get('pasien')->result();
		return $result;
	}
	public function select_by_no_rm($id)
	{
		$this->db->where('no_rm', $id);
		$query = $this->db->get('pasien')->row_array();
		 echo $this->db->last_query();
		return $query;
	}
	public function getDataPasienById($id)
	{
		$this->db->where('no_rm', $id);
		return $this->db->get('pasien')->row_array();
	}
	public function getMax()
	{
		$this->db->select('MAX(no_rm) max');
		$this->db->from('pasien');
		return $this->db->get()->row_array();
	}

	public function get_tgl_masuk($no_rm)
	{
		$this->db->where('no_rm', $no_rm);
		$query = $this->db->get('v_pasien')->row_array();
		 echo $this->db->last_query();
		return $query;
	}
	public function getAsalPasien()
	{
		$this->db->select('DISTINCT(nama), id_asal_pasien');
		$this->db->group_by('nama', 'ASC');
		return $this->db->get('asal_pasien')->result_array();
	}
	public function getTipeMasuk()
	{
		$this->db->select('DISTINCT(nama_tipe_masuk), id_tipe_masuk, biaya_admin');
		// $this->db->where('date_format(Now(),"%H:%i:%s") >= waktu');
		return $this->db->get('tipe_masuk')->result_array();
	}


	public function getCaraBayar()
	{
		$this->db->select('DISTINCT(nama), id_cara_bayar');
		$this->db->where('status', 'AKTIF');
		$this->db->group_by('nama', 'ASC');
		return $this->db->get('cara_bayar')->result_array();
	}

	public function getNamaDPJP()
	{
		$this->db->select('d.* , j.jam_mulai , j.jam_selesai');
		$this->db->from('dokter d , jadwal_dokter_lokal j');
		$this->db->where('d.id_dokter = j.id_dokter');
		$this->db->where('d.status', 'AKTIF');
		$this->db->group_by('d.nama');
		$this->db->order_by('d.nama');
		return $this->db->get()->result_array();
	}
	public function getPoli()
	{
		$this->db->select('DISTINCT(id_list_poli), nama_panjang');
		$this->db->where('status_dokter', 'ADA');
		$this->db->group_by('nama_panjang', 'ASC');
		return $this->db->get('list_poli')->result_array();
	}
	public function getPoliPrioritas()
	{
		$this->db->select('*');
		$this->db->where('status_poli', 'AKTIF');
		$this->db->group_by('nama_poli', 'ASC');
		return $this->db->get('list_poli_prioritas')->result_array();
	}
	public function getPoliSore()
	{
		$this->db->select('DISTINCT(id_list_poli), nama_panjang');
		$this->db->where('id_list_poli = "24QRNLX29R" or id_list_poli = "HLGI4176K8" or id_list_poli = "E00RX703" or id_list_poli = "ODI8643C27" or id_list_poli = "MWK205D30K"');
		$this->db->group_by('nama_panjang', 'ASC');
		return $this->db->get('list_poli')->result_array();
	}
	public function getKelas()
	{
		$this->db->select('DISTINCT(kelas_ruangan)');
		$this->db->where('keterangan', 'AKTIF');
		$this->db->where('status', 'tersedia');
		$this->db->order_by('kelas_ruangan');
		return $this->db->get('ruangan')->result_array();
	}
	public function getKamar($id)
	{
		$this->db->select('DISTINCT(tipe), id_ruangan');
		$this->db->where('kelas_ruangan', $id);
		return $this->db->get('v_kamar')->result_array();
	}

	public function get_rm($no_rm)
	{
		$this->db->where('no_rm', $no_rm);
		$query = $this->db->get('pasien');
		return $query->result();
	}

	public function getRiwayatKunjunganUgd($no_rm)
	{
		$this->db->select('p.tgl_masuk, p.tgl_keluar,p.tipe, h.jenis_pelayanan, c.nama caraBayar, p.diagnosa, p.status_rawat, h.id_history id_history, d.nama dokter');
		$this->db->from('pelayanan p, history_pelayanan_ugd h, cara_bayar c, dokter d');
		$this->db->where('h.id_pelayanan=p.id_pelayanan');
		$this->db->where('c.id_cara_bayar=p.cara_bayar');
		$this->db->where('h.dpjp=d.id_dokter');
		$this->db->where('p.status = 1 and h.status = 1');
		$this->db->where('p.id_pasien', $no_rm);
		$this->db->order_by('p.tgl_masuk', 'desc');
		return $this->db->get()->result();
	}

	public function getRiwayatKunjunganPoli($no_rm)
	{
		$this->db->select('p.tgl_masuk, p.tgl_keluar,p.tipe, h.jenis_pelayanan, c.nama caraBayar, p.diagnosa, p.status_rawat, h.id_history id_history, d.nama dokter');
		$this->db->from('pelayanan p, history_pelayanan h, cara_bayar c, dokter d');
		$this->db->where('h.id_pelayanan=p.id_pelayanan');
		$this->db->where('c.id_cara_bayar=p.cara_bayar');
		$this->db->where('h.dpjp=d.id_dokter');
		$this->db->where('p.status = 1 and h.status = 1');
		$this->db->where('p.id_pasien', $no_rm);
		$this->db->order_by('p.tgl_masuk', 'desc');
		return $this->db->get()->result();
	}
	public function getRiwayatKunjunganRanap($no_rm)
	{
		$this->db->select('p.tgl_masuk, p.tgl_keluar,p.tipe, h.jenis_pelayanan, c.nama caraBayar, p.diagnosa, p.status_rawat, h.id_history id_history, d.nama dokter');
		$this->db->from('pelayanan p, history_pelayanan_ranap h, cara_bayar c, dokter d');
		$this->db->where('h.id_pelayanan=p.id_pelayanan');
		$this->db->where('c.id_cara_bayar=p.cara_bayar');
		$this->db->where('h.dpjp=d.id_dokter');
		$this->db->where('p.status = 1 and h.status = 1');
		$this->db->where('p.id_pasien', $no_rm);
		$this->db->order_by('p.tgl_masuk', 'desc');
		return $this->db->get()->result();
	}

	public function getIdHistory($no_rm)
	{
		$this->db->select('h.id_history id_history');
		$this->db->from('pelayanan p');
		$this->db->join('history_pelayanan h', 'h.id_pelayanan=p.id_pelayanan');
		$this->db->join('cara_bayar c', 'c.id_cara_bayar=p.cara_bayar');
		$this->db->where('p.id_pasien', $no_rm);
		$this->db->order_by('p.tgl_masuk', 'desc');
		return $this->db->get()->row();
	}
	public function getNamaPanjang($id)
	{
		$this->db->select('p.nama_panjang nama_panjang');
		$this->db->from('list_poli p');
		$this->db->join('history_pelayanan h', 'h.nama_poli=p.id_list_poli');
		$this->db->where('h.id_history', $id);
		return $this->db->get()->row();
	}
	public function getNamaDokter($id)
	{
		$this->db->select('d.nama nama_dokter');
		$this->db->from('dokter d');
		$this->db->join('history_pelayanan h', 'h.dpjp=d.id_dokter');
		$this->db->where('h.id_history', $id);
		return $this->db->get()->row();
	}


	public function getPendidikan()
	{
		$this->db->select('DISTINCT(nama)');
		$this->db->from('pendidikan');
		return $this->db->get()->result_array();
	}

	public function getPekerjaan()
	{
		$this->db->select('DISTINCT(nama)');
		$this->db->from('pekerjaan');
		return $this->db->get()->result_array();
	}

	public function getProvinsi()
	{
		$this->db->select('DISTINCT(nm_prov)');
		$this->db->from('desa_indonesia');
		return $this->db->get()->result_array();
	}

	public function getKota()
	{
		$this->db->select('DISTINCT(nm_kab)');
		$this->db->from('desa_indonesia');
		return $this->db->get()->result_array();
	}
	public function getKotaByProv($prov)
	{
		$this->db->select('DISTINCT(nm_kab)');
		$this->db->where('nm_prov', $prov);
		return $this->db->get('desa_indonesia')->result();
	}
	public function getKecByKota($kota)
	{
		$this->db->select('DISTINCT(nm_kec)');
		$this->db->where('nm_kab', $kota);
		return $this->db->get('desa_indonesia')->result();
	}
	public function getKelByKec($kec)
	{
		$this->db->select('DISTINCT(nm_desa)');
		$this->db->where('nm_kec', $kec);
		return $this->db->get('desa_indonesia')->result();
	}
	public function getKec()
	{
		$this->db->select('DISTINCT(nm_kec)');
		$this->db->from('desa_indonesia');
		return $this->db->get()->result_array();
	}
	public function getKel()
	{
		$this->db->select('DISTINCT(nm_desa)');
		$this->db->from('desa_indonesia');
		return $this->db->get()->result_array();
	}
	public function getDiagnosa()
	{
		$this->db->select('id_diagnosa,nama_diagnosa');
		$this->db->from('list_diagnosa');
		return $this->db->get()->result_array();
	}
	public function tambah_pasien($data)
	{
		return $this->db->insert('pasien', $data);
	}
	public function tambah_pelayanan($data)
	{
		return $this->db->insert('pelayanan', $data);
	}

	// utk tracer
	public function tambah_tracer_kamar_kartu($tracer)
	{
		return $this->db->insert('tracer_kamar_kartu', $tracer);
	}

	public function tambah_history_ugd($data)
	{
		return $this->db->insert('history_pelayanan_ugd', $data);
	}
	public function tambah_history_poli($data)
	{
		return $this->db->insert('history_pelayanan', $data);
	}
	public function tambah_history_ranap($data)
	{
		return $this->db->insert('history_pelayanan_ranap', $data);
	}
	public function tambah_kamar($data)
	{
		return $this->db->insert('riwayat_kamar', $data);
	}
	public function ubah_pasien($id, $data)
	{
		$this->db->where('no_rm', $id);
		return $this->db->update('pasien', $data);
	}
	public function tambah_erm($data)
	{
		return $this->db->insert('erm', $data);
	}
	public function ubah_status_kamar($id, $data)
	{
		$this->db->where('id_ruangan', $id);
		return $this->db->update('ruangan', $data);
	}
	public function get_ai_tbl_pelayanan()
	{
		return $this->db->query('select generate_id_pelayanan() as id')->row()->id;
	}
	public function get_ai_tbl_history_ugd()
	{
		return $this->db->query('select generate_id_history_ugd() as id from dual')->row()->id;
	}
	public function get_ai_tbl_history_poli()
	{
		return $this->db->query('select generate_id_history() as id from dual')->row()->id;
	}
	
	public function get_ai_tbl_history_ranap()
	{
		return $this->db->query('select generate_id_history_ranap() as id from dual')->row()->id;
	}
	public function get_ai_tbl_riwayat()
	{
		return $this->db->query('select generate_id_riwayat() as id from dual')->row()->id;
	}
	public function get_ai_tbl_erm()
	{
		return $this->db->query('select generate_id_erm() as id from dual')->row()->id;
	}

	public function getIdStaff($id)
	{
		$this->db->select('id_staff');
		$this->db->where('username', $id);
		return $this->db->get('staff')->row();
	}

	public function insert_antrian_poli($data)
	{
		$this->db->insert('antrian_poli', $data);
	}
	public function getDokter($spes)
	{
		$this->db->select('d.* , j.jam_mulai , j.jam_selesai');
		$this->db->from('dokter d , jadwal_dokter_lokal j');
		$this->db->where('d.id_dokter = j.id_dokter');
		$this->db->where('d.status', 'AKTIF');
		$this->db->where('d.dokter_spes', $spes);
		$this->db->group_by('d.id_dokter');
		$this->db->order_by('d.nama');
		return $this->db->get()->result_array();
	}
	// public function getDokterPrioritas($spes)
	// {
	// 	$this->db->select('*');
	// 	$this->db->where('status', 'AKTIF');
	// 	$this->db->where('dokter_spes', $spes);
	// 	$this->db->group_by('dokter_spes,id_dokter');
	// 	$this->db->order_by('nama');
	// 	return $this->db->get('dokter')->result_array();
	// }

	public function getAntrian($poli)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$this->db->select_max('no_antri');
		$this->db->from('antrian_poli');
		$this->db->like('tanggal', $tgl);
		$this->db->where('poli', $poli);
		return $this->db->get()->result();
	}
	public function cekAntrian($poli, $nomor)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$this->db->select('no_antri');
		$this->db->from('antrian_poli');
		$this->db->where('tanggal', $tgl);
		$this->db->where('poli', $poli);
		$this->db->where('no_antri', $nomor);
		return $this->db->get()->row_array();
	}

	public function getCetakById($antrian, $poli)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$this->db->select('a.no_antri no_antri, p.nama_panjang nama,a.inisial inisial,ps.nama pasien,ps.no_rm,cb.nama klaim,dr.nama nama_dokter, s.nama staff,(pl.biaya_rs+pl.biaya_jasa+pl.biaya_admin) total');
		$this->db->from('antrian_poli a, list_poli p , pelayanan pl, pasien ps, cara_bayar cb, history_pelayanan hp,dokter dr,staff s');
		$this->db->where('a.poli = p.id_list_poli');
		$this->db->where('a.id_pelayanan = pl.id_pelayanan');
		$this->db->where('pl.cara_bayar = cb.id_cara_bayar');
		$this->db->where('pl.id_pasien = ps.no_rm');
		$this->db->where('pl.id_pelayanan = hp.id_pelayanan');
		$this->db->where('pl.id_staff = s.id_staff');
		$this->db->where('hp.dpjp = dr.id_dokter');
		$this->db->like('tanggal', $tgl);
		$this->db->where('a.no_antri', $antrian);
		$this->db->where('a.poli', $poli);
		return $this->db->get()->row_array();
	}

	//CETAK ANTRIAN PASIEN
	public function getCetakAntrianById($id_pelayanan)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$dbantrian = $this->db->get_where('antrian_poli', ['id_history !=' => NULL, 'id_antrian' => $id_pelayanan])->row();
		if (!empty($dbantrian)) {
			$this->db->select('a.no_antri no_antri,h.nama_poli poli, p.nama_panjang nama,a.inisial inisial,ps.nama pasien,ps.no_rm,cb.nama klaim,dr.nama nama_dokter, a.id_pelayanan pelayanan,h.biaya_jasa total, s.nama staff');
			$this->db->from('antrian_poli a, list_poli p , pelayanan pl, pasien ps, cara_bayar cb, history_pelayanan h,dokter dr,staff s');
			$this->db->where('h.id_history', $dbantrian->id_history);
		} else {
			$this->db->select('a.no_antri no_antri,h.nama_poli poli, p.nama_panjang nama,a.inisial inisial,ps.nama pasien,ps.no_rm,cb.nama klaim,dr.nama nama_dokter, a.id_pelayanan pelayanan,(pl.biaya_rs+pl.biaya_jasa+pl.biaya_admin) total, s.nama staff');
			$this->db->from('antrian_poli a, list_poli p , pelayanan pl, pasien ps, cara_bayar cb, history_pelayanan h,dokter dr,staff s');
		}
		// $this->db->where('a.poli = p.id_list_poli');
		$this->db->where('a.id_pelayanan = pl.id_pelayanan');

		$this->db->where('pl.id_pelayanan = h.id_pelayanan');
		$this->db->where('h.nama_poli = p.id_list_poli');
		$this->db->where('pl.cara_bayar = cb.id_cara_bayar');
		$this->db->where('pl.id_pasien = ps.no_rm');
		$this->db->where('pl.id_staff = s.id_staff');
		$this->db->where('a.dpjp = dr.id_dokter');
		$this->db->where('h.status', 1);
		$this->db->where('a.id_antrian', $id_pelayanan);
		// $this->db->where('pl.id_pelayanan', $id_pelayanan);
		return $this->db->get()->row_array();
	}
	public function getCetakAntrianByIdPrio($id_pelayanan)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");

		$this->db->select('"" no_antri,h.nama_poli poli, p.nama_panjang nama,p.inisial inisial,ps.nama pasien,ps.no_rm,cb.nama klaim,dr.nama nama_dokter, pl.id_pelayanan pelayanan,(pl.biaya_rs+h.biaya_jasa+pl.biaya_admin) total, s.nama staff');
		$this->db->from('list_poli p , pelayanan pl, pasien ps, cara_bayar cb, history_pelayanan h,dokter dr,staff s');
		$this->db->where('pl.id_pelayanan = h.id_pelayanan');
		$this->db->where('h.nama_poli = p.id_list_poli');
		$this->db->where('pl.cara_bayar = cb.id_cara_bayar');
		$this->db->where('pl.id_pasien = ps.no_rm');
		$this->db->where('pl.id_staff = s.id_staff');
		$this->db->where('h.dpjp = dr.id_dokter');
		$this->db->where('h.id_history', $id_pelayanan);
		return $this->db->get()->row_array();
	}
	//CETAK ANTRIAN PASIEN IGD
	public function getCetakAntrianIGDById($id_pelayanan, $id_history)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$dbantrian = $this->db->get_where('antrian_igd', ['id_history' => $id_history])->row();
		if (!empty($dbantrian)) {
			$this->db->select('a.no_antri no_antri,ps.no_rm,ps.nama, a.id_pelayanan pelayanan,h.biaya_jasa total,pl.cara_bayar, s.nama staff');
			$this->db->from('antrian_igd a , pelayanan pl, pasien ps,  history_pelayanan_ugd h,staff s');
			$this->db->where('h.id_history', $id_history);
		} else {
			$this->db->select('a.no_antri no_antri,ps.no_rm,ps.nama, a.id_pelayanan pelayanan,(pl.biaya_rs+pl.biaya_jasa+pl.biaya_admin) total,pl.cara_bayar, s.nama staff');
			$this->db->from('antrian_igd a , pelayanan pl, pasien ps,  history_pelayanan_ugd h,staff s');
		}

		$this->db->where('a.id_pelayanan = pl.id_pelayanan');
		$this->db->where('pl.id_pelayanan = h.id_pelayanan');
		$this->db->where('pl.id_pasien = ps.no_rm');
		$this->db->where('pl.id_staff = s.id_staff');
		$this->db->where('pl.id_pelayanan', $id_pelayanan);
		return $this->db->get()->row_array();
	}
	public function getCetakAntrianIGDByRm($no_rm)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$this->db->select('s.nama staff');
		$this->db->from('pelayanan pl,staff s');
		$this->db->where('pl.id_staff = s.id_staff');
		$this->db->where('pl.id_pasien', $no_rm);
		$this->db->order_by('pl.tgl_masuk', 'desc');
		$this->db->limit(1);
		return $this->db->get()->row();
	}

	public function getSisaAntrian($poli)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$this->db->select('count(no_antri) no_antri');
		$this->db->from('antrian_poli');
		$this->db->like('tanggal', $tgl);
		$this->db->where('poli', $poli);
		$this->db->where_not_in('status', 2);
		return $this->db->get()->row_array();
	}

	//CETAK ANTRIAN PASIEN
	public function getSisaAntrianPasien($poli)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$this->db->select('count(no_antri) no_antri');
		$this->db->from('antrian_poli');
		$this->db->like('tanggal', $tgl);
		$this->db->where('poli', $poli);
		$this->db->where_not_in('status', 2);
		return $this->db->get()->row_array();
	}

	//CETAK ANTRIAN PASIEN IGD
	public function getSisaAntrianPasienIGD($poli)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$this->db->select('count(no_antri) no_antri');
		$this->db->from('antrian_igd');
		$this->db->like('tanggal', $tgl);
		$this->db->where('poli', $poli);
		$this->db->where_not_in('status', 2);
		return $this->db->get()->row_array();
	}

	function get_room()
	{
		$this->db->select('kodekelas,koderuang,namaruang,kapasitas,tersedia');
		return $this->db->get('v_bpjs_room')->result();
	}

	public function jumlah_pasien_per_poli_bulan($alias_poli, $jenis_kelamin, $bulan, $tahun)
	{
		$poli_codes = array(
			'anak' => 'E00RX703',
			'paru' => 'ZX2016T39',
			'dalam' => '24QRNLX29R',
			'umum' => 'MWK205D30K',
			'obgyn' => 'HLGI4176K8'
		);

		if (array_key_exists($alias_poli, $poli_codes)) {
			$id_poli = $poli_codes[$alias_poli];

			$this->db->select('COUNT(DISTINCT p.id_pelayanan) as jumlah_pasien');
			$this->db->from('pelayanan p');
			$this->db->join('history_pelayanan hp', 'p.id_pelayanan = hp.id_pelayanan', 'inner');
			$this->db->join('list_poli lp', 'hp.nama_poli = lp.id_list_poli', 'inner');
			$this->db->join('pasien_TBC pt', 'p.id_pelayanan = pt.id_pelayanan', 'inner');

			$this->db->where('lp.id_list_poli', $id_poli);
			$this->db->where('pt.jenis_kelamin', $jenis_kelamin);
			$this->db->where('MONTH(p.tgl_masuk)', $bulan);
			$this->db->where('YEAR(p.tgl_masuk)', $tahun);

			$query = $this->db->get();
			return $query->row()->jumlah_pasien;
		}
		return 0;
	}



	function jumlah_skrining($alias_poli, $jenis_kelamin, $bulan, $tahun)
	{
		$poli_codes = array(
			'anak' => 'E00RX703',
			'paru' => 'ZX2016T39',
			'dalam' => '24QRNLX29R',
			'umum' => 'MWK205D30K',
			'obgyn' => 'HLGI4176K8'
		);
		if (array_key_exists($alias_poli, $poli_codes)) {
			$id_poli = $poli_codes[$alias_poli];

			$this->db->select("COUNT(id_pasien) as jumlah_skrining");
			$this->db->from("pasien_TBC");
			$this->db->where("id_poli", $id_poli);
			$this->db->where("jenis_kelamin", $jenis_kelamin);

			// Filter by month and year
			$this->db->where('MONTH(tgl_dinyatakan)', $bulan);
			$this->db->where('YEAR(tgl_dinyatakan)', $tahun);

			$query = $this->db->get();
			return $query->row()->jumlah_skrining;
		}
		return 0;
	}


	function jumlah_terduga_per_poli($alias_poli, $jenis_kelamin, $bulan, $tahun)
	{
		// Membuat map dari alias ke kode poli yang sebenarnya
		$kode_poli_map = array(
			'anak' => 'E00RX703',
			'paru' => 'ZX2016T39',
			'dalam' => '24QRNLX29R',
			'umum' => 'MWK205D30K',
			'obgyn' => 'HLGI4176K8'
		);

		// Mengecek apakah alias poli yang diberikan ada dalam map
		if (array_key_exists($alias_poli, $kode_poli_map)) {
			$id_poli = $kode_poli_map[$alias_poli];

			// Ambil jumlah terduga hanya untuk kode poli yang diinginkan dan berdasarkan jenis kelamin
			$this->db->select("COUNT(pt.id_pasien) as jumlah_terduga");
			$this->db->from("pasien_TBC pt");
			$this->db->join("list_poli lp", "pt.id_poli = lp.id_list_poli", "inner");
			$this->db->where("pt.keterangan", "terduga TBC");
			$this->db->where("lp.id_list_poli", $id_poli);
			$this->db->where("pt.jenis_kelamin", $jenis_kelamin);

			// Filter by month and year
			$this->db->where('MONTH(pt.tgl_dinyatakan)', $bulan);
			$this->db->where('YEAR(pt.tgl_dinyatakan)', $tahun);

			$query = $this->db->get();

			// Simpan jumlah terduga untuk poli yang diproses dalam array hasil
			return $query->row()->jumlah_terduga;
		} else {
			// Jika alias poli yang diberikan tidak ada dalam map, kembalikan pesan error atau nilai default
			return "Alias poli tidak valid.";
		}
	}

	public function getTanggalMax($bulan, $tahun)
	{
		// Format tanggal awal dan akhir dari bulan yang diberikan
		$start_date = "$tahun-$bulan-01";
		$end_date = date("Y-m-t", strtotime($start_date));

		// Query untuk mendapatkan tanggal terakhir dari bulan yang diberikan
		$this->db->select_max('tgl_dinyatakan');
		$this->db->from('pasien_TBC');
		$this->db->where('tgl_dinyatakan >=', $start_date);
		$this->db->where('tgl_dinyatakan <=', $end_date);

		$query = $this->db->get();
		$result = $query->row();

		return $result ? $result->tgl_dinyatakan : null;
	}

	function semua_terduga()
	{
		$this->db->select("COUNT(id_pasien) as total_terduga");
		$this->db->from("pasien_TBC");
		$this->db->where("keterangan = 'terduga TBC ' and 'Terduga TBC'");
		$query = $this->db->get();
		return $query->row()->total_terduga;
	}
	public function searchDiagnosa($term)
	{
		$this->db->select('id_diagnosa, nama_diagnosa');
		$this->db->from('list_diagnosa');
		$this->db->like('id_diagnosa', $term);
		$query = $this->db->get();

		return $query->result();
	}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
}