<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_SEP extends CI_Model
{

	public function getPasien($pelayanan)
	{
		$this->db->select('v.*, p.no_bpjs, p.tgl_lahir,p.agama,p.jenis_kelamin,p.alamat,p.kelurahan,p.kecamatan,p.provinsi');
		$this->db->from('v_kunjungan v, pasien p');
		$this->db->where('v.no_rm = p.no_rm');
		//$this->db->where('p.no_bpjs',$id);
		$this->db->where('v.id_history', $pelayanan);
		return $this->db->get()->row();
	}

	public function getNamaDPJP()
	{
		$this->db->select('*');
		$this->db->where('status', 'AKTIF');
		$this->db->where_not_in('kode_dokter', 0);
		$this->db->group_by('nama');
		$this->db->order_by('nama');
		return $this->db->get('dokter')->result_array();
	}



	public function getPoli()
	{
		$this->db->select('DISTINCT(id_list_poli), nama_panjang');
		$this->db->where('status_dokter', 'ADA');
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
		$this->db->order_by('kelas_ruangan');
		return $this->db->get('ruangan')->result_array();
	}
	public function getNoTidur()
	{
		$this->db->select('DISTINCT(tipe)');
		$this->db->order_by('tipe');
		return $this->db->get('ruangan')->result_array();
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

	public function update($data, $where, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function list_sep($kartu)
	{
		return $this->db->query("SELECT b.no_sep 
		from pelayanan b, pasien p 
		where b.id_pasien = p.no_rm and p.no_bpjs ='$kartu' and (b.no_sep !='' and b.no_sep != '-' and LENGTH(b.no_sep) = 19) order by b.tgl_masuk desc")->result_array();
	}

	function get_antrian($inisial, $dpjp, $tgl)
	{
		$this->db->select('l.nmpoli_bpjs, d.nama nama_dokter, COUNT(a.id_antrian) total_antrian');
		$this->db->from('antrian_poli a, dokter d, list_poli l ');
		$this->db->where('a.inisial = l.inisial and a.dpjp = d.id_dokter');
		$this->db->where('a.inisial', $inisial);
		$this->db->where('a.dpjp', $dpjp);
		$this->db->where('a.tanggal', $tgl);
		$this->db->where('a.jenis_antrian', 'BPJS');
		$this->db->where_not_in('a.ket', 2);
		$this->db->where_not_in('a.status', 3);
		return $this->db->get()->row();
	}
	function get_antrianNonJkn($inisial, $dpjp, $tgl)
	{
		$this->db->select('l.nmpoli_bpjs, d.nama nama_dokter, COUNT(a.id_antrian) total_antrian');
		$this->db->from('antrian_poli a, dokter d, list_poli l ');
		$this->db->where('a.inisial = l.inisial and a.dpjp = d.id_dokter');
		$this->db->where('a.inisial', $inisial);
		$this->db->where('a.dpjp', $dpjp);
		$this->db->where('a.tanggal', $tgl);
		$this->db->where_not_in('a.ket', 2);
		$this->db->where_not_in('a.jenis_antrian', 'BPJS');
		$this->db->where_not_in('a.status', 3);
		return $this->db->get()->row();
	}

	function getTotalAntrian($inisial, $dpjp, $tgl)
	{
		$this->db->select('l.nmpoli_bpjs, d.nama nama_dokter, COUNT(CASE WHEN a.jenis_antrian = "BPJS" THEN 1 END) AS bpjs,
							COUNT(CASE WHEN a.jenis_antrian <> "BPJS" THEN 1 END) AS non_bpjs,
							COUNT(a.id_antrian) AS total_antrian');
		$this->db->from('antrian_poli a, dokter d, list_poli l ');
		$this->db->where('a.inisial = l.inisial and a.dpjp = d.id_dokter');
		$this->db->where('a.inisial', $inisial);
		$this->db->where('a.dpjp', $dpjp);
		$this->db->where('a.tanggal', $tgl);
		$this->db->where('l.status_dokter', 'ADA');
		$this->db->where_not_in('a.ket', 2);
		$this->db->where_not_in('a.status', 3);
		return $this->db->get()->row();
	}
	public function insert_tindakan($data, $table)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function update_tindakan($data, $where, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}


	public function getFormPRB($nosep)
	{
		$this->db->select('*');
		$this->db->from('form_prb');
		$this->db->where('noSep', $nosep);
		$query = $this->db->get();
		return $query->row_array();
	}
}
