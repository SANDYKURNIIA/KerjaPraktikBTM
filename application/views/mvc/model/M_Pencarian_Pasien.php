<?php

class M_Pencarian_Pasien extends CI_Model
{

	// public function selectDataPasien()
	// {
	// 	$this->db->from('pasien');
	// 	$this->db->not_like('no_rm', '-999');
	// 	return $this->db->get()->result();
	// }
	public function get_cek_like($cari_data){
		$this->db->like('no_rm', $cari_data, 'both');
		$this->db->or_like('nama', $cari_data, 'both');
		$this->db->or_like('tgl_lahir', $cari_data, 'both');
        $result = $this->db->get('pasien')->result();
        return $result;
	}
	public function select_by_no_rm($id)
	{
		$this->db->where('no_rm', $id);
		$query = $this->db->get('pasien')->result();
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
		$query = $this->db->get('v_data_pasien')->result();
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
		return $this->db->get('tipe_masuk')->result_array();
	}


	public function getCaraBayar()
	{
		$this->db->select('DISTINCT(nama), id_cara_bayar');
		$this->db->group_by('nama', 'ASC');
		return $this->db->get('cara_bayar')->result_array();
	}

	public function getNamaDPJP()
	{
		$this->db->select('*');
		$this->db->where('status', 'AKTIF');
		$this->db->group_by('nama', 'ASC');
		return $this->db->get('dokter')->result_array();
	}
	public function getPoli()
	{
		$this->db->select('DISTINCT(id_list_poli), nama_panjang');
		$this->db->where('status_dokter', 'ADA');
		$this->db->group_by('nama_panjang', 'ASC');
		return $this->db->get('list_poli')->result_array();
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
		$this->db->select('p.tgl_masuk, p.tgl_keluar, h.jenis_pelayanan, c.nama caraBayar, p.diagnosa, p.status_rawat, h.id_history id_history');
		$this->db->from('pelayanan p');
		$this->db->join('history_pelayanan_ugd h', 'h.id_pelayanan=p.id_pelayanan');
		$this->db->join('cara_bayar c', 'c.id_cara_bayar=p.cara_bayar');
		$this->db->where('p.id_pasien', $no_rm);
		$this->db->order_by('p.tgl_masuk', 'desc');
		return $this->db->get()->result();
	}

	public function getRiwayatKunjunganPoli($no_rm)
	{
		$this->db->select('p.tgl_masuk, p.tgl_keluar, h.jenis_pelayanan, c.nama caraBayar, p.diagnosa, p.status_rawat, h.id_history id_history');
		$this->db->from('pelayanan p');
		$this->db->join('history_pelayanan h', 'h.id_pelayanan=p.id_pelayanan');
		$this->db->join('cara_bayar c', 'c.id_cara_bayar=p.cara_bayar');
		$this->db->where('p.id_pasien', $no_rm);
		$this->db->order_by('p.tgl_masuk', 'desc');
		return $this->db->get()->result();
	}
	public function getRiwayatKunjunganRanap($no_rm)
	{
		$this->db->select('p.tgl_masuk, p.tgl_keluar, h.jenis_pelayanan, c.nama caraBayar, p.diagnosa, p.status_rawat, h.id_history id_history');
		$this->db->from('pelayanan p');
		$this->db->join('history_pelayanan_ranap h', 'h.id_pelayanan=p.id_pelayanan');
		$this->db->join('cara_bayar c', 'c.id_cara_bayar=p.cara_bayar');
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
		$this->db->select('*');
		$this->db->where('status', 'AKTIF');
		$this->db->where('dokter_spes', $spes);
		$this->db->group_by('dokter_spes,id_dokter');
		$this->db->order_by('nama');
		return $this->db->get('dokter')->result_array();
	}

	public function getAntrian($poli)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$this->db->select_max('no_antri') ;
		$this->db->from('antrian_poli');
		$this->db->like('tanggal', $tgl);
		$this->db->where('poli', $poli);
		return $this->db->get()->result();
	}
	public function cekAntrian($poli, $nomor)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$this->db->select('no_antri') ;
		$this->db->from('antrian_poli');
		$this->db->where('tanggal', $tgl);
		$this->db->where('poli', $poli);
		$this->db->like('no_antri', $nomor);
		return $this->db->get()->row_array();
	}
}
