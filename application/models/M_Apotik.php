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

    public function selectRangePasienRajal($mulai, $akhir) //poli
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->order_by('tanggal desc');
        $this->db->group_by('id_history');
        if ($mulai != '' && $akhir != '') {
            $this->db->where(' tanggal >= ', $mulai);
            $this->db->where(' tanggal <=', $akhir);
        } else { 
            $this->db->like(' tanggal ', $tgl);
        }

        return $this->db->get('v_rajal_apotik')->result();
    }
 public function selectPasienIgd() //igd
{
    $query =  $this->db->query("
        SELECT 
            b.id_pelayanan,
            h.id_history,
            c.id_cara_bayar,
            '-' AS nama_poli,
            h.tgl_masuk,
            p.no_rm,
            p.nama,
            p.jenis_kelamin,
            p.tgl_lahir,
            p.agama,
            h.jenis_pelayanan,
            dok.nama nama_dokter,
            b.no_sep,
            b.diagnosa,
            c.nama AS cara_bayar,
            '-' AS poli,
            b.keterangan,
            b.tipe,
            p.alamat,
            r.tgl_req tanggal,
            p.kode AS kode_pasien   -- ✅ tambahkan ini
        FROM pasien p 
        JOIN pelayanan b ON p.no_rm = b.id_pasien
        JOIN history_pelayanan_ugd h ON h.id_pelayanan = b.id_pelayanan
        JOIN cara_bayar c ON c.id_cara_bayar = b.cara_bayar
        JOIN dokter dok ON h.dpjp = dok.id_dokter
        JOIN resep_obat r ON b.id_pelayanan = r.id_pelayanan AND h.id_history = r.id_history
        WHERE 
            (b.status_rawat = 'dirawat' OR b.status_rawat = 'dikembalikan')
            AND b.status = 1
            AND r.status = 1
            AND h.status = 1
    ");
    return $query->result();
}

    public function selectObatBebas($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        if ($perequest == "apotik") {
            $stok = "APOTIK";
        } else if ($perequest == "deporanap") {
            $stok = "DEPO RANAP";
        }

        $this->db->select('o.*, c.nama carabayar');
        $this->db->from('obat_bebas o, cara_bayar c');
        $this->db->where('o.cara_bayar = c.id_cara_bayar');
        if ($perequest == "apotik" && $perequest == "deporanap") {
            $this->db->where('o.unit', $stok);
        }
        if ($mulai != '' && $akhir != '') {
            $this->db->where('tanggal >=', $mulai);
            $this->db->where('tanggal <=', $akhir);
        } else {
            $this->db->like(' tanggal ', $tgl);
        }
        $this->db->order_by('tanggal desc');
        return $this->db->get()->result();
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
        $this->db->select('r.*, p.cara_bayar,s.nama');
        $this->db->from('resep_obat r, pelayanan p,staff s');
        $this->db->where('r.id_pelayanan = p.id_pelayanan');
        $this->db->where('r.id_staff = s.id_staff');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        $this->db->where('r.id_history', $id_history);
        $this->db->where('r.status = 1');
        $this->db->where('r.jenis_resep != 4');
        // $this->db->where('r.jenis_resep != 0');
        $this->db->order_by('r.tanggal desc');
        return $this->db->get()->result();
    }
    public function selectObatByResep($id_resep)
    {
        $this->db->select('t.*, l.nama,l.ppn, s.nama staff, si.tindakan,r.jenis_resep ');
        $this->db->from('resep_obat r, tindakan_farmasi t, list_logistik l , staff s, signa_obat si');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('t.id_signa = si.id_signa');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }

    //yohanes1
// ambil data pasien by kode (masih perlu karena dipanggil di controller)
// ambil data pasien by kode (masih perlu karena dipanggil di controller)
public function getPasienByKode($kode_pasien)
{
    return $this->db->get_where('pasien', ['kode' => $kode_pasien])->row_array();
}

// ambil data edukasi pasien berdasarkan no_rm (hanya 1 terakhir)
public function getEdukasiByNoRMHistory($no_rm, $id_history)
{
    return $this->db
        ->get_where('topik_edukasi_ugd', [
            'no_rm' => $no_rm,
            'id_history' => $id_history
        ])->row_array();
}



// insert atau update data edukasi (pakai no_rm)
public function saveOrUpdateEdukasiByHistory($data)
{
    $cek = $this->db->get_where('topik_edukasi_ugd', [
        'no_rm' => $data['no_rm'],
        'id_history' => $data['id_history']
    ])->row();

    if ($cek) {
        $this->db->where('id_edukasi', $cek->id_edukasi);
        return $this->db->update('topik_edukasi_ugd', $data);
    } else {
        return $this->db->insert('topik_edukasi_ugd', $data);
    }
}



    public function selectObatByResep_kronis($id_resep)
    {
        $this->db->select('t.*, l.nama, s.nama staff, si.tindakan,r.jenis_resep ');
        $this->db->from('resep_obat r, tindakan_farmasi_kronis t, list_logistik l , staff s, signa_obat si');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('t.id_signa = si.id_signa');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->where('l.status', 'AKTIF');
        $this->db->where('t.tgl_acc', null);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function selectObatBebasById($id)
    {
        $this->db->select('t.*, l.nama, s.nama staff, si.tindakan signa,c.cara_pemakaian');
        $this->db->from('obat_bebas o, tindakan_farmasi t, list_logistik l , staff s, signa_obat si, cara_pemakaian_obat c');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_signa=si.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_pelayanan = o.id_obat_bebas');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.frek>0');
        $this->db->where('t.id_resep', 'obat_bebas');
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
    public function update_selesai($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function update_selesai_sgt($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function update_done($data, $where, $table)
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
        $this->db->select('pas.nama,pas.no_rm, p.tgl_masuk, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat,  pas.tgl_lahir,s.tindakan id_signa, c.cara_pemakaian id_cara_pakai');
        $this->db->from('pasien pas, pelayanan p, tindakan_farmasi f,  list_logistik l ,  resep_obat r,signa_obat s, cara_pemakaian_obat c');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('r.id_resep=f.id_resep');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_signa=s.id_signa');
        $this->db->where('f.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('f.id_tindakan_farmasi', $id_tindakan);

        return $this->db->get()->row_array();
    }
    public function getSignaByResep($id_resep)
    {
        $this->db->select('pas.nama,pas.no_rm, p.tgl_masuk, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat,  pas.tgl_lahir, s.tindakan id_signa, c.cara_pemakaian id_cara_pakai');
        $this->db->from('pasien pas, pelayanan p, tindakan_farmasi f , list_logistik l ,  resep_obat r, signa_obat s, cara_pemakaian_obat c');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('r.id_resep=f.id_resep');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_signa=s.id_signa');
        $this->db->where('f.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('f.id_resep', $id_resep);

        return $this->db->get()->result_array();
    }
    public function getSignaObatBebasById($id_tindakan)
    {
        $this->db->select('o.nama,o.tanggal, o.id_obat_bebas, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat, s.tindakan id_signa, c.cara_pemakaian id_cara_pakai');
        $this->db->from('obat_bebas o, tindakan_farmasi f , list_logistik l ,signa_obat s, cara_pemakaian_obat c ');
        $this->db->where('o.id_obat_bebas=f.id_pelayanan');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_signa=s.id_signa');
        $this->db->where('f.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('f.id_tindakan_farmasi', $id_tindakan);

        return $this->db->get()->row_array();
    }
    public function getSignaObatBebasByPasien($id_pelayanan)
    {
        $this->db->select('o.nama,o.tanggal, o.id_obat_bebas, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat, s.tindakan id_signa, c.cara_pemakaian id_cara_pakai');
        $this->db->from('obat_bebas o, tindakan_farmasi f , list_logistik l,signa_obat s, cara_pemakaian_obat c ');
        $this->db->where('o.id_obat_bebas=f.id_pelayanan');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_signa=s.id_signa');
        $this->db->where('f.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('f.id_pelayanan', $id_pelayanan);

        return $this->db->get()->result_array();
    }
    public function getResepById($id_resep)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, sum(t.frek_req) frek_req,l.nama obat, t.id_signa, s.tindakan, c.cara_pemakaian,t.keterangan');
        $this->db->from('tindakan_farmasi t, list_logistik l, resep_obat r, signa_obat s,cara_pemakaian_obat c');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_signa=s.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep', $id_resep);
        $this->db->where_not_in('t.frek', 0);
        $this->db->group_by('t.id_list_tindakan');
        $this->db->having('frek !=0');
        return $this->db->get()->result_array();
    }
    public function getResepById_copy($id_resep)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, sum(t.frek_req) frek_req,l.nama obat, t.id_signa, s.tindakan, c.cara_pemakaian,t.keterangan,l.satuan_terkecil satuan');
        $this->db->from('tindakan_farmasi t, list_logistik l, resep_obat r, signa_obat s,cara_pemakaian_obat c');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_signa=s.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep', $id_resep);
        $this->db->where_not_in('t.tgl_hapus', null);
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }
    public function getResepReturById($id_resep)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, sum(t.frek_req) frek_req,l.nama obat, t.id_signa, s.tindakan, c.cara_pemakaian,t.keterangan');
        $this->db->from('tindakan_farmasi t, list_logistik l, resep_obat r, signa_obat s,cara_pemakaian_obat c');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_signa=s.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep', $id_resep);
        $this->db->where('t.frek<0');
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }
    public function getReturBebasById($id_resep)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, sum(t.frek_req) frek_req,l.nama obat, t.id_signa, s.tindakan, c.cara_pemakaian,t.keterangan');
        $this->db->from('tindakan_farmasi t, list_logistik l, resep_obat r, signa_obat s,cara_pemakaian_obat c');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_signa=s.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep', $id_resep);
        $this->db->where('t.frek<0');
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }
    public function getResepDokterById($id_resep)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, l.nama obat, t.id_signa, s.tindakan, c.cara_pemakaian,t.keterangan, l.satuan_terkecil satuan');
        $this->db->from('tindakan_farmasi_kronis t, list_logistik l, resep_obat r, signa_obat s,cara_pemakaian_obat c');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_signa=s.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('l.status', 'AKTIF');
        $this->db->where('t.id_resep', $id_resep);
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }
    public function getData_copyresep($id_resep)
    {
        $query =  $this->db->query("SELECT a.obat obat_1,a.frek frek_1,a.tindakan signa_1,a.cara_pemakaian cara_1, b.obat obat_2,b.frek frek_2,b.tindakan signa_2,b.cara_pemakaian cara_2 FROM (
            SELECT 
                SUM(t.total) AS total, 
                SUM(t.frek) AS frek, 
                l.nama AS obat, 
                t.id_signa, 
                s.tindakan, 
                c.cara_pemakaian, 
                t.keterangan, 
                l.satuan_terkecil AS satuan, t.id_tindakan_farmasi
            FROM 
                tindakan_farmasi_kronis t
            JOIN 
                resep_obat r ON r.id_resep = t.id_resep
            JOIN 
                list_logistik l ON t.id_list_tindakan = l.id_logistik
            JOIN 
                signa_obat s ON t.id_signa = s.id_signa
            JOIN 
                cara_pemakaian_obat c ON t.id_cara_pakai = c.id_cara_pemakaian
            WHERE 
                l.status = 'AKTIF'
                AND t.id_resep ='$id_resep'
            GROUP BY 
                t.id_list_tindakan)
            as a
            
            join 
            (SELECT SUM(t.total) AS total, SUM(t.frek) AS frek, SUM(t.frek_req) AS frek_req, l.nama AS obat, t.id_signa, s.tindakan, c.cara_pemakaian, t.keterangan, l.satuan_terkecil AS satuan, t.id_tindakan_farmasi FROM tindakan_farmasi t, list_logistik l, resep_obat r, signa_obat s, cara_pemakaian_obat c WHERE r.id_resep = t.id_resep AND t.id_list_tindakan = l.id_logistik AND t.id_signa = s.id_signa AND t.id_cara_pakai = c.id_cara_pemakaian 
                           AND t.id_resep ='$id_resep' GROUP BY t.id_list_tindakan) as b
                           on a.id_tindakan_farmasi = b.id_tindakan_farmasi
            
            
        ");
        return $query->result_array();
    }

    public function getDataByIdResep($id_resep, $id_history)
    {
        $query =  $this->db->query("SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat, pa.jenis_kelamin,c.nama  cara_bayar, lp.nama_panjang ruang, a.nama asal,d.nama dokter, d.foto, r.tgl_req tanggal
        from pasien pa, pelayanan p, dokter d,cara_bayar c, list_poli lp, asal_pasien  a, history_pelayanan h, resep_obat r  
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=r.id_pelayanan  and lp.id_list_poli=h.nama_poli and r.id_resep = $id_resep and h.id_history = '$id_history'
        UNION
        SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat, pa.jenis_kelamin,c.nama  cara_bayar,'UGD' ruang, a.nama asal,d.nama dokter, d.foto, r.tgl_req tanggal
        from pasien pa, pelayanan p, dokter d,cara_bayar c,  asal_pasien  a, history_pelayanan_ugd h, resep_obat r  
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=r.id_pelayanan and r.id_resep = $id_resep and h.id_history = '$id_history'
        UNION
        SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat, pa.jenis_kelamin,c.nama  cara_bayar, ru.tipe ruang,a.nama asal,d.nama dokter, d.foto, r.tgl_req tanggal
        from pasien pa, pelayanan p, dokter d,cara_bayar c,  asal_pasien  a, history_pelayanan_ranap h, resep_obat r, ruangan ru
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=r.id_pelayanan and h.id_kamar=ru.id_ruangan and r.id_resep = $id_resep and h.id_history = '$id_history'
        ");
        return $query->row_array();
    }


    public function getDataObatBebas($id)
    {
        $this->db->select('o.*, c.nama cara_bayar, "" as no_rm');
        $this->db->from('obat_bebas o, cara_bayar c');
        $this->db->where('o.cara_bayar = c.id_cara_bayar');
        $this->db->where('o.id_obat_bebas', $id);

        return $this->db->get()->row_array();
    }
    public function getObatBebasById($id)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, l.nama obat');
        $this->db->from('tindakan_farmasi t, list_logistik l, obat_bebas o');
        $this->db->where('o.id_obat_bebas=t.id_pelayanan');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_pelayanan', $id);
        $this->db->group_by('t.id_list_tindakan');
        $this->db->having('frek>0');

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
        $this->db->select('ra.*, s.tindakan, c.cara_pemakaian,r.status,r.id_history,r.tanggal tgl_resep');
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
        $data_staff = $this->session->userdata('data_auth');
        if ($data_staff->tipe == "deporanap") {
            $id_struk = "id_req";
            $stok = "stok_depo";
        } else if ($data_staff->tipe == "apotik") {
            $id_struk = "id_req";
            $stok = "stok_apotik";
        } else {
            $stok = "stok_apotik";
        }
        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
        $this->db->from($stok . ' sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        $this->db->where('l.status', 'AKTIF');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('stok desc');
        return $this->db->get()->result_array();
    }

    public function getNamaObatUnit($stok)
    {
        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
        $this->db->from($stok . ' sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        $this->db->where('l.status', 'AKTIF');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('stok desc');
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
            $this->db->where('l.status', 'AKTIF');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('stok desc');
            return $this->db->get()->result();
        } else if ($depo == 'GUDANG'){
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
            $this->db->from('stok_logistik sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->where('l.status', 'AKTIF');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('stok desc');
            return $this->db->get()->result();
        
        } else {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
            $this->db->from('stok_depo sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->where('l.status', 'AKTIF');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('stok desc');
            return $this->db->get()->result();
        }
    }
    public function getExpByObat($obat, $stok)
    {
        $this->db->select('sum(s.frek) stok, max(s.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.id_logistik,l.nama');
        $this->db->from($stok . ' s, list_logistik l');
        $this->db->where(' s.id_logistik=l.id_logistik');
        $this->db->where(' s.id_logistik', $obat);
        $this->db->group_by('s.id_stok');
        return $this->db->get()->row();
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
    public function getDataObatKronis($id_tindakan)
    {
        $this->db->select('t.*,l.nama, s.tindakan');
        $this->db->from('tindakan_farmasi_kronis t, list_logistik l, signa_obat s');
        $this->db->where(' t.id_list_tindakan=l.id_logistik');
        $this->db->where(' t.id_signa=s.id_signa');
        $this->db->where('l.status', 'AKTIF');
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
    public function getSumObatGudang($obat)
    {
        $this->db->select('sum(frek) stok');
        $this->db->from('stok_logistik');
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
        $this->db->select('v.*,n.no_nota');
        $this->db->from('v_riwayat_pasien_apotik v');
        $this->db->join('nota_resep n', 'v.id_nota = n.id_nota_resep', 'left');
        $this->db->like(' v.tanggal ', $tgl);
        return $this->db->get()->result();
    }
    public function selectRangeRiwayatPasien($mulai, $akhir)
    {
        $this->db->select('v.*,n.no_nota');
        $this->db->from('v_riwayat_pasien_apotik v');
        $this->db->join('nota_resep n', 'v.id_nota = n.id_nota_resep', 'left');
        $this->db->where('v.tanggal >=', $mulai);
        $this->db->where('v.tanggal <=', $akhir);
        return $this->db->get()->result();
    }
    public function selectRiwayatPasienById($id_resep)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_farmasi t, list_logistik l, pelayanan p , staff s,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->order_by('t.tanggal desc');
        return $this->db->get()->result();
    }
    public function selectRiwayatPasienReturById($id_resep)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_farmasi t, list_logistik l, pelayanan p , staff s,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('t.frek<0');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->order_by('t.tanggal desc');
        return $this->db->get()->result();
    }
    public function selectRiwayatPasienReturBebasById($id_resep)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_farmasi t, list_logistik l, obat_bebas p , staff s');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_pelayanan=p.id_obat_bebas');
        $this->db->where('t.frek<0');
        $this->db->where('p.id_obat_bebas', $id_resep);
        $this->db->order_by('t.tanggal desc');
        return $this->db->get()->result();
    }
    public function getObatReturBebasById($id_resep)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('t.*, l.nama obat, s.nama staff');
        $this->db->from('tindakan_farmasi t, list_logistik l, obat_bebas p , staff s');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_pelayanan=p.id_obat_bebas');
        $this->db->where('t.frek<0');
        $this->db->where('p.id_obat_bebas', $id_resep);
        $this->db->order_by('t.tanggal desc');
        return $this->db->get()->result_array();
    }
    public function selectResepReturById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama , s.nama staff, si.tindakan,c.cara_pemakaian');
        $this->db->from('tindakan_farmasi t, list_logistik l , staff s, signa_obat si, cara_pemakaian_obat c');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_signa=si.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep', $id_pelayanan);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function getTotalTindakanById($id_resep)
    {
        $this->db->select('sum(t.total) total');
        $this->db->from('tindakan_farmasi t, resep_obat r');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('r.id_resep', $id_resep);
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
        $this->db->select('t.*, l.nama obat,s.tindakan signa, c.cara_pemakaian');
        $this->db->from('tindakan_farmasi t, list_logistik l, pelayanan p,resep_obat r, cara_pemakaian_obat c, signa_obat s');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_signa=s.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('t.frek >=0');
        $this->db->where('r.id_pelayanan', $id_pelayanan);

        return $this->db->get()->result_array();
    }
    //Riwayat Pasien pulang
    public function selectRiwayatPasienPulang($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");

        $this->db->select('v.*,n.no_nota');
        $this->db->from('v_riwayat_pasien_pulang v');
        $this->db->join('nota_resep n', 'v.id_nota = n.id_nota_resep', 'left');
        if ($mulai != '' && $akhir != '') {
            $this->db->where('v.tanggal >=', $mulai);
            $this->db->where('v.tanggal <=', $akhir);
        } else {
            $this->db->like(' v.tanggal ', $tgl);
        }
        return $this->db->get()->result();
    }
    public function selectRiwayatResepManual($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('v.*,n.no_nota');
        $this->db->from('v_kunjungan v');
        $this->db->join('tindakan_farmasi t', 't.poli = v.id_history and t.id_resep like "%obat farmasi%"');
        $this->db->join('nota_resep n', 'v.id_pelayanan = n.id_pelayanan', 'left');
        $this->db->where('v.status_rawat ', 'selesai');
        if ($mulai != '' && $akhir != '') {
            $this->db->where('v.tgl_masuk >=', $mulai);
            $this->db->where('v.tgl_masuk <=', $akhir);
        } else {
            $this->db->like(' v.tgl_masuk ', $tgl);
        }
        $this->db->group_by('v.id_history');

        return $this->db->get()->result();
    }
    // public function selectRiwayatPasienPulangById($id_pelayanan)
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $tgl = date("Y-m-d");
    //     $this->db->select('t.*, l.nama, s.nama staff');
    //     $this->db->from('tindakan_farmasi t, list_logistik l, pelayanan p , staff s, resep_obat r');
    //     $this->db->where('p.id_pelayanan=r.id_pelayanan');
    //     $this->db->where('l.id_logistik=t.id_list_tindakan');
    //     $this->db->where('s.id_staff=t.id_staff');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('r.id_pelayanan', $id_pelayanan);
    //     $this->db->order_by('t.tanggal desc');
    //     return $this->db->get()->result();
    // }
    // public function getTotalTindakanPulangById($id_pelayanan)
    // {
    //     $this->db->select('sum(t.total) total');
    //     $this->db->from('tindakan_farmasi t, resep_obat r');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('r.id_pelayanan', $id_pelayanan);
    //     return $this->db->get()->result();
    // }
    public function getDataRiwayatPulangById($id_pelayanan, $id_history)
    {
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_history', $id_history);
        return $this->db->get('v_riwayat_pasien_pulang')->row_array();
    }
    // public function getRiwayatPulangById($id_pelayanan)
    // {
    //     $this->db->select('t.*, l.nama obat,s.tindakan signa, c.cara_pemakaian');
    //     $this->db->from('tindakan_farmasi t, list_logistik l, pelayanan p,resep_obat r, cara_pemakaian_obat c, signa_obat s');
    //     $this->db->where('p.id_pelayanan=r.id_pelayanan');
    //     $this->db->where('t.id_list_tindakan=l.id_logistik');
    //     $this->db->where('t.id_signa=s.id_signa');
    //     $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('t.frek >=0');
    //     $this->db->where('r.id_pelayanan', $id_pelayanan);

    //     return $this->db->get()->result_array();
    // }

    ////tindakan signaobat 
    public function selectTindakansignaobat()
    {
        $this->db->select('*');
        // $this->db->where('status', 'AKTIF');
        $this->db->from('signa_obat');
        // $this->db->order_by('nama_tindakan');
        return $this->db->get()->result();
    }
    public function selectDataTindakansignaobat($id)
    {
        $this->db->where('id_signa', $id);
        return $this->db->get('signa_obat')->result();
    }
    public function update_tindakan($id, $data)
    {
        $this->db->where('id_list_tindakan', $id);
        return $this->db->update('list_tindakan_homecare', $data);
    }
    public function insert_tindakan_signaobat($data, $table)
    {
        $this->db->insert($table, $data);
    }
    //Stok Obat Apotik
    public function selectStokApotik()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok  ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen');
        $this->db->from('stok_apotik a, list_logistik l');
        $this->db->where('a.id_logistik=l.id_logistik');
        $this->db->where('l.status', 'AKTIF');
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
        $this->db->where('l.status', 'AKTIF');
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
        $this->db->where('l.status', 'AKTIF');
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
        $this->db->where('l.status', 'AKTIF');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    // Laporan pasien rajal
    // public function selectLaporanPasienRajal()
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $tgl = date("Y-m-d");
    //     $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
    //     $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c,resep_obat r');
    //     $this->db->where('p.id_pelayanan=r.id_pelayanan');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('h.id_pelayanan=p.id_pelayanan');
    //     $this->db->where('c.id_cara_bayar=p.cara_bayar');
    //     $this->db->where('ps.no_rm=p.id_pasien');
    //     $this->db->where('d.id_dokter=h.dpjp');
    //     $this->db->where('l.id_logistik=t.id_list_tindakan');
    //     $this->db->where('p.status_rawat', 'selesai');
    //     $this->db->where_not_in('l.id_logistik', 'setrip1');
    //     $this->db->like(' p.tgl_masuk ', $tgl);
    //     $this->db->order_by('t.tanggal ');
    //     return $this->db->get()->result();
    // }

    // public function selectRangeLaporanPasienRajal($mulai, $akhir)
    // {
    //     $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.standar, l.kode, l.distributor,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
    //     $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c,resep_obat r');
    //     $this->db->where('p.id_pelayanan=r.id_pelayanan');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('h.id_pelayanan=p.id_pelayanan');
    //     $this->db->where('c.id_cara_bayar=p.cara_bayar');
    //     $this->db->where('ps.no_rm=p.id_pasien');
    //     $this->db->where('d.id_dokter=h.dpjp');
    //     $this->db->where('l.id_logistik=t.id_list_tindakan');
    //     $this->db->where('p.status_rawat', 'selesai');
    //     $this->db->where_not_in('l.id_logistik', 'setrip1');
    //     $this->db->where('p.tgl_masuk >=', $mulai);
    //     $this->db->where('p.tgl_masuk <=', $akhir);
    //     $this->db->order_by('t.tanggal ');
    //     return $this->db->get()->result();
    // }
    // public function selectLaporanPasienIgd()
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $tgl = date("Y-m-d");
    //     $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
    //     $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ugd h , pasien ps, dokter d, cara_bayar c,resep_obat r');
    //     $this->db->where('p.id_pelayanan=r.id_pelayanan');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('h.id_pelayanan=p.id_pelayanan');
    //     $this->db->where('c.id_cara_bayar=p.cara_bayar');
    //     $this->db->where('ps.no_rm=p.id_pasien');
    //     $this->db->where('d.id_dokter=h.dpjp');
    //     $this->db->where('l.id_logistik=t.id_list_tindakan');
    //     $this->db->where('p.status_rawat', 'selesai');
    //     $this->db->where_not_in('l.id_logistik', 'setrip1');
    //     $this->db->like(' p.tgl_masuk ', $tgl);
    //     $this->db->order_by('t.tanggal ');
    //     return $this->db->get()->result();
    // }

    // public function selectRangeLaporanPasienIgd($mulai, $akhir)
    // {
    //     $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.standar, l.kode, l.distributor,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
    //     $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ugd h , pasien ps, dokter d, cara_bayar c,resep_obat r');
    //     $this->db->where('p.id_pelayanan=r.id_pelayanan');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('h.id_pelayanan=p.id_pelayanan');
    //     $this->db->where('c.id_cara_bayar=p.cara_bayar');
    //     $this->db->where('ps.no_rm=p.id_pasien');
    //     $this->db->where('d.id_dokter=h.dpjp');
    //     $this->db->where('l.id_logistik=t.id_list_tindakan');
    //     $this->db->where('p.status_rawat', 'selesai');
    //     $this->db->where_not_in('l.id_logistik', 'setrip1');
    //     $this->db->where('p.tgl_masuk >=', $mulai);
    //     $this->db->where('p.tgl_masuk <=', $akhir);
    //     $this->db->order_by('t.tanggal ');
    //     return $this->db->get()->result();
    // }
    // // End
    // public function selectLaporanPasienRanap()
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $tgl = date("Y-m-d");
    //     $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.standar,l.kode, l.distributor,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
    //     $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ranap h , pasien ps, dokter d, cara_bayar c, resep_obat r');
    //     $this->db->where('p.id_pelayanan=r.id_pelayanan');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('h.id_pelayanan=p.id_pelayanan');
    //     $this->db->where('c.id_cara_bayar=p.cara_bayar');
    //     $this->db->where('ps.no_rm=p.id_pasien');
    //     $this->db->where('d.id_dokter=h.dpjp');
    //     $this->db->where('l.id_logistik=t.id_list_tindakan');
    //     $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
    //     // $this->db->where('p.status_rawat', 'selesai');
    //     $this->db->where_not_in('l.id_logistik', 'setrip1');
    //     $this->db->like(' t.tanggal ', $tgl);
    //     $this->db->order_by('ps.nama, t.tanggal ');
    //     return $this->db->get()->result();
    // }

    // public function selectRangeLaporanPasienRanap($mulai, $akhir)
    // {
    //     $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.standar,l.kode, l.distributor,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
    //     $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ranap h , pasien ps, dokter d, cara_bayar c, resep_obat r');
    //     $this->db->where('p.id_pelayanan=r.id_pelayanan');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('h.id_pelayanan=p.id_pelayanan');
    //     $this->db->where('c.id_cara_bayar=p.cara_bayar');
    //     $this->db->where('ps.no_rm=p.id_pasien');
    //     $this->db->where('d.id_dokter=h.dpjp');
    //     $this->db->where('l.id_logistik=t.id_list_tindakan');
    //     $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
    //     // $this->db->where('p.status_rawat', 'selesai');
    //     $this->db->where_not_in('l.id_logistik', 'setrip1');
    //     $this->db->where('t.tanggal  >=', $mulai);
    //     $this->db->where('t.tanggal  <=', $akhir);
    //     $this->db->order_by('t.tanggal ');
    //     return $this->db->get()->result();
    // }
    // End


    //LAPORAN OBAT IGD
    public function selectLaporanPasienObatRanap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT r.id_history, ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama, n.no_nota,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, ru.tipe ruangan, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan_ranap hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l, resep_obat r, ruangan ru, nota_resep n
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar and n.id_nota_resep=r.id_nota AND hs.id_kamar=ru.id_ruangan AND p.id_pelayanan=r.id_pelayanan AND hs.id_history = r.id_history and r.id_resep=t.id_resep AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien AND t.tanggal like '%$tgl%' 
        UNION ALL
        SELECT r.id_history, ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama, n.no_nota,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, 'UGD' ruangan, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan_ugd hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l, resep_obat r, nota_resep n
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar and n.id_nota_resep=r.id_nota  AND p.id_pelayanan=r.id_pelayanan AND hs.id_history = r.id_history and r.id_resep=t.id_resep AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien AND t.tanggal like '%$tgl%'
        group by t.id_tindakan_farmasi
        order by tanggal
        ");
        return $query->result();
    }

    public function selectRangeLaporanPasienObatRanap($mulai, $akhir)
    {
        $query =  $this->db->query("SELECT r.id_history, ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter,  l.nama,n.no_nota,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, ru.tipe ruangan, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan_ranap hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l, resep_obat r,ruangan ru, nota_resep n
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar 
        and n.id_nota_resep=r.id_nota AND hs.id_kamar=ru.id_ruangan AND p.id_pelayanan=r.id_pelayanan AND hs.id_history = r.id_history and r.id_resep=t.id_resep AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien AND t.tanggal>='$mulai' AND t.tanggal<='$akhir'
        UNION ALL
        SELECT r.id_history, ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,n.no_nota,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, 'UGD' ruangan, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan_ugd hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l, resep_obat r, nota_resep n
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar and n.id_nota_resep=r.id_nota 
        AND p.id_pelayanan=r.id_pelayanan AND hs.id_history = r.id_history and r.id_resep=t.id_resep AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien AND t.tanggal>='$mulai' AND t.tanggal<='$akhir'
        group by t.id_tindakan_farmasi
        order by tanggal
        ");
        return $query->result();
    }

    // LAPORAN OBAT PASIEN POLI
    public function selectLaporanPasienObatApotik()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l, resep_obat r
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar AND p.id_pelayanan=r.id_pelayanan 
        AND r.id_resep=t.id_resep AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien AND hs.id_history = r.id_history AND p.status=1 AND t.tgl_acc IS NOT NULL AND t.tanggal like '%$tgl%' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap )
        UNION ALL
        SELECT ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar  
        AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien AND p.status=1 AND t.id_resep like '%obat farmasi%' AND t.tanggal like '%$tgl%' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap )
        group by t.id_tindakan_farmasi
        order by tanggal asc
        ");
        return $query->result();
    }

    public function selectRangeLaporanPasienObatApotik($mulai, $akhir)
    {
        $query =  $this->db->query("SELECT ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l, resep_obat r, stok_apotik s
        WHERE r.id_history=hs.id_history AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar AND p.id_pelayanan=r.id_pelayanan and t.id_tindakan_farmasi = s.id_req
        AND r.id_resep=t.id_resep AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien AND p.status=1 AND hs.status=1 AND t.tgl_acc IS NOT NULL AND t.tanggal>='$mulai' AND t.tanggal<='$akhir' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap )
        UNION ALL
        SELECT ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar  
        AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien AND p.status=1 AND t.id_resep like '%obat farmasi%' AND t.tanggal>='$mulai' AND t.tanggal<='$akhir' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap )
        group by t.id_tindakan_farmasi
        order by tanggal asc
        ");
        return $query->result();
    }
    // End



    // PENJUALAN ITEM OBAT
    public function selectLaporanItemObat()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(id_list_tindakan)) jumlah');
        $this->db->from('tindakan_farmasi');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat2()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) fopi');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.standar="FOPI"');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat3()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) nonfopi');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.standar="NON FOPI"');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat4()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) generik');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.golongan_obat="Generik"');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat5()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) patent');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.golongan_obat="Patent"');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat6()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) NARKOTIKA');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.zat_adiktif="NARKOTIKA"');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat7()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) PSIKOTROPIKA');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.zat_adiktif="PSIKOTROPIKA"');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat8()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) patent');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.golongan_obat="Patent"');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat9()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) bpjs');
        $this->db->from('tindakan_farmasi t, pelayanan p');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar="30"');
        $this->db->like(' p.tgl_masuk ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat10()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) timah');
        $this->db->from('tindakan_farmasi t, pelayanan p');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar="333"');
        $this->db->like(' p.tgl_masuk ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat11()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) internal');
        $this->db->from('tindakan_farmasi t, pelayanan p');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar="674"');
        $this->db->like(' p.tgl_masuk ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat12()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) mitra');
        $this->db->from('tindakan_farmasi t, pelayanan p, cara_bayar c');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar=c.id_cara_bayar and c.jenis="MITRA"');
        $this->db->like(' p.tgl_masuk ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat13()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) umum');
        $this->db->from('tindakan_farmasi t, pelayanan p');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar="42"');
        $this->db->like(' p.tgl_masuk ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat14()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) patent');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.golongan_obat="Patent"');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat15()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(id_resep)) resep');
        $this->db->from('resep_obat');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }
    //END


    // PENJUALAN ITEM OBAT RANGE
    public function selectLaporanItemObatRange($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(id_list_tindakan)) jumlah');
        $this->db->from('tindakan_farmasi');
        $this->db->where("tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange2($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) fopi');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.standar="FOPI"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");

        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange3($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) nonfopi');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.standar="NON FOPI"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange4($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) generik');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.golongan_obat="Generik"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange5($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) patent');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.golongan_obat="Patent"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange6($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) NARKOTIKA');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.zat_adiktif="NARKOTIKA"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange7($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) PSIKOTROPIKA');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.zat_adiktif="PSIKOTROPIKA"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    // public function selectLaporanItemObatRange8($mulai, $akhir)
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $tgl = date("Y-m-d");
    //     $this->db->select('count(DISTINCT(t.id_list_tindakan)) patent');
    //     $this->db->from('tindakan_farmasi t, list_logistik l');
    //     $this->db->where('t.id_list_tindakan = l.id_logistik and l.golongan_obat="Patent"');
    //     $this->db->where("tanggal BETWEEN '$mulai' AND '$akhir'");
    //     return $this->db->get()->row();
    // }

    public function selectLaporanItemObatRange9($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) bpjs');
        $this->db->from('tindakan_farmasi t, pelayanan p');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar="30"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange10($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) timah');
        $this->db->from('tindakan_farmasi t, pelayanan p');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar="333"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange11($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) internal');
        $this->db->from('tindakan_farmasi t, pelayanan p');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar="674"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange12($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) mitra');
        $this->db->from('tindakan_farmasi t, pelayanan p, cara_bayar c');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar=c.id_cara_bayar and c.jenis="MITRA"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange13($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) umum');
        $this->db->from('tindakan_farmasi t, pelayanan p');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar="42"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    // public function selectLaporanItemObatRange14($mulai, $akhir)
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $tgl = date("Y-m-d");
    //     $this->db->select('count(DISTINCT(t.id_list_tindakan)) patent');
    //     $this->db->from('tindakan_farmasi t, list_logistik l');
    //     $this->db->where('t.id_list_tindakan = l.id_logistik and l.golongan_obat="Patent"');
    //     $this->db->where("tgl BETWEEN '$mulai' AND '$akhir'");

    //     return $this->db->get()->row();
    // }

    public function selectLaporanItemObatRange15($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(id_resep)) resep');
        $this->db->from('resep_obat');
        $this->db->where("tanggal BETWEEN '$mulai' AND '$akhir'");

        return $this->db->get()->row();
    }
    //END


    public function selectLaporanObatRajal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost,l.kode, l.standar, l.distributor, l.margin, l.golongan_farmakologi golongan, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p,history_pelayanan h,  resep_obat r');
        $this->db->where('t.id_pelayanan=p.id_pelayanan');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_history=h.id_history');
        $this->db->where('r.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        // $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('t.depo', 'APOTIK');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' t.tanggal', $tgl);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }


    public function TotalKeuanganApotik()
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
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost,l.kode, l.standar, l.distributor, l.margin, l.golongan_farmakologi golongan, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p,history_pelayanan h, resep_obat r');
        $this->db->where('t.id_pelayanan=p.id_pelayanan');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_history=h.id_history');
        $this->db->where('r.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('t.depo', 'APOTIK');
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
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, n.no_nota,l.kode, l.standar, l.distributor, l.margin, l.golongan_farmakologi golongan, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, resep_obat r, nota_resep n');
        $this->db->where('r.id_pelayanan=p.id_pelayanan');
        // $this->db->where('h.id_pelayanan=p.id_pelayanan');
        // $this->db->where('r.id_history=h.id_history');
        $this->db->where('t.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('r.id_nota=n.id_nota_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('t.depo', 'RANAP');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' t.tanggal ', $tgl);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanObatRanap($mulai, $akhir)
    {
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, n.no_nota, l.kode, l.distributor, l.golongan_farmakologi golongan,, l.standar, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, resep_obat r');
        $this->db->where('r.id_pelayanan=p.id_pelayanan');
        // $this->db->where('h.id_pelayanan=p.id_pelayanan');
        // $this->db->where('r.id_history=h.id_history');
        $this->db->where('t.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_nota=n.id_nota_resep');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('t.depo', 'RANAP');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('t.tanggal >=', $mulai);
        $this->db->where('t.tanggal <=', $akhir);
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

    public function selectCetakSoDepo()
    {
        return $this->db->get('v_cetak_so_deporanap')->result();
    }
    //end

    public function selectLaporanPasienRajalSanbe()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('ps.nama pasien,ps.no_rm,ps.no_id_lain,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where("(p.cara_bayar='333' )");
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where("(t.jenis_pelayanan='UGD' or t.jenis_pelayanan='POLI' or t.jenis_pelayanan='IGD'  )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPasienRajalSanbe($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,ps.no_id_lain,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where("(p.cara_bayar='333' )");
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where("(t.jenis_pelayanan='UGD' or t.jenis_pelayanan='POLI' or t.jenis_pelayanan='IGD'  )");
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
        $this->db->select('ps.nama pasien,ps.no_rm,ps.no_id_lain,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ranap h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where("(p.cara_bayar='333' )");
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(t.jenis_pelayanan='RAWAT INAP'  )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->order_by('ps.nama, t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPasienRanapSanbe($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,ps.no_id_lain,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ranap h , pasien ps, dokter d, cara_bayar c,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where("(p.cara_bayar='333' )");
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(t.jenis_pelayanan='RAWAT INAP' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->order_by('ps.nama, t.tanggal ');
        return $this->db->get()->result();
    }
    public function selectLaporanObatBebas()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('o.tanggal, o.nama pasien, c.nama caraBayar, o.dpjp, l.nama, l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, l.standar,t.margin, t.frek , t.total total_jual, o.unit');
        $this->db->from('list_logistik l, tindakan_farmasi t, cara_bayar c, obat_bebas o');
        $this->db->where('o.id_obat_bebas=t.id_pelayanan');
        $this->db->where('o.cara_bayar=c.id_cara_bayar');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->like(' o.tanggal ', $tgl);
        $this->db->order_by('o.nama');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanObatBebas($mulai, $akhir)
    {
        $this->db->select('o.tanggal, o.nama pasien, c.nama caraBayar, o.dpjp, l.nama, l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, l.standar,t.margin, t.frek , t.total total_jual, o.unit');
        $this->db->from('list_logistik l, tindakan_farmasi t, cara_bayar c, obat_bebas o');
        $this->db->where('o.id_obat_bebas=t.id_pelayanan');
        $this->db->where('o.cara_bayar=c.id_cara_bayar');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('o.tanggal >=', $mulai);
        $this->db->where('o.tanggal <=', $akhir);
        $this->db->order_by('o.nama');
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
        $this->db->select('count(id_resep) jumlah');
        $this->db->where_Not_In('status', '2');
        $this->db->like('tgl_proses', $tanggal);
        return $this->db->get('antrian_farmasi')->row_array();
    }
    public function getAntrian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        $this->db->select('a.id_resep , a.no_antri, a.jenis, a.tgl_proses, a.status, p.nama,c.nama cara_bayar,p.no_rm ');
        $this->db->from('antrian_farmasi a, pelayanan pel, pasien p, cara_bayar c  ');
        $this->db->where('p.no_rm=pel.id_pasien');
        $this->db->where('c.id_cara_bayar=pel.cara_bayar');
        $this->db->where('a.id_pelayanan=pel.id_pelayanan');
        $this->db->like('tgl_proses', $tanggal);
        // $this->db->where_Not_In('a.status', '2');
        $this->db->order_by('a.status');
        $this->db->order_by('a.no_antri');
        return $this->db->get()->row_array();
    }
    public function selectAntrian($id_pelayanan, $mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');

        $this->db->select('a.*, a.status as stat_antrian, p.nama, c.nama as nm_cara_bayar, p.no_rm');
        $this->db->from('antrian_farmasi a, pelayanan pel, pasien p, cara_bayar c');
        $this->db->where('p.no_rm = pel.id_pasien');
        $this->db->where('c.id_cara_bayar = pel.cara_bayar');
        $this->db->where('a.id_pelayanan = pel.id_pelayanan');
        $this->db->where_Not_In('a.status', '4');

        if ($mulai != '' && $akhir != '') {
            // Tambahkan kondisi untuk rentang tanggal
            $this->db->where('DATE(a.tgl_proses) >=', $mulai);
            $this->db->where('DATE(a.tgl_proses) <=', $akhir);
        }

        $this->db->group_by('pel.id_pelayanan');
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
        $staff = $this->session->userdata('data_auth');

        //$date = new DateTime('+1 day');
        $this->db->where(array('id_tindakan_farmasi' => $id_tindakan));
        $this->db->update('tindakan_farmasi_kronis', ['staff_hapus' => $staff->id_staff, 'tgl_hapus' => date('Y-m-d H:i:s')]);
        $this->db->delete('tindakan_farmasi', array('id_tindakan_farmasi' => $id_tindakan));
        
        $dblog =$this->db->get_where($stok,['id_req' => $id_tindakan])->row();

        $this->db->delete($stok, array('id_req' => $id_tindakan));
        if ($stok == 'stok_apotik') {
            $this->M_Apotik->update_perencanaan($dblog->id_logistik, 'stok_apotik', 'pr_apotik');
        } else if ($stok == 'stok_depo') {
            $this->M_Apotik->update_perencanaan($dblog->id_logistik, 'stok_depo', 'pr_depo');
        }
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
    function update_perencanaan($id_logistik, $stok, $table)
    {
        $tgl = date('Y-m-d H:i:s');
        $d_stok = $this->db->query("SELECT sum(frek) stok from $stok where id_logistik ='$id_logistik'")->row();
        // $d_penggunaan = $this->db->query("SELECT sum(frek) stok from $stok where asal_tujuan = 'PENJUALAN' and id_logistik ='$id_logistik'")->row();
        $pr = $this->db->query("SELECT count(id_logistik) jum from `$table` where id_logistik ='$id_logistik'")->row();
        if ($pr->jum > 0) {
            $this->M_Apotik->update(['stok_tersedia' => $d_stok->stok,  'tanggal_update' => $tgl], ['id_logistik' => $id_logistik], $table);
        } else {
            $page_data = [
                'id_logistik' => $id_logistik,
                'stok_tersedia' => $d_stok->stok,
                'penggunaan' => 0,
                'tanggal_update' => $tgl
            ];
            $this->db->insert($table, $page_data);
        }
    }
    function getNota($id_resep)
    {
        $this->db->select('*');
        $this->db->from('resep_obat r, nota_resep n');
        $this->db->where('r.id_nota= n.id_nota_resep');
        $this->db->where('n.tipe', 'resep');
        $this->db->where('r.id_resep', $id_resep);
        return $this->db->get()->result();
    }
    function getNotaRetur($id_resep)
    {
        $this->db->select('*');
        $this->db->from('resep_obat r, nota_resep n');
        $this->db->where('r.id_nota_retur= n.id_nota_resep');
        $this->db->where('n.tipe', 'retur resep');
        $this->db->where('r.id_resep', $id_resep);
        return $this->db->get()->result();
    }
    function getNotaBebas($id_resep)
    {
        $this->db->select('*');
        $this->db->from('obat_bebas r, nota_resep n');
        $this->db->where('r.id_nota= n.id_nota_resep');
        $this->db->where('r.id_obat_bebas', $id_resep);
        return $this->db->get()->result();
    }
    function getMax()
    {
        $tgl = date('Y-m-d');
        $this->db->select('max(indeks) indeks');
        $this->db->from('nota_resep');
        $this->db->like('tanggal', $tgl);
        return $this->db->get()->row();
    }
    public function selectObatById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama , s.nama staff, si.tindakan,c.cara_pemakaian');
        $this->db->from(' tindakan_farmasi t, list_logistik l , staff s, signa_obat si, cara_pemakaian_obat c');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_signa=si.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep', 'obat farmasi');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function selectObatReturById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama , s.nama staff, si.tindakan,c.cara_pemakaian');
        $this->db->from('tindakan_farmasi t, list_logistik l , staff s, signa_obat si, cara_pemakaian_obat c');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_signa=si.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep', 'obat retur');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function selectObatResepById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama obat, s.nama staff, si.tindakan,c.cara_pemakaian');
        $this->db->from(' tindakan_farmasi t, list_logistik l , staff s, signa_obat si, cara_pemakaian_obat c');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_signa=si.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep', 'obat farmasi');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result_array();
    }
    // public function getTotalObat($id_pelayanan)
    // {
    //     $this->db->select_sum('total');
    //     $this->db->from('tindakan_farmasi');
    //     $this->db->where('id_resep', 'obat farmasi');
    //     $this->db->where('id_pelayanan', $id_pelayanan);
    //     return $this->db->get()->result();
    // }

    public function getTotalObat($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_farmasi');
        $this->db->like('id_resep', 'obat_bebas');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function getDataById($id_history)
    {
        $query =  $this->db->query("SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat,c.nama  cara_bayar, lp.nama_panjang ruang, a.nama asal,d.nama dokter, d.foto
        from pasien pa, pelayanan p, dokter d,cara_bayar c, list_poli lp, asal_pasien  a, history_pelayanan h
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan  and lp.id_list_poli=h.nama_poli and h.id_history = '$id_history'
        UNION
        SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat,c.nama  cara_bayar,'-' ruang, a.nama asal,d.nama dokter, d.foto
        from pasien pa, pelayanan p, dokter d,cara_bayar c,  asal_pasien  a, history_pelayanan_ugd h
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan  and  h.id_history = '$id_history'
        UNION
        SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat,c.nama  cara_bayar, ru.tipe ruang,a.nama asal,d.nama dokter, d.foto
        from pasien pa, pelayanan p, dokter d,cara_bayar c,  asal_pasien  a, history_pelayanan_ranap h, ruangan ru
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan  and h.id_kamar=ru.id_ruangan and h.id_history = '$id_history'
        ");
        return $query->row_array();
    }


    public function getObatById($id)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, l.nama obat,t.keterangan');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep', 'obat farmasi');
        $this->db->where('t.id_pelayanan', $id);
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }
    public function getObatReturById($id)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, l.nama obat,t.keterangan');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep', 'obat retur');
        $this->db->where('t.id_pelayanan', $id);
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }
    public function getSignaObatById($id_tindakan)
    {
        $this->db->select('pas.nama,pas.no_rm, p.tgl_masuk, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat,  pas.tgl_lahir, s.tindakan id_signa, c.cara_pemakaian id_cara_pakai');
        $this->db->from('pasien pas, pelayanan p, tindakan_farmasi f , list_logistik l , signa_obat s, cara_pemakaian_obat c');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->where('p.id_pelayanan=f.id_pelayanan');
        $this->db->where('f.id_resep', 'obat farmasi');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_signa=s.id_signa');
        $this->db->where('f.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('f.id_tindakan_farmasi', $id_tindakan);

        return $this->db->get()->row_array();
    }
    public function getSignaObatByPasien($id_pelayanan)
    {
        $this->db->select('pas.nama,pas.no_rm, p.tgl_masuk, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat,  pas.tgl_lahir, s.tindakan id_signa, c.cara_pemakaian id_cara_pakai');
        $this->db->from('pasien pas, pelayanan p, tindakan_farmasi f , list_logistik l , signa_obat s, cara_pemakaian_obat c');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->where('p.id_pelayanan=f.id_pelayanan');
        $this->db->where('f.id_resep', 'obat farmasi');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_signa=s.id_signa');
        $this->db->where('f.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('f.id_pelayanan', $id_pelayanan);

        return $this->db->get()->result_array();
    }
    //laporan permintaan obat unit
    public function selectLaporanPermintaanObatUnit()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $data_staff = $this->session->userdata('data_auth');
        //$date = new DateTime('+1 day');
        if ($data_staff->tipe == "deporanap") {
            $stok = "stok_depo";
        } else if ($data_staff->tipe == "apotik") {
            $stok = "stok_apotik";
        } else if ($data_staff->tipe == "logistik farmasi") {
            $stok = "stok_logistik";
        }
        $this->db->select("l.nama nama_obat, d.jml_req jumlah_request, d.jml_terima jumlah_terima, l.satuan_terkecil satuan, (ROUND(l.harga_cost * (1 + (l.ppn/100)),0)) harga, (d.jml_terima * (ROUND(l.harga_cost * (1 + (l.ppn/100)),0))) nilai_total, (if((s.tipe = 'rawatinap'),s.ruangan,s.tipe)) tujuan, d.tgl_req");
        $this->db->from($stok . ' a, detail_request d, staff s, list_logistik l');
        $this->db->where('d.id_req = a.id_req');
        $this->db->where('d.id_staff = s.id_staff');
        $this->db->where('l.id_logistik = a.id_logistik');
        $this->db->like('d.tgl_req', $tgl);
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPermintaanObatUnit($mulai, $akhir)
    {
        $data_staff = $this->session->userdata('data_auth');
        //$date = new DateTime('+1 day');
        if ($data_staff->tipe == "deporanap") {
            $stok = "stok_depo";
        } else if ($data_staff->tipe == "apotik") {
            $stok = "stok_apotik";
        } else if ($data_staff->tipe == "logistik farmasi") {
            $stok = "stok_logistik";
        }
        $this->db->select("l.nama nama_obat, d.jml_req jumlah_request, d.jml_terima jumlah_terima, l.satuan_terkecil satuan, (ROUND(l.harga_cost * (1 + (l.ppn/100)),0)) harga, (d.jml_terima * (ROUND(l.harga_cost * (1 + (l.ppn/100)),0))) nilai_total, (if((s.tipe = 'rawatinap'),s.ruangan,s.tipe)) tujuan, d.tgl_req");
        $this->db->from($stok . ' a, detail_request d, staff s, list_logistik l');
        $this->db->where('d.id_req = a.id_req');
        $this->db->where('d.id_staff = s.id_staff');
        $this->db->where('l.id_logistik = a.id_logistik');
        $this->db->where('d.tgl_req>=', $mulai);
        $this->db->where('d.tgl_req<=', $akhir);
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    public function getNamaObatReturn($id_resep)
    {

        $this->db->select('l.id_logistik,l.nama , SUM(t.frek) stok,SUM(t.total) total,t.depo,t.kadaluarsa,l.margin,l.harga_cost');
        $this->db->from('list_logistik l,tindakan_farmasi t, resep_obat r');
        $this->db->where(' t.id_list_tindakan=l.id_logistik');
        $this->db->where(' t.id_resep=r.id_resep');

        $this->db->where(' r.id_resep', $id_resep);
        $this->db->group_by('t.id_list_tindakan');
        $this->db->having('stok>0');
        $this->db->order_by('nama');

        return $this->db->get()->result_array();
    }
    public function getNamaObatReturnBebas($id_resep)
    {

        $this->db->select('l.id_logistik,l.nama , SUM(t.frek) stok,SUM(t.total) total,t.depo,t.kadaluarsa,l.margin,l.harga_cost');
        $this->db->from('list_logistik l,tindakan_farmasi t, obat_bebas r');
        $this->db->where(' t.id_list_tindakan=l.id_logistik');
        $this->db->where(' t.id_pelayanan=r.id_obat_bebas');

        $this->db->where(' r.id_obat_bebas', $id_resep);
        $this->db->group_by('t.id_list_tindakan');
        $this->db->having('stok>0');
        $this->db->order_by('nama');

        return $this->db->get()->result_array();
    }

    public function selectLaporanKunjunganApotik()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT ps.nama pasien, ps.no_rm, p.tgl_masuk,ps.jenis_kelamin, d.nama dokter, c.nama cara_bayar, 'RESEP' keterangan, h.jenis_pelayanan
        FROM pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, resep_obat r
        WHERE h.id_pelayanan=p.id_pelayanan and r.id_pelayanan=p.id_pelayanan and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter and ps.no_rm=p.id_pasien and p.tgl_masuk like '%$tgl%' and r.depo='APOTIK'
        UNION
        SELECT b.nama pasien, '-' no_rm,b.tanggal tgl_masuk, '-' jenis_kelamin, b.dpjp dokter, c.nama cara_bayar, 'BEBAS' keterangan, t.jenis_pelayanan
        FROM cara_bayar c, obat_bebas b, tindakan_farmasi t
        WHERE b.cara_bayar=c.id_cara_bayar and b.id_obat_bebas=t.id_pelayanan and b.tanggal like '%$tgl%' and t.id_resep='obat_bebas' and b.unit='APOTIK'
        GROUP by b.id_obat_bebas
        UNION
        SELECT ps.nama pasien, ps.no_rm ,p.tgl_masuk, ps.jenis_kelamin, d.nama dokter, c.nama cara_bayar, 'MANUAL' keterangan, h.jenis_pelayanan
        FROM pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, tindakan_farmasi t
        WHERE h.id_pelayanan=p.id_pelayanan and t.id_pelayanan=p.id_pelayanan and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter and ps.no_rm=p.id_pasien and t.tanggal like '%$tgl%' and t.id_resep='obat farmasi' and t.depo='APOTIK'
        GROUP by t.id_pelayanan
        order by tgl_masuk asc
        ");
        return $query->result();
    }

    public function selectRangeLaporanKunjunganApotik($mulai, $akhir)
    {
        $query =  $this->db->query("SELECT ps.nama pasien, ps.no_rm, p.tgl_masuk, ps.jenis_kelamin, d.nama dokter, c.nama cara_bayar, 'RESEP' keterangan, h.jenis_pelayanan
        FROM pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, resep_obat r
        WHERE h.id_pelayanan=p.id_pelayanan and r.id_pelayanan=p.id_pelayanan and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter and ps.no_rm=p.id_pasien and p.tgl_masuk >= '$mulai' and p.tgl_masuk <= '$akhir' and r.depo='APOTIK'
        UNION
        SELECT b.nama pasien, '-' no_rm, b.tanggal tgl_masuk, '-' jenis_kelamin, b.dpjp dokter, c.nama cara_bayar, 'BEBAS' keterangan, t.jenis_pelayanan
        FROM cara_bayar c, obat_bebas b, tindakan_farmasi t
        WHERE b.cara_bayar=c.id_cara_bayar and b.id_obat_bebas=t.id_pelayanan and b.tanggal >= '$mulai' and b.tanggal <= '$akhir' and t.id_resep='obat_bebas' and b.unit='APOTIK'
        GROUP by b.id_obat_bebas
        UNION
        SELECT ps.nama pasien, ps.no_rm,p.tgl_masuk, ps.jenis_kelamin, d.nama dokter, c.nama cara_bayar, 'MANUAL' keterangan, h.jenis_pelayanan
        FROM pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, tindakan_farmasi t
        WHERE h.id_pelayanan=p.id_pelayanan and t.id_pelayanan=p.id_pelayanan and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter and ps.no_rm=p.id_pasien and t.tanggal >= '$mulai' and t.tanggal <= '$akhir' and t.id_resep='obat farmasi' and t.depo='APOTIK'
        GROUP by t.id_pelayanan
        order by tgl_masuk asc
        ");
        return $query->result();
    }
    // End

    //fastmoving
    // public function selectStok($stok)
    // {
    //     $this->db->select('l.*, sum(a.frek) stok');
    //     $this->db->from($stok . ' a,list_logistik l');
    //     $this->db->where('a.id_logistik=l.id_logistik');
    //     $this->db->where('l.status', 'AKTIF');
    //     $this->db->group_by('l.id_logistik');
    //     $this->db->order_by('nama');

    //     return $this->db->get()->result();
    // }

    //FASTMOVING
    public function selectLaporanFastmoving($bulan1, $bulan2)
    {
        date_default_timezone_set('Asia/Jakarta');

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
        $query =  $this->db->query("SELECT nama,id_logistik,count(id_logistik) transaksi_per_bulan, keterangan,produsen,harga_cost,ppn,satuan_terkecil,satuan_terbesar,kadaluarsa from (
            SELECT year(s.tgl),month(s.tgl),count(s.id_stok) transaksi , s.keterangan,s.kadaluarsa, l.*
        FROM `$stok` s
        right join list_logistik l on s.id_logistik = l.id_logistik
        WHERE (s.keterangan ='KELUAR' or s.keterangan ='MUTASI')
        and DATE_FORMAT(s.tgl, '%Y-%m')  BETWEEN '$bulan1' AND '$bulan2'
        group by year(s.tgl),month(s.tgl),l.id_logistik
        order by l.nama
        ) as gabung
        GROUP BY id_logistik HAVING COUNT(id_logistik) = 3
        ");
        return $query->result();
    }

    //SLOW MOVING
    public function selectLaporanSlowmoving($bulan1, $bulan2)
    {
        date_default_timezone_set('Asia/Jakarta');

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
        $query =  $this->db->query("SELECT nama,id_logistik,count(id_logistik) transaksi_per_bulan, keterangan,produsen,harga_cost,ppn,satuan_terkecil,satuan_terbesar,kadaluarsa from (
            SELECT year(s.tgl),month(s.tgl),count(s.id_stok) transaksi , s.keterangan,s.kadaluarsa, l.*
        FROM `$stok` s
        right join list_logistik l on s.id_logistik = l.id_logistik
        WHERE (s.keterangan ='KELUAR' or s.keterangan ='MUTASI')
        and DATE_FORMAT(s.tgl, '%Y-%m')  BETWEEN '$bulan1' AND '$bulan2'
        GROUP BY year(s.tgl),month(s.tgl),l.id_logistik
        ORDER BY l.nama
        ) AS gabung
        GROUP BY id_logistik HAVING COUNT(id_logistik) < 3
        ");
        return $query->result();
    }

    //DeadStock
    public function selectLaporanDeadStock($bulan1, $bulan2)
    {
        date_default_timezone_set('Asia/Jakarta');

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
        $query =  $this->db->query(" SELECT nama,id_logistik,count(id_logistik) transaksi_per_bulan,keterangan,produsen,harga_cost,ppn,satuan_terkecil,satuan_terbesar,kadaluarsa from (
            SELECT year(s.tgl),month(s.tgl),count(s.keterangan='MASUK') masuk, s.keterangan,s.kadaluarsa, l.*
        FROM `$stok` s,
        list_logistik l
         WHERE s.id_logistik = l.id_logistik 
         and DATE_FORMAT(s.tgl, '%Y-%m')  BETWEEN '$bulan1' AND '$bulan2'
        GROUP BY l.id_logistik
        ORDER BY l.nama
        ) AS gabung
        WHERE masuk =1
        GROUP BY id_logistik
        ");
        return $query->result();
    }
    public function selectPasienHomecare() //igd
    {
        $query =  $this->db->query("SELECT p.*,c.nama AS caraBayar,r.tgl_req tanggal
        from homecare p, cara_bayar c ,resep_obat r 
        where c.id_cara_bayar = p.cara_bayar 
        and p.status_rawat = 0 
        and p.id_pasien = r.id_pelayanan 
        and r.status = 1
        ");
        return $query->result();
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

    public function selectRangePasienRajal($mulai, $akhir) //poli
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->order_by('tanggal desc');
        $this->db->group_by('id_history');
        if ($mulai != '' && $akhir != '') {
            $this->db->where(' tanggal >= ', $mulai);
            $this->db->where(' tanggal <=', $akhir);
        } else { 
            $this->db->like(' tanggal ', $tgl);
        }

        return $this->db->get('v_rajal_apotik')->result();
    }
 public function selectPasienIgd() //igd
{
    $query =  $this->db->query("
        SELECT 
            b.id_pelayanan,
            h.id_history,
            c.id_cara_bayar,
            '-' AS nama_poli,
            h.tgl_masuk,
            p.no_rm,
            p.nama,
            p.jenis_kelamin,
            p.tgl_lahir,
            p.agama,
            h.jenis_pelayanan,
            dok.nama nama_dokter,
            b.no_sep,
            b.diagnosa,
            c.nama AS cara_bayar,
            '-' AS poli,
            b.keterangan,
            b.tipe,
            p.alamat,
            r.tgl_req tanggal,
            p.kode AS kode_pasien   -- ✅ tambahkan ini
        FROM pasien p 
        JOIN pelayanan b ON p.no_rm = b.id_pasien
        JOIN history_pelayanan_ugd h ON h.id_pelayanan = b.id_pelayanan
        JOIN cara_bayar c ON c.id_cara_bayar = b.cara_bayar
        JOIN dokter dok ON h.dpjp = dok.id_dokter
        JOIN resep_obat r ON b.id_pelayanan = r.id_pelayanan AND h.id_history = r.id_history
        WHERE 
            (b.status_rawat = 'dirawat' OR b.status_rawat = 'dikembalikan')
            AND b.status = 1
            AND r.status = 1
            AND h.status = 1
    ");
    return $query->result();
}

    public function selectObatBebas($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        if ($perequest == "apotik") {
            $stok = "APOTIK";
        } else if ($perequest == "deporanap") {
            $stok = "DEPO RANAP";
        }

        $this->db->select('o.*, c.nama carabayar');
        $this->db->from('obat_bebas o, cara_bayar c');
        $this->db->where('o.cara_bayar = c.id_cara_bayar');
        if ($perequest == "apotik" && $perequest == "deporanap") {
            $this->db->where('o.unit', $stok);
        }
        if ($mulai != '' && $akhir != '') {
            $this->db->where('tanggal >=', $mulai);
            $this->db->where('tanggal <=', $akhir);
        } else {
            $this->db->like(' tanggal ', $tgl);
        }
        $this->db->order_by('tanggal desc');
        return $this->db->get()->result();
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
        $this->db->select('r.*, p.cara_bayar,s.nama');
        $this->db->from('resep_obat r, pelayanan p,staff s');
        $this->db->where('r.id_pelayanan = p.id_pelayanan');
        $this->db->where('r.id_staff = s.id_staff');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        $this->db->where('r.id_history', $id_history);
        $this->db->where('r.status = 1');
        $this->db->where('r.jenis_resep != 4');
        // $this->db->where('r.jenis_resep != 0');
        $this->db->order_by('r.tanggal desc');
        return $this->db->get()->result();
    }
    public function selectObatByResep($id_resep)
    {
        $this->db->select('t.*, l.nama,l.ppn, s.nama staff, si.tindakan,r.jenis_resep ');
        $this->db->from('resep_obat r, tindakan_farmasi t, list_logistik l , staff s, signa_obat si');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('t.id_signa = si.id_signa');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }

    //yohanes1
// ambil data pasien by kode (masih perlu karena dipanggil di controller)
// ambil data pasien by kode (masih perlu karena dipanggil di controller)
public function getPasienByKode($kode_pasien)
{
    return $this->db->get_where('pasien', ['kode' => $kode_pasien])->row_array();
}

// ambil data edukasi pasien berdasarkan no_rm (hanya 1 terakhir)
public function getEdukasiByNoRMHistory($no_rm, $id_history)
{
    return $this->db
        ->get_where('topik_edukasi_ugd', [
            'no_rm' => $no_rm,
            'id_history' => $id_history
        ])->row_array();
}



// insert atau update data edukasi (pakai no_rm)
public function saveOrUpdateEdukasiByHistory($data)
{
    $cek = $this->db->get_where('topik_edukasi_ugd', [
        'no_rm' => $data['no_rm'],
        'id_history' => $data['id_history']
    ])->row();

    if ($cek) {
        $this->db->where('id_edukasi', $cek->id_edukasi);
        return $this->db->update('topik_edukasi_ugd', $data);
    } else {
        return $this->db->insert('topik_edukasi_ugd', $data);
    }
}



    public function selectObatByResep_kronis($id_resep)
    {
        $this->db->select('t.*, l.nama, s.nama staff, si.tindakan,r.jenis_resep ');
        $this->db->from('resep_obat r, tindakan_farmasi_kronis t, list_logistik l , staff s, signa_obat si');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('t.id_signa = si.id_signa');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->where('l.status', 'AKTIF');
        $this->db->where('t.tgl_acc', null);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function selectObatBebasById($id)
    {
        $this->db->select('t.*, l.nama, s.nama staff, si.tindakan signa,c.cara_pemakaian');
        $this->db->from('obat_bebas o, tindakan_farmasi t, list_logistik l , staff s, signa_obat si, cara_pemakaian_obat c');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_signa=si.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_pelayanan = o.id_obat_bebas');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.frek>0');
        $this->db->where('t.id_resep', 'obat_bebas');
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
    public function update_selesai($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function update_selesai_sgt($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function update_done($data, $where, $table)
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
        $this->db->select('pas.nama,pas.no_rm, p.tgl_masuk, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat,  pas.tgl_lahir,s.tindakan id_signa, c.cara_pemakaian id_cara_pakai');
        $this->db->from('pasien pas, pelayanan p, tindakan_farmasi f,  list_logistik l ,  resep_obat r,signa_obat s, cara_pemakaian_obat c');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('r.id_resep=f.id_resep');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_signa=s.id_signa');
        $this->db->where('f.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('f.id_tindakan_farmasi', $id_tindakan);

        return $this->db->get()->row_array();
    }
    public function getSignaByResep($id_resep)
    {
        $this->db->select('pas.nama,pas.no_rm, p.tgl_masuk, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat,  pas.tgl_lahir, s.tindakan id_signa, c.cara_pemakaian id_cara_pakai');
        $this->db->from('pasien pas, pelayanan p, tindakan_farmasi f , list_logistik l ,  resep_obat r, signa_obat s, cara_pemakaian_obat c');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('r.id_resep=f.id_resep');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_signa=s.id_signa');
        $this->db->where('f.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('f.id_resep', $id_resep);

        return $this->db->get()->result_array();
    }
    public function getSignaObatBebasById($id_tindakan)
    {
        $this->db->select('o.nama,o.tanggal, o.id_obat_bebas, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat, s.tindakan id_signa, c.cara_pemakaian id_cara_pakai');
        $this->db->from('obat_bebas o, tindakan_farmasi f , list_logistik l ,signa_obat s, cara_pemakaian_obat c ');
        $this->db->where('o.id_obat_bebas=f.id_pelayanan');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_signa=s.id_signa');
        $this->db->where('f.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('f.id_tindakan_farmasi', $id_tindakan);

        return $this->db->get()->row_array();
    }
    public function getSignaObatBebasByPasien($id_pelayanan)
    {
        $this->db->select('o.nama,o.tanggal, o.id_obat_bebas, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat, s.tindakan id_signa, c.cara_pemakaian id_cara_pakai');
        $this->db->from('obat_bebas o, tindakan_farmasi f , list_logistik l,signa_obat s, cara_pemakaian_obat c ');
        $this->db->where('o.id_obat_bebas=f.id_pelayanan');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_signa=s.id_signa');
        $this->db->where('f.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('f.id_pelayanan', $id_pelayanan);

        return $this->db->get()->result_array();
    }
    public function getResepById($id_resep)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, sum(t.frek_req) frek_req,l.nama obat, t.id_signa, s.tindakan, c.cara_pemakaian,t.keterangan');
        $this->db->from('tindakan_farmasi t, list_logistik l, resep_obat r, signa_obat s,cara_pemakaian_obat c');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_signa=s.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep', $id_resep);
        $this->db->where_not_in('t.frek', 0);
        $this->db->group_by('t.id_list_tindakan');
        $this->db->having('frek !=0');
        return $this->db->get()->result_array();
    }
    public function getResepById_copy($id_resep)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, sum(t.frek_req) frek_req,l.nama obat, t.id_signa, s.tindakan, c.cara_pemakaian,t.keterangan,l.satuan_terkecil satuan');
        $this->db->from('tindakan_farmasi t, list_logistik l, resep_obat r, signa_obat s,cara_pemakaian_obat c');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_signa=s.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep', $id_resep);
        $this->db->where_not_in('t.tgl_hapus', null);
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }
    public function getResepReturById($id_resep)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, sum(t.frek_req) frek_req,l.nama obat, t.id_signa, s.tindakan, c.cara_pemakaian,t.keterangan');
        $this->db->from('tindakan_farmasi t, list_logistik l, resep_obat r, signa_obat s,cara_pemakaian_obat c');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_signa=s.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep', $id_resep);
        $this->db->where('t.frek<0');
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }
    public function getReturBebasById($id_resep)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, sum(t.frek_req) frek_req,l.nama obat, t.id_signa, s.tindakan, c.cara_pemakaian,t.keterangan');
        $this->db->from('tindakan_farmasi t, list_logistik l, resep_obat r, signa_obat s,cara_pemakaian_obat c');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_signa=s.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep', $id_resep);
        $this->db->where('t.frek<0');
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }
    public function getResepDokterById($id_resep)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, l.nama obat, t.id_signa, s.tindakan, c.cara_pemakaian,t.keterangan, l.satuan_terkecil satuan');
        $this->db->from('tindakan_farmasi_kronis t, list_logistik l, resep_obat r, signa_obat s,cara_pemakaian_obat c');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_signa=s.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('l.status', 'AKTIF');
        $this->db->where('t.id_resep', $id_resep);
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }
    public function getData_copyresep($id_resep)
    {
        $query =  $this->db->query("SELECT a.obat obat_1,a.frek frek_1,a.tindakan signa_1,a.cara_pemakaian cara_1, b.obat obat_2,b.frek frek_2,b.tindakan signa_2,b.cara_pemakaian cara_2 FROM (
            SELECT 
                SUM(t.total) AS total, 
                SUM(t.frek) AS frek, 
                l.nama AS obat, 
                t.id_signa, 
                s.tindakan, 
                c.cara_pemakaian, 
                t.keterangan, 
                l.satuan_terkecil AS satuan, t.id_tindakan_farmasi
            FROM 
                tindakan_farmasi_kronis t
            JOIN 
                resep_obat r ON r.id_resep = t.id_resep
            JOIN 
                list_logistik l ON t.id_list_tindakan = l.id_logistik
            JOIN 
                signa_obat s ON t.id_signa = s.id_signa
            JOIN 
                cara_pemakaian_obat c ON t.id_cara_pakai = c.id_cara_pemakaian
            WHERE 
                l.status = 'AKTIF'
                AND t.id_resep ='$id_resep'
            GROUP BY 
                t.id_list_tindakan)
            as a
            
            join 
            (SELECT SUM(t.total) AS total, SUM(t.frek) AS frek, SUM(t.frek_req) AS frek_req, l.nama AS obat, t.id_signa, s.tindakan, c.cara_pemakaian, t.keterangan, l.satuan_terkecil AS satuan, t.id_tindakan_farmasi FROM tindakan_farmasi t, list_logistik l, resep_obat r, signa_obat s, cara_pemakaian_obat c WHERE r.id_resep = t.id_resep AND t.id_list_tindakan = l.id_logistik AND t.id_signa = s.id_signa AND t.id_cara_pakai = c.id_cara_pemakaian 
                           AND t.id_resep ='$id_resep' GROUP BY t.id_list_tindakan) as b
                           on a.id_tindakan_farmasi = b.id_tindakan_farmasi
            
            
        ");
        return $query->result_array();
    }

    public function getDataByIdResep($id_resep, $id_history)
    {
        $query =  $this->db->query("SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat, pa.jenis_kelamin,c.nama  cara_bayar, lp.nama_panjang ruang, a.nama asal,d.nama dokter, d.foto, r.tgl_req tanggal
        from pasien pa, pelayanan p, dokter d,cara_bayar c, list_poli lp, asal_pasien  a, history_pelayanan h, resep_obat r  
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=r.id_pelayanan  and lp.id_list_poli=h.nama_poli and r.id_resep = $id_resep and h.id_history = '$id_history'
        UNION
        SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat, pa.jenis_kelamin,c.nama  cara_bayar,'UGD' ruang, a.nama asal,d.nama dokter, d.foto, r.tgl_req tanggal
        from pasien pa, pelayanan p, dokter d,cara_bayar c,  asal_pasien  a, history_pelayanan_ugd h, resep_obat r  
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=r.id_pelayanan and r.id_resep = $id_resep and h.id_history = '$id_history'
        UNION
        SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat, pa.jenis_kelamin,c.nama  cara_bayar, ru.tipe ruang,a.nama asal,d.nama dokter, d.foto, r.tgl_req tanggal
        from pasien pa, pelayanan p, dokter d,cara_bayar c,  asal_pasien  a, history_pelayanan_ranap h, resep_obat r, ruangan ru
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=r.id_pelayanan and h.id_kamar=ru.id_ruangan and r.id_resep = $id_resep and h.id_history = '$id_history'
        ");
        return $query->row_array();
    }


    public function getDataObatBebas($id)
    {
        $this->db->select('o.*, c.nama cara_bayar, "" as no_rm');
        $this->db->from('obat_bebas o, cara_bayar c');
        $this->db->where('o.cara_bayar = c.id_cara_bayar');
        $this->db->where('o.id_obat_bebas', $id);

        return $this->db->get()->row_array();
    }
    public function getObatBebasById($id)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, l.nama obat');
        $this->db->from('tindakan_farmasi t, list_logistik l, obat_bebas o');
        $this->db->where('o.id_obat_bebas=t.id_pelayanan');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_pelayanan', $id);
        $this->db->group_by('t.id_list_tindakan');
        $this->db->having('frek>0');

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
        $this->db->select('ra.*, s.tindakan, c.cara_pemakaian,r.status,r.id_history,r.tanggal tgl_resep');
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
        $data_staff = $this->session->userdata('data_auth');
        if ($data_staff->tipe == "deporanap") {
            $id_struk = "id_req";
            $stok = "stok_depo";
        } else if ($data_staff->tipe == "apotik") {
            $id_struk = "id_req";
            $stok = "stok_apotik";
        } else {
            $stok = "stok_apotik";
        }
        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
        $this->db->from($stok . ' sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        $this->db->where('l.status', 'AKTIF');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('stok desc');
        return $this->db->get()->result_array();
    }

    public function getNamaObatUnit($stok)
    {
        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
        $this->db->from($stok . ' sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        $this->db->where('l.status', 'AKTIF');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('stok desc');
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
            $this->db->where('l.status', 'AKTIF');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('stok desc');
            return $this->db->get()->result();
        } else if ($depo == 'GUDANG'){
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
            $this->db->from('stok_logistik sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->where('l.status', 'AKTIF');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('stok desc');
            return $this->db->get()->result();
        
        } else {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
            $this->db->from('stok_depo sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->where('l.status', 'AKTIF');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('stok desc');
            return $this->db->get()->result();
        }
    }
    public function getExpByObat($obat, $stok)
    {
        $this->db->select('sum(s.frek) stok, max(s.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.id_logistik,l.nama');
        $this->db->from($stok . ' s, list_logistik l');
        $this->db->where(' s.id_logistik=l.id_logistik');
        $this->db->where(' s.id_logistik', $obat);
        $this->db->group_by('s.id_stok');
        return $this->db->get()->row();
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
    public function getDataObatKronis($id_tindakan)
    {
        $this->db->select('t.*,l.nama, s.tindakan');
        $this->db->from('tindakan_farmasi_kronis t, list_logistik l, signa_obat s');
        $this->db->where(' t.id_list_tindakan=l.id_logistik');
        $this->db->where(' t.id_signa=s.id_signa');
        $this->db->where('l.status', 'AKTIF');
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
    public function getSumObatGudang($obat)
    {
        $this->db->select('sum(frek) stok');
        $this->db->from('stok_logistik');
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
        $this->db->select('v.*,n.no_nota');
        $this->db->from('v_riwayat_pasien_apotik v');
        $this->db->join('nota_resep n', 'v.id_nota = n.id_nota_resep', 'left');
        $this->db->like(' v.tanggal ', $tgl);
        return $this->db->get()->result();
    }
    public function selectRangeRiwayatPasien($mulai, $akhir)
    {
        $this->db->select('v.*,n.no_nota');
        $this->db->from('v_riwayat_pasien_apotik v');
        $this->db->join('nota_resep n', 'v.id_nota = n.id_nota_resep', 'left');
        $this->db->where('v.tanggal >=', $mulai);
        $this->db->where('v.tanggal <=', $akhir);
        return $this->db->get()->result();
    }
    public function selectRiwayatPasienById($id_resep)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_farmasi t, list_logistik l, pelayanan p , staff s,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->order_by('t.tanggal desc');
        return $this->db->get()->result();
    }
    public function selectRiwayatPasienReturById($id_resep)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_farmasi t, list_logistik l, pelayanan p , staff s,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('t.frek<0');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->order_by('t.tanggal desc');
        return $this->db->get()->result();
    }
    public function selectRiwayatPasienReturBebasById($id_resep)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_farmasi t, list_logistik l, obat_bebas p , staff s');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_pelayanan=p.id_obat_bebas');
        $this->db->where('t.frek<0');
        $this->db->where('p.id_obat_bebas', $id_resep);
        $this->db->order_by('t.tanggal desc');
        return $this->db->get()->result();
    }
    public function getObatReturBebasById($id_resep)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('t.*, l.nama obat, s.nama staff');
        $this->db->from('tindakan_farmasi t, list_logistik l, obat_bebas p , staff s');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_pelayanan=p.id_obat_bebas');
        $this->db->where('t.frek<0');
        $this->db->where('p.id_obat_bebas', $id_resep);
        $this->db->order_by('t.tanggal desc');
        return $this->db->get()->result_array();
    }
    public function selectResepReturById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama , s.nama staff, si.tindakan,c.cara_pemakaian');
        $this->db->from('tindakan_farmasi t, list_logistik l , staff s, signa_obat si, cara_pemakaian_obat c');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_signa=si.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep', $id_pelayanan);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function getTotalTindakanById($id_resep)
    {
        $this->db->select('sum(t.total) total');
        $this->db->from('tindakan_farmasi t, resep_obat r');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('r.id_resep', $id_resep);
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
        $this->db->select('t.*, l.nama obat,s.tindakan signa, c.cara_pemakaian');
        $this->db->from('tindakan_farmasi t, list_logistik l, pelayanan p,resep_obat r, cara_pemakaian_obat c, signa_obat s');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_signa=s.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('t.frek >=0');
        $this->db->where('r.id_pelayanan', $id_pelayanan);

        return $this->db->get()->result_array();
    }
    //Riwayat Pasien pulang
    public function selectRiwayatPasienPulang($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");

        $this->db->select('v.*,n.no_nota');
        $this->db->from('v_riwayat_pasien_pulang v');
        $this->db->join('nota_resep n', 'v.id_nota = n.id_nota_resep', 'left');
        if ($mulai != '' && $akhir != '') {
            $this->db->where('v.tanggal >=', $mulai);
            $this->db->where('v.tanggal <=', $akhir);
        } else {
            $this->db->like(' v.tanggal ', $tgl);
        }
        return $this->db->get()->result();
    }
    public function selectRiwayatResepManual($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('v.*,n.no_nota');
        $this->db->from('v_kunjungan v');
        $this->db->join('tindakan_farmasi t', 't.poli = v.id_history and t.id_resep like "%obat farmasi%"');
        $this->db->join('nota_resep n', 'v.id_pelayanan = n.id_pelayanan', 'left');
        $this->db->where('v.status_rawat ', 'selesai');
        if ($mulai != '' && $akhir != '') {
            $this->db->where('v.tgl_masuk >=', $mulai);
            $this->db->where('v.tgl_masuk <=', $akhir);
        } else {
            $this->db->like(' v.tgl_masuk ', $tgl);
        }
        $this->db->group_by('v.id_history');

        return $this->db->get()->result();
    }
    // public function selectRiwayatPasienPulangById($id_pelayanan)
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $tgl = date("Y-m-d");
    //     $this->db->select('t.*, l.nama, s.nama staff');
    //     $this->db->from('tindakan_farmasi t, list_logistik l, pelayanan p , staff s, resep_obat r');
    //     $this->db->where('p.id_pelayanan=r.id_pelayanan');
    //     $this->db->where('l.id_logistik=t.id_list_tindakan');
    //     $this->db->where('s.id_staff=t.id_staff');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('r.id_pelayanan', $id_pelayanan);
    //     $this->db->order_by('t.tanggal desc');
    //     return $this->db->get()->result();
    // }
    // public function getTotalTindakanPulangById($id_pelayanan)
    // {
    //     $this->db->select('sum(t.total) total');
    //     $this->db->from('tindakan_farmasi t, resep_obat r');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('r.id_pelayanan', $id_pelayanan);
    //     return $this->db->get()->result();
    // }
    public function getDataRiwayatPulangById($id_pelayanan, $id_history)
    {
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_history', $id_history);
        return $this->db->get('v_riwayat_pasien_pulang')->row_array();
    }
    // public function getRiwayatPulangById($id_pelayanan)
    // {
    //     $this->db->select('t.*, l.nama obat,s.tindakan signa, c.cara_pemakaian');
    //     $this->db->from('tindakan_farmasi t, list_logistik l, pelayanan p,resep_obat r, cara_pemakaian_obat c, signa_obat s');
    //     $this->db->where('p.id_pelayanan=r.id_pelayanan');
    //     $this->db->where('t.id_list_tindakan=l.id_logistik');
    //     $this->db->where('t.id_signa=s.id_signa');
    //     $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('t.frek >=0');
    //     $this->db->where('r.id_pelayanan', $id_pelayanan);

    //     return $this->db->get()->result_array();
    // }

    ////tindakan signaobat 
    public function selectTindakansignaobat()
    {
        $this->db->select('*');
        // $this->db->where('status', 'AKTIF');
        $this->db->from('signa_obat');
        // $this->db->order_by('nama_tindakan');
        return $this->db->get()->result();
    }
    public function selectDataTindakansignaobat($id)
    {
        $this->db->where('id_signa', $id);
        return $this->db->get('signa_obat')->result();
    }
    public function update_tindakan($id, $data)
    {
        $this->db->where('id_list_tindakan', $id);
        return $this->db->update('list_tindakan_homecare', $data);
    }
    public function insert_tindakan_signaobat($data, $table)
    {
        $this->db->insert($table, $data);
    }
    //Stok Obat Apotik
    public function selectStokApotik()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama, l.id_logistik, sum(a.frek) stok  ,l.satuan_terkecil tipe,l.golongan_obat,l.produsen');
        $this->db->from('stok_apotik a, list_logistik l');
        $this->db->where('a.id_logistik=l.id_logistik');
        $this->db->where('l.status', 'AKTIF');
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
        $this->db->where('l.status', 'AKTIF');
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
        $this->db->where('l.status', 'AKTIF');
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
        $this->db->where('l.status', 'AKTIF');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    // Laporan pasien rajal
    // public function selectLaporanPasienRajal()
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $tgl = date("Y-m-d");
    //     $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
    //     $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c,resep_obat r');
    //     $this->db->where('p.id_pelayanan=r.id_pelayanan');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('h.id_pelayanan=p.id_pelayanan');
    //     $this->db->where('c.id_cara_bayar=p.cara_bayar');
    //     $this->db->where('ps.no_rm=p.id_pasien');
    //     $this->db->where('d.id_dokter=h.dpjp');
    //     $this->db->where('l.id_logistik=t.id_list_tindakan');
    //     $this->db->where('p.status_rawat', 'selesai');
    //     $this->db->where_not_in('l.id_logistik', 'setrip1');
    //     $this->db->like(' p.tgl_masuk ', $tgl);
    //     $this->db->order_by('t.tanggal ');
    //     return $this->db->get()->result();
    // }

    // public function selectRangeLaporanPasienRajal($mulai, $akhir)
    // {
    //     $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.standar, l.kode, l.distributor,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
    //     $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c,resep_obat r');
    //     $this->db->where('p.id_pelayanan=r.id_pelayanan');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('h.id_pelayanan=p.id_pelayanan');
    //     $this->db->where('c.id_cara_bayar=p.cara_bayar');
    //     $this->db->where('ps.no_rm=p.id_pasien');
    //     $this->db->where('d.id_dokter=h.dpjp');
    //     $this->db->where('l.id_logistik=t.id_list_tindakan');
    //     $this->db->where('p.status_rawat', 'selesai');
    //     $this->db->where_not_in('l.id_logistik', 'setrip1');
    //     $this->db->where('p.tgl_masuk >=', $mulai);
    //     $this->db->where('p.tgl_masuk <=', $akhir);
    //     $this->db->order_by('t.tanggal ');
    //     return $this->db->get()->result();
    // }
    // public function selectLaporanPasienIgd()
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $tgl = date("Y-m-d");
    //     $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
    //     $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ugd h , pasien ps, dokter d, cara_bayar c,resep_obat r');
    //     $this->db->where('p.id_pelayanan=r.id_pelayanan');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('h.id_pelayanan=p.id_pelayanan');
    //     $this->db->where('c.id_cara_bayar=p.cara_bayar');
    //     $this->db->where('ps.no_rm=p.id_pasien');
    //     $this->db->where('d.id_dokter=h.dpjp');
    //     $this->db->where('l.id_logistik=t.id_list_tindakan');
    //     $this->db->where('p.status_rawat', 'selesai');
    //     $this->db->where_not_in('l.id_logistik', 'setrip1');
    //     $this->db->like(' p.tgl_masuk ', $tgl);
    //     $this->db->order_by('t.tanggal ');
    //     return $this->db->get()->result();
    // }

    // public function selectRangeLaporanPasienIgd($mulai, $akhir)
    // {
    //     $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.standar, l.kode, l.distributor,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
    //     $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ugd h , pasien ps, dokter d, cara_bayar c,resep_obat r');
    //     $this->db->where('p.id_pelayanan=r.id_pelayanan');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('h.id_pelayanan=p.id_pelayanan');
    //     $this->db->where('c.id_cara_bayar=p.cara_bayar');
    //     $this->db->where('ps.no_rm=p.id_pasien');
    //     $this->db->where('d.id_dokter=h.dpjp');
    //     $this->db->where('l.id_logistik=t.id_list_tindakan');
    //     $this->db->where('p.status_rawat', 'selesai');
    //     $this->db->where_not_in('l.id_logistik', 'setrip1');
    //     $this->db->where('p.tgl_masuk >=', $mulai);
    //     $this->db->where('p.tgl_masuk <=', $akhir);
    //     $this->db->order_by('t.tanggal ');
    //     return $this->db->get()->result();
    // }
    // // End
    // public function selectLaporanPasienRanap()
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $tgl = date("Y-m-d");
    //     $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.standar,l.kode, l.distributor,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
    //     $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ranap h , pasien ps, dokter d, cara_bayar c, resep_obat r');
    //     $this->db->where('p.id_pelayanan=r.id_pelayanan');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('h.id_pelayanan=p.id_pelayanan');
    //     $this->db->where('c.id_cara_bayar=p.cara_bayar');
    //     $this->db->where('ps.no_rm=p.id_pasien');
    //     $this->db->where('d.id_dokter=h.dpjp');
    //     $this->db->where('l.id_logistik=t.id_list_tindakan');
    //     $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
    //     // $this->db->where('p.status_rawat', 'selesai');
    //     $this->db->where_not_in('l.id_logistik', 'setrip1');
    //     $this->db->like(' t.tanggal ', $tgl);
    //     $this->db->order_by('ps.nama, t.tanggal ');
    //     return $this->db->get()->result();
    // }

    // public function selectRangeLaporanPasienRanap($mulai, $akhir)
    // {
    //     $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.standar,l.kode, l.distributor,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
    //     $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ranap h , pasien ps, dokter d, cara_bayar c, resep_obat r');
    //     $this->db->where('p.id_pelayanan=r.id_pelayanan');
    //     $this->db->where('t.id_resep=r.id_resep');
    //     $this->db->where('h.id_pelayanan=p.id_pelayanan');
    //     $this->db->where('c.id_cara_bayar=p.cara_bayar');
    //     $this->db->where('ps.no_rm=p.id_pasien');
    //     $this->db->where('d.id_dokter=h.dpjp');
    //     $this->db->where('l.id_logistik=t.id_list_tindakan');
    //     $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
    //     // $this->db->where('p.status_rawat', 'selesai');
    //     $this->db->where_not_in('l.id_logistik', 'setrip1');
    //     $this->db->where('t.tanggal  >=', $mulai);
    //     $this->db->where('t.tanggal  <=', $akhir);
    //     $this->db->order_by('t.tanggal ');
    //     return $this->db->get()->result();
    // }
    // End


    //LAPORAN OBAT IGD
    public function selectLaporanPasienObatRanap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT r.id_history, ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama, n.no_nota,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, ru.tipe ruangan, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan_ranap hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l, resep_obat r, ruangan ru, nota_resep n
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar and n.id_nota_resep=r.id_nota AND hs.id_kamar=ru.id_ruangan AND p.id_pelayanan=r.id_pelayanan AND hs.id_history = r.id_history and r.id_resep=t.id_resep AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien AND t.tanggal like '%$tgl%' 
        UNION ALL
        SELECT r.id_history, ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama, n.no_nota,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, 'UGD' ruangan, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan_ugd hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l, resep_obat r, nota_resep n
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar and n.id_nota_resep=r.id_nota  AND p.id_pelayanan=r.id_pelayanan AND hs.id_history = r.id_history and r.id_resep=t.id_resep AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien AND t.tanggal like '%$tgl%'
        group by t.id_tindakan_farmasi
        order by tanggal
        ");
        return $query->result();
    }

    public function selectRangeLaporanPasienObatRanap($mulai, $akhir)
    {
        $query =  $this->db->query("SELECT r.id_history, ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter,  l.nama,n.no_nota,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, ru.tipe ruangan, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan_ranap hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l, resep_obat r,ruangan ru, nota_resep n
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar 
        and n.id_nota_resep=r.id_nota AND hs.id_kamar=ru.id_ruangan AND p.id_pelayanan=r.id_pelayanan AND hs.id_history = r.id_history and r.id_resep=t.id_resep AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien AND t.tanggal>='$mulai' AND t.tanggal<='$akhir'
        UNION ALL
        SELECT r.id_history, ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,n.no_nota,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, 'UGD' ruangan, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan_ugd hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l, resep_obat r, nota_resep n
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar and n.id_nota_resep=r.id_nota 
        AND p.id_pelayanan=r.id_pelayanan AND hs.id_history = r.id_history and r.id_resep=t.id_resep AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien AND t.tanggal>='$mulai' AND t.tanggal<='$akhir'
        group by t.id_tindakan_farmasi
        order by tanggal
        ");
        return $query->result();
    }

    // LAPORAN OBAT PASIEN POLI
    public function selectLaporanPasienObatApotik()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l, resep_obat r
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar AND p.id_pelayanan=r.id_pelayanan 
        AND r.id_resep=t.id_resep AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien AND hs.id_history = r.id_history AND p.status=1 AND t.tgl_acc IS NOT NULL AND t.tanggal like '%$tgl%' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap )
        UNION ALL
        SELECT ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar  
        AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien AND p.status=1 AND t.id_resep like '%obat farmasi%' AND t.tanggal like '%$tgl%' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap )
        group by t.id_tindakan_farmasi
        order by tanggal asc
        ");
        return $query->result();
    }

    public function selectRangeLaporanPasienObatApotik($mulai, $akhir)
    {
        $query =  $this->db->query("SELECT ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l, resep_obat r, stok_apotik s
        WHERE r.id_history=hs.id_history AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar AND p.id_pelayanan=r.id_pelayanan and t.id_tindakan_farmasi = s.id_req
        AND r.id_resep=t.id_resep AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien AND p.status=1 AND hs.status=1 AND t.tgl_acc IS NOT NULL AND t.tanggal>='$mulai' AND t.tanggal<='$akhir' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap )
        UNION ALL
        SELECT ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc
        FROM pelayanan p, history_pelayanan hs, tindakan_farmasi t, dokter d, cara_bayar c, pasien ps, list_logistik l
        WHERE p.id_pelayanan=hs.id_pelayanan AND p.id_pelayanan=t.id_pelayanan AND hs.dpjp=d.id_dokter AND c.id_cara_bayar=p.cara_bayar  
        AND l.id_logistik=t.id_list_tindakan AND ps.no_rm=p.id_pasien AND p.status=1 AND t.id_resep like '%obat farmasi%' AND t.tanggal>='$mulai' AND t.tanggal<='$akhir' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap )
        group by t.id_tindakan_farmasi
        order by tanggal asc
        ");
        return $query->result();
    }
    // End



    // PENJUALAN ITEM OBAT
    public function selectLaporanItemObat()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(id_list_tindakan)) jumlah');
        $this->db->from('tindakan_farmasi');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat2()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) fopi');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.standar="FOPI"');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat3()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) nonfopi');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.standar="NON FOPI"');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat4()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) generik');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.golongan_obat="Generik"');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat5()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) patent');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.golongan_obat="Patent"');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat6()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) NARKOTIKA');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.zat_adiktif="NARKOTIKA"');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat7()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) PSIKOTROPIKA');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.zat_adiktif="PSIKOTROPIKA"');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat8()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) patent');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.golongan_obat="Patent"');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat9()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) bpjs');
        $this->db->from('tindakan_farmasi t, pelayanan p');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar="30"');
        $this->db->like(' p.tgl_masuk ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat10()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) timah');
        $this->db->from('tindakan_farmasi t, pelayanan p');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar="333"');
        $this->db->like(' p.tgl_masuk ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat11()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) internal');
        $this->db->from('tindakan_farmasi t, pelayanan p');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar="674"');
        $this->db->like(' p.tgl_masuk ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat12()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) mitra');
        $this->db->from('tindakan_farmasi t, pelayanan p, cara_bayar c');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar=c.id_cara_bayar and c.jenis="MITRA"');
        $this->db->like(' p.tgl_masuk ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat13()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) umum');
        $this->db->from('tindakan_farmasi t, pelayanan p');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar="42"');
        $this->db->like(' p.tgl_masuk ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat14()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) patent');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.golongan_obat="Patent"');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }

    public function selectLaporanItemObat15()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(id_resep)) resep');
        $this->db->from('resep_obat');
        $this->db->like(' tanggal ', $tgl);
        return $this->db->get()->row();
    }
    //END


    // PENJUALAN ITEM OBAT RANGE
    public function selectLaporanItemObatRange($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(id_list_tindakan)) jumlah');
        $this->db->from('tindakan_farmasi');
        $this->db->where("tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange2($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) fopi');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.standar="FOPI"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");

        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange3($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) nonfopi');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.standar="NON FOPI"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange4($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) generik');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.golongan_obat="Generik"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange5($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) patent');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.golongan_obat="Patent"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange6($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) NARKOTIKA');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.zat_adiktif="NARKOTIKA"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange7($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(t.id_list_tindakan)) PSIKOTROPIKA');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan = l.id_logistik and l.zat_adiktif="PSIKOTROPIKA"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    // public function selectLaporanItemObatRange8($mulai, $akhir)
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $tgl = date("Y-m-d");
    //     $this->db->select('count(DISTINCT(t.id_list_tindakan)) patent');
    //     $this->db->from('tindakan_farmasi t, list_logistik l');
    //     $this->db->where('t.id_list_tindakan = l.id_logistik and l.golongan_obat="Patent"');
    //     $this->db->where("tanggal BETWEEN '$mulai' AND '$akhir'");
    //     return $this->db->get()->row();
    // }

    public function selectLaporanItemObatRange9($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) bpjs');
        $this->db->from('tindakan_farmasi t, pelayanan p');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar="30"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange10($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) timah');
        $this->db->from('tindakan_farmasi t, pelayanan p');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar="333"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange11($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) internal');
        $this->db->from('tindakan_farmasi t, pelayanan p');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar="674"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange12($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) mitra');
        $this->db->from('tindakan_farmasi t, pelayanan p, cara_bayar c');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar=c.id_cara_bayar and c.jenis="MITRA"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    public function selectLaporanItemObatRange13($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(p.id_pelayanan)) umum');
        $this->db->from('tindakan_farmasi t, pelayanan p');
        $this->db->where('t.id_pelayanan = p.id_pelayanan and p.cara_bayar="42"');
        $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        return $this->db->get()->row();
    }

    // public function selectLaporanItemObatRange14($mulai, $akhir)
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $tgl = date("Y-m-d");
    //     $this->db->select('count(DISTINCT(t.id_list_tindakan)) patent');
    //     $this->db->from('tindakan_farmasi t, list_logistik l');
    //     $this->db->where('t.id_list_tindakan = l.id_logistik and l.golongan_obat="Patent"');
    //     $this->db->where("tgl BETWEEN '$mulai' AND '$akhir'");

    //     return $this->db->get()->row();
    // }

    public function selectLaporanItemObatRange15($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(DISTINCT(id_resep)) resep');
        $this->db->from('resep_obat');
        $this->db->where("tanggal BETWEEN '$mulai' AND '$akhir'");

        return $this->db->get()->row();
    }
    //END


    public function selectLaporanObatRajal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost,l.kode, l.standar, l.distributor, l.margin, l.golongan_farmakologi golongan, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p,history_pelayanan h,  resep_obat r');
        $this->db->where('t.id_pelayanan=p.id_pelayanan');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_history=h.id_history');
        $this->db->where('r.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        // $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('t.depo', 'APOTIK');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' t.tanggal', $tgl);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }


    public function TotalKeuanganApotik()
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
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost,l.kode, l.standar, l.distributor, l.margin, l.golongan_farmakologi golongan, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p,history_pelayanan h, resep_obat r');
        $this->db->where('t.id_pelayanan=p.id_pelayanan');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_history=h.id_history');
        $this->db->where('r.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('t.depo', 'APOTIK');
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
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, n.no_nota,l.kode, l.standar, l.distributor, l.margin, l.golongan_farmakologi golongan, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, resep_obat r, nota_resep n');
        $this->db->where('r.id_pelayanan=p.id_pelayanan');
        // $this->db->where('h.id_pelayanan=p.id_pelayanan');
        // $this->db->where('r.id_history=h.id_history');
        $this->db->where('t.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('r.id_nota=n.id_nota_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('t.depo', 'RANAP');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' t.tanggal ', $tgl);
        $this->db->group_by('l.id_logistik');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanObatRanap($mulai, $akhir)
    {
        $this->db->select('l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,l.harga_cost, l.margin, n.no_nota, l.kode, l.distributor, l.golongan_farmakologi golongan,, l.standar, t.frek ,SUM(t.frek) total, SUM(t.total) total_jual');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, resep_obat r');
        $this->db->where('r.id_pelayanan=p.id_pelayanan');
        // $this->db->where('h.id_pelayanan=p.id_pelayanan');
        // $this->db->where('r.id_history=h.id_history');
        $this->db->where('t.id_pelayanan=p.id_pelayanan');
        $this->db->where('r.id_nota=n.id_nota_resep');
        $this->db->where('r.id_resep=t.id_resep');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('t.depo', 'RANAP');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('t.tanggal >=', $mulai);
        $this->db->where('t.tanggal <=', $akhir);
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

    public function selectCetakSoDepo()
    {
        return $this->db->get('v_cetak_so_deporanap')->result();
    }
    //end

    public function selectLaporanPasienRajalSanbe()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('ps.nama pasien,ps.no_rm,ps.no_id_lain,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where("(p.cara_bayar='333' )");
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where("(t.jenis_pelayanan='UGD' or t.jenis_pelayanan='POLI' or t.jenis_pelayanan='IGD'  )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPasienRajalSanbe($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,ps.no_id_lain,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where("(p.cara_bayar='333' )");
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where("(t.jenis_pelayanan='UGD' or t.jenis_pelayanan='POLI' or t.jenis_pelayanan='IGD'  )");
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
        $this->db->select('ps.nama pasien,ps.no_rm,ps.no_id_lain,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ranap h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where("(p.cara_bayar='333' )");
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(t.jenis_pelayanan='RAWAT INAP'  )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->order_by('ps.nama, t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPasienRanapSanbe($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,ps.no_id_lain,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ranap h , pasien ps, dokter d, cara_bayar c,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where("(p.cara_bayar='333' )");
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(t.jenis_pelayanan='RAWAT INAP' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->order_by('ps.nama, t.tanggal ');
        return $this->db->get()->result();
    }
    public function selectLaporanObatBebas()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('o.tanggal, o.nama pasien, c.nama caraBayar, o.dpjp, l.nama, l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, l.standar,t.margin, t.frek , t.total total_jual, o.unit');
        $this->db->from('list_logistik l, tindakan_farmasi t, cara_bayar c, obat_bebas o');
        $this->db->where('o.id_obat_bebas=t.id_pelayanan');
        $this->db->where('o.cara_bayar=c.id_cara_bayar');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->like(' o.tanggal ', $tgl);
        $this->db->order_by('o.nama');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanObatBebas($mulai, $akhir)
    {
        $this->db->select('o.tanggal, o.nama pasien, c.nama caraBayar, o.dpjp, l.nama, l.golongan_obat,l.satuan_terkecil tipe,l.produsen,t.harga, l.standar,t.margin, t.frek , t.total total_jual, o.unit');
        $this->db->from('list_logistik l, tindakan_farmasi t, cara_bayar c, obat_bebas o');
        $this->db->where('o.id_obat_bebas=t.id_pelayanan');
        $this->db->where('o.cara_bayar=c.id_cara_bayar');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where('o.tanggal >=', $mulai);
        $this->db->where('o.tanggal <=', $akhir);
        $this->db->order_by('o.nama');
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
        $this->db->select('count(id_resep) jumlah');
        $this->db->where_Not_In('status', '2');
        $this->db->like('tgl_proses', $tanggal);
        return $this->db->get('antrian_farmasi')->row_array();
    }
    public function getAntrian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        $this->db->select('a.id_resep , a.no_antri, a.jenis, a.tgl_proses, a.status, p.nama,c.nama cara_bayar,p.no_rm ');
        $this->db->from('antrian_farmasi a, pelayanan pel, pasien p, cara_bayar c  ');
        $this->db->where('p.no_rm=pel.id_pasien');
        $this->db->where('c.id_cara_bayar=pel.cara_bayar');
        $this->db->where('a.id_pelayanan=pel.id_pelayanan');
        $this->db->like('tgl_proses', $tanggal);
        // $this->db->where_Not_In('a.status', '2');
        $this->db->order_by('a.status');
        $this->db->order_by('a.no_antri');
        return $this->db->get()->row_array();
    }
    public function selectAntrian($id_pelayanan, $mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');

        $this->db->select('a.*, a.status as stat_antrian, p.nama, c.nama as nm_cara_bayar, p.no_rm');
        $this->db->from('antrian_farmasi a, pelayanan pel, pasien p, cara_bayar c');
        $this->db->where('p.no_rm = pel.id_pasien');
        $this->db->where('c.id_cara_bayar = pel.cara_bayar');
        $this->db->where('a.id_pelayanan = pel.id_pelayanan');
        $this->db->where_Not_In('a.status', '4');

        if ($mulai != '' && $akhir != '') {
            // Tambahkan kondisi untuk rentang tanggal
            $this->db->where('DATE(a.tgl_proses) >=', $mulai);
            $this->db->where('DATE(a.tgl_proses) <=', $akhir);
        }

        $this->db->group_by('pel.id_pelayanan');
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
        $staff = $this->session->userdata('data_auth');

        //$date = new DateTime('+1 day');
        $this->db->where(array('id_tindakan_farmasi' => $id_tindakan));
        $this->db->update('tindakan_farmasi_kronis', ['staff_hapus' => $staff->id_staff, 'tgl_hapus' => date('Y-m-d H:i:s')]);
        $this->db->delete('tindakan_farmasi', array('id_tindakan_farmasi' => $id_tindakan));
        
        $dblog =$this->db->get_where($stok,['id_req' => $id_tindakan])->row();

        $this->db->delete($stok, array('id_req' => $id_tindakan));
        if ($stok == 'stok_apotik') {
            $this->M_Apotik->update_perencanaan($dblog->id_logistik, 'stok_apotik', 'pr_apotik');
        } else if ($stok == 'stok_depo') {
            $this->M_Apotik->update_perencanaan($dblog->id_logistik, 'stok_depo', 'pr_depo');
        }
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
    function update_perencanaan($id_logistik, $stok, $table)
    {
        $tgl = date('Y-m-d H:i:s');
        $d_stok = $this->db->query("SELECT sum(frek) stok from $stok where id_logistik ='$id_logistik'")->row();
        // $d_penggunaan = $this->db->query("SELECT sum(frek) stok from $stok where asal_tujuan = 'PENJUALAN' and id_logistik ='$id_logistik'")->row();
        $pr = $this->db->query("SELECT count(id_logistik) jum from `$table` where id_logistik ='$id_logistik'")->row();
        if ($pr->jum > 0) {
            $this->M_Apotik->update(['stok_tersedia' => $d_stok->stok,  'tanggal_update' => $tgl], ['id_logistik' => $id_logistik], $table);
        } else {
            $page_data = [
                'id_logistik' => $id_logistik,
                'stok_tersedia' => $d_stok->stok,
                'penggunaan' => 0,
                'tanggal_update' => $tgl
            ];
            $this->db->insert($table, $page_data);
        }
    }
    function getNota($id_resep)
    {
        $this->db->select('*');
        $this->db->from('resep_obat r, nota_resep n');
        $this->db->where('r.id_nota= n.id_nota_resep');
        $this->db->where('n.tipe', 'resep');
        $this->db->where('r.id_resep', $id_resep);
        return $this->db->get()->result();
    }
    function getNotaRetur($id_resep)
    {
        $this->db->select('*');
        $this->db->from('resep_obat r, nota_resep n');
        $this->db->where('r.id_nota_retur= n.id_nota_resep');
        $this->db->where('n.tipe', 'retur resep');
        $this->db->where('r.id_resep', $id_resep);
        return $this->db->get()->result();
    }
    function getNotaBebas($id_resep)
    {
        $this->db->select('*');
        $this->db->from('obat_bebas r, nota_resep n');
        $this->db->where('r.id_nota= n.id_nota_resep');
        $this->db->where('r.id_obat_bebas', $id_resep);
        return $this->db->get()->result();
    }
    function getMax()
    {
        $tgl = date('Y-m-d');
        $this->db->select('max(indeks) indeks');
        $this->db->from('nota_resep');
        $this->db->like('tanggal', $tgl);
        return $this->db->get()->row();
    }
    public function selectObatById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama , s.nama staff, si.tindakan,c.cara_pemakaian');
        $this->db->from(' tindakan_farmasi t, list_logistik l , staff s, signa_obat si, cara_pemakaian_obat c');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_signa=si.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep', 'obat farmasi');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function selectObatReturById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama , s.nama staff, si.tindakan,c.cara_pemakaian');
        $this->db->from('tindakan_farmasi t, list_logistik l , staff s, signa_obat si, cara_pemakaian_obat c');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_signa=si.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep', 'obat retur');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function selectObatResepById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama obat, s.nama staff, si.tindakan,c.cara_pemakaian');
        $this->db->from(' tindakan_farmasi t, list_logistik l , staff s, signa_obat si, cara_pemakaian_obat c');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_signa=si.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_resep', 'obat farmasi');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result_array();
    }
    // public function getTotalObat($id_pelayanan)
    // {
    //     $this->db->select_sum('total');
    //     $this->db->from('tindakan_farmasi');
    //     $this->db->where('id_resep', 'obat farmasi');
    //     $this->db->where('id_pelayanan', $id_pelayanan);
    //     return $this->db->get()->result();
    // }

    public function getTotalObat($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_farmasi');
        $this->db->like('id_resep', 'obat_bebas');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function getDataById($id_history)
    {
        $query =  $this->db->query("SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat,c.nama  cara_bayar, lp.nama_panjang ruang, a.nama asal,d.nama dokter, d.foto
        from pasien pa, pelayanan p, dokter d,cara_bayar c, list_poli lp, asal_pasien  a, history_pelayanan h
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan  and lp.id_list_poli=h.nama_poli and h.id_history = '$id_history'
        UNION
        SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat,c.nama  cara_bayar,'-' ruang, a.nama asal,d.nama dokter, d.foto
        from pasien pa, pelayanan p, dokter d,cara_bayar c,  asal_pasien  a, history_pelayanan_ugd h
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan  and  h.id_history = '$id_history'
        UNION
        SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat,c.nama  cara_bayar, ru.tipe ruang,a.nama asal,d.nama dokter, d.foto
        from pasien pa, pelayanan p, dokter d,cara_bayar c,  asal_pasien  a, history_pelayanan_ranap h, ruangan ru
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan  and h.id_kamar=ru.id_ruangan and h.id_history = '$id_history'
        ");
        return $query->row_array();
    }


    public function getObatById($id)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, l.nama obat,t.keterangan');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep', 'obat farmasi');
        $this->db->where('t.id_pelayanan', $id);
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }
    public function getObatReturById($id)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, l.nama obat,t.keterangan');
        $this->db->from('tindakan_farmasi t, list_logistik l');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep', 'obat retur');
        $this->db->where('t.id_pelayanan', $id);
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }
    public function getSignaObatById($id_tindakan)
    {
        $this->db->select('pas.nama,pas.no_rm, p.tgl_masuk, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat,  pas.tgl_lahir, s.tindakan id_signa, c.cara_pemakaian id_cara_pakai');
        $this->db->from('pasien pas, pelayanan p, tindakan_farmasi f , list_logistik l , signa_obat s, cara_pemakaian_obat c');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->where('p.id_pelayanan=f.id_pelayanan');
        $this->db->where('f.id_resep', 'obat farmasi');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_signa=s.id_signa');
        $this->db->where('f.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('f.id_tindakan_farmasi', $id_tindakan);

        return $this->db->get()->row_array();
    }
    public function getSignaObatByPasien($id_pelayanan)
    {
        $this->db->select('pas.nama,pas.no_rm, p.tgl_masuk, f.kadaluarsa,f.frek, l.satuan_terkecil tipe,l.nama obat,  pas.tgl_lahir, s.tindakan id_signa, c.cara_pemakaian id_cara_pakai');
        $this->db->from('pasien pas, pelayanan p, tindakan_farmasi f , list_logistik l , signa_obat s, cara_pemakaian_obat c');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->where('p.id_pelayanan=f.id_pelayanan');
        $this->db->where('f.id_resep', 'obat farmasi');
        $this->db->where('f.id_list_tindakan=l.id_logistik');
        $this->db->where('f.id_signa=s.id_signa');
        $this->db->where('f.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('f.id_pelayanan', $id_pelayanan);

        return $this->db->get()->result_array();
    }
    //laporan permintaan obat unit
    public function selectLaporanPermintaanObatUnit()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $data_staff = $this->session->userdata('data_auth');
        //$date = new DateTime('+1 day');
        if ($data_staff->tipe == "deporanap") {
            $stok = "stok_depo";
        } else if ($data_staff->tipe == "apotik") {
            $stok = "stok_apotik";
        } else if ($data_staff->tipe == "logistik farmasi") {
            $stok = "stok_logistik";
        }
        $this->db->select("l.nama nama_obat, d.jml_req jumlah_request, d.jml_terima jumlah_terima, l.satuan_terkecil satuan, (ROUND(l.harga_cost * (1 + (l.ppn/100)),0)) harga, (d.jml_terima * (ROUND(l.harga_cost * (1 + (l.ppn/100)),0))) nilai_total, (if((s.tipe = 'rawatinap'),s.ruangan,s.tipe)) tujuan, d.tgl_req");
        $this->db->from($stok . ' a, detail_request d, staff s, list_logistik l');
        $this->db->where('d.id_req = a.id_req');
        $this->db->where('d.id_staff = s.id_staff');
        $this->db->where('l.id_logistik = a.id_logistik');
        $this->db->like('d.tgl_req', $tgl);
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPermintaanObatUnit($mulai, $akhir)
    {
        $data_staff = $this->session->userdata('data_auth');
        //$date = new DateTime('+1 day');
        if ($data_staff->tipe == "deporanap") {
            $stok = "stok_depo";
        } else if ($data_staff->tipe == "apotik") {
            $stok = "stok_apotik";
        } else if ($data_staff->tipe == "logistik farmasi") {
            $stok = "stok_logistik";
        }
        $this->db->select("l.nama nama_obat, d.jml_req jumlah_request, d.jml_terima jumlah_terima, l.satuan_terkecil satuan, (ROUND(l.harga_cost * (1 + (l.ppn/100)),0)) harga, (d.jml_terima * (ROUND(l.harga_cost * (1 + (l.ppn/100)),0))) nilai_total, (if((s.tipe = 'rawatinap'),s.ruangan,s.tipe)) tujuan, d.tgl_req");
        $this->db->from($stok . ' a, detail_request d, staff s, list_logistik l');
        $this->db->where('d.id_req = a.id_req');
        $this->db->where('d.id_staff = s.id_staff');
        $this->db->where('l.id_logistik = a.id_logistik');
        $this->db->where('d.tgl_req>=', $mulai);
        $this->db->where('d.tgl_req<=', $akhir);
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }
    public function getNamaObatReturn($id_resep)
    {

        $this->db->select('l.id_logistik,l.nama , SUM(t.frek) stok,SUM(t.total) total,t.depo,t.kadaluarsa,l.margin,l.harga_cost');
        $this->db->from('list_logistik l,tindakan_farmasi t, resep_obat r');
        $this->db->where(' t.id_list_tindakan=l.id_logistik');
        $this->db->where(' t.id_resep=r.id_resep');

        $this->db->where(' r.id_resep', $id_resep);
        $this->db->group_by('t.id_list_tindakan');
        $this->db->having('stok>0');
        $this->db->order_by('nama');

        return $this->db->get()->result_array();
    }
    public function getNamaObatReturnBebas($id_resep)
    {

        $this->db->select('l.id_logistik,l.nama , SUM(t.frek) stok,SUM(t.total) total,t.depo,t.kadaluarsa,l.margin,l.harga_cost');
        $this->db->from('list_logistik l,tindakan_farmasi t, obat_bebas r');
        $this->db->where(' t.id_list_tindakan=l.id_logistik');
        $this->db->where(' t.id_pelayanan=r.id_obat_bebas');

        $this->db->where(' r.id_obat_bebas', $id_resep);
        $this->db->group_by('t.id_list_tindakan');
        $this->db->having('stok>0');
        $this->db->order_by('nama');

        return $this->db->get()->result_array();
    }

    public function selectLaporanKunjunganApotik()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT ps.nama pasien, ps.no_rm, p.tgl_masuk,ps.jenis_kelamin, d.nama dokter, c.nama cara_bayar, 'RESEP' keterangan, h.jenis_pelayanan
        FROM pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, resep_obat r
        WHERE h.id_pelayanan=p.id_pelayanan and r.id_pelayanan=p.id_pelayanan and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter and ps.no_rm=p.id_pasien and p.tgl_masuk like '%$tgl%' and r.depo='APOTIK'
        UNION
        SELECT b.nama pasien, '-' no_rm,b.tanggal tgl_masuk, '-' jenis_kelamin, b.dpjp dokter, c.nama cara_bayar, 'BEBAS' keterangan, t.jenis_pelayanan
        FROM cara_bayar c, obat_bebas b, tindakan_farmasi t
        WHERE b.cara_bayar=c.id_cara_bayar and b.id_obat_bebas=t.id_pelayanan and b.tanggal like '%$tgl%' and t.id_resep='obat_bebas' and b.unit='APOTIK'
        GROUP by b.id_obat_bebas
        UNION
        SELECT ps.nama pasien, ps.no_rm ,p.tgl_masuk, ps.jenis_kelamin, d.nama dokter, c.nama cara_bayar, 'MANUAL' keterangan, h.jenis_pelayanan
        FROM pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, tindakan_farmasi t
        WHERE h.id_pelayanan=p.id_pelayanan and t.id_pelayanan=p.id_pelayanan and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter and ps.no_rm=p.id_pasien and t.tanggal like '%$tgl%' and t.id_resep='obat farmasi' and t.depo='APOTIK'
        GROUP by t.id_pelayanan
        order by tgl_masuk asc
        ");
        return $query->result();
    }

    public function selectRangeLaporanKunjunganApotik($mulai, $akhir)
    {
        $query =  $this->db->query("SELECT ps.nama pasien, ps.no_rm, p.tgl_masuk, ps.jenis_kelamin, d.nama dokter, c.nama cara_bayar, 'RESEP' keterangan, h.jenis_pelayanan
        FROM pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, resep_obat r
        WHERE h.id_pelayanan=p.id_pelayanan and r.id_pelayanan=p.id_pelayanan and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter and ps.no_rm=p.id_pasien and p.tgl_masuk >= '$mulai' and p.tgl_masuk <= '$akhir' and r.depo='APOTIK'
        UNION
        SELECT b.nama pasien, '-' no_rm, b.tanggal tgl_masuk, '-' jenis_kelamin, b.dpjp dokter, c.nama cara_bayar, 'BEBAS' keterangan, t.jenis_pelayanan
        FROM cara_bayar c, obat_bebas b, tindakan_farmasi t
        WHERE b.cara_bayar=c.id_cara_bayar and b.id_obat_bebas=t.id_pelayanan and b.tanggal >= '$mulai' and b.tanggal <= '$akhir' and t.id_resep='obat_bebas' and b.unit='APOTIK'
        GROUP by b.id_obat_bebas
        UNION
        SELECT ps.nama pasien, ps.no_rm,p.tgl_masuk, ps.jenis_kelamin, d.nama dokter, c.nama cara_bayar, 'MANUAL' keterangan, h.jenis_pelayanan
        FROM pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, tindakan_farmasi t
        WHERE h.id_pelayanan=p.id_pelayanan and t.id_pelayanan=p.id_pelayanan and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter and ps.no_rm=p.id_pasien and t.tanggal >= '$mulai' and t.tanggal <= '$akhir' and t.id_resep='obat farmasi' and t.depo='APOTIK'
        GROUP by t.id_pelayanan
        order by tgl_masuk asc
        ");
        return $query->result();
    }
    // End

    //fastmoving
    // public function selectStok($stok)
    // {
    //     $this->db->select('l.*, sum(a.frek) stok');
    //     $this->db->from($stok . ' a,list_logistik l');
    //     $this->db->where('a.id_logistik=l.id_logistik');
    //     $this->db->where('l.status', 'AKTIF');
    //     $this->db->group_by('l.id_logistik');
    //     $this->db->order_by('nama');

    //     return $this->db->get()->result();
    // }

    //FASTMOVING
    public function selectLaporanFastmoving($bulan1, $bulan2)
    {
        date_default_timezone_set('Asia/Jakarta');

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
        $query =  $this->db->query("SELECT nama,id_logistik,count(id_logistik) transaksi_per_bulan, keterangan,produsen,harga_cost,ppn,satuan_terkecil,satuan_terbesar,kadaluarsa from (
            SELECT year(s.tgl),month(s.tgl),count(s.id_stok) transaksi , s.keterangan,s.kadaluarsa, l.*
        FROM `$stok` s
        right join list_logistik l on s.id_logistik = l.id_logistik
        WHERE (s.keterangan ='KELUAR' or s.keterangan ='MUTASI')
        and DATE_FORMAT(s.tgl, '%Y-%m')  BETWEEN '$bulan1' AND '$bulan2'
        group by year(s.tgl),month(s.tgl),l.id_logistik
        order by l.nama
        ) as gabung
        GROUP BY id_logistik HAVING COUNT(id_logistik) = 3
        ");
        return $query->result();
    }

    //SLOW MOVING
    public function selectLaporanSlowmoving($bulan1, $bulan2)
    {
        date_default_timezone_set('Asia/Jakarta');

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
        $query =  $this->db->query("SELECT nama,id_logistik,count(id_logistik) transaksi_per_bulan, keterangan,produsen,harga_cost,ppn,satuan_terkecil,satuan_terbesar,kadaluarsa from (
            SELECT year(s.tgl),month(s.tgl),count(s.id_stok) transaksi , s.keterangan,s.kadaluarsa, l.*
        FROM `$stok` s
        right join list_logistik l on s.id_logistik = l.id_logistik
        WHERE (s.keterangan ='KELUAR' or s.keterangan ='MUTASI')
        and DATE_FORMAT(s.tgl, '%Y-%m')  BETWEEN '$bulan1' AND '$bulan2'
        GROUP BY year(s.tgl),month(s.tgl),l.id_logistik
        ORDER BY l.nama
        ) AS gabung
        GROUP BY id_logistik HAVING COUNT(id_logistik) < 3
        ");
        return $query->result();
    }

    //DeadStock
    public function selectLaporanDeadStock($bulan1, $bulan2)
    {
        date_default_timezone_set('Asia/Jakarta');

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
        $query =  $this->db->query(" SELECT nama,id_logistik,count(id_logistik) transaksi_per_bulan,keterangan,produsen,harga_cost,ppn,satuan_terkecil,satuan_terbesar,kadaluarsa from (
            SELECT year(s.tgl),month(s.tgl),count(s.keterangan='MASUK') masuk, s.keterangan,s.kadaluarsa, l.*
        FROM `$stok` s,
        list_logistik l
         WHERE s.id_logistik = l.id_logistik 
         and DATE_FORMAT(s.tgl, '%Y-%m')  BETWEEN '$bulan1' AND '$bulan2'
        GROUP BY l.id_logistik
        ORDER BY l.nama
        ) AS gabung
        WHERE masuk =1
        GROUP BY id_logistik
        ");
        return $query->result();
    }
    public function selectPasienHomecare() //igd
    {
        $query =  $this->db->query("SELECT p.*,c.nama AS caraBayar,r.tgl_req tanggal
        from homecare p, cara_bayar c ,resep_obat r 
        where c.id_cara_bayar = p.cara_bayar 
        and p.status_rawat = 0 
        and p.id_pasien = r.id_pelayanan 
        and r.status = 1
        ");
        return $query->result();
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
