<?php

class M_Stok_Obat_ok extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }


    public function getEditObatApotik($stok)
    {
        $hasil = $this->db->query("SELECT l.id_logistik,l.nama,  sum(s.frek) stok, l.produsen
        FROM list_logistik l
        INNER JOIN $stok s 
        on s.id_logistik=l.id_logistik
        GROUP by l.id_logistik
        order by l.nama");
        return $hasil->result_array();
    }
    public function selectStok($stok)
    {
        $data = $this->session->userdata('data_auth');
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        if ($stok == 'stok_ranap') {
            $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok  ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen,max(a.kadaluarsa) kadaluarsa, l.harga_cost, l.ppn, l.margin');
            $this->db->from($stok . ' a,list_logistik l');
            $this->db->where('a.id_resep', $data->ruangan);
            $this->db->where('a.id_logistik=l.id_logistik');
            $this->db->where('l.status', 'AKTIF');
            $this->db->group_by('l.id_logistik');
            $this->db->order_by('stok');
        } else {
            $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok  ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen,max(a.kadaluarsa) kadaluarsa, l.harga_cost, l.ppn, l.margin');
            $this->db->from($stok . ' a,list_logistik l');
            $this->db->where('a.id_logistik=l.id_logistik');
            $this->db->where('l.status', 'AKTIF');
            $this->db->group_by('l.id_logistik');
            $this->db->order_by('stok');
        }

        return $this->db->get()->result();
    }
    public function getStokRanap($id_logistik)
    { ////////////////*BASE
        $data = $this->session->userdata('data_auth');
        $this->db->select('sum(a.frek) stok');
        $this->db->from('stok_ranap a');
        $this->db->join('staff s', 'a.id_staff=s.id_staff');
        // $this->db->where('a.asal_tujuan', 'BASE');
        $this->db->where('s.ruangan', $data->ruangan);
        $this->db->where('a.id_logistik', $id_logistik);
        //$this->db->group_by('a.id_logistik');
        return $this->db->get()->row();
    }
    public function getStokRanap1($id_logistik)
    { ////////////////*permmintaan
        $data = $this->session->userdata('data_auth');
        $this->db->select('sum(a.frek) stok');
        $this->db->from('stok_ranap a');
        $this->db->join('detail_request d', ' a.id_req = d.id_req');
        $this->db->join('staff s', 'd.id_staff=s.id_staff');
        $this->db->where('s.ruangan', $data->ruangan);
        $this->db->where('a.id_logistik', $id_logistik);
        $this->db->where('a.keterangan', 'MASUK');
        //$this->db->group_by('a.id_logistik');
        return $this->db->get()->row();
    }
    public function selectDetailStok($id_logistik, $stok)
    {
        $data = $this->session->userdata('data_auth');
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        if ($stok == 'stok_ranap') {
            $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok ,max(a.kadaluarsa) kadaluarsa ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen');
            $this->db->from($stok . ' a, list_logistik l');
            $this->db->where('a.id_resep', $data->ruangan);
            $this->db->where('a.id_logistik=l.id_logistik');
            $this->db->where('a.id_logistik', $id_logistik);
            $this->db->group_by('a.id_logistik');
            $this->db->order_by('stok');
        } else {
            $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok ,max(a.kadaluarsa) kadaluarsa ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen');
            $this->db->from($stok . ' a, list_logistik l');
            $this->db->where('a.id_logistik=l.id_logistik');
            $this->db->where('a.id_logistik', $id_logistik);
            $this->db->group_by('a.id_logistik');
            $this->db->order_by('stok');
        }
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
    public function getExpByObat($obat, $stok)
    {
        $this->db->select('sum(s.frek) stok, s.kadaluarsa,l.margin,l.harga_cost,l.id_logistik,l.nama');
        $this->db->from($stok . ' s, list_logistik l');
        $this->db->where(' s.id_logistik=l.id_logistik');
        $this->db->where(' s.id_logistik', $obat);
        $this->db->group_by('s.id_stok');
        $this->db->having('sum(s.frek)>0');
        return $this->db->get()->result_array();
    }
    public function getObatApotik()
    {
        $this->db->select('l.*');
        $this->db->from('list_logistik l');
        $this->db->where('l.status', 'AKTIF');
        $this->db->order_by('l.nama');
        return $this->db->get()->result_array();
    }
    public function getNamaObat($stok)
    {
        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost');
        $this->db->from($stok . ' sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        $this->db->where('l.status', 'AKTIF');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function getSumObat($obat, $stok)
    {
        $this->db->select('sum(frek) stok');
        $this->db->from($stok);
        $this->db->where(' id_logistik', $obat);
        return $this->db->get()->row_array();
    }
}
