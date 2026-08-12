<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pelayanan_masuk extends CI_Model
{

	public function selectPelayananMasuk()
	{
		$this->db->from('v_pelayanan_masuk');
		return $this->db->get()->result();
	}

	public function getNamaDPJP()
	{
		$this->db->select('nama, id_dokter');
		$this->db->where('status', 'AKTIF');
		$this->db->where('kode_dokter !=', '-');
		$this->db->group_by('nama');
		$this->db->order_by('nama');
		return $this->db->get('dokter')->result_array();
	}

	public function getGelangById($id_pelayanan)
	{
		$this->db->select('pa.nama,pa.no_rm,pa.tgl_lahir, d.nama dokter, c.nama cara ');
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
		$this->db->select('
      pa.nama,pa.no_rm,pa.tgl_lahir,pa.jenis_kelamin,pa.alamat , c.nama caraBayar,p.tgl_masuk
      ');
		$this->db->from('pelayanan p');
		$this->db->join('pasien pa', 'pa.no_rm = p.id_pasien');
		$this->db->join('cara_bayar c', 'p.cara_bayar = c.id_cara_bayar');
		$this->db->where('p.id_pelayanan', $id_pelayanan);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getPoli()
	{
		$this->db->select('DISTINCT(id_list_poli), nama_panjang, kdpoli_bpjs,');
		$this->db->where('status_dokter', 'ADA');
		$this->db->group_by('nama_panjang', 'ASC');
		return $this->db->get('list_poli')->result_array();
	}
	
	public function getPoliODC()
	{
		$this->db->select('DISTINCT(id_list_poli), nama_panjang');
		$this->db->where('status_dokter', 'ADA');
		$this->db->where("kdpoli_bpjs ='MAT' OR kdpoli_bpjs ='INT' OR kdpoli_bpjs ='ANA' OR kdpoli_bpjs ='BDM' OR kdpoli_bpjs ='THT' OR kdpoli_bpjs ='OBG' OR kdpoli_bpjs ='KEM' OR kdpoli_bpjs ='BED' OR kdpoli_bpjs ='ORT'");
		$this->db->group_by('nama_panjang', 'ASC');
		return $this->db->get('list_poli')->result_array();
	}

	public function getKamar($id)
	{
		$this->db->select('DISTINCT(tipe), id_ruangan');
		$this->db->where('kelas_ruangan', $id);
		return $this->db->get('v_kamar')->result_array();
	}

	public function getKelas()
	{
		$this->db->select('DISTINCT(kelas_ruangan)');
		$this->db->where('keterangan', 'AKTIF');
		$this->db->where('status', 'tersedia');
		$this->db->order_by('kelas_ruangan');
		return $this->db->get('ruangan')->result_array();
	}
	public function getNoTidur()
	{
		$this->db->select('DISTINCT(tipe)');
		$this->db->order_by('tipe');
		return $this->db->get('ruangan')->result_array();
	}

	public function tambah_history($data_history)
	{
		return $this->db->insert('history_pelayanan', $data_history);
	}
	public function tambah_kamar($data_kamar)
	{
		return $this->db->insert('riwayat_kamar', $data_kamar);
	}
	public function ubah_status_kamar($id_kamar, $data_status_kamar)
	{
		$this->db->where('id_ruangan', $id_kamar);
		return $this->db->update('ruangan', $data_status_kamar);
	}


	public function selectDataPelayananby_id($id_pelayanan)
	{
		$this->db->where('id_pelayanan', $id_pelayanan);
		$this->db->from('v_pelayanan_masuk');
		return $this->db->get()->result();
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
	public function get_ai_tbl_idriway()
	{
		return $this->db->query('select generate_id_riwayat() as id from dual')->row()->id;
	}
	public function getIdStaff($id)
	{
		$this->db->select('id_staff');
		$this->db->where('username', $id);
		return $this->db->get('staff')->row();
	}
	public function getDokter($spes)
	{
		$this->db->select('nama, id_dokter');
		$this->db->where('status', 'AKTIF');
		$this->db->where('dokter_spes', $spes);
		$this->db->group_by('dokter_spes,id_dokter');
		$this->db->order_by('nama');
		return $this->db->get('dokter')->result_array();
	}
	public function getDokterByNama($cari)
	{
		$this->db->select('nama, id_dokter');
		$this->db->where('status', 'AKTIF');
		$this->db->where('kode_dokter !=', '-');
        $this->db->like('nama', $cari, 'both');
		$this->db->group_by('dokter_spes,id_dokter, nama');
		$this->db->order_by('nama');
		return $this->db->get('dokter')->result_array();
	}
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pelayanan_masuk extends CI_Model
{

	public function selectPelayananMasuk()
	{
		$this->db->from('v_pelayanan_masuk');
		return $this->db->get()->result();
	}

	public function getNamaDPJP()
	{
		$this->db->select('nama, id_dokter');
		$this->db->where('status', 'AKTIF');
		$this->db->where('kode_dokter !=', '-');
		$this->db->group_by('nama');
		$this->db->order_by('nama');
		return $this->db->get('dokter')->result_array();
	}

	public function getGelangById($id_pelayanan)
	{
		$this->db->select('pa.nama,pa.no_rm,pa.tgl_lahir, d.nama dokter, c.nama cara ');
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
		$this->db->select('
      pa.nama,pa.no_rm,pa.tgl_lahir,pa.jenis_kelamin,pa.alamat , c.nama caraBayar,p.tgl_masuk
      ');
		$this->db->from('pelayanan p');
		$this->db->join('pasien pa', 'pa.no_rm = p.id_pasien');
		$this->db->join('cara_bayar c', 'p.cara_bayar = c.id_cara_bayar');
		$this->db->where('p.id_pelayanan', $id_pelayanan);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getPoli()
	{
		$this->db->select('DISTINCT(id_list_poli), nama_panjang, kdpoli_bpjs,');
		$this->db->where('status_dokter', 'ADA');
		$this->db->group_by('nama_panjang', 'ASC');
		return $this->db->get('list_poli')->result_array();
	}
	
	public function getPoliODC()
	{
		$this->db->select('DISTINCT(id_list_poli), nama_panjang');
		$this->db->where('status_dokter', 'ADA');
		$this->db->where("kdpoli_bpjs ='MAT' OR kdpoli_bpjs ='INT' OR kdpoli_bpjs ='ANA' OR kdpoli_bpjs ='BDM' OR kdpoli_bpjs ='THT' OR kdpoli_bpjs ='OBG' OR kdpoli_bpjs ='KEM' OR kdpoli_bpjs ='BED' OR kdpoli_bpjs ='ORT'");
		$this->db->group_by('nama_panjang', 'ASC');
		return $this->db->get('list_poli')->result_array();
	}

	public function getKamar($id)
	{
		$this->db->select('DISTINCT(tipe), id_ruangan');
		$this->db->where('kelas_ruangan', $id);
		return $this->db->get('v_kamar')->result_array();
	}

	public function getKelas()
	{
		$this->db->select('DISTINCT(kelas_ruangan)');
		$this->db->where('keterangan', 'AKTIF');
		$this->db->where('status', 'tersedia');
		$this->db->order_by('kelas_ruangan');
		return $this->db->get('ruangan')->result_array();
	}
	public function getNoTidur()
	{
		$this->db->select('DISTINCT(tipe)');
		$this->db->order_by('tipe');
		return $this->db->get('ruangan')->result_array();
	}

	public function tambah_history($data_history)
	{
		return $this->db->insert('history_pelayanan', $data_history);
	}
	public function tambah_kamar($data_kamar)
	{
		return $this->db->insert('riwayat_kamar', $data_kamar);
	}
	public function ubah_status_kamar($id_kamar, $data_status_kamar)
	{
		$this->db->where('id_ruangan', $id_kamar);
		return $this->db->update('ruangan', $data_status_kamar);
	}


	public function selectDataPelayananby_id($id_pelayanan)
	{
		$this->db->where('id_pelayanan', $id_pelayanan);
		$this->db->from('v_pelayanan_masuk');
		return $this->db->get()->result();
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
	public function get_ai_tbl_idriway()
	{
		return $this->db->query('select generate_id_riwayat() as id from dual')->row()->id;
	}
	public function getIdStaff($id)
	{
		$this->db->select('id_staff');
		$this->db->where('username', $id);
		return $this->db->get('staff')->row();
	}
	public function getDokter($spes)
	{
		$this->db->select('nama, id_dokter');
		$this->db->where('status', 'AKTIF');
		$this->db->where('dokter_spes', $spes);
		$this->db->group_by('dokter_spes,id_dokter');
		$this->db->order_by('nama');
		return $this->db->get('dokter')->result_array();
	}
	public function getDokterByNama($cari)
	{
		$this->db->select('nama, id_dokter');
		$this->db->where('status', 'AKTIF');
		$this->db->where('kode_dokter !=', '-');
        $this->db->like('nama', $cari, 'both');
		$this->db->group_by('dokter_spes,id_dokter, nama');
		$this->db->order_by('nama');
		return $this->db->get('dokter')->result_array();
	}
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
