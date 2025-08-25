<?php

class M_Logistik_farmasi extends CI_Model
{
    public function getUnitPenarikan()
    {
        $data_staff = $this->session->userdata('data_auth');
        // if ($data_staff->tipe == "logistik farmasi") {
        //     $query = $this->db->query("SELECT * FROM admin_logistik_farmasi
        //     where unit = 'apotik' or unit = 'deporanap'");
        // }else{
        $query = $this->db->query("SELECT * FROM admin_logistik_farmasi
            where nama !=''
            order by nama asc");
        // }
        return $query->result_array();
    }
    // Laporan Mutasi
    public function selectLaporanmutasiFarmasi()
    {
        date_default_timezone_set('Asia/Jakarta');
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
        } else {
            $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $data_staff->tipe])->row();
            $id_struk = "id_req";
            $stok = $data_adm->stok;
        }

        $this->db->select('l.*,s.asal_tujuan tipe,s.frek jml_terima, s.tgl tgl_res, s.keterangan ket, s.' . $id_struk . ' id_struk, s.kadaluarsa');
        $this->db->from($stok . ' s, list_logistik l');
        $this->db->where('s.id_logistik=l.id_logistik');
        $this->db->where_not_in('s.asal_tujuan', 'BASE');
        $this->db->where('l.status', 'AKTIF');
        $this->db->like('s.tgl', $tgl);
        $this->db->order_by('nama asc');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanmutasiFarmasi($mulai, $akhir)
    {
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
        } else {
            $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $data_staff->tipe])->row();
            $id_struk = "id_req";
            $stok = $data_adm->stok;
        }

        $this->db->select('l1.*,s1.asal_tujuan tipe,s1.frek jml_terima, s1.tgl tgl_res, s1.keterangan ket, s1.' . $id_struk . ' id_struk, s1.kadaluarsa');
        $this->db->from($stok . ' s1, list_logistik l1');
        $this->db->where('s1.id_logistik=l1.id_logistik');
        $this->db->where_not_in('s1.asal_tujuan', 'BASE');
        $this->db->where('s1.tgl >=', $mulai);
        $this->db->where('s1.tgl <=', $akhir);
        $this->db->where('l1.status', 'AKTIF');
        $this->db->order_by('nama asc');
        return $this->db->get()->result();
    }
    // End

    // Laporan stok
    public function selectStok($stok)
    {
        $this->db->select('l.*, sum(a.frek) stok');
        $this->db->from($stok . ' a,list_logistik l');
        $this->db->where('a.id_logistik=l.id_logistik');
        $this->db->where('l.status', 'AKTIF');
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('nama');

        return $this->db->get()->result();
    }
    public function selectLaporanStok($awal, $akhir, $id_log)
    {
        date_default_timezone_set('Asia/Jakarta');
        // $date = strtotime($bulan);
        // $vbulan = date("m", $date); //format bulan 
        // $vtahun = date('Y', $date); //format tahun 
        $data_staff = $this->session->userdata('data_auth');
        //$date = new DateTime('+1 day');
        if ($data_staff->tipe == "deporanap") {
            $id_struk = "id_req";
            $stok = "stok_depo";
        } else if ($data_staff->tipe == "apotik") {
            $id_struk = "id_req";
            $stok = "stok_apotik";
        } else if ($data_staff->tipe == "logistik farmasi") {
            $stok = "stok_logistik";
            $id_struk = "id_struk";
        }
        // $this->db->select('l.*,t.nama staff,s.asal_tujuan tipe,s.frek jml_terima,s.saldo, s.tgl tgl_res, s.keterangan ket, s.' . $id_struk . ' id_struk');
        // $this->db->from($stok . ' s, list_logistik l,staff t');
        // $this->db->where('s.id_logistik=l.id_logistik');
        // $this->db->where('s.id_staff=t.id_staff');
        // $this->db->where('l.id_logistik', $id_log);
        // $this->db->where('s.tgl >=', $awal);
        // $this->db->where('s.tgl <=', $akhir);
        // $this->db->where('l.status', 'AKTIF');
        // $this->db->order_by('tgl_res');
        // return $this->db->get()->result();

        return $this->db->query("SELECT x.tgl tgl_res,(sum(s.frek)- x.masuk + x.keluar)awal,x.masuk,x.keluar,sum(s.frek) saldo,x.asal_tujuan tipe,x.keterangan ket,t.nama staff,l.*,x.id_struk
        FROM (
            SELECT tgl, sum(if(frek>0,frek,0)) as masuk,
                sum(if(frek<0,frek*-1,0)) as keluar, 
                id_logistik,keterangan, asal_tujuan, id_staff, `$id_struk` as id_struk
                FROM `$stok`
                group by tgl,id_logistik
                )x
                
                left join (
            SELECT frek,tgl,id_logistik FROM `$stok`    
                
            )as s on x.id_logistik = s.id_logistik
            
            join (
            SELECT * FROM list_logistik  
                
            )as l on x.id_logistik = l.id_logistik
            join (
            SELECT nama,id_staff FROM staff    
                
            )as t on x.id_staff = t.id_staff

                where s.tgl <= x.tgl and x.id_logistik = $id_log and date(x.tgl) BETWEEN '$awal' and '$akhir'
                group by x.tgl  
        ORDER BY `x`.`tgl`  ASC
                ")->result();
    }


    public function getNoFaktur($id)
    {
        $query = $this->db->query("SELECT id_struk no_faktur from detail_struk where id_detail_struk = '$id'
        union all
        SELECT s.no_faktur
        from struk_logistik_bebas s, detail_struk_bebas d
        where s.id_struk = d.id_struk and d.id_detail_struk = '$id'");
        return $query->row_array();
    }

    public function getPasienByReq($id)
    {
        $data_staff = $this->session->userdata('data_auth');
        if ($data_staff->tipe == "apotik") {
            $query = $this->db->query("SELECT o.nama, concat(' (',o.dpjp,')') dokter from obat_bebas o, tindakan_farmasi t where o.id_obat_bebas = t.id_pelayanan and t.id_tindakan_farmasi = '$id'
            union all
            SELECT p.nama, concat(' (',d.nama,')')dokter from pelayanan b, pasien p, tindakan_farmasi t, history_pelayanan h, dokter d
            where p.no_rm = b.id_pasien and b.id_pelayanan = t.id_pelayanan and t.poli = h.id_history and h.dpjp = d.id_dokter 
            and t.id_tindakan_farmasi = '$id'
            ");
        } else {
            $query = $this->db->query("SELECT o.nama, concat(' (',o.dpjp,')') dokter from obat_bebas o, tindakan_farmasi t where o.id_obat_bebas = t.id_pelayanan and t.id_tindakan_farmasi = '$id'
            union all
            SELECT p.nama,'' as dokter from pelayanan b, pasien p, tindakan_farmasi t where p.no_rm = b.id_pasien and b.id_pelayanan = t.id_pelayanan and t.id_tindakan_farmasi = '$id'
            ");
        }


        return $query;
    }
    public function getNoPSN($id)
    {
        $query = $this->db->query("SELECT s.indeks
        from request_obat s, detail_request d
        where s.id_req = d.id_form and d.id_req = '$id'");
        return $query;
    }
    // End


    //GET DATA OBAT
    public function getDataObat($id_tindakan)
    {
        $this->db->select('t.*,l.nama, s.tindakan');
        $this->db->from('tindakan_farmasi t, list_logistik l, signa_obat s');
        $this->db->where(' t.id_list_tindakan=l.id_logistik');
        $this->db->where(' t.id_signa=s.id_signa');
        $this->db->where('id_tindakan_farmasi', $id_tindakan);
        return $this->db->get()->result();
    }

    //GET NAMA OBAT
    public function getNamaObat()
    {
        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
        $this->db->from('stok_apotik sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }


    //Pengeluaran obat
    public function selectPengeluaranObat()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.*,sum(s.frek) stok, a.nama asal_tujuan');
        $this->db->from('stok_logistik s, list_logistik l, admin_logistik_farmasi a');
        $this->db->where('s.id_logistik=l.id_logistik');
        $this->db->where('s.asal_tujuan=a.unit');
        $this->db->where('s.keterangan', 'MUTASI');
        $this->db->like('s.tgl', $tgl);
        // $this->db->group_by('s.id_logistik, s.asal_tujuan');
        $this->db->group_by('s.id_logistik');
        $this->db->order_by('nama');
        return $this->db->get()->result();
    }

    public function selectRangePengeluaranObat($mulai, $akhir)
    {
        $this->db->select('l.*,sum(s.frek) stok, a.nama asal_tujuan');
        $this->db->from('stok_logistik s, list_logistik l, admin_logistik_farmasi a');
        $this->db->where('s.id_logistik=l.id_logistik');
        $this->db->where('s.asal_tujuan=a.unit');
        $this->db->where('s.keterangan', 'MUTASI');
        $this->db->where('s.tgl >=', $mulai);
        $this->db->where('s.tgl <=', $akhir);
        // $this->db->group_by('s.id_logistik, s.asal_tujuan');
        $this->db->group_by('s.id_logistik');
        $this->db->order_by('nama');
        return $this->db->get()->result();
    }
    // End

    //Laporan Pembelian
    public function selectLaporanPembelian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('s.no_faktur,l.kode,l.standar,d.id_prod_obat,l.nama,d.no_batch,l.satuan_terkecil tipe,l.golongan_obat, s.id_produsen nama_produsen,  d.frek, d.harga,d.total,d.tgl_input, d.harga_beli, d.ppn, d.diskon_rs, d.diskon,l.id_logistik,s.index_dok,s.tgl_buat, f.no_dokumen,f.tgl_faktur tgl_po,d.kadaluarsa ');
        $this->db->from('struk_logistik s , detail_struk d , list_logistik l, faktur_logistik_farmasi f, detail_po dp');
        $this->db->where('s.no_faktur=d.id_struk');
        $this->db->where('d.id_logistik=l.id_logistik');
        // $this->db->where('s.id_produsen=p.nama_produsen');
        // $this->db->where('f.id_vendor=p.nama_produsen');
        $this->db->where('s.id_faktur=f.id_faktur');
        $this->db->where('dp.id_faktur=f.id_faktur');
        $this->db->where('dp.id_list=l.id_logistik');
        //$this->db->where('s.ket',0);
        $this->db->like('s.tgl_buat', $tgl);
        $this->db->group_by('d.id_detail_struk ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPembelian($mulai, $akhir)
    {
        $this->db->select('s.no_faktur,l.kode,l.standar,d.id_prod_obat,l.nama,d.no_batch,l.satuan_terkecil tipe,l.golongan_obat, s.id_produsen nama_produsen,  d.frek, d.harga,d.total,d.tgl_input, d.harga_beli, d.ppn, d.diskon_rs, d.diskon,l.id_logistik,s.index_dok,s.tgl_buat, f.no_dokumen, f.tgl_faktur tgl_po,d.kadaluarsa');
        $this->db->from('struk_logistik s , detail_struk d , list_logistik l , faktur_logistik_farmasi f, detail_po dp');
        $this->db->where('s.no_faktur=d.id_struk');
        $this->db->where('d.id_logistik=l.id_logistik');
        // $this->db->where('s.id_produsen=p.nama_produsen');
        // $this->db->where('f.id_vendor=p.nama_produsen');
        $this->db->where('s.ket', 0);
        $this->db->where('s.id_faktur=f.id_faktur');
        $this->db->where('dp.id_faktur=f.id_faktur');
        $this->db->where('dp.id_list=l.id_logistik');
        $this->db->where('s.tgl_buat >=', $mulai);
        $this->db->where('s.tgl_buat <=', $akhir);
        $this->db->group_by('d.id_detail_struk ');
        // $this->db->order_by('s.no_faktur');
        return $this->db->get()->result();
    }
    // End

    //Laporan Pembelian Pebal
    public function selectLaporanPembelianPebal($tipe)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('s.no_faktur,l.kode,l.standar,d.id_prod_obat nama_produsen,s.id_produsen, l.zat_aktif,l.nama,d.no_batch,l.satuan_terkecil tipe,l.golongan_obat, s.id_produsen nama_produsen, d.frek, d.harga,d.total,d.tgl_input, d.harga_beli, d.ppn, d.diskon_rs, d.diskon,l.id_logistik ');
        $this->db->from('struk_logistik_bebas s , detail_struk_bebas d , list_logistik l ');
        $this->db->where('s.id_struk=d.id_struk');
        $this->db->where('d.id_logistik=l.id_logistik');
        $this->db->where('s.ket', $tipe);
        $this->db->like('d.tgl_input', $tgl);
        $this->db->group_by('d.id_detail_struk');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPembelianPebal($mulai, $akhir, $tipe)
    {

        $this->db->select('s.no_faktur,l.kode,l.standar,d.id_prod_obat nama_produsen,s.id_produsen,l.nama, l.zat_aktif,d.no_batch,l.satuan_terkecil tipe,l.golongan_obat, s.id_produsen, d.frek, d.harga,d.total,d.tgl_input, d.harga_beli, d.ppn, d.diskon_rs, d.diskon,l.id_logistik ');
        $this->db->from('struk_logistik_bebas s , detail_struk_bebas d , list_logistik l ');
        $this->db->where('s.id_struk=d.id_struk');
        $this->db->where('d.id_logistik=l.id_logistik');
        // $this->db->where('s.ket', 'PEBAL');
        $this->db->where('s.ket', $tipe);
        $this->db->where('d.tgl_input >=', $mulai);
        $this->db->where('d.tgl_input <=', $akhir);
        $this->db->group_by('d.id_detail_struk');
        // $this->db->order_by('s.no_faktur');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPembelianHibah($mulai, $akhir)
    {

        $this->db->select('s.no_faktur,l.kode,l.standar,d.id_prod_obat nama_produsen,s.id_produsen,l.nama, l.zat_aktif,d.no_batch,l.satuan_terkecil tipe,l.golongan_obat, s.id_produsen, d.frek, d.harga,d.total,d.tgl_input,s.tgl_masuk, d.harga_beli, d.ppn, d.diskon_rs, d.diskon,l.id_logistik ');
        $this->db->from('struk_obat_hibah s , detail_struk_obat_hibah d , list_logistik l ');
        $this->db->where('s.id_struk=d.id_struk');
        $this->db->where('d.id_logistik=l.id_logistik');
        // $this->db->where('s.ket', 'PEBAL');
        $this->db->where('date(s.tgl_masuk) >=', $mulai);
        $this->db->where('date(s.tgl_masuk) <=', $akhir);
        $this->db->group_by('d.id_detail_struk');
        // $this->db->order_by('s.no_faktur');
        return $this->db->get()->result();
    }
    // End

    //Laporan Pembelian Obat Kundur
    public function selectLaporanPoKundur()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('*');
        $this->db->from('request_obat r, staff s');
        $this->db->where('s.id_staff=r.id_staff');
        $this->db->where('s.tipe', 'Klinik Pratama Kundur');
        $this->db->order_by('tanggal desc');
        return $this->db->get()->result();
    }

    public function selectTindakanById($id_req)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama,l.harga_cost,l.satuan_terkecil tipe, dr.*');
        $this->db->from('detail_request dr , request_obat r, list_logistik l');
        $this->db->where('dr.id_form=r.id_req');
        $this->db->where('dr.id_logistik=l.id_logistik');
        $this->db->where('dr.id_form', $id_req);
        $this->db->where('dr.status', 'DITERIMA');
        return $this->db->get()->result();
    }
    public function getTotal($id_req)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.harga_cost, dr.jml_terima');
        $this->db->from('detail_request dr , request_obat r, list_logistik l');
        $this->db->where('dr.id_form=r.id_req');
        $this->db->where('dr.id_logistik=l.id_logistik');
        $this->db->where('dr.id_form', $id_req);
        return $this->db->get()->result();
    }
    public function selectCetakSo()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.id_logistik,l.nama , sum(s.frek) stok,l.harga_cost, l.ppn, l.satuan_terkecil tipe, l.produsen,l.golongan_obat,l.standar');
        $this->db->from('list_logistik l');
        $this->db->join('stok_logistik s', 's.id_logistik=l.id_logistik', 'left');

        $this->db->where('s.tgl<= NOW()');
        $this->db->where('l.status', 'AKTIF');
        $this->db->group_by('l.id_logistik ');
        $this->db->order_by('l.nama asc');
        return $this->db->get()->result();
    }

    //Lapora Aktif

    //Cetak So Apotik
    public function selectCetakSoApotik()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama , sum(s.frek) stok, l.satuan_terkecil tipe, l.produsen');
        $this->db->from('list_logistik l');
        $this->db->join('stok_apotik s', 's.id_logistik=l.id_logistik', 'left');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->group_by('l.id_logistik ');
        $this->db->order_by('l.nama asc');
        return $this->db->get()->result();
    }


    //end Cetak So Apotik
    public function getDataFaktur21($idFaktur)
    {
        $this->db->select('l.nama, f.harga, f.status, f.jumlah,f.diskon,f.ppn,f.total, f.id_detail, f.status');
        $this->db->from('list_logistik l, detail_po f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('f.status', 1);
        return $this->db->get()->result();
    }


    //end 


    public function selectRiwayatPermintaanObat()
    {
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'IND');
        //$date = new DateTime('+1 day');
        $tgl = date("Y-m-d");
        $this->db->select('r.*,s.tipe,s.nama ');
        $this->db->from('request_obat r, staff s');
        $this->db->where('s.id_staff=r.id_staff');
        $this->db->where('r.tipe', 'depo');
        $this->db->like('r.tanggal', $tgl);
        $this->db->where('r.status', 'diajukan');
        $this->db->order_by('r.tanggal desc');
        return $this->db->get()->result();
    }
    //Unit
    public function selectRiwayatPermintaanObatFarmasi($tipe)
    {
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT r.*,s.tipe tipe_staff,s.nama,s.ruangan 
        from request_obat r, staff s
         where s.id_staff=r.id_staff
         and r.tipe ='$tipe'
         and r.status ='diajukan'
         and r.tanggal like '%$tgl%'");
        // $this->db->select('r.*,s.tipe tipe_staff,s.nama ');
        // $this->db->from('request_obat r, staff s');
        // $this->db->where('s.id_staff=r.id_staff');
        // $this->db->where('r.tipe', $tipe);
        // $this->db->like('r.tanggal',$tgl);
        // $this->db->where('r.status','diajukan');
        // $this->db->order_by('r.tanggal desc');
        return $query->result();
    }
    public function selectRangeRiwayatPermintaanObatFarmasi($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'IND');
        $data_staff = $this->session->userdata('data_auth');
        //$date = new DateTime('+1 day');
        if ($data_staff->tipe == "deporanap") {
            $tipe = "depo ranap";
        } else {
            $tipe = "unit";
        }
        $this->db->select('r.*,s.tipe tipe_staff,s.nama,s.ruangan ');
        $this->db->from('request_obat r, staff s');
        $this->db->where('s.id_staff=r.id_staff');
        $this->db->where('r.tipe', $tipe);
        $this->db->where('r.tanggal >=', $mulai);
        $this->db->where('r.tanggal <=', $akhir);
        $this->db->where('r.status', 'diajukan');
        $this->db->order_by('r.tanggal desc');
        return $this->db->get()->result();
    }
    public function countRiwayatPermintaan($id)
    {
        $this->db->select('*');
        $this->db->from(' detail_request');
        $this->db->where('id_form', $id);
        $this->db->where('status', 'DIAJUKAN');
        return $this->db->get()->num_rows();
    }

    public function selectRangeRiwayatPermintaanObat($mulai, $akhir)
    {
        $this->db->select('r.*,s.tipe,s.nama ');
        $this->db->from('request_obat r, staff s');
        $this->db->where('s.id_staff=r.id_staff');
        $this->db->where('r.tipe', 'depo');
        $this->db->where('r.tanggal >=', $mulai);
        $this->db->where('r.tanggal <=', $akhir);
        $this->db->where('r.status', 'diajukan');
        $this->db->order_by('r.tanggal desc');
        return $this->db->get()->result();
    }
    public function getListRiwayatPermintaanObat($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.*, dr.*, s1.tipe, s1.id_staff, ');
        $this->db->from('detail_request dr , request_obat r, list_logistik l, staff s, staff s1');
        $this->db->where('dr.id_form=r.id_req ');
        $this->db->where('dr.id_logistik=l.id_logistik ');
        $this->db->where('s.id_staff=dr.id_staff ');
        $this->db->where('s1.id_staff=r.id_staff ');
        $this->db->like('dr.id_form', $id);
        $this->db->order_by('l.nama asc');
        // $this->db->order_by('dr.status asc');
        return $this->db->get()->result();
    }
    // public function getListRiwayatPermintaanObat_cetak($id)
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $tgl = date("Y-m-d");
    //     $this->db->select('l.*, dr.*, s1.tipe, s1.id_staff, ');
    //     $this->db->from('detail_request dr , request_obat r, list_logistik l, staff s, staff s1');
    //     $this->db->where('dr.id_form=r.id_req ');
    //     $this->db->where('dr.id_logistik=l.id_logistik ');
    //     $this->db->where('s.id_staff=dr.id_staff ');
    //     $this->db->where('s1.id_staff=r.id_staff ');
    //     $this->db->like('dr.id_form', $id);
    //     $this->db->order_by('l.nama asc');
    //     return $this->db->get()->result();
    // }

    public function getUnitRiwayatPermintaanObat($id)
    {
        $this->db->select('r.*,s.tipe,s.nama ');
        $this->db->from('request_obat r, staff s');
        $this->db->where('s.id_staff=r.id_staff');
        //$this->db->where('r.tipe', 'depo');
        $this->db->where('r.id_req', $id);

        return $this->db->get()->row_array();
    }
    public function getStokByRiwayatPermintaan($id_log)
    {
        $this->db->select('SUM(s.frek) stok, l.nama  jumlah');
        $this->db->from('stok_logistik s, list_logistik l');
        $this->db->where('s.id_logistik', $id_log);
        $this->db->where('s.id_logistik=l.id_logistik');
        return $this->db->get()->row();
    }
    //stok farmasi
    public function getStokByRiwayatPermintaanFarmasi($id_log)
    {
        $data_staff = $this->session->userdata('data_auth');
        //$date = new DateTime('+1 day');
        if ($data_staff->tipe == "deporanap") {
            $stok = "stok_depo";
        } else {
            $stok = "stok_apotik";
        }
        $this->db->select('SUM(s.frek) stok, l.nama  jumlah,max(s.kadaluarsa) kadaluarsa');
        $this->db->from($stok . ' s, list_logistik l');
        $this->db->where('s.id_logistik', $id_log);
        $this->db->where('s.id_logistik=l.id_logistik');
        return $this->db->get()->row();
    }
    public function getExpByObat($obat, $stok)
    {
        $this->db->select('max(s.kadaluarsa) kadaluarsa');
        $this->db->from($stok . ' s');
        $this->db->where(' id_logistik', $obat);
        return $this->db->get()->row_array();
    }

    //RIWAYAT PENARIKAN
    public function selectRiwayatPenarikanObat()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $data_staff = $this->session->userdata('data_auth');
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $data_staff->tipe])->row();

        $this->db->select('l.nama, s.tgl,s.asal_tujuan,s.kadaluarsa,s.frek,ss.nama staff,s.id_stok ');
        $this->db->from($data_adm->stok . ' s, list_logistik l, staff ss');
        $this->db->where('s.id_logistik=l.id_logistik');
        $this->db->where('ss.id_staff=s.id_staff');
        $this->db->where('s.keterangan', 'STOK DARI PENARIKAN');
        if ($data_staff->tipe == "logistik farmasi") {
            $this->db->where("s.id_struk not in(select id_struk from `" . $data_adm->stok . "` where keterangan ='BATAL PENARIKAN' )");
        } else {
            $this->db->where("s.id_req not in(select id_req from `" . $data_adm->stok . "` where keterangan ='BATAL PENARIKAN' )");
        }
        $this->db->like('s.tgl ', $tgl);
        $this->db->order_by('s.tgl desc');
        return $this->db->get()->result();
    }

    public function selectRangeRiwayatPenarikanObat($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $data_staff = $this->session->userdata('data_auth');
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $data_staff->tipe])->row();

        $this->db->select('l.nama, s.tgl,s.asal_tujuan,s.kadaluarsa,s.frek,ss.nama staff,s.id_stok ');
        $this->db->from($data_adm->stok . ' s, list_logistik l, staff ss');
        $this->db->where('s.id_logistik=l.id_logistik');
        $this->db->where('ss.id_staff=s.id_staff');
        $this->db->where('s.keterangan', 'STOK DARI PENARIKAN');
        $this->db->where('s.tgl >=', $mulai);
        $this->db->where('s.tgl <=', $akhir);
        $this->db->order_by('s.tgl desc');
        return $this->db->get()->result();
    }

    // End
    public function insertStok($data, $table)
    {
        return $this->db->insert($table, $data);
    }
    public function update_detail_request($id, $data)
    {
        $this->db->where('id_req', $id);
        return $this->db->update('detail_request', $data);
    }
    public function update_request($data, $id_form, $table)
    {
        $query = $this->db->query("SELECT dr.id_form, r.* FROM detail_request dr, request_obat r WHERE dr.id_form = '$id_form' AND dr.id_form = r.id_req AND dr.status = 'DIAJUKAN'");
        if ($query->num_rows() == 0) {
            $this->db->where('id_req', $id_form);
            return $this->db->update($table, $data);
        }
    }

    public function selectDataDP()
    {
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'IND');
        $tgl = date("Y-m-d");

        $this->db->distinct();
        $this->db->select('dp.*, sl.no_faktur, f.id_faktur, ds.id_struk');
        $this->db->from('cetak_dp dp, struk_logistik sl, faktur_logistik_farmasi f, detail_struk ds');
        $this->db->where_not_in('dp.no_distributor', 'test');
        $this->db->where('dp.id_faktur = f.id_faktur');
        $this->db->where('sl.id_faktur = dp.id_faktur');
        $this->db->where('sl.no_faktur = ds.id_struk');
        $this->db->where('dp.no_dokumen = f.no_dokumen');
        $this->db->like('dp.tgl_input', $tgl);
        $this->db->order_by('dp.no_index', 'DESC');
        return $this->db->get()->result();
    }

    public function selectDataDPRange($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'IND');

        $this->db->distinct();
        $this->db->select('dp.*, sl.no_faktur, f.id_faktur, ds.id_struk');
        $this->db->from('cetak_dp dp, struk_logistik sl, faktur_logistik_farmasi f, detail_struk ds');
        $this->db->where_not_in('dp.no_distributor', 'test');
        $this->db->where('dp.id_faktur = f.id_faktur');
        $this->db->where('sl.id_faktur = dp.id_faktur');
        $this->db->where('sl.no_faktur = ds.id_struk');
        $this->db->where('dp.no_dokumen = f.no_dokumen');
        $this->db->where("DATE_FORMAT(dp.tgl_input,'%Y-%m-%d') >='$mulai'");
        $this->db->where("DATE_FORMAT(dp.tgl_input,'%Y-%m-%d') <='$akhir'");
        $this->db->order_by('no_index', 'DESC');
        return $this->db->get()->result();
    }

    public function update_tindakan($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function getIsiDataDP($id_faktur, $index_no)
    {
        $this->db->distinct();
        $this->db->select('s.no_faktur,l.kode,l.standar,d.id_prod_obat,l.nama,d.no_batch,l.satuan_terkecil tipe,l.golongan_obat, s.id_produsen, d.frek, d.harga,d.total,s.tgl_masuk, d.harga_beli, d.ppn, d.diskon_rs, d.diskon ');
        $this->db->from('struk_logistik s , detail_struk d , list_logistik l , faktur_logistik_farmasi f, detail_po dp');
        $this->db->where('s.no_faktur=d.id_struk');
        $this->db->where('d.id_logistik=l.id_logistik');
        // $this->db->where('s.id_produsen=p.nama_produsen');
        // $this->db->where('f.id_vendor=p.nama_produsen');
        $this->db->where('s.id_faktur=f.id_faktur');
        $this->db->where('d.id_logistik=dp.id_list');
        $this->db->where('dp.id_faktur=f.id_faktur');
        $this->db->where('dp.id_list=l.id_logistik');
        $this->db->where('d.id_struk', $index_no);
        $this->db->where('f.id_faktur ', $id_faktur);
        $this->db->where('dp.status', '1');
        $this->db->order_by('d.tgl_input', 'desc');
        return $this->db->get()->result();

        // $this->db->select('d.*,l.produsen, l.nama obat, dp.*');
        // $this->db->from('detail_struk d, list_logistik l, detail_po dp');
        // $this->db->where('d.id_logistik=l.id_logistik');
        // $this->db->where('d.id_logistik=dp.id_list');
        // $this->db->where('d.id_struk', $index_no);
        // $this->db->where('dp.id_faktur ', $id_faktur);
        // $this->db->where('dp.status','1');
        // $this->db->order_by('d.tgl_input', 'desc');
        // return $this->db->get()->result();
    }

    public function getDataDP($id_faktur, $no_faktur)
    {
        //$this->db->distinct();
        $this->db->select("f.no_dokumen, f.id_vendor, l.nama, ds.ppn, ds.harga, ds.harga_beli, ds.frek, s.tipe, ds.diskon_rs, ds.total, f.tgl_input, ds.id_prod_obat");
        $this->db->from('faktur_logistik_farmasi f, detail_po dp, staff s, list_logistik l, struk_logistik sl, detail_struk ds, produsen v');
        $this->db->where('f.id_faktur = dp.id_faktur');
        $this->db->where('f.id_faktur = sl.id_faktur');
        // $this->db->where('v.nama_produsen=f.id_vendor');
        $this->db->where('sl.no_faktur = ds.id_struk');
        $this->db->where('dp.id_list = l.id_logistik');
        $this->db->where('ds.id_logistik = l.id_logistik');
        $this->db->where('dp.id_staff = s.id_staff');
        $this->db->where('sl.ket', 0);
        $this->db->where('f.id_faktur', $id_faktur);
        $this->db->where('sl.no_faktur', $no_faktur);
        $this->db->order_by('dp.tgl');
        $this->db->group_by('ds.no_batch    ');
        return $this->db->get()->result_array();
    }

    public function getDataDP2($id_faktur)
    {
        $this->db->select("cd.*, f.tgl_faktur");
        $this->db->from("cetak_dp cd, faktur_logistik_farmasi f");
        $this->db->where('cd.id_faktur = f.id_faktur');
        $this->db->where("cd.id_faktur", $id_faktur);
        $this->db->where('f.id_faktur', $id_faktur);
        return $this->db->get()->result();
    }

    public function getTgl($id_faktur)
    {
        $this->db->select('*');
        $this->db->from('faktur_logistik_farmasi');
        $this->db->where('id_faktur', $id_faktur);
        return $this->db->get()->result();
    }

    public function getTotalDiskon($id_faktur, $no_faktur)
    {
        $this->db->distinct();
        $this->db->select("SUM(ds.total) total, SUM(((ds.diskon_rs*ds.total)/100)) totdiskon, SUM(ds.harga*(ds.ppn/100)*ds.frek*(ds.diskon_rs/100)) diskontotal, SUM((ds.harga*ds.frek)) nilaidp, SUM((ds.harga*ds.frek)-((ds.harga*ds.frek)*ds.ppn/100)) ndp, SUM(ds.harga*ds.frek) - SUM((ds.harga*ds.frek)-((ds.harga*ds.frek)*ds.ppn/100)) ppp");
        $this->db->from('faktur_logistik_farmasi f, detail_po dp, staff s, list_logistik l, struk_logistik sl, detail_struk ds, produsen v');
        $this->db->where('f.id_faktur = dp.id_faktur');
        $this->db->where('f.id_faktur = sl.id_faktur');
        $this->db->where('v.nama_produsen=f.id_vendor');
        $this->db->where('sl.no_faktur = ds.id_struk');
        $this->db->where('dp.id_list = l.id_logistik');
        $this->db->where('ds.id_logistik = l.id_logistik');
        $this->db->where('dp.id_staff = s.id_staff');
        $this->db->where('sl.ket', 0);
        $this->db->where('f.id_faktur', $id_faktur);
        $this->db->where('sl.no_faktur', $no_faktur);
        return $this->db->get()->result();
    }

    public function delete_tindakan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    // delete riwayat permintaan obat
    public function delete_tindakan_permintaan($id, $table)
    {
        $this->db->delete($table, array('id_req' => $id));
    }

    public function getPSN($id_struk)
    {
        $this->db->select('r.*');
        $this->db->from('detail_request d,request_obat r ');
        $this->db->where('d.id_form = r.id_req');
        $this->db->where('d.id_req', $id_struk);
        return $this->db->get()->row();
    }


    public function selectObatPersediaan($bulan, $stok)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = strtotime($bulan);

        $vbulan = date("m", $date); //format bulan 
        $vtahun = date('Y', $date); //format tahun 



        $this->db->select('l.*');
        $this->db->from($stok . ' s, list_logistik l');
        $this->db->where('s.id_logistik=l.id_logistik');
        $this->db->where('month(s.tgl)', $vbulan);
        $this->db->where('year(s.tgl)', $vtahun);
        $this->db->group_by('s.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    public function selectLaporan_Persediaan($bulan, $stok)
    {
        date_default_timezone_set('Asia/Jakarta');

        $vbulan = date("m", strtotime($bulan)); //format bulan 
        $vtahun = date('Y', strtotime($bulan)); //format tahun 

        $date1 = strtotime($bulan . '-01');

        $result = strtotime('-1 second', $date1);
        $lastmonth = date("Y-m-d", $result); //akhir bulan sebelumnya
        $lastmonth1 = date("m", $result); //akhir bulan sebelumnya
        $lastyear = date("Y", $result); //akhir bulan sebelumnya

        $akhir_bulan = strtotime('-1 second', strtotime('+1 month', $date1)); //tgl akhir bulan
        $nowmonth = date("Y-m-d", $akhir_bulan); //format bulan 


        return $this->db->query("SELECT l.*,ifnull(z.harga_persediaan_last,l.harga_persediaan) harga_persediaan_last , ifnull(a.awal,0) awal, ifnull(x.masuk,0) masuk, ifnull(x.keluar,0)keluar, ifnull(s.akhir,0) akhir
        FROM list_logistik l 
        LEFT JOIN (
        SELECT id_logistik, 
                sum(frek) as awal
        FROM `$stok`
        WHERE date(tgl) <= '$lastmonth'
        GROUP BY id_logistik              
        ) a on a.id_logistik = l.id_logistik
        LEFT JOIN (
            SELECT id_logistik, 
                    sum(if(frek>0,frek,0)) as masuk,
                    sum(if(frek<0,frek,0)) as keluar
                
            FROM `$stok`
            WHERE month(tgl) ='$vbulan' and year(tgl)='$vtahun' 
            GROUP BY id_logistik   
        ) x ON x.id_logistik = l.id_logistik
        LEFT JOIN (
            SELECT id_logistik, 
                    sum(frek) as akhir
                    
            FROM `$stok`
            WHERE date(tgl) <= '$nowmonth'
            GROUP BY id_logistik   
        ) s ON s.id_logistik = l.id_logistik
         LEFT JOIN (
        SELECT id_logistik, harga_persediaan harga_persediaan_last
        FROM stop_opname_gudang
        WHERE bulan = '$lastmonth1' and tahun ='$lastyear' and stok ='$stok'
                   
        ) z on z.id_logistik = l.id_logistik
        having awal !=0 or masuk !=0 or keluar != 0 or akhir != 0 
        ")->result();
    }
    public function getHargaBeli($bulan, $id_log)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = strtotime($bulan);

        $vbulan = date("m", $date); //format bulan 
        $vtahun = date('Y', $date); //format tahun 

        return $this->db->query("SELECT ifnull(AVG(harga_beli),0) harga_beli, max(tgl_struk) tgl_struk, max(kadaluarsa) tgl_exp, id_produsen from(
            SELECT (d.harga * (1-(d.diskon_rs/100))) harga_beli,s.tgl_struk, d.kadaluarsa , s.id_produsen
            FROM detail_struk d, struk_logistik s
            where d.id_struk = s.no_faktur and d.id_logistik= $id_log and month(d.tgl_input) ='$vbulan' and year(d.tgl_input)='$vtahun'
            UNION ALL
            SELECT (d.harga * (1-(d.diskon_rs/100))) harga_beli,s.tgl_masuk tgl_struk,d.kadaluarsa, s.id_produsen 
            FROM detail_struk_bebas d, struk_logistik_bebas s
            where d.id_struk = s.id_struk and d.id_logistik= $id_log and month(d.tgl_input) ='$vbulan' and year(d.tgl_input)='$vtahun'
            )as g")->row();
    }
    public function getHargaBeli_last($bulan, $id_log)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = strtotime($bulan . '-01');

        $result = strtotime('-1 second', $date);
        // echo date('Y-m-d', $result);
        // $lastmonth = date("Y-m-d", $result); //format bulan 

        $vbulan = date("m", $result); //format bulan 
        $vtahun = date('Y', $result); //format tahun 

        return $this->db->query("SELECT ifnull(AVG(harga_beli),0) harga_beli, max(tgl_struk) tgl_struk, max(kadaluarsa) tgl_exp, id_produsen from(
            SELECT (d.harga * (1-(d.diskon_rs/100))) harga_beli,s.tgl_struk, d.kadaluarsa , s.id_produsen
            FROM detail_struk d, struk_logistik s
            where d.id_struk = s.no_faktur and d.id_logistik= $id_log 
            UNION ALL
            SELECT (d.harga * (1-(d.diskon_rs/100))) harga_beli,s.tgl_masuk tgl_struk,d.kadaluarsa , s.id_produsen
            FROM detail_struk_bebas d, struk_logistik_bebas s
            where d.id_struk = s.id_struk and d.id_logistik= $id_log 
            )as g
            
            ")->row();
    }

    public function getStokPenerimaan($bulan, $stok, $id_log)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = strtotime($bulan);

        $vbulan = date("m", $date); //format bulan 
        $vtahun = date('Y', $date); //format tahun 



        $this->db->select('sum(s.frek) jumlah');
        $this->db->from($stok . ' s, list_logistik l');
        $this->db->where('s.id_logistik=l.id_logistik');
        $this->db->where("s.frek > 0");
        $this->db->where('s.id_logistik', $id_log);
        $this->db->where('month(s.tgl)', $vbulan);
        $this->db->where('year(s.tgl)', $vtahun);
        $this->db->group_by('s.id_logistik');
        return $this->db->get()->row();
    }
    public function getStokPengeluaran($bulan, $stok, $id_log)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = strtotime($bulan);

        $vbulan = date("m", $date); //format bulan 
        $vtahun = date('Y', $date); //format tahun 



        $this->db->select('sum(s.frek) jumlah');
        $this->db->from($stok . ' s, list_logistik l');
        $this->db->where('s.id_logistik=l.id_logistik');
        $this->db->where("s.frek < 0");
        $this->db->where('s.id_logistik', $id_log);
        $this->db->where('month(s.tgl)', $vbulan);
        $this->db->where('year(s.tgl)', $vtahun);
        $this->db->group_by('s.id_logistik');
        return $this->db->get()->row();
    }
    public function getStokSekarang($bulan, $stok, $id_log)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = strtotime($bulan . '-01');

        $result = strtotime('-1 second', strtotime('+1 month', $date));
        // echo date('Y-m-d', $result);
        $nowmonth = date("Y-m-d", $result); //format bulan 

        $mintgl = $this->db->query("SELECT DATE(min(tgl)) tgl from " . $stok)->row()->tgl;

        $this->db->select('ifnull(sum(s.frek),0) jumlah');
        $this->db->from($stok . ' s');
        $this->db->where('s.id_logistik', $id_log);
        $this->db->where("DATE(s.tgl) BETWEEN '$mintgl' and '$nowmonth'");
        $this->db->group_by('s.id_logistik');
        return $this->db->get()->row();
    }
    public function getStokAwal($bulan, $stok, $id_log)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = strtotime($bulan . '-01');

        $result = strtotime('-1 second', $date);
        // echo date('Y-m-d', $result);
        $lastmonth = date("Y-m-d", $result); //format bulan 

        $mintgl = $this->db->query("SELECT DATE(min(tgl)) tgl from " . $stok . " where id_logistik ='$id_log'")->row()->tgl;

        $this->db->select('ifnull(sum(s.frek),0) jumlah');
        $this->db->from($stok . ' s');
        $this->db->where('s.id_logistik', $id_log);
        $this->db->where("DATE(s.tgl) BETWEEN '$mintgl' and '$lastmonth'");
        $this->db->group_by('s.id_logistik');
        return $this->db->get()->row();
    }

    public function selectObat()
    {
        $this->db->select('*');
        $this->db->from('list_logistik');
        return $this->db->get()->result();
    }
}
