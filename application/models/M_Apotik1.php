<<<<<<< HEAD
<?php

class M_Apotik extends CI_Model
{
    public function getKonfigurasiSibatik()
    {
        $this->db->select('*');
        $this->db->from('konfigurasi_sibatik');
        $this->db->where('nama', 'status_so_apotik');
        return $this->db->get()->row_array();
    }
    //pasien rajal
    public function selectPasienRajal() //poli
    {
        return $this->db->get('v_rajal_apotik')->result();
    }
    public function selectPasienIgd() //igd
    {
        $query =  $this->db->query("SELECT b.id_pelayanan,h.id_history,c.id_cara_bayar,'-' AS nama_poli,h.tgl_masuk,p.no_rm,p.nama ,p.jenis_kelamin,p.tgl_lahir,p.agama,h.jenis_pelayanan,dok.nama nama_dokter,b.no_sep,b.diagnosa,c.nama AS cara_bayar,'-' AS poli,b.keterangan,b.tipe,p.alamat
        from pasien p , pelayanan b , history_pelayanan_ugd h , cara_bayar c , dokter dok , resep_obat r 
        where p.no_rm = b.id_pasien 
        and h.id_pelayanan = b.id_pelayanan 
        and c.id_cara_bayar = b.cara_bayar 
        and h.dpjp = dok.id_dokter 
        and (b.status_rawat = 'dirawat' or b.status_rawat = 'dikembalikan') 
        and b.status = 1 and b.id_pelayanan = r.id_pelayanan 
        and h.id_history = r.id_history 
        and r.status = 1
        and h.status = 1
        ");
        return $query->result();
    }
    public function selectObatBebas()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        if ($perequest == "apotik") {
            $stok = "APOTIK";
        } else if ($perequest == "bpjs") {
            $stok = "BPJS";
        } else if ($perequest == "deporanap") {
            $stok = "DEPO RANAP";
        } else if ($perequest == "isolasi") {
            $stok = "ISOLASI";
        } else if ($perequest == "icu") {
            $stok = "ICU";
        } else if ($perequest == "vip") {
            $stok = "VIP";
        } else if ($perequest == "baksos") {
            $stok = "BAKSOS";
        } else if ($perequest == "gizi") {
            $stok = "GIZI";
        } else if ($perequest == "igdfarmasi") {
            $stok = "IGD FARMASI";
        } else if ($perequest == "igdapotik") {
            $stok = "IGD APOTIK";
        } else if ($perequest == "ipcn") {
            $stok = "IPCN";
        } else if ($perequest == "kebidanan") {
            $stok = "KEBIDANAN";
        } else if ($perequest == "Klinik Pratama Kundur") {
            $stok = "Klinik Pratama Kundur";
        } else if ($perequest == "labor") {
            $stok = "LABOR";
        } else if ($perequest == "mcu") {
            $stok = "MCU";
        } else if ($perequest == "monev") {
            $stok = "MONEV";
        } else if ($perequest == "nicu") {
            $stok = "NICU";
        } else if ($perequest == "ok") {
            $stok = "OK";
        } else if ($perequest == "obat expire") {
            $stok = "OBAT EXPIRE";
        } else if ($perequest == "radiologi") {
            $stok = "RADIOLOGI";
        } else if ($perequest == "rawatinap") {
            $stok = "RAWAT INAP";
        } else if ($perequest == "rawatjalan") {
            $stok = "RAWAT JALAN";
        } else if ($perequest == "retur obat") {
            $stok = "RETUR OBAT";
        } else if ($perequest == "sungairaya") {
            $stok = "SUNGAI RAYA";
        } else if ($perequest == "vip") {
            $stok = "VIP";
        } else if ($perequest == "bpi") {
            $stok = "BPI";
        }
        $this->db->order_by('tanggal desc');
        $this->db->where('unit', $stok);
        return $this->db->get('obat_bebas')->result();
    }
    public function countPoliRajal($id)
    {
        $this->db->select('COUNT(*) total');
        $this->db->from('history_pelayanan h');
        $this->db->where('h.id_pelayanan', $id);
        $this->db->where('h.jenis_pelayanan', 'POLI');
        return $this->db->get()->row();
    }
    public function selectResepById($id_pelayanan, $id_history)
    {
        $this->db->select('r.*, p.cara_bayar');
        $this->db->from('resep_obat r, pelayanan p');
        $this->db->where('r.id_pelayanan = p.id_pelayanan');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        $this->db->where('r.id_history', $id_history);
        $this->db->where('r.status = 1');
        $this->db->where('r.jenis_resep != 4');
        return $this->db->get()->result();
    }
    public function selectObatByResep($id_resep)
    {
        $this->db->select('t.*, l.nama, s.nama staff, si.tindakan ');
        $this->db->from('resep_obat r, tindakan_farmasi t, list_logistik l , staff s, signa_obat si');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('t.id_signa = si.id_signa');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function selectObatBebasById($id)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('obat_bebas o, tindakan_farmasi t, list_logistik l , staff s');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_pelayanan = o.id_obat_bebas');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('o.id_obat_bebas', $id);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function getSigna()
    {
        return $this->db->get('signa_obat')->result_array();
    }
    public function getCaraPakai()
    {
        return $this->db->get('cara_pemakaian_obat')->result_array();
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
    public function getSignaById($id_tindakan)
    {
        $this->db->select('pas.nama,pas.no_rm, p.tgl_masuk, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat,  pas.tgl_lahir,f.id_cara_pakai,f.id_signa');
        $this->db->from('pasien pas, pelayanan p, tindakan_farmasi f,  list_logistik l ,  resep_obat r');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('r.id_resep=f.id_resep');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_tindakan_farmasi', $id_tindakan);

        return $this->db->get()->row_array();
    }
    public function getSignaByResep($id_resep)
    {
        $this->db->select('pas.nama,pas.no_rm, p.tgl_masuk, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat,  pas.tgl_lahir, f.id_cara_pakai, f.id_signa');
        $this->db->from('pasien pas, pelayanan p, tindakan_farmasi f , list_logistik l ,  resep_obat r, signa_obat s');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('r.id_resep=f.id_resep');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_resep', $id_resep);
        

        return $this->db->get()->result_array();
    }
    public function getSignaObatBebasById($id_tindakan)
    {
        $this->db->select('o.nama,o.tanggal, o.id_obat_bebas, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat, f.id_signa, f.id_cara_pakai');
        $this->db->from('obat_bebas o, tindakan_farmasi f , list_logistik l ');
        $this->db->where('o.id_obat_bebas=f.id_pelayanan');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_tindakan_farmasi', $id_tindakan);

        return $this->db->get()->row_array();
    }
    public function getSignaObatBebasByPasien($id_pelayanan)
    {
        $this->db->select('o.nama,o.tanggal, o.id_obat_bebas, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat, f.id_signa, f.id_cara_pakai');
        $this->db->from('obat_bebas o, tindakan_farmasi f,list_logistik l ');
        $this->db->where('o.id_obat_bebas=f.id_pelayanan');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_pelayanan', $id_pelayanan);

        return $this->db->get()->result_array();
    }
    public function getResepById($id_resep)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, l.nama obat, t.id_signa, s.tindakan, t.id_cara_pakai,t.keterangan');
        $this->db->from('tindakan_farmasi t, list_logistik l, resep_obat r, signa_obat s');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_signa=s.id_signa');
        $this->db->where('t.id_resep', $id_resep);
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }
    public function getDataByIdResep($id_resep, $id_history)
    {
        $query =  $this->db->query("SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat,c.nama  cara_bayar, lp.nama_panjang ruang, a.nama asal,d.nama dokter, d.foto
        from pasien pa, pelayanan p, dokter d,cara_bayar c, list_poli lp, asal_pasien  a, history_pelayanan h, resep_obat r  
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=r.id_pelayanan and lp.id_list_poli=h.nama_poli and r.id_resep = $id_resep and h.id_history = '$id_history'
        UNION
        SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat,c.nama  cara_bayar,'-' ruang, a.nama asal,d.nama dokter, d.foto
        from pasien pa, pelayanan p, dokter d,cara_bayar c,  asal_pasien  a, history_pelayanan_ugd h, resep_obat r  
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=r.id_pelayanan and r.id_resep = $id_resep and h.id_history = '$id_history'
        UNION
        SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat,c.nama  cara_bayar, ru.tipe ruang,a.nama asal,d.nama dokter, d.foto
        from pasien pa, pelayanan p, dokter d,cara_bayar c,  asal_pasien  a, history_pelayanan_ranap h, resep_obat r, ruangan ru
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=r.id_pelayanan and h.id_kamar=ru.id_ruangan and r.id_resep = $id_resep and h.id_history = '$id_history'
        ");
        return $query->row_array();
    }


    public function getDataObatBebas($id)
    {
        $this->db->where('id_obat_bebas', $id);

        return $this->db->get('obat_bebas')->row_array();
    }
    public function getObatBebasById($id)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, l.nama obat');
        $this->db->from('tindakan_farmasi t, list_logistik l, obat_bebas o');
        $this->db->where('o.id_obat_bebas=t.id_pelayanan');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_pelayanan', $id);
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }

    //Tampil Non Racikan
    public function selectNonRacikanByResep($id_resep)
    {
        $this->db->select('ra.*, s.tindakan, c.cara_pemakaian,r.status');
        $this->db->from('resep_obat r, resep_racikan ra, cara_pemakaian_obat c, signa_obat s');
        $this->db->where('r.id_resep = ra.id_resep');
        $this->db->where('ra.id_signa = s.id_signa');
        $this->db->where('ra.id_cara_pakai = c.id_cara_pemakaian');
        $this->db->where('ra.id_resep', $id_resep);
        $this->db->order_by('ra.tanggal desc');

        return $this->db->get()->result();
    }

    public function selectRacikanByResep($id_resep)
    {
        $this->db->select('ra.*, s.tindakan, c.cara_pemakaian,r.status');
        $this->db->from('resep_obat r, resep_racikan ra, cara_pemakaian_obat c, signa_obat s');
        $this->db->where('r.id_resep = ra.id_resep');
        $this->db->where('ra.id_signa = s.id_signa');
        $this->db->where('ra.id_cara_pakai = c.id_cara_pemakaian');
        $this->db->where('ra.id_resep', $id_resep);
        $this->db->order_by('ra.tanggal desc');

        return $this->db->get()->result();
    }
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
    public function getNamaObatUnit($stok)
    {
        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
        $this->db->from($stok . ' sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function getNamaObat1()
    {
        return $this->db->get('v_nama_obat')->result_array();
    }
    public function getNamaObatByDepo($depo)
    {
        if ($depo == 'APOTIK') {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
            $this->db->from('stok_apotik sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('nama');
            return $this->db->get()->result();
        } else {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
            $this->db->from('stok_igd sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('nama');
            return $this->db->get()->result();
        }
    }


    public function getDataObat($id_tindakan)
    {
        $this->db->select('t.*,l.nama, s.tindakan');
        $this->db->from('tindakan_farmasi t, list_logistik l, signa_obat s');
        $this->db->where(' t.id_list_tindakan=l.id_logistik');
        $this->db->where(' t.id_signa=s.id_signa');
        $this->db->where('id_tindakan_farmasi', $id_tindakan);
        return $this->db->get()->result();
    }
    public function getExpByObatApotik($obat)
    {
        $this->db->select('sum(s.frek) stok, s.kadaluarsa,l.margin,l.harga_cost,l.id_logistik,l.nama,l.ppn');
        $this->db->from('stok_apotik s, list_logistik l');
        $this->db->where(' s.id_logistik=l.id_logistik');
        $this->db->where(' s.id_logistik', $obat);
        $this->db->group_by('s.id_stok');
        $this->db->having('sum(s.frek)>0');
        return $this->db->get()->result_array();
    }

    public function getExpByObatIGD($obat)
    {
        $this->db->select('sum(s.frek) stok, s.kadaluarsa,l.margin,l.harga_cost,l.id_logistik,l.nama,l.ppn');
        $this->db->from('stok_igd s, list_logistik l');
        $this->db->where(' s.id_logistik=l.id_logistik');
        $this->db->where(' s.id_logistik', $obat);
        $this->db->group_by('s.id_stok');
        $this->db->having('sum(s.frek)>0');
        return $this->db->get()->result_array();
    }
    public function getExpByObatRanap($obat)
    {
        $this->db->select('sum(s.frek) stok, s.kadaluarsa,l.margin,l.harga_cost,l.id_logistik,l.nama,l.ppn');
        $this->db->from('stok_depo s, list_logistik l');
        $this->db->where(' s.id_logistik=l.id_logistik');
        $this->db->where(' s.id_logistik', $obat);
        $this->db->group_by('s.id_stok');
        $this->db->having('sum(s.frek)>0');
        return $this->db->get()->row_array();
    }
    public function getSumObatApotik($obat)
    {
        $this->db->select('sum(frek) stok');
        $this->db->from('stok_apotik');
        $this->db->where(' id_logistik', $obat);
        return $this->db->get()->row_array();
    }
    public function getSumObatIgd($obat)
    {
        $this->db->select('sum(frek) stok');
        $this->db->from('stok_igd');
        $this->db->where(' id_logistik', $obat);
        return $this->db->get()->row_array();
    }
    public function getSumObatRanap($obat)
    {
        $this->db->select('sum(frek) stok');
        $this->db->from('stok_depo');
        $this->db->where(' id_logistik', $obat);
        return $this->db->get()->row_array();
    }
    public function countRacikan($id)
    {
        $this->db->select('COUNT(*) total');
        $this->db->from('history_pelayanan h');
        $this->db->where('h.id_pelayanan', $id);
        $this->db->where('h.jenis_pelayanan', 'POLI');
        return $this->db->get()->row();
    }


    //Paien Ranap
    public function selectPasienRanap()
    {
        return $this->db->get('v_ranap_apotik')->result();
    }
    //Riwayat Pasien
    public function selectRiwayatPasien()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->like(' tgl_masuk ', $tgl);
        return $this->db->get('v_riwayat_pasien_apotik')->result();
    }
    public function selectRangeRiwayatPasien($mulai, $akhir)
    {
        $this->db->where('tgl_masuk >=', $mulai);
        $this->db->where('tgl_masuk <=', $akhir);
        return $this->db->get('v_riwayat_pasien_apotik')->result();
    }
    public function selectRiwayatPasienById($id_pelayanan)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_farmasi t, list_logistik l, pelayanan p , staff s, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal desc');
        return $this->db->get()->result();
    }
    public function getTotalTindakanById($id_pelayanan)
    {
        $this->db->select('sum(t.total) total');
        $this->db->from('tindakan_farmasi t, resep_obat r');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function getDataRiwayatById($id_pelayanan, $id_history)
    {
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_history', $id_history);
        return $this->db->get('v_riwayat_pasien_apotik')->row_array();
    }
    public function getRiwayatById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama obat,t.id_cara_pakai');
        $this->db->from('tindakan_farmasi t, list_logistik l, pelayanan p,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('t.frek >=0');
        $this->db->where('r.id_pelayanan', $id_pelayanan);

        return $this->db->get()->result_array();
    }
    //Stok Obat Apotik
    public function selectStokApotik()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok  ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen');
        $this->db->from('stok_apotik a, list_logistik l');
        $this->db->where('a.id_logistik=l.id_logistik');
        $this->db->group_by('a.id_logistik');
        $this->db->order_by('stok');
        return $this->db->get()->result();
    }
    public function selectStokIgd()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok  ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen');
        $this->db->from('stok_igd a, list_logistik l');
        $this->db->where('a.id_logistik=l.id_logistik');
        $this->db->group_by('a.id_logistik');
        $this->db->order_by('stok');
        return $this->db->get()->result();
    }
    public function selectDetailStok($id_logistik)
    {

        $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok ,a.kadaluarsa ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen');
        $this->db->from('stok_apotik a, list_logistik l');
        $this->db->where('a.id_logistik=l.id_logistik');
        $this->db->where('a.id_logistik', $id_logistik);
        $this->db->group_by('a.kadaluarsa');
        $this->db->order_by('stok');


        return $this->db->get()->result();
    }
    public function selectDetailStokIgd($id_logistik)
    {

        $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok ,a.kadaluarsa ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen');
        $this->db->from('stok_igd a, list_logistik l');
        $this->db->where('a.id_logistik=l.id_logistik');
        $this->db->where('a.id_logistik', $id_logistik);
        $this->db->group_by('a.kadaluarsa');
        $this->db->order_by('stok');


        return $this->db->get()->result();
    }
    public function getObatApotik()
    {
        $this->db->select('l.id_logistik,l.nama');
        $this->db->from('list_logistik l');
        $this->db->order_by('l.nama');
        return $this->db->get()->result_array();
    }
    public function getEditObatApotik()
    {
        $hasil = $this->db->query("SELECT l.id_logistik,l.nama,  sum(s.frek) stok
        FROM list_logistik l
        INNER JOIN stok_apotik s 
        on s.id_logistik=l.id_logistik
        GROUP by l.id_logistik
        order by l.nama");
        return $hasil->result_array();
    }
    public function getEditObatIgd()
    {
        $hasil = $this->db->query("SELECT l.id_logistik,l.nama,  sum(s.frek) stok
        FROM list_logistik l
        INNER JOIN stok_igd s 
        on s.id_logistik=l.id_logistik
        GROUP by l.id_logistik
        order by l.nama");
        return $hasil->result_array();
    }
    public function getStokApotik()
    {
        $this->db->select('sum(s.frek) stok, s.kadaluarsa');
        $this->db->from('stok_apotik s, list_logistik l');
        $this->db->where(' s.id_logistik=l.id_logistik');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    // Laporan pasien rajal
    public function selectLaporanPasienRajal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPasienRajal($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.sataun_terkecil tipe,l.produsen, l.standar, l.kode, l.distributor,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }
    public function selectLaporanPasienIgd()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ugd h , pasien ps, dokter d, cara_bayar c,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPasienIgd($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.standar, l.kode, l.distributor,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ugd h , pasien ps, dokter d, cara_bayar c,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }
    // End
    public function selectLaporanPasienRanap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.standar,l.kode, l.distributor,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ranap h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        // $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' t.tanggal ', $tgl);
        $this->db->order_by('ps.nama, t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPasienRanap($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.standar,l.kode, l.distributor,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ranap h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        // $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('t.tanggal  >=', $mulai);
        $this->db->where('t.tanggal  <=', $akhir);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }
    // End


    public function selectLaporanObatRajal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost,l.kode, l.standar, l.distributor, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h, resep_obat r');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_history=h.id_history');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    public function selectRangeLaporanObatRajal($mulai, $akhir)
    {
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, l.kode, l.distributor, l.standar, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h, resep_obat r');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_history=h.id_history');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    public function selectLaporanObatIgd()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost,l.kode, l.standar, l.distributor, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ugd h, resep_obat r');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_history=h.id_history');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }


    public function selectRangeLaporanObatIgd($mulai, $akhir)
    {
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, l.kode, l.distributor, l.standar, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ugd h, resep_obat r');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_history=h.id_history');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    // End


    public function selectLaporanObatRanap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost,l.kode, l.standar, l.distributor, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ranap h, resep_obat r');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_history=h.id_history');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanObatRanap($mulai, $akhir)
    {
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, l.kode, l.distributor, l.standar, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ugd h, resep_obat r');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_history=h.id_history');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    // End

    public function selectLaporanObatEd()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama, l.id_logistik,l.harga_cost, sum(a.frek) stok  ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen,a.kadaluarsa,l.ppn');
        $this->db->from('stok_apotik a, list_logistik l');
        $this->db->where('a.id_logistik=l.id_logistik ');
        $this->db->group_by('a.id_logistik, a.kadaluarsa ');
        $this->db->having('stok>0');
        $this->db->order_by('a.kadaluarsa');
        return $this->db->get()->result();
    }

    public function selectCetakSoApotik()
    {
        return $this->db->get('v_cetak_so_apotik')->result();
    }
    //end

    public function selectCetakSoIgd()
    {
        return $this->db->get('v_cetak_so_igd_apotik')->result();
    }
    //end

    public function selectLaporanPasienRajalSanbe()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where("(l.produsen='SANBE FARMA' )");
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPasienRajalSanbe($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where("(l.produsen='SANBE FARMA' )");
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }
    // End

    public function selectLaporanPasienRanapSanbe()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where("(l.produsen='SANBE FARMA' )");
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->order_by('ps.nama, t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPasienRanapSanbe($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where("(l.produsen='SANBE FARMA' )");
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->order_by('ps.nama, t.tanggal ');
        return $this->db->get()->result();
    }
    public function selectLaporanObatBpjs()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual,l.ppn');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('p.cara_bayar', 'WA14BJ84');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanObatBpjs($mulai, $akhir)
    {
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual,l.ppn');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('p.cara_bayar', 'WA14BJ84');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    // End

    public function selectLaporanObatAsuransi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select(' l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual,l.ppn');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where("(p.cara_bayar='WA14BJ84' or p.cara_bayar!='65AP55')");
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanObatAsuransi($mulai, $akhir)
    {
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual,l.ppn');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where("(p.cara_bayar='WA14BJ84' or p.cara_bayar!='65AP55')");
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    // End

    public function selectLaporanObatPribadi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual,l.ppn');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('p.cara_bayar', '65AP55');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanObatPribadi($mulai, $akhir)
    {
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual,l.ppn');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('p.cara_bayar', '65AP55');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    // End
    // End
    //Antrian
    public function selectCountData()
    {
        $tanggal = date('Y-m-d');
        $this->db->select('count(id_antrian) jumlah');
        $this->db->where_Not_In('status', '2');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_farmasi')->row_array();
    }
    public function getAntrian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        $this->db->select('a.*, p.nama,c.nama cara_bayar,p.no_rm ');
        $this->db->from('antrian_farmasi a, pelayanan pel, pasien p, cara_bayar c  ');
        $this->db->where('p.no_rm=pel.id_pasien');
        $this->db->where('c.id_cara_bayar=pel.cara_bayar');
        $this->db->where('a.id_pelayanan=pel.id_pelayanan');
        $this->db->like('tanggal', $tanggal);
        $this->db->where_Not_In('a.status', '2');
        $this->db->order_by('a.status');
        $this->db->order_by('a.no_antri');
        return $this->db->get()->row_array();
    }
    public function selectAntrian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        $this->db->select('a.*, p.nama,c.nama cara_bayar,p.no_rm ');
        $this->db->from('antrian_farmasi a, pelayanan pel, pasien p, cara_bayar c  ');
        $this->db->where('p.no_rm=pel.id_pasien');
        $this->db->where('c.id_cara_bayar=pel.cara_bayar');
        $this->db->where('a.id_pelayanan=pel.id_pelayanan');
        $this->db->like('tanggal', $tanggal);
        $this->db->where_Not_In('a.status', '2');
        $this->db->order_by('a.status');
        $this->db->order_by('a.no_antri');
        return $this->db->get()->result();
    }
    public function insertplaySuara($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function updateskip($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function updatenext($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function selectPlay()
    {
        return $this->db->get('temp_antrian_farmasi')->row_array();
    }

    public function deleteplaySuara()
    {
        $this->db->limit(1);
        $this->db->empty_Table('temp_antrian_farmasi');
    }

    public function umum()
    {
        $tanggal = date('Y-m-d');
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('jenis', 'umum');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_rm')->row_array();
    }
    public function delete_obat($id_tindakan, $stok)
    {
        $this->db->delete('tindakan_farmasi', array('id_tindakan_farmasi' => $id_tindakan));

        $this->db->delete($stok, array('id_req' => $id_tindakan));
        // $sql = "DELETE s.* from stok_apotik s , tindakan_farmasi f  WHERE s.id_req = f.id_tindakan_farmasi and s.id_req=?";
        // $this->db->query($sql, array($id_tindakan));
    }
    public function delete_tindakan($id, $table, $where)
    {
        $this->db->delete($table, array($where => $id));
    }
 public function selectDataPasien($tipe)
    {
        if ($tipe == 'INTERNIS') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status status_kasir  
            FROM v_pasien_internis v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history 
           
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'OBGYNE') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status status_kasir 
            FROM v_pasien_obgyne v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'THT') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_tht v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'MATA') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_mata v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'KULIT DAN KELAMIN') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_kulit v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'UMUM') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_umum v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'ANAK') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_anak v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'GIGI') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_gigi v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'JANTUNG') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_jantung v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'BEDAH') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_bedah v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'FISIO') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_fisio v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        }
    }
    function update_perencanaan($id_logistik,$stok,$table){
        $tgl = date('Y-m-d H:i:s');
        $d_stok = $this->db->query("SELECT sum(frek) stok from $stok where id_logistik ='$id_logistik'")->row();
        $d_penggunaan = $this->db->query("SELECT sum(frek) stok from $stok where asal_tujuan = 'PENJUALAN' and id_logistik ='$id_logistik'")->row();

        $this->M_Apotik->update(['stok_tersedia' => $d_stok->stok, 'penggunaan' => $d_penggunaan->stok, 'tanggal_update'=>$tgl], ['id_logistik' => $id_logistik], $table);
    }
}
=======
<?php

class M_Apotik extends CI_Model
{
    public function getKonfigurasiSibatik()
    {
        $this->db->select('*');
        $this->db->from('konfigurasi_sibatik');
        $this->db->where('nama', 'status_so_apotik');
        return $this->db->get()->row_array();
    }
    //pasien rajal
    public function selectPasienRajal() //poli
    {
        return $this->db->get('v_rajal_apotik')->result();
    }
    public function selectPasienIgd() //igd
    {
        $query =  $this->db->query("SELECT b.id_pelayanan,h.id_history,c.id_cara_bayar,'-' AS nama_poli,h.tgl_masuk,p.no_rm,p.nama ,p.jenis_kelamin,p.tgl_lahir,p.agama,h.jenis_pelayanan,dok.nama nama_dokter,b.no_sep,b.diagnosa,c.nama AS cara_bayar,'-' AS poli,b.keterangan,b.tipe,p.alamat
        from pasien p , pelayanan b , history_pelayanan_ugd h , cara_bayar c , dokter dok , resep_obat r 
        where p.no_rm = b.id_pasien 
        and h.id_pelayanan = b.id_pelayanan 
        and c.id_cara_bayar = b.cara_bayar 
        and h.dpjp = dok.id_dokter 
        and (b.status_rawat = 'dirawat' or b.status_rawat = 'dikembalikan') 
        and b.status = 1 and b.id_pelayanan = r.id_pelayanan 
        and h.id_history = r.id_history 
        and r.status = 1
        and h.status = 1
        ");
        return $query->result();
    }
    public function selectObatBebas()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        if ($perequest == "apotik") {
            $stok = "APOTIK";
        } else if ($perequest == "bpjs") {
            $stok = "BPJS";
        } else if ($perequest == "deporanap") {
            $stok = "DEPO RANAP";
        } else if ($perequest == "isolasi") {
            $stok = "ISOLASI";
        } else if ($perequest == "icu") {
            $stok = "ICU";
        } else if ($perequest == "vip") {
            $stok = "VIP";
        } else if ($perequest == "baksos") {
            $stok = "BAKSOS";
        } else if ($perequest == "gizi") {
            $stok = "GIZI";
        } else if ($perequest == "igdfarmasi") {
            $stok = "IGD FARMASI";
        } else if ($perequest == "igdapotik") {
            $stok = "IGD APOTIK";
        } else if ($perequest == "ipcn") {
            $stok = "IPCN";
        } else if ($perequest == "kebidanan") {
            $stok = "KEBIDANAN";
        } else if ($perequest == "Klinik Pratama Kundur") {
            $stok = "Klinik Pratama Kundur";
        } else if ($perequest == "labor") {
            $stok = "LABOR";
        } else if ($perequest == "mcu") {
            $stok = "MCU";
        } else if ($perequest == "monev") {
            $stok = "MONEV";
        } else if ($perequest == "nicu") {
            $stok = "NICU";
        } else if ($perequest == "ok") {
            $stok = "OK";
        } else if ($perequest == "obat expire") {
            $stok = "OBAT EXPIRE";
        } else if ($perequest == "radiologi") {
            $stok = "RADIOLOGI";
        } else if ($perequest == "rawatinap") {
            $stok = "RAWAT INAP";
        } else if ($perequest == "rawatjalan") {
            $stok = "RAWAT JALAN";
        } else if ($perequest == "retur obat") {
            $stok = "RETUR OBAT";
        } else if ($perequest == "sungairaya") {
            $stok = "SUNGAI RAYA";
        } else if ($perequest == "vip") {
            $stok = "VIP";
        } else if ($perequest == "bpi") {
            $stok = "BPI";
        }
        $this->db->order_by('tanggal desc');
        $this->db->where('unit', $stok);
        return $this->db->get('obat_bebas')->result();
    }
    public function countPoliRajal($id)
    {
        $this->db->select('COUNT(*) total');
        $this->db->from('history_pelayanan h');
        $this->db->where('h.id_pelayanan', $id);
        $this->db->where('h.jenis_pelayanan', 'POLI');
        return $this->db->get()->row();
    }
    public function selectResepById($id_pelayanan, $id_history)
    {
        $this->db->select('r.*, p.cara_bayar');
        $this->db->from('resep_obat r, pelayanan p');
        $this->db->where('r.id_pelayanan = p.id_pelayanan');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        $this->db->where('r.id_history', $id_history);
        $this->db->where('r.status = 1');
        $this->db->where('r.jenis_resep != 4');
        return $this->db->get()->result();
    }
    public function selectObatByResep($id_resep)
    {
        $this->db->select('t.*, l.nama, s.nama staff, si.tindakan ');
        $this->db->from('resep_obat r, tindakan_farmasi t, list_logistik l , staff s, signa_obat si');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('t.id_signa = si.id_signa');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function selectObatBebasById($id)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('obat_bebas o, tindakan_farmasi t, list_logistik l , staff s');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_pelayanan = o.id_obat_bebas');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('o.id_obat_bebas', $id);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function getSigna()
    {
        return $this->db->get('signa_obat')->result_array();
    }
    public function getCaraPakai()
    {
        return $this->db->get('cara_pemakaian_obat')->result_array();
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
    public function getSignaById($id_tindakan)
    {
        $this->db->select('pas.nama,pas.no_rm, p.tgl_masuk, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat,  pas.tgl_lahir,f.id_cara_pakai,f.id_signa');
        $this->db->from('pasien pas, pelayanan p, tindakan_farmasi f,  list_logistik l ,  resep_obat r');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('r.id_resep=f.id_resep');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_tindakan_farmasi', $id_tindakan);

        return $this->db->get()->row_array();
    }
    public function getSignaByResep($id_resep)
    {
        $this->db->select('pas.nama,pas.no_rm, p.tgl_masuk, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat,  pas.tgl_lahir, f.id_cara_pakai, f.id_signa');
        $this->db->from('pasien pas, pelayanan p, tindakan_farmasi f , list_logistik l ,  resep_obat r, signa_obat s');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('r.id_resep=f.id_resep');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_resep', $id_resep);
        

        return $this->db->get()->result_array();
    }
    public function getSignaObatBebasById($id_tindakan)
    {
        $this->db->select('o.nama,o.tanggal, o.id_obat_bebas, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat, f.id_signa, f.id_cara_pakai');
        $this->db->from('obat_bebas o, tindakan_farmasi f , list_logistik l ');
        $this->db->where('o.id_obat_bebas=f.id_pelayanan');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_tindakan_farmasi', $id_tindakan);

        return $this->db->get()->row_array();
    }
    public function getSignaObatBebasByPasien($id_pelayanan)
    {
        $this->db->select('o.nama,o.tanggal, o.id_obat_bebas, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat, f.id_signa, f.id_cara_pakai');
        $this->db->from('obat_bebas o, tindakan_farmasi f,list_logistik l ');
        $this->db->where('o.id_obat_bebas=f.id_pelayanan');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_pelayanan', $id_pelayanan);

        return $this->db->get()->result_array();
    }
    public function getResepById($id_resep)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, l.nama obat, t.id_signa, s.tindakan, t.id_cara_pakai,t.keterangan');
        $this->db->from('tindakan_farmasi t, list_logistik l, resep_obat r, signa_obat s');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_signa=s.id_signa');
        $this->db->where('t.id_resep', $id_resep);
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }
    public function getDataByIdResep($id_resep, $id_history)
    {
        $query =  $this->db->query("SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat,c.nama  cara_bayar, lp.nama_panjang ruang, a.nama asal,d.nama dokter, d.foto
        from pasien pa, pelayanan p, dokter d,cara_bayar c, list_poli lp, asal_pasien  a, history_pelayanan h, resep_obat r  
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=r.id_pelayanan and lp.id_list_poli=h.nama_poli and r.id_resep = $id_resep and h.id_history = '$id_history'
        UNION
        SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat,c.nama  cara_bayar,'-' ruang, a.nama asal,d.nama dokter, d.foto
        from pasien pa, pelayanan p, dokter d,cara_bayar c,  asal_pasien  a, history_pelayanan_ugd h, resep_obat r  
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=r.id_pelayanan and r.id_resep = $id_resep and h.id_history = '$id_history'
        UNION
        SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat,c.nama  cara_bayar, ru.tipe ruang,a.nama asal,d.nama dokter, d.foto
        from pasien pa, pelayanan p, dokter d,cara_bayar c,  asal_pasien  a, history_pelayanan_ranap h, resep_obat r, ruangan ru
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=r.id_pelayanan and h.id_kamar=ru.id_ruangan and r.id_resep = $id_resep and h.id_history = '$id_history'
        ");
        return $query->row_array();
    }


    public function getDataObatBebas($id)
    {
        $this->db->where('id_obat_bebas', $id);

        return $this->db->get('obat_bebas')->row_array();
    }
    public function getObatBebasById($id)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, l.nama obat');
        $this->db->from('tindakan_farmasi t, list_logistik l, obat_bebas o');
        $this->db->where('o.id_obat_bebas=t.id_pelayanan');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_pelayanan', $id);
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }

    //Tampil Non Racikan
    public function selectNonRacikanByResep($id_resep)
    {
        $this->db->select('ra.*, s.tindakan, c.cara_pemakaian,r.status');
        $this->db->from('resep_obat r, resep_racikan ra, cara_pemakaian_obat c, signa_obat s');
        $this->db->where('r.id_resep = ra.id_resep');
        $this->db->where('ra.id_signa = s.id_signa');
        $this->db->where('ra.id_cara_pakai = c.id_cara_pemakaian');
        $this->db->where('ra.id_resep', $id_resep);
        $this->db->order_by('ra.tanggal desc');

        return $this->db->get()->result();
    }

    public function selectRacikanByResep($id_resep)
    {
        $this->db->select('ra.*, s.tindakan, c.cara_pemakaian,r.status');
        $this->db->from('resep_obat r, resep_racikan ra, cara_pemakaian_obat c, signa_obat s');
        $this->db->where('r.id_resep = ra.id_resep');
        $this->db->where('ra.id_signa = s.id_signa');
        $this->db->where('ra.id_cara_pakai = c.id_cara_pemakaian');
        $this->db->where('ra.id_resep', $id_resep);
        $this->db->order_by('ra.tanggal desc');

        return $this->db->get()->result();
    }
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
    public function getNamaObatUnit($stok)
    {
        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
        $this->db->from($stok . ' sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function getNamaObat1()
    {
        return $this->db->get('v_nama_obat')->result_array();
    }
    public function getNamaObatByDepo($depo)
    {
        if ($depo == 'APOTIK') {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
            $this->db->from('stok_apotik sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('nama');
            return $this->db->get()->result();
        } else {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
            $this->db->from('stok_igd sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('nama');
            return $this->db->get()->result();
        }
    }


    public function getDataObat($id_tindakan)
    {
        $this->db->select('t.*,l.nama, s.tindakan');
        $this->db->from('tindakan_farmasi t, list_logistik l, signa_obat s');
        $this->db->where(' t.id_list_tindakan=l.id_logistik');
        $this->db->where(' t.id_signa=s.id_signa');
        $this->db->where('id_tindakan_farmasi', $id_tindakan);
        return $this->db->get()->result();
    }
    public function getExpByObatApotik($obat)
    {
        $this->db->select('sum(s.frek) stok, s.kadaluarsa,l.margin,l.harga_cost,l.id_logistik,l.nama,l.ppn');
        $this->db->from('stok_apotik s, list_logistik l');
        $this->db->where(' s.id_logistik=l.id_logistik');
        $this->db->where(' s.id_logistik', $obat);
        $this->db->group_by('s.id_stok');
        $this->db->having('sum(s.frek)>0');
        return $this->db->get()->result_array();
    }

    public function getExpByObatIGD($obat)
    {
        $this->db->select('sum(s.frek) stok, s.kadaluarsa,l.margin,l.harga_cost,l.id_logistik,l.nama,l.ppn');
        $this->db->from('stok_igd s, list_logistik l');
        $this->db->where(' s.id_logistik=l.id_logistik');
        $this->db->where(' s.id_logistik', $obat);
        $this->db->group_by('s.id_stok');
        $this->db->having('sum(s.frek)>0');
        return $this->db->get()->result_array();
    }
    public function getExpByObatRanap($obat)
    {
        $this->db->select('sum(s.frek) stok, s.kadaluarsa,l.margin,l.harga_cost,l.id_logistik,l.nama,l.ppn');
        $this->db->from('stok_depo s, list_logistik l');
        $this->db->where(' s.id_logistik=l.id_logistik');
        $this->db->where(' s.id_logistik', $obat);
        $this->db->group_by('s.id_stok');
        $this->db->having('sum(s.frek)>0');
        return $this->db->get()->row_array();
    }
    public function getSumObatApotik($obat)
    {
        $this->db->select('sum(frek) stok');
        $this->db->from('stok_apotik');
        $this->db->where(' id_logistik', $obat);
        return $this->db->get()->row_array();
    }
    public function getSumObatIgd($obat)
    {
        $this->db->select('sum(frek) stok');
        $this->db->from('stok_igd');
        $this->db->where(' id_logistik', $obat);
        return $this->db->get()->row_array();
    }
    public function getSumObatRanap($obat)
    {
        $this->db->select('sum(frek) stok');
        $this->db->from('stok_depo');
        $this->db->where(' id_logistik', $obat);
        return $this->db->get()->row_array();
    }
    public function countRacikan($id)
    {
        $this->db->select('COUNT(*) total');
        $this->db->from('history_pelayanan h');
        $this->db->where('h.id_pelayanan', $id);
        $this->db->where('h.jenis_pelayanan', 'POLI');
        return $this->db->get()->row();
    }


    //Paien Ranap
    public function selectPasienRanap()
    {
        return $this->db->get('v_ranap_apotik')->result();
    }
    //Riwayat Pasien
    public function selectRiwayatPasien()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->like(' tgl_masuk ', $tgl);
        return $this->db->get('v_riwayat_pasien_apotik')->result();
    }
    public function selectRangeRiwayatPasien($mulai, $akhir)
    {
        $this->db->where('tgl_masuk >=', $mulai);
        $this->db->where('tgl_masuk <=', $akhir);
        return $this->db->get('v_riwayat_pasien_apotik')->result();
    }
    public function selectRiwayatPasienById($id_pelayanan)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_farmasi t, list_logistik l, pelayanan p , staff s, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal desc');
        return $this->db->get()->result();
    }
    public function getTotalTindakanById($id_pelayanan)
    {
        $this->db->select('sum(t.total) total');
        $this->db->from('tindakan_farmasi t, resep_obat r');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function getDataRiwayatById($id_pelayanan, $id_history)
    {
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_history', $id_history);
        return $this->db->get('v_riwayat_pasien_apotik')->row_array();
    }
    public function getRiwayatById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama obat,t.id_cara_pakai');
        $this->db->from('tindakan_farmasi t, list_logistik l, pelayanan p,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('t.frek >=0');
        $this->db->where('r.id_pelayanan', $id_pelayanan);

        return $this->db->get()->result_array();
    }
    //Stok Obat Apotik
    public function selectStokApotik()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok  ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen');
        $this->db->from('stok_apotik a, list_logistik l');
        $this->db->where('a.id_logistik=l.id_logistik');
        $this->db->group_by('a.id_logistik');
        $this->db->order_by('stok');
        return $this->db->get()->result();
    }
    public function selectStokIgd()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok  ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen');
        $this->db->from('stok_igd a, list_logistik l');
        $this->db->where('a.id_logistik=l.id_logistik');
        $this->db->group_by('a.id_logistik');
        $this->db->order_by('stok');
        return $this->db->get()->result();
    }
    public function selectDetailStok($id_logistik)
    {

        $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok ,a.kadaluarsa ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen');
        $this->db->from('stok_apotik a, list_logistik l');
        $this->db->where('a.id_logistik=l.id_logistik');
        $this->db->where('a.id_logistik', $id_logistik);
        $this->db->group_by('a.kadaluarsa');
        $this->db->order_by('stok');


        return $this->db->get()->result();
    }
    public function selectDetailStokIgd($id_logistik)
    {

        $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok ,a.kadaluarsa ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen');
        $this->db->from('stok_igd a, list_logistik l');
        $this->db->where('a.id_logistik=l.id_logistik');
        $this->db->where('a.id_logistik', $id_logistik);
        $this->db->group_by('a.kadaluarsa');
        $this->db->order_by('stok');


        return $this->db->get()->result();
    }
    public function getObatApotik()
    {
        $this->db->select('l.id_logistik,l.nama');
        $this->db->from('list_logistik l');
        $this->db->order_by('l.nama');
        return $this->db->get()->result_array();
    }
    public function getEditObatApotik()
    {
        $hasil = $this->db->query("SELECT l.id_logistik,l.nama,  sum(s.frek) stok
        FROM list_logistik l
        INNER JOIN stok_apotik s 
        on s.id_logistik=l.id_logistik
        GROUP by l.id_logistik
        order by l.nama");
        return $hasil->result_array();
    }
    public function getEditObatIgd()
    {
        $hasil = $this->db->query("SELECT l.id_logistik,l.nama,  sum(s.frek) stok
        FROM list_logistik l
        INNER JOIN stok_igd s 
        on s.id_logistik=l.id_logistik
        GROUP by l.id_logistik
        order by l.nama");
        return $hasil->result_array();
    }
    public function getStokApotik()
    {
        $this->db->select('sum(s.frek) stok, s.kadaluarsa');
        $this->db->from('stok_apotik s, list_logistik l');
        $this->db->where(' s.id_logistik=l.id_logistik');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    // Laporan pasien rajal
    public function selectLaporanPasienRajal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPasienRajal($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.sataun_terkecil tipe,l.produsen, l.standar, l.kode, l.distributor,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }
    public function selectLaporanPasienIgd()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ugd h , pasien ps, dokter d, cara_bayar c,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPasienIgd($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.standar, l.kode, l.distributor,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ugd h , pasien ps, dokter d, cara_bayar c,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }
    // End
    public function selectLaporanPasienRanap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.standar,l.kode, l.distributor,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ranap h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        // $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' t.tanggal ', $tgl);
        $this->db->order_by('ps.nama, t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPasienRanap($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.standar,l.kode, l.distributor,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ranap h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        // $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('t.tanggal  >=', $mulai);
        $this->db->where('t.tanggal  <=', $akhir);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }
    // End


    public function selectLaporanObatRajal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost,l.kode, l.standar, l.distributor, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h, resep_obat r');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_history=h.id_history');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    public function selectRangeLaporanObatRajal($mulai, $akhir)
    {
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, l.kode, l.distributor, l.standar, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h, resep_obat r');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_history=h.id_history');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    public function selectLaporanObatIgd()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost,l.kode, l.standar, l.distributor, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ugd h, resep_obat r');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_history=h.id_history');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }


    public function selectRangeLaporanObatIgd($mulai, $akhir)
    {
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, l.kode, l.distributor, l.standar, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ugd h, resep_obat r');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_history=h.id_history');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    // End


    public function selectLaporanObatRanap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost,l.kode, l.standar, l.distributor, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ranap h, resep_obat r');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_history=h.id_history');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanObatRanap($mulai, $akhir)
    {
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, l.kode, l.distributor, l.standar, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ugd h, resep_obat r');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_history=h.id_history');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    // End

    public function selectLaporanObatEd()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama, l.id_logistik,l.harga_cost, sum(a.frek) stok  ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen,a.kadaluarsa,l.ppn');
        $this->db->from('stok_apotik a, list_logistik l');
        $this->db->where('a.id_logistik=l.id_logistik ');
        $this->db->group_by('a.id_logistik, a.kadaluarsa ');
        $this->db->having('stok>0');
        $this->db->order_by('a.kadaluarsa');
        return $this->db->get()->result();
    }

    public function selectCetakSoApotik()
    {
        return $this->db->get('v_cetak_so_apotik')->result();
    }
    //end

    public function selectCetakSoIgd()
    {
        return $this->db->get('v_cetak_so_igd_apotik')->result();
    }
    //end

    public function selectLaporanPasienRajalSanbe()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where("(l.produsen='SANBE FARMA' )");
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPasienRajalSanbe($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where("(l.produsen='SANBE FARMA' )");
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }
    // End

    public function selectLaporanPasienRanapSanbe()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where("(l.produsen='SANBE FARMA' )");
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->order_by('ps.nama, t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPasienRanapSanbe($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where("(l.produsen='SANBE FARMA' )");
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->order_by('ps.nama, t.tanggal ');
        return $this->db->get()->result();
    }
    public function selectLaporanObatBpjs()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual,l.ppn');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('p.cara_bayar', 'WA14BJ84');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanObatBpjs($mulai, $akhir)
    {
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual,l.ppn');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('p.cara_bayar', 'WA14BJ84');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    // End

    public function selectLaporanObatAsuransi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select(' l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual,l.ppn');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where("(p.cara_bayar='WA14BJ84' or p.cara_bayar!='65AP55')");
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanObatAsuransi($mulai, $akhir)
    {
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual,l.ppn');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where("(p.cara_bayar='WA14BJ84' or p.cara_bayar!='65AP55')");
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    // End

    public function selectLaporanObatPribadi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual,l.ppn');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('p.cara_bayar', '65AP55');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanObatPribadi($mulai, $akhir)
    {
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual,l.ppn');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('p.cara_bayar', '65AP55');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    // End
    // End
    //Antrian
    public function selectCountData()
    {
        $tanggal = date('Y-m-d');
        $this->db->select('count(id_antrian) jumlah');
        $this->db->where_Not_In('status', '2');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_farmasi')->row_array();
    }
    public function getAntrian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        $this->db->select('a.*, p.nama,c.nama cara_bayar,p.no_rm ');
        $this->db->from('antrian_farmasi a, pelayanan pel, pasien p, cara_bayar c  ');
        $this->db->where('p.no_rm=pel.id_pasien');
        $this->db->where('c.id_cara_bayar=pel.cara_bayar');
        $this->db->where('a.id_pelayanan=pel.id_pelayanan');
        $this->db->like('tanggal', $tanggal);
        $this->db->where_Not_In('a.status', '2');
        $this->db->order_by('a.status');
        $this->db->order_by('a.no_antri');
        return $this->db->get()->row_array();
    }
    public function selectAntrian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        $this->db->select('a.*, p.nama,c.nama cara_bayar,p.no_rm ');
        $this->db->from('antrian_farmasi a, pelayanan pel, pasien p, cara_bayar c  ');
        $this->db->where('p.no_rm=pel.id_pasien');
        $this->db->where('c.id_cara_bayar=pel.cara_bayar');
        $this->db->where('a.id_pelayanan=pel.id_pelayanan');
        $this->db->like('tanggal', $tanggal);
        $this->db->where_Not_In('a.status', '2');
        $this->db->order_by('a.status');
        $this->db->order_by('a.no_antri');
        return $this->db->get()->result();
    }
    public function insertplaySuara($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function updateskip($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function updatenext($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function selectPlay()
    {
        return $this->db->get('temp_antrian_farmasi')->row_array();
    }

    public function deleteplaySuara()
    {
        $this->db->limit(1);
        $this->db->empty_Table('temp_antrian_farmasi');
    }

    public function umum()
    {
        $tanggal = date('Y-m-d');
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('jenis', 'umum');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_rm')->row_array();
    }
    public function delete_obat($id_tindakan, $stok)
    {
        $this->db->delete('tindakan_farmasi', array('id_tindakan_farmasi' => $id_tindakan));

        $this->db->delete($stok, array('id_req' => $id_tindakan));
        // $sql = "DELETE s.* from stok_apotik s , tindakan_farmasi f  WHERE s.id_req = f.id_tindakan_farmasi and s.id_req=?";
        // $this->db->query($sql, array($id_tindakan));
    }
    public function delete_tindakan($id, $table, $where)
    {
        $this->db->delete($table, array($where => $id));
    }
 public function selectDataPasien($tipe)
    {
        if ($tipe == 'INTERNIS') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status status_kasir  
            FROM v_pasien_internis v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history 
           
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'OBGYNE') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status status_kasir 
            FROM v_pasien_obgyne v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'THT') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_tht v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'MATA') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_mata v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'KULIT DAN KELAMIN') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_kulit v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'UMUM') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_umum v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'ANAK') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_anak v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'GIGI') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_gigi v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'JANTUNG') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_jantung v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'BEDAH') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_bedah v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'FISIO') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_fisio v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        }
    }
    function update_perencanaan($id_logistik,$stok,$table){
        $tgl = date('Y-m-d H:i:s');
        $d_stok = $this->db->query("SELECT sum(frek) stok from $stok where id_logistik ='$id_logistik'")->row();
        $d_penggunaan = $this->db->query("SELECT sum(frek) stok from $stok where asal_tujuan = 'PENJUALAN' and id_logistik ='$id_logistik'")->row();

        $this->M_Apotik->update(['stok_tersedia' => $d_stok->stok, 'penggunaan' => $d_penggunaan->stok, 'tanggal_update'=>$tgl], ['id_logistik' => $id_logistik], $table);
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
