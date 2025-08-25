<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pr_obat extends CI_model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }

    public function getDataFaktur1($idFaktur)
    {
        $this->db->select('l.nama, f.harga, f.status, f.jumlah,f.total,f.frek, f.id_detail, f.status,f.id_detail_usulan');
        $this->db->from('list_logistik l, detail_perencanaan_logfar f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('f.id_detail', $idFaktur);
        return $this->db->get()->result();
    }
    public function getAllData()
    {
        return $this->db->get('faktur_pr_obat')->result_array();
    }

    public function selectData()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->distinct();
        $this->db->select('r.* , p.no_dokumen no_perencanaan');
        $this->db->from('faktur_pr_obat r, faktur_perencanaan_logfar p');
        $this->db->where('r.id_perencanaan=p.id_faktur');
        $this->db->where('r.ket !=', 2);
        $this->db->like('r.tgl_input', $tgl);
        $this->db->order_by('tgl_input desc');
        return $this->db->get()->result();
    }

  
    //end range

    public function getDataFaktur($idFaktur)
    {
        $this->db->select('l.nama, f.*, l.tipe');
        $this->db->from('list_logistik l, detail_pr_obat f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('f.id_faktur', $idFaktur);
        return $this->db->get()->result();
    }



    public function getNamaObat()
    {
        $this->db->select('*');
        $this->db->from('list_logistik');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    public function getNoFaktur($idFaktur)
    {
        $this->db->select('no_dokumen');
        $this->db->from('faktur_pr_obat');
        $this->db->where('id_faktur', $idFaktur);
        return $this->db->get()->result();
    }

  

    public function HitungPO($idFaktur)
    {
        $this->db->select('sum(total) total');
        $this->db->from('detail_perencanaan_logfar');
        // $this->db->where('status', 0);
        $this->db->where('id_faktur', $idFaktur);
        //$this->db->group_by('d.id_faktur');

        return $this->db->get()->result();
    }

    //hapus 

    public function delete_faktur($id_faktur)
    {
        $this->db->delete('faktur_pr_obat', array('id_faktur' => $id_faktur));
    }
   

    //end hapus

    public function delete($id, $table, $where)
    {
        $this->db->delete($table, array($where => $id));
    }



    public function getSatuanObat()
    {
        $this->db->select('*');
        $this->db->from('satuan_obat');
        $this->db->order_by('satuan', 'ASC');
        return $this->db->get()->result_array();
    }

    public function selectNoDokumen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("m");
        $this->db->select('MAX(index_dok) max');
        $this->db->from('faktur_pr_obat');
        $this->db->like('tgl_input', $tgl);
        return $this->db->get()->result();
    }

    /*public function getMax()
    {
        $this->db->select_max('index_dok');
        $this->db->from('faktur_logistik_farmasi');
        return $this->db->get()->row_array();
    }*/

    public function insertFaktur($data, $table)
    {
        $this->db->insert($table, $data);
    }

    //

    public function insertDetail($data, $table)
    {
        $this->db->insert($table, $data);
    }

  
    public function update($where, $data, $table)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }
    public function getPerencanaan()
    {
        $this->db->select('*');
        $this->db->from('faktur_perencanaan_logfar');
        $this->db->where('ket', 0);
        return $this->db->get()->result_array();
    }
    public function getDataFakturPerencanaan($idFaktur)
    {
        $this->db->select('f.id_list,l.*, f.harga, f.status, f.jumlah,f.total, f.id_detail, f.status,f.frek');
        $this->db->from('list_logistik l, detail_perencanaan_logfar f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('f.status', 0);
        $this->db->where('f.id_faktur', $idFaktur);
        return $this->db->get()->result();
    }

    public function getTotalPO($id_detail)
    {
        $this->db->select("SUM(d.diskon*d.jumlah) frek, p.jumlah");
        $this->db->from('detail_pr_obat d, detail_perencanaan_logfar p');
        $this->db->where('d.id_detail_pr = p.id_detail');
        $this->db->where('d.id_detail_pr', $id_detail);
        return $this->db->get()->row_array();
    }
    public function getProdusenById($idFaktur)
    {
        $this->db->select('l.*, f.id_list');
        $this->db->from('produsen l, vendor_pr_obat f');
        $this->db->where('f.id_produsen=l.id_produsen');
        $this->db->where('f.id_pr', $idFaktur);
        return $this->db->get()->result();
    }
}
