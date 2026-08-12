<?php

class M_Penerimaan_obat extends CI_Model
{
    public function insertFaktur($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // Model M_Penerimaan_obat
    public function insertObat($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function update($where, $data, $table)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }
    public function delete($id, $table, $where)
    {
        $this->db->delete($table, array($where => $id));
    }
    public function selectNoDokumen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m");
        $this->db->select('MAX(index_dok) max');
        $this->db->from('faktur_perencanaan_logfar');
        $this->db->like('tgl_input', $tgl);
        return $this->db->get()->result();
    }
    public function selectNoDokumenUsulan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m");
        $this->db->select('MAX(index_dok) max');
        $this->db->from('faktur_usulan_logfar');
        $this->db->like('tgl_input', $tgl);
        return $this->db->get()->result();
    }
    public function selectNoDokumenRetur()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m");
        $this->db->select('MAX(index_dok) max');
        $this->db->from('Penerimaan_obat p');
        $this->db->like('tgl_input', $tgl);
        return $this->db->get()->result();
    }
    public function selectNoDokumenAfkir()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m");
        $this->db->select('MAX(index_dok) max');
        $this->db->from('faktur_afkir_logfar');
        $this->db->like('tgl_input', $tgl);
        return $this->db->get()->result();
    }
    public function getpoObat()
    {
        $this->db->select('*');
        $this->db->from('faktur_usulan_logfar');
        $this->db->where('ket', 0);
        return $this->db->get()->result_array();
    }
    public function selectData()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        // $this->db->distinct();
        $this->db->select('r.* , v.no_dokumen no_usulan, v.id_faktur id_usulan');
        $this->db->from('faktur_perencanaan_logfar r, faktur_usulan_logfar v');
        $this->db->where('r.id_usulan=v.id_faktur');
        $this->db->where('r.ket !=', 2);
        $this->db->like('r.tgl_input', $tgl);
        $this->db->order_by('r.tgl_input desc');
        return $this->db->get()->result();
    }


    public function selectRangePo($mulai, $akhir)
    {
        // $this->db->distinct();
        $this->db->select('r.* , v.no_dokumen no_usulan, v.id_faktur id_usulan');
        $this->db->from('faktur_perencanaan_logfar r, faktur_usulan_logfar v');
        $this->db->where('r.id_usulan=v.id_faktur');
        $this->db->where('r.ket !=', 2);
        $this->db->where('r.tgl_input >=', $mulai);
        $this->db->where('r.tgl_input <=', $akhir);
        $this->db->order_by('r.tgl_input');
        return $this->db->get()->result();
    }



    public function selectDataObatById($id)
    {
        $this->db->where('id_logistik', $id);
        return $this->db->get('list_logistik')->result();
    }

    public function getDataFaktur($idFaktur)
    {
        $this->db->select('l.id_logistik,l.nama,l.produsen, f.harga, f.status, f.jumlah,f.total,f.frek, f.id_detail, f.status');
        $this->db->from('list_logistik l, detail_usulan_logfar f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('f.id_faktur', $idFaktur);
        $this->db->where('f.status', 0);
        $this->db->order_by('l.produsen');
        return $this->db->get()->result();
    }
    public function getDataFaktur1($idFaktur)
    {
        $this->db->select('l.nama,l.produsen,l.satuan_terbesar, f.harga, f.status, f.jumlah,f.total,f.frek, f.id_detail, f.status,f.id_detail_usulan');
        $this->db->from('list_logistik l, detail_perencanaan_logfar f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('f.id_faktur', $idFaktur);
        $this->db->order_by('l.produsen, l.nama asc');
        return $this->db->get()->result();
    }


    //  APPROVE
    public function selectDataApprove()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data_staff = $this->session->userdata('data_auth');
        $this->db->select('r.* , v.no_dokumen no_usulan, v.id_faktur id_usulan');
        $this->db->from('faktur_perencanaan_logfar r, faktur_usulan_logfar v');
        $this->db->where('r.id_usulan=v.id_faktur');
        if ($data_staff->tipe == "logistik farmasi" && $data_staff->izin_akses == "admin") {
            $this->db->where('r.status_kains', 'DIAJUKAN');
        }
        if ($data_staff->tipe == "direktur" && $data_staff->izin_akses == "admin") {
            $this->db->where('r.status_kains', 'DITERIMA');
            $this->db->where('r.status_direktur', 'DIAJUKAN');
        }
        $this->db->order_by('tgl_input desc');
        return $this->db->get()->result();
    }






    //USULAN PERENCANAAN
    public function selectDataUsulan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->distinct();
        $this->db->select('r.*');
        $this->db->from('faktur_usulan_logfar r');
        $this->db->where('ket !=', 2);
        $this->db->like('r.tgl_input', $tgl);
        $this->db->order_by('tgl_input desc');
        return $this->db->get()->result();
    }
    public function selectRangeUsulan($mulai, $akhir)
    {
        $this->db->distinct();
        $this->db->select('f.* ');
        $this->db->from('faktur_usulan_logfar f');
        $this->db->where('f.tgl_input >=', $mulai);
        $this->db->where('f.tgl_input <=', $akhir);
        $this->db->where('ket !=', 2);
        $this->db->order_by('f.tgl_input');
        return $this->db->get()->result();
    }
    public function getListUsulan($idFaktur)
    {
        $this->db->select('l.id_logistik,l.nama,l.produsen,l.satuan_terbesar, f.harga, f.status, f.jumlah,f.total,f.frek, f.id_detail, f.status');
        $this->db->from('list_logistik l, detail_usulan_logfar f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('f.id_faktur', $idFaktur);
        $this->db->order_by('l.produsen, l.nama asc');
        return $this->db->get()->result();
    }
    // public function selectObat()
    // {
    //     $this->db->select('l.*, (-1*(a.penggunaan + b.penggunaan + c.penggunaan)) penggunaan, (a.stok_tersedia + b.stok_tersedia + c.stok_tersedia) stok_tersedia');
    //     $this->db->from('list_logistik l, pr_apotik a, pr_igd b, pr_depo c');
    //     $this->db->where('l.id_logistik = a.id_logistik and l.id_logistik = b.id_logistik and l.id_logistik = c.id_logistik');
    //     //$this->db->group_by('l.id_logistik');
    //     $this->db->having('penggunaan >0');
    //     $this->db->order_by('penggunaan desc');
    //     return $this->db->get()->result();
    // }
    public function selectObat($first_date, $second_date)
    {
        $tgl = date("Y-m-d");

        // $this->db->select('l.*, sum(s.frek) stok_tersedia');
        $this->db->select('l.*, s.saldo stok_tersedia');
        $this->db->from('list_logistik l, stok_logistik s');
        $this->db->where('l.id_logistik = s.id_logistik');
        $this->db->where('l.status', 'AKTIF');
        if ($first_date != '' || $second_date != '') {
            $this->db->where('s.tgl >=', $first_date);
            $this->db->where('s.tgl <=', $second_date);
        } else {
            $this->db->like('s.tgl', $tgl);
        }
        $this->db->group_by('l.id_logistik');

        $this->db->order_by('stok_tersedia asc');
        return $this->db->get()->result();
    }

    //RETUR OBAT
    public function selectObatRetur()
    {
        $this->db->select('l.*, sum(s.frek) stok_tersedia');
        $this->db->from('list_logistik l, stok_logistik s');
        $this->db->where('l.id_logistik = s.id_logistik');
        $this->db->group_by('l.id_logistik');

        $this->db->order_by('stok_tersedia asc');
        return $this->db->get()->result();
    }
    public function selectDataRetur()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->distinct();
        $this->db->select('p.*');
        $this->db->from('Penerimaan_obat p');
        $this->db->like('p.tgl_input', $tgl);
        $this->db->order_by('p.tgl_input desc');
        return $this->db->get()->result();
    }
    public function selectRangeRetur($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->distinct();
        $this->db->select('p.* ');
        $this->db->from('Penerimaan_obat p');
        $this->db->where('p.tgl_input >=', $mulai);
        $this->db->where('p.tgl_input <=', $akhir);
        $this->db->order_by('p.tgl_input');
        return $this->db->get()->result();
    }
    public function getListRetur($idPenerimaanObat)
    {
        $this->db->select('l.nama, l.produsen,l.satuan_terkecil, l.satuan_terbesar, p.*');
        $this->db->from('list_logistik l, detail_pengeluaran_obat p');
        $this->db->where('p.id_list=l.id_logistik');
        $this->db->where('p.id_faktur', $idPenerimaanObat);
        return $this->db->get()->result();
    }

    public function getPengeluaranObat($idPenerimaanObat){
        $this->db->select('*');
        $this->db->from('detail_pengeluaran_obat');
        $this->db->where('id_faktur',$idPenerimaanObat);
        return $this->db->get()->result();
    }
    
    public function getRetur($idFaktur)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->select('p.*');
        $this->db->from('Penerimaan_obat p');
        $this->db->where('p.id_faktur', $idFaktur);
        $this->db->order_by('p.tgl_input desc');
        return $this->db->get()->row();
    }
    public function selectLaporanRetur($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        //$date = new DateTime('+1 day');

        $this->db->select('l.*,s.frek jml_terima, s.tgl tgl_res, s.keterangan ket,f.no_dokumen,f.unit');
        $this->db->from('stok_logistik s, list_logistik l,detail_retur_obat d,Penerimaan_obat p');
        $this->db->where('s.id_logistik=l.id_logistik');
        $this->db->where('s.id_struk=d.id_detail');
        $this->db->where('d.id_faktur=f.id_faktur');
        $this->db->where('s.keterangan', 'RETUR');
        $this->db->where('l.status', 'AKTIF');
        if ($mulai != '' && $akhir != '') {
            $this->db->where('s.tgl >=', $mulai);
            $this->db->where('s.tgl <=', $akhir);
        } else {
            $this->db->like('s.tgl', $tgl);
        }
        $this->db->order_by('nama asc');
        return $this->db->get()->result();
    }
    ///AFKIR
    public function selectObatAfkir()
    {
        $tgl = date("Y-m-d");
        $data_staff = $this->session->userdata('data_auth');
        //$date = new DateTime('+1 day');
        if ($data_staff->tipe == "deporanap") {
            $id_struk = "id_req";
            $stok = "stok_depo";
        } else if ($data_staff->tipe == "apotik") {
            $id_struk = "id_req";
            $stok = "stok_apotik";
        } else if ($data_staff->tipe == "logistik farmasi") {
            $id_struk = "id_struk";
            $stok = "stok_logistik";
        }
        $this->db->select('l.*, sum(s.frek) stok_tersedia,s.kadaluarsa');
        $this->db->from($stok . ' s, list_logistik l');
        $this->db->where('l.id_logistik = s.id_logistik');
        $this->db->group_by('l.id_logistik');
        $this->db->having("stok_tersedia > 0");

        $this->db->order_by('stok_tersedia asc');
        return $this->db->get()->result();
    }
    public function selectDataAfkir($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $staff = $this->session->userdata('data_auth');

        $this->db->distinct();
        $this->db->select('r.*');
        $this->db->from('faktur_afkir_logfar r');
        if ($mulai != '' && $akhir != '') {
            $this->db->where('r.tgl_input >=', $mulai);
            $this->db->where('r.tgl_input <=', $akhir);
        } else {
            $this->db->like('r.tgl_input', $tgl);
        }
        $this->db->where('r.jenis', $staff->tipe);
        $this->db->order_by('tgl_input desc');
        return $this->db->get()->result();
    }

    public function getListAfkir($idFaktur)
    {
        $this->db->select('l.nama, l.produsen,l.satuan_terkecil, l.satuan_terbesar, f.*');
        $this->db->from('list_logistik l, detail_afkir_logfar f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('f.id_faktur', $idFaktur);
        return $this->db->get()->result();
    }
    public function getAfkir($idFaktur)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->select('r.*');
        $this->db->from('faktur_afkir_logfar r');
        $this->db->where('r.id_faktur', $idFaktur);
        $this->db->order_by('tgl_input desc');
        return $this->db->get()->row();
    }
    public function getAfkirByIdDetail($idFaktur)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->select('r.*');
        $this->db->from('faktur_afkir_logfar r,detail_afkir_logfar f');
        $this->db->where('r.id_faktur=f.id_faktur');
        $this->db->where('f.id_detail', $idFaktur);
        $this->db->order_by('tgl_input desc');
        return $this->db->get()->row();
    }
    
    public function selectLaporanAfkir($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $staff = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d");
        //$date = new DateTime('+1 day');

        $this->db->select('l.*,s.frek jml_terima, s.tgl tgl_res, s.keterangan ket,f.no_dokumen,f.unit');
        $this->db->from('stok_logistik s, list_logistik l,detail_afkir_logfar d,faktur_afkir_logfar f');
        $this->db->where('s.id_logistik=l.id_logistik');
        $this->db->where('s.id_struk=d.id_detail');
        $this->db->where('d.id_faktur=f.id_faktur');
        $this->db->where('s.keterangan', 'AFKIR');
        $this->db->where('l.status', 'AKTIF');
        if ($mulai != '' && $akhir != '') {
            $this->db->where('s.tgl >=', $mulai);
            $this->db->where('s.tgl <=', $akhir);
        } else {
            $this->db->like('s.tgl', $tgl);
        }
        $this->db->where('f.jenis', $staff->tipe);
        $this->db->order_by('nama asc');
        return $this->db->get()->result();
    }
}
