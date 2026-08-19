<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Assembling extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function cek_id($id_pelayanan)
    {
        $this->db->select('kode');
        $this->db->from('diagnosa');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function cek_diagnosa($id_pelayanan)
    {
        $this->db->select('nama_diagnosa');
        $this->db->from('diagnosa');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function selectDataAssembling($first_date, $second_date, $jenis_pelayanan)
    {

        $this->db->select('*');
        $this->db->from('v_assembling');
        $this->db->where("tgl_masuk BETWEEN '$first_date' AND '$second_date'");
        $this->db->where('jenis_pelayanan', $jenis_pelayanan);
        return $this->db->get()->result();
    }

    public function selectDataDiagnosa()
    {

        $this->db->select('*');
        $this->db->from('diagnosa');

        return $this->db->get()->result();
    }

    public function selectDataAllDiagnosa()
    {

        $this->db->select('*');
        $this->db->from('list_diagnosa');

        return $this->db->get()->result();
    }

    public function selectDataAllProsedur()
    {

        $this->db->select('*');
        $this->db->from('list_prosedur');

        return $this->db->get()->result();
    }


    public function selectDataDiagnosaByIdPel($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('diagnosa');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function selectDataProsedurByIdPel($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('prosedur');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function selectDataPendaftaranby_id($id_pelayanan, $id_history)
    {
        $this->db->select('p.id_pelayanan,p.tgl_masuk, p.tgl_keluar, d.nama, p.diagnosa, p.keterangan, p.no_jaminan, p.no_sep, p.cara_keluar, p.keadaan_keluar');
        $this->db->from('pelayanan p');
        $this->db->join('history_pelayanan h', 'h.id_pelayanan=p.id_pelayanan');
        $this->db->join('dokter d', 'd.id_dokter=h.dpjp');
        $this->db->where('p.id_pelayanan', $id_pelayanan);
        $this->db->where('h.id_history', $id_history);


        return $this->db->get()->result();
    }

    public function update_akunonline($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }
    public function insert_diagnosa($page_data, $table)
    {

        $this->db->insert($table, $page_data);
    }
    public function insert_prosedur($page_data, $table)
    {

        $this->db->insert($table, $page_data);
    }
    public function delete_dignosa_byId($id_pelayanan, $no_diagnosa)
    {
        $this->db->delete('diagnosa', array('id_pelayanan' => $id_pelayanan, 'no_diagnosa' => $no_diagnosa));
    }
    public function delete_prosedur_byId($id_pelayanan, $no_prosedur)
    {
        $this->db->delete('prosedur', array('id_pelayanan' => $id_pelayanan, 'no_prosedur' => $no_prosedur));
    }
    public function edit_cara_keluar($idp, $data)
    {
        $this->db->where('id_pelayanan', $idp);
        $this->db->update('pelayanan', $data);
    }
    public function update_cara_keluar($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function update_keadaan_keluar($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }



}
