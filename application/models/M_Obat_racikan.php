<?php

class M_Obat_racikan extends CI_Model
{
    public function getNamaRacikan()
    {
        $this->db->like('nama', 'racikan', 'both');
        return $this->db->get('list_logistik')->result_array();
    }
    public function getNamaObat()
    {
         $data_staff = $this->session->userdata('data_auth');
        if ($data_staff->tipe == "apotik") {
            $stok = "stok_apotik";
        } else if ($data_staff->tipe == "deporanap") {
            $stok = "stok_depo";
        } else if ($data_staff->tipe == "logistik farmasi") {
            $stok = "stok_logistik";
        }

        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
        $this->db->from($stok . ' sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        //$this->db->like('l.nama', 'racikan', 'both');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function getNamaObatUnit($stok)
    {
        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.*');
        $this->db->from($stok . ' sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        $this->db->like('l.nama', 'racikan', 'both');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result();
    }
    public function selectDataJoin($id)
    {
        $query = $this->db->query(" SELECT * FROM 
       (SELECT  l.nama,l.harga_cost,(l.harga_cost * (s.frek*-1))harga, s.*
       FROM stok_apotik s, list_logistik l
       where s.id_logistik = l.id_logistik and  s.id_req ='$id'
       UNION ALL
       SELECT  l.nama,l.harga_cost,(l.harga_cost * s.frek*-1)harga, s.*
       FROM stok_depo s, list_logistik l
       where s.id_logistik = l.id_logistik and  s.id_req ='$id'
        UNION ALL
       SELECT  l.nama,l.harga_cost,(l.harga_cost * s.frek*-1)harga, s.*, '-' id_resep
       FROM stok_logistik s, list_logistik l
       where s.id_logistik = l.id_logistik and  s.id_struk ='$id'
       )
       as gabung
       ");
        return $query->result();
    }
    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function delete_tindakan($id, $table, $where)
    {
        $this->db->delete($table, array($where => $id));
    }
    public function update($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }
}
