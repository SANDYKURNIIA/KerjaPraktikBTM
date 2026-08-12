<?php

class M_Permintaan_obat extends CI_Model
{

    // Laporan Mutasi
    public function selectPermintaanObat($unit)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('r.*, s.nama');
        $this->db->from('request_obat r, staff s');
        $this->db->where('r.id_staff = s.id_staff');
        if($unit == 'labor' || $unit == 'laboratorium'){
            $this->db->where("s.tipe ='labor' or s.tipe='laboratorium'");
        }else{
            $this->db->like('s.tipe', $unit);
        }
        $this->db->like('r.tanggal', $tgl);
        $this->db->where('r.status', 'diajukan');
        $this->db->order_by('tanggal desc');
        return $this->db->get()->result();
    }

    public function selectStatus($tipe)
    {
        $this->db->select('status');
        $this->db->where('unit', $tipe);
        return $this->db->get('admin_logistik_farmasi')->row_array();
    }

    public function selectRangePermintaanObat($mulai, $akhir, $unit)
    {
        $this->db->select('r.*, s.nama');
        $this->db->from('request_obat r, staff s');
        $this->db->where('r.id_staff = s.id_staff');
        $this->db->like('s.tipe', $unit);
        $this->db->where('r.tanggal >=', $mulai);
        $this->db->where('r.tanggal <=', $akhir);
        $this->db->where('r.status', 'diajukan');
        $this->db->order_by('tanggal desc');
        return $this->db->get()->result();

        // $query = $this->db->query("SELECT r.*, s.* FROM request_obat r, staff s WHERE s.id_staff=r.id_staff AND r.id_staff = '$unit' AND r.tanggal BETWEEN '$mulai' AND '$akhir'");
        // return $query->result();
    }
    // End
    public function insertRequest($data, $table)
    {
        return $this->db->insert($table, $data);
    }
    public function insertDetailRequest($data, $table)
    {
        return $this->db->insert($table, $data);
    }
    public function getNamaObat()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.id_logistik,l.nama , SUM(sl.frek) stok,produsen');
        $this->db->from('list_logistik l');
        $this->db->join('stok_logistik sl', 'sl.id_logistik=l.id_logistik', 'left');
        $this->db->where('l.status', 'AKTIF');
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function getNamaObatUnit($tipe)
    {
        date_default_timezone_set('Asia/Jakarta');
       
        $this->db->select('l.id_logistik,l.nama , SUM(sl.frek) stok, produsen, l.satuan_terkecil');
        $this->db->from('list_logistik l');
        if ($tipe == 'depo ranap') {
            $this->db->join('stok_depo sl', 'sl.id_logistik=l.id_logistik', 'left');
        }else if($tipe=="unit") {
            $this->db->join('stok_apotik sl', 'sl.id_logistik=l.id_logistik', 'left');
        }else if($tipe=="depo") {
            $this->db->join('stok_logistik sl', 'sl.id_logistik=l.id_logistik', 'left');
        }
        $this->db->where('l.status', 'AKTIF');
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function getExpByObat($obat)
    {
        $this->db->select('sum(s.frek) stok, s.kadaluarsa');
        $this->db->from('stok_logistik s');
        $this->db->where(' id_logistik', $obat);
        $this->db->group_by('s.id_stok');
        $this->db->having('sum(s.frek)>0');
        return $this->db->get()->result_array();
    }
    public function selectDataTindakanById($id_req)
    {
        $this->db->select('l.nama,l.produsen,l.satuan_terkecil, dr.*,r.tipe');
        $this->db->from('detail_request dr , request_obat r, list_logistik l');
        $this->db->where('dr.id_form=r.id_req');
        $this->db->where('dr.id_logistik=l.id_logistik');
        $this->db->where('dr.id_form', $id_req);
        $this->db->order_by('dr.tgl_req desc');
        return $this->db->get()->result();
    }
    public function delete_tindakan($id, $table)
    {
        $this->db->delete($table, array('id_req' => $id,'status'=>'DIAJUKAN'));
    }
    public function delete_permintaan($id)
    {
        $this->db->delete('detail_request', array('id_form' => $id,'status'=>'DIAJUKAN'));
        $this->db->delete('request_obat', array('id_req' => $id));
    }
    public function getSumObat($obat)
    {
        $this->db->select('sum(frek) stok');
        $this->db->from('stok_logistik');
        $this->db->where(' id_logistik', $obat);
        return $this->db->get()->row_array();
    }
}
