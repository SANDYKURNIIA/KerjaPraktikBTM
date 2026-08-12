<?php

class M_Radiologi extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }
    public function update($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    ///////////////////////////////////////////////////  Ranap
    public function selectDataPasienRanap()
    {
        $this->db->where('status', '1');
        $this->db->where('status_radiologi', '1');
        $this->db->from('v_ranap_radiologi');
        return $this->db->get()->result();
    }

    public function selectDataby_id($id_pelayanan, $id_history)
    {
        $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
        $this->db->from('v_pasien_ranap', 'history_pelayanan');
        return $this->db->get()->result();
    }

    public function selectNamaRadiologi()
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', 'KELAS III');
        $this->db->from('list_tindakan_radiologi');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    public function selectNamaRadiologiMcu()
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', 'KELAS III');
        $this->db->from('list_tindakan_radiologi_mcu');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    public function insert_tindakan($alldata, $table)
    {
        $this->db->insert($table, $alldata);
    }

    public function delete_radiologi($id_tindakan_radiologi)
    {
        $this->db->where('id_tindakan_radiologi', $id_tindakan_radiologi);
        $this->db->delete('tindakan_radiologi');
    }


    ///////////////////////////////////////////////////  Rajal
    public function selectDataPasienRawatJalan()
    {
        $this->db->where('status', '1');
        $this->db->where('status_radiologi', '1');
        $this->db->where('expertise ', '');
        $this->db->from('v_rawat_jalan_radiologi');
        return $this->db->get()->result();
    }
    public function selectDataPasienRajalPulang()
    {
        $tgl = date("Y-m-d");
        $this->db->where('status', '1');
        $this->db->where('status_radiologi', '1');
        $this->db->from('v_rajal_rad_pulang');
        $this->db->like('tgl_masuk', $tgl);
        return $this->db->get()->result();
    }
    public function selectDataRadiologiALLbyid($id_pelayanan, $id_history)
    {
        $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
        $this->db->from('v_rawat_jalan_radiologi');
        return $this->db->get()->result();
    }
    public function selectDataRadiologiALLbyid1($id_pelayanan, $id_history)
    {
        $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
        $this->db->from('v_kunjungan');
        return $this->db->get()->result();
    }

    //mcu
    public function selectDataLaborMcuById($id_mcu)
    {
        $this->db->select('t.*, l.nama, p.nama_pasien,p.no_rm,p.tgl_lahir, s.nama staff');
        $this->db->from('tindakan_radiologi_mcu t, list_tindakan_radiologi_mcu l, mcu p, staff s');
        $this->db->where('t.id_daftar_tindakan=l.id_daftar_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_mcu=t.id_mcu');
        $this->db->where('t.id_mcu', $id_mcu);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function selectRadiologiMcuById($id_pelayanan)
    {
        $staff = $this->session->userdata('data_auth');

        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_radiologi_mcu t, list_tindakan_radiologi_mcu l, mcu p, staff s');
        $this->db->where('t.id_daftar_tindakan=l.id_daftar_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_mcu=t.id_mcu');
        $this->db->where('t.id_mcu', $id_pelayanan);
        $this->db->where('t.keterangan', "");
        if ($staff->tipe == 'expertise' || $staff->tipe == 'direktur') {
            $this->db->where('t.ket', 1);
        } 
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function update_tindakan_radiologi($id_pel_rad, $id_tindakan_radiologi, $alldata)
    {
        $this->db->where('id_pelayanan', $id_pel_rad);
        $this->db->where('id_tindakan_radiologi', $id_tindakan_radiologi);
        $this->db->update('tindakan_radiologi', $alldata);
    }

    public function selectRadiologiById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p, staff s');
        $this->db->where('t.id_tindakan=l.id_daftar_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->where('t.ket !=1');
        $this->db->where('t.keterangan = ""');
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }
    public function selectRadiologiById1($id_pelayanan)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p, staff s');
        $this->db->where('t.id_tindakan=l.id_daftar_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        // $this->db->where('t.ket !=2');

        $this->db->order_by('t.tanggal', 'desc');
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

    public function selectPindahData($id_pelayanan, $id_tindakan)
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

    public function selectDataMcuFormById($id_mcu, $id_tindakan)
    {
        $this->db->select('t.*, l.nama');
        $this->db->from('tindakan_radiologi_mcu t, list_tindakan_radiologi_mcu l, mcu p');
        $this->db->where('t.id_daftar_tindakan=l.id_daftar_tindakan');
        $this->db->where('p.id_mcu=t.id_mcu');
        $this->db->where('t.id_mcu', $id_mcu);
        $this->db->where('t.id_tindakan_radiologi', $id_tindakan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }
    public function Total_RadiologiMcu_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_radiologi_mcu');
        $this->db->where('id_mcu', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function Total_Radiologi_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_radiologi');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    // Dokter
    public function getDokter()
    {
        $this->db->select('nama,id_dokter');
        $this->db->where('status', 'AKTIF');
        $this->db->group_by('nama,id_dokter');
        $this->db->order_by('nama');
        return $this->db->get('dokter')->result_array();
    }

    // Amirul USG21
    public function getDokter2()
    {
        $this->db->select('nama,id_dokter');
        $this->db->where('status', 'AKTIF');
        $this->db->group_by('nama,id_dokter');
        $this->db->order_by('nama');
        return $this->db->get('dokter')->result_array();
    }
    public function selectNamaRadiologi2()
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', 'KELAS III');
        $this->db->from('list_tindakan_radiologi');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    public function selectDataPasienUsg2()
    {
        return $this->db->query("SELECT v.*,max(t.tanggal) tanggal,t.diagnosa
        from v_kunjungan v, tindakan_radiologi t, list_tindakan_radiologi l
        where v.id_pelayanan = t.id_pelayanan and t.id_tindakan = l.id_daftar_tindakan 
        and l.nama like '%usg%' and t.status_radiologi = 1 and t.ket = 1 and v.status_rawat != 'selesai'
        group by v.id_pelayanan order by v.tgl_masuk desc")->result();
    }

    public function selectRiwayatRadiologi()
    {
        return $this->db->query("SELECT v.*,max(t.tanggal) tanggal,t.diagnosa
        from v_kunjungan v, tindakan_radiologi t, list_tindakan_radiologi l
        where v.id_pelayanan = t.id_pelayanan and t.id_tindakan = l.id_daftar_tindakan 
        and l.nama like '%usg%' and t.keterangan = 1 and v.status_rawat != 'selesai'
        group by v.id_pelayanan order by v.tgl_masuk desc")->result();
    }

    public function select_Riwayat_radiologi_USG()
    {
        return $this->db->query("SELECT v.*,max(t.tanggal) tanggal,t.diagnosa
        from v_kunjungan v, tindakan_radiologi t, list_tindakan_radiologi l
        where v.id_pelayanan = t.id_pelayanan and t.id_tindakan = l.id_daftar_tindakan 
        and l.nama like '%usg%' and t.keterangan = 1 and v.status_rawat != 'selesai'
        group by v.id_pelayanan order by v.tgl_masuk desc")->result();
    }

    public function select_Riwayat_radiologi_CT()
    {
        return $this->db->query("SELECT v.*,max(t.tanggal) tanggal,t.diagnosa
        from v_kunjungan v, tindakan_radiologi t, list_tindakan_radiologi l
        where v.id_pelayanan = t.id_pelayanan and t.id_tindakan = l.id_daftar_tindakan 
        and l.nama like '%usg%' and t.keterangan = 1  and v.status_rawat != 'selesai'
        group by v.id_pelayanan order by v.tgl_masuk desc")->result();
    }

    public function select_Riwayat_radiologi_RONTGEN()
    {
        return $this->db->query("SELECT v.*,max(t.tanggal) tanggal,t.diagnosa
        from v_kunjungan v, tindakan_radiologi t, list_tindakan_radiologi l
        where v.id_pelayanan = t.id_pelayanan and t.id_tindakan = l.id_daftar_tindakan 
        and l.nama like '%usg%' and t.keterangan = 1  and v.status_rawat != 'selesai'
        group by v.id_pelayanan order by v.tgl_masuk desc")->result();
    }


    // public function selectDataRadiologiALLbyid12($id_pelayanan, $id_history)
    // {
    //     $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
    //     $this->db->from('v_kunjungan');
    //     return $this->db->get()->result();
    // }

    // public function selectDataRadiologiALLbyid12($id_pelayanan, $id_history)
    // {
    //     $this->db->select('v_kunjungan.*, pelayanan.no_sep'); // Pastikan no_sep disertakan
    //     $this->db->from('v_kunjungan');
    //     $this->db->join('pelayanan', 'pelayanan.id_pelayanan = v_kunjungan.id_pelayanan', 'inner');
    //     $this->db->where(array('v_kunjungan.id_pelayanan' => $id_pelayanan, 'v_kunjungan.id_history' => $id_history));
    //     return $this->db->get()->result();
    // }

    public function selectDataRadiologiALLbyid12($id_pelayanan)
    {
        $this->db->select('v.*,p.no_sep');
        $this->db->from('pelayanan p,v_kunjungan v');
        $this->db->where('p.id_pelayanan = v.id_pelayanan');
        $this->db->where('p.id_pelayanan', $id_pelayanan);
        $this->db->where('v.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function get_expertise($nama_poli)
    {
        $this->db->select('lp.id_list_poli');
        $this->db->from('table_expertise te,list_poli lp');
        $this->db->where('te.id_expertise = lp.no_urut');
        $this->db->where('nama_poli', $nama_poli);
        return $this->db->get()->row();
    }





    public function selectRadiologiById2($id_pelayanan)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p, staff s');
        $this->db->where('t.id_tindakan=l.id_daftar_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->where('t.ket !=0');
        $this->db->where('t.keterangan != 2');
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }
    // End Amirul USG21

    // CT22
    public function selectDataPasienCT2()
    {
        return $this->db->query("SELECT v.*,max(t.tanggal) tanggal,t.diagnosa
        from v_kunjungan v, tindakan_radiologi t, list_tindakan_radiologi l
        where v.id_pelayanan = t.id_pelayanan and t.id_tindakan = l.id_daftar_tindakan  
        and l.nama like 'ct%' and t.status_radiologi = 1 and t.ket = 1
        group by v.id_pelayanan order by v.tgl_masuk desc")->result();
    }
    // End CT22

    // Rontgen23
    public function selectDataPasienRontgen2()
    {
        return $this->db->query("SELECT v.*,max(t.tanggal) tanggal,t.diagnosa
        from v_kunjungan v, tindakan_radiologi t, list_tindakan_radiologi l
        where v.id_pelayanan = t.id_pelayanan and t.id_tindakan = l.id_daftar_tindakan  
        and (l.nama not like 'ct%' and l.nama not like '%usg%') and t.status_radiologi = 1 and t.ket = 1 and  v.status_rawat != 'selesai'
        group by v.id_pelayanan order by v.tgl_masuk desc")->result();
    }
    // End Rontgen23

    public function update_radiologi($inPelayanan, $inTindakan, $alldata = array())
    {
        $this->db->where('id_pelayanan', $inPelayanan);
        $this->db->where('id_tindakan_radiologi', $inTindakan);
        $this->db->update('tindakan_radiologi', $alldata);
    }

    public function update_radiologi_mcu($inPelayanan, $inTindakan, $alldata = array())
    {
        $this->db->where('id_mcu', $inPelayanan);
        $this->db->where('id_tindakan_radiologi', $inTindakan);
        $this->db->update('tindakan_radiologi_mcu', $alldata);
    }


    public function getRadiologiById($id_pelayanan, $id_tindakan_radiologi)
    {
        $this->db->select('t.*, l.nama');
        $this->db->from('tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p');
        $this->db->where('t.id_tindakan=l.id_daftar_tindakan');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->where('t.id_tindakan_radiologi', $id_tindakan_radiologi);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    //Riwayat Pasien
    public function selectDataRiwayatRadiologi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.nama_poli,h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar, pl.nama poli 
        FROM pasien p, pelayanan b, history_pelayanan h, cara_bayar c, list_poli pl, dokter dok, tindakan_radiologi t 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and t.id_pelayanan = b.id_pelayanan
        AND pl.id_list_poli=h.nama_poli and h.dpjp=dok.id_dokter and h.jenis_pelayanan='POLI' and (b.status_rawat='selesai' or t.keterangan=1 or t.ket=1)
        and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%'
        and b.tgl_masuk like '$tgl%'
        UNION 
        SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,'-' as '-',h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,'-' 
        FROM pasien p, pelayanan b, history_pelayanan_ugd h, cara_bayar c , dokter dok, tindakan_radiologi t
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and t.id_pelayanan = b.id_pelayanan
        and h.dpjp=dok.id_dokter and h.jenis_pelayanan='UGD'  and (b.status_rawat='selesai' or t.keterangan=1 or t.ket=1)
        and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%'
        and b.tgl_masuk like '$tgl%'
        UNION
        SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli 
        FROM pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok , tindakan_radiologi t 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and t.id_pelayanan = b.id_pelayanan
        and r.id_ruangan=h.id_kamar and h.dpjp=dok.id_dokter and h.jenis_pelayanan='RAWAT INAP' and (b.status_rawat='selesai' or t.keterangan=1 or t.ket=1)
        and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%'
        and b.tgl_masuk like '$tgl%'
         
        ORDER by tgl_masuk desc ");
        return $hasil->result();
    }

    public function selectDataRiwayatRadiologiRange($mulai, $akhir)
    {
        $hasil = $this->db->query("SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.nama_poli,h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar, pl.nama poli 
        FROM pasien p, pelayanan b, history_pelayanan h, cara_bayar c, list_poli pl, dokter dok  , tindakan_radiologi t 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar  and t.id_pelayanan = b.id_pelayanan
        AND pl.id_list_poli=h.nama_poli and h.dpjp=dok.id_dokter and h.jenis_pelayanan='POLI' and (b.status_rawat='selesai' or t.keterangan=1 or t.ket=1)
          and b.tgl_masuk >= '$mulai' and b.tgl_masuk <= '$akhir' and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%'
        UNION 
        SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,'-' as '-',h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,'-' 
        FROM pasien p, pelayanan b, history_pelayanan_ugd h, cara_bayar c , dokter dok , tindakan_radiologi t 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and t.id_pelayanan = b.id_pelayanan
        and h.dpjp=dok.id_dokter and h.jenis_pelayanan='UGD'  and (b.status_rawat='selesai' or t.keterangan=1 or t.ket=1)
          and b.tgl_masuk >= '$mulai' and b.tgl_masuk <= '$akhir' and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%'
        UNION
        SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli 
        FROM pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok  , tindakan_radiologi t 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and t.id_pelayanan = b.id_pelayanan
         and r.id_ruangan=h.id_kamar and h.dpjp=dok.id_dokter and h.jenis_pelayanan='RAWAT INAP' and (b.status_rawat='selesai' or t.keterangan=1 or t.ket=1)
          and b.tgl_masuk >= '$mulai' and b.tgl_masuk <= '$akhir' and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%'
        
        ORDER by tgl_masuk desc  ");
        return $hasil->result();
    }

    // Laporan Radiologi
    public function selectDataLaporanRadiologi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT pas.nama, '' no_foto ,pas.no_rm, r.nama caraBayar, l.nama tindakan,t.harga, t.frek, t.tanggal, t.total,t.dokter,date(pas.tgl_lahir) tgl_lahir, (YEAR(CURDATE())-YEAR(pas.tgl_lahir)) umur, r.jenis, 'RJ' as status, 'UGD' unit_kirim, time(t.tanggal) jam_daftar, s.nama staff
        FROM pelayanan p, pasien pas, cara_bayar r, tindakan_radiologi t, list_tindakan_radiologi l, history_pelayanan_ugd h, staff s
        WHERE l.id_daftar_tindakan=t.id_tindakan and h.id_pelayanan=p.id_pelayanan and h.id_history=t.poli and s.id_staff=t.id_staff and r.id_cara_bayar=p.cara_bayar and pas.no_rm=p.id_pasien and t.tanggal like '%$tgl%'
        UNION ALL
        SELECT pas.nama, '' no_foto ,pas.no_rm, r.nama caraBayar, l.nama tindakan,t.harga, t.frek, t.tanggal, t.total, t.dokter,date(pas.tgl_lahir) tgl_lahir, (YEAR(CURDATE())-YEAR(pas.tgl_lahir)) umur, r.jenis, 'RI' as status, ru.nama_ruangan unit_kirim, time(t.tanggal) jam_daftar, s.nama staff
        FROM pelayanan p, pasien pas, cara_bayar r, tindakan_radiologi t, list_tindakan_radiologi l, history_pelayanan_ranap h, ruangan ru, staff s
        WHERE l.id_daftar_tindakan=t.id_tindakan and h.id_history=t.poli and r.id_cara_bayar=p.cara_bayar and s.id_staff=t.id_staff and pas.no_rm=p.id_pasien and h.id_pelayanan=p.id_pelayanan and ru.id_ruangan=h.id_kamar and t.tanggal like '%$tgl%'
        UNION ALL
        SELECT pas.nama, '' no_foto ,pas.no_rm, r.nama caraBayar, l.nama tindakan,t.harga, t.frek, t.tanggal, t.total, t.dokter,date(pas.tgl_lahir) tgl_lahir, (YEAR(CURDATE())-YEAR(pas.tgl_lahir)) umur, r.jenis, 'RJ' as status, lp.nama_panjang unit_kirim,time(t.tanggal) jam_daftar, s.nama staff
        FROM pelayanan p, pasien pas, cara_bayar r, tindakan_radiologi t, list_tindakan_radiologi l, history_pelayanan h, list_poli lp, staff s
        WHERE l.id_daftar_tindakan=t.id_tindakan and h.id_history=t.poli and r.id_cara_bayar=p.cara_bayar and s.id_staff=t.id_staff and pas.no_rm=p.id_pasien and h.id_pelayanan=p.id_pelayanan and lp.id_list_poli=h.nama_poli and t.tanggal like '%$tgl%'
        order by tanggal desc");
        return $hasil->result();
    }

    public function selectDataRangeLaporanRadiologi($mulai, $akhir)
    {
        $hasil = $this->db->query("SELECT pas.nama, '' no_foto ,pas.no_rm, r.nama caraBayar, l.nama tindakan,t.harga, t.frek, t.tanggal, t.total,t.dokter,date(pas.tgl_lahir) tgl_lahir, (YEAR(CURDATE())-YEAR(pas.tgl_lahir)) umur, r.jenis, 'RJ' as status, 'UGD' unit_kirim, time(t.tanggal) jam_daftar, s.nama staff
        FROM pelayanan p, pasien pas, cara_bayar r, tindakan_radiologi t, list_tindakan_radiologi l, history_pelayanan_ugd h, staff s
        WHERE l.id_daftar_tindakan=t.id_tindakan and h.id_pelayanan=p.id_pelayanan and h.id_history=t.poli and s.id_staff=t.id_staff and r.id_cara_bayar=p.cara_bayar and pas.no_rm=p.id_pasien and t.tanggal >= '$mulai' and t.tanggal <= '$akhir'
        UNION ALL
        SELECT pas.nama, '' no_foto ,pas.no_rm, r.nama caraBayar, l.nama tindakan,t.harga, t.frek, t.tanggal, t.total, t.dokter,date(pas.tgl_lahir) tgl_lahir, (YEAR(CURDATE())-YEAR(pas.tgl_lahir)) umur, r.jenis, 'RI' as status, ru.nama_ruangan unit_kirim, time(t.tanggal) jam_daftar, s.nama staff
        FROM pelayanan p, pasien pas, cara_bayar r, tindakan_radiologi t, list_tindakan_radiologi l, history_pelayanan_ranap h, ruangan ru, staff s
        WHERE l.id_daftar_tindakan=t.id_tindakan and h.id_history=t.poli and r.id_cara_bayar=p.cara_bayar and s.id_staff=t.id_staff and pas.no_rm=p.id_pasien and h.id_pelayanan=p.id_pelayanan and ru.id_ruangan=h.id_kamar and t.tanggal >= '$mulai' and t.tanggal <= '$akhir'
        UNION ALL
        SELECT pas.nama, '' no_foto ,pas.no_rm, r.nama caraBayar, l.nama tindakan,t.harga, t.frek, t.tanggal, t.total, t.dokter,date(pas.tgl_lahir) tgl_lahir, (YEAR(CURDATE())-YEAR(pas.tgl_lahir)) umur, r.jenis, 'RJ' as status, lp.nama_panjang unit_kirim,time(t.tanggal) jam_daftar, s.nama staff
        FROM pelayanan p, pasien pas, cara_bayar r, tindakan_radiologi t, list_tindakan_radiologi l, history_pelayanan h, list_poli lp, staff s
        WHERE l.id_daftar_tindakan=t.id_tindakan and h.id_history=t.poli and r.id_cara_bayar=p.cara_bayar and s.id_staff=t.id_staff and pas.no_rm=p.id_pasien and h.id_pelayanan=p.id_pelayanan and lp.id_list_poli=h.nama_poli and t.tanggal >= '$mulai' and t.tanggal <= '$akhir'
        order by tanggal desc");
        return $hasil->result();
    }

    // Laporan Tindakan Radiologi
    public function selectDataLaporanTindakanRadiologi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(l.id_daftar_tindakan) jml, sum(t.total) total, l.nama tindakan');
        $this->db->from('pelayanan p, pasien pas, cara_bayar r, tindakan_radiologi t, list_tindakan_radiologi l');
        $this->db->where('l.id_daftar_tindakan=t.id_tindakan');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('r.id_cara_bayar=p.cara_bayar');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->like('t.tanggal', $tgl);
        $this->db->group_by('l.nama');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectDataRangeLaporanTindakanRadiologi($mulai, $akhir)
    {
        $this->db->select('count(l.id_daftar_tindakan) jml, sum(t.total) total, l.nama tindakan');
        $this->db->from('pelayanan p, pasien pas, cara_bayar r, tindakan_radiologi t, list_tindakan_radiologi l');
        $this->db->where('l.id_daftar_tindakan=t.id_tindakan');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('r.id_cara_bayar=p.cara_bayar');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->where('t.tanggal >= ', $mulai);
        $this->db->where('t.tanggal <= ', $akhir);
        $this->db->group_by('l.nama');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    /////PASIEN RADIOLOGI SENDIRI
    public function selectDataPasienRadiologi()
    {
        $query = $this->db->query("SELECT v.*  
            FROM v_pasien_radiologi v, tindakan_radiologi t
            where v.id_pelayanan = t.id_pelayanan
            group by v.id_pelayanan
            order by v.tgl_masuk desc");
        return $query->result();
    }

    //Pasien MCU
    public function selectDataPasienMcu()
    {
        $data = $this->session->userdata('data_auth');

        $builder = $this->db->from('mcu m');
        $builder->select('m.*');
        $builder->join('tindakan_radiologi_mcu t', 'm.id_mcu = t.id_mcu');
        if ($data->tipe == 'direktur' || $data->tipe == 'expertise') {
            $builder->where('t.ket', 1);
        } else {
            $builder->where('t.ket', 0);
        }
        $builder->where('t.keterangan', '');
        $builder->where('t.status_radiologi', 1);
        $builder->where('m.status_rawat', 0);
        $builder->order_by('t.tanggal', 'desc');
        $query = $builder->get();
        return $query->result();
    }

    public function selectDataPasienRadiologiRM()
    {
        $query = $this->db->query("SELECT v.*, r.status status_kasir  
            FROM v_pasien_radiologi v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history 
           
            order by v.tgl_masuk desc");
        return $query->result();
    }


    /////POLI PRIORITAS
    public function selectDataPoliPrioritas()
    {

        $this->db->where('status_radiologi', '1');
        $this->db->where('expertise', '');
        $this->db->from('v_radiologi_prioritas');
        return $this->db->get()->result();
    }

    public function selectDataPoliPrioritasALLbyid($id_pelayanan, $id_history)
    {
        $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
        $this->db->from('v_radiologi_prioritas');
        return $this->db->get()->result();
    }

    public function update_radiologi_prioritas($inPelayanan, $inTindakan, $alldata = array())
    {
        $this->db->where('id_pelayanan', $inPelayanan);
        $this->db->where('id_tindakan_radiologi', $inTindakan);
        $this->db->update('tindakan_radiologi_pp', $alldata);
    }

    public function selectPoliPrioritasById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_radiologi_pp t, list_tindakan_radiologi_prioritas l, pelayanan p, staff s');
        $this->db->where('t.id_daftar_tindakan=l.id_daftar_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->where('t.ket !=2');
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function selectDataPrioritasFormById($id_pelayanan, $id_tindakan)
    {
        $this->db->select('t.*, l.nama');
        $this->db->from('tindakan_radiologi_pp t, list_tindakan_radiologi_prioritas l, pelayanan p');
        $this->db->where('t.id_daftar_tindakan=l.id_daftar_tindakan');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->where('t.id_tindakan_radiologi', $id_tindakan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function Total_Radiologi_PoliPrioritas_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_radiologi_pp');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function delete_radiologi_prioritas($id_tindakan_radiologi)
    {
        $this->db->where('id_tindakan_radiologi', $id_tindakan_radiologi);
        $this->db->delete('tindakan_radiologi_pp');
    }


    public function selectRangeJmlRadiologi($tindakan, $mulai, $akhir)
    {
        $tgl = date("Y-m-d");
        $this->db->select('l.nama tindakan ');
        $this->db->from('tindakan_radiologi t, list_tindakan_radiologi l');
        $this->db->where(' l.id_daftar_tindakan=t.id_tindakan');
        if ($tindakan == 'USG') {
            $this->db->like('l.nama', 'usg');
        } else if ($tindakan == 'CT SCAN') {
            $this->db->like('l.nama', 'ct');
        } else {
            $this->db->not_like('l.nama', 'usg');
            $this->db->not_like('l.nama', 'ct');
        }
        $this->db->where('t.tanggal>=', $mulai);
        $this->db->where('t.tanggal<=', $akhir);
        $this->db->group_by('l.nama');
        return $this->db->get()->result();
    }

    public function getJumlahPasienByCBRange($id_tindakan, $jenis, $first_date, $second_date)
    {

        $this->db->select('SUM(t.frek) total');
        $this->db->from('pelayanan p, tindakan_radiologi t, cara_bayar c, list_tindakan_radiologi l');
        $this->db->where('l.id_daftar_tindakan=t.id_tindakan');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('p.cara_bayar=c.id_cara_bayar');
        $this->db->where('l.nama', $id_tindakan);
        $this->db->where('c.jenis', $jenis);
        $this->db->where("t.tanggal BETWEEN '$first_date' AND '$second_date'");
        return $this->db->get()->row();
    }
    public function selectDataPasienUsg()
    {
        return $this->db->query("SELECT v.*,max(t.tanggal) tanggal,t.diagnosa
        from v_kunjungan v, tindakan_radiologi t, list_tindakan_radiologi l
        where v.id_pelayanan = t.id_pelayanan and t.id_tindakan = l.id_daftar_tindakan 
        and l.nama like '%usg%' and t.status_radiologi = 1 and (t.ket = 0) and v.status_rawat != 'selesai'
        group by v.id_pelayanan order by v.tgl_masuk desc")->result();
    }
    public function selectDataPasienCT()
    {
        return $this->db->query("SELECT v.*,max(t.tanggal) tanggal,t.diagnosa
        from v_kunjungan v, tindakan_radiologi t, list_tindakan_radiologi l
        where v.id_pelayanan = t.id_pelayanan and t.id_tindakan = l.id_daftar_tindakan  
        and l.nama like 'ct%' and t.status_radiologi = 1 and (t.ket = 0) and v.status_rawat != 'selesai'
        group by v.id_pelayanan order by v.tgl_masuk desc")->result();
    }


    public function selectRangeDataPasienRontgen($mulai, $akhir)
    {
        return $this->db->query("SELECT v.id_pelayanan, v.id_history,v.tgl_masuk,v.tgl_lahir,v.no_rm,v.nama,v.jenis_kelamin,v.jenis_pelayanan,v.poli,v.nama_dokter,v.cara_bayar,max(t.tanggal) tanggal,t.diagnosa
        from v_kunjungan v, tindakan_radiologi t, list_tindakan_radiologi l
        where v.id_pelayanan = t.id_pelayanan and t.id_tindakan = l.id_daftar_tindakan  
        and t.poli = v.id_history
        and (l.nama not like 'ct%' and l.nama not like '%usg%') 
        and t.status_radiologi = 1 and (t.ket = 0) and (date(t.tanggal) between '$mulai' and '$akhir') and v.status_rawat != 'selesai'
        group by v.id_pelayanan order by v.tgl_masuk desc")->result();
    }
}
