<?php

use LDAP\Result;

class M_Laporan_pendapatan extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }
    // public function selectMonevHarian(){
    //     $query =  $this->db->query("SELECT b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, b.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli 
    //         FROM pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok 
    //         WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and r.id_ruangan=h.id_kamar and h.dpjp=dok.id_dokter and h.jenis_pelayanan='RAWAT INAP' and b.status_rawat='dirawat'  and b.cara_bayar = 'WA14BJ84'
    //         ORDER by tgl_masuk desc limit 500");
    //     return $query->result();
    // }
    // public function selectMonevRanap(){
    //     $query =  $this->db->query("SELECT  p.status_rawat, p.diagnosa,p.id_pelayanan,pas.nama,pas.no_rm, c.nama caraBayar,p.tgl_masuk, p.tgl_keluar, p.status_rawat  , d.nama dokter, pas.jenis_kelamin
    //         from pelayanan p, pasien pas, cara_bayar c, history_pelayanan_ranap h , dokter d
    //         where  p.id_pasien=pas.no_rm and p.cara_bayar=c.id_cara_bayar and d.id_dokter=h.dpjp  and h.id_pelayanan=p.id_pelayanan and h.jenis_pelayanan='RAWAT INAP' and p.status_rawat='dirawat' and p.cara_bayar='WA14BJ84'

    //         GROUP by p.id_pelayanan   ");
    //     return $query->result();
    // }
    public function selectLaporanPasien()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT no_rm, nama, jenis_pelayanan, tgl_masuk,tgl_keluar, total_pendapatan, cara_bayar from (
            SELECT ps.no_rm, ps.nama, h.jenis_pelayanan,p.tgl_masuk,p.tgl_keluar,c.nama cara_bayar,(dk.total_harga+dk.dp) total_pendapatan
            FROM pelayanan p,history_pelayanan h,deatail_kasir dk,pasien ps,cara_bayar c
            WHERE p.id_pelayanan=h.id_pelayanan AND dk.id_pelayanan=p.id_pelayanan AND p.id_pasien=ps.no_rm AND p.cara_bayar=c.id_cara_bayar AND p.status_rawat='selesai' AND h.status=1 AND p.status=1 c.jenis='UMUM'
            UNION 
            SELECT ps.no_rm, ps.nama, h.jenis_pelayanan,p.tgl_masuk,p.tgl_keluar,c.nama cara_bayar,(dk.total_harga+dk.dp) total_pendapatan
            FROM pelayanan p,history_pelayanan_ugd h,deatail_kasir dk,pasien ps,cara_bayar c
            WHERE p.id_pelayanan=h.id_pelayanan AND dk.id_pelayanan=p.id_pelayanan AND p.id_pasien=ps.no_rm AND p.cara_bayar=c.id_cara_bayar AND p.status_rawat='selesai' AND h.status=1 AND p.status=1 c.jenis='UMUM'
            UNION
            SELECT ps.no_rm, ps.nama, h.jenis_pelayanan,p.tgl_masuk,p.tgl_keluar,c.nama cara_bayar,(dk.total_harga+dk.dp) total_pendapatan
            FROM pelayanan p,history_pelayanan_ranap h,deatail_kasir dk,pasien ps,cara_bayar c
            WHERE p.id_pelayanan=h.id_pelayanan AND dk.id_pelayanan=p.id_pelayanan AND p.id_pasien=ps.no_rm AND p.cara_bayar=c.id_cara_bayar AND p.status_rawat='selesai' AND h.status=1 AND p.status=1 c.jenis='UMUM')
            AS gabung WHERE tgl_masuk LIKE '%$tgl%' ")->result();
    }

    public function selectRangeLaporanPasien($first_date, $second_date, $jenis_pelayanan)
    {
        if ($jenis_pelayanan == 'POLI') {
            $this->db->select(' ps.no_rm, ps.nama, h.jenis_pelayanan,p.tgl_masuk,p.tgl_keluar,c.nama cara_bayar,(dk.total_harga+dk.dp) total_pendapatan');
            $this->db->from('pelayanan p,history_pelayanan h,deatail_kasir dk,pasien ps,cara_bayar c');
            $this->db->where('p.id_pelayanan=h.id_pelayanan');
            $this->db->where('dk.id_pelayanan=p.id_pelayanan');
            $this->db->where('p.id_pasien=ps.no_rm');
            $this->db->where('p.cara_bayar=c.id_cara_bayar');
            $this->db->where('p.status', 1);
            $this->db->where('p.status_rawat', 'selesai');
            $this->db->where('h.status', 1);
            $this->db->where("p.tgl_masuk BETWEEN '$first_date' AND '$second_date'");
            $this->db->where('c.jenis', 'UMUM');
            return $this->db->get()->result();
        } else if ($jenis_pelayanan == 'RAWAT INAP') {
            $this->db->select(' ps.no_rm, ps.nama, h.jenis_pelayanan,p.tgl_masuk,p.tgl_keluar,c.nama cara_bayar,(dk.total_harga+dk.dp) total_pendapatan ');
            $this->db->from('pelayanan p,history_pelayanan_ranap h,deatail_kasir dk,pasien ps,cara_bayar c');
            $this->db->where('p.id_pelayanan=h.id_pelayanan');
            $this->db->where('dk.id_pelayanan=p.id_pelayanan');
            $this->db->where('p.id_pasien=ps.no_rm');
            $this->db->where('p.cara_bayar=c.id_cara_bayar');
            $this->db->where('p.status', 1);
            $this->db->where('p.status_rawat', 'selesai');
            $this->db->where('h.status', 1);
            $this->db->where("p.tgl_masuk BETWEEN '$first_date' AND '$second_date'");
            $this->db->where('c.jenis', 'UMUM');
            return $this->db->get()->result();
        } else {
            $this->db->select(' ps.no_rm, ps.nama, h.jenis_pelayanan,p.tgl_masuk,p.tgl_keluar,c.nama cara_bayar,(dk.total_harga+dk.dp) total_pendapatan ');
            $this->db->from('pelayanan p,history_pelayanan_ugd h,deatail_kasir dk,pasien ps,cara_bayar c');
            $this->db->where('p.id_pelayanan=h.id_pelayanan');
            $this->db->where('dk.id_pelayanan=p.id_pelayanan');
            $this->db->where('p.id_pasien=ps.no_rm');
            $this->db->where('p.cara_bayar=c.id_cara_bayar');
            $this->db->where('p.status', 1);
            $this->db->where('p.status_rawat', 'selesai');
            $this->db->where('h.status', 1);
            $this->db->where("p.tgl_masuk BETWEEN '$first_date' AND '$second_date'");
            $this->db->where('h.jenis_pelayanan', "UGD");
            $this->db->where('c.jenis', 'UMUM');
            return $this->db->get()->result();
        }
    }

    //laporan jasa dokter

    // public function selectLaporanJasaDokter()
    // {
    //         date_default_timezone_set('Asia/Jakarta');
    //         $tgl = date("Y-m-d");
    //         $this->db->select('d.nama name ,count(h.id_pelaya) jml, sum(h.biaya_jasa) total ');
    //         $this->db->from('history_pelayanan h,dokter d');
    //         $this->db->where('d.id_dokter=h.dpjp');
    //         $this->db->where('h.status','1');
    //         return $this->db->get()->result();
    // }

    public function selectLaporandokter()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('d.nama name ,count(h.id_pelayanan) jml, sum(h.biaya_jasa) total ');
        $this->db->from('history_pelayanan h,dokter d, pelayanan p');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('p.id_pelayanan=h.id_pelayanan');
        $this->db->where('h.status', '1');
        $this->db->where('p.status', '1');
        $this->db->where('h.tgl_masuk>=', $tgl);
        $this->db->group_by('h.dpjp');
        $this->db->order_by('h.tgl_masuk');
        return $this->db->get()->result();
    }
    public function selectRangeLaporandokter($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('d.nama name ,count(h.id_pelayanan) jml, sum(h.biaya_jasa) total ');
        $this->db->from('history_pelayanan h,dokter d, pelayanan p');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('p.id_pelayanan=h.id_pelayanan');
        $this->db->where('p.status', '1');
        $this->db->where('h.status', '1');
        $this->db->where('h.tgl_masuk>=', $mulai);
        $this->db->where('h.tgl_masuk<=', $akhir);
        $this->db->group_by('h.dpjp');
        return $this->db->get()->result();
    }
    public function selectLaporanjenisklaim()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('c.*');
        $this->db->from('cara_bayar c,pelayanan p');
        $this->db->where('p.cara_bayar=c.id_cara_bayar');
        $this->db->group_by('c.id_cara_bayar');
        return $this->db->get()->result();
    }
    public function selectRangeLaporanjenisklaim($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('c.*');
        $this->db->from('cara_bayar c,pelayanan p');
        $this->db->where('p.cara_bayar=c.id_cara_bayar');
        $this->db->where('p.status', '1');
        $this->db->where('p.tgl_masuk>=', $mulai);
        $this->db->where('p.tgl_masuk<=', $akhir);
        $this->db->group_by('c.id_cara_bayar');
        return $this->db->get()->result();
    }

    public function selectLaporanbiayaranap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('date(t.tanggal) tanggal, sum(t.total) total');
        $this->db->from('tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p');
        $this->db->where('t.id_list_tindakan=l.id_list_tindakan_apelkes');
        $this->db->where('t.id_pelayanan=p.id_pelayanan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('p.status', '1');
        $this->db->not_like('l.nama ', '%VISIT%');
        $this->db->where('p.tgl_masuk >=', $tgl);
        $this->db->group_by('date(t.tanggal)');
        return $this->db->get()->result();
    }
    public function selectRangeLaporanbiayaranap($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('date(t.tanggal) tanggal, sum(t.total) total');
        $this->db->from('tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p');
        $this->db->where('t.id_list_tindakan=l.id_list_tindakan_apelkes');
        $this->db->where('t.id_pelayanan=p.id_pelayanan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('p.status', '1');
        $this->db->not_like('l.nama', '%VISIT%');
        $this->db->where('p.tgl_masuk>=', $mulai);
        $this->db->where('p.tgl_masuk<=', $akhir);
        $this->db->group_by('date(t.tanggal)');
        return $this->db->get()->result();
    }
    public function selectLaporanvisitedokter()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('date(t.tanggal) tanggal, sum(t.total) total');
        $this->db->from('tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p');
        $this->db->where('t.id_list_tindakan=l.id_list_tindakan_apelkes');
        $this->db->where('t.id_pelayanan=p.id_pelayanan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('p.status', '1');
        $this->db->like('l.nama ', 'VISIT');
        $this->db->where('p.tgl_masuk >=', $tgl);
        $this->db->group_by('date(t.tanggal)');
        return $this->db->get()->result();
    }
    public function selectRangeLaporanvisitedokter($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('date(t.tanggal) tanggal, sum(t.total) total');
        $this->db->from('tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p');
        $this->db->where('t.id_list_tindakan=l.id_list_tindakan_apelkes');
        $this->db->where('t.id_pelayanan=p.id_pelayanan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('p.status', '1');
        $this->db->like('l.nama', 'VISIT');
        $this->db->where('p.tgl_masuk>=', $mulai);
        $this->db->where('p.tgl_masuk<=', $akhir);
        $this->db->group_by('date(t.tanggal)');
        return $this->db->get()->result();
    }

    public function selectLaporanpendapatanfisio()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('date(t.tanggal) tanggal, SUM(t.total) total');
        $this->db->from('list_tindakan_poli_fisio l, tindakan_poli_fisio t, pelayanan p');
        $this->db->where('t.id_list_tindakan=l.id_list_tindakan');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('p.status', '1');
        $this->db->where('p.tgl_masuk >=', $tgl);
        $this->db->group_by('date(t.tanggal)');
        return $this->db->get()->result();
    }
    public function selectRangeLaporanpendapatanfisio($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('date(t.tanggal) tanggal, SUM(t.total) total');
        $this->db->from('list_tindakan_poli_fisio l, tindakan_poli_fisio t, pelayanan p');
        $this->db->where('t.id_list_tindakan=l.id_list_tindakan');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('p.status', '1');
        $this->db->where('p.tgl_masuk>=', $mulai);
        $this->db->where('p.tgl_masuk<=', $akhir);
        $this->db->group_by('date(t.tanggal)');
        return $this->db->get()->result();
    }
    public function total_pelayanan_pasien($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT (biaya_rs + biaya_admin) total
        from pelayanan   
        WHERE cara_bayar ='$cara_bayar' and DATE(tgl_masuk) BETWEEN '$mulai' and '$akhir'")->row_array();

        $data = $this->db->query("SELECT sum(biaya_jasa) biaya_jasa from (SELECT h.biaya_jasa,l.nama_panjang poli,h.tgl_masuk,d.nama
                from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
                WHERE p.cara_bayar ='$cara_bayar' and p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1
                union all
                SELECT h.biaya_jasa,'IGD' poli,h.tgl_masuk,d.nama
                from pelayanan p, history_pelayanan_ugd h,dokter d 
                WHERE p.cara_bayar ='$cara_bayar' and p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir' and h.status = 1
                ) as b")->row();
        return $query['total'] + $data->biaya_jasa;
    }
    public function total_apotik($mulai, $akhir, $cara_bayar)
    {

        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total FROM (
        SELECT (t.total*1.11) total 
        from tindakan_farmasi t, list_logistik l, pelayanan p, resep_obat r  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and r.id_resep = t.id_resep and r.depo ='APOTIK' and
        p.cara_bayar ='$cara_bayar' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir' and r.jenis_resep!=3 and t.frek !=0
        UNION ALL
        SELECT t.total total 
        from tindakan_farmasi t, list_logistik l, pelayanan p, resep_obat r  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and r.id_resep = t.id_resep and r.depo !='APOTIK' and
        p.cara_bayar ='$cara_bayar' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir' and r.jenis_resep!=3 and t.frek !=0
        union all
        SELECT t.total total 
        from tindakan_farmasi t, list_logistik l, pelayanan p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan  and (t.id_resep ='OBAT RUANGAN' or t.id_resep ='OBAT RUANG' or t.id_resep ='obat farmasi' or t.id_resep = 'obat retur')
        and t.frek !=0
        and p.cara_bayar ='$cara_bayar' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        ) AS gabung");
        return $query->row_array();
    }

    public function total_operasi($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_obat_ok t, list_logistik l, pelayanan p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and 
        p.cara_bayar ='$cara_bayar' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'");
        return $query->row_array();
    }
    public function total_igd($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_igd t, list_tindakan_igd l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_tindakan_igd and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  
        and p.cara_bayar ='$cara_bayar' and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        ");
        return $query->row_array();
    }
    public function total_labor($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_labor t, list_tindakan_labor l, pelayanan p , form_labor f 
        WHERE t.id_list_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        and p.cara_bayar ='$cara_bayar' and t.id_form_labor = f.id_form_labor and (f.status_pembayaran !='tidak' or f.status_pembayaran is null) and f.status != 99
        ");
        return $query->row_array();
    }
    public function total_radio($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p 
        WHERE t.id_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
        and p.cara_bayar ='$cara_bayar' and  (t.status_pembayaran !='tidak' or t.status_pembayaran is null)
        ");
        return $query->row_array();
    }
    public function total_anak($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_anak t, list_tindakan_poli_anak l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_apelkes($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p
        WHERE  t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_internis($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_internis t, list_tindakan_poli_internis l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_bedah($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_bedah t, list_tindakan_poli_bedah_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_fisio($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_fisio t, list_tindakan_poli_fisio l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_gigi($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_gigi t, list_tindakan_poli_gigi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_jantung($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_jantung t, list_tindakan_poli_jantung l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_kulit($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_kulit t, list_tindakan_poli_kulit l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_mata($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_mata t, list_tindakan_poli_mata l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_obgyne($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_obgyne t, list_tindakan_poli_obgyne l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_ok($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_ok t, list_kamar_ok l, pelayanan p  
        WHERE t.id_tindakan=l.id_list_kamar_ok  and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir' 
        and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_tht($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_tht t, list_tindakan_poli_tht l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_umum($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_umum t, list_tindakan_poli_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_akupuntur($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_akupuntur t, list_tindakan_poli_akupuntur l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_bedah_mulut($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_bedah_mulut t, list_tindakan_poli_bedah_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_kesjiwa($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_kes_jiwa t, list_tindakan_poli_kes_jiwa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_orthopedi($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_orthopedi t, list_tindakan_poli_orthopedi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_paru($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_paru t, list_tindakan_poli_paru l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_hemodialisa($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_hemodialisa t, list_tindakan_poli_hemodialisa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_saraf($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_saraf t, list_tindakan_poli_saraf l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_urologi($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_urologi t, list_tindakan_poli_urologi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_ginjal($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_ginjal t, list_tindakan_poli_ginjal l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_penyakit_mulut($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_penyakit_mulut t, list_tindakan_poli_penyakit_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_rehab($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_rehab t, list_tindakan_poli_rehab l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_gizi($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_gizi t, list_tindakan_poli_gizi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_terapi_wicara($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_terapi_bicara t, list_tindakan_poli_terapi_bicara l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_psikolog($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_psikolog t, list_tindakan_poli_psikolog l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_kemoterapi($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_kemoterapi t, list_tindakan_poli_kemoterapi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_stifin($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_stifin t, list_tindakan_poli_stifin l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_transportasi($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_pelayanan_tambahan t, list_tindakan_apelkes l, pelayanan p 
        WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir' and (t.status_pembayaran !='tidak' or t.status_pembayaran is null)
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_kia($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_kia t, list_tindakan_poli_kia l, pelayanan p 
        WHERE l.id_list_tindakan = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_lain($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_penunjang_lain t, list_tindakan_apelkes l, pelayanan p
        WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan  and p.id_pelayanan=t.id_pelayanan  and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir'
         and p.cara_bayar ='$cara_bayar'");
        return $query->row_array();
    }
    public function total_mcu($mulai, $akhir, $cara_bayar)
    {
        $query = $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from(
        SELECT IFNULL(sum(t.total) ,0) total
        FROM tindakan_mcu t, list_tindakan_mcu l, mcu p
        WHERE t.id_list_tindakan=l.id_list_tindakan_mcu and t.id_mcu = p.id_mcu
        and DATE(p.tanggal) BETWEEN '$mulai' and '$akhir' and p.cara_bayar ='$cara_bayar'
        union all
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_labor_mcu t, list_tindakan_labor_mcu l, mcu p 
        WHERE t.id_daftar_tindakan=l.id_daftar_tindakan and p.id_mcu=t.id_mcu 
        and DATE(p.tanggal) BETWEEN '$mulai' and '$akhir' and p.cara_bayar ='$cara_bayar'
        union all
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_radiologi_mcu t, list_tindakan_radiologi_mcu l, mcu p 
        WHERE t.id_daftar_tindakan=l.id_daftar_tindakan and p.id_mcu=t.id_mcu 
        and DATE(p.tanggal) BETWEEN '$mulai' and '$akhir' and p.cara_bayar ='$cara_bayar'
        ) as g");
        return $query->row_array();
    }
    public function total_obat_bebas($mulai, $akhir, $cara_bayar)
    {
        $query =  $this->db->query(" SELECT IFNULL(sum(total) ,0) total
        from(
        SELECT (IFNULL(sum(t.total) ,0) * 0.11) total
        from tindakan_farmasi t, list_logistik l, obat_bebas p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_obat_bebas=t.id_pelayanan
        and p.unit = 'APOTIK'
        and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir' and p.cara_bayar ='$cara_bayar'
        UNION ALL
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_farmasi t, list_logistik l, obat_bebas p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_obat_bebas=t.id_pelayanan
        and p.unit != 'APOTIK'
        and DATE(t.tanggal) BETWEEN '$mulai' and '$akhir' and p.cara_bayar ='$cara_bayar'
        ) as g
        ");
        return $query->row_array();
    }

    public function getPendapatanByStaffTgl($staff, $tgl)
    {
        $hasil = $this->db->query("SELECT g.*,b.nama_bank, concat(g.keterangan,' ',b.nama_bank) as grouper from (
            SELECT a.*,'RAJAL' tipe FROM(
            SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
            FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
            and DATE(d.tgl_verifikasi) = '$tgl'  
            -- and p.status=1 and h.status=1 
            and d.id_staff = '$staff'
            and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) and d.total_bayar != 0 and d.status=1
        group by d.id_pendapatan
        ) as a

            UNION ALL
            SELECT tgl_input, pasien, no_rm, 'UGD' poli, total, staff,keterangan,id_pendapatan,'RAJAL' tipe FROM(
            SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
            FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
            and DATE(d.tgl_verifikasi) = '$tgl'  
            -- and p.status=1 and h.status=1 
            and d.id_staff = '$staff'and p.status=1 and h.status=1 
            and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
            and p.id_pelayanan not in(select id_pelayanan from history_pelayanan where status =1)
            and d.total_bayar != 0 and d.status=1
            group by d.id_pendapatan

            ) as b
            UNION all
            SELECT j.*,'RANAP' tipe from(
            SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, r.kelas_ruangan poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
            FROM pelayanan p, history_pelayanan_ranap h, pasien ps, ruangan r, staff s,pendapatan_kasir d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and s.id_staff=d.id_staff and h.id_kamar=r.id_ruangan and d.id_pelayanan=p.id_pelayanan 
            and p.cara_bayar = '42' and DATE(d.tgl_verifikasi) = '$tgl'  
            -- and p.status=1 and h.status=1 
            and d.id_staff = '$staff' and p.status=1 and h.status=1 and d.total_bayar != 0 and d.status=1
            group by d.id_pendapatan
            ) as j
            UNION all
            SELECT d.tgl_verifikasi tgl_input, p.nama pasien, '' as no_rm, 'OBAT BEBAS' as poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,(if(p.unit='APOTIK','RAJAL','RANAP')) as tipe
            FROM obat_bebas p, staff s,pendapatan_kasir d
            WHERE p.id_obat_bebas=d.id_pelayanan  and s.id_staff=d.id_staff and d.tipe='OBAT BEBAS'
            and p.cara_bayar = '42' and DATE(d.tgl_verifikasi) = '$tgl' and d.id_staff = '$staff' and d.total_bayar != 0 and d.status=1
            
            UNION all
        SELECT d.tgl_verifikasi tgl_input, p.nama_pasien pasien, p.no_rm, 'MCU' as poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,'RAJAL' tipe
        FROM mcu p, staff s,pendapatan_kasir d
        WHERE p.id_mcu=d.id_pelayanan  and s.id_staff=d.id_staff and d.tipe ='MCU'
        and DATE(d.tgl_verifikasi) = '$tgl' and d.id_staff = '$staff' and d.total_bayar != 0 and d.status=1
        UNION all
        SELECT d.tgl_verifikasi tgl_input, p.nama pasien, '' as no_rm, 'HOMECARE' as poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,'RAJAL' tipe
        FROM homecare p, staff s,pendapatan_kasir d
        WHERE p.id_pasien =d.id_pelayanan  and s.id_staff=d.id_staff and d.tipe ='HOMECARE' and p.jenis_layanan='HOMECARE'
        and  DATE(d.tgl_verifikasi) = '$tgl' and d.id_staff = '$staff' and d.total_bayar != 0 and d.status=1
       
        UNION ALL
        SELECT c.*,'RAJAL' tipe FROM(
        SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan
        FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
        and DATE(d.tgl_verifikasi) = '$tgl'  
        -- and p.status=1 and h.status=1 
        and d.id_staff = '$staff'
        and p.cara_bayar != '42' and d.selisih != 0 and d.status=1 and d.tipe='SELISIH'
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ugd where status =1) 
        group by d.id_pendapatan
        ) AS c
        UNION ALL
        SELECT tgl_input, pasien, no_rm, 'UGD' poli, total, staff,keterangan,id_pendapatan,'RAJAL' tipe FROM(
        SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan
        FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
        and DATE(d.tgl_verifikasi) = '$tgl'  
        -- and p.status=1 and h.status=1 
        and d.id_staff = '$staff'
        and p.cara_bayar != '42' and d.selisih != 0 and d.status=1 and d.tipe='SELISIH' 
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan where status =1) 
        group by d.id_pendapatan
        ) AS d
         UNION ALL
        SELECT j.*,'RAJAL' tipe FROM(
        SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan
        FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d, history_pelayanan_ugd ugd
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
        and DATE(d.tgl_verifikasi) = '$tgl'  
        -- and p.status=1 and h.status=1 
        and d.id_staff = '$staff'
        and p.cara_bayar != '42' and d.selisih != 0 and d.status=1 and d.tipe='SELISIH'
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
        and p.id_pelayanan =ugd.id_pelayanan and ugd.status =1
        group by d.id_pendapatan
        ) AS j
        
        UNION all
        SELECT e.*,'RANAP' tipe FROM(
        SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, r.kelas_ruangan poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan
        FROM pelayanan p, history_pelayanan_ranap h, pasien ps, ruangan r, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and s.id_staff=d.id_staff and h.id_kamar=r.id_ruangan and d.id_pelayanan=p.id_pelayanan 
        and p.cara_bayar != '42' and d.selisih != 0 and d.status=1 and d.tipe='SELISIH' 
        and DATE(d.tgl_verifikasi) = '$tgl' 
        -- and p.status=1 
        and h.status=1 
        and d.id_staff = '$staff' 
        group by d.id_pendapatan
        ) AS e

        
        UNION ALL
        SELECT f.*,'RAJAL' tipe FROM(
        SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
        FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
        and DATE(d.tgl_verifikasi) = '$tgl'  
        -- and p.status=1 and h.status=1 
        and d.id_staff = '$staff'
        and p.cara_bayar != '42' and d.status=1 and d.keterangan !='asuransi' and d.total_bayar !=0 and d.selisih =0 
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
        group by d.id_pendapatan
        ) AS f
        UNION ALL
        SELECT tgl_input, pasien, no_rm, 'UGD' poli, total, staff,keterangan,id_pendapatan,'RAJAL' tipe FROM(
        SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
        FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
        and DATE(d.tgl_verifikasi) = '$tgl'  
        -- and p.status=1 and h.status=1 
        and d.id_staff = '$staff'
        and p.cara_bayar != '42' and d.status=1 and d.keterangan !='asuransi' and d.total_bayar !=0 and d.selisih =0 
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
        group by d.id_pendapatan
        ) AS h
        UNION all
        SELECT i.*,'RANAP' tipe FROM(
        SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, r.kelas_ruangan poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
        FROM pelayanan p, history_pelayanan_ranap h, pasien ps, ruangan r, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and s.id_staff=d.id_staff and h.id_kamar=r.id_ruangan and d.id_pelayanan=p.id_pelayanan 
        and p.cara_bayar != '42' and d.status=1 and d.keterangan !='asuransi' and d.total_bayar !=0 and d.selisih =0
        and DATE(d.tgl_verifikasi) = '$tgl' 
        -- and p.status=1 and h.status=1 
        and d.id_staff = '$staff' 
        group by d.id_pendapatan
        ) AS i 

            ) as g
                left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                as b on g.id_pendapatan = b.id_pendapatan
        ORDER by pasien asc
        ")->result_array();

        return $hasil;
    }
}
