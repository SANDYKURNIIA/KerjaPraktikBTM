<?php

class M_Rawatinap extends CI_Model
{

    public function selectDataPasienRanapby_id($id_pelayanan, $id_history) // RANAP
    {
        $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
        $this->db->from('v_apelkes');
        return $this->db->get()->result();
    }

    public function selectDataPasienRanap() //RANAP
    {
        // $this->db->where('status', '1');
        $this->db->from('v_perawat_ranap');
        return $this->db->get()->result();
    }
    public function selectDataPasienRanapById($id_pelayanan) //RANAP
    {
        // $this->db->where('status', '1');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->from('v_perawat_ranap');
        return $this->db->get()->result();
    }

    public function selectKamar() // Ranap
    {
        $this->db->select('DISTINCT(kelas_ruangan) nama');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('ruangan')->result();
    }

    public function selectDataKamarByIdPel($id_pelayanan) //Ranap
    {
        $this->db->select('*');
        $this->db->from('v_kamar_apelkes');

        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('ket', '0');
        $this->db->order_by('tanggal_masuk', 'desc');
        return $this->db->get()->result();
    }

    public function Total_Harga_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('v_tindakan_apelkes');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function selectDataTindakanByIdPel($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('v_tindakan_apelkes');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function update_history($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function update_kamar_sekarang($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function update_kamar_baru($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function update_riwayat_kamar($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function insert_kamar($page_data, $table) // Ranap
    {
        $this->db->insert($table, $page_data);
    }

    public function getMaxKamar($id_pelayanan) // Ranap
    {
        $this->db->select('MAX(tanggal_keluar) max');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('ket', '0');

        return $this->db->get('riwayat_kamar')->result();
    }

    public function getMaxId($id_pelayanan, $try) // Ranap
    {
        $this->db->select('id_riwayat, id_kamar');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('tanggal_keluar', $try);
        $this->db->where('ket', '0');
        return $this->db->get('riwayat_kamar')->result();
    }

    public function update_riwayat_kamar_prev($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function update_riwayat_kamar_now($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function getTempatTidur($spes) //Ranap
    {
        $this->db->select('DISTINCT(tipe), id_ruangan');
        $this->db->where('status', 'tersedia');
        $this->db->where('kelas_ruangan', $spes);
        return $this->db->get('ruangan')->result();
    }
    public function get_ai_tbl_riwayat()
    {
        return $this->db->query('select generate_id_riwayat() as id from dual')->row()->id;
    }
    public function selectResepById($id_pelayanan)
    {
        $this->db->select('r.*, p.cara_bayar');
        $this->db->from('resep_obat r, pelayanan p');
        $this->db->where('r.id_pelayanan = p.id_pelayanan');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function request_resep($where, $data)
    {
        $this->db->where('id_resep', $where);
        $this->db->update('resep_obat', $data);
    }
    public function selectObatByResep($id_resep)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('resep_obat r, tindakan_farmasi t, list_logistik l , staff s');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function selectRacikanByResep($id_resep)
    {
        $this->db->select('*');
        $this->db->from('resep_obat r, resep_racikan ra');
        $this->db->where('r.id_resep = ra.id_resep');
        $this->db->where('ra.id_resep', $id_resep);
        $this->db->order_by('ra.tanggal desc');

        return $this->db->get()->result();
    }
    public function getNamaObat()
    {
        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
        $this->db->from('stok_depo sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function getNamaObatByDepo($depo)
    {
        if ($depo == 'APOTIK') {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,sl.kadaluarsa,l.margin,l.harga_cost');
            $this->db->from('stok_apotik sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('nama');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,sl.kadaluarsa,l.margin,l.harga_cost');
            $this->db->from('stok_igd sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('nama');
            return $this->db->get()->result_array();
        }
    }
    public function getExpByObatApotik($obat)
    {
        $this->db->select('sum(s.frek) stok, s.kadaluarsa,l.margin,l.harga_cost,l.id_logistik,l.nama');
        $this->db->from('stok_apotik s, list_logistik l');
        $this->db->where(' s.id_logistik=l.id_logistik');
        $this->db->where(' s.id_logistik', $obat);
        $this->db->group_by('s.id_stok');
        $this->db->having('sum(s.frek)>0');
        return $this->db->get()->result_array();
    }
    public function getExpByObatIGD($obat)
    {
        $this->db->select('sum(s.frek) stok, s.kadaluarsa,l.margin,l.harga_cost,l.id_logistik,l.nama');
        $this->db->from('stok_igd s, list_logistik l');
        $this->db->where(' s.id_logistik=l.id_logistik');
        $this->db->where(' s.id_logistik', $obat);
        $this->db->group_by('s.id_stok');
        $this->db->having('sum(s.frek)>0');
        return $this->db->get()->result_array();
    }
    public function delete_resep($id_resep)
    {
        $this->db->delete('resep_obat', array('id_resep' => $id_resep));
    }
    public function delete_racikan($id_racikan)
    {
        $this->db->delete('resep_racikan', array('id_racikan' => $id_racikan));
    }
    public function delete_obat($id_tindakan, $depo)
    {
        $this->db->delete('tindakan_farmasi', array('id_tindakan_farmasi' => $id_tindakan));
        if ($depo == 'APOTIK') {
            $this->db->delete('stok_apotik', array('id_req' => $id_tindakan));
        } else {
            $this->db->delete('stok_igd', array('id_req' => $id_tindakan));
        }
    }
    public function getAntrian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select_max('no_antri');
        $this->db->from('antrian_farmasi');
        $this->db->like('tanggal', $tgl);
        return $this->db->get()->result();
    }
    public function insert_tindakan($page_data, $table)
    {
        $this->db->insert($table, $page_data);
    }

    //   Radiologi
    public function selectDataRadiologiById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p, staff s');
        $this->db->where('t.id_tindakan=l.id_daftar_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function insert_radiologi($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function Total_Radiologi_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_radiologi');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function selectDataFormById($id_pelayanan, $id_tindakan)
    {
        $this->db->select('t.*, l.nama');
        $this->db->from('tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p');
        $this->db->where('t.id_tindakan=l.id_daftar_tindakan');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->where('t.id_tindakan_radiologi', $id_tindakan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function delete_radiologi($id_tindakan_radiologi)
    {
        $this->db->delete('tindakan_radiologi', array('id_tindakan_radiologi' => $id_tindakan_radiologi));
    }

    public function selectNamaRadiologi()
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'AKTIF');
        $this->db->from('list_tindakan_radiologi');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    // End


    //  Labor


    public function selectDataLaborById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_labor t, list_tindakan_labor l, pelayanan p, staff s');
        $this->db->where('t.id_list_tindakan=l.id_daftar_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function Total_Labor_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_labor');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function delete_labor($id_tindakan_radiologi)
    {
        $this->db->delete('tindakan_labor', array('id_tindakan_labor' => $id_tindakan_radiologi));
    }

    public function insert_labor($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function selectNamaLabor()
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'AKTIF');
        $this->db->from('list_tindakan_labor');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    // End
    public function select($id_resep)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('resep_obat r, tindakan_farmasi t, list_logistik l , staff s');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function selectDataPasienIGD()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT v.*
        FROM v_erm_igd v, form_ass_dokter_igd d, form_ass_per_igd f
        where v.id_pelayanan = d.id_pelayanan and v.id_pelayanan = f.id_pelayanan 
         and v.tgl_masuk = '$tgl' and v.total_bayar=1
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
    public function selectDataPasienIGDRange($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT v.tgl_lahir, v.tgl_masuk, v.no_rm, v.id_pelayanan, v.id_history, v.nama, v.jenis_kelamin,v.jenis_pelayanan, v.cara_bayar 
        FROM v_erm_igd v, form_ass_dokter_igd d, form_ass_per_igd f
        where v.id_pelayanan = d.id_pelayanan and v.id_pelayanan = f.id_pelayanan 
        and v.tgl_masuk >= '$mulai' and v.tgl_masuk <= '$akhir' and  v.total_bayar=1
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
    // RIWAYAT ERM
    public function selectRiwayatIGD()
    {
        
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT v.*
        FROM v_erm_igd v where v.id_pelayanan in (Select id_pelayanan from history_pelayanan_ranap where status=1) 
        and v.tgl_masuk = '$tgl'
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
    public function selectRiwayatIGDRange($mulai, $akhir)
    {
        $query = $this->db->query("SELECT v.*
        FROM v_erm_igd v where v.id_pelayanan in (Select id_pelayanan from history_pelayanan_ranap where status=1) 
        and v.tgl_masuk >= '$mulai' and v.tgl_masuk <= '$akhir'
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
}